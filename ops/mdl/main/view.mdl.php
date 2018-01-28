<?php
//初始化sql参数
$sql_where_arr=array(
		'default'=>'',
		'search'=>'',
		'add'=>''
);
$sql_where_flag=0;

//根据传参解析sql
switch ($_POST['fr']){
	case 'view':
		if (!isset($_SESSION['menu_id'])){
			$_SESSION['menu_id']=$_POST['id'];
			$_SESSION['searchword']='';
			$_SESSION['page']=1;
		}else{
			if($_SESSION['menu_id']!=$_POST['id']){
				$_SESSION['menu_id']=$_POST['id'];
				$_SESSION['searchword']='';
				$_SESSION['page']=1;
			}
		}
		$_SESSION['mr']=$_POST['mr'];
		break;
	case 'reset':
		$_SESSION['searchword']='';
		$_SESSION['page']=1;
		break;
	case 'page':
		$_SESSION['page']=$_POST['id'];
		if(!isset($_SESSION['searchword'])){
			$_SESSION['searchword']='';
		}
		break;
	case 'search':
		$db_search=new DbSqlPdo();
		$sql_tmp='select * from wordbook where id='.$_POST['searchcol'];
		$result_tmp=$db_search->select($sql_tmp);

		switch ($result_tmp[0]['type']){
			case '3000':
				$_SESSION['searchword']=$result_tmp[0]['colnameid'].' like \'%'.$_POST['searchword'].'%\'';
				break;
			case '3001':
				$sql_tmp1=$result_tmp[0]['sql_suffix'].$_POST['searchword'].$result_tmp[0]['sql_postfix'];
				$result_tmp1=$db_search->select($sql_tmp1);
				if ($result_tmp1){
					$str_tmp='';
					foreach ($result_tmp1 as $val){
						$str_tmp.=$val['id'].',';
					}
					$str_tmp=substr($str_tmp,0,strlen($str_tmp)-1);
					$_SESSION['searchword']=$result_tmp[0]['colnameid'].' in ('.$str_tmp.')';
				}else{
					$_SESSION['searchword']='1=2';
				}
				break;
		}
		break;
	case 'vwmod':
	case 'vwset':
		//$sql_1m='id='.$_POST['id'];
		$sql_where_arr['add']='id='.$_POST['id'];
		break;
	default:
		break;
}

//sql参数赋值
$sql_where_arr['search']=$_SESSION['searchword'];
if ($_SESSION['loginroleid']!=1 && $_SESSION['menu_id']>3 && $_SESSION['menu_id']<6){
	$sql_where_arr['default']='creator='.$_SESSION['loginroleid'];
}else{
	$sql_where_arr['default']='';
}

$mdl_path_file=BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.$_SESSION['mr'].DIRECTORY_SEPARATOR.OPS_FUNC_VIEW.POSTFIX_MDL;

if (file_exists($mdl_path_file) && !is_dir($mdl_path_file)){
	require $mdl_path_file;
	unset($mdl_path_file);
}else{
	$return_arr['content']['content']='<span style="text-align:left;float:left">(ง •̀_•́)ง努力<br/>拼命୧(๑•̀⌄•́๑)૭<br/>制作中。。。</br>先逛逛别的呗：DDD</span>';
	$return_arr['content']['page_bar']='';
	$return_arr['content']['tips_nav']='';
	$return_arr['content']['tips']='';
	$return_arr['content']['menu_func']='';
	require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_RETURN.POSTFIX_INC;
}

//选择性生成view_content的html，并输出 
require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_VIEW.POSTFIX_INC;
$main_view=new ViewMain($_SESSION['menu_id'], $_SESSION['loginroleid'], $_SESSION['loginuserid'],$rec_sql_suffix,$rec_table,$rec_col,$_SESSION['page']);

switch ($_POST['fr']){
	case 'view':
	case 'reset':
		$return_arr['content']['page_bar']=$main_view->gen_pagebar_html();
		$return_arr['content']['content']=$main_view->gen_view_content_html();
		$return_arr['content']['tips_nav']=$main_view->gen_navpos_html();
		$return_arr['content']['menu_func']=$main_view->gen_func_html();
		$return_arr['content']['tips']='';
		break;
	case 'page':
	case 'search':
		$return_arr['content']['page_bar']=$main_view->gen_pagebar_html();
		$return_arr['content']['content']=$main_view->gen_view_content_html();
		$return_arr['content']['tips']='';
		break;
	case 'vwadd':
	case 'vwmod':
		if (isset($_POST['id'])){
			$return_arr['content']['content']=$main_view->gen_mod_view_html($_POST['id']);
		}else{
			$return_arr['content']['content']=$main_view->gen_mod_view_html();
		}
		$return_arr['content']['page_bar']='';
		$return_arr['content']['menu_func']='';
		$return_arr['content']['tips_nav']=$main_view->gen_navpos_html($_POST['navname']);
		$return_arr['content']['tips']='';
		break;
	case 'vwset':
        $return_arr['content']['content']=$main_view->gen_set_view_html($_POST['id']);
	    $return_arr['content']['page_bar']='';
	    $return_arr['content']['menu_func']='';
	    $return_arr['content']['tips_nav']=$main_view->gen_navpos_html($_POST['navname']);
	    $return_arr['content']['tips']='';
	    break;
	case 'del':
	case 'delall':
	    $return_arr['content']['content']=$main_view->gen_view_content_html();
	    $return_arr['content']['page_bar']=$main_view->gen_pagebar_html();
	    break;
	default:
		$return_arr[0][0]=$rec_sql_suffix;
		break;
}

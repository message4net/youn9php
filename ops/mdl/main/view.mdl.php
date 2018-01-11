<?php
//初始化sql参数
$sql_where_arr=array(
		'default'=>'',
		'search'=>'',
		'add'=>''
);
$sql_where_flag=0;

$_SESSION['page']=1;

//根据传参解析sql
switch ($_POST['fr']){
	case 'view':
		$_SESSION['menu_sub_id']=$_POST['id'];
		$_SESSION['mr']=$_POST['mr'];
	case 'reset':
		$_SESSION['searchword']='';
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
	default:
		break;
}

//sql参数赋值
$sql_where_arr['search']=$_SESSION['searchword'];
if ($_SESSION['loginroleid']!=1 && $_SESSION['menu_sub_id']>3 && $_SESSION['menu_sub_id']<6){
	$sql_where_arr['default']='creator='.$_SESSION['loginroleid'];
}else{
	$sql_where_arr['default']='';
}

require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.OPS_MDL_MAIN.DIRECTORY_SEPARATOR.OPS_FUNC_MAIN.POSTFIX_MDL;

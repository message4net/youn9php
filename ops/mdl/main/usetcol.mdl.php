<?php
$return_arr['content']['tips']='<div style="float:left">';
//$arr_role=explode(',',$_POST['rb'.$_POST['rbbackarrk'].'alckarrv']);
$return_arr['0']['0']='#UST:';
//user_col表
$str_uc_add='';
$str_uc_del='';
$sql_uc_add='';
$sql_uc_del='';
$arr_sql_rm_i=array();
$sql_uc_init='select wb.* from user_wordbook uwb, wordbook wb where wb.type>=0 and wb.type<1000 and uwb.wordbook_id=wb.id and user_id='.$_SESSION['loginuserid'];
$result_uc_init=$db_modify->select($sql_uc_init);
$return_arr[0][0].='#'.$_POST['rbbackarrk'].'#'.$sql_uc_init;
$arr_uc_init=array();
if ($result_uc_init){
	foreach ($result_uc_init as $val1){
		$arr_uc_init[$val1['menu_id']][]=$val1['id'];
$return_arr[0][0].='#init:'.$val1['id'];		
	}
}
$arr_k=explode(',',$_POST['rbbackarrk']);
$arr_uc_post=array();
$arr_uc_add=array();
$arr_uc_del=array();
$arr_sql_uc_del=array();
foreach ($arr_k as $val1){
	$arr_uc_post[$val1]=array();
	if (isset($_POST['rb'.$val1.'alckarrv']) && $_POST['rb'.$val1.'alckarrv']!=''){
		$arr_uc_post[$val1]=explode(',', $_POST['rb'.$val1.'alckarrv']);
	}
//$return_arr[0][0].='#arrk:'.$_POST['rb'.$val1.'alckarrv'];
	$k_arr_post=$val1;
	if (!isset($arr_uc_init[$k_arr_post])){
		$arr_uc_init[$k_arr_post]=array();
	}

	$arr_uc_add[$val1]=array_diff($arr_uc_post[$val1], $arr_uc_init[$k_arr_post]);
	$arr_uc_del[$val1]=array_diff($arr_uc_init[$k_arr_post], $arr_uc_post[$val1]);
	if ($arr_uc_add[$val1]){
		foreach ($arr_uc_add[$val1] as $val2){
			$str_uc_add.='('.$_SESSION['loginuserid'].','.$val2.'),';
//$return_arr[0][0].='#str:'.$val2;
		}
	}
	if ($arr_uc_del[$val1]){
		$str_ic_del='';
		foreach ($arr_uc_del[$val1] as $val2){
			$str_uc_del.=$val2.',';
		}
		$str_uc_del=substr($str_uc_del,0,strlen($str_uc_del)-1);
		$arr_uc_del[$val1]='delete from user_wordbook where user_id='.$_SESSION['loginuserid'].' and wordbook_id in ('.$str_uc_del.')';
	}
}

if ($str_uc_add!=''){
	$str_uc_add=substr($str_uc_add,0,strlen($str_uc_add)-1);
	$sql_uc_add='insert into user_wordbook values '.$str_uc_add;
	$return_arr['content']['tips'].='字段增设';
$return_arr['0']['0'].='#'.$sql_uc_add;
	if($db_modify->update($sql_uc_add)){
		$return_arr['content']['tips'].='成功';
	}else{
		$return_arr['content']['tips'].=OPS_TIP_FAIL;
	}
	$return_arr['content']['tips'].=',';
}
if ($arr_sql_uc_del){
	$return_arr['content']['tips'].='字段减设';
	$flag_uc_del=0;
////	foreach ($arr_sql_uc_del as $val){
		foreach ($val as $val1){
//			if(!$db_modify->update($val1)){
//				$flag_rwb_del=1;
//			}
$return_arr['0']['0'].='#'.$val1;
		}
////	}
	if ($flag_uc_del==1){
		$return_arr['content']['tips'].=OPS_TIP_FAIL;
	}else{
		$return_arr['content']['tips'].='成功';
	}
	$return_arr['content']['tips'].=',';
}

$return_arr['content']['tips'].='</div>';
<?php
//$return_arr[0][0]='AAAAA';
////require BASE_DIR.DIR_OPS.DIR_MDL.OPS_MDL_MAIN.'/'.OPS_MDL_MAIN.POSTFIX_MDL;
//require BASE_DIR.DIR_OPS.DIR_COMM.DIR_INC.OPS_INC_RETURN.POSTFIX_INC;

////if (!isset($_SESSION)){
////	session_start();
////	//$_SESSION['app_name']='ops';
////}
//
if(!class_exists('DbSqlPdo',false)){
	require INC_DBPDO_FILE_PATH;
}

$dbpdo_login=new DbSqlPdo();

$sql_pre_login='select id,role_id,name from user where name=:username and password=:userpassword';
$sql_cdtn_arr=array(
		':username'=>$_POST['username'],
		':userpassword'=>$_POST['userpassword']
);


$result_login=$dbpdo_login->select($sql_pre_login,$sql_cdtn_arr);
$result_login_count=count($result_login);

//if($result_login){
//$return_arr[0][0]=BASE_DIR.DIR_OPS.DIR_COMM.DIR_INC.OPS_INC_MAIN.POSTFIX_MDL;
////require BASE_DIR.DIR_OPS.DIR_MDL.OPS_MDL_MAIN.'/'.OPS_MDL_MAIN.POSTFIX_MDL;
//require BASE_DIR.DIR_OPS.DIR_COMM.DIR_INC.OPS_INC_RETURN.POSTFIX_INC;
//}else{
//	$return_arr[0][0]='BBB';
//	require BASE_DIR.DIR_OPS.DIR_COMM.DIR_INC.OPS_INC_RETURN.POSTFIX_INC;
//}

if ($result_login && $result_login_count==1){
	$_SESSION['loginroleid']=$result_login[0]['role_id'];
	$_SESSION['loginuserid']=$result_login[0]['id'];
	$_SESSION['loginname']=$result_login[0]['name'];
	$_SESSION['loginduration']=time()+86400;
	$_SESSION['loginflag']=1;
	require BASE_DIR.DIR_OPS.DIR_COMM.DIR_INC.OPS_INC_MAIN.POSTFIX_INC;
}else{
	$return_arr['hide']=array('main_right','main_left');
	$return_arr['show']=array('main_login');
	$return_arr['content']['tips_login']='<span style="float:left;font-size:12px;color:green"><b><i>用户名或密码有误，请重新输入</b></i></span>';
	require BASE_DIR.DIR_OPS.DIR_COMM.DIR_INC.OPS_INC_RETURN.POSTFIX_INC;
}


//$return_arr[0][0]=BASE_DIR.DIR_OPS.DIR_COMM.DIR_INC.OPS_INC_MAIN.POSTFIX_INC;
//$return_arr[0][0]=BASE_DIR.DIR_OPS.DIR_COMM.DIR_INC;
//require BASE_DIR.DIR_OPS.DIR_COMM.DIR_INC.OPS_INC_RETURN.POSTFIX_INC;

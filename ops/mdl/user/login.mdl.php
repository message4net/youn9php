<?php


if (!isset($_SESSION)){
	session_start();
	//$_SESSION['app_name']='ops';
}

if(!class_exists('DbSqlPdo',false)){
	require INC_DBPDO_FILE_PATH;
}

$dbpdo_login=new DbSqlPdo();

$sql_pre_login='select id,role_id,name from user where username=:username and password=:password';
$sql_cdtn_arr=array(
		':username'=>$_POST['username'],
		':userpassword'=>$_POST['userpassword']
);

$result_login=$dbpdo_login->select($sql_pre_login,$sql_cdtn_arr);
$result_login_count=count($result_login);
if ($result_login && $result_login_count==1){
	$_SESSION['loginroleid']=$result_login['role_id'];
	$_SESSION['loginuserid']=$result_login['id'];
	$_SESSION['loginname']=$result_login['name'];
	$_SESSION['loginpasswd']=$result_login['password'];
	$_SESSION['loginduration']=time()+86400;
	$_SESSION['loginflag']=1;
	require BASE_DIR.DIR_OPS.DIR_MDL.OPS_MDL_MENU.POSTFIX_MDL;
}else{
	$return_arr['hide']=array('main_right','main_left');
	$return_arr['show']=array('main_login');
	$return_arr['content']['tips_login']='<span style="float:left;font-size:12px;color:green"><b><i>用户名或密码有误，请重新输入</b></i></span>';
	require BASE_DIR.DIR_OPS.DIR_COMM.DIR_INC.OPS_INC_RETURN.POSTFIX_INC;
}



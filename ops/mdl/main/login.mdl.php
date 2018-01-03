<?php
$dbpdo_login=new DbSqlPdo();

$sql_pre_login='select id,role_id,name from user where name=:username and password=:userpassword';
$sql_cdtn_arr=array(
		':username'=>$_POST['username'],
		':userpassword'=>$_POST['userpassword']
);


$result_login=$dbpdo_login->select($sql_pre_login,$sql_cdtn_arr);
$result_login_count=count($result_login);

if ($result_login && $result_login_count==1){
	$_SESSION['loginroleid']=$result_login[0]['role_id'];
	$_SESSION['loginuserid']=$result_login[0]['id'];
	$_SESSION['loginname']=$result_login[0]['name'];
	$_SESSION['loginduration']=time()+86400;
	$_SESSION['loginflag']=1;
	
	$return_arr['404']=URL_BASE.FILE_INF.'/'.APP_OPS.'/'.OPS_FUNC_MENU;
}else{
	$return_arr['hide']=array('main_right','main_left');
	$return_arr['show']=array('main_login');
	$return_arr['content']['tips_login']='<span style="float:left;font-size:12px;color:green"><b><i>用户名或密码有误，请重新输入</b></i></span>';
}


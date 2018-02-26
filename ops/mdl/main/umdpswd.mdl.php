<?php
$return_arr['content']['tips']='<div style="float:left">';
$db_umdpswd=new DbSqlPdo();
$sql_vrf='select * from user where id='.$_SESSION['loginuserid'].' and password=\''.$_POST['raa'].'\'';
$result_vrf=$db_umdpswd->select($sql_vrf);
$sql_exec='';
if ($result_vrf){
	$return_arr['content']['tips'].='密码修改';
	$sql_exec='update user set password=\''.$_POST['rab'].'\' where id='.$_SESSION['loginuserid'];
	if($db_umdpswd->update($sql_exec)){
		$return_arr['content']['tips'].='成功';
	}else{
		$return_arr['content']['tips'].=OPS_TIP_FAIL;
	}
}else{
	$return_arr['content']['tips'].='<span style="color:yellow"><b>原密码输入有误，请确认</b></span>';
}
$return_arr['content']['tips'].='</div>';
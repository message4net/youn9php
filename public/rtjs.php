<?php session_start();
$app_name='ops';
$dir_mdl='mdl/';
$dir_comm='comm/';
$dir_inc='inc/';
$func_postfix='.mdl.php';
$inc_return_file_name='return.inc.php';
$url_404='http://www.youn9php.com/index.php/404';
$file_name_router='router.php';

$app_base_dir=__DIR__.'/../'.$app_name.'/';

if (file_exists($app_base_dir.$dir_mdl.$_POST['m'].'/'.$_POST['f'].$func_postfix) && !is_dir($app_base_dir.$dir_mdl.$_POST['m'].'/'.$_POST['f'].$func_postfix)) {
	require $app_base_dir.$file_name_router;
}else{
	$return_arr['404']=$url_404;
}

//$return_arr[0][0]=$app_base_dir.$dir_mdl.'/'.$_POST[m].'/'.$_POST[f].$func_postfix;
//$return_arr[0][0]=$app_base_dir.$dir_mdl.$_POST['m'];

require $app_base_dir.$dir_comm.$dir_inc.$inc_return_file_name;
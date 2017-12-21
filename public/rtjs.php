<?php session_start();
require __DIR__.'/../comm/cfg/init.cfg.php';
require __DIR__.'/../comm/cfg/self.cfg.php';
require __DIR__.'/../comm/cfg/rel.cfg.php';

$app_name='ops';
$dir_mdl='mdl/';
$dir_comm='comm/';
$dir_inc='inc/';
$func_postfix='.mdl.php';
$inc_return_file_name='return.inc.php';
$url_404='http://www.youn9php.com/index.php/404';
$file_name_router='router.php';

$app_base_dir=BASE_DIR.$app_name.'/';

if (file_exists($app_base_dir.DIR_MDL.$_POST['m'].'/'.$_POST['f'].POSTFIX_MDL) && !is_dir($app_base_dir.DIR_MDL.$_POST['m'].'/'.$_POST['f'].POSTFIX_MDL)) {
	require $app_base_dir.$file_name_router;
}else{
	$return_arr['404']=$url_404;
}

//$return_arr[0][0]=$app_base_dir.$dir_mdl.'/'.$_POST[m].'/'.$_POST[f].$func_postfix;
//$return_arr[0][0]=$app_base_dir.$dir_mdl.$_POST['m'];

require $app_base_dir.$dir_comm.$dir_inc.$inc_return_file_name;
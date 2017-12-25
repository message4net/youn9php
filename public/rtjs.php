<?php session_start();
require __DIR__.'/../comm/cfg/init.cfg.php';
require __DIR__.'/../comm/cfg/self.cfg.php';
require __DIR__.'/../comm/cfg/rel.cfg.php';

if (file_exists(BASE_DIR.DIR_OPS.DIR_MDL.$_POST['m'].'/'.$_POST['f'].POSTFIX_MDL) && !is_dir(BASE_DIR.DIR_OPS.DIR_MDL.$_POST['m'].'/'.$_POST['f'].POSTFIX_MDL)) {
	require BASE_DIR.DIR_OPS.NAME_FILE_ROUTER;
}else{
	$return_arr[NAME_APP_404]=URL_BASE.NAME_FILE_INF.'/'.NAME_APP_404;
}

//$return_arr[0][0]=BASE_DIR.DIR_OPS.DIR_COMM.DIR_MDL.$_POST['m'].'/'.$_POST['f'].POSTFIX_MDL;
////$return_arr[0][0]=$app_base_dir.$dir_mdl.$_POST['m'];
//
require BASE_DIR.DIR_OPS.DIR_COMM.DIR_INC.OPS_INC_RETURN.POSTFIX_INC;
//Header("Location: ".URL_BASE.NAME_FILE_INF.'/'.NAME_APP_404);
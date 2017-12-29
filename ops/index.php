<?php

$init_ops=new Init();

//if ($_SESSION['loginflag']==1){
//	require BASE_DIR.DIR_OPS.DIR_MDL.OPS_MDL_MENU.'/'.OPS_MDL_MENU.POSTFIX_MDL;;	
//}else{
	if (!isset($url_para_arr['web'])){
		$url_para_arr['web']=OPS_FILE_TMPLT;
	}
	
	$init_ops->init_app($html_tmplt_arr[$url_para_arr['app']],$url_para_arr['app']);
	
	echo $init_ops->print_html(array(),BASE_DIR.NAME_RUNTIME.DIRECTORY_SEPARATOR.$url_para_arr['app'].DIRECTORY_SEPARATOR.$url_para_arr['web']);
//}
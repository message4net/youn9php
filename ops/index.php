<?php
if (!isset($url_para_arr['web'])){
	$url_para_arr['web']=OPS_FILE_TMPLT;
}

$init_ops=new Init();

if (isset($_SESSION['loginflag'])){
	if ($_SESSION['loginflag']==1){
		require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.OPS_MDL_MAIN.DIRECTORY_SEPARATOR.OPS_FUNC_MENU.POSTFIX_MDL;
		
		$html_tmplt_arr['ops']['nodis']='inline';
		$html_tmplt_arr['ops']['dis']='none';
		$html_tmplt_arr['ops']['span_info']=$_SESSION['loginname'];
		$html_tmplt_arr['ops']['menu_nav']=$return_arr['content']['menu_nav'];
	}
}else{
	$init_ops->init_app($html_tmplt_arr[$url_para_arr['app']],$url_para_arr['app']);
}

echo $init_ops->print_html($html_tmplt_arr[$url_para_arr['app']],BASE_DIR.NAME_TMPLT.DIRECTORY_SEPARATOR.$url_para_arr['app'].DIRECTORY_SEPARATOR.$url_para_arr['web']);
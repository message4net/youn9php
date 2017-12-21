<?php
//基于起始路径 或 常参 定义2阶常参
define('URI_BASE', '/'.URL_ALIS.NAME_FILE_INF);
define('CFG_DIR',BASE_DIR.DIR_COMM.DIR_CFG);
define('LOG_DIR',BASE_DIR.DIR_LOG);
define('INC_DIR',BASE_DIR.DIR_INC);
define('INF_INDEX', BASE_DIR.NAME_FILE_INF);
define('FILE_DIR_ROUTER', BASE_DIR.NAME_FILE_ROUTER);
define('INIT_INC', BASE_DIR.DIR_COMM.DIR_INC.NAME_FILE_INC_INIT);
define('RUNTIME_DIR', BASE_DIR.DIR_RUNTIME);
define('TMPLT_DIR', BASE_DIR.DIR_TMPLT);
define('TMPLT_DIR_404', BASE_DIR.DIR_TMPLT.DIR_404);

//基于 2阶常参及以上参数 定义常参
define('LOG_FILE_PATH_NAME',LOG_DIR.NAME_FILE_LOG);

//基于常参定义app模版参数
$html_tmplt_arr['404']=array(
		'url_rel'=>URL_REL.DIR_404,
		'url_index'=>'http://'.$_SERVER['SERVER_NAME']
);

if ($_SERVER['SERVER_PORT']!='80'){
	$html_tmplt_arr['404']['url_index'].=':'.$_SERVER['SERVER_PORT'].'/'.$_SERVER['REQUEST_URI'];
}

$html_tmplt_arr['ops']['url_js_ajx']=URL_BASE.NAME_FILE_RTJS;
$html_tmplt_arr['ops']['url_rel']=URL_REL.DIR_OPS;
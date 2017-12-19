<?php
//定义起始路径
$basedir=str_replace('\\','/',dirname(dirname(__DIR__))).'/';
define('BASE_DIR',$basedir);
unset($basedir);

//定义常参
define('DIR_COMM', 'comm/');
define('DIR_INC', 'inc/');
define('DIR_TMPLT', 'tmplt/');
define('DIR_RUNTIME', 'runtime/');
define('DIR_404', '404/');
define('NAME_APP_404', '404');
define('NAME_FILE_INF', 'index.php');
define('NAME_FILE_ROUTER', 'router.php');
define('NAME_FILE_INC_INIT', 'init.inc.php');
define('NAME_FILE_TMPLT_404', '404.html');
define('NAME_FILE_TMPLT_VRSN', '.vrsn');
define('VRSN_TMPLT','0.0.1');

//基于其实路径 或 常参 定义2阶常参
define('CFG_DIR',BASE_DIR.DIR_COMM.'cfg/');
define('LOG_DIR',BASE_DIR.'log/');
define('INC_DIR',BASE_DIR.'inc/');
define('INF_INDEX', BASE_DIR.NAME_FILE_INF);
define('FILE_DIR_ROUTER', BASE_DIR.NAME_FILE_ROUTER);
define('TMPLT_DIR', BASE_DIR.DIR_TMPLT);
define('INIT_INC', BASE_DIR.DIR_COMM.DIR_INC.NAME_FILE_INC_INIT);
define('RUNTIME_DIR', BASE_DIR.DIR_RUNTIME);
define('TMPLT_DIR_404', BASE_DIR.DIR_TMPLT.DIR_404);

//基于 2阶常参及以上参数 定义常参
define('LOG_FILE_PATH_NAME',LOG_DIR.'log.log');

//基于常参定义app模版参数
$html_tmplt_arr['404']=array(
		'url_rel'=>URL_REL.DIR_404,
		'url_index'=>'http://'.$_SERVER['SERVER_NAME']
);


if ($_SERVER['SERVER_PORT']!='80'){
	$html_tmplt_arr['404']['url_index'].=':'.$_SERVER['SERVER_PORT'].'/'.$_SERVER['REQUEST_URI'];
}

$html_tmplt_arr['ops']['title']='ops_sys';
$html_tmplt_arr['ops']['logo']='ops_sys';
$html_tmplt_arr['ops']['url_rel']=URL_REL.'ops/';
//$html_tmplt_arr['ops']['url_js_ajx']='http://www.youn9php.com/rtjs.php';
//$html_tmplt_arr['ops']['url_js_404']='http://www.youn9php.com/index.php/404';


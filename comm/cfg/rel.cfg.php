<?php
//基于起始路径 或 常参 定义2阶常参
define('URI_BASE', '/'.URL_ALIS.FILE_INF);

//app基于其实路径 或 常参 定义2阶常参

//基于 2阶常参及以上参数 定义常参

//基于常参定义app模版参数
$html_tmplt_arr['404']=array(
		'url_rel'=>URL_REL.APP_404.'/',
		//'url_index'=>'http://'.$_SERVER['SERVER_NAME']
		'url_index'=>URI_BASE
);

//if ($_SERVER['SERVER_PORT']!='80'){
//	$html_tmplt_arr['404']['url_index'].=':'.$_SERVER['SERVER_PORT'].'/'.$_SERVER['REQUEST_URI'];
//}

$html_tmplt_arr['ops']['url_js_ajx']=URL_BASE.FILE_RTJS;
$html_tmplt_arr['ops']['url_rel']=URL_REL.APP_OPS.'/';
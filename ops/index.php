<?php
//define('NAME_APP_OPS', $app_name);
//define('DIR_OPS', 'ops/');
define('NAME_FILE_TMPLT_OPS', 'index.html');

//$html_tmplt_arr_ops=array();
//$html_tmplt_arr_ops['title']='ops_sys';
//$html_tmplt_arr_ops['logo']='ops_sys';
//$html_tmplt_arr_ops['url_rel']=URL_REL.$url_para_arr['app'].'/';
//$html_tmplt_arr_ops['url_js_ajx']='http://www.youn9php.com/rtjs.php';
//$html_tmplt_arr_ops['url_js_404']='http://www.youn9php.com/index.php/404';

$init_ops=new Init();

if (!isset($url_para_arr['web'])){
	$url_para_arr['web']=NAME_FILE_TMPLT_OPS;
}

$init_ops->init_app($html_tmplt_arr[$url_para_arr['app']],$url_para_arr['app']);

echo $init_ops->print_html(array(),RUNTIME_DIR.$url_para_arr['app'].'/'.$url_para_arr['web']);



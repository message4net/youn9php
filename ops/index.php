<?php
define('NAME_FILE_TMPLT_OPS', 'index.html');

$init_ops=new Init();

if (!isset($url_para_arr['web'])){
	$url_para_arr['web']=NAME_FILE_TMPLT_OPS;
}

$init_ops->init_app($html_tmplt_arr[$url_para_arr['app']],$url_para_arr['app']);

echo $init_ops->print_html(array(),RUNTIME_DIR.$url_para_arr['app'].'/'.$url_para_arr['web']);

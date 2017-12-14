<?php
//define('NAME_APP_OPS', $app_name);
//define('DIR_OPS', 'ops/');
define('NAME_FILE_TMPLT_OPS', 'index.html');

$init_ops=new Init();
$init_ops->init_app($app_name);
$html_arr_ops['url_rel']=URL_REL.$app_name.'/';
//$html_arr_ops['url_index']='http://'.$_SERVER['SERVER_ADDR'];
//if ($_SERVER['SERVER_PORT']!='80'){
//	$html_arr_ops['url_index'].=':'.$_SERVER['SERVER_PORT'].'/'.$_SERVER['REQUEST_URI'];
//}
echo $init_ops->print_html($html_arr_ops);
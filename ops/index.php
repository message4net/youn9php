<?php
//define('NAME_APP_OPS', $app_name);
//define('DIR_OPS', 'ops/');
define('NAME_FILE_TMPLT_OPS', 'index.html');

$init_ops=new Init();
$init_ops->init_app($url_para_arr['app']);
//$app_arr_length=count($app_arr);
//$para_arr_ops=$init_ops->url_encode($app_arr);
//if(!isset($para_arr_ops['web'])){
//	$para_arr_ops['web']='';
//}else{
$html_arr_ops=array();
$html_arr_ops['title']='ops_sys';
$html_arr_ops['logo']='ops_sys';
$html_arr_ops['url_rel']=URL_REL.$url_para_arr['app'].'/';
echo $init_ops->print_html($html_arr_ops,RUNTIME_DIR.$url_para_arr['app'].'/'.$url_para_arr['web']);
$z=fopen('ZZZ','w');
fwrite($z, 'ZZZ');
fclose('ZZZ');

//}
//$html_arr_ops['url_rel']=URL_REL.$app_name.'/';
//echo $init_ops->print_html($html_arr_ops,RUNTIME_DIR.$app_name.'/'.$para_arr_ops['web']);
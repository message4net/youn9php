<?php
//define('NAME_APP_OPS', $app_name);
//define('DIR_OPS', 'ops/');
define('NAME_FILE_TMPLT_OPS', 'index.html');

$init_ops=new Init();
$init_ops->init_app($app_name);
$_app_arr_length=count($_app_arr);
$para_arr_ops=$init_ops->url_encode($_app_arr);
if(!isset($para_arr_ops['web'])){
	$para_arr_ops['web']='';
}else{
	if (!file_exists(RUNTIME_DIR.$app_name.'/'.$para_arr_ops['web'])){
		$para_arr_ops['web']='';
	}
}
$html_arr_ops['url_rel']=URL_REL.$app_name.'/';
echo $init_ops->print_html($html_arr_ops,RUNTIME_DIR.$app_name.'/'.$para_arr_ops['web']);
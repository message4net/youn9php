<?php
//echo $app_name.'#2#';
$init_404=new Init();
$init_404->init_app($app_name);
$html_arr_404['url_rel']=URL_REL.DIR_404;
$html_arr_404['url_index']='http://'.$_SERVER['SERVER_ADDR'];
if ($_SERVER['SERVER_PORT']!='80'){
	$html_arr_404['url_index'].=':'.$_SERVER['SERVER_PORT'].'/'.$_SERVER['REQUEST_URI'];
}
echo $init_404->print_html($html_arr_404);

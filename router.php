<?php
$app_name='';
$app_para='';
$app_func='';
$_app_arr='';

//echo $_SERVER['REQUEST_URI'].'#b#';
$url_para=str_replace(URI_BASE.'/','',$_SERVER['REQUEST_URI']);
$url_para=str_replace(URI_BASE,'',$url_para);
$_app_arr=explode('/', $url_para);
//echo $url_para.'#1#'.$_app_arr[0].'###';
if ($url_para!='' && $url_para!='/') {
	if (file_exists(BASE_DIR.$_app_arr[0].'/'.INF_INDEX)) {
		$app_name=$_app_arr[0];
	}else{
		$app_name=NAME_APP_404;
	}
} else {
	$app_name=NAME_APP_404;
}

//echo $app_name;

require INIT_INC;
require BASE_DIR.$app_name.'/'.NAME_FILE_INF;

//if ($url_para=='' || $url_para==='/') {
//	$app_name='404';
////	//初始化日志路径
////	if (file_exists(LOG_DIR)){
////		if (!is_dir(LOG_DIR)){
////			unlink(LOG_DIR);
////			mkdir(LOG_DIR);
////		}
////	}else{
////		mkdir(LOG_DIR);
////	}
//	
//	require INIT_INC;
//	$init_404=new Init();
//	$init_404->init_app();
//	$html_arr_404['url_rel']=URL_REL.DIR_404;
//	$html_arr_404['url_index']='http://'.$_SERVER['SERVER_ADDR'];
//	if ($_SERVER['SERVER_PORT']!='80'){
//		$html_arr_404['url_index'].=':'.$_SERVER['SERVER_PORT'].'/'.$_SERVER['REQUEST_URI'];
//	}
//	echo $init_404->print_html($html_arr_404);
//} else {
//	//echo $url_para;
//	echo "恭喜，访问成功";
//}
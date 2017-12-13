<?php
if (session_id()==='') {
	session_start();
};

$func_arr=array(
		'ops',
		'home'
);

$url_para=str_replace(URI_BASE.'/','',$_SERVER['REQUEST_URI']);
$url_para=str_replace(URI_BASE,'',$url_para);

if ($url_para==='' || $url_para==='/') {
	//初始化日志路径
	if (file_exists(LOG_DIR)){
		if (!is_dir(LOG_DIR)){
			unlink(LOG_DIR);
			mkdir(LOG_DIR);
		}
	}else{
		mkdir(LOG_DIR);
	}
	
	require INIT_INC;
	$init_404=new Init();
	$init_404->init_app();
	$html_arr_404['url_rel']=URL_REL.DIR_404;
	$html_arr_404['url_index']='http://'.$_SERVER['SERVER_ADDR'];
	echo $init_404->print_html($html_arr_404);
} else {
	echo $url_para;
	echo "恭喜，访问成功";
}
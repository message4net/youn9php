<?php
if (session_id()==='') {
	session_start();
};

$_func_arr=array(
		'ops',
		'home'
);

$url_para=str_replace(BASE_URI.'/','',$_SERVER['REQUEST_URI']);
$url_para=str_replace(BASE_URI,'',$url_para);

echo '<br/>para<br/>';
echo $url_para;
echo '<br/>';

require __DIR__.'/comm/cfg/init.cfg.php';

if ($url_para==='') {
	require INIT_INC;
	$init_404=new Init();
	$init_404->init_app();
	echo "请使用正确的链接访问您想要访问的内容";
} else {
	echo "恭喜，访问成功";
}
<?php
//定义起始路径
$basedir=str_replace('\\','/',dirname(dirname(__DIR__))).'/';
define('BASE_DIR_OPS',$basedir);
unset($basedir);

//定义常参
define('DIR_COMM_OPS', 'comm/');
define('DIR_INC_OPS', 'inc/');
define('DIR_CFG_OPS', 'cfg/');
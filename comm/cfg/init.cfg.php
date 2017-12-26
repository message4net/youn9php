<?php
//定义起始路径
$basedir=str_replace('\\','/',dirname(dirname(__DIR__))).'/';
define('BASE_DIR',$basedir);
unset($basedir);

//定义常参
define('DIR_COMM', 'comm/');
define('DIR_INC', 'inc/');
define('DIR_CFG', 'cfg/');
define('DIR_MDL', 'mdl/');
define('DIR_TMPLT', 'tmplt/');
define('DIR_RUNTIME', 'runtime/');
define('DIR_LOG', 'log/');
define('POSTFIX_MDL', '.mdl.php');
define('POSTFIX_INC', '.inc.php');
define('INC_DBPDO', 'dbpdo');
define('NAME_APP_404', '404');
define('NAME_FILE_INF', 'index.php');
define('NAME_FILE_RTJS', 'rtjs.php');
define('NAME_FILE_LOG', 'log.log');
define('NAME_FILE_ROUTER', 'router.php');
define('NAME_FILE_INC_INIT', 'init.inc.php');
define('NAME_FILE_CFG_SELF', 'self.cfg.php');
define('NAME_FILE_TMPLT_404', '404.html');
define('NAME_FILE_TMPLT_VRSN', '.vrsn');
define('VRSN_TMPLT','0.0.1');

//定义app ops配置
define('OPS_MDL_MENU', 'menu');
define('OPS_MDL_LOGIN', 'login');
define('OPS_INC_MAIN', 'main');
define('OPS_INC_RETURN', 'return');
define('NAME_APP_OPS', 'ops');

$html_tmplt_arr['ops']['title']='ops_sys';
$html_tmplt_arr['ops']['logo']='ops_sys';



<?php
//定义起始路径
//$basedir=str_replace('\\','/',dirname(dirname(__DIR__))).'/';
//define('BASE_DIR',$basedir);
//unset($basedir);

define('BASE_DIR',dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR);

//定义常参
define('DIR_COMM', 'comm'.DIRECTORY_SEPARATOR);
define('DIR_INC', 'inc'.DIRECTORY_SEPARATOR);
define('DIR_CFG', 'cfg'.DIRECTORY_SEPARATOR);
define('DIR_MDL', 'mdl'.DIRECTORY_SEPARATOR);
define('DIR_TMPLT', 'tmplt'.DIRECTORY_SEPARATOR);
define('DIR_RUNTIME', 'runtime'.DIRECTORY_SEPARATOR);
define('DIR_LOG', 'log'.DIRECTORY_SEPARATOR);
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
define('NAME_APP_OPS', 'ops');
define('OPS_MDL_MENU', 'menu');
define('OPS_FUNC_MENU', 'menu');
define('OPS_FUNC_MENUSUB', 'menusub');
define('OPS_MDL_LOGIN', 'login');
define('OPS_INC_MAIN', 'main');
define('OPS_INC_RETURN', 'return');


define('PERPAGENO','5');

$html_tmplt_arr['ops']['title']='ops_sys';
$html_tmplt_arr['ops']['logo']='ops_sys';



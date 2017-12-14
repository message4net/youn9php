<?php
//定义起始路径
$basedir=str_replace('\\','/',dirname(dirname(__DIR__))).'/';
define('BASE_DIR',$basedir);
unset($basedir);

//定义常参
define('DIR_COMM', 'comm/');
define('DIR_INC', 'inc/');
define('DIR_TMPLT', 'tmplt/');
define('DIR_RUNTIME', 'runtime/');
define('DIR_404', '404/');
define('NAME_APP_404', '404');
define('NAME_FILE_INF', 'index.php');
define('NAME_FILE_ROUTER', 'router.php');
define('NAME_FILE_INC_INIT', 'init.inc.php');
define('NAME_FILE_TMPLT_404', '404.html');
define('NAME_FILE_TMPLT_VRSN', '.vrsn');
define('VRSN_TMPLT','0.0.1');

//基于其实路径 或 常参 定义2阶常参
define('CFG_DIR',BASE_DIR.DIR_COMM.'cfg/');
define('LOG_DIR',BASE_DIR.'log/');
define('INC_DIR',BASE_DIR.'inc/');
define('INF_INDEX', BASE_DIR.NAME_FILE_INF);
define('FILE_DIR_ROUTER', BASE_DIR.NAME_FILE_ROUTER);
define('TMPLT_DIR', BASE_DIR.DIR_TMPLT);
define('INIT_INC', BASE_DIR.DIR_COMM.DIR_INC.NAME_FILE_INC_INIT);
define('RUNTIME_DIR', BASE_DIR.DIR_RUNTIME);
define('TMPLT_DIR_404', BASE_DIR.DIR_TMPLT.DIR_404);

//基于 2阶常参及以上参数 定义常参
define('LOG_FILE_PATH_NAME',LOG_DIR.'log.log');
//define(CFG_SLF,'self.cfg.php');




//define(INC_DB,'db.inc.php');
//define(INC_VIEW,'view.inc.php');
//define(INC_LOG,'log.inc.php');
//define(INC_FUNC,'func.inc.php');
//define(INC_MOD,'modify.inc.php');
////define(FNC_TIP,'tips_gen.fnc.php');
//define(CSS_DIR,'css/');
//define(CSS_FILE,'default.css');
////set_view.mdl.php modify_view.mdl.php ʹ��
//define(CSS_ID_TABLE_CONTENT, 'content_view');
//define(CSS_ID_TD_STR_A,'str_a');
//define(CSS_ID_TD_STR_B,'str_b');
//define(CSS_ID_TD_STR_C,'str_c');
//
//define(FLAG_LOG_INFO,'0');
//define(FLAG_LOG_WARN,'1');
//define(FLAG_LOG_ERR,'1');
//define(LEVEL_LOG_INFO,'INFO:');
//define(LEVEL_LOG_WARN,'WARN:');
//define(LEVEL_LOG_ERR,'ERR :');
//define(FLAG_ADMIN,'1');
//
//define(JS_DIR,'js/');
//define(JS_JQ,'jquery-1.11.3.min.js');
//define(JS_FUNC,'func.js');
////define(JS_LOGIN,'login.js');
//define(MDL_DIR,'mdl/');
////index.php ����
//define(MDL_WEB,'web.mdl.php');
////web.mdl.php ����
//define(MDL_LOGIN,'login.mdl.php');
////define(MDL_LOGOUT,'loginout.mdl.php');
////login.mdl.php ����
//define(MDL_MENU,'menu.mdl.php');
////define(MDL_CONTENT,'content.mdl.php');
////define(MDL_PAGE,'page.mdl.php');
////modify.mdl.php����
//define(MDL_MAIN,'main.mdl.php');
//define(MDL_RETURN,'return.mdl.php');
////web.mdl.php ����
//define(MDL_HEAD,'head.mdl.php');
////web.mdl.php ����
//define(MDL_FOOT,'foot.mdl.php');
////
//define(PERPAGENO,'5');
////���ر�������
//require_once BASE_DIR.CFG_DIR.CFG_SLF;


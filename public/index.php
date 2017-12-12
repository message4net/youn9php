<?php session_start();
//定义起始路径
//$basedir=str_replace('\\','/',dirname(__DIR__)).'/';
//define(BASE_DIR,$basedir);
//unset($basedir);

//定义起始URL
define(BASE_URI, '/youn9php/index.php');

require __DIR__.'/../comm/cfg/init.cfg.php';
require INF_1;
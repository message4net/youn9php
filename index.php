<?php 
if (session_id()==='') {
 	session_start();
};

//foreach ($_REQUEST as $key=>$val) {
//foreach ($_SERVER as $key=>$val) {
//	echo 'K#'.$key.'#V#'.$val.'<br/>';
//}

echo $_SERVER['REQUEST_URI']."###";
require FILE_DIR_ROUTER;

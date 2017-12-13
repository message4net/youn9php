<?php 
if (session_id()==='') {
 	session_start();
};

require __DIR__.'/comm/cfg/init.cfg.php';
require FILE_DIR_ROUTER;

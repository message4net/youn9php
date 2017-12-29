<?php

require BASE_DIR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.FILE_INC_INIT;
$init=new Init();

$url_para_arr=$init->url_encode($_SERVER['REQUEST_URI']);

require BASE_DIR.$url_para_arr['app'].DIRECTORY_SEPARATOR.FILE_INF;

<?php

require INIT_INC;
$init=new Init();

$url_para_arr=$init->url_encode($_SERVER['REQUEST_URI']);

require BASE_DIR.$url_para_arr['app'].DIRECTORY_SEPARATOR.NAME_FILE_INF;

<?php

$init_404=new Init();

$init_404->init_app($html_tmplt_arr[$url_para_arr['app']],$url_para_arr['app']);

echo $init_404->print_html();

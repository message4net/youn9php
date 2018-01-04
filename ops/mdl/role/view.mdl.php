<?php

$sql_rec_body_query_suffix='select * from role ';
$rec_table='role';
$rec_col='*';

$view_role=new ViewMain($_SESSION['menu_sub_id'], $_SESSION['loginroleid'], $_SESSION['loginuserid'],$rec_table,$rec_col);

$return_arr['content']['page_bar']=$view_role->gen_pagebar_html();
$return_arr['content']['content']=$view_role->gen_view_content_html();

//$return_arr[0][0]='zzza'; 
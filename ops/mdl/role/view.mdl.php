<?php


$view_role=new ViewMain($_SESSION['menu_sub_id'], $_SESSION['loginroleid'], $_SESSION['loginuserid']);

$return_arr['content']['page_bar']=$view_role->gen_pagebar_html();
$return_arr['content']['content']=$view_role->gen_view_content_html();

$return_arr[0][0]='zzza'; 
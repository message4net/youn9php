<?php
require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_VIEW.POSTFIX_INC;

$main_view=new ViewMain($_SESSION['menu_sub_id'], $_SESSION['loginroleid'], $_SESSION['loginuserid'],$rec_sql_suffix,$rec_table,$rec_col,$_SESSION['page']);

switch ($_POST['f']){
	case 'view':
		//$return_arr[0][0]=$main_view->gen_view_content_html();
		$return_arr['content']['page_bar']=$main_view->gen_pagebar_html();
		$return_arr['content']['content']=$main_view->gen_view_content_html();
		$return_arr['content']['tips_nav']=$main_view->gen_navpos_html();
		$return_arr['content']['menu_func']=$main_view->gen_func_html();
		break;
	case 'page':
		$return_arr['content']['page_bar']=$main_view->gen_pagebar_html();
		$return_arr['content']['content']=$main_view->gen_view_content_html();
		break;
	case 'search':
		$return_arr['content']['content']=$main_view->gen_view_content_html();
		break;
	default:
		break;
}
<?php

require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_VIEW.POSTFIX_INC;

$_SESSION['menu_sub_id']=$_POST['id'];

$mdl_path_file=BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.$_POST['mr'].DIRECTORY_SEPARATOR.$_POST['f'].POSTFIX_MDL;

if (file_exists($mdl_path_file) && !is_dir($mdl_path_file)){
	require $mdl_path_file;
	unset($mdl_path_file);
}else{
	$return_arr['content']['content']='(ง •̀_•́)ง努力<br/>拼命୧(๑•̀⌄•́๑)૭<br/>制作中。。。';
}


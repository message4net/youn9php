<?php
switch ($_POST['f']){
	case 'view':
	case 'page':
		$mdl_path_file=BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.$_SESSION['mr'].DIRECTORY_SEPARATOR.OPS_FUNC_VIEW.POSTFIX_MDL;
		break;
	case 'search':
		$mdl_path_file=BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.$_SESSION['mr'].DIRECTORY_SEPARATOR.OPS_FUNC_SEARCH.POSTFIX_MDL;
		break;
	default:
		break;
}

if (file_exists($mdl_path_file) && !is_dir($mdl_path_file)){
	require $mdl_path_file;
	switch ($_POST['f']){
		case 'search':
			break;
		default:
			if ($_SESSION['loginroleid']!=1 && $_SESSION['menu_sub_id']>3 && $_SESSION['menu_sub_id']<6){
				$rec_sql_suffix='select '.$rec_col.' from '.$rec_table.' where creator='.$_SESSION['loginroleid'];
			}else{
				$rec_sql_suffix='select '.$rec_col.' from '.$rec_table.' ';
			}
			break;
	}
	unset($mdl_path_file);
}else{
	$return_arr['content']['content']='(ง •̀_•́)ง努力<br/>拼命୧(๑•̀⌄•́๑)૭<br/>制作中。。。';
}



require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_MAIN.POSTFIX_INC;
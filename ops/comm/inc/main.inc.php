<?php
$return_arr[0][1]=BASE_DIR.DIR_OPS.DIR_MDL.OPS_MDL_MENU.'/'.OPS_MDL_MENU.POSTFIX_MDL;


switch ($_POST['f']) {
	case 'login':
		require BASE_DIR.DIR_OPS.DIR_MDL.OPS_MDL_MENU.'/'.OPS_MDL_MENU.POSTFIX_MDL;
	;
	break;
	
	default:
		;
	break;
}

require BASE_DIR.DIR_OPS.DIR_COMM.DIR_INC.OPS_INC_RETURN.POSTFIX_INC;
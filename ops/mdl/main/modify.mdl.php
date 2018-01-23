<?php 
switch ($_POST['fr']){
	case 'add':
		break;
}

$db_modify=new DbSqlPdo();

require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.$_SESSION['mr'].DIRECTORY_SEPARATOR.$_POST['f'].POSTFIX_MDL;
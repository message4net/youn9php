<?php
//替代main 
$rec_table='server';
$rec_col='*';
//替代结束

$rec_sql_suffix=' from '.$rec_table;

foreach ($sql_where_arr as $val){
	if ($val!=''){
		if ($sql_where_flag==0){
			$rec_sql_suffix.=' where '.$val;
			$sql_where_flag=1;
		}else{
			$rec_sql_suffix.=' and '.$val;
		}
	}
}

//$_SESSION['searchword']='';

//if ($_SESSION['loginroleid']!=1 && $_SESSION['menu_sub_id']>3 && $_SESSION['menu_sub_id']<6){
//	//$rec_sql_suffix='select '.$rec_col.' from '.$rec_table.' where creator='.$_SESSION['loginroleid'].$_SESSION['searchword'];
//	$rec_sql_suffix=' from '.$rec_table.' where creator='.$_SESSION['loginroleid'].$_SESSION['searchword'];
//}else{
//	//$rec_sql_suffix='select '.$rec_col.' from '.$rec_table.$_SESSION['searchword'];
//	$rec_sql_suffix=' from '.$rec_table.$_SESSION['searchword'];
//}

//require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.$_SESSION['mr'].DIRECTORY_SEPARATOR.OPS_SQL_VIEW.POSTFIX_MDL;
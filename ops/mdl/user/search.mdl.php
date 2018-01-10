<?php
switch ($_POST['searchcol']){
	case '32':
		//$rec_table='role';
		//$rec_col='*';
		if ($_SESSION['loginroleid']!=1 && $_SESSION['menu_sub_id']>3 && $_SESSION['menu_sub_id']<6){
			$_SESSION['searchword']=' and name like \'%'.$_POST['searchword'].'%\'';
		}else{
			$_SESSION['searchword']=' where name like \'%'.$_POST['searchword'].'%\'';
		}
		break;
	case '33':
		$db_search=new DbSqlPdo();
		$sql_tmp='select id from role where name like \'%'.$_POST['searchword'].'%\'';
		$result_tmp=$db_search->select($sql_tmp);
		//$rec_table='role';
		//$rec_col='*';
		if ($_SESSION['loginroleid']!=1 && $_SESSION['menu_sub_id']>3 && $_SESSION['menu_sub_id']<6){
			if ($result_tmp){
				$str_tmp='';
				foreach ($result_tmp as $val){
					$str_tmp.=$val['id'];
				}
				$str_tmp=substr($str_tmp,0,strlen($str_tmp)-1);
				$_SESSION['searchword']=' creator in ('.$str_tmp.')';
			}else{
				$_SESSION['searchword']=' and 1=2';
			}
		}else{
			if ($result_tmp){
				$_SESSION['searchword']=' where name like \'%'.$_POST['searchword'].'%\'';
			}else{
				$_SESSION['searchword']=' where 1=2';
			}
		}
		break;
}
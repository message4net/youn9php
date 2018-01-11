<?php

//$rec_sql_suffix=' from '.$rec_table.' where creator='.$_SESSION['loginroleid'].$_SESSION['searchword'];
$rec_sql_suffix=' from '.$rec_table;
$sql_where_flag='aaaaaaaaaaaa';
foreach ($sql_where_arr as $val){
	if ($val!=''){
		if ($sql_where_flag==1){
			//$b.='true#';
			$rec_sql_suffix.=' where '.$val;
			$sql_where_flag=0;
		}else{
			//$b.='false#';
			$rec_sql_suffix.=' and '.$val;
		}
	}else{
		//$b.='A';
	}
}


<?php
$rec_table='user';
$rec_col='*';

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

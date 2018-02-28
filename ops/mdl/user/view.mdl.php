<?php
$db_user_view=new DbSqlPdo();

$rec_table='user';
$rec_col='*';

$rec_sql_suffix=' from '.$rec_table;

$sql_arr['type6']=array();
$sql_type6_vrf='select * from wordbook where type=6 and ';

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

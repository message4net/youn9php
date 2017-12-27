<?php
$db_menu_sub=new DbSqlPdo();
$tmpsql='select id,name,tablename from menu where parent_id=:id';
$tmp_sql_para_arr[':id']=$_POST['id'];
$result_menu_sub=$db_menu_sub->select($tmpsql,$tmp_sql_para_arr);
//$returnhtml='<div id="div_menu_sub"><ul>';
$returnhtml='<ul>';
foreach ($result_menu_sub as $val) {
	$returnhtml.='<li><a id="'.$val['id'].'" name="'.$val['tablename'].'" href="javascript:void(0);">'.$val['name'].'</a></li>';
}
//$returnhtml.='</ul></div>';
$returnhtml.='</ul>';
$return_arr=array(
		'content'=>array(
				'menu_sub'=>$returnhtml
		)
);
unset($val,$tmpsql,$returnhtml,$db_menu_sub,$tmp_sql_para_arr);
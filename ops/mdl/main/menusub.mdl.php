<?php
$db_menu_sub=new DbSqlPdo();
$tmpsql='select id,name,modelname from menu where parent_id=:id order by id';
$tmp_sql_para_arr[':id']=$_POST['id'];
$result_menu_sub=$db_menu_sub->select($tmpsql,$tmp_sql_para_arr);
$returnhtml='<ul>';

//$return_arr['0']['0']='#ID:'.$_POST['id'].'#SQL:'.$tmpsql.'#NAVNAME:'.$_POST['navname'];

foreach ($result_menu_sub as $val) {
	//$returnhtml.='<li><a id="'.$val['id'].'" name="'.$val['modelname'].'" href="javascript:void(0);">'.$val['name'].'</a></li>';
	$returnhtml.='<li><a id="menu_subc_'.$val['id'].'" name="'.$val['modelname'].'" href="javascript:void(0);">'.$val['name'].'</a></li>';
}
$returnhtml.='</ul>';

$return_arr['content']['menu_sub']=$returnhtml;
$return_arr['content']['content']='';
$return_arr['content']['page_bar']='';
$return_arr['content']['menu_func']='';
$return_arr['content']['tips_nav']='<div style="float:left"><b>当前位置:<i>'.$_POST['navname'].'</i></b></div>';
$return_arr['content']['tips']='';
unset($val,$tmpsql,$returnhtml,$db_menu_sub,$tmp_sql_para_arr);
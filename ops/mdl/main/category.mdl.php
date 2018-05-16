<?php 
$dbpdo_category=new DbSqlPdo();

$sql='select * from menu where type=1 and parent_id='.$_SESSION['menu_id'];

$result=$dbpdo_category->select($sql);

require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_VIEW.POSTFIX_INC;
$category_view=new ViewMain($_SESSION['menu_id'], $_SESSION['loginroleid'], $_SESSION['loginuserid'],$rec_sql_suffix,$rec_table,$rec_col,$_SESSION['page']);

$count_category=0;
$return_arr['content']['tips_nav']=$category_view->gen_navpos_html();
$return_arr['content']['page_bar']='';
$return_arr['content']['menu_func']='';
$return_arr['content']['tips']='';

$return_arr['content']['content']='';
$return_arr['content']['content'].='<div style="float:left">';
foreach ($result as $val){
	$return_arr['content']['content'].='<a id="menu_subc_'.$val['id'].'" name="'.$val['modelname'].'"> '.$val['name'].' | </a>';
}
$return_arr['content']['content'].='</div>';
//$return_arr['0']['0']='zzzzzzzzzzzz';

require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_RETURN.POSTFIX_INC;
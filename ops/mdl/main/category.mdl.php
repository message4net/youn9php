<?php 
$dbpdo_category=new DbSqlPdo();

$sql='select * from wordbook where type=4000';

$result=$dbpdo_category->select($sql);

require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_VIEW.POSTFIX_INC;
$category_view=new ViewMain($_SESSION['menu_id'], $_SESSION['loginroleid'], $_SESSION['loginuserid'],$rec_sql_suffix,$rec_table,$rec_col,$_SESSION['page']);

$count_category=0;
$return_arr['content']['tips_nav']=$category_view->gen_navpos_html();;
$return_arr['content']['content']='';
foreach ($result as $val){
	$return_arr['content']['content'].='<a id="'.$val[''].'_category_menu3d"></a>';
}

<?php

if ($_SESSION ['loginflag'] == 1 && $_SESSION['loginduration']>time()) {
	$db_menu=new DbSqlPdo();
	$tmpmenusql='select m.id,m.name from menu m,menu ms, role_menu rm where ms.type=0 and m.id=ms.parent_id and ms.id=rm.menu_id and rm.role_id='.$_SESSION['loginroleid'].' group by m.id order by m.id';
	$result_menu=$db_menu->select($tmpmenusql);
	$returnhtml='<div id="div_menu"><ul>';
	foreach ($result_menu as $val) {
		$returnhtml.='<li><a id="'.$val['id'].'" href="javascript:void(0);">'.$val['name'].'</a></li>';
	}
	$returnhtml.='</ul></div>';
	$return_arr['show']=array('main_left','main_right','info');
	$return_arr['hide']=array('main_login');
//	$return_arr['content']=array('span_info'=>$_SESSION['loginname'],'menu_nav'=>$returnhtml);
	$return_arr['content']['span_info']=$_SESSION['loginname'];
	$return_arr['content']['menu_nav']=$returnhtml;
//	$return_arr['content']['content']='';
	unset($val,$result_menu,$returnhtml,$tmpmenusql,$db_menu);
} else {
	$return_arr['hide']=array('main_left','main_right');
	$return_arr['show']=array('main_login');

	if ($_SESSION[loginduration]<=time() && !is_null($_SESSION['loginduration'])){
		$returnarr['content']=array(
				'tips_login'=>'<span style="float:left;font-size:12px;color:green"><b><i>登录超时，请重新登录</b></i></span>'
		);
	}
	$_SESSION=array();
	session_destroy();
}
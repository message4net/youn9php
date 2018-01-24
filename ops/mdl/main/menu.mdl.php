<?php

if ($_SESSION ['loginflag'] == 1 && $_SESSION['loginduration']>time()) {
	$db_menu=new DbSqlPdo();
	//$tmpmenusql='select id,name from menu m,(SELECT distinct(parent_id) parent_id FROM menu m,role_menu mr WHERE m.id=mr.menu_sub_id and mr.role_id='.$_SESSION['loginroleid'].') mp where mp.parent_id=m.id;';
	//$tmpmenusql='select id,name from menu m,(SELECT distinct(parent_id) parent_id FROM menu m,role_menu_func rmf WHERE m.id=rmf.menu_sub_id and rmf.role_id='.$_SESSION['loginroleid'].' group by rmf.menu_sub_id) mp where mp.parent_id=m.id;';
	$tmpmenusql='select m.id,m.name from menu m,menu ms, role_menu rm where m.id=ms.parent_id and ms.id=rm.menu_id and rm.role_id='.$_SESSION['loginroleid'].' group by m.id';
	$result_menu=$db_menu->select($tmpmenusql);
	$returnhtml='<div id="div_menu"><ul>';
	foreach ($result_menu as $val) {
		$returnhtml.='<li><a id="'.$val['id'].'" href="javascript:void(0);">'.$val['name'].'</a></li>';
	}
	$returnhtml.='</ul></div>';
	$return_arr['show']=array('main_left','main_right','info');
	$return_arr['hide']=array('main_login');
	$return_arr['content']=array('span_info'=>$_SESSION['loginname'],'menu_nav'=>$returnhtml);

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
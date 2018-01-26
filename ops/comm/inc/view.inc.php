<?php

class ViewMain extends DbSqlPdo {
//class ViewMain {
	private $rec_init_arr=array();
	private $rec_word_search='';
	private $strtips_tmp='';
	/**
	 *功能:构造函数，使用父类__construct，连接数据库
	 *	必有参数:
	 *		$menu_id,$login_role_id,$login_user_id,$rec_sql_suffix,$rec_table,
	 *		//$rec_col,
	 *	默认参数:
	 *		$rec_pagenum_post_tmp,
	 *	选有参数:
	 *		$para_arr['search']['col'],$para_arr['search']['word'],
	 *
	 */
	public function __construct($menu_id,$login_role_id,$login_user_id,$rec_sql_suffix,$rec_table='',$rec_col='',$rec_pagenum_post_tmp=1,$para_arr=array()){
		//public function __construct($menu_sub_id,$login_role_id,$rec_pagenum_post_tmp=1,$rec_word_search='',$rec_col_search=''){
		parent::__construct();
		$this->menu_id=$menu_id;
		$this->login_role_id=$login_role_id;
		$this->login_user_id=$login_user_id;
		$this->pagenum_per=PERPAGENO;
		$this->rec_pagenum_post_tmp=$rec_pagenum_post_tmp;
		$this->rec_table=$rec_table;
		$this->rec_col=$rec_col;
		$this->rec_sql_suffix='select '.$rec_col.$rec_sql_suffix;
		$this->rec_sql_suffix1=$rec_sql_suffix;
		//if ($rec_word_search!=''){
		//	$this->rec_word_search=$rec_col_search.' like \'%'.$rec_word_search.'%\' ';
		//}
		$this->rec_init_arr=$this->init_recarr();
	}
	
	/**
	 * 功能:生成设置相关功能的浏览html
	 */
	public function gen_set_view_html($rec_id=''){
		$_sql_role_q='select * from role where id='.$rec_id;
		$_result_role_q=parent::select($_sql_role_q);
		if ($_result_role_q['0']['creator']==1){
		  $_sql_menu_q='select * from menu where parent_id>0';
		  $_sql_view_q='select * from wordbook where type>=0 and type<1000';
		  $_sql_func_q='select * from wordbook where type>=1000 and type<3000';
		}else{
		  $_sql_menu_q='select m.* from menu m, role_menu rm where m.parent_id>0 and m.id=rm.menu_id';
		  $_sql_view_q='select wb.* from wordbook wb, role_wordbook rwb where wb.id=rwb.wordbook_id and wb.type>=0 and wb.type<1000';
		  $_sql_func_q='select wb.* from wordbook wb, role_wordbook rwb where wb.id=rwb.wordbook_id and type>=1000 and type<3000';
		  //$_sql_menu_q='select m.* from menu m, role_menu_func rmf where m.parent_id>0 and m.id=rmf.menu_sub_id and rmf.role_id='.$rec_id.' group by m.id';
		  //$_sql_view_q='select wb.* from wordbook wb, role_menu_func rmf where wb.menu_sub_id=rmf.menu_sub_id and wb.menu_sub_id=rmf.menu_sub_id and wb.type>=0 and wb.type<1000 and rmf.role_id='.$rec_id;
		  //$_sql_func_q='select wb.* from wordbook wb, role_menu rmf where wb.menu_sub_id=rmf.menu_sub_id and wb.menu_sub_id=rmf.menu_sub_id type>=1000 and type<3000 and rmf.role_id='.$rec_id;
		}
		$_result_menu_q=parent::select($_sql_menu_q);
		$_result_view_q=parent::select($_sql_view_q);
		$_result_func_q=parent::select($_sql_func_q);
		$_arr_view=array();
		$_arr_func=array();
		if ($_result_view_q){
		    foreach ($_result_view_q as $_val){
		        $_arr_view[$_val['menu_id']][$_val['id']]=$_val;
		    }
		}
		if ($_result_func_q){
		    foreach ($_result_func_q as $_val4){
		        $_arr_func[$_val4['menu_id']][$_val4['id']]=$_val4;
		    }
		}
		$_return_html='<table><tr><th>名称</th><th>分类</th><th id="'.$_result_role_q['0']['id'].'" name="setid" colspan="3">'.$_result_role_q['0']['name'].'</th></tr>';
		if ($_result_menu_q){
		    foreach ($_result_menu_q as $_val1){
		        $_return_html.='<tr><td rowspan="2">'.$_val1['name'].'</td><td><input type="checkbox" name="vwckall'.$_val1['id'].'"/>浏览</td><td>';
		        $_count=0;
		        if (isset($_arr_view[$_val1['id']])){
		            foreach ($_arr_view[$_val1['id']] as $_val2){
		                $_return_html.='<input type="checkbox" name="vwcksub'.$_val1['id'].'" id="'.$_val2['id'].'" ';
		                if ($_val2['flag_set']==1){
		                	$_return_html.='checked="checked" disabled="disabled"';
		                }
		                $_return_html.='/>'.$_val2['name'];
		                $_count++;
		                if ($_count>4){
		                	$_return_html.='<br/>';
		                	$_count=0;
		                }
		            }
		        }else{
		            $_return_html.='无';
		        }
		        $_return_html.='</td><td rowspan="2"><input type="button" id="vwset_set_'.$_val1['id'].'" value="保存"/></td></tr><tr><td><input type="checkbox" name="stckall'.$_val1['id'].'"/>功能</td><td>';
		        $_count=0;
		        if (isset($_arr_func[$_val1['id']])){
		            foreach ($_arr_func[$_val1['id']] as $_val3){
		                $_return_html.='<input type="checkbox" name="stcksub'.$_val1['id'].'" id="'.$_val3['id'].'"/>'.$_val3['name'];
		                $_count++;
		                if ($_count>4){
		                	$_return_html.='<br/>';
		                	$_count=0;
		                }
		            }
		        }else{
		            $_return_html.='无';
		        }
		        $_return_html.='</td></tr>';
		    }
		}
		$_return_html.='<tr><td colspan="4" style="text-align:center"><span style="text-align:center"><input type="button" id="vwset_setall" value="批保存"/></span></td></tr></table>';
		return $_return_html;
	}
	
	/**
	 * 功能:生成修改相关功能的浏览html
	 */
	public function gen_mod_view_html($rec_id=''){
		//$rec_odr_sql='select wb.* from wordbook wb, role_menu_func rmf where type>=0 and type<1000 and role_id='.$this->login_role_id.' and wb.id=rmf.wordbook_id and wb.menu_sub_id='.$this->menu_sub_id.' order by odr';
		$rec_odr_sql='select wb.* from wordbook wb, role_wordbook rwb where type>=0 and type<1000 and role_id='.$this->login_role_id.' and wb.id=rwb.wordbook_id and wb.menu_id='.$this->menu_id.' order by odr';
		$rec_odr_result=parent::select($rec_odr_sql);
		$rec_id_result=array();
		if ($rec_id!=''){
			$rec_id_result=parent::select($this->rec_sql_suffix);
		}
		
		//$rec_view_spcial_arr=array();
		$_return_html='<table>';
		foreach ($rec_odr_result as $val){
			if ($val['flag_mod']==0){
				switch ($val['type']){
					case '0':
						$_return_html.='<tr><td>'.$val['name'].'</td><td><input id="'.$val['colnameid'].'" type="text" value="';
						if ($rec_id_result){
							$_return_html.=$rec_id_result[0][$val['colnameid']];
						}
						$_return_html.='"/></td></tr>';
						break;
					case '1':
						$_arr_colname_tmp=explode(',', $val['sql_col_str']);
						$_sql_tmp_menu=$val['sql_relate'];
						$_result_tmp_menu=parent::select($_sql_tmp_menu);
						$_arr_menu=array();
						if ($rec_id!=''){
							$_sql_tmp=$val['sql_main'].$val['sql_suffix'].$rec_id.$val['sql_postfix'].$val['sql_main1'];
							$_result_tmp=parent::select($_sql_tmp);
							if ($_result_tmp){
								foreach ($_result_tmp as $val3){
									$_arr_menu[$val3[$_arr_colname_tmp[0]]]=$val3[$_arr_colname_tmp[1]];
								}
							}
						}
						if ($_result_tmp_menu){
		//$t='';
							$_return_html.='<tr><td><input type="checkbox" name="ckall'.$val['id'].'"/>'.$val['name'].'</td><td>';
							foreach ($_result_tmp_menu as $val2){
		//$t.='#2_0#'.$val2[$_arr_colname_tmp[0]];
								$_return_html.='<input name="cksub'.$val['id'].'" type="checkbox"  value="'.$val2[$_arr_colname_tmp[0]].'" ';
								if ($val2['flag_set']==1){
									$_return_html.='checked="checked" disabled="disabled"';
								}else{
									if (array_key_exists($val2[$_arr_colname_tmp[0]], $_arr_menu)){
									//if ($val2[$_arr_colname_tmp[0]]==$val3[$_arr_colname_tmp[0]]){
										$_return_html.='checked="checked"';
									}
								}
								$_return_html.='"/>'.$val2[$_arr_colname_tmp[1]];
							}
		//$t.='#v#'..'@';
							$_return_html.='</td></tr>';
						}
						break;
					default:
						break;
				}
			}
		}
		$_return_html.='<tr><td colspan="2"><button id="vwmod_';
		if ($rec_id==''){
			//$_return_html.='<tr><td colspan="2"><button id="vwmod_add">保存</button></td></tr></table>';
			$_return_html.='add';
		}else{
			//$_return_html.='<tr><td colspan="2"><button id="vwmod_mod_'.$rec_id.'">保存</button></td></tr></table>';
			$_return_html.='mod_'.$rec_id;
		}
		$_return_html.='">保存</button></td></tr></table>';
		return $_return_html;
		//return $this->rec_sql_suffix;
		//return $t;
	}
	
	/**
	 * 功能:解析传入参数
	 */
	public function parse_para_arr($para_arr=array()){
	//if (is_array($para_arr)){
		foreach ($para_arr as $key=>$val){
			switch ($key){
				case search:
					$_return_arr['search']=$val['col'].' like \'%'.$val['word'].'%\' ';
				break;
				default:
				break;
			}
		}
		return $_return_arr;
	//}
	}
	/**
	 * 功能:生成当前pagenum
	 */
	public function gen_rec_pagenum_post(){
		if(is_numeric($this->rec_pagenum_post_tmp)){
			if($this->rec_pagenum_post_tmp==0){
				$this->rec_pagenum_post_tmp=1;
			}else{
				if ($this->rec_pagenum_post_tmp>$this->rec_init_arr['rec_pagenum_total']) {
					$this->rec_pagenum_post_tmp=$this->rec_init_arr['rec_pagenum_total'];
				}
			}
		}else{
			$this->rec_pagenum_post_tmp=1;
		}

		$rec_pagenum_post=$this->rec_pagenum_post_tmp;

		return $rec_pagenum_post;

	}
	/**
	 * 生成$this->rec_init_arr[rec_pagenum_total]
	 */
	public function gen_rec_pagenum_total(){
		$rec_count_sql='select count(*) ct '.$this->rec_sql_suffix1;
		$rec_count_result=parent::select($rec_count_sql);
		$rec_count_result[0]['ct']==0?$rec_pagenum_total=1:$rec_pagenum_total=ceil($rec_count_result[0]['ct']/$this->pagenum_per);
		$rec['count']=$rec_count_result[0]['ct'];
		$rec['pagenum_total']=$rec_pagenum_total;

		return $rec;
	}

	/**
	 *初始化数据
	 */
	public function init_recarr(){
		$rec_tablename_sql='select * from menu where id='.$this->menu_id;
		$rec_tablename_result=parent::select($rec_tablename_sql);
		//$this->rec_table=$rec_tablename_result[0]['tablename'];
		$this->rec_init_arr['menusub_parent_id']=$rec_tablename_result[0]['parent_id'];
		$rec=$this->gen_rec_pagenum_total();
		$this->rec_init_arr['rec_pagenum_total']=$rec['pagenum_total'];
		$this->rec_init_arr['rec_count']=$rec['count'];
		$this->rec_init_arr['rec_pagenum_post']=$this->gen_rec_pagenum_post($this->rec_pagenum_post_tmp);
		$this->rec_init_arr['rec_num_start']=(($this->rec_init_arr['rec_pagenum_post']-1)*$this->pagenum_per);
		if($this->rec_init_arr['rec_num_start']>=$this->rec_init_arr['rec_count']) $this->rec_init_arr['rec_num_start']=$this->rec_init_arr['rec_count']-$this->rec_init_arr['rec_count']%$this->pagenum_per;

		//$this->rec_init_arr[sql_tmp]=$rec[sql_tmp];

		return $this->rec_init_arr;
	}

	/**
	 *生成page_bar div 内的 html 内容
	 */
	public function gen_pagebar_html(){

		$pagebar_html='<div style="margin-top:5px"><b>当前页数/总页数:'.$this->rec_init_arr['rec_pagenum_post'].'/'.$this->rec_init_arr['rec_pagenum_total'].'</b>&nbsp;&nbsp;';
		if($this->rec_init_arr['rec_pagenum_post']==1){
			if($this->rec_init_arr['rec_pagenum_post']<>$this->rec_init_arr['rec_pagenum_total'])
				$pagebar_html.='首页&nbsp;&nbsp;上一页&nbsp;&nbsp;<a href="javascript:void(0);" id="'.($this->rec_init_arr['rec_pagenum_post']+1).'">下一页</a>&nbsp;&nbsp;<a href="javascript:void(0);" id="'.$this->rec_init_arr['rec_pagenum_total'].'">尾页</a>&nbsp;&nbsp;';
		}else{
			if($this->rec_init_arr['rec_pagenum_post']<>$this->rec_init_arr['rec_pagenum_total']) $pagebar_html.='<a href="javascript:void(0);" id="1">首页</a>&nbsp;&nbsp;<a href="javascript:void(0);" id="'.($this->rec_init_arr['rec_pagenum_post']-1).'">上一页</a>&nbsp;&nbsp;<a href="javascript:void(0);" id="'.($this->rec_init_arr['rec_pagenum_post']+1).'">下一页</a>&nbsp;&nbsp;<a href="javascript:void(0);" id="'.$this->rec_init_arr['rec_pagenum_total'].'">尾页</a>&nbsp;&nbsp;';
			else $pagebar_html.='<a href="javascript:void(0);" id="1">首页</a>&nbsp;&nbsp;<a href="javascript:void(0);" id="'.($this->rec_init_arr['rec_pagenum_post']-1).'">上一页</a>&nbsp;&nbsp;下一页&nbsp;&nbsp;尾页&nbsp;&nbsp;';
		}
		$pagebar_html.='跳转至<input id="pageinput" type="text" style="width:25px;"/>页';
		$pagebar_html.='<button id="pagebutton" type="button"><span style="width:50px;font-size:9px">跳转</span></button></div>';

		return $pagebar_html;
	}
	
	/**
	 *生成content div 内的 html 内容
	 */
	public function gen_view_content_html(){
		$sql_head_user='select * from user_wordbook where user_id='.$this->login_user_id;
		$result_head_user=parent::select($sql_head_user);
		if($result_head_user){
			//$rec_odr_sql='select wb.* from wordbook wb, role_func rf, user_col uc where type>=0 and type<1000 and role_id='.$this->login_role_id.' and uc.user_id='.$this->login_user_id.' and uc.menu_sub_id=wb.menu_sub_id and uc.wordbook_id=wb.id and wb.menu_sub_id=rf.menu_sub_id and wb.id=rf.wordbook_id and wb.menu_sub_id='.$this->menu_sub_id.' order by odr';
			$rec_odr_sql='select wb.* from wordbook wb, role_wordbook rwb, user_wordbook uwb where type>=0 and type<1000 and role_id='.$this->login_role_id.' and uwb.user_id='.$this->login_user_id.' and uwb.wordbook_id=wb.id and wb.menu_id=rwb.menu_id and wb.id=rwb.wordbook_id and wb.menu_id='.$this->menu_id.' order by odr';
		}else{
			//$rec_odr_sql='select wb.* from wordbook wb, role_func rf where type>=0 and type<1000 and role_id='.$this->login_role_id.' and wb.id=rf.wordbook_id and wb.menu_sub_id='.$this->menu_sub_id.' order by odr';
			$rec_odr_sql='select wb.* from wordbook wb, role_wordbook rwb where type>=0 and type<1000 and role_id='.$this->login_role_id.' and wb.id=rwb.wordbook_id and wb.menu_id='.$this->menu_id.' order by odr';
		}
		//$rec_head_result=parent::select($rec_head_sql);
		$rec_odr_result=parent::select($rec_odr_sql);

		$rec_sql_body=$this->rec_sql_suffix.' order by id desc limit '.$this->rec_init_arr['rec_num_start'].','.$this->pagenum_per.';';;
		$rec_result_body=parent::select($rec_sql_body);
		
		//$rec_sql_func='select * from wordbook wb, role_func rf where type>=1000 and type<2000 and role_id='.$this->login_role_id.' and wb.id=rf.wordbook_id and wb.menu_sub_id='.$this->menu_sub_id.' order by odr';
		//$rec_sql_func_menu='select * from wordbook wb, role_func rf where type>=2000 and type<3000 and role_id='.$this->login_role_id.' and wb.id=rf.wordbook_id and wb.menu_sub_id='.$this->menu_sub_id.' order by odr';
		$rec_sql_func='select wb.* from wordbook wb, role_wordbook rwb where type>=1000 and type<2000 and role_id='.$this->login_role_id.' and wb.id=rwb.wordbook_id and wb.menu_id='.$this->menu_id.' order by odr';
		$rec_sql_func_menu='select wb.* from wordbook wb, role_wordbook rwb where type>=2000 and type<3000 and role_id='.$this->login_role_id.' and wb.id=rwb.wordbook_id and wb.menu_id='.$this->menu_id.' order by odr';
		$rec_result_func=parent::select($rec_sql_func);
		$rec_result_func_menu=parent::select($rec_sql_func_menu);
		
		$rec_view_spcial_arr=array();
////$r_sql_tmp='';
		foreach ($rec_odr_result as $val){
			$_str_tmp='';
			switch ($val['type']){
				case '6':
////$r_sql_tmp.=$val['id'].'@';
					$_arr_colname_tmp=explode(',', $val['sql_col_str']);
					foreach ($rec_result_body as $val1){
						$_str_tmp.='\''.$val1[$val['colnameid']].'\',';
					}
					$_str_tmp=substr($_str_tmp,0,strlen($_str_tmp)-1);
					$_sql_tmp=$val['sql_main'].$val['sql_suffix'].$_str_tmp.$val['sql_postfix'].$val['sql_main1'];
					$_result_tmp=parent::select($_sql_tmp);
////$r_sql_tmp.=$_sql_tmp.';@';
					if ($_result_tmp){
						foreach ($_result_tmp as $val2){
//////foreach ($_result_tmp as $k2=>$val2){
//////$r_sql_tmp.=$k2.'#';
//////foreach ($val2 as $k3=>$v3){
//////	$r_sql_tmp.=$k3.'##'.$v3.'##';
//////}
							$rec_view_spcial_arr[$val['id']][$val2[$_arr_colname_tmp[0]]]=$val2[$_arr_colname_tmp[1]];
						}
					}
				break;
				case '1':
					$_arr_colname_tmp=explode(',', $val['sql_col_str']);
					foreach ($rec_result_body as $val1){
						$_sql_tmp=$val['sql_main'].$val['sql_suffix'].$val1[$val['colnameid']].' '.$val['sql_postfix'].$val['sql_main1'];
						$_result_tmp=parent::select($_sql_tmp);
						if ($_result_tmp){
							$rec_view_spcial_arr[$val['id']][$val1[$_arr_colname_tmp[0]]]='';
							foreach ($_result_tmp as $val2){
								$rec_view_spcial_arr[$val['id']][$val1[$_arr_colname_tmp[0]]].=$val2[$_arr_colname_tmp[1]].'@';
							}
							
						}
					}
				break;
				default:
				break;
			}
		}

//return $_sql_tmp;
//$z=$rec_view_spcial_arr;
//if ($z){
//	$r='';
//	foreach ($z as $key=>$val){
//		foreach ($val as $key1=>$val1){
//			$r.='#K#'.$key1.'#V#'.$val1;
//		}
//		$r.='<br/>';
//	}
//}else{
//	$r='ERR';
//}
//return $r;

		if ($rec_odr_result && $rec_result_body){
			$_return_html_head='';
			$_return_html_body='';
			$_count=1;
			foreach ($rec_result_body as $val01){
				$_return_html_body.='<tr>';
				foreach ($rec_odr_result as $val){
					if ($_count==1){
						$_return_html_head_suffix='<th>';
						$_return_html_head_postfix='';
						if ($val['colnameid']=='id' && $val['type']==0){
							//$_return_html_head_suffix.='<th>';
							if ($rec_result_func_menu){
								//$_return_html_head_suffix='<th><input type="checkbox" id="0" name="contentall"/></th>';
								$_return_html_head_suffix.='<input type="checkbox" id="0" name="ckall0"/>';
							}
							if ($rec_result_func){
								$_return_html_head_postfix='<th style="text-align:center">操作</th>';
							}
						}
						$_return_html_head.=$_return_html_head_suffix.$val['name'].'</th>'.$_return_html_head_postfix;
					}
					switch ($val['type']){
						case '0':
							if ($val['colnameid']=='id'){
								$_return_html_body_suffix='<td>';
								$_return_html_body_tmp=$_count.'</td>';
								if ($rec_result_func_menu){
									$_return_html_body_suffix.='<input type="checkbox" id="'.$val01[$val['colnameid']].'" name="cksub0"/>';
								}else{
									$_return_html_body_suffix.='';
								}
								if ($rec_result_func){
									$_return_html_body_tmp.='<td>';
									foreach ($rec_result_func as $val02){
										$_return_html_body_tmp.='<a id="'.$val02['colnameid'].$val01[$val['colnameid']].'" href="javascript:void(0);"';
										if ($val02['flag']==1){
											$_return_html_body_tmp.=' onclick="if(confirm(\'确实要删除此条记录吗？\')) return true;else return false;"';
//										}else{
//											$_return_html_body_tmp.='<a id="'.$val02['colnameid'].$val01[$val['colnameid']].'" href="javascript:void(0);">'.$val02['name'].'</a>|';
										}
										$_return_html_body_tmp.='>'.$val02['name'].'</a>|';
									}
									$_return_html_body_tmp.='</td>';
								}
								$_return_html_body.=$_return_html_body_suffix.$_return_html_body_tmp;
							}else{
								$_return_html_body.='<td>'.$val01[$val['colnameid']].'</td>';
							}
						break;
						case '6':
							$_return_html_body.='<td>'.$rec_view_spcial_arr[$val['id']][$val01[$val['colnameid']]].'</td>';
						break;
						case '1':
							if (isset($rec_view_spcial_arr[$val['id']][$val01[$val['colnameid']]])){
								$_return_html_body.='<td>'.$rec_view_spcial_arr[$val['id']][$val01[$val['colnameid']]].'</td>';
							}else{
								$_return_html_body.='<td></td>';
							}
						break;
						default:
						break;
					}
				}
				$_return_html_body.='</tr>';
				$_count++;
			}
			$_return_html_head.='</tr>';
			$_return_html='<table>'.$_return_html_head.$_return_html_body.'</table>';
				
		}else{
			$_return_html='oops:<,暂无相关记录';
		}

		return $_return_html;
////return $r_sql_tmp;

	}

	/**
	 *功能:生成htmlid="tips_nav"中 对应导航位置的 html
	 */
	public function gen_navpos_html($tailname='',$menusub_parent_id=-1,$strtips=''){
		if($menusub_parent_id==-1) $menusub_parent_id=$this->menu_id;
		if($menusub_parent_id!=0){
			$_sql_tmp="select * from menu where id=".$menusub_parent_id;
			$navpos_result_tmp=parent::select($_sql_tmp);
			if($strtips==''){
				$strtips=$navpos_result_tmp[0]['name'];
			}else{
				$strtips=$navpos_result_tmp[0]['name'].'->'.$strtips;
			}
			return $this->gen_navpos_html($tailname,$navpos_result_tmp[0]['parent_id'],$strtips);
		}else{
			if($tailname==''){
				$strtips='<div style="float:left"><b>当前位置:<i>'.$strtips.'</i></b></div>';
			}else{
				$strtips='<div style="float:left"><b>当前位置:<i>'.$strtips.'->'.$tailname.'</i></b></div>';
			}
			return $strtips;
		}
	}
	
	/**
	 *功能:生成htmlid="menu_func"中 对应功能的 html
	 *categoryid=1 main.mdl.php使用
	 *categoryid=2 modify_view.mdl.php使用
	 *categoryid=3 set_view.mdl.php使用
	 */
	public function gen_func_html(){
		$func_html='';
//		switch ($category_id){
//			case 1:
				$func_left_sql='select * from wordbook where type>=2000 and type<2500 and menu_id='.$this->menu_id.' order by odr';
				$func_right_sql='select * from wordbook where type>=2500 and type<3000 and menu_id='.$this->menu_id.' order by odr';
//				break;
//			default:
//				//$func_left_sql='select * from wordbook where type=8 and menu_sub_id='.$this->menu_sub_id.' order by seq';
//				break;
//					
//		}
		$func_left_result=parent::select($func_left_sql);
		$func_right_result=parent::select($func_right_sql);
		$func_html='';
		if ($func_left_result) {
			$func_html.='<div style="float:left">';
			foreach ($func_left_result as $val){
				$func_html.='<a id="'.$val['colnameid'].'" href="javascript:void(0)">'.$val['name'].'</a>&nbsp|&nbsp';
			}
			$func_html.='</div>';
		}
		if ($func_right_result) {
			$func_html.='<div style="float:right;padding-right:200px">';
			foreach ($func_right_result as $val){
				switch ($val['type']) {
					case '2999':
						$_sql_tmp='select * from wordbook where parent_id='.$val['id'].' and type>=3000 and type<3100 and menu_id='.$this->menu_id;
						$_result_tmp=parent::select($_sql_tmp);
						if ($_result_tmp){
							$func_html.='<select id="search_bar" style="font-size:11px;width:70px;height:20px">';
							foreach ($_result_tmp as $val1){
								$func_html.='<option value="'.$val1['id'].'">'.$val1['name'].'</option>';
							}
							$func_html.='</select><input id="search_word" type="text" style="font-size:11px;width:110px;height:15px"/><button id="word_search" style="font-size:11px;width:44px;height:22px">搜索</button><button id="word_reset" style="font-size:11px;width:44px;height:22px">重置</button>';
							//$func_html.='</select><input id="search_word" type="text" style="font-size:11px;width:110px;height:15px"/><button id="word_search" style="font-size:11px;width:44px;height:22px">搜索</button>';
						}
					break;
				}
			}
			$func_html.='</div>';
		}
		return $func_html;
	}
}

<?php
$return_arr['content']['tips']='<div style="float:left">';
//$return_arr['0']['0']='test1';
//$return_arr[0][0]='#STRAT:';
switch ($_POST['fr']){
	case 'vwapd':
//		$return_html='<td rowspan="2">明细</td><td id="'.$html_e[APP_OPS]['td']['suffix'].$html_e[APP_OPS]['td']['a'].$_POST['menu'].'"><input type="checkbox" id="vwckall'.$_POST['menu'].'" value="浏览"/>浏览</td><td id="'.$html_e[APP_OPS]['td']['suffix'].$html_e[APP_OPS]['td']['c'].$_POST['menu'].'">';
		$return_html='<td rowspan="2">明细</td><td id="'.$html_e[APP_OPS]['td']['suffix'].$html_e[APP_OPS]['td']['a'].'b"><input type="checkbox" id="vwckallb" value="浏览"/>浏览</td><td id="'.$html_e[APP_OPS]['td']['suffix'].$html_e[APP_OPS]['td']['c'].'b">';
		//$return_arr['0']['0'].='vwapd';
		$sql_rwb_v_q='select wb.* from role_menu rm, role_wordbook rwb, wordbook wb where wb.type>=0 and wb.type<1000 and rm.role_id=rwb.role_id and rm.menu_id=wb.menu_id and rwb.wordbook_id=wb.id and rm.role_id='.$_SESSION['loginroleid'].' and wb.menu_id='.$_POST['menu'];
		$sql_rwb_f_q='select wb.* from role_menu rm, role_wordbook rwb, wordbook wb where wb.type>=1000 and wb.type<3000 and rm.role_id=rwb.role_id and rm.menu_id=wb.menu_id and rwb.wordbook_id=wb.id and rm.role_id='.$_SESSION['loginroleid'].' and wb.menu_id='.$_POST['menu'];
		$result_rwb_v_q=$db_modify->select($sql_rwb_v_q);
		$result_rwb_f_q=$db_modify->select($sql_rwb_f_q);
		if ($result_rwb_v_q){
			$count=0;
			foreach ($result_rwb_v_q as $val){
//				$return_html.='<input type="checkbox" id="vwcksub'.$_POST['menu'].'" value="'.$val['id'];
				$return_html.='<input type="checkbox" id="vwcksubb" value="'.$val['id'];
				if ($val['flag_set']==1){
					$return_html.='" disabled="disabled" checked="checked"';
				}
				$return_html.='"/>'.$val['name'];
				$count++;
				if ($count>4){
					$return_html.='<br/>';
					$count=0;
				}
			}
		}
		$return_html.='</td>';
//		$return_html1='<td id="'.$html_e[APP_OPS]['td']['suffix'].$html_e[APP_OPS]['td']['a'].$_POST['menu'].'_a"><input type="checkbox" id="stckall'.$_POST['menu'].'" value="功能"/>功能</td><td id="'.$html_e[APP_OPS]['td']['suffix'].$html_e[APP_OPS]['td']['c'].$_POST['menu'].'_a">';
		$return_html1='<td id="'.$html_e[APP_OPS]['td']['suffix'].$html_e[APP_OPS]['td']['a'].'b_a"><input type="checkbox" id="stckall'.'b" value="功能"/>功能</td><td id="'.$html_e[APP_OPS]['td']['suffix'].$html_e[APP_OPS]['td']['c'].'b_a">';
		if ($result_rwb_f_q){
			$count=0;
			foreach ($result_rwb_f_q as $val){
//				$return_html1.='<input type="checkbox" id="stcksub'.$_POST['menu'].'" value="'.$val['id'];
				$return_html1.='<input type="checkbox" id="stcksubb" value="'.$val['id'];
				if ($val['flag_set']==1){
					$return_html1.='" disabled="disabled" checked="checked"';
				}
				$return_html1.='"/>'.$val['name'];
				$count++;
				if ($count>4){
					$return_html1.='<br/>';
					$count=0;
				}
			}
		}
		$return_html1.='</td>';
		$return_arr['apd']['t_vwmod'][$html_e[APP_OPS]['tr']['rb'].'b_a_a']=$return_html;
		$return_arr['apd']['t_vwmod'][$html_e[APP_OPS]['tr']['rb'].'b_a_a_a']=$return_html1;
		break;
//	case 'setcol':
//	case 'setcolall':
//		$return_arr['0']['0']='setcol';
//		break;
    case 'set':
    case 'setall':
    case 'allset':
    	switch ($_POST['fr']){
    		case 'allset':
    			$arr_role=explode(',',$_POST['rb'.$_POST['rbbackarrk'].'alckarrv']);
    			break;
    		default:
    			$arr_role=explode(',',$_POST['id']);
    			break;
    	}
        $str_rwb_add='';
        $str_rwb_del='';
        $sql_rwb_add='';
        $sql_rwb_del='';
        $arr_sql_rm_i=array();
        $_arr_sql_mh_i=array();
        $_arr_sql_wbh_i=array();
        foreach ($arr_role as $val){
        	if ($_POST['fr']=='allset'){
        		$sql_rm_q='select * from role_menu where role_id='.$val.' and menu_id='.$_POST['rca'];
        		$result_rm_q=$db_modify->select($sql_rm_q);
        		$_sql_m_q='select * from menu where id='.$_POST['rca'].' and type=1';
        		$_result_m_q=$db_modify->select($_sql_m_q);
        		if ($_result_m_q){
       				$_sql_m_v='select * from role_menu where role_id='.$val.' and menu_id='.$_result_m_q['0']['parent_id'];
       				$_result_m_v=$db_modify->select($_sql_m_v);
//       				$_sql_wb_q='select * from wordbook where colnameid='.$_result_m_q['0']['parent_id'];
       				if (!$_result_m_v){
       					$_arr_sql_mh_i[$val]='insert into role_menu values('.$val.','.$_result_m_q['0']['parent_id'].')';
       				}
        		}
        		if (!$result_rm_q){
        			//$arr_sql_rm_i[$val]='insert into role_menu values ('.$val.','.$_POST['ckarrk'].')';
        			$arr_sql_rm_i[$val]='insert into role_menu values ('.$val.','.$_POST['rca'].')';
        		}
        	}
        	$sql_rwb_init='select wb.* from role_wordbook rwb, wordbook wb where rwb.wordbook_id=wb.id and role_id='.$val;
            $result_rwb_init=$db_modify->select($sql_rwb_init);
//$return_arr[0][0].='#'.$sql_rwb_init;
            $arr_rwb_init=array();
            $arr_rwb_init[$val]=array();
            if ($result_rwb_init){
                foreach ($result_rwb_init as $val1){
                    $arr_rwb_init[$val][$val1['menu_id']][]=$val1['id'];
                }
            }
            //$arr_k=explode(',',$_POST['ckarrk']);
            $arr_k=explode(',',$_POST['rbaackarrk']);
            $arr_rwb_post=array();
            $arr_rwb_post[$val]=array();
            $arr_rwb_post_view=array();
            $arr_rwb_post_set=array();
            $arr_rwb_add=array();
            $arr_rwb_del=array();
            $arr_sql_rwb_del=array();
            foreach ($arr_k as $val1){
            	$arr_rwb_post_view[$val1]=array();
            	$arr_rwb_post_set[$val1]=array();
//                if (isset($_POST['vwckarrv'.$val1]) && $_POST['vwckarrv'.$val1]!=''){
//                    $arr_rwb_post_view[$val1]=explode(',', $_POST['vwckarrv'.$val1]);
//                }
//                if (isset($_POST['stckarrv'.$val1]) && $_POST['stckarrv'.$val1]!=''){
//                    $arr_rwb_post_set[$val1]=explode(',', $_POST['stckarrv'.$val1]);
//                }
                if (isset($_POST['rb'.$val1.'vwckarrv']) && $_POST['rb'.$val1.'vwckarrv']!=''){
                    $arr_rwb_post_view[$val1]=explode(',', $_POST['rb'.$val1.'vwckarrv']);
                }
                if (isset($_POST['rb'.$val1.'stckarrv']) && $_POST['rb'.$val1.'stckarrv']!=''){
                    $arr_rwb_post_set[$val1]=explode(',', $_POST['rb'.$val1.'stckarrv']);
                }


//            	$arr_rwb_post[$val][$val1]=array_merge($arr_rwb_post_view[$val1],$arr_rwb_post_set[$val1]);
//                if (!isset($arr_rwb_init[$val][$val1])){
//                	$arr_rwb_init[$val][$val1]=array();
//                }
            	$arr_rwb_post[$val][$val1]=array_merge($arr_rwb_post_view[$val1],$arr_rwb_post_set[$val1]);
            	
            	switch ($_POST['fr']){
            		case 'allset':
            			$k_arr_post=$_POST['rca'];
            			break;
            		default:
            			$k_arr_post=$val1;
            			break;
            	}
                if (!isset($arr_rwb_init[$val][$k_arr_post])){
                	$arr_rwb_init[$val][$k_arr_post]=array();
                }
                
                $arr_rwb_add[$val][$val1]=array_diff($arr_rwb_post[$val][$val1], $arr_rwb_init[$val][$k_arr_post]);
                $arr_rwb_del[$val][$val1]=array_diff($arr_rwb_init[$val][$k_arr_post], $arr_rwb_post[$val][$val1]);
                if ($arr_rwb_add[$val][$val1]){
                	foreach ($arr_rwb_add[$val][$val1] as $val2){
                		$str_rwb_add.='('.$val.','.$val2.'),';
                	}
                }
                if ($arr_rwb_del[$val][$val1]){
                	$str_rwb_del='';
                	foreach ($arr_rwb_del[$val][$val1] as $val2){
                		$str_rwb_del.=$val2.',';
                	}
                	$str_rwb_del=substr($str_rwb_del,0,strlen($str_rwb_del)-1);
                	$arr_sql_rwb_del[$val][$val1]='delete from role_wordbook where role_id='.$val.' and wordbook_id in ('.$str_rwb_del.')';
                }
            }

        }
        if ($str_rwb_add!=''){
            $str_rwb_add=substr($str_rwb_add,0,strlen($str_rwb_add)-1);
            $sql_rwb_add='insert into role_wordbook values '.$str_rwb_add;
//$return_arr[0][0]=$sql_rwb_add;
            $return_arr['content']['tips'].='功能增设';
            if($db_modify->update($sql_rwb_add)){
                $return_arr['content']['tips'].='成功';
            }else{
                $return_arr['content']['tips'].=OPS_TIP_FAIL;
                //$return_arr['0']['0'].='#'.$sql_rwb_add;
            }
            $return_arr['content']['tips'].=',';
        }
        if ($arr_sql_rwb_del){
            $return_arr['content']['tips'].='功能减设';
            $flag_rwb_del=0;
            foreach ($arr_sql_rwb_del as $val){
            	foreach ($val as $val1){
	                if(!$db_modify->update($val1)){
	                    $flag_rwb_del=1;
	                }
                	//$return_arr['0']['0'].='#'.$val1;
            	}
            }
            if ($flag_rwb_del==1){
                $return_arr['content']['tips'].=OPS_TIP_FAIL;
            }else{
                $return_arr['content']['tips'].='成功';
            }
            $return_arr['content']['tips'].=',';
        }
        if ($arr_sql_rm_i){
        	$return_arr['content']['tips'].='菜单增设';
        	$flag_rm_i=0;
        	foreach ($arr_sql_rm_i as $val){
        		if (!$db_modify->update($val)){
        			$flag_rm_i=1;
        		}
        	}
        	if ($flag_rm_i==1){
        		$return_arr['content']['tips'].=OPS_TIP_FAIL;
        	}else{
        		$return_arr['content']['tips'].='成功';
       		}
       		$return_arr['content']['tips'].=',';
        }

        if ($_arr_sql_mh_i){
        	$return_arr['content']['tips'].='隐菜单增设';
        	$flag_rm_i=0;
        	foreach ($_arr_sql_mh_i as $val){
        		if (!$db_modify->update($val)){
        			$flag_rm_i=1;
        		}
        	}
        	if ($flag_rm_i==1){
        		$return_arr['content']['tips'].=OPS_TIP_FAIL;
        	}else{
        		$return_arr['content']['tips'].='成功';
        	}
        	$return_arr['content']['tips'].=',';
        }
        break;
	case 'mod':
	case 'add':
		$_sql_mn='select * from menu where id='.$_SESSION['menu_id'];
		$_result_mn=$db_modify->select($_sql_mn);
		$_sql_wb_arr='select * from wordbook where menu_id='.$_SESSION['menu_id'];
		$_result_wb_arr=$db_modify->select($_sql_wb_arr);
		$flag_q_w=0;
		$_wb_arr=array();
		$_wb_unq_arr=array();
		$_wb_unq_tip='';
		if ($_result_wb_arr){
			foreach ($_result_wb_arr as $val){
				$_wb_arr[$val['id']]=$val;
				$_sql_q_w='';
				$_sql_q_w_u='';
				$_sql_updt_set='';
				$_sql_inst_val='';
				$_sql_inst_col='';
				$_wb_unq_tip_name='';
				$_wb_unq_tip_val='';

				$_suffix_val_arr=array('ra','rc');
				foreach ($_suffix_val_arr as $val1){
					if (isset($_POST[$val1.'ackarrk']) && $_POST[$val1.'ackarrk']!=''){
						$_arr_val_k=explode(',', $_POST[$val1.'ackarrk']);
						foreach ($_arr_val_k as $val){
							if (isset($_POST[$val1.$val])&&isset($_wb_arr[$val])){
								$_sql_q_w.=$_wb_arr[$val]['colnameid'].'=\''.$_POST[$val1.$val].'\' and ';
								if ($_wb_arr[$val]['type']=='3'){
									$_sql_q_w_u.=$_wb_arr[$val]['colnameid'].'=\''.$_POST[$val1.$val].'\' and ';
									if ($_wb_unq_tip==''){
										if (isset($_POST[$val1.$val])&&$_POST[$val1.$val]!=''){
											//$_wb_unq_tip=$val['name'].'<i>'.$_POST['ra'.$val['id']].'</i>';
											$_wb_unq_tip_name=$_wb_arr[$val]['name'];
											$_wb_unq_tip_val=$_POST[$val1.$val];
										}
									}
								}
								$_sql_updt_set.=$_wb_arr[$val]['colnameid'].'=\''.$_POST[$val1.$val].'\',';
								$_sql_inst_val.='\''.$_POST[$val1.$val].'\',';
								$_sql_inst_col.=$_wb_arr[$val]['colnameid'].',';
							}
						}
					}
				}
				
				if ($_SESSION['menu_id']==4||$_SESSION['menu_id']==5){
					$_sql_q_w.='creator='.$_SESSION['loginroleid'].' and ';
					$_sql_q_w_u.='creator='.$_SESSION['loginroleid'].' and ';
					$_sql_inst_val.='\''.$_SESSION['loginroleid'].'\',';
					$_sql_inst_col.='creator,';
				}
			}
		}
				
		$result_vrf=array();
		if ($_sql_q_w_u!=''){
			$_sql_q_w_u='select * from '.$_result_mn['0']['modelname'].' where '.substr($_sql_q_w_u,0, strlen($_sql_q_w_u)-4);
			$result_vrf=$db_modify->select($_sql_q_w_u);
		}else{
			$return_arr['content']['tips']='缺少唯一设置，请联系管理员';
			require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_RETURN.POSTFIX_INC;
		}
		$flag_name=0;
		if (!$result_vrf){
			switch ($_POST['fr']){
				case 'mod':
					$sql_m='update '.$_result_mn['0']['modelname'].' set '.substr($_sql_updt_set,0, strlen($_sql_updt_set)-1).' where id='.$_POST['id'];
					$tips_tmp='修改';
					$flag_name=1;
					break;
				case 'add':
					$sql_m='insert into '.$_result_mn['0']['modelname'].' ('.substr($_sql_inst_col,0, strlen($_sql_inst_col)-1).') values ('.substr($_sql_inst_val,0, strlen($_sql_inst_val)-1).')';
					$tips_tmp='新增';
					$flag_name=1;
					break;
			}
		}else{
			switch ($_POST['fr']){
			case 'add':
				$return_arr['content']['tips']='<div style="float:left">'.$_wb_unq_tip_name.'<i>'.$_wb_unq_tip_val.'</i>已存在</div>';
				require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_RETURN.POSTFIX_INC;
				break;
			}
		}
		
		$return_arr['content']['tips'].='<i>'.$_wb_unq_tip_val.'</i>';
		$flag_sum=0;
		if ($flag_name==1){
			$flag_sum=1;
			$return_arr['content']['tips'].=$_wb_unq_tip_name.$tips_tmp;
			if($db_modify->update($sql_m)){
				$return_arr['content']['tips'].='成功,';
			}else{
				$return_arr['content']['tips'].=OPS_TIP_FAIL;
				require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_RETURN.POSTFIX_INC;
			}
		}
		$result_vrf=$db_modify->select($_sql_q_w_u);

		if (isset($_POST['rbb0ckarrk'])&&$_POST['rbb0ckarrk']!=''){
			$_sql_arr=array();
			$_sql_rb_init='select * from wordbook where id in ('.$_POST['rbb0ckarrk'].')';
			$_result_rb_init=$db_modify->select($_sql_rb_init);
			if ($_result_rb_init){
				foreach ($_result_rb_init as $val){
					$_mul_arr_n[$val['id']]=array();
					$_mul_arr_o[$val['id']]=array();
					$_mul_arr_ins[$val['id']]=array();
					$_mul_arr_del[$val['id']]=array();
					if (isset($_POST['rb'.$val['id'].'alckarrv'])&&$_POST['rb'.$val['id'].'alckarrv']!=''){
						$_mul_arr_n3=explode(',', $_POST['rb'.$val['id'].'alckarrv']);
						$_mul_arr_n[$val['id']]=array_merge($_mul_arr_n[$val['id']],$_mul_arr_n3);
					}
					
					$_sql_mul_arr_o=$val['sql_mod'].$result_vrf['0']['id'];
					$_result_mul_arr_o=$db_modify->select($_sql_mul_arr_o);
					if ($_result_mul_arr_o){
						foreach ($_result_mul_arr_o as $val1){
							$_mul_arr_o[$val['id']][]=$val1[$val['colnameid']];
						}
					}
					//menu_id=4独有
					if (isset($_POST['rbbx'.$val['id'].'ckarrk'])&&$_POST['rbbx'.$val['id'].'ckarrk']!=''){
						$_sub_arr_wb=explode(',',$_POST['rbbx'.$val['id'].'ckarrk']);
						$_str_sub='';
						foreach ($_sub_arr_wb as $val1){
							if (isset($_POST['rb'.$val1.'alckarrv'])&&$_POST['rb'.$val1.'alckarrv']!=''){
								$_str_sub.=$_POST['rb'.$val1.'alckarrv'].',';
								$_arr_tmp=explode(',',$_POST['rb'.$val1.'alckarrv']);
								$_mul_arr_n[$val['id']]=array_merge($_mul_arr_n[$val['id']],$_arr_tmp);
							}
						}
						$_sql_mul_arr_n2='select * from menu where prarent_id>0 and id in ('.substr($_str_sub,0, strlen($_str_sub)-1).') group by parent_id';
						$_result_mul_arr_n2=$db_modify->select($_sql_mul_arr_n2);
						if ($_result_mul_arr_n2){
							foreach ($_result_mul_arr_n2 as $val1){
								$_mul_arr_n[$val['id']][]=$val1['parent_id'];
							}
						}
					}

					//独有结束
					$_mul_arr_ins[$val['id']]=array_diff($_mul_arr_n[$val['id']], $_mul_arr_o[$val['id']]);
					$_mul_arr_del[$val['id']]=array_diff($_mul_arr_o[$val['id']], $_mul_arr_n[$val['id']]);
					if ($_mul_arr_ins[$val['id']]||$_mul_arr_del[$val['id']]){
						$_arr_str=explode('#', $val['str']);
						if ($_mul_arr_ins[$val['id']]){
							foreach ($_mul_arr_ins[$val['id']] as $val1){
								$_sql_arr[]='insert into '.$_arr_str['0'].' ('.$_arr_str['1'].') values ('.$result_vrf['0']['id'].','.$val1.')';
							}
						}
						if ($_mul_arr_del[$val['id']]){
							$_arr_tmp=explode(',', $_arr_str['1']);
							$_str_tmp='';
							foreach ($_mul_arr_del[$val['id']] as $val1){
								$_str_tmp.=$val1.',';
							}
							$_sql_arr[]='delete from '.$_arr_str['0'].' where '.$_arr_tmp['0'].'='.$result_vrf['0']['id'].' and '.$_arr_tmp['1'].' in ('.substr($_str_tmp,0, strlen($_str_tmp)-1).')';
						}
					}
				}
			}
			if ($_sql_arr){
				$_flag_deal=0;
				$return_arr['content']['tips'].='权限处理';
				foreach ($_sql_arr as $val){
					if (!$db_modify->update($val)){
						$_flag_deal=1;
					}
				}
				if ($_flag_deal==0){
					$return_arr['content']['tips'].='成功,';
				}else{
					$return_arr['content']['tips'].=OPS_TIP_FAIL;
				}
			}else{
				if ($flag_sum==1){
					$return_arr['content']['tips'].='无需处理';
				}else{
					$return_arr['content']['tips'].='测试下';
				}
			}
		}

		break;
	case 'alldel':
		//$sql_m_q='select * from menu where id='.$_POST['ckarrk'];
		$sql_m_q='select * from menu where id='.$_POST['rca'];
		$result_m_q=$db_modify->select($sql_m_q);
		//$return_arr['0']['0']=$sql_m_q;
		//break;
		if ($result_m_q['0']['flag_set']==1){
			$return_arr['content']['tips'].='该菜单为默认菜单，无法删除';
			//$return_arr['0']['0']=$sql_m_q;
			break;
		}
		//$sql_rm_d='delete from role_menu where menu_id='.$_POST['ckarrk'].' and role_id in ('.$_POST['id'].')';
		//$sql_rwb_q='select * from wordbook where type>=0 and type<3000 and menu_id='.$_POST['ckarrk'];
		$sql_rm_d='delete from role_menu where menu_id='.$_POST['rca'].' and role_id in ('.$_POST['rb'.$_POST['rbbackarrk'].'alckarrv'].')';
		$sql_rwb_q='select * from wordbook where type>=0 and type<3000 and menu_id='.$_POST['rca'];
		$result_rwb_q=$db_modify->select($sql_rwb_q);
		$str_rwb='';
		if ($result_rwb_q){
			foreach ($result_rwb_q as $val){
				$str_rwb.=$val['id'].',';
			}
			$str_rwb=substr($str_rwb,0,strlen($str_rwb)-1);;
		}
		if ($str_rwb!=''){
//			$sql_rwb_del='delete from role_wordbook where role_id in ('.$_POST['id'].') and wordbook_id in ('.$str_rwb.')';
			$sql_rwb_del='delete from role_wordbook where role_id in ('.$_POST['rb'.$_POST['rbbackarrk'].'alckarrv'].') and wordbook_id in ('.$str_rwb.')';
			$return_arr['content']['tips'].='功能删除';
			if ($db_modify->update($sql_rwb_del)){
				$return_arr['content']['tips'].='成功,';
			}else{
				$return_arr['content']['tips'].=OPS_TIP_FAIL;
			}
		}
		$return_arr['content']['tips'].='菜单删除';
		if ($db_modify->update($sql_rm_d)){
			$return_arr['content']['tips'].='成功,';
		}else{
			$return_arr['content']['tips'].=OPS_TIP_FAIL;
		}
		$_sql_mh_q='select a.role_id,a.menu_id from (select rm.* from role_menu rm ,menu m,menu m1 where rm.menu_id=m.id and m1.parent_id=m.id and m1.type=1 and m.type=0 and rm.role_id in ('.$_POST['rb'.$_POST['rbbackarrk'].'alckarrv'].') group by rm.role_id,rm.menu_id) a left join (select rm.role_id,m.parent_id from role_menu rm ,menu m where rm.menu_id=m.id and m.type=1 and rm.role_id in ('.$_POST['rb'.$_POST['rbbackarrk'].'alckarrv'].')) b on a.menu_id=b.parent_id and a.role_id=b.role_id where b.parent_id is null group by a.role_id,a.menu_id';
//$return_arr['0']['0']=$_sql_mh_q;
		$_result_mh_q=$db_modify->select($_sql_mh_q);
		if ($_result_mh_q){
			$_sql_mh_d='';
			$return_arr['content']['tips'].='隐菜单删除';
			$_flag=0;
//$return_arr['0']['0']='';
			foreach ($_result_mh_q as $val){
				$_sql_mh_d='delete from role_menu where role_id='.$val['role_id'].' and menu_id='.$val['menu_id'].';';
//$return_arr['0']['0'].=$_sql_mh_d;
				if (!$db_modify->update($_sql_mh_d)){
					$_flag=1;
				}
			}
			if ($_falg==1){
				$return_arr['content']['tips'].=OPS_TIP_FAIL;
			}else{
				$return_arr['content']['tips'].='成功';
			}
		}
		break;
	case 'del':
	case 'delall':
		$_sql_mn='select * from menu where id='.$_SESSION['menu_id'];
		$_result_mn=$db_modify->select($_sql_mn);
		//$_sql_wb_arr='select * from wordbook where menu_id='.$_SESSION['menu_id'];
		//$_result_wb_arr=$db_modify->select($_sql_wb_arr);
		
		$sql_m[$_result_mn['0']['name'].'记录删除']='delete from '.$_result_mn['0']['modelname'].' where id in ('.$_POST['id'].')';
		switch ($_SESSION['menu_id']){
			case '4':
				$sql_m['子权限设置']='update role set creator='.$_SESSION['loginroleid'].' where creator in ('.$_POST['id'].')';
				$sql_m['权限菜单删除']='delete from role_menu where role_id in ('.$_POST['id'].')';
				$sql_m['权限功能删除']='delete from role_wordbook where role_id in ('.$_POST['id'].')';
				break;
			case '5':
				$sql_m['子用户设置']='update user set creator='.$_SESSION['loginroleid'].' where creator in ('.$_POST['id'].')';
				$sql_m['用户功能删除']='delete from user_wordbook where user_id in ('.$_POST['id'].')';
				break;
		}
		
//		$sql_m['子权限设置']='update role set creator='.$_SESSION['loginroleid'].' where creator in ('.$_POST['id'].')';
//		$sql_m['权限删除']='delete from role where id in ('.$_POST['id'].')';
//		$sql_m['权限菜单删除']='delete from role_menu where role_id in ('.$_POST['id'].')';
//		$sql_m['权限功能删除']='delete from role_wordbook where role_id in ('.$_POST['id'].')';
//$count=0;
		foreach ($sql_m as $key=>$val){
			$return_arr['content']['tips'].=$key;
//$return_arr[$count]['0']=$key.':'.$val;			
			if($db_modify->update($val)){
				$return_arr['content']['tips'].='成功';
			}else{
				$return_arr['content']['tips'].=OPS_TIP_FAIL;
			}
//$count++;
		}
		require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.OPS_MDL_MAIN.DIRECTORY_SEPARATOR.OPS_FUNC_VIEW.POSTFIX_MDL;
		break;
}
$return_arr['content']['tips'].='</div>';
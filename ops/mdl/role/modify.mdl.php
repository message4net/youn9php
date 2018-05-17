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
//$return_arr['0']['0']='';
//if ($_arr_sql_mh_i){
//	foreach ($_arr_sql_mh_i as $val){
//		$return_arr['0']['0'].='#'.$val.'#';
//	}
//}else{
//	$return_arr['0']['0'].='AAAAAAAA';
//}
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
		//此处并未区别ckk,若需要可以考虑wordbook新类别中加入表名
		$flag_name=0;
		$sql_vrf='select * from role where creator='.$_SESSION['loginroleid'].' and name=\''.$_POST['ra2'].'\'';
		$result_vrf=$db_modify->select($sql_vrf);
		switch ($_POST['fr']){
			case 'mod':
				if (!$result_vrf){
					$sql_m='update role set name=\''.$_POST['ra2'].'\' where creator='.$_SESSION['loginroleid'].' and id='.$_POST['id'];
					$tips_tmp='修改';
					$flag_name=1;
				}
				break;
			case 'add':
				if (!$result_vrf){
					$sql_m='insert into role (name,creator) values (\''.$_POST['ra2'].'\','.$_SESSION['loginroleid'].')';
					$tips_tmp='新增';
					$flag_name=1;
				}else{
					$return_arr['content']['tips']='<div style="float:left">权限名<i>'.$_POST['ra2'].'</i>已存在</div>';
					require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_RETURN.POSTFIX_INC;
				}
				break;
		}
		$return_arr['content']['tips'].='<i>'.$_POST['ra2'].'</i>';
		if ($flag_name==1){
			$return_arr['content']['tips'].='权限名'.$tips_tmp;
			if($db_modify->update($sql_m)){
				$return_arr['content']['tips'].='成功,';
			}else{
				$return_arr['content']['tips'].=OPS_TIP_FAIL;
			}
		}
		$result_vrf=$db_modify->select($sql_vrf);
		$arr_i=array();
		if ($_POST['rbbackarrk']!=''){
			$sql_arr_init='select * from wordbook where id in ('.$_POST['rbbackarrk'].')';
			$result_arr_init=$db_modify->select($sql_arr_init);
//			$arr_init=array();
			if ($result_arr_init){
				$sql_t=$result_arr_init['0']['sql_mod'].$result_vrf['0']['id'];
				$result_t=$db_modify->select($sql_t);
				if ($result_t){
					$count=0;
					foreach ($result_t as $val3){
						$arr_i[$count]=$val3['id'];
						$count++;
					}
				}
			}
		}
		$arr_va=array();
		$arr_vb=array();
		if ($_POST['rb'.$_POST['rbbackarrk'].'alckarrv']!=''){
			$arr_va=explode(',', $_POST['rb'.$_POST['rbbackarrk'].'alckarrv']);
		}
		$sql_rwbh_i=array();
		$sql_rwbh_d=array();
		//if ($_POST['rb'.$_POST['rbbbckarrk'].'alckarrv']!=''){
		if ($_POST['rbbbckarrk']!=''){
			$_arr_m_s=explode(',', $_POST['rbbbckarrk']);
			foreach ($_arr_m_s as $val){
				$sql_mh='select * from wordbook where id='.$val;
				$result_mh=$db_modify->select($sql_mh);
				if ($result_mh){
					$arr_v[]=$result_mh['0']['colnameid'];
				}
				$sql_rwbh='select * from role_wordbook where role_id='.$result_vrf['0']['id'].' and wordbook_id='.$val;
				$result_rwbh=$db_modify->select($sql_rwbh);
				if ($_POST['rb'.$val.'alckarrv']!=''){
					$_arr_vb=explode(',', $_POST['rb'.$val.'alckarrv']);
					if (!$result_rwbh){
						$sql_rwbh_i[$val]='insert into role_wordbook values('.$result_vrf['0']['id'].','.$val.');';
					}
				}else{
					$_arr_vb=array();
					if ($result_rwbh){
						$sql_rwbh_d[$val]='delete from role_wordbook where role_id='.$result_vrf['0']['id'].' and wordbook_id='.$val;
					}
				}
				$arr_vb=array_merge($arr_vb,$_arr_vb);
			}
		}	

		$arr_v=array_merge($arr_va,$arr_vb);

		
//		$sql_mh='select * from wordbook where id='.$_POST['rbbbckarrk'];
//		$result_mh=$db_modify->select($sql_mh);
//		$sql_rwbh='select * from role_wordbook where role_id='.$result_vrf['0']['id'].' and wordbook_id='.$_POST['rbbbckarrk'];
//		$result_rwbh=$db_modify->select($sql_rwbh);
//		$return_arr['content']['tips'].='隐权限';
//		if ($_POST['rb'.$_POST['rbbbckarrk'].'alckarrv']!=''){
//			if ($result_mh){
//				$arr_v[]=$result_mh['0']['colnameid'];
//			}
//			if (!$result_rwbh){
//				$sql_rwbh_i='insert into role_wordbook values('.$result_vrf['0']['id'].','.$_POST['rbbbckarrk'].');';
//				$return_arr['content']['tips'].='插入';
//				if ($db_modify->insert($sql_rwbh_i)){
//					$return_arr['content']['tips'].='成功';
//				}else{
//					$return_arr['content']['tips'].='失败';
//				}
//			}else{
//				$return_arr['content']['tips'].='无需更改';
//			}
//		}else{
//			if ($result_rwbh){
//				$sql_rwbh_d='delete from role_wordbook where role_id='.$result_vrf['0']['id'].' and wordbook_id='.$_POST['rbbbckarrk'];
//				$return_arr['content']['tips'].='删除';
//				if ($db_modify->insert($sql_rwbh_d)){
//					$return_arr['content']['tips'].='成功';
//				}else{
//					$return_arr['content']['tips'].='失败';
//				}
//			}else{
//				$return_arr['content']['tips'].='无需更改';
//			}
//		}
//		$return_arr['content']['tips'].='##';

		$arr_add=array_diff($arr_v, $arr_i);

		$arr_del=array_diff($arr_i, $arr_v);
//$return_arr['0']['0']='';
//foreach ($arr_del as $k=>$v){
//	$return_arr['0']['0'].='#K:'.$k.'#V:'.$v;
//
//}
$retrun_arr['0']['0']='';
		if ($arr_del){
$retrun_arr['0']['0'].='AAAAAAA';
			$return_arr['content']['tips'].='功能删除';
			$str='';
			foreach ($arr_del as $val1){
				$str.=$val1.',';
			}
			$str=substr($str,0,strlen($str)-1);
			if ($str!=''){
				$result_q_f=$db_modify->select('select * from wordbook where id<>133 and menu_id in ('.$str.')');
				if ($result_q_f){
					$str1='';
					foreach ($result_q_f as $val2){
						$str1.=$val2['id'].',';
					}
					$str1=substr($str1,0,strlen($str1)-1);
					if ($str1!=''){
						$sql_d_f='delete from role_wordbook where role_id='.$result_vrf['0']['id'].' and wordbook_id in ('.$str1.')';
						if ($db_modify->update($sql_d_f)){
							$return_arr['content']['tips'].='成功';
						}else{
							$return_arr['content']['tips'].=OPS_TIP_FAIL;
						}
					}
					$return_arr['content']['tips'].='菜单删除';
					$sql_d_m='delete from role_menu where role_id='.$result_vrf['0']['id'].' and menu_id in ('.$str.')';
					if ($db_modify->update($sql_d_m)){
						$return_arr['content']['tips'].='成功';
					}else{
						$return_arr['content']['tips'].=OPS_TIP_FAIL;
					}
				}
			}
		}else{
$retrun_arr['0']['0'].='CCCCCCCCCCCCCCC';
		}
		if ($arr_add){
$retrun_arr['0']['0'].='BBBBBBBBB';
			$str='';
			$str_sql_i_f='';
			foreach ($arr_add as $val1){
				$str.='('.$result_vrf[0]['id'].','.$val1.'),';
				$sql_q_f='select * from wordbook where flag_set=1 and menu_id='.$val1;
				$result_q_f=$db_modify->select($sql_q_f);
				if ($result_q_f){
					foreach ($result_q_f as $val2){
						$str_sql_i_f.='('.$result_vrf[0]['id'].','.$val2['id'].'),';
					}
				}
			}
			$str_sql_i_f=substr($str_sql_i_f,0,strlen($str_sql_i_f)-1);
			$str=substr($str,0,strlen($str)-1);
			if ($str!=''){
				$sql_i='insert into role_menu values '.$str;
				$return_arr['content']['tips'].='权限新增';
				if($db_modify->insert($sql_i)){
					$return_arr['content']['tips'].='成功,';
				}else{
					$return_arr['content']['tips'].=OPS_TIP_FAIL;
				}
			}
			if ($str_sql_i_f!=''){
				$sql_i_f='insert into role_wordbook values '.$str_sql_i_f;
				$return_arr['content']['tips'].='权限默认功能新增';
				if($db_modify->insert($sql_i_f)){
					$return_arr['content']['tips'].='成功,';
				}else{
					$return_arr['content']['tips'].=OPS_TIP_FAIL;
				}
			}
		}else{
$retrun_arr['0']['0'].='DDDDDDDDDDDD';
		}
//		}
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
		$sql_m['子权限设置']='update role set creator='.$_SESSION['loginroleid'].' where creator in ('.$_POST['id'].')';
		$sql_m['权限删除']='delete from role where id in ('.$_POST['id'].')';
		$sql_m['权限菜单删除']='delete from role_menu where role_id in ('.$_POST['id'].')';
		$sql_m['权限功能删除']='delete from role_wordbook where role_id in ('.$_POST['id'].')';
		foreach ($sql_m as $key=>$val){
			$return_arr['content']['tips'].=$key;
			if($db_modify->update($val)){
				$return_arr['content']['tips'].='成功';
			}else{
				$return_arr['content']['tips'].=OPS_TIP_FAIL;
			}
		}
		require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.OPS_MDL_MAIN.DIRECTORY_SEPARATOR.OPS_FUNC_VIEW.POSTFIX_MDL;
		break;
}
$return_arr['content']['tips'].='</div>';
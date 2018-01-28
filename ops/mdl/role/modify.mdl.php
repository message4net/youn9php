<?php
$return_arr['content']['tips']='<div style="float:left">';
$return_arr['0']['0']='test1';
switch ($_POST['fr']){
    case 'set':
    case 'setall':
        
        $arr_role=explode(',',$_POST['id']);
        //$str_rm_add='';
        $str_rwb_add='';
        //$str_rm_del='';
        $str_rwb_del='';
        //$sql_rm_add='';
        $sql_rwb_add='';
        //$sql_rm_del='';
        $sql_rwb_del='';
        foreach ($arr_role as $val){
            //$sql_rm_init='select * from role_menu where role_id='.$val;
            $sql_rwb_init='select * from role_wordbook where role_id='.$val;
            //$result_rm_init=$db_modify->select($sql_rm_init);
            $result_rwb_init=$db_modify->select($sql_rwb_init);
            //$arr_rm_init=array();
            $arr_rwb_init=array();
            //$arr_rm_init[$val]=array();
            $arr_rwb_init[$val]=array();
            //if ($result_rm_init){
            //    foreach ($result_rm_init as $val1){
            //        $arr_rm_init[$val][]=$val1['menu_id'];
            //    }
            //}
            if ($result_rwb_init){
                foreach ($result_rwb_init as $val1){
                    $arr_rwb_init[$val][]=$val1['wordbook_id'];
                }
            }
            $arr_k=explode(',',$_POST['ckarrk']);
            //$arr_rm_post=array();
            $arr_rwb_post=array();
            //$arr_rm_post[$val]=array();
            $arr_rwb_post[$val]=array();
            foreach ($arr_k as $val1){
                //$arr_rm_post[$val][]=$val1;
                $arr_rwb_post_view=array();
                $arr_rwb_post_set=array();
                if ($_POST['vwckarrv'.$val1]!=''){
                    $arr_rwb_post_view=explode(',', $_POST['vwckarrv'.$val1]);
                }
                if ($_POST['stckarrv'.$val1]){
                    $arr_rwb_post_set=explode(',', $_POST['stckarrv'.$val1]);
                }
                $arr_rwb_post[$val]=array_merge($arr_rwb_post_view,$arr_rwb_post_set);
            }
            //$arr_rm_add=array();
            //$arr_rm_del=array();
            $arr_rwb_add=array();
            $arr_rwb_del=array();
            //$arr_rm_add[$val]=array_diff($arr_rm_post[$val], $arr_rm_init[$val]);
            //$arr_rm_del[$val]=array_diff($arr_rm_init[$val], $arr_rm_post[$val]);
            $arr_rwb_add[$val]=array_diff($arr_rwb_post[$val], $arr_rwb_init[$val]);
            $arr_rwb_del[$val]=array_diff($arr_rwb_init[$val], $arr_rwb_post[$val]);
            //if ($arr_rm_add[$val]){
            //    foreach ($arr_rm_add[$val] as $val1){
            //        $str_rm_add.='('.$val.','.$val1.'),';
            //    }
            //}
            if ($arr_rwb_add[$val]){
                foreach ($arr_rwb_add[$val] as $val1){
                    $str_rwb_add.='('.$val.','.$val1.'),';
                }
            }
            $arr_sql_rwb_del=array();
            if ($arr_rwb_del[$val]){
                $str_rwb_del='';
                foreach ($arr_rwb_del[$val] as $val1){
                    $str_rwb_del.=$val1.',';
                }
                $str_rwb_del=substr($str_rwb_del,0,strlen($str_rwb_del)-1);
                $arr_sql_rwb_del[$val]='delete from role_wordbook where role_id='.$val.' and wordbook_id in ('.$str_rwb_del.')';
            }
            //if ($arr_rm_del[$val]){
            //    foreach ($arr_rm_del[$val] as $val1){
            //        $str_rm_del.=$val1.',';
            //    }
            //}
        }
        //if ($str_rm_add!=''){
        //    $str_rm_add=substr($str_rm_add,0,strlen($str_rm_add)-1);
        //    $sql_rm_add='insert into role_menu values '.$str_rm_add;
        //    $return_arr['content']['tips'].='菜单增设';
        //    if($db_modify->update($sql_rm_add)){
        //        $return_arr['content']['tips'].='成功';
        //    }else{
        //        $return_arr['content']['tips'].='失败';
        //    }
        //}
        if ($str_rwb_add!=''){
            $str_rwb_add=substr($str_rwb_add,0,strlen($str_rwb_add)-1);
            $sql_rwb_add='insert into role_wordbook values '.$str_rwb_add;
            $return_arr['content']['tips'].='功能增设';
            if($db_modify->update($sql_rwb_add)){
                $return_arr['content']['tips'].='成功';
            }else{
                $return_arr['content']['tips'].='失败';
                $return_arr['0']['0'].='#'.$sql_rwb_add;
            }
            $return_arr['content']['tips'].=',';
        }
        //if ($str_rm_del!=''){
        //    $str_rm_del=substr($str_rm_del,0,strlen($str_rm_del)-1);
        //    $sql_rm_del='delete from role_menu where role_id in ('.$str_rm_del.')';
        //    $return_arr['content']['tips'].='菜单减设';
        //    if($db_modify->update($sql_rm_del)){
        //        $return_arr['content']['tips'].='成功';
        //    }else{
        //        $return_arr['content']['tips'].='失败';
        //    }
        //}
        if ($arr_sql_rwb_del){
            $return_arr['content']['tips'].='功能减设';
            $flag_rwb_del=0;
            foreach ($arr_sql_rwb_del as $val){
                if(!$db_modify->update($val)){
                    $flag_rwb_del=1;
                }
                $return_arr['0']['0'].='#'.$val;
            }
            if ($flag_rwb_del==1){
                $return_arr['content']['tips'].='失败';
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
		$sql_vrf='select * from role where creator='.$_SESSION['loginroleid'].' and name=\''.$_POST['name'].'\'';
		$result_vrf=$db_modify->select($sql_vrf);
		switch ($_POST['fr']){
			case 'mod':
				if (!$result_vrf){
					$sql_m='update role set name=\''.$_POST['name'].'\' where creator='.$_SESSION['loginroleid'].' and id='.$_POST['id'];
					$tips_tmp='修改';
					$flag_name=1;
				}
				break;
			case 'add':
				if (!$result_vrf){
					$sql_m='insert into role (name,creator) values (\''.$_POST['name'].'\','.$_SESSION['loginroleid'].')';
					$tips_tmp='新增';
					$flag_name=1;
				}else{
					$return_arr['content']['tips']='<div style="float:left">权限名<i>'.$_POST['name'].'</i>已存在</div>';
					require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_RETURN.POSTFIX_INC;
				}
				break;
		}
		$return_arr['content']['tips'].='<i>'.$_POST['name'].'</i>';
		if ($flag_name==1){
			$return_arr['content']['tips'].='权限名'.$tips_tmp;
			if($db_modify->update($sql_m)){
				$return_arr['content']['tips'].='成功,';
			}else{
				$return_arr['content']['tips'].='<b>失败</b>,';
			}
		}
		$result_vrf=$db_modify->select($sql_vrf);
		$arr_k=explode(',',$_POST['ckarrk']);
		$sql_arr_init='select * from wordbook where id in ('.$_POST['ckarrk'].')';
		$result_arr_init=$db_modify->select($sql_arr_init);
		$arr_init=array();
		if ($result_arr_init){
			foreach ($result_arr_init as $val){
				$arr_init[$val['id']]=$val;
			}
		}
		if ($arr_k){
			foreach ($arr_k as $val){
				$arr_i=array();
				if (isset($arr_init[$val])){
					$sql_t=$arr_init[$val]['sql_mod'].$result_vrf['0']['id'];
					$result_t=$db_modify->select($sql_t);
					if ($result_t){
						$count=0;
						foreach ($result_t as $val3){
							$arr_i[$count]=$val3['menu_id'];
							$count++;
						}
					}
				}
				$arr_v=explode(',', $_POST['ckarrv'.$val]);
				$arr_add=array_diff($arr_v, $arr_i);
				$arr_del=array_diff($arr_i, $arr_v);
				if ($arr_del){
					$return_arr['content']['tips'].='功能删除';
					$str='';
					foreach ($arr_del as $val1){
						$str.=$val1.',';
					}
					$str=substr($str,0,strlen($str)-1);
					if ($str!=''){
						$result_q_f=$db_modify->select('select * from wordbook where menu_id in ('.$str.')');
						if ($result_q_f){
							$str1='';
							foreach ($result_q_f as $val2){
								$str1.=$val2['id'].',';
							}
							$str1=substr($str1,0,strlen($str1)-1);
							if ($str1!=''){
								$sql_d_f='delet from role_wordbook where role_id='.$result_vrf['0']['id'].' and wordbook_id in ('.$str1.')';
								if ($db_modify->update($sql_d_f)){
									$return_arr['content']['tips'].='成功';
								}else{
									$return_arr['content']['tips'].='失败';
								}
							}
							$return_arr['content']['tips'].='菜单删除';
							$sql_d_m='delete from role_menu where role_id='.$result_vrf['0']['id'].' and menu_id in ('.$str.')';
							if ($db_modify->update($sql_d_m)){
								$return_arr['content']['tips'].='成功';
							}else{
								$return_arr['content']['tips'].='失败';
							}
						}
					}
				}
				if ($arr_add){
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
							$return_arr['content']['tips'].='<b>失败</b>,';
						}
					}
					if ($str_sql_i_f!=''){
						$sql_i_f='insert into role_wordbook values '.$str_sql_i_f;
						$return_arr['content']['tips'].='权限默认功能新增';
						if($db_modify->insert($sql_i_f)){
							$return_arr['content']['tips'].='成功,';
						}else{
							$return_arr['content']['tips'].='<b>失败</b>,';
						}
					}
				}
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
				$return_arr['content']['tips'].='失败';
			}
		}
		require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.OPS_MDL_MAIN.DIRECTORY_SEPARATOR.OPS_FUNC_VIEW.POSTFIX_MDL;
		break;
	//case 'add':
	//	//此处并未区别ckk,若需要可以考虑wordbook新类别中加入表名
	//	$sql_vrf='select * from role where creator='.$_SESSION['loginroleid'].' and name=\''.$_POST['name'].'\'';
	//	$result_vrf=$db_modify->select($sql_vrf);
	//	if ($result_vrf){
	//		$return_arr['content']['tips']='<div style="float:left">权限名<i>'.$_POST['name'].'</i>已存在</div>';
	//		require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_RETURN.POSTFIX_INC;
	//	}
	//	$sql_i='insert into role (name,creator) values (\''.$_POST['name'].'\','.$_SESSION['loginroleid'].')';
	//	//$db_modify->insert($sql_i);
	//	$return_arr['content']['tips']='<i>'.$_POST['name'].'</i>权限名新增';
	//	if($db_modify->insert($sql_i)){
	//		$return_arr['content']['tips'].='成功,';
	//	}else{
	//		$return_arr['content']['tips'].='<b>失败</b>,';
	//	}
	//	$result_vrf=$db_modify->select($sql_vrf);
	//	$arr_k=explode(',',$_POST['ckarrk']);
	//	if ($arr_k){
	//		foreach ($arr_k as $val){
	//			$arr_v=explode(',', $_POST['ckarrv'.$val]);
	//			$str='';
	//			$str_sql_i_f='';
	//			if ($arr_v){
	//				foreach ($arr_v as $val1){
	//					$str.='('.$result_vrf[0]['id'].','.$val1.'),';
	//					$sql_q_f='select * from wordbook where flag_set=1 and menu_id='.$val1;
	//				
	//					$result_q_f=$db_modify->select($sql_q_f);
	//					if ($result_q_f){
	//						foreach ($result_q_f as $val2){
	//							$str_sql_i_f.='('.$result_vrf[0]['id'].','.$val2['id'].'),';
	//						}
	//					}
	//				}
	//				$str_sql_i_f=substr($str_sql_i_f,0,strlen($str_sql_i_f)-1);
	//				$str=substr($str,0,strlen($str)-1);
	//			}
	//		}
	//		if ($str!=''){
	//			$sql_i='insert into role_menu values '.$str;
	//			$return_arr['content']['tips'].='权限新增';
	//			if($db_modify->insert($sql_i)){
	//				$return_arr['content']['tips'].='成功,';
	//			}else{
	//				$return_arr['content']['tips'].='<b>失败</b>,';
	//			}
	//		}
	//		if ($str_sql_i_f!=''){
	//			$sql_i_f='insert into role_wordbook values '.$str_sql_i_f;
	//			$return_arr['content']['tips'].='权限默认功能新增';
	//			if($db_modify->insert($sql_i_f)){
	//				$return_arr['content']['tips'].='成功,';
	//			}else{
	//				$return_arr['content']['tips'].='<b>失败</b>,';
	//			}
	//		}
	//	}
	//	break;
}
$return_arr['content']['tips'].='</div>';
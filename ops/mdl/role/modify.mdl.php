<?php
$return_arr['content']['tips']='<div style="float:left">';
switch ($_POST['fr']){
	case 'set':
		$sql_q_rm='select * from role_menu where role_id='.$_POST['role'].' and menu_sub_id='.$_POST['id'];
		$result_q_rm=$db_modify->select($sql_q_rm);
		if(!$result_q_rm){
			$db_modify->insert('insert into role_menu ('.$_POST['role'].','.$_POST['id'].')');
		}
		break;
	case 'setall':
		break;
	case 'del':
		$sql_d='delete from role where id='.$_POST['id'];
		$sql_d_m='delete from role_menu where role_id='.$_POST['id'];
		$sql_d_f='delete from role_func where role_id='.$_POST['id'];
		$sql_q='select * from role where creator='.$_POST['id'];
		$result_q=$db_modify->select($sql_q);
		if ($result_q){
			$return_arr['content']['tips'].='子权限设置成功,';
			foreach ($result_q as $val1){
				$db_modify->update('update role set creator='.$_SESSION['loginroleid'].' where id='.$val1['id']);
			}
		}
		$db_modify->insert($sql_d);
		$db_modify->insert($sql_d_m);
		$db_modify->insert($sql_d_f);
		$return_arr['content']['tips'].='权限删除成功,';
		//$return_arr[0][0]=BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.OPS_MDL_MAIN.DIRECTORY_SEPARATOR.OPS_FUNC_VIEW.POSTFIX_MDL;
		//$return_arr[0][0]=$sql_d;
		require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.OPS_MDL_MAIN.DIRECTORY_SEPARATOR.OPS_FUNC_VIEW.POSTFIX_MDL;
		break;
	case 'delall':
	    $arr_id=explode(',', $_POST['id']);
	    if ($arr_id){
	        $str='';
	        foreach ($arr_id as $val){
	            $str.=$val.',';
	            $sql_q='select * from role where creator='.$val;
	            $result_q=$db_modify->select($sql_q);
	            if ($result_q){
	            	$return_arr['content']['tips'].='子权限设置成功,';
	            	foreach ($result_q as $val1){
	            		$db_modify->update('update role set creator='.$_SESSION['loginroleid'].' where id='.$val1['id']);
	            	}
	            }
	        }
	        $str=substr($str,0,strlen($str)-1);
	        $sql_d='delete from role where id in ('.$str.')';
	        $sql_d_m='delete from role_menu where role_id in ('.$str.')';
	        $sql_d_f='delete from role_func where role_id in ('.$str.')';
	        $return_arr['content']['tips'].='权限批删除成功,';
	        //$return_arr[0][0]=$sql_d;
	        $db_modify->insert($sql_d);
	        $db_modify->insert($sql_d_f);
	        $db_modify->insert($sql_d_m);
	        require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.OPS_MDL_MAIN.DIRECTORY_SEPARATOR.OPS_FUNC_VIEW.POSTFIX_MDL;
	    }
	    break;
	case 'add':
		//$return_arr[0][0]='';

		$sql_vrf='select * from role where creator='.$_SESSION['loginroleid'].' and name=\''.$_POST['name'].'\'';
		$result_vrf=$db_modify->select($sql_vrf);
		if ($result_vrf){
			$return_arr['content']['tips']='<div style="float:left">用户名已存在</div>';
			require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_RETURN.POSTFIX_INC;
		}
		$sql_i='insert into role (name,creator) values (\''.$_POST['name'].'\','.$_SESSION['loginroleid'].')';
		$db_modify->insert($sql_i);
//$return_arr[0][0].=$sql_i.';';
		//$return_arr['content']['tips']='<div style="float:left">权限名新增成功,';
		$return_arr['content']['tips']='权限名新增成功,';
		$result_vrf=$db_modify->select($sql_vrf);
		$arr_k=explode(',',$_POST['ckarrk']);
		if ($arr_k){
			foreach ($arr_k as $val){
				$arr_v=explode(',', $_POST['ckarrv'.$val]);
				$str='';
				$str_sql_i_f='';
				if ($arr_v){
					foreach ($arr_v as $val1){
						$str.='('.$result_vrf[0]['id'].','.$val1.'),';
						$sql_q_f='select * from wordbook where flag_set=1 and menu_sub_id='.$val1;
						$result_q_f=$db_modify->select($sql_q_f);
						if ($result_q_f){
							foreach ($result_q_f as $val2){
								$str_sql_i_f.='('.$result_vrf[0]['id'].$val1.$val2['id'].'),';
							}
						}
					}
					$str_sql_i_f=substr($str_sql_i_f,0,strlen($str_sql_i_f)-1);
					$str=substr($str,0,strlen($str)-1);
				}
			}
			if ($str!=''){
				$sql_i='insert into role_menu values '.$str;
				$db_modify->insert($sql_i);
				$return_arr['content']['tips'].='权限新增成功,';
			}
			if ($str_sql_i_f!=''){
				$sql_i_f='insert into role_func '.$str_sql_i_f;
				$db_modify->insert($sql_i_f);
				$return_arr['content']['tips'].='默认功能新增成功,';
			}
		}
		//$return_arr['content']['tips'].='</div>';
		break;
}
$return_arr['content']['tips'].='</div>';
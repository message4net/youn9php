<?php
$return_arr['content']['tips']='<div style="float:left">';
switch ($_POST['fr']){
	case 'del':
		$sql_d='delete from role where id='.$_POST['id'];
		$db_modify->insert($sql_d);
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
	        }
	        $str=substr($str,0,strlen($str)-1);
	        $sql_d='delete from role where id in ('.$str.')';
	        $return_arr['content']['tips'].='权限批删除成功,';
	        //$return_arr[0][0]=$sql_d;
	        $db_modify->insert($sql_d);
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
				if ($arr_v){
					foreach ($arr_v as $val){
						$str.='('.$result_vrf[0]['id'].','.$val.'),';
					}
					$str=substr($str,0,strlen($str)-1);
				}
			}
			$sql_i='insert into role_menu values '.$str;
			$db_modify->insert($sql_i);
//$return_arr[0][0].=$sql_i.';';
			$return_arr['content']['tips'].='权限新增成功,';
		}
		//$return_arr['content']['tips'].='</div>';
		break;
}
$return_arr['content']['tips'].='</div>';
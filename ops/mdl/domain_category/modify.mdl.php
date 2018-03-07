<?php
$return_arr['content']['tips']='<div style="float:left">';
$table_mod='domain_category';
//$return_arr['0']['0']='ZZZZZZ';
switch ($_POST['fr']){
	case 'mod':
	case 'add':
		$name_str='域名分类信息';
		$flag_name=0;
		switch ($_POST['fr']){
			case 'mod':
				$sql_vrf='select * from '.$table_mod.' where name=\''.$_POST['ra113'].'\'';
				$result_vrf=$db_modify->select($sql_vrf);
//$return_arr['0']['0'].='XXXXXX';
				if (!$result_vrf){
					$sql_m='update '.$table_mod.' set name=\''.$_POST['ra113'].'\' where id='.$_POST['id'];
					$tips_tmp='修改';
					$flag_name=1;
//$return_arr['0']['0'].=$sql_m;
				}
				break;
			case 'add':
				$sql_vrf='select * from '.$table_mod.' where name=\''.$_POST['ra113'].'\'';
				$result_vrf=$db_modify->select($sql_vrf);
				if (!$result_vrf){
					$sql_m='insert into '.$table_mod.' (name) values (\''.$_POST['ra113'].'\')';
//$return_arr['0']['0']=$sql_m;
					$tips_tmp='新增';
					$flag_name=1;
				}else{
					$return_arr['content']['tips']='<div style="float:left">'.$name_str.'<i>'.$_POST['ra113'].'</i>已存在</div>';
					require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_RETURN.POSTFIX_INC;
				}
				break;
		}
		$return_arr['content']['tips'].='<i>'.$_POST['ra113'].'</i>';
		if ($flag_name==1){
			$return_arr['content']['tips'].=$name_str.$tips_tmp;
			if($db_modify->update($sql_m)){
				$return_arr['content']['tips'].='成功,';
			}else{
				$return_arr['content']['tips'].=OPS_TIP_FAIL;
			}
		}
		break;
	case 'del':
	case 'delall':
		$sql_m['域名分类信息删除']='delete from '.$table_mod.' where id in ('.$_POST['id'].')';
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
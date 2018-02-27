<?php
$return_arr['0']['0']='ZZZZZZZZZZZZ';
$return_arr['content']['tips']='<div style="float:left">';
$name_str='用户名';
foreach ($_POST as $k=>$v){
	$return_arr['0']['0'].='#K:'.$k.'#V:'.$v;
}
switch ($_POST['fr']){
	case 'mod':
	case 'add':
		$flag_name=0;
		$sql_vrf='select * from user where creator='.$_SESSION['loginroleid'].' and name=\''.$_POST['ra19'].'\'';
		$result_vrf=$db_modify->select($sql_vrf);
		switch ($_POST['fr']){
			case 'mod':
					$sql_m='update user set name=\''.$_POST['ra19'].'\',password=\''.$_POST['ra35'].'\',role_id='.$_POST['rc20'].' where creator='.$_SESSION['loginroleid'].' and id='.$_POST['id'];
					$tips_tmp='修改';
$return_arr[0][0].=$sql_m;
					$flag_name=1;
				break;
			case 'add':
				if (!$result_vrf){
					$sql_m='insert into user (name,creator,password,role_id) values (\''.$_POST['ra19'].'\','.$_SESSION['loginroleid'].',\''.$_POST['ra35'].'\','.$_POST['rc20'].')';
					$tips_tmp='新增';
$return_arr[0][0].=$sql_m;
					$flag_name=1;
				}else{
					$return_arr['content']['tips']='<div style="float:left">'.$name_str.'<i>'.$_POST['ra19'].'</i>已存在</div>';
					require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_RETURN.POSTFIX_INC;
				}
				break;
		}
		$return_arr['content']['tips'].='<i>'.$_POST['ra19'].'</i>';
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
		$sql_m['子用户设置']='update user set creator='.$_SESSION['loginroleid'].' where creator in ('.$_POST['id'].')';
		$sql_m['用户删除']='delete from user where id in ('.$_POST['id'].')';
		$sql_m['用户功能删除']='delete from user_wordbook where user_id in ('.$_POST['id'].')';
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
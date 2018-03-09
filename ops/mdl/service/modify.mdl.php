<?php
$return_arr['content']['tips']='<div style="float:left">';
$table_mod='service';
switch ($_POST['fr']){
	case 'mod':
	case 'add':
		$name_str='服务信息';
		$flag_name=0;
		switch ($_POST['fr']){
			case 'mod':
				$sql_vrf='select * from '.$table_mod.' where server_id=\''.$_POST['rc60'].'\' and servernum=\''.$_POST['ra62'].'\' and nickname=\''.$_POST['ra63'].'\' and dir_init=\''.$_POST['ra64'].'\' and port_dbslave=\''.$_POST['ra65'].'\' and port_dbmaster=\''.$_POST['ra66'].'\' and port_sshout=\''.$_POST['ra67'].'\' and port_sshin=\''.$_POST['ra68'].'\' and port_socket=\''.$_POST['ra69'].'\' and port_http=\''.$_POST['ra70'].'\' and port_service=\''.$_POST['ra71'].'\' and port_mem=\''.$_POST['ra72'].'\' and appname=\''.$_POST['ra73'].'\' and mem_max=\''.$_POST['ra75'].'\' and mem_min=\''.$_POST['ra76'].'\' and mem_init=\''.$_POST['ra77'].'\' and domain_category_id=\''.$_POST['rc74'].'\' and process=\''.$_POST['ra119'].'\'';
				$result_vrf=$db_modify->select($sql_vrf);
				if (!$result_vrf){
					$sql_m='update '.$table_mod.' set server_id=\''.$_POST['rc60'].'\', servernum=\''.$_POST['ra62'].'\', nickname=\''.$_POST['ra63'].'\', dir_init=\''.$_POST['ra64'].'\', port_dbslave=\''.$_POST['ra65'].'\', port_dbmaster=\''.$_POST['ra66'].'\', port_sshout=\''.$_POST['ra67'].'\', port_sshin=\''.$_POST['ra68'].'\', port_socket=\''.$_POST['ra69'].'\', port_http=\''.$_POST['ra70'].'\', port_service=\''.$_POST['ra71'].'\', port_mem=\''.$_POST['ra72'].'\', appname=\''.$_POST['ra73'].'\', mem_max=\''.$_POST['ra75'].'\', mem_min=\''.$_POST['ra76'].'\', mem_init=\''.$_POST['ra77'].'\', domain_category_id=\''.$_POST['rc74'].'\', process=\''.$_POST['ra119'].'\' where id='.$_POST['id'];
					$tips_tmp='修改';
					$flag_name=1;
				}
				break;
			case 'add':
				$sql_vrf='select * from '.$table_mod.' where name=\''.$_POST['ra59'].'\'';
				$result_vrf=$db_modify->select($sql_vrf);
				if (!$result_vrf){
					$sql_m='insert into '.$table_mod.' (name,server_id,servernum,nickname,dir_init,port_dbslave,port_dbmaster,port_sshout,port_sshin,port_socket,port_http,port_service,port_mem,appname,mem_max,mem_min,mem_init,domain_category_id,process) values (\''.$_POST['ra59'].'\',\''.$_POST['rc60'].'\',\''.$_POST['ra62'].'\',\''.$_POST['ra63'].'\',\''.$_POST['ra64'].'\',\''.$_POST['ra65'].'\',\''.$_POST['ra66'].'\',\''.$_POST['ra67'].'\',\''.$_POST['ra68'].'\',\''.$_POST['ra69'].'\',\''.$_POST['ra70'].'\',\''.$_POST['ra71'].'\',\''.$_POST['ra72'].'\',\''.$_POST['ra73'].'\',\''.$_POST['ra75'].'\',\''.$_POST['ra76'].'\',\''.$_POST['ra77'].'\',\''.$_POST['rc74'].'\',\''.$_POST['ra119'].'\')';
					$tips_tmp='新增';
					$flag_name=1;
				}else{
					$return_arr['content']['tips']='<div style="float:left">'.$name_str.'<i>'.$_POST['ra59'].'</i>已存在</div>';
					require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_RETURN.POSTFIX_INC;
				}
				break;
		}
		$return_arr['content']['tips'].='<i>'.$_POST['ra59'].'</i>';
		if ($flag_name==1){
			$return_arr['content']['tips'].=$name_str.$tips_tmp;
			if($db_modify->update($sql_m)){
				$return_arr['content']['tips'].='成功,';
			}else{
				$return_arr['content']['tips'].=OPS_TIP_FAIL;
			}
		}else{
			$return_arr['content']['tips'].='未做任何处理';
		}
		break;
	case 'del':
	case 'delall':
		$sql_m['服务信息删除']='delete from '.$table_mod.' where id in ('.$_POST['id'].')';
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
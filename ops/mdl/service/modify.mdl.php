<?php
$return_arr['content']['tips']='<div style="float:left">';
$table_mod='service';
//$return_arr['0']['0']='ZZZZZZZZ';
switch ($_POST['fr']){
	case 'mod':
	case 'add':
		$name_str='服务信息';
		$flag_name=0;
		switch ($_POST['fr']){
			case 'mod':
				$sql_vrf='select * from '.$table_mod.' where server_id=\''.$_POST['rc60'].'\' and servernum=\''.$_POST['ra62'].'\' and nickname=\''.$_POST['ra63'].'\' and dir_init=\''.$_POST['ra64'].'\' and port_dbslave=\''.$_POST['ra65'].'\' and port_dbmaster=\''.$_POST['ra66'].'\' and port_sshout=\''.$_POST['ra67'].'\' and port_sshin=\''.$_POST['ra68'].'\' and port_socket=\''.$_POST['ra69'].'\' and port_http=\''.$_POST['ra70'].'\' and port_service=\''.$_POST['ra71'].'\' and port_mem=\''.$_POST['ra72'].'\' and appname=\''.$_POST['ra73'].'\' and mem_max=\''.$_POST['ra75'].'\' and mem_min=\''.$_POST['ra76'].'\' and mem_init=\''.$_POST['ra77'].'\' and domain_category_id=\''.$_POST['rc74'].'\' and process=\''.$_POST['ra119'].'\' and db_server_id=\''.$_POST['rc120'].'\' and slave_server_id=\''.$_POST['rc121'].'\' and service_category_id=\''.$_POST['rc130'].'\' and ssh_service_id=\''.$_POST['rc132'].'\'';
				$result_vrf=$db_modify->select($sql_vrf);
				if (!$result_vrf){
					$sql_m='update '.$table_mod.' set server_id=\''.$_POST['rc60'].'\', servernum=\''.$_POST['ra62'].'\', nickname=\''.$_POST['ra63'].'\', dir_init=\''.$_POST['ra64'].'\', port_dbslave=\''.$_POST['ra65'].'\', port_dbmaster=\''.$_POST['ra66'].'\', port_sshout=\''.$_POST['ra67'].'\', port_sshin=\''.$_POST['ra68'].'\', port_socket=\''.$_POST['ra69'].'\', port_http=\''.$_POST['ra70'].'\', port_service=\''.$_POST['ra71'].'\', port_mem=\''.$_POST['ra72'].'\', appname=\''.$_POST['ra73'].'\', mem_max=\''.$_POST['ra75'].'\', mem_min=\''.$_POST['ra76'].'\', mem_init=\''.$_POST['ra77'].'\', domain_category_id=\''.$_POST['rc74'].'\', process=\''.$_POST['ra119'].'\',db_server_id=\''.$_POST['rc120'].'\',slave_server_id=\''.$_POST['rc121'].'\',service_category_id=\''.$_POST['rc130'].'\',ssh_service_id=\''.$_POST['rc132'].'\' where id='.$_POST['id'];
					$tips_tmp='修改';
					$flag_name=1;
				}
				break;
			case 'add':
				$sql_vrf='select * from '.$table_mod.' where name=\''.$_POST['ra59'].'\'';
				$result_vrf=$db_modify->select($sql_vrf);
				if (!$result_vrf){
					$sql_m='insert into '.$table_mod.' (ssh_service_id,service_category_id,name,server_id,servernum,nickname,dir_init,port_dbslave,port_dbmaster,port_sshout,port_sshin,port_socket,port_http,port_service,port_mem,appname,mem_max,mem_min,mem_init,domain_category_id,process,db_server_id,slave_server_id) values (\''.$_POST['rc132'].'\',\''.$_POST['rc130'].'\',\''.$_POST['ra59'].'\',\''.$_POST['rc60'].'\',\''.$_POST['ra62'].'\',\''.$_POST['ra63'].'\',\''.$_POST['ra64'].'\',\''.$_POST['ra65'].'\',\''.$_POST['ra66'].'\',\''.$_POST['ra67'].'\',\''.$_POST['ra68'].'\',\''.$_POST['ra69'].'\',\''.$_POST['ra70'].'\',\''.$_POST['ra71'].'\',\''.$_POST['ra72'].'\',\''.$_POST['ra73'].'\',\''.$_POST['ra75'].'\',\''.$_POST['ra76'].'\',\''.$_POST['ra77'].'\',\''.$_POST['rc74'].'\',\''.$_POST['ra119'].'\',\''.$_POST['rc120'].'\',\''.$_POST['rc121'].'\')';
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
		
		$arr_k=explode(',',$_POST['rbbackarrk']);
		$sql_arr_init='select * from wordbook where id in ('.$_POST['rbbackarrk'].')';
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
				//$arr_v=explode(',', $_POST['ckarrv'.$val]);
				$arr_v=explode(',', $_POST['rb'.$val.'alckarrv']);
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
								$sql_d_f='delete from role_wordbook where role_id='.$result_vrf['0']['id'].' and wordbook_id in ('.$str1.')';
								//$return_arr['0']['0']=$sql_d_f;
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
				}
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
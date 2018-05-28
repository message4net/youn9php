<?php
$db_modify=new DbSqlPdo();

switch ($_POST['fr']){
	case 'setcol':
	case 'setcolall':
		require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.OPS_MDL_MAIN.DIRECTORY_SEPARATOR.'usetcol'.POSTFIX_MDL;
		break;
	case 'umdpswd':
		require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.OPS_MDL_MAIN.DIRECTORY_SEPARATOR.'umdpswd'.POSTFIX_MDL;
		break;
	default:
//		require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.$_SESSION['mr'].DIRECTORY_SEPARATOR.$_POST['f'].POSTFIX_MDL;
//新的开始
		$return_arr['content']['tips']='<div style="float:left">';
		//$table_mod='server';
		$table_mod=$_SESSION['mr'];
		$_sql_menu='select * from menu where id='.$_SESSION['menu_id'];
		$_result_menu=$db_modify->select($_sql_menu);
		if ($_result_menu){
			if ($_result_menu['0']['flag_mod']==0){
				
			}else{
				switch ($_POST['fr']){
					case 'mod':
					case 'add':
						$name_str='服务器信息';
						$flag_name=0;
						switch ($_POST['fr']){
							case 'mod':
								$sql_vrf='select * from '.$table_mod.' where port_sshin=\''.$_POST['ra57'].'\' and ipi=\''.$_POST['ra38'].'\' and name=\''.$_POST['ra37'].'\' and ipo=\''.$_POST['ra39'].'\' and memory=\''.$_POST['ra40'].'\' and bandwidth=\''.$_POST['ra41'].'\' and cpu=\''.$_POST['ra42'].'\' and hd=\''.$_POST['ra43'].'\' and enddate=\''.$_POST['ra45'].'\' and port_dbmaster=\''.$_POST['ra54'].'\' and port_sshout=\''.$_POST['ra55'].'\' and port_dbslave='.$_POST['ra56'].'\'';
								$result_vrf=$db_modify->select($sql_vrf);
								//$return_arr['0']['0'].='XXXXXX';
								if (!$result_vrf){
									$sql_m='update '.$table_mod.' set port_sshin=\''.$_POST['ra57'].'\',port_dbslave=\''.$_POST['ra56'].'\',port_sshout=\''.$_POST['ra55'].'\',ipi=\''.$_POST['ra38'].'\', name=\''.$_POST['ra37'].'\', ipo=\''.$_POST['ra39'].'\', memory=\''.$_POST['ra40'].'\', bandwidth=\''.$_POST['ra41'].'\', cpu=\''.$_POST['ra42'].'\', hd=\''.$_POST['ra43'].'\', enddate=\''.$_POST['ra45'].'\',port_dbmaster=\''.$_POST['ra54'].'\' where id='.$_POST['id'];
									$tips_tmp='修改';
									$flag_name=1;
									//$return_arr['0']['0'].=$sql_m;
								}
								break;
							case 'add':
								$sql_vrf='select * from '.$table_mod.' where ipi=\''.$_POST['ra38'].'\' and ipo=\''.$_POST['ra39'].'\'';
								$result_vrf=$db_modify->select($sql_vrf);
								if (!$result_vrf){
									$sql_m='insert into '.$table_mod.' (port_sshin,port_dbslave,port_sshout,port_dbmaster,name,ipi,ipo,memory,bandwidth,cpu,hd,enddate) values (\''.$_POST['ra57'].'\',\''.$_POST['ra56'].'\',\''.$_POST['ra55'].'\',\''.$_POST['ra54'].'\',\''.$_POST['ra37'].'\',\''.$_POST['ra38'].'\',\''.$_POST['ra39'].'\',\''.$_POST['ra40'].'\',\''.$_POST['ra41'].'\',\''.$_POST['ra42'].'\',\''.$_POST['ra43'].'\',\''.$_POST['ra45'].'\')';
									//$return_arr['0']['0']=$sql_m;
									$tips_tmp='新增';
									$flag_name=1;
								}else{
									$return_arr['content']['tips']='<div style="float:left">'.$name_str.'<i>'.$_POST['ra38'].'</i>已存在</div>';
									require BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_COMM.DIRECTORY_SEPARATOR.NAME_INC.DIRECTORY_SEPARATOR.OPS_INC_RETURN.POSTFIX_INC;
								}
								break;
						}
						$return_arr['content']['tips'].='<i>'.$_POST['ra38'].'</i>';
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
						$sql_m['服务器信息删除']='delete from '.$table_mod.' where id in ('.$_POST['id'].')';
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
			}
		}

		$return_arr['content']['tips'].='</div>';
		

		
		break;
}


//$return_arr['0']['0']=BASE_DIR.APP_OPS.DIRECTORY_SEPARATOR.NAME_MDL.DIRECTORY_SEPARATOR.$_SESSION['mr'].DIRECTORY_SEPARATOR.$_POST['f'].POSTFIX_MDL;

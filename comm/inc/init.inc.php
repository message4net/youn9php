<?php
class Init {
//	private $env_relpath_file_name=array(
//			'comm/cfg/init.cfg.php',
//			'comm/cfg/self.cfg.php',
//			'comm/int/init.inc.php'
//	);

///**
// *功能:构造函数，连接数据库
// */
//	public function __construct($app_name=''){
//		if ($app_name!='') {
//			$this->init_app_env($app_name);
//		}
//	}
///**
// * 加载app下初始cfg、inc
// */
//	public function init_app_env($app_name){
//		foreach ($this->env_relpath_file_name as $val){
//			if (file_exists(BASE_DIR.$app_name.'/'.$val) && !is_dir(BASE_DIR.$app_name.'/'.$val)){
//				require BASE_DIR.$app_name.'/'.$val;
//			}
//		}
//	}
/**
	*功能:初始化app模版页面
	*参数:$app_name app的名称
	*返回:TRUE OR FALSE
	*/
	public function init_app($app_tmplt_arr=array(),$app_name='404') {
		//构造app常量路径参数
		//eval("\$tmplt_dir_tmp=TMPLT_DIR_$app_name;");
		
		//确认app参数路径非文件
		if (file_exists(RUNTIME_DIR.$app_name)){
			if (!is_dir(RUNTIME_DIR.$app_name)){
				unlink(RUNTIME_DIR.$app_name);
			}
		}

		//判断模版是否在硬盘缓存，并确认模版版本，否创建缓存
		if (!is_dir(RUNTIME_DIR.$app_name)){
			if(file_exists(RUNTIME_DIR.$app_name)){
				unlink(RUNTIME_DIR.$app_name);
			}
			$this->copy_dir(TMPLT_DIR.$app_name.'/',RUNTIME_DIR.$app_name.'/',$app_tmplt_arr);
		} else {
			if (file_exists(RUNTIME_DIR.$app_name.'/'.NAME_FILE_TMPLT_VRSN)) {
				if(file_get_contents(RUNTIME_DIR.$app_name.'/'.NAME_FILE_TMPLT_VRSN)!=VRSN_TMPLT) {
					$this->remove_directory(RUNTIME_DIR.$app_name);
					$this->copy_dir(TMPLT_DIR.$app_name.'/',RUNTIME_DIR.$app_name.'/',$app_tmplt_arr);
				}
			}else{
				$this->remove_directory(RUNTIME_DIR.$app_name);
				$this->copy_dir(TMPLT_DIR.$app_name.'/',RUNTIME_DIR.$app_name.'/',$app_tmplt_arr);
			}
		}
	}

/**
 *功能:输出网页html内容
 *参数:$src 需要拷贝的文件夹绝对路径
 *	  $dst 目标拷贝的文件夹绝对路径
 *返回:网页html内容
 */
	public function print_html($html_arr=array(),$html_file_name=''){
//	public function print_html($html_file_name=''){
		if(!file_exists($html_file_name) || is_dir($html_file_name)){
			$html_file_name=RUNTIME_DIR.DIR_404.NAME_FILE_TMPLT_404;
		}
		$html_content=file_get_contents($html_file_name);
		if ($html_arr) {
			foreach ($html_arr as $key=>$val) {
				$html_content=str_replace('{'.$key.'}', $val, $html_content);
			}
		}
		return $html_content;
	}
	
/**
	*功能:拷贝文件夹
	*参数:$src 需要拷贝的文件夹绝对路径
	*	  $dst 目标拷贝的文件夹绝对路径
	*返回:无
	*/
	public function copy_dir($src,$dst,$app_tmplt_arr=array()) {
		$dir = opendir($src);
		@mkdir($dst);
		while(false !== ( $file = readdir($dir)) ) {
			if (( $file != '.' ) && ( $file != '..' )) {
				if ( is_dir($src.$file) ) {
					$this->copy_dir($src.$file.'/',$dst.$file.'/',$app_tmplt_arr);
					continue;
				}else{
					if ($app_tmplt_arr){
						$html_content=file_get_contents($src.$file);
						//echo $file.'#<br/>';
						foreach ($app_tmplt_arr as $key=>$val){
							//echo $key.'<br/>';
							$html_content=str_replace('{'.$key.'}', $val, $html_content);
						}
						file_put_contents($dst.$file, $html_content);
					}else{
						copy($src.$file,$dst.$file);
					}
				}
			}
		}
		closedir($dir);
	}

/**
 *功能:删除文件夹
 *参数:$dir 需要删除的文件夹绝对路径
 *返回:无
 */
	public function remove_directory($dir){
		if($handle=opendir("$dir")){
			while(false!==($item=readdir($handle))){
				if($item!="."&&$item!=".."){
					if(is_dir("$dir/$item")){
						$this->remove_directory("$dir/$item");
					}else{
						unlink("$dir/$item");
					}
				}
			}
			closedir($handle);
			rmdir($dir);
		}
	}
	
/**
	*功能:解析url参数,并编码
	*参数:$url_para_arr url参数数组
	*返回:无
	*/	
	public function url_encode($reqeust_uri){
		$_url_para=str_replace(URI_BASE.'/','',$reqeust_uri);
		$_url_para=str_replace(URI_BASE,'',$_url_para);
		$_app_arr=explode('/', $_url_para);
		if ($_url_para!='' && $_url_para!='/') {
			if (file_exists(BASE_DIR.$_app_arr[0].'/'.NAME_FILE_INF)) {
				$_arr_return['app']=$_app_arr[0];
				$_app_arr_count=count($_app_arr);
				switch ($_app_arr_count){
					case 0:
						$_arr_return['app']=NAME_APP_404;
					break;
					case 1:
					case 2:
					break;
					case 3:
						$_arr_return['web']=$_app_arr['2'];
						$_arr_return['mdl']=$_app_arr['1'];
					break;
					default:
						$_arr_tmp=array_slice($_app_arr,-1,1);
						$_arr_return['web']=$_arr_tmp['0'];
						$_arr_return['mdl']=$_app_arr['1'];
						$_para_arr=array_slice(array_slice($_app_arr,2), -2,$_app_arr_count-3);
					break;
				}
			}else{
				$_arr_return['app']=NAME_APP_404;
			}
		} else {
			$_arr_return['app']=NAME_APP_404;
		}
		return $_arr_return;
	}	
	
/**
	*功能:编码url参数key字典
	*参数:$url_para url参数key
	*返回:无
	*/
	public function para_encode($_url_para_arr=array(),$_arr_length=0,$_i_start=0,$_arr_return=array()){
		if ($_url_para_arr[$_i_start]){
			switch ($_url_para_arr[$_i_start]){
				case 'web':
					$_para_num=1;
					$_arr_key_start=($_i_start+$_para_num+1);
					if(($_i_start+$_para_num)<$_arr_length){
						$_arr_return[$_url_para_arr[$_i_start]]=$_url_para_arr[($_i_start+$_para_num)];
					}else{
						$_arr_return['web']='';
						$_arr_key_start=$_arr_length;
					}
					break;
				;;
				case 'a':
					$_para_num=2;
					$_arr_key_start=($_i_start+$_para_num+1);
					if($_arr_length>=$_arr_key_start){
						$_arr_return[$_url_para_arr[$_i_start]]=$_url_para_arr[($_i_start+$_para_num)];
					}else{
						$_arr_key_start=$_arr_length;
					}
					break;
				;;
				default:
					if (!isset($_arr_return['web'])){
						$_arr_return['web']=''; 
					}
					$_arr_key_start=$_arr_length; 
			}
			if ($_arr_key_start<$_arr_length){
				return $this->para_encode($_url_para_arr,$_arr_length,$_arr_key_start,$_arr_return);
			}else{
				return $_arr_return;
			}
		}
	}
	
}
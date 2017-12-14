<?php
class Init {
	
/**
	*功能:初始化app模版页面
	*参数:$app_name app的名称
	*返回:TRUE OR FALSE
	*/
	public function init_app($app_name='404') {
		//构造app常量路径参数
		//eval("\$tmplt_dir_tmp=TMPLT_DIR_$app_name;");
		
		//确认app参数路径非文件
		if (file_exists(RUNTIME_DIR.$app_name)){
			if (!is_dir(RUNTIME_DIR.$app_name)){
				unlink(RUNTIME_DIR.$app_name);
			}
		}

		//判断模版是否在硬盘缓存，并确认模版版本，否创建缓存
		if (!is_dir(RUNTIME_DIR.$app_name.'/')){
			$this->copy_dir(TMPLT_DIR.$app_name.'/',RUNTIME_DIR.$app_name.'/');
		} else {
			if (file_exists(RUNTIME_DIR.$app_name.'/'.NAME_FILE_TMPLT_VRSN)) {
				if(file_get_contents(RUNTIME_DIR.$app_name.'/'.NAME_FILE_TMPLT_VRSN)!=VRSN_TMPLT) {
					$this->remove_directory(RUNTIME_DIR.$app_name);
					$this->copy_dir(TMPLT_DIR.$app_name.'/',RUNTIME_DIR.$app_name.'/');
				}
			}else{
				$this->copy_dir(TMPLT_DIR.$app_name.'/',RUNTIME_DIR.$app_name.'/');
			}
		}
	}

/**
 *功能:输出网页html内容
 *参数:$src 需要拷贝的文件夹绝对路径
 *	  $dst 目标拷贝的文件夹绝对路径
 *返回:网页html内容
 */
//	public function print_html($html_arr='',$html_file_name=TMPLT_DIR_404.FILE_TMPLT_404){
	public function print_html($html_arr='',$html_file_name=''){
		if ($html_file_name==''){
			$html_file_name=TMPLT_DIR_404.NAME_FILE_TMPLT_404;
		}
		$html_content=file_get_contents($html_file_name);
		if (is_array($html_arr)){
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
	public function copy_dir($src,$dst) {
		$dir = opendir($src);
		@mkdir($dst);
		while(false !== ( $file = readdir($dir)) ) {
			if (( $file != '.' ) && ( $file != '..' )) {
				if ( is_dir($src.$file.'/') ) {
					copy_dir($src.$file.'/',$dst.$file);
					continue;
				}
				else {
					copy($src.$file,$dst.$file);
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
						remove_directory("$dir/$item");
					}else{
						unlink("$dir/$item");
					}
				}
			}
			closedir($handle);
			rmdir($dir);
		}
	}
	
	
	
	
}
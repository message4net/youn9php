<?php
class Init {
	public function init_app($name_app='404') {
		eval("\$tmplt_dir_tmp=TMPLT_DIR_$name_app;");
		//eval("\$tmplt_dir_tmp='1';");
		echo '##aaa#'.$tmplt_dir_tmp;
	}
}
<?php
//require __DIR__.'/../comm/cfg/init.cfg.php';
//require __DIR__.'/../comm/cfg/self.cfg.php';
//require __DIR__.'/../comm/cfg/rel.cfg.php';
require INIT_INC;

$init_ops_router=new Init();

require $app_base_dir.DIR_MDL.$_POST['m'].'/'.$_POST['f'].POSTFIX_MDL;
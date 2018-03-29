<?php 

/*配置好之后请引入基类文件*/
include("GameRole.php");

/*开始调用*/
$role = new GameRole('android');
$role->type = 'enterServer';
$role->qid = 1;
$role->zoneid = 1;
$role->zonename = '1区';
$role->Roleid   = '1';
$role->RoleName = 'aaa';
$role->gender   = '女';
$role->power   = 0;
$role->vip   = 0;
$role->rolelevel   = 10;
$role->partyid = 10;
$role->partyname = '魔道';
$role->professionid   = 0;
$role->profession   = '无';


//非必填(roleid角色ID intimacy亲密度 nexusid称呼ID nexusname称呼)
$friend = array('roleid'=>1,'intimacy'=>0 ,'nexusid'=>'1','nexusname'=>'默认');
//$friend = array('roleid'=>1,'intimacy'=>0 ,'nexusid'=>'1','nexusname'=>'情侣');
//$friend = array('roleid'=>1,'intimacy'=>0 ,'nexusid'=>'1','nexusname'=>'仇人');
//$role->friendlist = array($friend,$friend,$friend);//多个好友多组传递

//非必填(balanceid货币种类 balancename货币名称 balancenum货币数)
$balance = array('balanceid'=>0,'balancename'=>'默认', 'balancenum'=>10000);
//$role->balance = array($balance);//多种余额多组传递

//非必填(listid榜单ID listname榜单名称 num排名 coin排名指标ID cost排名指标名称)
$ranking = array('listid'=>0,'listname'=>'默认','num'=>250, 'coin'=>0, 'cost'=>'战力');
//$role->ranking = array($ranking);//多个榜单多组传递
$result = $role->Send();
var_dump($result);



?>

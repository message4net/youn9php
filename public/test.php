<?php

$a=new PDO('mysql:host=www.youn9php.com;port=3306;dbname=manager_news_weather','devuser','devuser_@sys.1243.com');
//$b=$a->query("select * from role");
$b=$a->query("desc role");
//$b->fetchAll();
var_dump($b->fetchAll(pdo::FETCH_ASSOC));
//$b=$a->query("select '1'");
//print_r($b->fetchAll());

////foreach ($b as $row){
////	foreach ($row as $key=>$val){
////		echo $key.'#'.$val.'<br/>';
////	}
////}

////定义数据库
////define('DB_NAME','yd_ops');
//define('DB_NAME','manager_news_weather');
//define('DB_HOST','www.youn9php.com');
//define('DB_PORT','3306');
//define('DB_USER','devuser');
//define('DB_PASSWD','devuser_@sys.1243.com');
//
//
//require __DIR__.'/../comm/inc/dbpdo.inc.php';
//
//$a=new DbSqlPdo();
//
////var_dump($a->select("select '1'"));
////$sql='select * from role';
////$sql='select * from user';
//$sql='desc user';
//$b=$a->select($sql);
//var_dump($b);



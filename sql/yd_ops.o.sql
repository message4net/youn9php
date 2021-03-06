/*
SQLyog Ultimate v8.32 
MySQL - 5.5.5-10.1.19-MariaDB : Database - yd_ops
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`yd_ops` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `yd_ops`;

/*Table structure for table `domain` */

DROP TABLE IF EXISTS `domain`;

CREATE TABLE `domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `server_id` int(11) DEFAULT NULL,
  `domain_category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `domain` */

insert  into `domain`(`id`,`domain`,`server_id`,`domain_category_id`) values (1,'3g.liujin.cn',3,1),(2,'3g.ljsy.net',3,1),(3,'admin.liujin.cn',3,2),(4,'admin.ljsy.net',3,2),(5,'by.liujin.cn',3,3),(6,'by.ljsy.net',3,3),(7,'chpay.liujin.cn',4,4),(8,'editw.liujin.cn',3,5),(9,'git.liujin.cn',7,6),(10,'jsby.liujin.cn',4,7),(11,'jsby.ljsy.net',4,7),(12,'mail.liujin.cn',7,8),(13,'pop3.liujin.cn',7,8),(14,'smtp.liujin.cn',7,8),(15,'mh.liujin.cn',1,9),(16,'mh.ljsy.net',1,9),(17,'moli.liujin.cn',2,10),(18,'moli.ljsy.net',2,10),(19,'peer.liujin.cn',2,11),(20,'wap.liujin.cn',2,12),(21,'wap.ljsy.net',2,12),(22,'weixin.liujin.cn',3,13),(23,'www.liujin.cn',3,14),(24,'www.ljsy.net',3,14),(25,'wxg.liujin.cn',3,15),(26,'xq.liujin.cn',10,16),(27,'xq.ljsy.net',10,16),(28,'xy.liujin.cn',2,17),(29,'xy.ljsy.net',2,17),(30,'pay.liujin.cn',2,18),(31,'wxby.ljsy.net',7,19),(32,'wxtest.ljsy.net',7,20),(33,'zytest.ljsy.net',7,21),(34,'chupay.liujin.cn:7002',4,22),(35,'txjsby.liujin.cn',4,23),(36,'txjsby.ljsy.net',4,23),(37,'txchupay.liujin.cn:7020',4,24),(38,'xypay.liujin.cn:7025',2,25),(39,'xyapp.liujin.cn',2,26),(40,'jszb.ljsy.net',4,27),(41,'ins1.liujin.cn',2,28),(42,'ins2.liujin.cn',4,29),(43,'ins3.liujin.cn',3,30),(44,'ins4.liujin.cn',1,31),(45,'ins5.liujin.cn',1,32),(46,'cdk.liujin.cn',3,33),(47,'smtp CNAME smtp.mxhichina.com. 3600',10,34),(49,'pop3	CNAME pop3.mxhichina.com.',10,34),(50,'@	MX mxn.mxhichina.com.',10,34);

/*Table structure for table `domain_category` */

DROP TABLE IF EXISTS `domain_category`;

CREATE TABLE `domain_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `domain_category` */

insert  into `domain_category`(`id`,`name`,`remark`) values (1,'游戏wap2.0网站','wap网站，包括侠义、梦幻、魔力三个wap2.0的网站'),(2,'旧客服、管理系统','旧的流金客服系统上，管理系统域名'),(3,'绝色霸业wap网站','绝色霸业wap网站'),(4,'(旧)绝色霸业充值平台回调地址','绝色霸业平台充值回调地址（旧）,94上的80端口跳转至182.254.140.253:7004'),(5,'网站编辑器','网站编辑器域名'),(6,'git','git域名'),(7,'绝色霸业登陆服','绝色霸业登录服域名'),(8,'公司邮箱','公司邮箱域名'),(9,'梦幻登录服','梦幻登陆服和wap1.0网站域名'),(10,'魔力登录服','魔力登陆服和wap1.0网站域名'),(11,'侠义、梦幻三方充值回调','侠义、梦幻第三方充值平台回调地址'),(12,'wap1.0引导','wap1.0引导页面'),(13,'公司微信','公司微信域名'),(14,'公司网站','公司网站域名'),(15,'微信小游戏','微信小游戏域名'),(16,'星球登陆服(停)','星球登陆服域名 已删除'),(17,'侠义登录服','侠义登陆服和wap1.0网站域名'),(18,'充值支付页面','充值支付页面域名'),(19,'绝色霸业微信','绝色霸业微信域名'),(20,'微信测试服','微信测试服域名'),(21,'程序调试','程序调试域名'),(22,'绝色霸业充值回调(无法使用80端口)','绝色霸业平台充值回调地址(不能使用80端口)'),(23,'腾讯绝色霸业登陆服','腾讯绝色霸业登录服域名'),(24,'绝色霸业腾讯充值(request)回调地址(不能使用80端口)','绝色霸业腾讯充值(request)回调地址(不能使用80端口)'),(25,'侠义第三方充值回调接口(xycentergate)','侠义第三方充值回调接口(xycentergate)'),(26,'侠义苹果登录域名(xycenterappstore,xycenterapp)','侠义苹果登录域名(xycenterappstore,xycenterapp)'),(27,'江山争霸登录服','江山争霸登录服域名'),(28,'游戏服1',NULL),(29,'游戏服2',NULL),(30,'游戏服3',NULL),(31,'游戏服4',NULL),(32,'游戏服5',NULL),(33,'激活码兑换，UC礼包接入','用于激活码兑换，UC礼包接入'),(34,'邮件','smtp CNAME smtp.mxhichina.com. 3600 | @	MX  mxn.mxhichina.com. | pop3	CNAME pop3.mxhichina.com.');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `modelname` varchar(50) DEFAULT NULL,
  `flag_set` int(11) NOT NULL DEFAULT '0',
  `type` int(11) DEFAULT '0',
  `flag_mod` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`id`,`name`,`parent_id`,`modelname`,`flag_set`,`type`,`flag_mod`) values (1,'系统管理',0,NULL,0,0,0),(3,'服务管理',9,'service',0,0,0),(2,'服务器管理',9,'server',0,0,0),(4,'权限管理',1,'role',0,0,1),(5,'用户管理',1,'user',0,0,2),(6,'个人管理',0,NULL,0,0,0),(7,'修改密码',6,'umdpswd',1,0,0),(8,'字段设置',6,'usetcol',1,0,0),(9,'运维管理',0,NULL,0,0,0),(10,'域名管理',9,'domain',0,0,0),(11,'域名分类',13,'domain_category',0,1,0),(12,'服务分类',13,'service_category',0,1,0),(13,'分类管理',9,'category',0,0,0);

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `creator` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=155 DEFAULT CHARSET=utf8;

/*Data for the table `role` */

insert  into `role`(`id`,`name`,`creator`) values (1,'admin',1),(2,'init',1),(121,'初始权限',9),(9,'全部权限',1),(10,'默认权限',1),(99,'测试全部',1),(119,'全部权限',9),(120,'测试权限',9),(129,'tall',1),(133,'t0',1),(134,'t1',1),(135,'t2',1),(136,'ta',1),(154,'zz2',1),(151,'zz1',1);

/*Table structure for table `role_menu` */

DROP TABLE IF EXISTS `role_menu`;

CREATE TABLE `role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`menu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role_menu` */

insert  into `role_menu`(`role_id`,`menu_id`) values (1,2),(1,3),(1,4),(1,5),(1,7),(1,8),(1,10),(1,11),(1,12),(2,2),(2,3),(2,7),(9,2),(9,3),(9,4),(9,5),(9,7),(10,7),(99,2),(99,3),(99,4),(99,5),(119,2),(119,3),(119,4),(119,5),(119,7),(119,8),(120,5),(120,7),(120,8),(121,2),(121,3),(121,7),(121,8),(129,2),(129,3),(129,4),(129,5),(129,7),(129,8),(129,10),(129,11),(129,12),(129,13),(133,7),(133,8),(133,12),(133,13),(134,7),(134,8),(134,11),(134,12),(134,13),(135,7),(135,8),(135,12),(135,13),(136,7),(136,8),(136,11),(136,12),(136,13),(151,2),(151,3),(151,4),(151,5),(151,7),(151,8),(151,10),(151,11),(151,12),(154,7),(154,8);

/*Table structure for table `role_wordbook` */

DROP TABLE IF EXISTS `role_wordbook`;

CREATE TABLE `role_wordbook` (
  `role_id` int(11) NOT NULL,
  `wordbook_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`wordbook_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role_wordbook` */

insert  into `role_wordbook`(`role_id`,`wordbook_id`) values (1,1),(1,2),(1,3),(1,4),(1,5),(1,7),(1,8),(1,10),(1,11),(1,12),(1,13),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(1,24),(1,25),(1,27),(1,29),(1,34),(1,35),(1,36),(1,37),(1,38),(1,39),(1,40),(1,41),(1,42),(1,43),(1,44),(1,45),(1,46),(1,47),(1,48),(1,49),(1,50),(1,51),(1,52),(1,53),(1,54),(1,55),(1,56),(1,57),(1,58),(1,59),(1,60),(1,61),(1,62),(1,63),(1,64),(1,65),(1,66),(1,67),(1,68),(1,69),(1,70),(1,71),(1,72),(1,73),(1,74),(1,75),(1,76),(1,77),(1,98),(1,99),(1,101),(1,102),(1,103),(1,104),(1,105),(1,106),(1,107),(1,108),(1,109),(1,110),(1,111),(1,112),(1,113),(1,114),(1,115),(1,116),(1,117),(1,118),(1,119),(1,120),(1,121),(1,122),(1,123),(1,124),(1,125),(1,126),(1,127),(1,128),(1,129),(1,130),(1,131),(1,132),(1,133),(9,1),(9,2),(9,3),(9,4),(9,5),(9,7),(9,8),(9,10),(9,11),(9,12),(9,13),(9,17),(9,18),(9,19),(9,20),(9,21),(9,22),(9,24),(9,25),(9,27),(9,29),(9,34),(9,35),(9,36),(9,37),(9,38),(9,39),(9,40),(9,41),(9,42),(9,43),(9,45),(9,46),(9,47),(9,48),(9,49),(9,50),(9,51),(9,52),(9,53),(9,54),(9,55),(9,56),(9,57),(99,1),(99,2),(99,3),(99,4),(99,7),(99,8),(99,10),(99,11),(99,17),(99,18),(99,19),(99,20),(99,21),(99,24),(99,25),(99,27),(99,34),(119,1),(119,2),(119,3),(119,4),(119,5),(119,7),(119,8),(119,11),(119,12),(119,13),(119,17),(119,18),(119,19),(119,20),(119,21),(119,22),(119,24),(119,25),(119,29),(119,34),(119,35),(119,36),(119,37),(119,38),(119,39),(119,40),(119,41),(119,42),(119,43),(119,45),(119,46),(119,47),(119,48),(119,49),(119,50),(119,51),(119,52),(119,53),(119,54),(119,55),(119,56),(119,57),(120,18),(120,19),(120,20),(120,21),(120,22),(120,24),(120,25),(120,29),(120,34),(120,35),(129,1),(129,2),(129,3),(129,4),(129,5),(129,7),(129,8),(129,11),(129,12),(129,13),(129,17),(129,18),(129,19),(129,20),(129,21),(129,22),(129,24),(129,25),(129,29),(129,34),(129,35),(129,36),(129,37),(129,38),(129,39),(129,40),(129,41),(129,42),(129,43),(129,45),(129,46),(129,47),(129,48),(129,49),(129,50),(129,51),(129,52),(129,53),(129,54),(129,55),(129,56),(129,57),(129,58),(129,59),(129,60),(129,62),(129,63),(129,64),(129,65),(129,66),(129,67),(129,68),(129,69),(129,70),(129,71),(129,72),(129,73),(129,74),(129,75),(129,76),(129,77),(129,98),(129,101),(129,103),(129,104),(129,105),(129,106),(129,107),(129,108),(129,110),(129,112),(129,113),(129,116),(129,117),(129,119),(129,120),(129,121),(129,122),(129,123),(129,124),(129,125),(129,126),(129,127),(129,128),(129,129),(129,130),(129,131),(129,132),(129,133),(133,127),(134,112),(134,127),(134,133),(135,123),(135,125),(135,126),(135,127),(135,128),(135,133),(136,112),(136,127),(136,133),(151,1),(151,2),(151,3),(151,4),(151,5),(151,7),(151,8),(151,11),(151,12),(151,13),(151,17),(151,18),(151,19),(151,20),(151,21),(151,22),(151,24),(151,25),(151,29),(151,34),(151,35),(151,36),(151,37),(151,38),(151,39),(151,40),(151,41),(151,42),(151,43),(151,45),(151,46),(151,47),(151,48),(151,49),(151,50),(151,51),(151,52),(151,53),(151,54),(151,55),(151,56),(151,57),(151,58),(151,59),(151,60),(151,62),(151,63),(151,64),(151,65),(151,66),(151,67),(151,68),(151,69),(151,70),(151,71),(151,72),(151,73),(151,74),(151,75),(151,76),(151,77),(151,98),(151,101),(151,103),(151,104),(151,105),(151,106),(151,107),(151,108),(151,109),(151,110),(151,111),(151,112),(151,113),(151,116),(151,117),(151,118),(151,119),(151,120),(151,121),(151,122),(151,123),(151,124),(151,125),(151,126),(151,127),(151,128),(151,129),(151,130),(151,131),(151,132),(151,133);

/*Table structure for table `server` */

DROP TABLE IF EXISTS `server`;

CREATE TABLE `server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipi` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipo` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `memory` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `port_sshout` int(11) DEFAULT NULL,
  `port_dbmaster` int(11) DEFAULT NULL,
  `port_dbslave` int(11) DEFAULT NULL,
  `port_sshin` int(11) DEFAULT NULL,
  `cpu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hd` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bandwidth` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `server` */

insert  into `server`(`id`,`name`,`ipi`,`ipo`,`memory`,`port_sshout`,`port_dbmaster`,`port_dbslave`,`port_sshin`,`cpu`,`hd`,`bandwidth`,`enddate`) values (1,'主业务_67','10.105.73.234','115.159.53.67','16G',22,0,0,22,'8c','8_30G','10M','2018-12-13 17:43:00'),(2,'主业务_253','10.247.46.14','182.254.140.253','16G',4343,0,0,22,'8c','8_50G','10M','2019-08-03 04:35:00'),(3,'跳板机_60','10.237.154.240','115.159.79.60','8G',4343,0,0,22,'4c','8_50G','3M','2018-10-26 17:07:00'),(4,'业务_214','10.105.50.143','182.254.138.214','4G',22,0,0,22,'4c','8_20G','3M','2018-10-26 17:07:00'),(6,'测试服_251','192.168.2.251','','4G',22,0,0,22,'8c','500G','','0000-00-00 00:00:00'),(7,'网关_254','192.168.2.254','218.108.34.254','4G',22,0,0,22,'8c','500G','','0000-00-00 00:00:00'),(8,'主数据库_54','10.66.105.54','','4G',0,3306,0,0,'','100G','','2018-07-15 00:00:00'),(9,'从数据库_241','10.66.126.241','','4G',0,0,3306,0,'','100G','','0000-00-00 00:00:00'),(10,'测试服_248','192.168.2.248','','',0,0,0,0,'','','','0000-00-00 00:00:00');

/*Table structure for table `service` */

DROP TABLE IF EXISTS `service`;

CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `server_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `service_category_id` int(11) DEFAULT NULL,
  `db_service_id` int(11) DEFAULT NULL,
  `ssh_service_id` int(11) DEFAULT NULL,
  `dir_init` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servernum` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `port_dbslave` int(11) DEFAULT NULL,
  `port_dbmaster` int(11) DEFAULT NULL,
  `port_sshout` int(11) DEFAULT NULL,
  `port_sshin` int(11) DEFAULT NULL,
  `port_socket` int(11) DEFAULT NULL,
  `port_http` int(11) DEFAULT NULL,
  `port_service` int(11) DEFAULT NULL,
  `port_mem` int(11) DEFAULT NULL,
  `appname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `db_server_id` int(11) DEFAULT NULL,
  `slave_server_id` int(11) DEFAULT NULL,
  `mem_max` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mem_min` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mem_init` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `process` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `domain_category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `service` */

insert  into `service`(`id`,`name`,`server_id`,`game_id`,`service_category_id`,`db_service_id`,`ssh_service_id`,`dir_init`,`servernum`,`nickname`,`port_dbslave`,`port_dbmaster`,`port_sshout`,`port_sshin`,`port_socket`,`port_http`,`port_service`,`port_mem`,`appname`,`db_server_id`,`slave_server_id`,`mem_max`,`mem_min`,`mem_init`,`process`,`domain_category_id`) values (2,'网站编辑器',3,NULL,4,NULL,5,'/data/local/tomcat_edit3gsiteweb/','','',0,3297,4343,22,0,8005,9014,0,'edit3gsiteweb',3,3,'','','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_edit3gsiteweb/conf/logging.properties',5),(4,'微信正式服',3,NULL,4,NULL,5,'/data/local/tomcat_weixin/','','',0,3297,4343,22,0,8045,9030,0,'weixin',3,3,'600','600','120','bin/java -Djava.util.logging.config.file=/data/local/tomcat_weixin/conf/logging.properties',13),(5,'ssh_60',3,NULL,2,NULL,NULL,'','','',0,0,0,0,4343,0,22,0,'',10,10,'','','','',16),(6,'ssh_253',2,NULL,2,NULL,NULL,'','','',0,0,0,0,4343,0,22,0,'',10,10,'','','','',16),(7,'ssh_67',1,NULL,2,NULL,NULL,'','','',0,0,0,0,22,0,22,0,'',10,10,'','','','',16),(8,'ssh_214',4,NULL,2,NULL,NULL,'','','',0,0,0,0,22,0,22,0,'',10,10,'','','','',16),(9,'mysql_54',8,NULL,1,NULL,NULL,'','','',0,0,0,0,3306,0,3306,0,'',8,9,'','','','',16),(10,'mysql_3297',3,NULL,1,NULL,5,'','','',0,0,0,0,3297,0,3297,0,'',3,3,'','','','',16),(12,'激活码',3,NULL,4,NULL,5,'/data/local/tomcat_activitycode/','','',0,0,0,0,0,7004,9034,0,'activity',3,3,'','','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_activitycode/conf/logging.properties',16),(13,'数据平台管理系统',3,NULL,4,NULL,5,'/data/local/tomcat_manager/','','',0,0,0,0,0,7006,9067,0,'manager',3,3,'','','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_manager/conf/logging.properties',16),(14,'3gweb网站',3,NULL,4,NULL,5,'/data/local/tomcat_3gsiteweb/','','',0,0,0,0,0,8007,9001,0,'website',3,3,'','','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_3gsiteweb/conf/logging.properties',16),(15,'客服系统',3,NULL,4,NULL,5,'/data/local/tomcat_oldmanage/','','',0,0,0,0,0,8047,9032,0,'manage',3,3,'','','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_oldmanage/conf/logging.properties',16),(16,'passbind',3,NULL,4,NULL,5,'/data/local/tomcat_passbind/','','',0,0,0,0,0,8043,9044,0,'passbind',3,3,'','','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_passbind/conf/logging.properties',16),(17,'3gwap',3,NULL,4,NULL,5,'/data/local/tomcat_3gsitewap/','','',0,0,0,0,0,8080,9047,0,'wapsite',3,3,'','','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_3gsitewap/conf/logging.properties',16),(18,'魔力5_天兽森林',2,NULL,3,NULL,6,'/data/local/tomcat_moli5/','5','天兽森林',0,0,0,0,8935,8035,9085,0,'moli1',8,8,'512','512','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_moli5/conf/logging.properties',28),(19,'魔力1_星宇之界',2,NULL,3,NULL,6,'/data/local/tomcat_moli1/','1','星宇之界',0,0,0,0,7038,7037,9037,0,'moli1',8,8,'512','512','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_moli1/conf/logging.properties',28),(20,'官服冒泡代理',2,NULL,3,NULL,6,'/data/local/tomcat_agent/','','',0,0,0,0,0,7032,9032,0,'agent',8,8,'512','512','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_agent/conf/logging.properties',16),(21,'思凯冒泡代理',2,NULL,3,NULL,6,'/data/local/tomcat_skagent/','','',0,0,0,0,7033,7034,9033,0,'skagent',8,8,'512','512','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_skagent/conf/logging.properties',16),(22,'魔力centerappstore',2,NULL,3,NULL,6,'/data/local/tomcat_molicenterappstore/','','',0,0,0,0,0,7028,9028,0,'centerappstore',8,8,'512','512','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_molicenterappstore/conf/logging.properties',10),(23,'魔力centergate',2,NULL,3,NULL,6,'/data/local/tomcat_molicentergate/','','',0,0,0,0,0,7021,9521,0,'centergate',8,8,'1024','512','200','bin/java -Djava.util.logging.config.file=/data/local/tomcat_molicentergate/conf/logging.properties',10),(30,'梦幻42_帝王之路',2,NULL,3,NULL,6,'/data/local/tomcat_mengh42/','42','帝王之路',0,0,0,0,8932,8032,9082,0,'mengh',8,9,'800','800','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_mengh42/conf/logging.properties',28),(29,'充值charge',2,NULL,3,NULL,6,'/data/local/tomcat_charge/','','',0,0,0,0,0,7002,7003,0,'charge',8,9,'1024','512','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_charge/conf/logging.properties',18),(28,'充值chargegate',2,NULL,3,NULL,6,'/data/local/tomcat_chargegate/','','',0,0,0,0,0,7004,7005,0,'chargegate',8,9,'1024','512','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_chargegate/conf/logging.properties',18),(27,'魔力登录服center',2,NULL,3,NULL,6,'/data/local/tomcat_molicenter/','','',0,0,0,0,8050,7012,7013,0,'center',8,9,'1024','512','200','bin/java -Djava.util.logging.config.file=/data/local/tomcat_molicenter/conf/logging.properties',10),(31,'通行证passport',2,NULL,3,NULL,6,'/data/local/tomcat_passport/','','',0,0,0,0,0,7014,7015,0,'',8,9,'512','512','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_passport/conf/logging.properties',16),(32,'侠义66_运筹帷幄',2,NULL,3,NULL,6,'/data/local/tomcat_xiayi66/','66','运筹帷幄',0,0,0,0,8906,8006,9006,0,'xiayi',8,9,'800','800','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_xiayi66/conf/logging.properties',28),(33,'侠义centerappstore',2,NULL,3,NULL,6,'/data/local/tomcat_xiayicenterappstore/','','',0,0,0,0,0,7031,7030,0,'centerappstore',8,9,'1024','800','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_xiayicenterappstore/conf/logging.properties',17),(34,'侠义18_烈焰双龙',2,NULL,3,NULL,6,'/data/local/tomcat_xiayi18/','18','烈焰双龙',0,0,0,0,8903,8003,9003,0,'xiayi',8,9,'800','800','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_xiayi18/conf/logging.properties',28),(35,'侠义centergate',2,NULL,3,NULL,6,'/data/local/tomcat_xiayicentergate/','','',0,0,0,0,0,7025,7026,0,'centergate',8,9,'600','600','120','bin/java -Djava.util.logging.config.file=/data/local/tomcat_xiayicentergate/conf/logging.properties',17),(36,'侠义1_侠肝义胆',2,NULL,3,NULL,6,'/data/local/tomcat_xiayi1/','','',0,0,0,0,8901,8001,9001,0,'xiayi',8,9,'1100','1100','200','bin/java -Djava.util.logging.config.file=/data/local/tomcat_xiayi1/conf/logging.properties',28),(37,'侠义center登陆服',2,NULL,3,NULL,6,'/data/local/tomcat_xiayicenter/','','',0,0,0,0,8897,8000,9000,0,'center',8,9,'1024','512','200','bin/java -Djava.util.logging.config.file=/data/local/tomcat_xiayicenter/conf/logging.properties',17),(38,'梦幻31_天神之路',2,NULL,3,NULL,6,'/data/local/tomcat_mengh31/','31','天神之路',0,0,0,0,8922,8022,9022,0,'mengh',8,9,'800','800','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_mengh31/conf/logging.properties',28),(39,'梦幻4_曜月之城',2,NULL,3,NULL,6,'/data/local/tomcat_mengh4/','4','曜月之城',0,0,0,0,8921,8021,9021,0,'mengh',8,9,'800','800','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_mengh4/conf/logging.properties',28),(40,'魔力centercore',2,NULL,3,NULL,6,'/data/opt/centercore_moli/','','',0,0,0,0,0,0,0,0,'',8,9,'','','','/data/opt/centercore_moli/doc/WEB-INF/classes',10),(41,'侠义centerthird',2,NULL,3,NULL,6,'/data/opt/centerthird_xiayi/','','',0,0,0,0,0,0,0,0,'',8,9,'','','','/data/opt/centerthird_xiayi/doc/WEB-INF/classes',17),(42,'魔力centerthird',2,NULL,3,NULL,6,'/data/opt/centerthird_moli/','','',0,0,0,0,0,0,0,0,'',8,9,'','','','/data/opt/centerthird_moli/doc/WEB-INF/classes',10),(43,'侠义centercore',2,NULL,3,NULL,6,'/data/opt/centercore_xiayi/','','',0,0,0,0,0,0,0,0,'',8,9,'','','','/data/opt/centercore_xiayi/doc/WEB-INF/classes',17),(44,'充值chargecore',2,NULL,3,NULL,6,'/data/opt/chargecore/','','',0,0,0,0,0,0,0,0,'',8,9,'','','','/data/opt/chargecore/doc/WEB-INF/classes',18),(45,'梦幻centergate',1,NULL,3,NULL,7,'/data/local/tomcat_menghcentergate/','','',0,0,0,0,0,7038,9026,0,'centergate',8,9,'1024','512','200','bin/java -Djava.util.logging.config.file=/data/local/tomcat_menghcentergate/conf/logging.properties',9),(46,'梦幻centerappstore',1,NULL,3,NULL,7,'/data/local/tomcat_menghcenterappstore/','','',0,0,0,0,0,7039,9027,0,'centerappstore',8,9,'1024','512','200','bin/java -Djava.util.logging.config.file=/data/local/tomcat_menghcenterappstore/conf/logging.properties',9),(47,'梦幻center登陆服',1,NULL,3,NULL,7,'/data/local/tomcat_menghcenter/','','',0,0,0,0,0,8000,8040,0,'center',8,9,'1024','512','200','bin/java -Djava.util.logging.config.file=/data/local/tomcat_menghcenter/conf/logging.properties',9),(48,'魔力11_挪威海岸',1,NULL,3,NULL,7,'/data/local/tomcat_moli11/','11','挪威海岸',0,0,0,0,8941,8041,9091,0,'moli1',8,9,'800','800','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_moli11/conf/logging.properties',32),(49,'魔力10_破浪海湾',1,NULL,3,NULL,7,'/data/local/tomcat_moli10/','10','破浪海湾',0,0,0,0,8970,8070,9120,0,'moli1',8,9,'800','800','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_moli10/conf/logging.properties',32),(50,'侠义69_江山如画',1,NULL,3,NULL,7,'/data/local/tomcat_xiayi69/','69','江山如画',0,0,0,0,8909,8009,9009,0,'xiayi',8,9,'3000','1000','300','bin/java -Djava.util.logging.config.file=/data/local/tomcat_xiayi69/conf/logging.properties',32),(51,'楚汉1_江山美人',1,NULL,3,NULL,7,'/data/local/tomcat_chuhan1/','1','江山美人',0,0,0,0,8861,8862,9061,0,'chuhan',8,9,'1000','500','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_chuhan1/conf/logging.properties',32),(52,'侠义cross',1,NULL,3,NULL,7,'/data/local/tomcat_xiayicross/','','',0,0,0,0,8911,8011,9011,0,'xiayi',8,9,'800','500','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_xiayicross/conf/logging.properties',32),(53,'梦幻41_望川海峡',1,NULL,3,NULL,7,'/data/local/tomcat_mengh41/','41','望川海峡',0,0,0,0,8931,8031,9081,0,'mengh',8,9,'800','800','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_mengh41/conf/logging.properties',32),(54,'梦幻40_伊特牧场',1,NULL,3,NULL,7,'/data/local/tomcat_mengh40/','40','伊特牧场',0,0,0,0,8930,8030,9080,0,'mengh',8,9,'800','800','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_mengh40/conf/logging.properties',32),(55,'梦幻38_寂静海湾',1,NULL,3,NULL,7,'/data/local/tomcat_mengh38/','38','寂静海湾',0,0,0,0,8928,8028,9078,0,'mengh',8,9,'800','800','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_mengh38/conf/logging.properties',32),(56,'侠义58_百战八荒',1,NULL,3,NULL,7,'/data/local/tomcat_xiayi58/','58','百战八荒',0,0,0,0,8908,8008,9008,0,'xiayi',8,9,'800','800','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_xiayi58/conf/logging.properties',32),(57,'侠义62_鏖战千里',1,NULL,3,NULL,7,'/data/local/tomcat_xiayi62/','62','鏖战千里',0,0,0,0,8902,8002,9002,0,'xiayi',8,9,'800','800','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_xiayi62/conf/logging.properties',32),(58,'侠义67_指点江山',1,NULL,3,NULL,7,'/data/local/tomcat_xiayi67/','67','指点江山',0,0,0,0,8907,8007,9007,0,'xiayi',8,9,'800','800','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_xiayi67/conf/logging.properties',32),(59,'侠义68_皇朝霸业',1,NULL,3,NULL,7,'/data/local/tomcat_xiayi68/','68','皇朝霸业',0,0,0,0,8918,8018,9018,0,'xiayi',8,9,'800','800','150','bin/java -Djava.util.logging.config.file=/data/local/tomcat_xiayi68/conf/logging.properties',32),(60,'梦幻centerthird',1,NULL,3,NULL,7,'/data/opt/centerthird_mengh/','','',0,0,0,0,0,0,0,0,'',8,9,'','','','/data/opt/centerthird_mengh/doc/WEB-INF/classes',9),(61,'梦幻centercore',1,NULL,3,NULL,7,'/data/opt/centercore_mengh/','','',0,0,0,0,0,0,0,0,'',8,9,'','','','/data/opt/centercore_mengh/doc/WEB-INF/classes',9),(62,'绝色霸业centerthird',4,NULL,3,NULL,8,'/data/opt/centerthird_chuhan/','','',0,0,0,0,0,0,0,0,'',8,9,'','','','/data/opt/centerthird_chuhan/doc/WEB-INF/classes',7),(63,'绝色霸业centercore',4,NULL,3,NULL,8,'/data/opt/centercore_chuhan/','','',0,0,0,0,0,0,0,0,'',8,9,'','','','/data/opt/centercore_chuhan/doc/WEB-INF/classes',7),(64,'p2p服务',4,NULL,3,NULL,8,'/home/liujin/p2pServer/','','',0,0,0,0,0,0,0,0,'',8,9,'','','','/home/liujin/p2pServer/lib/p2pEngine-1.0.jar',16),(65,'侠义苹果评测服_龙血丹心',4,NULL,3,NULL,8,'/data/local/tomcat_macxiayi0/','0','龙血丹心',0,0,0,0,8900,7999,8999,11000,'xiayi',8,9,'500','200','100','bin/java -Djava.util.logging.config.file=/data/local/tomcat_macxiayi0/conf/logging.properties',29),(66,'侠义苹果评测服cross',4,NULL,3,NULL,8,'/data/local/tomcat_macxiayi0/','','',0,0,0,0,8900,7999,8999,0,'cross',8,9,'500','200','100','bin/java -Djava.util.logging.config.file=/data/local/tomcat_macxiayi0/conf/logging.properties',29),(67,'魔力评测服_晴空物语',4,NULL,3,NULL,8,'/data/local/tomcat_moli0/','','',0,0,0,0,8931,8031,9031,0,'moli1',8,9,'300','200','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_moli0/conf/logging.properties',29),(68,'梦幻评测服_海神之光',4,NULL,3,NULL,8,'/data/local/tomcat_mengh0/','0','海神之光',0,0,0,0,8920,8020,9070,0,'moli2',8,9,'300','200','100','bin/java -Djava.util.logging.config.file=/data/local/tomcat_mengh0/conf/logging.properties',29),(69,'绝色霸业center登陆服',4,NULL,3,NULL,8,'/data/local/tomcat_chuhancentergate/','','',0,0,0,0,8892,7002,7002,0,'center',8,9,'100','100','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_chuhancenter/conf/logging.properties',7),(70,'绝色霸业centergate',4,NULL,3,NULL,8,'/data/local/tomcat_chuhancentergate/','','',0,0,0,0,0,7004,7005,0,'centergate',8,9,'100','100','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_chuhancentergate/conf/logging.properties',7),(71,'绝色霸业centerappstore',4,NULL,3,NULL,8,'/data/local/tomcat_chuhancenterappstore/','','',0,0,0,0,0,7008,7009,0,'centerappstore',8,9,'100','100','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_chuhancenterappstore/conf/logging.properties',7),(72,'绝色霸业centerrequest',4,NULL,3,NULL,8,'/data/local/tomcat_chuhancenterrequest/','','',0,0,0,0,0,7020,9020,0,'centerrequest',8,9,'100','100','','bin/java -Djava.util.logging.config.file=/data/local/tomcat_chuhancenterrequest/conf/logging.properties',7);

/*Table structure for table `service_category` */

DROP TABLE IF EXISTS `service_category`;

CREATE TABLE `service_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `service_category` */

insert  into `service_category`(`id`,`name`,`remark`) values (1,'mysql',''),(2,'ssh',''),(3,'业务',''),(4,'周边',''),(5,'web',''),(6,'测试服','');

/*Table structure for table `service_db` */

DROP TABLE IF EXISTS `service_db`;

CREATE TABLE `service_db` (
  `service_id` int(11) NOT NULL,
  `db_service_id` int(11) NOT NULL,
  PRIMARY KEY (`service_id`,`db_service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `service_db` */

insert  into `service_db`(`service_id`,`db_service_id`) values (2,10),(4,10),(10,10),(12,10),(13,10),(14,10),(15,10),(16,10),(17,10),(18,9),(19,9),(20,10),(21,10),(22,9),(23,9),(27,9),(28,9),(29,9),(30,9),(31,9),(32,9),(33,9),(34,9),(35,9),(36,9),(37,9),(38,9),(39,9),(40,9),(41,9),(42,9),(43,9),(44,9),(45,9),(46,9),(47,9),(48,9),(49,9),(50,9),(51,9),(52,9),(53,9),(54,9),(55,9),(56,9),(57,9),(58,9),(59,9),(60,9),(61,9),(62,9),(63,9),(64,9),(65,9),(66,9),(67,9),(68,9),(69,9),(70,9),(71,9),(72,9),(73,9),(74,10);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `creator` int(11) NOT NULL DEFAULT '0',
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`password`,`creator`,`role_id`) values (1,'admin','admin12',1,1),(2,'sa','sa',1,9),(3,'guest','guest',1,10),(8,'fa','fa',9,119),(7,'fanyd','fanyd12',1,9),(9,'fi','fi',9,2),(10,'ft','ft',9,120),(11,'f0','f0',9,121),(12,'a','a',1,150);

/*Table structure for table `user_wordbook` */

DROP TABLE IF EXISTS `user_wordbook`;

CREATE TABLE `user_wordbook` (
  `user_id` int(11) NOT NULL,
  `wordbook_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`wordbook_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_wordbook` */

insert  into `user_wordbook`(`user_id`,`wordbook_id`) values (1,1),(1,2),(1,3),(1,12),(1,18),(1,19),(1,20),(1,29),(1,35),(1,36),(1,37),(1,38),(1,39),(1,40),(1,41),(1,42),(1,43),(1,45),(1,54),(1,55),(1,56),(1,57),(7,1),(7,2),(7,3),(7,18),(7,19),(7,20),(7,35);

/*Table structure for table `wordbook` */

DROP TABLE IF EXISTS `wordbook`;

CREATE TABLE `wordbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  `flag_mod` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `colnameid` varchar(50) DEFAULT NULL,
  `keyid` varchar(30) DEFAULT NULL,
  `seq` int(11) NOT NULL DEFAULT '0',
  `odr` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `flag_set` int(11) NOT NULL DEFAULT '0',
  `sql_col_str` varchar(100) DEFAULT NULL,
  `sql_relate` varchar(300) DEFAULT NULL,
  `sql_mod` varchar(200) DEFAULT NULL,
  `sql_eval` varchar(500) DEFAULT NULL,
  `sql_col_str1` varchar(100) DEFAULT NULL,
  `sql_eval1` varchar(500) DEFAULT NULL,
  `str` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;

/*Data for the table `wordbook` */

insert  into `wordbook`(`id`,`type`,`flag`,`flag_mod`,`name`,`colnameid`,`keyid`,`seq`,`odr`,`menu_id`,`parent_id`,`flag_set`,`sql_col_str`,`sql_relate`,`sql_mod`,`sql_eval`,`sql_col_str1`,`sql_eval1`,`str`) values (1,0,0,1,'序号','id',NULL,1,0,4,0,1,NULL,'',NULL,NULL,'','',NULL),(2,3,0,0,'权限名称','name',NULL,2,1,4,0,0,NULL,'',NULL,NULL,'','',NULL),(3,1,0,0,'权限明细','id','id',3,3,4,0,0,'4#id,name#@','select * from menu where parent_id>0','select m.* from role_menu rm, menu m where m.id=rm.menu_id and rm.role_id=','\'select m.* from menu m,role_menu rm where m.id=rm.menu_id and m.type=0 and m.id<>13 and role_id=\'.$para_sql_type_1.\' group by m.id\'','id,name','\'select * from menu where parent_id>0 and type=0 and id<>13\'','role_menu#role_id,menu_id'),(4,2003,0,0,'新增','func_add',NULL,1,0,4,0,0,NULL,'',NULL,NULL,'','',NULL),(5,2003,0,0,'批删除','oprt_delall',NULL,2,1,4,0,0,NULL,'',NULL,NULL,'','',NULL),(7,1005,0,0,'编辑','func_mod_',NULL,1,0,4,0,0,NULL,'',NULL,NULL,'','',NULL),(8,1005,1,0,'删除','oprt_del_',NULL,3,2,4,0,0,NULL,'',NULL,NULL,'','',NULL),(37,0,0,0,'名称','name',NULL,1,1,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(11,1005,0,0,'设置','func_set_',NULL,2,1,4,0,0,NULL,'',NULL,NULL,'','',NULL),(12,6,0,1,'创建者','creator','creator',0,2,4,0,0,'id,name','',NULL,'\'select id,name from role where id in (\'.$para_sql_type_6.\')\'','','',NULL),(13,2003,0,0,'批换权','func_allset',NULL,4,3,4,0,0,NULL,'',NULL,NULL,'','',NULL),(15,3000,0,0,'权限名称','name',NULL,0,NULL,4,17,0,NULL,'',NULL,NULL,'','',NULL),(16,3001,0,0,'创建者','creator',NULL,0,NULL,4,17,0,NULL,'',NULL,NULL,'','',NULL),(17,2999,0,0,'搜索',NULL,NULL,0,NULL,4,0,0,NULL,'',NULL,NULL,'','',NULL),(18,0,0,1,'序号','id',NULL,1,0,5,0,1,NULL,'',NULL,NULL,'','',NULL),(19,3,0,0,'用户名称','name',NULL,2,1,5,0,0,NULL,'',NULL,NULL,'','',NULL),(21,2003,0,0,'新增','func_add',NULL,1,0,5,0,0,NULL,'',NULL,NULL,'','',NULL),(22,2003,0,0,'批删除','oprt_delall',NULL,2,1,5,0,0,NULL,'',NULL,NULL,'','',NULL),(24,1005,0,0,'编辑','func_mod_',NULL,1,0,5,0,0,NULL,'',NULL,NULL,'','',NULL),(25,1005,1,0,'删除','oprt_del_',NULL,3,2,5,0,0,NULL,'',NULL,NULL,'','',NULL),(36,0,0,1,'序号','id',NULL,0,0,2,0,1,NULL,NULL,NULL,NULL,'','',NULL),(29,6,0,1,'创建组','creator','creator',0,3,5,0,0,'id,name','',NULL,'\'select id,name from role where id in (\'.$para_sql_type_6.\')\'','','',NULL),(20,6,0,0,'所属组','role_id','id',2,4,5,0,0,'id,name','',NULL,'\'select id,name from role where id in (\'.$para_sql_type_6.\')\'','id,name','\'select id,name from role where id<>2 and creator=\'.$this->login_role_id',NULL),(32,3000,0,0,'用户名称','name',NULL,0,NULL,5,34,0,NULL,'',NULL,NULL,'','',NULL),(33,3001,0,0,'创建者','creator',NULL,0,NULL,5,34,0,NULL,'',NULL,NULL,'','',NULL),(34,2999,0,0,'搜索',NULL,NULL,0,NULL,5,0,0,NULL,'',NULL,NULL,'','',NULL),(35,0,0,0,'密码','password',NULL,0,2,5,0,0,NULL,NULL,NULL,NULL,'','',NULL),(38,3,0,0,'内网ip','ipi',NULL,2,2,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(39,2,0,0,'外网ip','ipo',NULL,3,3,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(40,0,0,0,'内存','memory',NULL,4,4,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(41,2,0,0,'带宽','bandwidth',NULL,5,9,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(42,2,0,0,'cpu','cpu',NULL,6,10,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(43,0,0,0,'硬盘','hd',NULL,7,11,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(45,2,0,0,'到期时间','enddate',NULL,9,12,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(46,2003,0,0,'新增','func_add',NULL,1,0,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(47,2003,0,0,'批删除','oprt_delall',NULL,2,1,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(48,1005,0,0,'编辑','func_mod_',NULL,1,0,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(49,1005,0,0,'删除','oprt_del_',NULL,3,2,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(50,2003,0,0,'新增','func_add',NULL,1,0,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(51,2003,0,0,'批删除','oprt_delall',NULL,2,1,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(52,1005,0,0,'编辑','func_mod_',NULL,1,0,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(53,1005,0,0,'删除','oprt_del_',NULL,3,2,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(54,2,0,0,'主db端口','port_dbmaster',NULL,4,6,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(55,2,0,0,'外网ssh端口','port_sshout',NULL,5,5,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(56,2,0,0,'从db端口','port_dbslave',NULL,7,7,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(57,2,0,0,'内网ssh端口','port_sshin',NULL,8,8,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(58,0,0,1,'序号','id',NULL,0,0,3,0,1,NULL,NULL,NULL,NULL,'','',NULL),(59,3,0,0,'名称','name',NULL,1,1,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(60,6,0,0,'ip','server_id',NULL,2,2,3,0,0,'id,ip',NULL,NULL,'\'select id,concat(ipi,\\\'(内)<br/>\\\',ipo,\\\'(外)\\\') ip from server where id in (\'.$para_sql_type_6.\')\'','id,name','\'select id,name from server\'',NULL),(62,2,0,0,'编号','servernum',NULL,4,3,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(63,2,0,0,'别称','nickname',NULL,5,4,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(64,2,0,0,'初始路径','dir_init',NULL,6,5,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(65,2,0,0,'从db端口','port_dbslave',NULL,7,6,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(66,2,0,0,'主db端口','port_dbmaster',NULL,8,7,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(67,2,0,0,'外网ssh端口','port_sshout',NULL,9,8,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(68,2,0,0,'内网ssh端口','port_sshin',NULL,10,9,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(69,2,0,0,'程序端口','port_socket',NULL,11,10,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(70,2,0,0,'http端口','port_http',NULL,12,11,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(71,2,0,0,'服务端口','port_service',NULL,13,12,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(72,2,0,0,'缓存db端口','port_mem',NULL,14,13,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(73,2,0,0,'应用名称','appname',NULL,15,14,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(74,6,0,0,'域名','domain_category_id',NULL,16,20,3,0,0,'id,domains',NULL,NULL,'\'select dc.id, group_concat(d.domain separator \\\'<br/>\\\') domains from domain d, domain_category dc where d.domain_category_id=dc.id and dc.id in (\'.$para_sql_type_6.\') group by dc.id\'','id,name','\'select id,name from domain_category\'',NULL),(75,2,0,0,'最大内存','mem_max',NULL,17,21,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(76,2,0,0,'最小内存','mem_min',NULL,18,22,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(77,2,0,0,'初始内存','mem_init',NULL,19,23,3,0,0,NULL,NULL,NULL,NULL,'','',NULL),(104,2003,0,0,'新增','func_add',NULL,0,50,10,0,0,NULL,NULL,NULL,NULL,'','',NULL),(103,406,0,0,'服务器名称','server_id',NULL,5,5,10,0,0,'id,name',NULL,NULL,'\'select id, name from server where id in (\'.$para_sql_type_6.\')\'','id,name','\'select id,name from server\'',NULL),(101,206,0,0,'ip','server_id',NULL,3,3,10,0,0,'id,ip',NULL,NULL,'\'select id,concat(ipi,\\\'(内)<br/>\\\',ipo,\\\'(外)\\\') ip from server where id in (\'.$para_sql_type_6.\')\'','','',NULL),(100,2,0,0,'域名','domain',NULL,2,2,2,0,0,NULL,NULL,NULL,NULL,'','',NULL),(98,0,0,1,'序号','id',NULL,0,0,10,0,1,NULL,NULL,NULL,NULL,'','',NULL),(105,2003,0,0,'批删除','oprt_delall',NULL,0,51,10,0,0,NULL,NULL,NULL,NULL,'','',NULL),(106,1005,0,0,'编辑','func_mod_',NULL,0,52,10,0,0,NULL,NULL,NULL,NULL,'','',NULL),(107,1005,0,0,'删除','oprt_del_',NULL,0,53,10,0,0,NULL,NULL,NULL,NULL,'','',NULL),(108,2003,0,0,'新增','func_add',NULL,0,50,11,0,0,NULL,NULL,NULL,NULL,'','',NULL),(109,2003,0,0,'批删除','oprt_delall',NULL,0,51,11,0,0,NULL,NULL,NULL,NULL,'','',NULL),(110,1005,0,0,'编辑','func_mod_',NULL,0,52,11,0,0,NULL,NULL,NULL,NULL,'','',NULL),(111,1005,0,0,'删除','oprt_del_',NULL,0,53,11,0,0,NULL,NULL,NULL,NULL,'','',NULL),(112,0,0,1,'序号','id',NULL,0,0,11,0,1,NULL,NULL,NULL,NULL,'','',NULL),(113,0,0,0,'名称','name',NULL,1,1,11,0,0,'4#id,db_service_id1#@',NULL,NULL,'\'select db_service_id id,db_service_id from service_db where id=\'.$para_sql_type_1','','',NULL),(132,406,0,0,'ssh关联','ssh_service_id',NULL,16,16,3,0,0,NULL,NULL,NULL,NULL,'id,name','\'select id,name from service where service_category_id=2\'',NULL),(131,401,0,0,'db关联','db_service_id',NULL,17,17,3,0,0,'4#id,name#@',NULL,'select * from service_db where service_id=','\'select s.* from service s, service_db sd where sd.db_service_id=s.id and sd.service_id=\'.$para_sql_type_1.\' group by sd.db_service_id\'','id,name','\'select * from service where service_category_id=1\'','service_db#service_id,db_service_id'),(130,406,0,0,'服务类别','service_category_id',NULL,15,15,3,0,0,NULL,NULL,NULL,NULL,'id,name','\'select id,name from service_category\'',NULL),(129,2,0,0,'备注','remark',NULL,2,2,12,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(128,0,0,0,'名称','name',NULL,1,1,12,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(127,0,0,1,'序号','id',NULL,0,0,12,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(126,1005,0,0,'删除','oprt_del_',NULL,0,53,12,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(125,1005,0,0,'编辑','func_mod_',NULL,0,52,12,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(124,2003,0,0,'批删除','oprt_delall',NULL,0,51,12,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(123,2003,0,0,'新增','func_add',NULL,0,50,12,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(116,0,0,0,'域名','domain',NULL,1,1,10,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(122,206,0,0,'备注','domain_category_id',NULL,4,4,10,0,0,'id,remark',NULL,NULL,'\'select id,remark from domain_category where id in (\'.$para_sql_type_6.\')\'',NULL,NULL,NULL),(121,6,0,0,'slave_ip','slave_server_id',NULL,16,19,3,0,0,'id,ip',NULL,NULL,'\'select id,concat(ipi,\\\'(内)<br/>\\\',ipo,\\\'(外)\\\') ip from server where id in (\'.$para_sql_type_6.\')\'','id,name','\'select id,name from server\'',NULL),(120,6,0,0,'db_ip','db_server_id',NULL,15,18,3,0,0,'id,ip',NULL,NULL,'\'select id,concat(ipi,\\\'(内)<br/>\\\',ipo,\\\'(外)\\\') ip from server where id in (\'.$para_sql_type_6.\')\'','id,name','\'select id,name from server\'',NULL),(119,2,0,0,'进程特征','process',NULL,19,24,3,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(118,2,0,0,'备注','remark',NULL,2,2,11,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(117,406,0,0,'域名分类','domain_category_id',NULL,6,6,10,0,0,NULL,NULL,NULL,NULL,'id,name','\'select id,name from domain_category\'',NULL),(133,404,0,0,'分类明细','13',NULL,4,3,4,3,0,'4#id,name#@',NULL,NULL,'\'select m.* from menu m,role_menu rm where m.id=rm.menu_id and m.type=1 and m.id<>13 and role_id=\'.$para_sql_type_1.\' group by m.id\'','id,name','\'select * from menu where parent_id>0 and type=1\'',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

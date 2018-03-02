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

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `modelname` varchar(50) DEFAULT NULL,
  `flag_set` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`id`,`name`,`parent_id`,`modelname`,`flag_set`) values (1,'系统管理',0,NULL,0),(3,'服务管理',9,'service',0),(2,'服务器管理',9,'server',0),(4,'权限管理',1,'role',0),(5,'用户管理',1,'user',0),(6,'个人管理',0,NULL,0),(7,'修改密码',6,'umdpswd',1),(8,'字段设置',6,'usetcol',1),(9,'运维管理',0,NULL,0);

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `creator` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

/*Data for the table `role` */

insert  into `role`(`id`,`name`,`creator`) values (1,'admin',1),(2,'init',1),(121,'初始权限',9),(9,'全部权限',1),(10,'默认权限',1),(99,'测试全部',1),(119,'全部权限',9),(120,'测试权限',9);

/*Table structure for table `role_menu` */

DROP TABLE IF EXISTS `role_menu`;

CREATE TABLE `role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role_menu` */

insert  into `role_menu`(`role_id`,`menu_id`) values (1,2),(1,3),(1,4),(1,5),(1,7),(2,2),(2,3),(2,7),(9,2),(9,3),(9,4),(9,5),(9,7),(10,7),(99,2),(99,3),(99,4),(99,5),(119,2),(119,3),(119,4),(119,5),(119,7),(119,8),(120,5),(120,7),(120,8),(121,2),(121,3),(121,7),(121,8);

/*Table structure for table `role_wordbook` */

DROP TABLE IF EXISTS `role_wordbook`;

CREATE TABLE `role_wordbook` (
  `role_id` int(11) NOT NULL,
  `wordbook_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`wordbook_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role_wordbook` */

insert  into `role_wordbook`(`role_id`,`wordbook_id`) values (1,1),(1,2),(1,3),(1,4),(1,5),(1,7),(1,8),(1,10),(1,11),(1,12),(1,13),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(1,24),(1,25),(1,27),(1,29),(1,34),(1,35),(1,36),(1,37),(1,38),(1,39),(1,40),(1,41),(1,42),(1,43),(1,44),(1,45),(1,46),(1,47),(1,48),(1,49),(1,50),(1,51),(1,52),(1,53),(1,54),(1,55),(1,56),(1,57),(9,1),(9,2),(9,3),(9,4),(9,5),(9,7),(9,8),(9,10),(9,11),(9,12),(9,13),(9,17),(9,18),(9,19),(9,20),(9,21),(9,22),(9,24),(9,25),(9,27),(9,29),(9,34),(9,35),(9,36),(9,37),(9,38),(9,39),(9,40),(9,41),(9,42),(9,43),(9,45),(9,46),(9,47),(9,48),(9,49),(9,50),(9,51),(9,52),(9,53),(9,54),(9,55),(9,56),(9,57),(99,1),(99,2),(99,3),(99,4),(99,7),(99,8),(99,10),(99,11),(99,17),(99,18),(99,19),(99,20),(99,21),(99,24),(99,25),(99,27),(99,34),(119,1),(119,2),(119,3),(119,4),(119,5),(119,7),(119,8),(119,11),(119,12),(119,13),(119,17),(119,18),(119,19),(119,20),(119,21),(119,22),(119,24),(119,25),(119,29),(119,34),(119,35),(119,36),(119,37),(119,38),(119,39),(119,40),(119,41),(119,42),(119,43),(119,45),(119,46),(119,47),(119,48),(119,49),(119,50),(119,51),(119,52),(119,53),(119,54),(119,55),(119,56),(119,57),(120,18),(120,19),(120,20),(120,21),(120,22),(120,24),(120,25),(120,29),(120,34),(120,35);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `server` */

insert  into `server`(`id`,`name`,`ipi`,`ipo`,`memory`,`port_sshout`,`port_dbmaster`,`port_dbslave`,`port_sshin`,`cpu`,`hd`,`bandwidth`,`enddate`) values (1,'主业务_67','10.105.73.234','115.159.53.67','16G',22,0,0,22,'8c','8_30G','10M','2018-12-13 17:43:00'),(2,'主业务_253','10.247.46.14','182.254.140.253','16G',4343,0,0,22,'8c','8_50G','10M','2019-08-03 04:35:00'),(3,'跳板机_60','10.237.154.240','115.159.79.60','8G',4343,0,0,22,'4c','8_50G','3M','2018-10-26 17:07:00'),(4,'业务_214','10.105.50.143','182.254.138.214','4G',22,0,0,22,'4c','8_20G','3M','2018-10-26 17:07:00'),(6,'测试服_251','192.168.2.251','','4G',22,0,0,22,'8c','500G','','0000-00-00 00:00:00'),(7,'网关_254','192.168.2.254','218.108.34.254','4G',22,0,0,22,'8c','500G','','0000-00-00 00:00:00'),(8,'主数据库_54','10.66.105.54','','4G',0,3306,0,0,'','100G','','2018-07-15 00:00:00'),(9,'从数据库_241','10.66.126.241','','4G',0,0,3306,0,'','100G','','0000-00-00 00:00:00'),(10,'测试服_248','192.168.2.248','','',0,0,0,0,'','','','0000-00-00 00:00:00');

/*Table structure for table `service` */

DROP TABLE IF EXISTS `service`;

CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `server_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `category_svc_id` int(11) DEFAULT NULL,
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
  `domain_id` int(11) DEFAULT NULL,
  `mem_max` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mem_min` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mem_init` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `process` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `service` */

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`password`,`creator`,`role_id`) values (1,'admin','admin12',1,1),(2,'sa','sa',1,9),(3,'guest','guest',1,10),(8,'fa','fa',9,119),(7,'fanyd','fanyd12',1,9),(9,'fi','fi',9,2),(10,'ft','ft',9,120),(11,'f0','f0',9,121);

/*Table structure for table `user_wordbook` */

DROP TABLE IF EXISTS `user_wordbook`;

CREATE TABLE `user_wordbook` (
  `user_id` int(11) NOT NULL,
  `wordbook_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`wordbook_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

/*Data for the table `wordbook` */

insert  into `wordbook`(`id`,`type`,`flag`,`flag_mod`,`name`,`colnameid`,`keyid`,`seq`,`odr`,`menu_id`,`parent_id`,`flag_set`,`sql_col_str`,`sql_relate`,`sql_mod`,`sql_eval`) values (1,0,0,1,'序号','id',NULL,1,0,4,0,1,NULL,'',NULL,NULL),(2,3,0,0,'权限名称','name',NULL,2,1,4,0,0,NULL,'',NULL,NULL),(3,1,0,0,'权限明细','id','id',3,3,4,0,0,'id,name','select * from menu where parent_id>0','select * from role_menu where role_id=','\'select m.* from menu m,role_menu rm where m.id=rm.menu_id and role_id=\'.$para_sql_type_1.\' group by m.id\''),(4,2003,0,0,'新增','func_add',NULL,1,0,4,0,0,NULL,'',NULL,NULL),(5,2003,0,0,'批删除','oprt_delall',NULL,2,1,4,0,0,NULL,'',NULL,NULL),(7,1005,0,0,'编辑','func_mod_',NULL,1,0,4,0,0,NULL,'',NULL,NULL),(8,1005,1,0,'删除','oprt_del_',NULL,3,2,4,0,0,NULL,'',NULL,NULL),(37,0,0,0,'名称','name',NULL,1,1,2,0,0,NULL,NULL,NULL,NULL),(11,1005,0,0,'设置','func_set_',NULL,2,1,4,0,0,NULL,'',NULL,NULL),(12,6,0,1,'创建者','creator','creator',0,2,4,0,0,'id,name','',NULL,'\'select id,name from role where id in (\'.$para_sql_type_6.\')\''),(13,2003,0,0,'批换权','func_allset',NULL,4,3,4,0,0,NULL,'',NULL,NULL),(15,3000,0,0,'权限名称','name',NULL,0,NULL,4,17,0,NULL,'',NULL,NULL),(16,3001,0,0,'创建者','creator',NULL,0,NULL,4,17,0,NULL,'',NULL,NULL),(17,2999,0,0,'搜索',NULL,NULL,0,NULL,4,0,0,NULL,'',NULL,NULL),(18,0,0,1,'序号','id',NULL,1,0,5,0,1,NULL,'',NULL,NULL),(19,3,0,0,'用户名称','name',NULL,2,1,5,0,0,NULL,'',NULL,NULL),(21,2003,0,0,'新增','func_add',NULL,1,0,5,0,0,NULL,'',NULL,NULL),(22,2003,0,0,'批删除','oprt_delall',NULL,2,1,5,0,0,NULL,'',NULL,NULL),(24,1005,0,0,'编辑','func_mod_',NULL,1,0,5,0,0,NULL,'',NULL,NULL),(25,1005,1,0,'删除','oprt_del_',NULL,3,2,5,0,0,NULL,'',NULL,NULL),(36,0,0,1,'序号','id',NULL,0,0,2,0,0,NULL,NULL,NULL,NULL),(29,6,0,1,'创建组','creator','creator',0,3,5,0,0,'id,name','',NULL,'\'select id,name from role where id in (\'.$para_sql_type_6.\')\''),(20,6,0,0,'所属组','role_id','id',2,4,5,0,0,'id,name','',NULL,'\'select id,name from role where id in (\'.$para_sql_type_6.\')\''),(32,3000,0,0,'用户名称','name',NULL,0,NULL,5,34,0,NULL,'',NULL,NULL),(33,3001,0,0,'创建者','creator',NULL,0,NULL,5,34,0,NULL,'',NULL,NULL),(34,2999,0,0,'搜索',NULL,NULL,0,NULL,5,0,0,NULL,'',NULL,NULL),(35,0,0,0,'密码','password',NULL,0,2,5,0,0,NULL,NULL,NULL,NULL),(38,3,0,0,'内网ip','ipi',NULL,2,2,2,0,0,NULL,NULL,NULL,NULL),(39,2,0,0,'外网ip','ipo',NULL,3,3,2,0,0,NULL,NULL,NULL,NULL),(40,0,0,0,'内存','memory',NULL,4,4,2,0,0,NULL,NULL,NULL,NULL),(41,2,0,0,'带宽','bandwidth',NULL,5,9,2,0,0,NULL,NULL,NULL,NULL),(42,2,0,0,'cpu','cpu',NULL,6,10,2,0,0,NULL,NULL,NULL,NULL),(43,0,0,0,'硬盘','hd',NULL,7,11,2,0,0,NULL,NULL,NULL,NULL),(45,2,0,0,'到期时间','enddate',NULL,9,12,2,0,0,NULL,NULL,NULL,NULL),(46,2003,0,0,'新增','func_add',NULL,1,0,2,0,0,NULL,NULL,NULL,NULL),(47,2003,0,0,'批删除','oprt_delall',NULL,2,1,2,0,0,NULL,NULL,NULL,NULL),(48,1005,0,0,'编辑','func_mod_',NULL,1,0,2,0,0,NULL,NULL,NULL,NULL),(49,1005,0,0,'删除','oprt_del_',NULL,3,2,2,0,0,NULL,NULL,NULL,NULL),(50,2003,0,0,'新增','func_add',NULL,1,0,3,0,0,NULL,NULL,NULL,NULL),(51,2003,0,0,'批删除','oprt_delall',NULL,2,1,3,0,0,NULL,NULL,NULL,NULL),(52,1005,0,0,'编辑','func_mod_',NULL,1,0,3,0,0,NULL,NULL,NULL,NULL),(53,1005,0,0,'删除','oprt_del_',NULL,3,2,3,0,0,NULL,NULL,NULL,NULL),(54,2,0,0,'主db端口','port_dbmaster',NULL,4,6,2,0,0,NULL,NULL,NULL,NULL),(55,2,0,0,'外网ssh端口','port_sshout',NULL,5,5,2,0,0,NULL,NULL,NULL,NULL),(56,2,0,0,'从db端口','port_dbslave',NULL,7,7,2,0,0,NULL,NULL,NULL,NULL),(57,2,0,0,'内网ssh端口','port_sshin',NULL,8,8,2,0,0,NULL,NULL,NULL,NULL),(58,0,0,0,'序号','id',NULL,0,0,3,0,0,NULL,NULL,NULL,NULL),(59,0,0,0,'名称','name',NULL,1,1,3,0,0,NULL,NULL,NULL,NULL),(60,6,0,0,'内网ip','ipi_id',NULL,2,2,3,0,0,NULL,NULL,NULL,NULL),(61,6,0,0,'外网ip','ipo_id',NULL,3,3,3,0,0,NULL,NULL,NULL,NULL),(62,0,0,0,'编号','servernum',NULL,4,4,3,0,0,NULL,NULL,NULL,NULL),(63,0,0,0,'别称','nickname',NULL,5,5,3,0,0,NULL,NULL,NULL,NULL),(64,0,0,0,'初始路径','dir_init',NULL,6,6,3,0,0,NULL,NULL,NULL,NULL),(65,0,0,0,'从db端口','port_dbslave',NULL,7,7,3,0,0,NULL,NULL,NULL,NULL),(66,0,0,0,'主db端口','port_dbmaster',NULL,8,8,3,0,0,NULL,NULL,NULL,NULL),(67,0,0,0,'外网ssh端口','port_sshout',NULL,9,9,3,0,0,NULL,NULL,NULL,NULL),(68,0,0,0,'内网ssh端口','port_sshin',NULL,10,10,3,0,0,NULL,NULL,NULL,NULL),(69,0,0,0,'程序端口','port_socket',NULL,11,11,3,0,0,NULL,NULL,NULL,NULL),(70,0,0,0,'http端口','port_http',NULL,12,12,3,0,0,NULL,NULL,NULL,NULL),(71,0,0,0,'服务端口','port_service',NULL,13,13,3,0,0,NULL,NULL,NULL,NULL),(72,0,0,0,'缓存db端口','port_mem',NULL,14,14,3,0,0,NULL,NULL,NULL,NULL),(73,0,0,0,'应用名称','appname',NULL,15,15,3,0,0,NULL,NULL,NULL,NULL),(74,6,0,0,'域名','domain_id',NULL,16,16,3,0,0,NULL,NULL,NULL,NULL),(75,0,0,0,'最大内存','mem_max',NULL,17,17,3,0,0,NULL,NULL,NULL,NULL),(76,0,0,0,'最小内存','mem_min',NULL,18,18,3,0,0,NULL,NULL,NULL,NULL),(77,0,0,0,'初始内存','mem_init',NULL,19,19,3,0,0,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

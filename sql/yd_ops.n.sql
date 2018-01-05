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
  `tablename` varchar(50) DEFAULT NULL,
  `flag_set` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`id`,`name`,`parent_id`,`tablename`,`flag_set`) values (1,'系统管理',0,NULL,0),(2,'服务管理',0,NULL,0),(3,'服务器管理',0,NULL,0),(4,'权限管理',1,'role',0),(5,'用户管理',1,'user',0),(6,'个人管理',0,NULL,0),(7,'修改密码',6,NULL,1);

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `creator` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

/*Data for the table `role` */

insert  into `role`(`id`,`name`,`creator`) values (1,'admin',1),(2,'init',1),(11,'test2',1),(13,'test1',1),(12,'testa',1),(9,'全部权限',1),(10,'空权限',1),(14,'test3',1),(34,'tmp1',1),(35,'tmp2',1),(19,'test_op_1',1),(20,'test_op_2',1),(21,'test_op_all',1),(37,'tmpall',1),(38,'t1',1),(36,'tmp0',1),(48,'t0',1),(41,'tall',1),(47,'t2',1);

/*Table structure for table `role_func` */

DROP TABLE IF EXISTS `role_func`;

CREATE TABLE `role_func` (
  `role_id` int(11) NOT NULL,
  `menu_sub_id` int(11) NOT NULL,
  `wordbook_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`menu_sub_id`,`wordbook_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `role_func` */

insert  into `role_func`(`role_id`,`menu_sub_id`,`wordbook_id`) values (1,4,1),(1,4,2),(1,4,3),(1,4,4),(1,4,5),(1,4,7),(1,4,8),(1,4,10),(1,4,11),(1,4,12),(1,4,13),(9,4,1),(9,4,2),(9,4,3),(9,4,4),(9,4,5),(9,4,7),(9,4,8),(9,4,10),(9,4,11),(9,4,12),(9,4,13),(35,4,1),(35,4,2),(35,4,3),(35,4,4),(35,4,5),(35,4,7),(35,4,8),(35,4,10),(35,4,11),(35,4,12),(35,4,13),(38,4,1),(38,4,2),(38,4,4),(38,4,10),(38,4,13),(41,4,1),(41,4,2),(41,4,3),(41,4,4),(41,4,5),(41,4,7),(41,4,8),(41,4,10),(41,4,11),(41,4,12),(41,4,13);

/*Table structure for table `role_menu` */

DROP TABLE IF EXISTS `role_menu`;

CREATE TABLE `role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_sub_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_sub_id`,`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `role_menu` */

insert  into `role_menu`(`role_id`,`menu_sub_id`) values (1,4),(9,4),(12,4),(13,4),(19,4),(21,4),(35,4),(37,4),(38,4),(41,4),(48,4),(1,5),(9,5),(11,5),(12,5),(20,5),(21,5),(34,5),(37,5),(41,5),(47,5),(1,7),(2,7),(38,7),(41,7),(47,7),(48,7);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`password`,`creator`,`role_id`) values (1,'admin','admin12',1,1);

/*Table structure for table `user_col` */

DROP TABLE IF EXISTS `user_col`;

CREATE TABLE `user_col` (
  `user_id` int(11) NOT NULL,
  `menu_sub_id` int(11) NOT NULL,
  `wordbook_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`menu_sub_id`,`wordbook_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `user_col` */

/*Table structure for table `wordbook` */

DROP TABLE IF EXISTS `wordbook`;

CREATE TABLE `wordbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `colnameid` varchar(50) DEFAULT NULL,
  `keyid` varchar(30) DEFAULT NULL,
  `seq` int(11) NOT NULL DEFAULT '0',
  `odr` int(11) DEFAULT NULL,
  `menu_sub_id` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `flag_set` int(11) NOT NULL DEFAULT '0',
  `sql_suffix` varchar(1000) DEFAULT NULL,
  `sql_postfix` varchar(1000) DEFAULT NULL,
  `sql_col_str` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

/*Data for the table `wordbook` */

insert  into `wordbook`(`id`,`type`,`flag`,`name`,`colnameid`,`keyid`,`seq`,`odr`,`menu_sub_id`,`parent_id`,`flag_set`,`sql_suffix`,`sql_postfix`,`sql_col_str`) values (1,0,0,'序号','id',NULL,1,0,4,0,1,NULL,NULL,NULL),(2,0,0,'权限名称','name',NULL,2,1,4,0,0,NULL,NULL,NULL),(3,1,0,'权限明细','id','id',3,3,4,0,0,'select m.id,name from menu m,role_menu rm where m.id=rm.menu_sub_id and role_id=',' group by m.id','id,name'),(4,2003,0,'新增','func_add',NULL,1,0,4,0,0,NULL,NULL,NULL),(5,2003,0,'批删除','func_delall',NULL,2,1,4,0,0,NULL,NULL,NULL),(7,1005,0,'编辑','func_mod_',NULL,1,0,4,0,0,NULL,NULL,NULL),(8,1005,1,'删除','func_del_',NULL,3,2,4,0,0,NULL,NULL,NULL),(10,2003,0,'字段设置','func_setcol',NULL,3,2,4,0,1,NULL,NULL,NULL),(11,1005,0,'设置','func_set_',NULL,2,1,4,0,0,NULL,NULL,NULL),(12,6,0,'创建者','creator','creator',0,2,4,0,0,'select id,name from role where id in (',') ','id,name'),(13,2003,0,'批换权','func_setall',NULL,4,3,4,0,0,NULL,NULL,NULL),(15,3000,0,'权限名称',NULL,NULL,0,NULL,4,17,0,NULL,NULL,NULL),(16,3000,0,'创建者',NULL,NULL,0,NULL,4,17,0,NULL,NULL,NULL),(17,2999,0,'搜索',NULL,NULL,0,NULL,4,0,0,NULL,NULL,NULL),(18,0,0,'序号','id',NULL,1,0,4,0,1,NULL,NULL,NULL),(19,0,0,'用户名称','name',NULL,2,1,5,0,0,NULL,NULL,NULL),(21,2003,0,'新增','func_add',NULL,1,0,5,0,0,NULL,NULL,NULL),(22,2003,0,'批删除','func_delall',NULL,2,1,5,0,0,NULL,NULL,NULL),(24,1005,0,'编辑','func_mod_',NULL,1,0,5,0,0,NULL,NULL,NULL),(25,1005,1,'删除','func_del_',NULL,3,2,5,0,0,NULL,NULL,NULL),(27,2003,0,'字段设置','func_setcol',NULL,3,2,5,0,1,NULL,NULL,NULL),(29,6,0,'创建者','creator','creator',0,2,5,0,0,'select id,name from role where id in (',') ','id,name'),(20,0,0,'所属组','role_id','id',2,1,5,0,0,NULL,NULL,NULL),(32,3000,0,'用户名称',NULL,NULL,0,NULL,5,17,0,NULL,NULL,NULL),(33,3000,0,'创建者',NULL,NULL,0,NULL,5,17,0,NULL,NULL,NULL),(34,2999,0,'搜索',NULL,NULL,0,NULL,5,0,0,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

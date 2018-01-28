-- MySQL dump 10.13  Distrib 5.6.22, for osx10.10 (x86_64)
--
-- Host: www.youn9php.com    Database: yd_ops
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `tablename` varchar(50) DEFAULT NULL,
  `flag_set` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'系统管理',0,NULL,0),(2,'服务管理',0,NULL,0),(3,'服务器管理',0,NULL,0),(4,'权限管理',1,'role',0),(5,'用户管理',1,'user',0),(6,'个人管理',0,NULL,0),(7,'修改密码',6,NULL,1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `creator` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin',1),(2,'init',1),(11,'test2',1),(13,'test1',1),(12,'testa',1),(9,'全部权限',1),(10,'空权限',1),(14,'test3',1),(19,'test_op_1',1),(98,'a2',1),(96,'d',1),(93,'a',1),(94,'b',1),(95,'c',1);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_func`
--

DROP TABLE IF EXISTS `role_func`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_func` (
  `role_id` int(11) NOT NULL,
  `menu_sub_id` int(11) NOT NULL,
  `wordbook_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`menu_sub_id`,`wordbook_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_func`
--

LOCK TABLES `role_func` WRITE;
/*!40000 ALTER TABLE `role_func` DISABLE KEYS */;
INSERT INTO `role_func` VALUES (1,4,1),(1,4,2),(1,4,3),(1,4,4),(1,4,5),(1,4,7),(1,4,8),(1,4,10),(1,4,11),(1,4,12),(1,4,13),(9,4,1),(9,4,2),(9,4,3),(9,4,4),(9,4,5),(9,4,7),(9,4,8),(9,4,10),(9,4,11),(9,4,12),(9,4,13),(35,4,1),(35,4,2),(35,4,3),(35,4,4),(35,4,5),(35,4,7),(35,4,8),(35,4,10),(35,4,11),(35,4,12),(35,4,13),(38,4,1),(38,4,2),(38,4,4),(38,4,10),(38,4,13),(41,4,1),(41,4,2),(41,4,3),(41,4,4),(41,4,5),(41,4,7),(41,4,8),(41,4,10),(41,4,11),(41,4,12),(41,4,13);
/*!40000 ALTER TABLE `role_func` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_menu`
--

DROP TABLE IF EXISTS `role_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_menu`
--

LOCK TABLES `role_menu` WRITE;
/*!40000 ALTER TABLE `role_menu` DISABLE KEYS */;
INSERT INTO `role_menu` VALUES (1,4),(1,5),(1,7),(93,4),(93,5),(93,7),(94,5),(94,7),(95,4),(95,7),(96,7),(98,4),(98,7);
/*!40000 ALTER TABLE `role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_wordbook`
--

DROP TABLE IF EXISTS `role_wordbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_wordbook` (
  `role_id` int(11) NOT NULL,
  `wordbook_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`wordbook_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_wordbook`
--

LOCK TABLES `role_wordbook` WRITE;
/*!40000 ALTER TABLE `role_wordbook` DISABLE KEYS */;
INSERT INTO `role_wordbook` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,7),(1,8),(1,10),(1,11),(1,12),(1,13),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(1,24),(1,25),(1,27),(1,29),(1,34),(1,35),(93,1),(93,10),(93,18),(93,27),(94,18),(94,27),(95,1),(95,10),(98,1),(98,10),(98,18),(98,27);
/*!40000 ALTER TABLE `role_wordbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `creator` int(11) NOT NULL DEFAULT '0',
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin12',1,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_col`
--

DROP TABLE IF EXISTS `user_col`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_col` (
  `user_id` int(11) NOT NULL,
  `menu_sub_id` int(11) NOT NULL,
  `wordbook_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`menu_sub_id`,`wordbook_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_col`
--

LOCK TABLES `user_col` WRITE;
/*!40000 ALTER TABLE `user_col` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_col` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_wordbook`
--

DROP TABLE IF EXISTS `user_wordbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_wordbook` (
  `user_id` int(11) NOT NULL,
  `wordbook_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`wordbook_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_wordbook`
--

LOCK TABLES `user_wordbook` WRITE;
/*!40000 ALTER TABLE `user_wordbook` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_wordbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wordbook`
--

DROP TABLE IF EXISTS `wordbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `sql_main` varchar(300) DEFAULT NULL,
  `sql_main1` varchar(300) DEFAULT NULL,
  `sql_suffix` varchar(1000) DEFAULT NULL,
  `sql_postfix` varchar(1000) DEFAULT NULL,
  `sql_col_str` varchar(100) DEFAULT NULL,
  `sql_relate` varchar(300) DEFAULT NULL,
  `sql_mod` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wordbook`
--

LOCK TABLES `wordbook` WRITE;
/*!40000 ALTER TABLE `wordbook` DISABLE KEYS */;
INSERT INTO `wordbook` VALUES (1,0,0,1,'序号','id',NULL,1,0,4,0,1,NULL,NULL,NULL,NULL,NULL,'',NULL),(2,0,0,0,'权限名称','name',NULL,2,1,4,0,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(3,1,0,0,'权限明细','id','id',3,3,4,0,0,'select m.* from menu m,role_menu rm where m.id=rm.menu_id ',' group by m.id',' and role_id=','','id,name','select * from menu where parent_id>0','select * from role_menu where role_id='),(4,2003,0,0,'新增','func_add',NULL,1,0,4,0,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(5,2003,0,0,'批删除','oprt_delall',NULL,2,1,4,0,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(7,1005,0,0,'编辑','func_mod_',NULL,1,0,4,0,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(8,1005,1,0,'删除','oprt_del_',NULL,3,2,4,0,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(10,2003,0,0,'字段设置','func_setcol',NULL,3,2,4,0,1,NULL,NULL,NULL,NULL,NULL,'',NULL),(11,1005,0,0,'设置','func_set_',NULL,2,1,4,0,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(12,6,0,1,'创建者','creator','creator',0,2,4,0,0,'select id,name from role ','','where id in (',')','id,name','',NULL),(13,2003,0,0,'批换权','func_allset',NULL,4,3,4,0,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(15,3000,0,0,'权限名称','name',NULL,0,NULL,4,17,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(16,3001,0,0,'创建者','creator',NULL,0,NULL,4,17,0,NULL,NULL,'select id from role where name like \'%','%\'',NULL,'',NULL),(17,2999,0,0,'搜索',NULL,NULL,0,NULL,4,0,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(18,0,0,1,'序号','id',NULL,1,0,5,0,1,NULL,NULL,NULL,NULL,NULL,'',NULL),(19,0,0,0,'用户名称','name',NULL,2,1,5,0,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(21,2003,0,0,'新增','func_add',NULL,1,0,5,0,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(22,2003,0,0,'批删除','oprt_delall',NULL,2,1,5,0,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(24,1005,0,0,'编辑','func_mod_',NULL,1,0,5,0,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(25,1005,1,0,'删除','oprt_del_',NULL,3,2,5,0,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(27,2003,0,0,'字段设置','func_setcol',NULL,3,2,5,0,1,NULL,NULL,NULL,NULL,NULL,'',NULL),(29,6,0,1,'创建组','creator','creator',0,3,5,0,0,'select id,name from role ',NULL,'where id in (',') ','id,name','',NULL),(20,6,0,0,'所属组','role_id','id',2,4,5,0,0,'select id,name from role ',NULL,'where id in (',') ','id,name','',NULL),(32,3000,0,0,'用户名称','name',NULL,0,NULL,5,34,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(33,3001,0,0,'创建者','creator',NULL,0,NULL,5,34,0,NULL,NULL,'select id from role where name like \'%','%\'',NULL,'',NULL),(34,2999,0,0,'搜索',NULL,NULL,0,NULL,5,0,0,NULL,NULL,NULL,NULL,NULL,'',NULL),(35,0,0,0,'密码','password',NULL,0,2,5,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `wordbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `z`
--

DROP TABLE IF EXISTS `z`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `z` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `z`
--

LOCK TABLES `z` WRITE;
/*!40000 ALTER TABLE `z` DISABLE KEYS */;
INSERT INTO `z` VALUES (1),(2),(1);
/*!40000 ALTER TABLE `z` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-28  3:17:07

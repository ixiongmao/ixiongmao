-- MySQL dump 10.13  Distrib 5.6.40, for Linux (x86_64)
--
-- Host: localhost    Database: sql39_106_210_7
-- ------------------------------------------------------
-- Server version	5.6.40-log

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
-- Table structure for table `admin_records`
--

DROP TABLE IF EXISTS `admin_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_records` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) unsigned NOT NULL,
  `admin_remark` varchar(255) NOT NULL,
  `admin_ip` int(10) unsigned NOT NULL,
  `admin_time` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_records`
--

LOCK TABLES `admin_records` WRITE;
/*!40000 ALTER TABLE `admin_records` DISABLE KEYS */;
INSERT INTO `admin_records` VALUES (1,27,'员工于：2018-08-06 14:27:10登录后台,IP为：117.61.135.141',1966966669,1533536830,NULL,NULL),(2,27,'员工于：2018-08-06 14:27:13退出后台,IP为：117.61.135.141',1966966669,1533536833,NULL,NULL),(3,27,'员工于：2018-08-06 14:27:16登录后台,IP为：117.61.135.141',1966966669,1533536836,NULL,NULL),(4,27,'员工于：2018-08-06 14:27:24退出后台,IP为：117.61.135.141',1966966669,1533536844,NULL,NULL),(5,26,'员工于：2018-08-06 14:27:28登录后台,IP为：117.61.135.141',1966966669,1533536848,NULL,NULL),(6,26,'员工于：2018-08-06 14:27:38退出后台,IP为：117.61.135.141',1966966669,1533536858,NULL,NULL),(7,25,'员工于：2018-08-06 14:27:41登录后台,IP为：117.61.135.141',1966966669,1533536861,NULL,NULL),(8,25,'员工于：2018-08-06 14:27:49退出后台,IP为：117.61.135.141',1966966669,1533536869,NULL,NULL),(9,1,'员工于：2018-08-06 14:40:56登录后台,IP为：117.61.135.141',1966966669,1533537656,NULL,NULL),(10,30,'员工于：2018-08-06 15:52:43登录后台,IP为：117.61.135.141',1966966669,1533541963,NULL,NULL);
/*!40000 ALTER TABLE `admin_records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `a_status` int(255) unsigned NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_password` varchar(60) NOT NULL,
  `a_permission` varchar(255) NOT NULL,
  `a_time` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,1,'admin','$2y$10$plU6d4DmO2EhiAsgym07DO8h5cX./7xCChEvnrZFRlGW6/GOGLMa6','0,1,2,3,4',1531138697,'2018-07-09 20:18:17','2018-07-30 09:43:59'),(24,1,'admin2','$2y$10$YS1YKa/u2JCxi.4CzB5iAu1b5Eky109PE0CgeZqqdmpFmSiz4Fnpy','0',1531151815,'2018-07-09 23:56:55','2018-08-06 13:53:45'),(25,1,'admin3','$2y$10$E32nWNC0hJ29bEDxuKl1M.eE6OKpRZYQhd9gAWOyepLGxGh82dHZW','0',1531151973,'2018-07-09 23:59:33','2018-07-18 23:20:35'),(26,1,'admin4','$2y$10$nsyaU4FgOvtAoAjOUX1PjuCmSjKt7z2zS2DyRx.CJ.yG818IKCKra','0,2,3,4',1531152234,NULL,'2018-07-18 23:34:33'),(27,1,'admin5','$2y$10$zP5hqq5UMVg5qxL9HlFMF.RjWyQ1d3FOzz5AG1dJuvq/vGRPk7LRy','0,1,2,3',1531152252,NULL,'2018-08-06 11:29:12'),(30,1,'admin123','$2y$10$0y0EtveedoC4963AFWd3nOQNZymUHm58hrHlWoIF9Kqw6bG6Qh4yS','0,1',1533541897,'2018-08-06 15:51:37','2018-08-06 15:53:00');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advertises`
--

DROP TABLE IF EXISTS `advertises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advertises` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_status` int(10) unsigned NOT NULL DEFAULT '0',
  `ad_name` varchar(255) NOT NULL,
  `ad_remark` varchar(255) DEFAULT NULL,
  `ad_pic` varchar(255) NOT NULL,
  `ad_url` varchar(255) NOT NULL,
  `ad_etime` int(10) unsigned NOT NULL,
  `ad_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertises`
--

LOCK TABLES `advertises` WRITE;
/*!40000 ALTER TABLE `advertises` DISABLE KEYS */;
INSERT INTO `advertises` VALUES (1,1,'外星人','外星人','/Uploads/image/20180723/20180723192554_28580.png','/item/3',1533052800,1533521025),(2,1,'小米8','小米8','/Uploads/image/20180723/20180723191752_62124.jpg','/item/2',1535644800,1533521075),(3,0,'Test1','Test','/Uploads/image/20180806/20180806144059_46851.jpg','Test2',1533052800,1533537665),(4,0,'小米8','小米8','/Uploads/image/20180806/20180806155007_54466.jpg','/itme/19',1533052800,1533541825);
/*!40000 ALTER TABLE `advertises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aftersale_site`
--

DROP TABLE IF EXISTS `aftersale_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aftersale_site` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aftersale_site` varchar(255) NOT NULL,
  `aftersale_phone` varchar(11) NOT NULL,
  `aftersale_scope` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aftersale_site`
--

LOCK TABLES `aftersale_site` WRITE;
/*!40000 ALTER TABLE `aftersale_site` DISABLE KEYS */;
INSERT INTO `aftersale_site` VALUES (4,'山东省济南市历下区华强电子世界12','0531-888888','笔记本 台式机12');
/*!40000 ALTER TABLE `aftersale_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `banner_status` int(11) NOT NULL DEFAULT '1',
  `banner_name` varchar(255) NOT NULL,
  `banner_url` varchar(255) NOT NULL,
  `banner_pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (1,1,'花呗分期','/item/1','/Uploads/image/20180723/20180723140756_85643.jpg'),(2,1,'小米8','/item/10','/Uploads/image/20180723/20180723141936_71815.jpg');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cates`
--

DROP TABLE IF EXISTS `cates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `path` varchar(128) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cates`
--

LOCK TABLES `cates` WRITE;
/*!40000 ALTER TABLE `cates` DISABLE KEYS */;
INSERT INTO `cates` VALUES (1,0,'笔记本','0',1,'2018-07-16 19:21:29','2018-07-16 19:21:29',NULL),(2,0,'台式机','0',1,'2018-07-16 19:22:54','2018-07-16 19:22:54',NULL),(3,0,'手机','0',1,'2018-07-16 19:23:02','2018-07-16 19:23:02',NULL),(4,0,'配件','0',1,'2018-07-16 19:23:15','2018-07-16 19:23:15',NULL),(5,0,'办公用品','0',1,'2018-07-16 19:23:37','2018-07-16 19:23:37',NULL),(6,0,'流行文化','0',1,'2018-07-16 19:23:43','2018-07-16 19:23:43',NULL),(7,1,'雷神笔记本','0,1',1,'2018-07-16 19:24:11','2018-07-16 19:24:11',NULL),(8,1,'联想笔记本','0,1',1,'2018-07-16 19:24:23','2018-07-16 19:24:23',NULL),(9,1,'苹果笔记本','0,1',1,'2018-07-16 19:24:38','2018-07-16 19:24:38',NULL),(10,1,'外星人笔记本','0,1',1,'2018-07-16 19:25:54','2018-07-16 19:25:54',NULL),(11,2,'雷神台式机','0,2',1,'2018-07-16 19:26:10','2018-07-16 19:26:10',NULL),(12,2,'联想台式机','0,2',1,'2018-07-16 19:26:22','2018-07-16 19:26:22',NULL),(13,2,'苹果台式机','0,2',1,'2018-07-16 19:26:34','2018-07-16 19:26:34',NULL),(14,2,'外星人台式机','0,2',1,'2018-07-16 19:26:42','2018-07-16 19:26:42',NULL),(15,3,'小米手机','0,3',1,'2018-07-16 19:26:59','2018-07-16 19:26:59',NULL),(16,3,'华为手机','0,3',1,'2018-07-16 19:27:08','2018-07-16 19:27:08',NULL),(17,3,'一加手机','0,3',1,'2018-07-16 19:27:18','2018-07-16 19:27:18',NULL),(18,3,'苹果手机','0,3',1,'2018-07-16 19:28:15','2018-07-16 19:28:15',NULL),(19,4,'电脑相关','0,4',1,'2018-07-16 19:29:05','2018-07-16 19:29:05',NULL),(20,4,'网络相关','0,4',1,'2018-07-16 19:30:19','2018-07-16 19:30:19',NULL),(21,7,'高跑分系列','0,1,7',1,'2018-07-16 19:35:58','2018-07-16 19:35:58',NULL),(22,7,'办公游戏本','0,1,7',1,'2018-07-16 19:36:52','2018-07-16 19:36:52',NULL),(23,8,'拯救者系列','0,1,8',1,'2018-07-16 19:37:21','2018-07-16 19:37:21',NULL),(24,8,'小新系列','0,1,8',1,'2018-07-16 19:37:40','2018-07-16 19:37:40',NULL),(25,9,'MacBook Air','0,1,9',1,'2018-07-16 19:39:06','2018-07-16 19:39:06',NULL),(26,9,'MacBook Pro','0,1,9',1,'2018-07-16 19:39:23','2018-07-16 19:39:23',NULL),(27,10,'ALIENWARE 15','0,1,10',1,'2018-07-16 19:43:04','2018-07-16 19:43:04',NULL),(28,10,'ALIENWARE 17','0,1,10',1,'2018-07-16 19:43:15','2018-07-16 19:43:15',NULL),(29,11,'911黑武士','0,2,11',1,'2018-07-16 19:43:59','2018-07-16 19:43:59',NULL),(30,11,'神耀','0,2,11',1,'2018-07-16 19:44:24','2018-07-16 19:44:24',NULL),(31,12,'ThinkCentre M系列','0,2,12',1,'2018-07-16 19:45:26','2018-07-16 19:45:26',NULL),(32,12,'启天系列','0,2,12',1,'2018-07-16 19:45:53','2018-07-16 19:45:53',NULL),(33,13,'iMac Pro','0,2,13',1,'2018-07-16 19:46:11','2018-07-16 19:46:11',NULL),(34,13,'iMac','0,2,13',1,'2018-07-16 19:46:36','2018-07-16 19:46:36',NULL),(36,14,'AREA 51','0,2,14',1,'2018-07-16 19:46:56','2018-07-16 19:46:56',NULL),(37,15,'小米8','0,3,15',1,'2018-07-16 19:47:39','2018-07-16 19:47:39',NULL),(38,15,'小米MIX 2S','0,3,15',1,'2018-07-16 19:48:00','2018-07-16 19:48:00',NULL),(39,16,'HUAWEI P20','0,3,16',1,'2018-07-16 19:48:34','2018-07-16 19:48:34',NULL),(40,16,'HUAWEI MATE10','0,3,16',1,'2018-07-16 19:48:53','2018-07-16 19:48:53',NULL),(41,17,'OnePlus 6','0,3,17',1,'2018-07-16 19:49:18','2018-07-16 19:49:18',NULL),(42,17,'OnePlus 5T','0,3,17',1,'2018-07-16 19:49:36','2018-07-16 19:49:36',NULL),(43,18,'iPhone X','0,3,18',1,'2018-07-16 19:50:18','2018-07-16 19:50:18',NULL),(44,18,'iPhone 8','0,3,18',1,'2018-07-16 19:50:29','2018-07-16 19:50:29',NULL),(45,19,'鼠标','0,4,19',1,'2018-07-16 19:51:56','2018-07-16 19:51:56',NULL),(46,19,'键盘','0,4,19',1,'2018-07-16 19:52:07','2018-07-16 19:52:07',NULL),(47,19,'耳机','0,4,19',1,'2018-07-16 19:52:28','2018-07-16 19:52:28',NULL),(48,19,'移动硬盘','0,4,19',1,'2018-07-16 19:53:15','2018-07-16 19:53:15',NULL),(49,20,'路由器','0,4,20',1,'2018-07-16 19:53:25','2018-07-16 19:53:25',NULL),(50,5,'打印机','0,5',1,'2018-07-16 19:54:20','2018-07-16 19:54:20',NULL),(51,5,'扫描仪','0,5',1,'2018-07-16 19:55:31','2018-07-16 19:55:31',NULL),(52,6,'衬衫','0,6',1,'2018-07-16 19:55:50','2018-07-16 19:55:50',NULL),(53,6,'背包','0,6',1,'2018-07-16 19:56:06','2018-07-16 19:56:06',NULL),(54,50,'惠普打印机','0,5,50',1,'2018-07-16 19:56:47','2018-07-16 19:56:47',NULL),(55,0,'其他','0',1,'2018-07-24 09:01:47','2018-07-24 09:01:47',NULL),(58,53,'迷彩背包','0,6,53',1,'2018-08-06 14:29:46','2018-08-06 14:29:46',NULL);
/*!40000 ALTER TABLE `cates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_status` int(11) NOT NULL DEFAULT '1' COMMENT '默认1为上架，0为不上架',
  `goods_name` varchar(255) NOT NULL COMMENT '商品名称',
  `goods_sn` varchar(255) NOT NULL COMMENT '商品编号',
  `goods_cates` varchar(255) NOT NULL COMMENT '商品分类',
  `goods_discript` varchar(255) NOT NULL COMMENT '商品说明（商品详情页名称下边的说明文字）',
  `goods_pic` varchar(255) NOT NULL COMMENT '商品路径',
  `goods_price` int(50) NOT NULL COMMENT '商品价格',
  `goods_sales_status` int(10) DEFAULT '0' COMMENT '是否促销1，默认0不促销，1为促销',
  `goods_sales_price` int(50) DEFAULT NULL COMMENT '促销价格，默认不能低于售价70%',
  `goods_sales_start` int(15) DEFAULT NULL COMMENT '促销开始时间',
  `goods_sales_end` int(15) DEFAULT NULL COMMENT '促销结束时间',
  `handler` varchar(255) NOT NULL COMMENT '操作人（默认为最后一次操作商品的登录员工）',
  `hander_time` datetime NOT NULL COMMENT '添加时间（默认为最后一次操作商品的时间）',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (4,1,'联想y990','AP20182222','23','联想新机型-未来版','/Uploads/image/20180724/20180724145309_11916.jpg',9000,1,8008,1532502915,1533000659,'admin','2018-07-24 14:54:24',NULL,NULL,'0000-00-00 00:00:00'),(5,1,'苹果Mac-note','AP20182222','25','苹果机型-未来版','/Uploads/image/20180724/20180724145528_63721.jpg',15000,1,13500,1532502915,1532707200,'admin','2018-07-24 14:56:20',NULL,NULL,'0000-00-00 00:00:00'),(6,1,'雷神tai-2018','LS20182222','29','雷神新机型-未来版','/Uploads/image/20180724/20180724155840_80772.jpg',9000,1,8008,1532502915,1533000659,'admin','2018-07-24 15:59:21',NULL,NULL,'0000-00-00 00:00:00'),(17,1,'小米8','xm1234','37','小米8探索版','/Uploads/image/20180803/20180803135416_75075.png',2000,1,1900,1533275731,1533564183,'admin','2018-08-03 13:56:46',NULL,NULL,'0000-00-00 00:00:00'),(18,1,'华为P20','HW1234','39','华为旗舰版','/Uploads/image/20180803/20180803135939_80907.png',3000,1,2800,1533312000,1533571200,'admin','2018-08-03 14:00:41',NULL,NULL,'0000-00-00 00:00:00'),(19,1,'雷神T111','LS1235','21','雷神畅享版','/Uploads/image/20180806/20180806092626_25601.jpg',5000,1,4800,1533571200,1533744000,'admin','2018-08-06 09:29:17',NULL,NULL,'0000-00-00 00:00:00'),(20,1,'华为honor88','HW1235','40','华为荣耀机型','/Uploads/image/20180806/20180806112802_35571.png',3000,1,2800,1533526118,1533657600,'admin','2018-08-06 11:29:15',NULL,NULL,'0000-00-00 00:00:00'),(21,1,'雷神Dino-X5Ta','LS2345','22','144HZ电竞屏，GTX1060独显，芯八代六核I7-8750H处理器，16G内存，128G固态+1T机械，IPS  高清屏，吃鸡利器！','/Uploads/image/20180806/20180806151744_46359.jpg',9000,1,8088,1533540303,1533571200,'admin','2018-08-06 15:20:32',NULL,NULL,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods_details`
--

DROP TABLE IF EXISTS `goods_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` varchar(255) NOT NULL,
  `goods_score` varchar(255) NOT NULL,
  `goods_nums` int(255) NOT NULL,
  `goods_sales_nums` int(255) DEFAULT '0' COMMENT '商品销量',
  `goods_pics` text NOT NULL,
  `goods_detail_pic` text NOT NULL,
  `goods_tail` text NOT NULL,
  `goods_set_meals` varchar(255) DEFAULT NULL COMMENT '商品组合套餐id',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods_details`
--

LOCK TABLES `goods_details` WRITE;
/*!40000 ALTER TABLE `goods_details` DISABLE KEYS */;
INSERT INTO `goods_details` VALUES (4,'4','22',100,0,'/Editor/php/../../Uploads/image/20180724/20180724145319_43191.jpg|/Editor/php/../../Uploads/image/20180724/20180724145319_53873.jpg','<img src=\"/Editor/php/../../Uploads/image/20180724/20180724145357_85410.jpg\" alt=\"\" /><img src=\"/Editor/php/../../Uploads/image/20180724/20180724145357_44739.jpg\" alt=\"\" />','fdsa,dsaf,dsfa','1,2',NULL,NULL,NULL),(5,'5','66',77,0,'/Editor/php/../../Uploads/image/20180724/20180724145537_27682.jpg|/Editor/php/../../Uploads/image/20180724/20180724145537_50382.jpg','<img src=\"/Editor/php/../../Uploads/image/20180724/20180724145547_96322.jpg\" alt=\"\" /><img src=\"/Editor/php/../../Uploads/image/20180724/20180724145547_74058.jpg\" alt=\"\" />','撒旦法，萨芬的，打发，sa','1,2',NULL,NULL,NULL),(6,'6','22',11,0,'/Editor/php/../../Uploads/image/20180724/20180724155846_20712.jpg','<img src=\"/Editor/php/../../Uploads/image/20180724/20180724155855_79119.jpg\" alt=\"\" />','sfad,dsf,dsf','1,2',NULL,NULL,NULL),(17,'17','30',11,0,'/Editor/php/../../Uploads/image/20180803/20180803135445_27012.png','<img src=\"/Editor/php/../../Uploads/image/20180803/20180803135454_58150.png\" alt=\"\" />','大神，发的，第三方','2,8',NULL,NULL,NULL),(18,'18','50',50,0,'/Editor/php/../../Uploads/image/20180803/20180803135957_10338.png','<img src=\"/Editor/php/../../Uploads/image/20180803/20180803135951_53185.png\" alt=\"\" />','撒旦法，艾弗森的，是打发，撒','2,9',NULL,NULL,NULL),(19,'19','30',10,0,'/Editor/php/../../Uploads/image/20180806/20180806092634_77414.png|/Editor/php/../../Uploads/image/20180806/20180806092634_90025.png|/Editor/php/../../Uploads/image/20180806/20180806092635_25692.png|/Editor/php/../../Uploads/image/20180806/20180806092635_42473.png','<img src=\"/Editor/php/../../Uploads/image/20180806/20180806092652_69200.jpg\" alt=\"\" /><img src=\"/Editor/php/../../Uploads/image/20180806/20180806092653_80416.jpg\" alt=\"\" /><img src=\"/Editor/php/../../Uploads/image/20180806/20180806092654_77625.jpg\" alt=\"\" />','源适配器：150W,尺寸：385mmx266mmX28mm ,净重：约3.0Kg(含有电池，具体重量依据产品出货配置为准)产品名称：雷神Dino-X5Ta,型号：雷神Dino-X5,颜色：金属灰,操作系统：Windows 10 家庭版,CPU类型：I7-7700HQ,CPU缓存：6M,集成核显：Intel®HD Graphics 630,核心：四核,芯片组：英特尔® HM175高速芯片组,内存容量：8G内,存类型：DDR4,插槽数量：2,最大支持内存：32G,硬盘容量：128GSSD+1T,独显型号：GTX1050Ti,显存容量：4G,光驱类型：无,屏幕尺寸：15.6英寸,显示比例：16:9,物理分辨率：1920X1080,屏幕类型：雾面IPS高清,屏内置蓝牙：蓝牙Bluetooth v4.2,局域网：内置10/100/1000M以太局域网,无线局域网：802.11b/g/n,端口介绍：USB Type-A*3 USB Type-c*1,扬声器：低音炮,键盘：1680万色全彩背光键盘,摄像头：1.0M HD视频摄像头,读卡器：有,电池容量：7180MAh,电','2,11',NULL,NULL,NULL),(20,'20','20',100,0,'/Editor/php/../../Uploads/image/20180806/20180806112808_41594.png','<img src=\"/Editor/php/../../Uploads/image/20180806/20180806112817_85382.png\" alt=\"\" />','是打发，范德萨，发送到','12,2',NULL,NULL,NULL),(21,'21','222',300,0,'/Editor/php/../../Uploads/image/20180806/20180806151757_71073.jpg|/Editor/php/../../Uploads/image/20180806/20180806151759_88034.jpg|/Editor/php/../../Uploads/image/20180806/20180806151801_57334.jpg|/Editor/php/../../Uploads/image/20180806/20180806151803_85935.jpg|/Editor/php/../../Uploads/image/20180806/20180806151806_29063.jpg|/Editor/php/../../Uploads/image/20180806/20180806151808_51082.jpg','<img src=\"/Editor/php/../../Uploads/image/20180806/20180806151830_66332.jpg\" alt=\"\" /><img src=\"/Editor/php/../../Uploads/image/20180806/20180806151832_52658.jpg\" alt=\"\" /><img src=\"/Editor/php/../../Uploads/image/20180806/20180806151833_13315.jpg\" alt=\"\" />','产品名称：雷神Dino-X5Ta,型号：雷神Dino-X5,颜色：金属灰,操作系统：Windows 10 家庭版,CPU类型：I7-7700HQ,CPU缓存：6M,集成核显：Intel®HD Graphics.630,核心：四核,芯片组：英特尔®HM175高速芯片组,内存容量：8G内,存类型：DDR4,插槽数量：2,最大支持内存：32G,硬盘容量：128GSSD+1T,独显型号：GTX1050Ti,显存容量：4G,光驱类型：无,屏幕尺寸：15.6英寸,显示比例：16:9,物理分辨率：1920X1080,屏幕类型：雾面IPS高清,屏内置蓝牙：蓝牙Bluetooth v4.2,局域网：内置10/100/1000M以太局域网,无线局域网：802.11b/g/n','11,8',NULL,NULL,NULL);
/*!40000 ALTER TABLE `goods_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods_meals`
--

DROP TABLE IF EXISTS `goods_meals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods_meals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_meals_name` varchar(255) NOT NULL COMMENT '组合商品名',
  `goods_meals_detail` varchar(255) NOT NULL COMMENT '组合商品详情',
  `goods_meals_price` varchar(255) NOT NULL COMMENT '价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods_meals`
--

LOCK TABLES `goods_meals` WRITE;
/*!40000 ALTER TABLE `goods_meals` DISABLE KEYS */;
INSERT INTO `goods_meals` VALUES (2,'雷神鼠标经典版','雷神鼠标经典版原价399元现价199元','199'),(8,'雷神鼠标水晶版','雷神鼠标水晶版原价399元现价199元','199'),(9,'雷神鼠标未来版','雷神鼠标未来版原价399元现价299元','199'),(11,'雷神鼠标探索版','雷神鼠标探索版原价399元现价199元','299'),(12,'小米充电宝','小米充电宝原价199元现价129元','129');
/*!40000 ALTER TABLE `goods_meals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods_scores`
--

DROP TABLE IF EXISTS `goods_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods_scores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `score` int(10) unsigned NOT NULL DEFAULT '0',
  `source` int(10) unsigned NOT NULL COMMENT '1表示获得积分，2表示消费积分',
  `update` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods_scores`
--

LOCK TABLES `goods_scores` WRITE;
/*!40000 ALTER TABLE `goods_scores` DISABLE KEYS */;
INSERT INTO `goods_scores` VALUES (1,4,60,1,1533526561),(2,1,220,1,1533535331),(3,1,220,1,1533535332),(4,1,220,1,1533535344),(5,1,110,1,1533535367),(6,1,110,1,1533535369),(7,1,20,1,1533535412),(8,1,220,1,1533535420),(9,1,30,1,1533535485),(10,1,30,1,1533535570),(11,1,30,1,1533535621),(12,1,30,1,1533535636),(13,1,30,1,1533535665),(14,1,80,2,1533536666),(15,1,30,1,1533536947),(16,1,399,2,1533540470),(17,4,444,1,1533542070),(18,4,52,1,1533542110),(19,1,1362,1,1533542582);
/*!40000 ALTER TABLE `goods_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods_scores_orders`
--

DROP TABLE IF EXISTS `goods_scores_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods_scores_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `sgid` int(11) NOT NULL,
  `add_sn` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0' COMMENT '订单状态：0表示已下单，1已发货，2已完成',
  `order_time` int(11) NOT NULL,
  `order_sn` bigint(255) NOT NULL,
  `send_time` int(11) DEFAULT NULL,
  `get_time` int(11) DEFAULT NULL,
  `handler` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods_scores_orders`
--

LOCK TABLES `goods_scores_orders` WRITE;
/*!40000 ALTER TABLE `goods_scores_orders` DISABLE KEYS */;
INSERT INTO `goods_scores_orders` VALUES (1,1,7,1,2,1533536666,201808061424268347,1533536689,1533540513,'admin'),(2,1,2,1,2,1533540470,201808061527504369,1533540491,1533540512,'admin');
/*!40000 ALTER TABLE `goods_scores_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `links_name` varchar(255) NOT NULL,
  `links_pic` varchar(255) NOT NULL,
  `links_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links`
--

LOCK TABLES `links` WRITE;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` VALUES (1,'熊猫的小屋','','http://www.fxswl.com/'),(2,'友情链接','/Uploads/image/20180806/20180806103514_80234.png','http://www.baidu.com/'),(3,'百度','/Uploads/image/20180806/20180806154009_16460.png','http://www.baidu.com');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `navs`
--

DROP TABLE IF EXISTS `navs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `navs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nav_status` int(11) NOT NULL,
  `nav_name` varchar(255) NOT NULL,
  `nav_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navs`
--

LOCK TABLES `navs` WRITE;
/*!40000 ALTER TABLE `navs` DISABLE KEYS */;
INSERT INTO `navs` VALUES (1,1,'笔记本','/list/1'),(2,1,'台机','/list/2');
/*!40000 ALTER TABLE `navs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_status` int(10) unsigned NOT NULL,
  `news_name` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `news_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,1,'争锋八代酷睿，雷神911全系满血上新','<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	4月3日，雷神在北京与英特尔共同见证了英特尔第8代处理器的发布，并在第一之间推出了搭载这款处理器的全系911新品。而本季雷神新品发布的最大亮点，则是全面屏轻薄游戏本911 Air！当日，雷神与到场的近400位雷疯一起，再一次见证了雷神对行业内新技术及新潮流的快速响应，并已经在高性能轻薄游戏本领域做到了引领。\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	<img src=\"http://static.shenyou.tv/20180404/02a1f022103ccdc4d761e926f13a5fbe.png-watermark\" title=\"blob.png\" alt=\"blob.png\" style=\"height:auto !important;\" />\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	<span style=\"font-weight:bolder;\">与英特尔同步，雷神新911换上8代芯</span>\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	911作为雷神最重要的产品系列，一直肩负着将雷神塑造成为高品质高性能游戏品牌的使命。此次英特尔推出全新第8代处理器标压版，雷神也应声而起，同步发布了搭载酷睿i7-8750H的新一代911。在跑分这个环节，新911展现了相当不错的实力，成绩远高于普通8代处理器游戏本。\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	<img src=\"http://static.shenyou.tv/20180404/afc666c200e6368f043d9193ba4fb2de.png-watermark\" title=\"blob.png\" alt=\"blob.png\" style=\"height:auto !important;\" />\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	为了将这颗8代6核芯处理器的性能发挥到极致，雷神设计了数字四相供电，并为其配备了180W的适配器，保证其供电无忧。同时使用了三根直径8mm的纯铜散热管（相当于6根以上5mm散热管）结合双风扇的组合散热系统，使其散热效率充分满足高性能游戏玩家需求。\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	新911除了升级新8代处理器之外，还搭载了英伟达推荐吃鸡标配GTX 1060独立显卡，搭配16G内存，以及专为FPS游戏玩家量身打造的144Hz电竞屏。超高刷新率及流畅画质，保证了玩家在游戏过程中吃鸡比例的大幅提升。除此之外，新911还升级了包括NVMe协议的SSD、双频双通道无线网卡、82Wh大容量电池、创新Sound Blaster音效认证等在内的多项黑科技，使得911的这次焕新迭代更加不容错过。\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	外观方面，新911继承了2017年大受好评的新概念飞行器设计风格，25mm、2.4kg的轻薄机身，使得其便携性较上一代有了极大的提升。与同类型游戏本相比，也很有优势。此次发布的新911一共三个配置序列，分别为雷神京东旗舰店的911黑幽灵、911黑幽灵电竞版；雷神天猫旗舰店的911M星耀版、911M星耀电竞版；苏宁易购旗舰店的911S、911S电竞版。\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	911系列全系新品，都在4月3日当天全网开启预售。\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	<span style=\"font-weight:bolder;\">雷神911 Air抢攻全面屏游戏本</span>\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	发布会当天，将整个环节推向高潮的，无疑是911 Air的出现。\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	<img src=\"http://static.shenyou.tv/20180404/193e6ce35be76f811a1fdcfabc17be00.png-watermark\" title=\"blob.png\" alt=\"blob.png\" style=\"height:auto !important;\" />\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	虽然此前雷神没有用很多篇幅对这款产品进行大肆渲染，但在这个全面屏游戏本话题热度空前的时刻，雷神显然恰到好处的找准了节奏，发布了第一款属于雷神的全面屏产品。911 Air的边框窄至6mm，屏占比高达82%，相当于同样是15.6英寸的屏幕，但911 Air却只需要相当于14英寸游戏本大小的机身尺寸。而22mm、2Kg的轻薄机身，则大大提升了其便携性。另一个倍受好评的元素，在于911 Air简洁而有质感的设计风格，笔直硬朗的机身线条，都让这款颇有商务风格的游戏本具有极佳的跨界属性，可适用于任意场景下，对性能笔记本电脑的需求。\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	911 Air同样搭载了第8代处理器酷睿i7-8750H，及英伟达GTX 1050Ti游戏显卡，NVMe协议SSD。无论是办公、游戏还是设计，这样的性能配置都可满足。该款全面屏游戏本预计将在5月正式上市。\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	<span style=\"font-weight:bolder;\">打造高性能轻薄游戏本，雷神始终如一</span>\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	<img src=\"http://static.shenyou.tv/20180404/2011a7d7f2705e2c3f85e8799a1a817c.png-watermark\" title=\"blob.png\" alt=\"blob.png\" style=\"height:auto !important;\" />\r\n</p>\r\n<p style=\"font-size:14px;text-indent:2em;color:#333333;font-family:Arial, Helvetica, &quot;background-color:#FFFFFF;\">\r\n	无论是新911，还是911 Air，雷神始终坚持在不损失性能及品质的前提下，将游戏笔记本做的更轻，更薄。这是一个游戏本领域不可逆的趋势，谁先抢占潮头，谁就能赢得最后的胜利。雷神已经用连续几代的产品优化迭代，稳固了自己在高性能轻薄游戏本领域的首发优势。如今，我们又见证了雷神首款全面屏轻薄游戏本的诞生。未来，相信我们也将会看到更多更高品质、更前沿，并深度传承“雷神，只为游戏而生”这一理念的雷神新品问世。\r\n</p>',1533537365),(2,1,'雷神911Air轻薄性能游戏本，引爆全面屏时代！','<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<span>除了高性能和畅快游戏体验外，游戏本还有没有新要求？随着生活多变，人们角色的多变，除了畅快吃鸡外，玩转办公、商旅、学习、设计等诸多场景，成为现在人面临的新挑战。而适用于更多场景的游戏本也顺势成为新期待。</span>\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	5<span>月</span><span>15</span><span>日，聚焦游戏体验之外，能覆盖更多使用场景的多面手</span><span>——</span><span>雷神首款轻薄全面屏性能本</span><span>911 Air</span><span>，在雷神全渠道开启火热预售，引爆全面屏时代！</span>\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<img src=\"/Uploads/image/20180806/20180806154401_63044.png\" alt=\"\" /><img width=\"693\" height=\"612\" src=\"file://C:\\Users\\ADMINI~1\\AppData\\Local\\Temp\\ksohtml\\wps7F82.tmp.jpg\" />&nbsp;\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<b><span>轻薄随身，多面好手</span></b>\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<span>新品</span>911 Air<span>，重量仅有</span><span>2.0kg</span><span>，薄至</span><span>19mm</span><span>，窄至</span><span>6mm</span><span>的边框，将</span><span>15.6</span><span>英寸的屏幕镶嵌在逼近</span><span>14</span><span>英寸游戏本大小的机身内，占屏比高达</span><span>82%</span><span>，真正做到全面屏并且轻薄随身。成为适用于游戏、办公、商旅、学习、设计等场景的移动战场！</span>\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<img width=\"663\" height=\"313\" src=\"file://C:\\Users\\ADMINI~1\\AppData\\Local\\Temp\\ksohtml\\wps7F83.tmp.jpg\" />&nbsp;\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<span>其全新设计的独立</span>TR &nbsp;logo<span>，深空灰色拉丝金属外壳，简约顶盖设计，两档白色柔光背光键盘，使得整体科技感更强。根据配置不同，正在预售的</span><span>911 Air</span><span>，共包括</span><span>911 Air</span><span>电竞版、</span><span>911 Air</span><span>星空版和</span><span>911Air</span><span>星云版 </span><span>3</span><span>个版本，满足不同用户需求。</span>\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<b><span>性能升级，实力强悍</span></b>\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<span>不负雷神</span>“<span>只为游戏而生</span><span>”</span><span>的理念，</span><span>911 Air</span><span>配置同样不俗！</span>\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	911 Air<span>（除星云版），搭载英特尔第</span><span>8</span><span>代酷睿</span><span>i7-8750H</span><span>标压版处理器。这个全新登场的八代芯，在官方评测中性能提升高达</span><span>60%</span><span>。在</span><span>CINEBENCH R15 </span><span>测试中</span><span>CPU</span><span>得分</span><span>1172,</span><span>比上代</span><span>i77700HQ</span><span>有着接近</span><span>500</span><span>分的提升。无论游戏还是工作中的多项任务考验，</span><span>911 Air</span><span>都展现喜人的处理速度。</span>\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<img width=\"693\" height=\"387\" src=\"file://C:\\Users\\ADMINI~1\\AppData\\Local\\Temp\\ksohtml\\wps7F84.tmp.jpg\" />&nbsp;\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<span>显卡方面，</span>911 Air<span>电竞版和星空版配备英伟达推崇的吃鸡必备显卡</span><span>——GTX 1050Ti</span><span>独显，为游戏和设计工作中流畅的高帧画质表现提供实力支持。</span><span>911 Air</span><span>电竞版还配备了</span><span>16G DDR4</span><span>大内存，快速响应，可以说是为吃鸡发烧友和需要应对高效率考验的商务人士而量身定制。星云版则采用了入门级的</span><span>1050</span><span>显卡，但同样让你吃鸡无忧。</span>\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<span>为保证游戏体验足够流畅，除了高性能处理器和独立显卡，</span>911Air<span>电竞版还使用了</span><span>144Hz</span><span>高刷新率，配合</span><span>72%NTSC</span><span>广视角</span><span>IPS</span><span>屏，大幅降低游戏过程中画面卡顿及撕裂状况，画面色彩也更为还原。在官方进行的《绝地求生</span><span>·</span><span>大逃杀》游戏测试中，在开启最高画质的情况下平均帧数</span><span>95</span><span>帧左右，</span><span>144Hz</span><span>电竞屏幕对比</span><span>60Hz</span><span>，能够有较为明显的流畅度的提升。</span>\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<img width=\"639\" height=\"525\" src=\"file://C:\\Users\\ADMINI~1\\AppData\\Local\\Temp\\ksohtml\\wps7FA5.tmp.jpg\" />&nbsp;\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<span>同时，相比</span>SATA<span>通道有着质的飞跃的</span><span>NVME</span><span>固态硬盘的配备，双频双通道无线网卡</span><span>AC9560</span><span>的配置，以及</span><span>82Wh</span><span>大容量的电池，都让</span><span>911 Air</span><span>展现非凡的强大性能。</span>\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<b><span>全网开启预约，引爆全面屏时代</span></b>\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<span>新品</span>911Air<span>自发布会面世之后，一直受到粉丝和玩家的关注。作为打破传统游戏本体验的诚意之作，</span><span>911Air</span><span>不仅再次彰显雷神对英特尔八代芯的匠心运用，同时也是雷疯需求促进雷神进步的又一例证。未来，紧跟雷疯需求，雷神将继续创新设计，升级性能，打造更惊艳的产品。</span>\r\n</p>\r\n<p class=\"p\" style=\"text-indent:24.0000pt;background:#FFFFFF;\">\r\n	<span>同时，对正在寻觅吃鸡利器的游戏本粉丝而言，</span>911 Air<span>也是不容错过的产品，相信它一定能令用户如虎添翼，从此迈向无往而不利的战斗征程。雷神</span><span>911Air</span><span>于</span><span>5</span><span>月 </span><span>15</span><span>日在全网开启火热预约，同时还有多重惊喜好礼发放，让我们不见不散！</span>\r\n</p>',1533541445);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qudongs`
--

DROP TABLE IF EXISTS `qudongs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qudongs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qudong_name` varchar(255) NOT NULL,
  `qudong_files` varchar(255) NOT NULL,
  `qudong_time` int(10) unsigned NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qudongs`
--

LOCK TABLES `qudongs` WRITE;
/*!40000 ALTER TABLE `qudongs` DISABLE KEYS */;
INSERT INTO `qudongs` VALUES (5,'显卡驱动','/Uploads/file/20180806/20180806153257_73472.doc',1533540780,'2018-08-06 15:33:00','2018-08-06 15:33:00');
/*!40000 ALTER TABLE `qudongs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scores_goods`
--

DROP TABLE IF EXISTS `scores_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scores_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_scores_name` varchar(255) NOT NULL,
  `goods_scores_need` int(255) NOT NULL,
  `goods_scores_pic` varchar(1000) NOT NULL,
  `goods_scores_price` int(10) NOT NULL,
  `goods_scores_discript` varchar(255) NOT NULL,
  `goods_scores_num` int(10) NOT NULL,
  `goods_handler` varchar(255) NOT NULL,
  `goods_uptime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scores_goods`
--

LOCK TABLES `scores_goods` WRITE;
/*!40000 ALTER TABLE `scores_goods` DISABLE KEYS */;
INSERT INTO `scores_goods` VALUES (1,'小米圈铁耳机2',599,'/Uploads/image/20180723/20180723151007_41885.jpg',99,'小米圈铁耳机2',100000,'1','2018-07-30 16:25:30'),(2,'小米自动折叠伞',399,'/Uploads/image/20180723/20180723151119_21535.jpg',99,'小米自动折叠伞',100000,'1','2018-07-30 16:25:39'),(3,'小米无线充电器',899,'/Uploads/image/20180723/20180723151156_79682.jpg',99,'小米无线充电器',100000,'1','2018-07-30 16:25:57'),(4,'小米USB充电器快充版',199,'/Uploads/image/20180723/20180723151253_14902.jpg',30,'小米USB充电器快充版',100000,'1','2018-07-30 16:26:06'),(5,'ZMI 苹果编织数据线（0.3m）',99,'/Uploads/image/20180723/20180723151402_43849.jpg',50,'ZMI 苹果编织数据线（0.3m）',100000,'1','2018-07-30 16:26:17'),(7,'小风扇',80,'/Uploads/image/20180724/20180724090650_11793.jpg',39,'办公桌首选',100,'1','2018-07-24 09:06:51');
/*!40000 ALTER TABLE `scores_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_status` int(10) unsigned NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (3,1,'服务标准eeee','<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#333333;\">严选商城的售后服务由海尔电脑润心服务承接，相关的收费标准以海尔电脑为准，最终的解释权归雷神游戏本售后服务承接商海尔电脑润心服务及其授权服务商所有。收费标准内容来源于海尔官方网站，详情可点击</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"><a href=\"http://www.haier.com/cn/services_supports/overview/computers/service_guarantee/charges/\" target=\"_blank\"><span style=\"font-family:宋体;color:#339966;\">海尔服务与支持</span></a></span><span style=\"font-size:10pt;font-family:宋体;color:#333333;\">进行查阅<span></span></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#888888;\">感谢您选择海尔电脑产品，为满足您在产品保修服务范围之外的服务需求，我公司特制定《海尔电脑产品有偿服务收费标准》，并在您需要时向您提供海尔产品保修服务范围之外的有偿服务。</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span><span style=\"font-size:13.5pt;font-family:宋体;color:#F12B42;\">一、</span></span><span><span style=\"font-size:13.5pt;\"> </span></span><span><span style=\"font-size:13.5pt;font-family:宋体;color:#F12B42;\">有偿服务项目的解释</span></span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#888888;\">海尔电脑有偿服务是为用户提供的超出海尔电脑产品及其部件保修范围（包括依海尔电脑标准保修承诺约定的保修范围和</span><span style=\"font-size:10pt;\">/</span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">或用户通过购买海尔电脑服务产品享受保修范围情况）的收费服务。具体的有偿服务项目包括硬件故障检测、维修和软件调试、安装等服务项目。</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span><span style=\"font-size:13.5pt;font-family:宋体;color:#F12B42;\">二、</span></span><span><span style=\"font-size:13.5pt;\"> </span></span><span><span style=\"font-size:13.5pt;font-family:宋体;color:#F12B42;\">有偿服务收费标准的适用范围</span></span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:12pt;\">1. </span><span style=\"font-size:12pt;font-family:宋体;color:#333333;\">产品范围：</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#888888;\">1.1 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">海尔台式机、海尔笔记本、一体机电脑；<span></span></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#888888;\">1.2 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">彩色液晶电视一体机<span> ;</span></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#888888;\">1.3 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">海尔交互式一体机<span> ;</span></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#888888;\">1.4 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">海尔显示器；<span></span></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#888888;\">1.5 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">数码外设、海尔家庭影院、功放、音响、音柱、智能家居<span> ;</span></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#888888;\">1.6 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">智能马桶盖；<span></span></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#888888;\">以上产品统称海尔电脑产品（以下简称<span>“</span>产品<span>”</span>），在有偿服务过程收费中按照本标准执行。<span></span></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:12pt;\">2. </span><span style=\"font-size:12pt;font-family:宋体;color:#333333;\">业务范围</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#333333;\">经海尔电脑认证服务商判定属于以下情况的，用户要求进行服务均属于硬件有偿服务范围。</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">2.1 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">产品整机或部件已经超出免费修理期；<span></span></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">2.2 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">未按说明书要求</span><span style=\"font-size:10pt;\">/</span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">错误</span><span style=\"font-size:10pt;\">/</span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">不当使用、保管、保养、或操作产品造成的故障或损坏（例如带电插拔数据线、带电插拔非</span><span style=\"font-size:10pt;\">USB</span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">外接设备等）；<span></span></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">2.3 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">非产品所规定的工作环境等造成的故障或损坏（例如温度过高、过低，过于潮湿或干燥，海拔过高，非正常的物理压力，电磁干扰，供电不稳，静电干扰，零地电压过大，输入不合理的电压等）；<span></span></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">2.4 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">非海尔授权的机构、人员安装、维修、更改、添加或拆卸而造成的故障或损坏；<span></span></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">2.5 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">因使用非出厂时提供的部件（参见《装箱单》）导致的故障或损害；</span><span style=\"font-size:10pt;\"> </span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">2.6 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">因意外因素或人为原因（包括计算机病毒、操作失误、进液、划伤、搬运、磕碰、不正确的插拔、异物掉入、鼠灾、虫害等）导致的故障或损坏；<span></span></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">2.7 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">因自然灾害等不可抗力（如地震、火灾、雷击等）原因造成的故障或损坏；<span></span></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">2.8 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">正常合理的消耗或损坏（如：外壳、接插部件的自然消耗、磨损及老化）；<span></span></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">2.9 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">产品的升级服务；</span><span style=\"font-size:10pt;\"> </span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">2.10 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">其他非海尔机器（包括部件）本身质量问题而导致的故障及损坏。</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:12pt;font-family:宋体;color:#333333;\">以下情况，用户要求进行服务均属于有偿软件安装调试服务范围。</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">2.11 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">海尔台式电脑、笔记本电脑的预装软件享有自购机日起一年免费送修服务（恢复到出厂状态），保修期内用户要求上门的，可参照有偿收费标准收取服务费，超过一年免费保修期时可依据本有偿收费标准收取人工费、交通费；</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">2.12 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">海尔台式电脑、笔记本电脑的随机软件享有自购机日起三个月免费送修服务，保修期内用户要求上门的，可参照有偿收费标准收取服务费，超过三个月免费保修期时可依据本有偿收费标准人工费、交通费；<span></span></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#888888;\">2.13 </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">由于各种密码遗忘所造成的系统故障。<span></span></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#888888;\">注：<span> </span>海尔预装软件：指出厂时已经安装在电脑中的软件或操作系统，不包括代理商在销售时或服务人员个人为客户安装的软件或操作系统，也不包括客户自行安装的软件或操作系统。<span></span></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#333333;\">海尔随机软件：</span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">随机软件指的是指作为产品的一部分，和产品配套出售的光盘介质和软盘介质，如驱动光盘等。</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span><span style=\"font-size:13.5pt;font-family:宋体;color:#F12B42;\">三、海尔电脑产品有偿服务费用标准构架：</span></span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#888888;\">有偿服务费</span><span style=\"font-size:10pt;\">=</span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">人工服务费</span><span style=\"font-size:10pt;\">+</span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">上门服务费</span><span style=\"font-size:10pt;\">+</span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">备件材料费</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#888888;\">其中：</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">· </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">人工服务费：指提供维修、维护服务所发生的技术人工费用，即劳务费；</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">· </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">上门服务费：指提供现场服务所发生的往返当地交通费用及工程师在途占用的工时费用；</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">· </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">备件材料费：指更换备件、器材、维修耗材等物料费用。</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;font-family:宋体;color:#888888;\">注：由于送修而发生的其他费用（运输、交通费用等）由用户自理。</span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span><span style=\"font-size:13.5pt;font-family:宋体;color:#F12B42;\">四、海尔电脑产品有偿服务具体收费标准：</span></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"color:#888888;font-family:宋体;font-size:13.3333px;\">以海尔服务支持网站提供的标准为准。</span><span style=\"color:#888888;font-family:宋体;font-size:13.3333px;\"><a href=\"http://www.haier.com/cn/services_supports/overview/computers/service_guarantee/charges/\" target=\"_blank\">点击查看。</a></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span><span style=\"font-size:13.5pt;font-family:宋体;color:#F12B42;\">五、其它说明：</span></span><span style=\"font-size:9pt;font-family:Arial, sans-serif;\"></span> \r\n	</p>\r\n<p class=\"MsoNormal\" style=\"color:#8C8C8C;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\"> <span style=\"font-size:10pt;\">1. </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">此收费标准作为海尔电脑及服务商统一收费标准；如此标准与用户产品保修凭证上的收费标准有冲突，则以二者中最低价格标准收费。</span><span style=\"font-size:10pt;\"><br />\r\n2. </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">如果中华人民共和国法律或法规另有规定，以国家法律和法规的规定内容为准。</span><span style=\"font-size:10pt;\"> <br />\r\n3. </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">如果您想查询海尔电脑产品有偿服务收费标准的详情，请拨打海尔电脑热线服务电话</span><span style=\"font-size:10pt;\">4006-999-999</span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">进行咨询。</span><span style=\"font-size:10pt;\"><br />\r\n4. </span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">同一地点上门维修多台产品只收取一次上门费。</span><span style=\"font-size:10pt;\"> <br />\r\n5</span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">．用户送修保外机器时，需完整填写海尔电脑授权服务商统一印制的《一票到底服务记录单》，如果用户将与维修有关的其它附件留至服务商，请务必注意在维修单上注明并签字确认。海尔电脑授权服务商只负责妥善保管维修单上所列的产品和附件。</span><span style=\"font-size:10pt;\"><br />\r\n6</span><span style=\"font-size:10pt;font-family:宋体;color:#888888;\">．用户同意海尔电脑授权服务商对本次服务的报价并在《一票到底服务记录单》上签字，海尔电脑授权服务商开始为用户履行有偿服务。报价的有效期只对本次服务，若用户未同意报价，下次提出有偿服务时，海尔电脑授权服务商将重新核算报价，原报价失效。</span> \r\n</p>');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_carts`
--

DROP TABLE IF EXISTS `shop_carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_carts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `shop_num` int(11) NOT NULL,
  `meal_prices` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `meal_price` int(10) DEFAULT NULL,
  `meal_detail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_carts`
--

LOCK TABLES `shop_carts` WRITE;
/*!40000 ALTER TABLE `shop_carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systems`
--

DROP TABLE IF EXISTS `systems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systems` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `system_status` int(11) NOT NULL DEFAULT '1',
  `system_name` varchar(255) NOT NULL,
  `system_keywords` varchar(255) NOT NULL,
  `system_description` varchar(255) NOT NULL,
  `system_logo` varchar(255) NOT NULL,
  `system_site_url` varchar(255) NOT NULL,
  `system_weixin` varchar(255) NOT NULL,
  `system_qq` varchar(255) NOT NULL,
  `system_phone` varchar(255) NOT NULL,
  `system_copyright` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systems`
--

LOCK TABLES `systems` WRITE;
/*!40000 ALTER TABLE `systems` DISABLE KEYS */;
INSERT INTO `systems` VALUES (1,1,'严选网站','严选商城-京东-淘宝-天猫','严选商城','/Uploads/image/20180723/20180723140554_82948.png','https://sk.fxswl.com/','weixin','774396655','18888888888','Copyright © 2018 严选科技 Powered By: <a href=\"https://laravel.com/\" target=\"_blank\" title=\"Laravel的官网\">Laravel</a>/<a href=\"https://github.com/laravel/laravel\" target=\"_blank\" title=\"Laravel的GitHub\">GitHub</a><p title=\"AES_256_GCM\" style=\"color:  rgb(123,239,175);\">本站使用的SSL 256位加密</p> <p title=\"TencentCloud && BT\">本站正在使用腾讯云服务器和宝塔Linux面板维护管理</p><p>桂ICP备17005227号-9</p>');
/*!40000 ALTER TABLE `systems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_address`
--

DROP TABLE IF EXISTS `u_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `address_status` int(10) unsigned NOT NULL,
  `address_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address_address` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '地区',
  `address_phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=sjis;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_address`
--

LOCK TABLES `u_address` WRITE;
/*!40000 ALTER TABLE `u_address` DISABLE KEYS */;
INSERT INTO `u_address` VALUES (1,1,1,'李','北京市','17662131239'),(2,4,1,'尹茂松','12312312','17662131239');
/*!40000 ALTER TABLE `u_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_balance_kami`
--

DROP TABLE IF EXISTS `u_balance_kami`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_balance_kami` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned DEFAULT NULL,
  `kami_status` int(10) unsigned NOT NULL,
  `kami_name` varchar(255) NOT NULL,
  `kami_password` varchar(255) NOT NULL,
  `kami_denomination` double(12,2) NOT NULL,
  `kami_time` int(11) NOT NULL,
  `kami_modify_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_balance_kami`
--

LOCK TABLES `u_balance_kami` WRITE;
/*!40000 ALTER TABLE `u_balance_kami` DISABLE KEYS */;
INSERT INTO `u_balance_kami` VALUES (1,NULL,0,'3K2UYNAE6BZCXQHNYQ','MVM5MAEUNMBBCWYXYS',1000000000.00,1533542035,NULL),(2,NULL,0,'THXOLAZBXF3NI1LWMH','KFHFOEH9TDGPL33WFD',1000000000.00,1533542035,NULL),(3,NULL,0,'ZUGUPMHFEXIKVM4TAM','R73NRHKJEQQO5HMOKE',1000000000.00,1533542035,NULL),(4,NULL,0,'BLSD9DP4AIBXHQHAWN','OEKE6GYDP7ZYVVDHA2',1000000000.00,1533542035,NULL),(5,NULL,0,'8U92U3HLNDGU0OWHBM','JTWW080WDHE7W1FERM',1000000000.00,1533542035,NULL),(6,NULL,0,'ZSVPQUCWHBZ9EZXBYR','1L04RN059DCJP4NOA1',1000000000.00,1533542035,NULL),(7,NULL,0,'SH52Z29MT2UJJHWJYQ','D7MKQ34ZMFUXOQAKRA',1000000000.00,1533542035,NULL),(8,NULL,0,'P2ICUQEPT0RP4VYCHJ','GCBTZVGCL9DOEZMEQB',1000000000.00,1533542035,NULL),(9,NULL,0,'WTFNTGYITQGJLMLOGY','EYJIZYBJBUCGLHYSI1',1000000000.00,1533542035,NULL),(10,4,1,'MCYL0QPNGUCI1WNA6O','T79YBXT8D8O7I8CKKX',1000000000.00,1533542035,1533542051);
/*!40000 ALTER TABLE `u_balance_kami` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_browse`
--

DROP TABLE IF EXISTS `u_browse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_browse` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_browse`
--

LOCK TABLES `u_browse` WRITE;
/*!40000 ALTER TABLE `u_browse` DISABLE KEYS */;
INSERT INTO `u_browse` VALUES (1,1,19,1533536375),(2,1,21,1533542628),(3,1,4,1533540119),(4,1,18,1533540368),(6,4,21,1533542005),(7,4,4,1533542156);
/*!40000 ALTER TABLE `u_browse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_collects`
--

DROP TABLE IF EXISTS `u_collects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_collects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_collects`
--

LOCK TABLES `u_collects` WRITE;
/*!40000 ALTER TABLE `u_collects` DISABLE KEYS */;
INSERT INTO `u_collects` VALUES (1,1,21),(2,4,21);
/*!40000 ALTER TABLE `u_collects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_comments`
--

DROP TABLE IF EXISTS `u_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  `comment_status` int(10) unsigned NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `comment_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_comments`
--

LOCK TABLES `u_comments` WRITE;
/*!40000 ALTER TABLE `u_comments` DISABLE KEYS */;
INSERT INTO `u_comments` VALUES (1,4,4,1,'6666666666',1533542148);
/*!40000 ALTER TABLE `u_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_dlrecords`
--

DROP TABLE IF EXISTS `u_dlrecords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_dlrecords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `user_remark` varchar(255) NOT NULL,
  `user_ip` int(10) unsigned NOT NULL,
  `user_time` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_dlrecords`
--

LOCK TABLES `u_dlrecords` WRITE;
/*!40000 ALTER TABLE `u_dlrecords` DISABLE KEYS */;
INSERT INTO `u_dlrecords` VALUES (1,2,'用户于2018-08-06 14:16:47登录,IP为：117.61.135.141',1966966669,1533536207,NULL,NULL),(2,1,'用户于2018-08-06 14:34:54退出,IP为：117.61.135.141',1966966669,1533537294,NULL,NULL),(3,1,'用户于2018-08-06 14:35:00登录,IP为：117.61.135.141',1966966669,1533537300,NULL,NULL),(4,1,'用户于2018-08-06 15:30:11退出,IP为：117.61.135.141',1966966669,1533540611,NULL,NULL),(5,4,'用户于2018-08-06 15:31:04登录,IP为：117.61.135.141',1966966669,1533540664,NULL,NULL),(6,4,'用户于2018-08-06 15:34:18退出,IP为：117.61.135.141',1966966669,1533540858,NULL,NULL),(7,4,'用户于2018-08-06 15:35:10登录,IP为：117.61.135.141',1966966669,1533540910,NULL,NULL),(8,4,'用户于2018-08-06 15:35:17退出,IP为：117.61.135.141',1966966669,1533540917,NULL,NULL),(9,4,'用户于2018-08-06 15:36:09登录,IP为：117.61.135.141',1966966669,1533540969,NULL,NULL),(10,4,'用户于2018-08-06 15:36:55退出,IP为：117.61.135.141',1966966669,1533541015,NULL,NULL),(11,4,'用户于2018-08-06 15:45:54登录,IP为：117.61.135.141',1966966669,1533541554,NULL,NULL);
/*!40000 ALTER TABLE `u_dlrecords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_expenses`
--

DROP TABLE IF EXISTS `u_expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `ex_orders_id` int(11) unsigned NOT NULL,
  `ex_status` int(10) unsigned NOT NULL,
  `ex_money` double(12,2) NOT NULL,
  `ex_orderid` varchar(21) NOT NULL,
  `ex_remark` varchar(255) NOT NULL,
  `ex_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_expenses`
--

LOCK TABLES `u_expenses` WRITE;
/*!40000 ALTER TABLE `u_expenses` DISABLE KEYS */;
INSERT INTO `u_expenses` VALUES (1,1,1,0,5000.00,'Ex2018080614290756226','于2018-08-06 14:29:07购买了商品,金额为：5000元,IP为：117.61.135.141',1533536947),(2,4,0,1,1000000000.00,'CZ2018080615541132500','于2018-08-06 15:54:11 充值了余额,金额为：1000000000元,IP为：117.61.135.141',1533542051),(3,4,2,0,16475.00,'Ex2018080615543048563','于2018-08-06 15:54:30购买了商品,金额为：16475元,IP为：117.61.135.141',1533542070),(4,4,3,0,14199.00,'Ex2018080615551050478','于2018-08-06 15:55:10购买了商品,金额为：14199元,IP为：117.61.135.141',1533542110),(5,1,4,0,53827.00,'Ex2018080616030217341','于2018-08-06 16:03:02购买了商品,金额为：53827元,IP为：117.61.135.141',1533542582);
/*!40000 ALTER TABLE `u_expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_feedbacks`
--

DROP TABLE IF EXISTS `u_feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_feedbacks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `feedbacks_name` varchar(100) NOT NULL,
  `feedbacks_email` varchar(38) NOT NULL,
  `feedbacks_content` text NOT NULL,
  `feedbacks_time` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_feedbacks`
--

LOCK TABLES `u_feedbacks` WRITE;
/*!40000 ALTER TABLE `u_feedbacks` DISABLE KEYS */;
INSERT INTO `u_feedbacks` VALUES (1,4,'让每个人都能享受科技的乐趣','1254620062@qq.com','<img src=\"/Uploads/image/20180806/20180806154913_73709.png\" alt=\"\" />13232123132',1533541757,NULL,NULL);
/*!40000 ALTER TABLE `u_feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_orders`
--

DROP TABLE IF EXISTS `u_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `goods_id` varchar(255) NOT NULL,
  `address_id` int(10) unsigned NOT NULL,
  `orders_status` int(10) unsigned NOT NULL,
  `orders_buying_price` varchar(255) NOT NULL,
  `orders_number` varchar(255) NOT NULL,
  `orders_price` varchar(255) NOT NULL,
  `orders_meal_name` varchar(255) DEFAULT NULL,
  `orders_meal_price` int(10) unsigned DEFAULT NULL,
  `orders_total_prices` decimal(12,2) NOT NULL,
  `orders_paymethod` int(10) unsigned NOT NULL,
  `orders_orderid` bigint(20) unsigned NOT NULL,
  `orders_score` int(10) unsigned NOT NULL,
  `orders_odd` varchar(38) NOT NULL COMMENT '单号',
  `orders_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_orders`
--

LOCK TABLES `u_orders` WRITE;
/*!40000 ALTER TABLE `u_orders` DISABLE KEYS */;
INSERT INTO `u_orders` VALUES (1,1,'19',1,0,'5000','1','5000',NULL,NULL,5000.00,0,2018080614290716701,30,'',1533536947),(2,4,'21',2,0,'8387','2','16475','雷神鼠标探索版原价399元现价199元,',299,16475.00,0,2018080615543031307,444,'',1533542070),(3,4,'4,19',2,2,'9199,5000','1,1','9199,5000','雷神鼠标经典版原价399元现价199元,',199,14199.00,0,2018080615551089636,52,'888888888888',1533542110),(4,1,'21,21,19,21,21',1,0,'8088,8088,5000,8088,8387','1,2,1,1,2','8088,16176,5000,8088,16475','雷神鼠标探索版原价399元现价199元,',299,53827.00,0,2018080616030247146,1362,'',1533542582);
/*!40000 ALTER TABLE `u_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_status` int(10) unsigned NOT NULL DEFAULT '1',
  `u_mail_status` varchar(255) DEFAULT NULL,
  `u_auth` int(10) unsigned NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_password` varchar(60) NOT NULL,
  `u_sex` int(11) NOT NULL,
  `u_photo` varchar(255) NOT NULL DEFAULT '/Uploads/default.jpg',
  `u_phone` char(11) NOT NULL,
  `u_email` char(32) NOT NULL,
  `u_money` double(12,2) unsigned zerofill NOT NULL,
  `u_time` int(10) unsigned NOT NULL,
  `u_token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'1',0,'wanwan001','$2y$10$60T4tXKwAq3ztJmaa8cF9eAfensdMDXoU7yrStJyz1HY3uSLflNyO',0,'/Uploads/default.jpg','15588998899','1254620062@qq.com',6666130039.00,1533534746,'HBzTRA9MrR1l1vPEWMvbf7OPBMesJlUUI2qWoNibyHIGCykE',NULL,'2018-08-06 13:59:19',NULL),(2,1,'1',0,'l15804963060','$2y$10$UVH0LBraUKO8EVDsEkItFujjZVtCerFn2Zb8mARo7WYW7qL.Eiq2.',2,'/Uploads/default.jpg','15804963060','1416356574@qq.com',000000000.00,1533534906,'P8DqtPoeZfmy5tyZl2O4uujbormepqq3IDzJXk0IInGxEhhS',NULL,NULL,NULL),(3,1,'1',0,'yinmaosong123456','$2y$10$BX1t5jFzlZSySKCK0Rp10OEBE0b.lIeudxDvxD/93/7gOflq/yuRC',2,'/Uploads/default.jpg','17662131238','1254620062@qq.com',000000000.00,1533535368,'dPLJMGMP17GkJwA7MUA0utbMlqWtFw65NQmknTb9dxlEvd6W',NULL,NULL,NULL),(4,1,'1',0,'yinmaosong123','$2y$10$OgkX4ZXW2RrFvDWrpry3ZOOQfhRuFim6fDfGxWWy1VTIuvjzMoLpS',2,'/Uploads/image/20180806/20180806153124_59905.png','17662131239','1254620062@qq.com',999969326.00,1533540635,'NZXwVV5ogqyGessQxL0xyrovygjLGxZkfipQ4nBPuX4OJD6L',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-06 16:13:23

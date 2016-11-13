CREATE DATABASE  IF NOT EXISTS `da` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `da`;
-- MySQL dump 10.13  Distrib 5.5.52, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: da
-- ------------------------------------------------------
-- Server version	5.5.52-0ubuntu0.14.04.1

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
-- Table structure for table `data_assets`
--

DROP TABLE IF EXISTS `data_assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_assets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `asset` varchar(250) DEFAULT NULL,
  `asset_description` text,
  `data_personal_detail_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_data_assets_1_idx` (`data_personal_detail_id`),
  CONSTRAINT `fk_data_assets_1` FOREIGN KEY (`data_personal_detail_id`) REFERENCES `data_personal_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_assets`
--

LOCK TABLES `data_assets` WRITE;
/*!40000 ALTER TABLE `data_assets` DISABLE KEYS */;
INSERT INTO `data_assets` VALUES (30,'Laptops','Have one laptops',13),(31,'Guitar','Have one guitar',13),(32,'smmadsmasdasd','asmdmasdmasdasd',14),(33,'asdmnasdmmasdasd','a]dskasdasldlasdasd',14),(34,'dslasdllasdlasd','asdlasdllasdlasd',14),(35,'a,sdf,asd,sa,dasd','asdksdkaksdkasdsad',14),(36,'asdkasdkkasdasd','sdkaskdksadkasdasd',14);
/*!40000 ALTER TABLE `data_assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_personal_details`
--

DROP TABLE IF EXISTS `data_personal_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_personal_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(175) DEFAULT NULL,
  `middle_name` varchar(175) DEFAULT NULL,
  `last_name` varchar(175) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `civil_status` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_personal_details`
--

LOCK TABLES `data_personal_details` WRITE;
/*!40000 ALTER TABLE `data_personal_details` DISABLE KEYS */;
INSERT INTO `data_personal_details` VALUES (13,'Mark','Babon','Boribor','Don T. Lutero West Janiuay, Iloilo City','single','male'),(14,'smdmasdasd','smadmasdmasd','fdadmasdmasd','asmdmasdmasdsad','single','male');
/*!40000 ALTER TABLE `data_personal_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_priveleges`
--

DROP TABLE IF EXISTS `user_priveleges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_priveleges` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `can_add` tinyint(1) unsigned NOT NULL,
  `can_edit` tinyint(1) unsigned NOT NULL,
  `can_delete` tinyint(1) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_priveleges_1_idx` (`user_id`),
  CONSTRAINT `user_priveleges_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_priveleges`
--

LOCK TABLES `user_priveleges` WRITE;
/*!40000 ALTER TABLE `user_priveleges` DISABLE KEYS */;
INSERT INTO `user_priveleges` VALUES (19,1,1,1,25),(22,1,1,1,29),(23,1,1,0,30),(24,1,0,0,31);
/*!40000 ALTER TABLE `user_priveleges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'superadmin','25c3ec67442c1e84d19677889a019f5d','admin'),(25,'markie','8ca29eb8ec2705cdb21a38e54a4c57a4','user'),(29,'makie','31f50322d981ecdbd439db575715831d','user'),(30,'kenneth','7ca955bd92ca8b00548ddf36d2e79217','user'),(31,'bongskie','c490efe027bf495e1429d10b02d29639','user');
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

-- Dump completed on 2016-11-13 10:00:49

-- MySQL dump 10.13  Distrib 5.7.33, for Win64 (x86_64)
--
-- Host: localhost    Database: complaintdb
-- ------------------------------------------------------
-- Server version	5.7.33

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(255) NOT NULL,
  `adminno` int(10) NOT NULL,
  `cred_id` int(10) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `credadmin_fk` (`cred_id`),
  CONSTRAINT `credadmin_fk` FOREIGN KEY (`cred_id`) REFERENCES `credentials` (`cred_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin',20201,8),(2,'Megat',3001,16);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complaints`
--

DROP TABLE IF EXISTS `complaints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `complaints` (
  `comp_id` int(10) NOT NULL AUTO_INCREMENT,
  `comp_cat` varchar(255) NOT NULL,
  `comp_loct` varchar(255) NOT NULL,
  `comp_desc` varchar(255) NOT NULL,
  `comp_date` date NOT NULL,
  `comp_status` int(10) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `officer_id` int(10) DEFAULT NULL,
  `admin_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`comp_id`),
  KEY `adminid_fk` (`admin_id`),
  KEY `officerid_fk` (`officer_id`),
  KEY `userid_fk` (`user_id`),
  CONSTRAINT `adminid_fk` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`),
  CONSTRAINT `officerid_fk` FOREIGN KEY (`officer_id`) REFERENCES `officers` (`officer_id`),
  CONSTRAINT `userid_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complaints`
--

LOCK TABLES `complaints` WRITE;
/*!40000 ALTER TABLE `complaints` DISABLE KEYS */;
INSERT INTO `complaints` VALUES (1,'Electrical','Bilik','lampu rosak','2022-07-02',NULL,7,NULL,NULL),(2,'Plumbing','Tandas','Paip rosak','2022-07-03',NULL,7,NULL,NULL),(3,'Furniture','Bilik','Katil patah','2022-07-04',NULL,7,NULL,NULL),(4,'Furniture','Hallway','Rak kasut patah','2022-07-09',NULL,7,NULL,NULL),(5,'Electrical','Bilik','kipas tercabut','2022-07-02',NULL,7,NULL,NULL),(6,'Electrical','Tandas','lampu tandas kena air','2022-07-02',NULL,7,NULL,NULL),(7,'Plumbing','Tandas','Paip bocor','2022-07-04',NULL,8,NULL,NULL),(8,'Furniture','Bilik','tilam keras mcm batu','2022-07-04',NULL,9,NULL,NULL);
/*!40000 ALTER TABLE `complaints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credentials`
--

DROP TABLE IF EXISTS `credentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credentials` (
  `cred_id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` int(5) NOT NULL,
  PRIMARY KEY (`cred_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credentials`
--

LOCK TABLES `credentials` WRITE;
/*!40000 ALTER TABLE `credentials` DISABLE KEYS */;
INSERT INTO `credentials` VALUES (7,'syafiq3@syafiq4.com','123123123',0),(8,'admin@gmail.com','admin',3),(9,'izzathensem@gmail.com','123456',0),(11,'hafiz@gmail.com','12345',1),(12,'Najmi@gmail.com','12345',0),(14,'izzul@officer.com','12345',2),(15,'adib@officer.com','12345',2),(16,'megat@admin.com','12345',3);
/*!40000 ALTER TABLE `credentials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `officers`
--

DROP TABLE IF EXISTS `officers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `officers` (
  `officer_id` int(10) NOT NULL AUTO_INCREMENT,
  `off_name` varchar(255) NOT NULL,
  `offno` int(10) NOT NULL,
  `cred_id` int(10) NOT NULL,
  PRIMARY KEY (`officer_id`),
  KEY `credoff_fk` (`cred_id`),
  CONSTRAINT `credoff_fk` FOREIGN KEY (`cred_id`) REFERENCES `credentials` (`cred_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `officers`
--

LOCK TABLES `officers` WRITE;
/*!40000 ALTER TABLE `officers` DISABLE KEYS */;
INSERT INTO `officers` VALUES (1,'Izzul',1001,14),(2,'Adib',1002,15);
/*!40000 ALTER TABLE `officers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `telno` int(20) NOT NULL,
  `studno` int(10) DEFAULT NULL,
  `staffno` int(10) DEFAULT NULL,
  `cred_id` int(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `creduser_fk` (`cred_id`),
  CONSTRAINT `creduser_fk` FOREIGN KEY (`cred_id`) REFERENCES `credentials` (`cred_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'syafiq2',123456789,2020878585,NULL,7),(7,'izzat',1234567890,2020862772,NULL,9),(8,'Hafiz',123456789,NULL,1020123456,11),(9,'Najmi',123456765,2023678321,NULL,12);
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

-- Dump completed on 2022-07-06 13:50:22

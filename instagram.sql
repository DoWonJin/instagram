CREATE DATABASE  IF NOT EXISTS `instagram` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `instagram`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: instagram
-- ------------------------------------------------------
-- Server version	5.7.20

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
-- Table structure for table `followtbl`
--

DROP TABLE IF EXISTS `followtbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `followtbl` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `name2` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name1` (`name1`,`name2`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followtbl`
--

LOCK TABLES `followtbl` WRITE;
/*!40000 ALTER TABLE `followtbl` DISABLE KEYS */;
INSERT INTO `followtbl` VALUES (3,'100','sodirty'),(7,'100','won'),(2,'kelixo_do','sodirty'),(5,'won','100');
/*!40000 ALTER TABLE `followtbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_talk`
--

DROP TABLE IF EXISTS `post_talk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_talk` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `post_num` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `comment` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_talk`
--

LOCK TABLES `post_talk` WRITE;
/*!40000 ALTER TABLE `post_talk` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_talk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `photoupload` char(100) NOT NULL,
  `location` char(30) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post` (`user_id`),
  CONSTRAINT `FK_post` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (12,19,'user/ehdnjswls3@naver.com/upload/gentleman.jpg',NULL,'2018-02-08 23:59:46'),(14,22,'user/100@naver.com/upload/dohee2.jpg',NULL,'2018-02-09 00:57:29'),(15,22,'user/100@naver.com/upload/marvel.jpeg',NULL,'2018-02-09 01:09:04'),(17,20,'user/sodirty@daum.net/upload/supercar.jpg',NULL,'2018-02-09 05:27:16'),(18,20,'user/sodirty@daum.net/upload/chorong.jpg',NULL,'2018-02-09 05:39:12'),(36,19,'user/ehdnjswls3@naver.com/upload/gentleman.jpg',NULL,'2018-02-12 22:40:40'),(41,19,'user/ehdnjswls3@naver.com/upload/lion.jpg',NULL,'2018-02-12 23:00:51'),(42,19,'user/ehdnjswls3@naver.com/upload/chorong.jpg',NULL,'2018-02-12 23:02:15'),(43,19,'user/ehdnjswls3@naver.com/upload/ddongE.jpg',NULL,'2018-02-12 23:03:11'),(44,20,'user/sodirty@daum.net/upload/lion.jpg',NULL,'2018-02-12 23:43:50'),(46,20,'user/sodirty@daum.net/upload/gentleman.jpg',NULL,'2018-02-13 00:09:48'),(47,20,'user/sodirty@daum.net/upload/gentleman.jpg',NULL,'2018-02-13 00:11:03'),(50,21,'user/baboo@naver.com/upload/woman.jpg',NULL,'2018-02-15 08:17:35'),(51,24,'user/won@naver.com/upload/Sohyen.jpg',NULL,'2018-02-15 08:22:20');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `talk`
--

DROP TABLE IF EXISTS `talk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `talk` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `section` int(100) DEFAULT NULL,
  `writer` int(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_talk` (`writer`),
  CONSTRAINT `FK_talk` FOREIGN KEY (`writer`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `talk`
--

LOCK TABLES `talk` WRITE;
/*!40000 ALTER TABLE `talk` DISABLE KEYS */;
INSERT INTO `talk` VALUES (5,2,21,'나는 바보다',NULL),(6,NULL,NULL,NULL,'2018-02-12 09:21:47'),(8,43,19,NULL,'2018-02-12 23:19:56'),(10,44,20,'나는 바보다','2018-02-12 23:59:49'),(11,45,20,'울지마\r\n','2018-02-13 00:08:39'),(12,45,20,'울지마\r\n','2018-02-13 00:08:54'),(13,48,20,'바보야','2018-02-13 00:21:06'),(14,49,20,'','2018-02-13 00:32:37'),(15,50,21,'','2018-02-15 08:17:35'),(16,51,24,'','2018-02-15 08:22:20'),(17,0,22,'1234','2018-02-18 23:28:21');
/*!40000 ALTER TABLE `talk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `email` char(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` char(20) DEFAULT NULL,
  `nickname` char(20) DEFAULT NULL,
  `location` char(20) DEFAULT NULL,
  `photosmall` char(150) DEFAULT 'img/user.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (19,'ehdnjswls3@naver.com','$2y$10$BvhGfppHbhuooBeQEzQQOOpS2hKPyQIQ428xoC7YqCXp2G2TdIBza','wonjin','kelixo_do',NULL,'user/ehdnjswls3@naver.com/profile/elegator.jpg'),(20,'sodirty@daum.net','$2y$10$iaC68wHf6kgIgr4JRbaUq.G5mmw8gZxItuSUHJC2pFps4MPDjKPNK','DO','sodirty',NULL,'user/sodirty@daum.net/profile/스폰지밥_뚱이.gif'),(21,'baboo@naver.com','$2y$10$hr/H0d2eiM7YVdLPJoxCnuQNCd/fJDOrsCG/Q6sd9ivQ.xPqmY6GG','chali','baboo',NULL,'user/baboo@naver.com/profile/ddongE.jpg'),(22,'100@naver.com','$2y$10$OchgqI73Fy/hwpLOtwB7Yu9eGX6GLbSIbgk2VEw9eXqzQ1fj1ghUC','100','100',NULL,'user/100@naver.com/profile/fall.jpg'),(24,'won@naver.com','$2y$10$10QWUMzHWjdFzrm3R9TeIeL6nlsoBpe21xLl6m9m2kxhpTA0p9LOG','keli','won',NULL,'img/user.png');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'instagram'
--

--
-- Dumping routines for database 'instagram'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-09 22:23:18

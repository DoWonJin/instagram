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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-01 13:22:30

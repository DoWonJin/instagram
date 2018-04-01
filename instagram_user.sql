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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-01 13:22:34

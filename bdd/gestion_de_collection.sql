-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gestion_de_collection
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `76_comment`
--

DROP TABLE IF EXISTS `76_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `76_comment` (
  `com_id` int NOT NULL AUTO_INCREMENT,
  `com_text` varchar(250) NOT NULL,
  `man_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`com_id`),
  KEY `man_id` (`man_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `76_comment_ibfk_1` FOREIGN KEY (`man_id`) REFERENCES `76_mangas` (`man_id`),
  CONSTRAINT `76_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `76_comment`
--

LOCK TABLES `76_comment` WRITE;
/*!40000 ALTER TABLE `76_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `76_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `76_favoris`
--

DROP TABLE IF EXISTS `76_favoris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `76_favoris` (
  `fav_id` int NOT NULL AUTO_INCREMENT,
  `man_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`fav_id`),
  KEY `man_id` (`man_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `76_favoris_ibfk_1` FOREIGN KEY (`man_id`) REFERENCES `76_mangas` (`man_id`),
  CONSTRAINT `76_favoris_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `76_favoris`
--

LOCK TABLES `76_favoris` WRITE;
/*!40000 ALTER TABLE `76_favoris` DISABLE KEYS */;
/*!40000 ALTER TABLE `76_favoris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `76_mangas`
--

DROP TABLE IF EXISTS `76_mangas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `76_mangas` (
  `man_id` int NOT NULL AUTO_INCREMENT,
  `man_name` varchar(100) NOT NULL,
  `man_auteur` varchar(100) NOT NULL,
  `man_genre` varchar(100) NOT NULL,
  `man_note` int NOT NULL,
  `man_image` varchar(250) NOT NULL,
  `man_description` varchar(250) NOT NULL,
  `man_status` varchar(100) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`man_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `76_mangas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `76_mangas`
--

LOCK TABLES `76_mangas` WRITE;
/*!40000 ALTER TABLE `76_mangas` DISABLE KEYS */;
/*!40000 ALTER TABLE `76_mangas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `76_users`
--

DROP TABLE IF EXISTS `76_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `76_users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_avatar` varchar(250) NOT NULL,
  `user_mail` varchar(100) NOT NULL,
  `user_pseudo` varchar(100) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_mail` (`user_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `76_users`
--

LOCK TABLES `76_users` WRITE;
/*!40000 ALTER TABLE `76_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `76_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-25 14:54:55

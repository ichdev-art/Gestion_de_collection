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
  KEY `76_comment_ibfk_2` (`user_id`),
  KEY `76_comment_ibfk_1` (`man_id`),
  CONSTRAINT `76_comment_ibfk_1` FOREIGN KEY (`man_id`) REFERENCES `76_mangas` (`man_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `76_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
  KEY `76_favoris_ibfk_2` (`user_id`),
  KEY `76_favoris_ibfk_1` (`man_id`),
  CONSTRAINT `76_favoris_ibfk_1` FOREIGN KEY (`man_id`) REFERENCES `76_mangas` (`man_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `76_favoris_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `76_favoris`
--

LOCK TABLES `76_favoris` WRITE;
/*!40000 ALTER TABLE `76_favoris` DISABLE KEYS */;
INSERT INTO `76_favoris` VALUES (10,6,30),(11,8,30),(12,10,31),(13,9,31);
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
  KEY `76_mangas_ibfk_1` (`user_id`),
  CONSTRAINT `76_mangas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `76_mangas`
--

LOCK TABLES `76_mangas` WRITE;
/*!40000 ALTER TABLE `76_mangas` DISABLE KEYS */;
INSERT INTO `76_mangas` VALUES (6,'One Piece','Eiichiro Oda','Aventure, Action',9,'OnePiece_Tome1.png','Luffy, un jeune garçon élastique, part à l\'aventure pour devenir le Roi des Pirates et trouve son premier équipier, Zoro.','En cours',30),(7,'Naruto','Masashi Kishimoto','Action, Aventure',9,'Naruto_Tome1.png','Naruto Uzumaki, un ninja rejeté par son village, rêve de devenir Hokage et découvre le secret du démon renard scellé en lui.','Terminé',30),(8,'Attack on Titan','Hajime Isayama','Action, Drame, Fantaisie',9,'AttackonTitan_Tome1.png','Eren Jaeger et ses amis vivent dans une ville entourée de murs pour se protéger des Titans, jusqu\'à ce qu\'un Titan colossal apparaisse.','Terminé',30),(9,'Demon Slayer','Koyoharu Gotouge','Action, Fantaisie',8,'DemonSlayer_Tome1.png','Tanjiro Kamado découvre sa famille massacrée par des démons et cherche un moyen de sauver sa sœur Nezuko, devenue démon.','Terminé',30),(10,'Jujutsu Kaisen','Gege Akutami','Action, Surnaturel',9,'JujutsuKaisen_Tome1.png','Yuji Itadori découvre un objet maudit et absorbe un doigt de Sukuna, un démon légendaire, ce qui bouleverse sa vie.','En cours',30),(11,'Death Note','Tsugumi Ohba','Thriller, Surnaturel',9,'DeathNote_Tome1.png','Light Yagami, un lycéen brillant, trouve un cahier lui permettant de tuer quiconque en y inscrivant son nom.','Terminé',30);
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
  `user_avatar` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'avatar.png',
  `user_mail` varchar(100) NOT NULL,
  `user_pseudo` varchar(100) NOT NULL,
  `user_password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_mail` (`user_mail`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `76_users`
--

LOCK TABLES `76_users` WRITE;
/*!40000 ALTER TABLE `76_users` DISABLE KEYS */;
INSERT INTO `76_users` VALUES (30,'avatar.png','said@fadli.com','Dark_sasuke','$2y$10$lZY0wlDvYs7c.0VmNLRLx.7yALDFIVppWyPAnV3y2HaU2uNcpgQk.'),(31,'avatar.png','said@fadlii.com','Dark_sasuke2','$2y$10$qUrCmgTLGnHTC.Z3.EuoruGEM9U4kRWyMMaCZGemPkfy0Ix1jjqdG');
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

-- Dump completed on 2025-03-26 14:21:56

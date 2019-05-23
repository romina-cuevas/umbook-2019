-- MySQL dump 10.13  Distrib 8.0.15, for macos10.14 (x86_64)
--
-- Host: localhost    Database: umbookdb
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `circle_friend`
--

DROP TABLE IF EXISTS `circle_friend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `circle_friend` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `friend_id` bigint(20) unsigned NOT NULL,
  `circle_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `circle_friend_friend_id_foreign` (`friend_id`),
  KEY `circle_friend_circle_id_foreign` (`circle_id`),
  CONSTRAINT `circle_friend_circle_id_foreign` FOREIGN KEY (`circle_id`) REFERENCES `circles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `circle_friend_friend_id_foreign` FOREIGN KEY (`friend_id`) REFERENCES `friends` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `circle_friend`
--

LOCK TABLES `circle_friend` WRITE;
/*!40000 ALTER TABLE `circle_friend` DISABLE KEYS */;
INSERT INTO `circle_friend` VALUES (1,4,1,'2019-05-23 07:57:08','2019-05-23 07:57:08'),(2,5,1,'2019-05-23 07:57:08','2019-05-23 07:57:08');
/*!40000 ALTER TABLE `circle_friend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `circles`
--

DROP TABLE IF EXISTS `circles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `circles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `circles_user_id_foreign` (`user_id`),
  CONSTRAINT `circles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `circles`
--

LOCK TABLES `circles` WRITE;
/*!40000 ALTER TABLE `circles` DISABLE KEYS */;
INSERT INTO `circles` VALUES (1,'Sistema web',51,'2019-05-23 07:57:07','2019-05-23 07:57:07');
/*!40000 ALTER TABLE `circles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `friends` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `friend_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `friends_friend_id_user_id_unique` (`friend_id`,`user_id`),
  KEY `friends_friend_id_index` (`friend_id`),
  KEY `friends_user_id_index` (`user_id`),
  CONSTRAINT `friends_friend_id_foreign` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `friends_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (1,1,2,51),(2,1,3,51),(3,1,4,51),(4,1,5,51),(5,1,9,51),(6,1,10,51);
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_05_13_213210_create_media_table',1),(4,'2019_05_14_114905_add_table_groups',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('member','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Marcus','Konopelski','2001-02-21','Auditor','marcus','user.png','rice.lenny@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','86gjTp1aTr','2019-05-23 07:56:13','2019-05-23 07:56:13'),(2,'Ransom','McDermott','2017-05-21','Bartender Helper','ransom','user.png','upton.shaylee@example.com','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','4iLYBHHJ0K','2019-05-23 07:56:13','2019-05-23 07:56:13'),(3,'Taya','Wintheiser','1997-05-18','Admin','taya','user.png','leuschke.aileen@example.com','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','5ivefs80JL','2019-05-23 07:56:13','2019-05-23 07:56:13'),(4,'Erick','Larkin','1981-03-12','Advertising Sales Agent','erick','user.png','johns.michaela@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','PFF0a2zK72','2019-05-23 07:56:13','2019-05-23 07:56:13'),(5,'Gregoria','Stiedemann','2007-06-17','Physical Therapist Aide','gregoria','user.png','tracey.monahan@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','3cunS4fGub','2019-05-23 07:56:13','2019-05-23 07:56:13'),(6,'Austyn','Runolfsson','2009-08-01','Production Planning','austyn','user.png','maximus42@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','Z0R5H1cKdf','2019-05-23 07:56:13','2019-05-23 07:56:13'),(7,'Craig','Ebert','1979-06-19','Telephone Operator','craig','user.png','casper.linnie@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','qFwvsA4AUy','2019-05-23 07:56:13','2019-05-23 07:56:13'),(8,'Vincent','Leannon','1988-02-27','Aircraft Launch Specialist','vincent','user.png','stark.jamison@example.com','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','hvLCeFCOYO','2019-05-23 07:56:13','2019-05-23 07:56:13'),(9,'Devyn','Klein','2010-07-20','Recyclable Material Collector','devyn','user.png','fshields@example.com','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','BtMylwWfEN','2019-05-23 07:56:13','2019-05-23 07:56:13'),(10,'Maude','Schuster','1970-04-26','Counsil','maude','user.png','dickens.ima@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','AoNY8VJzM2','2019-05-23 07:56:13','2019-05-23 07:56:13'),(11,'Ivah','O\'Conner','1991-11-01','Drywall Ceiling Tile Installer','ivah','user.png','gonzalo19@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','ulid4Bzqu1','2019-05-23 07:56:13','2019-05-23 07:56:13'),(12,'Shawn','Douglas','1996-03-28','Education Teacher','shawn','user.png','daugherty.jacinthe@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','ue6VrGHa1x','2019-05-23 07:56:13','2019-05-23 07:56:13'),(13,'Marshall','Haley','1991-08-02','Home','marshall','user.png','grace.schroeder@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','ecM7ivXZ9X','2019-05-23 07:56:13','2019-05-23 07:56:13'),(14,'Krystina','Rowe','2002-02-27','Stonemason','krystina','user.png','wfunk@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','uZGJI6hkUr','2019-05-23 07:56:13','2019-05-23 07:56:13'),(15,'Cesar','Little','1982-12-19','Floral Designer','cesar','user.png','rcrona@example.com','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','TFX1HPtBQS','2019-05-23 07:56:13','2019-05-23 07:56:13'),(16,'Margarete','Kutch','1993-03-04','Marking Machine Operator','margarete','user.png','clifton24@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','tEZxUfg2mH','2019-05-23 07:56:13','2019-05-23 07:56:13'),(17,'Jazmin','Mante','2007-05-27','Petroleum Technician','jazmin','user.png','carleton.wisoky@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','J8kwGlqCMG','2019-05-23 07:56:13','2019-05-23 07:56:13'),(18,'Mariela','Feil','2001-07-30','Psychiatric Technician','mariela','user.png','zboncak.viola@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','WRFfKJrRq8','2019-05-23 07:56:13','2019-05-23 07:56:13'),(19,'Kip','Lesch','2001-08-22','Dental Laboratory Technician','kip','user.png','vonrueden.alva@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','QHuHGC5IDw','2019-05-23 07:56:13','2019-05-23 07:56:13'),(20,'Cheyenne','Becker','1998-09-29','Sales Manager','cheyenne','user.png','bokon@example.com','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','bV0NviWrZk','2019-05-23 07:56:13','2019-05-23 07:56:13'),(21,'Louvenia','Torphy','1975-10-02','Painter and Illustrator','louvenia','user.png','upredovic@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','ZBecmwXjss','2019-05-23 07:56:13','2019-05-23 07:56:13'),(22,'Gage','Altenwerth','2001-12-03','Telephone Operator','gage','user.png','tturner@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','lqjUcEcEZe','2019-05-23 07:56:13','2019-05-23 07:56:13'),(23,'Sandra','Fritsch','1973-03-08','Musician','sandra','user.png','ruthe.schmitt@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','qzieNIYyiY','2019-05-23 07:56:13','2019-05-23 07:56:13'),(24,'Estrella','Kuhn','2002-08-06','Sociologist','estrella','user.png','okuhlman@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','L9oWGg0DK0','2019-05-23 07:56:13','2019-05-23 07:56:13'),(25,'Elmer','Leannon','2005-04-15','Psychologist','elmer','user.png','cyril.altenwerth@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','jTAL7NhQop','2019-05-23 07:56:13','2019-05-23 07:56:13'),(26,'Angeline','Zieme','2015-05-26','Surgeon','angeline','user.png','deondre.quigley@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','A5vHZEjHxl','2019-05-23 07:56:13','2019-05-23 07:56:13'),(27,'Cedrick','Haley','1973-04-29','Bindery Worker','cedrick','user.png','ntromp@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','P25QloywWl','2019-05-23 07:56:13','2019-05-23 07:56:13'),(28,'Kale','Orn','2002-07-25','New Accounts Clerk','kale','user.png','marta.johnson@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','O9WUQkbwml','2019-05-23 07:56:13','2019-05-23 07:56:13'),(29,'Glenna','Mosciski','1990-10-25','Ceiling Tile Installer','glenna','user.png','ycummerata@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','WvOxVjzqb0','2019-05-23 07:56:13','2019-05-23 07:56:13'),(30,'Jodie','Robel','1989-05-16','Electromechanical Equipment Assembler','jodie','user.png','cheyenne.klocko@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','Eoc6E3FLRT','2019-05-23 07:56:13','2019-05-23 07:56:13'),(31,'Gerardo','Wuckert','1999-04-25','Atmospheric and Space Scientist','gerardo','user.png','gcarroll@example.com','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','sGeyClBuse','2019-05-23 07:56:13','2019-05-23 07:56:13'),(32,'Jorge','Crooks','1976-09-20','Business Teacher','jorge','user.png','mcclure.kayla@example.com','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','UlXar3W7rm','2019-05-23 07:56:13','2019-05-23 07:56:13'),(33,'Saige','Crist','1988-05-25','Forest Fire Inspector','saige','user.png','pbatz@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','hqHJZZujuH','2019-05-23 07:56:13','2019-05-23 07:56:13'),(34,'Eldred','Nienow','1981-03-27','Social Service Specialists','eldred','user.png','wrobel@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','g5MzwoVBBp','2019-05-23 07:56:13','2019-05-23 07:56:13'),(35,'Kenny','Macejkovic','2005-01-27','Interpreter OR Translator','kenny','user.png','willms.johanna@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','gWwqmrd8Tt','2019-05-23 07:56:13','2019-05-23 07:56:13'),(36,'Angelica','Swaniawski','1995-03-29','Photographic Restorer','angelica','user.png','kwillms@example.com','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','RBZQcKnHwS','2019-05-23 07:56:13','2019-05-23 07:56:13'),(37,'Evalyn','Kemmer','1991-04-15','Postal Service Clerk','evalyn','user.png','orlo.kub@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','sY3Ze1Tv6K','2019-05-23 07:56:13','2019-05-23 07:56:13'),(38,'Sarina','Gulgowski','1981-02-15','Flight Attendant','sarina','user.png','adams.scarlett@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','0EtIAg6kSf','2019-05-23 07:56:13','2019-05-23 07:56:13'),(39,'Tremayne','Bartoletti','1981-07-15','Structural Iron and Steel Worker','tremayne','user.png','zkessler@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','WSczPLoAvY','2019-05-23 07:56:13','2019-05-23 07:56:13'),(40,'Berenice','Smith','2007-01-13','Precious Stone Worker','berenice','user.png','kautzer.karianne@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','LqpUsg4Pk0','2019-05-23 07:56:13','2019-05-23 07:56:13'),(41,'Matilda','Reichert','2007-12-25','Health Practitioner','matilda','user.png','reichert.saul@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','SH0WtZ09qp','2019-05-23 07:56:13','2019-05-23 07:56:13'),(42,'Katelyn','Harber','1988-05-20','Mixing and Blending Machine Operator','katelyn','user.png','keshawn.krajcik@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','UxyUhPQAqG','2019-05-23 07:56:13','2019-05-23 07:56:13'),(43,'Andre','Leannon','1995-01-12','Precision Aircraft Systems Assemblers','andre','user.png','braeden.deckow@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','AdkFCZ6vxB','2019-05-23 07:56:13','2019-05-23 07:56:13'),(44,'Burley','Adams','2004-07-08','Refinery Operator','burley','user.png','anais13@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','9P546gQJAe','2019-05-23 07:56:13','2019-05-23 07:56:13'),(45,'Viva','Erdman','1981-03-28','Network Systems Analyst','viva','user.png','edmund.gerhold@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','DpoO0QkL99','2019-05-23 07:56:13','2019-05-23 07:56:13'),(46,'Curtis','Herzog','1993-05-06','Pewter Caster','curtis','user.png','leland.mohr@example.net','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','VK0cY7TvKd','2019-05-23 07:56:13','2019-05-23 07:56:13'),(47,'Blaise','Schmitt','1973-02-17','Optical Instrument Assembler','blaise','user.png','runolfsson.noemy@example.com','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','AdIC3i3Pog','2019-05-23 07:56:13','2019-05-23 07:56:13'),(48,'Sim','Witting','1970-05-30','Counselor','sim','user.png','ewilliamson@example.com','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','QB6HIILFii','2019-05-23 07:56:13','2019-05-23 07:56:13'),(49,'Destini','Kiehn','1993-07-02','Government Property Inspector','destini','user.png','chandler75@example.com','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','sFzPLB5x8x','2019-05-23 07:56:13','2019-05-23 07:56:13'),(50,'Janet','DuBuque','1987-03-18','Biochemist','janet','user.png','xhills@example.org','2019-05-23 07:56:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','member','XgrFssUSZJ','2019-05-23 07:56:13','2019-05-23 07:56:13'),(51,'Matias','Quevedo Cotela','2019-05-15','Informatica','matias','user.png','matiasquevedo.sabbath@gmail.com',NULL,'$2y$10$tJgmxm/jHy6gS1FNHRD93eyWrCLdGeR/NcTWg40dO4ZKulpKwo1b6','member',NULL,'2019-05-23 07:56:32','2019-05-23 07:56:32');
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

-- Dump completed on 2019-05-23  2:01:09

-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gbfinal
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `basket`
--

DROP TABLE IF EXISTS `basket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `basket` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `offer_id` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basket`
--

LOCK TABLES `basket` WRITE;
/*!40000 ALTER TABLE `basket` DISABLE KEYS */;
INSERT INTO `basket` VALUES (9,1,2,5,NULL,NULL),(10,1,9,2,NULL,NULL);
/*!40000 ALTER TABLE `basket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'ABS',NULL,NULL),(2,'ASAM',NULL,NULL),(3,'BOSCH',NULL,NULL);
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distribution_point`
--

DROP TABLE IF EXISTS `distribution_point`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `distribution_point` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distribution_point`
--

LOCK TABLES `distribution_point` WRITE;
/*!40000 ALTER TABLE `distribution_point` DISABLE KEYS */;
INSERT INTO `distribution_point` VALUES (1,'Центральный офис',NULL,NULL),(2,'Филиал Новосибирск',NULL,NULL),(3,'Филиал Омск',NULL,NULL),(4,'Филиал Владивосток',NULL,NULL);
/*!40000 ALTER TABLE `distribution_point` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (37,'2014_10_12_000000_create_users_table',1),(38,'2014_10_12_100000_create_password_resets_table',1),(39,'2019_08_19_000000_create_failed_jobs_table',1),(40,'2019_12_14_000001_create_personal_access_tokens_table',1),(41,'2022_02_14_180857_create_table_brand',1),(42,'2022_02_14_182904_create_table_product',1),(43,'2022_02_14_183831_create_supplier',1),(44,'2022_02_14_183917_create_offer',1),(45,'2022_03_12_140733_create_table_order',1),(46,'2022_03_12_184312_create_distribution_point',1),(47,'2022_03_12_184945_create_transport_company',1),(48,'2022_03_17_195000_create_table_basket',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offer`
--

DROP TABLE IF EXISTS `offer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offer` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `supplier_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_min` int NOT NULL,
  `period_max` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer`
--

LOCK TABLES `offer` WRITE;
/*!40000 ALTER TABLE `offer` DISABLE KEYS */;
INSERT INTO `offer` VALUES (1,1,1,'Тормозная жидкость хорошая',1,3,100,1020.00,NULL,NULL),(2,1,2,'',2,3,12,920.00,NULL,NULL),(3,1,2,'Тормозная жидкость, 5л',0,1,5,2020.00,NULL,NULL),(4,1,3,'',1,3,101,1420.00,NULL,NULL),(5,1,3,'Жидкость VD40-5',10,20,22,520.00,NULL,NULL),(6,1,4,'',1,3,33,1222.00,NULL,NULL),(7,2,1,NULL,1,2,10,1222.00,NULL,NULL),(8,3,2,NULL,2,3,100,1222.00,NULL,NULL),(9,4,3,NULL,3,4,100,1222.00,NULL,NULL),(10,5,4,NULL,4,5,100,1222.00,NULL,NULL);
/*!40000 ALTER TABLE `offer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_head`
--

DROP TABLE IF EXISTS `order_head`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_head` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `create_date` datetime NOT NULL,
  `state_id` int NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_finish` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_head`
--

LOCK TABLES `order_head` WRITE;
/*!40000 ALTER TABLE `order_head` DISABLE KEYS */;
INSERT INTO `order_head` VALUES (1,1,'2022-04-02 21:12:00',10,'Секретный заказ № 1',0,NULL,NULL),(2,1,'2022-04-01 18:02:00',40,'Обычный заказ № 1',1,NULL,NULL),(3,1,'2022-04-02 11:52:12',20,'Супер-заказ № 100',0,NULL,NULL),(4,1,'2022-05-09 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(5,1,'2022-05-08 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(6,1,'2022-05-07 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(7,1,'2022-05-06 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(8,1,'2022-05-05 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(9,1,'2022-05-04 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(10,1,'2022-05-03 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(11,1,'2022-05-02 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(12,1,'2022-05-01 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(13,1,'2022-04-30 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(14,1,'2022-04-29 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(15,1,'2022-04-28 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(16,1,'2022-04-27 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(17,1,'2022-04-26 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(18,1,'2022-04-25 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(19,1,'2022-04-24 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(20,1,'2022-04-23 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(21,1,'2022-04-22 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(22,1,'2022-04-21 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL),(23,1,'2022-04-20 11:00:00',20,'Супер-заказ № 100',0,NULL,NULL);
/*!40000 ALTER TABLE `order_head` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_spc`
--

DROP TABLE IF EXISTS `order_spc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_spc` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_head_id` int NOT NULL,
  `product_id` int NOT NULL,
  `supplier_id` int NOT NULL,
  `period_min` int NOT NULL,
  `period_max` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_spc`
--

LOCK TABLES `order_spc` WRITE;
/*!40000 ALTER TABLE `order_spc` DISABLE KEYS */;
INSERT INTO `order_spc` VALUES (1,1,1,1,0,2,5,920.00,NULL,NULL),(2,1,5,3,2,5,3,130.00,NULL,NULL),(3,2,1,1,1,2,5,720.00,NULL,NULL),(4,2,5,3,2,5,3,130.00,NULL,NULL),(5,3,1,1,0,2,6,620.00,NULL,NULL),(6,3,5,3,2,5,4,1300.00,NULL,NULL),(7,4,1,1,0,2,6,620.00,NULL,NULL),(8,4,5,3,2,5,4,1300.00,NULL,NULL),(9,5,1,1,0,2,6,620.00,NULL,NULL),(10,5,5,3,2,5,4,1300.00,NULL,NULL),(11,6,1,1,0,2,6,620.00,NULL,NULL),(12,6,5,3,2,5,4,1300.00,NULL,NULL),(13,7,1,1,0,2,6,620.00,NULL,NULL),(14,7,5,3,2,5,4,1300.00,NULL,NULL),(15,8,1,1,0,2,6,620.00,NULL,NULL),(16,8,5,3,2,5,4,1300.00,NULL,NULL),(17,9,1,1,0,2,6,620.00,NULL,NULL),(18,9,5,3,2,5,4,1300.00,NULL,NULL),(19,10,1,1,0,2,6,620.00,NULL,NULL),(20,10,5,3,2,5,4,1300.00,NULL,NULL),(21,11,1,1,0,2,6,620.00,NULL,NULL),(22,11,5,3,2,5,4,1300.00,NULL,NULL),(23,12,1,1,0,2,6,620.00,NULL,NULL),(24,12,5,3,2,5,4,1300.00,NULL,NULL),(25,13,1,1,0,2,6,620.00,NULL,NULL),(26,13,5,3,2,5,4,1300.00,NULL,NULL),(27,14,1,1,0,2,6,620.00,NULL,NULL),(28,14,5,3,2,5,4,1300.00,NULL,NULL),(29,15,1,1,0,2,6,620.00,NULL,NULL),(30,15,5,3,2,5,4,1300.00,NULL,NULL),(31,16,1,1,0,2,6,620.00,NULL,NULL),(32,16,5,3,2,5,4,1300.00,NULL,NULL),(33,17,1,1,0,2,6,620.00,NULL,NULL),(34,17,5,3,2,5,4,1300.00,NULL,NULL),(35,18,1,1,0,2,6,620.00,NULL,NULL),(36,18,5,3,2,5,4,1300.00,NULL,NULL),(37,19,1,1,0,2,6,620.00,NULL,NULL),(38,19,5,3,2,5,4,1300.00,NULL,NULL),(39,20,1,1,0,2,6,620.00,NULL,NULL),(40,20,5,3,2,5,4,1300.00,NULL,NULL),(41,21,1,1,0,2,6,620.00,NULL,NULL),(42,21,5,3,2,5,4,1300.00,NULL,NULL),(43,22,1,1,0,2,6,620.00,NULL,NULL),(44,22,5,3,2,5,4,1300.00,NULL,NULL),(45,23,1,1,0,2,6,620.00,NULL,NULL),(46,23,5,3,2,5,4,1300.00,NULL,NULL);
/*!40000 ALTER TABLE `order_spc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_state`
--

DROP TABLE IF EXISTS `order_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_state` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_spc_id` int NOT NULL,
  `state_id` int NOT NULL,
  `quantity` int NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_state`
--

LOCK TABLES `order_state` WRITE;
/*!40000 ALTER TABLE `order_state` DISABLE KEYS */;
INSERT INTO `order_state` VALUES (1,1,10,2,'',NULL,NULL),(2,1,1010,1,'Нет на складе',NULL,NULL),(3,1,40,2,'',NULL,NULL),(4,2,10,1,'',NULL,NULL),(5,2,30,2,'',NULL,NULL),(6,3,1010,1,'Нет на складе',NULL,NULL),(7,3,40,4,'',NULL,NULL),(8,4,40,3,'',NULL,NULL),(9,5,20,2,'',NULL,NULL),(10,5,1020,1,'Нет на складе',NULL,NULL),(11,5,40,3,'',NULL,NULL),(12,6,10,1,'',NULL,NULL),(13,6,30,3,'',NULL,NULL),(15,7,1020,1,'Нет на складе',NULL,NULL),(16,7,40,5,'',NULL,'2022-05-10 15:18:27'),(18,8,30,1,'',NULL,'2022-05-10 17:32:33'),(19,9,20,2,'',NULL,NULL),(20,9,1020,1,'Нет на складе',NULL,NULL),(21,9,40,3,'',NULL,NULL),(22,10,10,1,'',NULL,NULL),(23,10,30,3,'',NULL,NULL),(24,11,20,2,'',NULL,NULL),(25,11,1020,1,'Нет на складе',NULL,NULL),(26,11,40,3,'',NULL,NULL),(27,12,10,1,'',NULL,NULL),(28,12,30,3,'',NULL,NULL),(29,13,20,2,'',NULL,NULL),(30,13,1020,1,'Нет на складе',NULL,NULL),(31,13,40,3,'',NULL,NULL),(32,14,10,1,'',NULL,NULL),(33,14,30,3,'',NULL,NULL),(34,15,20,2,'',NULL,NULL),(35,15,1020,1,'Нет на складе',NULL,NULL),(36,15,40,3,'',NULL,NULL),(37,16,10,1,'',NULL,NULL),(38,16,30,3,'',NULL,NULL),(39,17,20,2,'',NULL,NULL),(40,17,1020,1,'Нет на складе',NULL,NULL),(41,17,40,3,'',NULL,NULL),(42,18,10,1,'',NULL,NULL),(43,18,30,3,'',NULL,NULL),(44,19,20,2,'',NULL,NULL),(45,19,1020,1,'Нет на складе',NULL,NULL),(46,19,40,3,'',NULL,NULL),(47,20,10,1,'',NULL,NULL),(48,20,30,3,'',NULL,NULL),(49,21,20,2,'',NULL,NULL),(50,21,1020,1,'Нет на складе',NULL,NULL),(51,21,40,3,'',NULL,NULL),(52,22,10,1,'',NULL,NULL),(53,22,30,3,'',NULL,NULL),(54,23,20,2,'',NULL,NULL),(55,23,1020,1,'Нет на складе',NULL,NULL),(56,23,40,3,'',NULL,NULL),(57,24,10,1,'',NULL,NULL),(58,24,30,3,'',NULL,NULL),(59,25,20,2,'',NULL,NULL),(60,25,1020,1,'Нет на складе',NULL,NULL),(61,25,40,3,'',NULL,NULL),(62,26,10,1,'',NULL,NULL),(63,26,30,3,'',NULL,NULL),(64,27,20,2,'',NULL,NULL),(65,27,1020,1,'Нет на складе',NULL,NULL),(66,27,40,3,'',NULL,NULL),(67,28,10,1,'',NULL,NULL),(68,28,30,3,'',NULL,NULL),(69,29,20,2,'',NULL,NULL),(70,29,1020,1,'Нет на складе',NULL,NULL),(71,29,40,3,'',NULL,NULL),(72,30,10,1,'',NULL,NULL),(73,30,30,3,'',NULL,NULL),(74,31,20,2,'',NULL,NULL),(75,31,1020,1,'Нет на складе',NULL,NULL),(76,31,40,3,'',NULL,NULL),(77,32,10,1,'',NULL,NULL),(78,32,30,3,'',NULL,NULL),(79,33,20,2,'',NULL,NULL),(80,33,1020,1,'Нет на складе',NULL,NULL),(81,33,40,3,'',NULL,NULL),(82,34,10,1,'',NULL,NULL),(83,34,30,3,'',NULL,NULL),(84,35,20,2,'',NULL,NULL),(85,35,1020,1,'Нет на складе',NULL,NULL),(86,35,40,3,'',NULL,NULL),(87,36,10,1,'',NULL,NULL),(88,36,30,3,'',NULL,NULL),(89,37,20,2,'',NULL,NULL),(90,37,1020,1,'Нет на складе',NULL,NULL),(91,37,40,3,'',NULL,NULL),(92,38,10,1,'',NULL,NULL),(93,38,30,3,'',NULL,NULL),(94,39,20,2,'',NULL,NULL),(95,39,1020,1,'Нет на складе',NULL,NULL),(96,39,40,3,'',NULL,NULL),(97,40,10,1,'',NULL,NULL),(98,40,30,3,'',NULL,NULL),(99,41,20,2,'',NULL,NULL),(100,41,1020,1,'Нет на складе',NULL,NULL),(101,41,40,3,'',NULL,NULL),(102,42,10,1,'',NULL,NULL),(103,42,30,3,'',NULL,NULL),(104,43,20,2,'',NULL,NULL),(105,43,1020,1,'Нет на складе',NULL,NULL),(106,43,40,3,'',NULL,NULL),(107,44,10,1,'',NULL,NULL),(108,44,30,3,'',NULL,NULL),(109,45,20,2,'',NULL,NULL),(110,45,1020,1,'Нет на складе',NULL,NULL),(111,45,40,3,'',NULL,NULL),(112,46,10,1,'',NULL,NULL),(113,46,30,3,'',NULL,NULL),(121,8,10,1,'',NULL,'2022-05-10 18:14:24'),(124,8,1020,2,'',NULL,NULL);
/*!40000 ALTER TABLE `order_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` int NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_liquidity` tinyint(1) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,1,'123','Тормозная жидкость',1,'detail1',NULL,NULL),(2,2,'123','Педаль газа',1,'detail2',NULL,NULL),(3,3,'123','Двигатель',0,'detail3',NULL,NULL),(4,1,'aaa','Рычаг',1,'detail4',NULL,NULL),(5,1,'bbb','Шаровая опора',0,'detail5',NULL,NULL),(6,1,'ccc','Сиденье переднее правое',1,'detail6',NULL,NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `state` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_finish` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1021 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (10,'Новый',0,NULL,NULL),(20,'В работе',0,NULL,NULL),(30,'На складе',0,NULL,NULL),(40,'Отгружено',1,NULL,NULL),(1010,'Отклонено поставщиком',1,NULL,NULL),(1020,'Отменено',1,NULL,NULL);
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `success_percent` int NOT NULL,
  `is_dialer` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'Rolf','МСК',77,1,NULL,NULL),(2,'Авто-японец','ЧЕЛ',90,0,NULL,NULL),(3,'Звезда','ЕКБ',60,0,NULL,NULL),(4,'Авто-империя','МСК',98,1,NULL,NULL);
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transport_company`
--

DROP TABLE IF EXISTS `transport_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transport_company` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transport_company`
--

LOCK TABLES `transport_company` WRITE;
/*!40000 ALTER TABLE `transport_company` DISABLE KEYS */;
INSERT INTO `transport_company` VALUES (1,'СДЭК',NULL,NULL),(2,'Озон экспресс',NULL,NULL);
/*!40000 ALTER TABLE `transport_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consignee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transport_company_id` int NOT NULL,
  `distribution_point_id` int NOT NULL,
  `is_admin` int NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Богдасаров Олег','w@w.ru',NULL,'$2y$10$zsDIpERUUclKasbqtDJ02O6sy7DGFFsGlR10S3qlxgzsX2312lEwG','+79151111111','ООО \"Памятная встреча\"','ООО \"Светлый путь\"',1,1,1,NULL,NULL,NULL);
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

-- Dump completed on 2022-05-10 21:20:29

-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: db_italica_redesign
-- ------------------------------------------------------
-- Server version	5.7.23

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
-- Current Database: `db_italica_redesign`
--
SET FOREIGN_KEY_CHECKS=0;

--
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `agent_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents`
--

LOCK TABLES `agents` WRITE;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `amenities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amenities_display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amenities_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amenities`
--

LOCK TABLES `amenities` WRITE;
/*!40000 ALTER TABLE `amenities` DISABLE KEYS */;
INSERT INTO `amenities` VALUES (1,'Hello TAG','tag','2018-10-21 00:49:18','2018-10-21 00:49:18');
/*!40000 ALTER TABLE `amenities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `condition`
--

DROP TABLE IF EXISTS `condition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `condition` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `condition_display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condition`
--

LOCK TABLES `condition` WRITE;
/*!40000 ALTER TABLE `condition` DISABLE KEYS */;
INSERT INTO `condition` VALUES (1,'New','new',NULL,NULL),(2,'Restored','restored',NULL,NULL),(3,'RAW Construction','raw_construction',NULL,NULL),(4,'Habitable','habitable',NULL,NULL),(5,'Ned Renovation','need_renovation',NULL,NULL),(6,'Ruin','ruin',NULL,NULL);
/*!40000 ALTER TABLE `condition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_enquiry`
--

DROP TABLE IF EXISTS `contact_enquiry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_enquiry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_enquiry`
--

LOCK TABLES `contact_enquiry` WRITE;
/*!40000 ALTER TABLE `contact_enquiry` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_enquiry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_faq`
--

DROP TABLE IF EXISTS `contact_faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_faq` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_faq`
--

LOCK TABLES `contact_faq` WRITE;
/*!40000 ALTER TABLE `contact_faq` DISABLE KEYS */;
INSERT INTO `contact_faq` VALUES (1,'sdhj<sbd','shdbshdbhj<','sjhbdshdbhj<db',1,'2018-10-19 14:56:39','2018-10-20 01:10:00'),(2,'sdsd','sdsd','sdsdsd',1,'2018-10-19 14:56:54','2018-10-20 01:09:11');
/*!40000 ALTER TABLE `contact_faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destinations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `destination_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinations`
--

LOCK TABLES `destinations` WRITE;
/*!40000 ALTER TABLE `destinations` DISABLE KEYS */;
INSERT INTO `destinations` VALUES (1,'Mahal 1','Lovers Spot','1540100958.jpg','2018-10-18 05:30:37','2018-10-21 00:19:28'),(2,'Thaj Mahal','Veniam quasi et quasi amet veritatis. Repudiandae nihil neque repellat ducimus. Distinctio dolores ut voluptas tempore rem excepturi facere ex.','test-image.jpg','2018-10-18 11:57:55','2018-10-18 11:57:55');
/*!40000 ALTER TABLE `destinations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'Non dignissimos adipisci sunt omnis occaecati provident. Deserunt doloribus voluptas hic corporis.','Sit ut earum ea cupiditate aperiam ullam. Debitis deserunt odio dolorem voluptatem. Odit quasi dolor animi corrupti ut voluptatem ducimus mollitia.','9','2018-10-18 12:12:15','2018-10-18 12:12:15'),(2,'Ullam ducimus mollitia nemo voluptas. Totam magnam dolores dolore omnis repellendus sint quis.','Sequi consequatur sed rerum odio. Autem voluptas voluptas iste error atque. Nihil sed exercitationem aliquam explicabo omnis.','2','2018-10-18 12:13:05','2018-10-18 12:13:05'),(3,'Ut temporibus inventore odio assumenda et enim. Reprehenderit fugiat sit sequi quo culpa iusto.','Ut quam et vero nihil nemo ipsum ab. Et dignissimos voluptates enim eius et praesentium quasi. Dolorem sapiente vero quia.','9','2018-10-18 12:13:05','2018-10-18 12:13:05'),(4,'Nesciunt rerum quos sit.','Praesentium sit aut odit sapiente. Laudantium quo dignissimos reprehenderit totam. Odit aperiam asperiores voluptatem fugit laudantium aut.','8','2018-10-18 12:13:05','2018-10-18 12:13:05'),(5,'Laboriosam minima quae reprehenderit et mollitia possimus ducimus.','Excepturi qui voluptatem tempora quis error. Numquam omnis assumenda eos eius facere eos. Illum eos voluptas hic.','0','2018-10-18 12:13:21','2018-10-18 12:13:21'),(6,'Non in iure consequatur vel.','Rerum repellendus dolor cum. Eos voluptatem sapiente maxime culpa quibusdam voluptates molestiae expedita. Aliquid ea et quidem repudiandae.','9','2018-10-18 12:13:21','2018-10-18 12:13:21'),(7,'Rem molestias sint odio voluptas similique molestiae sed. Quo et est quidem ut nostrum saepe architecto et.','Ipsa tempore distinctio doloribus molestiae. Perspiciatis incidunt quod et atque nobis omnis ipsum.','4','2018-10-18 12:13:21','2018-10-18 12:13:21'),(8,'Vitae qui aspernatur est harum quas distinctio vero.','Culpa neque doloribus neque itaque. Blanditiis qui blanditiis assumenda aperiam. Libero sunt soluta iure tempore dolor laudantium voluptatibus qui.','3','2018-10-18 12:13:21','2018-10-18 12:13:21'),(9,'Non earum consectetur omnis et doloremque nam consequatur.','Voluptatem ut dolorem et dolores. Quia suscipit adipisci fugiat nemo dolor.','3','2018-10-18 12:13:21','2018-10-18 12:13:21'),(10,'Non assumenda veritatis est unde est quia ad. Repellat mollitia qui sit adipisci ut.','Sit aut deleniti et eaque aperiam. Ipsa consequatur nesciunt qui a est dolorem.','1','2018-10-18 12:13:21','2018-10-18 12:13:21'),(11,'Alias expedita deleniti nemo a sunt neque minus.','Dolorum enim dolores cupiditate vitae sunt. Explicabo rerum qui enim eum est.','4','2018-10-18 12:13:21','2018-10-18 12:13:21'),(12,'Autem voluptatem quod voluptas.','Repudiandae et quae recusandae repellat quidem vero nam. Numquam repellendus possimus est possimus nobis sequi. Molestias et ducimus natus facilis dolorem.','2','2018-10-18 12:13:21','2018-10-18 12:13:21'),(13,'Nulla quam temporibus recusandae omnis atque expedita dolor.','At quo omnis molestiae et aut minus maiores. Amet quo rerum libero aut deleniti cupiditate.','1','2018-10-18 12:13:21','2018-10-18 12:13:21'),(14,'Magni repellat non occaecati assumenda eum.','Quam at sint et et et culpa. Dolorum perspiciatis necessitatibus ipsa nisi dolores rerum dolores rerum.','5','2018-10-18 12:13:21','2018-10-18 12:13:21');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `features` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `feature_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `measurement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `features`
--

LOCK TABLES `features` WRITE;
/*!40000 ALTER TABLE `features` DISABLE KEYS */;
/*!40000 ALTER TABLE `features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_wt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gross_wt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_wt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_details` longtext COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caret` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `items_user_id_foreign` (`user_id`),
  CONSTRAINT `items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locations_region_id_foreign` (`region_id`),
  CONSTRAINT `locations_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'2018-10-18 03:36:19','2018-10-18 03:36:19','Colombo',2);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_11_08_071957_create_permission_tables',1),(4,'2017_11_10_062511_create_profiles_table',1),(5,'2017_11_11_112401_create_items_table',1),(6,'2018_10_09_082246_create_region',1),(7,'2018_10_09_083140_create_agents',1),(8,'2018_10_09_083145_create_locations',1),(9,'2018_10_09_083153_create_types',1),(10,'2018_10_09_083205_create_features',1),(11,'2018_10_09_164520_create_property_condition',1),(12,'2018_10_09_172705_create_property_amenities',1),(13,'2018_10_11_194047_create_destinitions',1),(14,'2018_10_11_194322_create_offer',1),(15,'2018_10_11_202352_create_property',1),(16,'2018_10_13_023340_create_property_features',1),(17,'2018_10_13_043753_create_post',1),(18,'2018_10_13_060554_create_faqs',1),(19,'2018_10_19_181204_create_testinomial',2),(22,'2018_10_19_191717_create_contact_enquiry',3),(24,'2018_10_19_195508_create_contact_faq',4),(25,'2018_10_21_033743_create_settings',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,1,'App\\User'),(2,2,'App\\User'),(2,3,'App\\User');
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'admin','web','2018-10-18 03:35:29','2018-10-18 03:35:29'),(2,'user','web','2018-10-18 03:35:29','2018-10-18 03:35:29');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Corporis ut ullam mollitia tempora eveniet molestias maiores. Sunt rerum magnam quos consequatur quidem dolorem.','Ipsam ut voluptatum doloremque natus et impedit. Est architecto consequatur quas natus sint.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(2,'Qui non deleniti et illo sunt vitae. Reprehenderit provident fugit mollitia recusandae consequatur dolores dolor veritatis.','Distinctio eos possimus voluptatem aliquid voluptas molestiae ea. Non neque deleniti in nam aut.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(3,'Aperiam omnis aut dolor excepturi quae.','Ut ut dolor est sint. Commodi veniam magnam pariatur optio rerum. Voluptatem non ducimus eveniet enim et error qui.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(4,'Mollitia minima ad accusamus quam. Inventore quisquam harum laudantium quia nisi.','Quia reprehenderit non perferendis exercitationem ea ducimus distinctio autem. Ullam est voluptas et et. Ea quia facilis suscipit deserunt.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(5,'Neque error nostrum veritatis dolor. Ducimus ullam ea voluptatibus molestiae nostrum reprehenderit fugiat.','Suscipit alias quasi aut sit eum eos. Consequatur quo et animi ad.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(6,'Officiis aut et aut molestiae expedita quia modi.','Eos ut voluptas minus id voluptatem voluptas rerum. Ut dolorem quia nisi eos sequi.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(7,'Voluptas quo accusantium non aut et minus doloremque. Optio enim sit autem minima enim.','Blanditiis tempora consequatur enim. Qui porro ipsam debitis necessitatibus.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(8,'At esse repellat aliquid maiores ea culpa et molestiae. Vel aliquid quidem at in cumque qui aut.','Molestias quibusdam asperiores quidem incidunt magnam atque aut. Similique nulla sunt natus nobis quasi iusto. Facere repudiandae ex adipisci et quia.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(9,'Recusandae rerum est eveniet quas voluptates.','Consequuntur et in atque facilis sit rerum. Veniam consequatur aliquid quaerat consequatur voluptate voluptatem.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(10,'Distinctio ut rerum sunt id.','Autem blanditiis error perferendis eum sit et. Tempore nam qui rerum dolor voluptas odio. Aut occaecati sed alias ex.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(11,'Voluptatum ex qui unde. Quia voluptatum impedit dignissimos omnis officia consequatur voluptatum sint.','Dolore delectus et nobis praesentium nulla cum natus. Dolores in placeat ut doloremque.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(12,'Blanditiis id aut ducimus ducimus.','Voluptatem veritatis eos magnam sint voluptatem nulla quis. Quae labore sint ab maiores modi et dolorum. Sit non quae impedit illo aut non voluptates voluptates.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(13,'Aliquam ipsa quae iure quia.','Quia et pariatur est et ipsam. Harum amet omnis eius et explicabo eos qui. Dolore voluptatum quia et.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(14,'Rerum aliquid incidunt odit quasi quae sapiente. Dolores libero architecto et sit est autem aut.','Quia voluptatibus voluptatibus quod debitis corrupti. Qui aspernatur doloremque repellendus reiciendis esse eos ad.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(15,'Impedit minima iusto eveniet veniam. Quo incidunt sequi officiis aperiam.','Eveniet aut eligendi explicabo omnis incidunt aut ipsam accusantium. Ducimus perferendis aspernatur laboriosam ducimus eum rem ut. Accusantium qui corporis et quia ratione.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(16,'Porro itaque excepturi et earum. Nam qui impedit ullam iste excepturi et.','Beatae ea eius eaque ex dolor alias rerum. Aspernatur iste dolore a porro.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(17,'Totam ut sit quibusdam rem. Repellendus velit non quas ut maiores.','Cupiditate quis totam qui autem et ratione et. Sunt minima eius iusto aut autem consequatur omnis. Ut quisquam vero necessitatibus ut tempore.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(18,'Provident iure cumque laudantium architecto eligendi molestias.','Aut laudantium est hic fugit id aliquid. Non quos esse odio omnis sequi. Quaerat fugiat quis expedita magni sed provident inventore provident.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(19,'Iure possimus ea qui et vel harum. Enim soluta tenetur suscipit et.','Est possimus animi at dolor neque et. Magnam dolore dolores sunt amet magnam.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(20,'Veniam quis quia quam perspiciatis doloremque ex sint ut. Autem dolores fuga quis facilis ratione dolorem.','Minima deleniti nulla et autem voluptas ut. Eius deleniti qui porro aut est veritatis delectus praesentium.','1539406278.gif','user','2018-10-18 20:20:48','2018-10-18 20:20:48'),(21,'Consequuntur sed ex nostrum veniam at.','Non aut quidem velit facilis et. Fugit qui dolorem nemo nam necessitatibus quis rerum. Ab ut incidunt architecto ea ipsa qui.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(22,'Quidem facilis quia corporis reiciendis consequatur explicabo vel. Ut perferendis in velit cum nobis sit.','Ut ipsam quia nostrum temporibus. Aut optio tempora sunt consequuntur et ut.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(23,'Ipsam non aliquid quod nostrum accusamus odit. Voluptatem quas accusantium recusandae fugiat est enim aliquam.','Quos architecto quisquam voluptatem. Ipsam quia corrupti sint occaecati architecto recusandae esse laboriosam. Repellendus quia ducimus architecto non deleniti aliquid tempore.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(24,'Dolores magnam et itaque sed magni ex eum. Nobis eveniet velit repudiandae dignissimos.','Excepturi nobis numquam sed voluptatem quo. Sint odit ut sed est laborum.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(25,'Est reiciendis beatae dignissimos veritatis qui.','Ut et vel quam molestias aut ut in. Ut quos labore impedit ut rerum dolor nulla. Dignissimos nemo porro incidunt laudantium labore aliquid.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(26,'Eligendi qui voluptatem maxime voluptatum quos est odit voluptates. Similique sunt distinctio inventore.','Exercitationem voluptatem est voluptatibus tenetur molestiae. Unde quam distinctio sit fugiat.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(27,'Sed eius et reprehenderit aut autem quae.','Culpa asperiores minima quis natus expedita. Vero velit id omnis quibusdam aut aliquam aut.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(28,'Blanditiis temporibus nesciunt voluptates est earum exercitationem voluptas. Quod est consequatur molestiae facere eos aut libero.','Cumque odit debitis voluptatem fugit nam nostrum et deserunt. Ullam et et qui perspiciatis similique est.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(29,'Voluptas corrupti maxime non mollitia similique iste.','Eos sit provident natus. Laudantium aut ad sunt ut.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(30,'Voluptatum eum nesciunt eveniet aut quis. Dolorem assumenda id quis alias.','Reiciendis sint omnis provident nisi culpa dolorem possimus. Sit facilis occaecati sunt voluptas consequatur. Quia inventore molestiae adipisci voluptas necessitatibus.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(31,'Similique voluptate occaecati iste sunt sunt.','Esse impedit eum et cum quo qui dolore. At enim asperiores nemo eligendi. Necessitatibus sed praesentium labore et libero non est qui.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(32,'Doloribus voluptas error alias aspernatur modi omnis dignissimos. Numquam consequatur non sunt blanditiis dolore laboriosam.','Id nam quia nisi quibusdam natus quibusdam. Dolorem et molestias quis tempora cupiditate modi. Aliquid distinctio velit velit culpa cupiditate.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(33,'Quasi sint maxime consequatur ipsa exercitationem.','Rerum cupiditate qui autem molestias qui. A soluta deleniti excepturi in suscipit quaerat. Consequatur deleniti est commodi eveniet aut.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(34,'Laboriosam voluptas voluptas explicabo numquam enim sequi nulla. Sunt dignissimos aliquid quae sint.','Sint ducimus dolorum nam doloribus dolor in voluptas. Est nostrum quo quia enim est.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(35,'Repellendus illo ex aspernatur rerum sed laboriosam aliquid sed.','Voluptas eos molestias consequatur quibusdam dolorem accusantium omnis. Ut magni fugiat nulla officiis illum et assumenda.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(36,'Qui cumque consequatur ipsum totam nulla facere. Cupiditate possimus nihil architecto cupiditate occaecati qui.','Omnis iste dicta numquam molestias numquam soluta velit. Quos nemo quia quis quo provident voluptatum nostrum. Nesciunt optio ab eveniet voluptatem.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(37,'Repellendus itaque iusto impedit.','Quibusdam distinctio tenetur aut molestias et. Ut laudantium itaque nobis.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(38,'Et qui voluptatem rerum magni velit.','Omnis libero minus natus voluptatem est sit. Delectus praesentium minima quia dolore.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(39,'Nostrum soluta accusamus accusamus eaque aspernatur perspiciatis.','Voluptas quas aut magni quia a. Numquam delectus quod nam facere ea fugit.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34'),(40,'Non ut nihil in iste. Molestiae eum dolore quia et facilis.','Aut qui accusamus laborum. Dolores perferendis est accusantium cum. Atque et explicabo expedita voluptas enim.','1539406278.gif','user','2018-10-19 00:02:34','2018-10-19 00:02:34');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permanent_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternate_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhar_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_user_id_foreign` (`user_id`),
  CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `properties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beds` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baths` longtext COLLATE utf8mb4_unicode_ci,
  `plot_size` text COLLATE utf8mb4_unicode_ci,
  `living_area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parking` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_location_latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_location_longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_upon_request` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `condition_id` int(10) unsigned DEFAULT NULL,
  `location_id` int(10) unsigned DEFAULT NULL,
  `agent_id` int(10) unsigned DEFAULT NULL,
  `type_id` int(10) unsigned DEFAULT NULL,
  `destination_id` int(10) unsigned DEFAULT NULL,
  `offer_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `properties_location_id_foreign` (`location_id`),
  KEY `properties_destination_id_foreign` (`destination_id`),
  KEY `properties_offer_id_foreign` (`offer_id`),
  KEY `properties_agent_id_foreign` (`agent_id`),
  KEY `properties_type_id_foreign` (`type_id`),
  KEY `properties_condition_id_foreign` (`condition_id`),
  CONSTRAINT `properties_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  CONSTRAINT `properties_condition_id_foreign` FOREIGN KEY (`condition_id`) REFERENCES `condition` (`id`),
  CONSTRAINT `properties_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`),
  CONSTRAINT `properties_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  CONSTRAINT `properties_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `property_offer` (`id`),
  CONSTRAINT `properties_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `property_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `properties`
--

LOCK TABLES `properties` WRITE;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
INSERT INTO `properties` VALUES (3,'Vito Ortiz','Modi eum omnis earum quis ut in eius.','Consequatur iusto iure quo omnis nam sequi impedit deserunt. Et ad quasi iure voluptate. Qui saepe provident provident quasi officia aut et nihil.','5','5','33 Sq. m','17 Sq. m','Y','Y','1.23222','1.4211','1539862262.jpg','23423',NULL,NULL,NULL,NULL,'2018-10-18 06:11:15','2018-10-18 11:27:02',1,1,NULL,1,1,1),(6,'sjdnj','jsnjdn','<p><strong>jndjdndjjw jjdjn</strong></p>','23','23','232','232','Y','Y','1.2232','1.2322','1540101782.jpg',NULL,'0.00',NULL,NULL,NULL,'2018-10-21 00:33:01','2018-10-21 00:37:20',1,1,NULL,1,NULL,1);
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_features`
--

DROP TABLE IF EXISTS `property_features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_features` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `property_id` int(10) unsigned DEFAULT NULL,
  `amenities_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `property_features_property_id_foreign` (`property_id`),
  KEY `property_features_amenities_id_foreign` (`amenities_id`),
  CONSTRAINT `property_features_amenities_id_foreign` FOREIGN KEY (`amenities_id`) REFERENCES `amenities` (`id`),
  CONSTRAINT `property_features_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_features`
--

LOCK TABLES `property_features` WRITE;
/*!40000 ALTER TABLE `property_features` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_offer`
--

DROP TABLE IF EXISTS `property_offer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_offer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `offer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_offer`
--

LOCK TABLES `property_offer` WRITE;
/*!40000 ALTER TABLE `property_offer` DISABLE KEYS */;
INSERT INTO `property_offer` VALUES (1,'Sale',NULL,NULL),(2,'Rent',NULL,NULL),(3,'Sale & Rent',NULL,NULL),(4,'Special Offer',NULL,NULL);
/*!40000 ALTER TABLE `property_offer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_types`
--

DROP TABLE IF EXISTS `property_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ui_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_types`
--

LOCK TABLES `property_types` WRITE;
/*!40000 ALTER TABLE `property_types` DISABLE KEYS */;
INSERT INTO `property_types` VALUES (1,'House','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th','#755eb5',NULL,'2018-10-18 11:29:54'),(2,'Flat','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th','#FF0000',NULL,NULL),(3,'Villa','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th','#1a4f54',NULL,'2018-10-18 06:02:25'),(4,'Land/Lot','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th','#FF0000',NULL,NULL),(5,'Vineyard/Olive','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th','#FF0000',NULL,NULL),(6,'Farm','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th','#FF0000',NULL,NULL),(7,'Rustico/Country House','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th','#FF0000',NULL,NULL),(8,'Commercial','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th','#FF0000',NULL,NULL);
/*!40000 ALTER TABLE `property_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `region_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,'Liguria','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',NULL,NULL),(2,'Piemonte','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',NULL,NULL),(3,'Calabria','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',NULL,NULL),(4,'Puglia','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',NULL,NULL),(5,'Toscana','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',NULL,NULL),(6,'Campania','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',NULL,NULL),(7,'Marche','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',NULL,NULL),(8,'Lazio','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',NULL,NULL),(9,'Veneto','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',NULL,NULL),(10,'Umbria','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',NULL,NULL),(11,'Abruzzo','galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also th',NULL,NULL);
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2018-10-18 03:35:29','2018-10-18 03:35:29'),(2,'user','web','2018-10-18 03:35:29','2018-10-18 03:35:29');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `default_vat` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,33.00,'2018-10-20 22:28:55','2018-10-20 22:36:05');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'sdsdsd','sdsd','1539973855.jpg','2018-10-19 13:00:54','2018-10-19 13:00:54');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com','Active','$2y$10$1eRkuf8GOIon/KAmR/t7Be/qVt5RFiLIU5N3eBTdmFJTASMHBmV5e','OQ4SJYTepHnEaMbN6lK7DXhhrGkNdVqdUJT59bWHghPVTjDr1zyoMtB2luQY','2018-10-18 03:35:29','2018-10-18 03:35:29'),(2,'Mahantesh Kumbar','user@user.com','Active','$2y$10$zbJtR0S0kv8w7KDMkodWn.cPENPOTid5JSquwOk1U4LKyDxn.74AG',NULL,'2018-10-18 03:35:29','2018-10-18 03:35:29'),(3,'Mahantesh Kumbar','user@gmail.com','Active','$2y$10$M1bG0/yDs0Cahh.N7OGlvOtN6kHbiSk0OZ/bJXrludZbONK9DgPGq',NULL,'2018-10-18 03:35:29','2018-10-18 03:35:29');
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

-- Dump completed on 2018-10-21 13:39:54

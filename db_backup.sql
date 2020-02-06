-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: homestead
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `idProduct` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`idProduct`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,'2019-03-01',3),(2,'2019-03-01',3),(3,'2019-03-01',7),(4,'2019-03-01',8),(5,'2019-03-01',10),(6,'2019-03-01',15),(7,'2019-03-01',26),(8,'2019-03-01',11),(9,'2019-03-01',1),(10,'2019-03-01',8),(11,'2019-03-01',7),(12,'2019-03-01',8),(13,'2019-03-01',2),(14,'2019-03-01',1),(15,'2019-03-01',1),(16,'2019-03-01',9),(17,'2019-03-01',17),(18,'2019-03-01',8),(19,'2019-03-01',9),(20,'2019-03-01',9),(21,'2019-03-01',3),(22,'2019-03-01',6),(23,'2019-03-01',9),(24,'2019-03-01',9),(25,'2019-03-01',10),(26,'2019-03-01',40),(27,'2019-03-01',2),(28,'2019-03-01',3),(29,'2019-03-01',2),(30,'2019-03-01',1),(31,'2019-03-01',9),(32,'2019-03-01',10),(33,'2019-03-01',2),(34,'2019-03-01',3),(35,'2019-03-01',3),(36,'2019-03-01',6);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2020_02_02_001049_create_inventory_table',1),(3,'2020_02_02_001346_create_providers_table',1),(4,'2020_02_02_001532_create_orders_table',1),(5,'2020_02_02_025828_create_order_products_table',1),(6,'2020_02_02_025904_create_providers_products_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderProducts`
--

DROP TABLE IF EXISTS `orderProducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderProducts` (
  `idProduct` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `idOrder` bigint(20) unsigned NOT NULL,
  KEY `orderproducts_idorder_foreign` (`idOrder`),
  CONSTRAINT `orderproducts_idorder_foreign` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`idOrder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderProducts`
--

LOCK TABLES `orderProducts` WRITE;
/*!40000 ALTER TABLE `orderProducts` DISABLE KEYS */;
INSERT INTO `orderProducts` VALUES (1,'Leche',1,1),(2,'Huevos',21,1),(37,'Pan Bimbo',7,1),(3,'Manzana Verde',10,1),(4,'Pepino Cohombro',5,1),(5,'Pimentón Rojo',100,2),(6,'Kiwi',60,2),(7,'Cebolla Cabezona Blanca Limpia',4,3),(8,'Habichuela',3,3),(9,'Mango Tommy Maduro',4,3),(10,'Tomate Chonto Pintón',8,3),(11,'Zanahoria Grande',5,3),(12,'Aguacate Maduro',3,4),(13,'Kale o Col Rizada',2,4),(14,'Cebolla Cabezona Roja Limpia',4,4),(4,'Pepino Cohombro',2,4),(15,'Tomate Chonto Maduro',3,4),(16,'Acelga',1500,5),(17,'Espinaca Bogotana x 500grs',2,6),(18,'Ahuyama',3,6),(15,'Tomate Chonto Maduro',2,6),(19,'Cebolla Cabezona Blanca Sin Pelar',2,6),(20,'Melón',3,6),(21,'Cebolla Cabezona Roja Sin Pelar',3,7),(22,'Cebolla Larga Junca x 500grs',2,7),(23,'Hierbabuena x 500grs',2,7),(39,'Lechuga Crespa Morada',4,7),(24,'Lechuga Crespa Verde',15,7),(25,'Limón Tahití',3,8),(26,'Mora de Castilla',2,8),(22,'Cebolla Larga Junca x 500grs',4,8),(27,'Pimentón Verde',1,8),(5,'Pimentón Rojo',1,8),(22,'Cebolla Larga Junca x 500grs',1,9),(28,'Tomate Larga Vida Maduro',1,15),(7,'Cebolla Cabezona Blanca Limpia',1,10),(41,'Banano',1,11),(19,'Cebolla Cabezona Blanca Sin Pelar',6,11),(29,'Cilantro x 500grs',1,11),(17,'Espinaca Bogotana x 500grs',1,11),(30,'Fresa Jugo',1,11),(7,'Cebolla Cabezona Blanca Limpia',1,12),(25,'Limón Tahití',2,12),(5,'Pimentón Rojo',1,12),(31,'Papa R-12 Mediana',25,12),(43,'Banano',1,13),(30,'Fresa Jugo',1,13),(32,'Curuba ',1,13),(33,'Brócoli',1,13),(28,'Tomate Larga Vida Maduro',2,13),(16,'Acelga',3,14),(34,'Aguacate Hass Pintón',3,14),(35,'Aguacate Hass Maduro ',3,14),(12,'Aguacate Maduro',1,14),(36,'Aguacate Pintón',1,14);
/*!40000 ALTER TABLE `orderProducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `idOrder` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `priority` int(11) NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idOrder`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,'KR 14 # 87 - 20 ','Sofia'),(2,1,'KR 20 # 164A - 5 ','Angel'),(3,3,'KR 13 # 74 - 38 ','Hocks'),(4,1,'CL 93 # 12 - 9 ','Michael'),(5,1,'CL 71 # 3 - 74 ','Bar de Alex'),(6,2,'KR 20 # 134A - 5 ','Sabor Criollo'),(7,2,'CL 80 # 14 - 38 ','El Pollo Rojo'),(8,7,'KR 14 # 98 - 74 ','All Salad'),(9,1,'KR 58 # 93 - 1 ','Parrilla y sabor'),(10,1,'CL 93B # 17 - 12 ','restaurante yerbabuena '),(11,10,'KR 68D # 98A - 11 ','Luis David'),(12,2,'AC 72 # 20 - 45 ','David Carruyo'),(13,3,'KR 22 # 122 - 57 ','MARIO'),(14,8,'KR 88 # 72A - 26 ','Harold'),(15,9,'KR 14 # 87 - 20 ','Sofia');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `providers`
--

DROP TABLE IF EXISTS `providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `providers` (
  `idProvider` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idProvider`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `providers`
--

LOCK TABLES `providers` WRITE;
/*!40000 ALTER TABLE `providers` DISABLE KEYS */;
INSERT INTO `providers` VALUES (1,'Ruby',NULL,NULL),(2,'Raul',NULL,NULL),(3,'Angelica',NULL,NULL);
/*!40000 ALTER TABLE `providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `providersProducts`
--

DROP TABLE IF EXISTS `providersProducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `providersProducts` (
  `idProvider` bigint(20) unsigned NOT NULL,
  `idProduct` int(11) NOT NULL,
  KEY `providersproducts_idprovider_foreign` (`idProvider`),
  CONSTRAINT `providersproducts_idprovider_foreign` FOREIGN KEY (`idProvider`) REFERENCES `providers` (`idProvider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `providersProducts`
--

LOCK TABLES `providersProducts` WRITE;
/*!40000 ALTER TABLE `providersProducts` DISABLE KEYS */;
INSERT INTO `providersProducts` VALUES (1,1),(1,2),(1,45),(1,3),(1,4),(1,5),(1,46),(1,24),(1,25),(1,26),(1,27),(2,28),(2,47),(2,29),(2,30),(2,31),(2,32),(2,33),(2,34),(2,35),(2,36),(2,16),(2,17),(3,6),(3,7),(3,8),(3,9),(3,10),(3,11),(3,12),(3,13),(3,14),(3,15),(3,18),(3,19),(3,20),(3,21),(3,22),(3,23);
/*!40000 ALTER TABLE `providersProducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `idUser` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `users_username_unique` (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2020-02-06 23:40:49

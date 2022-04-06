-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: falcon
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addresses_types`
--

DROP TABLE IF EXISTS `addresses_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `addresses_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `addressName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses_types`
--

LOCK TABLES `addresses_types` WRITE;
/*!40000 ALTER TABLE `addresses_types` DISABLE KEYS */;
INSERT INTO `addresses_types` VALUES (1,'Appartment/Condo'),(2,'Commerical Property'),(3,'Pay Parking Lot'),(4,'Residental Home'),(5,'Other');
/*!40000 ALTER TABLE `addresses_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alert`
--

DROP TABLE IF EXISTS `alert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alert` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_id` int NOT NULL,
  `minimumIssuesCreatedPerHour` int DEFAULT NULL,
  `weekTimes` text,
  PRIMARY KEY (`id`),
  KEY `fk_alert_property1_idx` (`property_id`),
  CONSTRAINT `fk_alert_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alert`
--

LOCK TABLES `alert` WRITE;
/*!40000 ALTER TABLE `alert` DISABLE KEYS */;
INSERT INTO `alert` VALUES (1,1,3,'{\"sun\":{\"1:00\":0,\"2:00\":0,\"3:00\":0,\"4:00\":0,\"5:00\":0,\"6:00\":0,\"7:00\":0,\"8:00\":0,\"9:00\":0,\"10:00\":0,\"11:00\":0,\"12:00\":0,\"13:00\":0,\"14:00\":0,\"15:00\":0,\"16:00\":0,\"17:00\":0,\"18:00\":0,\"19:00\":0,\"20:00\":0,\"21:00\":0,\"22:00\":0,\"23:00\":0,\"24:00\":0},\"mon\":{\"1:00\":0,\"2:00\":0,\"3:00\":0,\"4:00\":0,\"5:00\":0,\"6:00\":0,\"7:00\":0,\"8:00\":0,\"9:00\":0,\"10:00\":0,\"11:00\":0,\"12:00\":0,\"13:00\":0,\"14:00\":0,\"15:00\":0,\"16:00\":0,\"17:00\":0,\"18:00\":0,\"19:00\":0,\"20:00\":0,\"21:00\":0,\"22:00\":0,\"23:00\":0,\"24:00\":0},\"tue\":{\"1:00\":0,\"2:00\":0,\"3:00\":0,\"4:00\":0,\"5:00\":0,\"6:00\":0,\"7:00\":0,\"8:00\":0,\"9:00\":0,\"10:00\":0,\"11:00\":0,\"12:00\":0,\"13:00\":0,\"14:00\":0,\"15:00\":0,\"16:00\":0,\"17:00\":0,\"18:00\":0,\"19:00\":0,\"20:00\":0,\"21:00\":0,\"22:00\":0,\"23:00\":0,\"24:00\":0},\"wed\":{\"1:00\":0,\"2:00\":0,\"3:00\":0,\"4:00\":0,\"5:00\":0,\"6:00\":0,\"7:00\":0,\"8:00\":0,\"9:00\":0,\"10:00\":0,\"11:00\":0,\"12:00\":0,\"13:00\":0,\"14:00\":0,\"15:00\":0,\"16:00\":0,\"17:00\":0,\"18:00\":0,\"19:00\":0,\"20:00\":0,\"21:00\":0,\"22:00\":0,\"23:00\":0,\"24:00\":0},\"thu\":{\"1:00\":0,\"2:00\":0,\"3:00\":0,\"4:00\":0,\"5:00\":0,\"6:00\":0,\"7:00\":0,\"8:00\":0,\"9:00\":0,\"10:00\":0,\"11:00\":0,\"12:00\":0,\"13:00\":0,\"14:00\":0,\"15:00\":0,\"16:00\":0,\"17:00\":0,\"18:00\":0,\"19:00\":0,\"20:00\":0,\"21:00\":0,\"22:00\":0,\"23:00\":0,\"24:00\":0},\"fri\":{\"1:00\":0,\"2:00\":0,\"3:00\":0,\"4:00\":0,\"5:00\":0,\"6:00\":0,\"7:00\":0,\"8:00\":0,\"9:00\":0,\"10:00\":0,\"11:00\":0,\"12:00\":0,\"13:00\":0,\"14:00\":0,\"15:00\":0,\"16:00\":0,\"17:00\":0,\"18:00\":0,\"19:00\":0,\"20:00\":0,\"21:00\":0,\"22:00\":0,\"23:00\":0,\"24:00\":0},\"sat\":{\"1:00\":0,\"2:00\":0,\"3:00\":0,\"4:00\":0,\"5:00\":0,\"6:00\":0,\"7:00\":0,\"8:00\":0,\"9:00\":0,\"10:00\":0,\"11:00\":0,\"12:00\":0,\"13:00\":0,\"14:00\":0,\"15:00\":0,\"16:00\":0,\"17:00\":0,\"18:00\":0,\"19:00\":0,\"20:00\":0,\"21:00\":0,\"22:00\":0,\"23:00\":0,\"24:00\":0}}');
/*!40000 ALTER TABLE `alert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients_companies`
--

DROP TABLE IF EXISTS `clients_companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients_companies` (
  `client_company_id` int NOT NULL AUTO_INCREMENT,
  `companyName` varchar(45) DEFAULT NULL,
  `webAddress` varchar(45) DEFAULT NULL,
  `notes` text,
  `streetNumber` varchar(45) DEFAULT NULL,
  `streetName` varchar(45) DEFAULT NULL,
  `streetType` varchar(45) DEFAULT NULL,
  `street_types_id` int NOT NULL,
  `city` varchar(45) DEFAULT NULL,
  `states_id` int NOT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `buildingNumber` varchar(45) DEFAULT NULL,
  `mainPhone` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`client_company_id`),
  KEY `fk_clients_companies_street_types1_idx` (`street_types_id`),
  KEY `fk_clients_companies_states1_idx` (`states_id`),
  CONSTRAINT `fk_clients_companies_states1` FOREIGN KEY (`states_id`) REFERENCES `states` (`id`),
  CONSTRAINT `fk_clients_companies_street_types1` FOREIGN KEY (`street_types_id`) REFERENCES `street_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients_companies`
--

LOCK TABLES `clients_companies` WRITE;
/*!40000 ALTER TABLE `clients_companies` DISABLE KEYS */;
INSERT INTO `clients_companies` VALUES (1,'BlueWater','bluewater.com','good company','4554','salim street','hill',1,'Austin',43,'4443','12','0300025544',NULL),(19,'NEw comp.','www.newcomp.com','last company for this week','4511','las vegas','hill',1,'husten',41,'34433','332','22331','054665442'),(20,'NEw comp.','www.newcomp.com','last company for this week','4511','las vegas','hill',1,'husten',41,'34433','332','22331','054665442'),(21,'NEw comp.','www.newcomp.com','last company for this week','4511','las vegas','hill',1,'husten',41,'34433','332','22331','054665442'),(22,'NEw comp.','www.newcomp.com','last company for this week','4511','las vegas','hill',1,'husten',41,'34433','332','22331','054665442'),(23,'NEw comp.','www.newcomp.com','last company for this week','4511','las vegas','hill',1,'husten',41,'34433','332','22331','054665442'),(24,'NEw comp.','www.newcomp.com','last company for this week','4511','las vegas','hill',1,'husten',41,'34433','332','22331','054665442'),(25,'NEw comp.','www.newcomp.com','last company for this week','4511','las vegas','hill',1,'husten',41,'34433','332','22331','054665442');
/*!40000 ALTER TABLE `clients_companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients_companies_has_customers`
--

DROP TABLE IF EXISTS `clients_companies_has_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients_companies_has_customers` (
  `clients_companies_id` int NOT NULL,
  `customers_id` int NOT NULL,
  PRIMARY KEY (`clients_companies_id`,`customers_id`),
  KEY `fk_clients_companies_has_customers_customers1_idx` (`customers_id`),
  KEY `fk_clients_companies_has_customers_clients_companies1_idx` (`clients_companies_id`),
  CONSTRAINT `fk_clients_companies_has_customers_clients_companies1` FOREIGN KEY (`clients_companies_id`) REFERENCES `clients_companies` (`client_company_id`),
  CONSTRAINT `fk_clients_companies_has_customers_customers1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients_companies_has_customers`
--

LOCK TABLES `clients_companies_has_customers` WRITE;
/*!40000 ALTER TABLE `clients_companies_has_customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients_companies_has_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients_companies_has_employees`
--

DROP TABLE IF EXISTS `clients_companies_has_employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients_companies_has_employees` (
  `clients_companies_id` int NOT NULL,
  `employees_id` int NOT NULL,
  PRIMARY KEY (`clients_companies_id`,`employees_id`),
  KEY `fk_clients_companies_has_employees_employees1_idx` (`employees_id`),
  KEY `fk_clients_companies_has_employees_clients_companies1_idx` (`clients_companies_id`),
  CONSTRAINT `fk_clients_companies_has_employees_clients_companies1` FOREIGN KEY (`clients_companies_id`) REFERENCES `clients_companies` (`client_company_id`),
  CONSTRAINT `fk_clients_companies_has_employees_employees1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients_companies_has_employees`
--

LOCK TABLES `clients_companies_has_employees` WRITE;
/*!40000 ALTER TABLE `clients_companies_has_employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients_companies_has_employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_roles`
--

DROP TABLE IF EXISTS `customer_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `webAccess` tinyint DEFAULT NULL,
  `mobileLogin` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_roles`
--

LOCK TABLES `customer_roles` WRITE;
/*!40000 ALTER TABLE `customer_roles` DISABLE KEYS */;
INSERT INTO `customer_roles` VALUES (1,'Single Property Manager',1,0),(2,'Managment Company User',1,0),(3,'Maintinance Supervisor',1,0),(4,'Maintinance Wroker',1,0);
/*!40000 ALTER TABLE `customer_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `emailAddress` varchar(45) DEFAULT NULL,
  `userName` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `active` tinyint DEFAULT NULL,
  `maintananceEmail` varchar(45) DEFAULT NULL,
  `timeCardID` varchar(45) DEFAULT NULL,
  `cellNumber` varchar(45) DEFAULT NULL,
  `phoneNumber` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `states_id` int DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `allowSecurityAssignments` tinyint DEFAULT NULL,
  `allowParkingAssignments` tinyint DEFAULT NULL,
  `allowMaintenanceAssignments` tinyint DEFAULT NULL,
  `allowUserToviewGPSData` tinyint DEFAULT NULL,
  `allowEmails` tinyint DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `lastLoginDate` datetime DEFAULT NULL,
  `managmentCompany` int DEFAULT NULL,
  `users_notification_id` int DEFAULT NULL,
  `customer_roles_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_states1_idx` (`states_id`),
  KEY `fk_employees_clients_companies1_idx` (`managmentCompany`),
  KEY `fk_employees_users_notification1_idx` (`users_notification_id`),
  KEY `fk_customers_customer_roles1_idx` (`customer_roles_id`),
  CONSTRAINT `fk_customers_customer_roles1` FOREIGN KEY (`customer_roles_id`) REFERENCES `customer_roles` (`id`),
  CONSTRAINT `fk_employees_clients_companies10` FOREIGN KEY (`managmentCompany`) REFERENCES `clients_companies` (`client_company_id`),
  CONSTRAINT `fk_employees_users_notification10` FOREIGN KEY (`users_notification_id`) REFERENCES `users_notification` (`id`),
  CONSTRAINT `fk_users_states10` FOREIGN KEY (`states_id`) REFERENCES `states` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'meer','bahez','mb@mb','meer','mmeerr',0,'mm@mm','2','077077098','674633','suly',1,'10005',1,0,0,1,1,'lklklk',NULL,1,1,1),(2,'customer1','cus','cust@test.com','customer','bulshit',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10,1),(3,'Ali','hamid','ali@maintinance.com','customer','bulshit',1,'customer@m.com','#22333','3233332','32423343','austin',41,'445334',1,1,1,1,1,NULL,NULL,NULL,NULL,1),(4,'Management co','user','cust@test.com','MCoUser','McoUpas',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,2),(5,'Ali','hamid','ali@maintinance.com','maintinanceali','alimaintinance',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,3),(6,'maintinance','supervisro','m@maintinance.com','supermaintinance','maintinancepass',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,13,4);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `devices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` tinyint DEFAULT NULL,
  `registered` varchar(45) DEFAULT NULL,
  `last Login` varchar(45) DEFAULT NULL,
  `phoneNumber` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `deviceID` varchar(255) DEFAULT NULL,
  `carrierName` varchar(45) DEFAULT NULL,
  `activationHistory` varchar(45) DEFAULT NULL,
  `friendlyName` varchar(45) DEFAULT NULL,
  `userZebraPrinter` tinyint DEFAULT NULL,
  `requireGPS` tinyint DEFAULT NULL,
  `userAutoFocus` tinyint DEFAULT NULL,
  `barcodeScanner` tinyint DEFAULT NULL,
  `active` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devices`
--

LOCK TABLES `devices` WRITE;
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
INSERT INTO `devices` VALUES (6,1,NULL,NULL,'098765678',NULL,NULL,NULL,NULL,'New Friendly',1,0,1,1,1),(7,0,NULL,NULL,'098765678',NULL,NULL,NULL,NULL,NULL,0,1,1,1,1),(8,0,NULL,NULL,'098765678',NULL,NULL,NULL,NULL,NULL,0,1,1,1,1),(9,0,NULL,NULL,'098765678',NULL,NULL,NULL,NULL,NULL,0,1,1,1,1),(10,0,NULL,NULL,'098765678',NULL,NULL,NULL,NULL,NULL,0,1,1,1,1);
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fromEmailAddressNewOrder` varchar(45) DEFAULT NULL,
  `fromEmailAddressNewIssue` varchar(45) DEFAULT NULL,
  `fromEmailAddressAppeals` varchar(45) DEFAULT NULL,
  `SystemEmailNotification` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` VALUES (1,'mail1@mail.com','emails2@gmail.com','email3@hotmail.com','email4@yahoo.com'),(2,'mail1@mail.com','emails2@gmail.com','email3@hotmail.com','email4@yahoo.com'),(3,'mail1@mail.com','emails2@gmail.com','email3@hotmail.com','email4@yahoo.com'),(4,'mail1@mail.com','emails2@gmail.com','email3@hotmail.com','email4@yahoo.com'),(5,'mail1@mail.com','emails2@gmail.com','email3@hotmail.com','email4@yahoo.com'),(6,'mail1@mail.com','emails2@gmail.com','email3@hotmail.com','email4@yahoo.com'),(7,'mail1@mail.com','emails2@gmail.com','email3@hotmail.com','email4@yahoo.com'),(8,'mail1@mail.com','emails2@gmail.com','email3@hotmail.com','email4@yahoo.com'),(9,'mail1@mail.com','emails2@gmail.com','email3@hotmail.com','email4@yahoo.com'),(10,'mail1@mail.com','emails2@gmail.com','email3@hotmail.com','email4@yahoo.com');
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_attachment`
--

DROP TABLE IF EXISTS `email_attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email_attachment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email_id` int DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email_id` (`email_id`),
  CONSTRAINT `email_attachment_ibfk_1` FOREIGN KEY (`email_id`) REFERENCES `email_history` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_attachment`
--

LOCK TABLES `email_attachment` WRITE;
/*!40000 ALTER TABLE `email_attachment` DISABLE KEYS */;
/*!40000 ALTER TABLE `email_attachment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_history`
--

DROP TABLE IF EXISTS `email_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `from_email` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `header` text,
  `body` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_history`
--

LOCK TABLES `email_history` WRITE;
/*!40000 ALTER TABLE `email_history` DISABLE KEYS */;
INSERT INTO `email_history` VALUES (1,'maytham','any','asdfasfd','asdfasfd'),(2,'m@m.com',' x@x.com','title','body'),(3,'m@m.com',' x@x.com','title','body'),(4,'m@m.com',' x@x.com','title','body'),(5,'m@m.com',' x@x.com','title','body'),(6,'m@m.com',' x@x.com','title','body'),(7,'m@m.com',' x@x.com','title','body'),(8,'m@m.com',' x@x.com','title','body'),(9,'m@m.com',' x@x.com','title','body'),(10,'m@m.com',' x@x.com','title','body'),(11,'m@m.com',' x@x.com','title','body'),(12,'m@m.com',' x@x.com','title','body'),(13,'m@m.com',' x@x.com','title','body'),(14,'m@m.com',' x@x.com','title','body'),(15,'m@m.com',' x@x.com','title','body'),(16,'m@m.com',' x@x.com','title','body'),(17,'m@m.com',' x@x.com','title','body'),(18,'m@m.com',' x@x.com','title','body'),(19,'m@m.com',' x@x.com','title','body'),(20,'m@m.com',' x@x.com','title','body'),(21,'m@m.com',' x@x.com','title','body'),(22,'m@m.com',' x@x.com','title','body'),(23,'m@m.com',' x@x.com','title','body'),(24,'m@m.com',' x@x.com','title','body'),(25,'m@m.com',' x@x.com','title','body'),(26,'m@m.com',' x@x.com','title','body'),(27,'m@m.com',' x@x.com','title','body'),(28,'m@m.com',' x@x.com','title','body'),(29,'m@m.com',' x@x.com','title','body'),(30,'m@m.com',' x@x.com','title','body'),(31,'m@m.com',' x@x.com','title','body'),(32,'m@m.com',' x@x.com','title','body'),(33,'m@m.com',' x@x.com','title','body'),(34,'m@m.com',' x@x.com','title','body'),(35,'m@m.com',' x@x.com','title','body'),(36,'m@m.com',' x@x.com','title','body'),(37,'m@m.com',' x@x.com','title','body'),(38,'m@m.com',' x@x.com','title','body'),(39,'m@m.com',' x@x.com','title','body'),(40,'m@m.com',' x@x.com','title','body'),(41,'m@m.com',' x@x.com','title','body'),(42,'m@m.com',' x@x.com','title','body'),(43,'m@m.com',' x@x.com','title','body'),(44,'m@m.com',' x@x.com','title','body'),(45,'m@m.com',' x@x.com','title','body'),(46,'m@m.com',' x@x.com','title','body'),(47,'m@m.com',' x@x.com','title','body'),(48,'m@m.com',' x@x.com','title','body'),(49,'m@m.com',' x@x.com','title','body'),(50,'m@m.com',' x@x.com','title','body'),(51,'m@m.com',' x@x.com','title','body'),(52,'m@m.com',' x@x.com','title','body'),(53,'m@m.com',' x@x.com','title','body'),(54,'m@m.com',' x@x.com','title','body'),(55,'m@m.com',' x@x.com','title','body'),(56,'m@m.com',' x@x.com','title','body'),(57,'m@m.com',' x@x.com','title','body'),(58,'m@m.com',' x@x.com','title','body'),(59,'m@m.com',' x@x.com','title','body'),(60,'m@m.com',' x@x.com','title','body'),(61,'m@m.com',' x@x.com','title','body'),(62,'m@m.com',' x@x.com','title','body'),(63,'m@m.com',' x@x.com','title','body'),(64,'m@m.com',' x@x.com','title','body'),(65,'m@m.com',' x@x.com','title','body'),(66,'m@m.com',' x@x.com','title','body'),(67,'m@m.com',' x@x.com','title','body'),(68,'m@m.com',' x@x.com','title','body'),(69,'m@m.com',' x@x.com','title','body'),(70,'m@m.com',' x@x.com','title','body'),(71,'m@m.com',' x@x.com','title','body'),(72,'m@m.com',' x@x.com','title','body'),(73,'m@m.com',' x@x.com','title','body'),(74,'m@m.com',' x@x.com','title','body'),(75,'m@m.com',' x@x.com','title','body'),(76,'m@m.com',' x@x.com','title','body'),(77,'m@m.com',' x@x.com','title','body'),(78,'m@m.com',' x@x.com','title','body'),(79,'m@m.com',' x@x.com','title','body'),(80,'m@m.com',' x@x.com','title','body'),(81,'m@m.com',' x@x.com','title','body'),(82,'m@m.com',' x@x.com','title','body'),(83,'m@m.com',' x@x.com','title','body'),(84,'m@m.com',' x@x.com','title','body'),(85,'m@m.com',' x@x.com','title','body'),(86,'m@m.com',' x@x.com','title','body'),(87,'m@m.com',' x@x.com','title','body'),(88,'m@m.com',' x@x.com','title','body'),(89,'m@m.com',' x@x.com','title','body'),(90,'m@m.com',' x@x.com','title','body');
/*!40000 ALTER TABLE `email_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_roles`
--

DROP TABLE IF EXISTS `employee_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_roles` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `webAccess` tinyint DEFAULT NULL,
  `mobileLogin` tinyint DEFAULT NULL,
  `lockProperty` tinyint DEFAULT NULL,
  `addUsers` tinyint DEFAULT NULL,
  `submitIssue` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_roles`
--

LOCK TABLES `employee_roles` WRITE;
/*!40000 ALTER TABLE `employee_roles` DISABLE KEYS */;
INSERT INTO `employee_roles` VALUES (1,'admin',1,0,1,1,1),(2,'dispacher',1,0,1,1,1),(3,'supervisor',1,0,1,1,1),(4,'gaurd',0,1,0,0,1);
/*!40000 ALTER TABLE `employee_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `emailAddress` varchar(45) DEFAULT NULL,
  `userName` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `active` tinyint DEFAULT NULL,
  `maintananceEmail` varchar(45) DEFAULT NULL,
  `timeCardID` varchar(45) DEFAULT NULL,
  `cellNumber` varchar(45) DEFAULT NULL,
  `phoneNumber` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `states_id` int DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `allowSecurityAssignments` tinyint DEFAULT NULL,
  `allowParkingAssignments` tinyint DEFAULT NULL,
  `allowMaintenanceAssignments` tinyint DEFAULT NULL,
  `allowUserToviewGPSData` tinyint DEFAULT NULL,
  `allowEmails` tinyint DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `lastLoginDate` datetime DEFAULT NULL,
  `managmentCompany` int DEFAULT NULL,
  `employee_roles_id` int DEFAULT NULL,
  `users_notification_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_states1_idx` (`states_id`),
  KEY `fk_employees_clients_companies1_idx` (`managmentCompany`),
  KEY `fk_employees_employee_roles1_idx` (`employee_roles_id`),
  KEY `fk_employees_users_notification1_idx` (`users_notification_id`),
  CONSTRAINT `fk_employees_clients_companies1` FOREIGN KEY (`managmentCompany`) REFERENCES `clients_companies` (`client_company_id`),
  CONSTRAINT `fk_employees_employee_roles1` FOREIGN KEY (`employee_roles_id`) REFERENCES `employee_roles` (`id`),
  CONSTRAINT `fk_employees_users_notification1` FOREIGN KEY (`users_notification_id`) REFERENCES `users_notification` (`id`),
  CONSTRAINT `fk_users_states1` FOREIGN KEY (`states_id`) REFERENCES `states` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'f name','last name','mail','alan','pass',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'../uploads/IMG_20211006_122857.jpg',NULL,NULL,1,NULL),(11,'Mohammed','Hazim','Mohammed@hazim.com','mo','mo',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,2),(13,'n admin','n ad','ad@hazim.com','admin','adm',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,3),(14,'v admin','n ad','ad@hazim.com','admin2','adm',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'../uploads/IMG_20211005_051534.jpg',NULL,NULL,1,4),(15,'withdir','withdir','w@test.com','testadmin','admintest',1,'maintinanceEmail@m.com','#er33','07755344','07456666366','austin',41,'445334',1,1,1,1,1,NULL,NULL,NULL,1,NULL),(16,'withdir','withdir','w@test.com','awithdir','dirdir',1,'maintinanceEmail@m.com','#er33','07755344','07456666366','austin',41,'445334',1,1,1,1,1,NULL,NULL,NULL,1,5),(17,'withdir','withdir','w@test.com','awithdir2','dirdir',1,'maintinanceEmail@m.com','#er33','07755344','07456666366','austin',41,'445334',1,1,1,1,1,'../uploads/users/employees/172021-04-18.jpg',NULL,NULL,1,6),(18,'dispacher','test','dispacher@test.com','dispacher','dispacher',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,7),(19,'supervisor','test','super@test.com','superman','bulshit',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,8),(20,'gurard','test','super@test.com','guardSlave','bulshit',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,9);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `general`
--

DROP TABLE IF EXISTS `general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `general` (
  `id` int NOT NULL AUTO_INCREMENT,
  `localUrl` varchar(45) DEFAULT NULL,
  `hideHomePageMenuBar` tinyint DEFAULT NULL,
  `homePageMenuLinkName` varchar(45) DEFAULT NULL,
  `returnURLonLogout` varchar(45) DEFAULT NULL,
  `dispachPhoneNumber` varchar(45) DEFAULT NULL,
  `dispachPhoenNumberGuards` varchar(45) DEFAULT NULL,
  `timeZone` varchar(45) DEFAULT NULL,
  `contactCompanyName` varchar(45) DEFAULT NULL,
  `contactAddress` varchar(200) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `states_id` int NOT NULL,
  `zip` int DEFAULT NULL,
  `contactEmail` varchar(45) DEFAULT NULL,
  `contactPhoneNumber` varchar(45) DEFAULT NULL,
  `handheldPhotoTimestampText` varchar(45) DEFAULT NULL,
  `renderHomePageAsHTMLMarkup` tinyint DEFAULT NULL,
  `IncludeArrivals/DeparturesInDAR` tinyint DEFAULT NULL,
  `HomePageMessage` text,
  `MobileDeviceLoginMessage` varchar(45) DEFAULT NULL,
  `hideDropDownCitySelector` tinyint DEFAULT NULL,
  `propertyFindExampleText` text,
  `externalUrlLinks` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general`
--

LOCK TABLES `general` WRITE;
/*!40000 ALTER TABLE `general` DISABLE KEYS */;
INSERT INTO `general` VALUES (34,'user.falcontrac.net',1,'HP Menue N','user.falcontrac.com/logout','098721938','200300324','+1 GMT','user co name','address','austin',1,12344,'user@mail.com','09870977','photo by user co',0,1,'Welcome to to user co','mobilelogin message',0,'find property','https://hjuzati.com https;//falcontrac.com'),(35,'user.falcontrac.net',1,'HP Menue N','user.falcontrac.com/logout','098721938','200300324','+1 GMT','user co name','address','austin',1,12344,'user@mail.com','09870977','photo by user co',0,1,'Welcome to to user co','mobilelogin message',0,'find property','https://hjuzati.com https;//falcontrac.com'),(36,'user.falcontrac.net',1,'HP Menue N','user.falcontrac.com/logout','098721938','200300324','+1 GMT','user co name','address','austin',1,12344,'user@mail.com','09870977','photo by user co',0,1,'Welcome to to user co','mobilelogin message',0,'find property','https://hjuzati.com https;//falcontrac.com'),(37,'user.falcontrac.net',1,'HP Menue N','user.falcontrac.com/logout','098721938','200300324','+1 GMT','user co name','address','austin',1,12344,'user@mail.com','09870977','photo by user co',0,1,'Welcome to to user co','mobilelogin message',0,'find property','https://hjuzati.com https;//falcontrac.com'),(38,'user.falcontrac.net',1,'HP Menue N','user.falcontrac.com/logout','098721938','200300324','+1 GMT','user co name','address','austin',1,12344,'user@mail.com','09870977','photo by user co',0,1,'Welcome to to user co','mobilelogin message',0,'find property','https://hjuzati.com https;//falcontrac.com'),(39,'user.falcontrac.net',1,'HP Menue N','user.falcontrac.com/logout','098721938','200300324','+1 GMT','user co name','address','austin',1,12344,'user@mail.com','09870977','photo by user co',0,1,'Welcome to to user co','mobilelogin message',0,'find property','https://hjuzati.com https;//falcontrac.com'),(40,'user.falcontrac.net',1,'HP Menue N','user.falcontrac.com/logout','098721938','200300324','+1 GMT','user co name','address','austin',1,12344,'user@mail.com','09870977','photo by user co',0,1,'Welcome to to user co','mobilelogin message',0,'find property','https://hjuzati.com https;//falcontrac.com'),(41,'user.falcontrac.net',1,'HP Menue N','user.falcontrac.com/logout','098721938','200300324','+1 GMT','user co name','address','austin',1,12344,'user@mail.com','09870977','photo by user co',0,1,'Welcome to to user co','mobilelogin message',0,'find property','https://hjuzati.com https;//falcontrac.com');
/*!40000 ALTER TABLE `general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_has_properties`
--

DROP TABLE IF EXISTS `group_has_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `group_has_properties` (
  `property_id` int NOT NULL,
  `property_group_id` int NOT NULL,
  PRIMARY KEY (`property_id`,`property_group_id`),
  KEY `fk_property_group_has_property_property1_idx` (`property_id`),
  KEY `fk_property_group_has_property_property_group1_idx` (`property_group_id`),
  CONSTRAINT `fk_property_group_has_property_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`),
  CONSTRAINT `fk_property_group_has_property_property_group1` FOREIGN KEY (`property_group_id`) REFERENCES `property_group` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_has_properties`
--

LOCK TABLES `group_has_properties` WRITE;
/*!40000 ALTER TABLE `group_has_properties` DISABLE KEYS */;
INSERT INTO `group_has_properties` VALUES (19,1),(19,2),(19,3),(20,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1);
/*!40000 ALTER TABLE `group_has_properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issue_types`
--

DROP TABLE IF EXISTS `issue_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_types` (
  `issue_type_id` int NOT NULL AUTO_INCREMENT,
  `issueTypeName` varchar(45) DEFAULT NULL,
  `issueDescription` text,
  `issueFee` double DEFAULT NULL,
  `issueLevel` int NOT NULL,
  `issue_type` varchar(45) NOT NULL,
  `isActiveIssue` tinyint DEFAULT NULL,
  `displayForDispach` tinyint DEFAULT NULL,
  `displayOnHandheld` tinyint DEFAULT NULL,
  `displayForWebUsers` tinyint DEFAULT NULL,
  `autoCloseIssue` tinyint DEFAULT NULL,
  `restrictToCheckpointOnly` tinyint DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`issue_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issue_types`
--

LOCK TABLES `issue_types` WRITE;
/*!40000 ALTER TABLE `issue_types` DISABLE KEYS */;
INSERT INTO `issue_types` VALUES (1,'open door','Trying out update and generate',1.5,2,'Patrol',1,1,1,1,0,0,NULL,'2022-03-12 08:03:09'),(2,'Lights On','Observed turned on lights',3.55,3,'Patrol',1,1,1,1,0,0,NULL,NULL),(3,'firstAddedViaProg','firstTry',1.5,2,'Security',1,1,1,1,0,0,NULL,NULL),(4,'secondAddedViaProg','Trying for all properties',1.5,2,'Security',1,1,1,1,0,0,NULL,NULL),(5,'secondAddedViaProg','Trying for all properties',1.5,2,'Security',1,1,1,1,0,0,NULL,NULL);
/*!40000 ALTER TABLE `issue_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issues`
--

DROP TABLE IF EXISTS `issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issues` (
  `issue_id` int NOT NULL AUTO_INCREMENT,
  `properties_id` int NOT NULL,
  `issue_types_id` int NOT NULL,
  `reportedDetail` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `reportedAddress` varchar(45) DEFAULT NULL,
  `approxOccurrenceTime` varchar(45) DEFAULT NULL,
  `property_addresses_id` int NOT NULL,
  `status` tinyint DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `assigned` timestamp NULL DEFAULT NULL,
  `ack` timestamp NULL DEFAULT NULL,
  `arrived` timestamp NULL DEFAULT NULL,
  `closed` tinyint DEFAULT NULL,
  `createdBy` int NOT NULL,
  `assignedTo` int NOT NULL,
  `gpsLongitude` varchar(45) DEFAULT NULL,
  `gpsLatitude` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`issue_id`),
  KEY `fk_issues_properties1_idx` (`properties_id`),
  KEY `fk_issues_issue_types1_idx` (`issue_types_id`),
  KEY `fk_issues_property_addresses1_idx` (`property_addresses_id`),
  KEY `fk_issues_users1_idx` (`createdBy`),
  KEY `fk_issues_users2_idx` (`assignedTo`),
  CONSTRAINT `fk_issues_issue_types1` FOREIGN KEY (`issue_types_id`) REFERENCES `issue_types` (`issue_type_id`),
  CONSTRAINT `fk_issues_properties1` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`property_id`),
  CONSTRAINT `fk_issues_property_addresses1` FOREIGN KEY (`property_addresses_id`) REFERENCES `property_addresses` (`id`),
  CONSTRAINT `fk_issues_users1` FOREIGN KEY (`createdBy`) REFERENCES `employees` (`id`),
  CONSTRAINT `fk_issues_users2` FOREIGN KEY (`assignedTo`) REFERENCES `employees` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issues`
--

LOCK TABLES `issues` WRITE;
/*!40000 ALTER TABLE `issues` DISABLE KEYS */;
/*!40000 ALTER TABLE `issues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issues_photos`
--

DROP TABLE IF EXISTS `issues_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issues_photos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `issues_id` int NOT NULL,
  `photoURL` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_issues_photos_issues1_idx` (`issues_id`),
  CONSTRAINT `fk_issues_photos_issues1` FOREIGN KEY (`issues_id`) REFERENCES `issues` (`issue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issues_photos`
--

LOCK TABLES `issues_photos` WRITE;
/*!40000 ALTER TABLE `issues_photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `issues_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issues_sound`
--

DROP TABLE IF EXISTS `issues_sound`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issues_sound` (
  `id` int NOT NULL AUTO_INCREMENT,
  `issues_id` int NOT NULL,
  `soundURL` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_issues_sound_issues1_idx` (`issues_id`),
  CONSTRAINT `fk_issues_sound_issues1` FOREIGN KEY (`issues_id`) REFERENCES `issues` (`issue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issues_sound`
--

LOCK TABLES `issues_sound` WRITE;
/*!40000 ALTER TABLE `issues_sound` DISABLE KEYS */;
/*!40000 ALTER TABLE `issues_sound` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `locationName` varchar(45) DEFAULT NULL,
  `locationDescription` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_history`
--

DROP TABLE IF EXISTS `login_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `loginTimestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_history`
--

LOCK TABLES `login_history` WRITE;
/*!40000 ALTER TABLE `login_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logos`
--

DROP TABLE IF EXISTS `logos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mainPageLogo` varchar(45) DEFAULT NULL,
  `reportHeaderLogo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logos`
--

LOCK TABLES `logos` WRITE;
/*!40000 ALTER TABLE `logos` DISABLE KEYS */;
INSERT INTO `logos` VALUES (1,'../uploads/d1.jpg','../uploads/d2.jpg'),(2,'../uploads/Mohammed University ID.jpg','../uploads/Mohemmaed Id .jpg');
/*!40000 ALTER TABLE `logos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification` (
  `id` int NOT NULL,
  `users_id` int NOT NULL,
  `sendMeDailyMissedCheckpointReport` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notification_users1_idx` (`users_id`),
  CONSTRAINT `fk_notification_users1` FOREIGN KEY (`users_id`) REFERENCES `employees` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parking_setup`
--

DROP TABLE IF EXISTS `parking_setup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parking_setup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_id` int NOT NULL,
  `maximumPermitsPerUnit` int DEFAULT NULL,
  `permitSellCost` int DEFAULT NULL,
  `cash/checkPremitCode` varchar(45) DEFAULT NULL,
  `freePremitCode` varchar(45) DEFAULT NULL,
  `maxLengthInDaysTempPermit` varchar(45) DEFAULT NULL,
  `maxTempPermitsPerUnitPerMonth` int DEFAULT NULL,
  `parking_setupcol` int DEFAULT NULL,
  `sellParkingPermits` tinyint DEFAULT NULL,
  `userVirtualPermit` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parking_setup_property1_idx` (`property_id`),
  CONSTRAINT `fk_parking_setup_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parking_setup`
--

LOCK TABLES `parking_setup` WRITE;
/*!40000 ALTER TABLE `parking_setup` DISABLE KEYS */;
/*!40000 ALTER TABLE `parking_setup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parking_zones`
--

DROP TABLE IF EXISTS `parking_zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parking_zones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parking_setup_id` int NOT NULL,
  `parkingZoneName` varchar(45) DEFAULT NULL,
  `parkingZoneDescription` text,
  PRIMARY KEY (`id`),
  KEY `fk_parking_zones_parking_setup1_idx` (`parking_setup_id`),
  CONSTRAINT `fk_parking_zones_parking_setup1` FOREIGN KEY (`parking_setup_id`) REFERENCES `parking_setup` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parking_zones`
--

LOCK TABLES `parking_zones` WRITE;
/*!40000 ALTER TABLE `parking_zones` DISABLE KEYS */;
/*!40000 ALTER TABLE `parking_zones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phone_numbers`
--

DROP TABLE IF EXISTS `phone_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phone_numbers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_id` int NOT NULL,
  `phoneNumber` varchar(45) DEFAULT NULL,
  `phoneNumberType` varchar(45) DEFAULT NULL,
  `displayInHandheld` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_phone_numbers_property1_idx` (`property_id`),
  CONSTRAINT `fk_phone_numbers_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone_numbers`
--

LOCK TABLES `phone_numbers` WRITE;
/*!40000 ALTER TABLE `phone_numbers` DISABLE KEYS */;
/*!40000 ALTER TABLE `phone_numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `properties` (
  `property_id` int NOT NULL AUTO_INCREMENT,
  `propertyName` varchar(45) DEFAULT NULL,
  `propertyCode` varchar(45) DEFAULT NULL,
  `webAddress` varchar(45) DEFAULT NULL,
  `primaryAddress` varchar(45) DEFAULT NULL,
  `billingAddress` varchar(45) DEFAULT NULL,
  `propertyNotes/PostOrders` text,
  `inCustomGroups` text,
  `securityProgram` tinyint DEFAULT NULL,
  `maintananceProgram` tinyint DEFAULT NULL,
  `parkingProgram` tinyint DEFAULT NULL,
  `clients_companies_id` int NOT NULL,
  PRIMARY KEY (`property_id`,`clients_companies_id`),
  KEY `fk_property_clients_companies1_idx` (`clients_companies_id`),
  CONSTRAINT `fk_property_clients_companies1` FOREIGN KEY (`clients_companies_id`) REFERENCES `clients_companies` (`client_company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `properties`
--

LOCK TABLES `properties` WRITE;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
INSERT INTO `properties` VALUES (1,'First Property','code 1','p.com','iraq, sully street1','1','property note',NULL,1,1,1,1),(2,'Updated Name',NULL,NULL,NULL,NULL,'Updated Note ',NULL,NULL,NULL,NULL,1),(5,'test',NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,NULL,1),(7,'testingAddToAllProperty',NULL,NULL,NULL,NULL,'Hopefully it Worked',NULL,NULL,NULL,NULL,1),(18,'testingAddToAllPropertyAgain',NULL,NULL,NULL,NULL,'Hopefully it worked this time',NULL,NULL,NULL,NULL,1),(19,'addingToTestIssueType',NULL,NULL,NULL,NULL,'first try',NULL,NULL,NULL,NULL,1),(20,'addingToTestIssueType',NULL,NULL,NULL,NULL,'first try',NULL,NULL,NULL,NULL,1),(41,'Majdi Mall',NULL,NULL,NULL,NULL,'Check each floor, check the fire exits.',NULL,1,1,NULL,1),(42,'Majdi Mall',NULL,NULL,NULL,NULL,'Check each floor, check the fire exits.',NULL,1,1,NULL,1),(43,'Majdi Mall',NULL,NULL,NULL,NULL,'Check each floor, check the fire exits.',NULL,1,1,NULL,1),(44,'Majdi Mall',NULL,NULL,NULL,NULL,'Check each floor, check the fire exits.',NULL,1,1,NULL,1),(45,'Majdi Mall',NULL,NULL,NULL,NULL,'Check each floor, check the fire exits.',NULL,1,1,NULL,1),(46,'Majdi Mall',NULL,NULL,NULL,NULL,'Check each floor, check the fire exits.',NULL,1,1,NULL,1),(47,'Majdi Mall',NULL,NULL,NULL,NULL,'Check each floor, check the fire exits.',NULL,1,1,NULL,1),(48,'Majdi Mall',NULL,NULL,NULL,NULL,'Check each floor, check the fire exits.',NULL,1,1,NULL,1),(49,'Majdi Mall',NULL,NULL,NULL,NULL,'Check each floor, check the fire exits.',NULL,1,1,NULL,1);
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_addresses`
--

DROP TABLE IF EXISTS `property_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_addresses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_id` int NOT NULL,
  `streetNumber` varchar(45) DEFAULT NULL,
  `streetName` varchar(45) DEFAULT NULL,
  `streetType_id` int DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `states_id` int NOT NULL,
  `zip` int DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `buildingNumber` varchar(45) DEFAULT NULL,
  `addresses_types_id` int NOT NULL,
  `GPSLongitude` varchar(45) DEFAULT NULL,
  `GPSLatitude` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_property_addresses_property1_idx` (`property_id`),
  KEY `fk_property_addresses_states1_idx` (`states_id`),
  KEY `fk_property_addresses_addresses_types1_idx` (`addresses_types_id`),
  CONSTRAINT `fk_property_addresses_addresses_types1` FOREIGN KEY (`addresses_types_id`) REFERENCES `addresses_types` (`id`),
  CONSTRAINT `fk_property_addresses_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`),
  CONSTRAINT `fk_property_addresses_states1` FOREIGN KEY (`states_id`) REFERENCES `states` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_addresses`
--

LOCK TABLES `property_addresses` WRITE;
/*!40000 ALTER TABLE `property_addresses` DISABLE KEYS */;
INSERT INTO `property_addresses` VALUES (1,1,'233','344 street',1,'austin',1,3343,'united states',NULL,4,'32432423\'23','23423422\'34'),(3,1,'5151','fiftyone',14,'Husten',43,33443,'United States','',4,'29°49 54.5','95°17 20.6'),(4,1,'5151','fiftyone',14,'Husten',43,33443,'United States','',4,'29°49 54.5','95°17 20.6'),(5,1,'5151','fiftyone',14,'Husten',43,33443,'United States','',4,'29°49 54.5','95°17 20.6'),(6,1,'5151','fiftyone',14,'Husten',43,33443,'United States','',4,'2993888','66577473'),(7,1,'5151','fiftyone',14,'Husten',43,33443,'United States','',4,'2993888','66577473'),(8,1,'5151','fiftyone',14,'Husten',43,33443,'United States','',4,'2993888','66577473'),(9,1,'5151','fiftyone',14,'Husten',43,33443,'United States','',4,'2993888','66577473'),(10,1,'5151','fiftyone',14,'Husten',43,33443,'United States','',4,'2993888','66577473'),(11,1,'5151','fiftyone',14,'Husten',43,33443,'United States','',4,'2993888','66577473'),(12,1,'5151','fiftyone',14,'Husten',43,33443,'United States','',4,'2993888','66577473'),(13,1,'5151','fiftyone',14,'Husten',43,33443,'United States','',4,'2993888','66577473'),(14,1,'5151','fiftyone',14,'Husten',43,33443,'United States','',4,'2993888','66577473'),(15,1,'5151','fiftyone',14,'Husten',43,33443,'United States','',4,'2993888','66577473'),(16,1,'5151','fiftyone',14,'Husten',43,33443,'United States','',4,'2993888','66577473');
/*!40000 ALTER TABLE `property_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_checkpoints`
--

DROP TABLE IF EXISTS `property_checkpoints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_checkpoints` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_id` int NOT NULL,
  `checkPointName` varchar(45) DEFAULT NULL,
  `checkPointLocation` varchar(45) DEFAULT NULL,
  `QR/NFCCodeValue` varchar(255) DEFAULT NULL,
  `property_addresses_id` int NOT NULL,
  `chckpointUnit` varchar(45) DEFAULT NULL,
  `checkpintIssueType` varchar(45) DEFAULT NULL,
  `autoCreateIssueType` tinyint DEFAULT NULL,
  `checkpointLastHint` varchar(45) DEFAULT NULL,
  `reportNote` varchar(45) DEFAULT NULL,
  `officerInstructions` varchar(45) DEFAULT NULL,
  `isActive` tinyint DEFAULT NULL,
  `allowKeepOpen` tinyint DEFAULT NULL,
  `requirePhoto` tinyint DEFAULT NULL,
  `propertyCheckpointscol` tinyint DEFAULT NULL,
  `reportIfMissed` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_propertyCheckpoints_property1_idx` (`property_id`),
  KEY `fk_propertyCheckpoints_property_addresses1_idx` (`property_addresses_id`),
  CONSTRAINT `fk_propertyCheckpoints_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`),
  CONSTRAINT `fk_propertyCheckpoints_property_addresses1` FOREIGN KEY (`property_addresses_id`) REFERENCES `property_addresses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_checkpoints`
--

LOCK TABLES `property_checkpoints` WRITE;
/*!40000 ALTER TABLE `property_checkpoints` DISABLE KEYS */;
INSERT INTO `property_checkpoints` VALUES (1,1,'chName','street 1','c3ff',1,'chpointUnit','2',1,'Last hint of the checkpoint is here','Notes for the report','do good check for the entries',1,0,1,NULL,1),(2,1,'chName','street 1','c3ff',1,'chpointUnit','2',1,'Last hint of the checkpoint is here','Notes for the report','do good check for the entries',1,0,1,NULL,1),(3,1,'chName','street 1','c3ff',1,'chpointUnit','2',1,'Last hint of the checkpoint is here','Notes for the report','do good check for the entries',1,0,1,NULL,1),(4,1,'chName','street 1','c3ff',1,'chpointUnit','2',1,'Last hint of the checkpoint is here','Notes for the report','do good check for the entries',1,0,1,NULL,1),(5,1,'chName','street 1','c3ff',1,'chpointUnit','2',1,'Last hint of the checkpoint is here','Notes for the report','do good check for the entries',1,0,1,NULL,1);
/*!40000 ALTER TABLE `property_checkpoints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_documents`
--

DROP TABLE IF EXISTS `property_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_id` int NOT NULL,
  `documentName` varchar(45) DEFAULT NULL,
  `fileName` varchar(45) DEFAULT NULL,
  `path` varchar(45) DEFAULT NULL,
  `documentDescription` varchar(45) DEFAULT NULL,
  `allowCustomersToView` varchar(45) DEFAULT NULL,
  `displayOnNewAction` varchar(45) DEFAULT NULL,
  `propertyDocumentscol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_propertyDocuments_property1_idx` (`property_id`),
  CONSTRAINT `fk_propertyDocuments_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_documents`
--

LOCK TABLES `property_documents` WRITE;
/*!40000 ALTER TABLE `property_documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_geofance`
--

DROP TABLE IF EXISTS `property_geofance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_geofance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_id` int NOT NULL,
  `geofanceName` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `geofanceRadius` varchar(45) DEFAULT NULL,
  `property_geofancecol` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_property_geofance_property1_idx` (`property_id`),
  CONSTRAINT `fk_property_geofance_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_geofance`
--

LOCK TABLES `property_geofance` WRITE;
/*!40000 ALTER TABLE `property_geofance` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_geofance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_group`
--

DROP TABLE IF EXISTS `property_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_group` (
  `group_id` int NOT NULL AUTO_INCREMENT,
  `groupName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_group`
--

LOCK TABLES `property_group` WRITE;
/*!40000 ALTER TABLE `property_group` DISABLE KEYS */;
INSERT INTO `property_group` VALUES (1,'All Properties'),(2,'test group'),(3,'test group'),(4,'test group'),(5,'group1'),(6,'new group'),(7,'new group'),(8,'new group'),(9,'new group');
/*!40000 ALTER TABLE `property_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_group_has_employees`
--

DROP TABLE IF EXISTS `property_group_has_employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_group_has_employees` (
  `property_group_id` int NOT NULL,
  `employees_id` int NOT NULL,
  PRIMARY KEY (`property_group_id`,`employees_id`),
  KEY `fk_property_group_has_employees_employees1_idx` (`employees_id`),
  KEY `fk_property_group_has_employees_property_group1_idx` (`property_group_id`),
  CONSTRAINT `fk_property_group_has_employees_employees1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`),
  CONSTRAINT `fk_property_group_has_employees_property_group1` FOREIGN KEY (`property_group_id`) REFERENCES `property_group` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_group_has_employees`
--

LOCK TABLES `property_group_has_employees` WRITE;
/*!40000 ALTER TABLE `property_group_has_employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_group_has_employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_group_has_issue_types`
--

DROP TABLE IF EXISTS `property_group_has_issue_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_group_has_issue_types` (
  `property_group_id` int NOT NULL,
  `issue_type_id` int NOT NULL,
  PRIMARY KEY (`property_group_id`,`issue_type_id`),
  KEY `group_id_idx` (`property_group_id`),
  KEY `issue_types_id_idx` (`issue_type_id`),
  CONSTRAINT `issue_types_id` FOREIGN KEY (`issue_type_id`) REFERENCES `issue_types` (`issue_type_id`),
  CONSTRAINT `property_group_id` FOREIGN KEY (`property_group_id`) REFERENCES `property_group` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_group_has_issue_types`
--

LOCK TABLES `property_group_has_issue_types` WRITE;
/*!40000 ALTER TABLE `property_group_has_issue_types` DISABLE KEYS */;
INSERT INTO `property_group_has_issue_types` VALUES (1,4),(1,5);
/*!40000 ALTER TABLE `property_group_has_issue_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_has_issue_types`
--

DROP TABLE IF EXISTS `property_has_issue_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_has_issue_types` (
  `property_id` int NOT NULL AUTO_INCREMENT,
  `issue_types_id` int NOT NULL,
  PRIMARY KEY (`property_id`,`issue_types_id`),
  KEY `fk_property_has_issue_types_issue_types1_idx` (`issue_types_id`),
  KEY `fk_property_has_issue_types_property1_idx` (`property_id`),
  CONSTRAINT `fk_property_has_issue_types_issue_types1` FOREIGN KEY (`issue_types_id`) REFERENCES `issue_types` (`issue_type_id`),
  CONSTRAINT `fk_property_has_issue_types_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_has_issue_types`
--

LOCK TABLES `property_has_issue_types` WRITE;
/*!40000 ALTER TABLE `property_has_issue_types` DISABLE KEYS */;
INSERT INTO `property_has_issue_types` VALUES (1,1),(2,1),(1,2),(20,3);
/*!40000 ALTER TABLE `property_has_issue_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_has_locations`
--

DROP TABLE IF EXISTS `property_has_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_has_locations` (
  `property_id` int NOT NULL AUTO_INCREMENT,
  `locations_id` int NOT NULL,
  PRIMARY KEY (`property_id`,`locations_id`),
  KEY `fk_property_has_locations_locations1_idx` (`locations_id`),
  KEY `fk_property_has_locations_property1_idx` (`property_id`),
  CONSTRAINT `fk_property_has_locations_locations1` FOREIGN KEY (`locations_id`) REFERENCES `locations` (`id`),
  CONSTRAINT `fk_property_has_locations_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_has_locations`
--

LOCK TABLES `property_has_locations` WRITE;
/*!40000 ALTER TABLE `property_has_locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_has_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_photo`
--

DROP TABLE IF EXISTS `property_photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_photo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_id` int NOT NULL,
  `path` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_propertyPhoto_property1_idx` (`property_id`),
  CONSTRAINT `fk_propertyPhoto_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_photo`
--

LOCK TABLES `property_photo` WRITE;
/*!40000 ALTER TABLE `property_photo` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_tours`
--

DROP TABLE IF EXISTS `property_tours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_tours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_id` int NOT NULL,
  `tourName` varchar(45) DEFAULT NULL,
  `tourDescription` text,
  `tourStartTime` varchar(45) DEFAULT NULL,
  `tourEndTime` varchar(45) DEFAULT NULL,
  `allowManualSubmission` tinyint DEFAULT NULL,
  `isActiveTour` tinyint DEFAULT NULL,
  `tourDaysOfWeek_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_property_tours_property1_idx` (`property_id`),
  KEY `fk_property_tours_tourDaysOfWeek1_idx` (`tourDaysOfWeek_id`),
  CONSTRAINT `fk_property_tours_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`),
  CONSTRAINT `fk_property_tours_tourDaysOfWeek1` FOREIGN KEY (`tourDaysOfWeek_id`) REFERENCES `tourdaysofweek` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_tours`
--

LOCK TABLES `property_tours` WRITE;
/*!40000 ALTER TABLE `property_tours` DISABLE KEYS */;
INSERT INTO `property_tours` VALUES (1,1,'update test','update test have to include all data','11:00 pm','12:00 am',0,1,1),(2,1,'update test 2','update test have to include all data 2','11:00 pm','12:00 am',0,1,1),(3,1,'first tour','this is first tour','10:00 pm','11:00 pm',1,1,1),(4,1,'first tour','this is first tour','10:00 pm','11:00 pm',1,1,1),(5,1,'first tour','this is first tour','10:00 pm','11:00 pm',1,1,2),(6,1,'first tour','this is first tour','10:00 pm','11:00 pm',1,1,2),(7,1,'first tour','this is first tour','10:00 pm','11:00 pm',1,1,2),(8,1,'first tour','this is first tour','10:00 pm','11:00 pm',1,1,2),(9,1,'first tour','this is first tour','10:00 pm','11:00 pm',1,1,2),(10,2,'another test tour','You have to include all data','11:00 pm','12:00 am',0,1,2);
/*!40000 ALTER TABLE `property_tours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_tours_has_property_checkpoints`
--

DROP TABLE IF EXISTS `property_tours_has_property_checkpoints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_tours_has_property_checkpoints` (
  `property_tours_id` int NOT NULL,
  `property_checkpoints_id` int NOT NULL,
  `order` int DEFAULT NULL,
  PRIMARY KEY (`property_tours_id`,`property_checkpoints_id`),
  KEY `fk_property_tours_has_property_checkpoints_property_checkpo_idx` (`property_checkpoints_id`),
  KEY `fk_property_tours_has_property_checkpoints_property_tours1_idx` (`property_tours_id`),
  CONSTRAINT `fk_property_tours_has_property_checkpoints_property_checkpoin1` FOREIGN KEY (`property_checkpoints_id`) REFERENCES `property_checkpoints` (`id`),
  CONSTRAINT `fk_property_tours_has_property_checkpoints_property_tours1` FOREIGN KEY (`property_tours_id`) REFERENCES `property_tours` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_tours_has_property_checkpoints`
--

LOCK TABLES `property_tours_has_property_checkpoints` WRITE;
/*!40000 ALTER TABLE `property_tours_has_property_checkpoints` DISABLE KEYS */;
INSERT INTO `property_tours_has_property_checkpoints` VALUES (2,1,NULL),(2,2,NULL),(2,3,NULL),(2,4,NULL),(3,1,NULL),(3,2,NULL),(3,3,NULL),(3,4,NULL),(4,1,NULL),(4,2,NULL),(4,3,NULL),(4,4,NULL),(5,1,NULL),(5,2,NULL),(5,3,NULL),(5,4,NULL),(6,1,NULL),(6,2,NULL),(6,3,NULL),(6,4,NULL),(7,1,NULL),(7,2,NULL),(7,3,NULL),(7,4,NULL),(8,1,NULL),(8,2,NULL),(8,3,NULL),(8,4,NULL),(9,1,NULL),(9,2,NULL),(9,3,NULL),(9,4,NULL),(10,1,NULL),(10,2,NULL),(10,3,NULL),(10,4,NULL);
/*!40000 ALTER TABLE `property_tours_has_property_checkpoints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `securityroles`
--

DROP TABLE IF EXISTS `securityroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `securityroles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `roleName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `securityroles`
--

LOCK TABLES `securityroles` WRITE;
/*!40000 ALTER TABLE `securityroles` DISABLE KEYS */;
/*!40000 ALTER TABLE `securityroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sent_email_history`
--

DROP TABLE IF EXISTS `sent_email_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sent_email_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `from` varchar(45) DEFAULT NULL,
  `destination` varchar(45) DEFAULT NULL,
  `body` varchar(45) DEFAULT NULL,
  `emailSent` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sent_email_history`
--

LOCK TABLES `sent_email_history` WRITE;
/*!40000 ALTER TABLE `sent_email_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `sent_email_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `states` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `shortName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'Alabama','AL'),(2,'Alaska','AK'),(3,'Arizona','AZ'),(4,'Arkansas','AR'),(5,'California','CA'),(6,'Colorado','CO'),(7,'Connecticut','CT'),(8,'Delaware','DE'),(9,'Florida','FL'),(10,'Georgia','GA'),(11,'Hawaii','HI'),(12,'Idaho','ID'),(13,'Illinois','IL'),(14,'Indiana','IN'),(15,'Iowa','IA'),(16,'Kansas','KS'),(17,'Kentucky','KY'),(18,'Louisiana','LA'),(19,'Maine','ME'),(20,'Maryland','MD'),(21,'Massachusetts','MA'),(22,'Michigan','MI'),(23,'Minnesota','MN'),(24,'Mississippi','MS'),(25,'Missouri','MO'),(26,'Montana','MT'),(27,'Nebraska','NE'),(28,'Nevada','NV'),(29,'New Hampshire','NH'),(30,'New Jersey','NJ'),(31,'New Mexico','NM'),(32,'New York','NY'),(33,'North Carolina','NC'),(34,'North Dakota','ND'),(35,'Ohio','OH'),(36,'Oklahoma','OK'),(37,'Oregon','OR'),(38,'Pennsylvania','PA'),(39,'Rhode Island','RI'),(40,'South Carolina','SC'),(41,'South Dakota','SD'),(42,'Tennessee','TN'),(43,'Texas','TX'),(44,'Utah','UT'),(45,'Vermont','VT'),(46,'Virginia','VA'),(47,'Washington','WA'),(48,'West Virginia','WV'),(49,'Wisconsin','WI'),(50,'Wyoming','WY');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `street_types`
--

DROP TABLE IF EXISTS `street_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `street_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `streetType` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `street_types`
--

LOCK TABLES `street_types` WRITE;
/*!40000 ALTER TABLE `street_types` DISABLE KEYS */;
INSERT INTO `street_types` VALUES (1,'Alley'),(2,'Artery'),(3,'Avenue'),(4,'Block'),(5,'Boulevard'),(6,'Bypass'),(7,'Circle'),(8,'Court'),(9,'Cross Street'),(10,'Cul-De-Sac'),(11,'Drive'),(12,'Heights'),(13,'Highway'),(14,'Hill'),(15,'Junction'),(16,'Lane'),(17,'Loop'),(18,'Mall'),(19,'Mile'),(20,'Parkway'),(21,'Place'),(22,'Plaza'),(23,'Ridge'),(24,'Road'),(25,'Roadway'),(26,'Route'),(27,'Street'),(28,'Trail'),(29,'View'),(30,'Way');
/*!40000 ALTER TABLE `street_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_notification`
--

DROP TABLE IF EXISTS `system_notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `system_notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ResendNotificationAlertForUnacknowledgedIssuesPriority1` int DEFAULT NULL,
  `ResendNotificationAlertForUnacknowledgedIssuesPriority2` int DEFAULT NULL,
  `ResendNotificationAlertForUnacknowledgedIssuesPriority3` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_notification`
--

LOCK TABLES `system_notification` WRITE;
/*!40000 ALTER TABLE `system_notification` DISABLE KEYS */;
INSERT INTO `system_notification` VALUES (1,1,1,0),(2,0,1,1),(3,0,0,0),(4,0,0,0),(5,1,1,1),(6,1,1,1),(7,1,1,1),(8,1,1,1),(9,1,1,1),(10,1,1,1),(11,1,1,1),(12,1,1,1);
/*!40000 ALTER TABLE `system_notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systems`
--

DROP TABLE IF EXISTS `systems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `systems` (
  `id` int NOT NULL AUTO_INCREMENT,
  `general_id` int NOT NULL,
  `devices_id` int DEFAULT NULL,
  `logos_id` int NOT NULL,
  `notification_id` int NOT NULL,
  `email_id` int NOT NULL,
  `domainName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_systems_general1_idx` (`general_id`),
  KEY `fk_systems_devices1_idx` (`devices_id`),
  KEY `fk_systems_logos1_idx` (`logos_id`),
  KEY `fk_systems_notification1_idx` (`notification_id`),
  KEY `fk_systems_email1_idx` (`email_id`),
  CONSTRAINT `fk_systems_devices1` FOREIGN KEY (`devices_id`) REFERENCES `devices` (`id`),
  CONSTRAINT `fk_systems_general1` FOREIGN KEY (`general_id`) REFERENCES `general` (`id`),
  CONSTRAINT `fk_systems_logos1` FOREIGN KEY (`logos_id`) REFERENCES `logos` (`id`),
  CONSTRAINT `fk_systems_notification1` FOREIGN KEY (`notification_id`) REFERENCES `system_notification` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systems`
--

LOCK TABLES `systems` WRITE;
/*!40000 ALTER TABLE `systems` DISABLE KEYS */;
INSERT INTO `systems` VALUES (1,41,NULL,1,12,10,NULL);
/*!40000 ALTER TABLE `systems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systems_has_customers`
--

DROP TABLE IF EXISTS `systems_has_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `systems_has_customers` (
  `systems_id` int NOT NULL,
  `customers_id` int NOT NULL,
  PRIMARY KEY (`systems_id`,`customers_id`),
  KEY `fk_systems_has_customers_customers1_idx` (`customers_id`),
  KEY `fk_systems_has_customers_systems1_idx` (`systems_id`),
  CONSTRAINT `fk_systems_has_customers_customers1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `fk_systems_has_customers_systems1` FOREIGN KEY (`systems_id`) REFERENCES `systems` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systems_has_customers`
--

LOCK TABLES `systems_has_customers` WRITE;
/*!40000 ALTER TABLE `systems_has_customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `systems_has_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systems_has_employees`
--

DROP TABLE IF EXISTS `systems_has_employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `systems_has_employees` (
  `systems_id` int NOT NULL,
  `employees_id` int NOT NULL,
  PRIMARY KEY (`systems_id`,`employees_id`),
  KEY `fk_systems_has_employees_employees1_idx` (`employees_id`),
  KEY `fk_systems_has_employees_systems1_idx` (`systems_id`),
  CONSTRAINT `fk_systems_has_employees_employees1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`),
  CONSTRAINT `fk_systems_has_employees_systems1` FOREIGN KEY (`systems_id`) REFERENCES `systems` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systems_has_employees`
--

LOCK TABLES `systems_has_employees` WRITE;
/*!40000 ALTER TABLE `systems_has_employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `systems_has_employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systems_has_properties`
--

DROP TABLE IF EXISTS `systems_has_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `systems_has_properties` (
  `systems_id` int NOT NULL,
  `properties_id` int NOT NULL,
  `properties_clients_companies_id` int NOT NULL,
  PRIMARY KEY (`systems_id`,`properties_id`,`properties_clients_companies_id`),
  KEY `fk_systems_has_properties_properties1_idx` (`properties_id`,`properties_clients_companies_id`),
  KEY `fk_systems_has_properties_systems1_idx` (`systems_id`),
  CONSTRAINT `fk_systems_has_properties_properties1` FOREIGN KEY (`properties_id`, `properties_clients_companies_id`) REFERENCES `properties` (`property_id`, `clients_companies_id`),
  CONSTRAINT `fk_systems_has_properties_systems1` FOREIGN KEY (`systems_id`) REFERENCES `systems` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systems_has_properties`
--

LOCK TABLES `systems_has_properties` WRITE;
/*!40000 ALTER TABLE `systems_has_properties` DISABLE KEYS */;
/*!40000 ALTER TABLE `systems_has_properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systems_has_property_group`
--

DROP TABLE IF EXISTS `systems_has_property_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `systems_has_property_group` (
  `systems_id` int NOT NULL,
  `property_group_id` int NOT NULL,
  PRIMARY KEY (`systems_id`,`property_group_id`),
  KEY `fk_systems_has_property_group_property_group1_idx` (`property_group_id`),
  KEY `fk_systems_has_property_group_systems1_idx` (`systems_id`),
  CONSTRAINT `fk_systems_has_property_group_property_group1` FOREIGN KEY (`property_group_id`) REFERENCES `property_group` (`group_id`),
  CONSTRAINT `fk_systems_has_property_group_systems1` FOREIGN KEY (`systems_id`) REFERENCES `systems` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systems_has_property_group`
--

LOCK TABLES `systems_has_property_group` WRITE;
/*!40000 ALTER TABLE `systems_has_property_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `systems_has_property_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taskdaysofweek`
--

DROP TABLE IF EXISTS `taskdaysofweek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taskdaysofweek` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sunday` tinyint DEFAULT NULL,
  `monday` tinyint DEFAULT NULL,
  `tuesday` tinyint DEFAULT NULL,
  `wednesday` tinyint DEFAULT NULL,
  `thursday` tinyint DEFAULT NULL,
  `friday` tinyint DEFAULT NULL,
  `saturday` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taskdaysofweek`
--

LOCK TABLES `taskdaysofweek` WRITE;
/*!40000 ALTER TABLE `taskdaysofweek` DISABLE KEYS */;
INSERT INTO `taskdaysofweek` VALUES (1,1,0,1,0,1,0,1),(2,1,0,1,0,1,0,1),(3,1,0,1,0,1,0,1),(4,1,0,1,0,1,0,1),(5,1,0,1,0,1,0,1),(6,1,0,1,0,1,0,1),(7,1,0,1,0,1,0,1),(8,1,0,1,0,1,0,1),(9,1,0,1,0,1,0,1),(10,1,0,1,0,1,0,1),(11,1,0,1,0,1,0,1),(12,1,0,1,0,1,0,1),(13,1,0,1,0,1,0,1),(14,1,0,1,0,1,0,1),(15,1,0,1,0,1,0,1),(16,1,0,1,0,1,0,1),(22,1,0,1,0,1,0,1),(26,1,0,1,0,1,0,1);
/*!40000 ALTER TABLE `taskdaysofweek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `taskName` varchar(45) DEFAULT NULL,
  `issue_types_id` int NOT NULL,
  `taskDescription` text,
  `property_addresses_id` int NOT NULL,
  `unites_id` int DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `taskTime` varchar(45) DEFAULT NULL,
  `taskDaysOfWeek_id` int NOT NULL,
  `alertIfLeftOpen` int DEFAULT NULL,
  `disableTaskAfterDate` datetime DEFAULT NULL,
  `lastIssuedDate` date DEFAULT NULL,
  `isActive` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tasks_issue_types1_idx` (`issue_types_id`),
  KEY `fk_tasks_property_addresses1_idx` (`property_addresses_id`),
  KEY `fk_tasks_taskDaysOfWeek1_idx` (`taskDaysOfWeek_id`),
  KEY `fk_tasks_unites1_idx` (`unites_id`),
  CONSTRAINT `fk_tasks_issue_types1` FOREIGN KEY (`issue_types_id`) REFERENCES `issue_types` (`issue_type_id`),
  CONSTRAINT `fk_tasks_property_addresses1` FOREIGN KEY (`property_addresses_id`) REFERENCES `property_addresses` (`id`),
  CONSTRAINT `fk_tasks_taskDaysOfWeek1` FOREIGN KEY (`taskDaysOfWeek_id`) REFERENCES `taskdaysofweek` (`id`),
  CONSTRAINT `fk_tasks_unites1` FOREIGN KEY (`unites_id`) REFERENCES `unites` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,'Updated task',1,'New task assignment desc.',1,NULL,'','2:00:00',4,1,'2022-03-10 02:00:00',NULL,1),(2,'new task test',1,'New task assignment desc.',1,NULL,'','10:00 AM',4,1,'2022-03-10 02:00:00',NULL,1),(3,'new task test',1,'New task assignment desc.',1,NULL,'','2:00:00',5,1,'2022-03-10 02:00:00',NULL,1),(4,'new task test',1,'New task assignment desc.',1,NULL,'','2:00:00',5,1,'2022-03-10 02:00:00',NULL,1),(5,'new task test',1,'New task assignment desc.',1,NULL,'','2:00:00',6,1,'2022-03-10 02:00:00',NULL,1),(6,'new task test',1,'New task assignment desc.',1,NULL,'','2:00:00',7,1,'2022-03-10 02:00:00',NULL,1),(7,'new task test',1,'New task assignment desc.',1,NULL,'','2:00:00',8,1,'2022-03-10 02:00:00',NULL,1),(8,'new task test',1,'New task assignment desc.',1,NULL,'','2:00:00',9,1,'2022-03-10 02:00:00',NULL,1),(9,'new task test',1,'New task assignment desc.',1,NULL,'','2:00:00',10,1,'2022-03-10 02:00:00',NULL,1),(10,'new task test',1,'New task assignment desc.',1,NULL,'','2:00:00',11,1,'2022-03-10 02:00:00',NULL,1),(11,'new task test',1,'New task assignment desc.',1,NULL,'','2:00:00',12,1,'2022-03-10 02:00:00',NULL,1),(12,'new task test',1,'New task assignment desc.',1,NULL,'','2:00:00',13,1,'2022-03-10 02:00:00',NULL,1),(13,'new task test',1,'New task assignment desc.',1,NULL,'','2:00:00',14,1,'2022-03-10 02:00:00',NULL,1),(14,'new task test',1,'New task assignment desc.',1,NULL,'','2:00:00',15,1,'2022-03-10 02:00:00',NULL,1),(15,'new task test',1,'New task assignment desc.',1,NULL,'','2:00:00',16,1,'2022-03-10 02:00:00',NULL,1),(21,'new task test',1,'New task assignment desc.',1,NULL,'','2:00:00',22,1,'2022-03-10 02:00:00',NULL,1),(22,'new task test',1,'New task assignment desc.',1,NULL,'','2:00:00',26,1,'2022-03-10 02:00:00',NULL,1);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tourdaysofweek`
--

DROP TABLE IF EXISTS `tourdaysofweek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tourdaysofweek` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sunday` tinyint DEFAULT NULL,
  `monday` tinyint DEFAULT NULL,
  `tuesday` tinyint DEFAULT NULL,
  `wednesday` tinyint DEFAULT NULL,
  `thursday` tinyint DEFAULT NULL,
  `friday` tinyint DEFAULT NULL,
  `saturday` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tourdaysofweek`
--

LOCK TABLES `tourdaysofweek` WRITE;
/*!40000 ALTER TABLE `tourdaysofweek` DISABLE KEYS */;
INSERT INTO `tourdaysofweek` VALUES (1,1,0,1,0,1,0,1),(2,1,0,1,1,0,0,1),(3,1,0,1,1,0,0,1),(4,1,0,1,1,0,0,1),(5,1,0,1,1,0,0,1),(6,1,0,1,1,0,0,1),(7,1,0,1,1,0,0,1),(8,1,0,1,1,0,0,1),(9,1,0,1,1,0,0,1),(10,1,0,1,1,0,0,1),(11,1,0,1,1,0,0,1),(12,1,0,1,1,0,0,1),(13,1,0,1,1,0,0,1),(14,1,0,1,1,0,0,1);
/*!40000 ALTER TABLE `tourdaysofweek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unites`
--

DROP TABLE IF EXISTS `unites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unites` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_addresses_id` int NOT NULL,
  `UnitNumber` varchar(45) DEFAULT NULL,
  `ParkingSpaceCount` int DEFAULT NULL,
  `ParkingSpaceNumbers` int DEFAULT NULL,
  `CurrentPermitCount` int DEFAULT NULL,
  `MaxPermitCount` int DEFAULT NULL,
  `SecurityViolations` int DEFAULT NULL,
  `Reported Security` int DEFAULT NULL,
  `ReportedParking` int DEFAULT NULL,
  `Reported Maintenance` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unites_property_addresses1_idx` (`property_addresses_id`),
  CONSTRAINT `fk_unites_property_addresses1` FOREIGN KEY (`property_addresses_id`) REFERENCES `property_addresses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unites`
--

LOCK TABLES `unites` WRITE;
/*!40000 ALTER TABLE `unites` DISABLE KEYS */;
INSERT INTO `unites` VALUES (6,1,'A1',0,0,0,-1,0,0,0,0),(7,1,'A2',0,0,0,-1,0,0,0,0);
/*!40000 ALTER TABLE `unites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_notification`
--

DROP TABLE IF EXISTS `users_notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `send meADailyMissedCheckpointReport` tinyint DEFAULT NULL,
  `propertyIssuesPerHourFallBelowThreshold` tinyint DEFAULT NULL,
  `overdueTasks` tinyint DEFAULT NULL,
  `alertWhenUnableToSendTourStartMessages` tinyint DEFAULT NULL,
  `alertWhenATourExpiresOrIsFinishedWithoutAllCheckpointsBeingHit` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_notification`
--

LOCK TABLES `users_notification` WRITE;
/*!40000 ALTER TABLE `users_notification` DISABLE KEYS */;
INSERT INTO `users_notification` VALUES (1,NULL,NULL,NULL,NULL,NULL),(2,0,0,0,0,0),(3,0,0,0,0,0),(4,0,0,0,0,0),(5,0,0,0,0,0),(6,0,0,0,0,0),(7,0,0,0,0,0),(8,0,0,0,0,0),(9,0,0,0,0,0),(10,0,0,0,0,0),(11,0,0,0,0,0),(12,0,0,0,0,0),(13,0,0,0,0,0);
/*!40000 ALTER TABLE `users_notification` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-06 13:24:01

CREATE DATABASE  IF NOT EXISTS `falcon` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `falcon`;
-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: falcon
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `addresses_types`
--

DROP TABLE IF EXISTS `addresses_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `addresses_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `addressName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses_types`
--

LOCK TABLES `addresses_types` WRITE;
/*!40000 ALTER TABLE `addresses_types` DISABLE KEYS */;
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
  PRIMARY KEY (`id`),
  KEY `fk_alert_property1_idx` (`property_id`),
  CONSTRAINT `fk_alert_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alert`
--

LOCK TABLES `alert` WRITE;
/*!40000 ALTER TABLE `alert` DISABLE KEYS */;
/*!40000 ALTER TABLE `alert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients_companies`
--

DROP TABLE IF EXISTS `clients_companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients_companies` (
  `id` int NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  KEY `fk_clients_companies_street_types1_idx` (`street_types_id`),
  KEY `fk_clients_companies_states1_idx` (`states_id`),
  CONSTRAINT `fk_clients_companies_states1` FOREIGN KEY (`states_id`) REFERENCES `states` (`id`),
  CONSTRAINT `fk_clients_companies_street_types1` FOREIGN KEY (`street_types_id`) REFERENCES `street_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients_companies`
--

LOCK TABLES `clients_companies` WRITE;
/*!40000 ALTER TABLE `clients_companies` DISABLE KEYS */;
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
  CONSTRAINT `fk_clients_companies_has_customers_clients_companies1` FOREIGN KEY (`clients_companies_id`) REFERENCES `clients_companies` (`id`),
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
  CONSTRAINT `fk_clients_companies_has_employees_clients_companies1` FOREIGN KEY (`clients_companies_id`) REFERENCES `clients_companies` (`id`),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_roles`
--

LOCK TABLES `customer_roles` WRITE;
/*!40000 ALTER TABLE `customer_roles` DISABLE KEYS */;
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
  `securityRoles_id` int NOT NULL,
  `maintananceEmail` varchar(45) DEFAULT NULL,
  `timeCardID` varchar(45) DEFAULT NULL,
  `cellNumber` varchar(45) DEFAULT NULL,
  `phoneNumber` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `states_id` int NOT NULL,
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
  KEY `fk_users_securityRoles1_idx` (`securityRoles_id`),
  KEY `fk_users_states1_idx` (`states_id`),
  KEY `fk_employees_clients_companies1_idx` (`managmentCompany`),
  KEY `fk_employees_users_notification1_idx` (`users_notification_id`),
  KEY `fk_customers_customer_roles1_idx` (`customer_roles_id`),
  CONSTRAINT `fk_customers_customer_roles1` FOREIGN KEY (`customer_roles_id`) REFERENCES `customer_roles` (`id`),
  CONSTRAINT `fk_employees_clients_companies10` FOREIGN KEY (`managmentCompany`) REFERENCES `clients_companies` (`id`),
  CONSTRAINT `fk_employees_users_notification10` FOREIGN KEY (`users_notification_id`) REFERENCES `users_notification` (`id`),
  CONSTRAINT `fk_users_securityRoles10` FOREIGN KEY (`securityRoles_id`) REFERENCES `securityroles` (`id`),
  CONSTRAINT `fk_users_states10` FOREIGN KEY (`states_id`) REFERENCES `states` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devices`
--

LOCK TABLES `devices` WRITE;
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email` (
  `id` varchar(45) NOT NULL,
  `fromEmailAddressNewOrder` varchar(45) DEFAULT NULL,
  `fromEmailAddressNewIssue` varchar(45) DEFAULT NULL,
  `fromEmailAddressAppeals` varchar(45) DEFAULT NULL,
  `SystemEmailNotification` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
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
  `securityRoles_id` int NOT NULL,
  `maintananceEmail` varchar(45) DEFAULT NULL,
  `timeCardID` varchar(45) DEFAULT NULL,
  `cellNumber` varchar(45) DEFAULT NULL,
  `phoneNumber` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `states_id` int NOT NULL,
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
  KEY `fk_users_securityRoles1_idx` (`securityRoles_id`),
  KEY `fk_users_states1_idx` (`states_id`),
  KEY `fk_employees_clients_companies1_idx` (`managmentCompany`),
  KEY `fk_employees_employee_roles1_idx` (`employee_roles_id`),
  KEY `fk_employees_users_notification1_idx` (`users_notification_id`),
  CONSTRAINT `fk_employees_clients_companies1` FOREIGN KEY (`managmentCompany`) REFERENCES `clients_companies` (`id`),
  CONSTRAINT `fk_employees_employee_roles1` FOREIGN KEY (`employee_roles_id`) REFERENCES `employee_roles` (`id`),
  CONSTRAINT `fk_employees_users_notification1` FOREIGN KEY (`users_notification_id`) REFERENCES `users_notification` (`id`),
  CONSTRAINT `fk_users_securityRoles1` FOREIGN KEY (`securityRoles_id`) REFERENCES `securityroles` (`id`),
  CONSTRAINT `fk_users_states1` FOREIGN KEY (`states_id`) REFERENCES `states` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
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
  `contactAddress` int DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `states_id` int NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general`
--

LOCK TABLES `general` WRITE;
/*!40000 ALTER TABLE `general` DISABLE KEYS */;
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
  CONSTRAINT `fk_property_group_has_property_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  CONSTRAINT `fk_property_group_has_property_property_group1` FOREIGN KEY (`property_group_id`) REFERENCES `property_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_has_properties`
--

LOCK TABLES `group_has_properties` WRITE;
/*!40000 ALTER TABLE `group_has_properties` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_has_properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issue_types`
--

DROP TABLE IF EXISTS `issue_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `issueTypeName` varchar(45) DEFAULT NULL,
  `issueDescription` text,
  `issueFee` double DEFAULT NULL,
  `issueLevel` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issue_types`
--

LOCK TABLES `issue_types` WRITE;
/*!40000 ALTER TABLE `issue_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `issue_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issue_types_has_issues_types`
--

DROP TABLE IF EXISTS `issue_types_has_issues_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_types_has_issues_types` (
  `issue_types_id` int NOT NULL,
  `issues_types_id` int NOT NULL,
  PRIMARY KEY (`issue_types_id`,`issues_types_id`),
  KEY `fk_issue_types_has_issues_types_issues_types1_idx` (`issues_types_id`),
  KEY `fk_issue_types_has_issues_types_issue_types1_idx` (`issue_types_id`),
  CONSTRAINT `fk_issue_types_has_issues_types_issue_types1` FOREIGN KEY (`issue_types_id`) REFERENCES `issue_types` (`id`),
  CONSTRAINT `fk_issue_types_has_issues_types_issues_types1` FOREIGN KEY (`issues_types_id`) REFERENCES `issues_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issue_types_has_issues_types`
--

LOCK TABLES `issue_types_has_issues_types` WRITE;
/*!40000 ALTER TABLE `issue_types_has_issues_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `issue_types_has_issues_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issue_types_options`
--

DROP TABLE IF EXISTS `issue_types_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_types_options` (
  `id` int NOT NULL AUTO_INCREMENT,
  `issue_types_id` int NOT NULL,
  `isActiveIssue` tinyint DEFAULT NULL,
  `displayForDispach` tinyint DEFAULT NULL,
  `displayOnHandheld` tinyint DEFAULT NULL,
  `displayForWebUsers` tinyint DEFAULT NULL,
  `autoCloseIssue` tinyint DEFAULT NULL,
  `restrictToCheckpointOnly` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_issue_types_options_issue_types1_idx` (`issue_types_id`),
  CONSTRAINT `fk_issue_types_options_issue_types1` FOREIGN KEY (`issue_types_id`) REFERENCES `issue_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issue_types_options`
--

LOCK TABLES `issue_types_options` WRITE;
/*!40000 ALTER TABLE `issue_types_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `issue_types_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issues`
--

DROP TABLE IF EXISTS `issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issues` (
  `id` int NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  KEY `fk_issues_properties1_idx` (`properties_id`),
  KEY `fk_issues_issue_types1_idx` (`issue_types_id`),
  KEY `fk_issues_property_addresses1_idx` (`property_addresses_id`),
  KEY `fk_issues_users1_idx` (`createdBy`),
  KEY `fk_issues_users2_idx` (`assignedTo`),
  CONSTRAINT `fk_issues_issue_types1` FOREIGN KEY (`issue_types_id`) REFERENCES `issue_types` (`id`),
  CONSTRAINT `fk_issues_properties1` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`),
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
  CONSTRAINT `fk_issues_photos_issues1` FOREIGN KEY (`issues_id`) REFERENCES `issues` (`id`)
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
  CONSTRAINT `fk_issues_sound_issues1` FOREIGN KEY (`issues_id`) REFERENCES `issues` (`id`)
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
-- Table structure for table `issues_types`
--

DROP TABLE IF EXISTS `issues_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issues_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `issueTypeName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issues_types`
--

LOCK TABLES `issues_types` WRITE;
/*!40000 ALTER TABLE `issues_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `issues_types` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logos`
--

LOCK TABLES `logos` WRITE;
/*!40000 ALTER TABLE `logos` DISABLE KEYS */;
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
  CONSTRAINT `fk_parking_setup_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`)
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
  CONSTRAINT `fk_phone_numbers_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`)
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
  `id` int NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`,`clients_companies_id`),
  KEY `fk_property_clients_companies1_idx` (`clients_companies_id`),
  CONSTRAINT `fk_property_clients_companies1` FOREIGN KEY (`clients_companies_id`) REFERENCES `clients_companies` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `properties`
--

LOCK TABLES `properties` WRITE;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
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
  `streetType` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `property_addressescol` varchar(45) DEFAULT NULL,
  `states_id` int NOT NULL,
  `zip` int DEFAULT NULL,
  `county` varchar(45) DEFAULT NULL,
  `buildingNumber` varchar(45) DEFAULT NULL,
  `addressType` varchar(45) DEFAULT NULL,
  `property_addressescol1` varchar(45) DEFAULT NULL,
  `addresses_types_id` int NOT NULL,
  `GPSLongitude` varchar(45) DEFAULT NULL,
  `GPSLatitude` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_property_addresses_property1_idx` (`property_id`),
  KEY `fk_property_addresses_states1_idx` (`states_id`),
  KEY `fk_property_addresses_addresses_types1_idx` (`addresses_types_id`),
  CONSTRAINT `fk_property_addresses_addresses_types1` FOREIGN KEY (`addresses_types_id`) REFERENCES `addresses_types` (`id`),
  CONSTRAINT `fk_property_addresses_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  CONSTRAINT `fk_property_addresses_states1` FOREIGN KEY (`states_id`) REFERENCES `states` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_addresses`
--

LOCK TABLES `property_addresses` WRITE;
/*!40000 ALTER TABLE `property_addresses` DISABLE KEYS */;
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
  CONSTRAINT `fk_propertyCheckpoints_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  CONSTRAINT `fk_propertyCheckpoints_property_addresses1` FOREIGN KEY (`property_addresses_id`) REFERENCES `property_addresses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_checkpoints`
--

LOCK TABLES `property_checkpoints` WRITE;
/*!40000 ALTER TABLE `property_checkpoints` DISABLE KEYS */;
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
  CONSTRAINT `fk_propertyDocuments_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`)
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
  CONSTRAINT `fk_property_geofance_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`)
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
  `id` int NOT NULL AUTO_INCREMENT,
  `groupName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_group`
--

LOCK TABLES `property_group` WRITE;
/*!40000 ALTER TABLE `property_group` DISABLE KEYS */;
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
  CONSTRAINT `fk_property_group_has_employees_property_group1` FOREIGN KEY (`property_group_id`) REFERENCES `property_group` (`id`)
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
  CONSTRAINT `fk_property_has_issue_types_issue_types1` FOREIGN KEY (`issue_types_id`) REFERENCES `issue_types` (`id`),
  CONSTRAINT `fk_property_has_issue_types_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_has_issue_types`
--

LOCK TABLES `property_has_issue_types` WRITE;
/*!40000 ALTER TABLE `property_has_issue_types` DISABLE KEYS */;
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
  CONSTRAINT `fk_property_has_locations_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`)
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
  CONSTRAINT `fk_propertyPhoto_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`)
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
  CONSTRAINT `fk_property_tours_property1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  CONSTRAINT `fk_property_tours_tourDaysOfWeek1` FOREIGN KEY (`tourDaysOfWeek_id`) REFERENCES `tourdaysofweek` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_tours`
--

LOCK TABLES `property_tours` WRITE;
/*!40000 ALTER TABLE `property_tours` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `street_types`
--

LOCK TABLES `street_types` WRITE;
/*!40000 ALTER TABLE `street_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `street_types` ENABLE KEYS */;
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
  `devices_id` int NOT NULL,
  `logos_id` int NOT NULL,
  `notification_id` int NOT NULL,
  `email_id` varchar(45) NOT NULL,
  `domainName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_systems_general1_idx` (`general_id`),
  KEY `fk_systems_devices1_idx` (`devices_id`),
  KEY `fk_systems_logos1_idx` (`logos_id`),
  KEY `fk_systems_notification1_idx` (`notification_id`),
  KEY `fk_systems_email1_idx` (`email_id`),
  CONSTRAINT `fk_systems_devices1` FOREIGN KEY (`devices_id`) REFERENCES `devices` (`id`),
  CONSTRAINT `fk_systems_email1` FOREIGN KEY (`email_id`) REFERENCES `email` (`id`),
  CONSTRAINT `fk_systems_general1` FOREIGN KEY (`general_id`) REFERENCES `general` (`id`),
  CONSTRAINT `fk_systems_logos1` FOREIGN KEY (`logos_id`) REFERENCES `logos` (`id`),
  CONSTRAINT `fk_systems_notification1` FOREIGN KEY (`notification_id`) REFERENCES `notification` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systems`
--

LOCK TABLES `systems` WRITE;
/*!40000 ALTER TABLE `systems` DISABLE KEYS */;
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
  CONSTRAINT `fk_systems_has_properties_properties1` FOREIGN KEY (`properties_id`, `properties_clients_companies_id`) REFERENCES `properties` (`id`, `clients_companies_id`),
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
  CONSTRAINT `fk_systems_has_property_group_property_group1` FOREIGN KEY (`property_group_id`) REFERENCES `property_group` (`id`),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taskdaysofweek`
--

LOCK TABLES `taskdaysofweek` WRITE;
/*!40000 ALTER TABLE `taskdaysofweek` DISABLE KEYS */;
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
  `unites_id` int NOT NULL,
  `location` varchar(45) DEFAULT NULL,
  `taskTime` varchar(45) DEFAULT NULL,
  `taskDaysOfWeek_id` int NOT NULL,
  `alertIfLeftOpen` int DEFAULT NULL,
  `disableTaskAfterDate` date DEFAULT NULL,
  `lastIssuedDate` date DEFAULT NULL,
  `taskCurrentStatus` varchar(45) DEFAULT NULL,
  `isActive` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tasks_issue_types1_idx` (`issue_types_id`),
  KEY `fk_tasks_property_addresses1_idx` (`property_addresses_id`),
  KEY `fk_tasks_taskDaysOfWeek1_idx` (`taskDaysOfWeek_id`),
  KEY `fk_tasks_unites1_idx` (`unites_id`),
  CONSTRAINT `fk_tasks_issue_types1` FOREIGN KEY (`issue_types_id`) REFERENCES `issue_types` (`id`),
  CONSTRAINT `fk_tasks_property_addresses1` FOREIGN KEY (`property_addresses_id`) REFERENCES `property_addresses` (`id`),
  CONSTRAINT `fk_tasks_taskDaysOfWeek1` FOREIGN KEY (`taskDaysOfWeek_id`) REFERENCES `taskdaysofweek` (`id`),
  CONSTRAINT `fk_tasks_unites1` FOREIGN KEY (`unites_id`) REFERENCES `unites` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tourdaysofweek`
--

LOCK TABLES `tourdaysofweek` WRITE;
/*!40000 ALTER TABLE `tourdaysofweek` DISABLE KEYS */;
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
  `unitNumberPrefix` varchar(45) DEFAULT NULL,
  `startingUnitNumber` int DEFAULT NULL,
  `unitNumberIncrement` int DEFAULT NULL,
  `endingUnitNumber` int DEFAULT NULL,
  `unitNumberSuffix` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unites_property_addresses1_idx` (`property_addresses_id`),
  CONSTRAINT `fk_unites_property_addresses1` FOREIGN KEY (`property_addresses_id`) REFERENCES `property_addresses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unites`
--

LOCK TABLES `unites` WRITE;
/*!40000 ALTER TABLE `unites` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_notification`
--

LOCK TABLES `users_notification` WRITE;
/*!40000 ALTER TABLE `users_notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'falcon'
--

--
-- Dumping routines for database 'falcon'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-23 20:19:21

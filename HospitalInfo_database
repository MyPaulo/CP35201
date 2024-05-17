-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: HospitalInfo
-- ------------------------------------------------------
-- Server version	5.5.54-0ubuntu0.12.04.1

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
-- Table structure for table `Contracts`
--

DROP TABLE IF EXISTS `Contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contracts` (
  `PID` int(11) NOT NULL,
  `RxName` varchar(32) NOT NULL,
  `Start_date` varchar(16) DEFAULT NULL,
  `End_date` varchar(16) DEFAULT NULL,
  `Supervisor` varchar(32) DEFAULT NULL,
  `Pharmacy_Name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`PID`,`RxName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contracts`
--

LOCK TABLES `Contracts` WRITE;
/*!40000 ALTER TABLE `Contracts` DISABLE KEYS */;
INSERT INTO `Contracts` VALUES (1,'DrugMart_RX','1-1-2010','31-12-2019','Mrs Walsh','HELPILL'),(2,'DrugMart_RX','1-1-2012','1-1-2020','Barry','Medicheart'),(3,'DrugMart_RX','1-1-2005','1-1-2020','Pheme','Vitaminify');
/*!40000 ALTER TABLE `Contracts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Doctors`
--

DROP TABLE IF EXISTS `Doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Doctors` (
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `dSIN` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(32) DEFAULT NULL,
  `Specialty` varchar(32) DEFAULT NULL,
  `Year_Exp` int(11) DEFAULT NULL,
  PRIMARY KEY (`dSIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Doctors`
--

LOCK TABLES `Doctors` WRITE;
/*!40000 ALTER TABLE `Doctors` DISABLE KEYS */;
INSERT INTO `Doctors` VALUES ('Ryan Kelly','7507cc74045df12deb3d3c602fcd0ed1','d001','Ryan Kelly','Pediatric',10),('Peter Pan','c3139de98753fd9235fe85a166ad5cef','d002','Peter Pan','General Medicine',20),('Peter Parker','923ff9a3308364310a4b5e33452be2db','d003','Peter Parker','Surgery',30),('Paul Osuji','6a1d93b97e893ec956835d481055eb97','d004','Paul Osuji','Surgeon',5);
/*!40000 ALTER TABLE `Doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Drug`
--

DROP TABLE IF EXISTS `Drug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Drug` (
  `Trade_Name` varchar(32) NOT NULL,
  `Formula` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`Trade_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Drug`
--

LOCK TABLES `Drug` WRITE;
/*!40000 ALTER TABLE `Drug` DISABLE KEYS */;
INSERT INTO `Drug` VALUES ('Insulin','Novolin'),('Penicillin','Pfizerpen'),('Tylenol','C8H9NO2');
/*!40000 ALTER TABLE `Drug` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Have`
--

DROP TABLE IF EXISTS `Have`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Have` (
  `pSIN` varchar(16) NOT NULL DEFAULT '',
  `dSIN` varchar(16) NOT NULL DEFAULT '',
  `Pri_Phy` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`dSIN`,`pSIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Have`
--

LOCK TABLES `Have` WRITE;
/*!40000 ALTER TABLE `Have` DISABLE KEYS */;
INSERT INTO `Have` VALUES ('p001','6a1d93b97e893ec9','Paul Osuji'),('p002','6a1d93b97e893ec9','Paul Osuji'),('p004','6a1d93b97e893ec9','Paul Osuji'),('p005','6a1d93b97e893ec9','Paul Osuji'),('p006','6a1d93b97e893ec9','Paul Osuji'),('p008','6a1d93b97e893ec9','Paul Osuji'),('p009','6a1d93b97e893ec9','Paul Osuji'),('p003','d002','Paul Osuji');
/*!40000 ALTER TABLE `Have` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Makes`
--

DROP TABLE IF EXISTS `Makes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Makes` (
  `Trade_Name` varchar(32) NOT NULL,
  `RxName` varchar(32) NOT NULL,
  PRIMARY KEY (`Trade_Name`,`RxName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Makes`
--

LOCK TABLES `Makes` WRITE;
/*!40000 ALTER TABLE `Makes` DISABLE KEYS */;
INSERT INTO `Makes` VALUES ('Insulin','DrugMart_Rx'),('Tylenol','DrugMart_Rx');
/*!40000 ALTER TABLE `Makes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Patients`
--

DROP TABLE IF EXISTS `Patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Patients` (
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `pSIN` varchar(32) NOT NULL DEFAULT '',
  `Name` varchar(32) DEFAULT NULL,
  `Address` varchar(32) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  PRIMARY KEY (`pSIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Patients`
--

LOCK TABLES `Patients` WRITE;
/*!40000 ALTER TABLE `Patients` DISABLE KEYS */;
INSERT INTO `Patients` VALUES ('Cam','6a79a5630c94e097520365217ea74cf0','p001','Cam Kennedy','30 mad street',21),('Paul','00de5d7a1305f0ab6b21df3562900a58','p002','Paul','23 some-lane',20),('Ryan','4da8734ac3be3197ec68bc27bff19840','p004','Ryan','23 dome dr',34),('Paulo','9fb64a2db0c1797292fac0def3f962ce','p005','Paulo','45 some lane',45);
/*!40000 ALTER TABLE `Patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pescription`
--

DROP TABLE IF EXISTS `Pescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pescription` (
  `pSIN` varchar(16) NOT NULL DEFAULT '',
  `dSIN` varchar(16) DEFAULT NULL,
  `Trade_Name` varchar(32) NOT NULL,
  `Date` varchar(16) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`pSIN`,`Trade_Name`,`Date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pescription`
--

LOCK TABLES `Pescription` WRITE;
/*!40000 ALTER TABLE `Pescription` DISABLE KEYS */;
INSERT INTO `Pescription` VALUES ('p001','d002','quin','12-11-2019',4),('p001','d001','Tylenol','12-11-2019',5),('p002','d002','Quin','20-3-2019',10);
/*!40000 ALTER TABLE `Pescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pharmacy`
--

DROP TABLE IF EXISTS `Pharmacy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pharmacy` (
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `PID` varchar(32) NOT NULL DEFAULT '',
  `Name` varchar(32) DEFAULT NULL,
  `Address` varchar(32) DEFAULT NULL,
  `Phone_no` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pharmacy`
--

LOCK TABLES `Pharmacy` WRITE;
/*!40000 ALTER TABLE `Pharmacy` DISABLE KEYS */;
INSERT INTO `Pharmacy` VALUES ('HELPILL','08a2e141b32aa234a67bef634ed8d20d','1','HELPILL','200 main land','1-800-825-4545'),('Medicheart','e23269d148ea386fe8d7a2f552950353','2','Medicheart','201 Fake Street','1-800-828-772'),('Vitaminify','2d21b2bb73b0c475c8b0d8184f5f861a','3','Vitaminify','21 Portugal Cove','1-800-823-8383');
/*!40000 ALTER TABLE `Pharmacy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RxCompany`
--

DROP TABLE IF EXISTS `RxCompany`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `RxCompany` (
  `RxName` varchar(32) NOT NULL,
  `Phone_no` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`RxName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RxCompany`
--

LOCK TABLES `RxCompany` WRITE;
/*!40000 ALTER TABLE `RxCompany` DISABLE KEYS */;
INSERT INTO `RxCompany` VALUES ('DrugMart_Rx','1-800-466-3434');
/*!40000 ALTER TABLE `RxCompany` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sells`
--

DROP TABLE IF EXISTS `Sells`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sells` (
  `PID` int(11) NOT NULL,
  `Trade_Name` varchar(32) NOT NULL DEFAULT '',
  `Prices` double(6,2) DEFAULT NULL,
  `Pharmacy_Name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`Trade_Name`,`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sells`
--

LOCK TABLES `Sells` WRITE;
/*!40000 ALTER TABLE `Sells` DISABLE KEYS */;
INSERT INTO `Sells` VALUES (1,'Insulin',75.00,'HELPILL'),(2,'Penicillin',80.00,'Vitaminify'),(3,'Tylenol',45.00,'Medicheart');
/*!40000 ALTER TABLE `Sells` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('Doctor','cbb67c65f2abd1005d46939a7b3aff5f');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-02 10:59:02

-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: masterDB
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

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
-- Table structure for table `dataTable`
--

DROP TABLE IF EXISTS `dataTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dataTable` (
  `Time Stamp` varchar(20) NOT NULL,
  `Time Played` int(12) NOT NULL,
  `Hand Palm Position x` float NOT NULL,
  `Hand Palm Position y` float NOT NULL,
  `Hand Palm Position Z` float NOT NULL,
  `Palm Norm x` float NOT NULL,
  `Palm Norm y` float NOT NULL,
  `Palm Norm z` float NOT NULL,
  `Wrist Position x` float NOT NULL,
  `Wrist Position y` float NOT NULL,
  `Wrist Position z` float NOT NULL,
  `Thumb TYPE_METACARPAL x` float NOT NULL,
  `Thumb TYPE_METACARPAL y` float NOT NULL,
  `Thumb TYPE_METACARPAL z` float NOT NULL,
  `Thumb TYPE_PROXIMAL x` float NOT NULL,
  `Thumb TYPE_PROXIMAL y` float NOT NULL,
  `Thumb TYPE_PROXIMAL z` float NOT NULL,
  `Thumb TYPE_INTERMEDIATE x` float NOT NULL,
  `Thumb TYPE_INTERMEDIATE y` float NOT NULL,
  `Thumb TYPE_INTERMEDIATE z` float NOT NULL,
  `Thumb TYPE_DISTAL x` float NOT NULL,
  `Thumb TYPE_DISTAL y` float NOT NULL,
  `Thumb TYPE_DISTAL z` float NOT NULL,
  `Thumb Finger Tip x` float NOT NULL,
  `Thumb Finger Tip y` float NOT NULL,
  `Thumb Finger Tip z` float NOT NULL,
  `Index TYPE_METACARPAL x` float NOT NULL,
  `Index TYPE_METACARPAL y` float NOT NULL,
  `Index TYPE_METACARPAL z` float NOT NULL,
  `Index TYPE_PROXIMAL x` float NOT NULL,
  `Index TYPE_PROXIMAL y` float NOT NULL,
  `Index TYPE_PROXIMAL z` float NOT NULL,
  `Index TYPE_INTERMEDIATE x` float NOT NULL,
  `Index TYPE_INTERMEDIATE y` float NOT NULL,
  `Index TYPE_INTERMEDIATE z` float NOT NULL,
  `Index TYPE_DISTAL x` float NOT NULL,
  `Index TYPE_DISTAL y` float NOT NULL,
  `Index TYPE_DISTAL z` float NOT NULL,
  `Index Finger Tip x` float NOT NULL,
  `Index Finger Tip y` float NOT NULL,
  `Index Finger Tip z` float NOT NULL,
  `Middle TYPE_METACARPAL x` float NOT NULL,
  `Middle TYPE_METACARPAL y` float NOT NULL,
  `Middle TYPE_METACARPAL z` float NOT NULL,
  `Middle TYPE_PROXIMAL x` float NOT NULL,
  `Middle TYPE_PROXIMAL y` float NOT NULL,
  `Middle TYPE_PROXIMAL z` float NOT NULL,
  `Middle TYPE_INTERMEDIATE x` float NOT NULL,
  `Middle TYPE_INTERMEDIATE y` float NOT NULL,
  `Middle TYPE_INTERMEDIATE z` float NOT NULL,
  `Middle TYPE_DISTAL x` float NOT NULL,
  `Middle TYPE_DISTAL y` float NOT NULL,
  `Middle TYPE_DISTAL z` float NOT NULL,
  `Middle Finger Tip x` float NOT NULL,
  `Middle Finger Tip y` float NOT NULL,
  `Middle Finger Tip z` float NOT NULL,
  `Ring TYPE_METACARPAL x` float NOT NULL,
  `Ring TYPE_METACARPAL y` float NOT NULL,
  `Ring TYPE_METACARPAL z` float NOT NULL,
  `Ring TYPE_PROXIMAL x` float NOT NULL,
  `Ring TYPE_PROXIMAL y` float NOT NULL,
  `Ring TYPE_PROXIMAL z` float NOT NULL,
  `Ring TYPE_INTERMEDIATE x` float NOT NULL,
  `Ring TYPE_INTERMEDIATE y` float NOT NULL,
  `Ring TYPE_INTERMEDIATE z` float NOT NULL,
  `Ring TYPE_DISTAL x` float NOT NULL,
  `Ring TYPE_DISTAL y` float NOT NULL,
  `Ring TYPE_DISTAL z` float NOT NULL,
  `Ring Finger Tip x` float NOT NULL,
  `Ring Finger Tip y` float NOT NULL,
  `Ring Finger Tip z` float NOT NULL,
  `Pinky TYPE_METACARPAL x` float NOT NULL,
  `Pinky TYPE_METACARPAL y` float NOT NULL,
  `Pinky TYPE_METACARPAL z` float NOT NULL,
  `Pinky TYPE_PROXIMAL x` float NOT NULL,
  `Pinky TYPE_PROXIMAL y` float NOT NULL,
  `Pinky TYPE_PROXIMAL z` float NOT NULL,
  `Pinky TYPE_INTERMEDIATE x` float NOT NULL,
  `Pinky TYPE_INTERMEDIATE y` float NOT NULL,
  `Pinky TYPE_INTERMEDIATE z` float NOT NULL,
  `Pinky TYPE_DISTAL x` float NOT NULL,
  `Pinky TYPE_DISTAL y` float NOT NULL,
  `Pinky TYPE_DISTAL z` float NOT NULL,
  `Pinky Finger Tip x` float NOT NULL,
  `Pinky Finger Tip y` float NOT NULL,
  `Pinky Finger Tip z` float NOT NULL,
  `Hand Opening` float NOT NULL,
  `Car Speed` float NOT NULL,
  `Car Flipped` float NOT NULL,
  `Palm Roll` float NOT NULL,
  `Coins Collected` float NOT NULL,
  `Lifetime Coins` float NOT NULL,
  `Current Level` varchar(50) NOT NULL,
  `Date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dataTable`
--

LOCK TABLES `dataTable` WRITE;
/*!40000 ALTER TABLE `dataTable` DISABLE KEYS */;
/*!40000 ALTER TABLE `dataTable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `username` varchar(30) NOT NULL,
  `password` varchar(512) NOT NULL,
  `role` varchar(20) NOT NULL,
  `Therapist` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES ('Matt','b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86','researcher',NULL),('Tekken','b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86','patient','testHCP'),('testHCP','b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86','hcp',NULL),('testPatient','b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86','patient','testHCP'),('testResearcher','b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86','researcher',NULL),('testUser','b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86','researcher',NULL);
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patientInfo`
--

DROP TABLE IF EXISTS `patientInfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patientInfo` (
  `ID` varchar(255) NOT NULL,
  `Patient Group` int(11) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` int(11) NOT NULL,
  `Time Since Stroke` int(11) NOT NULL,
  `Affected Hand` int(11) NOT NULL,
  `Handedness` varchar(10) NOT NULL,
  `Lesion Location` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patientInfo`
--

LOCK TABLES `patientInfo` WRITE;
/*!40000 ALTER TABLE `patientInfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `patientInfo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-01 13:40:12

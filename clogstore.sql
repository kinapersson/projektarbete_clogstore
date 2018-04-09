-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: wies17_projektarbete
-- ------------------------------------------------------
-- Server version	5.6.34-log

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
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `ATID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `Street` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Zipcode` int(11) NOT NULL,
  `City` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  KEY `fk_address_user_idx` (`UID`),
  KEY `fk_address_addresstype_idx` (`ATID`),
  CONSTRAINT `fk_address_addresstype` FOREIGN KEY (`ATID`) REFERENCES `addresstype` (`ATID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_address_user` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,1,'Hejvägen 1',12345,'Stockholm'),(2,1,'Tjavägen 2',12345,'Stockholm'),(1,2,'Hohovägen 3',12345,'Stockholm'),(2,2,'Hohovägen 3',12345,'Stockholm'),(2,3,'Hallåvägen 4',12345,'Stockholm');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addresstype`
--

DROP TABLE IF EXISTS `addresstype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresstype` (
  `ATID` int(11) NOT NULL AUTO_INCREMENT,
  `AddressType` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ATID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresstype`
--

LOCK TABLES `addresstype` WRITE;
/*!40000 ALTER TABLE `addresstype` DISABLE KEYS */;
INSERT INTO `addresstype` VALUES (1,'Delivery'),(2,'Invoice');
/*!40000 ALTER TABLE `addresstype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute`
--

DROP TABLE IF EXISTS `attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute` (
  `PID` int(11) NOT NULL,
  `ATID` int(11) NOT NULL,
  KEY `FK_PIDAttribute_idx` (`PID`),
  KEY `FK_ATIDAttribute_idx` (`ATID`),
  CONSTRAINT `FK_ATIDAttribute` FOREIGN KEY (`ATID`) REFERENCES `attributetype` (`ATID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_PIDAttribute` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute`
--

LOCK TABLES `attribute` WRITE;
/*!40000 ALTER TABLE `attribute` DISABLE KEYS */;
INSERT INTO `attribute` VALUES (1,1),(2,2),(3,1);
/*!40000 ALTER TABLE `attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attributetype`
--

DROP TABLE IF EXISTS `attributetype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attributetype` (
  `ATID` int(11) NOT NULL AUTO_INCREMENT,
  `AttributeTypeName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ATID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attributetype`
--

LOCK TABLES `attributetype` WRITE;
/*!40000 ALTER TABLE `attributetype` DISABLE KEYS */;
INSERT INTO `attributetype` VALUES (1,'Wood'),(2,'Black');
/*!40000 ALTER TABLE `attributetype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `catid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Dam'),(2,'Herr'),(3,'Barn');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `PID` int(11) NOT NULL,
  `ImageUrl` longblob,
  KEY `FK_PIDImage_idx` (`PID`),
  CONSTRAINT `FK_PIDImage` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (1,'URL'),(2,'URL'),(3,'URL');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model` (
  `MID` int(11) NOT NULL AUTO_INCREMENT,
  `PID` int(11) NOT NULL,
  `Stock` int(10) unsigned NOT NULL,
  PRIMARY KEY (`MID`),
  KEY `fk_product_idx` (`PID`)
) ENGINE=InnoDB AUTO_INCREMENT=303 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model`
--

LOCK TABLES `model` WRITE;
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` VALUES (1,1,39),(2,2,26),(3,3,30);
/*!40000 ALTER TABLE `model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `OID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `AddressDelivery` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `PaymentDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `OrderStatus` int(11) NOT NULL,
  `PaymentMethod` int(11) NOT NULL,
  PRIMARY KEY (`OID`),
  KEY `FK_UIDOrder_idx` (`UID`),
  CONSTRAINT `FK_UIDOrder` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,1,'2018-03-23 13:08:29','','0000-00-00 00:00:00',2,2);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderproduct`
--

DROP TABLE IF EXISTS `orderproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderproduct` (
  `OID` int(11) NOT NULL AUTO_INCREMENT,
  `PID` int(11) NOT NULL,
  `Amount` varchar(45) NOT NULL,
  `OrdeProductPrice` varchar(45) NOT NULL,
  `MID` int(11) NOT NULL,
  PRIMARY KEY (`OID`,`MID`,`PID`),
  KEY `Fk_Model_idx` (`MID`),
  KEY `Fk_product_idx` (`PID`),
  CONSTRAINT `Fk_Model` FOREIGN KEY (`MID`) REFERENCES `model` (`MID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Fk_order` FOREIGN KEY (`OID`) REFERENCES `order` (`OID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `Fk_product` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderproduct`
--

LOCK TABLES `orderproduct` WRITE;
/*!40000 ALTER TABLE `orderproduct` DISABLE KEYS */;
/*!40000 ALTER TABLE `orderproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phone`
--

DROP TABLE IF EXISTS `phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phone` (
  `UID` int(11) NOT NULL,
  `PTID` int(11) NOT NULL,
  `Number` int(11) NOT NULL,
  KEY `FK_UIDPhone_idx` (`UID`),
  KEY `FK_PTIDPhone_idx` (`PTID`),
  CONSTRAINT `FK_PTIDPhone` FOREIGN KEY (`PTID`) REFERENCES `phonetype` (`PTID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_UIDPhone` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone`
--

LOCK TABLES `phone` WRITE;
/*!40000 ALTER TABLE `phone` DISABLE KEYS */;
INSERT INTO `phone` VALUES (1,1,731234567),(2,2,8123456),(3,1,8123456),(1,2,8123456);
/*!40000 ALTER TABLE `phone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phonetype`
--

DROP TABLE IF EXISTS `phonetype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phonetype` (
  `PTID` int(11) NOT NULL AUTO_INCREMENT,
  `PhoneType` varchar(45) NOT NULL,
  PRIMARY KEY (`PTID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phonetype`
--

LOCK TABLES `phonetype` WRITE;
/*!40000 ALTER TABLE `phonetype` DISABLE KEYS */;
INSERT INTO `phonetype` VALUES (1,'Mobile'),(2,'Work');
/*!40000 ALTER TABLE `phonetype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodcat`
--

DROP TABLE IF EXISTS `prodcat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prodcat` (
  `pid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  KEY `FK_PIDprodcat_idx` (`pid`),
  KEY `FK_CATIDprodcat_idx` (`catid`),
  CONSTRAINT `FK_CATIDprodcat` FOREIGN KEY (`catid`) REFERENCES `category` (`catid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_PIDprodcat` FOREIGN KEY (`pid`) REFERENCES `product` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodcat`
--

LOCK TABLES `prodcat` WRITE;
/*!40000 ALTER TABLE `prodcat` DISABLE KEYS */;
INSERT INTO `prodcat` VALUES (1,1),(1,2),(2,3),(3,1);
/*!40000 ALTER TABLE `prodcat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Price` float NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Moheda Kats','Tjusig träsandal i äkta läder. ',999),(2,'Moheda Molly','Träskosandal i läder.',239),(3,'Moheda Anton','Klassisk träsko.',249);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `size` (
  `MID` int(11) NOT NULL,
  `Size` int(11) NOT NULL,
  KEY `FK_MIDSize_idx` (`MID`),
  KEY `FK_CatSize_idx` (`Size`),
  CONSTRAINT `FK_MIDSize` FOREIGN KEY (`MID`) REFERENCES `model` (`MID`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size`
--

LOCK TABLES `size` WRITE;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` VALUES (1,34),(1,34),(1,34),(1,34),(1,34),(2,39),(2,39),(2,39),(3,40),(3,41),(3,42),(3,43),(3,44);
/*!40000 ALTER TABLE `size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`UID`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Robin','robin@gmail.com','fisken',''),(2,'Marie','marie@gmail.com','hejsan',''),(3,'Preeti','preti@gmail.com','hoppsan',''),(4,'Kina','kina@gmail.com','kina','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-09 12:34:50

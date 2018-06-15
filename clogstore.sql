-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: clogstore
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
  `ADID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `Street` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Zipcode` int(11) NOT NULL,
  `City` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  KEY `fk_address_user_idx` (`UID`),
  KEY `fk_address_addresstype_idx` (`ADID`),
  CONSTRAINT `fk_address_addresstype` FOREIGN KEY (`ADID`) REFERENCES `addresstype` (`ADID`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  `ADID` int(11) NOT NULL AUTO_INCREMENT,
  `AddressType` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ADID`)
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
INSERT INTO `attribute` VALUES (28,1),(30,1),(1,1),(2,1),(31,1),(3,1),(29,2),(33,2);
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
  `AttributeNameType` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Men'),(2,'Women'),(3,'Kids'),(4,'Featured Products');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `imageid` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`imageid`),
  KEY `uid_idx` (`uid`),
  CONSTRAINT `FK_UIDimages` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
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
  PRIMARY KEY (`OID`,`PID`),
  KEY `Fk_product_idx` (`PID`),
  CONSTRAINT `Fk_order` FOREIGN KEY (`OID`) REFERENCES `orders` (`OID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `Fk_product` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderproduct`
--

LOCK TABLES `orderproduct` WRITE;
/*!40000 ALTER TABLE `orderproduct` DISABLE KEYS */;
INSERT INTO `orderproduct` VALUES (7,2,'1','239'),(8,1,'1','999'),(8,30,'1','399'),(9,1,'1','999'),(9,30,'1','399'),(10,1,'1','999'),(10,30,'1','399'),(11,1,'2','1998'),(11,2,'1','239'),(12,1,'1','999'),(12,2,'1','239'),(13,1,'1','999'),(13,2,'1','239'),(14,1,'3','2997'),(14,2,'1','239'),(14,28,'1','399'),(15,1,'3','2997'),(15,2,'1','239'),(15,28,'1','399'),(17,29,'2','1398'),(18,3,'1','249'),(18,29,'1','699');
/*!40000 ALTER TABLE `orderproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `OID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `AddressDelivery` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `PaymentDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `OrderStatus` int(11) NOT NULL,
  `PaymentMethod` int(11) NOT NULL,
  PRIMARY KEY (`OID`),
  KEY `FK_UIDOrder_idx` (`UID`),
  CONSTRAINT `FK_UIDOrder` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (2,1,'2018-05-04 06:57:25','hejsan','0000-00-00 00:00:00',1,1),(7,6,'2018-06-11 22:00:00','kina_persson@hotmail.com','2018-06-11 22:00:00',1,1),(8,7,'2018-06-12 22:00:00','kina_persson@hotmail.com','2018-06-12 22:00:00',1,1),(9,7,'2018-06-12 22:00:00','abc','2018-06-12 22:00:00',1,1),(10,7,'2018-06-12 22:00:00','abc','2018-06-12 22:00:00',1,1),(11,7,'2018-06-12 22:00:00','abc','2018-06-12 22:00:00',1,1),(12,8,'2018-06-12 22:00:00','iowdj','2018-06-12 22:00:00',1,1),(13,8,'2018-06-12 22:00:00','dwljoi','2018-06-12 22:00:00',1,1),(14,8,'2018-06-12 22:00:00','oko','2018-06-12 22:00:00',1,1),(15,8,'2018-06-12 22:00:00','oko','2018-06-12 22:00:00',1,1),(17,6,'2018-06-12 22:00:00','okok','2018-06-12 22:00:00',1,1),(18,6,'2018-06-12 22:00:00','kungsgatan','2018-06-12 22:00:00',1,2);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pageinfo`
--

DROP TABLE IF EXISTS `pageinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pageinfo` (
  `pageid` int(11) NOT NULL,
  `aboutus` varchar(250) NOT NULL,
  `contactus` varchar(100) NOT NULL,
  PRIMARY KEY (`pageid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pageinfo`
--

LOCK TABLES `pageinfo` WRITE;
/*!40000 ALTER TABLE `pageinfo` DISABLE KEYS */;
INSERT INTO `pageinfo` VALUES (0,'Wooden Clogs Crafted In Sweden! You have now reached the homepage for the factory that produce the famous wooden clogs from Moheda, Sweden. Here you find the traditional swedish wooden clogs, soft clogs as well as high fashion clogs.','<p>Phone: 08-123 123</p><p>E-mail: hej@clogstore.se</p>');
/*!40000 ALTER TABLE `pageinfo` ENABLE KEYS */;
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
INSERT INTO `prodcat` VALUES (28,3),(28,4),(30,1),(1,2),(2,3),(31,4),(3,1),(29,4),(33,4);
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
  `Description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Price` float NOT NULL,
  `Image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Moheda Kats','Retro clog with open front part.',999,'media/pid1.jpg'),(2,'Moheda Molly','A lovely wooden clog with adjustable straps.',239,'media/pid2.jpg'),(3,'Moheda Anton','Classic clog in black leather.',249,'media/pid3.jpg'),(28,'Moheda Molly ','Woodenclog- sandal with backstrap.',399,'media/4c4a0b5f21e4b5a282fc498e788ca986.jpg'),(29,'Moheda Pegasus','A lovely wooden clog in soft PullUp leather. ',699,'media/9c6b1bdedbcc2ff728a70223f6f602a0.jpg'),(30,'Moheda Royal','Retro slippers. 40s are back. Cozy and comfortable.',399,'media/a7475a9a4eed86d1fc0980a36f0742e3.jpg'),(31,'Moheda Britt','Wooden clog sandal with open front part.',499,'media/aff6467062a7a59e70a4af4624567544.jpg'),(33,'Moheda Sara','A lovely wooden clog in soft PullUp leather. ',499,'media/699e1f335b8b2ffd139255fef9b73436.jpg');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `size` (
  `PID` int(11) NOT NULL,
  `Size` int(11) NOT NULL,
  `Stock` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`PID`,`Size`),
  KEY `FK_size_product_idx` (`PID`),
  CONSTRAINT `FK_size_product` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size`
--

LOCK TABLES `size` WRITE;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` VALUES (1,32,21),(1,33,5),(2,37,6),(2,38,9),(2,39,0),(3,40,7),(3,41,7),(3,42,7),(28,25,8),(28,26,8),(28,27,8),(28,28,9),(28,29,10),(29,40,10),(29,41,10),(29,42,10),(30,40,10),(30,41,10),(30,42,10),(31,37,21),(31,38,8),(31,39,17),(33,37,21),(33,38,8),(33,39,17);
/*!40000 ALTER TABLE `size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `userlevel` int(11) NOT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `Email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Robin','robin@gmail.com','fisken',1,''),(2,'Marie','marie@gmail.com','hejsan',1,''),(3,'Preeti','preti@gmail.com','hoppsan',1,''),(4,'Kina','kina@gmail.com','kina',1,''),(6,'Kina Persson','kina_persson@hotmail.com','$2y$10$dKuVNr.KoywOiFHUkqf7P.qopgeR2q/DEc2qmG',1,'0736357000'),(7,'Peter','peter@peter.com','$2y$10$zS4z2tIAlsBnzJCTuMk/keaoHiznRcSBOILteY',0,'08161525'),(8,'Kina Persson','kina_peron@hotmail.com','$2y$10$f0RjiOf64zEhsioLEUIp4eg/5b89Jyal15f256',0,'0736357000');
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

-- Dump completed on 2018-06-13 16:50:24

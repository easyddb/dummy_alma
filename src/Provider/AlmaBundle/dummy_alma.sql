-- MySQL dump 10.13  Distrib 5.5.24, for Win32 (x86)
--
-- Host: localhost    Database: dummy_alma
-- ------------------------------------------------------
-- Server version	5.5.24-log

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
  `addr_id` int(11) NOT NULL AUTO_INCREMENT,
  `zipCode` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `streetAddress` varchar(255) NOT NULL,
  `isEditable` varchar(3) NOT NULL,
  `isDeletable` varchar(3) NOT NULL,
  `isActive` varchar(3) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `careOf` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  PRIMARY KEY (`addr_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,9800,1,'Adresse --','no','no','yes','-- Danmark -','Hjørring','-- c/o navn --','Adresse --');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `borrcard`
--

DROP TABLE IF EXISTS `borrcard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `borrcard` (
  `borr_id` int(11) NOT NULL AUTO_INCREMENT,
  `isValid` varchar(3) NOT NULL,
  `cardNumber` varchar(32) NOT NULL,
  `cardPin` varchar(255) NOT NULL,
  `isEditable` varchar(3) NOT NULL,
  `isDeletable` varchar(3) NOT NULL,
  PRIMARY KEY (`borr_id`),
  KEY `cardNumber` (`cardNumber`,`cardPin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrcard`
--

LOCK TABLES `borrcard` WRITE;
/*!40000 ALTER TABLE `borrcard` DISABLE KEYS */;
INSERT INTO `borrcard` VALUES (1,'yes','1111110022','5555','no','no');
/*!40000 ALTER TABLE `borrcard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches` (
  `bra_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  `shortname` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `language` varchar(5) NOT NULL,
  `organisation` int(11) NOT NULL,
  PRIMARY KEY (`bra_id`),
  UNIQUE KEY `id` (`id`),
  KEY `code` (`code`,`shortname`,`name`),
  KEY `language` (`language`),
  KEY `fk_branch_org_idx` (`organisation`),
  CONSTRAINT `fk_branch_org` FOREIGN KEY (`organisation`) REFERENCES `organisations` (`org_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES (1,'hj~oe','hjø','hjø','Hjørring','da_DK',1),(2,'hir','hir','hir','Hirtshals','da_DK',1),(3,'sin','sin','sin','Sindal','da_DK',1),(4,'vr~aa','vrå','vrå','Vrå','da_DK',1),(5,'bus','bus','bus','Bogbus','da_DK',1),(6,'l~oek','løk','løk','Løkken','da_DK',1);
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches_org`
--

DROP TABLE IF EXISTS `branches_org`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches_org` (
  `bra_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  `shortname` varchar(32) NOT NULL,
  `name` varchar(256) NOT NULL,
  `language` varchar(32) NOT NULL,
  PRIMARY KEY (`bra_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `code` (`code`),
  KEY `language` (`language`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches_org`
--

LOCK TABLES `branches_org` WRITE;
/*!40000 ALTER TABLE `branches_org` DISABLE KEYS */;
INSERT INTO `branches_org` VALUES (1,'','','','','da_DK'),(2,'bin','bin','bin','Børneinstitution','da_DK'),(3,'bus','bus','bus','Bogbus','da_DK'),(4,'dag','dag','dag','KAN IKKE LÅNES -(dag)','da_DK'),(5,'fje','fje','fje','Fjernlånte materialer','da_DK'),(6,'hir','hir','hir','Hirtshals','da_DK'),(7,'hj~oe','hjø','hjø','Hjørring','da_DK'),(8,'l~oek','løk','løk','Løkken','da_DK'),(9,'sin','sin','sin','Sindal','da_DK'),(10,'vkm','vkm','vkm','Vendsyssel Kunstmuseum','da_DK'),(11,'vr~aa','vrå','vrå','Vrå','da_DK');
/*!40000 ALTER TABLE `branches_org` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collections`
--

DROP TABLE IF EXISTS `collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collections` (
  `col_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  `shortname` varchar(32) NOT NULL,
  `name` varchar(45) NOT NULL,
  `language` varchar(5) NOT NULL,
  PRIMARY KEY (`col_id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collections`
--

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
INSERT INTO `collections` VALUES (99,'ta10','ta10','ta10','Ved Caféen i pose 10','da_DK'),(97,'ta08','ta08','ta08','Ved Caféen i pose 8','da_DK'),(98,'ta09','ta09','ta09','Ved Caféen i pose 9','da_DK'),(96,'ta07','ta07','ta07','Ved Caféen i pose 7','da_DK'),(94,'ta05','ta05','ta05','Ved Caféen i pose 5','da_DK'),(95,'ta06','ta06','ta06','Ved Caféen i pose 6','da_DK'),(93,'ta04','ta04','ta04','Ved Caféen i pose 4','da_DK'),(91,'ta02','ta02','ta02','Ved Caféen i pose 2','da_DK'),(92,'ta03','ta03','ta03','Ved Caféen i pose 3','da_DK'),(89,'reman','reman','reman','P.t. bortkommet','da_DK'),(90,'ta01','ta01','ta01','Ved Caféen i pose 1','da_DK'),(88,'paksam','paksam','paksam','BIMATERIALE --(paksam)','da_DK'),(87,'md','md','md','Dette eksemplar er p.t. ikke tilgængelig, men','da_DK'),(86,'ma','ma','ma','Dette eksemplar er p.t. ikke tilgængelig, men','da_DK'),(85,'kvik14','kvik14','kvik14','KVIKLÅN 14 dages lån (kan ikke reserveres)','da_DK'),(84,'kvik07','kvik07','kvik07','KVIKLÅN 7 dages lån (kan ikke reserveres)','da_DK'),(83,'ir4','ir4','ir4','--(Kan kun reserveres på mappe 4, idet mapper','da_DK'),(82,'ir3','ir3','ir3','--(Kan kun reserveres på mappe 3, idet mapper','da_DK'),(81,'ir1','ir1','ir1','--(Kan kun reserveres på mappe 1, idet mapper','da_DK'),(80,'ir','ir','ir','BUSSENs EKSEMPLAR KAN IKKE RESERVERES I JULI ','da_DK'),(79,'cs2','cs2','cs2','CS VED AT RETTE PROFILEN','da_DK'),(78,'cs','cs','cs','CS VED AT RETTE PROFILEN','da_DK'),(77,'borte1','borte1','borte1','Dette eksemplar er p.t. ikke tilgængelig, men','da_DK'),(76,'betalt','betalt','betalt','Dette eksemplar er p.t. ikke tilgængelig, men','da_DK'),(75,'alm','alm','alm','28 dages lån','da_DK'),(74,'GATE','GATE','GATE','Dette eksemplar er p.t. ikke tilgængelig, men','da_DK'),(73,'42','42','42','42 dages lån','da_DK'),(72,'2dags','2dags','2dags','2 dags udlån','da_DK'),(71,'28','28','28','','da_DK'),(70,'14','14','14','14 dages lån','da_DK'),(69,'07','07','07','7 dages lån','da_DK'),(68,'00ir','00ir','00ir','KAN IKKE UDLÅNES','da_DK'),(67,'00','00','00','KAN IKKE UDLÅNES','da_DK');
/*!40000 ALTER TABLE `collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `debts`
--

DROP TABLE IF EXISTS `debts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `debts` (
  `debt_id` int(11) NOT NULL AUTO_INCREMENT,
  `patron` int(11) NOT NULL,
  `organisation` int(11) NOT NULL,
  `debtNote` varchar(255) NOT NULL,
  `debtAmount` float NOT NULL,
  `debtType` varchar(64) NOT NULL,
  `debtDate` int(11) NOT NULL,
  `debtIdentifier` int(11) NOT NULL,
  PRIMARY KEY (`debt_id`),
  UNIQUE KEY `debtId` (`debtIdentifier`),
  KEY `fk_debt_patron_idx` (`patron`),
  KEY `fk_debt_org_idx` (`organisation`),
  CONSTRAINT `fk_debt_org` FOREIGN KEY (`organisation`) REFERENCES `organisations` (`org_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_debt_patron` FOREIGN KEY (`patron`) REFERENCES `patron` (`patr_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `debts`
--

LOCK TABLES `debts` WRITE;
/*!40000 ALTER TABLE `debts` DISABLE KEYS */;
INSERT INTO `debts` VALUES (1,1,1,'618178439  TESTPOST',1,'overdueFeeDebt',1407189600,629042);
/*!40000 ALTER TABLE `debts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  `shortname` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `language` varchar(5) NOT NULL,
  PRIMARY KEY (`dep_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `code` (`code`),
  KEY `language` (`language`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'b~oea','bøa','bøa','Børnesamling','da_DK'),(2,'b~oei','bøi','bøi','--spørg personalet (bøi)','da_DK'),(3,'b~oel','bøl','bøl','Børnesamling - MAGASIN - skal hentes af personalet','da_DK'),(4,'b~oes','bøs','bøs','Børnesamling - (depot fra indvandresamlingen)','da_DK'),(5,'b~oey','bøy','bøy','Børnesamling','da_DK'),(6,'b~oe~aa','bøå','bøå','Børnesamling - MAGASIN','da_DK'),(7,'fje','fje','fje','Fjernlån','da_DK'),(8,'voa','voa','voa','Voksensamling','da_DK'),(9,'voi','voi','voi','--spørg personalet (voi)','da_DK'),(10,'vol','vol','vol','Voksensamling - MAGASIN - skal hentes af personalet','da_DK'),(11,'vos','vos','vos','Voksensamling - (depot fra indvandresamlingen)','da_DK'),(12,'voy','voy','voy','Voksensamling','da_DK'),(13,'vo~aa','voå','voå','Voksensamling - MAGASIN','da_DK');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emailaddress`
--

DROP TABLE IF EXISTS `emailaddress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emailaddress` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `patron` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `isEditable` varchar(3) NOT NULL,
  `isDeletable` varchar(3) NOT NULL,
  `isActive` varchar(3) NOT NULL,
  `id` varchar(255) NOT NULL,
  `emailaddresscol` varchar(45) NOT NULL,
  PRIMARY KEY (`email_id`),
  UNIQUE KEY `id` (`id`),
  KEY `address` (`address`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emailaddress`
--

LOCK TABLES `emailaddress` WRITE;
/*!40000 ALTER TABLE `emailaddress` DISABLE KEYS */;
INSERT INTO `emailaddress` VALUES (1,0,'claus.just@hjoerring.dk','yes','yes','yes','claus.just@hjoerring.dk','');
/*!40000 ALTER TABLE `emailaddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loans` (
  `loan_id` int(11) NOT NULL AUTO_INCREMENT,
  `organisation` int(11) NOT NULL,
  `patron` int(11) NOT NULL,
  `loanDueDate` int(11) NOT NULL,
  `loanDate` int(11) NOT NULL,
  `loanBranch` int(11) NOT NULL,
  `id` varchar(32) NOT NULL,
  `loanIsRenewableMessage` varchar(32) DEFAULT NULL,
  `loanIsRenewableValue` varchar(32) NOT NULL,
  `catalogueRecordId` varchar(32) NOT NULL,
  PRIMARY KEY (`loan_id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_loan_patron_idx` (`patron`),
  KEY `fk_loan_org_idx` (`organisation`),
  KEY `fk_loan_branch_idx` (`loanBranch`),
  CONSTRAINT `fk_loan_branch` FOREIGN KEY (`loanBranch`) REFERENCES `branches` (`bra_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_loan_org` FOREIGN KEY (`organisation`) REFERENCES `organisations` (`org_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_loan_patron` FOREIGN KEY (`patron`) REFERENCES `patron` (`patr_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loans`
--

LOCK TABLES `loans` WRITE;
/*!40000 ALTER TABLE `loans` DISABLE KEYS */;
INSERT INTO `loans` VALUES (1,1,1,1410814800,1409605200,1,'5003726292','maxNofRenewals','no','50659275'),(2,1,1,1411506000,1409605200,1,'1006698367','patronIsDeniedLoan','no','20358467'),(3,1,1,1411506000,1409605200,1,'3680626099','patronIsDeniedLoan','no','28543166'),(4,1,1,1412024400,1409605200,1,'5007862468','patronIsDeniedLoan','no','50916782'),(5,1,1,1412888400,1409605200,1,'3680260396','patronIsDeniedLoan','no','27175732'),(6,1,1,1413147600,1409605200,1,'4152267792','patronIsDeniedLoan','no','28394314'),(7,1,1,1414447200,1409605200,1,'617543109','patronIsDeniedLoan','no','05181054'),(8,1,1,1414447200,1409605200,1,'4152264572','patronIsDeniedLoan','no','28402708'),(9,1,1,1414447200,1409605200,1,'3680522455','patronIsDeniedLoan','no','27108121'),(10,1,1,1414447200,1409605200,1,'3680261678','patronIsDeniedLoan','no','27183409');
/*!40000 ALTER TABLE `loans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `loc_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `language` varchar(5) NOT NULL,
  PRIMARY KEY (`loc_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `code` (`code`),
  KEY `language` (`language`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'+h~aandar','+håndar','Håndarbejde','da_DK'),(2,'+udl','+udl','Udlånet','da_DK'),(3,'afg','afg','Dari/Pashto/Persisk','da_DK'),(4,'ant','ant','ANTOLOGI','da_DK'),(5,'arab','arab','ARABISK','da_DK'),(6,'bi','bi','BILLEDBOG','da_DK'),(7,'bibo','bibo','Bibliotekarbord','da_DK'),(8,'bifa','bifa','Biblioteksfaglig samling','da_DK'),(9,'bks','bks','Bosnisk/Kroatisk/Serbisk','da_DK'),(10,'bob~aa','bobå','B0G+BÅND','da_DK'),(11,'bocd','bocd','BOG+CD','da_DK'),(12,'bocdmp3','bocdmp3','BOG+CD(MP3)','da_DK'),(13,'bogkas','bogkas','Til studiekreds','da_DK'),(14,'cd','cd','CD','da_DK'),(15,'dar','dar','KAN IKKE LÅNES -(dar)','da_DK'),(16,'dvdfag','dvdfag','FAGFILM','da_DK'),(17,'dvdmb','dvdmb','DVD-MINDRE BØRN','da_DK'),(18,'dvdmus','dvdmus','MUSIK-DVD','da_DK'),(19,'dvdsb','dvdsb','DVD-STØRRE BØRN','da_DK'),(20,'dvdspil','dvdspil','SPILLEFILM','da_DK'),(21,'fje','fje','Fjernlån','da_DK'),(22,'forbrug','forbrug','Ved kommunal information foran o','da_DK'),(23,'for~ae','foræ','FORÆLDREHYLDE','da_DK'),(24,'godegam','godegam','DE GODE GAMLE DAGE','da_DK'),(25,'h','h','HÅNDBOG','da_DK'),(26,'h~aandar','håndar','HÅNDARBEJDE','da_DK'),(27,'kontor','kontor','KAN IKKE UDLÅNES -(kontor)','da_DK'),(28,'krimi','krimi','KRIMI','da_DK'),(29,'kur','kur','KURDISK','da_DK'),(30,'let','let','LET LÆST VOKSNE','da_DK'),(31,'let1','let1','LET LÆST FOR SMÅ','da_DK'),(32,'lh','lh','LÆS HØJT','da_DK'),(33,'lok','lok','LOKALHISTORIE','da_DK'),(34,'nds','nds','NINTENDO DS','da_DK'),(35,'pc06','pc06','Sidder i pc06 (hjø BØ: Små børn)','da_DK'),(36,'pcfag','pcfag','CD-ROM','da_DK'),(37,'pcspil','pcspil','COMPUTERSPIL','da_DK'),(38,'pe','pe','PEGEBOG','da_DK'),(39,'per','per','PERSISK','da_DK'),(40,'pl2fag','pl2fag','PLAYSTATION2 FAG','da_DK'),(41,'pl2spil','pl2spil','PLAYSTATION2 SPIL','da_DK'),(42,'pl3spil','pl3spil','PLAYSTATION3 SPIL','da_DK'),(43,'pl4spil','pl4spil','PLAYSTATION4 SPIL','da_DK'),(44,'plspil','plspil','PLAYSTATION SPIL','da_DK'),(45,'rus','rus','RUSSISK','da_DK'),(46,'r~oeA','røA','(A) Rødt bånd ved indgangen','da_DK'),(47,'r~oeB','røB','(B) Rødt bånd ved sundhed','da_DK'),(48,'r~oeC','røC','(C) Rødt bånd ved læseranbefalin','da_DK'),(49,'r~oeD','røD','(D) Rødt bånd bag Velkomst','da_DK'),(50,'r~oeE','røE','(E) Rødt bånd ved voksenscenen','da_DK'),(51,'r~oeF','røF','(F) Rødt bånd ved studierum','da_DK'),(52,'r~oeG','røG','(G) Rødt bånd ved pc-spil','da_DK'),(53,'r~oeH','røH','(H) Rødt bånd ved Krimi','da_DK'),(54,'r~oeI','røI','(I) Rødt bånd ved skønlitt.(2 en','da_DK'),(55,'r~oeK','røK','(K) Rødt bånd ved bardisken','da_DK');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organisations`
--

DROP TABLE IF EXISTS `organisations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organisations` (
  `org_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  `shortname` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `language` varchar(5) NOT NULL,
  PRIMARY KEY (`org_id`),
  UNIQUE KEY `id` (`id`),
  KEY `code` (`code`,`shortname`,`name`,`language`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organisations`
--

LOCK TABLES `organisations` WRITE;
/*!40000 ALTER TABLE `organisations` DISABLE KEYS */;
INSERT INTO `organisations` VALUES (1,'DK-000000','DK-000000','DK-000000','DK-000000','da_DK');
/*!40000 ALTER TABLE `organisations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patron`
--

DROP TABLE IF EXISTS `patron`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patron` (
  `patr_id` int(11) NOT NULL AUTO_INCREMENT,
  `patronCategory` int(11) NOT NULL,
  `patronName` varchar(64) NOT NULL,
  `patronId` varchar(64) NOT NULL,
  `addressesIsAddable` varchar(3) NOT NULL,
  `address` int(11) NOT NULL,
  `borrCardsIsAddable` varchar(3) NOT NULL,
  `borrCard` int(11) NOT NULL,
  `emailAddressesIsAddable` varchar(3) NOT NULL,
  `emailAddress` int(11) NOT NULL,
  `messageServicesIsAddable` varchar(3) NOT NULL,
  `messageServices` int(11) DEFAULT NULL,
  `phoneNumbersIsAddable` varchar(3) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `patronBlocks` int(11) DEFAULT NULL,
  `patronBranch` int(11) DEFAULT NULL,
  `absentToDate` varchar(10) DEFAULT NULL,
  `absentFromDate` varchar(10) DEFAULT NULL,
  `absentId` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`patr_id`),
  UNIQUE KEY `patronId` (`patronId`),
  KEY `patronName` (`patronName`,`patronId`,`borrCard`),
  KEY `fk_patron_address_idx` (`address`),
  KEY `fk_patron_borrcard_idx` (`borrCard`),
  KEY `fk_patron_email_idx` (`emailAddress`),
  KEY `fk_patron_phone_idx` (`phoneNumber`),
  KEY `fk_patron_branch_idx` (`patronBranch`),
  CONSTRAINT `fk_patron_address` FOREIGN KEY (`address`) REFERENCES `address` (`addr_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_patron_borrcard` FOREIGN KEY (`borrCard`) REFERENCES `borrcard` (`borr_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_patron_branch` FOREIGN KEY (`patronBranch`) REFERENCES `branches` (`bra_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_patron_email` FOREIGN KEY (`emailAddress`) REFERENCES `emailaddress` (`email_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_patron_phone` FOREIGN KEY (`phoneNumber`) REFERENCES `phonenumber` (`phone_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patron`
--

LOCK TABLES `patron` WRITE;
/*!40000 ALTER TABLE `patron` DISABLE KEYS */;
INSERT INTO `patron` VALUES (1,1,'Fagreferent.CS','1111110022','no',1,'no',1,'yes',1,'yes',NULL,'yes',1,NULL,3,'1410469200','1409778000','2014090420140912');
/*!40000 ALTER TABLE `patron` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phonenumber`
--

DROP TABLE IF EXISTS `phonenumber`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phonenumber` (
  `phone_id` int(11) NOT NULL AUTO_INCREMENT,
  `patron` int(11) NOT NULL,
  `localCode` int(11) NOT NULL,
  `showArea` varchar(3) NOT NULL,
  `showCountry` varchar(3) NOT NULL,
  `isEditable` varchar(3) NOT NULL,
  `isDeletable` varchar(3) NOT NULL,
  `id` int(11) NOT NULL,
  `useForSms` varchar(3) NOT NULL DEFAULT 'yes',
  `isEditableSms` varchar(3) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`phone_id`),
  UNIQUE KEY `id` (`id`),
  KEY `localCode` (`localCode`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phonenumber`
--

LOCK TABLES `phonenumber` WRITE;
/*!40000 ALTER TABLE `phonenumber` DISABLE KEYS */;
INSERT INTO `phonenumber` VALUES (1,0,40207780,'no','no','no','no',40207780,'yes','yes');
/*!40000 ALTER TABLE `phonenumber` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `reser_id` int(11) NOT NULL AUTO_INCREMENT,
  `patron` int(11) NOT NULL,
  `validToDate` int(11) NOT NULL,
  `validFromDate` int(11) DEFAULT NULL,
  `status` varchar(32) NOT NULL,
  `reservationType` varchar(32) NOT NULL,
  `reservationPickUpBranch` int(11) NOT NULL,
  `queueNo` int(11) DEFAULT NULL,
  `organisation` int(11) NOT NULL,
  `isEditable` varchar(32) NOT NULL,
  `isDeletable` varchar(32) NOT NULL,
  `createDate` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `catalogueRecordId` varchar(32) NOT NULL,
  `reservationStatusKey` varchar(32) NOT NULL,
  `reservationStatusValue` varchar(32) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `pickUpNo` int(11) DEFAULT NULL,
  `pickUpExpireDate` int(11) DEFAULT NULL,
  PRIMARY KEY (`reser_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `catalogueRecordId` (`catalogueRecordId`),
  KEY `fk_res_patron_idx` (`patron`),
  KEY `fk_res_branch_idx` (`reservationPickUpBranch`),
  KEY `fk_res_organisation_idx` (`organisation`),
  CONSTRAINT `fk_res_branch` FOREIGN KEY (`reservationPickUpBranch`) REFERENCES `branches` (`bra_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_res_organisation` FOREIGN KEY (`organisation`) REFERENCES `organisations` (`org_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_res_patron` FOREIGN KEY (`patron`) REFERENCES `patron` (`patr_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,1,1417471200,1409778000,'active','normal',3,1,1,'yes','yes',1409778000,1415027,'25755707','reservationOnShelf','reservationOk',NULL,NULL,NULL),(2,1,1441227600,1410123600,'active','normal',3,1,1,'yes','yes',1409605200,1415949,'10122945','reservationOnShelf','reservationOk','2014, 130. udgave',NULL,NULL),(3,1,1417298400,1409605200,'active','normal',3,1,1,'yes','yes',1409605200,1414204,'06373674','reservationOnShelf','reservationOk','2010, 39',NULL,NULL),(4,1,1413234000,1409605200,'fetchable','normal',1,NULL,1,'no','yes',1409605200,1414248,'29348677','reservationOnShelf','reservationOk',NULL,255,1410382800),(5,1,1440709200,1409605200,'fetchable','normal',5,NULL,1,'no','yes',1409605200,1414140,'43232398','reservationOnShelf','reservationOk',NULL,NULL,1410728400);
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sublocations`
--

DROP TABLE IF EXISTS `sublocations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sublocations` (
  `subloc_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  `shortname` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `language` varchar(5) NOT NULL,
  PRIMARY KEY (`subloc_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `code` (`code`),
  KEY `language` (`language`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sublocations`
--

LOCK TABLES `sublocations` WRITE;
/*!40000 ALTER TABLE `sublocations` DISABLE KEYS */;
INSERT INTO `sublocations` VALUES (1,'bluray','bluray','bluray','BLU-RAY','da_DK'),(2,'bl~aa','blå','blå','Blå','da_DK'),(3,'bl~aab','blåb','blåb','BOXSÆT(blå)','da_DK'),(4,'dep','dep','dep','Dep','da_DK'),(5,'digte','digte','digte','DIGTE','da_DK'),(6,'drama','drama','drama','DRAMA','da_DK'),(7,'dvd','dvd','dvd','DVD','da_DK'),(8,'d~oed','død','død','DØD','da_DK'),(9,'ev','ev','ev','EVENTYR','da_DK'),(10,'fag','fag','fag','FAG','da_DK'),(11,'fam','fam','fam','FAMILIEFORØGELSE','da_DK'),(12,'fas','fas','fas','FASTELAVN','da_DK'),(13,'fje','fje','fje','Fjernlån','da_DK'),(14,'fol','fol','fol','FOLIO','da_DK'),(15,'fort','fort','fort','FORTÆLLINGER','da_DK'),(16,'gr~aa','grå','grå','Grå','da_DK'),(17,'gr~aab','gråb','gråb','BOXSÆT(grå)','da_DK'),(18,'gr~oen','grøn','grøn','Grøn','da_DK'),(19,'gr~oenb','grønb','grønb','BOXSÆT(grøn)','da_DK'),(20,'gul','gul','gul','Gul','da_DK'),(21,'gulb','gulb','gulb','BOXSÆT(gul)','da_DK'),(22,'hvid','hvid','hvid','Hvid','da_DK'),(23,'hvidb','hvidb','hvidb','BOXSÆT(hvid)','da_DK'),(24,'inst','inst','inst','Børneinstitutioner','da_DK'),(25,'jul','jul','jul','JUL','da_DK'),(26,'krop','krop','krop','KROPPEN','da_DK'),(27,'lillab','lillab','lillab','BOXSÆT(lilla)','da_DK'),(28,'lukket','lukket','lukket','','da_DK'),(29,'lyb~aa','lybå','lybå','LYDBOG på kassettebånd','da_DK'),(30,'lycd','lycd','lycd','LYDBOG på cd','da_DK'),(31,'lymp3','lymp3','lymp3','LYDBOG på cd i mp3-format','da_DK'),(32,'ora','ora','ora','Orange','da_DK'),(33,'orab','orab','orab','BOXSÆT(orange)','da_DK'),(34,'rekas','rekas','rekas','-(hjemkaldt)-','da_DK'),(35,'rep','rep','rep','ER TIL REPARATION','da_DK'),(36,'resend','resend','resend','P.t. bortkommet','da_DK'),(37,'rim','rim','rim','RIM OG REMSER','da_DK'),(38,'r~oed','rød','rød','Rød','da_DK'),(39,'r~oedb','rødb','rødb','BOXSÆT(rød)','da_DK'),(40,'skil','skil','skil','SKILSMISSE','da_DK'),(41,'sort','sort','sort','Sort','da_DK'),(42,'sortb','sortb','sortb','BOXSÆT(sort)','da_DK'),(43,'stop','stop','stop','','da_DK'),(44,'tids2','tids2','tids2','','da_DK'),(45,'udenl','udenl','udenl','Udenlandske bøger','da_DK'),(46,'udkl~aed','udklæd','udklæd','UDKLÆDNING','da_DK'),(47,'uvi','uvi','uvi','UNDERVEJS INTERNT','da_DK'),(48,'video','video','video','VIDEO','da_DK'),(49,'viofag','viofag','viofag','VIDEO FAG','da_DK'),(50,'viomb','viomb','viomb','VIDEO-MINDRE BØRN','da_DK'),(51,'viosb','viosb','viosb','VIDEO-STØRRE BØRN','da_DK'),(52,'viosp','viosp','viosp','SPILLEFILM','da_DK');
/*!40000 ALTER TABLE `sublocations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-11  9:31:02

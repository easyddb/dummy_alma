-- MySQL dump 10.13  Distrib 5.5.46, for Linux (x86_64)
--
-- Host: localhost    Database: dummy_alma
-- ------------------------------------------------------
-- Server version       5.5.46

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (31,8000,1,'Vestre Ringgade 200','no','no','yes','SKIP','Århus C.','','Vestre Ringgade 200');
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrcard`
--

LOCK TABLES `borrcard` WRITE;
/*!40000 ALTER TABLE `borrcard` DISABLE KEYS */;
INSERT INTO `borrcard` VALUES (49,'yes','3206596642','12345','no','no'),(50,'yes','3207795592','12345','no','no');
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
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES (84,'hb','hb','hb','Hovedbiblioteket','da_DK',7),(85,'bed','bed','bed','Beder-Malling','da_DK',7),(86,'ddb','','','','',7),(87,'~aaby','','','','',7),(88,'h~oej','','','','',7);
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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches_org`
--

LOCK TABLES `branches_org` WRITE;
/*!40000 ALTER TABLE `branches_org` DISABLE KEYS */;
INSERT INTO `branches_org` VALUES (1,'bed','bed','bed','Beder-Malling','da_DK'),(2,'eg~aa','egå','egå','Egå','da_DK'),(3,'gel','gel','gel','Gellerup','da_DK'),(4,'hag','hag','hag','Kolt-Hasselager','da_DK'),(5,'hal','hal','hal','Hasle','da_DK'),(6,'har','har','har','Harlev','da_DK'),(7,'hb','hb','hb','Hovedbiblioteket','da_DK'),(8,'hjo','hjo','hjo','Hjortshøj','da_DK'),(9,'h~oej','høj','høj','Højbjerg','da_DK'),(10,'lys','lys','lys','Lystrup','da_DK'),(11,'ris','ris','ris','Risskov','da_DK'),(12,'sab','sab','sab','Sabro','da_DK'),(13,'sk~oe','skø','skø','Skødstrup','da_DK'),(14,'sol','sol','sol','Solbjerg','da_DK'),(15,'sta','sta','sta','Stadsarkivet','da_DK'),(16,'tra','tra','tra','Tranbjerg','da_DK'),(17,'tri','tri','tri','Trige','da_DK'),(18,'tst','tst','tst','Tilst','da_DK'),(19,'vib','vib','vib','Viby','da_DK'),(20,'~aa01','å01','å01','Fjernlager 1','da_DK'),(21,'~aa02','å02','å02','Fjernlager 2','da_DK'),(22,'~aaby','åby','åby','Åby','da_DK');
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
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collections`
--

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
INSERT INTO `collections` VALUES (1,'','','','','da_DK'),(2,'14av','14av','14av','14 dages lån.','da_DK'),(3,'14av-','14av-','14av-','14 dages lån. Kan ikke reserveres.','da_DK'),(4,'14av2','14av2','14av2','14 dages lån.','da_DK'),(5,'14av2-','14av2-','14av2-','14 dages lån.','da_DK'),(6,'14dag','14dag','14dag','14 dages lån.','da_DK'),(7,'14dag-','14dag-','14dag-','14 dages lån.','da_DK'),(8,'14lyd','14lyd','14lyd','14 dages lån.','da_DK'),(9,'14mp3-','14mp3-','14mp3-','MP3 lydbog /14 dages lån','da_DK'),(10,'14uin','14uin','14uin','14 dages lån.','da_DK'),(11,'14uin-','14uin-','14uin-','14 dages lån.','da_DK'),(12,'60dg-','60dg-','60dg-','60 dages lån. Grafik. Kan ikke reserveres','da_DK'),(13,'60dk-','60dk-','60dk-','60 dages lån. Kunst. Kan ikke reserveres','da_DK'),(14,'60dp-','60dp-','60dp-','60 dages lån. Plakat. Kan ikke reserveres','da_DK'),(15,'7av-','7av-','7av-','7 dages lån. AV.','da_DK'),(16,'7av2','7av2','7av2','7 dages lån.','da_DK'),(17,'7av2-','7av2-','7av2-','7 dages lån.','da_DK'),(18,'7dag-','7dag-','7dag-','7 dages lån.','da_DK'),(19,'7dfdv','7dfdv','7dfdv','7 dages lån.','da_DK'),(20,'7dfvi','7dfvi','7dfvi','7 dages lån.','da_DK'),(21,'7dvC','7dvC','7dvC','7 dages lån.','da_DK'),(22,'7dvC+','7dvC+','7dvC+','7 dages lån.','da_DK'),(23,'7dvC+-','7dvC+-','7dvC+-','7 dages lån.','da_DK'),(24,'7dvC-','7dvC-','7dvC-','7 dages lån.','da_DK'),(25,'7dvd','7dvd','7dvd','7 dages lån. DVD.','da_DK'),(26,'7dvd-','7dvd-','7dvd-','7 dages lån. DVD.','da_DK'),(27,'7uin','7uin','7uin','7 dages lån.','da_DK'),(28,'7uin-','7uin-','7uin-','7 dages lån.','da_DK'),(29,'7viC','7viC','7viC','7 dages lån.','da_DK'),(30,'7viC+','7viC+','7viC+','7 dages lån.','da_DK'),(31,'7viE','7viE','7viE','7 dages lån.','da_DK'),(32,'7vid','7vid','7vid','7 dages lån.','da_DK'),(33,'7vid-','7vid-','7vid-','7 dages lån.','da_DK'),(34,'betalt','betalt','betalt','Erstattet af låner','da_DK'),(35,'borte','borte','borte','Bortkommet materiale','da_DK'),(36,'bplusb','bplusb','bplusb','Bog+Bånd eller Bog+CD','da_DK'),(37,'bu14','bu14','bu14','BU - 14dages lån.','da_DK'),(38,'bu1~aar','bu1år','bu1år','BU - 1 års lån.','da_DK'),(39,'bu2~aar','bu2år','bu2år','BU - 2 års lån.','da_DK'),(40,'bu7','bu7','bu7','BU - 7dages lån.','da_DK'),(41,'dep1','dep1','dep1','Depot - 1','da_DK'),(42,'dep2','dep2','dep2','Depot - 2','da_DK'),(43,'fje','fje','fje','Fjernlån','da_DK'),(44,'fon','fon','fon','Musik','da_DK'),(45,'fon2','fon2','fon2','Flere CD-plader','da_DK'),(46,'fon3','fon3','fon3','CD-boxsæt','da_DK'),(47,'imsmat','imsmat','imsmat','IMS matsamling','da_DK'),(48,'indb','indb','indb','Indbundne tidsskrifter','da_DK'),(49,'intern','intern','intern','Til internt brug','da_DK'),(50,'karen-','karen-','karen-','Må p.t. ikke udlånes','da_DK'),(51,'karens','karens','karens','Må p.t. ikke udlånes','da_DK'),(52,'kreds','kreds','kreds','Læsetasker til læsekredse','da_DK'),(53,'lydbog','lydbog','lydbog','Lydbog','da_DK'),(54,'marked','marked','marked','Marked','da_DK'),(55,'mp3lyd','mp3lyd','mp3lyd','MP3 lydbog','da_DK'),(56,'noder','noder','noder','Noder','da_DK'),(57,'online','online','online','Internet udgave','da_DK'),(58,'playaw','playaw','playaw','Playaway','da_DK'),(59,'sgdvd','sgdvd','sgdvd','DVD','da_DK'),(60,'sgu','sgu','sgu','Til udlån','da_DK'),(61,'sgui','sgui','sgui','Udlånes ikke','da_DK'),(62,'sk7eg~aa','sk7egå','sk7egå','Sølystskolen, 7-dages lån','da_DK'),(63,'sk7hag','sk7hag','sk7hag','Kolt-Hasselager Kombibibliotek, 7-dages lån','da_DK'),(64,'sk7har','sk7har','sk7har','Harlev Kombi-Bibliotek, 7-dages lån','da_DK'),(65,'sk7hjo','sk7hjo','sk7hjo','Virup Skolen, 7-dages lån','da_DK'),(66,'sk7sab','sk7sab','sk7sab','Sabro-Korsvejens Skole, 7-dages lån','da_DK'),(67,'sk7sk~oe','sk7skø','sk7skø','Skødstrup Kombibibliotek 7-dages lån','da_DK'),(68,'sk7tri','sk7tri','sk7tri','Trige Kombi-bibliotek, 7-dages lån','da_DK'),(69,'skoeg~aa','skoegå','skoegå','Sølystskolen','da_DK'),(70,'skohag','skohag','skohag','Kolt-Hasselager Kombibibliotek','da_DK'),(71,'skohar','skohar','skohar','Harlev Kombi-Bibliotek','da_DK'),(72,'skohjo','skohjo','skohjo','Virup Skolen','da_DK'),(73,'skole','skole','skole','Skolens materialer','da_DK'),(74,'skosab','skosab','skosab','Sabro-Korsvejens Skole','da_DK'),(75,'skosk~oe','skoskø','skoskø','Skødstrup Kombibibliotek','da_DK'),(76,'skotri','skotri','skotri','Trige Kombi-bibliotek','da_DK'),(77,'skseg~aa','sksegå','sksegå','Sølystskolen, skole','da_DK'),(78,'skshag','skshag','skshag','Kolt-Hasselager Kombibibliotek, skole','da_DK'),(79,'skshar','skshar','skshar','Harlev Kombi-Bibliotek, skole','da_DK'),(80,'skshjo','skshjo','skshjo','Virup Skolen, skole','da_DK'),(81,'skssab','skssab','skssab','Sabro-Korsvejens Skole, skole','da_DK'),(82,'skssk~oe','sksskø','sksskø','Skødstrup Kombibibliotek','da_DK'),(83,'skstri','skstri','skstri','Trige Kombi-bibliotek, skole','da_DK'),(84,'sprog','sprog','sprog','Sprogkurser uden video og CD-Rom','da_DK'),(85,'stan~aer','stanær','stanær','Stationær samling','da_DK'),(86,'u','u','u','Til udlån     - Handi-Info','da_DK'),(87,'u14','u14','u14','14-dages lån  - Handi-Info','da_DK'),(88,'ui','ui','ui','Udlånes ikke  - Handi-Info','da_DK'),(89,'uindb','uindb','uindb','Enkeltnumre, tidsskrifter','da_DK'),(90,'v~aek','væk','væk','Bortkommet materiale','da_DK');
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
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `debts`
--

LOCK TABLES `debts` WRITE;
/*!40000 ALTER TABLE `debts` DISABLE KEYS */;
INSERT INTO `debts` VALUES (71,51,7,'3279226894  Tolstoj, Lev: Krig og fred. [Bind] 1',6.9,'reservationPickupFeeDebt',1331164800,3559446),(72,51,7,'3847399081  Valeur, Erik: Det syvende barn',6.9,'reservationPickupFeeDebt',1354060800,3648040),(73,51,7,'4931298289  Egholm, Elsebe: De døde sjæles nat',6.9,'reservationPickupFeeDebt',1354752000,3651062),(74,51,7,'3280810451  Egholm, Elsebe: Personskade',6.9,'reservationPickupFeeDebt',1361318400,3675206),(75,51,7,'3279684671  Dalby, Claus: Den levende have',6.9,'reservationPickupFeeDebt',1361404800,3675672),(76,51,7,'4876771123  Francis, Dick: Dødt løb',20,'overdueFeeDebt',1363219200,3681976),(77,51,7,'4932506616  Holdt, Annika : Pantomime',7.5,'reservationPickupFeeDebt',1363392000,3682495),(78,51,7,'4875654573  Gejl, Trisse: Siden blev det for pænt',7.5,'reservationPickupFeeDebt',1363651200,3683358),(79,51,7,'4932753532  Pettersson, To: Giv mig dine øjne',7.5,'reservationPickupFeeDebt',1363737600,3683698),(80,51,7,'3847094175  vd Million dollar baby',20,'overdueFeeDebt',1367280000,3696156),(81,52,7,'4876571337  Hovden, Magne: Sameland',70,'overdueFeeDebt',1371513600,3709462),(82,52,7,'4878530735  Beydin, Efie: Rejsen til Arkadien',20,'overdueFeeDebt',1374451200,3716788),(83,52,7,'3844278739  CD Marino, Frank: From the hip',70,'overdueFeeDebt',1378339200,3726539),(84,52,7,'3274509855  Turèll, Dan: Mord i rendestenen',230,'overdueFeeDebt',1422489600,3728188);
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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'bav','bav','bav','Børne-av      - Handi-Info','da_DK'),(2,'b~oe','bø','bø','Børn','da_DK'),(3,'b~oea','bøa','bøa','Børnebogsafd. - Handi-Info','da_DK'),(4,'fag','fag','fag','Faglokale','da_DK'),(5,'fje','fje','fje','Fjernlån','da_DK'),(6,'gko','gko','gko','Kontor','da_DK'),(7,'kon','kon','kon','Kontor        - Handi-Info','da_DK'),(8,'lok','lok','lok','Lokalhistorie','da_DK'),(9,'ma','ma','ma','Marked','da_DK'),(10,'ob','ob','ob','Overbibliotekar/Sekretariat','da_DK'),(11,'sek','sek','sek','BU - sekretariatet','da_DK'),(12,'sko','sko','sko','Skolebibliotek','da_DK'),(13,'sta','sta','sta','Stadsarkivet','da_DK'),(14,'sto','sto','sto','Studieområdet','da_DK'),(15,'stu','stu','stu','Studiesamling','da_DK'),(16,'uvm','uvm','uvm','Undervisningsmidler','da_DK'),(17,'vbs','vbs','vbs','BU - Sundhed og Trivsel','da_DK'),(18,'vis','vis','vis','BU - Pædagogik og Integration','da_DK'),(19,'vo','vo','vo','Voksen','da_DK'),(20,'vrs','vrs','vrs','BU - PPRS','da_DK');
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emailaddress`
--

LOCK TABLES `emailaddress` WRITE;
/*!40000 ALTER TABLE `emailaddress` DISABLE KEYS */;
INSERT INTO `emailaddress` VALUES (34,1111110022,'gba@aarhus.dk','yes','yes','yes','gba@aarhus.dk','');
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
) ENGINE=InnoDB AUTO_INCREMENT=367 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loans`
--

LOCK TABLES `loans` WRITE;
/*!40000 ALTER TABLE `loans` DISABLE KEYS */;
INSERT INTO `loans` VALUES 
(306,7,51,1378771200,1378425600,86,'4937361721','maxNofRenewals','no','29773955'),
(307,7,51,1388771200,1378425600,86,'4214866744','maxNofRenewals','no','28512627'),
(308,7,51,1398771200,1378425600,86,'3279354541','maxNofRenewals','no','24916979'),
(309,7,51,1409030400,1378425600,86,'3271664779','maxNofRenewals','no','22949543'),
(310,7,51,1419030400,1378425600,86,'3271736461','maxNofRenewals','no','22864653'),
(311,7,51,1429116800,1378425600,86,'3846367593','maxNofRenewals','no','27989160'),
(312,7,51,1439116800,1378425600,86,'3272480892','maxNofRenewals','no','22334662'),
(313,7,51,1449116800,1378425600,86,'4214653643','maxNofRenewals','no','28480970'),
(314,7,51,1459462400,1378425600,86,'3840511625','maxNofRenewals','no','25839137'),
(315,7,51,1469462400,1378425600,86,'3840430366','maxNofRenewals','no','25621646'),
(316,7,51,1479462400,1378425600,86,'4988331576','maxNofRenewals','no','29901066'),
(317,7,51,1489462400,1378425600,86,'3844838017','maxNofRenewals','no','25849353'),
(318,7,51,1499462400,1378425600,86,'3276197826','maxNofRenewals','no','24001598'),
(319,7,51,1509635200,1378425600,86,'4939042771','maxNofRenewals','no','29972362'),
(320,7,51,1519635200,1378425600,86,'4939928540','maxNofRenewals','no','29965110'),
(321,7,51,1529635200,1378425600,86,'3844368193','maxNofRenewals','no','26575699'),
(322,7,51,1539635200,1378425600,86,'3844296036','maxNofRenewals','no','27330754'),
(323,7,51,1549635200,1378425600,86,'3846925197','maxNofRenewals','no','27965962'),
(324,7,51,1550153600,1378425600,86,'3843608832','maxNofRenewals','no','27217222'),
(325,7,51,1560153600,1378425600,86,'3842868415','maxNofRenewals','no','26881986'),
(326,7,51,1570153600,1378425600,86,'3841082094','maxNofRenewals','no','26097223'),
(327,7,51,1580153600,1378425600,86,'4875067244','maxNofRenewals','no','28576994'),
(328,7,51,1590153600,1378425600,86,'4213194769','maxNofRenewals','no','28001584'),
(329,7,51,1600153600,1378425600,86,'4214440240','maxNofRenewals','no','28434685'),
(330,7,51,1610153600,1378425600,86,'3841109677','maxNofRenewals','no','26047773'),
(331,7,51,1620153600,1378425600,86,'4214446060','maxNofRenewals','no','28423241'),
(332,7,51,1630153600,1378425600,86,'3279681052','maxNofRenewals','no','25112067'),
(333,7,51,1640153600,1378425600,86,'4212939272','maxNofRenewals','no','27856705'),
(334,7,51,1650153600,1378425600,86,'4213446474','maxNofRenewals','no','28102771'),
(335,7,51,1660153600,1378425600,86,'3279078232','maxNofRenewals','no','25407393'),
(336,7,51,1670153600,1378425600,86,'4939578701','maxNofRenewals','no','29941661'),
(337,7,51,1680153600,1378425600,86,'3280543224','maxNofRenewals','no','24633802'),
(338,7,51,1690153600,1378425600,86,'3846711898','maxNofRenewals','no','28308027'),
(339,7,51,1700153600,1378425600,86,'3840234291','maxNofRenewals','no','20204958'),
(340,7,51,1710153600,1378425600,86,'3843735788','maxNofRenewals','no','27291961'),
(341,7,51,1720153600,1378425600,86,'4936831694','maxNofRenewals','no','29749388'),
(342,7,51,1730153600,1378425600,86,'3840894761','maxNofRenewals','no','26401240'),
(343,7,51,1740153600,1378425600,86,'3846361323','maxNofRenewals','no','21805025'),
(344,7,51,1750153600,1378425600,86,'279004965','maxNofRenewals','no','22461877'),
(345,7,51,1760499200,1378425600,86,'4214281983','maxNofRenewals','no','28386656'),
(346,7,51,1770499200,1378425600,86,'3277866225','maxNofRenewals','no','24320456'),
(347,7,51,1780499200,1378425600,86,'3278516325','maxNofRenewals','no','24812707'),
(348,7,51,1790499200,1378425600,86,'4877229713','maxNofRenewals','no','28893868'),
(349,7,51,1800499200,1378425600,86,'4877239069','maxNofRenewals','no','28893841'),
(350,7,51,1810499200,1378425600,86,'279281101','maxNofRenewals','no','21182605'),
(351,7,51,1820499200,1378425600,86,'3842686120','maxNofRenewals','no','27047394'),
(352,7,51,1831104000,1378425600,86,'3840306886','maxNofRenewals','no','43468278'),
(353,7,51,1841104000,1378425600,86,'3844380924','maxNofRenewals','no','27433103'),
(354,7,51,1851104000,1378425600,86,'3840458449','maxNofRenewals','no','25702441'),
(355,7,51,1861104000,1378425600,86,'3840482323','maxNofRenewals','no','09173293'),
(356,7,51,1871104000,1378425600,86,'4212902069','maxNofRenewals','no','27805728'),
(357,7,51,1887824000,1415145600,86,'4931080569','maxNofRenewals','no','29386536'),
(358,7,51,1897824000,1415145600,86,'3839501411','maxNofRenewals','no','25796659'),
(359,7,52,1909376000,1378166400,86,'4937304981','maxNofRenewals','no','29847029'),
(360,7,52,1919376000,1378166400,86,'4937918521','maxNofRenewals','no','29847002'),
(361,7,52,1920844800,1378166400,86,'4213083614','maxNofRenewals','no','27926002'),
(362,7,52,1930844800,1378166400,86,'3840846872','maxNofRenewals','no','43758330'),
(363,7,52,1940844800,1378166400,86,'4212794908','maxNofRenewals','no','27699456'),
(364,7,52,1950844800,1378166400,86,'4213935416','maxNofRenewals','no','28269889'),
(365,7,52,1961104000,1378339200,86,'4939366801','maxNofRenewals','no','29937818'),
(366,7,52,1975254400,1415145600,86,'3274509855','maxNofRenewals','no','23240599');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organisations`
--

LOCK TABLES `organisations` WRITE;
/*!40000 ALTER TABLE `organisations` DISABLE KEYS */;
INSERT INTO `organisations` VALUES (7,'DK-775100','DK-775100','DK-775100','DK-775100','da_DK');
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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patron`
--

LOCK TABLES `patron` WRITE;
/*!40000 ALTER TABLE `patron` DISABLE KEYS */;
INSERT INTO `patron` VALUES (51,7,'DDBCMS - testbruger 1','ID301124','no',31,'no',49,'yes',34,'',NULL,'yes',110,NULL,84,'1434672000','1433462400','2015060520150619'),(52,1,'Testkort 5 / DDBCMS','ID333460','no',31,'no',50,'yes',34,'',NULL,'yes',112,NULL,85,'1369958400','1367366400','2013050120130531');
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
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phonenumber`
--

LOCK TABLES `phonenumber` WRITE;
/*!40000 ALTER TABLE `phonenumber` DISABLE KEYS */;
INSERT INTO `phonenumber` VALUES (110,1111110022,11223344,'no','no','yes','yes',11223344,'',''),(111,1111110022,17171717,'no','no','yes','yes',17171717,'',''),(112,1111110022,11111113,'no','no','yes','yes',11111113,'',''),(113,1111110022,11119999,'no','no','yes','yes',11119999,'','');
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
  `catalogueRecordId` varchar(128) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES 
(8,51,1464048000,1448496000,'active','normal',84,1,7,'yes','yes',1448496000,12846996,'95602797','reservationOnShelf','reservationOk','2012, Januar, 1',0,0),
(25,51,1457136000,1426032000,'active','normal',84,1,7,'yes','yes',1426032000,12846959,'43544055','reservationOnShelf','reservationOk','2012, December, Nr. 092',0,0),
(26,51,1441584000,1426032000,'active','normal',84,1,7,'yes','yes',1426032000,12846957,'20401206','reservationOnShelf','reservationOk','2012, 15',0,0),
(27,51,1465948800,1434844800,'active','normal',84,1,7,'yes','yes',1434844800,12846965,'23149532','reservationOnShelf','reservationOk','',0,0);
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sublocations`
--

LOCK TABLES `sublocations` WRITE;
/*!40000 ALTER TABLE `sublocations` DISABLE KEYS */;
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

-- Dump completed on 2015-11-30 12:45:27

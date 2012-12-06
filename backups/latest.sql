-- MySQL dump 10.11
--
-- Host: localhost    Database: gtau
-- ------------------------------------------------------
-- Server version	5.0.51a-24+lenny5

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
-- Table structure for table `blackboard`
--

DROP TABLE IF EXISTS `blackboard`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `blackboard` (
  `id` int(11) NOT NULL auto_increment,
  `date` datetime NOT NULL,
  `by` varchar(36) default NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `blackboard`
--

LOCK TABLES `blackboard` WRITE;
/*!40000 ALTER TABLE `blackboard` DISABLE KEYS */;
/*!40000 ALTER TABLE `blackboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `intitule` varchar(150) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `codepostal` varchar(12) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ref` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'demental.info','9, rue du canon d\'arcole','toulouse','31000','0671787897','arnodmental@gmail.com','CD001'),(2,'JTSR SARL','6, rue Eugène Delacroix','Ezanville','95460','00000000','joelazemar@gmail.com','CJ001'),(3,'Enora Le Mignon','144 chemin de Lapujade','Toulouse','31200','0000','enora@coquelicom.fr','CC001'),(4,'Jeanne Delécluse','10 rue Claudius Rougenet','Toulouse','31500','0000','jeanne@hibiscous.com','CH001'),(5,'Thomas Riboulet','le bourg','St sulpice Gabor','81370','0000','riboulet@gmail.com','CR001');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depenses`
--

DROP TABLE IF EXISTS `depenses`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `depenses` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `titre` varchar(250) NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `montant` float NOT NULL,
  `filename` varchar(250) NOT NULL,
  `client_id` int(11) default NULL,
  `date_rbt` date default NULL,
  `mode_rbt` varchar(15) default NULL,
  PRIMARY KEY  (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `client_id` (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `depenses`
--

LOCK TABLES `depenses` WRITE;
/*!40000 ALTER TABLE `depenses` DISABLE KEYS */;
INSERT INTO `depenses` VALUES (1,'Triplite',4,'2012-01-16',12,'',3,'0000-00-00','avoir'),(2,'Divers (matériel nettoyage + glanerie)',10,'2012-01-16',30,'',3,'0000-00-00','avoir');
/*!40000 ALTER TABLE `depenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depenses_cat`
--

DROP TABLE IF EXISTS `depenses_cat`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `depenses_cat` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nom` varchar(150) NOT NULL,
  `ratio_tva` float NOT NULL,
  `compte` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `depenses_cat`
--

LOCK TABLES `depenses_cat` WRITE;
/*!40000 ALTER TABLE `depenses_cat` DISABLE KEYS */;
INSERT INTO `depenses_cat` VALUES (1,'Frais bancaires',19.6,'1111111'),(2,'Téléphone maison',0,'123'),(3,'Téléphone portable',19.6,'123421'),(4,'Matériel informatique',19.6,'12241'),(5,'Hébergement internet',19.6,'12312'),(6,'Frais chauffage',5.5,'134'),(7,'Frais elec',5.5,'é232'),(8,'logiciels',19.6,'1234'),(9,'Sous-traitance',19.6,NULL),(10,'Petites fournitures',0.196,'xxx');
/*!40000 ALTER TABLE `depenses_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deplacement`
--

DROP TABLE IF EXISTS `deplacement`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `deplacement` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `date` date NOT NULL,
  `titre` varchar(255) NOT NULL,
  `km` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `deplacement`
--

LOCK TABLES `deplacement` WRITE;
/*!40000 ALTER TABLE `deplacement` DISABLE KEYS */;
/*!40000 ALTER TABLE `deplacement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factures`
--

DROP TABLE IF EXISTS `factures`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `factures` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `client_id` int(10) unsigned NOT NULL default '0',
  `date` date NOT NULL default '0000-00-00',
  `designation` text NOT NULL,
  `ratio_tva` float NOT NULL,
  `montant` float NOT NULL default '0',
  `paye` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20161 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `factures`
--

LOCK TABLES `factures` WRITE;
/*!40000 ALTER TABLE `factures` DISABLE KEYS */;
INSERT INTO `factures` VALUES (20145,1,'2012-01-01','Prestation espace coworking, formule permanent \r\n* mois de Décembre 2011\r\n* mois de Janvier 2012',0.196,200,1),(20146,2,'2012-01-12','Prestation espace coworking, formule permanent\r\n* Décembre 2011\r\n* Janvier 2012',0.196,200,1),(20147,3,'2011-12-12','Forfait \"6-pack AE\" 6 jours de coworking pour auto-entrepreneur.',0.196,41.806,1),(20148,1,'2011-12-05','Adhésion annuelle, jusqu\'au 05/12/2012',0,15,1),(20149,2,'2011-12-05','Adhésion annuelle, jusqu\'au 05/12/2012',0,15,0),(20150,3,'2011-12-05','Adhésion annuelle, jusqu\'au 05/12/2012 - incluse dans le 6-pack ',0,0,1),(20151,4,'2011-12-05','Adhésion annuelle, jusqu\'au 05/12/2012',0,15,1),(20152,5,'2011-12-05','Adhésion annuelle, jusqu\'au 05/12/2012',0,15,1),(20153,5,'2011-12-12','Prestation espace coworking, formule permanent AE\r\n* Décembre 2011\r\n* Janvier 2012\r\n\r\nRèglement effectué par chèque.',0.196,167.22,1),(20154,4,'2012-01-10','Prestation espace coworking, formule permanent\r\n* Janvier 2012',0.196,100,1),(20155,3,'2012-01-16','Prestation espace coworking, formule permanent AE\r\n* Janvier 2012\r\n\r\nDéduction faite des avances de frais (92 euros TTC)',0.196,6.68,1),(20156,4,'2012-02-01','Forfait permanent février',0.196,100,1),(20157,2,'2012-02-01','Prestation espace coworking, formule permanent février 2012',0.196,100,1),(20158,1,'2012-03-01','Formule permanent, février et mars 2012',0.196,200,1),(20159,2,'2012-03-01','Prestation espace coworking, formule permanent mars 2012',0.196,100,1),(20160,4,'2012-03-01','Prestation espace coworking, formule permanent mars 2012',0.196,100,1);
/*!40000 ALTER TABLE `factures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preferences`
--

DROP TABLE IF EXISTS `preferences`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `preferences` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `var` varchar(50) NOT NULL,
  `description` mediumtext,
  `val` text,
  `type` varchar(30) NOT NULL default '',
  `typeargs` mediumtext,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `preferences`
--

LOCK TABLES `preferences` WRITE;
/*!40000 ALTER TABLE `preferences` DISABLE KEYS */;
INSERT INTO `preferences` VALUES (1,'pdf_entete','coordonnes','Association TAU\r\nhttp://tau.so/\r\n9, rue du Canon d\'Arcole\r\n31000 Toulouse\r\nTVA Intracom. : En cours\r\nSIRET: En cours\r\nCapital social : 1000 euros','text',NULL);
/*!40000 ALTER TABLE `preferences` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-03-08 10:12:26

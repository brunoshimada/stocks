-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: stocks
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Table structure for table `daily_prices`
--

DROP TABLE IF EXISTS `daily_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daily_prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `symbol` varchar(20) NOT NULL,
  `open` decimal(12,4) NOT NULL,
  `high` decimal(12,4) NOT NULL,
  `low` decimal(12,4) NOT NULL,
  `close` decimal(12,4) NOT NULL,
  `volume` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`,`symbol`),
  KEY `fk_daily_prices` (`symbol`),
  CONSTRAINT `fk_daily_prices` FOREIGN KEY (`symbol`) REFERENCES `symbols` (`symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daily_prices`
--

LOCK TABLES `daily_prices` WRITE;
/*!40000 ALTER TABLE `daily_prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `daily_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `symbols`
--

DROP TABLE IF EXISTS `symbols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `symbols` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `symbol` varchar(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `symbol` (`symbol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `symbols`
--

LOCK TABLES `symbols` WRITE;
/*!40000 ALTER TABLE `symbols` DISABLE KEYS */;
INSERT INTO `symbols` VALUES (1,'PETR4.SA',NULL),(2,'ITUB4.SA',NULL);
/*!40000 ALTER TABLE `symbols` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-21  1:22:52

-- MySQL dump 10.13  Distrib 5.7.12, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: mitwork
-- ------------------------------------------------------
-- Server version	5.7.15-0ubuntu0.16.04.1

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
-- Table structure for table `pupil`
--

DROP TABLE IF EXISTS `pupil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pupil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `graduation_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pupil`
--

LOCK TABLES `pupil` WRITE;
/*!40000 ALTER TABLE `pupil` DISABLE KEYS */;
INSERT INTO `pupil` VALUES (1,'Steeve Blane',4,5,'2000-02-19',NULL),(2,'Sophia King',2,5,'2009-09-01','2005-04-13'),(3,'Olivia Lee',2,4,'2009-09-01',NULL),(4,'Emma Martin',4,5,'2010-09-01',NULL),(5,'Jacob Clarke',3,5,'2010-09-01',NULL),(6,'Jastin Moore',1,3,'2011-09-01',NULL),(7,'James Freeman',1,3,'2014-09-01',NULL),(8,'Olivia Hughes',1,5,'2011-09-01',NULL),(9,'Matthew Edwards',4,3,'2011-09-01',NULL),(10,'Ethan Hill',1,2,'2011-09-01',NULL),(11,'Emily More',3,4,'2012-09-01',NULL),(12,'Andrew Clark',2,4,'2012-09-01',NULL),(13,'Abigail Harrison',4,5,'2012-09-01',NULL),(14,'Madison Scott',4,4,'2012-09-01',NULL),(15,'Mia Young',2,5,'2012-09-01',NULL),(16,'Daniel Morris',3,3,'2012-09-01',NULL),(17,'Chloe Hall',1,5,'2013-09-01',NULL),(18,'Elizabeth Ward',1,3,'2013-09-01',NULL),(19,'Anthony Turner',3,4,'2013-09-01',NULL),(20,'Christopher Carter',4,5,'2013-09-01',NULL),(21,'Joseph Phillips',2,2,'2013-09-01',NULL),(22,'William Mitchell',1,5,'2013-09-01',NULL),(23,'Ella Patel',3,4,'2014-09-01',NULL),(24,'Addison Adams	',3,3,'2014-09-01',NULL),(25,'Natalie Campbell	',2,3,'2014-09-01',NULL),(26,'Alexander Anderson',2,3,'2014-09-01',NULL),(27,'Talor Chaos',2,5,'2009-05-01',NULL),(28,'Mattiew Stetham',2,5,'2001-09-02',NULL),(29,'Donald Umeh',2,5,'2001-09-02',NULL),(30,'Martin Curtis',1,3,'2009-05-01',NULL),(31,'Bruno Devis',3,4,'2017-09-01',NULL);
/*!40000 ALTER TABLE `pupil` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-26 22:47:43

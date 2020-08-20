-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u891156230_iDocument
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `back_up`
--

DROP TABLE IF EXISTS `back_up`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `back_up` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filepath` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filefolder` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_uploaded` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `back_up`
--

/*!40000 ALTER TABLE `back_up` DISABLE KEYS */;
INSERT INTO `back_up` VALUES (128,'test2','files/MY CERTIFICATES.docx','test','2020-03-15'),(129,'test3','files/POSTER DOOR ROOMS PDF.pdf','test','2020-03-15'),(130,'cherryspojnsor','files/CHERRY MOBILE SPONSORSHIP.docx','test','2020-03-15');
/*!40000 ALTER TABLE `back_up` ENABLE KEYS */;

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `filepath` varchar(500) NOT NULL,
  `folder_loc` varchar(40) NOT NULL,
  `uploaded_by` varchar(40) DEFAULT NULL,
  `date_uploaded` varchar(40) DEFAULT current_timestamp(),
  `status` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=273 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file`
--

/*!40000 ALTER TABLE `file` DISABLE KEYS */;
INSERT INTO `file` VALUES (268,'test1','files/iDOCUMENT HOME PAGE.PNG','test',NULL,'2020-03-14 18:01:47','restored'),(269,'test2','files/MY CERTIFICATES.docx','test',NULL,'2020-03-14 18:01:48','restored'),(270,'test3','files/POSTER DOOR ROOMS PDF.pdf','test',NULL,'2020-03-14 18:01:49','restored'),(271,'cherryspojnsor','files/CHERRY MOBILE SPONSORSHIP.docx','test',NULL,'2020-03-14 18:01:51','restored'),(272,'test1','files/iDOCUMENT HOME PAGE.PNG','Recovered files',NULL,'2020-03-15 11:30:59','back up');
/*!40000 ALTER TABLE `file` ENABLE KEYS */;

--
-- Table structure for table `folder`
--

DROP TABLE IF EXISTS `folder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `folder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folder_name` varchar(40) NOT NULL,
  `folder_description` varchar(250) NOT NULL,
  `favorite` varchar(40) DEFAULT 'no',
  `permanent` varchar(40) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`),
  UNIQUE KEY `folder_name` (`folder_name`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `folder`
--

/*!40000 ALTER TABLE `folder` DISABLE KEYS */;
INSERT INTO `folder` VALUES (118,'Recovered files','Files recovered from back up/recycle bin','no','yes'),(134,'test','esfdfdf','no','no');
/*!40000 ALTER TABLE `folder` ENABLE KEYS */;

--
-- Table structure for table `recycle_bin`
--

DROP TABLE IF EXISTS `recycle_bin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recycle_bin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `filepath` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `filefolder` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recycle_bin`
--

/*!40000 ALTER TABLE `recycle_bin` DISABLE KEYS */;
/*!40000 ALTER TABLE `recycle_bin` ENABLE KEYS */;

--
-- Table structure for table `recycle_folder`
--

DROP TABLE IF EXISTS `recycle_folder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recycle_folder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folder_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recycle_folder`
--

/*!40000 ALTER TABLE `recycle_folder` DISABLE KEYS */;
/*!40000 ALTER TABLE `recycle_folder` ENABLE KEYS */;

--
-- Table structure for table `shared_files`
--

DROP TABLE IF EXISTS `shared_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shared_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(400) NOT NULL,
  `file_path` varchar(400) NOT NULL,
  `shared_to` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shared_files`
--

/*!40000 ALTER TABLE `shared_files` DISABLE KEYS */;
INSERT INTO `shared_files` VALUES (101,'test3','files/POSTER DOOR ROOMS PDF.pdf','rcampang'),(102,'test2','files/MY CERTIFICATES.docx','rcampang'),(103,'test1','files/iDOCUMENT HOME PAGE.PNG','rcampang'),(104,'test3','files/POSTER DOOR ROOMS PDF.pdf','rcampang'),(105,'test2','files/MY CERTIFICATES.docx','rcampang'),(106,'test1','files/iDOCUMENT HOME PAGE.PNG','rcampang'),(107,'test3','files/POSTER DOOR ROOMS PDF.pdf','rcampang'),(108,'test2','files/MY CERTIFICATES.docx','miggy.uy1414'),(109,'test2','files/MY CERTIFICATES.docx','miggy.uy1414'),(110,'test1','files/iDOCUMENT HOME PAGE.PNG','miggy.uy1414'),(111,'test1','files/iDOCUMENT HOME PAGE.PNG','miggy.uy1414'),(112,'test2','files/MY CERTIFICATES.docx','miggy.uy1414'),(113,'test1','files/iDOCUMENT HOME PAGE.PNG','rcampang'),(114,'test1','files/iDOCUMENT HOME PAGE.PNG','rcampang'),(115,'test1','files/iDOCUMENT HOME PAGE.PNG','rcampang'),(116,'cherryspojnsor','files/CHERRY MOBILE SPONSORSHIP.docx','rcampang'),(117,'cherryspojnsor','files/CHERRY MOBILE SPONSORSHIP.docx','miggy.uy1414'),(118,'test1','files/iDOCUMENT HOME PAGE.PNG','rcampang'),(119,'test2','files/MY CERTIFICATES.docx','rcampang'),(120,'test3','files/POSTER DOOR ROOMS PDF.pdf','rcampang'),(121,'test3','files/POSTER DOOR ROOMS PDF.pdf','rcampang'),(122,'test2','files/MY CERTIFICATES.docx','rcampang'),(123,'test1','files/iDOCUMENT HOME PAGE.PNG','rcampang'),(124,'test2','files/MY CERTIFICATES.docx','rcampang'),(125,'cherryspojnsor','files/CHERRY MOBILE SPONSORSHIP.docx','rcampang');
/*!40000 ALTER TABLE `shared_files` ENABLE KEYS */;

--
-- Table structure for table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `usertype` varchar(40) NOT NULL,
  `newuser` varchar(10) NOT NULL DEFAULT 'yes',
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `email` varchar(100) NOT NULL,
  `notification` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_login`
--

/*!40000 ALTER TABLE `user_login` DISABLE KEYS */;
INSERT INTO `user_login` VALUES (1,'admin','PASSadmin2020','admin','admin','admin','no','active','idocumentauscs@gmail.com',''),(52,'rcampang','123456','Rodel','Campang','user','no','active','blueknyt_11@yahoo.com','yes'),(56,'karmoran','KMM2020kmm','Karen Mae','Moran','user','no','active','blueknyt_11@yahoo.com','yes'),(57,'ibalonzo','IBA2020iba','Ivan Briz','Alonzo','user','no','active','blueknyt_11@yahoo.com','yes'),(60,'rmpasiwagan','RMP2020rmp','Renzdy Marie','Pasiwagan','user','no','active','blueknyt_11@yahoo.com','no'),(61,'ruth','12345678','Ruth','Vistro','admin','no','active','ruth@gmail.com',''),(62,'bernadette','12345678','Ruth','Vistro','user','no','active','ruth@gmail.com','yes');
/*!40000 ALTER TABLE `user_login` ENABLE KEYS */;

--
-- Table structure for table `user_upload`
--

DROP TABLE IF EXISTS `user_upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filepath` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_by` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shared_by` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `date_uploaded` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_upload`
--

/*!40000 ALTER TABLE `user_upload` DISABLE KEYS */;
INSERT INTO `user_upload` VALUES (112,'test3','files/POSTER DOOR ROOMS PDF.pdf','rcampang','admin','yes','2020-03-14 07:59:52'),(113,'test2','files/MY CERTIFICATES.docx','rcampang','admin','yes','2020-03-14 08:00:02'),(114,'test1','files/iDOCUMENT HOME PAGE.PNG','rcampang','admin','yes','2020-03-14 08:00:11'),(115,'testsponsor','files/HP SPONSORSHIP.docx','rcampang','user','yes','2020-03-14 08:01:18'),(117,'try','files/scs.png','ibalonzo','user','yes','2020-03-14 08:10:54'),(118,'b','files/SCS_Logo.png','ibalonzo','user','yes','2020-03-14 08:20:16'),(119,'test3','files/POSTER DOOR ROOMS PDF.pdf','rcampang','admin','yes','2020-03-14 08:20:23'),(120,'test2','files/MY CERTIFICATES.docx','rcampang','admin','yes','2020-03-14 08:20:30'),(122,'sponsoragain','files/BLACK KNIGHT SPONSORSHIP.docx','rcampang','user','yes','2020-03-14 08:24:13'),(123,'test3','files/POSTER DOOR ROOMS PDF.pdf','rcampang','admin','yes','2020-03-14 08:25:31'),(124,'test2','files/MY CERTIFICATES.docx','miggy.uy1414','admin','yes','2020-03-14 08:46:04'),(125,'test2','files/MY CERTIFICATES.docx','miggy.uy1414','admin','yes','2020-03-14 08:48:12'),(126,'test1','files/iDOCUMENT HOME PAGE.PNG','miggy.uy1414','admin','yes','2020-03-14 08:50:34'),(127,'test1','files/iDOCUMENT HOME PAGE.PNG','miggy.uy1414','admin','yes','2020-03-14 08:51:26'),(128,'test2','files/MY CERTIFICATES.docx','miggy.uy1414','admin','yes','2020-03-14 08:52:42'),(129,'test1','files/iDOCUMENT HOME PAGE.PNG','rcampang','admin','yes','2020-03-14 08:59:48'),(133,'cherryspojnsor','files/CHERRY MOBILE SPONSORSHIP.docx','miggy.uy1414','admin','yes','2020-03-14 09:16:00'),(139,'test123456','files/BLACK KNIGHT SPONSORSHIP.docx','rcampang','user','yes','2020-03-14 17:41:21'),(140,'test654321','files/BROTHER PRINTER SPONSORSHIP.docx','rcampang','user','yes','2020-03-14 17:41:33');
/*!40000 ALTER TABLE `user_upload` ENABLE KEYS */;

--
-- Dumping routines for database 'u891156230_iDocument'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-19 17:16:18

-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: sanpedro
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `sp_cita`
--

DROP TABLE IF EXISTS `sp_cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_cita` (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `numero_cita` tinyint(4) DEFAULT NULL,
  `tipo_tratamiento` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `observacion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_odontologo` int(11) NOT NULL,
  `costo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` enum('PENDIENTE','CANCELADA','ATENDIDA') COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cita`),
  KEY `fk_cita_paciente` (`id_paciente`),
  KEY `fk_cita_odontologo` (`id_odontologo`),
  CONSTRAINT `fk_cita_odontologo` FOREIGN KEY (`id_odontologo`) REFERENCES `sp_odontologo` (`id_odontologo`),
  CONSTRAINT `fk_cita_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_cita`
--

LOCK TABLES `sp_cita` WRITE;
/*!40000 ALTER TABLE `sp_cita` DISABLE KEYS */;
INSERT INTO `sp_cita` VALUES (1,8,'Prevencion','el paciente cuenta editrado','2021-03-23','04:15:00','00:00:00',1,5,'costo','PENDIENTE',0,'2021-02-16 15:39:11','2021-03-16 02:05:45'),(3,2,'Restauracion','hola edit','2021-03-27','12:30:00','00:00:00',1,5,'costo','PENDIENTE',0,'2021-02-18 15:44:22','2021-03-05 02:38:52'),(4,NULL,'LP','sfdaskfds fjaslkfjsadklf','1990-05-05','00:00:00','00:00:00',1,2,'CH','PENDIENTE',0,'2021-02-18 15:46:31',NULL),(5,NULL,'OR','jua jca','2020-12-12','00:00:00','00:00:00',1,2,'CH','PENDIENTE',0,'2021-02-18 15:47:20',NULL),(6,NULL,'CH','prueba final','2021-02-10','00:00:00','00:00:00',1,2,'CH','PENDIENTE',0,'2021-02-18 15:48:26',NULL),(7,NULL,'Prevencion','alsdfjslk','2021-02-09','00:00:00','00:00:00',1,2,'CH','PENDIENTE',0,'2021-02-18 15:49:56',NULL),(8,NULL,'Prevencion','ninguna','2021-02-16','00:00:00','00:00:00',4,5,'Gratuito','PENDIENTE',0,'2021-02-19 22:08:42',NULL),(9,NULL,'Restauracion','wewqqwqqs','2021-03-19','12:30:00','00:00:00',1,5,NULL,'PENDIENTE',0,'2021-03-03 18:51:14',NULL),(10,3,'Restauracion','dfgfvsv','2021-03-30','12:30:00','00:00:00',4,5,'Gratuito','PENDIENTE',0,'2021-03-06 14:10:02',NULL),(11,4,'Endodoncia','rferfef','2021-03-31','12:30:00','00:00:00',1,2,'Gratuito','PENDIENTE',0,'2021-03-06 14:23:39','2021-03-06 14:23:57'),(12,5,'Periodoncia','fwefadfsdds','2021-03-28','13:30:00','00:00:00',4,2,'Gratuito','PENDIENTE',0,'2021-03-06 23:09:46','2021-03-06 23:10:17'),(13,5,'Periodoncia','jhjgjgjhv','2021-03-31','18:00:00','00:00:00',1,5,'Gratuito','PENDIENTE',0,'2021-03-09 13:16:27','2021-03-12 23:46:18'),(14,1,'Cirujia Bucal','wfdsfsdcdssdcdsc','2021-04-05','10:30:00','00:00:00',6,5,'Gratuito','PENDIENTE',0,'2021-03-12 23:45:56',NULL),(15,2,'Cirujia Bucal','jkjbkhkjbbkmn','2021-04-12','12:30:00','00:00:00',6,5,'Gratuito','PENDIENTE',0,'2021-03-12 23:49:45',NULL),(16,6,'Periodoncia','ssaxasxasxs','2021-04-23','12:45:00','00:00:00',1,5,'Gratuito','PENDIENTE',0,'2021-03-14 02:48:51',NULL),(17,3,'Restauracion','sdcsdcsdcsd','2021-04-07','15:00:00','00:00:00',6,5,'Gratuito','PENDIENTE',0,'2021-03-14 02:56:37',NULL),(18,4,'Restauracion','csdcsdcsd','2021-04-02','12:02:00','00:00:00',6,5,'Gratuito','PENDIENTE',0,'2021-03-14 14:42:20',NULL),(19,5,'Restauracion','wefsdfsadfad','2021-04-02','18:00:00','00:00:00',6,5,'Gratuito','PENDIENTE',0,'2021-03-14 14:43:41',NULL),(20,13,'Prevencion','El paciente tiene algunas complicaciones en las piezas dentales','2021-04-13','14:00:00','00:00:00',3,5,'costo','CANCELADA',1,'2021-03-14 15:17:48','2021-04-05 16:47:35'),(21,9,'Restauracion','dfsdcdscd','2021-04-14','09:30:00','00:00:00',6,5,'costo','ATENDIDA',1,'2021-03-14 15:21:31','2021-03-18 01:26:01'),(22,10,'Restauracion','dfsdfsdsdfc','2021-04-22','08:00:00','00:00:00',6,5,'Gratuito','ATENDIDA',1,'2021-03-14 19:09:47','2021-03-18 01:26:24'),(23,11,'Restauracion','sdsdcsdcds','2021-04-26','10:00:00','00:00:00',3,2,'costo','CANCELADA',1,'2021-03-15 18:20:20','2021-04-01 23:40:09'),(24,12,'Periodoncia','el paciente lleva una dentadura rota','2021-05-03','15:00:00','00:00:00',3,5,'costo','PENDIENTE',1,'2021-03-15 23:19:57','2021-04-02 21:11:26'),(25,7,'Restauracion','dasxasxasxasxasx','2021-04-30','08:00:00','00:00:00',3,5,'Gratuito','PENDIENTE',1,'2021-03-16 16:03:53',NULL),(26,11,'Restauracion','vsdfsdcdc','2021-04-15','14:30:00','15:30:00',6,2,'Gratuito','PENDIENTE',1,'2021-03-23 21:12:37',NULL),(27,9,'Periodoncia','el paciente tiene fiebre por inflamacion dental','2021-04-07','15:00:00','15:30:00',1,5,'Gratuito','PENDIENTE',1,'2021-04-07 23:44:33',NULL),(28,16,'Endodoncia','huhhihi','2021-05-12','15:00:00','15:30:00',3,2,'Gratuito','PENDIENTE',1,'2021-05-08 20:47:18','2021-05-08 20:48:19'),(29,12,'Restauracion','dcacasdas','2021-05-27','15:00:00','15:30:00',6,5,'Gratuito','PENDIENTE',1,'2021-05-08 20:50:10',NULL);
/*!40000 ALTER TABLE `sp_cita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_grupo`
--

DROP TABLE IF EXISTS `sp_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_grupo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado_grupo` tinyint(1) NOT NULL DEFAULT 1,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_grupo`
--

LOCK TABLES `sp_grupo` WRITE;
/*!40000 ALTER TABLE `sp_grupo` DISABLE KEYS */;
INSERT INTO `sp_grupo` VALUES (1,'ADMINISTRADOR',1,'2021-02-15 15:55:05',NULL),(2,'ODONTOLOGO',1,'2021-02-15 15:55:05',NULL),(3,'PACIENTE',1,'2021-02-15 15:55:06',NULL);
/*!40000 ALTER TABLE `sp_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_grupo_usuario`
--

DROP TABLE IF EXISTS `sp_grupo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_grupo_usuario` (
  `id_grupo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `ip_usuario` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `navegador` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_grupo_usuario`),
  KEY `fk_grupousuario_grupo` (`id_grupo`),
  KEY `fk_grupousuario_usuario` (`id_usuario`),
  CONSTRAINT `fk_grupousuario_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `sp_grupo` (`id_grupo`),
  CONSTRAINT `fk_grupousuario_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `sp_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_grupo_usuario`
--

LOCK TABLES `sp_grupo_usuario` WRITE;
/*!40000 ALTER TABLE `sp_grupo_usuario` DISABLE KEYS */;
INSERT INTO `sp_grupo_usuario` VALUES (1,3,1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0','2021-02-15 16:04:34','2021-06-04 13:15:16'),(2,2,2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0','2021-02-15 21:47:00','2021-05-26 01:07:52'),(3,3,3,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0','2021-02-19 22:01:47','2021-06-10 15:04:03'),(4,3,4,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.19','2021-02-19 22:03:22','2021-03-05 02:49:02'),(5,2,5,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0','2021-02-19 22:07:43','2021-03-18 03:01:27'),(6,3,6,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0','2021-03-12 23:41:06','2021-06-09 04:52:52'),(7,2,7,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0','2021-05-09 04:19:25','2021-05-10 02:08:11'),(8,3,8,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0','2021-05-16 21:44:15','2021-05-26 02:25:05'),(9,3,9,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0','2021-05-26 02:50:19',NULL),(10,3,10,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0','2021-05-26 02:57:52',NULL),(11,3,11,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0','2021-05-26 03:17:52',NULL),(12,3,12,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0','2021-05-26 03:23:11','2021-06-04 14:35:12'),(13,3,13,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0','2021-05-26 04:05:43',NULL);
/*!40000 ALTER TABLE `sp_grupo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_lesiones_cariosas`
--

DROP TABLE IF EXISTS `sp_lesiones_cariosas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_lesiones_cariosas` (
  `id_lesiones_cariosas` int(11) NOT NULL AUTO_INCREMENT,
  `id_odontograma` int(11) DEFAULT NULL,
  `id_tratamiento_diagnostico` int(11) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_lesiones_cariosas`),
  KEY `sp_lesiones_cariosas_fk` (`id_odontograma`),
  KEY `sp_lesiones_cariosas_fk1` (`id_tratamiento_diagnostico`),
  CONSTRAINT `sp_lesiones_cariosas_fk` FOREIGN KEY (`id_odontograma`) REFERENCES `sp_odontograma` (`id_odontograma`),
  CONSTRAINT `sp_lesiones_cariosas_fk1` FOREIGN KEY (`id_tratamiento_diagnostico`) REFERENCES `sp_tratamiento_diagnostico` (`id_tratamiento_diagnostico`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_lesiones_cariosas`
--

LOCK TABLES `sp_lesiones_cariosas` WRITE;
/*!40000 ALTER TABLE `sp_lesiones_cariosas` DISABLE KEYS */;
INSERT INTO `sp_lesiones_cariosas` VALUES (11,11,2,5,'2021-05-26 23:29:07',NULL),(12,12,1,5,'2021-05-26 23:29:07',NULL),(13,13,4,5,'2021-05-26 23:29:07',NULL),(26,31,2,5,'2021-06-12 03:28:40',NULL),(27,32,2,5,'2021-06-12 03:28:40',NULL),(28,33,2,5,'2021-06-12 03:28:40',NULL),(29,34,2,5,'2021-06-12 03:28:40',NULL),(30,35,2,5,'2021-06-12 03:28:40',NULL),(31,36,2,5,'2021-06-12 03:28:40',NULL);
/*!40000 ALTER TABLE `sp_lesiones_cariosas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_ocupacion`
--

DROP TABLE IF EXISTS `sp_ocupacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_ocupacion` (
  `id_ocupacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ocupacion`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_ocupacion`
--

LOCK TABLES `sp_ocupacion` WRITE;
/*!40000 ALTER TABLE `sp_ocupacion` DISABLE KEYS */;
INSERT INTO `sp_ocupacion` VALUES (1,'Adiestrador','2021-02-15 15:55:26',NULL),(2,'Adivino','2021-02-15 15:55:26',NULL),(3,'Administrador de fincas','2021-02-15 15:55:26',NULL),(4,'Adornista','2021-02-15 15:55:26',NULL),(5,'Afiliado','2021-02-15 15:55:26',NULL),(6,'Agente de bolsa','2021-02-15 15:55:26',NULL),(7,'Agente de desarrollo local','2021-02-15 15:55:26',NULL),(8,'Agente de viajes','2021-02-15 15:55:26',NULL),(9,'Agente doble','2021-02-15 15:55:26',NULL),(10,'Agente encubierto','2021-02-15 15:55:26',NULL),(11,'Alcahuete','2021-02-15 15:55:26',NULL),(12,'Alguacil','2021-02-15 15:55:27',NULL),(13,'Algueros','2021-02-15 15:55:27',NULL),(14,'Ama de casa','2021-02-15 15:55:27',NULL),(15,'Ama de crianza','2021-02-15 15:55:27',NULL),(16,'Aprendiz','2021-02-15 15:55:27',NULL),(17,'Archivero','2021-02-15 15:55:27',NULL),(18,'Armero (profesi?n)','2021-02-15 15:55:27',NULL),(19,'Arquitecto del paisaje','2021-02-15 15:55:27',NULL),(20,'Ascensorista','2021-02-15 15:55:27',NULL),(21,'Asesor (oficio)','2021-02-15 15:55:27',NULL),(22,'Asesor financiero','2021-02-15 15:55:28',NULL),(23,'Asesor fiscal','2021-02-15 15:55:28',NULL),(24,'Asesor mercantil','2021-02-15 15:55:28',NULL),(25,'Auditor','2021-02-15 15:55:28',NULL),(26,'Barrendero','2021-02-15 15:55:28',NULL),(27,'Basurero','2021-02-15 15:55:28',NULL),(28,'Bedel','2021-02-15 15:55:28',NULL),(29,'Bibliotecario','2021-02-15 15:55:28',NULL),(30,'Br?ker','2021-02-15 15:55:28',NULL),(31,'B?squeda de empleo','2021-02-15 15:55:28',NULL),(32,'Calderero','2021-02-15 15:55:28',NULL),(33,'Cambista','2021-02-15 15:55:28',NULL),(34,'Cantante','2021-02-15 15:55:29',NULL),(35,'Carretillero','2021-02-15 15:55:29',NULL),(36,'Cartero','2021-02-15 15:55:29',NULL),(37,'Cartoneo','2021-02-15 15:55:29',NULL),(38,'Catador de alimentos','2021-02-15 15:55:29',NULL),(39,'Cazador de sanguijuelas','2021-02-15 15:55:29',NULL),(40,'Cazafantasmas (parapsicolog?a)','2021-02-15 15:55:29',NULL),(41,'Cazatalentos','2021-02-15 15:55:29',NULL),(42,'Cham?n','2021-02-15 15:55:29',NULL),(43,'Chambel?n','2021-02-15 15:55:29',NULL),(44,'Cicerone','2021-02-15 15:55:29',NULL),(45,'Cocalero','2021-02-15 15:55:29',NULL),(46,'Condestable','2021-02-15 15:55:30',NULL),(47,'Conserje','2021-02-15 15:55:30',NULL),(48,'Consultor','2021-02-15 15:55:30',NULL),(49,'Contador p?blico','2021-02-15 15:55:30',NULL),(50,'Contenidista','2021-02-15 15:55:30',NULL),(51,'Coolhunting','2021-02-15 15:55:30',NULL),(52,'Corrector de textos','2021-02-15 15:55:30',NULL),(53,'Corredor de apuestas','2021-02-15 15:55:30',NULL),(54,'Corredor de seguros','2021-02-15 15:55:30',NULL),(55,'Counseling','2021-02-15 15:55:30',NULL),(56,'Crimin?logo','2021-02-15 15:55:30',NULL),(57,'Crupier','2021-02-15 15:55:31',NULL),(58,'Cuerpo de Registradores de la iedad, Mercantiles y de Bienes Muebles','2021-02-15 15:55:31',NULL),(59,'Curandero','2021-02-15 15:55:31',NULL),(60,'Decorador','2021-02-15 15:55:31',NULL),(61,'Delineante','2021-02-15 15:55:31',NULL),(62,'Diplom?tico','2021-02-15 15:55:31',NULL),(63,'Director de colecci?n','2021-02-15 15:55:31',NULL),(64,'Director de comunicaci?n','2021-02-15 15:55:31',NULL),(65,'Dise?ador','2021-02-15 15:55:31',NULL),(66,'Dise?ador floral','2021-02-15 15:55:31',NULL),(67,'Economista','2021-02-15 15:55:31',NULL),(68,'Editor de sonido','2021-02-15 15:55:32',NULL),(69,'Facilitador','2021-02-15 15:55:32',NULL),(70,'Fisioterapeuta','2021-02-15 15:55:32',NULL),(71,'Forts des halles','2021-02-15 15:55:32',NULL),(72,'Gaberlunzie','2021-02-15 15:55:32',NULL),(73,'Garimpeiro','2021-02-15 15:55:32',NULL),(74,'Geisha','2021-02-15 15:55:32',NULL),(75,'Guardi?n del Registro','2021-02-15 15:55:32',NULL),(76,'Gu?a acompa?ante','2021-02-15 15:55:32',NULL),(77,'Gu?a de turismo','2021-02-15 15:55:32',NULL),(78,'Gu?a de monta?a','2021-02-15 15:55:33',NULL),(79,'Hechicero','2021-02-15 15:55:33',NULL),(80,'Historietista','2021-02-15 15:55:33',NULL),(81,'Hombre anuncio','2021-02-15 15:55:33',NULL),(82,'Hospitalero','2021-02-15 15:55:33',NULL),(83,'Inform?tico','2021-02-15 15:55:33',NULL),(84,'Ingeniero(a) geol?gica','2021-02-15 15:55:33',NULL),(85,'Ingeniero de software','2021-02-15 15:55:33',NULL),(86,'Ingeniero mecanico','2021-02-15 15:55:33',NULL),(87,'Ingeniero de Sistemas','2021-02-15 15:55:33',NULL),(88,'Ingeniero de civil','2021-02-15 15:55:34',NULL),(89,'Ingeniero de sonido','2021-02-15 15:55:34',NULL),(90,'Ingeniero electr?nico','2021-02-15 15:55:34',NULL),(91,'Integrador social','2021-02-15 15:55:34',NULL),(92,'Int?rprete (profesi?n)','2021-02-15 15:55:34',NULL),(93,'Investigador','2021-02-15 15:55:34',NULL),(94,'Jardinero','2021-02-15 15:55:34',NULL),(95,'Jugador de videojuegos','2021-02-15 15:55:34',NULL),(96,'Lapidario (profesi?n)','2021-02-15 15:55:34',NULL),(97,'Le?ador','2021-02-15 15:55:35',NULL),(98,'Limpiabotas','2021-02-15 15:55:35',NULL),(99,'Lord gran chambel?n','2021-02-15 15:55:35',NULL),(100,'Maestro de esp?as','2021-02-15 15:55:35',NULL),(101,'Mandatario Registral de Automotores','2021-02-15 15:55:35',NULL),(102,'Manicura (ocupaci?n)','2021-02-15 15:55:35',NULL),(103,'Martillero p?blico','2021-02-15 15:55:35',NULL),(104,'Masajista','2021-02-15 15:55:35',NULL),(105,'Mec?nico','2021-02-15 15:55:35',NULL),(106,'Mecan?grafo','2021-02-15 15:55:35',NULL),(107,'Mensajero','2021-02-15 15:55:35',NULL),(108,'Minero','2021-02-15 15:55:36',NULL),(109,'Oficio (profesi?n)','2021-02-15 15:55:36',NULL),(110,'Oiran','2021-02-15 15:55:36',NULL),(111,'Ojeador','2021-02-15 15:55:36',NULL),(112,'Nai Palm','2021-02-15 15:55:36',NULL),(113,'Peluquero','2021-02-15 15:55:36',NULL),(114,'Peluquero canino','2021-02-15 15:55:36',NULL),(115,'Persevante','2021-02-15 15:55:36',NULL),(116,'Planificador financiero','2021-02-15 15:55:37',NULL),(117,'Plastoqu?mico','2021-02-15 15:55:37',NULL),(118,'Portero de edificio','2021-02-15 15:55:37',NULL),(119,'Profesional','2021-02-15 15:55:37',NULL),(120,'Otro','2021-02-15 15:55:38',NULL),(121,'Recaudador de impuestos','2021-02-15 15:55:38',NULL),(122,'Reciclador de base','2021-02-15 15:55:38',NULL),(123,'Reservista','2021-02-15 15:55:38',NULL),(124,'Riacheros','2021-02-15 15:55:38',NULL),(125,'Socialite','2021-02-15 15:55:38',NULL),(126,'Socorrista acu?tico','2021-02-15 15:55:38',NULL),(127,'Taquillero','2021-02-15 15:55:38',NULL),(128,'T?cnico de Laboratorio de Universidad','2021-02-15 15:55:38',NULL),(129,'T?cnico de sistemas','2021-02-15 15:55:38',NULL),(130,'Telefonista','2021-02-15 15:55:39',NULL),(131,'Tesorero','2021-02-15 15:55:39',NULL),(132,'Trabajador aut?nomo','2021-02-15 15:55:39',NULL),(133,'Valet parking','2021-02-15 15:55:39',NULL),(134,'Veedor (viticultura)','2021-02-15 15:55:39',NULL),(135,'Verdugo','2021-02-15 15:55:41',NULL);
/*!40000 ALTER TABLE `sp_ocupacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_odontograma`
--

DROP TABLE IF EXISTS `sp_odontograma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_odontograma` (
  `id_odontograma` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) DEFAULT NULL,
  `id_pieza_dental` int(11) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_odontograma`),
  KEY `sp_odontograma_fk` (`id_paciente`),
  KEY `sp_odontograma_fk1` (`id_pieza_dental`),
  CONSTRAINT `sp_odontograma_fk` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`),
  CONSTRAINT `sp_odontograma_fk1` FOREIGN KEY (`id_pieza_dental`) REFERENCES `sp_pieza_dental` (`id_pieza_dental`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_odontograma`
--

LOCK TABLES `sp_odontograma` WRITE;
/*!40000 ALTER TABLE `sp_odontograma` DISABLE KEYS */;
INSERT INTO `sp_odontograma` VALUES (11,3,23,'2021-05-26 23:29:07',NULL),(12,3,7,'2021-05-26 23:29:07',NULL),(13,3,25,'2021-05-26 23:29:07',NULL),(31,1,24,'2021-06-12 03:28:40',NULL),(32,1,7,'2021-06-12 03:28:40',NULL),(33,1,25,'2021-06-12 03:28:40',NULL),(34,1,2,'2021-06-12 03:28:40',NULL),(35,1,21,'2021-06-12 03:28:40',NULL),(36,1,23,'2021-06-12 03:28:40',NULL),(37,1,28,'2021-06-12 03:28:40',NULL);
/*!40000 ALTER TABLE `sp_odontograma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_odontologo`
--

DROP TABLE IF EXISTS `sp_odontologo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_odontologo` (
  `id_odontologo` int(11) NOT NULL,
  `turno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `gestion_ingreso` year(4) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_odontologo`),
  CONSTRAINT `fk_persona_odontologo` FOREIGN KEY (`id_odontologo`) REFERENCES `sp_persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_odontologo`
--

LOCK TABLES `sp_odontologo` WRITE;
/*!40000 ALTER TABLE `sp_odontologo` DISABLE KEYS */;
INSERT INTO `sp_odontologo` VALUES (2,'MAÑANA-TARDE',2020,'2021-02-15 21:47:00','2021-05-26 01:07:52'),(5,'MAÑANA',2019,'2021-02-19 22:07:43','2021-03-18 03:01:27'),(7,'TARDE',2018,'2021-05-09 04:19:25','2021-05-10 02:08:11');
/*!40000 ALTER TABLE `sp_odontologo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_paciente`
--

DROP TABLE IF EXISTS `sp_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_paciente` (
  `id_paciente` int(11) NOT NULL,
  `id_ocupacion` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_paciente`),
  KEY `fk_paciente_ocupacion` (`id_ocupacion`),
  CONSTRAINT `fk_paciente_ocupacion` FOREIGN KEY (`id_ocupacion`) REFERENCES `sp_ocupacion` (`id_ocupacion`),
  CONSTRAINT `fk_persona_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_paciente`
--

LOCK TABLES `sp_paciente` WRITE;
/*!40000 ALTER TABLE `sp_paciente` DISABLE KEYS */;
INSERT INTO `sp_paciente` VALUES (1,5,'2021-02-15 16:04:34','2021-06-04 13:15:16'),(3,2,'2021-02-19 22:01:47','2021-06-10 15:04:03'),(4,17,'2021-02-19 22:03:22','2021-03-05 02:49:02'),(6,2,'2021-03-12 23:41:06','2021-06-09 04:52:52'),(8,6,'2021-05-16 21:44:15','2021-05-26 02:25:05'),(9,4,'2021-05-26 02:50:19',NULL),(10,4,'2021-05-26 02:57:52',NULL),(11,6,'2021-05-26 03:17:52',NULL),(12,4,'2021-05-26 03:23:11','2021-06-04 14:35:12'),(13,4,'2021-05-26 04:05:43',NULL);
/*!40000 ALTER TABLE `sp_paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_persona`
--

DROP TABLE IF EXISTS `sp_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `ci` int(11) NOT NULL,
  `expedido` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `paterno` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `materno` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sexo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `lugar_nacimiento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_celular` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `domicilio` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` enum('ACTIVO','INACTIVO') COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_persona`
--

LOCK TABLES `sp_persona` WRITE;
/*!40000 ALTER TABLE `sp_persona` DISABLE KEYS */;
INSERT INTO `sp_persona` VALUES (1,12345678,'LP','Fernando','Chambi','Bautista','masculino','Coroico','67333533','2021-03-22','pinos el alto','ACTIVO',1,'2021-02-15 16:04:34','2021-06-04 13:15:16'),(2,10907085,'LP','Luis','Chambi','Bautista','','','67333533','1995-03-22','San Felipe','ACTIVO',1,'2021-02-15 21:47:00','2021-05-26 01:07:52'),(3,15689458,'LP','Jorge','Flores','Campos','masculino','kiswaras','7658956','1999-02-16','kiswaras','ACTIVO',1,'2021-02-19 22:01:47','2021-06-10 15:04:03'),(4,25896312,'CH','Hernan','Cortez','Charca','','','25896321','1995-03-22','Pinos ','ACTIVO',1,'2021-02-19 22:03:22','2021-03-05 02:49:02'),(5,14785896,'LP','Pablo','Montes','Carbajal','','','78596321','1708-02-15','Senkata','INACTIVO',1,'2021-02-19 22:07:43','2021-03-18 03:01:27'),(6,20252365,'CH','Franklim','Terrazas','Curvo','masculino','su zona','75896325','2021-03-01','palos blancos','INACTIVO',1,'2021-03-12 23:41:06','2021-06-09 04:52:52'),(7,45896,'LP','Rodolfo','Quispe','Quispe','','','54869562','2021-05-18','nknjkkk ','ACTIVO',0,'2021-05-09 04:19:25','2021-05-10 02:08:11'),(8,994874747,'CH','Elias','Apaza','Ajno','masculino','san pedro de curahuara','45653334','2021-05-03','san pedro','ACTIVO',1,'2021-05-16 21:44:15','2021-05-26 02:25:05'),(9,102589,'LP','Nombre','Choque','Materno','masculino','lugar','4587865','2021-05-13','domi','ACTIVO',0,'2021-05-26 02:50:19',NULL),(10,412569863,'LP','Quispe','Quispe','Quispe','masculino','quispe','458962','2021-05-13','quispe','ACTIVO',1,'2021-05-26 02:57:52',NULL),(11,14589,'CH','Hola','Hola','Hola','femenino','hola','145896','2021-05-13','domis','ACTIVO',1,'2021-05-26 03:17:52',NULL),(12,1099887,'CH','Joj','Jo','Jo','femenino','jo','1545895','2021-05-26','jo','ACTIVO',1,'2021-05-26 03:23:11','2021-06-04 14:35:12'),(13,10258963,'CH','Nn','Nn','Nn','masculino','nn','7458962','2021-05-18','nn','INACTIVO',1,'2021-05-26 04:05:43',NULL);
/*!40000 ALTER TABLE `sp_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_pieza_dental`
--

DROP TABLE IF EXISTS `sp_pieza_dental`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_pieza_dental` (
  `id_pieza_dental` int(11) NOT NULL AUTO_INCREMENT,
  `numero_pieza_dental` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pieza_dental`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_pieza_dental`
--

LOCK TABLES `sp_pieza_dental` WRITE;
/*!40000 ALTER TABLE `sp_pieza_dental` DISABLE KEYS */;
INSERT INTO `sp_pieza_dental` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10),(11,11),(12,12),(13,13),(14,14),(15,15),(16,16),(17,17),(18,18),(19,19),(20,20),(21,21),(22,22),(23,23),(24,24),(25,25),(26,26),(27,27),(28,28),(29,29),(30,30),(31,31),(32,32),(33,33),(34,34),(35,35),(36,36),(37,37),(38,38),(39,39),(40,40),(41,41),(42,42),(43,43),(44,44),(45,45),(46,46),(47,47),(48,48),(49,49),(50,50),(51,51),(52,52);
/*!40000 ALTER TABLE `sp_pieza_dental` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_tratamiento_alergias`
--

DROP TABLE IF EXISTS `sp_tratamiento_alergias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_tratamiento_alergias` (
  `id_alergia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_alergia` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `detalle` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_alergia`),
  KEY `fk_tratamiento_alergias_paciente` (`id_paciente`),
  CONSTRAINT `fk_tratamiento_alergias_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_tratamiento_alergias`
--

LOCK TABLES `sp_tratamiento_alergias` WRITE;
/*!40000 ALTER TABLE `sp_tratamiento_alergias` DISABLE KEYS */;
INSERT INTO `sp_tratamiento_alergias` VALUES (2,'nxsajxnaxsoakxas',' axaxaxasa',1,'2021-05-01 16:12:41','2021-06-10 08:34:53'),(3,'ssax','saxsaaxas',1,'2021-06-06 12:29:03',NULL),(4,'alergia','alergico a eso',3,'2021-06-06 15:09:45',NULL);
/*!40000 ALTER TABLE `sp_tratamiento_alergias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_tratamiento_consulta`
--

DROP TABLE IF EXISTS `sp_tratamiento_consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_tratamiento_consulta` (
  `id_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `tratamiento` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `motivo_tratamiento` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tomando_medicamentos` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `porque_tiempo` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `alergico_medicamento` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cual_medicamento` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `alguna_cirugia` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `porque` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `alguna_enfermedad` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cepilla_diente` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuanto_dia` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_consulta`),
  KEY `fk_tratamiento_consulta_paciente` (`id_paciente`),
  CONSTRAINT `fk_tratamiento_consulta_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_tratamiento_consulta`
--

LOCK TABLES `sp_tratamiento_consulta` WRITE;
/*!40000 ALTER TABLE `sp_tratamiento_consulta` DISABLE KEYS */;
INSERT INTO `sp_tratamiento_consulta` VALUES (1,'si','extraccion','si','por motivo de extraccion un tiempo aproximado  semana','si','refrianex','si','por motivo de extraccion de diente','saranpion,tuberculosis,asma,epatitis,otras','si','al dia  vez',1,'2021-05-29 16:44:24','2021-06-10 08:34:28'),(2,'si','dolor de mis dientes','si','por dolor hace dos semanas','si ','pastillas','si','por extraccion','asma','si','una vez a la semana',4,'2021-05-31 23:38:24',NULL),(3,'si','hjgbhjh','si','khbhjj','si','bjbjhbbkn','si','knlkmmkl','saranpion,tuberculosis,otras','si','kkjj',3,'2021-06-06 04:15:35','2021-06-10 15:04:53');
/*!40000 ALTER TABLE `sp_tratamiento_consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_tratamiento_diagnostico`
--

DROP TABLE IF EXISTS `sp_tratamiento_diagnostico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_tratamiento_diagnostico` (
  `id_tratamiento_diagnostico` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tratamiento_diagnostico` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_tratamiento_diagnostico`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_tratamiento_diagnostico`
--

LOCK TABLES `sp_tratamiento_diagnostico` WRITE;
/*!40000 ALTER TABLE `sp_tratamiento_diagnostico` DISABLE KEYS */;
INSERT INTO `sp_tratamiento_diagnostico` VALUES (1,'Amalgama',1),(2,'Caries',1),(3,'Endodoncia',1),(4,'Ausente',1),(5,'Resina',1),(6,'Implante',1),(7,'Sellante',1),(8,'Corona',1);
/*!40000 ALTER TABLE `sp_tratamiento_diagnostico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_tratamiento_enfermedad`
--

DROP TABLE IF EXISTS `sp_tratamiento_enfermedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_tratamiento_enfermedad` (
  `id_enfermedad` int(11) NOT NULL AUTO_INCREMENT,
  `tiempo_consulta` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `motivo_consulta` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sintomas_principales` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tomando_medicamentos` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_medicamento` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `motivo_medicamento` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dosis_medicamento` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  PRIMARY KEY (`id_enfermedad`),
  KEY `fk_tratamiento_enfermedad_paciente` (`id_paciente`),
  CONSTRAINT `fk_tratamiento_enfermedad_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_tratamiento_enfermedad`
--

LOCK TABLES `sp_tratamiento_enfermedad` WRITE;
/*!40000 ALTER TABLE `sp_tratamiento_enfermedad` DISABLE KEYS */;
INSERT INTO `sp_tratamiento_enfermedad` VALUES (2,'2 meses','restauracion de diente','fiebre y dolor bucal','si','paracetamol','dolor fuerte','25',1),(3,'ghjhkjjhkkjkj','jkjkjhhjhkhk','kjjjjgkhk','si','jvjbhjhjk','jbbjnjk','1',8),(4,'jkjhhjkj','jkjjhjhjkkj','nkjjhjgjgh','si','kljkkjjkjlj','jkhjjgkhkh','4',13);
/*!40000 ALTER TABLE `sp_tratamiento_enfermedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_tratamiento_fisico`
--

DROP TABLE IF EXISTS `sp_tratamiento_fisico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_tratamiento_fisico` (
  `id_fisico` int(11) NOT NULL AUTO_INCREMENT,
  `presion_arterial` decimal(5,2) DEFAULT NULL,
  `pulso` decimal(5,2) DEFAULT NULL,
  `temperatura` decimal(5,2) DEFAULT NULL,
  `frecuencia_cardiaca` decimal(5,2) DEFAULT NULL,
  `frecuencia_respiratoria` decimal(5,2) DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `talla` decimal(5,2) DEFAULT NULL,
  `masa_corporal` decimal(5,2) DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_fisico`),
  KEY `fk_tratamiento_fisico_paciente` (`id_paciente`),
  CONSTRAINT `fk_tratamiento_fisico_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_tratamiento_fisico`
--

LOCK TABLES `sp_tratamiento_fisico` WRITE;
/*!40000 ALTER TABLE `sp_tratamiento_fisico` DISABLE KEYS */;
INSERT INTO `sp_tratamiento_fisico` VALUES (1,20.30,44.00,21.00,4.00,3.00,50.00,1.67,50.00,1,'2021-05-29 16:48:32','2021-06-06 03:50:23'),(2,0.99,23.00,20.00,3.00,2.00,2.00,69.00,50.00,4,'2021-05-31 23:49:44',NULL),(3,20.50,12.50,50.00,22.20,5.23,50.00,1.52,52.00,12,'2021-06-06 04:16:30',NULL);
/*!40000 ALTER TABLE `sp_tratamiento_fisico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_usuario`
--

DROP TABLE IF EXISTS `sp_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sp_usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `fk_persona_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `sp_persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_usuario`
--

LOCK TABLES `sp_usuario` WRITE;
/*!40000 ALTER TABLE `sp_usuario` DISABLE KEYS */;
INSERT INTO `sp_usuario` VALUES (1,'FERNANDO_12345678','b035a3f36b4f8af7ed56bcdd1873d286f33465d261db02a3450f8a0c13bd7b54f8030115de64a1c9064d4915b1b9ba2e2eb39b943fa24da24abdf1ce29e556c3','img/users/1622160413_c17bfae087de9362a9a9.png','2021-02-15 16:04:34','2021-06-04 13:15:16'),(2,'LUIS_10907085','13b6f194fc15b72a711b7bcea693bf5a3433a94138412450dd8e54e1ca16d1c1a10bc80d8942690137024e651190d56abcd94c239cba4dd506b78d057c6bfbf4','','2021-02-15 21:47:00','2021-05-26 01:07:52'),(3,'JORGE_15689458','6ee7c7c5db1e16ae05d0fa94a743f7a6a573dcbcd2d7d1c698bf891584c77030be3fd5e7fa1180ad80509e5291e9fd9bd3c370b93b2f54f82eed2c899e8c8cbe','','2021-02-19 22:01:47','2021-06-10 15:04:03'),(4,'HERNAN_25896312','13b6f194fc15b72a711b7bcea693bf5a3433a94138412450dd8e54e1ca16d1c1a10bc80d8942690137024e651190d56abcd94c239cba4dd506b78d057c6bfbf4','','2021-02-19 22:03:22','2021-03-05 02:49:02'),(5,'PABLO_14785896','e9c1f76bcf22743e80a20529a38f89bfedae0e9bb386f67205ee5f558a577626cf63dbbc9d68830dbaf4fcbd2e5c39c65b318026f778ebc3020430a3dd72fdd2','','2021-02-19 22:07:43','2021-03-18 03:01:27'),(6,'FRANKLIM_20252365','3f3c994433fc03012a5c1d6b0e09dc1063c58d2aeb05e43fdfdaa0ae67c2d10367e342e337b77f8872805b1b2c333e23642fa7460852a6c4912619d9fe96c334','','2021-03-12 23:41:06','2021-06-09 04:52:52'),(7,'RODOLFO_45896','e1354e5f7eadec44b924b8383f850a436c893344625e7c7562764c083aaf90426a6e2c4229fb75321007f04d8cf9c5d5b4e131c1323549c6c036b39b45b48b16','','2021-05-09 04:19:25','2021-05-10 02:08:11'),(8,'ELIAS_994874747','0eb3fd608f7dcaca5b4121060c65ef97138f782760e647d3efb2411e1568bf6c282b4c593933723b7656778be71a25e3ee674efb37b0499d4506c7c7350be1f9','','2021-05-16 21:44:15','2021-05-26 02:25:05'),(9,'NOMBRE_102589','cb09f1577fe4f91028fe7dffe0b0526d373e4e0669f4b0e1eba23ff49f1c3e2b1e57c6f8ccae58fa052a61819230692c7a9fd16bdc7c2ecfd83113f23e66f3f8','','2021-05-26 02:50:19',NULL),(10,'QUISPE_412569863','cb09f1577fe4f91028fe7dffe0b0526d373e4e0669f4b0e1eba23ff49f1c3e2b1e57c6f8ccae58fa052a61819230692c7a9fd16bdc7c2ecfd83113f23e66f3f8','','2021-05-26 02:57:52',NULL),(11,'HOLA_14589','cb09f1577fe4f91028fe7dffe0b0526d373e4e0669f4b0e1eba23ff49f1c3e2b1e57c6f8ccae58fa052a61819230692c7a9fd16bdc7c2ecfd83113f23e66f3f8','','2021-05-26 03:17:52',NULL),(12,'JOJ_1099887','5f3a3e57f34526fb46a63837a3f9c025f08ea4f5abe16032bc541bc8d6c449b7e98d368b55b1dfac1b35213a7f246b4ed1bbe2f043de86cc63c1eecd4129ccb6','','2021-05-26 03:23:11','2021-06-04 14:35:12'),(13,'NN_10258963','e1354e5f7eadec44b924b8383f850a436c893344625e7c7562764c083aaf90426a6e2c4229fb75321007f04d8cf9c5d5b4e131c1323549c6c036b39b45b48b16','','2021-05-26 04:05:43',NULL);
/*!40000 ALTER TABLE `sp_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `sp_view_cita`
--

DROP TABLE IF EXISTS `sp_view_cita`;
/*!50001 DROP VIEW IF EXISTS `sp_view_cita`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sp_view_cita` (
  `id_cita` tinyint NOT NULL,
  `numero_cita` tinyint NOT NULL,
  `tipo_tratamiento` tinyint NOT NULL,
  `observacion` tinyint NOT NULL,
  `fecha` tinyint NOT NULL,
  `hora_inicio` tinyint NOT NULL,
  `hora_final` tinyint NOT NULL,
  `costo` tinyint NOT NULL,
  `estatus` tinyint NOT NULL,
  `estado` tinyint NOT NULL,
  `id_paciente` tinyint NOT NULL,
  `nombre_paciente` tinyint NOT NULL,
  `ci_paciente` tinyint NOT NULL,
  `id_odontologo` tinyint NOT NULL,
  `nombre_odontologo` tinyint NOT NULL,
  `ci_odontologo` tinyint NOT NULL,
  `creado_en` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sp_view_odontologo`
--

DROP TABLE IF EXISTS `sp_view_odontologo`;
/*!50001 DROP VIEW IF EXISTS `sp_view_odontologo`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sp_view_odontologo` (
  `id_persona` tinyint NOT NULL,
  `ci_exp` tinyint NOT NULL,
  `nombre_completo` tinyint NOT NULL,
  `telefono_celular` tinyint NOT NULL,
  `fecha_nacimiento` tinyint NOT NULL,
  `domicilio` tinyint NOT NULL,
  `turno` tinyint NOT NULL,
  `gestion_ingreso` tinyint NOT NULL,
  `estatus` tinyint NOT NULL,
  `estado` tinyint NOT NULL,
  `creado_en` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sp_view_paciente`
--

DROP TABLE IF EXISTS `sp_view_paciente`;
/*!50001 DROP VIEW IF EXISTS `sp_view_paciente`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sp_view_paciente` (
  `id_persona` tinyint NOT NULL,
  `ci_exp` tinyint NOT NULL,
  `nombre_completo` tinyint NOT NULL,
  `sexo` tinyint NOT NULL,
  `lugar_nacimiento` tinyint NOT NULL,
  `telefono_celular` tinyint NOT NULL,
  `fecha_nacimiento` tinyint NOT NULL,
  `domicilio` tinyint NOT NULL,
  `id_ocupacion` tinyint NOT NULL,
  `ocupacion` tinyint NOT NULL,
  `estatus` tinyint NOT NULL,
  `estado` tinyint NOT NULL,
  `creado_en` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sp_view_tratamiento_alergias`
--

DROP TABLE IF EXISTS `sp_view_tratamiento_alergias`;
/*!50001 DROP VIEW IF EXISTS `sp_view_tratamiento_alergias`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sp_view_tratamiento_alergias` (
  `id_alergia` tinyint NOT NULL,
  `nombre_alergia` tinyint NOT NULL,
  `detalle` tinyint NOT NULL,
  `id_paciente` tinyint NOT NULL,
  `nombre_paciente` tinyint NOT NULL,
  `ci_paciente` tinyint NOT NULL,
  `creado_en` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sp_view_tratamiento_consulta`
--

DROP TABLE IF EXISTS `sp_view_tratamiento_consulta`;
/*!50001 DROP VIEW IF EXISTS `sp_view_tratamiento_consulta`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sp_view_tratamiento_consulta` (
  `id_consulta` tinyint NOT NULL,
  `tratamiento` tinyint NOT NULL,
  `motivo_tratamiento` tinyint NOT NULL,
  `tomando_medicamentos` tinyint NOT NULL,
  `porque_tiempo` tinyint NOT NULL,
  `alergico_medicamento` tinyint NOT NULL,
  `cual_medicamento` tinyint NOT NULL,
  `alguna_cirugia` tinyint NOT NULL,
  `porque` tinyint NOT NULL,
  `alguna_enfermedad` tinyint NOT NULL,
  `cepilla_diente` tinyint NOT NULL,
  `cuanto_dia` tinyint NOT NULL,
  `id_paciente` tinyint NOT NULL,
  `nombre_paciente` tinyint NOT NULL,
  `creado_en` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sp_view_tratamiento_enfermedad`
--

DROP TABLE IF EXISTS `sp_view_tratamiento_enfermedad`;
/*!50001 DROP VIEW IF EXISTS `sp_view_tratamiento_enfermedad`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sp_view_tratamiento_enfermedad` (
  `id_enfermedad` tinyint NOT NULL,
  `tiempo_consulta` tinyint NOT NULL,
  `motivo_consulta` tinyint NOT NULL,
  `sintomas_principales` tinyint NOT NULL,
  `tomando_medicamento` tinyint NOT NULL,
  `nombre_medicamento` tinyint NOT NULL,
  `motivo_medicamento` tinyint NOT NULL,
  `dosis_medicamento` tinyint NOT NULL,
  `id_paciente` tinyint NOT NULL,
  `nombre_paciente` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sp_view_tratamiento_fisico`
--

DROP TABLE IF EXISTS `sp_view_tratamiento_fisico`;
/*!50001 DROP VIEW IF EXISTS `sp_view_tratamiento_fisico`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sp_view_tratamiento_fisico` (
  `id_fisico` tinyint NOT NULL,
  `presion_alterial` tinyint NOT NULL,
  `pulso` tinyint NOT NULL,
  `temperatura` tinyint NOT NULL,
  `frecuencia_cardiaca` tinyint NOT NULL,
  `frecuencia_respiratoria` tinyint NOT NULL,
  `peso` tinyint NOT NULL,
  `talla` tinyint NOT NULL,
  `masa_corporal` tinyint NOT NULL,
  `id_paciente` tinyint NOT NULL,
  `nombre_paciente` tinyint NOT NULL,
  `creado_en` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sp_view_users`
--

DROP TABLE IF EXISTS `sp_view_users`;
/*!50001 DROP VIEW IF EXISTS `sp_view_users`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sp_view_users` (
  `id_persona` tinyint NOT NULL,
  `ci` tinyint NOT NULL,
  `expedido` tinyint NOT NULL,
  `paterno` tinyint NOT NULL,
  `materno` tinyint NOT NULL,
  `nombres` tinyint NOT NULL,
  `fecha_nacimiento` tinyint NOT NULL,
  `telefono_celular` tinyint NOT NULL,
  `domicilio` tinyint NOT NULL,
  `creado_en` tinyint NOT NULL,
  `actualizado_en` tinyint NOT NULL,
  `estado` tinyint NOT NULL,
  `usuario` tinyint NOT NULL,
  `clave` tinyint NOT NULL,
  `foto` tinyint NOT NULL,
  `id_grupo_usuario` tinyint NOT NULL,
  `id_grupo` tinyint NOT NULL,
  `id_usuario` tinyint NOT NULL,
  `ip_usuario` tinyint NOT NULL,
  `nombre_grupo` tinyint NOT NULL,
  `estado_grupo` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `sp_view_cita`
--

/*!50001 DROP TABLE IF EXISTS `sp_view_cita`*/;
/*!50001 DROP VIEW IF EXISTS `sp_view_cita`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sp_view_cita` AS select `cita`.`id_cita` AS `id_cita`,`cita`.`numero_cita` AS `numero_cita`,`cita`.`tipo_tratamiento` AS `tipo_tratamiento`,`cita`.`observacion` AS `observacion`,`cita`.`fecha` AS `fecha`,`cita`.`hora_inicio` AS `hora_inicio`,`cita`.`hora_final` AS `hora_final`,`cita`.`costo` AS `costo`,`cita`.`estatus` AS `estatus`,`cita`.`estado` AS `estado`,`paciente`.`id_paciente` AS `id_paciente`,concat(`persona_paciente`.`nombres`,' ',`persona_paciente`.`paterno`,' ',`persona_paciente`.`materno`) AS `nombre_paciente`,concat(`persona_paciente`.`ci`,' ',`persona_paciente`.`expedido`) AS `ci_paciente`,`odontologo`.`id_odontologo` AS `id_odontologo`,concat(`persona_odontologo`.`nombres`,' ',`persona_odontologo`.`paterno`,' ',`persona_odontologo`.`materno`) AS `nombre_odontologo`,concat(`persona_odontologo`.`ci`,' ',`persona_odontologo`.`expedido`) AS `ci_odontologo`,`cita`.`creado_en` AS `creado_en` from ((((`sp_cita` `cita` join `sp_paciente` `paciente` on(`cita`.`id_paciente` = `paciente`.`id_paciente`)) join `sp_persona` `persona_paciente` on(`persona_paciente`.`id_persona` = `paciente`.`id_paciente`)) join `sp_odontologo` `odontologo` on(`cita`.`id_odontologo` = `odontologo`.`id_odontologo`)) join `sp_persona` `persona_odontologo` on(`odontologo`.`id_odontologo` = `persona_odontologo`.`id_persona`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sp_view_odontologo`
--

/*!50001 DROP TABLE IF EXISTS `sp_view_odontologo`*/;
/*!50001 DROP VIEW IF EXISTS `sp_view_odontologo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sp_view_odontologo` AS select `p`.`id_persona` AS `id_persona`,concat(`p`.`ci`,' ',`p`.`expedido`) AS `ci_exp`,concat(`p`.`nombres`,' ',`p`.`paterno`,' ',`p`.`materno`) AS `nombre_completo`,`p`.`telefono_celular` AS `telefono_celular`,`p`.`fecha_nacimiento` AS `fecha_nacimiento`,`p`.`domicilio` AS `domicilio`,`o`.`turno` AS `turno`,`o`.`gestion_ingreso` AS `gestion_ingreso`,`p`.`estatus` AS `estatus`,`p`.`estado` AS `estado`,`p`.`creado_en` AS `creado_en` from (`sp_persona` `p` join `sp_odontologo` `o` on(`p`.`id_persona` = `o`.`id_odontologo`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sp_view_paciente`
--

/*!50001 DROP TABLE IF EXISTS `sp_view_paciente`*/;
/*!50001 DROP VIEW IF EXISTS `sp_view_paciente`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sp_view_paciente` AS select `p`.`id_persona` AS `id_persona`,concat(`p`.`ci`,' ',`p`.`expedido`) AS `ci_exp`,concat(`p`.`nombres`,' ',`p`.`paterno`,' ',`p`.`materno`) AS `nombre_completo`,`p`.`sexo` AS `sexo`,`p`.`lugar_nacimiento` AS `lugar_nacimiento`,`p`.`telefono_celular` AS `telefono_celular`,`p`.`fecha_nacimiento` AS `fecha_nacimiento`,`p`.`domicilio` AS `domicilio`,`o`.`id_ocupacion` AS `id_ocupacion`,`o`.`nombre` AS `ocupacion`,`p`.`estatus` AS `estatus`,`p`.`estado` AS `estado`,`p`.`creado_en` AS `creado_en` from ((`sp_persona` `p` join `sp_paciente` `pa` on(`p`.`id_persona` = `pa`.`id_paciente`)) join `sp_ocupacion` `o` on(`pa`.`id_ocupacion` = `o`.`id_ocupacion`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sp_view_tratamiento_alergias`
--

/*!50001 DROP TABLE IF EXISTS `sp_view_tratamiento_alergias`*/;
/*!50001 DROP VIEW IF EXISTS `sp_view_tratamiento_alergias`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sp_view_tratamiento_alergias` AS select `tratamiento_alergias`.`id_alergia` AS `id_alergia`,`tratamiento_alergias`.`nombre_alergia` AS `nombre_alergia`,`tratamiento_alergias`.`detalle` AS `detalle`,`paciente`.`id_paciente` AS `id_paciente`,concat(`persona_paciente`.`nombres`,' ',`persona_paciente`.`paterno`,' ',`persona_paciente`.`materno`) AS `nombre_paciente`,concat(`persona_paciente`.`ci`,' ',`persona_paciente`.`expedido`) AS `ci_paciente`,`tratamiento_alergias`.`creado_en` AS `creado_en` from ((`sp_tratamiento_alergias` `tratamiento_alergias` join `sp_paciente` `paciente` on(`tratamiento_alergias`.`id_paciente` = `paciente`.`id_paciente`)) join `sp_persona` `persona_paciente` on(`persona_paciente`.`id_persona` = `paciente`.`id_paciente`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sp_view_tratamiento_consulta`
--

/*!50001 DROP TABLE IF EXISTS `sp_view_tratamiento_consulta`*/;
/*!50001 DROP VIEW IF EXISTS `sp_view_tratamiento_consulta`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sp_view_tratamiento_consulta` AS select `tratamiento_consulta`.`id_consulta` AS `id_consulta`,`tratamiento_consulta`.`tratamiento` AS `tratamiento`,`tratamiento_consulta`.`motivo_tratamiento` AS `motivo_tratamiento`,`tratamiento_consulta`.`tomando_medicamentos` AS `tomando_medicamentos`,`tratamiento_consulta`.`porque_tiempo` AS `porque_tiempo`,`tratamiento_consulta`.`alergico_medicamento` AS `alergico_medicamento`,`tratamiento_consulta`.`cual_medicamento` AS `cual_medicamento`,`tratamiento_consulta`.`alguna_cirugia` AS `alguna_cirugia`,`tratamiento_consulta`.`porque` AS `porque`,`tratamiento_consulta`.`alguna_enfermedad` AS `alguna_enfermedad`,`tratamiento_consulta`.`cepilla_diente` AS `cepilla_diente`,`tratamiento_consulta`.`cuanto_dia` AS `cuanto_dia`,`paciente`.`id_paciente` AS `id_paciente`,concat(`persona_paciente`.`nombres`,' ',`persona_paciente`.`paterno`,' ',`persona_paciente`.`materno`) AS `nombre_paciente`,`tratamiento_consulta`.`creado_en` AS `creado_en` from ((`sp_tratamiento_consulta` `tratamiento_consulta` join `sp_paciente` `paciente` on(`tratamiento_consulta`.`id_paciente` = `paciente`.`id_paciente`)) join `sp_persona` `persona_paciente` on(`persona_paciente`.`id_persona` = `paciente`.`id_paciente`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sp_view_tratamiento_enfermedad`
--

/*!50001 DROP TABLE IF EXISTS `sp_view_tratamiento_enfermedad`*/;
/*!50001 DROP VIEW IF EXISTS `sp_view_tratamiento_enfermedad`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sp_view_tratamiento_enfermedad` AS select `tratamiento_enfermedad`.`id_enfermedad` AS `id_enfermedad`,`tratamiento_enfermedad`.`tiempo_consulta` AS `tiempo_consulta`,`tratamiento_enfermedad`.`motivo_consulta` AS `motivo_consulta`,`tratamiento_enfermedad`.`sintomas_principales` AS `sintomas_principales`,`tratamiento_enfermedad`.`tomando_medicamentos` AS `tomando_medicamento`,`tratamiento_enfermedad`.`nombre_medicamento` AS `nombre_medicamento`,`tratamiento_enfermedad`.`motivo_medicamento` AS `motivo_medicamento`,`tratamiento_enfermedad`.`dosis_medicamento` AS `dosis_medicamento`,`paciente`.`id_paciente` AS `id_paciente`,concat(`persona_paciente`.`nombres`,' ',`persona_paciente`.`paterno`,' ',`persona_paciente`.`materno`) AS `nombre_paciente` from ((`sp_tratamiento_enfermedad` `tratamiento_enfermedad` join `sp_paciente` `paciente` on(`tratamiento_enfermedad`.`id_paciente` = `paciente`.`id_paciente`)) join `sp_persona` `persona_paciente` on(`persona_paciente`.`id_persona` = `paciente`.`id_paciente`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sp_view_tratamiento_fisico`
--

/*!50001 DROP TABLE IF EXISTS `sp_view_tratamiento_fisico`*/;
/*!50001 DROP VIEW IF EXISTS `sp_view_tratamiento_fisico`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sp_view_tratamiento_fisico` AS select `tratamiento_fisico`.`id_fisico` AS `id_fisico`,`tratamiento_fisico`.`presion_arterial` AS `presion_alterial`,`tratamiento_fisico`.`pulso` AS `pulso`,`tratamiento_fisico`.`temperatura` AS `temperatura`,`tratamiento_fisico`.`frecuencia_cardiaca` AS `frecuencia_cardiaca`,`tratamiento_fisico`.`frecuencia_respiratoria` AS `frecuencia_respiratoria`,`tratamiento_fisico`.`peso` AS `peso`,`tratamiento_fisico`.`talla` AS `talla`,`tratamiento_fisico`.`masa_corporal` AS `masa_corporal`,`paciente`.`id_paciente` AS `id_paciente`,concat(`persona_paciente`.`nombres`,' ',`persona_paciente`.`paterno`,' ',`persona_paciente`.`materno`) AS `nombre_paciente`,`tratamiento_fisico`.`creado_en` AS `creado_en` from ((`sp_tratamiento_fisico` `tratamiento_fisico` join `sp_paciente` `paciente` on(`tratamiento_fisico`.`id_paciente` = `paciente`.`id_paciente`)) join `sp_persona` `persona_paciente` on(`persona_paciente`.`id_persona` = `paciente`.`id_paciente`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sp_view_users`
--

/*!50001 DROP TABLE IF EXISTS `sp_view_users`*/;
/*!50001 DROP VIEW IF EXISTS `sp_view_users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sp_view_users` AS select `p`.`id_persona` AS `id_persona`,`p`.`ci` AS `ci`,`p`.`expedido` AS `expedido`,`p`.`paterno` AS `paterno`,`p`.`materno` AS `materno`,`p`.`nombres` AS `nombres`,`p`.`fecha_nacimiento` AS `fecha_nacimiento`,`p`.`telefono_celular` AS `telefono_celular`,`p`.`domicilio` AS `domicilio`,`p`.`creado_en` AS `creado_en`,`p`.`actualizado_en` AS `actualizado_en`,`p`.`estado` AS `estado`,`u`.`usuario` AS `usuario`,`u`.`clave` AS `clave`,`u`.`foto` AS `foto`,`gu`.`id_grupo_usuario` AS `id_grupo_usuario`,`gu`.`id_grupo` AS `id_grupo`,`gu`.`id_usuario` AS `id_usuario`,`gu`.`ip_usuario` AS `ip_usuario`,`g`.`nombre_grupo` AS `nombre_grupo`,`g`.`estado_grupo` AS `estado_grupo` from (((`sp_usuario` `u` join `sp_persona` `p` on(`p`.`id_persona` = `u`.`id_usuario`)) left join `sp_grupo_usuario` `gu` on(`gu`.`id_usuario` = `u`.`id_usuario`)) left join `sp_grupo` `g` on(`g`.`id_grupo` = `gu`.`id_grupo`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-15 21:57:19

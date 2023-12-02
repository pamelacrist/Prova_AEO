-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: aeo
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alunos`
--

DROP TABLE IF EXISTS `alunos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alunos` (
  `idAluno` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idAluno`),
  UNIQUE KEY `idAluno_UNIQUE` (`idAluno`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alunos`
--

LOCK TABLES `alunos` WRITE;
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` VALUES (1,'Laura Ferreira','laura.ferreira@email.com','(61) 54321-0987','901.234.567-00','497c2eb68fb8ef9c6b3bbb793fa5e5fd'),(2,'Rafaela Almeida','rafaela.almeida@email.com','(71) 43210-9876','345.678.901-00',NULL),(3,' Marcos Gomes','marcos.gomes@email.com','(81) 32109-8765','678.901.234-00',NULL),(4,'Beatriz Rodrigues','beatriz.rodrigues@email.com',' (91) 21098-7654','012.345.678-00',NULL),(5,'Sofia Nunes','sofia.nunes@email.com','(01) 10987-6543','890.123.456-00',NULL),(6,'Gabriela Silva','gabriela.silva@email.com','(23) 45678-9012','210.987.654-00',NULL),(7,' Camilla Rodrigues','camila.rodrigues@email.com','(67) 89012-3456','456.789.012-00',NULL);
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplinas`
--

DROP TABLE IF EXISTS `disciplinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `disciplinas` (
  `idDisciplina` int unsigned NOT NULL AUTO_INCREMENT,
  `cargaHoraria` int NOT NULL,
  `sala` varchar(45) NOT NULL,
  `dataInicial` datetime NOT NULL,
  `dataFinal` datetime NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`idDisciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplinas`
--

LOCK TABLES `disciplinas` WRITE;
/*!40000 ALTER TABLE `disciplinas` DISABLE KEYS */;
INSERT INTO `disciplinas` VALUES (1,65,'101','2024-02-21 00:00:00','2024-07-24 00:00:00','Logística Empresarial'),(2,75,'305','2024-02-07 00:00:00','2024-10-09 00:00:00','Programação Avançada em C++'),(3,60,'102','2023-12-12 00:00:00','2024-05-26 00:00:00','Introdução à Programação'),(4,48,'205','2024-06-11 00:00:00','2025-03-05 00:00:00','Redes de Computadores'),(5,75,'301','2024-06-25 00:00:00','2024-10-29 00:00:00','Banco de Dados Avançado'),(6,40,'702','2024-02-13 00:00:00','2024-04-17 00:00:00','Gestão da Qualidade'),(7,80,'101','2024-02-16 00:00:00','2024-07-31 00:00:00','Técnicas Culinárias Básicas'),(8,65,'201','2024-02-26 00:00:00','2024-07-15 00:00:00','Gestão de Recursos Humanos'),(9,55,'601','2024-07-17 00:00:00','2024-11-01 00:00:00','Nutrição e Gastronomia'),(10,40,'702','2024-02-05 00:00:00','2024-03-12 00:00:00','História da Gastronomia'),(11,60,'801','2024-03-11 00:00:00','2024-06-19 00:00:00','Gastronomia Molecular'),(12,50,'1001','2024-09-10 00:00:00','2024-12-09 00:00:00','Gastronomia Sustentável');
/*!40000 ALTER TABLE `disciplinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professores`
--

DROP TABLE IF EXISTS `professores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professores` (
  `idProfessor` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idProfessor`),
  UNIQUE KEY `idProfessor_UNIQUE` (`idProfessor`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professores`
--

LOCK TABLES `professores` WRITE;
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` VALUES (1,'Pamela Cristina ','pamela@gmail.com','(47) 90202-0202','000.000.001-01','dcd32e316ca0dd502589c01ae56b8785'),(2,'Joana Costa','Joanacosta123@gmail.com','(47) 90505-3505','030.033.033-33',NULL),(3,'Carlos Silva','Carlinhos1995@gmail.com','(47) 45756-6545','025.000.900-00',NULL),(4,'Caroliny Magno','LindCaroliny2014@gmail.com','(47) 9999-8888','999.888.989-89',NULL),(5,'Pedro Santos','PedroProf@gmail.com','(47) 99202-0000','000.000.000-01',NULL),(6,'João Gomes','Gomes2023@gmail.com','(47) 91515-1515','777.773.777-77',NULL),(7,'Margarida fonseca','fonseca@gmail.com','(47) 93121-3121','055.550.000-00',NULL),(8,'João da Silva','joao.silva@email.com','(11) 98765-4321','123.456.789-00',NULL),(9,'Maria Santos','maria.santos@email.com','(21) 99999-8888','987.654.321-00',NULL),(10,'Gustavo Oliveira','gustavo.oliveira@email.com','(31)87654-3210','456.789.123-00','81dc9bdb52d04dc20036dbd8313ed055'),(11,'Ana Pereira','ana.pereira@email.com','(41) 76543-2109','789.123.456-00',NULL),(12,'Pedro Costa','pedro.costa@email.com','(51) 65432-1098','234.567.890-00',NULL),(13,'Felipe Gomes','felipe.gomes@email.com','(90) 12345-6789','234.567.890-00',NULL);
/*!40000 ALTER TABLE `professores` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-01 22:17:54

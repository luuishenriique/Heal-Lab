-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: proIFPE
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `Administradores`
--

DROP TABLE IF EXISTS `Administradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Administradores` (
  `id_adm` int(11) NOT NULL AUTO_INCREMENT,
  `name_adm` varchar(50) NOT NULL,
  `email_adm` varchar(50) DEFAULT NULL,
  `password_adm` varchar(50) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `login_adm` varchar(50) NOT NULL,
  PRIMARY KEY (`id_adm`),
  KEY `FK_Administradores_Usuarios` (`id_user`),
  CONSTRAINT `FK_Administradores_Usuarios` FOREIGN KEY (`id_user`) REFERENCES `Usuarios` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=20002 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Administradores`
--

LOCK TABLES `Administradores` WRITE;
/*!40000 ALTER TABLE `Administradores` DISABLE KEYS */;
INSERT INTO `Administradores` VALUES (20000,'Supremo senhor Kaioh','khsupremo@gmail.com','lgmEknykkZj0E',1,'SKaioh'),(20001,'João Silva Xavier','joao.x@gmail.com','lgAwFp8foUYcA',1,'admin1');
/*!40000 ALTER TABLE `Administradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Alunos`
--

DROP TABLE IF EXISTS `Alunos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Alunos` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `name_aluno` varchar(150) NOT NULL,
  `mat_aluno` varchar(35) NOT NULL,
  `email_aluno` varchar(50) DEFAULT NULL,
  `password_aluno` varchar(50) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  UNIQUE KEY `mat_aluno` (`mat_aluno`),
  KEY `FK_Usuarios_Alunos` (`id_user`),
  CONSTRAINT `FK_Usuarios_Alunos` FOREIGN KEY (`id_user`) REFERENCES `Usuarios` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Alunos`
--

LOCK TABLES `Alunos` WRITE;
/*!40000 ALTER TABLE `Alunos` DISABLE KEYS */;
INSERT INTO `Alunos` VALUES (1,'Luis Henrique Chaves de Oliveira','20191INFIG0201','luis_henrique_co@hotmail.com','lghFqNRvZ/mA2',3),(3,'Renata Barbosa de Lima','20181LG3334','rena.barbosa@gmail.com','lgqhVuytGZvrs',3),(4,'Gabriel Barros Teixeira','20191INFIG0309','gabrielbarrosteixeira9@gmail.com','lgm9odYL3FXpw',3);
/*!40000 ALTER TABLE `Alunos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Aulas`
--

DROP TABLE IF EXISTS `Aulas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Aulas` (
  `id_aula` int(11) NOT NULL AUTO_INCREMENT,
  `data_aula` date DEFAULT NULL,
  `cod_prof` int(11) NOT NULL,
  `desc_aula` varchar(4000) NOT NULL,
  PRIMARY KEY (`id_aula`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Aulas`
--

LOCK TABLES `Aulas` WRITE;
/*!40000 ALTER TABLE `Aulas` DISABLE KEYS */;
INSERT INTO `Aulas` VALUES (1,'2019-11-01',10000,'Aula 01 - Aprendendo HTML');
/*!40000 ALTER TABLE `Aulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cursos`
--

DROP TABLE IF EXISTS `Cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cursos` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `name_curso` varchar(50) NOT NULL,
  `desc_curso` varchar(4000) DEFAULT NULL,
  `tipo_curso` varchar(50) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cursos`
--

LOCK TABLES `Cursos` WRITE;
/*!40000 ALTER TABLE `Cursos` DISABLE KEYS */;
INSERT INTO `Cursos` VALUES (1,'INFORMÁTICA PARA INTERNET','DESENVOLVIMENTO PARA SISTEMAS WEB','TÉCNICO'),(2,'LOGÍSTICA','PROVER RECURSOS E INFORMAÇÕES PARA EXECUÇÃO DE ATIVIDADES DE UMA ORGANIZAÇÃO','TÉCNICO');
/*!40000 ALTER TABLE `Cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Disciplinas`
--

DROP TABLE IF EXISTS `Disciplinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Disciplinas` (
  `id_disc` int(11) NOT NULL AUTO_INCREMENT,
  `name_disc` varchar(150) NOT NULL,
  `desc_disc` varchar(4000) DEFAULT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_disc`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Disciplinas`
--

LOCK TABLES `Disciplinas` WRITE;
/*!40000 ALTER TABLE `Disciplinas` DISABLE KEYS */;
INSERT INTO `Disciplinas` VALUES (1,'A','AAA',0),(2,'b','bbb',0);
/*!40000 ALTER TABLE `Disciplinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Matriculas`
--

DROP TABLE IF EXISTS `Matriculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Matriculas` (
  `id_aluno` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_aluno`,`id_turma`),
  KEY `FK_Matriculas_Turmas` (`id_turma`),
  KEY `FK_Matriculas_Cursos` (`id_curso`),
  CONSTRAINT `FK_Matriculas_Alunos` FOREIGN KEY (`id_aluno`) REFERENCES `Alunos` (`id_aluno`),
  CONSTRAINT `FK_Matriculas_Cursos` FOREIGN KEY (`id_curso`) REFERENCES `Cursos` (`id_curso`),
  CONSTRAINT `FK_Matriculas_Turmas` FOREIGN KEY (`id_turma`) REFERENCES `Turmas` (`id_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Matriculas`
--

LOCK TABLES `Matriculas` WRITE;
/*!40000 ALTER TABLE `Matriculas` DISABLE KEYS */;
/*!40000 ALTER TABLE `Matriculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Professores`
--

DROP TABLE IF EXISTS `Professores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Professores` (
  `id_prof` int(11) NOT NULL AUTO_INCREMENT,
  `siape_prof` varchar(15) DEFAULT NULL,
  `name_prof` varchar(150) NOT NULL,
  `email_prof` varchar(50) DEFAULT NULL,
  `password_prof` varchar(50) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_prof`),
  KEY `FK_Usuarios_Professores` (`id_user`),
  CONSTRAINT `FK_Usuarios_Professores` FOREIGN KEY (`id_user`) REFERENCES `Usuarios` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Professores`
--

LOCK TABLES `Professores` WRITE;
/*!40000 ALTER TABLE `Professores` DISABLE KEYS */;
INSERT INTO `Professores` VALUES (10000,'1234567','João Kleber Para Para','parapara@gmail.com','lglG.QxZgvFNA',2);
/*!40000 ALTER TABLE `Professores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Turmas`
--

DROP TABLE IF EXISTS `Turmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Turmas` (
  `id_turma` int(11) NOT NULL AUTO_INCREMENT,
  `turno_turma` varchar(5) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `nome_turma` varchar(15) NOT NULL,
  `capacidade_turma` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_turma`),
  KEY `FK_Curso_Turma` (`id_curso`),
  CONSTRAINT `FK_Curso_Turma` FOREIGN KEY (`id_curso`) REFERENCES `Cursos` (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Turmas`
--

LOCK TABLES `Turmas` WRITE;
/*!40000 ALTER TABLE `Turmas` DISABLE KEYS */;
INSERT INTO `Turmas` VALUES (1,'Manhã',1,'20191INFIG01',32);
/*!40000 ALTER TABLE `Turmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `Usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuarios` (
  `id_user` int(11) NOT NULL,
  `type_user` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
INSERT INTO `Usuarios` VALUES (1,'Administrador(a)'),(2,'Professor(a)'),(3,'Aluno(a)');
/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-13  0:10:41

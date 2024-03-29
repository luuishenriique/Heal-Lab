-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: proIFPE
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
) ENGINE=InnoDB AUTO_INCREMENT=20003 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Administradores`
--

LOCK TABLES `Administradores` WRITE;
/*!40000 ALTER TABLE `Administradores` DISABLE KEYS */;
INSERT INTO `Administradores` VALUES (20000,'Supremo senhor Kaioh','khsupremo@gmail.com','lgmEknykkZj0E',1,'SKaioh'),(20001,'João Silva Xavier','joao.x@gmail.com','lgAwFp8foUYcA',1,'admin1'),(20002,'lalala',NULL,NULL,1,'admin2');
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
  `id_curso` int(11) NOT NULL,
  `id_turma` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_aluno`),
  UNIQUE KEY `mat_aluno` (`mat_aluno`),
  KEY `FK_Usuarios_Alunos` (`id_user`),
  KEY `FK_Alunos_Cursos` (`id_curso`),
  KEY `FK_Alunos_Turmas` (`id_turma`),
  CONSTRAINT `FK_Alunos_Cursos` FOREIGN KEY (`id_curso`) REFERENCES `Cursos` (`id_curso`),
  CONSTRAINT `FK_Alunos_Turmas` FOREIGN KEY (`id_turma`) REFERENCES `Turmas` (`id_turma`),
  CONSTRAINT `FK_Usuarios_Alunos` FOREIGN KEY (`id_user`) REFERENCES `Usuarios` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Alunos`
--

LOCK TABLES `Alunos` WRITE;
/*!40000 ALTER TABLE `Alunos` DISABLE KEYS */;
INSERT INTO `Alunos` VALUES (5,'LUIS HENRIQUE CHAVES DE OLIVEIRA','20191INFIG0201','luis_henrique_co@hotmail.com','lghFqNRvZ/mA2',3,1,NULL),(7,'LARISSA FERREIRA LOPES','20191INFIG0082','larrisa@gmail.com','lgsTC5NSnyhso',3,1,NULL),(8,'MARIA EDUARDA JANSEM PEREIRA','20191INFIG0112','mariaj@gmail.com','lgz83J9PPQtxg',3,1,NULL),(9,'MARIA MARIA','20191LOG3333',NULL,NULL,3,2,3),(10,'JOSEPH JOESTAR','20191LOGIGM',NULL,NULL,3,2,3),(11,'TIMóTEO CABRAL','20192LOGIG0003',NULL,NULL,3,2,3),(12,'MORGANA FERNANDES','20182INFIG0148','morg@gmail.com','lgcsxqP4p2I1c',3,1,2),(13,'ROBSON GOMES','20182INFIG0377','robson@gmail.com','lgsTC5NSnyhso',3,1,4),(14,'BBB','20192INFIG0002','bbb@gmail.com','lgvuSkqFoeQag',3,1,4),(15,'GIORNO GIOVANNA','20191INFIG4444','giorno@gmail.com','lgh6rBG2l.nRo',3,1,4);
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
  `desc_aula` varchar(4000) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  PRIMARY KEY (`id_aula`),
  KEY `FK_Professores_Aulas` (`id_prof`),
  KEY `FK_Turmas_Aulas` (`id_turma`),
  CONSTRAINT `FK_Professores_Aulas` FOREIGN KEY (`id_prof`) REFERENCES `Professores` (`id_prof`),
  CONSTRAINT `FK_Turmas_Aulas` FOREIGN KEY (`id_turma`) REFERENCES `Turmas` (`id_turma`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Aulas`
--

LOCK TABLES `Aulas` WRITE;
/*!40000 ALTER TABLE `Aulas` DISABLE KEYS */;
INSERT INTO `Aulas` VALUES (1,'2019-11-14','asdasdasd',6,4),(2,NULL,'Aula de usar manconha',9,2),(3,NULL,'dfasfasfaf',9,2),(4,'2019-11-25','aula experimental\r\n',6,4),(7,'2019-11-26','Aula experimental',6,4),(8,'2019-11-26','teste 2\r\n',6,4),(9,'2019-11-26','teste 3',6,4),(10,'2019-11-26','teste 4',6,4),(11,'2019-11-26','teste 5',6,4),(12,'2019-11-26','teste 6',6,4),(13,'2019-11-27','teste 8',6,4),(14,'2019-11-27','sss',6,4),(15,'2019-11-27','teste 11',6,4);
/*!40000 ALTER TABLE `Aulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Chamadas`
--

DROP TABLE IF EXISTS `Chamadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Chamadas` (
  `id_chamada` int(11) NOT NULL AUTO_INCREMENT,
  `qtd_faltas_chamada` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `qtd_aulas_chamada` int(11) NOT NULL,
  PRIMARY KEY (`id_chamada`),
  KEY `FK_Aulas_Chamadas` (`id_aula`),
  KEY `FK_Alunos_Chamadas` (`id_aluno`),
  CONSTRAINT `FK_Alunos_Chamadas` FOREIGN KEY (`id_aluno`) REFERENCES `Alunos` (`id_aluno`),
  CONSTRAINT `FK_Aulas_Chamadas` FOREIGN KEY (`id_aula`) REFERENCES `Aulas` (`id_aula`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Chamadas`
--

LOCK TABLES `Chamadas` WRITE;
/*!40000 ALTER TABLE `Chamadas` DISABLE KEYS */;
INSERT INTO `Chamadas` VALUES (1,1,11,13,3),(2,0,11,14,3),(3,0,12,13,4),(4,3,12,14,4),(5,0,12,13,3),(6,0,12,14,3),(7,0,12,13,2),(8,0,12,14,2),(9,1,12,15,2),(10,0,12,13,2),(11,0,12,14,2),(12,1,12,15,2),(13,0,13,13,3),(14,0,13,14,3),(15,1,13,15,3),(16,3,14,13,5),(17,1,14,14,5),(18,0,14,15,5),(19,0,15,13,4),(20,0,15,14,4),(21,0,15,15,4);
/*!40000 ALTER TABLE `Chamadas` ENABLE KEYS */;
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
  `id_prof` int(11) DEFAULT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_disc`),
  KEY `FK_Professores_Disciplinas` (`id_prof`),
  KEY `FK_Cursos_Disciplinas` (`id_curso`),
  CONSTRAINT `FK_Cursos_Disciplinas` FOREIGN KEY (`id_curso`) REFERENCES `Cursos` (`id_curso`),
  CONSTRAINT `FK_Professores_Disciplinas` FOREIGN KEY (`id_prof`) REFERENCES `Professores` (`id_prof`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Disciplinas`
--

LOCK TABLES `Disciplinas` WRITE;
/*!40000 ALTER TABLE `Disciplinas` DISABLE KEYS */;
INSERT INTO `Disciplinas` VALUES (3,'Informática','Conceitos básicos de programação web e revisão de conteúdo de cadeiras de sala de aula.',NULL,1),(4,'Matemática','Base de cálculos básica, funções, vetores, plano cartesiano.',NULL,1),(5,'Matemática','Aprender a calcular e conceitos básicos de funções',NULL,2),(6,'POO','POO',NULL,1),(7,'Matemática Elementar','qualquer coisa',NULL,1);
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
  `data_matricula` date NOT NULL,
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
  `id_disc` int(11) NOT NULL,
  PRIMARY KEY (`id_prof`),
  KEY `FK_Usuarios_Professores` (`id_user`),
  KEY `FK_Disciplinas_Professores` (`id_disc`),
  CONSTRAINT `FK_Disciplinas_Professores` FOREIGN KEY (`id_disc`) REFERENCES `Disciplinas` (`id_disc`),
  CONSTRAINT `FK_Usuarios_Professores` FOREIGN KEY (`id_user`) REFERENCES `Usuarios` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Professores`
--

LOCK TABLES `Professores` WRITE;
/*!40000 ALTER TABLE `Professores` DISABLE KEYS */;
INSERT INTO `Professores` VALUES (1,'1234567','lalala',NULL,NULL,2,6),(2,'1111111','um',NULL,NULL,2,6),(3,'2222222','dois',NULL,NULL,2,4),(4,'3333333','tres',NULL,NULL,2,3),(5,'4444444','quatro',NULL,NULL,2,6),(6,'5555555','cinco modificado','cincomod@gmail.com','lghRCruxuPjgk',2,3),(7,'6666666','seis','seis@gmail.com','lgkbXq8Gfb3sE',2,3),(8,'9999999','nove','nove@gmail.com','lguNa8YUjHRKg',2,6),(9,'1010101','dez','dez@gmail.com','lgKeufr2h0XWA',2,5),(10,'7654321','Lulu','lulu@qualquercoisa','lgBKFtYAwZc3M',2,7);
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
  `id_prof` int(11) DEFAULT NULL,
  `id_disc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_turma`),
  KEY `FK_Curso_Turma` (`id_curso`),
  KEY `FK_Professores_Turmas` (`id_prof`),
  KEY `FK_Disciplinas_Turmas` (`id_disc`),
  CONSTRAINT `FK_Curso_Turma` FOREIGN KEY (`id_curso`) REFERENCES `Cursos` (`id_curso`),
  CONSTRAINT `FK_Disciplinas_Turmas` FOREIGN KEY (`id_disc`) REFERENCES `Disciplinas` (`id_disc`),
  CONSTRAINT `FK_Professores_Turmas` FOREIGN KEY (`id_prof`) REFERENCES `Professores` (`id_prof`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Turmas`
--

LOCK TABLES `Turmas` WRITE;
/*!40000 ALTER TABLE `Turmas` DISABLE KEYS */;
INSERT INTO `Turmas` VALUES (2,'Manhã',1,'20191INFIG',40,10,7),(3,'Tarde',2,'20191LOGIG',40,7,3),(4,'Tarde',1,'20192INFIG',35,6,3),(5,'Manhã',1,'aaaa',21,5,6);
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

-- Dump completed on 2019-11-27  6:15:57

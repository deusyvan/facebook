CREATE DATABASE  IF NOT EXISTS `facebook` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `facebook`;
-- MySQL dump 10.16  Distrib 10.1.44-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: facebook
-- ------------------------------------------------------
-- Server version	10.1.44-MariaDB-0+deb9u1

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
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` VALUES (1,2,'Teste de grupo'),(2,2,'Teste de grupo 2');
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos_membros`
--

DROP TABLE IF EXISTS `grupos_membros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos_membros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos_membros`
--

LOCK TABLES `grupos_membros` WRITE;
/*!40000 ALTER TABLE `grupos_membros` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupos_membros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `id_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'2020-01-27 22:11:32','texto','gygyg',NULL,0),(2,1,'2020-01-27 22:11:49','texto','Conteúdo criado para testar a primeira vez o posts.',NULL,0),(3,2,'2020-02-14 20:42:38','texto','Conteúdo criado para testar a primeira vez',NULL,0),(4,2,'2020-02-14 21:07:09','foto','Teste de envio de imagem com texto','22439ab6e7765a3636b25096ade84e7f.jpg',0),(5,2,'2020-02-15 09:43:42','texto','Outra postagem sem foto','',0),(6,2,'2020-02-15 09:44:00','foto','Mais uma postagem com foto','7e93132e9e00568cea34aac826b67f55.png',0),(7,2,'2020-02-15 09:44:34','foto','Mais uma postagem com foto','c94b1c18525c53e931c504f2cdfc3296.png',0),(8,2,'2020-02-15 09:45:33','foto','Mais uma postagem com foto','c4abb007aebb7fee8126b3058394348a.png',0),(9,2,'2020-02-15 10:07:11','texto','Algum de texto de exemplo','',0),(10,1,'2020-02-15 10:08:16','texto','Mais um post de teste','',0),(11,2,'2020-02-16 08:53:59','foto','Este é um post com foto','71d7c8d7df7fa8be5fd39640cc051d3b.jpg',0);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts_comentarios`
--

DROP TABLE IF EXISTS `posts_comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts_comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts_comentarios`
--

LOCK TABLES `posts_comentarios` WRITE;
/*!40000 ALTER TABLE `posts_comentarios` DISABLE KEYS */;
INSERT INTO `posts_comentarios` VALUES (1,10,2,'2020-02-16 08:11:56','Teste legal'),(2,8,2,'2020-02-16 08:29:36','Testando envio de comentário'),(3,8,2,'2020-02-16 08:30:52','Outro envio de comentário'),(4,7,2,'2020-02-16 08:31:09','Também comentando esse post'),(5,4,2,'2020-02-16 08:51:07','Minha futura empresa DFSWeb'),(6,4,2,'2020-02-16 08:51:38','comentário será limpo'),(7,11,2,'2020-02-16 08:54:22','Minha futura empresa DFSWeb'),(8,11,2,'2020-02-16 11:11:39','Tomara que sim! Deus te Ajude!'),(9,3,2,'2020-02-16 11:13:28','Que Massa!'),(10,4,2,'2020-02-16 11:13:45','Amém!'),(11,2,2,'2020-02-16 11:40:03','uiiipe'),(12,6,2,'2020-02-16 11:45:28','Essa ficou feia'),(13,11,1,'2020-02-16 22:27:41','Comentário de teste'),(14,11,1,'2020-02-16 22:30:31','Vamos redirecionar'),(15,11,1,'2020-02-16 22:31:29','agora vai');
/*!40000 ALTER TABLE `posts_comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts_likes`
--

DROP TABLE IF EXISTS `posts_likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts_likes`
--

LOCK TABLES `posts_likes` WRITE;
/*!40000 ALTER TABLE `posts_likes` DISABLE KEYS */;
INSERT INTO `posts_likes` VALUES (1,10,8),(4,10,2),(5,9,2),(6,8,2),(7,7,2),(8,6,2),(9,4,2),(10,11,2);
/*!40000 ALTER TABLE `posts_likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relacionamentos`
--

DROP TABLE IF EXISTS `relacionamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relacionamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_de` int(11) NOT NULL,
  `usuario_para` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relacionamentos`
--

LOCK TABLES `relacionamentos` WRITE;
/*!40000 ALTER TABLE `relacionamentos` DISABLE KEYS */;
INSERT INTO `relacionamentos` VALUES (1,1,6,1),(2,2,4,1),(3,2,1,1),(4,2,6,1),(5,2,7,1),(6,6,3,1),(7,6,4,1),(8,6,7,1),(9,1,7,1),(10,1,3,1),(11,1,5,1),(12,1,4,1),(13,1,4,1),(14,1,3,1),(15,1,3,1),(16,1,8,0),(17,1,8,0);
/*!40000 ALTER TABLE `relacionamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `bio` text,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'teste@teste','Teste',1,'Minha bio','202cb962ac59075b964b07152d234b70'),(2,'dfs@dfs','Deusyvan Silva',1,'Esta é minha biografia, muito legal mesmo','202cb962ac59075b964b07152d234b70'),(3,'suporte@b7web.com.br','Boniek Lacerda',1,NULL,'202cb962ac59075b964b07152d234b70'),(4,'fu@fu','Fulano',1,NULL,'202cb962ac59075b964b07152d234b70'),(5,'ci@ci','Cicrano',1,NULL,'202cb962ac59075b964b07152d234b70'),(6,'bi@bi','Beltrano',0,NULL,'202cb962ac59075b964b07152d234b70'),(7,'zi@zi','Zibrano',0,NULL,'202cb962ac59075b964b07152d234b70'),(8,'fo@fo','Folow',1,NULL,'d9b1d7db4cd6e70935368a1efb10e377');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-28 22:08:40

-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: sweets00_sistema-bd
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

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
-- Table structure for table `tb_alimento_pedido`
--

DROP TABLE IF EXISTS `tb_alimento_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_alimento_pedido` (
  `id_pedido` int(6) DEFAULT NULL,
  `id_cardapio` int(6) DEFAULT NULL,
  `quant` int(3) DEFAULT NULL,
  `situacao` char(1) DEFAULT NULL,
  `hora_envio` time DEFAULT NULL,
  KEY `id_pedido` (`id_pedido`),
  KEY `id_cardapio` (`id_cardapio`),
  CONSTRAINT `tb_alimento_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `tb_pedido` (`id_pedido`),
  CONSTRAINT `tb_alimento_pedido_ibfk_2` FOREIGN KEY (`id_cardapio`) REFERENCES `tb_cardapio` (`id_cardapio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_alimento_pedido`
--

LOCK TABLES `tb_alimento_pedido` WRITE;
/*!40000 ALTER TABLE `tb_alimento_pedido` DISABLE KEYS */;
INSERT INTO `tb_alimento_pedido` VALUES (85,158,2,'2','09:42:00');
/*!40000 ALTER TABLE `tb_alimento_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cadastro`
--

DROP TABLE IF EXISTS `tb_cadastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_cadastro` (
  `id_cadastro` int(11) NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(25) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_cadastro`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cadastro`
--

LOCK TABLES `tb_cadastro` WRITE;
/*!40000 ALTER TABLE `tb_cadastro` DISABLE KEYS */;
INSERT INTO `tb_cadastro` VALUES (2,'Gerente','gerente@gmail.com'),(3,'Caixa','caixa@gmail.com'),(4,'Garçom','garcom@gmail.com'),(5,'Cozinheiro','cozinheiro@gmail.com'),(91,'Bruno Assis Miglioretto','bruno@gmail.com'),(92,'Aline Assis','aline@gmail.com'),(93,'ana','ana@gmail.com'),(94,'asdf','asdfasdf@gmail.com'),(95,'asdf ','asdf@gmail.com'),(96,'asdf ','asdasdfff@gmail.com'),(97,'vinicius','viniciusclemnete@gmail.com'),(98,'asdfasdfasd','asdfffasdf@gmail.com'),(99,'asdfasdf','vteste503@gmail.com'),(100,'asdfasdf','vtestasdfasdfe503@gmail.com'),(101,'kkkkkkkkkk','kkkkkkk@gmail.com'),(102,'kkkkkkkkkk','kkkkkkkasd@gmail.com'),(103,'kkkkkkkkkka','kkkkkkkaasdfasdfasdfd@gmail.com'),(104,'kkkkkkkkkka','kkkkkkkaxasdfasdfasdfd@gmail.com'),(105,'kkkkkkkkkka','kkkkkkkaxasdsdfasdffasdfasdfd@gmail.com'),(106,'kkkkkkkkkka','kzsd@gmail.com'),(107,'kkkkkkkkkka','kzsaa@gmail.com'),(108,'kkkkkkkkkka','kzsaafff@gmail.com'),(109,'kkkkkkkkkka','kzsaafasdfff@gmail.com'),(110,'kkkkkkkkkka','aaaaaaadaaaaasdfaaaaaa@gmail.com'),(111,'kkkkkkkkkka','aaaaaabbbbbbbbbbbbbbbbb@gmail.com'),(112,'kkkkkkkkkka','ppppppppppppppp@gmail.com'),(113,'kkkkkkkkkka','ppppppppppppasdfasdfppp@gmail.com'),(114,'vdd','vvvvvvvvvvvvvvvvvvv@gmail.com'),(115,'vddasdf','oooooooooo@gmail.com'),(116,'vddasdf','jjjjjjjjjjjjjjjjjjjjjjjj@gmail.com'),(117,'vddasdf','gggggggggggggggg@gmail.com'),(118,'vddasdf','gggggaaaggggggaaaaaaaaaggggg@gmail.com'),(119,'vddasdf','naaaaaaaaaaaaaaaaaaaaaaa@gmail.com'),(120,'vddasdf','fffaddd@gmail.com'),(121,'vddasdf','fffaddaad@gmail.com'),(122,'vddasdf','fffaddaaaaad@gmail.com'),(123,'vddasdf','gagaaaaaaaaaaaa@gmail.com'),(124,'vddasdf','gagaaaaaaaadaaaaaa@gmail.com'),(125,'vddasdf','gagaaaaaafasdfasdfaaadaaaaaa@gmail.com'),(126,'vddasdf','raaaaaaaraa@gmail.com'),(127,'vddasdf','vaaavaa@gmail.com'),(128,'vddasdf','vaaavasdfaaa@gmail.com'),(129,'vddasdf','vaaavasdfaaasdfa@gmail.com'),(130,'vddasdf','vaaavasdadfaaasdfa@gmail.com'),(131,'vddasdf','vaaadfaaasdfa@gmail.com'),(132,'vddasdf','vaaadfaaasdfada@gmail.com'),(133,'vddasdf','vaaadfaaasdfaaaaaadaa@gmail.com'),(134,'vddasdf','vaaadfaaasdfaaaaaaadaa@gmail.com'),(135,'vddasdf','haahaha@gmail.com'),(136,'vddasdf','haahahaff@gmail.com'),(137,'vddasdf','haahahaffasdfff@gmail.com'),(138,'Array','haahahaffasdasdfasafff@gmail.com'),(139,'Array','taaaaaaaaaaaaaaaaaaa@gmail.com'),(140,'Array','taaaaaaaaaaaaaaaaaaaa@gmail.com'),(141,'Array','taaaaaaaaaaaaaaaaasdfaaaa@gmail.com'),(142,'vddasdf','gagagagagaa@gmail.com'),(143,'vddasdf','gagagaaaaaaaagagaa@gmail.com'),(144,'vddasdf','gagagaaaaaffasdaaaaagagaa@gmail.com'),(145,'vddasdf','gaaagagaaaaaffasdaaaaagagaa@gmail.com'),(146,'vddasdf','gaaagagaaaaaaaaaaaaffasdaaaaagagaa@gmail.com'),(147,'vddasdf','aagaaagagaaaaaaaaaaaaffasdaaaaagagaa@gmail.com'),(148,'vddasdf','deu@gmail.com'),(149,'vddasdf','Meuno@gmail.com'),(150,'vddasdf','Meuffasnaaaoa@gmail.com'),(151,'vddasdf','Meuffasnaaaaoa@gmail.com'),(152,'vddasdf','Meuffasnaaaaaaaaaaaaaoa@gmail.com'),(153,'vddasdf','Meuffasnaaaaaaaaaaaaaaaoa@gmail.com');
/*!40000 ALTER TABLE `tb_cadastro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cardapio`
--

DROP TABLE IF EXISTS `tb_cardapio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_cardapio` (
  `id_cardapio` int(11) NOT NULL AUTO_INCREMENT,
  `id_cardapio_subcat` int(6) DEFAULT NULL,
  `nome` varchar(25) DEFAULT NULL,
  `valor_unitario` float(9,2) DEFAULT NULL,
  `peso_grama` varchar(15) DEFAULT NULL,
  `calorias` int(6) DEFAULT NULL,
  PRIMARY KEY (`id_cardapio`),
  KEY `id_cardapio_subcat` (`id_cardapio_subcat`),
  CONSTRAINT `tb_cardapio_ibfk_1` FOREIGN KEY (`id_cardapio_subcat`) REFERENCES `tb_cardapio_subcat` (`id_cardapio_subcat`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cardapio`
--

LOCK TABLES `tb_cardapio` WRITE;
/*!40000 ALTER TABLE `tb_cardapio` DISABLE KEYS */;
INSERT INTO `tb_cardapio` VALUES (81,10,'Sanduíche Natural',8.00,'800g',314),(89,4,'Água com gás',3.00,'500ml',0),(90,4,'Água sem gás',3.00,'500ml',0),(91,1,'Suco de laranja',4.00,'350ml',70),(95,1,'Suco de limão',4.00,'350ml',70),(100,1,'Suco de morango',4.00,'350ml',70),(101,1,'Suco de abacaxi',4.00,'350ml',150),(102,1,'Suco de banana',4.00,'350ml',120),(104,1,'Suco de mamão',4.00,'350ml',120),(105,1,'Suco de manga',4.00,'350ml',150),(107,1,'Suco de açai',4.00,'350ml',200),(108,3,'Suco de limão',4.50,'350ml',170),(109,3,'Suco de laranja',4.50,'350ml',170),(112,3,'Suco de morango',4.50,'350ml',170),(113,3,'Suco de abacaxi',4.50,'350ml',250),(114,3,'Suco de banana',4.50,'350ml',220),(116,3,'Suco de mamão',4.50,'350ml',220),(117,3,'Suco de manga',4.50,'350ml',250),(119,3,'Suco de açai',4.50,'350ml',300),(121,5,'Shake de chocolate',7.00,'350ml',200),(122,5,'Shake de morango',7.00,'350ml',200),(123,5,'Shake de baunilha',7.00,'350ml',200),(147,6,'Suco Detox',5.00,'350ml',250),(154,9,'Pastel de ricota',5.00,'300g',300),(155,9,'Pastel de carne',5.00,'300g',300),(156,9,'Pastel de presunto',5.00,'300g',300),(157,9,'Pastel de queijo branco ',5.00,'300g',300),(158,12,'Salada de frutas',5.00,'400g',50),(159,12,'Açaí com granola',5.00,'350ml',110),(160,12,'Barra de cereal',5.00,'400g',80),(161,12,'Cookies',5.00,'150g',12),(162,8,'Coxinha Assada',5.00,'450g',50),(164,11,'Empada de frango',5.00,'350g',200),(165,11,'Empada de palmito',5.00,'350g',200),(166,11,'Empada de bacalhau',5.00,'350g',200);
/*!40000 ALTER TABLE `tb_cardapio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cardapio_cat`
--

DROP TABLE IF EXISTS `tb_cardapio_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_cardapio_cat` (
  `id_cardapio_cat` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cardapio_cat` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_cardapio_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cardapio_cat`
--

LOCK TABLES `tb_cardapio_cat` WRITE;
/*!40000 ALTER TABLE `tb_cardapio_cat` DISABLE KEYS */;
INSERT INTO `tb_cardapio_cat` VALUES (1,'Bebidas'),(2,'Salgados'),(3,'Doces');
/*!40000 ALTER TABLE `tb_cardapio_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cardapio_subcat`
--

DROP TABLE IF EXISTS `tb_cardapio_subcat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_cardapio_subcat` (
  `id_cardapio_subcat` int(11) NOT NULL AUTO_INCREMENT,
  `id_cardapio_cat` int(6) DEFAULT NULL,
  `nome_cardapio_subcat` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id_cardapio_subcat`),
  KEY `id_cardapio_cat` (`id_cardapio_cat`),
  CONSTRAINT `tb_cardapio_subcat_ibfk_1` FOREIGN KEY (`id_cardapio_cat`) REFERENCES `tb_cardapio_cat` (`id_cardapio_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cardapio_subcat`
--

LOCK TABLES `tb_cardapio_subcat` WRITE;
/*!40000 ALTER TABLE `tb_cardapio_subcat` DISABLE KEYS */;
INSERT INTO `tb_cardapio_subcat` VALUES (1,1,'Suco com água'),(3,1,'Suco com leite semi desnatado'),(4,1,'Água'),(5,1,'Shake Whey Protein'),(6,1,'Suco Detox'),(8,2,'Coxinha'),(9,2,'Pastal Assado'),(10,2,'Sanduíche Natural'),(11,2,'Empada'),(12,3,'Doces');
/*!40000 ALTER TABLE `tb_cardapio_subcat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_cliente` (
  `id_cadastro` int(6) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  KEY `id_cadastro` (`id_cadastro`),
  CONSTRAINT `tb_cliente_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cliente`
--

LOCK TABLES `tb_cliente` WRITE;
/*!40000 ALTER TABLE `tb_cliente` DISABLE KEYS */;
INSERT INTO `tb_cliente` VALUES (91,'1212-12-12','M'),(92,'1212-12-12','F'),(93,'2121-02-21','F'),(94,'4444-04-04','F'),(95,'0000-00-00','F'),(96,'0000-00-00','F'),(97,'4444-04-04','F'),(98,'4444-04-14','F'),(99,'1233-03-12','F'),(100,'1233-03-12','F'),(101,'1233-03-12','F'),(102,'1233-03-12','F'),(103,'1233-03-12','F'),(104,'1233-03-12','F'),(105,'1233-03-12','F'),(106,'1233-03-12','F'),(107,'1233-03-12','F'),(108,'1233-03-12','F'),(109,'1233-03-12','F'),(110,'1233-03-12','F'),(111,'1233-03-12','F'),(112,'1233-03-12','F'),(113,'1233-03-12','F'),(114,'1233-03-12','F'),(115,'1233-03-12','F'),(116,'1233-03-12','F'),(117,'1233-03-12','F'),(118,'1233-03-12','F'),(119,'1233-03-12','F'),(120,'1233-03-12','F'),(121,'1233-03-12','F'),(122,'1233-03-12','F'),(123,'1233-03-12','F'),(124,'1233-03-12','F'),(125,'1233-03-12','F'),(126,'1233-03-12','F'),(127,'1233-03-12','F'),(128,'1233-03-12','F'),(129,'1233-03-12','F'),(130,'1233-03-12','F'),(131,'1233-03-12','F'),(132,'1233-03-12','F'),(133,'1233-03-12','F'),(134,'1233-03-12','F'),(135,'1233-03-12','F'),(136,'1233-03-12','F'),(137,'1233-03-12','F'),(138,'1233-03-12','F'),(139,'1233-03-12','F'),(140,'1233-03-12','F'),(141,'1233-03-12','F'),(142,'1233-03-12','F'),(143,'1233-03-12','F'),(144,'1233-03-12','F'),(145,'1233-03-12','F'),(146,'1233-03-12','F'),(147,'1233-03-12','F'),(148,'1233-03-12','F'),(149,'1233-03-12','F'),(150,'1233-03-12','F'),(151,'1233-03-12','F'),(152,'1233-03-12','F'),(153,'1233-03-12','F');
/*!40000 ALTER TABLE `tb_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_funcionario`
--

DROP TABLE IF EXISTS `tb_funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_funcionario` (
  `id_cadastro` int(6) DEFAULT NULL,
  `rg` int(11) DEFAULT NULL,
  `cpf` int(13) DEFAULT NULL,
  `cargo` varchar(15) DEFAULT NULL,
  KEY `id_cadastro` (`id_cadastro`),
  CONSTRAINT `tb_funcionario_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_funcionario`
--

LOCK TABLES `tb_funcionario` WRITE;
/*!40000 ALTER TABLE `tb_funcionario` DISABLE KEYS */;
INSERT INTO `tb_funcionario` VALUES (2,321561,646546,'Gerente'),(3,32131,58978,'Caixa'),(4,545,5544,'Garçom'),(5,55,555,'Cozinheiro');
/*!40000 ALTER TABLE `tb_funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_historico_alimento_pedido`
--

DROP TABLE IF EXISTS `tb_historico_alimento_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_historico_alimento_pedido` (
  `id_historico_pedido` int(6) DEFAULT NULL,
  `id_cardapio` int(6) DEFAULT NULL,
  `quant` int(3) DEFAULT NULL,
  `hora_envio` time DEFAULT NULL,
  KEY `id_historico_pedido` (`id_historico_pedido`),
  KEY `id_cardapio` (`id_cardapio`),
  CONSTRAINT `tb_historico_alimento_pedido_ibfk_1` FOREIGN KEY (`id_historico_pedido`) REFERENCES `tb_historico_pedido` (`id_historico_pedido`),
  CONSTRAINT `tb_historico_alimento_pedido_ibfk_2` FOREIGN KEY (`id_cardapio`) REFERENCES `tb_cardapio` (`id_cardapio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_historico_alimento_pedido`
--

LOCK TABLES `tb_historico_alimento_pedido` WRITE;
/*!40000 ALTER TABLE `tb_historico_alimento_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_historico_alimento_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_historico_pedido`
--

DROP TABLE IF EXISTS `tb_historico_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_historico_pedido` (
  `id_cadastro` int(6) DEFAULT NULL,
  `date_historico` date DEFAULT NULL,
  `hora` date DEFAULT NULL,
  `subtotal` float(7,2) DEFAULT NULL,
  `id_historico_pedido` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_historico_pedido`),
  KEY `id_cadastro` (`id_cadastro`),
  CONSTRAINT `tb_historico_pedido_ibfk_2` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_historico_pedido`
--

LOCK TABLES `tb_historico_pedido` WRITE;
/*!40000 ALTER TABLE `tb_historico_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_historico_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_ingrediente`
--

DROP TABLE IF EXISTS `tb_ingrediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_ingrediente` (
  `id_ingrediente` int(11) NOT NULL AUTO_INCREMENT,
  `quant_max` int(8) DEFAULT NULL,
  `quant_min` int(4) DEFAULT NULL,
  `id_tipo_ingrediente` int(6) DEFAULT NULL,
  `validade` date DEFAULT NULL,
  `unidade` varchar(15) DEFAULT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `valor_unitario` float(7,2) DEFAULT NULL,
  `quant` int(8) DEFAULT NULL,
  PRIMARY KEY (`id_ingrediente`),
  KEY `id_tipo_ingrediente` (`id_tipo_ingrediente`),
  CONSTRAINT `tb_ingrediente_ibfk_1` FOREIGN KEY (`id_tipo_ingrediente`) REFERENCES `tb_tipo_ingrediente` (`id_tipo_ingrediente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ingrediente`
--

LOCK TABLES `tb_ingrediente` WRITE;
/*!40000 ALTER TABLE `tb_ingrediente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_ingrediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_mesa`
--

DROP TABLE IF EXISTS `tb_mesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_mesa` (
  `id_mesa` int(11) NOT NULL AUTO_INCREMENT,
  `id_cadastro` int(6) DEFAULT NULL,
  PRIMARY KEY (`id_mesa`),
  KEY `id_cadastro` (`id_cadastro`),
  CONSTRAINT `tb_mesa_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_mesa`
--

LOCK TABLES `tb_mesa` WRITE;
/*!40000 ALTER TABLE `tb_mesa` DISABLE KEYS */;
INSERT INTO `tb_mesa` VALUES (1,NULL),(2,NULL),(3,NULL),(4,NULL);
/*!40000 ALTER TABLE `tb_mesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_nota_fiscal`
--

DROP TABLE IF EXISTS `tb_nota_fiscal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_nota_fiscal` (
  `id_nota_fiscal` int(11) NOT NULL AUTO_INCREMENT,
  `id_cadastro` int(6) DEFAULT NULL,
  `id_pagamento` int(6) DEFAULT NULL,
  `data_hora` date DEFAULT NULL,
  `hora` date DEFAULT NULL,
  PRIMARY KEY (`id_nota_fiscal`),
  KEY `id_cadastro` (`id_cadastro`),
  KEY `id_pagamento` (`id_pagamento`),
  CONSTRAINT `tb_nota_fiscal_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`),
  CONSTRAINT `tb_nota_fiscal_ibfk_2` FOREIGN KEY (`id_pagamento`) REFERENCES `tb_pagamento` (`id_pagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nota_fiscal`
--

LOCK TABLES `tb_nota_fiscal` WRITE;
/*!40000 ALTER TABLE `tb_nota_fiscal` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_nota_fiscal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pagamento`
--

DROP TABLE IF EXISTS `tb_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pagamento` (
  `id_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `id_cadastro` int(6) DEFAULT NULL,
  `id_pedido` int(6) DEFAULT NULL,
  `forma_pagamento` char(1) DEFAULT NULL,
  `valor_pagamento` float(6,2) DEFAULT NULL,
  `troco` float(6,2) DEFAULT NULL,
  `situacao_pagamento` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_pagamento`),
  KEY `id_cadastro` (`id_cadastro`),
  KEY `id_pedido` (`id_pedido`),
  CONSTRAINT `tb_pagamento_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`),
  CONSTRAINT `tb_pagamento_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `tb_pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pagamento`
--

LOCK TABLES `tb_pagamento` WRITE;
/*!40000 ALTER TABLE `tb_pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pedido`
--

DROP TABLE IF EXISTS `tb_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_cadastro` int(6) DEFAULT NULL,
  `data_pedido` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `subtotal` float(9,2) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_cadastro` (`id_cadastro`),
  CONSTRAINT `tb_pedido_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pedido`
--

LOCK TABLES `tb_pedido` WRITE;
/*!40000 ALTER TABLE `tb_pedido` DISABLE KEYS */;
INSERT INTO `tb_pedido` VALUES (85,91,'2019-04-26','09:07:00',10.00),(87,92,'2019-04-26','09:39:00',0.00);
/*!40000 ALTER TABLE `tb_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_receita`
--

DROP TABLE IF EXISTS `tb_receita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_receita` (
  `id_cardapio` int(6) DEFAULT NULL,
  `id_ingrediente` int(6) DEFAULT NULL,
  `quant_ingrediente` int(3) DEFAULT NULL,
  KEY `id_cardapio` (`id_cardapio`),
  KEY `id_ingrediente` (`id_ingrediente`),
  CONSTRAINT `tb_receita_ibfk_1` FOREIGN KEY (`id_cardapio`) REFERENCES `tb_cardapio` (`id_cardapio`),
  CONSTRAINT `tb_receita_ibfk_2` FOREIGN KEY (`id_ingrediente`) REFERENCES `tb_ingrediente` (`id_ingrediente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_receita`
--

LOCK TABLES `tb_receita` WRITE;
/*!40000 ALTER TABLE `tb_receita` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_receita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_senha`
--

DROP TABLE IF EXISTS `tb_senha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_senha` (
  `id_cadastro` int(6) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `validar_email` tinyint(1) DEFAULT NULL,
  `token` varchar(30) DEFAULT NULL,
  KEY `id_cadastro` (`id_cadastro`),
  CONSTRAINT `tb_senha_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_senha`
--

LOCK TABLES `tb_senha` WRITE;
/*!40000 ALTER TABLE `tb_senha` DISABLE KEYS */;
INSERT INTO `tb_senha` VALUES (2,'123',0,NULL),(3,'123',0,NULL),(4,'123',0,NULL),(5,'123',0,NULL),(91,'123123123',NULL,'5cb90d0a248b0'),(92,'123123123',NULL,'5cb9e9a855ae5'),(93,'123123123',NULL,'5cbc7dea9be4b'),(94,'a95c530a7af5f492a744',NULL,'5cc9d51d7597e'),(95,'f5bb0c8de146c67b44ba',NULL,'5cc9eec20cc42'),(96,'f5bb0c8de146c67b44ba',NULL,'5cc9eef2b3159'),(97,'f5bb0c8de146c67b44ba',NULL,'5cc9f2b32d4b1'),(98,'bbb8aae57c104cda40c9',NULL,'5cc9f71ec82c6'),(99,'f5bb0c8de146c67b44ba',NULL,'5cc9f9ea9ba30'),(100,'f5bb0c8de146c67b44ba',NULL,'5cc9ff0623b6c'),(101,'f5bb0c8de146c67b44ba',NULL,'5cca00d59d175'),(102,'f5bb0c8de146c67b44ba',NULL,'5cca00fa64ff1'),(103,'f5bb0c8de146c67b44ba',NULL,'5cca01222ea72'),(104,'f5bb0c8de146c67b44ba',NULL,'5cca013dbff21'),(105,'f5bb0c8de146c67b44ba',NULL,'5cca01fd763e2'),(106,'f5bb0c8de146c67b44ba',NULL,'5cca04c74175e'),(107,'6a204bd89f3c8348afd5',NULL,'5cca0818284c2'),(108,'6a204bd89f3c8348afd5',NULL,'5cca0831bf372'),(109,'6a204bd89f3c8348afd5',NULL,'5cca093d60102'),(110,'45e4812014d83dde5666',NULL,'5cca0f01386d6'),(111,'6a204bd89f3c8348afd5',NULL,'5cca0f7ab420e'),(112,'6a204bd89f3c8348afd5',NULL,'5cca15a7acb91'),(113,'6a204bd89f3c8348afd5',NULL,'5cca1639727f7'),(114,'45e4812014d83dde5666',NULL,'5cca18f86b1d8'),(115,'45e4812014d83dde5666',NULL,'5cca19f802fe8'),(116,'45e4812014d83dde5666',NULL,'5cca1d59b8328'),(117,'45e4812014d83dde5666',NULL,'5cca1eca42af9'),(118,'45e4812014d83dde5666',NULL,'5cca1f5da66b2'),(119,'45e4812014d83dde5666',NULL,'5cca1f92ef1e4'),(120,'45e4812014d83dde5666',NULL,'5cca22c4bd9a5'),(121,'45e4812014d83dde5666',NULL,'5cca231710058'),(122,'45e4812014d83dde5666',NULL,'5cca2388b4693'),(123,'45e4812014d83dde5666',NULL,'5cca23bbadf38'),(124,'45e4812014d83dde5666',NULL,'5cca240403635'),(125,'45e4812014d83dde5666',NULL,'5cca24e895c07'),(126,'45e4812014d83dde5666',NULL,'5cca25a0a9094'),(127,'45e4812014d83dde5666',NULL,'5cca261157704'),(128,'45e4812014d83dde5666',NULL,'5cca27261a17f'),(129,'45e4812014d83dde5666',NULL,'5cca27c36186d'),(130,'45e4812014d83dde5666',NULL,'5cca27f7161c5'),(131,'45e4812014d83dde5666',NULL,'5cca28dda1bae'),(132,'45e4812014d83dde5666',NULL,'5cca295fea763'),(133,'45e4812014d83dde5666',NULL,'5cca2aa13317d'),(134,'45e4812014d83dde5666',NULL,'5cca2b6d27228'),(135,'45e4812014d83dde5666',NULL,'5cca2bcbd0e77'),(136,'45e4812014d83dde5666',NULL,'5cca2c2d48174'),(137,'45e4812014d83dde5666',NULL,'5cca2c5800e48'),(138,'45e4812014d83dde5666',NULL,'5cca2d018f5da'),(139,'45e4812014d83dde5666',NULL,'5cca2d21e1d90'),(140,'45e4812014d83dde5666',NULL,'5cca2d5faa8d9'),(141,'45e4812014d83dde5666',NULL,'5cca2d817071f'),(142,'45e4812014d83dde5666',NULL,'5cca2db3c6eee'),(143,'45e4812014d83dde5666',NULL,'5cca2dd83a56b'),(144,'45e4812014d83dde5666',NULL,'5cca2e00f3a89'),(145,'45e4812014d83dde5666',NULL,'5cca2e50848fd'),(146,'45e4812014d83dde5666',NULL,'5cca2ecfcb55c'),(147,'45e4812014d83dde5666',NULL,'5cca2eeecb533'),(148,'593c9b4a9390551d53e5',NULL,'5cca2f1e98ef1'),(149,'593c9b4a9390551d53e5',NULL,'5cca2fdbe68c3'),(150,'45e4812014d83dde5666',NULL,'5cca3076caeec'),(151,'45e4812014d83dde5666',NULL,'5cca309a7e696'),(152,'45e4812014d83dde5666',NULL,'5cca316b1630c'),(153,'45e4812014d83dde5666',NULL,'5cca31882a5fa');
/*!40000 ALTER TABLE `tb_senha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_solicitacao_mesa`
--

DROP TABLE IF EXISTS `tb_solicitacao_mesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_solicitacao_mesa` (
  `id_mesa_solicitante` int(6) DEFAULT NULL,
  `id_mesa_solicitada` int(6) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  KEY `id_mesa_solicitante` (`id_mesa_solicitante`),
  KEY `id_mesa_solicitada` (`id_mesa_solicitada`),
  CONSTRAINT `tb_solicitacao_mesa_ibfk_2` FOREIGN KEY (`id_mesa_solicitante`) REFERENCES `tb_mesa` (`id_mesa`),
  CONSTRAINT `tb_solicitacao_mesa_ibfk_3` FOREIGN KEY (`id_mesa_solicitada`) REFERENCES `tb_mesa` (`id_mesa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_solicitacao_mesa`
--

LOCK TABLES `tb_solicitacao_mesa` WRITE;
/*!40000 ALTER TABLE `tb_solicitacao_mesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_solicitacao_mesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_telefone`
--

DROP TABLE IF EXISTS `tb_telefone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_telefone` (
  `id_cadastro` int(6) DEFAULT NULL,
  `ddd` varchar(4) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  KEY `id_cadastro` (`id_cadastro`),
  CONSTRAINT `tb_telefone_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_telefone`
--

LOCK TABLES `tb_telefone` WRITE;
/*!40000 ALTER TABLE `tb_telefone` DISABLE KEYS */;
INSERT INTO `tb_telefone` VALUES (2,'41','322332'),(3,'44','32123'),(4,'52','515'),(5,'55','5454'),(91,'20','0'),(92,'20','0'),(93,'20','0'),(94,'41','4444444'),(95,'41','41111111'),(96,'41','41111111'),(97,'41','0'),(98,'41','0'),(99,'41','0'),(100,'41','0'),(105,'41','0'),(106,'41','0'),(116,'/(d{','/sd{4}-d{4'),(117,'','/sd{4}-d{4'),(118,'','/sd{4}-d{4'),(119,'/(d{','/sd{4}-d{4'),(121,'Arra','Array'),(122,'Arra','Array'),(123,'Arra','Array'),(124,'Arra','Array'),(127,'Arra','Array'),(128,'Arra','Array'),(129,'Arra','Array'),(130,'Arra','Array'),(131,'Arra','Array'),(132,'Arra','Array'),(133,'Arra','Array'),(134,'Arra','Array'),(135,'Arra','Array'),(136,'Arra','Array'),(137,'Arra','Array'),(138,'Arra',' 9689-0565'),(139,'Arra',' 9689-0565'),(140,'Arra',' 9689-0565'),(141,'Arra',' 9689-0565'),(142,'Arra','Array'),(143,'Arra','Array'),(144,'Arra','Array'),(145,'Arra','Array'),(146,'Arra','Array'),(147,'(41)',' 9689-0565'),(148,'(41)',' 0000-0000'),(149,'(77)',' 7777-7777'),(150,'(77)',' 7777-7777'),(151,'Arra','Array'),(152,'(77)',' 7777-7777'),(153,'(41)',' 4444-4444');
/*!40000 ALTER TABLE `tb_telefone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tipo_ingrediente`
--

DROP TABLE IF EXISTS `tb_tipo_ingrediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_tipo_ingrediente` (
  `id_tipo_ingrediente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_ingrediente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tipo_ingrediente`
--

LOCK TABLES `tb_tipo_ingrediente` WRITE;
/*!40000 ALTER TABLE `tb_tipo_ingrediente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_tipo_ingrediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'sweets00_sistema-bd'
--

--
-- Dumping routines for database 'sweets00_sistema-bd'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-01 20:58:59

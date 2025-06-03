-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: ecom
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (1,'Albert Camus'),(2,'Victor Hugo'),(3,'Lewis Carroll'),(4,'Guy de Maupassant');
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avis`
--

DROP TABLE IF EXISTS `avis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `avis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8F91ABF0A76ED395` (`user_id`),
  KEY `IDX_8F91ABF04584665A` (`product_id`),
  CONSTRAINT `FK_8F91ABF04584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK_8F91ABF0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avis`
--

LOCK TABLES `avis` WRITE;
/*!40000 ALTER TABLE `avis` DISABLE KEYS */;
INSERT INTO `avis` VALUES (1,15,8,'bofbof',1),(4,1,8,'Franchement au top',5),(5,1,9,'Franchement ce roman est vachement TOP ! Je recommande fortement !!',5),(8,1,11,'Une masterclass',5),(9,15,10,'Le livre est vraiment bien, l\'intrigue dure jusqu\'au bout du livre. Je conseille fortement de le lire au moins 1 fois dans votre vie, c\'est un chef-d\'oeuvre',5),(10,1,10,'Un livre vraiment top à lire, je recommande !',4);
/*!40000 ALTER TABLE `avis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (3,'Science Fiction','2025-04-23 15:17:44','2025-05-04 15:33:03'),(4,'Romans','2025-04-29 14:09:09','2025-04-29 14:09:09'),(5,'Nouvelle','2025-05-04 15:48:46','2025-05-04 15:48:46');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20250124233017','2025-01-25 00:30:24',235),('DoctrineMigrations\\Version20250124235957','2025-01-25 01:00:03',137),('DoctrineMigrations\\Version20250125000514','2025-01-25 01:05:17',24),('DoctrineMigrations\\Version20250125140514','2025-01-25 15:05:17',175),('DoctrineMigrations\\Version20250125161836','2025-01-25 17:18:56',240),('DoctrineMigrations\\Version20250125162427','2025-01-25 17:24:30',95),('DoctrineMigrations\\Version20250125162715','2025-01-25 17:27:17',102),('DoctrineMigrations\\Version20250125163017','2025-01-25 17:30:19',88),('DoctrineMigrations\\Version20250125163105','2025-01-25 17:31:07',88),('DoctrineMigrations\\Version20250126000712','2025-01-26 01:07:16',91),('DoctrineMigrations\\Version20250201222704','2025-02-01 23:27:07',226),('DoctrineMigrations\\Version20250401141817','2025-04-01 16:19:02',23),('DoctrineMigrations\\Version20250402135857','2025-04-02 15:59:05',190),('DoctrineMigrations\\Version20250402140348','2025-04-02 16:03:52',142),('DoctrineMigrations\\Version20250423122703','2025-04-23 14:27:21',79),('DoctrineMigrations\\Version20250423123840','2025-04-23 14:40:19',98),('DoctrineMigrations\\Version20250423124101','2025-04-23 14:41:15',19),('DoctrineMigrations\\Version20250423141113','2025-04-23 16:11:17',48),('DoctrineMigrations\\Version20250423141503','2025-04-23 16:15:06',14),('DoctrineMigrations\\Version20250428130220','2025-04-28 15:02:26',75),('DoctrineMigrations\\Version20250430121459','2025-04-30 14:15:20',106),('DoctrineMigrations\\Version20250430121621','2025-04-30 14:16:26',53),('DoctrineMigrations\\Version20250504131046','2025-05-04 15:10:54',137),('DoctrineMigrations\\Version20250504131330','2025-05-04 15:13:32',29);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_size` int NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `catch_phrase` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD12469DE2` (`category_id`),
  KEY `IDX_D34A04AD14D45BBE` (`autor_id`),
  CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `FK_D34A04AD14D45BBE` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (8,4,'Notre-Dame de Paris','<div>Dans le Paris du XVe siècle, Esmeralda, une jeune et belle gitane, attire l’attention de plusieurs hommes : Quasimodo, le sonneur de cloches difforme au cœur pur ; Phoebus, un capitaine séduisant ; et Claude Frollo, archidiacre tourmenté par un désir obsessionnel. Chacun, à sa manière, la poursuit, la protège ou la trahit, dans une ville dominée par l’ombre imposante de la cathédrale Notre-Dame.<br><br></div><div>Accusée à tort de tentative de meurtre, Esmeralda devient victime d’une société injuste et cruelle. Malgré les efforts de Quasimodo pour la sauver, le destin l’entraîne vers une fin tragique. À travers ce drame, Victor Hugo dénonce les travers de la société et dresse un portrait saisissant de la passion, de l’intolérance et de la fatalité.</div>','nddp-68176f52a21e6277159114.jpg',246041,'2025-04-23 16:15:58','2025-05-04 15:44:50','Roman de Victor Hugo centré sur la cathédrale, mêlant drame, histoire et personnages tragiques.','notre-dame-de-paris',2),(9,4,'Les Aventures d\'Alice au pays des merveilles','<div>Dans <em>Les Aventures d\'Alice au pays des merveilles</em>, Alice, une jeune fille curieuse, tombe dans un terrier de lapin et se retrouve dans un monde fantastique, peuplé de créatures étranges et de personnages déconcertants. Chaque rencontre, aussi absurde soit-elle, défie la logique et les conventions, plongeant Alice dans un tourbillon d\'aventures où le temps, l\'espace et les règles de la réalité sont continuellement remis en question.<br><br></div><div>Au fil de son voyage, Alice croise des personnages inoubliables comme le Chapelier Fou, le Chat de Cheshire, et la Reine de Cœur, qui l’entraînent dans des situations de plus en plus bizarres. À travers son périple, le roman explore des thèmes tels que l\'identité, la logique, et le passage à l’âge adulte, tout en offrant une satire des conventions sociales et des structures rigides. Le récit de Lewis Carroll, à la fois enfantin et philosophique, continue d’émerveiller et d\'intriguer les lecteurs de toutes générations.</div>','eddb0928dc61e8bd554959090432eba4-68176f0acb269533825050.jpg',167251,'2025-04-29 13:58:49','2025-05-04 15:43:38','Suivez Alice dans un monde étrange où l’imaginaire devient réalité et les règles n\'existent pas.','les-aventures-d-alice-au-pays-des-merveilles',3),(10,5,'Boule de Suif','<div>Pendant la guerre franco-prussienne, un groupe de voyageurs, dont Boule de Suif, une prostituée, se retrouve coincé dans une auberge occupée par les Prussiens. Les soldats allemands, souhaitant obtenir des informations, exigent qu\'elle leur accorde ses faveurs pour leur permettre de quitter l\'auberge et de continuer leur route. Les autres voyageurs, malgré leur mépris initial pour Boule de Suif, l\'encouragent à se sacrifier pour le bien de tous.<br><br></div><div>Malgré ses résistances initiales, Boule de Suif finit par céder aux pressions du groupe. Cependant, son acte de sacrifice ne mène pas à la liberté escomptée. Les autres voyageurs, une fois débarrassés de la menace prussienne, manifestent leur ingratitude et leur hypocrisie, laissant Boule de Suif seule dans sa douleur et sa honte. À travers cette nouvelle, Maupassant critique la lâcheté, l\'égoïsme et l\'hypocrisie de la société de son époque.</div>','boule-de-suif-681770be01089080177652.jpg',54271,'2025-04-30 17:10:30','2025-05-04 15:50:54','Pendant la guerre, une prostituée sauve ses compagnons de voyage, mais se sacrifie pour eux.','boule-de-suif',4),(11,5,'La Parure','<div>Mathilde Loisel, une femme de la petite bourgeoisie, rêve d’une vie de luxe et de privilège. Lors d’une invitation à un bal, elle emprunte une somptueuse parure de diamants pour briller parmi l’élite. Cependant, après la soirée, elle réalise qu’elle a perdu le bijou. La panique s’empare d’elle et, avec son mari, elle décide de remplacer la parure en achetant un modèle identique, au prix de lourdes dettes.<br><br></div><div>Pendant dix ans, le couple vit dans la pauvreté pour rembourser cette dette, Mathilde perdant sa beauté et sa santé. Une décennie plus tard, après avoir réglé leur situation, elle rencontre la propriétaire de la parure et lui révèle son sacrifice. C’est alors qu’elle apprend que la parure était une imitation sans valeur. Cette révélation amère souligne la vanité et les illusions qui ont conduit à leur malheur.</div>','la-parure-68177332cfa07204951228.jpg',82109,'2025-05-03 13:15:46','2025-05-04 16:01:22','Une femme emprunte une parure pour un bal, mais la perd, et la pauvreté s\'abat sur elle.','la-parure',4);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'rayan@gmail.com','[\"ROLE_ADMIN\"]','$2y$13$I2/cN.nyw0zlEh9gg9ebzevjTYdoxitG7XB1c7UZLpLWZRmpqx9bq','Hamdaoui','Rayan'),(15,'blaine@gmail.com','[]','$2y$13$uTHmAtPNSALRI8sij2bRx.oXtW0jFZKZvGLl1VUM4Jv1OwmBVGzaq','Winston','Blaine');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-03 13:56:26

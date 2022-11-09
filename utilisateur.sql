-- Adminer 4.8.1 MySQL 8.0.30-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `walliDB`;
CREATE DATABASE `walliDB` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `walliDB`;

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_adresse` int DEFAULT NULL,
  `id_commande` int DEFAULT NULL,
  `identifiant_utilisateur` varchar(50) NOT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `prenom_utilisateur` varchar(50) NOT NULL,
  `mail_utilisateur` varchar(50) NOT NULL,
  `tel_utilisateur` varchar(50) NOT NULL,
  `mdp_utilisateur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_adresse` (`id_adresse`),
  KEY `id_commande` (`id_commande`),
  CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_adresse`) REFERENCES `adresse_utilisateur` (`id`),
  CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `utilisateur` (`id`, `id_adresse`, `id_commande`, `identifiant_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `tel_utilisateur`, `mdp_utilisateur`, `admin`) VALUES
(1,	NULL,	NULL,	'Jean23',	'Jack',	'jean',	'jackie&michel@gmail.com',	'jackie&michel',	'dzsd4z484',	0),
(2,	NULL,	NULL,	'Oliwed',	'ESSOB',	'Raphael',	'raphael.essobmussard.ps41819@gmail.com',	'0693367493',	'iaeneioazen',	0),
(3,	NULL,	NULL,	'Warz',	'Carpy',	'Benjamin',	'benjamin.carpy@gmail.com',	'0692346919',	'hdehgbfcedhf',	0),
(4,	NULL,	NULL,	'Gazo ',	'Houmadi',	'Hilani',	'gazo@gmail.com',	'021252154',	'eiuhtjzehc95467¤⁻@',	0),
(5,	NULL,	NULL,	'-+-',	'PERRAULT',	'Lucas',	'MonMail@gmail.com',	'0693816203',	'ouioui',	0),
(6,	NULL,	NULL,	'GTAline',	'GARDEAU',	'Garrisson',	'G.garrisson@gmail.com',	'02568920',	'GGARDEAU50',	0),
(7,	NULL,	NULL,	'Dtm626',	'darren',	'mellon',	'darren.mellon626@gmail.com',	'0693118277',	'jesaispas',	0),
(8,	NULL,	NULL,	'a.kassir',	'Abdel',	'Kassir',	'knfj@gmail.com',	'0692004875',	'1234',	0),
(9,	NULL,	NULL,	'admin',	'Hmd',	'Ilan',	'admin@gmail.com',	'0692004875',	'97410',	0),
(10,	NULL,	NULL,	'enor',	'ygj',	'fhyg',	'jkj@tyg.re',	'55265484',	'0000',	0),
(11,	NULL,	NULL,	'sfg',	'dfg',	'Kassir',	'knfj@gmail.com',	'55265484',	'575',	0),
(14,	NULL,	NULL,	'ali',	'abdallah',	'Attoumani',	'lali@info.re',	'0692178598',	'$2y$10$qEG/9sdfQbUjJg8LqbMXx.Ow.HSMZ8uIDIISRTkBd7KreMxFtLvoS',	0),
(15,	NULL,	NULL,	'Bazzoka',	'louis',	'mili',	'b@info.re',	'0692132458',	'$2y$10$hpLu.tpxDA/c8wnKPYUE3OaQpIjHdsFeMmUQzOa8jpYBm6fHBkRA2',	1),
(17,	NULL,	NULL,	'Jonathan',	'Attend',	'Jaune',	'Jonatan@jonatan.com',	'',	'$2y$10$8fvWGEd6p2aS3Ql0088lqugoLTl//tFfvokHuJOl7N6CHf7kBWEQu',	1);

-- 2022-11-09 06:20:21

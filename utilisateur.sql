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
  `id_commande` int DEFAULT NULL,
  `identifiant_utilisateur` varchar(50) NOT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `prenom_utilisateur` varchar(50) NOT NULL,
  `mail_utilisateur` varchar(50) NOT NULL,
  `tel_utilisateur` varchar(50) NOT NULL,
  `mdp_utilisateur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_commande` (`id_commande`),
  CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `utilisateur` (`id`, `id_commande`, `identifiant_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `tel_utilisateur`, `mdp_utilisateur`, `admin`) VALUES
(1,NULL,	'ali',	'abdallah',	'Attoumani',	'lali@info.re',	'0692178598',	'$2y$10$qEG/9sdfQbUjJg8LqbMXx.Ow.HSMZ8uIDIISRTkBd7KreMxFtLvoS',	0),
(2,NULL,	'Bazzoka',	'louis',	'mili',	'b@info.re',	'0692132458',	'$2y$10$hpLu.tpxDA/c8wnKPYUE3OaQpIjHdsFeMmUQzOa8jpYBm6fHBkRA2',	1),
(3,NULL,	'Jonathan',	'Attend',	'Jaune',	'Jonatan@jonatan.com',	'',	'$2y$10$8fvWGEd6p2aS3Ql0088lqugoLTl//tFfvokHuJOl7N6CHf7kBWEQu',	1);

-- 2022-11-09 06:20:21

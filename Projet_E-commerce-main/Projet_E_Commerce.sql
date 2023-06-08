-- Adminer 4.8.1 MySQL 8.0.30-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `adresse_utilisateur`;
CREATE TABLE `adresse_utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code_postal` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

INSERT INTO `adresse_utilisateur` (`id`, `code_postal`, `ville`, `pays`) VALUES
(1,	'97420',	'Petite Ile',	'La Réunion'),
(2,	'97420',	'Petite Ile',	'La Réunion'),
(3,	'97410',	'Saint Pierre',	'La Réunion'),
(4,	'97410',	'Saint Pierre',	'La Réunion'),
(5,	'97420',	'Petite Ile',	'La Réunion'),
(6,	'18256',	'Marseille',	'France'),
(7,	'97450',	'Saint Louis',	'La Réunion');

DROP VIEW IF EXISTS `catalogue_tous`;
CREATE TABLE `catalogue_tous` (`Nom de la catégorie` varchar(50), `Nom du produit` varchar(50));


DROP TABLE IF EXISTS `categorie`;
CREATE TABLE `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(50) CHARACTER SET utf8mb4 ,
  `description_categorie` varchar(50) CHARACTER SET utf8mb4,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

INSERT INTO `categorie` (`id`, `nom_categorie`, `description_categorie`) VALUES
(1,	'Boitier',	NULL),
(2,	'Alimentation',	NULL),
(3,	'Carte Mère',	NULL),
(4,	'Processeur',	NULL),
(5,	'Carte Graphique',	NULL),
(6,	'Disque dur',	NULL),
(7,	'Barette de mémoire',	NULL),
(8,	'Refroidissement',	NULL),
(9,	'Carte réseau',	NULL);

DROP TABLE IF EXISTS `commande`;
CREATE TABLE `commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prix_total` int NOT NULL,
  `date_commande` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;


DROP TABLE IF EXISTS `compte_bancaire`;
CREATE TABLE `compte_bancaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int NOT NULL,
  `num_carte_bleu` varchar(50) CHARACTER SET utf8mb4 ,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  CONSTRAINT `compte_bancaire_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `compte_bancaire` (`id`, `id_utilisateur`, `num_carte_bleu`) VALUES
(1,	1,	'98476546'),
(2,	2,	'65461687'),
(3,	3,	'699498494'),
(4,	4,	'9849829'),
(5,	5,	'46541684'),
(6,	6,	'6549870986'),
(7,	7,	'98794028186');

DROP TABLE IF EXISTS `fiche_technique`;
CREATE TABLE `fiche_technique` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_prod_fiche_technique` int NOT NULL,
  `nom_prod_ft` varchar(50) CHARACTER SET utf8mb4,
  `marque` varchar(50) CHARACTER SET utf8mb4,
  `modele` varchar(50) CHARACTER SET utf8mb4,
  PRIMARY KEY (`id`),
  KEY `id_prod_fiche_technique` (`id_prod_fiche_technique`),
  CONSTRAINT `fiche_technique_ibfk_1` FOREIGN KEY (`id_prod_fiche_technique`) REFERENCES `produit` (`id`),
  CONSTRAINT `fiche_technique_ibfk_2` FOREIGN KEY (`id_prod_fiche_technique`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;


DROP TABLE IF EXISTS `produit`;
CREATE TABLE `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_categorie_prod` int NOT NULL,
  `id_commande_prod` int DEFAULT NULL,
  `nom_prod` varchar(50) CHARACTER SET utf8mb4 ,
  `description_produit` varchar(500) CHARACTER SET utf8mb4,
  `prix` float NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorie_prod` (`id_categorie_prod`),
  KEY `id_commande_prod` (`id_commande_prod`),
  CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_categorie_prod`) REFERENCES `categorie` (`id`),
  CONSTRAINT `produit_ibfk_3` FOREIGN KEY (`id_commande_prod`) REFERENCES `commande` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

INSERT INTO `produit` (`id`, `id_categorie_prod`, `id_commande_prod`, `nom_prod`, `description_produit`, `prix`, `stock`) VALUES
(1,	1,	NULL,	'Fractal Design define R6 Black',	NULL,	219.95,	8),
(2,	1,	NULL,	'Be quiet ! Pure base 500Dx',	NULL,	136.95,	11),
(3,	1,	NULL,	'In win 101C BLANC',	NULL,	84.95,	5),
(4,	1,	NULL,	'Fractal Design Meshify c tg (noir)',	NULL,	139.96,	2),
(5,	1,	NULL,	'Corsai Obsidian 1000D noir',	NULL,	899.95,	0),
(6,	2,	NULL,	'Corsair cv550 80 PLUS bronze',	NULL,	59.95,	10),
(7,	2,	NULL,	'Be quiet ! Pure power 11 600w cm 80 plus gold',	NULL,	96.95,	19),
(8,	2,	NULL,	' Corsair CX750f RGB 80 Plus bronze (noir)',	NULL,	109.94,	20),
(9,	2,	NULL,	'Corsair atx1600i 80 plus titanium',	NULL,	699.95,	2),
(10,	2,	NULL,	'COOLER MASTER XG850 PLUS PLATINIUM',	NULL,	254.95,	0),
(11,	4,	NULL,	'AMD ryzen 3 3200G wraith stealh edition',	NULL,	149.95,	17),
(12,	4,	NULL,	'intel core i7-12700K',	NULL,	569.95,	9),
(13,	4,	NULL,	'Intel core I5-13600Kf',	NULL,	375.96,	0),
(14,	4,	NULL,	'amd ryzen 7 5800X',	NULL,	429.95,	19),
(15,	4,	NULL,	'intel core i9-9900k ',	NULL,	829,	10),
(16,	5,	NULL,	'Amd radeon rx 6950 XT',	NULL,	1149,	10),
(17,	5,	NULL,	'ASROCK AMD RADEON RX 6600 challenger itx 8go',	NULL,	679.95,	1),
(18,	5,	NULL,	'Asus dual geforce rtx 370 o8g',	NULL,	699.95,	9),
(19,	5,	NULL,	'Nvidia Geforce gtx 1050 ti 4go',	NULL,	89.98,	0),
(20,	5,	NULL,	'msi geforce rtx 3090 TI suprim x 24go',	NULL,	2049.95,	29),
(21,	3,	NULL,	'Gygabyte Z690 gaming x',	NULL,	270.97,	10),
(22,	3,	NULL,	'ASROCK A320M pro4-f',	NULL,	77.95,	1),
(23,	3,	NULL,	'ASROCK A520M phantom gaming 4',	NULL,	94.94,	0),
(24,	3,	NULL,	'Asus tuf gaming b550-plus',	NULL,	158.95,	20),
(25,	3,	NULL,	'MSI MAG z TOMAHAWK',	NULL,	342.94,	8);

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_adresse` int DEFAULT NULL,
  `id_commande` int DEFAULT NULL,
  `identifiant_utilisateur` varchar(50) CHARACTER SET utf8mb4 ,
  `nom_utilisateur` varchar(50) CHARACTER SET utf8mb4 ,
  `prenom_utilisateur` varchar(50) CHARACTER SET utf8mb4 ,
  `mail_utilisateur` varchar(50) CHARACTER SET utf8mb4 ,
  `tel_utilisateur` varchar(50) CHARACTER SET utf8mb4 ,
  `mdp_utilisateur` varchar(50) CHARACTER SET utf8mb4 ,
  PRIMARY KEY (`id`),
  KEY `id_adresse` (`id_adresse`),
  KEY `id_commande` (`id_commande`),
  CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_adresse`) REFERENCES `adresse_utilisateur` (`id`),
  CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

INSERT INTO `utilisateur` (`id`, `id_adresse`, `id_commande`, `identifiant_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `tel_utilisateur`, `mdp_utilisateur`) VALUES
(1,	NULL,	NULL,	'Jean23',	'Jack',	'jean',	'jackie&michel@gmail.com',	'jackie&michel',	'dzsd4z484'),
(2,	NULL,	NULL,	'Oliwed',	'ESSOB',	'Raphael',	'raphael.essobmussard.ps41819@gmail.com',	'0693367493',	'iaeneioazen'),
(3,	NULL,	NULL,	'Warz',	'Carpy',	'Benjamin',	'benjamin.carpy@gmail.com',	'0692346919',	'hdehgbfcedhf'),
(4,	NULL,	NULL,	'Gazo ',	'Houmadi',	'Hilani',	'gazo@gmail.com',	'021252154',	'eiuhtjzehc95467¤⁻@'),
(5,	NULL,	NULL,	'-+-',	'PERRAULT',	'Lucas',	'MonMail@gmail.com',	'0693816203',	'ouioui'),
(6,	NULL,	NULL,	'GTAline',	'GARDEAU',	'Garrisson',	'G.garrisson@gmail.com',	'02568920',	'GGARDEAU50'),
(7,	NULL,	NULL,	'Dtm626',	'darren',	'mellon',	'darren.mellon626@gmail.com',	'0693118277',	'jesaispas');

DROP TABLE IF EXISTS `catalogue_tous`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `catalogue_tous` AS select `c`.`nom_categorie` AS `Nom de la catégorie`,`p`.`nom_prod` AS `Nom du produit` from (`produit` `p` join `categorie` `c` on((`c`.`id` = `p`.`id_categorie_prod`)));

-- 2022-09-21 07:27:30

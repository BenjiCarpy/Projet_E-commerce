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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `adresse_utilisateur` (`id`, `code_postal`, `ville`, `pays`) VALUES
(1,	'97420',	'Petite Ile',	'La Réunion'),
(2,	'97420',	'Petite Ile',	'La Réunion'),
(3,	'97410',	'Saint Pierre',	'La Réunion'),
(4,	'97410',	'Saint Pierre',	'La Réunion'),
(5,	'97420',	'Petite Ile',	'La Réunion'),
(6,	'18256',	'Marseille',	'France'),
(7,	'97450',	'Saint Louis',	'La Réunion');

DROP TABLE IF EXISTS `catalogue_tous`;
CREATE TABLE `catalogue_tous` (
  `Nom de la catégorie` varchar(50) DEFAULT NULL,
  `Nom du produit` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP VIEW IF EXISTS `catalogue_tous1`;
CREATE TABLE `catalogue_tous1` (`Nom de la catégorie` varchar(50), `Nom du produit` varchar(50));


DROP TABLE IF EXISTS `categorie`;
CREATE TABLE `categorie` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(50) NOT NULL,
  `description_categorie` varchar(50) DEFAULT NULL,
  `image_categorie` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `description_categorie`, `image_categorie`) VALUES
(1,	'Boitier',	NULL,	'https://media.ldlc.com/r374/ld/products/00/05/44/67/LD0005446783_2.jpg'),
(2,	'Alimentation',	NULL,	'https://media.ldlc.com/r374/ld/products/00/04/18/09/LD0004180936_2_0004293075.jpg'),
(3,	'Carte Mère',	NULL,	'https://media.ldlc.com/r374/ld/products/00/05/65/78/LD0005657847_2.jpg'),
(4,	'Processeur',	NULL,	'https://media.ldlc.com/r374/ld/products/00/05/80/46/LD0005804639_1_0005830337.jpg'),
(5,	'Carte Graphique',	NULL,	'https://media.ldlc.com/r374/ld/products/00/05/97/11/LD0005971130.jpg'),
(6,	'Disque dur',	NULL,	'https://media.ldlc.com/r374/ld/products/00/05/69/47/LD0005694752_1.jpg'),
(7,	'Barette de mémoire',	NULL,	'https://media.ldlc.com/r374/ld/products/00/05/75/33/LD0005753383_1.jpg'),
(8,	'Refroidissement',	NULL,	'https://media.ldlc.com/r374/ld/products/00/05/45/45/LD0005454525_2.jpg'),
(9,	'Carte réseau',	NULL,	'https://media.ldlc.com/r374/ld/products/00/05/93/29/LD0005932954_1.jpg');

DROP TABLE IF EXISTS `commande`;
CREATE TABLE `commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prix_total` int NOT NULL,
  `date_commande` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `fiche_technique`;
CREATE TABLE `fiche_technique` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_prod_fiche_technique` int NOT NULL,
  `nom_prod_ft` varchar(50) DEFAULT NULL,
  `marque` varchar(50) DEFAULT NULL,
  `modele` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_prod_fiche_technique` (`id_prod_fiche_technique`),
  CONSTRAINT `fiche_technique_ibfk_1` FOREIGN KEY (`id_prod_fiche_technique`) REFERENCES `produit` (`id`),
  CONSTRAINT `fiche_technique_ibfk_2` FOREIGN KEY (`id_prod_fiche_technique`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `produit`;
CREATE TABLE `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_categorie_prod` int NOT NULL,
  `id_commande_prod` int DEFAULT NULL,
  `nom_prod` varchar(50) NOT NULL,
  `description_produit` varchar(500) DEFAULT NULL,
  `prix` float NOT NULL,
  `stock` int NOT NULL,
  `image` text,
  PRIMARY KEY (`id`),
  KEY `id_categorie_prod` (`id_categorie_prod`),
  KEY `id_commande_prod` (`id_commande_prod`),
  CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_categorie_prod`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `produit_ibfk_3` FOREIGN KEY (`id_commande_prod`) REFERENCES `commande` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `produit` (`id`, `id_categorie_prod`, `id_commande_prod`, `nom_prod`, `description_produit`, `prix`, `stock`, `image`) VALUES
(1,	1,	NULL,	'Fractal Design define R6 Black',	'hvyguhn',	219.95,	5,	'https://media.ldlc.com/r1600/ld/products/00/04/76/70/LD0004767066_2.jpg'),
(2,	1,	NULL,	'Be quiet ! Pure base 500Dx',	'The be quiet! Pure Base 500DX is a mid-tower case with a quiet design that allows you to assemble almost any configuration based on a mini-ITX, micro-ATX or ATX motherboard. The ARGB backlighting also adds a touch of gaming to the case.',	136.95,	11,	'https://media.ldlc.com/bo/images/fiches/bo%C3%AEtier_pc/be%20quiet/pure_base_500/bequiet_500dx.jpg'),
(3,	1,	NULL,	'In win 101C BLANC',	'Le boîtier moyen tour IN WIN 101C dispose d\'une importante capacité d\'agencement et vous offrira une grande flexibilité pour accueillir la configuration de vos rêves. Son style moderne avec un affichage LED RGB en façade et sa conception en acier et verre trempé offrent un résultat réussi.',	84.95,	5,	'https://media.ldlc.com/r1600/ld/products/00/04/60/14/LD0004601445_2.jpg'),
(4,	1,	NULL,	'Fractal Design Meshify c tg (noir)',	'Intelligemment conçu, le boîtier Meshify C de Fractal Design s\'adresse avant tout à toutes les personnes recherchant un boîtier silencieux prêt à recevoir un système puissant et expansible de refroidissement par air ou par liquide mais également à ceux qui recherche un boîtier au look ravageur.',	139.96,	2,	'https://media.ldlc.com/r1600/ld/products/00/04/58/61/LD0004586193_2.jpg'),
(5,	1,	NULL,	'Corsai Obsidian 1000D noir',	'Exceptionnel en tout point, le boîtier Corsair Obsidian 1000D \"super tour\" bénéficie d\'un design sublime et de fonctionnalités ultra-avancées. Il a l\'incroyable capacité d\'héberger deux systèmes simultanément et dispose d\'un éclairage RGB totalement contrôlable.',	899.95,	0,	'https://media.ldlc.com/bo/images/fiches/bo%C3%AEtier_pc/corsair/obsidian_1000d/corsair_obsidian_1000d_001.jpg'),
(6,	2,	NULL,	'Corsair cv550 80 PLUS bronze',	'L\'alimentation Corsair CV550 80PLUS Bronze bénéficie d\'un câblage gainé noir pour s\'intégrer en toute discrétion dans votre boitier. Les alimentations de la gamme Corsair CV sont idéales pour votre nouvel ordinateur grâce à leur certification 80 PLUS Bronze qui permet de fournir des tensions stables',	59.95,	10,	'https://media.ldlc.com/r1600/ld/products/00/05/58/53/LD0005585368_2.jpg'),
(7,	2,	NULL,	'Be quiet ! Pure power 11 600w cm 80 plus gold',	'L\'alimentation PC be quiet! Pure Power 11 600W CM 80PLUS Gold est une valeur sûre pour la conception de votre PC. Modulaire, silencieuse, fiable et efficace (80PLUS Gold), elle représente une solution de premier choix pour les intégrateurs, pour la conception d\'un PC multimédia ou d\'un PC Gamer.',	96.95,	19,	'https://media.ldlc.com/r1600/ld/products/00/05/11/82/LD0005118262_2.jpg'),
(8,	2,	NULL,	' Corsair CX750f RGB 80 Plus bronze (noir)',	'Les blocs d\'alimentation entièrement modulaires Corsair CX-F RGB Series fournissent une alimentation 80 PLUS Bronze efficace et durable à votre système. Vous profitez également d\'un éclairage personnalisable dynamique grâce à un ventilateur RGB de 120 mm.',	109.94,	20,	'https://media.ldlc.com/r1600/ld/products/00/05/77/00/LD0005770065_1.jpg'),
(9,	2,	NULL,	'Corsair atx1600i 80 plus titanium',	'L\'AX1600i de Corsair garantit une alimentation efficace 80 PLUS Titanium continue et ultra stable de 1600 W. Avec son fonctionnement silencieux et ses composants haut de gamme, vous découvrirez une alimentation puissante entièrement modulaire aux performances électriques de classe mondiale.',	699.95,	2,	'https://media.ldlc.com/bo/images/fiches/alimentation/corsair/ax1600i/texte1.jpg'),
(10,	2,	NULL,	'COOLER MASTER XG850 PLUS PLATINIUM',	'L\'alimentation XG Plus Platinum de Cooler Master est certifiée 80 PLUS Platinum et offre des performances haut de gamme avec des exigences de température réduites. Ce bloc d\'alimentation offre un câblage 100% modulaire, un ventilateur silencieux de 135 mm et un mode de contrôle thermique avancé.',	254.95,	0,	'https://media.ldlc.com/r1600/ld/products/00/05/96/71/LD0005967155.jpg'),
(11,	4,	NULL,	'AMD ryzen 3 3200G wraith stealh edition',	'Le processeur AMD Ryzen 3 3200G Wraith Stealth (3.6 GHz / 4 GHz) est basé sur l\'architecture Zen+ gravée en 12 nm. Cette deuxième génération Ryzen avec graphismes Radeon Vega 8 se dote de 4 coeurs, des fréquences revues à la hausse avec de base 3.6 GHz et jusqu\'à 4 GHz.',	149.95,	17,	'https://media.ldlc.com/r1600/ld/products/00/05/36/84/LD0005368402_2.jpg'),
(12,	4,	NULL,	'intel core i7-12700K',	'Avec les processeurs Alder Lake, Intel signe une petite révolution dans le monde de l\'architecture x86 en adoptant une technologie hybride basée sur 2 types de coeurs différents assemblés au sein d\'une même puce : Les Performances-Cores et les Efficient-Cores.',	569.95,	9,	'https://media.ldlc.com/r1600/ld/products/00/05/90/01/LD0005900190_1.jpg'),
(13,	4,	NULL,	'Intel core I5-13600Kf',	'Des jeux fluides et un PC qui ne ralentit pas. En offrant encore plus de puissance pour les programmes exigeants et les jeux et plus de coeurs pour les tâches de fond, les processeurs Intel Core de 13ème génération vous permettent de faire encore plus de choses et encore plus rapidement.',	375.96,	0,	'https://media.ldlc.com/r1600/ld/products/00/05/98/20/LD0005982085.jpg'),
(14,	4,	NULL,	'amd ryzen 7 5800X',	'Le processeur AMD Ryzen 7 5800X est optimisé pour le jeu vidéo : 8 Cores, 16 Threads et GameCache 36 Mo. Sans parler des fréquences natives et boost qui atteignent des sommets pour vous permettre de profiter de vos jeux préférés dans les meilleures conditions.',	429.95,	19,	'https://media.ldlc.com/r1600/ld/products/00/05/74/60/LD0005746000_1.jpg'),
(15,	4,	NULL,	'intel core i9-9900k ',	'Plus de Core, plus de cache et des fréquences Turbo ultra-élevées sont les atouts majeurs de la 9ème génération de processeur Intel Core Coffee Lake Refresh',	829,	10,	'https://media.ldlc.com/r1600/ld/products/00/05/04/92/LD0005049208_2.jpg'),
(16,	5,	NULL,	'Amd radeon rx 6950 XT',	'Mettez toutes les chances de votre côté grâce aux cartes graphiques AMD Radeon RX 6950 XT, avec des technologies de pointe pour : améliorer les performances de jeu, proposer des graphismes à couper le souffle et garantir une fluidité d\'affichage optimale.',	1149,	10,	'https://www.amd.com/system/files/2022-04/1303168-AMD-Radeon-RX-6950-XT-angled-1260x709.png'),
(17,	5,	NULL,	'ASROCK AMD RADEON RX 6600 challenger itx 8go',	'Basée sur l\'architecture AMD RDNA 2 et prenant en charge le ray tracing, la carte graphique ASRock AMD Radeon RX 6600 Challenger ITX 8GB vous propose de jouer dans les meilleures conditions avec des graphismes sublimes et une fluidité remarquable. C\'est LA carte graphique pour jouer en Full HD.',	679.95,	1,	'https://media.ldlc.com/r1600/ld/products/00/05/90/12/LD0005901247_1.jpg'),
(18,	5,	NULL,	'Asus dual geforce rtx 370 o8g',	'La carte graphique ASUS GeForce RTX Dual 3070 O8G V2 (LHR) embarque 8 Go de mémoire vidéo de nouvelle génération GDDR6. Ce modèle overclocké d\'usine bénéficie de fréquences de fonctionnement élevées et d\'un système de refroidissement amélioré gage de fiabilité et de performances à long terme.',	699.95,	9,	'https://dlcdnwebimgs.asus.com/gain/af0aa3bc-5575-48bd-8b9a-2182830e80e6/'),
(19,	5,	NULL,	'Nvidia Geforce gtx 1050 ti 4go',	'La carte graphique Gigabyte GeForce GTX 1050 Ti OC 4G est conçue pour permettre aux joueurs occasionnels ou assidus de profiter d\'un affichage fluide et rapide en Haute Définition. Profitez des derniers jeux PC avec un rendu graphique superbe sans vous ruiner. Concevez un PC Gaming peu onéreux et bénéficiant d\'un rapport performances / prix imbattable. ',	89.98,	0,	'https://media.ldlc.com/r1600/ld/products/00/04/01/32/LD0004013273_2.jpg'),
(20,	5,	NULL,	'msi geforce rtx 3090 TI suprim x 24go',	'Jouez en 8K HDR et streamez comme un pro avec la carte graphique gaming ultra-haut de gamme NVIDIA GeForce RTX 3090 Ti. Le nouveau monstre de NVIDIA vous permettra de profiter au mieux des derniers jeux PC en ultra-haute résolution avec tous les détails au maximum.',	2049.95,	29,	'https://media.ldlc.com/r1600/ld/products/00/05/94/32/LD0005943242.jpg'),
(21,	3,	NULL,	'Gygabyte Z690 gaming x',	'Basée sur le chipset Intel Z690 Express, la carte mère Gigabyte Z690 GAMING X DDR4 servira de base à votre PC Gaming équipé d\'un processeur performant et doté de fonctionnalités exclusives Gigabyte. Elle prend en charge les processeurs Intel Core 12ème génération.',	270.97,	10,	'https://media.ldlc.com/r1600/ld/products/00/05/90/37/LD0005903720_1.jpg'),
(22,	3,	NULL,	'ASROCK A320M pro4-f',	'Basée sur le chipset AMD AM4, la carte mère ASRock A320M Pro4-F est conçue pour accueillir les processeurs AMD Ryzen. Elle permettra l\'assemblage d\'une configuration Multimédia ou bureautique à moindre coût tout étant équipée d\'un processeur performant et en conservant une taille réduite.',	77.95,	1,	'https://media.ldlc.com/r1600/ld/products/00/05/65/78/LD0005657847_2.jpg'),
(23,	3,	NULL,	'ASROCK A520M phantom gaming 4',	'La carte mère ASRock A520M Phantom Gaming 4 est conçue pour accueillir les processeurs AMD Ryzen 3ème génération et supérieurs sur socket AM4. Elle permettra l\'assemblage d\'une configuration puissante et polyvalente capable de s\'acquitter de toutes les tâches.',	94.94,	0,	'https://media.ldlc.com/r1600/ld/products/00/05/74/98/LD0005749830_1.jpg'),
(24,	3,	NULL,	'Asus tuf gaming b550-plus',	'Prête à accueillir les processeurs AMD Ryzen de 3ème génération (nom de Core Matisse), la carte mère ASUS TUF GAMING B550-PLUS est idéale pour concevoir un PC Gaming performant et équilibré. Le support du PCI-Express 4.0 vous emmène vers de nouveaux sommets.',	158.95,	20,	'https://media.ldlc.com/r1600/ld/products/00/05/68/67/LD0005686754_1.jpg'),
(25,	3,	NULL,	'MSI MAG z TOMAHAWK',	'La carte mère MSI MAG Z490 TOMAHAWK a été pensée pour rappeler le monde militaire. Pour une expérience d\'utilisation optimale, elle propose un panneau E/S préinstallé et un dissipateur au format agrandi qui assure un refroidissement parfait. La carte mère Z490 Tomahawk est un modèle robuste et garant d\'une durée de vie prolongée, idéale pour les joueurs qui veulent dominer la partie.',	342.94,	8,	'https://media.ldlc.com/r150/ld/products/00/05/66/79/LD0005667929_2.jpg');

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_adresse` int DEFAULT NULL,
  `id_commande` int DEFAULT NULL,
  `identifiant_utilisateur` varchar(50) NOT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `prenom_utilisateur` varchar(50) NOT NULL,
  `mail_utilisateur` varchar(50) NOT NULL,
  `tel_utilisateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mdp_utilisateur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_adresse` (`id_adresse`),
  KEY `id_commande` (`id_commande`),
  CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_adresse`) REFERENCES `adresse_utilisateur` (`id`),
  CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `utilisateur` (`id`, `id_adresse`, `id_commande`, `identifiant_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `tel_utilisateur`, `mdp_utilisateur`) VALUES
(9,	NULL,	NULL,	'admin',	'Hmd',	'Ilan',	'admin@gmail.com',	'0692004875',	'97410'),
(14,	NULL,	NULL,	'ali',	'abdallah',	'Attoumani',	'lali@info.re',	'0692178598',	'$2y$10$qEG/9sdfQbUjJg8LqbMXx.Ow.HSMZ8uIDIISRTkBd7KreMxFtLvoS'),
(15,	NULL,	NULL,	'Badoo',	'houmadi',	'hilani',	'a@info.re',	'035654546',	'$2y$10$Cv6t21jU9Mgj5rBoNUMASOyQlZaGV7K.UfT8Vc1hoTWOzx8gwE0ee'),
(16,	NULL,	NULL,	'Badoo',	'dzdzdzdz',	'houmadi',	'a@ilani.re',	'845845',	'$2y$10$RAaPpn7ysZlNKLBOdQLkYunCeS2qy0koW.iC5rbuF1up8mQPr7O9K'),
(17,	NULL,	NULL,	'allo',	'ddd',	'houmadi',	'lili@gmail.com',	'035654546',	'$2y$10$d603YDNYXWSsvxsN6LIgPeLp9UE8Ai.Fqq5QsObQFEwwenN7UYIDS');

DROP TABLE IF EXISTS `catalogue_tous1`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `catalogue_tous1` AS select `c`.`nom_categorie` AS `Nom de la catégorie`,`p`.`nom_prod` AS `Nom du produit` from (`produit` `p` join `categorie` `c` on((`c`.`id_categorie` = `p`.`id_categorie_prod`)));

-- 2022-11-09 05:18:57

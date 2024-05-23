-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 12:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `openarena`
--

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` int(100) NOT NULL,
  `nom_evenement` varchar(100) DEFAULT NULL,
  `modedejeux` varchar(100) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `pseudo_createur` varchar(100) DEFAULT NULL,
  `photo_evenement` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `nom_evenement`, `modedejeux`, `date_creation`, `date_debut`, `pseudo_createur`, `photo_evenement`) VALUES
(17, 'tournoi1', 'missionpack', '2024-04-10', '2024-04-30', 'moiadmin', 'photoevenementstandard.png'),
(18, 'premier evenement', 'missionpack', '2024-04-12', '2024-04-17', 'organisateur_1', ''),
(19, 'premier tour', 'missionpack', '2024-04-12', '2024-04-15', 'moiadmin', ''),
(20, 'premier tour', 'missionpack', '2024-04-12', '2024-04-15', 'moiadmin', ''),
(21, 'tour 1', 'missionpack', '2024-04-14', '2024-04-15', 'moiadmin', '');

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `id_map` int(100) NOT NULL,
  `nom_map` varchar(100) DEFAULT NULL,
  `photo_map` text DEFAULT NULL,
  `description_map` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id_map`, `nom_map`, `photo_map`, `description_map`) VALUES
(1, 'Map 1', 'map1.jpg', ''),
(2, 'Map 2', 'map2.jpg', ''),
(3, 'Map 3', 'map3.jpg', ''),
(4, 'Map 4', 'map4.jpg', ''),
(5, 'Map 5', 'map5.jpg', ''),
(6, 'Map 6', 'map6.jpg', ''),
(7, 'Map 7', 'map7.jpg', ''),
(8, 'Map 8', 'map8.jpg', ''),
(9, 'dm1', 'dm1.jpg', ''),
(10, 'dm2', 'dm2.jpg\r\n', ''),
(11, 'dm3', 'dm3.jpg', ''),
(12, 'dm4', 'dm4.jpg', ''),
(13, 'dm6', 'dm6.jpg', ''),
(14, 'dm13', 'dm13.jpg', ''),
(16, 'dm20', 'dm20.jpg', ''),
(17, 'ctf1', 'ctf1.jpg', ''),
(40, 'dm17', 'dm17.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `matchs`
--

CREATE TABLE `matchs` (
  `id_matchs` int(11) NOT NULL,
  `id_tournoi` int(11) NOT NULL,
  `phase` varchar(655) DEFAULT NULL,
  `joueur1` varchar(655) DEFAULT NULL,
  `joueur2` varchar(655) DEFAULT NULL,
  `score_joueur1` int(11) DEFAULT NULL,
  `score_joueur2` int(11) DEFAULT NULL,
  `vainqueur` varchar(655) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matchs`
--

INSERT INTO `matchs` (`id_matchs`, `id_tournoi`, `phase`, `joueur1`, `joueur2`, `score_joueur1`, `score_joueur2`, `vainqueur`) VALUES
(23, 5, 'quart de finale', 'erw', 'clarisse_masson', 5, 4, 'erw'),
(24, 5, 'quart de finale', 'eline', 'chancel_kotin1', 8, 2, 'eline'),
(25, 5, 'quart de finale', 'eddy', 'chancel_kotin', 6, 1, 'eddy'),
(26, 5, 'quart de finale', 'brown_chris', 'couffo_barack', 3, 2, 'brown_chris'),
(27, 5, 'demi-finale', 'brown_chris', 'erw', 3, 2, 'brown_chris'),
(28, 5, 'demi-finale', 'eddy', 'eline', 5, 4, 'eddy'),
(29, 5, 'finale', 'eddy', 'brown_chris', 5, 1, 'eddy'),
(30, 6, 'quart de finale', 'eddy', 'clarisse_masson', 5, 1, 'eddy'),
(31, 6, 'quart de finale', 'chancel_kotin', 'eline', 4, 5, 'eline'),
(32, 6, 'quart de finale', 'kerry_john', 'couffo_barack', 5, 2, 'kerry_john'),
(33, 6, 'quart de finale', 'chancel_kotin1', 'erw', 8, 9, 'erw'),
(34, 6, 'demi-finale', 'eline', 'kerry_john', 2, 1, 'eline'),
(35, 6, 'demi-finale', 'erw', 'eddy', 5, 4, 'erw'),
(36, 6, 'finale', 'eline', 'erw', 2, 1, 'eline'),
(37, 7, 'quart de finale', 'eline', 'brown_chris', 2, 1, 'eline'),
(38, 7, 'quart de finale', 'eddy', 'chancel_kotin1', 2, 1, 'eddy'),
(39, 7, 'quart de finale', 'erw', 'couffo_barack', 3, 2, 'erw'),
(40, 7, 'quart de finale', 'chancel_kotin', 'clarisse_masson', 2, 1, 'chancel_kotin'),
(41, 7, 'demi-finale', 'eddy', 'erw', 3, 1, 'eddy'),
(42, 7, 'demi-finale', 'eline', 'chancel_kotin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `modes`
--

CREATE TABLE `modes` (
  `id_mode` int(11) NOT NULL,
  `nom_mode` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modes`
--

INSERT INTO `modes` (`id_mode`, `nom_mode`) VALUES
(10, 'DeathMatch'),
(11, 'Team Deathmatch'),
(12, 'Capture the Flag'),
(13, 'Duel'),
(14, 'Free for All'),
(15, 'Instagib'),
(16, 'Rocket Arena'),
(17, 'Clan Arena');

-- --------------------------------------------------------

--
-- Table structure for table `modes_maps`
--

CREATE TABLE `modes_maps` (
  `id_mode` int(11) NOT NULL,
  `id_map` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modes_maps`
--

INSERT INTO `modes_maps` (`id_mode`, `id_map`) VALUES
(10, 10),
(10, 12),
(10, 13),
(10, 40),
(11, 9),
(11, 11),
(11, 16),
(12, 17),
(13, 12),
(13, 13),
(13, 14),
(14, 10),
(14, 13),
(15, 12),
(15, 13),
(16, 10),
(16, 12),
(16, 14),
(17, 13),
(17, 40);

-- --------------------------------------------------------

--
-- Table structure for table `participations`
--

CREATE TABLE `participations` (
  `id_participations` int(11) NOT NULL,
  `id_tournoi` int(11) NOT NULL,
  `phase` varchar(655) DEFAULT NULL,
  `joueurs` varchar(655) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participations`
--

INSERT INTO `participations` (`id_participations`, `id_tournoi`, `phase`, `joueurs`) VALUES
(46, 5, 'quart de finale', 'brown_chris'),
(47, 5, 'quart de finale', 'chancel_kotin'),
(48, 5, 'quart de finale', 'chancel_kotin1'),
(49, 5, 'quart de finale', 'clarisse_masson'),
(50, 5, 'quart de finale', 'couffo_barack'),
(51, 5, 'quart de finale', 'eddy'),
(52, 5, 'quart de finale', 'eline'),
(53, 5, 'quart de finale', 'erw'),
(54, 5, 'demi-finale', 'erw'),
(55, 5, 'demi-finale', 'eline'),
(56, 5, 'demi-finale', 'eddy'),
(57, 5, 'demi-finale', 'brown_chris'),
(58, 5, 'finale', 'brown_chris'),
(59, 5, 'finale', 'eddy'),
(60, 6, 'quart de finale', 'chancel_kotin'),
(61, 6, 'quart de finale', 'chancel_kotin1'),
(62, 6, 'quart de finale', 'clarisse_masson'),
(63, 6, 'quart de finale', 'couffo_barack'),
(64, 6, 'quart de finale', 'eddy'),
(65, 6, 'quart de finale', 'eline'),
(66, 6, 'quart de finale', 'erw'),
(67, 6, 'quart de finale', 'kerry_john'),
(68, 6, 'demi-finale', 'eddy'),
(69, 6, 'demi-finale', 'eline'),
(70, 6, 'demi-finale', 'kerry_john'),
(71, 6, 'demi-finale', 'erw'),
(72, 6, 'finale', 'eline'),
(73, 6, 'finale', 'erw'),
(74, 7, 'quart de finale', 'brown_chris'),
(75, 7, 'quart de finale', 'chancel_kotin'),
(76, 7, 'quart de finale', 'chancel_kotin1'),
(77, 7, 'quart de finale', 'clarisse_masson'),
(78, 7, 'quart de finale', 'couffo_barack'),
(79, 7, 'quart de finale', 'eddy'),
(80, 7, 'quart de finale', 'eline'),
(81, 7, 'quart de finale', 'erw'),
(82, 7, 'demi-finale', 'eline'),
(83, 7, 'demi-finale', 'eddy'),
(84, 7, 'demi-finale', 'erw'),
(85, 7, 'demi-finale', 'chancel_kotin'),
(86, 7, 'finale', 'eddy');

-- --------------------------------------------------------

--
-- Table structure for table `tournoi`
--

CREATE TABLE `tournoi` (
  `id_tournoi` int(11) NOT NULL,
  `nom_tournoi` varchar(655) DEFAULT NULL,
  `date_tournoi` date DEFAULT NULL,
  `vainqueur` varchar(655) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tournoi`
--

INSERT INTO `tournoi` (`id_tournoi`, `nom_tournoi`, `date_tournoi`, `vainqueur`) VALUES
(5, 'comp', '2024-05-14', 'eddy'),
(6, 'sq', '2024-05-13', 'eline'),
(7, 'ki', '2024-05-24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `pseudo` varchar(100) NOT NULL,
  `nom_utilisateur` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `adresse_email` varchar(100) DEFAULT NULL,
  `mot_de_passe` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `sexe` varchar(100) DEFAULT NULL,
  `photo_de_profil` text DEFAULT NULL,
  `avancer` text DEFAULT NULL,
  `reculer` text DEFAULT NULL,
  `tourner_gauche` text DEFAULT NULL,
  `tourner_droite` text DEFAULT NULL,
  `sauter` text DEFAULT NULL,
  `tirer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`pseudo`, `nom_utilisateur`, `prenom`, `adresse_email`, `mot_de_passe`, `type`, `date_inscription`, `ville`, `sexe`, `photo_de_profil`, `avancer`, `reculer`, `tourner_gauche`, `tourner_droite`, `sauter`, `tirer`) VALUES
('admin', 'Admin', '', 'admin@gmail.com', '$2y$12$owtMcgvqCt3TLyhiYjpYEupePSf6/Xl9a9x6kqYDIOz2fIFpin2c2', 'admin', NULL, 'fr', 'Masculin', 'uploads/photoprofilhomme.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
('brown_chris', 'chris', 'brown', 'brown.chris@open-arena.fr', '$2y$12$4US25qM46xcr62Q1KyNdBehf9OHloei./oTJGYilL3AbVciMPeCAG', 'personne', '2024-04-14', 'fr', 'Masculin', 'uploads/photoprofilhomme.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
('chancel_kotin', 'kotin', 'chancel', 'chancel.kotin@open-arena.fr', '$2y$12$cU5kAhxnarkpQrSkxSGlOekghZzqQDijMcA6YENnONfHFp5chpUWO', 'personne', '2024-04-17', 'fr', 'Masculin', '', NULL, NULL, NULL, NULL, NULL, NULL),
('chancel_kotin1', 'KOTIN', 'Chancel', 'chancel.kotin@open-arena.fr', '$2y$12$qL59GRe5NschmU3bef8oFe1SrXZd2eLwoi/rxc3ZX7k8auv1PdTpi', 'personne', '2024-04-17', 'fr', 'Masculin', '', NULL, NULL, NULL, NULL, NULL, NULL),
('clarisse_masson', 'masson', 'clarisse', 'clarisse.masson@open-arena.fr', '$2y$12$iun.F4YyoTfEk9tgKt9ReezsmXct7IyMu4RkKQ39AVYhDCZ4zdRmm', 'personne', '2024-04-17', 'fr', 'Féminin', '', NULL, NULL, NULL, NULL, NULL, NULL),
('couffo_barack', 'barack', '', 'couffo.barack@open-arena.fr', '$2y$12$DEJ.H/I9u9EV5bft2UP5sOkVif0zzrabhKRmDTRQ5e2QkPCBcxooO', 'organisateur', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('eddy', 'Eddy', '', 'eddy@gmail.com', '$2y$12$XnRDwd6y7IpqDG73hb33ROCGrlfftFPLwL6hGaLei9pYoHD5FSLiy', 'personne', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('eline', 'eline', '', 'eline@gmail.com', '$2y$12$AxBxwTRqY99S/xprSLtLbePr7KVdaF3NwnZNuCQyObwVHt/32yUam', 'personne', NULL, 'fr', 'Féminin', 'uploads/photoprofilfemme.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
('erw', 'Erw', '', 'didymedide0808@gmail.com', '$2y$12$28F.jWKXR9m5chO16e8Jx.nDKOAFoXm8b/s09e6Vs9nU6uK67M9W6', 'personne', NULL, 'fr', 'Masculin', 'uploads/1Capture d’écran 2022-03-25 092343.png', 'G', 'B', 'V', 'C', 'X', 'W'),
('kerry_john', 'john', '', 'kerry.@open-arena.fr', '$2y$12$6E2CGg6LY1CnWWV4P.JJR.irw6H1MzDP6OaBXkpTha58OQU6aN.ha', 'organisateur', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('marion_guionnet', 'guionnet', 'marion', 'marion.guionnet@open-arena.fr', '$2y$12$xfsyxoFZVORQZW80QDBu1er09zW4dfFul.Xs2xhGeSD2AT8JoCZ2K', 'personne', '2024-04-15', 'fr', 'Féminin', '', NULL, NULL, NULL, NULL, NULL, NULL),
('moiadmin', 'MoiAdmin', '', 'moiadmin@gmail.com', '$2y$12$NwRfktT2DX7LsmnYIAp3buhwMDpRQ.4uRNBtvyDjnwzI1NbX73Die', 'organisateur', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('musk_elon', 'Elon', 'Musk', 'musk.elon@open-arena.fr', '$2y$12$lwRPZGkBn2lQcO3610EKNeerWueqf6A85G0fH5TL9uTNY2gvdNOqq', 'personne', '2024-04-14', 'fr', 'Masculin', '', NULL, NULL, NULL, NULL, NULL, NULL),
('organisateur_1', 'Organisateur1', '', 'organisateur1@gmail.com', '$2y$12$g82VD2qCqX7k/A0ypfittOI/YIhNTnCUtM/7jSzomRVfnKfZ2k3sK', 'organisateur', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('organisateur_2', 'Organisateur2', '', 'organisateur2@gmail.com', '$2y$12$F5hGAMZMgdkgaYh0S0e3PuY7b1mcs582UjLGKriuSEJNWWW6LvEbu', 'organisateur', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('organisateur_3', 'Organisateur3', '', 'organisateur3@gmail.com', '$2y$12$q3P3L3UHUxbuv1nmXnMyM.qXEFZ5oVZfusWEjw9tZvh/Am7lVbVey', 'organisateur', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('organisateur_4', 'Organisateur4', '', 'organisateur4@gmail.com', '$2y$12$uIlwz5p1dwsB5TT/.JxHO.kEqOG3PEJ4QS5NrGBXGXRy43CHJnx32', 'organisateur', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('organisateur_5', 'Organisateur5', '', 'organisateur5@gmail.com', '$2y$12$j4KKaMf5RgXIYcMbPZAvUOmxmRVza/VYcGeqjvmLABDkg8dbpzh3K', 'organisateur', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('organisateur_6', 'Organisateur6', '', 'organisateur6@gmail.com', '$2y$12$bceYtX32wpAkPsjGUHNMFuF5it0Y1rrESIcHOcNO9ZCWAf2yfqW6y', 'organisateur', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('organisateur_7', 'Organisateur7', '', 'organisateur7@gmail.com', '$2y$12$2uM5EyY/8pTerPFg3LhOWOUvyJS9AWnJJr5ZMGW.1n9EIQpftks2O', 'organisateur', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('organisateur_8', 'Organisateur8', '', 'organisateur8@gmail.com', '$2y$12$7Li3CK3oUZSVOFQ.3j93HOvUS/bBhU84zRDvPyXDzcBvU9zyPwqhG', 'organisateur', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('organisateur_9', 'Organisateur9', '', 'organisateur9@gmail.com', '$2y$12$0xKSipL9S3PSsJYqHLV0PO5ZT3dzejL4..3OsPT.95bZj5IvP.gHq', 'organisateur', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('rosay_boss', 'boss', 'rosay', 'rosay.boss@open-arena.fr', '$2y$12$Pn.ZodzbDLmz3g3mnjQ2tOg6UEXbaVfszt8s2MMRHIupgDwgC6wNC', 'personne', '2024-04-14', 'fr', 'Masculin', '', NULL, NULL, NULL, NULL, NULL, NULL),
('sd_sd', 'sd', 'sd', 'sd.sd@open-arena.fr', '$2y$12$PjA3bN/N20ZkPsfRdJJC7.SuZJmeEvd2BZa/VTONO4q.Zp.KWFDIG', 'personne', '2024-05-22', 'fr', 'Masculin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('thug', 'thug', '', 'thug@gmail.com', '$2y$12$O.IwadjLbWZA2e/AVaA1bOSp5wi5Sm8r7iMIQVqpkTbgGBBhoG9Ru', 'personne', NULL, 'es', 'Masculin', 'uploads/photoprofilhomme.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
('tom_Jerry', 'Jerry', '', 'tom.@open-arena.fr', '$2y$12$iG12UnPpoTFRMtBBWOpGUOIJ26Hh0.J/1MVhGL8Cv6PMQ6RuFSU62', 'organisateur', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur_evenement`
--

CREATE TABLE `utilisateur_evenement` (
  `pseudo` varchar(100) NOT NULL,
  `id_evenement` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur_evenement`
--

INSERT INTO `utilisateur_evenement` (`pseudo`, `id_evenement`) VALUES
('brown_chris', 21),
('eddy', 21),
('eline', 17),
('eline', 20),
('erw', 17),
('erw', 18),
('erw', 20),
('thug', 17),
('thug', 18),
('thug', 20),
('thug', 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id_map`);

--
-- Indexes for table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`id_matchs`),
  ADD KEY `fk_id_tournoi_matchs` (`id_tournoi`);

--
-- Indexes for table `modes`
--
ALTER TABLE `modes`
  ADD PRIMARY KEY (`id_mode`);

--
-- Indexes for table `modes_maps`
--
ALTER TABLE `modes_maps`
  ADD PRIMARY KEY (`id_mode`,`id_map`),
  ADD KEY `id_map` (`id_map`);

--
-- Indexes for table `participations`
--
ALTER TABLE `participations`
  ADD PRIMARY KEY (`id_participations`),
  ADD KEY `fk_id_tournoi` (`id_tournoi`);

--
-- Indexes for table `tournoi`
--
ALTER TABLE `tournoi`
  ADD PRIMARY KEY (`id_tournoi`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`pseudo`);

--
-- Indexes for table `utilisateur_evenement`
--
ALTER TABLE `utilisateur_evenement`
  ADD PRIMARY KEY (`pseudo`,`id_evenement`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_evenement` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id_map` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `id_matchs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `modes`
--
ALTER TABLE `modes`
  MODIFY `id_mode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `participations`
--
ALTER TABLE `participations`
  MODIFY `id_participations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tournoi`
--
ALTER TABLE `tournoi`
  MODIFY `id_tournoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `fk_id_tournoi_matchs` FOREIGN KEY (`id_tournoi`) REFERENCES `tournoi` (`id_tournoi`) ON DELETE CASCADE;

--
-- Constraints for table `modes_maps`
--
ALTER TABLE `modes_maps`
  ADD CONSTRAINT `modes_maps_ibfk_1` FOREIGN KEY (`id_mode`) REFERENCES `modes` (`id_mode`),
  ADD CONSTRAINT `modes_maps_ibfk_2` FOREIGN KEY (`id_map`) REFERENCES `map` (`id_map`);

--
-- Constraints for table `participations`
--
ALTER TABLE `participations`
  ADD CONSTRAINT `fk_id_tournoi` FOREIGN KEY (`id_tournoi`) REFERENCES `tournoi` (`id_tournoi`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

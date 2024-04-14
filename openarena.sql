-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 14 avr. 2024 à 23:53
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `openarena`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` int(100) NOT NULL,
  `nom_evenement` varchar(100) NOT NULL,
  `modedejeux` varchar(100) NOT NULL,
  `date_creation` date NOT NULL,
  `date_debut` date NOT NULL,
  `pseudo_createur` varchar(100) NOT NULL,
  `photo_evenement` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `nom_evenement`, `modedejeux`, `date_creation`, `date_debut`, `pseudo_createur`, `photo_evenement`) VALUES
(17, 'tournoi1', 'missionpack', '2024-04-10', '2024-04-30', 'moiadmin', 'photoevenementstandard.png'),
(18, 'premier evenement', 'missionpack', '2024-04-12', '2024-04-17', 'organisateur_1', ''),
(19, 'premier tour', 'missionpack', '2024-04-12', '2024-04-15', 'moiadmin', ''),
(20, 'premier tour', 'missionpack', '2024-04-12', '2024-04-15', 'moiadmin', ''),
(21, 'tour 1', 'missionpack', '2024-04-14', '2024-04-15', 'moiadmin', '');

-- --------------------------------------------------------

--
-- Structure de la table `map`
--

CREATE TABLE `map` (
  `id_map` int(11) NOT NULL,
  `nom_map` varchar(100) NOT NULL,
  `photo_map` text NOT NULL,
  `description_map` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `map`
--

INSERT INTO `map` (`id_map`, `nom_map`, `photo_map`, `description_map`) VALUES
(1, 'Map 1', 'map1.jpg', ''),
(2, 'Map 2', 'map2.jpg', ''),
(3, 'Map 3', 'map3.jpg', ''),
(4, 'Map 4', 'map4.jpg', ''),
(5, 'Map 5', 'map5.jpg', ''),
(6, 'Map 6', 'map6.jpg', ''),
(7, 'Map 7', 'map7.jpg', ''),
(8, 'Map 8', 'map8.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `pseudo` varchar(100) NOT NULL,
  `nom_utilisateur` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse_email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date_inscription` date DEFAULT NULL,
  `ville` varchar(100) NOT NULL,
  `sexe` varchar(100) NOT NULL,
  `photo_de_profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`pseudo`, `nom_utilisateur`, `prenom`, `adresse_email`, `mot_de_passe`, `type`, `date_inscription`, `ville`, `sexe`, `photo_de_profil`) VALUES
('admin', 'Admin', '', 'admin@gmail.com', '$2y$12$owtMcgvqCt3TLyhiYjpYEupePSf6/Xl9a9x6kqYDIOz2fIFpin2c2', 'admin', NULL, 'fr', 'Masculin', 'uploads/photoprofilhomme.jpg'),
('brown_chris', 'chris', 'brown', 'brown.chris@open-arena.fr', '$2y$12$4US25qM46xcr62Q1KyNdBehf9OHloei./oTJGYilL3AbVciMPeCAG', 'personne', '2024-04-14', 'fr', 'Masculin', 'uploads/photoprofilhomme.jpg'),
('couffo_barack', 'barack', '', 'couffo.barack@open-arena.fr', '$2y$12$DEJ.H/I9u9EV5bft2UP5sOkVif0zzrabhKRmDTRQ5e2QkPCBcxooO', 'organisateur', NULL, '', '', ''),
('eddy', 'Eddy', '', 'eddy@gmail.com', '$2y$12$XnRDwd6y7IpqDG73hb33ROCGrlfftFPLwL6hGaLei9pYoHD5FSLiy', 'personne', NULL, '', '', ''),
('eline', 'eline', '', 'eline@gmail.com', '$2y$12$AxBxwTRqY99S/xprSLtLbePr7KVdaF3NwnZNuCQyObwVHt/32yUam', 'personne', NULL, 'fr', 'Féminin', 'uploads/photoprofilfemme.jpg'),
('erw', 'Erw', '', 'didymedide0808@gmail.com', '$2y$12$28F.jWKXR9m5chO16e8Jx.nDKOAFoXm8b/s09e6Vs9nU6uK67M9W6', 'personne', NULL, 'fr', 'Masculin', 'uploads/1Capture d’écran 2022-03-25 092343.png'),
('kerry_john', 'john', '', 'kerry.@open-arena.fr', '$2y$12$6E2CGg6LY1CnWWV4P.JJR.irw6H1MzDP6OaBXkpTha58OQU6aN.ha', 'organisateur', NULL, '', '', ''),
('moiadmin', 'MoiAdmin', '', 'moiadmin@gmail.com', '$2y$12$NwRfktT2DX7LsmnYIAp3buhwMDpRQ.4uRNBtvyDjnwzI1NbX73Die', 'organisateur', NULL, '', '', ''),
('musk_elon', 'Elon', 'Musk', 'musk.elon@open-arena.fr', '$2y$12$lwRPZGkBn2lQcO3610EKNeerWueqf6A85G0fH5TL9uTNY2gvdNOqq', 'personne', '2024-04-14', 'fr', 'Masculin', ''),
('organisateur_1', 'Organisateur1', '', 'organisateur1@gmail.com', '$2y$12$g82VD2qCqX7k/A0ypfittOI/YIhNTnCUtM/7jSzomRVfnKfZ2k3sK', 'organisateur', NULL, '', '', ''),
('organisateur_2', 'Organisateur2', '', 'organisateur2@gmail.com', '$2y$12$F5hGAMZMgdkgaYh0S0e3PuY7b1mcs582UjLGKriuSEJNWWW6LvEbu', 'organisateur', NULL, '', '', ''),
('organisateur_3', 'Organisateur3', '', 'organisateur3@gmail.com', '$2y$12$q3P3L3UHUxbuv1nmXnMyM.qXEFZ5oVZfusWEjw9tZvh/Am7lVbVey', 'organisateur', NULL, '', '', ''),
('organisateur_4', 'Organisateur4', '', 'organisateur4@gmail.com', '$2y$12$uIlwz5p1dwsB5TT/.JxHO.kEqOG3PEJ4QS5NrGBXGXRy43CHJnx32', 'organisateur', NULL, '', '', ''),
('organisateur_5', 'Organisateur5', '', 'organisateur5@gmail.com', '$2y$12$j4KKaMf5RgXIYcMbPZAvUOmxmRVza/VYcGeqjvmLABDkg8dbpzh3K', 'organisateur', NULL, '', '', ''),
('organisateur_6', 'Organisateur6', '', 'organisateur6@gmail.com', '$2y$12$bceYtX32wpAkPsjGUHNMFuF5it0Y1rrESIcHOcNO9ZCWAf2yfqW6y', 'organisateur', NULL, '', '', ''),
('organisateur_7', 'Organisateur7', '', 'organisateur7@gmail.com', '$2y$12$2uM5EyY/8pTerPFg3LhOWOUvyJS9AWnJJr5ZMGW.1n9EIQpftks2O', 'organisateur', NULL, '', '', ''),
('organisateur_8', 'Organisateur8', '', 'organisateur8@gmail.com', '$2y$12$7Li3CK3oUZSVOFQ.3j93HOvUS/bBhU84zRDvPyXDzcBvU9zyPwqhG', 'organisateur', NULL, '', '', ''),
('organisateur_9', 'Organisateur9', '', 'organisateur9@gmail.com', '$2y$12$0xKSipL9S3PSsJYqHLV0PO5ZT3dzejL4..3OsPT.95bZj5IvP.gHq', 'organisateur', NULL, '', '', ''),
('rosay_boss', 'boss', 'rosay', 'rosay.boss@open-arena.fr', '$2y$12$Pn.ZodzbDLmz3g3mnjQ2tOg6UEXbaVfszt8s2MMRHIupgDwgC6wNC', 'personne', '2024-04-14', 'fr', 'Masculin', ''),
('thug', 'thug', '', 'thug@gmail.com', '$2y$12$O.IwadjLbWZA2e/AVaA1bOSp5wi5Sm8r7iMIQVqpkTbgGBBhoG9Ru', 'personne', NULL, 'es', 'Masculin', 'uploads/photoprofilhomme.jpg'),
('tom_Jerry', 'Jerry', '', 'tom.@open-arena.fr', '$2y$12$iG12UnPpoTFRMtBBWOpGUOIJ26Hh0.J/1MVhGL8Cv6PMQ6RuFSU62', 'organisateur', NULL, '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_evenement`
--

CREATE TABLE `utilisateur_evenement` (
  `pseudo` varchar(100) NOT NULL,
  `id_evenement` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur_evenement`
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
-- Index pour les tables déchargées
--

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`);

--
-- Index pour la table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id_map`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`pseudo`);

--
-- Index pour la table `utilisateur_evenement`
--
ALTER TABLE `utilisateur_evenement`
  ADD PRIMARY KEY (`pseudo`,`id_evenement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_evenement` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `map`
--
ALTER TABLE `map`
  MODIFY `id_map` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 24 Mai 2019 à 16:15
-- Version du serveur :  5.7.24-0ubuntu0.18.04.1
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `m2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `calendar`
--

INSERT INTO `calendar` (`id`, `name`, `description`, `start`, `end`) VALUES
(4, 'E1', 'Jour 1', '2019-04-29 09:00:00', '2019-04-29 10:00:00'),
(6, 'E3', 'Jour 2', '2019-04-30 00:00:00', '2019-04-30 10:00:00'),
(7, 'E4', 'testfgduozjb', '2019-04-29 10:00:00', '2019-04-29 18:00:00'),
(8, 'JoeLeTaxi', 'feodescription', '2019-05-28 16:30:00', '2019-05-28 17:30:00'),
(9, 'JoeLeTaxi', '', '2019-05-28 16:30:00', '2019-05-28 17:00:00'),
(10, 'ET', '', '2019-05-11 23:32:00', '2019-05-11 23:56:00');

-- --------------------------------------------------------

--
-- Structure de la table `league`
--

CREATE TABLE `league` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `league`
--

INSERT INTO `league` (`id`, `name`, `address`) VALUES
(4, 'dzq', 'dzq'),
(5, 'dz', 'dzq'),
(6, 'FC Jos&eacute;', '37 rue du Pastis');

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `idLeague` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `room`
--

INSERT INTO `room` (`id`, `number`, `capacity`, `idLeague`) VALUES
(2, 8, 10, 4),
(3, 4, 10, 6),
(4, 5, 100, 6),
(5, 14, 35, 6),
(6, 1, 100, 4),
(7, 2, 23, 4),
(8, 11, 80, 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statut` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `memberNum` int(11) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `statut`, `memberNum`, `phone`) VALUES
(34, 'aurelien', '$2y$10$XrRcyEdrKbulXQvEV7h.iuiV.dolknVMHsmtcfhG0Hft6VpOYtyku', 'aurelienguillemot@hotmail.fr', 'admin', 0, 0),
(1, 'user', '', 'projetgizmofrazou@gmail.com', 'sans droit', 0, 0),
(37, 'Gizmo', '$2y$10$dd8kJvlgWJ7i.z5K6A/0Jubjqz9c0IQ70xO3bVhkuLlHSHY.oH7qO', 'aurelienguillemot@hotmail.fr', 'user', 0, 0),
(39, 'Aurelien', 'Y%Yzbdzo', 'footaurelien@yhoo.fr', 'user', 1996, 637954273),
(41, 'fjepjz', '$2y$10$1cn2/v79UMwfdKhMaNwvJuS.NddJal/c4YXuxhVCp6rdTeF00T4f.', 'aurelienguillemot@hotmail.fr', 'user', 659988, 637954273),
(42, 'fjepjzfdsfdsfdsff', '$2y$10$pWsBevL1TT3Yc.tlHFZuWulhjkZeKg2STDmOSLT8q/OtYnrvqfWiW', 'aurelienguillemot@hotmail.fr', 'user', 659988, 637954273);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `league`
--
ALTER TABLE `league`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `league`
--
ALTER TABLE `league`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 03 juin 2021 à 11:04
-- Version du serveur :  5.5.68-MariaDB
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `borne`
--

-- --------------------------------------------------------

--
-- Structure de la table `borne_data`
--

CREATE TABLE `borne_data` (
  `id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `borne_number` double NOT NULL,
  `#` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `borne_logs`
--

CREATE TABLE `borne_logs` (
  `id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `borne_number` double NOT NULL,
  `date` varchar(255) NOT NULL,
  `#` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `borne_data`
--
ALTER TABLE `borne_data`
  ADD PRIMARY KEY (`#`);

--
-- Index pour la table `borne_logs`
--
ALTER TABLE `borne_logs`
  ADD PRIMARY KEY (`#`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `borne_data`
--
ALTER TABLE `borne_data`
  MODIFY `#` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `borne_logs`
--
ALTER TABLE `borne_logs`
  MODIFY `#` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

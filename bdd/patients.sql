-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 jan. 2020 à 16:46
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dentaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `ID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `ID_Medecin` int(3) UNSIGNED ZEROFILL NOT NULL,
  `Nom` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Prenom` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Sexe` int(1) NOT NULL,
  `Date_Naissance` date NOT NULL,
  `Wilaya` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Commune` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Num_Tel` int(10) UNSIGNED ZEROFILL NOT NULL,
  `Date_Ajout` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Medecin` (`ID_Medecin`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`ID_Medecin`) REFERENCES `medecin` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

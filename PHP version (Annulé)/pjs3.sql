-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Novembre 2015 à 08:53
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pjs3`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `ID_Article` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ID_Auteur` bigint(20) unsigned NOT NULL DEFAULT '0',
  `Date_Creation` datetime NOT NULL,
  `Contenu` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Titre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_Modification` datetime NOT NULL,
  `Nom_Lien` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_Article`),
  KEY `ID_Auteur` (`ID_Auteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`ID_Article`, `ID_Auteur`, `Date_Creation`, `Contenu`, `Titre`, `Date_Modification`, `Nom_Lien`) VALUES
(1, 1, '2015-11-19 13:50:50', 'Ceci est un article de test			', 'Test', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID_Utilisateur` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Pseudo_Utilisateur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pass_Utilisateur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email_Utilisateur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_Utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID_Utilisateur`, `Pseudo_Utilisateur`, `Pass_Utilisateur`, `Email_Utilisateur`) VALUES
(1, 'admin', 'password', 'admin@password.fr');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `FK_Auteur` FOREIGN KEY (`ID_Auteur`) REFERENCES `utilisateurs` (`ID_Utilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mer 27 Mars 2013 à 14:22
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `coiffure`
--
CREATE DATABASE `coiffure`;
use `coiffure`;
-- --------------------------------------------------------

--
-- Structure de la table `boutton`
--

CREATE TABLE `boutton` (
  `id_boutton` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  PRIMARY KEY (`id_boutton`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `boutton`
--

INSERT INTO `boutton` VALUES(1, 'cheveux naturel');
INSERT INTO `boutton` VALUES(2, 'human air ');
INSERT INTO `boutton` VALUES(5, 'cheveux synthétiques');

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE `couleur` (
  `id_couleur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `liens_couleur` varchar(100) NOT NULL,
  PRIMARY KEY (`id_couleur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `couleur`
--

INSERT INTO `couleur` VALUES(1, 'couleur', 'image/couleur/couleur.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

CREATE TABLE `inscrit` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code` int(50) NOT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `inscrit`
--

INSERT INTO `inscrit` VALUES(1, 'aaa', 'aa', 'ojfdami@yahoo.fr', 'aa', 'kk', 'kk', 12);
INSERT INTO `inscrit` VALUES(26, 'ouedraogo', 'Franck', 'ojfdami@hotmail.com', 'junior', '', 'verneuil sur seine', 78480);
INSERT INTO `inscrit` VALUES(27, 'ukgug', 'ee', 'ee', 'ee', '', 'ee', 12);
INSERT INTO `inscrit` VALUES(28, 'ouedraogo', 'Franck', 'ojfdami@yahoo.fr', 'junior6', '', 'verneuil sur seine', 78480);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prix` varchar(255) NOT NULL,
  `p_id_tissage` int(11) DEFAULT NULL,
  `lien_image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` VALUES(11, 'human hair', '145', 9, 'image/tissage/naturel.jpg');
INSERT INTO `produits` VALUES(12, 'naturel', '150', 10, 'image/tissage/naturel.jpg');
INSERT INTO `produits` VALUES(13, 'synthetique', '150', 11, 'image/tissage/naturel.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `tissage`
--

CREATE TABLE `tissage` (
  `id_tissage` int(11) NOT NULL AUTO_INCREMENT,
  `t_description` text NOT NULL,
  `link` text NOT NULL,
  `liens` varchar(150) NOT NULL,
  PRIMARY KEY (`id_tissage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `tissage`
--

INSERT INTO `tissage` VALUES(9, 'Cheveux Humain Hair', 'image/human_hair.jpg', 'human.php');
INSERT INTO `tissage` VALUES(10, 'Cheveux naturels', 'image/naturel.jpg', 'naturel.php');
INSERT INTO `tissage` VALUES(11, 'Cheveux Synthetiques', 'image/synthetique.jpg', 'synthetique.php');

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

CREATE TABLE `visiteurs` (
  `ip` varchar(50) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `visiteurs`
--

INSERT INTO `visiteurs` VALUES('::1', 1364143072);
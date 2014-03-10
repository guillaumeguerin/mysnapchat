-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Client: sql301.0fees.net
-- Généré le: Lun 10 Mars 2014 à 10:28
-- Version du serveur: 5.6.15-56
-- Version de PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `fees0_14337243_snapchat`
--

-- --------------------------------------------------------

--
-- Structure de la table `FRIENDS`
--

CREATE TABLE IF NOT EXISTS `FRIENDS` (
  `FDS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FDS_USER_ID_1` int(11) NOT NULL,
  `FDS_USER_ID_2` int(11) NOT NULL,
  `FDS_RELATIONSHIP` tinyint(1) NOT NULL,
  `FDS_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`FDS_ID`),
  UNIQUE KEY `friendships` (`FDS_USER_ID_1`,`FDS_USER_ID_2`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;


--
-- Structure de la table `MESSAGE`
--

CREATE TABLE IF NOT EXISTS `MESSAGE` (
  `MSG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MSG_USER_ID_FROM` int(11) NOT NULL,
  `MSG_USER_ID_TO` int(11) NOT NULL,
  `MSG_TYPE` varchar(200) NOT NULL,
  `MSG_CONTENT` varchar(200) NOT NULL,
  `TOKEN` varchar(50) DEFAULT NULL,
  `MSG_TIME` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MSG_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=222 ;


--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `PROFILE_PICTURE` varchar(100) NOT NULL,
  `DIRECTORY` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `EMAIL` (`EMAIL`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`ID`, `EMAIL`, `PASSWORD`, `NAME`, `DESCRIPTION`, `PROFILE_PICTURE`, `DIRECTORY`) VALUES
(1, 'adminsnapchatbordeaux@god.lord', 'klfdsfkjsdkf^psdlfsldî"ç"çç_oo)e=ort)=orko^kiçè-à_èç8°9U70I°I', 'Admin Snap Chat Bordeaux', 'Etudiant en master 2 Génie Logiciel', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

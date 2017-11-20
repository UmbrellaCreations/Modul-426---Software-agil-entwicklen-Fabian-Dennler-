-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 20. Nov 2017 um 15:08
-- Server Version: 5.6.13
-- PHP-Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `zitate`
--
CREATE DATABASE IF NOT EXISTS `zitate` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `zitate`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `passwort` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `login`
--

INSERT INTO `login` (`id`, `username`, `passwort`) VALUES
(1, 'user', 'user');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zitat`
--

CREATE TABLE IF NOT EXISTS `zitat` (
  `idZitat` bigint(20) NOT NULL AUTO_INCREMENT,
  `quote` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(255) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`idZitat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `zitat`
--

INSERT INTO `zitat` (`idZitat`, `quote`, `autor`, `updated`, `created`) VALUES
(1, 'Niveau, wo nie Niveau war', 'Hannes', NULL, '2017-11-13 07:00:00'),
(2, 'test', 'Hannes', NULL, '0000-00-00 00:00:00'),
(3, 'Kreative Menschen machen nie den gleichen Fehler ein zweites mal, aber dafür erfinden sie Neue', 'Fabian Dennler', NULL, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

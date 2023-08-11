-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 03, 2023 at 11:28 AM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_pointage_stagiaire`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID_admin` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) DEFAULT NULL,
  `Prenom` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Telephone` varchar(250) DEFAULT NULL,
  `Profession` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `Date_creation` datetime DEFAULT NULL,
  `Date_update` datetime DEFAULT NULL,
  `Role` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_admin`, `Name`, `Prenom`, `Email`, `Telephone`, `Profession`, `Password`, `Date_creation`, `Date_update`, `Role`) VALUES
(44, 'admin', '', 'admin@gmail.com', '', '', '1111', NULL, NULL, 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

DROP TABLE IF EXISTS `departements`;
CREATE TABLE IF NOT EXISTS `departements` (
  `ID_dep` int(11) NOT NULL AUTO_INCREMENT,
  `Name_Dep` varchar(250) DEFAULT NULL,
  `Date_cration` datetime DEFAULT NULL,
  `Date_update` datetime DEFAULT NULL,
  `ID_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_dep`),
  KEY `fk_departements_admin` (`ID_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departements`
--

INSERT INTO `departements` (`ID_dep`, `Name_Dep`, `Date_cration`, `Date_update`, `ID_admin`) VALUES
(1, 'a', NULL, NULL, NULL),
(2, 'u', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `ID_document` int(11) NOT NULL AUTO_INCREMENT,
  `Name_Doc` varchar(250) DEFAULT NULL,
  `Type_Doc` varchar(250) DEFAULT NULL,
  `ID_stagiaire` int(11) DEFAULT NULL,
  `Date_cration` datetime DEFAULT NULL,
  `Date_update` datetime DEFAULT NULL,
  `ID_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_document`),
  KEY `fk_document_stagiaire` (`ID_stagiaire`),
  KEY `fk_document_admin` (`ID_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

DROP TABLE IF EXISTS `employer`;
CREATE TABLE IF NOT EXISTS `employer` (
  `ID_employer` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) DEFAULT NULL,
  `Prenom` varchar(250) DEFAULT NULL,
  `Profe` varchar(250) DEFAULT NULL,
  `Salaire` varchar(11) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Telephone` varchar(250) DEFAULT NULL,
  `Image` longblob,
  `Type_contrat` varchar(250) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `Cin` varchar(250) DEFAULT NULL,
  `Cv` longblob,
  `Date_D` date DEFAULT NULL,
  `Username` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `Date_cration` date DEFAULT NULL,
  `Date_update` date DEFAULT NULL,
  `ID_admin` int(11) DEFAULT NULL,
  `ID_dep` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_employer`),
  KEY `fk_employer_admin` (`ID_admin`),
  KEY `fk_employer_departements` (`ID_dep`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`ID_employer`, `Name`, `Prenom`, `Profe`, `Salaire`, `Email`, `Telephone`, `Image`, `Type_contrat`, `Address`, `Cin`, `Cv`, `Date_D`, `Username`, `Password`, `Date_cration`, `Date_update`, `ID_admin`, `ID_dep`) VALUES
(1, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', '1111', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parametre`
--

DROP TABLE IF EXISTS `parametre`;
CREATE TABLE IF NOT EXISTS `parametre` (
  `ID_par` int(11) NOT NULL AUTO_INCREMENT,
  `RC` varchar(250) DEFAULT NULL,
  `TCE` varchar(250) DEFAULT NULL,
  `IF` varchar(250) DEFAULT NULL,
  `capital` varchar(250) DEFAULT NULL,
  `site_web` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Tele` varchar(250) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `logo` longblob,
  PRIMARY KEY (`ID_par`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pointage`
--

DROP TABLE IF EXISTS `pointage`;
CREATE TABLE IF NOT EXISTS `pointage` (
  `ID_pointage` int(11) NOT NULL AUTO_INCREMENT,
  `Date-E` datetime DEFAULT NULL,
  `Date-S` datetime DEFAULT NULL,
  `ID_stagiaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_pointage`),
  KEY `fk_pointage_stagiaire` (`ID_stagiaire`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recuperer_poss`
--

DROP TABLE IF EXISTS `recuperer_poss`;
CREATE TABLE IF NOT EXISTS `recuperer_poss` (
  `ID_rec` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(250) DEFAULT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `Token` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_rec`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stagiaire`
--

DROP TABLE IF EXISTS `stagiaire`;
CREATE TABLE IF NOT EXISTS `stagiaire` (
  `ID_stagiaire` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) DEFAULT NULL,
  `Prenom` varchar(250) DEFAULT NULL,
  `Cin` varchar(250) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Image` longblob,
  `Tele` varchar(250) DEFAULT NULL,
  `Cv` longblob,
  `Username` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `ID_dep` int(11) DEFAULT NULL,
  `Mission` varchar(250) DEFAULT NULL,
  `Type_stage` varchar(250) DEFAULT NULL,
  `Date_D` date DEFAULT NULL,
  `Date_F` date DEFAULT NULL,
  `Date_creation` datetime DEFAULT NULL,
  `Date_update` date DEFAULT NULL,
  `ID_admin` int(11) DEFAULT NULL,
  `ID_employer` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_stagiaire`),
  KEY `fk_stagiaire_admin` (`ID_admin`),
  KEY `fk_stagiaire_employer` (`ID_employer`),
  KEY `fk_stagiaire_departements` (`ID_dep`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stagiaire`
--

INSERT INTO `stagiaire` (`ID_stagiaire`, `Name`, `Prenom`, `Cin`, `Address`, `Email`, `Image`, `Tele`, `Cv`, `Username`, `Password`, `ID_dep`, `Mission`, `Type_stage`, `Date_D`, `Date_F`, `Date_creation`, `Date_update`, `ID_admin`, `ID_employer`) VALUES
(53, 'test', 'test', '', 'test', 'test@gmail.com', 0x323032332d30382d3032, '0770692424', 0x32303233303632315f3230343034372e6a7067, 'safae', '1111', 1, '', '', '2023-08-02', '2023-08-02', NULL, '2023-08-02', NULL, NULL),
(86, ' s', '', '', '', '', '', '', '', '', '', NULL, '', '', '2023-08-02', NULL, '2023-08-02 00:00:00', '2023-08-02', NULL, NULL),
(87, 'test', 'test', '', 'test', 'test@gmail.com', '', '', '', '', '', NULL, '', '', '2023-08-02', NULL, '2023-08-02 00:00:00', '2023-08-02', NULL, NULL),
(88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, '', '', '', '', '', '', '', '', '', '', NULL, '', '', '2023-08-02', NULL, '2023-08-02 00:00:00', '2023-08-02', NULL, NULL),
(94, '', '', '', '', '', '', '', '', '', '', 53, '', '', '2023-08-03', NULL, '2023-08-03 00:00:00', '2023-08-03', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

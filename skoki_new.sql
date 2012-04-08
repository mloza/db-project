-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2012 at 10:05 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skoki_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `arbiter`
--

CREATE TABLE IF NOT EXISTS `arbiter` (
  `idSedziego` int(8) NOT NULL AUTO_INCREMENT,
  `imie` varchar(20) NOT NULL,
  `nazwisko` varchar(20) NOT NULL,
  `dataUrodzenia` date NOT NULL,
  `narodowosc` varchar(20) NOT NULL,
  PRIMARY KEY (`idSedziego`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `arbiter`
--

INSERT INTO `arbiter` (`idSedziego`, `imie`, `nazwisko`, `dataUrodzenia`, `narodowosc`) VALUES
(1, 'Stefan', 'Horngacher', '1969-09-20', 'Austria'),
(2, 'Werner', 'Schuster', '1969-09-04', 'Austria'),
(3, 'Kari', 'Ylianttila', '1953-08-28', 'Finlandia'),
(4, 'Christian', 'Remy', '1954-02-09', 'Francja'),
(5, 'Reihard', 'Hess', '1945-06-13', 'Niemcy'),
(6, 'Wolfgang', 'Steiert', '1963-04-19', 'Niemcy'),
(7, 'Piotr', 'Fijas', '1958-06-27', 'Polska'),
(8, 'Bernie', 'Schödler', '1971-10-01', 'Szwajcaria'),
(9, 'Corby', 'Fisher', '1975-07-20', 'USA'),
(10, 'Roberto', 'Cecon', '1971-12-28', 'Włochy'),
(11, 'Reinhard', 'Schwarzenberger', '1977-01-07', 'Austria'),
(12, 'Risto', 'Jussilainen', '1975-06-10', 'Finlandia'),
(13, 'Kakhaber', 'Tsakadze', '1969-01-28', 'Gruzja'),
(14, 'Yusuke', 'Kaneko', '1976-04-18', 'Japonia'),
(15, 'Hideharu', 'Miyahira', '1973-12-21', 'Japonia'),
(16, 'Henning', 'Stensrud', '1977-08-20', 'Norwegia'),
(17, 'Roar', 'Ljoekelsoey', '1976-05-31', 'Norwegia'),
(18, 'Wojciech', 'Skupień', '1976-03-09', 'Polska'),
(19, 'Wiesław', 'Pawluczak', '1912-09-14', 'Polska'),
(20, 'Jareyn', 'Karsakov', '1940-02-17', 'Ukraina');

-- --------------------------------------------------------

--
-- Table structure for table `arbiter_skocznia_sezon`
--

CREATE TABLE IF NOT EXISTS `arbiter_skocznia_sezon` (
  `idSkoczni` int(8) NOT NULL,
  `idSedziego` int(8) NOT NULL,
  `sezon` char(9) NOT NULL,
  `nazwa` varchar(60) NOT NULL,
  PRIMARY KEY (`idSkoczni`,`idSedziego`,`sezon`,`nazwa`),
  KEY `fk_sezon_arbiter` (`sezon`),
  KEY `fk_sedzia_arbiter` (`idSedziego`),
  KEY `nazwa` (`sezon`,`nazwa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `druzyna`
--

CREATE TABLE IF NOT EXISTS `druzyna` (
  `idDruzyny` int(8) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(60) NOT NULL,
  PRIMARY KEY (`idDruzyny`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `druzyna`
--

INSERT INTO `druzyna` (`idDruzyny`, `nazwa`) VALUES
(1, 'RG Churfirsten'),
(2, 'Skiclub Einsiedeln'),
(3, 'Skiclub Schaffhausen'),
(4, 'Wildhaus'),
(5, 'Lahdeskien Hiihtoseura'),
(6, 'Lahden Hiihtoseura'),
(7, 'Puijon Hiihtoseura'),
(8, 'Jyväskylän Hiihtoseura'),
(9, 'S.V. Oberwiesenthal'),
(10, 'Deutscher Skiverband'),
(11, 'SC Hinterzarten'),
(12, 'SC Furtwangen'),
(13, 'Lillehammerhopp'),
(14, 'Kollenhopp'),
(15, 'Trønderhopp'),
(16, 'Ringkollen Skiklubb'),
(17, 'LKS Poroniec Poronin'),
(18, 'TS Wisła Zakopane'),
(19, 'KS Wisła Ustronianka'),
(20, 'LKS Klimczok Bystra');

-- --------------------------------------------------------

--
-- Table structure for table `kombinezon`
--

CREATE TABLE IF NOT EXISTS `kombinezon` (
  `idKombinezonu` int(8) NOT NULL AUTO_INCREMENT,
  `idSprzetu` int(8) NOT NULL,
  `powierzchnia` int(8) NOT NULL,
  `material` varchar(48) NOT NULL,
  PRIMARY KEY (`idKombinezonu`),
  KEY `fk_sprzet_kombinezon` (`idSprzetu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `kombinezon`
--

INSERT INTO `kombinezon` (`idKombinezonu`, `idSprzetu`, `powierzchnia`, `material`) VALUES
(1, 29, 7300, 'phenix'),
(2, 30, 7300, 'phenix'),
(3, 31, 8672, 'phenix'),
(4, 32, 6781, 'diaplex'),
(5, 33, 7278, 'technobrane'),
(6, 34, 8200, 'pianka'),
(7, 35, 8900, 'pianka'),
(8, 36, 7300, 'strech'),
(9, 37, 7421, 'technobrane'),
(10, 38, 6000, 'technobrane'),
(11, 39, 7090, 'technobrane'),
(12, 40, 8900, 'diaplex'),
(13, 41, 7890, 'strech'),
(14, 42, 8230, 'technobrane'),
(15, 43, 8700, 'phenix'),
(16, 44, 6900, 'diaplex'),
(17, 45, 8500, 'phenix'),
(18, 46, 9001, 'pianka'),
(19, 47, 8030, 'diaplex'),
(20, 48, 6400, 'phenix'),
(21, 49, 6200, 'strech'),
(22, 50, 8090, 'technobrane'),
(23, 51, 8040, 'pianka'),
(24, 52, 8943, 'strech'),
(25, 53, 8730, 'diaplex'),
(26, 54, 9010, 'phenix'),
(27, 55, 6900, 'diaplex'),
(28, 56, 6800, 'pianka'),
(29, 57, 6030, 'diaplex');

-- --------------------------------------------------------

--
-- Table structure for table `nagroda`
--

CREATE TABLE IF NOT EXISTS `nagroda` (
  `idNagrody` int(8) NOT NULL AUTO_INCREMENT,
  `nazwaNagrody` varchar(80) NOT NULL,
  `wartosc` int(15) NOT NULL,
  PRIMARY KEY (`idNagrody`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `nagroda`
--

INSERT INTO `nagroda` (`idNagrody`, `nazwaNagrody`, `wartosc`) VALUES
(2, 'Puchar za pierwsze miejsce w zimowym Alpen Cup', 300000),
(3, 'Puchar za drugie miejsce w zimowym Alpen Cup', 200000),
(4, 'Puchar za trzecie miejsce w zimowym Alpen Cup', 100000),
(5, 'Puchar za pierwsze miejsce w letnim Alpen Cup', 300000),
(6, 'Puchar za drugie miejsce w letnim Alpen Cup', 200000),
(7, 'Puchar za trzecie  miejsce w letnim Alpen Cup', 100000),
(9, 'Puchar za pierwsze miejsce w Grand Prix Czterech Narodów', 500000),
(10, 'Puchar za drugie miejsce w Grand Prix Czterech Narodów', 300000),
(11, 'Puchar za trzecie miejsce w Grand Prix Czterech Narodów', 100000),
(12, 'Puchar za pierwsze miejsce w CoC kobiet', 100000),
(13, 'Puchar za drugie miejsce w CoC kobiet', 80000),
(14, 'Puchar za trzecie miejsce w CoC kobiet', 50000),
(15, 'Puchar za pierwsze miejsce w letnim pucharze kontynentalnym', 200000),
(16, 'Puchar za drugie miejsce w letnim pucharze kontynentalnym', 100000),
(17, 'Puchar za trzecie miejsce w letnim pucharze kontynentalnym', 80000),
(18, 'Puchar za pierwsze miejsce w letnim Grand Prix', 200000),
(19, 'Puchar za drugie miejsce w letnim Grand Prix', 150000),
(20, 'Puchar za trzecie miejsce w letnim Grand Prix', 100000),
(21, 'Samochód', 100000),
(22, 'Samochód', 80000),
(23, 'Samochód', 50000),
(24, 'Złoty medal Mistrzostw Polski', 400000),
(25, 'Srebrny medal Mistrzostw Polski', 300000),
(26, 'Brązowy  medal Mistrzostw Polski', 200000),
(27, 'Złoty medal Mistrzostw Świata', 800000),
(28, 'Srebrny medal Mistrzostw Świata', 700000),
(29, 'Brązowy medal Mistrzostw Świata', 500000),
(30, 'Złoty medal Mistrzostw Świata Juniorów', 400000),
(31, 'Srebrny medal Mistrzostw Świata Juniorów', 300000),
(32, 'Brązowy medal Mistrzostw Świata Juniorów', 100000),
(33, 'Złoty Puchar  Mistrzostw Świata w lotach ', 900000),
(34, 'Srebrny Puchar  Mistrzostw Świata w lotach ', 700000),
(35, 'Brązowy Puchar  Mistrzostw Świata w lotach ', 500000),
(36, 'Złoty skoczek pucharu kontynentalnego', 600000),
(37, 'Srebrny skoczek pucharu kontynentalnego', 400000),
(38, 'Brązowy skoczek pucharu kontynentalnego', 200000),
(39, 'Nagroda Pieniężna', 150000),
(40, 'Nagroda Pieniężna', 100000),
(41, 'Nagroda Pieniężna', 75000),
(42, 'Kryształowa Kula', 1000000),
(43, 'Srebrna Kula', 600000),
(44, 'Brązowa Kula', 300000),
(45, 'Mała Kryształowa Kula', 800000),
(46, 'Mała Srebrna Kula', 500000),
(47, 'Mała Brązowa Kula', 200000),
(48, 'Głowna nagroda Turnieju Czterech Skoczni', 2000000),
(49, 'Druga nagroda Turnieju Czterech Skoczni', 800000),
(50, 'Trzecia nagroda Turnieju Czterech Skoczni', 600000),
(51, 'Złoty Medal Skandynawski', 200000),
(52, 'Srebrny Medal Skandynawski', 150000),
(53, 'Brązowy Medal Skandynawski', 50000),
(54, 'Złoty medal Zimowych Igrzysk Olimpijskich', 600000),
(55, 'Srebrny medal Zimowych Igrzysk Olimpijskich', 400000),
(56, 'Brązowy medal Zimowych Igrzysk Olimpijskich', 200000),
(57, 'Złoty medal Drużynowych Mistrzostw Świata', 200000),
(58, 'Srebrny medal Drużynowych Mistrzostw Świata', 100000),
(59, 'Brązowy medal Drużynowych Mistrzostw Świata', 80000),
(60, 'Złoty medal Drużynowych Mistrzostw Świata Juniorów', 180000),
(61, 'Srebrny medal Drużynowych Mistrzostw Świata Juniorów', 80000),
(62, 'Brązowy medal Drużynowych Mistrzostw Świata Juniorów', 50000),
(63, 'Złoty puchar Drużynowych Mistrzostw Świata w Lotach', 300000),
(64, 'Srebrny puchar Drużynowych Mistrzostw Świata w Lotach', 200000),
(65, 'Brązowy puchar Drużynowych Mistrzostw Świata w Lotach', 100000),
(69, 'Puchar za pierwsze miejsce w drużynowym letnim pucharze kontynentalnym', 150000),
(70, 'Puchar za drugie miejsce w drużynowym letnim pucharze kontynentalnym', 120000),
(71, 'Puchar za trzecie miejsce w drużynowym letnim pucharze kontynentalnym', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `nagroda_druzyna`
--

CREATE TABLE IF NOT EXISTS `nagroda_druzyna` (
  `idNagrody` int(8) NOT NULL,
  `idDruzyny` int(8) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`idNagrody`,`idDruzyny`,`data`),
  KEY `fk_druzyna_nagroda` (`idDruzyny`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nagroda_druzyna`
--

INSERT INTO `nagroda_druzyna` (`idNagrody`, `idDruzyny`, `data`) VALUES
(61, 1, '2008-01-09'),
(69, 1, '2008-01-14'),
(59, 2, '2009-12-22'),
(60, 2, '2009-01-09'),
(60, 3, '2010-01-09'),
(63, 3, '2010-12-22'),
(58, 4, '2011-12-22'),
(61, 4, '2011-01-09'),
(60, 5, '2008-01-09'),
(64, 5, '2008-12-22'),
(58, 6, '2009-12-22'),
(62, 6, '2009-01-09'),
(61, 7, '2010-01-09'),
(64, 7, '2010-12-22'),
(59, 8, '2011-12-22'),
(60, 8, '2011-01-09'),
(62, 9, '2008-01-09'),
(65, 9, '2008-12-22'),
(70, 9, '2008-01-14'),
(61, 10, '2009-01-09'),
(69, 10, '2009-01-14'),
(62, 11, '2010-01-09'),
(65, 11, '2010-12-22'),
(69, 11, '2010-01-14'),
(62, 12, '2011-01-09'),
(70, 12, '2011-01-14'),
(63, 13, '2008-12-22'),
(71, 13, '2008-01-14'),
(57, 14, '2009-12-22'),
(70, 14, '2009-01-14'),
(71, 15, '2010-01-14'),
(69, 16, '2011-01-14'),
(71, 18, '2009-01-14'),
(70, 19, '2010-01-14'),
(57, 20, '2011-12-22'),
(71, 20, '2011-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `nagroda_skoczek`
--

CREATE TABLE IF NOT EXISTS `nagroda_skoczek` (
  `idSkoczka` int(8) NOT NULL,
  `idNagrody` int(8) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`data`,`idSkoczka`,`idNagrody`),
  KEY `idSkoczka` (`idSkoczka`),
  KEY `idNagrody` (`idNagrody`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nagroda_skoczek`
--

INSERT INTO `nagroda_skoczek` (`idSkoczka`, `idNagrody`, `data`) VALUES
(1, 2, '2008-12-20'),
(1, 30, '2009-11-19'),
(1, 42, '2009-12-02'),
(1, 36, '2009-12-18'),
(1, 45, '2009-12-21'),
(1, 16, '2010-05-19'),
(1, 42, '2011-12-02'),
(2, 18, '2008-06-01'),
(2, 54, '2008-11-21'),
(2, 37, '2008-12-18'),
(2, 46, '2008-12-21'),
(2, 52, '2008-12-25'),
(2, 4, '2009-12-07'),
(2, 47, '2009-12-21'),
(2, 10, '2011-01-30'),
(2, 31, '2011-11-19'),
(2, 3, '2011-11-30'),
(3, 15, '2008-05-23'),
(3, 6, '2008-08-03'),
(3, 44, '2008-12-02'),
(3, 3, '2008-12-20'),
(3, 19, '2009-06-04'),
(3, 50, '2009-12-26'),
(3, 9, '2010-02-01'),
(3, 32, '2010-11-19'),
(3, 29, '2011-11-26'),
(4, 9, '2008-01-20'),
(4, 20, '2010-06-10'),
(4, 50, '2011-12-26'),
(5, 16, '2009-05-22'),
(5, 52, '2009-12-25'),
(5, 6, '2010-08-16'),
(5, 42, '2010-12-02'),
(5, 17, '2011-05-28'),
(5, 19, '2011-06-07'),
(5, 36, '2011-12-18'),
(6, 29, '2008-11-26'),
(6, 35, '2008-11-26'),
(6, 45, '2008-12-21'),
(6, 6, '2009-07-29'),
(6, 2, '2010-12-19'),
(6, 27, '2011-11-26'),
(7, 30, '2008-11-19'),
(7, 49, '2008-12-26'),
(7, 7, '2009-07-29'),
(7, 2, '2009-12-07'),
(7, 36, '2010-12-18'),
(7, 20, '2011-06-07'),
(7, 47, '2011-12-21'),
(7, 53, '2011-12-25'),
(8, 17, '2008-05-23'),
(8, 32, '2009-11-19'),
(8, 27, '2009-11-26'),
(8, 44, '2009-12-02'),
(8, 42, '2010-12-02'),
(8, 47, '2010-12-21'),
(8, 53, '2010-12-25'),
(8, 49, '2010-12-26'),
(8, 7, '2011-07-02'),
(9, 5, '2008-08-03'),
(9, 55, '2008-11-21'),
(9, 37, '2009-12-18'),
(9, 19, '2010-06-10'),
(9, 28, '2010-11-26'),
(9, 34, '2010-11-26'),
(9, 4, '2010-12-19'),
(9, 11, '2011-01-30'),
(9, 17, '2011-05-28'),
(9, 42, '2011-12-02'),
(9, 46, '2011-12-21'),
(10, 20, '2008-06-01'),
(10, 20, '2009-06-04'),
(10, 7, '2010-08-16'),
(10, 52, '2010-12-25'),
(10, 6, '2011-07-02'),
(10, 30, '2011-11-19'),
(11, 10, '2008-01-20'),
(11, 32, '2011-11-19'),
(12, 31, '2008-11-19'),
(12, 38, '2008-12-18'),
(12, 49, '2009-12-26'),
(12, 30, '2010-11-19'),
(12, 3, '2010-12-19'),
(12, 37, '2011-12-18'),
(12, 51, '2011-12-25'),
(13, 11, '2008-01-20'),
(13, 32, '2008-11-19'),
(13, 9, '2009-01-04'),
(13, 18, '2009-06-04'),
(13, 48, '2009-12-26'),
(13, 29, '2010-11-26'),
(13, 35, '2010-11-26'),
(13, 48, '2010-12-26'),
(13, 48, '2011-12-26'),
(14, 16, '2008-05-23'),
(14, 17, '2008-05-23'),
(14, 28, '2008-11-26'),
(14, 34, '2008-11-26'),
(14, 42, '2008-12-02'),
(14, 28, '2009-11-26'),
(14, 3, '2009-12-07'),
(14, 53, '2009-12-25'),
(14, 31, '2010-11-19'),
(15, 25, '2008-02-23'),
(15, 47, '2008-12-21'),
(15, 10, '2009-01-04'),
(15, 22, '2009-02-20'),
(15, 53, '2009-12-25'),
(15, 23, '2010-02-16'),
(15, 25, '2010-02-22'),
(15, 44, '2010-12-02'),
(15, 38, '2010-12-18'),
(15, 4, '2011-11-30'),
(16, 23, '2008-02-01'),
(16, 26, '2008-02-23'),
(16, 56, '2008-11-21'),
(16, 50, '2008-12-26'),
(16, 11, '2009-01-04'),
(16, 25, '2009-02-23'),
(16, 29, '2009-11-26'),
(16, 27, '2010-11-26'),
(16, 33, '2010-11-26'),
(16, 50, '2010-12-26'),
(16, 23, '2011-02-12'),
(16, 18, '2011-06-07'),
(17, 21, '2008-02-01'),
(17, 19, '2008-06-01'),
(17, 4, '2008-12-20'),
(17, 26, '2009-02-23'),
(17, 31, '2009-11-19'),
(17, 38, '2009-12-18'),
(17, 22, '2010-02-16'),
(17, 26, '2011-02-22'),
(17, 38, '2011-12-18'),
(18, 23, '2009-02-20'),
(18, 11, '2010-02-01'),
(18, 26, '2010-02-22'),
(18, 17, '2010-05-19'),
(18, 45, '2010-12-21'),
(18, 21, '2011-02-12'),
(18, 24, '2011-02-22'),
(18, 5, '2011-07-02'),
(19, 22, '2008-02-01'),
(19, 24, '2008-02-23'),
(19, 17, '2008-05-23'),
(19, 7, '2008-08-03'),
(19, 27, '2008-11-26'),
(19, 33, '2008-11-26'),
(19, 43, '2008-12-02'),
(19, 36, '2008-12-18'),
(19, 51, '2008-12-25'),
(19, 48, '2008-12-26'),
(19, 21, '2009-02-20'),
(19, 24, '2009-02-23'),
(19, 5, '2009-07-29'),
(19, 42, '2009-12-02'),
(19, 46, '2009-12-21'),
(19, 51, '2009-12-25'),
(19, 10, '2010-02-01'),
(19, 21, '2010-02-16'),
(19, 24, '2010-02-22'),
(19, 17, '2010-05-19'),
(19, 18, '2010-06-10'),
(19, 5, '2010-08-16'),
(19, 37, '2010-12-18'),
(19, 46, '2010-12-21'),
(19, 51, '2010-12-25'),
(19, 9, '2011-01-30'),
(19, 22, '2011-02-12'),
(19, 25, '2011-02-22'),
(19, 16, '2011-05-28'),
(19, 28, '2011-11-26'),
(19, 2, '2011-11-30'),
(19, 44, '2011-12-02'),
(19, 45, '2011-12-21'),
(19, 52, '2011-12-25'),
(19, 49, '2011-12-26'),
(20, 12, '2008-12-30'),
(20, 40, '2009-01-17'),
(20, 12, '2009-12-09'),
(20, 41, '2010-01-17'),
(20, 13, '2010-12-12'),
(20, 40, '2011-01-17'),
(20, 12, '2011-12-01'),
(21, 40, '2008-01-17'),
(21, 13, '2008-12-30'),
(21, 39, '2010-01-17'),
(21, 12, '2010-12-12'),
(21, 39, '2011-01-17'),
(22, 39, '2008-01-17'),
(22, 41, '2009-01-17'),
(22, 14, '2009-12-09'),
(22, 40, '2010-01-17'),
(22, 14, '2010-12-12'),
(22, 13, '2011-12-01'),
(23, 41, '2008-01-17'),
(23, 14, '2008-12-30'),
(23, 39, '2009-01-17'),
(23, 13, '2009-12-09'),
(23, 41, '2011-01-17'),
(23, 14, '2011-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `narty`
--

CREATE TABLE IF NOT EXISTS `narty` (
  `idNart` int(8) NOT NULL AUTO_INCREMENT,
  `idSprzetu` int(8) NOT NULL,
  `dlugosc` int(8) NOT NULL,
  PRIMARY KEY (`idNart`),
  KEY `fk_sprzet_narty` (`idSprzetu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `narty`
--

INSERT INTO `narty` (`idNart`, `idSprzetu`, `dlugosc`) VALUES
(1, 1, 230),
(2, 2, 240),
(3, 3, 243),
(4, 4, 256),
(5, 5, 253),
(6, 6, 245),
(7, 7, 267),
(8, 8, 270),
(9, 9, 272),
(10, 10, 269),
(11, 11, 238),
(12, 12, 245),
(13, 13, 244),
(14, 14, 254),
(15, 15, 263),
(16, 16, 236),
(17, 17, 248),
(18, 18, 253),
(19, 19, 258),
(20, 20, 247),
(21, 21, 237),
(22, 22, 250),
(23, 23, 258),
(24, 24, 243),
(25, 25, 256),
(32, 26, 263),
(33, 27, 249),
(34, 28, 246);

-- --------------------------------------------------------

--
-- Table structure for table `pozostale`
--

CREATE TABLE IF NOT EXISTS `pozostale` (
  `idPozostalych` int(8) NOT NULL AUTO_INCREMENT,
  `idSprzetu` int(8) NOT NULL,
  `typ` enum('gogle','kask','buty') NOT NULL,
  PRIMARY KEY (`idPozostalych`),
  KEY `fk_sprzet_pozostale` (`idSprzetu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `pozostale`
--

INSERT INTO `pozostale` (`idPozostalych`, `idSprzetu`, `typ`) VALUES
(1, 58, 'kask'),
(2, 59, 'kask'),
(3, 60, 'kask'),
(4, 61, 'kask'),
(5, 62, 'kask'),
(6, 63, 'kask'),
(7, 64, 'kask'),
(8, 65, 'kask'),
(9, 66, 'kask'),
(10, 67, 'kask'),
(11, 68, 'kask'),
(12, 69, 'kask'),
(13, 70, 'kask'),
(14, 71, 'kask'),
(15, 72, 'kask'),
(16, 73, 'kask'),
(17, 74, 'kask'),
(18, 75, 'kask'),
(19, 76, 'kask'),
(20, 77, 'kask'),
(21, 78, 'kask'),
(22, 79, 'kask'),
(23, 80, 'kask'),
(24, 81, 'kask'),
(25, 82, 'kask'),
(26, 83, 'buty'),
(27, 84, 'buty'),
(28, 85, 'buty'),
(29, 86, 'buty'),
(30, 87, 'buty'),
(31, 88, 'buty'),
(32, 89, 'buty'),
(33, 90, 'buty'),
(34, 91, 'buty'),
(35, 92, 'buty'),
(36, 93, 'buty'),
(37, 94, 'buty'),
(38, 95, 'buty'),
(39, 96, 'buty'),
(40, 97, 'buty'),
(41, 98, 'buty'),
(42, 99, 'buty'),
(43, 100, 'buty'),
(44, 101, 'buty'),
(45, 102, 'buty'),
(46, 103, 'buty'),
(47, 104, 'buty'),
(48, 105, 'buty'),
(49, 106, 'buty'),
(50, 107, 'buty'),
(51, 108, 'gogle'),
(53, 109, 'gogle'),
(54, 110, 'gogle'),
(55, 111, 'gogle'),
(56, 112, 'gogle'),
(57, 113, 'gogle'),
(58, 114, 'gogle'),
(59, 115, 'gogle'),
(60, 116, 'gogle'),
(61, 117, 'gogle'),
(62, 118, 'gogle'),
(63, 119, 'gogle'),
(64, 120, 'gogle'),
(65, 121, 'gogle'),
(66, 122, 'gogle'),
(67, 123, 'gogle'),
(68, 124, 'gogle'),
(69, 125, 'gogle'),
(70, 126, 'gogle'),
(71, 127, 'gogle'),
(72, 128, 'gogle'),
(73, 129, 'gogle'),
(74, 130, 'gogle'),
(75, 131, 'gogle'),
(76, 132, 'gogle');

-- --------------------------------------------------------

--
-- Table structure for table `sezon`
--

CREATE TABLE IF NOT EXISTS `sezon` (
  `sezon` char(9) NOT NULL,
  `nazwaZawodow` varchar(60) NOT NULL,
  PRIMARY KEY (`sezon`,`nazwaZawodow`),
  KEY `fk_zawody_sezon` (`nazwaZawodow`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sezon`
--

INSERT INTO `sezon` (`sezon`, `nazwaZawodow`) VALUES
('2008', 'Alpen Cup'),
('2009', 'Alpen Cup'),
('2010', 'Alpen Cup'),
('2011', 'Alpen Cup'),
('2008', 'Alpen Cup Winter'),
('2009', 'Alpen Cup Winter'),
('2010', 'Alpen Cup Winter'),
('2011', 'Alpen Cup Winter'),
('2009', 'Drużynowe Mistrzostwa Świata'),
('2011', 'Drużynowe Mistrzostwa Świata'),
('2008', 'Drużynowe Mistrzostwa Świata Juniorów'),
('2009', 'Drużynowe Mistrzostwa Świata Juniorów'),
('2010', 'Drużynowe Mistrzostwa Świata Juniorów'),
('2011', 'Drużynowe Mistrzostwa Świata Juniorów'),
('2008', 'Drużynowe Mistrzostwa Świata w lotach'),
('2010', 'Drużynowe Mistrzostwa Świata w lotach'),
('2008', 'Drużynowy Letni Puchar Kontynentalny'),
('2009', 'Drużynowy Letni Puchar Kontynentalny'),
('2010', 'Drużynowy Letni Puchar Kontynentalny'),
('2011', 'Drużynowy Letni Puchar Kontynentalny'),
('2008', 'Grand Prix Czterech Narodów'),
('2009', 'Grand Prix Czterech Narodów'),
('2010', 'Grand Prix Czterech Narodów'),
('2011', 'Grand Prix Czterech Narodów'),
('2008', 'Letni CoC Kobiet'),
('2009', 'Letni CoC Kobiet'),
('2010', 'Letni CoC Kobiet'),
('2011', 'Letni CoC Kobiet'),
('2008', 'Letni Puchar Kontynentalny'),
('2009', 'Letni Puchar Kontynentalny'),
('2010', 'Letni Puchar Kontynentalny'),
('2011', 'Letni Puchar Kontynentalny'),
('2008', 'Letnia Grand Prix'),
('2009', 'Letnia Grand Prix'),
('2010', 'Letnia Grand Prix'),
('2011', 'Letnia Grand Prix'),
('2008', 'Lotos Cup'),
('2009', 'Lotos Cup'),
('2010', 'Lotos Cup'),
('2011', 'Lotos Cup'),
('2008', 'Mistrzostwa Polski'),
('2009', 'Mistrzostwa Polski'),
('2010', 'Mistrzostwa Polski'),
('2011', 'Mistrzostwa Polski'),
('2009', 'Mistrzostwa Świata'),
('2011', 'Mistrzostwa Świata'),
('2008', 'Mistrzostwa Świata Juniorów'),
('2009', 'Mistrzostwa Świata Juniorów'),
('2010', 'Mistrzostwa Świata Juniorów'),
('2011', 'Mistrzostwa Świata Juniorów'),
('2008', 'Mistrzostwa Świata w lotach'),
('2010', 'Mistrzostwa Świata w lotach'),
('2008', 'Puchar Kontynentalny'),
('2009', 'Puchar Kontynentalny'),
('2010', 'Puchar Kontynentalny'),
('2011', 'Puchar Kontynentalny'),
('2008', 'Puchar Kontynentalny Kobiet'),
('2009', 'Puchar Kontynentalny Kobiet'),
('2010', 'Puchar Kontynentalny Kobiet'),
('2011', 'Puchar Kontynentalny Kobiet'),
('2008', 'Puchar Świata'),
('2009', 'Puchar Świata'),
('2010', 'Puchar Świata'),
('2011', 'Puchar Świata'),
('2008', 'Puchar Świata Kobiet'),
('2009', 'Puchar Świata Kobiet'),
('2010', 'Puchar Świata Kobiet'),
('2011', 'Puchar Świata Kobiet'),
('2008', 'Puchar Świata w lotach'),
('2009', 'Puchar Świata w lotach'),
('2010', 'Puchar Świata w lotach'),
('2011', 'Puchar Świata w lotach'),
('2008', 'Turniej Czterech Skoczni'),
('2009', 'Turniej Czterech Skoczni'),
('2010', 'Turniej Czterech Skoczni'),
('2011', 'Turniej Czterech Skoczni'),
('2008', 'Turniej Skandynawski'),
('2009', 'Turniej Skandynawski'),
('2010', 'Turniej Skandynawski'),
('2011', 'Turniej Skandynawski'),
('2008', 'Zimowe Igrzyska Olimpijskie');

-- --------------------------------------------------------

--
-- Table structure for table `skoczek`
--

CREATE TABLE IF NOT EXISTS `skoczek` (
  `idSkoczka` int(8) NOT NULL AUTO_INCREMENT,
  `imie` varchar(48) NOT NULL,
  `nazwisko` varchar(48) NOT NULL,
  `informacje` text,
  `krajPochodzenia` varchar(48) NOT NULL,
  `dataUrodzenia` date NOT NULL,
  `plec` enum('kobieta','mężczyzna') NOT NULL,
  `dataSmierci` date DEFAULT NULL,
  PRIMARY KEY (`idSkoczka`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `skoczek`
--

INSERT INTO `skoczek` (`idSkoczka`, `imie`, `nazwisko`, `informacje`, `krajPochodzenia`, `dataUrodzenia`, `plec`, `dataSmierci`) VALUES
(1, 'Thomas', 'Morgenstern', 'Thomas Morgenstern to wielka gwiazda skoków narciarskich z Austrii. Z takim nazwiskiem nie miał innego wyjścia (tłum.: "poranna gwiazda"). Pochodzi ze sportowej rodziny. Jego dziadek był skoczkiem narciarskim, a wujek zdobył 7. miejsce na olimpiadzie w 1976 roku w slalomie. Ojciec także uprawiał narciarstwo. Thomas debiutował w Pucharze Świata w konkursie w Oberstdorfie na 51. Turnieju Czterech Skoczni. W swoim debiucie uzyskał wysokie, 9. miejsce! Wcześniej wielkie chwile przeżywał podczas konkursów Pucharu Kontynentalnego w Lahti i Libercu w grudniu 2002 roku. Austriak wygrał 3 konkursy z rzędu, a w czwartym zajął 2 miejsce. Jego motto życiowe to: "Bez ryzyka nie ma zabawy", a więc możemy się spodziewać po nim jeszcze wiele. Największymi jego osiągnięciami są: zwycięstwo na Mistrzostwach Świata Juniorów w Solleftei w 2003 roku oraz 1 miejsce w klasyfikacji generalnej Letniej Grand Prix 2003. Triumfował w konkursie PŚ w Libercu 11 stycznia 2003 roku oraz w lecie 2003 na Letniej Grand Prix w Hinterzarten.\r\nNa początku sezonu 2003/04 w Kuusamo maił bardzo groźnie wyglądający upadek. Zleciał na bulę uderzając kręgosłupem. Na szczęście kontuzja nie była aż tak groźna. Wyszedł z tego obronną ręką łamiąc jedynie palec i z lekkim wstrząsem mózgu. W kolejnych sezonach nadal zaliczał się do czołówki Pucharu Świata w 2005 roku zajmując 7 miejsce. Latem 2005 wygrał konkurs LGP w Courchevel i zajął 3 miejsce w klasyfikacji końcowej. W sezonie 2005/06 zdobył brązowy medal na Mistrzostwach Świata w lotach narciarskich na skoczni Kulm w Tauplitz/Bad Mitterndorf i jest to jego jeden z największych sukcesów w karierze. W Turynie na Olimpiadzie był 9-ty na K-95. Kilka dni później triumfował na skoczni K-125 i odniósł swój największy życiowy sukces, zdibywając złoto olimpijskie! Dwa dni później sięgnął po koeljne złoto, tym razem wraz z drużyną. Podczas Turnieju Skandynawskiego w Lillehammer wygrał swój drugi konkurs Pucharu Świata - po blisko 3 latach przerwy. Wygrał także cały cykl Turnieju Skandynawskiego. W sezonie 2006/07 zdobył brązowy medal na średniej skoczni na MŚ w Sapporo. Dołożył złoto w drużynie. Latem 2007 po raz drugi w swojej karierze wygrał Letnią Grand Prix, wygrywając po drodze zawody w Hinterzarten, Einsiedeln i Zakopanem. Znakomicie rozpoczął także sezon zimowy 2007/2008 od 6 zwycięstw w Kuusamo, Trondheim, Villach i Engelbergu. Łącznie zwyciężał aż 10 razy w tym sezonie. Między innymi tym zwycięstwom zawdzięcza zapewnienie sobie Pucharu Świata już na sześć konkursów indywidualnych przed zakończeniem sezonu. Swój wspaniały sezon przypieczętował złotym medalem na skoczni normalnej podczas MŚ w Oslo. Na dużej był drugi ze stratą zaledwie 0,3 punktu. ', 'Austria', '1986-10-30', 'mężczyzna', NULL),
(2, 'Martin', 'Koch', 'Martin Koch to jeden z najbardziej utalentowanych skoczków w Austrii. Pochodzi z rodziny sportowej. Jego matka jest bliską krewną Ernsta Vettoriego i Armina Koglera - dwóch wielkich skoczków austriackich sprzed lat. Martin w sezonie 2001/02 parę razy był bliski zwycięstwa w konkursie. Skończyło się jednak na dwóch drugich miejscach (w Japonii) i jednym trzecim (w Engelbergu). Martin urodził się i mieszka w Villach. Nigdy nie był postrzegany jako "wielki talent", a jego osiągnięcia przyćmiewała dobra forma rówieśnika - Stefana Kaisera. Udało mu się jednak udowodnić iż jest bardzo dobrym skoczkiem, dzięki czemu wziął udział w Igrzyskach Olimpijskich w Salt Lake City. Sezonu 2002/03 nie może jednak zaliczyć do udanych. W 2005 roku dość często występował w zawodach Pucharu Świata, jednak nie odniósł większych sukcesów. Jak zwykle dobrze spisywał się na skoczniach mamucich. Na MŚ do Oberstdorfu się nie załapał. Co nie udało się w 2005 roku, to przyszło w 2006, kiedy to Alexander Pointner powołał go na Mistrzostwa Świata w lotach na Kulm. Koch nie zawiódł. Kilkukrotnie lądował poza granicą 200 metrów i indywidualnie w konkursie zajął miejsce tuż za podium. Na Olimpiadzie w Turynie zdobył złoto w drużynie na K-125 w Pragelato.\r\nUlubiony kolor Martina to czarny, z potraw preferuje wszystko, co jest słodkie. Do jego ulubionych filmów zaliczają się m.in. „Braveheart” i „Pulp Fiction”. Jak sam mówi, lubi każdy rodzaj muzyki, ale generalnie woli „ciężkie granie” takie jak: Metallica, Kid Rock, S.O.A.D. czy Red Hot Chilli Peppers. Jego motto życiowe to: „Tylko martwe ryby płyną z prądem” oraz „Niech żyje rewolucja”…\r\nW sezonie 2007/2008 trzykrotnie stawał na podium PŚ: w Sapporo, Libercu i Planicy. W klasyfikacji generalnej PŚ zajął 14. miejsce, w Turnieju Czterech Skoczni był 20., a w Turnieju Skandynawskim – 10-ty. Podczas Mistrzostw Świata w lotach udowodnił, że jest „lotnikiem” i nieoczekiwanie indywidualnie wywalczył brązowy medal, zaś z kolegami z drużyny zdobył złoto. 16 marca 2008 roku podczas zawodów PŚ w Planicy ustanowił swój rekord życiowy - 229,5 m. W kolejnym sezonie Koch prezentował się bardzo dobrze. Najwyższe miejsce w PŚ, jakie wywalczył, to trzecie w Bad Miterndorf. Równa forma w całym sezonie pozwoliła mu na zajęcie 9-go miejsca w klasyfikacji PŚ. W osobnej klasyfikacji za loty uplasował się na piątej pozycji. ', 'Austria', '1982-01-22', 'mężczyzna', NULL),
(3, 'Manuel', 'Fettner', 'Manuel Fettner urodził się 17 czerwca 1985 roku w Austrii. 10 lutego 2001 roku wraz ze Schwarzenbergerem, Kochem i Kaiserem wygrał konkurs drużynowy w Neustadt (COC - Puchar Kontynentalny). Indywidualnie również był pierwszy. Jest to młody i obiecujący zawodnik. Brał już udział w turniejach Pucharu Świata. Okrzyknięto go następcą Goldiego. W tej chwili skacze najczęściej w CoC, a trener Austiraków rzadko korzysta z jego usług, ale na pewno w przyszłych sezonach jeszcze nie jedno usłyszymy o tym młodzieniaszku. Po udanym sezonie 2000/01 słychać było o nim coraz rzadziej. W 2005 roku wygrał dwa konkursy indywidualne na Uniwersjadzie w Seefeld/Innsbruck, oraz zdobył złoto z ekipą Austrii, jednocześnie będąc najlepszy w drużynie. Trzy złote medale dały mu ponowny awans do zawodów Pucharu Świata. ', 'Austria', '1985-06-17', 'mężczyzna', NULL),
(4, 'Andreas', 'Kofler', 'Andreas Kofler to jedna z największych nadziei austriackich skoków. Przebojem wdarł się do czołówki najlepszych skoczków. Zaczął podczas Letniego Grand Prix 2002 i podczas Pucharu Świata utrzymuje wysoką formę. Wcześniej bardzo dobrze spisywał się w Pucharze Kontynentalnym zajmując między innymi 1 miejsce na konkursie w Falun 2002. Przed Turniejem Czterech Skoczni 2002/03 zajmował miejsca na podium Pucharu Świata. Swoją wysoką formę udowodnił 4 miejscem w klasyfikacji końcowej 51. edycji TCS i był najwyżej sklasyfikowanym Austriakiem. W sezonie zimowym 2002/03 był najbardziej regularnym z Austriaków. Dwa lata później był totalnie bez formy. Wrócił do dobrego skakania w sezonie 2005/06. 4 lutego 2006 roku odniósł swoje pierwsze zwycięstwo w Pucharze Świata w niemieckim Willingen. Dwa tygodnie później odniósł swój największy sukces w karierze. Zdobył srebrny medal na Olimpiadzie w Turynie, na skoczni K-125. Przegrał z Thomasem Morgensternem zaledwie o 0,1 punktu! Dwa dni później wraz z kolegami zdobył złoto w drużynówce! W Turnieju Skandynawskim 2005/06 zajął wysoką, 4 lokatę. Latem 2006 zajął 3 miejsce w Letniej Grand Prix.\r\nSezon 2007/2008 zakończył na 13-stym miejscu, dwukrotnie jedynie zajmując miejsce na podium. Podczas konkursu Turnieju Czterech Skoczni w Oberstdorfie Kofi uległ bardzo groźnie wyglądającemu wypadkowi, ale na szczęście nic poważnego mu się nie stało. Sam wypadek odbił się na późniejszych występach i później Kofi punktował tylko w zawodach w Ga-Pa, a w całym Turnieju był 30-sty. Na MŚ w lotach w Oberstdorfie indywidualnie zajął 16. pozycję, a z drużyną zdobył złoty medal.\r\nBardzo dobrze rozpoczął sezon 2009/2010. Już na początku plasował się w czołówce zawodów, by wygrać pierwszy z konkursów TCS. Potem utrzymał przewagę w trzech kolejnych konkursach i odniósł jeden ze swoich największych sukcesów triumfując w klasyfikacji końcowej. W Oslo na MŚ w 2011 roku zdobył srebrny medal na skoczni normalnej.\r\nZnakomicie rozpoczął sezon 2011/12 zdobywając komplet punktów w trzech pierwszych konkursach Pucharu Świata. ', 'Austria', '1984-05-17', 'mężczyzna', NULL),
(5, 'Matti', 'Hautamäki', 'Matti urodził się 14 lipca 1981 roku w Oulu (Finlandia). Jego wzrost to 177 cm, a waga 60 kg. Skacze dla klubu Puijon Hiihtoseura. Ma dwóch braci: starszy - Jussi i młodszy - Hannu. Skakać zaczął w wieku 7 lat. Gra na gitarze, interesuje się szeroko pojętą muzyką (od rapu po heavy metal). Przyznaje, że uwielbia niezdrowe jedzenie, ale skoki narciarskie wymagają od niego samodyscypliny. Jego idolem jest Matti Nykaenen. Największym jego osiągnięciem jest brązowy medal w 2002 roku na olimpiadzie w Salt Lake City. Najlepszym sezonem dla tego zawodnika był sezon 2001/02 kiedy to oprócz medalu olimpijskiego wywalczył 3 miejsce w Pucharze Świata, 2 na Turnieju Czterech Skoczni i wygrał dwa konkursy PŚ, stając się jednym z największych rywali Hannawalda i Małysza. Od tej pory zaliczany jest do czołówki światowej. Po nieco słabszym starcie na początku sezonu 2002/03 odrodził się w lutym 2003 roku dwukrotnie triumfując w Mistrzostwach Finlandii. Potem podczas MŚ w Val di Fiemme był największym faworytem, po najlepszych wynikach na treningach. Na K-120 zajął ostatecznie 2 miejsce. W finale sezonu okazał się dwukrotnie najlepszy podczas konkursów lotów w Planicy, bijąc aż trzykrotnie rekord świata lądując ostatecznie na 231 metrze. W sezonie 2004/05 wygrał 6 konkursów Pucharu Świata i wyrównał rekord Ahonena, zajął ostatecznie 3 miejsce w klasyfikacji generalnej i wygrywając Turniej Skandynawski. W Planicy 2005 ponownie ustalił nowy rekord odległości (235,5 m), ale pokonał go Romoeren (239 m) i w tej chwili ma drugi najdalszy skok w historii skoków. Kolejne dwa konkursy PŚ wygrał w Zakopanem w sezonie 2005/06. Kilka tygodni później zdoby srebro na IO w Turynie na skoczni K-95. Na K-125 był piąty. Wraz z drużyną zdobył srebro na K-125.\r\nW sezonie 2007/2008 Matti zanotował wyraźny spadek formy. Najlepsze, 5. miejsce zajął w pierwszych zawodach w Kuusamo, potem było już gorzej. Startując w dwudziestu trzech konkursach PŚ, ani razu nie wygrał i ani razu nie zajął miejsca na podium. W klasyfikacji generalnej zgromadził 273 pkt. i ostatecznie zajął 19-ste miejsce. W Turnieju Czterech Skoczni zajął 13. pozycję, a w Turnieju Skandynawskim był 14. Podczas tegorocznych MŚ w lotach w niemieckim Oberstdorfie indywidualnie był 9., zaś z kolegami z drużyny wywalczył wicemistrzostwo świata. W kolejnym sezonie Matti zaczął powracać do formy. Dwukrotnie stawał na podium - był drugi w Trondheim i trzeci w Whistler. W Turnieju Czterech Skoczni zajął 9-te miejsce, a w Turnieju Skandynawskim był dziesiąty. Niestety Mistrzostw Świata w Libercu Matti nie będzie miło wspominał: na normalnej skoczni był 36-ty, na dużej 11-ty, a w konkursie drużynowym szósty. ', 'Finlandia', '1981-07-14', 'mężczyzna', NULL),
(6, 'Joonas', 'Ikonen', 'Joonas Ikonen jest niewątpliwie jednym z najbardziej utalentowanych młodych fińskich zawodników. Obok Olliego Pekkali stanowił trzon drużyny juniorów z Finlandii. Na swoim koncie zanotował kilka udanych występów w Pucharze Kontynentalnym (4 miejsce 04.12.2004 w Rovaniemi, 5 miejsce 29.01.2005 w Lauscha oraz 12.02.2005 w Brotterode). Jego pierwszy start w Pucharze Świata zakończył się uzyskaniem 25 miejsca, a co za tym idzie - zdobyciem pierwszych punktów do klasyfikacji generalnej. Ikonen stawiany był w gronie faworytów na Mistrzostwach Świata Juniorów w Rovaniemi w 2005 roku. Nie zawiódł! Wygrał, choć może mówić o szczęściu. Złoto zawdzięcza upadkowi Kamila Stocha. Awansował do kadry A w sezonie 2005/06 i spisywał się bardzo dobrze w zawodach Pucharu Świata. Potem zniknął na jakiś czas z zawodów międzynarodowych.', 'Finlandia', '1987-03-08', 'mężczyzna', NULL),
(7, 'Olli', 'Muotka', 'Olli Muotka urodził się i mieszka w Rovaniemi. Skacze dla tamtejszego klubu. Pasją do skoków zaraził go ojciec, który pracuje w klubie jako trener. Na arenie międzynarodowej zadebiutował w 2005 roku, ale z dobrej strony pokazał się dopiero dwa lata później na MŚ juniorów zajmując trzecie miejsce w drużynie. Indywidualnie był ósmy. Swój największy sukces osiągnął w Kuopio, gdzie wygrał zawody FIS Cup w 2008 roku. W kolekcji posiada również brązowy i srebrny medal Mistrzostw Finlandii, wywalczony w drużynie.', 'Finlandia', '1988-07-14', 'mężczyzna', NULL),
(8, 'Anssi', 'Koivuranta', 'Anssi Koivuranta do 2010 był odnoszącym sukcesy kombinatorem norweskim. Anssi jest brązowym medalistą olimpijskim w sztafecie, 2-krotnym medalistą mistrzostw świata. Zwycięzca siedmiu zawodów o Puchar Świata. Mistrz Świata juniorów w Gundersenie z Tarvisio z 2007 roku W sezonie 2008/2009 zdobywca kryształowej kuli. Jednak w 2010 roku zdiagnozowano u niego chorobę płuc uniemożliwiającą dalszą karierę w kombinacji norweskiej, w związku z czy zawodnik postanowił skupić się jedynie na skokach narciarskich. Ma również jeden z lepszych rekordów życiowych - 214,5 metra uzyskane w 2009 roku w Planicy, gdzie był przedskoczkiem. Ulubioną skocznią Anssiego jest obiekt w Lahti. Prywatnie spotyka się z fińską narciarką alpejską, Sanni Leinonen.\r\n\r\nPo dobrych skokach w FIS Cup i Pucharze Kontynentalnym szybko awansował do pierwszej kadry skoczków. Zadebiutował w konkursie PŚ w Kuopio, a punkty zdobył w Oberstdorfie - w systemie KO pokonał Kubackiego.', 'Finlandia', '1988-05-03', 'mężczyzna', NULL),
(9, 'Martin', 'Schmitt', 'Martin Schmitt - wielka gwiazda niemieckich skoków narciarskich urodził się 29 stycznia 1978 roku w Villingen (Niemcy). Mieszka w Tannheim. Jego stan cywilny to kawaler. Martin dobrze zna język angielski, skacze dla klubu SC Furtwangen. Jego hobby to oczywiście narty, koszykówka i street-hokej. Debiutował w 1984 roku, a na arenie międzynarodowej pokazał się w 1996 roku. Jego debiut w Mistrzostwach Świata nastąpił w 1997 roku w Innsbrucku, gdzie zdobył pierwsze swoje punkty do PŚ, jednak na podium stanął rok później w Lillehammer.\r\nMartin Schmitt jest dość pechowym zawodnikiem, miał już złamaną nogę i ramię. Także w sezonie 2000/2001 miał kłopoty w Letnim GP, a w zimowym sezonie złamał palec u ręki.\r\nDo jego największych osiągnięć należą 1 miejsce na dużej skoczni w Ramsau na Mistrzostwach Świata w 1999 roku. W roku 2000 był 6 w konkursie lotów narciarskich w Vilkersund. W sezonie 2000/01 dzielnie rywalizował z Andreasem Widhoelzlem o Puchar Świata i w Turnieju Czterech Skoczni. Wygrał Puchar Świata, niestety przegrał w Turnieju 4 Skoczni. Kolejne lata to walka o podium z Adamem Małyszem. Po odniesieniu kontuzji kolana w 2002 roku nie wziął udziału w Letniej Grand Prix. Sezon 2003/04 może uznać za dość udany, z kolei 2004/05 zupełnie mu się nie udał. Kompletnie stracił formę, tylko na MŚ w Oberstdorfie zmobilizował siły i pomógł drużynie w osiągnięciu srebrnego medalu.\r\nMartin nie odnalazł formy sprzed lat i dlatego w sezonie 2007/2008 również nie błyszczał. W 19-nastu konkursach zdobył 273 pkt, co zaowocowało odległym dziewiętnastym miejscem w klasyfikacji generalnej. Znacznie lepiej wypadł w Turnieju Czterech Skoczni, w którym był 8., w Turnieju Skandynawskim zajął jednak dopiero 24. pozycję. Na Mistrzostwach Świata w lotach był 18-sty, a z kolegami z drużyny zajął pechową czwartą lokatę. Odżył w sezonie 2008/09 plasując się często w czołówce, a nawet na podium. W TCS zajął 4 lokatę. Uwieńczeniem udanego sezonu był srebrny medal na MŚ w Libercu na dużej skoczni po jednoseryjnym konkursie. ', 'Niemcy', '1978-01-29', 'mężczyzna', NULL),
(10, 'Stephan', 'Hocke', 'Stefana Hocke zauważyliśmy po raz pierwszy podczas lata 2001. Był on najlepszym z reprezentantów Niemiec podczas zawodów w Sapporo i Hakubie. Takich osiągnięć nie mógł nie zauważyć óczesny trener Reinhard Hess. Powołał 18-latka, "Honka" jak go nazywają przyjaciele jako ósmego zawodnika do kadry Niemiec. Trener Hess, za jedną z wielkich zalet uważał jego umiejętność korygowania, eliminowania swoich błędów.\r\nPodczas pierwszego konkursu zimowego sezonu 2001/2002 w Kuopio udało mu się od razu wylądować w pierwszej dziesiątce! W Neustadt udowodnił, że dobry występ w Finlandii to nie przypadek, zajmując 5 miejsce wypełnił normę olimpijską. Z dnia na dzień młody maturzysta znalazł się w centrum zainteresowania. Nawet Fińskie gazety zainteresowały się wschodzącą gwiazdą niemieckich skoków narciarskich. Właśnie w Finlandii podczas 1 konkursu (7 miejsce) przez pomyłkę nazywano go "Locke" - jednak teraz wszyscy już znają chłopaka z Oberhofu w Turyndze.\r\nNajwiększymi jego sukcesam są: wygrana w Engelbergu w grudniu 2001 roku, 12 miejsce na Olimpiadzie w Salt Lake City na K-120. W sezonie 2003/04 wobec słabszej formy, skakał głównie w Pucharze Kontynentalnym. Do podstawowej kadry powrócił w sezonie 2004/05 zajmując nawet 5 lokatę w konkursie na nowo otwartej skoczni w Pragelato. W kolejnych sezonach na zmianę występował w CoC i PŚ. W tym pierwszym z sukcesami, w drugim wiodło mu się nieco gorzej. Dopiero cztery wygrane z rzędu konkursy Pucharu Kontynentalnego na początku sezonu 2008/09 pomogły mu wrócić na stałe do kadry A. Był mocnym punktem drużyny. W Zakopanem zajął nawet 11 miejsce. Na MŚ w Libercu wystąpił na obiekcie K-120 i zajął 12 lokatę. ', 'Niemcy', '1983-10-20', 'mężczyzna', NULL),
(11, 'Maximilian', 'Mechler', 'Maximilian Mechler urodził się 3 stycznia 1984 roku w Isny w Allgäu. Reprezentuje barwy tamtejszego. Debiut w Pucharze Świata zaliczył w Garmisch-Partenkirchen w 2000 roku. Może się pochwalić sukcesami w gronie juniorów. W 2001 roku w Karpaczu na MŚJ zdobył z niemiecką ekipą brązowy medal. \r\nWielokrotnie wygrywał konkursy Pucharu Alp - m.in. w Oberstdorfie, St.Moritz, Lauscha i Chaux Neuve. Dobrze spisywał się też w Pucharze Kontynentalnym, gdzie w 2002 roku wygrał jeden konkurs w Vikersund. W letniej Grand Prix 2003 zajął 1 miejsce podczas konkursu w Innsbrucku i jak do tej pory jest to jego największy sukces. Wtedy gwiazdy, Hannawald i Schmitt, borykały sie z problemami z dojściem do formy, a On jako najmłodszy zawodnik niemieckiej kadry A skakał dalej od nich nawet na treningach.\r\nMaximilian zaczął skakać w wieku pięciu lat. W tej chwili jest żołnierzem Bundeswehry, w 2002 roku zdał maturę z dobrym wynikiem. Ma jeden skonkretyzowany cel: "Zwycięstwo olimpijskie lub zdobycie tytułu mistrza świata to marzenia każdego skoczka". Wzrost 179 cm, waga 61 kg. W sezonie 2004/05 był pewnym punktem pierwszej reprezentacji. Rekord życiowy tego zawodnika to 200 m z Planicy w 2004 roku. W kolejnych sezonach Maxim nie odnosił sukcesów w PŚ i występował głównie w PK. W sezonie 2008/2009 wystartował w zawodach PŚ w Sapporo gdzie zdobył 8 pkt. Z kolei w PK szło mu znacznie lepiej - w miarę równe wyniki pozwoliły mu na zajęcie 19-tego miejsca w klasyfikacji generalnej. ', 'Niemcy', '1984-01-03', 'mężczyzna', NULL),
(12, 'Anders', 'Jacobsen', 'Jacobsen pierwszy start na arenie międzynarodowej zaliczył w 2003 roku w CoC w Planicy, gdzie był dopiero 50-ty. Pierwsze punkty zdobył dzień później plasując się na 30 miejscu. Lata 2004-2005 chciałby szybko zapomnieć. Na uwagę zasługuje tylko występ na FIS Cup w Villach gdzie był 4 i 5. Do końca 2005 roku pracował jako hydraulik, później zajął się wyłącznie skokami. Treningi zaczął w wieku ośmiu lat. W wieku 16 lat zaczął myśleć o skokach bardziej na poważnie, rozpoczął prawdziwe treningi, także siłowe. Jego mama jest nauczycielką, tata też uczy. Ma dwie siostry, starszą i młodszą.\r\nZrobiło się o nim głośno dopiero podczas Letniej Grand Prix 2006 w Hinterzarten. Wtedy Mika Kojonkoski dał mu szansę występu w światowej czołówce, a młody zawodnik wykorzystał swoją szansę i był w czołówce zawodów (8 miejsce). Jeszcze lepiej zaprezentował się tydzień później w Courchevel, gdzie zajął miejsce tuż za podium. Pierwszy wielki sukces osiągnął w Kuusamo, gdzie na otwarcie sezonu Pucharu Świata 2006/07 zajął 3 miejsce. Co prawda konkurs był bardzo dyskusyjny, a rządził raczej wiatr. Wszystkim sceptykom udowodnił wysoką formę w drugim konkursie w Lillehammer, gdzie uplasował się tylko za Schlierenzauerem. Podobnie, a nawet lepiej było w Engelbergu. Tam był drugi i pierwszy. Odniósł zatem swój największy sukces w karierze. Powtórzył to w Innsbrucku podczas TCS i dzięki temu wygrał całą edycję 55. Turnieju. W tym samym sezonie dołożył wygrane w konkursach PŚ w Vikersund i Willingen i w Pucharze Świata 2006/07 zajął 2 miejsce! Kolejną wygraną odnotował w Libercu w lutym 2008 roku. Na MŚ w lotach w Oberstdorfie wspólnie z drużyną zajął 3 miejsce. W sezonie 2008/09 kilka razy stawał na podium, a uwieńczeniem był srebrny medal drużynowo na MŚ w Libercu i brąz indywidualnie na dużej skoczni w jednoseryjnym konkursie.', 'Norwegia', '1985-02-17', 'mężczyzna', NULL),
(13, 'Fredrik', 'Bjerkeengen', 'Do tej pory Fredrik prezentuje się głównie w zawodach Pucharu Kontynentalnego, jednakże bez większych osiągnięć. Jedynie w Lillehammer udało mu się stanąć na 2. stopniu podium. Dwukrotnie stawał na najwyższym stopniu podium w zawodach FIS Racje w Westby. W kolekcji Fredrik posiada brązowy medal Mistrzostw Norwegii w skokach na małej skoczni. Prywatnie jest chłopakiem Norweskiej skoczki, Line Jahr.\r\n', 'Norwegia', '1988-11-11', 'mężczyzna', NULL),
(14, 'Akseli', 'Kokkonen', 'Akseli Kokkonen od dawna miał zadatki na dobrego skoczka - wzrost 172 cm, a waga 56 kg. Mimo, że urodził się w Norwegii (Oslo) jest reprezentantem Finlandii. Jego rodzice mieszkali tam przez 7 lat. W sezonie 2002/03 zajmował punktowane miejsca w Pucharze Świata, ale błysnął dopiero podczas Letniej Grand Prix i Pucharu Kontynentalnego w 2003 roku. W klasyfikacji generalnej LGP zajął 2 miejsce, a w COC - 6 lokatę.\r\nUczęszcza do szkoły sportowej w Lahti, a jego idolem jest starszy kolega z reprezentacji - Tami Kiuru. Uwielbia oglądać filmy z Seanem Connery i Roselyn Sanches. Szczególnie przypadły mu do gustu: The Truman Show, Cast Away i The Majestic.\r\nW sezonie 2003/04 zajął 19 miejsce w klasyfikacji końcowej PŚ, ale nie został uwzględniony w kadrze na MŚ w lotach w Planicy. Sezon 2004/05 był bardzo nieudany - wypadł z kadry na kilka miesięcy i właściwie stracił całą zimę. Postanowił zmienić obywatelstwo na norweskie i musiał czekać na jego przyznanie. Przez to stracił kilka sezonów startów. W 2008 roku uzyskał Norweskie obywatelstwo, w związku z czym zdecydował się na powrót do skoków. Obecnie znajduje się w norweskiej kadrze B. ', 'Norwegia', '1984-02-27', 'mężczyzna', NULL),
(15, 'Piotr', 'Zyła', 'Piotr Żyła skacze dla klubu KS Wisła Ustronianka. Do swoich sukcesów juniorskich można zaliczyć m.in. 1 miejsce na MP juniorów młodszych oraz złoty medal na letnim otwartym konkursie juniorów w Czechach. Od sezonu 2004/05 skacze w Pucharze Kontynentalnym. Najlepiej zaprezentował się w Braunlage, gdzie zajął 12 lokatę. Na MŚ juniorów w Rovaniemi wraz z kolegami zdobył srebrny medal, indywidualnie zaś był 14-ty. W sezonie 2005/06 dobrze skakał w zawodach FIS Cup, potem regularnie punktował w Pucharze Kontynentalnym, dzięki czemu dostał szansę występu w Pucharze Świata. Pojechał do Sapporo i w swoim debiucie zajął 19 lokatę, po I serii był nawet 8-my! Kilka dni później wygrał swój pierwszy konkurs CoC - w Villach. Od tamtej pory występował w CoC od czasu do czasu goszcząc w PŚ.\r\nPierwszy start na Mistrzostwach Świata w Sapporo nie może zaliczyć do udanych. Indywidualnie nie awansował do II serii w żadnym z konkursów, ale w drużynie zajął 5 miejsce. Kolejny sukces odniósł podczas LGP 2007 w Hakubie uzyskując 8 miejsce. W sezonie 2008/09 kilkukrotnie próbował sił w Pucharze Świata, punktował jednak tylko w Zakopanem. Na MŚ do Liberca zabrakło dla niego miejsca. W Pucharze Kontynentalnym 2007/2008 wziął udział jedynie w kilku konkursach, w których pokazał się z bardzo dobrej strony – miejsca ósme i piąte w Rovaniemi i Sapporo. Znacznie gorzej szło mu w Pucharze Świata - w żadnym z konkursów nie awansował do serii finałowej. W sezonie 2008/2009 jego najwyższe miejsce w PK to siódme w Vikersund. Piotr otrzymał szansę na starty w PŚ, ale niestety tylko w Zakopanem udało mu się punktować. Rekord życiowy Piotra to 202,5 m z Planicy z 2007 roku.', 'Polska', '1987-01-16', 'mężczyzna', NULL),
(16, 'Kamil', 'Stoch', 'Urodzony w 1987 roku Kamil Stoch jest uważany przez fachowców za następcę Adama Małysza. Zawodnik LKS Poroniec Poronin od sezonu 2003/2004 trenował w polskiej kadrze B pod czujnym okiem Heinza Kuttina i Łukasza Kruczka. Poza występami w Pucharze Kontynentalnym na swoim koncie miał skoki w Mistrzostwach Świata Juniorów w Solleftea (gdzie zajął 26 miejsce), a w krajowych zawodach ma na swoim koncie tytuł mistrza Polski w kategorii juniorów. Kiedy kadrę A objął Kuttin, Stoch awansował na skoczka, który regularnie pojawiał się w Pucharze Świata. Jego największym sukcesem było siódme miejsce podczas zawodów PŚ we włoskim Pragelato - Kamil uplasował się wtedy wyżej niż sam Adam Małysz!\r\nNa swoim koncie ma srebro w drużynowym konkursie na MŚJ w Strynie. Powtórzył ten sukces w 2005 roku w Rovaniemi. Złoto indywidualnie przegrał tylko przez nieszczęśliwy upadek w drugiej serii, ostatecznie zajmując 8 miejsce. Dobrze skakał też latem 2005 w Letniej Grand Prix, często plasując się w czołówce. W Hakubie zajął nawet 5 miejsce. W klasyfikacji końcowej był 11-ty! Na Olimpiadzie w Turynie na K-95 zajął 16 lokatę. Wraz z drużyną uplasował się na 5 miejscu. Podczas LGP 2006 nie szło mu jednak najlepiej. Najlepszy start zanotował w Kranju, gdzie był 8-my. Na MŚ w Sapporo odnotował duży sukces plasując się na 13 miejscu na K-120.\r\nPrzełomem był jego start w Oberhofie w LGP 2007. Tam odniósł swój wielki triumf wygrywając zawody. Było to pierwsze zwycięstwo innego skoczka niż Małysz od wielu lat, w najwyższej lidze! Ostatecznie zajął 12 miejsce w klasyfikacji końcowej LGP 2007. W konkursie MP na Wielkiej Krokwi w 2007 roku pod nieobecność Adama Małysza zdobył złoty medal. Dwa lata później w Wiśle w lutym 2009 zdobył ponownie złoto na MP, by tydzień później zająć 4 miejsce na MŚ w Libercu na skoczni normalnej. \r\n\r\nSwoje najlepsze występy zaliczył latem 2010 roku. Wygrał cały cykl Pucharu Kontynentalnego, a jednocześnie zajął 2. miejsce w klasyfikacji generalnej Letniej Grand Prix, trzykrotnie zwyciężając (Wisła, Hakuba, Klingenthal) i pokonując Adama Małysza. W PŚ 2010/11 znakomicie prezentował się w Zakopanem, gdzie po raz pierwszy wygrał zawody. Swój sukces powtórzył kilka dni później w Klingenthal. Dość niespodziewanie Kamil zwyciężył też na koniec sezonu w Planicy, gdzie stał na podium obok Adama Małysza.', 'Polska', '1987-05-25', 'mężczyzna', NULL),
(17, 'Stefan', 'Hula', 'Stefan Hula od sezonu 2004 awansował do kadry A. Wszystko dzięki Heinzowi Kuttinowi, który przejął naszą reprezentację, a wcześniej był jego trenerem w kadrze B. Razem osiągnęli spory sukces. To właśnie pod okiem Austriaka Hula był 13 na Mistrzostwach Świata juniorów indywidualnie, a wraz z drużyną zdobył srebro.\r\nHula urodził się w Szczyrku i skacze dla tamtejszego klubu SSR Sokół. Pierwsze kroki stawiał pod bacznym okiem ojca - byłego skoczka. Pierwszy dobry występ zaliczył w 1998 roku w corocznych zawodach FIS Schueler Cup w Garmisch-Partenkirchen (Niemcy), gdzie zajął 1 miejsce. Dość długo nie dostawał szansy występu w Pucharze Świata, ale tylko dlatego, że nie zdobył ani jednego punktu w Pucharze Kontynentalnym. Wreszcie udało mu się to w Harrachovie. Najpierw był podczas PŚ przedskoczkiem, a tydzień później, na tej samej skoczni zdobył pierwsze punkty CoC. Mimo nie najwyższej formy został powołany na ostatni konkurs Turnieju Czterech Skoczni 2004/05 w Bischofshofen. Niestety jego wyniki były bardzo słabe... Jego pierwszym sukcesem jest 13 miejsce na MŚ juniorów w Stryn w 2004 roku. Podczas PŚ w Zakopanem w 2006 roku zdobył swoje pierwsze punkty (21 i 22 lokata). Na Olimpiadzie w Turynie dostał szanse na K-95, gdzie zajął 29 miejsce. Na K-125 nie zmieścił się w kadrze, ale za to wziął udział w konkursie drużynowym, gdzie Polska zajęła wysoką - 5 lokatę. Na inauguracji PŚ 2006/07 zajął 12 lokatę!\r\nW sezonie 2007/2008 startował głównie w Pucharze Kontynentalnym, w którym wywalczył ostatecznie 38 miejsce. W klasyfikacji generalnej PŚ sezonu 2007/2008 był 72., zdobywając tylko 10 pkt. Stefan z pewnością na długo zapamięta swój nieudany skok na odległość 120 metrów podczas MŚ w lotach na mamuciej skoczni w Oberstdorfie. Jego skok pogrzebał szanse Polaków na awans do drugiej serii konkursu drużynowego. Na MŚ 2009 w Libercu dostał powołanie. Przyczynił się do uzyskania przez naszą drużynę 4 miejsca w konkursie teamów, skacząc lepiej od Małysza i zmywając plamę z Oberstdorfu. Początek sezonu nie był dla niego łaskawy, starty w PK wypadały poniżej oczekiwań, jednak Stefan otrzymał szansę na starty w PŚ. Wziął udział w jedenastu konkursach, jednak tylko w trzech udało mu się punktować. Po raz kolejny nie zawiódł w konkursie drużynowym i to między innymi jego skok (odbyła się tylko jedna seria) przyczynił się do wywalczenia przez reprezentację drugiego miejsca w Planicy. Rekord życiowy 205 m ustanowiony w Planicy 19 marca 2009.', 'Polska', '1986-09-29', 'mężczyzna', NULL),
(18, 'Robert', 'Mateja', 'Robert Mateja skakał dla klubu WKS Zakopane. Urodził się 5 października 1974 roku w Zakopanem, ale mieszka w Chochołowie. Z zawodu jest mechanikiem (blacharzem samochodowym). Jego hobby to futbol, muzyka i gry video. Wychowanek Franciszka Gronia-Gąsienicy. Jako skoczek zadebiutował w 1981 roku w wieku 7 lat, a w reprezentacji Polski znalazł się w roku 1994. Pierwszy start w Pucharze Świata to rok 1992 w Falun (Szwecja), jednak pierwsze punkty PŚ zdobył dopiero w 1996 roku w Lillehammer. Największym osiągnięciem tego skoczka jest 5 miejsce na skoczni normalnej w Trondheim w Mistrzostwach Świata w 1997 roku. Ponadto jest wielokrotnym Mistrzem Polski. Robert Mateja brał także udział w Igrzyskach Olimpijskich w Nagano, gdzie na dużej skoczni zajął 16 miejsce. Był także w składzie drużyny, która w Japonii zajęła 8 miejsce. Po słabszych kilku latach powrócił do formy podczas 53. Turnieju Czterech Skoczni w sezonie 2004/05. Punktował trzykrotnie i ostatecznie zajął wysokie 17 miejsce w klasyfikacji końcowej. W 2006 roku wraz z naszą drużyną zajął 5 miejsce w konkursie na K-125 na Olimpiadzie w Turynie. Po kolejnych słabych sezonach zdecydował się zakończyć karierę i zająć się trenerką.', 'Polska', '1974-10-05', 'mężczyzna', NULL),
(19, 'Adam', 'Małysz', 'były polski skoczek narciarski, multimedalista olimpijski, najbardziej utytułowany skoczek w historii indywidualnych konkursów mistrzostw świata w skokach narciarskich. Obecnie startuje w rajdach samochodowych.\r\nCzterokrotny medalista olimpijski, czterokrotny indywidualny mistrz świata, czterokrotny (w tym trzykrotny z rzędu) zdobywca Pucharu Świata, triumfator Turnieju Czterech Skoczni, trzykrotny zwycięzca Turnieju Nordyckiego, trzykrotny triumfator Letniego Grand Prix, zwycięzca Turnieju Czterech Narodów, zdobywca Pucharu KOP, dwudziestojednokrotny zimowy mistrz Polski, osiemnastokrotny letni mistrz Polski, były rekordzista Polski (230,5 m) i były współrekordzista świata w długości skoku narciarskiego (225 m). Czterokrotnie wybierany najlepszym sportowcem Polski. 3 marca 2011 zapowiedział koniec sportowej kariery po zakończeniu sezonu Pucharu Świata. 26 marca 2011 o godzinie 19:12 podczas benefisu Skoki do Celu w Zakopanem oddał ostatni skok w zawodowej karierze. Odznaczony przez Prezydenta Rzeczypospolitej Polskiej za wybitne osiągnięcia sportowe Krzyżem Komandorskim z Gwiazdą Orderu Odrodzenia Polski, Krzyżem Komandorskim OOP i Krzyżem Oficerskim OOP. Honorowy obywatel miasta Zakopanego.\r\nWe wszystkich 349 startach w Pucharze Świata zdobył łącznie 13070 punktów, punktując 307 razy, a 198 razy plasując się w pierwszej dziesiątce.\r\nZawodnika tego cechowało mocne odbicie w progu i bardzo niska pozycja po przejściu progu', 'Polska', '1977-12-03', 'mężczyzna', NULL),
(20, 'Anna', 'Haefele', 'Anna Haefele to jedna z czołowych zawodniczek niemieckiej kadry. Na swoim koncie ma wygrane w Ladies CoC w Vancouver i Park City. Zaliczyła też kilka podium w innych zawodach. Do jej największych sukcesów należą jednak: srebro na Mistrzostwach Świata Juniorów w Strbskim Plesie w 2009 roku oraz w tym samym roku 8 miejsce w pierwszych MŚ seniorek w Libercu. W Ladies CoC w sezonie 2008/09 zajęła 6 miejsce.', 'Niemcy', '1989-06-26', 'kobieta', NULL),
(21, 'Jenna', 'Mohr', 'Jenna Mohr urodziła się 15 kwietnia 1987 r. w Korbach. Skoki narciarskie uprawia od szóstego roku życia. Jak sama wspomina, jej koleżankę zachęcano do spróbowania swoich sił w tym sporcie, ale ta nie chciała zaczynać jako jedyna dziewczynka. Namówiła Jennę, której bardzo się to spodobało. Jenna trenuje na stałe w Willingen. W skokach jej mocna strona to odbicie, miewa natomiast problemy z techniką lotu. Oprócz tego sportu chętnie jeżdzi na snowboardzie i na rowerze. Lubi chodzić do kina i słuchać hip hopu. Jest zawodniczką, która cały czas znajduje się blisko ścisłej czołówki krajowej, ale nie udaje jej się do końca do niej przebić. Duże nadzieje wiązano z nią po jej 5. miejscu w Meinerzhagen w 2000 r., gdzie wprawdzie zawodniczek nie było jeszcze wiele, ale wiele było sporo starszych od Jenny. W Ladies CoC dwukrotnie była 5-ta w klasyfikacji końcowej, a na MŚ w Libercu zajęła 15 lokatę.', 'Niemcy', '1987-04-15', 'kobieta', NULL),
(22, 'Line', 'Jahr', 'Line Jahr urodziła się 16 stycznia 1984, skacze w klubie Vikersund IF. Do uprawiania tego sportu namówił ją starszy brat Thomas. Line jest jedną z najstarszych skoczek w drużynie norweskiej i jest uważana za wielki talent. Przeszła już do historii jako pierwsza dziewczyna, która została przyjęta do sekcji skoków elitarnego sportowego gimnazjum NTG w Lillehammer (do szkoły tej uczęszczał m.in. Lasse Ottesen). Do największych sukcesów Line należą dwa czwarte miejsca w klasyfikacji końcowej Ladies CoC w 2005 i 2006 roku, oraz 9 miejsce na MŚ w Libercu. ', 'Norwegia', '1984-01-16', 'kobieta', NULL),
(23, 'Anette', 'Sagen', 'Anette Sagen urodziła się 10 stycznia 1985 roku. Pochodzi z Gulljorda w północnej Norwegii, reprezentuje klub Remma IL. Do skakania namówili ją tata Ole - były skoczek, oraz starszy brat Snorre, który również uprawia tę dyscyplinę sportu. Anette zaczęła skakać przed ukończeniem dziesiątego roku życia, najpierw na zwykłych nartach alpejskich. Stopniowo przenosiła się na coraz większe obiekty. W sezonie 2000/2001 w swym pierwszym starcie w Mistrzostwach Norwegii Juniorów zdobyła dwa złote medale. Dziś jest najbardziej utytułowaną skoczkinią z Kraju Wikingów, a także na świecie.\r\nPoza skakaniem, Anette ma bardzo różnorodne zainteresowania. Uwielbia czytać książki, w szkole jej ulubionym przedmiotem jest norweski, ma też zacięcie dziennikarskie - pisuje artykuły do lokalnej gazety. Uprawia także kilka innych sportów - bardzo chętnie gra w golfa i w piłkę nożną - w swoim klubie ma stałą pozycję lewego pomocnika. Jej lekarstwem na tęsknotę jest... gra na flecie. To efekt pięcioletniej nauki w szkole muzycznej.\r\nAnette wygrała 5 razy z rzędu zimowy cykl Ladies CoC, udało się jej także zdobyć brązowy medal na MŚ w Libercu.', 'Norwegia', '1985-01-10', 'kobieta', NULL),
(24, 'Jacob', 'Thams', 'W latach 20'' XX wieku Thams należał do światowej czołówki skoczków narciarskich. 25 stycznia 1924 roku podczas igrzysk olimpijskich w Chamonix zdobył złoty medal w skokach narciarskich, wyprzedzając swojego rodaka Narve Bonnę, który był drugi oraz brązowego medalistę Andersa Haugena reprezentującego Stany Zjednoczone. Thams został tym samym pierwszym w historii mistrzem olimpijskim w skokach. Cztery lata później, na igrzyskach w Sankt Moritz w 1928 r. był faworytem do złotego medalu. Po pierwszej serii zajmował trzecie miejsce za swoim rodakami: Alfem Andersenem i Sigmundem Ruudem. W drugiej serii, na wniosek ekipy szwajcarskiej, podniesiono rozbieg, mimo protestów ze strony reprezentantów Norwegii oraz USA. Andersen i Ruud wybijali się z progu na stojąco, by nie osiągnąć zbyt dużej prędkości, jednak Thams zignorował niebezpieczeństwo i oddał skok na odległość 73 metrów, 9 metrów dalej niż którykolwiek z jego rywali. Skoku tego jednak nie ustał, przez co zajął ostatecznie 28 miejsce.\r\nW 1926 roku podczas mistrzostw świata w Lahti zdobył złoty medal na skoczni normalnej. Pozostałe miejsca na podium także zajęli Norwegowie: Thorleif Haug był drugi, a brąz wywalczył Einar Landvik. Był to jego jedyny start na mistrzostwach świata w narciarstwie klasycznym.\r\nPierwsze mistrzostwa Norwegii w skokach odbyły się w 1933 roku, wobec czego Thams startował w konkursach kombinacji norweskiej, wygrywając skoki do kombinacji w latach 1924-1927. Był jednakże przeciętnym biegaczem i ostatecznie jego najlepszym wynikiem było 12 miejsce w 1924 roku.\r\nW latach 30'' porzucił skoki narciarskie i zajął się żeglarstwem. Wziął udział w letnich igrzyskach olimpijskich w Berlinie w 1936 roku zdobywając srebrny medal w klasie 8mR. Jest drugim w historii sportowcem, który zdobył medale zarówno na letnich jak i zimowych igrzyskach olimpijskich. Pierwszy był Amerykanin Edward Eagan.\r\nZa swoje osiągnięcia w skokach narciarskich otrzymał Medalem Holmenkollen w 1926 roku.', 'Norwegia', '1898-04-07', 'mężczyzna', '1954-07-27'),
(25, 'Stanisław', 'Bobak', 'Polski skoczek narciarski, reprezentant Polski i klubu WKS Legia Zakopane, dwukrotny olimpijczyk, zdobywca trzeciego miejsca w klasyfikacji generalnej Pucharu Świata sezonu 1979/1980.\r\nStanisław Bobak należał do światowej czołówki w narciarskich skokach przełomu lat 70. i 80. W wielu konkursach walczył z Aschenbachem, czy Koglerem o czołowe lokaty. Stawał na podium zawodów z cyklu Turnieju Czterech Skoczni i zawodów Pucharu Świata. Wziął także udział w dwóch igrzyskach olimpijskich. Osiem razy zdobył mistrzostwo Polski. W swojej karierze oddał ponad 10 tysięcy skoków', 'Polska', '1956-12-03', 'mężczyzna', '2010-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `skoczek_druzyna`
--

CREATE TABLE IF NOT EXISTS `skoczek_druzyna` (
  `idSkoczka` int(8) NOT NULL,
  `idDruzyny` int(8) NOT NULL,
  PRIMARY KEY (`idSkoczka`,`idDruzyny`),
  KEY `fk_druzyna` (`idDruzyny`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skoczek_druzyna`
--

INSERT INTO `skoczek_druzyna` (`idSkoczka`, `idDruzyny`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(1, 2),
(2, 2),
(4, 2),
(1, 3),
(2, 3),
(3, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(6, 6),
(7, 6),
(8, 6),
(5, 7),
(7, 7),
(8, 7),
(5, 8),
(6, 8),
(7, 8),
(8, 8),
(9, 9),
(10, 9),
(11, 9),
(9, 10),
(10, 10),
(11, 10),
(9, 11),
(10, 11),
(11, 11),
(9, 12),
(10, 12),
(11, 12),
(12, 13),
(13, 13),
(14, 13),
(12, 14),
(13, 14),
(14, 14),
(12, 15),
(13, 15),
(14, 15),
(12, 16),
(13, 16),
(14, 16),
(15, 17),
(16, 17),
(18, 17),
(19, 17),
(16, 18),
(17, 18),
(18, 18),
(19, 18),
(15, 19),
(17, 19),
(18, 19),
(15, 20),
(16, 20),
(17, 20),
(18, 20);

-- --------------------------------------------------------

--
-- Table structure for table `skoczek_trener`
--

CREATE TABLE IF NOT EXISTS `skoczek_trener` (
  `idTrenera` int(8) NOT NULL,
  `idSkoczka` int(8) NOT NULL,
  `od` date NOT NULL,
  `do` date DEFAULT NULL,
  PRIMARY KEY (`idTrenera`,`idSkoczka`),
  KEY `fk_skoczek` (`idSkoczka`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skoczek_trener`
--

INSERT INTO `skoczek_trener` (`idTrenera`, `idSkoczka`, `od`, `do`) VALUES
(1, 1, '2008-01-01', NULL),
(2, 2, '2000-05-01', NULL),
(2, 3, '2003-01-01', NULL),
(2, 4, '2003-01-01', NULL),
(3, 5, '2010-01-01', NULL),
(4, 6, '2004-01-01', NULL),
(5, 7, '2007-01-01', NULL),
(6, 8, '2010-01-01', NULL),
(7, 8, '2010-01-01', NULL),
(8, 9, '1998-01-01', NULL),
(9, 10, '1997-01-01', NULL),
(9, 11, '2000-01-01', NULL),
(10, 12, '2003-01-13', NULL),
(11, 13, '2005-01-01', NULL),
(11, 14, '2003-01-01', NULL),
(12, 15, '2004-01-01', NULL),
(13, 16, '2008-07-01', NULL),
(13, 17, '2008-01-01', NULL),
(14, 18, '1985-01-01', '2008-01-01'),
(15, 20, '2003-01-04', NULL),
(15, 21, '2008-01-01', NULL),
(16, 22, '1997-01-01', NULL),
(16, 23, '1999-01-01', NULL),
(17, 24, '1922-01-01', '1930-01-01'),
(18, 25, '1970-01-01', '1983-01-01'),
(19, 5, '2008-01-01', '2010-01-01'),
(20, 5, '2002-01-01', '2008-01-01'),
(21, 5, '1999-01-01', '2002-01-01'),
(22, 16, '1996-01-01', '2008-07-01'),
(23, 17, '1996-01-01', '2008-01-01'),
(24, 19, '1984-01-01', '1998-01-01'),
(25, 19, '1998-01-01', '2004-03-14'),
(26, 19, '2004-03-14', '2011-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `skocznia`
--

CREATE TABLE IF NOT EXISTS `skocznia` (
  `idSkoczni` int(8) NOT NULL AUTO_INCREMENT,
  `punktKonstrukcyjny` int(3) NOT NULL,
  `miasto` varchar(30) NOT NULL,
  `nazwa` varchar(30) NOT NULL,
  `rekordSkoczni` double(5,2) NOT NULL,
  PRIMARY KEY (`idSkoczni`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `skocznia`
--

INSERT INTO `skocznia` (`idSkoczni`, `punktKonstrukcyjny`, `miasto`, `nazwa`, `rekordSkoczni`) VALUES
(1, 125, 'Garmisch-Partenkirchen', 'Olimpijska', 143.50),
(2, 185, 'Oberstdorf ', 'im. Heiniego Klopfera', 225.50),
(3, 120, 'Oberstdorf', 'Schattenberg', 143.50),
(4, 105, 'Brotterode', 'Grosse Inselsberg', 123.50),
(5, 120, 'Innsbruck', 'Bergisel', 134.50),
(6, 125, 'Bischofshofen', 'im. P.Ausserleitnera', 145.00),
(7, 185, 'Tauplitz', 'Kulm', 215.50),
(8, 123, 'Lillehammer', 'Lysgaardsbakken', 146.00),
(9, 120, 'Oslo', 'Holmenkollen', 141.00),
(10, 120, 'Rena', 'Renabakken', 140.00),
(11, 120, 'Trondheim', 'Granasen', 141.00),
(12, 195, 'Vikersund', 'Skiflygingsbakke', 246.50),
(13, 120, 'Kuusamo-Ruka', 'Rukatunturi', 148.00),
(14, 116, 'Lahti', 'Salpausselkä', 135.50),
(15, 125, 'Klingenthal ', 'Vogtland Arena', 146.50),
(16, 120, 'Zakopane', 'Wielka Krokiew', 140.50),
(17, 95, 'Szczyrk', 'Skalite', 107.00),
(18, 125, 'Engelberg', 'Gross-Titlis', 141.00),
(19, 105, 'Einsiedeln', 'Nationale Anlage', 120.50),
(20, 120, 'Hakuba', 'Olimpijska', 137.00),
(21, 90, 'Sapporo', 'Miyanomori', 102.50),
(22, 125, 'Vancouver', 'Olimpijska', 149.00),
(23, 185, 'Harrachov', 'Čertak', 214.50),
(24, 120, 'Liberec', 'Ještěd', 139.00),
(25, 185, 'Planica', 'Letalnica', 239.00),
(26, 95, 'Hinterzarten', 'Adlerschanze', 112.50),
(27, 125, 'Pragelato', 'Trampolino a Monte', 144.00),
(28, 120, 'Courchevel', 'Tremplin Le Praz', 137.00);

-- --------------------------------------------------------

--
-- Table structure for table `sprzet`
--

CREATE TABLE IF NOT EXISTS `sprzet` (
  `idSprzetu` int(8) NOT NULL AUTO_INCREMENT,
  `idSkoczka` int(8) NOT NULL,
  `firma` varchar(48) NOT NULL,
  `model` varchar(48) NOT NULL,
  `waga` double(3,2) NOT NULL,
  PRIMARY KEY (`idSprzetu`),
  KEY `fk_skoczek_sprzet` (`idSkoczka`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=133 ;

--
-- Dumping data for table `sprzet`
--

INSERT INTO `sprzet` (`idSprzetu`, `idSkoczka`, `firma`, `model`, `waga`) VALUES
(1, 1, 'Elan', 'GS WFlex Fus', 5.00),
(2, 2, 'Elan', 'Speed Magic Fus', 4.80),
(3, 3, 'Elan', 'Waveflex 78 Fus', 4.70),
(4, 4, 'Elan', 'Waveflex 10 Fus', 5.12),
(5, 5, 'Elan', 'Mystic Mag Fus', 6.12),
(6, 6, 'Atomic', ' D2 Race GS', 4.82),
(7, 7, 'Atomic', 'D2 VC 75', 6.80),
(8, 8, 'Atomic', 'D2 Race SL', 5.43),
(9, 9, 'Atomic', 'D2 VF 75', 4.80),
(10, 10, 'Atomic', 'Cloud D2 75', 4.80),
(11, 11, 'Blizzard ', ' M-Power FS', 6.65),
(12, 12, 'Blizzard ', ' R-Power FSu', 7.09),
(13, 13, 'Blizzard ', ' R-Power FS', 5.23),
(14, 14, 'Blizzard ', 'S-Power FS', 6.42),
(15, 15, 'Blizzard ', 'G-Power Full Suspension', 5.98),
(16, 16, 'Dynastar ', 'Legend Big Dump', 4.82),
(17, 17, 'Dynastar ', 'Legend Pro Rider 115', 5.90),
(18, 18, 'Dynastar ', 'Speed Course Wc', 6.10),
(19, 19, 'Dynastar ', ' Speed Limited', 5.12),
(20, 20, 'Dynastar ', 'Contact 4x4', 5.32),
(21, 21, 'Salomon ', ' X-Wing Enduro', 7.13),
(22, 22, 'Salomon  ', '3V Race', 4.78),
(23, 23, 'Salomon ', 'Mustang', 6.49),
(24, 24, 'Salomon ', 'X-Wing Torn', 4.98),
(25, 25, 'Salomon  ', 'Enduro XT850', 5.73),
(26, 10, 'K2', 'AfterShock', 4.70),
(27, 18, 'K2', 'Charger', 5.70),
(28, 6, 'K2', 'Coomback', 5.71),
(29, 1, 'Colmar', 'MD2001F', 0.76),
(30, 2, 'Colmar', 'MD2002F', 0.89),
(31, 3, 'Colmar', 'MD2001F ', 1.15),
(32, 4, 'Colmar', 'MDPS01F ', 0.88),
(33, 5, 'Colmar', 'MD2001FG', 1.09),
(34, 6, 'Spyder', ' Performance GS', 1.20),
(35, 7, 'Spyder', 'Performance D3', 0.82),
(36, 8, 'Spyder', 'Performance P1', 0.99),
(37, 9, 'Spyder', 'Performance SD7', 1.23),
(38, 10, 'Spyder', 'Performance 9IY4', 0.89),
(39, 11, 'Descente ', 'Swiss', 0.89),
(40, 12, 'Descente ', 'BF Bip', 1.25),
(41, 13, 'Descente ', 'BF Bips', 1.18),
(42, 14, 'Descente', 'Winnipeg', 1.19),
(43, 15, 'Descente', 'Woodward', 1.20),
(44, 16, 'Westscout', 'PTW 452 ', 0.92),
(45, 17, 'Westscout', ' PTW 451', 1.17),
(46, 18, 'Westscout', 'GKW 460', 1.13),
(47, 19, 'Westscout', 'GKM 108', 0.93),
(48, 20, 'Westscout', 'GKM 436 ', 1.09),
(49, 21, 'Phenix', 'Sogne ', 0.99),
(50, 22, 'Phenix', 'Laser Beam', 1.26),
(51, 23, 'Smart', 'MD2002F', 1.09),
(52, 24, 'Phenix', 'Proline', 0.79),
(53, 25, 'Phenix', 'Expert Elega', 1.14),
(54, 11, 'Descente ', 'Sw Control', 0.89),
(55, 12, 'Descente ', 'RF SG500', 1.22),
(56, 13, 'Power', 'ALL 340', 1.28),
(57, 14, 'WinterStyle', 'WINTER 32DS', 1.22),
(58, 1, 'Bogner', 'Bamboo', 0.50),
(59, 2, 'Bogner', 'Racing ', 0.60),
(60, 3, 'Bogner', 'Bamboo', 0.50),
(61, 4, 'Bogner', 'Pure', 0.55),
(62, 5, 'Bogner', 'Color', 0.45),
(63, 6, 'Carrera', 'Crown', 0.43),
(64, 7, 'Carrera', 'Desire', 0.61),
(65, 8, 'Carrera', 'Desire', 0.51),
(66, 9, 'Carrera', 'SIN-98', 0.53),
(67, 10, 'Carrera', 'Makani', 0.49),
(68, 11, 'Dainese', 'Enjoy Metallic', 0.50),
(69, 12, 'Dainese', 'Air Flex Evo', 0.60),
(70, 13, ' Dainese', ' Air Flex Evo', 0.49),
(71, 14, ' Dainese', 'V-Jet Touch', 0.60),
(72, 15, ' Dainese', 'V-Jet AIr', 0.51),
(73, 16, 'Uvex', ' F-Ride', 0.52),
(74, 17, 'Uvex', ' Boss Race', 0.60),
(75, 18, 'Uvex', 'Boss CC', 0.55),
(76, 19, 'Uvex', 'X-Ride Motion', 0.50),
(77, 20, 'Uvex', ' X-Ride Motion', 0.50),
(78, 21, 'Rossignol', 'Attraxion', 0.57),
(79, 22, 'Rossignol', 'Toxic', 0.63),
(80, 23, 'Rossignol', 'Saphir', 0.49),
(81, 24, 'Rossignol', 'Z8', 0.48),
(82, 25, 'Rossignol', 'Air -T500', 0.58),
(83, 1, 'Tecnica', 'Demon 100 Air Shell', 1.09),
(84, 2, 'Tecnica', 'Demon 100 Air Shell', 1.09),
(85, 3, 'Tecnica', 'Phoenix Max 10 Air Shell', 1.14),
(86, 4, 'Tecnica', ' Viva Phoenix 12 Air Shell', 1.20),
(87, 5, 'Tecnica', 'Phoenix 10 Air Shell D2', 1.10),
(88, 6, 'Rossignol', 'ALIAS SENSOR 80', 0.90),
(89, 7, 'Rossignol', 'Xena X50', 0.98),
(90, 8, 'Rossignol', 'Experience Sensor2 120', 1.00),
(91, 9, 'Rossignol', 'Zenith SENSOR 3 100', 1.02),
(92, 10, 'Rossignol', 'ALIAS SENSOR 70', 0.89),
(93, 11, 'Rossignol', 'Alias Sensor 90 2011', 1.20),
(94, 12, 'Salomon', '11/12 Mission RS 7', 1.10),
(95, 13, 'Salomon', 'Quest Access 70 11/12', 1.09),
(96, 14, 'Salomon', 'Rx 100 Lv 11/12', 1.50),
(97, 15, 'Salomon', 'Mission RS 8', 0.87),
(98, 16, 'Salomon', '11/12 Quest 10', 0.88),
(99, 17, 'Salomon', 'Aspire 55 10/11', 0.98),
(100, 18, 'Head', ' Adapt Edge 90 11/12', 1.01),
(101, 19, 'Head', ' Adapt Edge 80 11/12', 1.00),
(102, 20, 'Head', 'Vector 100', 1.30),
(103, 21, 'Head', 'Vector 200-R2', 1.10),
(104, 22, 'Head', 'B-Tech Lite', 1.22),
(105, 23, 'Atomic', 'Demon 100T7', 1.09),
(106, 24, 'Dalbello', 'Air Shell WK700', 1.05),
(107, 25, 'Dalbello', 'Demon Maxivv7', 1.03),
(108, 1, 'Anon', 'Realm Print', 0.10),
(109, 2, 'Anon', 'Solace Print', 0.10),
(110, 3, 'Anon', 'Solace Print PT7T3', 0.15),
(111, 4, 'Anon', 'Figment Emblem', 0.12),
(112, 5, 'Anon', 'Hawkeye Print', 0.14),
(113, 6, 'Anon', 'Hawkeye Print FT78-11', 0.15),
(114, 7, 'Anon', 'Majestic Print', 0.10),
(115, 8, 'Anon', 'Figment Print', 0.10),
(116, 9, 'GaryFisher', 'Alpha', 0.17),
(117, 10, 'GaryFisher', 'Vie 300', 0.14),
(118, 11, 'GaryFisher', 'Alpha T100', 0.13),
(119, 12, 'Quiksilver', 'Q2 M', 0.14),
(120, 13, 'Quiksilver', 'QS-500', 0.17),
(121, 14, 'Quiksilver', 'Eclipse M', 0.12),
(122, 15, 'Quiksilver', 'Eclipse M-90', 0.12),
(123, 16, 'Vonzipper', 'Dojo M', 0.11),
(124, 17, 'Vonzipper', 'Dojo M-20', 0.16),
(125, 18, 'Vonzipper', 'Bushwick M', 0.14),
(126, 19, 'Vonzipper', 'Bushwick M-1', 0.17),
(127, 20, 'Vonzipper', 'Bushwick M2-2', 0.15),
(128, 21, 'Vonzipper', 'BR-K2', 0.15),
(129, 22, 'Dragon', 'Mace', 0.15),
(130, 23, 'Dragon', 'DXS', 0.11),
(131, 24, 'Dragon', 'DVC-duo', 0.19),
(132, 25, 'Dragon', 'M100-X', 0.10);

-- --------------------------------------------------------

--
-- Table structure for table `trener`
--

CREATE TABLE IF NOT EXISTS `trener` (
  `idTrenera` int(8) NOT NULL AUTO_INCREMENT,
  `imie` varchar(48) NOT NULL,
  `nazwisko` varchar(48) NOT NULL,
  `odKiedy` date NOT NULL,
  `dataUrodzenia` date NOT NULL,
  `dataSmierci` date DEFAULT NULL,
  PRIMARY KEY (`idTrenera`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `trener`
--

INSERT INTO `trener` (`idTrenera`, `imie`, `nazwisko`, `odKiedy`, `dataUrodzenia`, `dataSmierci`) VALUES
(1, 'Heinz', 'Kuttin', '2003-01-20', '1971-01-05', NULL),
(2, 'Alexander', 'Pointer', '2000-09-01', '1971-01-01', NULL),
(3, 'Pekka', 'Niemelä', '1997-02-01', '1974-06-03', NULL),
(4, 'Semi', 'Leskinen', '1999-04-01', '1967-04-27', NULL),
(5, 'Jukka', 'Ylipulli', '1992-07-01', '1963-02-06', NULL),
(6, 'Ali', 'Koivuranta', '1999-10-01', '1970-07-30', NULL),
(7, ' Ari', 'Pekka-Nikola', '2003-09-01', '1969-05-16', NULL),
(8, 'Peter', 'Rohwein', '2000-12-01', '1962-06-26', NULL),
(9, 'Rainer', 'Schmidt', '1990-01-01', '1948-08-01', NULL),
(10, 'Gjermund', 'Lunner', '1989-03-01', '1959-11-09', NULL),
(11, 'Aril', 'Carlsson', '2001-02-01', '1963-05-17', NULL),
(12, 'Krzysztof', 'Sobański', '2003-04-01', '1970-08-18', NULL),
(13, 'Łukasz', 'Kruczek', '2008-03-28', '1975-11-01', NULL),
(14, 'Stanisław', 'Murzyniak', '1981-02-01', '1954-09-14', NULL),
(15, 'Jörg', 'Pietschmann', '2002-02-01', '1971-10-27', NULL),
(16, 'Geir', 'Johnsen', '1987-03-01', '1955-06-28', NULL),
(17, 'Thorleif', 'Haug', '1921-01-01', '1888-02-27', '1961-09-27'),
(18, 'Janusz', 'Fortecki', '1969-01-01', '1932-12-23', NULL),
(19, 'Janne', 'Väätäinen', '2003-03-01', '1975-03-06', NULL),
(20, 'Tommi', 'Nikunen', '1998-02-01', '1973-12-10', NULL),
(21, 'Mika', 'Kojonkowski', '1996-01-01', '1963-04-01', NULL),
(22, 'Zbigniew', 'Klimowski', '1994-01-01', '1967-01-18', NULL),
(23, 'Stefan', 'Hula (senior)', '1978-01-01', '1947-09-12', NULL),
(24, 'Jan', 'Szturc', '1984-01-01', '1958-09-17', NULL),
(25, 'Apoloniusz', 'Tajner', '1979-01-01', '1954-04-17', NULL),
(26, 'Hannu', 'Lepistö', '1999-01-01', '1946-05-17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wynik`
--

CREATE TABLE IF NOT EXISTS `wynik` (
  `idSkoczka` int(8) NOT NULL,
  `sezon` char(9) NOT NULL,
  `idSkoczni` int(8) NOT NULL,
  `nazwaZawodow` varchar(30) NOT NULL,
  `punkty` double(6,2) NOT NULL,
  `odleglosc` double(5,2) NOT NULL,
  `typ` varchar(30) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`idSkoczka`,`sezon`,`idSkoczni`,`nazwaZawodow`),
  KEY `fk_sezon_wynik` (`sezon`),
  KEY `fk_skocznia_wynik` (`idSkoczni`),
  KEY `fk_zawody_wynik` (`nazwaZawodow`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `zawody`
--

CREATE TABLE IF NOT EXISTS `zawody` (
  `nazwa` varchar(60) NOT NULL,
  `typ` enum('letnie','zimowe','mistrzowskie','lokalne','kobiet') NOT NULL,
  PRIMARY KEY (`nazwa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zawody`
--

INSERT INTO `zawody` (`nazwa`, `typ`) VALUES
('Alpen Cup', 'letnie'),
('Alpen Cup Winter', 'zimowe'),
('Drużynowe Mistrzostwa Świata', 'mistrzowskie'),
('Drużynowe Mistrzostwa Świata Juniorów', 'mistrzowskie'),
('Drużynowe Mistrzostwa Świata w lotach', 'mistrzowskie'),
('Drużynowy Letni Puchar Kontynentalny', 'letnie'),
('Grand Prix Czterech Narodów', 'letnie'),
('Letni CoC Kobiet', 'kobiet'),
('Letni Puchar Kontynentalny', 'letnie'),
('Letnia Grand Prix', 'letnie'),
('Lotos Cup', 'lokalne'),
('Mistrzostwa Polski', 'lokalne'),
('Mistrzostwa Świata', 'mistrzowskie'),
('Mistrzostwa Świata Juniorów', 'mistrzowskie'),
('Mistrzostwa Świata w lotach', 'mistrzowskie'),
('Puchar Kontynentalny', 'zimowe'),
('Puchar Kontynentalny Kobiet', 'kobiet'),
('Puchar Świata', 'zimowe'),
('Puchar Świata Kobiet', 'kobiet'),
('Puchar Świata w lotach', 'zimowe'),
('Turniej Czterech Skoczni', 'zimowe'),
('Turniej Skandynawski', 'zimowe'),
('Zimowe Igrzyska Olimpijskie', 'mistrzowskie');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arbiter_skocznia_sezon`
--
ALTER TABLE `arbiter_skocznia_sezon`
  ADD CONSTRAINT `nazwa` FOREIGN KEY (`sezon`, `nazwa`) REFERENCES `sezon` (`sezon`, `nazwaZawodow`),
  ADD CONSTRAINT `arbiter_skocznia_sezon_ibfk_1` FOREIGN KEY (`idSkoczni`) REFERENCES `skocznia` (`idSkoczni`),
  ADD CONSTRAINT `arbiter_skocznia_sezon_ibfk_2` FOREIGN KEY (`idSedziego`) REFERENCES `arbiter` (`idSedziego`);

--
-- Constraints for table `kombinezon`
--
ALTER TABLE `kombinezon`
  ADD CONSTRAINT `fk_sprzet_kombinezon` FOREIGN KEY (`idSprzetu`) REFERENCES `sprzet` (`idSprzetu`);

--
-- Constraints for table `nagroda_druzyna`
--
ALTER TABLE `nagroda_druzyna`
  ADD CONSTRAINT `fk_druzyna_nagroda` FOREIGN KEY (`idDruzyny`) REFERENCES `druzyna` (`idDruzyny`),
  ADD CONSTRAINT `fk_nagroda_druzyna` FOREIGN KEY (`idNagrody`) REFERENCES `nagroda` (`idNagrody`);

--
-- Constraints for table `nagroda_skoczek`
--
ALTER TABLE `nagroda_skoczek`
  ADD CONSTRAINT `nagroda_skoczek_ibfk_1` FOREIGN KEY (`idSkoczka`) REFERENCES `skoczek` (`idSkoczka`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nagroda_skoczek_ibfk_2` FOREIGN KEY (`idNagrody`) REFERENCES `nagroda` (`idNagrody`) ON UPDATE CASCADE;

--
-- Constraints for table `narty`
--
ALTER TABLE `narty`
  ADD CONSTRAINT `fk_sprzet_narty` FOREIGN KEY (`idSprzetu`) REFERENCES `sprzet` (`idSprzetu`);

--
-- Constraints for table `pozostale`
--
ALTER TABLE `pozostale`
  ADD CONSTRAINT `fk_sprzet_pozostale` FOREIGN KEY (`idSprzetu`) REFERENCES `sprzet` (`idSprzetu`);

--
-- Constraints for table `sezon`
--
ALTER TABLE `sezon`
  ADD CONSTRAINT `fk_zawody_sezon` FOREIGN KEY (`nazwaZawodow`) REFERENCES `zawody` (`nazwa`);

--
-- Constraints for table `skoczek_druzyna`
--
ALTER TABLE `skoczek_druzyna`
  ADD CONSTRAINT `fk_druzyna` FOREIGN KEY (`idDruzyny`) REFERENCES `druzyna` (`idDruzyny`),
  ADD CONSTRAINT `fk_skok` FOREIGN KEY (`idSkoczka`) REFERENCES `skoczek` (`idSkoczka`);

--
-- Constraints for table `skoczek_trener`
--
ALTER TABLE `skoczek_trener`
  ADD CONSTRAINT `fk_skoczek` FOREIGN KEY (`idSkoczka`) REFERENCES `skoczek` (`idSkoczka`),
  ADD CONSTRAINT `fk_trener` FOREIGN KEY (`idTrenera`) REFERENCES `trener` (`idTrenera`);

--
-- Constraints for table `sprzet`
--
ALTER TABLE `sprzet`
  ADD CONSTRAINT `fk_skoczek_sprzet` FOREIGN KEY (`idSkoczka`) REFERENCES `skoczek` (`idSkoczka`);

--
-- Constraints for table `wynik`
--
ALTER TABLE `wynik`
  ADD CONSTRAINT `fk_sezon_wynik` FOREIGN KEY (`sezon`) REFERENCES `sezon` (`sezon`),
  ADD CONSTRAINT `fk_skoczek_wynik` FOREIGN KEY (`idSkoczka`) REFERENCES `skoczek` (`idSkoczka`),
  ADD CONSTRAINT `fk_skocznia_wynik` FOREIGN KEY (`idSkoczni`) REFERENCES `skocznia` (`idSkoczni`),
  ADD CONSTRAINT `fk_zawody_wynik` FOREIGN KEY (`nazwaZawodow`) REFERENCES `sezon` (`nazwaZawodow`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

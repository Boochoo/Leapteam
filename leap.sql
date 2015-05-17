-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2015 at 09:45 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `leap`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `aId` int(11) NOT NULL AUTO_INCREMENT,
  `qNumber` int(11) NOT NULL,
  `aNumber` int(11) NOT NULL,
  `aContent` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`aId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aId`, `qNumber`, `aNumber`, `aContent`) VALUES
(73, 1, 1, '0-20'),
(74, 1, 2, '20-30'),
(75, 1, 3, '30-50'),
(76, 1, 4, '>50'),
(77, 2, 1, 'En'),
(78, 2, 2, 'Kerran'),
(79, 2, 3, 'Useasti'),
(80, 2, 4, 'En Koskaan'),
(81, 3, 1, 'Ei lainkaan'),
(82, 3, 2, 'ErittÃ¤in'),
(83, 4, 1, 'Joo'),
(84, 4, 2, 'Ei'),
(85, 5, 1, 'Joo'),
(86, 5, 2, 'Ei'),
(87, 6, 1, 'Joo'),
(88, 6, 2, 'Ei'),
(89, 7, 1, 'Joo'),
(90, 7, 2, 'Ei'),
(91, 8, 1, 'Joo'),
(92, 8, 2, 'Ei'),
(93, 9, 1, 'Joo'),
(94, 9, 2, 'Ei'),
(95, 10, 1, 'Joo'),
(96, 10, 2, 'Ei'),
(97, 11, 1, 'Joo'),
(98, 11, 2, 'Ei'),
(99, 12, 1, 'Joo'),
(100, 12, 2, 'Ei');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `qId` int(11) NOT NULL AUTO_INCREMENT,
  `qNumber` int(11) NOT NULL,
  `qContent` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`qId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qId`, `qNumber`, `qContent`) VALUES
(29, 1, 'IkÃ¤'),
(30, 2, 'Oletko vieraillut aiemmin Tekniikan museossa?'),
(31, 3, 'Kuinka kiinnostavia vierailukohteita museot mielestÃ¤si ovat?'),
(32, 4, 'Haluasin tutustua nÃ¤yttelyyn lukemalla tekstejÃ¤.'),
(33, 5, 'Haluasin tutustua nÃ¤yttelyyn tutkimalla kuvia.'),
(34, 6, 'Haluasin tutustua nÃ¤yttelyyn tutkimalla pienoimalleja.'),
(35, 7, 'Haluasin tutustua nÃ¤yttelyyn tutkimalla museoesineitÃ¤.'),
(36, 8, 'Haluasin tutustua nÃ¤yttelyyn tutkimalla konkreettisten rakentelumallien avulla.'),
(37, 9, 'Haluasin tutustua nÃ¤yttelyyn digitaalisten sovellusten, esim. pelien tms. avulla.'),
(38, 10, 'Haluasin tutustua nÃ¤yttelyyn kuuntelemalla opastettua kierrosta.'),
(39, 11, 'Haluasin tutustua nÃ¤yttelyyn kuuntelemalla esineisiin liittyviÃ¤ taustatarinoita.'),
(40, 12, 'Haluasin tutustua nÃ¤yttelyyn itse muokkaamalla nÃ¤yttelyn sisÃ¤ltÃ¶Ã¤.');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE IF NOT EXISTS `surveys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL,
  `qId` int(11) NOT NULL,
  `aId` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=135 ;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `uId`, `qId`, `aId`, `date`) VALUES
(29, 1, 1, 2, '2015-05-16'),
(30, 1, 2, 4, '2015-05-16'),
(31, 1, 3, 2, '2015-05-16'),
(32, 1, 4, 2, '2015-05-16'),
(33, 1, 5, 1, '2015-05-16'),
(34, 1, 6, 1, '2015-05-16'),
(35, 1, 7, 1, '2015-05-16'),
(36, 1, 8, 1, '2015-05-16'),
(37, 1, 9, 1, '2015-05-16'),
(38, 1, 10, 2, '2015-05-16'),
(39, 1, 11, 2, '2015-05-16'),
(40, 1, 12, 2, '2015-05-16'),
(41, 2, 1, 4, '2015-05-16'),
(42, 2, 2, 4, '2015-05-16'),
(43, 2, 3, 2, '2015-05-16'),
(44, 2, 4, 2, '2015-05-16'),
(45, 2, 5, 2, '2015-05-16'),
(46, 2, 7, 2, '2015-05-16'),
(47, 3, 1, 1, '2015-05-16'),
(48, 3, 2, 2, '2015-05-16'),
(49, 3, 3, 2, '2015-05-16'),
(50, 3, 4, 2, '2015-05-16'),
(51, 3, 5, 4, '2015-05-16'),
(52, 3, 6, 2, '2015-05-16'),
(53, 3, 8, 2, '2015-05-16'),
(54, 3, 9, 1, '2015-05-16'),
(55, 3, 10, 2, '2015-05-16'),
(56, 3, 11, 2, '2015-05-16'),
(57, 3, 12, 2, '2015-05-16'),
(58, 4, 1, 4, '2015-05-16'),
(59, 4, 2, 4, '2015-05-16'),
(60, 4, 3, 1, '2015-05-16'),
(61, 4, 5, 1, '2015-05-16'),
(62, 4, 6, 2, '2015-05-16'),
(63, 4, 7, 2, '2015-05-16'),
(64, 4, 8, 1, '2015-05-16'),
(65, 4, 9, 1, '2015-05-16'),
(66, 4, 10, 4, '2015-05-16'),
(67, 4, 11, 1, '2015-05-16'),
(68, 4, 12, 4, '2015-05-16'),
(69, 5, 1, 2, '2015-05-16'),
(70, 5, 2, 2, '2015-05-16'),
(71, 5, 3, 2, '2015-05-16'),
(72, 5, 4, 2, '2015-05-16'),
(73, 5, 5, 1, '2015-05-16'),
(74, 5, 6, 1, '2015-05-16'),
(75, 5, 7, 1, '2015-05-16'),
(76, 5, 8, 1, '2015-05-16'),
(77, 5, 9, 1, '2015-05-16'),
(78, 5, 10, 2, '2015-05-16'),
(79, 5, 11, 2, '2015-05-16'),
(80, 5, 12, 2, '2015-05-16'),
(81, 6, 1, 3, '2015-05-16'),
(82, 6, 2, 1, '2015-05-16'),
(83, 6, 3, 2, '2015-05-16'),
(84, 6, 4, 2, '2015-05-16'),
(85, 6, 5, 1, '2015-05-16'),
(86, 6, 6, 1, '2015-05-16'),
(87, 6, 7, 1, '2015-05-16'),
(88, 6, 8, 1, '2015-05-16'),
(89, 6, 9, 1, '2015-05-16'),
(90, 6, 10, 2, '2015-05-16'),
(91, 6, 11, 2, '2015-05-16'),
(92, 6, 12, 2, '2015-05-16'),
(93, 7, 1, 2, '2015-05-16'),
(94, 7, 2, 3, '2015-05-16'),
(95, 7, 3, 2, '2015-05-16'),
(96, 7, 4, 2, '2015-05-16'),
(97, 7, 5, 1, '2015-05-16'),
(98, 7, 6, 1, '2015-05-16'),
(99, 7, 7, 2, '2015-05-16'),
(100, 7, 8, 1, '2015-05-16'),
(101, 7, 9, 2, '2015-05-16'),
(102, 7, 10, 3, '2015-05-16'),
(103, 7, 11, 2, '2015-05-16'),
(104, 7, 12, 2, '2015-05-16'),
(105, 8, 1, 3, '2015-05-16'),
(106, 8, 2, 3, '2015-05-16'),
(107, 8, 3, 1, '2015-05-16'),
(108, 8, 4, 1, '2015-05-16'),
(109, 8, 6, 2, '2015-05-16'),
(110, 8, 7, 2, '2015-05-16'),
(111, 8, 8, 1, '2015-05-16'),
(112, 8, 9, 1, '2015-05-16'),
(113, 8, 10, 2, '2015-05-16'),
(114, 8, 11, 2, '2015-05-16'),
(115, 8, 12, 1, '2015-05-16'),
(116, 9, 1, 3, '2015-05-16'),
(117, 9, 2, 3, '2015-05-16'),
(118, 9, 3, 2, '2015-05-16'),
(119, 9, 4, 1, '2015-05-16'),
(120, 9, 5, 1, '2015-05-16'),
(121, 9, 6, 1, '2015-05-16'),
(122, 9, 7, 1, '2015-05-16'),
(123, 9, 8, 1, '2015-05-16'),
(124, 9, 9, 1, '2015-05-16'),
(125, 9, 10, 1, '2015-05-16'),
(126, 9, 11, 1, '2015-05-16'),
(127, 9, 12, 1, '2015-05-16'),
(128, 10, 1, 3, '2015-05-16'),
(129, 10, 8, 1, '2015-05-16'),
(130, 11, 1, 2, '2015-05-16'),
(131, 11, 4, 2, '2015-05-16'),
(132, 11, 5, 1, '2015-05-16'),
(133, 11, 11, 3, '2015-05-16'),
(134, 11, 12, 2, '2015-05-16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

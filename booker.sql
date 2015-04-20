-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2015 at 08:27 AM
-- Server version: 5.1.40
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `booker`
--

-- --------------------------------------------------------

--
-- Table structure for table `b_employees`
--

CREATE TABLE IF NOT EXISTS `b_employees` (
  `idUser` smallint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `b_employees`
--

INSERT INTO `b_employees` (`idUser`, `name`, `email`, `password`, `status`) VALUES
(6, 'alex', 'alex@mail.ru', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0),
(9, 'Anna', 'anna@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(5, 'Admin', 'admin@mail.ru', '200ceb26807d6bf99fd6f4f0d1ca54d4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `b_events`
--

CREATE TABLE IF NOT EXISTS `b_events` (
  `idEvent` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `title` varchar(100) NOT NULL,
  `idUser` smallint(5) NOT NULL,
  `idRoom` smallint(5) NOT NULL,
  `idPar` int(10) DEFAULT '0',
  PRIMARY KEY (`idEvent`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `b_events`
--

INSERT INTO `b_events` (`idEvent`, `date`, `startTime`, `endTime`, `title`, `idUser`, `idRoom`, `idPar`) VALUES
(18, '2015-04-29', '18:00:00', '20:00:00', 'Meeting', 6, 1, 0),
(16, '2015-04-30', '07:00:00', '10:00:00', 'Something', 6, 1, 0),
(17, '2015-03-16', '13:00:00', '15:00:00', 'Meeting', 6, 1, 0),
(14, '2015-04-14', '12:00:00', '14:00:00', 'Something', 6, 1, 0),
(15, '2015-04-29', '06:00:00', '11:00:00', 'Anithing', 6, 1, 0),
(13, '2015-04-06', '09:00:00', '10:00:00', 'Important meeting', 6, 1, 0),
(19, '2015-05-18', '12:00:00', '15:00:00', 'Something', 6, 1, 0),
(20, '2015-05-28', '14:00:00', '17:00:00', 'Important meeting', 6, 1, 0),
(21, '2015-04-14', '19:00:00', '21:00:00', 'Important meeting', 9, 2, 0),
(22, '2015-04-15', '10:00:00', '12:00:00', 'Important meeting', 9, 2, 0),
(23, '2015-05-11', '10:00:00', '13:00:00', 'Important meeting', 9, 1, 0),
(24, '2015-05-22', '13:00:00', '15:00:00', 'Something', 9, 2, 0),
(25, '2015-06-23', '09:00:00', '12:00:00', 'Something', 9, 2, 0),
(26, '2015-06-08', '13:00:00', '18:00:00', 'Important event', 9, 1, 0),
(27, '2015-04-14', '12:00:00', '12:30:00', 'Something', 6, 2, 0),
(28, '2015-04-14', '15:00:00', '16:00:00', 'Something', 9, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `b_rooms`
--

CREATE TABLE IF NOT EXISTS `b_rooms` (
  `idRoom` smallint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`idRoom`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `b_rooms`
--

INSERT INTO `b_rooms` (`idRoom`, `name`) VALUES
(1, 'Room1'),
(2, 'Room2'),
(3, 'Room3');

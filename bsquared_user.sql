-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2015 at 05:31 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bsquared_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `EVENTID` int(10) NOT NULL,
  `TIME` date NOT NULL,
  `postdate` date NOT NULL,
  `LAT` double NOT NULL,
  `LONGt` double NOT NULL,
  `DESCRIPTION` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `TYPE` int(11) NOT NULL,
  `authID` int(10) NOT NULL,
  PRIMARY KEY (`EVENTID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EVENTID`, `TIME`, `postdate`, `LAT`, `LONGt`, `DESCRIPTION`, `TYPE`, `authID`) VALUES
(100, '2015-09-01', '2015-02-01', 53.525333, -113.527589, 'Drinks @ RATT', 0, 100),
(6060, '2015-09-05', '2015-03-12', 53.52798, -113.525611, 'STAT 141 Study Group', 1, 100),
(2497, '2015-09-10', '2015-03-12', 53.523103, -113.526115, 'workout @ paw', 2, 5640),
(9330, '2015-05-06', '2015-03-12', 53.531162, -113.527697, 'bonfire party by the river', 0, 1293);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(100, 'sam9116', '876543'),
(1293, 'uio0000', '456456456'),
(5640, 'derpking', '123456789');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

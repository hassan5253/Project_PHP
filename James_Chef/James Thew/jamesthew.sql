-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2014 at 10:06 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jamesthew`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblmember`
--

CREATE TABLE IF NOT EXISTS `tblmember` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `UName` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Confirm Pass` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `Charges` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `UName` (`UName`,`Email`),
  UNIQUE KEY `UName_2` (`UName`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `UName_3` (`UName`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `tblmember`
--

INSERT INTO `tblmember` (`UID`, `UName`, `Password`, `Confirm Pass`, `Email`, `Gender`, `Country`, `Charges`, `Status`) VALUES
(102, 'hassan', '40444952', '40444952', 'hassanyounus5253@gmail.com', 'male', 'Pakistan', 'monthly', 'False'),
(103, 'zainab', 'e10adc3949ba59abbe56', 'e10adc3949ba59abbe56', 'zainab@hotmail.com', 'female', 'USA', 'monthly', 'False'),
(104, 'ahmed', 'd964173dc44da83eeafa', 'd964173dc44da83eeafa', 'ahmed@ymail.com', 'male', 'UK', 'monthly', 'True'),
(114, 'younus', '71b3b26aaa319e0cdf6f', '71b3b26aaa319e0cdf6f', 'younus5253@gmail.com', 'male', 'Canada', 'monthly', 'True'),
(116, 'adnan', '927b1b9a9eb2fdc3479c', '927b1b9a9eb2fdc3479c', 'adnan52@gmail.com', 'male', 'Other', 'yearly', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `UName` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `UName` (`UName`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`UID`, `UName`, `Password`) VALUES
(100, 'Admin', '12345'),
(101, 'JamesThew', '56789');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

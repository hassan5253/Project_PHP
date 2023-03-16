-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2014 at 05:21 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `generalstoredb`
--
CREATE DATABASE `generalstoredb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `generalstoredb`;

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomers`
--

CREATE TABLE IF NOT EXISTS `tblcustomers` (
  `CID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `CAddress` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `UPass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tblcustomers`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE IF NOT EXISTS `tblorders` (
  `OID` int(11) NOT NULL AUTO_INCREMENT,
  `PID` int(11) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `QTY` int(11) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`OID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tblorders`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE IF NOT EXISTS `tblproducts` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(100) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`PID`, `ProductName`, `Price`, `Status`) VALUES
(100, 'Electric Oven', 15000, 'True'),
(101, 'Weight Device', 12000, 'True'),
(102, 'Micro Wave Oven', 16000, 'True'),
(103, 'Refrigerator', 28000, 'True'),
(104, 'Electric Kettle', 1200, 'True'),
(105, 'Vaccume Cleaner', 2200, 'True'),
(106, 'Washing Machine', 6500, 'True'),
(107, 'Electric Stove', 8500, 'True'),
(108, 'Toaster', 7000, 'True');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

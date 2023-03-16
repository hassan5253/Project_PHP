-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2014 at 05:39 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `empdb`
--
CREATE DATABASE `empdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `empdb`;

-- --------------------------------------------------------

--
-- Table structure for table `tblemp`
--

CREATE TABLE IF NOT EXISTS `tblemp` (
  `EID` int(11) NOT NULL AUTO_INCREMENT,
  `EName` varchar(50) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Shift` varchar(15) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`EID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tblemp`
--

INSERT INTO `tblemp` (`EID`, `EName`, `Phone`, `Email`, `Shift`, `City`, `Status`) VALUES
(1, 'waleed', '03331234567', 'muahmmadwaleedw', 'Evening', 'Karachi', 'True'),
(2, 'hassan', '0331253564', 'hassanyounus5253@gmail.com', 'Evening', 'Lahore', 'True'),
(3, 'Aamir', '0345-1234567', 'aamirashrafh@gmail.com', 'Morning', 'Karachi', 'True'),
(4, 'Anum', '021355676788', 'anum@yahoo.com', 'Morning', 'Karachi', 'True'),
(5, 'sana', '02131234567', 'sana@yahoo.com', 'Evening', 'Karachi', 'True'),
(6, 'ziidi', '021254121215456', 'ziidi@yahoo.com', 'Morning', 'Karachi', 'False'),
(7, 'Muhammad Nouma', '0333333333', 'noman@gamil.com', 'Morning', 'Karachi', 'True'),
(8, 'Waseem', '03122216619', 'waseembalouch4@gmail.com', 'Evening', 'Hyderabad', 'True'),
(15, 'Sunny Leone', '46546241211', 'Sunny@gmail.com', 'Morning', 'Karachi', 'True'),
(9, 'nomi', '032012341564', 'nomi@gmail.com', 'Morning', 'Karachi', 'True'),
(10, 'Yo Yo Honey Singh', '0345-1234567', 'YoYo@Blueeyes@:D', 'Morning', 'Karachi', 'True'),
(11, ':p', ':v', ':D', 'Evening', 'Hyderabad', 'True'),
(12, 'Manju Sharma', '021231424524', 'comedynight@gmail.com', 'Evening', 'Islamabad', 'True'),
(13, 'vanessa', '123456', 'vanessa@hotmail.com', 'Morning', 'Karachi', 'True'),
(14, 'AmirBhiAmirBhi', '0345-1234567', 'AmirBhiAmirBhi@gmail.com', 'Evening', 'Lahore', 'True'),
(17, 'Sanu Ek Pal Chen Na Away :D', '0345-1234567', 'sajna@yahoo.com', 'Morning', 'Karachi', 'True'),
(16, 'chanda mama', 'SMNDSM', 'mama hotel', 'Morning', 'Karachi', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE IF NOT EXISTS `tblemployee` (
  `EID` int(11) NOT NULL AUTO_INCREMENT,
  `EName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Picture` varchar(50) DEFAULT NULL,
  `IPInfo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`EID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`EID`, `EName`, `Email`, `Picture`, `IPInfo`) VALUES
(1, 'Gracious boy', 'lovingangel@gmail.com', '1C7B7D82-937D-454E-A060-1A5C18091940.jpeg', '11.0.1.6'),
(2, 'farooq', 'farooq@yahoo.com', 'C8F6886B-4E25-4E89-9572-ED44056F2CD9.jpeg', '::1'),
(3, 'sana', 'sana@yahoo.com', 'F01934CD-4FC7-469A-824F-03AC622FB001.jpeg', '11.0.1.14'),
(4, 'Rashid', 'rashidali@gmail.com', 'BEFCA70C-3CFA-47F1-A94F-D83F77559A02.jpeg', '11.0.1.16'),
(5, 'anum', 'anum@yahoo.com', 'F67B1B01-90C0-4CDD-8511-66585DB96509.jpeg', '11.0.1.29'),
(6, 'Tahir', 'tahir.hq494@hotmail.com', '3F905255-AC79-4D32-AC64-343D07E008F2.jpeg', '11.0.1.7'),
(7, 'Waqasd', 'Waqas@yahoo.com', '0CE67AA4-6304-4C2E-A173-C5ABBC783274.jpeg', '11.0.1.18'),
(8, 'Innocent ', 'innocent@gmail.com', '25CBD7AC-71E3-4BF1-B706-FD292A416566.jpeg', '11.0.1.81'),
(9, 'Mufasil', 'mufasil_ccna@yahoo.com', '67FD3164-B367-4DCA-8CF0-7C11ED1DEE91.jpeg', '11.0.1.3'),
(10, 'Aamir', 'aamirashrafh@gmail.com', '9D270256-5FCD-4F72-8B2C-4E2F400F9FDF.jpeg', '11.0.1.52'),
(11, 'zaidi', 'zaidi@gmail.com', 'E0728D44-C1AE-4BA3-974D-ABC7FAEAEC2A.jpeg', '11.0.1.2'),
(12, 'Nomi', 'Nomi@ymail.com', 'ACEA8018-D32A-494C-B191-44CC1A40D0FD.jpeg', '11.0.1.10'),
(13, 'ahmed', 'ahmed@gmail.com', 'F8B1CC90-C126-4B6E-85B1-527C3672FC32.png', '11.0.1.99'),
(14, 'Waseem', 'abc@email.com', 'F6A71E51-DEBE-407B-A08F-2FE57C3D4C31.jpeg', '11.0.1.20'),
(15, 'Waqas Ala,', 'AlamKhan@yahoo.com', '441B4BA7-8476-46FE-9500-7F05B498952D.jpeg', '11.0.1.18'),
(16, 'HHA', 'mam@hoymak.xom', '5E362B00-6428-4455-863D-CB1F603EA407.jpeg', '11.0.1.5'),
(17, 'Rashid', 'yahoo@gmail.com', '62686FD6-1AAE-4125-8351-11E6192E7BAA.jpeg', '11.0.1.16'),
(18, 'server', 'sever@gmail.com', '8427E357-2C05-4FAD-8FC9-48306B06A41B.jpeg', '11.0.1.16'),
(19, 'PML (N)', 'jiyeshair@pti.com', '1A69BFD0-88AA-48D5-A25B-688BB61CE31D.jpeg', '11.0.1.6');

-- --------------------------------------------------------

--
-- Table structure for table `tblmsg`
--

CREATE TABLE IF NOT EXISTS `tblmsg` (
  `MID` int(11) NOT NULL AUTO_INCREMENT,
  `FromUser` varchar(50) DEFAULT NULL,
  `ToUser` varchar(50) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Date_Time` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`MID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `tblmsg`
--

INSERT INTO `tblmsg` (`MID`, `FromUser`, `ToUser`, `Subject`, `Date_Time`) VALUES
(1, '8', 'InoCentNome@yahoo.com', 'Assalam A Lakum', '19-Aug-2014'),
(2, '8', 'tahir.hq494@hotmail.com', 'Assalam A Lakum', '19-Aug-2014'),
(3, '8', 'tahir.hq494@hotmail.com', 'Mayrepass nahi chal raha hay :(', '19-Aug-2014'),
(4, '20', 'tahir.hq494@hotmail.com', 'helo', '19-Aug-2014'),
(5, '7', 'amirazaab@yahoo.com', 'Dafa Hoja Mohsin :D', '19-Aug-2014'),
(6, '7', 'amirazaab@yahoo.com', 'Dafa Hoja Mohsin :D', '19-Aug-2014'),
(7, '8', 'innocentnome@gmail.com', 'Mayrepass nahi chal raha hay :(', '19-Aug-2014'),
(8, '8', 'Nomi@ymail.com', 'Mayrepass nahi chal raha hay :(', '19-Aug-2014'),
(9, '7', 'amirazaab@yahoo.com', 'Dafa Hoja Mohsin :D', '19-Aug-2014'),
(10, '20', 'aamirashrafh@gmail.com', 'beta kasa hn ', '19-Aug-2014'),
(11, '8', 'Nomi@ymail.com', 'Mayrepass nahi chal raha hay :(', '19-Aug-2014'),
(12, '23', '123@yahoo.com', 'hi master', '19-Aug-2014'),
(13, '23', '123@yahoo.com', 'hi nomi', '19-Aug-2014'),
(14, '12', '123@yahoo.com', 'sdfgarf', '19-Aug-2014'),
(15, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(16, '15', 'aamirashrafh@gmail.com', 'aam khao', '19-Aug-2014'),
(17, '23', 'jiyeshair@pti.com', '123', '19-Aug-2014'),
(18, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(19, '1', 'abc@email.com', 'No Data.', '19-Aug-2014'),
(20, '12', 'aliya@gmail.com', 'adfasdfa', '19-Aug-2014'),
(21, '3', 'InoCentNome@yahoo.com', 'Assalamualikum Kia kar rhay hoo?', '19-Aug-2014'),
(22, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(23, '8', 'tahir.hq494@hotmail.com', 'Assalam A Lakum', '19-Aug-2014'),
(24, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(25, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(26, '12', 'BlueEyes@yahoo.com', 'zdfgsdfg', '19-Aug-2014'),
(27, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(28, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(29, '1', 'farooq@yahoo.com', 'Salam', '19-Aug-2014'),
(30, '15', 'mufasil_ccna@yahoo.com', 'hi', '19-Aug-2014'),
(31, '6', 'sana@yahoo.com', 'hello', '19-Aug-2014'),
(32, '23', 'BlueEyes@yahoo.com', '12345', '19-Aug-2014'),
(33, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(34, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(35, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(36, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(37, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(38, '3', 'aliya@gmail.com', 'Aliya, Arham and Madiii', '19-Aug-2014'),
(39, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(40, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(41, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(42, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(43, '2', 'anum@yahoo.com', 'hello', '19-Aug-2014'),
(44, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(45, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(46, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(47, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(48, '4', 'abc@email.com', 'ok', '19-Aug-2014'),
(49, '12', 'Waqas@yahoo.com', 'asdfasdf', '19-Aug-2014'),
(50, '4', '123@yahoo.com', 'no', '19-Aug-2014'),
(51, '15', 'mufasil_ccna@yahoo.com', 'hi', '19-Aug-2014'),
(52, '4', '123@yahoo.com', 'no', '19-Aug-2014'),
(53, '23', '123@yahoo.com', 'hi nomi', '19-Aug-2014'),
(54, '23', '123@yahoo.com', 'qqwewwe', '19-Aug-2014'),
(55, '12', '123@yahoo.com', 'adfasdf', '19-Aug-2014'),
(56, '23', '123@yahoo.com', 'qqwewwe', '19-Aug-2014'),
(57, '9', 'InoCentNome@yahoo.com', 'Aam Khaygaa...??', '19-Aug-2014'),
(58, '12', 'hassanyounus5253@gmail.com', 'sdfasdasdf', '19-Aug-2014'),
(59, '3', 'ziddi@yahoo.com', 'Aliya, Arham and Madiii', '19-Aug-2014'),
(60, '12', 'InoCentNome@yahoo.com', 'asdfasdfasdfd', '19-Aug-2014'),
(61, '15', 'mufasil_ccna@yahoo.com', 'hi', '19-Aug-2014'),
(62, '9', 'aamirashrafh@gmail.com', 'Aam Khaygaa...??', '19-Aug-2014'),
(63, '4', '123@yahoo.com', 'p[', '19-Aug-2014'),
(64, '17', 'Nomi@ymail.com', 'salam', '19-Aug-2014'),
(65, '9', 'BlueEyes@yahoo.com', '???', '19-Aug-2014'),
(66, '9', 'hassanyounus5253@gmail.com', 'Mujhe Pyaar Hone Laga he....', '19-Aug-2014'),
(67, '9', 'amirazaab@yahoo.com', 'Mujhe Pyaar Hone Laga he....', '19-Aug-2014'),
(68, '9', 'rashidali@gmail.com', 'Thanxx... for the Email....', '19-Aug-2014'),
(69, '9', 'farooq@yahoo.com', 'Mujhe Pyaar Hone Laga he....', '19-Aug-2014'),
(70, '12', 'InoCentNome@yahoo.com', 'asdfasdfasdfd', '19-Aug-2014'),
(71, '12', '123@yahoo.com', 'sdfgsdf', '19-Aug-2014'),
(72, '1', 'farooq@yahoo.com', 'Testing Message.', '19-Aug-2014'),
(73, '27', 'yousuf@yahoo.com', 'Salam', '19-Aug-2014'),
(74, '27', 'farooq@yahoo.com', 'Salam Sir, its Yousuf.', '19-Aug-2014');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE IF NOT EXISTS `tbluser` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `UName` varchar(50) DEFAULT NULL,
  `UPass` varchar(20) DEFAULT NULL,
  `SQuestion` varchar(20) DEFAULT NULL,
  `SAnswer` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `UName` (`UName`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`UID`, `UName`, `UPass`, `SQuestion`, `SAnswer`) VALUES
(1, 'farooq@yahoo.com', '123456', 'Favourite Book', 'Quran'),
(2, 'sana@yahoo.com', '1234', 'Favourite Book', 'Outliers'),
(3, 'mufasil_ccna@yahoo.com', '12345', 'Favourite Book', 'Quran'),
(4, 'abc@email.com', '123456', 'Favourite Teacher', 'abc'),
(5, 'rashidali@gmail.com', '123456', 'Childhood School', '12333'),
(6, 'anum@yahoo.com', '123', 'Favourite Book', 'quran'),
(7, 'aamirashrafh@gmail.com', '123', 'Favourite Book', 'Quran'),
(8, 'tahir.hq494@hotmail.com', '123456', 'Favourite Book', 'Quaran'),
(9, 'Nomi@ymail.com', 'nomi', 'Favourite Book', 'Harry Potter'),
(10, '123@yahoo.com', '123', 'Childhood School', 'Ok'),
(11, 'innocentnome@gmail.com', '123456', 'Favourite Book', 'Quran'),
(12, 'Waqas@yahoo.com', '123123', 'Favourite Teacher', 'farooq'),
(13, 'master@hotmail.com', 'abcd', 'Childhood School', 'city'),
(14, 'jiyeshair@pti.com', 'bebo123456', 'Favourite Teacher', 'Miss Nita Ambani'),
(15, 'ziddi@yahoo.com', '444', 'Favourite Teacher', 'sf'),
(16, 'Soomro@gmail.com', '123456789852852', 'First Birth Place', 'Charpai'),
(17, 'hassanyounus5253@gmail.com', '123456', 'Childhood School', 'Nasra'),
(18, 'aliya@gmail.com', '555', 'Favourite Book', 'quran'),
(19, 'BlueEyes@yahoo.com', '123', 'First Birth Place', 'Moon'),
(20, 'InoCentNome@yahoo.com', '123', 'Favourite Book', 'quran'),
(21, 'maddy1@gmail.com', '123456', 'Favourite Teacher', 'Nita Ambani'),
(22, 'waseem@yahoo.com', 'waseem', 'Favourite Teacher', 'koe nahi'),
(23, 'abc@yahoo.com', '12345', 'Childhood School', 'School'),
(24, 'amirazaab@yahoo.com', '12345', 'Favourite Book', 'ABC'),
(25, 'Kurleez@gmail.com', '12345', 'Favourite Teacher', 'Sir Farooq'),
(26, 'bilal@yahoo.com', '123456', 'Favourite Teacher', 'lady'),
(27, 'yousuf@yahoo.com', 'aptech', 'First Birth Place', 'Karachi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

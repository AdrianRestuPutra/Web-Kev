-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2015 at 03:59 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kevgarage`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminkev`
--

CREATE TABLE IF NOT EXISTS `adminkev` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `adminkev`
--

INSERT INTO `adminkev` (`idUser`, `username`, `password`) VALUES
(1, 'zndolan', 'ed7c9792244c0de51eba54cc2d717445'),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `idCategory` int(11) NOT NULL AUTO_INCREMENT,
  `nameCategory` varchar(25) NOT NULL,
  PRIMARY KEY (`idCategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idCategory`, `nameCategory`) VALUES
(1, 'Engine'),
(2, 'Handling'),
(3, 'Accessories'),
(4, 'Rims'),
(5, 'Kids E-Cars'),
(6, 'Clothes'),
(7, 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `idCustomer` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noHp` varchar(15) NOT NULL,
  `city` varchar(25) NOT NULL,
  `noTlp` varchar(15) NOT NULL,
  `postalCode` int(11) NOT NULL,
  PRIMARY KEY (`idCustomer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaction`
--

CREATE TABLE IF NOT EXISTS `detailtransaction` (
  `idTransaction` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subTotal` int(11) NOT NULL,
  PRIMARY KEY (`idTransaction`,`idProduct`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE IF NOT EXISTS `feature` (
  `idProduct1` int(11) NOT NULL,
  `idProduct2` int(11) NOT NULL,
  `idProduct3` int(11) NOT NULL,
  `idProduct4` int(11) NOT NULL,
  `idProduct5` int(11) NOT NULL,
  `idFitur` int(11) NOT NULL,
  PRIMARY KEY (`idFitur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`idProduct1`, `idProduct2`, `idProduct3`, `idProduct4`, `idProduct5`, `idFitur`) VALUES
(7, 2, 3, 6, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `idImage` int(11) NOT NULL AUTO_INCREMENT,
  `imageName` varchar(100) NOT NULL,
  PRIMARY KEY (`idImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`idImage`, `imageName`) VALUES
(1, 'brankas_code2_kotak.png'),
(2, 'brankas_code2.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `idProduct` int(11) NOT NULL AUTO_INCREMENT,
  `idCategory` int(11) NOT NULL,
  `nameProduct` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `imageName1` varchar(100) NOT NULL,
  `imageName2` varchar(100) NOT NULL,
  `imageName3` varchar(100) NOT NULL,
  `imageName4` varchar(100) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `descriptionList` varchar(10000) NOT NULL,
  PRIMARY KEY (`idProduct`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idProduct`, `idCategory`, `nameProduct`, `stock`, `price`, `imageName1`, `imageName2`, `imageName3`, `imageName4`, `description`, `descriptionList`) VALUES
(1, 1, ' kod', 4, 1200, 'slepop.png', 'slepop.png', 'slepop.png', 'slepop.png', 'desc1', 'desc2'),
(2, 2, 'bangku', 3, 333, '-', '-', '-', '-', '-', '-'),
(3, 4, 'tes', 1, 2, '2', '2', '2', '2', '2', '2'),
(4, 6, 'qq', 3, 900000, 'q', 'q', 'q', 'q', 'q', 'q'),
(5, 4, 'pop', 3, 435345, '35', '34543', '3254', '353', '3453', '445'),
(6, 4, 'trt', 545, 8888, '4ret', 'et45', '45g54', 'g54', '5g', '54'),
(7, 6, 'qwe', 32432, 2523, 'vre', 'tevst', 'retve', 'esvter', 'vesrtv', 'tevte'),
(8, 3, 'ertetv', 43534, 4353, 'v4r4', '3v3r3w', 'etvet', 'vte t', 'evte wt', 'tvetw ew'),
(9, 4, 'vetew 4554', 454, 5645, 'vwer', 'ev', 'rtev', 'ewtry', 'eytry', 'erytry'),
(10, 5, 'ttgrtg', 444, 6464, 'fht', 'ntynty', 'tyntyn', 'ntyntynyn', 'tynynty', 'ttyty'),
(11, 1, 'trrtgr bew', 2435, 4353453, 'olioli', 'oiloi', 'li', 'be5yry', 'rwc ', ' fhty'),
(12, 3, 'dgreseasf', 56456, 464, 'v dsv v', ' gdr ', ' thtrh ', 'rth rhr ', 'hrt rr', ' rhrthr '),
(13, 2, 'adrian', 34534, 345435, ' brth r', '  trhr', 'r thrh', 'h rhr', ' rthr', ' rh'),
(14, 3, ' brwgr gw ', 3453, 43534, 'ghrt ', 'fghf', 'fhfh', 'ff', 'fhff', 'fff'),
(15, 4, 'ewrqr', 324324, 23432, '3423', 'werw', 'wrw', 'rwrw', 'wrw', 'wrw'),
(16, 2, 'erewr', 3423, 234, 'wefrwe', 'wrewr', 'wrw', 'erwer', 'wrw', 'www'),
(17, 6, 'gergww', 432, 4343, 'dfd', 'dsgd', 'ddsd', 'ddsfs', 'dfsd', 'wew'),
(18, 2, 'ewewtwt', 24, 343, 'dsfsd', 'sdf', 'dfds', 'sfds', 'sfds', 'sfs'),
(19, 4, 'efwef', 4343, 343, 'vdv', 'rvrevbe', 'rebreb', 'rvbre', 'reger', 'regerg'),
(20, 4, 'rgrtbr', 2473, 4343, 'fdbdf', 'dbdfb', 'dfbdf', 'fdbdf', 'dfbd', 'erger'),
(21, 2, 'ageag', 34, 43543, 'efgrg', 'rgerg', 'ergerg', 'ergerg', 'egerg', 'regerg'),
(22, 3, 'ynetnyte', 5454, 454, 'gbfgb', 'gbfgbf', 'gbgfnht', 'fwefs', 'thrth', 'werwer'),
(23, 3, 'thytnty', 4334, 3434, 'rgerg', 'ergerg', 'ergerg', 'sdfsf', 'vfvdf', 'hnhnh'),
(24, 4, 'gbdb', 34343, 454, 'gbdgbd', 'fbdbdf', 'fdber', 'scdsc', 'vfdbf', 'csdcsf'),
(25, 3, 'fbdgb', 675, 6766, 'bfdbd', 'fbdbdf', 'fbdb', 'fbdbdf', 'dfbdfbd', 'fbdbdf'),
(26, 2, 'bfdbdf', 54, 4546, 'bdf', 'dsdfsg', 'tgdn', 'fdbd', 'fbte', 'awa'),
(27, 7, 'nana', 6, 2000, 'slepop', 'fsdf', 'sfds', 'sdfs', 'dsf', 'dsfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `idTransaction` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `date` datetime NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`idTransaction`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2014 at 04:08 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `knowledgedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data`
--

CREATE TABLE IF NOT EXISTS `tbl_data` (
  `no` int(255) NOT NULL AUTO_INCREMENT,
  `no_br` varchar(50) NOT NULL,
  `cr_number` varchar(50) NOT NULL,
  `status` int(100) NOT NULL,
  `reflex` text,
  `application_name` varchar(100) NOT NULL,
  `user` int(100) NOT NULL,
  `departement_PIC` text NOT NULL,
  `IT_testing_PIC` int(100) NOT NULL,
  `request_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `key_achievement` int(11) NOT NULL,
  `month_of_register` date NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_data`
--

INSERT INTO `tbl_data` (`no`, `no_br`, `cr_number`, `status`, `reflex`, `application_name`, `user`, `departement_PIC`, `IT_testing_PIC`, `request_date`, `start_date`, `end_date`, `key_achievement`, `month_of_register`) VALUES
(2, 'eaddad', 'yadgayd', 1, 'test', 'adaeda', 1, 'adedead', 1, '2014-06-08', '2014-06-02', '2014-06-03', 1, '2014-06-16'),
(3, '223', 'sdadw', 2, 'test', 'apa', 1, 'dwdw', 2, '0000-00-00', '0000-00-00', '0000-00-00', 1, '0000-00-00'),
(4, 'de', 'ded', 3, 'eded', 'eded', 50, 'wsw', 2, '0000-00-00', '0000-00-00', '0000-00-00', 1, '0000-00-00'),
(5, '12', '232', 1, 'wwdwd', 'dwdwdw', 56, 'sdsds', 2, '0000-00-00', '0000-00-00', '0000-00-00', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`username`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'emon', 'ganteng', 'andri');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

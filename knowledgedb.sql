-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2014 at 10:12 AM
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
  `status` varchar(100) DEFAULT NULL,
  `BA` int(10) NOT NULL,
  `TS` int(10) NOT NULL,
  `SRS` int(10) NOT NULL,
  `BRS` int(10) NOT NULL,
  `MOM` int(10) NOT NULL,
  `reflex` text,
  `application_name` varchar(100) NOT NULL,
  `IT_dev_PIC` int(100) NOT NULL,
  `departement_PIC` int(20) NOT NULL,
  `IT_testing_PIC` int(20) NOT NULL,
  `request_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `key_achievement` text NOT NULL,
  `n_status` int(10) NOT NULL,
  PRIMARY KEY (`no`),
  FULLTEXT KEY `key_achievement` (`key_achievement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_data`
--

INSERT INTO `tbl_data` (`no`, `no_br`, `cr_number`, `status`, `BA`, `TS`, `SRS`, `BRS`, `MOM`, `reflex`, `application_name`, `IT_dev_PIC`, `departement_PIC`, `IT_testing_PIC`, `request_date`, `start_date`, `end_date`, `key_achievement`, `n_status`) VALUES
(1, '3232', '2323', 'wdwdwd', 0, 0, 0, 0, 0, 'wdwd', '', 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

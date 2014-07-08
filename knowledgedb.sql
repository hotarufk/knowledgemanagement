-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2014 at 06:46 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `knowledgedb`
--
CREATE DATABASE IF NOT EXISTS `knowledgedb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `knowledgedb`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data`
--

CREATE TABLE IF NOT EXISTS `tbl_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
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
  `end_date` date DEFAULT NULL,
  `key_achievement` int(11) NOT NULL,
  `month_of_register` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_data`
--

INSERT INTO `tbl_data` (`id`, `no_br`, `cr_number`, `status`, `reflex`, `application_name`, `user`, `departement_PIC`, `IT_testing_PIC`, `request_date`, `start_date`, `end_date`, `key_achievement`, `month_of_register`) VALUES
(2, 'eaddad', 'yadgayd', 1, 'test', 'adaeda', 1, 'adedead', 1, '2014-06-08', '2014-06-02', '2014-06-03', 1, '07.2014'),
(3, '223', 'sdadw', 2, 'test', 'apa', 1, 'dwdw', 2, '0000-00-00', '0000-00-00', '0000-00-00', 1, '10.2014'),
(4, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '0000-00-00', '0000-00-00', '0000-00-00', 1, '09.2014'),
(5, '12', '232', 1, 'wwdwd', 'dwdwdw', 1, 'sdsds', 2, '0000-00-00', '0000-00-00', '0000-00-00', 1, '06.2015'),
(6, 'wda', 'wdw', 1, 'dwad', 'wdwd', 1, 'sdsdadas', 1, '2014-07-14', '2014-07-17', '2014-07-04', 1, '07.2014'),
(7, '3434', 'rfrf', 1, 'frfrfrf', 'test', 2, 'rfrfr', 1, '2014-07-04', '2014-07-04', '2014-07-01', 1, '10.2014'),
(8, '213', 'wwe2', 1, 'test', 'swsw', 3, 'wswwd', 1, '2014-07-16', '2014-07-17', '2014-07-18', 1, '12.2014'),
(9, 'brq', 'r555', 1, 'test', 'tesst2', 1, 'tst', 1, '2014-07-04', '2014-07-01', '0000-00-00', 0, '07.2014'),
(10, 'BR-001', 'CR-001', 5, 'Prototype', 'Prototype', 2, 'Bobo', 1, '2014-06-01', '2014-06-06', '2014-06-16', 1, '07.2014'),
(11, 'BR-002', 'CR-002', 5, 'GN', 'GN Drive', 2, 'Bobo', 3, '2014-07-01', '2014-07-02', '2014-07-08', 1, '07.2014'),
(12, 'BR-003', 'CR-003', 4, 'IWSP', 'Strike Pack', 2, 'Aile', 2, '2014-06-09', '2014-06-16', '2014-06-30', 0, '07.2014');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`username`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `nama`, `role`) VALUES
(1, 'emon', 'ganteng', 'andri', 1),
(2, 'bobo', 'bobo', 'bobo', 1),
(3, 'test1', 'test1', 'test1', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD CONSTRAINT `user.id` FOREIGN KEY (`user`) REFERENCES `tbl_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2014 at 05:56 AM
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
  `ba_link` varchar(127) NOT NULL,
  `ts_link` varchar(127) NOT NULL,
  `testscenario_link` varchar(127) NOT NULL,
  `brs_link` varchar(127) NOT NULL,
  `srs_link` varchar(127) NOT NULL,
  `mom_link` varchar(127) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tbl_data`
--

INSERT INTO `tbl_data` (`id`, `no_br`, `cr_number`, `status`, `reflex`, `application_name`, `user`, `departement_PIC`, `IT_testing_PIC`, `request_date`, `start_date`, `end_date`, `key_achievement`, `month_of_register`, `ba_link`, `ts_link`, `testscenario_link`, `brs_link`, `srs_link`, `mom_link`) VALUES
(2, 'eaddad', 'yadgayd', 1, 'test', 'adaeda', 1, 'adedead', 1, '2014-06-08', '2014-06-02', '2014-06-03', 1, '07.2014', '', '', '', '', '', ''),
(3, '223', 'sdadw', 2, 'test', 'apa', 1, 'dwdw', 2, '0000-00-00', '0000-00-00', '0000-00-00', 1, '10.2014', '', '', '', '', '', ''),
(4, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '0000-00-00', '0000-00-00', '0000-00-00', 1, '09.2014', '', '', '', '', '', ''),
(5, '12', '232', 1, 'wwdwd', 'dwdwdw', 1, 'sdsds', 2, '0000-00-00', '0000-00-00', '0000-00-00', 1, '06.2015', '', '', '', '', '', ''),
(6, 'wda', 'wdw', 1, 'dwad', 'wdwd', 1, 'sdsdadas', 1, '2014-07-14', '2014-07-17', '2014-07-04', 1, '07.2014', '', '', '', '', '', ''),
(7, '3434', 'rfrf', 1, 'frfrfrf', 'test', 2, 'rfrfr', 1, '2014-07-04', '2014-07-04', '2014-07-01', 1, '10.2014', '', '', '', '', '', ''),
(8, '213', 'wwe2', 1, 'test', 'swsw', 3, 'wswwd', 1, '2014-07-16', '2014-07-17', '2014-07-18', 1, '12.2014', '', '', '', '', '', ''),
(9, 'brq', 'r555', 1, 'test', 'tesst2', 1, 'tst', 1, '2014-07-04', '2014-07-01', '0000-00-00', 0, '07.2014', '', '', '', '', '', ''),
(10, 'BR-001', 'CR-001', 5, 'Prototype', 'Prototype', 2, 'Bobo', 1, '2014-06-01', '2014-06-06', '2014-06-16', 1, '07.2014', '', '', '', '', '', ''),
(11, 'BR-002', 'CR-002', 5, 'GN', 'GN Drive', 2, 'Bobo', 3, '2014-07-01', '2014-07-02', '2014-07-08', 1, '07.2014', '', '', '', '', '', ''),
(12, 'BR-003', 'CR-003', 4, 'IWSP', 'Strike Pack', 2, 'Aile', 2, '2014-06-09', '2014-06-16', '2014-06-30', 0, '07.2014', '', '', '', '', '', ''),
(13, 'BR-004', 'CR-004', 1, 'RG', 'Universal', 2, 'Fajar', 3, '2014-07-01', '2014-07-02', '2014-07-08', 1, '07.2014', '', '', '', '', '', ''),
(14, 'BR-005', 'CR-005', 3, 'Delta', 'Delta Project', 1, 'Quattro', 2, '2014-04-01', '2014-04-08', '2014-05-01', 0, '07.2014', '', '', '', '', '', ''),
(15, 'BR-35', 'CR-35', 2, 'GT', 'GT-R R35', 2, 'Nissan', 4, '2014-06-01', '2014-06-18', '2014-06-09', 1, '07.2014', '', '', '', '', '', ''),
(16, 'BR-006', 'CR-006', 4, 'Arm Slave', 'Laevateinn', 3, 'Kashim', 1, '2014-05-13', '2014-05-19', '2014-06-20', 1, '07.2014', '', '', '', '', '', ''),
(17, 'BR-007', 'CR-007', 2, 'Mazda', 'RX-7', 3, 'Bobo', 2, '2014-01-01', '2014-01-24', '2014-05-21', 0, '07.2014', '', '', '', '', '', ''),
(18, 'BR-008', 'CR-008', 5, 'Infinity', 'Infinity', 2, 'Emon', 3, '2014-03-04', '2014-03-28', '2014-05-06', 0, '07.2014', '', '', '', '', '', ''),
(19, 'BR-009', 'CR-009', 1, 'Wind', 'Breeze', 2, 'Rifkiansyah', 1, '2014-07-01', '2014-07-09', '2014-07-16', 0, '07.2014', '', '', '', '', '', ''),
(20, 'BR-010', 'CR-010', 1, 'Wind', 'Gale', 1, 'Andri', 4, '2014-07-01', '2014-07-09', '2014-07-31', 0, '07.2014', '', '', '', '', '', ''),
(21, 'BR-011', 'CR-011', 5, 'WInd', 'Storm', 3, 'Fajar', 3, '2014-03-01', '2014-05-05', '2014-06-16', 1, '07.2014', '', '', '', '', '', ''),
(22, 'BR-012', 'CR-012', 3, 'Earth', 'Quake', 1, 'Prestious', 2, '2014-02-21', '2014-03-03', '2014-03-31', 0, '07.2014', '', '', '', '', '', ''),
(23, 'BR-013', 'CR-013', 5, 'Earth', 'Rock', 1, 'Emon', 2, '2014-03-03', '2014-03-10', '2014-03-17', 1, '07.2014', '', '', '', '', '', ''),
(24, 'BR-024', 'CR-024', 5, 'Earth', 'Stone', 1, 'Emon', 1, '2014-03-24', '2014-03-31', '2014-04-07', 1, '07.2014', '', '', '', '', '', ''),
(25, 'BR-014', 'CR-014', 5, 'Earth', 'Marble', 2, 'Bobo', 1, '2014-04-14', '2014-04-21', '2014-04-28', 1, '07.2014', '', '', '', '', '', ''),
(26, 'BR-016', 'CR-016', 2, 'Earth', 'Ground', 3, 'Fajar', 4, '2014-05-08', '2014-07-04', '2014-10-31', 0, '07.2014', '', '', '', '', '', ''),
(27, 'BR-017', 'CR-017', 1, 'Fire', 'Blaze', 1, 'Shana', 2, '2014-07-01', '2014-07-14', '2014-07-30', 0, '07.2014', '', '', '', '', '', ''),
(28, 'BR-018', 'CR-018', 1, 'Fire', 'Inferno', 2, 'Bobo', 3, '2014-07-07', '2014-07-09', '2014-07-30', 0, '07.2014', '', '', '', '', '', ''),
(29, 'BR-019', 'CR-019', 2, 'Fire', 'Sparks', 2, 'Rifkiansyah', 2, '2014-07-01', '2014-07-07', '2014-07-21', 0, '07.2014', '', '', '', '', '', ''),
(30, 'BR-020', 'CR-020', 5, 'Sound', 'Voice', 2, 'Bobo', 1, '2014-05-12', '2014-05-26', '2014-05-30', 1, '07.2014', '', '', '', '', '', ''),
(31, 'BR-021', 'CR-021', 5, 'Sound', 'Sonic', 2, 'Bobo', 3, '2014-06-02', '2014-06-11', '2014-06-25', 1, '07.2014', '', '', '', '', '', ''),
(32, 'BR-022', 'CR-022', 1, 'Voice', 'Whisper', 2, 'Gumi', 2, '2014-05-05', '2014-06-09', '2014-07-01', 1, '07.2014', '', '', '', '', '', ''),
(33, 'BR-023', 'CR-023', 4, 'Voice', 'Mellow', 3, 'Mello', 2, '2014-07-01', '2014-07-07', '2014-07-09', 0, '07.2014', '', '', '', '', '', ''),
(34, 'BR-025', 'CR-025', 3, 'Water', 'Sea', 2, 'Bobo', 1, '2014-04-01', '2014-04-07', '2014-04-14', 0, '07.2014', '', '', '', '', '', ''),
(35, 'BR-026', 'CR-026', 3, 'Water', 'Ocean', 2, 'Bobo', 2, '2014-01-06', '2014-01-13', '2014-01-20', 0, '07.2014', '', '', '', '', '', ''),
(36, 'BR-027', 'CR-027', 3, 'Water', 'River', 2, 'Bobo', 3, '2014-03-03', '2014-04-07', '2014-05-05', 1, '07.2014', '', '', '', '', '', ''),
(37, 'BR-028', 'CR-028', 4, 'Water', 'Lake', 2, 'Bobo', 3, '2014-05-05', '2014-05-12', '2014-07-07', 1, '07.2014', '', '', '', '', '', ''),
(38, 'BR-029', 'CR-029', 2, 'Water', 'Puddle', 1, 'Emon', 4, '2014-07-01', '2014-07-07', '2014-07-14', 0, '07.2014', '', '', '', '', '', ''),
(39, 'BR-030', 'CR-030', 5, 'Water', 'Stream', 3, 'Test', 1, '2014-02-03', '2014-02-10', '2014-02-17', 1, '07.2014', '', '', '', '', '', ''),
(40, 'BR-031', 'CR-031', 2, 'Water', 'Steam', 2, 'Gabe Newell', 2, '2014-07-04', '2014-07-07', '2014-07-21', 0, '07.2014', '', '', '', '', '', ''),
(41, 'BR-032', 'CR-032', 3, 'Ice', 'Blizzard', 2, 'Bobo', 3, '2014-04-01', '2014-05-08', '2014-05-12', 0, '07.2014', '', '', '', '', '', ''),
(42, 'BR-033', 'CR-033', 2, 'Ice', 'Snow', 2, 'Rifkiansyah Meidian Cahyaatmaja', 3, '2014-07-07', '2014-07-21', '2014-07-28', 1, '07.2014', '', '', '', '', '', ''),
(43, 'BR-034', 'CR-034', 3, 'Zero', 'Wing', 2, 'Heero Yuy', 3, '2014-01-13', '2014-03-03', '2014-07-01', 0, '07.2014', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE IF NOT EXISTS `tbl_file` (
  `file_ba` int(127) NOT NULL,
  `file_ts` varchar(127) NOT NULL,
  `file_testscenario` varchar(127) NOT NULL,
  `file_brs` varchar(127) NOT NULL,
  `file_srs` varchar(127) NOT NULL,
  `file_mom` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

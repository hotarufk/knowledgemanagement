-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2014 at 12:17 PM
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
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `key_achievement` int(11) NOT NULL,
  `month_of_register` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `tbl_data`
--

INSERT INTO `tbl_data` (`id`, `no_br`, `cr_number`, `status`, `reflex`, `application_name`, `user`, `departement_PIC`, `IT_testing_PIC`, `request_date`, `start_date`, `end_date`, `key_achievement`, `month_of_register`) VALUES
(5, '12', '232', 1, 'wwdwd', 'dwdwdw', 1, 'sdsds', 2, '0000-00-00', '0000-00-00', '0000-00-00', 1, '06.2015'),
(6, 'wda', 'wdw', 1, 'dwad', 'wdwd', 1, 'sdsdadas', 1, '2014-07-14', '2014-07-17', '2014-07-04', 1, '07.2014'),
(7, '3434', 'rfrf', 1, 'frfrfrf', 'test', 2, 'rfrfr', 1, '2014-07-04', '2014-07-04', '2014-07-01', 1, '10.2014'),
(8, '213', 'wwe2', 1, 'test', 'swsw', 3, 'wswwd', 1, '2014-07-16', '2014-07-17', '2014-07-18', 1, '12.2014'),
(9, 'brq', 'r555', 1, 'test', 'tesst2', 1, 'tst', 1, '2014-07-04', '2014-07-01', '0000-00-00', 0, '07.2014'),
(10, '', '', 0, NULL, '', 1, '', 1, '0000-00-00', '0000-00-00', NULL, 0, ''),
(12, 'wswswss', '2s23es', 1, 'swsw', 'wswswss', 1, '', 1, '0000-00-00', '0000-00-00', '2014-07-08', 0, '07.2014'),
(13, 'ccc', 'rcrr', 1, 'rfrw', 'frwfrfrf', 1, '', 3, '0000-00-00', '0000-00-00', '2014-06-10', 1, '07.2014'),
(14, 'ccc', 'rcrr', 1, 'rfrw', 'frwfrfrf', 1, '', 3, '2014-07-08', '2014-07-02', '2014-07-01', 1, '07.2014'),
(15, 'ccc', 'rcrr', 1, 'sesuatu', 'frwfrfrf', 2, '', 3, '2014-07-01', '2014-07-03', '2014-07-02', 1, '07.2014'),
(16, '1ee12e', '1311', 1, 'sesuatu', 'fwfr525', 1, 'sesuatu nih', 1, '2014-07-01', '2014-07-10', '2014-07-26', 0, '07.2014'),
(17, '23r', '234', 5, 'rfr3f3', 'rfrw', 2, '3fr3r43', 1, '2014-07-16', '2014-07-24', '2014-07-31', 0, '07.2014'),
(18, 'de', 'ded', 3, 'sesuatu', 'eded', 2, 'adadwdaw', 1, '2014-07-15', '2014-07-19', '2014-07-31', 0, '07.2014'),
(19, 'de', 'ded', 4, 'eded', 'eded', 1, 'wsw', 2, '2014-07-01', '2014-07-02', '2014-07-03', 1, '09.2014'),
(20, 'de', 'ded', 4, 'eded', 'eded', 1, 'wsw', 2, '2014-07-01', '2014-07-02', '2014-07-03', 1, '09.2014'),
(21, 'de', 'ded', 4, 'eded', 'eded', 1, 'wsw', 2, '2014-07-01', '2014-07-02', '2014-07-03', 1, '09.2014'),
(22, 'de', 'ded', 4, 'eded', 'eded', 1, 'wsw', 2, '2014-07-01', '2014-07-02', '2014-07-03', 1, '09.2014'),
(23, 'de', 'ded', 4, 'eded', 'eded', 1, 'wsw', 2, '2014-07-01', '2014-07-02', '2014-07-03', 1, '09.2014'),
(24, 'de', 'ded', 4, 'eded', 'eded', 1, 'wsw', 2, '2014-07-01', '2014-07-02', '2014-07-03', 1, '09.2014'),
(25, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '0000-00-00', '2014-07-01', '2014-07-19', 1, '09.2014'),
(26, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '0000-00-00', '2014-07-01', '2014-07-19', 1, '09.2014'),
(27, 'efvvv', 'vevvrv', 1, 'evevv', 'erverv', 2, 'efefer', 2, '2014-07-08', '2014-07-09', '2014-07-11', 1, '10.2014'),
(28, 'efvvv', 'vevvrv', 1, 'evevv', 'erverv', 2, 'efefer', 2, '2014-07-09', '2014-07-10', '2014-07-11', 1, '07.2014'),
(29, 'qdqdq', 'sdc wc wc', 4, 'cWECW', 'WCWECW', 3, 'EWWECcw', 4, '2014-05-01', '2014-06-24', '2014-07-01', 0, '07.2014'),
(30, 'qdqdq', 'sdc wc wc', 4, 'cWECW', 'WCWECW', 3, 'EWWECcw', 4, '2014-07-01', '2014-07-02', '2014-07-03', 0, '07.2014'),
(31, 'qdqdq', 'sdc wc wc', 4, 'cWECW', 'WCWECW', 3, 'EWWECcw', 4, '2014-07-17', '2014-07-24', '2014-07-26', 0, '08.2014'),
(32, 'qdqdq', 'sdc wc wc', 4, 'cWECW', 'WCWECW', 3, 'EWWECcw', 4, '2014-07-01', '2014-07-02', '2014-07-03', 0, '07.2014'),
(33, 'afef', 'fwfwef', 1, 'wfwefwe', 'wefewf', 2, 'wfwefwe', 1, '2014-07-01', '2014-07-02', '2014-07-03', 1, '07.2014'),
(34, 'afef', 'fwfwef', 1, 'wfwefwe', 'wefewf', 2, 'wfwefwe', 1, '2014-07-01', '2014-07-02', '2014-07-03', 1, '07.2014'),
(35, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '2014-07-01', '2014-07-02', '2014-07-03', 1, '09.2014'),
(36, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '2014-07-01', '2014-07-02', '2014-07-03', 1, '09.2014'),
(37, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '2014-07-01', '2014-07-02', '2014-07-03', 1, '09.2014'),
(38, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '2014-07-01', '2014-07-02', '2014-07-03', 1, '09.2014'),
(39, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '2014-07-01', '2014-07-02', '2014-07-03', 1, '09.2014'),
(40, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '2014-07-01', '2014-07-02', '2014-07-03', 1, '09.2014'),
(41, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '2014-07-01', '2014-07-02', '2014-07-03', 1, '09.2014'),
(42, '3434', 'rfrf', 1, 'frfrfrf', 'test', 2, 'rfrfr', 1, '2014-07-04', '2014-07-04', '2014-07-04', 1, '10.2014'),
(43, 'kvjvrgrgrergrege', 'ergre', 1, 'regergerge', 'gergreg', 2, 'ergegerg', 1, '2014-07-01', '2014-07-01', '2014-07-01', 0, '234234'),
(44, 'kvjvrgrgrergrege', 'ergre', 1, 'regergerge', 'gergreg', 2, 'ergegerg', 1, '2014-07-01', '2014-07-01', '2014-07-01', 0, '07.2014'),
(45, 'kvjvrgrgrergrege', 'ergre', 1, 'regergerge', 'gergreg', 2, 'ergegerg', 1, '2014-07-01', '2014-07-10', '2026-07-01', 0, '07.2014'),
(46, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '0001-00-01', '0001-01-01', '0001-01-01', 1, '09.2014'),
(47, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '0001-00-01', '0001-01-01', '0001-01-01', 1, '09.2014'),
(48, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '0000-00-01', '2014-07-23', '2014-07-31', 1, '09.2014'),
(49, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '0000-00-01', '2014-07-01', '2014-07-01', 1, '09.2014'),
(50, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '0000-00-01', '2014-07-01', '2014-07-01', 1, '09.2014'),
(51, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '0000-00-00', '0000-00-00', '2014-07-01', 1, '09.2014'),
(52, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '0000-00-00', '0000-00-00', '2014-07-01', 1, '09.2014'),
(53, 'de', 'ded', 3, 'eded', 'eded', 1, 'wsw', 2, '0000-00-00', '0000-00-00', '0000-00-00', 1, '09.2014'),
(54, '123w', 'qwdqw23', 1, 'sxqecfeww', 'eefewf', 2, 'wefwefwe', 1, '2014-07-01', '2014-07-01', '2014-07-01', 0, '07.2014'),
(55, '123w', 'qwdqw23', 1, 'sxqecfeww', 'eefewf', 2, 'wefwefwe', 1, '2014-07-01', '2014-07-01', '2014-07-01', 0, '07.2014'),
(56, '123w', 'qwdqw23', 1, 'sxqecfeww', 'eefewf', 2, 'wefwefwe', 1, '2014-07-01', '2014-07-01', '2014-07-01', 0, '07.2014'),
(57, '123', '31deee', 1, '13zwszws', 'wdx2dx23', 2, '2exdwx', 1, '2014-07-01', '2014-07-01', '2014-07-01', 0, '07.2014'),
(58, '123', '31deee', 1, '13zwszws', 'wdx2dx23', 2, '2exdwx', 1, '2014-07-01', '2014-07-01', '2014-07-01', 0, '07.2014'),
(59, '123', '31deee', 1, '13zwszws', 'wdx2dx23', 2, '2exdwx', 1, '2014-07-01', '2014-07-01', '2014-07-01', 0, '07.2014'),
(60, '133s', '2s2xzs', 1, '2wzs2wz2', '2z2wz2z2sz', 2, '2wz2', 1, '2014-07-01', '2014-07-01', '2014-07-02', 0, '06.2014'),
(61, '133s', '2s2xzs', 1, '2wzs2wz2', '2z2wz2z2sz', 2, '2wz2', 1, '2014-07-01', '2014-07-01', '2014-07-02', 0, '06.2014'),
(62, 'weffef', 'dc', 1, 'wfewf', 'wefwwf', 3, 'wefefw', 2, '2014-08-01', '0000-00-00', '0000-00-00', 0, '08.2014'),
(63, '12', '232', 1, 'wwdwd', 'dwdwdw', 1, 'sdsds', 2, '0000-00-00', '0000-00-00', '0000-00-00', 1, '06.2015');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE IF NOT EXISTS `tbl_file` (
  `id` int(255) NOT NULL,
  `file_ba` varchar(127) NOT NULL,
  `file_ts` varchar(127) NOT NULL,
  `file_testscenario` varchar(127) NOT NULL,
  `file_brs` varchar(127) NOT NULL,
  `file_srs` varchar(127) NOT NULL,
  `file_mom` varchar(127) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `project_id_2` (`id`),
  KEY `project_id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_file`
--

INSERT INTO `tbl_file` (`id`, `file_ba`, `file_ts`, `file_testscenario`, `file_brs`, `file_srs`, `file_mom`) VALUES
(5, 'C:\\xampp\\htdocs\\KnowledgeManagement\\knowledgemanagement\\document\\file_ba/file_ba-5.docx', '', 'C:\\xampp\\htdocs\\KnowledgeManagement\\knowledgemanagement\\document\\file_testscenario/file_testscenario-5.docx', '', '', ''),
(6, '', '', 'C:\\xampp\\htdocs\\KnowledgeManagement\\knowledgemanagement\\protected/../document/file_testscenarioLEMBAR PENGESAHAN.docx.applicati', '', '', ''),
(7, '', '', '', '', '', ''),
(8, '', '', 'C:\\xampp\\htdocs\\KnowledgeManagement\\knowledgemanagement\\protected/../document/file_testscenarioLEMBAR PENGESAHAN.docx.applicati', '', '', ''),
(10, '', '', 'C:\\xampp\\htdocs\\KnowledgeManagement\\knowledgemanagement\\protected/../document/file_testscenarioLEMBAR PENGESAHAN.docx.applicati', '', '', ''),
(13, '', '', '', '', '', ''),
(14, '', '', 'C:\\xampp\\htdocs\\KnowledgeManagement\\knowledgemanagement\\document\\file_testscenario/file_testscenario-14.docx', '', '', ''),
(51, '', '', '', '', '', ''),
(52, '', '', '', '', '', ''),
(62, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE IF NOT EXISTS `tbl_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `Jenis` int(1) NOT NULL,
  `Keterangan` text NOT NULL,
  `timestamp` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`id`, `user`, `Jenis`, `Keterangan`, `timestamp`) VALUES
(1, 1, 1, 'test ini berhasil ga', '0000-00-00'),
(2, 1, 1, 'test ini berhasil ga', '2014-07-22'),
(3, 1, 1, 'Data dengan ID55 telah dibuat', '2014-07-23'),
(4, 1, 1, 'Data dengan ID56 telah dibuat', '2014-07-23'),
(5, 1, 1, 'Data dengan ID57 telah dibuat', '2014-07-23'),
(6, 1, 1, 'Data dengan ID58 telah dibuat', '2014-07-23'),
(7, 1, 1, 'Data dengan ID59 telah dibuat', '2014-07-23'),
(8, 1, 1, 'Data dengan ID 60 telah dibuat', '2014-07-23'),
(9, 1, 1, 'Data dengan ID 61 telah dibuat', '2014-07-23'),
(10, 1, 2, 'data dengan id 62 telah di update', '2014-08-08'),
(11, 1, 3, 'data dengan id 62 telah di delete oleh user dengan id 1', '2014-08-08'),
(12, 1, 1, 'Data dengan ID 62 telah dibuat', '2014-08-20'),
(13, 1, 3, 'data dengan id 4 telah di delete oleh user dengan id 1', '2014-08-20'),
(14, 1, 2, 'data dengan id 63 telah di update', '2014-08-20'),
(15, 1, 2, 'data dengan id 9 telah di update', '2014-08-20');

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
(1, 'emon', 'ganteng', 'andri', 0),
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

--
-- Constraints for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD CONSTRAINT `tbl_file_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tbl_data` (`id`);

--
-- Constraints for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD CONSTRAINT `tbl_log_ibfk_1` FOREIGN KEY (`user`) REFERENCES `tbl_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

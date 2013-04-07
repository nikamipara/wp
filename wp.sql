create schema wp;
-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2013 at 07:59 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `stared`
--

CREATE TABLE IF NOT EXISTS `stared` (
  `username` varchar(10) DEFAULT NULL,
  `word` varchar(30) DEFAULT NULL,
  KEY `username` (`username`),
  KEY `word` (`word`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stared`
--

INSERT INTO `stared` (`username`, `word`) VALUES
('nikunj', 'hello'),
('parthshah', 'very'),
('parthshah', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `username` varchar(10) NOT NULL,
  `test_id` varchar(30) NOT NULL,
  `marks` int(4) NOT NULL,
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`username`, `test_id`, `marks`) VALUES
('nikunj', '101', 25),
('parthshah', '101', 20),
('parthshah', '102', 55),
('parthshah', '103', 35),
('parthshah', '104', 85),
('parthshah', '105', 65),
('nikamipara', '101', 99),
('nikamipara', '105', 59),
('nikamipara', '107', 89),
('nikamipara', '110', 62),
('nikamipara', '109', 62);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(10) NOT NULL,
  `Gender` char(7) NOT NULL,
  `birth_date` date NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` char(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `Gender`, `birth_date`, `first_name`, `last_name`, `password`, `email`, `country`) VALUES
('nikamipara', 'male', '2013-04-03', 'Nikunj', 'Amipara', 'hello123', 'nikamipara29@gmail.com', 'India'),
('nikunj', 'Male', '2010-06-03', 'Nuikunj', 'Amipara', 'nikunj', 'nikunj@dab.com', 'india'),
('NIKUNJ123', 'male', '2013-05-01', 'Nikunj', 'Amipara', '123123', 'nikamipara29@gmail.com', 'India'),
('parthshah', 'Female', '2013-04-03', 'parth', 'shah', 'ps123', 'ps@dabbang.com', 'india');

-- --------------------------------------------------------

--
-- Table structure for table `word`
--

CREATE TABLE IF NOT EXISTS `word` (
  `word` varchar(30) NOT NULL,
  `meaning` varchar(100) NOT NULL,
  `eg` varchar(200) NOT NULL,
  `top100` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`word`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `word`
--

INSERT INTO `word` (`word`, `meaning`, `eg`, `top100`) VALUES
('hello', 'Used as a greeting', 'every morning they exchanged polite hellos', 0),
('very', 'Used as an intensifier', 'she was very gifted ;  he played very well', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stared`
--
ALTER TABLE `stared`
  ADD CONSTRAINT `stared_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `stared_ibfk_2` FOREIGN KEY (`word`) REFERENCES `word` (`word`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

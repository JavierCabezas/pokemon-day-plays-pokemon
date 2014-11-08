-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2014 at 10:16 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pp`
--

-- --------------------------------------------------------

--
-- Table structure for table `command`
--

CREATE TABLE IF NOT EXISTS `command` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(25) NOT NULL,
  `time` varchar(10) NOT NULL,
  `game` varchar(20) NOT NULL,
  `button` varchar(20) NOT NULL,
  `ip` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `command`
--

INSERT INTO `command` (`id`, `nick`, `time`, `game`, `button`, `ip`) VALUES
(22, 'Javier', '02:11:41', 'gba', 'R', '::1'),
(23, 'Javier', '02:11:42', 'gba', 'L', '::1'),
(24, 'Javier', '02:11:43', 'gba', 'B', '::1'),
(25, 'Javier', '02:11:45', 'gba', 'A', '::1'),
(26, 'Javier', '02:11:46', 'gba', 'Down', '::1'),
(27, 'Javier', '02:11:48', 'gba', 'Right', '::1'),
(28, 'Javier', '02:11:49', 'gba', 'Left', '::1'),
(29, 'Javier', '02:11:50', 'gba', 'Up', '::1'),
(30, 'Javier', '02:11:53', 'gba', 'Down', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `democracy`
--

CREATE TABLE IF NOT EXISTS `democracy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_system_status` int(11) NOT NULL,
  `repeat` int(11) NOT NULL DEFAULT '1',
  `keypress` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_system_status` (`id_system_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `system_status`
--

CREATE TABLE IF NOT EXISTS `system_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `time` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `system_status`
--

INSERT INTO `system_status` (`id`, `status`, `time`) VALUES
(1, 0, '0'),
(31, 1, '1415480202'),
(32, 0, '1415480206'),
(33, 1, '1415480211'),
(34, 0, '1415480216'),
(35, 1, '1415480220'),
(36, 0, '1415480226'),
(37, 1, '1415480231'),
(38, 0, '1415480385'),
(39, 1, '1415480392');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `democracy`
--
ALTER TABLE `democracy`
  ADD CONSTRAINT `democracy_ibfk_1` FOREIGN KEY (`id_system_status`) REFERENCES `system_status` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

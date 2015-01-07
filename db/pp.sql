-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2015 at 06:24 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `command`
--

INSERT INTO `command` (`id`, `nick`, `time`, `game`, `button`, `ip`) VALUES
(50, 'Javier', '10:11:49', 'gba', 'R', '::1'),
(51, 'Javier', '10:11:50', 'gba', 'R', '::1'),
(52, 'Javier', '10:11:52', 'gba', 'B', '::1'),
(53, 'Javier', '10:11:11', 'gba', 'Down', '::1'),
(54, 'Javier', '10:11:12', 'gba', 'Up', '::1'),
(55, 'Javier', '10:11:13', 'gba', 'Down', '::1'),
(56, 'Javier', '10:11:14', 'gba', 'Down', '::1'),
(57, 'Javier', '10:11:15', 'gba', 'Left', '::1'),
(58, 'Javier', '10:11:09', 'gba', 'R', '::1'),
(59, 'Javier', '10:11:11', 'gba', 'L', '::1'),
(60, 'Javier', '10:11:12', 'gba', 'B', '::1'),
(61, 'Javier', '10:11:13', 'gba', 'A', '::1'),
(62, 'Javier', '10:11:15', 'gba', 'B', '::1'),
(63, 'Javier', '10:11:16', 'gba', 'L', '::1'),
(64, 'Javier', '10:11:37', 'gba', 'L', '::1'),
(65, 'Javier', '10:11:38', 'gba', 'B', '::1'),
(66, 'Javier', '10:11:41', 'gba', 'A', '::1'),
(67, 'Javier', '10:11:42', 'gba', 'B', '::1'),
(68, 'Javier', '10:11:43', 'gba', 'R', '::1'),
(69, 'Javier', '10:11:53', 'gba', 'A', '::1'),
(70, 'Javier', '10:11:55', 'gba', 'B', '::1'),
(71, 'Javier', '10:11:36', 'gba', 'L', '::1'),
(72, 'Javier', '10:11:38', 'gba', 'B', '::1'),
(73, 'Javier', '10:11:40', 'gba', 'A', '::1'),
(74, 'Javier', '10:11:42', 'gba', 'Up', '::1'),
(75, 'Javier', '10:11:44', 'gba', 'Up', '::1'),
(76, 'Javier', '10:11:46', 'gba', 'Up', '::1'),
(77, 'Javier', '10:11:47', 'gba', 'Up', '::1'),
(78, 'Holi', '07:01:36', 'gba', 'Start', '::1'),
(79, 'Holi', '07:01:44', 'gba', 'A', '::1'),
(80, 'Holi', '07:01:46', 'gba', 'B', '::1'),
(81, 'Holi', '07:01:47', 'gba', 'L', '::1'),
(82, 'Holi', '08:01:54', 'gba', 'B', '::1'),
(83, 'Holi', '08:01:55', 'gba', 'A', '::1'),
(84, 'Holi', '08:01:56', 'gba', 'Up', '::1'),
(85, 'Holi', '08:01:24', 'gba', 'B', '::1'),
(86, 'Holi', '08:01:25', 'gba', 'A', '::1'),
(87, 'Holi', '08:01:05', 'gba', 'L', '::1'),
(88, 'Holi', '08:01:06', 'gba', 'B', '::1'),
(89, 'Holi', '08:01:07', 'gba', 'A', '::1'),
(90, 'Holi', '08:01:13', 'gba', 'R', '::1'),
(91, 'holi', '06:01:02', 'gba', 'R', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `democracy`
--

CREATE TABLE IF NOT EXISTS `democracy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_system_status` int(11) NOT NULL,
  `iteration` int(11) NOT NULL DEFAULT '1',
  `keypress` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_system_status` (`id_system_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `democracy`
--

INSERT INTO `democracy` (`id`, `id_system_status`, `iteration`, `keypress`) VALUES
(26, 29, 1, 'r'),
(27, 29, 1, 'r'),
(28, 29, 1, 'x'),
(29, 31, 1, 'w'),
(30, 31, 1, 's'),
(31, 31, 1, 's'),
(32, 31, 1, 'a'),
(33, 39, 1, 'l'),
(34, 39, 1, 'x'),
(35, 45, 1, 'z'),
(36, 45, 1, 'x'),
(37, 73, 1, 'm'),
(38, 73, 1, 'z'),
(39, 73, 1, 'x'),
(40, 73, 1, 'l'),
(41, 73, 1, 'x'),
(42, 73, 1, 'z'),
(43, 73, 1, 'w'),
(44, 73, 1, 'x'),
(45, 73, 1, 'z'),
(46, 73, 1, 'l'),
(47, 73, 1, 'x'),
(48, 73, 1, 'z'),
(49, 73, 1, 'r'),
(50, 73, 1, 'r');

-- --------------------------------------------------------

--
-- Table structure for table `system_status`
--

CREATE TABLE IF NOT EXISTS `system_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `time` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `system_status`
--

INSERT INTO `system_status` (`id`, `status`, `time`) VALUES
(1, 0, '0'),
(28, 1, '1415741183'),
(29, 0, '1415741208'),
(30, 1, '1415741228'),
(31, 0, '1415741231'),
(32, 1, '1415742448'),
(33, 0, '1415742453'),
(34, 1, '1415742458'),
(35, 0, '1415742463'),
(36, 1, '1415742467'),
(37, 0, '1415742601'),
(38, 1, '1415742606'),
(39, 0, '1415742610'),
(40, 1, '1415742613'),
(41, 0, '1415742618'),
(42, 1, '1415742621'),
(43, 0, '1415742626'),
(44, 1, '1415742815'),
(45, 0, '1415742831'),
(46, 1, '1415742847'),
(47, 0, '1415742873'),
(48, 1, '1415742889'),
(49, 0, '1415742917'),
(50, 1, '1415742932'),
(51, 0, '1415742948'),
(52, 1, '1415743361'),
(53, 0, '1415743374'),
(54, 1, '1415743387'),
(55, 0, '1415743400'),
(56, 1, '1415743414'),
(57, 0, '1415743428'),
(58, 1, '1415743441'),
(59, 0, '1415743455'),
(60, 1, '1415743470'),
(61, 0, '1415743483'),
(62, 1, '1415743497'),
(63, 0, '1415743511'),
(64, 1, '1415743526'),
(65, 0, '1415743540'),
(66, 1, '1415743554'),
(67, 0, '1415743567'),
(68, 1, '1415743581'),
(69, 0, '1415743605'),
(70, 1, '1415743619'),
(71, 0, '1415743632'),
(72, 1, '1415743647'),
(73, 0, '1415743660');

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

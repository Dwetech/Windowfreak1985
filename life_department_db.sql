-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2014 at 05:47 AM
-- Server version: 5.5.20
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `life_department_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('admin','user') NOT NULL,
  `agency_id` int(11) NOT NULL DEFAULT '0',
  `first_name` varchar(255) NOT NULL DEFAULT '0',
  `last_name` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `phone_no` varchar(255) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  `receive_email` enum('Y','N') NOT NULL,
  `cookie_rand` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci' AUTO_INCREMENT=38 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `type`, `agency_id`, `first_name`, `last_name`, `email`, `password`, `phone_no`, `create_date`, `receive_email`, `cookie_rand`) VALUES
(1, 'admin', 0, 'First Name', 'Last Name', 'admin@admin.com', '123123', '', '0000-00-00 00:00:00', 'N', '3b6a3046087aec20c6302376dc5017a1'),
(4, 'user', 1, 'first', 'last', 'user@user.com', '123123', '111111111', '2014-09-13 21:27:36', 'Y', ''),
(8, 'admin', 0, 'First Name', 'Last Name', 'email@email.com', '123123', '88576587676', '2014-09-14 15:30:06', 'N', 'fae7799fa19a3a1e39b840dd6a1ad976'),
(11, 'admin', 0, 'Fazil', 'Azimm', 'me@rafi.tr', '123123', '9977545', '2014-09-14 15:34:10', 'Y', ''),
(12, 'admin', 0, 'Hamidpuri', 'Shuvo', 'hamdi@shuvo.mota', '123123', '4356568', '2014-09-14 15:40:10', 'Y', ''),
(13, 'admin', 0, 'Kumro', 'Potas', 'hamid@shuvo.mot', '123123', '4356568', '2014-09-14 15:40:32', 'N', ''),
(14, 'user', 0, 'Mota', 'Shuvo', 'mota@suvo.co', '123123', '4356568', '2014-09-14 15:40:46', 'N', ''),
(15, 'admin', 0, 'Lumia', '1020', 'lumia@1020.com', '10201020', '10201020', '2014-09-14 15:41:06', 'Y', ''),
(16, 'admin', 0, 'Nokia Lumia', '1020', 'nokialumia@1020.com', '10201020', '10201020', '2014-09-14 15:41:13', 'N', ''),
(19, 'admin', 0, 'UIYUYU', 'UYFGHCG', 'rafi@drdrb.cdm', 'eminem', '10201020', '2014-09-14 15:53:17', 'N', ''),
(20, 'admin', 0, 'TYTYTYTY', 'GGFGFGF', 'c4633133@fdrb.cdm', 'eminem', '10201020', '2014-09-14 15:53:23', 'Y', ''),
(21, 'admin', 0, 'UYTREWQ', 'TTTTT', 'rafi@dwetsech.com', 'eminem', '10201020', '2014-09-14 15:53:27', 'N', ''),
(26, 'user', 2, '2', 'Name', 'me@rafi.pro', '123123123', '234234234', '2014-09-14 19:24:29', 'Y', ''),
(27, 'user', 1, '3User', 'Name', 'me@rafi.prp', '123456', '10201020', '2014-09-14 19:25:03', 'Y', ''),
(28, 'user', 1, '4User', 'Name', 'mee@rafi.pro', 'eminem', '9977545', '2014-09-14 19:26:19', 'Y', ''),
(29, 'user', 1, 'Kumro', 'Potas', 'asdf@adf.co', 'eminem', '88576587676', '2014-09-14 19:26:36', 'Y', ''),
(30, 'user', 1, 'First Name', 'Last Name', 'admin@admin.com', 'eminem', '9977545', '2014-09-14 19:26:52', 'Y', ''),
(33, 'user', 2, 'Faaozul', 'Aazim', 'me@rafi.pto', 'eminem', '10201020', '2014-09-14 19:27:57', 'Y', ''),
(34, 'user', 2, 'First Namee', 'Potass', 'rafi@dwetech.cnm', '123123', '10201020', '2014-09-14 19:29:13', 'Y', ''),
(36, 'user', 4, 'Firstt Name', 'Azimmr', 'aadmin@admin.com', '123123', '4356568', '2014-09-14 19:30:27', 'Y', ''),
(37, 'admin', 0, 'Faozull', 'Potas', 'rafi@dwetech.com', '999888', '10201020', '2014-09-14 19:47:00', 'N', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

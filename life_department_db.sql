-- --------------------------------------------------------
-- Host:                         192.168.2.104
-- Server version:               5.5.38-0ubuntu0.14.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             8.3.0.4814
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table life_department_db.agency
DROP TABLE IF EXISTS `agency`;
CREATE TABLE IF NOT EXISTS `agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_name` varchar(255) DEFAULT NULL,
  `primary_contact` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `phone_no` varchar(255) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

-- Dumping data for table life_department_db.agency: ~0 rows (approximately)
DELETE FROM `agency`;
/*!40000 ALTER TABLE `agency` DISABLE KEYS */;
INSERT INTO `agency` (`id`, `agency_name`, `primary_contact`, `email`, `phone_no`, `create_date`) VALUES
	(1, 'Engle Insurance', 'test@test.com', 'scott@agencyname.net', '555-123-4567	', '0000-00-00 00:00:00'),
	(2, 'Rafi', 'Dhaka', 'me@rafi.pro', '0192877746', '2014-09-13 20:36:09'),
	(3, 'Rafi', '968576', 'me@rafi.pro', '9878980', '2014-09-13 20:38:45');
/*!40000 ALTER TABLE `agency` ENABLE KEYS */;


-- Dumping structure for table life_department_db.banner
DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table life_department_db.banner: ~0 rows (approximately)
DELETE FROM `banner`;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;


-- Dumping structure for table life_department_db.leads
DROP TABLE IF EXISTS `leads`;
CREATE TABLE IF NOT EXISTS `leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL DEFAULT '0',
  `last_name` varchar(255) NOT NULL DEFAULT '0',
  `lead_result` enum('Y','N') NOT NULL,
  `call_time` varchar(50) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `ntoes` text NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table life_department_db.leads: ~0 rows (approximately)
DELETE FROM `leads`;
/*!40000 ALTER TABLE `leads` DISABLE KEYS */;
/*!40000 ALTER TABLE `leads` ENABLE KEYS */;


-- Dumping structure for table life_department_db.starter
DROP TABLE IF EXISTS `starter`;
CREATE TABLE IF NOT EXISTS `starter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `starter` text NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Dumping data for table life_department_db.starter: ~0 rows (approximately)
DELETE FROM `starter`;
/*!40000 ALTER TABLE `starter` DISABLE KEYS */;
INSERT INTO `starter` (`id`, `starter`, `create_date`) VALUES
	(1, 'conversation', '2014-09-13 19:02:53'),
	(4, 'ok', '2014-09-13 19:26:33'),
	(7, 'rafi', '2014-09-13 19:31:55'),
	(8, 'asdf', '2014-09-13 19:34:49'),
	(9, 'dfad', '2014-09-13 19:34:52'),
	(10, 'ds', '2014-09-13 19:34:54'),
	(11, 'ssss', '2014-09-13 19:34:57'),
	(13, 'ffff', '2014-09-13 19:34:59'),
	(14, 'dsasdf', '2014-09-13 19:35:01'),
	(15, 'awerness hoise bujhla naki?', '2014-09-13 19:35:03'),
	(16, 'asdf', '2014-09-13 19:35:04'),
	(17, 'fdfsdfs', '2014-09-13 19:35:06'),
	(18, 'ghjk', '2014-09-13 19:35:08'),
	(19, 'dfsgh', '2014-09-13 19:35:09'),
	(20, 'ghjkh', '2014-09-13 19:35:11'),
	(21, 'qwer', '2014-09-13 19:35:13'),
	(22, 'erty', '2014-09-13 19:35:14'),
	(25, 'ami akta valo sele and ami rafi', '2014-09-13 19:37:26'),
	(26, 'huda jinis', '2014-09-13 19:37:29');
/*!40000 ALTER TABLE `starter` ENABLE KEYS */;


-- Dumping structure for table life_department_db.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

-- Dumping data for table life_department_db.user: ~0 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `type`, `agency_id`, `first_name`, `last_name`, `email`, `password`, `phone_no`, `create_date`, `receive_email`, `cookie_rand`) VALUES
	(1, 'admin', 1, 'Abdullah Al', 'Jahid', 'abdullah.al.jahid@gmail.com', '123123', '', '0000-00-00 00:00:00', 'Y', ''),
	(2, 'user', 1, 'Ridwanul', 'Hafiz', 'ridwanul.hafiz@gmail.com', '123123', '172654654', '0000-00-00 00:00:00', '', ''),
	(3, 'user', 1, 'Abdul ', 'Hamid', 'suv0@gmail.com', '123123', '17211654654', '0000-00-00 00:00:00', 'Y', '');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

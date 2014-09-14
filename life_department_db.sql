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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

-- Dumping data for table life_department_db.agency: ~4 rows (approximately)
DELETE FROM `agency`;
/*!40000 ALTER TABLE `agency` DISABLE KEYS */;
INSERT INTO `agency` (`id`, `agency_name`, `primary_contact`, `email`, `phone_no`, `create_date`) VALUES
	(1, 'Lumia 1020', 'DFSDFSD', 'rafi@dwetech.com', '283568436584365487', '2014-09-13 21:01:04'),
	(2, 'What The Heck', 'KHUTYUF', 'asdf@adf.co', '9765r646', '2014-09-13 21:02:05'),
	(9, 'Mesut Kurtis', '968576', 'asdf@adf.com', '9977545', '2014-09-14 19:31:43'),
	(10, '3Agency', 'Dhaka', 'me@rafii.pro', '9977545', '2014-09-14 19:35:50'),
	(11, '1Agency', 'Dhaka', 'agency@email.com', '10201020', '2014-09-14 19:37:12'),
	(12, '2Agency', 'Dhaka', 'agency2@email.com', '10201020', '2014-09-14 19:37:31');
/*!40000 ALTER TABLE `agency` ENABLE KEYS */;


-- Dumping structure for table life_department_db.banner
DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table life_department_db.banner: ~0 rows (approximately)
DELETE FROM `banner`;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` (`id`, `file_name`, `description`, `create_date`) VALUES
	(1, 'banner.jpg', 'asdfasdf', '2014-09-14 20:06:21');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;


-- Dumping structure for table life_department_db.leads
DROP TABLE IF EXISTS `leads`;
CREATE TABLE IF NOT EXISTS `leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `first_name` varchar(255) NOT NULL DEFAULT '0',
  `last_name` varchar(255) NOT NULL DEFAULT '0',
  `lead_result` enum('Y','N') NOT NULL,
  `call_time` varchar(50) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table life_department_db.leads: ~11 rows (approximately)
DELETE FROM `leads`;
/*!40000 ALTER TABLE `leads` DISABLE KEYS */;
INSERT INTO `leads` (`id`, `user_id`, `first_name`, `last_name`, `lead_result`, `call_time`, `phone_no`, `notes`, `create_date`) VALUES
	(1, 3, 'Faozul', 'Azimov', 'Y', '09:00am - 09:30am', '111222', 'asf dsf adsf asdf ds', '2014-09-14 16:26:09'),
	(2, 4, 'Faozul', 'Azimv', 'N', '', '', '', '2014-09-14 16:26:45'),
	(3, 3, 'first name', 'last name', 'Y', '08:30am - 09:00am', '3423423', 'asdfasdfasdf', '2014-09-14 17:27:30'),
	(4, 3, 'f', 'l', 'N', '', '', '', '2014-09-14 17:29:17'),
	(5, 2, 'asdfasd', 'asdfasdf', 'Y', '10:30am - 11:00am', '123213432', 'sdfasdf', '2014-09-14 17:47:01'),
	(6, 4, 'Someone', 'Anyone', 'Y', '12:30pm - 01:00pm', '0796756', 'No Note', '2014-09-14 19:13:19'),
	(7, 4, 'A', 'S', 'N', '03:00pm - 03:30pm', '0796756', 'No Notes', '2014-09-14 19:15:25'),
	(8, 4, 'Faozul', 'Azim', 'Y', '03:30pm - 04:00pm', '6856568i966465', '', '2014-09-14 19:16:12'),
	(9, 4, 'Kumro', 'Tarafder', 'Y', '04:00pm - 04:30pm', 'asdf', 'No Note', '2014-09-14 19:16:54');
/*!40000 ALTER TABLE `leads` ENABLE KEYS */;


-- Dumping structure for table life_department_db.starter
DROP TABLE IF EXISTS `starter`;
CREATE TABLE IF NOT EXISTS `starter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `starter` text NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- Dumping data for table life_department_db.starter: ~18 rows (approximately)
DELETE FROM `starter`;
/*!40000 ALTER TABLE `starter` DISABLE KEYS */;
INSERT INTO `starter` (`id`, `starter`, `create_date`) VALUES
	(1, 'conversation', '2014-09-13 19:02:53'),
	(7, 'rafi', '2014-09-13 19:31:55'),
	(8, 'asdf', '2014-09-13 19:34:49'),
	(9, 'dfad', '2014-09-13 19:34:52'),
	(10, 'ds', '2014-09-13 19:34:54'),
	(11, 'ssss', '2014-09-13 19:34:57'),
	(13, 'ffff', '2014-09-13 19:34:59'),
	(14, 'dsasdf', '2014-09-13 19:35:01'),
	(15, 'awerness hoise bujhla naki?', '2014-09-13 19:35:03'),
	(16, 'asdf', '2014-09-13 19:35:04'),
	(17, 'Fds ds', '2014-09-13 19:35:06'),
	(20, 'ghjkh', '2014-09-13 19:35:11'),
	(21, 'qwer', '2014-09-13 19:35:13'),
	(22, 'Starter Bani 4', '2014-09-13 19:35:14'),
	(25, 'ami akta valo sele and ami rafi kintu', '2014-09-13 19:37:26'),
	(26, 'huda jinis khali', '2014-09-13 19:37:29'),
	(31, 'Starter Bani 2', '2014-09-14 19:44:28'),
	(32, 'Starter Bani 3', '2014-09-14 19:44:32'),
	(33, 'Starter Bani 5', '2014-09-14 19:44:36');
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

-- Dumping data for table life_department_db.user: ~14 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `type`, `agency_id`, `first_name`, `last_name`, `email`, `password`, `phone_no`, `create_date`, `receive_email`, `cookie_rand`) VALUES
	(1, 'admin', 0, 'Abdullah Al', 'Jahid', 'abdullah.al.jahid@gmail.com', '123123', '', '0000-00-00 00:00:00', 'N', '3b6a3046087aec20c6302376dc5017a1'),
	(4, 'user', 1, '1', 'Name', 'rafi_ccj@hotmail.com', '123123', '111111111', '2014-09-13 21:27:36', 'Y', ''),
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
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

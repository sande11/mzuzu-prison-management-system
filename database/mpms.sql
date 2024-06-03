-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2023 at 10:06 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
CREATE TABLE IF NOT EXISTS `actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `action`) VALUES
(1, 'Transported for Trial'),
(2, 'Infirmary Confinement'),
(3, 'Solitary Confinement');

-- --------------------------------------------------------

--
-- Table structure for table `cells`
--

DROP TABLE IF EXISTS `cells`;
CREATE TABLE IF NOT EXISTS `cells` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cell` varchar(100) DEFAULT NULL,
  `prison_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cells`
--

INSERT INTO `cells` (`id`, `cell`, `prison_id`) VALUES
(1, 'Block 1 Cell 1001', 1),
(2, 'Block 1 Cell 1002', 1),
(3, 'Block 1 Cell 1001', 2),
(4, 'Block 1 Cell 1002', 2);

-- --------------------------------------------------------

--
-- Table structure for table `crimes`
--

DROP TABLE IF EXISTS `crimes`;
CREATE TABLE IF NOT EXISTS `crimes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crime` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `crimes`
--

INSERT INTO `crimes` (`id`, `crime`) VALUES
(1, 'Robbery'),
(2, 'Child Abuse'),
(3, 'Murder'),
(4, 'Homicide'),
(5, 'Rape'),
(6, 'Attempt Murder');

-- --------------------------------------------------------

--
-- Table structure for table `inmates`
--

DROP TABLE IF EXISTS `inmates`;
CREATE TABLE IF NOT EXISTS `inmates` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `first_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `middle_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `last_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sex` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `marital_status` varchar(250) NOT NULL,
  `eye_color` text NOT NULL,
  `complexion` text NOT NULL,
  `cell_id` int(11) NOT NULL,
  `sentence` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date DEFAULT NULL,
  `emergency_name` text,
  `emergency_contact` text,
  `emergency_relation` text,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `visiting_privilege` tinyint(1) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cell_id` (`cell_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inmates`
--

INSERT INTO `inmates` (`id`, `code`, `first_name`, `middle_name`, `last_name`, `sex`, `dob`, `address`, `marital_status`, `eye_color`, `complexion`, `cell_id`, `sentence`, `date_from`, `date_to`, `emergency_name`, `emergency_contact`, `emergency_relation`, `photo`, `visiting_privilege`, `added_date`) VALUES
(1, '6231415', 'John', 'D', 'Smith', 'Male', '1990-06-23', 'Sample Address only', 'Married', 'Brown', 'Fair', 1, '2 Year', '2022-05-31', '2024-05-31', 'Will Smith', '09654123987', 'Brother', 'uploads/inmates/1.png?v=1653966405', 1, '2022-05-31 11:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `prisons`
--

DROP TABLE IF EXISTS `prisons`;
CREATE TABLE IF NOT EXISTS `prisons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prison` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prisons`
--

INSERT INTO `prisons` (`id`, `prison`) VALUES
(1, 'Men Prison'),
(2, 'Women Prison');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `number` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `code` bigint(20) DEFAULT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `number`, `role`, `status`, `code`, `photo`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$HAfg0BEhjg0H.YGKx1KjgepgxuGYzmua4iCrbxn3pAiMRa.Qg57ua', '09877777777', 1, NULL, NULL, ''),
(3, 'warden', 'warden@gmail.com', '$2y$10$HAfg0BEhjg0H.YGKx1KjgepgxuGYzmua4iCrbxn3pAiMRa.Qg57ua', '0876544533', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inmate_id` int(11) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `relation` varchar(100) DEFAULT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `inmate_id`, `full_name`, `contact`, `relation`, `added_date`) VALUES
(1, 1, 'chikondi james', '0997438634', 'friend', '2023-05-05 09:18:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

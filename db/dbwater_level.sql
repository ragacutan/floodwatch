-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2023 at 08:02 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwater_level`
--

-- --------------------------------------------------------

--
-- Table structure for table `sensor_data`
--

DROP TABLE IF EXISTS `sensor_data`;
CREATE TABLE IF NOT EXISTS `sensor_data` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sensor` int NOT NULL,
  `value` float NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contactNumber` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_type` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `contactNumber`, `user_type`) VALUES
(1, 'user', 'galvejamesian225@gmail.com', 'e065bed9d54db1fee0389e8fa90d5bda', 'Mameltac SCF', '09460335635', 'user'),
(2, 'admin', 'jervinbalcita15@gmail.com', 'e065bed9d54db1fee0389e8fa90d5bda', 'Mameltac SCF', '09460335634', 'admin'),
(3, 'admin', 'admin@gmail.com', 'a8cbf37b097f8b53b433270c98746b0a', '', '09', 'admin'),
(4, 'default', 'default@gmail.com', '877661939771a51386dc5f75d0a69bd1', '', '09', 'user'),
(5, 'test', 'test@gmail.com', '281d5e9f48a413a5fc4c4e4cd2f44cce', '', '09', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `waterstatus`
--

DROP TABLE IF EXISTS `waterstatus`;
CREATE TABLE IF NOT EXISTS `waterstatus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL,
  `water-level` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `waterstatus`
--

INSERT INTO `waterstatus` (`id`, `time`, `water-level`) VALUES
(1, '2023-12-16 12:16:12', 'sensor_4'),
(2, '2023-12-16 12:16:25', 'sensor_1'),
(3, '2023-12-16 12:17:15', 'sensor_2'),
(4, '2023-12-16 12:17:56', 'sensor_3'),
(5, '2023-12-16 12:52:04', 'sensor_2'),
(6, '2023-12-18 07:56:42', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

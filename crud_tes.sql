-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 06, 2021 at 02:01 AM
-- Server version: 10.4.10-MariaDB
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
-- Database: `crud_tes`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_device`
--

DROP TABLE IF EXISTS `table_device`;
CREATE TABLE IF NOT EXISTS `table_device` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_device`
--

INSERT INTO `table_device` (`id`, `code`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'device01', 'Mesin1', '1', '2021-03-05 12:50:18', '2021-03-05 13:45:13', '2021-03-05 13:45:13'),
(2, '0102', 'Device02', '1', '2021-03-05 12:50:18', '2021-03-05 13:43:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_value`
--

DROP TABLE IF EXISTS `table_value`;
CREATE TABLE IF NOT EXISTS `table_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` date DEFAULT NULL,
  `value_1` int(11) DEFAULT NULL,
  `value_2` int(11) DEFAULT NULL,
  `device_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_value`
--

INSERT INTO `table_value` (`id`, `datetime`, `value_1`, `value_2`, `device_id`) VALUES
(1, '2020-01-01', 10, 5, 1),
(2, '2020-01-02', 8, 9, 1),
(3, '2020-01-03', 9, 10, 1),
(4, '2020-01-04', 5, 11, 1),
(5, '2020-01-05', 11, 10, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

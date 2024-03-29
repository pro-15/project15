-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2024 at 04:51 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project15`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `doctor_id` int NOT NULL,
  `user_id` int NOT NULL,
  `booked_datetime` datetime NOT NULL,
  `appo_date` date NOT NULL,
  `appo_time` char(5) NOT NULL,
  `status` varchar(25) NOT NULL,
  `slot` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `doctor_id`, `user_id`, `booked_datetime`, `appo_date`, `appo_time`, `status`, `slot`) VALUES
(69, 1, 1, '2023-10-15 00:51:32', '2023-10-14', '04:00', 'confirm', 'e'),
(68, 1, 1, '2023-10-15 00:50:10', '2023-10-13', '11:00', 'confirm', 'm'),
(67, 1, 1, '2023-10-15 00:47:01', '2023-10-13', '10:45', 'confirm', 'm'),
(65, 1, 1, '2023-10-15 00:42:27', '2023-10-13', '10:30', 'confirm', 'm'),
(82, 1, 1, '2023-10-18 11:25:32', '2023-10-18', '08:00', 'consulted', 'm'),
(64, 1, 1, '2023-10-14 22:14:00', '2023-10-13', '10:15', 'confirm', 'm'),
(63, 1, 1, '2023-10-14 22:11:29', '2023-10-13', '10:00', 'confirm', 'm'),
(78, 1, 1, '2023-10-16 21:18:31', '2023-10-13', '04:15', 'confirm', 'e'),
(79, 1, 1, '2023-10-16 21:21:12', '2023-10-13', '04:30', 'confirm', 'e'),
(81, 1, 1, '2023-10-18 10:10:59', '2023-10-13', '05:00', 'confirm', 'e'),
(83, 1, 1, '2023-10-18 11:26:41', '2023-10-18', '08:15', 'consulted', 'm'),
(84, 1, 1, '2023-10-18 13:36:04', '2023-10-18', '11:30', 'consulted', 'm'),
(85, 1, 1, '2023-10-18 13:39:24', '2023-10-18', '08:00', 'consulted', 'm'),
(86, 1, 1, '2023-10-18 13:42:49', '2023-10-18', '08:00', 'consulted', 'm'),
(87, 1, 1, '2023-10-18 13:51:13', '2023-10-19', '08:00', 'cancelled', 'm'),
(88, 1, 1, '2023-10-20 14:42:30', '2023-10-20', '08:00', 'cancelled', 'm'),
(89, 1, 1, '2023-10-21 11:13:05', '2023-10-21', '08:00', 'cancelled', 'm'),
(90, 1, 1, '2023-10-21 11:47:20', '2023-10-21', '08:15', 'cancelled', 'm'),
(92, 1, 1, '2023-10-22 18:00:41', '2023-10-22', '04:00', 'cancelled', 'e'),
(93, 1, 1, '2023-10-22 19:48:20', '2023-10-22', '09:00', 'cancelled', 'm'),
(94, 1, 1, '2023-10-22 20:06:08', '2023-10-22', '09:15', 'cancelled', 'm'),
(95, 1, 1, '2023-10-22 20:09:20', '2023-10-22', '09:15', 'cancelled', 'm'),
(96, 1, 1, '2023-10-24 01:39:45', '2023-10-24', '08:00', 'cancelled', 'm'),
(97, 1, 1, '2023-10-24 14:33:24', '2023-10-24', '08:00', 'consulted', 'm'),
(98, 1, 1, '2023-10-24 14:55:59', '2023-10-24', '08:00', 'consulted', 'm'),
(99, 1, 1, '2023-10-24 15:04:46', '2023-10-24', '08:15', 'consulted', 'm'),
(102, 1, 10, '2023-10-25 21:44:24', '2023-10-26', '08:00', 'cancelled', 'm'),
(103, 1, 10, '2023-10-25 21:47:55', '2023-10-26', '08:00', 'consulted', 'm'),
(104, 1, 1, '2023-11-02 13:55:07', '2023-11-02', '08:00', 'confirm', 'm'),
(105, 1, 1, '2023-11-02 14:43:29', '2023-11-02', '08:15', 'cancelled', 'm'),
(106, 1, 1, '2023-11-04 01:20:39', '2023-11-04', '08:00', 'consulted', 'm'),
(107, 1, 22, '2023-11-05 20:48:19', '2023-11-05', '09:00', 'consulted', 'm'),
(108, 1, 22, '2023-11-05 20:48:51', '2023-11-05', '09:00', 'consulted', 'm'),
(109, 8, 1, '2024-01-11 14:24:30', '2024-01-11', '10:00', 'consulted', 'm'),
(110, 8, 1, '2024-01-11 15:52:54', '2024-01-11', '06:00', 'paymentpending', 'e'),
(111, 8, 1, '2024-01-11 19:09:49', '2024-01-11', '11:30', 'paymentpending', 'm'),
(112, 8, 1, '2024-01-11 21:26:47', '2024-01-11', '02:15', 'cancelled', 'e'),
(113, 8, 1, '2024-01-11 21:28:10', '2024-01-11', '02:00', 'cancelled', 'e'),
(114, 8, 1, '2024-01-11 21:31:07', '2024-01-11', '02:00', 'confirm', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `image`) VALUES
(1, 'Pediatrics', 'a0c21760267d048062480c20e34081ae_d27ea18d95cdb29a8fef.png'),
(2, 'Gastroenterology', 'gastroenterology.png'),
(3, 'Anesthesiology', 'ce29dde7bcd3246ca501bd1be1228bf1_bf0a6b0afade6a383.png'),
(4, 'Cardiology', '778e691eeac47db6b921696e85e94015_26c6c19143682ff.png'),
(5, 'ENT', 'd4542fecc21fe92fd1d551173def7f68_813287e936ab36c.png'),
(6, 'Neurology', 'd3f9053da9c7ad2f04788a26201feaf0_ca751b0aabd9d1f9.png'),
(7, 'Orthopaedic', '3dff40802eda78d562ac9ed24f8b5c62_1c41a087d6690fe.png'),
(8, 'Psychiatry', '32da7779b5734e58f47fdbb4b2686f75_d5c1142835.png'),
(9, 'Gynaecology', '0ee86bf3e49ffabe8a5814d1b819d624_465b13d5981ebdd.png');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` char(2) NOT NULL,
  `department` varchar(50) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `phone` char(10) NOT NULL,
  `dob` date NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fee` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `gender`, `department`, `qualification`, `address`, `image`, `phone`, `dob`, `description`, `fee`, `username`, `password`) VALUES
(1, 'Dr Jacob Thomas E', 'M', '1', 'MBBS, MD Pediatrics, D.C.H., DNB: Child Health', '1234 Medical Lane, Cityville', 'e541f62abc7068517bb62d928a89cd5a_432df691efbe.jpg', '9876543210', '1984-11-08', 'Experienced pediatrician with a focus on Gastroenterology, Hepatology, and Nutrition', 300, 'jacob', 'pass1234'),
(5, 'Dr Gregory House', 'M', '1', 'MBBS, MD Pediatrics, MCh: Pediatric Surgery', '456 Test Street, Townsville', 'doctors-1.jpg', '9876543211', '1993-11-24', 'Pediatrician specializing in Pediatric Surgery', 0, 'demo', 'test5678'),
(6, 'Dr Deepak Choudhary', 'M', '6', 'MBBS, MD Neurology, DM Neurology', '789 Neuro Lane, Brain City', '83ab9bc7795b67e5d94ca45c915bf476_637376c1e8bd8b68027.jpg', '9876543212', '1999-10-10', 'Respected neurologist with clinical expertise and research focus', 300, 'deepak', 'neuro123'),
(7, 'Dr Priya Patel', 'F', '1', 'MBBS, MD Pediatric Medicine', '456 Pediatric Plaza, Child City', 'ed28cd69cebf12a350f74cd9ee6aea4c_42d06ae30a704213f76.jpg', '9876543213', '1996-10-10', 'Dedicated pediatrician with over 15 years of experience', 300, 'priya', 'kidcare12'),
(8, 'Dr Rajesh Verma', 'M', '2', 'MBBS, MD Gastroenterology, DM Gastroenterology', '789 Gastro Lane, Digest City', 'cd232ac222a0a7a59eee68c018236229_c0e57f32a3f32e21825.jpg', '9876543214', '1965-10-10', 'Highly skilled gastroenterologist with 20+ years of experience', 500, 'rajesh', 'gastro123'),
(9, 'Dr Ananya Singh', 'F', '3', 'MBBS, MD Anesthesiology', '789 Anesthesia Lane, Sedation City', 'adb358bf102db23d8a956a2c7dd0018c_a61d62ec8e9d0a32.jpg', '9876543215', '1895-12-09', 'Board-certified anesthesiologist known for precision and expertise', 500, 'ananya', 'sleepwell'),
(10, 'Dr Aditya Sharma', 'M', '4', 'MBBS, MD Cardiology, DM Cardiology', '789 Heart Lane, Cardio City', '936dad63b96b70df17064fe0055893ed_e804cd6dedf1bb8b93e.jpg', '9876543216', '1990-09-15', 'Renowned cardiologist with over 25 years of experience', 200, 'aditya', 'heart456'),
(11, 'Dr Nandini Iye', 'F', '5', 'MBBS, MS Otorhinolaryngology (ENT)', '789 Ear Nose Throat Lane, Hear City', '75153e8ba73a3707f25d09bf08a8f37b_5bd729544bff39661a.jpg', '9876543217', '1980-10-10', 'Skilled ENT specialist with extensive experience', 200, 'nandini', 'ent789'),
(12, 'Dr Arjun Khanna', 'M', '6', 'MBBS, MD Neurology, DM Neurology', '789 Neuro Lane, Brain City', 'fd2db27a77b5d5c2cfdb83a017425713_b41407aa20c57c958357.jpg', '9876543218', '1970-05-04', 'Dedicated neurologist with a strong commitment to diagnosis and treatment', 200, 'arjun', 'neuro456'),
(13, 'Dr Aparna Gupta', 'F', '7', 'MBBS, MS Orthopedics', '789 Ortho Lane, Bone City', '4b233cdb0a14ebf0170a7bf28ca55c8d_af80417d079f36f559d2.jpg', '9876543219', '1985-01-05', 'Experienced orthopedic surgeon specializing in musculoskeletal health', 200, 'aparna', 'ortho123'),
(14, 'Dr Sanjay Joshi', 'M', '8', 'MBBS, MD Psychiatry', '789 Mind Lane, Mind City', '990d191bca22ae057e62d0816aa6c414_1b4bdc3304ad.jpg', '9876543220', '1989-10-10', 'Compassionate psychiatrist with over 20 years of experience', 200, 'sanjay', 'mind789');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `booking_id` int NOT NULL,
  `amount` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `booking_id` (`booking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `booking_id`, `amount`) VALUES
(11, 69, 300),
(2, 63, 300),
(3, 64, 300),
(4, 65, 300),
(5, 67, 300),
(6, 68, 300),
(15, 78, 300),
(16, 79, 300),
(17, 81, 300),
(18, 82, 300),
(19, 83, 300),
(20, 84, 300),
(21, 85, 300),
(22, 86, 300),
(23, 87, 300),
(24, 88, 300),
(25, 89, 300),
(26, 90, 300),
(27, 92, 300),
(28, 93, 300),
(29, 96, 300),
(30, 97, 300),
(31, 98, 300),
(32, 99, 300),
(33, 100, 300),
(34, 101, 300),
(35, 102, 300),
(36, 103, 300),
(37, 104, 300),
(38, 105, 300),
(39, 106, 300),
(40, 107, 300),
(41, 108, 300),
(42, 109, 500),
(43, 112, 500),
(44, 113, 500),
(45, 114, 500);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
CREATE TABLE IF NOT EXISTS `record` (
  `rid` int NOT NULL AUTO_INCREMENT,
  `did` int NOT NULL,
  `pid` int NOT NULL,
  `m_h` varchar(500) NOT NULL,
  `m_a` varchar(200) NOT NULL,
  `r_mp` varchar(300) NOT NULL,
  `v_s` varchar(200) NOT NULL,
  `lab_results` varchar(200) NOT NULL,
  `bid` int NOT NULL,
  `summary` varchar(300) NOT NULL,
  `p_t` varchar(300) NOT NULL,
  `nextc` date DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`rid`, `did`, `pid`, `m_h`, `m_a`, `r_mp`, `v_s`, `lab_results`, `bid`, `summary`, `p_t`, `nextc`) VALUES
(1, 1, 1, 'sd', 'sdd', 'sdd', 'sd', 'sd', 82, 'sd', 'sdsd', NULL),
(2, 1, 1, 'sdsd', 'sdsd', 'sdsd', 'sd', 'sds', 83, 'sdsd', 'sdsd', NULL),
(4, 1, 1, 'NA', 'fd', 'fdd', 'fdf', 'fdf', 84, 'fd', 'fdf', NULL),
(5, 1, 1, 'g', 'gf', 'fg', 'fg', 'fg', 85, 'fg', 'fg', NULL),
(6, 1, 1, 'gfgf', 'fgf', 'gfg', 'fg', 'fgf', 86, 'gf', 'fgfg', NULL),
(10, 1, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 103, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', NULL),
(9, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 99, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', NULL),
(11, 1, 1, 'gdgdg', 'gdg', 'fgfg', 'gfg', 'gfg', 106, 'gfg', 'dgdg', NULL),
(12, 1, 22, 'fhfg', 'gfg', 'gfg', 'gfg', 'gfg', 107, 'gfgf', 'gfg', '2023-11-15'),
(13, 1, 22, 'dfd', 'dfdfd', 'fd', 'fdf', 'dfd', 108, 'dfd', 'fdf', '2023-11-07'),
(14, 8, 1, 'Mild fever', 'Nill', 'Nill', 'Normal', 'Slight variation in WBC count', 109, 'Viral fever', 'Paracetamol IV - 100ml\nParacetamol Tablets 650mg - (1-1-1) 5 days', '2024-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `sid` int NOT NULL AUTO_INCREMENT,
  `m_start` char(5) NOT NULL,
  `m_end` char(5) NOT NULL,
  `e_start` char(5) NOT NULL,
  `e_end` char(5) NOT NULL,
  `doctor_id` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sid`, `m_start`, `m_end`, `e_start`, `e_end`, `doctor_id`, `date`) VALUES
(2, '10:00', '11:00', '4:00', '6:00', 1, '2023-10-13'),
(3, '08:00', '12:00', '03:00', '07:00', 1, '2023-10-18'),
(4, '08:00', '12:00', '4:00', '07:00', 1, '2023-10-19'),
(5, '08:00', '11:00', '04:00', '07:00', 1, '2023-10-20'),
(11, '8:00', '9:30', '4:00', '5:30', 1, '2023-10-21'),
(12, '9:00', '12:00', '4:00', '7:00', 1, '2023-10-22'),
(13, '8:00', '10:00', '5:00', '8:00', 1, '2023-10-24'),
(14, '8:00', '11:00', '3:00', '6:00', 1, '2023-10-25'),
(15, '8:00', '11:00', '3:00', '6:00', 1, '2023-10-25'),
(16, '8:00', '10:30', '4:00', '7:00', 1, '2023-10-26'),
(17, '8:00', '11:00', '4:00', '7:00', 1, '2023-10-27'),
(18, '6:00', '8:00', '3:00', '6:00', 1, '2023-11-01'),
(19, '8:00', '12:00', '3:00', '6:00', 1, '2023-11-02'),
(20, '8:00', '9:00', '3:00', '4:00', 1, '2023-11-03'),
(21, '8:00', '10:00', '4:00', '7:00', 1, '2023-11-04'),
(22, '9:00', '10:30', '3:00', '6:00', 1, '2023-11-05'),
(23, '10:00', '12:00', '2:00', '6:00', 8, '2024-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` char(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `gender`, `dob`, `email`, `phone`, `password`) VALUES
(1, 'John', 'M', '1995-03-15', 'john@example.com', '9876543210', 'john@123'),
(8, 'Alice', 'F', '1988-07-22', 'alice@example.com', '9876543211', 'alice@123'),
(10, 'David', 'M', '1990-11-03', 'david@example.com', '9876543212', 'david@123'),
(16, 'Emma', 'F', '1998-05-20', 'emma@example.com', '9876543213', 'emma@123'),
(18, 'Ryan', 'M', '1985-09-10', 'ryan@example.com', '9876543214', 'ryan@123'),
(22, 'Sophy', 'F', '1992-12-18', 'sophia@example.com', '9876543215', 'sophy@123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

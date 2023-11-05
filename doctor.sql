-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 05, 2023 at 05:46 AM
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
(1, 'Dr Jacob Thomas E', 'M', '1', 'DM Pediatric Medicine', 'Ernakulam Kerala', 'e541f62abc7068517bb62d928a89cd5a_432df691efbe.jpg', '1234567812', '1984-11-08', 'Has 8 years of Experience post MD, with training in Paediatric Gastroenterology, Hepatology and Nutr', 300, 'jacob', '12345678'),
(5, 'demo dfgdgdhdhdh', 'M', '1', 'MD Pediatric Medicine', 'TEST', 'doctors-1.jpg', '9400673512', '1993-11-24', '', 0, '', ''),
(6, 'Dr Deepak Choudhary', 'M', '6', 'DM, Neurology', 'ekm', '83ab9bc7795b67e5d94ca45c915bf476_637376c1e8bd8b68027.jpg', '1234567890', '1999-10-10', ' Dr. Deepak Choudhary is a highly respected neurologist known for his clinical expertise and researc', 300, 'deepak', '12345678'),
(7, 'Dr Priya Patel', 'F', '1', 'MD Pediatric Medicine', 'Ekm', 'ed28cd69cebf12a350f74cd9ee6aea4c_42d06ae30a704213f76.jpg', '1234567890', '1996-10-10', 'Dr. Priya Patel is a dedicated pediatrician with more than 15 years of experience in caring for the ', 300, '', ''),
(8, 'Dr Rajesh Verma', 'M', '2', 'MD Gastroenterology', 'ekm', 'cd232ac222a0a7a59eee68c018236229_c0e57f32a3f32e21825.jpg', '1234567890', '1965-10-10', 'Dr. Rajesh Verma is a highly skilled gastroenterologist with over 20 years of experience in diagnosi', 500, '', ''),
(9, 'Dr Ananya Singh', 'F', '3', 'MD Anesthesiology', 'ekm', 'adb358bf102db23d8a956a2c7dd0018c_a61d62ec8e9d0a32.jpg', '1234567890', '1895-12-09', 'Dr. Ananya Singh is a board-certified anesthesiologist known for her precision and expertise in admi', 500, '', ''),
(10, 'Dr Aditya Sharma', 'M', '4', 'MD Cardiology', 'ekm', '936dad63b96b70df17064fe0055893ed_e804cd6dedf1bb8b93e.jpg', '1234567890', '1990-09-15', ' Dr. Aditya Sharma is a renowned cardiologist with more than 25 years of experience in the diagnosis', 200, '', ''),
(11, 'Dr Nandini Iye', 'F', '5', 'MS Otorhinolaryngology (ENT)', 'ekm', '75153e8ba73a3707f25d09bf08a8f37b_5bd729544bff39661a.jpg', '1234567890', '1980-10-10', 'Dr. Nandini Iyer is a skilled ENT specialist with extensive experience in treating ear, nose, and th', 200, '', ''),
(12, 'Dr Arjun Khanna', 'M', '6', 'MD Neurology', 'ekm', 'fd2db27a77b5d5c2cfdb83a017425713_b41407aa20c57c958357.jpg', '1234567890', '1970-05-04', ' Dr. Arjun Khanna is a dedicated neurologist with a strong commitment to diagnosing and treating neu', 200, '', ''),
(13, 'Dr Aparna Gupta', 'F', '7', 'MS Orthopedics', 'ekm', '4b233cdb0a14ebf0170a7bf28ca55c8d_af80417d079f36f559d2.jpg', '1234567890', '1985-01-05', 'Dr. Aparna Gupta is an experienced orthopedic surgeon specializing in musculoskeletal health. With 1', 200, '', ''),
(14, 'Dr Sanjay Joshi', 'M', '8', 'MD, Psychiatry', 'ekm', '990d191bca22ae057e62d0816aa6c414_1b4bdc3304ad.jpg', '1234567890', '1989-10-10', 'Dr. Sanjay Joshi is a compassionate psychiatrist with over 20 years of experience in helping patient', 200, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2024 at 10:47 PM
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
-- Database: `tp-final-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(30) NOT NULL,
  `sex` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `phone`, `email`, `dob`, `address`, `sex`) VALUES
('youneshb', 'Younes Habbal', '000', '0540167059', 'example@example.com', '2024-09-22', 'Chlef,Algeria', 'Male'),
('kaddarayanne', 'Kadda Rayane', '000', '123456789', 'example@example.com', '2024-09-22', 'Chlef,Algeria', 'Male'),
('admin0', 'Younes Habbal', '000', '123456789', 'example@example.com', '2024-09-22', 'Chlef,Algeria', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `message` text NOT NULL,
  `sender_id` varchar(20) NOT NULL,
  `reciever_id` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message`, `sender_id`, `reciever_id`, `date`) VALUES
('Hello', 'parent0', 'teacher0', '2024-04-24'),
('Oh Hi!', 'teacher0', 'parent0', '2024-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

DROP TABLE IF EXISTS `parents`;
CREATE TABLE IF NOT EXISTS `parents` (
  `id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fathername` varchar(20) NOT NULL,
  `mothername` varchar(20) NOT NULL,
  `fatherphone` varchar(13) NOT NULL,
  `motherphone` varchar(13) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `password`, `fathername`, `mothername`, `fatherphone`, `motherphone`, `address`) VALUES
('parent0', '000', 'lorum ipsum', 'ipsum lorem', '123456789', '987654321', 'Chlef,Algeria'),
('parent1', '000', 'lorum ipsum', 'ipsum lorem', '0000000000', '987654321', 'Chlef,Algeria'),
('parent3', '000', 'lorum ipsum', 'ipsum lorem', '0000000000', '987654321', 'Chlef,Algeria');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `parentid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `password`, `phone`, `email`, `sex`, `dob`, `address`, `parentid`) VALUES
('student1', 'Kadda Rayane', '000', '0123456789', 'example@example.com', 'Female', '2002-09-22', 'chlef,Algeria', 'parent1'),
('student0', 'Souhail Gendouz', '000', '0123456789', 'example@example.com', 'Male', '2002-09-22', 'chlef,Algeria', 'parent0'),
('student2', 'Mohammed Mohammed', '000', '0123456789', 'example@example.com', 'Female', '2002-09-22', 'chlef,Algeria', 'parent2');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `password`, `phone`, `email`, `address`, `sex`, `dob`) VALUES
('teacher0', 'Lorum Ipsum', '000', '123456789', 'example@example.com', 'Chlef,Algeria', 'Male', '2002-09-22'),
('teacher1', 'Lorum Ipsum', '000', '123456789', 'example@example.com', 'Chlef,Algeria', 'Male', '2002-09-22'),
('teacher2', 'Lorum Ipsum', '000', '123456789', 'example@example.com', 'Chlef,Algeria', 'Male', '2002-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `password`, `usertype`) VALUES
('youneshb', '000', 'admin'),
('student1', '000', 'student'),
('student0', '000', 'student'),
('student2', '000', 'student'),
('teacher0', '000', 'teacher'),
('teacher1', '000', 'teacher'),
('teacher2', '000', 'teacher'),
('parent0', '000', 'parent'),
('parent1', '000', 'parent'),
('parent3', '000', 'parent');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2018 at 12:42 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `face_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(20) NOT NULL,
  `identification_no` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `ispresent` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `name` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `identification_no` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`name`, `gender`, `identification_no`, `phone`, `username`, `password`) VALUES
('Anamika Jain', 'Female', '104', '+918349551120', 'anamika06jain@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
('Jitumani Bhagabati', 'Male', '111', '+919476750633', 'jitumanicit@gmail.com', '202cb962ac59075b964b07152d234b70'),
('Anupam Sharma', 'Male', '123', '+917002901104', 'b15cs154@cit.ac.in', 'd19c70167e04aedfcd9b4ec440489ba6'),
('rajat sharma', 'male', '201', '+918638774147', 'rajatsharma369007@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('Saurav Kumar', 'Male', '222', '+917086776599', 'b15cs075@cit.ac.in', 'e10adc3949ba59abbe56e057f20f883e'),
('Suranjan Goswami', 'Male', '314', '+919873460657', 'rsi2018509@iiita.ac.in', 'e2fc714c4727ee9395f324cd2e7f331f'),
('sumit kumar', 'Male', '4991', '+918127710956', 'phc2014001@gmail.com', '13a2927187b9700ae7ea82d7841d5b68'),
('Roshan Singh', 'm', '789', '88855522696633', 'Gau-C-15/L-294', 'a152e841783914146e4bcd4f39100686');

-- --------------------------------------------------------

--
-- Table structure for table `recognition_result`
--

CREATE TABLE `recognition_result` (
  `id` int(10) NOT NULL,
  `identification_no` varchar(30) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recognition_result`
--

INSERT INTO `recognition_result` (`id`, `identification_no`, `date`, `time`, `status`) VALUES
(25, '222', '2018-07-14', '16:03:37', '1'),
(26, '111', '2018-07-14', '16:03:37', '1'),
(27, '111', '2018-07-14', '23:36:43', '1'),
(28, '222', '2018-07-14', '23:52:52', '1'),
(29, '111', '2018-07-14', '23:52:52', '1'),
(30, '222', '2018-07-15', '15:35:58', '1'),
(31, '111', '2018-07-15', '15:35:58', '1'),
(32, '201', '2018-07-15', '15:51:53', '1'),
(33, '222', '2018-07-15', '15:51:53', '1'),
(34, '201', '2018-07-15', '15:54:09', '1'),
(35, '222', '2018-07-15', '15:54:09', '1'),
(36, '111', '2018-07-15', '15:55:52', '1'),
(37, '104', '2018-07-15', '16:12:21', '1'),
(38, '314', '2018-07-15', '16:13:45', '1'),
(39, '111', '2018-07-25', '22:52:37', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`identification_no`);

--
-- Indexes for table `recognition_result`
--
ALTER TABLE `recognition_result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recognition_result`
--
ALTER TABLE `recognition_result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2017 at 08:39 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_record`
--

CREATE TABLE `file_record` (
  `file_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `file_name` varchar(20) NOT NULL,
  `date_time` datetime NOT NULL,
  `file_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_record`
--

INSERT INTO `file_record` (`file_id`, `user_id`, `file_name`, `date_time`, `file_link`) VALUES
(70, 6, '1p.jpg.secret', '2017-02-24 00:32:38', 'localhost/TEA/uploads/6qqq/1p.jpg.secret.zip'),
(71, 6, '3635921-harleyquinn-', '2017-02-24 00:36:56', 'localhost/TEA/uploads/6qqq/3635921-harleyquinn-wallpaper.jpg.secret.zip'),
(72, 6, 'CT20151454135.pdf.se', '2017-02-24 00:44:11', 'localhost/TEA/uploads/6qqq/CT20151454135.pdf.secret.zip'),
(73, 6, 'Ben-Franklin-Schedul', '2017-02-24 01:01:19', 'localhost/TEA/uploads/6qqq/Ben-Franklin-Schedule.jpg.secret.zip');

-- --------------------------------------------------------

--
-- Table structure for table `user_record`
--

CREATE TABLE `user_record` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dir_state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_record`
--

INSERT INTO `user_record` (`user_id`, `first_name`, `last_name`, `email`, `password`, `dir_state`) VALUES
(3, 'Parth', 'Utkarsh', 'parth.utkarsh09@gmail.com', 'password1', NULL),
(4, 'Luv', 'Tanwani', 'luvtanwani@yahoo.com', 'luvv', 1),
(5, 'John', 'Wick', 'babayaga@gmail.com', 'semblance', NULL),
(6, 'qqq', 'www', 'qqq@www.eee', 'qwe', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_record`
--
ALTER TABLE `file_record`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `user_record`
--
ALTER TABLE `user_record`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_record`
--
ALTER TABLE `file_record`
  MODIFY `file_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `user_record`
--
ALTER TABLE `user_record`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

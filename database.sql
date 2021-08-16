-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 06:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwp_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ans_id` int(10) NOT NULL,
  `answer` text NOT NULL,
  `que_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ans_id`, `answer`, `que_id`) VALUES
(57, 'Sad', 18),
(58, 'Happy', 18),
(59, 'Ok Ok', 18),
(60, 'Yo', 18),
(61, 'Mank', 19),
(62, 'Randy', 19),
(63, 'Park Pirik', 19),
(64, 'Snek', 19);

-- --------------------------------------------------------

--
-- Table structure for table `question_info`
--

CREATE TABLE `question_info` (
  `que_id` int(10) NOT NULL,
  `quiz_id` int(10) NOT NULL,
  `correct_answer` int(10) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_info`
--

INSERT INTO `question_info` (`que_id`, `quiz_id`, `correct_answer`, `question`) VALUES
(18, 36, 66, 'Hows life'),
(19, 36, 65, 'Why you Bully me?');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_info`
--

CREATE TABLE `quiz_info` (
  `quiz_id` int(10) NOT NULL,
  `quiz_name` varchar(20) NOT NULL,
  `quiz_creator` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_info`
--

INSERT INTO `quiz_info` (`quiz_id`, `quiz_name`, `quiz_creator`) VALUES
(36, 'TestQuiz', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `name`, `password`) VALUES
(11, 'karthick', 'kartik.dhasmana001@gmail.com', 'Kartik Dhasmana', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`),
  ADD KEY `fkey3` (`que_id`);

--
-- Indexes for table `question_info`
--
ALTER TABLE `question_info`
  ADD PRIMARY KEY (`que_id`),
  ADD KEY `fkey2` (`quiz_id`);

--
-- Indexes for table `quiz_info`
--
ALTER TABLE `quiz_info`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `fkey1` (`quiz_creator`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `question_info`
--
ALTER TABLE `question_info`
  MODIFY `que_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `quiz_info`
--
ALTER TABLE `quiz_info`
  MODIFY `quiz_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fkey3` FOREIGN KEY (`que_id`) REFERENCES `question_info` (`que_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_info`
--
ALTER TABLE `question_info`
  ADD CONSTRAINT `fkey2` FOREIGN KEY (`quiz_id`) REFERENCES `quiz_info` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_info`
--
ALTER TABLE `quiz_info`
  ADD CONSTRAINT `fkey1` FOREIGN KEY (`quiz_creator`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

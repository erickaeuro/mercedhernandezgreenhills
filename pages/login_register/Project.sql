-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 04:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(3, 'raulo', 'raulo@gmail.com', 'b26986ceee60f744534aaab928cc12df'),
(6, 'miguel', 'miguel@gmail.com', 'b26986ceee60f744534aaab928cc12df'),
(7, 'admin', 'qweqwe@gmail.com', 'b26986ceee60f744534aaab928cc12df'),
(8, 'qweqwe', 'qweqwewq@gmail.com', 'b26986ceee60f744534aaab928cc12df'),
(9, 'qwe', 'qwe@gmail.com', 'b26986ceee60f744534aaab928cc12df'),
(10, 'tae', 'tae@gmail.com', 'b26986ceee60f744534aaab928cc12df'),
(11, 'qwerty', 'qwerty@gmal.com', 'b26986ceee60f744534aaab928cc12df'),
(12, 'hi', 'hi@gmail.com', 'b26986ceee60f744534aaab928cc12df'),
(13, 'tre', 'tre@gmail.com', 'b26986ceee60f744534aaab928cc12df'),
(14, 'Ed', 'ed@gmail.com', 'b26986ceee60f744534aaab928cc12df'),
(15, 'rep', 'rep@gmail.com', 'b26986ceee60f744534aaab928cc12df'),
(16, 'tire', 'tire@gmail.com', 'b26986ceee60f744534aaab928cc12df'),
(17, 'Rem', 'rem@gmai.com', 'b26986ceee60f744534aaab928cc12df'),
(18, 'Rems', 'rems@gmai.com', 'b26986ceee60f744534aaab928cc12df'),
(19, 'power', 'power@gmail.com', 'b26986ceee60f744534aaab928cc12df'),
(20, 'ranger', 'ranger@gmail.com', 'b26986ceee60f744534aaab928cc12df'),
(21, 'adrian', 'adrian@gmail.com', 'b26986ceee60f744534aaab928cc12df');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

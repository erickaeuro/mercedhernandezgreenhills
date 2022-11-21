-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 02:24 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharp_it`
--

-- --------------------------------------------------------

--
-- Table structure for table `table3`
--

CREATE TABLE `table3` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_class` varchar(255) NOT NULL,
  `total_mark` double(12,2) NOT NULL,
  `exam_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table3`
--

INSERT INTO `table3` (`student_id`, `student_name`, `student_class`, `total_mark`, `exam_date`) VALUES
(1, 'Imran Dadu', 'XII', 950.00, '2017-01-14'),
(2, 'Masud', 'XI', 897.00, '2017-01-08'),
(3, 'Sumon', 'V', 950.00, '2016-12-29'),
(4, 'Swapan', 'VI', 750.00, '2016-12-30'),
(5, 'APU', 'XIII', 945.00, '2017-01-01'),
(6, 'Arif', 'VII', 890.00, '2017-01-02'),
(7, 'Rozen', 'VII', 927.00, '2016-12-28'),
(8, 'Suzon', 'VI', 797.00, '2017-01-04'),
(9, 'Sahed', 'Xii', 947.00, '2016-12-27'),
(10, 'Khokon', 'V', 877.00, '2016-12-30'),
(11, 'Alal Palu', 'XI', 180.00, '2017-01-03'),
(12, 'Shofi Abul', 'XII', 25.00, '2017-01-01'),
(13, 'Shahadat Ralbi', 'XIII', 20.00, '2016-12-30'),
(14, 'Bachu vi', 'XIV', 600.00, '2017-01-02'),
(15, 'Rofi Pulish', 'XV', 35.00, '2016-12-29'),
(16, 'Sattar Bonsho', 'XVI', 12.00, '2017-01-05'),
(17, 'Akram Gainy', 'XVII', 16.00, '2017-01-04'),
(18, 'Lokman', 'XVIII', 25.00, '2017-01-03'),
(19, 'Akter Bolod', 'XIX', 20.00, '2017-01-03'),
(20, 'Kalam Pat', 'XX', 12.00, '2017-01-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table3`
--
ALTER TABLE `table3`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table3`
--
ALTER TABLE `table3`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

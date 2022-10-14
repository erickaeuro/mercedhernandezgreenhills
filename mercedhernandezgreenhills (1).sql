-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 04:26 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mercedhernandezgreenhills`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctiontbl`
--

CREATE TABLE `auctiontbl` (
  `auctionid` int(255) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `date_sold` date DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auctiontbl`
--

INSERT INTO `auctiontbl` (`auctionid`, `item_type`, `item_desc`, `price`, `date_sold`, `status`) VALUES
(1, '', '', 0, NULL, 'Available'),
(2, '', '', 0, NULL, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `customertbl`
--

CREATE TABLE `customertbl` (
  `customer_no` int(255) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(225) NOT NULL,
  `cpnum` varchar(11) NOT NULL,
  `birthdate` date NOT NULL,
  `valid_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customertbl`
--

INSERT INTO `customertbl` (`customer_no`, `first_name`, `middle_name`, `last_name`, `address`, `cpnum`, `birthdate`, `valid_id`) VALUES
(1, 'Ericka Euro ', 'Abuan', 'Capistrano', 'Manila', '09123245566', '2004-11-30', 'capistrano.png'),
(2, 'Jan Earl Benedict', 'DelaCruz', 'Tamayo', 'Makati', '0915245533', '2004-12-30', 'R.png'),
(3, 'Mizzy', 'Capistrano\r\n', 'Antonio', 'General Trias Cavite', '09123245566', '2004-07-31', '306513605_622713459293437_8413018732872427529_n.jpg'),
(4, 'Sean Raphael', 'Arellano', 'Antonio', 'Sampaloc Manila ', '09164637435', '2000-09-25', '305157510_6170927152924171_7857187867609547983_n.jpg'),
(5, 'Raquel', NULL, 'Marasigan', '18B EASTWOOD OLYMPIC HEIGHTS LIBIS, QUEZON CITY', '09234180788', '1970-02-10', 'CzJj4B7UQAAoHzJ.jfif'),
(6, 'Analie', NULL, 'Caindoy', 'WFNTM2xHTS8xQ290cnpMMkJmeEdxUXdoeGp1RTNYdjVoVjE4Wk1KVU1lMnNMOHNndytjckw4cm1PMDBVano5YTo6szr+YcrWxLkoLOLxSt272Q==', 'THZmVUZEY2x', '1977-06-07', 'ZHczNHZMU1ZSeUw3aXdNdWtsNXB6Q0M2UDVnVUJDTnR2Z3ZCNHZZeXNpZDFzWGI2Tm1GT3BNT1FVSXZkS3dWS0VZTEdCUitwUXlTOC9haHB3aDhrVXc9PTo6OOxDia9KWgQPyXD4elQH5Q=='),
(7, 'Nicole', 'Marie', 'Nicolas', 'VDdZQVlUQUI1NTJLWTJyOFR4NGwvR1F5bzdRWmR1MWRsMWpDR3FzWWZ5ND06OtVynsxDlIv4K8vaQbhTI1M=', 'UXhwNGJ5WTV', '2004-12-01', 'Y0hnSTJjeE1OdmdPQjMzeDJpc2h0a3pFL0pWdUF6cm43NHp0WnFhRnFraz06Or1JNexVHt4sWKqpo7sw1jg='),
(8, 'Adrian', 'MIDDLE NAME', 'Solera', 'ZmVMVnppMVkyTEROWVUwMzd2ckgrZz09OjrZiLuyaN3fbBcLWuAaZAKw', 'MGJPb3hmbk1', '2004-12-08', 'RGsrd3k0T2dJTTA1TmcvWHdaVW1EanNkejJ4Zjl6RWVPNFgvMWxnNkhuZz06Ot06wh6VVPtJBE/i5JWhAS0='),
(9, 'Charles', 'MIDDLE NAME', 'Abiog', 'YXVydjJWbTBoRjNhSzhnR1M2Z3NQdz09Ojo8OqAQf02EP4F8saqlEOOq', 'QmN1QjJlYUh', '2004-01-06', '');

-- --------------------------------------------------------

--
-- Table structure for table `inventorytbl`
--

CREATE TABLE `inventorytbl` (
  `stock_no` int(255) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `itemdescription` text NOT NULL,
  `karat_gold` varchar(255) NOT NULL,
  `kindofstone` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `itemqty` int(255) NOT NULL,
  `tagprice` decimal(8,2) NOT NULL,
  `date_sold` date NOT NULL,
  `move` int(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventorytbl`
--

INSERT INTO `inventorytbl` (`stock_no`, `item_type`, `itemdescription`, `karat_gold`, `kindofstone`, `weight`, `itemqty`, `tagprice`, `date_sold`, `move`, `date_created`) VALUES
(1, 'Bracelet', 'Chain Bracelet', '18', ' Gold', '3.7', 6, '600.00', '2022-10-04', 1, '2022-10-08 11:15:22'),
(2, 'Pendant', 'Medal Pendant', '18', 'Diamond', '3.1', 1, '500.00', '0000-00-00', 1, '2022-10-08 11:15:22'),
(3, 'Ring', ' Heart Ring', '20', 'Red Ruby', '4', 1, '7000.00', '0000-00-00', 1, '2022-10-08 11:15:22'),
(4, 'Pendant', 'Medal Pendant', '18', ' Gold', '2.20', 2, '500.00', '2022-10-06', 1, '2022-10-08 11:15:22'),
(6, 'Bracelet', 'Chain Bracelet', '18', 'Silver', '4', 4, '1000.00', '0000-00-00', 0, '2022-10-09 14:58:02'),
(7, 'Ring', ' Heart Ring', '24', 'Diamond', '5', 1, '7000.00', '0000-00-00', 1, '2022-10-09 19:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `inv_order`
--

CREATE TABLE `inv_order` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `order_receiver_name` varchar(250) NOT NULL,
  `order_receiver_address` text NOT NULL,
  `order_total_before_tax` decimal(10,0) NOT NULL,
  `order_total_tax1` decimal(10,0) NOT NULL,
  `order_total_tax2` decimal(10,0) NOT NULL,
  `order_total_tax3` decimal(10,0) NOT NULL,
  `order_total_tax` decimal(10,0) NOT NULL,
  `order_total_after_tax` int(11) NOT NULL,
  `order_datetime` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_order`
--

INSERT INTO `inv_order` (`order_id`, `order_no`, `order_date`, `order_receiver_name`, `order_receiver_address`, `order_total_before_tax`, `order_total_tax1`, `order_total_tax2`, `order_total_tax3`, `order_total_tax`, `order_total_after_tax`, `order_datetime`) VALUES
(14, '169690', '2021-07-06', 'Jennifer Letcher', '3116 George Street', '945', '12', '12', '1', '25', 970, 1625592940),
(13, '104780', '2021-07-05', 'Mary Sheen', '4140 Worley Avenue', '937', '17', '17', '15', '49', 986, 1625592747),
(12, '102566', '2021-07-02', 'Courtney Chandler', '1253 Elliott Street', '112', '1', '1', '1', '3', 112, 1625590918),
(15, '102553', '2022-10-10', 'Ed Solera', 'Imus Cavite', '1000', '0', '0', '500', '500', 500, 1665336138);

-- --------------------------------------------------------

--
-- Table structure for table `inv_order_item`
--

CREATE TABLE `inv_order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `order_item_quantity` decimal(10,0) NOT NULL,
  `order_item_price` decimal(10,0) NOT NULL,
  `order_item_actual_amount` decimal(10,0) NOT NULL,
  `order_item_tax1_rate` decimal(10,0) NOT NULL,
  `order_item_tax1_amount` decimal(10,0) NOT NULL,
  `order_item_tax2_rate` decimal(10,0) NOT NULL,
  `order_item_tax2_amount` decimal(10,0) NOT NULL,
  `order_item_tax3_rate` decimal(10,0) NOT NULL,
  `order_item_tax3_amount` decimal(10,0) NOT NULL,
  `order_item_final_amount` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_order_item`
--

INSERT INTO `inv_order_item` (`order_item_id`, `order_id`, `item_name`, `order_item_quantity`, `order_item_price`, `order_item_actual_amount`, `order_item_tax1_rate`, `order_item_tax1_amount`, `order_item_tax2_rate`, `order_item_tax2_amount`, `order_item_tax3_rate`, `order_item_tax3_amount`, `order_item_final_amount`) VALUES
(17, 13, 'Product Four', '9', '28', '252', '2', '5', '3', '8', '3', '8', '272'),
(16, 13, 'Product Three', '20', '10', '200', '1', '2', '1', '2', '1', '2', '206'),
(14, 13, 'Product One', '16', '14', '224', '2', '4', '1', '2', '0', '0', '231'),
(15, 13, 'Product Two', '29', '9', '261', '2', '5', '2', '5', '2', '5', '277'),
(13, 12, 'RUNMUS Gaming Headset', '7', '16', '112', '0', '1', '0', '1', '0', '1', '112'),
(22, 15, 'Heart Ring', '1', '1000', '1000', '0', '0', '0', '0', '500', '500', '500'),
(18, 14, 'P one', '29', '10', '290', '0', '0', '0', '0', '0', '0', '290'),
(19, 14, 'P two', '37', '15', '555', '2', '11', '2', '11', '0', '0', '577'),
(20, 14, 'P three', '10', '10', '100', '1', '1', '1', '1', '1', '1', '103');

-- --------------------------------------------------------

--
-- Table structure for table `loantbl`
--

CREATE TABLE `loantbl` (
  `loan_id` int(11) NOT NULL,
  `customer_no` int(11) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `appraised_value` int(255) NOT NULL,
  `principal` int(255) NOT NULL,
  `interest` decimal(10,2) NOT NULL,
  `date_loan_granted` date NOT NULL,
  `maturity_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `total_amt_paid` int(255) NOT NULL,
  `loan_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loantbl`
--

INSERT INTO `loantbl` (`loan_id`, `customer_no`, `item_type`, `item_desc`, `appraised_value`, `principal`, `interest`, `date_loan_granted`, `maturity_date`, `expiry_date`, `total_amt_paid`, `loan_status`) VALUES
(1, 1, 'Bracelet', 'Gold Bracelets with diamonds', 7000, 1200, '0.05', '2022-10-14', '2022-11-14', '2023-01-14', 0, 'Active Loan'),
(2, 4, 'Pendant', 'Ruby Pendant w/ brass chain', 10000, 3200, '0.05', '2022-10-14', '2022-11-14', '2023-01-14', 0, 'Active Loan'),
(3, 8, 'Wrist Watchs', '1920s Bronze Rolex', 5000, 900, '0.05', '2022-10-14', '2022-11-14', '2023-01-14', 0, 'Active Loan'),
(4, 7, 'Necklace', 'Silver Necklace', 1000, 250, '0.05', '2022-10-15', '2022-11-15', '2023-01-15', 0, 'Active Loan');

-- --------------------------------------------------------

--
-- Table structure for table `pawntickettbl`
--

CREATE TABLE `pawntickettbl` (
  `pawnticketno` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `date_paid` date NOT NULL,
  `amount_paid` int(255) NOT NULL,
  `transactiontype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pawntickettbl`
--

INSERT INTO `pawntickettbl` (`pawnticketno`, `loan_id`, `date_paid`, `amount_paid`, `transactiontype`) VALUES
(1, 1, '2022-10-31', 420, 'Renewal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `security_qstn` tinytext NOT NULL,
  `security_ans` tinytext NOT NULL,
  `name` varchar(255) NOT NULL,
  `contactno` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `userstatus` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `security_qstn`, `security_ans`, `name`, `contactno`, `address`, `usertype`, `userstatus`, `cname`) VALUES
(31, 'mizzy', 'mizzycapistrano@gmail.com', '0505c13e3b34381c10af15aea3afc46b', 'What is the name of your favorite pet?', 'calvin', '', '09525251515', 'General Trias Cavite', 'Inventory Clerk', 'Inactive', 'Mizzy Capistrano'),
(33, 'senantreal', 'senantreal@gmail.com', 'd59c56b34c461e906f97917812a9155a', 'What was your favorite food as a child?', 'Adobo', '', '', '', '', 'Active', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctiontbl`
--
ALTER TABLE `auctiontbl`
  ADD PRIMARY KEY (`auctionid`);

--
-- Indexes for table `customertbl`
--
ALTER TABLE `customertbl`
  ADD PRIMARY KEY (`customer_no`);

--
-- Indexes for table `inventorytbl`
--
ALTER TABLE `inventorytbl`
  ADD PRIMARY KEY (`stock_no`);

--
-- Indexes for table `inv_order`
--
ALTER TABLE `inv_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `inv_order_item`
--
ALTER TABLE `inv_order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `loantbl`
--
ALTER TABLE `loantbl`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `customer_no_FK` (`customer_no`);

--
-- Indexes for table `pawntickettbl`
--
ALTER TABLE `pawntickettbl`
  ADD PRIMARY KEY (`pawnticketno`),
  ADD KEY `loan_jd_FK` (`loan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auctiontbl`
--
ALTER TABLE `auctiontbl`
  MODIFY `auctionid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customertbl`
--
ALTER TABLE `customertbl`
  MODIFY `customer_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inventorytbl`
--
ALTER TABLE `inventorytbl`
  MODIFY `stock_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inv_order`
--
ALTER TABLE `inv_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `inv_order_item`
--
ALTER TABLE `inv_order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `loantbl`
--
ALTER TABLE `loantbl`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pawntickettbl`
--
ALTER TABLE `pawntickettbl`
  MODIFY `pawnticketno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loantbl`
--
ALTER TABLE `loantbl`
  ADD CONSTRAINT `customer_no_FK` FOREIGN KEY (`customer_no`) REFERENCES `customertbl` (`customer_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pawntickettbl`
--
ALTER TABLE `pawntickettbl`
  ADD CONSTRAINT `loan_jd_FK` FOREIGN KEY (`loan_id`) REFERENCES `loantbl` (`loan_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

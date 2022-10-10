-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2022 at 04:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
  `pawnticketno` int(255) NOT NULL,
  `expiry_date` date NOT NULL,
  `principal` varchar(255) NOT NULL,
  `payments_made` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auctiontbl`
--

INSERT INTO `auctiontbl` (`auctionid`, `pawnticketno`, `expiry_date`, `principal`, `payments_made`, `status`) VALUES
(1, 9, '2022-09-19', '0', '1500', 'Available'),
(2, 1, '0000-00-00', '0', '1500', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `customertbl`
--

CREATE TABLE `customertbl` (
  `customerno` int(255) NOT NULL,
  `name` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `cpnum` varchar(11) NOT NULL,
  `birthdate` date NOT NULL,
  `valid_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customertbl`
--

INSERT INTO `customertbl` (`customerno`, `name`, `address`, `cpnum`, `birthdate`, `valid_id`) VALUES
(1, 'Ericka Euro A. Capistrano', 'Manila', '09123245566', '2004-11-30', 'capistrano.png'),
(2, 'Jan Earl Benedict D. Tamayo', 'Makati', '0915245533', '2004-12-30', 'R.png'),
(3, 'Mizzy Capistrano', 'General Trias Cavite', '09123245566', '2004-07-31', '306513605_622713459293437_8413018732872427529_n.jpg'),
(4, 'Sean Antonio', 'Sampaloc Manila ', '09164637435', '2000-09-25', '305157510_6170927152924171_7857187867609547983_n.jpg'),
(5, 'Raquel Marasigan', '18B EASTWOOD OLYMPIC HEIGHTS LIBIS, QUEZON CITY', '09234180788', '1970-02-10', 'CzJj4B7UQAAoHzJ.jfif'),
(6, 'Analie Caindoy', 'WFNTM2xHTS8xQ290cnpMMkJmeEdxUXdoeGp1RTNYdjVoVjE4Wk1KVU1lMnNMOHNndytjckw4cm1PMDBVano5YTo6szr+YcrWxLkoLOLxSt272Q==', 'THZmVUZEY2x', '1977-06-07', 'ZHczNHZMU1ZSeUw3aXdNdWtsNXB6Q0M2UDVnVUJDTnR2Z3ZCNHZZeXNpZDFzWGI2Tm1GT3BNT1FVSXZkS3dWS0VZTEdCUitwUXlTOC9haHB3aDhrVXc9PTo6OOxDia9KWgQPyXD4elQH5Q=='),
(7, 'Nicole Marie Nicolas', 'VDdZQVlUQUI1NTJLWTJyOFR4NGwvR1F5bzdRWmR1MWRsMWpDR3FzWWZ5ND06OtVynsxDlIv4K8vaQbhTI1M=', 'UXhwNGJ5WTV', '2004-12-01', 'Y0hnSTJjeE1OdmdPQjMzeDJpc2h0a3pFL0pWdUF6cm43NHp0WnFhRnFraz06Or1JNexVHt4sWKqpo7sw1jg='),
(8, 'Ed Solera', 'ZmVMVnppMVkyTEROWVUwMzd2ckgrZz09OjrZiLuyaN3fbBcLWuAaZAKw', 'MGJPb3hmbk1', '2004-12-08', 'RGsrd3k0T2dJTTA1TmcvWHdaVW1EanNkejJ4Zjl6RWVPNFgvMWxnNkhuZz06Ot06wh6VVPtJBE/i5JWhAS0='),
(9, 'Charles Abiog', 'YXVydjJWbTBoRjNhSzhnR1M2Z3NQdz09Ojo8OqAQf02EP4F8saqlEOOq', 'QmN1QjJlYUh', '2004-01-06', '');

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
-- Table structure for table `pawntickettbl`
--

CREATE TABLE `pawntickettbl` (
  `pawnticketno` int(255) NOT NULL,
  `customerno` int(255) NOT NULL,
  `dateloangranted` date NOT NULL,
  `maturity_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `description` text NOT NULL,
  `appraised_value` int(255) NOT NULL,
  `principal` int(255) NOT NULL,
  `interest` decimal(10,0) NOT NULL,
  `penalty` int(255) NOT NULL,
  `transactiontype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pawntickettbl`
--

INSERT INTO `pawntickettbl` (`pawnticketno`, `customerno`, `dateloangranted`, `maturity_date`, `expiry_date`, `description`, `appraised_value`, `principal`, `interest`, `penalty`, `transactiontype`) VALUES
(1, 1, '0000-00-00', '0000-00-00', '0000-00-00', '', 0, 0, '0', 0, 'Renewal'),
(3, 3, '2022-01-20', '0000-00-00', '0000-00-00', '', 0, 1000, '300', 100, 'Redeem'),
(4, 4, '0000-00-00', '0000-00-00', '0000-00-00', '', 0, 0, '0', 0, 'Redeem'),
(7, 1, '0000-00-00', '0000-00-00', '0000-00-00', '', 0, 0, '0', 0, 'Renewal'),
(8, 5, '0000-00-00', '0000-00-00', '0000-00-00', '', 0, 0, '0', 0, 'Redeem'),
(9, 7, '0000-00-00', '0000-00-00', '0000-00-00', '', 0, 0, '0', 0, 'Renewal'),
(10, 8, '2022-10-04', '2022-10-22', '2022-11-05', 'Ring', 5000, 500, '200', 300, 'Renewal'),
(11, 9, '2022-10-02', '2022-10-28', '2022-11-07', 'Round bracelet', 5000, 300, '500', 50, 'Redeem'),
(13, 1, '2022-10-29', '2022-10-20', '0000-00-00', '', 0, 0, '0', 0, 'Redeem'),
(15, 9, '0000-00-00', '0000-00-00', '0000-00-00', '', 0, 1000, '0', 0, 'Renewal'),
(16, 3, '2022-10-04', '2022-10-19', '2022-11-08', 'Heart Bracelet', 15000, 1000, '500', 1000, 'Redeem'),
(17, 8, '2022-10-10', '2022-11-10', '0000-00-00', 'Heart Bracelet', 5000, 500, '0', 0, 'Renewal');

-- --------------------------------------------------------

--
-- Table structure for table `redeemtbl`
--

CREATE TABLE `redeemtbl` (
  `redeemid` int(255) NOT NULL,
  `pawnticketno` int(255) NOT NULL,
  `redemption_amnt` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `redeemtbl`
--

INSERT INTO `redeemtbl` (`redeemid`, `pawnticketno`, `redemption_amnt`) VALUES
(1, 3, 1500),
(2, 8, 5000),
(3, 4, 3500),
(4, 4, 15000),
(5, 7, 898),
(6, 11, 6000),
(7, 13, 15000),
(8, 16, 17500);

-- --------------------------------------------------------

--
-- Table structure for table `renewaltbl`
--

CREATE TABLE `renewaltbl` (
  `renewalid` int(255) NOT NULL,
  `pawnticketno` int(255) NOT NULL,
  `service_charge` decimal(8,2) NOT NULL,
  `total_amount_due` decimal(8,2) NOT NULL,
  `renewal_amnt` int(255) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renewaltbl`
--

INSERT INTO `renewaltbl` (`renewalid`, `pawnticketno`, `service_charge`, `total_amount_due`, `renewal_amnt`, `status`) VALUES
(6, 9, '200.00', '5500.00', 1500, 0),
(7, 1, '100.00', '10000.00', 500, 1),
(8, 7, '200.00', '0.00', 0, 0),
(9, 10, '50.00', '6000.00', 1500, 1),
(12, 17, '20.00', '4500.00', 500, 1);

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
(31, 'mizzy', 'mizzycapistrano@gmail.com', '0505c13e3b34381c10af15aea3afc46b', 'What is the name of your favorite pet?', 'calvin', '', '09525251515', 'General Trias Cavite', 'Inventory Clerk', 'Inactive', 'Mizzy Capistrano');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctiontbl`
--
ALTER TABLE `auctiontbl`
  ADD PRIMARY KEY (`auctionid`),
  ADD KEY `Pawnticket_FK3` (`pawnticketno`);

--
-- Indexes for table `customertbl`
--
ALTER TABLE `customertbl`
  ADD PRIMARY KEY (`customerno`);

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
-- Indexes for table `pawntickettbl`
--
ALTER TABLE `pawntickettbl`
  ADD PRIMARY KEY (`pawnticketno`),
  ADD KEY `Custno_FK` (`customerno`);

--
-- Indexes for table `redeemtbl`
--
ALTER TABLE `redeemtbl`
  ADD PRIMARY KEY (`redeemid`),
  ADD KEY `Pawnticket_FK2` (`pawnticketno`);

--
-- Indexes for table `renewaltbl`
--
ALTER TABLE `renewaltbl`
  ADD PRIMARY KEY (`renewalid`),
  ADD KEY `Pawnticket_FK1` (`pawnticketno`);

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
  MODIFY `customerno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `pawntickettbl`
--
ALTER TABLE `pawntickettbl`
  MODIFY `pawnticketno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `redeemtbl`
--
ALTER TABLE `redeemtbl`
  MODIFY `redeemid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `renewaltbl`
--
ALTER TABLE `renewaltbl`
  MODIFY `renewalid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auctiontbl`
--
ALTER TABLE `auctiontbl`
  ADD CONSTRAINT `Pawnticket_FK3` FOREIGN KEY (`pawnticketno`) REFERENCES `pawntickettbl` (`pawnticketno`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pawntickettbl`
--
ALTER TABLE `pawntickettbl`
  ADD CONSTRAINT `Custno_FK` FOREIGN KEY (`customerno`) REFERENCES `customertbl` (`customerno`) ON UPDATE CASCADE;

--
-- Constraints for table `redeemtbl`
--
ALTER TABLE `redeemtbl`
  ADD CONSTRAINT `Pawnticket_FK2` FOREIGN KEY (`pawnticketno`) REFERENCES `pawntickettbl` (`pawnticketno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `renewaltbl`
--
ALTER TABLE `renewaltbl`
  ADD CONSTRAINT `Pawnticket_FK1` FOREIGN KEY (`pawnticketno`) REFERENCES `pawntickettbl` (`pawnticketno`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

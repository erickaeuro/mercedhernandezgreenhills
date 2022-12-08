-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 12:49 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
(15, 'Pendant', 'Family Heirloom', 4100, '2022-10-16', 'Sold'),
(16, 'Ring', 'Ruby Ring', 4100, '2022-10-19', 'Sold'),
(18, 'Wrist Watch', 'Rolex na Leather', 5000, NULL, 'Available');

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
  `cpnum` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `valid_id` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customertbl`
--

INSERT INTO `customertbl` (`customer_no`, `first_name`, `middle_name`, `last_name`, `address`, `cpnum`, `birthdate`, `valid_id`, `filename`) VALUES
(1, 'Ericka Euro ', 'Abuan', 'Capistrano', 'Manila', '09123245566', '2004-11-30', 'capistrano.png', ''),
(2, 'Jan Earl Benedict', 'DelaCruz', 'Tamayo', 'Makati', '0915245533', '2004-12-30', 'R.png', ''),
(3, 'Mizzy', 'Capistrano\r\n', 'Antonio', 'General Trias Cavite', '09123245566', '2004-07-31', '306513605_622713459293437_8413018732872427529_n.jpg', ''),
(4, 'Sean Raphael', 'Arellano', 'Antonio', 'Sampaloc Manila ', '09164637435', '2000-09-25', '305157510_6170927152924171_7857187867609547983_n.jpg', ''),
(5, 'Raquel', NULL, 'Marasigan', '18B EASTWOOD OLYMPIC HEIGHTS LIBIS, QUEZON CITY', '09234180788', '1970-02-10', 'CzJj4B7UQAAoHzJ.jfif', ''),
(6, 'Analie', NULL, 'Caindoy', 'WFNTM2xHTS8xQ290cnpMMkJmeEdxUXdoeGp1RTNYdjVoVjE4Wk1KVU1lMnNMOHNndytjckw4cm1PMDBVano5YTo6szr+YcrWxLkoLOLxSt272Q==', 'THZmVUZEY2x', '1977-06-07', 'ZHczNHZMU1ZSeUw3aXdNdWtsNXB6Q0M2UDVnVUJDTnR2Z3ZCNHZZeXNpZDFzWGI2Tm1GT3BNT1FVSXZkS3dWS0VZTEdCUitwUXlTOC9haHB3aDhrVXc9PTo6OOxDia9KWgQPyXD4elQH5Q==', ''),
(7, 'Nicole', 'Marie', 'Nicolas', 'VDdZQVlUQUI1NTJLWTJyOFR4NGwvR1F5bzdRWmR1MWRsMWpDR3FzWWZ5ND06OtVynsxDlIv4K8vaQbhTI1M=', 'UXhwNGJ5WTV', '2004-12-01', 'Y0hnSTJjeE1OdmdPQjMzeDJpc2h0a3pFL0pWdUF6cm43NHp0WnFhRnFraz06Or1JNexVHt4sWKqpo7sw1jg=', ''),
(8, 'Adrian', 'MIDDLE NAME', 'Solera', 'ZmVMVnppMVkyTEROWVUwMzd2ckgrZz09OjrZiLuyaN3fbBcLWuAaZAKw', 'MGJPb3hmbk1', '2004-12-08', 'RGsrd3k0T2dJTTA1TmcvWHdaVW1EanNkejJ4Zjl6RWVPNFgvMWxnNkhuZz06Ot06wh6VVPtJBE/i5JWhAS0=', ''),
(9, 'Charles', 'MIDDLE NAME', 'Abiog', 'YXVydjJWbTBoRjNhSzhnR1M2Z3NQdz09Ojo8OqAQf02EP4F8saqlEOOq', 'QmN1QjJlYUh', '2004-01-06', '', ''),
(26, 'Ericka Euro', 'Abuan', 'Capistrano', 'WSt4S1lSdW5GMFJRTlptSS80ZFYvUT09Ojq4DhNMrjv6J2/vuc0Khtql', 'L2dLcVB4T1U', '2004-11-30', 'U0tqWTFST1cwTFN1Zm9RRkNTYWtYME1CU2VsVGU1OVV2T2RPcUF0RFBHc1BxNnhOSUtRRGxtenY0V21DQUlMZjo6A09Gqzjml6nBP/ejk8qxqA==', ''),
(27, 'Sean', 'Raphael', 'Capistrano', 'U0ZBNUlud3h1SEVJVHd6SU41eEJyUEZvRk9FSmIxNlppNlVGdVJhaEc5RT06OghahiTIxqAjOsPdFSV6Hi4=', 'WDg0czJnL2N', '2001-10-25', 'ZEVrODU0T2JUKzAxc3M0c0xtVCtqeVl5TU5oQTlhWW1EUDI1Ym5LT0o2TTA5eEdBSXpsNjVsRmJoN3p2ZStFMTo6h+WN9WjNgNPlUn9ItNe7vw==', ''),
(28, 'Fryki', '', 'Burayt', 'dGFaZVZRa0VmWkkyS0FxcHNpbFFVZz09OjqAWUz0H5ZBAZ9XSefkM6lT', 'YmduNW4rNmF', '2000-02-08', 'sample3.jpg', ''),
(29, 'Strykyr', '', 'Burayt', 'VHNJRXFFNllvTGpudUk4akFwWitoZz09OjoxugdWyth2lm/CR6dTRTLL', 'c29WdHFEbE0', '2004-01-01', 'ZDQzbGhUS1BCVWpERmNzSlpDb0dZdz09Ojro/uM7pAQOWaYiXBsw3FeX', ''),
(30, 'Larkin', '', 'Samuel', 'blpRRG1yTDVRMXljSnc0NGliSTdQUXBHeWFCblYvc3ZLNk1QdnJiL2Uraz06Ors1FEadep7zYGQ/Sq9rW04=', 'aUw2YlhpcE5', '1988-10-18', 'QTFQa1VFVERnSTROL1lvOVEwc25lUT09Ojpa64/SQ6RcQ2hBN4R+iB90', ''),
(31, 'celia', '', 'macuja', 'b29iYWd0bUg2b3BPQ2cyQVNxeGpRdlNFSW83bURySUVJeGdzQlVDUE50NnphcXZkNGswMGkrWCtqR0R0d0dTKzo6iC8P/fSn9aAsM1yQkql7bA==', 'R2djN1VaTWd', '1999-10-12', 'NDdsUUlkbGpIcGFCTGw0bU8xdi9xUT09OjoNGgxWtx61IANIuC1OKUJC', ''),
(32, 'Jerick', 'Lat', 'Miranda', 'bk5mYXVuM1hPWGJzNEVQRXZZdllUQT09OjrZw/5KAM+VN/O6GLcwGx4Y', 'MjF3NEpoNUh', '1998-02-05', 'ZndTZzdWaldoRXd1Y21RbTh6SHVBdz09OjpgQ1wnfmFGBk4IN5LAENVZ', ''),
(33, 'JC', '', 'De Sagon', 'K0RtaXJzKzZsQ1pQaTJyd0lBK2JxQT09Ojqqy8SbXaY21QpGCOu/ca5S', 'N0hhWExnQlErM3MxQ09LNTFpMklhZz09OjowgSGrXCEwdRd7xiQ74LJh', '2004-10-10', 'Sjg3U3RGV1VrMVBVOTgyWmFRbXZRZz09OjpDgBS1qXrX+tFF9fkw6VX+', ''),
(34, 'Rei', '', 'Kim', 'MUZFVGdIeVdLbkxuUGcyRmtKbEJlQT09OjrO3Ao9yZeQR3kU84CRO3cu', 'dUVucTA4MHJSZSttazBVV0tLL05lZz09Ojo6biKrwx6tYMHQjqf+uMfE', '2003-10-10', 'a25QS3h2dWo5TG9HWFRlellLT0J5UT09OjqTnpuHf6YzilyJgxR4Kgi6', 'R.png'),
(36, 'Gina', '', 'Kim', 'bW5DNERmY29paGgvNW9rOE90Y09vZz09Ojo25ON9isheKLjUDEZH5zlZ', 'ZjF6Q2NkcHg1d3FCblk0RGxCSXRsdz09OjrUPDmqrereEndQnDLgwS+i', '1976-01-08', '', '306492684_636900961108183_3097510673591392762_n.jpg'),
(39, 'Nina', '', 'Cruz', 'cGx4cVRHdVg2QURFbzZib0JJcjdNQT09Ojo5WW1Y8yaq/ezgHuhVemn7', 'OWJSSEh3enRPYzMzc0EvV3BWT2UrQT09OjrheTyq1BrdsArCs4iDjMBs', '1967-09-08', '', 'Capture.PNG'),
(42, 'Liana', '', 'Antonio', 'M1lhRHBmdGdMWGl3dSs3aXp5eUFMQT09OjreGsW8a1RaEIZgMx5FCY4Z', '', '2001-07-09', '', 'bzNBeGNRUmF3anlJSENhRFAycmo2aHg4WHNibktnRmhaME9mT3FUNUUyWk9DakVNeEhkRFlINHVmZWpGVENXSnZtWFVNeVVlMFlFSGVpZFJrV2tyeEE9PTo6QtzKKqMLxgOefwPtvehCMA=='),
(43, 'Samuel', '', 'Antonio', 'ODVmaVFXelpsNnNGTkc3Ry9xMmMxdz09OjqzBjCsWZguGMslYPRfzWvW', 'RWhYcXBpS0hCODNlWEhvQXE3cGxmQT09Ojp4jUC/so0xHnzTZbJAGwMX', '1998-01-01', '', 'eEIrWHM4UWNRSEdZTXRLQ3RpYWsxUT09Ojq7x57+geMEzBWO4YVCyXrZ'),
(44, 'Changbin', '', 'Kim', 'K2J1RTI3emZPejlLZ1ZMcnU2by9qUT09OjqdkPZkDE8favzzIzJ9/QlB', 'YzFmWUNkZWFlTFZqUEpLTWRPQmUxZz09OjpUfClFMbji6OFppw5cpl1Y', '1998-08-07', '', 'NEMxNEZyNWlRaDlpZWdTcW9SVmJWQT09OjrfaNnE5f8YjZkvvRlfTWMw'),
(45, '', '', '', '', '', '0000-00-00', '', 'TXo1azR6R2tkcDJadjNubjBlTDNMUT09OjrNl1OV88PvDhNv/J6eb05e'),
(46, 'Mika', '', 'Dela Cruz', 'Qmxhelh1eFY4UEJJd25PUnRtOTFKdz09OjptrY7GC5Z2uGhM2AIlaOBe', 'b2xNc2pyb0ZoTEhONlFwT2ZLSlpMQT09OjpXXl3/Xb7X3bEnZIP7IXV6', '2001-08-01', '', 'VkpqWTRxaHZjWEl2T3hIWmxvWmxQUT09OjoRKPXhXATQkP53X7si6jb1'),
(47, 'Christopher', '', 'Bang', 'UWJFTG4vaVp1eithOVVzYU9qdUFjdz09OjqCv65i9DCl5cOYwSlx6Erx', 'b0JKZGZsUnRvb0hzb0lweENsWEZNQT09Ojp39Z5YyupoJh6FqsRn6Pkj', '1999-02-03', '', 'Z1N4RzF0ZHB4WE9FWUJybjBLbHZqdz09OjpZt1jgiOiKC0QpCNCk7mfO'),
(48, 'Irina', '', 'Reyes', 'Z3dVSUE2UDdsWVNOWGVWQlVPUlBVQT09Ojp2eq5f8Sn6A0JQJoLgpydM', 'djcvY09rL05taWJ2aVUwUWRrS1VKQT09OjoYklJ5ga0GRpRyv/DuMAqh', '2000-02-09', '', 'IMG_0037.JPG'),
(49, 'Yurina', '', 'Yamaguchi', 'TW5NNDVTbHFzTE1vVmdrYkpaenpwQT09Ojoeh9K54UImiYY/qMYscUe7', 'N3hOYS93WE9iUXF3c2p4SmhRclZKdz09OjoEhvzNgZm7NW+DHM+G2ub0', '2000-05-04', '', 'cHYybXljZDhvY3JnNHZYWlV6NTFYZz09Ojqsx8e4DU7bca86UdIxIxCV'),
(50, 'Yeonjung', 'l', 'Jung', 'Yjl6R29TNC82WEIwanhOL1I4YUdsOUJTK29BQzJ0L1JvMEhpTytZTWttQT06OtoskbIrAFcXNKRgDwIX7fg=', 'U1NwbTBRbWtOYXY1UWN0VzRUbEp0Zz09Ojq7hgObyfC2wN4UmHRkdRgZ', '1976-07-05', '', 'UTZaMENhcHl6ZGJ6dHpmTVQ1WExTQT09OjrYVSYe78aD6qLtIDipGU+f'),
(51, '', '', '', '', '', '0000-00-00', '', 'V2JHbDl1KzgrNnNrNVdha09QRkkyUT09OjoS1W4/VEh42jVEVyyQJSaK'),
(53, 'Yeonjung', 'l', 'Jung', 'TEJNV0UzRHhRVWQ2QmNWRjNmOVpjQmFKdVN0MlkvZ3kweWZGblo4UkkwZz06OjnKVoX9E4VD/KVVLJlnmcU=', 'NXRaejYwZEZYbkY2SHJ1ejFsYzQyZz09OjpJyl65D8iJ2n1ycYIeTCWL', '1995-02-02', '', 'VjRuZTFDVnc3bFVIdnFrNmdwY2RPdz09OjpV4PZwkttrkNj5ydpxNMHg');

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
  `date_sold` date DEFAULT NULL,
  `move` int(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventorytbl`
--

INSERT INTO `inventorytbl` (`stock_no`, `item_type`, `itemdescription`, `karat_gold`, `kindofstone`, `weight`, `itemqty`, `tagprice`, `date_sold`, `move`, `date_created`, `file_name`, `type`, `size`) VALUES
(1, 'Bracelet', 'Chain Bracelet', '18', ' Gold', '3.7', 6, '600.00', '2022-10-04', 1, '2022-10-16 15:57:34', '', '', ''),
(2, 'Pendant', 'Medal Pendant', '18', 'Diamond', '3.1', 1, '500.00', '0000-00-00', 1, '2022-12-08 08:27:14', '', '', ''),
(3, 'Ring', ' Heart Ring', '20', 'Red Ruby', '4', 1, '7000.00', '0000-00-00', 1, '2022-10-16 15:57:37', '', '', ''),
(6, 'Bracelet', 'Chain Bracelet', '18', 'Silver', '4', 4, '1000.00', '0000-00-00', 1, '2022-10-15 16:58:30', '', '', ''),
(7, 'Ring', 'Heart Red Ring', '24', ' Diamond', '5', 1, '7000.00', '0000-00-00', 1, '2022-12-08 08:27:14', 'pexels-superlens-photography-4595716.jpg', '', ''),
(9, 'Necklace', 'A4', '20', 'Sapphire', '176', 1, '12000.00', '2022-10-17', 1, '2022-10-21 12:18:48', '', '', ''),
(10, 'Earrings', 'Flower Earrings', '18', 'Silver', '5', 1, '5000.00', '0000-00-00', 1, '2022-12-08 08:27:14', '', '', ''),
(11, 'Bracelet', '', '18', ' cb', '2.20', 1, '231313.00', '0000-00-00', 1, '2022-12-08 08:27:14', '', '', ''),
(12, 'Bracelet', '', '20', ' Silver', '3.7', 1, '2500.00', '0000-00-00', 1, '2022-12-08 08:27:14', '', '', ''),
(13, 'Bracelet6r6', '', '22', ' Gold', '5', 1, '1000.00', '0000-00-00', 1, '2022-12-08 08:27:14', '', '', ''),
(14, 'Bracelet', 'try', '18', 'Gold', '4', 1, '500.00', '0000-00-00', 1, '2022-12-08 08:27:14', '', '', ''),
(15, 'Bracelet', 'try', '20', 'Silver', '4', 1, '500.00', '0000-00-00', 1, '2022-12-08 08:27:14', 'pexels-pixabay-266621 (1).jpg', '', ''),
(16, 'Ring', 'try', '24', 'Gold', '2.20', 1, '500.00', '0000-00-00', 1, '2022-12-08 08:27:14', 'national-id.jpg', '', ''),
(17, 'Bracelet', 'try', '22', 'Gold', '2.20', 1, '500.00', '2022-12-06', 1, '2022-12-08 08:27:14', 'pexels-karen-laårk-boshoff-7436135.jpg', '', ''),
(18, '', '', '', '', '', 0, '0.00', '0000-00-00', 1, '2022-12-08 08:27:14', '17f2364717ae372e1955117d14456784.jpg', '', ''),
(19, '', 'dadasda', '18', 'fsafafa', '3.2', 1, '500.00', '0000-00-00', 1, '2022-12-08 08:27:14', '', '', ''),
(20, '', '', '', '', '', 0, '0.00', '0000-00-00', 1, '2022-12-08 08:27:14', 'pexels-karen-laårk-boshoff-7436135.jpg', '', ''),
(21, '', '', '', '', '', 0, '0.00', '0000-00-00', 1, '2022-12-08 08:27:14', 'Capistrano_Ericka_Euro_Final Documentation in IT Issues and Seminars.pdf', '', ''),
(22, 'Earrings', 'TRY', '18', 'Gold', '3.2', 1, '1500.00', '0000-00-00', 1, '2022-12-08 08:28:01', 'pexels-photo-6858667.jpeg', '', ''),
(23, 'Ring', 'Silver Ring', '14', 'Silver', '3.2', 1, '500.00', '2022-12-07', 1, '2022-12-08 08:29:16', 'pexels-karen-laårk-boshoff-7436135.jpg', '', ''),
(24, 'Bracelet', 'tryyyyyyyyyyy', '18', 'Gold', '10', 1, '2500.00', '2022-12-07', 1, '2022-12-08 08:32:28', 'tambourine-jewelry-vintage.jpg', '', ''),
(25, 'Necklace', 'YG NECKLACE', '18', 'Gold', '13', 2, '10000.00', '2022-12-07', 1, '2022-12-08 08:33:43', 'gold-pile-ring-chain-necklace-black-background-accessories-beads-beauty-brilliant-buy-celebration-close-up-commitment-173279899.jpg', '', ''),
(26, 'Bracelet', 'TRY', '18', 'Gold', '2', 1, '500.00', '2022-12-07', 1, '2022-12-08 08:35:21', '2a7f622cc6e27adcc301992880d60d5e.jpg', '', ''),
(27, 'Bracelet', 'TRY LANG PO', '18', 'Diamond', '3.2', 1, '2500.00', '2022-12-08', 1, '2022-12-08 09:07:51', 'tambourine-jewelry-vintage.jpg', '', ''),
(28, 'Ring', 'tryu', '3', 'Gold', '3.2', 1, '500.00', NULL, 0, '2022-12-07 22:33:02', 'gold-pile-ring-chain-necklace-black-background-accessories-beads-beauty-brilliant-buy-celebration-close-up-commitment-173279899.jpg', '', ''),
(29, 'Necklace', 'try', '18', 'Gold', '2.5', 1, '2500.00', NULL, 0, '2022-12-07 22:33:20', 'gold-pile-ring-chain-necklace-black-background-accessories-beads-beauty-brilliant-buy-celebration-close-up-commitment-173279899.jpg', '', ''),
(30, 'Ring', 'try', '18', 'Silver', '3.2', 2, '10000.00', NULL, 0, '2022-12-07 22:42:31', 'pexels-karen-laårk-boshoff-7436135.jpg', '', ''),
(31, 'Bracelet', 'try', '18', 'Gold', '3.2', 1, '500.00', NULL, 0, '2022-12-07 23:37:14', '3804e51bb1bb0170f5c19e89bae69de1.jpg', '', '');

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
  `renewal_due` int(255) NOT NULL,
  `total_amt_paid` int(255) NOT NULL,
  `principal_due` int(255) NOT NULL,
  `loan_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loantbl`
--

INSERT INTO `loantbl` (`loan_id`, `customer_no`, `item_type`, `item_desc`, `appraised_value`, `principal`, `interest`, `date_loan_granted`, `maturity_date`, `expiry_date`, `renewal_due`, `total_amt_paid`, `principal_due`, `loan_status`) VALUES
(1016, 6, 'Necklace', 'Ruby', 10000, 1500, '4.00', '2022-10-30', '2022-11-30', '2022-12-30', 60, 1740, 1500, 'Redeemed'),
(1017, 4, 'Wrist Watch', 'Rolex na Leather', 5000, 800, '4.00', '2022-11-18', '2022-12-18', '2023-01-18', 29, 666, 722, 'Active Loan'),
(1021, 1, 'Bracelet', 'hi', 10000, 1500, '4.00', '2022-11-20', '2022-12-20', '2023-01-20', 57, 60, 1420, 'Active Loan'),
(1023, 7, 'Bracelet', 'asdasda', 10000, 1500, '4.00', '2022-11-22', '2022-12-22', '2023-01-22', 0, 0, 0, 'Active Loan'),
(1024, 3, 'Ring', 'Flower Ring', 2500, 2000, '4.00', '2022-11-25', '2022-12-25', '2023-01-25', 79, 100, 1980, 'Active Loan'),
(1025, 2, 'Bracelet', 'bracelet', 1200, 1000, '4.00', '2022-11-25', '2022-12-25', '2023-01-25', 36, 140, 900, 'Active Loan'),
(1026, 36, 'Ring', 'gsdgsgs', 2500, 2000, '4.00', '2022-12-03', '2023-01-03', '2023-03-03', 80, 0, 2000, 'Active Loan'),
(1027, 53, 'Bracelet', 'wrwrwrwr', 2200, 2000, '4.00', '2022-12-03', '2023-01-03', '2023-03-03', 80, 0, 2000, 'Active Loan'),
(1028, 2, 'Earrings', 'mamako', 2000, 1900, '4.00', '2022-12-03', '2023-01-03', '2023-03-03', 76, 0, 1900, 'Active Loan');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `action_made` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pawntickettbl`
--

CREATE TABLE `pawntickettbl` (
  `pawnticketno` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `date_paid` date NOT NULL,
  `amount_paid` int(255) NOT NULL,
  `transactiontype` varchar(50) NOT NULL,
  `loan_stat` varchar(50) NOT NULL,
  `renewal_paid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pawntickettbl`
--

INSERT INTO `pawntickettbl` (`pawnticketno`, `loan_id`, `date_paid`, `amount_paid`, `transactiontype`, `loan_stat`, `renewal_paid`) VALUES
(46, 1021, '2022-11-20', 60, 'Renewal', 'Active Loan', 60),
(48, 1023, '2022-11-22', 60, 'Renewal', 'Active Loan', 60),
(49, 1024, '2022-11-25', 100, 'Renewal', 'Active Loan', 80),
(50, 1025, '2022-11-25', 140, 'Renewal', 'Active Loan', 40);

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
  `status` int(1) NOT NULL,
  `cname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `security_qstn`, `security_ans`, `name`, `contactno`, `address`, `usertype`, `status`, `cname`) VALUES
(33, 'senantreal', 'senantreal@gmail.com', '3fab8b0071504634dc121d72df523834', 'What was your favorite food as a child?', 'Adobo', '', '', '', 'Admin', 0, ''),
(39, 'Admin', 'mercedhernandez645@gmail.com', '0c909a141f1f2c0a1cb602b0b2d7d050', 'What is the name of your favorite pet?', 'adobe', '', '', '', 'Admin', 0, ''),
(41, 'Appraiser', 'appraiser@gmail.com', 'f69ca5cb90def43b8efcf4baf61726a3', 'What was your favorite food as a child?', 'chicken', '', '', '', 'Appraiser', 0, ''),
(42, 'Inventory Clerk', 'inventoryclerk@gmail.com', '1d5ca15d78398a397dc44a1649a7e61e', 'What is the name of your favorite pet?', 'halim', '', '', '', 'Inventory Clerk', 0, '');

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_ibfk_1` (`user_id`);

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
  MODIFY `auctionid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customertbl`
--
ALTER TABLE `customertbl`
  MODIFY `customer_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `inventorytbl`
--
ALTER TABLE `inventorytbl`
  MODIFY `stock_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1029;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pawntickettbl`
--
ALTER TABLE `pawntickettbl`
  MODIFY `pawnticketno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loantbl`
--
ALTER TABLE `loantbl`
  ADD CONSTRAINT `customer_no_FK` FOREIGN KEY (`customer_no`) REFERENCES `customertbl` (`customer_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pawntickettbl`
--
ALTER TABLE `pawntickettbl`
  ADD CONSTRAINT `loan_jd_FK` FOREIGN KEY (`loan_id`) REFERENCES `loantbl` (`loan_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

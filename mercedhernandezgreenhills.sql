-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 08:06 PM
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
  `filename` varchar(255) NOT NULL,
  `date_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customertbl`
--

INSERT INTO `customertbl` (`customer_no`, `first_name`, `middle_name`, `last_name`, `address`, `cpnum`, `birthdate`, `valid_id`, `filename`, `date_updated`) VALUES
(1, 'Ericka Euro ', 'Abuan', 'Capistrano', 'Manila', '09123245566', '2004-11-30', 'capistrano.png', '', NULL),
(2, 'Jan Earl Benedict', 'DelaCruz', 'Tamayo', 'Makati', '0915245533', '2004-12-30', 'R.png', '', NULL),
(3, 'Mizzy', 'Capistrano\r\n', 'Antonio', 'General Trias Cavite', '09123245566', '2004-07-31', '306513605_622713459293437_8413018732872427529_n.jpg', '', NULL),
(4, 'Sean Raphael', 'Arellano', 'Antonio', 'Sampaloc Manila ', '09164637435', '2000-09-25', '305157510_6170927152924171_7857187867609547983_n.jpg', '', NULL),
(5, 'Raquel', NULL, 'Marasigan', '18B EASTWOOD OLYMPIC HEIGHTS LIBIS, QUEZON CITY', '09234180788', '1970-02-10', 'CzJj4B7UQAAoHzJ.jfif', '', NULL),
(6, 'Analie', NULL, 'Caindoy', 'WFNTM2xHTS8xQ290cnpMMkJmeEdxUXdoeGp1RTNYdjVoVjE4Wk1KVU1lMnNMOHNndytjckw4cm1PMDBVano5YTo6szr+YcrWxLkoLOLxSt272Q==', 'THZmVUZEY2x', '1977-06-07', 'ZHczNHZMU1ZSeUw3aXdNdWtsNXB6Q0M2UDVnVUJDTnR2Z3ZCNHZZeXNpZDFzWGI2Tm1GT3BNT1FVSXZkS3dWS0VZTEdCUitwUXlTOC9haHB3aDhrVXc9PTo6OOxDia9KWgQPyXD4elQH5Q==', '', NULL),
(7, 'Nicole', 'Marie', 'Nicolas', 'VDdZQVlUQUI1NTJLWTJyOFR4NGwvR1F5bzdRWmR1MWRsMWpDR3FzWWZ5ND06OtVynsxDlIv4K8vaQbhTI1M=', 'UXhwNGJ5WTV', '2004-12-01', 'Y0hnSTJjeE1OdmdPQjMzeDJpc2h0a3pFL0pWdUF6cm43NHp0WnFhRnFraz06Or1JNexVHt4sWKqpo7sw1jg=', '', NULL),
(8, 'Adrian', 'MIDDLE NAME', 'Solera', 'ZmVMVnppMVkyTEROWVUwMzd2ckgrZz09OjrZiLuyaN3fbBcLWuAaZAKw', 'MGJPb3hmbk1', '2004-12-08', 'RGsrd3k0T2dJTTA1TmcvWHdaVW1EanNkejJ4Zjl6RWVPNFgvMWxnNkhuZz06Ot06wh6VVPtJBE/i5JWhAS0=', '', NULL),
(9, 'Charles', 'MIDDLE NAME', 'Abiog', 'YXVydjJWbTBoRjNhSzhnR1M2Z3NQdz09Ojo8OqAQf02EP4F8saqlEOOq', 'QmN1QjJlYUh', '2004-01-06', '', '', NULL),
(26, 'Ericka Euro', 'Abuan', 'Capistrano', 'WSt4S1lSdW5GMFJRTlptSS80ZFYvUT09Ojq4DhNMrjv6J2/vuc0Khtql', 'L2dLcVB4T1U', '2004-11-30', 'U0tqWTFST1cwTFN1Zm9RRkNTYWtYME1CU2VsVGU1OVV2T2RPcUF0RFBHc1BxNnhOSUtRRGxtenY0V21DQUlMZjo6A09Gqzjml6nBP/ejk8qxqA==', '', NULL),
(27, 'Sean', 'Raphael', 'Capistrano', 'U0ZBNUlud3h1SEVJVHd6SU41eEJyUEZvRk9FSmIxNlppNlVGdVJhaEc5RT06OghahiTIxqAjOsPdFSV6Hi4=', 'WDg0czJnL2N', '2001-10-25', 'ZEVrODU0T2JUKzAxc3M0c0xtVCtqeVl5TU5oQTlhWW1EUDI1Ym5LT0o2TTA5eEdBSXpsNjVsRmJoN3p2ZStFMTo6h+WN9WjNgNPlUn9ItNe7vw==', '', NULL),
(28, 'Fryki', '', 'Burayt', 'dGFaZVZRa0VmWkkyS0FxcHNpbFFVZz09OjqAWUz0H5ZBAZ9XSefkM6lT', 'YmduNW4rNmF', '2000-02-08', 'sample3.jpg', '', NULL),
(30, 'Larkin', '', 'Samuel', 'blpRRG1yTDVRMXljSnc0NGliSTdQUXBHeWFCblYvc3ZLNk1QdnJiL2Uraz06Ors1FEadep7zYGQ/Sq9rW04=', 'aUw2YlhpcE5', '1988-10-18', 'QTFQa1VFVERnSTROL1lvOVEwc25lUT09Ojpa64/SQ6RcQ2hBN4R+iB90', '', NULL),
(31, 'celia', '', 'macuja', 'b29iYWd0bUg2b3BPQ2cyQVNxeGpRdlNFSW83bURySUVJeGdzQlVDUE50NnphcXZkNGswMGkrWCtqR0R0d0dTKzo6iC8P/fSn9aAsM1yQkql7bA==', 'R2djN1VaTWd', '1999-10-12', 'NDdsUUlkbGpIcGFCTGw0bU8xdi9xUT09OjoNGgxWtx61IANIuC1OKUJC', '', NULL),
(32, 'Jerick', 'Lat', 'Miranda', 'bk5mYXVuM1hPWGJzNEVQRXZZdllUQT09OjrZw/5KAM+VN/O6GLcwGx4Y', 'MjF3NEpoNUh', '1998-02-05', 'ZndTZzdWaldoRXd1Y21RbTh6SHVBdz09OjpgQ1wnfmFGBk4IN5LAENVZ', '', NULL),
(33, 'JC', '', 'De Sagon', 'K0RtaXJzKzZsQ1pQaTJyd0lBK2JxQT09Ojqqy8SbXaY21QpGCOu/ca5S', 'N0hhWExnQlErM3MxQ09LNTFpMklhZz09OjowgSGrXCEwdRd7xiQ74LJh', '2004-10-10', 'Sjg3U3RGV1VrMVBVOTgyWmFRbXZRZz09OjpDgBS1qXrX+tFF9fkw6VX+', '', NULL),
(34, 'Rei', '', 'Kim', 'MUZFVGdIeVdLbkxuUGcyRmtKbEJlQT09OjrO3Ao9yZeQR3kU84CRO3cu', 'dUVucTA4MHJSZSttazBVV0tLL05lZz09Ojo6biKrwx6tYMHQjqf+uMfE', '2003-10-10', 'a25QS3h2dWo5TG9HWFRlellLT0J5UT09OjqTnpuHf6YzilyJgxR4Kgi6', 'R.png', NULL),
(36, 'Mary', '', 'Kim', 'M2NpamwzNGhWK0FrVFNGb3V5aFp1Zz09OjqY012RAui4j3zrlJCyvdIc', 'bEx5aTY5MW9kemdtYkU2eUUxejVpUT09Ojp/vXbdXYnH41yFsAfoHuPa', '1967-01-01', '', '306492684_636900961108183_3097510673591392762_n.jpg', NULL),
(39, 'Zani', '', 'Cruz', 'ZE1EalNDRXRZWVNJN0dZUGRIUzJrUT09OjohH1b1YeeK89o6+SUWFhnc', 'QUpjcCsvcm0zd2lKd2hjd0kxcTZ0Zz09Ojq/KTtNoqB9fhvgnuGo/6Hg', '1967-09-08', '', 'Capture.PNG', NULL),
(43, 'Samuel', '', 'Antonio', 'ODVmaVFXelpsNnNGTkc3Ry9xMmMxdz09OjqzBjCsWZguGMslYPRfzWvW', 'RWhYcXBpS0hCODNlWEhvQXE3cGxmQT09Ojp4jUC/so0xHnzTZbJAGwMX', '1998-01-01', '', 'eEIrWHM4UWNRSEdZTXRLQ3RpYWsxUT09Ojq7x57+geMEzBWO4YVCyXrZ', NULL),
(47, 'Christopher', '', 'Bang', 'UWJFTG4vaVp1eithOVVzYU9qdUFjdz09OjqCv65i9DCl5cOYwSlx6Erx', 'b0JKZGZsUnRvb0hzb0lweENsWEZNQT09Ojp39Z5YyupoJh6FqsRn6Pkj', '1999-02-03', '', 'Z1N4RzF0ZHB4WE9FWUJybjBLbHZqdz09OjpZt1jgiOiKC0QpCNCk7mfO', NULL),
(48, 'Irina', '', 'Reyes', 'Z3dVSUE2UDdsWVNOWGVWQlVPUlBVQT09Ojp2eq5f8Sn6A0JQJoLgpydM', 'djcvY09rL05taWJ2aVUwUWRrS1VKQT09OjoYklJ5ga0GRpRyv/DuMAqh', '2000-02-09', '', 'IMG_0037.JPG', NULL),
(49, 'Yurina', '', 'Yamaguchi', 'TW5NNDVTbHFzTE1vVmdrYkpaenpwQT09Ojoeh9K54UImiYY/qMYscUe7', 'N3hOYS93WE9iUXF3c2p4SmhRclZKdz09OjoEhvzNgZm7NW+DHM+G2ub0', '2000-05-04', '', 'cHYybXljZDhvY3JnNHZYWlV6NTFYZz09Ojqsx8e4DU7bca86UdIxIxCV', NULL),
(50, 'Jessica', '', 'Jung', 'Vm0zRktlTDJiQmViSHFJYmlTdzkxdz09Ojqao2KNuQhgQqC8mK8X+Xxl', 'SjNaSTRUNENCa2xpNmEyUkphV1NVUT09OjpSXx47Wicl/r8EVmJ7NO93', '1976-07-05', '', 'UTZaMENhcHl6ZGJ6dHpmTVQ1WExTQT09OjrYVSYe78aD6qLtIDipGU+f', NULL),
(56, 'Kathryn', 'B', 'Ford', 'eUJGa0sxK01HOUNiV3VHZGJYYTFZZz09OjplVbdlQpGLVUw8mr6ApcKh', 'c1oxWWEzOFhVWUZJMThRRWdtRXlndz09OjqfmXoAfVrMdntD6Tjzt9hC', '1996-03-26', '', 'NUROVTBhTjM2Ri9KeW40UmlhZzFvTklTSEV3N0w1VWJEOVVUSkpHNk02OHBnUUZ1cG90TUx0VHU2UDVYZytidTo617KC2MwZ4QElAuOJ8XsryQ==', '2022-12-14 08:36:14'),
(57, 'Daniel ', '', 'Ford', 'eDhPN2JYUnlMTnMyOU1DSUJPZjdUdz09OjpLOEtTq32WXVQzXrhhT4Rz', 'RHE5bSsxT2Q4SS80Y2dWdEJhcjVWUT09OjpRCEXxFXqtzjvsl0edBwDb', '1995-04-26', '', 'M21oUFdhcDFQYUx2Z3BQVysvMGZvN3pnRUZhMm5NcHNmRiswck5PNk1RTk5keEhVOUVFMU0ycE0yZXplL0NIMDo69nlz5dwb9Sup4MfRl3Rljw==', NULL),
(60, 'Leila', '', 'Ford', 'd01nUVhYRy9TQkJZTUZWNnd2RFFnaFhGSGsyMUYxVlpaVVlEdXJMNVA5cz06OlDCFwr5ar/ii8xzyEQYBR4=', 'eTkyRURpckJLdUlCOEsvWFBENDRuUT09Ojqqz7n5ZUwDb3Abj+liU64F', '2001-10-10', '', 'SjhHNU1qM25YaldRZWZuLzFzaFdwK0xOMEJONHpFbHVZVkxuYUtlMlVMWDNCWHA1cy85VmllL2o2ZGFFRThFSzo6e5hDNDqk7V34vmyECo/zrg==', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `custsample`
--

CREATE TABLE `custsample` (
  `custno` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cpnum` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `valid_id` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(30, 'Ring', 'try', '18', 'Silver', '3.2', 2, '10000.00', '2022-12-13', 1, '2022-12-13 09:43:39', 'pexels-karen-laårk-boshoff-7436135.jpg', '', ''),
(31, 'Bracelet', 'try', '18', 'Gold', '3.2', 1, '500.00', NULL, 0, '2022-12-07 23:37:14', '3804e51bb1bb0170f5c19e89bae69de1.jpg', '', ''),
(32, 'Bracelet', 'dsada', '', '', '3.2', 2, '2500.00', NULL, 0, '2022-12-08 00:07:45', '2a76e6e8e9c003b8b4333c08f39b5901.jpg', '', ''),
(33, 'Earrings', 'try', '18', '', '3.30', 1, '2500.00', NULL, 0, '2022-12-08 00:23:59', 'pexels-karen-laårk-boshoff-7436135.jpg', '', ''),
(34, 'Bracelet', 'aadasdada', '18', 'Gold', '3.2', 1, '7000.00', '0000-00-00', 1, '2022-12-08 17:44:00', 'tambourine-jewelry-vintage.jpg', '', ''),
(35, 'Ring', 'Heart Ring', '', 'Silver', '3', 1, '2500.00', NULL, 0, '2022-12-08 17:35:57', 'pexels-kenneth-surillo-5157293.jpg', '', ''),
(36, 'Ring', 'Heart Ring', '', 'Red Ruby', '4', 1, '3000.00', NULL, 0, '2022-12-08 17:38:39', 'pexels-superlens-photography-4595716.jpg', '', ''),
(37, 'Bracelet', 'Silver flower bracelet 9grams', '14', '', '3', 1, '7000.00', '0000-00-00', 0, '2022-12-14 00:24:45', 'pexels-kenneth-surillo-5157293.jpg', '', ''),
(38, 'Bracelet', 'tryyastatasaf', '', '', '2', 1, '500.00', NULL, 0, '2022-12-08 17:44:24', 'national-id.jpg', '', ''),
(39, 'Ring', 'tryafsfas', '', '', '2', 1, '10000.00', NULL, 0, '2022-12-08 17:46:52', '306513605_622713459293437_8413018732872427529_n.jpg', '', ''),
(40, 'Ring', 'YG BRACELET', '', '', '2', 1, '500.00', NULL, 0, '2022-12-12 21:37:17', 'GROUP_6_TECHNO_PROJECT.pdf', '', ''),
(41, 'Ring', 'YG RING 24KARAT', '12', '', '21', 12, '12.00', '0000-00-00', 0, '2022-12-14 00:24:09', 'pexels-christian-heitz-842711.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `loansample`
--

CREATE TABLE `loansample` (
  `loanid` int(11) NOT NULL,
  `custno` int(11) NOT NULL,
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
(1021, 1, 'Bracelet', 'hi', 10000, 1500, '4.00', '2022-12-13', '2023-01-13', '2023-02-13', 53, 217, 1320, 'Active Loan'),
(1023, 7, 'Bracelet', 'asdasda', 10000, 1500, '4.00', '2022-11-22', '2022-12-22', '2023-01-22', 0, 0, 0, 'Active Loan'),
(1024, 3, 'Ring', 'Flower Ring', 2500, 2000, '4.00', '2022-11-25', '2022-12-25', '2023-01-25', 79, 100, 1980, 'Active Loan'),
(1025, 2, 'Bracelet', 'bracelet', 1200, 1000, '4.00', '2022-11-25', '2022-12-25', '2023-01-25', 36, 140, 900, 'Active Loan'),
(1026, 36, 'Ring', 'gsdgsgs', 2500, 2000, '4.00', '2022-12-03', '2023-01-03', '2023-03-03', 80, 0, 2000, 'Active Loan'),
(1028, 2, 'Earrings', 'mamako', 2000, 1900, '4.00', '2022-12-03', '2023-01-03', '2023-03-03', 76, 0, 1900, 'Active Loan'),
(1029, 1, 'Bracelet', 'YG BRACELET', 5200, 5000, '10.00', '2022-12-08', '2022-11-08', '2023-03-08', 500, 0, 5000, 'Two Months Late'),
(1030, 34, 'Bracelet', 'YG BRACELET 24K 10GRAMS', 5200, 5000, '4.00', '2022-12-09', '2023-01-09', '2023-02-09', 200, 200, 5000, 'Active Loan'),
(1031, 60, 'Ring', 'YG RING 12K 10 GRAMS', 5200, 5000, '4.00', '2022-12-09', '2023-01-09', '2023-02-09', 200, 200, 5000, 'Active Loan');

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

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `action_made`, `date_created`) VALUES
(34, 41, 'user logged in', '2022-12-09 01:57:42'),
(35, 41, 'added a customer', '2022-12-09 01:58:50'),
(36, 41, 'deleted a customer', '2022-12-09 02:04:08'),
(37, 41, 'Updated a Customer', '2022-12-09 02:05:43'),
(38, 41, 'added a loan', '2022-12-09 02:06:25'),
(39, 41, 'added a pawn ticket', '2022-12-09 02:06:46'),
(46, 39, 'user logged in', '2022-12-12 09:47:36'),
(47, 39, 'user logged in', '2022-12-13 09:33:08'),
(48, 39, 'added a pawn ticket', '2022-12-13 09:38:11'),
(49, 39, 'user logged out', '2022-12-13 12:36:32'),
(50, 39, 'user logged in', '2022-12-13 02:14:05'),
(51, 39, 'user logged out', '2022-12-13 02:14:35'),
(55, 39, 'user logged in', '2022-12-13 05:31:24'),
(56, 39, 'added a stock', '2022-12-13 05:37:17'),
(57, 39, 'added a customer', '2022-12-13 05:40:13'),
(58, 39, 'updated a stock', '2022-12-13 05:43:39'),
(59, 39, 'added a stock', '2022-12-13 05:48:54'),
(60, 39, 'user logged in', '2022-12-14 12:57:47'),
(61, 39, 'user logged in', '2022-12-14 08:23:10'),
(62, 39, 'updated a stock', '2022-12-14 08:24:09'),
(63, 39, 'updated a stock', '2022-12-14 08:24:45'),
(64, 39, 'Updated a Customer', '2022-12-14 08:28:09'),
(65, 39, 'deleted a customer', '2022-12-14 08:28:12'),
(66, 39, 'Updated a Customer', '2022-12-14 08:28:36'),
(67, 39, 'deleted a customer', '2022-12-14 08:32:43'),
(68, 39, 'deleted a customer', '2022-12-14 08:33:57'),
(69, 39, 'deleted a user', '2022-12-14 08:40:07'),
(70, 39, 'deleted a customer', '2022-12-14 08:41:48'),
(71, 39, 'deleted a customer', '2022-12-14 08:42:57'),
(72, 39, 'Updated a Customer', '2022-12-14 09:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `pawnticketsample`
--

CREATE TABLE `pawnticketsample` (
  `pawntixno` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `date_paid` date NOT NULL,
  `amount_paid` int(255) NOT NULL,
  `transactiontype` varchar(50) NOT NULL,
  `loan_stat` varchar(50) NOT NULL,
  `renewal_paid` int(255) NOT NULL
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
(50, 1025, '2022-11-25', 140, 'Renewal', 'Active Loan', 40),
(51, 1030, '2022-12-09', 200, 'Renewal', 'Active Loan', 200),
(52, 1031, '2022-12-09', 200, 'Renewal', 'Active Loan', 200),
(53, 1021, '2022-12-13', 157, 'Renewal', 'Active Loan', 57);

-- --------------------------------------------------------

--
-- Table structure for table `stockssample`
--

CREATE TABLE `stockssample` (
  `stock` int(255) NOT NULL,
  `edit_no` int(11) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `itemdescription` text NOT NULL,
  `karat_gold` varchar(255) NOT NULL,
  `kindofstone` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `itemqty` int(255) NOT NULL,
  `tagprice` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(39, 'Admin', 'mercedhernandez645@gmail.com', '0c909a141f1f2c0a1cb602b0b2d7d050', 'What is the name of your favorite pet?', 'adobe', '', '', '', 'Admin', 0, ''),
(41, 'Appraiser', 'appraiser@gmail.com', 'f69ca5cb90def43b8efcf4baf61726a3', 'What was your favorite food as a child?', 'chicken', '', '', '', 'Appraiser', 0, ''),
(42, 'InventoryClerk', 'inventoryclerk@gmail.com', '1d5ca15d78398a397dc44a1649a7e61e', 'What is the name of your favorite pet?', 'halim', '', '', '', 'Inventory Clerk', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `usersample`
--

CREATE TABLE `usersample` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `custsample`
--
ALTER TABLE `custsample`
  ADD PRIMARY KEY (`custno`);

--
-- Indexes for table `inventorytbl`
--
ALTER TABLE `inventorytbl`
  ADD PRIMARY KEY (`stock_no`);

--
-- Indexes for table `loansample`
--
ALTER TABLE `loansample`
  ADD PRIMARY KEY (`loanid`);

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
-- Indexes for table `pawnticketsample`
--
ALTER TABLE `pawnticketsample`
  ADD PRIMARY KEY (`pawntixno`);

--
-- Indexes for table `pawntickettbl`
--
ALTER TABLE `pawntickettbl`
  ADD PRIMARY KEY (`pawnticketno`),
  ADD KEY `loan_jd_FK` (`loan_id`);

--
-- Indexes for table `stockssample`
--
ALTER TABLE `stockssample`
  ADD PRIMARY KEY (`stock`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersample`
--
ALTER TABLE `usersample`
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
  MODIFY `customer_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `custsample`
--
ALTER TABLE `custsample`
  MODIFY `custno` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventorytbl`
--
ALTER TABLE `inventorytbl`
  MODIFY `stock_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `loansample`
--
ALTER TABLE `loansample`
  MODIFY `loanid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loantbl`
--
ALTER TABLE `loantbl`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1032;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `pawnticketsample`
--
ALTER TABLE `pawnticketsample`
  MODIFY `pawntixno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pawntickettbl`
--
ALTER TABLE `pawntickettbl`
  MODIFY `pawnticketno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `stockssample`
--
ALTER TABLE `stockssample`
  MODIFY `stock` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `usersample`
--
ALTER TABLE `usersample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pawntickettbl`
--
ALTER TABLE `pawntickettbl`
  ADD CONSTRAINT `loan_jd_FK` FOREIGN KEY (`loan_id`) REFERENCES `loantbl` (`loan_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

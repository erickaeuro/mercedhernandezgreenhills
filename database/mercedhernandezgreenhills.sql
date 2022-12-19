-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 19, 2022 at 04:49 AM
-- Server version: 10.5.16-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u228255941_mhgjpdb`
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
  `status` varchar(255) NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auctiontbl`
--

INSERT INTO `auctiontbl` (`auctionid`, `item_type`, `item_desc`, `price`, `date_sold`, `status`, `date_updated`) VALUES
(15, 'Pendant', 'Family Heirloom', 4100, '2022-10-16', 'Sold', '0000-00-00 00:00:00'),
(16, 'Ring', 'Ruby Ring', 4100, '2022-10-19', 'Sold', '0000-00-00 00:00:00'),
(18, 'Wrist Watch', 'Rolex na Leather', 5000, '2022-12-03', 'Sold', '0000-00-00 00:00:00'),
(19, 'Bracelet', '1 Gold Bracelet', 5200, '2022-11-26', 'Sold', '0000-00-00 00:00:00'),
(20, 'Ring', '1 Diamond Ring', 5000, '2022-11-26', 'Sold', '0000-00-00 00:00:00'),
(21, 'Ring', 'Ring na Malupet', 20000, '2022-12-03', 'Sold', '0000-00-00 00:00:00'),
(22, 'Earrings', 'YG Heart Earrings 14k 6grams', 3200, '2022-12-04', 'Sold', '0000-00-00 00:00:00');

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
  `valid_id` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customertbl`
--

INSERT INTO `customertbl` (`customer_no`, `first_name`, `middle_name`, `last_name`, `address`, `cpnum`, `birthdate`, `valid_id`, `filename`, `date_created`, `date_updated`) VALUES
(1, 'Mark Anthony', '', 'Degala', 'ZFZ4clljbysxMEVTWWRubDBFQVBFeitVNFp0c0xOZlNpTmFDVC85aEhzTT06OtXShB5r6VKziSoEDrpeRmQ=', 'TTFrWmJTK0JvNENWbWQ2VkF6L0NkZz09Ojr47aJAssyEYsBaO/um9MM6', '1984-08-24', '', 'R2cwcVhXbkdIeGVnMFdKamt3ODJlQT09Ojqo0Pm0tMO8f5KSNGnzNiDy', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(2, 'Nicole Marie', '', 'Nicolas', 'cDUyajlnMC91WC8yVnFoSVQvNlVsaGg0VzRjeHRBVVFWWVdsZUtDVzAwUT06OmBQnrUL+Scv8G9B6I/iEQo=', 'YkUwZXlyTDNHcXVCcGJ0bGVKWVZFQT09Ojp0SzjBFKBRDw/525EbqKkz', '1994-11-16', '', 'SFNZT04xck1qcW1UOHhQRGMwZ09aUT09OjpnAcsqcNUTrbE1V/ugLk2q', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(3, 'Margarita', '', 'Luglug', 'WjJnMmR2MGh6NWNCQkhQSVJJdlh2TkVrazVSOUJuQVFQTXJGdDN3RG11cWk4VTB1UnlBL3MxU2ZMRm56OUNrTjo6TR3TMkqdXLs91/MSGKKd8Q==', 'RmdVZVhtOUtpNit1QmJQZWVmZHFqZz09OjqROD2ENPOUc6zWKS5+DHNC', '1974-03-27', '', 'TkgzbnB1Q1Zocm1xSWFzNnFHSUMyQT09OjqrijAdEBQVT5EGOQSFXvca', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(4, 'Jino', '', 'Alcantara', 'ekoyLy9JNWhaRGFTM203Y1UzTHVqT0tEa0lvR2xpQWN2NHZLVHNDZ2JoST06OobrfwslLATg7V8qy5zw4Xo=', 'dllsUFh6SHNhUVVXN0g1VnpNekhTZz09Ojpld+xCna5oZmsREuyXUUef', '1971-07-09', '', 'djZzZWc0QytlZXF3VE5IUjdST2dBVnFRR1hJMWpUaWhCR0g2NUFQaUNKQT06OjXjpXMaomToX17MVfqIkP4=', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(5, 'Michelle', 'T.', 'Crisostomo', 'V2lweldiQ0VvTGliTFM0RHB0UEU5U1U2UHdDTDI1c2NydXBXakRHTytiVDRtYU9zOFUzM08wdzdiOFJ5MmtuSzo6L82Or6N9lJetz4erqCDiow==', 'cGsrQkdOeHJYWnh3bmFiME56c2NNZz09OjqvPhqLTuwXgACWwiJidIDn', '1977-07-15', '', 'V3BqbkN6RkxHdlNNYmVVc051RzZhZz09OjrkMEPCMeWaZbZ7j5Zt1DtT', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(6, 'Azizan Mary', '', 'Sam', 'MVhiRDJYMHV3eWRqdWhHckNUbkNzQVZpTGorSVRYU0F0a0dFdFdQMFV2MTE2bXdQMnB5eGlIYzJ1Q2NMc1A1Tzo6XAqDsKDBSXI1cA6RfHQURw==', 'VmFGOHNnRHdBVUtycncycmMwRXJmQT09Ojr5j/sgVhfBygwhkKfAicEa', '1986-05-07', '', 'NUF6SVB0ZktQOEprS1VaMlE0b0J1dz09OjqCIKEtrEjYG9fFBzwof8dm', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(7, 'Elizabeth', '', 'Bautista', 'RHhaYlFLME1lcis4Y3puZkNwM09RNGNvYmk1YWQ5czJibjFCckMvWDAyOE5yU1VCbU1lNkhIWVZoeVRPTlpTUjo6ogKdfUArXvX5idC8Y3iNSg==', 'ZUJZSmJ5VlF6cjVMVTh0Qll6NEx3Zz09OjoLxhO+CQydCSZRL8auaesM', '1997-04-16', '', 'a3RwOERmNTNlK2ErQi9wNVNGYmZGQ0VXOGY0Z2Y5dGkyNVJoWmNXZWFWST06OvvfKTch8qDP9oCpBZ9XQHA=', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(8, 'Lorna', '', 'Sumalinog', 'T3h3SGllZWZ6VHhzckZHdHZLK0swSy8wZ3V5Sy9YclhoWHhXWnhTNWhsa2pTVHdVUmJJZlpxclppOU1DNzM5eTo67Jl5OMv9Re6Vp/AJCiNDtA==', 'NVpHekhsZjR5MWVmem8xeVdKa3hNdz09OjoxS/se6NoshptkYw4rJM3e', '1988-10-04', '', 'TVVzdzVZcFptUUZZd25RbEU1MU0rNElOaDVxaVNuM2pGeXp1QVBBU2lpOXlkYTQzVWdFbkRnRE1JL0l0S2s0OTo67d/H4ijEBktSTKNtP2NdhA==', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(9, 'Jose Maria', '', 'Hilario', 'b1FGV1pRYzYzQW51OWcwRmpVeEFmcWRQZkcrQld1RVdYbEJuQXJOL05zMnhyOEZQQzdxaXZtemNUcFl1U293bjo6tcgy4mX3+XOLhwbV+qf8JA==', 'a2hla2lBOFlsN0YyM3pBZ1QvOENPZz09OjqykT9jYqh7SdShKFgsp/AG', '1976-10-15', '', 'cFRBbCtSWmRjTDhTa1dCUDRseENwRkFGdm16Lyt3Mld2OWZGckZSZmRzVT06Ool9LLJLcrJmBPE8kP+ipOc=', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(10, 'Venus', '', 'Javier', 'M3hQTkRtckZXSTJjeWhNQkFlOWNQZnh2cFJaZ201azNyYnNtbW9ZeTlCalRsNXY3SWQwdytROE5tU1VuZHVGMjo6qqhYRu4NQ663K5ohRpwunQ==', 'MGdyMzFkTmNWdGgrSHZmQVN4NzJ0UT09OjqoJ7nXb8aTOhgvSfYe8mrj', '1963-02-23', '', 'ZEdPdnFJZklFYTdzZ05GaTVZMTRvUT09OjoiPB40ENiP/Xjj1MS+yG6g', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(11, 'Dolores', '', 'Villamin', 'eHphVVUzbWlMelBDRzFZZGZ2dTV5Q1hDMEtMQlcxNmxieldWNDIwZGR3Yi9seFZmeDliZzFTb0R3OGw4TThmcDo6eE5/bHaHs7fFWKarqTfUYA==', 'a3BvckVOMWcxTDA3U2twR0R2bzROdz09OjoTG8q/eJDZn4emWOEtnyaI', '1988-05-18', '', 'L1lLNG9Ha0J6YUgrYzRBTVdHR1R2Zz09Ojqf1Ff9nIyLaKgQDvukvtNs', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(12, 'Ma. Elena', '', 'Vergara', 'V1VBaStmZmhBVUpPNHllUGVGdm1hUEFYWGtVc0RNc0hQZWwyUFMyVk5oY1NpNTNCY1lNUHlSSFVLb243Z3pIYTo6yJGTozzZ6PN8fSzcS3bm3g==', 'T1FRT25KdWx2SWlPWTVNUUV1bDA2UT09OjoZvLM0ILVZOVHFluQy6cMt', '1975-04-07', '', 'a0M5RDhreEpnbWwwTzRGbHlDZUNmMzFPS2QzOUtyQ1JxN0VtbGRSNkEzTT06OsFpPRSaWK8XsW7ZYLxXXVQ=', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(13, 'Andrea Josephine', '', 'Former', 'dUtLWkY5SEZZd0pKNUhKSVB5Z2NTMHZyTmhNVHZydVA4VzlnRFRabm5iRDFKMlgvMWNlZjFBeHp4L1ArdEhCNmxSMUtVOVpMdGI3eXJldW9Zbnlsd3c9PTo6Bo4ShV6OhnXI8ZTFb3O29A==', 'M3NzRm9Ndk02RFZrclhJK0s2M1BBQT09OjrKrSLJVDfqMpOrEkpZ6j/E', '1989-07-13', '', 'VmFwb1F5UTFyMVhVMS9Mc0FhVFAydz09OjpsjCRUs7TRxhvdoPL3Qage', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(14, 'Charries', '', 'Perez', 'NXMwN1Y0Y3N4eWgrSVhyRTNqU2tTRDA2ODBGbld6TGdQdTFTU1JWd2JZNFhUeElhMnVTcm5jd3NFSVZmWFV1Njo6hTPjIvqtKZaZ78KwE0GpBg==', 'Q1VsaXk0dlV0b3FVTnl5dUtBM3h6dz09OjoFNiZGC0kuBjCoiQDpgEEG', '1986-05-06', '', 'Vm85MEZ3Ymw1WlhuUEs3SmxIc2dRQT09OjrG/0tZMCiAx4J7/kDRG8ar', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(16, 'Joselito', '', 'Domingo', 'VHRqQVczNWF6SUpmeWtlSUFqdGNNbDUyMytJWjMxb0ZMWU41aU1tQWlzbz06Ok2aaSpp33Ma9B93Kt7QA0M=', 'VGdobUZHa3F6cHpkVmVsYXVnRlA3QT09OjrXrMCSnj3pNgIcGhobdBVN', '1967-12-15', '', 'V1p2c2RsczVybXFrdVYzQlMvN2VmZz09OjrDFWYi8z5Umiz6q0tDBiEr', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(17, 'Monica', '', 'Soliman', 'Q0VrUEI3bU5Ld0thV0tCcWh2dUN6d2FDVG5ybTU1Vno3Tk9HWi90V3REejBEME9aZFdmWHpZVDlJMFBweHdVSDo6QJTBqAMUc+GmTyFk9j0Q9w==', 'cFdoZDJWaVF2NG1odU9pZm5iUDZGZz09OjorrGEFQYRbKO0+6Hg9Efdh', '1983-05-31', '', 'czI4Q3dhODZxMkxJbzlXRFRKd09zUT09OjqzSREwcyC5EE7BtCWrxgeA', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(18, 'Juliet', '', 'Peterson', 'Q2NCS0VQRFArN3I5Z0d0Z255NHZDaWR1SnI0M2E0a1ZlTW8yanMxRjNDVDR4VEVINm4rUGc0L1Z6Q3o2T1FDVzo6FKI5vXlSy9ehfsIEdSow8g==', 'ZFV4L01tZFZJK3hzTngrVVlCWkp1UT09OjqlpGU9Gg5IFNUNNRQdXehU', '1963-01-01', '', 'STh0TFV2dkdqeEZtRnJVUzhxSmhMN0J6VEM0VnVFL08rUlZhT0tuQjhUbz06OsJu8LcbOV904eu6XTyGVCk=', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(19, 'Loyd', '', 'Ramirez', 'YnhtcWZ2TmsrWjcva2Mxd043QUJ0enhxOVAraGNReXV2a2M5U3RlZHc3bz06OpNYgISoRD4FfxB5FDB0qVE=', 'OE1qUjZmRnVSaDhBcXhwRW52cTJYZz09OjoEeg4YTd4obCvgoRK8ghMP', '1983-11-26', '', 'c1phenRxb2g4emRsK3FFUFhYQ3NjZz09Ojq5v0Lie4Xsb2qcBSIQQAJv', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(20, 'Corazon', '', 'Tierra', 'RFNpTnpweHc3TTk0dTMyczM2a1ErdEZXUjh6MlZNa1NBRU1kdlhkUVVhejdzbFdONm54U0tKVTdhb1ZLeFFTYzo6fE+VkS2DqyeDcUnzXgsW4Q==', 'aFQrbm5HMzJzdjQvUGs1cEFxYytGUT09OjqwJvBZTFlByhem9Ws03I3y', '1961-09-14', '', 'Z3hmSjdGaFMvVlozTkdzR0orQ1N2QT09Ojp0amALw4JYh5ertoLPrpQ9', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(24, 'John', 'Tigum', 'Acre', 'Z3Z0T29tOXNiN3ZXaGhkWWZQWnNoZz09OjoKrHzocEgSFgfzXglfUmBP', 'UllGcElRK0NSRHp3SXQ3UXowaGMvUT09OjrgVW74a+VehPE099n8dQC6', '1998-10-23', '', 'aFIvbDZqSEt5bUZRMGhhbytGdGR4UT09OjqHP1RelmFhsml+hl9x/BMH', '2022-12-14 00:46:15', '0000-00-00 00:00:00'),
(25, 'Gina', '', 'Lopez', 'bTZ4U2JOSlkwQjlWUTV2MFpQdi9oZz09OjpadBg9zKrpGdmMzW5LF0U3', 'YlkxMXJYZXozeWllbk51bnVaOU4yZz09OjqHyZUk85y74bucxU1v3rPP', '1989-07-06', '', 'K1JZeWNSYnJkd2RmVTljUUR5SERxUT09OjqsAvstF/186Tl7qpV93fcn', '2022-12-14 00:27:40', '0000-00-00 00:00:00'),
(26, 'Pujan', '', 'Som', 'S0ZpN2Jhd0N6MVJRMDROdHVWRndPNDROWnlOYlNldnpJWWpNU0lXUG9IST06OjaIk/ubBy2AwPkZUCGNF8A=', 'L2tHbkxJMVpXb0RsTzBjc29yVElTUT09OjqOiW9cosoYnJjnsEzqlQHB', '1997-11-20', '', 'T0g4dFZIOUx4TEtoTFdnU1FpUlQyZz09OjoLlSFxS8E/LCMYSI2CEY86', '2022-12-14 01:19:34', '0000-00-00 00:00:00'),
(27, 'Ardies', '', 'Pujan', 'c1NJdTUvalZEM21KVU5LcnB1TUlLQT09OjqBMlDANcGRCAgIWwTXhg58', 'Z2p2eHRrVVRBY3UrajVkVytEVzJJdz09OjpGJgZyjZfF/Gf/7NyhgjOo', '1977-05-01', '', 'TnJmUkFpUDhyK3FBQjZNSkNyYXRZVjNyeFZqa1NDZXV2WVhEMUpkaFZZaz06Oj1xniDprgdcbi7jcv4I80Y=', '2022-12-14 01:18:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `custsample`
--

CREATE TABLE `custsample` (
  `custno` int(255) NOT NULL,
  `edit_no` int(11) NOT NULL,
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
  `date_created` varchar(50) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventorytbl`
--

INSERT INTO `inventorytbl` (`stock_no`, `item_type`, `itemdescription`, `karat_gold`, `kindofstone`, `weight`, `itemqty`, `tagprice`, `date_sold`, `move`, `date_created`, `file_name`, `type`, `size`) VALUES
(1, 'Bracelet', '14 karat 10grams', '24', ' Red Rubys', '2', 1, '7000.00', '0000-00-00', 1, '2022-12-13 18:34:15', 'jewelry.jpg', '', ''),
(2, 'Bracelet', 'w/ Charms', '2', 'Ruby', '5', 1, '1000.00', NULL, 0, '2022-12-13 12:52:32', 'bracelet.jpg', '', ''),
(3, 'Pendant', 'THB chain w/ pendant \"dragon\"', '5', 'Gold', '8', 1, '1400.00', NULL, 0, '2022-12-13 12:52:34', 'pendant.jpg', '', ''),
(4, 'Pendant', 'THB chain w/ pend wheel & anchor', '10', 'Gold', '6', 1, '800.00', NULL, 0, '2022-12-13 12:52:36', 'pendantwheelandanchor.png', '', ''),
(5, 'Ring', ' ring w/ heart & ribbon design', '3', 'Diamond', '4', 2, '400.00', NULL, 0, '2022-12-13 12:52:37', 'ringheart.jpg', '', ''),
(6, 'Necklace', 'Rope Chain', '4', 'Gold', '3.6', 1, '1800.00', NULL, 0, '2022-12-13 12:52:39', 'Rope-Chain.png', '', ''),
(7, 'Anklet', 'ANKLET  W/ CHARMS', '7', 'Gold', '5.7', 1, '1000.00', NULL, 0, '2022-12-13 12:52:41', 'Ankletwcharms.png', '', ''),
(8, 'Ring', 'YG BAND RING W/ ENGRAVING', '5', 'Gold', '7.7', 1, '1500.00', '2022-12-14', 1, '2022-12-14 01:30:42', 'ringengraving.jpg', '', ''),
(9, 'Anklet', 'YG ANKLET WITH/ CHARMS \"DOLPHIN\"', '2', 'Gold', '5', 1, '700.00', '2022-12-14', 1, '2022-12-14 00:02:54', 'ankletdolphin.png', '', ''),
(10, 'Pendant', 'YG BL CHAIN W/ PEND W/ SOLO F RUBY ST &', '10', 'Red Ruby', '12', 1, '7000.00', NULL, 0, '2022-12-13 12:52:49', 'necklaceruby.jpg', '', ''),
(11, 'Bracelet', 'YEL M BRACELET W/ DANCING DIAMONDS', '12', 'Diamond', '15', 1, '24000.00', '2022-12-04', 1, '2022-12-04 01:30:19', 'braceletdia.jpg', '', ''),
(12, 'Ring', 'YG BAND RING ', '2', 'Gold', '3.2', 1, '750.00', NULL, 0, '2022-12-13 12:52:51', 'bandring.jpg', '', ''),
(13, 'Anklet', 'YG ANKLET BL W/ BALLS ', '3', 'Gold', '1.6', 1, '600.00', NULL, 0, '2022-12-13 12:52:54', 'ankletballs.jpg', '', ''),
(14, 'Anklet', 'YG HB ANKLET', '8', 'Gold', '16.6', 1, '4000.00', '2022-12-04', 1, '2022-12-13 12:30:12', 'anklet.png', '', ''),
(15, 'Necklace', 'YEL CHAIN W/ CROSS PEND W/ SOLO F PEARL', '0', 'Pearl', '3', 1, '1000.00', NULL, 0, '2022-12-13 12:52:57', 'necklacepearl.jpg', '', ''),
(16, 'Bracelet', 'Infinity Bracelet', '14', 'Diamond', '12', 1, '22000.00', NULL, 0, '2022-12-13 12:52:59', 'infinitybracelet.jpg', '', ''),
(17, 'Necklace', 'YG THB CHAIN ', '18', 'Gold', '3.6', 1, '700.00', NULL, 0, '2022-12-13 12:53:02', 'necklacechain.png', '', ''),
(18, 'Necklace', 'YG FLAT CHAIN ONLY', '17', 'Gold', '3.3', 1, '3000.00', NULL, 0, '2022-12-13 12:53:04', 'chain.jpg', '', ''),
(19, 'Ring', ' yg adj. ring ', '14', 'Gold', '7.6', 1, '1600.00', '0000-00-00', 1, '2022-12-13 17:05:42', 'adjring.jpg', '', ''),
(20, 'Bracelet', 'yg ID bracelet', '41', 'Gold', '8.1', 12, '1500.00', '0000-00-00', 1, '2022-12-13 17:21:42', 'braceletID.png', '', ''),
(21, 'Ring', 'Diamond Ring', '24', 'Silver', '4', 1, '2000.00', '0000-00-00', 1, '2022-12-13 17:05:21', 'pexels-kenneth-surillo-5157293.jpg', '', ''),
(22, 'Ring', 'Gold with diamonds.', 'Gold', 'Diamond', '4.7', 2, '25000.00', '0000-00-00', 0, '2022-12-13 18:57:54', 'jewelries.jpg', '', ''),
(23, 'Ring', 'Ring', '14', '', '3.7', 1, '2500.00', NULL, 0, '2022-12-13 16:25:50', 'rings.jfif', '', ''),
(24, 'Ring', 'Rings', '14', ' ', '4', 1, '2500.00', '2022-12-04', 1, '2022-12-13 17:32:04', 'pexels-kenneth-surillo-5157293.jpg', '', ''),
(25, 'Bracelet', 'Bracelet Heart', '2', ' 2', '5', 5, '600.00', '2022-12-13', 1, '2022-12-13 18:33:50', 'bracelet.png', '', '');

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
-- Table structure for table `loansample`
--

CREATE TABLE `loansample` (
  `loanid` int(11) NOT NULL,
  `edit_no` int(11) NOT NULL,
  `custno` int(11) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `appraised_value` int(255) NOT NULL,
  `principal` int(255) NOT NULL
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
  `date_loan_granted` date DEFAULT NULL,
  `maturity_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `renewal_due` int(255) NOT NULL,
  `total_amt_paid` int(255) NOT NULL,
  `principal_due` int(255) NOT NULL,
  `loan_status` varchar(255) NOT NULL,
  `date_created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loantbl`
--

INSERT INTO `loantbl` (`loan_id`, `customer_no`, `item_type`, `item_desc`, `appraised_value`, `principal`, `interest`, `date_loan_granted`, `maturity_date`, `expiry_date`, `renewal_due`, `total_amt_paid`, `principal_due`, `loan_status`, `date_created`) VALUES
(1041, 2, 'Wrist Watch', '24k', 12000, 10000, '4.00', '0000-00-00', '0000-00-00', '0000-00-00', 400, 11200, 0, 'Redeemed', ''),
(1045, 1, 'Bracelet', '24karat', 14000, 12000, '6.00', '2022-12-04', '2022-11-04', '2023-03-04', 1280, 0, 10000, 'Two Months Late', ''),
(1046, 10, 'Ring', 'Highest Cut Quality Diamond', 500000, 100000, '10.00', '2022-12-04', '2022-11-04', '2023-02-04', 10000, 4000, 100000, 'Two Months Late', ''),
(1047, 11, 'Earrings', 'YG Heart Earrings 14k 6grams', 3200, 3000, '4.00', '2022-08-04', '2022-12-03', '2022-11-03', 348, 220, 2900, 'Auctionted', ''),
(1049, 10, 'Ring', 'Ring Siya', 14000, 1000, '10.00', '2022-12-08', '2022-10-07', '2023-03-08', 100, 0, 1000, 'Two Months Late', ''),
(1050, 6, 'Earring', 'YG EARRINGS 10GRAMS 18KARAT', 5200, 5000, '4.00', '2022-12-19', '2023-01-19', '2023-02-19', 200, 200, 5000, 'Active Loan', '');

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
(50, 39, 'user logged in', '2022-12-13 05:23:38'),
(51, 39, 'user logged in', '2022-12-13 05:59:39'),
(52, 39, 'user logged in', '2022-12-13 08:16:34'),
(53, 39, 'user logged out', '2022-12-13 09:15:31'),
(54, 39, 'user logged in', '2022-12-13 09:16:35'),
(55, 39, 'user logged in', '2022-12-13 10:42:55'),
(56, 39, 'user logged in', '2022-12-13 11:06:35'),
(57, 39, 'user logged in', '2022-12-14 12:11:57'),
(58, 39, 'user logged out', '2022-12-14 12:16:10'),
(59, 46, 'user logged in', '2022-12-14 12:16:29'),
(60, 46, 'user logged out', '2022-12-14 12:16:40'),
(61, 39, 'user logged in', '2022-12-14 12:18:23'),
(62, 39, 'user logged out', '2022-12-14 12:18:59'),
(63, 46, 'user logged in', '2022-12-14 12:19:18'),
(64, 46, 'user logged out', '2022-12-14 12:19:51'),
(65, 49, 'user logged in', '2022-12-14 12:20:27'),
(66, 49, 'user logged out', '2022-12-14 12:21:08'),
(67, 39, 'user logged in', '2022-12-14 12:21:45'),
(68, 39, 'user logged out', '2022-12-14 12:27:25'),
(69, 39, 'user logged in', '2022-12-14 12:28:04'),
(70, 39, 'user logged in', '2022-12-14 12:35:29'),
(71, 39, 'Updated a Pawn Ticket', '2022-12-14 12:44:00'),
(72, 39, 'Updated a Pawn Ticket', '2022-12-14 12:44:19'),
(73, 39, 'Updated a Pawn Ticket', '2022-12-14 12:45:29'),
(74, 39, 'Updated a Pawn Ticket', '2022-12-14 12:45:37'),
(75, 39, 'Updated a Pawn Ticket', '2022-12-14 12:45:55'),
(76, 39, 'added a customer', '2022-12-14 12:55:51'),
(77, 39, 'Updated a Customer', '2022-12-14 01:01:20'),
(78, 39, 'Updated a Customer', '2022-12-14 01:01:35'),
(79, 39, 'updated a stock', '2022-12-14 01:05:21'),
(80, 39, 'updated a stock', '2022-12-14 01:05:42'),
(81, 39, 'user logged in', '2022-12-14 01:14:39'),
(82, 39, 'updated a stock', '2022-12-14 01:15:07'),
(83, 39, 'updated a stock', '2022-12-14 01:21:42'),
(84, 39, 'user logged in', '2022-12-14 01:30:06'),
(85, 39, 'added a stock', '2022-12-14 01:31:18'),
(86, 39, 'Updated a Sold Stock', '2022-12-14 01:32:04'),
(87, 39, 'user logged in', '2022-12-14 01:47:06'),
(88, 39, 'user logged in', '2022-12-14 01:50:48'),
(89, 39, 'deleted a customer', '2022-12-14 01:54:33'),
(90, 39, 'added a customer', '2022-12-14 01:55:21'),
(91, 39, 'deleted a customer', '2022-12-14 01:55:45'),
(92, 39, 'updated a stock', '2022-12-14 02:01:36'),
(93, 39, 'user logged in', '2022-12-14 02:19:05'),
(94, 39, 'user logged in', '2022-12-14 02:26:42'),
(95, 39, 'Updated a Sold Stock', '2022-12-14 02:33:50'),
(96, 39, 'Updated a Sold Stock', '2022-12-14 02:34:15'),
(97, 39, 'user logged in', '2022-12-14 02:55:03'),
(98, 39, 'Updated a Customer', '2022-12-14 02:55:15'),
(99, 39, 'Updated a Customer', '2022-12-14 02:55:27'),
(100, 39, 'user logged out', '2022-12-14 02:55:57'),
(101, 39, 'Updated a Customer', '2022-12-14 02:56:25'),
(102, 39, 'Updated a Customer', '2022-12-14 02:56:41'),
(103, 39, 'updated a stock', '2022-12-14 02:57:54'),
(104, 0, 'user logged in', '2022-12-14 08:01:28'),
(105, 0, 'updated a stock', '2022-12-14 08:02:38'),
(106, 0, 'updated a stock', '2022-12-14 08:02:54'),
(107, 0, 'Updated a Customer', '2022-12-14 08:31:35'),
(108, 0, 'deleted a customer', '2022-12-14 08:45:53'),
(109, 0, 'Updated a Customer', '2022-12-14 08:46:15'),
(110, 39, 'user logged in', '2022-12-14 09:11:12'),
(111, 39, 'Updated a Customer', '2022-12-14 09:12:10'),
(112, 39, 'added a new user', '2022-12-14 09:15:45'),
(113, 39, 'deleted a user', '2022-12-14 09:15:54'),
(114, 0, 'Updated a Customer', '2022-12-14 09:16:16'),
(115, 0, 'Updated a Customer', '2022-12-14 09:18:09'),
(116, 0, 'Updated a Customer', '2022-12-14 09:19:34'),
(117, 39, 'Updated a Customer', '2022-12-14 09:20:51'),
(118, 39, 'user logged out', '2022-12-14 09:27:00'),
(119, 39, 'user logged in', '2022-12-14 09:28:28'),
(120, 39, 'updated a stock', '2022-12-14 09:30:42'),
(121, 39, 'user logged in', '2022-12-14 03:20:10'),
(122, 39, 'user logged out', '2022-12-14 03:21:21'),
(123, 39, 'user logged in', '2022-12-15 01:27:50'),
(124, 39, 'user logged in', '2022-12-16 12:38:34'),
(125, 39, 'user logged in', '2022-12-16 01:27:56'),
(126, 39, 'user logged out', '2022-12-16 02:18:27'),
(127, 39, 'user logged in', '2022-12-19 10:43:07'),
(128, 39, 'user logged out', '2022-12-19 12:32:51'),
(129, 39, 'user logged in', '2022-12-19 12:35:35'),
(130, 39, 'deleted a customer', '2022-12-19 12:41:01'),
(131, 39, 'added a loan', '2022-12-19 12:43:28'),
(132, 39, 'added a pawn ticket', '2022-12-19 12:44:20'),
(133, 39, 'user logged out', '2022-12-19 12:45:12'),
(134, 0, 'user logged in', '2022-12-19 12:45:42'),
(135, 0, 'user logged out', '2022-12-19 12:47:18'),
(136, 39, 'user logged in', '2022-12-19 12:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `pawnticketsample`
--

CREATE TABLE `pawnticketsample` (
  `pawntixno` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `edit_no` int(11) NOT NULL,
  `amount_paid` int(255) NOT NULL,
  `transactiontype` varchar(50) NOT NULL
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
(56, 1041, '2022-12-03', 400, 'Renewal', 'Active Loan', 400),
(57, 1041, '2022-12-04', 600, 'Renewal', 'Active Loan', 400),
(58, 1041, '2022-12-04', 10400, 'Redeem', 'Active Loan', 400),
(63, 1046, '2022-12-04', 4000, 'Renewal', 'Active Loan', 4000),
(64, 1047, '2022-12-04', 220, 'Renewal', 'Active Loan', 120),
(66, 1050, '2022-12-19', 200, 'Renewal', 'Active Loan', 200);

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
(39, 'Admin', 'mercedhernandez645@gmail.com', 'e319a12d845286f086b2b9af91813c8d', 'What is the name of your favorite pet?', 'adobe', '', '', '', '', 0, ''),
(46, 'Appraiser', 'appraiser@gmail.com', 'f69ca5cb90def43b8efcf4baf61726a3', 'What was the first thing you learned to cook?', 'Adobong manok', '', '', '', '', 0, ''),
(49, 'InventoryClerk', 'inventoryclrk@gmail.com', '1d5ca15d78398a397dc44a1649a7e61e', 'What is the name of your favorite pet?', 'popoy', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `usersample`
--

CREATE TABLE `usersample` (
  `id` int(11) NOT NULL,
  `edit_no` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contactno` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `cpass` varchar(255) NOT NULL
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
  MODIFY `auctionid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customertbl`
--
ALTER TABLE `customertbl`
  MODIFY `customer_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `custsample`
--
ALTER TABLE `custsample`
  MODIFY `custno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventorytbl`
--
ALTER TABLE `inventorytbl`
  MODIFY `stock_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- AUTO_INCREMENT for table `loansample`
--
ALTER TABLE `loansample`
  MODIFY `loanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `loantbl`
--
ALTER TABLE `loantbl`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1051;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `pawnticketsample`
--
ALTER TABLE `pawnticketsample`
  MODIFY `pawntixno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pawntickettbl`
--
ALTER TABLE `pawntickettbl`
  MODIFY `pawnticketno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `stockssample`
--
ALTER TABLE `stockssample`
  MODIFY `stock` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `usersample`
--
ALTER TABLE `usersample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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

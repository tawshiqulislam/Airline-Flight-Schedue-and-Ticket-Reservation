-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 09:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(20) NOT NULL,
  `pwd` varchar(30) DEFAULT NULL,
  `staff_id` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `pwd`, `staff_id`, `name`, `email`) VALUES
('abc', 'passpass', 'sub_admin', 'ewew sds', '12112@hgad.com'),
('admin', 'passpass', 'admin', 'Ariful Islam Saimon', 'tawshiq.rafi02@gmail.com'),
('sub', 'passpass', 'sub_admin', 'ewew sds', '12112@hgad.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(20) NOT NULL,
  `pwd` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `address` varchar(35) DEFAULT NULL,
  `id` int(30) DEFAULT NULL,
  `id_type` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `pwd`, `name`, `email`, `phone_no`, `address`, `id`, `id_type`) VALUES
('admin', 'passpass', 'ssffdfd', '12112@hgad.com', '01839462106', 'Islam Mansion, Navy Hospital Gate, ', 2147483647, 'NID'),
('arif', '12345', 'Ariful Islam', 'arif@gmail.com', '01999653644', 'Islam Mansion, Navy Hospital Gate, ', 1234567890, 'NID'),
('rafi', '123456', 'Tawshiqul Islam', '12112@hgad.com', '01313226193', 'sdsdsd', 7438432, 'PASSPORT');

-- --------------------------------------------------------

--
-- Table structure for table `flight_details`
--

CREATE TABLE `flight_details` (
  `flight_no` varchar(10) NOT NULL,
  `from_city` varchar(20) DEFAULT NULL,
  `to_city` varchar(20) DEFAULT NULL,
  `departure_date` date NOT NULL,
  `arrival_date` date DEFAULT NULL,
  `departure_time` time DEFAULT NULL,
  `arrival_time` time DEFAULT NULL,
  `seats_economy` int(5) DEFAULT NULL,
  `seats_business` int(5) DEFAULT NULL,
  `price_economy` int(10) DEFAULT NULL,
  `price_business` int(10) DEFAULT NULL,
  `jet_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_details`
--

INSERT INTO `flight_details` (`flight_no`, `from_city`, `to_city`, `departure_date`, `arrival_date`, `departure_time`, `arrival_time`, `seats_economy`, `seats_business`, `price_economy`, `price_business`, `jet_id`) VALUES
('1', 'muradpur', 'bohodder hat', '2022-02-03', '2022-02-04', '20:48:00', '17:53:00', 1000, 200, 200, 400, 'US10'),
('101', 'Shantinagar', 'Dhaka', '2022-02-02', '2022-02-18', '03:41:00', '03:41:00', 100, 10, 10000, 1000, 'US101'),
('101', 'l', 'j', '2022-02-04', '2022-02-05', '20:33:00', '20:33:00', 100, -1, 1000, -1, 'BB301'),
('123', 'Dhaka', '	 MUMBAI', '2022-02-04', '2022-01-31', '20:03:00', '23:03:00', 94, 100, 1000, 2000, 'US101'),
('125', 'Chittagong', '	 MUMBAI', '2022-02-02', '2022-01-08', '20:03:00', '23:03:00', 100, 100, 1000, 2000, 'US101'),
('128', 'Chittagong', '	 MUMBAI', '2022-02-02', '2022-01-08', '20:03:00', '23:03:00', 100, 100, 1000, 2000, 'US101'),
('129', 'Chittagong', '	 MUMBAI', '2022-01-26', '2022-01-08', '20:03:00', '23:03:00', 100, 100, 1000, 2000, 'US101'),
('130', 'Chittagong', '	 MUMBAI', '2022-01-26', '2022-01-08', '20:03:00', '23:03:00', 100, 100, 1000, 2000, 'US101'),
('131', 'Chittagong', '	 MUMBAI', '2022-01-26', '2022-01-08', '20:03:00', '23:03:00', 100, 100, 1000, 2000, 'US101'),
('132', 'Chittagong', '	 MUMBAI', '2022-01-26', '2022-01-08', '20:03:00', '23:03:00', 100, 100, 1000, 2000, 'US101'),
('133', 'Dhaka', '	 MUMBAI', '2022-02-05', '2022-01-08', '20:03:00', '23:03:00', 100, 100, 1000, 2000, 'US101'),
('134', 'Chittagong', '	 MUMBAI', '2022-01-29', '2022-01-08', '20:03:00', '23:03:00', 100, 100, 1000, 2000, 'US101'),
('135', 'Chittagong', '	 MUMBAI', '2022-01-26', '2022-01-08', '20:03:00', '23:03:00', 100, 100, 1000, 2000, 'US101'),
('136', 'Chittagong', '	 MUMBAI', '2022-01-26', '2022-01-08', '20:03:00', '23:03:00', 100, 100, 1000, 2000, 'US101'),
('136', 'Chittagong', '	 MUMBAI', '2022-01-29', '2022-01-08', '20:03:00', '23:03:00', 100, 100, 1000, 2000, 'US101'),
('2', 'muradpur', 'bohodder hat', '2022-02-03', '2022-02-03', '20:33:00', '22:30:00', 1198, 200, 1200, 122, 'US10'),
('40', 'Chittagong', 'America', '2022-02-01', '2022-01-27', '18:10:00', '21:06:00', 100, 100, 1000, 2000, 'ar420'),
('40', 'Chittagong', 'America', '2022-02-02', '2022-01-07', '18:07:00', '19:07:00', 12, 0, 120, 220, 'US101'),
('420', 'Chittagong', 'Dhaka', '2022-02-01', '2022-01-05', '21:36:00', '21:37:00', 500, 0, 5000, 5000000, 'ar420');

-- --------------------------------------------------------

--
-- Table structure for table `frequent_flier_details`
--

CREATE TABLE `frequent_flier_details` (
  `frequent_flier_no` varchar(20) NOT NULL,
  `customer_id` varchar(20) DEFAULT NULL,
  `mileage` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frequent_flier_details`
--

INSERT INTO `frequent_flier_details` (`frequent_flier_no`, `customer_id`, `mileage`) VALUES
('12345', 'Rafi', 375);

-- --------------------------------------------------------

--
-- Table structure for table `jet_details`
--

CREATE TABLE `jet_details` (
  `jet_id` varchar(10) NOT NULL,
  `jet_type` varchar(20) DEFAULT NULL,
  `total_capacity` int(5) DEFAULT NULL,
  `active` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jet_details`
--

INSERT INTO `jet_details` (`jet_id`, `jet_type`, `total_capacity`, `active`) VALUES
('ABC', 'BB', 5, 'Yes'),
('ar420', 'ar', 420, 'No'),
('AX303', 'BB', 220, 'Yes'),
('BB301', 'BB', 350, 'Yes'),
('US10', 'del', 1200, 'Yes'),
('US101', 'US Bangla', 200, 'Yes'),
('US102', 'US Bangla', 100, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `passenger_id` int(10) NOT NULL,
  `pnr` varchar(15) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` varchar(8) DEFAULT NULL,
  `meal_choice` varchar(5) DEFAULT NULL,
  `frequent_flier_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`passenger_id`, `pnr`, `name`, `age`, `gender`, `meal_choice`, `frequent_flier_no`) VALUES
(1, '1294585', 'Rafi', 21, 'male', 'yes', NULL),
(1, '1535299', 'Rafi', 23, 'male', 'yes', '12345'),
(1, '1602366', 'ww', 12, 'male', 'yes', NULL),
(1, '1831659', 'shuvo', 44, 'male', 'yes', NULL),
(1, '2492616', 'a', 12, 'male', 'yes', NULL),
(1, '2737252', 'shuvo', 12, 'male', 'yes', NULL),
(1, '2990137', 'Rafi', 12, 'male', 'yes', NULL),
(1, '3554147', 'pooja', 30, 'male', 'yes', NULL),
(1, '3918859', 'aa', 34, 'male', 'yes', NULL),
(1, '4150314', 'sds', 22, 'male', 'yes', NULL),
(1, '5228792', 'Rafi', 12, 'male', 'yes', NULL),
(1, '5516659', 'shuvo', 25, 'male', 'yes', NULL),
(1, '5563086', 'arif', 23, 'male', 'yes', NULL),
(1, '5969932', 'Rafi', 12, 'male', 'yes', NULL),
(1, '6041227', 'Rafi', 34, 'male', 'yes', NULL),
(1, '6078884', 'pooja', 12, 'female', 'yes', NULL),
(1, '6928224', 'Rafi', 23, 'male', 'yes', NULL),
(1, '7010094', 'Rafi', 26, 'male', 'yes', '12345'),
(1, '7680526', 'ww', 26, 'male', 'yes', NULL),
(1, '7682670', 'akib', 32, 'male', 'yes', NULL),
(1, '8495178', 'Rafi', 12, 'male', 'yes', NULL),
(1, '8916950', 'tmi ', 23, 'male', 'yes', NULL),
(1, '8987190', 'Rafi', 12, 'male', 'yes', NULL),
(1, '9545187', 'tmi', 12, 'male', 'yes', NULL),
(2, '1602366', 'Arif', 59, 'male', 'yes', NULL),
(2, '5563086', 'rafi', 22, 'male', 'yes', NULL),
(2, '6078884', 'arif', 15, 'male', 'no', NULL),
(2, '6928224', 'Arif', 21, 'male', 'yes', NULL),
(2, '7680526', 'Arif', 24, 'male', 'yes', NULL),
(2, '7682670', 'era', 43, 'male', 'yes', NULL),
(2, '8916950', 'ami', 18, 'male', 'yes', NULL),
(2, '9545187', 'ami', 15, 'male', 'yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_id` varchar(20) NOT NULL,
  `pnr` varchar(15) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_amount` int(6) DEFAULT NULL,
  `payment_mode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `pnr`, `payment_date`, `payment_amount`, `payment_mode`) VALUES
('103458624', '2492616', '2022-01-05', 20850, 'credit card'),
('123014361', '1602366', '2022-01-03', 7300, 'net banking'),
('126738076', '3554147', '2022-01-03', 3650, 'credit card'),
('142467432', '7682670', '2022-01-05', 2140, 'credit card'),
('152624046', '5516659', '2022-01-03', 3650, 'credit card'),
('154879218', '5563086', '2022-01-05', 21700, 'credit card'),
('164222419', '7333502', '2021-12-03', 3650, 'credit card'),
('209344271', '2990137', '2022-02-02', 2050, 'credit card'),
('234509624', '4150314', '2022-02-02', 1850, 'credit card'),
('252084551', '8987190', '2022-02-02', 1850, 'credit card'),
('311384000', '9545187', '2022-02-02', 2100, 'debit card'),
('504603717', '2737252', '2022-01-28', 10850, 'credit card'),
('614317523', '1831659', '2022-02-02', 1850, 'credit card'),
('645539317', '2737252', '2022-01-28', 10850, 'credit card'),
('649379898', '6041227', '2022-02-02', 2050, 'credit card'),
('680233271', '7333502', '2021-12-03', 3650, 'credit card'),
('753467627', '2737252', '2022-01-28', 10850, 'credit card'),
('763816827', '6928224', '2022-02-02', 3700, 'credit card'),
('772723609', '8495178', '2022-01-12', 3650, 'credit card'),
('797378583', '7010094', '2021-12-03', 4700, 'debit card'),
('812940501', '8987190', '2022-02-02', 1850, 'credit card'),
('822255371', '1535299', '2021-12-02', 2350, 'credit card'),
('881826567', '5228792', '2022-01-29', 10850, 'credit card'),
('937709734', '6078884', '2022-01-03', 10001450, 'credit card'),
('974180592', '5969932', '2021-12-21', 2050, 'credit card');

--
-- Triggers `payment_details`
--
DELIMITER $$
CREATE TRIGGER `update_ticket_after_payment` AFTER INSERT ON `payment_details` FOR EACH ROW UPDATE ticket_details
     SET booking_status='CONFIRMED', payment_id= NEW.payment_id
   WHERE pnr = NEW.pnr
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_details`
--

CREATE TABLE `ticket_details` (
  `pnr` varchar(15) NOT NULL,
  `date_of_reservation` date DEFAULT NULL,
  `flight_no` varchar(10) DEFAULT NULL,
  `journey_date` date DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `booking_status` varchar(20) DEFAULT NULL,
  `no_of_passengers` int(5) DEFAULT NULL,
  `lounge_access` varchar(5) DEFAULT NULL,
  `priority_checkin` varchar(5) DEFAULT NULL,
  `insurance` varchar(5) DEFAULT NULL,
  `payment_id` varchar(20) DEFAULT NULL,
  `customer_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_details`
--

INSERT INTO `ticket_details` (`pnr`, `date_of_reservation`, `flight_no`, `journey_date`, `class`, `booking_status`, `no_of_passengers`, `lounge_access`, `priority_checkin`, `insurance`, `payment_id`, `customer_id`) VALUES
('1294585', '2022-02-11', NULL, NULL, 'economy', 'PENDING', 1, 'yes', 'yes', 'yes', NULL, NULL),
('1535299', '2022-02-11', NULL, NULL, 'economy', 'CONFIRMED', 1, 'yes', 'yes', 'yes', '822255371', 'rafi'),
('1602366', '2022-01-03', NULL, NULL, 'business', 'CANCELED', 2, 'yes', 'yes', 'yes', '123014361', 'arif'),
('1831659', '2022-02-02', '123', '2022-02-04', 'economy', 'CONFIRMED', 1, 'yes', 'yes', 'yes', '614317523', NULL),
('2492616', '2022-01-05', NULL, NULL, 'business', 'CONFIRMED', 1, 'yes', 'yes', 'yes', '103458624', 'arif'),
('2737252', '2022-01-28', NULL, NULL, 'economy', 'CONFIRMED', 1, 'yes', 'yes', 'yes', '504603717', NULL),
('2990137', '2022-02-02', '2', '2022-02-03', 'economy', 'CONFIRMED', 1, 'yes', 'yes', 'yes', '209344271', 'rafi'),
('3554147', '2022-01-03', NULL, NULL, 'business', 'CANCELED', 1, 'yes', 'yes', 'yes', '126738076', 'arif'),
('3918859', '2022-01-05', NULL, '2022-01-06', 'business', 'PENDING', 1, 'yes', 'yes', 'yes', NULL, 'arif'),
('4150314', '2022-02-02', '123', '2022-02-04', 'economy', 'CONFIRMED', 1, 'yes', 'yes', 'yes', '234509624', NULL),
('5228792', '2022-01-29', NULL, NULL, 'economy', 'CANCELED', 1, 'yes', 'yes', 'yes', '881826567', 'rafi'),
('5516659', '2022-01-03', NULL, NULL, 'business', 'CANCELED', 1, 'yes', 'yes', 'yes', '152624046', 'arif'),
('5563086', '2022-01-05', NULL, NULL, 'economy', 'CONFIRMED', 2, 'yes', 'yes', 'yes', '154879218', 'arif'),
('5969932', '2021-12-21', NULL, NULL, 'economy', 'CONFIRMED', 1, 'yes', 'yes', 'yes', '974180592', 'rafi'),
('6041227', '2022-02-02', '2', '2022-02-03', 'economy', 'CONFIRMED', 1, 'yes', 'yes', 'yes', '649379898', 'arif'),
('6078884', '2022-01-03', '420', '2022-02-01', 'business', 'CONFIRMED', 2, 'yes', 'yes', 'yes', '937709734', 'arif'),
('6928224', '2022-02-02', '123', '2022-02-04', 'economy', 'CONFIRMED', 2, 'yes', 'yes', 'yes', '763816827', NULL),
('7010094', '2021-12-03', NULL, NULL, 'economy', 'CONFIRMED', 2, 'yes', 'yes', 'yes', '797378583', 'arif'),
('7333502', '2021-12-03', NULL, NULL, 'business', 'CANCELED', 1, 'yes', 'yes', 'yes', '680233271', 'arif'),
('7680526', '2021-12-03', NULL, NULL, 'economy', 'PENDING', 2, 'yes', 'yes', 'yes', NULL, 'arif'),
('7682670', '2022-01-05', '40', '2022-02-02', 'business', 'CONFIRMED', 2, 'yes', 'yes', 'yes', '142467432', 'arif'),
('8495178', '2022-01-12', NULL, NULL, 'business', 'CONFIRMED', 1, 'yes', 'yes', 'yes', '772723609', 'rafi'),
('8916950', '2022-02-02', '1', '2022-02-03', 'economy', 'PENDING', 2, 'yes', 'yes', 'yes', NULL, 'arif'),
('8987190', '2022-02-02', '123', '2022-02-04', 'economy', 'CONFIRMED', 1, 'yes', 'yes', 'yes', '252084551', 'arif'),
('9545187', '2022-02-02', '1', '2022-02-03', 'economy', 'CANCELED', 2, 'yes', 'yes', 'yes', '311384000', 'arif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `flight_details`
--
ALTER TABLE `flight_details`
  ADD PRIMARY KEY (`flight_no`,`departure_date`),
  ADD KEY `jet_id` (`jet_id`);

--
-- Indexes for table `frequent_flier_details`
--
ALTER TABLE `frequent_flier_details`
  ADD PRIMARY KEY (`frequent_flier_no`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `jet_details`
--
ALTER TABLE `jet_details`
  ADD PRIMARY KEY (`jet_id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`passenger_id`,`pnr`),
  ADD KEY `pnr` (`pnr`),
  ADD KEY `frequent_flier_no` (`frequent_flier_no`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `pnr` (`pnr`);

--
-- Indexes for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD PRIMARY KEY (`pnr`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `journey_date` (`journey_date`),
  ADD KEY `flight_no` (`flight_no`),
  ADD KEY `flight_no_2` (`flight_no`,`journey_date`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flight_details`
--
ALTER TABLE `flight_details`
  ADD CONSTRAINT `flight_details_ibfk_1` FOREIGN KEY (`jet_id`) REFERENCES `jet_details` (`jet_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `frequent_flier_details`
--
ALTER TABLE `frequent_flier_details`
  ADD CONSTRAINT `frequent_flier_details_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`pnr`) REFERENCES `ticket_details` (`pnr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `passengers_ibfk_2` FOREIGN KEY (`frequent_flier_no`) REFERENCES `frequent_flier_details` (`frequent_flier_no`) ON UPDATE CASCADE;

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`pnr`) REFERENCES `ticket_details` (`pnr`) ON UPDATE CASCADE;

--
-- Constraints for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD CONSTRAINT `ticket_details_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_details_ibfk_3` FOREIGN KEY (`flight_no`,`journey_date`) REFERENCES `flight_details` (`flight_no`, `departure_date`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

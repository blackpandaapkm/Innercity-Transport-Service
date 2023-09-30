-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 12:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `halumdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` varchar(20) DEFAULT NULL,
  `ad_name` varchar(20) DEFAULT NULL,
  `ad_mobile_no` varchar(20) DEFAULT NULL,
  `ad_mail` varchar(20) DEFAULT NULL,
  `ad_address` varchar(20) DEFAULT NULL,
  `ad_password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_mobile_no`, `ad_mail`, `ad_address`, `ad_password`) VALUES
('ADMIN0001', 'HALUM', '123456', 'halum@gmail.com', 'DHAKA', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` varchar(20) DEFAULT NULL,
  `bus_name` varchar(20) DEFAULT NULL,
  `sv_id` varchar(20) DEFAULT NULL,
  `dv_id` varchar(20) DEFAULT NULL,
  `bus_reg_no` varchar(20) DEFAULT NULL,
  `total_sit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_name`, `sv_id`, `dv_id`, `bus_reg_no`, `total_sit`) VALUES
('BBB001', 'HANIF', 'SV00011', 'DV00011', '00001', 40),
('BBB002', 'HANIF', 'SV00012', 'DV00012', '000123', 40),
('BBB003', 'RAJDHANI', 'SV00013', 'DV00013', '123456', 40),
('BBB004', 'SONALI', 'SV00014', 'DV00014', '789654', 40),
('BBB005', 'RUPSHA', 'SV00015', 'DV00015', '456321', 40);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `dv_id` varchar(20) DEFAULT NULL,
  `dv_name` varchar(20) DEFAULT NULL,
  `dv_mobile_no` varchar(20) DEFAULT NULL,
  `dv_reg` varchar(20) DEFAULT NULL,
  `dv_address` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`dv_id`, `dv_name`, `dv_mobile_no`, `dv_reg`, `dv_address`) VALUES
('DV00011', 'DV A111', '123456', 'DV123456', 'DHAKA'),
('DV00012', 'DV A112', '123457', 'DV123457', 'DHAKA'),
('DV00013', 'DV A113', '123458', 'DV123458', 'DHAKA'),
('DV00014', 'DV A114', '123459', 'DV123459', 'DHAKA'),
('DV00015', 'DV A115', '123460', 'DV123460', 'DHAKA');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `ps_id` varchar(25) DEFAULT NULL,
  `ps_name` varchar(25) DEFAULT NULL,
  `ps_mobile_no` varchar(25) DEFAULT NULL,
  `ps_mail` varchar(25) DEFAULT NULL,
  `ps_address` varchar(25) DEFAULT NULL,
  `ps_gender` varchar(25) DEFAULT NULL,
  `ps_password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`ps_id`, `ps_name`, `ps_mobile_no`, `ps_mail`, `ps_address`, `ps_gender`, `ps_password`) VALUES
('8174', 'ANUPAM KUMAR', '01736181068', 'a@gmail.com', 'DHAKA', 'MALE', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `rt_id` varchar(20) DEFAULT NULL,
  `from_` varchar(20) DEFAULT NULL,
  `to_` varchar(20) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  `bus_id` varchar(20) DEFAULT NULL,
  `time_` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`rt_id`, `from_`, `to_`, `distance`, `bus_id`, `time_`) VALUES
('RT001', 'MIRPUR1', 'MIRPUR2', 10, 'BBB001', '00:00'),
('RT002', 'MIRPUR2', 'MIRPUR3', 11, 'BBB001', '00:15'),
('RT003', 'MIRPUR3', 'MIRPUR4', 12, 'BBB001', '00:30'),
('RT004', 'MIRPUR4', 'MIRPUR1', 9, 'BBB001', '00:45'),
('RT005', 'MIRPUR1', 'MIRPUR4', 9, 'BBB002', '00:00'),
('RT006', 'MIRPUR4', 'MIRPUR3', 12, 'BBB002', '00:15'),
('RT007', 'MIRPUR3', 'MIRPUR2', 11, 'BBB002', '00:30'),
('RT008', 'MIRPUR2', 'MIRPUR1', 10, 'BBB002', '00:45'),
('RT009', 'MIRPUR1', 'MIRPUR3', 21, 'BBB001', '00:00'),
('RT010', 'MIRPUR1', 'MIRPUR3', 21, 'BBB002', '00:00');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `sv_id` varchar(20) DEFAULT NULL,
  `sv_name` varchar(20) DEFAULT NULL,
  `sv_mobile_no` varchar(20) DEFAULT NULL,
  `sv_mail` varchar(20) DEFAULT NULL,
  `sv_address` varchar(20) DEFAULT NULL,
  `sv_password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`sv_id`, `sv_name`, `sv_mobile_no`, `sv_mail`, `sv_address`, `sv_password`) VALUES
('SV00011', 'SVA111', '1234567', 'SV00011@gmail.com', 'DHAKA', '112231'),
('SV00012', 'SVA112', '1234577', 'SV00012@gmail.com', 'DHAKA', '112232'),
('SV00013', 'SVA113', '1234587', 'SV00013@gmail.com', 'DHAKA', '112233'),
('SV00014', 'SVA114', '1234597', 'SV00014@gmail.com', 'DHAKA', '112234'),
('SV00015', 'SVA115', '1234507', 'SV00015@gmail.com', 'DHAKA', '112235');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` varchar(20) DEFAULT NULL,
  `from_` varchar(20) DEFAULT NULL,
  `to_` varchar(20) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  `bus_id` varchar(20) DEFAULT NULL,
  `time_` varchar(20) DEFAULT NULL,
  `date_` varchar(10) NOT NULL,
  `rt_id` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sit_no` varchar(20) DEFAULT NULL,
  `passenger_id` varchar(20) DEFAULT NULL,
  `passenger_name` varchar(20) DEFAULT NULL,
  `sv_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `from_`, `to_`, `distance`, `bus_id`, `time_`, `date_`, `rt_id`, `price`, `sit_no`, `passenger_id`, `passenger_name`, `sv_id`) VALUES
('2618', 'MIRPUR1', 'MIRPUR2', 10, 'BBB001', '00:00', '2022-11-30', 'RT001', 50, '19', '8174', 'ANUPAM KUMAR', 'SV00011'),
('0137', 'MIRPUR2', 'MIRPUR3', 11, 'BBB001', '00:15', '2022-11-30', 'RT002', 55, '18', '8174', 'ANUPAM KUMAR', 'SV00011'),
('06099', 'MIRPUR2', 'MIRPUR1', 10, 'BBB002', '00:45', '2022-11-30', 'RT008', 50, '10', '8174', 'ANUPAM KUMAR', 'SV00012'),
('84238', 'MIRPUR2', 'MIRPUR3', 11, 'BBB001', '00:15', '2022-11-30', 'RT002', 55, '24', '8174', 'ANUPAM KUMAR', 'SV00011'),
('62392', 'MIRPUR2', 'MIRPUR3', 11, 'BBB001', '00:15', '2022-11-30', 'RT002', 55, '29', '8174', 'ANUPAM KUMAR', 'SV00011');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_sit`
--

CREATE TABLE `ticket_sit` (
  `ticket_id` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `sv_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_sit`
--

INSERT INTO `ticket_sit` (`ticket_id`, `status`, `sv_id`) VALUES
('7237394', 'CHECKED', '002'),
('7237394', 'CHECKED', '002'),
('2618', 'CHECKED', 'SV00011');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 11:36 AM
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
-- Database: `cvbsdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `phoneNumber` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phoneNumber`) VALUES
(1, 'admin', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609 ', '011-123456789');

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `clinic_id` int(120) NOT NULL,
  `clinic_name` varchar(120) NOT NULL,
  `contact` varchar(120) NOT NULL,
  `clinic_address` varchar(120) NOT NULL,
  `state` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`clinic_id`, `clinic_name`, `contact`, `clinic_address`, `state`) VALUES
(1, 'Klinik Dr Ko', '07-3335555', '165, Jalan Harimau, Taman Century, 80250 Johor Bahru, Johor', 'Johor'),
(2, 'Klinik Fatimah', '07-2072707', '113, Jalan Trus, Bandar Johor Bahru, 80000 Johor Bahru, Johor', 'Johor'),
(3, 'Klinik Sada', '04-2619313', '13, Wisma Kumaran - Susheela, Lebuh Penang, George Town, 10200 George Town, Pulau Pinang', 'Pulau Pinang'),
(4, 'Twin Towers Medical Centre', '03-2382 3577', 'KLCC, Lot LC-402-404, Level 4, Suria, Kuala Lumpur City Centre, 50088 Kuala Lumpur', 'Kuala Lumpur'),
(5, 'Klinik Melaka Jaya', '06-283 3703', '36, Jalan Melaka Raya 14, Taman Melaka Raya, 75000 Melaka', 'Melaka');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phoneNumber` varchar(120) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `issues` varchar(120) NOT NULL,
  `description` varchar(120) NOT NULL,
  `status` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `phoneNumber`, `date`, `issues`, `description`, `status`) VALUES
(1, 'Ali', 'ali@gmail.com', '011-9876543', '2022-07-02 14:27:06', 'Unable to Log In', 'My email is ali@hcsd.com, I was uanble to log in the system, please solve it as fast as possible.', 'pending'),
(2, 'Syafiqah', 'syafiqah@gmail.com', '013-6666543', '2022-07-02 14:27:23', 'Online Web Store Problem', 'I cannot add the item into cart.', NULL),
(3, 'Kelly', 'kelly@gmail.com', '013-6889765', '2022-07-02 14:27:46', 'Cannot booking vaccine', 'Unable to submit the vaccination form', 'pending'),
(4, 'Aisah', 'aisah@gmail.com', '018-7765432', '2022-06-28 05:41:01', 'Online appointment problem', 'I cannot book appointment', 'solve'),
(5, 'Aiman', 'aiman@gmail.com', '017-7162431', '2022-06-29 13:53:27', 'Unable to reset password', 'I cannot reset pasword', NULL),
(6, 'Aisah', 'aisah@gmail.com', '0187765432', '2022-07-05 15:30:22', 'Another problem from the list', 'I does not know how to register', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotspot`
--

CREATE TABLE `hotspot` (
  `state` varchar(120) NOT NULL,
  `date` varchar(120) NOT NULL,
  `totalCase` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotspot`
--

INSERT INTO `hotspot` (`state`, `date`, `totalCase`) VALUES
('Labuan', '2022-06-24', '11'),
('Putrajaya', '2022-06-24', '11'),
('Selangor', '2022-06-24', '9'),
('Kuala Lumpur', '2022-06-24', '9'),
('Negeri Sembilan', '2022-06-24', '8'),
('Pulau Pinang', '2022-06-24', '7'),
('Kedah', '2022-06-24', '6'),
('Melaka', '2022-06-24', '5'),
('Pahang', '2022-06-24', '5'),
('Kelantan', '2022-06-24', '4'),
('Perlis', '2022-06-24', '4'),
('Johor', '2022-06-24', '4'),
('Sabah', '2022-06-24', '4'),
('Terengganu', '2022-06-24', '4'),
('Perak', '2022-06-24', '3'),
('Sarawak', '2022-06-24', '2');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(120) NOT NULL,
  `state` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state`) VALUES
(1, 'Johor'),
(2, 'Melaka'),
(3, 'Putrajaya'),
(4, 'Kuala Lumpur'),
(5, 'Selangor'),
(6, 'Negeri Sembilan'),
(7, 'Perak'),
(8, 'Pulau Pinang'),
(9, 'Perlis'),
(10, 'Pahang'),
(11, 'Terengganu'),
(12, 'Kedah'),
(13, 'Kelantan'),
(14, 'Labuan'),
(15, 'Sabah'),
(16, 'Sarawak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `icNumber` varchar(120) NOT NULL,
  `gender` varchar(120) NOT NULL,
  `phoneNumber` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `icNumber`, `gender`, `phoneNumber`, `email`, `address`, `password`) VALUES
(1, 'James', '971009-04-5233', 'Male', '019-6334456', 'james@gmail.com', 'No 1, Jalan Mangga 2, Taman Pokok, Melaka', '7cd2fc39f1b866d314bd17348e554ec2'),
(2, 'Ali', '850715-05-0023', 'Male', '016-5678123', 'ali@gmail.com', 'No 20, Jalan Durian, Taman Durian, 53000 Kuala Lumpur', '85a5ec72b32d4e61a2fc1bd45f6de144'),
(3, 'Rachel', '901103-07-0023', 'Female', '014-3359907', 'rachel@gmail.com', 'No 69, Jalan Kembangan 5, Taman Kembang, 10300 Pulau Pinang', 'c1bfde18d17cedd97203b25ab2f454bf');

-- --------------------------------------------------------

--
-- Table structure for table `vaccinationappointment`
--

CREATE TABLE `vaccinationappointment` (
  `id` int(120) NOT NULL,
  `userid` int(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `phoneNumber` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `state` varchar(120) NOT NULL,
  `clinic` varchar(120) DEFAULT NULL,
  `num_dose` int(120) NOT NULL,
  `appointmentDate` varchar(120) DEFAULT NULL,
  `appointmentTime` varchar(120) DEFAULT NULL,
  `applyDate` varchar(120) DEFAULT current_timestamp(),
  `status` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccinationappointment`
--

INSERT INTO `vaccinationappointment` (`id`, `userid`, `name`, `phoneNumber`, `email`, `address`, `state`, `clinic`, `num_dose`, `appointmentDate`, `appointmentTime`, `applyDate`, `status`) VALUES
(1, 2, 'Ali', '011-2236754', 'ali@gmail.com', 'No 20, Jalan Durian, Taman Durian, 53000 Kuala Lumpur', 'Kuala Lumpur', 'Twin Towers Medical Centre', 1, '2022-03-02', '10:30', '2022-01-26 11:20:23', 'Done'),
(2, 2, 'Ali', '011-2236754', 'ali@gmail.com', 'No 20, Jalan Durian, Taman Durian, 53000 Kuala Lumpur', 'Kuala Lumpur', 'Twin Towers Medical Centre', 2, '2022-06-30', '12:30', '2022-06-24 13:15:13', 'Approved'),
(3, 3, 'Rachel', '014-3359907', 'rachel@gmail.com', 'No 69, Jalan Kembangan 5, Taman Kembang, 10300 Pulau Pinang', 'Pulau Pinang', 'Klinik Sada', 1, '2021-11-15', '12:45', '2021-10-29 15:36:45', 'Done'),
(4, 3, 'Rachel', '014-3359907', 'rachel@gmail.com', 'No 69, Jalan Kembangan 5, Taman Kembang, 10300 Pulau Pinang', 'Pulau Pinang', 'Klinik Sada', 2, '2022-02-25', '12:45', '2022-02-10 14:30:39', 'Done'),
(5, 3, 'Rachel', '014-3359907', 'rachel@gmail.com', 'No 69, Jalan Kembangan 5, Taman Kembang, 10300 Pulau Pinang', 'Pulau Pinang', 'Klinik Sada', 3, '2022-06-29', '14:25', '2022-06-24 13:15:13', 'Rejected');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`clinic_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccinationappointment`
--
ALTER TABLE `vaccinationappointment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `clinic_id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vaccinationappointment`
--
ALTER TABLE `vaccinationappointment`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

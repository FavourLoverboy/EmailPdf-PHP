-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2022 at 12:33 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emailpdf`
--

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `par_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `p_number` varchar(11) NOT NULL,
  `occ` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `par_id`, `name`, `email`, `p_number`, `occ`, `address`, `pic`, `date`, `status`) VALUES
(1, '1646307121', 'Kelly John', 'Kelly@gmail.com', '010215486', 'Business person', '#14b okania street, Rumuokwuta, Port-Harcourt', 'img0.jpg', '2022-03-03', 'Active'),
(2, '1646503140', 'Chinedu Chike', 'chike@gmail.com', '09097048450', 'Employee', '#14b okania street, Rumuokwuta, Port-Harcourt', 'img9.jpg', '2022-03-05', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` varchar(2) NOT NULL,
  `class` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `lga` varchar(20) NOT NULL,
  `soo` varchar(20) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `par_id` varchar(10) NOT NULL,
  `stu_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `sex`, `age`, `class`, `address`, `lga`, `soo`, `pic`, `par_id`, `stu_id`, `date`, `status`) VALUES
(1, 'Wami', 'Male', '23', 'Class 1', '#14b okania street, Rumuokwuta, Port-Harcourt', 'Phaga', 'Akwa Ibom', 'img1.jpg', '1646307121', '1646307103', '2022-03-03', 'Active'),
(2, 'Testimony Jeniffer', 'Female', '21', 'Class 1', '#14b okania street, Rumuokwuta, Port-Harcourt', 'Ikwerre', 'Rivers', 'img7.jpg', '1646503140', '1646503100', '2022-03-05', 'Active'),
(3, 'Favour Nwokamma', 'Male', '23', 'Class 2', '#14b okania street, Rumuokwuta, Port-Harcourt', 'Obio Akpor', 'Akwa Ibom', 'img9.jpg', '1646503140', '1646503643', '2022-03-05', 'Active'),
(4, 'Awo John', 'Male', '25', 'Class 2', '#14b okania street, Rumuokwuta, Port-Harcourt', 'Obio Akpor', 'Cross River', 'img1.jpg', '1646307121', '1646505921', '2022-03-05', 'Active'),
(5, 'Bright Nnamdi Chike', 'Male', '25', 'Class 3', '#14b okania street, Rumuokwuta, Port-Harcourt', 'Ikwerre', 'Akwa Ibom', 'img7.jpg', '1646307121', '1646506103', '2022-03-05', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `stu_id` varchar(10) NOT NULL,
  `subject` varchar(15) NOT NULL,
  `test` varchar(2) NOT NULL,
  `ca` varchar(2) NOT NULL,
  `exam` varchar(2) NOT NULL,
  `total` varchar(3) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `stu_id`, `subject`, `test`, `ca`, `exam`, `total`, `grade`, `date`) VALUES
(1, '1646307103', 'English', '20', '14', '60', '94', 'A', '2022-03-03'),
(2, '1646307103', 'Mathematics', '20', '15', '30', '65', 'D', '2022-03-03'),
(3, '1646503100', 'English', '18', '20', '40', '78', 'C', '2022-03-05'),
(4, '1646503100', 'Mathematics', '18', '20', '49', '87', 'B', '2022-03-05'),
(5, '1646503643', 'English', '11', '11', '60', '82', 'B', '2022-03-05'),
(6, '1646503643', 'Mathematics', '12', '12', '59', '83', 'B', '2022-03-05'),
(7, '1646503643', 'Economics', '13', '13', '59', '85', 'B', '2022-03-05'),
(8, '1646503643', 'Civic Education', '14', '14', '55', '83', 'B', '2022-03-05'),
(9, '1646505921', 'English', '', '20', '40', '60', 'D', '2022-03-05'),
(10, '1646505921', 'Mathematics', '', '20', '35', '55', 'E', '2022-03-05'),
(11, '1646505921', 'Economics', '', '20', '49', '69', 'D', '2022-03-05'),
(12, '1646505921', 'Civic Education', '', '20', '53', '73', 'C', '2022-03-05'),
(13, '1646506103', 'English', '20', '15', '50', '85', 'B', '2022-03-05'),
(14, '1646506103', 'Mathematics', '17', '13', '51', '81', 'B', '2022-03-05'),
(15, '1646506103', 'Economics', '18', '17', '33', '68', 'D', '2022-03-05'),
(16, '1646506103', 'Civic Education', '19', '18', '55', '92', 'A', '2022-03-05'),
(17, '1646506103', 'Agriculture', '15', '15', '55', '85', 'B', '2022-03-05'),
(18, '1646506103', 'Biology', '16', '16', '59', '91', 'A', '2022-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `position` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `position`, `date`, `status`) VALUES
(1, 'pdf', 'pdf', 'Admin', '2021-11-27', 'Active'),
(2, 'favour', 'favour', 'User', '2021-11-26', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

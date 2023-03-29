-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 11:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `user_type` varchar(255) DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `password`, `latitude`, `longitude`, `user_type`) VALUES
(38, 'vicky123', 'vicky2310', 'vidl12345', '11.100219', '79.724628', 'normal'),
(50, 'admin', 'admin', 'admin', '11.1015171', '79.7331581', 'admin'),
(52, 'vicky', 'vicky', 'vikd', '13.02828', '77.59360', 'admin'),
(79, 'nvickyci5', 'uvickyci5', 'pvickyci5', '11.1063', '79.655', 'normal'),
(80, 'n_demo1', 'u_demo2', 'p_demo3', '10.9706', '79.3853', 'normal'),
(82, 'sample', 'saample', 'sasaample', '10.9706', '79.3853', 'normal'),
(84, 'gps_name', 'gps_user', 'gps_pass', '11.1015147', '79.7331588', 'normal'),
(97, 'vicky', 'vicky', 'vicky', '10.9706', '79.3853', 'normal'),
(98, 'demo1', 'demo2', 'demo3', '10.9706', '79.3853', 'normal'),
(99, 'demo_n', 'demo_u', 'demo_p', '10.9706', '79.3853', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

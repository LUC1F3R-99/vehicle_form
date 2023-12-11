-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 09:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `rental_data`
--

CREATE TABLE `rental_data` (
  `id` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `driven_distance` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `display_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental_data`
--

INSERT INTO `rental_data` (`id`, `vehicle_type`, `car_type`, `driven_distance`, `days`, `display_price`) VALUES
(1, 'SUVs', 'Luxury SUVs', 1, 1, 2000),
(2, 'Motorcycles', 'Compact Motorcycles', 2, 2, 4000),
(3, 'Motorcycles', 'Compact Motorcycles', 2, 2, 4000),
(4, 'Vans', 'Compact Vans', 1, 2, 4000),
(5, 'Motorcycles', 'Compact Motorcycles', 3, 3, 6000),
(6, 'Motorcycles', 'Compact Motorcycles', 4, 4, 8000),
(7, 'Vans', 'Cargo Vans', 1, 1, 2000),
(8, 'Vans', 'Cargo Vans', 1, 1, 2000),
(9, 'Motorcycles', 'Compact Motorcycles', 3, 3, 6000),
(10, 'Motorcycles', 'Compact Motorcycles', 1, 1, 2000),
(11, 'Vans', 'Compact Vans', 1, 1, 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rental_data`
--
ALTER TABLE `rental_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rental_data`
--
ALTER TABLE `rental_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 05:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('tushar', 'tushar123');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `select_car` varchar(10) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `start_destination` varchar(50) NOT NULL,
  `end_destination` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `pincode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`select_car`, `full_name`, `start_destination`, `end_destination`, `address`, `date`, `phone_no`, `pincode`) VALUES
('Bolero', 'anurag thorat', 'nashik', 'mumbai', 'college road, nashik', '2024-02-05', '2589631470', 589746),
('Ertiga', 'tushar pawar', 'kalwan', 'nashik', 'manur,kalwan', '2024-02-01', '8275581955', 423501),
('Luxury Bus', 'shruti', 'odha', 'nashik', 'odha', '2024-02-04', '1478523690', 32145),
('Swift', 'vedant sonwane', 'satana', 'nashik', 'satana', '2024-02-02', '1234567890', 123456),
('Tavera', 'pratik ugalmugale', 'nashik', 'pune', 'amruthdham ,nashik', '2024-02-03', '1236987458', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `car_list`
--

CREATE TABLE `car_list` (
  `car_id` int(10) NOT NULL,
  `car_name` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_list`
--

INSERT INTO `car_list` (`car_id`, `car_name`, `price`, `rating`) VALUES
(1, 'Ertiga', '12 rs/km', 4),
(2, 'Swift  Dzire', '10 rs/km', 5),
(3, 'Tavera', '14 rs/km', 4),
(4, 'Luxury Bus', '52 rs/km', 3),
(5, 'Bolero', '15 rs/km', 5),
(6, 'Force Urbania', '22 rs/km', 4),
(7, 'Fortuner', '35 rs/km', 4),
(8, 'Force Traveller', '30 rs/km', 4);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `message`) VALUES
(7, 'Tushar Pawar', 'tusharpawar9678@gmai', 'Subject: Inquiry about Car Rental Availability\r\nHi AutoHub,\r\n\r\nI am planning a trip from next month to mumbai and would like to inquire about the availability of rental cars during that period. Could you please provide information on the types of cars available and their rental rates?\r\n\r\nThank you,\r\nTushar '),
(8, 'vedant', 'vedant@gmail.com', 'Subject: Question Regarding Rental Policies\r\nHello Autohub,\r\n\r\nI hope this message finds you well. I am interested in renting a car from your company and would like more information about your rental policies. Specifically, I would like details on insurance coverage, mileage limits, and any additional fees that may apply.\r\n\r\nAppreciate your assistance,\r\nvedant'),
(9, 'vaishnavi kharche', 'Vaishnavi@gmail.com', 'Subject: Inquiry about Reservation Process\r\nDear Autohub,\r\n\r\nI am in the process of planning a trip and considering renting a car from your company. Could you please provide information on the reservation process? I am interested in understanding the required documents, payment options, and any discounts or promotions available.\r\n\r\nThank you,\r\nvaishnavi'),
(10, 'shivam', 'shivam@gmail.com', 'Subject: Clarification on Rental Duration\r\nHi Autohub,\r\n\r\nI am reaching out to inquire about the flexibility of rental durations. I am planning a short trip and would like to know if you have any minimum or maximum rental periods. Additionally, are there any penalties for extending or shortening the rental duration?\r\n\r\nRegards,\r\nshivam'),
(11, 'kapil shinde', 'kapilshinde2002@gmai', 'Subject: Inquiry about Vehicle Features\r\nHello Autohub,\r\n\r\nI am interested in renting a car for an upcoming road trip, and I would like to know more about the features of the vehicles in your fleet. Can you provide information on the available amenities, such as GPS, car seats, and any other extras that can be included with the rental?\r\n\r\nThanks,\r\nKapil');

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`id`, `username`, `password`, `email`, `phone_no`) VALUES
(15, 'tushar', 'tushar123', 'tusharpawar9678@gmail.com', '8275581955'),
(16, 'vedant', 'vedant123', 'vedant@gmail.com', '1234567890'),
(17, 'pratik', 'pratik123', 'pratik@gmail.com', '2154626496'),
(18, 'shruti', 'shruti123', 'shruti@gmail.com', '1478529630'),
(19, 'anurag', 'anurag123', 'anurag@gmail.com', '7894561230');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD UNIQUE KEY `select_car` (`select_car`);

--
-- Indexes for table `car_list`
--
ALTER TABLE `car_list`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_list`
--
ALTER TABLE `car_list`
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

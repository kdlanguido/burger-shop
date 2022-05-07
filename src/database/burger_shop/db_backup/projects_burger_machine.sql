-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 02:44 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects_burger_machine`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedbacks`
--

CREATE TABLE `tbl_feedbacks` (
  `id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedbacks`
--

INSERT INTO `tbl_feedbacks` (`id`, `feedback`, `user_id`) VALUES
(19, 'test', 11),
(20, 'test', 11),
(21, 'qwe', 11),
(22, 'qwe', 11),
(23, 'tst', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

CREATE TABLE `tbl_locations` (
  `id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_locations`
--

INSERT INTO `tbl_locations` (`id`, `location`, `price`) VALUES
(1, 'Muntinlupa', 50),
(2, 'Outside Muntinlupa', 75);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` text NOT NULL,
  `ref_no` text NOT NULL,
  `order_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `user_id`, `product_id`, `qty`, `status`, `ref_no`, `order_date`) VALUES
(123, 13, 51, 9, 'Completed', 'O.R.D.7140', '2022-04-10'),
(124, 13, 47, 15, 'Completed', 'O.R.D.7140', '2022-04-10'),
(125, 13, 52, 100, 'Completed', 'O.R.D.7140', '2022-04-10'),
(126, 13, 53, 12, 'Completed', 'O.R.D.7140', '2022-04-10'),
(127, 13, 55, 42, 'Completed', 'O.R.D.7140', '2022-04-10'),
(129, 13, 54, 5, 'Completed', 'O.R.D.3199', '2022-04-10'),
(130, 11, 48, 5, 'Cancelled', 'O.R.D.5158', '2022-05-07'),
(131, 11, 51, 45, 'Pending', 'O.R.D.6409', '2022-05-07'),
(132, 11, 51, 100, 'Pending', 'O.R.D.3757', '2022-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `token` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_otp`
--

INSERT INTO `tbl_otp` (`id`, `user_id`, `otp`, `token`, `date`) VALUES
(50, 13, 612305, 'm8sZvWtn1W', '2022-04-10'),
(51, 13, 750641, 'ARxXepDEK3', '2022-04-10'),
(52, 1, 127795, '0sOcl8zaQd', '2022-04-10'),
(53, 13, 389003, 'DAEUoAdXa2', '2022-04-10'),
(54, 13, 882681, '4vXkQOgCqq', '2022-04-10'),
(55, 2, 645266, 'AeXWRlEYT8', '2022-04-10'),
(56, 13, 379558, 'CXSJ7vTis7', '2022-04-10'),
(57, 1, 651286, '1QhozKRVjw', '2022-05-05'),
(58, 1, 787907, '97mmyHYuTo', '2022-05-07'),
(59, 1, 729223, 'ZhhL3HQdGW', '2022-05-07'),
(60, 1, 392952, '8Cv4okdhwc', '2022-05-07'),
(61, 1, 670029, 'OLIus9jgQ4', '2022-05-07'),
(62, 1, 192428, '7GRn15e121', '2022-05-07'),
(63, 1, 727339, 'tDCRH92zXA', '2022-05-07'),
(64, 1, 515063, '48atua4FIh', '2022-05-07'),
(65, 1, 988413, 'hwrzPKf16U', '2022-05-07'),
(66, 11, 219527, 'ewPofISpLu', '2022-05-07'),
(67, 1, 134392, '3j6m3AZbIY', '2022-05-07'),
(68, 1, 220811, 'VrJ9XIR8Zu', '2022-05-07'),
(69, 1, 346776, 'xtsnwz4Xmt', '2022-05-07'),
(70, 1, 101034, '5mRKk5QI5A', '2022-05-07'),
(71, 11, 510949, 'UCO5dKuSeX', '2022-05-07'),
(72, 1, 541603, 'GQqq4gQgTl', '2022-05-07'),
(73, 1, 462739, 'kTicETBCwJ', '2022-05-07'),
(74, 1, 283349, 'ID7mEZVyAi', '2022-05-07'),
(75, 1, 262980, 'regiUJAznB', '2022-05-07'),
(76, 11, 195489, '1xLfQYyDHC', '2022-05-07'),
(77, 11, 389037, 'ahY4H9RydI', '2022-05-07'),
(78, 11, 352117, 'KMEDbIQMnW', '2022-05-07'),
(79, 11, 458354, '7vCBDDrr0J', '2022-05-07'),
(80, 11, 512508, 'KhhJcI0Eu0', '2022-05-07'),
(81, 1, 404378, 'Iot8T9PYmC', '2022-05-07'),
(82, 11, 729522, 'Ik1jcnqooY', '2022-05-07'),
(83, 1, 327818, 'X43PWl8dmK', '2022-05-07'),
(84, 11, 964339, 'OhgXODtt32', '2022-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `id` int(11) NOT NULL,
  `order_ref_no` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_details` varchar(50) DEFAULT NULL,
  `payment` double NOT NULL,
  `payment_date` date NOT NULL DEFAULT current_timestamp(),
  `note_to_rider` text NOT NULL,
  `delivery_address` varchar(100) NOT NULL,
  `delivery_fee` double NOT NULL,
  `gcash_payment_proof` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`id`, `order_ref_no`, `payment_method`, `payment_details`, `payment`, `payment_date`, `note_to_rider`, `delivery_address`, `delivery_fee`, `gcash_payment_proof`) VALUES
(52, 'O.R.D.7140', 'GCASH', '090909', 45, '2022-04-10', 'test', '22 malakasan qwe qwe', 50, 'src/uploaded/payments/275485425_1642370326109169_4198055818920009956_n.jpg'),
(53, 'O.R.D.3199', 'CASH', NULL, 750, '2022-04-10', 'Hello ingat po', '22 malakasan qwe qwe', 75, NULL),
(54, 'O.R.D.5158', 'CASH', NULL, 500, '2022-05-07', 'test', '#213  malakasan  Balagtas Manipulo ', 50, NULL),
(55, 'O.R.D.6409', 'GCASH', '', 4500, '2022-05-07', '', '#213  malakasan  Balagtas Manipulo ', 50, 'src/uploaded/payments/'),
(56, 'O.R.D.3757', 'GCASH', '09055555555', 10000, '2022-05-07', '', '#213  malakasan  Balagtas Manipulo ', 75, 'src/uploaded/payments/Receipt (5).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `picture` text NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name`, `category`, `picture`, `price`) VALUES
(46, 'Blackbeard slash Whitebeard Burger', 'burger', 'src/uploaded/Blackbeard slash Whitebeard Burger.jpg', 100),
(47, 'Escanor Burger', 'burger', 'src/uploaded/Escanor Burger.jpg', 100),
(48, 'Ichigo Burger', 'burger', 'src/uploaded/Ichigo Burger.jpg', 100),
(50, 'Naruto Burger', 'burger', 'src/uploaded/Naruto Burger.jpg', 100),
(51, 'Natsu Burger', 'burger', 'src/uploaded/Natsu Burger.jpg', 100),
(52, 'Rengoku', 'sides', 'src/uploaded/rengoku.jpg', 80),
(53, 'Meliodas Nachos', 'sides', 'src/uploaded/Meliodas Nachos.jpg', 150),
(54, 'Saitama Burger', 'burger', 'src/uploaded/Saitama Burger.jpg', 150),
(55, 'Sakuragi Burger', 'burger', 'src/uploaded/Sakuragi Burger.jpg', 100),
(56, 'San Goku Burger', 'burger', 'src/uploaded/San Goku Burger.jpg', 100),
(62, 'Stick o', 'seasonal item', 'src/uploaded/275485425_1642370326109169_4198055818920009956_n.jpg', 1),
(65, 'test', 'burger', 'src/uploaded/279459767_327879979431250_8946294965675578416_n.jpg', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `access_level` text NOT NULL,
  `phone` text NOT NULL,
  `name` text NOT NULL,
  `register_date` date DEFAULT current_timestamp(),
  `address_st` varchar(100) DEFAULT NULL,
  `address_no` text DEFAULT NULL,
  `address_city` text DEFAULT NULL,
  `address_brgy` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `email`, `password`, `access_level`, `phone`, `name`, `register_date`, `address_st`, `address_no`, `address_city`, `address_brgy`) VALUES
(1, 'dev', 'kdlanguido@gmail.com', '1', 'admin', '22222', 'Harri', '2022-03-01', '#21 Malakasan St Brgy Tibay ', '', '', ''),
(2, 'admin', 'kdlanguido@gmail.com', '123456789q', 'admin', '0000', 'Junior Nonilon', '2022-03-01', '#21 Malakasan St Brgy Tibay ', '', '', ''),
(11, 'user1', 'kdlanguido@gmail.com', '123456789q', 'user', '09231231231', 'Gloc 9', '2022-03-21', 'malakasan', '#213 ', 'Manipulo ', ' Balagtas'),
(13, 'jay', 'kdlanguido@gmail.com', '123456789q', 'user', 'qwe', 'jay', '2022-04-09', 'malakasan', '22', 'qwe', 'qwe'),
(15, 'qwe', 'qwe@gmail.com', '123Wqweij', 'admin', '98798798798', 'qweqwe', '2022-05-07', NULL, NULL, NULL, NULL),
(16, 'qwe', 'qwe', 'qwe', 'user', '1231', 'qwe', '2022-05-07', 'qew', 'qwe', 'qwe', 'qwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_feedbacks`
--
ALTER TABLE `tbl_feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_ref_no`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address` (`address_st`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_feedbacks`
--
ALTER TABLE `tbl_feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_feedbacks`
--
ALTER TABLE `tbl_feedbacks`
  ADD CONSTRAINT `tbl_feedbacks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`);

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

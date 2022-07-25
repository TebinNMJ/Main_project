-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2022 at 09:24 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `date` date NOT NULL,
  `feedback` varchar(200) NOT NULL,
  `feedback_reply` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `date`, `feedback`, `feedback_reply`, `userid`, `status`) VALUES
(1, '2022-05-12', 'helllllloooooo', 'Thank You', 13, 1),
(5, '2022-06-26', 'good work', 'kill', 13, 1),
(7, '2022-06-27', 'hellloooo', 'hello', 13, 0),
(8, '2022-07-02', 'Good', '', 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assign`
--

CREATE TABLE `tbl_assign` (
  `aid` int(11) NOT NULL,
  `booking_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `delboy` int(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_assign`
--

INSERT INTO `tbl_assign` (`aid`, `booking_id`, `name`, `date`, `delboy`, `status`) VALUES
(16, 283, 'tebin', '2022-07-12', 58, 'Pickup complete'),
(17, 284, 'sonu', '2022-07-12', 58, 'Pickup complete'),
(18, 286, 'tebin', '2022-07-10', 58, 'Pickup complete'),
(19, 286, 'tebin', '2022-07-10', 58, 'assigned');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookslot`
--

CREATE TABLE `tbl_bookslot` (
  `booking_id` int(11) NOT NULL,
  `cloth_type` varchar(50) NOT NULL,
  `wash_type` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `delivery_date` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `placed` int(11) NOT NULL,
  `del_boy` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bookslot`
--

INSERT INTO `tbl_bookslot` (`booking_id`, `cloth_type`, `wash_type`, `quantity`, `booking_date`, `delivery_date`, `userid`, `status`, `placed`, `del_boy`) VALUES
(265, 'Saree', 'Dry wash', 6, '2022-07-09', '2022-07-11', 13, 1, 1, 1),
(266, 'churidhar', 'Dry wash', 6, '2022-07-09', '2022-07-11', 13, 1, 1, 1),
(283, 'Sheets', 'Normal Wash', 6, '2022-07-10', '2022-07-12', 13, 0, 1, 1),
(284, 'Sweater', 'Dry wash', 5, '2022-07-10', '2022-07-12', 17, 0, 1, 1),
(286, 'Jeans', 'Dry wash', 2, '2022-07-09', '2022-07-10', 13, 0, 1, 1),
(287, 'churidhar', 'Synthetic wash', 5, '2022-07-10', '2022-07-11', 13, 0, 1, 0),
(288, 'shirt', 'Normal Wash', 7, '2022-07-12', '2022-07-14', 13, 0, 1, 0),
(289, 'Pant', 'Dry wash', 5, '2022-07-13', '2022-07-17', 13, 0, 1, 0),
(290, 'Sweater', 'Dry wash', 5, '2022-07-13', '2022-07-15', 13, 0, 1, 0),
(291, 'Pant', 'Dry wash', 3, '2022-07-13', '2022-07-15', 13, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `material` varchar(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `material`, `price`) VALUES
(1, 'denim', 90),
(2, 'woolen', 100),
(3, 'Cotton ', 60),
(4, 'Silk', 100),
(5, 'Linen', 120),
(6, 'Nylon', 60),
(7, 'Polyester', 50),
(8, 'Chiffon', 100),
(10, 'Jute', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cloth`
--

CREATE TABLE `tbl_cloth` (
  `id` int(11) NOT NULL,
  `cloth` varchar(50) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cloth`
--

INSERT INTO `tbl_cloth` (`id`, `cloth`, `price`) VALUES
(2, 'Sweater', 100),
(3, 'Pant', 25),
(4, 'shirt', 25),
(5, 'Saree', 50),
(6, 'Jeans', 35),
(7, 'Sheets', 40),
(8, 'churidhar', 30),
(9, 'Jackets', 40),
(11, 'T Shirt', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laundry_type`
--

CREATE TABLE `tbl_laundry_type` (
  `l_id` int(11) NOT NULL,
  `l_type` varchar(50) NOT NULL,
  `l_cloth` varchar(50) NOT NULL,
  `l_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_laundry_type`
--

INSERT INTO `tbl_laundry_type` (`l_id`, `l_type`, `l_cloth`, `l_price`) VALUES
(33, 'Cotton ', 'Shirt', 50),
(34, 'Silk', 'Pants', 120),
(36, 'Chiffon', 'Saree', 90),
(37, 'Woolen', 'Sheets', 80),
(38, 'Denim', 'Jeans', 80),
(39, 'Nylon', 'Churidhar', 60),
(40, 'Polyester', 'Jackets', 70),
(41, 'sum', '', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `uid` int(11) NOT NULL,
  `id_proof` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `email`, `password`, `status`, `uid`, `id_proof`) VALUES
(1, 'admin@gmail.com', 'admin', 0, 1, ''),
(23, 'tebinnm@gmail.com', 'tebin', 0, 2, ''),
(24, 's@gmail.com', 'Sujith@1234', 0, 2, ''),
(25, 'roshan@gmail.com', 'Ro@123', 0, 2, ''),
(27, 'sonu@gmail.com', 'So@123', 0, 2, ''),
(35, 'midhunkrishna441@gmail.com', 'midhun88', 0, 2, ''),
(49, 'test@gmail.com', 'Test@123', 1, 3, 'medical.pdf'),
(50, 'test3@gmail.com', 'Test@123', 1, 3, 'Abstract .pdf'),
(56, 'worker1@gmail.com', 'Test@123', 1, 3, 'Abstract .pdf'),
(58, 'del@gmail.com', 'Test@123', 1, 4, 'medical.pdf'),
(59, 'delboy1@gmail.com', 'Test@123', 1, 4, 'medical.pdf'),
(60, 'aleena.nmj@gmail.com', '1234', 0, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `booking_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `login_id` int(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `transaction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `booking_id`, `name`, `login_id`, `address`, `quantity`, `amount`, `transaction`) VALUES
(613, 254, 'tebin', 23, 'tebinhouse palrivattam ', 6, 690, 'success'),
(614, 255, 'tebin', 23, 'tebinhouse palrivattam ', 5, 575, 'success'),
(615, 256, 'tebin', 23, 'tebinhouse palrivattam ', 4, 520, 'success'),
(616, 257, 'sonu', 27, 'wayanad', 4, 320, 'success'),
(618, 259, 'sonu', 27, 'wayanad', 5, 400, 'success'),
(619, 260, 'Aleena Joseph', 60, 'Nedumpurath, Areekamala ', 4, 460, 'success'),
(620, 261, 'tebin', 23, 'tebinhouse palrivattam ', 6, 690, 'success'),
(621, 263, 'tebin', 23, 'tebinhouse palrivattam ', 6, 690, 'success'),
(622, 264, 'tebin', 23, 'tebinhouse palrivattam ', 4, 120, 'success'),
(623, 265, 'tebin', 23, 'tebinhouse palrivattam ', 6, 480, 'success'),
(624, 266, 'tebin', 23, 'tebinhouse palrivattam ', 6, 480, 'success'),
(625, 268, 'tebin', 23, 'tebinhouse palrivattam ', 8, 520, 'success'),
(626, 268, 'tebin', 23, 'tebinhouse palrivattam ', 8, 520, 'success'),
(627, 268, 'tebin', 23, 'tebinhouse palrivattam ', 8, 520, 'success'),
(630, 272, 'tebin', 23, 'tebinhouse palrivattam ', 6, 660, 'success');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(20) NOT NULL,
  `booking_id` int(20) NOT NULL,
  `login_id` int(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `transaction` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `booking_id`, `login_id`, `amount`, `transaction`) VALUES
(6, 277, 23, 660, 'success'),
(7, 278, 23, 500, 'success'),
(8, 279, 23, 330, 'success'),
(9, 280, 23, 330, 'success'),
(10, 281, 23, 500, 'success'),
(11, 282, 23, 1560, 'success'),
(12, 283, 23, 480, 'success'),
(13, 284, 27, 950, 'success'),
(14, 285, 27, 420, 'success'),
(15, 286, 23, 230, 'success'),
(16, 287, 23, 550, 'success'),
(18, 289, 23, 550, 'success'),
(19, 290, 23, 950, 'success'),
(20, 291, 23, 345, 'success');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(50) NOT NULL,
  `userid` int(50) NOT NULL,
  `booking_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount` int(50) NOT NULL,
  `pay_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `userid`, `booking_id`, `date`, `amount`, `pay_status`) VALUES
(16, 23, 254, '2022-07-05 06:44:28', 690, 'success'),
(17, 23, 255, '2022-07-05 06:44:28', 575, 'success'),
(18, 23, 256, '2022-07-05 06:44:28', 520, 'success'),
(19, 27, 257, '2022-07-05 06:44:28', 320, 'success'),
(20, 27, 259, '2022-07-05 06:44:28', 400, 'success'),
(21, 60, 260, '2022-07-05 06:44:28', 460, 'success'),
(22, 23, 261, '2022-07-05 06:44:28', 1090, 'success'),
(23, 23, 263, '2022-07-05 06:47:14', 1090, 'success'),
(24, 23, 264, '2022-07-06 16:06:37', 120, 'success'),
(25, 23, 265, '2022-07-06 20:50:18', 480, 'success'),
(26, 23, 266, '2022-07-07 06:49:53', 480, 'success'),
(27, 23, 268, '2022-07-07 09:07:14', 1560, 'success'),
(28, 23, 272, '2022-07-08 03:34:09', 660, 'success'),
(29, 23, 276, '2022-07-08 04:00:41', 2020, 'success'),
(30, 23, 278, '2022-07-08 04:09:43', 1160, 'success'),
(31, 23, 0, '2022-07-08 04:19:01', 1160, 'success'),
(32, 23, 0, '2022-07-08 04:20:32', 1160, 'success'),
(33, 23, 0, '2022-07-08 04:22:03', 1160, 'success'),
(34, 23, 0, '2022-07-08 04:23:24', 1160, 'success'),
(35, 23, 278, '2022-07-08 04:25:59', 0, 'success'),
(36, 23, 278, '2022-07-08 04:29:02', 1160, 'success'),
(37, 23, 278, '2022-07-08 04:35:24', 1160, 'success'),
(38, 23, 281, '2022-07-08 05:06:12', 1160, 'success'),
(39, 23, 283, '2022-07-08 05:22:23', 2040, 'success'),
(40, 27, 285, '2022-07-08 09:54:47', 1370, 'success'),
(41, 23, 287, '2022-07-08 10:07:34', 780, 'success'),
(42, 23, 289, '2022-07-11 04:18:44', 550, 'success'),
(43, 23, 291, '2022-07-11 05:52:12', 1295, 'success');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reply`
--

CREATE TABLE `tbl_reply` (
  `rid` int(11) NOT NULL,
  `date` date NOT NULL,
  `messege` varchar(50) NOT NULL,
  `userid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userid` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `id_proof` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userid`, `login_id`, `name`, `phone`, `address`, `id_proof`) VALUES
(13, 23, 'Tebin', '9090909093', 'tebinhouse palrivattam ', ''),
(14, 24, 'sujith', '9999999999', 'kottyam', ''),
(15, 25, 'roshan', '9876543217', 'qqqqqqqqq', ''),
(17, 27, 'sonu', '9999999999', 'wayanad', ''),
(21, 35, 'Midhun Krishna', '9878987675', 'Karumukkil House Chakkamkandam P.O', ''),
(35, 49, 'test', '8767875987', 'test', ''),
(36, 50, 'test', '9687987685', 'test2', ''),
(37, 56, 'worker', '7678765456', 'qwerty', ''),
(38, 58, 'delboy', '8765678989', 'delboy', ''),
(39, 59, 'delboy', '8763587623', 'qwert', ''),
(40, 60, 'Aleena Joseph', '6765434569', 'Nedumpurath, Areekamala ', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wash_type`
--

CREATE TABLE `tbl_wash_type` (
  `id` int(11) NOT NULL,
  `wash_type` varchar(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wash_type`
--

INSERT INTO `tbl_wash_type` (`id`, `wash_type`, `price`) VALUES
(1, 'Dry washing', 90),
(2, 'Synthetic wash', 80),
(3, 'Normal Wash', 40),
(4, 'Hot Wash', 70),
(5, 'cold Wash', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `uid` int(11) NOT NULL,
  `utype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`uid`, `utype`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'worker'),
(4, 'del_boy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tbl_bookslot`
--
ALTER TABLE `tbl_bookslot`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cloth`
--
ALTER TABLE `tbl_cloth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_laundry_type`
--
ALTER TABLE `tbl_laundry_type`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_reply`
--
ALTER TABLE `tbl_reply`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `tbl_wash_type`
--
ALTER TABLE `tbl_wash_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_bookslot`
--
ALTER TABLE `tbl_bookslot`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cloth`
--
ALTER TABLE `tbl_cloth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_laundry_type`
--
ALTER TABLE `tbl_laundry_type`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=633;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_reply`
--
ALTER TABLE `tbl_reply`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_wash_type`
--
ALTER TABLE `tbl_wash_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bookslot`
--
ALTER TABLE `tbl_bookslot`
  ADD CONSTRAINT `tbl_bookslot_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `tbl_users` (`userid`);

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `tbl_login_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `usertype` (`uid`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`login_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2025 at 02:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr-no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr-no`, `admin_name`, `admin_pass`) VALUES
(1, 'nurul', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `seats` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_status` enum('pending','paid','failed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `room_id`, `check_in`, `seats`, `amount`, `payment_status`, `created_at`, `order_id`) VALUES
(1, 2, 2, '2025-06-30', 1, 2000, 'pending', '2025-06-28 19:13:44', ''),
(2, 2, 2, '2025-06-30', 1, 2000, 'pending', '2025-06-28 19:15:26', ''),
(3, 2, 2, '2025-06-30', 2, 4000, 'pending', '2025-06-28 19:18:21', ''),
(4, 2, 2, '2025-06-30', 2, 4000, 'pending', '2025-06-28 19:23:02', ''),
(5, 2, 4, '2025-06-30', 2, 10000, 'pending', '2025-06-28 20:24:46', ''),
(6, 2, 2, '2025-06-29', 10, 20000, 'pending', '2025-06-28 20:27:55', ''),
(7, 2, 3, '2025-06-29', 5, 123175, 'paid', '2025-06-28 20:43:11', 'ORDC053B99E'),
(8, 2, 4, '2025-06-30', 6, 30000, 'paid', '2025-06-29 00:30:24', 'ORDECDD3071'),
(9, 2, 4, '2025-06-30', 2, 10000, 'paid', '2025-06-29 00:31:15', 'ORD4B742E02');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`sr_no`, `image`) VALUES
(4, 'IMG_11406.jpg'),
(5, 'IMG_21623.jpg'),
(6, 'IMG_55305.jpg'),
(7, 'IMG_72402.jpg'),
(8, 'IMG_89591.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gmap` varchar(250) NOT NULL,
  `ph1` bigint(20) NOT NULL,
  `ph2` bigint(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `fb` varchar(250) NOT NULL,
  `insta` varchar(250) NOT NULL,
  `twi` varchar(250) NOT NULL,
  `iframe` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `ph1`, `ph2`, `email`, `fb`, `insta`, `twi`, `iframe`) VALUES
(1, ' XYZ,Komolapur Railway,Dhaka', 'https://maUqGo5uPtx5', 155754101, 8520952063, 'ask.mail@gmail.com', 'https://www.facebook.com/', 'instagram.com', 'twitter.com', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d233667.90587918248!2d90.419689!3d23.780841!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1747501183483!5m2!1sen!2sbd');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(7, 'IMG_45775.svg', 'WIFI', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus non officiis maxime dignissimos facere nam fugiat.'),
(9, 'IMG_61536.svg', 'asdhadjasjlkdn', 'safad'),
(10, 'IMG_50564.svg', 'rating', 'asdadadf');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(7, 'abcdefg'),
(8, 'abc'),
(9, 'dummy features');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `price`, `area`, `quantity`, `adult`, `children`, `description`, `status`, `removed`) VALUES
(1, 'test', 50000, 51, 1, 2, 1, 'undefined', 1, 1),
(2, 'test2', 2000, 200, 2, 2, 1, 'undefined', 1, 0),
(3, 'dummy', 24635, 250, 23, 1, 1, 'undefined', 1, 0),
(4, 'Fist Class', 5000, 100, 2, 4, 2, 'undefined', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms_images`
--

CREATE TABLE `rooms_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms_images`
--

INSERT INTO `rooms_images` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(10, 4, 'IMG_22468.jpg', 1),
(11, 2, 'IMG_29225.png', 1),
(12, 3, 'IMG_30239.png', 1),
(13, 3, 'IMG_69776.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_facilities`
--

INSERT INTO `room_facilities` (`sr_no`, `room_id`, `facilities_id`) VALUES
(11, 2, 7),
(12, 2, 10),
(13, 3, 10),
(15, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`sr_no`, `room_id`, `features_id`) VALUES
(8, 2, 8),
(9, 3, 8),
(10, 3, 9),
(13, 4, 8),
(14, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'Ticket Booking', 'One stop solution for ticket booking', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(1150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_details`
--

INSERT INTO `team_details` (`sr_no`, `name`, `picture`) VALUES
(6, 'RAFI', 'IMG_54849.jpg'),
(7, 'Shákib Hasan', 'IMG_22099.jpg'),
(8, 'নুরুল হুদা', 'IMG_27699.jpg'),
(9, 'MOFTY', 'IMG_99563.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(120) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `dob` date NOT NULL,
  `profile` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `token` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `t_expire` date DEFAULT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `password`, `is_verified`, `token`, `status`, `t_expire`, `datentime`, `email`) VALUES
(2, 'test dumy', 'gdjy', '123456', 32135, '2025-06-18', 'IMG_19043.jpeg', '$2y$10$whn55xJQeIfmfBET0P21l.4PBolL5Iah/N/Q69qyJoslmbmPi3kBW', 1, '2649968a8311017265c713ae5856d0d4', 1, '2025-06-28', '2025-06-28 01:28:12', 'abmnurulhuda2003@gmail.com'),
(3, 'hello nigga', 'asdafdfsdg', '5246546789641', 1224141, '2025-06-18', 'IMG_70105.jpeg', '$2y$10$VsPEkbj5q4Z1fddqoeQPYu45rkJLpDre.k10QGaRpbsWCAoW4C78C', 0, 'f19e01e19947217bb0f56389861ab530', 1, NULL, '2025-06-28 03:59:34', 'nigga@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`sr_no`, `name`, `email`, `subject`, `message`, `date`, `seen`) VALUES
(15, 'TO DO Reminder BOT', 'sisirnurul789@gmail.com', 'dummy message', 'asdaf', '2025-06-20', 0),
(16, 'TO DO Reminder BOT', 'sisirnurul789@gmail.com', 'dummy message', 'asdaf', '2025-06-20', 0),
(17, 'TO DO Reminder BOT', 'sisirnurul789@gmail.com', 'dummy message', 'asdaf', '2025-06-20', 0),
(18, 'TO DO Reminder BOT', 'sisirnurul789@gmail.com', 'dummy message', 'asdaf', '2025-06-20', 0),
(19, 'TO DO Reminder BOT', 'sisirnurul789@gmail.com', 'dummy message', 'asdaf', '2025-06-20', 0),
(20, 'TO DO Reminder BOT', 'sisirnurul789@gmail.com', 'dummy message', 'asdaf', '2025-06-20', 0),
(21, 'TO DO Reminder BOT', 'sisirnurul789@gmail.com', 'dummy message', 'asdaf', '2025-06-20', 0),
(22, 'TO DO Reminder BOT', 'sisirnurul789@gmail.com', 'dummy message', 'asdaf', '2025-06-20', 0),
(23, 'TO DO Reminder BOT', 'sisirnurul789@gmail.com', 'dummy message', 'asdaf', '2025-06-20', 0),
(24, 'TO DO Reminder BOT', 'sisirnurul789@gmail.com', 'dummy message', 'asdaf', '2025-06-20', 0),
(25, 'TO DO Reminder BOT', 'sisirnurul789@gmail.com', 'dummy message', 'asdaf', '2025-06-20', 0),
(26, 'TO DO Reminder BOT', 'sisirnurul789@gmail.com', 'dummy message', 'asdaf', '2025-06-20', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr-no`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms_images`
--
ALTER TABLE `rooms_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `facilities_id` (`facilities_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `features_id` (`features_id`),
  ADD KEY `rm_id` (`room_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr-no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms_images`
--
ALTER TABLE `rooms_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_details`
--
ALTER TABLE `team_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_cred` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `rooms_images`
--
ALTER TABLE `rooms_images`
  ADD CONSTRAINT `rooms_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `facilities_id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `room_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `features_id` FOREIGN KEY (`features_id`) REFERENCES `features` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `rm_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

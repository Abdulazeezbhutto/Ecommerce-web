-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2025 at 12:33 PM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Man', 'lorem ipsum', '2025-08-12 07:14:26', '2025-08-13 11:00:56'),
(3, 'kids', 'lorem', '2025-08-12 07:36:46', '2025-08-12 07:36:49'),
(7, 'Bags for man', NULL, '2025-08-13 12:16:13', '2025-08-13 12:16:13'),
(8, 'Summer Items', NULL, '2025-08-16 17:06:34', '2025-08-16 17:06:34'),
(9, 'Winter Items', NULL, '2025-08-16 17:06:49', '2025-08-16 17:06:49'),
(10, 'New Arrivals', NULL, '2025-08-16 17:28:45', '2025-08-16 17:28:45'),
(11, 'Shoe for man', NULL, '2025-08-18 06:20:14', '2025-08-18 06:20:14'),
(12, 'Rain weather', NULL, '2025-08-19 11:12:29', '2025-08-19 11:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'pakistan'),
(2, 'india'),
(3, 'Nepal'),
(4, 'China'),
(5, 'Bangladesh'),
(6, 'Iran'),
(7, 'Saudi Arabia');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_teller`
--

CREATE TABLE `news_teller` (
  `news_teller_id` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_teller`
--

INSERT INTO `news_teller` (`news_teller_id`, `email`) VALUES
(1, 'abdulazeezbhutto085@gmail.com'),
(2, 'rukhsar@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_Status` varchar(250) DEFAULT 'pending',
  `total_ammount` decimal(10,0) DEFAULT NULL,
  `payment_status` enum('paid','processing','unpaid') NOT NULL DEFAULT 'processing',
  `shipping_Address` varchar(500) DEFAULT NULL,
  `placed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_method` enum('stripe','cod') NOT NULL DEFAULT 'cod'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_Status`, `total_ammount`, `payment_status`, `shipping_Address`, `placed_at`, `updated_at`, `payment_method`) VALUES
(16, 3, 'Completed', 2340, 'processing', 'Baharia Town Karachi, 160, Sindh, 234235', '2025-08-21 08:01:53', '2025-08-21 08:05:10', 'stripe'),
(17, 3, 'Pending', 226, 'processing', 'Baharia Town Karachi, 160, Sindh, 234`235', '2025-08-21 09:30:32', '2025-08-21 10:19:02', 'stripe'),
(18, 3, 'Pending', 780, 'processing', 'Baharia Town Karachi, 160, Sindh, 234`235', '2025-08-21 09:34:52', '2025-08-21 10:18:51', 'cod'),
(19, 3, 'Cancelled', 150, 'processing', 'Baharia Town Karachi, 160, Sindh, 234`235', '2025-08-21 09:35:35', '2025-08-21 10:18:38', 'stripe'),
(20, 3, 'Completed', 10, 'processing', ', , , ', '2025-08-21 09:45:32', '2025-08-21 10:31:44', 'stripe'),
(21, 3, 'pending', 226, 'processing', 'Hyderabad sindh, Sindh, Pakistan, Karachi, sindh, 234235', '2025-08-21 10:11:37', '2025-08-21 10:11:37', 'cod'),
(22, 3, 'Completed', 226, 'processing', 'Baharia Town Karachi, 160, Sindh, 234`235', '2025-08-21 10:17:53', '2025-08-21 10:30:43', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `image_path` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `image_path`) VALUES
(1, 16, '1755087501_mens-shoulder-bags-16-600x600.jpg'),
(2, 17, '1755365176_2.png'),
(3, 18, '1755087501_mens-shoulder-bags-16-600x600.jpg'),
(4, 19, '1755498052_nike.png'),
(5, 20, '1755602099_10.png'),
(6, 22, '1755364993_1.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `stock_quamtitiy` varchar(250) DEFAULT NULL,
  `image_path` varchar(250) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `description`, `price`, `stock_quamtitiy`, `image_path`, `create_at`, `updated_At`) VALUES
(6, 1, 'Three Piece ', 'Good', 1500, '0', '1755087329_wine-checks-3-piece-tuxedo_medium_2.jpg', '2025-08-13 12:15:29', '2025-08-21 07:29:58'),
(7, 7, 'Lather bag', 'Lather Bags ', 780, '42', '1755087501_mens-shoulder-bags-16-600x600.jpg', '2025-08-13 12:18:21', '2025-08-21 09:34:53'),
(8, 8, 'Stylish Woman Outfit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 226, '5', '1755364993_1.png', '2025-08-16 17:23:13', '2025-08-21 10:17:53'),
(9, 8, 'Stylish Woman Outfit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 226, '7', '1755365176_2.png', '2025-08-16 17:26:16', '2025-08-21 09:30:32'),
(10, 8, 'Stylish Woman Outfit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 226, '8', '1755365210_3.png', '2025-08-16 17:26:50', '2025-08-16 17:26:50'),
(11, 10, 'Stylish Woman Outfit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 226, '6', '1755365355_4.jpg', '2025-08-16 17:29:15', '2025-08-21 06:30:28'),
(12, 10, 'Stylish Woman Outfit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 226, '8', '1755365380_5.png', '2025-08-16 17:29:40', '2025-08-16 17:29:40'),
(13, 11, 'Nike Air Max', 'Experience comfort and style with Nike Air Max — featuring visible Air cushioning and a timeless streetwear design', 150, '8', '1755498052_nike.png', '2025-08-18 06:20:52', '2025-08-21 09:35:35'),
(14, 12, 'Umbrella ', 'Invented thousands of years ago (first in ancient Egypt, China, and Greece).\r\nTwo main types: rain umbrellas (waterproof) and parasols (for shade).\r\nModern umbrellas are often foldable, lightweight, and wind-resistant.', 10, '8', '1755602099_10.png', '2025-08-19 11:14:59', '2025-08-21 09:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL CHECK (`rating` between 1 and 5),
  `review_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_type` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_type`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT 2,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `first_name`, `middle_name`, `last_name`, `email`, `password_hash`, `phone`, `address`, `city`, `state`, `postal_code`, `country`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'Rukhsar ', 'Bilal', 'Zaidi', 'rukhsar@gmail.com', '$2y$10$FDHzDTJ4tuE/eX5L/2obmuQakPDJzsnR2Ly4Xc5mdv9NvWjWshtP.', '00923493232307', 'Baharia Town Karachi', '160', 'Sindh', '234`235', '5', '2025-08-12 10:54:03', '2025-08-16 11:05:12', 'Inactive'),
(3, 1, 'Abdul', 'Azeez', 'Bhutto', 'abdulazeezbhutto085@gmail.com', '$2y$10$HuNvwxRdCeXBCjPeTVfVdOc8uLYSyRr38mUKeFSGNVNoY1DEzPqnO', '+923493232307', 'Baharia Town Karachi', '160', 'Sindh', '234`235', '5', '2025-08-12 11:13:40', '2025-08-16 11:05:01', 'Active'),
(4, 2, 'Khumail ', 'Ali', 'Shar', 'khumail@gmail.com', '$2y$10$wqYWcESsI/vkP1x7eKgQS.3axHftCVbe8PcMV4c7ZEqiI4sWf5KLa', '+923491234567', 'Hyderabad ', '160', 'Sindh', '234235', '5', '2025-08-19 10:32:58', '2025-08-19 10:32:58', 'Inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `news_teller`
--
ALTER TABLE `news_teller`
  ADD PRIMARY KEY (`news_teller_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `fk_orderitems_orderid` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_teller`
--
ALTER TABLE `news_teller`
  MODIFY `news_teller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_orderitems_orderid` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

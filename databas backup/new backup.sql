/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 10.4.32-MariaDB : Database - ecommerce
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `ecommerce`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(250) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `categories` */

LOCK TABLES `categories` WRITE;

insert  into `categories`(`category_id`,`category_name`,`description`,`created_at`,`updated_at`) values 
(1,'Man','lorem ipsum','2025-08-12 00:14:26','2025-08-13 04:00:56'),
(3,'kids','lorem','2025-08-12 00:36:46','2025-08-12 00:36:49'),
(7,'Bags for man',NULL,'2025-08-13 05:16:13','2025-08-13 05:16:13'),
(8,'Summer Items',NULL,'2025-08-16 10:06:34','2025-08-16 10:06:34'),
(9,'Winter Items',NULL,'2025-08-16 10:06:49','2025-08-16 10:06:49'),
(10,'New Arrivals',NULL,'2025-08-16 10:28:45','2025-08-16 10:28:45'),
(11,'Shoe for man',NULL,'2025-08-17 23:20:14','2025-08-17 23:20:14'),
(12,'Rain weather',NULL,'2025-08-19 04:12:29','2025-08-19 04:12:29');

UNLOCK TABLES;

/*Table structure for table `country` */

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `country` */

LOCK TABLES `country` WRITE;

insert  into `country`(`country_id`,`country_name`) values 
(1,'pakistan'),
(2,'india'),
(3,'Nepal'),
(4,'China'),
(5,'Bangladesh'),
(6,'Iran'),
(7,'Saudi Arabia');

UNLOCK TABLES;

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `sent_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `messages` */

LOCK TABLES `messages` WRITE;

insert  into `messages`(`message_id`,`full_name`,`email`,`subject`,`message`,`sent_at`) values 
(5,'Abdul Azeez Bhutto','abdulazeezbhutto085@gmail.com','Order Missing','dummy lorem ipsumdummy lorem ipsumdummy lorem ipsumdummy lorem ipsumdummy lorem ipsum','2025-08-25 04:43:49');

UNLOCK TABLES;

/*Table structure for table `news_teller` */

DROP TABLE IF EXISTS `news_teller`;

CREATE TABLE `news_teller` (
  `news_teller_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`news_teller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `news_teller` */

LOCK TABLES `news_teller` WRITE;

insert  into `news_teller`(`news_teller_id`,`email`,`created_at`) values 
(1,'abdulazeezbhutto085@gmail.com','2025-08-25 04:48:05'),
(2,'rukhsar@gmail.com','2025-08-25 04:48:05');

UNLOCK TABLES;

/*Table structure for table `order_items` */

DROP TABLE IF EXISTS `order_items`;

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `image_path` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `fk_orderitems_orderid` (`order_id`),
  CONSTRAINT `fk_orderitems_orderid` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `order_items` */

LOCK TABLES `order_items` WRITE;

insert  into `order_items`(`order_item_id`,`order_id`,`image_path`) values 
(27,44,'1755087501_mens-shoulder-bags-16-600x600.jpg'),
(28,45,'1755364993_1.png'),
(29,46,'1755498052_nike.png'),
(30,47,'1755602099_10.png'),
(31,48,'1755498052_nike.png'),
(32,49,'1755087501_mens-shoulder-bags-16-600x600.jpg'),
(33,50,'1755087501_mens-shoulder-bags-16-600x600.jpg'),
(34,51,'1755087501_mens-shoulder-bags-16-600x600.jpg'),
(35,52,'1755087501_mens-shoulder-bags-16-600x600.jpg'),
(36,53,'1755087501_mens-shoulder-bags-16-600x600.jpg'),
(37,54,'1755087501_mens-shoulder-bags-16-600x600.jpg'),
(38,56,'1755087501_mens-shoulder-bags-16-600x600.jpg'),
(39,57,'1755365380_5.png'),
(40,58,'1755498052_nike.png'),
(41,59,'1755087501_mens-shoulder-bags-16-600x600.jpg'),
(42,60,'1755087501_mens-shoulder-bags-16-600x600.jpg'),
(43,61,'1755087501_mens-shoulder-bags-16-600x600.jpg'),
(44,62,'1755087501_mens-shoulder-bags-16-600x600.jpg'),
(45,63,'1755087501_mens-shoulder-bags-16-600x600.jpg');

UNLOCK TABLES;

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `order_Status` varchar(250) DEFAULT 'pending',
  `total_ammount` decimal(10,0) DEFAULT NULL,
  `payment_status` enum('paid','processing','unpaid') NOT NULL DEFAULT 'processing',
  `shipping_Address` varchar(500) DEFAULT NULL,
  `placed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_method` enum('stripe','cod') NOT NULL DEFAULT 'cod',
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `orders` */

LOCK TABLES `orders` WRITE;

insert  into `orders`(`order_id`,`user_id`,`order_Status`,`total_ammount`,`payment_status`,`shipping_Address`,`placed_at`,`updated_at`,`payment_method`) values 
(44,3,'Completed',780,'processing','Baharia Town Karachi, 160, Sindh, 234`235','2025-08-22 03:45:49','2025-08-22 03:50:09','stripe'),
(45,3,'Pending',452,'processing','Baharia Town Karachi, 160, Sindh, 234`235','2025-08-22 03:57:56','2025-08-22 03:57:56','stripe'),
(46,3,'Pending',150,'processing','Baharia Town Karachi, 160, Sindh, 234`235','2025-08-24 23:21:51','2025-08-24 23:21:51','stripe'),
(47,3,'Pending',10,'processing','Baharia Town Karachi, 160, Sindh, 234`235','2025-08-24 23:23:19','2025-08-24 23:23:19','stripe'),
(48,3,'Pending',150,'processing','Baharia Town Karachi, 160, Sindh, 234`235','2025-08-24 23:26:30','2025-08-24 23:26:30','cod'),
(49,3,'Pending',7800,'processing','Hyderabad sindh, Sindh, Pakistan, Karachi, Sindh, 234235','2025-08-25 02:18:57','2025-08-25 02:18:57','stripe'),
(50,3,'Pending',7800,'processing','Hyderabad sindh, Sindh, Pakistan, Karachi, Sindh, 234235','2025-08-25 02:20:04','2025-08-25 02:20:04','stripe'),
(51,3,'Pending',7800,'processing','Hyderabad sindh, Sindh, Pakistan, Karachi, Sindh, 234235','2025-08-25 02:21:07','2025-08-25 02:21:07','stripe'),
(52,3,'Pending',7800,'processing','Hyderabad sindh, Sindh, Pakistan, Karachi, Sindh, 234235','2025-08-25 02:23:30','2025-08-25 02:23:30','stripe'),
(53,3,'Pending',7800,'processing','Hyderabad sindh, Sindh, Pakistan, Karachi, Sindh, 234235','2025-08-25 02:25:54','2025-08-25 02:25:54','stripe'),
(54,3,'Pending',4680,'processing','Hyderabad sindh, Sindh, Pakistan, Karachi, Sindh, 234235','2025-08-25 02:29:04','2025-08-25 02:29:04','cod'),
(55,3,'Pending',4680,'processing','Hyderabad sindh, Sindh, Pakistan, Karachi, Sindh, 234235','2025-08-25 02:32:26','2025-08-25 02:32:26','cod'),
(56,3,'Pending',4680,'processing','Hyderabad sindh, Sindh, Pakistan, Karachi, Sindh, 234235','2025-08-25 02:33:35','2025-08-25 02:33:35','cod'),
(57,3,'Pending',678,'processing','Hyderabad sindh, Sindh, Pakistan, Karachi, Sindh, 234235','2025-08-25 02:37:36','2025-08-25 02:37:36','stripe'),
(58,3,'Pending',300,'processing','Hyderabad sindh, Sindh, Pakistan, Karachi, Sindh, 234235','2025-08-25 02:56:20','2025-08-25 02:56:20','cod'),
(59,5,'Pending',4680,'processing','Baharia Town Karachi, 160, sindh, 234235','2025-08-25 04:10:09','2025-08-25 04:10:09','stripe'),
(60,5,'Pending',4680,'processing','Baharia Town Karachi, 160, sindh, 234235','2025-08-25 04:10:57','2025-08-25 04:10:57','stripe'),
(61,5,'Pending',4680,'processing','Baharia Town Karachi, 160, sindh, 234235','2025-08-25 04:10:57','2025-08-25 04:10:57','cod'),
(62,5,'Pending',4680,'processing','Baharia Town Karachi, 160, sindh, 234235','2025-08-25 04:10:57','2025-08-25 04:10:57','cod'),
(63,5,'Pending',4680,'processing','Baharia Town Karachi, 160, sindh, 234235','2025-08-25 04:11:33','2025-08-25 04:11:33','cod');

UNLOCK TABLES;

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `stock_quamtitiy` varchar(250) DEFAULT NULL,
  `image_path` varchar(250) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sold_count` varchar(250) DEFAULT '0',
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `products` */

LOCK TABLES `products` WRITE;

insert  into `products`(`product_id`,`category_id`,`product_name`,`description`,`price`,`stock_quamtitiy`,`image_path`,`create_at`,`updated_At`,`sold_count`) values 
(6,1,'Three Piece ','Good',1500,'0','1755087329_wine-checks-3-piece-tuxedo_medium_2.jpg','2025-08-13 05:15:29','2025-08-25 03:01:15','0'),
(7,7,'Lather bag','Lather Bags ',780,'0','1755087501_mens-shoulder-bags-16-600x600.jpg','2025-08-13 05:18:21','2025-08-25 04:10:57','12'),
(8,8,'Stylish Woman Outfit','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',226,'0','1755364993_1.png','2025-08-16 10:23:13','2025-08-25 02:55:34','0'),
(9,8,'Stylish Woman Outfit','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',226,'0','1755365176_2.png','2025-08-16 10:26:16','2025-08-25 02:55:37','0'),
(10,8,'Stylish Woman Outfit','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',226,'8','1755365210_3.png','2025-08-16 10:26:50','2025-08-25 02:55:39','0'),
(11,10,'Stylish Woman Outfit','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',226,'6','1755365355_4.jpg','2025-08-16 10:29:15','2025-08-25 02:55:42','0'),
(12,10,'Stylish Woman Outfit','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',226,'4','1755365380_5.png','2025-08-16 10:29:40','2025-08-25 02:55:44','0'),
(13,11,'Nike Air Max','Experience comfort and style with Nike Air Max — featuring visible Air cushioning and a timeless streetwear design',150,'1','1755498052_nike.png','2025-08-17 23:20:52','2025-08-25 02:56:20','2'),
(14,12,'Umbrella ','Invented thousands of years ago (first in ancient Egypt, China, and Greece).\r\nTwo main types: rain umbrellas (waterproof) and parasols (for shade).\r\nModern umbrellas are often foldable, lightweight, and wind-resistant.',10,'0','1755602099_10.png','2025-08-19 04:14:59','2025-08-25 02:55:57','0');

UNLOCK TABLES;

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL CHECK (`rating` between 1 and 5),
  `review_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`review_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `reviews` */

LOCK TABLES `reviews` WRITE;

UNLOCK TABLES;

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_type` enum('admin','user') DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `role` */

LOCK TABLES `role` WRITE;

insert  into `role`(`role_id`,`role_type`) values 
(1,'admin'),
(2,'user');

UNLOCK TABLES;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

LOCK TABLES `users` WRITE;

insert  into `users`(`user_id`,`role_id`,`first_name`,`middle_name`,`last_name`,`email`,`password_hash`,`phone`,`address`,`city`,`state`,`postal_code`,`country`,`created_at`,`updated_at`,`status`) values 
(1,1,'Rukhsar ','Bilal','Zaidi','rukhsar@gmail.com','$2y$10$FDHzDTJ4tuE/eX5L/2obmuQakPDJzsnR2Ly4Xc5mdv9NvWjWshtP.','00923493232307','Baharia Town Karachi','160','Sindh','234`235','5','2025-08-12 03:54:03','2025-08-16 04:05:12','Inactive'),
(3,1,'Abdul','Azeez','Bhutto','abdulazeezbhutto085@gmail.com','$2y$10$HuNvwxRdCeXBCjPeTVfVdOc8uLYSyRr38mUKeFSGNVNoY1DEzPqnO','+923493232307','Baharia Town Karachi','160','Sindh','234`235','5','2025-08-12 04:13:40','2025-08-16 04:05:01','Active'),
(4,2,'Khumail ','Ali','Shar','khumail@gmail.com','$2y$10$wqYWcESsI/vkP1x7eKgQS.3axHftCVbe8PcMV4c7ZEqiI4sWf5KLa','+923491234567','Hyderabad ','160','Sindh','234235','5','2025-08-19 03:32:58','2025-08-19 03:32:58','Inactive'),
(5,2,'Sunny','Gandhi','Khan','sunny@gmail.com','$2y$10$TYbpcJYz3r6ua77c6gF/XOWmOempqE5dsZzSFmLLUDEypFdtoYIOq','+923491234567','Hyderabad','160','Sindh','234235','5','2025-08-25 04:07:48','2025-08-25 04:07:48','Inactive');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

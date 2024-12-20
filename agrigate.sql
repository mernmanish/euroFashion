-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 05:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrigate`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `news_title` varchar(255) DEFAULT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cuid` int(11) DEFAULT NULL,
  `muid` int(11) DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  `mtime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `cat_id`, `news_title`, `day`, `month`, `image`, `description`, `cuid`, `muid`, `ctime`, `mtime`, `status`) VALUES
(1, 1, 'Which type of food benfit this Seasons', '02', 'February', 'img/blog/Which type of food benfit this Seasons/Which type of food benfit this Seasons-image.jpg', '<p>ddd</p>\r\n', 3, 3, '2023-02-02 23:11:48', '2023-02-02 23:11:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cuid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `ctime` datetime NOT NULL,
  `mtime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `name`, `image`, `cuid`, `muid`, `ctime`, `mtime`, `status`) VALUES
(1, 'Healty Food Benifit', 'img/blog-category/Healty Food Benifit/Healty Food Benifit-image.jpg', 3, 3, '2023-02-02 23:06:56', '2023-02-02 23:06:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cuid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `ctime` datetime DEFAULT NULL,
  `mtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `image`, `cuid`, `muid`, `ctime`, `mtime`, `status`) VALUES
(1, 'Amul', 'img/brand/Amul/Amul2052418357-image.jpg', 11, 11, '2023-01-25 20:31:27', '2023-01-25 19:31:27', 1),
(2, 'Surf Excel', 'img/brand/Surf Excel/Surf Excel1729882573-image.png', 11, 11, '2023-01-25 20:32:27', '2023-01-25 19:32:27', 1),
(3, 'Ashirvad', 'img/brand/Ashirvad/Ashirvad1125685071-image.png', 11, 11, '2023-01-25 20:33:21', '2023-01-25 19:33:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bulk_order`
--

CREATE TABLE `bulk_order` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `fulladdress` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `ctime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `price_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `ctime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mtime` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pro_id`, `price_id`, `quantity`, `user_id`, `ip_address`, `ctime`, `mtime`, `status`) VALUES
(20, 2, 6, 1, 0, '::1', '2023-07-16 16:06:38', '0000-00-00 00:00:00', 1),
(21, 4, 9, 1, 0, '::1', '2023-07-16 16:06:49', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `ctime` datetime NOT NULL,
  `mtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cuid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `banner`, `ctime`, `mtime`, `cuid`, `muid`, `status`) VALUES
(1, 'Fruit With Vegetable', 'img/category/Fruit With Vegetable/Fruit With Vegetable1584395513-image.jpg', 'img/category/Fruit With Vegetable/Fruit With Vegetable1397969041-banner.jpg', '2023-01-25 20:38:11', '2023-01-25 19:38:11', 11, 11, 1),
(2, 'Atta, Rice & Dal', 'img/category/Atta, Rice & Dal/Atta, Rice & Dal1883333181-image.jpg', 'img/category/Atta, Rice & Dal/Atta, Rice & Dal1452495644-banner.jpg', '2023-01-25 20:40:53', '2023-01-25 19:40:53', 11, 11, 1),
(3, 'Cold Drink & Juice', 'img/category/Cold Drink & Juice/Cold Drink & Juice430886349-image.jpg', 'img/category/Cold Drink & Juice/Cold Drink & Juice539770008-banner.jpg', '2023-01-25 20:42:16', '2023-01-25 19:42:16', 11, 11, 1),
(4, 'Snacks & Munchies', 'img/category/Snacks & Munchies/Snacks & Munchies1142429506-image._SL1000_', 'img/category/Snacks & Munchies/Snacks & Munchies1883089143-banner._SL1000_', '2023-01-25 20:44:43', '2023-01-25 19:44:43', 11, 11, 1),
(5, 'Masala, Oil & More', 'img/category/Masala, Oil & More/Masala, Oil & More438857354-image.jpg', 'img/category/Masala, Oil & More/Masala, Oil & More1741461619-banner.jpg', '2023-01-25 20:46:08', '2023-01-25 19:46:08', 11, 11, 1),
(6, 'Bakery & Biscuits', 'img/category/Bakery & Biscuits/Bakery & Biscuits1868491228-image.jpg', 'img/category/Bakery & Biscuits/Bakery & Biscuits1949674721-banner.jpg', '2023-01-25 20:51:06', '2023-01-25 19:51:06', 11, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  `mtime` datetime NOT NULL DEFAULT current_timestamp(),
  `cuid` int(11) DEFAULT NULL,
  `muid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `name`, `image`, `description`, `ctime`, `mtime`, `cuid`, `muid`, `status`) VALUES
(1, 2, 'Patna', '', '', '2023-01-26 00:38:26', '2023-01-26 00:38:26', 11, 11, 1),
(2, 2, 'Gaya', '', '', '2023-01-26 00:38:33', '2023-01-26 00:38:33', 11, 11, 1),
(3, 3, 'Ranchi', '', '', '2023-01-26 00:38:40', '2023-01-26 00:38:40', 11, 11, 1),
(4, 3, 'Hazaribagh', '', '', '2023-01-26 00:38:54', '2023-01-26 00:38:54', 11, 11, 1),
(5, 4, 'New Delhi', '', '', '2023-01-26 00:39:16', '2023-01-26 00:39:16', 11, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `bus_title` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  `mtime` datetime NOT NULL DEFAULT current_timestamp(),
  `cuid` int(11) DEFAULT NULL,
  `muid` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupan`
--

CREATE TABLE `coupan` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `coupan_code` varchar(255) NOT NULL,
  `fix_discount` decimal(5,2) NOT NULL DEFAULT 0.00,
  `coup_val` date NOT NULL,
  `max_value` decimal(5,2) NOT NULL DEFAULT 0.00,
  `cuid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `ctime` datetime NOT NULL,
  `mtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupan`
--

INSERT INTO `coupan` (`id`, `vendor_id`, `coupan_code`, `fix_discount`, `coup_val`, `max_value`, `cuid`, `muid`, `ctime`, `mtime`, `status`) VALUES
(1, 1, 'SHOP50', '25.00', '2023-02-02', '100.00', 3, 3, '2023-02-02 18:07:33', '2023-02-02 17:12:06', 1),
(3, 2, 'SHOP50', '50.00', '2023-02-28', '999.99', 13, 13, '2023-02-08 04:44:03', '2023-02-08 03:44:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `reg_date` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `ref_id` varchar(255) NOT NULL,
  `ref_by` varchar(255) NOT NULL,
  `wallet` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `full_address` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `mtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `street_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` bigint(20) NOT NULL,
  `location_tag` enum('Home','Working','Friend') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Home',
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`id`, `user_id`, `street_address`, `apt`, `landmark`, `state_name`, `pin_code`, `location_tag`, `latitude`, `longitude`, `is_deleted`, `created_at`, `updated_at`) VALUES
(30, 35, 'Ambedkarpath, Baily Road, Patna', 'Rajapath, Apartment', 'Prachin Devi Mandir', ':Bihar', 804402, 'Home', '25.44444', '34.544444', '0', '2023-02-25 20:15:14', '2023-02-25 20:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `inventries_laser`
--

CREATE TABLE `inventries_laser` (
  `id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `order_number` bigint(20) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pin_code` bigint(11) DEFAULT NULL,
  `description` text NOT NULL,
  `ctime` datetime NOT NULL,
  `mtime` datetime NOT NULL DEFAULT current_timestamp(),
  `cuid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `branch_id`, `state_id`, `city_id`, `name`, `pin_code`, `description`, `ctime`, `mtime`, `cuid`, `muid`, `status`) VALUES
(1, 0, 2, 1, 'Boaring Road', 800012, '', '2023-01-26 00:55:14', '2023-01-26 00:55:14', 11, 11, 1),
(2, 0, 2, 2, 'HB Road, Gaya', 824021, '', '2023-01-26 00:56:24', '2023-01-26 00:56:24', 11, 11, 1),
(3, 0, 3, 3, 'Kokar', 8002525, '', '2023-01-26 00:59:27', '2023-01-26 00:59:27', 11, 11, 1),
(4, 0, 4, 5, 'Laxmi Nagar', 800001, '', '2023-01-26 00:59:54', '2023-01-26 00:59:54', 11, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `news_title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cuid` int(11) DEFAULT NULL,
  `muid` int(11) DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  `mtime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cuid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `ctime` datetime NOT NULL,
  `mtime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to` enum('user','all','vendor','locationmanager') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'all',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `to`, `user_id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(0, 'vendor', 1, '1007', 'New order received', NULL, NULL, '2022-12-30 13:13:15', '2022-12-30 13:13:15'),
(1, 'user', 4, '10000000', 'preparing', NULL, NULL, '2022-11-02 12:08:51', '2022-11-02 12:08:51'),
(2, 'user', 4, '10000000', 'preparing', NULL, NULL, '2022-11-02 13:08:33', '2022-11-02 13:08:33'),
(3, 'user', 4, '10000000', 'ready', NULL, NULL, '2022-11-02 13:10:37', '2022-11-02 13:10:37'),
(4, 'user', 4, '10000008', 'new', NULL, NULL, '2022-11-04 12:53:05', '2022-11-04 12:53:05'),
(5, 'user', 4, '10000008', 'preparing', NULL, NULL, '2022-11-04 13:06:51', '2022-11-04 13:06:51'),
(6, 'user', 4, '10000008', 'delivered', NULL, NULL, '2022-11-05 09:57:30', '2022-11-05 09:57:30'),
(7, 'user', 4, '10000000', 'new', NULL, NULL, '2022-11-08 05:25:20', '2022-11-08 05:25:20'),
(8, 'user', 4, '10000000', 'delayed', NULL, NULL, '2022-11-08 05:26:27', '2022-11-08 05:26:27'),
(9, 'user', 4, '10000000', 'delayed', NULL, NULL, '2022-11-08 05:26:50', '2022-11-08 05:26:50'),
(10, 'user', 4, '10000000', 'delayed', NULL, NULL, '2022-11-08 05:44:57', '2022-11-08 05:44:57'),
(11, 'user', 4, '10000000', 'delayed', NULL, NULL, '2022-11-08 05:46:29', '2022-11-08 05:46:29'),
(12, 'user', 4, '10000000', 'delayed', NULL, NULL, '2022-11-08 05:48:29', '2022-11-08 05:48:29'),
(13, 'user', 4, '10000000', 'delayed', NULL, NULL, '2022-11-08 05:50:23', '2022-11-08 05:50:23'),
(14, 'user', 4, '10000001', 'new', NULL, NULL, '2022-11-08 06:26:19', '2022-11-08 06:26:19'),
(15, 'user', 4, '10000000', 'delayed', NULL, NULL, '2022-11-08 06:34:16', '2022-11-08 06:34:16'),
(16, 'user', 4, '10000000', 'delivered', NULL, NULL, '2022-11-08 06:34:28', '2022-11-08 06:34:28'),
(17, 'user', 4, '10000000', 'preparing', NULL, NULL, '2022-11-08 06:35:19', '2022-11-08 06:35:19'),
(18, 'user', 4, '10000000', 'preparing', NULL, NULL, '2022-11-08 06:46:41', '2022-11-08 06:46:41'),
(19, 'user', 4, '10000000', 'delayed', NULL, NULL, '2022-11-09 06:28:20', '2022-11-09 06:28:20'),
(20, 'user', 4, '10000000', 'delayed', NULL, NULL, '2022-11-09 06:30:23', '2022-11-09 06:30:23'),
(21, 'user', 4, '10000001', 'delayed', NULL, NULL, '2022-11-09 06:31:52', '2022-11-09 06:31:52'),
(22, 'user', 4, '10000000', 'preparing', NULL, NULL, '2022-11-09 06:46:02', '2022-11-09 06:46:02'),
(23, 'user', 4, '10000001', 'delayed', NULL, NULL, '2022-11-09 06:48:20', '2022-11-09 06:48:20'),
(24, 'user', 4, '10000000', 'delayed', NULL, NULL, '2022-11-09 06:53:11', '2022-11-09 06:53:11'),
(25, 'user', 4, '10000000', 'preparing', NULL, NULL, '2022-11-09 06:53:44', '2022-11-09 06:53:44'),
(26, 'user', 4, '10000000', 'preparing', NULL, NULL, '2022-11-12 10:55:10', '2022-11-12 10:55:10'),
(27, 'user', 4, '10000000', 'preparing', NULL, NULL, '2022-11-12 10:55:19', '2022-11-12 10:55:19'),
(28, 'user', 4, '10000000', 'preparing', NULL, NULL, '2022-11-12 10:55:48', '2022-11-12 10:55:48'),
(29, 'user', 4, '10000000', 'ready', NULL, NULL, '2022-11-12 10:56:57', '2022-11-12 10:56:57'),
(30, 'user', 4, '10000000', 'preparing', NULL, NULL, '2022-11-12 10:57:00', '2022-11-12 10:57:00'),
(31, 'user', 4, '10000000', 'preparing', NULL, NULL, '2022-11-12 10:57:32', '2022-11-12 10:57:32'),
(32, 'user', 4, '10000000', 'preparing', NULL, NULL, '2022-11-12 10:57:48', '2022-11-12 10:57:48'),
(33, 'user', 4, '10000001', 'preparing', NULL, NULL, '2022-11-12 11:01:00', '2022-11-12 11:01:00'),
(34, 'user', 4, '10000000', 'ready', NULL, NULL, '2022-11-12 11:01:10', '2022-11-12 11:01:10'),
(35, 'user', 4, '10000004', 'preparing', NULL, NULL, '2022-11-12 11:11:05', '2022-11-12 11:11:05'),
(36, 'user', 4, '10000001', 'delayed', NULL, NULL, '2022-11-12 12:30:53', '2022-11-12 12:30:53'),
(39, 'user', 4, '1005', 'ready', NULL, NULL, '2022-11-17 11:14:21', '2022-11-17 11:14:21'),
(40, 'user', 2, '1007', 'New order received', NULL, NULL, '2022-11-17 11:22:11', '2022-11-17 11:22:11'),
(41, 'user', 4, '1000', 'delayed', NULL, NULL, '2022-11-17 12:57:27', '2022-11-17 12:57:27'),
(42, 'user', 4, '1000', 'preparing', NULL, NULL, '2022-11-17 12:57:48', '2022-11-17 12:57:48'),
(43, 'user', 4, '1000', 'dispatched', NULL, NULL, '2022-11-17 12:58:10', '2022-11-17 12:58:10'),
(44, 'user', 1, '1008', 'New order received', NULL, NULL, '2022-11-17 13:37:12', '2022-11-17 13:37:12'),
(45, 'vendor', 1, '1009', 'New order received', NULL, NULL, '2022-11-17 13:39:23', '2022-11-17 13:39:23'),
(46, 'vendor', 1, '1010', 'New order received', NULL, NULL, '2022-11-17 13:42:44', '2022-11-17 13:42:44'),
(47, 'locationmanager', 2, '1014', 'New order received', NULL, NULL, '2022-11-17 13:58:18', '2022-11-17 13:58:18'),
(48, 'locationmanager', 2, '1015', 'New order received', NULL, NULL, '2022-11-17 13:59:26', '2022-11-17 13:59:26'),
(49, 'locationmanager', 2, '1016', 'New order received', NULL, NULL, '2022-11-17 14:00:30', '2022-11-17 14:00:30'),
(50, 'user', 4, '1006', 'ready', NULL, NULL, '2022-11-17 14:01:32', '2022-11-17 14:01:32'),
(51, 'locationmanager', 2, '1017', 'New order received', NULL, NULL, '2022-11-17 14:02:10', '2022-11-17 14:02:10'),
(52, 'locationmanager', 2, '1018', 'New order received', NULL, NULL, '2022-11-17 14:03:17', '2022-11-17 14:03:17'),
(53, 'locationmanager', 2, '1019', 'New order received', NULL, NULL, '2022-11-18 04:54:54', '2022-11-18 04:54:54'),
(54, 'vendor', 1, '1020', 'New order received', NULL, NULL, '2022-11-18 04:56:08', '2022-11-18 04:56:08'),
(55, 'vendor', 1, '1021', 'New order received', NULL, NULL, '2022-11-18 04:56:49', '2022-11-18 04:56:49'),
(56, 'user', 4, '1008', 'preparing', NULL, NULL, '2022-11-18 05:03:04', '2022-11-18 05:03:04'),
(57, 'locationmanager', 2, '1026', 'New order received', NULL, NULL, '2022-11-18 05:48:58', '2022-11-18 05:48:58'),
(58, 'locationmanager', 2, '1027', 'New order received', NULL, NULL, '2022-11-18 05:50:13', '2022-11-18 05:50:13'),
(59, 'user', 4, '1005', 'preparing', NULL, NULL, '2022-11-18 05:51:30', '2022-11-18 05:51:30'),
(60, 'locationmanager', 2, '1028', 'New order received', NULL, NULL, '2022-11-18 05:52:39', '2022-11-18 05:52:39'),
(61, 'locationmanager', 2, '1029', 'New order received', NULL, NULL, '2022-11-18 06:10:48', '2022-11-18 06:10:48'),
(62, 'locationmanager', 2, '1030', 'New order received', NULL, NULL, '2022-11-18 06:11:47', '2022-11-18 06:11:47'),
(63, 'locationmanager', 2, '1031', 'New order received', NULL, NULL, '2022-11-18 06:30:29', '2022-11-18 06:30:29'),
(64, 'locationmanager', 2, '1032', 'New order received', NULL, NULL, '2022-11-18 06:30:50', '2022-11-18 06:30:50'),
(65, 'locationmanager', 2, '1033', 'New order received', NULL, NULL, '2022-11-18 06:31:59', '2022-11-18 06:31:59'),
(66, 'locationmanager', 2, '1034', 'New order received', NULL, NULL, '2022-11-18 06:33:07', '2022-11-18 06:33:07'),
(67, 'user', 4, '1006', 'preparing', NULL, NULL, '2022-11-18 06:33:42', '2022-11-18 06:33:42'),
(68, 'locationmanager', 2, '1036', 'New order received', NULL, NULL, '2022-11-18 06:34:16', '2022-11-18 06:34:16'),
(69, 'locationmanager', 2, '1037', 'New order received', NULL, NULL, '2022-11-18 06:36:31', '2022-11-18 06:36:31'),
(70, 'locationmanager', 2, '1038', 'New order received', NULL, NULL, '2022-11-18 06:37:11', '2022-11-18 06:37:11'),
(71, 'vendor', 1, '1039', 'New order received', NULL, NULL, '2022-11-18 08:47:43', '2022-11-18 08:47:43'),
(72, 'locationmanager', 3, '1040', 'New order received', NULL, NULL, '2022-11-18 08:53:37', '2022-11-18 08:53:37'),
(73, 'locationmanager', 2, '1056', 'New order received', NULL, NULL, '2022-11-18 10:49:47', '2022-11-18 10:49:47'),
(74, 'locationmanager', 3, '1057', 'New order received', NULL, NULL, '2022-11-18 10:50:23', '2022-11-18 10:50:23'),
(75, 'locationmanager', 3, '1058', 'New order received', NULL, NULL, '2022-11-18 10:50:58', '2022-11-18 10:50:58'),
(76, 'vendor', 1, '1059', 'New order received', NULL, NULL, '2022-11-18 10:51:07', '2022-11-18 10:51:07'),
(77, 'locationmanager', 2, '1060', 'New order received', NULL, NULL, '2022-11-18 10:51:26', '2022-11-18 10:51:26'),
(78, 'locationmanager', 2, '1061', 'New order received', NULL, NULL, '2022-11-18 10:52:48', '2022-11-18 10:52:48'),
(79, 'vendor', 1, '1062', 'New order received', NULL, NULL, '2022-11-18 10:53:43', '2022-11-18 10:53:43'),
(80, 'locationmanager', 3, '1063', 'New order received', NULL, NULL, '2022-11-18 10:54:09', '2022-11-18 10:54:09'),
(81, 'locationmanager', 2, '1064', 'New order received', NULL, NULL, '2022-11-18 10:54:17', '2022-11-18 10:54:17'),
(82, 'vendor', 1, '1065', 'New order received', NULL, NULL, '2022-11-18 10:54:24', '2022-11-18 10:54:24'),
(83, 'vendor', 1, '1066', 'New order received', NULL, NULL, '2022-11-18 10:55:06', '2022-11-18 10:55:06'),
(84, 'locationmanager', 3, '1068', 'New order received', NULL, NULL, '2022-11-18 10:56:06', '2022-11-18 10:56:06'),
(85, 'locationmanager', 2, '1070', 'New order received', NULL, NULL, '2022-11-18 10:57:35', '2022-11-18 10:57:35'),
(86, 'locationmanager', 3, '1071', 'New order received', NULL, NULL, '2022-11-18 10:57:47', '2022-11-18 10:57:47'),
(87, 'locationmanager', 3, '1072', 'New order received', NULL, NULL, '2022-11-18 10:58:45', '2022-11-18 10:58:45'),
(88, 'locationmanager', 3, '1073', 'New order received', NULL, NULL, '2022-11-18 10:59:51', '2022-11-18 10:59:51'),
(89, 'locationmanager', 3, '1074', 'New order received', NULL, NULL, '2022-11-18 11:00:11', '2022-11-18 11:00:11'),
(90, 'locationmanager', 3, '1075', 'New order received', NULL, NULL, '2022-11-18 11:17:54', '2022-11-18 11:17:54'),
(91, 'locationmanager', 3, '1076', 'New order received', NULL, NULL, '2022-11-18 11:18:01', '2022-11-18 11:18:01'),
(92, 'locationmanager', 2, '1077', 'New order received', NULL, NULL, '2022-11-18 11:18:08', '2022-11-18 11:18:08'),
(93, 'user', 4, '1008', 'delayed', NULL, NULL, '2022-11-19 15:36:17', '2022-11-19 15:36:17'),
(94, 'user', 4, '1008', 'preparing', NULL, NULL, '2022-11-19 15:38:11', '2022-11-19 15:38:11'),
(95, 'user', 4, '1009', 'delayed', NULL, NULL, '2022-11-23 05:42:59', '2022-11-23 05:42:59'),
(96, 'vendor', 1, '1078', 'New order received', NULL, NULL, '2022-11-23 07:29:02', '2022-11-23 07:29:02'),
(97, 'user', 4, '1009', 'delayed', NULL, NULL, '2022-11-23 08:31:36', '2022-11-23 08:31:36'),
(98, 'user', 4, '1078', 'delayed', NULL, NULL, '2022-11-23 08:46:08', '2022-11-23 08:46:08'),
(99, 'user', 4, '1078', 'delayed', NULL, NULL, '2022-11-23 08:48:19', '2022-11-23 08:48:19'),
(100, 'user', 4, '1078', 'delayed', NULL, NULL, '2022-11-23 08:49:10', '2022-11-23 08:49:10'),
(101, 'vendor', 1, '1079', 'New order received', NULL, NULL, '2022-11-23 09:47:46', '2022-11-23 09:47:46'),
(102, 'user', 4, '1078', 'preparing', NULL, NULL, '2022-11-23 10:41:37', '2022-11-23 10:41:37'),
(103, 'user', 4, '1079', 'preparing', NULL, NULL, '2022-11-23 10:43:56', '2022-11-23 10:43:56'),
(104, 'user', 4, '1078', 'preparing', NULL, NULL, '2022-11-23 10:47:37', '2022-11-23 10:47:37'),
(105, 'user', 4, '1079', 'preparing', NULL, NULL, '2022-11-23 10:49:40', '2022-11-23 10:49:40'),
(106, 'user', 4, '1078', 'preparing', NULL, NULL, '2022-11-23 10:54:26', '2022-11-23 10:54:26'),
(107, 'user', 4, '1079', 'preparing', NULL, NULL, '2022-11-23 10:55:50', '2022-11-23 10:55:50'),
(108, 'user', 4, '1078', 'preparing', NULL, NULL, '2022-11-23 10:58:36', '2022-11-23 10:58:36'),
(109, 'vendor', 1, '1080', 'New order received', NULL, NULL, '2022-11-23 12:07:11', '2022-11-23 12:07:11'),
(110, 'vendor', 1, '1081', 'New order received', NULL, NULL, '2022-11-23 12:08:17', '2022-11-23 12:08:17'),
(111, 'user', 4, '1078', 'preparing', NULL, NULL, '2022-11-23 12:08:40', '2022-11-23 12:08:40'),
(112, 'user', 4, '1079', 'preparing', NULL, NULL, '2022-11-23 12:08:47', '2022-11-23 12:08:47'),
(113, 'user', 4, '1081', 'delayed', NULL, NULL, '2022-11-23 12:10:47', '2022-11-23 12:10:47'),
(114, 'user', 4, '1081', 'preparing', NULL, NULL, '2022-11-23 12:11:02', '2022-11-23 12:11:02'),
(115, 'user', 4, '1080', 'delayed', NULL, NULL, '2022-11-23 13:50:28', '2022-11-23 13:50:28'),
(116, 'vendor', 1, '1082', 'New order received', NULL, NULL, '2022-11-23 13:54:18', '2022-11-23 13:54:18'),
(117, 'user', 4, '1079', 'preparing', NULL, NULL, '2022-11-23 14:23:45', '2022-11-23 14:23:45'),
(118, 'vendor', 1, '1083', 'New order received', NULL, NULL, '2022-11-23 14:24:25', '2022-11-23 14:24:25'),
(119, 'user', 4, '1083', 'preparing', NULL, NULL, '2022-11-23 14:26:12', '2022-11-23 14:26:12'),
(120, 'vendor', 1, '1084', 'New order received', NULL, NULL, '2022-11-23 14:26:56', '2022-11-23 14:26:56'),
(121, 'vendor', 1, '1085', 'New order received', NULL, NULL, '2022-11-23 16:21:53', '2022-11-23 16:21:53'),
(122, 'vendor', 1, '1086', 'New order received', NULL, NULL, '2022-11-23 16:22:00', '2022-11-23 16:22:00'),
(123, 'user', 4, '1086', 'preparing', NULL, NULL, '2022-11-23 16:25:51', '2022-11-23 16:25:51'),
(124, 'user', 4, '1084', 'delayed', NULL, NULL, '2022-11-23 16:26:35', '2022-11-23 16:26:35'),
(125, 'user', 4, '1084', 'delayed', NULL, NULL, '2022-11-23 16:31:24', '2022-11-23 16:31:24'),
(126, 'user', 4, '1086', 'ready', NULL, NULL, '2022-11-23 16:32:41', '2022-11-23 16:32:41'),
(127, 'vendor', 1, '1087', 'New order received', NULL, NULL, '2022-11-23 16:36:55', '2022-11-23 16:36:55'),
(128, 'vendor', 1, '1088', 'New order received', NULL, NULL, '2022-11-23 16:37:06', '2022-11-23 16:37:06'),
(129, 'user', 4, '1084', 'preparing', NULL, NULL, '2022-11-23 16:39:10', '2022-11-23 16:39:10'),
(130, 'user', 4, '1085', 'delayed', NULL, NULL, '2022-11-23 16:42:41', '2022-11-23 16:42:41'),
(131, 'user', 4, '1088', 'preparing', NULL, NULL, '2022-11-23 16:43:02', '2022-11-23 16:43:02'),
(132, 'user', 4, '1085', 'preparing', NULL, NULL, '2022-11-23 16:54:03', '2022-11-23 16:54:03'),
(133, 'vendor', 1, '1089', 'New order received', NULL, NULL, '2022-11-23 16:54:36', '2022-11-23 16:54:36'),
(134, 'vendor', 1, '1090', 'New order received', NULL, NULL, '2022-11-23 16:54:38', '2022-11-23 16:54:38'),
(135, 'user', 4, '1089', 'delayed', NULL, NULL, '2022-11-23 16:58:59', '2022-11-23 16:58:59'),
(136, 'user', 4, '1090', 'preparing', NULL, NULL, '2022-11-23 16:59:13', '2022-11-23 16:59:13'),
(137, 'vendor', 1, '1091', 'New order received', NULL, NULL, '2022-11-24 05:41:07', '2022-11-24 05:41:07'),
(138, 'vendor', 1, '1092', 'New order received', NULL, NULL, '2022-11-24 05:41:16', '2022-11-24 05:41:16'),
(139, 'user', 4, '1092', 'delayed', NULL, NULL, '2022-11-24 05:41:44', '2022-11-24 05:41:44'),
(140, 'vendor', 1, '1093', 'New order received', NULL, NULL, '2022-11-24 05:42:05', '2022-11-24 05:42:05'),
(141, 'user', 4, '1093', 'delayed', NULL, NULL, '2022-11-24 05:51:06', '2022-11-24 05:51:06'),
(142, 'user', 4, '1092', 'preparing', NULL, NULL, '2022-11-24 05:53:28', '2022-11-24 05:53:28'),
(143, 'user', 4, '1093', 'preparing', NULL, NULL, '2022-11-24 05:54:17', '2022-11-24 05:54:17'),
(144, 'user', 4, '1010', 'delivered', NULL, NULL, '2022-11-24 13:13:49', '2022-11-24 13:13:49'),
(145, 'user', 4, '1000', 'delayed', NULL, NULL, '2022-11-24 13:16:57', '2022-11-24 13:16:57'),
(146, 'vendor', 1, '1094', 'New order received', NULL, NULL, '2022-11-24 13:22:15', '2022-11-24 13:22:15'),
(147, 'vendor', 1, '1095', 'New order received', NULL, NULL, '2022-12-02 12:28:19', '2022-12-02 12:28:19'),
(148, 'user', 4, '1095', 'preparing', NULL, NULL, '2022-12-02 12:37:12', '2022-12-02 12:37:12'),
(149, 'vendor', 1, '1096', 'New order received', NULL, NULL, '2022-12-02 12:38:54', '2022-12-02 12:38:54'),
(150, 'user', 4, '1095', 'delayed', NULL, NULL, '2022-12-02 13:22:11', '2022-12-02 13:22:11'),
(151, 'user', 4, '1096', 'preparing', NULL, NULL, '2022-12-02 13:31:46', '2022-12-02 13:31:46'),
(152, 'vendor', 1, '1097', 'New order received', NULL, NULL, '2022-12-02 13:55:42', '2022-12-02 13:55:42'),
(153, 'user', 4, '1097', 'preparing', NULL, NULL, '2022-12-02 13:56:48', '2022-12-02 13:56:48'),
(154, 'user', 4, '1097', 'delayed', NULL, NULL, '2022-12-02 13:59:16', '2022-12-02 13:59:16'),
(155, 'vendor', 1, '1098', 'New order received', NULL, NULL, '2022-12-02 14:02:14', '2022-12-02 14:02:14'),
(156, 'vendor', 1, '1099', 'New order received', NULL, NULL, '2022-12-05 17:36:40', '2022-12-05 17:36:40'),
(157, 'user', 4, '1099', 'preparing', NULL, NULL, '2022-12-05 17:38:21', '2022-12-05 17:38:21'),
(158, 'user', 4, '1099', 'delayed', NULL, NULL, '2022-12-05 17:39:23', '2022-12-05 17:39:23'),
(159, 'vendor', 1, '1100', 'New order received', NULL, NULL, '2022-12-09 15:11:03', '2022-12-09 15:11:03'),
(160, 'vendor', 1, '1101', 'New order received', NULL, NULL, '2022-12-09 15:25:38', '2022-12-09 15:25:38'),
(161, 'vendor', 1, '1101', 'New order received', NULL, NULL, '2022-12-09 15:26:21', '2022-12-09 15:26:21'),
(162, 'vendor', 1, '1102', 'New order received', NULL, NULL, '2022-12-09 15:26:35', '2022-12-09 15:26:35'),
(163, 'vendor', 1, '1103', 'New order received', NULL, NULL, '2022-12-09 15:26:53', '2022-12-09 15:26:53'),
(164, 'user', 4, '1103', 'preparing', NULL, NULL, '2022-12-09 15:34:49', '2022-12-09 15:34:49'),
(165, 'user', 4, '1103', 'delayed', NULL, NULL, '2022-12-09 15:35:12', '2022-12-09 15:35:12'),
(166, 'user', 4, '1103', 'delayed', NULL, NULL, '2022-12-09 15:42:37', '2022-12-09 15:42:37'),
(167, 'user', 4, '1101', 'preparing', NULL, NULL, '2022-12-09 15:42:58', '2022-12-09 15:42:58'),
(168, 'user', 4, '1101', 'delayed', NULL, NULL, '2022-12-09 15:43:15', '2022-12-09 15:43:15'),
(169, 'user', 4, '1101', 'ready', NULL, NULL, '2022-12-09 15:43:30', '2022-12-09 15:43:30'),
(170, 'user', 4, '1102', 'preparing', NULL, NULL, '2022-12-09 15:45:12', '2022-12-09 15:45:12'),
(171, 'user', 4, '1102', 'delayed', NULL, NULL, '2022-12-09 15:45:41', '2022-12-09 15:45:41'),
(172, 'vendor', 1, '1104', 'New order received', NULL, NULL, '2022-12-12 05:42:52', '2022-12-12 05:42:52'),
(173, 'user', 4, '1104', 'preparing', NULL, NULL, '2022-12-12 05:43:01', '2022-12-12 05:43:01'),
(174, 'user', 4, '1104', 'delayed', NULL, NULL, '2022-12-12 06:44:11', '2022-12-12 06:44:11'),
(175, 'user', 4, '1104', 'delayed', NULL, NULL, '2022-12-12 13:04:51', '2022-12-12 13:04:51'),
(176, 'user', 4, '1104', 'dispatched', NULL, NULL, '2022-12-12 13:05:22', '2022-12-12 13:05:22'),
(177, 'locationmanager', 19, '1105', 'New order received', NULL, NULL, '2022-12-13 08:45:11', '2022-12-13 08:45:11'),
(178, 'vendor', 1, '1106', 'New order received', NULL, NULL, '2022-12-13 08:47:40', '2022-12-13 08:47:40'),
(179, 'vendor', 1, '1107', 'New order received', NULL, NULL, '2022-12-13 08:47:52', '2022-12-13 08:47:52'),
(180, 'user', 4, '1107', 'preparing', NULL, NULL, '2022-12-13 08:48:03', '2022-12-13 08:48:03'),
(181, 'user', 4, '1107', 'delayed', NULL, NULL, '2022-12-13 08:52:03', '2022-12-13 08:52:03'),
(182, 'vendor', 1, '1000', 'New order received', NULL, NULL, '2022-12-13 11:29:30', '2022-12-13 11:29:30'),
(183, 'vendor', 1, '1001', 'New order received', NULL, NULL, '2022-12-13 11:30:26', '2022-12-13 11:30:26'),
(184, 'vendor', 1, '1002', 'New order received', NULL, NULL, '2022-12-13 12:33:29', '2022-12-13 12:33:29'),
(185, 'vendor', 1, '1003', 'New order received', NULL, NULL, '2022-12-14 05:22:30', '2022-12-14 05:22:30'),
(186, 'vendor', 1, '1004', 'New order received', NULL, NULL, '2022-12-14 05:22:59', '2022-12-14 05:22:59'),
(187, 'vendor', 1, '1005', 'New order received', NULL, NULL, '2022-12-14 09:19:58', '2022-12-14 09:19:58'),
(188, 'vendor', 1, '1006', 'New order received', NULL, NULL, '2022-12-15 05:30:35', '2022-12-15 05:30:35'),
(189, 'vendor', 1, '1007', 'New order received', NULL, NULL, '2022-12-15 05:33:10', '2022-12-15 05:33:10'),
(190, 'vendor', 1, '1008', 'New order received', NULL, NULL, '2022-12-15 06:40:33', '2022-12-15 06:40:33'),
(191, 'vendor', 1, '1009', 'New order received', NULL, NULL, '2022-12-15 06:40:43', '2022-12-15 06:40:43'),
(192, 'vendor', 1, '1010', 'New order received', NULL, NULL, '2022-12-15 06:40:56', '2022-12-15 06:40:56'),
(193, 'locationmanager', 4, '1011', 'New order received', NULL, NULL, '2022-12-15 09:59:21', '2022-12-15 09:59:21'),
(194, 'vendor', 1, '1012', 'New order received', NULL, NULL, '2022-12-15 11:09:15', '2022-12-15 11:09:15'),
(195, 'vendor', 1, '1013', 'New order received', NULL, NULL, '2022-12-15 11:11:41', '2022-12-15 11:11:41'),
(196, 'vendor', 1, '1014', 'New order received', NULL, NULL, '2022-12-15 13:39:01', '2022-12-15 13:39:01'),
(197, 'vendor', 1, '1015', 'New order received', NULL, NULL, '2022-12-15 13:44:59', '2022-12-15 13:44:59'),
(198, 'vendor', 1, '1016', 'New order received', NULL, NULL, '2022-12-15 14:36:20', '2022-12-15 14:36:20'),
(199, 'vendor', 1, '1017', 'New order received', NULL, NULL, '2022-12-15 15:40:03', '2022-12-15 15:40:03'),
(200, 'vendor', 1, '1018', 'New order received', NULL, NULL, '2022-12-16 04:56:37', '2022-12-16 04:56:37'),
(201, 'vendor', 1, '1019', 'New order received', NULL, NULL, '2022-12-16 05:46:45', '2022-12-16 05:46:45'),
(202, 'vendor', 1, '1020', 'New order received', NULL, NULL, '2022-12-16 07:02:52', '2022-12-16 07:02:52'),
(203, 'vendor', 1, '1021', 'New order received', NULL, NULL, '2022-12-16 07:02:53', '2022-12-16 07:02:53'),
(204, 'vendor', 1, '1022', 'New order received', NULL, NULL, '2022-12-16 07:02:56', '2022-12-16 07:02:56'),
(205, 'vendor', 1, '1023', 'New order received', NULL, NULL, '2022-12-16 09:01:12', '2022-12-16 09:01:12'),
(206, 'vendor', 1, '1024', 'New order received', NULL, NULL, '2022-12-16 09:01:50', '2022-12-16 09:01:50'),
(207, 'vendor', 1, '1025', 'New order received', NULL, NULL, '2022-12-16 09:31:11', '2022-12-16 09:31:11'),
(208, 'vendor', 1, '1026', 'New order received', NULL, NULL, '2022-12-16 10:46:22', '2022-12-16 10:46:22'),
(209, 'vendor', 1, '1027', 'New order received', NULL, NULL, '2022-12-16 11:10:56', '2022-12-16 11:10:56'),
(210, 'vendor', 1, '1028', 'New order received', NULL, NULL, '2022-12-16 11:25:19', '2022-12-16 11:25:19'),
(211, 'vendor', 1, '1000', 'New order received', NULL, NULL, '2022-12-16 14:18:05', '2022-12-16 14:18:05'),
(212, 'vendor', 1, '1002', 'New order received', NULL, NULL, '2022-12-16 14:57:34', '2022-12-16 14:57:34'),
(213, 'vendor', 1, '1003', 'New order received', NULL, NULL, '2022-12-16 14:59:06', '2022-12-16 14:59:06'),
(214, 'vendor', 1, '1004', 'New order received', NULL, NULL, '2022-12-16 15:41:02', '2022-12-16 15:41:02'),
(215, 'vendor', 1, '1005', 'New order received', NULL, NULL, '2022-12-16 15:42:34', '2022-12-16 15:42:34'),
(216, 'vendor', 1, '1006', 'New order received', NULL, NULL, '2022-12-16 15:43:50', '2022-12-16 15:43:50'),
(217, 'vendor', 1, '1007', 'New order received', NULL, NULL, '2022-12-16 15:44:40', '2022-12-16 15:44:40'),
(218, 'vendor', 1, '1008', 'New order received', NULL, NULL, '2022-12-16 15:55:43', '2022-12-16 15:55:43'),
(219, 'vendor', 1, '1009', 'New order received', NULL, NULL, '2022-12-16 15:58:46', '2022-12-16 15:58:46'),
(220, 'vendor', 1, '1010', 'New order received', NULL, NULL, '2022-12-16 16:01:10', '2022-12-16 16:01:10'),
(221, 'vendor', 1, '1011', 'New order received', NULL, NULL, '2022-12-16 16:03:59', '2022-12-16 16:03:59'),
(222, 'vendor', 1, '1012', 'New order received', NULL, NULL, '2022-12-17 05:55:31', '2022-12-17 05:55:31'),
(223, 'vendor', 1, '1013', 'New order received', NULL, NULL, '2022-12-19 05:44:10', '2022-12-19 05:44:10'),
(224, 'vendor', 1, '1014', 'New order received', NULL, NULL, '2022-12-19 05:59:33', '2022-12-19 05:59:33'),
(225, 'vendor', 1, '1015', 'New order received', NULL, NULL, '2022-12-19 05:59:49', '2022-12-19 05:59:49'),
(226, 'vendor', 1, '1016', 'New order received', NULL, NULL, '2022-12-19 06:00:09', '2022-12-19 06:00:09'),
(227, 'vendor', 1, '1018', 'New order received', NULL, NULL, '2022-12-21 05:55:11', '2022-12-21 05:55:11'),
(228, 'vendor', 1, '1019', 'New order received', NULL, NULL, '2022-12-21 05:56:25', '2022-12-21 05:56:25'),
(229, 'vendor', 1, '1020', 'New order received', NULL, NULL, '2022-12-21 05:57:27', '2022-12-21 05:57:27'),
(230, 'vendor', 1, '1021', 'New order received', NULL, NULL, '2022-12-21 13:54:40', '2022-12-21 13:54:40'),
(231, 'vendor', 1, '1022', 'New order received', NULL, NULL, '2022-12-22 04:58:55', '2022-12-22 04:58:55'),
(232, 'vendor', 1, '1023', 'New order received', NULL, NULL, '2022-12-22 05:13:02', '2022-12-22 05:13:02'),
(233, 'vendor', 1, '1024', 'New order received', NULL, NULL, '2022-12-22 06:50:11', '2022-12-22 06:50:11'),
(234, 'vendor', 1, '1025', 'New order received', NULL, NULL, '2022-12-22 06:51:21', '2022-12-22 06:51:21'),
(235, 'vendor', 1, '1026', 'New order received', NULL, NULL, '2022-12-22 08:43:48', '2022-12-22 08:43:48'),
(236, 'vendor', 1, '1027', 'New order received', NULL, NULL, '2022-12-22 09:35:08', '2022-12-22 09:35:08'),
(237, 'vendor', 1, '1028', 'New order received', NULL, NULL, '2022-12-22 11:24:26', '2022-12-22 11:24:26'),
(238, 'vendor', 1, '1029', 'New order received', NULL, NULL, '2022-12-22 11:24:55', '2022-12-22 11:24:55'),
(239, 'vendor', 1, '1030', 'New order received', NULL, NULL, '2022-12-22 11:26:16', '2022-12-22 11:26:16'),
(240, 'vendor', 1, '1031', 'New order received', NULL, NULL, '2022-12-22 11:29:07', '2022-12-22 11:29:07'),
(241, 'vendor', 1, '1032', 'New order received', NULL, NULL, '2022-12-22 12:34:16', '2022-12-22 12:34:16'),
(242, 'vendor', 1, '1033', 'New order received', NULL, NULL, '2022-12-22 12:34:23', '2022-12-22 12:34:23'),
(243, 'vendor', 1, '1034', 'New order received', NULL, NULL, '2022-12-22 12:34:39', '2022-12-22 12:34:39'),
(244, 'vendor', 1, '1035', 'New order received', NULL, NULL, '2022-12-22 12:39:03', '2022-12-22 12:39:03'),
(245, 'vendor', 1, '1036', 'New order received', NULL, NULL, '2022-12-22 12:49:01', '2022-12-22 12:49:01'),
(246, 'vendor', 1, '1037', 'New order received', NULL, NULL, '2022-12-22 12:54:12', '2022-12-22 12:54:12'),
(247, 'vendor', 1, '1038', 'New order received', NULL, NULL, '2022-12-22 12:56:12', '2022-12-22 12:56:12'),
(248, 'vendor', 1, '1039', 'New order received', NULL, NULL, '2022-12-22 12:56:28', '2022-12-22 12:56:28'),
(249, 'vendor', 1, '1040', 'New order received', NULL, NULL, '2022-12-22 12:56:39', '2022-12-22 12:56:39'),
(250, 'vendor', 1, '1041', 'New order received', NULL, NULL, '2022-12-22 13:00:11', '2022-12-22 13:00:11'),
(251, 'vendor', 1, '1042', 'New order received', NULL, NULL, '2022-12-22 13:03:57', '2022-12-22 13:03:57'),
(252, 'vendor', 1, '1043', 'New order received', NULL, NULL, '2022-12-22 13:04:59', '2022-12-22 13:04:59'),
(253, 'vendor', 1, '1044', 'New order received', NULL, NULL, '2022-12-22 13:05:05', '2022-12-22 13:05:05'),
(254, 'vendor', 1, '1045', 'New order received', NULL, NULL, '2022-12-22 14:11:12', '2022-12-22 14:11:12'),
(255, 'vendor', 1, '1046', 'New order received', NULL, NULL, '2022-12-22 14:12:47', '2022-12-22 14:12:47'),
(256, 'vendor', 1, '1047', 'New order received', NULL, NULL, '2022-12-23 04:55:07', '2022-12-23 04:55:07'),
(257, 'vendor', 1, '1048', 'New order received', NULL, NULL, '2022-12-23 04:55:23', '2022-12-23 04:55:23'),
(258, 'vendor', 1, '1049', 'New order received', NULL, NULL, '2022-12-23 04:55:38', '2022-12-23 04:55:38'),
(259, 'vendor', 1, '1050', 'New order received', NULL, NULL, '2022-12-23 05:03:57', '2022-12-23 05:03:57'),
(260, 'vendor', 1, '1051', 'New order received', NULL, NULL, '2022-12-23 05:04:12', '2022-12-23 05:04:12'),
(261, 'vendor', 1, '1052', 'New order received', NULL, NULL, '2022-12-23 06:18:04', '2022-12-23 06:18:04'),
(262, 'vendor', 1, '1053', 'New order received', NULL, NULL, '2022-12-23 06:19:35', '2022-12-23 06:19:35'),
(263, 'vendor', 1, '1054', 'New order received', NULL, NULL, '2022-12-23 06:19:51', '2022-12-23 06:19:51'),
(264, 'vendor', 1, '1055', 'New order received', NULL, NULL, '2022-12-23 06:30:42', '2022-12-23 06:30:42'),
(265, 'vendor', 1, '1056', 'New order received', NULL, NULL, '2022-12-23 11:12:16', '2022-12-23 11:12:16'),
(266, 'vendor', 1, '1057', 'New order received', NULL, NULL, '2022-12-23 13:22:57', '2022-12-23 13:22:57'),
(267, 'vendor', 1, '1058', 'New order received', NULL, NULL, '2022-12-24 05:55:12', '2022-12-24 05:55:12'),
(268, 'vendor', 1, '1059', 'New order received', NULL, NULL, '2022-12-24 06:35:17', '2022-12-24 06:35:17'),
(269, 'vendor', 1, '1060', 'New order received', NULL, NULL, '2022-12-24 06:40:21', '2022-12-24 06:40:21'),
(270, 'vendor', 1, '1061', 'New order received', NULL, NULL, '2022-12-24 07:04:17', '2022-12-24 07:04:17'),
(271, 'vendor', 1, '1062', 'New order received', NULL, NULL, '2022-12-24 08:58:05', '2022-12-24 08:58:05'),
(272, 'vendor', 1, '1063', 'New order received', NULL, NULL, '2022-12-24 09:00:10', '2022-12-24 09:00:10'),
(273, 'vendor', 1, '1064', 'New order received', NULL, NULL, '2022-12-24 13:31:03', '2022-12-24 13:31:03'),
(274, 'vendor', 1, '1065', 'New order received', NULL, NULL, '2022-12-24 13:41:32', '2022-12-24 13:41:32'),
(275, 'vendor', 1, '1066', 'New order received', NULL, NULL, '2022-12-24 14:00:50', '2022-12-24 14:00:50'),
(276, 'vendor', 1, '1067', 'New order received', NULL, NULL, '2022-12-24 14:01:28', '2022-12-24 14:01:28'),
(277, 'vendor', 1, '1068', 'New order received', NULL, NULL, '2022-12-24 14:04:13', '2022-12-24 14:04:13'),
(278, 'vendor', 1, '1069', 'New order received', NULL, NULL, '2022-12-26 05:14:52', '2022-12-26 05:14:52'),
(279, 'vendor', 1, '1070', 'New order received', NULL, NULL, '2022-12-26 05:22:29', '2022-12-26 05:22:29'),
(280, 'vendor', 1, '1071', 'New order received', NULL, NULL, '2022-12-26 05:28:48', '2022-12-26 05:28:48'),
(281, 'vendor', 1, '1072', 'New order received', NULL, NULL, '2022-12-26 05:29:46', '2022-12-26 05:29:46'),
(282, 'vendor', 1, '1073', 'New order received', NULL, NULL, '2022-12-26 06:13:45', '2022-12-26 06:13:45'),
(283, 'vendor', 1, '1074', 'New order received', NULL, NULL, '2022-12-26 06:13:59', '2022-12-26 06:13:59'),
(284, 'vendor', 1, '1075', 'New order received', NULL, NULL, '2022-12-26 06:14:19', '2022-12-26 06:14:19'),
(285, 'vendor', 1, '1076', 'New order received', NULL, NULL, '2022-12-26 06:14:32', '2022-12-26 06:14:32'),
(286, 'vendor', 1, '1077', 'New order received', NULL, NULL, '2022-12-26 06:26:40', '2022-12-26 06:26:40'),
(287, 'vendor', 1, '1078', 'New order received', NULL, NULL, '2022-12-26 10:56:28', '2022-12-26 10:56:28'),
(288, 'vendor', 1, '1079', 'New order received', NULL, NULL, '2022-12-26 10:56:57', '2022-12-26 10:56:57'),
(289, 'vendor', 1, '1080', 'New order received', NULL, NULL, '2022-12-26 14:33:20', '2022-12-26 14:33:20'),
(290, 'vendor', 1, '1081', 'New order received', NULL, NULL, '2022-12-26 14:48:28', '2022-12-26 14:48:28'),
(291, 'vendor', 1, '1082', 'New order received', NULL, NULL, '2022-12-26 14:50:13', '2022-12-26 14:50:13'),
(292, 'vendor', 1, '1083', 'New order received', NULL, NULL, '2022-12-26 15:11:59', '2022-12-26 15:11:59'),
(293, 'vendor', 1, '1084', 'New order received', NULL, NULL, '2022-12-26 15:12:13', '2022-12-26 15:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `offer_title` varchar(255) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `discount` decimal(5,2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `details` text NOT NULL,
  `cuid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `ctime` datetime NOT NULL,
  `mtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `offer_title`, `pro_id`, `discount`, `image`, `start_date`, `end_date`, `details`, `cuid`, `muid`, `ctime`, `mtime`, `status`) VALUES
(4, 'Sed qui voluptatum e', 2, '10.00', 'img/offer/Sed qui voluptatum e/Sed qui voluptatum e415380126-image.jpg', '2023-04-10', '2023-05-20', 'Et nobis quis deleni', 3, 3, '2023-02-02 23:41:53', '2023-04-12 02:50:01', 1),
(5, 'Sed qui voluptatum e', 1, '10.00', 'img/offer/Sed qui voluptatum e/Sed qui voluptatum e265496436-image.jpg', '2023-04-14', '2023-05-25', 'Et nobis quis deleni', 3, 3, '2023-02-02 23:41:53', '2023-04-12 02:50:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `order_number` bigint(20) NOT NULL,
  `payment_status` enum('pending','done') NOT NULL DEFAULT 'pending',
  `coupan_amount` decimal(5,2) DEFAULT 0.00,
  `wallet_amount` decimal(5,2) DEFAULT 0.00,
  `order_value` decimal(5,2) NOT NULL DEFAULT 0.00,
  `shipping_charge` decimal(5,2) NOT NULL DEFAULT 0.00,
  `payment_mode` enum('online','cod') NOT NULL DEFAULT 'cod',
  `order_message` text DEFAULT NULL,
  `status` enum('new','pending','accepted','declined','canceled','delivered','outofdelivery') NOT NULL DEFAULT 'new',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cust_id`, `address_id`, `order_number`, `payment_status`, `coupan_amount`, `wallet_amount`, `order_value`, `shipping_charge`, `payment_mode`, `order_message`, `status`, `created_at`, `updated_at`) VALUES
(1, 35, 30, 1000, 'pending', '0.00', '0.00', '301.00', '50.00', 'cod', 'Please Pack with carefully', 'delivered', '2023-02-26 00:21:37', '2023-02-26 00:21:37'),
(2, 35, 30, 1001, 'pending', '0.00', '0.00', '537.00', '0.00', 'cod', 'Please Pack with carefully', 'accepted', '2023-02-26 00:22:32', '2023-02-26 00:22:32'),
(3, 35, 30, 1002, 'pending', '0.00', '0.00', '537.00', '0.00', 'cod', 'Please Pack with carefully', 'declined', '2023-02-26 00:35:16', '2023-02-26 00:35:16'),
(4, 35, 30, 1003, 'pending', '0.00', '0.00', '418.00', '50.00', 'cod', 'Please Pack with carefully', 'pending', '2023-04-15 08:41:05', '2023-04-15 08:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_chat`
--

CREATE TABLE `order_chat` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_chat`
--

INSERT INTO `order_chat` (`id`, `order_id`, `message`, `sender_id`, `receiver_id`, `created_at`, `updated_at`) VALUES
(1, 4, 'Please Pack with carefully...', 35, 0, '2023-07-22 01:44:30', '2023-07-21 20:15:51'),
(2, 4, 'yes sir, we will better surve', 0, 35, '2023-07-22 02:55:30', '2023-07-21 20:51:51'),
(3, 4, 'Thank you sir', 35, 0, '2023-07-22 02:55:30', '2023-07-21 20:51:51'),
(4, 4, 'It\'s My Plessure..', 0, 35, '0000-00-00 00:00:00', '2023-07-22 19:34:26'),
(5, 4, 'hello sir..', 0, 35, '0000-00-00 00:00:00', '2023-07-22 19:34:42'),
(6, 4, 'Yes i got it..', 35, 0, '0000-00-00 00:00:00', '2023-07-22 19:35:33'),
(7, 2, 'hello', 0, 35, '0000-00-00 00:00:00', '2023-07-22 20:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` smallint(5) UNSIGNED DEFAULT NULL,
  `order_number` bigint(20) UNSIGNED NOT NULL,
  `pro_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(5,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `vendor_id`, `order_number`, `pro_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(11, 1, 1000, 1, 5, '13.00', '2023-02-26 00:21:37', '2023-02-26 00:21:37'),
(12, 6, 1000, 2, 2, '118.00', '2023-02-26 00:21:37', '2023-02-26 00:21:37'),
(13, 6, 1001, 2, 4, '118.00', '2023-02-26 00:22:32', '2023-02-26 00:22:32'),
(14, 1, 1001, 4, 5, '13.00', '2023-02-26 00:22:32', '2023-02-26 00:22:32'),
(15, 1, 1002, 1, 5, '13.00', '2023-02-26 00:35:16', '2023-02-26 00:35:16'),
(16, 6, 1002, 4, 4, '118.00', '2023-02-26 00:35:16', '2023-02-26 00:35:16'),
(17, 6, 1003, 2, 1, '300.00', '2023-04-15 08:41:05', '2023-04-15 08:41:05'),
(18, 6, 1003, 1, 1, '118.00', '2023-04-15 08:41:05', '2023-04-15 08:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` int(11) NOT NULL,
  `order_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cust_id` int(11) NOT NULL,
  `payment_status` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ctime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku_no` varchar(255) DEFAULT NULL,
  `brandid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `stock_type` varchar(255) NOT NULL,
  `sale_type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `second_image` varchar(255) NOT NULL,
  `gallery` varchar(255) NOT NULL,
  `cuid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `ctime` datetime NOT NULL,
  `mtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `vendor_id`, `name`, `sku_no`, `brandid`, `categoryid`, `short_description`, `description`, `stock_type`, `sale_type`, `image`, `second_image`, `gallery`, `cuid`, `muid`, `ctime`, `mtime`, `status`) VALUES
(1, 2, 'Ashirvad Atta ', NULL, 3, 2, 'In est et eu itaque', '', 'in_stock', 'New', 'img/product/Neil Moss/Neil Moss925498834-image.jpg', 'img/product/Neil Moss/Neil Moss543131490-second_image.jpg', 'img/product/Neil Moss/61tuupIbRqL._SL1000_.jpg,img/product/Neil Moss/FRUIT DRINK  JUICE-600x315.jpg', 3, 3, '2023-01-29 18:34:56', '2023-02-17 04:02:04', 'active'),
(2, 3, 'Pepsi Cold Drink', NULL, 1, 3, 'Aut non necessitatib', '<p>sdfsd</p>\r\n', 'in_stock', 'seasonal', 'img/product/Amul Dahi/Amul Dahi974900709-image.jpg', 'img/product/Amul Dahi/Amul Dahi382680025-second_image.jpg', 'img/product/Amul Dahi/FRUIT DRINK  JUICE-600x315.jpg,img/product/Amul Dahi/download (1).jpg', 3, 36, '2023-01-29 19:26:32', '2023-07-20 19:06:42', 'active'),
(4, 2, 'Justin Mendoza', NULL, 2, 2, 'Dolores quod quam om', '<p>sdfsd</p>\r\n', 'in_stock', 'Discount', 'img/product/Justin Mendoza/Justin Mendoza2128156646-image.jpg', 'img/product/Justin Mendoza/Justin Mendoza439618331-second_image.jpg', 'img/product/Justin Mendoza/1030-pho.jpg,img/product/Justin Mendoza/1031-phowithchiness.jpg', 13, 36, '2023-02-08 04:33:58', '2023-02-17 18:35:23', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `product_inventries`
--

CREATE TABLE `product_inventries` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `total_add_in_stock` bigint(20) NOT NULL DEFAULT 0,
  `in_stock_item` bigint(20) NOT NULL DEFAULT 0,
  `out_of_stock` bigint(20) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_inventries`
--

INSERT INTO `product_inventries` (`id`, `pro_id`, `total_add_in_stock`, `in_stock_item`, `out_of_stock`, `created_at`, `updated_at`) VALUES
(2, 5, 37, 37, 0, '2023-02-17 18:04:31', '2023-02-17 18:37:42'),
(3, 4, 10, 10, 0, '2023-02-17 19:37:23', '2023-02-17 18:37:23'),
(6, 6, 150, 150, 0, '2023-02-20 18:07:15', '2023-02-20 17:07:15'),
(7, 1, 10, 10, 0, '2023-06-09 04:53:06', '2023-06-09 02:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_price`
--

CREATE TABLE `product_price` (
  `id` int(11) NOT NULL,
  `pricerange` varchar(255) NOT NULL,
  `pricefrom` int(10) NOT NULL,
  `priceto` int(11) NOT NULL,
  `cuid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `ctime` datetime NOT NULL,
  `mtime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_price`
--

INSERT INTO `product_price` (`id`, `pricerange`, `pricefrom`, `priceto`, `cuid`, `muid`, `ctime`, `mtime`, `status`) VALUES
(1, '1 To 10', 0, 10, 11, 3, '2023-01-25 20:58:21', '2023-01-26 01:28:21', 1),
(2, '11 To 20', 11, 20, 11, 3, '2023-01-25 20:58:33', '2023-01-26 01:28:33', 1),
(3, '21 To 30', 21, 30, 11, 3, '2023-01-25 20:58:45', '2023-01-26 01:28:45', 1),
(4, '31 To 50', 31, 50, 11, 3, '2023-01-25 20:58:58', '2023-01-26 01:28:58', 1),
(5, '51 To 100', 51, 100, 11, 3, '2023-01-25 20:59:10', '2023-01-26 01:29:10', 1),
(6, '101 To 200', 101, 200, 11, 3, '2023-01-25 20:59:20', '2023-01-26 01:29:20', 1),
(7, '201 To 500', 201, 500, 11, 3, '2023-01-25 20:59:34', '2023-01-26 01:29:34', 1),
(8, '501 To 1000', 501, 1000, 11, 3, '2023-01-25 21:00:19', '2023-01-26 01:30:19', 1),
(9, '1001 To 2000', 1001, 2000, 11, 3, '2023-01-25 21:00:30', '2023-01-26 01:30:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_variation`
--

CREATE TABLE `product_variation` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `sale_price` decimal(5,2) NOT NULL,
  `price_id` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `ctime` datetime NOT NULL,
  `mtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_variation`
--

INSERT INTO `product_variation` (`id`, `pro_id`, `unit_id`, `size_id`, `price`, `sale_price`, `price_id`, `status`, `ctime`, `mtime`) VALUES
(1, 1, 1, 5, '14.00', '13.00', 7, 'active', '2023-01-29 18:34:56', '2023-01-29 17:34:56'),
(2, 1, 3, 13, '5.00', '4.50', 3, 'active', '2023-01-29 18:34:56', '2023-01-29 17:34:56'),
(5, 1, 5, 1, '30.00', '20.50', 2, 'active', '2023-01-29 19:23:11', '2023-01-29 18:23:11'),
(6, 2, 2, 14, '20.00', '18.00', 3, 'active', '2023-01-29 19:26:32', '2023-01-29 18:26:32'),
(7, 2, 1, 7, '110.00', '98.00', 5, 'active', '2023-01-29 19:26:32', '2023-01-29 18:26:32'),
(8, 3, 2, 14, '54.00', '48.00', 5, 'active', '2023-02-08 04:28:54', '2023-02-08 03:28:54'),
(9, 4, 1, 8, '418.00', '343.00', 1, 'active', '2023-02-08 04:33:58', '2023-02-08 03:33:58'),
(10, 5, 1, 8, '334.00', '300.00', 2, 'active', '2023-02-17 18:04:31', '2023-02-17 17:04:31'),
(11, 6, 5, 3, '120.00', '118.00', 6, 'active', '2023-02-20 18:07:15', '2023-02-20 17:07:15'),
(12, 6, 2, 14, '25.00', '24.00', 3, 'active', '2023-02-20 18:07:15', '2023-02-20 17:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id` int(11) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `ctime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `unitid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cuid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `ctime` datetime NOT NULL,
  `mtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `unitid`, `name`, `cuid`, `muid`, `ctime`, `mtime`, `status`) VALUES
(1, 5, '100 Gram', 11, 11, '2023-01-25 20:52:58', '2023-01-25 19:52:58', 1),
(2, 5, '200 Gram', 11, 11, '2023-01-25 20:53:09', '2023-01-25 19:53:09', 1),
(3, 5, '250 Gram', 11, 11, '2023-01-25 20:53:20', '2023-01-25 19:53:20', 1),
(4, 5, '500 Gram', 11, 11, '2023-01-25 20:53:30', '2023-01-25 19:53:30', 1),
(5, 1, '1 KG', 11, 11, '2023-01-25 20:53:37', '2023-01-25 19:53:37', 1),
(6, 1, '2 KG', 11, 11, '2023-01-25 20:53:45', '2023-01-25 19:53:45', 1),
(7, 1, '2.5 KG', 11, 11, '2023-01-25 20:53:53', '2023-01-25 19:53:53', 1),
(8, 1, '5 KG', 11, 11, '2023-01-25 20:54:01', '2023-01-25 19:54:01', 1),
(9, 4, '1 Packet', 11, 11, '2023-01-25 20:54:12', '2023-01-25 19:54:12', 1),
(10, 4, '2 Packet', 11, 11, '2023-01-25 20:54:21', '2023-01-25 19:54:21', 1),
(11, 4, '5 Packet', 11, 11, '2023-01-25 20:54:31', '2023-01-25 19:54:31', 1),
(12, 3, '1/2 Dozen', 11, 11, '2023-01-25 20:54:41', '2023-01-25 19:54:41', 1),
(13, 3, '1 Dozen', 11, 11, '2023-01-25 20:54:48', '2023-01-25 19:54:48', 1),
(14, 2, '1 Pec', 11, 11, '2023-01-25 20:55:03', '2023-01-25 19:55:03', 1),
(15, 2, '2 Pec', 11, 11, '2023-01-25 20:55:19', '2023-01-25 19:55:19', 1),
(16, 2, '5 Pec', 11, 11, '2023-01-25 20:55:35', '2023-01-25 19:55:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `bottom_title` varchar(255) NOT NULL,
  `url_link` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cuid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `ctime` datetime NOT NULL,
  `mtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `pro_id`, `title`, `sub_title`, `bottom_title`, `url_link`, `position`, `image`, `cuid`, `muid`, `ctime`, `mtime`, `status`) VALUES
(7, 1, 'Nostrud veniam exce', 'Et vel quae ipsam si', '', 'https://www.rufemy.com.au', 'top', 'img/slider/Nostrud veniam exce/Nostrud veniam exce18865233-slider.jpeg', 3, 3, '2023-07-21 00:16:47', '2023-07-20 18:46:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  `mtime` datetime NOT NULL DEFAULT current_timestamp(),
  `cuid` int(11) DEFAULT NULL,
  `muid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `image`, `description`, `ctime`, `mtime`, `cuid`, `muid`, `status`) VALUES
(2, 'Bihar', '', '', '2023-01-26 00:35:42', '2023-01-26 00:35:42', 11, 11, 1),
(3, 'Jharkhand', '', '', '2023-01-26 00:35:48', '2023-01-26 00:35:48', 11, 11, 1),
(4, 'New Delhi', '', '', '2023-01-26 00:35:56', '2023-01-26 00:35:56', 11, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `support_center`
--

CREATE TABLE `support_center` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `file` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `ctime` datetime NOT NULL,
  `mtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cuid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `taxslab`
--

CREATE TABLE `taxslab` (
  `id` int(11) NOT NULL,
  `slabname` varchar(255) NOT NULL,
  `cgst` int(11) NOT NULL,
  `sgst` int(11) NOT NULL,
  `igst` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `cust_name` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `cuid` int(11) DEFAULT NULL,
  `muid` int(11) DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  `mtime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `cust_name`, `rating`, `image`, `message`, `cuid`, `muid`, `ctime`, `mtime`, `status`) VALUES
(1, 'Alec Stanton', 5, 'img/Testimonial/Alec Stanton/Alec Stanton1214578120-image.37', 'Repellendus Similiq', 3, 3, '2023-02-02 23:15:31', '2023-02-02 23:15:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cuid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `ctime` datetime NOT NULL,
  `mtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `cuid`, `muid`, `ctime`, `mtime`, `status`) VALUES
(1, 'KG', 11, 11, '2023-01-25 20:51:16', '2023-01-25 19:51:16', 1),
(2, 'Pec', 11, 11, '2023-01-25 20:51:20', '2023-01-25 19:51:20', 1),
(3, 'Dozen', 11, 11, '2023-01-25 20:51:29', '2023-01-25 19:51:29', 1),
(4, 'Packet', 11, 11, '2023-01-25 20:51:37', '2023-01-25 19:51:37', 1),
(5, 'Gram', 11, 11, '2023-01-25 20:51:41', '2023-01-25 19:51:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` enum('superadmin','admin','vendor','customer') NOT NULL DEFAULT 'customer',
  `userid` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `fcm_token` varchar(255) DEFAULT NULL,
  `cuid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `ctime` datetime DEFAULT NULL,
  `mtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email_id`, `mobile`, `image`, `password`, `usertype`, `userid`, `p_id`, `api_token`, `fcm_token`, `cuid`, `muid`, `ctime`, `mtime`, `status`) VALUES
(3, 'Adminstration', 'agricultureprotect@gmail.com', 9122390660, '', 'e10adc3949ba59abbe56e057f20f883e', 'superadmin', 0, 0, '', NULL, 1, 3, '2021-07-31 19:24:06', '2023-02-05 17:32:27', 'active'),
(35, 'Rahul Kumar', 'rahul@gmail.com', 7488072389, '', 'e10adc3949ba59abbe56e057f20f883e', 'customer', 0, 0, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySUQiOjM1LCJpYXQiOjE2ODM3NDMyMzIsImV4cCI6MTcxNTI3OTIzMn0.5gl19hRGtbOTB93VjiwJ4HSZcqz03w0oqAEru-3_1kg', NULL, 0, 0, '2023-02-12 04:57:06', '2023-05-10 18:27:12', 'active'),
(36, 'Blair Leach', 'blair@gmail.com', 9122390661, '', 'e10adc3949ba59abbe56e057f20f883e', 'vendor', 2, 0, '', NULL, 0, 0, '2023-02-12 04:57:06', '2023-02-17 18:17:55', 'active'),
(37, 'Rahul Kumar', 'rahul@gmail.com', 7488072388, '', 'e10adc3949ba59abbe56e057f20f883e', 'customer', 0, 0, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySUQiOjM3LCJpYXQiOjE2ODAyNzM3MzcsImV4cCI6MTcxMTgwOTczN30.N7IlPeU_ZQBqnfbjoPcwuBReUSgv2761WifO6achPrs', NULL, 0, 0, '2023-03-31 14:42:17', '2023-03-31 14:42:18', 'active'),
(38, 'Rahul Kumar', 'rahul@gmail.com', 7488072555, '', 'e10adc3949ba59abbe56e057f20f883e', 'customer', 0, 0, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySUQiOjM4LCJpYXQiOjE2ODA1MTc2NDksImV4cCI6MTcxMjA1MzY0OX0.9Ks-vsf2MeGg15ZeWxEd3ZsS71sEm2ZUeOMQCynm9JE', NULL, 0, 0, '2023-04-03 10:27:29', '2023-04-03 10:27:29', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_cities`
--

CREATE TABLE `user_cities` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cities`
--

INSERT INTO `user_cities` (`id`, `user_id`, `city_id`, `created_at`, `updated_at`) VALUES
(4, 35, 1, '2023-02-19 19:03:40', '2023-02-19 19:03:40'),
(5, 35, 1, '2023-04-12 19:58:40', '2023-04-12 19:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_coupan`
--

CREATE TABLE `user_coupan` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `coupan_id` int(11) NOT NULL,
  `ctime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_otps`
--

CREATE TABLE `user_otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `otp` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_otps`
--

INSERT INTO `user_otps` (`id`, `mobile`, `otp`, `created_at`, `updated_at`) VALUES
(91, 7488072389, '123456', '2023-02-11 16:52:41', '2023-05-10 18:13:09'),
(92, 7488072388, '123456', '2023-03-31 14:41:32', '2023-03-31 14:41:32'),
(93, 7488072555, '123456', '2023-04-03 10:26:48', '2023-04-03 10:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `aadhar` varchar(255) DEFAULT NULL,
  `pancard` varchar(255) DEFAULT NULL,
  `emg_no` varchar(255) NOT NULL,
  `full_address` varchar(255) NOT NULL,
  `cuid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `ctime` datetime NOT NULL,
  `mtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `email_id`, `mobile`, `state_id`, `city_id`, `pin_code`, `image`, `aadhar`, `pancard`, `emg_no`, `full_address`, `cuid`, `muid`, `ctime`, `mtime`, `status`) VALUES
(2, 'Blair Leach', 'xykagan@mailinator.com', '9122390661', 2, 1, 804402, '', '', NULL, '7488072389', 'Nihil reprehenderit ', 3, 13, '2023-02-05 18:36:28', '2023-02-08 04:03:48', 'active'),
(3, 'Isaiah jackson', 'dared@mailinator.com', '1282536956', 3, 3, 5555555, 'img/vendor/Isaiah Cote/Isaiah Cote710322306-image.png', '', NULL, '7987987987', 'Quasi ut quae eos o,ranchi', 3, 3, '2023-02-20 18:03:26', '2023-02-20 17:07:49', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulk_order`
--
ALTER TABLE `bulk_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `price_id` (`price_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupan`
--
ALTER TABLE `coupan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventries_laser`
--
ALTER TABLE `inventries_laser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_number` (`order_number`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_chat`
--
ALTER TABLE `order_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `order_number` (`order_number`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `categoryid` (`categoryid`),
  ADD KEY `brandid` (`brandid`);

--
-- Indexes for table `product_inventries`
--
ALTER TABLE `product_inventries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `product_price`
--
ALTER TABLE `product_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variation`
--
ALTER TABLE `product_variation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_center`
--
ALTER TABLE `support_center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxslab`
--
ALTER TABLE `taxslab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `user_cities`
--
ALTER TABLE `user_cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_coupan`
--
ALTER TABLE `user_coupan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_otps`
--
ALTER TABLE `user_otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bulk_order`
--
ALTER TABLE `bulk_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupan`
--
ALTER TABLE `coupan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `inventries_laser`
--
ALTER TABLE `inventries_laser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_chat`
--
ALTER TABLE `order_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `product_inventries`
--
ALTER TABLE `product_inventries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_price`
--
ALTER TABLE `product_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_variation`
--
ALTER TABLE `product_variation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `support_center`
--
ALTER TABLE `support_center`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxslab`
--
ALTER TABLE `taxslab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_cities`
--
ALTER TABLE `user_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_coupan`
--
ALTER TABLE `user_coupan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_otps`
--
ALTER TABLE `user_otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

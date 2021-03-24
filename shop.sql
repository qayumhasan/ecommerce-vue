-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 11:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `our_mission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `our_vission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `about_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `about_text`, `our_mission`, `our_vission`, `image`, `is_deleted`, `about_status`, `created_at`, `updated_at`) VALUES
(1, '<p><strong>Kinenin Shop</strong> is an online grocery, foods, medicine shop where you can get all your daily necessary products a affordable price and in a very short time on your doorstep. It follows its policies strictly.</p>', '<p><strong>Kinenin Shop</strong> is an online grocery, foods, medicine shop where you can get all your daily necessary products a affordable price and in a very short time on your doorstep. It follows its policies strictly.</p>', '<p><strong>Kinenin Shop</strong> is an online grocery, foods, medicine shop where you can get all your daily necessary products a affordable price and in a very short time on your doorstep. It follows its policies strictly.</p>', '__1607144611.png', 0, 1, NULL, '2020-12-05 12:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` int(11) NOT NULL DEFAULT 1,
  `google` int(11) NOT NULL DEFAULT 1,
  `smtp` int(11) NOT NULL DEFAULT 1,
  `cashondelevery` int(11) NOT NULL DEFAULT 1,
  `paypal` int(11) NOT NULL DEFAULT 1,
  `stripe` int(11) NOT NULL DEFAULT 1,
  `ssl_commercez` int(11) NOT NULL DEFAULT 1,
  `sms` int(11) NOT NULL DEFAULT 1,
  `surjopay` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `facebook`, `google`, `smtp`, `cashondelevery`, `paypal`, `stripe`, `ssl_commercez`, `sms`, `surjopay`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 0, 0, 0, 1, 0, 1, NULL, '2020-10-09 01:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `add_to_carts`
--

CREATE TABLE `add_to_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type` int(11) DEFAULT NULL,
  `grug_type` int(11) DEFAULT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ptodacttotalprice` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_to_carts`
--

INSERT INTO `add_to_carts` (`id`, `user_ip`, `product_id`, `product_name`, `qty`, `sku`, `product_price`, `product_type`, `grug_type`, `discount_price`, `ptodacttotalprice`, `image`, `created_at`, `updated_at`) VALUES
(898, '27.147.205.219', '393', 'Maxpro 40 Tablet', '1', '1130100044', '90.00', 2, 1, '0', '90.00', 'th_1610435182.jpg', NULL, NULL),
(899, '27.147.205.219', '392', 'Maxpro 20 Tablet', '1', '1130100043', '98.00', 2, 1, '0', '196', 'th_1610435035.png', NULL, '2021-03-09 10:29:01'),
(900, '27.147.205.219', '391', 'Tusca Plus Syrup', '1', '1130300012', '80.00', 2, 1, '0', '80.00', 'th_1610433852.jpg', NULL, NULL),
(901, '27.147.205.219', '390', 'Oradin  Tablet', '1', '1130100049', '40.00', 2, 1, '0', '40.00', 'th_1610433025.jpg', NULL, NULL),
(902, '27.147.205.219', '387', 'Xorel 20 Tablet', '1', '1130100050', '30.00', 2, 1, '0', '60', 'th_1610431933.jpg', NULL, '2021-01-14 15:25:25'),
(903, '27.147.205.219', '388', 'Xorel 20 Capsule', '1', '1130200027', '40.00', 2, 1, '0', '40.00', 'th_1610432199.jpg', NULL, NULL),
(904, '27.147.205.219', '389', 'Napa Extra  Tablet', '1', '1130100020', '15.00', 2, 1, '0', '15.00', 'th_1610432727.jpg', NULL, NULL),
(905, '27.147.205.219', '395', 'Maxpro 40 Capsule', '1', '1130200026', '100.00', 2, 1, '0', '100.00', 'th_1610435642.jpg', NULL, NULL),
(906, '27.147.205.219', '394', 'Maxpro 20 Capsule', '1', '1130200025', '98.00', 2, 1, '0', '98.00', 'th_1610435364.png', NULL, NULL),
(908, '202.134.10.137', '390', 'Oradin  Tablet', '0', '1130100049', '40.00', 2, 1, '0', '40.00', 'th_1610433025.jpg', NULL, NULL),
(909, '202.134.10.137', '396', 'Losectil 20 Oral Powder', '1', '1050500030', '6.00', 2, 1, '0', '6.00', 'th_1610435815.jpg', NULL, NULL),
(913, '103.139.8.7', '388', 'Xorel 20 Capsule', '1', '1130200027', '40.00', 2, 1, '0', '40.00', 'th_1610432199.jpg', NULL, NULL),
(914, '103.139.8.7', '369', 'Ispahani Mirzapore Best Leaf Tea', '1', '1050200052', '230.00', 1, 1, '0', '230.00', 'th_1610295985.jpg', NULL, NULL),
(915, '103.139.8.7', '328', 'Eno Sachet 5g', '0', '1050500002', '15.00', 1, 1, '0', '15.00', 'th_1610272694.jpeg', NULL, NULL),
(918, '103.112.54.241', '358', 'Mojo', '1', '1050400078', '16.00', 1, 1, '0', '16.00', 'th_1610282935.jpg', NULL, NULL),
(919, '27.147.205.221', '331', 'Teer Soybean Oil 5Liter', '1', '1060500092', '615.00', 1, 1, '0', '615.00', 'th_1610273534.jpg', NULL, NULL),
(920, '27.147.205.221', '330', 'Teer Soybean Oil 2Liter', '1', '1060500091', '252.00', 1, 1, '0', '252.00', 'th_1610273410.jpg', NULL, NULL),
(921, '58.145.185.242', '371', 'Taaza Brooke Bond Tea Poly', '1', '1050200066', '100.00', 1, 1, '0', '100.00', 'th_1610296411.jpg', NULL, NULL),
(922, '58.145.185.242', '370', 'Taaza Brooke Bond Tea Poly', '1', '1050200067', '199.00', 1, 1, '0', '199.00', 'th_1610296221.jpg', NULL, NULL),
(926, '77.229.10.89', '396', 'Losectil 20 Oral Powder', '1', '1050500030', '6.00', 2, 1, '0', '6.00', 'th_1610435815.jpg', NULL, NULL),
(927, '77.229.10.89', '395', 'Maxpro 40 Capsule', '1', '1130200026', '100.00', 2, 1, '0', '100.00', 'th_1610435642.jpg', NULL, NULL),
(928, '198.16.74.205', '387', 'Xorel 20 Tablet', '1', '1130100050', '30.00', 2, 1, '0', '30.00', 'th_1610431933.jpg', NULL, NULL),
(940, '103.139.8.6', '349', 'Seclo 20 Capsule', '1', '1130200009', '60.00', 2, 1, '0', '60.00', 'th_1610280846.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `extra` int(11) DEFAULT NULL,
  `product` int(11) DEFAULT NULL,
  `ecommerce_setup` int(11) DEFAULT NULL,
  `reports` int(11) DEFAULT NULL,
  `pending_order` int(11) DEFAULT NULL,
  `process_order` int(11) DEFAULT NULL,
  `on_delevery` int(11) DEFAULT NULL,
  `reject_order` int(11) DEFAULT NULL,
  `messaging` int(11) DEFAULT NULL,
  `frontend_setup` int(11) DEFAULT NULL,
  `flash_deal` int(11) DEFAULT NULL,
  `courier_setting` int(11) DEFAULT NULL,
  `settings` int(11) DEFAULT NULL,
  `blog` int(11) DEFAULT NULL,
  `customer` int(11) DEFAULT NULL,
  `trash` int(11) DEFAULT NULL,
  `is_superadmin` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `avatar`, `verification_code`, `address`, `email_verified_at`, `password`, `type`, `category`, `user`, `extra`, `product`, `ecommerce_setup`, `reports`, `pending_order`, `process_order`, `on_delevery`, `reject_order`, `messaging`, `frontend_setup`, `flash_deal`, `courier_setting`, `settings`, `blog`, `customer`, `trash`, `is_superadmin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Nur Uddin lol', '01730595', 'admin@gmail.com', '__1605007688.png', '2547', 'Dhaka mirpur 1tttert', NULL, '$2y$10$4dVRpdfoVgHNJffr35dQ8ekGW/PFEcELEL5Q6.9v8lxvpHUflngxO', 'SUPER ADMIN', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'hE9gs9rFl28IeoH1yq8FK2ky27OB86JDNP8fiUyLMqXbzYMc1sMJ5X3gW4Yj', NULL, '2020-12-15 16:35:07'),
(10, 'Jahidul Islam', '01743741806', 'mdsaykat8205@gmail.com', '', NULL, NULL, NULL, '$2y$10$/AMw.6mvW5HEts9YaAAqQ.Zn644j1HPr24JLitwVC97W1HAgOyA1i', 'Admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, NULL, '2021-01-10 16:32:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ban_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ban_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_id` int(11) DEFAULT NULL,
  `ban_status` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `ban_link`, `ban_image`, `text`, `description`, `theme_id`, `ban_status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(57, '##', 'th_1605676839.jpg', NULL, NULL, 6, 1, 0, '2020-11-18 12:20:39', '2020-11-18 12:20:39'),
(58, '##', 'th_1605678494.jpg', NULL, NULL, 6, 1, 0, '2020-11-18 12:48:14', '2020-11-18 12:48:14'),
(59, '#', 'th_1610027249.jpg', NULL, NULL, 1, 1, 0, '2021-01-07 20:47:30', '2021-01-07 20:47:30'),
(60, '#', 'th_1610032305.jpg', NULL, NULL, 1, 1, 0, '2021-01-07 22:11:45', '2021-01-07 22:11:45'),
(63, '#', 'th_1610036741.jpg', NULL, NULL, 1, 1, 0, '2021-01-07 23:25:41', '2021-01-07 23:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `meta_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `replyhost` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `brand_status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(31, 'Nestle', 'brand_1603120749.png', 1, 0, '2020-10-19 22:19:09', '2020-10-19 22:19:09'),
(32, 'Aarong', 'brand_1603130601.png', 1, 0, '2020-10-20 01:03:21', '2020-10-20 01:03:21'),
(33, 'Aci', 'brand_1603130620.png', 1, 0, '2020-10-20 01:03:40', '2020-10-20 01:03:40'),
(34, 'Akij Group', 'brand_1603130640.png', 1, 0, '2020-10-20 01:04:00', '2020-10-20 01:04:01'),
(35, 'Amul', 'brand_1603130657.png', 1, 0, '2020-10-20 01:04:17', '2020-10-20 01:04:17'),
(36, 'Bashundhara', 'brand_1603130668.png', 1, 0, '2020-10-20 01:04:28', '2020-10-20 01:04:28'),
(37, 'Bengal', 'brand_1603130689.png', 1, 0, '2020-10-20 01:04:49', '2020-10-20 01:04:49'),
(38, 'Biomil', 'brand_1603130709.png', 1, 0, '2020-10-20 01:05:09', '2020-10-20 01:05:09'),
(39, 'Boost', 'brand_1603130727.png', 1, 0, '2020-10-20 01:05:27', '2020-10-20 01:05:27'),
(40, 'Boroplus', 'brand_1603168525.png', 1, 0, '2020-10-20 11:35:25', '2020-10-20 11:35:25'),
(41, 'Center Fruit', 'brand_1603168603.png', 1, 0, '2020-10-20 11:36:43', '2020-10-20 11:36:43'),
(42, 'Chu Chu', 'brand_1603168725.png', 1, 0, '2020-10-20 11:38:45', '2020-10-20 11:38:45'),
(43, 'Clean & Clear', 'brand_1603168816.png', 1, 0, '2020-10-20 11:40:16', '2020-10-20 11:40:16'),
(44, 'Click', 'brand_1603168860.png', 1, 0, '2020-10-20 11:41:00', '2020-10-20 11:41:00'),
(45, 'Cocacola', 'brand_1603169040.png', 1, 0, '2020-10-20 11:44:00', '2020-10-20 11:44:00'),
(46, 'Cocola', 'brand_1603169102.png', 1, 0, '2020-10-20 11:45:02', '2020-10-20 11:45:02'),
(47, 'Colgate', 'brand_1603169157.png', 1, 0, '2020-10-20 11:45:57', '2020-10-20 11:45:57'),
(48, 'Complan', 'brand_1603169201.png', 1, 0, '2020-10-20 11:46:41', '2020-10-20 11:46:41'),
(49, 'Cute', 'brand_1603169231.png', 1, 0, '2020-10-20 11:47:11', '2020-10-20 11:47:11'),
(50, 'Dabur', 'brand_1603169290.png', 1, 0, '2020-10-20 11:48:10', '2020-10-20 11:48:10'),
(51, 'Dan Cake', 'brand_1603169339.png', 1, 0, '2020-10-20 11:48:59', '2020-10-20 11:48:59'),
(52, 'Danish', 'brand_1603169380.png', 1, 0, '2020-10-20 11:49:40', '2020-10-20 11:49:40'),
(53, 'Dano', 'brand_1603169457.png', 1, 0, '2020-10-20 11:50:57', '2020-10-20 11:50:57'),
(54, 'Dettol', 'brand_1603169498.png', 1, 0, '2020-10-20 11:51:38', '2020-10-20 11:51:38'),
(55, 'Diploma', 'brand_1603169548.png', 1, 0, '2020-10-20 11:52:28', '2020-10-20 11:52:28'),
(56, 'Doodles', 'brand_1603169593.png', 1, 0, '2020-10-20 11:53:13', '2020-10-20 11:53:13'),
(57, 'Eno', 'brand_1603169633.png', 1, 0, '2020-10-20 11:53:53', '2020-10-20 11:53:53'),
(58, 'Farm Fresh', 'brand_1603169701.png', 1, 0, '2020-10-20 11:55:01', '2020-10-20 11:55:01'),
(59, 'Fasska', 'brand_1603169744.png', 1, 0, '2020-10-20 11:55:44', '2020-10-20 11:55:44'),
(60, 'Fogg', 'brand_1603169784.png', 1, 0, '2020-10-20 11:56:24', '2020-10-20 11:56:24'),
(61, 'Fresh', 'brand_1603169830.png', 1, 0, '2020-10-20 11:57:10', '2020-10-20 11:57:10'),
(62, 'Gillette', 'brand_1603169883.png', 1, 0, '2020-10-20 11:58:03', '2020-10-20 11:58:03'),
(63, 'Godrej', 'brand_1603169936.png', 1, 0, '2020-10-20 11:58:56', '2020-10-20 11:58:56'),
(64, 'Gsk', 'brand_1603169992.png', 1, 0, '2020-10-20 11:59:52', '2020-10-20 11:59:52'),
(65, 'Haircode', 'brand_1603170039.png', 1, 0, '2020-10-20 12:00:39', '2020-10-20 12:00:39'),
(66, 'Hajmola', 'brand_1603170082.png', 1, 0, '2020-10-20 12:01:22', '2020-10-20 12:01:22'),
(67, 'Haque', 'brand_1603170131.png', 1, 0, '2020-10-20 12:02:11', '2020-10-20 12:02:11'),
(68, 'Harpic', 'brand_1603170173.png', 1, 0, '2020-10-20 12:02:53', '2020-10-20 12:02:53'),
(69, 'Head & Shoulders', 'brand_1603170222.png', 1, 0, '2020-10-20 12:03:42', '2020-10-20 12:03:42'),
(70, 'Himalaya', 'brand_1603170269.png', 1, 0, '2020-10-20 12:04:29', '2020-10-20 12:04:29'),
(71, 'Huggies', 'brand_1603170370.png', 1, 0, '2020-10-20 12:06:10', '2020-10-20 12:06:10'),
(72, 'Ispahani', 'brand_1603170426.png', 1, 0, '2020-10-20 12:07:06', '2020-10-20 12:07:06'),
(73, 'Ispi', 'brand_1603170483.png', 1, 0, '2020-10-20 12:08:03', '2020-10-20 12:08:03'),
(74, 'Johnson', 'brand_1603170542.png', 1, 0, '2020-10-20 12:09:02', '2020-10-20 12:09:02'),
(75, 'Jui', 'brand_1603170601.png', 1, 0, '2020-10-20 12:10:01', '2020-10-20 12:10:01'),
(76, 'Kelloggs', 'brand_1603170656.png', 1, 0, '2020-10-20 12:10:56', '2020-10-20 12:10:56'),
(77, 'Keya', 'brand_1603170728.png', 1, 0, '2020-10-20 12:12:08', '2020-10-20 12:12:08'),
(78, 'Kinder Joy', 'brand_1603170785.png', 1, 0, '2020-10-20 12:13:05', '2020-10-20 12:13:05'),
(79, 'Kishwan', 'brand_1603170835.png', 1, 0, '2020-10-20 12:13:55', '2020-10-20 12:13:55'),
(80, 'Kolson', 'brand_1603170891.png', 1, 0, '2020-10-20 12:14:51', '2020-10-20 12:14:51'),
(81, 'kumarika', 'brand_1603170982.png', 1, 0, '2020-10-20 12:16:22', '2020-10-20 12:16:22'),
(82, 'Kurkure', 'brand_1603171037.png', 1, 0, '2020-10-20 12:17:17', '2020-10-20 12:17:17'),
(83, 'Lays', 'brand_1603171082.png', 1, 0, '2020-10-20 12:18:02', '2020-10-20 12:18:02'),
(84, 'Mama', 'brand_1603171128.png', 1, 0, '2020-10-20 12:18:48', '2020-10-20 12:18:48'),
(85, 'Marks', 'brand_1603171163.png', 1, 0, '2020-10-20 12:19:23', '2020-10-20 12:19:23'),
(86, 'Matador', 'brand_1603171283.png', 1, 0, '2020-10-20 12:21:23', '2020-10-20 12:21:23'),
(87, 'Medi plus', 'brand_1603171332.png', 1, 0, '2020-10-20 12:22:12', '2020-10-20 12:22:12'),
(88, 'Newcare', 'brand_1603171379.png', 1, 0, '2020-10-20 12:22:59', '2020-10-20 12:22:59'),
(89, 'Nivea', 'brand_1603171441.png', 1, 0, '2020-10-20 12:24:01', '2020-10-20 12:24:01'),
(90, 'No.1', 'brand_1603171602.png', 1, 0, '2020-10-20 12:26:42', '2020-10-20 12:26:42'),
(91, 'Nocilla', 'brand_1603171650.png', 1, 0, '2020-10-20 12:27:30', '2020-10-20 12:27:30'),
(92, 'Odonil', 'brand_1603171697.png', 1, 0, '2020-10-20 12:28:17', '2020-10-20 12:28:17'),
(93, 'Olympic', 'brand_1603171745.png', 1, 0, '2020-10-20 12:29:05', '2020-10-20 12:29:05'),
(94, 'Oral-B', 'brand_1603171801.png', 1, 0, '2020-10-20 12:30:01', '2020-10-20 12:30:01'),
(95, 'Panpers', 'brand_1603171857.png', 1, 0, '2020-10-20 12:30:57', '2020-10-20 12:30:57'),
(96, 'Pantene', 'brand_1603171907.png', 1, 0, '2020-10-20 12:31:47', '2020-10-20 12:31:47'),
(97, 'Parachute', 'brand_1603171953.png', 1, 0, '2020-10-20 12:32:33', '2020-10-20 12:32:33'),
(98, 'Pepsi', 'brand_1603171996.png', 1, 0, '2020-10-20 12:33:16', '2020-10-20 12:33:16'),
(99, 'Pran', 'brand_1603172038.png', 1, 0, '2020-10-20 12:33:58', '2020-10-20 12:33:58'),
(100, 'Prima', 'brand_1603172079.png', 1, 0, '2020-10-20 12:34:39', '2020-10-20 12:34:39'),
(101, 'Prince', 'brand_1603172285.png', 1, 0, '2020-10-20 12:38:05', '2020-10-20 12:38:05'),
(102, 'Pusti', 'brand_1603172330.png', 1, 0, '2020-10-20 12:38:50', '2020-10-20 12:38:50'),
(103, 'Quaker', 'brand_1603172399.png', 1, 0, '2020-10-20 12:39:59', '2020-10-20 12:39:59'),
(104, 'Radhuni', 'brand_1603172555.png', 1, 0, '2020-10-20 12:42:35', '2020-10-20 12:42:35'),
(105, 'Rupchanda', 'brand_1603172621.png', 1, 0, '2020-10-20 12:43:41', '2020-10-20 12:43:41'),
(106, 'Sajeeb', 'brand_1603172697.png', 1, 0, '2020-10-20 12:44:57', '2020-10-20 12:44:57'),
(107, 'Senora', 'brand_1603172745.png', 1, 0, '2020-10-20 12:45:45', '2020-10-20 12:45:45'),
(108, 'Sensodyne', 'brand_1603172806.png', 1, 0, '2020-10-20 12:46:46', '2020-10-20 12:46:46'),
(109, 'Set Wet', 'brand_1603172887.png', 1, 0, '2020-10-20 12:48:07', '2020-10-20 12:48:07'),
(110, 'Seylon', 'brand_1603172926.png', 1, 0, '2020-10-20 12:48:46', '2020-10-20 12:48:46'),
(111, 'Shezan', 'brand_1603172965.png', 1, 0, '2020-10-20 12:49:25', '2020-10-20 12:49:25'),
(112, 'Smc', 'brand_1603173022.png', 1, 0, '2020-10-20 12:50:22', '2020-10-20 12:50:22'),
(113, 'Starship', 'brand_1603173122.png', 1, 0, '2020-10-20 12:52:02', '2020-10-20 12:52:02'),
(114, 'Sunlite', 'brand_1603173199.png', 1, 0, '2020-10-20 12:53:19', '2020-10-20 12:53:19'),
(115, 'Super star', 'brand_1603173254.png', 1, 0, '2020-10-20 12:54:14', '2020-10-20 12:54:15'),
(116, 'Supermom', 'brand_1603173322.png', 1, 0, '2020-10-20 12:55:22', '2020-10-20 12:55:22'),
(117, 'Taaza', 'brand_1603173363.png', 1, 0, '2020-10-20 12:56:03', '2020-10-20 12:56:03'),
(118, 'Tang', 'brand_1603173401.png', 1, 0, '2020-10-20 12:56:41', '2020-10-20 12:56:41'),
(119, 'Teer', 'brand_1603173456.png', 1, 0, '2020-10-20 12:57:36', '2020-10-20 12:57:36'),
(120, 'Tibet', 'brand_1603173532.png', 1, 0, '2020-10-20 12:58:52', '2020-10-20 12:58:52'),
(121, 'Twinkle', 'brand_1603173601.png', 1, 0, '2020-10-20 13:00:01', '2020-10-20 13:00:01'),
(122, 'Unilever', 'brand_1603173663.png', 1, 0, '2020-10-20 13:01:03', '2020-10-20 13:01:03'),
(123, 'Vatika', 'brand_1603173701.png', 1, 0, '2020-10-20 13:01:41', '2020-10-20 13:01:41'),
(124, 'Veet', 'brand_1603173746.png', 1, 0, '2020-10-20 13:02:26', '2020-10-20 13:02:26'),
(125, 'Whisper', 'brand_1603173797.png', 1, 0, '2020-10-20 13:03:17', '2020-10-20 13:03:17'),
(126, 'Mix', 'brand_1610275306.png', 1, 0, '2021-01-10 17:41:46', '2021-01-10 17:41:46'),
(127, 'Square Pharmaceuticals LTD', 'brand_1610275627.jpg', 1, 0, '2021-01-10 17:47:07', '2021-01-10 17:47:07'),
(128, 'Eskayef Pharmaceuticals Ltd', 'brand_1610299720.png', 1, 0, '2021-01-11 00:28:40', '2021-01-11 00:28:40'),
(129, 'Radiant Pharmaceuticals Limited', 'brand_1610299856.png', 1, 0, '2021-01-11 00:30:56', '2021-01-11 00:30:56'),
(130, 'Incepta Pharmaceuticals', 'brand_1610300055.png', 1, 0, '2021-01-11 00:34:15', '2021-01-11 00:34:15'),
(131, 'Drug International Limited', 'brand_1610300282.png', 1, 0, '2021-01-11 00:38:02', '2021-01-11 00:38:02'),
(132, 'Opsonin pharma limited', 'brand_1610300421.png', 1, 0, '2021-01-11 00:40:21', '2021-01-11 00:40:21'),
(133, 'Renata Limited', 'brand_1610362444.jpg', 1, 0, '2021-01-11 17:54:04', '2021-01-11 17:54:04'),
(134, 'Healthcare Pharmaceuticals', 'brand_1610430562.png', 1, 0, '2021-01-12 12:49:22', '2021-01-12 12:49:23'),
(135, 'The IBN SINA Pharmaceutical Industry Ltd', 'brand_1610430793.png', 1, 0, '2021-01-12 12:53:13', '2021-01-12 12:53:13'),
(136, 'BEXIMCO PHARMACEUTICALS LIMITED', 'brand_1610432427.png', 1, 0, '2021-01-12 13:20:27', '2021-01-12 13:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `cart_storage`
--

CREATE TABLE `cart_storage` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purchase_key` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_storage`
--

INSERT INTO `cart_storage` (`id`, `cart_data`, `created_at`, `updated_at`, `purchase_key`) VALUES
('103.112.166.12_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-10-18 19:55:22', '2020-10-28 01:05:08', 525),
('37.111.217.143_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-10-19 23:25:45', '2020-10-20 12:56:32', 526),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-11-07 23:28:51', '2020-11-07 23:29:04', 533);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cate_banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cate_tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cate_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `cate_image`, `cate_banner`, `cate_tag`, `cate_slug`, `cate_status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(101, 'Kitchen Cooking', 'pic__1609589983.png', NULL, 'Kitchen Cooking', 'kitchen-cooking', '1', 0, '2021-01-02 19:19:43', '2021-01-02 19:19:43'),
(102, 'Drinks & Beverage', 'pic__1609590011.png', NULL, 'Drinks & Beverage', 'drinks-beverage', '1', 0, '2021-01-02 19:20:11', '2021-01-02 19:20:11'),
(103, 'Baby Care', 'pic__1609590033.png', NULL, 'Baby Care', 'baby-care', '1', 0, '2021-01-02 19:20:33', '2021-01-02 19:22:13'),
(104, 'Home Care & Cleaning', 'pic__1609590062.png', NULL, 'Home Care & Cleaning', 'home-care-cleaning', '1', 0, '2021-01-02 19:21:02', '2021-01-02 19:21:02'),
(105, 'Medicine', 'pic__1609590107.png', NULL, 'Medicine', 'medicine', '1', 0, '2021-01-02 19:21:47', '2021-01-02 19:21:58'),
(106, 'Beauty & Body Care', 'pic__1609590189.png', NULL, 'Beauty & Body Care', 'beauty-body-care', '1', 0, '2021-01-02 19:23:09', '2021-01-02 19:23:09'),
(107, 'Milk & Dairy', 'pic__1609590217.png', NULL, 'Milk & Dairy', 'milk-dairy', '1', 0, '2021-01-02 19:23:37', '2021-01-02 19:23:37'),
(108, 'Snacks & Spread', 'pic__1609590230.png', NULL, 'Snacks & Spread', 'snacks-spread', '1', 0, '2021-01-02 19:23:50', '2021-01-02 19:23:50'),
(109, 'Health & Adult Care', 'pic__1609590257.png', NULL, 'Health & Adult Care', 'health-adult-care', '1', 0, '2021-01-02 19:24:17', '2021-01-02 19:24:17'),
(110, 'Office & Schooling', 'pic__1609590289.png', NULL, 'Office & Schooling', 'office-schooling', '1', 0, '2021-01-02 19:24:49', '2021-01-02 19:24:49'),
(111, 'Home & Kitchen Appliance', 'pic__1609590317.png', NULL, 'Home & Kitchen Appliance', 'home-kitchen-appliance', '1', 0, '2021-01-02 19:25:17', '2021-01-02 19:25:17'),
(113, 'Fruits & Vegetables', 'pic__1609590340.png', NULL, 'Fruits & Vegetables', 'fruits-vegetables', '1', 0, '2021-01-02 19:25:40', '2021-01-02 19:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `category_banners`
--

CREATE TABLE `category_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `siteban_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_banners`
--

INSERT INTO `category_banners` (`id`, `category_id`, `section`, `siteban_id`, `created_at`, `updated_at`) VALUES
(150, 80, 3, 124, '2020-09-26 04:08:39', NULL),
(151, 78, 3, 124, '2020-09-26 04:08:39', NULL),
(152, 77, 3, 124, '2020-09-26 04:08:39', NULL),
(153, 82, 2, 125, '2020-09-26 04:33:55', NULL),
(154, 79, 2, 125, '2020-09-26 04:33:55', NULL),
(157, 73, 2, 135, '2020-09-26 05:49:56', NULL),
(158, 73, 2, 136, '2020-09-26 05:50:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `invoice_id` int(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `delevery_time` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_status` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compare_products`
--

CREATE TABLE `compare_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `is_replied` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `visitor_name`, `visitor_email`, `phone`, `subject`, `visitor_message`, `status`, `is_deleted`, `is_seen`, `is_replied`, `created_at`, `updated_at`) VALUES
(63, 'Mike Chesterton', 'no-replynow@gmail.com', '87916664725', 're: Quote Request for kineninshop.com Local SEO', 'Hi there \r\n \r\nAs per the chat we had on our website, we recommended our Local SEO plan for kineninshop.com to increase its visibility in the local search as well as in the Google maps. \r\n \r\nMore info on the plan can be found here \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nAs promised we`ll include 1500 Gmaps citations for free. \r\n \r\nThank you \r\nMike Chesterton\r\n \r\nsupport@speed-seo.net', 1, 1, 1, 0, '2020-12-08 04:21:24', '2021-01-02 19:11:25'),
(64, 'Steve', 'steve@explainervideos4u.xyz', '011394960794', 'Explainer Videos for kineninshop.com', 'Hi,\r\n\r\nWe\'d like to introduce to you our explainer video service which we feel can benefit your site kineninshop.com.\r\n\r\nCheck out some of our existing videos here:\r\nhttps://www.youtube.com/watch?v=oYoUQjxvhA0\r\nhttps://www.youtube.com/watch?v=MOnhn77TgDE\r\nhttps://www.youtube.com/watch?v=NKY4a3hvmUc\r\n\r\nAll of our videos are in a similar animated format as the above examples and we have voice over artists with US/UK/Australian accents.\r\n\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video such as Youtube, and can be embedded into your website or featured on landing pages.\r\n\r\nOur prices are as follows depending on video length:\r\n0-1 minutes = $189\r\n1-2 minutes = $269\r\n2-3 minutes = $379\r\n3-4 minutes = $489\r\n\r\n*All prices above are in USD and include a custom video, full script and a voice-over.\r\n\r\nIf this is something you would like to discuss further, don\'t hesitate to get in touch.\r\nIf you are not interested, simply delete this message and we won\'t contact you again.\r\n\r\nKind Regards,\r\nSteve', 1, 0, 0, 0, '2021-02-22 04:01:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contract_images`
--

CREATE TABLE `contract_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phonecode` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`, `phonecode`) VALUES
(18, 'BD', 'Bangladesh', '880');

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cupons`
--

CREATE TABLE `cupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cupon_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_shopping` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double NOT NULL,
  `discount_type` int(11) NOT NULL,
  `cupon_start_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cupon_end_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cupons`
--

INSERT INTO `cupons` (`id`, `cupon_type`, `cupon_code`, `minimum_shopping`, `product_id`, `discount`, `discount_type`, `cupon_start_date`, `cupon_end_date`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(28, '1', 'lol123', '500', '[\"1\"]', 100, 1, '2020-11-29', '2020-12-04', 1, 0, '2020-11-29 14:57:28', '2020-11-29 20:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `customar_accounts`
--

CREATE TABLE `customar_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` text NOT NULL,
  `userid` int(11) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `image` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customar_accounts`
--

INSERT INTO `customar_accounts` (`id`, `name`, `phone`, `address`, `userid`, `balance`, `image`, `created_at`, `updated_at`) VALUES
(4, 'Qayum Hasan lol', '1559505992', 'dsfdsfdfdfgfdfg', 128, 0, NULL, '2020-09-26', '2020-10-06'),
(5, 'nur uddin', '01730595104', 'dffdg', 180, 0, NULL, '2020-10-07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delevery_amounts`
--

CREATE TABLE `delevery_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `insidedhaka` int(11) NOT NULL,
  `outsidedhaka` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delevery_amounts`
--

INSERT INTO `delevery_amounts` (`id`, `insidedhaka`, `outsidedhaka`, `created_at`, `updated_at`) VALUES
(2, 200, 3500, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delevery_charges`
--

CREATE TABLE `delevery_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delevery_charges`
--

INSERT INTO `delevery_charges` (`id`, `amount`, `created_at`, `updated_at`) VALUES
(1, '50', NULL, '2020-11-11 03:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `different_address`
--

CREATE TABLE `different_address` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` text NOT NULL,
  `userid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `different_address`
--

INSERT INTO `different_address` (`id`, `name`, `phone`, `address`, `userid`, `orderid`, `created_at`, `updated_at`) VALUES
(1, 'dfsgfdsgd', '01783038818', 'gdsfgfdsgdsfg', 128, 5555, NULL, NULL),
(2, 'Shitu', '01789977665', 'Durgapyur Rajshahi', 128, 7890, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) NOT NULL,
  `division_id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd'),
(2, 1, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd'),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd'),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', NULL, NULL, 'www.rangamati.gov.bd'),
(5, 1, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd'),
(6, 1, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd'),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd'),
(8, 1, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd'),
(9, 1, 'Coxsbazar', 'কক্সবাজার', NULL, NULL, 'www.coxsbazar.gov.bd'),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd'),
(11, 1, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd'),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd'),
(13, 2, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd'),
(14, 2, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd'),
(15, 2, 'Rajshahi', 'রাজশাহী', NULL, NULL, 'www.rajshahi.gov.bd'),
(16, 2, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd'),
(17, 2, 'Joypurhat', 'জয়পুরহাট', NULL, NULL, 'www.joypurhat.gov.bd'),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd'),
(19, 2, 'Naogaon', 'নওগাঁ', NULL, NULL, 'www.naogaon.gov.bd'),
(20, 3, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd'),
(21, 3, 'Satkhira', 'সাতক্ষীরা', NULL, NULL, 'www.satkhira.gov.bd'),
(22, 3, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd'),
(23, 3, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd'),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd'),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd'),
(26, 3, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd'),
(27, 3, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd'),
(28, 3, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd'),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd'),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', NULL, NULL, 'www.jhalakathi.gov.bd'),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd'),
(32, 4, 'Pirojpur', 'পিরোজপুর', NULL, NULL, 'www.pirojpur.gov.bd'),
(33, 4, 'Barisal', 'বরিশাল', NULL, NULL, 'www.barisal.gov.bd'),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd'),
(35, 4, 'Barguna', 'বরগুনা', NULL, NULL, 'www.barguna.gov.bd'),
(36, 5, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd'),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd'),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd'),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd'),
(40, 6, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd'),
(41, 6, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd'),
(42, 6, 'Shariatpur', 'শরীয়তপুর', NULL, NULL, 'www.shariatpur.gov.bd'),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd'),
(44, 6, 'Tangail', 'টাঙ্গাইল', NULL, NULL, 'www.tangail.gov.bd'),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd'),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', NULL, NULL, 'www.manikganj.gov.bd'),
(47, 6, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd'),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', NULL, NULL, 'www.munshiganj.gov.bd'),
(49, 6, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd'),
(50, 6, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd'),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd'),
(52, 6, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd'),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd'),
(54, 7, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd'),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', NULL, NULL, 'www.lalmonirhat.gov.bd'),
(56, 7, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd'),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd'),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd'),
(59, 7, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd'),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd'),
(61, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd'),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', NULL, NULL, 'www.mymensingh.gov.bd'),
(63, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd'),
(64, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`, `country_id`) VALUES
(1, 'Chattagram', 'চট্টগ্রাম', 'www.chittagongdiv.gov.bd', 18),
(2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd', 18),
(3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd', 18),
(4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd', 18),
(5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd', 18),
(6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd', 18),
(7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd', 18),
(8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd', 18);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, 'database', 'default', '{\"displayName\":\"App\\\\Mail\\\\WelcomeSubscribeMessage\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:32:\\\"App\\\\Mail\\\\WelcomeSubscribeMessage\\\":23:{s:6:\\\"locale\\\";N;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:22:\\\"ashiffoysal0@gmail.com\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:7:\\\"\\u0000*\\u0000html\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:15:\\\"diskAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;}\"}}', 'InvalidArgumentException: View [admin.ecommerce.send_mail.mail_template.subscriber_welcome_mail] not found. in D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php:137\nStack trace:\n#0 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php(79): Illuminate\\View\\FileViewFinder->findInPaths(\'admin.ecommerce...\', Array)\n#1 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Factory.php(131): Illuminate\\View\\FileViewFinder->find(\'admin.ecommerce...\')\n#2 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(355): Illuminate\\View\\Factory->make(\'admin.ecommerce...\', Array)\n#3 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(328): Illuminate\\Mail\\Mailer->renderView(\'admin.ecommerce...\', Array)\n#4 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(246): Illuminate\\Mail\\Mailer->addContent(Object(Illuminate\\Mail\\Message), \'admin.ecommerce...\', NULL, NULL, Array)\n#5 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(159): Illuminate\\Mail\\Mailer->send(\'admin.ecommerce...\', Array, Object(Closure))\n#6 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#7 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(160): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#8 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\SendQueuedMailable.php(52): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#9 [internal function]: Illuminate\\Mail\\SendQueuedMailable->handle(Object(Illuminate\\Mail\\Mailer))\n#10 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(32): call_user_func_array(Array, Array)\n#11 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(36): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#12 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(90): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#13 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#14 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(590): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#15 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#16 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(130): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#17 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(105): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#18 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#19 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(83): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Mail\\SendQueuedMailable), false)\n#20 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(130): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#21 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(105): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#22 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(85): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#23 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(59): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Mail\\SendQueuedMailable))\n#24 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(88): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#25 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(354): Illuminate\\Queue\\Jobs\\Job->fire()\n#26 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(300): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#27 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(134): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#28 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#29 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#30 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#31 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(32): call_user_func_array(Array, Array)\n#32 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(36): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#33 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(90): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#34 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#35 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(590): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#36 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(201): Illuminate\\Container\\Container->call(Array)\n#37 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\symfony\\console\\Command\\Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#38 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(188): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#39 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\symfony\\console\\Application.php(1011): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\symfony\\console\\Application.php(272): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\symfony\\console\\Application.php(148): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 D:\\xampp\\htdocs\\eco1\\echo9\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(131): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 D:\\xampp\\htdocs\\eco1\\echo9\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 {main}', '2020-02-05 03:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_ques` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_ans` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `faq_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_ques`, `faq_ans`, `is_deleted`, `faq_status`, `created_at`, `updated_at`) VALUES
(21, 'Do you refund full amount if order cancelled?', 'While a customer cancel any paid order and ask for refund, or we (kineninshop.com) cancel any paid order, in terms of Debit/Credit card payment of any bank or bKash/Rocket/Nagad. we (kineninshop.com) will refund the full amount from our (kineninshop.com) end. In case of Credit/Debit card payment, the customer will get back the same amount from his/her card issuer bank. But in case of payment from bKash/ Rocket/Nagad even if kineninshop.com refunds FULL AMOUNT that a customer paid, they (bKash/Rocket/Nagad) will deduct the transaction charge (according to their company policy) before refunding it to customer.', 0, 1, NULL, NULL),
(22, 'What is your policy on refunds?', 'Kinenin Shop (kineninshop.com) always here to providing best services to the customers. For any unforeseen situation, if we are not able to accomplish product(s) delivery or to provide our services, we will be informing you within 12 hours over phone or massage. For any of our lacking, if there needed any refund, we will do it within next 7 days after as following. Calls for refunding will be processed under the following circumstances;\r\nUnable to deliver any products or if any product(s) returned by customer against paid invoice\r\nPlease contact us at 01721-707503 or +8801781-982501 if you want to return an item.', 0, 1, NULL, NULL),
(23, 'How do you deliver?', 'We use our own logistics to deliver. Our main motto is to reach the products to your location perfectly.', 0, 1, NULL, NULL),
(24, 'How do I pay?', 'We accept cash on delivery and we also have card payment and Online bKash/Rocket/Nagad service.', 0, 1, NULL, NULL),
(25, 'What are your delivery hours?', 'We deliver your order on or before 90 minutes from the confirmation time of your order. Delivery service open from 9 a.m. to 9 p.m. every day. You can choose from available slots to find something that is convenient to you.', 0, 1, NULL, NULL),
(26, 'How can I contact you?', 'You can call us 01721-707503 or 01781-982501 Or Inbox us in Facebook or Messenger to contact with us.', 0, 1, NULL, NULL),
(27, 'What is your delivery area?', 'Inside Dhaka Mirpur Area', 0, 1, NULL, NULL),
(28, 'How much do deliveries charge?', 'For order up to Tk.199, Delivery Charge is Tk.40 &\r\nFor order Tk.499 or above, Delivery Charge is FREE!!', 0, 1, NULL, '2020-12-02 22:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `flash_deals`
--

CREATE TABLE `flash_deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flash_deals`
--

INSERT INTO `flash_deals` (`id`, `title`, `start_date`, `end_date`, `is_deleted`, `status`, `created_at`, `updated_at`) VALUES
(35, 'করোনায় ইরানের শীর্ষ ধর্মীয় নেতার মৃত্যু', '2020-11-18', '2020-12-12', 0, 0, '2020-11-18 16:54:57', '2020-12-01 22:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `flash_deal_details`
--

CREATE TABLE `flash_deal_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flash_deal_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `discount` bigint(20) NOT NULL,
  `discount_type` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `change_status_for_update` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flash_deal_details`
--

INSERT INTO `flash_deal_details` (`id`, `flash_deal_id`, `product_id`, `discount`, `discount_type`, `is_deleted`, `status`, `change_status_for_update`, `created_at`, `updated_at`) VALUES
(550, 35, 227, 50, 2, 0, 0, 0, NULL, '2020-12-01 22:10:52'),
(551, 35, 228, 20, 2, 0, 0, 0, NULL, '2020-12-01 22:10:52'),
(552, 35, 229, 5, 2, 0, 0, 0, NULL, '2020-12-01 22:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `footer_options`
--

CREATE TABLE `footer_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_options`
--

INSERT INTO `footer_options` (`id`, `footer_text`, `address`, `phone`, `email`, `copyright`, `payment_image`, `created_at`, `updated_at`) VALUES
(11, 'text', 'Mukto Bangla Shopping Complex, Office No: 207 (9th Floor), Mirpur 1, Dhaka, Bangladesh.', '01730595104', 'info@durbarit.com', '© 2020, Durbar IT, All rights reserved', '5e88c0af9dcf1.png', NULL, '2020-09-15 03:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `gateway`
--

CREATE TABLE `gateway` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(67, 'default', '{\"displayName\":\"App\\\\Mail\\\\WelcomeSubscribeMessage\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:32:\\\"App\\\\Mail\\\\WelcomeSubscribeMessage\\\":23:{s:6:\\\"locale\\\";N;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:17:\\\"ermhroy@gmail.com\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:7:\\\"\\u0000*\\u0000html\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:15:\\\"diskAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1585736927, 1585736927);

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `front_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preloader` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `front_logo`, `favicon`, `admin_logo`, `background`, `preloader`, `created_at`, `updated_at`) VALUES
(1, 'public/adminpanel/logos/1683246138352975.png', 'public/adminpanel/logos/1683318809971390.png', 'public/adminpanel/logos/1679980236477958.png', 'public/adminpanel/logos/1677602977070849.png', 'public/adminpanel/logos/1683246138480392.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mail_drafts`
--

CREATE TABLE `mail_drafts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reply_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_id` bigint(20) UNSIGNED NOT NULL,
  `reply_subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mesurements`
--

CREATE TABLE `mesurements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `m_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_status` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mesurements`
--

INSERT INTO `mesurements` (`id`, `m_name`, `m_status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(6, 'Kg', 1, 1, '2020-10-19 22:16:58', '2020-11-14 22:52:11'),
(7, '500gm', 1, 0, '2020-10-19 22:17:29', '2020-11-04 03:30:37'),
(8, '400gm', 1, 0, '2020-11-14 22:47:46', NULL),
(9, '180gm', 1, 0, '2020-11-14 22:52:05', NULL),
(10, '5 Liter', 1, 0, '2020-11-14 23:03:13', NULL),
(11, '1 Liter', 1, 0, '2020-11-14 23:05:06', NULL),
(12, '2 Liter', 1, 0, '2020-11-14 23:05:19', NULL),
(13, '500ml', 1, 0, '2020-11-14 23:08:47', NULL),
(14, '50gm', 1, 0, '2020-11-15 00:28:07', NULL),
(15, '25gm', 1, 0, '2020-12-01 21:33:11', NULL),
(16, '250gm', 1, 0, '2020-12-01 21:54:45', NULL),
(17, '350gm', 1, 0, '2020-12-01 22:01:41', NULL),
(18, '330gm', 1, 0, '2020-12-01 22:06:06', NULL),
(19, '170gm', 1, 0, '2020-12-01 22:08:32', NULL),
(20, '375gm', 1, 0, '2020-12-01 22:14:46', NULL),
(21, '26gm', 1, 0, '2020-12-01 22:16:18', NULL),
(22, '17gm', 1, 0, '2020-12-01 22:18:26', NULL),
(23, '100gm', 1, 0, '2020-12-01 22:38:17', NULL),
(24, '150gm', 1, 0, '2020-12-01 22:41:30', NULL),
(25, '75gm', 1, 0, '2020-12-01 22:43:29', NULL),
(26, '135gm', 1, 0, '2020-12-01 22:57:46', NULL),
(27, '300gm', 1, 0, '2020-12-01 23:00:41', NULL),
(28, '130gm', 1, 0, '2020-12-01 23:05:27', NULL),
(29, '1kg', 1, 0, '2020-12-01 23:08:30', NULL),
(30, '200gm', 1, 0, '2020-12-01 23:12:40', NULL),
(31, '200gm', 1, 1, '2020-12-01 23:13:03', '2020-12-01 23:13:21'),
(32, '250ml', 1, 0, '2021-01-10 16:04:01', NULL),
(33, '5g', 1, 1, '2021-01-10 16:47:36', '2021-01-10 16:48:37'),
(34, '5g', 1, 0, '2021-01-10 16:48:54', NULL),
(35, '120mg', 1, 0, '2021-01-10 18:04:54', NULL),
(36, '20mg', 1, 0, '2021-01-10 18:05:09', NULL),
(37, '40mg', 1, 0, '2021-01-10 18:05:33', NULL),
(38, '10mg', 1, 0, '2021-01-10 18:05:56', NULL),
(39, '500mg', 1, 0, '2021-01-10 18:06:27', NULL),
(40, '250mg', 1, 0, '2021-01-10 18:09:07', NULL),
(41, '100mg', 1, 0, '2021-01-10 18:09:22', NULL),
(42, '50mg', 1, 0, '2021-01-10 18:09:47', NULL),
(43, '25mg', 1, 0, '2021-01-10 18:10:24', NULL),
(44, '125mg', 1, 0, '2021-01-10 18:10:41', NULL),
(45, '60ml', 1, 0, '2021-01-10 18:10:51', NULL),
(46, '100ml', 1, 0, '2021-01-10 18:11:01', NULL),
(47, '200l', 1, 1, '2021-01-10 18:11:17', '2021-01-10 18:11:59'),
(48, '450ml', 1, 0, '2021-01-10 18:12:22', NULL),
(49, '180mg', 1, 0, '2021-01-10 18:20:40', NULL),
(50, '2kg', 1, 0, '2021-01-10 18:34:38', NULL),
(51, '240gm', 1, 0, '2021-01-10 19:16:53', NULL),
(52, '80gm', 1, 0, '2021-01-10 19:28:08', NULL),
(53, '65gm', 1, 0, '2021-01-10 19:32:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobile_banners`
--

CREATE TABLE `mobile_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` int(11) NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobile_sliders`
--

CREATE TABLE `mobile_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bottom_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobile_sliders`
--

INSERT INTO `mobile_sliders` (`id`, `slider_link`, `slider_img`, `bottom_image`, `is_deleted`, `status`, `created_at`, `updated_at`) VALUES
(15, '#', 'th_1595340933.jpg', 'th_1595340934.jpg', 1, 1, '2020-07-21 21:15:34', '2020-07-21 21:19:00'),
(16, '#', 'th_1595341154.png', 'th_1595341154.png', 0, 1, '2020-07-21 21:19:14', '2020-07-21 21:19:14'),
(17, '#', 'th_1595341168.png', 'th_1595341168.png', 0, 1, '2020-07-21 21:19:28', '2020-07-21 21:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(110) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`, `created_at`, `updated_at`) VALUES
(1, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', '10', 'Customer Address', 'Pending', '445656', 'BDT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_finals`
--

CREATE TABLE `order_finals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_quantity` int(11) DEFAULT NULL,
  `payment_type` int(11) DEFAULT 0,
  `shipping_type` int(11) DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dalevary` int(11) NOT NULL DEFAULT 0,
  `delevery_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delevery_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `cupon_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_secoure_id` varchar(110) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gragfile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delevery_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_device` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_finals`
--

INSERT INTO `order_finals` (`id`, `invoice_id`, `user_id`, `total_price`, `total_quantity`, `payment_type`, `shipping_type`, `shipping_address`, `dalevary`, `delevery_time`, `delevery_date`, `payment_status`, `cupon_value`, `payment_secoure_id`, `product`, `shipping_name`, `phone`, `shipping_phone`, `review`, `gragfile`, `delevery_charge`, `order_device`, `is_deleted`, `created_at`, `updated_at`) VALUES
(117, 96350, 204, '256', 3, 1, NULL, 'Rajshahi', 0, '2.00pm-5.00pm', '2021-01-28', 0, NULL, '1786f22174f4d716dcaaa702ddcdc4ae', '[{\"id\":\"396\",\"name\":\"Losectil 20 Oral Powder\",\"price\":\"6.00\",\"quantity\":\"1\",\"sku\":\"1050500030\",\"image\":\"th_1610435815.jpg\"},{\"id\":\"395\",\"name\":\"Maxpro 40 Capsule\",\"price\":\"100.00\",\"quantity\":\"2\",\"sku\":\"1130200026\",\"image\":\"th_1610435642.jpg\"}]', 'Asif', '01783038818', '01783038818', NULL, NULL, '50', 1, 0, '2021-01-26 13:18:36', '2021-01-26 13:18:36'),
(118, 94919, 204, '150', 1, 2, NULL, 'Rajshahi', 0, '6.00pm - 10.00pm', '2021-03-05', 1, NULL, '78524b6181b580564fe960d00860989e', '[{\"id\":\"395\",\"name\":\"Maxpro 40 Capsule\",\"price\":\"100.00\",\"quantity\":\"1\",\"sku\":\"1130200026\",\"image\":\"th_1610435642.jpg\"}]', 'Asif', '01783038818', '01783038818', NULL, NULL, '50', 1, 0, '2021-03-06 12:34:05', '2021-03-06 18:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_places`
--

CREATE TABLE `order_places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_paid` int(11) NOT NULL DEFAULT 0,
  `status` varchar(112) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_secure_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `delevary` int(11) NOT NULL DEFAULT 1,
  `payment_status` int(11) NOT NULL DEFAULT 1,
  `cupon_value` int(11) DEFAULT NULL,
  `cupon_type` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_places`
--

INSERT INTO `order_places` (`id`, `shipping_id`, `payment_type`, `order_id`, `user_id`, `checkout_id`, `total_price`, `total_quantity`, `is_paid`, `status`, `payment_secure_id`, `payment_method_id`, `delevary`, `payment_status`, `cupon_value`, `cupon_type`, `is_deleted`, `name`, `email`, `phone`, `address`, `currency`, `created_at`, `updated_at`) VALUES
(543, '75063', 1, '4728', '128', '149', '90', '2', 0, NULL, 'tWLh2TqiDXlsdCqFrkbQjjh7t9I2RGvFF8qBNoFIdHwvDYaNfEI17kKxX9oK', NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2020-10-28 18:35:39', '2020-10-28 18:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_storages`
--

CREATE TABLE `order_storages` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purchase_key` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_storages`
--

INSERT INTO `order_storages` (`id`, `cart_data`, `created_at`, `updated_at`, `purchase_key`, `order_id`) VALUES
('37.111.238.160_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:15;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:15;s:4:\"name\";s:16:\"new bangla dress\";s:5:\"price\";d:10000;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:8:{s:13:\"thumbnail_img\";s:17:\"th_1585640048.jpg\";s:6:\"colors\";s:7:\"#800040\";s:10:\"product_id\";i:177;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:6:\"8765pp\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;s:4:\"size\";s:1:\"l\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-03-31 14:35:27', '2020-03-31 14:35:27', 363, NULL),
('37.111.225.47_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:13;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:13;s:4:\"name\";s:48:\"Iste Natus Error Sit Volupta Accusan Dolo Remque\";s:5:\"price\";d:1700;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:8:{s:13:\"thumbnail_img\";s:17:\"th_1585721612.jpg\";s:6:\"colors\";s:7:\"#800040\";s:10:\"product_id\";i:178;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:8:\"-green-l\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;s:4:\"size\";s:1:\"l\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-04-01 13:16:57', '2020-04-01 13:16:57', 364, NULL),
('103.230.106.39_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:7;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:7;s:4:\"name\";s:48:\"Iste Natus Error Sit Volupta Accusan Dolo Remque\";s:5:\"price\";d:8700;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:8:{s:13:\"thumbnail_img\";s:17:\"th_1585721612.jpg\";s:6:\"colors\";s:7:\"#00ffff\";s:10:\"product_id\";i:178;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:7:\"-blue-l\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;s:4:\"size\";s:1:\"l\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-04-01 14:40:59', '2020-04-01 14:40:59', 365, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-01 14:50:26', '2020-05-15 02:58:20', 366, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-01 15:27:16', '2020-05-15 02:58:20', 367, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-01 15:29:46', '2020-05-15 02:58:20', 368, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-01 15:30:46', '2020-05-15 02:58:20', 369, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-01 15:32:43', '2020-05-15 02:58:20', 370, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-01 15:33:04', '2020-05-15 02:58:20', 371, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-01 15:46:56', '2020-05-15 02:58:20', 372, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-01 17:55:13', '2020-05-15 02:58:20', 373, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-01 19:02:15', '2020-05-15 02:58:20', 374, NULL),
('103.230.107.55_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:11;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:11;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";d:500;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:8:{s:13:\"thumbnail_img\";s:17:\"th_1585751820.jpg\";s:6:\"colors\";s:7:\"#800040\";s:10:\"product_id\";i:186;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:8:\"-green-m\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;s:4:\"size\";s:1:\"m\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-04-02 01:09:41', '2020-04-02 01:12:53', 375, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-02 01:20:20', '2020-05-15 02:58:20', 376, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-02 01:21:11', '2020-05-15 02:58:20', 377, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-02 01:29:14', '2020-05-15 02:58:20', 378, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-02 12:48:11', '2020-05-15 02:58:20', 379, NULL),
('37.111.239.215_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:14;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:14;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";i:994;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:10:\"flashdeals\";i:6;s:13:\"flashdealtype\";i:1;s:13:\"thumbnail_img\";s:17:\"th_1585752002.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:187;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:6:\"new345\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-04-02 20:27:38', '2020-04-02 20:34:24', 380, NULL),
('37.111.239.215_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:14;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:14;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";i:994;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:10:\"flashdeals\";i:6;s:13:\"flashdealtype\";i:1;s:13:\"thumbnail_img\";s:17:\"th_1585752002.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:187;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:6:\"new345\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-04-02 20:30:10', '2020-04-02 20:34:24', 381, NULL),
('37.111.239.215_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:14;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:14;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";i:994;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:10:\"flashdeals\";i:6;s:13:\"flashdealtype\";i:1;s:13:\"thumbnail_img\";s:17:\"th_1585752002.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:187;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:6:\"new345\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-04-02 20:34:24', '2020-04-02 20:34:24', 382, NULL),
('37.111.239.215_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:10;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:10;s:4:\"name\";s:59:\"when an unknown printer took a galley of type and scrambled\";s:5:\"price\";d:3000;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:9:{s:13:\"thumbnail_img\";s:17:\"th_1585803654.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:197;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:8:\"polo6869\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;s:4:\"days\";s:1:\"4\";s:6:\"person\";s:1:\"1\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-04-02 20:37:22', '2020-04-02 20:37:22', 383, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-02 20:40:38', '2020-05-15 02:58:20', 384, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-02 20:43:33', '2020-05-15 02:58:20', 385, NULL),
('103.230.105.22_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-02 22:09:41', '2020-04-02 22:10:41', 386, NULL),
('58.145.190.232_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:4:{i:11;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:11;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";i:1997;s:8:\"quantity\";i:2;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:6:{s:10:\"flashdeals\";i:3;s:13:\"thumbnail_img\";s:17:\"th_1585750155.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:183;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:5:\"ko699\";}}s:10:\"conditions\";a:0:{}}}i:5;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:5;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";i:1997;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:6:{s:10:\"flashdeals\";i:3;s:13:\"thumbnail_img\";s:17:\"th_1585750155.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:183;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:5:\"ko699\";}}s:10:\"conditions\";a:0:{}}}i:7;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:7;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";i:1997;s:8:\"quantity\";i:2;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:6:{s:10:\"flashdeals\";i:3;s:13:\"thumbnail_img\";s:17:\"th_1585750155.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:183;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:5:\"ko699\";}}s:10:\"conditions\";a:0:{}}}i:9;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:9;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";i:1997;s:8:\"quantity\";i:2;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:6:{s:10:\"flashdeals\";i:3;s:13:\"thumbnail_img\";s:17:\"th_1585750155.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:183;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:5:\"ko699\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-04-02 22:23:12', '2020-04-02 22:23:26', 387, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-02 22:31:22', '2020-05-15 02:58:20', 388, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-03 03:03:29', '2020-05-15 02:58:20', 389, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-03 03:36:36', '2020-05-15 02:58:20', 390, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-03 04:07:39', '2020-05-15 02:58:20', 391, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-03 04:20:16', '2020-05-15 02:58:20', 392, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-04 15:28:59', '2020-05-15 02:58:20', 393, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-06 22:40:12', '2020-05-15 02:58:20', 394, NULL),
('58.145.188.233_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-04-20 01:26:50', '2020-04-20 01:28:37', 395, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-05-05 11:08:21', '2020-05-15 02:58:20', 396, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-05-05 11:12:52', '2020-05-15 02:58:20', 397, NULL),
('103.107.123.23_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-05-05 11:15:37', '2020-05-15 02:58:20', 398, NULL),
('103.230.105.44_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-05-21 23:56:19', '2020-05-21 23:58:05', 399, NULL),
('27.147.205.221_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:3:{i:11;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:11;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";d:1997;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:6:{s:10:\"flashdeals\";i:3;s:13:\"thumbnail_img\";s:17:\"th_1585750155.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:183;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:5:\"ko699\";}}s:10:\"conditions\";a:0:{}}}i:8;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:8;s:4:\"name\";s:59:\"when an unknown printer took a galley of type and scrambled\";s:5:\"price\";d:3000;s:8:\"quantity\";i:2;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:8:{s:13:\"thumbnail_img\";s:17:\"th_1585803654.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:197;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:8:\"polo6869\";s:10:\"flashdeals\";i:0;s:4:\"days\";s:1:\"4\";s:6:\"person\";s:1:\"1\";}}s:10:\"conditions\";a:0:{}}}i:13;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:13;s:4:\"name\";s:9:\"Fish Food\";s:5:\"price\";d:200;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:6:{s:13:\"thumbnail_img\";s:17:\"th_1585848427.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:205;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:7:\"KN12358\";s:10:\"flashdeals\";i:0;}}s:10:\"conditions\";a:0:{}}}}}', '2020-06-05 16:47:00', '2020-06-05 16:49:17', 400, NULL),
('182.48.91.201_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:10;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:10;s:4:\"name\";s:59:\"when an unknown printer took a galley of type and scrambled\";s:5:\"price\";d:3000;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:9:{s:13:\"thumbnail_img\";s:17:\"th_1585803654.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:197;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:8:\"polo6869\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;s:4:\"days\";s:1:\"4\";s:6:\"person\";s:1:\"1\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-06-06 14:24:00', '2020-06-06 14:24:00', 401, NULL),
('103.112.166.107_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-06-06 21:48:59', '2020-06-08 11:22:49', 402, NULL),
('180.211.186.66_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:2:{i:10;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:10;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";d:994;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:10:\"flashdeals\";i:6;s:13:\"flashdealtype\";i:1;s:13:\"thumbnail_img\";s:17:\"th_1585752002.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:187;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:6:\"new345\";}}s:10:\"conditions\";a:0:{}}}i:13;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:13;s:4:\"name\";s:59:\"when an unknown printer took a galley of type and scrambled\";s:5:\"price\";d:1000;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:9:{s:13:\"thumbnail_img\";s:17:\"th_1585803463.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:196;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:11:\"kokok787654\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;s:4:\"days\";s:1:\"4\";s:6:\"person\";s:1:\"8\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-06-08 00:16:47', '2020-06-08 00:21:20', 403, NULL),
('103.151.119.18_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-06-08 02:14:52', '2020-06-15 15:38:42', 404, NULL),
('58.145.191.248_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:2:{i:12;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:12;s:4:\"name\";s:53:\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\";s:5:\"price\";d:7200;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:10:\"flashdeals\";i:20;s:13:\"flashdealtype\";i:2;s:13:\"thumbnail_img\";s:17:\"th_1585727259.jpg\";s:6:\"colors\";s:7:\"#800040\";s:10:\"product_id\";i:179;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:8:\"p-138775\";}}s:10:\"conditions\";a:0:{}}}i:14;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:14;s:4:\"name\";s:53:\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\";s:5:\"price\";d:7200;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:10:\"flashdeals\";i:20;s:13:\"flashdealtype\";i:2;s:13:\"thumbnail_img\";s:17:\"th_1585727259.jpg\";s:6:\"colors\";s:7:\"#800040\";s:10:\"product_id\";i:179;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:8:\"p-138775\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-06-08 02:50:22', '2020-06-08 02:50:22', 405, NULL),
('202.134.9.141_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:5;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:5;s:4:\"name\";s:48:\"Iste Natus Error Sit Volupta Accusan Dolo Remque\";s:5:\"price\";d:40;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:10:\"flashdeals\";i:60;s:13:\"flashdealtype\";i:2;s:13:\"thumbnail_img\";s:17:\"th_1585721612.jpg\";s:6:\"colors\";s:7:\"#800040\";s:10:\"product_id\";i:178;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:16:\"kik8876654334567\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-06-08 13:09:39', '2020-06-08 13:09:39', 406, NULL),
('58.145.188.230_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:15;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:15;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";i:900;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:10:\"flashdeals\";i:10;s:13:\"flashdealtype\";i:2;s:13:\"thumbnail_img\";s:17:\"th_1585749075.jpg\";s:6:\"colors\";s:7:\"#800040\";s:10:\"product_id\";i:180;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:8:\"-green-l\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-06-09 01:59:53', '2020-06-09 01:59:53', 407, NULL),
('27.147.205.219_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:10;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:10;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";i:1997;s:8:\"quantity\";i:5;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:10:\"flashdeals\";i:3;s:13:\"flashdealtype\";i:1;s:13:\"thumbnail_img\";s:17:\"th_1585750155.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:183;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:2:\"-5\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-06-09 15:37:09', '2020-06-28 14:25:18', 408, NULL),
('27.147.205.219_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:10;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:10;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";i:1997;s:8:\"quantity\";i:5;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:10:\"flashdeals\";i:3;s:13:\"flashdealtype\";i:1;s:13:\"thumbnail_img\";s:17:\"th_1585750155.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:183;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:2:\"-5\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-06-09 16:02:23', '2020-06-28 14:25:18', 409, NULL),
('42.0.6.233_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:8;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:8;s:4:\"name\";s:9:\"Fish Food\";s:5:\"price\";d:200;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:6:{s:13:\"thumbnail_img\";s:17:\"th_1585848427.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:205;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:7:\"KN12358\";s:10:\"flashdeals\";i:0;}}s:10:\"conditions\";a:0:{}}}}}', '2020-06-26 13:14:05', '2020-06-26 13:14:05', 410, NULL),
('116.58.205.140_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:11;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:11;s:4:\"name\";s:29:\"Great feeling spa and massage\";s:5:\"price\";d:7000;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:6:{s:13:\"thumbnail_img\";s:17:\"th_1585849911.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:208;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:8:\"KN253525\";s:10:\"flashdeals\";i:0;}}s:10:\"conditions\";a:0:{}}}}}', '2020-06-27 21:51:53', '2020-06-27 21:51:53', 411, NULL),
('27.147.205.219_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:10;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:10;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";i:1997;s:8:\"quantity\";i:5;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:10:\"flashdeals\";i:3;s:13:\"flashdealtype\";i:1;s:13:\"thumbnail_img\";s:17:\"th_1585750155.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:183;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:2:\"-5\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-06-28 14:24:52', '2020-06-28 14:25:18', 412, NULL),
('103.149.142.238_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:12;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:12;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";d:900;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:6:{s:10:\"flashdeals\";i:10;s:13:\"thumbnail_img\";s:17:\"th_1585749075.jpg\";s:6:\"colors\";s:7:\"#800040\";s:10:\"product_id\";i:180;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:8:\"polo9998\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-06-30 21:40:46', '2020-06-30 21:40:46', 413, NULL),
('58.145.191.228_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:15;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:15;s:4:\"name\";s:28:\"Cool feeling spa and massage\";s:5:\"price\";d:2000;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:6:{s:13:\"thumbnail_img\";s:17:\"th_1585850234.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:209;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:7:\"KN52578\";s:10:\"flashdeals\";i:0;}}s:10:\"conditions\";a:0:{}}}}}', '2020-06-30 22:45:59', '2020-06-30 22:45:59', 414, NULL),
('103.139.9.58_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:3:{i:14;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:14;s:4:\"name\";s:21:\"Comfortable home sale\";s:5:\"price\";d:15000;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:6:{s:13:\"thumbnail_img\";s:17:\"th_1585849239.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:207;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:8:\"KN522524\";s:10:\"flashdeals\";i:0;}}s:10:\"conditions\";a:0:{}}}i:7;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:7;s:4:\"name\";s:21:\"Comfortable home sale\";s:5:\"price\";d:15000;s:8:\"quantity\";i:2;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:6:{s:13:\"thumbnail_img\";s:17:\"th_1585849239.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:207;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:8:\"KN522524\";s:10:\"flashdeals\";i:0;}}s:10:\"conditions\";a:0:{}}}i:15;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:15;s:4:\"name\";s:21:\"Comfortable home sale\";s:5:\"price\";d:15000;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:6:{s:13:\"thumbnail_img\";s:17:\"th_1585849239.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:207;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:8:\"KN522524\";s:10:\"flashdeals\";i:0;}}s:10:\"conditions\";a:0:{}}}}}', '2020-07-14 17:51:53', '2020-07-14 17:51:57', 415, NULL),
('103.151.47.229_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:2:{i:11;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:11;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";d:496;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:10:\"flashdeals\";i:4;s:13:\"flashdealtype\";i:1;s:13:\"thumbnail_img\";s:17:\"th_1585750806.jpg\";s:6:\"colors\";s:7:\"#800040\";s:10:\"product_id\";i:185;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:6:\"345345\";}}s:10:\"conditions\";a:0:{}}}i:9;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:9;s:4:\"name\";s:48:\"Iste Natus Error Sit Volupta Accusan Dolo Remque\";s:5:\"price\";i:6400;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:10:\"flashdeals\";i:20;s:13:\"flashdealtype\";i:2;s:13:\"thumbnail_img\";s:17:\"th_1585727259.jpg\";s:6:\"colors\";s:7:\"#800040\";s:10:\"product_id\";i:179;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:17:\"-INESVADR-green-m\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-07-16 03:00:14', '2020-07-16 03:00:38', 416, NULL),
('103.138.145.186_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:7;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:7;s:4:\"name\";s:59:\"when an unknown printer took a galley of type and scrambled\";s:5:\"price\";d:10000;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:13:\"thumbnail_img\";s:17:\"th_1585807085.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:202;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:8:\"5555uuuu\";s:10:\"flashdeals\";i:0;s:4:\"hour\";s:1:\"1\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-07-16 18:09:05', '2020-07-16 18:09:05', 417, NULL),
('103.230.104.62_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:8;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:8;s:4:\"name\";s:59:\"when an unknown printer took a galley of type and scrambled\";s:5:\"price\";d:2000;s:8:\"quantity\";i:10;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:8:{s:13:\"thumbnail_img\";s:17:\"th_1585802348.jpg\";s:6:\"colors\";s:7:\"#800040\";s:10:\"product_id\";i:194;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:7:\"lkjh987\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;s:5:\"brand\";s:4:\"nike\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-08-14 21:13:42', '2020-08-14 21:13:59', 418, NULL),
('103.139.8.6_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:2:{i:6;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:6;s:4:\"name\";s:28:\"Horlicke Jar Chocolate 500gm\";s:5:\"price\";d:350;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:13:\"thumbnail_img\";s:17:\"th_1603350078.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:256;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:13:\"8906105100282\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;}}s:10:\"conditions\";a:0:{}}}i:11;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:11;s:4:\"name\";s:25:\"Surf Excel Aloe Vera 500g\";s:5:\"price\";d:85;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:13:\"thumbnail_img\";s:17:\"th_1603518456.png\";s:6:\"colors\";N;s:10:\"product_id\";i:310;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:13:\"8941102310159\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;}}s:10:\"conditions\";a:0:{}}}}}', '2020-09-01 00:35:33', '2020-10-25 23:21:35', 419, NULL),
('137.59.50.118_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:11;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:11;s:4:\"name\";s:47:\"mply dummy text of the printing and typesetting\";s:5:\"price\";d:496;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:10:\"flashdeals\";i:4;s:13:\"flashdealtype\";i:1;s:13:\"thumbnail_img\";s:17:\"th_1585750806.jpg\";s:6:\"colors\";s:7:\"#800040\";s:10:\"product_id\";i:185;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:6:\"345345\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-09-05 02:14:53', '2020-09-05 02:14:53', 420, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-14 03:39:41', '2020-11-07 23:29:04', 421, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-20 23:29:16', '2020-11-07 23:29:04', 422, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-20 23:42:08', '2020-11-07 23:29:04', 423, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-20 23:45:01', '2020-11-07 23:29:04', 424, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-20 23:46:05', '2020-11-07 23:29:04', 425, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-20 23:54:37', '2020-11-07 23:29:04', 426, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-20 23:56:22', '2020-11-07 23:29:04', 427, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-21 22:14:17', '2020-11-07 23:29:04', 428, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-21 22:15:21', '2020-11-07 23:29:04', 429, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-21 22:17:46', '2020-11-07 23:29:04', 430, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-21 22:29:03', '2020-11-07 23:29:04', 431, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-21 22:32:54', '2020-11-07 23:29:04', 432, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-21 22:34:27', '2020-11-07 23:29:04', 433, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-21 22:38:29', '2020-11-07 23:29:04', 434, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-21 22:40:00', '2020-11-07 23:29:04', 435, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-21 22:41:25', '2020-11-07 23:29:04', 436, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-21 22:44:27', '2020-11-07 23:29:04', 437, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-21 22:47:54', '2020-11-07 23:29:04', 438, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-21 22:51:53', '2020-11-07 23:29:04', 439, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-21 22:56:00', '2020-11-07 23:29:04', 440, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 00:32:09', '2020-11-07 23:29:04', 441, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 00:40:29', '2020-11-07 23:29:04', 442, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 00:42:32', '2020-11-07 23:29:04', 443, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 00:48:15', '2020-11-07 23:29:04', 444, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 02:04:32', '2020-11-07 23:29:04', 445, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 02:06:52', '2020-11-07 23:29:04', 446, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 02:16:06', '2020-11-07 23:29:04', 447, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 05:44:42', '2020-11-07 23:29:04', 448, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 05:46:54', '2020-11-07 23:29:04', 449, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 05:51:47', '2020-11-07 23:29:04', 450, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 05:54:20', '2020-11-07 23:29:04', 451, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 05:56:18', '2020-11-07 23:29:04', 452, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 05:57:23', '2020-11-07 23:29:04', 453, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 05:59:28', '2020-11-07 23:29:04', 454, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 22:33:30', '2020-11-07 23:29:04', 455, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 22:36:03', '2020-11-07 23:29:04', 456, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 22:40:47', '2020-11-07 23:29:04', 457, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 22:42:10', '2020-11-07 23:29:04', 458, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 22:45:38', '2020-11-07 23:29:04', 459, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 22:50:22', '2020-11-07 23:29:04', 460, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-22 23:37:34', '2020-11-07 23:29:04', 461, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-23 00:19:30', '2020-11-07 23:29:04', 462, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-23 03:55:41', '2020-11-07 23:29:04', 463, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-23 04:11:27', '2020-11-07 23:29:04', 464, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-23 04:13:05', '2020-11-07 23:29:04', 465, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-23 04:36:40', '2020-11-07 23:29:04', 466, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-23 05:19:13', '2020-11-07 23:29:04', 467, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-23 05:38:58', '2020-11-07 23:29:04', 468, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-23 05:46:14', '2020-11-07 23:29:04', 469, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-23 06:00:45', '2020-11-07 23:29:04', 470, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-23 06:05:41', '2020-11-07 23:29:04', 471, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-26 06:12:39', '2020-11-07 23:29:04', 472, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-26 23:28:31', '2020-11-07 23:29:04', 473, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-27 02:06:51', '2020-11-07 23:29:04', 474, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-27 02:12:40', '2020-11-07 23:29:04', 475, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-27 03:38:53', '2020-11-07 23:29:04', 476, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-27 05:50:48', '2020-11-07 23:29:04', 477, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-27 05:55:39', '2020-11-07 23:29:04', 478, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-28 05:07:38', '2020-11-07 23:29:04', 479, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-09-28 22:28:22', '2020-11-07 23:29:04', 480, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 05:58:12', '2020-11-07 23:29:04', 481, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 06:08:04', '2020-11-07 23:29:04', 482, NULL);
INSERT INTO `order_storages` (`id`, `cart_data`, `created_at`, `updated_at`, `purchase_key`, `order_id`) VALUES
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 06:11:56', '2020-11-07 23:29:04', 483, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 06:23:11', '2020-11-07 23:29:04', 484, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 06:24:53', '2020-11-07 23:29:04', 485, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 06:31:08', '2020-11-07 23:29:04', 486, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 22:26:56', '2020-11-07 23:29:04', 487, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 22:34:25', '2020-11-07 23:29:04', 488, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 22:39:55', '2020-11-07 23:29:04', 489, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 22:42:42', '2020-11-07 23:29:04', 490, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 22:43:23', '2020-11-07 23:29:04', 491, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 22:44:05', '2020-11-07 23:29:04', 492, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 22:44:47', '2020-11-07 23:29:04', 493, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 22:46:45', '2020-11-07 23:29:04', 494, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 22:50:26', '2020-11-07 23:29:04', 495, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 22:51:59', '2020-11-07 23:29:04', 496, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 22:53:43', '2020-11-07 23:29:04', 497, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 22:54:50', '2020-11-07 23:29:04', 498, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 22:59:46', '2020-11-07 23:29:04', 499, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 23:03:28', '2020-11-07 23:29:04', 500, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 23:04:36', '2020-11-07 23:29:04', 501, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 23:08:59', '2020-11-07 23:29:04', 502, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 23:20:05', '2020-11-07 23:29:04', 503, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 23:31:53', '2020-11-07 23:29:04', 504, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 23:56:40', '2020-11-07 23:29:04', 505, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-03 23:59:26', '2020-11-07 23:29:04', 506, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-04 00:00:07', '2020-11-07 23:29:04', 507, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-04 00:43:00', '2020-11-07 23:29:04', 508, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-04 00:45:11', '2020-11-07 23:29:04', 509, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-04 00:48:13', '2020-11-07 23:29:04', 510, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-05 00:58:37', '2020-11-07 23:29:04', 511, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-06 04:31:55', '2020-11-07 23:29:04', 512, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-06 04:32:15', '2020-11-07 23:29:04', 513, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-06 04:36:43', '2020-11-07 23:29:04', 514, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-06 04:38:21', '2020-11-07 23:29:04', 515, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-06 04:39:12', '2020-11-07 23:29:04', 516, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-06 04:42:22', '2020-11-07 23:29:04', 517, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-06 04:56:26', '2020-11-07 23:29:04', 518, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-06 06:25:22', '2020-11-07 23:29:04', 519, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-07 00:01:41', '2020-11-07 23:29:04', 520, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-07 02:25:11', '2020-11-07 23:29:04', 521, NULL),
('103.147.163.149_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:8;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:8;s:4:\"name\";s:65:\"when an unknown printer took a galley of type and scrambled it to\";s:5:\"price\";d:300;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:8:{s:13:\"thumbnail_img\";s:17:\"th_1585757745.jpg\";s:6:\"colors\";s:7:\"#800040\";s:10:\"product_id\";i:189;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:7:\"polo999\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;s:5:\"brand\";s:2:\"hp\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-10-07 19:16:12', '2020-10-07 19:17:46', 522, NULL),
('103.147.163.149_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:221;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:221;s:4:\"name\";s:33:\"asif product sell digital product\";s:5:\"price\";d:100;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:6:{s:13:\"thumbnail_img\";s:17:\"th_1601900433.jpg\";s:10:\"product_id\";i:221;s:3:\"sku\";s:9:\"1425298ju\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;s:4:\"slug\";s:33:\"asif-product-sell-digital-product\";}}s:10:\"conditions\";a:0:{}}}}}', '2020-10-07 19:22:44', '2020-10-07 19:22:44', 523, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-10-12 06:38:23', '2020-11-07 23:29:04', 524, NULL),
('103.112.166.12_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-10-18 19:55:22', '2020-10-28 01:05:08', 525, NULL),
('37.111.217.143_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2020-10-19 23:25:45', '2020-10-20 12:56:32', 526, NULL),
('103.218.26.73_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:2:{i:12;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:12;s:4:\"name\";s:25:\"Lifebuoy Lemon Fresh 150g\";s:5:\"price\";d:45;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:13:\"thumbnail_img\";s:17:\"th_1603436449.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:289;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:13:\"8941100658925\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;}}s:10:\"conditions\";a:0:{}}}i:10;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:10;s:4:\"name\";s:25:\"Lifebuoy Lemon Fresh 150g\";s:5:\"price\";d:45;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:13:\"thumbnail_img\";s:17:\"th_1603436449.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:289;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:13:\"8941100658925\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;}}s:10:\"conditions\";a:0:{}}}}}', '2020-10-20 12:33:02', '2020-10-28 18:35:02', 527, NULL),
('103.218.26.73_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:2:{i:12;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:12;s:4:\"name\";s:25:\"Lifebuoy Lemon Fresh 150g\";s:5:\"price\";d:45;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:13:\"thumbnail_img\";s:17:\"th_1603436449.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:289;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:13:\"8941100658925\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;}}s:10:\"conditions\";a:0:{}}}i:10;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:10;s:4:\"name\";s:25:\"Lifebuoy Lemon Fresh 150g\";s:5:\"price\";d:45;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:13:\"thumbnail_img\";s:17:\"th_1603436449.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:289;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:13:\"8941100658925\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;}}s:10:\"conditions\";a:0:{}}}}}', '2020-10-20 12:35:16', '2020-10-28 18:35:02', 528, NULL),
('103.218.26.73_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:2:{i:12;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:12;s:4:\"name\";s:25:\"Lifebuoy Lemon Fresh 150g\";s:5:\"price\";d:45;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:13:\"thumbnail_img\";s:17:\"th_1603436449.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:289;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:13:\"8941100658925\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;}}s:10:\"conditions\";a:0:{}}}i:10;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:10;s:4:\"name\";s:25:\"Lifebuoy Lemon Fresh 150g\";s:5:\"price\";d:45;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:13:\"thumbnail_img\";s:17:\"th_1603436449.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:289;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:13:\"8941100658925\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;}}s:10:\"conditions\";a:0:{}}}}}', '2020-10-20 12:40:30', '2020-10-28 18:35:02', 529, NULL),
('103.218.26.73_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:2:{i:12;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:12;s:4:\"name\";s:25:\"Lifebuoy Lemon Fresh 150g\";s:5:\"price\";d:45;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:13:\"thumbnail_img\";s:17:\"th_1603436449.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:289;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:13:\"8941100658925\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;}}s:10:\"conditions\";a:0:{}}}i:10;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:10;s:4:\"name\";s:25:\"Lifebuoy Lemon Fresh 150g\";s:5:\"price\";d:45;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:13:\"thumbnail_img\";s:17:\"th_1603436449.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:289;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:13:\"8941100658925\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;}}s:10:\"conditions\";a:0:{}}}}}', '2020-10-20 12:43:52', '2020-10-28 18:35:02', 530, NULL),
('103.218.26.73_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:2:{i:12;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:12;s:4:\"name\";s:25:\"Lifebuoy Lemon Fresh 150g\";s:5:\"price\";d:45;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:13:\"thumbnail_img\";s:17:\"th_1603436449.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:289;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:13:\"8941100658925\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;}}s:10:\"conditions\";a:0:{}}}i:10;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:10;s:4:\"name\";s:25:\"Lifebuoy Lemon Fresh 150g\";s:5:\"price\";d:45;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:13:\"thumbnail_img\";s:17:\"th_1603436449.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:289;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:13:\"8941100658925\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;}}s:10:\"conditions\";a:0:{}}}}}', '2020-10-21 16:58:25', '2020-10-28 18:35:02', 531, NULL),
('103.139.8.6_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:2:{i:6;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:6;s:4:\"name\";s:28:\"Horlicke Jar Chocolate 500gm\";s:5:\"price\";d:350;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:13:\"thumbnail_img\";s:17:\"th_1603350078.jpg\";s:6:\"colors\";N;s:10:\"product_id\";i:256;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:13:\"8906105100282\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;}}s:10:\"conditions\";a:0:{}}}i:11;O:32:\"Darryldecode\\Cart\\ItemCollection\":2:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:19:\"App\\DatabaseStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";i:11;s:4:\"name\";s:25:\"Surf Excel Aloe Vera 500g\";s:5:\"price\";d:85;s:8:\"quantity\";i:1;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":1:{s:8:\"\0*\0items\";a:7:{s:13:\"thumbnail_img\";s:17:\"th_1603518456.png\";s:6:\"colors\";N;s:10:\"product_id\";i:310;s:9:\"variation\";s:9:\"variation\";s:3:\"sku\";s:13:\"8941102310159\";s:10:\"flashdeals\";i:0;s:13:\"flashdealtype\";i:0;}}s:10:\"conditions\";a:0:{}}}}}', '2020-10-25 23:20:34', '2020-10-25 23:21:35', 532, NULL),
('::1_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":1:{s:8:\"\0*\0items\";a:1:{i:310;a:1:{s:8:\"quantity\";i:6;}}}', '2020-11-07 23:28:51', '2020-11-07 23:29:04', 533, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_status` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `page_details`, `meta_tag`, `meta_des`, `page_status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(9, 'Privacy & Policy', '<p>At kineninshop.com, accessible from http://www.kineninshop.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by kineninshop.com and how we use it.</p>\r\n\r\n<p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>\r\n\r\n<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in kineninshop.com. This policy is not applicable to any information collected offline or via channels other than this website</p>\r\n\r\n<h2>Consent</h2>\r\n\r\n<p>By using our website, you hereby consent to our Privacy Policy and agree to its terms. For our Terms and Conditions, please visit the <a href=\"https://www.privacypolicyonline.com/terms-conditions-generator/\">Terms &amp; Conditions Generator</a>.</p>\r\n\r\n<h2>Information we collect</h2>\r\n\r\n<p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>\r\n\r\n<p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>\r\n\r\n<p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>\r\n\r\n<h2>How we use your information</h2>\r\n\r\n<p>We use the information we collect in various ways, including to:</p>\r\n\r\n<ul>\r\n	<li>Provide, operate, and maintain our webste</li>\r\n	<li>Improve, personalize, and expand our webste</li>\r\n	<li>Understand and analyze how you use our webste</li>\r\n	<li>Develop new products, services, features, and functionality</li>\r\n	<li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the webste, and for marketing and promotional purposes</li>\r\n	<li>Send you emails</li>\r\n	<li>Find and prevent fraud</li>\r\n</ul>\r\n\r\n<h2>Log Files</h2>\r\n\r\n<p>kineninshop.com follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services&#39; analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users&#39; movement on the website, and gathering demographic information.</p>\r\n\r\n<h2>Cookies and Web Beacons</h2>\r\n\r\n<p>Like any other website, kineninshop.com uses &#39;cookies&#39;. These cookies are used to store information including visitors&#39; preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users&#39; experience by customizing our web page content based on visitors&#39; browser type and/or other information.</p>\r\n\r\n<p>For more general information on cookies, please read <a href=\"https://www.cookieconsent.com/what-are-cookies/\">&quot;What Are Cookies&quot; from Cookie Consent</a>.</p>\r\n\r\n<h2>Advertising Partners Privacy Policies</h2>\r\n\r\n<p>You may consult this list to find the Privacy Policy for each of the advertising partners of kineninshop.com.</p>\r\n\r\n<p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on kineninshop.com, which are sent directly to users&#39; browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>\r\n\r\n<p>Note that kineninshop.com has no access to or control over these cookies that are used by third-party advertisers.</p>\r\n\r\n<h2>Third Party Privacy Policies</h2>\r\n\r\n<p>kineninshop.com&#39;s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.</p>\r\n\r\n<p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers&#39; respective websites.</p>\r\n\r\n<h2>CCPA Privacy Rights (Do Not Sell My Personal Information)</h2>\r\n\r\n<p>Under the CCPA, among other rights, California consumers have the right to:</p>\r\n\r\n<p>Request that a business that collects a consumer&#39;s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>\r\n\r\n<p>Request that a business delete any personal data about the consumer that a business has collected.</p>\r\n\r\n<p>Request that a business that sells a consumer&#39;s personal data, not sell the consumer&#39;s personal data.</p>\r\n\r\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\r\n\r\n<h2>GDPR Data Protection Rights</h2>\r\n\r\n<p>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>\r\n\r\n<p>The right to access &ndash; You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>\r\n\r\n<p>The right to rectification &ndash; You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>\r\n\r\n<p>The right to erasure &ndash; You have the right to request that we erase your personal data, under certain conditions.</p>\r\n\r\n<p>The right to restrict processing &ndash; You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>\r\n\r\n<p>The right to object to processing &ndash; You have the right to object to our processing of your personal data, under certain conditions.</p>\r\n\r\n<p>The right to data portability &ndash; You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>\r\n\r\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\r\n\r\n<h2>Children&#39;s Information</h2>\r\n\r\n<p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>\r\n\r\n<p>kineninshop.com does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>\r\n\r\n<p>&nbsp;</p>', 'Privacy & Policy', NULL, 1, 0, '2020-11-02 00:37:44', '2020-12-02 23:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$vewRBtV9mR5A3IKOWze1zOyM7KUc.jrer2GGvbA5wzFlBr74w/6ze', '2019-12-17 01:04:10'),
('admin@gmail.com', '$2y$10$vewRBtV9mR5A3IKOWze1zOyM7KUc.jrer2GGvbA5wzFlBr74w/6ze', '2019-12-17 01:04:10'),
('ashiffoysal8818@gmail.com', '$2y$10$PJjBHZgq3rRansM9E0P9SeIdadQgx7YnT4kDJcKVmtJjT.Tzr7xIG', '2020-12-05 18:00:31'),
('nuruddin3940@gmail.com', '$2y$10$kMCWaM6jp3FfezNuizyPQupeiNeknWQr9H5dmfrvkP36ej.H4BglS', '2020-12-05 18:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_place_id` int(100) DEFAULT NULL,
  `address_zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_zip_check` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pass',
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_four_digits` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `funding` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_holder_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_amount` bigint(20) DEFAULT 0,
  `transition_id` bigint(20) DEFAULT NULL,
  `trans_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_amount` bigint(20) DEFAULT NULL,
  `card_issuer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_issuer_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_issuer_country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_trans_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `card_id`, `val_id`, `order_place_id`, `address_zip`, `address_zip_check`, `card_brand`, `expire_month`, `expire_year`, `last_four_digits`, `provider_name`, `country`, `funding`, `card_holder_name`, `pay_amount`, `transition_id`, `trans_date`, `currency_type`, `store_amount`, `card_issuer`, `date`, `card_issuer_country`, `card_issuer_country_code`, `card_type`, `bank_trans_id`, `time`, `created_at`, `updated_at`) VALUES
(103, NULL, '20110916450310x0XV6C5EJ8PeH', NULL, NULL, 'pass', 'MOBILEBANKING', NULL, NULL, NULL, 'SSL-COMMERZ', NULL, NULL, NULL, 256, 92833, NULL, 'BDT', 250, 'BKash Mobile Banking', '09/11/2020', 'Bangladesh', 'BD', 'BKASH-BKash', '201109164503Y3bIPHU68s9Jgp8', '04:43:19', NULL, NULL),
(104, NULL, '201109164712v3Bz5RA0nqv8gyP', NULL, NULL, 'pass', 'MOBILEBANKING', NULL, NULL, NULL, 'SSL-COMMERZ', NULL, NULL, NULL, 235, 91861, NULL, 'BDT', 229, 'BKash Mobile Banking', '09/11/2020', 'Bangladesh', 'BD', 'BKASH-BKash', '2011091647121JcRFcr9TxQdO5z', '04:45:29', NULL, NULL),
(105, NULL, '201109164802TfsrC91LUjRXk4v', NULL, NULL, 'pass', 'MOBILEBANKING', NULL, NULL, NULL, 'SSL-COMMERZ', NULL, NULL, NULL, 640, 82639, NULL, 'BDT', 624, 'BKash Mobile Banking', '09/11/2020', 'Bangladesh', 'BD', 'BKASH-BKash', '201109164802rMQHvtsNBcnJQxK', '04:46:18', NULL, NULL),
(106, NULL, '201109164936QelcpykuSc8xBoE', NULL, NULL, 'pass', 'MOBILEBANKING', NULL, NULL, NULL, 'SSL-COMMERZ', NULL, NULL, NULL, 148, 75714, NULL, 'BDT', 144, 'BKash Mobile Banking', '09/11/2020', 'Bangladesh', 'BD', 'BKASH-BKash', '2011091649361Y3aJiJC6LtvJMr', '04:47:53', NULL, NULL),
(107, NULL, '201109165220AeovDBLX9naIvck', NULL, NULL, 'pass', 'MOBILEBANKING', NULL, NULL, NULL, 'SSL-COMMERZ', NULL, NULL, NULL, 340, 91441, NULL, 'BDT', 332, 'BKash Mobile Banking', '09/11/2020', 'Bangladesh', 'BD', 'BKASH-BKash', '2011091652200t8C67q4Zi9ljRP', '04:50:37', NULL, NULL),
(108, NULL, '20110917580009eEkyg0Em5OKYh', NULL, NULL, 'pass', 'MOBILEBANKING', NULL, NULL, NULL, 'SSL-COMMERZ', NULL, NULL, NULL, 430, 75939, NULL, 'BDT', 419, 'BKash Mobile Banking', '09/11/2020', 'Bangladesh', 'BD', 'BKASH-BKash', '201109175800qeiTyz13aVB05BB', '05:56:17', NULL, NULL),
(109, NULL, '2011091804070unUVMNqBvn8BM1', NULL, NULL, 'pass', 'MOBILEBANKING', NULL, NULL, NULL, 'SSL-COMMERZ', NULL, NULL, NULL, 1906, 80498, NULL, 'BDT', 1858, 'DBBL Mobile Banking', '09/11/2020', 'Bangladesh', 'BD', 'DBBLMOBILEB-Dbbl Mobile Banking', '201109180406bZPgLwlWMAEmhDP', '06:02:23', NULL, NULL),
(110, NULL, '201109181614e8fsa80lPx4rd7o', NULL, NULL, 'pass', 'MOBILEBANKING', NULL, NULL, NULL, 'SSL-COMMERZ', NULL, NULL, NULL, 10040, 78886, NULL, 'BDT', 9789, 'BKash Mobile Banking', '09/11/2020', 'Bangladesh', 'BD', 'BKASH-BKash', '201109181614On1aSvUVroGTdFk', '06:14:31', NULL, NULL),
(111, NULL, '2011111704296UWXD7mpVzlHL4S', NULL, NULL, 'pass', 'MOBILEBANKING', NULL, NULL, NULL, 'SSL-COMMERZ', NULL, NULL, NULL, 220, 72499, NULL, 'BDT', 215, 'BKash Mobile Banking', '11/11/2020', 'Bangladesh', 'BD', 'BKASH-BKash', '201111170429C2jsUOI6eIeJxfI', '05:02:42', NULL, NULL),
(112, NULL, '201119225810050B5p8R9YC7EcF', NULL, NULL, 'pass', 'MOBILEBANKING', NULL, NULL, NULL, 'SSL-COMMERZ', NULL, NULL, NULL, 570, 89646, NULL, 'BDT', 556, 'BKash Mobile Banking', '19/11/2020', 'Bangladesh', 'BD', 'BKASH-BKash', '2011192258101dKJLmD9BTTHTWK', '10:56:10', NULL, NULL),
(113, NULL, '201122174231OOQe03rjAMsQ3G2', NULL, NULL, 'pass', 'MOBILEBANKING', NULL, NULL, NULL, 'SSL-COMMERZ', NULL, NULL, NULL, 318, 98475, NULL, 'BDT', 310, 'BKash Mobile Banking', '22/11/2020', 'Bangladesh', 'BD', 'BKASH-BKash', '2011221742311a7UxstYAidKZho', '05:40:26', NULL, NULL),
(114, NULL, '2011221910060yuPx8Ys3CWPUg4', NULL, NULL, 'pass', 'MOBILEBANKING', NULL, NULL, NULL, 'SSL-COMMERZ', NULL, NULL, NULL, 490, 91690, NULL, 'BDT', 478, 'BKash Mobile Banking', '22/11/2020', 'Bangladesh', 'BD', 'BKASH-BKash', '201122191006aQbyPpZ1NQEyfai', '07:08:02', NULL, NULL),
(115, NULL, '2011291928441aMsWossSCCKVgD', NULL, NULL, 'pass', 'MASTERCARD', NULL, NULL, '545610XXXXXX4362', 'SSL-COMMERZ', NULL, NULL, NULL, 919, 88381, NULL, 'BDT', 896, 'BRAC BANK, LTD.', '29/11/2020', 'Bangladesh', 'BD', 'MASTER-Dutch Bangla', '2011291928440FNjbUQXiomD7ml', '07:26:27', NULL, NULL),
(116, NULL, '2103061139210pjiIJVLpPip23B', NULL, NULL, 'pass', 'MOBILEBANKING', NULL, NULL, NULL, 'SSL-COMMERZ', NULL, NULL, NULL, 150, 94919, NULL, 'BDT', 146, 'BKash Mobile Banking', '06/03/2021', 'Bangladesh', 'BD', 'BKASH-BKash', '2103061139211NBhtHeXWv9okzx', '11:34:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_categoris`
--

CREATE TABLE `post_categoris` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_type` int(11) DEFAULT NULL,
  `grug_type` int(11) DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `cate_id` int(11) NOT NULL,
  `subcate_id` int(11) DEFAULT NULL,
  `resubcate_id` int(11) DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `colors` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variations` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice_options` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allow_product_condition` int(11) DEFAULT NULL,
  `product_condition` int(11) DEFAULT NULL,
  `brand` int(11) DEFAULT NULL,
  `allow_product_measurement` int(11) DEFAULT NULL,
  `product_measurement` int(11) DEFAULT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buy_and_return_policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `today_deal` int(11) NOT NULL DEFAULT 0,
  `select_upload_type` int(11) DEFAULT NULL,
  `upload_file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affiliate_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_quantity` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_duration` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_sale` int(11) DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_type`, `grug_type`, `product_name`, `product_sku`, `product_qty`, `cate_id`, `subcate_id`, `resubcate_id`, `product_price`, `colors`, `variations`, `choice_options`, `allow_product_condition`, `product_condition`, `brand`, `allow_product_measurement`, `product_measurement`, `product_description`, `buy_and_return_policy`, `shipping_time`, `meta_tag`, `meta_description`, `photos`, `thumbnail_img`, `today_deal`, `select_upload_type`, `upload_file`, `upload_link`, `affiliate_link`, `license_type`, `license_key`, `license_quantity`, `license_duration`, `number_of_sale`, `is_deleted`, `slug`, `video`, `status`, `created_at`, `updated_at`) VALUES
(324, 1, 1, 'Radhuni Mustard Oil 250ml', '1060500053', 200, 101, 94, NULL, '65.00', '[]', NULL, '[]', NULL, NULL, 104, NULL, 32, NULL, NULL, NULL, 'Radhuni Mustard Oil 250ml', NULL, '[\"5ffac3de75953.jpg\"]', 'th_1610269662.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Radhuni-Mustard-Oil-250ml', NULL, 1, '2021-01-10 16:07:42', '2021-01-10 16:07:42'),
(325, 1, 1, 'Rupchanda Soybean Oil 5Liter', '1060500055', 200, 101, 94, NULL, '625.00', '[]', NULL, '[]', NULL, NULL, 105, NULL, 10, NULL, NULL, NULL, 'Rupchanda Soybean Oil 5Liter', NULL, '[\"5ffac6587f2cd.jpg\"]', 'th_1610270296.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Rupchanda-Soybean-Oil-5Liter', NULL, 1, '2021-01-10 16:18:16', '2021-01-10 16:18:16'),
(326, 1, 1, 'Rupchanda Soybean Oil 1Liter', '1060500056', 200, 101, 94, NULL, '125.00', '[]', NULL, '[]', NULL, NULL, 105, NULL, 11, NULL, NULL, NULL, 'Rupchanda Soybean Oil 1Liter', NULL, '[\"5ffac79d3979e.jpeg\"]', 'th_1610270621.jpeg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Rupchanda-Soybean-Oil-1Liter', NULL, 1, '2021-01-10 16:23:41', '2021-02-10 16:41:46'),
(327, 1, 1, 'Rupchanda Soybean Oil 2Liter', '1060500069', 200, 101, 94, NULL, '235.00', '[]', NULL, '[]', NULL, NULL, 105, NULL, 12, NULL, NULL, NULL, 'Rupchanda Soybean Oil 2Liter', NULL, '[\"5ffac8b63dbc6.jpg\"]', 'th_1610270902.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Rupchanda-Soybean-Oil-2Liter', NULL, 1, '2021-01-10 16:28:22', '2021-01-10 16:28:22'),
(328, 1, 1, 'Eno Sachet 5g', '1050500002', 200, 102, 95, NULL, '15.00', '[]', NULL, '[]', NULL, NULL, 64, NULL, 34, NULL, NULL, NULL, 'Eno Sachet 5g', NULL, '[\"5ffacfb6d4858.jpeg\"]', 'th_1610272694.jpeg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Eno-Sachet-5g', NULL, 1, '2021-01-10 16:58:15', '2021-01-10 16:58:15'),
(329, 1, 1, 'Teer Soybean Oil 1Liter', '1060500090', 200, 101, 94, NULL, '120.00', '[]', NULL, '[]', NULL, NULL, 119, NULL, 11, NULL, NULL, NULL, 'Teer Soybean Oil 1Liter', NULL, '[\"5ffad0e508343.jpg\"]', 'th_1610272997.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Teer-Soybean-Oil-1Liter', NULL, 1, '2021-01-10 17:03:17', '2021-01-10 17:03:17'),
(330, 1, 1, 'Teer Soybean Oil 2Liter', '1060500091', 200, 101, 94, NULL, '252.00', '[]', NULL, '[]', NULL, NULL, 119, NULL, 12, NULL, NULL, NULL, 'Teer Soybean Oil 2Liter', NULL, '[\"5ffad28241c37.jpg\"]', 'th_1610273410.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Teer-Soybean-Oil-2Liter', NULL, 1, '2021-01-10 17:10:10', '2021-01-10 17:10:10'),
(331, 1, 1, 'Teer Soybean Oil 5Liter', '1060500092', 200, 101, 94, NULL, '615.00', '[]', NULL, '[]', NULL, NULL, 119, NULL, 10, NULL, NULL, NULL, 'Teer Soybean Oil 5Liter', NULL, '[\"5ffad2feaad98.jpg\"]', 'th_1610273534.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Teer-Soybean-Oil-5Liter', NULL, 1, '2021-01-10 17:12:15', '2021-01-10 17:12:15'),
(332, 1, 1, 'NRG Saline', '1050500029', 200, 102, 95, NULL, '6.00', '[]', NULL, '[]', NULL, NULL, 112, NULL, NULL, NULL, NULL, NULL, 'NRG Saline', NULL, '[\"5ffad486d82f6.jpg\"]', 'th_1610273926.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'NRG-Saline', NULL, 1, '2021-01-10 17:18:47', '2021-01-10 17:18:47'),
(333, 1, 1, 'SMC Orsaline  N', '1050500022', 200, 102, 95, NULL, '5.00', '[]', NULL, '[]', NULL, NULL, 112, NULL, NULL, NULL, NULL, NULL, 'SMC Orsaline  N', NULL, '[\"5ffad6eb57098.jpeg\"]', 'th_1610274539.jpeg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'SMC-Orsaline-N', NULL, 1, '2021-01-10 17:28:59', '2021-01-10 17:28:59'),
(334, 1, 1, 'Entacyd Plus  Tablet', '1130100031', 200, 109, 96, NULL, '20.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, NULL, NULL, NULL, NULL, 'Entacyd Plus  Tablet', NULL, '[\"5ffadc773f755.jpg\"]', 'th_1610275959.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Entacyd-Plus-Tablet', NULL, 1, '2021-01-10 17:52:39', '2021-01-10 17:52:39'),
(335, 1, 1, 'Masoor Dal Regular Bulk', '1060200066', 200, 101, 97, NULL, '75.00', '[]', NULL, '[]', NULL, NULL, 126, NULL, 29, NULL, NULL, NULL, 'Masoor Dal Regular Bulk', NULL, '[\"5ffaddd758230.jpg\"]', 'th_1610276311.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Masoor-Dal-Regular-Bulk', NULL, 1, '2021-01-10 17:58:32', '2021-01-10 17:58:32'),
(336, 1, 1, 'Ace XR  Tablet', '1130100029', 200, 109, 96, NULL, '15.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, NULL, NULL, NULL, NULL, 'Ace XR  Tablet', NULL, '[\"5ffade6a5d28e.jpg\"]', 'th_1610276458.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Ace-XR-Tablet', NULL, 1, '2021-01-10 18:00:58', '2021-01-10 18:00:58'),
(337, 1, 1, 'Diploma Milk Powder 1kg', '1040100091', 200, 107, 98, NULL, '650.00', '[]', NULL, '[]', NULL, NULL, 55, NULL, 29, NULL, NULL, NULL, 'Diploma Milk Powder 1kg', NULL, '[\"5ffadee0a476f.jpg\"]', 'th_1610276576.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Diploma-Milk-Powder-1kg', NULL, 1, '2021-01-10 18:02:56', '2021-01-10 18:02:56'),
(338, 1, 1, 'Danish Full Cream Milk Powder 1kg', '1040100060', 200, 107, 98, NULL, '625.00', '[]', NULL, '[]', NULL, NULL, 52, NULL, 29, NULL, NULL, NULL, 'Danish Full Cream Milk Powder 1kg', NULL, '[\"5ffae101078f1.jpg\"]', 'th_1610277121.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Danish-Full-Cream-Milk-Powder-1kg', NULL, 1, '2021-01-10 18:12:01', '2021-01-10 18:12:01'),
(339, 1, 1, 'Marks Milk Powder 250gm', '1040100090', 200, 107, 98, NULL, '180.00', '[]', NULL, '[]', NULL, NULL, 85, NULL, 16, NULL, NULL, NULL, 'Marks Milk Powder 250gm', NULL, '[\"5ffae209ad93d.jpg\"]', 'th_1610277385.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Marks-Milk-Powder-250gm', NULL, 1, '2021-01-10 18:16:26', '2021-01-10 18:16:26'),
(340, 1, 1, 'Fexo Tablet', '1130100040', 200, 109, 96, NULL, '80.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, 35, NULL, NULL, NULL, 'Fexo Tablet', NULL, '[\"5ffae2a9d8b67.jpg\"]', 'th_1610277545.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Fexo-Tablet', NULL, 1, '2021-01-10 18:16:26', '2021-01-10 18:19:06'),
(341, 1, 1, 'Fexo 180mg Tablet', '1130100041', 200, 109, 96, NULL, '100.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, 9, NULL, NULL, NULL, 'Fexo 180mg Tablet', NULL, '[\"5ffae3a09add8.jpg\"]', 'th_1610277792.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Fexo-180mg-Tablet', NULL, 1, '2021-01-10 18:23:12', '2021-01-10 18:23:12'),
(342, 1, 1, 'Ace  Syrup', '1130300008', 50, 109, 96, NULL, '20.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, 45, NULL, NULL, NULL, 'Ace  Syrup', NULL, '[\"5ffae62609a36.jpg\"]', 'th_1610278438.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Ace-Syrup', NULL, 1, '2021-01-10 18:33:58', '2021-01-10 18:33:58'),
(343, 1, 1, 'Bashundhara Atta', '8.94119E+12', 201, 101, NULL, NULL, '70.00', '[]', NULL, '[]', NULL, NULL, 36, NULL, 50, NULL, NULL, NULL, 'Bashundhara Atta', NULL, '[\"5ffaeafe6e80c.jpg\"]', 'th_1610279678.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Bashundhara-Atta', NULL, 1, '2021-01-10 18:54:39', '2021-01-10 18:54:39'),
(344, 1, 1, 'Teer Suji', '1060100117', 200, 101, 99, NULL, '30.00', '[]', NULL, '[]', NULL, NULL, 119, NULL, 7, NULL, NULL, NULL, 'Teer Suji', NULL, '[\"5ffaec97144d7.jpg\"]', 'th_1610280087.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Teer-Suji', NULL, 1, '2021-01-10 19:01:27', '2021-01-10 19:01:27'),
(345, 1, 1, 'Teer Atta', '1060100058', 200, 101, 99, NULL, '36.00', '[]', NULL, '[]', NULL, NULL, 119, NULL, 29, NULL, NULL, NULL, 'Teer Atta', NULL, '[\"5ffaee129a1e5.jpg\"]', 'th_1610280466.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Teer-Atta', NULL, 1, '2021-01-10 19:07:46', '2021-01-10 19:07:46'),
(346, 1, 1, 'Teer Atta', '1060100063', 200, 101, 99, NULL, '70.00', '[]', NULL, '[]', NULL, NULL, 119, NULL, 50, NULL, NULL, NULL, 'Teer Atta', NULL, '[\"5ffaee96865d1.jpg\"]', 'th_1610280598.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Teer-Atta', NULL, 1, '2021-01-10 19:09:58', '2021-01-10 19:09:58'),
(347, 1, 1, 'Teer Maida', '1060100066', 200, 101, 99, NULL, '48.00', '[]', NULL, '[]', NULL, NULL, 119, NULL, 29, NULL, NULL, NULL, 'Teer Maida', NULL, '[\"5ffaef3bea56d.jpg\"]', 'th_1610280764.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Teer-Maida', NULL, 1, '2021-01-10 19:12:44', '2021-01-10 19:12:44'),
(348, 1, 1, 'Teer Maida', '1060100067', 200, 101, 99, NULL, '92.00', '[]', NULL, '[]', NULL, NULL, 119, NULL, 50, NULL, NULL, NULL, 'Teer Maida', NULL, '[\"5ffaef81ed8cc.jpg\"]', 'th_1610280834.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Teer-Maida', NULL, 1, '2021-01-10 19:13:54', '2021-01-10 19:13:54'),
(349, 2, 1, 'Seclo 20 Capsule', '1130200009', 200, 105, 100, NULL, '60.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, 36, NULL, NULL, NULL, 'Seclo 20 Capsule', NULL, '[\"5ffaef8ea91b8.jpg\"]', 'th_1610280846.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Seclo-20-Capsule', NULL, 1, '2021-01-10 19:14:06', '2021-01-10 19:14:06'),
(350, 1, 1, 'Danish Lexus Biscuit', '1020100196', 200, 108, 104, NULL, '100.00', '[]', NULL, '[]', NULL, NULL, 52, NULL, 51, NULL, NULL, NULL, 'Danish Lexus Biscuit', NULL, '[\"5ffaf07fa5612.jpg\"]', 'th_1610281087.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Danish-Lexus-Biscuit', NULL, 1, '2021-01-10 19:18:07', '2021-01-10 19:18:07'),
(351, 1, 1, 'Seclo 40 Capsule', '1130200010', 200, 105, 100, NULL, '90.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, 37, NULL, NULL, NULL, 'Seclo 40 Capsule', NULL, '[\"5ffaf222c432a.jpg\"]', 'th_1610281506.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Seclo-40-Capsule', NULL, 1, '2021-01-10 19:25:07', '2021-01-10 19:25:07'),
(352, 1, 1, 'Olympic Nutty Biscuit', '1020100335', 200, 108, 104, NULL, '50.00', '[]', NULL, '[]', NULL, NULL, 93, NULL, 16, NULL, NULL, NULL, 'Olympic Nutty Biscuit', NULL, '[\"5ffaf253e71ea.jpg\"]', 'th_1610281556.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Olympic-Nutty-Biscuit', NULL, 1, '2021-01-10 19:25:56', '2021-01-10 19:25:56'),
(353, 1, 1, 'Olympic Nutty Biscuits', '1020100561', 200, 108, 104, NULL, '15.00', '[]', NULL, '[]', NULL, NULL, 93, NULL, 52, NULL, NULL, NULL, 'Olympic Nutty Biscuits', NULL, '[\"5ffaf3431a77a.jpg\"]', 'th_1610281795.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Olympic-Nutty-Biscuits', NULL, 1, '2021-01-10 19:29:55', '2021-01-10 19:29:55'),
(354, 1, 1, 'Olympic Chocolate Plus Biscuit', '1020100295', 200, 108, 104, NULL, '10.00', '[]', NULL, '[]', NULL, NULL, 93, NULL, 53, NULL, NULL, NULL, 'Olympic Chocolate Plus Biscuit', NULL, '[\"5ffaf3fe3ae98.jpg\"]', 'th_1610281982.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Olympic-Chocolate-Plus-Biscuit', NULL, 1, '2021-01-10 19:33:02', '2021-01-10 19:33:02'),
(355, 1, 1, 'Adovas Syrup', '1130300010', 50, 105, 105, NULL, '65.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, 46, NULL, NULL, NULL, 'Adovas Syrup', NULL, '[\"5ffaf60506f01.jpg\"]', 'th_1610282501.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Adovas-Syrup', NULL, 1, '2021-01-10 19:41:41', '2021-01-10 19:41:41'),
(356, 1, 1, 'Alatrol  Tablet', '1130100032', 201, 105, 106, NULL, '30.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, 38, NULL, NULL, NULL, 'Alatrol  Tablet', NULL, '[\"5ffaf6dd6d7a8.jpg\"]', 'th_1610282717.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Alatrol-Tablet', NULL, 1, '2021-01-10 19:45:17', '2021-01-10 19:45:17'),
(357, 1, 1, 'Sprite Can', '1050400080', 200, 102, 107, NULL, '40.00', '[]', NULL, '[]', NULL, NULL, 45, NULL, 32, NULL, NULL, NULL, 'Sprite Can', NULL, '[\"5ffaf74846b04.jpg\"]', 'th_1610282824.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sprite-Can', NULL, 1, '2021-01-10 19:47:04', '2021-01-10 19:47:04'),
(358, 1, 1, 'Mojo', '1050400078', 200, 102, 107, NULL, '16.00', '[]', NULL, '[]', NULL, NULL, 34, NULL, 32, NULL, NULL, NULL, 'Mojo', NULL, '[\"5ffaf7b6f1913.jpg\"]', 'th_1610282935.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Mojo', NULL, 1, '2021-01-10 19:48:55', '2021-01-10 19:48:55'),
(359, 1, 1, 'Alatrol Syrup', '1130300016', 51, 105, 106, NULL, '30.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, 46, NULL, NULL, NULL, 'Alatrol Syrup', NULL, '[\"5ffaf7ee287f7.jpg\"]', 'th_1610282990.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Alatrol-Syrup', NULL, 1, '2021-01-10 19:49:50', '2021-01-10 19:49:50'),
(360, 2, 1, 'Calbo-D Tablet', '1130100058', 50, 105, 109, NULL, '210.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, NULL, NULL, NULL, NULL, 'Calbo-D Tablet', NULL, '[\"5ffb1a6b6b070.jpg\"]', 'th_1610291819.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Calbo-D-Tablet', NULL, 1, '2021-01-10 22:16:59', '2021-01-10 22:16:59'),
(361, 1, 1, 'Pepsi', '1050400082', 200, 102, 107, NULL, '35.00', '[]', NULL, '[]', NULL, NULL, 98, NULL, 13, NULL, NULL, NULL, 'Pepsi', NULL, '[\"5ffb1cb1452a2.jpg\"]', 'th_1610292401.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Pepsi', NULL, 1, '2021-01-10 22:26:41', '2021-01-10 22:26:41'),
(362, 2, 1, 'Ceevit Tablet', '1130100033', 200, 105, 110, NULL, '20.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, 40, NULL, NULL, NULL, 'Ceevit Tablet', NULL, '[\"5ffb1d0df3cd8.png\"]', 'th_1610292494.png', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Ceevit-Tablet', NULL, 1, '2021-01-10 22:28:14', '2021-01-10 22:28:14'),
(363, 1, 1, 'Ambrox Syrup', '1130300059', 50, 105, 113, NULL, '50.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, 46, NULL, NULL, NULL, 'Ambrox Syrup', NULL, '[\"5ffb1f3405e7b.jpg\"]', 'th_1610293044.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Ambrox-Syrup', NULL, 1, '2021-01-10 22:37:24', '2021-01-10 22:37:24'),
(364, 1, 1, 'Teer Sugar Pack', '82046653310', 200, 101, 112, NULL, '72.00', '[]', NULL, '[]', NULL, NULL, 119, NULL, 29, NULL, NULL, NULL, 'Salt Sugar Goor', NULL, '[\"5ffb2047c4b9c.jpg\"]', 'th_1610293319.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Teer-Sugar-Pack', NULL, 1, '2021-01-10 22:42:00', '2021-01-10 22:42:00'),
(365, 1, 1, 'Fresh Refined Sugar', '1060300020', 200, 101, 112, NULL, '70.00', '[]', NULL, '[]', NULL, NULL, 61, NULL, 29, NULL, NULL, NULL, 'Fresh Refined Sugar', NULL, '[\"5ffb20ab37789.jpg\"]', 'th_1610293419.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Fresh-Refined-Sugar', NULL, 1, '2021-01-10 22:43:39', '2021-01-10 22:43:39'),
(366, 2, 1, 'Ace Plus Tablet', '1130100027', 200, 105, 114, NULL, '25.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, NULL, NULL, NULL, NULL, 'Ace Plus Tablet', NULL, '[\"5ffb231e9b6df.jpg\"]', 'th_1610294046.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Ace-Plus-Tablet', NULL, 1, '2021-01-10 22:54:06', '2021-01-10 22:54:06'),
(367, 1, 1, 'Ispahani Mirzapore Best Leaf Tea', '1050200051', 200, 101, 115, NULL, '110.00', '[]', NULL, '[]', NULL, NULL, 72, NULL, 30, NULL, NULL, NULL, 'Ispahani Mirzapore Best Leaf Tea', NULL, '[\"5ffb244cf17d7.jpg\"]', 'th_1610294349.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 'Ispahani-Mirzapore-Best-Leaf-Tea', NULL, 1, '2021-01-10 22:59:09', '2021-01-10 22:59:49'),
(368, 1, 1, 'Ispahani Mirzapore Best Leaf Tea', '1050200051', 200, 101, 115, NULL, '110.00', '[]', NULL, '[]', NULL, NULL, 72, NULL, 30, NULL, NULL, NULL, 'Ispahani Mirzapore Best Leaf Tea', NULL, '[\"5ffb244ee21a6.jpg\"]', 'th_1610294350.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Ispahani-Mirzapore-Best-Leaf-Tea', NULL, 1, '2021-01-10 22:59:11', '2021-01-10 22:59:11'),
(369, 1, 1, 'Ispahani Mirzapore Best Leaf Tea', '1050200052', 200, 101, 115, NULL, '230.00', '[]', NULL, '[]', NULL, NULL, 72, NULL, 7, NULL, NULL, NULL, 'Ispahani Mirzapore Best Leaf Tea', NULL, '[\"5ffb2ab15e09b.jpg\"]', 'th_1610295985.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Ispahani-Mirzapore-Best-Leaf-Tea', NULL, 1, '2021-01-10 23:26:25', '2021-01-10 23:26:25'),
(370, 1, 1, 'Taaza Brooke Bond Tea Poly', '1050200067', 200, 101, 115, NULL, '199.00', '[]', NULL, '[]', NULL, NULL, 122, NULL, 8, NULL, NULL, NULL, 'Taaza Brooke Bond Tea Poly', NULL, '[\"5ffb2b9d982eb.jpg\"]', 'th_1610296221.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Taaza-Brooke-Bond-Tea-Poly', NULL, 1, '2021-01-10 23:30:21', '2021-01-10 23:30:21'),
(371, 1, 1, 'Taaza Brooke Bond Tea Poly', '1050200066', 200, 101, 115, NULL, '100.00', '[]', NULL, '[]', NULL, NULL, 122, NULL, 30, NULL, NULL, NULL, 'Taaza Brooke Bond Tea Poly', NULL, '[\"5ffb2c5bbeb4e.jpg\"]', 'th_1610296411.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Taaza-Brooke-Bond-Tea-Poly', NULL, 1, '2021-01-10 23:33:31', '2021-01-10 23:33:31'),
(372, 2, 1, 'Ace Tablet', '1130100028', 200, 105, 114, NULL, '10.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, 39, NULL, NULL, NULL, 'Ace Tablet', NULL, '[\"5ffb369346b72.jpg\"]', 'th_1610299027.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Ace-Tablet', NULL, 1, '2021-01-11 00:17:07', '2021-01-11 00:17:07'),
(373, 1, 1, 'Flacol Pediatric Drops', '1130400002', 50, 105, 118, NULL, '35.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, NULL, NULL, NULL, NULL, 'Flacol Pediatric Drops', NULL, '[\"5ffb37794f504.jpg\"]', 'th_1610299257.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Flacol-Pediatric-Drops', NULL, 1, '2021-01-11 00:20:57', '2021-01-11 00:20:57'),
(374, 2, 1, 'Losectil 20 Capsule', '1130200011', 200, 105, 100, NULL, '50.00', '[]', NULL, '[]', NULL, NULL, 128, NULL, 36, NULL, NULL, NULL, 'Losectil Capsule', NULL, '[\"5ffc2c2e7f8d4.jpg\"]', 'th_1610361903.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Losectil-20-Capsule', NULL, 1, '2021-01-11 17:45:03', '2021-01-11 17:45:03'),
(375, 2, 1, 'Fenadin 120 Tablet', '1130100055', 200, 105, 119, NULL, '80.00', '[]', NULL, '[]', NULL, NULL, 133, NULL, 35, NULL, NULL, NULL, 'Fenadin 120 Tablet', NULL, '[\"5ffc30281c9ff.jpg\"]', 'th_1610362920.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Fenadin-120-Tablet', NULL, 1, '2021-01-11 18:02:00', '2021-01-11 18:02:00'),
(376, 2, 1, 'Devas Herbal Cough Syrup', '1130300011', 50, 105, 105, NULL, '70.00', '[]', NULL, '[]', NULL, NULL, 131, NULL, 46, NULL, NULL, NULL, 'Devas Herbal Cough Syrup', NULL, '[\"5ffc3280ae465.jpg\"]', 'th_1610363521.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Devas-Herbal-Cough-Syrup', NULL, 1, '2021-01-11 18:12:04', '2021-01-11 18:12:04'),
(377, 2, 1, 'Finix 20 Tablet', '1130100025', 200, 105, 102, NULL, '140.00', '[]', NULL, '[]', NULL, NULL, 132, NULL, 36, NULL, NULL, NULL, 'Finix20 Tablet', NULL, '[\"5ffc363b6769b.png\"]', 'th_1610364475.png', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Finix-20-Tablet', NULL, 1, '2021-01-11 18:27:56', '2021-01-11 18:27:56'),
(378, 2, 1, 'Exium 20 Capsule', '1130200015', 200, 105, 101, NULL, '85.00', '[]', NULL, '[]', NULL, NULL, 129, NULL, 36, NULL, NULL, NULL, 'Exium 20 Capsule', NULL, '[\"5ffc371e74777.jpg\"]', 'th_1610364702.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Exium-20-Capsule', NULL, 1, '2021-01-11 18:31:42', '2021-01-11 18:31:42'),
(379, 2, 1, 'Esonix 20 Tablet', '1130100053', 200, 105, 101, NULL, '70.00', '[]', NULL, '[]', NULL, NULL, 130, NULL, 36, NULL, NULL, NULL, 'Esonix 20 Tablet', NULL, '[\"5ffc382485050.jpg\"]', 'th_1610364964.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Esonix-20-Tablet', NULL, 1, '2021-01-11 18:36:04', '2021-01-11 18:36:04'),
(380, 2, 1, 'Esonix 20 Capsule', '1130200028', 200, 105, NULL, NULL, '56.00', '[]', NULL, '[]', NULL, NULL, 130, NULL, 36, NULL, NULL, NULL, 'Esonix 20 Capsule', NULL, '[\"5ffc447f40c06.jpg\"]', 'th_1610368127.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Esonix-20-Capsule', NULL, 1, '2021-01-11 19:28:47', '2021-01-11 19:28:47'),
(381, 2, 1, 'Osartil 50 Tablet', '1130100109', 200, 105, 120, NULL, '80.00', '[]', NULL, '[]', NULL, NULL, 130, NULL, 42, NULL, NULL, NULL, 'Osartil 50 Tablet', NULL, '[\"5ffc498cbd93e.jpg\"]', 'th_1610369421.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Osartil-50-Tablet', NULL, 1, '2021-01-11 19:50:22', '2021-01-11 19:50:22'),
(382, 2, 1, 'Pantonix 20 Tablet', '1130100037', 200, 105, 103, NULL, '84.00', '[]', NULL, '[]', NULL, NULL, 130, NULL, 36, NULL, NULL, NULL, 'Pantonix 20 Tablet', NULL, '[\"5ffc4b74916d7.jpg\"]', 'th_1610369908.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Pantonix-20-Tablet', NULL, 1, '2021-01-11 19:58:28', '2021-01-11 19:58:28'),
(383, 2, 1, 'E-Cap 200 Liquid Filled Capsule', '1130200018', 200, 105, 121, NULL, '45.00', '[]', NULL, '[]', NULL, NULL, 131, NULL, NULL, NULL, NULL, NULL, 'E-Cap 200 Liquid Filled Capsule', NULL, '[\"5ffd3ab24cfc3.jpg\"]', 'th_1610431154.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'E-Cap-200-Liquid-Filled-Capsule', NULL, 1, '2021-01-12 12:59:14', '2021-01-12 12:59:14'),
(384, 2, 1, 'E-Cap 400 Liquid Filled Capsule', '1130200017', 200, 105, 121, NULL, '65.00', '[]', NULL, '[]', NULL, NULL, 131, NULL, NULL, NULL, NULL, NULL, 'E-Cap 400 Liquid Filled Capsule', NULL, '[\"5ffd3b7cde98a.jpg\"]', 'th_1610431357.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'E-Cap-400-Liquid-Filled-Capsule', NULL, 1, '2021-01-12 13:02:37', '2021-01-12 13:02:37'),
(385, 2, 1, 'Sergel 20 Capsules', '1130200019', 200, 105, 101, NULL, '70.00', '[]', NULL, '[]', NULL, NULL, 134, NULL, 36, NULL, NULL, NULL, 'Sergel 20 Capsules', NULL, '[\"5ffd3c280e752.jpg\"]', 'th_1610431528.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sergel-20-Capsules', NULL, 1, '2021-01-12 13:05:28', '2021-01-12 13:05:28'),
(386, 2, 1, 'Sergel 40 Capsules', '1130200020', 200, 105, 101, NULL, '100.00', '[]', NULL, '[]', NULL, NULL, 134, NULL, 37, NULL, NULL, NULL, 'Sergel 40 Capsules', NULL, '[\"5ffd3cbf9f589.jpg\"]', 'th_1610431679.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sergel-40-Capsules', NULL, 1, '2021-01-12 13:07:59', '2021-01-12 13:07:59'),
(387, 2, 1, 'Xorel 20 Tablet', '1130100050', 200, 105, 102, NULL, '30.00', '[]', NULL, '[]', NULL, NULL, 135, NULL, 36, NULL, NULL, NULL, 'Xorel 20 Tablet', NULL, '[\"5ffd3dbd53aa7.jpg\"]', 'th_1610431933.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Xorel-20-Tablet', NULL, 1, '2021-01-12 13:12:13', '2021-01-12 13:12:13'),
(388, 2, 1, 'Xorel 20 Capsule', '1130200027', 200, 105, 102, NULL, '40.00', '[]', NULL, '[]', NULL, NULL, 135, NULL, 37, NULL, NULL, NULL, 'Xorel 20 Capsule', NULL, '[\"5ffd3ec75ee74.jpg\"]', 'th_1610432199.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Xorel-20-Capsule', NULL, 1, '2021-01-12 13:16:39', '2021-03-09 10:24:56'),
(389, 2, 1, 'Napa Extra  Tablet', '1130100020', 200, 105, 114, NULL, '15.00', '[]', NULL, '[]', NULL, NULL, 136, NULL, NULL, NULL, NULL, NULL, 'Napa Extra  Tablet', NULL, '[\"5ffd40d742a49.jpg\"]', 'th_1610432727.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Napa-Extra-Tablet', NULL, 1, '2021-01-12 13:25:27', '2021-01-12 13:25:27'),
(390, 2, 1, 'Oradin  Tablet', '1130100049', 200, 105, 122, NULL, '40.00', '[]', NULL, '[]', NULL, NULL, 128, NULL, NULL, NULL, NULL, NULL, 'Oradin  Tablet', NULL, '[\"5ffd42016d671.jpg\"]', 'th_1610433025.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Oradin-Tablet', NULL, 1, '2021-01-12 13:30:25', '2021-01-12 13:30:25'),
(391, 2, 1, 'Tusca Plus Syrup', '1130300012', 50, 105, 123, NULL, '80.00', '[]', NULL, '[]', NULL, NULL, 127, NULL, NULL, NULL, NULL, NULL, 'Tusca Plus Syrup', NULL, '[\"5ffd453c77ac2.jpg\"]', 'th_1610433852.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Tusca-Plus-Syrup', NULL, 1, '2021-01-12 13:44:12', '2021-01-12 13:44:12'),
(392, 2, 1, 'Maxpro 20 Tablet', '1130100043', 200, 105, 101, NULL, '98.00', '[]', NULL, '[]', NULL, NULL, 133, NULL, 36, NULL, NULL, NULL, 'Maxpro 20 Tablet', NULL, '[\"5ffd49daee26c.png\"]', 'th_1610435035.png', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Maxpro-20-Tablet', NULL, 1, '2021-01-12 14:03:55', '2021-01-12 14:03:55'),
(393, 2, 1, 'Maxpro 40 Tablet', '1130100044', 200, 105, 101, NULL, '90.00', '[]', NULL, '[]', NULL, NULL, 133, NULL, 37, NULL, NULL, NULL, 'Maxpro 40 Tablet', NULL, '[\"5ffd4a6e19aac.jpg\"]', 'th_1610435182.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Maxpro-40-Tablet', NULL, 1, '2021-01-12 14:06:22', '2021-01-12 14:06:22'),
(394, 2, 1, 'Maxpro 20 Capsule', '1130200025', 200, 105, 101, NULL, '98.00', '[]', NULL, '[]', NULL, NULL, 133, NULL, 36, NULL, NULL, NULL, 'Maxpro 20 Capsule', NULL, '[\"5ffd4b2477267.png\"]', 'th_1610435364.png', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Maxpro-20-Capsule', NULL, 1, '2021-01-12 14:09:24', '2021-01-12 14:09:24'),
(395, 2, 1, 'Maxpro 40 Capsule', '1130200026', 200, 105, 101, NULL, '100.00', '[]', NULL, '[]', NULL, NULL, 133, NULL, 37, NULL, NULL, NULL, 'Maxpro 40 Capsule', NULL, '[\"5ffd4c3a56003.jpg\"]', 'th_1610435642.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Maxpro-40-Capsule', NULL, 1, '2021-01-12 14:14:02', '2021-01-12 14:14:02'),
(396, 2, 1, 'Losectil 20 Oral Powder', '1050500030', 200, 105, 101, NULL, '6.00', '[]', NULL, '[]', NULL, NULL, 128, NULL, 36, NULL, NULL, NULL, 'Losectil 20 Oral Powder', NULL, '[\"5ffd4ce7da92c.jpg\"]', 'th_1610435815.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Losectil-20-Oral-Powder', NULL, 1, '2021-01-12 14:16:56', '2021-02-10 16:30:43'),
(397, 2, 1, 'Napa  Drop', '1130400005', 50, 105, 114, NULL, '15.00', '[]', NULL, '[]', NULL, NULL, 136, NULL, NULL, NULL, NULL, NULL, 'Napa  Drop', NULL, '[\"5ffd4e1150773.jpg\"]', 'th_1610436113.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Napa-Drop', NULL, 1, '2021-01-12 14:21:53', '2021-02-10 16:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_licenses`
--

CREATE TABLE `product_licenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `license_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_quantity` int(11) DEFAULT NULL,
  `license_duration` int(11) DEFAULT NULL,
  `license_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_licenses`
--

INSERT INTO `product_licenses` (`id`, `product_id`, `license_key`, `license_quantity`, `license_duration`, `license_price`, `created_at`, `updated_at`) VALUES
(221, 215, 'usdfgdsfhdfsdf', 10, 60, NULL, '2020-09-12 04:51:29', NULL),
(222, 215, 'fsdfdfsdfsdf', 65, 90, NULL, '2020-09-12 04:51:29', NULL),
(223, 215, 'dfdsfdfsdf', 60, 18, NULL, '2020-09-12 04:51:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` int(11) NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `name`, `description`, `review`, `email`, `product_id`, `created_at`, `updated_at`) VALUES
(16, 'jghjghj ghjgjj', 'asif foysal', 4, 'ashif@gmail.com', 215, NULL, NULL),
(17, 'hgfh', 'fghfghgf', 5, 'fghh@gamil.com', 215, NULL, NULL),
(18, 'jghjghj ghjgjj', 'kk', 2, 'ashif@gmail.com', 215, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_storages`
--

CREATE TABLE `product_storages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_amount` bigint(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_storages`
--

INSERT INTO `product_storages` (`id`, `product_details`, `order_id`, `user_id`, `shipping_amount`, `created_at`, `updated_at`) VALUES
(192, '[{\"id\":179,\"name\":\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":9000,\"quantity\":1,\"sku\":\"p-138775\",\"flashdeals\":0,\"flashdealtype\":0}]', '94469', '70', 3500, '2020-04-01 15:24:51', NULL),
(193, '[{\"id\":179,\"name\":\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":9000,\"quantity\":1,\"sku\":\"p-138775\",\"flashdeals\":0,\"flashdealtype\":0}]', '43915', '70', 3500, '2020-04-01 15:27:28', NULL),
(194, '[{\"id\":179,\"name\":\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":9000,\"quantity\":1,\"sku\":\"p-138775\",\"flashdeals\":0,\"flashdealtype\":0}]', '6831', '70', 3500, '2020-04-01 15:29:56', NULL),
(195, '[{\"id\":179,\"name\":\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":9000,\"quantity\":1,\"sku\":\"p-138775\",\"flashdeals\":0,\"flashdealtype\":0}]', '16244', '70', 3500, '2020-04-01 15:30:58', NULL),
(196, '[{\"id\":179,\"name\":\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":9000,\"quantity\":1,\"sku\":\"p-138775\",\"flashdeals\":0,\"flashdealtype\":0}]', '84850', '70', 3500, '2020-04-01 15:32:53', NULL),
(197, '[{\"id\":179,\"name\":\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":9000,\"quantity\":1,\"sku\":\"p-138775\",\"flashdeals\":0,\"flashdealtype\":0}]', '21178', '70', 3500, '2020-04-01 15:33:13', NULL),
(198, '[{\"id\":178,\"name\":\"Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":1700,\"quantity\":1,\"sku\":\"-green-l\",\"flashdeals\":0,\"flashdealtype\":0}]', '63852', '35', 3500, '2020-04-01 15:42:10', NULL),
(199, '[{\"id\":179,\"name\":\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":9000,\"quantity\":1,\"sku\":\"p-138775\",\"flashdeals\":0,\"flashdealtype\":0}]', '2583', '70', 3500, '2020-04-01 15:47:05', NULL),
(200, '[{\"id\":179,\"name\":\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":7200,\"quantity\":1,\"sku\":\"p-138775\",\"flashdeals\":20,\"flashdealtype\":2}]', '41055', '70', 3500, '2020-04-01 17:56:46', NULL),
(201, '[{\"id\":178,\"name\":\"Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":40,\"quantity\":1,\"sku\":\"kik8876654334567\",\"flashdeals\":60,\"flashdealtype\":null}]', '75351', '70', 3500, '2020-04-02 01:12:39', NULL),
(202, '[{\"id\":179,\"name\":\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":7200,\"quantity\":1,\"sku\":\"p-138775\",\"flashdeals\":20,\"flashdealtype\":null}]', '68636', '70', 3500, '2020-04-02 01:20:32', NULL),
(203, '[{\"id\":190,\"name\":\"took a galley of type and scrambled it to\",\"price\":400,\"quantity\":1,\"sku\":\"kik74747\",\"flashdeals\":0,\"flashdealtype\":null}]', '79657', '70', 3500, '2020-04-02 01:21:25', NULL),
(204, '[{\"id\":179,\"name\":\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":7200,\"quantity\":1,\"sku\":\"p-138775\",\"flashdeals\":20,\"flashdealtype\":null}]', '67584', '70', 3500, '2020-04-02 12:18:24', NULL),
(205, '[{\"id\":183,\"name\":\"mply dummy text of the printing and typesetting\",\"price\":1997,\"quantity\":1,\"sku\":\"-5\",\"flashdeals\":3,\"flashdealtype\":1}]', '585', '70', 3500, '2020-04-02 12:48:33', NULL),
(206, '[{\"id\":186,\"name\":\"mply dummy text of the printing and typesetting\",\"price\":496,\"quantity\":1,\"sku\":\"kk4736\",\"flashdeals\":4,\"flashdealtype\":1}]', '45063', '35', 3500, '2020-04-02 20:28:45', NULL),
(207, '[{\"id\":189,\"name\":\"when an unknown printer took a galley of type and scrambled it to\",\"price\":300,\"quantity\":1,\"sku\":\"polo999\",\"flashdeals\":0,\"flashdealtype\":0}]', '51451', '35', 3500, '2020-04-02 20:30:41', NULL),
(208, '[{\"id\":187,\"name\":\"mply dummy text of the printing and typesetting\",\"price\":994,\"quantity\":1,\"sku\":\"new345\",\"flashdeals\":6,\"flashdealtype\":1}]', '47111', '35', 3500, '2020-04-02 20:34:47', NULL),
(209, '[{\"id\":197,\"name\":\"when an unknown printer took a galley of type and scrambled\",\"price\":3000,\"quantity\":1,\"sku\":\"polo6869\",\"flashdeals\":0,\"flashdealtype\":0}]', '8208', '35', 3500, '2020-04-02 20:38:22', NULL),
(210, '[{\"id\":197,\"name\":\"when an unknown printer took a galley of type and scrambled\",\"price\":3000,\"quantity\":1,\"sku\":\"polo6869\",\"flashdeals\":0,\"flashdealtype\":0}]', '98231', '70', 3500, '2020-04-02 20:40:58', NULL),
(211, '[{\"id\":186,\"name\":\"mply dummy text of the printing and typesetting\",\"price\":496,\"quantity\":1,\"sku\":\"kk4736\",\"flashdeals\":4,\"flashdealtype\":1}]', '9013', '70', 3500, '2020-04-02 20:43:44', NULL),
(212, '[{\"id\":179,\"name\":\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":7200,\"quantity\":1,\"sku\":\"p-138775\",\"flashdeals\":20,\"flashdealtype\":null}]', '79366', '70', 3500, '2020-04-03 01:32:24', NULL),
(213, '[{\"id\":208,\"name\":\"Great feeling spa and massage\",\"price\":7000,\"quantity\":4,\"sku\":\"KN253525\",\"flashdeals\":0,\"flashdealtype\":null}]', '21077', '70', 3500, '2020-04-03 03:33:39', NULL),
(214, '[{\"id\":187,\"name\":\"mply dummy text of the printing and typesetting\",\"price\":994,\"quantity\":4,\"sku\":\"new345\",\"flashdeals\":6,\"flashdealtype\":1}]', '62028', '70', 3500, '2020-04-03 03:41:34', NULL),
(215, '[{\"id\":181,\"name\":\"mply dummy text of the printing and typesetting\",\"price\":4500,\"quantity\":4,\"sku\":\"-5-2\",\"flashdeals\":10,\"flashdealtype\":2}]', '56106', '70', 3500, '2020-04-03 04:08:04', NULL),
(216, '[{\"id\":208,\"name\":\"Great feeling spa and massage\",\"price\":7000,\"quantity\":1,\"sku\":\"KN253525\",\"flashdeals\":0,\"flashdealtype\":null}]', '80347', '70', 3500, '2020-04-03 15:04:58', NULL),
(217, '[{\"id\":206,\"name\":\"Our real home\",\"price\":10000,\"quantity\":8,\"sku\":\"KN58854\",\"flashdeals\":0,\"flashdealtype\":0},{\"id\":178,\"name\":\"Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":40,\"quantity\":1,\"sku\":\"kik8876654334567\",\"flashdeals\":60,\"flashdealtype\":2}]', '70260', '70', 3500, '2020-04-04 20:49:05', NULL),
(218, '[{\"id\":189,\"name\":\"when an unknown printer took a galley of type and scrambled it to\",\"price\":300,\"quantity\":1,\"sku\":\"polo999\",\"flashdeals\":0,\"flashdealtype\":0}]', '68840', '70', 3500, '2020-05-03 11:19:11', NULL),
(219, '[{\"id\":179,\"name\":\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":7200,\"quantity\":2,\"sku\":\"p-138775\",\"flashdeals\":20,\"flashdealtype\":2},{\"id\":179,\"name\":\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":7200,\"quantity\":3,\"sku\":\"p-138775\",\"flashdeals\":20,\"flashdealtype\":2}]', '83228', '70', 3500, '2020-05-05 11:10:05', NULL),
(220, '[{\"id\":179,\"name\":\"-33% Iste Natus Error Sit Volupta Accusan Dolo Remque\",\"price\":7200,\"quantity\":8,\"sku\":\"p-138775\",\"flashdeals\":20,\"flashdealtype\":2}]', '18090', '70', 3500, '2020-05-05 11:13:08', NULL),
(221, '[{\"id\":187,\"name\":\"mply dummy text of the printing and typesetting\",\"price\":994,\"quantity\":1,\"sku\":\"new345\",\"flashdeals\":6,\"flashdealtype\":1},{\"id\":196,\"name\":\"when an unknown printer took a galley of type and scrambled\",\"price\":1000,\"quantity\":1,\"sku\":\"kokok787654\",\"flashdeals\":0,\"flashdealtype\":0}]', '58151', '35', 3500, '2020-06-08 01:42:11', NULL),
(222, '[{\"id\":181,\"name\":\"mply dummy text of the printing and typesetting\",\"price\":4500,\"quantity\":1,\"sku\":\"new333\",\"flashdeals\":10,\"flashdealtype\":2},{\"id\":181,\"name\":\"mply dummy text of the printing and typesetting\",\"price\":4500,\"quantity\":1,\"sku\":\"new333\",\"flashdeals\":10,\"flashdealtype\":2}]', '28444', '35', 3500, '2020-06-09 15:44:20', NULL),
(223, '[{\"id\":200,\"name\":\"when an unknown printer took a galley of type and scrambled\",\"price\":1000,\"quantity\":1,\"sku\":\"fhsdfd76556\",\"flashdeals\":0,\"flashdealtype\":0},{\"id\":199,\"name\":\"when an unknown printer took a galley of type and scrambled\",\"price\":10000,\"quantity\":1,\"sku\":\"100-9io\",\"flashdeals\":0,\"flashdealtype\":0},{\"id\":185,\"name\":\"mply dummy text of the printing and typesetting\",\"price\":496,\"quantity\":1,\"sku\":\"345345\",\"flashdeals\":4,\"flashdealtype\":1},{\"id\":183,\"name\":\"mply dummy text of the printing and typesetting\",\"price\":1997,\"quantity\":1,\"sku\":\"-5\",\"flashdeals\":3,\"flashdealtype\":1},{\"id\":187,\"name\":\"mply dummy text of the printing and typesetting\",\"price\":994,\"quantity\":1,\"sku\":\"new345\",\"flashdeals\":6,\"flashdealtype\":1}]', '99672', '35', 3500, '2020-06-09 16:03:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `refund_reasons`
--

CREATE TABLE `refund_reasons` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `refund_reason` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `return_all_products`
--

CREATE TABLE `return_all_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `products` text DEFAULT NULL,
  `quantity` varchar(191) DEFAULT NULL,
  `price` varchar(191) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `return_products`
--

CREATE TABLE `return_products` (
  `id` int(11) NOT NULL,
  `orderrid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` varchar(191) DEFAULT NULL,
  `quantity` varchar(191) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `re_sub_categories`
--

CREATE TABLE `re_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resubcate_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resubcate_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resubcate_tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cate_id` int(11) NOT NULL,
  `subcate_id` int(11) DEFAULT NULL,
  `resubcate_status` int(11) NOT NULL DEFAULT 1,
  `resubcate_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_verification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bing_verification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alexa_analytic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `meta_title`, `meta_author`, `meta_description`, `meta_key`, `google_verification`, `bing_verification`, `google_analytic`, `alexa_analytic`, `created_at`, `updated_at`) VALUES
(2, 'Kinenin Shop - Best Online Grocery, Food, Medicine Shop', 'Kinenin Shop', 'Best Online grocery, food & medicine shop in Bangladesh. Order grocery, food & medicine online with same day home delivery free  Great store  Great choice.', 'best online grocery food medicine shop in bangladesh,online grocery shop,online medicine shop,online food shop,online grocery shopping, grocery store,online grocery shop in Dhaka,daily bazaar,online store,home shop,bangladesh online grocery, same day home delivery free.', 'dura', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_user_id` int(11) NOT NULL,
  `shipping_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_post_office` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_postcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_country_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_division_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_district_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_upazila_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_times`
--

CREATE TABLE `shipping_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_times`
--

INSERT INTO `shipping_times` (`id`, `time`, `created_at`, `updated_at`) VALUES
(1, '10am-12am', NULL, NULL),
(2, '2.00pm-5.00pm', NULL, NULL),
(3, '6.00pm - 10.00pm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sitesetting`
--

CREATE TABLE `sitesetting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitesetting`
--

INSERT INTO `sitesetting` (`id`, `company_name`, `phone_one`, `phone_two`, `email_one`, `email_two`, `address`, `facebook`, `instagram`, `twitter`, `linkedin`, `google`, `feed`, `youtube`, `google_map`, `created_at`, `updated_at`) VALUES
(2, 'Kinenin Shop', '01721-707503', '01781-982501', 'info@kineninshop.com', 'support@kineninshop.com', 'House# 2/1, Road# 7, Block# C, Mirpur 1, Dhaka 1216', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3650.451758989857!2d90.34643646498235!3d23.802529534563675!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c159b7fedc85%3A0x54ab2cd6e539b713!2sKinenin%20Shop!5e0!3m2!1sen!2sbd!4v1606920205449!5m2!1sen!2sbd\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_banners`
--

CREATE TABLE `site_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` int(11) NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_banners`
--

INSERT INTO `site_banners` (`id`, `section`, `link`, `image`, `category_id`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(139, 1, '#', 'th_1603031211.jpg', NULL, 1, 0, '2020-10-18 21:25:47', '2020-10-18 21:26:51'),
(140, 1, '#', 'amni__1603031161.jpg', NULL, 1, 0, '2020-10-18 21:26:01', '2020-10-18 21:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `sms_models`
--

CREATE TABLE `sms_models` (
  `id` int(11) NOT NULL,
  `sms_url` varchar(191) NOT NULL,
  `sms_username` varchar(191) NOT NULL,
  `sms_password` varchar(191) NOT NULL,
  `sms_type` int(11) NOT NULL,
  `sms_masking` varchar(191) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms_models`
--

INSERT INTO `sms_models` (`id`, `sms_url`, `sms_username`, `sms_password`, `sms_type`, `sms_masking`, `created_at`, `updated_at`) VALUES
(1, 'http://gosms.xyz/api/v1/sendSms', 'durbar2020', 'rana5012', 1, 'non-masking', '0000-00-00', '2021-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `smtp`
--

CREATE TABLE `smtp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encryption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `mailgun_domain` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mailgun_secret` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mailgun_endpoint` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mailgun_status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smtp`
--

INSERT INTO `smtp` (`id`, `driver`, `host`, `port`, `from_address`, `from_name`, `encryption`, `username`, `password`, `status`, `mailgun_domain`, `mailgun_secret`, `mailgun_endpoint`, `mailgun_status`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'smtp.mailtrap.io', 'smtp', 'durbarit@gmail.com', 'DurbarMail', 'tls', '3caf684790c0b4', '69628e626d4842', 0, 'durbarit.com', '786b2642c49a1f9ef4296a26cb02053b-e470a504-af64068e', 'api.mailgun.net', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instragram` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkend` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feed` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `twitter`, `youtube`, `instragram`, `google`, `linkend`, `feed`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/KineninShop', '#', NULL, '#', '#', '#', '#', '2020-11-10 17:44:22', '2020-09-15 04:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_logins`
--

CREATE TABLE `social_media_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media_logins`
--

INSERT INTO `social_media_logins` (`id`, `name`, `client_id`, `secret_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 'dgdfgf', '12121', 1, NULL, '2020-02-17 00:46:08'),
(2, 'google', 'dfdfdf', '12124545', 1, NULL, '2020-02-17 00:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `is_deleted`, `status`, `created_at`, `updated_at`) VALUES
(44, 'ashiffoysal8818@gmail.com', 0, 1, NULL, NULL),
(45, 'ashiffoysal@gmail.com', 0, 1, NULL, NULL),
(46, 'ashiffoysssalol@gmail.com', 0, 1, NULL, NULL),
(47, 'ashiffoysal30@gmail.com', 0, 1, NULL, NULL),
(48, 'ashiffoysal3yy0@gmail.com', 0, 1, NULL, NULL),
(49, 'ashiffogggysal@gmail.com', 0, 1, NULL, NULL),
(50, 'Delpha_Koepp92@yahoo.com', 0, 1, NULL, NULL),
(51, 'leannhilton@hiltonmgmt.com', 0, 1, NULL, NULL),
(52, 'jverbiar@earthlink.net', 0, 1, NULL, NULL),
(53, 'mwilcox967@aol.com', 0, 1, NULL, NULL),
(54, 'l_solis92@yahoo.com', 0, 1, NULL, NULL),
(55, 'thimler@gmail.com', 0, 1, NULL, NULL),
(56, 'best-friend@tutanota.com', 0, 1, NULL, NULL),
(57, 'rcastillo@alliedtitleandtrust.com', 0, 1, NULL, NULL),
(58, 'strikersueallen@yahoo.co.uk', 0, 1, NULL, NULL),
(59, 'marcuu01@gmail.com', 0, 1, NULL, NULL),
(60, 'monica.bazurro@tim.it', 0, 1, NULL, NULL),
(61, 'sweetlisabuffalo@gmail.com', 0, 1, NULL, NULL),
(62, 'gadelson@gmail.com', 0, 1, NULL, NULL),
(63, 'carlissaroberts17@gmail.com', 0, 1, NULL, NULL),
(64, 'kyle.karas@gmail.com', 0, 1, NULL, NULL),
(65, 'dvnjwhowhoo@juno.com', 0, 1, NULL, NULL),
(66, 'm.gosse75@laposte.net', 0, 1, NULL, NULL),
(67, 'leann.hilton@yahoo.com', 0, 1, NULL, NULL),
(68, 'sandysoliver@gmail.com', 0, 1, NULL, NULL),
(69, 'stomisich33@gmail.com', 0, 1, NULL, NULL),
(70, 'optimus_84@yahoo.com', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcate_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcate_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` int(11) NOT NULL,
  `subcate_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcate_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcate_tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcate_status` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `subcate_name`, `subcate_slug`, `cate_id`, `subcate_image`, `subcate_icon`, `subcate_tag`, `subcate_status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(94, 'Oils', 'oils', 101, '', '', 'Oils', 1, 0, '2021-01-10 16:01:06', '2021-01-10 16:24:09'),
(95, 'Energy & Isotonic', 'energy-isotonic', 102, '', '', 'Energy & Isotonic', 1, 0, '2021-01-10 16:45:36', '2021-01-10 16:45:49'),
(96, 'First Aid', 'first-aid', 109, '', '', 'First Aid', 1, 0, '2021-01-10 17:20:19', '2021-01-10 17:20:27'),
(97, 'Rice & Lentils', 'rice-lentils', 101, '', '', 'Rice & Lentils', 1, 0, '2021-01-10 17:54:17', '2021-01-10 17:54:22'),
(98, 'Milk Powder', 'milk-powder', 107, '', '', 'Milk Powder', 1, 0, '2021-01-10 18:00:07', '2021-01-10 18:00:23'),
(99, 'Atta Maida Suji Semai', 'atta-maida-suji-semai', 101, '', '', 'Atta Maida Suji Semai', 1, 0, '2021-01-10 18:33:11', '2021-01-10 19:43:11'),
(100, 'Omeprazole', 'Omeprazole', 105, '', '', 'Omeprazole', 1, 0, '2021-01-10 19:03:36', '2021-01-10 19:05:07'),
(101, 'Esomeprazole', 'Esomeprazole', 105, '', '', 'Esomeprazole', 1, 0, '2021-01-10 19:04:31', '2021-01-10 19:05:29'),
(102, 'Rabeprazole', 'Rabeprazole', 105, '', '', 'Rabeprazole', 1, 0, '2021-01-10 19:06:12', '2021-01-10 19:06:28'),
(103, 'Pantoprazole', 'Pantoprazole', 105, '', '', 'Pantoprazole', 1, 0, '2021-01-10 19:08:21', '2021-01-10 19:08:44'),
(104, 'Biscuits & Cookies', 'biscuits-cookies', 108, '', '', 'Biscuits & Cookies', 1, 0, '2021-01-10 19:14:41', '2021-01-10 19:14:47'),
(105, 'Herbal', 'Herbal', 105, '', '', 'Herbal', 1, 0, '2021-01-10 19:31:30', '2021-01-10 19:31:40'),
(106, 'Cetirizine', 'Cetirizine', 105, '', '', 'Cetirizine', 1, 0, '2021-01-10 19:32:26', '2021-01-10 19:32:35'),
(107, 'Soft Drinks', 'soft-drinks', 102, '', '', 'Soft Drinks', 1, 0, '2021-01-10 19:42:48', '2021-01-10 19:42:55'),
(109, 'Calcium', 'Calcium', 105, '', '', 'Calcium', 1, 0, '2021-01-10 22:12:45', '2021-01-10 22:13:09'),
(110, 'Vitamin C', 'Vitamin-C', 105, '', '', 'Vitamin C', 1, 0, '2021-01-10 22:20:14', '2021-01-10 22:20:25'),
(111, 'Multivitamin Multimineral', 'Multivitamin-Multimineral', 105, '', '', 'Multivitamin Multimineral', 1, 0, '2021-01-10 22:21:45', '2021-01-10 22:22:04'),
(112, 'Salt Sugar Goor', 'salt-sugar-goor', 101, '', '', 'Salt Sugar Goor', 1, 0, '2021-01-10 22:28:35', '2021-01-10 22:28:52'),
(113, 'Ambroxol', 'Ambroxol', 105, '', '', 'Ambroxol', 1, 0, '2021-01-10 22:30:09', '2021-01-10 22:31:56'),
(114, 'Paracetamol', 'Paracetamol', 105, '', '', NULL, 1, 0, '2021-01-10 22:38:53', NULL),
(115, 'Tea & Coffee', 'tea-coffee', 101, '', '', 'Tea & Coffee', 1, 0, '2021-01-10 22:49:05', '2021-01-10 22:49:38'),
(117, 'Herbs & Spices', 'herbs-spices', 101, '', '', 'Herbs & Spices', 1, 0, '2021-01-10 23:36:10', '2021-01-10 23:36:20'),
(118, 'Simethicone', 'Simethicone', 105, '', '', 'Simethicone', 1, 0, '2021-01-11 00:18:50', '2021-01-11 00:19:07'),
(119, 'Fexofenadine', 'Fexofenadine', 105, '', '', 'Fexofenadine', 1, 0, '2021-01-11 17:48:23', '2021-01-11 17:48:35'),
(120, 'Losartan', 'Losartan', 105, '', '', 'Losartan', 1, 0, '2021-01-11 19:36:25', '2021-01-11 19:37:28'),
(121, 'Vitamin E', 'Vitamin-E', 105, '', '', 'Vitamin E', 1, 0, '2021-01-12 12:54:49', '2021-01-12 12:55:16'),
(122, 'Loratadin', 'Loratadin', 105, '', '', 'Loratadin', 1, 0, '2021-01-12 13:27:29', '2021-01-12 13:27:44'),
(123, 'Guaiphenesin+Diphenhydramine+Levomenthol', 'Guaiphenesin-Diphenhydramine-Levomenthol', 105, '', '', 'Guaiphenesin+Diphenhydramine+Levomenthol', 1, 0, '2021-01-12 13:33:31', '2021-01-12 13:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `heading_text`, `details`, `icon`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(6, 'Support', 'dfgtdhgdgdfhgdfgfdj', 'fas fa-pencil', 1, 1, '2020-02-26 00:57:31', '2020-03-03 22:19:20'),
(7, 'In scelerisque sem at dolor. Maecenas mattis', 'Fusce eu dui. Integer vel nibh sit amet turpis vulputate aliquet. Phasellus id nisi vitae odio pretium aliquam. Pellentesque a leo. Donec consequat lectus sed felis. Quisque vestibulum massa. Nulla ornare. Nulla libero. Donec et mi eu massa ultrices scelerisque. Nullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu dictum justo urna et mi. Integer dictum est vitae sem. Vestibulum justo. Nulla mauris ipsum, convallis ut, vestibulum eu, tincidunt vel, nisi.', 'fas fa-lightbulb', 1, 0, '2020-06-08 12:34:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `termsandcondition` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_and_conditions`
--

INSERT INTO `terms_and_conditions` (`id`, `termsandcondition`, `created_at`, `updated_at`) VALUES
(1, '<p>simply dummy text of the printing and typesetting industry. Lorremaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', NULL, '2020-06-08 12:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `theme_colors`
--

CREATE TABLE `theme_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hover_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theme_colors`
--

INSERT INTO `theme_colors` (`id`, `color_code`, `hover_code`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(11, '#fa5b05', '#8a310b', 0, 0, '2020-03-03 05:07:11', '2020-11-25 18:37:44'),
(12, '#05abe2', '#000000', 0, 0, '2020-03-03 05:07:18', '2020-11-25 18:37:44'),
(13, '#000000', '#400000', 0, 0, '2020-03-03 05:35:00', '2020-11-25 18:37:44'),
(14, '#008040', '#000040', 1, 0, '2020-03-03 05:42:12', '2020-11-25 18:37:44'),
(15, '#8080ff', '#ff0000', 0, 0, '2020-03-03 06:14:12', '2020-11-25 18:37:44'),
(16, '#5ea444', '#3f3e3e', 0, 0, '2020-07-06 13:32:47', '2020-11-25 18:37:44'),
(17, '#ffcc00', '#ffcc00', 0, 0, '2020-10-08 17:23:27', '2020-11-25 18:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `theme_selectors`
--

CREATE TABLE `theme_selectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theme_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theme_selectors`
--

INSERT INTO `theme_selectors` (`id`, `theme_name`, `image`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'home1', 'home1.PNG', 1, 0, '2020-01-13 18:00:00', '2021-03-01 19:59:06'),
(2, 'home2', 'home2.PNG', 0, 0, NULL, '2021-03-01 19:59:06'),
(3, 'home3', 'home3.PNG', 0, 0, NULL, '2021-03-01 19:59:06'),
(4, 'home4', 'home4.PNG', 0, 0, NULL, '2021-03-01 19:59:06'),
(5, 'home5', 'home5.PNG', 0, 0, NULL, '2021-03-01 19:59:06'),
(6, 'home6', 'home6.PNG', 0, 0, NULL, '2021-03-01 19:59:06'),
(7, 'home7', NULL, 0, 1, NULL, '2021-03-01 19:59:06'),
(8, 'home8', NULL, 0, 1, NULL, '2021-03-01 19:59:06'),
(9, 'home9', NULL, 0, 1, NULL, '2021-03-01 19:59:06'),
(10, 'home10', NULL, 0, 1, NULL, '2021-03-01 19:59:06'),
(11, 'home11', NULL, 0, 1, NULL, '2021-03-01 19:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` int(3) NOT NULL,
  `district_id` int(2) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `is_courier_added` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`, `is_courier_added`) VALUES
(1, 1, 'Debidwar', 'দেবিদ্বার', 0),
(2, 1, 'Barura', 'বরুড়া', 0),
(3, 1, 'Brahmanpara', 'ব্রাহ্মণপাড়া', 0),
(4, 1, 'Chandina', 'চান্দিনা', 0),
(5, 1, 'Chauddagram', 'চৌদ্দগ্রাম', 0),
(6, 1, 'Daudkandi', 'দাউদকান্দি', 0),
(7, 1, 'Homna', 'হোমনা', 0),
(8, 1, 'Laksam', 'লাকসাম', 0),
(9, 1, 'Muradnagar', 'মুরাদনগর', 0),
(10, 1, 'Nangalkot', 'নাঙ্গলকোট', 0),
(11, 1, 'Comilla Sadar', 'কুমিল্লা সদর', 0),
(12, 1, 'Meghna', 'মেঘনা', 0),
(13, 1, 'Monohargonj', 'মনোহরগঞ্জ', 0),
(14, 1, 'Sadarsouth', 'সদর দক্ষিণ', 0),
(15, 1, 'Titas', 'তিতাস', 0),
(16, 1, 'Burichang', 'বুড়িচং', 0),
(17, 1, 'Lalmai', 'লালমাই', 0),
(18, 2, 'Chhagalnaiya', 'ছাগলনাইয়া', 0),
(19, 2, 'Feni Sadar', 'ফেনী সদর', 0),
(20, 2, 'Sonagazi', 'সোনাগাজী', 0),
(21, 2, 'Fulgazi', 'ফুলগাজী', 0),
(22, 2, 'Parshuram', 'পরশুরাম', 0),
(23, 2, 'Daganbhuiyan', 'দাগনভূঞা', 0),
(24, 3, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর', 0),
(25, 3, 'Kasba', 'কসবা', 0),
(26, 3, 'Nasirnagar', 'নাসিরনগর', 0),
(27, 3, 'Sarail', 'সরাইল', 0),
(28, 3, 'Ashuganj', 'আশুগঞ্জ', 0),
(29, 3, 'Akhaura', 'আখাউড়া', 0),
(30, 3, 'Nabinagar', 'নবীনগর', 0),
(31, 3, 'Bancharampur', 'বাঞ্ছারামপুর', 0),
(32, 3, 'Bijoynagar', 'বিজয়নগর', 0),
(33, 4, 'Rangamati Sadar', 'রাঙ্গামাটি সদর', 0),
(34, 4, 'Kaptai', 'কাপ্তাই', 0),
(35, 4, 'Kawkhali', 'কাউখালী', 0),
(36, 4, 'Baghaichari', 'বাঘাইছড়ি', 0),
(37, 4, 'Barkal', 'বরকল', 0),
(38, 4, 'Langadu', 'লংগদু', 0),
(39, 4, 'Rajasthali', 'রাজস্থলী', 0),
(40, 4, 'Belaichari', 'বিলাইছড়ি', 0),
(41, 4, 'Juraichari', 'জুরাছড়ি', 0),
(42, 4, 'Naniarchar', 'নানিয়ারচর', 0),
(43, 5, 'Noakhali Sadar', 'নোয়াখালী সদর', 0),
(44, 5, 'Companiganj', 'কোম্পানীগঞ্জ', 0),
(45, 5, 'Begumganj', 'বেগমগঞ্জ', 0),
(46, 5, 'Hatia', 'হাতিয়া', 0),
(47, 5, 'Subarnachar', 'সুবর্ণচর', 0),
(48, 5, 'Kabirhat', 'কবিরহাট', 0),
(49, 5, 'Senbug', 'সেনবাগ', 0),
(50, 5, 'Chatkhil', 'চাটখিল', 0),
(51, 5, 'Sonaimori', 'সোনাইমুড়ী', 0),
(52, 6, 'Haimchar', 'হাইমচর', 0),
(53, 6, 'Kachua', 'কচুয়া', 0),
(54, 6, 'Shahrasti', 'শাহরাস্তি	', 0),
(55, 6, 'Chandpur Sadar', 'চাঁদপুর সদর', 0),
(56, 6, 'Matlab South', 'মতলব দক্ষিণ', 0),
(57, 6, 'Hajiganj', 'হাজীগঞ্জ', 0),
(58, 6, 'Matlab North', 'মতলব উত্তর', 0),
(59, 6, 'Faridgonj', 'ফরিদগঞ্জ', 0),
(60, 7, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর', 0),
(61, 7, 'Kamalnagar', 'কমলনগর', 0),
(62, 7, 'Raipur', 'রায়পুর', 0),
(63, 7, 'Ramgati', 'রামগতি', 0),
(64, 7, 'Ramganj', 'রামগঞ্জ', 0),
(65, 8, 'Rangunia', 'রাঙ্গুনিয়া', 0),
(66, 8, 'Sitakunda', 'সীতাকুন্ড', 0),
(67, 8, 'Mirsharai', 'মীরসরাই', 0),
(68, 8, 'Patiya', 'পটিয়া', 0),
(69, 8, 'Sandwip', 'সন্দ্বীপ', 0),
(70, 8, 'Banshkhali', 'বাঁশখালী', 0),
(71, 8, 'Boalkhali', 'বোয়ালখালী', 0),
(72, 8, 'Anwara', 'আনোয়ারা', 0),
(73, 8, 'Chandanaish', 'চন্দনাইশ', 0),
(74, 8, 'Satkania', 'সাতকানিয়া', 0),
(75, 8, 'Lohagara', 'লোহাগাড়া', 0),
(76, 8, 'Hathazari', 'হাটহাজারী', 0),
(77, 8, 'Fatikchhari', 'ফটিকছড়ি', 0),
(78, 8, 'Raozan', 'রাউজান', 0),
(79, 8, 'Karnafuli', 'কর্ণফুলী', 0),
(80, 9, 'Coxsbazar Sadar', 'কক্সবাজার সদর', 0),
(81, 9, 'Chakaria', 'চকরিয়া', 0),
(82, 9, 'Kutubdia', 'কুতুবদিয়া', 0),
(83, 9, 'Ukhiya', 'উখিয়া', 0),
(84, 9, 'Moheshkhali', 'মহেশখালী', 0),
(85, 9, 'Pekua', 'পেকুয়া', 0),
(86, 9, 'Ramu', 'রামু', 0),
(87, 9, 'Teknaf', 'টেকনাফ', 0),
(88, 10, 'Khagrachhari Sadar', 'খাগড়াছড়ি সদর', 0),
(89, 10, 'Dighinala', 'দিঘীনালা', 0),
(90, 10, 'Panchari', 'পানছড়ি', 0),
(91, 10, 'Laxmichhari', 'লক্ষীছড়ি', 0),
(92, 10, 'Mohalchari', 'মহালছড়ি', 0),
(93, 10, 'Manikchari', 'মানিকছড়ি', 0),
(94, 10, 'Ramgarh', 'রামগড়', 0),
(95, 10, 'Matiranga', 'মাটিরাঙ্গা', 0),
(96, 10, 'Guimara', 'গুইমারা', 0),
(97, 11, 'Bandarban Sadar', 'বান্দরবান সদর', 0),
(98, 11, 'Alikadam', 'আলীকদম', 0),
(99, 11, 'Naikhongchhari', 'নাইক্ষ্যংছড়ি', 0),
(100, 11, 'Rowangchhari', 'রোয়াংছড়ি', 0),
(101, 11, 'Lama', 'লামা', 0),
(102, 11, 'Ruma', 'রুমা', 0),
(103, 11, 'Thanchi', 'থানচি', 0),
(104, 12, 'Belkuchi', 'বেলকুচি', 0),
(105, 12, 'Chauhali', 'চৌহালি', 0),
(106, 12, 'Kamarkhand', 'কামারখন্দ', 0),
(107, 12, 'Kazipur', 'কাজীপুর', 0),
(108, 12, 'Raigonj', 'রায়গঞ্জ', 0),
(109, 12, 'Shahjadpur', 'শাহজাদপুর', 0),
(110, 12, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর', 0),
(111, 12, 'Tarash', 'তাড়াশ', 0),
(112, 12, 'Ullapara', 'উল্লাপাড়া', 0),
(113, 13, 'Sujanagar', 'সুজানগর', 0),
(114, 13, 'Ishurdi', 'ঈশ্বরদী', 0),
(115, 13, 'Bhangura', 'ভাঙ্গুড়া', 0),
(116, 13, 'Pabna Sadar', 'পাবনা সদর', 0),
(117, 13, 'Bera', 'বেড়া', 0),
(118, 13, 'Atghoria', 'আটঘরিয়া', 0),
(119, 13, 'Chatmohar', 'চাটমোহর', 0),
(120, 13, 'Santhia', 'সাঁথিয়া', 0),
(121, 13, 'Faridpur', 'ফরিদপুর', 0),
(122, 14, 'Kahaloo', 'কাহালু', 0),
(123, 14, 'Bogra Sadar', 'বগুড়া সদর', 0),
(124, 14, 'Shariakandi', 'সারিয়াকান্দি', 0),
(125, 14, 'Shajahanpur', 'শাজাহানপুর', 0),
(126, 14, 'Dupchanchia', 'দুপচাচিঁয়া', 0),
(127, 14, 'Adamdighi', 'আদমদিঘি', 0),
(128, 14, 'Nondigram', 'নন্দিগ্রাম', 0),
(129, 14, 'Sonatala', 'সোনাতলা', 0),
(130, 14, 'Dhunot', 'ধুনট', 0),
(131, 14, 'Gabtali', 'গাবতলী', 0),
(132, 14, 'Sherpur', 'শেরপুর', 0),
(133, 14, 'Shibganj', 'শিবগঞ্জ', 0),
(134, 15, 'Paba', 'পবা', 0),
(135, 15, 'Durgapur', 'দুর্গাপুর', 0),
(136, 15, 'Mohonpur', 'মোহনপুর', 0),
(137, 15, 'Charghat', 'চারঘাট', 0),
(138, 15, 'Puthia', 'পুঠিয়া', 0),
(139, 15, 'Bagha', 'বাঘা', 0),
(140, 15, 'Godagari', 'গোদাগাড়ী', 0),
(141, 15, 'Tanore', 'তানোর', 0),
(142, 15, 'Bagmara', 'বাগমারা', 0),
(143, 16, 'Natore Sadar', 'নাটোর সদর', 0),
(144, 16, 'Singra', 'সিংড়া', 0),
(145, 16, 'Baraigram', 'বড়াইগ্রাম', 0),
(146, 16, 'Bagatipara', 'বাগাতিপাড়া', 0),
(147, 16, 'Lalpur', 'লালপুর', 0),
(148, 16, 'Gurudaspur', 'গুরুদাসপুর', 0),
(149, 16, 'Naldanga', 'নলডাঙ্গা', 0),
(150, 17, 'Akkelpur', 'আক্কেলপুর', 0),
(151, 17, 'Kalai', 'কালাই', 0),
(152, 17, 'Khetlal', 'ক্ষেতলাল', 0),
(153, 17, 'Panchbibi', 'পাঁচবিবি', 0),
(154, 17, 'Joypurhat Sadar', 'জয়পুরহাট সদর', 0),
(155, 18, 'Chapainawabganj Sadar', 'চাঁপাইনবাবগঞ্জ সদর', 0),
(156, 18, 'Gomostapur', 'গোমস্তাপুর', 0),
(157, 18, 'Nachol', 'নাচোল', 0),
(158, 18, 'Bholahat', 'ভোলাহাট', 0),
(159, 18, 'Shibganj', 'শিবগঞ্জ', 0),
(160, 19, 'Mohadevpur', 'মহাদেবপুর', 0),
(161, 19, 'Badalgachi', 'বদলগাছী', 0),
(162, 19, 'Patnitala', 'পত্নিতলা', 0),
(163, 19, 'Dhamoirhat', 'ধামইরহাট', 0),
(164, 19, 'Niamatpur', 'নিয়ামতপুর', 0),
(165, 19, 'Manda', 'মান্দা', 0),
(166, 19, 'Atrai', 'আত্রাই', 0),
(167, 19, 'Raninagar', 'রাণীনগর', 0),
(168, 19, 'Naogaon Sadar', 'নওগাঁ সদর', 0),
(169, 19, 'Porsha', 'পোরশা', 0),
(170, 19, 'Sapahar', 'সাপাহার', 0),
(171, 20, 'Manirampur', 'মণিরামপুর', 0),
(172, 20, 'Abhaynagar', 'অভয়নগর', 0),
(173, 20, 'Bagherpara', 'বাঘারপাড়া', 0),
(174, 20, 'Chougachha', 'চৌগাছা', 0),
(175, 20, 'Jhikargacha', 'ঝিকরগাছা', 0),
(176, 20, 'Keshabpur', 'কেশবপুর', 0),
(177, 20, 'Jessore Sadar', 'যশোর সদর', 0),
(178, 20, 'Sharsha', 'শার্শা', 0),
(179, 21, 'Assasuni', 'আশাশুনি', 0),
(180, 21, 'Debhata', 'দেবহাটা', 0),
(181, 21, 'Kalaroa', 'কলারোয়া', 0),
(182, 21, 'Satkhira Sadar', 'সাতক্ষীরা সদর', 0),
(183, 21, 'Shyamnagar', 'শ্যামনগর', 0),
(184, 21, 'Tala', 'তালা', 0),
(185, 21, 'Kaliganj', 'কালিগঞ্জ', 0),
(186, 22, 'Mujibnagar', 'মুজিবনগর', 0),
(187, 22, 'Meherpur Sadar', 'মেহেরপুর সদর', 0),
(188, 22, 'Gangni', 'গাংনী', 0),
(189, 23, 'Narail Sadar', 'নড়াইল সদর', 0),
(190, 23, 'Lohagara', 'লোহাগড়া', 0),
(191, 23, 'Kalia', 'কালিয়া', 0),
(192, 24, 'Chuadanga Sadar', 'চুয়াডাঙ্গা সদর', 0),
(193, 24, 'Alamdanga', 'আলমডাঙ্গা', 0),
(194, 24, 'Damurhuda', 'দামুড়হুদা', 0),
(195, 24, 'Jibannagar', 'জীবননগর', 0),
(196, 25, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 0),
(197, 25, 'Kumarkhali', 'কুমারখালী', 0),
(198, 25, 'Khoksa', 'খোকসা', 0),
(199, 25, 'Mirpur', 'মিরপুর', 0),
(200, 25, 'Daulatpur', 'দৌলতপুর', 0),
(201, 25, 'Bheramara', 'ভেড়ামারা', 0),
(202, 26, 'Shalikha', 'শালিখা', 0),
(203, 26, 'Sreepur', 'শ্রীপুর', 0),
(204, 26, 'Magura Sadar', 'মাগুরা সদর', 0),
(205, 26, 'Mohammadpur', 'মহম্মদপুর', 0),
(206, 27, 'Paikgasa', 'পাইকগাছা', 0),
(207, 27, 'Fultola', 'ফুলতলা', 0),
(208, 27, 'Digholia', 'দিঘলিয়া', 0),
(209, 27, 'Rupsha', 'রূপসা', 0),
(210, 27, 'Terokhada', 'তেরখাদা', 0),
(211, 27, 'Dumuria', 'ডুমুরিয়া', 0),
(212, 27, 'Botiaghata', 'বটিয়াঘাটা', 0),
(213, 27, 'Dakop', 'দাকোপ', 0),
(214, 27, 'Koyra', 'কয়রা', 0),
(215, 28, 'Fakirhat', 'ফকিরহাট', 0),
(216, 28, 'Bagerhat Sadar', 'বাগেরহাট সদর', 0),
(217, 28, 'Mollahat', 'মোল্লাহাট', 0),
(218, 28, 'Sarankhola', 'শরণখোলা', 0),
(219, 28, 'Rampal', 'রামপাল', 0),
(220, 28, 'Morrelganj', 'মোড়েলগঞ্জ', 0),
(221, 28, 'Kachua', 'কচুয়া', 0),
(222, 28, 'Mongla', 'মোংলা', 0),
(223, 28, 'Chitalmari', 'চিতলমারী', 0),
(224, 29, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর', 0),
(225, 29, 'Shailkupa', 'শৈলকুপা', 0),
(226, 29, 'Harinakundu', 'হরিণাকুন্ডু', 0),
(227, 29, 'Kaliganj', 'কালীগঞ্জ', 0),
(228, 29, 'Kotchandpur', 'কোটচাঁদপুর', 0),
(229, 29, 'Moheshpur', 'মহেশপুর', 0),
(230, 30, 'Jhalakathi Sadar', 'ঝালকাঠি সদর', 0),
(231, 30, 'Kathalia', 'কাঠালিয়া', 0),
(232, 30, 'Nalchity', 'নলছিটি', 0),
(233, 30, 'Rajapur', 'রাজাপুর', 0),
(234, 31, 'Bauphal', 'বাউফল', 0),
(235, 31, 'Patuakhali Sadar', 'পটুয়াখালী সদর', 0),
(236, 31, 'Dumki', 'দুমকি', 0),
(237, 31, 'Dashmina', 'দশমিনা', 0),
(238, 31, 'Kalapara', 'কলাপাড়া', 0),
(239, 31, 'Mirzaganj', 'মির্জাগঞ্জ', 0),
(240, 31, 'Galachipa', 'গলাচিপা', 0),
(241, 31, 'Rangabali', 'রাঙ্গাবালী', 0),
(242, 32, 'Pirojpur Sadar', 'পিরোজপুর সদর', 0),
(243, 32, 'Nazirpur', 'নাজিরপুর', 0),
(244, 32, 'Kawkhali', 'কাউখালী', 0),
(245, 32, 'Zianagar', 'জিয়ানগর', 0),
(246, 32, 'Bhandaria', 'ভান্ডারিয়া', 0),
(247, 32, 'Mathbaria', 'মঠবাড়ীয়া', 0),
(248, 32, 'Nesarabad', 'নেছারাবাদ', 0),
(249, 33, 'Barisal Sadar', 'বরিশাল সদর', 0),
(250, 33, 'Bakerganj', 'বাকেরগঞ্জ', 0),
(251, 33, 'Babuganj', 'বাবুগঞ্জ', 0),
(252, 33, 'Wazirpur', 'উজিরপুর', 0),
(253, 33, 'Banaripara', 'বানারীপাড়া', 0),
(254, 33, 'Gournadi', 'গৌরনদী', 0),
(255, 33, 'Agailjhara', 'আগৈলঝাড়া', 0),
(256, 33, 'Mehendiganj', 'মেহেন্দিগঞ্জ', 0),
(257, 33, 'Muladi', 'মুলাদী', 0),
(258, 33, 'Hizla', 'হিজলা', 0),
(259, 34, 'Bhola Sadar', 'ভোলা সদর', 0),
(260, 34, 'Borhan Sddin', 'বোরহান উদ্দিন', 0),
(261, 34, 'Charfesson', 'চরফ্যাশন', 0),
(262, 34, 'Doulatkhan', 'দৌলতখান', 0),
(263, 34, 'Monpura', 'মনপুরা', 0),
(264, 34, 'Tazumuddin', 'তজুমদ্দিন', 0),
(265, 34, 'Lalmohan', 'লালমোহন', 0),
(266, 35, 'Amtali', 'আমতলী', 0),
(267, 35, 'Barguna Sadar', 'বরগুনা সদর', 0),
(268, 35, 'Betagi', 'বেতাগী', 0),
(269, 35, 'Bamna', 'বামনা', 0),
(270, 35, 'Pathorghata', 'পাথরঘাটা', 0),
(271, 35, 'Taltali', 'তালতলি', 0),
(272, 36, 'Balaganj', 'বালাগঞ্জ', 0),
(273, 36, 'Beanibazar', 'বিয়ানীবাজার', 0),
(274, 36, 'Bishwanath', 'বিশ্বনাথ', 0),
(275, 36, 'Companiganj', 'কোম্পানীগঞ্জ', 0),
(276, 36, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 0),
(277, 36, 'Golapganj', 'গোলাপগঞ্জ', 0),
(278, 36, 'Gowainghat', 'গোয়াইনঘাট', 0),
(279, 36, 'Jaintiapur', 'জৈন্তাপুর', 0),
(280, 36, 'Kanaighat', 'কানাইঘাট', 0),
(281, 36, 'Sylhet Sadar', 'সিলেট সদর', 0),
(282, 36, 'Zakiganj', 'জকিগঞ্জ', 0),
(283, 36, 'Dakshinsurma', 'দক্ষিণ সুরমা', 0),
(284, 36, 'Osmaninagar', 'ওসমানী নগর', 0),
(285, 37, 'Barlekha', 'বড়লেখা', 0),
(286, 37, 'Kamolganj', 'কমলগঞ্জ', 0),
(287, 37, 'Kulaura', 'কুলাউড়া', 0),
(288, 37, 'Moulvibazar Sadar', 'মৌলভীবাজার সদর', 0),
(289, 37, 'Rajnagar', 'রাজনগর', 0),
(290, 37, 'Sreemangal', 'শ্রীমঙ্গল', 0),
(291, 37, 'Juri', 'জুড়ী', 0),
(292, 38, 'Nabiganj', 'নবীগঞ্জ', 0),
(293, 38, 'Bahubal', 'বাহুবল', 0),
(294, 38, 'Ajmiriganj', 'আজমিরীগঞ্জ', 0),
(295, 38, 'Baniachong', 'বানিয়াচং', 0),
(296, 38, 'Lakhai', 'লাখাই', 0),
(297, 38, 'Chunarughat', 'চুনারুঘাট', 0),
(298, 38, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 0),
(299, 38, 'Madhabpur', 'মাধবপুর', 0),
(300, 39, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 0),
(301, 39, 'South Sunamganj', 'দক্ষিণ সুনামগঞ্জ', 0),
(302, 39, 'Bishwambarpur', 'বিশ্বম্ভরপুর', 0),
(303, 39, 'Chhatak', 'ছাতক', 0),
(304, 39, 'Jagannathpur', 'জগন্নাথপুর', 0),
(305, 39, 'Dowarabazar', 'দোয়ারাবাজার', 0),
(306, 39, 'Tahirpur', 'তাহিরপুর', 0),
(307, 39, 'Dharmapasha', 'ধর্মপাশা', 0),
(308, 39, 'Jamalganj', 'জামালগঞ্জ', 0),
(309, 39, 'Shalla', 'শাল্লা', 0),
(310, 39, 'Derai', 'দিরাই', 0),
(311, 40, 'Belabo', 'বেলাবো', 0),
(312, 40, 'Monohardi', 'মনোহরদী', 0),
(313, 40, 'Narsingdi Sadar', 'নরসিংদী সদর', 0),
(314, 40, 'Palash', 'পলাশ', 0),
(315, 40, 'Raipura', 'রায়পুরা', 0),
(316, 40, 'Shibpur', 'শিবপুর', 0),
(317, 41, 'Kaliganj', 'কালীগঞ্জ', 0),
(318, 41, 'Kaliakair', 'কালিয়াকৈর', 0),
(319, 41, 'Kapasia', 'কাপাসিয়া', 1),
(320, 41, 'Gazipur Sadar', 'গাজীপুর সদর', 0),
(321, 41, 'Sreepur', 'শ্রীপুর', 0),
(322, 42, 'Shariatpur Sadar', 'শরিয়তপুর সদর', 0),
(323, 42, 'Naria', 'নড়িয়া', 0),
(324, 42, 'Zajira', 'জাজিরা', 0),
(325, 42, 'Gosairhat', 'গোসাইরহাট', 0),
(326, 42, 'Bhedarganj', 'ভেদরগঞ্জ', 0),
(327, 42, 'Damudya', 'ডামুড্যা', 0),
(328, 43, 'Araihazar', 'আড়াইহাজার', 0),
(329, 43, 'Bandar', 'বন্দর', 0),
(330, 43, 'Narayanganj Sadar', 'নারায়নগঞ্জ সদর', 0),
(331, 43, 'Rupganj', 'রূপগঞ্জ', 0),
(332, 43, 'Sonargaon', 'সোনারগাঁ', 0),
(333, 44, 'Basail', 'বাসাইল', 0),
(334, 44, 'Bhuapur', 'ভুয়াপুর', 0),
(335, 44, 'Delduar', 'দেলদুয়ার', 0),
(336, 44, 'Ghatail', 'ঘাটাইল', 0),
(337, 44, 'Gopalpur', 'গোপালপুর', 0),
(338, 44, 'Madhupur', 'মধুপুর', 0),
(339, 44, 'Mirzapur', 'মির্জাপুর', 0),
(340, 44, 'Nagarpur', 'নাগরপুর', 0),
(341, 44, 'Sakhipur', 'সখিপুর', 0),
(342, 44, 'Tangail Sadar', 'টাঙ্গাইল সদর', 0),
(343, 44, 'Kalihati', 'কালিহাতী', 0),
(344, 44, 'Dhanbari', 'ধনবাড়ী', 0),
(345, 45, 'Itna', 'ইটনা', 0),
(346, 45, 'Katiadi', 'কটিয়াদী', 0),
(347, 45, 'Bhairab', 'ভৈরব', 0),
(348, 45, 'Tarail', 'তাড়াইল', 0),
(349, 45, 'Hossainpur', 'হোসেনপুর', 0),
(350, 45, 'Pakundia', 'পাকুন্দিয়া', 0),
(351, 45, 'Kuliarchar', 'কুলিয়ারচর', 0),
(352, 45, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর', 0),
(353, 45, 'Karimgonj', 'করিমগঞ্জ', 0),
(354, 45, 'Bajitpur', 'বাজিতপুর', 0),
(355, 45, 'Austagram', 'অষ্টগ্রাম', 0),
(356, 45, 'Mithamoin', 'মিঠামইন', 0),
(357, 45, 'Nikli', 'নিকলী', 0),
(358, 46, 'Harirampur', 'হরিরামপুর', 0),
(359, 46, 'Saturia', 'সাটুরিয়া', 0),
(360, 46, 'Manikganj Sadar', 'মানিকগঞ্জ সদর', 0),
(361, 46, 'Gior', 'ঘিওর', 0),
(362, 46, 'Shibaloy', 'শিবালয়', 0),
(363, 46, 'Doulatpur', 'দৌলতপুর', 0),
(364, 46, 'Singiar', 'সিংগাইর', 0),
(365, 47, 'Savar', 'সাভার', 0),
(366, 47, 'Dhamrai', 'ধামরাই', 0),
(367, 47, 'Keraniganj', 'কেরাণীগঞ্জ', 0),
(368, 47, 'Nawabganj', 'নবাবগঞ্জ', 0),
(369, 47, 'Dohar', 'দোহার', 0),
(370, 48, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর', 0),
(371, 48, 'Sreenagar', 'শ্রীনগর', 0),
(372, 48, 'Sirajdikhan', 'সিরাজদিখান', 0),
(373, 48, 'Louhajanj', 'লৌহজং', 0),
(374, 48, 'Gajaria', 'গজারিয়া', 0),
(375, 48, 'Tongibari', 'টংগীবাড়ি', 0),
(376, 49, 'Rajbari Sadar', 'রাজবাড়ী সদর', 0),
(377, 49, 'Goalanda', 'গোয়ালন্দ', 0),
(378, 49, 'Pangsa', 'পাংশা', 0),
(379, 49, 'Baliakandi', 'বালিয়াকান্দি', 0),
(380, 49, 'Kalukhali', 'কালুখালী', 0),
(381, 50, 'Madaripur Sadar', 'মাদারীপুর সদর', 0),
(382, 50, 'Shibchar', 'শিবচর', 0),
(383, 50, 'Kalkini', 'কালকিনি', 0),
(384, 50, 'Rajoir', 'রাজৈর', 0),
(385, 51, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর', 0),
(386, 51, 'Kashiani', 'কাশিয়ানী', 0),
(387, 51, 'Tungipara', 'টুংগীপাড়া', 0),
(388, 51, 'Kotalipara', 'কোটালীপাড়া', 0),
(389, 51, 'Muksudpur', 'মুকসুদপুর', 0),
(390, 52, 'Faridpur Sadar', 'ফরিদপুর সদর', 0),
(391, 52, 'Alfadanga', 'আলফাডাঙ্গা', 0),
(392, 52, 'Boalmari', 'বোয়ালমারী', 0),
(393, 52, 'Sadarpur', 'সদরপুর', 0),
(394, 52, 'Nagarkanda', 'নগরকান্দা', 0),
(395, 52, 'Bhanga', 'ভাঙ্গা', 0),
(396, 52, 'Charbhadrasan', 'চরভদ্রাসন', 0),
(397, 52, 'Madhukhali', 'মধুখালী', 0),
(398, 52, 'Saltha', 'সালথা', 0),
(399, 53, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 0),
(400, 53, 'Debiganj', 'দেবীগঞ্জ', 0),
(401, 53, 'Boda', 'বোদা', 0),
(402, 53, 'Atwari', 'আটোয়ারী', 0),
(403, 53, 'Tetulia', 'তেতুলিয়া', 0),
(404, 54, 'Nawabganj', 'নবাবগঞ্জ', 0),
(405, 54, 'Birganj', 'বীরগঞ্জ', 0),
(406, 54, 'Ghoraghat', 'ঘোড়াঘাট', 0),
(407, 54, 'Birampur', 'বিরামপুর', 0),
(408, 54, 'Parbatipur', 'পার্বতীপুর', 0),
(409, 54, 'Bochaganj', 'বোচাগঞ্জ', 0),
(410, 54, 'Kaharol', 'কাহারোল', 0),
(411, 54, 'Fulbari', 'ফুলবাড়ী', 0),
(412, 54, 'Dinajpur Sadar', 'দিনাজপুর সদর', 0),
(413, 54, 'Hakimpur', 'হাকিমপুর', 0),
(414, 54, 'Khansama', 'খানসামা', 0),
(415, 54, 'Birol', 'বিরল', 0),
(416, 54, 'Chirirbandar', 'চিরিরবন্দর', 0),
(417, 55, 'Lalmonirhat Sadar', 'লালমনিরহাট সদর', 0),
(418, 55, 'Kaliganj', 'কালীগঞ্জ', 0),
(419, 55, 'Hatibandha', 'হাতীবান্ধা', 0),
(420, 55, 'Patgram', 'পাটগ্রাম', 0),
(421, 55, 'Aditmari', 'আদিতমারী', 0),
(422, 56, 'Syedpur', 'সৈয়দপুর', 0),
(423, 56, 'Domar', 'ডোমার', 0),
(424, 56, 'Dimla', 'ডিমলা', 0),
(425, 56, 'Jaldhaka', 'জলঢাকা', 0),
(426, 56, 'Kishorganj', 'কিশোরগঞ্জ', 0),
(427, 56, 'Nilphamari Sadar', 'নীলফামারী সদর', 0),
(428, 57, 'Sadullapur', 'সাদুল্লাপুর', 0),
(429, 57, 'Gaibandha Sadar', 'গাইবান্ধা সদর', 0),
(430, 57, 'Palashbari', 'পলাশবাড়ী', 0),
(431, 57, 'Saghata', 'সাঘাটা', 0),
(432, 57, 'Gobindaganj', 'গোবিন্দগঞ্জ', 0),
(433, 57, 'Sundarganj', 'সুন্দরগঞ্জ', 0),
(434, 57, 'Phulchari', 'ফুলছড়ি', 0),
(435, 58, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', 0),
(436, 58, 'Pirganj', 'পীরগঞ্জ', 0),
(437, 58, 'Ranisankail', 'রাণীশংকৈল', 0),
(438, 58, 'Haripur', 'হরিপুর', 0),
(439, 58, 'Baliadangi', 'বালিয়াডাঙ্গী', 0),
(440, 59, 'Rangpur Sadar', 'রংপুর সদর', 0),
(441, 59, 'Gangachara', 'গংগাচড়া', 0),
(442, 59, 'Taragonj', 'তারাগঞ্জ', 0),
(443, 59, 'Badargonj', 'বদরগঞ্জ', 0),
(444, 59, 'Mithapukur', 'মিঠাপুকুর', 0),
(445, 59, 'Pirgonj', 'পীরগঞ্জ', 0),
(446, 59, 'Kaunia', 'কাউনিয়া', 0),
(447, 59, 'Pirgacha', 'পীরগাছা', 0),
(448, 60, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', 0),
(449, 60, 'Nageshwari', 'নাগেশ্বরী', 0),
(450, 60, 'Bhurungamari', 'ভুরুঙ্গামারী', 0),
(451, 60, 'Phulbari', 'ফুলবাড়ী', 0),
(452, 60, 'Rajarhat', 'রাজারহাট', 0),
(453, 60, 'Ulipur', 'উলিপুর', 0),
(454, 60, 'Chilmari', 'চিলমারী', 0),
(455, 60, 'Rowmari', 'রৌমারী', 0),
(456, 60, 'Charrajibpur', 'চর রাজিবপুর', 0),
(457, 61, 'Sherpur Sadar', 'শেরপুর সদর', 0),
(458, 61, 'Nalitabari', 'নালিতাবাড়ী', 0),
(459, 61, 'Sreebordi', 'শ্রীবরদী', 0),
(460, 61, 'Nokla', 'নকলা', 0),
(461, 61, 'Jhenaigati', 'ঝিনাইগাতী', 0),
(462, 62, 'Fulbaria', 'ফুলবাড়ীয়া', 0),
(463, 62, 'Trishal', 'ত্রিশাল', 0),
(464, 62, 'Bhaluka', 'ভালুকা', 0),
(465, 62, 'Muktagacha', 'মুক্তাগাছা', 0),
(466, 62, 'Mymensingh Sadar', 'ময়মনসিংহ সদর', 0),
(467, 62, 'Dhobaura', 'ধোবাউড়া', 0),
(468, 62, 'Phulpur', 'ফুলপুর', 0),
(469, 62, 'Haluaghat', 'হালুয়াঘাট', 0),
(470, 62, 'Gouripur', 'গৌরীপুর', 0),
(471, 62, 'Gafargaon', 'গফরগাঁও', 0),
(472, 62, 'Iswarganj', 'ঈশ্বরগঞ্জ', 0),
(473, 62, 'Nandail', 'নান্দাইল', 0),
(474, 62, 'Tarakanda', 'তারাকান্দা', 0),
(475, 63, 'Jamalpur Sadar', 'জামালপুর সদর', 0),
(476, 63, 'Melandah', 'মেলান্দহ', 0),
(477, 63, 'Islampur', 'ইসলামপুর', 0),
(478, 63, 'Dewangonj', 'দেওয়ানগঞ্জ', 0),
(479, 63, 'Sarishabari', 'সরিষাবাড়ী', 0),
(480, 63, 'Madarganj', 'মাদারগঞ্জ', 0),
(481, 63, 'Bokshiganj', 'বকশীগঞ্জ', 0),
(482, 64, 'Barhatta', 'বারহাট্টা', 0),
(483, 64, 'Durgapur', 'দুর্গাপুর', 0),
(484, 64, 'Kendua', 'কেন্দুয়া', 0),
(485, 64, 'Atpara', 'আটপাড়া', 0),
(486, 64, 'Madan', 'মদন', 0),
(487, 64, 'Khaliajuri', 'খালিয়াজুরী', 0),
(488, 64, 'Kalmakanda', 'কলমাকান্দা', 0),
(489, 64, 'Mohongonj', 'মোহনগঞ্জ', 0),
(490, 64, 'Purbadhala', 'পূর্বধলা', 0),
(491, 64, 'Netrokona Sadar', 'নেত্রকোণা সদর', 0);

-- --------------------------------------------------------

--
-- Table structure for table `upazila_couriers`
--

CREATE TABLE `upazila_couriers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `upazila_id` bigint(20) UNSIGNED NOT NULL,
  `courier_id` bigint(20) UNSIGNED NOT NULL,
  `fee` bigint(20) NOT NULL,
  `is_cash_on_delivery` tinyint(1) NOT NULL DEFAULT 0,
  `prepare_to_delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone`, `email`, `ip_address`, `avatar`, `company`, `email_verified_at`, `status`, `password`, `verification_code`, `remember_token`, `order_id`, `address`, `created_at`, `updated_at`) VALUES
(201, NULL, NULL, '01730595104', NULL, '37.111.204.190', NULL, NULL, NULL, 0, '$2y$10$v4dkdH6CLjnybjjda9kKCeFr8X4Pbta01vSd2xZGKfro17aMtxXNC', 28144, 'AMSMB7n1iobZXaYAYWOpEEXkU456T2Hde2LGDDtxlzFyrVJBRT3ICwXKCb1V', 9435, NULL, '2021-01-07 23:50:50', '2021-01-07 23:50:50'),
(202, NULL, NULL, '01868292813', NULL, '37.111.204.190', NULL, NULL, '2021-01-07 23:53:32', 1, '$2y$10$vdZlTPry.oV.lkdkDIFSRO/HrOfno1byL6ELnEzqganhOIR/yRzZK', NULL, NULL, 1825, NULL, '2021-01-07 23:52:56', '2021-01-07 23:53:32'),
(204, 'Asif', NULL, '01783038818', NULL, '103.147.163.149', 'img_2041611641781.jpg', NULL, '2021-01-26 13:15:38', 1, '$2y$10$20.yDOmIAVkgRXNZLKTjsuNV4qJOq9ZdPDtyCrBnkOtTPcgvr6goa', NULL, NULL, 3546, 'Rajshahi', '2021-01-26 13:15:23', '2021-01-26 13:16:22'),
(205, NULL, NULL, 'i.oo.x.v.er.tri.s.@gmail.com', NULL, '51.15.80.14', NULL, NULL, NULL, 0, '$2y$10$O6WSOlVoJmfxZIiBhPHiBezMDD1X0UDv82oMuPYLxYtKN3l7Zw4oe', 20334, 'sjXLX3QyMjFGUHpAln7evCYmtsXlzU88wm6d50ytVfacjbkTqPmyNvQYZYLt', 6961, NULL, '2021-01-28 09:24:24', '2021-01-28 09:24:24'),
(206, NULL, NULL, 'Ryder_Considine92@gmail.com', NULL, '185.220.101.203', NULL, NULL, NULL, 0, '$2y$10$fj25oylFm0j4pYYQhR7ipuCrSY9H.p5heJ8fXSDKr7298CuvLzRT2', 36034, 'LwqXrtZCN8ZZ5PmMGcKpPPKlvOpBheCbHbE74BpYgYRdRTAEV0UCIWshosUo', 8446, NULL, '2021-03-01 07:50:59', '2021-03-01 07:50:59'),
(207, NULL, NULL, 'optimus_84@yahoo.com', NULL, '195.176.3.20', NULL, NULL, NULL, 0, '$2y$10$rzNajPnJx529JZhpaMsLo.r5X1wi4SydUZWblJU5kjVC7GSYlkq/C', 78559, 'iPqP7HcTcIi802R6GLornDSyWzRDeKT92UqJFI1CNTj4djekQlfuZwAs2HKz', 6462, NULL, '2021-03-05 21:52:54', '2021-03-05 21:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_post_office` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_country_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_division_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_district_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_upazila_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `user_address`, `user_post_office`, `user_postcode`, `user_country_id`, `user_division_id`, `user_district_id`, `user_upazila_id`, `is_shipping_address`, `created_at`, `updated_at`) VALUES
(253, '26', 'Mirpur 1, Dhaka', '+8801781806505', '1216', '18', '1', '1', '15', '1', '2020-03-10 07:21:12', NULL),
(254, '26', 'Mirpur 1, Dhaka', '+8801781806505', '1216', '18', '1', '1', '15', '1', '2020-03-10 07:23:02', NULL),
(255, '26', 'Mirpur 1, Dhaka', '+8801781806505', '1216', '18', '1', '1', '15', '1', '2020-03-10 07:23:54', NULL),
(256, '26', 'Mirpur 1, Dhaka', '+8801781806505', '1216', '18', '1', '1', '15', '1', '2020-03-10 07:24:45', NULL),
(257, '26', 'Mirpur 1, Dhaka', '+8801781806505', '1216', '18', '1', '1', '15', '1', '2020-03-10 07:26:46', NULL),
(258, '26', 'Mirpur 1, Dhaka', '+8801781806505', '1216', '18', '1', '1', '15', '1', '2020-03-10 07:27:54', NULL),
(319, '70', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'Kuet', '9203', '18', '3', '20', '174', '1', '2020-04-04 20:49:05', NULL),
(320, '70', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'Kuet', '9203', '18', '3', '20', '174', '1', '2020-05-03 11:19:11', NULL),
(321, '70', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'Kuet', '9203', '18', '3', '20', '174', '1', '2020-05-05 11:10:05', NULL),
(322, '70', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'Kuet', '9203', '18', '1', '1', '15', '1', '2020-05-05 11:13:08', NULL),
(323, '35', 'Panagar', 'pana', '857', '18', '5', '37', '290', '1', '2020-06-08 01:42:11', NULL),
(324, '35', 'Panagar', 'pana', '857', '18', '5', '37', '290', '1', '2020-06-09 15:44:20', NULL),
(325, '35', 'Panagar', 'pana', '857', '18', '1', '1', '15', '1', '2020-06-09 16:03:27', NULL),
(326, '125', NULL, 'Kuet', NULL, '18', NULL, NULL, NULL, NULL, NULL, '2020-06-29 21:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_used_cupons`
--

CREATE TABLE `user_used_cupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cupon_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_used_cupons`
--

INSERT INTO `user_used_cupons` (`id`, `user_ip`, `cupon_id`, `order_id`, `status`, `created_at`, `updated_at`) VALUES
(195, '186', '28', '', 1, '2020-12-05 11:49:10', '2020-12-05 11:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `verification_options`
--

CREATE TABLE `verification_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `verify_with` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verification_options`
--

INSERT INTO `verification_options` (`id`, `verify_with`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '2020-10-09 01:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `viewedproducts`
--

CREATE TABLE `viewedproducts` (
  `id` int(11) NOT NULL,
  `user_id` varchar(110) NOT NULL,
  `products` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viewedproducts`
--

INSERT INTO `viewedproducts` (`id`, `user_id`, `products`, `created_at`, `updated_at`) VALUES
(4, '103.147.163.149', '{\"0\":\"327\",\"1\":\"395\",\"3\":\"370\",\"5\":\"329\",\"7\":\"326\"}', '2020-10-11', '2021-03-03'),
(5, '::1', '{\"0\":\"396\",\"1\":\"228\",\"3\":\"231\",\"5\":\"apple.png\",\"7\":\"logo-footer.png\"}', '2020-10-12', '2021-03-09'),
(6, '103.218.26.73', '{\"0\":\"304\",\"3\":\"303\",\"5\":\"shop.jpg\",\"7\":\"310\",\"9\":\"287\"}', '2020-10-17', '2020-11-14'),
(7, '66.249.65.233', '{\"0\":\"www.durbarit.com\",\"3\":\"233\",\"5\":\"225\"}', '2020-10-17', '2020-11-23'),
(8, '66.249.65.235', '[\"236\",\"fghfghfgh\"]', '2020-10-17', '2020-11-23'),
(9, '103.112.166.12', '{\"0\":\"397\",\"1\":\"376\",\"3\":\"382\",\"5\":\"368\",\"7\":\"343\"}', '2020-10-19', '2021-01-14'),
(10, '66.249.65.155', '{\"0\":\"227\",\"3\":\"304\",\"5\":\"290\",\"7\":\"249\",\"9\":\"w3docs.com\"}', '2020-10-19', '2020-12-05'),
(11, '37.111.217.143', '{\"0\":\"234\",\"1\":\"232\",\"3\":\"227\"}', '2020-10-19', '2020-10-20'),
(12, '66.249.65.231', '[\"228\"]', '2020-10-19', NULL),
(13, '66.249.65.153', '{\"0\":\"227\",\"1\":\"321\",\"3\":\"322\",\"5\":\"194\",\"9\":\"237\"}', '2020-10-21', '2020-12-07'),
(14, '66.249.65.156', '{\"0\":\"237\",\"1\":\"227\",\"5\":\"317\",\"7\":\"w3docs.com\",\"9\":\"233\"}', '2020-10-21', '2020-12-07'),
(15, '37.111.203.243', '[\"244\"]', '2020-10-21', NULL),
(16, '123.108.246.135', '[\"299\"]', '2020-10-23', NULL),
(17, '45.250.231.193', '{\"0\":\"240\",\"1\":\"228\",\"3\":\"256\",\"5\":\"shop.jpg\",\"7\":\"305\"}', '2020-10-23', '2020-11-13'),
(18, '103.139.8.6', '{\"0\":\"349\",\"1\":\"228\",\"3\":\"310\",\"5\":\"256\"}', '2020-10-25', '2021-02-27'),
(19, '27.147.205.219', '{\"0\":\"shop.jpg\",\"1\":\"228\",\"5\":\"236\",\"7\":\"242\",\"9\":\"305\"}', '2020-10-26', '2020-12-13'),
(20, '103.25.251.234', '[\"228\"]', '2020-10-28', NULL),
(21, '66.249.65.151', '{\"0\":\"203\",\"1\":\"198\",\"3\":\"204\",\"5\":\"209\",\"7\":\"home.html\"}', '2020-10-28', '2020-12-06'),
(22, '13.56.158.171', '[\"242\"]', '2020-10-29', NULL),
(23, '18.224.128.89', '{\"0\":\"308\",\"1\":\"254\",\"3\":\"242\"}', '2020-10-29', '2020-10-29'),
(24, '3.101.78.46', '[\"242\",\"254\"]', '2020-10-29', '2020-10-29'),
(25, '54.151.87.89', '[\"256\",\"227\"]', '2020-10-29', '2020-10-29'),
(26, '3.231.221.23', '[\"308\"]', '2020-10-29', NULL),
(27, '18.225.25.214', '{\"0\":\"308\",\"1\":\"254\",\"3\":\"242\"}', '2020-10-29', '2020-10-29'),
(28, '18.144.169.134', '[\"254\"]', '2020-10-29', NULL),
(29, '54.151.74.199', '[\"227\"]', '2020-10-29', NULL),
(30, '54.242.208.146', '[\"308\"]', '2020-10-29', NULL),
(31, '34.205.37.218', '[\"304\",\"256\"]', '2020-10-29', '2020-10-29'),
(32, '18.144.33.211', '[\"289\"]', '2020-10-29', NULL),
(33, '103.204.210.228', '{\"0\":\"237\",\"1\":\"310\",\"3\":\"309\"}', '2020-10-31', '2020-10-31'),
(34, '103.67.157.1', '[\"232\",\"231\"]', '2020-10-31', '2020-10-31'),
(35, '103.112.166.14', '{\"0\":\"apple.png\",\"1\":\"google.png\",\"3\":\"logo-footer.png\",\"5\":\"shop.jpg\"}', '2020-11-13', '2020-11-13'),
(36, '103.112.166.15', '{\"0\":\"shop.jpg\",\"1\":\"227\",\"5\":\"228\"}', '2020-11-14', '2021-01-02'),
(37, '119.30.38.47', '[\"227\"]', '2020-11-14', NULL),
(38, '103.112.54.241', '{\"0\":\"358\",\"1\":\"384\",\"3\":\"323\",\"5\":\"shop.jpg\",\"7\":\"321\"}', '2020-11-15', '2021-01-18'),
(39, '94.130.93.30', '{\"0\":\"shop.html\",\"1\":\"durbarit\",\"5\":\"247\",\"7\":\"246\",\"9\":\"245\"}', '2020-11-17', '2020-11-17'),
(40, '27.147.205.221', '[\"shop.jpg\"]', '2020-11-18', NULL),
(41, '144.48.151.73', '[\"227\"]', '2020-11-19', NULL),
(42, '202.134.14.157', '[\"274\",\"228\"]', '2020-11-19', '2020-11-19'),
(43, '37.111.202.180', '{\"0\":\"product_details.html\",\"1\":\"310\",\"3\":\"309\",\"5\":\"229\",\"7\":\"cart.html\"}', '2020-11-21', '2020-11-21'),
(44, '103.198.139.225', '[\"228\"]', '2020-11-21', NULL),
(45, '66.249.65.149', '{\"0\":\"196\",\"1\":\"184\",\"3\":\"301\",\"5\":\"179\",\"7\":\"197\"}', '2020-11-21', '2020-12-08'),
(46, '37.111.198.173', '{\"0\":\"236\",\"1\":\"308\",\"3\":\"228\",\"5\":\"229\",\"7\":\"305\"}', '2020-11-22', '2020-11-22'),
(47, '37.111.205.36', '[\"229\"]', '2020-11-23', NULL),
(48, '44.234.186.7', '[\"304\",\"276\"]', '2020-11-24', '2020-11-24'),
(49, '119.30.38.135', '{\"0\":\"300\",\"1\":\"product_details.html\",\"3\":\"227\"}', '2020-11-24', '2020-11-24'),
(50, '37.111.197.181', '{\"0\":\"298\",\"1\":\"256\",\"3\":\"227\"}', '2020-11-24', '2020-11-24'),
(51, '54.162.155.109', '{\"0\":\"255\",\"1\":\"301\",\"3\":\"303\",\"5\":\"305\",\"7\":\"304\"}', '2020-11-24', '2020-11-24'),
(52, '37.111.196.193', '[\"228\"]', '2020-11-25', NULL),
(53, '27.147.201.115', '{\"0\":\"shop.jpg\",\"3\":\"238\"}', '2020-11-26', '2020-12-03'),
(54, '119.30.41.194', '[\"310\"]', '2020-11-26', NULL),
(55, '37.111.201.90', '[\"297\",\"301\"]', '2020-11-28', '2020-11-28'),
(56, '37.111.198.32', '[\"228\",\"305\"]', '2020-11-29', '2020-11-29'),
(57, '45.57.247.46', '{\"0\":\"273\",\"1\":\"272\",\"3\":\"271\",\"5\":\"270\",\"7\":\"259\"}', '2020-11-30', '2020-11-30'),
(58, '103.153.28.242', '[\"237\"]', '2020-12-01', NULL),
(59, '34.94.4.151', '[\"273\"]', '2020-12-02', NULL),
(60, '202.134.14.147', '{\"0\":\"309\",\"1\":\"310\",\"3\":\"262\"}', '2020-12-02', '2020-12-02'),
(61, '202.134.8.135', '[\"306\"]', '2020-12-04', NULL),
(62, '116.204.148.64', '[\"306\"]', '2020-12-04', NULL),
(63, '103.112.166.13', '[\"321\",\"322\"]', '2020-12-05', '2020-12-05'),
(64, '51.161.119.229', '[\"shop.jpg\"]', '2020-12-06', NULL),
(65, '38.114.114.42', '[\"299\"]', '2020-12-07', NULL),
(66, '66.249.73.89', '[\"205\"]', '2020-12-09', NULL),
(67, '66.249.73.136', '[\"233\"]', '2020-12-10', NULL),
(68, '66.249.73.95', '[\"237\",\"227\"]', '2020-12-10', '2020-12-18'),
(69, '66.249.73.140', '[\"233\"]', '2020-12-11', NULL),
(70, '66.249.73.87', '{\"0\":\"306\",\"1\":\"187\",\"5\":\"188\",\"7\":\"207\"}', '2020-12-12', '2020-12-26'),
(71, '66.249.73.91', '{\"0\":\"306\",\"1\":\"180\",\"3\":\"jewelry-watches\",\"7\":\"192\",\"9\":\"208\"}', '2020-12-12', '2020-12-27'),
(72, '66.249.73.93', '[\"227\",\"237\"]', '2020-12-17', '2020-12-25'),
(73, '37.111.196.147', '[\"shop.jpg\"]', '2020-12-27', NULL),
(74, '66.249.73.92', '{\"0\":\"185\",\"1\":\"306\",\"3\":\"301\",\"5\":\"360\",\"7\":\"363\"}', '2020-12-29', '2021-02-26'),
(75, '66.249.73.90', '{\"0\":\"milk-dairy\",\"1\":\"301\",\"3\":\"306\"}', '2020-12-29', '2021-02-21'),
(76, '66.249.73.88', '{\"0\":\"185\",\"1\":\"184\",\"3\":\"180\",\"5\":\"baby-care\",\"7\":\"198\"}', '2020-12-29', '2021-02-26'),
(77, '66.249.73.129', '[\"228\",\"233\"]', '2020-12-31', '2021-01-31'),
(78, '208.84.155.68', '[\"shop.jpg\"]', '2021-01-01', NULL),
(79, '54.36.148.36', '[\"377\",\"323\"]', '2021-01-03', '2021-02-25'),
(80, '66.249.73.80', '{\"0\":\"301\",\"1\":\"386\",\"3\":\"394\",\"5\":\"390\",\"7\":\"loadproduct\"}', '2021-01-03', '2021-03-08'),
(81, '66.249.73.84', '[\"299\",\"306\"]', '2021-01-03', '2021-01-06'),
(82, '54.36.148.9', '[\"www.durbarit.com\",\"327\"]', '2021-01-03', '2021-03-06'),
(83, '192.36.136.246', '[\"323\"]', '2021-01-04', NULL),
(84, '130.255.160.137', '[\"323\"]', '2021-01-04', NULL),
(85, '178.151.245.174', '[\"323\"]', '2021-01-05', NULL),
(86, '66.249.73.78', '{\"0\":\"396\",\"1\":\"395\",\"3\":\"391\",\"5\":\"393\",\"7\":\"397\"}', '2021-01-05', '2021-02-21'),
(87, '66.249.73.132', '[\"228\"]', '2021-01-06', NULL),
(88, '37.111.193.84', '[\"shop.jpg\"]', '2021-01-07', NULL),
(89, '66.249.73.76', '{\"0\":\"237\",\"1\":\"227\",\"3\":\"389\",\"5\":\"392\",\"7\":\"387\"}', '2021-01-10', '2021-03-01'),
(90, '54.36.148.236', '{\"0\":\"345\",\"1\":\"371\",\"3\":\"329\",\"5\":\"389\",\"7\":\"www.durbarit.com\"}', '2021-01-10', '2021-02-17'),
(91, '54.36.148.42', '[\"331\",\"337\"]', '2021-01-10', '2021-02-07'),
(92, '54.36.148.100', '[\"339\"]', '2021-01-10', NULL),
(93, '54.36.148.30', '[\"365\",\"326\"]', '2021-01-10', '2021-02-16'),
(94, '54.36.148.76', '[\"348\",\"325\"]', '2021-01-10', '2021-01-11'),
(95, '54.36.148.31', '[\"395\",\"365\"]', '2021-01-10', '2021-02-10'),
(96, '54.36.149.58', '[\"327\",\"368\"]', '2021-01-10', '2021-01-29'),
(97, '54.36.148.137', '{\"0\":\"340\",\"1\":\"347\",\"3\":\"370\"}', '2021-01-11', '2021-03-02'),
(98, '54.36.148.1', '[\"361\",\"345\"]', '2021-01-11', '2021-02-01'),
(99, '54.36.149.19', '[\"396\",\"346\"]', '2021-01-11', '2021-02-07'),
(100, '54.36.149.30', '[\"347\"]', '2021-01-11', NULL),
(101, '54.36.148.74', '[\"336\"]', '2021-01-11', NULL),
(102, '54.36.148.152', '[\"389\",\"www.durbarit.com\"]', '2021-01-11', '2021-01-21'),
(103, '54.36.148.228', '[\"shop.html\",\"www.durbarit.com\"]', '2021-01-11', '2021-03-07'),
(104, '54.36.148.150', '{\"0\":\"365\",\"1\":\"336\",\"3\":\"www.durbarit.com\"}', '2021-01-11', '2021-02-16'),
(105, '202.134.10.137', '{\"0\":\"396\",\"1\":\"337\",\"3\":\"338\",\"5\":\"390\"}', '2021-01-13', '2021-01-13'),
(106, '111.225.148.140', '[\"386\"]', '2021-01-13', NULL),
(107, '220.243.136.247', '[\"387\"]', '2021-01-14', NULL),
(108, '94.130.12.118', '{\"0\":\"387\",\"1\":\"344\",\"3\":\"331\",\"5\":\"330\",\"7\":\"329\"}', '2021-01-14', '2021-01-18'),
(109, '37.111.193.232', '[\"387\"]', '2021-01-14', NULL),
(110, '110.249.202.113', '[\"329\",\"390\"]', '2021-01-14', '2021-01-17'),
(111, '110.249.201.201', '[\"386\"]', '2021-01-14', NULL),
(112, '110.249.201.190', '[\"395\"]', '2021-01-14', NULL),
(113, '66.249.75.48', '{\"0\":\"227\",\"1\":\"394\",\"3\":\"388\"}', '2021-01-15', '2021-01-17'),
(114, '66.249.75.46', '{\"0\":\"www.durbarit.com\",\"1\":\"395\",\"3\":\"389\"}', '2021-01-15', '2021-01-17'),
(115, '188.166.113.93', '[\"jewelry-watches\",\"201\"]', '2021-01-15', '2021-01-15'),
(116, '60.8.123.150', '[\"370\"]', '2021-01-15', NULL),
(117, '110.249.202.175', '[\"340\"]', '2021-01-15', NULL),
(118, '220.243.136.180', '[\"341\"]', '2021-01-15', NULL),
(119, '111.225.149.130', '[\"361\"]', '2021-01-15', NULL),
(120, '111.225.148.117', '[\"342\"]', '2021-01-15', NULL),
(121, '111.225.148.82', '[\"375\"]', '2021-01-15', NULL),
(122, '110.249.201.145', '[\"357\"]', '2021-01-15', NULL),
(123, '110.249.202.158', '[\"381\"]', '2021-01-15', NULL),
(124, '110.249.201.162', '[\"index.html\",\"365\"]', '2021-01-15', '2021-01-23'),
(125, '111.225.148.47', '[\"336\"]', '2021-01-15', NULL),
(126, '111.225.149.91', '[\"364\"]', '2021-01-15', NULL),
(127, '60.8.123.195', '[\"348\"]', '2021-01-15', NULL),
(128, '111.225.149.225', '[\"347\"]', '2021-01-15', NULL),
(129, '111.225.148.10', '[\"369\"]', '2021-01-15', NULL),
(130, '111.225.148.210', '[\"368\"]', '2021-01-15', NULL),
(131, '111.225.149.136', '[\"371\"]', '2021-01-15', NULL),
(132, '110.249.202.156', '[\"home.html\"]', '2021-01-15', NULL),
(133, '111.225.149.160', '[\"home.html\"]', '2021-01-15', NULL),
(134, '60.8.123.185', '[\"348\"]', '2021-01-16', NULL),
(135, '220.243.136.155', '[\"371\"]', '2021-01-16', NULL),
(136, '220.243.135.188', '[\"home.html\"]', '2021-01-16', NULL),
(137, '111.225.148.113', '[\"359\"]', '2021-01-16', NULL),
(138, '220.243.135.136', '[\"356\"]', '2021-01-16', NULL),
(139, '110.249.201.153', '[\"360\"]', '2021-01-16', NULL),
(140, '110.249.202.94', '[\"362\"]', '2021-01-16', NULL),
(141, '60.8.123.163', '[\"340\"]', '2021-01-16', NULL),
(142, '111.225.149.33', '[\"341\"]', '2021-01-16', NULL),
(143, '111.225.149.117', '[\"home.html\"]', '2021-01-16', NULL),
(144, '110.249.202.203', '[\"361\"]', '2021-01-16', NULL),
(145, '111.225.148.90', '[\"342\"]', '2021-01-16', NULL),
(146, '111.225.149.17', '[\"385\"]', '2021-01-16', NULL),
(147, '110.249.201.95', '[\"357\"]', '2021-01-16', NULL),
(148, '111.225.149.76', '[\"381\"]', '2021-01-16', NULL),
(149, '111.225.149.44', '[\"365\"]', '2021-01-16', NULL),
(150, '110.249.201.160', '[\"336\"]', '2021-01-16', NULL),
(151, '111.225.148.145', '[\"332\"]', '2021-01-16', NULL),
(152, '111.225.149.60', '[\"379\"]', '2021-01-16', NULL),
(153, '110.249.202.58', '[\"328\"]', '2021-01-16', NULL),
(154, '110.249.202.52', '[\"333\"]', '2021-01-16', NULL),
(155, '111.225.149.187', '[\"364\"]', '2021-01-16', NULL),
(156, '110.249.201.148', '[\"index.html\",\"369\"]', '2021-01-16', '2021-01-17'),
(157, '66.249.69.225', '[\"228\"]', '2021-01-16', NULL),
(158, '60.8.123.107', '[\"368\"]', '2021-01-16', NULL),
(159, '110.249.201.83', '[\"home.html\"]', '2021-01-16', NULL),
(160, '60.8.123.32', '[\"home.html\"]', '2021-01-16', NULL),
(161, '111.225.148.36', '[\"home.html\"]', '2021-01-16', NULL),
(162, '173.231.59.211', '{\"0\":\"index.html\",\"3\":\"shop.html\",\"5\":\"www.durbarit.com\",\"7\":\"384\",\"9\":\"383\"}', '2021-01-16', '2021-02-27'),
(163, '66.249.75.58', '[\"306\"]', '2021-01-17', NULL),
(164, '111.225.148.121', '[\"343\"]', '2021-01-17', NULL),
(165, '60.8.123.97', '[\"354\"]', '2021-01-17', NULL),
(166, '111.225.148.149', '[\"index.html\"]', '2021-01-17', NULL),
(167, '60.8.123.92', '[\"385\"]', '2021-01-17', NULL),
(168, '110.249.202.17', '[\"home.html\"]', '2021-01-17', NULL),
(169, '66.249.75.44', '[\"www.durbarit.com\"]', '2021-01-17', NULL),
(170, '110.249.201.102', '[\"332\"]', '2021-01-17', NULL),
(171, '111.225.148.33', '[\"home.html\"]', '2021-01-17', NULL),
(172, '103.139.8.7', '{\"0\":\"328\",\"1\":\"365\",\"3\":\"392\",\"5\":\"396\",\"7\":\"369\"}', '2021-01-17', '2021-01-17'),
(173, '60.8.123.225', '[\"379\"]', '2021-01-17', NULL),
(174, '111.225.148.63', '[\"home.html\"]', '2021-01-17', NULL),
(175, '110.249.202.53', '[\"345\"]', '2021-01-17', NULL),
(176, '60.8.123.242', '[\"344\"]', '2021-01-17', NULL),
(177, '111.225.149.52', '[\"346\"]', '2021-01-17', NULL),
(178, '111.225.149.196', '[\"327\"]', '2021-01-17', NULL),
(179, '110.249.202.97', '[\"326\"]', '2021-01-17', NULL),
(180, '220.243.136.242', '[\"325\"]', '2021-01-17', NULL),
(181, '110.249.201.184', '[\"home.html\"]', '2021-01-17', NULL),
(182, '111.225.149.58', '[\"328\"]', '2021-01-17', NULL),
(183, '58.145.189.244', '[\"396\"]', '2021-01-17', NULL),
(184, '220.243.135.135', '[\"333\"]', '2021-01-17', NULL),
(185, '60.8.123.140', '[\"324\"]', '2021-01-17', NULL),
(186, '60.8.123.138', '[\"index.html\",\"home.html\"]', '2021-01-17', '2021-01-22'),
(187, '111.225.149.188', '[\"home.html\"]', '2021-01-17', NULL),
(188, '60.8.123.120', '[\"home.html\"]', '2021-01-17', NULL),
(189, '111.225.148.131', '[\"home.html\"]', '2021-01-17', NULL),
(190, '110.249.202.43', '[\"335\"]', '2021-01-17', NULL),
(191, '111.225.148.143', '[\"home.html\"]', '2021-01-17', NULL),
(192, '111.225.149.114', '[\"330\"]', '2021-01-17', NULL),
(193, '110.249.201.182', '[\"331\"]', '2021-01-17', NULL),
(194, '110.249.202.196', '[\"home.html\"]', '2021-01-17', NULL),
(195, '110.249.202.74', '[\"home.html\"]', '2021-01-17', NULL),
(196, '60.8.123.26', '[\"home.html\"]', '2021-01-17', NULL),
(197, '111.225.149.249', '[\"home.html\"]', '2021-01-17', NULL),
(198, '60.8.123.8', '[\"home.html\"]', '2021-01-17', NULL),
(199, '110.249.201.113', '[\"359\"]', '2021-01-17', NULL),
(200, '110.249.201.210', '[\"356\"]', '2021-01-17', NULL),
(201, '60.8.123.157', '[\"home.html\"]', '2021-01-17', NULL),
(202, '111.225.149.212', '[\"352\"]', '2021-01-17', NULL),
(203, '220.243.135.238', '[\"353\"]', '2021-01-17', NULL),
(204, '111.225.148.41', '[\"350\"]', '2021-01-17', NULL),
(205, '110.249.202.243', '[\"373\"]', '2021-01-17', NULL),
(206, '110.249.202.216', '[\"360\"]', '2021-01-18', NULL),
(207, '111.225.149.139', '[\"362\"]', '2021-01-18', NULL),
(208, '111.225.149.10', '[\"382\"]', '2021-01-18', NULL),
(209, '66.249.75.76', '{\"0\":\"349\",\"1\":\"shop.jpg\",\"3\":\"www.durbarit.com\"}', '2021-01-18', '2021-01-23'),
(210, '52.81.111.98', '[\"353\"]', '2021-01-18', NULL),
(211, '52.80.226.130', '[\"373\"]', '2021-01-18', NULL),
(212, '54.223.130.63', '[\"382\"]', '2021-01-18', NULL),
(213, '66.249.75.64', '{\"0\":\"301\",\"3\":\"389\",\"5\":\"322\"}', '2021-01-18', '2021-01-23'),
(214, '54.222.165.113', '[\"352\",\"378\"]', '2021-01-18', '2021-01-18'),
(215, '52.80.244.126', '[\"350\"]', '2021-01-18', NULL),
(216, '54.222.226.13', '[\"index.html\"]', '2021-01-18', NULL),
(217, '54.222.162.44', '[\"354\"]', '2021-01-18', NULL),
(218, '52.80.165.95', '[\"index.html\"]', '2021-01-18', NULL),
(219, '66.249.72.196', '[\"228\"]', '2021-01-18', NULL),
(220, '66.249.75.95', '{\"0\":\"396\",\"1\":\"321\",\"3\":\"363\",\"5\":\"306\"}', '2021-01-19', '2021-01-19'),
(221, '66.249.75.66', '[\"178\",\"301\"]', '2021-01-19', '2021-01-21'),
(222, '66.249.75.74', '{\"0\":\"354\",\"1\":\"351\",\"3\":\"348\"}', '2021-01-19', '2021-01-23'),
(223, '52.80.105.123', '[\"home.html\"]', '2021-01-19', NULL),
(224, '54.222.165.151', '[\"index.html\"]', '2021-01-19', NULL),
(225, '54.222.203.57', '[\"home.html\"]', '2021-01-19', NULL),
(226, '52.80.43.225', '[\"home.html\"]', '2021-01-19', NULL),
(227, '52.80.3.2', '[\"index.html\"]', '2021-01-19', NULL),
(228, '52.81.126.254', '[\"home.html\"]', '2021-01-19', NULL),
(229, '54.222.145.109', '[\"home.html\"]', '2021-01-19', NULL),
(230, '52.81.3.230', '[\"home.html\"]', '2021-01-19', NULL),
(231, '52.80.60.64', '[\"home.html\"]', '2021-01-19', NULL),
(232, '54.222.155.143', '[\"home.html\"]', '2021-01-19', NULL),
(233, '52.80.184.153', '[\"home.html\"]', '2021-01-19', NULL),
(234, '52.81.132.51', '[\"home.html\"]', '2021-01-19', NULL),
(235, '54.222.212.129', '[\"home.html\"]', '2021-01-19', NULL),
(236, '66.249.75.78', '[\"352\",\"350\"]', '2021-01-19', '2021-01-19'),
(237, '54.36.148.233', '[\"382\",\"323\"]', '2021-01-20', '2021-02-03'),
(238, '52.81.9.175', '[\"home.html\"]', '2021-01-20', NULL),
(239, '54.222.172.155', '[\"home.html\"]', '2021-01-20', NULL),
(240, '54.223.87.227', '[\"home.html\"]', '2021-01-20', NULL),
(241, '54.222.196.235', '[\"home.html\"]', '2021-01-20', NULL),
(242, '52.81.111.72', '[\"home.html\"]', '2021-01-20', NULL),
(243, '52.80.164.236', '[\"home.html\"]', '2021-01-20', NULL),
(244, '54.223.38.99', '[\"home.html\"]', '2021-01-20', NULL),
(245, '52.80.71.50', '[\"home.html\"]', '2021-01-20', NULL),
(246, '52.81.133.219', '[\"home.html\"]', '2021-01-20', NULL),
(247, '52.81.114.98', '[\"home.html\"]', '2021-01-20', NULL),
(248, '54.223.110.12', '[\"home.html\"]', '2021-01-20', NULL),
(249, '52.81.131.233', '[\"index.html\",\"home.html\"]', '2021-01-20', '2021-01-21'),
(250, '54.222.228.4', '[\"home.html\"]', '2021-01-20', NULL),
(251, '54.36.149.64', '[\"370\",\"338\"]', '2021-01-21', '2021-02-16'),
(252, '54.36.148.95', '[\"329\",\"337\"]', '2021-01-21', '2021-02-25'),
(253, '54.36.148.17', '[\"388\",\"339\"]', '2021-01-21', '2021-01-31'),
(254, '54.36.149.53', '[\"353\",\"354\"]', '2021-01-21', '2021-03-02'),
(255, '54.36.148.39', '[\"352\"]', '2021-01-21', NULL),
(256, '54.36.148.128', '[\"index.html\",\"342\"]', '2021-01-21', '2021-03-03'),
(257, '54.36.148.83', '{\"0\":\"397\",\"1\":\"373\",\"3\":\"334\"}', '2021-01-21', '2021-02-25'),
(258, '54.36.148.144', '[\"333\",\"340\"]', '2021-01-21', '2021-03-02'),
(259, '54.36.148.43', '[\"379\",\"350\"]', '2021-01-21', '2021-03-03'),
(260, '54.36.149.81', '{\"0\":\"index.html\",\"1\":\"344\",\"3\":\"354\"}', '2021-01-21', '2021-02-17'),
(261, '54.36.148.97', '[\"353\"]', '2021-01-21', NULL),
(262, '54.36.148.58', '[\"395\",\"396\"]', '2021-01-21', '2021-01-21'),
(263, '54.36.148.227', '[\"392\",\"328\"]', '2021-01-21', '2021-02-07'),
(264, '54.36.148.113', '[\"356\",\"397\"]', '2021-01-21', '2021-01-31'),
(265, '54.36.148.247', '[\"390\"]', '2021-01-21', NULL),
(266, '54.36.148.158', '[\"327\",\"391\"]', '2021-01-21', '2021-03-05'),
(267, '54.36.149.34', '[\"370\",\"www.durbarit.com\"]', '2021-01-21', '2021-01-29'),
(268, '54.36.148.66', '{\"0\":\"shop.html\",\"1\":\"379\",\"3\":\"334\"}', '2021-01-21', '2021-02-12'),
(269, '54.36.148.103', '{\"0\":\"index.html\",\"1\":\"352\",\"3\":\"390\",\"5\":\"364\",\"7\":\"332\"}', '2021-01-21', '2021-03-07'),
(270, '52.81.120.145', '[\"index.html\"]', '2021-01-21', NULL),
(271, '52.80.121.229', '[\"index.html\"]', '2021-01-21', NULL),
(272, '54.223.244.32', '[\"index.html\"]', '2021-01-21', NULL),
(273, '54.36.148.149', '{\"0\":\"375\",\"1\":\"368\",\"3\":\"333\"}', '2021-01-21', '2021-02-25'),
(274, '54.36.148.154', '{\"0\":\"348\",\"1\":\"shop.html\",\"3\":\"358\",\"5\":\"357\"}', '2021-01-21', '2021-03-02'),
(275, '52.81.163.207', '[\"index.html\"]', '2021-01-21', NULL),
(276, '54.223.98.197', '[\"index.html\"]', '2021-01-21', NULL),
(277, '54.36.149.94', '[\"390\",\"www.durbarit.com\"]', '2021-01-21', '2021-02-07'),
(278, '52.80.73.169', '[\"index.html\"]', '2021-01-21', NULL),
(279, '54.223.202.54', '[\"index.html\"]', '2021-01-21', NULL),
(280, '54.36.148.163', '[\"www.durbarit.com\"]', '2021-01-21', NULL),
(281, '54.223.120.217', '[\"index.html\"]', '2021-01-21', NULL),
(282, '52.80.163.33', '[\"index.html\"]', '2021-01-21', NULL),
(283, '54.222.156.155', '[\"index.html\"]', '2021-01-21', NULL),
(284, '54.222.252.150', '[\"home.html\"]', '2021-01-21', NULL),
(285, '54.222.137.216', '[\"home.html\"]', '2021-01-21', NULL),
(286, '54.223.70.23', '[\"home.html\"]', '2021-01-21', NULL),
(287, '54.36.149.100', '[\"www.durbarit.com\"]', '2021-01-22', NULL),
(288, '111.225.148.187', '[\"index.html\"]', '2021-01-22', NULL),
(289, '111.225.148.48', '[\"index.html\"]', '2021-01-22', NULL),
(290, '111.225.148.119', '[\"index.html\"]', '2021-01-22', NULL),
(291, '110.249.201.170', '[\"index.html\"]', '2021-01-22', NULL),
(292, '110.249.202.80', '[\"index.html\"]', '2021-01-22', NULL),
(293, '60.8.123.180', '[\"index.html\"]', '2021-01-22', NULL),
(294, '60.8.123.191', '[\"index.html\"]', '2021-01-22', NULL),
(295, '110.249.201.72', '[\"index.html\"]', '2021-01-22', NULL),
(296, '110.249.201.221', '[\"index.html\"]', '2021-01-22', NULL),
(297, '60.8.123.172', '[\"index.html\"]', '2021-01-22', NULL),
(298, '220.243.136.132', '[\"index.html\"]', '2021-01-22', NULL),
(299, '110.249.201.236', '[\"index.html\"]', '2021-01-23', NULL),
(300, '110.249.202.173', '[\"index.html\"]', '2021-01-23', NULL),
(301, '111.225.148.178', '[\"index.html\"]', '2021-01-23', NULL),
(302, '52.36.125.174', '{\"0\":\"index.html\",\"1\":\"396\",\"5\":\"347\",\"7\":\"www.durbarit.com\",\"9\":\"shop.html\"}', '2021-01-26', '2021-01-26'),
(303, '207.200.8.180', '[\"shop.jpg\"]', '2021-01-26', NULL),
(304, '51.222.43.122', '{\"0\":\"372\",\"1\":\"332\",\"3\":\"375\",\"5\":\"394\"}', '2021-01-26', '2021-01-26'),
(305, '54.36.148.219', '[\"323\"]', '2021-01-29', NULL),
(306, '54.36.148.96', '[\"324\"]', '2021-01-29', NULL),
(307, '54.36.148.73', '[\"324\",\"326\"]', '2021-01-29', '2021-02-25'),
(308, '13.66.139.105', '{\"0\":\"232\",\"1\":\"237\",\"3\":\"293\",\"5\":\"297\",\"7\":\"286\"}', '2021-01-29', '2021-02-08'),
(309, '13.66.139.49', '[\"233\",\"231\"]', '2021-01-29', '2021-01-29'),
(310, '54.36.148.0', '[\"364\",\"325\"]', '2021-01-29', '2021-03-02'),
(311, '54.36.148.106', '[\"329\"]', '2021-01-29', NULL),
(312, '54.36.149.77', '{\"0\":\"364\",\"1\":\"www.durbarit.com\",\"3\":\"330\"}', '2021-01-29', '2021-02-16'),
(313, '54.36.148.151', '[\"382\",\"331\"]', '2021-01-29', '2021-02-25'),
(314, '13.66.139.119', '[\"228\"]', '2021-01-29', NULL),
(315, '176.9.58.227', '{\"0\":\"www.durbarit.com\",\"1\":\"index.html\",\"3\":\"shop.html\",\"7\":\"380\",\"9\":\"383\"}', '2021-01-29', '2021-01-29'),
(316, '54.36.148.239', '{\"0\":\"index.html\",\"1\":\"336\",\"3\":\"342\",\"5\":\"shop.html\",\"9\":\"391\"}', '2021-01-29', '2021-03-08'),
(317, '54.36.148.240', '[\"345\"]', '2021-01-29', NULL),
(318, '54.36.148.190', '[\"365\"]', '2021-01-29', NULL),
(319, '54.36.148.91', '{\"0\":\"shop.html\",\"1\":\"351\",\"3\":\"368\"}', '2021-01-29', '2021-03-05'),
(320, '54.36.148.6', '{\"0\":\"374\",\"1\":\"www.durbarit.com\",\"3\":\"346\",\"5\":\"342\"}', '2021-01-29', '2021-02-03'),
(321, '54.36.148.246', '[\"394\",\"336\"]', '2021-01-29', '2021-02-12'),
(322, '54.36.149.103', '[\"369\"]', '2021-01-29', NULL),
(323, '54.36.148.108', '[\"371\"]', '2021-01-29', NULL),
(324, '54.36.149.17', '{\"0\":\"361\",\"1\":\"www.durbarit.com\",\"3\":\"333\",\"5\":\"345\"}', '2021-01-29', '2021-02-25'),
(325, '54.36.149.66', '[\"index.html\",\"337\"]', '2021-01-30', '2021-03-05'),
(326, '54.36.148.109', '{\"0\":\"391\",\"1\":\"index.html\",\"3\":\"339\"}', '2021-01-30', '2021-02-25'),
(327, '54.36.149.88', '{\"0\":\"394\",\"1\":\"index.html\",\"3\":\"363\"}', '2021-01-30', '2021-03-02'),
(328, '54.36.149.36', '[\"360\"]', '2021-01-30', NULL),
(329, '54.36.148.249', '[\"375\"]', '2021-01-30', NULL),
(330, '54.36.149.62', '{\"0\":\"www.durbarit.com\",\"1\":\"index.html\",\"3\":\"355\"}', '2021-01-30', '2021-02-14'),
(331, '54.36.149.35', '[\"354\",\"359\"]', '2021-01-30', '2021-02-09'),
(332, '54.36.149.7', '[\"356\"]', '2021-01-30', NULL),
(333, '54.36.148.201', '[\"shop.html\"]', '2021-01-30', NULL),
(334, '54.36.149.16', '{\"0\":\"338\",\"1\":\"385\",\"3\":\"index.html\"}', '2021-01-30', '2021-02-25'),
(335, '54.36.148.197', '[\"shop.html\"]', '2021-01-30', NULL),
(336, '13.66.139.163', '[\"230\",\"229\"]', '2021-01-30', '2021-01-30'),
(337, '54.36.148.54', '[\"391\",\"index.html\"]', '2021-01-30', '2021-02-07'),
(338, '54.36.149.12', '{\"0\":\"374\",\"1\":\"397\",\"3\":\"index.html\"}', '2021-01-31', '2021-02-25'),
(339, '54.36.148.203', '[\"shop.html\"]', '2021-01-31', NULL),
(340, '54.36.149.11', '[\"index.html\",\"324\"]', '2021-01-31', '2021-03-04'),
(341, '54.36.149.23', '[\"325\"]', '2021-01-31', NULL),
(342, '54.36.148.222', '[\"378\"]', '2021-01-31', NULL),
(343, '54.36.149.59', '{\"0\":\"372\",\"1\":\"368\",\"3\":\"335\",\"5\":\"www.durbarit.com\",\"7\":\"386\"}', '2021-01-31', '2021-03-02'),
(344, '54.36.149.84', '[\"391\"]', '2021-01-31', NULL),
(345, '54.36.148.183', '{\"0\":\"www.durbarit.com\",\"1\":\"371\",\"3\":\"389\"}', '2021-01-31', '2021-03-08'),
(346, '54.36.148.145', '[\"375\"]', '2021-01-31', NULL),
(347, '54.36.149.27', '[\"355\"]', '2021-01-31', NULL),
(348, '54.36.148.135', '[\"371\",\"376\"]', '2021-01-31', '2021-02-13'),
(349, '54.36.148.185', '[\"370\",\"333\"]', '2021-02-01', '2021-03-03'),
(350, '54.36.148.180', '[\"384\",\"www.durbarit.com\"]', '2021-02-01', '2021-02-25'),
(351, '54.36.148.212', '[\"362\"]', '2021-02-01', NULL),
(352, '54.36.148.193', '[\"383\"]', '2021-02-02', NULL),
(353, '54.36.148.225', '[\"384\"]', '2021-02-03', NULL),
(354, '54.36.148.204', '[\"349\"]', '2021-02-03', NULL),
(355, '54.36.148.143', '[\"351\"]', '2021-02-03', NULL),
(356, '54.36.148.25', '[\"387\"]', '2021-02-03', NULL),
(357, '54.36.148.11', '[\"362\"]', '2021-02-03', NULL),
(358, '54.36.149.105', '[\"324\",\"373\"]', '2021-02-03', '2021-02-07'),
(359, '54.36.148.175', '[\"325\",\"349\"]', '2021-02-03', '2021-02-16'),
(360, '54.36.149.3', '[\"351\"]', '2021-02-03', NULL),
(361, '54.36.148.196', '[\"387\"]', '2021-02-03', NULL),
(362, '54.36.149.49', '[\"336\",\"index.html\"]', '2021-02-03', '2021-02-17'),
(363, '54.36.148.50', '[\"shop.html\"]', '2021-02-03', NULL),
(364, '54.36.148.255', '[\"www.durbarit.com\"]', '2021-02-03', NULL),
(365, '184.94.240.92', '{\"0\":\"361\",\"1\":\"358\",\"3\":\"328\",\"5\":\"390\",\"7\":\"397\"}', '2021-02-03', '2021-02-03'),
(366, '66.249.69.159', '[\"329\"]', '2021-02-03', NULL),
(367, '5.189.130.197', '{\"0\":\"331\",\"1\":\"330\",\"3\":\"329\",\"5\":\"325\",\"7\":\"327\"}', '2021-02-04', '2021-02-04'),
(368, '54.36.149.86', '[\"366\"]', '2021-02-04', NULL),
(369, '78.46.149.254', '{\"0\":\"391\",\"1\":\"364\",\"3\":\"www.durbarit.com\",\"5\":\"shop.html\",\"7\":\"index.html\"}', '2021-02-05', '2021-02-05'),
(370, '192.99.10.47', '{\"0\":\"387\",\"1\":\"388\",\"3\":\"www.durbarit.com\",\"5\":\"shop.html\",\"7\":\"index.html\"}', '2021-02-05', '2021-02-05'),
(371, '66.249.79.235', '[\"227\"]', '2021-02-05', NULL),
(372, '144.76.120.197', '{\"0\":\"www.durbarit.com\",\"1\":\"shop.html\",\"3\":\"index.html\"}', '2021-02-05', '2021-02-05'),
(373, '13.66.139.107', '{\"0\":\"257\",\"1\":\"259\",\"3\":\"284\",\"5\":\"245\",\"7\":\"283\"}', '2021-02-06', '2021-02-09'),
(374, '13.66.139.19', '{\"0\":\"280\",\"1\":\"281\",\"3\":\"295\",\"5\":\"274\",\"7\":\"294\"}', '2021-02-06', '2021-02-09'),
(375, '185.119.81.99', '{\"0\":\"334\",\"1\":\"341\",\"3\":\"336\",\"5\":\"340\",\"7\":\"342\"}', '2021-02-07', '2021-02-11'),
(376, '54.36.148.41', '[\"394\"]', '2021-02-07', NULL),
(377, '54.36.149.43', '[\"390\",\"393\"]', '2021-02-07', '2021-03-07'),
(378, '54.36.148.254', '[\"325\"]', '2021-02-07', NULL),
(379, '54.36.149.97', '[\"330\"]', '2021-02-07', NULL),
(380, '54.36.148.147', '{\"0\":\"shop.html\",\"1\":\"355\",\"3\":\"327\"}', '2021-02-07', '2021-03-08'),
(381, '54.36.148.129', '[\"372\"]', '2021-02-08', NULL),
(382, '54.36.148.131', '[\"index.html\",\"www.durbarit.com\"]', '2021-02-08', '2021-03-05'),
(383, '54.36.149.38', '[\"342\",\"www.durbarit.com\"]', '2021-02-08', '2021-02-17'),
(384, '54.36.148.20', '[\"shop.html\"]', '2021-02-08', NULL),
(385, '54.36.148.12', '[\"www.durbarit.com\",\"index.html\"]', '2021-02-08', '2021-02-27'),
(386, '66.249.69.156', '[\"299\"]', '2021-02-09', NULL),
(387, '54.36.148.119', '[\"332\"]', '2021-02-09', NULL),
(388, '54.36.148.178', '[\"361\"]', '2021-02-09', NULL),
(389, '54.36.148.48', '[\"357\"]', '2021-02-09', NULL),
(390, '54.36.148.162', '[\"350\"]', '2021-02-09', NULL),
(391, '54.36.149.93', '[\"354\"]', '2021-02-09', NULL),
(392, '54.36.148.122', '{\"0\":\"326\",\"1\":\"325\",\"3\":\"352\"}', '2021-02-09', '2021-03-08'),
(393, '54.36.148.75', '{\"0\":\"370\",\"1\":\"347\",\"3\":\"353\"}', '2021-02-09', '2021-03-06'),
(394, '54.36.149.25', '[\"350\"]', '2021-02-09', NULL),
(395, '54.36.148.52', '[\"353\"]', '2021-02-09', NULL),
(396, '54.36.148.68', '[\"334\"]', '2021-02-09', NULL),
(397, '54.36.148.57', '[\"355\",\"338\"]', '2021-02-09', '2021-02-25'),
(398, '54.36.148.4', '[\"340\"]', '2021-02-09', NULL),
(399, '54.36.148.213', '[\"339\"]', '2021-02-09', NULL),
(400, '54.36.148.214', '[\"www.durbarit.com\"]', '2021-02-09', NULL),
(401, '198.16.74.205', '[\"329\"]', '2021-02-09', NULL),
(402, '54.36.148.207', '{\"0\":\"334\",\"1\":\"396\",\"3\":\"index.html\"}', '2021-02-09', '2021-03-02'),
(403, '54.36.148.121', '[\"shop.html\"]', '2021-02-09', NULL),
(404, '66.249.69.157', '[\"306\",\"compare\"]', '2021-02-10', '2021-02-11'),
(405, '54.36.148.181', '[\"392\"]', '2021-02-10', NULL),
(406, '54.36.148.24', '[\"390\"]', '2021-02-10', NULL),
(407, '54.36.148.89', '[\"391\"]', '2021-02-10', NULL),
(408, '54.36.149.37', '{\"0\":\"www.durbarit.com\",\"1\":\"373\",\"3\":\"index.html\"}', '2021-02-10', '2021-03-07'),
(409, '54.36.148.124', '[\"index.html\"]', '2021-02-10', NULL),
(410, '54.36.148.19', '[\"393\",\"shop.html\"]', '2021-02-10', '2021-03-03'),
(411, '54.36.148.139', '[\"391\"]', '2021-02-10', NULL),
(412, '54.36.149.54', '[\"365\",\"388\"]', '2021-02-10', '2021-03-03'),
(413, '54.36.149.5', '[\"369\",\"379\"]', '2021-02-10', '2021-02-16'),
(414, '54.36.148.61', '{\"0\":\"356\",\"1\":\"364\",\"3\":\"378\"}', '2021-02-11', '2021-02-25'),
(415, '54.36.148.126', '[\"389\",\"386\"]', '2021-02-11', '2021-02-12'),
(416, '54.36.148.176', '[\"shop.html\"]', '2021-02-11', NULL),
(417, '54.36.149.9', '[\"www.durbarit.com\"]', '2021-02-11', NULL),
(418, '54.36.149.21', '[\"331\",\"www.durbarit.com\"]', '2021-02-11', '2021-02-25'),
(419, '66.249.66.46', '[\"shop.jpg\"]', '2021-02-11', NULL),
(420, '207.46.13.92', '[\"227\"]', '2021-02-11', NULL),
(421, '54.36.149.29', '[\"392\"]', '2021-02-12', NULL),
(422, '54.36.148.51', '[\"index.html\",\"397\"]', '2021-02-12', '2021-03-06'),
(423, '54.36.148.252', '[\"index.html\"]', '2021-02-12', NULL),
(424, '54.36.148.251', '[\"index.html\"]', '2021-02-12', NULL),
(425, '54.36.148.116', '[\"index.html\"]', '2021-02-12', NULL),
(426, '54.36.148.10', '[\"391\",\"348\"]', '2021-02-14', '2021-02-25'),
(427, '54.36.148.164', '[\"www.durbarit.com\"]', '2021-02-14', NULL),
(428, '54.36.149.28', '[\"www.durbarit.com\"]', '2021-02-14', NULL),
(429, '54.36.149.51', '[\"344\"]', '2021-02-14', NULL),
(430, '54.36.149.15', '[\"www.durbarit.com\"]', '2021-02-14', NULL),
(431, '66.249.73.159', '[\"228\"]', '2021-02-15', NULL),
(432, '54.36.148.230', '[\"349\",\"www.durbarit.com\"]', '2021-02-15', '2021-02-24'),
(433, '54.36.148.200', '[\"345\"]', '2021-02-15', NULL),
(434, '207.46.13.47', '[\"276\"]', '2021-02-15', NULL),
(435, '77.75.77.109', '[\"324\",\"326\"]', '2021-02-16', '2021-02-16'),
(436, '54.36.148.161', '[\"349\",\"330\"]', '2021-02-16', '2021-02-25'),
(437, '54.36.148.223', '[\"363\",\"331\"]', '2021-02-16', '2021-02-25'),
(438, '103.248.238.202', '[\"392\"]', '2021-02-16', NULL),
(439, '54.36.148.18', '[\"362\",\"388\"]', '2021-02-16', '2021-02-25'),
(440, '54.36.148.112', '{\"0\":\"www.durbarit.com\",\"1\":\"392\",\"3\":\"326\"}', '2021-02-16', '2021-03-05'),
(441, '54.36.148.127', '[\"360\",\"324\"]', '2021-02-16', '2021-02-25'),
(442, '54.36.148.67', '[\"www.durbarit.com\"]', '2021-02-16', NULL),
(443, '54.36.149.63', '{\"0\":\"350\",\"1\":\"366\",\"3\":\"www.durbarit.com\"}', '2021-02-16', '2021-03-02'),
(444, '54.36.148.217', '[\"327\",\"www.durbarit.com\"]', '2021-02-16', '2021-03-08'),
(445, '54.36.149.92', '[\"www.durbarit.com\"]', '2021-02-16', NULL),
(446, '77.75.77.72', '[\"333\",\"329\"]', '2021-02-16', '2021-03-06'),
(447, '54.36.149.22', '[\"347\"]', '2021-02-16', NULL),
(448, '54.36.148.63', '[\"348\"]', '2021-02-16', NULL),
(449, '77.75.78.164', '{\"0\":\"327\",\"1\":\"325\",\"3\":\"330\"}', '2021-02-16', '2021-03-06'),
(450, '54.36.148.140', '[\"369\"]', '2021-02-17', NULL),
(451, '54.36.148.23', '[\"370\"]', '2021-02-17', NULL),
(452, '54.36.148.167', '[\"336\",\"346\"]', '2021-02-17', '2021-03-02'),
(453, '54.36.148.82', '[\"www.durbarit.com\"]', '2021-02-17', NULL),
(454, '54.36.149.98', '[\"www.durbarit.com\"]', '2021-02-17', NULL),
(455, '54.36.149.85', '[\"www.durbarit.com\"]', '2021-02-17', NULL),
(456, '54.36.148.192', '[\"www.durbarit.com\"]', '2021-02-17', NULL),
(457, '54.36.148.165', '[\"390\",\"shop.html\"]', '2021-02-18', '2021-02-25'),
(458, '207.46.13.231', '[\"280\"]', '2021-02-19', NULL),
(459, '77.75.78.163', '[\"331\"]', '2021-02-22', NULL),
(460, '77.75.76.167', '[\"328\",\"326\"]', '2021-02-22', '2021-02-28'),
(461, '77.75.76.166', '[\"332\",\"329\"]', '2021-02-22', '2021-03-06'),
(462, '77.75.78.167', '[\"328\"]', '2021-02-22', NULL),
(463, '77.75.76.163', '[\"391\",\"327\"]', '2021-02-22', '2021-03-06'),
(464, '157.55.39.181', '[\"232\"]', '2021-02-23', NULL),
(465, '40.77.167.77', '[\"293\"]', '2021-02-23', NULL),
(466, '69.160.160.56', '{\"0\":\"373\",\"1\":\"www.durbarit.com\",\"3\":\"388\",\"5\":\"395\",\"7\":\"394\"}', '2021-02-23', '2021-02-23'),
(467, '54.36.148.123', '[\"www.durbarit.com\",\"393\"]', '2021-02-24', '2021-03-07'),
(468, '40.77.167.69', '[\"259\"]', '2021-02-24', NULL),
(469, '54.36.148.105', '[\"345\",\"396\"]', '2021-02-25', '2021-03-03'),
(470, '54.36.148.160', '[\"381\"]', '2021-02-25', NULL),
(471, '54.36.148.232', '[\"396\",\"351\"]', '2021-02-25', '2021-03-07'),
(472, '77.75.76.165', '[\"329\",\"397\"]', '2021-02-25', '2021-03-06'),
(473, '54.36.149.104', '[\"332\"]', '2021-02-25', NULL),
(474, '77.75.77.17', '{\"0\":\"324\",\"1\":\"329\",\"3\":\"331\"}', '2021-02-25', '2021-02-28'),
(475, '54.36.149.71', '[\"383\"]', '2021-02-25', NULL),
(476, '54.36.148.146', '[\"index.html\",\"333\"]', '2021-02-25', '2021-03-03'),
(477, '54.36.148.170', '[\"384\"]', '2021-02-25', NULL),
(478, '77.75.78.161', '[\"327\"]', '2021-02-25', NULL),
(479, '54.36.149.78', '[\"360\"]', '2021-02-25', NULL),
(480, '54.36.148.245', '[\"377\"]', '2021-02-25', NULL),
(481, '54.36.149.14', '[\"374\"]', '2021-02-25', NULL),
(482, '77.75.77.119', '[\"328\"]', '2021-02-25', NULL),
(483, '54.36.148.191', '[\"381\"]', '2021-02-25', NULL),
(484, '54.36.148.53', '[\"385\"]', '2021-02-25', NULL),
(485, '54.36.148.159', '[\"337\"]', '2021-02-25', NULL),
(486, '54.36.149.61', '[\"394\"]', '2021-02-25', NULL),
(487, '54.36.148.55', '[\"359\"]', '2021-02-25', NULL),
(488, '54.36.148.224', '[\"335\",\"396\"]', '2021-02-25', '2021-03-07'),
(489, '54.36.148.177', '[\"328\"]', '2021-02-25', NULL),
(490, '54.36.148.114', '[\"389\"]', '2021-02-25', NULL),
(491, '54.36.148.235', '[\"359\"]', '2021-02-25', NULL),
(492, '54.36.148.141', '[\"366\"]', '2021-02-25', NULL),
(493, '54.36.149.90', '[\"335\",\"376\"]', '2021-02-25', '2021-03-06'),
(494, '77.75.79.32', '[\"325\"]', '2021-02-25', NULL),
(495, '54.36.148.166', '[\"387\"]', '2021-02-25', NULL),
(496, '54.36.148.78', '[\"394\"]', '2021-02-25', NULL),
(497, '54.36.148.7', '[\"376\"]', '2021-02-25', NULL),
(498, '54.36.148.44', '[\"325\"]', '2021-02-25', NULL),
(499, '54.36.148.238', '[\"368\",\"397\"]', '2021-02-25', '2021-03-07'),
(500, '54.36.148.69', '[\"389\",\"392\"]', '2021-02-25', '2021-03-03'),
(501, '54.36.149.20', '[\"383\",\"395\"]', '2021-02-25', '2021-02-25'),
(502, '54.36.148.218', '[\"www.durbarit.com\"]', '2021-02-25', NULL),
(503, '54.36.148.29', '[\"index.html\"]', '2021-02-25', NULL),
(504, '54.36.148.70', '[\"index.html\"]', '2021-02-25', NULL),
(505, '54.36.148.215', '[\"shop.html\"]', '2021-02-25', NULL),
(506, '157.55.39.188', '[\"396\"]', '2021-02-26', NULL),
(507, '13.66.139.74', '{\"0\":\"330\",\"1\":\"331\",\"3\":\"327\",\"5\":\"329\"}', '2021-02-27', '2021-02-27'),
(508, '40.77.167.25', '[\"325\"]', '2021-02-27', NULL),
(509, '13.66.139.11', '[\"325\"]', '2021-02-27', NULL),
(510, '13.66.139.81', '[\"324\",\"326\"]', '2021-02-27', '2021-02-27'),
(511, '77.75.77.11', '[\"327\"]', '2021-02-27', NULL),
(512, '40.77.167.9', '[\"326\"]', '2021-02-28', NULL),
(513, '157.55.39.223', '[\"275\"]', '2021-02-28', NULL),
(514, '40.77.167.13', '[\"237\"]', '2021-02-28', NULL),
(515, '40.77.167.10', '[\"392\"]', '2021-03-01', NULL),
(516, '13.66.139.139', '[\"323\"]', '2021-03-01', NULL),
(517, '54.36.148.194', '[\"358\"]', '2021-03-02', NULL),
(518, '77.75.79.101', '[\"328\"]', '2021-03-02', NULL),
(519, '54.36.148.2', '[\"396\"]', '2021-03-02', NULL),
(520, '54.36.148.16', '[\"388\"]', '2021-03-02', NULL),
(521, '54.36.148.229', '[\"361\"]', '2021-03-02', NULL),
(522, '54.36.148.87', '[\"334\"]', '2021-03-02', NULL),
(523, '54.36.148.101', '[\"346\"]', '2021-03-02', NULL),
(524, '54.36.148.40', '[\"350\"]', '2021-03-02', NULL),
(525, '54.36.149.32', '[\"354\"]', '2021-03-02', NULL),
(526, '54.36.148.32', '[\"340\"]', '2021-03-02', NULL),
(527, '54.36.148.60', '[\"354\"]', '2021-03-02', NULL),
(528, '54.36.148.244', '[\"390\"]', '2021-03-02', NULL),
(529, '54.36.148.209', '[\"353\"]', '2021-03-02', NULL),
(530, '54.36.148.208', '[\"347\"]', '2021-03-02', NULL),
(531, '54.36.148.155', '[\"337\"]', '2021-03-02', NULL),
(532, '54.36.148.220', '[\"www.durbarit.com\"]', '2021-03-02', NULL),
(533, '54.36.149.1', '[\"www.durbarit.com\"]', '2021-03-02', NULL),
(534, '54.36.149.52', '[\"www.durbarit.com\"]', '2021-03-02', NULL),
(535, '77.75.76.161', '[\"331\"]', '2021-03-03', NULL),
(536, '77.75.77.32', '[\"329\"]', '2021-03-03', NULL),
(537, '54.36.148.211', '[\"397\"]', '2021-03-03', NULL),
(538, '54.36.148.174', '[\"388\"]', '2021-03-03', NULL),
(539, '54.36.149.47', '[\"index.html\"]', '2021-03-03', NULL),
(540, '66.249.73.82', '[\"299\"]', '2021-03-03', NULL),
(541, '40.77.167.49', '[\"286\",\"306\"]', '2021-03-03', '2021-03-04'),
(542, '54.36.149.74', '[\"shop.html\"]', '2021-03-03', NULL),
(543, '54.36.149.60', '[\"369\"]', '2021-03-03', NULL),
(544, '77.75.79.95', '[\"389\",\"330\"]', '2021-03-03', '2021-03-05'),
(545, '77.75.78.172', '[\"324\",\"326\"]', '2021-03-03', '2021-03-06'),
(546, '40.77.167.6', '[\"391\",\"331\"]', '2021-03-04', '2021-03-04'),
(547, '157.55.39.184', '[\"395\"]', '2021-03-04', NULL),
(548, '62.210.188.240', '{\"0\":\"372\",\"1\":\"356\",\"3\":\"397\",\"5\":\"358\"}', '2021-03-04', '2021-03-04'),
(549, '157.55.39.232', '[\"338\",\"329\"]', '2021-03-04', '2021-03-08'),
(550, '77.75.76.172', '[\"358\"]', '2021-03-05', NULL),
(551, '77.75.79.17', '[\"328\"]', '2021-03-05', NULL),
(552, '77.75.78.165', '[\"361\",\"390\"]', '2021-03-05', '2021-03-06'),
(553, '93.158.161.55', '{\"0\":\"328\",\"1\":\"330\",\"5\":\"335\",\"7\":\"372\",\"9\":\"326\"}', '2021-03-05', '2021-03-08'),
(554, '77.88.5.216', '{\"0\":\"www.durbarit.com\",\"3\":\"348\",\"5\":\"371\",\"7\":\"364\",\"9\":\"368\"}', '2021-03-05', '2021-03-06'),
(555, '93.158.161.21', '{\"0\":\"352\",\"1\":\"354\",\"3\":\"www.durbarit.com\",\"5\":\"391\",\"7\":\"327\"}', '2021-03-05', '2021-03-05'),
(556, '77.88.5.38', '[\"355\",\"www.durbarit.com\"]', '2021-03-05', '2021-03-05'),
(557, '213.180.203.248', '[\"369\"]', '2021-03-05', NULL),
(558, '77.75.76.171', '[\"331\"]', '2021-03-05', NULL),
(559, '54.36.148.189', '[\"shop.html\"]', '2021-03-05', NULL),
(560, '54.36.149.56', '[\"shop.html\"]', '2021-03-05', NULL),
(561, '77.75.78.162', '[\"396\"]', '2021-03-06', NULL),
(562, '54.36.148.136', '[\"www.durbarit.com\"]', '2021-03-06', NULL),
(563, '54.36.149.67', '[\"shop.html\"]', '2021-03-06', NULL),
(564, '77.75.79.36', '[\"393\",\"333\"]', '2021-03-06', '2021-03-07'),
(565, '54.36.149.76', '[\"364\"]', '2021-03-06', NULL),
(566, '54.36.148.72', '[\"365\"]', '2021-03-06', NULL),
(567, '54.36.148.64', '[\"346\"]', '2021-03-06', NULL),
(568, '54.36.148.99', '[\"345\"]', '2021-03-06', NULL),
(569, '77.75.76.160', '[\"346\"]', '2021-03-06', NULL),
(570, '54.36.148.28', '[\"347\"]', '2021-03-06', NULL),
(571, '77.75.79.54', '[\"329\",\"397\"]', '2021-03-07', '2021-03-07'),
(572, '77.75.78.169', '[\"390\"]', '2021-03-07', NULL),
(573, '77.75.76.170', '[\"332\"]', '2021-03-07', NULL),
(574, '54.36.148.94', '[\"395\"]', '2021-03-07', NULL),
(575, '77.75.78.170', '[\"330\"]', '2021-03-07', NULL),
(576, '77.75.77.54', '[\"326\"]', '2021-03-07', NULL),
(577, '13.66.139.54', '[\"325\",\"281\"]', '2021-03-08', '2021-03-08'),
(578, '54.36.148.157', '[\"329\"]', '2021-03-08', NULL),
(579, '54.36.149.106', '[\"344\"]', '2021-03-08', NULL),
(580, '54.36.149.2', '[\"331\"]', '2021-03-08', NULL),
(581, '54.36.148.168', '[\"324\"]', '2021-03-08', NULL),
(582, '54.36.149.24', '[\"397\"]', '2021-03-08', NULL),
(583, '54.36.148.56', '[\"392\"]', '2021-03-08', NULL),
(584, '13.66.139.4', '[\"326\"]', '2021-03-08', NULL),
(585, '77.75.79.72', '[\"397\",\"325\"]', '2021-03-09', '2021-03-09'),
(586, '77.75.77.62', '[\"395\"]', '2021-03-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_paid` int(11) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_style` int(11) DEFAULT NULL,
  `transection_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `payment_type`, `amount`, `invoice_id`, `is_paid`, `payment_status`, `date`, `payment_style`, `transection_id`, `image`, `created_at`, `updated_at`) VALUES
(23, 128, NULL, '1000', '1542334006', NULL, 0, '2020-10-13 06:40:14', 1, '', NULL, NULL, NULL),
(24, 128, NULL, '1000', '31848401', NULL, 0, '2020-10-13 06:42:26', 1, '', NULL, NULL, NULL),
(25, 128, NULL, '1000', '1410588522', NULL, 0, '2020-10-13 06:43:34', 1, '', NULL, NULL, NULL),
(26, 128, 4, '1000', '960867056', 1, 1, '2020-10-13 06:46:17', 0, '', NULL, NULL, NULL),
(27, 128, 5, '1000', '143283157', 1, 1, '2020-10-13 06:47:17', 1, NULL, NULL, NULL, NULL),
(28, 128, 2, '1000', '516868000', 1, 1, '2020-10-13 06:47:31', 1, NULL, NULL, NULL, NULL),
(29, 128, 2, '1000', '515728180', 1, 1, '2020-10-13 06:48:26', 1, NULL, NULL, NULL, NULL),
(30, 128, 4, '100', '1286380131', 1, 1, '2020-10-26 10:43:03', 0, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warranties`
--

CREATE TABLE `warranties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `w_ques` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `w_ans` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warranties`
--

INSERT INTO `warranties` (`id`, `w_ques`, `w_ans`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(5, 'What products are warranted?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laboru', 0, 1, '2020-02-11 02:10:34', '2020-02-18 04:03:23'),
(6, 'Where to go for', 'Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, '2020-02-11 02:10:47', '2020-02-18 04:03:23'),
(7, 'I can exchange or return an item?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1, 1, '2020-02-11 02:11:02', '2020-02-18 04:03:23'),
(8, 'In some cases, the warranty is not provided?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, '2020-02-11 02:11:15', '2020-02-18 04:03:23'),
(9, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit', 'Fusce eu dui. Integer vel nibh sit amet turpis vulputate aliquet. Phasellus id nisi vitae odio pretium aliquam. Pellentesque a leo. Donec consequat lectus sed felis. Quisque vestibulum massa. Nulla ornare. Nulla libero. Donec et mi eu massa ultrices scelerisque.\r\n\r\nNullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu dictum justo urna et mi. Integer dictum est vitae sem. Vestibulum justo. Nulla mauris ipsum, convallis ut, vestibulum eu, tincidunt vel, nisi.', 1, 1, '2020-03-03 22:12:34', '2020-10-09 01:04:31'),
(10, 'Donec eros tellus scelerisque nec rhoncus eget laoreet sit amet', 'Fusce eu dui. Integer vel nibh sit amet turpis vulputate aliquet. Phasellus id nisi vitae odio pretium aliquam. Pellentesque a leo. Donec consequat lectus sed felis. Quisque vestibulum massa. Nulla ornare. Nulla libero. Donec et mi eu massa ultrices scelerisque.\r\n\r\nNullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu dictum justo urna et mi. Integer dictum est vitae sem. Vestibulum justo. Nulla mauris ipsum, convallis ut, vestibulum eu, tincidunt vel, nisi.', 1, 0, '2020-03-03 22:16:04', '2020-06-08 12:20:16'),
(11, 'Curabitur molestie euismod erat. Proin eros odio?', 'Fusce eu dui. Integer vel nibh sit amet turpis vulputate aliquet. Phasellus id nisi vitae odio pretium aliquam. Pellentesque a leo. Donec consequat lectus sed felis. Quisque vestibulum massa. Nulla ornare. Nulla libero. Donec et mi eu massa ultrices scelerisque.\r\n\r\nNullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu dictum justo urna et mi. Integer dictum est vitae sem. Vestibulum justo. Nulla mauris ipsum, convallis ut, vestibulum eu, tincidunt vel, nisi.', 1, 0, '2020-03-03 22:16:14', '2020-06-08 12:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_storage`
--
ALTER TABLE `cart_storage`
  ADD PRIMARY KEY (`purchase_key`),
  ADD KEY `cart_storage_id_index` (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_banners`
--
ALTER TABLE `category_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compare_products`
--
ALTER TABLE `compare_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_images`
--
ALTER TABLE `contract_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_images_contract_id_foreign` (`contract_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupons`
--
ALTER TABLE `cupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customar_accounts`
--
ALTER TABLE `customar_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delevery_amounts`
--
ALTER TABLE `delevery_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delevery_charges`
--
ALTER TABLE `delevery_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `different_address`
--
ALTER TABLE `different_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_deals`
--
ALTER TABLE `flash_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_deal_details`
--
ALTER TABLE `flash_deal_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flash_deal_details_flash_deal_id_foreign` (`flash_deal_id`),
  ADD KEY `flash_deal_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `footer_options`
--
ALTER TABLE `footer_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway`
--
ALTER TABLE `gateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_drafts`
--
ALTER TABLE `mail_drafts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mail_drafts_contract_id_foreign` (`contract_id`);

--
-- Indexes for table `mesurements`
--
ALTER TABLE `mesurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_banners`
--
ALTER TABLE `mobile_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_sliders`
--
ALTER TABLE `mobile_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_finals`
--
ALTER TABLE `order_finals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_places`
--
ALTER TABLE `order_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_storages`
--
ALTER TABLE `order_storages`
  ADD PRIMARY KEY (`purchase_key`),
  ADD KEY `order_storages_id_index` (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_categoris`
--
ALTER TABLE `post_categoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_licenses`
--
ALTER TABLE `product_licenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_storages`
--
ALTER TABLE `product_storages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refund_reasons`
--
ALTER TABLE `refund_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_all_products`
--
ALTER TABLE `return_all_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_products`
--
ALTER TABLE `return_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `re_sub_categories`
--
ALTER TABLE `re_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_times`
--
ALTER TABLE `shipping_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitesetting`
--
ALTER TABLE `sitesetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_banners`
--
ALTER TABLE `site_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_models`
--
ALTER TABLE `sms_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp`
--
ALTER TABLE `smtp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media_logins`
--
ALTER TABLE `social_media_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme_colors`
--
ALTER TABLE `theme_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme_selectors`
--
ALTER TABLE `theme_selectors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `theme_selectors_theme_name_unique` (`theme_name`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `upazila_couriers`
--
ALTER TABLE `upazila_couriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_used_cupons`
--
ALTER TABLE `user_used_cupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `verification_options`
--
ALTER TABLE `verification_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewedproducts`
--
ALTER TABLE `viewedproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warranties`
--
ALTER TABLE `warranties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=946;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

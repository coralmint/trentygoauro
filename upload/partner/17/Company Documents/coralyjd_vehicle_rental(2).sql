-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 10, 2020 at 10:02 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coralyjd_vehicle_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_partner_messages`
--

CREATE TABLE `admin_partner_messages` (
  `comment_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `partner_id` int(11) DEFAULT NULL,
  `comment` text,
  `comment_for` varchar(255) DEFAULT NULL,
  `comment_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_partner_messages`
--

INSERT INTO `admin_partner_messages` (`comment_id`, `admin_id`, `partner_id`, `comment`, `comment_for`, `comment_date`, `status`, `created_at`, `modified_at`) VALUES
(17, NULL, 17, 'hi am user', NULL, '2020-06-05 06:43:59', 2, '2020-06-05 06:43:59', '2020-08-10 09:14:44'),
(18, 0, 17, 'hi am admin', NULL, '2020-06-05 06:44:14', 2, '2020-06-05 06:44:14', '2020-08-10 09:14:44'),
(21, 0, 17, 'admin hiii', NULL, '2020-06-05 09:36:09', 2, '2020-06-05 09:36:09', '2020-08-10 09:14:44'),
(22, NULL, 17, 'partner hii', NULL, '2020-06-05 09:44:58', 2, '2020-06-05 09:44:58', '2020-08-10 09:14:44'),
(23, NULL, 17, 'hi', NULL, '2020-06-11 06:19:08', 2, '2020-06-11 06:19:08', '2020-08-10 09:14:44'),
(24, NULL, 17, 'hi', NULL, '2020-06-11 06:19:08', 2, '2020-06-11 06:19:08', '2020-08-10 09:14:44'),
(25, NULL, 35, 'hi i am', NULL, '2020-06-11 06:46:35', 1, '2020-06-11 06:46:35', '2020-06-11 06:50:40'),
(26, 0, 35, 'hi', NULL, '2020-06-11 06:50:18', 1, '2020-06-11 06:50:18', '2020-06-11 06:50:55'),
(27, 0, 36, 'hello check it', NULL, '2020-06-11 07:03:50', 1, '2020-06-11 07:03:50', '2020-06-11 07:06:51'),
(28, NULL, 40, 'XDVBSDGHSRH', NULL, '2020-06-17 11:35:49', 1, '2020-06-17 11:35:49', '2020-06-18 02:31:54'),
(29, NULL, 40, 'We use our own and third-party cookies to provide you with a great online experience. We also use these cookies to improve our products and services, support our marketing campaigns, and advertise to you on our website and other websites. Some cookies may continue', NULL, '2020-06-17 11:35:51', 1, '2020-06-17 11:35:51', '2020-06-18 02:31:54'),
(30, 0, 17, 'hi test', NULL, '2020-07-07 10:23:46', 2, '2020-07-07 10:23:46', '2020-08-10 09:14:44'),
(31, NULL, 17, 'hi vicky testing', NULL, '2020-07-13 08:14:52', 2, '2020-07-13 08:14:52', '2020-08-10 09:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `bank_detail_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `partner_id` int(11) DEFAULT NULL,
  `name_on_card` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `cvc` varchar(255) DEFAULT NULL,
  `expiry_month` varchar(255) DEFAULT NULL,
  `expiry_year` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`bank_detail_id`, `customer_id`, `partner_id`, `name_on_card`, `account_number`, `bank_name`, `card_number`, `cvc`, `expiry_month`, `expiry_year`, `ifsc_code`, `created_at`, `modified_at`) VALUES
(2, 17, NULL, 'makerer', NULL, NULL, '4242424242424242', '424', '02', '2354', NULL, '2020-07-17 10:32:43', '2020-07-17 10:32:43'),
(3, NULL, 17, 'kgf12', 'kgf004505', 'kgfroye2', NULL, NULL, NULL, NULL, 'kgf00112', '2020-07-17 10:42:08', '2020-07-17 10:42:08'),
(4, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-17 13:19:48', '2020-07-17 13:19:48'),
(5, 16, NULL, 'uv', NULL, NULL, '4242424242424242', '150', '6', '2025', NULL, '2020-07-31 08:59:24', '2020-07-31 08:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `sent_from` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `partner_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `comment_date` datetime DEFAULT NULL,
  `comment_from` int(11) DEFAULT NULL COMMENT '1=custromer and admin,2=partner and admin',
  `status` int(11) DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `sent_from`, `admin_id`, `partner_id`, `customer_id`, `reservation_id`, `comment`, `comment_date`, `comment_from`, `status`, `created_at`, `modified_at`) VALUES
(1, 4, NULL, NULL, 4, 1, 'hiii', '2020-07-08 02:17:56', 1, 1, '2020-07-08 02:17:56', '2020-07-08 02:17:56'),
(4, 4, NULL, NULL, 4, 1, 'thankyou', '2020-07-08 02:32:00', 1, 1, '2020-07-08 02:32:00', '2020-07-08 02:32:00'),
(9, 0, NULL, NULL, NULL, NULL, 'testing', '2020-07-08 02:41:04', 1, 1, '2020-07-08 02:41:04', '2020-07-08 02:41:04'),
(10, 0, NULL, NULL, NULL, 1, 'thanks', '2020-07-08 02:44:46', 1, 1, '2020-07-08 02:44:46', '2020-07-08 02:44:46'),
(11, 0, NULL, NULL, NULL, 1, 'welcome', '2020-07-08 03:25:13', 1, 1, '2020-07-08 03:25:13', '2020-07-08 03:25:13'),
(12, 4, NULL, NULL, 4, 1, 'thankyou', '2020-07-08 03:28:26', 1, 1, '2020-07-08 03:28:26', '2020-07-08 03:28:26'),
(13, 0, 0, NULL, NULL, 1, 'welcome', '2020-07-08 05:32:14', 1, 1, '2020-07-08 05:32:14', '2020-07-08 05:32:14'),
(14, 0, 0, NULL, NULL, 1, 'finial', '2020-07-08 05:44:14', 1, 1, '2020-07-08 05:44:14', '2020-07-08 05:44:14'),
(15, 4, 0, NULL, 4, 1, 'that cool', '2020-07-08 06:28:27', 1, 1, '2020-07-08 06:28:27', '2020-07-08 06:28:27'),
(16, 0, 0, NULL, NULL, 1, 'make it simple', '2020-07-08 06:28:48', 1, 1, '2020-07-08 06:28:48', '2020-07-08 06:28:48'),
(17, 17, 0, 17, NULL, 1, 'hi', '2020-07-08 07:02:28', 2, 1, '2020-07-08 07:02:28', '2020-07-08 07:02:28'),
(18, 0, 0, NULL, NULL, 1, 'welcome to task', '2020-07-08 07:03:07', 2, 1, '2020-07-08 07:03:07', '2020-07-08 07:03:07'),
(19, 17, 0, 17, NULL, 1, 'tested', '2020-07-08 07:03:23', 2, 1, '2020-07-08 07:03:23', '2020-07-08 07:03:23'),
(20, 0, 0, 0, NULL, 1, 'hello', '2020-07-08 07:24:13', 2, 1, '2020-07-08 07:24:13', '2020-07-08 07:24:13'),
(21, 17, 0, 17, NULL, 1, 'hello too', '2020-07-08 07:24:33', 2, 1, '2020-07-08 07:24:33', '2020-07-08 07:24:33'),
(22, 0, 0, NULL, NULL, 14, 'yes man', '2020-07-09 04:02:20', 1, 1, '2020-07-09 04:02:20', '2020-07-09 04:02:20'),
(23, 0, 0, NULL, NULL, 14, 'hi5698', '2020-07-09 04:07:33', 1, 1, '2020-07-09 04:07:33', '2020-07-09 04:07:33'),
(24, 0, 0, NULL, NULL, 14, 'testok', '2020-07-09 04:09:16', 1, 1, '2020-07-09 04:09:16', '2020-07-09 04:09:16'),
(25, 0, 0, NULL, NULL, 14, 'testok12', '2020-07-09 04:14:45', 1, 1, '2020-07-09 04:14:45', '2020-07-09 04:14:45'),
(26, 0, 0, NULL, NULL, 14, 'make it finee', '2020-07-09 04:18:31', 1, 1, '2020-07-09 04:18:31', '2020-07-09 04:18:31'),
(27, 17, 0, 17, NULL, 14, 'trentygo', '2020-07-09 04:27:07', 2, 1, '2020-07-09 04:27:07', '2020-07-09 04:27:07'),
(28, 0, 0, 17, NULL, 14, 'make it ', '2020-07-09 04:30:49', 2, 1, '2020-07-09 04:30:49', '2020-07-09 04:30:49'),
(29, 17, 0, 17, NULL, 14, 'love it', '2020-07-09 04:32:43', 2, 1, '2020-07-09 04:32:43', '2020-07-09 04:32:43'),
(30, 0, 0, 17, NULL, 14, 'hi this admin', '2020-07-09 04:34:54', 2, 1, '2020-07-09 04:34:54', '2020-07-09 04:34:54'),
(31, 17, 0, 17, NULL, 14, 'hi admin i need help', '2020-07-09 04:43:52', 2, 1, '2020-07-09 04:43:52', '2020-07-09 04:43:52'),
(32, 17, 0, 17, NULL, 1, 'hi vicky admin', '2020-07-09 08:36:45', 2, 1, '2020-07-09 08:36:45', '2020-07-09 08:36:45'),
(33, 17, 0, 17, NULL, 4, 'hi i am priya', '2020-07-09 08:38:20', 2, 1, '2020-07-09 08:38:20', '2020-07-09 08:38:20'),
(34, 17, 0, 17, NULL, 1, 'yes do it', '2020-07-09 11:26:11', 2, 1, '2020-07-09 11:26:11', '2020-07-09 11:26:11'),
(35, NULL, 0, NULL, NULL, 1, 'yes', '2020-07-09 12:30:49', 2, 1, '2020-07-09 12:30:49', '2020-07-09 12:30:49'),
(36, 17, 0, 17, NULL, 15, 'hi this me', '2020-07-10 07:23:16', 2, 1, '2020-07-10 07:23:16', '2020-07-10 07:23:16'),
(37, NULL, 0, NULL, NULL, 14, 'hi dude make it', '2020-07-13 08:28:46', 2, 1, '2020-07-13 08:28:46', '2020-07-13 08:28:46'),
(38, 0, 0, NULL, NULL, 14, 'make some noice', '2020-07-13 10:42:13', 2, 1, '2020-07-13 10:42:13', '2020-07-13 10:42:13'),
(39, NULL, 0, NULL, NULL, NULL, NULL, '2020-07-13 10:46:31', 2, 1, '2020-07-13 10:46:31', '2020-07-13 10:46:31'),
(40, 0, 0, NULL, NULL, 30, 'hi', '2020-07-15 07:39:34', 1, 1, '2020-07-15 07:39:34', '2020-07-15 07:39:34'),
(41, 0, 0, NULL, NULL, 30, 'hi', '2020-07-15 07:39:44', 2, 1, '2020-07-15 07:39:44', '2020-07-15 07:39:44'),
(42, 17, 0, 17, NULL, 30, 'hi admin', '2020-07-20 06:45:05', 2, 1, '2020-07-20 06:45:05', '2020-07-20 06:45:05'),
(43, 17, 0, 17, NULL, 30, 'hi admin this vicky', '2020-07-20 06:48:58', 2, 1, '2020-07-20 06:48:58', '2020-07-20 06:48:58'),
(44, 16, 0, NULL, 16, 29, '2mins', '2020-07-24 07:31:16', 1, 1, '2020-07-24 07:31:16', '2020-07-24 07:31:16'),
(45, 16, 0, NULL, 16, 29, 'hi ragu', '2020-07-24 07:32:22', 1, 1, '2020-07-24 07:32:22', '2020-07-24 07:32:22'),
(46, 0, 0, NULL, NULL, 29, 'hi ragu', '2020-07-24 07:34:47', 1, 1, '2020-07-24 07:34:47', '2020-07-24 07:34:47'),
(47, 0, 0, NULL, NULL, 29, 'hi dude ragu', '2020-07-24 07:35:47', 1, 1, '2020-07-24 07:35:47', '2020-07-24 07:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `com_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `massage` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `name`, `com_name`, `email`, `phone_no`, `massage`, `created_at`) VALUES
(1, 'tetst', 'kjhsfkjsg', 'tested@gmail.com', '654645645', 'jhghvfvb cf', '2020-05-20 14:41:56'),
(2, 'Rozi', 'Enter', 'asd@we.com', '9888121312', 'gdfgsdfgf', '2020-05-20 14:45:41'),
(3, 'trenty', 'trenty', 'trenty@gmail.com', '0918239098', 'we are going', '2020-05-20 14:49:53'),
(4, 'vinoth', 'hi hello', 'vinoth@gmail.com', '987654321312', 'hi desc', '2020-05-20 14:54:05'),
(5, NULL, NULL, NULL, NULL, NULL, '2020-05-20 14:56:12'),
(6, 'vinoth', 'hi hello', 'vinoth@gmail.com', '987654321312', 'hi desc', '2020-05-20 14:58:27'),
(7, 'vinoth', 'vinoth travels', 'vinoth@coralmint.in', '9876543210', 'description', '2020-05-20 15:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_details`
--

CREATE TABLE `coupon_details` (
  `coupon_details _id` int(11) NOT NULL,
  `coupon_amount` varchar(255) DEFAULT NULL,
  `coupon_desc` varchar(255) DEFAULT NULL,
  `coupon_from` varchar(255) DEFAULT NULL,
  `coupon_to` varchar(255) DEFAULT NULL,
  `coupon_status` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `logged_status` int(11) NOT NULL DEFAULT '1' COMMENT '1 = Inactive , 2 = active',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `vehicle_id`, `logged_status`, `status`, `created_at`, `modified_at`) VALUES
(2, 'ram', NULL, 'ram@gmail.com', 2, 1, 1, '2020-07-06 11:10:46', NULL),
(3, 'raj', NULL, 'raj@gmail.com', 2, 1, 1, '2020-07-06 16:24:45', NULL),
(4, 'priya', '+919597006865', 'dharshusmart308@gmail.com', 2, 1, 1, '2020-07-07 05:46:04', NULL),
(5, 'asin', '98765432100', 'asin@gmail.com', 2, 1, 1, '2020-07-07 08:20:47', NULL),
(6, 'dgdfgdf', '98794654231', 'rrr@rr.com', 2, 1, 1, '2020-07-07 09:23:57', NULL),
(7, 'fazil', '9866543212', 'fazil@gmail.com', 2, 1, 1, '2020-07-08 00:44:47', NULL),
(8, 'raj', '987654', 'rr@rr.com', 2, 1, 1, '2020-07-08 02:51:54', NULL),
(9, 'rrarra', '98765431', 'rr2@gg.com', 2, 1, 1, '2020-07-08 12:24:49', NULL),
(10, 'Ravi', '987654321', 'rav@gmail.com', 2, 1, 1, '2020-07-09 00:24:59', NULL),
(11, 'Ram', '987654321', 'ram@ram.com', 2, 1, 1, '2020-07-09 05:05:39', NULL),
(12, 'rajraj', '98797', 'eee@ee.com', 2, 1, 1, '2020-07-09 07:21:16', NULL),
(13, 'jeeva', '9898989898', 'jeevan@gmail.com', 2, 1, 1, '2020-07-13 12:21:54', NULL),
(14, 'Shakthi', '9797979797', 'sakthikumar@gmail.com', 2, 1, 1, '2020-07-13 12:57:18', NULL),
(15, 'bhavithra', '98842268844', 'bhavithra.t@gmail.com', 2, 1, 1, '2020-07-13 13:43:20', NULL),
(16, 'Bhavithra', '+919884226884', 'vinothan1@coralmint.in', 2, 1, 1, '2020-07-14 01:50:15', NULL),
(17, 'makeit', '8220696863', 'makeit@gmail.com', 13, 1, 1, '2020-07-14 05:00:17', NULL),
(18, 'veera', '9500400260', 'veera@gmail.com', 2, 1, 1, '2020-07-14 10:07:43', NULL),
(19, 'Kamatchi', '9488567762', 'kamatchi@gmail.com', 2, 1, 1, '2020-07-15 06:41:49', NULL),
(20, 'Bhavithra', '9884226884', 'bhavithra.t1@gmail.com', 2, 1, 1, '2020-07-16 02:33:52', NULL),
(21, 'max', '9500285364', 'max@gmail.com', 2, 1, 1, '2020-07-16 08:00:20', NULL),
(22, 'Maxtest', '2665895422', 'maxtest@gmail.com', 2, 1, 1, '2020-07-17 06:20:35', NULL),
(23, 'exam', '9586756955', 'exam@gmail.com', 2, 1, 1, '2020-07-20 07:48:21', NULL),
(24, 'tour', '6953846256', 'tour@gmail.com', 2, 1, 1, '2020-07-20 09:36:08', NULL),
(25, 'sujee', '9894652127', 'yuvismart.ya@gmail.com', 2, 1, 1, '2020-08-04 03:37:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_details`
--

CREATE TABLE `document_details` (
  `document_details_id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `partner_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `file_for` varchar(255) DEFAULT NULL,
  `file_detail` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_desc` varchar(255) DEFAULT NULL,
  `file_ext` varchar(255) DEFAULT NULL,
  `file_tag` varchar(255) DEFAULT NULL,
  `file_orginal_name` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_details`
--

INSERT INTO `document_details` (`document_details_id`, `reservation_id`, `partner_id`, `vehicle_id`, `file_for`, `file_detail`, `file_type`, `file_name`, `file_desc`, `file_ext`, `file_tag`, `file_orginal_name`, `file_url`, `file_path`, `status`, `created_at`, `modified_at`) VALUES
(24, NULL, 17, 0, 'fc_document', 'Vehicle FC document', NULL, '17vehicle_image', NULL, 'pdf', NULL, 'Artishow.pdf', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/Artishow.pdf', 'upload/partner/17/vehicle_images/', 1, '2020-05-26 01:09:38', '2020-05-26 01:09:38'),
(30, NULL, 1, NULL, NULL, 'partner profile image', NULL, '1profile_img', NULL, 'jpeg', NULL, 'default3.jpeg', 'https://trentygo.coralmint.in/upload/partner/1/profile_images/default3.jpeg', 'upload/partner/1/profile_images/', 1, '2020-05-26 06:01:00', '2020-05-26 06:01:00'),
(32, NULL, 2, NULL, NULL, 'partner profile image', NULL, '2profile_img', NULL, 'JPG', NULL, 'DSC_6749.JPG', 'https://trentygo.coralmint.in/upload/partner/2/profile_images/DSC_6749.JPG', 'upload/partner/2/profile_images/', 1, '2020-05-28 08:11:22', '2020-05-28 08:11:22'),
(39, NULL, 31, NULL, NULL, 'partner profile image', NULL, '31profile_img', NULL, 'jpg', NULL, 'ratan_tata-570x570.jpg', 'https://trentygo.coralmint.in/upload/partner/31/profile_images/ratan_tata-570x570.jpg', 'upload/partner/31/profile_images/', 1, '2020-05-30 03:17:10', '2020-05-30 03:17:10'),
(40, NULL, 31, NULL, 'general_document', 'Vehicle general document', NULL, '31vehicle_image', NULL, ' register', NULL, '1. register.jpg', 'https://trentygo.coralmint.in/upload/partner/31/vehicle_images/1. register.jpg', 'upload/partner/31/vehicle_images/', 1, '2020-06-01 12:23:50', '2020-06-01 12:23:50'),
(64, NULL, 17, 2, 'inc_document', 'Vehicle RC document', NULL, '17vehicle_image', NULL, 'png', NULL, 'whitethe.png', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/whitethe.png', 'upload/partner/17/vehicle_images/', 1, '2020-06-05 14:28:46', '2020-06-05 14:28:46'),
(76, NULL, 17, 1, 'fc_document', 'Vehicle FC document', NULL, '17vehicle_image', NULL, 'jpg', NULL, '8e8bdd73-bc18-4863-a63b-4cb4621c8599_full.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/8e8bdd73-bc18-4863-a63b-4cb4621c8599_full.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-06 06:33:47', '2020-06-06 06:33:47'),
(77, NULL, 17, 1, 'ins_document', 'Vehicle Insurance document', NULL, '17vehicle_image', NULL, 'jpg', NULL, '9de17944-d38f-4a60-88f5-ef3bf39607ab_full.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/9de17944-d38f-4a60-88f5-ef3bf39607ab_full.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-06 06:37:17', '2020-06-06 06:37:17'),
(79, NULL, 17, 1, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, '921d1c89-c72f-4f99-9c67-3a49f9d85136_full.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/921d1c89-c72f-4f99-9c67-3a49f9d85136_full.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-06 06:43:33', '2020-06-06 06:43:33'),
(80, NULL, 17, 2, 'rc_document', 'Vehicle RC document', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'vector-dental-care-icons.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/vector-dental-care-icons.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-06 07:43:54', '2020-06-06 07:43:54'),
(81, NULL, 17, 2, 'fc_document', 'Vehicle FC document', NULL, '17vehicle_image', NULL, 'pdf', NULL, 'Mariamman kovilfinalreport.pdf', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/Mariamman kovilfinalreport.pdf', 'upload/partner/17/vehicle_images/', 1, '2020-06-06 07:49:17', '2020-06-06 07:49:17'),
(82, NULL, 17, 3, 'rc_document', 'Vehicle RC document', NULL, '17vehicle_image', NULL, 'pdf', NULL, 'Ayyampettaifinalreport.pdf', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/Ayyampettaifinalreport.pdf', 'upload/partner/17/vehicle_images/', 1, '2020-06-06 07:49:53', '2020-06-06 07:49:53'),
(83, NULL, 17, 3, 'fc_document', 'Vehicle FC document', NULL, '17vehicle_image', NULL, 'docx', NULL, 'Mariamman kovilfinalreport.docx', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/Mariamman kovilfinalreport.docx', 'upload/partner/17/vehicle_images/', 1, '2020-06-06 07:50:16', '2020-06-06 07:50:16'),
(84, NULL, 17, 3, 'ins_document', 'Vehicle Insurance document', NULL, '17vehicle_image', NULL, 'pdf', NULL, 'Ayyampettaifinalreport.pdf', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/Ayyampettaifinalreport.pdf', 'upload/partner/17/vehicle_images/', 1, '2020-06-06 07:50:22', '2020-06-06 07:50:22'),
(85, NULL, 17, NULL, 'hi 2', 'Personal Document', NULL, '17personal_files', NULL, 'jpg', NULL, '8e8bdd73-bc18-4863-a63b-4cb4621c8599_full.jpg', 'https://trentygo.coralmint.in/upload/partner/17/personal_files/8e8bdd73-bc18-4863-a63b-4cb4621c8599_full.jpg', 'upload/partner/17/personal_files/', 1, '2020-06-06 11:47:06', '2020-06-06 11:47:06'),
(86, NULL, 17, NULL, 'hi 1', 'Personal Document', NULL, '17personal_files', NULL, 'jpg', NULL, '9de17944-d38f-4a60-88f5-ef3bf39607ab_full.jpg', 'https://trentygo.coralmint.in/upload/partner/17/personal_files/9de17944-d38f-4a60-88f5-ef3bf39607ab_full.jpg', 'upload/partner/17/personal_files/', 1, '2020-06-06 11:47:06', '2020-06-06 11:47:06'),
(87, NULL, 17, NULL, 'gaf', 'Personal Document', NULL, '17personal_files', NULL, 'jpg', NULL, '8e8bdd73-bc18-4863-a63b-4cb4621c8599_full.jpg', 'https://trentygo.coralmint.in/upload/partner/17/personal_files/8e8bdd73-bc18-4863-a63b-4cb4621c8599_full.jpg', 'upload/partner/17/personal_files/', 1, '2020-06-06 11:59:03', '2020-06-06 11:59:03'),
(88, NULL, 17, NULL, 'hihih', 'Personal Document', NULL, '17personal_files', NULL, 'jpg', NULL, 'b8290b3e-c695-4af4-841f-b4c55d8e214b_full.jpg', 'https://trentygo.coralmint.in/upload/partner/17/personal_files/b8290b3e-c695-4af4-841f-b4c55d8e214b_full.jpg', 'upload/partner/17/personal_files/', 1, '2020-06-06 11:59:04', '2020-06-06 11:59:04'),
(89, NULL, 17, NULL, 'agreement', 'Agreement from partner', NULL, '17Agreements', NULL, 'jpg', NULL, '9de17944-d38f-4a60-88f5-ef3bf39607ab_full.jpg', 'https://trentygo.coralmint.in/upload/partner/17/Agreements/9de17944-d38f-4a60-88f5-ef3bf39607ab_full.jpg', 'upload/partner/17/Agreements/', 1, '2020-06-06 12:23:27', '2020-06-06 12:23:27'),
(90, NULL, 17, NULL, '22', 'Personal Document', NULL, '17personal_files', NULL, 'jpg', NULL, '8e8bdd73-bc18-4863-a63b-4cb4621c8599_full.jpg', 'https://trentygo.coralmint.in/upload/partner/17/personal_files/8e8bdd73-bc18-4863-a63b-4cb4621c8599_full.jpg', 'upload/partner/17/personal_files/', 1, '2020-06-06 13:17:54', '2020-06-06 13:17:54'),
(91, NULL, 17, NULL, '11', 'Personal Document', NULL, '17personal_files', NULL, 'jpg', NULL, '235a58f7-f0b5-42eb-a33c-4270c6b156cf_full.jpg', 'https://trentygo.coralmint.in/upload/partner/17/personal_files/235a58f7-f0b5-42eb-a33c-4270c6b156cf_full.jpg', 'upload/partner/17/personal_files/', 1, '2020-06-06 13:17:54', '2020-06-06 13:17:54'),
(93, NULL, 17, NULL, 'CABIS Document', 'Partner upload CABIS document', NULL, '17Company Documents', NULL, 'jpg', NULL, '9de17944-d38f-4a60-88f5-ef3bf39607ab_full.jpg', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/9de17944-d38f-4a60-88f5-ef3bf39607ab_full.jpg', 'upload/partner/17/Company Documents/', 1, '2020-06-06 13:18:33', '2020-06-06 13:18:33'),
(94, NULL, 17, NULL, 'Tax Document', 'Partner upload Tax document', NULL, '17Company Documents', NULL, 'jpg', NULL, '921d1c89-c72f-4f99-9c67-3a49f9d85136_full.jpg', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/921d1c89-c72f-4f99-9c67-3a49f9d85136_full.jpg', 'upload/partner/17/Company Documents/', 1, '2020-06-06 13:18:41', '2020-06-06 13:18:41'),
(95, NULL, 17, NULL, 'Comapny Insurance Document', 'Vehicle Images', NULL, '17Company Documents', NULL, 'jpg', NULL, '8e8bdd73-bc18-4863-a63b-4cb4621c8599_full.jpg', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/8e8bdd73-bc18-4863-a63b-4cb4621c8599_full.jpg', 'upload/partner/17/Company Documents/', 1, '2020-06-06 13:18:51', '2020-06-06 13:18:51'),
(97, NULL, 17, NULL, 'pp1', 'Personal Document', NULL, '17personal_files', NULL, 'jpg', NULL, '64bf85ad-3d5e-4dd2-8d42-c7fa68c95ed8.jpg.oxps', 'https://trentygo.coralmint.in/upload/partner/17/personal_files/64bf85ad-3d5e-4dd2-8d42-c7fa68c95ed8.jpg.oxps', 'upload/partner/17/personal_files/', 1, '2020-06-07 13:53:19', '2020-06-07 13:53:19'),
(99, NULL, 17, NULL, 'CABIS Document', 'Partner upload CABIS document', NULL, '17Company Documents', NULL, 'docx', NULL, 'db for dress.docx', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/db for dress.docx', 'upload/partner/17/Company Documents/', 1, '2020-06-07 13:53:48', '2020-06-07 13:53:48'),
(100, NULL, 17, NULL, 'Tax Document', 'Partner upload Tax document', NULL, '17Company Documents', NULL, 'jpg', NULL, '00.jpg', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/00.jpg', 'upload/partner/17/Company Documents/', 1, '2020-06-07 13:54:03', '2020-06-07 13:54:03'),
(101, NULL, 17, NULL, 'Comapny Insurance Document', 'Vehicle Images', NULL, '17Company Documents', NULL, 'JPG', NULL, 'garmentdb.JPG', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/garmentdb.JPG', 'upload/partner/17/Company Documents/', 1, '2020-06-07 13:54:11', '2020-06-07 13:54:11'),
(102, NULL, 1, NULL, NULL, 'Personal Document', NULL, '1personal_files', NULL, 'jpg', NULL, 'do-you-own-this-special-rs-5-note-this-is-its-net-worth-now-1.jpg', 'https://trentygo.coralmint.in/upload/partner/1/personal_files/do-you-own-this-special-rs-5-note-this-is-its-net-worth-now-1.jpg', 'upload/partner/1/personal_files/', 1, '2020-06-08 04:05:08', '2020-06-08 04:05:08'),
(103, NULL, 1, 30, 'rc_document', 'Vehicle RC document', NULL, '1vehicle_image', NULL, 'jpg', NULL, '1200px-India_new_10_INR,_MG_series,_2018,_obverse.jpg', 'https://trentygo.coralmint.in/upload/partner/1/vehicle_images/1200px-India_new_10_INR,_MG_series,_2018,_obverse.jpg', 'upload/partner/1/vehicle_images/', 1, '2020-06-08 04:06:55', '2020-06-08 04:06:55'),
(104, NULL, 1, 30, 'rc_document', 'Vehicle RC document', NULL, '1vehicle_image', NULL, 'docx', NULL, 'Algebra attempt 1.docx', 'https://trentygo.coralmint.in/upload/partner/1/vehicle_images/Algebra attempt 1.docx', 'upload/partner/1/vehicle_images/', 1, '2020-06-08 04:08:03', '2020-06-08 04:08:03'),
(105, NULL, 17, 1, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'png', NULL, 'car1.png', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car1.png', 'upload/partner/17/vehicle_images/', 1, '2020-06-08 04:17:28', '2020-06-08 04:17:28'),
(106, NULL, 17, 1, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car1.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car1.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-08 04:19:39', '2020-06-08 04:19:39'),
(107, NULL, 17, 1, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car2.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car2.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-08 04:19:39', '2020-06-08 04:19:39'),
(108, NULL, 17, 2, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car3.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car3.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-08 11:54:58', '2020-06-08 11:54:58'),
(109, NULL, 17, 2, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car1.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car1.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-08 12:13:07', '2020-06-08 12:13:07'),
(110, NULL, 17, 1, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car2.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car2.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-08 12:23:47', '2020-06-08 12:23:47'),
(111, NULL, 17, 3, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car3.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car3.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-08 12:28:25', '2020-06-08 12:28:25'),
(112, NULL, 17, 13, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car3.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/13/car3.jpg', 'upload/partner/17/vehicle_images/13/', 1, '2020-06-09 05:39:41', '2020-06-09 05:39:41'),
(113, NULL, 17, 1, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car1.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/1/car1.jpg', 'upload/partner/17/vehicle_images/1/', 1, '2020-06-09 05:47:32', '2020-06-09 05:47:32'),
(114, NULL, 17, 2, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car2.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/2/car2.jpg', 'upload/partner/17/vehicle_images/2/', 1, '2020-06-09 06:03:30', '2020-06-09 06:03:30'),
(115, NULL, 17, 12, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car1.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car1.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-09 10:47:58', '2020-06-09 10:47:58'),
(116, NULL, 17, 1, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car2.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car2.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-09 11:00:17', '2020-06-09 11:00:17'),
(117, NULL, 17, 11, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car2.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car2.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-09 11:04:30', '2020-06-09 11:04:30'),
(118, NULL, 17, 11, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car2.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car2.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-09 11:06:01', '2020-06-09 11:06:01'),
(124, NULL, 17, 12, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car6.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car6.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-09 14:00:23', '2020-06-09 14:00:23'),
(125, NULL, 17, 12, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car5.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car5.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-09 14:12:49', '2020-06-09 14:12:49'),
(127, NULL, 30, NULL, NULL, 'partner profile image', NULL, '30profile_img', NULL, 'png', NULL, 'pro1.png', 'https://trentygo.coralmint.in/upload/partner/30/profile_images/pro1.png', 'upload/partner/30/profile_images/', 1, '2020-06-09 14:20:37', '2020-06-09 14:20:37'),
(128, NULL, 17, 1, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car2.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car2.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-10 06:55:29', '2020-06-10 06:55:29'),
(129, NULL, 17, 2, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car3.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car3.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-10 06:56:12', '2020-06-10 06:56:12'),
(130, NULL, 17, 14, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car3.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car3.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-10 06:58:21', '2020-06-10 06:58:21'),
(131, NULL, 17, 22, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car1.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car1.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-10 06:59:45', '2020-06-10 06:59:45'),
(132, NULL, 17, 22, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car6.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car6.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-10 07:00:36', '2020-06-10 07:00:36'),
(133, NULL, 17, 10, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car5.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car5.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-10 07:01:20', '2020-06-10 07:01:20'),
(134, NULL, 17, 10, 'rc_document', 'Vehicle RC document', NULL, '17vehicle_image', NULL, 'txt', NULL, 'dummy.txt', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/dummy.txt', 'upload/partner/17/vehicle_images/', 1, '2020-06-10 07:02:23', '2020-06-10 07:02:23'),
(146, NULL, 17, NULL, 'ss', 'Personal Document', NULL, '17personal_files', NULL, 'jpg', NULL, '9de17944-d38f-4a60-88f5-ef3bf39607ab_full.jpg', 'https://trentygo.coralmint.in/upload/partner/17/personal_files/9de17944-d38f-4a60-88f5-ef3bf39607ab_full.jpg', 'upload/partner/17/personal_files/', 1, '2020-06-10 08:11:50', '2020-06-10 08:11:50'),
(148, NULL, 17, NULL, 'hii', 'Personal Document', NULL, '17personal_files', NULL, 'jpg', NULL, '9de17944-d38f-4a60-88f5-ef3bf39607ab_full.jpg', 'https://trentygo.coralmint.in/upload/partner/17/personal_files/9de17944-d38f-4a60-88f5-ef3bf39607ab_full.jpg', 'upload/partner/17/personal_files/', 1, '2020-06-10 08:16:56', '2020-06-10 08:16:56'),
(149, NULL, 17, 1, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car5.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car5.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-10 08:32:03', '2020-06-10 08:32:03'),
(151, NULL, 17, NULL, 'Agreement Document', 'Partner upoload agreement document', NULL, '17Company Documents', NULL, 'jpg', NULL, 'OIPZU7HB6AY.jpg', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/OIPZU7HB6AY.jpg', 'upload/partner/17/Company Documents/', 1, '2020-06-10 10:39:36', '2020-06-10 10:39:36'),
(152, NULL, 17, NULL, 'Comapny Insurance Document', 'Vehicle Images', NULL, '17Company Documents', NULL, 'png', NULL, 'untitled.png', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/untitled.png', 'upload/partner/17/Company Documents/', 1, '2020-06-10 10:39:54', '2020-06-10 10:39:54'),
(154, NULL, 17, 1, 'rc_document', 'Vehicle RC document', NULL, '17vehicle_image', NULL, 'png', NULL, 'untitled.png', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/untitled.png', 'upload/partner/17/vehicle_images/', 1, '2020-06-10 10:43:21', '2020-06-10 10:43:21'),
(155, NULL, 17, 1, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'OIPJEI7CTBA.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/OIPJEI7CTBA.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-10 10:43:46', '2020-06-10 10:43:46'),
(156, NULL, 30, 34, 'rc_document', 'Vehicle RC document', NULL, '30vehicle_image', NULL, 'png', NULL, 'negative-space-classic-black-mg-convertible-car-robin-vet.png', 'https://trentygo.coralmint.in/upload/partner/30/vehicle_images/negative-space-classic-black-mg-convertible-car-robin-vet.png', 'upload/partner/30/vehicle_images/', 1, '2020-06-10 17:41:20', '2020-06-10 17:41:20'),
(157, NULL, 30, 34, 'fc_document', 'Vehicle FC document', NULL, '30vehicle_image', NULL, 'png', NULL, 'picography-chrome-mercedes-sm-1.png', 'https://trentygo.coralmint.in/upload/partner/30/vehicle_images/picography-chrome-mercedes-sm-1.png', 'upload/partner/30/vehicle_images/', 1, '2020-06-10 17:41:30', '2020-06-10 17:41:30'),
(158, NULL, 30, 34, 'ins_document', 'Vehicle Insurance document', NULL, '30vehicle_image', NULL, 'png', NULL, 'phone.png', 'https://trentygo.coralmint.in/upload/partner/30/vehicle_images/phone.png', 'upload/partner/30/vehicle_images/', 1, '2020-06-10 17:41:35', '2020-06-10 17:41:35'),
(161, NULL, 17, NULL, 'Agreement Document', 'Partner upoload agreement document', NULL, '17Company Documents', NULL, 'pdf', NULL, 'santhalic-2018.pdf', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/santhalic-2018.pdf', 'upload/partner/17/Company Documents/', 1, '2020-06-11 02:26:13', '2020-06-11 02:26:13'),
(163, NULL, 17, NULL, 'Tax Document', 'Partner upload Tax document', NULL, '17Company Documents', NULL, 'pdf', NULL, 'santhalic-2018.pdf', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/santhalic-2018.pdf', 'upload/partner/17/Company Documents/', 1, '2020-06-11 02:26:41', '2020-06-11 02:26:41'),
(164, NULL, 17, NULL, 'Comapny Insurance Document', 'Vehicle Images', NULL, '17Company Documents', NULL, 'pdf', NULL, 'santhalic-2018.pdf', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/santhalic-2018.pdf', 'upload/partner/17/Company Documents/', 1, '2020-06-11 02:26:50', '2020-06-11 02:26:50'),
(165, NULL, 20, NULL, 'profile_image', 'partner profile image', NULL, '20profile_img', NULL, 'PNG', NULL, 'logo1.PNG', 'https://trentygo.coralmint.in/upload/partner/20/profile_images/logo1.PNG', 'upload/partner/20/profile_images/', 1, '2020-06-11 02:47:06', '2020-06-11 02:47:06'),
(166, NULL, 20, 42, 'rc_document', 'Vehicle RC document', NULL, '20vehicle_image', NULL, 'txt', NULL, 'README.txt', 'https://trentygo.coralmint.in/upload/partner/20/vehicle_images/README.txt', 'upload/partner/20/vehicle_images/', 1, '2020-06-11 03:15:19', '2020-06-11 03:15:19'),
(167, NULL, 20, 42, 'fc_document', 'Vehicle FC document', NULL, '20vehicle_image', NULL, 'txt', NULL, 'README.txt', 'https://trentygo.coralmint.in/upload/partner/20/vehicle_images/README.txt', 'upload/partner/20/vehicle_images/', 1, '2020-06-11 03:15:36', '2020-06-11 03:15:36'),
(168, NULL, 20, 42, 'ins_document', 'Vehicle Insurance document', NULL, '20vehicle_image', NULL, 'txt', NULL, 'README.txt', 'https://trentygo.coralmint.in/upload/partner/20/vehicle_images/README.txt', 'upload/partner/20/vehicle_images/', 1, '2020-06-11 03:15:46', '2020-06-11 03:15:46'),
(169, NULL, 1, NULL, 'Agreement Document', 'Partner upoload agreement document', NULL, '1Company Documents', NULL, 'jpg', NULL, 'OIPZU7HB6AY.jpg', 'https://trentygo.coralmint.in/upload/partner/1/Company Documents/OIPZU7HB6AY.jpg', 'upload/partner/1/Company Documents/', 1, '2020-06-11 05:13:19', '2020-06-11 05:13:19'),
(171, NULL, 17, 1, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'car4.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/car4.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-06-11 05:25:22', '2020-06-11 05:25:22'),
(172, NULL, 35, NULL, 'profile_image', 'partner profile image', NULL, '35profile_img', NULL, 'jpg', NULL, '20150322_154050.jpg', 'https://trentygo.coralmint.in/upload/partner/35/profile_images/20150322_154050.jpg', 'upload/partner/35/profile_images/', 1, '2020-06-11 06:14:42', '2020-06-11 06:14:42'),
(174, NULL, 35, NULL, 'id card', 'Personal Document', NULL, '35personal_files', NULL, 'jpg', NULL, 'idproof.jpg', 'https://trentygo.coralmint.in/upload/partner/35/personal_files/idproof.jpg', 'upload/partner/35/personal_files/', 1, '2020-06-11 06:28:46', '2020-06-11 06:28:46'),
(175, NULL, 35, NULL, 'Agreement Document', 'Partner upoload agreement document', NULL, '35Company Documents', NULL, 'docx', NULL, 'Database2.docx', 'https://trentygo.coralmint.in/upload/partner/35/Company Documents/Database2.docx', 'upload/partner/35/Company Documents/', 1, '2020-06-11 06:29:03', '2020-06-11 06:29:03'),
(176, NULL, 35, NULL, 'CABIS Document', 'Partner upload CABIS document', NULL, '35Company Documents', NULL, 'docx', NULL, 'estimation time.docx', 'https://trentygo.coralmint.in/upload/partner/35/Company Documents/estimation time.docx', 'upload/partner/35/Company Documents/', 1, '2020-06-11 06:29:16', '2020-06-11 06:29:16'),
(177, NULL, 35, NULL, 'Tax Document', 'Partner upload Tax document', NULL, '35Company Documents', NULL, 'docx', NULL, 'DB_final.docx', 'https://trentygo.coralmint.in/upload/partner/35/Company Documents/DB_final.docx', 'upload/partner/35/Company Documents/', 1, '2020-06-11 06:29:22', '2020-06-11 06:29:22'),
(178, NULL, 35, NULL, 'Comapny Insurance Document', 'Vehicle Images', NULL, '35Company Documents', NULL, 'pdf', NULL, 'Movement Pass.pdf', 'https://trentygo.coralmint.in/upload/partner/35/Company Documents/Movement Pass.pdf', 'upload/partner/35/Company Documents/', 1, '2020-06-11 06:29:46', '2020-06-11 06:29:46'),
(180, NULL, 35, 44, 'fc_document', 'Vehicle FC document', NULL, '35vehicle_image', NULL, 'docx', NULL, 'needchange.docx', 'https://trentygo.coralmint.in/upload/partner/35/vehicle_images/needchange.docx', 'upload/partner/35/vehicle_images/', 1, '2020-06-11 06:34:03', '2020-06-11 06:34:03'),
(181, NULL, 35, 44, 'ins_document', 'Vehicle Insurance document', NULL, '35vehicle_image', NULL, 'docx', NULL, 'needchange.docx', 'https://trentygo.coralmint.in/upload/partner/35/vehicle_images/needchange.docx', 'upload/partner/35/vehicle_images/', 1, '2020-06-11 06:34:12', '2020-06-11 06:34:12'),
(182, NULL, 35, 44, 'image_document', 'Vehicle Images', NULL, '35vehicle_image', NULL, 'jpg', NULL, 'carf2.jpg', 'https://trentygo.coralmint.in/upload/partner/35/vehicle_images/carf2.jpg', 'upload/partner/35/vehicle_images/', 1, '2020-06-11 06:34:45', '2020-06-11 06:34:45'),
(183, NULL, 35, 44, 'image_document', 'Vehicle Images', NULL, '35vehicle_image', NULL, 'jpg', NULL, 'carf4.jpg', 'https://trentygo.coralmint.in/upload/partner/35/vehicle_images/carf4.jpg', 'upload/partner/35/vehicle_images/', 1, '2020-06-11 06:34:46', '2020-06-11 06:34:46'),
(184, NULL, 35, 44, 'image_document', 'Vehicle Images', NULL, '35vehicle_image', NULL, 'jpg', NULL, 'carf5.jpg', 'https://trentygo.coralmint.in/upload/partner/35/vehicle_images/carf5.jpg', 'upload/partner/35/vehicle_images/', 1, '2020-06-11 06:34:46', '2020-06-11 06:34:46'),
(185, NULL, 35, 44, 'rc_document', 'Vehicle RC document', NULL, '35vehicle_image', NULL, 'docx', NULL, 'Database2.docx', 'https://trentygo.coralmint.in/upload/partner/35/vehicle_images/Database2.docx', 'upload/partner/35/vehicle_images/', 1, '2020-06-11 06:45:09', '2020-06-11 06:45:09'),
(186, NULL, 36, NULL, 'profile_image', 'partner profile image', NULL, '36profile_img', NULL, 'jpg', NULL, '20150501_212031.jpg', 'https://trentygo.coralmint.in/upload/partner/36/profile_images/20150501_212031.jpg', 'upload/partner/36/profile_images/', 1, '2020-06-11 06:57:27', '2020-06-11 06:57:27'),
(187, NULL, 36, NULL, 'add', 'Personal Document', NULL, '36personal_files', NULL, 'docx', NULL, 'ADDRESS.docx', 'https://trentygo.coralmint.in/upload/partner/36/personal_files/ADDRESS.docx', 'upload/partner/36/personal_files/', 1, '2020-06-11 06:58:04', '2020-06-11 06:58:04'),
(188, NULL, 36, NULL, 'Tax Document', 'Partner upload Tax document', NULL, '36Company Documents', NULL, 'docx', NULL, 'resume with exp.docx', 'https://trentygo.coralmint.in/upload/partner/36/Company Documents/resume with exp.docx', 'upload/partner/36/Company Documents/', 1, '2020-06-11 06:58:24', '2020-06-11 06:58:24'),
(189, NULL, 36, NULL, 'CABIS Document', 'Partner upload CABIS document', NULL, '36Company Documents', NULL, 'docx', NULL, 'resume copy.docx', 'https://trentygo.coralmint.in/upload/partner/36/Company Documents/resume copy.docx', 'upload/partner/36/Company Documents/', 1, '2020-06-11 06:58:25', '2020-06-11 06:58:25'),
(190, NULL, 36, NULL, 'Agreement Document', 'Partner upoload agreement document', NULL, '36Company Documents', NULL, 'pdf', NULL, 'resume.pdf', 'https://trentygo.coralmint.in/upload/partner/36/Company Documents/resume.pdf', 'upload/partner/36/Company Documents/', 1, '2020-06-11 06:58:28', '2020-06-11 06:58:28'),
(191, NULL, 36, NULL, 'Comapny Insurance Document', 'Vehicle Images', NULL, '36Company Documents', NULL, 'docx', NULL, 'Resume.docx', 'https://trentygo.coralmint.in/upload/partner/36/Company Documents/Resume.docx', 'upload/partner/36/Company Documents/', 1, '2020-06-11 06:58:32', '2020-06-11 06:58:32'),
(192, NULL, 36, 45, 'rc_document', 'Vehicle RC document', NULL, '36vehicle_image', NULL, 'docx', NULL, 'Resume.docx', 'https://trentygo.coralmint.in/upload/partner/36/vehicle_images/Resume.docx', 'upload/partner/36/vehicle_images/', 1, '2020-06-11 07:01:00', '2020-06-11 07:01:00'),
(193, NULL, 36, 45, 'fc_document', 'Vehicle FC document', NULL, '36vehicle_image', NULL, 'docx', NULL, 'ADDRESS.docx', 'https://trentygo.coralmint.in/upload/partner/36/vehicle_images/ADDRESS.docx', 'upload/partner/36/vehicle_images/', 1, '2020-06-11 07:01:14', '2020-06-11 07:01:14'),
(194, NULL, 36, 45, 'ins_document', 'Vehicle Insurance document', NULL, '36vehicle_image', NULL, 'docx', NULL, 'resume with exp.docx', 'https://trentygo.coralmint.in/upload/partner/36/vehicle_images/resume with exp.docx', 'upload/partner/36/vehicle_images/', 1, '2020-06-11 07:01:22', '2020-06-11 07:01:22'),
(195, NULL, 36, 45, 'image_document', 'Vehicle Images', NULL, '36vehicle_image', NULL, 'jpg', NULL, 'carf3.jpg', 'https://trentygo.coralmint.in/upload/partner/36/vehicle_images/carf3.jpg', 'upload/partner/36/vehicle_images/', 1, '2020-06-11 07:01:54', '2020-06-11 07:01:54'),
(196, NULL, 36, 45, 'image_document', 'Vehicle Images', NULL, '36vehicle_image', NULL, 'jpg', NULL, 'carf4.jpg', 'https://trentygo.coralmint.in/upload/partner/36/vehicle_images/carf4.jpg', 'upload/partner/36/vehicle_images/', 1, '2020-06-11 07:01:55', '2020-06-11 07:01:55'),
(197, NULL, 36, 45, 'image_document', 'Vehicle Images', NULL, '36vehicle_image', NULL, 'jpg', NULL, 'carf5.jpg', 'https://trentygo.coralmint.in/upload/partner/36/vehicle_images/carf5.jpg', 'upload/partner/36/vehicle_images/', 1, '2020-06-11 07:01:55', '2020-06-11 07:01:55'),
(198, NULL, 35, NULL, 'document', 'Personal Document', NULL, '35personal_files', NULL, 'pdf', NULL, '2020-02-08_03-59-15_reservation.pdf', 'https://trentygo.coralmint.in/upload/partner/35/personal_files/2020-02-08_03-59-15_reservation.pdf', 'upload/partner/35/personal_files/', 1, '2020-06-11 07:14:13', '2020-06-11 07:14:13'),
(218, NULL, 40, NULL, 'profile_image', 'partner profile image', NULL, '40profile_img', NULL, 'jpg', NULL, 'ratan_tata-570x570.jpg', 'https://trentygo.coralmint.in/upload/partner/40/profile_images/ratan_tata-570x570.jpg', 'upload/partner/40/profile_images/', 1, '2020-06-16 02:00:03', '2020-06-16 02:00:03'),
(219, NULL, 40, NULL, 'word', 'Personal Document', NULL, '40personal_files', NULL, 'docx', NULL, 'Capital Budgeting Decision.docx', 'https://trentygo.coralmint.in/upload/partner/40/personal_files/Capital Budgeting Decision.docx', 'upload/partner/40/personal_files/', 1, '2020-06-16 02:01:21', '2020-06-16 02:01:21'),
(220, NULL, 40, NULL, NULL, 'Personal Document', NULL, '40personal_files', NULL, 'docx', NULL, 'Sample Report.docx', 'https://trentygo.coralmint.in/upload/partner/40/personal_files/Sample Report.docx', 'upload/partner/40/personal_files/', 1, '2020-06-16 02:02:21', '2020-06-16 02:02:21'),
(221, NULL, 40, NULL, 'Agreement Document', 'Partner upoload agreement document', NULL, '40Company Documents', NULL, 'docx', NULL, 'Assignment 3-Pentagonal pictures-SAKTHI F19061.docx', 'https://trentygo.coralmint.in/upload/partner/40/Company Documents/Assignment 3-Pentagonal pictures-SAKTHI F19061.docx', 'upload/partner/40/Company Documents/', 1, '2020-06-16 02:05:50', '2020-06-16 02:05:50'),
(222, NULL, 40, 48, 'rc_document', 'Vehicle RC document', NULL, '40vehicle_image', NULL, 'docx', NULL, 'Capital Budgeting Decision (1).docx', 'https://trentygo.coralmint.in/upload/partner/40/vehicle_images/Capital Budgeting Decision (1).docx', 'upload/partner/40/vehicle_images/', 1, '2020-06-16 03:25:44', '2020-06-16 03:25:44'),
(223, NULL, 40, 48, 'fc_document', 'Vehicle FC document', NULL, '40vehicle_image', NULL, 'docx', NULL, 'Capital Budgeting Decision (1).docx', 'https://trentygo.coralmint.in/upload/partner/40/vehicle_images/Capital Budgeting Decision (1).docx', 'upload/partner/40/vehicle_images/', 1, '2020-06-16 03:29:03', '2020-06-16 03:29:03'),
(224, NULL, 40, 48, 'ins_document', 'Vehicle Insurance document', NULL, '40vehicle_image', NULL, 'docx', NULL, 'Assignment 3-Pentagonal pictures-SAKTHI F19061 (2).docx', 'https://trentygo.coralmint.in/upload/partner/40/vehicle_images/Assignment 3-Pentagonal pictures-SAKTHI F19061 (2).docx', 'upload/partner/40/vehicle_images/', 1, '2020-06-16 03:29:42', '2020-06-16 03:29:42'),
(225, NULL, 40, 48, 'image_document', 'Vehicle Images', NULL, '40vehicle_image', NULL, '28', NULL, 'WhatsApp Image 2020-05-15 at 19.28.06.jpeg', 'https://trentygo.coralmint.in/upload/partner/40/vehicle_images/WhatsApp Image 2020-05-15 at 19.28.06.jpeg', 'upload/partner/40/vehicle_images/', 1, '2020-06-16 03:30:13', '2020-06-16 03:30:13'),
(226, NULL, 40, 48, 'image_document', 'Vehicle Images', NULL, '40vehicle_image', NULL, '51', NULL, 'WhatsApp Image 2020-05-15 at 18.51.47.jpeg', 'https://trentygo.coralmint.in/upload/partner/40/vehicle_images/WhatsApp Image 2020-05-15 at 18.51.47.jpeg', 'upload/partner/40/vehicle_images/', 1, '2020-06-16 03:32:58', '2020-06-16 03:32:58'),
(227, NULL, 40, 48, 'image_document', 'Vehicle Images', NULL, '40vehicle_image', NULL, 'jpg', NULL, 'photo-1552667466-07770ae110d0.jpg', 'https://trentygo.coralmint.in/upload/partner/40/vehicle_images/photo-1552667466-07770ae110d0.jpg', 'upload/partner/40/vehicle_images/', 1, '2020-06-16 03:34:03', '2020-06-16 03:34:03'),
(228, NULL, 32, NULL, 'profile_image', 'partner profile image', NULL, '32profile_img', NULL, 'jpeg', NULL, 'LRM_EXPORT_132513735459036_20190319_184625929.jpeg', 'https://trentygo.coralmint.in/upload/partner/32/profile_images/LRM_EXPORT_132513735459036_20190319_184625929.jpeg', 'upload/partner/32/profile_images/', 1, '2020-06-16 06:08:27', '2020-06-16 06:08:27'),
(229, NULL, 17, 1, 'rc_document', 'Vehicle RC document', NULL, '17vehicle_image', NULL, 'pdf', NULL, 'Bala policy_1.pdf', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/Bala policy_1.pdf', 'upload/partner/17/vehicle_images/', 1, '2020-06-17 10:24:15', '2020-06-17 10:24:15'),
(232, NULL, 17, 1, 'rc_document', 'Vehicle RC document', NULL, '17vehicle_image', NULL, 'pdf', NULL, '2020-02-08_03-59-15_reservation.pdf', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/2020-02-08_03-59-15_reservation.pdf', 'upload/partner/17/vehicle_images/', 1, '2020-06-17 13:33:59', '2020-06-17 13:33:59'),
(235, NULL, 17, 1, 'fc_document', 'Vehicle FC document', NULL, '17vehicle_image', NULL, 'pdf', NULL, '2020-02-08_03-59-15_reservation.pdf', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/2020-02-08_03-59-15_reservation.pdf', 'upload/partner/17/vehicle_images/', 1, '2020-06-17 13:40:50', '2020-06-17 13:40:50'),
(236, NULL, 17, 1, 'ins_document', 'Vehicle Insurance document', NULL, '17vehicle_image', NULL, 'docx', NULL, 'Database2 (1).docx', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/Database2 (1).docx', 'upload/partner/17/vehicle_images/', 1, '2020-06-17 13:40:57', '2020-06-17 13:40:57'),
(241, NULL, 17, NULL, '55', 'Personal Document', NULL, '17personal_files', NULL, '27', NULL, 'WhatsApp Image 2020-05-22 at 11.27.05 AM.jpeg', 'https://trentygo.coralmint.in/upload/partner/17/personal_files/WhatsApp Image 2020-05-22 at 11.27.05 AM.jpeg', 'upload/partner/17/personal_files/', 1, '2020-06-17 14:16:00', '2020-06-17 14:16:00'),
(242, NULL, 17, 1, 'rc_document', 'Vehicle RC document', NULL, '17vehicle_image', NULL, '27', NULL, 'WhatsApp Image 2020-05-22 at 11.27.05 AM.jpeg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/WhatsApp Image 2020-05-22 at 11.27.05 AM.jpeg', 'upload/partner/17/vehicle_images/', 1, '2020-06-17 14:17:51', '2020-06-17 14:17:51'),
(244, NULL, 17, NULL, 'Comapny Insurance Document', 'Vehicle Images', NULL, '17Company Documents', NULL, '27', NULL, 'WhatsApp Image 2020-05-22 at 11.27.05 AM.jpeg', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/WhatsApp Image 2020-05-22 at 11.27.05 AM.jpeg', 'upload/partner/17/Company Documents/', 1, '2020-06-17 14:22:48', '2020-06-17 14:22:48'),
(245, NULL, 17, NULL, 'Agreement Document', 'Partner upoload agreement document', NULL, '17Company Documents', NULL, '27', NULL, 'WhatsApp Image 2020-05-22 at 11.27.04 AM.jpeg', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/WhatsApp Image 2020-05-22 at 11.27.04 AM.jpeg', 'upload/partner/17/Company Documents/', 1, '2020-06-17 14:26:56', '2020-06-17 14:26:56'),
(246, NULL, 17, NULL, 'CABIS Document', 'Partner upload CABIS document', NULL, '17Company Documents', NULL, '27', NULL, 'WhatsApp Image 2020-05-22 at 11.27.04 AM.jpeg', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/WhatsApp Image 2020-05-22 at 11.27.04 AM.jpeg', 'upload/partner/17/Company Documents/', 1, '2020-06-17 14:27:00', '2020-06-17 14:27:00'),
(247, NULL, 17, NULL, 'Tax Document', 'Partner upload Tax document', NULL, '17Company Documents', NULL, '27', NULL, 'WhatsApp Image 2020-05-22 at 11.27.05 AM.jpeg', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/WhatsApp Image 2020-05-22 at 11.27.05 AM.jpeg', 'upload/partner/17/Company Documents/', 1, '2020-06-17 14:27:05', '2020-06-17 14:27:05'),
(248, NULL, 17, NULL, 'Comapny Insurance Document', 'Vehicle Images', NULL, '17Company Documents', NULL, '27', NULL, 'WhatsApp Image 2020-05-22 at 11.27.04 AM.jpeg', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/WhatsApp Image 2020-05-22 at 11.27.04 AM.jpeg', 'upload/partner/17/Company Documents/', 1, '2020-06-17 14:27:09', '2020-06-17 14:27:09'),
(252, NULL, 17, NULL, 'Tax Document', 'Partner upload Tax document', NULL, '17Company Documents', NULL, '27', NULL, 'WhatsApp Image 2020-05-22 at 11.27.04 AM.jpeg', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/WhatsApp Image 2020-05-22 at 11.27.04 AM.jpeg', 'upload/partner/17/Company Documents/', 1, '2020-06-17 14:34:00', '2020-06-17 14:34:00'),
(253, NULL, 17, NULL, 'Comapny Insurance Document', 'Vehicle Images', NULL, '17Company Documents', NULL, '27', NULL, 'WhatsApp Image 2020-05-22 at 11.27.05 AM.jpeg', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/WhatsApp Image 2020-05-22 at 11.27.05 AM.jpeg', 'upload/partner/17/Company Documents/', 1, '2020-06-17 14:34:04', '2020-06-17 14:34:04'),
(255, NULL, 17, NULL, 'card', 'Personal Document', NULL, '17personal_files', NULL, 'docx', NULL, 'Database2.docx', 'https://trentygo.coralmint.in/upload/partner/17/personal_files/Database2.docx', 'upload/partner/17/personal_files/', 1, '2020-07-13 07:37:15', '2020-07-13 07:37:15'),
(256, NULL, 17, NULL, 'Agreement Document', 'Partner upoload agreement document', NULL, '17Company Documents', NULL, 'docx', NULL, 'Doc1.docx', 'https://trentygo.coralmint.in/upload/partner/17/Company Documents/Doc1.docx', 'upload/partner/17/Company Documents/', 1, '2020-07-13 07:40:30', '2020-07-13 07:40:30'),
(257, NULL, 17, 51, 'rc_document', 'Vehicle RC document', NULL, '17vehicle_image', NULL, 'pdf', NULL, 'DataTables example - Export titles and messages.pdf', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/DataTables example - Export titles and messages.pdf', 'upload/partner/17/vehicle_images/', 1, '2020-07-13 07:51:27', '2020-07-13 07:51:27'),
(258, NULL, 17, 51, 'fc_document', 'Vehicle FC document', NULL, '17vehicle_image', NULL, 'pdf', NULL, 'DataTables example - Select integration - export selected rows.pdf', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/DataTables example - Select integration - export selected rows.pdf', 'upload/partner/17/vehicle_images/', 1, '2020-07-13 07:52:01', '2020-07-13 07:52:01'),
(259, NULL, 17, 51, 'ins_document', 'Vehicle Insurance document', NULL, '17vehicle_image', NULL, 'docx', NULL, 'estimation time.docx', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/estimation time.docx', 'upload/partner/17/vehicle_images/', 1, '2020-07-13 07:52:12', '2020-07-13 07:52:12'),
(260, NULL, 17, 51, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'carf3.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/carf3.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-07-13 07:52:51', '2020-07-13 07:52:51'),
(261, NULL, 17, 51, 'image_document', 'Vehicle Images', NULL, '17vehicle_image', NULL, 'jpg', NULL, 'carf4.jpg', 'https://trentygo.coralmint.in/upload/partner/17/vehicle_images/carf4.jpg', 'upload/partner/17/vehicle_images/', 1, '2020-07-13 07:52:52', '2020-07-13 07:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `location_master`
--

CREATE TABLE `location_master` (
  `location_master_id` int(11) NOT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_master`
--

INSERT INTO `location_master` (`location_master_id`, `location_name`, `status`, `created_at`, `modified_at`) VALUES
(1, 'Railway st', '1', '2020-07-05 11:44:48', '2020-07-05 11:44:48'),
(2, 'paris airport junction', '1', '2020-07-05 12:10:48', '2020-07-05 12:10:48'),
(3, 'paris port', '1', '2020-07-05 12:15:44', '2020-07-05 12:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE `log_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'My Testing Add To Log.', 'https://trentygo.coralmint.in/add-to-log', 'GET', '103.104.124.61', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 1, '2020-05-18 08:01:53', '2020-05-18 08:01:53'),
(2, 'My Testing Add To Log.', 'https://trentygo.coralmint.in/add-to-log', 'GET', '103.104.124.61', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 1, '2020-05-18 08:04:44', '2020-05-18 08:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `manage_vehicle_rent`
--

CREATE TABLE `manage_vehicle_rent` (
  `vehicle_manage_id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `rent` varchar(255) DEFAULT NULL,
  `rate_for` int(11) DEFAULT NULL COMMENT '1= rate_per_km 2= rate_per_hr',
  `available_status` varchar(255) DEFAULT '1' COMMENT '1 = available, 2 = not-available',
  `status` int(11) DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_vehicle_rent`
--

INSERT INTO `manage_vehicle_rent` (`vehicle_manage_id`, `vehicle_id`, `date`, `rent`, `rate_for`, `available_status`, `status`, `created_at`, `modified_at`) VALUES
(311, 1, '2020-06-02', '210', 1, '1', 1, '2020-06-08 12:37:51', '2020-06-08 12:37:51'),
(312, 1, '2020-06-03', '250', 1, '1', 1, '2020-06-08 12:37:51', '2020-06-08 12:37:51'),
(313, 3, '2020-06-02', '500', 1, '1', 1, '2020-06-09 04:01:37', '2020-06-09 04:01:37'),
(314, 1, '2020-06-29', '4000', 1, '2', 1, '2020-06-10 10:44:47', '2020-06-10 10:44:47'),
(315, 43, '2020-10-01', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(316, 43, '2020-10-02', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(317, 43, '2020-10-05', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(318, 43, '2020-10-06', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(319, 43, '2020-10-07', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(320, 43, '2020-10-08', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(321, 43, '2020-10-09', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(322, 43, '2020-10-12', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(323, 43, '2020-10-13', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(324, 43, '2020-10-14', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(325, 43, '2020-10-15', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(326, 43, '2020-10-16', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(327, 43, '2020-10-19', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(328, 43, '2020-10-20', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(329, 43, '2020-10-21', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(330, 43, '2020-10-22', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(331, 43, '2020-10-23', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(332, 43, '2020-10-26', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(333, 43, '2020-10-27', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(334, 43, '2020-10-28', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(335, 43, '2020-10-29', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(336, 43, '2020-10-30', '2000', 1, '2', 1, '2020-06-11 05:20:59', '2020-06-11 05:20:59'),
(337, 43, '2020-05-18', '34', 1, '2', 1, '2020-06-11 05:21:17', '2020-06-11 05:21:17'),
(338, 44, '2020-06-11', '250', 2, '1', 1, '2020-06-11 06:42:58', '2020-06-11 06:42:58'),
(339, 44, '2020-06-10', '500', 1, '1', 1, '2020-06-11 06:43:22', '2020-06-11 06:43:22'),
(340, 44, '2020-07-01', '250', 1, '1', 1, '2020-06-11 06:43:37', '2020-06-11 06:43:37'),
(341, 45, '2020-06-12', '200', 1, '1', 1, '2020-06-11 07:03:03', '2020-06-11 07:03:03'),
(342, 45, '2020-06-19', '200', 1, '1', 1, '2020-06-11 07:03:12', '2020-06-11 07:03:12'),
(343, 48, '2020-06-16', '20', 1, '1', 1, '2020-06-16 03:46:39', '2020-06-16 03:46:39'),
(344, 48, '2020-07-14', '1000', 1, '2', 1, '2020-06-16 03:47:15', '2020-06-16 03:47:15'),
(345, 48, '2020-06-15', '20', 1, '1', 1, '2020-06-16 03:51:03', '2020-06-16 03:51:03'),
(346, 48, '2020-06-03', '20', 1, '1', 1, '2020-06-16 03:56:31', '2020-06-16 03:56:31'),
(347, 48, '2020-06-04', '20', 1, '1', 1, '2020-06-16 03:56:31', '2020-06-16 03:56:31'),
(348, 48, '2020-06-06', '120', 1, '1', 1, '2020-06-16 03:56:31', '2020-06-16 03:56:31'),
(349, 48, '2020-06-01', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(350, 48, '2020-06-02', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(351, 48, '2020-06-05', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(352, 48, '2020-06-08', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(353, 48, '2020-06-09', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(354, 48, '2020-06-10', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(355, 48, '2020-06-11', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(356, 48, '2020-06-12', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(357, 48, '2020-06-17', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(358, 48, '2020-06-18', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(359, 48, '2020-06-19', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(360, 48, '2020-06-22', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(361, 48, '2020-06-23', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(362, 48, '2020-06-24', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(363, 48, '2020-06-25', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(364, 48, '2020-06-26', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(365, 48, '2020-06-29', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(366, 48, '2020-06-30', '20', 1, '1', 1, '2020-06-16 03:57:56', '2020-06-16 03:57:56'),
(369, 48, '2020-06-07', '120', 1, '1', 1, '2020-06-16 03:58:50', '2020-06-16 03:58:50'),
(371, 48, '2020-06-13', '120', 1, '1', 1, '2020-06-16 03:58:50', '2020-06-16 03:58:50'),
(373, 48, '2020-06-14', '120', 1, '1', 1, '2020-06-16 03:58:50', '2020-06-16 03:58:50'),
(375, 48, '2020-06-20', '120', 1, '1', 1, '2020-06-16 03:58:50', '2020-06-16 03:58:50'),
(377, 48, '2020-06-21', '120', 1, '1', 1, '2020-06-16 03:58:50', '2020-06-16 03:58:50'),
(379, 48, '2020-06-27', '120', 1, '1', 1, '2020-06-16 03:58:50', '2020-06-16 03:58:50'),
(381, 48, '2020-06-28', '120', 1, '1', 1, '2020-06-16 03:58:50', '2020-06-16 03:58:50'),
(382, 1, '2020-07-01', '210', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(383, 1, '2020-07-02', '210', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(384, 1, '2020-07-03', '210', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(385, 1, '2020-07-06', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(386, 1, '2020-07-07', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(387, 1, '2020-07-08', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(388, 1, '2020-07-09', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(389, 1, '2020-07-10', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(390, 1, '2020-07-13', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(391, 1, '2020-07-14', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(392, 1, '2020-07-15', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(393, 1, '2020-07-16', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(394, 1, '2020-07-17', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(395, 1, '2020-07-20', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(396, 1, '2020-07-21', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(397, 1, '2020-07-22', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(398, 1, '2020-07-23', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(399, 1, '2020-07-24', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(400, 1, '2020-07-27', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(401, 1, '2020-07-28', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(402, 1, '2020-07-29', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(403, 1, '2020-07-30', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(404, 1, '2020-07-31', '200', 1, '1', 1, '2020-06-18 02:20:45', '2020-06-18 02:20:45'),
(405, 1, '2020-06-04', '210', 1, '1', 1, '2020-06-18 02:21:41', '2020-06-18 02:21:41'),
(406, 1, '2020-06-08', '210', 1, '1', 1, '2020-06-18 02:21:41', '2020-06-18 02:21:41'),
(407, 1, '2020-06-01', '210', 1, '1', 1, '2020-06-18 02:21:41', '2020-06-18 02:21:41'),
(409, 1, '2020-06-06', '150', 1, '1', 1, '2020-06-18 02:22:49', '2020-06-18 02:22:49'),
(411, 1, '2020-06-07', '150', 1, '1', 1, '2020-06-18 02:22:49', '2020-06-18 02:22:49'),
(413, 1, '2020-06-13', '150', 1, '1', 1, '2020-06-18 02:22:49', '2020-06-18 02:22:49'),
(415, 1, '2020-06-14', '150', 1, '1', 1, '2020-06-18 02:22:49', '2020-06-18 02:22:49'),
(417, 1, '2020-06-20', '150', 1, '1', 1, '2020-06-18 02:22:49', '2020-06-18 02:22:49'),
(419, 1, '2020-06-21', '150', 1, '1', 1, '2020-06-18 02:22:49', '2020-06-18 02:22:49'),
(421, 1, '2020-06-27', '150', 1, '1', 1, '2020-06-18 02:22:49', '2020-06-18 02:22:49'),
(423, 1, '2020-06-28', '150', 1, '1', 1, '2020-06-18 02:22:49', '2020-06-18 02:22:49'),
(424, 13, '2020-07-01', '150', 1, '1', 1, '2020-07-03 01:27:41', '2020-07-03 01:27:41'),
(425, 13, '2020-07-02', '150', 1, '1', 1, '2020-07-03 01:27:41', '2020-07-03 01:27:41'),
(426, 13, '2020-07-03', '150', 1, '1', 1, '2020-07-03 01:27:41', '2020-07-03 01:27:41'),
(427, 13, '2020-07-04', '150', 1, '1', 1, '2020-07-03 01:27:41', '2020-07-03 01:27:41'),
(428, 13, '2020-07-05', '150', 1, '1', 1, '2020-07-03 01:27:41', '2020-07-03 01:27:41'),
(429, 13, '2020-07-06', '150', 1, '1', 1, '2020-07-03 01:27:41', '2020-07-03 01:27:41'),
(430, 13, '2020-07-07', '150', 1, '1', 1, '2020-07-03 01:27:41', '2020-07-03 01:27:41'),
(431, 13, '2020-07-08', '150', 1, '1', 1, '2020-07-03 01:27:41', '2020-07-03 01:27:41'),
(432, 13, '2020-07-09', '150', 1, '1', 1, '2020-07-03 01:27:41', '2020-07-03 01:27:41'),
(433, 13, '2020-07-10', '150', 1, '1', 1, '2020-07-03 01:27:41', '2020-07-03 01:27:41'),
(434, 13, '2020-05-01', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(435, 13, '2020-05-04', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(436, 13, '2020-05-05', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(437, 13, '2020-05-06', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(438, 13, '2020-05-07', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(439, 13, '2020-05-08', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(440, 13, '2020-05-11', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(441, 13, '2020-05-12', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(442, 13, '2020-05-13', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(443, 13, '2020-05-14', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(444, 13, '2020-05-15', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(445, 13, '2020-05-18', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(446, 13, '2020-05-19', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(447, 13, '2020-05-20', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(448, 13, '2020-05-21', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(449, 13, '2020-05-22', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(450, 13, '2020-05-25', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(451, 13, '2020-05-26', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(452, 13, '2020-05-27', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(453, 13, '2020-05-28', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(454, 13, '2020-05-29', '310', 1, '1', 1, '2020-07-03 01:29:24', '2020-07-03 01:29:24'),
(456, 13, '2020-04-04', '100', 1, '1', 1, '2020-07-03 01:30:03', '2020-07-03 01:30:03'),
(458, 13, '2020-04-05', '100', 1, '1', 1, '2020-07-03 01:30:03', '2020-07-03 01:30:03'),
(460, 13, '2020-04-11', '100', 1, '1', 1, '2020-07-03 01:30:03', '2020-07-03 01:30:03'),
(462, 13, '2020-04-12', '100', 1, '1', 1, '2020-07-03 01:30:03', '2020-07-03 01:30:03'),
(464, 13, '2020-04-18', '100', 1, '1', 1, '2020-07-03 01:30:03', '2020-07-03 01:30:03'),
(466, 13, '2020-04-19', '100', 1, '1', 1, '2020-07-03 01:30:03', '2020-07-03 01:30:03'),
(468, 13, '2020-04-25', '100', 1, '1', 1, '2020-07-03 01:30:03', '2020-07-03 01:30:03'),
(470, 13, '2020-04-26', '100', 1, '1', 1, '2020-07-03 01:30:03', '2020-07-03 01:30:03'),
(471, 2, '01-07-2020', '1000', 1, '1', 1, '2020-07-08 02:30:47', '2020-07-08 02:30:47'),
(472, 22222, '02-07-2020', '150', 1, '1', 1, '2020-07-08 02:30:47', '2020-07-08 02:30:47'),
(473, 2, '03-07-2020', '1000', 1, '1', 1, '2020-07-08 02:30:47', '2020-07-08 02:30:47'),
(474, 2, '06-07-2020', '1000', 1, '1', 1, '2020-07-08 02:30:47', '2020-07-08 02:30:47'),
(475, 2, '07-07-2020', '1000', 1, '1', 1, '2020-07-08 02:30:47', '2020-07-08 02:30:47'),
(476, 2, '08-07-2020', '1000', 1, '1', 1, '2020-07-08 02:30:47', '2020-07-08 02:30:47'),
(477, 51, '16-07-2020', '350', 1, '1', 1, '2020-07-13 07:54:53', '2020-07-13 07:54:53'),
(478, 51, '13-07-2020', '250', 1, '1', 1, '2020-07-13 07:55:19', '2020-07-13 07:55:19'),
(479, 51, '15-09-2020', '250', 1, '1', 1, '2020-07-13 07:55:58', '2020-07-13 07:55:58'),
(480, 2, '02-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(481, 2, '09-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(482, 2, '10-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(483, 2, '13-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(484, 2, '14-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(485, 2, '15-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(486, 2, '16-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(487, 2, '17-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(488, 2, '20-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(489, 2, '21-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(490, 2, '22-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(491, 2, '23-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(492, 2, '24-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(493, 2, '27-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(494, 2, '28-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(495, 2, '29-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(496, 2, '30-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(497, 2, '31-07-2020', '1000', 1, '1', 1, '2020-07-13 12:53:49', '2020-07-13 12:53:49'),
(498, 2, '04-07-2020', '1000', 1, '1', 1, '2020-07-13 12:54:15', '2020-07-13 12:54:15'),
(499, 2, '05-07-2020', '1000', 1, '1', 1, '2020-07-13 12:54:15', '2020-07-13 12:54:15'),
(500, 2, '11-07-2020', '1000', 1, '1', 1, '2020-07-13 12:54:15', '2020-07-13 12:54:15'),
(501, 2, '12-07-2020', '1000', 1, '1', 1, '2020-07-13 12:54:15', '2020-07-13 12:54:15'),
(502, 2, '18-07-2020', '1000', 1, '1', 1, '2020-07-13 12:54:15', '2020-07-13 12:54:15'),
(503, 2, '19-07-2020', '1000', 1, '1', 1, '2020-07-13 12:54:15', '2020-07-13 12:54:15'),
(504, 2, '25-07-2020', '1000', 1, '1', 1, '2020-07-13 12:54:15', '2020-07-13 12:54:15'),
(505, 2, '26-07-2020', '1000', 1, '1', 1, '2020-07-13 12:54:15', '2020-07-13 12:54:15'),
(506, 2, '03-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(507, 2, '04-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(508, 2, '05-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(509, 2, '06-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(510, 2, '07-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(511, 2, '10-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(512, 2, '11-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(513, 2, '12-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(514, 2, '13-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(515, 2, '14-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(516, 2, '17-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(517, 2, '18-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(518, 2, '19-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(519, 2, '20-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(520, 2, '21-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(521, 2, '24-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(522, 2, '25-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(523, 2, '26-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(524, 2, '27-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(525, 2, '28-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48'),
(526, 2, '31-08-2020', '1000', 1, '1', 1, '2020-07-13 12:54:48', '2020-07-13 12:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `master_data`
--

CREATE TABLE `master_data` (
  `master_data_id` int(11) NOT NULL,
  `master_for` varchar(255) DEFAULT NULL,
  `master_key` varchar(255) DEFAULT NULL,
  `master_value` varchar(255) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_orginal_name` varchar(255) DEFAULT NULL,
  `image_ext` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_data`
--

INSERT INTO `master_data` (`master_data_id`, `master_for`, `master_key`, `master_value`, `image_id`, `image_name`, `image_orginal_name`, `image_ext`, `image_url`, `image_path`, `status`, `created_at`, `modified_at`) VALUES
(3, 'vehicle_option', 'location', 'kollidam', NULL, '', NULL, '', '', NULL, 1, '2020-05-17 14:38:10', '2020-05-17 14:38:10'),
(4, 'vehicle_option', 'location', 'chennai', NULL, '', NULL, '', '', NULL, 1, '2020-05-17 14:50:01', '2020-05-17 14:50:01'),
(5, 'vehicle_option', 'color', 'Blue', NULL, '', NULL, '', '', NULL, 1, '2020-05-17 15:24:40', '2020-05-17 15:24:40'),
(6, 'vehicle_option', 'color', 'greens', NULL, '', NULL, '', '', NULL, 1, '2020-05-17 15:24:56', '2020-05-17 15:24:56'),
(8, 'vehicle_option', 'color', 'grey', NULL, '', NULL, '', '', NULL, 1, '2020-06-12 12:54:25', '2020-06-12 12:54:25'),
(9, 'vehicle_option', 'brand', 'Renault', NULL, '', NULL, '', '', NULL, 1, '2020-05-23 06:21:43', '2020-05-23 06:21:43'),
(10, 'vehicle_option', 'brand', 'BMW', NULL, '', NULL, '', '', NULL, 1, '2020-05-23 06:21:43', '2020-05-23 06:21:43'),
(11, 'vehicle_option', 'brand', 'TATA Group', NULL, '', NULL, '', '', NULL, 1, '2020-05-23 06:21:43', '2020-05-23 06:21:43'),
(12, 'vehicle_option', 'brand', 'Toyota', NULL, '', NULL, '', '', NULL, 1, '2020-06-12 13:37:57', '2020-06-12 13:37:57'),
(13, 'vehicle_option', 'seat_type', 'Normal', NULL, '', NULL, '', '', NULL, 1, '2020-05-23 06:21:43', '2020-05-23 06:21:43'),
(14, 'vehicle_option', 'seat_type', 'Business class', NULL, '', NULL, '', '', NULL, 1, '2020-05-23 06:21:43', '2020-05-23 06:21:43'),
(15, 'vehicle_option', 'seat_type', 'Convinent seat', NULL, '', NULL, '', '', NULL, 1, '2020-05-23 06:21:43', '2020-05-23 06:21:43'),
(16, 'vehicle_option', 'seat_count', '3+1', NULL, '', NULL, '', '', NULL, 1, '2020-05-23 06:21:43', '2020-05-23 06:21:43'),
(17, 'vehicle_option', 'seat_count', '4+1', NULL, '', NULL, '', '', NULL, 1, '2020-05-23 06:21:43', '2020-05-23 06:21:43'),
(18, 'vehicle_option', 'seat_count', '7+1', NULL, '', NULL, '', '', NULL, 1, '2020-05-23 06:21:43', '2020-05-23 06:21:43'),
(19, 'vehicle_option', 'fuel_type', 'Petrol', NULL, '', NULL, '', '', NULL, 1, '2020-05-23 13:23:26', '2020-05-23 13:23:26'),
(20, 'vehicle_option', 'fuel_type', 'Diesel', NULL, '', NULL, '', '', NULL, 1, '2020-05-23 13:23:26', '2020-05-23 13:23:26'),
(21, 'vehicle_option', 'fuel_type', 'Gas', NULL, '', NULL, '', '', NULL, 1, '2020-05-23 13:23:26', '2020-05-23 13:23:26'),
(22, 'vehicle_option', 'driving_mode', 'Auto-gear', NULL, '', NULL, '', '', NULL, 1, '2020-05-23 13:23:26', '2020-05-23 13:23:26'),
(23, 'vehicle_option', 'driving_mode', 'Manual', NULL, '', NULL, '', '', NULL, 1, '2020-05-23 13:23:26', '2020-05-23 13:23:26'),
(25, 'vehicle_option', 'color', 'navy blue', NULL, '', NULL, '', '', NULL, 1, '2020-05-25 09:51:56', '2020-05-25 09:51:56'),
(26, 'vehicle_option', 'add_on', 'Baby Seat', NULL, '', NULL, '', '', NULL, 1, '2020-06-12 13:36:37', '2020-06-12 13:36:37'),
(27, 'vehicle_option', 'add_on', 'Cup Stand', NULL, '', NULL, '', '', NULL, 1, '2020-06-01 07:17:20', '2020-06-01 07:17:20'),
(28, 'vehicle_option', 'add_on', 'Pillow', NULL, '', NULL, '', '', NULL, 1, '2020-06-01 12:29:25', '2020-06-01 12:29:25'),
(29, 'vehicle_option', 'add_on', 'Car Bumper', NULL, '', NULL, '', '', NULL, 1, '2020-06-03 07:56:19', '2020-06-03 07:56:19'),
(30, 'vehicle_option', 'add_on_services', 'Climatisation', 3, '', NULL, '', 'http://coralmint.in/trentygo/upload/master_image/service_repair_automotive-42-512.png', NULL, 1, '2020-06-04 04:20:47', '2020-06-25 10:35:36'),
(31, 'vehicle_option', 'add_on_services', 'Régulateur de vitesse', 5, '', NULL, '', 'http://coralmint.in/trentygo/upload/master_image/081-dashboard-4.png', NULL, 1, '2020-06-04 04:33:18', '2020-06-25 10:49:08'),
(32, 'vehicle_option', 'add_on', 'Ice Box', NULL, '', NULL, '', '', NULL, 1, '2020-06-04 12:42:42', '2020-06-04 12:42:42'),
(33, 'vehicle_option', 'add_on_services', 'GPS', 6, '', NULL, '', '', NULL, 1, '2020-06-04 12:44:59', '2020-06-25 11:23:35'),
(34, 'vehicle_option', 'add_on_services', 'Siège bébé', 7, '', NULL, '', 'http://coralmint.in/trentygo/upload/master_image/child-safety-png-16.png', NULL, 1, '2020-06-04 12:45:18', '2020-06-25 11:27:14'),
(35, 'vehicle_option', 'color', 'black', NULL, '', NULL, '', '', NULL, 1, '2020-06-10 11:04:15', '2020-06-10 11:04:15'),
(36, 'vehicle_option', 'add_on', 'cycle stand', NULL, '', NULL, '', '', NULL, 1, '2020-06-11 06:36:26', '2020-06-11 06:36:26'),
(37, 'vehicle_option', 'add_on_services', 'Porte-vélos', 8, '', NULL, '', 'http://coralmint.in/trentygo/upload/master_image/van-icon-png-1.png', NULL, 1, '2020-06-11 06:37:16', '2020-06-25 11:37:40'),
(38, 'vehicle_option', 'add_on_services', 'Pneus neige', 9, '', NULL, '', 'http://coralmint.in/trentygo/upload/master_image/081-tire.png', NULL, 1, '2020-06-11 06:37:33', '2020-06-25 11:45:03'),
(39, 'vehicle_option', 'add_on', 'air filler', NULL, '', NULL, '', '', NULL, 1, '2020-06-11 08:36:51', '2020-06-11 08:36:51'),
(40, 'vehicle_option', 'location', 'sirlali2', NULL, '', NULL, '', '', NULL, 1, '2020-06-12 10:48:12', '2020-06-12 12:21:36'),
(41, 'vehicle_option', 'location', 'sirkalis', NULL, '', NULL, '', '', NULL, 1, '2020-06-12 10:50:26', '2020-06-12 12:35:50'),
(55, 'vehicle_option', 'add_on_services', 'Chaines', 10, '', NULL, '', 'http://coralmint.in/trentygo/upload/master_image/3100310.png', NULL, 1, '2020-06-17 02:32:14', '2020-06-25 11:50:20'),
(56, 'vehicle_option', 'vehicle type', 'Citadine', 11, '', NULL, '', 'http://coralmint.in/trentygo/upload/master_image/ic1 (1).png', NULL, 1, '2020-06-26 10:52:50', '2020-06-26 10:52:50'),
(57, 'vehicle_option', 'vehicle type', 'Berline', 12, NULL, NULL, NULL, 'http://coralmint.in/trentygo/upload/master_image/ic1.png', NULL, 1, '2020-06-26 10:57:39', '2020-06-26 10:57:39'),
(58, 'vehicle_option', 'vehicle type', 'Famitiale', 13, NULL, NULL, NULL, 'http://coralmint.in/trentygo/upload/master_image/ic2.png', NULL, 1, '2020-06-26 10:58:51', '2020-06-26 10:58:51'),
(59, 'vehicle_option', 'vehicle type', 'Utilitarie', 14, NULL, NULL, NULL, 'http://coralmint.in/trentygo/upload/master_image/ic3.png', NULL, 1, '2020-06-27 00:01:05', '2020-06-27 00:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `master_data_images`
--

CREATE TABLE `master_data_images` (
  `master_data_images_id` int(11) NOT NULL,
  `file_for` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_ext` varchar(255) DEFAULT NULL,
  `file_orginal_name` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_data_images`
--

INSERT INTO `master_data_images` (`master_data_images_id`, `file_for`, `file_name`, `file_ext`, `file_orginal_name`, `file_url`, `file_path`, `status`, `created_at`, `modified_at`) VALUES
(5, 'addon_option', 'master_image', 'png', '081-dashboard-4.png', 'http://coralmint.in/trentygo/upload/master_image/081-dashboard-4.png', 'upload/master_image/081-dashboard-4.png', 1, '2020-06-25 10:48:55', NULL),
(4, 'addon_option', 'master_image', 'png', '081-dashboard-1.png', 'http://coralmint.in/trentygo/upload/master_image/081-dashboard-1.png', 'upload/master_image/081-dashboard-1.png', 1, '2020-06-25 10:39:03', NULL),
(3, 'addon_option', 'master_image', 'png', 'service_repair_automotive-42-512.png', 'http://coralmint.in/trentygo/upload/master_image/service_repair_automotive-42-512.png', 'upload/master_image/service_repair_automotive-42-512.png', 1, '2020-06-25 10:35:33', NULL),
(6, 'addon_option', 'master_image', 'png', 'gps.png', 'http://coralmint.in/trentygo/upload/master_image/gps.png', 'upload/master_image/gps.png', 1, '2020-06-25 11:23:32', NULL),
(7, 'addon_option', 'master_image', 'png', 'child-safety-png-16.png', 'http://coralmint.in/trentygo/upload/master_image/child-safety-png-16.png', 'upload/master_image/child-safety-png-16.png', 1, '2020-06-25 11:27:11', NULL),
(8, 'addon_option', 'master_image', 'png', 'van-icon-png-1.png', 'http://coralmint.in/trentygo/upload/master_image/van-icon-png-1.png', 'upload/master_image/van-icon-png-1.png', 1, '2020-06-25 11:37:36', NULL),
(9, 'addon_option', 'master_image', 'png', '081-tire.png', 'http://coralmint.in/trentygo/upload/master_image/081-tire.png', 'upload/master_image/081-tire.png', 1, '2020-06-25 11:45:01', NULL),
(10, 'addon_option', 'master_image', 'png', '3100310.png', 'http://coralmint.in/trentygo/upload/master_image/3100310.png', 'upload/master_image/3100310.png', 1, '2020-06-25 11:50:00', NULL),
(11, 'vehicle_type', 'master_image', 'png', 'ic1 (1).png', 'http://coralmint.in/trentygo/upload/master_image/ic1 (1).png', 'upload/master_image/ic1 (1).png', 1, '2020-06-27 00:38:26', NULL),
(12, 'vehicle_type', 'master_image', 'png', 'ic1.png', 'http://coralmint.in/trentygo/upload/master_image/ic1.png', 'upload/master_image/ic1.png', 1, '2020-06-27 00:00:00', NULL),
(13, 'vehicle_type', 'master_image', 'png', 'ic2.png', 'http://coralmint.in/trentygo/upload/master_image/ic2.png', 'upload/master_image/ic2.png', 1, '2020-06-27 00:38:26', NULL),
(14, 'vehicle_type', 'master_image', 'png', 'ic3.png', 'http://coralmint.in/trentygo/upload/master_image/ic3.png', 'upload/master_image/ic3.png', 1, '2020-06-27 00:38:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_05_18_063324_create_log_activity_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2020_06_29_050301_create_vehicles_table', 3),
(5, '2020_06_29_051459_create_vehicles_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `partner_details`
--

CREATE TABLE `partner_details` (
  `partner_id` int(11) NOT NULL,
  `unique_partner_id` varchar(255) DEFAULT 'abcd',
  `partner_type` int(11) DEFAULT NULL COMMENT '1 = normal; 2 = insurance',
  `partner_name` varchar(255) DEFAULT NULL,
  `partner_company_name` varchar(255) DEFAULT NULL,
  `partner_phone` varchar(255) DEFAULT NULL,
  `partner_email` varchar(255) DEFAULT NULL,
  `partner_vehicles_no` varchar(255) DEFAULT NULL,
  `company_description` text,
  `partner_door_no` varchar(255) DEFAULT NULL,
  `partner_area` varchar(255) DEFAULT NULL,
  `partner_street` varchar(255) DEFAULT NULL,
  `partner_postalcode` varchar(255) DEFAULT NULL,
  `partner_country` varchar(255) DEFAULT NULL,
  `offered_location` varchar(255) DEFAULT NULL,
  `partner_auto_approve` varchar(255) DEFAULT 'true',
  `partner_commision` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1= new, 2= approved, 3= partner_publish, 4= admin_publish, 5= unpublish, 6= admin_resend, 7= reject, 0= delete',
  `status_reason` varchar(255) NOT NULL DEFAULT 'New Partner',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partner_details`
--

INSERT INTO `partner_details` (`partner_id`, `unique_partner_id`, `partner_type`, `partner_name`, `partner_company_name`, `partner_phone`, `partner_email`, `partner_vehicles_no`, `company_description`, `partner_door_no`, `partner_area`, `partner_street`, `partner_postalcode`, `partner_country`, `offered_location`, `partner_auto_approve`, `partner_commision`, `status`, `status_reason`, `created_at`, `modified_at`) VALUES
(1, 'abcdA11', NULL, 'vignesh', 'vickytested', '11111', 'vikram3vpm@gmail.com', '11', 'good', '11', 'area name', 'state name', 'code111', NULL, NULL, 'true', NULL, 3, 'New Partner', '2020-05-18 11:25:43', '2020-06-11 05:12:43'),
(2, 'abcd', NULL, 'vinoth', NULL, '1546523265', 'vicky@gmail.com', '10', NULL, NULL, 'pondy', NULL, NULL, NULL, '3', 'true', NULL, 3, 'New Partner', '2020-05-18 13:11:31', '2020-06-03 10:41:10'),
(3, 'abcd', NULL, 'Vikram Jothi Aroul Jothi', NULL, '2114514564546', 'meenatchi3meenu@gmail.com', '5', NULL, NULL, 'goa', NULL, NULL, NULL, NULL, 'true', NULL, 8, 'New Partner', '2020-05-18 13:13:52', '2020-06-11 06:53:00'),
(7, 'abcd', NULL, 'leelatest', NULL, '9500700240', 'leela@coralmnt.in', '15', NULL, NULL, 'pondy', NULL, NULL, NULL, NULL, 'true', NULL, 1, 'New Partner', '2020-05-19 15:18:29', '2020-05-21 12:23:02'),
(15, 'abcd', NULL, 'Kalaivanan', NULL, '698562347', 'Kalaivanan@gmail.com', '12', NULL, NULL, 'Goa', NULL, NULL, NULL, NULL, 'true', NULL, 1, 'New Partner', '2020-05-21 04:50:50', '2020-05-21 04:50:50'),
(16, 'abcd', NULL, 'Ram', NULL, '08608040171', 'ram@gmail.com', '10', NULL, NULL, 'Cuddalore', NULL, NULL, NULL, NULL, 'true', NULL, 2, 'New Partner', '2020-05-21 05:01:56', '2020-06-18 02:58:49'),
(17, 'abcd', NULL, 'amurudha', 'sptech', '7987544156', 'amurudha97@gmail.com', '56', 'goodsh', '124', 'villupuram', 'bharathi street', '505005', 'park station', '1,2', 'false', NULL, 3, 'New Partner', '2020-05-22 00:27:58', '2020-07-13 07:25:59'),
(18, '018May-2020Trentygo', NULL, 'test 11', NULL, '+3333333', 'test11@gmail.com', '11', NULL, NULL, 'test location1', NULL, NULL, NULL, NULL, 'true', NULL, 1, 'New Partner', '2020-05-21 10:49:13', '2020-05-21 10:49:13'),
(19, '019052020Trentygo', NULL, 'test2', NULL, '33223322', 'test2@gmail.com', '2', NULL, NULL, '2 paris', NULL, NULL, NULL, NULL, 'true', NULL, 1, 'New Partner', '2020-05-21 10:53:06', '2020-05-21 10:53:06'),
(21, '#021052020Trentygo', NULL, 'coralmint', NULL, '8220696863', 'sujanancy@gmail.co', '5', NULL, NULL, 'pondicherry', NULL, NULL, NULL, NULL, 'true', NULL, 2, 'New Partner', '2020-05-25 02:31:10', '2020-05-30 03:07:17'),
(22, '#022052020Trentygo', NULL, 'validate_user', NULL, '4563457358', 'validate_user@gmail.com', '500', NULL, NULL, 'chennai', NULL, NULL, NULL, NULL, 'true', NULL, 1, 'New Partner', '2020-05-25 05:04:18', '2020-05-25 05:04:18'),
(25, 'TGP00025', 1, 'coralmint technology solutions', NULL, '9791897552', 'jenitha@coralmint.in', '3', NULL, NULL, 'pondicherry', NULL, NULL, NULL, NULL, 'true', NULL, 2, 'New Partner', '2020-05-25 08:40:57', '2020-06-09 14:21:13'),
(26, 'TGIP00026', 2, 'pluselve Technology Solutions', NULL, '97039826725', 'syletjenitha19@gmail.com', '3', NULL, NULL, 'pondicherry', NULL, NULL, NULL, NULL, 'true', NULL, 2, 'New Partner', '2020-05-25 09:12:43', '2020-06-16 00:45:04'),
(27, 'TGIP00027', 2, 'teste', NULL, '6856976', 'tetsbshsa.jsus', '10', NULL, NULL, 'sdsdsad', NULL, NULL, NULL, NULL, 'true', NULL, 1, 'New Partner', '2020-05-28 07:10:27', '2020-05-28 07:10:27'),
(28, 'TGP00028', 1, 'sdfgdsg', NULL, '656', 'hjghxhj545644$564651456vccv', '4654', NULL, NULL, 'sdfsd', NULL, NULL, NULL, NULL, 'true', NULL, 1, 'New Partner', '2020-05-28 07:13:46', '2020-05-28 07:13:46'),
(29, 'TGP00029', 1, 'sdfsdf', NULL, '56145641', 'dfd', '5664', NULL, NULL, 'cxc', NULL, NULL, NULL, NULL, 'true', NULL, 1, 'New Partner', '2020-05-28 07:14:42', '2020-05-28 07:14:42'),
(30, 'TGP00030', 1, 'coralmint', 'coralmint', '9894383235', 'nancy2012.n@gmail.co', '15', 'too done', '5', 'pondicherry', NULL, NULL, NULL, NULL, 'true', NULL, 3, 'New Partner', '2020-05-29 23:49:34', '2020-05-30 01:39:33'),
(31, 'TGP00031', 1, 'sujee', 'sujee cars', '9894652127', 'nancy2012.n@gmail.com', '5', 'bliugoiygpuib', '7', 'pondicherry', 'pondicherry', '605008', NULL, NULL, 'true', NULL, 3, 'New Partner', '2020-05-30 00:00:09', '2020-05-30 03:16:50'),
(32, 'TGP00032', 1, 'amurudha', NULL, '7894661233', 'amurudha97@gmail.com', '5', NULL, NULL, 'villupuram', NULL, NULL, NULL, NULL, 'true', NULL, 2, 'New Partner', '2020-06-02 05:12:18', '2020-06-03 10:45:00'),
(34, 'TGP00034', 1, 'vino', NULL, '9876543210', 'lee.vino13@gmail.com', '10', NULL, NULL, 'pdy', NULL, NULL, NULL, NULL, 'true', NULL, 1, 'New Partner', '2020-06-11 05:44:18', '2020-06-11 05:44:18'),
(35, 'TGP00035', 1, 'vicky', 'avms', '9487442676', 'vignesh@coralmint.in', '5', 'very good', NULL, 'kollidam', 'nagai', '609102', NULL, NULL, 'true', NULL, 3, 'New Partner', '2020-06-11 05:51:10', '2020-06-11 06:16:28'),
(36, 'TGP00036', 1, 'meena', 'redchip', '9500700200', 'vigensh2676@gmail.com', '3', 'good to see', '20', 'pondy', 'pondy', '100500', NULL, NULL, 'true', NULL, 3, 'New Partner', '2020-06-11 06:54:47', '2020-06-11 06:57:31'),
(37, 'TGIP00037', 2, 'siva', NULL, '9876543210', 'siva@gmail.com', '12', NULL, NULL, 'pdy', NULL, NULL, NULL, NULL, 'true', NULL, 2, 'New Partner', '2020-06-12 03:53:01', '2020-06-12 03:53:15'),
(38, 'TGIP00038', 2, NULL, 'sujee cars', '9894383243', 'sujanancy@gmail.com', '5', NULL, NULL, 'pondicherry', NULL, NULL, NULL, NULL, 'true', NULL, 1, 'New Partner', '2020-06-15 23:40:12', '2020-06-15 23:40:12'),
(39, 'TGP00039', 1, NULL, 'coralmint', '9894652127', 'admin@coralmint.in', '5', NULL, NULL, 'pondicherry', NULL, NULL, NULL, NULL, 'true', NULL, 8, 'New Partner', '2020-06-15 23:53:13', '2020-06-18 02:54:44'),
(40, 'TGP00040', 1, 'nancy', 'coralmint', '9894383243', 'josapathyuvi@gmail.com', '5', 'kugoyvoucotfljv', '20', 'pondicherry', 'pondichery', '605007', NULL, NULL, 'true', NULL, 3, 'New Partner', '2020-06-16 00:00:47', '2020-06-16 02:00:23'),
(41, 'TGIP00041', 2, NULL, 'coralmint', '9894383243', 'sujanancy', '5', NULL, NULL, 'pondicherry', NULL, NULL, NULL, NULL, 'true', NULL, 2, 'New Partner', '2020-06-16 00:30:03', '2020-06-18 02:57:27'),
(42, 'TGIP00042', 2, NULL, 'rajesh', '987654321', 'rajesh@gmail.com', '20', NULL, NULL, 'pdy', NULL, NULL, NULL, NULL, 'true', NULL, 2, 'New Partner', '2020-06-16 05:04:43', '2020-06-17 01:51:06'),
(43, 'TGIP00043', 2, NULL, 'rajesh', '9876543210', 'rajesh112@gmail.com', '20', NULL, NULL, 'pdy', NULL, NULL, NULL, NULL, 'true', NULL, 2, 'New Partner', '2020-06-16 05:09:11', '2020-06-18 02:57:03'),
(44, 'TGIP00044', 2, NULL, 'jg', '98765432123', 'jghjhgjgh@jhgjh.jgh', '20', NULL, NULL, 'lkj', NULL, NULL, NULL, NULL, 'true', NULL, 1, 'New Partner', '2020-06-16 11:50:31', '2020-06-16 11:50:31'),
(45, 'TGIP00045', 2, NULL, 'ghjhg', '98736546432', 'fsdfds@sdd.das', '20', NULL, NULL, 'pdy', NULL, NULL, NULL, NULL, 'true', NULL, 1, 'New Partner', '2020-06-16 14:29:09', '2020-06-16 14:29:09'),
(46, 'TGP00046', 1, NULL, ';k;', '987654', 'kjjj@hjj.hjh', '2', NULL, NULL, '312', NULL, NULL, NULL, NULL, 'true', NULL, 6, 'New Partner', '2020-06-16 14:30:03', '2020-07-14 14:07:08'),
(47, 'TGIP00047', 2, NULL, 'priya', '08989654855', 'spr@gmail.com', '2271', NULL, NULL, 'pondicherry', NULL, NULL, NULL, NULL, 'true', NULL, 1, 'New Partner', '2020-07-17 13:48:42', '2020-07-17 13:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_details_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `partner_id` int(11) DEFAULT NULL,
  `payment_for` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_amount` varchar(255) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resend_info`
--

CREATE TABLE `resend_info` (
  `resend_info_id` int(11) NOT NULL,
  `partner_id` int(11) DEFAULT NULL,
  `resend_by` int(11) DEFAULT '1',
  `reason` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resend_info`
--

INSERT INTO `resend_info` (`resend_info_id`, `partner_id`, `resend_by`, `reason`, `status`, `created_at`, `modified_at`) VALUES
(1, 1, 1, 'test', 1, '2020-05-29 16:39:48', NULL),
(2, 3, 1, 'test12121', 1, '2020-06-11 06:53:00', NULL),
(3, 39, 1, 'sixty was established in 2009. The core reason that Tsixty started its operations was due to the high demand of skateboarding and extreme sports goods in Iran with almost zero supply. After years of importing foreign ', 1, '2020-06-18 02:54:20', NULL),
(4, 39, 1, 'sixty was established in 2009. The core reason that Tsixty started its operations was due to the high demand of skateboarding and extreme sports goods in Iran with almost zero supply. After years of importing foreign ', 1, '2020-06-18 02:54:44', NULL),
(5, 46, 1, 'reason 1 for tgp00046', 1, '2020-06-22 07:24:34', NULL),
(6, 17, 1, 'test for resend the profile', 1, '2020-06-23 01:28:31', NULL),
(7, 46, 1, 'test', 1, '2020-07-14 14:07:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_details`
--

CREATE TABLE `reservation_details` (
  `reservation_id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `partner_id` int(22) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `reserve_unique_id` varchar(255) DEFAULT NULL,
  `vehicle_reg_no` varchar(255) DEFAULT NULL,
  `vehicle_default_rent` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `door_no` varchar(255) DEFAULT NULL,
  `appartment_name` varchar(255) DEFAULT NULL,
  `street_name` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `license_number` varchar(255) DEFAULT NULL,
  `license_issue_date` varchar(255) DEFAULT NULL,
  `license_issued_country` varchar(255) DEFAULT NULL,
  `for_first_name` varchar(255) DEFAULT NULL,
  `for_last_name` varchar(255) DEFAULT NULL,
  `for_phone` varchar(255) DEFAULT NULL,
  `for_email` varchar(255) DEFAULT NULL,
  `for_door_no` varchar(255) DEFAULT NULL,
  `for_appartname` varchar(255) DEFAULT NULL,
  `for_street_name` varchar(255) DEFAULT NULL,
  `for_city` varchar(255) DEFAULT NULL,
  `for_state` varchar(255) DEFAULT NULL,
  `for_pincode` varchar(255) DEFAULT NULL,
  `pick_up_location_id` int(11) DEFAULT NULL,
  `drop_location_id` int(11) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `addon_values` text,
  `reservation_amount` varchar(255) DEFAULT NULL,
  `paid_amount` varchar(255) DEFAULT NULL,
  `reservation_date` varchar(255) DEFAULT NULL,
  `reserve_through` varchar(255) DEFAULT NULL COMMENT '1=website,2=walking',
  `deposit_amount` varchar(255) DEFAULT NULL,
  `admin_discount` varchar(255) DEFAULT NULL,
  `partner_discount` varchar(255) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `name_of_card` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `cvc_number` int(11) DEFAULT NULL,
  `card_exp_date` varchar(255) DEFAULT NULL,
  `card_exp_year` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1= new, 2= inprogress (stripe), 3= confirmed, 4= reservation_pending, 5= cancel_inprogress, 6= cancelled, 7= trip_pending, 8= trip_closed',
  `trip_status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_details`
--

INSERT INTO `reservation_details` (`reservation_id`, `vehicle_id`, `partner_id`, `customer_id`, `reserve_unique_id`, `vehicle_reg_no`, `vehicle_default_rent`, `first_name`, `last_name`, `phone`, `email`, `dob`, `door_no`, `appartment_name`, `street_name`, `city`, `state`, `country`, `country_code`, `pincode`, `license_number`, `license_issue_date`, `license_issued_country`, `for_first_name`, `for_last_name`, `for_phone`, `for_email`, `for_door_no`, `for_appartname`, `for_street_name`, `for_city`, `for_state`, `for_pincode`, `pick_up_location_id`, `drop_location_id`, `start_date`, `return_date`, `addon_values`, `reservation_amount`, `paid_amount`, `reservation_date`, `reserve_through`, `deposit_amount`, `admin_discount`, `partner_discount`, `discount_id`, `coupon_id`, `name_of_card`, `card_number`, `cvc_number`, `card_exp_date`, `card_exp_year`, `status`, `trip_status`, `created_at`, `modified_at`) VALUES
(14, 2, 17, 10, 'TGR00014', 'ABC2037', '500', 'Ravi', 'kumar', '987654321', 'rav@gmail.com', '2010-07-05', '121', 'fr street name', 'fr apartment', 'paris', NULL, 'France', '605056', '60505', '12456525', '2017-07-3', 'FR', 'Ravi', 'kumar', '987654321', 'rav@gmail.com', '121', 'fr street name', 'fr apartment', 'paris', NULL, '60505', 1, 2, '10-07-2020', '07-07-2020', NULL, '300', NULL, '2020-07-09', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2020-07-09 00:41:43', '2020-07-09 00:41:43'),
(15, 2, 17, 10, 'TGR00015', 'ABC2037', '500', 'Ravi', 'kumar', '987654321', 'rav@gmail.com', '2010-05-4', '4200', '420 street', '420 appartment', 'paris', NULL, 'France', 'c605', '4204', '9876543216549875', '2020-06-6', 'FR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '01-07-2020', '03-07-2020', NULL, '300', NULL, '2020-07-09', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, '2020-07-09 01:26:27', '2020-07-09 01:26:27'),
(16, 2, 17, 11, 'TGR00016', 'ABC2037', '500', 'Ram', 'kumar', '987654321', 'ram@ram.com', '2010-07-05', '13', '13 street', 'appartment', 'paris', NULL, 'France', '5005', '1231313', '98756432102', '2016-05-05', 'TH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '06-07-2020', '06-07-2020', NULL, '150', NULL, '2020-07-09', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, '2020-07-09 05:17:23', '2020-07-09 05:17:23'),
(17, 2, 17, 11, 'TGR00017', 'ABC2037', '500', 'Ram', 'kumar', '987654321', 'ram@ram.com', '2010-07-05', '13', '13 street', 'appartment', 'paris', NULL, 'France', '5005', '1231313', '98756432102', '2016-05-05', 'TH', 'Ram12', 'kumar', '987654321', 'ram@ram.com', '13', '13 street', 'appartment', 'paris', NULL, '1231313', 1, 1, '06-07-2020', '06-07-2020', NULL, '150', NULL, '2020-07-09', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, '2020-07-09 05:17:40', '2020-07-09 05:17:40'),
(18, 2, 17, 14, NULL, 'ABC2037', '500', 'Shakthi', 'raj', '9797979797', 'sakthi@gmail.com', '1997-07-08', '101', 'stephane street', 'anjel apartment', 'paris', NULL, 'France', '50550', '50550', 'LICENNO3334445', '2020-06-10', 'FR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '07-07-2020', '11-07-2020', NULL, '7000', NULL, '2020-07-13', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-13 13:01:44', '2020-07-13 13:01:44'),
(19, 2, 17, 14, NULL, 'ABC2037', '500', 'Shakthi', 'raj', '9797979797', 'sakthi@gmail.com', '1997-07-08', '101', 'stephane street', 'anjel apartment', 'paris', NULL, 'France', '50550', '50550', 'LICENNO3334445', '2020-06-10', 'FR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '07-07-2020', '11-07-2020', NULL, '7000', NULL, '2020-07-13', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-13 13:01:49', '2020-07-13 13:01:49'),
(20, 2, 17, 14, NULL, 'ABC2037', '500', 'Shakthi', 'raj', '9797979797', 'sakthi@gmail.com', '1997-07-08', '101', 'stephane street', 'anjel apartment', 'paris', NULL, 'France', '50550', '50550', 'LICENNO3334445', '2020-06-10', 'FR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '07-07-2020', '11-07-2020', NULL, '7000', NULL, '2020-07-13', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-13 13:02:12', '2020-07-13 13:02:12'),
(21, 2, 17, 14, NULL, 'ABC2037', '500', 'Shakthi', 'raj', '9797979797', 'sakthi@gmail.com', '1997-07-08', '101', 'stephane street', 'anjel apartment', 'paris', NULL, 'France', '50550', '50550', 'LICENNO3334445', '2020-06-10', 'FR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '07-07-2020', '11-07-2020', NULL, '7000', NULL, '2020-07-13', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-13 13:02:27', '2020-07-13 13:02:27'),
(22, 2, 17, 14, 'TGR00022', 'ABC2037', '500', 'Shakthi', 'raj', '9797979797', 'sakthi@gmail.com', '1997-07-08', '101', 'stephane street', 'anjel apartment', 'paris', NULL, 'France', '50550', '50550', 'LICENNO3334445', '2020-06-10', 'FR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '07-07-2020', '11-07-2020', NULL, '7000', NULL, '2020-07-13', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-13 13:03:43', '2020-07-13 13:03:43'),
(23, 2, 17, 14, 'TGR00023', 'ABC2037', '500', 'Shakthi', 'raj', '9797979797', 'sakthi@gmail.com', '1997-07-08', '101', 'stephane street', 'anjel apartment', 'paris', NULL, 'France', '50550', '50550', 'LICENNO3334445', '2020-06-10', 'FR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '07-07-2020', '11-07-2020', NULL, '7000', NULL, '2020-07-13 ', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-13 13:08:06', '2020-07-13 13:08:06'),
(24, 2, 17, 14, 'TGR00024', 'ABC2037', '500', 'Shakthi', 'kumar', '9797979797', 'sakthikumar@gmail.com', '1997-06-01', '120', 'ss street', 'gabilo appartment', 'paris', NULL, 'France', '505005', '505005', 'LICEN1114442', '2020-07-01', 'FR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '13-07-2020', '17-07-2020', NULL, '7000', NULL, '2020-07-13', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-13 13:15:38', '2020-07-13 13:15:38'),
(29, 2, 17, 16, 'TGR00029', 'ABC2037', '500', 'Ragavan', 'IPS', '+919500700240', 'vinothan1@coralmint.in', '1999-06-15', '120', 'testing', 'branding', 'paris', NULL, 'France', '505005', '505005', '125869750sf', '2020-07-09', 'FI', 'Ragavan', 'IPS', '+919500700240', 'vinothan1@coralmint.in', '120', 'testing', 'branding', 'paris', NULL, '505005', 1, 1, '20-07-2020', '21-07-2020', NULL, '3000', NULL, '2020-07-14', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-14 02:01:52', '2020-07-14 02:01:52'),
(30, 2, 17, 19, 'TGR00030', 'ABC2037', '500', 'Kamatchi', 'saravanan', '9488567762', 'kamatchi@gmail.com', '2000-01-07', '3', 'kollidam', 'kavary', 'kollidam', NULL, 'France', '200500', '609100', '403lici', '2006-05-15', 'IN', 'Kamatchi', 'saravanan', '9488567762', 'kamatchi@gmail.com', '3', 'kollidam', 'kavary', 'kollidam', NULL, '609102', 2, 3, '22-07-2020', '29-07-2020', NULL, '13000', NULL, '2020-07-15', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-15 06:51:25', '2020-07-15 06:51:25'),
(31, 2, 17, 20, 'TGR00031', 'ABC2037', '500', 'Bhavithra', 'cfg', '9884226884', 'bhavithra.t1@gmail.com', '2005-04-01', '12', 'qwe', 'qwe', 'qwe', NULL, 'France', 'cfvhg', 'qwe', '1231231', '2019-07-01', 'AZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '30-07-2020', '31-07-2020', NULL, '2000', NULL, '2020-07-16', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-16 04:02:12', '2020-07-16 04:02:12'),
(32, 2, 17, 16, 'TGR00032', 'ABC2037', '500', 'Bhavithra', 'T', '+919884226884', 'vinothan1@coralmint.in', '2000-06-02', '13', 'jc street', 'smith apartment', 'paris', NULL, 'France', '500505', '505005', '550004525445465', '2020-04-05', 'IN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '18-07-2020', '19-07-2020', NULL, '3000', NULL, '2020-07-16', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-16 04:12:35', '2020-07-16 04:12:35'),
(33, 2, 17, 16, 'TGR00033', 'ABC2037', '500', 'Bhavithra', 'T', '+919884226884', 'vinothan1@coralmint.in', '2000-06-02', '13', 'jc street', 'smith apartment', 'paris', NULL, 'France', '500505', '505005', '550004525445465', '2020-04-05', 'IN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '18-07-2020', '19-07-2020', NULL, '3000', NULL, '2020-07-16', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-16 04:13:34', '2020-07-16 04:13:34'),
(34, 2, 17, 16, 'TGR00034', 'ABC2037', '500', 'Bhavithra', 'T', '+919884226884', 'vinothan1@coralmint.in', '1999-04-03', '13', 'JC street', 'smith apartment', 'paris', NULL, 'France', '500505', '505005', 'LICENCE12121121212', '2020-06-02', 'IN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '03-08-2020', '04-08-2020', NULL, '3000', NULL, '2020-07-16', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-16 04:55:56', '2020-07-16 04:55:56'),
(35, 2, 17, 16, 'TGR00035', 'ABC2037', '500', 'Bhavithra', 'T', '+919884226884', 'vinothan1@coralmint.in', '1999-04-03', '13', 'JC street', 'smith apartment', 'paris', NULL, 'France', '500505', '505005', 'LICENCE12121121212', '2020-06-02', 'IN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '03-08-2020', '04-08-2020', NULL, '3000', NULL, '2020-07-16', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-16 04:56:02', '2020-07-16 04:56:02'),
(36, 2, 17, 16, 'TGR00036', 'ABC2037', '500', 'Bhavithra', 'T', '+919884226884', 'vinothan1@coralmint.in', '1999-04-03', '13', 'JC street', 'smith apartment', 'paris', NULL, 'France', '500505', '505005', 'LICENCE12121121212', '2020-06-02', 'IN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '03-08-2020', '04-08-2020', NULL, '3000', NULL, '2020-07-16', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-16 04:56:47', '2020-07-16 04:56:47'),
(37, 2, 17, 16, 'TGR00037', 'ABC2037', '500', 'Bhavithra', 't', '+919597006865', 'vinothan1@coralmint.in', '2010-06-01', '13', 'abc st', 'abc apartment', 'paris', NULL, 'France', '56456456', '505005', '456456464564456456', '2020-06-01', 'FR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '12-07-2020', '12-07-2020', NULL, '1000', NULL, '2020-07-16', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-16 11:40:28', '2020-07-16 11:40:28'),
(38, 2, 17, 16, 'TGR00038', 'ABC2037', '500', 'Bhavithra', 't', '+919597006865', 'vinothan1@coralmint.in', '2010-06-02', '130', 'abc st', 'abc apartment', 'paris', NULL, 'France', '56456456', '505005', '456456464564456456', '2020-06-01', 'FR', 'Bhavithra', 'T', '+919597006865', 'vinothan1@coralmint.in', '130', 'abc st', 'abc apartment', 'paris', NULL, '505005', 1, 1, '12-07-2020', '12-07-2020', NULL, '1000', NULL, '2020-07-16', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-16 11:52:16', '2020-07-16 11:52:16'),
(39, 2, 17, 22, NULL, 'ABC2037', '500', 'Maxtest', 'test', '2665895422', 'maxtest@gmail.com', '1993-06-22', '2', 'hi', '5', 'hicity', NULL, 'France', '0077006', '022', 'licki02686', '2004-10-19', 'France', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '05-07-2020', '13-08-2020', NULL, '16000', NULL, '2020-07-17', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-17 06:45:57', '2020-07-17 06:45:57'),
(40, 2, 17, 22, NULL, 'ABC2037', '500', 'Maxtest', 'test', '2665895422', 'maxtest@gmail.com', '1993-06-22', '2', 'hi', '5', 'hicity', NULL, 'France', '0077006', '022', 'licki02686', '2004-10-19', 'France', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '05-07-2020', '13-08-2020', NULL, '16000', NULL, '2020-07-17', '1', '500', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-17 06:47:37', '2020-07-17 06:47:37'),
(41, 2, 17, 22, NULL, 'ABC2037', '500', 'Maxtest', 'test', '2665895422', 'maxtest@gmail.com', '1993-06-22', '2', 'hi', '5', 'hicity', NULL, 'France', '0077006', '022', 'licki02686', '2004-10-19', 'France', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '05-07-2020', '13-08-2020', NULL, '16000', NULL, '2020-07-17', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-17 06:48:42', '2020-07-17 06:48:42'),
(42, 2, 17, 22, NULL, 'ABC2037', '500', 'Maxtest', 'test', '2665895422', 'maxtest@gmail.com', '1993-06-22', '2', 'hi', '5', 'hicity', NULL, 'France', '0077006', '022', 'licki02686', '2004-10-19', 'France', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '05-07-2020', '13-08-2020', NULL, '16000', NULL, '2020-07-17', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-17 06:49:04', '2020-07-17 06:49:04'),
(43, 2, 17, 22, NULL, 'ABC2037', '500', 'Maxtest', 'test', '2665895422', 'maxtest@gmail.com', '1993-06-22', '2', 'hi', '5', 'hicity', NULL, 'France', '0077006', '022', 'licki02686', '2004-10-19', 'France', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '05-07-2020', '13-08-2020', NULL, '16000', NULL, '2020-07-17', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-17 06:50:24', '2020-07-17 06:50:24'),
(44, 2, 17, 22, NULL, 'ABC2037', '500', 'Maxtest', 'test', '2665895422', 'maxtest@gmail.com', '1993-06-22', '2', 'hi', '5', 'hicity', NULL, 'France', '0077006', '022', 'licki02686', '2004-10-19', 'France', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '05-07-2020', '13-08-2020', NULL, '16000', NULL, '2020-07-17', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-17 06:51:23', '2020-07-17 06:51:23'),
(45, 2, 17, 17, NULL, 'ABC2037', '500', 'makeit', 'make', '8220696863', 'makeit@gmail.com', '2013-04-06', '5', 'making', 'makes', 'maked', NULL, 'France', '203658', 'maker', 'wow2827627', '2013-05-05', 'India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, '20-08-2020', '25-08-2020', NULL, '9000', NULL, '2020-07-17', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-17 10:32:43', '2020-07-17 10:32:43'),
(46, 2, 17, 16, NULL, 'ABC2037', '500', 'Bhavithra', 'T', '+919884226884', 'vinothan1@coralmint.in', '2015-02-01', '21', 'abc street', 'abc apartment', 'paris', NULL, 'France', '505005', '505556', 'LIC987687987', '2020-03-01', 'French Polynesia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '04-07-2020', '04-07-2020', NULL, '1000', NULL, '2020-07-17', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-17 13:19:48', '2020-07-17 13:19:48'),
(47, 2, 17, 23, NULL, 'ABC2037', '500', 'Exam', 'fear', '9586756955', 'exam@gmail.com', '2015-04-14', '2a', 'examss', 'exam', 'query', NULL, 'France', '26546', '56s6s6', 'efdfds146', '2011-05-05', 'American Samoa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, '14-08-2020', '27-08-2020', NULL, '23000', NULL, '2020-07-20', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-20 07:53:54', '2020-07-20 07:53:54'),
(48, 2, 17, 23, NULL, 'ABC2037', '500', 'Exam', 'fear', '9586756955', 'exam@gmail.com', '2015-04-14', '2a', 'examss', 'exam', 'query', NULL, 'France', '26546', '56s6s6', 'efdfds146', '2011-05-05', 'American Samoa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, '14-08-2020', '27-08-2020', NULL, '23000', NULL, '2020-07-20', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-20 08:03:24', '2020-07-20 08:03:24'),
(56, 2, 17, 16, NULL, 'ABC2037', NULL, 'Bhavithra', 'uv', '+919884226884', 'vinothan1@coralmint.in', '2003-06-16', '04', 'uvstreet', 'uvapart', 'uvcity', NULL, 'France', 'uv1253', 'uv042', 'hgghksdgsahg321', '2014-05-09', 'Country of issue', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, '28-08-2020', '31-08-2020', NULL, '5000', NULL, '2020-07-31', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-07-31 08:59:24', '2020-07-31 08:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_line_item`
--

CREATE TABLE `reservation_line_item` (
  `reservation_line_item_id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `no_of_person` varchar(255) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `addon_values` text,
  `vehicle_color` varchar(255) DEFAULT NULL,
  `vehicle_type` varchar(255) DEFAULT NULL,
  `vehicle_model` varchar(255) DEFAULT NULL,
  `vehicle_brand` varchar(255) DEFAULT NULL,
  `fuel_type` varchar(255) DEFAULT NULL,
  `driving_type` varchar(255) DEFAULT NULL,
  `baby_seat` varchar(255) DEFAULT NULL,
  `baby_seat_count` varchar(255) DEFAULT NULL,
  `spare_tyre` varchar(255) DEFAULT NULL,
  `cup_holder` varchar(255) DEFAULT NULL,
  `charger` varchar(255) DEFAULT NULL,
  `ac` varchar(255) DEFAULT NULL,
  `sun_roof` varchar(255) DEFAULT NULL,
  `no_of_seat` varchar(255) DEFAULT NULL,
  `rate_per_hour` varchar(255) DEFAULT NULL,
  `pre_running_km` varchar(255) DEFAULT NULL,
  `past_running_km` varchar(255) DEFAULT NULL,
  `pre_description` varchar(255) DEFAULT NULL,
  `past_description` varchar(255) DEFAULT NULL,
  `driver_name` varchar(255) DEFAULT NULL,
  `driver_phone` varchar(255) DEFAULT NULL,
  `driver_email` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `discount_amount` varchar(255) DEFAULT NULL,
  `admin_remark` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_line_item`
--

INSERT INTO `reservation_line_item` (`reservation_line_item_id`, `reservation_id`, `start_date`, `return_date`, `no_of_person`, `vehicle_id`, `addon_values`, `vehicle_color`, `vehicle_type`, `vehicle_model`, `vehicle_brand`, `fuel_type`, `driving_type`, `baby_seat`, `baby_seat_count`, `spare_tyre`, `cup_holder`, `charger`, `ac`, `sun_roof`, `no_of_seat`, `rate_per_hour`, `pre_running_km`, `past_running_km`, `pre_description`, `past_description`, `driver_name`, `driver_phone`, `driver_email`, `total_amount`, `discount_amount`, `admin_remark`, `status`, `created_at`, `modified_at`) VALUES
(1, 22, '07-07-2020', '11-07-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-13 13:03:43', '2020-07-13 13:03:43'),
(2, 23, '07-07-2020', '11-07-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-13 13:08:06', '2020-07-13 13:08:06'),
(3, 24, '13-07-2020', '17-07-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-13 13:15:38', '2020-07-13 13:15:38'),
(8, 29, '20-07-2020', '21-07-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-14 02:01:52', '2020-07-14 02:01:52'),
(9, 30, '22-07-2020', '29-07-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-15 06:51:25', '2020-07-15 06:51:25'),
(10, 31, '22-07-2020', '29-07-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-15 06:52:00', '2020-07-15 06:52:00'),
(11, 31, '30-07-2020', '31-07-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-16 04:02:12', '2020-07-16 04:02:12'),
(12, 32, '18-07-2020', '19-07-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-16 04:12:35', '2020-07-16 04:12:35'),
(13, 33, '18-07-2020', '19-07-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-16 04:13:34', '2020-07-16 04:13:34'),
(14, 34, '03-08-2020', '04-08-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-16 04:55:56', '2020-07-16 04:55:56'),
(15, 35, '03-08-2020', '04-08-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-16 04:56:02', '2020-07-16 04:56:02'),
(16, 36, '03-08-2020', '04-08-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-16 04:56:47', '2020-07-16 04:56:47'),
(17, 37, '12-07-2020', '12-07-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-16 11:40:28', '2020-07-16 11:40:28'),
(18, 38, '12-07-2020', '12-07-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-16 11:52:16', '2020-07-16 11:52:16'),
(19, 1, '05-07-2020', '13-08-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-17 06:51:23', '2020-07-17 06:51:23'),
(20, 2, '20-08-2020', '25-08-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-17 10:32:43', '2020-07-17 10:32:43'),
(21, 4, '04-07-2020', '04-07-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-17 13:19:48', '2020-07-17 13:19:48'),
(22, 5, '28-08-2020', '31-08-2020', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-07-31 08:59:24', '2020-07-31 08:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `google_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL COMMENT '1= admin; 2= partner; 3= customer',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `name`, `email`, `password`, `remember_token`, `user_id`, `role`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Coralmint-admin', 'admin@coralmint.in', '$2y$10$Y2VgKvTFNSrfwKOW.LUJKOlAyOBGjmRD89ep8aE1dxrHKVJB/8sie', '80KXgNcBfhqbvne3VakhobSOMqfuPn6x8vdGOFI4ZXW0kctYyN20CKDF3Iuj', NULL, 1, '2020-05-18 07:17:50', '2020-05-18 07:17:50'),
(2, NULL, 'vinoth', '11vinoth@coralmint.in', '$2y$10$eppgpOyuP2fjMuE3l7QNsO7/4QRzyan9TGJ5clTDS70IrlJG7Wj6W', 'E9bHqBIv4boHbTTFeIbEXJ8QIWHLXOgbllsnjZlolPQtFHtDwwCR6PBMyLUq', NULL, 2, '2020-05-18 07:23:14', '2020-05-18 08:09:17'),
(3, NULL, 'leelatest', 'leela@coralmnt.in', '$2y$10$zs/lQDDHkaxE3P72Y85OWeTBnv/q.v1pITSQcFexJI.x3mHCLmBZi', NULL, 7, 2, '2020-05-21 12:23:02', NULL),
(4, NULL, 'Vinoth', 'vinoth@coralmint.in', '$2y$10$vqOzx4smnZQCFALwmCNOnuaQyHm89wtsSiCDGC/rZfiQK6TpYBg6K', '15YNhKMLpehgsFeheo3ETgAMMtwariPw73jmzwCdTY9T0Ka88f012kRlr68z', 17, 2, '2020-05-21 13:21:34', NULL),
(5, NULL, 'coralmint', 'nancy2012.n@gmail.co', '$2y$10$5zq8kv1LzeaYyTB0FE8rsOpFzk.0U1JseWNyw1u/8/L3Xuna/2Plu', NULL, 30, 2, '2020-05-30 00:02:49', NULL),
(6, NULL, 'sujee', 'nancy2012.n@gmail.com', '$2y$10$OUOEO3eV8UiBLAgE5cTf5eqQVrKec1w8ReAgOsYyA/H4iC0gGVgIm', NULL, 31, 2, '2020-05-30 03:06:11', NULL),
(7, NULL, 'coralmint', 'sujanancy@gmail.co', '$2y$10$eFaRyUfodLvKiquqDZiOcOIieOxrfZIUXK5JdLJdG7aqiCmoBf53y', NULL, 21, 2, '2020-05-30 03:07:17', NULL),
(8, NULL, 'vinoth', 'vicky@gmail.com', '$2y$10$tlYK/2orpg3TgcV9Dv2hjO9VGPNDnGRl93fYMyMGXshJTwigEdXie', NULL, 2, 2, '2020-06-03 10:41:10', NULL),
(9, NULL, 'Vikram Jothi Aroul Jothi', 'meenatchi3meenu@gmail.com', '$2y$10$.XK4I0b5a1Ns4r/ozDcbpuuRnFxaH5UwO41UMgeIXk3hDtGvpZEH6', NULL, 3, 2, '2020-06-03 10:41:41', NULL),
(10, NULL, 'amurudha', 'amurudha97@gmail.com', '$2y$10$k92Gyl.4weseM6.WF76EGOPgd9ZUYxxYnlt/e8kpZ1quD06uluSli', NULL, 32, 2, '2020-06-03 10:45:00', NULL),
(11, NULL, 'coralmint technology solutions', 'jenitha@coralmint.in', '$2y$10$7m4q3JXDc3s6tLR9C7lG7e5XcPETrlC3jPdqMUuY5Gk8.V1VbA3pu', NULL, 25, 2, '2020-06-09 14:21:13', NULL),
(12, NULL, 'Nancy suja', 'sujanancy@gmail.com', '$2y$10$I4kIFkai3haiR9ZrQnUptu2eH2dsx1iQn02j3Ck8vlbV//j21NUz6', NULL, 20, 2, '2020-06-11 02:45:48', NULL),
(13, NULL, 'avms', 'vignesh1@coralmint.in', '$2y$10$uc64b2J/yTbI29oN9xTCN.CJ5FOOqqdsyxsSLoICIGCo.776dfUpS', 'hyBz6qWAyfdGdbtpp2mnL1p5VZtcaaD8xYQOXEEnBYshp3G0Rpf1N58HI9kf', 35, 2, '2020-06-11 06:03:32', NULL),
(14, NULL, 'meena', 'vigensh2676@gmail.com', '$2y$10$aEq6DlxCq0yvvUJ6wlkq8uQIxMkRJwPRDjnQUbe0/JwY5fZxxxYOe', 'vt3icTazKfSlcH42vFqIluSLAwbhnjHLnly3ppS4bjGNLasE5dxFH5qdMkq3', 36, 2, '2020-06-11 06:55:27', NULL),
(15, NULL, 'siva', 'siva@gmail.com', '$2y$10$qPlD8Jf/1WOunHA2NTU/duRi/VYA9rDBBpRHRwqkYhxMeXt0CQk4y', NULL, 37, 2, '2020-06-12 03:53:15', NULL),
(16, NULL, 'coralmint', 'josapathyuvi@gmail.com', '$2y$10$/9SzXG48kge0Tghy16gkA.QFcUuOxPQgVXlDOzyK538AC.WHfWZHO', NULL, 40, 2, '2020-06-16 00:40:18', NULL),
(17, NULL, 'pluselve Technology Solutions', 'syletjenitha19@gmail.com', '$2y$10$s1.cI3X9zNmsWESNeGA3U.Dqv1bei9LloMrKTLiWJ69j/NO741fe2', NULL, 26, 2, '2020-06-16 00:45:04', NULL),
(18, NULL, 'rajesh', 'rajesh@gmail.com', '$2y$10$AG3trbo3FdlK.5O8J9t5H.PKhWdR/y5BgjXeIPWFlgauQvY3JGoz.', NULL, 42, 2, '2020-06-17 01:51:06', NULL),
(19, NULL, ';k;', 'kjjj@hjj.hjh', '$2y$10$ZS0acBbn/3vm.0riS1NdEuw8qG/NBnRu6odcp9FrT3AQeW1bfE5T6', NULL, 46, 2, '2020-06-18 02:55:38', NULL),
(20, NULL, 'rajesh', 'rajesh112@gmail.com', '$2y$10$0MRzQJ4wulaWXLLDxvSZle6cFmZlwyBQa/AyNJhHOwc0XTQ28BgvK', NULL, 43, 2, '2020-06-18 02:57:03', NULL),
(21, NULL, 'coralmint', 'sujanancy', '$2y$10$xMcY41HAh01HUnWTruztGOlL/87nxE9WjBCrbpHMygwr17pQUaj2u', NULL, 41, 2, '2020-06-18 02:57:27', NULL),
(22, NULL, 'Ram', 'ram@gmail.com', '$2y$10$6LMSF8dzH7OeUOOL49HDnOVZfTrL0RLoj7WF/lOkQC/QhSewNUZBm', NULL, 16, 2, '2020-06-18 02:58:49', NULL),
(23, NULL, 'leelatest', 'vignesh@coralmint.in', '$2y$10$LYvhDme8Wwja8AzBIdzo7.cen6PXQgBbhTkEit7nc7C3WZgJ.NNG2', NULL, 2, 3, '2020-06-30 12:17:27', NULL),
(24, NULL, 'priya', 'priya@gmail.com', '$2y$10$z6SigLcMVwLdYN6Z75ndWuxAIB.RpasuBJ15YqTDYMVy2d1vdC20e', NULL, 4, 3, '2020-07-03 06:57:13', NULL),
(25, NULL, 'Shakthi', 'sakthi@gmail.com', '$2y$10$ARwk3CIzprSPN1hoFbyD..19m9Ljzpj3gC.1HovDJHv/a.ShTdPhi', NULL, 14, 3, '2020-07-13 13:03:44', NULL),
(26, NULL, 'Shakthi', 'sakthikumar@gmail.com', '$2y$10$w1z.dHIhmoDwBl29Xwtur.qO3xI4fTN51JX7/.6RcAXEWA5eBe7SG', NULL, 14, 3, '2020-07-13 13:15:39', NULL),
(30, NULL, 'Ragavan', 'vinothan1@coralmint.in', '$2y$10$JwJ2YgqdrbrurYlR5TSqousVfqcO.05p7LuopBXXQqz3zNOckXhai', 'qTBGFkuBmF4GZFgJyBOIBwdiMjIkAojYFM8I5ROrkntg4loRIng3mbNJMChZ', 16, 3, '2020-07-14 02:01:52', NULL),
(31, NULL, 'Kamatchi', 'kamatchi@gmail.com', '$2y$10$KIkwRhiwiXYlMbh2FTIL1efHpQC8wfbLJue25yHlBEprEDMYeUg.m', NULL, 19, 3, '2020-07-15 06:51:25', NULL),
(32, NULL, 'Bhavithra', 'bhavithra.t1@gmail.com', '$2y$10$8Qbh8WHC/97rfSkbp.NdcOLjwhVxe3DohndEIkI2xTLfnBh.gg7P2', NULL, 20, 3, '2020-07-16 04:02:12', NULL),
(33, NULL, 'Maxtest', 'maxtest@gmail.com', '$2y$10$vTi6kP0kEmOxB5wecD0y7e2JTSs4nKrR.Wj.LeWixwLLCZV7NWJRO', NULL, 22, 3, '2020-07-17 06:51:23', NULL),
(34, NULL, 'makeit', 'makeit@gmail.com', '$2y$10$bcPC3c7uAyCc4uo3EMOCVehWiBBzcO2PlQ5Pe3uegGGZkD4HhCxfC', NULL, 17, 3, '2020-07-17 10:32:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `vehicle_id` int(11) NOT NULL,
  `partner_id` int(11) DEFAULT NULL,
  `vehicle_model` varchar(255) DEFAULT NULL,
  `vehicle_brand` int(11) DEFAULT NULL,
  `vehicle_reg_no` varchar(255) DEFAULT NULL,
  `vehicle_reg_year` varchar(255) DEFAULT NULL,
  `vehicle_insurance` varchar(255) DEFAULT NULL,
  `vehicle_fc_date` varchar(255) DEFAULT NULL,
  `default_rent` varchar(255) DEFAULT NULL,
  `rent_for` int(11) DEFAULT NULL COMMENT '1= rate_per_km 2= rate_per_hr ',
  `vehicle_type` int(11) DEFAULT NULL,
  `vehicle_color` int(11) DEFAULT NULL,
  `vehicle_ac_type` int(11) DEFAULT NULL,
  `vehicle_seat_type` int(11) DEFAULT NULL,
  `vehicle_fuel_type` int(11) DEFAULT NULL,
  `vehicle_driving_type` int(11) DEFAULT NULL,
  `vehicle_running_km` varchar(255) DEFAULT NULL,
  `vehicle_seat_count` int(11) DEFAULT NULL,
  `vehicle_max_speed` varchar(255) DEFAULT NULL,
  `vehicle_condition` text,
  `available_status` int(11) DEFAULT '1' COMMENT '1 = available, 2 = blocked',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 = published , 2 unpublished,  0= delete ',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`vehicle_id`, `partner_id`, `vehicle_model`, `vehicle_brand`, `vehicle_reg_no`, `vehicle_reg_year`, `vehicle_insurance`, `vehicle_fc_date`, `default_rent`, `rent_for`, `vehicle_type`, `vehicle_color`, `vehicle_ac_type`, `vehicle_seat_type`, `vehicle_fuel_type`, `vehicle_driving_type`, `vehicle_running_km`, `vehicle_seat_count`, `vehicle_max_speed`, `vehicle_condition`, `available_status`, `status`, `created_at`, `modified_at`) VALUES
(1, 17, 'gdfbf', 11, '67875ryt', '2025', '2020/05/28', '2020-05-23', '100', 1, 56, 8, 1, 14, 20, 22, '17800', 18, '180', 'Brand news good', 2, 1, '2020-05-23 13:27:51', '2020-06-27 00:30:05'),
(2, 17, 'Baleno', 9, 'ABC2037', '2020-01-02', NULL, NULL, '500', 1, 56, NULL, 1, 14, NULL, 22, '50000', 17, '150', 'Brand new', 1, 1, '2020-05-23 13:40:14', '2020-06-09 11:03:06'),
(3, 17, 'Q3', 10, 'ABC-007', '2020-01-01', NULL, NULL, '200', NULL, 57, 5, 1, 14, 19, 22, '20000', 16, '200', 'new', 1, 1, '2020-05-23 13:48:56', '2020-05-23 13:48:56'),
(13, 17, 'Toyota', 10, '798654', '2020-05-26', NULL, NULL, '250', NULL, 56, 5, 1, 13, 19, 22, '100', 16, '200', '54', 1, 1, '2020-05-26 04:31:03', '2020-05-26 04:31:03'),
(12, 17, 'kjhk', 9, 'hkh', '2019-11-30', NULL, NULL, '200', NULL, 58, 6, 1, 14, 20, 22, 'kjlj', 17, 'kljkj', 'kjhkj', 2, 1, '2020-05-26 04:28:02', '2020-05-26 04:28:02'),
(11, 17, 'jghj', 10, 'hjkjh', '2019-11-30', NULL, NULL, '250', NULL, 56, 6, 2, 14, 20, 23, '654556', 17, '5464564', '545 fdesc', 2, 1, '2020-05-26 01:23:12', '2020-05-26 01:23:12'),
(10, 17, 'jghj', 10, 'hjkjh', '2019-11-30', NULL, NULL, '300', NULL, 59, 6, 2, 14, 20, 23, '654556', 17, '5464564', '545 fdesc', 2, 1, '2020-05-26 01:22:46', '2020-05-26 01:22:46'),
(14, 17, '211', 10, '21', '2020-05-05', NULL, NULL, '200', NULL, 59, 5, 1, 13, 19, 22, '545', 16, '546', '65', 1, 1, '2020-05-26 04:33:23', '2020-05-26 04:33:23'),
(15, 17, 'jhkh', 10, 'kjhkjh', '2020-12-30', NULL, NULL, '120', NULL, 59, 8, 2, 13, 20, 23, 'ghkjghh', 17, 'kjghjg', 'jhkkjhk', 2, 1, '2020-05-26 06:19:57', '2020-05-26 06:19:57'),
(18, 17, '55', 10, '555', NULL, NULL, NULL, '200', NULL, 59, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, 1, 1, '2020-05-26 06:48:44', '2020-05-26 06:48:44'),
(19, 17, '5445', 9, '656', NULL, NULL, NULL, '200', NULL, 59, NULL, NULL, NULL, NULL, 23, NULL, NULL, NULL, NULL, 1, 1, '2020-05-26 06:50:54', '2020-05-26 06:50:54'),
(20, 17, '454', 10, '5454', NULL, NULL, NULL, '200', NULL, 56, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, 1, 1, '2020-05-26 06:56:24', '2020-05-26 06:56:24'),
(21, 17, 'fgh', 11, 'fgh', NULL, NULL, NULL, '200', NULL, 57, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, 1, 1, '2020-05-26 10:11:32', '2020-05-26 10:11:32'),
(22, 17, 'honda city', 11, 'fgh', NULL, NULL, NULL, '200', NULL, 59, NULL, NULL, NULL, NULL, 22, NULL, 6, NULL, NULL, 1, 1, '2020-05-26 10:13:21', '2020-05-26 10:13:21'),
(23, 17, 'dfgkjh', 10, 'kjhk', NULL, NULL, NULL, '200', NULL, 56, NULL, NULL, NULL, NULL, 23, NULL, NULL, NULL, NULL, 1, 1, '2020-05-26 10:17:22', '2020-05-26 10:17:22'),
(24, 17, 'maruti', 11, '98908', NULL, NULL, NULL, '200', NULL, 56, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, 1, 1, '2020-05-26 11:24:49', '2020-05-26 11:24:49'),
(25, 17, 'maruti', 11, '98908', NULL, NULL, NULL, '200', NULL, 59, NULL, NULL, NULL, NULL, 23, NULL, NULL, NULL, NULL, 1, 1, '2020-05-26 11:24:49', '2020-05-26 11:24:49'),
(26, 17, 'WagonR', 9, 'AQwer12', NULL, NULL, NULL, '200', NULL, 58, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, 1, 1, '2020-05-27 03:55:37', '2020-05-27 03:55:37'),
(27, 17, 'ama', 12, '9587', NULL, NULL, NULL, '200', NULL, 59, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, 1, 1, '2020-05-27 07:48:49', '2020-05-27 07:48:49'),
(30, 1, 'amaze', 10, '9587', NULL, NULL, NULL, '200', NULL, 58, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, 1, 1, '2020-05-28 06:47:15', '2020-05-28 06:47:15'),
(31, 17, 'indigo', 11, '2525', NULL, NULL, NULL, '200', NULL, 56, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, 1, 1, '2020-05-29 06:28:49', '2020-05-29 06:28:49'),
(32, 2, 'hhhh', 9, 'hhh123', NULL, NULL, NULL, '200', NULL, 57, NULL, NULL, NULL, NULL, 23, NULL, NULL, NULL, NULL, 1, 1, '2020-05-29 07:11:52', '2020-05-29 07:11:52'),
(33, 2, 'hhh1', 11, '1hhh123', NULL, NULL, NULL, '200', NULL, 57, NULL, NULL, NULL, NULL, 23, NULL, NULL, NULL, NULL, 1, 1, '2020-05-29 07:14:38', '2020-05-29 07:14:38'),
(34, 30, '243r1234', 10, 'weafq3rg', NULL, NULL, NULL, '200', NULL, 58, NULL, NULL, NULL, NULL, 23, NULL, NULL, NULL, NULL, 1, 1, '2020-05-30 02:06:31', '2020-05-30 02:06:31'),
(35, 30, '243r1234', 9, '11111111', NULL, NULL, NULL, '200', NULL, 59, NULL, NULL, NULL, NULL, 23, NULL, NULL, NULL, NULL, 1, 1, '2020-05-30 02:52:33', '2020-05-30 02:52:33'),
(36, 31, '243r1234', 11, '4678579y', NULL, NULL, NULL, '500', NULL, 56, NULL, NULL, NULL, NULL, 23, NULL, NULL, NULL, NULL, 1, 1, '2020-05-30 03:22:49', '2020-05-30 03:22:49'),
(37, 31, 'Group', 9, '12312', NULL, NULL, NULL, '500', NULL, 58, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, 1, 1, '2020-06-01 12:22:42', '2020-06-01 12:22:42'),
(38, 17, 'xuv', 12, '25265', '2020-06-06', '2020-06-13', '2020-06-19', '500', NULL, 57, 5, 1, 13, 20, 23, '258369', 17, '150', 'good', 1, 1, '2020-06-05 05:37:56', '2020-06-05 05:39:17'),
(40, 17, 'tyota', 11, '23435', NULL, NULL, NULL, '500', NULL, 58, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, 1, 1, '2020-06-10 10:48:08', '2020-06-10 10:48:08'),
(41, 17, '869698vjyf', 9, '597585', NULL, NULL, NULL, '500', NULL, 59, NULL, NULL, NULL, NULL, 23, NULL, NULL, NULL, NULL, 1, 1, '2020-06-11 02:32:00', '2020-06-11 02:32:00'),
(42, 20, '346e5bdf', 9, '345346', '2014', '2020/08/19', '2020/07/23', '500', NULL, 59, 5, 1, 13, 20, 22, '1500', 17, '40', 'Safe and secure', 2, 1, '2020-06-11 02:53:18', '2020-06-11 03:14:24'),
(43, 1, 'tyota', 10, '987654', '2019', '2020/06/30', '2020/06/28', '500', NULL, 56, 8, 2, 14, 19, 23, '130', 16, '150', 'good', 2, 1, '2020-06-11 05:16:42', '2020-06-11 05:20:11'),
(44, 35, 'bmw001', 10, 'abs001', '2010', '2020/07/04', '2020/07/25', '200', 1, 56, 5, 1, 14, 19, 23, '2050236', 16, '150', 'good condition', 1, 1, '2020-06-11 06:30:29', '2020-06-11 06:41:51'),
(45, 36, 'bss202', 12, 'py0586', '2011', '2020/06/27', '2020/06/24', '100', 1, 58, 6, 1, 14, 20, 23, '300500', 17, '250', 'nice', 1, 1, '2020-06-11 06:59:03', '2020-06-11 07:02:43'),
(46, 36, 'test from', 10, '123456', '2024', '2020/06/09', '2020/06/30', '500', NULL, 58, 5, 1, 14, 20, 22, '50000', 17, '120', 'desc', 1, 1, '2020-06-11 07:24:30', '2020-06-11 07:25:05'),
(47, 37, 'test renau', 9, '321654', '2024', '2020/06/24', '2020/06/23', '500', NULL, 58, 6, 1, 15, 20, 23, '52000', 18, '250', 'desc', 1, 1, '2020-06-12 03:53:50', '2020-06-12 03:55:35'),
(48, 40, '243r1234', 9, 'weafq3rg', '2005', '2020/06/26', '2020/06/25', '120', 1, 59, 6, 1, 13, 19, 22, '1000', 18, '60', 'cjyhgxjyfg', 1, 1, '2020-06-16 02:10:38', '2020-06-16 03:49:27'),
(49, 17, '123456', 10, 'pyd123456', NULL, NULL, NULL, '500', NULL, 57, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, 1, 1, '2020-06-17 13:19:58', '2020-06-17 13:19:58'),
(50, 46, 'xuv009', 10, 'kuyebjxn', '2014', '2020/07/15', '2020/07/22', NULL, NULL, 57, 8, 2, 13, 20, 23, '5000', 16, '54', 'good', 1, 1, '2020-07-02 07:55:41', '2020-07-15 07:19:40'),
(51, 17, 'nano1', 11, 'nano101', '2018', '2020/12/11', '2020/10/23', '250', 2, 57, 6, 1, 14, 20, 23, '25000', 16, '200', 'very good', 1, 1, '2020-07-13 07:49:46', '2020-07-13 08:10:36'),
(52, 46, 'ASDf', 9, 'AWS23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2020-07-13 11:00:10', '2020-07-13 11:00:10'),
(53, 17, 'Hexa', 11, 'AN-546-SR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2020-07-14 01:05:34', '2020-07-14 01:05:34'),
(54, 46, 'tett', 11, '12233333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2020-07-14 14:38:28', '2020-07-14 14:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_features`
--

CREATE TABLE `vehicle_features` (
  `vehicle_features_id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `features_for` int(255) DEFAULT NULL COMMENT '1 = service; 2 = addons',
  `master_id` int(11) DEFAULT NULL,
  `option_name` varchar(255) DEFAULT NULL,
  `addon_value` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_features`
--

INSERT INTO `vehicle_features` (`vehicle_features_id`, `vehicle_id`, `features_for`, `master_id`, `option_name`, `addon_value`, `status`, `created_at`, `modified_at`) VALUES
(16, 2, 2, NULL, '26', '500', 1, '2020-06-10 06:17:00', '2020-06-10 06:17:00'),
(17, 2, 2, NULL, '27', '100', 1, '2020-06-10 06:17:00', '2020-06-10 06:17:00'),
(19, 44, 2, NULL, '26', '100', 1, '2020-06-11 06:35:18', '2020-06-11 06:35:18'),
(20, 44, 2, NULL, '28', '50', 1, '2020-06-11 06:35:18', '2020-06-11 06:35:18'),
(21, 44, 2, NULL, '32', '500', 1, '2020-06-11 06:35:18', '2020-06-11 06:35:18'),
(22, 44, 1, NULL, '30', NULL, 1, '2020-06-11 06:35:30', '2020-06-11 06:35:30'),
(23, 44, 1, NULL, '33', NULL, 1, '2020-06-11 06:35:48', '2020-06-11 06:35:48'),
(24, 44, 1, NULL, '34', NULL, 1, '2020-06-11 06:36:01', '2020-06-11 06:36:01'),
(25, 45, 2, NULL, '27', '100', 1, '2020-06-11 07:02:13', '2020-06-11 12:09:05'),
(26, 45, 1, NULL, '37', NULL, 1, '2020-06-11 07:02:29', '2020-06-11 07:02:29'),
(28, 48, 2, NULL, '26', '10', 1, '2020-06-16 03:40:34', '2020-06-16 03:43:00'),
(29, 48, 2, NULL, '27', '30', 1, '2020-06-16 03:40:34', '2020-06-16 03:43:00'),
(30, 48, 1, NULL, '55', NULL, 1, '2020-06-17 02:35:51', '2020-06-17 02:35:51'),
(31, 51, 2, NULL, '27', '50', 1, '2020-07-13 07:53:29', '2020-07-13 07:53:29'),
(32, 51, 2, NULL, '29', '100', 1, '2020-07-13 07:53:29', '2020-07-13 07:53:29'),
(33, 51, 2, NULL, '39', '50', 1, '2020-07-13 07:53:29', '2020-07-13 07:53:29'),
(34, 51, 1, NULL, '31', NULL, 1, '2020-07-13 07:53:48', '2020-07-13 07:53:48'),
(35, 53, 2, NULL, '32', '500', 1, '2020-07-14 01:06:13', '2020-07-14 01:06:13'),
(36, 53, 2, NULL, '36', '100', 1, '2020-07-14 01:06:13', '2020-07-14 01:06:13'),
(37, 53, 1, NULL, '55', NULL, 1, '2020-07-14 01:08:16', '2020-07-14 01:08:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_partner_messages`
--
ALTER TABLE `admin_partner_messages`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`bank_detail_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `coupon_details`
--
ALTER TABLE `coupon_details`
  ADD PRIMARY KEY (`coupon_details _id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `document_details`
--
ALTER TABLE `document_details`
  ADD PRIMARY KEY (`document_details_id`);

--
-- Indexes for table `location_master`
--
ALTER TABLE `location_master`
  ADD PRIMARY KEY (`location_master_id`);

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_vehicle_rent`
--
ALTER TABLE `manage_vehicle_rent`
  ADD PRIMARY KEY (`vehicle_manage_id`);

--
-- Indexes for table `master_data`
--
ALTER TABLE `master_data`
  ADD PRIMARY KEY (`master_data_id`);

--
-- Indexes for table `master_data_images`
--
ALTER TABLE `master_data_images`
  ADD PRIMARY KEY (`master_data_images_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_details`
--
ALTER TABLE `partner_details`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_details_id`);

--
-- Indexes for table `resend_info`
--
ALTER TABLE `resend_info`
  ADD PRIMARY KEY (`resend_info_id`);

--
-- Indexes for table `reservation_details`
--
ALTER TABLE `reservation_details`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `reservation_line_item`
--
ALTER TABLE `reservation_line_item`
  ADD PRIMARY KEY (`reservation_line_item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `vehicle_features`
--
ALTER TABLE `vehicle_features`
  ADD PRIMARY KEY (`vehicle_features_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_partner_messages`
--
ALTER TABLE `admin_partner_messages`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `bank_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coupon_details`
--
ALTER TABLE `coupon_details`
  MODIFY `coupon_details _id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `document_details`
--
ALTER TABLE `document_details`
  MODIFY `document_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `location_master`
--
ALTER TABLE `location_master`
  MODIFY `location_master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manage_vehicle_rent`
--
ALTER TABLE `manage_vehicle_rent`
  MODIFY `vehicle_manage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=527;

--
-- AUTO_INCREMENT for table `master_data`
--
ALTER TABLE `master_data`
  MODIFY `master_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `master_data_images`
--
ALTER TABLE `master_data_images`
  MODIFY `master_data_images_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `partner_details`
--
ALTER TABLE `partner_details`
  MODIFY `partner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `payment_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resend_info`
--
ALTER TABLE `resend_info`
  MODIFY `resend_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservation_details`
--
ALTER TABLE `reservation_details`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `reservation_line_item`
--
ALTER TABLE `reservation_line_item`
  MODIFY `reservation_line_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `vehicle_features`
--
ALTER TABLE `vehicle_features`
  MODIFY `vehicle_features_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

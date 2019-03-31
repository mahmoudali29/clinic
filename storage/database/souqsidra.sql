-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 11:00 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `souqsidra`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address_ar` text NOT NULL,
  `address_en` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name_ar`, `name_en`, `email`, `phone`, `address_ar`, `address_en`, `created_at`, `updated_at`) VALUES
(1, 'wildot', '', 'wildot@gmail.com', '0101010', ';lzd;lsdfsdf', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'test', '', 'mamam2', 'dfsdf', 'asdf\r\nsdf\r\n', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'mahmoud ali', 'mahmoud ali', 'mahmoud.ali.29992@gmail.com', '01096615770', '4 mostafa kamel street', '4 mostafa kamel street', '2018-11-03 14:29:13', '2018-11-03 14:29:13'),
(4, 'mahmoud ali', 'mahmoud ali', 'mahmoud.ali.29992@gmail.com', '01096615770', '4 mostafa kamel street', '4 mostafa kamel street', '2018-11-03 14:30:31', '2018-11-03 14:30:31'),
(5, 'loooolo', 'mahmoud ali', 'ahmed.haz@gmail.com', '01096615770', '4 mostafa kamel street', '4 mostafa kamel street', '2018-11-03 14:36:06', '2018-11-03 14:36:06'),
(6, 'محمود محمد', 'mahmoud ali', 'mahmoud.ali.29992@gmail.com', '0190', 'asd asd', 'asdasd', '2018-11-03 14:37:12', '2018-11-03 14:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(34, '2014_10_12_000000_create_users_table', 1),
(35, '2014_10_12_100000_create_password_resets_table', 1),
(36, '2018_07_02_140246_create_TblCategories_table', 1),
(37, '2018_07_02_152300_create_TblProducts_table', 1),
(38, '2018_07_02_160438_create_TblImages_table', 1),
(39, '2018_07_02_161308_create_TblProductRequests_table', 1),
(40, '2018_07_03_130011_create_tbladmins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmins`
--

CREATE TABLE `tbladmins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','staff') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `job_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbladmins`
--

INSERT INTO `tbladmins` (`id`, `name`, `email`, `password`, `type`, `job_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mahmoud', 'mahmoud.ali.29992@gmail.com', '$2y$10$wQ/VVxhYXM.vvrT5oLm2q.sqTflRmhTEggjgUfAUqX.fmVVLuSqbO', 'admin', 6, 'Nt3ElUplHP3Xo322rvMqmWAXKC06gOBXDkOy0SZf0MBVdrjmjqXuh3GCqTBA', '2018-07-07 15:38:36', '2018-07-07 15:38:36'),
(25, 'mahmoud ali1133', 'md@gmail.com', '$2y$10$ZaOFViQiv7ODChd/vkZ5lOyNgv5XERYkd/qGGJELcXjfAkPZK7HYu', 'admin', 6, NULL, '2018-07-15 14:29:38', '2018-07-15 17:58:32'),
(26, 'ashdkljasdl', 'mahmoud.ali.29992@gmail.com11', '$2y$10$ayu3bqh7CklJh8bqQsQAheeLtDttqpK4DEGZpj57TH8zp3jqgUVq.', 'admin', 6, NULL, '2018-07-15 19:11:14', '2018-07-15 19:11:14'),
(27, 'khaled', 'kakljdkasljdk@gmail.com', '$2y$10$r0LL0epD5QubEK3IBtw32.iZnSnnf4d5uXiYQsIqjbRSqaZGopxAK', 'admin', 6, NULL, '2018-07-19 16:37:54', '2018-07-19 16:37:54'),
(28, 'moemen faroq', 'moemenmfarouk@gmail.com', '$2y$10$fkqUmlQi6B4e419..ujSV.hFsYbLcAhg5ndAuo4M8jlh6ygmCrIkW', 'admin', 6, NULL, '2018-09-18 19:20:23', '2018-09-18 19:20:23'),
(29, 'ahmed abdo', 'ahmed.abdo77q@gmail.com', '$2y$10$5ghp2Vd7q9mUoqb1qnKYuukSHsdLsejKfkWlBdzWVQ1.z8Q6rLxjS', 'admin', 6, NULL, '2018-11-03 14:39:09', '2018-11-03 14:39:09'),
(30, 'mohamed-elshaer', 'meid.18126@gmail.com', '$2y$10$gZ/.ACmndvqUucZPCTImEusqJ2iiD6xS7ETIscc04Xds9LygqmVbq', 'admin', 6, 'mrJ32OvWeofXAZt83TOEiUWnu9t3X33Z6tTKgUPSnWNo83ZB8teO65di7Ujm', '2018-11-14 09:47:01', '2018-11-14 09:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategories`
--

CREATE TABLE `tblcategories` (
  `PkCategoryID` int(10) UNSIGNED NOT NULL,
  `FkParentID` int(10) UNSIGNED DEFAULT NULL,
  `StrName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblcategories`
--

INSERT INTO `tblcategories` (`PkCategoryID`, `FkParentID`, `StrName`, `created_at`, `updated_at`) VALUES
(6, NULL, 'apple', '2018-07-08 12:25:58', '2018-07-08 12:25:58'),
(7, NULL, 'samsong', '2018-07-08 12:26:18', '2018-07-08 12:26:18'),
(8, 6, 'iphone', '2018-07-08 12:26:25', '2018-07-08 21:13:33'),
(10, 7, 'note', '2018-07-08 12:26:49', '2018-07-09 14:48:29'),
(11, NULL, 'test', '2018-07-08 22:36:52', '2018-07-08 22:36:52'),
(12, NULL, 'medical closes', '2018-09-18 19:22:27', '2018-09-18 19:22:27'),
(13, 12, 'segikal gown', '2018-09-18 19:22:48', '2018-09-18 19:23:26'),
(14, NULL, 'Syringes', '2018-09-18 20:11:29', '2018-09-18 20:11:29'),
(15, 14, '3 ml syringes', '2018-09-18 20:11:53', '2018-09-18 20:11:53'),
(16, NULL, 'طيور', '2018-11-03 14:43:29', '2018-11-03 14:43:29'),
(17, 16, 'دواجن', '2018-11-03 14:43:44', '2018-11-03 14:43:44'),
(18, 16, 'حمام', '2018-11-03 14:43:57', '2018-11-03 14:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `tblclients`
--

CREATE TABLE `tblclients` (
  `pkClientID` int(10) UNSIGNED NOT NULL,
  `fldName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fldURL` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fldType` enum('client','partner') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblclients`
--

INSERT INTO `tblclients` (`pkClientID`, `fldName`, `fldURL`, `fldType`, `created_at`, `updated_at`) VALUES
(1, 'kareem', 'develober', '', NULL, NULL),
(2, 'mahmoud', 'manager', '', NULL, NULL),
(3, 'mohamed', 'designer', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `pkContactUsID` int(10) UNSIGNED NOT NULL,
  `strEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Full Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intPhone` int(11) NOT NULL,
  `intMobile` int(11) NOT NULL,
  `strAddress1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strAddress2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strMap1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `strMap2` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instgram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`pkContactUsID`, `strEmail`, `Full Name`, `Subject`, `Message`, `intPhone`, `intMobile`, `strAddress1`, `strAddress2`, `strMap1`, `strMap2`, `facebook`, `twitter`, `linkedin`, `youtube`, `instgram`, `created_at`, `updated_at`) VALUES
(1, 'md@gmail.com', '', '', '', 222255566, 1100315970, '25sssssssssssssssssssss', 'test', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d360.27640504310955!2d30.983695334379135!3d30.78731600944031!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7cbde58ffb5f3%3A0x5cd5c5d2c141fda4!2z2KfZhNi02KfYsNmE2Yog2YTZhNin2K_ZiNin2Kog2KfZhNmD2YfYsdio2KfYptmK2Kk!5e0!3m2!1sen!2seg!4v1542146508736\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'link of address2', 'https://www.facebook.com/mahmoud.ali.12979', 'https://www.facebook.com/mahmoud.ali.12979', 'https://www.facebook.com/mahmoud.ali.12979', 'https://www.facebook.com/mahmoud.ali.12979', 'https://www.facebook.com/mahmoud.ali.12979', '2018-07-10 05:29:28', '2018-11-13 20:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaqs`
--

CREATE TABLE `tblfaqs` (
  `pkPageID` int(10) NOT NULL,
  `strQuestionEn` varchar(191) NOT NULL,
  `strQuestionFr` varchar(191) NOT NULL,
  `txtAnswerEn` text NOT NULL,
  `txtAnswerFr` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfaqs`
--

INSERT INTO `tblfaqs` (`pkPageID`, `strQuestionEn`, `strQuestionFr`, `txtAnswerEn`, `txtAnswerFr`, `created_at`, `updated_at`) VALUES
(1, 'Eng Content 1', 'Fr Content 1', 'This is the English content number 1', 'This is the French content number 1', '2018-07-26 11:02:01', '0000-00-00 00:00:00'),
(2, 'Eng Content 2', 'Fr Content 2', 'This is the English content number 2', 'This is the French content number 2', '2018-07-30 21:46:25', '0000-00-00 00:00:00'),
(3, 'Eng Content 3', 'Fr Content 2', 'This is the English content number 3', 'This is the French content number 2', '2018-07-30 21:46:30', '0000-00-00 00:00:00'),
(4, 'Eng Content 4', 'Fr Content 2', 'This is the English content number 4', 'This is the French content number 2', '2018-07-30 21:46:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblfiles`
--

CREATE TABLE `tblfiles` (
  `pkFileID` int(10) UNSIGNED NOT NULL,
  `fkTableID` int(10) UNSIGNED NOT NULL,
  `fldFile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fldTitle` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fldType` enum('product','news','blog','admin','offers') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblfiles`
--

INSERT INTO `tblfiles` (`pkFileID`, `fkTableID`, `fldFile`, `fldTitle`, `fldType`, `created_at`, `updated_at`) VALUES
(7, 10, 'images/admins/TbhgiCRAtS0Dk3H8cY9gWbqmicyXVm0hyqAZXZPa.jpeg', NULL, 'admin', '2018-07-15 13:53:11', '2018-07-15 13:53:11'),
(8, 11, 'images/admins/3pIADtkTlx9hyRgKdT78PSOZwctaTb3Wdl2xwbW4.jpeg', NULL, 'admin', '2018-07-15 14:02:38', '2018-07-15 14:02:38'),
(9, 12, 'images/admins/OFBKSBl0tBPPKR6nMePwlro0uz3W6wt6cYUGVX4A.jpeg', NULL, 'admin', '2018-07-15 14:04:20', '2018-07-15 14:04:20'),
(10, 25, 'images/admins/buaLpGuW0Pey9NzAoH96yJDB1xLNykXe15EGwcVx.jpeg', NULL, 'admin', '2018-07-15 14:29:38', '2018-07-15 17:58:32'),
(11, 26, 'images/admins/7S9GQ6vbcgWY09YjT53A7YktXJyNtPnH2emc5TK9.jpeg', NULL, 'admin', '2018-07-15 19:11:14', '2018-07-15 19:11:14'),
(15, 27, 'images/admins/feNQjqgKRx27p1m00pKOI1VyN7s9Rd4a0VCiYtri.jpeg', NULL, 'admin', '2018-07-19 16:37:55', '2018-07-19 16:37:55'),
(18, 28, 'images/admins/l3ZVxATXyW9a0RklCVpdhriSqbUFx5TWQO9ck0Ph.jpeg', NULL, 'admin', '2018-09-18 19:20:24', '2018-09-18 19:20:24'),
(32, 29, 'images/admins/6V1s7PFyUP3JDX9xl3ny4Sy3hu2j3BBGuLYNxvJf.jpeg', NULL, 'admin', '2018-11-03 14:39:09', '2018-11-03 14:39:09'),
(42, 3, 'images/offers/cmeu3KD1g5bCkW2CwUDCiz39eZEfZaYG7r06MPTd.jpeg', NULL, 'offers', '2018-11-11 22:54:20', '2018-11-11 22:54:20'),
(43, 3, 'images/offers/nkjBZqXdJVcTDKtTLcPzQmOWXr2NdY1F00k8LrWq.jpeg', NULL, 'offers', '2018-11-12 21:37:05', '2018-11-12 21:37:05'),
(45, 5, 'images/offers/LZhmpB1gqEeZpqb8HDQFk95S14ekgSWvbvrHZxcY.jpeg', NULL, 'offers', '2018-11-12 21:46:03', '2018-11-12 21:46:03'),
(46, 8, 'images/offers/TJ0bkeqpsEY3C6lx7bWk50IExOQDnvqdI82cgAsP.jpeg', NULL, 'offers', '2018-11-13 08:48:04', '2018-11-13 08:48:04'),
(48, 4, 'images/offers/VXuLPwmg8QjUXh2w2ZJMCfp58f8b8ftzfDm0gYSS.jpeg', NULL, 'offers', '2018-11-13 08:53:04', '2018-11-13 08:53:04'),
(50, 5, 'images/products/yU9n0O7FbbIzI0AcSN2X7KEyAcF4b3XjZ7AgzxGa.jpeg', NULL, 'product', '2018-11-13 08:55:38', '2018-11-13 08:55:38'),
(53, 3, 'images/products/RbHY824a1WfqujK2zwwkJhy1saYsQQ1X6SOChbTi.jpeg', NULL, 'product', '2018-11-13 15:17:50', '2018-11-13 15:17:50'),
(54, 4, 'images/products/lcCy1hs4d3mP2jQry7U81JfH835PyaIYZslyWWAa.jpeg', NULL, 'product', '2018-11-13 15:18:43', '2018-11-13 15:18:43'),
(56, 1, 'images/news/9VCr4M9roClTF5pyRYdknoVPNzHOG3ygJnacpAkL.jpeg', NULL, 'news', '2018-11-13 15:22:59', '2018-11-13 15:22:59'),
(57, 2, 'images/news/aqtDIuid5oCsmX9n48vyDvbb1pB6pL0TDXtKoauS.jpeg', NULL, 'news', '2018-11-13 15:24:48', '2018-11-13 15:24:48'),
(58, 3, 'images/news/QYsGwABeouAurzK5Qf8kVBbqUzqj0uvrPabbAPyI.jpeg', NULL, 'news', '2018-11-13 15:25:02', '2018-11-13 15:25:02'),
(61, 6, 'images/products/2kw00Wq2MwddBSEOzkNSrpwmLLMjiTCEzzFmKK5Q.jpeg', NULL, 'product', '2018-11-13 16:18:46', '2018-11-13 16:18:46'),
(62, 30, 'images/admins/Ta6OLbCm5euYRE4HTXOJiJ24t5qNKupk8nwyPqL5.jpeg', NULL, 'admin', '2018-11-14 09:47:01', '2018-11-14 09:47:01'),
(63, 2, 'images/products/pm7CGYZJ7AdrkSRz26fq2m1iYFi9CvvLo4ZEXufL.jpeg', NULL, 'product', '2018-11-19 14:13:22', '2018-11-19 14:13:22'),
(64, 7, 'images/products/iuGquEWaIGNZbh4pmvB633kuIgVNAjA0jbXZNQdc.jpeg', NULL, 'product', '2018-11-19 14:13:48', '2018-11-19 14:13:48'),
(65, 2, 'images/products/1VfKvZq5f8vhhm7crK39dtlkSZvaxQwgfFRXE3E1.jpeg', NULL, 'product', '2018-11-19 15:25:11', '2018-11-19 15:25:11'),
(66, 2, 'images/products/utzqeLlzQ6aVDRftN1YLAX4vgeptgw17C6GPZ0MH.jpeg', NULL, 'product', '2018-11-19 15:25:11', '2018-11-19 15:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `tblmessages`
--

CREATE TABLE `tblmessages` (
  `pkMessageID` int(10) UNSIGNED NOT NULL,
  `fldName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fldEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fldSubject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fldPhone` int(11) DEFAULT NULL,
  `fldMessage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblmessages`
--

INSERT INTO `tblmessages` (`pkMessageID`, `fldName`, `fldEmail`, `fldSubject`, `fldPhone`, `fldMessage`, `created_at`, `updated_at`) VALUES
(77, 'mahmoud ali', 'ahmed.haz@gmail.com', 'my name is kareem', 1096615770, 'wewewewewe', '2018-11-18 10:36:36', '2018-11-18 10:36:36'),
(78, 'ahmed haz', 'ahmed.haz@gmail.com', 'hello mahmoud', 1026111280, 'wewewewewe', '2018-11-18 10:37:30', '2018-11-18 10:37:30'),
(79, 'mohamed', 'm.gamalaledaf@gmail.com', 'khkhjkh', 8852522, 'kjhhggfhsgfx', '2018-11-18 12:58:35', '2018-11-18 12:58:35'),
(80, 'mohamed', 'm.gamalaledaf@gmail.com', 'khkhjkh', 885252, 'kjhhggfhsgfx', '2018-11-18 12:59:33', '2018-11-18 12:59:33'),
(81, 'mahmoud ali', 'ahmed.haz@gmail.com', 'hello mahmoud', 1096615770, 'wwwwwwwwwwwww', '2018-11-18 12:59:45', '2018-11-18 12:59:45'),
(82, 'ahmed haz', 'ahmed.haz@gmail.com', 'hello mohamed', 1234555511, 'welcoem', '2018-11-18 13:00:14', '2018-11-18 13:00:14'),
(83, 'mahmoud ali', 'ahmed.haz@gmail.com', 'my name is kareem', 5555555, 'hgjfgyhfhjh', '2018-11-18 13:09:45', '2018-11-18 13:09:45'),
(84, 'mahmoud ali', 'ahmed.haz@gmail.com', 'my name is kareem', 678766, 'gfghkjhnj', '2018-11-18 13:10:01', '2018-11-18 13:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblnews`
--

CREATE TABLE `tblnews` (
  `pkNewsID` int(10) UNSIGNED NOT NULL,
  `fldTitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fldDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fldDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblnews`
--

INSERT INTO `tblnews` (`pkNewsID`, `fldTitle`, `fldDescription`, `fldDate`, `created_at`, `updated_at`) VALUES
(1, 'الاهلى كسب', 'سيبسيبسي', '2018-07-22', '2018-07-22 19:13:47', '2018-07-22 19:13:47'),
(2, 'الاهلي خسر', 'من الترجي 3 هههههه', '0000-00-00', NULL, NULL),
(3, 'برشلونه خسر ', 'من ريال سوسيداد هههههههههههه\r\n', '0000-00-00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbloffers`
--

CREATE TABLE `tbloffers` (
  `pkOfferID` int(11) NOT NULL,
  `fldName` varchar(255) NOT NULL,
  `fldDescription` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbloffers`
--

INSERT INTO `tbloffers` (`pkOfferID`, `fldName`, `fldDescription`, `created_at`, `updated_at`) VALUES
(3, 'Nature close tea', 'Nature close tea   Nature close tea', '2018-11-12 00:53:55', '2018-11-12 00:53:55'),
(4, 'test', 'teas sad', '2018-11-12 01:00:51', '2018-11-12 01:00:51'),
(5, 'fdds ds dfs sd', 'sdf sdf sdf sdf', '2018-11-12 01:01:03', '2018-11-12 01:01:03'),
(7, 'qwewqewqe', 'as dsad as asd', '2018-11-12 01:01:14', '2018-11-12 01:01:14'),
(8, 'food', 'this is aorganic food', '2018-11-13 10:47:40', '2018-11-13 10:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `pkPageID` int(10) UNSIGNED NOT NULL,
  `enumType` enum('about_us','mission','vision') COLLATE utf8mb4_unicode_ci NOT NULL,
  `strContentEn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strContentFr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strKeywordEn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strKeywordFr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txtDescriptionEn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `txtDescriptionFr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`pkPageID`, `enumType`, `strContentEn`, `strContentFr`, `strKeywordEn`, `strKeywordFr`, `txtDescriptionEn`, `txtDescriptionFr`, `created_at`, `updated_at`) VALUES
(1, 'about_us', 'hellow my name is kareem', 'this is the content of about us page in French', 'content page english', 'content page AAAAA', 'this is the content of about us page in English.. this is the content of about us page in English ..this is the content of about us page in English.. this is the content of about us page in English', 'this is the content of about us page in French ..this is the content of about us page in French .. this is the content of about us page in French .. this is the content of about us page in French', '2018-07-09 05:27:37', '2018-11-14 08:31:36'),
(2, 'mission', 'dddddddddddddddddddddd', 'dddddddddddddddddddddd', 'mission english', 'dddddddddddddddddddddd', 'dddddddddddddddddddddd', 'dddddddddddddddddddddd', '2018-07-09 16:38:50', '2018-09-18 20:19:06'),
(3, 'vision', 'this is the content of vision page in English', 'this is the content of vision page in French', 'vision English', 'vision French', 'this is the content of vision page in English.. this is the content of vision page in English.. this is the content of vision page in English', 'this is the content of vision page in French.. this is the content of vision page in French.. this is the content of vision page in French', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblproductrequests`
--

CREATE TABLE `tblproductrequests` (
  `PKProductRequestID` int(10) UNSIGNED NOT NULL,
  `FkProductID` int(10) UNSIGNED NOT NULL,
  `StrCompanyName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StrName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StrPosition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IntMobile` int(11) NOT NULL,
  `IntPhone` int(11) NOT NULL,
  `StrCountry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TxtNotes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblproductrequests`
--

INSERT INTO `tblproductrequests` (`PKProductRequestID`, `FkProductID`, `StrCompanyName`, `StrName`, `StrPosition`, `IntMobile`, `IntPhone`, `StrCountry`, `TxtNotes`, `created_at`, `updated_at`) VALUES
(1, 2, 'wildot', 'mahmoud ali', 'php developer', 1096615770, 10101, 'Egypt', 'عاوز من المنتج دا 4', '2018-08-08 20:55:04', '2018-08-08 20:55:04'),
(2, 4, 'shezlong', 'ahmed haz', 'php developer', 1026111280, 1096615770, 'Egypt', 'sssdd', '2018-09-18 19:58:59', '2018-09-18 19:58:59'),
(3, 4, 'shezlong', 'ahmed haz', 'php developer', 1026111280, 123123, 'Egypt', 'asdasd', '2018-09-18 20:06:06', '2018-09-18 20:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `PkProductID` int(10) UNSIGNED NOT NULL,
  `FKCategoryID` int(10) UNSIGNED NOT NULL,
  `StrNameEn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StrNameFr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IntCode` int(11) DEFAULT NULL,
  `TxtDescreptionEn` text COLLATE utf8mb4_unicode_ci,
  `TxtDescreptionFr` text COLLATE utf8mb4_unicode_ci,
  `TinyIntMinOrder` tinyint(4) DEFAULT NULL,
  `StrSupplyAbility` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StrManufactureEn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StrcertificationFr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StrTagsEn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StrtagsFr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StrkeywordsEn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StrkeywordsFr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IntSize` int(11) DEFAULT NULL,
  `IntWeight` int(11) DEFAULT NULL,
  `IntDimensions` int(11) DEFAULT NULL,
  `IntPackageSize` int(11) DEFAULT NULL,
  `IntCapacity` int(11) DEFAULT NULL,
  `IntPrice` int(11) DEFAULT NULL,
  `TxtMaterialsUsedEn` text COLLATE utf8mb4_unicode_ci,
  `TxtMaterialsUsedFr` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fldStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`PkProductID`, `FKCategoryID`, `StrNameEn`, `StrNameFr`, `IntCode`, `TxtDescreptionEn`, `TxtDescreptionFr`, `TinyIntMinOrder`, `StrSupplyAbility`, `StrManufactureEn`, `StrcertificationFr`, `StrTagsEn`, `StrtagsFr`, `StrkeywordsEn`, `StrkeywordsFr`, `IntSize`, `IntWeight`, `IntDimensions`, `IntPackageSize`, `IntCapacity`, `IntPrice`, `TxtMaterialsUsedEn`, `TxtMaterialsUsedFr`, `created_at`, `updated_at`, `fldStatus`) VALUES
(2, 8, 'kareem', '1', 1, '1', '1', 1, 'yes', '1', '1', '1', '1', '1', '1', 1, 1, 1, 1, 1, 0, 'oi[o 6781', '[o 678', '2018-07-16 20:03:20', '2018-07-16 20:03:20', 0),
(3, 13, 'mahmoud', NULL, NULL, 'test', 'tes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, NULL, NULL, '2018-09-18 19:57:26', '2018-09-18 19:57:26', 0),
(4, 13, 'mohamed', NULL, NULL, 'test', 'tes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, NULL, NULL, '2018-09-18 19:57:45', '2018-09-18 19:57:45', 0),
(5, 15, 'elshaeer', NULL, NULL, '3 ml syrings  3 ml syrings 3 ml syrings', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, NULL, NULL, '2018-09-18 20:14:03', '2018-09-18 20:14:03', 0),
(6, 8, 'nasr', NULL, NULL, NULL, NULL, NULL, 'Professional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-01 19:27:02', '2018-10-01 19:27:17', 0),
(7, 15, 'h', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-20 11:58:49', '2018-10-20 11:58:49', 0),
(11, 8, 'gemy', 'gemy', 32452345, 'gsdgdfgdsg', 'fdgdfgsdgdfs', 42, '3432', '234324', '32432', '2342', '324', '234', '234', 234, 234, 234, 234, 243, 234, 'dgfdgddbdbdsfggdf', 'vsdfvdbdb', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `pkservicesID` int(3) NOT NULL,
  `strName` varchar(80) NOT NULL,
  `txtDescription` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`pkservicesID`, `strName`, `txtDescription`, `created_at`, `updated_at`) VALUES
(1, 'Aptrel', 'Very Good For Kids , Super Good for addicted people :D ', '2018-07-18 13:06:51', '0000-00-00 00:00:00'),
(2, 'Tramadol', 'Not for adults , only for kids 14 years and below XD', '2018-07-18 13:07:40', '0000-00-00 00:00:00'),
(15, 'New', 'Description', '2018-07-24 10:55:18', '0000-00-00 00:00:00'),
(16, 'New 2 ', 'Description 2', '2018-07-24 10:56:57', '0000-00-00 00:00:00'),
(17, 'New 3', 'Description 3', '2018-07-24 10:56:57', '0000-00-00 00:00:00'),
(18, 'New 4', 'Description 4', '2018-07-24 09:08:14', '2018-07-24 09:08:14'),
(19, 'New 5', 'Description 5', '2018-07-24 11:15:15', '2018-07-24 11:15:15'),
(20, 'new 6', 'Description 6', '2018-07-24 11:15:28', '2018-07-24 11:15:28'),
(21, 'منتج الطماطم', 'يحتوي علي فوائد كثيره', '2018-11-12 14:15:49', '0000-00-00 00:00:00'),
(22, 'منتج الخيار ', 'يحتوي علي الكثير من الامتيازات', '2018-11-12 14:15:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblslider`
--

CREATE TABLE `tblslider` (
  `pksliderID` int(11) NOT NULL,
  `fldTitle` varchar(255) NOT NULL,
  `fldLink` varchar(255) NOT NULL,
  `fldImage` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblslider`
--

INSERT INTO `tblslider` (`pksliderID`, `fldTitle`, `fldLink`, `fldImage`, `created_at`, `updated_at`) VALUES
(2, 'Want to stay', 'https://d29u17ylf1ylz9.cloudfront.net/sabujcha/assets/img/slider/slider-1-1.jpg', 'images/slider/NX5ENSFg9YOvQ5bLFqfuEd8GCe6XCdZWrWKSsrCP.jpeg', '2018-11-12 00:31:48', '2018-11-12 00:31:48'),
(5, 'Want to stay', 'http://demo.devitems.com/sabujcha/assets/img/slider/slider-1.jpg', 'images/slider/pLktVQpn9y5wBJpfI8c2aGzqo2IUEld4cZ0bDUzx.jpeg', '2018-11-15 23:49:38', '2018-11-15 23:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `pkStaffID` int(11) NOT NULL,
  `fldName` varchar(255) NOT NULL,
  `fldEmail` varchar(255) NOT NULL,
  `fldPassword` varchar(255) NOT NULL,
  `fldConfirmPassword` varchar(255) NOT NULL,
  `fldType` enum('department','job') NOT NULL,
  `fkJopID` int(11) NOT NULL,
  `fkDepartmentID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE `tbl_departments` (
  `pkDeparmentID` int(11) NOT NULL,
  `fldTitle` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`pkDeparmentID`, `fldTitle`, `created_at`, `updated_at`) VALUES
(1, 'sales', '2018-11-20 22:37:12', '2018-11-20 23:35:02'),
(2, 'operation', '2018-11-20 22:37:24', '2018-11-20 23:35:26'),
(3, 'it', '2018-11-20 22:37:30', '2018-11-20 22:37:30'),
(4, 'Want to stay', '2018-11-21 12:10:14', '2018-11-21 12:10:14'),
(5, 'Want to stay', '2018-11-21 15:41:32', '2018-11-21 15:41:32'),
(6, 'Owner', '2018-11-21 23:18:03', '2018-11-21 23:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `pkJobID` int(11) NOT NULL,
  `fldName` varchar(255) NOT NULL,
  `fkDepartmentID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`pkJobID`, `fldName`, `fkDepartmentID`, `created_at`, `updated_at`) VALUES
(2, 'kareem', 3, '2018-11-21 12:06:55', '0000-00-00 00:00:00'),
(3, 'mahmoud', 2, '2018-11-21 12:06:55', '0000-00-00 00:00:00'),
(5, 'team leader', 3, '2018-11-21 20:48:59', '2018-11-21 20:48:59'),
(6, 'Owner', 6, '2018-11-21 21:18:37', '2018-11-21 21:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'mahmoud.ali.29992@gmail.com', 'mahmoud.ali.29992@gmail.com', '$2y$10$wQJRc4RRxGWKQM1bE3R3aOi50L9Jde./tCkoGuj/C6YsJXyZ9hqi.', 'yRXiJrFTkCaKiwFPcL4l1bqPILM2ukrBbEQDNN10OmqxstQmje4nUZy9hTL6', '2018-11-18 15:44:34', '2018-11-18 15:44:34'),
(6, 'test', 'test@gmail.com', '$2y$10$Y3GDC6xTD1QkKucQra.3u.eVFY9VD5B2EL7dJPeR42CUL6JYZlYT6', 'c7lXIGDOUoxWaghHk0lgCThVkEmEqCErgaK18MqpCqHjqLM2zBuo0oqBTaZ7', '2018-11-18 15:51:38', '2018-11-18 15:51:38'),
(7, 'mohamed elshaer', 'mo@gmail.com', '$2y$10$SYySFrr5mVW60YNOtHNi7e773rxwqIYWydH7s2o8L246CVZkgiLZy', 'zaXuavhxWafYzh0G9Y8U86UQtLpbob9EveS2qijrBnGmefs61zCBrkQ7Vtsq', '2018-11-18 16:02:32', '2018-11-18 16:02:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbladmins`
--
ALTER TABLE `tbladmins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbladmins_email_unique` (`email`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `tblcategories`
--
ALTER TABLE `tblcategories`
  ADD PRIMARY KEY (`PkCategoryID`),
  ADD KEY `tblcategories_fkparentid_index` (`FkParentID`);

--
-- Indexes for table `tblclients`
--
ALTER TABLE `tblclients`
  ADD PRIMARY KEY (`pkClientID`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`pkContactUsID`);

--
-- Indexes for table `tblfaqs`
--
ALTER TABLE `tblfaqs`
  ADD PRIMARY KEY (`pkPageID`);

--
-- Indexes for table `tblfiles`
--
ALTER TABLE `tblfiles`
  ADD PRIMARY KEY (`pkFileID`);

--
-- Indexes for table `tblmessages`
--
ALTER TABLE `tblmessages`
  ADD PRIMARY KEY (`pkMessageID`);

--
-- Indexes for table `tblnews`
--
ALTER TABLE `tblnews`
  ADD PRIMARY KEY (`pkNewsID`);

--
-- Indexes for table `tbloffers`
--
ALTER TABLE `tbloffers`
  ADD PRIMARY KEY (`pkOfferID`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`pkPageID`);

--
-- Indexes for table `tblproductrequests`
--
ALTER TABLE `tblproductrequests`
  ADD PRIMARY KEY (`PKProductRequestID`),
  ADD KEY `tblproductrequests_fkproductid_index` (`FkProductID`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`PkProductID`),
  ADD KEY `tblproducts_fkcategoryid_index` (`FKCategoryID`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`pkservicesID`);

--
-- Indexes for table `tblslider`
--
ALTER TABLE `tblslider`
  ADD PRIMARY KEY (`pksliderID`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`pkStaffID`),
  ADD UNIQUE KEY `fkJopID` (`fkJopID`,`fkDepartmentID`),
  ADD KEY `fkDepartmentID` (`fkDepartmentID`);

--
-- Indexes for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  ADD PRIMARY KEY (`pkDeparmentID`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`pkJobID`),
  ADD KEY `pkDepartmentID` (`fkDepartmentID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbladmins`
--
ALTER TABLE `tbladmins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblcategories`
--
ALTER TABLE `tblcategories`
  MODIFY `PkCategoryID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblclients`
--
ALTER TABLE `tblclients`
  MODIFY `pkClientID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `pkContactUsID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblfaqs`
--
ALTER TABLE `tblfaqs`
  MODIFY `pkPageID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblfiles`
--
ALTER TABLE `tblfiles`
  MODIFY `pkFileID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tblmessages`
--
ALTER TABLE `tblmessages`
  MODIFY `pkMessageID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tblnews`
--
ALTER TABLE `tblnews`
  MODIFY `pkNewsID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbloffers`
--
ALTER TABLE `tbloffers`
  MODIFY `pkOfferID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `pkPageID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblproductrequests`
--
ALTER TABLE `tblproductrequests`
  MODIFY `PKProductRequestID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `PkProductID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `pkservicesID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblslider`
--
ALTER TABLE `tblslider`
  MODIFY `pksliderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `pkStaffID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  MODIFY `pkDeparmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `pkJobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbladmins`
--
ALTER TABLE `tbladmins`
  ADD CONSTRAINT `tbladmins_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `tbl_jobs` (`pkJobID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblcategories`
--
ALTER TABLE `tblcategories`
  ADD CONSTRAINT `tblcategories_fkparentid_foreign` FOREIGN KEY (`FkParentID`) REFERENCES `tblcategories` (`PkCategoryID`);

--
-- Constraints for table `tblproductrequests`
--
ALTER TABLE `tblproductrequests`
  ADD CONSTRAINT `tblproductrequests_fkproductid_foreign` FOREIGN KEY (`FkProductID`) REFERENCES `tblproducts` (`PkProductID`) ON DELETE CASCADE;

--
-- Constraints for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD CONSTRAINT `tblproducts_fkcategoryid_foreign` FOREIGN KEY (`FKCategoryID`) REFERENCES `tblcategories` (`PkCategoryID`) ON DELETE CASCADE;

--
-- Constraints for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD CONSTRAINT `tblstaff_ibfk_1` FOREIGN KEY (`fkDepartmentID`) REFERENCES `tbl_departments` (`pkDeparmentID`),
  ADD CONSTRAINT `tblstaff_ibfk_2` FOREIGN KEY (`fkJopID`) REFERENCES `tbl_jobs` (`pkJobID`);

--
-- Constraints for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD CONSTRAINT `tbl_jobs_ibfk_1` FOREIGN KEY (`fkDepartmentID`) REFERENCES `tbl_departments` (`pkDeparmentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2022 at 01:47 PM
-- Server version: 5.7.40-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `albalaty_albalaty`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_answers`
--

CREATE TABLE `active_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_answer_id` int(11) DEFAULT NULL,
  `flaged` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `active_drag_center_answers`
--

CREATE TABLE `active_drag_center_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `question_drag_center_id` int(10) UNSIGNED NOT NULL,
  `user_answer` mediumtext COLLATE utf8mb4_unicode_ci,
  `flaged` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `active_drag_right_answers`
--

CREATE TABLE `active_drag_right_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `question_drag_right_id` int(10) UNSIGNED DEFAULT NULL,
  `question_drag_left_id` int(10) UNSIGNED DEFAULT NULL,
  `flaged` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teachingLang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `vimeo_token` mediumtext COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `country`, `phone`, `gender`, `teachingLang`, `description`, `vimeo_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Mohamed Ahmed', 'admin@support.com', '$2y$10$9c.4zayON9KPqJkEI2zL4.Nz1W4Iv7n19cxwA.K9MgYOEjM3WGth6', 'EG', '01102068860', 'male', NULL, NULL, '0160c68b3e161aba0836d05288a7195d', NULL, '2021-05-02 17:51:19', '2022-10-08 09:38:47'),
(4, 'Mohamed Ahmed Hassan Ahmed', 'mrgeek.mohamed@gmail.com', '$2y$10$jg5dz2i.qohkf30W040y7u0mgaw47Mio9oU.vf6l9pQOPsmRcE.62', 'EG', '02656565', 'male', NULL, NULL, NULL, NULL, '2022-09-19 19:04:50', '2022-09-19 19:04:50'),
(5, 'Nevine Raafat', 'igmathstutors@gmail.com', '$2y$10$IvcUIwqgCLDn2Fi.csKWzeQvcJ8JupASgGzkC1NTcoGx591AneBxq', 'EG', '01091446928', 'female', NULL, NULL, NULL, NULL, '2022-09-20 18:52:48', '2022-09-20 18:52:48'),
(6, 'Mohamed Sayed Mohamed', 'm_auc@yahoo.com', '$2y$10$UonMvRiNVYVkvqeEPe8N6.uEXTATTBNLwcO1jxQh93CaF/8WmYmZi', 'EG', '99180238', 'male', NULL, NULL, NULL, NULL, '2022-09-21 02:44:00', '2022-09-21 02:44:00'),
(7, 'AHMED NASSAR', 'ahmednassar80@hotmail.com', '$2y$10$reBNZazHq.zq6LTUd/gVYuPV1PpggYuJyzFJ4VbgOLDBWOzuCpotW', 'EG', '67772864', 'male', NULL, NULL, NULL, NULL, '2022-09-21 03:33:55', '2022-09-21 03:33:55'),
(8, 'Gamal hamdy ahmed', 'gamalhamdy594@gmail.com', '$2y$10$Lk79tcRyiH7vuE46/WUzzefrYvn43buXOoaunDQrvYSoyPRfcEpSi', 'EG', '94732088', 'male', NULL, NULL, NULL, NULL, '2022-09-21 03:38:53', '2022-09-21 03:38:53'),
(9, 'هاني  البياع', 'hanyelbiaa@gmail.com', '$2y$10$VEhFQi6ki7HbMsmPRuXYWeWMzpe732ZDmTU0L2EooS9vQsubkJGyy', 'KW', '67790635', 'male', NULL, NULL, NULL, NULL, '2022-09-21 06:13:54', '2022-09-21 06:13:54'),
(10, 'محمد مسعد مطاوع', 'motawymohamed@yahoo.com', '$2y$10$Jlg40gb6PqqCvmxBnsNPPeaZ4catlbwGkbFJmrUB26uRk6AkoQfMq', 'EG', '01091402223', 'male', NULL, NULL, NULL, NULL, '2022-09-21 08:23:39', '2022-09-21 08:23:39'),
(11, 'Romany Younan Isaac Ibrahim Ibrahim', 'romanyyounan13@gmail.com', '$2y$10$kWkzjoR0q8cR3UCSDMB3ze2U.bPoRxIoeykkSe7mstN4fYn6HiUW.', 'EG', '01284922113', 'male', NULL, NULL, NULL, NULL, '2022-09-21 08:25:53', '2022-09-21 08:25:53'),
(12, 'Ayman Mahmoud Mohamed', 'aymanmah198@gmail.com', '$2y$10$0fL/WSjgGs6dnruhfUfAZO8rW9NMvO9zw3yYV.tDQP3rQLC.bHVV2', 'EG', '01205103311', 'male', NULL, NULL, NULL, NULL, '2022-09-21 08:48:10', '2022-09-21 08:48:10'),
(13, 'رفعت محمد مصطفى عراقي', 'arakyrefat@yahoo.com', '$2y$10$UaClM.3/GABlM3tk826D1.6i4/.8qoizS9V2wL2QRyfX8VwcHID1G', 'EG', '01003345730', 'male', NULL, NULL, NULL, NULL, '2022-09-21 09:16:17', '2022-09-21 09:16:17'),
(14, 'عبدالعاطي عبدالكريم خالد', 'abo0108297590@yahoo.com', '$2y$10$kfC7IYgB1BgwWUOWidWc2Ow6TxUpqjPDAOy2Y9mgSh9I8W5Gn8bVe', 'EG', '01010471987', 'male', NULL, NULL, NULL, NULL, '2022-09-21 09:18:45', '2022-09-21 09:18:45'),
(15, 'جابر عبد المنعم محمدى أحمد مشابط', 'gaber91@yahoo.com', '$2y$10$Of9KqBUf/8aQ6fpLL1wbTOH4gFB/ErCLRaNQmXK3WY26iOPYYzoQq', 'EG', '01221581509', 'male', NULL, NULL, NULL, NULL, '2022-09-21 09:30:47', '2022-09-21 09:30:47'),
(16, 'عبدالغني محمد عبدالغني', 'abdelghanymohammed86@gmail.com', '$2y$10$7cHxZ2fQ3/kNf7VoRxres.3GXxQZVZJohHmRml/yCouoe57gQBGh2', 'EG', '0201022067645', 'male', NULL, NULL, NULL, NULL, '2022-09-21 09:32:30', '2022-09-21 09:32:30'),
(17, 'حسام الدين البدري عبد المبدي', 'hossam.badry2013@gmail.com', '$2y$10$nQYQdA16c/bJEytu1imm6efijo4x4xvBfLzq5o.StZph.HxhUvULG', 'EG', '01000415486', 'male', NULL, NULL, NULL, NULL, '2022-09-21 09:44:15', '2022-09-21 09:44:15'),
(18, 'Shaimaa Kamel erfan', 'aa5215259@gmail.com', '$2y$10$Ypb8TLy5Hn2Il9Dm/EO7a.OjC1mh7prfm4Jz/YWi47aVJU69S39dG', 'EG', '01026947007', 'female', NULL, NULL, NULL, NULL, '2022-09-21 10:20:44', '2022-09-21 10:20:44'),
(19, 'احمد ابراهيم احمد', 'aborawan709@gmail.com', '$2y$10$reynU8VwP.1DsvWr.02FMOXDThPss8HqUpR7v.5vUmFczE/FwCfT6', 'EG', '66502328', 'male', NULL, NULL, NULL, NULL, '2022-09-21 10:52:19', '2022-09-21 10:52:19'),
(20, 'عبدالله محمد أحمد إبراهيم', 'abolina916@gmail.com', '$2y$10$M5Ijnz2B1jbpUgUAFLynHe.IHh3T2pr7QGiDEtG4Fln0dHHrq/72W', 'EG', '01095245618', 'male', NULL, NULL, NULL, NULL, '2022-09-21 11:56:19', '2022-09-21 11:56:19'),
(21, 'Mohamed Kamal Ahmed Abdelaal Assaf', 'mohamedassaf21@yahoo.com', '$2y$10$1HkGKU2we3yfKwf9LPUDa.oE1buECHKLkZdrhsTOFBnY9vm7KYuMa', 'EG', '+201100982329', 'male', NULL, NULL, NULL, NULL, '2022-09-21 12:30:29', '2022-09-21 12:30:29'),
(22, 'صلاح عبدالقادرامين عبدالقادر', 'srwrsalah@gmail.com', '$2y$10$KyH9Mo.iz87Xts3cmjyPueM7gBxod3NJ1XTKCiW5roNp.5cdcNoci', 'EG', '01111911978', 'male', NULL, NULL, NULL, NULL, '2022-09-21 13:12:17', '2022-09-21 13:12:17'),
(23, 'ahmed', 'mr_ahmedjdp@yahoo.com', '$2y$10$dlX3u2r.nLivZwbYVro9p.H0pRiMo2SUcHMfmnPg2ihsZz2OQPPw.', 'EG', '01154670124', 'male', NULL, NULL, NULL, NULL, '2022-09-21 17:31:29', '2022-09-21 17:31:29'),
(24, 'مدحت هاني الشهاوي', 'madhatelshahawy@gmail.com', '$2y$10$wXUrvPWwSSStEfC/4u8ehuQZJmsBhgij7rVY1z.6tItEo3bNo6ejW', 'EG', '٠١٠٠٢٧٢٥٥٤٧', 'male', NULL, NULL, NULL, NULL, '2022-09-21 17:32:03', '2022-09-21 17:32:03'),
(25, 'Nesma Gamal', 'nesmagmall@yahoo.com', '$2y$10$BTqMDYNFySzo1BU/l36X7OQfNbBVcJ/22brwZ6FgPxLxHWF4e0Eo.', 'EG', '1010777165', 'female', NULL, NULL, NULL, NULL, '2022-09-21 17:50:27', '2022-09-21 17:50:27'),
(26, 'Emad El Ahwal', 'emadelahwl2@gmail.com', '$2y$10$nhF.m/XVEzMgv5S5/OxWgew3umQNg9W4cG8YgOWIp1VfOPEN5pdi2', 'EG', '20101 329 5969', 'male', NULL, NULL, NULL, NULL, '2022-09-21 19:42:48', '2022-09-21 19:42:48'),
(27, 'Mostafa Mohammed Ahmed Nosir', 'mostafa.nosir1@gmail.com', '$2y$10$/HDynXeeNMnqhdHBmtb3weHrC5FMrRy/2wtTUyfRgqUpbLnp1QtpS', 'EG', '01013412020', 'male', NULL, NULL, NULL, NULL, '2022-09-21 21:14:11', '2022-09-21 21:14:11'),
(28, 'شيماء محمد عبد التواب', 'abdeltawabshimaa02@gmail.com', '$2y$10$kLArBIYZyw4f9aANlgewi.IPaMkZvo/pWs8hzXmDRXEYAYt6PNGK.', 'EG', '01067686015', 'female', NULL, NULL, NULL, NULL, '2022-09-22 17:03:38', '2022-09-22 17:03:38'),
(29, 'Josephtup', 'no-replyZoomiarm@gmail.com', '$2y$10$nagqfKycAxS5INtlrShkqupenYUbCzW4uJd2917kEoaobm4cV73wi', 'BO', '87976269242', '1', NULL, NULL, NULL, NULL, '2022-09-22 17:16:34', '2022-09-22 17:16:34'),
(30, 'Amira Obada', 'tomaboba56@yahoo.com', '$2y$10$h/J.wlES5wBxyjfzXddr4etqrViAZ3d3mC.051fvijEjxIqjfxDr.', 'AF', '01030712405', 'male', NULL, NULL, NULL, NULL, '2022-09-23 10:06:22', '2022-09-23 10:06:22'),
(31, 'Mohamed', 'mshmk22@gmail.com', '$2y$10$b6UJvfJlkNSKikbl3XVGfe5Z9fnIZeHUL9ccNYCtfwiebP0JlDrxu', 'EG', '01069697891', 'male', NULL, NULL, NULL, NULL, '2022-09-23 21:31:21', '2022-09-23 21:31:21'),
(32, 'Xaviera Hebert', 'deku@mailinator.com', '$2y$10$KK6BG1HK17cY/ZpNHpby5O3Bl9MExp8yceVp/PxmV9Nr4MktPl1.u', '240', '5465465465', NULL, 'عربي', 'Id illum aspernatur', NULL, NULL, '2022-09-25 18:44:46', '2022-09-25 18:44:46'),
(33, 'ريمون اشرف محروس يعقوب', 'remonashrafmahrous16@gmail.com', '$2y$10$QdM8RhX0DxHYz.eIg2m/juQjd2ZtcBzfWRzvaeVB14H.cl0XVZ4ve', '63', '01286989707', NULL, 'عربي', 'AL ALSUN - CELTA + IG teaching 3 years experience', NULL, NULL, '2022-09-26 11:43:39', '2022-09-26 11:43:39'),
(34, 'عمرو محمد فايز', 'amar.fayez@yahoo.com', '$2y$10$zQDKVhD.o9i7GN8Q0X6ANu3KKj4Tj5FOjU4vAr45Kv1oohxPebYK2', '115', '0096599421329', NULL, 'عربي', 'بكالريوس تربية وعلوم شعبة رياضيات', NULL, NULL, '2022-09-28 18:25:45', '2022-09-28 18:25:45'),
(35, 'محمد احمد زيدان محمد', 'alrawdasleem78@gmail.com', '$2y$10$j9ogJrQV1GVC/QqHAnS5mOH4RzAJorPuSPX52AxuWUXsKZLYPeBh2', '115', '65822957', NULL, 'عربي', 'طالب', NULL, NULL, '2022-09-28 19:21:19', '2022-09-28 19:21:19'),
(36, 'اسامه طه عواد علي', 'osama_bentaha@hotmail.com', '$2y$10$xFDcZKB4bVww/bbhIUPiPOYy0OzEvwlLcxGxJX7H1k7OwOD6udEvu', '115', '94906800', NULL, 'عربي', 'بكالوريوس هندسة', NULL, NULL, '2022-10-01 08:48:58', '2022-10-01 08:48:58'),
(37, 'منيره', 'muneraalantari@gmail.com', '$2y$10$NJVRFFpTlGe6W9sMlq4yUO9BROU/ahZQu/JHOf9.mOeDvwMKVsCHC', '115', '94723170', NULL, 'عربي', 'تعيين جديد', NULL, NULL, '2022-10-05 09:31:49', '2022-10-05 09:31:49'),
(38, 'محمود كامل', 'abualiomr@gmail.com', '$2y$10$JC4eE5JZrpOqaksdNB53iu.7eq0fkwm4yyFTsB5f9rixDWyc58hDC', '115', '01019456575', NULL, 'عربي', 'بكالوريوس تربية نوعية', NULL, NULL, '2022-10-06 06:45:08', '2022-10-06 06:45:08'),
(39, 'محمد البلاطي', 'muhammad.j.albalaty@gmail.com', '$2y$10$15hU19O5FdFH.koGvo.Pq.PO1.kMXxABbhI7LbYO4URUjMkbX0EKG', 'KW', '0096597523357', 'male', 'عربي', 'معلم كيمياء وفيزياء', NULL, NULL, '2022-10-06 17:53:24', '2022-10-07 19:36:12'),
(40, 'محمد حسين', 'mhussein@misk.com.eg', '$2y$10$nqzM6M0e7M9e95.vfCc1R.nuqDLHSuZQNeRJYvlA3gBKD/tpmYyb6', '115', '01027027251', NULL, 'عربي', 'بكالوريوس', NULL, NULL, '2022-12-07 19:20:24', '2022-12-07 19:20:24'),
(41, 'مريم ناصر حسين الشعلان', 'Meme.93.93.93.93@gmail.com', '$2y$10$3iREu.MI.eF0vZ/Ixq7yLeqaLexfjx/a6z3G4jMoYjceiPKzJAwTq', '115', '9696888', NULL, NULL, 'جامعية', NULL, NULL, '2022-12-25 03:13:14', '2022-12-25 03:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `platform` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform_version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser_version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `package_id`, `created_at`, `updated_at`) VALUES
(2, 20, 1, '2022-03-16 06:30:57', '2022-03-16 06:30:57'),
(6, 20, 4, '2022-03-25 16:45:54', '2022-03-25 16:45:54'),
(8, 24, 5, '2022-03-25 16:58:38', '2022-03-25 16:58:38'),
(11, 20, 6, '2022-03-30 12:00:38', '2022-03-30 12:00:38'),
(18, 35, 6, '2022-04-01 12:56:22', '2022-04-01 12:56:22'),
(26, 38, 6, '2022-04-27 08:48:36', '2022-04-27 08:48:36'),
(35, 1, 8, '2022-05-06 15:14:10', '2022-05-06 15:14:10'),
(37, 26, 6, '2022-05-06 15:16:07', '2022-05-06 15:16:07'),
(57, 51, 8, '2022-05-10 09:41:01', '2022-05-10 09:41:01'),
(58, 55, 8, '2022-05-11 04:37:41', '2022-05-11 04:37:41'),
(63, 45, 8, '2022-05-21 12:47:58', '2022-05-21 12:47:58'),
(68, 80, 8, '2022-05-26 20:28:51', '2022-05-26 20:28:51'),
(69, 42, 6, '2022-05-29 10:24:01', '2022-05-29 10:24:01'),
(71, 84, 8, '2022-05-31 11:57:55', '2022-05-31 11:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `c_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ck` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chapter_topics`
--

CREATE TABLE `chapter_topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapter_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapter_topics`
--

INSERT INTO `chapter_topics` (`id`, `title`, `chapter_id`, `created_at`, `updated_at`) VALUES
(2, 'Module 1: Culture', 3, '2022-09-23 20:12:15', '2022-09-23 20:12:15'),
(3, 'Module 2: Free time', 3, '2022-09-23 20:12:15', '2022-09-23 20:12:15'),
(4, 'Module 3: Power', 3, '2022-09-23 20:12:15', '2022-09-23 20:12:15'),
(5, 'Module 4: Fact and fiction', 3, '2022-09-23 20:12:15', '2022-09-23 20:12:15'),
(6, 'الوحدة الأولي: الجبر-الأعداد والعمليات عليها', 4, '2022-09-23 20:12:15', '2022-09-23 20:12:15'),
(7, 'الوحدة الثانية: وحدة حساب المثلثات', 4, '2022-09-23 20:12:15', '2022-09-23 20:12:15'),
(8, 'الوحدة الثالثة: الجبر-التغير', 4, '2022-09-23 20:12:16', '2022-09-23 20:12:16'),
(9, 'الوحدة الرابعة: الهندسة المستوية', 4, '2022-09-23 20:12:16', '2022-09-23 20:12:16'),
(10, 'الوحدة الخامسة: المتتاليات (المتتابعات)', 4, '2022-09-23 20:12:16', '2022-09-23 20:12:16'),
(11, 'الوحدة الأولي: الإلكترونات في الذرات والدورية الكيميائية', 5, '2022-09-23 20:12:16', '2022-09-23 20:12:16'),
(12, 'الوحدة الثانية: الروابط الكيميائية (الأيونية والتساهمية والتناسقية)', 5, '2022-09-23 20:12:16', '2022-09-23 20:12:16'),
(14, 'الوحدة الأولي: الحركة', 6, '2022-09-23 20:12:16', '2022-09-23 20:12:16'),
(15, 'الوحدة الثانية: المادة وخواصها الميكانيكية', 6, '2022-09-23 20:12:16', '2022-09-23 20:12:16'),
(16, 'الوحدة الأولي: الخلية-التركيب والوظيفة', 7, '2022-09-23 20:12:16', '2022-09-23 20:12:16'),
(17, 'الفصل الأول: معالم الكويت الجغرافية والاقتصادية والحضارية', 8, '2022-09-23 20:12:16', '2022-09-23 20:12:16'),
(18, 'الفصل الثاني: نشأة الكويت', 8, '2022-09-23 20:12:16', '2022-09-23 20:12:16'),
(19, 'الفصل الثالث: الكويت والتنافس الأوربي علي منطقة الخليج العربي من القرن السادس عشر حتي القرن التاسع عشر الميلادي', 8, '2022-09-23 20:12:17', '2022-09-23 20:12:17'),
(20, 'الفصل الرابع: الحاكم السابع الشيخ مبارك الكبير مؤسسا لإمارة الكويت الحديثة', 8, '2022-09-23 20:12:17', '2022-09-23 20:12:17'),
(21, 'الفصل الخامس: الأوضاع الداخلية والخارجية في دولة الكويت', 8, '2022-09-23 20:12:17', '2022-09-23 20:12:17'),
(22, 'الفصل السادس: استقلال دولة الكويت واستكمال أدوات السيادة والتحديث', 8, '2022-09-23 20:12:17', '2022-09-23 20:12:17'),
(23, 'الفصل السابع: العلاقات الكويتية العراقية', 8, '2022-09-23 20:12:17', '2022-09-23 20:12:17'),
(24, 'المجال الأول: العقيدة', 10, '2022-09-23 20:12:17', '2022-09-23 20:12:17'),
(25, 'المجال الثاني: علوم القرآن', 10, '2022-09-23 20:12:17', '2022-09-23 20:12:17'),
(26, 'المجال الثالث: الحديث الشريف وعلومه', 10, '2022-09-23 20:12:17', '2022-09-23 20:12:17'),
(27, 'المجال الرابع: السيرة والتراجم', 10, '2022-09-23 20:12:17', '2022-09-23 20:12:17'),
(28, 'المجال الخامس: الفقه وأصوله', 10, '2022-09-23 20:12:17', '2022-09-23 20:12:17'),
(29, 'المجال السادس: التهذيب', 10, '2022-09-23 20:12:17', '2022-09-23 20:12:17'),
(30, 'الوحدة الأولي: الإلكترونات في الذرات', 46, '2022-09-23 20:12:22', '2022-09-23 20:12:22'),
(31, 'الوحدة الثانية: المحاليل', 46, '2022-09-23 20:12:22', '2022-09-23 20:12:22'),
(32, 'الوحدة الثالثة: الكيمياء الحرارية', 46, '2022-09-23 20:12:22', '2022-09-23 20:12:22'),
(33, 'الوحدة الأولي: الحركة', 47, '2022-09-23 20:12:22', '2022-09-23 20:12:22'),
(34, 'الوحدة الأولي: الغازات', 25, '2022-10-06 07:12:28', '2022-10-06 07:12:28'),
(35, 'الوحدة الثانية: سرعة التفاعل الكيميائي والاتزان الكيميائي', 25, '2022-10-06 07:13:16', '2022-10-06 07:13:16'),
(36, 'الوحدة الثالثة: الأحماض والقواعد', 25, '2022-10-06 07:13:43', '2022-10-06 07:13:43'),
(37, 'الدرس الأول: الإيمان الصادق(من سورة الجمعة)', 2, '2022-10-08 03:10:44', '2022-10-10 19:21:38'),
(38, 'الوحدة الأولي: الحركة', 26, '2022-10-09 04:37:07', '2022-10-09 04:37:07'),
(40, '(الدرس الأول: آداب الأستئذان (من سورة النور', 43, '2022-10-09 19:06:01', '2022-10-10 19:23:12'),
(41, '(الدرس الأول: آداب الأستئذان (من سورة النور', 12, '2022-10-09 19:06:38', '2022-10-10 19:22:46'),
(42, 'الدرس الأول: آيات ناطقة بقدرة الله ووحدانيته (من سورة الروم)', 22, '2022-10-10 19:19:08', '2022-10-10 19:19:08'),
(43, 'الدرس الأول: آيات ناطقة بقدرة الله ووحدانيته (من سورة الروم)', 32, '2022-10-10 19:19:49', '2022-10-10 19:19:49'),
(44, 'Module 1: Getting together', 44, '2022-10-12 03:12:46', '2022-10-12 03:12:46'),
(45, 'Module 2: Communication', 44, '2022-10-12 03:13:15', '2022-10-12 03:13:15'),
(46, 'Module 3: The media', 44, '2022-10-12 03:14:10', '2022-10-12 03:14:10'),
(47, 'Module 4: Being prepared', 44, '2022-10-12 03:14:54', '2022-10-12 03:14:54'),
(48, 'Module 1: Getting together', 13, '2022-10-12 03:17:10', '2022-10-12 03:17:10'),
(49, 'Module 2: Communication', 13, '2022-10-12 03:17:54', '2022-10-12 03:17:54'),
(50, 'Module 3: The media', 13, '2022-10-12 03:18:33', '2022-10-12 03:18:33'),
(51, 'Module 4: Being prepared', 13, '2022-10-12 03:19:26', '2022-10-12 03:19:26'),
(52, 'Module 1: World issues', 23, '2022-10-12 03:29:29', '2022-10-12 03:29:29'),
(53, 'Module 2: Natural world', 23, '2022-10-12 03:29:50', '2022-10-12 03:29:50'),
(54, 'Module 3: Lifestyles', 23, '2022-10-12 03:30:22', '2022-10-12 03:30:22'),
(55, 'Module 4: Achievements', 23, '2022-10-12 03:32:52', '2022-10-12 03:32:52'),
(56, 'Module 1: World issues', 33, '2022-10-12 03:37:33', '2022-10-12 03:37:33'),
(57, 'Module 2: Natural world', 33, '2022-10-12 03:37:55', '2022-10-12 03:37:55'),
(58, 'Module 3: Lifestyles', 33, '2022-10-12 03:38:37', '2022-10-12 03:38:37'),
(59, 'Module 4: Achievements', 33, '2022-10-12 03:39:02', '2022-10-12 03:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `contant` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `comment` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Steelovil', 'w@titangel-in-france.com', NULL, 'تحقق من هذه الصفحة <a href=https://titangel-in-france.com/steelovil-egypt>Steelovil</a> كلمة من نصيحة غالبًا ما يتم اتخاذ قرارات النظام الغذائي السيئة عندما تتضور جوعًا وليس لديك ما تأكله صحيًا في مطبخك. تجنب قرارات الخروج عن النظام الغذائي عن طريق تخزين الروبيان المجمد - أحد مدرب الجنون شون تي! الانتقال إلى البروتينات. بمجرد رميها على الموقد ، تصبح جاهزة للأكل في بضع دقائق فقط ، وهي مصدر رائع للبروتين الخالي من الدهون ومنخفض السعرات الحرارية. صدور الديك الرومي العضوية منخفضة الصوديوم والدجاج المشوي مسبقًا والبيض المسلوق هي أيضًا مقبلات ذكية للوجبات في متناول اليد.', '2022-07-14 00:41:25', '2022-07-14 00:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `correct_answers`
--

CREATE TABLE `correct_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_answer_id` int(11) DEFAULT NULL,
  `flaged` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `correct_drag_center_answers`
--

CREATE TABLE `correct_drag_center_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `question_drag_center_id` int(10) UNSIGNED NOT NULL,
  `user_answer` mediumtext COLLATE utf8mb4_unicode_ci,
  `flaged` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `correct_drag_right_answers`
--

CREATE TABLE `correct_drag_right_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `question_drag_right_id` int(10) UNSIGNED DEFAULT NULL,
  `question_drag_left_id` int(10) UNSIGNED DEFAULT NULL,
  `flaged` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dial_code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_symbol` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `dial_code`, `currency_name`, `currency_symbol`, `currency_code`) VALUES
(1, 'Afghanistan', 'AF', '+93', 'Afghan afghani', '؋', 'AFN'),
(2, 'Aland Islands', 'AX', '+358', '', '', ''),
(3, 'Albania', 'AL', '+355', 'Albanian lek', 'L', 'ALL'),
(4, 'Algeria', 'DZ', '+213', 'Algerian dinar', 'د.ج', 'DZD'),
(5, 'AmericanSamoa', 'AS', '+1684', '', '', ''),
(6, 'Andorra', 'AD', '+376', 'Euro', '€', 'EUR'),
(7, 'Angola', 'AO', '+244', 'Angolan kwanza', 'Kz', 'AOA'),
(8, 'Anguilla', 'AI', '+1264', 'East Caribbean dolla', '$', 'XCD'),
(9, 'Antarctica', 'AQ', '+672', '', '', ''),
(10, 'Antigua and Barbuda', 'AG', '+1268', 'East Caribbean dolla', '$', 'XCD'),
(11, 'Argentina', 'AR', '+54', 'Argentine peso', '$', 'ARS'),
(12, 'Armenia', 'AM', '+374', 'Armenian dram', '', 'AMD'),
(13, 'Aruba', 'AW', '+297', 'Aruban florin', 'ƒ', 'AWG'),
(14, 'Australia', 'AU', '+61', 'Australian dollar', '$', 'AUD'),
(15, 'Austria', 'AT', '+43', 'Euro', '€', 'EUR'),
(16, 'Azerbaijan', 'AZ', '+994', 'Azerbaijani manat', '', 'AZN'),
(17, 'Bahamas', 'BS', '+1242', '', '', ''),
(18, 'Bahrain', 'BH', '+973', 'Bahraini dinar', '.د.ب', 'BHD'),
(19, 'Bangladesh', 'BD', '+880', 'Bangladeshi taka', '৳', 'BDT'),
(20, 'Barbados', 'BB', '+1246', 'Barbadian dollar', '$', 'BBD'),
(21, 'Belarus', 'BY', '+375', 'Belarusian ruble', 'Br', 'BYR'),
(22, 'Belgium', 'BE', '+32', 'Euro', '€', 'EUR'),
(23, 'Belize', 'BZ', '+501', 'Belize dollar', '$', 'BZD'),
(24, 'Benin', 'BJ', '+229', 'West African CFA fra', 'Fr', 'XOF'),
(25, 'Bermuda', 'BM', '+1441', 'Bermudian dollar', '$', 'BMD'),
(26, 'Bhutan', 'BT', '+975', 'Bhutanese ngultrum', 'Nu.', 'BTN'),
(27, 'Bolivia, Plurination', 'BO', '+591', '', '', ''),
(28, 'Bosnia and Herzegovi', 'BA', '+387', '', '', ''),
(29, 'Botswana', 'BW', '+267', 'Botswana pula', 'P', 'BWP'),
(30, 'Brazil', 'BR', '+55', 'Brazilian real', 'R$', 'BRL'),
(31, 'British Indian Ocean', 'IO', '+246', '', '', ''),
(32, 'Brunei Darussalam', 'BN', '+673', '', '', ''),
(33, 'Bulgaria', 'BG', '+359', 'Bulgarian lev', 'лв', 'BGN'),
(34, 'Burkina Faso', 'BF', '+226', 'West African CFA fra', 'Fr', 'XOF'),
(35, 'Burundi', 'BI', '+257', 'Burundian franc', 'Fr', 'BIF'),
(36, 'Cambodia', 'KH', '+855', 'Cambodian riel', '៛', 'KHR'),
(37, 'Cameroon', 'CM', '+237', 'Central African CFA ', 'Fr', 'XAF'),
(38, 'Canada', 'CA', '+1', 'Canadian dollar', '$', 'CAD'),
(39, 'Cape Verde', 'CV', '+238', 'Cape Verdean escudo', 'Esc or $', 'CVE'),
(40, 'Cayman Islands', 'KY', '+ 345', 'Cayman Islands dolla', '$', 'KYD'),
(41, 'Central African Repu', 'CF', '+236', '', '', ''),
(42, 'Chad', 'TD', '+235', 'Central African CFA ', 'Fr', 'XAF'),
(43, 'Chile', 'CL', '+56', 'Chilean peso', '$', 'CLP'),
(44, 'China', 'CN', '+86', 'Chinese yuan', '¥ or 元', 'CNY'),
(45, 'Christmas Island', 'CX', '+61', '', '', ''),
(46, 'Cocos (Keeling) Isla', 'CC', '+61', '', '', ''),
(47, 'Colombia', 'CO', '+57', 'Colombian peso', '$', 'COP'),
(48, 'Comoros', 'KM', '+269', 'Comorian franc', 'Fr', 'KMF'),
(49, 'Congo', 'CG', '+242', '', '', ''),
(50, 'Congo, The Democrati', 'CD', '+243', '', '', ''),
(51, 'Cook Islands', 'CK', '+682', 'New Zealand dollar', '$', 'NZD'),
(52, 'Costa Rica', 'CR', '+506', 'Costa Rican colón', '₡', 'CRC'),
(53, 'Cote d\'Ivoire', 'CI', '+225', 'West African CFA fra', 'Fr', 'XOF'),
(54, 'Croatia', 'HR', '+385', 'Croatian kuna', 'kn', 'HRK'),
(55, 'Cuba', 'CU', '+53', 'Cuban convertible pe', '$', 'CUC'),
(56, 'Cyprus', 'CY', '+357', 'Euro', '€', 'EUR'),
(57, 'Czech Republic', 'CZ', '+420', 'Czech koruna', 'Kč', 'CZK'),
(58, 'Denmark', 'DK', '+45', 'Danish krone', 'kr', 'DKK'),
(59, 'Djibouti', 'DJ', '+253', 'Djiboutian franc', 'Fr', 'DJF'),
(60, 'Dominica', 'DM', '+1767', 'East Caribbean dolla', '$', 'XCD'),
(61, 'Dominican Republic', 'DO', '+1849', 'Dominican peso', '$', 'DOP'),
(62, 'Ecuador', 'EC', '+593', 'United States dollar', '$', 'USD'),
(63, 'Egypt', 'EG', '+20', 'Egyptian pound', '£ or ج.م', 'EGP'),
(64, 'El Salvador', 'SV', '+503', 'United States dollar', '$', 'USD'),
(65, 'Equatorial Guinea', 'GQ', '+240', 'Central African CFA ', 'Fr', 'XAF'),
(66, 'Eritrea', 'ER', '+291', 'Eritrean nakfa', 'Nfk', 'ERN'),
(67, 'Estonia', 'EE', '+372', 'Euro', '€', 'EUR'),
(68, 'Ethiopia', 'ET', '+251', 'Ethiopian birr', 'Br', 'ETB'),
(69, 'Falkland Islands (Ma', 'FK', '+500', '', '', ''),
(70, 'Faroe Islands', 'FO', '+298', 'Danish krone', 'kr', 'DKK'),
(71, 'Fiji', 'FJ', '+679', 'Fijian dollar', '$', 'FJD'),
(72, 'Finland', 'FI', '+358', 'Euro', '€', 'EUR'),
(73, 'France', 'FR', '+33', 'Euro', '€', 'EUR'),
(74, 'French Guiana', 'GF', '+594', '', '', ''),
(75, 'French Polynesia', 'PF', '+689', 'CFP franc', 'Fr', 'XPF'),
(76, 'Gabon', 'GA', '+241', 'Central African CFA ', 'Fr', 'XAF'),
(77, 'Gambia', 'GM', '+220', '', '', ''),
(78, 'Georgia', 'GE', '+995', 'Georgian lari', 'ლ', 'GEL'),
(79, 'Germany', 'DE', '+49', 'Euro', '€', 'EUR'),
(80, 'Ghana', 'GH', '+233', 'Ghana cedi', '₵', 'GHS'),
(81, 'Gibraltar', 'GI', '+350', 'Gibraltar pound', '£', 'GIP'),
(82, 'Greece', 'GR', '+30', 'Euro', '€', 'EUR'),
(83, 'Greenland', 'GL', '+299', '', '', ''),
(84, 'Grenada', 'GD', '+1473', 'East Caribbean dolla', '$', 'XCD'),
(85, 'Guadeloupe', 'GP', '+590', '', '', ''),
(86, 'Guam', 'GU', '+1671', '', '', ''),
(87, 'Guatemala', 'GT', '+502', 'Guatemalan quetzal', 'Q', 'GTQ'),
(88, 'Guernsey', 'GG', '+44', 'British pound', '£', 'GBP'),
(89, 'Guinea', 'GN', '+224', 'Guinean franc', 'Fr', 'GNF'),
(90, 'Guinea-Bissau', 'GW', '+245', 'West African CFA fra', 'Fr', 'XOF'),
(91, 'Guyana', 'GY', '+595', 'Guyanese dollar', '$', 'GYD'),
(92, 'Haiti', 'HT', '+509', 'Haitian gourde', 'G', 'HTG'),
(93, 'Holy See (Vatican Ci', 'VA', '+379', '', '', ''),
(94, 'Honduras', 'HN', '+504', 'Honduran lempira', 'L', 'HNL'),
(95, 'Hong Kong', 'HK', '+852', 'Hong Kong dollar', '$', 'HKD'),
(96, 'Hungary', 'HU', '+36', 'Hungarian forint', 'Ft', 'HUF'),
(97, 'Iceland', 'IS', '+354', 'Icelandic króna', 'kr', 'ISK'),
(98, 'India', 'IN', '+91', 'Indian rupee', '₹', 'INR'),
(99, 'Indonesia', 'ID', '+62', 'Indonesian rupiah', 'Rp', 'IDR'),
(100, 'Iran, Islamic Republ', 'IR', '+98', '', '', ''),
(101, 'Iraq', 'IQ', '+964', 'Iraqi dinar', 'ع.د', 'IQD'),
(102, 'Ireland', 'IE', '+353', 'Euro', '€', 'EUR'),
(103, 'Isle of Man', 'IM', '+44', 'British pound', '£', 'GBP'),
(104, 'Israel', 'IL', '+972', 'Israeli new shekel', '₪', 'ILS'),
(105, 'Italy', 'IT', '+39', 'Euro', '€', 'EUR'),
(106, 'Jamaica', 'JM', '+1876', 'Jamaican dollar', '$', 'JMD'),
(107, 'Japan', 'JP', '+81', 'Japanese yen', '¥', 'JPY'),
(108, 'Jersey', 'JE', '+44', 'British pound', '£', 'GBP'),
(109, 'Jordan', 'JO', '+962', 'Jordanian dinar', 'د.ا', 'JOD'),
(110, 'Kazakhstan', 'KZ', '+7 7', 'Kazakhstani tenge', '', 'KZT'),
(111, 'Kenya', 'KE', '+254', 'Kenyan shilling', 'Sh', 'KES'),
(112, 'Kiribati', 'KI', '+686', 'Australian dollar', '$', 'AUD'),
(113, 'Korea, Democratic Pe', 'KP', '+850', '', '', ''),
(114, 'Korea, Republic of S', 'KR', '+82', '', '', ''),
(115, 'Kuwait', 'KW', '+965', 'Kuwaiti dinar', 'د.ك', 'KWD'),
(116, 'Kyrgyzstan', 'KG', '+996', 'Kyrgyzstani som', 'лв', 'KGS'),
(117, 'Laos', 'LA', '+856', 'Lao kip', '₭', 'LAK'),
(118, 'Latvia', 'LV', '+371', 'Euro', '€', 'EUR'),
(119, 'Lebanon', 'LB', '+961', 'Lebanese pound', 'ل.ل', 'LBP'),
(120, 'Lesotho', 'LS', '+266', 'Lesotho loti', 'L', 'LSL'),
(121, 'Liberia', 'LR', '+231', 'Liberian dollar', '$', 'LRD'),
(122, 'Libyan Arab Jamahiri', 'LY', '+218', '', '', 'LYD'),
(123, 'Liechtenstein', 'LI', '+423', 'Swiss franc', 'Fr', 'CHF'),
(124, 'Lithuania', 'LT', '+370', 'Euro', '€', 'EUR'),
(125, 'Luxembourg', 'LU', '+352', 'Euro', '€', 'EUR'),
(126, 'Macao', 'MO', '+853', '', '', ''),
(127, 'Macedonia', 'MK', '+389', '', '', ''),
(128, 'Madagascar', 'MG', '+261', 'Malagasy ariary', 'Ar', 'MGA'),
(129, 'Malawi', 'MW', '+265', 'Malawian kwacha', 'MK', 'MWK'),
(130, 'Malaysia', 'MY', '+60', 'Malaysian ringgit', 'RM', 'MYR'),
(131, 'Maldives', 'MV', '+960', 'Maldivian rufiyaa', '.ރ', 'MVR'),
(132, 'Mali', 'ML', '+223', 'West African CFA fra', 'Fr', 'XOF'),
(133, 'Malta', 'MT', '+356', 'Euro', '€', 'EUR'),
(134, 'Marshall Islands', 'MH', '+692', 'United States dollar', '$', 'USD'),
(135, 'Martinique', 'MQ', '+596', '', '', ''),
(136, 'Mauritania', 'MR', '+222', 'Mauritanian ouguiya', 'UM', 'MRO'),
(137, 'Mauritius', 'MU', '+230', 'Mauritian rupee', '₨', 'MUR'),
(138, 'Mayotte', 'YT', '+262', '', '', ''),
(139, 'Mexico', 'MX', '+52', 'Mexican peso', '$', 'MXN'),
(140, 'Micronesia, Federate', 'FM', '+691', '', '', ''),
(141, 'Moldova', 'MD', '+373', 'Moldovan leu', 'L', 'MDL'),
(142, 'Monaco', 'MC', '+377', 'Euro', '€', 'EUR'),
(143, 'Mongolia', 'MN', '+976', 'Mongolian tögrög', '₮', 'MNT'),
(144, 'Montenegro', 'ME', '+382', 'Euro', '€', 'EUR'),
(145, 'Montserrat', 'MS', '+1664', 'East Caribbean dolla', '$', 'XCD'),
(146, 'Morocco', 'MA', '+212', 'Moroccan dirham', 'د.م.', 'MAD'),
(147, 'Mozambique', 'MZ', '+258', 'Mozambican metical', 'MT', 'MZN'),
(148, 'Myanmar', 'MM', '+95', 'Burmese kyat', 'Ks', 'MMK'),
(149, 'Namibia', 'NA', '+264', 'Namibian dollar', '$', 'NAD'),
(150, 'Nauru', 'NR', '+674', 'Australian dollar', '$', 'AUD'),
(151, 'Nepal', 'NP', '+977', 'Nepalese rupee', '₨', 'NPR'),
(152, 'Netherlands', 'NL', '+31', 'Euro', '€', 'EUR'),
(153, 'Netherlands Antilles', 'AN', '+599', '', '', ''),
(154, 'New Caledonia', 'NC', '+687', 'CFP franc', 'Fr', 'XPF'),
(155, 'New Zealand', 'NZ', '+64', 'New Zealand dollar', '$', 'NZD'),
(156, 'Nicaragua', 'NI', '+505', 'Nicaraguan córdoba', 'C$', 'NIO'),
(157, 'Niger', 'NE', '+227', 'West African CFA fra', 'Fr', 'XOF'),
(158, 'Nigeria', 'NG', '+234', 'Nigerian naira', '₦', 'NGN'),
(159, 'Niue', 'NU', '+683', 'New Zealand dollar', '$', 'NZD'),
(160, 'Norfolk Island', 'NF', '+672', '', '', ''),
(161, 'Northern Mariana Isl', 'MP', '+1670', '', '', ''),
(162, 'Norway', 'NO', '+47', 'Norwegian krone', 'kr', 'NOK'),
(163, 'Oman', 'OM', '+968', 'Omani rial', 'ر.ع.', 'OMR'),
(164, 'Pakistan', 'PK', '+92', 'Pakistani rupee', '₨', 'PKR'),
(165, 'Palau', 'PW', '+680', 'Palauan dollar', '$', ''),
(166, 'Palestinian Territor', 'PS', '+970', 'Israeli Shekel', '₪', 'ILS'),
(167, 'Panama', 'PA', '+507', 'Panamanian balboa', 'B/.', 'PAB'),
(168, 'Papua New Guinea', 'PG', '+675', 'Papua New Guinean ki', 'K', 'PGK'),
(169, 'Paraguay', 'PY', '+595', 'Paraguayan guaraní', '₲', 'PYG'),
(170, 'Peru', 'PE', '+51', 'Peruvian nuevo sol', 'S/.', 'PEN'),
(171, 'Philippines', 'PH', '+63', 'Philippine peso', '₱', 'PHP'),
(172, 'Pitcairn', 'PN', '+872', '', '', ''),
(173, 'Poland', 'PL', '+48', 'Polish z?oty', 'zł', 'PLN'),
(174, 'Portugal', 'PT', '+351', 'Euro', '€', 'EUR'),
(175, 'Puerto Rico', 'PR', '+1939', '', '', ''),
(176, 'Qatar', 'QA', '+974', 'Qatari riyal', 'ر.ق', 'QAR'),
(177, 'Romania', 'RO', '+40', 'Romanian leu', 'lei', 'RON'),
(178, 'Russia', 'RU', '+7', 'Russian ruble', '', 'RUB'),
(179, 'Rwanda', 'RW', '+250', 'Rwandan franc', 'Fr', 'RWF'),
(180, 'Reunion', 'RE', '+262', '', '', ''),
(181, 'Saint Barthelemy', 'BL', '+590', '', '', ''),
(182, 'Saint Helena, Ascens', 'SH', '+290', '', '', ''),
(183, 'Saint Kitts and Nevi', 'KN', '+1869', '', '', ''),
(184, 'Saint Lucia', 'LC', '+1758', 'East Caribbean dolla', '$', 'XCD'),
(185, 'Saint Martin', 'MF', '+590', '', '', ''),
(186, 'Saint Pierre and Miq', 'PM', '+508', '', '', ''),
(187, 'Saint Vincent and th', 'VC', '+1784', '', '', ''),
(188, 'Samoa', 'WS', '+685', 'Samoan t?l?', 'T', 'WST'),
(189, 'San Marino', 'SM', '+378', 'Euro', '€', 'EUR'),
(190, 'Sao Tome and Princip', 'ST', '+239', '', '', ''),
(191, 'Saudi Arabia', 'SA', '+966', 'Saudi riyal', 'ر.س', 'SAR'),
(192, 'Senegal', 'SN', '+221', 'West African CFA fra', 'Fr', 'XOF'),
(193, 'Serbia', 'RS', '+381', 'Serbian dinar', 'дин. or din.', 'RSD'),
(194, 'Seychelles', 'SC', '+248', 'Seychellois rupee', '₨', 'SCR'),
(195, 'Sierra Leone', 'SL', '+232', 'Sierra Leonean leone', 'Le', 'SLL'),
(196, 'Singapore', 'SG', '+65', 'Brunei dollar', '$', 'BND'),
(197, 'Slovakia', 'SK', '+421', 'Euro', '€', 'EUR'),
(198, 'Slovenia', 'SI', '+386', 'Euro', '€', 'EUR'),
(199, 'Solomon Islands', 'SB', '+677', 'Solomon Islands doll', '$', 'SBD'),
(200, 'Somalia', 'SO', '+252', 'Somali shilling', 'Sh', 'SOS'),
(201, 'South Africa', 'ZA', '+27', 'South African rand', 'R', 'ZAR'),
(202, 'South Georgia and th', 'GS', '+500', '', '', ''),
(203, 'Spain', 'ES', '+34', 'Euro', '€', 'EUR'),
(204, 'Sri Lanka', 'LK', '+94', 'Sri Lankan rupee', 'Rs or රු', 'LKR'),
(205, 'Sudan', 'SD', '+249', 'Sudanese pound', 'ج.س.', 'SDG'),
(206, 'Suriname', 'SR', '+597', 'Surinamese dollar', '$', 'SRD'),
(207, 'Svalbard and Jan May', 'SJ', '+47', '', '', ''),
(208, 'Swaziland', 'SZ', '+268', 'Swazi lilangeni', 'L', 'SZL'),
(209, 'Sweden', 'SE', '+46', 'Swedish krona', 'kr', 'SEK'),
(210, 'Switzerland', 'CH', '+41', 'Swiss franc', 'Fr', 'CHF'),
(211, 'Syrian Arab Republic', 'SY', '+963', '', '', ''),
(212, 'Taiwan', 'TW', '+886', 'New Taiwan dollar', '$', 'TWD'),
(213, 'Tajikistan', 'TJ', '+992', 'Tajikistani somoni', 'ЅМ', 'TJS'),
(214, 'Tanzania, United Rep', 'TZ', '+255', '', '', ''),
(215, 'Thailand', 'TH', '+66', 'Thai baht', '฿', 'THB'),
(216, 'Timor-Leste', 'TL', '+670', '', '', ''),
(217, 'Togo', 'TG', '+228', 'West African CFA fra', 'Fr', 'XOF'),
(218, 'Tokelau', 'TK', '+690', '', '', ''),
(219, 'Tonga', 'TO', '+676', 'Tongan pa?anga', 'T$', 'TOP'),
(220, 'Trinidad and Tobago', 'TT', '+1868', 'Trinidad and Tobago ', '$', 'TTD'),
(221, 'Tunisia', 'TN', '+216', 'Tunisian dinar', 'د.ت', 'TND'),
(222, 'Turkey', 'TR', '+90', 'Turkish lira', '', 'TRY'),
(223, 'Turkmenistan', 'TM', '+993', 'Turkmenistan manat', 'm', 'TMT'),
(224, 'Turks and Caicos Isl', 'TC', '+1649', '', '', ''),
(225, 'Tuvalu', 'TV', '+688', 'Australian dollar', '$', 'AUD'),
(226, 'Uganda', 'UG', '+256', 'Ugandan shilling', 'Sh', 'UGX'),
(227, 'Ukraine', 'UA', '+380', 'Ukrainian hryvnia', '₴', 'UAH'),
(228, 'United Arab Emirates', 'AE', '+971', 'United Arab Emirates', 'د.إ', 'AED'),
(229, 'United Kingdom', 'GB', '+44', 'British pound', '£', 'GBP'),
(230, 'United States', 'US', '+1', 'United States dollar', '$', 'USD'),
(231, 'Uruguay', 'UY', '+598', 'Uruguayan peso', '$', 'UYU'),
(232, 'Uzbekistan', 'UZ', '+998', 'Uzbekistani som', '', 'UZS'),
(233, 'Vanuatu', 'VU', '+678', 'Vanuatu vatu', 'Vt', 'VUV'),
(234, 'Venezuela, Bolivaria', 'VE', '+58', '', '', ''),
(235, 'Vietnam', 'VN', '+84', 'Vietnamese ??ng', '₫', 'VND'),
(236, 'Virgin Islands, Brit', 'VG', '+1284', '', '', ''),
(237, 'Virgin Islands, U.S.', 'VI', '+1340', '', '', ''),
(238, 'Wallis and Futuna', 'WF', '+681', 'CFP franc', 'Fr', 'XPF'),
(239, 'Yemen', 'YE', '+967', 'Yemeni rial', '﷼', 'YER'),
(240, 'Zambia', 'ZM', '+260', 'Zambian kwacha', 'ZK', 'ZMW'),
(241, 'Zimbabwe', 'ZW', '+263', 'Botswana pula', 'P', 'BWP');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code` mediumtext COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) NOT NULL,
  `no_use` int(11) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `expire_date` date NOT NULL,
  `promote` int(11) NOT NULL DEFAULT '0',
  `total_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `qr_code`, `price`, `no_use`, `package_id`, `event_id`, `expire_date`, `promote`, `total_count`, `created_at`, `updated_at`) VALUES
(1, 'Albalaty', NULL, '200.00', 50, 1, NULL, '2022-11-02', 0, 50, '2022-10-03 21:56:55', '2022-10-09 19:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `private` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_parts`
--

CREATE TABLE `course_parts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `z_index` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_parts`
--

INSERT INTO `course_parts` (`id`, `title`, `course_id`, `z_index`, `created_at`, `updated_at`) VALUES
(38, 'اللغة العربية', 2, NULL, '2022-09-23 20:12:14', '2022-09-23 20:12:14'),
(39, 'English Language', 2, NULL, '2022-09-23 20:12:14', '2022-09-23 20:12:14'),
(40, 'الرياضيات', 2, NULL, '2022-09-23 20:12:15', '2022-09-23 20:12:15'),
(41, 'الكيمياء', 2, NULL, '2022-09-23 20:12:16', '2022-09-23 20:12:16'),
(42, 'الفيزياء', 2, NULL, '2022-09-23 20:12:16', '2022-09-23 20:12:16'),
(43, 'الأحياء', 2, NULL, '2022-09-23 20:12:16', '2022-09-23 20:12:16'),
(44, 'تاريخ الكويت', 2, NULL, '2022-09-23 20:12:16', '2022-09-23 20:12:16'),
(45, 'تقنية المعلومات', 2, NULL, '2022-09-23 20:12:17', '2022-09-23 20:12:17'),
(46, 'التربية الإسلامية', 2, NULL, '2022-09-23 20:12:17', '2022-09-23 20:12:17'),
(47, 'القرآن الكريم', 2, NULL, '2022-09-23 20:12:17', '2022-09-23 20:12:17'),
(48, 'اللغة العربية', 3, NULL, '2022-09-23 20:12:18', '2022-09-23 20:12:18'),
(49, 'English Language', 3, NULL, '2022-09-23 20:12:18', '2022-09-23 20:12:18'),
(50, 'Langue française', 3, NULL, '2022-09-23 20:12:18', '2022-09-23 20:12:18'),
(51, 'الرياضيات', 3, NULL, '2022-09-23 20:12:18', '2022-09-23 20:12:18'),
(52, 'مبادئ علم الجغرافيا وعلم الاقتصاد', 3, NULL, '2022-09-23 20:12:18', '2022-09-23 20:12:18'),
(53, 'التاريخ الإسلامي', 3, NULL, '2022-09-23 20:12:18', '2022-09-23 20:12:18'),
(54, 'علم النفس وعلم الاجتماع', 3, NULL, '2022-09-23 20:12:18', '2022-09-23 20:12:18'),
(55, 'تقنية المعلومات', 3, NULL, '2022-09-23 20:12:19', '2022-09-23 20:12:19'),
(56, 'التربية الإسلامية', 3, NULL, '2022-09-23 20:12:19', '2022-09-23 20:12:19'),
(57, 'القرآن الكريم', 3, NULL, '2022-09-23 20:12:19', '2022-09-23 20:12:19'),
(58, 'اللغة العربية', 4, NULL, '2022-09-23 20:12:19', '2022-09-23 20:12:19'),
(59, 'English Language', 4, NULL, '2022-09-23 20:12:19', '2022-09-23 20:12:19'),
(60, 'الرياضيات', 4, NULL, '2022-09-23 20:12:19', '2022-09-23 20:12:19'),
(61, 'الكيمياء', 4, NULL, '2022-09-23 20:12:19', '2022-09-23 20:12:19'),
(62, 'الفيزياء', 4, NULL, '2022-09-23 20:12:19', '2022-09-23 20:12:19'),
(63, 'الأحياء', 4, NULL, '2022-09-23 20:12:19', '2022-09-23 20:12:19'),
(64, 'تقنية المعلومات', 4, NULL, '2022-09-23 20:12:20', '2022-09-23 20:12:20'),
(65, 'التربية الإسلامية', 4, NULL, '2022-09-23 20:12:20', '2022-09-23 20:12:20'),
(66, 'القرآن الكريم', 4, NULL, '2022-09-23 20:12:20', '2022-09-23 20:12:20'),
(67, 'الدستور وحقوق الإنسان', 4, NULL, '2022-09-23 20:12:20', '2022-09-23 20:12:20'),
(68, 'اللغة العربية', 5, NULL, '2022-09-23 20:12:20', '2022-09-23 20:12:20'),
(69, 'English Language', 5, NULL, '2022-09-23 20:12:20', '2022-09-23 20:12:20'),
(70, 'Langue française', 5, NULL, '2022-09-23 20:12:20', '2022-09-23 20:12:20'),
(71, 'الرياضيات', 5, NULL, '2022-09-23 20:12:20', '2022-09-23 20:12:20'),
(72, 'قضايا البيْة والتنمية المعاصرة', 5, NULL, '2022-09-23 20:12:21', '2022-09-23 20:12:21'),
(73, 'تاريخ العالم الحديث والمعاصر', 5, NULL, '2022-09-23 20:12:21', '2022-09-23 20:12:21'),
(74, 'الفلسفة', 5, NULL, '2022-09-23 20:12:21', '2022-09-23 20:12:21'),
(75, 'تقنية المعلومات', 5, NULL, '2022-09-23 20:12:21', '2022-09-23 20:12:21'),
(76, 'التربية الإسلامية', 5, NULL, '2022-09-23 20:12:21', '2022-09-23 20:12:21'),
(77, 'القرآن الكريم', 5, NULL, '2022-09-23 20:12:21', '2022-09-23 20:12:21'),
(78, 'الدستور وحقوق الإنسان', 5, NULL, '2022-09-23 20:12:21', '2022-09-23 20:12:21'),
(79, 'اللغة العربية', 6, NULL, '2022-09-23 20:12:21', '2022-09-23 20:12:21'),
(80, 'English Language', 6, NULL, '2022-09-23 20:12:22', '2022-09-23 20:12:22'),
(81, 'الرياضيات', 6, NULL, '2022-09-23 20:12:22', '2022-09-23 20:12:22'),
(82, 'الكيمياء', 6, NULL, '2022-09-23 20:12:22', '2022-09-23 20:12:22'),
(83, 'الفيزياء', 6, NULL, '2022-09-23 20:12:22', '2022-09-23 20:12:22'),
(84, 'الأحياء', 6, NULL, '2022-09-23 20:12:22', '2022-09-23 20:12:22'),
(85, 'الجيولوجيا', 6, NULL, '2022-09-23 20:12:22', '2022-09-23 20:12:22'),
(86, 'تقنية المعلومات', 6, NULL, '2022-09-23 20:12:22', '2022-09-23 20:12:22'),
(87, 'التربية الإسلامية', 6, NULL, '2022-09-23 20:12:23', '2022-09-23 20:12:23'),
(88, 'القرآن الكريم', 6, NULL, '2022-09-23 20:12:23', '2022-09-23 20:12:23'),
(99, 'اللغة العربية', 12, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(100, 'English Language', 12, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(101, 'الرياضيات', 12, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(102, 'العلوم', 12, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(103, 'الدراسات الاجتماعية', 12, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(104, 'عالم التقنية', 12, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(105, 'التربية الإسلامية', 12, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(106, 'القرآن الكريم', 12, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(107, 'الاقتصاد المنزلي', 12, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(108, 'اللغة العربية', 13, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(109, 'English Language', 13, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(110, 'الرياضيات', 13, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(111, 'العلوم', 13, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(112, 'الدراسات الاجتماعية', 13, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(113, 'عالم التقنية', 13, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(114, 'التربية الإسلامية', 13, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(115, 'القرآن الكريم', 13, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(116, 'الاقتصاد المنزلي', 13, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(117, 'اللغة العربية', 14, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(118, 'English Language', 14, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(119, 'الرياضيات', 14, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(120, 'العلوم', 14, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(121, 'الدراسات الاجتماعية', 14, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(122, 'عالم التقنية', 14, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(123, 'التربية الإسلامية', 14, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(124, 'القرآن الكريم', 14, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(125, 'الاقتصاد المنزلي', 14, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(126, 'مهارات الحياة', 14, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(127, 'اللغة العربية', 15, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(128, 'English Language', 15, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(129, 'الرياضيات', 15, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(130, 'العلوم', 15, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(131, 'الدراسات الاجتماعية', 15, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(132, 'عالم التقنية', 15, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(133, 'التربية الإسلامية', 15, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(134, 'القرآن الكريم', 15, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(135, 'الاقتصاد المنزلي', 15, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(136, 'مهارات الحياة', 15, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `disabled_users`
--

CREATE TABLE `disabled_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `path_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brith_date` datetime DEFAULT NULL,
  `last_login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disabled_users`
--

INSERT INTO `disabled_users` (`id`, `user_id`, `path_id`, `course_id`, `name`, `email`, `password`, `city`, `country`, `phone`, `brith_date`, `last_login`, `last_action`, `last_ip`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 106, 4, 2, 'Kaseem Scott', 'fijotizyp@mailinator.com', '$2y$10$ltaa9EE6HxaHR8wN5qjkJ.4t5K9/pDh5L0f29q5rzLEWMRJX1vNUm', 'Tempora quis elit a', 'EG', '545646546', '0000-00-00 00:00:00', '2022-09-24 21:38:20', 'loged in', '::1', NULL, '2022-09-24 19:38:20', '2022-09-24 19:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `path_id` int(10) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `what_you_learn` longtext COLLATE utf8mb4_unicode_ci,
  `requirement` longtext COLLATE utf8mb4_unicode_ci,
  `who_course_for` longtext COLLATE utf8mb4_unicode_ci,
  `enroll_msg` longtext COLLATE utf8mb4_unicode_ci,
  `total_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_lecture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `expire_in_days` int(11) NOT NULL DEFAULT '90',
  `price` decimal(8,2) NOT NULL,
  `original_price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Arabic',
  `whatsapp` mediumtext COLLATE utf8mb4_unicode_ci,
  `zoom` mediumtext COLLATE utf8mb4_unicode_ci,
  `certification` tinyint(1) NOT NULL DEFAULT '0',
  `certification_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `teacher_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `path_id`, `course_id`, `name`, `description`, `what_you_learn`, `requirement`, `who_course_for`, `enroll_msg`, `total_time`, `total_lecture`, `start`, `end`, `expire_in_days`, `price`, `original_price`, `discount`, `img`, `lang`, `whatsapp`, `zoom`, `certification`, `certification_title`, `active`, `teacher_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(2, 4, 2, 'sdsd', '<p>sdsdsdsdsdsdsdsdsd</p>', '<p>bg</p>', '<p>ggh</p>', '<p>ggh</p>', '<p>gghjjjhhhhhhhhhhhhhhhh</p>', 'gggggggggg', 'df', '2022-12-16', '2022-12-18', 90, '9.90', '10.00', '1.00', 'public/events/D0DIFmPGvVXXZmXhkuKC6tpOZcMjoGXW7xF8QgvE.jpeg', 'dddddddddd', 'ghgh', 'ggh', 1, 'ghghgh', 0, 4, NULL, '2022-12-10 18:57:22', '2022-12-12 10:31:57'),
(3, 4, 2, 'sdsd', '<p>sdsdsdsdsdsdsdsdsd</p>', '<p>bg</p>', '<p>ggh</p>', '<p>ggh</p>', '<p>gghjjjhhhhhhhhhhhhhhhh</p>', 'gggggggggg', 'df', '2022-12-16', '2022-12-18', 90, '9.90', '10.00', '1.00', 'public/events/DrPoktOqMQ3iNzpLUvqlICIoXRCtelXnnH1pGuP3.png', 'dddddddddd', 'ghgh', 'ggh', 1, 'ghghgh', 1, 4, NULL, '2022-12-10 18:57:22', '2022-12-10 20:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `event_free_packages`
--

CREATE TABLE `event_free_packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_free_packages`
--

INSERT INTO `event_free_packages` (`id`, `event_id`, `package_id`, `created_at`, `updated_at`) VALUES
(8, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_times`
--

CREATE TABLE `event_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `day` date NOT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_times`
--

INSERT INTO `event_times` (`id`, `event_id`, `day`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-12-09', '10:00:00', '01:00:00', '2022-12-09 15:43:55', '2022-12-09 15:43:55'),
(2, 1, '2022-12-04', '11:00:00', '03:00:00', '2022-12-09 15:43:55', '2022-12-09 15:43:55'),
(9, 2, '2022-12-11', '10:00:00', '11:00:00', '2022-12-12 10:31:57', '2022-12-12 10:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `event_user`
--

CREATE TABLE `event_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `show_whatsapp_link` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_minutes` int(11) DEFAULT NULL,
  `admin_created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `duration_minutes`, `admin_created_by`, `created_at`, `updated_at`) VALUES
(1, 'Exam 1', 30, 3, '2022-09-14 15:37:30', '2022-09-14 15:39:18'),
(2, 'Exam 2', 45, 3, '2022-09-14 15:40:08', '2022-09-14 15:40:08'),
(4, 'Exam', 60, 3, '2022-09-27 12:30:25', '2022-09-27 12:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_questions`
--

INSERT INTO `exam_questions` (`id`, `question_id`, `exam_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2022-09-14 17:12:50', '2022-09-14 17:12:50'),
(2, 4, 2, '2022-09-14 17:12:50', '2022-09-14 17:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `exam_sections`
--

CREATE TABLE `exam_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `explanations`
--

CREATE TABLE `explanations` (
  `id` int(10) UNSIGNED NOT NULL,
  `explanation_title` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_id` int(10) UNSIGNED DEFAULT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `part_id` int(10) UNSIGNED DEFAULT NULL,
  `chapter_id` int(10) UNSIGNED DEFAULT NULL,
  `topic_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extension_histories`
--

CREATE TABLE `extension_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `extend_num` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `feedback` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` int(11) DEFAULT '0',
  `disable` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback`, `user_id`, `title`, `rate`, `disable`, `created_at`, `updated_at`) VALUES
(1, 'جيد جدا', 1, NULL, 3, 0, '2022-02-18 14:39:33', '2022-02-18 14:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `flash_cards`
--

CREATE TABLE `flash_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci,
  `contant` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `f_a_qs`
--

CREATE TABLE `f_a_qs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contant` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generated_exam`
--

CREATE TABLE `generated_exam` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `complete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `generated_exam_section`
--

CREATE TABLE `generated_exam_section` (
  `id` int(11) NOT NULL,
  `generated_exam_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `generated_exam_section_questions`
--

CREATE TABLE `generated_exam_section_questions` (
  `id` int(11) NOT NULL,
  `generated_exam_section_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `killed_exams`
--

CREATE TABLE `killed_exams` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `killed_exams_questions`
--

CREATE TABLE `killed_exams_questions` (
  `id` int(11) NOT NULL,
  `killed_exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `part_id` int(10) UNSIGNED NOT NULL,
  `chapter_id` int(10) UNSIGNED DEFAULT NULL,
  `topic_id` int(10) UNSIGNED DEFAULT NULL,
  `skill_id` int(10) UNSIGNED DEFAULT NULL,
  `level_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_url` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `part_id`, `chapter_id`, `topic_id`, `skill_id`, `level_id`, `admin_id`, `title`, `file_url`, `cover_url`, `created_at`, `updated_at`) VALUES
(2, 41, 5, 11, 5, 1, 39, 'محتويات المنهج', 'public/material/JI4yvYyix0A0Nl9RoaIBZLYq4sY4EukmIObi4J41.pdf', 'public/material/VQCDTnwyg1G43QtPmsGNHLT5DNK1x6rKx4krMfd4.jpeg', '2022-10-07 17:03:08', '2022-10-07 17:03:08'),
(3, 41, 5, 11, 5, 1, 39, 'شرح الدرس', 'public/material/zFZ5qXtnU4HGIrl7pbrkZBtgK16pqPd4dYGjjp2d.pdf', 'public/material/Euz2LN1u4ztjolMBr5vcwRgsacRwTAkTOXxvg1eY.jpeg', '2022-10-07 17:08:48', '2022-10-07 17:08:48'),
(4, 41, 5, 11, 5, 1, 39, 'اسئلة الدرس', 'public/material/RFUfRLLhdA2bnFc6v60SBozwKMGsiAil23J3yOt5.pdf', 'public/material/wFkYFBNcmbxD5wQnl3dS7kqlT063VwEslP8G9ya1.jpeg', '2022-10-07 17:10:17', '2022-10-07 17:10:17'),
(5, 41, 5, 11, 5, 1, 39, 'اجابة اسئلة الدرس', 'public/material/zu7qiH1TyAuEsvh0PEf9UQU9QmZ0cVGWK1lF3Kbf.pdf', 'public/material/9SLSG9zwSpYv6opcQL0Jfao3nZTorpOBzBnpIRG9.jpeg', '2022-10-07 17:13:04', '2022-10-07 17:13:04'),
(6, 42, 6, 14, 9, 11, 39, 'محتويات المنهج', 'public/material/GYbpuUkGhkmG7Ywg2YjChQ3C1nvu6CF9aHLnUhMz.pdf', 'public/material/DhlGC0XYExiHBpVuBdavZFGCyhoq4xi2O5m98AhY.jpeg', '2022-10-08 02:34:48', '2022-10-08 02:34:48'),
(7, 42, 6, 14, 9, 11, 39, 'شرح الدرس', 'public/material/H50PhJEQQ08nawFWOwV6JB3WVTQWi0T3UQltvfPc.pdf', 'public/material/hWPUZ7jIDz7Ax7JIrjpsts5cmdKFzBcr0tGHGgJK.jpeg', '2022-10-08 02:36:40', '2022-10-08 02:36:40'),
(8, 42, 6, 14, 9, 11, 39, 'أسئلة الدرس', 'public/material/JNuXQrvQhL1ugmftOKfmJoZIe67KtsXQGhcy1b1t.pdf', 'public/material/saGqOD7IokQWJuA8UgOuDN1tKxXCfGNqMEQV3nNI.jpeg', '2022-10-08 02:43:13', '2022-10-08 02:43:13'),
(9, 42, 6, 14, 9, 11, 39, 'إجابة أسئلة الدرس', 'public/material/UxoE0dXtDEt0LfLO9OneqOOrlInWGXdIarMe4KnH.pdf', 'public/material/gW1KQFlxJEDPrytrss4Wyufi6Pa3lks0KHAn9EAn.jpeg', '2022-10-08 02:45:07', '2022-10-08 02:45:07'),
(13, 82, 46, 30, 12, 19, 39, 'محتويات المنهج', 'public/material/eMLJK29qJyJ8uibD4g6uraCIdoDeMf1M7f6cfZXk.pdf', 'public/material/znAcYbjDbgCk3kyy1sLBVgWSWFDKgLQYgTab9keC.jpeg', '2022-10-08 18:19:21', '2022-10-08 18:19:21'),
(14, 82, 46, 30, 12, 19, 39, 'شرح الدرس', 'public/material/3gGY6bKgTphoFRr1EZFj4sLl2vlVulBnSNJW5OMg.pdf', 'public/material/yUKvXPWRgGwTGjhx9Yp22aWgFygN1UqGZIMT9F1w.jpeg', '2022-10-08 18:20:45', '2022-10-08 18:20:45'),
(15, 82, 46, 30, 12, 19, 39, 'اسئلة الدرس', 'public/material/EEK2RYdJcBNu5RF6ozEJs0rAOhYE05hbAxcyUK16.pdf', 'public/material/vFMXU5IytZU6s1vKivXGEUzg9LPvBHA8plU0v7q4.jpeg', '2022-10-08 18:21:47', '2022-10-08 18:21:47'),
(16, 82, 46, 30, 12, 19, 39, 'اجابة اسئلة الدرس', 'public/material/Q0beyBG7hdZHLSJ57MJ0KPRIAc1vnIK4EhuA8pDb.pdf', 'public/material/UZ3kPsM3G2i0gLeD9PuDCrVblkkHb5Cul8ZpkHvJ.jpeg', '2022-10-08 18:22:40', '2022-10-08 18:22:40'),
(17, 82, 46, 30, 12, 19, 39, 'اسئلة امتحان الدرس', 'public/material/RjsZwH4tVaBmIVtN6VCdRBXqLpRQ89shIhLjlWaE.pdf', 'public/material/bhVSNvBloYoSxbgxUjrmYPMaZVdAtoRDAyVaI4KC.jpeg', '2022-10-08 18:23:59', '2022-10-08 18:23:59'),
(18, 83, 47, 33, 17, 27, 39, 'محتويات المنهج', 'public/material/LYif69adowZgTiuPylQeSoRTyMzOe4QtSS7TiE7M.pdf', 'public/material/CaEV87BLPlsDch4fIP7Hok3KrkKmgzBMlZ7wuUGC.jpeg', '2022-10-09 04:11:28', '2022-10-09 04:11:28'),
(19, 83, 47, 33, 17, 27, 39, 'شرح الدرس', 'public/material/QJfGWoGADDOEvQetjxelWIRWs93vjugmFtglY12d.pdf', 'public/material/jbN5sDZgOCvg1cjzF6Uey9ahlHkjpEYRNQ3GS0Ui.jpeg', '2022-10-09 04:12:20', '2022-10-09 04:12:20'),
(20, 83, 47, 33, 17, 27, 39, 'اسئلة الدرس', 'public/material/598t5rQKo5nyiKeVbPZuMuWD1Kf92NxYkMRnZ2Ao.pdf', 'public/material/9JUkAVJtjcYT27k7FotT5LGdYFu76hcx7jSqxq58.jpeg', '2022-10-09 04:13:14', '2022-10-09 04:13:14'),
(21, 83, 47, 33, 17, 27, 39, 'اجابة اسئلة الدرس', 'public/material/q6LMWWqsHR5mGkkBJEe5XGT5ogTsIp4rtQoMbRWb.pdf', 'public/material/L7rtdvokeldgrWDi4ylgpE83wBdfP4xLt2vZaiEB.jpeg', '2022-10-09 04:14:00', '2022-10-09 04:14:00'),
(22, 83, 47, 33, 17, 27, 39, 'اسئلة امتحان الدرس', 'public/material/tbbm5hwf8WFiAj1zoOkcF86Lr9g1hkuqUNhALMcG.pdf', 'public/material/7ETIp1gL1GzTDMzHnxin7jZOOHqekW6REzh8cYjz.jpeg', '2022-10-09 04:15:01', '2022-10-09 04:15:01'),
(23, 61, 25, 34, 20, 35, 39, 'محتويات المنهج', 'public/material/xDHEMBTZjl8COytQ1UvSBuj8MTYUfbDs4pVBHGMA.pdf', 'public/material/s69rfTQPFENsqOcHselRXePP3WltsVmTsjKEtSS0.jpeg', '2022-10-09 04:49:52', '2022-10-09 04:49:52'),
(24, 61, 25, 34, 20, 35, 39, 'شرح الدرس', 'public/material/WdcRl8Nxppc4ZbsHnzw8qibyNGISc4moe9qkg9wv.pdf', 'public/material/p9EYOVGKSxctTPGoIEaso1wTcbwU0ym6lWVphkzW.jpeg', '2022-10-09 04:52:03', '2022-10-09 04:52:03'),
(25, 61, 25, 34, 20, 35, 39, 'اسئلة الدرس', 'public/material/l9hECJplORVh3OYekerGzN6NBGlNmfqKAKqLCD2O.pdf', 'public/material/YDeyRZdhhjBIoxlYAU1PIsqG9PQrzXkOr2dZsMEI.jpeg', '2022-10-09 04:54:34', '2022-10-09 04:54:34'),
(26, 61, 25, 34, 20, 35, 39, 'اجابة اسئلة الدرس', 'public/material/VfYrprQGpFB7SuTi4qQkIhfgxFmlyUEf5a1wiJHk.pdf', 'public/material/B2nvGDLJTxOwGBZ0msX7iLkSlLZxNHzbhQguHSak.jpeg', '2022-10-09 04:57:01', '2022-10-09 04:57:01'),
(27, 61, 25, 34, 20, 35, 39, 'اسئلة امتحان الدرس', 'public/material/93IIYKHPXz6cXWqXhCvonJsOjsCHG2UBr8J7nZy4.pdf', 'public/material/Q13z9NDiMZtLnsfsPnK5KbwrDbTOiMP3Hq5TSQkH.jpeg', '2022-10-09 05:00:23', '2022-10-09 05:00:23'),
(28, 61, 25, 34, 20, 35, 39, 'اجابة امتحان الدرس', 'public/material/zPW9qJdla2xio37btImsKaCBI4SMyRzgCfodGpAR.pdf', 'public/material/VyNdNjERAQxcVsZBtys3JwE1KPMsT6Ma3YahZZAd.jpeg', '2022-10-09 05:02:55', '2022-10-09 05:02:55'),
(31, 62, 26, 38, 25, 45, 39, 'محتويات المنهج', 'public/material/zMcYcceZDBUEMS3uICHK1Ix8g1yEj1IOCGqexliR.pdf', 'public/material/JmYtYknAeFDZhVRxV5Ej4bKtL1w2uJgCd93FIWdC.jpeg', '2022-10-09 05:11:24', '2022-10-09 05:11:24'),
(32, 62, 26, 38, 25, 45, 39, 'شرح الدرس', 'public/material/E4YV57Xfw5nOfZrwY9qySviOBiU1lEkyPmhClQEC.pdf', 'public/material/4JE1NsrhdqHjPLP14Jq1vrPNZ5TwimdzzUKzeQ8p.jpeg', '2022-10-09 05:12:28', '2022-10-09 05:12:28'),
(33, 62, 26, 38, 25, 45, 39, 'اسئلة الدرس', 'public/material/f1VuippZoe1pwQ23rvny2dD8xXQ4UeOFdYIgh1Iu.pdf', 'public/material/eqUAqG29AD9mx9n6Co6SnyQmmYt4mXV6JNuHI6Zh.jpeg', '2022-10-09 05:13:37', '2022-10-09 05:13:37'),
(34, 62, 26, 38, 25, 45, 39, 'اجابة اسئلة الدرس', 'public/material/64x5O9gMcUOchR8CyuNTXqoQXGs9eE6aTntSiDr7.pdf', 'public/material/jx15c2TkVApgZqcYZB8g7TNJMdNJExe9PyiG2ivH.jpeg', '2022-10-09 05:18:22', '2022-10-09 05:18:22'),
(35, 62, 26, 38, 25, 45, 39, 'اسئلة امتحان الدرس', 'public/material/D0VQpr3Y6WIRyP1h6Pw5lSYW4P8VrmShgnAUDW3K.pdf', 'public/material/xL3JH5VdhEOH6sp3uJf5iatBt25Y1fb0roFizCOj.jpeg', '2022-10-09 05:22:02', '2022-10-09 05:22:02'),
(36, 62, 26, 38, 25, 45, 39, 'اجابة امتحان الدرس', 'public/material/RGgUrlmdpkJEQxuZ4Sh3m1gcheFnPm4wbz5AKKTf.pdf', 'public/material/6Dpz9IKDp0NQ190oYKxbGCJU8CDmbu79u1UUaCBY.jpeg', '2022-10-09 05:26:17', '2022-10-09 05:26:17'),
(37, 38, 2, 37, NULL, NULL, 39, 'محتويات المنهج', 'public/material/9fh2hyzKgsDEKwVA1j6F4PxKR6rbrZWKqleHe8GX.pdf', 'public/material/XZ2LnaqUlA4aF2CpRdst910tUK7C5Ht4jeSvZGi7.jpeg', '2022-10-09 18:37:02', '2022-10-09 18:37:02'),
(38, 38, 2, 37, NULL, NULL, 39, 'شرح الدرس', 'public/material/xMzVEneTD8Vu2nVYev7jDXX4oBMEtsJy0Gyn6EHG.pdf', 'public/material/qBnBTxNk1lEum2u3c4RKBz4TrD9X1ECpADo4Y3ta.jpeg', '2022-10-09 18:37:52', '2022-10-09 18:37:52'),
(39, 38, 2, 37, NULL, NULL, 39, 'أسئلة الدرس', 'public/material/1OnpGExlt7vd47yUcc7Yyl04px1PJlacO5UnSavP.pdf', 'public/material/HbVDzSwJtjiE4BDpo2eLptjvLk3M6ACXETVXQ5w4.jpeg', '2022-10-09 18:38:47', '2022-10-09 18:38:47'),
(40, 38, 2, 37, NULL, NULL, 39, 'إجابة أسئلة الدرس', 'public/material/zW7RqnltiyUqcTulpDk1rq321oW5vrdaHaGwmW8e.pdf', 'public/material/hkYY0Y9Q3mAv8DMoP2QxfSrqBO0QyvMSqw7aeKcx.jpeg', '2022-10-09 18:39:46', '2022-10-09 18:39:46'),
(41, 38, 2, 37, NULL, NULL, 3, 'lksjdlk', 'public/material/wjKNosNAcJzF1BOVPD2f7lewXu9YrPG381OTQwP6.pdf', 'public/material/7xGGcDK8ysj3kikd8tyXRahzjcfaROYlwU36Dfzu.png', '2022-10-09 21:00:22', '2022-10-09 21:00:22'),
(46, 79, 43, 40, NULL, NULL, 39, 'محتويات المنهج', 'public/material/P5zsXs8M3O9cwEuIdeyZ3PgLWB10gE5LMp6XlNkN.pdf', 'public/material/ADTjm0dEHxQn7EQckzlt2uueLRU2nBro2oF40Rib.jpeg', '2022-10-10 07:05:42', '2022-10-10 07:05:42'),
(47, 79, 43, 40, NULL, NULL, 39, 'شرح الدرس', 'public/material/ChwWc7xHECqNNjEyqrC5MYdvG9bzmfgEWO5xaqFg.pdf', 'public/material/2qVFjxKVC3zYWtUfgJ3G2mmsKvMrmkQVNS9JTwZL.jpeg', '2022-10-10 07:07:08', '2022-10-10 07:07:08'),
(48, 79, 43, 40, NULL, NULL, 39, 'اسئلة الدرس', 'public/material/wZl0cC9wAKXu9PQqYO3Y1wv4tZxXW4bwbRtISAVk.pdf', 'public/material/mCAsFHR3VfDNrTuje0Lwsy83zR6hexyBXZTX2Pfc.jpeg', '2022-10-10 07:08:19', '2022-10-10 07:08:19'),
(49, 79, 43, 40, NULL, NULL, 39, 'اجابة اسئلة الدرس', 'public/material/I7NxYxBRv3XC4iiIowstwVqqrXcA0Ms1sq4XomwJ.pdf', 'public/material/dZCHq6kRYPCPPNB91iw7jh3ndoA1QwUAIhdLNVlM.jpeg', '2022-10-10 07:10:21', '2022-10-10 07:10:21'),
(50, 48, 12, 41, NULL, NULL, 39, 'محتويات المنهج', 'public/material/VF3ZclhHOdInX2Cx1YHI91GXJzVaRexoDncVNOyy.pdf', 'public/material/zFhUboIx0qBEsuIrgxL0jK4R9CeUMn5a18pK4evi.jpeg', '2022-10-10 18:55:20', '2022-10-10 18:55:20'),
(51, 48, 12, 41, NULL, NULL, 39, 'شرح الدرس', 'public/material/w4Zf9fhKLWot7Mw1g6wwJv6EXArTNo39gTzeJsJd.pdf', 'public/material/sUx3U5mhYKWoCvPLAPGBgtRo7TiSc4og4F7zw8YN.jpeg', '2022-10-10 18:56:11', '2022-10-10 18:56:11'),
(52, 48, 12, 41, NULL, NULL, 39, 'اسئلة الدرس', 'public/material/ksDLNT12AXFZpnvB08Ry87PQDvcI7FTJwGOtgMom.pdf', 'public/material/K6uiMCekYAkSqvWRrWA7tFxz6s05r8PBmJEdmadU.jpeg', '2022-10-10 18:57:00', '2022-10-10 18:57:00'),
(53, 48, 12, 41, NULL, NULL, 39, 'اجابة اسئلة الدرس', 'public/material/fyiSZB43vNbE2SE9u6V9tXMZ8YVUfC7qRDb9WBPP.pdf', 'public/material/XhaHdP5wEku0ZqCQV9pKpoeJSp0cNOyIJ0tjPvJ0.jpeg', '2022-10-10 18:58:14', '2022-10-10 18:58:14'),
(55, 58, 22, 42, NULL, NULL, 39, 'محتويات المنهج', 'public/material/b6wrepmTU4jJCvzvEbH5FndBGz1s3QlqQxJye8v9.pdf', 'public/material/KPFSADU4Y9qVTo61vjWOeFN5V9yxx9xsYvC3zH5X.jpeg', '2022-10-10 19:35:17', '2022-10-10 19:35:17'),
(56, 58, 22, 42, NULL, NULL, 39, 'شرح الدرس', 'public/material/fZcbl5vYwNUYSY6YQdtGhf2LNQB8YjEKAGzdwLEw.pdf', 'public/material/gSyQPG7fIkF9mjmYsM9iizE33oXgMfkEjDtrwbH2.jpeg', '2022-10-10 19:36:21', '2022-10-10 19:36:21'),
(57, 58, 22, 42, NULL, NULL, 39, 'أسئلة الدرس', 'public/material/ftNrCdWwFn2asC0EhTglCFgsWnohdj8HBHJoscax.pdf', 'public/material/fOnMT4Gtl72z1omRl7hAWHx7mNJG7WXcbh358u3Q.jpeg', '2022-10-10 19:37:35', '2022-10-10 19:37:35'),
(58, 58, 22, 42, NULL, NULL, 39, 'إجابة أسئلة الدرس', 'public/material/ojSk9U7zzvVKllnlziaXYvt1l1A83WRkkYDuRqGJ.pdf', 'public/material/BxvzESmrdgmTxsRqMNwuqObWp7S8Ir8TsXC4GE33.jpeg', '2022-10-10 19:38:34', '2022-10-10 19:38:34'),
(59, 68, 32, 43, NULL, NULL, 39, 'محتويات المنهج', 'public/material/kJ7SX9bUaRB6MLj3tfpwl0AZayENZtyGWYTEjQOb.pdf', 'public/material/P8Ey4u0Quj3KRPon7CTN6dqbhTsi7XBVn7eXQhAX.jpeg', '2022-10-10 19:40:38', '2022-10-10 19:40:38'),
(60, 68, 32, 43, NULL, NULL, 39, 'شرح الدرس', 'public/material/wvSykvF4JaSY4nRMQKaHtMlwMjnQ8fqVoVMtOeVq.pdf', 'public/material/xPtQHMeO4HXEAWGQgAZGEflYxfQ7TfYYO94V6gZa.jpeg', '2022-10-10 19:41:38', '2022-10-10 19:41:38'),
(61, 68, 32, 43, NULL, NULL, 39, 'أسئلة الدرس', 'public/material/HtouK1kSELjpqWdIV8lxq5O2qNrWBa44b4xEG3yr.pdf', 'public/material/N1NMuXOlw79w6pmIXGdHeHBiW48ySDDpIMlmfeIA.jpeg', '2022-10-10 19:43:14', '2022-10-10 19:43:14'),
(62, 68, 32, 43, NULL, NULL, 39, 'إجابة أسئلة الدرس', 'public/material/WGdPn8yy7yWbzY9nYiELPcWWBFGgQcwdIQ4sRnw2.pdf', 'public/material/4OsOd6jaITOlqgLNxaWupzFNGbTDERyh9pzjnlfS.jpeg', '2022-10-10 19:44:09', '2022-10-10 19:44:09'),
(63, 39, 3, 2, 28, NULL, 39, 'محتويات المنهج', 'public/material/RNZIDIQvyiyXtM2G2rHpnYbJUhslIdRH8YBGDd0c.pdf', 'public/material/85tpDSouAVWTfhk7hI03pMFRJMTNWhPggcJjmkw9.jpeg', '2022-10-12 03:42:01', '2022-10-12 03:42:01'),
(64, 39, 3, 2, 28, NULL, 39, 'شرح الوحدة', 'public/material/KtrF9QVcKFzDw9A8JwUHEb83IpSLdhX03XFHtJJF.pdf', 'public/material/UZvGK4t01xsL2IRU5I1EDQRdsQnOkbEUZPF1eWYk.jpeg', '2022-10-12 03:42:53', '2022-10-12 03:42:53'),
(65, 39, 3, 2, 28, NULL, 39, 'أسئلة الوحدة', 'public/material/GwDrpEerx1Uc3qRvwnaxCyc5M2gPGhThcbJIcj57.pdf', 'public/material/W73uUR69gUsIQjp1jH5CXIfASB7hp8h9Pmgurn11.jpeg', '2022-10-12 03:43:49', '2022-10-12 03:43:49'),
(66, 39, 3, 2, 28, NULL, 39, 'اجابة أسئلة الوحدة', 'public/material/sr4IonFCiXn5lNAdUboHppRpPCUoE8KzlA5QRMlB.pdf', 'public/material/RzaxPuc1Pe7eG4gqMosCaxCKhpx31TpBeuCci1tS.jpeg', '2022-10-12 03:53:12', '2022-10-12 03:53:12'),
(68, 80, 44, 44, 29, NULL, 39, 'محتويات المنهج', 'public/material/eUuS1HbeWijPMBnTa00gLccyDoIT3wkEuDnKfj84.pdf', 'public/material/4jFxhMf82iYxp1JR5jDt9gTCamJaNta1Iid6jHEU.jpeg', '2022-10-12 03:56:35', '2022-10-12 03:56:35'),
(69, 80, 44, 44, 29, NULL, 39, 'شرح الوحدة', 'public/material/XAZ1vm7CJwcepia51L4VOI79teMKvvxYDxBHlC6j.pdf', 'public/material/A4eXtEQjHTHvLHf035yMXJbGs9dgwZ4Yy2GoKpT9.jpeg', '2022-10-12 03:57:31', '2022-10-12 03:57:31'),
(70, 80, 44, 44, 29, NULL, 39, 'أسئلة الوحدة', 'public/material/vlyXL8XnCUqR4FALWM6KgdMYok6hbmu9oFXmxGQf.pdf', 'public/material/Vd6lgoq5VWZ8O1xsmPG9e8ZlpRoDDaxCSqNUyPcD.jpeg', '2022-10-12 03:58:26', '2022-10-12 03:58:26'),
(71, 80, 44, 44, 29, NULL, 39, 'اجابة أسئلة الوحدة', 'public/material/Cvrv19dop6ZnXUsydGJyIUdzFpoabNZKL2q6H97s.pdf', 'public/material/EqvIDyW4YNsFyX6B0fyEIvkm0D96bZHhFU8ah2Yv.jpeg', '2022-10-12 03:59:59', '2022-10-12 03:59:59'),
(72, 49, 13, 48, 30, NULL, 39, 'محتويات المنهج', 'public/material/Jm5lZlaYWS49Hdl83LnJ7DNXdqLulhahw6X0mStd.pdf', 'public/material/f3SNWVxrT7JSypidJQW4IgtDBFTWC5S5lNT5w0nY.jpeg', '2022-10-12 04:01:11', '2022-10-12 04:01:11'),
(73, 49, 13, 48, 30, NULL, 39, 'شرح الوحدة', 'public/material/j21ECAPOJzkAi7abSk7367VR1JolFMIJvm4gVyW9.pdf', 'public/material/p3gNcQBDCJJECtjEFW0SWFhVz5QZax0riGqdc4iS.jpeg', '2022-10-12 04:02:44', '2022-10-12 04:02:44'),
(74, 49, 13, 48, 30, NULL, 39, 'أسئلة الوحدة', 'public/material/FI2vzHCfMjjL4qUe7vrOwsXJrHg5CZlTAItPAsd3.pdf', 'public/material/mBrdBsSm0qyRybGhm6N7qSjXQjY95tZ5aUJijR73.jpeg', '2022-10-12 04:03:40', '2022-10-12 04:03:40'),
(75, 49, 13, 48, 30, NULL, 39, 'اجابة أسئلة الوحدة', 'public/material/u1ucO3ghUXwJiHMmvwG2dYG3wqDM5TBHEMfkULNT.pdf', 'public/material/CH0VlOBXaFfItlkSTamtxfsEuXrKhSRRTRl5gfzj.jpeg', '2022-10-12 04:06:09', '2022-10-12 04:06:09'),
(76, 59, 23, 52, 31, NULL, 39, 'محتويات المنهج', 'public/material/cd9ACO6PgHi8wpGG0ITpLDjIVa0hH13ISOrrqOqU.pdf', 'public/material/ghWTPKaCHASIeIaeU829pKftAih3i8bQIvuFzvhK.jpeg', '2022-10-12 04:09:00', '2022-10-12 04:09:00'),
(77, 59, 23, 52, 31, NULL, 39, 'شرح الوحدة', 'public/material/633k27nSDxELemTv5PiDuGeaDD2s9F3Jy0k04FMr.pdf', 'public/material/LTtJe4OR43bkn58Ql7R5uGNtW0wYIa70Cx1A6WQP.jpeg', '2022-10-12 04:11:32', '2022-10-12 04:11:32'),
(78, 59, 23, 52, 31, NULL, 39, 'أسئلة الوحدة', 'public/material/0VmJ1NoyF3KTEEc1txpVZohfhi0cuVkbCAxo5Tzv.pdf', 'public/material/k1nWkwMGNJkR5Bqge3RZhKQTYKQZEY9BZtPAupTI.jpeg', '2022-10-12 04:13:58', '2022-10-12 04:13:58'),
(79, 59, 23, 52, 31, NULL, 39, 'اجابة أسئلة الوحدة', 'public/material/clMjLQOj6n9T3W01hPpnuwNbb3u2cxLtV4WQIbQy.pdf', 'public/material/1gnZGG5NK9s5lUk0PjLbMPxTZzhIDeJlQ3iP2QVx.jpeg', '2022-10-12 04:15:25', '2022-10-12 04:15:25'),
(80, 69, 33, 56, 32, NULL, 39, 'محتويات المنهج', 'public/material/OFksl6YRIPKeGJD4n0bBI9aI1egGQcoqbZlhdVTO.pdf', 'public/material/uGWJYXOAxubeHf0spuiVNQTE0GMe9UEYzgsqU5pO.jpeg', '2022-10-12 05:18:08', '2022-10-12 05:18:08'),
(81, 69, 33, 56, 32, NULL, 39, 'محتويات المنهج', 'public/material/7r3eIhpN08GjniRqQ1NGPX9g2VfZxaN0UuY5ZRPK.pdf', 'public/material/xZtDjm9BhZclS23ZPKtuxZFHmw5he07upfA52ElX.jpeg', '2022-10-12 05:18:12', '2022-10-12 05:18:12'),
(82, 69, 33, 56, 32, NULL, 39, 'شرح الوحدة', 'public/material/hjWz4v1tSTnjUc89re0RvafoM8p46YNTSbBI00E2.pdf', 'public/material/ILA0pAPQ4wSGpjsUmF8hwiLfKbEb9wNCCBQ44WQw.jpeg', '2022-10-12 05:19:39', '2022-10-12 05:19:39'),
(83, 69, 33, 56, 32, NULL, 39, 'أسئلة الوحدة', 'public/material/quDjHHZCgq02NNh3bDUEW1FS5DzVHSSGJR0qkwdu.pdf', 'public/material/FJflQMZcjgqMCCEXmVZfq7nK5qiCzkn2YtomfWWW.jpeg', '2022-10-12 05:20:34', '2022-10-12 05:20:34'),
(84, 69, 33, 56, 32, NULL, 39, 'اجابة أسئلة الوحدة', 'public/material/YOW3pNAmffgoC2YxlyrgpSv50SJABrLItgvLkm7u.pdf', 'public/material/7ho2pkxbcEkJxvWA6MgZ3e4kX2Le3PZVM4GCb5z6.jpeg', '2022-10-12 05:21:55', '2022-10-12 05:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `to_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sight` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_images`
--

CREATE TABLE `message_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_04_03_200456_create_exams_table', 1),
(2, '2020_06_08_205317_create_active_answers_table', 2),
(3, '2020_09_22_094613_create_correct_answers_table', 3),
(4, '2020_09_22_094917_create_wrong_answers_table', 3),
(5, '2020_09_23_140714_create_zones_table', 4),
(6, '2020_09_23_140815_create_countries_table', 4),
(7, '2020_09_23_140832_create_zone_countries_table', 4),
(8, '2020_09_24_111933_create_zone_prices_table', 5),
(9, '2020_09_23_140833_create_zone_countries_table', 6),
(10, '2020_09_24_111934_create_zone_prices_table', 6),
(11, '2020_10_12_155848_create_event_free_packages_table', 7),
(12, '2020_10_22_214636_create_agents_table', 8),
(13, '2021_01_15_154409_create_paths_table', 9),
(14, '2021_01_15_154803_create_path_courses_table', 9),
(15, '2021_01_15_154819_create_course_parts_table', 9),
(16, '2021_01_15_154832_create_part_chapters_table', 9),
(17, '2021_01_15_154848_create_chapter_topics_table', 9),
(18, '2021_01_15_185702_create_question_answers_table', 10),
(19, '2021_01_15_185701_create_question_answers_table', 11),
(20, '2021_01_15_185703_create_question_answers_table', 12),
(21, '2021_01_15_781110_create_questions_table', 13),
(22, '2021_01_15_781115_create_questions_table', 14),
(23, '2021_01_16_142959_create_super_admins_table', 15),
(24, '2021_01_28_150546_create_passages_table', 16),
(25, '2021_02_03_142422_create_question_tags_table', 17),
(26, '2021_02_03_142919_create_exam_questions_table', 17),
(27, '2021_02_12_212752_create_explanations_table', 18),
(28, '2021_04_04_200457_create_exams_table', 19),
(29, '2021_02_03_142423_create_question_tags_table', 20),
(30, '2021_04_13_214933_create_topic_skills_table', 21),
(31, '2021_01_15_781116_create_questions_table', 22),
(32, '2021_01_15_781117_create_questions_table', 23),
(33, '2022_02_16_132104_create_stages_table', 24),
(34, '2022_02_16_132442_create_stage_exams_table', 24),
(35, '2022_02_16_132845_create_package_stages_table', 24),
(36, '2022_09_19_152324_create_video_upload_histories_table', 25),
(37, '2022_09_19_152325_create_video_upload_histories_table', 26),
(38, '2022_09_19_152326_create_video_upload_histories_table', 27),
(39, '2022_09_19_152327_create_video_upload_histories_table', 28),
(40, '2022_09_20_193218_create_video_distributions_table', 29),
(41, '2018_11_15_101613_create_videos_table', 30),
(42, '2022_09_21_101228_create_video_attachments_table', 31),
(43, '2022_09_23_190855_create_skill_levels_table', 32),
(44, '2018_04_18_124691_create_packages_table', 33),
(45, '2022_09_24_135453_create_package_exams_table', 34),
(46, '2022_09_24_135823_create_package_scoops_table', 34),
(47, '2022_09_24_200230_create_materials_table', 35);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sight` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0b7064de12fe3f43bca2a670f20464c6cbbc32b96c57a47ab8b93734d5708bbd00c6c9bc1de650f1', 20, 4, NULL, '[]', 0, '2022-12-29 09:47:32', '2022-12-29 09:47:32', '2023-12-29 10:47:32'),
('2a506dbf66f96df5d693a7bfc27b3c459b22bbae93c062e5d7379076e1ff57c45fbf11ffee788b69', 5, 4, NULL, '[]', 0, '2020-05-08 00:29:37', '2020-05-08 00:29:37', '2021-05-08 02:29:37'),
('588d19c9845a509abf903f978158f3fd18a5f590db05040aebe739e17f1e608a88a8c0d4c7803e59', 5, 4, NULL, '[]', 0, '2020-08-27 13:32:49', '2020-08-27 13:32:49', '2021-08-27 15:32:49'),
('5a4a0024fa8f9972810e3561a8268db268846723b2c6797c8619ca55f15b7055b71257222e5be040', 20, 4, NULL, '[]', 0, '2022-12-29 09:49:46', '2022-12-29 09:49:46', '2023-12-29 10:49:46'),
('5af5ff686f0a942d6311fca9e304e9361f862d8f1acfcf42132e3e459223d250a6a8420b14e53643', 5, 4, NULL, '[]', 0, '2020-05-02 17:42:31', '2020-05-02 17:42:31', '2021-05-02 19:42:31'),
('64b42ca0094954ee631a6b177af531b94f99a20cf9036be032a63d0c832578bc9ffc196a52c6d5bd', 5, 4, NULL, '[]', 0, '2020-05-01 21:28:49', '2020-05-01 21:28:49', '2021-05-01 23:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(3, NULL, 'PM-Tricks Personal Access Client', 'MYK3VAFG98SQKUZC6w4B7Hqezipuy25IlecV2iZP', 'http://localhost', 1, 0, 0, '2019-10-30 19:01:09', '2019-10-30 19:01:09'),
(4, NULL, 'PM-Tricks Password Grant Client', 'DKWlUjiodz7fibjycPgQbtw86NFDTqAh3kLcsdUv', 'http://localhost', 0, 1, 0, '2019-10-30 19:01:10', '2019-10-30 19:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-07-01 15:43:09', '2018-07-01 15:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('0dc2305494cc7a65c7542b67fad56d6a28775938c69661ff95dbef18653eae8f865e8c8b8d485d74', '5a4a0024fa8f9972810e3561a8268db268846723b2c6797c8619ca55f15b7055b71257222e5be040', 0, '2023-12-29 10:49:46'),
('41157d5212dd92fa15e79754cff59f38789998373b6557223db674a5eda8b7d843747ff8fee43356', '2a506dbf66f96df5d693a7bfc27b3c459b22bbae93c062e5d7379076e1ff57c45fbf11ffee788b69', 0, '2021-05-08 02:29:38'),
('4278a52e1db109facaefa5e817e0ea59ceb38528152b6db84512010b4fadf26cd6e3d9655abb7697', '64b42ca0094954ee631a6b177af531b94f99a20cf9036be032a63d0c832578bc9ffc196a52c6d5bd', 0, '2021-05-01 23:28:49'),
('68393e73ecf1d3f3cca7f2c5732da94388e3a6c558ad33e021dfd8e63d6ec4502255579408154325', '5af5ff686f0a942d6311fca9e304e9361f862d8f1acfcf42132e3e459223d250a6a8420b14e53643', 0, '2021-05-02 19:42:32'),
('6ccf47c66fcb155eb61540665cedde4ba43af4a26bbb64fd35943d84e00564749b8755bd85c6714c', '0b7064de12fe3f43bca2a670f20464c6cbbc32b96c57a47ab8b93734d5708bbd00c6c9bc1de650f1', 0, '2023-12-29 10:47:32'),
('a318e3d2168d96c6305ba4ad7e5ff7c290b239d694001fdf306032a0840c352f0711d57abf87a05c', '588d19c9845a509abf903f978158f3fd18a5f590db05040aebe739e17f1e608a88a8c0d4c7803e59', 0, '2021-08-27 15:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `slug` mediumtext COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `renew_period_in_days` int(5) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `what_you_learn` longtext COLLATE utf8mb4_unicode_ci,
  `requirement` longtext COLLATE utf8mb4_unicode_ci,
  `who_course_for` longtext COLLATE utf8mb4_unicode_ci,
  `enroll_msg` longtext COLLATE utf8mb4_unicode_ci,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview_video_url` mediumtext COLLATE utf8mb4_unicode_ci,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `approved` tinyint(4) DEFAULT NULL,
  `popular` tinyint(4) NOT NULL DEFAULT '1',
  `certification` tinyint(4) NOT NULL DEFAULT '0',
  `certification_title` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `admin_id`, `slug`, `name`, `original_price`, `price`, `discount`, `renew_period_in_days`, `description`, `what_you_learn`, `requirement`, `who_course_for`, `enroll_msg`, `lang`, `img`, `preview_video_url`, `active`, `approved`, `popular`, `certification`, `certification_title`, `created_at`, `updated_at`) VALUES
(1, 32, 'test-product-1', 'Test Product 1', '240.00', '216.00', '10.00', 30, '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', 'English', 'public/package/imgs/65bd2c9b931f057d7307dfaaa8d5c433.png', NULL, 1, 0, 1, 0, NULL, '2022-09-25 19:36:02', '2022-10-07 16:22:18'),
(2, 3, '', 'باقة تجريبية', '100.00', '90.00', '10.00', NULL, '<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>', '<p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام &quot;هنا يوجد محتوى نصي، هنا يوجد محتوى نصي&quot; فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال &quot;lorem ipsum&quot; في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.</p>', '<p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت.</p>', '<p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت.</p>', '<p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت.</p>', 'English & Arabic', 'public/package/imgs/fdd48876c7111f142afb717a6c6a928c.PNG', NULL, 1, 0, 1, 0, NULL, '2022-10-07 16:27:56', '2022-10-21 13:58:43'),
(3, 3, '-3', 'باقة اللغة الإنجليزية', '0.00', '0.00', '0.00', 30, '<p>asdjfk</p>', '<p>sdfljk</p>', '<p>lkjsdfklj</p>', '<p>lkjsdf</p>', '<p>slkdfj</p>', 'Arabic', 'public/package/imgs/65bd2c9b931f057d7307dfaaa8d5c433.png', NULL, 1, NULL, 1, 0, NULL, '2022-10-09 19:40:05', '2022-10-09 19:40:05'),
(4, 3, '-4', 'الباقة الشاملة', '100.00', '25.00', '75.00', 30, '<p>مشنسيتب</p>', '<p>منتسيمبنت</p>', '<p>منتسيبمن</p>', '<p>منتسيبمن</p>', '<p>نمتسيب</p>', 'Arabic', 'public/package/imgs/8aa9754c626bd0360de11524bc9fcdbf.PNG', NULL, 1, 0, 1, 0, NULL, '2022-10-09 19:55:40', '2022-10-21 13:58:54'),
(5, 3, 'sldfjk', 'sldfjk', '0.00', '0.00', '0.00', 50, '<p>klj</p>', '<p>lk</p>', '<p>jlk</p>', '<p>j</p>', '<p>kj</p>', 'English', 'public/package/imgs/5bac20d7f23c9b38d471921309a56b67.PNG', NULL, 0, NULL, 1, 0, NULL, '2022-10-09 21:06:19', '2022-10-09 21:06:19'),
(6, 3, '-6', 'منيتمنس', '0.00', '0.00', '0.00', 50, '<p>نتمن</p>', '<p>منت</p>', '<p>منت</p>', '<p>منت</p>', '<p>منت</p>', 'English', 'public/package/imgs/5bac20d7f23c9b38d471921309a56b67.PNG', NULL, 0, NULL, 1, 0, NULL, '2022-10-09 21:07:50', '2022-10-09 21:07:50'),
(7, 3, 'test2', 'test2', '50.00', '50.00', '0.00', NULL, '<p>test&nbsp;</p>', '<p>test&nbsp;</p>', '<p>test&nbsp;</p>', '<p>test&nbsp;</p>', '<p>test&nbsp;</p>', 'Arabic', 'public/package/imgs/291ee3722f0dc419083aadea520bde93.png', NULL, 1, 0, 1, 0, NULL, '2022-10-14 13:48:05', '2022-10-21 13:59:08'),
(8, 3, 'test', 'testtest', '100.00', '90.00', '10.00', NULL, '<p>تحتوي علي كذا وكذا&nbsp;</p>', '<p>لطلبة لتعلم&nbsp;</p>', '<p>منالستنستنلكسيل</p>', '<p>لطاتليمشابيبيب</p>', NULL, 'Arabic', 'public/package/imgs/908136369b61e06cf63ccf8bacdca48d.png', NULL, 1, 1, 1, 0, NULL, '2022-10-20 17:02:35', '2022-12-07 19:06:18'),
(9, 3, 'test-2', 'test 2', '0.00', '0.00', '0.00', 30, '<p>asdasd</p>', '<p>asdasd</p>', '<p>asdasd</p>', '<p>asdasd</p>', '<p>saddasd</p>', 'Arabic', 'public/package/imgs/09d58e79587cf76d4ab2c48331842f0f.png', NULL, 1, NULL, 1, 0, NULL, '2022-12-07 19:04:47', '2022-12-07 19:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `package_exams`
--

CREATE TABLE `package_exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_exams`
--

INSERT INTO `package_exams` (`id`, `package_id`, `exam_id`, `created_at`, `updated_at`) VALUES
(1, 7, 1, '2022-10-14 13:48:05', '2022-10-14 13:48:05'),
(2, 7, 2, '2022-10-14 13:48:05', '2022-10-14 13:48:05'),
(3, 7, 4, '2022-10-14 13:48:05', '2022-10-14 13:48:05'),
(4, 8, 1, '2022-10-20 17:02:35', '2022-10-20 17:02:35'),
(5, 8, 2, '2022-10-20 17:02:35', '2022-10-20 17:02:35'),
(6, 8, 4, '2022-10-20 17:02:35', '2022-10-20 17:02:35'),
(7, 9, 1, '2022-12-07 19:04:47', '2022-12-07 19:04:47'),
(8, 9, 2, '2022-12-07 19:04:47', '2022-12-07 19:04:47'),
(9, 9, 4, '2022-12-07 19:04:47', '2022-12-07 19:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `package_extensions`
--

CREATE TABLE `package_extensions` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `package_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expire_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_scoops`
--

CREATE TABLE `package_scoops` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `part_id` int(10) UNSIGNED DEFAULT NULL,
  `chapter_id` int(10) UNSIGNED DEFAULT NULL,
  `topic_id` int(10) UNSIGNED DEFAULT NULL,
  `skill_id` int(10) UNSIGNED DEFAULT NULL,
  `level_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_scoops`
--

INSERT INTO `package_scoops` (`id`, `package_id`, `part_id`, `chapter_id`, `topic_id`, `skill_id`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 1, 38, NULL, NULL, NULL, NULL, '2022-09-25 19:36:02', '2022-09-25 19:36:02'),
(2, 1, 39, NULL, NULL, NULL, NULL, '2022-09-25 19:36:02', '2022-09-25 19:36:02'),
(3, 2, 48, NULL, NULL, NULL, NULL, '2022-10-07 16:27:56', '2022-10-07 16:27:56'),
(4, 2, 57, NULL, NULL, NULL, NULL, '2022-10-07 16:27:56', '2022-10-07 16:27:56'),
(5, 3, 39, NULL, NULL, NULL, NULL, '2022-10-09 19:40:05', '2022-10-09 19:40:05'),
(6, 4, 38, NULL, NULL, NULL, NULL, '2022-10-09 19:55:40', '2022-10-09 19:55:40'),
(7, 4, 39, NULL, NULL, NULL, NULL, '2022-10-09 19:55:40', '2022-10-09 19:55:40'),
(8, 4, 40, NULL, NULL, NULL, NULL, '2022-10-09 19:55:40', '2022-10-09 19:55:40'),
(9, 5, 39, NULL, NULL, NULL, NULL, '2022-10-09 21:06:19', '2022-10-09 21:06:19'),
(10, 5, 40, NULL, NULL, NULL, NULL, '2022-10-09 21:06:19', '2022-10-09 21:06:19'),
(11, 6, 39, NULL, NULL, NULL, NULL, '2022-10-09 21:07:50', '2022-10-09 21:07:50'),
(12, 7, 38, NULL, NULL, NULL, NULL, '2022-10-14 13:48:05', '2022-10-14 13:48:05'),
(13, 7, 39, NULL, NULL, NULL, NULL, '2022-10-14 13:48:05', '2022-10-14 13:48:05'),
(14, 7, 40, NULL, NULL, NULL, NULL, '2022-10-14 13:48:05', '2022-10-14 13:48:05'),
(15, 8, 48, NULL, NULL, NULL, NULL, '2022-10-20 17:02:35', '2022-10-20 17:02:35'),
(16, 8, 54, NULL, NULL, NULL, NULL, '2022-10-20 17:02:35', '2022-10-20 17:02:35'),
(17, 8, 55, NULL, NULL, NULL, NULL, '2022-10-20 17:02:35', '2022-10-20 17:02:35'),
(18, 8, 57, NULL, NULL, NULL, NULL, '2022-10-20 17:02:35', '2022-10-20 17:02:35'),
(19, 9, 38, NULL, NULL, NULL, NULL, '2022-12-07 19:04:47', '2022-12-07 19:04:47'),
(20, 9, 39, NULL, NULL, NULL, NULL, '2022-12-07 19:04:47', '2022-12-07 19:04:47'),
(21, 9, 40, NULL, NULL, NULL, NULL, '2022-12-07 19:04:47', '2022-12-07 19:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `page` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `role_id`, `page`, `created_at`, `updated_at`) VALUES
(1, 3, 'Videos', '2021-02-10 22:00:00', '2021-02-10 22:00:00'),
(2, 3, 'Questions', '2021-02-10 22:00:00', '2021-02-10 22:00:00'),
(3, 3, 'Material', '2022-09-23 22:00:00', '2022-09-23 22:00:00'),
(4, 3, 'Package', '2022-09-23 22:00:00', '2022-09-23 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `page_admin`
--

CREATE TABLE `page_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `is_granted` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_admin`
--

INSERT INTO `page_admin` (`id`, `page_id`, `admin_id`, `permission_id`, `is_granted`, `created_at`, `updated_at`) VALUES
(343, 3, 39, 1, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(344, 3, 39, 2, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(345, 3, 39, 3, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(346, 3, 39, 4, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(347, 1, 3, 1, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(348, 1, 3, 2, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(349, 1, 3, 3, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(350, 1, 3, 4, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(351, 2, 3, 1, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(352, 2, 3, 2, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(353, 2, 3, 3, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(354, 2, 3, 4, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(355, 3, 3, 1, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(356, 3, 3, 2, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(357, 3, 3, 3, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(358, 3, 3, 4, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(359, 4, 3, 1, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(360, 4, 3, 2, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(361, 4, 3, 3, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(362, 4, 3, 4, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `page_comments`
--

CREATE TABLE `page_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sight` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `part_chapters`
--

CREATE TABLE `part_chapters` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `part_chapters`
--

INSERT INTO `part_chapters` (`id`, `title`, `part_id`, `created_at`, `updated_at`) VALUES
(2, 'الفصل الدراسي الأول', 38, '2022-09-23 20:12:14', '2022-10-06 07:19:52'),
(3, 'الفصل الدراسي الأول', 39, '2022-09-23 20:12:15', '2022-10-06 07:20:54'),
(4, 'الفصل الدراسي الأول', 40, '2022-09-23 20:12:15', '2022-10-06 07:21:21'),
(5, 'الفصل الدراسي الأول', 41, '2022-09-23 20:12:16', '2022-10-06 07:21:29'),
(6, 'الفصل الدراسي الأول', 42, '2022-09-23 20:12:16', '2022-10-06 07:21:38'),
(7, 'الفصل الدراسي الأول', 43, '2022-09-23 20:12:16', '2022-10-06 07:21:46'),
(8, 'الفصل الدراسي الأول', 44, '2022-09-23 20:12:16', '2022-10-06 07:21:54'),
(9, 'الفصل الدراسي الأول', 45, '2022-09-23 20:12:17', '2022-10-06 07:22:04'),
(10, 'الفصل الدراسي الأول', 46, '2022-09-23 20:12:17', '2022-10-06 07:22:12'),
(11, 'الفصل الدراسي الأول', 47, '2022-09-23 20:12:18', '2022-10-06 07:22:22'),
(12, 'الفصل الدراسي الأول', 48, '2022-09-23 20:12:18', '2022-10-06 07:22:31'),
(13, 'الفصل الدراسي الأول', 49, '2022-09-23 20:12:18', '2022-10-06 07:22:40'),
(14, 'الفصل الدراسي الأول', 50, '2022-09-23 20:12:18', '2022-10-06 07:22:50'),
(15, 'الفصل الدراسي الأول', 51, '2022-09-23 20:12:18', '2022-10-06 07:23:03'),
(16, 'الفصل الدراسي الأول', 52, '2022-09-23 20:12:18', '2022-10-06 07:23:25'),
(17, 'الفصل الدراسي الأول', 53, '2022-09-23 20:12:18', '2022-10-06 07:23:39'),
(18, 'الفصل الدراسي الأول', 54, '2022-09-23 20:12:18', '2022-10-06 07:23:50'),
(19, 'الفصل الدراسي الأول', 55, '2022-09-23 20:12:19', '2022-10-06 07:24:00'),
(20, 'الفصل الدراسي الأول', 56, '2022-09-23 20:12:19', '2022-10-06 07:24:09'),
(21, 'الفصل الدراسي الأول', 57, '2022-09-23 20:12:19', '2022-10-06 07:24:19'),
(22, 'الفصل الدراسي الأول', 58, '2022-09-23 20:12:19', '2022-10-06 07:24:28'),
(23, 'الفصل الدراسي الأول', 59, '2022-09-23 20:12:19', '2022-10-06 07:24:38'),
(24, 'الفصل الدراسي الأول', 60, '2022-09-23 20:12:19', '2022-10-06 07:24:51'),
(25, 'الفصل الدراسي الأول', 61, '2022-09-23 20:12:19', '2022-10-06 07:25:00'),
(26, 'الفصل الدراسي الأول', 62, '2022-09-23 20:12:19', '2022-10-06 07:25:08'),
(27, 'الفصل الدراسي الأول', 63, '2022-09-23 20:12:19', '2022-10-06 07:25:17'),
(28, 'الفصل الدراسي الأول', 64, '2022-09-23 20:12:20', '2022-10-06 07:25:26'),
(29, 'الفصل الدراسي الأول', 65, '2022-09-23 20:12:20', '2022-10-06 07:25:36'),
(30, 'الفصل الدراسي الأول', 66, '2022-09-23 20:12:20', '2022-10-06 07:25:46'),
(31, 'الفصل الدراسي الأول', 67, '2022-09-23 20:12:20', '2022-10-06 07:25:54'),
(32, 'الفصل الدراسي الأول', 68, '2022-09-23 20:12:20', '2022-10-06 07:26:03'),
(33, 'الفصل الدراسي الأول', 69, '2022-09-23 20:12:20', '2022-10-06 07:26:10'),
(34, 'الفصل الدراسي الأول', 70, '2022-09-23 20:12:20', '2022-10-06 07:26:22'),
(35, 'الفصل الدراسي الأول', 71, '2022-09-23 20:12:20', '2022-10-06 07:30:38'),
(36, 'الفصل الدراسي الأول', 72, '2022-09-23 20:12:21', '2022-10-06 07:30:47'),
(37, 'الفصل الدراسي الأول', 73, '2022-09-23 20:12:21', '2022-10-06 07:30:54'),
(38, 'الفصل الدراسي الأول', 74, '2022-09-23 20:12:21', '2022-10-06 07:31:07'),
(39, 'الفصل الدراسي الأول', 75, '2022-09-23 20:12:21', '2022-10-06 07:31:17'),
(40, 'الفصل الدراسي الأول', 76, '2022-09-23 20:12:21', '2022-10-06 07:31:24'),
(41, 'الفصل الدراسي الأول', 77, '2022-09-23 20:12:21', '2022-10-06 07:31:33'),
(42, 'الفصل الدراسي الأول', 78, '2022-09-23 20:12:21', '2022-10-06 07:31:41'),
(43, 'الفصل الدراسي الأول', 79, '2022-09-23 20:12:21', '2022-10-06 07:31:50'),
(44, 'الفصل الدراسي الأول', 80, '2022-09-23 20:12:22', '2022-10-06 07:32:17'),
(45, 'الفصل الدراسي الأول', 81, '2022-09-23 20:12:22', '2022-10-06 07:32:25'),
(46, 'الفصل الدراسي الأول', 82, '2022-09-23 20:12:22', '2022-10-06 07:32:33'),
(47, 'الفصل الدراسي الأول', 83, '2022-09-23 20:12:22', '2022-10-06 07:32:41'),
(48, 'الفصل الدراسي الأول', 84, '2022-09-23 20:12:22', '2022-10-06 07:32:49'),
(49, 'الفصل الدراسي الأول', 85, '2022-09-23 20:12:22', '2022-10-06 07:33:00'),
(50, 'الفصل الدراسي الأول', 86, '2022-09-23 20:12:22', '2022-10-06 07:33:09'),
(51, 'الفصل الدراسي الأول', 87, '2022-09-23 20:12:23', '2022-10-06 07:33:17'),
(52, 'الفصل الدراسي الأول', 88, '2022-09-23 20:12:23', '2022-10-06 07:33:30'),
(53, 'الفترة الدراسية الأولي', 99, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(54, 'الفترة الدراسية الأولي', 100, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(55, 'الفترة الدراسية الأولي', 101, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(56, 'الفترة الدراسية الأولي', 102, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(57, 'الفترة الدراسية الأولي', 103, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(58, 'الفترة الدراسية الأولي', 104, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(59, 'الفترة الدراسية الأولي', 105, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(60, 'الفترة الدراسية الأولي', 106, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(61, 'الفترة الدراسية الأولي', 107, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(62, 'الفترة الدراسية الأولي', 108, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(63, 'الفترة الدراسية الأولي', 109, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(64, 'الفترة الدراسية الأولي', 110, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(65, 'الفترة الدراسية الأولي', 111, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(66, 'الفترة الدراسية الأولي', 112, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(67, 'الفترة الدراسية الأولي', 113, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(68, 'الفترة الدراسية الأولي', 114, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(69, 'الفترة الدراسية الأولي', 115, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(70, 'الفترة الدراسية الأولي', 116, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(71, 'الفترة الدراسية الأولي', 117, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(72, 'الفترة الدراسية الأولي', 118, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(73, 'الفترة الدراسية الأولي', 119, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(74, 'الفترة الدراسية الأولي', 120, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(75, 'الفترة الدراسية الأولي', 121, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(76, 'الفترة الدراسية الأولي', 122, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(77, 'الفترة الدراسية الأولي', 123, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(78, 'الفترة الدراسية الأولي', 124, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(79, 'الفترة الدراسية الأولي', 125, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(80, 'الفترة الدراسية الأولي', 126, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(81, 'الفترة الدراسية الأولي', 127, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(82, 'الفترة الدراسية الأولي', 128, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(83, 'الفترة الدراسية الأولي', 129, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(84, 'الفترة الدراسية الأولي', 130, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(85, 'الفترة الدراسية الأولي', 131, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(86, 'الفترة الدراسية الأولي', 132, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(87, 'الفترة الدراسية الأولي', 133, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(88, 'الفترة الدراسية الأولي', 134, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(89, 'الفترة الدراسية الأولي', 135, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(90, 'الفترة الدراسية الأولي', 136, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(91, 'الفصل الدراسي الثاني', 38, '2022-10-06 07:34:27', '2022-10-06 07:34:27'),
(92, 'الفصل الدراسي الثاني', 39, '2022-10-06 07:34:49', '2022-10-06 07:34:49'),
(93, 'الفصل الدراسي الثاني', 40, '2022-10-06 07:34:58', '2022-10-06 07:34:58'),
(94, 'الفصل الدراسي الثاني', 41, '2022-10-06 07:35:06', '2022-10-06 07:35:06'),
(95, 'الفصل الدراسي الثاني', 42, '2022-10-06 07:35:18', '2022-10-06 07:35:18'),
(96, 'الفصل الدراسي الثاني', 43, '2022-10-06 07:35:28', '2022-10-06 07:35:28'),
(97, 'الفصل الدراسي الثاني', 44, '2022-10-06 07:35:41', '2022-10-06 07:35:41'),
(98, 'الفصل الدراسي الثاني', 45, '2022-10-06 07:35:58', '2022-10-06 07:35:58'),
(99, 'الفصل الدراسي الثاني', 46, '2022-10-06 07:36:07', '2022-10-06 07:36:07'),
(100, 'الفصل الدراسي الثاني', 47, '2022-10-06 07:36:15', '2022-10-06 07:36:15'),
(101, 'الفصل الدراسي الثاني', 48, '2022-10-06 07:36:33', '2022-10-06 07:36:33'),
(102, 'الفصل الدراسي الثاني', 49, '2022-10-06 07:36:43', '2022-10-06 07:36:43'),
(103, 'الفصل الدراسي الثاني', 50, '2022-10-06 07:36:59', '2022-10-06 07:36:59'),
(104, 'الفصل الدراسي الثاني', 51, '2022-10-06 07:37:13', '2022-10-06 07:37:13'),
(105, 'الفصل الدراسي الثاني', 52, '2022-10-06 07:37:27', '2022-10-06 07:37:27'),
(106, 'الفصل الدراسي الثاني', 53, '2022-10-06 07:37:50', '2022-10-06 07:37:50'),
(107, 'الفصل الدراسي الثاني', 54, '2022-10-06 07:37:58', '2022-10-06 07:37:58'),
(108, 'الفصل الدراسي الثاني', 55, '2022-10-06 07:40:15', '2022-10-06 07:40:15'),
(109, 'الفصل الدراسي الثاني', 56, '2022-10-06 07:40:31', '2022-10-06 07:40:31'),
(110, 'الفصل الدراسي الثاني', 57, '2022-10-06 07:41:08', '2022-10-06 07:41:08'),
(111, 'الفصل الدراسي الثاني', 79, '2022-10-06 07:42:13', '2022-10-06 07:42:13'),
(112, 'الفصل الدراسي الثاني', 80, '2022-10-06 07:42:22', '2022-10-06 07:42:22'),
(113, 'الفصل الدراسي الثاني', 81, '2022-10-06 07:42:30', '2022-10-06 07:42:30'),
(114, 'الفصل الدراسي الثاني', 82, '2022-10-06 07:42:39', '2022-10-06 07:42:39'),
(115, 'الفصل الدراسي الثاني', 83, '2022-10-06 07:42:53', '2022-10-06 07:42:53'),
(116, 'الفصل الدراسي الثاني', 84, '2022-10-06 07:43:02', '2022-10-06 07:43:02'),
(117, 'الفصل الدراسي الثاني', 85, '2022-10-06 07:43:13', '2022-10-06 07:43:13'),
(118, 'الفصل الدراسي الثاني', 86, '2022-10-06 07:43:23', '2022-10-06 07:43:23'),
(119, 'الفصل الدراسي الثاني', 87, '2022-10-06 07:43:45', '2022-10-06 07:43:45'),
(120, 'الفصل الدراسي الثاني', 88, '2022-10-06 07:43:58', '2022-10-06 07:43:58'),
(121, 'الفصل الدراسي الثاني', 58, '2022-10-06 07:44:24', '2022-10-06 07:44:24'),
(122, 'الفصل الدراسي الثاني', 59, '2022-10-06 07:44:34', '2022-10-06 07:44:34'),
(123, 'الفصل الدراسي الثاني', 60, '2022-10-06 07:44:42', '2022-10-06 07:44:42'),
(124, 'الفصل الدراسي الثاني', 61, '2022-10-06 07:44:51', '2022-10-06 07:44:51'),
(125, 'الفصل الدراسي الثاني', 62, '2022-10-06 07:44:59', '2022-10-06 07:44:59'),
(126, 'الفصل الدراسي الثاني', 63, '2022-10-06 07:45:08', '2022-10-06 07:45:08'),
(127, 'الفصل الدراسي الثاني', 64, '2022-10-06 07:45:17', '2022-10-06 07:45:17'),
(128, 'الفصل الدراسي الثاني', 65, '2022-10-06 07:45:25', '2022-10-06 07:45:25'),
(129, 'الفصل الدراسي الثاني', 66, '2022-10-06 07:45:34', '2022-10-06 07:45:34'),
(130, 'الفصل الدراسي الثاني', 67, '2022-10-06 07:45:42', '2022-10-06 07:45:42'),
(131, 'الفصل الدراسي الثاني', 68, '2022-10-06 07:46:41', '2022-10-06 07:46:41'),
(132, 'الفصل الدراسي الثاني', 69, '2022-10-06 07:46:51', '2022-10-06 07:46:51'),
(133, 'الفصل الدراسي الثاني', 70, '2022-10-06 07:47:00', '2022-10-06 07:47:00'),
(134, 'الفصل الدراسي الثاني', 71, '2022-10-06 07:47:09', '2022-10-06 07:47:09'),
(135, 'الفصل الدراسي الثاني', 72, '2022-10-06 07:47:19', '2022-10-06 07:47:19'),
(136, 'الفصل الدراسي الثاني', 73, '2022-10-06 07:47:27', '2022-10-06 07:47:27'),
(137, 'الفصل الدراسي الثاني', 74, '2022-10-06 07:47:36', '2022-10-06 07:47:36'),
(138, 'الفصل الدراسي الثاني', 75, '2022-10-06 07:47:45', '2022-10-06 07:47:45'),
(139, 'الفصل الدراسي الثاني', 76, '2022-10-06 07:47:55', '2022-10-06 07:47:55'),
(140, 'الفصل الدراسي الثاني', 77, '2022-10-06 07:48:03', '2022-10-06 07:48:03'),
(141, 'الفصل الدراسي الثاني', 78, '2022-10-06 07:48:12', '2022-10-06 07:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `passages`
--

CREATE TABLE `passages` (
  `id` int(10) UNSIGNED NOT NULL,
  `passage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('m0808nal@gmail.com', '$2y$10$gQkkWaVPzCNMSGjbzjAu7uX4AFK.otFOjgdUF40QQoSmCwQWq5.p.', '2022-03-31 17:56:43'),
('mhussein202055@gmail.com', '$2y$10$9zdYEvGmYPGxmF6Fg3x11.BLq09dNjOz/Ky/cakvWjaAM3XEdO7ui', '2022-05-06 15:02:53'),
('ahmed1@hotmail.com', '$2y$10$oLcDhCSgrrisEE24TcAo8.A654FuZtDwiMOn.j6G8CPTmYOJ5ZN9G', '2022-05-06 15:48:17'),
('mohamedbasha275@gmail.com', '$2y$10$Tu9frym4Lpoi5ZBLEjaJCuy2bR8n6MuCYTVNSL/7ThAzzEbcgahqW', '2022-05-06 15:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `paths`
--

CREATE TABLE `paths` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `z_index` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paths`
--

INSERT INTO `paths` (`id`, `title`, `country_id`, `z_index`, `created_at`, `updated_at`) VALUES
(4, 'المرحلة الثانوية', 115, 7, '2022-09-23 20:12:14', '2022-09-24 07:23:43'),
(7, 'المرحلة المتوسطة', 115, 6, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(8, 'المرحلة الإبتدائية', 115, 5, '2022-09-24 15:26:00', '2022-09-24 15:26:00'),
(9, 'مرحلة رياض الأطفال', 115, 4, '2022-09-24 15:31:59', '2022-09-24 15:31:59'),
(10, 'المرحلة الجامعية', 115, 8, '2022-09-24 15:41:25', '2022-09-24 15:41:25'),
(11, 'مرحلة الدراسات العليا', 115, 9, '2022-09-24 15:42:02', '2022-09-24 15:42:02'),
(12, 'مرحلة سوق العمل', 115, 10, '2022-09-24 15:42:28', '2022-09-24 15:42:28'),
(13, 'مرحلة رياض الأطفال', 63, NULL, '2022-09-24 15:43:51', '2022-09-24 15:43:51'),
(14, 'المرحلة الإبتدائية', 63, NULL, '2022-09-24 15:45:34', '2022-09-24 15:45:34'),
(15, 'المرحلة الإعدادية', 63, NULL, '2022-09-24 15:47:57', '2022-09-24 15:47:57'),
(16, 'المرحلة الثانوية', 63, NULL, '2022-09-24 15:49:02', '2022-09-24 15:49:02'),
(17, 'المرحلة الجامعية', 63, NULL, '2022-09-24 15:49:47', '2022-09-24 15:49:47'),
(18, 'مرحلة الدراسات العليا', 63, NULL, '2022-09-24 15:50:22', '2022-09-24 15:50:22'),
(19, 'مرحلة سوق العمل', 63, NULL, '2022-09-24 15:50:48', '2022-09-24 15:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `path_courses`
--

CREATE TABLE `path_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_id` int(10) UNSIGNED NOT NULL,
  `z_index` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `path_courses`
--

INSERT INTO `path_courses` (`id`, `title`, `path_id`, `z_index`, `created_at`, `updated_at`) VALUES
(2, 'العاشر', 4, 2, '2022-09-23 20:12:14', '2022-09-23 20:12:14'),
(3, 'الصف الحادي عشر الأدبي', 4, 3, '2022-09-23 20:12:18', '2022-09-23 20:12:18'),
(4, 'الصف الثاني عشر العلمي', 4, 6, '2022-09-23 20:12:19', '2022-09-23 20:12:19'),
(5, 'الصف الثاني عشر الأدبي', 4, 5, '2022-09-23 20:12:20', '2022-09-23 20:12:20'),
(6, 'الصف الحادي عشر العلمي', 4, 4, '2022-09-23 20:12:21', '2022-09-23 20:12:21'),
(12, 'الصف السادس', 7, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(13, 'الصف السابع', 7, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(14, 'الصف الثامن', 7, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(15, 'الصف التاسع', 7, NULL, '2022-09-24 15:22:55', '2022-09-24 15:22:55'),
(16, 'الصف الأول', 8, NULL, '2022-09-24 15:26:00', '2022-09-24 15:26:00'),
(17, 'الصف الثاني', 8, NULL, '2022-09-24 15:26:00', '2022-09-24 15:26:00'),
(18, 'الصف الثالث', 8, NULL, '2022-09-24 15:26:00', '2022-09-24 15:26:00'),
(19, 'الصف الرابع', 8, NULL, '2022-09-24 15:26:00', '2022-09-24 15:26:00'),
(20, 'الصف الخامس', 8, NULL, '2022-09-24 15:26:00', '2022-09-24 15:26:00'),
(21, 'جامعة الكويت', 10, NULL, '2022-09-24 15:41:25', '2022-09-24 15:41:25'),
(22, 'المعهدالتطبيقي', 10, NULL, '2022-09-24 15:41:25', '2022-09-24 15:41:25'),
(23, 'كلية التربية الاساسية', 10, NULL, '2022-09-24 15:41:25', '2022-09-24 15:41:25'),
(24, 'كلية العلوم الحياتية', 10, NULL, '2022-09-24 15:41:25', '2022-09-24 15:41:25'),
(25, 'الصف الأول', 14, NULL, '2022-09-24 15:45:34', '2022-09-24 15:45:34'),
(26, 'الصف الثاني', 14, NULL, '2022-09-24 15:45:34', '2022-09-24 15:45:34'),
(27, 'الصف الثالث', 14, NULL, '2022-09-24 15:45:34', '2022-09-24 15:45:34'),
(28, 'الصف الرابع', 14, NULL, '2022-09-24 15:45:34', '2022-09-24 15:45:34'),
(29, 'الصف الخامس', 14, NULL, '2022-09-24 15:45:34', '2022-09-24 15:45:34'),
(30, 'الصف السادس', 14, NULL, '2022-09-24 15:45:34', '2022-09-24 15:45:34'),
(31, 'الصف الأول', 15, NULL, '2022-09-24 15:47:57', '2022-09-24 15:47:57'),
(32, 'الصف الثاني', 15, NULL, '2022-09-24 15:47:57', '2022-09-24 15:47:57'),
(33, 'الصف الثالث', 15, NULL, '2022-09-24 15:47:57', '2022-09-24 15:47:57'),
(34, 'الصف الأول', 16, NULL, '2022-09-24 15:49:02', '2022-09-24 15:49:02'),
(35, 'الصف الثاني', 16, NULL, '2022-09-24 15:49:02', '2022-09-24 15:49:02'),
(36, 'الصف الثالث', 16, NULL, '2022-09-24 15:49:02', '2022-09-24 15:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `buyerID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cartID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalPaid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `paypalEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postalCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countryCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentMethod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `buyerID`, `paymentID`, `cartID`, `totalPaid`, `currency`, `paypalEmail`, `city`, `state`, `postalCode`, `countryCode`, `address`, `paymentMethod`, `coupon_code`, `complete`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, '0.00', 'USD', 'mohamedbasha275@gmail.com', NULL, NULL, NULL, NULL, NULL, 'manual', NULL, 1, '2022-03-15 17:46:08', '2022-03-15 17:46:08'),
(2, 1, NULL, NULL, NULL, '0.00', 'USD', 'mohamedbasha275@gmail.com', NULL, NULL, NULL, NULL, NULL, 'manual', NULL, 1, '2022-03-19 18:51:51', '2022-03-19 18:51:51'),
(3, 20, '--', '--', '--', '0', 'USD', 'mrgeek.mohamed@gmail.com', NULL, NULL, NULL, '', NULL, 'Free Item', NULL, 1, '2022-12-18 14:35:35', '2022-12-18 14:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `payment_approves`
--

CREATE TABLE `payment_approves` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_approve_histories`
--

CREATE TABLE `payment_approve_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `package_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_approve_histories`
--

INSERT INTO `payment_approve_histories` (`id`, `payment_id`, `package_id`, `user_id`, `img`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, NULL, '2022-03-15 17:46:08', '2022-03-15 17:46:08'),
(2, 2, 2, 1, NULL, '2022-03-19 18:51:51', '2022-03-19 18:51:51'),
(3, 3, 3, 20, NULL, '2022-12-18 14:35:35', '2022-12-18 14:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `payment_extension_approves`
--

CREATE TABLE `payment_extension_approves` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_configs`
--

CREATE TABLE `paypal_configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_of_service` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paypal_configs`
--

INSERT INTO `paypal_configs` (`id`, `client_id`, `secret`, `bank_account`, `term_of_service`, `created_at`, `updated_at`) VALUES
(1, 'ASgSwcON-aOiy1o3BUZXQgJe5UkAkrJycJGbUWXH8-EvH8i5guUKxawfcG22MZmKz9Nd9Wl-fLyh4OjX', 'EIj7hwIW5B8LGWgjf8Lmw6wfzFyD_NIixqdh-P9NV_k3GMFRT4Eny2Tzzvpwv6VWNfOCiVPamkJvm0OG', '000000000000000000', NULL, NULL, '2020-09-20 09:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'read', NULL, NULL),
(2, 'add', NULL, NULL),
(3, 'edit', NULL, NULL),
(4, 'delete', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `process_groups`
--

CREATE TABLE `process_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_management_groups`
--

CREATE TABLE `project_management_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `process_group_id` int(11) NOT NULL,
  `knowledge_area_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `passage_id` int(10) UNSIGNED DEFAULT NULL,
  `question_type_id` int(11) NOT NULL,
  `correct_answers_required` int(11) NOT NULL DEFAULT '1',
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci,
  `img` mediumtext COLLATE utf8mb4_unicode_ci,
  `demo` tinyint(4) NOT NULL DEFAULT '0',
  `important` tinyint(4) DEFAULT '0',
  `random` tinyint(4) NOT NULL DEFAULT '0',
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `passage_id`, `question_type_id`, `correct_answers_required`, `title`, `feedback`, `img`, `demo`, `important`, `random`, `reason`, `admin_created_by`, `created_at`, `updated_at`) VALUES
(2, NULL, 2, 2, '<p>Test Question&nbsp;١</p>', '<p>Test Feedback</p>', 'public/questions/img1.png', 0, 1, 0, NULL, 3, '2022-09-14 15:07:36', '2022-09-14 15:07:36'),
(4, NULL, 1, 1, '<pre>\n<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n</pre>\n\n<p>$ \\displaystyle f&#39;(x) = \\lim_{\\Delta x \\to 0} \\frac{f(x+\\Delta x) - f(x)}{\\Delta x} $</p>', '<p>test feedback</p>', 'public/questions/img2.png', 0, 0, 0, NULL, 3, '2022-09-14 17:12:50', '2022-09-14 17:12:50'),
(5, NULL, 0, 1, '<p>test Question insertion</p>', '<p>no feedback</p>', NULL, 0, 0, 0, NULL, 32, '2022-09-25 18:49:12', '2022-09-25 18:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `question_answers`
--

CREATE TABLE `question_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `answer` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_answers`
--

INSERT INTO `question_answers` (`id`, `question_id`, `answer`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 2, 'Correct', 1, '2022-09-14 15:07:36', '2022-09-14 15:07:36'),
(2, 2, 'Correct', 1, '2022-09-14 15:07:36', '2022-09-14 15:07:36'),
(3, 2, 'Wrong', 0, '2022-09-14 15:07:36', '2022-09-14 15:07:36'),
(6, 4, 'Derivative Definition', 1, '2022-09-14 17:12:50', '2022-09-14 17:12:50'),
(7, 4, 'nothing', 0, '2022-09-14 17:12:50', '2022-09-14 17:12:50'),
(8, 5, 'Correct ANswer', 1, '2022-09-25 18:49:12', '2022-09-25 18:49:12'),
(9, 5, 'Wrong', 0, '2022-09-25 18:49:12', '2022-09-25 18:49:12'),
(10, 5, 'also Wrong', 0, '2022-09-25 18:49:12', '2022-09-25 18:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `question_center_dragdrops`
--

CREATE TABLE `question_center_dragdrops` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `correct_sentence` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `center_sentence` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `wrong_sentence` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_distributions`
--

CREATE TABLE `question_distributions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `path_id` int(10) UNSIGNED DEFAULT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `part_id` int(10) UNSIGNED DEFAULT NULL,
  `chapter_id` int(10) UNSIGNED DEFAULT NULL,
  `topic_id` int(10) UNSIGNED DEFAULT NULL,
  `skill_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_distributions`
--

INSERT INTO `question_distributions` (`id`, `question_id`, `path_id`, `course_id`, `part_id`, `chapter_id`, `topic_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(5, 5, 4, NULL, NULL, NULL, NULL, NULL, '2022-09-25 18:49:12', '2022-09-25 18:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `question_dragdrops`
--

CREATE TABLE `question_dragdrops` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `left_sentence` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `right_sentence` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_tags`
--

CREATE TABLE `question_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_types`
--

CREATE TABLE `question_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_types`
--

INSERT INTO `question_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Multiple-Choice', '2021-01-18 22:00:00', '2021-01-18 22:00:00'),
(2, 'Multiple Responses', '2021-01-18 22:00:00', '2021-01-18 22:00:00'),
(3, 'Matching To Right', '2021-01-18 22:00:00', '2021-01-18 22:00:00'),
(4, 'Fill-in-the-blank', '2021-01-18 22:00:00', '2021-01-18 22:00:00'),
(5, 'Matching to Center', '2021-01-19 22:00:00', '2021-01-19 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `topic_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_id` int(11) NOT NULL,
  `time_left` int(11) NOT NULL DEFAULT '0',
  `answered_question_number` int(11) NOT NULL DEFAULT '0',
  `questions_number` int(11) NOT NULL DEFAULT '0',
  `complete` int(11) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  `start_part` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `rate` int(11) NOT NULL,
  `review` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `package_id`, `event_id`, `rate`, `review`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 4, 'رائعة', '2022-03-11 12:48:42', '2022-03-11 12:48:42'),
(2, 66, 8, NULL, 0, 'حلو', '2022-05-20 19:30:17', '2022-05-20 19:30:17'),
(3, 45, 9, NULL, 0, NULL, '2022-05-21 12:40:00', '2022-05-21 12:40:00'),
(4, 89, 9, NULL, 0, NULL, '2022-06-07 16:24:19', '2022-06-07 16:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `reply_to_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Teacher Material Management', '2019-10-15 22:00:00', '2019-10-15 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `screen_shots`
--

CREATE TABLE `screen_shots` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `section_questions`
--

CREATE TABLE `section_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skill_levels`
--

CREATE TABLE `skill_levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skill_levels`
--

INSERT INTO `skill_levels` (`id`, `title`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 'الدرس الأول: تطور النماذج الذرية', 5, '2022-10-06 03:40:34', '2022-10-06 03:40:34'),
(3, 'الدرس الأول: تطور الجدول الدوري', 6, '2022-10-06 03:51:00', '2022-10-06 03:51:00'),
(4, 'الدرس الثاني: تقسيم العناصر', 6, '2022-10-06 03:55:37', '2022-10-06 03:55:37'),
(5, 'الدرس الثالث: الميول الدورية (التدرج في الخواص)', 6, '2022-10-06 04:00:07', '2022-10-06 04:00:07'),
(6, 'الدرس الثاني: ترتيب الإلكترونات في الذرات', 5, '2022-10-06 04:01:43', '2022-10-06 04:01:43'),
(7, 'الدرس الأول: الترتيب الإلكتروني في الرابطة الأيونية', 7, '2022-10-06 04:05:53', '2022-10-06 04:05:53'),
(8, 'الدرس الثاني: الرابطة الأيونية', 7, '2022-10-06 04:11:58', '2022-10-06 04:11:58'),
(9, 'الدرس الأول: الرابطة التساهمية الأحادية والثنائية والثلاثية', 8, '2022-10-06 04:13:55', '2022-10-06 04:13:55'),
(10, 'الدرس الثاني: الرابطة التساهمية التناسقية', 8, '2022-10-06 04:16:24', '2022-10-06 04:16:24'),
(11, 'الدرس الأول: مفهوم الحركة والكميات الفيزيائية اللازمة لوصفها', 9, '2022-10-06 04:40:05', '2022-10-06 04:40:05'),
(12, 'الدرس الثاني: معادلات الحركة المعجلة بانتظام في خط مستقيم', 9, '2022-10-06 04:50:51', '2022-10-06 04:50:51'),
(13, 'الدرس الثالث: السقوط الحر', 9, '2022-10-06 04:51:19', '2022-10-06 04:51:19'),
(14, 'الدرس الأول: مفهوم القوة والقانون الأول لنيوتن', 10, '2022-10-06 04:56:09', '2022-10-06 04:56:09'),
(15, 'الدرس الثاني: القانون الثاني لنيوتن - القوة والعجلة', 10, '2022-10-06 05:03:50', '2022-10-06 05:03:50'),
(16, 'الدرس الثالث: القانون الثالث لنيوتن والقانون العام للجاذبية', 10, '2022-10-06 05:05:13', '2022-10-06 05:05:13'),
(17, 'الدرس الأول: التغير في المادة', 11, '2022-10-06 05:06:58', '2022-10-06 05:06:58'),
(18, 'الدرس الثاني: خواص السوائل الساكنة', 11, '2022-10-06 05:07:30', '2022-10-06 05:07:30'),
(19, 'الدرس الأول: الأفلاك الجزيئية', 12, '2022-10-06 05:17:55', '2022-10-06 05:17:55'),
(20, 'الدرس الأول: الأفلاك المهجنة', 13, '2022-10-06 05:18:33', '2022-10-06 05:18:33'),
(21, 'الدرس الأول: الماء كمديب قوي', 14, '2022-10-06 05:19:48', '2022-10-06 05:19:48'),
(22, 'الدرس الثاني: المحاليل المائية', 14, '2022-10-06 05:20:12', '2022-10-06 05:20:12'),
(23, 'الدرس الأول: العوامل المؤثرة علي الذوبانية في المحاليل', 15, '2022-10-06 05:40:06', '2022-10-06 05:40:06'),
(24, 'الدرس الثاني: تركيب المحاليل', 15, '2022-10-06 05:40:25', '2022-10-06 05:40:25'),
(25, 'الدرس الثالث: الحسابات المتعلقة بالخواص المجمعة للمحاليل', 15, '2022-10-06 05:40:58', '2022-10-06 05:40:58'),
(26, 'التغيرات الحرارية', 16, '2022-10-06 05:41:56', '2022-10-06 05:41:56'),
(27, 'الدرس الأول: الكميات العددية والكميات المتجهة', 17, '2022-10-06 05:58:37', '2022-10-06 05:58:37'),
(28, 'الدرس الثاني: تحليل المتجهات', 17, '2022-10-06 05:59:14', '2022-10-06 05:59:14'),
(29, 'الدرس الثالث: حركة القذيفة', 17, '2022-10-06 05:59:35', '2022-10-06 05:59:35'),
(30, 'الدرس الأول: وصف الحركة الدائرية', 18, '2022-10-06 06:00:45', '2022-10-06 06:00:45'),
(31, 'الدرس الثاني: القوة الجاذبة المركزية', 18, '2022-10-06 06:01:21', '2022-10-06 06:01:21'),
(32, 'الدرس الأول: مركز الثقل', 19, '2022-10-06 06:02:50', '2022-10-06 06:02:50'),
(33, 'الدرس الثاني: مركز الكتلة', 19, '2022-10-06 07:04:27', '2022-10-06 07:04:27'),
(34, 'الدرس الثالث: تحديد موضع مركز الكتلة أو مركز الثقل', 19, '2022-10-06 07:07:57', '2022-10-06 07:07:57'),
(35, 'الدرس الأول: خواص الغازات', 20, '2022-10-09 04:25:44', '2022-10-09 04:25:44'),
(36, 'الدرس الثاني: العوامل التي تؤثر في ضغط الغاز', 20, '2022-10-09 04:27:03', '2022-10-09 04:27:03'),
(37, 'الدرس الأول: قوانين الغازات', 21, '2022-10-09 04:27:38', '2022-10-09 04:27:38'),
(38, 'الدرس الثاني: الغازات المثالية', 21, '2022-10-09 04:28:03', '2022-10-09 04:28:03'),
(39, 'الدرس الأول: سرعة التفاعل', 23, '2022-10-09 04:30:52', '2022-10-09 04:30:52'),
(40, 'الدرس الثاني: التفاعلات العكوسة والاتزان الكيميائي', 23, '2022-10-09 04:31:41', '2022-10-09 04:31:41'),
(41, 'الدرس الأول: وصف الأحماض والقواعد', 24, '2022-10-09 04:32:15', '2022-10-09 04:32:15'),
(42, 'الدرس الثاني: تسمية الأحماض والقواعد', 24, '2022-10-09 04:32:39', '2022-10-09 04:32:39'),
(43, 'الدرس الثالث: كاتيونات الهيدروجين والحموضة', 24, '2022-10-09 04:33:05', '2022-10-09 04:33:05'),
(44, 'الدرس الرابع: قوة الأحماض والقواعد', 24, '2022-10-09 04:33:32', '2022-10-09 04:33:32'),
(45, 'الدرس  الأول: الشغل', 25, '2022-10-09 04:38:45', '2022-10-09 04:38:45'),
(46, 'الدرس الثاني: الشغل والطاقة', 25, '2022-10-09 04:39:08', '2022-10-09 04:39:08'),
(47, 'الدرس الثالث: حفظ (بقاء) الطاقة', 25, '2022-10-09 04:39:43', '2022-10-09 04:39:43'),
(48, 'الدرس الأول: عزم الدوران (عزم القوة)', 26, '2022-10-09 04:40:28', '2022-10-09 04:40:28'),
(49, 'الدرس الثاني: القصور الذاتي الدوراني', 26, '2022-10-09 04:40:56', '2022-10-09 04:40:56'),
(50, 'الدرس الأول: كمية الحركة الخطية والدفع', 27, '2022-10-09 04:41:23', '2022-10-09 04:41:23'),
(51, 'الدرس الثاني: حفظ (بقاء) كمية الحركة والتصادمات', 27, '2022-10-09 04:41:54', '2022-10-09 04:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stage_exams`
--

CREATE TABLE `stage_exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `stage_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `study_plans`
--

CREATE TABLE `study_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `super_admins`
--

CREATE TABLE `super_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_admins`
--

INSERT INTO `super_admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed Ahmed', 'super@admin.com', '$2y$10$lFjhammAMqSwWu5rchPhp.cvciiiZ9cqX7/6Uf788I8U/pIop5B3y', NULL, '2021-01-17 14:42:33', '2022-09-21 12:00:42'),
(2, 'Al Balaty', 'super-admin@albalaty.com', '$2y$10$wGbLx5v7rS7klTiCAXbgzedYVIfxSVI9xF5umiL3Vdv.B0u9U1qKu', NULL, '2022-09-14 22:00:00', '2022-09-14 22:00:00'),
(3, 'Mohamed Ahmed2', 'a@a.com', '$2y$10$9c.4zayON9KPqJkEI2zL4.Nz1W4Iv7n19cxwA.K9MgYOEjM3WGth6', NULL, '2021-01-17 14:42:33', '2022-09-21 12:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `tahsili`
--

CREATE TABLE `tahsili` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahsili`
--

INSERT INTO `tahsili` (`id`, `user_id`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, 'mohamedbasha275@gmail.com', '2022-03-26 00:35:26', '2022-03-26 00:35:26'),
(2, 26, '01063981560', '2022-04-01 13:02:57', '2022-04-01 13:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_scoops`
--

CREATE TABLE `teacher_scoops` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `path_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `part_id` int(11) NOT NULL,
  `content_full_access` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_scoops`
--

INSERT INTO `teacher_scoops` (`id`, `admin_id`, `path_id`, `course_id`, `part_id`, `content_full_access`, `created_at`, `updated_at`) VALUES
(9, 16, 4, 2, 39, 0, '2022-09-24 19:21:35', '2022-09-24 19:21:35'),
(10, 16, 4, 3, 49, 0, '2022-09-24 19:21:35', '2022-09-24 19:21:35'),
(11, 32, 4, 2, 39, 0, '2022-09-25 18:44:46', '2022-09-25 18:44:46'),
(12, 32, 4, 2, 38, 0, '2022-09-25 18:44:46', '2022-09-25 18:44:46'),
(13, 33, 4, 2, 39, 0, '2022-09-26 11:43:39', '2022-09-26 11:43:39'),
(14, 34, 4, 2, 40, 0, '2022-09-28 18:25:45', '2022-09-28 18:25:45'),
(15, 35, 4, 4, 61, 0, '2022-09-28 19:21:19', '2022-09-28 19:21:19'),
(16, 36, 4, 6, 81, 0, '2022-10-01 08:48:58', '2022-10-01 08:48:58'),
(17, 37, 4, 2, 41, 0, '2022-10-05 09:31:49', '2022-10-05 09:31:49'),
(18, 38, 4, 4, 60, 0, '2022-10-06 06:45:08', '2022-10-06 06:45:08'),
(81, 39, 4, 2, 41, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(82, 39, 4, 2, 38, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(83, 39, 4, 2, 39, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(84, 39, 4, 2, 40, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(85, 39, 4, 2, 42, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(86, 39, 4, 2, 43, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(87, 39, 4, 2, 44, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(88, 39, 4, 2, 45, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(89, 39, 4, 2, 46, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(90, 39, 4, 2, 47, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(91, 39, 4, 3, 48, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(92, 39, 4, 3, 49, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(93, 39, 4, 3, 50, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(94, 39, 4, 3, 51, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(95, 39, 4, 3, 52, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(96, 39, 4, 3, 53, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(97, 39, 4, 3, 54, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(98, 39, 4, 3, 55, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(99, 39, 4, 3, 56, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(100, 39, 4, 3, 57, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(101, 39, 4, 6, 79, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(102, 39, 4, 6, 80, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(103, 39, 4, 6, 81, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(104, 39, 4, 6, 82, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(105, 39, 4, 6, 83, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(106, 39, 4, 6, 84, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(107, 39, 4, 6, 85, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(108, 39, 4, 6, 86, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(109, 39, 4, 6, 87, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(110, 39, 4, 6, 88, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(111, 39, 4, 5, 68, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(112, 39, 4, 5, 69, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(113, 39, 4, 5, 70, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(114, 39, 4, 5, 71, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(115, 39, 4, 5, 72, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(116, 39, 4, 5, 73, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(117, 39, 4, 5, 74, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(118, 39, 4, 5, 75, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(119, 39, 4, 5, 76, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(120, 39, 4, 5, 77, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(121, 39, 4, 5, 78, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(122, 39, 4, 4, 58, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(123, 39, 4, 4, 59, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(124, 39, 4, 4, 60, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(125, 39, 4, 4, 61, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(126, 39, 4, 4, 62, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(127, 39, 4, 4, 63, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(128, 39, 4, 4, 64, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(129, 39, 4, 4, 65, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(130, 39, 4, 4, 66, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(131, 39, 4, 4, 67, 1, '2022-10-08 04:05:53', '2022-10-08 04:05:53'),
(132, 3, 4, 2, 38, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(133, 3, 4, 2, 39, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(134, 3, 4, 2, 40, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(135, 3, 4, 3, 48, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(136, 3, 4, 3, 54, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(137, 3, 4, 3, 55, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(138, 3, 4, 3, 57, 1, '2022-10-08 09:38:48', '2022-10-08 09:38:48'),
(139, 40, 4, 2, 41, 0, '2022-12-07 19:20:24', '2022-12-07 19:20:24'),
(140, 40, 4, 2, 43, 0, '2022-12-07 19:20:24', '2022-12-07 19:20:24'),
(141, 41, 7, 15, 127, 0, '2022-12-25 03:13:14', '2022-12-25 03:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `topic_skills`
--

CREATE TABLE `topic_skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic_skills`
--

INSERT INTO `topic_skills` (`id`, `title`, `topic_id`, `created_at`, `updated_at`) VALUES
(5, 'الفصل الأول: نماذج الذرة', 11, '2022-10-06 03:28:50', '2022-10-06 03:28:50'),
(6, 'الفصل الثاني: الدورية الكيميائية', 11, '2022-10-06 03:29:24', '2022-10-06 03:29:24'),
(7, 'الفصل الأول: الروابط الأيونية والمركبات الأيونية', 12, '2022-10-06 03:33:58', '2022-10-06 03:33:58'),
(8, 'الفصل الثاني: الرابطة التساهمية', 12, '2022-10-06 03:36:48', '2022-10-06 03:36:48'),
(9, 'الفصل الأول: الحركة في خط مستقيم', 14, '2022-10-06 04:35:46', '2022-10-06 04:35:46'),
(10, 'الفصل الثاني: القوة والحركة', 14, '2022-10-06 04:36:12', '2022-10-06 04:36:12'),
(11, 'الفصل الأول: خواص المادة', 15, '2022-10-06 04:37:58', '2022-10-06 04:37:58'),
(12, 'الفصل الأول: الأفلاك الجزيئية', 30, '2022-10-06 05:11:02', '2022-10-06 05:11:02'),
(13, 'الفصل الثاني: الأفلاك المهجنة', 30, '2022-10-06 05:12:58', '2022-10-06 05:12:58'),
(14, 'الفصل الأول: المحاليل المائية المتجانسة وغير المتجانسة', 31, '2022-10-06 05:14:42', '2022-10-06 05:14:42'),
(15, 'الفصل الثاني: الخواص العامة للمحاليل المتجانسة', 31, '2022-10-06 05:15:20', '2022-10-06 05:15:20'),
(16, 'الفصل الأول: الكيمياء الحرارية', 32, '2022-10-06 05:16:51', '2022-10-06 05:16:51'),
(17, 'الفصل الاول: حركة المقذوفات', 33, '2022-10-06 05:52:36', '2022-10-06 05:52:36'),
(18, 'الفصل الثاني: الحركة الدائرية', 33, '2022-10-06 05:54:29', '2022-10-06 05:54:29'),
(19, 'الفصل الثالث: مركز الثقل', 33, '2022-10-06 05:55:52', '2022-10-06 05:55:52'),
(20, 'الفصل الأول: سلوك الغازات', 34, '2022-10-06 07:15:10', '2022-10-06 07:15:10'),
(21, 'الفصل الثاني: قوانين الغازات', 34, '2022-10-06 07:15:51', '2022-10-06 07:15:51'),
(23, 'الفصل الأول: سرعة التفاعل الكيميائي والاتزان الكيميائي', 35, '2022-10-09 04:29:17', '2022-10-09 04:29:17'),
(24, 'الفصل الأول: الأحماض والقواعد', 36, '2022-10-09 04:29:57', '2022-10-09 04:29:57'),
(25, 'الفصل الأول: الطاقة', 38, '2022-10-09 04:37:34', '2022-10-09 04:37:34'),
(26, 'الفصل الثاني: ميكانيكا الدوران', 38, '2022-10-09 04:37:54', '2022-10-09 04:37:54'),
(27, 'الفصل الثالث: كمية الحركة الخطية', 38, '2022-10-09 04:38:19', '2022-10-09 04:38:19'),
(28, 'Unit 1: We are what we eat', 2, '2022-10-12 03:10:10', '2022-10-12 03:10:10'),
(29, 'Unit 1: Festivals and occasions', 44, '2022-10-12 03:15:56', '2022-10-12 03:15:56'),
(30, 'Unit 1: Festivals and occasions', 48, '2022-10-12 03:20:37', '2022-10-12 03:20:37'),
(31, 'Unit 1: The law', 52, '2022-10-12 03:34:19', '2022-10-12 03:34:19'),
(32, 'Unit 1: The law', 56, '2022-10-12 03:39:48', '2022-10-12 03:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_payments`
--

CREATE TABLE `transaction_payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `from_bank` varchar(20) NOT NULL,
  `to_bank` varchar(20) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `translate_amount` varchar(255) NOT NULL,
  `wanted_amount` varchar(255) NOT NULL,
  `used_coupon` varchar(50) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'waiting',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transcodes`
--

CREATE TABLE `transcodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `row_` int(11) NOT NULL,
  `transcode` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brith_date` datetime DEFAULT NULL,
  `last_login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_server_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `provider`, `provider_id`, `path_id`, `course_id`, `name`, `email`, `password`, `city`, `country`, `phone`, `brith_date`, `last_login`, `last_action`, `last_ip`, `last_server_ip`, `remember_token`, `last_session_id`, `created_at`, `updated_at`) VALUES
(20, NULL, NULL, NULL, NULL, 'Mohamed Ahmed', 'mrgeek.mohamed@gmail.com', '$2y$10$2NNtofVqNizgW8mL3UP14.cpEbIkcnwD.PKso7p1SGl1dEe5md4b6', 'Cairo', 'Egypt', '01102068860', NULL, '2022-12-24 11:17:41', 'loged in', '197.54.12.166', '95.216.37.146', 'Hb7hvNpMdzt9Hxh7ES0ICG4OfiFYjnxkEKlSycPGb8mss9utt9Ze5OVsxGb3', 'F8XR1qJMrLn3AkaV4TQLDGzBdwrbUAtVGpwTNnpp', '2022-02-18 13:30:08', '2022-12-24 10:17:41'),
(105, NULL, NULL, 4, 2, 'Quentin Mayer', 'lysoqex@mailinator.com', '$2y$10$rzuFlOE.ZLrjjZxlX0RV3Oq.jFjr4FFmivaQoVXtxzF7PnSrh3nWa', 'Nemo animi laudanti', 'KW', '5465465465', '2022-09-24 00:00:00', '2022-09-24 21:36:57', 'loged in', '::1', NULL, NULL, NULL, '2022-09-24 19:36:57', '2022-09-24 19:36:57'),
(107, NULL, NULL, 4, 3, 'Raven Lawson', 'lome@mailinator.com', '$2y$10$SnU4unLC7yIhrdT0TGWheetTYzNUxofbTgj9UqPHJZQNw9Pbm/iiu', 'Rerum ullam iure lor', 'EG', '5465465', '0000-00-00 00:00:00', '2022-09-24 21:43:08', 'loged in', '::1', '::1', NULL, 'NOCPodim0D8TgVijScmJdGGBBb7UJaMytSU1spML', '2022-09-24 19:43:02', '2022-09-24 19:43:08'),
(108, NULL, NULL, 4, 6, 'ليليان محمود يوسف العبيدات', 'hamedmody97@gmail.com', '$2y$10$b4ZmA5WiC2yyBiPdbHTj5OSs09ITWPjFu7VqO3OyJJOszEFhFwgdK', 'حولي', 'KW', '50969561', '2006-07-03 00:00:00', '2022-10-09 10:02:33', 'loged in', '80.184.123.205', '95.216.37.146', NULL, 'GYuawUjWle7Z7Tb0oWRx6CFVmvTRdYi7VlEl5RgF', '2022-09-25 18:56:45', '2022-10-09 08:02:33'),
(109, NULL, NULL, 4, 2, 'Otto Stafford', 'qebuse@mailinator.com', '$2y$10$x960U3CC6Q5TSz4WVsu1feHZSRMmLRseodaQ.Mmy5eEb7WK76Yo4q', 'Corporis irure id ea', 'KW', '23432423', '2022-09-08 00:00:00', '2022-09-25 21:40:14', 'loged out', '197.54.58.218', '95.216.37.146', 'fhCpOrNxu9o2GBr6Ajo7njcsjkLLoSHHC3Zu71crrqMVsBtYhFTygkfjCqg8', 'FIl7dG3cNXbXXCeqeauC0h9VKo7JxZYjHArIvgM3', '2022-09-25 19:40:03', '2022-09-25 20:46:35'),
(110, NULL, NULL, 4, 2, 'Mohammed Galal', 'mohammedgalalfci@gmail.com', '$2y$10$bqh0wk2.f.aBDHhDami0l.2F6jRNPQBKQGRwFGrhlUkY4MuO7beDe', 'Sohag', 'EG', '01554240995', '2017-01-26 00:00:00', '2022-12-03 19:52:23', 'loged out', '197.38.219.172', '95.216.37.146', 'kF7Vr89AkyuF0NT1OxgVSPdYicdx8RkHJGUijloVPkN0R3HuAv7DEwbasHUz', 'qpG3sX4WezGjGPj34xta715ZjqkGytrpiFXry82E', '2022-09-26 09:09:30', '2022-12-03 18:52:57'),
(111, NULL, NULL, NULL, NULL, 'Mohammed Galal', 'mo7ammedgalalfci@gmail.com', '$2y$10$R6c.azhlo4mCSN/itjf9cOPMcjwg.vvQztBIb6twFoyRp.eO0hoKK', NULL, NULL, '01554240977', NULL, '2022-09-27 23:43:07', 'loged out', '197.54.16.31', '95.216.37.146', '7gPjhWg2A5juP0f4qyw8u1MQjd9NjX0kY544CtZ28bP4QzDSrSBbifQ8AxA9', 'SDXf9LUlpOlkyuSlFRg5tgxeW85KJeL4HoRaYZZW', '2022-09-27 21:42:57', '2022-09-27 21:43:11'),
(112, NULL, NULL, NULL, NULL, 'ريم عمرو محمد', 'amar.fayez88@yahoo.com', '$2y$10$1mtCDrBuc3Mfy5775qG5l.lQbPgD8Bcs/fRO0GEzXSr3PeEFYtAKy', NULL, NULL, '0096599421329', NULL, '2022-10-08 18:10:35', 'loged in', '37.231.193.173', '95.216.37.146', NULL, 'lfpMlkJP3RinUm1obfe6ddaNj2pKcsXYLZojQNwE', '2022-09-28 18:27:19', '2022-10-08 16:10:35'),
(113, NULL, NULL, NULL, NULL, 'Mahmoud rashed taha', 'mahmoud675894@gmail.com', '$2y$10$mI2QZzS2G/Dp42T2DPo.4eJhjzD.zOaORqE7686qWecRmntaSFK7G', NULL, NULL, '66710041', NULL, '2022-11-29 15:20:12', 'loged in', '188.71.202.176', '95.216.37.146', NULL, 'nghw5IhvFGeoxWcLGMINOcpXdV9r4J7vqABp5NtG', '2022-09-29 13:17:43', '2022-11-29 14:20:12'),
(114, NULL, NULL, NULL, NULL, 'سلمى عفيفي السيد', 'Kwtee6519@gmail.com', '$2y$10$aJMg9K918PVdreKnI64rM.DEE.yTGIReyrLsxsaXCOwZIKqrVYWBW', NULL, NULL, '98587439', NULL, '2022-09-29 16:39:48', 'loged in', '37.231.255.214', '95.216.37.146', NULL, 'ulpOMxzKpHi6ZPRrK2obMNtf0FV34UOBE384zslH', '2022-09-29 14:39:36', '2022-09-29 14:39:48'),
(115, NULL, NULL, NULL, NULL, 'انس مصطفى', 'shaimaa_rabie@yahoo.com', '$2y$10$cLRWqMlD8qLLcgJc3AcA2.swInjPQu5n892GH1yPETQXQuBNLCAya', NULL, NULL, '96566972352', NULL, '2022-09-29 18:05:51', 'loged in', '94.29.152.192', '95.216.37.146', NULL, 'wbBF7lrlJH16IkB3rA4Os8TPniLqMO4RM2KTcB8b', '2022-09-29 16:04:59', '2022-09-29 16:05:51'),
(116, NULL, NULL, NULL, NULL, 'يعقوب قمرالدين ديبيازه', 'ya3cobdeyaza@hotmail.com', '$2y$10$8MtNf/DiMYN3dVgFNlSTMOiqEjTQrJFLmGoR2mm4E72H56hXOwnGG', NULL, NULL, '99793854', NULL, '2022-09-29 18:09:18', 'loged in', '37.39.204.29', NULL, NULL, NULL, '2022-09-29 16:09:18', '2022-09-29 16:09:18'),
(117, NULL, NULL, NULL, NULL, 'Yousef Mohammed', 'yousef_mohammed30@icloud.com', '$2y$10$lYKMDdklZv4/NMZzBfGnIuagQnkbL9B0603Y1TuUXLks4h9T8PAn2', NULL, NULL, '55012732', NULL, '2022-09-29 19:25:18', 'loged in', '94.128.185.85', '95.216.37.146', NULL, 'xl3fnA7tWL5VyYdwXpWlAuq48nF8EzKD8nkXdMEP', '2022-09-29 17:24:34', '2022-09-29 17:25:18'),
(118, NULL, NULL, NULL, NULL, 'يوسف رضا عبدالبديع محمد', 'theyoussefali3@gmail.com', '$2y$10$Nv9Z8gkBZIb.x1.OMjL0M.UC8BB4OqlN54Z8.dvQTYP0lbhaSf4vW', NULL, NULL, '94993073', NULL, '2022-09-29 19:39:12', 'loged in', '37.39.179.53', '95.216.37.146', NULL, 'WsOb4gWv2zmaooPoAjTa5nyGH0JB6jfB8a7UnduP', '2022-09-29 17:39:06', '2022-09-29 17:39:12'),
(119, NULL, NULL, NULL, NULL, 'احمد حسام الدين احمد بدران', 'hanaasalah93@yahoo.com', '$2y$10$oyxDapBMim3KykS7fVKxquQO5UajjZn5jMjNZOtkEzaiIBPLZzW2.', NULL, NULL, '55615631', NULL, '2022-09-30 09:37:00', 'loged in', '94.128.184.246', '95.216.37.146', NULL, '3mSMdbOwAroYqLpfOq8LOCXc4RBPbFLlXB54WfDs', '2022-09-29 17:57:54', '2022-09-30 07:37:00'),
(120, NULL, NULL, NULL, NULL, 'رؤى عمرو', 'roaaamr112@gmail.com', '$2y$10$rnbu/xdPo9TNiKFDd92KTeKX7.iDvnqgULVT9JC41oS5ZYczAvlby', NULL, NULL, '99175989', NULL, '2022-09-29 20:02:29', 'loged in', '188.236.235.251', '95.216.37.146', NULL, 'KZ8tI91nt8ZUstE34YzsR2dffg9SbtazVYLWhOdz', '2022-09-29 17:59:09', '2022-09-29 18:02:29'),
(121, NULL, NULL, NULL, NULL, 'Omar', 'x3mooRy@gmail.com', '$2y$10$P4DdA6KMVZICPve8YQ19HeRDzhPR1hZ2HA2vJu3uJdyJxburf/5km', NULL, NULL, '66779977', NULL, '2022-09-29 21:46:20', 'loged in', '80.184.11.30', '95.216.37.146', NULL, 'WYgpdOfP8XlTxy2uLK2qlQ3EjMLJJKSU6xGjcWUm', '2022-09-29 19:46:15', '2022-09-29 19:46:20'),
(122, NULL, NULL, NULL, NULL, 'أحمد', 'omhabiba84@gmail.com', '$2y$10$nea3nQlrP5wxgM.P8BCpmOMkOgKFvlR84kwFAaD1pbUmjNY/yFMbW', NULL, NULL, '99716817', NULL, '2022-10-08 13:15:52', 'loged in', '188.236.135.220', '95.216.37.146', NULL, 'Dmq8JzZaYwq49nkPes0V1m26bAr6zYOOUJMs5Vxh', '2022-09-29 22:13:42', '2022-10-08 11:15:52'),
(123, NULL, NULL, NULL, NULL, 'خالد طارق حسين مخيمر', 'mekhemarkhalid@gmail.com', '$2y$10$yUNlomaFWUMTkUK1r6D47OGV.iHCb1iAfDD2Mnb941/cNh6vlm13C', NULL, NULL, '60631871', NULL, '2022-09-30 06:58:42', 'loged in', '188.71.221.138', NULL, NULL, NULL, '2022-09-30 04:58:42', '2022-09-30 04:58:42'),
(124, NULL, NULL, NULL, NULL, 'جمانه ماجد تيسير رسمي', 'jmajed911@gmail.com', '$2y$10$nVQYmuw/xUrVZc1U/am/ZOfUMXBJ1ItAxk.5.dA699h5vTF4mnwN.', NULL, NULL, '55170105', NULL, '2022-09-30 06:59:12', 'loged in', '188.71.206.245', '95.216.37.146', NULL, 'uP5pToduuF03Juo41uwIyJ9CgtjD8COb3DJjHEXT', '2022-09-30 04:59:02', '2022-09-30 04:59:12'),
(125, NULL, NULL, NULL, NULL, 'عبد الرحمن عزب عبد النبي العبد', '3bood.123r56@gmail.com', '$2y$10$.3WGQIk8XWheQqP9f1JJAOr.50qSiOwGnXRD.bPiBq0h7sUu69jMG', NULL, NULL, '98998499', NULL, '2022-10-07 04:32:05', 'loged in', '37.231.35.202', '95.216.37.146', NULL, 'PIq80hCeRQboey3Usbi0XZEGASPvj9yexezatc3m', '2022-09-30 05:19:47', '2022-10-07 02:32:05'),
(126, NULL, NULL, NULL, NULL, 'Radwa Abdalla', 'radwaabdalla266@gmail.com', '$2y$10$xkFmQvqYS9CuH7tgCJHhnegVc7IolufSymzG3QK3CoDlCr/bVEMfm', NULL, NULL, '60323243', NULL, '2022-09-30 07:21:50', 'loged in', '94.129.211.111', '95.216.37.146', NULL, 'GsPn6yJcFKVlt0AzSAOkBjuZV7Uz602Qy0E3EYOg', '2022-09-30 05:21:41', '2022-09-30 05:21:50'),
(127, NULL, NULL, NULL, NULL, 'Mazen Ahmed', 'xmazenahmedx@gmail.com', '$2y$10$1Dy/wU/h3PsrCoIfxzBlwOmSEzkk739Gi.Dz9fwEjOiham3eBtFge', NULL, NULL, '97360580', NULL, '2022-10-05 12:55:16', 'loged in', '188.236.240.71', '95.216.37.146', NULL, 'Ve5drbTFRp0rd3VKlklLoA9ASE7eNuGCiGK9ss0A', '2022-09-30 06:23:21', '2022-10-05 10:55:16'),
(128, NULL, NULL, NULL, NULL, 'محمد حسام الدين محمد الشربيني', 'tweetym3172006@gmail.com', '$2y$10$C175W6WURcxBEYkklUAiIOxq1Pc52eMKSW6W.HyA5gKQMPbj1wL/G', NULL, NULL, '99128270', NULL, '2022-09-30 21:31:29', 'loged in', '188.236.145.8', '95.216.37.146', NULL, '7EqwhCp7zoJKiiZwCXcIhYArB0Twuu7OI8AehtoP', '2022-09-30 07:14:20', '2022-09-30 19:31:29'),
(129, NULL, NULL, NULL, NULL, 'أنس إيهاب عبدالكريم سليم', 'anasehab933@gmail.com', '$2y$10$4AxTf5oJ5.tfDBRrfu7FROJGQqC6xJv.6.xnosxf8MjqUEp8vncWC', NULL, NULL, '94983478', NULL, '2022-11-16 19:58:05', 'loged in', '188.236.206.193', '95.216.37.146', NULL, 'NByOHdnNXRDrS6sgYFW064us5W2FOjSh7GLLIsb6', '2022-09-30 07:18:06', '2022-11-16 18:58:05'),
(130, NULL, NULL, NULL, NULL, 'ساره محمد محمود احمد', 'amanyzaky2017@gnail.com', '$2y$10$PV8HA/zKCBpWvIoSEUptoua/gMaKo7xEy2KbQ1FDnTGN13CSXMRzy', NULL, NULL, '94001734', NULL, '2022-09-30 09:44:36', 'loged in', '188.71.212.206', '95.216.37.146', NULL, 'IbsnhpnPqtsyLcClP4cDuNbpBLXwU7fbpT6DlSgj', '2022-09-30 07:44:13', '2022-09-30 07:44:36'),
(131, NULL, NULL, NULL, NULL, 'خالد محمد جهيمان الهاجري', 'ku22083@gmail.com', '$2y$10$pqgqvSuui1f5AT5YDFG4ueb.Xv3JelPsIOinJBU2GCmC1Vd.nEhGW', NULL, NULL, '69605265', NULL, '2022-09-30 11:18:48', 'loged in', '37.36.235.253', '95.216.37.146', NULL, 'uq8KNU6MNCq1qCrhwjX48gUGFFXenaoXbwqP93nB', '2022-09-30 09:18:42', '2022-09-30 09:18:48'),
(132, NULL, NULL, NULL, NULL, 'مهند عيد عشماوي', 'nogajamy1@gmail.com', '$2y$10$E6K2cErNyETXivL3VoPPcewPq8e1/oVUEfFE6aKzs1IHTCQZYoZV2', NULL, NULL, '60050816', NULL, '2022-12-08 18:43:35', 'loged in', '37.231.33.135', '95.216.37.146', NULL, 'ecx2dKP4wZNhFylaoEbbM6ns4GA0Gvt6TfobrPCC', '2022-09-30 10:44:40', '2022-12-08 17:43:35'),
(133, NULL, NULL, NULL, NULL, 'وعد هاشم محمد عبد العزيز', 'waadhas10@gmail.com', '$2y$10$v0lALBl8cCUAVgkpECOjBe.wf6elYFclQWVHYGEoQlMaUSwk0FmiW', NULL, NULL, '55239220', NULL, '2022-09-30 19:09:40', 'loged out', '94.128.229.24', '95.216.37.146', 'PJArEnoQ7eFj3Idkf5THZ1LlnJqlVt31IsnGCa4PJOdajFlOiRpEmpi6bCX6', 'nUhO9bfasdOHssr4y3e03TFbFkggzAQLeqfaIMd4', '2022-09-30 17:08:38', '2022-09-30 17:10:24'),
(134, NULL, NULL, NULL, NULL, 'نور احمد', 'nbccz@gmail.com', '$2y$10$IhNYr.ruef6t5bBxrXnvH.qIoP3Cyvnjbyhub4eGpuxgMvprnDRfC', NULL, NULL, '94400206', NULL, '2022-10-01 05:20:58', 'loged in', '37.36.151.92', '95.216.37.146', NULL, 'uBwmfWhxphKrWxpRWRT8TQUq9aClPBEB7auHYTEJ', '2022-10-01 03:15:55', '2022-10-01 03:20:58'),
(135, NULL, NULL, NULL, NULL, 'سندس', 'Sandooooosah@hotmail.com', '$2y$10$UcYzV9Z8Ob0Hxo7zZWH3iO2DK/Jop5lh6u9vkTaJ400chStdibvdG', NULL, NULL, '67033177', NULL, '2022-10-01 10:28:42', 'loged in', '37.231.255.129', '95.216.37.146', NULL, 'PqkV0Dgtde0JfLAfMwgR8M001CwSCcnXMdI8toF9', '2022-10-01 08:28:08', '2022-10-01 08:28:42'),
(136, NULL, NULL, NULL, NULL, 'Mohammed', 'q5mohd2006@gmail.com', '$2y$10$PN8Nn3J.Vi/1AgNkkEgvv.ceKRuG9gQDHvUZeSRtkslxEnh0gG.0O', NULL, NULL, '69069701', NULL, '2022-10-01 12:34:21', 'loged in', '188.70.0.246', '95.216.37.146', NULL, 'F1Kc0qzxTr8DJH5zAFy79XXjrhhgUUgeYuGbOPoG', '2022-10-01 10:33:54', '2022-10-01 10:34:21'),
(137, NULL, NULL, NULL, NULL, 'A', 'azaatabl@gmail.com', '$2y$10$.54LC5vClSJ1FW2KEeHtquxdvy6Hs5.eg7XAV/0mh7eshsUKAkeSW', NULL, NULL, '90052113', NULL, '2022-10-03 11:53:17', 'loged in', '37.39.226.16', '95.216.37.146', NULL, 'zWrVTTU8sC7OgmxSrV9yVRVcg3vATaK26NqmA5j5', '2022-10-03 09:52:50', '2022-10-03 09:53:17'),
(138, NULL, NULL, NULL, NULL, 'عبدالله احمد ال بن علي', 'rxkilar989@gmail.com', '$2y$10$fvd51qPk7NPipR7FOqavXOn3iCm1.7m/IIbhS4FwdiTuS4O2ALade', NULL, NULL, '99251381', NULL, '2022-12-08 18:29:44', 'loged in', '37.231.139.255', '95.216.37.146', NULL, 'c9Ex6fTNEfr1SI3OXR0MKt6E8bEqcyF7AlOggqmg', '2022-10-03 12:31:34', '2022-12-08 17:29:44'),
(139, NULL, NULL, NULL, NULL, 'بسمله عبدالعزيز طلبه الكومي', 'basomzizo321@gmail.com', '$2y$10$ygdIZTRhbIEdM7zcuCTspOjrtqMKdA68hntSbtwbqeF2qHsCRRe8S', NULL, NULL, '65562201', NULL, '2022-10-03 19:19:13', 'loged in', '188.70.8.184', '95.216.37.146', NULL, 'Wle5zcuEXH1yxpAw1yqmwwYA1NzLusyQOvVl6rT5', '2022-10-03 17:18:42', '2022-10-03 17:19:13'),
(140, NULL, NULL, NULL, NULL, 'حبيبه عمرو', 'abeeramr2@yahoo.com', '$2y$10$Wi9MoP4bPJjPT7rYRHBBsO0tlj5FoocYv863dpFNmPi7mqnceV2vW', NULL, NULL, '98987468', NULL, '2022-10-05 10:38:00', 'loged in', '94.128.206.192', '95.216.37.146', NULL, 'ggc47EW81KZ4VvIHumvhp3tguTtkAOFV2Bx2wcWK', '2022-10-04 03:22:25', '2022-10-05 08:38:00'),
(141, NULL, NULL, NULL, NULL, 'هاله', 'mahmoudmoh987@gmail.com', '$2y$10$MrFpdODIhYga4uHId1rtI.fQJ.F2FL1Nhm6Pc4xnP01v/N8HEs5kq', NULL, NULL, '90074780', NULL, '2022-10-05 06:07:14', 'loged in', '188.70.2.90', '95.216.37.146', NULL, 'NNDf6uRfZyrgbrw8K6W2xYR5IBgMJFBtwHmJim6d', '2022-10-05 03:52:34', '2022-10-05 04:07:14'),
(142, NULL, NULL, NULL, NULL, 'Muneera', 'rahaf_rm@hotmail.com', '$2y$10$4Q99.m5jKYYXaSu3vV1LUutD8eq2sbeLj71/G6rf8CdNVyTZWMH2W', NULL, NULL, '96599399639', NULL, '2022-10-05 06:25:14', 'loged in', '37.39.223.172', NULL, NULL, NULL, '2022-10-05 04:25:14', '2022-10-05 04:25:14'),
(143, NULL, NULL, NULL, NULL, 'Nabawy', 'aexz12357@gmail.com', '$2y$10$SjZKpHKvUOIfvSPkU3QYTu4Sh0.PzMOyD7IsaXBCVnkaWvDriw6n2', NULL, NULL, '6672364', NULL, '2022-10-05 07:38:07', 'loged in', '94.128.193.177', '95.216.37.146', NULL, 'mgJv3k3BzpxnLtYjxeNJesPCwwTFJ8PfjcormPzg', '2022-10-05 05:35:41', '2022-10-05 05:38:07'),
(144, NULL, NULL, NULL, NULL, 'عادل عبدالعزيز راشد  محمد', 'borsle8@gmail.com', '$2y$10$RVgWUCX6Rf.hzwauyeZvUeq9NhB.ZYx1RLJ9iv73f0a3hprN1lIQu', NULL, NULL, '98955565', NULL, '2022-10-05 07:38:01', 'loged out', '188.236.211.0', '95.216.37.146', 'BuPptZ3JPmVNE7ySeUVMY054arZcTDuMIGNePCwiJXM9arCQgvIruOC573BS', 'aJzqaS1Hzr34VgR1UnjoguxJq9VviCRPaMSeF8qV', '2022-10-05 05:36:37', '2022-10-05 05:40:54'),
(145, NULL, NULL, NULL, NULL, 'ريهام ثروت فكري السيد', 'mona.arafa88@gmail.com', '$2y$10$mo2b4RcRpCtreOqMKmA1dOejLdzQxn7t7Ck8SkwGtCnyp.DGuU1Vy', NULL, NULL, '51092719', NULL, '2022-12-09 18:28:23', 'loged in', '94.128.235.83', '95.216.37.146', NULL, 'A5bF8c3v4RtyjgKMAqv69gFhhBWqdOOAwaUx177D', '2022-10-05 05:41:53', '2022-12-09 17:28:23'),
(146, NULL, NULL, NULL, NULL, 'سبين داود سليمان السقا', 'hanaalsaqqa007@gmail.com', '$2y$10$lZPR5ly45TobDaJLq.ouW.ryMNNtLHpNWc23I6cVFfbRk6TM2nTyG', NULL, NULL, '60919707', NULL, '2022-10-05 08:44:48', 'loged in', '37.231.32.134', '95.216.37.146', NULL, 'tDFxZGsZ2w9abRn1QEI5bjSWR1jWC1xCdielHyLv', '2022-10-05 06:43:26', '2022-10-05 06:44:48'),
(147, NULL, NULL, NULL, NULL, 'مريم أيمن عبدالحفيظ عوض', 'hger2013@gmail.com', '$2y$10$or/ovSOrMK6WVahcTZYzruJtYzFCODJ8zqf.xfrYDdM3hS1DkZIPu', NULL, NULL, '55086789', NULL, '2022-10-05 08:45:57', 'loged in', '188.70.54.110', '95.216.37.146', NULL, 'y3kZ50rnhRvvpfvgyx72kbkxJfCArp6gd3y516Em', '2022-10-05 06:45:05', '2022-10-05 06:45:57'),
(148, NULL, NULL, NULL, NULL, 'شعبان حسن محمد', 'dr_shaban70@yahoo.com', '$2y$10$9p1moX/nLTCb8ywPbkyDROP4FN4ze3PenjWj3ZSSDaPsTC8Jpn1aO', NULL, NULL, '66819066', NULL, '2022-10-05 09:02:46', 'loged in', '188.71.251.229', '95.216.37.146', NULL, 'GAjvo8W0EpbRsPOdXGhFL7pkGwemg2TxH0pQ9hkp', '2022-10-05 07:01:45', '2022-10-05 07:02:46'),
(149, NULL, NULL, NULL, NULL, 'عائشه كمال هاشم احمد', 'aisha25431310@gmail.com', '$2y$10$vaYu/7la.gHHBSLc2p/5IupMWlp30ZAo0pivfa/eRqrz1qIH1efVK', NULL, NULL, '55748074', NULL, '2022-10-05 10:19:43', 'loged in', '37.231.141.15', '95.216.37.146', NULL, 'GAZrgAFLASVbd23c4ZJs26DNxWXoHiWDjfn1GLJX', '2022-10-05 08:19:30', '2022-10-05 08:19:43'),
(150, NULL, NULL, NULL, NULL, 'يوسف عامر محزم العنزي', 'imadnesskw@gmail.com', '$2y$10$D7soafsvYursMOPWAFc6duilWGlWLUGj00q/XfVCfoG3sHun5C3c.', NULL, NULL, '90031909', NULL, '2022-10-05 10:51:09', 'loged in', '37.36.59.108', '95.216.37.146', NULL, 'Rb89wsjottnQQol9RguGSBH2ai4baNfsVzNguF7Q', '2022-10-05 08:50:47', '2022-10-05 08:51:09'),
(151, NULL, NULL, NULL, NULL, 'ناردين جمال فاخوري اسحق', 'nardeengamal80@gmail.com', '$2y$10$mi7sXpI7gG5Rl2tIFDvx8.ZwxH/CcaU7Bldk8wlVaQchrhirZ9yN6', NULL, NULL, '66198561', NULL, '2022-10-05 11:15:55', 'loged in', '188.71.198.124', '95.216.37.146', NULL, 'cS8XfjumUycQd7RHtRfTZOdnAP203RDfSekKWpaW', '2022-10-05 09:15:17', '2022-10-05 09:15:55'),
(152, NULL, NULL, NULL, NULL, 'Omar', 'www.omar1177@gmail.com', '$2y$10$gHwp8EGrZtY9q0YxvC5tGu8/PRlE7lOvmleANwMa5EQMVPHcuYmbG', NULL, NULL, '55909333', NULL, '2022-10-05 11:25:10', 'loged in', '37.231.38.3', '95.216.37.146', NULL, 'SJ9l5eRdEE1Bbz1kLKHw3NoIb8Gw2fxLrIWZy6dw', '2022-10-05 09:23:20', '2022-10-05 09:25:10'),
(153, NULL, NULL, NULL, NULL, 'دعاء سعيد عباده', 'dodyebada23@gmail.com', '$2y$10$EBRtKOi9kxxllDCPHcQGU.i50DeGF/UL7pGCSVB5BYqRElstA2EEW', NULL, NULL, '60636430', NULL, '2022-10-05 11:24:19', 'loged in', '188.70.8.172', '95.216.37.146', NULL, 'u1WLMPVm1hxwSnrPhXLIkz7OyZPBT5RXzNjVId8t', '2022-10-05 09:24:02', '2022-10-05 09:24:19'),
(154, NULL, NULL, NULL, NULL, 'حور الجنة هاني صلاح', 'dody1932000@gmail.com', '$2y$10$LU0sZcCCzdVrgPU.h/f6bulIWvSsuSGviT8/igcmSft8eXsL/3T56', NULL, NULL, '90047367', NULL, '2022-10-05 11:34:18', 'loged in', '188.70.0.75', '95.216.37.146', NULL, 'urbWwMLFormdJwdlqD9ApE8eCefRbp1xayU7RvHQ', '2022-10-05 09:32:22', '2022-10-05 09:34:18'),
(155, NULL, NULL, NULL, NULL, 'آية رمضان زكى صالح بندارى', 'ramadan215@yahoo.com', '$2y$10$km6obCkCHIvv7Hxr8EVXPuS2yTr2JNX0vcG8ZwNxyvKaxO7YW5abO', NULL, NULL, '51704473', NULL, '2022-12-08 15:56:23', 'loged in', '188.236.187.249', '95.216.37.146', 'u6CO67kwGvZCNwbJtsbAaOrMpzNw5C50x8va7q7bbA4xQg1Jn8X4PJUEzlp3', 'o2V84hitN58eXjyDWnTQ2CT0ey9tfyqKLTYcOgX5', '2022-10-05 09:32:41', '2022-12-08 14:56:23'),
(156, NULL, NULL, NULL, NULL, 'تسنيم محمود طه موسى', 'tasneemma610@gmail.com', '$2y$10$UUi63UVuByvsdjBOxJqiy.qXIYJvy/vg5cqpayMp42PowM3lHatny', NULL, NULL, '51366946', NULL, '2022-10-05 11:34:06', 'loged in', '94.129.78.52', '95.216.37.146', NULL, 'CLc5wBsloBLtKieZiSqIlXw1JDkYZOyzy4pN5Scz', '2022-10-05 09:33:14', '2022-10-05 09:34:06'),
(157, NULL, NULL, NULL, NULL, 'اسماء احمد السيد جمعه', 'emanelkhouly1982@gmail.com', '$2y$10$YiIym1rWlYBx7vB.GsSD8eVaDRE2QfiCUPmDUNrrg/3UJLx7lAjXa', NULL, NULL, '66628216', NULL, '2022-10-05 11:40:39', 'loged in', '188.71.240.38', '95.216.37.146', NULL, 'ao5E85oxknWO6qv50RLsXpCOiwekJSPtibakaMIk', '2022-10-05 09:40:26', '2022-10-05 09:40:39'),
(158, NULL, NULL, NULL, NULL, 'دانه ياسر عبدالله عيد', 'danaoeid777@gmail.com', '$2y$10$yPbxhBgy3dusILAJf..Y5eMtXbS1wSKi3.RbwEzTUjfl/SOY1yIwm', NULL, NULL, '97122603', NULL, '2022-12-22 13:09:14', 'loged in', '188.236.50.6', '95.216.37.146', NULL, 'Qhp4ARHli7f2ImaMdgH6oyHMI2OFs0fhraZY7Qwy', '2022-10-05 09:51:07', '2022-12-22 12:09:14'),
(159, NULL, NULL, NULL, NULL, 'عبدالوهاب محمد بكري مبدي', 'aboodbakri13@gmail.com', '$2y$10$mcC6J/sTz7kvd.Bqpn0.lujWNr1RE2xhLgn5ouy2bpqqgXqmURnUC', NULL, NULL, '50118075', NULL, '2022-10-05 12:26:14', 'loged in', '94.128.69.14', NULL, NULL, NULL, '2022-10-05 10:26:14', '2022-10-05 10:26:14'),
(160, NULL, NULL, NULL, NULL, 'سعود فهد جابر', 'fahdjaber75@outlook.com', '$2y$10$r7AxnloUzFnseX3OxfGlYe8ryiOGWob36qnU/F6TT5LddycPwlfPC', NULL, NULL, '69979933', NULL, '2022-10-05 13:56:31', 'loged in', '37.231.144.154', '95.216.37.146', NULL, 'kD24pzEkXDB55FmJ0D6idxDgyRGXqem8cV4IlbIW', '2022-10-05 11:15:34', '2022-10-05 11:56:31'),
(161, NULL, NULL, NULL, NULL, 'عبد الرحمن احمد السيد', 'bodyahmed3500@gmail.com', '$2y$10$k2unj5mqJ7Wb2tr2Dkmrhur2wwHyyCWQMFOSRG/rk6c5JFpvhv4LC', NULL, NULL, '97911289', NULL, '2022-10-05 14:43:44', 'loged in', '188.236.132.140', '95.216.37.146', NULL, 'TAqt0OnT4226ah2TiNBg1I3YL6xLaAlTjORi8LHr', '2022-10-05 12:42:12', '2022-10-05 12:43:44'),
(162, NULL, NULL, NULL, NULL, 'ياسمين باسم محمد حمادي', 'b.m702@yahoo.com', '$2y$10$NsZGcSWPH9FVOtJj1y3uouGsVyGwYZKIyVwGB24rAKGdX1vNF36VS', NULL, NULL, '67799826', NULL, '2022-10-05 18:14:15', 'loged in', '188.70.12.56', '95.216.37.146', NULL, 'KjEZuT78NjKxwmYVf95JV14qYNlfF1S0bGjsm3xe', '2022-10-05 16:10:44', '2022-10-05 16:14:15'),
(163, NULL, NULL, NULL, NULL, 'رؤى طلعت علي', 'tmmrali@yahoo.com', '$2y$10$4dpYF3TGu8bPhTa82Qmflu4ZSyuYm3NXqlRnndMJ6AGp/cDBDDPeO', NULL, NULL, '55422314', NULL, '2022-10-05 19:15:02', 'loged in', '37.231.72.212', '95.216.37.146', NULL, 'szhdBQmxfmXMcU3Xngrb21RHWtf2pDlfpsNp2V4Z', '2022-10-05 17:13:14', '2022-10-05 17:15:02'),
(164, NULL, NULL, NULL, NULL, 'احمد عبدالتواب مهني جاب الله', 'elboushy@outlook.com', '$2y$10$U/BVKzs2ogMxL.Du.rqyhedyTjk94s9Bn13ruIQ6or22f.Y9eeuXa', NULL, NULL, '201120480458', NULL, '2022-10-06 18:02:04', 'loged in', '156.209.127.209', '95.216.37.146', NULL, 'Qma6nnwZV9ew0BPci5wmXVJPp2BnhYNf3LJgSgRP', '2022-10-06 16:01:54', '2022-10-06 16:02:04'),
(165, NULL, NULL, NULL, NULL, 'حنين ابراهيم احمد عبدالحميد', 'ziad22848@gmail.com', '$2y$10$2rkxJar7YhE/sX3WRKs/4.DlFzhJKzJ6ROvqMsiQ0EgHNBPTOTbSO', NULL, NULL, '90006840', NULL, '2022-10-06 21:23:14', 'loged out', '196.154.82.20', '95.216.37.146', 'ggCd7xQFsz42TrtOscadQOHx1xG7RAKKthxrMFqXoqu13mxgBs3hWW8iqhMa', 'iot2hcvygXFN44X77iBN5sxMyvIhYA664FGheZ7s', '2022-10-06 19:23:04', '2022-10-06 19:25:52'),
(166, NULL, NULL, NULL, NULL, 'فهد مشاري اليعقوب', 'alyaqoub2006@gmail.com', '$2y$10$d88gREXk1ZMz79UTmxsvmedUxpcqEEe0lb.6MKxdUN/Q.zVaAfgE2', NULL, NULL, '96001808', NULL, '2022-10-07 06:32:07', 'loged in', '37.36.198.130', '95.216.37.146', NULL, 'zBiunerkDcsP4ywsgvyoMCf3U0nBIhpbslHBafwL', '2022-10-07 04:31:18', '2022-10-07 04:32:07'),
(167, NULL, NULL, NULL, NULL, 'نجود زايد خلف الزايد', 'Mariiamalzz@gmail.com', '$2y$10$NpFBOAFaEulhUvdr/yzqueV2p3.Yl9VyeNF6b/5yhjZDgwTbKSviq', NULL, NULL, '97925987', NULL, '2022-10-08 09:13:21', 'loged in', '188.236.153.11', '95.216.37.146', NULL, 'VX17rJjrekTH8l4v2MJyxC8Im0faHOdyS7seI946', '2022-10-08 07:12:59', '2022-10-08 07:13:21'),
(168, NULL, NULL, NULL, NULL, 'Rawan Alshaban', 'rawanfarouk676@gmail.com', '$2y$10$JNzKiO07mtdjhWbU5LfSN.DyFWRtYd0DGxV03Q9dxoZIm3rFED8Ma', NULL, NULL, '50391449', NULL, '2022-10-08 14:58:07', 'loged in', '94.128.69.77', NULL, NULL, NULL, '2022-10-08 12:58:07', '2022-10-08 12:58:07'),
(169, NULL, NULL, NULL, NULL, 'احمد احمد احمد', 'ezzxv123@gmail.com', '$2y$10$.6TONhNUIeBU.KQpEBHTGuIhVVC7ZVdfc58VK.IDApd3Dja.D5Wdi', NULL, NULL, '50681392', NULL, '2022-10-08 14:58:28', 'loged in', '94.128.81.138', '95.216.37.146', NULL, 'S8AAIROsWhBgsjmgEga8g1JD6oOBrwTrV0RyGISR', '2022-10-08 12:58:19', '2022-10-08 12:58:28'),
(170, NULL, NULL, NULL, NULL, 'عائشة محمد', 'samadoma1234@gmail.com', '$2y$10$y58MdtJL09SWlCt.EltFxeNYkuY4Z.BmwJ5rI5eoniyCETlb2qjLK', NULL, NULL, '94138344', NULL, '2022-10-08 20:40:30', 'loged in', '188.236.144.215', '95.216.37.146', NULL, 'EFkpMsRB4hprzKNSJId2wnSgteZzcrhov5iAm5Si', '2022-10-08 18:40:17', '2022-10-08 18:40:30'),
(171, NULL, NULL, NULL, NULL, 'عبدالرحيم محمود شحاته ابراهيم', 'abdulraheemshahata@gmail.com', '$2y$10$uDxMuroOKQbbTn4QqTgXOu.lZLyv1yF2KYwQ3oGXIdfyo2E1mjeIq', NULL, NULL, '97233701', NULL, '2022-10-09 14:02:03', 'loged in', '188.236.208.184', '95.216.37.146', NULL, '67cufWK3yNJOZTBzeX4Z3T5udCKeKV4hBMOJ3uWo', '2022-10-09 12:01:47', '2022-10-09 12:02:03'),
(172, NULL, NULL, NULL, NULL, 'Asayel Alebrahim', 'asayel.alibrahim@icloud.com', '$2y$10$9GzpALlPX/UXkZr4dohSruCY.8ymqPaUH9KtLh7PE/rHCpqxv7.zi', NULL, NULL, '67678898', NULL, '2022-10-09 15:47:02', 'loged in', '188.70.47.121', '95.216.37.146', NULL, 'MIxebEi556yuQR7QmtihAh1Hh18VNhHcn3oLs0J4', '2022-10-09 13:46:08', '2022-10-09 13:47:02'),
(173, NULL, NULL, NULL, NULL, 'جنى محمد المردود', 'karam-66@hotmail.com', '$2y$10$WuAZd6sAkrfrZpbp6f0DwejljOXqwJZF4BoWvs9TN3HexvgJkOW5G', NULL, NULL, '99588416', NULL, '2022-10-10 11:42:20', 'loged in', '188.71.206.144', '95.216.37.146', NULL, 'oARbaiXOQ29hbSL41xiZ0LH7TFHd7hy82edAemQY', '2022-10-09 17:47:18', '2022-10-10 09:42:20'),
(174, NULL, NULL, NULL, NULL, 'ناصر العجمي', 'om-rashod2010@hotmail.com', '$2y$10$QuuKjuQc3DIKMcyPApH0nOgCNRUfEzgWgwT5BSfcRjyEG/2q31aDi', NULL, NULL, '98886841', NULL, '2022-10-11 18:21:49', 'loged in', '37.231.28.203', '95.216.37.146', NULL, 'MrxFmVRl38qFCB6opH2RCQ67Q6yJokyPBjcFMUsC', '2022-10-11 16:20:56', '2022-10-11 16:21:49'),
(175, NULL, NULL, NULL, NULL, 'Mohamed ibrahimmohamed', 'eng.saawy@gmail.com', '$2y$10$Rla1nqiPjqlmRj8BwKz/C.lCORF0JQ9us5t68wNxCiQegHkgilUG.', NULL, NULL, '60322441', NULL, '2022-10-11 19:13:04', 'loged in', '188.70.1.208', '95.216.37.146', NULL, 'eqes5Gay8wArKD9Lhs8F2mTQPuHGSZn1OJtlLHjZ', '2022-10-11 17:12:28', '2022-10-11 17:13:04'),
(176, NULL, NULL, NULL, NULL, 'Cicil', 'cicillinguini@gmail.com', '$2y$10$RIhrof8YqQkHMnN3w4FDZ.nrUBFLOlZD.9lxvmgu3vNnxhXqe9tIW', NULL, NULL, '50131907', NULL, '2022-10-11 20:02:08', 'loged in', '94.129.207.99', '95.216.37.146', NULL, 'WYZ5lTmpggbLuwXvR8v6rrkvYUqhli31XIPwTZzi', '2022-10-11 18:01:55', '2022-10-11 18:02:08'),
(177, NULL, NULL, NULL, NULL, 'رغد سمير عبد العظيم', 'redvelvetvsdfg@gmail.com', '$2y$10$09BKaDDkAZcHu9JkN4E6aeRi6WT.AMM1WJqSgvi2FAUfmUyi9d2QO', NULL, NULL, '66427350', NULL, '2022-10-14 10:05:29', 'loged in', '37.37.66.132', '95.216.37.146', NULL, 'v2aLCSU7D4lEKmaoebSaIY8zZkDUOMcfUXCMnpsY', '2022-10-14 08:03:23', '2022-10-14 08:05:29'),
(178, NULL, NULL, NULL, NULL, 'شهد محمد صلاح حماد', 'sh.hammad2005@gmail.com', '$2y$10$1fdCYjUjFC.qCg74eWmesuTlGIN0BK56GHVLpPfgrkrlJUQ6ijxmi', NULL, NULL, '96067763', NULL, '2022-10-14 11:17:03', 'loged in', '188.236.48.204', NULL, NULL, NULL, '2022-10-14 09:17:03', '2022-10-14 09:17:03'),
(179, NULL, NULL, NULL, NULL, 'اسيل خالد علي محمد الجعفري', 'aseela200634@gmail.com', '$2y$10$s7d9OWCo28T58sX4P4CB0.rQZJ8n1lRlDg0MGButSd8EbkIYutbcC', NULL, NULL, '99501705', NULL, '2022-10-14 18:09:34', 'loged in', '37.37.62.223', NULL, NULL, NULL, '2022-10-14 16:09:34', '2022-10-14 16:09:34'),
(180, NULL, NULL, NULL, NULL, 'اسيل خالد علي محمد الجعفري', 'aseel200634a@gmail.com', '$2y$10$Ci4PVxU/Ac37.Qd2QUwnO.hmx755ac4LKWkZCUhj0Kh2Q8tpE4.2.', NULL, NULL, '99347978', NULL, '2022-10-14 18:21:53', 'loged in', '37.37.62.223', '95.216.37.146', NULL, 'cEbrkpH8hCi6cj2kjqLSnyyywU5M3YDnGe0pA8AC', '2022-10-14 16:14:57', '2022-10-14 16:21:53'),
(181, NULL, NULL, NULL, NULL, 'اسيل خالد علي محمد الجعفري', 'alkd20063425@gamil.com', '$2y$10$6BZ1tSc6YWelOUXZnwPEb.1J00Hzxc8FL7GcZr3DWk49oUPOIbSL6', NULL, NULL, '96966403', NULL, '2022-10-14 18:21:44', 'loged in', '37.37.62.223', NULL, NULL, NULL, '2022-10-14 16:21:44', '2022-10-14 16:21:44'),
(182, NULL, NULL, NULL, NULL, 'احمد محمود ابراهيم حسن', 'a7med_deso2y2005@hotmail.com', '$2y$10$Yv2.1NnY7uuurFEBb2DPq.UeRUvWWAFlvhaDzb9dKOD23xA5d0wrK', NULL, NULL, '51312148', NULL, '2022-10-19 16:39:32', 'loged in', '37.231.149.70', '95.216.37.146', NULL, '394uC105hxlpczJKEsIPSVdSvCF4b9DY0IQ8geZr', '2022-10-19 14:37:06', '2022-10-19 14:39:32'),
(183, NULL, NULL, NULL, NULL, 'داوود', 'mmj.kuwait@gmail.com', '$2y$10$rBWbxyq885BxPywH8ntRCe14MEb/HjnTB96fqiQSWLT2VblAcwTxm', NULL, NULL, '66288277', NULL, '2022-10-22 10:48:42', 'loged in', '37.231.58.22', '95.216.37.146', NULL, 's4Xi1zVl0RnzsOTHlsP3fgIVSUPrPcCcYxZNjUJD', '2022-10-22 08:46:39', '2022-10-22 08:48:42'),
(184, NULL, NULL, NULL, NULL, 'شادي محمد عبد العليم', 'shadykwt@hotmail.com', '$2y$10$mPf4gxYvIMvalIQx1N.22.9H.AeyRXbYAgA8UNMpTRrm0ctdUyUAC', NULL, NULL, '94037671', NULL, '2022-10-24 10:19:34', 'loged in', '94.128.82.153', NULL, NULL, NULL, '2022-10-24 08:19:34', '2022-10-24 08:19:34'),
(185, NULL, NULL, NULL, NULL, 'محمود احمد', 'mahmoudahmed114400@gmail.com', '$2y$10$rtSux7RCK7qG10dlTc.ygepWdSgzsfaDc21OFIrzQFNK6gUN4nn0.', NULL, NULL, '69663278', NULL, '2022-10-25 15:14:58', 'loged in', '188.71.252.56', '95.216.37.146', NULL, 'Zuf4fq4wbdK3FmB0N1aTGMMNtATVBFVpMXGGEgm8', '2022-10-25 13:13:52', '2022-10-25 13:14:58'),
(186, NULL, NULL, NULL, NULL, 'نور', 'nourdyler@gmail.com', '$2y$10$015MG5SnLRW2cTJwo.aNbuO.eIADd4A9.88c7Q/xfFdkPgEE/nakG', NULL, NULL, '69932466', NULL, '2022-10-25 20:43:02', 'loged in', '188.71.203.7', '95.216.37.146', NULL, 'rdoWmJTjfv33FM8SHD0eKBHm3cfsF6mnVYYAwI2b', '2022-10-25 18:42:56', '2022-10-25 18:43:02'),
(187, NULL, NULL, NULL, NULL, 'Barakat Abdulkarim', 'businessmanshop2021@gmail.com', '$2y$10$abr8PEoE2TyWf8gRq3cDL.vlSKEHAUctVjDM.EwFrKSRlD1P0UPji', NULL, NULL, '98599473', NULL, '2022-10-28 14:09:55', 'loged in', '37.39.249.6', '95.216.37.146', NULL, 'IB5aSsFK8QoZTzssbe4TkJPm7ON8kw3sijEWENOO', '2022-10-28 12:09:43', '2022-10-28 12:09:55'),
(188, NULL, NULL, NULL, NULL, 'Abdullah basem kadem matar', 'pamukme32@gmail.com', '$2y$10$l.C0sJfeK6Ny2OqdGYnkg.oLMtYoItyApCcXLO7et6nkN9TDQLmhO', NULL, NULL, '67718289', NULL, '2022-10-30 03:15:01', 'loged in', '188.71.241.45', '95.216.37.146', NULL, 'ohTd7NiKtHXOIe1FK44NMqh6k2zrP21vOyP6yEwJ', '2022-10-30 02:14:01', '2022-10-30 02:15:01'),
(189, NULL, NULL, NULL, NULL, 'روان محمود محمد', 'shoman1594@gmail.com', '$2y$10$MmdpEW8MoTadEszNmbH8jehJrkf4azEfh.3l6.GyUDUfA7W4CpzDe', NULL, NULL, '96656847', NULL, '2022-10-30 13:28:08', 'loged in', '37.231.101.184', '95.216.37.146', NULL, '1bSc3ObNFruSwUbAKzNB1OXS3DZaLCYJDMlPFSor', '2022-10-30 12:27:56', '2022-10-30 12:28:08'),
(190, NULL, NULL, NULL, NULL, 'عبدالمحسن هشام محمد العوضي', '7asoonalawadhi69@gmail.com', '$2y$10$bO3rDS1gOnyFQcrQmswy3eKixATQcQDukRoceRX6di8I1qBpmw9Ty', NULL, NULL, '69900581', NULL, '2022-10-30 17:09:27', 'loged in', '188.70.40.222', '95.216.37.146', NULL, 'H9wGk7BUvdSqTZwamjN90pCXY6Ia5EDcohCKSoW7', '2022-10-30 16:08:40', '2022-10-30 16:09:27'),
(191, NULL, NULL, NULL, NULL, 'معاذ رزق', 'moazzerq2022@gmail.com', '$2y$10$XWg6WnmIMiicJHoVeomPbeOfh2Nv9ZGFmKzrkxGLLFdAdfYlf5gp2', NULL, NULL, '51249335', NULL, '2022-10-31 15:44:51', 'loged in', '37.231.252.6', '95.216.37.146', NULL, 'I77G3YJ33u0CEjBJWs9uPm765dNz5qW8cgfKnpfH', '2022-10-31 14:44:29', '2022-10-31 14:44:51'),
(192, NULL, NULL, NULL, NULL, 'انور', 'anwarkhamees2019@gmail.com', '$2y$10$uH5ogUflTBys1dIV0Clx4.PnSNqQ48/l4BQc46A5ozoQMpUKUOaGS', NULL, NULL, '51005378', NULL, '2022-11-05 19:44:20', 'loged in', '94.128.218.97', '95.216.37.146', NULL, 'ODTGC2QZeu321kH3AiZL1Xu1zqNLylcwQBiYT7hK', '2022-11-05 18:44:01', '2022-11-05 18:44:20'),
(193, NULL, NULL, NULL, NULL, 'احمد علي مصطفى', 'adreano010@gmail.com', '$2y$10$E54xQt9cu8Xm2B0eT9hMeO3felIaXJPJf8wrDlBWuLvQp/4shy5hO', NULL, NULL, '550602003', NULL, '2022-11-07 16:56:41', 'loged in', '188.70.57.246', '95.216.37.146', NULL, 'ujDAO6I3vGB3GNhZjo52zFtmfRxFHQqXA07Zemen', '2022-11-07 15:56:11', '2022-11-07 15:56:41'),
(194, NULL, NULL, NULL, NULL, 'رتاج', 'ritajqq87@outlook.sa', '$2y$10$WAPccyTGaUEtz4oM29csT.oeNPRlnS4T7RdowOusNwCRSrhEP4nom', NULL, NULL, '65124205', NULL, '2022-12-23 00:48:55', 'loged in', '37.231.219.238', '95.216.37.146', NULL, 'hIunP0gIyrQ2jcuDKRTDnXtcxydPAiXjFjKYRBds', '2022-11-14 10:25:02', '2022-12-22 23:48:55'),
(195, NULL, NULL, NULL, NULL, 'منة الله مصطفى', 'monmonmostafa44@gmail.com', '$2y$10$2c8IOUJsRLH4G2b3FoZFsee1/zI3UkpNfWNprlHpbyeMBA0zDP4rG', NULL, NULL, '66615934', NULL, '2022-11-16 17:33:09', 'loged in', '188.70.38.176', '95.216.37.146', NULL, 'WhP0xiKUpwB76BO7fQx3aVLFIWmnvL5s0HsPEZDW', '2022-11-16 16:32:48', '2022-11-16 16:33:09'),
(196, NULL, NULL, NULL, NULL, 'نور علي احمد البلوشي', 'noni2006b@gmail.com', '$2y$10$MX3p9rZHcuV6PJ5qkdb6ju4WzAYYktm44qsHJU8h6UquIhRk6c0yu', NULL, NULL, '99833956', NULL, '2022-11-20 14:31:28', 'loged in', '37.37.32.202', '95.216.37.146', NULL, 'E8JraYjuFleVihoMUHgr43x9OaZCj0RON8T5W1Nf', '2022-11-20 13:31:22', '2022-11-20 13:31:28'),
(197, NULL, NULL, NULL, NULL, 'محمود محمد احمد علي', 'm@m.com', '$2y$10$20lf2UZmogSweggmc6kY6e1qCquruQIVxxL0yy7M.Hyh.gbDx3o16', NULL, NULL, '01554238183', NULL, '2022-11-21 20:34:52', 'loged in', '197.62.134.102', '95.216.37.146', NULL, 'YKkwzaEgV1i8K0lR0ZDbHaxscmiylDoGiKLbbkco', '2022-11-21 11:01:41', '2022-11-21 19:34:52'),
(198, NULL, NULL, NULL, NULL, 'ali salem ahmed', 'pooman800@gmail.com', '$2y$10$cA4vHijgkTWJJ9d6Mo0dF.1z3WCeraIKreBgEliLvwriL3fDRMBs6', NULL, NULL, '66258617', NULL, '2022-12-09 16:00:58', 'loged in', '188.70.17.255', '95.216.37.146', NULL, 'cu904b7apwS4MltFbOlqtUjUdRQgH1nqgalcm5G2', '2022-11-22 19:04:39', '2022-12-09 15:00:58'),
(199, NULL, NULL, NULL, NULL, 'منه الله علاء الدين احمد', 'monmelamon@gmail.com', '$2y$10$V.LHNkYEEvyY87s8lB.t1uac/K3OjI3PfzNPprAVrVGkWq.Z4n/oy', NULL, NULL, '67787582', NULL, '2022-12-11 20:05:07', 'loged in', '37.231.239.5', '95.216.37.146', NULL, 'iSXyqO0594a1DUHVoP02EADhswwjmFz3VBgjzQxX', '2022-12-08 12:39:39', '2022-12-11 19:05:07'),
(200, NULL, NULL, NULL, NULL, 'هبه فكري', 'hebaf1981@hotmail.com', '$2y$10$YAC9yXITJNgpr3PESIm80uApydRX3NluDIHJ9BfZWkSlQ2wJor/0m', NULL, NULL, '99696988', NULL, '2022-12-08 13:47:25', 'loged in', '188.70.54.185', '95.216.37.146', NULL, 'V4qJMdIbHXdYhHg5wxExPeIEO7QQIu7pPRMoIkXD', '2022-12-08 12:47:13', '2022-12-08 12:47:25'),
(201, NULL, NULL, NULL, NULL, 'رغد علي عطية العوضي', 'alawadiraghad@gmail.com', '$2y$10$VUEGq0f7ofJer52OeWa/J.CnR7De3/kO2ZWyPUZFyIj7Fw1E7LS8K', NULL, NULL, '60019687', NULL, '2022-12-08 14:04:01', 'loged in', '37.231.42.237', '95.216.37.146', NULL, 'nnCNP8NGsTY8ig3Um7H0tzLPod2a15NGuNyNAPt1', '2022-12-08 13:03:34', '2022-12-08 13:04:01'),
(202, NULL, NULL, NULL, NULL, 'أحمد إسلام منير', 'ae257535@gmail.com', '$2y$10$BoGe2OigcZgvTy/Ajv0hzeurNpMAyVyxuxTEPcIGKJGFry21uE3/m', NULL, NULL, '66988623', NULL, '2022-12-08 14:09:56', 'loged in', '37.231.236.88', NULL, NULL, NULL, '2022-12-08 13:09:56', '2022-12-08 13:09:56'),
(203, NULL, NULL, NULL, NULL, 'Mahmoud', 'nesren5568@gmail.com', '$2y$10$3hD.DSzoqyq4PIuOchkOKeLnjQP6iYujJISaPJtz0L6HCIACUlJwq', NULL, NULL, '69390918', NULL, '2022-12-08 14:29:42', 'loged in', '188.71.233.50', '95.216.37.146', NULL, 'jrqi2wm94PE3CzDWbx0OJIke4WVyX8RJaiL1IvSs', '2022-12-08 13:29:26', '2022-12-08 13:29:42'),
(204, NULL, NULL, NULL, NULL, 'Morhf Alhriri', 'morhfalhriri1@gmail.com', '$2y$10$Z3C2sBf92UWQRBoHqX.TmegMhBnfpgMdtBnhhpjHirOLHFJL.zPNK', NULL, NULL, '65040627', NULL, '2022-12-08 19:01:03', 'loged in', '188.70.24.81', '95.216.37.146', NULL, 'NxQkXKzR7pKrCkl3B7zwSN14vIwImovQIr0dwNUq', '2022-12-08 13:37:52', '2022-12-08 18:01:03'),
(205, NULL, NULL, NULL, NULL, 'وصال البدر', 'wesalb06@gmail.com', '$2y$10$UjJqUQKTe5ULdX2XOYUfFuQI0oFpW3dAAM.ZXfgGzmPAZH2DWqAh2', NULL, NULL, '50206397', NULL, '2022-12-08 19:08:52', 'loged in', '94.128.222.34', '95.216.37.146', NULL, 'Vs8hBNBBAfv00fDRx90j8xvZN0Gx7ATOgJF4Pdkh', '2022-12-08 13:55:47', '2022-12-08 18:08:52'),
(206, NULL, NULL, NULL, NULL, 'Ahmed Haysam abdulhadi ali', 'ahmedhaysam71@gmail.com', '$2y$10$qBIgxUtA6QpQR0tOncDrceM6QOclU0c2TmHQht1sdX7HoAgCf8Vue', NULL, NULL, '99307936', NULL, '2022-12-08 18:58:27', 'loged in', '37.231.66.151', '95.216.37.146', NULL, 'rk7RwPSlue4rE6nNWoYR2RbwjSNaJGmtWmA54piW', '2022-12-08 14:01:53', '2022-12-08 17:58:27'),
(207, NULL, NULL, NULL, NULL, 'Rama Emad', 'ramakamel45@gmail.com', '$2y$10$Oa9RNo5w9YEsHXxW1C7rju/cutZ/MzOcVsO6BBrvxAUO4bGmBZ.7G', NULL, NULL, '56559190', NULL, '2022-12-08 15:13:07', 'loged in', '31.214.34.64', NULL, NULL, NULL, '2022-12-08 14:13:07', '2022-12-08 14:13:07'),
(208, NULL, NULL, NULL, NULL, 'مريم جلال حسن احمد الحسيني', 'nashwa.abd@ku.adu.kw', '$2y$10$n3.Sk0c/ghFxwfbjEbv0yOpjSK6SubpyaQ3iNYBrAKT/rlW/Mvgwa', NULL, NULL, '99662698', NULL, '2022-12-08 15:15:27', 'loged in', '188.71.234.185', NULL, NULL, NULL, '2022-12-08 14:15:27', '2022-12-08 14:15:27'),
(209, NULL, NULL, NULL, NULL, 'روان عرفه عبدالحميد ناجي', 'rawanarafa748@gmail.com', '$2y$10$fTYHip4V.wHOYEQqtfCzd.JiP5KivRQ/1zL/mfDeyCPFSKlwTZ06K', NULL, NULL, '96566726548', NULL, '2022-12-08 15:36:11', 'loged out', '188.71.251.101', '95.216.37.146', 'WskfqCyNyC6gyFKkTdGXEkdHYTaWo7elwym7oIN9epJrmmOtuGVq78xhxzf4', 'S9AEbjBdpe3t91ovXW9KDQAfQXJTF5Hc5gGsM2Zy', '2022-12-08 14:19:51', '2022-12-08 14:36:39'),
(210, NULL, NULL, NULL, NULL, 'جود مظفر رياض خليفة', 'beidoun79@gmail.con', '$2y$10$e5YHrNMTLUE52xChyZxexesQlh4rAhFDy2kRxUYKmae23iRvSoZV2', NULL, NULL, '65999040', NULL, '2022-12-08 15:20:51', 'loged in', '188.71.218.251', '95.216.37.146', NULL, 'wlBa7GTb4Ci3HrdFubf1AAgfYzJr2RPzAeC1ZXXc', '2022-12-08 14:20:38', '2022-12-08 14:20:51'),
(211, NULL, NULL, NULL, NULL, 'روان عرفه عبدالحميد  احمد', 'Rawanarafa02@gmail.com', '$2y$10$jvrY4iimiSWEXF3rCO.3Vu70StNxMrxazkYwJbY8o2twMggiWCsBi', NULL, NULL, '96597997821', NULL, '2022-12-10 19:16:36', 'loged in', '188.71.208.238', '95.216.37.146', NULL, 'xEKtb3kttK1X32gLOlRbllcCGyPyVr4kXpt2YdtK', '2022-12-08 14:38:39', '2022-12-10 18:16:36'),
(212, NULL, NULL, NULL, NULL, 'نورين اشرف شلبي', 'noureenashraf64@gamil.com', '$2y$10$Azei7tNFnhgXWcMnWHg5BulUQYXLpviQt91XPuxSu537SVhp9CwIy', NULL, NULL, '98826821', NULL, '2022-12-08 15:55:09', 'loged in', '37.39.180.154', '95.216.37.146', NULL, 'QhgsZHSRcgZaexxeNz4yxgLSZjIJOvPeQYEaAixd', '2022-12-08 14:51:31', '2022-12-08 14:55:09'),
(213, NULL, NULL, NULL, NULL, 'راكان فهد يوسف الراشد', 'rakanalrashed911@gmail.com', '$2y$10$rwcAQmwMVDvajIUC.B3kgeJHtob2m3n53KBz53LmBvfHdAIWZFo5O', NULL, NULL, '66357585', NULL, '2022-12-08 15:57:23', 'loged in', '37.231.93.44', '95.216.37.146', NULL, 'oWdLSp9zcrRCyLp9K4AsY8q0zEKMd0b0tSuI98ld', '2022-12-08 14:56:41', '2022-12-08 14:57:23'),
(214, NULL, NULL, NULL, NULL, 'حازم مدحت فوزي', 'hazemmedhat77@gmail.com', '$2y$10$1YeqJy9Njzg9eBTilWwojO8EqNYXozcf4MkP/cW9kylqCib0/e7AK', NULL, NULL, '98530435', NULL, '2022-12-08 16:00:05', 'loged in', '37.39.233.167', '95.216.37.146', NULL, 'NXohV76IpPlVPYuPE5qmEaLlpduH0XaAx4kQkAH1', '2022-12-08 14:58:58', '2022-12-08 15:00:05'),
(215, NULL, NULL, NULL, NULL, 'رزان علي ثقيل العجمي', 'razanaalajmi@hotmail.com', '$2y$10$soBPsNEesQamivt6fLxV6ObVITAPP.5mC0noQIXfgclta75oWTLlO', NULL, NULL, '51761653', NULL, '2022-12-08 16:14:46', 'loged in', '188.236.64.1', '95.216.37.146', NULL, '7RoCLDk8MnDUjmMbYUPzRyh5RPt5WkpBqVVejMBt', '2022-12-08 15:14:40', '2022-12-08 15:14:46'),
(216, NULL, NULL, NULL, NULL, 'نور يوسف شفيق فرحان', 'norakw166@gmail.com', '$2y$10$sIe4DYuwx6jpKzHAYJXAS.XFNWup/wBuXBcXWZ/5lgDpeQwc4Bxxq', NULL, NULL, '56599877', NULL, '2022-12-08 16:17:36', 'loged in', '94.128.214.104', '95.216.37.146', NULL, 'IXohxBHLpG1avxgxC9BPSLOLYAcXMSuYOGabf2Pd', '2022-12-08 15:16:47', '2022-12-08 15:17:36'),
(217, NULL, NULL, NULL, NULL, 'عبدالرحمن محمد عبدالرحمن مهداوي', 'arij610@yahoo.com', '$2y$10$3paXqjgRkSjaT8feLOnCXewESR/ZvV.WOSPNByq5RJ0WWgqQ3RgQW', NULL, NULL, '55516141', NULL, '2022-12-08 16:22:43', 'loged in', '37.231.254.39', '95.216.37.146', NULL, 'VPFfmQtx7VE1OaPzxAuePHxVeICgVx1R0T6M1goF', '2022-12-08 15:22:19', '2022-12-08 15:22:43'),
(218, NULL, NULL, NULL, NULL, 'دينا محمود على محمود', 'elsayadnoha107@gmail.com', '$2y$10$SKRsWpGUlslrXVRUvcFvjuFXKDdvu3sspPod8FIpyLEvuY4bDczWu', NULL, NULL, '66201258', NULL, '2022-12-08 18:54:09', 'loged in', '188.71.237.43', '95.216.37.146', NULL, 'wcH7tfatTbTiXnWaY9ErhGQpYccP4iDdqghsrrVj', '2022-12-08 15:59:12', '2022-12-08 17:54:09'),
(219, NULL, NULL, NULL, NULL, 'ماران مقبل', 'maranmokbel@gmail.com', '$2y$10$BLvPF9IYCrNxkyYanM8IT.QTeTnbtImlqLHn43bpX7cxovT/AxV7a', NULL, NULL, '50515742', NULL, '2022-12-08 17:03:39', 'loged in', '94.129.7.22', '95.216.37.146', NULL, 'boNEbvw57RAC3gk8sezwHRViKNwgqLnQ8OkMcAip', '2022-12-08 16:02:53', '2022-12-08 16:03:39'),
(220, NULL, NULL, NULL, NULL, 'dina mahmoud ali megahed', 'dinamahmoud1928@gmail.com', '$2y$10$Aubqo6yBsdPWuaawH7SGdOCwScKfLfA2/uGQkPNC/Hh7ryNt6lYwW', NULL, NULL, '65090995', NULL, '2022-12-08 17:11:42', 'loged in', '188.71.237.43', '95.216.37.146', NULL, 'H48e0C2psOLWs50y7ppwRbHTLWk6HnZRgqDd2cvm', '2022-12-08 16:11:33', '2022-12-08 16:11:42'),
(221, NULL, NULL, NULL, NULL, 'غلا جاسر مشعل الشمري', 'Ghala.alshammeri6@gmail.com', '$2y$10$73ne9y9UvB3XxrGhrq5VQ.NMxyxG/OXf7linckNl0GFJ0FEOcm9Bm', NULL, NULL, '51211868', NULL, '2022-12-08 17:19:37', 'loged in', '37.231.221.109', '95.216.37.146', NULL, 'xKS4H69eNmuYpTokIUK9aTvPO7wCzjmYMEyukgCf', '2022-12-08 16:19:28', '2022-12-08 16:19:37'),
(222, NULL, NULL, NULL, NULL, 'حسام حسن سداد ثابت علي', 'hassanalsadad@gmail.com', '$2y$10$.2alW6La3d7pAszT2gRvzeJeckQVlGPmYnk/pafcmgUu4bWGELOEi', NULL, NULL, '66938614', NULL, '2022-12-08 17:26:17', 'loged out', '188.71.216.95', '95.216.37.146', 'BRvN1v1IgEJcM5zpic5wlnXKi8mmbkxM9QCoAHobsd9b0UvZf89E1psIVss4', 'Gg0OQCOFRIXm5ivLU6WA6sHOFCYHmcr6ZB9KUiWg', '2022-12-08 16:24:28', '2022-12-08 16:28:01'),
(223, NULL, NULL, NULL, NULL, 'محمد مراد فريد الموسطي', 'loolee917@gmail.com', '$2y$10$h5g/jqgyZQmaUedxaGHjk.gdDY9Swt.oWW4pe/LqHWTNMQOdEgiuK', NULL, NULL, '99279585', NULL, '2022-12-08 17:29:31', 'loged in', '37.231.158.43', '95.216.37.146', NULL, 'JZEMlYDD11mU2YEm88J1aiURdmHKZZ0ioNqTLfwA', '2022-12-08 16:29:15', '2022-12-08 16:29:31'),
(224, NULL, NULL, NULL, NULL, 'نورة حمد عبداللة العجمي', 'anghami111.30@gmail.com', '$2y$10$sPqtUBCUd7IR1utoxeRd5e7c.oDRYERC9wfwI6rT1uB4Px/dB.RfO', NULL, NULL, '67655993', NULL, '2022-12-08 17:42:26', 'loged in', '94.128.227.56', NULL, NULL, NULL, '2022-12-08 16:42:26', '2022-12-08 16:42:26'),
(225, NULL, NULL, NULL, NULL, 'فؤاد عبد الرزاق', 'aloklahfouad@gmail.com', '$2y$10$OvoZ9jKx7d0m95nD6Oq65e9lHwyA5gh3b41YZ66/sqfkJioVnKhl2', NULL, NULL, '95517975', NULL, '2022-12-08 17:52:58', 'loged out', '37.39.232.122', '95.216.37.146', 'wxgGcPAYbLdNOBVUxhDALRYV1O1zqznBtLHHOS2iJuzqCyVCHtiMECFG86uI', 'zDFms3E8pe6Yos3vH9KXfNcitWbLr6UWik35xRm1', '2022-12-08 16:51:42', '2022-12-08 16:53:21'),
(226, NULL, NULL, NULL, NULL, 'معتز خالد عبد الفتاح مسعد', 'Khaledmossad978@gmail.com', '$2y$10$gjHbLLwIQ46CpY5Ly69K3.pa86WoigJZ9d55T.wNquQdLfiAnwnte', NULL, NULL, '99464061', NULL, '2022-12-08 17:59:37', 'loged in', '188.236.80.55', '95.216.37.146', NULL, 'QZEdsL5lkPGsYAlmd4cbwcQV7ueMAu317Wc0iV8c', '2022-12-08 16:57:27', '2022-12-08 16:59:37'),
(227, NULL, NULL, NULL, NULL, 'رتاج محمد', 'smahmo906@gmail.com', '$2y$10$3b/Rky183ht8PAS4sLBXxOLgHMiJRAftlg3mdNTS5zX3qY5MyyV6q', NULL, NULL, '98636978', NULL, '2022-12-08 19:17:12', 'loged in', '188.70.45.127', '95.216.37.146', NULL, 'UyX3z5XU0NuG9IrjmbicHljbrekl5E3iMAKU6D61', '2022-12-08 17:26:28', '2022-12-08 18:17:12'),
(228, NULL, NULL, NULL, NULL, 'عبد الرحمن احمد', 'walaashamekh80@gmail.com', '$2y$10$S3vQg9PBmDKMFZzMiYNBw..pu5dDS6dOxmlktXefV4PY51im3dT4G', NULL, NULL, '960165333', NULL, '2022-12-08 18:26:53', 'loged in', '37.36.39.88', '95.216.37.146', NULL, '0tSkqlfQTbuFTqYFleSfv6p6u3ZadzNtpwKWza38', '2022-12-08 17:26:44', '2022-12-08 17:26:53'),
(229, NULL, NULL, NULL, NULL, 'عبدالرحمن حسام الدين', 'bodahosam@icloud.com', '$2y$10$qrRFuaJqY.HUzZNW9drQXeuWm0t3KINTx41nzM.O.ftmTruZUEUOG', NULL, NULL, '50954779', NULL, '2022-12-08 18:57:34', 'loged in', '37.231.124.90', '95.216.37.146', NULL, 'nWOnXtDiyYH8uQYsWFJnRPkXnweh1AEFNVdSF7xN', '2022-12-08 17:57:07', '2022-12-08 17:57:34'),
(230, NULL, NULL, NULL, NULL, 'محمود مصطفى', 'mahmoudmostafa2eg@gmail.com', '$2y$10$0vdqd29tNhHUd7khmHBg6e1BFdNm6On3GqmvkJ22S4f.f1ng2JRzi', NULL, NULL, '66992729', NULL, '2022-12-08 19:02:58', 'loged in', '37.39.255.103', '95.216.37.146', NULL, 'HYg2f7lzqDpXJx8Qb5zd0yDFDbP2nCRC4VyM44jT', '2022-12-08 18:02:41', '2022-12-08 18:02:58'),
(231, NULL, NULL, NULL, NULL, 'سارة', 'mariam.alrasheedi404@gmail.com', '$2y$10$gGhWKIAylKX.E1Tyvc65N.TKMs648qv9vMMU2HHuaQnp0bky2xXRG', NULL, NULL, '1234567', NULL, '2022-12-08 19:03:21', 'loged in', '37.231.59.180', '95.216.37.146', NULL, 'LTrvhC97b15ltf6iwCg68vsKqr623m0iIBkNHGN2', '2022-12-08 18:03:15', '2022-12-08 18:03:21'),
(232, NULL, NULL, NULL, NULL, 'نور عثمان المطيري', 'ranoooshq8@yahoo.com', '$2y$10$eLXcom67xwf7qhfaJTbBj.N76Wy0jEmYgbR59JN7sdTivnsEOdC86', NULL, NULL, '2097575047', NULL, '2022-12-08 19:05:35', 'loged in', '188.70.48.174', '95.216.37.146', NULL, 'K1C8ROBX0Xe2vlUcreVs0lmVyM77jMGT8WzavAM3', '2022-12-08 18:04:27', '2022-12-08 18:05:35'),
(233, NULL, NULL, NULL, NULL, 'عمر محمد حسني عبدالله', 'omarmncic@gamil.com', '$2y$10$7BC5h772TMoAfInmwROlIuLZdxus902.lCZdurWKOUwbUmQzXe8gO', NULL, NULL, '97247857', NULL, '2022-12-08 19:04:45', 'loged in', '188.236.75.245', '95.216.37.146', NULL, 'XyJdsaOPkHm6qnrEIRQrzIRwwQ3jFetXWMPADVqz', '2022-12-08 18:04:36', '2022-12-08 18:04:45'),
(234, NULL, NULL, NULL, NULL, 'مريم صقر', 'hanim8139@gmail.com', '$2y$10$LNQuP5XzXW2vJXcoAnvwiOO1TiCZYXYZBt9wjdHc7Jvad4U2UgDhy', NULL, NULL, '60492197', NULL, '2022-12-08 19:09:11', 'loged in', '188.71.201.65', '95.216.37.146', NULL, 'pLgCVXU9BfYkCyMokvDAudFq6PL3ExDOswmWzwmy', '2022-12-08 18:04:38', '2022-12-08 18:09:11'),
(235, NULL, NULL, NULL, NULL, 'حنين ايهاب', 'nona1.aldeeb2006@gamil.com', '$2y$10$j6AxGsExoKT03UGQbGurdewTp3W3q5PbNOdNMXfdp9Ybm.hwTQS7C', NULL, NULL, '69624194', NULL, '2022-12-08 19:08:29', 'loged in', '188.70.25.195', '95.216.37.146', NULL, 'sLyZBWvdpXoWmJQLGCFCcHNXsSNfG1GxPUo7fQGc', '2022-12-08 18:07:58', '2022-12-08 18:08:29'),
(236, NULL, NULL, NULL, NULL, 'شوق عبدالاله الرشيدي', 'st.alhamad@gmail.com', '$2y$10$ecPZy6ocPS9NJByZ/4UcQuQRJsI3hx3.019XBHGIhR1eJbAsVkua.', NULL, NULL, '50515585', NULL, '2022-12-08 19:12:13', 'loged in', '37.231.119.34', '95.216.37.146', NULL, '9s86s3rF0SxEUKXJehzbBf5bT8yaS7r50QlsGQgP', '2022-12-08 18:11:44', '2022-12-08 18:12:13'),
(237, NULL, NULL, NULL, NULL, 'عبادة عماد', 'ahmadsy5167@gmail.com', '$2y$10$HSP7iFGVLQaQsujEPuOec.P5jrqpNXfqbVJVwqd0wbA9cI24a7Gge', NULL, NULL, '60905513', NULL, '2022-12-08 19:17:09', 'loged in', '188.70.53.202', '95.216.37.146', NULL, '1SBotgdZAX94Kifn3iMtHsrxmNpviSlWZSKReq3H', '2022-12-08 18:17:00', '2022-12-08 18:17:09'),
(238, NULL, NULL, NULL, NULL, 'يوسف أشرف أبو الحمد', 'ya6533818@gmail.com', '$2y$10$zDY76/27G6ca5cH/zDZ3IO8K02QT.97E7ZXj8rDSQA/8eIpylAYOG', NULL, NULL, '65837927', NULL, '2022-12-08 19:40:35', 'loged in', '188.71.237.55', '95.216.37.146', NULL, 'lpV0Mjnj2IqJWOJQuH8bBErsXlSPA0rDZxYUzd3H', '2022-12-08 18:39:25', '2022-12-08 18:40:35'),
(239, NULL, NULL, NULL, NULL, 'بيشوي ميشيل يونان لوز', 'beshoymechel2006@gmail.com', '$2y$10$7WgbTD3snx67XT/j41QcX.HtSOvz3zLKOYjaGHr.gx83rQJOp4gx.', NULL, NULL, '94495702', NULL, '2022-12-08 19:40:27', 'loged in', '94.128.214.70', '95.216.37.146', NULL, 'G6n4sdmnkc597zSQ2cTSCjiQbwqbsqDIZuWkUAbi', '2022-12-08 18:39:41', '2022-12-08 18:40:27'),
(240, NULL, NULL, NULL, NULL, 'محمد وجدي شهير خفش', 'wrr2mi@gmail.com', '$2y$10$uaaoNf7ffdiQIZmUjSoDcOPhLO7hCSL/4jAxecFuQWaCD3KMVTAwS', NULL, NULL, '97493300', NULL, '2022-12-08 19:42:35', 'loged in', '188.70.45.93', '95.216.37.146', NULL, 'bmf0x7SfhrkjDOprvReQDjsJZIfAkdOT7GHe8bUx', '2022-12-08 18:42:19', '2022-12-08 18:42:35'),
(241, NULL, NULL, NULL, NULL, 'Mohammed', '69018223mht@gmail.com', '$2y$10$5n.BtnngVuX088m7Yzk1.e69qNDFnZGUGJkvghW34GWj05Wx/vWJG', NULL, NULL, '66595911', NULL, '2022-12-08 19:53:34', 'loged in', '188.71.227.183', '95.216.37.146', NULL, 'VkNtOif58t8jFiffUzBbVxcX2Am3DQPga5pIg188', '2022-12-08 18:53:02', '2022-12-08 18:53:34'),
(242, NULL, NULL, NULL, NULL, 'رحمه صفوت عبدالراضي', 'rommahegazy@gmail.com', '$2y$10$9xIefHreWMTCzEYo/cf/zedMevjZEw9moAVkeE9u1zhNZgsn7pNRW', NULL, NULL, '99180262', NULL, '2022-12-08 19:59:00', 'loged in', '80.184.27.47', '95.216.37.146', NULL, 'PUTD7szdzhCwoPC9iEj4XJk856taZQECO4kwFCEq', '2022-12-08 18:58:22', '2022-12-08 18:59:00'),
(243, NULL, NULL, NULL, NULL, 'زياد الحسن موسى', 'ziadalhassan676@gmail.com', '$2y$10$lxH6TzPSQ1LX9routpG1FO7tNPQlyKqTzEUa5XyW8vh86yHqUZHgq', NULL, NULL, '55400520', NULL, '2022-12-08 20:22:17', 'loged out', '37.231.255.96', '95.216.37.146', 'lEPtPTSb06eAwmTOmST2jFnwNMVBNlmEjWQB08OHxYQenG54ZGfwI8KUPblK', 'KBHiaXSNGMfdjZhwn4sdyQvp7NXuEGXQa4vQBBul', '2022-12-08 19:21:11', '2022-12-08 19:23:02'),
(244, NULL, NULL, NULL, NULL, 'جنان عبدالعزيز جمعة محمد', 'jaee.626mandanii@icloud.com', '$2y$10$X6TJ5rkPzrf1bRaio/l59egSwFVaCZDB7ST1mcgroPRNkMP67NT3S', NULL, NULL, '99654871', NULL, '2022-12-08 20:28:29', 'loged in', '94.128.230.251', NULL, NULL, NULL, '2022-12-08 19:28:29', '2022-12-08 19:28:29'),
(245, NULL, NULL, NULL, NULL, 'تركي نواف غنام العامي', 'nayefalazmi2008@gmail.com', '$2y$10$0goJcD.PrwHYcuQEkuMHNOz.sA0F400Sj3zuIzGehSYLrim68IzpS', NULL, NULL, '98709822', NULL, '2022-12-08 22:19:12', 'loged in', '188.236.196.75', '95.216.37.146', NULL, 'NkKOr0msgqbyxy96ZNNjnNaYv0WGmZabyWOgSYrj', '2022-12-08 21:17:55', '2022-12-08 21:19:12'),
(246, NULL, NULL, NULL, NULL, 'اسما سالم صقر المطيري', 'om3bdallah74@gmail.com', '$2y$10$VfR3SS4MBcRKsy4yvSA7weehkAxsZHBCScH5sYdDbGIcefjn9IpL.', NULL, NULL, '98891174', NULL, '2022-12-09 02:51:06', 'loged in', '37.39.130.121', '95.216.37.146', NULL, 'P5C37TwvKZAZs1v3BUJlpGw9hH5GOj0cWAERXhhv', '2022-12-09 01:50:57', '2022-12-09 01:51:06'),
(247, NULL, NULL, NULL, NULL, 'أسماء خالد رفاعي العازمي', 'asma14azmi@gmail.com', '$2y$10$KlmPRy.yK248bAzCi4.0vuGZQlql87nr9sHqWz/IF6cjSHEaA4bBe', NULL, NULL, '55293822', NULL, '2022-12-09 04:32:42', 'loged in', '37.231.1.54', '95.216.37.146', NULL, 'F6uj4HqwcKLovH5hbullanaPjMHnwK5g3k11YCUU', '2022-12-09 03:32:10', '2022-12-09 03:32:42'),
(248, NULL, NULL, NULL, NULL, 'محمد', 'albarawy1@gmail.com', '$2y$10$ogLnfwH8f1mrtOZSoq0XYOyNikE30sBZUz/dq1aU/GttEaRCpDc4u', NULL, NULL, '50491414', NULL, '2022-12-09 05:39:24', 'loged in', '188.70.42.142', '95.216.37.146', NULL, 'GPRd1Cqjqq32EwY7sbk6OhnmbSVc6lTq6vkdoQus', '2022-12-09 04:39:08', '2022-12-09 04:39:24'),
(249, NULL, NULL, NULL, NULL, 'عزيزه عايد الحاج علي', 'azizaalhajali59@gmail.com', '$2y$10$AyjNxnKsGK72emCfh46alOau9JoY7QmFK7Zg40ykM753ymctG11P2', NULL, NULL, '51420757', NULL, '2022-12-09 06:08:02', 'loged in', '188.71.195.212', '95.216.37.146', NULL, 'C45fglgJF8MxHcEr0gWny98Rbf1a3KpGsFoKWbjv', '2022-12-09 05:07:48', '2022-12-09 05:08:02'),
(250, NULL, NULL, NULL, NULL, 'احمد طه حمزة جلال', 'medo1718taha@gmail.com', '$2y$10$w6fxARCNRPOc2WDSKXDMwObzJ/hp4vdSNrgjR61YfzEYFmes6UNTS', NULL, NULL, '60031197', NULL, '2022-12-09 06:41:31', 'loged in', '94.128.154.32', NULL, NULL, NULL, '2022-12-09 05:41:31', '2022-12-09 05:41:31'),
(251, NULL, NULL, NULL, NULL, 'روان محمد علي احمد', 'rawanamer547@gmail.com', '$2y$10$HLQ41vqvrdlzKOQSx9PVS.V8tQq4aW85II23sb90YR6jL4S8MQvYq', NULL, NULL, '96794962', NULL, '2022-12-09 07:05:38', 'loged in', '94.128.206.147', '95.216.37.146', NULL, 'x5y1BGVj7nj39x2p1WtoC6BjMzKQHgLtzfZ0h2Iz', '2022-12-09 06:04:12', '2022-12-09 06:05:38'),
(252, NULL, NULL, NULL, NULL, 'Nada Salah', 'nadasalah1082004@gmail.com', '$2y$10$KJdoaOi0e9BRvY7A/Y/vfeRlvfL8qILNfk8jWOiaRpx1473d/wrhq', NULL, NULL, '097605332', NULL, '2022-12-09 07:24:50', 'loged in', '37.37.0.224', '95.216.37.146', NULL, 'aVLpRRhgzSJJh7p7k4KN7PflQiELzXAP5F52PWKm', '2022-12-09 06:23:41', '2022-12-09 06:24:50');
INSERT INTO `users` (`id`, `provider`, `provider_id`, `path_id`, `course_id`, `name`, `email`, `password`, `city`, `country`, `phone`, `brith_date`, `last_login`, `last_action`, `last_ip`, `last_server_ip`, `remember_token`, `last_session_id`, `created_at`, `updated_at`) VALUES
(253, NULL, NULL, NULL, NULL, 'فرح الرشيدي', 'farahalrashidi016@gmail.com', '$2y$10$1YsIqoghYjIGM0YFnGDCXO1bY1yEKaY/La/LrZpk1TkOgxOcZME76', NULL, NULL, '98981336', NULL, '2022-12-09 07:34:18', 'loged in', '188.71.192.26', NULL, NULL, NULL, '2022-12-09 06:34:18', '2022-12-09 06:34:18'),
(254, NULL, NULL, NULL, NULL, 'شيماء منصور العجمي', 'sh.rr6@gmail.com', '$2y$10$sBvSXxEUHA5JSX5l7r3ZaOqKBi5huInzlTN5yh0fK5d1R8qgrrhIe', NULL, NULL, '5542771', NULL, '2022-12-09 07:45:24', 'loged in', '37.231.125.132', NULL, NULL, NULL, '2022-12-09 06:45:24', '2022-12-09 06:45:24'),
(255, NULL, NULL, NULL, NULL, 'ملاك رائد', '7moooodq88@gmail.com', '$2y$10$Ny387o7CU6TOfS1WpUsFpOJ94qSlnAqziGZfpXU7QgyX6UsJAwiK.', NULL, NULL, '94049193', NULL, '2022-12-09 07:46:12', 'loged in', '188.70.62.69', '95.216.37.146', NULL, 'eQBr1Xi0Ubzpnof7EttKiY15vmfgsLzQBYxYTkeB', '2022-12-09 06:45:30', '2022-12-09 06:46:12'),
(256, NULL, NULL, NULL, NULL, 'شيماء منصور', 'apooze.123@gmail.com', '$2y$10$lalVihaObntSac4bxZTGQujQJejhwKGVtMt8kJf3BaHZO6KBGmfka', NULL, NULL, '98576220', NULL, '2022-12-09 07:47:36', 'loged in', '37.231.125.132', NULL, NULL, NULL, '2022-12-09 06:47:36', '2022-12-09 06:47:36'),
(257, NULL, NULL, NULL, NULL, 'رائد كزكز', 'raed.kazkaz@outlook.com', '$2y$10$lisHBS9e/nVdjqmbHwSx0uj2aIYpREudL9GiRmyo5VuZlloSnmRmS', NULL, NULL, '66842716', NULL, '2022-12-09 08:24:27', 'loged in', '188.71.230.233', '95.216.37.146', NULL, 'y3tkCiYWuUso7ooFqY56FMJkeXQy7PXKfGOyoZnJ', '2022-12-09 07:23:56', '2022-12-09 07:24:27'),
(258, NULL, NULL, NULL, NULL, 'فاطمة', 'Fatmaaldeghbasi@iColud.com', '$2y$10$VJakFwTUgifuon9OGka9VuysoWnCS2iECeLockVloUZ3lkJLCazZ2', NULL, NULL, '69920900', NULL, '2022-12-09 08:24:32', 'loged in', '37.39.165.204', NULL, NULL, NULL, '2022-12-09 07:24:32', '2022-12-09 07:24:32'),
(259, NULL, NULL, NULL, NULL, 'عبدالرحمن حماده مصطفي', 'alhmhmadh@gmil.com', '$2y$10$.6w0vPHlqwl94G0orzU11.XgL6ZPQjEJk.lddQeVi9iogPTjB0M9u', NULL, NULL, '60012944', NULL, '2022-12-09 09:58:40', 'loged in', '37.231.16.167', NULL, NULL, NULL, '2022-12-09 08:58:40', '2022-12-09 08:58:40'),
(260, NULL, NULL, NULL, NULL, 'آيه محمود احمد احمد', 'monmon1531987@gmail.com', '$2y$10$HKgbIC1GZfTJTMLsZnjYDOJp7QBlYBfwAjP.ibo.nh8GAuPcL7svG', NULL, NULL, '99062835', NULL, '2022-12-09 10:14:39', 'loged in', '188.236.17.252', '95.216.37.146', NULL, '3a4Z1Htl5F7HQotSODDnbXjOZQqBkuidOEpajHY0', '2022-12-09 09:14:28', '2022-12-09 09:14:39'),
(261, NULL, NULL, NULL, NULL, 'بدران باسم بدران', 'badranbasem25@gmail.com', '$2y$10$MuaVwg3sEFG3KqtzOJoeP./DVDSvkPv4NUY4Hwas6t4.YvZ/c/9IC', NULL, NULL, '65671446', NULL, '2022-12-09 20:39:43', 'loged in', '188.71.252.131', '95.216.37.146', NULL, 'SRuOMZjyiz1VwMaXA0d53i0WbxIhyRDJOniXXSvi', '2022-12-09 11:50:00', '2022-12-09 19:39:43'),
(262, NULL, NULL, NULL, NULL, 'انس السيد السيد عبدالرازق', 'anasshassan986@gmail.com', '$2y$10$tsKPp/L8imXR10PslvFGRenqyplRpdr.qY0I5jgdBumZoGhAhdTVu', NULL, NULL, '69913435', NULL, '2022-12-09 12:50:18', 'loged in', '94.128.211.198', '95.216.37.146', NULL, '1N6i64num6ObE6kE5HC4Px9niA2gwo2liuHbeRL0', '2022-12-09 11:50:09', '2022-12-09 11:50:18'),
(263, NULL, NULL, NULL, NULL, 'رفعت حسام الدين رفعت', 'refaathk@gmail.com', '$2y$10$eBbYDtEB5S6YJfD4wSmN5u6ilYa5l1kEjUCutgwCTr3VXK.g/ZYeW', NULL, NULL, '94092696', NULL, '2022-12-09 13:04:37', 'loged in', '94.129.204.149', '95.216.37.146', NULL, 'OTIx1h3UxDhOR4czGfGVvUVck5rVBPZtEpnI7Q6o', '2022-12-09 12:04:29', '2022-12-09 12:04:37'),
(264, NULL, NULL, NULL, NULL, 'عمر وليد عادل سلمان', 'joryrose3000@gmail.com', '$2y$10$ZmgSB7MIvTmvL35Tl1dDHOZo10XYA7P1o39UOR4HD.tn7cw9PCr1G', NULL, NULL, '99302780', NULL, '2022-12-09 13:57:49', 'loged in', '188.70.21.26', NULL, NULL, NULL, '2022-12-09 12:57:49', '2022-12-09 12:57:49'),
(265, NULL, NULL, NULL, NULL, 'لولوه عبدالله فياض السوادي', 'lolo.0130@hotmail.com', '$2y$10$QmenPJFSN6RBB3W.6DjqKO09lh1LFeXD3jpCdZA/aF19h2VUTKTYW', NULL, NULL, '94495951', NULL, '2022-12-09 14:00:18', 'loged in', '37.231.88.192', '95.216.37.146', NULL, '58Y9HQSgyJztBued951zThHdfDRcMA4LWogQD2Qr', '2022-12-09 13:00:11', '2022-12-09 13:00:18'),
(266, NULL, NULL, NULL, NULL, 'انتصار', 'entesarayed@gmail.com', '$2y$10$Pd0q6HAyIZfpGRM9IKdWvO0OovfXEpI/b2Iv2k5JUGNspSQ3/jy.q', NULL, NULL, '66988096', NULL, '2022-12-09 14:05:47', 'loged in', '188.70.24.171', '95.216.37.146', NULL, 'zDd27w9CAF8muWNDf113sVP5sxvuCqF9q3FVb0W4', '2022-12-09 13:05:29', '2022-12-09 13:05:47'),
(267, NULL, NULL, NULL, NULL, 'رزان', 'rznsarkhoo@gmail.com', '$2y$10$9/B4HcKKdbpxhSSy.pgodO0BoQPy5ub4hHVKzqmiGC2l..cF6s1xS', NULL, NULL, '99386675', NULL, '2022-12-09 14:06:11', 'loged in', '37.231.137.40', '95.216.37.146', NULL, 'yZPnjtO6aeBJU8eD4CNVjDTioGLyMGzhUkqE0f6x', '2022-12-09 13:06:03', '2022-12-09 13:06:12'),
(268, NULL, NULL, NULL, NULL, 'Sham Shamnama', 'itsmeitssha@gmail.com', '$2y$10$3ZKm1h6lL.P8T6RhTMG1vujUyryXXFLEAMpuz8hgnvXrWlHEcSYQ2', NULL, NULL, '96566559745', NULL, '2022-12-09 14:14:00', 'loged in', '94.129.210.47', '95.216.37.146', NULL, '34OGUgxF4ouj83fgSA7RZmp7ILd2ZHdvxwZk2ej1', '2022-12-09 13:12:48', '2022-12-09 13:14:00'),
(269, NULL, NULL, NULL, NULL, 'عبدالوهاب فهد مسير نهار لبدي الظفيري', 'salahalnjdi77@gmali.com', '$2y$10$wmbKesC2.RKgZcsuPHovb.G3dDMTez8lXyA4OIXiOHp/GPrn5uerG', NULL, NULL, '50769387', NULL, '2022-12-09 14:13:48', 'loged in', '37.231.70.100', NULL, NULL, NULL, '2022-12-09 13:13:48', '2022-12-09 13:13:48'),
(270, NULL, NULL, NULL, NULL, 'تاله اسامه الاخرس', 'tala.alakhras2007@hotmail.com', '$2y$10$nYdxnc8khRGTxIAm3Gmy6.L5broX1X053q3V3qq6VDk76wPhseXv6', NULL, NULL, '98943296', NULL, '2022-12-09 14:18:25', 'loged in', '188.70.56.53', '95.216.37.146', NULL, '15GPZzFwnPmr0cinL8xd7WdKZYb3JH2ALsbhbylo', '2022-12-09 13:18:15', '2022-12-09 13:18:25'),
(271, NULL, NULL, NULL, NULL, 'Shaimaa', 'ewwrrrew@gmail.com', '$2y$10$JbkpWj4noH21TySJcYR46uP.xhiuXNcun57/y1MkVoM/CwAkQcjIa', NULL, NULL, '65071730', NULL, '2022-12-09 14:21:31', 'loged in', '94.128.233.197', '95.216.37.146', NULL, '7MmVR4gAxDoOjIBjskrUaOs8ykhfg2fQaTfflIqG', '2022-12-09 13:21:02', '2022-12-09 13:21:31'),
(272, NULL, NULL, NULL, NULL, 'بشاير الحاجي', 'bbt238399@icloud.com', '$2y$10$oqImVcnlui2fQhn4.73LV.8PARlQk8RX4DMDR6QD6/gslNuq54Vfu', NULL, NULL, '97358151', NULL, '2022-12-09 14:28:15', 'loged in', '37.231.216.97', NULL, NULL, NULL, '2022-12-09 13:28:15', '2022-12-09 13:28:15'),
(273, NULL, NULL, NULL, NULL, 'حنين محمد عبداللطيف الرفاعي', 'sasa1010sa@icloud.com', '$2y$10$XH4edmwMB0CaVhQPJC.eKu5UcgAxPmtCmk4oDmWuyCJEiKB3kz.12', NULL, NULL, '50809608', NULL, '2022-12-09 14:34:33', 'loged in', '94.128.205.205', '95.216.37.146', NULL, 'NQWGzSWNxOG9QxO8VXyuPFsTcPLG7XYu2ltHT4u3', '2022-12-09 13:34:21', '2022-12-09 13:34:33'),
(274, NULL, NULL, NULL, NULL, 'عيسى مبارك علي', 'eissaali352@gmail.com', '$2y$10$uvU5HLS/IGn6PRzjJ1X00uDmXo5UyGKOAqo4T6ec/xELxT9kDuEdG', NULL, NULL, '65845252', NULL, '2022-12-09 14:36:37', 'loged in', '188.71.240.137', '95.216.37.146', NULL, 'sqDBMfaQ0Y58Hwz5JztfnLEQ5ofLUc7QyW0uJXYT', '2022-12-09 13:36:02', '2022-12-09 13:36:37'),
(275, NULL, NULL, NULL, NULL, 'Mohamed yaser', 'zzooii2007@gmail.com', '$2y$10$CZ.9l2l7MAyuvcF0b5ZBx.K2NHAmULVyqwXGpyueeRigFaOlrl69.', NULL, NULL, '60767275', NULL, '2022-12-11 18:00:01', 'loged in', '188.70.32.145', '95.216.37.146', NULL, '7IQ7dA9GoqaOm6LkJtE0E2O9wqLYCXfjEwmjasIJ', '2022-12-09 13:37:32', '2022-12-11 17:00:01'),
(276, NULL, NULL, NULL, NULL, 'Faatoom Kalefh', 'faatoom981120@gmail.com', '$2y$10$HAz1OwkE33XqX/.P7WVPn.XFg4kUogbB64DoF81sn52B9BsroFz6.', NULL, NULL, '50307718', NULL, '2022-12-09 14:41:52', 'loged in', '94.129.6.152', '95.216.37.146', NULL, 'WlQJBTGE4TL0uOdPVw4gynZArpDOYeyRZOUrcJDl', '2022-12-09 13:41:35', '2022-12-09 13:41:52'),
(277, NULL, NULL, NULL, NULL, 'احمدسعيدفاروق عبدالرازق', 'Said197780@gmail.com', '$2y$10$IvTkVQJI4BJlp7I5wuXoQe9C1jZps8qENip2vMRu/zJ6NICvPmma6', NULL, NULL, '90060347', NULL, '2022-12-09 14:52:55', 'loged in', '188.236.172.9', '95.216.37.146', NULL, 'QnhrwrNtP7eeWtKUb8nB6gcGdIgwRKPQ8H9DQeEc', '2022-12-09 13:52:19', '2022-12-09 13:52:55'),
(278, NULL, NULL, NULL, NULL, 'Omar', 'badawixz@gmail.com', '$2y$10$mbs/77xVEmLxpSGMmIfKC.sA4Ve22f9w/r.d2Tdi1sqktJBnzG8ay', NULL, NULL, '97849490', NULL, '2022-12-09 15:42:32', 'loged in', '37.39.168.0', '95.216.37.146', NULL, 'se6AiYKMn5HLsoZ2ukUw58AMSKl2tkIS0t6xMx6R', '2022-12-09 14:41:44', '2022-12-09 14:42:32'),
(279, NULL, NULL, NULL, NULL, 'Omar badwi', 'omargamer297@gmail.com', '$2y$10$2c42ejeljf8vkcAZhxDUS.8mEnrHnWdWbOCm4Tj7M9fkUDEX2zKVG', NULL, NULL, '6971772', NULL, '2022-12-09 15:50:02', 'loged in', '188.70.48.87', '95.216.37.146', NULL, 'XdTlOSBDwpx3KlBitq5JhpNTMKCZzuSHVagCLhNj', '2022-12-09 14:49:36', '2022-12-09 14:50:02'),
(280, NULL, NULL, NULL, NULL, 'Sameeha Ali Mohammed Alarar', 'sosoarar444@gmail.com', '$2y$10$L95UhxnHToCjZ7wKLuPBXeIKGRfXmVP1VglwwFV55piT4DGxv04TK', NULL, NULL, '67749891', NULL, '2022-12-09 16:09:50', 'loged in', '188.71.196.195', '95.216.37.146', NULL, 'UeGUgeZhZGxiDiilQWFtVI2rP4l6JQxJw1cmmd8D', '2022-12-09 15:09:18', '2022-12-09 15:09:50'),
(281, NULL, NULL, NULL, NULL, 'مريم محمد غسان', 'gsan970@gmail.com', '$2y$10$anPeCWPY49htqAFPfdwlheZGG9jNW/fTv9cVCTyNpLQJtp5QkFQDe', NULL, NULL, '98509667', NULL, '2022-12-09 16:21:37', 'loged in', '37.39.163.46', NULL, NULL, NULL, '2022-12-09 15:21:37', '2022-12-09 15:21:37'),
(282, NULL, NULL, NULL, NULL, 'اسلام محمد عدنان', 'eslam2047@icloud.com', '$2y$10$OEF1lQba/ke9LzznQh4.auwbXecu6.sQlfjoceuMF9VOQDKaBklti', NULL, NULL, '66580159', NULL, '2022-12-09 16:32:16', 'loged in', '94.128.159.138', NULL, NULL, NULL, '2022-12-09 15:32:16', '2022-12-09 15:32:16'),
(283, NULL, NULL, NULL, NULL, 'سميحه هيثم عبدالخبير سيد', 'abdalrhmnhitham@gmail.com', '$2y$10$un7wmAL6cTHKiJYRrOYLUuezv0Zygn9iwrQVkld4hZFwWQXepnNh6', NULL, NULL, '66358227', NULL, '2022-12-09 16:47:05', 'loged in', '37.231.253.94', '95.216.37.146', NULL, 'AffzexGLWx53lmz9gVvt70SdEvkqmqbadY93mKDl', '2022-12-09 15:46:50', '2022-12-09 15:47:05'),
(284, NULL, NULL, NULL, NULL, 'Ahmed Khaled', 'AhmedKhaledkw1@gmail.com', '$2y$10$OVgWOFt3P29lx4iRXs3fx.dE3p8aj9PALpa9h1WvBCm.khIAzC7wO', NULL, NULL, '96900695', NULL, '2022-12-09 17:26:25', 'loged in', '188.236.128.42', NULL, NULL, NULL, '2022-12-09 16:26:25', '2022-12-09 16:26:25'),
(285, NULL, NULL, NULL, NULL, 'روان بندر هادي العنزي', 'j_m_alzain@hotmail.com', '$2y$10$awwQZG3IaQMRhSAdO1PNfeNcrcTSniGlyefDfhvbEH9rO1VXgV6DS', NULL, NULL, '55689840', NULL, '2022-12-09 17:41:28', 'loged in', '94.128.182.65', '95.216.37.146', NULL, 'cBWV72zkaQu8Q5vXEVsgmc5arRGKJMk5VBzc7cpt', '2022-12-09 16:41:08', '2022-12-09 16:41:28'),
(286, NULL, NULL, NULL, NULL, 'Ousama Aljohmani', 'ousamalgohmani@gmail.com', '$2y$10$H9EGGRd90Uw22jlPeIx/2u7f3mUkBeEkYoN3vEJbAqpaH7o/O3vEu', NULL, NULL, '51574770', NULL, '2022-12-09 17:48:51', 'loged in', '37.231.220.94', '95.216.37.146', NULL, 'UtsE7DAzsPyl845EsgrnckRob2IhjKGBX97VeY06', '2022-12-09 16:48:46', '2022-12-09 16:48:51'),
(287, NULL, NULL, NULL, NULL, 'Basmala', 'moo2_moo233@yahoo.com', '$2y$10$zh3yhz6k7BBSwY47yBrYLuOihPi1U/fBUS3ApxYhdK59vSjwuDlUW', NULL, NULL, '65750035', NULL, '2022-12-09 18:09:43', 'loged in', '188.70.27.48', '95.216.37.146', NULL, 'LSEJkxwXm3RBB5QYz1WzXa8uB98d7k1KaGYEDVmd', '2022-12-09 17:09:34', '2022-12-09 17:09:43'),
(288, NULL, NULL, NULL, NULL, 'عبدالله علاء خلف', 'abdullahalaa237@gmail.com', '$2y$10$Bjxhp1Qt/XK52Mb.pgwyQunJjw20bvu.i/Ngzy2cKEIknl09hVTMC', NULL, NULL, '60090174', NULL, '2022-12-10 19:12:22', 'loged in', '188.71.228.114', '95.216.37.146', NULL, 'zgUL1fVtGRXvOaNRAWRCu4y2xImtnUXCtDv9MBYn', '2022-12-09 17:34:37', '2022-12-10 18:12:22'),
(289, NULL, NULL, NULL, NULL, 'ملك مصطفى السيد عبد الغني', 'malakmoustafa301@gmail.com', '$2y$10$AUgWqA8hmB.3tXxRpVOra.tEJVgBt3CnKP4xJEw7Dz1gc57mM5.pO', NULL, NULL, '51523180', NULL, '2022-12-09 20:29:22', 'loged in', '37.39.145.114', '95.216.37.146', NULL, 'DU34xcIp49tt6yFtZl4DnETl35NJmmuf83WigHKL', '2022-12-09 17:50:21', '2022-12-09 19:29:22'),
(290, NULL, NULL, NULL, NULL, 'مصطفى عبد صالح', 'mostafakatmer6651@gmail.com', '$2y$10$XNQcGHL.JbxYxdoDqaxCvu6p/Bz7/zWayfhxA7gOQDTQdEJ0zOerO', NULL, NULL, '60328840', NULL, '2022-12-09 18:56:49', 'loged in', '37.231.118.21', '95.216.37.146', NULL, 'e5fOunaszftfjfZQUK6hqmPbz2jNzHiRYoDNVlmk', '2022-12-09 17:56:40', '2022-12-09 17:56:49'),
(291, NULL, NULL, NULL, NULL, 'فرح جمال مصطفى', 'farahgaber212@gmail.com', '$2y$10$dzDsKldJ.HXGeCL7dirLvOmBP76YXBz1roef6FWD5TElYMQcU8j9m', NULL, NULL, '98841961', NULL, '2022-12-09 19:02:56', 'loged in', '37.37.169.123', '95.216.37.146', NULL, 'z3srfxbWzzRv9qUzYM0IafSQky53anGtJKyIbTAn', '2022-12-09 18:02:29', '2022-12-09 18:02:56'),
(292, NULL, NULL, NULL, NULL, 'سارة حسن إبراهيم جبر', 'sarajabr777@gmail.com', '$2y$10$7HdHiLgl/6q.2M0mKiudE.hc1heLO1emO8LKjvMhQMD83Movf2wnm', NULL, NULL, '66210896', NULL, '2022-12-09 21:10:01', 'loged in', '37.36.230.174', '95.216.37.146', NULL, '6BHY4CpyLK3whURfmwAGdQy5Rz1RvGXjY6inU3Ld', '2022-12-09 18:03:25', '2022-12-09 20:10:01'),
(293, NULL, NULL, NULL, NULL, 'Ali Alsafani', 'alialsafani11@icloud.com', '$2y$10$u6JYzbyE7iqjXdpuSK/N4u2VkWUF78uGMXs4z.7yVkEYhUF/twsIy', NULL, NULL, '60661103', NULL, '2022-12-09 19:06:39', 'loged in', '37.39.132.185', '95.216.37.146', NULL, 'sUMBbAiyPSeXLYqdA8TFh2SZmEBdu5fjRDXioGs6', '2022-12-09 18:06:08', '2022-12-09 18:06:39'),
(294, NULL, NULL, NULL, NULL, 'جنا عبد العزيز محمد', 'Jana461365@gmail.com', '$2y$10$2ZjO.cV4rIYSlidrOVljbOOKQ4DMqLGAuv4FmLsWHeH5bxjIbfshC', NULL, NULL, '97360608', NULL, '2022-12-09 19:19:49', 'loged in', '37.231.107.153', '95.216.37.146', NULL, 'HRg1t7YnVV2TKM6I3cKjO3oKv8pHUMMj6peGNFIs', '2022-12-09 18:19:26', '2022-12-09 18:19:49'),
(295, NULL, NULL, NULL, NULL, 'عمر احمد عبد الرحيم احمد', 'omarabdurrahim@gmail.com', '$2y$10$7D93zxtux/kaP2JcltCVZ.yCH8DrCeK4RfIXdlYshPJY8lj4w8IvW', NULL, NULL, '66856045', NULL, '2022-12-11 16:30:50', 'loged in', '62.150.15.79', '95.216.37.146', NULL, 'iVloAHl2qBVQbnT2p5HACg1dxbIBZs2VFTw3kcxX', '2022-12-09 19:06:43', '2022-12-11 15:30:50'),
(296, NULL, NULL, NULL, NULL, 'فاطمة البتول محمد', 'mnmch1@yahoo.com', '$2y$10$4Nmv6BjvAJb8uEhop/2QX.cVT2FhO9sui9b030bGFUq9hkyfQN5Si', NULL, NULL, '50885040', NULL, '2022-12-09 20:10:09', 'loged in', '37.231.28.178', '95.216.37.146', NULL, 'ZuzgONxQjN5HaupYiCC6ifyUSWX29aBmK2L9BYLa', '2022-12-09 19:09:24', '2022-12-09 19:10:09'),
(297, NULL, NULL, NULL, NULL, 'يحيى عبد الكريم خضر بو عمر', 'nourbouomar18@gmail.com', '$2y$10$eb17VJ8N5O/JOcJT/WFzAeU7J5dq1N/3uRp7OgSYjZR/V0Pn5uMay', NULL, NULL, '96622083', NULL, '2022-12-09 20:20:04', 'loged in', '37.231.157.138', '95.216.37.146', NULL, 'CQJoWPzfuElTcIby2zzkpLwXFpg4RBziqK41rqEw', '2022-12-09 19:19:57', '2022-12-09 19:20:04'),
(298, NULL, NULL, NULL, NULL, 'خليل ابراهيم خليل الشحادات', 'ifatafeati@gmail.com', '$2y$10$EzqfAlD6LFX63wiNG2KBd.9vNnXZGaL.ZHEXxVnJYagnfOoOw3L/O', NULL, NULL, '50640092', NULL, '2022-12-09 20:27:38', 'loged in', '94.129.75.106', '95.216.37.146', NULL, '2KcIW6kBsN1RYej5SPTSfNDTGaMvrJGy2vcJFeUR', '2022-12-09 19:26:30', '2022-12-09 19:27:38'),
(299, NULL, NULL, NULL, NULL, 'محمد الرفاعي شريف', 'mohamedalrefai55@gmail.com', '$2y$10$4GYW1/UeQNABfHvK4UlVD.HD584scLFHzfk5ZnBPUBb.0LL116HCK', NULL, NULL, '66193789', NULL, '2022-12-09 20:28:12', 'loged in', '188.70.26.47', '95.216.37.146', NULL, 'nhY2DXcX8jlmxJVJR84BypCE0ZX65v1vTBGWfW2U', '2022-12-09 19:28:00', '2022-12-09 19:28:12'),
(300, NULL, NULL, NULL, NULL, 'رتاج المنصوري لبيب عبد الغني', 'kwk518254@gmail.com', '$2y$10$5GW4Unw47wHEXfVg1juYq.gFJuEoJcEcOPe.D/39gJyAoYgJypDDW', NULL, NULL, '97598002', NULL, '2022-12-09 20:32:19', 'loged in', '37.39.54.128', NULL, NULL, NULL, '2022-12-09 19:32:19', '2022-12-09 19:32:19'),
(301, NULL, NULL, NULL, NULL, 'yousef hashem mohamed', 'youssefhashemmohamed6@gmail.com', '$2y$10$M2HEJu2vU.e0UlX.HwuCBOCkncbHdnJVGXeMzeB6D6TFGZDC/A9dm', NULL, NULL, '55167338', NULL, '2022-12-09 22:01:26', 'loged in', '94.128.230.37', '95.216.37.146', NULL, 'bFirXsff5DymahUT2zGZ4rj9qZOG6i7N8rn2au3J', '2022-12-09 21:01:01', '2022-12-09 21:01:26'),
(302, NULL, NULL, NULL, NULL, 'روان فوزي فايز', 'fawzi4u4@gmail.com', '$2y$10$Umf7Lq7mY5AVDpYbpFG6/e22NxhVJs1t6dzs0Nr1mWTSI3D9ivvYW', NULL, NULL, '67769985', NULL, '2022-12-10 12:15:49', 'loged in', '37.39.240.23', '95.216.37.146', NULL, 'VXCOEXeUwttvLJ9QbqWJx5rQfJQQz8sax6HrR57t', '2022-12-09 21:17:46', '2022-12-10 11:15:49'),
(303, NULL, NULL, NULL, NULL, 'عبدالرحمن فايز', 'fayzb2288@gmail.com', '$2y$10$qeGPYoxaotO.qFx9KkUwQOZAoSyg1c.LVR/ViPEuZ7SnrbCJYo2g.', NULL, NULL, '51187303', NULL, '2022-12-09 22:27:37', 'loged in', '37.231.158.145', '95.216.37.146', NULL, '7VfL18lYGajxjuzodK4WWolSjN2ichyNhgbx7GWc', '2022-12-09 21:26:34', '2022-12-09 21:27:37'),
(304, NULL, NULL, NULL, NULL, 'مريم عيسى', 'maryoooooomkw@gmail.com', '$2y$10$h0.gD47pkcIO/y6k71pbyu5xONr7raIvQjcD39Y1xpcgBBy8XVNFK', NULL, NULL, '98796443', NULL, '2022-12-09 22:34:50', 'loged in', '94.128.226.85', '95.216.37.146', NULL, 'TWDcVOM36wzsBfDFoyrnJMLQwMYyKc80hy0lQdWU', '2022-12-09 21:34:04', '2022-12-09 21:34:50'),
(305, NULL, NULL, NULL, NULL, 'Aseel alhomuod', 'aseelr272@gmail.com', '$2y$10$YUyNvSw.4EJ6ofWcbuVJWOhlTVqAQLz3e28hK3NhBdE98gpLJUxom', NULL, NULL, '97892356', NULL, '2022-12-09 23:07:33', 'loged in', '188.70.2.164', '95.216.37.146', NULL, 'St4ITuiWDNSualmi9Ew9gLA1OjNGK4Gm35NC5vbh', '2022-12-09 22:07:24', '2022-12-09 22:07:33'),
(306, NULL, NULL, NULL, NULL, 'سلمى السيد', 'sososayed227@gmail.com', '$2y$10$kaVlYlA13m/AdAk6DvBG1umPW.xeAWVlKupIJLJDMGosDFL5kqTAm', NULL, NULL, '96011656', NULL, '2022-12-10 05:54:10', 'loged in', '94.128.208.140', '95.216.37.146', NULL, 'sb3uB7b7JUBXtflHuioFG3SAX1svm5LLRXO26iUy', '2022-12-10 04:53:48', '2022-12-10 04:54:10'),
(307, NULL, NULL, NULL, NULL, 'احمد فواز الخطيب', 'astab4007@gmail.com', '$2y$10$p3bYkfnD3MxYdJMg8PScYuQy0YYw40rQTStrziFaRGNvO6kz12Y.u', NULL, NULL, '96746159', NULL, '2022-12-10 07:48:01', 'loged in', '188.236.96.23', '95.216.37.146', NULL, 'IWLM4DEkoFraTkuSDcfwnobUOgyM8fTfMmlzHuHJ', '2022-12-10 06:47:32', '2022-12-10 06:48:01'),
(308, NULL, NULL, NULL, NULL, 'اسماعيل', 'i.elattar26@gmail.com', '$2y$10$K7UWTVZpoBcy2d6kW7OsW.522YOYGI7wAFoO2B0nTPisyRLUR/4Zq', NULL, NULL, '65745159', NULL, '2022-12-23 10:07:33', 'loged in', '188.71.252.91', '95.216.37.146', NULL, 'wUo9I4rIe4LLIj1npp63pUlmySNNmq9Dn9n3h2G7', '2022-12-10 07:10:32', '2022-12-23 09:07:33'),
(309, NULL, NULL, NULL, NULL, 'فاطمه محمد عبدالزهرة التميمي', 'Fatmaaltmemi@gmail.com', '$2y$10$ToKA.GAjMUrkw7R9IJgejuo5nD5mdwxLR7XW1zeot4tjleCTKwIyG', NULL, NULL, '55877492', NULL, '2022-12-10 09:40:33', 'loged in', '94.128.216.142', '95.216.37.146', NULL, 'I9axiJRoP0KsuJMSuoWhTWNRCGaWZWyS4kq7xaxq', '2022-12-10 08:40:16', '2022-12-10 08:40:33'),
(310, NULL, NULL, NULL, NULL, 'سارة محمود علي سليمان', 'mahmoudsoliman186@gmail.com', '$2y$10$kq0qe8gWKbEG3vMZ3dAEYOTFvejRLtdXbNaEf9oXzpyWA2pJqFLCS', NULL, NULL, '55695695', NULL, '2022-12-10 09:52:57', 'loged out', '31.214.60.73', '95.216.37.146', 'dWVGgxRxs0w5WihwVwBn23IfuRVWFIsn7Fc6Lgr4cSwamvbVYJ1KDLtLNKpt', 'LfXcPpFV3rxIUKpQxM9YFD1dvbAf4OxXdhGzUhrH', '2022-12-10 08:52:47', '2022-12-10 08:56:15'),
(311, NULL, NULL, NULL, NULL, 'إبراهيم رائد فهد السعيدي', 'Kw9987kw@gmail.com', '$2y$10$X9hBVZwA48Ae3b1CPDKoL.iQBXLek2/qCWUT8TtIVyxTewCXK99TG', NULL, NULL, '65537153', NULL, '2022-12-10 19:51:34', 'loged in', '188.70.10.72', '95.216.37.146', NULL, 'GojWDXmIZHfWS83OUusdE7YM99FvPdVAUjwEYxPS', '2022-12-10 09:20:37', '2022-12-10 18:51:34'),
(312, NULL, NULL, NULL, NULL, 'بدر ناصر عبدالله الشمري', 'ElchapoF16@gmail.com', '$2y$10$S7CYuSq2Epr/znMBWFpjKe6z2vwH9/LnFhfDTKWxqWXtrwa0VEofm', NULL, NULL, '50266665', NULL, '2022-12-10 11:52:49', 'loged in', '37.231.220.21', '95.216.37.146', NULL, 'qqYvtGl524MLow9V7ZIreZya7V1yFFrYNtQ2IHTb', '2022-12-10 10:52:32', '2022-12-10 10:52:49'),
(313, NULL, NULL, NULL, NULL, 'Moaz barakat', 'mezomero73@gmail.com', '$2y$10$3q5Ho662aCe7ZkjEliXiRe893GSCsEa4o5/uFlKFUCe/vwg5xIC6G', NULL, NULL, '60750035', NULL, '2022-12-10 12:04:50', 'loged in', '37.39.170.74', '95.216.37.146', NULL, '7iD3AdqOjsOqoIowIsRl2OU9jz1Nq2IL6bobRyYA', '2022-12-10 11:04:36', '2022-12-10 11:04:50'),
(314, NULL, NULL, NULL, NULL, 'شروق طارق', 'shorouqtareq2006@gmail.com', '$2y$10$qhdLPj2Los9iOd2y9NYoTuOh6g4RxPcSy81ggAkZHOHfgOgPwCrKy', NULL, NULL, '66493991', NULL, '2022-12-10 12:39:22', 'loged in', '188.236.194.221', NULL, NULL, NULL, '2022-12-10 11:39:22', '2022-12-10 11:39:22'),
(315, NULL, NULL, NULL, NULL, 'Aya Husini', 'ayoshhusini@gmail.com', '$2y$10$jF81HYXKe2LKAQH3BOCXjOvJO6C4XHZBxBVdrYvSBPcLrpTi.Ql.e', NULL, NULL, '94094754', NULL, '2022-12-10 19:04:38', 'loged in', '37.231.126.44', '95.216.37.146', NULL, '1vFB3UuBbE6P2tlUyZNFndFSTTCp1xNdxgtXXCVu', '2022-12-10 12:53:00', '2022-12-10 18:04:38'),
(316, NULL, NULL, NULL, NULL, 'عبدالرحمن غالب محمد حمد', 'abdulrahmanhamd2007@gmail.com', '$2y$10$rR0NdDnTiC.xtPdZGVUQMOg21kpjmaifi41qVKsO54P2SvuJFuLX.', NULL, NULL, '94438567', NULL, '2022-12-10 15:22:57', 'loged in', '188.70.27.22', '95.216.37.146', '5K75bo9XitXMgRIHeEzyujjAviZlZgBTVR6M9FrX73D9V6gHMblwiWcFRRBW', '6Jl4jV3kAjAmJf7aj2KE6btDaWGa3ExPFiWKrP9H', '2022-12-10 14:19:12', '2022-12-10 14:22:57'),
(317, NULL, NULL, NULL, NULL, 'مريم محمد غسان', 'ghassanmhamaad@gmail.com', '$2y$10$LxKJB.I/fEAigyFQ7xRMBuYAT0.GG0BqZQ58D/4btX8I5w3ygrC5q', NULL, NULL, '60606164', NULL, '2022-12-22 10:39:42', 'loged in', '188.236.158.162', '95.216.37.146', NULL, 'ddL0A7fByF1fPIpMXlWSR2qbYGKszPKfGOHinyHK', '2022-12-10 18:31:19', '2022-12-22 09:39:42'),
(318, NULL, NULL, NULL, NULL, 'ميار كمال', 'emanelbeltagy84@gmail.com', '$2y$10$I1SKs.Cw/U7/3Ko7EBgu3esYVz0OxeHIN0dSkSN/K0yy8MeiMhOVG', NULL, NULL, '67603715', NULL, '2022-12-10 21:02:47', 'loged in', '37.231.238.179', '95.216.37.146', NULL, 'lmCQuLJLG1LvelztqumhBHDDWIMVAfWtrd78ZvBH', '2022-12-10 20:02:19', '2022-12-10 20:02:47'),
(319, NULL, NULL, NULL, NULL, 'سلمي عبدالعزيز شكري', 'awadmarwa986@gmail.com', '$2y$10$XRWsX5PABl4KGPUSZEbvy.ab40Uz6Uum2hQ7.ZJZSeEvlhfTS01QW', NULL, NULL, '66987925', NULL, '2022-12-11 19:32:18', 'loged in', '188.70.34.144', '95.216.37.146', NULL, 'uuWdR7Ve9QoQyq6nf3bCx1MDvdwr2mggjtlM3Y16', '2022-12-10 20:36:04', '2022-12-11 18:32:18'),
(320, NULL, NULL, NULL, NULL, 'سما احمد سامي السيد', 'saelhalawany@gmail.com', '$2y$10$1/gFF5c28JpNNU3rkIaAgOGFdODPNC9z0MIItLcbBhaovFN7n6hte', NULL, NULL, '97798277', NULL, '2022-12-10 22:23:12', 'loged in', '37.39.21.127', '95.216.37.146', NULL, 'XQGbM3pAttNYtH66VxZikXR6dOosRuIxHkQpgI8H', '2022-12-10 21:23:03', '2022-12-10 21:23:12'),
(321, NULL, NULL, NULL, NULL, 'يوسف فيصل ابراهيم الغضفان', 'yf.algadfan@gmial.com', '$2y$10$.xrbYeTtRIhLjDSljWqn2O6Zb5GtAJXl6wf0dZDo.BRrI.gknVpvW', NULL, NULL, '99892300', NULL, '2022-12-11 09:28:11', 'loged in', '94.128.195.62', NULL, NULL, NULL, '2022-12-11 08:28:11', '2022-12-11 08:28:11'),
(322, NULL, NULL, NULL, NULL, 'سعود عبدالله محمد القطيفي', 'saudalqatifi@gmail.com', '$2y$10$Q.InG2CTOU3XXu4JXsaCm.JbR4PKJzdnN/zz1agy5GM.E4aJeus.W', NULL, NULL, '90907234', NULL, '2022-12-18 08:41:00', 'loged out', '37.39.111.228', '95.216.37.146', 'iWVI761R0sZui3zXWcd5ZAbtnaS29YW8LuB2ksavAMbjJCmirdhLRyIxOec6', '1r3NPxY9WFhcJpdMJgL0hUqWJstbPmvNWWctNmLO', '2022-12-11 11:11:56', '2022-12-18 07:41:33'),
(323, NULL, NULL, NULL, NULL, 'رضوان بسام محمود', 'radwanhajali@gmail.com', '$2y$10$3F.Bo5Y6KjgmHkMADunK5e3ef3I3zAV.NUyVQgLmJGchZR..lN2e.', NULL, NULL, '55845152', NULL, '2022-12-13 15:16:08', 'loged in', '37.231.18.28', '95.216.37.146', NULL, 'wOU2rDjg9WmrGumXfoay3DInb3Ere4mHwyhi03RM', '2022-12-11 12:56:15', '2022-12-13 14:16:08'),
(324, NULL, NULL, NULL, NULL, 'Soso', 'yosff92@outlook.com', '$2y$10$L3mKYTANU1ZDn/UwB.uzweTstQIvJqP9RRbNAoq61d.0FiH.FiGJu', NULL, NULL, '99534427', NULL, '2022-12-11 16:28:29', 'loged in', '37.39.184.126', '95.216.37.146', NULL, 'LLyKQhLCYt8P2yPuKkFYfClQHcQQGCI8U2a9E7o9', '2022-12-11 15:28:13', '2022-12-11 15:28:29'),
(325, NULL, NULL, NULL, NULL, 'Tala Fouad', 'TALAFOUAD1@icloud.com', '$2y$10$Mk7c1troGPiFBsH1G/nN6uf5HQCQfApkKk/1GtLDp55vgHB.ITpaS', NULL, NULL, '90938229', NULL, '2022-12-11 18:40:16', 'loged in', '188.70.10.74', '95.216.37.146', NULL, 'oMroW2ahheNew94RuIyHFnqEW6aApXH6ukhH75wd', '2022-12-11 17:39:27', '2022-12-11 17:40:16'),
(326, NULL, NULL, NULL, NULL, 'حصه محمد الخميس', 'hmalkhamees@gmail.com', '$2y$10$XWN5UksyBa2mWmQTvRw6/./v5Beb7t1wCv9SoQjdF/gy/3h7/7DHK', NULL, NULL, '99233656', NULL, '2022-12-11 18:57:18', 'loged in', '37.36.71.251', '95.216.37.146', NULL, '836XRYrIloYlY4WVsLij5g5HRTGrc5rbvYNYOYog', '2022-12-11 17:56:38', '2022-12-11 17:57:18'),
(327, NULL, NULL, NULL, NULL, 'أسامة مساعد الشمري', 'osama.kw2006@gmail.com', '$2y$10$S89O.UUMWlrLXeikLfkD.O.P6UdAhieDr2qfgaFYFJxpmWCk299Bi', NULL, NULL, '98505812', NULL, '2022-12-11 19:06:49', 'loged in', '188.71.232.11', '95.216.37.146', NULL, 'xd7KAE1qYxlQtFWfQwO7grPyjwqKrPsYWfmirdlu', '2022-12-11 18:06:21', '2022-12-11 18:06:49'),
(328, NULL, NULL, NULL, NULL, 'نور إيهاب محمد فهمي', 'nonohoba1108@gmail.com', '$2y$10$/1kNJSZoWf2rKjLmjlsJnOpUrjoPI2q4SQjHFRCgNvDWtCyJPJnpO', NULL, NULL, '96555041505', NULL, '2022-12-11 19:25:37', 'loged in', '188.236.121.153', '95.216.37.146', NULL, 'BFkSpsSQCC0tDAMHFxkQZmXHQkZfzwVbzTF0PU0h', '2022-12-11 18:25:18', '2022-12-11 18:25:37'),
(329, NULL, NULL, NULL, NULL, 'محمد أحمد مفتاح عبدالرحيم', 'ggdgggdgfdfiu1010@gmail.com', '$2y$10$4/bJ6BbjQAoj7yIhsIzzIO3yizRxdnLDOD68XRsvOnkFg4FA36Sh.', NULL, NULL, '56600451', NULL, '2022-12-12 05:18:37', 'loged in', '188.71.202.138', '95.216.37.146', NULL, 'RykkHwrLrcC4KQydPGOehIcjFsZhPV9GmM3OfSlE', '2022-12-12 04:16:38', '2022-12-12 04:18:37'),
(330, NULL, NULL, NULL, NULL, 'عبداللطيف وليد السليم', 'w.alsaleem@gmail.com', '$2y$10$aVVPX3bTINMUBekpt.n4o..DQbdxuDfPmKdv/27RVaJbdLrrkY3Mu', NULL, NULL, '99064880', NULL, '2022-12-12 07:45:04', 'loged in', '37.39.254.18', '95.216.37.146', NULL, 'qB4MjdAdapyigVfSdEvR5ps4Q9lHwDuTArptIgaK', '2022-12-12 06:44:52', '2022-12-12 06:45:04'),
(331, NULL, NULL, NULL, NULL, 'على محمودد كامل', 'abualiomr@gmail.com', '$2y$10$aph1ay7HAOjGKnX.EweDA.B73/vpvHZ90Q6d5jpweTdWgsmmrgITO', NULL, NULL, '97301901', NULL, '2022-12-12 09:41:45', 'loged out', '156.209.67.104', '95.216.37.146', 'SwDr1SPwqSInD7fOikBfJDyoVrvcWHzobFV7LpKFGAdPap2yEAi03onXbQrC', 'gFMEGNuljLTptrBj8wVKFdu0WGhcXFX1xouJROzY', '2022-12-12 08:36:27', '2022-12-12 08:45:29'),
(332, NULL, NULL, NULL, NULL, 'فاطمة راكان عوض منصور', 'fattemh.r.07.1988@gmail.com', '$2y$10$3sUr/ZshyYf2.5209SmvQu0pedWgOIGdwnNvhHB7amvSp/TIchqqy', NULL, NULL, '55502654', NULL, '2022-12-12 10:27:27', 'loged in', '37.231.202.95', '95.216.37.146', NULL, 'am6sSVN51spDvuYsPBfNqrMs9uF2E0wVPjaERu2m', '2022-12-12 09:27:08', '2022-12-12 09:27:27'),
(333, NULL, NULL, NULL, NULL, 'ahmed adawe adawe adawe', 'aaa15107@gmail.com', '$2y$10$T5ovcMW.U7PfT6sBfgH1j.rPY3raAh/H1yUcrtK9Dsqc00d3.QsUG', NULL, NULL, '01022361239', NULL, '2022-12-22 10:51:24', 'loged out', '196.221.167.47', '95.216.37.146', 'UBDjddSNgA0ToHtcPGLtFUApj0fJTV4wwBRL1fKpVTXEIqJPGe9ncikkhaz7', 'tuUS2A4oeMcRL07vBiaYCInf10qNFlXrG4k3scDq', '2022-12-22 09:51:02', '2022-12-22 09:51:40'),
(334, NULL, NULL, NULL, NULL, 'Alaa Q8', 'kuw6364@gmail.com', '$2y$10$JZ1arxUfB0F6Nbjilh9Zm.8EuctkQ4qqM3PZ4HeXbESjDprvKIXgm', NULL, NULL, '99258419', NULL, '2022-12-22 13:58:12', 'loged in', '37.231.124.115', '95.216.37.146', NULL, 'mYSY2EVcj8fLYFV9HPg7DezD0mvRvJdpB4h3s76g', '2022-12-22 12:57:48', '2022-12-22 12:58:12'),
(335, NULL, NULL, NULL, NULL, 'فرح احمد سيد أحمد', 'farahahmd579@gmail.com', '$2y$10$mjo4BZTMltH2D7a2OzMJp.LvtDjh1B/41Y.1PwRD3OENatAZda9ei', NULL, NULL, '66189551', NULL, '2022-12-22 14:06:43', 'loged in', '188.70.29.99', '95.216.37.146', NULL, 'uK5D3VTV2FHcKWByV4BYnTyZqwIQ5vdxx7gcRqSI', '2022-12-22 13:06:29', '2022-12-22 13:06:43'),
(336, NULL, NULL, NULL, NULL, 'اليسار سعيد عبدو', 'alisarzakzak@gmail.com', '$2y$10$8W4o45x8IKDLILtL7K84QuLFWdbRl1MV3BTUVwOQeqpkhazm8yQ9G', NULL, NULL, '51086393', NULL, '2022-12-22 14:21:24', 'loged in', '94.129.84.210', '95.216.37.146', NULL, 'Md9smiHBqA0MLJs1npvV9R7Qg7sa4LCi6RaqLt4N', '2022-12-22 13:18:31', '2022-12-22 13:21:24'),
(337, NULL, NULL, NULL, NULL, 'Hana Madian elhosiny', 'shams.shosho27@gmail.com', '$2y$10$cbN0gcJIR/1uHoGQKntbWOCJFECqyUM0FVmQZiWfhvDxYLLzpN0Ba', NULL, NULL, '96639904', NULL, '2022-12-22 14:33:13', 'loged in', '188.236.128.24', '95.216.37.146', NULL, 'P5nj8lTIC7aXt8DPzbsISy0FjlGYkP9qgiYLECNN', '2022-12-22 13:32:37', '2022-12-22 13:33:13'),
(338, NULL, NULL, NULL, NULL, 'ريناد فلاح عيد العازمي', 'renadalazme151@gmail.com', '$2y$10$MqKtK0ODnwW96VglhzGqsuBMkx5AM6x928a3m3wQgD4EvObwyJEeW', NULL, NULL, '97732494', NULL, '2022-12-22 15:08:44', 'loged in', '37.39.133.204', NULL, NULL, NULL, '2022-12-22 14:08:44', '2022-12-22 14:08:44'),
(339, NULL, NULL, NULL, NULL, 'سارا الديحاني', 'Sar2004a@icloud.com', '$2y$10$Q41Sj.2DaCrJyAuSMFGOcuoGcmAdc4UFSk93R9U.mm115Tw1WCU5.', NULL, NULL, '97456073', NULL, '2022-12-22 15:21:58', 'loged in', '37.39.62.131', '95.216.37.146', NULL, 'd7OGg6xGxRWcwxf0nbfMaB9uZYVC3JXH8zpCX4o5', '2022-12-22 14:21:23', '2022-12-22 14:21:58'),
(340, NULL, NULL, NULL, NULL, 'مريم بدر محمود رمضان', 'maryamafefe652@gmail.com', '$2y$10$CglJNxxtRPudUUuXAXIeNuXyLIWDsGNmGmtu/DvE0AlxhVGGkXfNK', NULL, NULL, '67088036', NULL, '2022-12-22 15:40:25', 'loged in', '188.71.252.63', '95.216.37.146', NULL, 'Bzyt96U3TAXx3sL0AhOdN1EGOckULXZyoa5bhagy', '2022-12-22 14:40:11', '2022-12-22 14:40:25'),
(341, NULL, NULL, NULL, NULL, 'دلال مشعل', 'dalal.id77@uotlook.com', '$2y$10$2orO/tkg0.kAfdB7WTHA3uSLIhwZwZhamhZCIBLJ3MFPwdK.dmb.G', NULL, NULL, '69644077', NULL, '2022-12-22 15:42:45', 'loged in', '188.71.231.167', '95.216.37.146', NULL, 'kY0AD0ftsBB7FT9tdE4Wi9Tde0DUmhoY41zVnU8q', '2022-12-22 14:42:30', '2022-12-22 14:42:45'),
(342, NULL, NULL, NULL, NULL, 'فاطمه انور', 'fatima.binamer@gmail.com', '$2y$10$r/9VtgRUYU5ssMk3RKwLwuTdJd7PgZuGaTk.VoEVLGA0VRlvcyCgi', NULL, NULL, '96948725', NULL, '2022-12-25 10:19:15', 'loged in', '37.38.197.236', '95.216.37.146', NULL, '8HlEqZcDgRY1TtlMdPKWqSk96NblrX10fOXruzA9', '2022-12-22 16:41:50', '2022-12-25 09:19:15'),
(343, NULL, NULL, NULL, NULL, 'رتاج', 'Retajq10s@gmail.com', '$2y$10$YOlpNrAxr7DC3yqA33yl9Om.4QsB0p6TVxN6XiaIU7Pq3AXTzPZNW', NULL, NULL, '50918272', NULL, '2022-12-22 19:23:05', 'loged in', '37.231.160.44', '95.216.37.146', NULL, 'yOTpGUI0OKAn2z2wkoubP7zdO2GDJpokP5bXLe42', '2022-12-22 18:22:11', '2022-12-22 18:23:05'),
(344, NULL, NULL, NULL, NULL, 'Badiaa Nabil', 'badiaaaassar1i@gmail.com', '$2y$10$DJD.MSluuI9VG5Wg13Hhre.TgJoXzkYDaVF4kHJBXswrCS0HbxhmK', NULL, NULL, '99532110', NULL, '2022-12-22 19:31:24', 'loged in', '94.128.163.54', NULL, NULL, NULL, '2022-12-22 18:31:24', '2022-12-22 18:31:24'),
(345, NULL, NULL, NULL, NULL, 'منه سامي ابراهيم محمد', 'Mennasami28@gamil.com', '$2y$10$nHCpWlzszJp3YJxMd9HEQujunZyBj//J5apszsIgfSEKw4Ad5MRkO', NULL, NULL, '66320314', NULL, '2022-12-22 19:33:15', 'loged in', '94.129.169.170', NULL, NULL, NULL, '2022-12-22 18:33:15', '2022-12-22 18:33:15'),
(346, NULL, NULL, NULL, NULL, 'محمد صالح محمد العتيبي', 'mohsalehalotaibi@hotmail.com', '$2y$10$y84V7cuZcwyEq66WIQ9acu/mtaJFMbZX/L1QZefolPo4rDwTDGCWi', NULL, NULL, '5114094', NULL, '2022-12-26 19:28:55', 'loged in', '37.231.210.179', '95.216.37.146', NULL, '9EplhlLo68QNz5nG0Kf1yusKTxm26lwZ1QGaMTPB', '2022-12-22 18:33:34', '2022-12-26 18:28:55'),
(347, NULL, NULL, NULL, NULL, 'مريم صادق محسني', 'mari_aou@yahoo.com', '$2y$10$cb86JqwwvxPnIdULK3qnwOYjYSHznCWAuHdhx3RxDdKmNSyAuHcz6', NULL, NULL, '94469777', NULL, '2022-12-22 20:13:48', 'loged in', '37.39.204.47', '95.216.37.146', NULL, '15nMA4MPlxxlT4AtH4wogS1GwRtOntzkSXM3J8lM', '2022-12-22 19:13:43', '2022-12-22 19:13:48'),
(348, NULL, NULL, NULL, NULL, 'رهف العنزي', 'rahafalanazi1999@gmail.com', '$2y$10$EDNHWixgDVndGJ3NbTQktey8k0jx1ydT9S8MC3nEArwj/lp5QtUyG', NULL, NULL, '69040125', NULL, '2022-12-22 21:20:53', 'loged in', '188.71.215.201', NULL, NULL, NULL, '2022-12-22 20:20:53', '2022-12-22 20:20:53'),
(349, NULL, NULL, NULL, NULL, 'إبراهيم فهد', 'ibraheem.mobrad@gmail.com', '$2y$10$8ci6XXM.olu6A20./rA3iuf8fHtPoTxcNRK8UfMoDEzXcW7EtBbLi', NULL, NULL, '65848558', NULL, '2022-12-23 04:40:41', 'loged in', '37.39.177.82', '95.216.37.146', NULL, 'zMHBKXvXMMch6Nfdvjwy3KLXKjNe1BJeIjLIkhIh', '2022-12-23 03:40:34', '2022-12-23 03:40:41'),
(350, NULL, NULL, NULL, NULL, 'نور عادل كاظم مسير', 'noorapp113@gmail.com', '$2y$10$P23omtOs6M9iDDrIaKDOOuxYgDsjcy6tCiSjMGFwmu8hmsTloR3z.', NULL, NULL, '66382770', NULL, '2022-12-23 08:14:05', 'loged in', '188.71.246.226', '95.216.37.146', NULL, 'JWMr7xc25e10jA1o9yEXPMMUoln1FzQkkKOdlYsv', '2022-12-23 07:12:47', '2022-12-23 07:14:05'),
(351, NULL, NULL, NULL, NULL, 'خالد محمد', 'gshinya79@gmail.com', '$2y$10$0LHZtCz.mURK5pA7R1jxounTdGelNtScUO7s3Cuu8BmWZiJFSAKiu', NULL, NULL, '97427505', NULL, '2022-12-25 07:12:28', 'loged in', '37.231.252.161', '95.216.37.146', NULL, '6t0MkCkS4xVBgZ19LkDGjnc0aTqteShGMro0kif5', '2022-12-23 13:21:51', '2022-12-25 06:12:28'),
(352, NULL, NULL, NULL, NULL, 'Baraa elshamy', 'braaemad591@gmail.com', '$2y$10$ZvOgW.Uq6bPF.TZnmxe.beTVq7JKwXVngsxSjd71LlbT9wDtbEp9W', NULL, NULL, '60461546', NULL, '2022-12-23 14:47:28', 'loged in', '188.70.46.242', '95.216.37.146', NULL, 'AbwJ8uzYY62ZsCvmkNJ8Q0AFyUSyXXgw4Ws8e0x5', '2022-12-23 13:46:52', '2022-12-23 13:47:28'),
(353, NULL, NULL, NULL, NULL, 'خليل صالح خليل الشحري', 'khalilalshehry68@gmail.com', '$2y$10$cNlpGAlLl9/se1VlgF8GW.PwzhCgaOBWYbz2bQd3WRi6OzyDKO04O', NULL, NULL, '96986754', NULL, '2022-12-23 18:38:42', 'loged in', '188.236.103.89', '95.216.37.146', NULL, 'KhzlwUSUfqQCGWYJW6ZgKZcYZbXIm1e3kgBW6HVp', '2022-12-23 17:38:32', '2022-12-23 17:38:42'),
(354, NULL, NULL, NULL, NULL, 'سلمى الجمعة السيد النجار', 'elsahateman@yahoo.com', '$2y$10$FVHimKgO499wgE6BX7hr.OnvybRFGM2d4PkZEXXyIWoyyuHTTCI.6', NULL, NULL, '96560032300', NULL, '2022-12-23 20:10:36', 'loged in', '37.231.32.148', '95.216.37.146', NULL, '0DaO2rDRjy6xCVbjJwAF14yYkIixZGT0JW9pSZ54', '2022-12-23 19:10:20', '2022-12-23 19:10:36'),
(355, NULL, NULL, NULL, NULL, 'تسنيم اشرف', 'mnadham2002@gmail.com', '$2y$10$R5e2a87./mNmtROQQ2NPpOzV4wEtJ3e8L2eodkkH6sFhNqulrPvzm', NULL, NULL, '51420777', NULL, '2022-12-23 20:51:59', 'loged in', '188.71.195.40', NULL, NULL, NULL, '2022-12-23 19:51:59', '2022-12-23 19:51:59'),
(356, NULL, NULL, NULL, NULL, 'sara omar', 'dododod9@gmail.com', '$2y$10$cUQ/reDO1hAm2vmSbD4hueLvjCpW4rGi/9oKI2fs/.I1ij3ayS8GW', NULL, NULL, '0122345678', NULL, '2022-12-29 09:20:30', 'loged in', '197.55.27.171', '95.216.37.146', NULL, 'IxGZ1Co7zOFpTpP8EROdGsbczBnOd5nzsHF0jWOO', '2022-12-24 08:08:01', '2022-12-29 08:20:30'),
(357, NULL, NULL, NULL, NULL, 'Hajar Alajmi', 'hajarfalah119@gmail.com', '$2y$10$pP4bIM4swfpha2J.tNf0VOp/55bKDvUP5EQnxd1Ob9p.1mjXEqBt.', NULL, NULL, '97146950', NULL, '2022-12-24 15:56:29', 'loged in', '37.39.208.171', '95.216.37.146', NULL, 'JDc3GRg2A7XYCZJyXy5TI4c4LPuhJazG7vajiuxh', '2022-12-24 14:54:42', '2022-12-24 14:56:29'),
(358, NULL, NULL, NULL, NULL, 'هدى منصور محمد العجمي', 'h.h_alajmi@hotmail.com', '$2y$10$8ADRbV9Dt2yeSeOJbp8SS.njqEnEDG1bb7UwlNYt3cBjJ1rH0Ftni', NULL, NULL, '51591900', NULL, '2022-12-24 18:50:05', 'loged in', '37.231.253.126', '95.216.37.146', NULL, '9g041Z7qIO2dCoAubkmFtkX93BARbIgJkM15t3fW', '2022-12-24 17:47:36', '2022-12-24 17:50:05'),
(359, NULL, NULL, NULL, NULL, 'جنى تامر سعيد محمد فريد', 'janatamer@gmail.com', '$2y$10$dvOm41GrSt0l71F7Pb0QIefvKXQgp5MOcxGp7UrrQY85Dh6l8BCay', NULL, NULL, '96700757', NULL, '2022-12-24 18:59:09', 'loged in', '37.39.1.9', NULL, NULL, NULL, '2022-12-24 17:59:09', '2022-12-24 17:59:09'),
(360, NULL, NULL, NULL, NULL, 'ليان منير محمد الشريف', 'layanalshreef2005@gmail.com', '$2y$10$LC4tQ4O66cLU/RuQswJ7BuWmCH8nrd.X9FhaaPHngJydloQajZon2', NULL, NULL, '60335780', NULL, '2022-12-24 19:13:07', 'loged in', '94.128.153.56', '95.216.37.146', NULL, 'BLejxuF1gr8fqetFUJIUZp43wjKTdIhl7mOAFIWT', '2022-12-24 18:08:57', '2022-12-24 18:13:07'),
(361, NULL, NULL, NULL, NULL, 'Lara Mohammad', 'laramohamd892@gmail.com', '$2y$10$RVvjMAYX6oHswdO0oSy/3.HRNgYQRSTowiZ/yt7NiVIo1JNFUVv02', NULL, NULL, '99002603', NULL, '2022-12-25 19:51:24', 'loged in', '37.231.39.96', '95.216.37.146', NULL, 'wpxyqlSzhVN4vvzBrcTz0QOocfRVbMYm3eydKaBK', '2022-12-24 18:31:37', '2022-12-25 18:51:24'),
(362, NULL, NULL, NULL, NULL, 'شاهه عادل مديد القحطاني', 'Sshahoona@gmail.com', '$2y$10$e8R4UU0HmEI3ZNcoZm/fn.4nJeA0g2mbUhTVUT/QOACX3zAaOruwO', NULL, NULL, '69917196', NULL, '2022-12-24 19:37:03', 'loged in', '94.128.165.248', '95.216.37.146', NULL, 'Htt1jwGwWnvBdC5DHkvLPMkPWrssqIjfxd9If3MU', '2022-12-24 18:34:17', '2022-12-24 18:37:03'),
(363, NULL, NULL, NULL, NULL, 'رتاج باسل معزي المطيري', 'reemas92007@gmail.com', '$2y$10$f5W8PFeYPZSNOdD5Pr0flerBtqrCGK.hIcAKoWmB41DqechLlnfSq', NULL, NULL, '94747939', NULL, '2022-12-24 19:56:10', 'loged in', '37.39.237.177', NULL, NULL, NULL, '2022-12-24 18:56:10', '2022-12-24 18:56:10'),
(364, NULL, NULL, NULL, NULL, 'شهد الايهم حامد', 'shahdazzzhamed@gmail.com', '$2y$10$vG0FKdUabafaOz/MPP01UOYXIejAXueQLsNpH94WTXvadxRP2mFBO', NULL, NULL, '51579383', NULL, '2022-12-24 20:46:51', 'loged in', '94.129.69.4', '95.216.37.146', NULL, 'R7QlXYOU4xyn9wHUOgjg8EVbm2d8FR9X91CsPo0f', '2022-12-24 19:46:14', '2022-12-24 19:46:51'),
(365, NULL, NULL, NULL, NULL, 'رزان طلال عايض الميموني', 'ralmotire2005@gmail.com', '$2y$10$rnE6IqlUzsBBtBDofzIV1.OdUhb4FCrlVY.VCNxcSkoWFrNHod/4m', NULL, NULL, '51499095', NULL, '2022-12-24 21:02:39', 'loged in', '94.129.171.90', '95.216.37.146', NULL, 'Q0qAv5WIF96vICHyFDnZMvdagdwCu5TPCoeKZTVm', '2022-12-24 20:01:57', '2022-12-24 20:02:39'),
(366, NULL, NULL, NULL, NULL, 'إيمان محمد طرقي العنزي', 'kuwait721@icloud.com', '$2y$10$V26MwuXnrEdNKaJYgIfD4.kqGOCrBU5kuosMfPszjTApssNRhjfBG', NULL, NULL, '94904317', NULL, '2022-12-24 21:03:50', 'loged in', '37.39.252.204', '95.216.37.146', NULL, '3mfBWcXcOsySQX6najouuSVQfxlJnp8INwe2cnxM', '2022-12-24 20:03:41', '2022-12-24 20:03:50'),
(367, NULL, NULL, NULL, NULL, 'الماس محمد عويد العنزي', 'almasa14@outlook.com', '$2y$10$zJidgtA7sdGD5OIgcJDfjevJrjRrDWQMur/pcL37cOGXJ7cdWovLK', NULL, NULL, '55867025', NULL, '2022-12-24 22:11:06', 'loged in', '94.128.162.216', NULL, NULL, NULL, '2022-12-24 21:11:06', '2022-12-24 21:11:06'),
(368, NULL, NULL, NULL, NULL, 'جمانه محمد ياسين', 'sasmas99@hotmail.com', '$2y$10$NT4ks5G2I7vtu7fkncIhmejTICvT5lqJcv3gUa1naOR4xiTCxcs5q', NULL, NULL, '0096599107378', NULL, '2022-12-25 06:20:17', 'loged in', '37.39.184.11', '95.216.37.146', NULL, 'XPHlU2osAoHM1wsCcCRGaCHYi2pnaFaAyQaTN7Zq', '2022-12-25 05:19:47', '2022-12-25 05:20:17'),
(369, NULL, NULL, NULL, NULL, 'Mohamed', 'm.yasin@elajclinic.com', '$2y$10$v09jDoOp6Vu0NS2tlmlS6.y1pu.btD5PO3SnG02iWjgAwQCAw5dCO', NULL, NULL, '99378636', NULL, '2022-12-25 06:33:47', 'loged in', '188.71.239.173', '95.216.37.146', NULL, '4ii3OtOovmYgm6BDEGruGeDmMh2wfIt7VW8lB95w', '2022-12-25 05:33:16', '2022-12-25 05:33:47'),
(370, NULL, NULL, NULL, NULL, 'آيه خالد محمد نقشه', 'kalamoon79@gmail.com', '$2y$10$bjsNFTdV8rf.Nns7KrW9teM1BZBuaVn7M52OHLeVOz5utJXQnt/8m', NULL, NULL, '66135006', NULL, '2022-12-25 07:29:42', 'loged in', '188.236.216.155', '95.216.37.146', NULL, 'O6Rfsp1maoL6Bvn31ji442ciZUG3Z17BsBZ2kDsW', '2022-12-25 06:29:12', '2022-12-25 06:29:42'),
(371, NULL, NULL, NULL, NULL, 'Ohoud', 'a.ohoud99@gmail.com', '$2y$10$cM2dR/89qO/X1OgUZkFsBuwINQM/buqlVtucgNONJdhd/GKSb0XdS', NULL, NULL, '55178077', NULL, '2022-12-25 15:28:19', 'loged in', '94.129.156.70', '95.216.37.146', NULL, 'sLol5bWSPCtljcfHZkwdahaCt7TkggSrnujqhzEB', '2022-12-25 14:27:29', '2022-12-25 14:28:19'),
(372, NULL, NULL, NULL, NULL, 'تالا ربيح محمد شموط', 'talashamout@gmail.com', '$2y$10$MdlMWGIlboRChSWMVKd0MeWWaL2.9gVBOIR/VVBZ.FIpwf3D8DL/W', NULL, NULL, '66021962', NULL, '2022-12-25 18:33:28', 'loged in', '188.71.251.226', '95.216.37.146', NULL, 'lnSIa0JVWK9kQF9ro8RWSulLcaw6RH2cUiK9S34R', '2022-12-25 17:33:00', '2022-12-25 17:33:28'),
(373, NULL, NULL, NULL, NULL, '7med 3rby', 'lamia8183@gmail.com', '$2y$10$lSRKqeKUm.3/m9g6a9tfVesO9ZSfYyXSgnsXdCQbazbGGhREjv9Ru', NULL, NULL, '60607191', NULL, '2022-12-25 22:00:07', 'loged in', '94.129.68.47', NULL, NULL, NULL, '2022-12-25 21:00:07', '2022-12-25 21:00:07'),
(374, NULL, NULL, NULL, NULL, 'Abrar mohammed', 'abrarmohmmed53@gmail.com', '$2y$10$tBNi1MdFKUPmuPhuZKZpAuHJKauQw.fGrAg4IOjSOKyfj4w4uRESi', NULL, NULL, '99172401', NULL, '2022-12-26 10:37:19', 'loged in', '37.231.218.154', '95.216.37.146', NULL, 'fXj7rma72a4Z5d9g8YbX4knJbzLQAnULqcAg1m1z', '2022-12-26 09:25:27', '2022-12-26 09:37:19'),
(375, NULL, NULL, NULL, NULL, 'يوسف محمد السيد شعيب', 'yousefshuaih@gmail.com', '$2y$10$HK1Rg9izpnWwGRWQBu.rUeOFZ6qZAYco7TWvzkDnsT/BxCRjF0Cs6', NULL, NULL, '99603612', NULL, '2022-12-26 17:55:07', 'loged in', '37.231.55.195', '95.216.37.146', NULL, 'AOvpQ9fiZ8wdeQTXZbXXLxOjaVITVLq4hwsusBSL', '2022-12-26 16:50:34', '2022-12-26 16:55:07'),
(376, NULL, NULL, NULL, NULL, 'Hhhhhhh', 'mohamedabsalam343@gmail.comand', '$2y$10$1SbYuEiV/8m93cWaVe9CB.AYSavm0Oe/y3juoITXunCSh1ModoQqO', NULL, NULL, '69602199', NULL, '2022-12-26 18:21:42', 'loged in', '37.39.181.15', '95.216.37.146', NULL, 'J15xY3OZSTDkrByeH9AOI6bk53zjxTthXLwI3QkN', '2022-12-26 17:13:54', '2022-12-26 17:21:42'),
(377, NULL, NULL, NULL, NULL, 'اديارا جورجي عدلي', 'dodageorgey@gmail.com', '$2y$10$2A2JwToZiPeuU.PHe3NXuurPuqAiZ6mm9wOuorlQWIix85Uy13Kcq', NULL, NULL, '66932824', NULL, '2022-12-26 19:32:11', 'loged in', '188.71.209.177', '95.216.37.146', NULL, 'GTyjgtGtpDL7l77UD7CHe3mY4Bsb8BvwkSqGQl0c', '2022-12-26 18:31:39', '2022-12-26 18:32:11'),
(378, NULL, NULL, NULL, NULL, 'دانة دانة دانة المطيري', 'dalmutaiire@gmail.com', '$2y$10$zy88dWXfDqJoOB2lNnSRr.pDNHz4S.G.k1tbVFBttUzSiJE6jBpeW', NULL, NULL, '60376981', NULL, '2022-12-26 20:10:55', 'loged in', '78.154.236.12', '95.216.37.146', NULL, 'nxmhMCwQPk6bulUmrddDMy1sAoCBr3Lh2RLEB2Wh', '2022-12-26 19:10:26', '2022-12-26 19:10:55'),
(379, NULL, NULL, NULL, NULL, 'فواز صالح العنزي', 'noorsaleh325@gmail.com', '$2y$10$RjvxrSDEYuzq1URzj6hBie4mWpAS.bFKBNhtHEZNYIjntNhK5Zmhi', NULL, NULL, '94409710', NULL, '2022-12-26 23:34:53', 'loged in', '37.231.119.2', '95.216.37.146', NULL, 'yw4cBr3nhO4UUQiRdYwBrvuIzizwC7VNxVfnIkRY', '2022-12-26 22:31:33', '2022-12-26 22:34:53'),
(380, NULL, NULL, NULL, NULL, 'الشايع ابراهيم عبدالعزيز الشايع', 'shaye.alshaye07@gmail.com', '$2y$10$KJoX5qTKETN9Hbjo0dg0tO9Mwxr8TlfIuu8.PNHmENrC2Jvme2Bu.', NULL, NULL, '60488012', NULL, '2022-12-27 10:04:58', 'loged in', '188.236.82.123', '95.216.37.146', NULL, '554ITLocuCXvnaxyW1rEcMB85QlN1JxQCJwk8fm3', '2022-12-27 09:03:58', '2022-12-27 09:04:58'),
(381, NULL, NULL, NULL, NULL, 'مبارك مشعل سعد العنزي', 'mubarakalenzi@hotmail.com', '$2y$10$C0CSifhGQcaTI8d0zOQU3eK4TImkCveG4tP4BP0W4rjCd7Pr9BAUa', NULL, NULL, '51489932', NULL, '2022-12-27 13:09:25', 'loged in', '37.39.208.25', '95.216.37.146', NULL, 'S1KYzMtbgWpaet9u37VYzPQkHk16IKQACqo038fq', '2022-12-27 12:08:32', '2022-12-27 12:09:25'),
(382, NULL, NULL, NULL, NULL, 'فاطمه', 'dueueudh@gmail.com', '$2y$10$w8ALb9/tx0BWyPt0WPyON.z/pjFfAE15leXkz.lZzLO7kfb4Fbw1i', NULL, NULL, '51417461', NULL, '2022-12-27 14:50:19', 'loged in', '94.129.167.47', NULL, NULL, NULL, '2022-12-27 13:50:19', '2022-12-27 13:50:19'),
(383, NULL, NULL, NULL, NULL, 'بدر عبدالله', 'alobaidb88@gmail.com', '$2y$10$Tx2sB9NoCrYufBpXN0nl6ORqtImVX7I6GeoegRZCg9NHHueOIdCvq', NULL, NULL, '99012939', NULL, '2022-12-28 07:28:49', 'loged in', '37.39.159.109', '95.216.37.146', NULL, 'zFI2vnGmgHvhuQ4LayeeRXwIFwDlKM6Uz1ErrOqq', '2022-12-28 06:28:19', '2022-12-28 06:28:49'),
(384, NULL, NULL, NULL, NULL, 'Sham Alnemer', 'alnemersham@gmail.com', '$2y$10$GDKPBIi1G7duMX2ZNLMtk.wMF6ZrT61aDWm.Fori5QqXlDLrDfkUa', NULL, NULL, '65917670', NULL, '2022-12-28 15:43:16', 'loged in', '188.236.165.49', '95.216.37.146', NULL, 'UH3FQ2VBCUYomyRFk408hih5xoXgGsCnMHvMxh7n', '2022-12-28 14:43:07', '2022-12-28 14:43:16'),
(385, NULL, NULL, NULL, NULL, 'ملاك احمد حامد ابوناموس', 'malak22may@gmail.com', '$2y$10$W0lObGVvnEtKSncPOIj0Le/jgRVJfF2Kap7JkV5nDpwoXFAV1z0WW', NULL, NULL, '66646433', NULL, '2022-12-29 09:28:01', 'loged in', '188.71.248.58', '95.216.37.146', NULL, 'FpTg2l3upjn3d30RpN0LUKAFxfnG6VZDtDWyl0yl', '2022-12-28 20:14:12', '2022-12-29 08:28:01'),
(386, NULL, NULL, NULL, NULL, 'ملك عيد محمد حسان', 'haiihello976@gmail.com', '$2y$10$Niy94XdUSUWxtbKDi24eluMZBKFo5Hh.Lj3yfnS70elspSu67Fi26', NULL, NULL, '50811568', NULL, '2022-12-28 21:45:40', 'loged in', '94.129.234.197', '95.216.37.146', NULL, 'yjEW2CfnHkTMZpnts0Mk94Z0VSG8Gm4cd6GHg0Py', '2022-12-28 20:45:24', '2022-12-28 20:45:40'),
(387, NULL, NULL, NULL, NULL, 'Muhammed Bahaaeldeen', 'MuhammedBahaa98@gmail.com', '$2y$10$p2sRyW28M5S6vba4yodn..t7Vp758CO5gFreVqOyZ2Y2DYA6yzO3u', NULL, NULL, '01015817044', NULL, '2022-12-29 08:52:54', 'loged in', '197.54.102.78', '95.216.37.146', NULL, 'CT7e5Pgsq59lPnEfIab0CgWeRN1FENah2ev82Pnd', '2022-12-29 07:52:48', '2022-12-29 07:52:54'),
(388, NULL, NULL, NULL, NULL, 'جنى مرسي صلاح مرسي', 'janna35679@gmail.com', '$2y$10$ZexhbpxGPi4ZR9an.WVXVOk8/pLCn5ktFdUk1t06V7.McBjcrUuw6', NULL, NULL, '67046630', NULL, '2022-12-29 10:19:55', 'loged in', '80.184.121.149', '95.216.37.146', NULL, 'MfbftH9Qa8GiiH2iILNobN7akBDGgdONrFcWilrj', '2022-12-29 09:18:58', '2022-12-29 09:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_coupons`
--

CREATE TABLE `user_coupons` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `interests` longtext COLLATE utf8mb4_unicode_ci,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci,
  `fb_url` longtext COLLATE utf8mb4_unicode_ci,
  `tw_url` longtext COLLATE utf8mb4_unicode_ci,
  `website_url` longtext COLLATE utf8mb4_unicode_ci,
  `profile_pic` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `interests`, `occupation`, `about`, `fb_url`, `tw_url`, `website_url`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, 106, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-24 19:38:20', '2022-09-24 19:38:20'),
(2, 107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-24 19:43:02', '2022-09-24 19:43:02'),
(3, 108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-25 18:56:45', '2022-09-25 18:56:45'),
(4, 109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-25 19:40:03', '2022-09-25 19:40:03'),
(5, 110, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-26 09:09:30', '2022-09-26 09:09:30'),
(6, 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-27 21:42:57', '2022-09-27 21:42:57'),
(7, 112, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-28 18:27:19', '2022-09-28 18:27:19'),
(8, 113, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-29 13:17:43', '2022-09-29 13:17:43'),
(9, 114, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-29 14:39:36', '2022-09-29 14:39:36'),
(10, 115, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-29 16:04:59', '2022-09-29 16:04:59'),
(11, 116, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-29 16:09:18', '2022-09-29 16:09:18'),
(12, 117, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-29 17:24:34', '2022-09-29 17:24:34'),
(13, 118, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-29 17:39:06', '2022-09-29 17:39:06'),
(14, 119, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-29 17:57:54', '2022-09-29 17:57:54'),
(15, 120, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-29 17:59:09', '2022-09-29 17:59:09'),
(16, 121, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-29 19:46:15', '2022-09-29 19:46:15'),
(17, 122, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-29 22:13:43', '2022-09-29 22:13:43'),
(18, 123, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-30 04:58:42', '2022-09-30 04:58:42'),
(19, 124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-30 04:59:02', '2022-09-30 04:59:02'),
(20, 125, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-30 05:19:47', '2022-09-30 05:19:47'),
(21, 126, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-30 05:21:41', '2022-09-30 05:21:41'),
(22, 127, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-30 06:23:21', '2022-09-30 06:23:21'),
(23, 128, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-30 07:14:20', '2022-09-30 07:14:20'),
(24, 129, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-30 07:18:06', '2022-09-30 07:18:06'),
(25, 130, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-30 07:44:13', '2022-09-30 07:44:13'),
(26, 131, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-30 09:18:42', '2022-09-30 09:18:42'),
(27, 132, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-30 10:44:40', '2022-09-30 10:44:40'),
(28, 133, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-30 17:08:38', '2022-09-30 17:08:38'),
(29, 134, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-01 03:15:55', '2022-10-01 03:15:55'),
(30, 135, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-01 08:28:08', '2022-10-01 08:28:08'),
(31, 136, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-01 10:33:54', '2022-10-01 10:33:54'),
(32, 137, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-03 09:52:50', '2022-10-03 09:52:50'),
(33, 138, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-03 12:31:34', '2022-10-03 12:31:34'),
(34, 139, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-03 17:18:42', '2022-10-03 17:18:42'),
(35, 140, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-04 03:22:25', '2022-10-04 03:22:25'),
(36, 141, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 03:52:35', '2022-10-05 03:52:35'),
(37, 142, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 04:25:15', '2022-10-05 04:25:15'),
(38, 143, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 05:35:41', '2022-10-05 05:35:41'),
(39, 144, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 05:36:37', '2022-10-05 05:36:37'),
(40, 145, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 05:41:53', '2022-10-05 05:41:53'),
(41, 146, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 06:43:26', '2022-10-05 06:43:26'),
(42, 147, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 06:45:05', '2022-10-05 06:45:05'),
(43, 148, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 07:01:45', '2022-10-05 07:01:45'),
(44, 149, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 08:19:30', '2022-10-05 08:19:30'),
(45, 150, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 08:50:47', '2022-10-05 08:50:47'),
(46, 151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 09:15:17', '2022-10-05 09:15:17'),
(47, 152, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 09:23:20', '2022-10-05 09:23:20'),
(48, 153, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 09:24:02', '2022-10-05 09:24:02'),
(49, 154, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 09:32:22', '2022-10-05 09:32:22'),
(50, 155, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 09:32:41', '2022-10-05 09:32:41'),
(51, 156, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 09:33:14', '2022-10-05 09:33:14'),
(52, 157, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 09:40:26', '2022-10-05 09:40:26'),
(53, 158, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 09:51:07', '2022-10-05 09:51:07'),
(54, 159, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 10:26:14', '2022-10-05 10:26:14'),
(55, 160, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 11:15:34', '2022-10-05 11:15:34'),
(56, 161, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 12:42:12', '2022-10-05 12:42:12'),
(57, 162, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 16:10:44', '2022-10-05 16:10:44'),
(58, 163, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 17:13:14', '2022-10-05 17:13:14'),
(59, 164, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-06 16:01:54', '2022-10-06 16:01:54'),
(60, 165, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-06 19:23:04', '2022-10-06 19:23:04'),
(61, 166, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-07 04:31:18', '2022-10-07 04:31:18'),
(62, 167, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-08 07:12:59', '2022-10-08 07:12:59'),
(63, 168, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-08 12:58:07', '2022-10-08 12:58:07'),
(64, 169, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-08 12:58:19', '2022-10-08 12:58:19'),
(65, 170, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-08 18:40:17', '2022-10-08 18:40:17'),
(66, 171, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-09 12:01:47', '2022-10-09 12:01:47'),
(67, 172, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-09 13:46:08', '2022-10-09 13:46:08'),
(68, 173, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-09 17:47:18', '2022-10-09 17:47:18'),
(69, 174, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-11 16:20:56', '2022-10-11 16:20:56'),
(70, 175, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-11 17:12:28', '2022-10-11 17:12:28'),
(71, 176, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-11 18:01:55', '2022-10-11 18:01:55'),
(72, 177, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-14 08:03:23', '2022-10-14 08:03:23'),
(73, 178, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-14 09:17:03', '2022-10-14 09:17:03'),
(74, 179, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-14 16:09:34', '2022-10-14 16:09:34'),
(75, 180, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-14 16:14:57', '2022-10-14 16:14:57'),
(76, 181, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-14 16:21:44', '2022-10-14 16:21:44'),
(77, 182, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-19 14:37:06', '2022-10-19 14:37:06'),
(78, 183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-22 08:46:39', '2022-10-22 08:46:39'),
(79, 184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-24 08:19:34', '2022-10-24 08:19:34'),
(80, 185, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-25 13:13:52', '2022-10-25 13:13:52'),
(81, 186, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-25 18:42:56', '2022-10-25 18:42:56'),
(82, 187, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-28 12:09:43', '2022-10-28 12:09:43'),
(83, 188, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-30 02:14:02', '2022-10-30 02:14:02'),
(84, 189, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-30 12:27:56', '2022-10-30 12:27:56'),
(85, 190, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-30 16:08:40', '2022-10-30 16:08:40'),
(86, 191, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-31 14:44:29', '2022-10-31 14:44:29'),
(87, 192, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-05 18:44:02', '2022-11-05 18:44:02'),
(88, 193, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-07 15:56:11', '2022-11-07 15:56:11'),
(89, 194, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-14 10:25:03', '2022-11-14 10:25:03'),
(90, 195, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:32:48', '2022-11-16 16:32:48'),
(91, 196, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 13:31:22', '2022-11-20 13:31:22'),
(92, 197, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 11:01:41', '2022-11-21 11:01:41'),
(93, 198, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-22 19:04:39', '2022-11-22 19:04:39'),
(94, 199, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 12:39:39', '2022-12-08 12:39:39'),
(95, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 12:47:13', '2022-12-08 12:47:13'),
(96, 201, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 13:03:34', '2022-12-08 13:03:34'),
(97, 202, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 13:09:56', '2022-12-08 13:09:56'),
(98, 203, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 13:29:26', '2022-12-08 13:29:26'),
(99, 204, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 13:37:52', '2022-12-08 13:37:52'),
(100, 205, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 13:55:47', '2022-12-08 13:55:47'),
(101, 206, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 14:01:53', '2022-12-08 14:01:53'),
(102, 207, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 14:13:07', '2022-12-08 14:13:07'),
(103, 208, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 14:15:27', '2022-12-08 14:15:27'),
(104, 209, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 14:19:51', '2022-12-08 14:19:51'),
(105, 210, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 14:20:38', '2022-12-08 14:20:38'),
(106, 211, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 14:38:39', '2022-12-08 14:38:39'),
(107, 212, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 14:51:31', '2022-12-08 14:51:31'),
(108, 213, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 14:56:41', '2022-12-08 14:56:41'),
(109, 214, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 14:58:58', '2022-12-08 14:58:58'),
(110, 215, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 15:14:40', '2022-12-08 15:14:40'),
(111, 216, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 15:16:47', '2022-12-08 15:16:47'),
(112, 217, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 15:22:19', '2022-12-08 15:22:19'),
(113, 218, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 15:59:12', '2022-12-08 15:59:12'),
(114, 219, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 16:02:53', '2022-12-08 16:02:53'),
(115, 220, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 16:11:33', '2022-12-08 16:11:33'),
(116, 221, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 16:19:28', '2022-12-08 16:19:28'),
(117, 222, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 16:24:28', '2022-12-08 16:24:28'),
(118, 223, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 16:29:15', '2022-12-08 16:29:15'),
(119, 224, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 16:42:26', '2022-12-08 16:42:26'),
(120, 225, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 16:51:42', '2022-12-08 16:51:42'),
(121, 226, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 16:57:27', '2022-12-08 16:57:27'),
(122, 227, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 17:26:28', '2022-12-08 17:26:28'),
(123, 228, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 17:26:44', '2022-12-08 17:26:44'),
(124, 229, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 17:57:07', '2022-12-08 17:57:07'),
(125, 230, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 18:02:41', '2022-12-08 18:02:41'),
(126, 231, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 18:03:15', '2022-12-08 18:03:15'),
(127, 232, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 18:04:28', '2022-12-08 18:04:28'),
(128, 233, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 18:04:36', '2022-12-08 18:04:36'),
(129, 234, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 18:04:38', '2022-12-08 18:04:38'),
(130, 235, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 18:07:58', '2022-12-08 18:07:58'),
(131, 236, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 18:11:44', '2022-12-08 18:11:44'),
(132, 237, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 18:17:00', '2022-12-08 18:17:00'),
(133, 238, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 18:39:25', '2022-12-08 18:39:25'),
(134, 239, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 18:39:41', '2022-12-08 18:39:41'),
(135, 240, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 18:42:19', '2022-12-08 18:42:19'),
(136, 241, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 18:53:03', '2022-12-08 18:53:03'),
(137, 242, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 18:58:22', '2022-12-08 18:58:22'),
(138, 243, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 19:21:11', '2022-12-08 19:21:11'),
(139, 244, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 19:28:30', '2022-12-08 19:28:30'),
(140, 245, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-08 21:17:55', '2022-12-08 21:17:55'),
(141, 246, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 01:50:57', '2022-12-09 01:50:57'),
(142, 247, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 03:32:10', '2022-12-09 03:32:10'),
(143, 248, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 04:39:08', '2022-12-09 04:39:08'),
(144, 249, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 05:07:48', '2022-12-09 05:07:48'),
(145, 250, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 05:41:31', '2022-12-09 05:41:31'),
(146, 251, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 06:04:13', '2022-12-09 06:04:13'),
(147, 252, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 06:23:41', '2022-12-09 06:23:41'),
(148, 253, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 06:34:18', '2022-12-09 06:34:18'),
(149, 254, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 06:45:24', '2022-12-09 06:45:24'),
(150, 255, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 06:45:30', '2022-12-09 06:45:30'),
(151, 256, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 06:47:36', '2022-12-09 06:47:36'),
(152, 257, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 07:23:56', '2022-12-09 07:23:56'),
(153, 258, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 07:24:32', '2022-12-09 07:24:32'),
(154, 259, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 08:58:40', '2022-12-09 08:58:40'),
(155, 260, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 09:14:28', '2022-12-09 09:14:28'),
(156, 261, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 11:50:00', '2022-12-09 11:50:00'),
(157, 262, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 11:50:09', '2022-12-09 11:50:09'),
(158, 263, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 12:04:29', '2022-12-09 12:04:29'),
(159, 264, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 12:57:49', '2022-12-09 12:57:49'),
(160, 265, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 13:00:11', '2022-12-09 13:00:11'),
(161, 266, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 13:05:29', '2022-12-09 13:05:29'),
(162, 267, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 13:06:03', '2022-12-09 13:06:03'),
(163, 268, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 13:12:48', '2022-12-09 13:12:48'),
(164, 269, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 13:13:48', '2022-12-09 13:13:48'),
(165, 270, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 13:18:15', '2022-12-09 13:18:15'),
(166, 271, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 13:21:02', '2022-12-09 13:21:02'),
(167, 272, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 13:28:15', '2022-12-09 13:28:15'),
(168, 273, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 13:34:21', '2022-12-09 13:34:21'),
(169, 274, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 13:36:02', '2022-12-09 13:36:02'),
(170, 275, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 13:37:32', '2022-12-09 13:37:32'),
(171, 276, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 13:41:35', '2022-12-09 13:41:35'),
(172, 277, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 13:52:19', '2022-12-09 13:52:19'),
(173, 278, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 14:41:45', '2022-12-09 14:41:45'),
(174, 279, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 14:49:36', '2022-12-09 14:49:36'),
(175, 280, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 15:09:18', '2022-12-09 15:09:18'),
(176, 281, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 15:21:37', '2022-12-09 15:21:37'),
(177, 282, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 15:32:16', '2022-12-09 15:32:16'),
(178, 283, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 15:46:50', '2022-12-09 15:46:50'),
(179, 284, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 16:26:25', '2022-12-09 16:26:25'),
(180, 285, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 16:41:08', '2022-12-09 16:41:08'),
(181, 286, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 16:48:46', '2022-12-09 16:48:46'),
(182, 287, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 17:09:34', '2022-12-09 17:09:34'),
(183, 288, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 17:34:37', '2022-12-09 17:34:37'),
(184, 289, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 17:50:21', '2022-12-09 17:50:21'),
(185, 290, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 17:56:40', '2022-12-09 17:56:40'),
(186, 291, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 18:02:29', '2022-12-09 18:02:29'),
(187, 292, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 18:03:25', '2022-12-09 18:03:25'),
(188, 293, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 18:06:08', '2022-12-09 18:06:08'),
(189, 294, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 18:19:26', '2022-12-09 18:19:26'),
(190, 295, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 19:06:43', '2022-12-09 19:06:43'),
(191, 296, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 19:09:24', '2022-12-09 19:09:24'),
(192, 297, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 19:19:57', '2022-12-09 19:19:57'),
(193, 298, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 19:26:30', '2022-12-09 19:26:30'),
(194, 299, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 19:28:00', '2022-12-09 19:28:00'),
(195, 300, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 19:32:19', '2022-12-09 19:32:19'),
(196, 301, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 21:01:02', '2022-12-09 21:01:02'),
(197, 302, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 21:17:46', '2022-12-09 21:17:46'),
(198, 303, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 21:26:34', '2022-12-09 21:26:34'),
(199, 304, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 21:34:04', '2022-12-09 21:34:04'),
(200, 305, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-09 22:07:24', '2022-12-09 22:07:24'),
(201, 306, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 04:53:48', '2022-12-10 04:53:48'),
(202, 307, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 06:47:32', '2022-12-10 06:47:32'),
(203, 308, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 07:10:32', '2022-12-10 07:10:32'),
(204, 309, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 08:40:16', '2022-12-10 08:40:16'),
(205, 310, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 08:52:47', '2022-12-10 08:52:47'),
(206, 311, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 09:20:37', '2022-12-10 09:20:37'),
(207, 312, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 10:52:32', '2022-12-10 10:52:32'),
(208, 313, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 11:04:36', '2022-12-10 11:04:36'),
(209, 314, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 11:39:22', '2022-12-10 11:39:22'),
(210, 315, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 12:53:00', '2022-12-10 12:53:00'),
(211, 316, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 14:19:12', '2022-12-10 14:19:12'),
(212, 317, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 18:31:19', '2022-12-10 18:31:19'),
(213, 318, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 20:02:19', '2022-12-10 20:02:19'),
(214, 319, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 20:36:04', '2022-12-10 20:36:04'),
(215, 320, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 21:23:04', '2022-12-10 21:23:04'),
(216, 321, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-11 08:28:11', '2022-12-11 08:28:11'),
(217, 322, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-11 11:11:56', '2022-12-11 11:11:56'),
(218, 323, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-11 12:56:15', '2022-12-11 12:56:15'),
(219, 324, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-11 15:28:13', '2022-12-11 15:28:13'),
(220, 325, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-11 17:39:27', '2022-12-11 17:39:27'),
(221, 326, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-11 17:56:38', '2022-12-11 17:56:38'),
(222, 327, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-11 18:06:21', '2022-12-11 18:06:21'),
(223, 328, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-11 18:25:19', '2022-12-11 18:25:19'),
(224, 329, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 04:16:38', '2022-12-12 04:16:38'),
(225, 330, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 06:44:52', '2022-12-12 06:44:52'),
(226, 331, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 08:36:27', '2022-12-12 08:36:27'),
(227, 332, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 09:27:08', '2022-12-12 09:27:08'),
(228, 333, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 09:51:02', '2022-12-22 09:51:02'),
(229, 334, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 12:57:48', '2022-12-22 12:57:48'),
(230, 335, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 13:06:29', '2022-12-22 13:06:29'),
(231, 336, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 13:18:31', '2022-12-22 13:18:31'),
(232, 337, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 13:32:37', '2022-12-22 13:32:37'),
(233, 338, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 14:08:45', '2022-12-22 14:08:45'),
(234, 339, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 14:21:23', '2022-12-22 14:21:23'),
(235, 340, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 14:40:11', '2022-12-22 14:40:11'),
(236, 341, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 14:42:30', '2022-12-22 14:42:30'),
(237, 342, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 16:41:50', '2022-12-22 16:41:50'),
(238, 343, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 18:22:11', '2022-12-22 18:22:11'),
(239, 344, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 18:31:24', '2022-12-22 18:31:24'),
(240, 345, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 18:33:16', '2022-12-22 18:33:16'),
(241, 346, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 18:33:34', '2022-12-22 18:33:34'),
(242, 347, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 19:13:43', '2022-12-22 19:13:43'),
(243, 348, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 20:20:53', '2022-12-22 20:20:53'),
(244, 349, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-23 03:40:34', '2022-12-23 03:40:34'),
(245, 350, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-23 07:12:47', '2022-12-23 07:12:47'),
(246, 351, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-23 13:21:52', '2022-12-23 13:21:52'),
(247, 352, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-23 13:46:52', '2022-12-23 13:46:52'),
(248, 353, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-23 17:38:32', '2022-12-23 17:38:32'),
(249, 354, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-23 19:10:20', '2022-12-23 19:10:20'),
(250, 355, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-23 19:51:59', '2022-12-23 19:51:59'),
(251, 356, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 08:08:02', '2022-12-24 08:08:02'),
(252, 357, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 14:54:42', '2022-12-24 14:54:42'),
(253, 358, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 17:47:36', '2022-12-24 17:47:36'),
(254, 359, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 17:59:09', '2022-12-24 17:59:09'),
(255, 360, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 18:08:57', '2022-12-24 18:08:57'),
(256, 361, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 18:31:37', '2022-12-24 18:31:37'),
(257, 362, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 18:34:17', '2022-12-24 18:34:17'),
(258, 363, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 18:56:10', '2022-12-24 18:56:10'),
(259, 364, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 19:46:14', '2022-12-24 19:46:14'),
(260, 365, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 20:01:58', '2022-12-24 20:01:58'),
(261, 366, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 20:03:41', '2022-12-24 20:03:41'),
(262, 367, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 21:11:06', '2022-12-24 21:11:06'),
(263, 368, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-25 05:19:47', '2022-12-25 05:19:47'),
(264, 369, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-25 05:33:16', '2022-12-25 05:33:16'),
(265, 370, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-25 06:29:12', '2022-12-25 06:29:12'),
(266, 371, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-25 14:27:30', '2022-12-25 14:27:30'),
(267, 372, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-25 17:33:00', '2022-12-25 17:33:00'),
(268, 373, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-25 21:00:08', '2022-12-25 21:00:08'),
(269, 374, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-26 09:25:27', '2022-12-26 09:25:27'),
(270, 375, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-26 16:50:34', '2022-12-26 16:50:34'),
(271, 376, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-26 17:13:54', '2022-12-26 17:13:54'),
(272, 377, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-26 18:31:39', '2022-12-26 18:31:39'),
(273, 378, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-26 19:10:26', '2022-12-26 19:10:26'),
(274, 379, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-26 22:31:33', '2022-12-26 22:31:33'),
(275, 380, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 09:03:58', '2022-12-27 09:03:58'),
(276, 381, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 12:08:32', '2022-12-27 12:08:32'),
(277, 382, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 13:50:19', '2022-12-27 13:50:19'),
(278, 383, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-28 06:28:19', '2022-12-28 06:28:19'),
(279, 384, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-28 14:43:07', '2022-12-28 14:43:07'),
(280, 385, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-28 20:14:12', '2022-12-28 20:14:12'),
(281, 386, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-28 20:45:25', '2022-12-28 20:45:25'),
(282, 387, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-29 07:52:49', '2022-12-29 07:52:49'),
(283, 388, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-29 09:18:59', '2022-12-29 09:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_packages`
--

CREATE TABLE `user_packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_packages`
--

INSERT INTO `user_packages` (`id`, `user_id`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 109, 1, '2022-09-25 21:41:49', '2022-09-25 21:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_scores`
--

CREATE TABLE `user_scores` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `package` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `cover_image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `demo` tinyint(4) NOT NULL DEFAULT '0',
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vimeo_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `admin_id`, `title`, `description`, `cover_image`, `demo`, `duration`, `vimeo_id`, `created_at`, `updated_at`) VALUES
(3, 3, 'video2.mp4', NULL, 'https://i.vimeocdn.com/video/1511577224-09deb92d3776cd094bc2adec68bab43dd2a6df688006952cf5d6b4f7f9aa0ce7-d_640x360?r=pad', 0, '00:00:36', '751989166', '2022-09-21 04:17:56', '2022-09-21 05:02:24'),
(4, 3, 'video2.mp4', NULL, 'https://i.vimeocdn.com/video/1511588578-a885e0354d4cc5dc128e06e72563c39b703290657660089776f10089174a926a-d_640x360?r=pad', 0, '00:00:36', '751995436', '2022-09-21 04:44:58', '2022-09-21 05:01:58'),
(5, 3, 'Missio-Graphic-Simulation.m4v', NULL, 'https://i.vimeocdn.com/video/1511599191-f29146a4d1438f792efede2267847a41a06fe1efe800271704fdedb6930cfb70-d_640x360?r=pad', 0, '00:00:54', '752001963', '2022-09-21 05:09:03', '2022-09-21 05:09:43'),
(6, 3, 'Missio-Graphic-Simulation.m4v', NULL, 'https://i.vimeocdn.com/video/1511777146-2b21372df9050d8673358261f8c709db0d561b99546e459f8fa5bbb16cc0f15a-d_640x360?r=pad', 0, '00:00:54', '752107068', '2022-09-21 10:57:36', '2022-09-21 11:02:14'),
(10, 32, 'video2.mp4', '<p>test description</p>', 'https://i.vimeocdn.com/video/1514509451-d149a44dd3030b1c6bd1fadbc7d6ec0b9ce7004179910d434d14252f49393e27-d_640x360?r=pad', 0, '00:00:36', '753628812', '2022-09-25 19:21:04', '2022-09-25 19:25:36'),
(11, 32, 'Missio-Graphic-Simulation.m4v', '<p>asdkfjasdlkfj</p>', 'https://i.vimeocdn.com/video/default_640x360?r=pad', 0, '0', '753632159', '2022-09-25 19:38:44', '2022-09-25 19:38:44'),
(12, 3, 'عنوان الفيديو', '<p>الوصف</p>', 'https://i.vimeocdn.com/video/1515562817-f58e9bbd5d1c0d8eda361a13d7f87c52cc5efc15773200439602543a6295ac7f-d_640x360?r=pad', 0, '00:00:54', '754234112', '2022-09-27 08:54:58', '2022-09-27 11:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `video_attachments`
--

CREATE TABLE `video_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `video_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_attachments`
--

INSERT INTO `video_attachments` (`id`, `admin_id`, `video_id`, `title`, `file_url`, `created_at`, `updated_at`) VALUES
(9, 32, 10, 'test attachment', 'public/videos/attachment/32//1664140716-4th Aero CUFE Mid-Term Exam Model Answer Apr 2022 Engine Maintenance.pdf', '2022-09-25 19:18:36', '2022-09-25 19:21:04'),
(10, 3, 12, 'ملخص الدرس', 'public/videos/attachment/3//1664276080-الملاحظات.pdf', '2022-09-27 08:54:40', '2022-09-27 08:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `video_distributions`
--

CREATE TABLE `video_distributions` (
  `id` int(10) UNSIGNED NOT NULL,
  `video_id` int(10) UNSIGNED NOT NULL,
  `path_id` int(10) UNSIGNED DEFAULT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `part_id` int(10) UNSIGNED DEFAULT NULL,
  `chapter_id` int(10) UNSIGNED DEFAULT NULL,
  `topic_id` int(10) UNSIGNED DEFAULT NULL,
  `skill_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_distributions`
--

INSERT INTO `video_distributions` (`id`, `video_id`, `path_id`, `course_id`, `part_id`, `chapter_id`, `topic_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(7, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-22 18:40:10', '2022-09-22 18:40:10'),
(8, 9, 4, 2, 38, 2, NULL, NULL, '2022-09-25 07:31:47', '2022-09-25 07:31:47'),
(9, 10, 4, 2, 38, 2, NULL, NULL, '2022-09-25 19:21:04', '2022-09-25 19:21:04'),
(10, 11, 4, 2, 39, 3, 2, NULL, '2022-09-25 19:38:44', '2022-09-25 19:38:44'),
(11, 12, 4, 2, 39, 3, 2, NULL, '2022-09-27 08:54:58', '2022-09-27 08:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `video_progresses`
--

CREATE TABLE `video_progresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_upload_histories`
--

CREATE TABLE `video_upload_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `video_id` int(10) UNSIGNED DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_path` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vimeo_uploaded` tinyint(4) NOT NULL,
  `vimeo_transcoded` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_upload_histories`
--

INSERT INTO `video_upload_histories` (`id`, `admin_id`, `video_id`, `file_name`, `storage_path`, `vimeo_uploaded`, `vimeo_transcoded`, `created_at`, `updated_at`) VALUES
(4, 3, NULL, 'video2.mp4', 'public/chunk-upload/3/video2.mp4', 1, 0, '2022-09-19 17:47:43', '2022-09-19 17:48:07'),
(5, 3, NULL, 'video2.mp4', 'public/chunk-upload/3/video2.mp4', 1, 0, '2022-09-19 18:00:08', '2022-09-19 18:00:27'),
(7, 3, NULL, 'video2.mp4', 'public/chunk-upload/3/video2.mp4', 1, 0, '2022-09-19 18:02:44', '2022-09-19 18:03:02'),
(15, 3, NULL, 'video2.mp4', 'public/chunk-upload/3/video2.mp4', 1, 0, '2022-09-21 04:12:29', '2022-09-21 04:13:05'),
(16, 3, 3, 'video2.mp4', 'public/chunk-upload/3/video2.mp4', 1, 1, '2022-09-21 04:17:19', '2022-09-21 05:04:25'),
(18, 3, 4, 'video2.mp4', 'public/chunk-upload/3/video2.mp4', 1, 1, '2022-09-21 04:44:22', '2022-09-21 05:04:26'),
(19, 3, 5, 'Missio-Graphic-Simulation.m4v', 'public/chunk-upload/3/Missio-Graphic-Simulation.m4v', 1, 1, '2022-09-21 05:06:23', '2022-09-21 05:09:42'),
(20, 3, 6, 'Missio-Graphic-Simulation.m4v', 'public/chunk-upload/3/Missio-Graphic-Simulation.m4v', 1, 1, '2022-09-21 10:56:07', '2022-09-21 11:02:14'),
(21, 3, 7, 'video2.mp4', 'public/chunk-upload/3/video2.mp4', 1, 1, '2022-09-21 11:03:04', '2022-09-21 15:05:39'),
(22, 3, 8, 'video2.mp4', 'public/chunk-upload/3/video2.mp4', 1, 0, '2022-09-22 18:38:25', '2022-09-22 18:40:10'),
(24, 32, 10, 'video2.mp4', 'public/chunk-upload/32/video2.mp4', 1, 1, '2022-09-25 19:17:29', '2022-09-25 19:25:36'),
(25, 32, 11, 'Missio-Graphic-Simulation.m4v', 'public/chunk-upload/32/Missio-Graphic-Simulation.m4v', 1, 0, '2022-09-25 19:38:10', '2022-09-25 19:38:44'),
(26, 3, 12, 'Missio-Graphic-Simulation.m4v', 'public/chunk-upload/3/Missio-Graphic-Simulation.m4v', 1, 1, '2022-09-27 08:53:35', '2022-09-27 11:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `wrong_answers`
--

CREATE TABLE `wrong_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_answer_id` int(11) DEFAULT NULL,
  `flaged` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wrong_drag_center_answers`
--

CREATE TABLE `wrong_drag_center_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `question_drag_center_id` int(10) UNSIGNED NOT NULL,
  `user_answer` mediumtext COLLATE utf8mb4_unicode_ci,
  `flaged` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wrong_drag_right_answers`
--

CREATE TABLE `wrong_drag_right_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `question_drag_right_id` int(10) UNSIGNED DEFAULT NULL,
  `question_drag_left_id` int(10) UNSIGNED DEFAULT NULL,
  `flaged` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zone_countries`
--

CREATE TABLE `zone_countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `zone_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zone_prices`
--

CREATE TABLE `zone_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `zone_id` int(10) UNSIGNED NOT NULL,
  `item_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `original_price` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_answers`
--
ALTER TABLE `active_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `active_drag_center_answers`
--
ALTER TABLE `active_drag_center_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `active_drag_right_answers`
--
ALTER TABLE `active_drag_right_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapter_topics`
--
ALTER TABLE `chapter_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapter_topics_chapter_id_foreign` (`chapter_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `correct_answers`
--
ALTER TABLE `correct_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_idx` (`quiz_id`);

--
-- Indexes for table `correct_drag_center_answers`
--
ALTER TABLE `correct_drag_center_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `correct_drag_right_answers`
--
ALTER TABLE `correct_drag_right_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_parts`
--
ALTER TABLE `course_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_parts_course_id_foreign` (`course_id`);

--
-- Indexes for table `disabled_users`
--
ALTER TABLE `disabled_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_free_packages`
--
ALTER TABLE `event_free_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_free_packages_event_id_foreign` (`event_id`),
  ADD KEY `event_free_packages_package_id_foreign` (`package_id`);

--
-- Indexes for table `event_times`
--
ALTER TABLE `event_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_user`
--
ALTER TABLE `event_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_admin_created_by_foreign` (`admin_created_by`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_questions_question_id_foreign` (`question_id`),
  ADD KEY `exam_questions_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `exam_sections`
--
ALTER TABLE `exam_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_sections_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `explanations`
--
ALTER TABLE `explanations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `explanations_path_id_foreign` (`path_id`),
  ADD KEY `explanations_course_id_foreign` (`course_id`),
  ADD KEY `explanations_part_id_foreign` (`part_id`),
  ADD KEY `explanations_chapter_id_foreign` (`chapter_id`),
  ADD KEY `explanations_topic_id_foreign` (`topic_id`),
  ADD KEY `explanations_admin_created_by_foreign` (`admin_created_by`);

--
-- Indexes for table `extension_histories`
--
ALTER TABLE `extension_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_cards`
--
ALTER TABLE `flash_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_a_qs`
--
ALTER TABLE `f_a_qs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generated_exam`
--
ALTER TABLE `generated_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generated_exam_section`
--
ALTER TABLE `generated_exam_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generated_exam_section_questions`
--
ALTER TABLE `generated_exam_section_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `killed_exams`
--
ALTER TABLE `killed_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `killed_exams_questions`
--
ALTER TABLE `killed_exams_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materials_admin_id_foreign` (`admin_id`),
  ADD KEY `materials_part_id_foreign` (`part_id`),
  ADD KEY `materials_chapter_id_foreign` (`chapter_id`),
  ADD KEY `materials_topic_id_foreign` (`topic_id`),
  ADD KEY `materials_skill_id_foreign` (`skill_id`),
  ADD KEY `materials_level_id_foreign` (`level_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_images`
--
ALTER TABLE `message_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `package_exams`
--
ALTER TABLE `package_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_exams_package_id_foreign` (`package_id`),
  ADD KEY `package_exams_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `package_extensions`
--
ALTER TABLE `package_extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_scoops`
--
ALTER TABLE `package_scoops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_scoops_package_id_foreign` (`package_id`),
  ADD KEY `package_scoops_part_id_foreign` (`part_id`),
  ADD KEY `package_scoops_chapter_id_foreign` (`chapter_id`),
  ADD KEY `package_scoops_topic_id_foreign` (`topic_id`),
  ADD KEY `package_scoops_skill_id_foreign` (`skill_id`),
  ADD KEY `package_scoops_level_id_foreign` (`level_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_admin`
--
ALTER TABLE `page_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_comments`
--
ALTER TABLE `page_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_chapters`
--
ALTER TABLE `part_chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `part_chapters_part_id_foreign` (`part_id`);

--
-- Indexes for table `passages`
--
ALTER TABLE `passages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paths`
--
ALTER TABLE `paths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `path_courses`
--
ALTER TABLE `path_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `path_courses_path_id_foreign` (`path_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_approves`
--
ALTER TABLE `payment_approves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_approve_histories`
--
ALTER TABLE `payment_approve_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_extension_approves`
--
ALTER TABLE `payment_extension_approves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_configs`
--
ALTER TABLE `paypal_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process_groups`
--
ALTER TABLE `process_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_management_groups`
--
ALTER TABLE `project_management_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_passage_id_foreign` (`passage_id`),
  ADD KEY `questions_admin_created_by_foreign` (`admin_created_by`);

--
-- Indexes for table `question_answers`
--
ALTER TABLE `question_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `question_center_dragdrops`
--
ALTER TABLE `question_center_dragdrops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_center_dragdrops_question_id_foreign` (`question_id`);

--
-- Indexes for table `question_distributions`
--
ALTER TABLE `question_distributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_distributions_question_id_foreign` (`question_id`),
  ADD KEY `question_distributions_path_id_foreign` (`path_id`),
  ADD KEY `question_distributions_course_id_foreign` (`course_id`),
  ADD KEY `question_distributions_part_id_foreign` (`part_id`),
  ADD KEY `question_distributions_chapter_id_foreign` (`chapter_id`),
  ADD KEY `question_distributions_topic_id_foreign` (`topic_id`),
  ADD KEY `question_distributions_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `question_dragdrops`
--
ALTER TABLE `question_dragdrops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_dragdrops_question_id_foreign` (`question_id`);

--
-- Indexes for table `question_tags`
--
ALTER TABLE `question_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_tags_admin_created_by_foreign` (`admin_created_by`);

--
-- Indexes for table `question_types`
--
ALTER TABLE `question_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screen_shots`
--
ALTER TABLE `screen_shots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_questions`
--
ALTER TABLE `section_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_questions_section_id_foreign` (`section_id`),
  ADD KEY `section_questions_question_id_foreign` (`question_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `skill_levels`
--
ALTER TABLE `skill_levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skill_levels_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stage_exams`
--
ALTER TABLE `stage_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stage_exams_stage_id_foreign` (`stage_id`),
  ADD KEY `stage_exams_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `study_plans`
--
ALTER TABLE `study_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_package_id_foreign` (`package_id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`);

--
-- Indexes for table `super_admins`
--
ALTER TABLE `super_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `super_admins_email_unique` (`email`);

--
-- Indexes for table `tahsili`
--
ALTER TABLE `tahsili`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_scoops`
--
ALTER TABLE `teacher_scoops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_scoops_admin_id_foreign` (`admin_id`),
  ADD KEY `teacher_scoops_path_id_foreign` (`path_id`),
  ADD KEY `teacher_scoops_course_id_foreign` (`course_id`),
  ADD KEY `teacher_scoops_part_id_foreign` (`part_id`);

--
-- Indexes for table `topic_skills`
--
ALTER TABLE `topic_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_skills_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `transaction_payments`
--
ALTER TABLE `transaction_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transcodes`
--
ALTER TABLE `transcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_coupons`
--
ALTER TABLE `user_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_packages`
--
ALTER TABLE `user_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_scores`
--
ALTER TABLE `user_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `video_attachments`
--
ALTER TABLE `video_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_attachments_admin_id_foreign` (`admin_id`),
  ADD KEY `video_attachments_video_id_foreign` (`video_id`);

--
-- Indexes for table `video_distributions`
--
ALTER TABLE `video_distributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_distributions_video_id_foreign` (`video_id`),
  ADD KEY `video_distributions_path_id_foreign` (`path_id`),
  ADD KEY `video_distributions_course_id_foreign` (`course_id`),
  ADD KEY `video_distributions_part_id_foreign` (`part_id`),
  ADD KEY `video_distributions_chapter_id_foreign` (`chapter_id`),
  ADD KEY `video_distributions_topic_id_foreign` (`topic_id`),
  ADD KEY `video_distributions_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `video_progresses`
--
ALTER TABLE `video_progresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_upload_histories`
--
ALTER TABLE `video_upload_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_upload_histories_admin_id_foreign` (`admin_id`),
  ADD KEY `video_upload_histories_video_id_foreign` (`video_id`);

--
-- Indexes for table `wrong_answers`
--
ALTER TABLE `wrong_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wrong_drag_center_answers`
--
ALTER TABLE `wrong_drag_center_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wrong_drag_right_answers`
--
ALTER TABLE `wrong_drag_right_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone_countries`
--
ALTER TABLE `zone_countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zone_countries_zone_id_foreign` (`zone_id`),
  ADD KEY `zone_countries_country_id_foreign` (`country_id`);

--
-- Indexes for table `zone_prices`
--
ALTER TABLE `zone_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zone_prices_zone_id_foreign` (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_answers`
--
ALTER TABLE `active_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `active_drag_center_answers`
--
ALTER TABLE `active_drag_center_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `active_drag_right_answers`
--
ALTER TABLE `active_drag_right_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chapter_topics`
--
ALTER TABLE `chapter_topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `correct_answers`
--
ALTER TABLE `correct_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `correct_drag_center_answers`
--
ALTER TABLE `correct_drag_center_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `correct_drag_right_answers`
--
ALTER TABLE `correct_drag_right_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_parts`
--
ALTER TABLE `course_parts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `disabled_users`
--
ALTER TABLE `disabled_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_free_packages`
--
ALTER TABLE `event_free_packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `event_times`
--
ALTER TABLE `event_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event_user`
--
ALTER TABLE `event_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_sections`
--
ALTER TABLE `exam_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `explanations`
--
ALTER TABLE `explanations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extension_histories`
--
ALTER TABLE `extension_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flash_cards`
--
ALTER TABLE `flash_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `f_a_qs`
--
ALTER TABLE `f_a_qs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generated_exam`
--
ALTER TABLE `generated_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generated_exam_section`
--
ALTER TABLE `generated_exam_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generated_exam_section_questions`
--
ALTER TABLE `generated_exam_section_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `killed_exams`
--
ALTER TABLE `killed_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `killed_exams_questions`
--
ALTER TABLE `killed_exams_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_images`
--
ALTER TABLE `message_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `package_exams`
--
ALTER TABLE `package_exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `package_extensions`
--
ALTER TABLE `package_extensions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_scoops`
--
ALTER TABLE `package_scoops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_admin`
--
ALTER TABLE `page_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT for table `page_comments`
--
ALTER TABLE `page_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part_chapters`
--
ALTER TABLE `part_chapters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `passages`
--
ALTER TABLE `passages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paths`
--
ALTER TABLE `paths`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `path_courses`
--
ALTER TABLE `path_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_approves`
--
ALTER TABLE `payment_approves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_approve_histories`
--
ALTER TABLE `payment_approve_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_extension_approves`
--
ALTER TABLE `payment_extension_approves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paypal_configs`
--
ALTER TABLE `paypal_configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `process_groups`
--
ALTER TABLE `process_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_management_groups`
--
ALTER TABLE `project_management_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question_answers`
--
ALTER TABLE `question_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `question_center_dragdrops`
--
ALTER TABLE `question_center_dragdrops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_distributions`
--
ALTER TABLE `question_distributions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question_dragdrops`
--
ALTER TABLE `question_dragdrops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_tags`
--
ALTER TABLE `question_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_types`
--
ALTER TABLE `question_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `screen_shots`
--
ALTER TABLE `screen_shots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section_questions`
--
ALTER TABLE `section_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skill_levels`
--
ALTER TABLE `skill_levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stage_exams`
--
ALTER TABLE `stage_exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study_plans`
--
ALTER TABLE `study_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `super_admins`
--
ALTER TABLE `super_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tahsili`
--
ALTER TABLE `tahsili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_scoops`
--
ALTER TABLE `teacher_scoops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `topic_skills`
--
ALTER TABLE `topic_skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `transaction_payments`
--
ALTER TABLE `transaction_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transcodes`
--
ALTER TABLE `transcodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT for table `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- AUTO_INCREMENT for table `user_packages`
--
ALTER TABLE `user_packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_scores`
--
ALTER TABLE `user_scores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `video_attachments`
--
ALTER TABLE `video_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `video_distributions`
--
ALTER TABLE `video_distributions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `video_progresses`
--
ALTER TABLE `video_progresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_upload_histories`
--
ALTER TABLE `video_upload_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `wrong_answers`
--
ALTER TABLE `wrong_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wrong_drag_center_answers`
--
ALTER TABLE `wrong_drag_center_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wrong_drag_right_answers`
--
ALTER TABLE `wrong_drag_right_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zone_countries`
--
ALTER TABLE `zone_countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zone_prices`
--
ALTER TABLE `zone_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapter_topics`
--
ALTER TABLE `chapter_topics`
  ADD CONSTRAINT `chapter_topics_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `part_chapters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_free_packages`
--
ALTER TABLE `event_free_packages`
  ADD CONSTRAINT `event_free_packages_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_free_packages_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materials_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `part_chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materials_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `skill_levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materials_part_id_foreign` FOREIGN KEY (`part_id`) REFERENCES `course_parts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materials_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `topic_skills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materials_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `chapter_topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_exams`
--
ALTER TABLE `package_exams`
  ADD CONSTRAINT `package_exams_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_exams_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_scoops`
--
ALTER TABLE `package_scoops`
  ADD CONSTRAINT `package_scoops_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `part_chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_scoops_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `skill_levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_scoops_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_scoops_part_id_foreign` FOREIGN KEY (`part_id`) REFERENCES `course_parts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_scoops_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `topic_skills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_scoops_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `chapter_topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

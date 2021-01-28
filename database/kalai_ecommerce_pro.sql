-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 04:19 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalai_ecommerce_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_db_users`
--

CREATE TABLE `company_db_users` (
  `company_db_user_name` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `company_db_user_email` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `company_db_user_password` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `mobile` int(11) NOT NULL,
  `email_verification_details` int(11) DEFAULT NULL,
  `c_token` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `c_hash` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `c_sec_key` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_by` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `updated_by` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_db_users`
--

INSERT INTO `company_db_users` (`company_db_user_name`, `company_db_user_email`, `company_db_user_password`, `mobile`, `email_verification_details`, `c_token`, `c_hash`, `c_sec_key`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
('della', 'della@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 123445, NULL, '5c6666f6259874f6d4133e1b1312a967', 'c8afcca07734302298de5d360fe249fa', 'd02da24cf216d5d8d58e910a5f2a45515ed9f567', 'Harish Mamindlapelli', 'Harish Mamindlapelli', 0, '2021-01-15 09:35:08', NULL),
('hpa', 'hpa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 123445, NULL, '617c17e76b7d2093c3c6a080da17c5cc', 'e7b1de0a1007dc3f4a03e139e8f9d2ba', 'f479254eba0cbf986ae04c05fb5cff0ac69ff19e', 'Harish Mamindlapelli', 'Harish Mamindlapelli', 0, '2021-01-15 09:35:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frontend_company`
--

CREATE TABLE `frontend_company` (
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `c_token` varchar(255) NOT NULL,
  `c_hash` varchar(255) NOT NULL,
  `c_sec_key` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `android_service` tinyint(1) DEFAULT NULL,
  `website_service` tinyint(1) DEFAULT NULL,
  `ios_service` tinyint(1) DEFAULT NULL,
  `plan_hash` varchar(255) NOT NULL,
  `application_service` tinyint(1) NOT NULL,
  `email_verification_details` tinyint(1) NOT NULL DEFAULT 0,
  `template_name` varchar(255) NOT NULL,
  `template_hash` varchar(255) DEFAULT NULL,
  `logo_file` longblob DEFAULT NULL,
  `certificate_file` longblob DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `source` varchar(10) NOT NULL DEFAULT 'website',
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frontend_company`
--

INSERT INTO `frontend_company` (`company_name`, `company_email`, `c_token`, `c_hash`, `c_sec_key`, `mobile`, `password`, `android_service`, `website_service`, `ios_service`, `plan_hash`, `application_service`, `email_verification_details`, `template_name`, `template_hash`, `logo_file`, `certificate_file`, `created_by`, `updated_by`, `source`, `status`, `created_at`, `updated_at`) VALUES
('microsoft', 'ms@gmail.com', 'd7d497f2ee96855e6738b8b715d2334b', '22b0d72f5e22e277dfb735b1b22df0b4', '2a06d33cdbe94f96aeffe18d663be2244fd32f4b', 9087654321, '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 0, NULL, '794468a981c9e524dab080870752bf48', 0, 0, 'option3', 'c59e3f94bfaceada78aacd88f966f620', 0x30322d66616365626f6f6b2e6a7067, 0x30322d66616365626f6f6b2e6a7067, 'website', 'webdev', 'd1befa03c7', 1, '2021-01-16 12:25:41', '2021-01-15 21:58:56'),
('myntra', 'myntra@gmail.com', '96a3c43c45052fd0963fad3e19342bc9', '55433fb608ca86e4e08de52306ee28be', '17e58bd4d6f5f8a8df672c0f88baf6a213db03cf', 9087654321, '5f4dcc3b5aa765d61d8327deb882cf99', 0, NULL, NULL, 'a3b18285b460d88395378753386b5e61', 0, 0, 'option2', '357956d06fe58f75755e95487b6d4649', 0x30322d66616365626f6f6b2e6a7067, 0x30322d66616365626f6f6b2e6a7067, 'website', 'webdev', 'd1befa03c7', 1, '2021-01-16 12:41:12', '2021-01-15 22:07:33'),
('kalai', 'kalai@kalai.info', 'caddfb312ba614d293bd1a7c73d4a49d', 'caddfb312ba614d293bd1a7c73d4a49d', '586d2f9eecd925503421cdddc4de9425f29edd3e', 9087654321, '5f4dcc3b5aa765d61d8327deb882cf99', 1, NULL, NULL, '5f1806ce48618df66df49e44ed798468', 1, 0, 'option1', 'd38cee6bff51021902cca0d0dbdad9c3', NULL, NULL, 'website', 'website', 'website', 1, '2021-01-18 11:12:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kalai_bank_details`
--

CREATE TABLE `kalai_bank_details` (
  `account_holder_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `account_number` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `account_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `branch_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `sort_code` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `routing_number` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `swift_bic_code` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `ifsc_code` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `routing_code` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `c_token` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `c_hash` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `c_sec_key` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_by` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kalai_bank_details`
--

INSERT INTO `kalai_bank_details` (`account_holder_name`, `account_number`, `account_hash`, `bank_name`, `branch_name`, `sort_code`, `routing_number`, `swift_bic_code`, `ifsc_code`, `routing_code`, `c_token`, `c_hash`, `c_sec_key`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
('harish', '123', '202cb962ac59075b964b07152d234b70', 'icici', 'deshaipet', '03686', '123', '123', 'SBIN0003686', '1234', '96a3c43c45052fd0963fad3e19342bc9', '55433fb608ca86e4e08de52306ee28be', '17e58bd4d6f5f8a8df672c0f88baf6a213db03cf', 'null', 'null', 1, '2021-01-23 12:35:36', '2021-01-23 09:45:29'),
('Harish', '0987654321', '6fb42da0e32e07b61c9f0251fe627a9c', 'Sbi', 'Hanamkonda', '03686', '123', '123', 'SBIN0003686', '1234', 'd7d497f2ee96855e6738b8b715d2334b', '22b0d72f5e22e277dfb735b1b22df0b4', '2a06d33cdbe94f96aeffe18d663be2244fd32f4b', 'null', 'null', 1, '2021-01-23 14:34:53', '2021-01-23 09:45:36'),
('harish', '908765432111', 'a38602df9993cbbb0e8dbbe56e6b053e', 'sbi', 'deshaipet', '03686', '123', '123', 'SBIN0003686', '1234', 'd7d497f2ee96855e6738b8b715d2334b', '22b0d72f5e22e277dfb735b1b22df0b4', '2a06d33cdbe94f96aeffe18d663be2244fd32f4b', 'null', 'null', 1, '2021-01-23 12:30:43', '2021-01-23 09:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `kalai_company_address_automations`
--

CREATE TABLE `kalai_company_address_automations` (
  `latitude` double(8,2) NOT NULL,
  `logitude` double(8,2) NOT NULL,
  `contact_person_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `c_token` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `c_hash` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `c_sec_key` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_by` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kalai_company_address_manuals`
--

CREATE TABLE `kalai_company_address_manuals` (
  `address1` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `address2` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `street` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `landmark` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `pincode` bigint(11) NOT NULL,
  `pincode_hash` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `contact_person_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `c_token` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `c_hash` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `c_sec_key` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_by` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `dist_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kalai_company_address_manuals`
--

INSERT INTO `kalai_company_address_manuals` (`address1`, `address2`, `street`, `landmark`, `pincode`, `pincode_hash`, `contact_person_name`, `mobile_number`, `c_token`, `c_hash`, `c_sec_key`, `created_by`, `updated_by`, `dist_id`, `state_id`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
('Warangal', 'deshaipet road', 'Paidipally road', 'lmt', 506006, '6378b62ea98a8e530b00f05ed3c8d5ef', 'Raviteja', 9087654321, 'd7d497f2ee96855e6738b8b715d2334b', '22b0d72f5e22e277dfb735b1b22df0b4', '2a06d33cdbe94f96aeffe18d663be2244fd32f4b', 'null', 'null', NULL, NULL, NULL, 1, '2021-01-23 15:04:22', NULL),
('Hyderabad', 'Kukatpally', 'kphb', 'pista house', 500070, 'b46dfe85cb5413c81c1393d20367dec9', 'Harish', 987654321, 'd7d497f2ee96855e6738b8b715d2334b', '22b0d72f5e22e277dfb735b1b22df0b4', '2a06d33cdbe94f96aeffe18d663be2244fd32f4b', 'null', 'null', NULL, NULL, NULL, 1, '2021-01-23 15:05:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kalai_company_employees`
--

CREATE TABLE `kalai_company_employees` (
  `role_hash` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `kalai_employee_hash` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `birth_date` datetime NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `region` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `postal_code` bigint(11) NOT NULL,
  `country` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `home_phone` bigint(20) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `c_token` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `c_hash` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `c_sec_key` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_by` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kalai_company_user_roles`
--

CREATE TABLE `kalai_company_user_roles` (
  `c_role_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `c_role_description` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `c_role_hash` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_by` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kalai_countries`
--

CREATE TABLE `kalai_countries` (
  `country_name` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `country_hash` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kalai_districts`
--

CREATE TABLE `kalai_districts` (
  `dist_name` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `dist_hash` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `country_hash` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `state_hash` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kalai_states`
--

CREATE TABLE `kalai_states` (
  `state_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `state_hash` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `country_hash` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `frontend_company`
--
ALTER TABLE `frontend_company`
  ADD PRIMARY KEY (`c_hash`),
  ADD UNIQUE KEY `company_name` (`company_name`),
  ADD UNIQUE KEY `company_email` (`company_email`),
  ADD UNIQUE KEY `c_token` (`c_token`),
  ADD UNIQUE KEY `c_sec_key` (`c_sec_key`),
  ADD KEY `plan_hash` (`plan_hash`);

--
-- Indexes for table `kalai_bank_details`
--
ALTER TABLE `kalai_bank_details`
  ADD PRIMARY KEY (`account_hash`),
  ADD UNIQUE KEY `account_number` (`account_number`),
  ADD KEY `c_token` (`c_token`),
  ADD KEY `c_hash` (`c_hash`),
  ADD KEY `c_sec_key` (`c_sec_key`);

--
-- Indexes for table `kalai_company_address_automations`
--
ALTER TABLE `kalai_company_address_automations`
  ADD KEY `c_hash` (`c_hash`),
  ADD KEY `c_sec_key` (`c_sec_key`),
  ADD KEY `c_token` (`c_token`);

--
-- Indexes for table `kalai_company_address_manuals`
--
ALTER TABLE `kalai_company_address_manuals`
  ADD PRIMARY KEY (`pincode_hash`),
  ADD UNIQUE KEY `pincode` (`pincode`),
  ADD KEY `c_hash` (`c_hash`),
  ADD KEY `c_sec_key` (`c_sec_key`),
  ADD KEY `c_token` (`c_token`);

--
-- Indexes for table `kalai_company_employees`
--
ALTER TABLE `kalai_company_employees`
  ADD PRIMARY KEY (`kalai_employee_hash`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `c_hash` (`c_hash`),
  ADD KEY `c_sec_key` (`c_sec_key`),
  ADD KEY `c_token` (`c_token`);

--
-- Indexes for table `kalai_company_user_roles`
--
ALTER TABLE `kalai_company_user_roles`
  ADD PRIMARY KEY (`c_role_hash`),
  ADD UNIQUE KEY `c_role_name` (`c_role_name`);

--
-- Indexes for table `kalai_countries`
--
ALTER TABLE `kalai_countries`
  ADD PRIMARY KEY (`country_hash`);

--
-- Indexes for table `kalai_districts`
--
ALTER TABLE `kalai_districts`
  ADD PRIMARY KEY (`dist_hash`),
  ADD KEY `state_hash` (`state_hash`),
  ADD KEY `country_hash` (`country_hash`);

--
-- Indexes for table `kalai_states`
--
ALTER TABLE `kalai_states`
  ADD PRIMARY KEY (`state_hash`),
  ADD KEY `country_hash` (`country_hash`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kalai_districts`
--
ALTER TABLE `kalai_districts`
  ADD CONSTRAINT `kalai_districts_ibfk_1` FOREIGN KEY (`state_hash`) REFERENCES `kalai_states` (`state_hash`),
  ADD CONSTRAINT `kalai_districts_ibfk_2` FOREIGN KEY (`country_hash`) REFERENCES `kalai_countries` (`country_hash`);

--
-- Constraints for table `kalai_states`
--
ALTER TABLE `kalai_states`
  ADD CONSTRAINT `kalai_states_ibfk_1` FOREIGN KEY (`country_hash`) REFERENCES `kalai_countries` (`country_hash`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

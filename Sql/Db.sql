-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 24, 2025 at 11:04 PM
-- Server version: 11.4.9-MariaDB
-- PHP Version: 8.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tnllabmy_ai`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `balance` double(20,2) NOT NULL DEFAULT 0.00,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salary_date` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `balance`, `name`, `photo`, `email`, `email_verified_at`, `password`, `salary_date`, `type`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0.00, 'Md Admin', '/public/admin/assets/images/profile/1706650015HOx.png', 'admin@gmail.com', '2023-11-29 12:37:08', '$2y$12$Z3IdotLItzsDL22hhJaT0uV481pMvh6JIENbnrNl8G9olCJYH/Gku', '2024-05-03', 'admin', '01600000000', 'sd', 'DwggjamhRkeizkJ3AC7DnFmCuVmF62TCySRYpOjbvavQiXAM6a47E8M9ezDA', '2023-11-28 05:11:57', '2025-09-22 13:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `admin_ledgers`
--

CREATE TABLE `admin_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `perticulation` varchar(255) DEFAULT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `debit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `status` enum('pending','approved','rejected','default') NOT NULL DEFAULT 'default',
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_lists`
--

CREATE TABLE `bank_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `bank_code` varchar(255) NOT NULL,
  `gtr_bank_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_lists`
--

INSERT INTO `bank_lists` (`id`, `country`, `bank_code`, `gtr_bank_code`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NG', 'GCASH', 'GCASH', 'GCASH', 1, '2024-08-20 07:35:27', '2024-08-20 07:35:27'),
(4, 'NG', 'PMP', 'PMP', 'PayMaya', 1, '2024-08-20 07:35:27', '2024-08-20 07:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `bonuses`
--

CREATE TABLE `bonuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bonus_name` varchar(255) NOT NULL,
  `counter` int(11) DEFAULT 0 COMMENT 'user get service count',
  `set_service_counter` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `winner` int(11) DEFAULT 0,
  `amount` double NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bonuses`
--

INSERT INTO `bonuses` (`id`, `bonus_name`, `counter`, `set_service_counter`, `code`, `winner`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'VIP Bonus', 1, 10, '101010', 5, 5, 'active', '2024-06-09 19:21:28', '2024-06-09 19:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `bonus_ledgers`
--

CREATE TABLE `bonus_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bonus_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(20,2) NOT NULL DEFAULT 0.00,
  `bonus_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkins`
--

CREATE TABLE `checkins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `amount` double(20,2) NOT NULL DEFAULT 0.00,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `amount` double(20,2) NOT NULL DEFAULT 0.00,
  `date` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `token` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `method_name` varchar(255) DEFAULT NULL,
  `oid` varchar(255) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `transaction_id` varchar(200) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `charge_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `amount` double(20,2) DEFAULT 0.00 COMMENT 'User Deposit Amount',
  `final_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `pay_link` text DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `data` text DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `status` enum('pending','rejected','approved') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` longtext NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `commission` double(20,2) NOT NULL DEFAULT 0.00 COMMENT 'percent',
  `validity` bigint(20) NOT NULL,
  `minimum_invest` double(20,2) NOT NULL DEFAULT 0.00 COMMENT 'amount',
  `status` enum('upcoming','active') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `funds`
--

INSERT INTO `funds` (`id`, `name`, `title`, `photo`, `commission`, `validity`, `minimum_invest`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fund 1', 'Fund oneFund oneFund oneFund one', '/public/upload/fund/1714067352YBp.jpg', 800.00, 5, 500.00, 'active', '2023-06-06 09:38:44', '2024-04-25 17:49:12'),
(18, 'Fund 2', 'Event', '/public/upload/fund/1714067554sbV.jpg', 2500.00, 2, 1500.00, 'active', '2024-03-24 05:28:12', '2024-05-01 01:27:28'),
(19, 'Fund 3', 'Event', '/public/upload/fund/1714067820Ksw.jpg', 3000.00, 1, 2000.00, 'active', '2024-03-24 05:29:44', '2024-05-01 01:25:27'),
(24, 'Fund 3', 'Vip4', '/public/upload/fund/171452681034u.jpg', 7500.00, 1, 5000.00, 'active', '2024-05-01 01:26:51', '2024-05-01 01:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `fund_invests`
--

CREATE TABLE `fund_invests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fund_id` bigint(20) UNSIGNED NOT NULL,
  `validity_expired` varchar(255) NOT NULL,
  `price` double(20,2) NOT NULL DEFAULT 0.00,
  `return_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lucky_ledgers`
--

CREATE TABLE `lucky_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `draw_id` bigint(20) DEFAULT NULL,
  `amount` double(20,2) NOT NULL DEFAULT 0.00,
  `current_date` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `validity` varchar(255) NOT NULL COMMENT 'count days',
  `commission_with_avg_amount` double NOT NULL DEFAULT 0 COMMENT 'user get average amount after validity',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `presale` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('normal','welfare') NOT NULL DEFAULT 'normal',
  `buy_limit` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `photo`, `price`, `validity`, `commission_with_avg_amount`, `status`, `presale`, `created_at`, `updated_at`, `type`, `buy_limit`) VALUES
(1, 'plan 1', '/public/upload/package/17578777267e2.jpg', 580, '100', 13000, 'active', 'no', '2025-09-14 16:54:19', '2025-09-29 10:22:45', 'normal', 10),
(3, 'plan 2', '/public/upload/package/1757877761gpL.jpg', 1870, '100', 47000, 'active', 'no', '2025-09-14 19:52:41', '2025-09-14 19:52:41', 'normal', 2),
(4, 'plan 3', '/public/upload/package/1757877796y3v.jpeg', 5610, '100', 164500, 'active', 'yes', '2025-09-14 19:53:16', '2025-09-14 19:53:16', 'normal', 1),
(5, 'plan 4', '/public/upload/package/1757878130QYT.jpg', 14025, '100', 493500, 'active', 'yes', '2025-09-14 19:58:50', '2025-09-14 19:58:50', 'normal', 1),
(6, 'plan 5', '/public/upload/package/17578781919M2.jpg', 25590, '100', 1370000, 'active', 'yes', '2025-09-14 19:59:51', '2025-09-14 19:59:51', 'normal', 1),
(7, 'plan 6', '/public/upload/package/1757878255O6i.webp', 65080, '100', 4530000, 'active', 'yes', '2025-09-14 20:00:55', '2025-09-14 20:00:55', 'normal', 1),
(8, 'vip 1', '/public/upload/package/1757878574H9l.jpg', 1000, '15', 7500, 'active', 'yes', '2025-09-14 20:06:14', '2025-09-20 06:27:54', 'welfare', 1),
(9, 'vip 2', '/public/upload/package/1757878614oWz.jpg', 2500, '15', 37500, 'active', 'yes', '2025-09-14 20:06:54', '2025-09-14 20:06:54', 'welfare', 1),
(10, 'vip 3', '/public/upload/package/17578786722U0.jpg', 7000, '15', 150000, 'active', 'yes', '2025-09-14 20:07:53', '2025-09-14 20:07:53', 'welfare', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `channel` varchar(200) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `receiver` varchar(200) DEFAULT NULL,
  `minimum` double(20,4) NOT NULL DEFAULT 0.0000,
  `maximum` double(20,3) NOT NULL DEFAULT 0.000,
  `settings` text DEFAULT NULL,
  `auto` tinyint(1) NOT NULL DEFAULT 0,
  `open_deposit` tinyint(1) NOT NULL DEFAULT 0,
  `open_payout` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `type` enum('wallet','usdt') NOT NULL DEFAULT 'wallet',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `tag`, `photo`, `channel`, `address`, `receiver`, `minimum`, `maximum`, `settings`, `auto`, `open_deposit`, `open_payout`, `status`, `type`, `created_at`, `updated_at`) VALUES
(5, 'Paymaya', 'mapay', '', 'Paymaya', '0x3f02f259427673e2f1d422628117ccc9acd82d16', 'USDT', 1.0000, 2000000.000, '{\"mchtId\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":null},\"secret_key\":{\"title\":\"Deposit key\",\"global\":true,\"value\":null},\"payment_key\":{\"title\":\"Payout key\",\"global\":true,\"value\":\"QMHYTGCP3CSHQROIMRI9FATYKQ1HPQ3Q\"},\"document_type\":{\"title\":\"Document Type\",\"global\":true,\"value\":\"PASSPORT\"},\"document_id\":{\"title\":\"Document Number\",\"global\":true,\"value\":null},\"payin_channel\":{\"title\":\"Payin Channel ID\",\"global\":true,\"value\":\"521\"},\"payout_channel\":{\"title\":\"Payout Channel ID\",\"global\":true,\"value\":\"521\"}}', 1, 1, 1, 'active', 'wallet', '2023-11-28 05:11:57', '2025-03-18 14:26:01'),
(43, 'GCash', 'qepay', '', 'Gcash', 'TFybNsx3cu5MFugpMVpfwpbvXb5VuSjTKa', 'USDT', 1.0000, 1.000, '{\"mchtId\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"102001002\"},\"secret_key\":{\"title\":\"Deposit key\",\"global\":true,\"value\":\"a3a0b75ae9964c7ab08d8b8125cb6715\"},\"payment_key\":{\"title\":\"Payout key\",\"global\":true,\"value\":\"QMHYTGCP3CSHQROIMRI9FATYKQ1HPQ3Q\"},\"document_type\":{\"title\":\"Document Type\",\"global\":true,\"value\":\"PASSPORT\"},\"document_id\":{\"title\":\"Document Number\",\"global\":true,\"value\":\"Xxxx\"},\"payin_channel\":{\"title\":\"Payin Channel ID\",\"global\":true,\"value\":\"1720\"},\"payout_channel\":{\"title\":\"Payout Channel ID\",\"global\":true,\"value\":\"1720\"}}', 1, 1, 1, 'active', 'usdt', '2024-07-10 00:18:34', '2025-03-18 12:54:01'),
(46, '', NULL, '', 'USDT(BEP20)', '0x3f02f259427673e2f1d422628117ccc9acd82d16', 'USDT', 1.0000, 2000000.000, '[]', 0, 0, 0, 'active', 'wallet', '2023-11-28 05:11:57', '2025-09-10 15:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `daily_income` double(20,2) NOT NULL DEFAULT 0.00,
  `date` varchar(255) NOT NULL,
  `status` enum('active','inactive','pending') NOT NULL DEFAULT 'pending',
  `validity` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rebates`
--

CREATE TABLE `rebates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_commission1` int(11) DEFAULT NULL,
  `team_commission2` int(11) DEFAULT NULL,
  `team_commission3` int(11) DEFAULT NULL,
  `interest_commission1` double NOT NULL,
  `interest_commission2` double NOT NULL,
  `interest_commission3` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rebates`
--

INSERT INTO `rebates` (`id`, `team_commission1`, `team_commission2`, `team_commission3`, `interest_commission1`, `interest_commission2`, `interest_commission3`, `created_at`, `updated_at`) VALUES
(1, 20, 3, 1, 0, 0, 0, NULL, '2025-09-19 14:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auto_deposit` tinyint(1) NOT NULL DEFAULT 0,
  `auto_transfer` tinyint(1) NOT NULL DEFAULT 0,
  `auto_transfer_default` varchar(255) DEFAULT NULL,
  `open_deposit` tinyint(1) NOT NULL DEFAULT 0,
  `open_transfer` tinyint(1) NOT NULL DEFAULT 0,
  `withdraw_charge` int(11) NOT NULL DEFAULT 0 COMMENT 'percent',
  `minimum_withdraw` double(20,2) NOT NULL DEFAULT 0.00,
  `maximum_withdraw` double(20,2) NOT NULL DEFAULT 0.00,
  `w_time_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `checkin` double(20,2) NOT NULL DEFAULT 0.00,
  `registration_bonus` double(20,2) NOT NULL DEFAULT 0.00,
  `total_member_register_reword` int(11) NOT NULL DEFAULT 0,
  `total_member_register_reword_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `telegram` varchar(200) DEFAULT NULL,
  `whatsapp` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `auto_deposit`, `auto_transfer`, `auto_transfer_default`, `open_deposit`, `open_transfer`, `withdraw_charge`, `minimum_withdraw`, `maximum_withdraw`, `w_time_status`, `checkin`, `registration_bonus`, `total_member_register_reword`, `total_member_register_reword_amount`, `telegram`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'mapay', 1, 1, 10, 150.00, 10000.00, 'active', 10.00, 0.00, 0, 0.00, 'https://t.me/TNL_LAB_WEBSITE_DEVELOPER', 'https://t.me/TNL_LAB_WEBSITE_DEVELOPER', '2022-01-18 05:03:22', '2025-12-24 16:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_by` varchar(255) DEFAULT NULL,
  `ref_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `investor` int(11) NOT NULL DEFAULT 0,
  `realname` varchar(255) DEFAULT NULL,
  `phone_code` varchar(20) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `income` double(20,2) NOT NULL DEFAULT 0.00,
  `balance` double(20,2) NOT NULL DEFAULT 0.00,
  `receive_able_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `photo` varchar(255) DEFAULT NULL,
  `gateway_method` varchar(50) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `ifsc` varchar(155) DEFAULT NULL,
  `gateway_number` varchar(50) DEFAULT NULL,
  `gateway_address` text DEFAULT NULL,
  `withdraw_password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `ban_unban` enum('ban','unban') NOT NULL DEFAULT 'unban',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_member` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ref_by`, `ref_id`, `name`, `investor`, `realname`, `phone_code`, `phone`, `ip`, `username`, `email`, `email_verified_at`, `password`, `type`, `income`, `balance`, `receive_able_amount`, `photo`, `gateway_method`, `bank_name`, `ifsc`, `gateway_number`, `gateway_address`, `withdraw_password`, `remember_token`, `status`, `ban_unban`, `created_at`, `updated_at`, `active_member`) VALUES
(41, '338601476', '753586737', 'User51', 0, NULL, '+880', '01789083144', '103.36.88.8', 'uname01789083144', 'user684271766595487@gmail.com', NULL, '$2y$10$Yf6mynvQWyrmSRDtWwJ3NOfNDTbani1zamXJdUsFh9fv/weDQQMDy', NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '929848', NULL, 'active', 'unban', '2025-12-24 16:58:07', '2025-12-24 16:58:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_ledgers`
--

CREATE TABLE `user_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `get_balance_from_user_id` bigint(20) DEFAULT NULL,
  `reason` varchar(255) NOT NULL,
  `perticulation` varchar(255) DEFAULT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `debit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `status` enum('pending','approved','rejected','default') NOT NULL DEFAULT 'default',
  `date` varchar(255) DEFAULT NULL,
  `step` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_ledgers`
--

INSERT INTO `user_ledgers` (`id`, `user_id`, `get_balance_from_user_id`, `reason`, `perticulation`, `amount`, `debit`, `credit`, `status`, `date`, `step`, `created_at`, `updated_at`) VALUES
(1, 29, NULL, 'daily_income', 'Package commission', 30, 0, 30, 'approved', '2025-09-14 23:15:02', NULL, '2025-09-14 17:45:02', '2025-09-14 17:45:02'),
(2, 29, NULL, 'daily_income', 'Package commission', 30, 0, 30, 'approved', '2025-09-15 23:15:02', NULL, '2025-09-15 17:45:02', '2025-09-15 17:45:02'),
(3, 29, NULL, 'daily_income', 'Package commission', 30, 0, 30, 'approved', '2025-09-16 23:15:02', NULL, '2025-09-16 17:45:02', '2025-09-16 17:45:02'),
(4, 29, NULL, 'daily_income', 'Package commission', 30, 0, 30, 'approved', '2025-09-17 23:15:03', NULL, '2025-09-17 17:45:03', '2025-09-17 17:45:03'),
(5, 29, NULL, 'daily_income', 'Package commission', 30, 0, 30, 'approved', '2025-09-18 23:20:02', NULL, '2025-09-18 17:50:02', '2025-09-18 17:50:02'),
(6, 29, NULL, 'daily_income', 'Package commission', 30, 0, 30, 'approved', '2025-09-19 23:20:02', NULL, '2025-09-19 17:50:02', '2025-09-19 17:50:02'),
(7, 29, NULL, 'withdrawal', 'Income withdrawn', 150, 150, 0, 'approved', '2025-09-20 01:21:38', NULL, '2025-09-19 19:51:38', '2025-09-19 19:51:38'),
(8, 29, NULL, 'system_recharge', 'Balance added by system', 200, 0, 200, 'approved', '2025-09-20 01:21:54', NULL, '2025-09-19 19:51:54', '2025-09-19 19:51:54'),
(9, 29, NULL, 'system_recharge', 'Balance added by system', 200, 0, 200, 'approved', '2025-09-20 01:22:38', NULL, '2025-09-19 19:52:38', '2025-09-19 19:52:38'),
(10, 29, NULL, 'income_addition', 'Income added by system', 100, 0, 100, 'approved', '2025-09-20 01:27:44', NULL, '2025-09-19 19:57:44', '2025-09-19 19:57:44'),
(11, 33, NULL, 'system_recharge', 'Balance added by system', 1000, 0, 1000, 'approved', '2025-09-20 01:35:57', NULL, '2025-09-19 20:05:57', '2025-09-19 20:05:57'),
(12, 33, NULL, 'income_addition', 'Income added by system', 500, 0, 500, 'approved', '2025-09-20 01:40:39', NULL, '2025-09-19 20:10:39', '2025-09-19 20:10:39'),
(13, 27, NULL, 'balance_deduction', 'Balance deducted by system', 1590, 1590, 0, 'approved', '2025-09-20 10:43:25', NULL, '2025-09-20 05:13:25', '2025-09-20 05:13:25'),
(14, 27, 34, 'commission', 'First Level Commission Received', 200, 200, 0, 'approved', '20-09-2025 10:45', 'first', '2025-09-20 05:15:17', '2025-09-20 05:15:17'),
(15, 34, NULL, 'income_addition', 'Income added by system', 200, 0, 200, 'approved', '2025-09-20 10:49:03', NULL, '2025-09-20 05:19:03', '2025-09-20 05:19:03'),
(16, 34, NULL, 'withdraw_request', 'Zkzk Kzkzzk', 200, 180, 0, 'pending', '20-09-2025 10:49', NULL, '2025-09-20 05:19:28', '2025-09-20 05:19:28'),
(17, 35, NULL, 'daily_income', 'Package commission', 130, 0, 130, 'approved', '2025-09-21 19:45:02', NULL, '2025-09-21 14:15:02', '2025-09-21 14:15:02'),
(18, 35, NULL, 'daily_income', 'Package commission', 130, 0, 130, 'approved', '2025-09-22 19:45:03', NULL, '2025-09-22 14:15:03', '2025-09-22 14:15:03'),
(19, 35, NULL, 'daily_income', 'Package commission', 130, 0, 130, 'approved', '2025-09-23 19:50:02', NULL, '2025-09-23 14:20:02', '2025-09-23 14:20:02'),
(20, 35, NULL, 'daily_income', 'Package commission', 130, 0, 130, 'approved', '2025-09-24 19:55:02', NULL, '2025-09-24 14:25:02', '2025-09-24 14:25:02'),
(21, 38, NULL, 'income_addition', 'Income added by system', 150, 0, 150, 'approved', '2025-09-24 22:22:26', NULL, '2025-09-24 16:52:26', '2025-09-24 16:52:26'),
(22, 38, NULL, 'withdraw_request', 'Airtel 9792219718', 150, 135, 0, 'pending', '25-09-2025 15:29', NULL, '2025-09-25 09:59:18', '2025-09-25 09:59:18'),
(23, 35, NULL, 'daily_income', 'Package commission', 130, 0, 130, 'approved', '2025-09-25 19:55:02', NULL, '2025-09-25 14:25:02', '2025-09-25 14:25:02'),
(24, 35, NULL, 'daily_income', 'Package commission', 130, 0, 130, 'approved', '2025-09-26 19:55:02', NULL, '2025-09-26 14:25:02', '2025-09-26 14:25:02'),
(25, 35, NULL, 'daily_income', 'Package commission', 130, 0, 130, 'approved', '2025-09-27 19:55:02', NULL, '2025-09-27 14:25:02', '2025-09-27 14:25:02'),
(26, 35, NULL, 'daily_income', 'Package commission', 130, 0, 130, 'approved', '2025-09-28 19:55:02', NULL, '2025-09-28 14:25:02', '2025-09-28 14:25:02'),
(27, 35, NULL, 'daily_income', 'Package commission', 130, 0, 130, 'approved', '2025-09-29 19:55:02', NULL, '2025-09-29 14:25:02', '2025-09-29 14:25:02'),
(28, 40, NULL, 'income_addition', 'Income added by system', 500, 0, 500, 'approved', '2025-09-29 23:02:31', NULL, '2025-09-29 17:32:31', '2025-09-29 17:32:31'),
(29, 35, NULL, 'daily_income', 'Package commission', 130, 0, 130, 'approved', '2025-09-30 00:00:03', NULL, '2025-09-29 18:30:03', '2025-09-29 18:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `vip_sliders`
--

CREATE TABLE `vip_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `page_type` enum('home_page','vip_page') NOT NULL DEFAULT 'home_page',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vip_sliders`
--

INSERT INTO `vip_sliders` (`id`, `photo`, `status`, `page_type`, `created_at`, `updated_at`) VALUES
(15, '/public/upload/slider/17575120486LN.jpg', 'active', 'home_page', '2024-12-14 09:51:14', '2025-09-10 14:17:28'),
(16, '/public/upload/slider/1757512060E5J.jpg', 'active', 'home_page', '2024-12-14 09:51:25', '2025-09-10 14:17:40'),
(17, '/public/upload/slider/17575120768E3.jpg', 'active', 'home_page', '2024-12-14 09:51:38', '2025-09-10 14:17:56'),
(18, '/public/upload/slider/1757512114V4Q.jpg', 'active', 'home_page', '2024-12-14 09:51:52', '2025-09-10 14:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `method_name` varchar(255) DEFAULT NULL,
  `oid` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `currency` varchar(40) NOT NULL,
  `rate` decimal(20,2) NOT NULL DEFAULT 0.00,
  `charge` decimal(20,2) NOT NULL DEFAULT 0.00,
  `trx` varchar(40) DEFAULT NULL,
  `final_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `after_charge` decimal(20,2) NOT NULL DEFAULT 0.00,
  `withdraw_information` text DEFAULT NULL,
  `account_info` text DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending' COMMENT '1=>success, 2=>pending, 3=>cancel,  ',
  `admin_feedback` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_ledgers`
--
ALTER TABLE `admin_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_lists`
--
ALTER TABLE `bank_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonuses`
--
ALTER TABLE `bonuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus_ledgers`
--
ALTER TABLE `bonus_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkins`
--
ALTER TABLE `checkins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkins_user_id_foreign` (`user_id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fund_invests`
--
ALTER TABLE `fund_invests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fund_invests_user_id_foreign` (`user_id`),
  ADD KEY `fund_invests_fund_id_foreign` (`fund_id`);

--
-- Indexes for table `lucky_ledgers`
--
ALTER TABLE `lucky_ledgers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lucky_ledgers_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`),
  ADD KEY `purchases_package_id_foreign` (`package_id`);

--
-- Indexes for table `rebates`
--
ALTER TABLE `rebates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_ledgers`
--
ALTER TABLE `user_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vip_sliders`
--
ALTER TABLE `vip_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_ledgers`
--
ALTER TABLE `admin_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_lists`
--
ALTER TABLE `bank_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1027;

--
-- AUTO_INCREMENT for table `bonuses`
--
ALTER TABLE `bonuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bonus_ledgers`
--
ALTER TABLE `bonus_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkins`
--
ALTER TABLE `checkins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `fund_invests`
--
ALTER TABLE `fund_invests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lucky_ledgers`
--
ALTER TABLE `lucky_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rebates`
--
ALTER TABLE `rebates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_ledgers`
--
ALTER TABLE `user_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `vip_sliders`
--
ALTER TABLE `vip_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1651;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkins`
--
ALTER TABLE `checkins`
  ADD CONSTRAINT `checkins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lucky_ledgers`
--
ALTER TABLE `lucky_ledgers`
  ADD CONSTRAINT `lucky_ledgers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

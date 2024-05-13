-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 13 May 2024, 17:40:49
-- Sunucu sürümü: 8.2.0
-- PHP Sürümü: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `studycase`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `api_id` int UNSIGNED NOT NULL COMMENT 'Api Id',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Kur Adı',
  `code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Kur Kodu',
  `symbol` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Kur Sembol',
  `amount` decimal(16,2) NOT NULL COMMENT 'Kur Tutar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `currencies_code_unique` (`code`),
  KEY `currencies_api_id_index` (`api_id`),
  KEY `currencies_amount_index` (`amount`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `currencies`
--

INSERT INTO `currencies` (`id`, `api_id`, `name`, `code`, `symbol`, `amount`, `created_at`, `updated_at`) VALUES
(1, 5, 'dolar', 'USD', '$', 30.00, '2024-05-13 09:52:48', '2024-05-13 13:34:38'),
(2, 5, 'sterlin', 'GBP', '£', 32.00, '2024-05-13 09:52:48', '2024-05-13 13:34:38'),
(3, 5, 'euro', 'EUR', '€', 31.00, '2024-05-13 09:52:48', '2024-05-13 13:34:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `currencies_api`
--

DROP TABLE IF EXISTS `currencies_api`;
CREATE TABLE IF NOT EXISTS `currencies_api` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Servis',
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Servis Url',
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tipi (json,xml)',
  `var_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Var Path',
  `data_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Data Name Field',
  `data_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Data Price Field',
  `data_symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Data Symbol Field',
  `data_shortCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Data Short Code Field',
  `status` int NOT NULL DEFAULT '1' COMMENT 'Durum',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `currencies_api_status_index` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `currencies_api`
--

INSERT INTO `currencies_api` (`id`, `name`, `url`, `type`, `var_path`, `data_name`, `data_price`, `data_symbol`, `data_shortCode`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Mocky Example 2', 'http://run.mocky.io/v3/7698a8d8-ec93-4df2-9181-ff0504078f81', 'json', 'result', 'fullname', 'amount', 'symbol', 'code', 1, '2024-05-12 19:43:22', '2024-05-13 13:34:27'),
(1, 'Mocky Example 1', 'http://run.mocky.io/v3/e5056fe0-be6f-48ba-8b51-52ff28f54372', 'json', 'result', 'name', 'price', 'symbol', 'shortCode', 0, '2024-05-12 19:43:22', '2024-05-13 10:37:31'),
(5, 'xml api', 'http://run.mocky.io/v3/c3aaf003-8958-4cfc-8809-a5aad52d0e66', 'xml', 'response/result/data/item', 'name', 'price', 'symbol', 'shortCode', 1, '2024-05-13 10:37:16', '2024-05-13 11:27:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `currencies_logs`
--

DROP TABLE IF EXISTS `currencies_logs`;
CREATE TABLE IF NOT EXISTS `currencies_logs` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `api_id` int UNSIGNED NOT NULL COMMENT 'Api Id',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Kur Adı',
  `code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Kur Kodu',
  `symbol` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Kur Sembol',
  `amount` decimal(16,2) NOT NULL COMMENT 'Kur Tutar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `currencies_logs_api_id_index` (`api_id`),
  KEY `currencies_logs_code_index` (`code`),
  KEY `currencies_logs_amount_index` (`amount`)
) ENGINE=MyISAM AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `currencies_logs`
--

INSERT INTO `currencies_logs` (`id`, `api_id`, `name`, `code`, `symbol`, `amount`, `created_at`, `updated_at`) VALUES
(1, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:35:31', '2024-05-13 09:35:31'),
(2, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:38:37', '2024-05-13 09:38:37'),
(3, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:39:46', '2024-05-13 09:39:46'),
(4, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:40:38', '2024-05-13 09:40:38'),
(5, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:40:38', '2024-05-13 09:40:38'),
(6, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:40:38', '2024-05-13 09:40:38'),
(7, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:40:54', '2024-05-13 09:40:54'),
(8, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:40:54', '2024-05-13 09:40:54'),
(9, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:40:54', '2024-05-13 09:40:54'),
(10, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:41:22', '2024-05-13 09:41:22'),
(11, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:41:22', '2024-05-13 09:41:22'),
(12, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:41:22', '2024-05-13 09:41:22'),
(13, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:42:38', '2024-05-13 09:42:38'),
(14, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:42:38', '2024-05-13 09:42:38'),
(15, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:42:38', '2024-05-13 09:42:38'),
(16, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:42:53', '2024-05-13 09:42:53'),
(17, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:42:53', '2024-05-13 09:42:53'),
(18, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:42:53', '2024-05-13 09:42:53'),
(19, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:42:53', '2024-05-13 09:42:53'),
(20, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:43:11', '2024-05-13 09:43:11'),
(21, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:43:11', '2024-05-13 09:43:11'),
(22, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:43:11', '2024-05-13 09:43:11'),
(23, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:43:11', '2024-05-13 09:43:11'),
(24, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:44:36', '2024-05-13 09:44:36'),
(25, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:44:36', '2024-05-13 09:44:36'),
(26, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:44:36', '2024-05-13 09:44:36'),
(27, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:44:36', '2024-05-13 09:44:36'),
(28, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:44:53', '2024-05-13 09:44:53'),
(29, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:44:53', '2024-05-13 09:44:53'),
(30, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:44:53', '2024-05-13 09:44:53'),
(31, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:44:53', '2024-05-13 09:44:53'),
(32, 1, 'euro', 'EUR', '€', 35.17, '2024-05-13 09:44:53', '2024-05-13 09:44:53'),
(33, 1, 'sterlin', 'GBP', '£', 40.07, '2024-05-13 09:44:53', '2024-05-13 09:44:53'),
(34, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:46:01', '2024-05-13 09:46:01'),
(35, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:46:01', '2024-05-13 09:46:01'),
(36, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:46:01', '2024-05-13 09:46:01'),
(37, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:46:01', '2024-05-13 09:46:01'),
(38, 1, 'euro', 'EUR', '€', 35.17, '2024-05-13 09:46:01', '2024-05-13 09:46:01'),
(39, 1, 'sterlin', 'GBP', '£', 40.07, '2024-05-13 09:46:01', '2024-05-13 09:46:01'),
(40, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:46:29', '2024-05-13 09:46:29'),
(41, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:46:29', '2024-05-13 09:46:29'),
(42, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:46:29', '2024-05-13 09:46:29'),
(43, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:46:30', '2024-05-13 09:46:30'),
(44, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:46:41', '2024-05-13 09:46:41'),
(45, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:46:41', '2024-05-13 09:46:41'),
(46, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:46:41', '2024-05-13 09:46:41'),
(47, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:46:41', '2024-05-13 09:46:41'),
(48, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:46:55', '2024-05-13 09:46:55'),
(49, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:46:55', '2024-05-13 09:46:55'),
(50, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:46:55', '2024-05-13 09:46:55'),
(51, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:46:55', '2024-05-13 09:46:55'),
(52, 1, 'euro', 'EUR', '€', 35.17, '2024-05-13 09:46:55', '2024-05-13 09:46:55'),
(53, 1, 'sterlin', 'GBP', '£', 40.07, '2024-05-13 09:46:55', '2024-05-13 09:46:55'),
(54, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:48:30', '2024-05-13 09:48:30'),
(55, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:48:30', '2024-05-13 09:48:30'),
(56, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:48:30', '2024-05-13 09:48:30'),
(57, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:48:30', '2024-05-13 09:48:30'),
(58, 1, 'euro', 'EUR', '€', 35.17, '2024-05-13 09:48:30', '2024-05-13 09:48:30'),
(59, 1, 'sterlin', 'GBP', '£', 40.07, '2024-05-13 09:48:30', '2024-05-13 09:48:30'),
(60, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:49:40', '2024-05-13 09:49:40'),
(61, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:49:40', '2024-05-13 09:49:40'),
(62, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:49:40', '2024-05-13 09:49:40'),
(63, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:49:40', '2024-05-13 09:49:40'),
(64, 1, 'euro', 'EUR', '€', 35.17, '2024-05-13 09:49:40', '2024-05-13 09:49:40'),
(65, 1, 'sterlin', 'GBP', '£', 40.07, '2024-05-13 09:49:40', '2024-05-13 09:49:40'),
(66, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:52:48', '2024-05-13 09:52:48'),
(67, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:52:48', '2024-05-13 09:52:48'),
(68, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:52:48', '2024-05-13 09:52:48'),
(69, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:52:48', '2024-05-13 09:52:48'),
(70, 1, 'euro', 'EUR', '€', 35.17, '2024-05-13 09:52:48', '2024-05-13 09:52:48'),
(71, 1, 'sterlin', 'GBP', '£', 40.07, '2024-05-13 09:52:48', '2024-05-13 09:52:48'),
(72, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:52:55', '2024-05-13 09:52:55'),
(73, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:52:55', '2024-05-13 09:52:55'),
(74, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:52:55', '2024-05-13 09:52:55'),
(75, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:52:55', '2024-05-13 09:52:55'),
(76, 1, 'euro', 'EUR', '€', 35.17, '2024-05-13 09:52:55', '2024-05-13 09:52:55'),
(77, 1, 'sterlin', 'GBP', '£', 40.07, '2024-05-13 09:52:55', '2024-05-13 09:52:55'),
(78, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:55:53', '2024-05-13 09:55:53'),
(79, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:55:53', '2024-05-13 09:55:53'),
(80, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:55:53', '2024-05-13 09:55:53'),
(81, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:55:53', '2024-05-13 09:55:53'),
(82, 1, 'euro', 'EUR', '€', 35.17, '2024-05-13 09:55:53', '2024-05-13 09:55:53'),
(83, 1, 'sterlin', 'GBP', '£', 40.07, '2024-05-13 09:55:53', '2024-05-13 09:55:53'),
(84, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:56:09', '2024-05-13 09:56:09'),
(85, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:56:09', '2024-05-13 09:56:09'),
(86, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:56:09', '2024-05-13 09:56:09'),
(87, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:56:09', '2024-05-13 09:56:09'),
(88, 1, 'euro', 'EUR', '€', 35.17, '2024-05-13 09:56:09', '2024-05-13 09:56:09'),
(89, 1, 'sterlin', 'GBP', '£', 40.07, '2024-05-13 09:56:09', '2024-05-13 09:56:09'),
(90, 4, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:56:09', '2024-05-13 09:56:09'),
(91, 4, 'euro', 'EUR', '€', 35.17, '2024-05-13 09:56:09', '2024-05-13 09:56:09'),
(92, 4, 'sterlin', 'GBP', '£', 40.07, '2024-05-13 09:56:09', '2024-05-13 09:56:09'),
(93, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:57:08', '2024-05-13 09:57:08'),
(94, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:57:08', '2024-05-13 09:57:08'),
(95, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:57:08', '2024-05-13 09:57:08'),
(96, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:57:08', '2024-05-13 09:57:08'),
(97, 1, 'euro', 'EUR', '€', 35.17, '2024-05-13 09:57:08', '2024-05-13 09:57:08'),
(98, 1, 'sterlin', 'GBP', '£', 40.07, '2024-05-13 09:57:08', '2024-05-13 09:57:08'),
(99, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 09:57:18', '2024-05-13 09:57:18'),
(100, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 09:57:18', '2024-05-13 09:57:18'),
(101, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 09:57:18', '2024-05-13 09:57:18'),
(102, 1, 'dolar', 'USD', '$', 32.15, '2024-05-13 09:57:18', '2024-05-13 09:57:18'),
(103, 1, 'euro', 'EUR', '€', 35.17, '2024-05-13 09:57:18', '2024-05-13 09:57:18'),
(104, 1, 'sterlin', 'GBP', '£', 40.07, '2024-05-13 09:57:18', '2024-05-13 09:57:18'),
(105, 4, 'dolar', 'USD', '$', 30.00, '2024-05-13 09:57:19', '2024-05-13 09:57:19'),
(106, 4, 'euro', 'EUR', '€', 31.00, '2024-05-13 09:57:19', '2024-05-13 09:57:19'),
(107, 4, 'sterlin', 'GBP', '£', 32.00, '2024-05-13 09:57:19', '2024-05-13 09:57:19'),
(108, 5, 'dolar', 'USD', '$', 30.00, '2024-05-13 11:28:13', '2024-05-13 11:28:13'),
(109, 5, 'euro', 'EUR', '€', 31.00, '2024-05-13 11:28:13', '2024-05-13 11:28:13'),
(110, 5, 'sterlin', 'GBP', '£', 32.00, '2024-05-13 11:28:13', '2024-05-13 11:28:13'),
(111, 5, 'dolar', 'USD', '$', 30.00, '2024-05-13 11:28:34', '2024-05-13 11:28:34'),
(112, 5, 'euro', 'EUR', '€', 31.00, '2024-05-13 11:28:34', '2024-05-13 11:28:34'),
(113, 5, 'sterlin', 'GBP', '£', 32.00, '2024-05-13 11:28:34', '2024-05-13 11:28:34'),
(114, 5, 'dolar', 'USD', '$', 30.00, '2024-05-13 11:30:50', '2024-05-13 11:30:50'),
(115, 5, 'euro', 'EUR', '€', 31.00, '2024-05-13 11:30:50', '2024-05-13 11:30:50'),
(116, 5, 'sterlin', 'GBP', '£', 32.00, '2024-05-13 11:30:50', '2024-05-13 11:30:50'),
(117, 5, 'dolar', 'USD', '$', 30.00, '2024-05-13 11:31:15', '2024-05-13 11:31:15'),
(118, 5, 'euro', 'EUR', '€', 31.00, '2024-05-13 11:31:15', '2024-05-13 11:31:15'),
(119, 5, 'sterlin', 'GBP', '£', 32.00, '2024-05-13 11:31:15', '2024-05-13 11:31:15'),
(120, 5, 'dolar', 'USD', '$', 30.00, '2024-05-13 13:34:07', '2024-05-13 13:34:07'),
(121, 5, 'euro', 'EUR', '€', 31.00, '2024-05-13 13:34:07', '2024-05-13 13:34:07'),
(122, 5, 'sterlin', 'GBP', '£', 32.00, '2024-05-13 13:34:07', '2024-05-13 13:34:07'),
(123, 5, 'dolar', 'USD', '$', 30.00, '2024-05-13 13:34:17', '2024-05-13 13:34:17'),
(124, 5, 'euro', 'EUR', '€', 31.00, '2024-05-13 13:34:17', '2024-05-13 13:34:17'),
(125, 5, 'sterlin', 'GBP', '£', 32.00, '2024-05-13 13:34:17', '2024-05-13 13:34:17'),
(126, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 13:34:31', '2024-05-13 13:34:31'),
(127, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 13:34:31', '2024-05-13 13:34:31'),
(128, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 13:34:31', '2024-05-13 13:34:31'),
(129, 5, 'dolar', 'USD', '$', 30.00, '2024-05-13 13:34:31', '2024-05-13 13:34:31'),
(130, 5, 'euro', 'EUR', '€', 31.00, '2024-05-13 13:34:31', '2024-05-13 13:34:31'),
(131, 5, 'sterlin', 'GBP', '£', 32.00, '2024-05-13 13:34:31', '2024-05-13 13:34:31'),
(132, 2, 'dolar', 'USD', '$', 32.32, '2024-05-13 13:34:37', '2024-05-13 13:34:37'),
(133, 2, 'sterlin', 'GBP', '£', 40.08, '2024-05-13 13:34:37', '2024-05-13 13:34:37'),
(134, 2, 'euro', 'EUR', '€', 35.09, '2024-05-13 13:34:37', '2024-05-13 13:34:37'),
(135, 5, 'dolar', 'USD', '$', 30.00, '2024-05-13 13:34:38', '2024-05-13 13:34:38'),
(136, 5, 'euro', 'EUR', '€', 31.00, '2024-05-13 13:34:38', '2024-05-13 13:34:38'),
(137, 5, 'sterlin', 'GBP', '£', 32.00, '2024-05-13 13:34:38', '2024-05-13 13:34:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2024_05_10_215502_create_currencies_api_table', 1),
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2024_05_10_215543_create_currencies_table', 4),
(14, '2024_05_10_215550_create_currencies_logs_table', 1),
(15, '2024_05_12_222033_add_column_var_path_currencies_api_table', 2),
(16, '2024_05_13_115414_add_column_data_fields_currencies_api_table', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Etiya', 'info@etiya.com', '2024-05-12 20:35:18', '$2a$12$P1UGTuK.Iz7DnSAiXem/OOitg2Xq7Qa7PPKQtz0aC0DZdnWs0YDJq', NULL, '2024-05-12 20:35:23', '2024-05-12 20:35:23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

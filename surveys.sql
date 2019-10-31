-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 31, 2019 at 03:25 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surveys`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `title`, `question_id`, `created_at`, `updated_at`) VALUES
(1, 'Ayasofya', 1, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(2, 'Keçiören Cami', 1, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(3, 'Ayaş Dergahı', 1, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(4, 'Taceddin Dergahı', 1, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(5, 'Beyaz Tren', 2, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(6, 'Kara Duman', 2, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(7, 'Demir Türk', 2, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(8, 'Anadolu', 2, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(9, 'UNOWT', 3, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(10, 'UWT', 3, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(11, 'WTO', 3, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(12, 'UNWTO', 3, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(13, '2006', 4, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(14, '2008', 4, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(15, '2010', 4, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(16, '2011', 4, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(17, '21 Mart', 5, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(18, '21 Haziran', 5, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(19, '23 Eylül', 5, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(20, '21 Aralık', 5, '2019-10-31 03:03:07', '2019-10-31 03:03:07');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_10_30_142908_create_questions_table', 1),
(4, '2019_10_30_144045_create_answers_table', 1),
(5, '2019_10_30_144859_create_user_answers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `right_answer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `right_answer`, `created_at`, `updated_at`) VALUES
(1, 'Mehmet Akif İstiklal Marşını nerede yazmıştır?', 4, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(2, 'Atatürk\'ün yurt gezilerinde 1935-1938 yılları arasında kullandığı trenin adı nedir?', 5, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(3, 'Birleşmiş Milletler Dünya Turizm Örgütü\'nün kısa adı hangisidir?', 0, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(4, 'Türkiye\'de e-devlet uygulaması hangi tarihte yürürlüğe girmiştir?', 0, '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(5, 'Hangi tarihte güney yarımkürede en uzun gündüz yaşanır?', 0, '2019-10-31 03:03:07', '2019-10-31 03:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'soner', '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(2, 'deneme user', '2019-10-31 03:03:07', '2019-10-31 03:03:07'),
(3, 'deneme user', '2019-10-31 07:56:05', '2019-10-31 07:56:05'),
(4, 'deneme', '2019-10-31 08:00:46', '2019-10-31 08:00:46'),
(5, 'deneme', '2019-10-31 08:01:00', '2019-10-31 08:01:00'),
(6, 'deneme', '2019-10-31 08:01:44', '2019-10-31 08:01:44'),
(7, 'deneme', '2019-10-31 08:02:01', '2019-10-31 08:02:01'),
(8, 'deneme', '2019-10-31 08:05:28', '2019-10-31 08:05:28'),
(9, 'deneme', '2019-10-31 08:05:56', '2019-10-31 08:05:56'),
(10, 'deneme', '2019-10-31 08:18:53', '2019-10-31 08:18:53'),
(11, 'deneme', '2019-10-31 08:20:55', '2019-10-31 08:20:55'),
(12, 'deneme', '2019-10-31 09:10:05', '2019-10-31 09:10:05'),
(13, 'deneme user 22', '2019-10-31 10:55:58', '2019-10-31 10:55:58'),
(14, 'deneme user', '2019-10-31 11:15:38', '2019-10-31 11:15:38'),
(15, 'deneme user', '2019-10-31 11:16:13', '2019-10-31 11:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `user_id`, `question_id`, `answer_id`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 4, '2019-10-31 09:22:57', '2019-10-31 09:22:57'),
(2, 12, 2, 8, '2019-10-31 09:23:29', '2019-10-31 09:23:29'),
(3, 12, 3, 9, '2019-10-31 09:23:32', '2019-10-31 09:23:32'),
(4, 12, 4, 13, '2019-10-31 09:23:36', '2019-10-31 09:23:36'),
(5, 12, 5, 20, '2019-10-31 09:24:15', '2019-10-31 09:24:15'),
(21, 13, 1, 4, '2019-10-31 10:56:02', '2019-10-31 10:56:02'),
(22, 13, 2, 5, '2019-10-31 10:56:07', '2019-10-31 10:56:07'),
(23, 13, 3, 12, '2019-10-31 10:56:10', '2019-10-31 10:56:10'),
(24, 13, 4, 15, '2019-10-31 10:56:12', '2019-10-31 10:56:12'),
(25, 13, 5, 17, '2019-10-31 10:56:14', '2019-10-31 10:56:14'),
(26, 14, 1, 3, '2019-10-31 11:15:42', '2019-10-31 11:15:42'),
(27, 15, 1, 3, '2019-10-31 11:16:19', '2019-10-31 11:16:19'),
(28, 15, 2, 7, '2019-10-31 11:16:45', '2019-10-31 11:16:45'),
(29, 15, 3, 9, '2019-10-31 11:18:35', '2019-10-31 11:18:35'),
(30, 15, 4, 15, '2019-10-31 11:18:38', '2019-10-31 11:18:38'),
(31, 15, 5, 20, '2019-10-31 11:18:43', '2019-10-31 11:18:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

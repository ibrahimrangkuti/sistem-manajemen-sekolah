-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Sep 2023 pada 06.57
-- Versi server: 8.0.30
-- Versi PHP: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_informasi_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('news','post','general') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Akademik', 'akademik', 'Akademik', 'general', '2023-09-07 08:33:10', '2023-09-07 08:33:10'),
(2, 'Kegiatan Ekstrakurikuler', 'kegiatan-ekstrakurikuler', 'Kegiatan Ekstrakurikuler', 'general', '2023-09-07 08:33:40', '2023-09-07 08:33:40'),
(3, 'Pengumuman', 'pengumuman', 'Pengumuman', 'general', '2023-09-07 08:34:20', '2023-09-07 08:34:20'),
(4, 'Fasilitas Sekolah', 'fasilitas-sekolah', 'Fasilitas Sekolah:', 'general', '2023-09-07 08:35:28', '2023-09-07 08:35:28'),
(5, 'Pusat Sumber Belajar', 'pusat-sumber-belajar', 'Pusat Sumber Belajar', 'general', '2023-09-07 08:36:02', '2023-09-07 08:36:02'),
(7, 'Program Khusus', 'program-khusus', 'Program Khusus', 'general', '2023-09-07 08:38:07', '2023-09-07 08:38:07'),
(8, 'Seni dan Kesenian', 'seni-dan-kesenian', 'Seni dan Kesenian', 'general', '2023-09-07 08:39:26', '2023-09-07 08:39:26'),
(9, 'Pengembangan Kepemimpinan', 'pengembangan-kepemimpinan', 'Pengembangan Kepemimpinan', 'general', '2023-09-07 08:40:54', '2023-09-07 08:40:54'),
(10, 'Olahraga', 'olahraga', 'Olahraga', 'general', '2023-09-07 08:42:21', '2023-09-07 08:42:21'),
(11, 'Rekomendasi Bacaan', 'rekomendasi-bacaan', 'Rekomendasi Bacaan', 'general', '2023-09-07 08:44:36', '2023-09-07 08:44:36'),
(12, 'Acara', 'acara', 'Acara', 'general', '2023-09-07 08:45:19', '2023-09-07 08:46:49'),
(13, 'Non Akademik', 'non-akademik', 'Non Akademik', 'general', '2023-09-07 08:52:32', '2023-09-07 08:52:32'),
(14, 'Umum', 'umum', 'Umum', 'general', '2023-09-08 10:02:41', '2023-09-08 10:02:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `classes`
--

CREATE TABLE `classes` (
  `id` bigint UNSIGNED NOT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('X','XI','XII') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `classes`
--

INSERT INTO `classes` (`id`, `department_id`, `user_id`, `name`, `level`, `created_at`, `updated_at`) VALUES
(1, 5, 4, '10 TKR 1', 'X', '2023-09-08 09:28:46', '2023-09-08 09:28:46'),
(2, 5, 83, '10 TKR 2', 'X', '2023-09-08 09:42:45', '2023-09-08 09:42:45'),
(3, 5, 33, '11 TKR 1', 'XI', '2023-09-08 09:42:59', '2023-09-08 09:42:59'),
(6, 5, 34, '11 TKR 2', 'XI', '2023-09-08 09:48:06', '2023-09-08 09:48:06'),
(7, 5, 64, '12 TKR 1', 'XII', '2023-09-08 09:51:14', '2023-09-08 09:51:14'),
(8, 5, 65, '12 TKR 2', 'XII', '2023-09-08 09:52:25', '2023-09-08 09:52:25'),
(9, 7, 6, '10 TPM 1', 'X', '2023-09-08 09:53:47', '2023-09-08 09:53:47'),
(11, 7, 7, '10 TPM 2', 'X', '2023-09-08 09:54:42', '2023-09-08 09:54:42'),
(12, 7, 35, '11 TPM 1', 'XI', '2023-09-08 09:59:35', '2023-09-08 09:59:35'),
(13, 7, 36, '11 TPM 2', 'XI', '2023-09-08 10:00:28', '2023-09-08 10:00:28'),
(15, 7, 37, '11 TPM 3', 'XI', '2023-09-08 10:02:33', '2023-09-08 10:02:33'),
(20, 7, 38, '11 TPM 4', 'XI', '2023-09-08 10:07:00', '2023-09-08 10:07:00'),
(23, 7, 66, '12 TPM 1', 'XII', '2023-09-08 10:10:31', '2023-09-08 10:10:31'),
(25, 7, 67, '12 TPM 2', 'XII', '2023-09-08 10:13:48', '2023-09-08 10:13:48'),
(26, 7, 68, '12 TPM 3', 'XII', '2023-09-08 10:14:42', '2023-09-08 10:14:42'),
(27, 7, 70, '12 TPM 4', 'XII', '2023-09-08 10:17:31', '2023-09-08 10:17:31'),
(32, 3, 10, '10 DKV 1', 'X', '2023-09-08 10:22:42', '2023-09-08 10:22:42'),
(34, 3, 11, '10 DKV 2', 'X', '2023-09-10 13:38:43', '2023-09-10 13:38:43'),
(35, 3, 42, '11 DKV 1', 'XI', '2023-09-10 13:41:04', '2023-09-10 13:41:04'),
(36, 3, 44, '11 DKV 2', 'XI', '2023-09-10 13:49:51', '2023-09-10 13:49:51'),
(37, 3, 46, '11 DKV 3', 'XI', '2023-09-10 13:51:53', '2023-09-10 13:51:53'),
(38, 3, 73, '12 DKV 1', 'XII', '2023-09-10 13:53:21', '2023-09-10 13:53:21'),
(39, NULL, 74, '12 DKV 2', 'XII', '2023-09-10 13:54:03', '2023-09-10 13:54:03'),
(40, 3, 75, '12 DKV 3', 'XII', '2023-09-10 13:54:53', '2023-09-10 13:54:53'),
(41, 1, 12, '10 TKJ 1', 'X', '2023-09-10 13:55:38', '2023-09-10 13:55:38'),
(42, 1, 14, '10 TKJ 2', 'X', '2023-09-10 13:56:47', '2023-09-10 13:56:47'),
(43, 1, 47, '11 TKJ 1', 'XI', '2023-09-10 13:57:22', '2023-09-10 13:57:22'),
(44, 1, 49, '11 TKJ 2', 'XI', '2023-09-10 13:58:08', '2023-09-10 13:58:08'),
(45, 1, 76, '12 TKJ 1', 'XII', '2023-09-10 13:58:55', '2023-09-10 13:58:55'),
(46, 1, 77, '12 TKJ 2', 'XII', '2023-09-10 13:59:35', '2023-09-10 13:59:35'),
(47, 1, 78, '12 TKJ 3', 'XII', '2023-09-10 14:00:13', '2023-09-10 14:00:13'),
(48, 2, 15, '10 RPL 1', 'X', '2023-09-10 14:00:51', '2023-09-10 14:00:51'),
(49, 2, 17, '10 RPL 2', 'X', '2023-09-10 14:01:29', '2023-09-10 14:01:29'),
(50, 2, 51, '11 RPL 1', 'XI', '2023-09-10 14:02:18', '2023-09-10 14:02:18'),
(51, 2, 53, '11 RPL 2', 'XI', '2023-09-10 14:02:54', '2023-09-10 14:02:54'),
(52, 2, 79, '12 RPL 1', 'XII', '2023-09-10 14:03:35', '2023-09-10 14:03:35'),
(53, 2, 80, '12 RPL 2', 'XII', '2023-09-10 14:04:08', '2023-09-10 14:04:08'),
(54, 8, 19, '10 MP 1', 'X', '2023-09-10 14:05:53', '2023-09-10 14:05:53'),
(55, 8, 21, '10 MP 2', 'X', '2023-09-10 14:06:26', '2023-09-10 14:06:26'),
(56, 8, 54, '11 MP 1', 'XI', '2023-09-10 14:07:08', '2023-09-10 14:07:08'),
(57, 8, 56, '11 MP 2', 'XI', '2023-09-10 14:07:41', '2023-09-10 14:07:41'),
(58, 8, 81, '12 MP 1', 'XII', '2023-09-10 14:08:25', '2023-09-10 14:08:25'),
(59, 8, 82, '12 MP 2', 'XII', '2023-09-10 14:09:24', '2023-09-10 14:09:24'),
(60, 6, 22, '10 AK 1', 'X', '2023-09-10 14:10:04', '2023-09-10 14:10:04'),
(61, 6, 24, '10 AK 2', 'X', '2023-09-10 14:10:43', '2023-09-10 14:10:43'),
(62, 6, 26, '10 AK 3', 'X', '2023-09-10 14:11:21', '2023-09-10 14:11:21'),
(63, 6, 57, '11 AK 1', 'XI', '2023-09-10 14:11:58', '2023-09-10 14:11:58'),
(64, 6, 58, '11 AK 2', 'XI', '2023-09-10 14:13:21', '2023-09-10 14:13:21'),
(65, 6, 28, '12 AK 1', 'XII', '2023-09-10 14:15:18', '2023-09-10 14:15:18'),
(66, 6, 25, '12 AK 2', 'XII', '2023-09-10 14:18:47', '2023-09-10 14:18:47'),
(67, 4, 27, '10 PH 1', 'X', '2023-09-10 14:19:23', '2023-09-10 14:19:23'),
(68, 4, 29, '10 PH 2', 'X', '2023-09-10 14:19:54', '2023-09-10 14:19:54'),
(69, 4, 59, '11 PH 1', 'XI', '2023-09-10 14:20:42', '2023-09-10 14:20:42'),
(70, 4, 60, '11 PH 2', 'XI', '2023-09-10 14:23:09', '2023-09-10 14:23:42'),
(71, 4, 23, '12 PH 1', 'XII', '2023-09-10 14:24:07', '2023-09-10 14:24:07'),
(72, 4, 20, '12 PH 2', 'XII', '2023-09-10 14:24:35', '2023-09-10 14:24:35'),
(73, 9, 30, '10 APHP 1', 'X', '2023-09-10 14:56:19', '2023-09-10 14:57:00'),
(74, 9, 31, '10 APHP 2', 'X', '2023-09-10 14:57:31', '2023-09-10 14:57:31'),
(75, 9, 32, '10 APHP 3', 'X', '2023-09-10 14:58:02', '2023-09-10 14:58:02'),
(76, 9, 61, '11 APHP 1', 'XI', '2023-09-10 14:58:49', '2023-09-10 14:58:49'),
(77, 9, 62, '11 APHP 2', 'XI', '2023-09-10 14:59:23', '2023-09-10 14:59:23'),
(78, 9, 63, '11 APHP 3', 'XI', '2023-09-10 14:59:56', '2023-09-10 14:59:56'),
(79, 9, 18, '12 APHP 1', 'XII', '2023-09-10 15:00:24', '2023-09-10 15:00:24'),
(80, 9, 16, '12 APHP 2', 'XII', '2023-09-10 15:01:02', '2023-09-10 15:01:02'),
(81, 10, 8, '10 TBSM 1', 'X', '2023-09-10 15:01:57', '2023-09-10 15:01:57'),
(82, 10, 9, '10 TBSM 2', 'X', '2023-09-10 15:02:54', '2023-09-10 15:02:54'),
(83, 10, 39, '11 TBSM 1', 'XI', '2023-09-10 15:03:29', '2023-09-10 15:03:29'),
(84, 10, 41, '11 TBSM 2', 'XI', '2023-09-10 15:04:02', '2023-09-10 15:04:02'),
(85, 10, 71, '12 TBSM 1', 'XII', '2023-09-10 15:04:54', '2023-09-10 15:04:54'),
(86, 10, 72, '12 TBSM 2', 'XII', '2023-09-10 15:05:35', '2023-09-10 15:05:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `logo_path` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `departments`
--

INSERT INTO `departments` (`id`, `user_id`, `logo_path`, `name`, `created_at`, `updated_at`) VALUES
(1, 43, NULL, 'Teknik Komputer Dan Jaringan', '2023-09-07 09:09:38', '2023-09-07 09:09:38'),
(2, 40, NULL, 'Rekayasa Perangkat Lunak', '2023-09-07 09:10:52', '2023-09-07 09:10:52'),
(3, 45, NULL, 'Desain Komunikasi Visual', '2023-09-08 09:18:36', '2023-09-08 09:18:36'),
(5, 161, NULL, 'Teknik Kendaraan Ringan Otomotif', '2023-09-08 09:20:47', '2023-09-11 01:12:48'),
(7, 55, NULL, 'Teknik Pemesinan', '2023-09-08 09:22:38', '2023-09-08 09:22:38'),
(9, 85, NULL, 'Agribisnis Pengelolaan Hasil Perikanan', '2023-09-10 14:29:10', '2023-09-10 14:29:10'),
(10, 86, NULL, 'Teknik Bisnis Sepeda Motor', '2023-09-10 14:32:15', '2023-09-10 14:32:15'),
(11, 84, NULL, 'Akuntansi Keuangan Lembaga', '2023-09-10 14:42:16', '2023-09-11 01:11:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `extracurriculars`
--

CREATE TABLE `extracurriculars` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `extracurriculars`
--

INSERT INTO `extracurriculars` (`id`, `user_id`, `name`, `description`, `instagram_link`, `tiktok_link`, `youtube_link`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 7, 'Seni Vokal', NULL, NULL, NULL, NULL, 1, '2023-09-07 09:03:37', '2023-09-07 09:03:37'),
(2, 24, 'Musik Modern', NULL, NULL, NULL, NULL, 1, '2023-09-07 09:04:08', '2023-09-07 09:04:08'),
(3, 16, 'Pramuka', NULL, NULL, NULL, NULL, 1, '2023-09-07 09:05:42', '2023-09-07 09:05:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lessons`
--

INSERT INTO `lessons` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Matematika', '2023-09-07 08:34:03', '2023-09-07 08:34:03'),
(2, 'Bahasa Indonesia', '2023-09-07 08:36:39', '2023-09-07 08:36:39'),
(3, 'Bahasa Inggris', '2023-09-07 08:48:39', '2023-09-07 08:48:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `sender_id` bigint UNSIGNED DEFAULT NULL,
  `receiver_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'message',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `title`, `slug`, `body`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 165, 3, 'halo min', 'halo-min-1694413765', 'halo min', 'unread', 'message', '2023-09-11 06:29:25', '2023-09-11 06:29:25'),
(2, 165, 13, 'halo min', 'halo-min-1694413808', 'halo min', 'read', 'message', '2023-09-11 06:30:08', '2023-09-11 06:30:52'),
(3, 166, 13, 'halo cuy', 'halo-cuy-1694415134', '😶‍🌫️😶‍🌫️😶‍🌫️👻👻👻', 'read', 'message', '2023-09-11 06:52:14', '2023-09-11 06:54:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_08_16_075909_create_settings_table', 1),
(5, '2023_08_16_080139_create_users_table', 1),
(6, '2023_08_16_080518_create_departments_table', 1),
(7, '2023_08_16_080600_create_classes_table', 1),
(8, '2023_08_16_080703_create_school_years_table', 1),
(9, '2023_08_16_080736_create_lessons_table', 1),
(10, '2023_08_16_080809_create_schedules_table', 1),
(11, '2023_08_16_094625_add_logo_path_to_settings_table', 1),
(12, '2023_08_16_095045_create_extracurriculars_table', 1),
(13, '2023_08_21_162146_create_student_presences_table', 1),
(14, '2023_08_27_092741_add_remember_token_to_users_table', 1),
(15, '2023_08_28_160811_create_categories_table', 1),
(16, '2023_08_28_161441_create_posts_table', 1),
(17, '2023_09_03_155205_add_foreign_key_to_users_table', 1),
(18, '2023_09_05_193115_create_messages_table', 1),
(19, '2023_09_06_114025_create_sub_messages_table', 1),
(20, '2023_09_06_152250_create_schedule_presences_table', 1),
(21, '2023_09_11_134335_create_comments_table', 2),
(22, '2023_09_11_135011_create_sub_comments_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('news','post') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `status` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `image`, `title`, `slug`, `body`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'img/news_image/1694075719.jpeg', 'SMKN 5 Kabupaten Tangerang Meraih Juara 1 Lomba Debat Febisweek Universitas Matama 2023', 'smkn-5-kabupaten-tangerang-meraih-juara-1-lomba-debat-febisweek-universitas-matama-2023-1694075754', '<p><i><strong>Mauk, Tangerang –</strong></i> Dikutip dari portal <i><strong>banten.dalamberita.id</strong></i> SMKN 5 Kabupaten Tangerang sukses meraih juara 1 LOMBA DEBAT yang diselenggarakan oleh UNIVERSITAS MATANA yang berlokasi di Tangcity Mall. Ajang tersebut diikuti oleh sekolah SMK/SMA sederajat seTangerang Raya dan Jakarta.</p><p>Dalam ajang tersebut peserta dari SMKN5 Kab. Tangerang yang diwakili oleh mayoritas peserta didik dari Konsentrasi Keahlian Perhotelan tersebut berhasil meraih Juara 1, atas nama Noviana Lestari, Olivia Tantia Palwa &amp; Farhan.</p><p>“ini berkat kerja keras anak anak berlatih siang dan malam. Semangatnya luar biasa dan Alhamdulillah ahirnya membuahkan hasil maksimal”. Ungkap Rian saefulloh selaku pembina.</p><p>Surta Wijaya S.Kom., M.M. Kepala SMKN 5 Kabupaten Tangerang mengungkapkan haru dan bangga yang sangat luar biasa. “Ya Allah, saya melihat penampilan luar biasa hebat, saya bangga dan haru melihat anak-anak sepintar itu”. Tentu saja kami bangga putra putri SMKN 5 kembali meraih prestasi. Apalagi diajang ini, Kami dapat mempertahankan tradisi juara.</p><p>Surta Wijaya juga menyampaikan ucapan terima kasih kepada Universitas Matana, yang sudah mengadakan event yang sangat luar biasa ini. Ungkapan terima kasih juga untuk pembina dan pendamping yang hebat, anak-anaknya juga hebat. Semoga jejaknya segera diikuti oleh Guru-guru lain, Setiap Bidang studi Harus ada Prestasi, sesuai moto kita “TIADA HARI TANPA PRESTASI” imbuh Surta mengukapkan rasa bangganya.<br>=============</p><p>Selamat dan sukses Ana, Oliv Farhan.</p><p><strong>TAGS: </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/debat/\"><strong>DEBAT</strong></a><strong>, </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/febis/\"><strong>FEBIS</strong></a><strong>, </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/febisweek/\"><strong>FEBISWEEK</strong></a><strong>, </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/matana-universitas/\"><strong>MATANA UNIVERSITAS</strong></a><strong>, </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/tangcity-mall/\"><strong>TANGCITY MALL</strong></a></p>', 'news', '2', '2023-09-07 08:35:19', '2023-09-07 08:35:54'),
(2, 2, 1, 'img/news_image/1694075976.jpg', 'SMKN 5 Kabupaten Tangerang Raih Juara di Ajang Lomba Kompetensi Siswa (LKS) Tingkat Provinsi Banten', 'smkn-5-kabupaten-tangerang-raih-juara-di-ajang-lomba-kompetensi-siswa-lks-tingkat-provinsi-banten-1694075976', '<p><strong>BANTENKINI.COM, TANGERANG</strong> – SMKN 5 Kabupaten Tangerang sukses meraih juara 1 dan 3 lomba Kompetensi Siswa Tingkat Provinsi Banten. Ajang tersebut ditutup oleh kepala dinas pendidikan dan kebudayaan provinsi banten di SMKN 1 Kab. Tangerang.</p><figure class=\"image\"><img src=\"http://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0042-300x225.jpg\" alt=\"\" srcset=\"https://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0042-300x225.jpg 300w, https://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0042-768x576.jpg 768w, https://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0042-1024x768.jpg 1024w, https://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0042-80x60.jpg 80w, https://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0042-265x198.jpg 265w, https://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0042-696x522.jpg 696w, https://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0042-1068x801.jpg 1068w, https://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0042-560x420.jpg 560w, https://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0042.jpg 1600w\" sizes=\"100vw\" width=\"300\"></figure><p>Dalam ajang tersebut peserta dari SMKN5 Kab. Tangerang meraih Juara 1 IT Software Solution atas nama Dwiko Dany Rananta. Dan Juara 3 Web Technologies atas nama Ibrahim Nawa Al Farizi Rangkuti</p><p>“Progam tahunan pemerintah ini untuk anak-anak yang mempunyai prestasi. Dan ini waktunya anak-anak yang mempunyai prestasi untuk berkompetisi dengan sekolah lain,” ungkap Surta Wijaya, S. Kom MM selaku Kepala Sekolah.</p><p>Saya atas nama Sekolah sangat senang dan bersyukur dapat meraih juara 1 dan 3 dalam Lomba LKS tahun ini.”Alhamdulillah bersyukur dan senang bisa menjuara ajang ini. Dan Insya Allah akan kami siapkan ditingkat selanjutnya”.</p><figure class=\"image\"><img src=\"http://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0043-225x300.jpg\" alt=\"\" srcset=\"https://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0043-225x300.jpg 225w, https://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0043-768x1024.jpg 768w, https://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0043-696x928.jpg 696w, https://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0043-1068x1424.jpg 1068w, https://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0043-315x420.jpg 315w, https://bantenkini.com/wp-content/uploads/2023/03/IMG-20230321-WA0043.jpg 1200w\" sizes=\"100vw\" width=\"225\"></figure><p>“Tentu saja kamin sangat bangga SMK N 5 kembali meraih prestasi dalam ajang ini. Kami dapat mempertahankan tradisi juara ini. Karena kami memiliki prinsip dalam slogan kami Yiada Hari Tanpa Prestasi.”imbuh Surta mengukapkan rasa bangganya</p><p>Surta Wijaya juga mengungkapkan harapannya untuk SMKN 5 Kab. Tangerang kedepannya,” saya berharap ada generasi ” ananda Dwiko dan Ibrahim bahkan lebih dari ananda dwiko dan ibrahim sehingga SMK N 5 tetap unggul dan juara,”ungkapnya. (Af)</p><p>SMK Bisa! SMK Hebat! SMK Bisa Hebat!</p>', 'news', '2', '2023-09-07 08:39:36', '2023-09-07 08:39:36'),
(3, 2, 7, 'img/news_image/1694076322.jpeg', 'Job Fair SMK Negeri 5 Kabupaten Tangerang', 'job-fair-smk-negeri-5-kabupaten-tangerang-1694076322', '<p>Hadir dan Ikutilah ENLIMA JOB FAIR 2023! yang akan dilaksanakan pada 12-13 September 2023.<br>Dapatkan kesempatan untuk bekerja pada 22 Perusahaan mitra SMKN 5 Kabupaten Tangerang.<br>Tersedia Kuota 1000 Peserta (Internal) bagi Alumni SMKN 5 Kabupaten Tangerang dan 200 Kuota Peserta (Eksternal) Umum baik bagi lulusan SMA/SMK Sederajat maupun lulusan D3 dan S1.</p><p>================<br>Kualifikasi Peserta, Persyaratan Administrasi dan Registrasi/Pendaftaran Peserta dapat diakses melalui tautan berikut :</p><p><a href=\"https://bit.ly/Reg-Enlima-Job-Fair-2023\">https://bit.ly/Reg-Enlima-Job-Fair-2023</a></p><p>Segera registrasikan dirimu karena kuota sangat terbatas!</p><p>================<br>Registrasi Sponsorship dan Tenant UMKM : <a href=\"https://linktr.ee/smkn5kabtangerang\">https://linktr.ee/smkn5kabtangerang</a></p><p><strong>TAGS: </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/bkk/\"><strong>BKK</strong></a><strong>, </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/dudi/\"><strong>DUDI</strong></a><strong>, </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/job-fair/\"><strong>JOB FAIR</strong></a><strong>, </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/kampus-fair/\"><strong>KAMPUS FAIR</strong></a></p>', 'news', '2', '2023-09-07 08:45:22', '2023-09-07 08:45:22'),
(4, 2, 1, 'img/news_image/1694076550.jpg', 'Pelaksanaan Sertifikasi Internasional Kemampuan Bahasa Inggris TOEIC 2023 di SMKN 5 Kabupaten Tangerang', 'pelaksanaan-sertifikasi-internasional-kemampuan-bahasa-inggris-toeic-2023-di-smkn-5-kabupaten-tangerang-1694076550', '<p><i><strong>Mauk Tangerang,-</strong></i> Pelaksanaan Sertifikasi Internasional Kemampuan Bahasa Inggris TOEIC 2023 di SMKN 5 Kabupaten Tangerang ini didukung oleh Direktorat SMK untuk Meningkatan Daya Saing Lulusan.</p><p>Era society 5.0 merupakan penyempurnaan dari berbagai macam konsep yang sudah ada sebelumnya di era 1.0 sampai dengan 4.0. Era 5.0 ditandai dengan penggunaan kecerdasan buatan atau Artificial Intelligence (AI), Internet of Things (IoT), dan robot guna menciptakan kemudahan bagi segala kebutuhan masyarakat.</p><p>Pendidikan menjadi salah satu area yang terpengaruh oleh era 5.0 yang menuntut kemampuan literasi digital dan keterampilan teknologi, dan memungkinkan pendidikan jarak jauh dan pembelajaran daring.</p><p>Secara keseluruhan, era 5.0 mengubah cara manusia berinteraksi dengan dunia sekitar dengan dampak signifikan pada berbagai bidang kehidupan. Dalam era 5.0 bahasa asing terutama bahasa inggris menjadi semakin penting sebagai alat komunikasi global dalam bekerja sama secara efektif dan mengakses sumber daya dan informasi yang lebih luas. Oleh karena itu kemampuan bahasa asing menjadi keterampilan yang sangat penting.</p><p>Dalam rangka meningkatkan daya saing global di tengah perkembangan era ini, Direktorat SMK kembali menyelenggarakan kegiatan fasilitasi peningkatan kompetensi dan sertifikasi Bahasa Asing siswa SMK dengan TOEIC.</p><p>Tahun ini, SMKN 5 Kabupaten Tangerang telah mengikutsertakan sebanyak 243 siswa untuk mengikuti seleksi VIERA dan yang diumumkan lolos seleksi ada sejumlah 27 siswa. Sebelum para siswa menjalankan ujian bahasa Inggris internasional dengan TOEIC, ada periode Pembelajaran yang diberikan oleh tim Fasilitasi Sertifikasi TOEIC selama kurang lebih satu bulan.</p><p>Selama periode Pembelajaran, siswa bisa mengikuti sesi video conference dengan ETS Approved Facilitator—Dini Larasati dan Luthfi Ibrahim dan tim melalui Zoom dan live streaming YouTube. Paket materi pembelajaran dan persiapan TOEIC juga diberikan dalam bentuk TOEIC Practice Book-Digital Version agar siswa-siswa kami siap menghadapi ujian.</p><p>Pada tanggal 23 Agustus 2023, SMKN 5 Kabupaten Tangerang melaksanakan Sertifikasi TOEIC bagi siswa kami yang lolos seleksi. Selama persiapan ada beberapa kendala yang kami hadapi seperti keterlambatan siswa saat datang untuk tes, aplikasi TOEIC tiba-tiba terhenti, namun semua itu tidak membuat semangat kami dalam melaksanakan tes TOEIC terhenti, berkat Kerjasama tim yang sangat kompak.</p><p>Kami dari guru berharap program Sertifikasi Internasional kemampuan Bahasa Inggris TOEIC ini terus diadakan, mengingat kebutuhan akan berbahasa Inggris sangat penting di era saat ini, apalagi untuk dunia kerja yang memang membutuhkan sertifikasi TOEIC.</p><p>Untuk pelaksanaan TOEIC tahun ini pertisipasi siswa sangatlah meningkat dan hasilnya pun lebih baik dari tahun sebelumnya. Maka dari itu kami berharap agar pelaksanaan TOEIC ini selalu didakan setiap tahunnya karena memang berguna bagi para siswa kami, dan kami berharap ada juga program sertifikasi TOEIC bagi para guru di sekolah.</p><p><strong>#Tahap Persiapan</strong></p><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Persiapan-TOEIC-2-300x243.jpg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Persiapan-TOEIC-2-300x243.jpg 300w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Persiapan-TOEIC-2-1024x829.jpg 1024w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Persiapan-TOEIC-2-768x622.jpg 768w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Persiapan-TOEIC-2.jpg 1137w\" sizes=\"100vw\" width=\"356\"></figure><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Persiapan-TOEIC-1-300x300.jpg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Persiapan-TOEIC-1-300x300.jpg 300w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Persiapan-TOEIC-1-1024x1024.jpg 1024w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Persiapan-TOEIC-1-150x150.jpg 150w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Persiapan-TOEIC-1-768x768.jpg 768w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Persiapan-TOEIC-1-600x600.jpg 600w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Persiapan-TOEIC-1.jpg 1280w\" sizes=\"100vw\" width=\"356\"></figure><p><strong>#Tahap Pelaksanaan</strong></p><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Pelaksanaan-TOEIC-3-300x150.jpg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Pelaksanaan-TOEIC-3-300x150.jpg 300w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Pelaksanaan-TOEIC-3.jpg 747w\" sizes=\"100vw\" width=\"484\"></figure><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Pelaksanaan-TOEIC-2-219x300.jpg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Pelaksanaan-TOEIC-2-219x300.jpg 219w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Pelaksanaan-TOEIC-2.jpg 580w\" sizes=\"100vw\" width=\"302\"></figure><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Pelaksanaan-TOEIC-1-300x169.jpg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Pelaksanaan-TOEIC-1-300x169.jpg 300w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Pelaksanaan-TOEIC-1-1024x576.jpg 1024w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Pelaksanaan-TOEIC-1-768x432.jpg 768w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Pelaksanaan-TOEIC-1-800x450.jpg 800w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/Pelaksanaan-TOEIC-1.jpg 1280w\" sizes=\"100vw\" width=\"438\"></figure><p><strong>#Tahap Penyerahan Sertifikat</strong></p><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_075642-169x300.jpg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_075642-169x300.jpg 169w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_075642-576x1024.jpg 576w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_075642-768x1365.jpg 768w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_075642-864x1536.jpg 864w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_075642-1152x2048.jpg 1152w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_075642-scaled.jpg 1440w\" sizes=\"100vw\" width=\"306\"></figure><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_080910-169x300.jpg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_080910-169x300.jpg 169w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_080910-576x1024.jpg 576w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_080910-768x1365.jpg 768w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_080910-864x1536.jpg 864w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_080910-1152x2048.jpg 1152w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_080910-scaled.jpg 1440w\" sizes=\"100vw\" width=\"304\"></figure><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_080440-169x300.jpg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_080440-169x300.jpg 169w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_080440-576x1024.jpg 576w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_080440-768x1365.jpg 768w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_080440-864x1536.jpg 864w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_080440-1152x2048.jpg 1152w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_080440-scaled.jpg 1440w\" sizes=\"100vw\" width=\"308\"></figure><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_081025-300x169.jpg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_081025-300x169.jpg 300w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_081025-1024x576.jpg 1024w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_081025-768x432.jpg 768w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_081025-1536x864.jpg 1536w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_081025-2048x1152.jpg 2048w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/09/20230901_081025-800x450.jpg 800w\" sizes=\"100vw\" width=\"479\"></figure>', 'news', '2', '2023-09-07 08:49:10', '2023-09-07 08:49:10'),
(5, 2, 10, 'img/news_image/1694076860.jpeg', 'Penanggulangan Polusi Udara SMK Negeri 5 Kabupaten Tangerang Tahun 2023', 'penanggulangan-polusi-udara-smk-negeri-5-kabupaten-tangerang-tahun-2023-1694076913', '<p><i><strong>Mauk, Tangerang</strong> </i>– Dalam beberapa waktu terakhir, kualitas udara di Jabodetabek yang dalam kondisi tidak sehat menjadi sorotan. Berdasarkan situs pemantau kualitas udara IQAir, daerah seperti Jakarta, Kota Tangerang, dan Tangerang Selatan cukup sering memperlihatkan Indeks kualitas udara di atas 150 yang berarti tidak sehat.</p><p>Melalui perintah Kepala Sekolah yang meneruskan instruksi pemerintah Provinsi terkait Penanggulangan Polusi Udara, Kepala Sekolah SMKN 5 Kabupaten Tangerang yaitu Surta Wijaya, S.Kom., M.M. Membuat kebijakan untuk membawa pohon dan menanamnya disekitar Sekolah, baik itu ditanam langsung atau di dalam Pot tanaman. Dalam kegiatan tersebut dijalankan pada hari Senin, 28 Agustus 2023 dan berjalan dengan lancar. Semua Konsentrasi Keahlian dan Peserta Didiknya menjalankan perintah dengan kompak dan semangat.</p><p>Berikut beberapa dokumentasi kegiatan Penanggulangan Polusi Udara yang dilakukan oleh seluruh elemen keluarga besar SMK Negeri 5 Kabupaten Tangerang.</p><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/IMG20230828083106-225x300.jpg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/IMG20230828083106-225x300.jpg 225w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/IMG20230828083106-768x1024.jpg 768w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/IMG20230828083106-1152x1536.jpg 1152w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/IMG20230828083106-1536x2048.jpg 1536w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/IMG20230828083106-scaled.jpg 1920w\" sizes=\"100vw\" width=\"372\"></figure><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-28-at-08.53.36-169x300.jpeg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-28-at-08.53.36-169x300.jpeg 169w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-28-at-08.53.36-576x1024.jpeg 576w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-28-at-08.53.36.jpeg 720w\" sizes=\"100vw\" width=\"374\"></figure><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230828_085210-300x169.jpg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230828_085210-300x169.jpg 300w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230828_085210-1024x576.jpg 1024w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230828_085210-768x432.jpg 768w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230828_085210-1536x864.jpg 1536w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230828_085210-2048x1152.jpg 2048w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230828_085210-800x450.jpg 800w\" sizes=\"100vw\" width=\"554\"></figure><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-28-at-08.41.05-2-225x300.jpeg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-28-at-08.41.05-2-225x300.jpeg 225w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-28-at-08.41.05-2-768x1024.jpeg 768w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-28-at-08.41.05-2.jpeg 960w\" sizes=\"100vw\" width=\"394\"></figure><p><strong>TAGS: </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/penanaman-pohon/\"><strong>PENANAMAN POHON</strong></a><strong>, </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/polusi/\"><strong>POLUSI</strong></a><strong>, </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/reboisasi/\"><strong>REBOISASI</strong></a></p><p><br>&nbsp;</p>', 'news', '2', '2023-09-07 08:54:20', '2023-09-07 08:55:13'),
(6, 2, 2, 'img/news_image/1694077009.jpeg', 'Pelepasan Peserta Raimuna Nasional SMK Negeri 5 Kabupaten Tangerang Tahun 2023', 'pelepasan-peserta-raimuna-nasional-smk-negeri-5-kabupaten-tangerang-tahun-2023-1694077009', '<p>Mauk, Tangerang – Kepala SMK Negeri 5 Kabupaten Tangerang, Waka Kesiswaan Mustopa, S.Pd. melepas peserta Raimuna Daerah (Raida) yang juga peserta Raimuna Nasional (Raina) asal SMK Negeri 5 Kabupaten Tangerang, atas nama Zulfikar dan Savitri Adinda Cahyawanty (11/8/2023) di Lapangan serba guna.</p><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-11-at-08.08.52-300x135.jpeg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-11-at-08.08.52-300x135.jpeg 300w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-11-at-08.08.52-1024x461.jpeg 1024w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-11-at-08.08.52-768x346.jpeg 768w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-11-at-08.08.52-1536x691.jpeg 1536w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-11-at-08.08.52.jpeg 1600w\" sizes=\"100vw\" width=\"576\"></figure><p>Acara pelepasan yang terangkai dalam kegiatan Pembiasaan Pagi, berlangsung khidmat diawali dengan amanat pembina upacara. Dalam amanatnya, pembina upacara yang juga memberikan motivasi kepada seluruh siswa, untuk lebih semangat mengikuti kegiatan Pramuka.</p><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-11-at-08.08.51-300x135.jpeg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-11-at-08.08.51-300x135.jpeg 300w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-11-at-08.08.51-1024x461.jpeg 1024w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-11-at-08.08.51-768x346.jpeg 768w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-11-at-08.08.51-1536x691.jpeg 1536w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/WhatsApp-Image-2023-08-11-at-08.08.51.jpeg 1600w\" sizes=\"100vw\" width=\"578\"></figure><p><strong>TAGS: </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/pramuka/\"><strong>PRAMUKA</strong></a><strong>, </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/raimuda/\"><strong>RAIMUDA</strong></a><strong>, </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/raimuna/\"><strong>RAIMUNA</strong></a><strong>, </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/raimuna-2023/\"><strong>RAIMUNA 2023</strong></a></p><p><br>&nbsp;</p>', 'news', '2', '2023-09-07 08:56:49', '2023-09-07 08:56:49'),
(7, 2, 1, 'img/news_image/1694077281.jpg', 'Serentak Dan Gratis! Pembagian Ijazah Lulusan SMKN 5 Kab. Tangerang Tahun Ajaran 2022/2023', 'serentak-dan-gratis-pembagian-ijazah-lulusan-smkn-5-kab-tangerang-tahun-ajaran-20222023-1694077281', '<p>Pembagian Ijazah serentak itu dilakukan atas inisiatif sekolah, yang bertujuan untuk memenuhi kebutuhan siswa-siswi yang akan melanjutkan ke jenjang pendidikan selanjutnya ataupun untuk melamar pekerjaan. Serta, dalam rangka upaya menghindari hal-hal yang tidak diharapkan misalnya Ijazah hilang atau rusak yang akan menjadi beban sekolah itu sendiri.</p><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230806_111507-300x135.jpg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230806_111507-300x135.jpg 300w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230806_111507-1024x461.jpg 1024w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230806_111507-768x346.jpg 768w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230806_111507-1536x691.jpg 1536w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230806_111507-2048x922.jpg 2048w\" sizes=\"100vw\" width=\"531\"></figure><p>Kepala SMKN 5 Kabupaten Tangerang Surta Wijaya, S.Kom., M.M. mengatakan, sesuai dengan program sekolah pihaknya membagikan Ijazah kepada para siswa -siswi kelas XII tahun ajaran 2022-2023.</p><p>Tujuannya, Kata Beliau, karena kebutuhan para siswa-siswi yang akan melanjutkan ke perguruan tinggi ataupun yang akan masuk ke dunia kerja.</p><p>“Kami inisiatif bagikan Ijazah ini dengan jumlah sekitar 800 lebih Siswa-Siswi, isi dokumennya yaitu Ijasah asli, Transkip nilai, dan Rapor Pendidikan,”katanya.</p><p>Surta Wijaya, S.Kom., M.M. menyebut kegiatan pembagian ijazah serentak ini diberikan pada hari Minggu, 06 Agustus 2023, jadi, imbuhnya, kepada para siswa-siswi agar mengambil ijazahnya di waktu yang telah ditentukan oleh pihak sekolah.</p><p>Kepala Sekolah menegaskan, pembagian Ijazah ini pure atau murni tanpa dipungut biaya ataupun tidak dibebani dengan masalah keuangan. Artinya, kata beliau, tidak dipungut biaya sepeserpun. “Ini hak mereka, kami tidak membebani orang tua atau siswa dalam hal keuangan, pure murni tanpa ada biaya sepeserpun,”tegasnya.</p><figure class=\"image\"><img src=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230806_111654-scaled-e1691334700250-300x129.jpg\" alt=\"\" srcset=\"https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230806_111654-scaled-e1691334700250-300x129.jpg 300w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230806_111654-scaled-e1691334700250-1024x441.jpg 1024w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230806_111654-scaled-e1691334700250-768x331.jpg 768w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230806_111654-scaled-e1691334700250-1536x662.jpg 1536w, https://smkn5kabtangerangmauk.sch.id/wp-content/uploads/2023/08/20230806_111654-scaled-e1691334700250-2048x882.jpg 2048w\" sizes=\"100vw\" width=\"547\"></figure><p>Sementara salah seorang siswa yakni Muhammad Ananda Habibi mengaku senang dan bahagia bisa mendapatkan Ijazah ini secara gratis dari sekolah. Tidak ada biaya sepeserpun untuk pengambilan ijazah ini. Dan dirinya akan gunakan untuk keperluan Akademik maupun pekerjaan. “Alhamdulillah bersyukur bisa mendapatkan ijazah gratis ini, terima kasih untuk pihak sekolah atas inisiatifnya,”pungkasnya.</p><p><strong>TAGS: </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/ijazah/\"><strong>IJAZAH</strong></a><strong>, </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/pembagian-ijazah/\"><strong>PEMBAGIAN IJAZAH</strong></a><strong>, </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/pembagian-ijazah-gratis/\"><strong>PEMBAGIAN IJAZAH GRATIS</strong></a><strong>, </strong><a href=\"https://smkn5kabtangerangmauk.sch.id/tag/pembagian-ijazah-serentak/\"><strong>PEMBAGIAN IJAZAH SERENTAK</strong></a></p><p><br>&nbsp;</p>', 'news', '2', '2023-09-07 09:01:21', '2023-09-07 09:01:21'),
(9, 1, 13, 'img/news_image/1694077384.jpg', 'Habib Jindan', 'habib-jindan-1694167732', '<p>Ntar dulu, ni beda nih</p>', 'news', '2', '2023-09-07 09:03:04', '2023-09-08 10:08:52'),
(10, 2, 10, 'img/news_image/1694077445.png', 'Jadwal MPL Indonesia Season 12, RRQ Berjuang untuk Mempertahankan Keunggulannya', 'jadwal-mpl-indonesia-season-12-rrq-berjuang-untuk-mempertahankan-keunggulannya-1694077445', '<p>Jadwal MPL Indonesia Season 12 pada hari Kamis, 7 September 2023, akan menampilkan 2 pertandingan menarik.&nbsp;</p><p>Pertama, RRQ akan menghadapi Rebellion Zion, dan kedua, Dewa United akan bertarung melawan Bigetron Alpha.&nbsp;</p><p>Anda dapat menonton pertandingan secara langsung melalui live streaming MPL ID S12 yang tersedia di YouTube MPL Indonesia dan Mobile Legends Indonesia.&nbsp;</p><p>Saat ini, RRQ mendominasi klasemen <a href=\"https://id.wikipedia.org/wiki/MPL_Indonesia\">MPL Indonesia</a> Season 12 dengan 8 kemenangan dari 10 pertandingan yang telah mereka jalani.</p><h2>RRQ Unggul</h2><p><img src=\"https://indotimes.net/wp-content/uploads/2023/09/image-78-1024x576.png\" alt=\"RRQ Unggul\" srcset=\"https://indotimes.net/wp-content/uploads/2023/09/image-78-1024x576.png 1024w, https://indotimes.net/wp-content/uploads/2023/09/image-78-300x169.png 300w, https://indotimes.net/wp-content/uploads/2023/09/image-78-768x432.png 768w, https://indotimes.net/wp-content/uploads/2023/09/image-78-750x422.png 750w, https://indotimes.net/wp-content/uploads/2023/09/image-78-1140x641.png 1140w, https://indotimes.net/wp-content/uploads/2023/09/image-78.png 1280w\" sizes=\"100vw\" width=\"1024\"></p><p>Foto: SPIN Esport</p><p>Dalam pertandingan melawan Rebellion Zion yang akan berlangsung pada pukul 16.30 WIB, RRQ jelas merupakan tim yang lebih diunggulkan.&nbsp;</p><p>Mereka memiliki rekor yang kuat dengan 8 kemenangan, dan mereka juga telah mengalahkan Rebellion Zion dalam 2 pertemuan pertama musim ini.&nbsp;</p><p>Rebellion Zion saat ini menduduki peringkat ke-7 dalam klasemen sementara MPL S12, dengan 4 kemenangan dan 6 kekalahan.&nbsp;</p><p>Tingkat kemenangan mereka adalah 42 persen, dengan total 24 pertandingan yang telah dimainkan.</p><p>Pertandingan antara RRQ dan Rebellion Zion akan menjadi pembuka pekan ke-6 MPL Indonesia Season 12, diikuti oleh pertandingan antara Dewa United dan Bigetron Alpha yang akan dimulai pada pukul 19.00 WIB.&nbsp;</p><p>Semua pertandingan ini akan diselenggarakan di MPL Arena, Jakarta Barat.</p><p>Jadi, jangan lewatkan aksi seru dalam MPL Indonesia Season 12 Week 6 hari ini.&nbsp;</p><p>RRQ akan berusaha mempertahankan posisinya di puncak klasemen, sementara tim-tim lain akan berjuang keras untuk meraih kemenangan yang berarti.&nbsp;</p><h2>Jadwal MPL Indonesia Season 12 Week 6</h2><p><img src=\"https://indotimes.net/wp-content/uploads/2023/09/image-80-1024x768.png\" alt=\"Jadwal MPL Indonesia Season 12 Week 6\" srcset=\"https://indotimes.net/wp-content/uploads/2023/09/image-80-1024x768.png 1024w, https://indotimes.net/wp-content/uploads/2023/09/image-80-300x225.png 300w, https://indotimes.net/wp-content/uploads/2023/09/image-80-768x576.png 768w, https://indotimes.net/wp-content/uploads/2023/09/image-80-750x563.png 750w, https://indotimes.net/wp-content/uploads/2023/09/image-80-1140x855.png 1140w, https://indotimes.net/wp-content/uploads/2023/09/image-80.png 1200w\" sizes=\"100vw\" width=\"1024\"></p><p>Foto: Blog Vidio</p><p>Dalam jadwal pertandingan pembuka MPL Indonesia Season 12 Week 6, RRQ yang berada di puncak klasemen akan berusaha mempertahankan dominasinya melawan <a href=\"https://indotimes.net/sport/rebellion-esport/\">Rebellion Zion</a>.&nbsp;</p><p>Tim RRQ juga dikenal memiliki komposisi roster yang sangat kuat.&nbsp;</p><p>Mereka memiliki pemain seperti Andre Banana Raymond Putra (EXP Lane), Ferdiansyah Ferxxic Kamaruddin (Jungler), Deden Muhammad Clayyy Nurhasan (Mid Lane), Schevenko Skylar David Tendean (Gold Lane), dan Naomi Min Ko (Roamer).&nbsp;</p><p>Dalam pertarungan melawan Rebellion, Clayyy adalah pemain yang patut diperhatikan karena memiliki rata-rata KDA tertinggi kedua di MPL Indonesia Season 12, yaitu 7,5 KDA.&nbsp;</p><p>Ia hanya kalah dari ONIC Sanz (Mid Lane) yang memiliki KDA tertinggi dengan rata-rata 9,4 KDA.</p><p>Sementara itu, Rebellion Zion, yang berada di posisi terbawah dalam klasemen MPL ID S12, akan berusaha bangkit. Namun, mengalahkan RRQ bukanlah tugas yang mudah.&nbsp;</p><p>Mereka mengandalkan pemain-pemain seperti David SwayLow Sihaloho (Mid Lane), Dhannya Posa HaizzAm0r Hoputra (Gold Lane), Karsten Karss William (EXP Lane), Vincent Frandica Vincentt Suwandhi (Jungler), dan Zulfikar Audtzy (Roamer).&nbsp;</p><p>Meskipun belum menunjukkan performa terbaik, mereka berharap bisa bangkit setelah istirahat dua pekan di MPL Indonesia Season 12.</p><p>Pertandingan kedua di MPL Arena hari ini akan mempertemukan Dewa United dengan Bigetron Alpha, dimulai pukul 19.00 WIB.&nbsp;</p><p>Pertandingan ini diharapkan akan berjalan ketat karena kedua tim memiliki komposisi roster yang seimbang.&nbsp;</p><p>Namun, tantangan yang dihadapi oleh keduanya adalah ketergantungan yang relatif besar pada performa satu pemain kunci.&nbsp;</p><p>Dewa United mengandalkan Gold Lane mereka, Watt Supriadi Dwi Putra, sementara Bigetron Alpha bergantung pada Calvin Vynnn, yang bermain sebagai Mid Lane.&nbsp;</p><p>Meskipun tidak selalu menjadi pemain terbaik saat tim mereka menang, Watt dan Vynnn memiliki dampak yang signifikan pada performa tim.&nbsp;</p><p>Bahkan, ketika Bigetron Alpha mewakili Indonesia di IESF 2023, kemenangan mereka atas Filipina dalam game pertama babak final didorong oleh performa mengesankan Vynnn.&nbsp;</p><p>Namun, setelah Vynnn diredam oleh pemain Filipina, tim Bigetron Alpha mengalami kesulitan dan kalah dalam tiga game berturut-turut dalam waktu singkat.&nbsp;</p><p>Oleh karena itu, performa Watt dan Vynnn diharapkan akan menjadi penentu dalam pertarungan Dewa United vs Bigetron Alpha di MPL Indonesia Season 12 Week 6 malam ini.</p><p><strong>Tags:</strong> <a href=\"https://indotimes.net/tag/jadwal-mpl-indonesia-season-12/\">Jadwal MPL Indonesia Season 12</a><a href=\"https://indotimes.net/tag/mpl-indonesia-season-12/\">MPL Indonesia Season 12</a></p>', 'news', '2', '2023-09-07 09:04:05', '2023-09-07 09:04:05'),
(11, 1, 13, 'img/news_image/1694077489.png', 'Gus Samsudin', 'gus-samsudin-1694414964', '<p>Hooh Tenan 👍</p>', 'news', '2', '2023-09-07 09:04:49', '2023-09-11 06:49:24'),
(12, 13, 14, 'img/news_image/1694413493.webp', 'Kilas Balik Kasus Brigadir J, Alasan Hasil Lie Detector Ferdy Sambo Cs Tak Diungkap ke Publik', 'kilas-balik-kasus-brigadir-j-alasan-hasil-lie-detector-ferdy-sambo-cs-tak-diungkap-ke-publik-1694413493', '<p><strong>LENGKONG, AYOBANDUNG.COM</strong> -- Terungkap mengapa hasil <a href=\"https://www.ayobandung.com/tag/lie-detector\">lie detector</a> <a href=\"https://www.ayobandung.com/tag/ferdy-sambo\">Ferdy Sambo</a> cs tidak diungkap ke publik untuk <a href=\"https://www.ayobandung.com/tag/kilas-balik\">kilas balik</a> <a href=\"https://www.ayobandung.com/tag/kasus-brigadir-j\">kasus Brigadir J</a>.</p><p><a href=\"https://www.ayobandung.com/tag/kasus-brigadir-j\">Kasus Brigadir J</a> yang melibatkan <a href=\"https://www.ayobandung.com/tag/ferdy-sambo\">Ferdy Sambo</a> cs sebagai terdakwa pembunuuhan berencana kini sudah selesai.</p><p><a href=\"https://www.ayobandung.com/tag/ferdy-sambo\">Ferdy Sambo</a> cs kini sudah mendekam di balik jeruji besi dan mendapatkan hukuman yang sudah disahkan.</p><p><strong>Baca Juga: </strong><a href=\"https://www.ayobandung.com/umum/pr-796336479/saksi-ahli-bharada-e-albert-aries-ungkap-hasil-lie-detector-jadi-alat-bukti-sah-ini-penjelasan-lengkapnya\"><strong>Saksi Ahli Bharada E, Albert Aries Ungkap Hasil Lie Detector Jadi Alat Bukti Sah! ini Penjelasan Lengkapnya</strong></a></p><p>Namun, beberapa waktu lalu terdapat perubahan hukuman bagi <a href=\"https://www.ayobandung.com/tag/ferdy-sambo\">Ferdy Sambo</a> cs kecuali Bharada E yang mendapatkan diskon.</p><p>&nbsp;</p><p>Diskon hukuman yang paling menjadi sorotan adalah hukuman <a href=\"https://www.ayobandung.com/tag/ferdy-sambo\">Ferdy Sambo</a> yang awalnya dihukum mati kini menjadi penjara seumur hidup.</p><p>Hal it menuai pro dan kontra bagi masyarakat tentunya, karena Mahkamah Agung (MA) menerima kasasi dari para terdakwa.</p><p>Meski begitu, mari <a href=\"https://www.ayobandung.com/tag/kilas-balik\">kilas balik</a> mengenai <a href=\"https://www.ayobandung.com/tag/kasus-brigadir-j\">kasus Brigadir J</a> ini mengenai hasil tes alat pendeteksi kebohongan atau <a href=\"https://www.ayobandung.com/tag/lie-detector\">lie detector</a> para terdakwa.</p><p><strong>Baca Juga: </strong><a href=\"https://www.ayobandung.com/umum/7910042998/ferdy-sambo-diduga-diberi-perlakuan-khusus-di-lapas-salemba-ditjen-pas-kemenkumham-angkat-bicara\"><strong>Ferdy Sambo Diduga Diberi Perlakuan Khusus di Lapas Salemba, Ditjen Pas Kemenkumham Angkat Bicara</strong></a></p><p>Tercatat tanggal 8 September 2022 lalu, para terdakwa menjalani tes kejujuran dengan alat pendeteksi kebohongan atau <a href=\"https://www.ayobandung.com/tag/lie-detector\">lie detector</a>.</p><p>Namun ada yang menjadi pertanyaan mengapa hasilnya tidak diungkapkan ke publik.</p><p>&nbsp;</p><p>Hal itu mengundang pertanyaan bagi sebagian pihak mengapa hasilnya tidak diungkap ke khalayak umum.</p><p>Mengenai hal tersebut, Kadiv Humas Polri, Irjen Dedi Prasetyo mengatakan alasan mengapa tidak diungkapnya hasil <a href=\"https://www.ayobandung.com/tag/lie-detector\">lie detector</a> tersebut.</p>', 'news', '2', '2023-09-11 06:24:53', '2023-09-11 06:24:53'),
(13, 165, 12, 'img/post/1694413990.jpeg', 'Banjir', 'banjir-1694413990', '<p>jggigigi</p>', 'post', '2', '2023-09-11 06:33:10', '2023-09-11 06:34:11'),
(14, 110, 14, NULL, 'anjay👍', 'anjay-1694414836', '<p>test</p>', 'post', '2', '2023-09-11 06:47:16', '2023-09-11 06:47:48'),
(15, 13, 14, NULL, '✔', '-1694415126', '<p>test</p>', 'post', '2', '2023-09-11 06:52:06', '2023-09-11 06:52:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `lesson_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `class_id` bigint UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule_presences`
--

CREATE TABLE `schedule_presences` (
  `id` bigint UNSIGNED NOT NULL,
  `class_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `schedule_id` bigint UNSIGNED NOT NULL,
  `presence_date` date NOT NULL,
  `status` enum('hadir','sakit','izin','alpa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `school_years`
--

CREATE TABLE `school_years` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_year` year NOT NULL,
  `end_year` year NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `logo_path` text COLLATE utf8mb4_unicode_ci,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headmaster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `logo_path`, `school_name`, `headmaster`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, NULL, 'SMKN 5 Kab. Tangerang', 'Surta Wijaya, S.Kom. M.M', 'contact@smkn5kabtangerang.sch.id', '(021) 59330830', 'Jln. IR. Sutami KM.1,2 Desa. Mauk Barat, Kec. Mauk Tangerang Banten', '2023-09-07 08:24:58', '2023-09-07 08:24:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `student_presences`
--

CREATE TABLE `student_presences` (
  `id` bigint UNSIGNED NOT NULL,
  `class_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `presence_date` date NOT NULL,
  `status` enum('hadir','sakit','izin','alpa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `student_presences`
--

INSERT INTO `student_presences` (`id`, `class_id`, `user_id`, `presence_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 52, 87, '2023-09-10', 'hadir', '2023-09-10 15:05:47', '2023-09-10 15:05:47'),
(2, 52, 88, '2023-09-10', 'hadir', '2023-09-10 15:05:47', '2023-09-10 15:05:47'),
(3, 52, 87, '2023-09-11', 'sakit', '2023-09-11 06:20:23', '2023-09-11 06:40:52'),
(4, 52, 88, '2023-09-11', 'izin', '2023-09-11 06:20:23', '2023-09-11 06:40:52'),
(5, 52, 89, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(6, 52, 90, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(7, 52, 91, '2023-09-11', 'izin', '2023-09-11 06:20:23', '2023-09-11 06:45:47'),
(8, 52, 92, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:39:24'),
(9, 52, 93, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(10, 52, 94, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(11, 52, 95, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(12, 52, 96, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(13, 52, 97, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(14, 52, 98, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(15, 52, 99, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(16, 52, 100, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(17, 52, 101, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(18, 52, 102, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(19, 52, 103, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(20, 52, 104, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(21, 52, 105, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(22, 52, 106, '2023-09-11', 'izin', '2023-09-11 06:20:23', '2023-09-11 06:40:52'),
(23, 52, 107, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(24, 52, 108, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(25, 52, 109, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(26, 52, 110, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(27, 52, 111, '2023-09-11', 'sakit', '2023-09-11 06:20:23', '2023-09-11 06:40:52'),
(28, 52, 112, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(29, 52, 113, '2023-09-11', 'hadir', '2023-09-11 06:20:23', '2023-09-11 06:20:23'),
(30, 52, 114, '2023-09-11', 'hadir', '2023-09-11 06:20:24', '2023-09-11 06:20:24'),
(31, 52, 115, '2023-09-11', 'hadir', '2023-09-11 06:20:24', '2023-09-11 06:20:24'),
(32, 52, 116, '2023-09-11', 'hadir', '2023-09-11 06:20:24', '2023-09-11 06:20:24'),
(33, 52, 117, '2023-09-11', 'hadir', '2023-09-11 06:20:24', '2023-09-11 06:20:24'),
(34, 52, 118, '2023-09-11', 'hadir', '2023-09-11 06:20:24', '2023-09-11 06:20:24'),
(35, 52, 119, '2023-09-11', 'hadir', '2023-09-11 06:20:24', '2023-09-11 06:20:24'),
(36, 52, 120, '2023-09-11', 'hadir', '2023-09-11 06:20:24', '2023-09-11 06:20:24'),
(37, 52, 121, '2023-09-11', 'hadir', '2023-09-11 06:20:24', '2023-09-11 06:20:24'),
(38, 52, 122, '2023-09-11', 'hadir', '2023-09-11 06:20:24', '2023-09-11 06:20:24'),
(39, 52, 123, '2023-09-11', 'alpa', '2023-09-11 06:20:24', '2023-09-11 06:40:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_comments`
--

CREATE TABLE `sub_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `comment_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_messages`
--

CREATE TABLE `sub_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `message_id` bigint UNSIGNED NOT NULL,
  `sender_id` bigint UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sub_messages`
--

INSERT INTO `sub_messages` (`id`, `message_id`, `sender_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 2, 13, 'hallo', '2023-09-11 06:31:07', '2023-09-11 06:31:07'),
(2, 3, 166, 'oke', '2023-09-11 06:53:00', '2023-09-11 06:53:00'),
(3, 3, 13, 'haii', '2023-09-11 06:54:20', '2023-09-11 06:54:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `class_id` bigint UNSIGNED DEFAULT NULL,
  `student_id` bigint UNSIGNED DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y',
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `role` enum('admin','guru','siswa','ortu') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'siswa',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `class_id`, `student_id`, `parent_id`, `photo`, `nis`, `nik`, `name`, `email`, `password`, `remember_token`, `gender`, `phone`, `address`, `place_of_birth`, `date_of_birth`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin Rifki', 'rifki@gmail.com', '$2y$10$TQhuQbSnZddGQ83/A7Qqsuw00.QyAahbhTwxKYolOrehQ466Gu/ai', NULL, 'L', NULL, NULL, NULL, NULL, 'admin', 1, '2023-09-07 08:24:58', '2023-09-07 08:24:58'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin Lala', 'lala@gmail.com', '$2y$10$ABNd9NrLqENXt/SZVjH3AekWepWSxXzKvSsa.ovfsssRPdZCGshuG', NULL, 'P', NULL, NULL, NULL, NULL, 'admin', 1, '2023-09-07 08:24:58', '2023-09-07 08:24:58'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin Anggi', 'anggi@gmail.com', '$2y$10$4IRAl9HjVnvBK/Z8gYolPOjdwQbeRKZQlhETFk65E4Ihb3J9UsEIi', NULL, 'P', NULL, NULL, NULL, NULL, 'admin', 1, '2023-09-07 08:24:58', '2023-09-07 08:24:58'),
(4, NULL, NULL, NULL, NULL, NULL, '8846770671130092', 'Rian Aryani, S.Pd.', 'rianaryani@gmail.com', '$2y$10$Y/GWRslvb3FVB0FLvhBgVuvJmk9dkC5Az4tO8HXdT7KW/Ir9OwsM6', NULL, 'L', '080230463663', 'Dk. Sunaryo No. 552, Parepare 45581, Kaltara', 'Bekasi', '1975-05-27', 'guru', 1, '2023-09-07 08:33:46', '2023-09-07 08:33:46'),
(6, NULL, NULL, NULL, NULL, NULL, '1462769670130093', 'Rezki Muhammad Saputra, S.Pd.', 'rezkimhmdsptra@gmail.com', '$2y$10$kWMQLsWeMdFaIuTyebaqK.RJgJLDFOsWZRG3fMNXGR2hnq5dlgWFS', NULL, 'L', '084364774075', 'Jln. Bakit  No. 648, Surabaya 83351, Kalbar', 'Bau-Bau', '1998-06-12', 'guru', 1, '2023-09-07 08:37:47', '2023-09-07 08:37:47'),
(7, NULL, NULL, NULL, NULL, NULL, '9433764665131502', 'Andi Pratama, S. Pd.', 'andipratama@gmail.com', '$2y$10$Tfy/.tkjuW/NnoXiYxXx7O0Y3oZbKdwjGbn3UJuP2RR..JCA7YNhK', NULL, 'L', '082668537526', 'Dk. Baya Kali Bungur No. 559, Jayapura 52507, Kaltim', 'Salatiga', '1991-11-03', 'guru', 1, '2023-09-07 08:38:30', '2023-09-07 08:38:30'),
(8, NULL, NULL, NULL, NULL, NULL, '3861772673130092', 'Dedy Suardi, S.Pd.', 'dedysuardi@gmail.com', '$2y$10$q89nHtJ9RXA/sEuqxFVYK.QqEZES7hjWSLPUlDuhp8J2/GXzKePWe', NULL, 'L', '085799206667', 'Jln. Bakti No. 77, Sungai Penuh 13002, Pabar', 'Sungai Penuh', '1997-06-18', 'guru', 1, '2023-09-07 08:39:41', '2023-09-07 08:39:41'),
(9, NULL, NULL, NULL, NULL, NULL, '0562770671130053', 'Syahrul Erlando, S.Pd.I.', 'syahrul@gmail.com', '$2y$10$uz10UO6hQ0PZRkAijCnBQ.AJkj5UAZEUYzzynD5Y048QOrUlQJYoy', NULL, 'L', '080599804276', 'Ds. Rajawali No. 567, Langsa 71139, Riau', 'Tidore Kepulauan', '1983-07-04', 'guru', 1, '2023-09-07 08:40:29', '2023-09-07 08:40:29'),
(10, NULL, NULL, NULL, NULL, NULL, '4945765666210102', 'Megawati, S. Pd.', 'megawati@gmail.com', '$2y$10$b.bwAtFisjUI3NOUFL8Cd.WokF.TKe/95eYItQeKULLucU/ubZZ8C', NULL, 'P', '086752124577', 'Ki. Pahlawan No. 25, Kotamobagu 30768, Pabar', 'Tanjung Pinang', '1986-05-19', 'guru', 1, '2023-09-07 08:41:09', '2023-09-07 08:41:09'),
(11, NULL, NULL, NULL, NULL, NULL, '9153759660300063', 'Mas\'aniyah, S. Kom.', 'masaniyah@gmail.com', '$2y$10$jNaqDjaGqcPfefvTt35A0epslya/O7852iuVTg5/msPiU0ilmhWN6', NULL, 'P', '082440804621', 'Kpg. Yosodipuro No. 98, Administrasi Jakarta Selatan 96706, Kaltim', 'Surabaya', '1993-12-12', 'guru', 1, '2023-09-07 08:41:52', '2023-09-07 08:44:50'),
(12, NULL, NULL, NULL, NULL, NULL, '2252773674130013', 'Titi Puji Lestari, S. Kom.', 'titipuji@gmail.com', '$2y$10$vLY1jfWxe87jbsec6ZKmi.jlO6jFZBBdQzMJ5iDkNVJqr5Zb6vzVu', NULL, 'P', '082209000651', 'Dk. Flores No. 793, Gorontalo 75631, Jateng', 'Bau-Bau', '1982-04-11', 'guru', 1, '2023-09-07 08:42:57', '2023-09-07 08:43:30'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', 'admin@gmail.com', '$2y$10$1fUmXzXBZtzpbZXhWDS3P.rha1wqPZZJ2iYjqBjNU1VFv35Z4q1Li', NULL, 'L', NULL, NULL, NULL, NULL, 'admin', 1, '2023-09-07 08:43:03', '2023-09-07 08:43:03'),
(14, NULL, NULL, NULL, NULL, NULL, '146276967013009', 'Roymawan, S.Kom.', 'roymawan@gmail.com', '$2y$10$piCV6E77LrgLTgKSCZvfkuNb/uBiOBeFF0zZAAYXU0oOjWZXDD53y', NULL, 'L', '080185565329', 'Ds. Pasir Koja No. 846, Subulussalam 48071, Jambi', 'Samarinda', '1977-01-01', 'guru', 1, '2023-09-07 08:48:04', '2023-09-07 08:48:04'),
(15, NULL, NULL, NULL, NULL, NULL, '1538760662300052', 'Herlina Ekawati,  S. Kom.', 'herlinaeka@gmail.com', '$2y$10$XchZIa0Tz53D3NTmjFderOE2JGLTNI2XMCkOQMpl0bnRuFA2GCJOq', NULL, 'P', '084752311219', 'Jr. R.E. Martadinata No. 114, Banjarmasin 86569, Jatim', 'Bima', '1974-01-15', 'guru', 1, '2023-09-07 08:48:58', '2023-09-07 08:49:34'),
(16, NULL, NULL, NULL, NULL, NULL, '5238750652130103', 'Rohidah, S. E.', 'rohidah@gmail.com', '$2y$10$OGY5UsBfgXciD6W/EK8xwe3PchbZggXwTYtiErpUAaKM5OQh9fKpG', NULL, 'P', '089527737406', 'Psr. Villa No. 32, Tarakan 55547, Banten', 'Jayapura', '1981-03-25', 'guru', 1, '2023-09-07 08:49:43', '2023-09-07 08:49:43'),
(17, NULL, NULL, NULL, NULL, NULL, '2037767668230293', 'Senja Anisah, S.Kom.', 'senjaanisah@gmail.com', '$2y$10$x5PzPsP3lnbDF6H6.0hpwOWVG3wLILCpZQJw0GObMQGYN.4sVw9Pq', NULL, 'P', '087199071813', 'Gg. Jend. A. Yani No. 960, Bontang 59790, Banten', 'Pekanbaru', '1986-08-08', 'guru', 1, '2023-09-07 08:50:24', '2023-09-07 08:50:24'),
(18, NULL, NULL, NULL, NULL, NULL, '2346754656300053', 'Fitriyah, S.Ag.', 'fitriyah@gmail.com', '$2y$10$dSvaqu6AcVKAM4/VKMd.sejyHYbargYKfXWt3GpPFCAdbr0Ys6Awe', NULL, 'P', '085554952414', 'Ds. Gardujati No. 927, Sungai Penuh 80398, Malut', 'Jambi', '1974-06-04', 'guru', 1, '2023-09-07 08:51:31', '2023-09-07 08:51:31'),
(19, NULL, NULL, NULL, NULL, NULL, '2559776677230002', 'Denita Febrianti Sudrajat, S.Pd.', 'denitafbrianti@gmail.com', '$2y$10$lL6ZSd4Y2JjhCPz3Cd2f8.b26Ce38J1qSsH7X4g51DEb7OYVNSFKG', NULL, 'P', '080087066245', 'Psr. Ters. Buah Batu No. 605, Probolinggo 27161, Kaltim', 'Mataram', '1975-12-12', 'guru', 1, '2023-09-07 08:53:51', '2023-09-07 08:53:51'),
(20, NULL, NULL, NULL, NULL, NULL, '197401092007011008', 'Aziz, S.Pd.', 'aziz@gmail.com', '$2y$10$MsyUgnM52a5fzjItQ761bOjN0PeXPaiZh6pqV3bvyf2VYK3fkMpca', NULL, 'L', '087422409419', 'Ki. Imam No. 817, Lubuklinggau 45493, Papua', 'Banda Aceh', '1997-12-22', 'guru', 1, '2023-09-07 08:54:09', '2023-09-07 08:54:09'),
(21, NULL, NULL, NULL, NULL, NULL, '199304182022212019', 'Pujayanti, S.Pd.', 'pujayanti@gmail.com', '$2y$10$aAHMhMxUfRvaOoQoIgqle.PtalR1TmWukVEQbZAZgGzVGZPn.cgGe', NULL, 'P', '080074067795', 'Jln. Flora No. 883, Palangka Raya 28057, Aceh', 'Jambi', '1985-02-19', 'guru', 1, '2023-09-07 08:54:39', '2023-09-07 08:54:39'),
(22, NULL, NULL, NULL, NULL, NULL, '9653772673230170', 'Praditya Iriani Safitri, S.E.', 'pradityairiani@gmail.com', '$2y$10$DNiBchfc3efg/gQXT6HSeOdsamiFTCezFlmQig7ZRtkHLD4Gp0bva', NULL, 'P', '084447738017', 'Jln. Wahidin Sudirohusodo No. 675, Sungai Penuh 65472, Jabar', 'Banjarmasin', '1985-05-23', 'guru', 1, '2023-09-07 08:55:50', '2023-09-07 08:55:50'),
(23, NULL, NULL, NULL, NULL, NULL, '197112192014062001', 'Nur Budi Hutami, S.E., M.Pd.', 'nurbudihutami@gmail.com', '$2y$10$jgt7DIUZ045CjFPO7FZxEexCXpW2CGV9VBF0oHTcmbcHqm/f84V7W', NULL, 'P', '081399678201', 'Ki. Hayam Wuruk No. 118, Bukittinggi 89103, Maluku', 'Bengkulu', '1988-02-15', 'guru', 1, '2023-09-07 08:56:40', '2023-09-08 09:32:16'),
(24, NULL, NULL, NULL, NULL, NULL, '4042771672130153', 'Sajali, S.Kom.', 'sajali@gmail.com', '$2y$10$F4KQaTFJxymx.xIlUHM2WuKco3d6G4Ipl09PVhKwCqydicQTNUaKO', NULL, 'L', '081377599379', 'Ki. Haji No. 668, Padang 99036, Gorontalo', 'Pariaman', '1979-03-20', 'guru', 1, '2023-09-07 08:56:59', '2023-09-07 08:56:59'),
(25, NULL, NULL, NULL, NULL, NULL, '0446757658130103', 'Emar Diana Novianti, S.E.', 'emardiana@gmail.com', '$2y$10$Yl4evk4FSb1.EU8kAunSFuLds9Ehn4prke2.XgU/Zx1VCJ89HFZde', NULL, 'P', '083249313053', 'Dk. Achmad Yani No. 272, Tidore Kepulauan 64085, Malut', 'Payakumbuh', '1983-05-09', 'guru', 1, '2023-09-07 08:57:26', '2023-09-08 09:33:04'),
(26, NULL, NULL, NULL, NULL, NULL, '6960764665210122', 'Dina Ulmi Yuningsih, S.E.', 'dinaulmi@gmail.com', '$2y$10$Adt3tsAJhD9vnZUZSOSD5uI4NJCGF5fx9ygDwWIO7iMQyVzjaN1O2', NULL, 'P', '081977761478', 'Jr. Cikutra Barat No. 377, Banjar 42936, Sulbar', 'Payakumbuh', '1979-03-06', 'guru', 1, '2023-09-07 08:57:37', '2023-09-07 08:57:37'),
(27, NULL, NULL, NULL, NULL, NULL, '6751769670110002', 'Hayu Eko Saputro, S.Pd.', 'hayueko@gmail.com', '$2y$10$cBQSUPIHuOmzA8eBvq./f.ebqCpVcFuxrXS/zQPN.HKhtORWvHrHC', NULL, 'L', '085128796353', 'Jln. Madrasah No. 730, Gunungsitoli 35087, Kalteng', 'Binjai', '1981-11-10', 'guru', 1, '2023-09-07 08:58:23', '2023-09-07 08:58:23'),
(28, NULL, NULL, NULL, NULL, NULL, '5051769670130093', 'M. Nur Rahman Soleh, S. Ak.', 'nurahmansoleh@gmail.com', '$2y$10$GwWIci8vCGX/f7ggH04G2OM6uVJmt5/CGhrMJloehI95Wuho/3zKS', NULL, 'L', '087870447169', 'Psr. Jakarta No. 554, Magelang 33397, Maluku', 'Metro', '1994-04-23', 'guru', 1, '2023-09-07 08:58:28', '2023-09-08 09:33:59'),
(29, NULL, NULL, NULL, NULL, NULL, '4749772673130032', 'Siti Sumiati, M.Pd.', 'sitisumiati@gmail.com', '$2y$10$Y3TZWW1f444NpQdL4bFk6O382m6ftPetkzn6zPTagsP/DsKFkMHFe', NULL, 'P', '087594110318', 'Jr. R.M. Said No. 876, Bengkulu 89687, Maluku', 'Batu', '1990-08-25', 'guru', 1, '2023-09-07 08:59:02', '2023-09-07 08:59:02'),
(30, NULL, NULL, NULL, NULL, NULL, '9762763664300092', 'Rochmayatin Nupus, S.Pd.I.', 'rochmayatin@gmail.com', '$2y$10$cQNHo5WDNOSJpo.m2Q17u.rCm7.s/F9JAMoN6NIxd/M7BA6QXu4cy', NULL, 'P', '087376288526', 'Gg. Suniaraja No. 489, Banjarbaru 78275, Aceh', 'Sabang', '1988-07-13', 'guru', 1, '2023-09-07 08:59:47', '2023-09-07 08:59:47'),
(31, NULL, NULL, NULL, NULL, NULL, '7438771672130052', 'Sujarko Andi Prayitno, S. Pd.', 'sujarko@gmail.com', '$2y$10$UGv.8P1dsszIsZaark855OOBOpBgs7K3OCzfqxal3T5EdAlP3nCVa', NULL, 'L', '080410348707', 'Jln. Nakula No. 301, Jayapura 48490, Aceh', 'Sorong', '1996-09-17', 'guru', 1, '2023-09-07 09:00:36', '2023-09-07 09:00:36'),
(32, NULL, NULL, NULL, NULL, NULL, '6445770671130073', 'Cholifah Fairus, S. Pd.', 'cholifah@gmail.com', '$2y$10$NrGmLgxU.kG6DQSuy1P/T.JSh6F1unM7eNAhPjibzExWvMjucWvwe', NULL, 'P', '082544836074', 'Ki. Hang No. 383, Kupang 71756, Sulut', 'Administrasi Jakarta Pusat', '1975-08-21', 'guru', 1, '2023-09-07 09:01:13', '2023-09-07 09:01:13'),
(33, NULL, NULL, NULL, NULL, NULL, '1552765666210102', 'Ratminah, S.Pd.', 'ratminah@gmail.com', '$2y$10$ot/odjS6R1B92.5PeBCkS.xUWgRtI69REB11hQCd4eNKAfZwDVbz2', NULL, 'P', '085227754537', 'Gg. Bagis Utama No. 812, Tual 89760, Sumsel', 'Solok', '1978-11-07', 'guru', 1, '2023-09-07 09:01:43', '2023-09-07 09:01:43'),
(34, NULL, NULL, NULL, NULL, NULL, '0148761662110053', 'Agus Tri Wahyono, S.T.', 'agustri@gmail.com', '$2y$10$.dTH4pezyCOlk/havS3hXen8gtq7tSwR6LsLggTzDd3tovppw8HNO', NULL, 'L', '089819939598', 'Dk. Pintu Besar Selatan No. 675, Bima 37450, NTB', 'Tomohon', '1987-12-17', 'guru', 1, '2023-09-07 09:02:25', '2023-09-07 09:02:25'),
(35, NULL, NULL, NULL, NULL, NULL, '1244766667200003', 'Sefto Fakhri Triwibowo, S.Pd.', 'seftofakhri@gmail.com', '$2y$10$cv9niG2SwEgxxUm7KMdUrek6/tBx2UKuaQZ3bj3xjM/HE6ui6Rtxm', NULL, 'L', '086987623630', 'Gg. Ters. Kiaracondong No. 503, Kediri 99626, Riau', 'Bima', '1979-07-18', 'guru', 1, '2023-09-07 09:03:07', '2023-09-07 09:03:07'),
(36, NULL, NULL, NULL, NULL, NULL, '0656754657200012', 'Nuryadi, S. T.', 'nuryadi@gmail.com', '$2y$10$5wGXMjBDsKQl2AUGOp.k..NQ9VHMygbkQK79.LHIHlADecqvVNF02', NULL, 'L', '088244549836', 'Dk. Astana Anyar No. 998, Gunungsitoli 12535, Kalsel', 'Manado', '1990-09-25', 'guru', 1, '2023-09-07 09:03:42', '2023-09-07 09:03:42'),
(37, NULL, NULL, NULL, NULL, NULL, '8161774675130063', 'Muhammad Imron Agus S., S.T.', 'muhamadimron@gmail.com', '$2y$10$v.T.t2PCMrTtrAh8l2XdxeAaBXNaOXP8o6CZKyrBM6Wpd6ol9Hnc.', NULL, 'L', '087411931302', 'Ds. Barat No. 394, Padang 76459, Jambi', 'Bengkulu', '1978-10-25', 'guru', 1, '2023-09-07 09:04:25', '2023-09-07 09:04:25'),
(38, NULL, NULL, NULL, NULL, NULL, '856075660200002', 'Sadeli, S.Pd.', 'sadeli@gmail.com', '$2y$10$fLqCv3Qqa0WgBwLWGqdd/eQcx7tgXN7kJhQNUCeekAip/.QicUrlW', NULL, 'L', '083283459774', 'Kpg. Salatiga No. 85, Tidore Kepulauan 99584, Kalsel', 'Tual', '1997-10-05', 'guru', 1, '2023-09-07 09:05:02', '2023-09-07 09:05:02'),
(39, NULL, NULL, NULL, NULL, NULL, '6441774675130073', 'Muhamad Erlangga, S.T.', 'mhmderlangga@gmail.com', '$2y$10$b7QRqEdcRtWKHQtnuWWiCOaQNbbFRqc56EgE.ucNw1YZcCoUqzn.2', NULL, 'L', '087208390512', 'Jln. Suharso No. 259, Binjai 49598, Kaltim', 'Sungai Penuh', '1998-06-22', 'guru', 1, '2023-09-07 09:06:10', '2023-09-07 09:06:10'),
(40, NULL, NULL, NULL, NULL, NULL, '367105010170001', 'Muthia Widyaningsih', 'muthiawidyaningsih@gmail.com', '$2y$10$js56zr3aZTmCjrSpyEAnmOBcIaZEmqtgBet70pPu57PEE6PvhvYLO', NULL, 'P', '081585325948', 'Jln. Madiun No. 815, Malang 27742, Sulsel', 'Bandung', '1989-02-14', 'guru', 1, '2023-09-07 09:06:41', '2023-09-08 09:39:20'),
(41, NULL, NULL, NULL, NULL, NULL, '6450764666120003', 'Muhaemin Wasalam, S.Pd.', 'muhaemin@gmail.com', '$2y$10$6wLbQPNYeeYaIGpC0gYK8.O6izKFfVq.R0n790Z3Yi3MwzzWnGXLK', NULL, 'L', '085680517628', 'Jr. Suniaraja No. 36, Pekalongan 41062, Sumut', 'Kupang', '1980-01-12', 'guru', 1, '2023-09-07 09:07:00', '2023-09-07 09:07:00'),
(42, NULL, NULL, NULL, NULL, NULL, '2948769669300002', 'Kartika Zakiyah Darajat, S.Pd.', 'kartikazakiyah@gmail.com', '$2y$10$I/iwhIbn2U9l4GhVYv9MM.yxh4Aof9xCc7ivaurtiZqwAWQOP68By', NULL, 'P', '081010490498', 'Ds. Nangka No. 19, Binjai 36835, Sulut', 'Tanjung Pinang', '1995-11-30', 'guru', 1, '2023-09-07 09:07:39', '2023-09-07 09:07:39'),
(43, NULL, NULL, NULL, NULL, NULL, '367105010170043', 'Iyan Hadi Permana', 'Iyan@gmail.com', '$2y$10$cdecVwhwQneZMSguQhjiye0oHSWU18B.NfXwSBEfndVJD1TVoNVE.', NULL, 'L', '089517670644', 'Psr. Laksamana No. 852, Gorontalo 28332, Riau', 'Mojokerto', '1989-07-24', 'guru', 1, '2023-09-07 09:07:44', '2023-09-08 09:38:09'),
(44, NULL, NULL, NULL, NULL, NULL, '7654768669130160', 'Iman Mustopa, S.Kom.', 'imanmustopa@gmail.com', '$2y$10$ec6G1FhPhXEqmOQxRLTWSu/ETsO7sciME8psCm8QqtDM2WCnFPPRe', NULL, 'L', '088054489186', 'Kpg. Bayam No. 48, Tasikmalaya 94447, Jateng', 'Bandar Lampung', '1985-11-15', 'guru', 1, '2023-09-07 09:09:04', '2023-09-07 09:09:04'),
(45, NULL, NULL, NULL, NULL, NULL, '367105010170006', 'Adam Kurniahan Susanto, S. I.Kom.', 'adamkurniahan@gmail.com', '$2y$10$oCcMmm2yT5P1Yw980akXw.swBo9pJnYdFRquLTpCMqCjnUBfuzdbO', NULL, 'L', '088492395187', 'Gg. Raden No. 101, Tidore Kepulauan 68301, Babel', 'Tual', '1980-07-10', 'guru', 1, '2023-09-07 09:09:43', '2023-09-08 09:10:19'),
(46, NULL, NULL, NULL, NULL, NULL, '6835746648300012', 'Ade Sunandar, S.Pd.', 'adesunandar@gmail.com', '$2y$10$31w1T.pbgtYCNOAr94jRP.gsc9BhwvsuWz.rTDvskO5jNSB11fCFm', NULL, 'L', '086600746830', 'Psr. Sunaryo No. 703, Kotamobagu 67701, Maluku', 'Tual', '1993-12-02', 'guru', 1, '2023-09-07 09:09:56', '2023-09-07 09:09:56'),
(47, NULL, NULL, NULL, NULL, NULL, '4559757658130092', 'Ilah Kholilah, S. Sos.I.', 'ilahkolilah@gmail.com', '$2y$10$s5hnFqchQNDrqW.G0xKsEOBdtkEPVHwXQGjY31to5d3lLEOWYDMNe', NULL, 'P', '081478703660', 'Ds. Raya Setiabudhi No. 128, Kupang 99733, Kalteng', 'Sorong', '1979-01-29', 'guru', 1, '2023-09-07 09:10:32', '2023-09-07 09:10:32'),
(49, NULL, NULL, NULL, NULL, NULL, '683574664830001', 'Efih Sulistiawati, S.H.', 'efihsulis@gmail.com', '$2y$10$GSfBbfU2wi.0Eq/iSwl/gOzHy22Xzpo2JKS/lNdZbzRwaPOtRcYtK', NULL, 'P', '080018913070', 'Kpg. Yos Sudarso No. 449, Batam 64311, Maluku', 'Cirebon', '1975-12-06', 'guru', 1, '2023-09-07 09:11:41', '2023-09-07 09:11:41'),
(51, NULL, NULL, NULL, NULL, NULL, '6153764665130173', 'Edi Kusyanto, S.Kom.', 'edikusyanto@gmail.com', '$2y$10$rXDBd4oM91EVTEwhwwfilOJipPqUnytibTGR40uSR5C.XPxd9ugra', NULL, 'L', '085438616965', 'Ki. Mahakam No. 16, Surabaya 33799, Sumbar', 'Bitung', '1985-02-28', 'guru', 1, '2023-09-07 09:12:24', '2023-09-07 09:12:24'),
(53, NULL, NULL, NULL, NULL, NULL, '2353773674230033', 'Kartika Dewi, S. Pd.', 'kartikadewi@gmail.com', '$2y$10$7CrZ08k6SNMREm8OYlxkzeZTB.UoxRRgPDBBofEaF6S0J0wZ2I5f6', NULL, 'P', '088503759536', 'Psr. Cikutra Timur No. 82, Gunungsitoli 88478, Sulsel', 'Bekasi', '1987-03-11', 'guru', 1, '2023-09-07 09:13:50', '2023-09-07 09:13:50'),
(54, NULL, NULL, NULL, NULL, NULL, '4851764665210142', 'Putri Meilina Siswanti, M.Pd.', 'putrimeilina@gmail.com', '$2y$10$ww9.TkRPDBXbgKeqAM6gcOeNhGMmTF7EouPyTVQxSp1RUYh1DFwHC', NULL, 'P', '088824733582', 'Ds. Ir. H. Juanda No. 513, Singkawang 38999, Gorontalo', 'Dumai', '1992-11-22', 'guru', 1, '2023-09-07 09:14:29', '2023-09-07 09:14:29'),
(55, NULL, NULL, NULL, NULL, NULL, '1575873817381', 'IDAM KHOLID', 'idamkholid@gmail.com', '$2y$10$f8wEbxcaUCgsQS6Xh1F0cehhZV9a/a1jjsKMdpcDte1LYA41qaQqa', NULL, 'L', '089687922886', 'Gg. Wahidin Sudirohusodo No. 12, Pagar Alam 44210, Aceh', 'Pagar Alam', '1997-04-21', 'guru', 1, '2023-09-07 09:14:40', '2023-09-08 09:09:12'),
(56, NULL, NULL, NULL, NULL, NULL, '6838750653200002', 'Achmad Suhartono, S.Pd.I.', 'achmadshrtno@gmail.com', '$2y$10$U6UxTN/jQtzpvnaBcc/ZmO/waR8A0d3xJOh57NkOahHWi2DU9YwOm', NULL, 'L', '084376448787', 'Gg. S. Parman No. 906, Mataram 46433, Sumut', 'Sukabumi', '1981-12-09', 'guru', 1, '2023-09-08 09:12:21', '2023-09-08 09:12:21'),
(57, NULL, NULL, NULL, NULL, NULL, '2339770671130073', 'Randy Hikmatiar, S.Tr.Akun.', 'randyhikmatiar@gmail.com', '$2y$10$nYi46IM6B5pyJ/ToIv6VgOtJXNuE6xXIs/40J5iEKGsCI8ss7cmKO', NULL, 'L', '081259703468', 'Jr. Dago No. 585, Semarang 63850, Sulbar', 'Balikpapan', '1980-10-21', 'guru', 1, '2023-09-08 09:13:04', '2023-09-08 09:13:04'),
(58, NULL, NULL, NULL, NULL, NULL, '582762664130222', 'Ita Sagita, S. Pd., M.Pd.', 'itasagita@gmail.com', '$2y$10$fnM737mPvFwzx2lS1nr5JuFvgFLn56/RiTLP0ieBo.B7vcO1KOemq', NULL, 'P', '081014241848', 'Ds. Achmad Yani No. 152, Pekanbaru 64371, Banten', 'Parepare', '1995-09-22', 'guru', 1, '2023-09-08 09:13:48', '2023-09-08 09:13:48'),
(59, NULL, NULL, NULL, NULL, NULL, '9138775676130000', 'Aang Junaedi, S.E.', 'aangjunaedi@gmail.com', '$2y$10$ZtVmrrIHUhDT8yJMVSODqeMb4Lhvjm/dm1TDHE61ZKcB5YlA.9txm', NULL, 'L', '088278551983', 'Kpg. Barat No. 626, Metro 17122, Bali', 'Makassar', '1977-03-04', 'guru', 1, '2023-09-08 09:14:26', '2023-09-08 09:14:26'),
(60, NULL, NULL, NULL, NULL, NULL, '874976866911012', 'Rian Saefulloh, S.Pd.', 'riansaefullah@gmail.com', '$2y$10$8xp4XiJIUUC4OPC80.un8OsjqmYGnMPb3cN8cjg20ATf.e1t2sp2q', NULL, 'L', '080640360615', 'Jln. Reksoninten No. 876, Palopo 19196, Babel', 'Madiun', '1977-12-04', 'guru', 1, '2023-09-08 09:15:02', '2023-09-08 09:15:02'),
(61, NULL, NULL, NULL, NULL, NULL, '5547767668210042', 'Chaerunisa, M. Pd.', 'chaerunisa@gmail.com', '$2y$10$nwzptRT0MZE8Wu7eNKyboOgfWyA05LiXOW7X5kwaFn4ycu5YbsTw.', NULL, 'P', '081527174395', 'Psr. Perintis Kemerdekaan No. 914, Bandar Lampung 84956, Kaltim', 'Pasuruan', '1989-01-25', 'guru', 1, '2023-09-08 09:15:44', '2023-09-08 09:15:44'),
(62, NULL, NULL, NULL, NULL, NULL, '1943767668130142', 'Ade Wahyudi, S.Pd.', 'adewahyudi@gmail.com', '$2y$10$tFRelCdYAdGC4UGljkQYnOa8fg15AR12SbClvNdieONPCs4lgO66G', NULL, 'L', '082284470948', 'Ki. Sugiono No. 729, Surabaya 99569, Maluku', 'Ternate', '1995-09-16', 'guru', 1, '2023-09-08 09:16:23', '2023-09-08 09:16:23'),
(63, NULL, NULL, NULL, NULL, NULL, '199107052022211011', 'Iklas Budiman, S.Pi.', 'iklasbudiman@gmail.com', '$2y$10$7uBTbfymW3JXsG.esQvz6O67notpaIJiOz7DqA5SBqzwuvxwdBSrK', NULL, 'L', '081164925865', 'Jr. Kali No. 849, Sungai Penuh 97585, Jateng', 'Pekanbaru', '1996-10-25', 'guru', 1, '2023-09-08 09:16:57', '2023-09-08 09:16:57'),
(64, NULL, NULL, NULL, NULL, NULL, '5739759659200002', 'Eko Ayatulloh Khomaeni, S. T.', 'ekoayatullah@gmail.com', '$2y$10$4Fwa8wpnRJlBq2EeVLS/y.UPLkLtHfHjYY4b8.5dAyusi1JixaNz6', NULL, 'L', '081563055409', 'Psr. Wahid No. 225, Lhokseumawe 62576, Jateng', 'Tual', '1996-10-25', 'guru', 1, '2023-09-08 09:17:29', '2023-09-08 09:17:29'),
(65, NULL, NULL, NULL, NULL, NULL, '6934765666300002', 'Inge Karolina P.D., M.Pd.', 'ingekarolina@gmail.com', '$2y$10$Lc6uJBiXAnfJpTsREz5cce/w4O0Borx56sbjDuR8xCloa1aQ/SLvu', NULL, 'P', '082066953091', 'Jr. Orang No. 76, Sukabumi 56699, Jatim', 'Banda Aceh', '1976-09-16', 'guru', 1, '2023-09-08 09:18:07', '2023-09-08 09:18:07'),
(66, NULL, NULL, NULL, NULL, NULL, '2936765667300002', 'Siti Aisyah, M.Pd.', 'sitiaisyah@gmail.com', '$2y$10$Kx.UGlc3ZzmjBV.kUn4wxOU0hWIyA1ptJgDXZM.l.epGAC7y6O0IW', NULL, 'P', '087824688492', 'Psr. Sampangan No. 729, Manado 85619, Sultra', 'Tanjungbalai', '1981-06-14', 'guru', 1, '2023-09-08 09:18:45', '2023-09-08 09:18:45'),
(67, NULL, NULL, NULL, NULL, NULL, '8936763664110052', 'Jayanudin, S. Pd.', 'jayanudin@gmail.com', '$2y$10$.91.f1sXqpUYbOO.6uDpUOVAlakjzBDMdjwxrqeVpG60UvhyM1PxG', NULL, 'L', '086105521466', 'Psr. Juanda No. 119, Banjarmasin 98203, Kaltim', 'Singkawang', '1983-06-30', 'guru', 1, '2023-09-08 09:19:28', '2023-09-08 09:19:28'),
(68, NULL, NULL, NULL, NULL, NULL, '8139766667130173', 'Masdukin Nukhri, S.H.I.', 'masdukinukhri@gmail.com', '$2y$10$O8RiqFJNVn8lVlZkeGUW2undvyMPRKqyAg0in2rqVULEAvUAC/DAi', NULL, 'L', '085911414627', 'Dk. Bakti No. 348, Bukittinggi 49010, Bengkulu', 'Palu', '1994-04-20', 'guru', 1, '2023-09-08 09:20:04', '2023-09-08 09:20:04'),
(69, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin Luqman', 'luqman@gmail.com', '$2y$10$I/FvqE3uSZNe7qP7OpLATekgrHsXUltSuu8kocTwGUmD/ZC9/tyr.', NULL, 'L', NULL, NULL, NULL, NULL, 'admin', 1, '2023-09-08 09:20:06', '2023-09-08 09:20:06'),
(70, NULL, NULL, NULL, NULL, NULL, '1644771672130062', 'Muhammad Rosyadi, S.T.', 'mhmdrosyadi@gmail.com', '$2y$10$T.nKGgAUYKa6aEPfYF/2mONFiPDcmQLNOuJJcLlCA4YwClGBLJHN2', NULL, 'L', '087383240966', 'Kpg. Hasanuddin No. 47, Banjar 43167, Sumut', 'Magelang', '1992-03-02', 'guru', 1, '2023-09-08 09:20:40', '2023-09-08 09:20:40'),
(71, NULL, NULL, NULL, NULL, NULL, '9346750651200003', 'Daryanto, S.T.', 'daryanto@gmail.com', '$2y$10$QlIgeTUq1Yz7eDIdQ6gdRu5wlaPfAsiMo2COmnGWQkyop.2qaF/Lu', NULL, 'L', '087927917060', 'Jln. Rumah Sakit No. 478, Palangka Raya 93949, Sumut', 'Banjarbaru', '1992-05-30', 'guru', 1, '2023-09-08 09:21:41', '2023-09-08 09:21:41'),
(72, NULL, NULL, NULL, NULL, NULL, '0842763664210222', 'Maylan Syabani, S.Pd.', 'maylansyabani@gmail.com', '$2y$10$N2opvrVmoJF0FshZ9noyy.9lAkj5bhXNpGFNT/XN5FqfyDMLqqMfi', NULL, 'P', '080484851712', 'Jln. Nakula No. 334, Bandung 78588, Kepri', 'Yogyakarta', '1995-04-18', 'guru', 1, '2023-09-08 09:22:14', '2023-09-08 09:22:14'),
(73, NULL, NULL, NULL, NULL, NULL, '8237759660200023', 'Eman Suherman, S. Kom.', 'emansuherman@gmail.com', '$2y$10$Ix.yFyQTOtiagcqJkI.6dOJARNtKv81FSP0/n04L0ObkhfS1n1p5K', NULL, 'L', '085502541781', 'Jln. Bata Putih No. 643, Ambon 54708, Babel', 'Kendari', '1979-07-03', 'guru', 1, '2023-09-08 09:22:47', '2023-09-08 09:22:47'),
(74, NULL, NULL, NULL, NULL, NULL, '9653765666130192', 'Hari Muhlia, S.Kom.', 'harimuhlia@gmail.com', '$2y$10$867BkKxyRwq2I4t4q2nVReeHDcnYtT2S9yLXHUhzTzyGRM/qyyXT2', NULL, 'L', '088339548467', 'Ki. Zamrud No. 91, Sukabumi 81768, Sumut', 'Madiun', '1989-06-12', 'guru', 1, '2023-09-08 09:23:20', '2023-09-08 09:23:20'),
(75, NULL, NULL, NULL, NULL, NULL, '8936762664200042', 'Miftahul Ulum, S.Psi.I.', 'miftahulum@gmail.com', '$2y$10$YiB.D1zNtSSUr5XXa99Bo.bd8.fgOfgg5cp9xclrBuMOJ2XH5NFZW', NULL, 'L', '086118252540', 'Psr. Bakit  No. 921, Tangerang Selatan 26645, Maluku', 'Madiun', '1974-07-25', 'guru', 1, '2023-09-08 09:24:03', '2023-09-08 09:24:03'),
(76, NULL, NULL, NULL, NULL, NULL, '2139762663200053', 'Ahmad Fatoni, S. Kom.', 'ahmadfatoni@gmail.com', '$2y$10$AEm0i0HEWIXWwEqyaAhRp.yQ1dIUFhP9JIeIupHZ/G8qasg7vZZv2', NULL, 'L', '081061252482', 'Dk. Aceh No. 346, Administrasi Jakarta Barat 13256, Kalsel', 'Bitung', '1978-03-18', 'guru', 1, '2023-09-08 09:24:37', '2023-09-08 09:24:37'),
(77, NULL, NULL, NULL, NULL, NULL, '198202042010012028', 'Lidya Arlini, S.Kom.', 'lidyaarlini@gmail.com', '$2y$10$FSegAAF8DX4uQXw27EwSxeqoHMviN.Z.2zAKTVuPavaj69CaqCdHi', NULL, 'P', '085243367966', 'Jln. Nangka No. 77, Tangerang 63263, Riau', 'Balikpapan', '1974-10-19', 'guru', 1, '2023-09-08 09:25:11', '2023-09-08 09:25:11'),
(78, NULL, NULL, NULL, NULL, NULL, '775476971130072', 'Ahmad Muhaimin, S.Kom.', 'ahmadmuhaimin@gmail.com', '$2y$10$QG3P8MXUREQA200sYu.T7eVaRMUdM0.GStZdS/nyh7.jH/EabVAle', NULL, 'L', '089318661879', 'Jr. Salak No. 79, Magelang 57280, DKI', 'Tangerang', '1986-07-26', 'guru', 1, '2023-09-08 09:25:40', '2023-09-08 09:25:40'),
(79, NULL, NULL, NULL, NULL, NULL, '367105010170002', 'Faisal Habib, S.Kom.', 'faisalhabib@gmail.com', '$2y$10$L4s0Uw6G8usYMjmLYxVswOBxXA/54Qucus03QvQJp7rD1i5lyexFS', NULL, 'L', '085172253451', 'Psr. Dipatiukur No. 914, Cimahi 90384, Banten', 'Pekalongan', '1977-12-10', 'guru', 1, '2023-09-08 09:26:15', '2023-09-11 06:20:11'),
(80, NULL, NULL, NULL, NULL, NULL, '6636770671130082', 'Maulana Yusup, S. Kom.', 'maulanayusup@gmail.com', '$2y$10$YNtMwrNIBjS9UD/2yN.GIOMP7vcmExMoVmFH9c8gETt.phlIZdSJe', NULL, 'L', '087619289582', 'Psr. Basuki No. 115, Tegal 86101, Sultra', 'Depok', '1976-02-15', 'guru', 1, '2023-09-08 09:26:43', '2023-09-08 09:26:43'),
(81, NULL, NULL, NULL, NULL, NULL, '4451766667130063', 'Andika Wijayanto, S.Pd.', 'andikawijayanto@gmail.com', '$2y$10$F2q3WpvoX7VySD6.XoLbZe1HBujJc3bstZU7.wNQ/2ZS5VmTyARQO', NULL, 'L', '084468115323', 'Gg. Peta No. 756, Kendari 37463, Kalsel', 'Sabang', '1986-12-13', 'guru', 1, '2023-09-08 09:27:22', '2023-09-08 09:27:22'),
(82, NULL, NULL, NULL, NULL, NULL, '2642757659200002', 'Abdul Malik, S.Pd.', 'abdulmalik@gmail.com', '$2y$10$sqtlDnq/BXy17RoPlaAasO0BhiBhzJ4xMV7/KaDgeSee5UMXCVDHW', NULL, 'L', '089197542323', 'Jln. R.M. Said No. 403, Bandar Lampung 82002, Kalbar', 'Tegal', '1990-04-17', 'guru', 1, '2023-09-08 09:27:56', '2023-09-08 09:27:56'),
(83, NULL, NULL, NULL, NULL, NULL, '367105010170095', 'Tati Yulianti, S.Sos.I.,M.Pd.', 'tatiyulianti@gmai.com', '$2y$10$jXF0OzgWUwbdVfDgPkDYkujKIrjYtvv761axhSBLnQibf5ciHqKLK', NULL, 'P', '080824683001', 'Gg. Moch. Toha No. 311, Bima 71553, Sulteng', 'Tanjungbalai', '1998-09-03', 'guru', 1, '2023-09-08 09:41:09', '2023-09-08 09:41:09'),
(84, NULL, NULL, NULL, NULL, NULL, '367105010170081', 'Siska Erni', 'siskaerni@gmail.com', '$2y$10$B51t1a0YQATWF1U6X/IBv.Mn2OpLgSj8JmVdZp16UXZIktiwZuwEe', NULL, 'P', '085362281104', 'Jr. Basuki No. 101, Administrasi Jakarta Timur 22278, DKI', 'Palu', '1984-08-07', 'guru', 1, '2023-09-08 10:11:14', '2023-09-10 14:50:21'),
(85, NULL, NULL, NULL, NULL, NULL, '367105010170077', 'Saleha, S. Pd.', 'saleha@gmail.com', '$2y$10$AAmPLTSXMg/fQK9yEksjzuTw9m68x0cbk5nbptC9u6oNThOv4expu', NULL, 'P', '081986407666', 'Kpg. Krakatau No. 220, Ambon 25665, Jatim', 'Sawahlunto', '1982-10-09', 'guru', 1, '2023-09-10 14:16:47', '2023-09-10 14:16:47'),
(86, NULL, NULL, NULL, NULL, NULL, '367105010170091', 'Wawan Erwana, S. T.', 'wawanerwana@gmail.com', '$2y$10$mbIVPHJ7eS6H8xLs7.ucE.EmcyDF.8aSa9XHHuopnQOTynY8S91cy', NULL, 'L', '086482081101', 'Psr. Reksoninten No. 653, Banda Aceh 10028, Bengkulu', 'Tasikmalaya', '1978-03-31', 'guru', 1, '2023-09-10 14:18:22', '2023-09-10 14:18:22'),
(87, 52, NULL, NULL, NULL, '212210305', NULL, 'ACHMAD NURHIDAYAT SETIAWAN', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUMAHAN SUKAHARJA ASRI BLOK F2A NO.59, RT/RW. 010/004, DESA SUKAHARJA KECAMATAN SINDANG JAYA', 'LAMPUNG', '2005-12-07', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(88, 52, NULL, NULL, NULL, '212210306', NULL, 'AHMAD HABBYSAPUTRA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'KP. GUNUNG SARI, RT/RW. 006/002, DESA GUNUNG SARI KECAMATAN MAUK', 'TANGERANG', '2006-07-04', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(89, 52, NULL, NULL, NULL, '212210307', NULL, 'AKROM FADHIL MUSTOFA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'TAMAN RAYA RAJEG J-9/16, RT/RW. 011/07, DESA MEKARSARI KECAMATAN RAJEG', 'TANGERANG', '2006-07-18', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(90, 52, NULL, NULL, NULL, '212210308', NULL, 'ALFIAN KHANZA AZZAKY', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUM SUKAHARJA ASRI BLOK C14, RT/RW. 010/004, DESA SUKAHARJA KECAMATAN SINDANG JAYA', 'TANGERANG', '2006-03-21', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(91, 52, NULL, 166, NULL, '212210309', NULL, 'ALVIN RAYMOD OMPU SUNGGU', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUMAHAN TAMAN RAYA RAJEG,BLOK C5 NO:30, RT/RW. 03/05, DESA MEKARSARI KECAMATAN RAJEG', 'TANGERANG', '2006-03-05', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-11 06:44:08'),
(92, 52, NULL, 165, NULL, '212210310', NULL, 'ANGGI NUR AZIZAH', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'PERUM TAMAN RAYA RAJEG BLOK C-8/34, RT/RW. 010/005, DESA MEKARSARI KECAMATAN RAJEG', 'MAGETAN', '2006-03-18', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-11 06:19:47'),
(93, 52, NULL, NULL, NULL, '212210311', NULL, 'ARYA DWI KUSUMA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'KP. KOSAMBI, RT/RW. 18/4, DESA KOSAMBI KECAMATAN SUKADIRI', 'TANGERANG', '2005-09-08', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(94, 52, NULL, NULL, NULL, '212210312', NULL, 'ASHIS CAHYA MAULANA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'MUTIARA PURI HARMONI, BLOCK J8 NO.2, RT/RW. 13/14, DESA SUKAMANAH KECAMATAN RAJEG', 'WONOGIRI', '2005-05-08', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(95, 52, NULL, NULL, NULL, '212210313', NULL, 'DWIKO DANY RANANTA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'TAMAN RAYA RAJEG,BLOK K5 NO.23, RT/RW. 08/07, DESA MEKARSARI KECAMATAN RAJEG', 'TANGERANG', '2005-09-19', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(96, 52, NULL, NULL, NULL, '212210314', NULL, 'EKSE SAHRA RAMADHANI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'JL. ANGGREK PERUM TAMAN RAYA RAJEG BLOK L7 NO.16, RT/RW. 16/07, DESA MEKARSARI KECAMATAN RAJEG', 'JAKARTA', '2006-10-16', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(97, 52, NULL, NULL, NULL, '212210315', NULL, 'FARHAN SEPTIANSYAH EFENDI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUM RAJEG ASRI BLOK B9 NO 21, RT/RW. 06/01, DESA RAJEG KECAMATAN RAJEG', 'LAMPUNG', '2005-09-24', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(98, 52, NULL, NULL, NULL, '212210316', NULL, 'FARIL SEPTIAN NUGRAHA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUMAHAN BUMI ANUGERAH SEJAHTERA BLOK:A NO 22, RT/RW. 01/06, DESA RAJEG KECAMATAN RAJEG', 'JAKARTA', '2005-09-01', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(99, 52, NULL, NULL, NULL, '212210317', NULL, 'FERRY RAMDANI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'SUKADIRI, RT/RW. 008/005, DESA SUKADIRI KECAMATAN SUKADIRI', 'TANGERANG', '2005-06-07', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(100, 52, NULL, NULL, NULL, '212210318', NULL, 'FITRA HIDAYATUL FADILA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'KP. PASAR KEMIS, RT/RW. 003/007, DESA SINDANG PANON KECAMATAN SINDANG JAYA', 'JAKARTA', '2006-01-05', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(101, 52, NULL, NULL, NULL, '212210319', NULL, 'GALANG DESTA PUTRA PRATAMA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUM GRIYA LESTARI BLOK A-3/10, RT/RW. 006/009, DESA SINDANG PANON KECAMATAN SINDANG AJAY', 'TANGERANG', '2005-12-28', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(102, 52, NULL, NULL, NULL, '212210320', NULL, 'IBRAHIM NAWA AL FARIZI RANGKUTI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'JALAN TAMAN NURI BLOK NB 5 NO 28, RT/RW. 04/015, DESA SINDANG SARI KECAMATAN PASAR KEMIS', 'TANGERANG', '2006-03-04', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(103, 52, NULL, NULL, NULL, '212210321', NULL, 'JOHANES GERYATY PUTRA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUM PURI PASUNDAN 2 BLOK G NO. 02, RT/RW. 009/005, DESA PANGADEGAN KECAMATAN PASAR KEMIS', 'TANGERANG', '2006-01-06', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(104, 52, NULL, NULL, NULL, '212210322', NULL, 'LUQMAN SYAHRENO', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUM TAMAN WALET BLOK GWC 8 NO.19, RT/RW. 006/013, DESA SINDANG SARI KECAMATAN PASARKEMIS', 'TANGERANG', '2006-08-08', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(105, 52, NULL, NULL, NULL, '212210323', NULL, 'MOCHAMAD YASRIL AKBAR', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'KP TANJAKAN, RT/RW. 008/003, DESA TANJAKAN KECAMATAN RAJEG', 'TANGERANG', '2005-07-27', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(106, 52, NULL, NULL, NULL, '212210324', NULL, 'MUHAMAD IQBAL FEBRIANUR LAKI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'JL. TONGKOL RAYA NO.35, RT/RW. 001/009, DESA KARAWACI BARU KECAMATAN KARAWACI', 'TANGERANG', '2006-02-02', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(107, 52, NULL, NULL, NULL, '212210325', NULL, 'MUHAMAD RIZKY AKBAR RAMADAN', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'SUKA BAKTI, RT/RW. 07/04, DESA LEMBANG SARI KECAMATAN RAJEG', 'TANGERANG', '2006-09-30', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(108, 52, NULL, NULL, NULL, '212210326', NULL, 'MUHAMMAD FAREL AL GHOZALI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUM VILLA PERMATA BLOCK C5 NO 17, RT/RW. 002/018, DESA SINDANGSRI KECAMATAN PASAR KEMIS', 'TEGAL', '2006-05-16', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(109, 52, NULL, NULL, NULL, '212210327', NULL, 'MUHAMMAD JEFFERINO MAURIZ', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'KP.JUNGKEL, RT/RW. 011/005, DESA TANJAKAN MEKAR KECAMATAN RAJEG', 'TANGERANG', '2006-12-26', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(110, 52, NULL, NULL, NULL, '212210328', NULL, 'MUHAMMAD RIFKI NURDIANSYAH', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUMAHAN TANJAKAN INDAH BLOK L 19 NO 25, RT/RW. 2/9, DESA TANJAKAN KECAMATAN RAJEG', 'TANGERANG', '2006-05-11', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(111, 52, NULL, NULL, NULL, '212210329', NULL, 'MUHAMMAD RIZKY FACHRUDIN', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'KP.CILONGOK RT.003/003 SUKAMANTRI, RT/RW. 03/03, DESA SUKAMANTRI KECAMATAN PASARKEMIS', 'TANGERANG', '2006-01-01', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(112, 52, NULL, NULL, NULL, '212210330', NULL, 'NABILA NURDIANA MAWARIZKI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'PERUM BUMI INDAH TAHAP 2 BLOK FE NO.33, RT/RW. 006/010, DESA SUKAMANTRI KECAMATAN PASARKEMIS', 'TANGERANG', '2006-04-01', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(113, 52, NULL, NULL, NULL, '212210332', NULL, 'NADIA WINDIYANI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'KP BERUSAHA, RT/RW. 05/01, DESA BANYUASIH KECAMATAN MAUK', 'TANGERANG', '2006-03-14', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(114, 52, NULL, NULL, NULL, '212210333', NULL, 'NADIYATUL SOLEHA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'KP. BEBULAK, RT/RW. 004/002, DESA MARGA MULYA KECAMATAN MAUK', 'TANGERANG', '2006-06-23', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(115, 52, NULL, NULL, NULL, '212210334', NULL, 'NAYLA EKA ARIYANA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'PERUM GRIYA RAJEG LESTARI BLOK I NO 6, RT/RW. 18/06, DESA TANJAKAN KECAMATAN RAJEG', 'BOJONEGORO', '2006-01-06', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(116, 52, NULL, NULL, NULL, '212210335', NULL, 'RAMA CAHYA SAPUTRA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'RAJEG,PERUM TAMAN RAYA RAJEG, BLOK E8/11, RT/RW. 11/05, DESA MEKARSARI KECAMATAN RAJEG', 'TANGERANG', '2005-10-30', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(117, 52, NULL, NULL, NULL, '212210336', NULL, 'RANI SAIDAH', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'JLN BARITO 3 F 45 NO 25 PONDOK INDAH KUTABUMI, RT/RW. 005/010, DESA KUTABUMI KECAMATAN PASAR KEMIS', 'TANGERANG', '2006-07-30', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(118, 52, NULL, NULL, NULL, '212210337', NULL, 'RATNA KOMALA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'KP. ONOM, RT/RW. 004/002, DESA BADAK ANOM KECAMATAN SINDANG JAYA', 'TANGERANG', '2006-09-19', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(119, 52, NULL, NULL, NULL, '212210338', NULL, 'RINI DWI ANINGSIH', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'KP. KRONJO, RT/RW. 003/002, DESA KRONJO KECAMATAN KRONJO', 'TANGERANG', '2006-01-08', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(120, 52, NULL, NULL, NULL, '212210339', NULL, 'RIZKY SAMIE PRATAMA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'NUANSA MEKARSARI 2 BLOK I-06 NO 11, RT/RW. 01/05, DESA RAJEG MULYA KECAMATAN RAJEG', 'TANGERANG', '2005-12-24', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(121, 52, NULL, NULL, NULL, '212210340', NULL, 'ROSIANA AFIFA AZZAHRA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'KP. KARANG ANYAR, RT/RW. 001/001, DESA KARANG ANYAR KECAMATAN KEMIRI', 'TANGERANG', '2006-12-13', 'siswa', 1, '2023-09-10 14:28:29', '2023-09-10 14:28:29'),
(122, 52, NULL, NULL, NULL, '212210341', NULL, 'SONYA RANADA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'PERUM RAJEG ASRI BLOK C 13 NO. 03 RT/RW. 002/001 RAJEG,TANGERANG-BANTEN, RT/RW. 002/001, DESA RAJEG KECAMATAN RAJEG', 'TANGERANG', '2005-12-30', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(123, 52, NULL, NULL, NULL, '212210342', NULL, 'ZARUL GUSTIAN ASSHEVA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUMAHAN GRAND SUTERA RAJEG BLOK D5/11, RT/RW. 01/08, DESA TANJAKAN KECAMATAN RAJEG', 'CIREBON', '2006-05-29', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(124, 53, NULL, NULL, NULL, '212210343', NULL, 'ADE HUSWATUN HASANAH', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'KP.CIPANIIS, RT/RW. 014/004, DESA RANCA BANGO KECAMATAN RAJEG', 'TANGERANG', '2006-01-16', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(125, 53, NULL, NULL, NULL, '212210344', NULL, 'ADELIA INARTI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'PERUMAHAN MUTIARA PURI HARMONI BLOK D5/20, RT/RW. 03/14, DESA SUKAMANAH KECAMATAN RAJEG', 'TANGERANG', '2005-08-25', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(126, 53, NULL, NULL, NULL, '212210345', NULL, 'ADLAN ALI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUMAHAN GRAND SUTERA RAJEG BLOK E3/5, RT/RW. 02/08, DESA TANJAKAN INDAH KECAMATAN RAJEG', 'SUKABUMI', '2006-04-27', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(127, 53, NULL, NULL, NULL, '212210346', NULL, 'AHMAD FEBRIANSYAH', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'KP. GELAM, RT/RW. 6/2, DESA KUTAJAYA KECAMATAN PASAR KEMIS', 'TANGERANG', '2006-02-24', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(128, 53, NULL, NULL, NULL, '212210347', NULL, 'ANGGI NOVIYANTI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'KP.BEBULAK DESA MARGAMULYA, RT/RW. 005/002, DESA MARGAMULYA KECAMATAN MAUK', 'TANGERANG', '2004-11-23', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(129, 53, NULL, NULL, NULL, '212210348', NULL, 'ANUGRAH FAJAR ADI PUTRA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'KP.BUARAN, RT/RW. 015/004, DESA TEGAL KUNIR KIDUL KECAMATAN MAUK', 'TANGERANG', '2006-04-18', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(130, 53, NULL, NULL, NULL, '212210350', NULL, 'BUNGA MAWAR PUTRI GEA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'TAMAN RAJEG MULYA BLOK L NO 1, RT/RW. 04/04, DESA RAJEG MULYA KECAMATAN RAJEG', 'TANGERANG', '2006-04-22', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(131, 53, NULL, NULL, NULL, '212210351', NULL, 'CHOLIA ANANDA PUTRI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'KP. SUKADIRI, RT/RW. 010/004, DESA PATRAMANGGALA KECAMATAN KEMIRI', 'TANGERANG', '2006-01-10', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(132, 53, NULL, NULL, NULL, '212210352', NULL, 'DAMIAN BAGAS WICAKSONO', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUM GRIYA LESTARI PERMAI C3 NO8, RT/RW. 01/09, DESA SINDANG PANON KECAMATAN SINDANG JAYA', 'TANGERANG', '2006-06-18', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(133, 53, NULL, NULL, NULL, '212210353', NULL, 'DENNY', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'KP. TANJUNG KAIT, RT/RW. 009/002, DESA TANJUNG ANOM KECAMATAN MAUK', 'TANGERANG', '2006-05-09', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(134, 53, NULL, NULL, NULL, '212210354', NULL, 'DEVA ADITIA PUTRA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'KP SAWAH MAUK TIMUR, RT/RW. 012/005, DESA MAUK TIMUR KECAMATAN MAUK', 'TANGERANG', '2004-12-16', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(135, 53, NULL, NULL, NULL, '212210355', NULL, 'ERZA HARLAN MAULANA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUM TAMAN WALET BLOK GWC 1 NO 32, RT/RW. 006/013, DESA SINDANG SARI KECAMATAN PASAR KEMIS', 'TANGERANG', '2006-03-23', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(136, 53, NULL, NULL, NULL, '212210356', NULL, 'EVAN MAULANA SAPUTRA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'GRIYA SANGIANG MAS BLOK A.81 NO.17, RT/RW. 001/009, DESA GEBANG RAYA KECAMATAN PERIUK', 'BOYOLALI', '2006-06-06', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(137, 53, NULL, NULL, NULL, '212210357', NULL, 'FARSYA HAIKAL LESMANA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUMAHAN GRAND SUTERA RAJEG BLOK B2 NO. 27, RT/RW. 03/08, DESA TANJAKAN KECAMATAN RAJEG', 'LEBAK', '2005-05-20', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(138, 53, NULL, NULL, NULL, '212210358', NULL, 'FIKRON MAULANA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'KP. KRONJO PAMONG, RT/RW. 01/01, DESA KRONJO KECAMATAN KRONJO', 'TANGERANG', '2003-02-07', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(139, 53, NULL, NULL, NULL, '212210359', NULL, 'FITRI ERNAWATI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'KP SUKADIRI, RT/RW. 009/004, DESA PATRAMANGGALA KECAMATAN KEMIRI', 'TANGERANG', '2006-10-30', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(140, 53, NULL, NULL, NULL, '212210360', NULL, 'GERALDI BUDHIARTO MANALU', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'TAMAN RAYA RAJEG I-4/28, RT/RW. 016/005, DESA MEKARSARI KECAMATAN RAJEG', 'TANGERANG', '2006-05-29', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(141, 53, NULL, NULL, NULL, '212210361', NULL, 'HAIKAL ARRAHMAN', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUM TAMAN RAYA RAJEG.BLOK I 28 NO.04, RT/RW. 21/05, DESA MEKASARI KECAMATAN RAJEG', 'DEPOK', '2006-03-09', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(142, 53, NULL, NULL, NULL, '212210362', NULL, 'JEREMY FRITS EMORAN', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUM TAMAN NURI BLOK NB 6 NO.58, RT/RW. 004/015, DESA SINDANGSARI KECAMATAN PASAR KEMIS', 'JAKARTA', '2006-05-26', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(143, 53, NULL, NULL, NULL, '212210363', NULL, 'KALSUM', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'KP. CINAMPRAK, RT/RW. 011/003, DESA MAUK BARAT KECAMATAN MAUK', 'TANGERANG', '2005-11-05', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(144, 53, NULL, NULL, NULL, '212210364', NULL, 'KEMALA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'KO.LONTAR, RT/RW. 003/001, DESA LONTAR KECAMATAN KEMIRI', 'TANGERANG', '2006-10-31', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(145, 53, NULL, NULL, NULL, '212210365', NULL, 'MAHMUT IBRAHIM', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'JL. KURMA V E-9/8 BUMI ASRI, RT/RW. 8/17, DESA KUTABUMI KECAMATAN PASAR KEMIS', 'TANGERANG', '2006-06-25', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(146, 53, NULL, NULL, NULL, '212210366', NULL, 'MAIA ROSLIAWATI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'PERUM GRIYA ASRI SUKAMANAH 2 BLOK A7 NO.19, RT/RW. 16/12, DESA SUKAMANAH KECAMATAN RAJEG', 'TANGERANG', '2006-05-09', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(147, 53, NULL, NULL, NULL, '212210349', NULL, 'MAULIDIA SAPUTRI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'KP.PANGONGAN, RT/RW. 1/1, DESA PANONGAN KECAMATAN KEC.PANONGAN', 'TANGERANG', '2006-04-08', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(148, 53, NULL, NULL, NULL, '212210367', NULL, 'MUHAMAD FADIL', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'KP KEBON BARU, RT/RW. 003/003, DESA TANJUNG ANOM KECAMATAN MAUK', 'TANGERANG', '2005-11-30', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(149, 53, NULL, NULL, NULL, '212210368', NULL, 'MUHAMAD NURGIANSAH', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUM.GRIYA ASRI SUKAMANAH 2 BLOK D10 NO.32, RT/RW. 06/12, DESA SUKAMANAH KECAMATAN RAJEG', 'JAKARTA', '2006-03-18', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(150, 53, NULL, NULL, NULL, '212210370', NULL, 'MUHAMMAD ADLY ZAMAN', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'TAMAN RAYA RAJEG BOLK L11/11, RT/RW. 17/07, DESA MEKARSARI KECAMATAN RAJEG', 'TANGERANG', '2006-03-08', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(151, 53, NULL, NULL, NULL, '212210371', NULL, 'MUHAMMAD CHAIRIL GIBRAN', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUM TAMAN WALET BLOK SA 5 NO 23, RT/RW. 04/11, DESA SINDANGSARI KECAMATAN PASAR KEMIS', 'TANGERANG', '2005-04-07', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(152, 53, NULL, NULL, NULL, '212210372', NULL, 'NABIL', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'KP.BEBULAK, RT/RW. 001/01, DESA MARGA MULYA KECAMATAN MAUK', 'TANGERANG', '2005-12-23', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(153, 53, NULL, NULL, NULL, '212210373', NULL, 'NAZWA UMAMI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'KP BERUSAHA, RT/RW. 005/001, DESA BANYU ASI KECAMATAN MAUK', 'TANGERANG', '2006-08-26', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(154, 53, NULL, NULL, NULL, '212210374', NULL, 'OKTAVIANI RAMDHANA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', NULL, 'KP.SUKADIRI, RT/RW. 09/04, DESA PATRAMANGGALA KECAMATAN KEMIRI', 'TANGERANG', '2006-10-02', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(155, 53, NULL, NULL, NULL, '212210375', NULL, 'RENALDI MARIHOT TUA MANALU', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUMAHAN TANJAKAN INDAH BLOK E10 NO 20, RT/RW. 04/07, DESA TANJAKAN KECAMATAN RAJEG', 'TANGERANG', '2006-09-19', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(156, 53, NULL, NULL, NULL, '212210376', NULL, 'RIYAN HIDAYAT SYARIPPULLOH', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'MEKARSARI, RT/RW. 19/07, DESA MEKARSARI KECAMATAN RAJEG', 'JAKARTA', '2006-07-27', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(157, 53, NULL, NULL, NULL, '212210377', NULL, 'RIZKI JAELANI', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'KP PRIUK, RT/RW. 03/04, DESA MEKARSARI KECAMATAN RAJEG', 'TANGERANG', '2004-04-20', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(158, 53, NULL, NULL, NULL, '212210378', NULL, 'ROMI SAPUTRA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'KP. PRIUK, RT/RW. 001/004, DESA MEKARSARI KECAMATAN RAJEG', 'TANGERANG', '2006-05-31', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(159, 53, NULL, NULL, NULL, '212210379', NULL, 'SUJATA RIO', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'KP.TEGAL, RT/RW. 014/005, DESA TANJAKAN KECAMATAN RAJEG', 'TANGERANG', '2006-08-11', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30');
INSERT INTO `users` (`id`, `class_id`, `student_id`, `parent_id`, `photo`, `nis`, `nik`, `name`, `email`, `password`, `remember_token`, `gender`, `phone`, `address`, `place_of_birth`, `date_of_birth`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(160, 53, NULL, NULL, NULL, '212210380', NULL, 'WILDAN ANDI WIGUNA', NULL, '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', NULL, 'PERUM RAJEG ASRI BLOK C7 NO 05, RT/RW. 04/01, DESA RAJEG KECAMATAN RAJEG', 'TANGERANG', '2006-05-01', 'siswa', 1, '2023-09-10 14:28:30', '2023-09-10 14:28:30'),
(161, NULL, NULL, NULL, NULL, NULL, '367105010170096', 'panjalu remasaski', 'panjalu@gmail.com', '$2y$10$TfGIQ/0mA4M/ywYAPn1ze.fe/r0trAEyrf80ngPQFQy9uJEwqfu7a', NULL, 'L', '081914809047', 'Jln. Dahlia No. 564, Pangkal Pinang 38495, Banten', 'Pangkal Pinang', '1980-04-24', 'guru', 1, '2023-09-10 14:33:45', '2023-09-10 14:33:45'),
(162, NULL, NULL, NULL, NULL, NULL, '367105010170034', 'idham Khalid', 'idhamkhalid@gmail.com', '$2y$10$ChPUyioKU1SfZAFHWnvoducPQcVz.j/XwzhuTNKWCu6nHvuZrmPca', NULL, 'L', '080172321096', 'Ki. Ahmad Dahlan No. 500, Pematangsiantar 39267, Jateng', 'Pekanbaru', '1987-09-04', 'guru', 1, '2023-09-10 14:36:07', '2023-09-10 14:36:55'),
(163, NULL, NULL, NULL, NULL, NULL, '3671050101700945', 'Tati Munsicha', 'tatimunsicha@gmail.com', '$2y$10$Od4acaxSNalIkSxq.s0jBOY8qbDiiFzhTyaXXtLRdgGvyYBdHjW6W', NULL, 'P', '085754906808', 'Ds. Sugiono No. 709, Cilegon 42867, Kaltara', 'Pangkal Pinang', '1974-07-07', 'guru', 1, '2023-09-10 14:48:34', '2023-09-10 14:48:34'),
(164, NULL, NULL, NULL, NULL, NULL, '3671050101700946', 'Munawati', 'munawati@gmail.com', '$2y$10$3x1Ta//Oo2BeZHAmIM4To.lKPf5iFaP6Kn5i0I3sOgL1l3BEJFIiu', NULL, 'P', '088200628506', 'Gg. Raden Saleh No. 255, Lhokseumawe 18703, Jateng', 'Bitung', '1996-09-26', 'guru', 1, '2023-09-10 14:49:18', '2023-09-10 14:49:18'),
(165, NULL, 92, NULL, NULL, NULL, '3600800910720004', 'JOKOWI', 'jokowimantul@gmail.com', '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'L', '087263729281', 'Di Solo', 'solo', '1999-09-01', 'ortu', 1, '2023-09-11 06:19:47', '2023-09-11 06:19:47'),
(166, NULL, 91, NULL, NULL, NULL, '3609516274830006', 'MAMA PINA', 'pina@gmail.com', '$2y$10$InvH9PvmKD43zJxtq5s9Auh/LM3MfkTydIdvQj0eAakB07DI5Zj5y', NULL, 'P', '089876541234', 'tamara', 'di rumah', '1999-09-09', 'ortu', 1, '2023-09-11 06:44:08', '2023-09-11 06:44:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Indeks untuk tabel `extracurriculars`
--
ALTER TABLE `extracurriculars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `extracurriculars_name_unique` (`name`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lessons_name_unique` (`name`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `messages_slug_unique` (`slug`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_lesson_id_foreign` (`lesson_id`),
  ADD KEY `schedules_user_id_foreign` (`user_id`),
  ADD KEY `schedules_class_id_foreign` (`class_id`);

--
-- Indeks untuk tabel `schedule_presences`
--
ALTER TABLE `schedule_presences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_presences_user_id_foreign` (`user_id`),
  ADD KEY `schedule_presences_schedule_id_foreign` (`schedule_id`);

--
-- Indeks untuk tabel `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_years_name_unique` (`name`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `student_presences`
--
ALTER TABLE `student_presences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_presences_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `sub_comments`
--
ALTER TABLE `sub_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_comments_comment_id_foreign` (`comment_id`),
  ADD KEY `sub_comments_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `sub_messages`
--
ALTER TABLE `sub_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_messages_message_id_foreign` (`message_id`),
  ADD KEY `sub_messages_sender_id_foreign` (`sender_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nis_unique` (`nis`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `extracurriculars`
--
ALTER TABLE `extracurriculars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `schedule_presences`
--
ALTER TABLE `schedule_presences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `student_presences`
--
ALTER TABLE `student_presences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `sub_comments`
--
ALTER TABLE `sub_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_messages`
--
ALTER TABLE `sub_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `schedule_presences`
--
ALTER TABLE `schedule_presences`
  ADD CONSTRAINT `schedule_presences_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedule_presences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `student_presences`
--
ALTER TABLE `student_presences`
  ADD CONSTRAINT `student_presences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_comments`
--
ALTER TABLE `sub_comments`
  ADD CONSTRAINT `sub_comments_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_messages`
--
ALTER TABLE `sub_messages`
  ADD CONSTRAINT `sub_messages_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2026 at 05:09 AM
-- Server version: 8.4.3
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webskripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempt_answers`
--

CREATE TABLE `attempt_answers` (
  `id` bigint UNSIGNED NOT NULL,
  `quiz_attempt_id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `option_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` bigint UNSIGNED DEFAULT NULL,
  `min_score` int NOT NULL DEFAULT '70',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `name`, `image`, `quiz_id`, `min_score`, `created_at`, `updated_at`) VALUES
(1, 'Master Data', 'badge_data.png', 1, 70, '2026-03-22 21:54:08', '2026-03-22 21:54:08'),
(2, 'Ahli Algoritma', 'badge_algo.png', 2, 70, '2026-03-22 21:54:08', '2026-03-22 21:54:08'),
(3, 'Pakar Machine Learning', 'badge_ml.png', 3, 70, '2026-03-22 21:54:08', '2026-03-22 21:54:08'),
(4, 'Computational Thinker', 'badge_ct.png', 4, 70, '2026-03-22 21:54:08', '2026-03-22 21:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materi_progress`
--

CREATE TABLE `materi_progress` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `materi_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materi_progress`
--

INSERT INTO `materi_progress` (`id`, `user_id`, `materi_key`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 1, 'data.konsep', 1, '2026-06-04 22:43:01', '2026-06-04 22:44:35'),
(2, 1, 'pendahuluan', 1, '2026-06-04 22:44:29', '2026-06-04 22:44:29'),
(3, 1, 'algoritma.konsep', 1, '2026-06-04 22:55:30', '2026-06-06 19:28:09'),
(4, 1, 'algoritma.ai', 1, '2026-06-04 22:55:35', '2026-06-06 19:28:21'),
(5, 5, 'pendahuluan', 1, '2026-06-04 22:58:26', '2026-06-04 22:58:26'),
(6, 5, 'data.konsep', 1, '2026-06-04 23:03:43', '2026-06-04 23:03:43'),
(7, 5, 'data.penting', 1, '2026-06-04 23:03:49', '2026-06-04 23:03:49'),
(8, 5, 'data.bias', 1, '2026-06-04 23:03:52', '2026-06-04 23:03:52'),
(9, 5, 'data.dataset', 1, '2026-06-04 23:03:58', '2026-06-04 23:03:58'),
(10, 5, 'algoritma.konsep', 1, '2026-06-04 23:05:36', '2026-06-05 00:02:51'),
(11, 5, 'algoritma.ai', 1, '2026-06-04 23:10:38', '2026-06-06 19:27:08'),
(12, 5, 'ml.konsep', 1, '2026-06-04 23:18:40', '2026-06-05 00:02:58'),
(13, 5, 'ml.belajar', 1, '2026-06-04 23:18:48', '2026-06-05 00:03:01'),
(14, 5, 'ml.jenis', 1, '2026-06-04 23:18:53', '2026-06-05 00:03:04'),
(15, 5, 'ml.pohon', 1, '2026-06-04 23:18:57', '2026-06-05 00:03:06'),
(16, 5, 'ct.konsep', 1, '2026-06-04 23:19:41', '2026-06-05 00:03:09'),
(17, 5, 'ct.empat', 1, '2026-06-04 23:20:08', '2026-06-05 00:03:13'),
(18, 5, 'ct.penerapan', 1, '2026-06-04 23:20:12', '2026-06-06 19:27:14'),
(19, 1, 'data.penting', 1, '2026-06-06 19:27:55', '2026-06-06 19:27:55'),
(20, 1, 'data.bias', 1, '2026-06-06 19:27:58', '2026-06-06 19:27:58'),
(21, 1, 'data.dataset', 1, '2026-06-06 19:28:02', '2026-06-06 19:28:02'),
(22, 3, 'pendahuluan', 1, '2026-06-06 19:29:10', '2026-06-06 19:29:10'),
(23, 3, 'data.konsep', 1, '2026-06-06 19:29:14', '2026-06-06 19:29:14'),
(24, 3, 'data.penting', 1, '2026-06-06 19:29:16', '2026-06-06 19:29:16'),
(25, 3, 'data.bias', 1, '2026-06-06 19:29:18', '2026-06-06 19:29:18'),
(26, 3, 'data.dataset', 1, '2026-06-06 19:29:22', '2026-06-06 19:29:22'),
(27, 3, 'algoritma.konsep', 1, '2026-06-06 19:29:27', '2026-06-06 19:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_19_064603_create_quizzes_table', 1),
(5, '2026_01_19_064644_create_questions_table', 1),
(6, '2026_01_19_064658_create_options_table', 1),
(7, '2026_01_19_064707_create_quiz_attempts_table', 1),
(8, '2026_01_19_064715_create_attempt_answers_table', 1),
(9, '2026_02_19_120028_add_kelas_to_users_table', 2),
(10, '2026_03_23_033745_create_badges_table', 3),
(11, '2026_03_23_033748_create_user_badges_table', 3),
(12, '2026_03_23_033802_create_user_points_table', 3),
(13, '2026_03_27_071602_add_question_image_to_questions_table', 4),
(14, '2026_06_05_012123_add_avatar_to_users_table', 5),
(15, '2026_06_05_025822_create_materi_progress_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `option_label` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option_label`, `option_text`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', 'Hasil akhir sistem', 0, '2026-02-19 18:45:54', '2026-05-31 03:36:24'),
(2, 1, 'B', 'Bahan utama untuk pembelajaran dan pengambilan keputusan', 1, '2026-02-19 18:45:54', '2026-05-31 03:36:24'),
(3, 1, 'C', 'Tampilan visual aplikasi', 0, '2026-02-19 18:45:54', '2026-05-31 03:36:24'),
(4, 1, 'D', 'Program utama komputer', 0, '2026-02-19 18:45:54', '2026-05-31 03:36:24'),
(5, 1, 'E', 'Perangkat keras', 0, '2026-02-19 18:45:54', '2026-05-31 03:36:24'),
(6, 2, 'A', '(1) dan (3)', 1, '2026-03-22 21:48:05', '2026-05-31 03:37:32'),
(7, 2, 'B', '(1), (2), dan (3)', 0, '2026-03-22 21:48:05', '2026-05-31 03:37:32'),
(8, 2, 'C', '(2) dan (4)', 0, '2026-03-22 21:48:05', '2026-05-31 03:37:32'),
(9, 2, 'D', '(1), (3), dan (4)', 0, '2026-03-22 21:48:05', '2026-05-31 03:37:32'),
(10, 2, 'E', 'Semua benar', 0, '2026-03-22 21:48:05', '2026-05-31 03:37:32'),
(11, 3, 'A', 'Small data', 0, '2026-03-22 21:48:19', '2026-05-31 03:38:19'),
(12, 3, 'B', 'Random data', 0, '2026-03-22 21:48:19', '2026-05-31 03:38:19'),
(13, 3, 'C', 'Big data', 1, '2026-03-22 21:48:19', '2026-05-31 03:38:19'),
(14, 3, 'D', 'Static data', 0, '2026-03-22 21:48:19', '2026-05-31 03:38:19'),
(15, 3, 'E', 'Manual data', 0, '2026-03-22 21:48:19', '2026-05-31 03:38:19'),
(16, 4, 'A', 'Tetap akurat', 0, '2026-03-22 21:48:30', '2026-05-31 03:39:11'),
(17, 4, 'B', 'Lebih cepat', 0, '2026-03-22 21:48:30', '2026-05-31 03:39:11'),
(18, 4, 'C', 'Lebih banyak', 0, '2026-03-22 21:48:30', '2026-05-31 03:39:11'),
(19, 4, 'D', 'Tidak akurat', 1, '2026-03-22 21:48:30', '2026-05-31 03:39:11'),
(20, 4, 'E', 'Tidak berubah', 0, '2026-03-22 21:48:30', '2026-05-31 03:39:11'),
(21, 5, 'A', 'Data lengkap', 0, '2026-03-22 21:48:42', '2026-05-31 03:39:49'),
(22, 5, 'B', 'Bias data', 1, '2026-03-22 21:48:42', '2026-05-31 03:39:49'),
(23, 5, 'C', 'Data valid', 0, '2026-03-22 21:48:42', '2026-05-31 03:39:49'),
(24, 5, 'D', 'Data akurat', 0, '2026-03-22 21:48:42', '2026-05-31 03:39:49'),
(25, 5, 'E', 'Data konsisten', 0, '2026-03-22 21:48:42', '2026-05-31 03:39:49'),
(26, 6, 'A', 'Label hanya diperlukan pada tahap akhir sistem kecerdasan buatan.', 0, '2026-03-22 21:48:56', '2026-05-31 03:40:35'),
(27, 6, 'B', 'Label membuat data tidak perlu diproses kembali.', 0, '2026-03-22 21:48:56', '2026-05-31 03:40:35'),
(28, 6, 'C', 'Label hanya digunakan untuk mempercepat kinerja komputer.', 0, '2026-03-22 21:48:56', '2026-05-31 03:40:35'),
(29, 6, 'D', 'Label tidak berpengaruh pada hasil pembelajaran kecerdasan buatan.', 0, '2026-03-22 21:48:56', '2026-05-31 03:40:35'),
(30, 6, 'E', 'Label membantu kecerdasan buatan memahami kategori dan makna data.', 1, '2026-03-22 21:48:56', '2026-05-31 03:40:35'),
(31, 7, 'A', 'Kecerdasan buatan pertama lebih akurat dibanding kecerdasan buatan kedua', 1, '2026-03-22 21:49:08', '2026-05-31 03:41:28'),
(32, 7, 'B', 'Kedua kecerdasan buatan menghasilkan hasil yang sama', 0, '2026-03-22 21:49:08', '2026-05-31 03:41:28'),
(33, 7, 'C', 'Kecerdasan buatan kedua lebih baik', 0, '2026-03-22 21:49:08', '2026-05-31 03:41:28'),
(34, 7, 'D', 'Data tidak mempengaruhi hasil', 0, '2026-03-22 21:49:08', '2026-05-31 03:41:28'),
(35, 7, 'E', 'Keduanya tidak berfungsi', 0, '2026-03-22 21:49:08', '2026-05-31 03:41:28'),
(36, 8, 'A', 'Algoritma kecerdasan buatan sepenuhnya mengalami kegagalan', 0, '2026-03-22 21:49:23', '2026-05-31 03:42:49'),
(37, 8, 'B', 'Data tidak memengaruhi hasil kerja sistem kecerdasan buatan', 0, '2026-03-22 21:49:23', '2026-05-31 03:42:49'),
(38, 8, 'C', 'Sistem rekomendasi harus dihentikan penggunaannya', 0, '2026-03-22 21:49:23', '2026-05-31 03:42:49'),
(39, 8, 'D', 'Kecerdasan buatan tidak dapat digunakan dalam sistem rekomendasi', 0, '2026-03-22 21:49:23', '2026-05-31 03:42:49'),
(40, 8, 'E', 'Kualitas dan kelengkapan data memengaruhi hasil rekomendasi kecerdasan buatan', 1, '2026-03-22 21:49:23', '2026-05-31 03:42:49'),
(41, 9, 'A', 'Algoritma bekerja tanpa memerlukan data pelatihan', 0, '2026-03-22 21:49:53', '2026-05-31 03:43:34'),
(42, 9, 'B', 'Kecerdasan buatan memahami wajah secara alami seperti manusia', 0, '2026-03-22 21:49:53', '2026-05-31 03:43:34'),
(43, 9, 'C', 'Kamera memiliki kemampuan berpikir sendiri', 0, '2026-03-22 21:49:53', '2026-05-31 03:43:34'),
(44, 9, 'D', 'Kecerdasan buatan dilatih menggunakan dataset wajah yang telah diberi label', 1, '2026-03-22 21:49:53', '2026-05-31 03:43:34'),
(45, 9, 'E', 'Kecerdasan buatan menebak identitas wajah secara acak', 0, '2026-03-22 21:49:53', '2026-05-31 03:43:34'),
(51, 11, 'A', 'Mengurangi data', 0, '2026-03-28 00:03:56', '2026-05-31 03:44:34'),
(52, 11, 'B', 'Menggunakan data lebih sedikit', 0, '2026-03-28 00:03:56', '2026-05-31 03:44:34'),
(53, 11, 'C', 'Menghapus data lama', 0, '2026-03-28 00:03:56', '2026-05-31 03:44:34'),
(54, 11, 'D', 'Meningkatkan kualitas dan keberagaman data', 1, '2026-03-28 00:03:56', '2026-05-31 03:44:34'),
(55, 11, 'E', 'Mengganti komputer', 0, '2026-03-28 00:03:56', '2026-05-31 03:44:34'),
(61, 13, 'A', 'Menyimpan data dalam jumlah besar', 0, '2026-05-31 03:46:29', '2026-05-31 03:46:29'),
(62, 13, 'B', 'Menyelesaikan masalah secara terstruktur', 1, '2026-05-31 03:46:29', '2026-05-31 03:46:29'),
(63, 13, 'C', 'Menggantikan peran data dalam kecerdasan buatan', 0, '2026-05-31 03:46:29', '2026-05-31 03:46:29'),
(64, 13, 'D', 'Menjalankan program tanpa aturan', 0, '2026-05-31 03:46:29', '2026-05-31 03:46:29'),
(65, 13, 'E', 'Menghasilkan keputusan secara acak', 0, '2026-05-31 03:46:29', '2026-05-31 03:46:29'),
(66, 14, 'A', 'Menebak jawaban tanpa aturan', 0, '2026-05-31 03:47:15', '2026-05-31 03:47:15'),
(67, 14, 'B', 'Menyusun resep memasak dari awal sampai akhir', 1, '2026-05-31 03:47:15', '2026-05-31 03:47:15'),
(68, 14, 'C', 'Mengingat pengalaman pribadi', 0, '2026-05-31 03:47:15', '2026-05-31 03:47:15'),
(69, 14, 'D', 'Mengandalkan perasaan saat mengambil keputusan', 0, '2026-05-31 03:47:15', '2026-05-31 03:47:15'),
(70, 14, 'E', 'Memilih tindakan secara spontan', 0, '2026-05-31 03:47:15', '2026-05-31 03:47:15'),
(71, 15, 'A', '(1) dan (3)', 0, '2026-05-31 03:47:57', '2026-05-31 03:47:57'),
(72, 15, 'B', '(2) dan (4)', 0, '2026-05-31 03:47:57', '2026-05-31 03:47:57'),
(73, 15, 'C', '(1), (2), dan (3)', 1, '2026-05-31 03:47:57', '2026-05-31 03:47:57'),
(74, 15, 'D', '(1), (3), dan (4)', 0, '2026-05-31 03:47:57', '2026-05-31 03:47:57'),
(75, 15, 'E', 'semua benar', 0, '2026-05-31 03:47:57', '2026-05-31 03:47:57'),
(76, 16, 'A', 'Mengumpulkan data → melatih model → memberi label → memperbaiki kesalahan → menguji hasil.', 0, '2026-05-31 03:49:47', '2026-05-31 03:49:47'),
(77, 16, 'B', 'Mengumpulkan data → memberi label → melatih model → menguji hasil → memperbaiki kesalahan.', 1, '2026-05-31 03:49:47', '2026-05-31 03:49:47'),
(78, 16, 'C', 'Memberi label → mengumpulkan data → memperbaiki kesalahan → melatih model → menguji hasil.', 0, '2026-05-31 03:49:47', '2026-05-31 03:49:47'),
(79, 16, 'D', 'Melatih model → memperbaiki kesalahan → memberi label → mengumpulkan data → menguji hasil.', 0, '2026-05-31 03:49:47', '2026-05-31 03:49:47'),
(80, 16, 'E', 'Melatih model → menguji hasil → memberi label → mengumpulkan data → memperbaiki kesalahan.', 0, '2026-05-31 03:49:47', '2026-05-31 03:49:47'),
(81, 17, 'A', 'Mengabaikan informasi lalu lintas yang tersedia dan memilih rute secara acak tanpa mempertimbangkan kondisi jalan yang sebenarnya', 0, '2026-05-31 03:50:32', '2026-05-31 03:50:32'),
(82, 17, 'B', 'Menghapus data yang telah dikumpulkan', 0, '2026-05-31 03:50:32', '2026-05-31 03:50:32'),
(83, 17, 'C', 'Menyimpan data tanpa melakukan pengolahan', 0, '2026-05-31 03:50:32', '2026-05-31 03:50:32'),
(84, 17, 'D', 'Memproses data untuk menghasilkan keputusan', 1, '2026-05-31 03:50:32', '2026-05-31 03:50:32'),
(85, 17, 'E', 'Menampilkan data tanpa memberikan rekomendasi', 0, '2026-05-31 03:50:32', '2026-05-31 03:50:32'),
(86, 18, 'A', 'Jumlah data yang diproses terlalu besar sehingga memengaruhi hasil keluaran', 0, '2026-05-31 03:51:23', '2026-05-31 03:51:23'),
(87, 18, 'B', 'Kinerja perangkat komputer yang digunakan tidak cukup cepat', 0, '2026-05-31 03:51:24', '2026-05-31 03:51:24'),
(88, 18, 'C', 'Kompleksitas program yang terlalu rendah untuk menyelesaikan masalah', 0, '2026-05-31 03:51:24', '2026-05-31 03:51:24'),
(89, 18, 'D', 'Tidak terdapat kesalahan dalam proses perancangan algoritma', 0, '2026-05-31 03:51:24', '2026-05-31 03:51:24'),
(90, 18, 'E', 'Algoritma tidak disusun secara terstruktur dan sistematis', 1, '2026-05-31 03:51:24', '2026-05-31 03:51:24'),
(91, 19, 'A', 'Algoritma A lebih efektif', 1, '2026-05-31 03:52:35', '2026-05-31 03:52:35'),
(92, 19, 'B', 'Keduanya sama', 0, '2026-05-31 03:52:35', '2026-05-31 03:52:35'),
(93, 19, 'C', 'Algoritma B lebih baik', 0, '2026-05-31 03:52:35', '2026-05-31 03:52:35'),
(94, 19, 'D', 'Tidak ada perbedaan', 0, '2026-05-31 03:52:35', '2026-05-31 03:52:35'),
(95, 19, 'E', 'Keduanya tidak berfungsi', 0, '2026-05-31 03:52:35', '2026-05-31 03:52:35'),
(96, 20, 'A', '(1), (2), dan (4)', 0, '2026-05-31 03:53:54', '2026-05-31 03:53:54'),
(97, 20, 'B', '(1), (3), dan (5)', 0, '2026-05-31 03:53:54', '2026-05-31 03:53:54'),
(98, 20, 'C', '(2), (3), dan (4)', 0, '2026-05-31 03:53:54', '2026-05-31 03:53:54'),
(99, 20, 'D', '(1) dan (5)', 0, '2026-05-31 03:53:54', '2026-05-31 03:53:54'),
(100, 20, 'E', '(3) dan (5)', 1, '2026-05-31 03:53:54', '2026-05-31 03:53:54'),
(101, 21, 'A', 'Algoritma tidak berperan dalam proses penentuan rute perjalanan', 0, '2026-05-31 04:00:01', '2026-05-31 04:00:01'),
(102, 21, 'B', 'Algoritma hanya digunakan untuk menyimpan data lokasi pengguna', 0, '2026-05-31 04:00:01', '2026-05-31 04:00:01'),
(103, 21, 'C', 'Algoritma memproses berbagai data untuk menentukan rute yang paling efisien', 1, '2026-05-31 04:00:01', '2026-05-31 04:00:01'),
(104, 21, 'D', 'Data lalu lintas tidak diperlukan dalam penentuan rute perjalanan', 0, '2026-05-31 04:00:01', '2026-05-31 04:00:01'),
(105, 21, 'E', 'Komputer dapat menentukan rute tanpa mengikuti aturan atau langkah tertentu', 0, '2026-05-31 04:00:01', '2026-05-31 04:00:01'),
(106, 22, 'A', 'Algoritma harus dirancang secara logis, sistematis, dan mampu mempertimbangkan berbagai kemungkinan yang relevan', 1, '2026-05-31 04:00:49', '2026-05-31 04:00:49'),
(107, 22, 'B', 'Algoritma memiliki peran yang terbatas dalam menentukan hasil kerja kecerdasan buatan', 0, '2026-05-31 04:00:49', '2026-05-31 04:00:49'),
(108, 22, 'C', 'Data tidak berpengaruh', 0, '2026-05-31 04:00:49', '2026-05-31 04:00:49'),
(109, 22, 'D', 'Kesalahan keputusan selalu disebabkan oleh kerusakan perangkat komputer', 0, '2026-05-31 04:00:49', '2026-05-31 04:00:49'),
(110, 22, 'E', 'Kecerdasan buatan dapat bekerja tanpa menggunakan algoritma sebagai dasar pemrosesan', 0, '2026-05-31 04:00:49', '2026-05-31 04:00:49'),
(111, 23, 'A', 'Menghafal data tanpa pemrosesan', 0, '2026-05-31 04:05:42', '2026-05-31 04:05:42'),
(112, 23, 'B', 'Belajar dari data dan pengalaman', 1, '2026-05-31 04:05:42', '2026-05-31 04:05:42'),
(113, 23, 'C', 'Mengikuti perintah manusia secara manual', 0, '2026-05-31 04:05:42', '2026-05-31 04:05:42'),
(114, 23, 'D', 'Bekerja tanpa algoritma', 0, '2026-05-31 04:05:42', '2026-05-31 04:05:42'),
(115, 23, 'E', 'Mengambil keputusan berdasarkan emosi', 0, '2026-05-31 04:05:42', '2026-05-31 04:05:42'),
(116, 24, 'A', 'Tidak berubah', 0, '2026-05-31 04:06:09', '2026-05-31 04:06:09'),
(117, 24, 'B', 'Tidak berkembang', 0, '2026-05-31 04:06:09', '2026-05-31 04:06:09'),
(118, 24, 'C', 'Bekerja secara acak', 0, '2026-05-31 04:06:09', '2026-05-31 04:06:09'),
(119, 24, 'D', 'Tidak menggunakan data', 0, '2026-05-31 04:06:09', '2026-05-31 04:06:09'),
(120, 24, 'E', 'Belajar dari kesalahan sebelumnya', 1, '2026-05-31 04:06:09', '2026-05-31 04:06:09'),
(121, 25, 'A', 'Kalkulator digital', 0, '2026-05-31 04:06:58', '2026-05-31 04:06:58'),
(122, 25, 'B', 'Jam dinding elektronik', 0, '2026-05-31 04:06:58', '2026-05-31 04:06:58'),
(123, 25, 'C', 'Lampu lalu lintas manual', 0, '2026-05-31 04:06:58', '2026-05-31 04:06:58'),
(124, 25, 'D', 'Sistem rekomendasi video di YouTube', 1, '2026-05-31 04:06:58', '2026-05-31 04:06:58'),
(125, 25, 'E', 'Buku cetak', 0, '2026-05-31 04:06:58', '2026-05-31 04:06:58'),
(126, 26, 'A', 'Komputer memiliki intuisi seperti manusia', 0, '2026-05-31 21:00:21', '2026-05-31 21:00:21'),
(127, 26, 'B', 'Model belajar dari pola data yang diberikan', 1, '2026-05-31 21:00:21', '2026-05-31 21:00:21'),
(128, 26, 'C', 'Algoritma bekerja tanpa memerlukan data', 0, '2026-05-31 21:00:21', '2026-05-31 21:00:21'),
(129, 26, 'D', 'Keputusan diambil secara acak', 0, '2026-05-31 21:00:21', '2026-05-31 21:00:21'),
(130, 26, 'E', 'Komputer memahami makna secara alami.', 0, '2026-05-31 21:00:21', '2026-05-31 21:00:21'),
(131, 27, 'A', 'Data latih digunakan untuk belajar, data uji untuk menguji kinerja', 1, '2026-05-31 21:01:21', '2026-05-31 21:01:21'),
(132, 27, 'B', 'Data uji digunakan untuk melatih model', 0, '2026-05-31 21:01:21', '2026-05-31 21:01:21'),
(133, 27, 'C', 'Data latih digunakan untuk evaluasi akhir', 0, '2026-05-31 21:01:21', '2026-05-31 21:01:21'),
(134, 27, 'D', 'Data uji selalu lebih banyak dari data latih', 0, '2026-05-31 21:01:21', '2026-05-31 21:01:21'),
(135, 27, 'E', 'Data latih tidak memengaruhi hasil prediksi', 0, '2026-05-31 21:01:21', '2026-05-31 21:01:21'),
(136, 28, 'A', 'Unsupervised learning', 0, '2026-05-31 21:01:53', '2026-05-31 21:01:53'),
(137, 28, 'B', 'Supervised learning', 1, '2026-05-31 21:01:53', '2026-05-31 21:01:53'),
(138, 28, 'C', 'Tanpa machine learning', 0, '2026-05-31 21:01:53', '2026-05-31 21:01:53'),
(139, 28, 'D', 'Algoritma manual', 0, '2026-05-31 21:01:53', '2026-05-31 21:01:53'),
(140, 28, 'E', 'Random learning', 0, '2026-05-31 21:01:53', '2026-05-31 21:01:53'),
(141, 29, 'A', '(1) supervised learning, (2) unsupervised learning', 1, '2026-05-31 21:02:39', '2026-05-31 21:02:39'),
(142, 29, 'B', '(1) unsupervised learning, (2) supervised learning', 0, '2026-05-31 21:02:39', '2026-05-31 21:02:39'),
(143, 29, 'C', 'Keduanya supervised learning', 0, '2026-05-31 21:02:39', '2026-05-31 21:02:39'),
(144, 29, 'D', 'Keduanya unsupervised learning', 0, '2026-05-31 21:02:39', '2026-05-31 21:02:39'),
(145, 29, 'E', 'Bukan keduanya', 0, '2026-05-31 21:02:39', '2026-05-31 21:02:39'),
(146, 30, 'A', 'Belajar dari data', 0, '2026-05-31 21:03:17', '2026-05-31 21:03:17'),
(147, 30, 'B', 'Meningkatkan kinerja seiring waktu', 0, '2026-05-31 21:03:17', '2026-05-31 21:03:17'),
(148, 30, 'C', 'Mengandalkan algoritma', 0, '2026-05-31 21:03:17', '2026-05-31 21:03:17'),
(149, 30, 'D', 'Memiliki kesadaran dan perasaan', 1, '2026-05-31 21:03:17', '2026-05-31 21:03:17'),
(150, 30, 'E', 'Mengenali pola dalam data', 0, '2026-05-31 21:03:17', '2026-05-31 21:03:17'),
(151, 31, 'A', '(1), (2), dan (4)', 0, '2026-05-31 21:04:15', '2026-05-31 21:04:15'),
(152, 31, 'B', '(1), (3), dan (5)', 0, '2026-05-31 21:04:15', '2026-05-31 21:04:15'),
(153, 31, 'C', '(2), (3), dan (4)', 0, '2026-05-31 21:04:15', '2026-05-31 21:04:15'),
(154, 31, 'D', '(1), (4), dan (5)', 0, '2026-05-31 21:04:15', '2026-05-31 21:04:15'),
(155, 31, 'E', '(3), (4), dan (5)', 1, '2026-05-31 21:04:15', '2026-05-31 21:04:15'),
(156, 32, 'A', 'Acak tanpa aturan', 0, '2026-05-31 21:04:43', '2026-05-31 21:05:23'),
(157, 32, 'B', 'Hanya menampilkan data', 0, '2026-05-31 21:04:43', '2026-05-31 21:05:23'),
(158, 32, 'C', 'Menggunakan percabangan untuk mengambil keputusan', 1, '2026-05-31 21:04:43', '2026-05-31 21:05:23'),
(159, 32, 'D', 'Tanpa proses', 0, '2026-05-31 21:04:43', '2026-05-31 21:05:23'),
(160, 32, 'E', 'Algoritma bekerja secara sistematis', 0, '2026-05-31 21:04:43', '2026-05-31 21:05:23'),
(161, 33, 'A', 'Mengandalkan intuisi dalam menyelesaikan masalah', 0, '2026-05-31 21:08:13', '2026-05-31 21:08:13'),
(162, 33, 'B', 'Menyelesaikan masalah secara logis dan sistematis', 1, '2026-05-31 21:08:13', '2026-05-31 21:08:13'),
(163, 33, 'C', 'Menghafal langkah tanpa memahami proses', 0, '2026-05-31 21:08:13', '2026-05-31 21:08:13'),
(164, 33, 'D', 'Menggunakan perasaan dalam mengambil kepsutusan', 0, '2026-05-31 21:08:13', '2026-05-31 21:08:13'),
(165, 33, 'E', 'Menyelesaikan masalah secara acak', 0, '2026-05-31 21:08:13', '2026-05-31 21:08:13'),
(166, 34, 'A', 'Mengikuti aturan dan instruksi yang jelas', 1, '2026-05-31 21:09:07', '2026-05-31 21:09:07'),
(167, 34, 'B', 'Menggunakan pengalaman pribadi', 0, '2026-05-31 21:09:07', '2026-05-31 21:09:07'),
(168, 34, 'C', 'Memiliki emosi dan kesadaran diri', 0, '2026-05-31 21:09:07', '2026-05-31 21:09:07'),
(169, 34, 'D', 'Dapat memahami makna secara alami', 0, '2026-05-31 21:09:07', '2026-05-31 21:09:07'),
(170, 34, 'E', 'Mengambil keputusan berdasarkan perasaan', 0, '2026-05-31 21:09:07', '2026-05-31 21:09:07'),
(171, 35, 'A', 'Dapat dilakukan karena semua langkah memiliki fungsi yang sama', 0, '2026-05-31 21:09:44', '2026-05-31 21:10:59'),
(172, 35, 'B', 'Tepat karena mempercepat proses tanpa memengaruhi hasil', 0, '2026-05-31 21:09:44', '2026-05-31 21:10:59'),
(173, 35, 'C', 'Kurang tepat karena setiap langkah memiliki peran dalam menghasilkan keluaran yang diinginkan', 1, '2026-05-31 21:09:44', '2026-05-31 21:10:59'),
(174, 35, 'D', 'Tepat jika menggunakan gelas yang lebih besar', 0, '2026-05-31 21:09:44', '2026-05-31 21:10:59'),
(175, 35, 'E', 'Tidak berhubungan dengan computational thinking', 0, '2026-05-31 21:09:44', '2026-05-31 21:10:59'),
(176, 36, 'A', 'Menggabungkan beberapa masalah menjadi satu', 0, '2026-05-31 21:11:38', '2026-05-31 21:11:38'),
(177, 36, 'B', 'Memecah masalah besar menjadi bagian yang lebih sederhana', 1, '2026-05-31 21:11:38', '2026-05-31 21:11:38'),
(178, 36, 'C', 'Menghapus informasi yang penting', 0, '2026-05-31 21:11:38', '2026-05-31 21:11:38'),
(179, 36, 'D', 'Menentukan solusi akhir secara langsung', 0, '2026-05-31 21:11:38', '2026-05-31 21:11:38'),
(180, 36, 'E', 'Menyusun algoritma secara acak', 0, '2026-05-31 21:11:38', '2026-05-31 21:11:38'),
(181, 37, 'A', 'Menemukan kesamaan atau keteraturan dalam suatu masalah', 1, '2026-05-31 21:12:19', '2026-05-31 21:12:19'),
(182, 37, 'B', 'Menghilangkan semua variasi data', 0, '2026-05-31 21:12:19', '2026-05-31 21:12:19'),
(183, 37, 'C', 'Menghindari penggunaan data', 0, '2026-05-31 21:12:19', '2026-05-31 21:12:19'),
(184, 37, 'D', 'Menyimpan informasi tanpa analisis', 0, '2026-05-31 21:12:19', '2026-05-31 21:12:19'),
(185, 37, 'E', 'Mengganti proses dekomposisi', 0, '2026-05-31 21:12:19', '2026-05-31 21:12:19'),
(186, 38, 'A', 'Semua detail harus diperhatikan', 0, '2026-05-31 21:12:54', '2026-05-31 21:12:54'),
(187, 38, 'B', 'Informasi yang tidak relevan harus diperbanyak', 0, '2026-05-31 21:12:54', '2026-05-31 21:12:54'),
(188, 38, 'C', 'Fokus pada informasi penting dan mengabaikan detail yang tidak perlu', 1, '2026-05-31 21:12:54', '2026-05-31 21:12:54'),
(189, 38, 'D', 'Masalah tidak perlu disederhanakan', 0, '2026-05-31 21:12:54', '2026-05-31 21:12:54'),
(190, 38, 'E', 'Semua masalah memiliki solusi yang sama', 0, '2026-05-31 21:12:54', '2026-05-31 21:12:54'),
(191, 39, 'A', 'Dekomposisi', 0, '2026-05-31 21:13:22', '2026-05-31 21:13:22'),
(192, 39, 'B', 'Pengenalan pola', 0, '2026-05-31 21:13:22', '2026-05-31 21:13:22'),
(193, 39, 'C', 'Abstraksi', 0, '2026-05-31 21:13:22', '2026-05-31 21:13:22'),
(194, 39, 'D', 'Algoritma', 0, '2026-05-31 21:13:22', '2026-05-31 21:13:22'),
(195, 39, 'E', 'Intuisi', 1, '2026-05-31 21:13:22', '2026-05-31 21:13:22'),
(196, 40, 'A', '(1), (2), dan (4)', 1, '2026-05-31 21:14:08', '2026-05-31 21:14:08'),
(197, 40, 'B', '(1), (3), dan (5)', 0, '2026-05-31 21:14:08', '2026-05-31 21:14:08'),
(198, 40, 'C', '(2), (3), dan (4)', 0, '2026-05-31 21:14:08', '2026-05-31 21:14:08'),
(199, 40, 'D', '(1), (4), dan (5)', 0, '2026-05-31 21:14:08', '2026-05-31 21:14:08'),
(200, 40, 'E', '(3), (4), dan (5)', 0, '2026-05-31 21:14:08', '2026-05-31 21:14:08'),
(201, 41, 'A', 'Sangat Baik', 0, '2026-05-31 21:17:02', '2026-05-31 21:17:02'),
(202, 41, 'B', 'Baik', 1, '2026-05-31 21:17:02', '2026-05-31 21:17:02'),
(203, 41, 'C', 'Perlu Perbaikan', 0, '2026-05-31 21:17:02', '2026-05-31 21:17:02'),
(204, 41, 'D', 'Tidak diketahui', 0, '2026-05-31 21:17:02', '2026-05-31 21:17:02'),
(205, 41, 'E', 'Tidak ada output', 0, '2026-05-31 21:17:02', '2026-05-31 21:17:02'),
(206, 42, 'A', 'Mulai', 0, '2026-05-31 21:18:08', '2026-05-31 21:18:08'),
(207, 42, 'B', 'Mengecek kondisi cuaca', 0, '2026-05-31 21:18:08', '2026-05-31 21:18:08'),
(208, 42, 'C', 'Keputusan: “Apakah hujan?”', 1, '2026-05-31 21:18:08', '2026-05-31 21:18:08'),
(209, 42, 'D', 'Selesai', 0, '2026-05-31 21:18:08', '2026-05-31 21:18:08'),
(210, 42, 'E', 'Mengulang proses', 0, '2026-05-31 21:18:08', '2026-05-31 21:18:08'),
(211, 43, 'A', 'Sebagai hasil akhir sistem', 0, '2026-05-31 21:20:41', '2026-05-31 21:20:41'),
(212, 43, 'B', 'Menjadi sumber informasi utama yang digunakan sistem untuk menganalisis kondisi dan menentukan keputusan penjemputan', 1, '2026-05-31 21:20:41', '2026-05-31 21:20:41'),
(213, 43, 'C', 'Berfungsi sebagai tampilan antarmuka yang memudahkan interaksi pengguna dengan aplikasi', 0, '2026-05-31 21:20:41', '2026-05-31 21:20:41'),
(214, 43, 'D', 'Berperan sebagai komponen perangkat keras yang menjalankan seluruh proses sistem', 0, '2026-05-31 21:20:41', '2026-05-31 21:20:41'),
(215, 43, 'E', 'Hanya digunakan sebagai arsip penyimpanan tanpa memengaruhi proses pengambilan keputusan', 0, '2026-05-31 21:20:41', '2026-05-31 21:20:41'),
(216, 44, 'A', 'Data', 0, '2026-05-31 21:21:12', '2026-05-31 21:21:12'),
(217, 44, 'B', 'Algoritma', 1, '2026-05-31 21:21:12', '2026-05-31 21:21:12'),
(218, 44, 'C', 'Output', 0, '2026-05-31 21:21:12', '2026-05-31 21:21:12'),
(219, 44, 'D', 'Input', 0, '2026-05-31 21:21:12', '2026-05-31 21:21:12'),
(220, 44, 'E', 'Jaringan', 0, '2026-05-31 21:21:12', '2026-05-31 21:21:12'),
(221, 45, 'A', 'Hardware', 0, '2026-05-31 21:21:41', '2026-05-31 21:21:41'),
(222, 45, 'B', 'Database', 0, '2026-05-31 21:21:41', '2026-05-31 21:21:41'),
(223, 45, 'C', 'Jaringan', 0, '2026-05-31 21:21:41', '2026-05-31 21:21:41'),
(224, 45, 'D', 'Machine learning', 1, '2026-05-31 21:21:41', '2026-05-31 21:21:41'),
(225, 45, 'E', 'Algoritma manual', 0, '2026-05-31 21:21:41', '2026-05-31 21:21:41'),
(226, 46, 'A', 'Siswa menggunakan pola dalam memecahkan masalah', 0, '2026-05-31 21:23:48', '2026-05-31 21:23:48'),
(227, 46, 'B', 'Siswa menerapkan dekomposisi dalam computational thinking', 1, '2026-05-31 21:23:48', '2026-05-31 21:23:48'),
(228, 46, 'C', 'Siswa mengabaikan masalah utama', 0, '2026-05-31 21:23:48', '2026-05-31 21:23:48'),
(229, 46, 'D', 'Siswa menggunakan algoritma acak', 0, '2026-05-31 21:23:48', '2026-05-31 21:23:48'),
(230, 46, 'E', 'Siswa tidak menggunakan pendekatan sistematis', 0, '2026-05-31 21:23:48', '2026-05-31 21:23:48'),
(231, 47, 'A', 'Data berukuran kecil dan mudah diolah', 0, '2026-05-31 21:24:33', '2026-05-31 21:24:33'),
(232, 47, 'B', 'Data terbatas dan tidak berubah', 0, '2026-05-31 21:24:33', '2026-05-31 21:24:33'),
(233, 47, 'C', 'Data tidak memiliki struktur', 0, '2026-05-31 21:24:33', '2026-05-31 21:24:33'),
(234, 47, 'D', 'Data berjumlah besar, beragam, dan terus berkembang', 1, '2026-05-31 21:24:33', '2026-05-31 21:24:33'),
(235, 47, 'E', 'Data tidak digunakan dalam sistem', 0, '2026-05-31 21:24:33', '2026-05-31 21:24:33'),
(236, 48, 'A', 'Kualitas dan kelengkapan data memiliki pengaruh terhadap ketepatan hasil yang dihasilkan sistem', 1, '2026-05-31 21:28:02', '2026-05-31 21:28:02'),
(237, 48, 'B', 'Data tidak berpengaruh dalam hasil keputusan sistem', 0, '2026-05-31 21:28:02', '2026-05-31 21:28:02'),
(238, 48, 'C', 'Peran algoritma tidak penting', 0, '2026-05-31 21:28:02', '2026-05-31 21:28:02'),
(239, 48, 'D', 'Ketidakakuratan hasil selalu disebabkan oleh kerusakan perangkat komputer', 0, '2026-05-31 21:28:02', '2026-05-31 21:28:02'),
(240, 48, 'E', 'Sistem tidak berfungsi ketika menghadapi data yang tidak lengkap', 0, '2026-05-31 21:28:02', '2026-05-31 21:28:02'),
(241, 49, 'A', '(1), (2), dan (4)', 1, '2026-05-31 21:28:32', '2026-05-31 21:28:32'),
(242, 49, 'B', '(1) dan (3)', 0, '2026-05-31 21:28:32', '2026-05-31 21:28:32'),
(243, 49, 'C', '(2) dan (3)', 0, '2026-05-31 21:28:32', '2026-05-31 21:28:32'),
(244, 49, 'D', '(3) dan (4)', 0, '2026-05-31 21:28:32', '2026-05-31 21:28:32'),
(245, 49, 'E', 'Semua benar', 0, '2026-05-31 21:28:32', '2026-05-31 21:28:32'),
(246, 50, 'A', 'Sistem bekerja tanpa menggunakan data sebelumnya', 0, '2026-05-31 21:29:13', '2026-05-31 21:29:13'),
(247, 50, 'B', 'Model dilatih menggunakan data yang telah memiliki kategori hasil yang jelas', 1, '2026-05-31 21:29:13', '2026-05-31 21:29:13'),
(248, 50, 'C', 'Proses pembelajaran dilakukan tanpa aturan tertentu', 0, '2026-05-31 21:29:13', '2026-05-31 21:29:13'),
(249, 50, 'D', 'Sistem menghasilkan keputusan secara acak', 0, '2026-05-31 21:29:13', '2026-05-31 21:29:13'),
(250, 50, 'E', 'Tidak diperlukan proses pelatihan model', 0, '2026-05-31 21:29:13', '2026-05-31 21:29:13'),
(251, 51, 'A', 'Data tidak mempengaruhi hasil', 0, '2026-05-31 21:29:42', '2026-05-31 21:29:42'),
(252, 51, 'B', 'Kesalahan urutan algoritma dapat menghasilkan keputusan yang tidak tepat', 1, '2026-05-31 21:29:42', '2026-05-31 21:29:42'),
(253, 51, 'C', 'Komputer tidak mampu memproses data', 0, '2026-05-31 21:29:42', '2026-05-31 21:29:42'),
(254, 51, 'D', 'Algoritma tidak diperlukan dalam sistem', 0, '2026-05-31 21:29:42', '2026-05-31 21:29:42'),
(255, 51, 'E', 'Sistem bekerja secara acak', 0, '2026-05-31 21:29:42', '2026-05-31 21:29:42'),
(256, 52, 'A', 'Menambahkan seluruh detail ke dalam sistem', 0, '2026-05-31 21:30:15', '2026-05-31 21:30:15'),
(257, 52, 'B', 'Menyusun seluruh proses tanpa prioritas', 0, '2026-05-31 21:30:15', '2026-05-31 21:30:15'),
(258, 52, 'C', 'Menekankan pada elemen yang relevan dan mengabaikan yang tidak penting', 1, '2026-05-31 21:30:15', '2026-05-31 21:30:15'),
(259, 52, 'D', 'Menggabungkan semua komponen secara menyeluruh', 0, '2026-05-31 21:30:15', '2026-05-31 21:30:15'),
(260, 52, 'E', 'Menghilangkan seluruh tahapan proses', 0, '2026-05-31 21:30:15', '2026-05-31 21:30:15'),
(261, 53, 'A', '(1), (2), dan (5)', 0, '2026-05-31 21:31:15', '2026-05-31 21:31:15'),
(262, 53, 'B', '(2) dan (4)', 0, '2026-05-31 21:31:15', '2026-05-31 21:31:15'),
(263, 53, 'C', 'Semua benar', 0, '2026-05-31 21:31:15', '2026-05-31 21:31:15'),
(264, 53, 'D', '(4)', 1, '2026-05-31 21:31:15', '2026-05-31 21:31:15'),
(265, 53, 'E', 'Semua salah', 0, '2026-05-31 21:31:15', '2026-05-31 21:31:15'),
(266, 54, 'A', 'Percabangan keputusan tertukar', 1, '2026-05-31 21:32:01', '2026-05-31 21:32:01'),
(267, 54, 'B', 'Input tidak diperlukan', 0, '2026-05-31 21:32:01', '2026-05-31 21:32:01'),
(268, 54, 'C', 'Output tidak ditampilkan', 0, '2026-05-31 21:32:01', '2026-05-31 21:32:01'),
(269, 54, 'D', 'Algoritma terlalu sederhana', 0, '2026-05-31 21:32:01', '2026-05-31 21:32:01'),
(270, 54, 'E', 'Data tidak digunakan', 0, '2026-05-31 21:32:01', '2026-05-31 21:32:01'),
(271, 55, 'A', 'Kecerdasan buatan belajar lebih cepat', 0, '2026-05-31 21:32:36', '2026-05-31 21:32:36'),
(272, 55, 'B', 'Prediksi kecerdasan buatan menjadi bias', 1, '2026-05-31 21:32:36', '2026-05-31 21:32:36'),
(273, 55, 'C', 'Semua kategori dipahami merata', 0, '2026-05-31 21:32:36', '2026-05-31 21:32:36'),
(274, 55, 'D', 'Kecerdasan buatan tidak perlu evaluasi', 0, '2026-05-31 21:32:36', '2026-05-31 21:32:36'),
(275, 55, 'E', 'Model selalu akurat', 0, '2026-05-31 21:32:36', '2026-05-31 21:32:36'),
(276, 56, 'A', 'Pembelajaran berbasis contoh yang telah ditentukan', 0, '2026-05-31 21:33:07', '2026-05-31 21:33:07'),
(277, 56, 'B', 'Pendekatan algoritmik manual tanpa pelatihan', 0, '2026-05-31 21:33:07', '2026-05-31 21:33:07'),
(278, 56, 'C', 'Teknik eksplorasi data untuk menemukan pola tanpa label awal', 1, '2026-05-31 21:33:07', '2026-05-31 21:33:07'),
(279, 56, 'D', 'Metode klasifikasi berbasis label', 0, '2026-05-31 21:33:07', '2026-05-31 21:33:07'),
(280, 56, 'E', 'Proses acak tanpa struktur', 0, '2026-05-31 21:33:07', '2026-05-31 21:33:07'),
(281, 57, 'A', 'Algoritma tidak dapat menjalankan proses pembelajaran dari data yang tersedia', 0, '2026-05-31 21:35:15', '2026-05-31 21:35:15'),
(282, 57, 'B', 'Komposisi data pelatihan tidak memengaruhi kualitas hasil yang dihasilkan sistem', 0, '2026-05-31 21:35:15', '2026-05-31 21:35:15'),
(283, 57, 'C', 'Sistem bekerja tanpa memanfaatkan metode kecerdasan buatan dalam proses rekomendasi', 0, '2026-05-31 21:35:15', '2026-05-31 21:35:15'),
(284, 57, 'D', 'Ketidaksesuaian hasil menunjukkan adanya kerusakan pada sistem yang digunakan', 0, '2026-05-31 21:35:15', '2026-05-31 21:35:15'),
(285, 57, 'E', 'Terjadi bias pada sistem karena data pelatihan tidak mewakili seluruh kelompok pengguna secara seimbang', 1, '2026-05-31 21:35:15', '2026-05-31 21:35:15'),
(286, 58, 'A', 'Hasil tersebut menunjukkan bahwa algoritma yang digunakan tidak dapat melakukan proses pembelajaran dengan benar', 0, '2026-05-31 21:36:33', '2026-05-31 21:36:33'),
(287, 58, 'B', 'Ketidakseimbangan jumlah data pada setiap kategori menyebabkan model lebih banyak mempelajari pola dari kategori yang dominan', 1, '2026-05-31 21:36:33', '2026-05-31 21:36:33'),
(288, 58, 'C', 'Jumlah dan distribusi data tidak memengaruhi hasil prediksi yang dihasilkan model', 0, '2026-05-31 21:36:33', '2026-05-31 21:36:33'),
(289, 58, 'D', 'Kecenderungan klasifikasi tersebut disebabkan oleh kerusakan perangkat keras yang digunakan', 0, '2026-05-31 21:36:33', '2026-05-31 21:36:33'),
(290, 58, 'E', 'Sistem machine learning tidak berhasil menjalankan proses pelatihan data', 0, '2026-05-31 21:36:33', '2026-05-31 21:36:33'),
(291, 59, 'A', '(1), (2), dan (4)', 1, '2026-05-31 21:37:14', '2026-05-31 21:37:14'),
(292, 59, 'B', '(1), (3), dan (5)', 0, '2026-05-31 21:37:14', '2026-05-31 21:37:14'),
(293, 59, 'C', '(2), (3), dan (4)', 0, '2026-05-31 21:37:14', '2026-05-31 21:37:14'),
(294, 59, 'D', '(1), (4), dan (5)', 0, '2026-05-31 21:37:14', '2026-05-31 21:37:14'),
(295, 59, 'E', '(3), (4), dan (5)', 0, '2026-05-31 21:37:14', '2026-05-31 21:37:14'),
(296, 60, 'A', 'Sistem memiliki kemampuan merasakan emosi seperti manusia', 1, '2026-05-31 21:37:43', '2026-05-31 21:37:43'),
(297, 60, 'B', 'Sistem bekerja berdasarkan data yang tersedia', 0, '2026-05-31 21:37:43', '2026-05-31 21:37:43'),
(298, 60, 'C', 'Sistem mengikuti aturan algoritmik', 0, '2026-05-31 21:37:43', '2026-05-31 21:37:43'),
(299, 60, 'D', 'Sistem mampu memproses informasi secara efisien', 0, '2026-05-31 21:37:43', '2026-05-31 21:37:43'),
(300, 60, 'E', 'Sistem dirancang untuk tugas tertentu', 0, '2026-05-31 21:37:43', '2026-05-31 21:37:43'),
(301, 61, 'A', '(1), (2), dan (4)', 0, '2026-05-31 21:38:53', '2026-05-31 21:38:53'),
(302, 61, 'B', '(1), (3), dan (4)', 0, '2026-05-31 21:38:53', '2026-05-31 21:38:53'),
(303, 61, 'C', '(2), (3), dan (4)', 0, '2026-05-31 21:38:53', '2026-05-31 21:38:53'),
(304, 61, 'D', '(1), (2), dan (3)', 1, '2026-05-31 21:38:53', '2026-05-31 21:38:53'),
(305, 61, 'E', '(3) dan (4)', 0, '2026-05-31 21:38:53', '2026-05-31 21:38:53'),
(306, 62, 'A', 'Sistem tetap dapat bekerja secara optimal', 0, '2026-05-31 21:39:40', '2026-05-31 21:39:40'),
(307, 62, 'B', 'Kurangnya komponen utama menyebabkan sistem tidak mampu menyelesaikan masalah', 1, '2026-05-31 21:39:40', '2026-05-31 21:39:40'),
(308, 62, 'C', 'Algoritma tidak berpengaruh terhadap hasil', 0, '2026-05-31 21:39:40', '2026-05-31 21:39:40'),
(309, 62, 'D', 'Kecerdasan buatan dapat menggantikan semua proses tanpa data', 0, '2026-05-31 21:39:40', '2026-05-31 21:39:40'),
(310, 62, 'E', 'Sistem akan bekerja lebih cepat tanpa data', 0, '2026-05-31 21:39:40', '2026-05-31 21:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint UNSIGNED NOT NULL,
  `quiz_id` bigint UNSIGNED NOT NULL,
  `question_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` int UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question_text`, `question_image`, `order_no`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sebuah aplikasi belanja online dapat menampilkan produk yang sesuai dengan minat pengguna berdasarkan riwayat pencarian dan pembelian sebelumnya. Hal tersebut menunjukkan bahwa data dalam kecerdasan buatan berfungsi sebagai….', NULL, 1, '2026-02-19 18:45:54', '2026-05-31 03:36:24'),
(2, 1, 'Perhatikan pernyataan berikut:\r\n(1) Data dapat berupa teks, gambar, suara, dan angka\r\n(2) Data selalu langsung bermakna tanpa diolah\r\n(3) Data perlu diolah agar menjadi informasi\r\n(4) Data tidak mempengaruhi hasil kecerdasan buatan\r\n\r\nBerdasarkan konsep data dalam kecerdasan buatan, pernyataan yang benar adalah….', NULL, 2, '2026-03-22 21:48:05', '2026-05-31 03:37:32'),
(3, 1, 'Sebuah sistem pengenalan wajah dilatih menggunakan ribuan foto manusia. Hal ini menunjukkan bahwa kecerdasan buatan membutuhkan data dalam jumlah besar atau yang dikenal dengan istilah….', NULL, 3, '2026-03-22 21:48:19', '2026-05-31 03:38:19'),
(4, 1, 'Dalam suatu sistem kecerdasan buatan, ditemukan bahwa data yang digunakan banyak mengandung kesalahan dan tidak lengkap. Berdasarkan prinsip Garbage In, Garbage Out, maka hasil yang dihasilkan sistem tersebut kemungkinan adalah….', NULL, 4, '2026-03-22 21:48:30', '2026-05-31 03:39:11'),
(5, 1, 'Seorang pengembang kecerdasan buatan mengumpulkan data hanya dari satu kelompok tertentu sehingga sistem yang dihasilkan tidak adil bagi kelompok lain. Kondisi tersebut menunjukkan adanya….', NULL, 5, '2026-03-22 21:48:42', '2026-05-31 03:39:49'),
(6, 1, 'Pernyataan berikut yang paling benar tentang proses labeling adalah....', NULL, 6, '2026-03-22 21:48:56', '2026-05-31 03:40:35'),
(7, 1, 'Perhatikan kasus berikut:\r\nSebuah kecerdasan buatan dilatih menggunakan data yang lengkap, bersih, dan beragam. Kecerdasan buatan lain dilatih menggunakan data yang tidak lengkap dan banyak kesalahan.\r\nPerbandingan hasil yang paling tepat adalah….', NULL, 7, '2026-03-22 21:49:08', '2026-05-31 03:41:28'),
(8, 1, 'Sebuah platform streaming menggunakan sistem rekomendasi berbasis kecerdasan buatan untuk menampilkan film dan musik sesuai minat pengguna. Namun, beberapa pengguna mengeluhkan bahwa rekomendasi yang diberikan sering kali tidak sesuai dengan preferensi mereka. Setelah dilakukan evaluasi, diketahui bahwa data yang digunakan sistem hanya berasal dari sebagian kecil riwayat pencarian pengguna dan tidak mencakup kebiasaan pengguna secara menyeluruh.\r\nBerdasarkan kondisi tersebut, kesimpulan yang paling tepat adalah.…', NULL, 8, '2026-03-22 21:49:23', '2026-05-31 03:42:49'),
(9, 1, 'Sistem kecerdasan buatan dapat mengenali wajah manusia karena....', NULL, 9, '2026-03-22 21:49:53', '2026-05-31 03:43:34'),
(11, 1, 'Sebuah perusahaan ingin meningkatkan akurasi sistem kecerdasan buatan mereka. Langkah yang paling tepat berdasarkan konsep data adalah….', NULL, 10, '2026-03-28 00:03:56', '2026-05-31 03:44:34'),
(13, 2, 'Algoritma merupakan serangkaian langkah logis yang digunakan komputer untuk....', NULL, 1, '2026-05-31 03:46:29', '2026-05-31 03:46:29'),
(14, 2, 'Dalam kehidupan sehari-hari, contoh penerapan algoritma dapat ditemukan pada kegiatan....', NULL, 2, '2026-05-31 03:47:15', '2026-05-31 03:47:15'),
(15, 2, 'Perhatikan pernyataan berikut:\r\n(1) Algoritma terdiri dari langkah-langkah logis\r\n(2) Algoritma membantu komputer membuat keputusan secara logis\r\n(3) Algoritma harus terstruktur\r\n(4) Algoritma tidak membutuhkan data\r\n\r\nPernyataan yang benar adalah….', NULL, 3, '2026-05-31 03:47:57', '2026-05-31 03:47:57'),
(16, 2, 'Langkah-langkah dalam algoritma kecerdasan buatan yang benar biasanya mencakup....', NULL, 4, '2026-05-31 03:49:46', '2026-05-31 03:49:46'),
(17, 2, 'Sebuah aplikasi navigasi menentukan rute tercepat berdasarkan data lalu lintas. Proses tersebut menunjukkan bahwa algoritma bekerja dengan cara….', NULL, 5, '2026-05-31 03:50:32', '2026-05-31 03:50:32'),
(18, 2, 'Jika sebuah algoritma menghasilkan output yang salah karena urutan langkah tidak logis, maka penyebab utamanya adalah….', NULL, 6, '2026-05-31 03:51:23', '2026-05-31 03:51:23'),
(19, 2, 'Perhatikan dua algoritma berikut:\r\n(1) Algoritma A tersusun rapi dan logis, (2) sedangkan algoritma B tidak terstruktur.\r\nPerbandingan yang tepat adalah….', NULL, 7, '2026-05-31 03:52:35', '2026-05-31 03:52:35'),
(20, 2, 'Perhatikan pernyataan berikut terkait algoritma dalam kecerdasan buatan:\r\n(1) Algoritma membantu komputer memproses data secara logis\r\n(2) Algoritma memungkinkan komputer mengambil keputusan berdasarkan aturan\r\n(3) Algoritma membuat komputer memiliki kesadaran diri\r\n(4) Algoritma harus disusun secara berurutan\r\n(5) Algoritma bekerja tanpa memerlukan input\r\n\r\nPernyataan yang tidak benar ditunjukkan oleh nomor ....', NULL, 8, '2026-05-31 03:53:54', '2026-05-31 03:53:54'),
(21, 2, 'Perhatikan gambar di samping.\r\nGambar tersebut menunjukkan aplikasi navigasi memberikan beberapa pilihan rute perjalanan beserta estimasi waktu tempuhnya. Sistem tersebut menggunakan algoritma untuk mengolah data jalan dan lalu lintas sehingga dapat memberikan rekomendasi rute kepada pengguna. Analisis yang tepat adalah….', 'question_images/Un4McjAS6zXgplahFR8kjPuOVGaOnJmf6jaK4cuY.jpg', 9, '2026-05-31 04:00:00', '2026-05-31 04:00:00'),
(22, 2, 'Sebuah sistem kecerdasan buatan menghasilkan keputusan yang salah karena algoritma tidak mempertimbangkan semua kemungkinan. Kesimpulan yang tepat adalah….', NULL, 10, '2026-05-31 04:00:49', '2026-05-31 04:00:49'),
(23, 3, 'Machine Learning merupakan bagian dari kecerdasan buatan yang memungkinkan komputer untuk....', NULL, 1, '2026-05-31 04:05:42', '2026-05-31 04:05:42'),
(24, 3, 'Sebuah model machine learning memberikan prediksi yang semakin akurat setelah beberapa kali proses pelatihan. Hal ini menunjukkan bahwa sistem….', NULL, 2, '2026-05-31 04:06:09', '2026-05-31 04:06:09'),
(25, 3, 'Contoh penerapan machine learning dalam kehidupan sehari-hari dapat ditemukan pada....', NULL, 3, '2026-05-31 04:06:58', '2026-05-31 04:06:58'),
(26, 3, 'Komputer dapat meningkatkan kemampuannya dalam machine learning karena....', NULL, 4, '2026-05-31 21:00:21', '2026-05-31 21:00:21'),
(27, 3, 'Perbedaan utama antara data latih dan data uji adalah....', NULL, 5, '2026-05-31 21:01:21', '2026-05-31 21:01:21'),
(28, 3, 'Sebuah sistem AI dilatih untuk mengenali email spam menggunakan data yang sudah diberi label “spam” dan “bukan spam”. Analisis yang tepat terhadap metode yang digunakan adalah….', NULL, 6, '2026-05-31 21:01:53', '2026-05-31 21:01:53'),
(29, 3, 'Perhatikan dua kondisi berikut:\r\n(1) Data memiliki label yang jelas\r\n(2) Data tidak memiliki label dan perlu dicari polanya\r\n\r\nMetode yang tepat untuk masing-masing kondisi adalah….', NULL, 7, '2026-05-31 21:02:39', '2026-05-31 21:02:39'),
(30, 3, 'Berikut ini merupakan karakteristik machine learning, kecuali….', NULL, 8, '2026-05-31 21:03:17', '2026-05-31 21:03:17'),
(31, 3, 'Perhatikan pernyataan berikut terkait Machine Learning:\r\n(1) Model bekerja tanpa algoritma\r\n(2) Model selalu menghasilkan keputusan yang benar\r\n(3) Model machine learning belajar dari data\r\n(4) Data latih membantu model mengenali pola\r\n(5) Model dapat digunakan untuk memprediksi data baru\r\n\r\nPernyataan yang benar ditunjukkan oleh nomor ....', NULL, 9, '2026-05-31 21:04:15', '2026-05-31 21:04:15'),
(32, 3, 'Berdasarkan ilustrasi pohon keputusan pada gambar di samping, yang menunjukkan proses pemecahan data berdasarkn kondisi tertentu hingga menghasilkan keputusan melalui percabangan, dapat disimpulkan bahwa decision tree bekerja dengan ….', 'question_images/O21DtuChd3vXf30AogY6LWre1dBC4EMQemhsX0Fd.jpg', 10, '2026-05-31 21:04:43', '2026-05-31 21:05:23'),
(33, 4, 'Computational Thinking merupakan cara berpikir yang digunakan untuk....', NULL, 1, '2026-05-31 21:08:13', '2026-05-31 21:08:13'),
(34, 4, 'Cara berpikir komputer berbeda dengan manusia karena komputer....', NULL, 2, '2026-05-31 21:09:07', '2026-05-31 21:09:07'),
(35, 4, 'Seorang siswa mengusulkan untuk menghilangkan langkah mengaduk kopi agar proses lebih cepat. Berdasarkan prinsip computational thinking, penilaian yang paling tepat terhadap usulan tersebut adalah....', 'question_images/ifxnwwIgLCwffRD468OIZwr38tw6Wyitm2s8I07d.jpg', 3, '2026-05-31 21:09:44', '2026-05-31 21:10:59'),
(36, 4, 'Dekomposisi dalam Computational Thinking berfungsi untuk....', NULL, 4, '2026-05-31 21:11:38', '2026-05-31 21:11:38'),
(37, 4, 'Pengenalan pola dalam Computational Thinking dilakukan untuk ....', NULL, 5, '2026-05-31 21:12:19', '2026-05-31 21:12:19'),
(38, 4, 'Abstraksi diperlukan dalam Computational Thinking karena....', NULL, 6, '2026-05-31 21:12:54', '2026-05-31 21:12:54'),
(39, 4, 'Berikut ini merupakan komponen utama Computational Thinking, kecuali ....', NULL, 7, '2026-05-31 21:13:22', '2026-05-31 21:13:22'),
(40, 4, 'Perhatikan pernyataan berikut terkait Computational Thinking:\r\n(1) Computational Thinking membantu menyusun langkah penyelesaian masalah\r\n(2) Computational Thinking melibatkan dekomposisi dan abstraksi\r\n(3) Computational Thinking mengandalkan perasaan dalam mengambil keputusan\r\n(4) Computational Thinking digunakan dalam perancangan sistem kecerdasan buatan\r\n(5) Computational Thinking membuat komputer memiliki kesadaran diri\r\n\r\nPernyataan yang benar ditunjukkan oleh nomor ....', NULL, 8, '2026-05-31 21:14:08', '2026-05-31 21:14:08'),
(41, 4, 'Seorang siswa membuat logika sederhana untuk menentukan kategori nilai:\r\n• Jika nilai ≥ 90 → “Sangat Baik” \r\n• Jika nilai ≥ 75 → “Baik” \r\n• Jika nilai < 75 → “Perlu Perbaikan”\r\n \r\nBerdasarkan logika if–then–else, jika seorang siswa mendapatkan nilai 80, maka hasil yang ditampilkan adalah….', NULL, 9, '2026-05-31 21:17:02', '2026-05-31 21:17:02'),
(42, 4, 'Perhatikan gambar di bawah.\r\nFlowchart di bawah menggambarkan proses pengambilan keputusan seseorang sebelum berangkat ke sekolah. Alur flowchart tersebut adalah:\r\n• Mulai \r\n• Mengecek kondisi cuaca \r\n• Jika hujan → membawa payung \r\n• Jika tidak hujan → tidak membawa payung\r\n\r\nNamun, terdapat satu bagian yang dikosongkan (tanda ?). Bagian yang tepat untuk melengkapi flowchart tersebut adalah…', 'question_images/T4azeNi5OvqOSv2M95zCc3ieLHdI5GZgkPOu5p3I.jpg', 10, '2026-05-31 21:18:08', '2026-05-31 21:18:08'),
(43, 5, 'Sebuah aplikasi transportasi online menggunakan data lokasi pengguna untuk menentukan posisi penjemputan. Dalam konteks kecerdasan buatan, fungsi data pada kasus tersebut adalah….', NULL, 1, '2026-05-31 21:20:41', '2026-05-31 21:20:41'),
(44, 5, 'Dalam pengembangan sistem kecerdasan buatan, seorang programmer menyusun langkah-langkah logis untuk mengolah data menjadi keputusan. Langkah-langkah tersebut disebut….', NULL, 2, '2026-05-31 21:21:12', '2026-05-31 21:21:12'),
(45, 5, 'Sebuah sistem kecerdasan buatan mampu mengenali wajah seseorang setelah dilatih menggunakan banyak data gambar. Hal ini menunjukkan bahwa sistem tersebut menggunakan konsep….', NULL, 3, '2026-05-31 21:21:41', '2026-05-31 21:21:41'),
(46, 5, 'Seorang siswa mengalami kesulitan menyelesaikan proyek yang kompleks. Setelah itu, ia mencoba memecah masalah menjadi beberapa bagian kecil dan menyelesaikannya satu per satu.\r\nPendekatan yang dilakukan siswa tersebut menunjukkan bahwa….', NULL, 4, '2026-05-31 21:23:48', '2026-05-31 21:23:48'),
(47, 5, 'Sebuah platform media sosial mengumpulkan jutaan data pengguna setiap hari, termasuk teks, gambar, dan video. Data tersebut terus bertambah dan digunakan untuk meningkatkan layanan rekomendasi. Berdasarkan kasus tersebut, karakteristik Big Data yang paling tepat adalah….', NULL, 5, '2026-05-31 21:24:33', '2026-05-31 21:24:33'),
(48, 5, 'Sebuah sistem kecerdasan buatan menghasilkan keputusan yang tidak akurat karena data yang digunakan tidak lengkap. Hal ini menunjukkan bahwa….', NULL, 6, '2026-05-31 21:28:02', '2026-05-31 21:28:02'),
(49, 5, 'Perhatikan pernyataan berikut:\r\n(1) Kecerdasan buatan menggunakan data\r\n(2) Kecerdasan buatan menggunakan algoritma\r\n(3) Kecerdasan buatan tidak membutuhkan data\r\n(4) Kecerdasan buatan menghasilkan keputusan\r\n\r\nPernyataan yang benar adalah….', NULL, 7, '2026-05-31 21:28:32', '2026-05-31 21:28:32'),
(50, 5, 'Sebuah sistem kecerdasan buatan dikembangkan untuk memprediksi kelulusan siswa. Sistem tersebut dilatih menggunakan data nilai siswa sebelumnya yang sudah diberi keterangan “lulus” dan “tidak lulus”.\r\nBerdasarkan kasus tersebut, metode pembelajaran yang digunakan termasuk supervised learning karena….', NULL, 8, '2026-05-31 21:29:13', '2026-05-31 21:29:13'),
(51, 5, 'Sebuah sistem navigasi menggunakan algoritma untuk menentukan rute tercepat. Namun, karena urutan langkah dalam algoritma tidak tepat, sistem justru memberikan rute yang lebih lama.\r\nKesimpulan yang paling tepat adalah…', NULL, 9, '2026-05-31 21:29:42', '2026-05-31 21:29:42'),
(52, 5, 'Seorang siswa merancang sistem pemesanan makanan dengan hanya memperhatikan alur utama tanpa detail tampilan.\r\nTujuan dari abstraksi pada kasus tersebut adalah….', NULL, 10, '2026-05-31 21:30:14', '2026-05-31 21:30:14'),
(53, 5, 'Perhatikan beberapa teknologi berikut dalam lingkungan sekolah:\r\n(1) Sistem rekomendasi buku\r\n(2) Sistem absensi berbasis wajah\r\n(3) Asisten suara digital\r\n(4) Kalkulator sederhana\r\n\r\nTeknologi yang tidak memanfaatkan machine learning adalah….', NULL, 11, '2026-05-31 21:31:15', '2026-05-31 21:31:15'),
(54, 5, 'Perhatikan flowchart di bawah.\r\nSetelah dianalisis, hasil yang ditampilkan sering tidak sesuai dengan kondisi sebenarnya.\r\nAnalisis yang paling tepat terhadap kesalahan pada flowchart tersebut adalah….', 'question_images/GrFRyXE9YPB9KCyXgrksWT0iOXKc8VN5cYbm1IVs.png', 12, '2026-05-31 21:32:01', '2026-05-31 21:32:01'),
(55, 5, 'Data yang tidak seimbang dalam sebuah dataset dapat menyebabkan....', NULL, 13, '2026-05-31 21:32:36', '2026-05-31 21:32:36'),
(56, 5, 'Sebuah perusahaan mengelompokkan pelanggan berdasarkan kebiasaan belanja tanpa label kategori sebelumnya.\r\nMetode yang digunakan dalam kasus tersebut adalah….', NULL, 14, '2026-05-31 21:33:07', '2026-05-31 21:33:07'),
(57, 5, 'Perhatikan grafik di bawah.\r\nSebuah sistem kecerdasan buatan dilatih menggunakan data seperti pada grafik di bawah. Setelah digunakan, sistem tersebut memberikan rekomendasi yang kurang sesuai untuk pengguna perempuan.\r\nAnalisis yang paling tepat adalah….', 'question_images/mPArCXh7sT8AZSNFxUxm911EUFiC1lGvFNvJUyum.png', 15, '2026-05-31 21:35:15', '2026-05-31 21:35:15'),
(58, 5, 'Perhatikan tabel di bawah.\r\nSebuah model machine learning dilatih menggunakan dataset seperti pada tabel di atas.\r\nSetelah diuji, model cenderung lebih sering mengklasifikasikan gambar sebagai “Soto Banjar”.\r\nAnalisis yang paling tepat adalah….', 'question_images/f3aDyvCWh2dFKCod2MJoc6glttfgLUppetBBhq0V.png', 16, '2026-05-31 21:36:33', '2026-05-31 21:36:33'),
(59, 5, 'Perhatikan pernyataan berikut:\r\n(1) Data menjadi dasar pembelajaran kecerdasan buatan\r\n(2) Algoritma membantu pengambilan keputusan\r\n(3) Komputer memiliki kesadaran diri\r\n(4) Machine Learning belajar dari data\r\n(5) Kecerdasan buatan bekerja berdasarkan intuisi.\r\n\r\nPernyataan yang benar ditunjukkan oleh nomor ....', NULL, 17, '2026-05-31 21:37:14', '2026-05-31 21:37:14'),
(60, 5, 'Sebuah sistem kecerdasan buatan mampu memproses data dan menghasilkan keputusan secara cepat, tetapi tidak memiliki kesadaran seperti manusia.\r\nPernyataan yang tidak sesuai dengan karakteristik kecerdasan buatan adalah….', NULL, 18, '2026-05-31 21:37:43', '2026-05-31 21:37:43'),
(61, 5, 'Perhatikan pernyataan berikut:\r\n(1) Computational Thinking membantu memecah masalah\r\n(2) Computational Thinking digunakan dalam kecerdasan buatan\r\n(3) Computational Thinking menyusun langkah logis\r\n(4) Computational Thinking mengandalkan perasaan\r\n\r\nPernyataan yang benar ditunjukkan oleh nomor ....', NULL, 19, '2026-05-31 21:38:53', '2026-05-31 21:38:53'),
(62, 5, 'Sebuah sistem kecerdasan buatan dikembangkan tanpa menggunakan data yang memadai, algoritma yang jelas, dan pendekatan computational thinking yang tepat. Akibatnya, sistem tidak mampu memberikan solusi yang sesuai.\r\nAnalisis yang paling tepat terhadap kondisi tersebut adalah….', NULL, 20, '2026-05-31 21:39:40', '2026-05-31 21:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_minutes` int UNSIGNED NOT NULL DEFAULT '30',
  `points_per_question` int UNSIGNED NOT NULL DEFAULT '10',
  `kkm` int UNSIGNED NOT NULL DEFAULT '75',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `duration_minutes`, `points_per_question`, `kkm`, `created_at`, `updated_at`) VALUES
(1, 'Kuis 1 : Data', 10, 10, 75, NULL, '2026-05-31 03:45:17'),
(2, 'Kuis 2 : Algoritma', 30, 10, 75, NULL, NULL),
(3, 'Kuis 3 : Machine Learning', 30, 10, 75, NULL, NULL),
(4, 'Kuis 4 : Computational Thinking', 30, 10, 75, NULL, NULL),
(5, 'Evaluasi', 30, 5, 75, NULL, '2026-05-31 21:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_attempts`
--

CREATE TABLE `quiz_attempts` (
  `id` bigint UNSIGNED NOT NULL,
  `quiz_id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int UNSIGNED NOT NULL DEFAULT '0',
  `correct_count` int UNSIGNED NOT NULL DEFAULT '0',
  `total_questions` int UNSIGNED NOT NULL DEFAULT '0',
  `started_at` timestamp NULL DEFAULT NULL,
  `finished_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_attempts`
--

INSERT INTO `quiz_attempts` (`id`, `quiz_id`, `user_id`, `student_name`, `score`, `correct_count`, `total_questions`, `started_at`, `finished_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Salsabila Andriani', 10, 1, 1, '2026-02-19 18:46:18', '2026-02-19 18:46:20', '2026-02-19 18:46:20', '2026-02-19 18:46:20'),
(2, 1, 1, 'Salsabila Andriani', 0, 0, 1, '2026-02-26 04:41:11', '2026-02-26 04:41:17', '2026-02-26 04:41:17', '2026-02-26 04:41:17'),
(3, 1, 1, 'Salsabila Andriani', 30, 3, 10, '2026-03-22 21:50:39', '2026-03-22 21:51:01', '2026-03-22 21:51:01', '2026-03-22 21:51:01'),
(4, 1, 1, 'Salsabila Andriani', 100, 10, 10, '2026-03-22 21:52:49', '2026-03-22 21:53:06', '2026-03-22 21:53:06', '2026-03-22 21:53:06'),
(5, 1, 1, 'Salsabila Andriani', 100, 10, 10, '2026-03-22 21:57:25', '2026-03-22 21:57:42', '2026-03-22 21:57:42', '2026-03-22 21:57:42'),
(6, 1, 1, 'Salsabila Andriani', 100, 10, 10, '2026-03-22 22:10:24', '2026-03-22 22:10:40', '2026-03-22 22:10:40', '2026-03-22 22:10:40'),
(7, 1, 3, 'nida', 100, 10, 10, '2026-03-28 00:29:08', '2026-03-28 00:29:59', '2026-03-28 00:29:59', '2026-03-28 00:29:59'),
(8, 1, 3, 'nida', 27, 3, 11, '2026-04-20 05:27:50', '2026-04-20 05:28:14', '2026-04-20 05:28:14', '2026-04-20 05:28:14'),
(9, 1, 5, 'Nabila', 80, 8, 10, '2026-06-04 23:04:05', '2026-06-04 23:05:15', '2026-06-04 23:05:15', '2026-06-04 23:05:15'),
(10, 2, 5, 'Nabila', 80, 8, 10, '2026-06-04 23:17:41', '2026-06-04 23:18:31', '2026-06-04 23:18:31', '2026-06-04 23:18:31'),
(11, 3, 5, 'Nabila', 100, 10, 10, '2026-06-04 23:19:02', '2026-06-04 23:19:28', '2026-06-04 23:19:28', '2026-06-04 23:19:28'),
(12, 4, 5, 'Nabila', 100, 10, 10, '2026-06-04 23:20:15', '2026-06-04 23:22:52', '2026-06-04 23:22:52', '2026-06-04 23:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('uw6jDTbOP3VNIeOYPT8DxCjRW7ppuyUR2sgO76UU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUXJoUk9laE1kSWlORzRySksxaG85a2RNVXBvWUJLMDl5RmdKSWRndCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo3OiJsYW5kaW5nIjt9fQ==', 1780802978);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usertype` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `avatar`, `email`, `kelas`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `usertype`) VALUES
(1, 'Salsabila Andriani', 'avatar4.jpg', 'salsa@gmail.com', 'A', NULL, '$2y$12$xE9/pkgUKVX/jHpLjYAAsuvXt9OrSNZyLIiv54mieJquHwQmUviLO', NULL, '2026-02-19 04:13:29', '2026-06-04 17:39:53', 'user'),
(2, 'guru', 'avatar3.jpg', 'guru@gmail.com', NULL, NULL, '$2y$12$kaKBtY.j.k1KIsl1Z4OmTulUJVgk9m1jCQ.HNifVpnt0JfK96R7u2', NULL, NULL, '2026-06-04 17:39:53', 'admin'),
(3, 'nida', 'avatar4.jpg', 'nida@gmail.com', 'B', NULL, '$2y$12$ohsS3FNZ2MS8IIsdVqQeCOlcvUzH9iZUoFdw6hi26xTn32HDMA2W6', NULL, '2026-03-22 23:06:28', '2026-06-04 17:39:53', 'user'),
(4, 'guru2', 'avatar3.jpg', 'guru2@gmail.com', NULL, NULL, '$2y$12$1eJRYU2G7iKYFcsbzIsYP.kWEs3.hVpEnUSM4/DmYt04inr6Rz0Z.', NULL, NULL, '2026-06-04 17:39:53', 'admin'),
(5, 'Nabila', 'avatar2.jpg', 'nabila@gmail.com', 'E', NULL, '$2y$12$G9NdgRLETcs9xoCz74awzu7b.eo8HjnSD7Wkf3LtqQnjzYhOOE5XS', NULL, '2026-06-04 17:44:15', '2026-06-04 17:44:15', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_badges`
--

CREATE TABLE `user_badges` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `badge_id` bigint UNSIGNED NOT NULL,
  `earned_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_badges`
--

INSERT INTO `user_badges` (`id`, `user_id`, `badge_id`, `earned_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-03-22 21:57:42', '2026-03-22 21:57:42', '2026-03-22 21:57:42'),
(2, 3, 1, '2026-03-28 00:29:59', '2026-03-28 00:29:59', '2026-03-28 00:29:59'),
(3, 5, 1, '2026-06-04 23:05:15', '2026-06-04 23:05:15', '2026-06-04 23:05:15'),
(4, 5, 2, '2026-06-04 23:18:31', '2026-06-04 23:18:31', '2026-06-04 23:18:31'),
(5, 5, 3, '2026-06-04 23:19:28', '2026-06-04 23:19:28', '2026-06-04 23:19:28'),
(6, 5, 4, '2026-06-04 23:22:52', '2026-06-04 23:22:52', '2026-06-04 23:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_points`
--

CREATE TABLE `user_points` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_xp` int NOT NULL DEFAULT '0',
  `level` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_points`
--

INSERT INTO `user_points` (`id`, `user_id`, `total_xp`, `level`, `created_at`, `updated_at`) VALUES
(1, 1, 100, 1, '2026-03-22 22:10:40', '2026-03-22 22:10:40'),
(2, 3, 100, 1, '2026-03-28 00:29:59', '2026-03-28 00:29:59'),
(3, 5, 360, 2, '2026-06-04 23:05:15', '2026-06-05 00:02:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempt_answers`
--
ALTER TABLE `attempt_answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attempt_answers_quiz_attempt_id_question_id_unique` (`quiz_attempt_id`,`question_id`),
  ADD KEY `attempt_answers_question_id_foreign` (`question_id`),
  ADD KEY `attempt_answers_option_id_foreign` (`option_id`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `badges_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi_progress`
--
ALTER TABLE `materi_progress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materi_progress_user_id_materi_key_unique` (`user_id`,`materi_key`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `options_question_id_option_label_unique` (`question_id`,`option_label`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_attempts_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_badges_user_id_badge_id_unique` (`user_id`,`badge_id`),
  ADD KEY `user_badges_badge_id_foreign` (`badge_id`);

--
-- Indexes for table `user_points`
--
ALTER TABLE `user_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_points_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attempt_answers`
--
ALTER TABLE `attempt_answers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materi_progress`
--
ALTER TABLE `materi_progress`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_badges`
--
ALTER TABLE `user_badges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_points`
--
ALTER TABLE `user_points`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attempt_answers`
--
ALTER TABLE `attempt_answers`
  ADD CONSTRAINT `attempt_answers_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `attempt_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attempt_answers_quiz_attempt_id_foreign` FOREIGN KEY (`quiz_attempt_id`) REFERENCES `quiz_attempts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `badges`
--
ALTER TABLE `badges`
  ADD CONSTRAINT `badges_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `materi_progress`
--
ALTER TABLE `materi_progress`
  ADD CONSTRAINT `materi_progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD CONSTRAINT `quiz_attempts_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD CONSTRAINT `user_badges_badge_id_foreign` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_badges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_points`
--
ALTER TABLE `user_points`
  ADD CONSTRAINT `user_points_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

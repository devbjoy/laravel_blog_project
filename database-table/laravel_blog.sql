-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 03, 2024 at 06:21 PM
-- Server version: 8.3.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('biplob@gmail.com|127.0.0.1:timer', 'i:1720451743;', 1720451743),
('biplob@gmail.com|127.0.0.1', 'i:1;', 1720451743),
('bijoyshaha38@gmail.com|127.0.0.1:timer', 'i:1721110430;', 1721110430),
('bijoyshaha38@gmail.com|127.0.0.1', 'i:1;', 1721110430),
('bijoyshaha@gmail.com|127.0.0.1:timer', 'i:1721110442;', 1721110442),
('bijoyshaha@gmail.com|127.0.0.1', 'i:1;', 1721110442);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Declan Mccarthy', 'declan-mccarthy', 0, '2024-06-30 06:49:39', '2024-07-26 10:48:17'),
(2, 'Fresh Mango', 'fresh-mango', 1, '2024-06-20 23:12:57', '2024-06-20 23:12:57'),
(3, 'Tesla Car', 'tesla-car', 0, '2024-06-20 23:36:59', '2024-07-26 10:48:31'),
(4, 'Mobile Apple', 'mobile-apple', 1, '2024-06-20 23:39:58', '2024-06-20 23:39:58'),
(5, 'mobile readmi', 'mobile-readmi', 0, '2024-06-20 23:41:24', '2024-06-20 23:41:24'),
(6, 'milks cow', 'milks-cow', 0, '2024-06-20 23:44:39', '2024-07-26 10:48:43'),
(8, 'Alexander Curtis', 'alexander-curtis', 0, '2024-06-30 06:49:46', '2024-06-30 06:49:46'),
(9, 'Lance Santos', 'lance-santos', 0, '2024-06-30 06:50:01', '2024-07-26 10:48:53'),
(10, 'Lance Castro', 'lance-castro', 0, '2024-06-30 06:50:15', '2024-06-30 06:50:15'),
(11, 'Sopoline Floyd', 'sopoline-floyd', 0, '2024-06-30 06:50:24', '2024-07-26 10:49:00'),
(12, 'Paula Stewart', 'paula-stewart', 1, '2024-06-30 06:51:14', '2024-06-30 06:51:14'),
(13, 'Politics', 'politics', 1, '2024-07-26 02:12:15', '2024-07-26 02:12:15'),
(14, 'Business', 'business', 1, '2024-07-26 02:13:27', '2024-07-26 02:13:27'),
(15, 'sports', 'sports', 1, '2024-07-26 02:14:25', '2024-07-26 02:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`),
  KEY `comments_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 5, 4, 'good news', '2024-07-30 10:09:43', '2024-07-30 10:09:43'),
(2, 5, 4, 'nice', '2024-07-30 11:08:12', '2024-07-30 11:08:12'),
(3, 5, 4, 'hello world', '2024-07-30 12:05:03', '2024-07-30 12:05:03'),
(4, 7, 4, 'nice video', '2024-07-31 07:51:38', '2024-07-31 07:51:38'),
(5, 7, 4, 'hello friends', '2024-07-31 08:02:01', '2024-07-31 08:02:01'),
(9, 10, 4, 'this is first comment', '2024-07-31 11:40:28', '2024-07-31 11:40:28'),
(7, 11, 4, 'add new comment', '2024-07-31 09:09:34', '2024-07-31 09:09:34'),
(10, 2, 4, 'he is a women', '2024-07-31 11:42:06', '2024-07-31 11:42:06'),
(11, 4, 4, 'nice t-shirt', '2024-07-31 11:45:57', '2024-07-31 11:45:57'),
(12, 9, 4, 'hi', '2024-08-01 06:21:35', '2024-08-01 06:21:35'),
(13, 2, 4, 'hello women', '2024-08-02 03:51:41', '2024-08-02 03:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

DROP TABLE IF EXISTS `comment_replies`;
CREATE TABLE IF NOT EXISTS `comment_replies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `comment_reply` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_replies_comment_id_foreign` (`comment_id`),
  KEY `comment_replies_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_replies`
--

INSERT INTO `comment_replies` (`id`, `comment_id`, `user_id`, `comment_reply`, `created_at`, `updated_at`) VALUES
(6, 10, 4, 'be carefull', '2024-07-31 11:42:22', '2024-07-31 11:42:22'),
(5, 9, 4, 'nice posts', '2024-07-31 11:41:12', '2024-07-31 11:41:12'),
(7, 10, 4, 'have a nice day', '2024-07-31 11:42:38', '2024-07-31 11:42:38'),
(8, 7, 4, 'hello friend', '2024-08-01 05:27:36', '2024-08-01 05:27:36'),
(9, 12, 4, 'be carefull', '2024-08-01 06:21:53', '2024-08-01 06:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `featured_news`
--

DROP TABLE IF EXISTS `featured_news`;
CREATE TABLE IF NOT EXISTS `featured_news` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` int NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `show_home` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `unset_featured` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `featured_news`
--

INSERT INTO `featured_news` (`id`, `title`, `slug`, `description`, `image`, `category_id`, `user_id`, `status`, `date`, `publish`, `show_home`, `unset_featured`, `created_at`, `updated_at`) VALUES
(1, 'Laboriosam qui veri', 'laboriosam-qui-veri', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a', 'feature-news-images/1722106233-nulla-pariatur-excepteur-sint-occaecat-cupidatat-non-proident-sunt-in-culpa-qui-officia-deserunt-mol_1607663720-b.jpg', 15, 4, 1, '07/29/2024', 'Yes', 'Yes', 'No', '2024-07-27 12:50:33', '2024-07-29 08:23:09'),
(2, 'Veritatis eum et sit', 'veritatis-eum-et-sit', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a', 'feature-news-images/1722106255-download (8).jpg', 15, 4, 1, '07/29/2024', 'Yes', 'Yes', 'No', '2024-07-27 12:50:55', '2024-07-29 08:23:20'),
(3, 'Quia minima non fugi', 'quia-minima-non-fugi', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a', 'feature-news-images/1722106274-temporibus-autem-quibusdam-et-aut-officiis-debitis-aut-rerum-necessitatibus-saepe-eveniet-ut-et-volu_1607661139-b.jpg', 15, 4, 1, '07/29/2024', 'Yes', 'Yes', 'No', '2024-07-27 12:51:14', '2024-07-29 08:23:33'),
(4, 'Iste eiusmod eos vol', 'iste-eiusmod-eos-vol', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a', 'feature-news-images/1722106303-democrat-joseph-biden-has-won-the-election-to-become-the-46th-president-of-the-us_1607591312-b.jpg', 13, 4, 1, '07/29/2024', 'Yes', 'No', 'Yes', '2024-07-27 12:51:43', '2024-07-29 08:23:46'),
(5, 'Officiis dolore reru', 'officiis-dolore-reru', 'Nulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore pariaNulla tempore paria', 'feature-news-images/1722261054-download (4).jpg', 2, 4, 0, '07/29/2024', 'No', 'No', 'No', '2024-07-29 07:50:54', '2024-07-29 07:50:54'),
(6, 'Quas facilis impedit', 'quas-facilis-impedit', 'Illum in obcaecati', 'feature-news-images/1722261440-download (9).jpg', 2, 4, 0, '07/29/2024', 'No', 'Yes', 'Yes', '2024-07-29 07:57:20', '2024-07-29 07:57:20'),
(7, 'Quas facilis impedit', 'quas-facilis-impedit', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a', 'feature-news-images/1722261573-download (9).jpg', 2, 4, 0, '07/29/2024', 'No', 'Yes', 'Yes', '2024-07-29 07:59:33', '2024-07-29 08:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `featured_new_tag`
--

DROP TABLE IF EXISTS `featured_new_tag`;
CREATE TABLE IF NOT EXISTS `featured_new_tag` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `featured_new_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `featured_new_tag_featured_new_id_foreign` (`featured_new_id`),
  KEY `featured_new_tag_tag_id_foreign` (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `featured_new_tag`
--

INSERT INTO `featured_new_tag` (`id`, `featured_new_id`, `tag_id`) VALUES
(1, 7, 1),
(3, 1, 1),
(4, 1, 5),
(5, 2, 3),
(6, 2, 4),
(7, 3, 3),
(8, 3, 5),
(9, 4, 1),
(10, 4, 4),
(11, 5, 1),
(12, 5, 3),
(13, 5, 4),
(14, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_21_044112_create_categories_table', 2),
(5, '2024_06_22_090303_create_posts_table', 3),
(6, '2024_06_23_150112_create_sliders_table', 4),
(17, '2024_07_27_174310_alter_sliders_table', 13),
(8, '2024_06_29_161946_create_tags_table', 6),
(9, '2024_06_30_052119_create_taggables_table', 7),
(10, '2024_07_08_140632_create_user_images_table', 8),
(11, '2024_07_16_062455_create_settings_table', 9),
(12, '2024_07_26_065631_alter_posts_table', 10),
(13, '2024_07_26_074341_alter_posts_table', 11),
(14, '2024_07_26_082918_alter_sliders_table', 12),
(18, '2024_07_27_184117_create_featured_news_table', 14),
(19, '2024_07_28_114108_create_slider_tag_table', 15),
(20, '2024_07_29_132634_alter_featured_news_table', 16),
(23, '2024_07_29_133533_create_featured_tag_table', 17),
(24, '2024_07_30_111836_create_comments_table', 18),
(25, '2024_07_31_152432_create_comment_replies_table', 19),
(26, '2024_08_01_093756_alter_users_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('bijoy@gmail.com', '$2y$12$ujXmP1wK6zRs.YGKaZgF/.aEidxSrK9VaaX76mmC4KDbtIf/6sbpu', '2024-07-08 09:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `views` bigint UNSIGNED NOT NULL DEFAULT '0',
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `meta_title`, `slug`, `post_image`, `description`, `meta_description`, `keyword`, `category_id`, `user_id`, `views`, `date`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Business is the practice of making', 'buying and selling products.', 'business-is-the-practice-of-making', 'post-images/1719074569-download (11).jpg', 'Business is the practice of making one\'s living or making money by producing or buying and selling products. It is also \"any activity or enterprise entered into for profit.\" A', 'Business is the practice of making one\'s living or making money by producing or buying and selling products. It is also \"any activity or enterprise entered into for profit.\" A', 'business stratege', 14, 4, 106, '07/26/2024', 1, '2024-06-22 04:48:41', '2024-07-26 12:44:18'),
(4, 'Ad labore reiciendis', 'Aliquip assumenda id', 'ad-labore-reiciendis', 'post-images/1719727895-download (2).jfif', 'A paragraph is a self-contained unit of discourse in writing dealing with a particular point or idea. Though not required by the orthographic conventions of any language with a writing system, paragraphs are a conventional means of organizing extended segments of prose. Wikipedia', 'Omnis a consequatur', 'Mollit velit fugiat', 14, 4, 66, '07/26/2024', 1, '2024-06-30 00:11:35', '2024-07-26 12:46:27'),
(5, 'Vero quia non volupt', 'Officia fugiat nulla', 'vero-quia-non-volupt', 'post-images/1719751554-download (3).jfif', 'A paragraph is a self-contained unit of discourse in writing dealing with a particular point or idea. Though not required by the orthographic conventions of any language with a writing system, paragraphs are a conventional means of organizing extended segments of prose. Wikipedia', 'Ipsum id vero eius', 'Voluptas culpa aliq', 15, 4, 66, '07/26/2024', 1, '2024-06-30 06:45:54', '2024-07-26 12:46:42'),
(6, 'Aute veritatis commo', 'Voluptate laboriosam', 'aute-veritatis-commo', 'post-images/1719751627-download (5).jpg', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a', 'Ab impedit minima a', 'Culpa officiis qui c', 5, 4, 67, '07/26/2024', 1, '2024-06-30 06:47:07', '2024-07-26 10:30:27'),
(7, 'mango', 'Culpa consequat Ex', 'mango', 'post-images/1721928574-download.jfif', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'Est adipisicing porr', 'Beatae dolore aut se', 3, 4, 67, '07/26/2024', 1, '2024-07-25 11:29:35', '2024-07-26 10:30:27'),
(8, 'banana', 'Non quibusdam dolore', 'banana', 'post-images/1721928599-images (1).jpg', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'Qui enim lorem quaer', 'Et dolor eum minima', 8, 4, 108, '07/26/2024', 1, '2024-07-25 11:29:59', '2024-07-26 10:31:58'),
(9, 'orange', 'Et ut sit ut sequi d', 'orange', 'post-images/1721928622-images (2).jpg', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'Autem dolorem volupt', 'Numquam voluptas hic', 12, 4, 82, '07/25/2024', 1, '2024-07-25 11:30:22', '2024-07-26 10:30:27'),
(10, 'Possimus qui neque', 'Ut reprehenderit pra', 'possimus-qui-neque', 'post-images/1721977662-images.jpg', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on', 'Aliquip qui reiciend', 'Illo facilis et non', 14, 4, 109, '07/26/2024', 1, '2024-07-26 01:07:42', '2024-07-26 10:31:58'),
(11, 'Eu aut in qui dolor', 'Ab quasi harum aliqu', 'eu-aut-in-qui-dolor', 'post-images/1722021012-download (7).jpg', 'A paragraph is defined as “a group of sentences or a single sentence that forms a unit” (Lunsford and Connors 116). Length and appearance do not determine whether a section in a paper is a paragraph. For instance, in some styles of writing, particularly journalistic styles, a paragraph can be just one', 'Iusto sunt est dolor', 'Laboriosam quis cum', 13, 4, 0, '07/26/2024', 1, '2024-07-26 13:10:12', '2024-07-26 13:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
CREATE TABLE IF NOT EXISTS `post_tag` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_tag_post_id_foreign` (`post_id`),
  KEY `post_tag_tag_id_foreign` (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(6, 4, 5),
(5, 4, 4),
(7, 5, 3),
(11, 5, 1),
(9, 6, 4),
(10, 6, 5),
(12, 2, 1),
(13, 2, 3),
(14, 7, 1),
(15, 7, 3),
(16, 8, 3),
(17, 8, 5),
(18, 9, 3),
(19, 9, 4),
(20, 10, 3),
(21, 10, 4),
(22, 11, 3),
(23, 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5nRPkyjuUZ36y5EzeneWecRuMoVr8IJUUWrIBWWe', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYWF6VDJqOWlLVlpyaThsVFpWVW5VTFZLS1RMTHJwdkptYXUyc082cyI7czozOiJ1cmwiO2E6MDp7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zZXR0aW5nIjt9fQ==', 1722618334);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `meta_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `meta_key`, `meta_value`) VALUES
(1, 'timezone', 'dhaka'),
(2, 'site_style', 'red'),
(3, 'site_name', 'migysi@mailinator.com'),
(4, 'site_email', 'dyguhi@mailinator.com'),
(5, 'site_description', 'Distinctio Sit bla'),
(6, 'copyright_text', 'Doloribus quia qui d'),
(7, 'envato_buyer-details', 'Et rem aliqua Sunt'),
(8, 'envato_username', 'zyrytitoc'),
(9, 'envato_purchase_code', 'zizijimu@mailinator.com'),
(10, 'site_logo', 'site_image/66ad09d8df917.png'),
(11, 'favicon', 'site_image/66ad0afde9301.jpg'),
(12, 'mail_host', 'hyce@mailinator.com'),
(13, 'mail_from_address', 'bijoy@gmail.com'),
(14, 'app_password', 'Pa$$w0rd!'),
(15, 'mail_port', '88'),
(16, 'mail_encription', 'SSL'),
(17, 'addthis_code', 'Exercitation odio iu'),
(18, 'disqus_comment_code', 'Perspiciatis quo as'),
(19, 'facebook_comment_code', 'Ea exercitationem te'),
(20, 'header_code', 'Quidem quisquam rem'),
(21, 'footer_code', 'Nisi dolore ut ad au');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` int NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_homepage` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `publish` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `slug`, `description`, `slider_image`, `category_id`, `user_id`, `status`, `date`, `show_homepage`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Biden Wins Presidency and Calls for Nation to Heal', 'biden-wins-presidency-and-calls-for-nation-to-heal', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on', 'slider-images/1719161456-download (1).jpg', 5, 4, 1, '07/29/2024', 'Yes', 'Yes', '2024-06-23 09:46:47', '2024-07-29 02:29:46'),
(3, 'Japan’s virus success has puzzled the world. Is its luck running out?', 'japans-virus-success-has-puzzled-the-world-is-its-luck-running-out', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on', 'slider-images/1719161563-download.jpg', 4, 4, 1, '07/29/2024', 'Yes', 'Yes', '2024-06-23 10:52:43', '2024-07-29 02:42:08'),
(4, 'Architecto eos omnis', 'architecto-eos-omnis', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on', 'slider-images/1719752395-download (8).jpg', 2, 4, 0, '07/27/2024', 'Yes', 'Yes', '2024-06-30 06:59:55', '2024-07-27 13:11:08'),
(5, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..', 'neque-porro-quisquam-est-qui-dolorem-ipsum-quia-dolor-sit-amet-consectetur-adipisci-velit', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on', 'slider-images/1721981491-democrat-joseph-biden-has-won-the-election-to-become-the-46th-president-of-the-us_1607591312-b.jpg', 13, 4, 1, '07/29/2024', 'Yes', 'Yes', '2024-07-26 02:11:31', '2024-07-29 02:30:34'),
(6, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..', 'neque-porro-quisquam-est-qui-dolorem-ipsum-quia-dolor-sit-amet-consectetur-adipisci-velit', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on', 'slider-images/1721981583-quis-autem-vel-eum-iure-reprehenderit-qui-in-ea-voluptate-velit-esse-quam-nihil-molestiae-consequatu_1607669458-b.jpg', 14, 4, 1, '07/27/2024', 'Yes', 'Yes', '2024-07-26 02:13:03', '2024-07-27 13:11:24'),
(7, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..', 'neque-porro-quisquam-est-qui-dolorem-ipsum-quia-dolor-sit-amet-consectetur-adipisci-velit', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on', 'slider-images/1721981652-temporibus-autem-quibusdam-et-aut-officiis-debitis-aut-rerum-necessitatibus-saepe-eveniet-ut-et-volu_1607661139-b.jpg', 15, 4, 1, '07/27/2024', 'Yes', 'Yes', '2024-07-26 02:14:12', '2024-07-27 13:11:32'),
(8, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..', 'neque-porro-quisquam-est-qui-dolorem-ipsum-quia-dolor-sit-amet-consectetur-adipisci-velit', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on', 'slider-images/1721981709-uber-and-lyft-are-finally-available-in-all-of-new-york-state_1607748264-b.jpg', 12, 4, 1, '07/27/2024', 'Yes', 'Yes', '2024-07-26 02:15:09', '2024-07-27 13:11:39'),
(9, 'Harum id sed minus e', 'harum-id-sed-minus-e', 'This application is uniquely different in that it is as much art (performance art?) as it is entertaining. I am so pleased that Joerg decided to take the time ..', 'slider-images/1722168307-download (4).jpg', 13, 4, 0, '07/28/2024', 'No', 'No', '2024-07-28 06:05:07', '2024-07-28 06:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `slider_tag`
--

DROP TABLE IF EXISTS `slider_tag`;
CREATE TABLE IF NOT EXISTS `slider_tag` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slider_tag_slider_id_foreign` (`slider_id`),
  KEY `slider_tag_tag_id_foreign` (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_tag`
--

INSERT INTO `slider_tag` (`id`, `slider_id`, `tag_id`) VALUES
(2, 1, 5),
(3, 5, 5),
(4, 3, 3),
(5, 3, 4),
(6, 1, 1),
(7, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'Business'),
(3, 'News'),
(4, 'Sports'),
(5, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_image`, `created_at`, `updated_at`) VALUES
(4, 'bijoy saha', 'bijoy@gmail.com', NULL, '$2y$12$OQwqKzUFSlrGtKhIQeLBU.SnEOsulkIPCpA6oyXGsZqAWJCM50DgG', NULL, 'user-images/1722508514-IMG_20240318_005815.jpg', '2024-07-08 09:20:08', '2024-08-01 04:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

DROP TABLE IF EXISTS `user_images`;
CREATE TABLE IF NOT EXISTS `user_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

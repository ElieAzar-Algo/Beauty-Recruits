-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2021 at 09:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beauty-recruits`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `applicant_id`, `job_id`, `answer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 43, 10, 'hello dear this is my answer', '2021-07-24 20:31:50', '2021-07-24 20:31:50', NULL),
(2, 43, 10, 'thank you for your question', '2021-07-24 21:13:53', '2021-07-24 21:13:53', NULL),
(3, 43, 10, 'hello', '2021-07-24 21:19:23', '2021-07-24 21:19:23', NULL),
(4, 51, 10, 'hello', '2021-07-25 18:55:56', '2021-07-25 18:55:56', NULL),
(5, 51, 9, 'hello', '2021-07-25 18:56:06', '2021-07-25 18:56:06', NULL),
(6, 51, 10, 'hello', '2021-07-25 18:56:16', '2021-07-25 18:56:16', NULL),
(7, 51, 9, 'hello sir', '2021-07-25 19:27:06', '2021-07-25 19:27:06', NULL),
(8, 51, 9, 'hello sir', '2021-07-25 19:28:16', '2021-07-25 19:28:16', NULL),
(9, 51, 11, 'this is a test answer from elie azar', '2021-07-26 15:09:01', '2021-07-26 15:09:01', NULL),
(10, 55, 11, 'this is a test answer for job 11', '2021-07-27 19:37:44', '2021-07-27 19:37:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_answered` tinyint(4) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume_pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `years_of_experience` int(11) NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `expertise_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verification` tinyint(4) NOT NULL DEFAULT 0,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `username`, `email`, `password`, `full_name`, `has_answered`, `title`, `description`, `location`, `resume_pdf`, `phone`, `years_of_experience`, `verified`, `created_at`, `updated_at`, `deleted_at`, `expertise_id`, `token`, `email_verification`, `photo`) VALUES
(51, 'elieazar', 'elie.aza@live.com', '$2y$10$/x57eHqHuUfoxB3vvbjGP.UKgTbPOYUuVywL4ne1S1x2XqkPioC2q', 'elieazar', 1, 'developer', 'hello', 'beirut', 'public/applicant-resumes/MyResume-elieazar2021-07-25-09-10-38pm.pdf', '7000000', 2, 1, '2021-07-25 18:10:39', '2021-07-25 18:14:25', NULL, 2, 'cdabc35b8f68f9428576f8ce8e49b2b3', 1, 'applicant-photos/MyPhoto-elieazar2021-07-25-09-10-38pm.jpg'),
(52, 'adama', 'elie.azar3891@gmail.com', '$2y$10$/5EBsSQKZmta8t6tI668v.DVV7VyI2XXf5eBcptMj.P/bXIZ6XH6m', 'Adam Azar', 1, 'engineer', 'popopopo', 'beirut', 'public/applicant-resumes/MyResume-adama2021-07-25-09-15-56pm.pdf', '7000000', 2, 1, '2021-07-25 18:15:56', '2021-07-25 18:15:56', NULL, 1, '42dc9430f3b0d4acb19f7af6ac54e595', 1, 'applicant-photos/MyPhoto-adama2021-07-25-09-15-56pm.jpg'),
(53, 'marcmatta123', 'marcmatta@live.com', '$2y$10$q8HNn0rFLzkCwY.sPS0FoeNnGxvKcxseaJFjjdksHRfODrUrt7PMu', 'Elie Azar', 1, 'Developer', 'this is a test', 'Lebanon', 'public/applicant-resumes/MyResume-marcmatta1232021-07-26-06-19-49pm.pdf', '70000', 2, 1, '2021-07-26 15:19:00', '2021-07-27 18:20:55', NULL, 2, '64200bd1431b53e87ff07eddd64428a4', 1, 'applicant-photos/MyPhoto-marcmatta1232021-07-26-06-19-49pm.jpg'),
(55, 'lazarusfx', 'elie.azar@live.com', '$2y$10$eDJvBP.zXApYTCOLdLhUmeUnuOMlcWB4fzZeBsXXYeq9VvUFgqxSm', 'Elie Kamal Azar', 1, 'Engineer', 'This is a test description for an applicant', 'Beirut, Lebanon', 'public/applicant-resumes/MyResume-lazarusfx2021-07-27-10-33-17pm.pdf', '+96170647025', 2, 1, '2021-07-27 19:33:00', '2021-07-27 19:36:34', NULL, 1, 'ed8f4f3fb5455c643598760d11b8e449', 1, 'applicant-photos/MyPhoto-lazarusfx2021-07-27-10-33-17pm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_job`
--

CREATE TABLE `applicant_job` (
  `id` int(10) UNSIGNED NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_job`
--

INSERT INTO `applicant_job` (`id`, `applicant_id`, `job_id`, `created_at`, `updated_at`) VALUES
(1, 51, 10, '2021-07-24 21:13:53', '2021-07-24 21:13:53'),
(3, 52, 10, '2021-07-24 21:19:23', '2021-07-24 21:19:23'),
(7, 51, 9, '2021-07-25 19:28:16', '2021-07-25 19:28:16'),
(8, 51, 11, '2021-07-26 15:09:01', '2021-07-26 15:09:01'),
(9, 55, 11, '2021-07-27 19:37:44', '2021-07-27 19:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(2, NULL, 1, 'Category 2', 'category-2', '2021-07-11 16:23:01', '2021-07-11 16:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `expertise_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verification` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `username`, `email`, `password`, `name`, `introduction`, `phone`, `location`, `website`, `verified`, `created_at`, `updated_at`, `deleted_at`, `expertise_id`, `token`, `email_verification`) VALUES
(4, 'Lazarusfx.1million', 'lazarusfx@mail.com', '$2y$10$adLi668tX/zoIKiGtUmApuTHN4FSb.rdfl9LcRZKcWHSlTfj7RV2O', 'Lazarusfx.1million', 'ppp', '77777', 'ppp', 'ppp', 1, '2021-07-17 22:15:28', '2021-07-17 22:15:28', NULL, 2, '0', 0),
(5, 'Pixel38', 'pixel@mail.com', '$2y$10$tqgt8P76/HWkVsNcPVnW/eOfvZ7EqUE942gaLcqD0rkgUlF4V81u.', 'sociatag', 'development hjsfsjdfn mklsdf d gfjslng fgmnklsndgng msndmfk.sndf kfmsndfns dnf ,sdngs dgsf gnkdnfs dfjwheore we dfkjwndf wfnwmnrfjnwf ,mnwkldnfw dmnflwndf mnwdjf wkd,fnjwndlf fkmw,dnfwndf nmnfdwfnwl fwdfbwbdnfmwdf kwndfmnw,f wn,bdffwbkf kjnwdfwd fwkbfk fuweytweitow tenfbpqnfq hibfjebfj fbf hef ie wih dh fhiwd fdjf wdfwhiv whjkn', '7000000', 'lebanon', 'http://localhost:8000/admin/jobs', 1, '2021-07-19 15:08:00', '2021-07-26 14:54:19', NULL, 1, '0', 0),
(8, 'Elieazar SARL co', 'elieazar@live.com', '$2y$10$tWJhZZ/K2nvPmDmrHXVrbuA/RwmTtuKU1R.5xMJp7ysQHU.9587tS', 'Elieazar Co. S.A.R.L', 'qqq', '7000000', 'beirut', 'www.www.www', 1, '2021-07-21 16:29:59', '2021-07-27 19:42:10', NULL, 1, 'dd8fc0dfc642ca3c986a73ae7fa646d5', 1),
(9, 'elieazr', 'elie.azar3891.ea@gmail', '$2y$10$WM632om0olwbVx.WT/7RV.zyPucPrQKkr0NN74CXd4KGSOGVY0FbS', 'Elie Azar', 'hello', '706666', 'Lebanon', 'www.www', 0, '2021-08-04 19:59:32', '2021-08-04 19:59:32', NULL, 1, '9e0ac8ccc6699f2ee9d81a7ed96ff9c3', 0),
(13, 'llll', 'elie.azar3891.ea@gmail.com', '$2y$10$sMXAJil/CyDz5A6N04qLG.qpNyf.iT0OSmlMqPu842L0l6MS4NMO2', 'Elie Azar', 'lllll', '7047025', 'Beirut', 'www.www', 0, '2021-08-05 18:20:12', '2021-08-05 18:20:12', NULL, 1, '005a4f9240766af57883053c6ad7f0a1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 7, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 7, 'username', 'text', 'Username', 1, 1, 1, 1, 1, 1, '{}', 2),
(58, 7, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(59, 7, 'password', 'text', 'Password', 1, 0, 1, 0, 1, 1, '{}', 4),
(60, 7, 'full_name', 'text', 'Full Name', 1, 1, 1, 1, 1, 1, '{}', 5),
(61, 7, 'has_answered', 'text', 'Has Answered', 1, 1, 1, 1, 1, 1, '{}', 6),
(62, 7, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 7),
(63, 7, 'description', 'text', 'Description', 1, 0, 1, 1, 1, 1, '{}', 8),
(64, 7, 'location', 'text', 'Location', 1, 1, 1, 1, 1, 1, '{}', 9),
(65, 7, 'resume_pdf', 'image', 'Resume Pdf', 1, 0, 1, 1, 1, 1, '{}', 10),
(66, 7, 'phone', 'text', 'Phone', 1, 0, 1, 1, 1, 1, '{}', 11),
(67, 7, 'years_of_experience', 'text', 'Years Of Experience', 1, 1, 1, 1, 1, 1, '{}', 12),
(68, 7, 'verified', 'checkbox', 'Verified', 1, 1, 1, 1, 1, 1, '{}', 13),
(69, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 14),
(70, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 15),
(71, 7, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 1, '{}', 16),
(72, 7, 'expertise_id', 'text', 'Expertise', 1, 0, 0, 1, 1, 1, '{}', 17),
(73, 7, 'applicant_belongsto_fields_expertise_relationship', 'relationship', 'fields_expertises', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\FieldExpertise\",\"table\":\"fields_expertises\",\"type\":\"belongsTo\",\"column\":\"expertise_id\",\"key\":\"id\",\"label\":\"expertise_name\",\"pivot_table\":\"answers\",\"pivot\":\"0\",\"taggable\":\"0\"}', 18),
(74, 8, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(75, 8, 'username', 'text', 'Username', 1, 1, 1, 1, 1, 1, '{}', 2),
(76, 8, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(77, 8, 'password', 'text', 'Password', 1, 0, 1, 0, 1, 1, '{}', 4),
(78, 8, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 5),
(79, 8, 'introduction', 'text', 'Introduction', 1, 0, 1, 1, 1, 1, '{}', 6),
(80, 8, 'phone', 'text', 'Phone', 1, 0, 1, 1, 1, 1, '{}', 7),
(81, 8, 'location', 'text', 'Location', 1, 1, 1, 1, 1, 1, '{}', 8),
(82, 8, 'website', 'text', 'Website', 1, 1, 1, 1, 1, 1, '{}', 9),
(83, 8, 'verified', 'text', 'Verified', 1, 1, 1, 1, 1, 1, '{}', 10),
(84, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 11),
(85, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 12),
(86, 8, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 1, '{}', 13),
(87, 8, 'expertise_id', 'text', 'Expertise Id', 1, 1, 1, 1, 1, 1, '{}', 14),
(88, 8, 'company_belongsto_fields_expertise_relationship', 'relationship', 'fields_expertises', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\FieldExpertise\",\"table\":\"fields_expertises\",\"type\":\"belongsTo\",\"column\":\"expertise_id\",\"key\":\"id\",\"label\":\"expertise_name\",\"pivot_table\":\"answers\",\"pivot\":\"0\",\"taggable\":\"0\"}', 15),
(89, 7, 'token', 'text', 'Token', 1, 0, 0, 0, 0, 1, '{}', 18),
(90, 7, 'email_verification', 'text', 'Email Verification', 1, 0, 0, 0, 0, 0, '{}', 19),
(91, 9, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(92, 9, 'expertise_name', 'text', 'Expertise Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(93, 9, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(94, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(95, 9, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 5),
(96, 10, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(97, 10, 'company_id', 'text', 'Company Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(98, 10, 'job_title', 'text', 'Job Title', 1, 1, 1, 1, 1, 1, '{}', 3),
(99, 10, 'salary', 'number', 'Salary', 1, 1, 1, 1, 1, 1, '{}', 4),
(100, 10, 'job_description', 'text_area', 'Job Description', 1, 1, 1, 1, 1, 1, '{}', 5),
(101, 10, 'years_of_experience', 'number', 'Years Of Experience', 1, 1, 1, 1, 1, 1, '{}', 6),
(102, 10, 'expertise_id', 'text', 'Expertise Id', 1, 1, 1, 1, 1, 1, '{}', 7),
(103, 10, 'time_frame', 'date', 'Time Frame', 1, 1, 1, 1, 1, 1, '{}', 8),
(104, 10, 'date_posted', 'date', 'Date Posted', 1, 1, 1, 1, 1, 1, '{}', 9),
(105, 10, 'question', 'text_area', 'Question', 1, 1, 1, 1, 1, 1, '{}', 10),
(106, 10, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 11),
(107, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 12),
(108, 10, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 13),
(109, 10, 'job_belongsto_fields_expertise_relationship', 'relationship', 'fields_expertises', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\FieldExpertise\",\"table\":\"fields_expertises\",\"type\":\"belongsTo\",\"column\":\"expertise_id\",\"key\":\"id\",\"label\":\"expertise_name\",\"pivot_table\":\"answers\",\"pivot\":\"0\",\"taggable\":\"0\"}', 14),
(110, 10, 'job_belongsto_company_relationship', 'relationship', 'companies', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Company\",\"table\":\"companies\",\"type\":\"belongsTo\",\"column\":\"company_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"answers\",\"pivot\":\"0\",\"taggable\":\"0\"}', 15),
(111, 8, 'token', 'text', 'Token', 1, 0, 0, 0, 0, 0, '{}', 15),
(112, 8, 'email_verification', 'text', 'Email Verification', 1, 1, 1, 1, 1, 1, '{}', 16),
(113, 11, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(114, 11, 'type', 'text', 'Type', 1, 1, 1, 1, 1, 1, '{}', 2),
(115, 11, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(116, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(117, 8, 'company_hasmany_job_relationship', 'relationship', 'jobs', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Job\",\"table\":\"jobs\",\"type\":\"hasMany\",\"column\":\"company_id\",\"key\":\"id\",\"label\":\"job_title\",\"pivot_table\":\"answers\",\"pivot\":\"0\",\"taggable\":\"0\"}', 17),
(118, 10, 'job_type', 'text', 'Job Type', 1, 1, 1, 1, 1, 1, '{}', 14),
(119, 12, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(120, 12, 'applicant_id', 'text', 'Applicant Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(121, 12, 'job_id', 'text', 'Job Id', 1, 1, 1, 1, 1, 1, '{}', 3),
(122, 12, 'created_at', 'timestamp', 'Applied At', 0, 1, 1, 1, 0, 1, '{}', 6),
(123, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(126, 7, 'photo', 'image', 'Photo', 1, 1, 1, 1, 1, 1, '{}', 20),
(127, 13, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(128, 13, 'applicant_id', 'text', 'Applicant Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(129, 13, 'job_id', 'text', 'Job Id', 1, 1, 1, 1, 1, 1, '{}', 3),
(130, 13, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(131, 13, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(132, 13, 'applicant_job_belongsto_applicant_relationship', 'relationship', 'applicants', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Applicant\",\"table\":\"applicants\",\"type\":\"belongsTo\",\"column\":\"applicant_id\",\"key\":\"id\",\"label\":\"full_name\",\"pivot_table\":\"answers\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(133, 13, 'applicant_job_belongsto_job_relationship', 'relationship', 'jobs', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Job\",\"table\":\"jobs\",\"type\":\"belongsTo\",\"column\":\"job_id\",\"key\":\"id\",\"label\":\"job_title\",\"pivot_table\":\"answers\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2021-07-11 16:07:22', '2021-07-11 16:07:22'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2021-07-11 16:07:22', '2021-07-11 16:07:22'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2021-07-11 16:07:22', '2021-07-11 16:07:22'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(7, 'applicants', 'applicants', 'Applicant', 'Applicants', 'voyager-smile', 'App\\Applicant', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-07-11 21:12:52', '2021-07-25 16:42:53'),
(8, 'companies', 'companies', 'Company', 'Companies', 'voyager-shop', 'App\\Company', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-07-11 21:21:01', '2021-07-23 16:59:19'),
(9, 'fields_expertises', 'fields-expertises', 'Fields Expertise', 'Fields Expertises', 'voyager-scissors', 'App\\FieldExpertise', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2021-07-20 21:30:40', '2021-07-20 21:30:40'),
(10, 'jobs', 'jobs', 'Job', 'Jobs', 'voyager-brush', 'App\\Job', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-07-20 21:53:32', '2021-07-24 11:02:38'),
(11, 'job_types', 'job-types', 'Job Type', 'Job Types', 'voyager-tag', 'App\\JobType', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2021-07-21 19:49:05', '2021-07-21 19:49:05'),
(12, 'job_applicants', 'job-applicants', 'Job Applicant', 'Job Applicants', 'voyager-puzzle', 'App\\JobApplicant', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-07-24 21:05:48', '2021-07-25 19:02:00'),
(13, 'applicant_job', 'applicant-job', 'Applicant Job', 'Applicant Jobs', 'voyager-puzzle', 'App\\ApplicantJob', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-07-26 14:25:36', '2021-07-26 14:29:17');

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
-- Table structure for table `fields_expertises`
--

CREATE TABLE `fields_expertises` (
  `id` int(10) UNSIGNED NOT NULL,
  `expertise_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields_expertises`
--

INSERT INTO `fields_expertises` (`id`, `expertise_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'developer', NULL, NULL, NULL),
(2, 'designer', '2021-07-20 21:41:48', '2021-07-20 21:41:48', NULL),
(3, 'data analyst', '2021-07-20 21:42:04', '2021-07-20 21:42:04', NULL),
(4, 'test expertise', '2021-07-26 15:01:04', '2021-07-26 15:01:04', NULL),
(5, 'Web Developer', '2021-07-27 19:44:39', '2021-07-27 19:44:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `years_of_experience` int(11) NOT NULL,
  `expertise_id` int(11) NOT NULL,
  `time_frame` date NOT NULL,
  `date_posted` date NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `job_title`, `salary`, `job_description`, `years_of_experience`, `expertise_id`, `time_frame`, `date_posted`, `question`, `created_at`, `updated_at`, `deleted_at`, `job_type`) VALUES
(1, 5, 'qqq', '40000 To 50000', 'pppp', 3, 1, '2021-06-28', '2021-07-29', 'mmmmm', '2021-07-23 16:46:58', '2021-07-23 16:46:58', NULL, 'Part Time'),
(2, 5, 'poi', '20000 To 30000', 'ppp', 1, 1, '2021-06-29', '2021-07-28', 'oooo', '2021-07-23 16:47:41', '2021-07-23 16:47:41', NULL, 'Contract'),
(3, 5, 'poi', '20000 To 30000', 'ppp', 2, 1, '2021-06-29', '2021-07-28', 'oooo', '2021-07-23 16:52:49', '2021-07-23 16:52:49', NULL, 'Contract'),
(4, 5, 'poi', '20000 To 30000', 'ppp', 2, 1, '2021-06-29', '2021-07-28', 'oooo', '2021-07-23 16:53:40', '2021-07-23 16:53:40', NULL, 'Contract'),
(5, 5, 'popopo', '60000 To 70000', 'opop', 2, 1, '2021-06-29', '2021-07-14', 'lklk', '2021-07-23 16:54:24', '2021-07-23 16:54:24', NULL, 'Contract'),
(6, 5, 'popopo', '60000 To 70000', 'opop', 2, 1, '2021-06-29', '2021-07-14', 'lklk', '2021-07-23 16:55:01', '2021-07-23 16:55:01', NULL, 'Contract'),
(7, 5, 'New Job', '20000 To 30000', 'popo', 2, 1, '2021-07-27', '2021-07-28', 'lklk', '2021-07-23 16:56:45', '2021-07-23 16:56:45', NULL, 'Contract'),
(8, 5, 'job 8', '1111', 'hello', 1, 3, '2021-07-22', '2021-07-15', 'helloo', '2021-07-24 11:02:00', '2021-07-24 11:03:33', NULL, 'contract'),
(9, 4, 'job 9', '20000', 'job description ABC', 1, 1, '2021-07-23', '2021-07-30', 'this is a test', '2021-07-24 11:04:23', '2021-07-24 11:04:23', NULL, 'Full time'),
(10, 5, 'Job 10', '20000', 'this is a test', 2, 2, '2021-07-21', '2021-07-28', 'this is a test', '2021-07-24 11:05:05', '2021-07-24 11:05:05', NULL, 'part time'),
(11, 8, 'Job11', '20000 To 30000', 'this is a test job descriptioon hello job 11', 3, 4, '2021-08-05', '2021-07-27', 'this is a test question job 11', '2021-07-26 15:06:24', '2021-07-26 15:06:24', NULL, 'Part Time'),
(12, 8, 'Job 12', '40000 To 50000', 'This is a test description for job 12', 4, 5, '2021-07-30', '2021-07-29', 'this is a test question for job12', '2021-07-27 19:46:05', '2021-07-27 19:46:05', NULL, 'Part Time');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-07-11 16:07:23', '2021-07-11 16:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2021-07-11 16:07:23', '2021-07-11 16:07:23', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 9, '2021-07-11 16:07:23', '2021-07-26 14:30:10', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 8, '2021-07-11 16:07:23', '2021-07-26 14:30:10', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 7, '2021-07-11 16:07:23', '2021-07-26 14:30:10', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 13, '2021-07-11 16:07:23', '2021-07-26 14:30:06', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2021-07-11 16:07:23', '2021-07-20 21:57:07', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2021-07-11 16:07:23', '2021-07-20 21:57:07', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2021-07-11 16:07:23', '2021-07-26 14:30:06', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2021-07-11 16:07:23', '2021-07-26 14:30:06', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2021-07-11 16:07:23', '2021-07-26 14:30:06', 'voyager.settings.index', NULL),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2021-07-11 16:07:23', '2021-07-26 14:30:06', 'voyager.hooks', NULL),
(12, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 12, '2021-07-11 16:23:01', '2021-07-26 14:30:06', 'voyager.categories.index', NULL),
(13, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 10, '2021-07-11 16:23:01', '2021-07-26 14:30:06', 'voyager.posts.index', NULL),
(14, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 11, '2021-07-11 16:23:01', '2021-07-26 14:30:06', 'voyager.pages.index', NULL),
(15, 1, 'Applicants', '', '_self', 'voyager-smile', NULL, NULL, 3, '2021-07-11 21:12:52', '2021-07-11 21:23:23', 'voyager.applicants.index', NULL),
(16, 1, 'Companies', '', '_self', 'voyager-shop', NULL, NULL, 2, '2021-07-11 21:21:01', '2021-07-11 21:23:21', 'voyager.companies.index', NULL),
(17, 1, 'Fields Expertises', '', '_self', 'voyager-scissors', NULL, NULL, 4, '2021-07-20 21:30:40', '2021-07-20 21:31:31', 'voyager.fields-expertises.index', NULL),
(18, 1, 'Jobs', '', '_self', 'voyager-brush', '#000000', NULL, 5, '2021-07-20 21:53:32', '2021-07-20 21:58:02', 'voyager.jobs.index', 'null'),
(19, 1, 'Job Types', '', '_self', 'voyager-tag', NULL, NULL, 15, '2021-07-21 19:49:05', '2021-07-26 14:30:07', 'voyager.job-types.index', NULL),
(21, 1, 'Applicant Jobs', '', '_self', 'voyager-puzzle', NULL, NULL, 6, '2021-07-26 14:25:36', '2021-07-26 14:30:10', 'voyager.applicant-job.index', NULL);

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
(2, '2016_01_01_000000_add_voyager_user_fields', 1),
(3, '2016_01_01_000000_create_data_types_table', 1),
(4, '2016_05_19_173453_create_menu_table', 1),
(5, '2016_10_21_190000_create_roles_table', 1),
(6, '2016_10_21_190000_create_settings_table', 1),
(7, '2016_11_30_135954_create_permission_table', 1),
(8, '2016_11_30_141208_create_permission_role_table', 1),
(9, '2016_12_26_201236_data_types__add__server_side', 1),
(10, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(11, '2017_01_14_005015_create_translations_table', 1),
(12, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(13, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(14, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(15, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(16, '2017_08_05_000000_add_group_to_settings_table', 1),
(17, '2017_11_26_013050_add_user_role_relationship', 1),
(18, '2017_11_26_015000_create_user_roles_table', 1),
(19, '2018_03_11_000000_add_user_settings', 1),
(20, '2018_03_14_000000_add_details_to_data_types_table', 1),
(21, '2018_03_16_000000_make_settings_value_nullable', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2016_01_01_000000_create_pages_table', 2),
(24, '2016_01_01_000000_create_posts_table', 2),
(25, '2016_02_15_204651_create_categories_table', 2),
(26, '2017_04_11_000000_alter_post_nullable_fields_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2021-07-11 16:23:01', '2021-07-11 16:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(2, 'browse_bread', NULL, '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(3, 'browse_database', NULL, '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(4, 'browse_media', NULL, '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(5, 'browse_compass', NULL, '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(6, 'browse_menus', 'menus', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(7, 'read_menus', 'menus', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(8, 'edit_menus', 'menus', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(9, 'add_menus', 'menus', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(10, 'delete_menus', 'menus', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(11, 'browse_roles', 'roles', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(12, 'read_roles', 'roles', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(13, 'edit_roles', 'roles', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(14, 'add_roles', 'roles', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(15, 'delete_roles', 'roles', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(16, 'browse_users', 'users', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(17, 'read_users', 'users', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(18, 'edit_users', 'users', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(19, 'add_users', 'users', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(20, 'delete_users', 'users', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(21, 'browse_settings', 'settings', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(22, 'read_settings', 'settings', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(23, 'edit_settings', 'settings', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(24, 'add_settings', 'settings', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(25, 'delete_settings', 'settings', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(26, 'browse_hooks', NULL, '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(27, 'browse_categories', 'categories', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(28, 'read_categories', 'categories', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(29, 'edit_categories', 'categories', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(30, 'add_categories', 'categories', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(31, 'delete_categories', 'categories', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(32, 'browse_posts', 'posts', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(33, 'read_posts', 'posts', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(34, 'edit_posts', 'posts', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(35, 'add_posts', 'posts', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(36, 'delete_posts', 'posts', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(37, 'browse_pages', 'pages', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(38, 'read_pages', 'pages', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(39, 'edit_pages', 'pages', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(40, 'add_pages', 'pages', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(41, 'delete_pages', 'pages', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(42, 'browse_applicants', 'applicants', '2021-07-11 21:12:52', '2021-07-11 21:12:52'),
(43, 'read_applicants', 'applicants', '2021-07-11 21:12:52', '2021-07-11 21:12:52'),
(44, 'edit_applicants', 'applicants', '2021-07-11 21:12:52', '2021-07-11 21:12:52'),
(45, 'add_applicants', 'applicants', '2021-07-11 21:12:52', '2021-07-11 21:12:52'),
(46, 'delete_applicants', 'applicants', '2021-07-11 21:12:52', '2021-07-11 21:12:52'),
(47, 'browse_companies', 'companies', '2021-07-11 21:21:01', '2021-07-11 21:21:01'),
(48, 'read_companies', 'companies', '2021-07-11 21:21:01', '2021-07-11 21:21:01'),
(49, 'edit_companies', 'companies', '2021-07-11 21:21:01', '2021-07-11 21:21:01'),
(50, 'add_companies', 'companies', '2021-07-11 21:21:01', '2021-07-11 21:21:01'),
(51, 'delete_companies', 'companies', '2021-07-11 21:21:01', '2021-07-11 21:21:01'),
(52, 'browse_fields_expertises', 'fields_expertises', '2021-07-20 21:30:40', '2021-07-20 21:30:40'),
(53, 'read_fields_expertises', 'fields_expertises', '2021-07-20 21:30:40', '2021-07-20 21:30:40'),
(54, 'edit_fields_expertises', 'fields_expertises', '2021-07-20 21:30:40', '2021-07-20 21:30:40'),
(55, 'add_fields_expertises', 'fields_expertises', '2021-07-20 21:30:40', '2021-07-20 21:30:40'),
(56, 'delete_fields_expertises', 'fields_expertises', '2021-07-20 21:30:40', '2021-07-20 21:30:40'),
(57, 'browse_jobs', 'jobs', '2021-07-20 21:53:32', '2021-07-20 21:53:32'),
(58, 'read_jobs', 'jobs', '2021-07-20 21:53:32', '2021-07-20 21:53:32'),
(59, 'edit_jobs', 'jobs', '2021-07-20 21:53:32', '2021-07-20 21:53:32'),
(60, 'add_jobs', 'jobs', '2021-07-20 21:53:32', '2021-07-20 21:53:32'),
(61, 'delete_jobs', 'jobs', '2021-07-20 21:53:32', '2021-07-20 21:53:32'),
(62, 'browse_job_types', 'job_types', '2021-07-21 19:49:05', '2021-07-21 19:49:05'),
(63, 'read_job_types', 'job_types', '2021-07-21 19:49:05', '2021-07-21 19:49:05'),
(64, 'edit_job_types', 'job_types', '2021-07-21 19:49:05', '2021-07-21 19:49:05'),
(65, 'add_job_types', 'job_types', '2021-07-21 19:49:05', '2021-07-21 19:49:05'),
(66, 'delete_job_types', 'job_types', '2021-07-21 19:49:05', '2021-07-21 19:49:05'),
(67, 'browse_job_applicants', 'job_applicants', '2021-07-24 21:05:48', '2021-07-24 21:05:48'),
(68, 'read_job_applicants', 'job_applicants', '2021-07-24 21:05:48', '2021-07-24 21:05:48'),
(69, 'edit_job_applicants', 'job_applicants', '2021-07-24 21:05:48', '2021-07-24 21:05:48'),
(70, 'add_job_applicants', 'job_applicants', '2021-07-24 21:05:48', '2021-07-24 21:05:48'),
(71, 'delete_job_applicants', 'job_applicants', '2021-07-24 21:05:48', '2021-07-24 21:05:48'),
(72, 'browse_applicant_job', 'applicant_job', '2021-07-26 14:25:36', '2021-07-26 14:25:36'),
(73, 'read_applicant_job', 'applicant_job', '2021-07-26 14:25:36', '2021-07-26 14:25:36'),
(74, 'edit_applicant_job', 'applicant_job', '2021-07-26 14:25:36', '2021-07-26 14:25:36'),
(75, 'add_applicant_job', 'applicant_job', '2021-07-26 14:25:36', '2021-07-26 14:25:36'),
(76, 'delete_applicant_job', 'applicant_job', '2021-07-26 14:25:36', '2021-07-26 14:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(42, 3),
(43, 1),
(43, 3),
(44, 1),
(44, 3),
(45, 1),
(46, 1),
(46, 3),
(47, 1),
(47, 3),
(48, 1),
(48, 3),
(49, 1),
(49, 3),
(50, 1),
(51, 1),
(51, 3),
(52, 1),
(52, 3),
(53, 1),
(53, 3),
(54, 1),
(54, 3),
(55, 1),
(55, 3),
(56, 1),
(56, 3),
(57, 1),
(57, 3),
(58, 1),
(58, 3),
(59, 1),
(59, 3),
(60, 1),
(60, 3),
(61, 1),
(61, 3),
(72, 1),
(72, 3),
(73, 1),
(73, 3),
(74, 1),
(74, 3),
(75, 1),
(75, 3),
(76, 1),
(76, 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2021-07-11 16:23:01', '2021-07-11 16:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Administrator', '2021-07-11 16:07:23', '2021-07-11 21:44:10'),
(2, 'user', 'Normal User', '2021-07-11 16:07:23', '2021-07-11 16:07:23'),
(3, 'admin', 'Admin', '2021-07-11 21:43:48', '2021-07-11 21:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Beauty Recruits', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'recruitment', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', 'settings/July2021/7VC0djXyeubA3hMqex76.jpeg', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Beauty Recruits', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'recruitment', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', 'settings/July2021/FWdqS3QqkJuWPGTtWkZ7.jpeg', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings/July2021/tAJRPyzVMDzSLdB3AGV8.jpeg', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(22, 'menu_items', 'title', 13, 'pt', 'Publicações', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(24, 'menu_items', 'title', 12, 'pt', 'Categorias', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(25, 'menu_items', 'title', 14, 'pt', 'Páginas', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2021-07-11 16:23:01', '2021-07-11 16:23:01'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2021-07-11 16:23:01', '2021-07-11 16:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'super admin', 'superAdmin@superAdmin.com', 'users/default.png', NULL, '$2y$10$nVvHuowXsDnvcyy29vLS0OfG.v13PfhCTZT2JgLY0vmDm1J9wm6Tq', NULL, '{\"locale\":\"en\"}', '2021-07-11 16:22:01', '2021-07-11 21:46:10'),
(2, 3, 'admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$hGTwn9uNr4DoCv5M54NKge4TaS17Urgxd4vZoujkUjMyshe1oJz52', NULL, '{\"locale\":\"en\"}', '2021-07-11 21:47:42', '2021-07-11 21:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `applicants_email_unique` (`email`);

--
-- Indexes for table `applicant_job`
--
ALTER TABLE `applicant_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields_expertises`
--
ALTER TABLE `fields_expertises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `applicant_job`
--
ALTER TABLE `applicant_job`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fields_expertises`
--
ALTER TABLE `fields_expertises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

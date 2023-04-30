-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 01:32 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogry`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sport', 'Active', '2023-04-19 11:39:16', NULL),
(2, 'News', 'Active', '2023-04-19 11:39:24', NULL),
(3, 'Fashion', 'Active', '2023-04-19 11:39:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `status` enum('Default','Active','Inactive') NOT NULL DEFAULT 'Default',
  `user_id` int NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int NOT NULL,
  `logdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(50) NOT NULL,
  `activity` varchar(300) NOT NULL,
  `ipaddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `logdate`, `username`, `activity`, `ipaddress`) VALUES
(1, '2023-04-19 10:35:17', 'nikeaba', 'Admin Successful Login', '127.0.0.1'),
(2, '2023-04-19 10:39:16', 'nikeaba', 'Category Sport was Created', '127.0.0.1'),
(3, '2023-04-19 10:39:24', 'nikeaba', 'Category News was Created', '127.0.0.1'),
(4, '2023-04-19 10:39:33', 'nikeaba', 'Category Fashion was Created', '127.0.0.1'),
(5, '2023-04-19 10:52:35', 'nikeaba', 'nikeaba - Post was Inserted', '127.0.0.1'),
(6, '2023-04-19 13:31:51', 'nikeaba', 'Post with id 1 Status was changed to Inactive', '127.0.0.1'),
(7, '2023-04-19 13:35:54', 'nikeaba', 'Post with id 1 Status was changed to Inactive', '127.0.0.1'),
(8, '2023-04-19 13:37:04', 'nikeaba', 'Post with id 1 Status was changed to Inactive', '127.0.0.1'),
(9, '2023-04-19 14:00:55', 'nikeaba', 'Category with id 1 Status was changed to Active', '127.0.0.1'),
(10, '2023-04-25 14:36:29', 'nikeaba', 'Admin Successful Login', '127.0.0.1'),
(11, '2023-04-26 07:23:03', 'nikeaba', 'Admin Successful Login', '127.0.0.1'),
(12, '2023-04-26 08:08:27', 'nikeaba', 'nikeaba - Post was Updated', '127.0.0.1'),
(13, '2023-04-26 08:11:29', 'nikeaba', 'nikeaba - Post was Updated', '127.0.0.1'),
(14, '2023-04-26 08:17:17', 'nikeaba', 'nikeaba - Post was Updated', '127.0.0.1'),
(15, '2023-04-26 09:57:17', 'nikeaba', 'Admin Successful Login', '127.0.0.1'),
(16, '2023-04-26 10:02:46', 'mike123', 'Admin Successful Login', '127.0.0.1'),
(17, '2023-04-26 10:03:08', 'mike123', 'Admin Successful Login', '127.0.0.1'),
(18, '2023-04-26 10:03:24', 'mike123', 'Admin Successful Login', '127.0.0.1'),
(19, '2023-04-26 10:03:37', 'mike123', 'Admin Successful Login', '127.0.0.1'),
(20, '2023-04-26 10:04:23', 'mike123', 'Admin Successful Login', '127.0.0.1'),
(21, '2023-04-26 10:06:23', 'nikeaba', 'Admin Successful Login', '127.0.0.1'),
(22, '2023-04-27 09:27:22', 'nikeaba', 'Admin Successful Login', '127.0.0.1'),
(23, '2023-04-27 09:58:05', 'nikeaba', 'Admin Successful Login', '127.0.0.1'),
(24, '2023-04-27 10:25:03', 'nikeaba', 'Admin Successful Login', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `multi_image`
--

CREATE TABLE `multi_image` (
  `id` int NOT NULL,
  `image` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(300) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` longtext NOT NULL,
  `views` int DEFAULT '0',
  `author` varchar(300) NOT NULL,
  `main_image` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `cat_id` int NOT NULL,
  `uploaded_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `short_desc`, `long_desc`, `views`, `author`, `main_image`, `created_at`, `updated_at`, `status`, `cat_id`, `uploaded_by`) VALUES
(1, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 2, 1),
(2, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 1, 1),
(3, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 3, 1),
(4, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 1, 1),
(5, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 2, 1),
(6, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 1, 1),
(7, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 1, 1),
(8, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 3, 1),
(9, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 2, 1),
(10, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 1, 1),
(11, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 2, 1),
(12, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 1, 1),
(13, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 2, 1),
(14, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 3, 1),
(15, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 3, 1),
(16, 'Naruto goes Rogue', 'sql_operator', 'This is a description of sql operators', '<div>\r\n<h2><span style=\"color: rgb(251, 238, 184);\">What is Lorem Ipsum?</span></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" title=\"1733265333714060.jpg\" src=\"http://127.0.0.1/worldBlog/admin/post_images/multi_post_image/blobid1681901544451.jpg\" alt=\"\" width=\"300\" height=\"200\"></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'Anthony Black', 'e394711341ce2d5f7600ec86beb68bf1.jpg', '2023-04-19 11:52:35', NULL, 'Active', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `social_link` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT 'default-image.jpg',
  `role` enum('admin','user','author') NOT NULL DEFAULT 'user',
  `bio` text,
  `LastAuthenticatedToken` varchar(255) DEFAULT NULL,
  `LastLoginDate` timestamp NULL DEFAULT NULL,
  `DateCreated` date DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `LPasswordCDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `profile_image`, `role`, `bio`, `LastAuthenticatedToken`, `LastLoginDate`, `DateCreated`, `updated_at`, `LPasswordCDate`) VALUES
(1, 'nikeaba', 'Ikeaba Ngozichukwuka', 'kebidegozi@gmail.com', '7e6f9f10fa9d3db741803ecfde6d54df', 'default-image.jpg', 'admin', '', 'pUyYiRJhKmGagKOtBjm0', '2023-04-27 10:25:03', '2023-04-19', NULL, '2023-04-19 10:35:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_image`
--
ALTER TABLE `multi_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `uploaded_by` (`uploaded_by`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `multi_image`
--
ALTER TABLE `multi_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `multi_image`
--
ALTER TABLE `multi_image`
  ADD CONSTRAINT `multi_image_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `social_links`
--
ALTER TABLE `social_links`
  ADD CONSTRAINT `social_links_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

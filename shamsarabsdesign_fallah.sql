-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 03, 2019 at 02:39 PM
-- Server version: 10.3.17-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shamsarabsdesign_fallah`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `status`, `user_id`, `order`, `created_at`, `updated_at`) VALUES
(10, 1, 1, 0, '2019-07-07 11:39:48', '2019-07-07 11:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `app_sections`
--

CREATE TABLE `app_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `android` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ios` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_sections`
--

INSERT INTO `app_sections` (`id`, `title_ar`, `title_en`, `desc_ar`, `desc_en`, `android`, `ios`, `img_ar`, `img_en`, `created_at`, `updated_at`) VALUES
(1, 'تطبيق فله متاح الان', 'fallah app available now', 'حمل تطبيق فله الان', 'fallah app available now', 'https://play.google.com/store?hl=ar', 'https://www.apple.com/eg/ios/app-store/', '5d271a1ce63a9-1562843676-OIClozKwu8.png', '5d271a1ce6551-1562843676-a5JIUuhr7c.png', NULL, '2019-07-11 09:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name_ar', 'فله', '2019-06-30 06:51:31', '2019-07-11 07:47:26'),
(2, 'address_ar', 'address_ar', NULL, NULL),
(3, 'address_en', 'address_en', NULL, NULL),
(4, 'email', 'aait@info.com', NULL, '2019-07-02 10:34:24'),
(5, 'phone', '0102233222', NULL, NULL),
(6, 'site_name_en', 'fallah', '2019-06-30 06:51:31', '2019-07-11 07:47:26'),
(7, 'about_us_ar', 'يقدم تطبيق فلة معلومات شاملة عن الأنشطة الترفيهية والثقافية في جميع أنحاء المملكة العربية السعودية. يقدم لك تطبيق فلة امكانية الاستكشاف والبحث عن الأنشطة الترفيهية والثقافية والمشاركة فى اﻻنشطة التى تناسب اهتمامك.', NULL, '2019-07-21 16:53:22'),
(8, 'about_us_en', 'Fallah provides comprehensive information on recreational and cultural activities throughout the Kingdom of Saudi Arabia. Fallah application offers you the possibility to discover and search for recreational and cultural activities and to participate in activities that suit your interest.', NULL, '2019-07-21 16:53:22'),
(9, 'roles_en', 'Application Fallah is available for your personal use, and your access to and use of this application is subject to these Terms and Conditions of Use and the regulations of the Kingdom of Saudi Arabia. Your access to and access to this Application will be unconditionally approved by the Terms and Conditions of Use, whether or not you are a registered user, and will take effect from the date you first use this application.\r\n\r\nAs is evident from the application, one of its main objectives is to increase communication with the public and to provide information and definitions about the Authority\'s functions and services provided by the Authority and to provide this information to the users of the application.\r\n\r\nThe use of the Application includes a number of terms and conditions subject to constant updates and changes as required. Any amendment or update to any of these Terms and Conditions shall take effect immediately upon its approval by the Application Manager; this requires you to regularly review the Terms of Use and the disclaimer principles for any updates; Your continued use of this application means that you are fully informed of and accept any modification to the terms and conditions of use. These Terms and Conditions include proprietary rights, and Application Management is not required to advertise any updates made on such terms.\r\n\r\nBy using Fella, you agree to refrain from:\r\n\r\nProvide or download files containing software, materials, data or other information that you do not own or have license.\r\nUse this application in any way to send any commercial, spam, or other abuse of this kind to Fella.\r\nSave or download files on this application that contain viruses or corrupted data.\r\nPublish, post, distribute or circulate materials or information containing a defamation of the reputation, violation of laws, pornographic or obscene material, violation of Islamic teachings, public morals, or any illegal material or information through the application of a fella.\r\nParticipate by applying Fala in illegal or illegal activities in Saudi Arabia.\r\nAdvertising - on any application - any product or service that makes us in violation of any law or regulation applied in any field.\r\nUse any means, software, or procedure to intercept or attempt to intercept the correct operation of the Fella application.\r\nTake any action that imposes an unreasonable, significant or disproportionate burden on the Fella infrastructure.\r\n\r\nGeneral Terms and Conditions\r\n\r\nAll materials and information available on educational application are not for profit.\r\nAll the regulations and laws published on the application, whether for the General Authority for Entertainment or other entities may be subject to interpretation to interpret the meaning of the purpose of increasing the benefit, but the Arabic text of all these regulations and laws is the basic reference, and therefore can not rely on any interpretation of their own to develop any information or details.\r\nThe application includes a number of electronic participation channels and tools such as forums, opinion polls, comments on everything posted, blogs, voting system, visitor comments, personal subscriptions, mobile phone messages and free 24-hour phone services.\r\nThe application management has set a number of criteria and limitations for using all channels of electronic participation in order to achieve the highest desired benefit from the principle of electronic participation, and your use of these channels is a permanent approval of the standards and restrictions for use.\r\nThe Authority has the full right to delete or not post any comments or posts to users of the Application that Application Management deems inappropriate.\r\nYou can see all the criteria and restrictions for using electronic sharing channels through this page\r\nIf you have any questions or concerns about our privacy and disclaimer terms, please contact the Application Manager.', NULL, '2019-07-21 17:03:51'),
(10, 'roles_ar', 'تطبيق فلة  متاح لاستخدامك الشخصي، ويخضع دخولك واستخدامك لهذا التطبيق لبنود وشروط الاستخدام هذه ولأنظمة المملكة العربية السعودية. وكذلك يعد وصولك ودخولك إلى هذا التطبيق موافقة دون قيد أو شرط على بنود وشروط الاستخدام سواء أكنت مستخدماً مسجلاً أم لم تكن، وتسري هذه الموافقة اعتبارا من تاريخ أول استخدام لك لهذا التطبيق.\r\n\r\nوكما هو واضح من التطبيق، فإن من أهم أهدافه زيادة التواصل مع الجمهور وتقديم معلومات وتعريفات عن مهام الهيئة والخدمات التي تقدمها الهيئة وتوفير هذه المعلومات لمستخدمى التطبيق.\r\n\r\nويتضمن استخدام التطبيق عدداً من البنود والشروط التي تخضع لتحديثات وتغييرات مستمرة حسب الحاجة، ويصبح أي تعديل أو تحديث لأي من هذه البنود والشروط نافذًا فور اعتماده من إدارة التطبيق؛ وهو ما يتطلب منك مراجعة مستمرة لشروط الاستخدام ومبادئ إخلاء المسؤولية لمعرفة أية تحديثات تتم عليها؛ إذ أن استمرارك في استخدام هذا التطبيق يعني اطلاعك وقبولك التام لأي تعديل تم على بنود وشروط استخدامها. علماً بأن هذه البنود والشروط تتضمن حقوق الملكية، كما أن إدارة التطبيق غير مطالبة بالإعلان عن أية تحديثات تتم على تلك الشروط.\r\n\r\nباستخدامك لتطبيق فلة، تقر بالامتناع عما يلي:\r\n\r\nتوفير أو تحميل ملفات تحتوي على برمجيات أو مواد أو بيانات أو معلومات أخرى ليست مملوكة لك أو لا تملك ترخيصاً بشأنها.\r\nاستخدام هذا التطبيق بأية طريقة لإرسال أي بريد إلكتروني تجاري أو غير مرغوب فيه أو أية إساءة استخدام من هذا النوع لتطبيق فلة.\r\nتوفير أو تحميل ملفات على هذا التطبيق تحتوي على فيروسات أو بيانات تالفة.\r\nنشر أو إعلان أو توزيع أو تعميم مواد أو معلومات تحتوي تشويهاً للسمعة أو انتهاكاً للقوانين أو مواد إباحية أو بذيئة أو مخالفة للتعاليم الإسلامية أو للآداب العامة أو أي مواد أو معلومات غير قانونية من خلال تطبيق فلة.\r\nالاشتراك من خلال تطبيق فلة في أنشطة غير مشروعة أو غير قانونية في المملكة العربية السعودية.\r\nالإعلان -على تطبيق فلة -عن أي منتج أو خدمة تجعلنا في وضع انتهاك لأي قانون أو نظام مطبق في أي مجال.\r\nاستخدام أية وسيلة أو برنامج أو إجراء لاعتراض أو محاولة اعتراض التشغيل الصحيح لتطبيق فلة.\r\nالقيام بأي إجراء يفرض حملاً غير معقول أو كبير أو بصورة غير مناسبة على البنية التحتية لتطبيق فلة.\r\n\r\nبنود وشروط عامة\r\n\r\nإن كل المواد والمعلومات المتوفرة على اتطبيق توعوية وغير هادفة للربح.\r\nكل اللوائح والقوانين المنشورة على التطبيق  سواء الخاصة بالهيئة العامة للترفيه أو بجهات أخرى قد تخضع للترجمة لتفسير معانيها بهدف زيادة الفائدة، غير أن النص العربي لكل تلك اللوائح والقوانين يشكل المرجعية الأساسية، وعليه فلا يمكن بأي حال الاعتماد على الترجمة التفسيرية الخاصة بها لاستنباط أية معلومات أو تفاصيل.\r\n‌يشتمل التطبيق على عدد من قنوات وأدوات المشاركة الإلكترونية مثل المنتديات، استطلاعات الرأي، التعليقات على كل ما ينشر، المدونات، نظام التصويت، تعليقات الزوار، الاشتراكات الشخصية ورسائل الهاتف الجوال وخدمات الهاتف المجاني على مدار الساعة.\r\n‌وضعت إدارة التطبيق عدداً من المعايير والقيود الخاصة باستخدام كل قنوات المشاركة الإلكترونية بما يضمن تحقيق أعلى فائدة مرجوة من مبدأ المشاركة الإلكترونية، ويعد استخدامك لهذه القنوات موافقة دائمة على المعايير والقيود الخاصة باستخدامها.\r\n‌للهيئة الحق الكامل في حذف أو عدم نشر أية تعليقات أو مشاركات لمستخدمي التطبيق تراها إدارة التطبيق غير مناسبة.\r\n‌يمكنك الاطلاع على كل معايير وقيود استخدام قنوات المشاركة الإلكترونية من خلال هذه الصفحة\r\n‌في حالة وجود أية استفسارات أو آراء حول شروط الخصوصية وإخلاء المسؤولية، يمكن التواصل مع إدارة التطبيق.', NULL, '2019-07-21 17:03:51'),
(11, 'roles_title_ar', 'عنوان الشروط و الاحكام', NULL, NULL),
(12, 'roles_title_en', 'roles title en', NULL, NULL),
(13, 'about_title_ar', 'عنوان عن التطبيق بالعربي', NULL, NULL),
(14, 'about_title_en', 'about us title en', NULL, NULL),
(15, 'contact_title_ar', 'عنوان اتصل بنا بالعربية', NULL, NULL),
(16, 'contact_title_en', 'contact title en', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `event_id`, `price`, `created_at`, `updated_at`) VALUES
(30, 17, 26, 30.00, '2019-07-25 11:44:17', '2019-07-25 11:44:17'),
(31, 17, 14, 50.00, '2019-07-25 11:55:53', '2019-07-25 11:55:53'),
(32, 17, 27, 50.00, '2019-07-25 12:08:31', '2019-07-25 12:08:31'),
(33, 17, 12, 800.00, '2019-07-25 12:14:20', '2019-07-25 12:14:20'),
(34, 17, 12, 800.00, '2019-07-25 12:14:32', '2019-07-25 12:14:32'),
(37, 6, 12, 100.00, '2019-07-25 12:19:26', '2019-07-25 12:19:26'),
(38, 6, 12, 100.00, '2019-07-25 12:19:38', '2019-07-25 12:19:38'),
(39, 17, 12, 800.00, '2019-07-25 12:20:41', '2019-07-25 12:20:41'),
(40, 17, 18, 200.00, '2019-07-25 12:23:08', '2019-07-25 12:23:08'),
(41, 17, 19, 150.00, '2019-07-25 12:26:52', '2019-07-25 12:26:52'),
(42, 17, 17, 250.00, '2019-07-25 12:28:52', '2019-07-25 12:28:52'),
(43, 17, 19, 200.00, '2019-07-25 12:30:56', '2019-07-25 12:30:56'),
(44, 17, 16, 40.00, '2019-07-25 12:32:39', '2019-07-25 12:32:39'),
(46, 6, 12, 800.00, '2019-07-28 12:57:16', '2019-07-28 12:57:16'),
(47, 6, 12, 800.00, '2019-07-29 05:25:44', '2019-07-29 05:25:44'),
(48, 6, 12, 300.00, '2019-07-29 11:22:07', '2019-07-29 11:22:07'),
(49, 6, 18, 200.00, '2019-07-29 11:24:31', '2019-07-29 11:24:31'),
(50, 6, 12, 800.00, '2019-07-29 11:30:11', '2019-07-29 11:30:11'),
(51, 6, 25, 70.00, '2019-07-29 11:52:32', '2019-07-29 11:52:32'),
(52, 6, 12, 800.00, '2019-07-29 12:18:49', '2019-07-29 12:18:49'),
(56, 1, 13, 250.00, '2019-07-29 18:26:12', '2019-07-29 18:26:12'),
(57, 1, 23, 250.00, '2019-07-29 18:58:35', '2019-07-29 18:58:35'),
(60, 6, 12, 800.00, '2019-07-30 07:22:48', '2019-07-30 07:22:48'),
(72, 18, 13, 250.00, '2019-08-09 20:36:20', '2019-08-09 20:36:20'),
(73, 18, 19, 150.00, '2019-08-09 21:39:57', '2019-08-09 21:39:57'),
(74, 18, 19, 150.00, '2019-08-15 18:25:46', '2019-08-15 18:25:46'),
(75, 18, 19, 150.00, '2019-08-21 12:23:07', '2019-08-21 12:23:07'),
(76, 18, 19, 150.00, '2019-08-21 17:12:02', '2019-08-21 17:12:02'),
(77, 18, 21, 150.00, '2019-08-23 13:33:57', '2019-08-23 13:33:57'),
(78, 18, 20, 180.00, '2019-08-23 13:59:11', '2019-08-23 13:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `image`, `icon`, `created_at`, `updated_at`) VALUES
(4, 'حفلات', 'parties', '5d34b13381ed7-1563734323-JQ92Jxzeba.jpg', '5d34b1338218a-1563734323-cILXPvKUyv.jpg', '2019-07-03 18:21:27', '2019-07-21 16:38:43'),
(5, 'مباريات', 'matches', '5d34b18859c17-1563734408-GWwNto2m2N.jpeg', '5d34b18859d3a-1563734408-JXT1CMV1HC.jpeg', '2019-07-15 11:05:41', '2019-07-21 16:40:08'),
(6, 'مسرحيات', 'Plays', '5d34b246f3d81-1563734598-dLaTCwar9J.jpg', '5d34b246f3f26-1563734598-Wrt4QrcqHL.jpg', '2019-07-15 11:07:22', '2019-07-21 16:43:18'),
(7, 'مناسبات', 'Occasions', '5d34ac1103d39-1563733009-Xe5G71Lkzm.jpeg', '5d34ac587629b-1563733080-rQUdm7oGNN.jpg', '2019-07-15 11:10:13', '2019-07-21 16:18:00'),
(8, 'حفلات', 'parties', '5d34b13381ed7-1563734323-JQ92Jxzeba.jpg', '5d34b1338218a-1563734323-cILXPvKUyv.jpg', '2019-07-03 18:21:27', '2019-07-21 16:38:43'),
(9, 'مباريات', 'matches', '5d34b18859c17-1563734408-GWwNto2m2N.jpeg', '5d34b18859d3a-1563734408-JXT1CMV1HC.jpeg', '2019-07-15 11:05:41', '2019-07-21 16:40:08'),
(10, 'مسرحيات', 'Plays', '5d34b246f3d81-1563734598-dLaTCwar9J.jpg', '5d34b246f3f26-1563734598-Wrt4QrcqHL.jpg', '2019-07-15 11:07:22', '2019-07-21 16:43:18'),
(11, 'مناسبات', 'Occasions', '5d34ac1103d39-1563733009-Xe5G71Lkzm.jpeg', '5d34ac587629b-1563733080-rQUdm7oGNN.jpg', '2019-07-15 11:10:13', '2019-07-21 16:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_uses`
--

CREATE TABLE `contact_uses` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_uses`
--

INSERT INTO `contact_uses` (`id`, `username`, `email`, `msg`, `created_at`, `updated_at`) VALUES
(1, 'shams', 'shams@email.com', 'test msg', '2019-07-15 12:51:49', '2019-07-15 12:51:49'),
(2, 'shams', 'shams@email.com', 'test msg', '2019-07-15 12:52:09', '2019-07-15 12:52:09'),
(3, 'shams', 'shams@email.com', 'test msg', '2019-07-15 12:52:13', '2019-07-15 12:52:13'),
(4, 'shams', 'shams@email.com', 'test msg', '2019-07-15 12:54:42', '2019-07-15 12:54:42'),
(5, 'shams', 'shams@email.com', 'test msg', '2019-07-16 05:30:37', '2019-07-16 05:30:37'),
(6, 'shams', 'shams@email.com', 'msg', '2019-07-21 16:09:02', '2019-07-21 16:09:02'),
(7, 'ddd', 'ddd@w.c', 'sddddd', '2019-07-21 16:10:54', '2019-07-21 16:10:54'),
(8, 'Shams', 'Mohamed.sh14@outlook.com', 'Msg', '2019-07-29 05:52:43', '2019-07-29 05:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(2, 'المدينة المنورة', 'madeinah', '2019-07-03 18:08:35', '2019-07-03 18:08:35'),
(3, 'الرياض', 'Riyadh', '2019-07-21 11:48:03', '2019-07-21 11:48:03'),
(4, 'جدة', 'Jeddah', '2019-07-21 11:48:52', '2019-07-21 11:48:52'),
(5, 'الشرقية', 'Alsharqia', '2019-07-21 11:49:36', '2019-07-21 11:49:36'),
(6, 'عسير', 'Asir', '2019-07-21 11:50:17', '2019-07-21 11:50:17'),
(7, 'الطائف', 'Taif', '2019-07-21 11:51:00', '2019-07-21 11:51:00'),
(8, 'جازان', 'Jazan', '2019-07-21 11:51:40', '2019-07-21 11:51:40'),
(9, 'مكة المكرمة', 'Mecca', '2019-07-21 11:52:21', '2019-07-21 11:52:21'),
(10, 'نجران', 'Najran', '2019-07-21 11:53:08', '2019-07-21 11:53:08'),
(11, 'تبوك', 'Tabuk', '2019-07-21 11:54:50', '2019-07-21 11:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `normal` int(11) NOT NULL,
  `vip` int(11) DEFAULT NULL,
  `gold` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `organization_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `max_order` int(11) DEFAULT NULL,
  `normal_num` int(11) NOT NULL,
  `gold_num` int(11) NOT NULL,
  `vip_num` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title_ar`, `title_en`, `desc_ar`, `desc_en`, `normal`, `vip`, `gold`, `count`, `time`, `date`, `lat`, `lng`, `country_id`, `organization_id`, `category_id`, `max_order`, `normal_num`, `gold_num`, `vip_num`, `created_at`, `updated_at`) VALUES
(12, 'حفلات صيف أبها 2019', 'Abha Summer Concerts 2019', 'استمتعوا بقضاء أوقات فنية سعيدة تقدمها لكم حفلات صيف أبها، وذلك في حفل غنائي للفنان ماجد المهندس والفنانة نجوى كرم .', 'Enjoy happy artistic times for Abha summer parties at a concert by Majid Al Mohandes and Najwa Karam.', 300, 800, 1000, 135, '20:00', '2019-08-21', '18.577507833041906', '41.979248046875', 6, 3, 4, 5, 50, 25, 60, '2019-07-21 12:04:56', '2019-07-21 12:45:57'),
(13, 'قلب للبيع', 'Heart for sale', 'مسرحية كوميدية مباشرة من بطولة الفنان طارق العلي, أحد أكبر الكوميديين في الخليج، والذي يعد الحضور بساعتين من الضحك المتواصل في مسرحية \"قلب للبيع\" التي يطرح من خلالها موضوع النزاهة والإنسانية من خلال دوره كأب فقير يقرر أن يعرض قلبه للبيع.', 'Direct comedy comedy starring Tarek Al Ali, one of the greatest comedians in the Gulf, who is present with two hours of continuous laughter in the play \"Heart for Sale\", which raises the issue of integrity and humanity through his role as a poor father decides to show his heart for sale.', 80, 100, 250, 50, '20:30', '2019-08-10', '24.703403144990915', '46.67315673828125', 3, 4, 6, 3, 20, 10, 20, '2019-07-21 12:30:29', '2019-07-21 12:30:29'),
(14, 'عصر الديناصورات', 'Dinosaurs age', 'حتى الديناصورات بكافة أحجامها اختارت التواجد معنا في عرضٍ تفاعلي على مسرح الأطفال وليبدعوا ضمن المساحات المخصصة للرسم بالإضافة لخدمات الحضانة الملحقة بالقرية المائية والعديد من الألعاب الورقية والتفاعلية والحركية لمنح الصغار والكبار فرصة متساويةً للمرح.', 'Even dinosaurs of all sizes chose to be with us in an interactive show on the children\'s theater and to create within the spaces allocated for drawing, in addition to the nursery services attached to the water village and many games of paper, interactive and kinetic to give young and old equal opportunity for fun.', 25, 50, 100, 160, '16:00', '2019-09-10', '24.486129879101412', '39.562255859375', 2, 4, 6, 10, 100, 10, 50, '2019-07-21 12:50:31', '2019-07-21 12:50:31'),
(15, 'مسرحية \"صبح صبح\"', 'The play \"Sobh Sobh\"', 'مسرحية فكاهية من بطولة اللمبي تتمحور أحداثها حول حياته كسجين يبدأ بالبحث عن أمواله بعد إطلاق سراحه من السجن، ويصعب عليه العثور عليها بعدما تغيرت ملامح الأماكن بعد سنين طويلة من الغياب', 'A comic drama of the Lambi Championship revolves around his life as a prisoner who begins to search for his money after his release from prison. It is difficult for him to find it after the features of the places changed after many years of absence', 50, 80, 100, 100, '21:00', '2019-08-20', '24.70839349313207', '46.680023193359375', 3, 4, 6, 3, 40, 20, 40, '2019-07-21 12:55:34', '2019-07-21 12:55:34'),
(16, 'مسرح جدة', 'Jeddah Theater', 'فعالية ترفيهية مميزة للأطفال والعائلات في مدينة جدة يضم مجموعة كبيرة من الفعاليات والانشطة المشوقة... حيث يمكن لجميع أفراد العائلة قضاء وقت ممتع وحضور أجمل مسرحيات الاطفال مثل ماشا والدب والجميلة والوحش ومقابلة شخصية هالو كاتي وشخصيات عائلة المرايا وغيرها من العروض والفعاليات الممتعة الاخرى', 'A special recreational activity for children and families in Jeddah includes a wide range of activities and exciting activities. The whole family can have a fun time and attend the most beautiful children\'s plays such as Masha, Aldab, Jamila, the Beast, Halo Katie, Maraya family and other fun events.', 20, 40, 70, 85, '17:00', '2019-08-21', '21.45202681982583', '39.188720703125', 4, 3, 6, 4, 50, 15, 20, '2019-07-21 12:59:14', '2019-07-21 12:59:14'),
(17, 'جاز فيستيفال', 'Jazz Festival', '\"مهرجان فني يقدم فرصة للزوار لعيش تجربة ممتعة مع خمس فرق جاز عالمية. \"', '\"A technical festival that offers visitors the opportunity to experience an enjoyable experience with five international jazz teams.\"', 100, 150, 250, 220, '20:00', '2019-08-10', '21.472475866265444', '39.188720703125', 4, 3, 4, 6, 120, 50, 50, '2019-07-21 13:11:17', '2019-07-21 13:11:17'),
(18, 'حفل محمد حماقي في جدة', 'Mohamed Hamaki Concert in Jeddah', 'حفل غنائي جماهيري يحيه الفنان محمد حماقي .', 'A public concert by artist Mohamed Hamaki.', 150, 200, 250, 500, '22:00', '2019-08-10', '21.45202681982583', '39.188720703125', 4, 3, 4, 10, 200, 150, 150, '2019-07-21 13:17:59', '2019-07-21 13:17:59'),
(19, 'حفلات ربيع جده، وائل جسار وصابر الرباعي', 'The concerts of Rabeeh Jiddah, Wael Jassar and Saber Al Ribai', '\"حفل غنائي جماهيري يحييه الفنانين وائل جسار وصابر الرباعي. \"', '\"A public concert by artists Wael Jassar and Saber Al Ribai.\"', 100, 150, 200, 200, '22:00', '2019-09-24', '21.45202681982583', '39.210693359375', 4, 3, 4, 3, 100, 50, 50, '2019-07-21 13:23:06', '2019-07-21 13:23:06'),
(20, 'مباراة اليابان - السعودية', 'Japan - Saudi Arabia Match', 'تقام مباراة اليابان والسعودية فى كأس آسيا فى ملعب الملك فهد الدولي', 'Japan and Saudi Arabia will play in the Asian Cup at the King Fahd International Stadium', 100, 180, 250, 110, '21:00', '2019-08-25', '24.712136122999084', '46.681396484375', 3, 3, 5, 4, 50, 30, 30, '2019-07-21 15:33:00', '2019-07-21 15:33:00'),
(21, 'مباراة السعودية - قطر', 'Saudi Arabia - Qatar Match', 'مباراة السعودية - قطر فى كأس آسيا تقام على ارض  مدينة الملك عبدالله الرياضية.', 'Saudi Arabia - Qatar match in the Asian Cup held on the land of King Abdullah Sports City.', 150, 200, 250, 200, '22:00', '2019-08-30', '21.48269931320922', '39.19970703125', 4, 3, 5, 2, 100, 50, 50, '2019-07-21 15:38:21', '2019-07-21 15:38:21'),
(22, 'مباراة لبنان - السعودية', 'Lebanon - Saudi Arabia Match', 'تقام مباراة لبنان والسعودية فى كأس آسيا على ارض استاد الأمير عبد الله الفيصل', 'The match between Lebanon and Saudi Arabia will be held in the Asian Cup on the ground of Prince Abdullah Al Faisal Stadium', 170, 210, 300, 170, '21:00', '2019-09-12', '21.477587679455663', '39.1942138671875', 4, 3, 5, 3, 70, 50, 50, '2019-07-21 15:49:34', '2019-07-21 15:49:34'),
(23, 'مباراة السعودية - كوريا الشمالية', 'Saudi Arabia vs North Korea', 'ترقبوا مباراة السعودية و كوريا الشمالية فى كأس آسيا والتى ستقام على ملعب الأمير فيصل بن فهد.', 'Watch the match between Saudi Arabia and North Korea in the Asian Cup, which will be held at Prince Faisal bin Fahd Stadium.', 150, 200, 250, 200, '21:00', '2019-09-17', '24.705898344057807', '46.68208312988281', 3, 3, 5, 4, 100, 50, 50, '2019-07-21 15:55:02', '2019-07-21 15:55:02'),
(24, 'مباراة اﻷردن - السعودية', 'Jordan - Saudi Arabia Match', 'المبارة القادمة بين اﻻردن و السعودية فى كأس آسيا سوف تقام على ملعب الأمير سلطان بن فهد.', 'The next match between Jordan and Saudi Arabia in the Asian Cup will be held at Prince Sultan Bin Fahad Stadium.', 160, 200, 3000, 240, '22:00', '2019-09-21', '21.472475866265444', '39.188720703125', 4, 3, 5, 7, 120, 60, 60, '2019-07-21 16:10:29', '2019-07-21 16:10:29'),
(25, 'مهرجان الورد والفاكهة', 'Festival of roses and fruit', 'مهرجان \"الورود والفاكهة\" أحد المميزات التي تحظى بها منطقة تبوك, حيث يضم في نسخته الحالية أكثر من 40 فعالية, ومعرض للأسر المنتجة، وتتوسطه سجادة ورد زرع فيها أكثر من مليون زهرة قامت بتنفيذها أمانة منطقة تبوك، بالإضافه إلى فعاليات متنوعة تتربع على مساحة المهرجان الذي تجاوز ضعف مساحة المهرجان في نسخته السابقة، وستستمر هذه الفعاليات لمدة عشرة أيام بمشيئة الله تعالى بتنوع ترفيهي وثقافي واقتصادي شامل', 'The festival \"roses and fruits\" is one of the characteristics of the Tabuk region, which includes in its current version more than 40 activities, and a gallery of productive families, with a carpet of roses planted by more than one million flowers implemented by the Secretariat of the Tabuk region, Which exceeded twice the area of the festival in its previous version, and will continue these events for ten days, God willing, a wide variety of recreational, cultural and economic', 50, 70, 100, 150, '10:00', '2019-09-21', '28.39041564636703', '36.56298828125', 11, 3, 7, 5, 100, 20, 30, '2019-07-21 16:25:51', '2019-07-21 16:25:51'),
(26, 'مهرجان إبتسامة حي', 'District Smile Festival', 'عروض السيرك – عروض المسرح – مسابقات وجوائز – خيمة البلوت-الخيمة الفنية – بيت الرعب – ساحة للدبابات – ساحة لتعليم الفروسية – ساحة ملاعب رجالية ونسائية – مسابح – ساحة للألعاب الهوائية والكهربائية – معارض للجهات الحكومية – معارض خيريه – معارض لخدمة المجتمع – معارض للتطوع الجماعي.', 'Circus Shows - Theater Shows - Contests and Awards - Balot Tent - Technical Tent - Horror House - Tank Square - Equestrian Center - Men\'s and Women\'s Playgrounds - Swimming Pools - Aerial and Electric Playgrounds - Showrooms Collective.', 30, 70, 120, 180, '09:00', '2019-08-10', '21.472475866265494', '39.19970703125', 4, 3, 7, 6, 100, 50, 30, '2019-07-21 16:30:13', '2019-07-21 16:30:13'),
(27, 'مهرجان \"عالم خيالي\"', 'Fictional World Festival', 'المهرجان عبارة عن مجموعة من الأنشطة الترفيهية المتنوعة لكافة الأعمار .', 'The festival is a variety of recreational activities for all ages.', 30, 50, 80, 120, '10:00', '2019-08-25', '21.55424332566551', '39.210693359375', 4, 3, 7, 3, 60, 30, 30, '2019-07-21 16:33:42', '2019-07-21 16:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `type`, `key`, `created_at`, `updated_at`) VALUES
(1, '5d189922c0d1b-1561893154-TwgR7aMMQT.jpg', 'ads', 2, '2019-06-30 09:12:34', '2019-06-30 09:12:34'),
(2, '5d189922c117d-1561893154-f1ojVq6hg1.jpg', 'ads', 2, '2019-06-30 09:12:34', '2019-06-30 09:12:34'),
(3, '5d189922cae66-1561893154-HMypbwM8x4.jpg', 'ads', 2, '2019-06-30 09:12:34', '2019-06-30 09:12:34'),
(4, '5d18997d105c2-1561893245-SFJDIgDyh3.jpg', 'ads', 3, '2019-06-30 09:14:05', '2019-06-30 09:14:05'),
(5, '5d18997d10a4d-1561893245-mmQCe14Yom.jpg', 'ads', 3, '2019-06-30 09:14:05', '2019-06-30 09:14:05'),
(6, '5d18997d10e93-1561893245-G8wPYROc94.jpg', 'ads', 3, '2019-06-30 09:14:05', '2019-06-30 09:14:05'),
(7, '5d189c7cb6bcd-1561894012-F5VClolOSk.jpeg', 'ads', 4, '2019-06-30 09:26:52', '2019-06-30 09:26:52'),
(8, '5d189c7cb7206-1561894012-hLrx1F4f1G.jpeg', 'ads', 4, '2019-06-30 09:26:52', '2019-06-30 09:26:52'),
(9, '5d189c7cb7869-1561894012-F9Rnogxzgz.jpeg', 'ads', 4, '2019-06-30 09:26:52', '2019-06-30 09:26:52'),
(10, '5d1a30da5422f-1561997530-BEgdl1EB9C.jpg', 'event', 1, '2019-07-01 14:12:10', '2019-07-01 14:12:10'),
(11, '5d1a30da76789-1561997530-PzZDSjJVz3.jpg', 'event', 1, '2019-07-01 14:12:10', '2019-07-01 14:12:10'),
(12, '5d1a30da8eb6e-1561997530-4PAvUdXTgf.jpg', 'event', 1, '2019-07-01 14:12:10', '2019-07-01 14:12:10'),
(13, '5d1b181943c9f-1562056729-KxPp6YGTIb.jpg', 'event', 2, '2019-07-02 06:38:49', '2019-07-02 06:38:49'),
(14, '5d1b181956be7-1562056729-AVeoQn9l3U.jpg', 'event', 2, '2019-07-02 06:38:49', '2019-07-02 06:38:49'),
(15, '5d1b181969e16-1562056729-ymf5UA8Qap.jpg', 'event', 2, '2019-07-02 06:38:49', '2019-07-02 06:38:49'),
(16, '5d1b1c691536d-1562057833-c2OlAIYbCZ.jpg', 'event', 3, '2019-07-02 06:57:13', '2019-07-02 06:57:13'),
(17, '5d1b1c694814b-1562057833-jeQFlh7So5.jpg', 'event', 3, '2019-07-02 06:57:13', '2019-07-02 06:57:13'),
(18, '5d1b1c6952b2a-1562057833-pyCZbPfR5A.jpg', 'event', 3, '2019-07-02 06:57:13', '2019-07-02 06:57:13'),
(19, '5d1b1ca65ebf8-1562057894-4R8T7EDKg9.jpg', 'event', 4, '2019-07-02 06:58:14', '2019-07-02 06:58:14'),
(20, '5d1b1ca673fd8-1562057894-prxpyVGj6l.jpg', 'event', 4, '2019-07-02 06:58:14', '2019-07-02 06:58:14'),
(21, '5d1b1ca69237c-1562057894-hwZ1hL7gDK.jpg', 'event', 4, '2019-07-02 06:58:14', '2019-07-02 06:58:14'),
(23, '5d1cf9a6941d6-1562180006-psMFhMTi5p.jpeg', 'ads', 5, '2019-07-03 16:53:26', '2019-07-03 16:53:26'),
(24, '5d21db3158e90-1562499889-H7auxRc9hg.mp4', 'ads', 8, '2019-07-07 09:44:49', '2019-07-07 09:44:49'),
(25, '5d21db9515b6b-1562499989-QKkJAtoJ2v.MP4', 'ads', 9, '2019-07-07 09:46:29', '2019-07-07 09:46:29'),
(28, '5d21f95e6ee61-1562507614-zAXxN1RPW5.jpg', 'ads', 11, '2019-07-07 11:53:34', '2019-07-07 11:53:34'),
(29, '5d21f95e6f45a-1562507614-KIBiIiqosp.png', 'ads', 11, '2019-07-07 11:53:34', '2019-07-07 11:53:34'),
(30, '5d21f95e6fed3-1562507614-BkqzAKrOsf.png', 'ads', 11, '2019-07-07 11:53:34', '2019-07-07 11:53:34'),
(31, '5d222329246ef-1562518313-xRCxTLmtcK.png', 'event', 5, '2019-07-07 14:51:53', '2019-07-07 14:51:53'),
(32, '5d22232924d1a-1562518313-kGNnGRaqY6.jpg', 'event', 5, '2019-07-07 14:51:53', '2019-07-07 14:51:53'),
(33, '5d2223292521f-1562518313-jbRwdKDIIZ.png', 'event', 5, '2019-07-07 14:51:53', '2019-07-07 14:51:53'),
(34, '5d22462db174c-1562527277-gfx1vIU6Qj.jpg', 'event', 6, '2019-07-07 17:21:17', '2019-07-07 17:21:17'),
(35, '5d22462db1f3f-1562527277-AtD64tnReu.png', 'event', 6, '2019-07-07 17:21:17', '2019-07-07 17:21:17'),
(36, '5d22462db2bc1-1562527277-mtYolqyzdj.png', 'event', 6, '2019-07-07 17:21:17', '2019-07-07 17:21:17'),
(37, '5d275f680ac6f-1562861416-m2Z751gLgp.jpg', 'event', 7, '2019-07-11 14:10:16', '2019-07-11 14:10:16'),
(38, '5d275f9fb4378-1562861471-il2T6gRw3D.jpg', 'event', 8, '2019-07-11 14:11:11', '2019-07-11 14:11:11'),
(39, '5d275ff0eef51-1562861552-dOxxkBJHq9.jpg', 'event', 9, '2019-07-11 14:12:32', '2019-07-11 14:12:32'),
(40, '5d2761b63b0ca-1562862006-PxFZXOpsaW.jpg', 'event', 10, '2019-07-11 14:20:06', '2019-07-11 14:20:06'),
(41, '5d2ef4e37a1aa-1563358435-zyezh0xHoo.png', 'event', 11, '2019-07-17 08:13:55', '2019-07-17 08:13:55'),
(42, '5d347108d8609-1563717896-6VIYfJJpdz.jpeg', 'event', 12, '2019-07-21 12:04:56', '2019-07-21 12:04:56'),
(43, '5d347705164d1-1563719429-N4EhX2vnMu.jpg', 'event', 13, '2019-07-21 12:30:29', '2019-07-21 12:30:29'),
(44, '5d347bb75dd19-1563720631-hVCtdyTNB2.jpg', 'event', 14, '2019-07-21 12:50:31', '2019-07-21 12:50:31'),
(45, '5d347ce6ad059-1563720934-bGcvlGWSFu.jpg', 'event', 15, '2019-07-21 12:55:34', '2019-07-21 12:55:34'),
(46, '5d347dc28ad9d-1563721154-kzvr9tP0b7.jpg', 'event', 16, '2019-07-21 12:59:14', '2019-07-21 12:59:14'),
(47, '5d348095b5abc-1563721877-fOPeF36YnK.jpg', 'event', 17, '2019-07-21 13:11:17', '2019-07-21 13:11:17'),
(48, '5d3482276c344-1563722279-vKXDMnyBAi.jpg', 'event', 18, '2019-07-21 13:17:59', '2019-07-21 13:17:59'),
(49, '5d34835ac14cd-1563722586-BLAZlgB4XU.jpg', 'event', 19, '2019-07-21 13:23:06', '2019-07-21 13:23:06'),
(50, '5d34a1ccab20b-1563730380-sHAX5rt15d.jpg', 'event', 20, '2019-07-21 15:33:00', '2019-07-21 15:33:00'),
(51, '5d34a30d1794e-1563730701-ZjjTr6B65h.jpg', 'event', 21, '2019-07-21 15:38:21', '2019-07-21 15:38:21'),
(52, '5d34a5ae65319-1563731374-lMO1ZVTgJa.jpeg', 'event', 22, '2019-07-21 15:49:34', '2019-07-21 15:49:34'),
(53, '5d34a6f64ccae-1563731702-fbC7pZ24XD.png', 'event', 23, '2019-07-21 15:55:02', '2019-07-21 15:55:02'),
(54, '5d34aa95dc6c9-1563732629-3tGbMogtAt.png', 'event', 24, '2019-07-21 16:10:29', '2019-07-21 16:10:29'),
(55, '5d34ae2f6405a-1563733551-i58mazKNUM.jpeg', 'event', 25, '2019-07-21 16:25:51', '2019-07-21 16:25:51'),
(56, '5d34ae6a51cd2-1563733610-CJcwhP0qXh.jpeg', 'event', 25, '2019-07-21 16:26:50', '2019-07-21 16:26:50'),
(57, '5d34af35a8fb9-1563733813-KTnV3ws50w.png', 'event', 26, '2019-07-21 16:30:13', '2019-07-21 16:30:13'),
(58, '5d34b006f0415-1563734022-0qJl0XAIQ2.jpeg', 'event', 27, '2019-07-21 16:33:42', '2019-07-21 16:33:42'),
(59, '5d36b41e2b9e9-1563866142-uWM0BMn6DH.png', 'ads', 10, '2019-07-23 05:15:42', '2019-07-23 05:15:42'),
(60, '5d36b41e2c54a-1563866142-m67SCvWl6n.png', 'ads', 10, '2019-07-23 05:15:42', '2019-07-23 05:15:42'),
(61, '5d4a8fd3b1b82-1565167571-r6ocrHNxJT.jpg', 'test', 100, '2019-08-07 06:46:11', '2019-08-07 06:46:11'),
(62, '5d4a9da398d29-1565171107-W0nWoEPJjY.jpg', 'test', 100, '2019-08-07 07:45:07', '2019-08-07 07:45:07'),
(63, '5d4aa02ddb3ea-1565171757-fIcVhDoR4O.MP4', 'test', 100, '2019-08-07 07:56:05', '2019-08-07 07:56:05'),
(64, '5d4aa238b0070-1565172280-U6OxJOlqvp.mp4', 'test', 100, '2019-08-07 08:04:42', '2019-08-07 08:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `intros`
--

CREATE TABLE `intros` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intros`
--

INSERT INTO `intros` (`id`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'مناسبات', 'events', 'هذا نص تجريبي لوصف الانترو عن المناسبات و يمكن تعديله او اضافه نص جديد من لوحه التحكم', 'This is an experimental text describing the intro of the events and can be modified or added new text from the control panel', '5d3ead188927a-1564388632-yRkZdCASED.png', '2019-07-11 07:44:48', '2019-07-29 06:26:16'),
(2, 'حفلات', 'parties', 'هذا نص تجريبي لوصف الانترو عن الحفلات و يمكن تعديله او اضافه نص جديد من لوحه التحكم', 'This is a demo text to describe the intro on swaps and can be modified or added to a new text from the control panel', '5d3ead33308d7-1564388659-y3vsozqaHp.png', '2019-07-29 06:24:19', '2019-07-29 06:25:34'),
(3, 'مباريات', 'matches', 'هذا نص تجريبي لوصف الانترو عن الباريات و يمكن تعديله او اضافه نص جديد من لوحه التحكم', 'This is a demo text to describe the etro on swaps and can be modified or added to a new text from the control panel', '5d3ead4d2afe2-1564388685-VAxA8bjgO5.png', '2019-07-29 06:24:45', '2019-07-29 06:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_26_110013_create_roles_table', 1),
(4, '2018_06_26_110120_create_permissions_table', 1),
(5, '2018_07_01_104552_create_reports_table', 1),
(6, '2018_07_01_123905_create_app_seetings_table', 1),
(7, '2018_07_02_074616_create_socials_table', 1),
(8, '2019_04_14_094700_create_countries_table', 2),
(9, '2019_03_07_114041_create_categories_table', 3),
(10, '2019_03_10_091338_create_images_table', 3),
(11, '2019_03_10_091303_create_ads_table', 4),
(12, '2019_06_30_091733_create_intros_table', 5),
(13, '2019_06_30_092753_create_organizations_table', 6),
(14, '2019_06_30_101104_create_events_table', 7),
(15, '2019_07_02_091335_create_bookings_table', 8),
(16, '2019_07_11_094950_create_app_sections_table', 9),
(17, '2019_07_11_151959_create_reviews_table', 10),
(18, '2019_07_15_143944_create_contact_uses_table', 11),
(19, '2019_07_16_140717_create_saves_table', 12),
(20, '2019_07_24_072907_create_notifies_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `notifies`
--

CREATE TABLE `notifies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifies`
--

INSERT INTO `notifies` (`id`, `title_ar`, `title_en`, `body_ar`, `body_en`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'اشعار اداري', 'Admin Notification', 'test', 'test', 8, '2019-07-24 07:36:22', '2019-07-24 07:36:22'),
(3, 'اشعار اداري', 'Admin Notification', 'test', 'test', 8, '2019-07-24 07:36:54', '2019-07-24 07:36:54'),
(5, 'اشعار اداري', 'Admin Notification', 'test', 'test', 8, '2019-07-24 07:39:31', '2019-07-24 07:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name_ar`, `name_en`, `icon`, `created_at`, `updated_at`) VALUES
(3, 'هيئة الترفية', 'internment', '5d2daa52c6d2f-1563273810-cxJzRMu3aY.png', '2019-07-16 08:43:30', '2019-07-16 08:43:30'),
(4, 'هيئة الثقافة', 'culture org', '5d2daa7e1b794-1563273854-r9K1IcFkJz.png', '2019-07-16 08:44:14', '2019-07-16 08:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `permissions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permissions`, `role_id`, `created_at`, `updated_at`) VALUES
(887, 'dashboard', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(888, 'permissionslist', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(889, 'addpermissionspage', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(890, 'addpermission', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(891, 'editpermissionpage', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(892, 'updatepermission', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(893, 'deletepermission', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(894, 'admins', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(895, 'addadmin', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(896, 'updateadmin', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(897, 'deleteadmin', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(898, 'deleteadmins', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(899, 'users', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(900, 'adduser', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(901, 'updateuser', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(902, 'deleteuser', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(903, 'deleteusers', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(904, 'send-fcm', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(905, 'countries', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(906, 'addCountry', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(907, 'updateCountry', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(908, 'deleteCountry', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(909, 'deleteCountries', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(910, 'sales-reports', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(911, 'clearBookings', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(912, 'filterReport', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(913, 'ads', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(914, 'addAd', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(915, 'updateAd', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(916, 'deleteAd', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(917, 'deleteAds', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(918, 'deleteImg', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(919, 'categories', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(920, 'addCategory', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(921, 'updateCategory', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(922, 'deleteCategory', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(923, 'deleteCategories', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(924, 'organizations', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(925, 'addOrganization', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(926, 'updateOrganization', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(927, 'deleteOrganization', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(928, 'deleteOrganizations', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(929, 'intro', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(930, 'addIntro', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(931, 'updateIntro', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(932, 'deleteIntro', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(933, 'deleteIntros', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(934, 'events', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(935, 'addEvent', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(936, 'updateEvent', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(937, 'deleteEvent', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(938, 'deleteEvents', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(939, 'reviewEvents', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(940, 'acceptEvents', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(941, 'bookings', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(942, 'addBooking', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(943, 'updateBooking', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(944, 'deleteBooking', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(945, 'deleteBookings', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(946, 'allreports', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(947, 'deletereports', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(948, 'settings', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(949, 'sitesetting', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(950, 'add-social', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(951, 'update-social', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(952, 'delete-social', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(953, 'appSection', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(954, 'aboutUs', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(955, 'roles', 1, '2019-07-11 15:50:48', '2019-07-11 15:50:48'),
(979, 'dashboard', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(980, 'countries', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(981, 'addCountry', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(982, 'updateCountry', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(983, 'deleteCountry', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(984, 'deleteCountries', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(985, 'categories', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(986, 'addCategory', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(987, 'updateCategory', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(988, 'deleteCategory', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(989, 'deleteCategories', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(990, 'organizations', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(991, 'addOrganization', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(992, 'updateOrganization', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(993, 'deleteOrganization', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(994, 'deleteOrganizations', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(995, 'events', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(996, 'addEvent', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(997, 'updateEvent', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(998, 'deleteEvent', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(999, 'deleteEvents', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(1000, 'reviewEvents', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(1001, 'acceptEvents', 2, '2019-07-23 12:56:25', '2019-07-23 12:56:25'),
(1002, 'dashboard', 3, '2019-07-23 12:57:10', '2019-07-23 12:57:10'),
(1003, 'events', 3, '2019-07-23 12:57:10', '2019-07-23 12:57:10'),
(1004, 'addEvent', 3, '2019-07-23 12:57:10', '2019-07-23 12:57:10'),
(1005, 'updateEvent', 3, '2019-07-23 12:57:10', '2019-07-23 12:57:10'),
(1006, 'deleteEvent', 3, '2019-07-23 12:57:10', '2019-07-23 12:57:10'),
(1007, 'deleteEvents', 3, '2019-07-23 12:57:10', '2019-07-23 12:57:10'),
(1008, 'reviewEvents', 3, '2019-07-23 12:57:10', '2019-07-23 12:57:10'),
(1009, 'acceptEvents', 3, '2019-07-23 12:57:10', '2019-07-23 12:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `event` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervisor` int(11) NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `event`, `supervisor`, `ip`, `country`, `city`, `area`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'قام Admin اضافة دولة', 1, '52.203.57.74', 'US', 'Virginia Beach', 'Virginia', 1, '2019-06-30 08:22:55', '2019-06-30 08:22:55'),
(2, 'قام Admin اضافة دولة', 1, '194.90.76.3', 'IL', 'Haifa', 'Hefa', 1, '2019-06-30 08:30:00', '2019-06-30 08:30:00'),
(3, 'قام Admin تعديل دولة مصر 2', 1, '214.62.142.166', 'US', '', '', 1, '2019-06-30 08:30:17', '2019-06-30 08:30:17'),
(4, 'قام Admin اضافة دولة', 1, '232.197.132.102', '', '', '', 1, '2019-06-30 08:30:35', '2019-06-30 08:30:35'),
(5, 'قام Admin اضافة دولة', 1, '90.184.223.12', 'DK', 'Jyderup', 'Zealand', 1, '2019-06-30 08:30:50', '2019-06-30 08:30:50'),
(6, 'قام Admin قام بحذف العديد من الدول', 1, '201.4.26.44', 'BR', 'Belo Horizonte', 'Minas Gerais', 1, '2019-06-30 08:40:49', '2019-06-30 08:40:49'),
(7, 'قام Admin بحذف دولة', 1, '76.254.210.201', 'US', 'Catoosa', 'Oklahoma', 1, '2019-06-30 08:41:03', '2019-06-30 08:41:03'),
(8, 'قام Admin اضافة الاعلان', 1, '98.211.84.71', 'US', 'Felton', 'Delaware', 1, '2019-06-30 09:12:35', '2019-06-30 09:12:35'),
(9, 'قام Admin قام بحذف العديد من الاعلانات', 1, '51.226.165.201', 'DE', '', '', 1, '2019-06-30 09:12:45', '2019-06-30 09:12:45'),
(10, 'قام Admin اضافة الاعلان', 1, '17.93.21.92', 'US', '', '', 1, '2019-06-30 09:14:05', '2019-06-30 09:14:05'),
(11, 'قام Admin اضافة الاعلان', 1, '88.204.21.212', 'RU', 'Tomsk', 'Tomsk', 1, '2019-06-30 09:26:53', '2019-06-30 09:26:53'),
(12, 'قام Admin اضافة قسم', 1, '90.232.64.18', 'SE', 'Byxelkrok', 'Kalmar', 1, '2019-06-30 09:36:17', '2019-06-30 09:36:17'),
(13, 'قام Admin اضافة هيئة', 1, '161.33.135.155', 'US', '', '', 1, '2019-07-01 10:07:11', '2019-07-01 10:07:11'),
(14, 'قام Admin تعديل هيئة هيئة الترفية', 1, '73.28.169.65', 'US', 'Port Charlotte', 'Florida', 1, '2019-07-01 10:09:04', '2019-07-01 10:09:04'),
(15, 'قام Admin اضافة هيئة', 1, '147.80.85.56', 'US', '', '', 1, '2019-07-01 10:10:22', '2019-07-01 10:10:22'),
(16, 'قام Admin اضافة مناسبة', 1, '103.149.12.144', '', '', '', 1, '2019-07-01 14:12:11', '2019-07-01 14:12:11'),
(17, 'قام Admin اضافة مناسبة', 1, '45.6.154.17', 'BR', 'Dourados', 'Mato Grosso do Sul', 1, '2019-07-02 06:38:50', '2019-07-02 06:38:50'),
(18, 'قام Admin تعديل المناسبة 212121', 1, '167.97.22.221', 'US', '', '', 1, '2019-07-02 06:44:18', '2019-07-02 06:44:18'),
(19, 'قام Admin بحذف القسم', 1, '208.225.161.94', 'US', '', '', 1, '2019-07-02 06:46:44', '2019-07-02 06:46:44'),
(20, 'قام Admin اضافة قسم', 1, '66.183.240.175', 'CA', 'Vancouver', 'British Columbia', 1, '2019-07-02 06:51:05', '2019-07-02 06:51:05'),
(21, 'قام Admin اضافة مناسبة', 1, '44.171.255.252', 'US', '', '', 1, '2019-07-02 06:57:14', '2019-07-02 06:57:14'),
(22, 'قام Admin اضافة مناسبة', 1, '77.124.184.45', 'IL', 'Al Mas`udiya', 'Tel Aviv', 1, '2019-07-02 06:58:15', '2019-07-02 06:58:15'),
(23, 'قام Admin تعديل المناسبة fdgdgdfg', 1, '3.118.107.222', 'US', 'Seattle', 'Washington', 1, '2019-07-02 07:11:52', '2019-07-02 07:11:52'),
(24, 'قام Admin اضافة حجز', 1, '225.77.237.121', '', '', '', 1, '2019-07-02 08:36:50', '2019-07-02 08:36:50'),
(25, 'قام Admin تعديل حجز رقم 1', 1, '246.147.155.26', '', '', '', 1, '2019-07-02 09:42:42', '2019-07-02 09:42:42'),
(26, 'قام Admin اضافة حجز', 1, '103.243.196.248', 'JP', '', '', 1, '2019-07-02 09:43:32', '2019-07-02 09:43:32'),
(27, 'قام Admin اضافة حجز', 1, '133.39.211.198', 'JP', '', '', 1, '2019-07-02 09:43:51', '2019-07-02 09:43:51'),
(28, 'قام Admin اضافة حجز', 1, '180.93.222.18', 'VN', 'Ho Chi Minh', 'Ho Chi Minh', 1, '2019-07-02 09:44:11', '2019-07-02 09:44:11'),
(29, 'قام Admin بحذف الحجز', 1, '56.104.37.27', 'US', '', '', 1, '2019-07-02 09:44:36', '2019-07-02 09:44:36'),
(30, 'قام Admin قام بحذف العديد من الحجوزات', 1, '126.87.95.233', 'JP', 'Fuji', 'Shizuoka', 1, '2019-07-02 09:44:57', '2019-07-02 09:44:57'),
(31, 'قام Admin بتحديث بيانات التطبيق', 1, '4.215.34.190', 'US', '', '', 1, '2019-07-02 10:34:26', '2019-07-02 10:34:26'),
(32, 'قام Admin بتعديل بيانات المشرف', 1, '197.61.152.101', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 06:25:58', '2019-07-03 06:25:58'),
(33, 'قام Admin باضافة عضو جديد', 1, '197.61.152.101', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 07:04:02', '2019-07-03 07:04:02'),
(34, 'قام Admin قام بارسال اشعار', 1, '197.61.152.101', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 07:04:21', '2019-07-03 07:04:21'),
(35, 'قام Admin بحذف القسم', 1, '197.61.152.101', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 07:09:56', '2019-07-03 07:09:56'),
(36, 'قام Admin قام بحذف العديد من الهيئات', 1, '197.61.152.101', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 07:10:30', '2019-07-03 07:10:30'),
(37, 'قام Admin باضافة عضو جديد', 1, '197.61.152.101', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 07:11:56', '2019-07-03 07:11:56'),
(38, 'قام Admin قام بحذف العديد من الاعضاء', 1, '197.61.152.101', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 07:12:09', '2019-07-03 07:12:09'),
(39, 'قام Admin قام بحذف العديد من الاعلانات', 1, '197.61.150.98', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 13:26:46', '2019-07-03 13:26:46'),
(40, 'قام Admin اضافة الاعلان', 1, '197.61.150.98', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 16:53:26', '2019-07-03 16:53:26'),
(41, 'قام Admin بحذف الاعلان', 1, '197.61.150.98', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 17:50:34', '2019-07-03 17:50:34'),
(42, 'قام Admin اضافة قسم', 1, '197.61.150.98', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 17:51:49', '2019-07-03 17:51:49'),
(43, 'قام Admin بحذف دولة', 1, '197.61.150.98', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 17:55:14', '2019-07-03 17:55:14'),
(44, 'قام Admin بحذف القسم', 1, '197.61.150.98', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 17:55:32', '2019-07-03 17:55:32'),
(45, 'قام Admin بتحديث بيانات التطبيق', 1, '197.61.150.98', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 17:57:55', '2019-07-03 17:57:55'),
(46, 'قام Admin باضافة موقع تواصل جدبد', 1, '197.61.150.98', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 17:58:33', '2019-07-03 17:58:33'),
(47, 'قام Admin بحذف موقع تواصل', 1, '197.61.150.98', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 17:58:43', '2019-07-03 17:58:43'),
(48, 'قام Admin اضافة دولة', 1, '51.39.236.29', 'SA', 'Al Balad', 'Makkah', 1, '2019-07-03 18:08:35', '2019-07-03 18:08:35'),
(49, 'قام Admin اضافة قسم', 1, '197.61.150.98', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-03 18:21:27', '2019-07-03 18:21:27'),
(50, 'قام Admin قام بحذف العديد من الاعلانات', 1, '41.34.50.212', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-07 09:43:24', '2019-07-07 09:43:24'),
(51, 'قام Admin اضافة الاعلان', 1, '41.34.50.212', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-07 09:44:49', '2019-07-07 09:44:49'),
(52, 'قام Admin اضافة الاعلان', 1, '41.34.50.212', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-07 09:46:29', '2019-07-07 09:46:29'),
(53, 'قام Admin اضافة الاعلان', 1, '41.34.50.212', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-07 11:39:48', '2019-07-07 11:39:48'),
(54, 'قام Admin اضافة الاعلان', 1, '41.34.50.212', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-07 11:53:34', '2019-07-07 11:53:34'),
(55, 'قام Admin اضافة مناسبة', 1, '41.37.95.81', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-07 14:51:53', '2019-07-07 14:51:53'),
(56, 'قام Admin اضافة حجز', 1, '41.37.95.81', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-07 14:52:28', '2019-07-07 14:52:28'),
(57, 'قام Admin اضافة مناسبة', 1, '41.37.95.81', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-07 17:21:18', '2019-07-07 17:21:18'),
(58, 'قام Admin اضافة انترو', 1, '197.61.104.122', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-11 07:44:48', '2019-07-11 07:44:48'),
(59, 'قام Admin بتحديث بيانات التطبيق', 1, '197.61.104.122', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-11 07:47:27', '2019-07-11 07:47:27'),
(60, 'قام Admin بتحديث بيانات التطبيق', 1, '197.61.104.122', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-11 09:14:37', '2019-07-11 09:14:37'),
(61, 'قام Admin باضافة مشرف جديد', 1, '197.61.104.122', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-11 13:57:32', '2019-07-11 13:57:32'),
(62, 'قام Admin باضافة مشرف جديد', 1, '197.61.104.122', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-11 13:58:15', '2019-07-11 13:58:15'),
(63, 'قام Admin بتعديل بيانات المشرف', 1, '197.61.104.122', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-11 14:01:12', '2019-07-11 14:01:12'),
(64, 'قام Admin بتعديل بيانات المشرف', 1, '197.61.104.122', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-11 14:01:53', '2019-07-11 14:01:53'),
(65, 'قام Admin بتعديل بيانات المشرف', 1, '197.61.104.122', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-11 14:04:57', '2019-07-11 14:04:57'),
(66, 'قام Admin بتعديل بيانات المشرف', 1, '197.61.104.122', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-11 14:05:39', '2019-07-11 14:05:39'),
(67, 'قام Admin بتعديل بيانات المشرف', 1, '197.61.104.122', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-11 14:05:55', '2019-07-11 14:05:55'),
(68, 'قام موظف اضافة مناسبة', 1, '197.61.104.122', 'EG', '', 'Ad Daqahliyah', 5, '2019-07-11 14:11:11', '2019-07-11 14:11:11'),
(69, 'قام موظف اضافة مناسبة', 1, '197.61.104.122', 'EG', '', 'Ad Daqahliyah', 5, '2019-07-11 14:12:33', '2019-07-11 14:12:33'),
(70, 'قام موظف اضافة مناسبة', 1, '197.61.104.122', 'EG', '', 'Ad Daqahliyah', 5, '2019-07-11 14:20:06', '2019-07-11 14:20:06'),
(71, 'قام Admin باضافة موقع تواصل جدبد', 1, '197.61.26.7', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-14 12:49:26', '2019-07-14 12:49:26'),
(72, 'قام Admin اضافة قسم', 1, '154.189.189.22', 'EG', 'Dokki', 'Al Jizah', 1, '2019-07-15 11:05:42', '2019-07-15 11:05:42'),
(73, 'قام Admin اضافة قسم', 1, '154.189.189.22', 'EG', 'Dokki', 'Al Jizah', 1, '2019-07-15 11:07:22', '2019-07-15 11:07:22'),
(74, 'قام Admin اضافة قسم', 1, '154.189.189.22', 'EG', 'Dokki', 'Al Jizah', 1, '2019-07-15 11:10:13', '2019-07-15 11:10:13'),
(75, 'قام Admin باضافة موقع تواصل جدبد', 1, '154.189.189.22', 'EG', 'Dokki', 'Al Jizah', 1, '2019-07-15 12:34:53', '2019-07-15 12:34:53'),
(76, 'قام Admin باضافة موقع تواصل جدبد', 1, '154.189.189.22', 'EG', 'Dokki', 'Al Jizah', 1, '2019-07-15 12:35:20', '2019-07-15 12:35:20'),
(77, 'قام Admin اضافة هيئة', 1, '154.188.6.92', 'EG', 'Dokki', 'Al Jizah', 1, '2019-07-16 08:43:31', '2019-07-16 08:43:31'),
(78, 'قام Admin اضافة هيئة', 1, '154.188.6.92', 'EG', 'Dokki', 'Al Jizah', 1, '2019-07-16 08:44:14', '2019-07-16 08:44:14'),
(79, 'قام Admin اضافة مناسبة', 1, '196.136.9.96', 'EG', 'Bab El Luk', 'Al Qahirah', 1, '2019-07-17 08:13:55', '2019-07-17 08:13:55'),
(80, 'قام Admin اضافة دولة', 1, '197.61.152.128', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-21 11:48:03', '2019-07-21 11:48:03'),
(81, 'قام Admin اضافة دولة', 1, '197.61.152.128', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-21 11:48:53', '2019-07-21 11:48:53'),
(82, 'قام Admin اضافة دولة', 1, '197.61.152.128', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-21 11:49:36', '2019-07-21 11:49:36'),
(83, 'قام Admin اضافة دولة', 1, '197.61.152.128', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-21 11:50:17', '2019-07-21 11:50:17'),
(84, 'قام Admin اضافة دولة', 1, '197.61.152.128', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-21 11:51:01', '2019-07-21 11:51:01'),
(85, 'قام Admin اضافة دولة', 1, '197.61.152.128', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-21 11:51:40', '2019-07-21 11:51:40'),
(86, 'قام Admin اضافة دولة', 1, '197.61.152.128', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-21 11:52:21', '2019-07-21 11:52:21'),
(87, 'قام Admin اضافة دولة', 1, '197.61.152.128', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-21 11:53:08', '2019-07-21 11:53:08'),
(88, 'قام Admin اضافة دولة', 1, '197.61.152.128', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-21 11:54:50', '2019-07-21 11:54:50'),
(89, 'قام Admin اضافة مناسبة', 1, '197.61.152.128', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-21 12:04:57', '2019-07-21 12:04:57'),
(90, 'قام Admin بحذف المناسبة', 1, '197.61.152.128', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-21 12:05:24', '2019-07-21 12:05:24'),
(91, 'قام Admin بحذف المناسبة', 1, '197.61.152.128', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-21 12:06:02', '2019-07-21 12:06:02'),
(92, 'قام Admin اضافة مناسبة', 1, '41.36.97.145', 'EG', 'Al Mansurah', 'Dakahlia', 1, '2019-07-21 12:30:29', '2019-07-21 12:30:29'),
(93, 'قام Admin تعديل المناسبة حفلات صيف أبها 2019', 1, '41.36.97.145', 'EG', 'Al Mansurah', 'Dakahlia', 1, '2019-07-21 12:45:57', '2019-07-21 12:45:57'),
(94, 'قام Admin اضافة مناسبة', 1, '41.36.97.145', 'EG', 'Al Mansurah', 'Dakahlia', 1, '2019-07-21 12:50:31', '2019-07-21 12:50:31'),
(95, 'قام Admin اضافة مناسبة', 1, '41.36.97.145', 'EG', 'Al Mansurah', 'Dakahlia', 1, '2019-07-21 12:55:34', '2019-07-21 12:55:34'),
(96, 'قام Admin اضافة مناسبة', 1, '41.36.97.145', 'EG', 'Al Mansurah', 'Dakahlia', 1, '2019-07-21 12:59:14', '2019-07-21 12:59:14'),
(97, 'قام Admin اضافة مناسبة', 1, '41.36.97.145', 'EG', 'Al Mansurah', 'Dakahlia', 1, '2019-07-21 13:11:17', '2019-07-21 13:11:17'),
(98, 'قام Admin اضافة مناسبة', 1, '41.36.97.145', 'EG', 'Al Mansurah', 'Dakahlia', 1, '2019-07-21 13:17:59', '2019-07-21 13:17:59'),
(99, 'قام Admin اضافة مناسبة', 1, '41.36.97.145', 'EG', 'Al Mansurah', 'Dakahlia', 1, '2019-07-21 13:23:06', '2019-07-21 13:23:06'),
(100, 'قام Admin اضافة مناسبة', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 15:33:01', '2019-07-21 15:33:01'),
(101, 'قام Admin اضافة مناسبة', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 15:38:21', '2019-07-21 15:38:21'),
(102, 'قام Admin اضافة مناسبة', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 15:49:34', '2019-07-21 15:49:34'),
(103, 'قام Admin اضافة مناسبة', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 15:55:02', '2019-07-21 15:55:02'),
(104, 'قام Admin اضافة مناسبة', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 16:10:30', '2019-07-21 16:10:30'),
(105, 'قام Admin تعديل قسم مناسبات', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 16:16:49', '2019-07-21 16:16:49'),
(106, 'قام Admin تعديل قسم مناسبات', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 16:18:00', '2019-07-21 16:18:00'),
(107, 'قام Admin اضافة مناسبة', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 16:25:51', '2019-07-21 16:25:51'),
(108, 'قام Admin تعديل المناسبة مهرجان الورد والفاكهة', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 16:26:50', '2019-07-21 16:26:50'),
(109, 'قام Admin اضافة مناسبة', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 16:30:13', '2019-07-21 16:30:13'),
(110, 'قام Admin اضافة مناسبة', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 16:33:43', '2019-07-21 16:33:43'),
(111, 'قام Admin تعديل قسم حفلات', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 16:38:43', '2019-07-21 16:38:43'),
(112, 'قام Admin تعديل قسم مباريات', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 16:40:08', '2019-07-21 16:40:08'),
(113, 'قام Admin تعديل قسم مسرحيات', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 16:43:19', '2019-07-21 16:43:19'),
(114, 'قام Admin بتحديث بيانات التطبيق', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 16:52:39', '2019-07-21 16:52:39'),
(115, 'قام Admin بتحديث بيانات التطبيق', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 16:53:22', '2019-07-21 16:53:22'),
(116, 'قام Admin بتحديث بيانات التطبيق', 1, '156.217.73.67', 'EG', 'Tanta', 'Al Gharbiyah', 1, '2019-07-21 17:03:51', '2019-07-21 17:03:51'),
(117, 'قام Admin قام بحذف العديد من الاعلانات', 1, '41.34.62.129', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-23 05:14:42', '2019-07-23 05:14:42'),
(118, 'قام Admin بحذف الاعلان', 1, '41.34.62.129', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-23 05:14:59', '2019-07-23 05:14:59'),
(119, 'قام Admin تعديل الاعلان', 1, '41.34.62.129', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-23 05:15:42', '2019-07-23 05:15:42'),
(120, 'قام Admin بحذف مشرف', 1, '197.61.252.65', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-23 12:52:44', '2019-07-23 12:52:44'),
(121, 'قام Admin باضافة مشرف جديد', 1, '197.61.126.235', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-24 05:59:29', '2019-07-24 05:59:29'),
(122, 'قام Admin قام بارسال اشعار', 1, '197.61.126.235', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-24 07:11:05', '2019-07-24 07:11:05'),
(123, 'قام Admin قام بارسال اشعار', 1, '197.61.126.235', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-24 07:59:37', '2019-07-24 07:59:37'),
(124, 'قام Admin قام بارسال اشعار', 1, '197.61.126.235', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-24 08:04:34', '2019-07-24 08:04:34'),
(125, 'قام Admin بتحديث موقع تواصل', 1, '41.34.229.124', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-29 06:17:34', '2019-07-29 06:17:34'),
(126, 'قام Admin بتحديث موقع تواصل', 1, '41.34.229.124', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-29 06:20:09', '2019-07-29 06:20:09'),
(127, 'قام Admin بتحديث موقع تواصل', 1, '41.34.229.124', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-29 06:20:45', '2019-07-29 06:20:45'),
(128, 'قام Admin بتحديث موقع تواصل', 1, '41.34.229.124', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-29 06:21:29', '2019-07-29 06:21:29'),
(129, 'قام Admin تعديل الانترو انترو ١', 1, '41.34.229.124', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-29 06:23:52', '2019-07-29 06:23:52'),
(130, 'قام Admin اضافة انترو', 1, '41.34.229.124', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-29 06:24:19', '2019-07-29 06:24:19'),
(131, 'قام Admin اضافة انترو', 1, '41.34.229.124', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-29 06:24:45', '2019-07-29 06:24:45'),
(132, 'قام Admin تعديل الانترو مباريات', 1, '41.34.229.124', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-29 06:25:13', '2019-07-29 06:25:13'),
(133, 'قام Admin تعديل الانترو حفلات', 1, '41.34.229.124', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-29 06:25:34', '2019-07-29 06:25:34'),
(134, 'قام Admin تعديل الانترو مناسبات', 1, '41.34.229.124', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-29 06:26:16', '2019-07-29 06:26:16'),
(135, 'قام Admin باضافة عضو جديد', 1, '41.34.229.124', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-30 07:03:28', '2019-07-30 07:03:28'),
(136, 'قام Admin بتعديل بيانات العضو', 1, '41.34.229.124', 'EG', '', 'Ad Daqahliyah', 1, '2019-07-30 07:12:18', '2019-07-30 07:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `reviewed_by` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `event_id`, `created_by`, `reviewed_by`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(5, 12, 1, NULL, 4, NULL, '2019-07-21 12:04:56', '2019-07-23 12:57:20'),
(6, 13, 1, NULL, 4, NULL, '2019-07-21 12:30:29', '2019-07-21 12:30:29'),
(7, 14, 1, NULL, 4, NULL, '2019-07-21 12:50:31', '2019-07-21 12:50:31'),
(8, 15, 1, NULL, 4, NULL, '2019-07-21 12:55:34', '2019-07-21 12:55:34'),
(9, 16, 1, NULL, 4, NULL, '2019-07-21 12:59:14', '2019-07-21 12:59:14'),
(10, 17, 1, NULL, 4, NULL, '2019-07-21 13:11:17', '2019-07-21 13:11:17'),
(11, 18, 1, NULL, 4, NULL, '2019-07-21 13:17:59', '2019-07-21 13:17:59'),
(12, 19, 1, NULL, 4, NULL, '2019-07-21 13:23:06', '2019-07-21 13:23:06'),
(13, 20, 1, NULL, 4, NULL, '2019-07-21 15:33:00', '2019-07-21 15:33:00'),
(14, 21, 1, NULL, 4, NULL, '2019-07-21 15:38:21', '2019-07-21 15:38:21'),
(15, 22, 1, NULL, 4, NULL, '2019-07-21 15:49:34', '2019-07-21 15:49:34'),
(16, 23, 1, NULL, 4, NULL, '2019-07-21 15:55:02', '2019-07-21 15:55:02'),
(17, 24, 1, NULL, 4, NULL, '2019-07-21 16:10:29', '2019-07-21 16:10:29'),
(18, 25, 1, NULL, 4, NULL, '2019-07-21 16:25:51', '2019-07-21 16:25:51'),
(19, 26, 1, NULL, 4, NULL, '2019-07-21 16:30:13', '2019-07-21 16:30:13'),
(20, 27, 1, NULL, 4, NULL, '2019-07-21 16:33:42', '2019-07-21 16:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'مدير عام', '2019-06-30 06:51:29', '2019-06-30 06:51:29'),
(2, 'مشرف', '2019-07-11 13:55:43', '2019-07-11 13:55:43'),
(3, 'موظف', '2019-07-11 13:56:12', '2019-07-11 13:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `saves`
--

CREATE TABLE `saves` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saves`
--

INSERT INTO `saves` (`id`, `user_id`, `event_id`, `device_id`, `created_at`, `updated_at`) VALUES
(11, 18, 13, NULL, '2019-08-09 21:41:00', '2019-08-09 21:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `site_name`, `url`, `icon`, `created_at`, `updated_at`) VALUES
(2, 'facebook', 'https://www.facebook.com', '5d3eac39ab057-1564388409-1XtHYsLqC2.png', '2019-07-14 12:49:26', '2019-07-29 06:20:09'),
(3, 'google', 'https://www.google.com', '5d3eac5d90591-1564388445-dcMaJ2F7X4.png', '2019-07-15 12:34:53', '2019-07-29 06:20:45'),
(4, 'instagram', 'https://www.instagram.com', '5d3eac88ec6ec-1564388488-oGoQby0FYk.png', '2019-07-15 12:35:20', '2019-07-29 06:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `active` int(11) NOT NULL DEFAULT 1,
  `checked` int(11) NOT NULL DEFAULT 1,
  `role` int(11) NOT NULL DEFAULT 0,
  `lat` decimal(16,14) DEFAULT NULL,
  `lng` decimal(16,14) DEFAULT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `isNotify` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `code`, `avatar`, `active`, `checked`, `role`, `lat`, `lng`, `device_id`, `remember_token`, `lang`, `isNotify`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@fallah.sa', '$2y$10$BzUAgu8EHtpZpUhOXk8P5uMKV38aDAl/Iqvea.DWWwHdQC7R2XtF2', '01024963845', NULL, '5d34e3bee6454-1563747262-TQd0M1C7aS.jpg', 1, 1, 1, NULL, NULL, NULL, 'UsZTDUDF8rKBPO5OVxsF188r6JH4bV3rN7bkSMVsNgODAOr9JxsBmuiDnFaf', 'ar', 1, '2019-06-30 06:51:43', '2019-07-21 20:14:22'),
(5, 'موظف', 'employee@fallah.sa', '$2y$10$2sTVRQawDGEDTKRz.7moUOnkCjFRuZk7EJ5CpOl3Ma7RctUjDKJxe', '0100234567', '6623', 'default.png', 1, 1, 3, NULL, NULL, NULL, NULL, 'ar', 1, '2019-07-11 13:58:15', '2019-07-24 12:51:08'),
(6, 'shams', 'shams@email.com', '$2y$10$N69cotp2XFbWCct8OerzlO5Sq7FjcvOBjxyUmULNyPbPLFX4nEMt.', '0102345678', NULL, '1564397983_39780.png', 1, 1, 0, NULL, NULL, 'ExponentPushToken[OC0nnjDW8E0mFnuuQkDopE]', '4M9qMykQz4XrJWjCXSsjqVRUxwVQsLKgiA211kWw4cwDEpiY9BzfhVVxZgby', 'en', 0, '2019-07-23 05:08:39', '2019-07-30 19:21:17'),
(7, 'shams', 'shams@email.org', '$2y$10$7WevR0gWJlltlo6HggVdoOiKNcswA4klBATK9GQdjG3ketwwBXkHa', '0100234566', '4364', 'default.png', 0, 1, 0, NULL, NULL, '12112212123', NULL, 'ar', 1, '2019-07-23 06:53:36', '2019-07-23 06:53:36'),
(8, 'اماني', 'amany@gmail.com', '$2y$10$VqkPcs6Jl8bShoUrY/4TA.MsQnZB.j20kUpnNJka6RKVeqACkPDni', '0101448776', '5224', 'default.png', 0, 1, 0, NULL, NULL, '111111', NULL, 'ar', 1, '2019-07-23 07:06:09', '2019-07-24 09:43:46'),
(9, 'shams', 'sham@email.org', '$2y$10$f4eHl8xIUSS/hPA9JgSPm.r2GC.muTUadez/h.9XG.KPkonKlRWm6', '0100234565', '5855', 'default.png', 0, 1, 0, NULL, NULL, '44444444488', NULL, 'ar', 1, '2019-07-23 07:08:34', '2019-07-23 07:08:34'),
(10, 'Asasaa', 'H@h.com', '$2y$10$k7ctnHbMTRpuW3P0l2hsV.aoYxZpdsBCMKRxcDdcbHR5JcOlELIfC', '8686868686', '3867', 'default.png', 0, 1, 0, NULL, NULL, 'ExponentPushToken[4nwSg2CsG7kMkm0O7Xusd4]', NULL, 'ar', 1, '2019-07-23 07:14:36', '2019-07-23 07:14:36'),
(11, 'Amanyyy', 'Amanyy@gmail.com', '$2y$10$LsvkG/IGfLlYoiFAcfgw5uqh6aGPCzc4B2XTxCa40B8OF5FomQzWG', '0102345698', '2260', 'default.png', 0, 1, 0, NULL, NULL, 'ExponentPushToken[4nwSg2CsG7kMkm0O7Xusd4]', NULL, 'ar', 1, '2019-07-23 07:41:09', '2019-07-23 07:41:09'),
(12, 'Hahaha', 'A@a.com', '$2y$10$fof0cpw4xdVContJ7lLlF.Tr/JNDRYG17QfS4vuiOcp5I8QohUKCK', '0123654897', '9578', 'default.png', 0, 1, 0, NULL, NULL, 'ExponentPushToken[4nwSg2CsG7kMkm0O7Xusd4]', NULL, 'ar', 1, '2019-07-23 07:42:57', '2019-07-23 07:42:57'),
(13, 'Shams', 'sss@ss.com', '$2y$10$Zd2.VbjVyuG7B16onQar7O3Vgmsqvtio0AIWuSNuAa.M3X0bqDZg.', '0100234556', '4398', 'default.png', 1, 1, 0, NULL, NULL, 'ExponentPushToken[4nwSg2CsG7kMkm0O7Xusd4]', NULL, 'ar', 1, '2019-07-23 08:01:44', '2019-07-23 08:29:17'),
(14, 'مشرف جديد', 'supervisor@fallah.sa', '$2y$10$tDaCnbg8gtgtXYAK03GrueEGavMxr/MOIb1olSpDWcJhPDr8HwFfm', '0100123456', NULL, 'default.png', 1, 1, 2, NULL, NULL, NULL, NULL, 'ar', 1, '2019-07-24 05:59:29', '2019-07-24 05:59:29'),
(15, 'Mony kassem', 'mony@gmail.com', '$2y$10$OyE0xwMNnYUakvN9gCf5muYxnPs27btG9KZVMbEVZrIlm3AlvYedi', '0101448773', '7872', 'default.png', 1, 1, 0, NULL, NULL, NULL, NULL, 'ar', 1, '2019-07-25 07:11:14', '2019-07-25 07:14:03'),
(16, 'Gggg', 'Ggg@gmail.com', '$2y$10$AQgKVl8bEnkGZQI9SufuWOa6p/Sy3LV9A4gesuyHXBQgNqAZmpIXS', '0102334567', '2171', 'default.png', 1, 1, 0, NULL, NULL, NULL, NULL, 'ar', 1, '2019-07-25 07:17:19', '2019-07-25 07:18:59'),
(17, 'Ooooo', 'Ggggd@gmail.com', '$2y$10$hn/dV2XFqhxtU41FE/azy.KRty8ZROlMQfml9w5SiCisvimm0qzE2', '0111234700', '8751', '1564049877_88122.png', 1, 1, 0, NULL, NULL, NULL, NULL, 'ar', 1, '2019-07-25 07:21:49', '2019-07-25 12:00:54'),
(18, 'fallah user', 'user@fallah.sa', '$2y$10$L5kBECWgLD1LV7Fab2nb3uXarxUlV5YXQhaOEy4aqbwttdkY0Vdvq', '0102345676', NULL, '5d4007dfc7fbc-1564477407-M7Kl8V2Eck.png', 1, 1, 0, NULL, NULL, NULL, NULL, 'ar', 1, '2019-07-30 07:03:27', '2019-07-30 14:43:11'),
(19, 'Shams', 'hsjd@yahoo.com', '$2y$10$TYwcUNZz4b60IOxqfPBIquAzcRE.LREE56T3NrA1kDC8tLs3sdDzK', '0125458752', '9350', 'default.png', 1, 1, 0, NULL, NULL, 'ExponentPushToken[fVeODpDNi_4tgVgzFiCQxH]', NULL, 'en', 1, '2019-08-29 08:32:22', '2019-08-29 08:32:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_user_id_foreign` (`user_id`);

--
-- Indexes for table `app_sections`
--
ALTER TABLE `app_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_event_id_foreign` (`event_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_uses`
--
ALTER TABLE `contact_uses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_country_id_foreign` (`country_id`),
  ADD KEY `organization_id` (`organization_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intros`
--
ALTER TABLE `intros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifies`
--
ALTER TABLE `notifies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_user_id_foreign` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_reviewed_by_foreign` (`reviewed_by`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saves`
--
ALTER TABLE `saves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saves_user_id_foreign` (`user_id`),
  ADD KEY `saves_event_id_foreign` (`event_id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `app_sections`
--
ALTER TABLE `app_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact_uses`
--
ALTER TABLE `contact_uses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `intros`
--
ALTER TABLE `intros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notifies`
--
ALTER TABLE `notifies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saves`
--
ALTER TABLE `saves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifies`
--
ALTER TABLE `notifies`
  ADD CONSTRAINT `notifies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

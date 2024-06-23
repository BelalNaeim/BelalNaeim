-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 11:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `horsehub_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads_categories`
--

CREATE TABLE `ads_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `category_name_ar` varchar(250) NOT NULL,
  `is_special` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads_categories`
--

INSERT INTO `ads_categories` (`category_id`, `category_name`, `category_name_ar`, `is_special`) VALUES
(1, 'Construction And Contracting', 'مقاولات وبناء', 0),
(2, 'Products and Equipment', 'عتاد الخيل', 0),
(3, 'veterinary', 'بيطري', 0),
(4, 'Clinic And Pharmacy', 'العيادة والصيدلية', 0),
(5, 'Training', 'التدريب', 1),
(6, 'Knight', 'الفارس', 1),
(7, 'Horse Selling', 'بيع الخيول', 1),
(8, 'Others', 'أخرى', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ads_subs`
--

CREATE TABLE `ads_subs` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(250) NOT NULL,
  `sub_name_ar` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `is_shown` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads_subs`
--

INSERT INTO `ads_subs` (`sub_id`, `sub_name`, `sub_name_ar`, `category_id`, `is_shown`) VALUES
(1, 'Stable Building', 'بناء الإسطبلات', 1, 1),
(2, 'Pools building', 'بناء المسابح', 1, 1),
(3, 'Repair and fixing', 'التعديل والترميم', 1, 1),
(4, 'carriages', 'عربات النقل', 2, 1),
(5, 'Rental carriages', 'عربات للإيجار', 2, 1),
(6, 'Sell Carriages', 'عربات للبيع', 2, 1),
(7, 'Daily Transport Carriages', 'عربات نقل يومي', 2, 1),
(8, 'Feed', 'أعلاف', 2, 1),
(9, 'Cannabis', 'الحشيش', 2, 1),
(10, 'Other', 'خلطات أخرى', 2, 1),
(11, 'Training Skills', 'مهارات التدريب', 5, 1),
(12, 'Nutritional supplements', 'المكملات الغذائية', 5, 1),
(13, 'Training - Knights and Horses', 'تدريب الخيول والفرسان', 5, 1),
(14, 'Treating minor injuries to horses', 'علاج الإصابات البسيطة للخيل', 5, 1),
(15, 'Horsing Skills', 'عرض مهارات ركوب الخيل', 6, 1),
(16, 'Stable Subscription', 'التسجيل في الاسطبلات', 6, 1),
(17, 'veterinary', 'بيطري', 3, 0),
(18, 'Clinic And Pharmacy', 'العيادة والصيدلية', 4, 0),
(19, 'Horse Selling', 'بيع الخيول', 7, 0),
(20, 'Power Equipment', 'المعدات الكهربائية', 8, 1),
(21, 'Electronics', 'الالكترونيات', 8, 1),
(22, 'Secondhand devices', 'اجهزه مستعملة', 8, 1),
(23, 'Others Supplies', 'جميع المستلزمات', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ads_subs_forms`
--

CREATE TABLE `ads_subs_forms` (
  `form_id` int(11) NOT NULL,
  `form_name` varchar(250) NOT NULL,
  `form_name_ar` varchar(250) NOT NULL,
  `form_type` varchar(50) NOT NULL,
  `form_request` varchar(200) NOT NULL,
  `is_required` int(1) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads_subs_forms`
--

INSERT INTO `ads_subs_forms` (`form_id`, `form_name`, `form_name_ar`, `form_type`, `form_request`, `is_required`, `sub_id`) VALUES
(1, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 1),
(2, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 1),
(3, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 2),
(4, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 2),
(5, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 3),
(6, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 3),
(7, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 4),
(8, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 4),
(9, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 5),
(10, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 5),
(11, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 6),
(12, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 6),
(13, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 7),
(14, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 7),
(15, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 8),
(16, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 8),
(17, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 9),
(18, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 9),
(19, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 10),
(20, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 10),
(21, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 17),
(22, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 17),
(23, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 18),
(24, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 18),
(25, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 14),
(26, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 14),
(27, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 16),
(28, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 16),
(29, 'Training Type', 'نوع التدريب', 'input', 'ad_title', 1, 11),
(30, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 11),
(31, 'Time Period', 'المدة الزمنية', 'input', 'time_period', 1, 11),
(32, 'Requirements', 'المتطلبات', 'input', 'requirements', 1, 11),
(33, 'Training Type', 'نوع التدريب', 'input', 'ad_title', 1, 13),
(34, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 13),
(35, 'Time Period', 'المدة الزمنية', 'input', 'time_period', 1, 13),
(36, 'Requirements', 'المتطلبات', 'input', 'requirements', 1, 13),
(37, 'Skill Type', 'نوع المهارة', 'input', 'ad_title', 1, 15),
(38, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 15),
(39, 'Product Name', 'إسم المنتج', 'input', 'ad_title', 1, 12),
(40, 'Size', 'المقاس', 'input', 'product_size', 1, 12),
(41, 'Material', 'مادة الصنع', 'input', 'product_material', 1, 12),
(42, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 12),
(43, 'Product Features', 'مميزات المنتج', 'textarea', 'product_features', 1, 12),
(44, 'Color', 'اللون', 'input', 'product_color', 1, 12),
(45, 'Weight', 'الوزن', 'input', 'product_weight', 1, 12),
(46, 'Dimension', 'الحجم', 'input', 'product_dimension', 1, 12),
(47, 'Source', 'المصدر', 'input', 'product_source', 1, 12),
(48, 'offspring', 'النسل', 'input', 'offspring', 1, 19),
(49, 'Type', 'النوع', 'input', 'h_type', 1, 19),
(50, 'Color', 'اللون', 'input', 'h_color', 1, 19),
(51, 'Gender', 'الجنس', 'input', 'h_gender', 1, 19),
(52, 'Age', 'العمر', 'input', 'h_age', 1, 19),
(53, 'Specialty', 'التخصص', 'input', 'h_specialty', 1, 19),
(54, 'Country', 'الدولة', 'input', 'h_country', 1, 19),
(55, 'Description', 'الوصف', 'textarea', 'h_description', 1, 19),
(56, 'Descent', 'النسب', 'textarea', 'h_descent', 1, 19),
(57, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 20),
(58, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 21),
(59, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 20),
(60, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 21),
(61, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 22),
(62, 'Product/service Name', ' إسم المنتج أو الخدمة', 'input', 'ad_title', 1, 23),
(63, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 23),
(64, 'Description', 'الوصف', 'textarea', 'ad_description', 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `ld_employees`
--

CREATE TABLE `ld_employees` (
  `employee_id` int(11) NOT NULL,
  `employee_code` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `third_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `profile_pic` char(65) NOT NULL DEFAULT 'profile.png',
  `dob` date NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL DEFAULT 'male',
  `website_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ld_employees`
--

INSERT INTO `ld_employees` (`employee_id`, `employee_code`, `first_name`, `second_name`, `third_name`, `last_name`, `profile_pic`, `dob`, `mobile_no`, `email`, `gender`, `website_id`) VALUES
(3, '9520', 'User', 'm', 's', 'Admin', 'profile.png', '2002-01-20', '055555', 'email@ex.com', 'male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ld_employees_services`
--

CREATE TABLE `ld_employees_services` (
  `link_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ld_employees_services`
--

INSERT INTO `ld_employees_services` (`link_id`, `employee_id`, `service_id`) VALUES
(1, 3, 103),
(2, 3, 104),
(3, 3, 105),
(4, 3, 106),
(5, 3, 107),
(6, 3, 108),
(7, 3, 109);

-- --------------------------------------------------------

--
-- Table structure for table `ld_system_users`
--

CREATE TABLE `ld_system_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `user_password` char(32) NOT NULL,
  `credential_level` varchar(30) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `website_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ld_system_users`
--

INSERT INTO `ld_system_users` (`user_id`, `username`, `user_password`, `credential_level`, `employee_id`, `website_id`, `status`, `is_deleted`) VALUES
(5, 'user', 'e10adc3949ba59abbe56e057f20f883e', 'admissions', 3, 1, 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ld_sys_log_main`
--

CREATE TABLE `ld_sys_log_main` (
  `log_id` int(11) NOT NULL,
  `log_tbl` varchar(150) NOT NULL,
  `related_id` int(11) NOT NULL,
  `log_action` varchar(20) NOT NULL,
  `log_status` varchar(200) DEFAULT NULL,
  `added_date` datetime DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `website_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ld_sys_log_sub`
--

CREATE TABLE `ld_sys_log_sub` (
  `sublog_id` int(11) NOT NULL,
  `sublog_tbl` varchar(150) NOT NULL,
  `related_id` int(11) NOT NULL,
  `sublog_action` varchar(20) NOT NULL,
  `sublog_status` varchar(200) DEFAULT NULL,
  `added_date` datetime DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `website_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ld_users_services`
--

CREATE TABLE `ld_users_services` (
  `service_id` int(11) NOT NULL,
  `service_bool` varchar(50) DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `service_name` varchar(1500) NOT NULL,
  `service_name_ar` varchar(200) DEFAULT NULL,
  `single_call` varchar(500) NOT NULL DEFAULT '''na''',
  `prular_call` varchar(500) NOT NULL DEFAULT '''na''',
  `api_folder` varchar(500) NOT NULL,
  `service_index` varchar(500) NOT NULL,
  `service_icon` varchar(500) NOT NULL DEFAULT '''<i class="material-icons">bookmark</i>''',
  `is_dependant` int(2) NOT NULL DEFAULT 0,
  `dependant_id` int(11) NOT NULL DEFAULT 0,
  `is_separated` int(1) NOT NULL DEFAULT 1,
  `table_related` varchar(250) NOT NULL,
  `order_no` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ld_users_services`
--

INSERT INTO `ld_users_services` (`service_id`, `service_bool`, `cat_id`, `service_name`, `service_name_ar`, `single_call`, `prular_call`, `api_folder`, `service_index`, `service_icon`, `is_dependant`, `dependant_id`, `is_separated`, `table_related`, `order_no`) VALUES
(103, 'isWebInfo', 19, 'Website information', 'معومات الموقع', 'info', 'information', 'site_settings', 'site_settings.php', '<i class=\"fas fa-cogs\"></i>', 0, 0, 0, 'site_settings', 120),
(104, 'isSocList', 19, 'socials manage', 'إدارة التواصل الاجتماعي', 'social', 'socials', 'socials', 'socials.php', '<i class=\"fas fa-cubes\"></i>', 0, 0, 1, 'socials', 120),
(105, 'isSlidrList', 19, 'slider manage', 'إدارة السلايدر', 'slider', 'sliders', 'slider', 'slider.php', '<i class=\"fas fa-cubes\"></i>', 0, 0, 1, 'slider', 120),
(106, 'isDevList', 20, 'Ads', 'الإعلانات', 'ad', 'ads', 'users_ads', 'users_ads.php', '<i class=\"fas fa-cubes\"></i>', 0, 0, 1, 'users_ads', 120),
(107, 'isDevPropsList', 19, 'Ads Properties', 'خصائص الإعلانات', 'property', 'properties', 'users_ads_data', 'users_ads_data.php', '<i class=\"fas fa-cubes\"></i>', 0, 0, 0, 'users_ads_data', 120),
(108, 'isDevImgList', 20, 'Ads Pictures', 'صور الإعلانات', 'picture', 'pictures', 'users_ads_pictures', 'users_ads_pictures.php', '<i class=\"fas fa-cubes\"></i>', 0, 0, 0, 'users_ads_pictures', 120),
(109, 'isSiteMap', 19, 'Sitemap XML', 'Sitemap XML', 'amp', 'maps', 'sitemap', 'sitemap.php', '<i class=\"fas fa-map\"></i>', 0, 0, 1, 'sitemap', 120);

-- --------------------------------------------------------

--
-- Table structure for table `ld_users_services_cats`
--

CREATE TABLE `ld_users_services_cats` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(1500) NOT NULL,
  `cat_name_ar` varchar(200) DEFAULT NULL,
  `cat_icon` varchar(500) NOT NULL DEFAULT '<i class="material-icons">bookmark</i>',
  `order_no` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ld_users_services_cats`
--

INSERT INTO `ld_users_services_cats` (`cat_id`, `cat_name`, `cat_name_ar`, `cat_icon`, `order_no`) VALUES
(19, 'Website Information', 'معلومات الموقع', '<i class=\"fas fa-store\"></i>', 150),
(20, 'Ads', 'الإعلانات', '<i class=\"fas fa-store\"></i>', 150);

-- --------------------------------------------------------

--
-- Table structure for table `ld_user_credentials`
--

CREATE TABLE `ld_user_credentials` (
  `credential_id` int(11) NOT NULL,
  `credential_user` varchar(200) NOT NULL,
  `credential_pass` varchar(200) NOT NULL,
  `credential_level` varchar(20) NOT NULL,
  `is_active` int(1) NOT NULL,
  `relative_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ld_user_credentials`
--

INSERT INTO `ld_user_credentials` (`credential_id`, `credential_user`, `credential_pass`, `credential_level`, `is_active`, `relative_id`) VALUES
(1, 'admin@horsehub.ae', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ld_websites`
--

CREATE TABLE `ld_websites` (
  `website_id` int(11) NOT NULL,
  `website_code` varchar(20) NOT NULL,
  `website_name` varchar(200) NOT NULL,
  `website_name_ar` varchar(200) DEFAULT NULL,
  `website_email` varchar(100) NOT NULL,
  `website_phone` varchar(50) NOT NULL,
  `slider_state` int(1) NOT NULL DEFAULT 1,
  `website_logo` char(65) NOT NULL,
  `website_about` text DEFAULT NULL,
  `website_about_ar` text DEFAULT NULL,
  `website_privacy` text DEFAULT NULL,
  `website_privacy_ar` text DEFAULT NULL,
  `website_terms` text DEFAULT NULL,
  `website_terms_ar` text DEFAULT NULL,
  `pay_policy` text DEFAULT NULL,
  `pay_policy_ar` text DEFAULT NULL,
  `registered_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ld_websites`
--

INSERT INTO `ld_websites` (`website_id`, `website_code`, `website_name`, `website_name_ar`, `website_email`, `website_phone`, `slider_state`, `website_logo`, `website_about`, `website_about_ar`, `website_privacy`, `website_privacy_ar`, `website_terms`, `website_terms_ar`, `pay_policy`, `pay_policy_ar`, `registered_date`) VALUES
(1, 'HH', 'Horse Hub', 'هورس هب', 'info@horsehub.ae', '+971 00 000 00 00', 1, 'logo.png', '<p>Horse Hub, the axis of horses, we connect you to the horse world and a lot more. We work here to provide fans and fans of horses with everything they need, which we focus on throughout our working hours stemming from our passion for the horse world, which extends from our ancestral legacy and the value of horses from the past and across civilizations to today. Horse Hub provides all the products and services that horse owners need and facilitates access to as Horse Hub is the best and most unique platform in the horse world.</p>\n<p>If you are looking for trainers specializing in the world of horses or want to buy or sell horses or you are looking for sanitary products from pharmacies or want certain services from horse clinics with a licensed veterinary or want a contractor to modify and restore stables, You are in the right place at Horse Hub, providing services with safe hands and in safe, licensed and not complicated ways.</p>', '<p>هورس هب ، محور الخيول ، نربطك بعالم الخيل والكثير غيره. نعمل هنا على تزويد محبي وعشاق الخيول بكل ما يحتاجونه وهو ما نركز عليه طوال ساعات عملنا نابع من شغفنا بعالم الخيل الممتدد من إرث أجدادنا وقيمة الخيل منذ الماضي وعبر الحضارات إلى اليوم. يقوم هورس هب بتوفير جميع المنتجات والخدمات التي يحتاجها أصحاب الخيل وتسهيل الحصول عليها حيث تعتبر هورس هب المنصة الأفضل في عالم الخيل والأكثر تميزا.</p>\n<p>فإن كنت تبحث عن مدربين متخصصين في عالم الخيل أو تريد شراء أو بيع الخيول ، أو كنت تبحث عن منتجات صحية من الصيدليات أو تريد الحصول على خدمات معينة من عيادات مختصة في الخيول مع بيطري مرخص أو تريد مقاول لتعديل وترميم الإسطبلات ، فانت في المكان صحيح في هورس هب ، نوفر لك الخدمات بأيد أمينة وبطرق آمنة ومرخصة وخالية من التعقيد.</p>', '<p>At horsehub.ae, accessible from www.horsehub.ae, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by horsehub.ae and how we use it.</p>\n<p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>\n<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in horsehub.ae. This policy is not applicable to any information collected offline or via channels other than this website. Our Privacy Policy was created with the help of the&nbsp;<a href=\"https://www.termsfeed.com/privacy-policy-generator/\">TermsFeed Free Privacy Policy Generator</a>.</p>\n<p><strong>Consent</strong></p>\n<p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>\n<p>Information we collect</p>\n<p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>\n<p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>\n<p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>\n<p>How we use your information</p>\n<p>We use the information we collect in various ways, including to:</p>\n<ul>\n<li>Provide, operate, and maintain our website</li>\n<li>Improve, personalize, and expand our website</li>\n<li>Understand and analyze how you use our website</li>\n<li>Develop new products, services, features, and functionality</li>\n<li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>\n<li>Send you emails</li>\n<li>Find and prevent fraud</li>\n</ul>\n<p><strong>Log Files</strong></p>\n<p>horsehub.ae follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.</p>\n<p><strong>Google DoubleClick DART Cookie</strong></p>\n<p>Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL &ndash;&nbsp;<a href=\"https://policies.google.com/technologies/ads\">https://policies.google.com/technologies/ads</a></p>\n<p><strong>Our Advertising Partners</strong></p>\n<p>Some of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below.</p>\n<ul>\n<li>Google</li>\n</ul>\n<p><a href=\"https://policies.google.com/technologies/ads\">https://policies.google.com/technologies/ads</a></p>\n<p><strong>Advertising Partners Privacy Policies</strong></p>\n<p>You may consult this list to find the Privacy Policy for each of the advertising partners of horsehub.ae.</p>\n<p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on horsehub.ae, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>\n<p>Note that horsehub.ae has no access to or control over these cookies that are used by third-party advertisers.</p>\n<p><strong>Third Party Privacy Policies</strong></p>\n<p>horsehub.ae\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.</p>\n<p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites.</p>\n<p><strong>CCPA Privacy Rights (Do Not Sell My Personal Information)</strong></p>\n<p>Under the CCPA, among other rights, California consumers have the right to:</p>\n<p>Request that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>\n<p>Request that a business delete any personal data about the consumer that a business has collected.</p>\n<p>Request that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.</p>\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\n<p><strong>GDPR Data Protection Rights</strong></p>\n<p>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>\n<p>The right to access &ndash; You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>\n<p>The right to rectification &ndash; You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>\n<p>The right to erasure &ndash; You have the right to request that we erase your personal data, under certain conditions.</p>\n<p>The right to restrict processing &ndash; You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>\n<p>The right to object to processing &ndash; You have the right to object to our processing of your personal data, under certain conditions.</p>\n<p>The right to data portability &ndash; You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\n<p><strong>Children\'s Information</strong></p>\n<p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>\n<p>horsehub.ae does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>', '<p>تستخدم خوادم إعلانات الطرف الثالث أو شبكات الإعلانات تقنيات مثل ملفات تعريف الارتباط أو JavaScript أو منارات الويب المستخدمة في إعلاناتها وروابطها التي تظهر على horsehub.ae، والتي يتم إرسالها مباشرة إلى متصفح المستخدمين. يتلقون تلقائيًا عنوان IP الخاص بك عند حدوث ذلك. تُستخدم هذه التكنولوجيات لقياس فعالية حملاتها الإعلانية و/أو لإضفاء الطابع الشخصي على محتوى إعلاني تراه على مواقع الويب التي تزورها.<br /> <br /> لاحظ أن horsehub.ae ليس لديه إمكانية الوصول إلى ملفات تعريف الارتباط هذه التي يستخدمها المعلنون الخارجيون أو التحكم فيها.<br /> <br /> سياسات خصوصية الطرف الثالث<br /> ولا تنطبق سياسة خصوصية horsehub.ae على المعلنين أو المواقع الشبكية الأخرى. وبالتالي، فإننا ننصحك باستشارة سياسات الخصوصية الخاصة بخوادم إعلانات الطرف الثالث للحصول على مزيد من المعلومات التفصيلية. وقد يتضمن ممارساتهم وتعليماتهم بشأن كيفية إلغاء الاشتراك في خيارات معينة.<br /> <br /> يمكنك اختيار تعطيل ملفات تعريف الارتباط من خلال خيارات المتصفح الفردية. لمعرفة المزيد من المعلومات التفصيلية حول إدارة ملفات تعريف الارتباط باستخدام متصفحات ويب محددة، يمكن العثور عليها في مواقع الويب الخاصة بالمتصفحات.<br /> <br /> حقوق الخصوصية CCPA (لا تبيع معلوماتي الشخصية)<br /> بموجب قانون مكافحة الفساد، من بين حقوق أخرى، للمستهلكين في كاليفورنيا الحق في:<br /> <br /> اطلب من الشركة التي تجمع البيانات الشخصية للمستهلك الكشف عن الفئات والأجزاء المحددة من البيانات الشخصية التي جمعتها الشركة عن المستهلكين.<br /> <br /> اطلب من الشركة حذف أي بيانات شخصية عن المستهلك جمعتها الشركة.<br /> <br /> اطلب من الشركة التي تبيع البيانات الشخصية للمستهلك، عدم بيع البيانات الشخصية للمستهلك.<br /> <br /> إذا قدمت طلبًا، فلدينا شهر واحد للرد عليك. إذا كنت ترغب في ممارسة أي من هذه الحقوق، فيرجى الاتصال بنا.<br /> <br /> حقوق حماية بيانات اللائحة العامة لحماية البيانات<br /> نود أن نتأكد من أنك على دراية كاملة بجميع حقوق حماية البيانات الخاصة بك. يحق لكل مستخدم الحصول على ما يلي:<br /> <br /> الحق في الوصول - لديك الحق في طلب نسخ من بياناتك الشخصية. قد نتقاضى رسومًا صغيرة مقابل هذه الخدمة.<br /> <br /> الحق في التصحيح - لديك الحق في طلب تصحيح أي معلومات تعتقد أنها غير دقيقة. لديك أيضًا الحق في طلب إكمال المعلومات التي تعتقد أنها غير كاملة.<br /> <br /> الحق في المحو - لديك الحق في أن تطلب منا محو بياناتك الشخصية، في ظل ظروف معينة.</p>\n<p>ط معينة.</p>\n<p>&nbsp;</p>\n<p>الحق في الاعتراض على المعالجة - لديك الحق في الاعتراض على معالجتنا لبياناتك الشخصية، في ظل شروط معينة.</p>\n<p>&nbsp;</p>\n<p>الحق في نقل البيانات - لديك الحق في أن تطلب منا نقل البيانات التي جمعناها إلى منظمة أخرى، أو إليك مباشرة، في ظل شروط معينة.</p>\n<p>&nbsp;</p>\n<p>إذا قدمت طلبًا، فلدينا شهر واحد للرد عليك. إذا كنت ترغب في ممارسة أي من هذه الحقوق، فيرجى الاتصال بنا.</p>\n<p>&nbsp;</p>\n<p><strong>معلومات عن الأطفال</strong></p>\n<p>جزء آخر من أولويتنا هو إضافة حماية للأطفال أثناء استخدام الإنترنت. نشجع الآباء والأوصياء على مراقبة نشاطهم عبر الإنترنت والمشاركة فيه و/أو مراقبته وتوجيهه.</p>\n<p>&nbsp;</p>\n<p>horsehub.ae لا يجمع عن علم أي معلومات شخصية يمكن التعرف عليها من الأطفال دون سن 13 عامًا. إذا كنت تعتقد أن طفلك قدم هذا النوع من المعلومات على موقعنا على الإنترنت، فإننا نشجعك بشدة على الاتصال بنا على الفور وسنبذل قصارى جهدنا لإزالة هذه المعلومات من سجلاتنا على الفور.</p>', NULL, NULL, NULL, NULL, '2022-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `sitemap`
--

CREATE TABLE `sitemap` (
  `record_id` int(11) NOT NULL,
  `record_link` text NOT NULL,
  `record_lastmod` text NOT NULL,
  `record_priority` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `social_id` int(11) NOT NULL,
  `social_title` varchar(250) NOT NULL DEFAULT 'na',
  `social_link` text NOT NULL,
  `social_icon` varchar(50) DEFAULT NULL,
  `social_image` char(65) NOT NULL DEFAULT 'bars'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`social_id`, `social_title`, `social_link`, `social_icon`, `social_image`) VALUES
(1, 'facebook', 'https://m.facebook.com/', 'fab fa-facebook-square', ''),
(2, 'instagram', 'https://instagram.com/horsehubae_?igshid=YmMyMTA2M2Y=', 'fab fa-instagram', ''),
(6, 'Whatsapp', 'https://api.whatsapp.com/send?phone=971526100080&text=%D8%A3%D8%B1%D9%8A%D8%AF%20%D8%A7%D9%84%D8%A7%D8%B3%D8%AA%D9%81%D8%B3%D8%A7%D8%B1%20%D8%A8%D8%AE%D8%B5%D9%88%D8%B5%20%D8%AE%D8%AF%D9%85%D8%A7%D8%AA%20%D9%87%D9%88%D8%B1%D8%B3%20%D9%87%D8%A8%20I%20want%20to%20ask%20regards%20Horsehub%20service%20', 'fab fa-whatsapp', '');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions_plans`
--

CREATE TABLE `subscriptions_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_name` int(200) NOT NULL,
  `plan_name_ar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions_plans_types`
--

CREATE TABLE `subscriptions_plans_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(200) NOT NULL,
  `type_name_ar` varchar(250) NOT NULL,
  `type_price` double NOT NULL DEFAULT 0,
  `plan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_license` varchar(50) DEFAULT NULL,
  `is_construction` int(1) NOT NULL DEFAULT 0,
  `is_equipments` int(1) NOT NULL DEFAULT 0,
  `is_vet` int(1) NOT NULL DEFAULT 0,
  `is_phar` int(1) NOT NULL DEFAULT 0,
  `is_knight` int(1) NOT NULL DEFAULT 0,
  `is_stable` int(1) NOT NULL DEFAULT 0,
  `is_trainer` int(1) NOT NULL DEFAULT 0,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `user_email`, `user_phone`, `user_pass`, `user_license`, `is_construction`, `is_equipments`, `is_vet`, `is_phar`, `is_knight`, `is_stable`, `is_trainer`, `is_active`) VALUES
(1, 'ahmd test2', 'a@a.a', '0521009964', 'e10adc3949ba59abbe56e057f20f883e', '121212', 0, 0, 1, 0, 0, 0, 0, 1),
(2, 'Mariam', 'mariam.y@asrtrainingae.online', '0508178862', 'cb9d4e55ed17643613639f7f84694fbb', '1234567', 1, 0, 0, 0, 0, 0, 0, 1),
(3, 'Mariam', 'mariam.y@asrtrainingae.online', '0502105655', 'cb9d4e55ed17643613639f7f84694fbb', '1234567', 0, 0, 0, 0, 1, 0, 0, 1),
(4, 'mariam', 'mariam@gmail.com', '0501234567', '99b6b8d15e9d50270d9a49286c4eb436', '', 0, 0, 0, 0, 1, 0, 0, 1),
(5, 'Faisal', 'faisal@gmail.com', '0501234561', '99b6b8d15e9d50270d9a49286c4eb436', '', 1, 0, 0, 0, 0, 0, 0, 1),
(6, 'Nora', '', '050666667', '0052069db1a0017f6a27f27e6dcbb919', '', 0, 0, 0, 0, 1, 0, 0, 1),
(7, 'Nora', '', '0501234562', 'fcea920f7412b5da7be0cf42b8c93759', '', 0, 0, 0, 0, 1, 0, 0, 1),
(8, 'Saeed', '', '0501234563', 'fcea920f7412b5da7be0cf42b8c93759', '', 0, 0, 0, 0, 0, 1, 0, 1),
(9, 'Maher', '', '0501234564', 'fcea920f7412b5da7be0cf42b8c93759', '', 1, 1, 1, 1, 1, 1, 1, 1),
(10, 'Ibrahim', 'rnad_jn@hotmail.com', '0502610055', '9513a399220cbb7851077db8cffda9aa', '', 0, 0, 0, 0, 1, 0, 0, 1),
(11, 'Ibrahim', 'ibrahimalmdailwi@gmail.com', '0563666566', '9513a399220cbb7851077db8cffda9aa', '', 1, 0, 0, 0, 0, 0, 0, 1),
(12, 'ibrahim', 'i.vmnbmbm@hotmail.com', '0501122335', '5fd4b17bfc35c10e14c18460e38104df', '', 0, 0, 0, 0, 1, 0, 0, 1),
(13, 'ahmd test2', 'b@b.b', '05000000000', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1, 1, 1, 1, 1, 1, 1),
(14, 'فهد', 'fahad@gmail.com', '05011112223', '99b6b8d15e9d50270d9a49286c4eb436', '', 1, 1, 1, 1, 1, 1, 1, 1),
(15, 'فهد', 'fahad@gmail.com', '0501112233', '99b6b8d15e9d50270d9a49286c4eb436', '', 0, 0, 0, 0, 0, 0, 0, 1),
(16, 'فهد', 'fahad@gmail.com', '0501234566', '99b6b8d15e9d50270d9a49286c4eb436', '', 0, 0, 0, 0, 0, 0, 0, 1),
(17, 'فهد', 'fahad@gmail.com', '0501234123', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 1, 0, 0, 0, 0, 0, 1),
(18, 'Nayef', 'nayef@gmail.com', '0506666667', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, 0, 0, 1, 0, 0, 1),
(19, 'ناصر', 'Naser@gmail.com', '0501122343', 'fcea920f7412b5da7be0cf42b8c93759', '', 0, 0, 0, 0, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_ads`
--

CREATE TABLE `users_ads` (
  `ad_id` int(11) NOT NULL,
  `ad_location` text DEFAULT NULL,
  `ad_location_ar` text DEFAULT NULL,
  `ad_price` double NOT NULL DEFAULT 0,
  `ad_discount` double NOT NULL DEFAULT 0,
  `ad_date` datetime NOT NULL,
  `ad_views` int(5) NOT NULL DEFAULT 0,
  `ad_votes` int(5) NOT NULL DEFAULT 0,
  `sub_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ad_status` varchar(20) NOT NULL DEFAULT 'pending',
  `is_translated` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_ads`
--

INSERT INTO `users_ads` (`ad_id`, `ad_location`, `ad_location_ar`, `ad_price`, `ad_discount`, `ad_date`, `ad_views`, `ad_votes`, `sub_id`, `category_id`, `user_id`, `ad_status`, `is_translated`) VALUES
(8, NULL, NULL, 0, 0, '2022-08-04 17:21:00', 0, 0, 18, 4, 2, 'draft', 1),
(9, 'Abu Dhabi', 'Abu Dhabi', 100, 0, '2022-08-04 17:21:00', 0, 0, 18, 4, 2, 'deleted', 1),
(10, 'ابوظبي', 'ابوظبي', 0, 0, '2022-08-05 11:04:00', 0, 0, 15, 6, 10, 'under_review', 0),
(11, '000000', '000000', 0, 0, '2022-08-08 07:28:00', 3, 0, 19, 7, 12, 'denied', 0),
(12, 'AD', 'AD', 300, 0, '2022-08-18 14:27:00', 1, 0, 11, 5, 1, 'under_review', 1),
(13, 'AD', 'AD', 3999, 5, '2022-08-20 01:32:00', 0, 0, 22, 8, 2, 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_ads_data`
--

CREATE TABLE `users_ads_data` (
  `data_id` int(11) NOT NULL,
  `data_value` text DEFAULT NULL,
  `form_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `is_ar` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_ads_data`
--

INSERT INTO `users_ads_data` (`data_id`, `data_value`, `form_id`, `ad_id`, `is_ar`) VALUES
(23, 'فينادين', 23, 8, 1),
(24, 'Finadine', 23, 8, 0),
(25, 'فينادين مسكن و مضاد التهاب للخيل', 24, 8, 1),
(26, 'Vinadine is an analgesic and anti-inflammatory for horses', 24, 8, 0),
(27, 'فينادين', 23, 9, 1),
(28, 'Finadine', 23, 9, 0),
(29, 'فينادين مسكن و مضاد التهاب للخيل', 24, 9, 1),
(30, 'Vinadine is an analgesic and anti-inflammatory for horses', 24, 9, 0),
(31, 'فارس متمكن', 37, 10, 0),
(32, 'افضل ركوب الخيول العربيه', 38, 10, 0),
(33, '0', 48, 11, 0),
(34, '00', 49, 11, 0),
(35, '000', 50, 11, 0),
(36, '0000', 51, 11, 0),
(37, '0000', 52, 11, 0),
(38, '000000', 53, 11, 0),
(39, '00000', 54, 11, 0),
(40, '000000000', 55, 11, 0),
(41, '000000000000', 56, 11, 0),
(42, 'نوع التدريب (بالعربية)10', 29, 12, 1),
(43, 'نوع التدريب (English)20', 29, 12, 0),
(44, 'الوصف (بالعربية)30', 30, 12, 1),
(45, 'الوصف (English)40', 30, 12, 0),
(46, 'المدة الزمنية (بالعربية)50', 31, 12, 1),
(47, 'المدة الزمنية (English)60', 31, 12, 0),
(48, 'المتطلبات (بالعربية)70', 32, 12, 1),
(49, 'المتطلبات (English)80', 32, 12, 0),
(50, 'كمبيوتر', 61, 13, 0),
(51, 'Mac 2021', 64, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_ads_pictures`
--

CREATE TABLE `users_ads_pictures` (
  `picture_id` int(11) NOT NULL,
  `picture_path` varchar(65) NOT NULL DEFAULT 'no-file.png',
  `ad_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_primary` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_ads_pictures`
--

INSERT INTO `users_ads_pictures` (`picture_id`, `picture_path`, `ad_id`, `user_id`, `is_primary`) VALUES
(9, 'p_BD6846BD-CC32-B306-3430-75DF23F3BB06-1659619359.jpeg', 9, 2, 1),
(10, 'p_4D267A84-6F10-A03E-F966-4D193873AAD5-1659929362.jpg', 11, 12, 1),
(12, 'p_38523121-E5B0-9A30-0761-20DF678C562F-1660837147.jpg', 12, 1, 1),
(13, 'p_4018ACD2-B9DF-BBF0-2B88-F51F21F472E9-1660944878.jpeg', 13, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_subscriptions`
--

CREATE TABLE `users_subscriptions` (
  `subscription_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `subscription_price` double NOT NULL DEFAULT 0,
  `transaction_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads_categories`
--
ALTER TABLE `ads_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ads_subs`
--
ALTER TABLE `ads_subs`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `ads_subs_forms`
--
ALTER TABLE `ads_subs_forms`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `ld_employees`
--
ALTER TABLE `ld_employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `ld_employees_services`
--
ALTER TABLE `ld_employees_services`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `ld_system_users`
--
ALTER TABLE `ld_system_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ld_sys_log_main`
--
ALTER TABLE `ld_sys_log_main`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `ld_sys_log_sub`
--
ALTER TABLE `ld_sys_log_sub`
  ADD PRIMARY KEY (`sublog_id`);

--
-- Indexes for table `ld_users_services`
--
ALTER TABLE `ld_users_services`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `service_bool` (`service_bool`);

--
-- Indexes for table `ld_users_services_cats`
--
ALTER TABLE `ld_users_services_cats`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `ld_user_credentials`
--
ALTER TABLE `ld_user_credentials`
  ADD PRIMARY KEY (`credential_id`);

--
-- Indexes for table `ld_websites`
--
ALTER TABLE `ld_websites`
  ADD PRIMARY KEY (`website_id`);

--
-- Indexes for table `sitemap`
--
ALTER TABLE `sitemap`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `subscriptions_plans`
--
ALTER TABLE `subscriptions_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `subscriptions_plans_types`
--
ALTER TABLE `subscriptions_plans_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_ads`
--
ALTER TABLE `users_ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `users_ads_data`
--
ALTER TABLE `users_ads_data`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `users_ads_pictures`
--
ALTER TABLE `users_ads_pictures`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `users_subscriptions`
--
ALTER TABLE `users_subscriptions`
  ADD PRIMARY KEY (`subscription_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads_categories`
--
ALTER TABLE `ads_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ads_subs`
--
ALTER TABLE `ads_subs`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ads_subs_forms`
--
ALTER TABLE `ads_subs_forms`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `ld_employees`
--
ALTER TABLE `ld_employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ld_employees_services`
--
ALTER TABLE `ld_employees_services`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ld_system_users`
--
ALTER TABLE `ld_system_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ld_sys_log_main`
--
ALTER TABLE `ld_sys_log_main`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ld_sys_log_sub`
--
ALTER TABLE `ld_sys_log_sub`
  MODIFY `sublog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ld_users_services`
--
ALTER TABLE `ld_users_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `ld_users_services_cats`
--
ALTER TABLE `ld_users_services_cats`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ld_user_credentials`
--
ALTER TABLE `ld_user_credentials`
  MODIFY `credential_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ld_websites`
--
ALTER TABLE `ld_websites`
  MODIFY `website_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sitemap`
--
ALTER TABLE `sitemap`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscriptions_plans`
--
ALTER TABLE `subscriptions_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions_plans_types`
--
ALTER TABLE `subscriptions_plans_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users_ads`
--
ALTER TABLE `users_ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users_ads_data`
--
ALTER TABLE `users_ads_data`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users_ads_pictures`
--
ALTER TABLE `users_ads_pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users_subscriptions`
--
ALTER TABLE `users_subscriptions`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads_subs`
--
ALTER TABLE `ads_subs`
  ADD CONSTRAINT `ads_subs_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `ads_categories` (`category_id`);

--
-- Constraints for table `ads_subs_forms`
--
ALTER TABLE `ads_subs_forms`
  ADD CONSTRAINT `ads_subs_forms_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `ads_subs` (`sub_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

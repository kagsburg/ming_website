-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2023 at 10:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d008`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`, `status`, `admin_id`, `date_added`) VALUES
(1, 'Health', 1, 0, '0000-00-00 00:00:00'),
(2, 'Development t', 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `website` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL,
  `contacted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `website`, `email`, `message`, `status`, `contacted_at`) VALUES
(1, 'Kahuma Andrew', 'Want some work done', 'timothykaganzi@gmail.com', 'I would like to know more', 0, '2023-09-06 22:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(165) NOT NULL,
  `answer` text NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `date_created`, `date_updated`) VALUES
(1, 'What do you really do?', '<p>We definitely sell and transport goods.</p>', 1, '2022-12-18 03:35:35', '0000-00-00'),
(2, 'Does this really work', 'Yes, it does. You can check out our testimonials from previous clients who have worked with us.', 0, '2022-12-19 22:35:37', '0000-00-00'),
(3, 'Well Done', '<p>sljdljsjlvsljdflsdf d fsldkfnsl sfsnfl</p>\r\n\r\n<p>dflkndlkfnld flkdnflkndfl df</p>', 1, '2023-06-07 22:54:04', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `caption` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `project_id`, `caption`, `description`, `image`, `status`, `date_created`, `date_updated`) VALUES
(2, 2, 'Done and dusted', '<p>la DLV;lj dvjl adlj ajl lajlj lj ljl ejl lej e;wef;bfllf flj flebflke flekfl flkfe flk flf</p>', 'jpg', 1, '2023-06-07 19:31:59', '0000-00-00'),
(3, 2, 'Done and dusted', '<p>la DLV;lj dvjl adlj ajl lajlj lj ljl ejl lej e;wef;bfllf flj flebflke flekfl flkfe flk flf</p>', 'jpg', 1, '2023-06-07 19:31:59', '0000-00-00'),
(4, 2, 'Done and dusted', '<p>la DLV;lj dvjl adlj ajl lajlj lj ljl ejl lej e;wef;bfllf flj flebflke flekfl flkfe flk flf</p>', 'jpg', 1, '2023-06-07 19:31:59', '0000-00-00'),
(5, 2, 'Done and dusted', '<p>la DLV;lj dvjl adlj ajl lajlj lj ljl ejl lej e;wef;bfllf flj flebflke flekfl flkfe flk flf</p>', 'jpg', 1, '2023-06-07 19:31:59', '0000-00-00'),
(6, 1, '', '<p>done and dusted</p>', 'png', 1, '2023-09-06 21:57:16', '0000-00-00'),
(7, 1, '', '<p>done and dusted</p>', 'jpg', 1, '2023-09-06 21:57:16', '0000-00-00'),
(8, 1, '', '<p>done and dusted</p>', 'jpg', 1, '2023-09-06 21:57:16', '0000-00-00'),
(9, 1, '', '<p>done and dusted</p>', 'jpg', 1, '2023-09-06 21:57:16', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `details` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date_added` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `details`, `category_id`, `tags`, `image`, `status`, `admin_id`, `date_added`) VALUES
(1, 'New Updates', '<p>At StellarBuild, we take pride in our ability to handle projects of various scales and complexities. Whether you&#39;re looking to build a new residential property, renovate your existing space, or undertake a commercial construction endeavor, we have the capabilities to exceed your expectations. Our diverse portfolio showcases our versatility in constructing residential homes, commercial complexes, industrial facilities, educational institutions, and more.</p>', 2, 'very much', 'png', 1, 1, '2023-09-05'),
(2, 'New Article 2', '<p>anlsdkbasld ksadkljsbdjsbdjbasdj</p>', 0, '', 'jpg', 0, 1, NULL),
(3, 'New Article 3', '<p>ma kz czc zclj adcad mnaadnc lajclac a,nc ac,an can canc anm,c an,c sn&nbsp;</p>', 1, 'Healthy and more', 'jpg', 1, 1, '2023-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `company` varchar(30) NOT NULL,
  `website` varchar(70) NOT NULL,
  `logo` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `company`, `website`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dome', '', 'jpg', 1, '2023-06-07 22:07:26', NULL),
(2, 'True Desire LTD', '', 'jpg', 1, '2023-06-07 22:34:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(11) NOT NULL,
  `dateadded_at` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `pin`, `description`, `image`, `dateadded_at`, `status`, `admin_id`) VALUES
(1, 'Online Marketing', 2340000, 0, '<p>New to the market business</p>', 'jpg', '2023-09-07 19:30:08', 0, 1),
(2, 'Online Marketing', 2500000, 0, '<p>New to the business world and more</p>', 'jpg', '2023-09-07 19:31:13', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `project_manager` varchar(25) NOT NULL,
  `location` varchar(40) NOT NULL,
  `client` varchar(25) NOT NULL,
  `service` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `date_started` date NOT NULL,
  `date_ended` date NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `project_manager`, `location`, `client`, `service`, `description`, `date_started`, `date_ended`, `date_added`, `image`, `status`) VALUES
(1, 'Musana Plaza', 'Kahuma Andrew', 'Ntinda Kampala', 'Musana', '2', '<p>Our team of highly skilled professionals, including architects, engineers, project managers, and craftsmen, work collaboratively to deliver outstanding results. From the initial design phase to the final touches, we prioritize quality, innovation, and meticulous attention to detail. With our vast knowledge and industry experience, we ensure that every project is executed to the highest standards, on time, and within budget.</p>', '0000-00-00', '0000-00-00', '2023-06-06 16:56:28', 'jpg', 1),
(2, 'Design Hub', 'Kahuma Andrew', 'Nakawa Kampala', 'DesignHub', '1', '<p>At StellarBuild, we are a leading construction company committed to transforming your visions into reality. With a proven track record of delivering exceptional projects, we offer a comprehensive range of construction services tailored to meet your specific needs. Whether you&#39;re a homeowner, business owner, or property developer, we have the expertise, resources, and dedication to bring your construction dreams to life.</p>', '0000-00-00', '0000-00-00', '2023-06-06 16:57:10', 'jpg', 1),
(3, 'Dembe Villa', 'Kahunde Andrew', 'Kampala', 'Dembe', '1', '<p>At StellarBuild, we are a leading construction company committed to transforming your visions into reality. With a proven track record of delivering exceptional projects, we offer a comprehensive range of construction services tailored to meet your specific needs. Whether you&#39;re a homeowner, business owner, or property developer, we have the expertise, resources, and dedication to bring your construction dreams to life.</p>', '0000-00-00', '0000-00-00', '2023-06-06 17:00:53', 'jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `pin`, `description`, `image`, `updated_at`, `status`) VALUES
(1, 'Customer Care', 2340000, 1, '<p>At StellarBuild, we are a leading construction company committed to transforming your visions into reality. With a proven track record of delivering exceptional projects, we offer a comprehensive range of construction services tailored to meet your specific needs. Whether you&#39;re a homeowner, business owner, or property developer, we have the expertise, resources, and dedication to bring your construction dreams to life.</p>', 'jpg', '2023-09-07 17:48:00', 1),
(2, 'Welding', 350000, 1, '<p>Our team of highly skilled professionals, including architects, engineers, project managers, and craftsmen, work collaboratively to deliver outstanding results. From the initial design phase to the final touches, we prioritize quality, innovation, and meticulous attention to detail. With our vast knowledge and industry experience, we ensure that every project is executed to the highest standards, on time, and within budget.</p>', 'jpg', '2023-09-07 17:47:57', 1),
(3, '', 0, 0, '', '', '2023-06-05 19:35:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `first_button` varchar(20) NOT NULL,
  `first_button_link` varchar(40) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `second_button_link` varchar(40) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `title`, `first_button`, `first_button_link`, `subtitle`, `second_button_link`, `image`, `created_at`, `updated_at`, `status`) VALUES
(1, 'We Have the Solutions You Need', 'View More', './about', 'View Projects and more', './projects', 'jpg', '2023-06-06 20:31:38', NULL, 1),
(2, 'You have Needs', 'View More', './about', 'View Projects', './projects', 'jpg', '2023-06-06 20:33:04', NULL, 1),
(3, 'We Have the Solutions', 'View More', './services', 'More Solutions', '', 'png', '2023-09-06 12:08:08', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `about` text NOT NULL,
  `image` varchar(120) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `title`, `role`, `about`, `image`, `date_created`, `date_updated`, `date_deleted`, `status`) VALUES
(1, 'Kahuma Andrew', 'Board of Advisors', 'Project Manager', 'Very hard working', 'jpg', '2023-06-06 21:20:55', NULL, NULL, 1),
(2, 'Muggaga', 'Staff', 'Project Manager', 'Very hard working', 'png', '2023-06-06 21:35:22', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_suscribed` date NOT NULL,
  `unsubscribed` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `title` varchar(40) NOT NULL,
  `testimony` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `fullnames` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `level` varchar(2) NOT NULL,
  `activate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullnames`, `username`, `password`, `email`, `level`, `activate`) VALUES
(1, 'Kahuma Andrew', 'Andree', 'e10adc3949ba59abbe56e057f20f883e', 'kahy@gmail.com', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `caption` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `caption`, `description`, `location`, `status`) VALUES
(1, 'Instagram - Google Chrome 2022-07-20 16-47-18_Trim.mp4', 'New Project Videos', '', 'mp4', 1),
(2, 'sample2.mp4', 'Done and dusted2', '', 'mp4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `youtube_links`
--

CREATE TABLE `youtube_links` (
  `id` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  `caption` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `youtube_links`
--

INSERT INTO `youtube_links` (`id`, `link`, `caption`, `created_at`, `updated_at`, `status`) VALUES
(1, 'https://www.youtube.com/embed/hxWLJ5ZjNNM', 'Try Not To Laugh', '2023-06-07 21:29:25', NULL, '1'),
(2, 'https://www.youtube.com/watch?v=aDkGMBBka70', 'Star Wars', '2023-06-07 21:33:01', NULL, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube_links`
--
ALTER TABLE `youtube_links`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `youtube_links`
--
ALTER TABLE `youtube_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

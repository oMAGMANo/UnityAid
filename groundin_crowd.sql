-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 10:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `groundin_crowd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `password`, `email`) VALUES
(1, 'admin', 'Admin', '123', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL DEFAULT 0,
  `name` text DEFAULT NULL,
  `category_id` int(255) NOT NULL DEFAULT 0,
  `goal_amount` text DEFAULT NULL,
  `preferred_amounts` text DEFAULT NULL,
  `start_date` text DEFAULT NULL,
  `end_date` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `document` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `share_link` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_all` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `user_id`, `name`, `category_id`, `goal_amount`, `preferred_amounts`, `start_date`, `end_date`, `image`, `document`, `description`, `share_link`, `status`, `is_all`, `created_date`) VALUES
(3, 1, 'Clean Water Initiative: Providing Safe Drinking Water', 1, '150000', NULL, '2024-04-23', '2024-04-30', '6619f5d2aee7c_66030f26a822f1711476518.jpg', '6619f5d2af603_66030f26ae7861711476518.pdf', '<p>Description</p><p>Donations to this campaign will support animal shelters, rescue organizations, and advocacy groups working tirelessly to protect and care for animals in need. By standing up for animals, we can create a more compassionate and humane world for both animals and humans alike.</p><p>&nbsp;</p><p>Step into a world where greenery thrives and prosperity blossoms at the Green Thumb Gala: A Celebration of Planting Prosperity!</p><p>&nbsp;</p><p>Join us for an enchanting evening dedicated to the beauty of nature and the power of sustainable growth. Set amidst lush gardens and blooming flowers, this gala is not just a feast for the eyes but a tribute to the vital role of plants in shaping a prosperous future for all.</p><p>&nbsp;</p><p>At the Green Thumb Gala, guests will embark on a journey of discovery, exploring the wonders of gardening, sustainability, and environmental stewardship. From expert-led workshops on urban gardening to interactive exhibits showcasing innovative green technologies, there\'s something for everyone to learn and be inspired by.</p><p>&nbsp;</p><p>But the magic doesn\'t stop there. Indulge your taste buds with a farm-to-table dining experience like no other, featuring organic, locally sourced ingredients that highlight the richness of the earth. Savor exquisite dishes crafted by top chefs who share our commitment to sustainability, and raise a toast to a future where every meal nourishes both body and planet.</p><p>&nbsp;</p><p>As you mingle with fellow plant enthusiasts and sustainability advocates, take pride in knowing that your presence at the Green Thumb Gala supports initiatives aimed at promoting eco-friendly practices and empowering communities through gardening and agriculture. Together, we can cultivate a greener, more prosperous world for generations to come.</p><p>&nbsp;</p><p>So mark your calendars and don your finest green attire for an evening of elegance, education, and environmental impact. Join us at the Green Thumb Gala and let\'s sow the seeds of a brighter tomorrow, one plant at a time.</p>', '', 1, 0, '2024-04-13 03:02:42'),
(4, 1, 'Thiruvanmiyur Beach Cleanup Campaign', 6, '10000', NULL, '2024-04-25', '2024-04-27', '661bc74534bd9_beach-clean-up-tips-ideas-article-600x400.jpg', '661bc7453f31f_Beach-Clean-Event-Guide.pdf', '<p>We bring you the opportunity to participate in Chennaiâ€™s Largest Beach Cleanup drive.</p><p>We understand cleaning isnâ€™t easy work, but when we do it together we can surely make a difference. Become a cleanup warrior to make our beaches trash free. Volunteer with support, we will provide you with the necessary materials. and know-how.</p><p><strong>Where:</strong>Thiruvanmiyur Stretch, Chennai</p><p><strong>When</strong>: April 2022, Every Saturday, 6.30 AM -9.30 AM</p><p><strong>#MyCityMyResponsibility #LeadersForCleanerIndia #ChennaisLargestBeachCleanup</strong></p>', '', 1, 0, '2024-04-14 12:08:37'),
(6, 1, 'aaaaaaa', 3, '1232341', NULL, '2024-04-25', '2024-04-27', '6626c1dcb57ae_661a2b064bca5_65c1c02a328661707196458.jpg', NULL, '<p>adfadsfasdfasdf</p>', 'https://localhost/project/campaign.php?id=6', 1, 0, '2024-04-22 20:00:28'),
(7, 1, 'MK', 4, '100', NULL, '2024-04-26', '2024-04-27', '6626c5b5394e3_661a2e58d194d_65c1c084a74ef1707196548.jpg', NULL, '<p>non profit test</p>', 'https://localhost/project/campaign-details.php?campaign_id=7', 1, 0, '2024-04-22 20:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(0, 'All', ''),
(1, 'Treatment', '661a2e395b519_65c1c02a328661707196458.jpg'),
(2, 'Medical', '661a2e4631d3d_65c1c04e96b741707196494.jpg'),
(3, 'Emergency', '661a2e4f766f7_65c1c061052f01707196513.jpg'),
(4, 'Non Profit', '661a2e58d194d_65c1c084a74ef1707196548.jpg'),
(5, 'Financial Emergency', '661a2e6fc36a5_65c1c09f2cf7c1707196575.jpg'),
(6, 'Environment', '661a2e646cb82_65c1c0b8815be1707196600.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT 0,
  `organizer_id` int(255) DEFAULT 0,
  `campaign_id` int(255) NOT NULL DEFAULT 0,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `txn_id` text DEFAULT NULL,
  `attachment` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_all` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `user_id`, `organizer_id`, `campaign_id`, `name`, `email`, `phone`, `amount`, `country`, `txn_id`, `attachment`, `status`, `is_all`, `created_date`) VALUES
(1, 0, 1, 3, 'Mike', 'mike@gmail.com', '9064493378', '200', 'India', '56754674567456754', '661a614a0be97_upi-qr.jpg', 1, 0, '2024-04-13 10:29:59'),
(2, 2, 1, 3, 'Subha', 'subha@gmail.com', '9064493356', '100', 'India', NULL, NULL, 0, 0, '2024-04-13 11:06:33'),
(3, 0, 0, 3, 'Subhabrata Paral', 'subhabrata.paral34@gmail.com', '+919674524414', '100', 'India', NULL, NULL, 0, 0, '2024-04-13 11:16:20'),
(4, 0, 0, 3, 'Subhabrata Paral', 'subhabrata.paral34@gmail.com', '+919674524414', '200', 'India', NULL, NULL, 0, 0, '2024-04-13 11:17:18'),
(5, 0, 0, 3, 'Mike', 'mike@gmail.com', '6767896789', '300', 'India', NULL, NULL, 0, 0, '2024-04-13 11:19:04'),
(6, 0, 0, 3, 'Subhabrata Paral', 'subhabrata.paral34@gmail.com', '+919674524414', '300', 'India', NULL, NULL, 0, 0, '2024-04-13 11:21:13'),
(7, 2, 1, 3, 'Subha', 'subha12@gmail.com', '9064493356', '100', 'India', NULL, NULL, 0, 0, '2024-04-14 12:03:30'),
(8, 0, 1, 3, 'Ali Shaikh', 'm416kgaming@gmail.com', '08275692577', '200', 'India', NULL, NULL, 0, 0, '2024-04-22 20:36:48'),
(9, 0, 1, 3, 'Ali Shaikh', 'm416kgaming@gmail.com', '08275692577', '200', 'India', NULL, NULL, 0, 0, '2024-04-22 20:38:26'),
(10, 0, 1, 3, 'Ali Shaikh', 'm416kgaming@gmail.com', '08275692577', '300', 'India', NULL, NULL, 0, 0, '2024-04-22 20:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(255) NOT NULL,
  `campaign_id` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `campaign_id`, `image`) VALUES
(9, '3', '66030efa74d4b1711476474.jpg'),
(10, '3', '66030efa753f21711476474.jpg'),
(11, '3', '66030efad430f1711476474.jpg'),
(12, '4', 'IMG_742_9_9_2023_22_16_1_2_1_45BSOSKE.jpg'),
(13, '5', '661a2e4f766f7_65c1c061052f01707196513.jpg'),
(14, '6', '661a2e4f766f7_65c1c061052f01707196513.jpg'),
(15, '7', '661a2e395b519_65c1c02a328661707196458.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `role` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `zip` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `username`, `email`, `phone`, `password`, `state`, `image`, `city`, `zip`, `country`, `address`, `status`, `created_date`) VALUES
(1, 'event_organizer', 'Mike', 'mike007', 'mike@gmail.com', '9064493378', '123', 'West bengal', '6619fdd396b6f_user.jpg', 'KOLKATA', '700104', 'IN', '', 1, '2024-04-12 11:30:39'),
(2, 'user', 'Subha', 'subha007', 'subha@gmail.com', '9064493356', '123', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-13 15:28:48'),
(3, 'user', 'mk', 'hello', 'mik@gmail.com', '12434658', '123', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-22 10:52:48'),
(4, 'user', 'Samrat', 'samrat', 'samrat@gmail.com', '0987654321', '123', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-22 11:09:30'),
(5, 'user', 'hello', 'hello123', 'hihello@gmail.com', '098712345', '123', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-22 11:34:01'),
(6, 'user', 'abc', 'abc123', 'abc@gmail.com', '1230985678', '123', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-22 11:36:19'),
(7, 'user', 'shivam', 'shivam123', 'sss@gmail.com', '0912873445', '123', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-22 11:40:22'),
(8, 'role', 'noob', 'noob123', 'noob@gmail.com', '12309845687', '123', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-22 11:45:26'),
(9, 'event_organizer', 'sms', 'sms123', 'sms@gmail.com', '098123476', '123', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-22 11:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL DEFAULT 0,
  `organizer_id` int(255) NOT NULL DEFAULT 0,
  `campaign_id` int(255) NOT NULL DEFAULT 0,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `user_id`, `organizer_id`, `campaign_id`, `name`, `email`, `phone`, `country`, `created_date`) VALUES
(2, 0, 1, 3, 'Mike', 'mike@gmail.com', '9064493378', 'India', '2024-04-13 12:37:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

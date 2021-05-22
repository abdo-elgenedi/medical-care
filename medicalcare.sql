-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2021 at 05:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicalcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'admin.jpg',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `super_admin` tinyint(4) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `email`, `mobile`, `image`, `status`, `super_admin`, `type`, `created_at`, `updated_at`) VALUES
(1, 'abdo', 'abdo', '$2y$10$GjbKq4gCJABTaKOUPgVmnOYWzwkcZ8Ae3pK8H5LskJVOZ4Lulblq2', 'abdo@gmail.com', '0112345678', 'Abdelrhman Genedi16154633070JMr1R9pMNErDJKA9nSDrnky0MuTYWC4fg0ZTFBc.jpg', 1, 1, 1, '2020-12-22 17:24:37', '2021-03-11 10:57:00'),
(2, 'mahmoud', 'mahmoud', '$2y$10$VbgTrco1coNu04L1wApMhuOkRCZMRYIBVayCB.bTSPs7DuX58XaLe', 'mahmoud@gmail.com', '0125648532', 'admin.jpg', 1, 0, 1, '2020-12-27 14:09:48', '2021-01-07 15:52:15'),
(4, 'ahmed', 'ahmed.ahmed', '$2y$10$VbgTrco1coNu04L1wApMhuOkRCZMRYIBVayCB.bTSPs7DuX58XaLe', 'ahmed@gmail.com', '01160277983', 'admin.jpg', 1, 0, 1, '2020-12-28 12:07:30', '2021-01-07 14:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `p_id`, `d_id`, `date`, `status`) VALUES
(1, 2, 14, '2021-02-22 13:27:27', 1),
(2, 2, 14, '2021-02-27 13:27:40', 1),
(12, 2, 14, '2021-03-06 10:56:59', 1),
(14, 2, 14, '2021-03-07 15:58:08', 0),
(17, 3, 16, '2021-03-12 13:28:43', 1),
(18, 2, 14, '2021-03-23 11:38:29', 1),
(19, 2, 14, '2021-03-29 15:55:35', 1),
(20, 2, 14, '2021-04-04 15:56:38', 1),
(21, 2, 16, '2021-03-24 15:56:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'giza'),
(2, 'october');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `city` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `dob` timestamp NULL DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `username`, `password`, `email`, `mobile`, `city`, `status`, `dob`, `gender`, `specialty_id`, `bio`, `price`, `image`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(14, 'doctor', 'doctor', '$2y$10$7b8zPYvQAkRtBmw8nt5wkeLxl52OQk1jq1FnAUn2WjuAEwlSm1Kxi', 'doctor@gmail.com', '01150222333', 2, 1, '1996-06-09 22:00:00', 1, 20, 'Cleaning , change , remove ,whiteness', 100, 'doctor1615219975n051q3JKpZSgRHRQiQKIYFe21XjKmc53bPvgSOtj.jpg', NULL, NULL, '2021-02-17 20:16:28', '2021-03-08 14:53:35'),
(16, 'ahmed', 'doctorf', '$2y$10$u8Fy9K0wp8JUNO4RLcmr/.MY0KA4nrtxZS7wQHtGI1/Qoe/PfAp0W', 'doctofr@doctor.com', '123456786', 2, 1, '2021-03-10 15:28:48', 1, 17, 'good doctor for operations', 100, 'doctor.jpg', NULL, NULL, '2021-02-17 20:16:28', '2021-03-11 11:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `p_id`, `d_id`) VALUES
(18, 2, 14);

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
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `city` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `dob` timestamp NULL DEFAULT NULL,
  `blood` varchar(3) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `username`, `password`, `email`, `mobile`, `city`, `status`, `dob`, `blood`, `gender`, `image`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'abdo', 'abdo', '$2y$10$td0odXsBMvjRsbQJBZ.ykeu8/MCsdPZV0CvKBEyt1Y2CJanQhV.5u', 'abdo@gmail.com', '01150911573', 2, 1, '1996-06-09 22:00:00', 'A-', 1, 'abdo161513177817wxIoGzWC0SZmTQuR7vuFz1mo2tosirLEc9EOrY.jpg', NULL, NULL, '2021-02-17 19:24:04', '2021-03-11 11:37:58'),
(3, 'mahmoud', 'mahmoud', '$2y$10$0CcVfT.JFduBulinoZaROODy6gmO8Jkkj4FJa6r9ukFNdsbJK9bli', 'mahmoud@eail.com', '12345678', 2, 1, '1990-06-10 18:33:02', 'B+', 1, 'patient.jpg', NULL, NULL, '2021-02-23 15:13:33', '2021-03-10 16:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `p_id`, `d_id`, `rate`, `message`, `created_at`, `updated_at`) VALUES
(10, 2, 16, 5, 'good', '2021-03-11 11:40:01', '2021-03-11 11:40:01'),
(11, 2, 14, 5, 'good doctor', '2021-03-22 15:56:32', '2021-03-22 15:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `day` tinyint(4) NOT NULL,
  `time` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `doc_id`, `day`, `time`, `capacity`, `status`) VALUES
(2, 14, 1, '10:00-20:00', 50, 1),
(6, 14, 7, '02:50-02:50', 40, 1),
(7, 16, 5, '02:50-06:50', 40, 1),
(8, 14, 2, '10:00-18:00', 20, 1),
(9, 14, 3, '10:00-18:00', 5, 1),
(10, 14, 4, '12:00-20:00', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `name`, `image`) VALUES
(17, 'Neurology', 'KS7QdGYqBjZuanysZYviIqsG7IsnJL5ObgzOTkeG.png'),
(18, 'Orthopedic', 'oWyQHP5N1reA2hec0ranEAMzyL5dHtuOL8Tj0rF7.png'),
(19, 'Cardiologist', 'kzncfLAnOrcZxz78SQG8euXhMlDI7dfEmI10VhDr.png'),
(20, 'Dentist', 'wQx2RYcEH8JeAzP2BwO6vEgvwKJW0gQUFmqVOFud.png'),
(21, 'Urology', 'a6l4pEZ93Dp4AGSOV02xHKbKpdIB4u0FCs4PecYG.png');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `city_id`, `name`) VALUES
(1, 1, 'shobra'),
(2, 1, 'ataba'),
(3, 2, '1st district '),
(4, 2, '2st district ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD KEY `user_fk2` (`type`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appt_doctor_id` (`d_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD KEY `specialty_id` (`specialty_id`) USING BTREE,
  ADD KEY `state` (`city`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fav_doctor_id` (`d_id`),
  ADD KEY `fav_patient_id` (`p_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rev_doctor_id` (`d_id`),
  ADD KEY `rev_patient_id` (`p_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sch_doctor_id` (`doc_id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_state` (`city_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appt_doctor_id` FOREIGN KEY (`d_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `city` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `doc_sp` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `state` FOREIGN KEY (`city`) REFERENCES `states` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `fav_doctor_id` FOREIGN KEY (`d_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fav_patient_id` FOREIGN KEY (`p_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `rev_doctor_id` FOREIGN KEY (`d_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rev_patient_id` FOREIGN KEY (`p_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `sch_doctor_id` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `city_state` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

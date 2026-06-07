-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2026 at 05:41 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_catatan_projek`
--

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `nama_proyek` varchar(100) NOT NULL,
  `jenis_proyek` varchar(100) NOT NULL,
  `teknologi` varchar(100) NOT NULL,
  `deskripsi` text,
  `status_proyek` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id`, `user_id`, `nama_proyek`, `jenis_proyek`, `teknologi`, `deskripsi`, `status_proyek`, `tanggal_mulai`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
(1, 2, 'Coding', 'Web', 'laravel', 'gitu dah', 'Selesai', '2026-06-01', '2026-06-10', '2026-06-06 19:35:56', '2026-06-06 19:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Rakha Milan', 'rakhamilan901@gmail.com', '$2y$12$YNenODeBxtlxLRulruEjvOpF0ThPDVVdyHFuDdkQVTqKU3q2H.hv6', '2026-06-06 19:25:55', '2026-06-06 19:25:55'),
(2, 'Rakha', 'rakamilan901@gmail.com', '$2y$12$1.8yqVxlHlkv4ZsWXjhWWOgYIwB3FkW5JeYGILSGjltX8TFJWsHSm', '2026-06-06 19:27:16', '2026-06-06 19:27:16'),
(3, 'dzlfa', 'syahrulbachri6@gmail.com', '$2y$12$l9pHkmK9DW2BQV2dmv0Um.Wgy56GipCOt0YBQs/pFMN92qBjkcg7C', '2026-06-06 20:39:52', '2026-06-06 20:39:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

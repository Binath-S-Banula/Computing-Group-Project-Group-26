-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2025 at 04:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`) VALUES
(1, '2024.1'),
(2, '2024.2'),
(3, '2025.1');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `name`, `faculty_id`) VALUES
(1, 'Software Engineering', 1),
(2, 'Networks', 1),
(3, 'Marketing', 2),
(4, 'Business Management', 2),
(5, 'Data Science', 1),
(7, 'Automobile Engineering', 4);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`) VALUES
(1, 'Computing'),
(2, 'Business'),
(4, 'engineering');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uni_id` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `name`, `uni_id`, `email`, `password`) VALUES
(1, 'binat', '1111', 'moris@email', '$2y$10$sTN0un0caqVl1jJoMwLTDOF521Sqo192pOTFeasLo.OUXclUfQBW2'),
(3, 'bella', '2222', 'meetbella2000@gmail.com', '$2y$10$Ann6LG4hsllzVSkSXGXmeOAW7wejURmDDKQ5QSUtJ1o4hWYPj6G2m'),
(4, '3333', '3333', 'nomal@email.com', '$2y$10$VD3yqW512GLG0m/iFqze6uAe7fSMg8j0oUTLozxWR98kxzeVg5QPm');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_timetable`
--

CREATE TABLE `lecturer_timetable` (
  `id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `timetable_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturer_timetable`
--

INSERT INTO `lecturer_timetable` (`id`, `lecturer_id`, `timetable_file`) VALUES
(4, 1, 'lecturer1.xlsx'),
(5, 3, 'lecturer3.xlsx'),
(6, 4, 'lecturer4.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int(11) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `degree`, `batch`, `file_path`) VALUES
(1, 'Software Engineering', '2024.1', 'timetables/Software_Engineering_2024.1.xlsx'),
(2, 'Software Engineering', '2024.2', 'timetables/Software_Engineering_2024.2.xlsx'),
(3, 'Networks', '2024.1', 'timetables/Networks_2024.1.xlsx'),
(4, 'Marketing', '2024.1', 'timetables/Marketing_2024.1.xlsx'),
(5, 'Business Management', '2024.1', 'timetables/Business_Management_2024.1.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uni_id` varchar(50) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `degree_id` int(11) DEFAULT NULL,
  `batch` varchar(10) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uni_id`, `faculty_id`, `degree_id`, `batch`, `password`) VALUES
(1, '1', 2, 3, '2024.2', '$2y$10$bcaMEAAsza4V.ikz9VpBB.YRVOCmqErYQ4CQIFyI6EskdSGf2Xtt2'),
(2, '2', 1, 2, '2024.1', '$2y$10$/vcpWtLd7fm63u/iNhXJWOwEzwb64BlhNvbQ1npFkMPKItJvh/OPa'),
(3, '3', 2, 4, '2024.2', '$2y$10$1kb01hVMP.CqP42RSVNU.ugrT7dgIOD6oXL6KxH.iwKOsWN86N4D2'),
(4, '4', 1, 2, '2024.2', '$2y$10$c4jhHu.JikmAPNpKpRnZ9.6r25GpPh9MBshOcfGQFLIDg8Nmddq7C'),
(5, '5', 2, 4, '2024.1', '$2y$10$ENVsxbA0xQuWHYLtTTXUgOsLxhjjzLkqYrK2GyRdwDfJfMaR3CGDC'),
(6, '6', 1, 2, '2024.1', '$2y$10$x.Maf0dJTpbkBuX71QIbkuI9DUJqwTbCvaNGaewnOQdsMSnw0Mxim'),
(7, '7', 1, 1, '2024.1', '$2y$10$eOqSngT6zGRwzdVVaKn6uehYDi4wkyZXO.tqv9fCnpN/4zat/ch5C'),
(8, '10', 2, 3, '2024.1', '$2y$10$UaBYRoxqx7V71.ssiHElPO/Yur7BTOw8MqLSwqKjVvs2mMfsM6KQ2'),
(9, '15', 1, 1, '2024.1', '$2y$10$GmD7O4Hxh15HFE8B3wKl9uHBHTknJ.3GEVhZUrrPHlNzFE33msueq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni_id` (`uni_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `lecturer_timetable`
--
ALTER TABLE `lecturer_timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lecturer_id` (`lecturer_id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni_id` (`uni_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `degree_id` (`degree_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lecturer_timetable`
--
ALTER TABLE `lecturer_timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `degrees`
--
ALTER TABLE `degrees`
  ADD CONSTRAINT `degrees_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`);

--
-- Constraints for table `lecturer_timetable`
--
ALTER TABLE `lecturer_timetable`
  ADD CONSTRAINT `lecturer_timetable_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

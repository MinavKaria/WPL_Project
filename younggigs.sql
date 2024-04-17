-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 09:51 AM
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
-- Database: `younggigs`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_jobs`
--

CREATE TABLE `applied_jobs` (
  `user_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `applied_date` date DEFAULT NULL,
  `resumeURL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applied_jobs`
--

INSERT INTO `applied_jobs` (`user_id`, `job_id`, `applied_date`, `resumeURL`) VALUES
(11, 1, '2024-04-16', 'AOA_Exp7_16010122083.pdf'),
(11, 1, '2024-04-16', 'AOA_Exp7_16010122083.pdf'),
(11, 2, '2024-04-16', 'AOA_Exp7_16010122083.pdf'),
(11, 1, '2024-04-16', 'AOA_Exp7_16010122083.pdf'),
(11, 15, '2024-04-17', 'AOA_Exp7_16010122083.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `location`, `type`, `description`, `company_name`) VALUES
(1, 'Web Developer', 'Mumbai', 'full-time', 'Join our team as a Web Developer and contribute to building exciting web applications using the latest technologies.', 'Reliance'),
(2, 'Data Analyst', 'Delhi', 'full-time', 'We are looking for a skilled Data Analyst to join our team. You will analyze data to help improve our company\'s efficiency and performance.', 'Grapevine'),
(3, 'Junior Assistant', 'Bangalore', 'part-time', 'We are seeking a Junior Assistant to support our team with administrative tasks. This is a great opportunity to gain valuable experience.', 'JP Morgan'),
(4, 'Assistant', 'Hyderabad', 'contract', 'We are hiring an Assistant to provide high-level support to our executives. This role requires strong organizational and communication skills.', 'Barclays'),
(7, 'React Dev', 'Mulund', 'full-time', 'web dev', 'Minav Enterprises'),
(12, 'React Dev', 'Mulund', 'part-time', 'devs', 'Minav Enterprises'),
(13, 'React Dev', 'Mulund', 'part-time', 'Web dev job', 'Minav Enterprises'),
(15, 'React Dev', 'Mulund', 'part-time', 'Web dev', 'Minav Enterprises'),
(16, '212', 'Mumbai', 'part-time', 'qwerty', 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `jobskills`
--

CREATE TABLE `jobskills` (
  `job_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobskills`
--

INSERT INTO `jobskills` (`job_id`, `skill_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(4, 9),
(4, 10),
(12, 1),
(12, 2),
(12, 21),
(15, 1),
(15, 2),
(15, 21),
(16, 1),
(16, 2),
(16, 21);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`) VALUES
(1, 'html'),
(2, 'css'),
(3, 'javascript'),
(4, 'data-analysis'),
(5, 'statistics'),
(6, 'sql'),
(7, 'communication'),
(8, 'organization'),
(9, 'management'),
(10, 'leadership'),
(11, 'Java'),
(12, 'Python'),
(13, 'JavaScript'),
(14, 'HTML/CSS'),
(15, 'SQL'),
(16, 'Digital Marketing'),
(17, 'Financial Analysis'),
(18, 'Adobe Photoshop'),
(19, 'Illustrator'),
(20, 'UI/UX Design'),
(21, 'react'),
(26, 'react'),
(27, 'javascript'),
(28, 'react'),
(29, 'javascript'),
(30, 'react'),
(31, 'javascript'),
(32, 'react'),
(33, 'javascript');

-- --------------------------------------------------------

--
-- Table structure for table `userjobs`
--

CREATE TABLE `userjobs` (
  `job_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userjobs`
--

INSERT INTO `userjobs` (`job_id`, `user_id`) VALUES
(15, 9),
(16, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `is_hr` varchar(25) DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `qualification`, `phone`, `resume`, `age`, `is_hr`) VALUES
(1, 'Minav Karia', 'minavpkaria@gmail.com', '$2y$10$nDYDCQ0Yq.3rlnItUsvas.yQYfQwjvoVySdD36HCXfF60wMsS0S7.', 'High School', '9967291075', 'La Pinoz MOU.pdf', 19, 'no'),
(2, 'Minav Karia', 'dvdv@csc.esc', '$2y$10$PDZsk.67RiCTGI.eFLnD2O08a4/hxMa8dn5scaKVtPppCynM01Aoq', 'Master\'s Degree', '9967291075', 'Minav_Resume__.pdf', 75, 'no'),
(3, 'Minav Karia', 'mkkaria04@gmail.com', '$2y$10$OE883UiSd0bIBcGI3VoaVeOyflajpUNh0jg0Szm/SqPQyMC406xXy', 'High School', '9967291075', 'CoverLetter.docx', 122, 'no'),
(5, 'Minav Karia', 'minavkaria@gmail.com', '$2y$10$Q7S0xdYPCeZm60voVOyGdOYEmkHRWzX8dO8PWlYQA0RjsYygT6jRO', 'High School', '9967291075', 'CoverLetter.pdf', 19, 'no'),
(6, 'Minav Karia', 'abc@gmail.com', '$2y$10$nkJRANSGkQurb2394eR41.P8HVQnSwinIZazAek5BmpB8WO1EKSxW', 'High School', '9967291075', 'Exp 6 Queries based on SQL-Procedure,Function , Cursors.docx', 45, 'no'),
(7, 'Minav Karia', 'minavpkariaa@gmail.com', '$2y$10$1zIM/Nu0dUABVNG5Jk4ecOYByT547HPzhxPFRaME1JlYj2lfRkI.i', 'Bachelor\'s Degree', '9967291075', 'CoverLetter.pdf', 45, 'no'),
(8, 'Minav Karia', 'minavpkariaaa@gmail.com', '$2y$10$P0jmk4GSyLwWLJvNMJ9BzeX83NPsuThixPpfx/LT8CdD2z7KKEm82', 'Bachelor\'s Degree', '9967291075', 'CoverLetter.pdf', 45, 'yes'),
(9, 'Minav Karia', 'mkkaria09@gmail.com', '$2y$10$a1gnRz2hhDZ59tq4VIWi7uis.pXB9NQeKEYjGVzE3hR6BkyZV4tqK', 'Bachelor\'s Degree', '9967291075', 'ROP.pdf', 19, 'yes'),
(10, 'Minav Karia', 'farzan@gmail.com', '$2y$10$FMZEsnvFa4oS5lT/a0gcZOICPZhP2izqYauv9QX5QcYJDbDXaYr46', 'High School', '9967291075', 'Minav_Resume.pdf', 12, 'yes'),
(11, 'Minav Karia', 'mkkaria07@gmail.com', '$2y$10$axR.rITEdJOQZ52MTirqV.jfr65uyMDheiv5ba5kA.sEicwxqAHRe', 'Bachelor\'s Degree', '9967291075', 'AOA_Exp7_16010122083.pdf', 45, 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobskills`
--
ALTER TABLE `jobskills`
  ADD PRIMARY KEY (`job_id`,`skill_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userjobs`
--
ALTER TABLE `userjobs`
  ADD KEY `job_id` (`job_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  ADD CONSTRAINT `applied_jobs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `applied_jobs_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`);

--
-- Constraints for table `jobskills`
--
ALTER TABLE `jobskills`
  ADD CONSTRAINT `jobskills_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `jobskills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);

--
-- Constraints for table `userjobs`
--
ALTER TABLE `userjobs`
  ADD CONSTRAINT `userjobs_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `userjobs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

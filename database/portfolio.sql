-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 10:29 PM
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
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` text DEFAULT NULL,
  `LAST_NAME` text DEFAULT NULL,
  `JOB_TITLE` text DEFAULT NULL,
  `DATE_OF_BIRTH` date DEFAULT NULL,
  `ABOUT_ME` text DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL,
  `PHONE_NUMBER` text DEFAULT NULL,
  `EMAIL` text DEFAULT NULL,
  `LINKEDIN` text DEFAULT NULL,
  `YOUTUBE` text DEFAULT NULL,
  `FACEBOOK` text DEFAULT NULL,
  `INSTAGRAM` text DEFAULT NULL,
  `WHATSAPP` text DEFAULT NULL,
  `TELEGRAM` text DEFAULT NULL,
  `CV_FILE_NAME` text DEFAULT NULL,
  `COVER_IMG_NAME` text DEFAULT NULL,
  `PERSONAL_IMG_NAME` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `USERNAME` text NOT NULL,
  `PASSWORD` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `USERNAME`, `PASSWORD`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `PROJECT_ID` int(11) NOT NULL,
  `TITLE` text DEFAULT NULL,
  `PROJECT_NAME` text DEFAULT NULL,
  `SUMMARY` text DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `LAUNCH_DATE` date DEFAULT NULL,
  `ATTACHED_LINK` text DEFAULT NULL,
  `SHOWN_LINK_TEXT` text DEFAULT NULL,
  `COVER_IMG` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `IMG_ID` int(11) NOT NULL,
  `PROJECT_ID` int(11) NOT NULL,
  `IMAGE_NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `ID` int(11) NOT NULL,
  `TITLE` text DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `CATEGORY` text DEFAULT NULL,
  `DATE_FROM` text DEFAULT NULL,
  `DATE_TO` text DEFAULT NULL,
  `ATTACHED_LINK` text DEFAULT NULL,
  `SHOWN_LINK_TEXT` text DEFAULT NULL,
  `ICON` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `ID` int(11) NOT NULL,
  `SKILL_NAME` text DEFAULT NULL,
  `CATEGORY` text DEFAULT NULL,
  `PERCENTAGE_VALUE` int(11) DEFAULT NULL,
  `SHOWN_TEXT` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`PROJECT_ID`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`IMG_ID`),
  ADD KEY `PROJECT_ID` (`PROJECT_ID`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `PROJECT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `IMG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_images`
--
ALTER TABLE `project_images`
  ADD CONSTRAINT `project_images_ibfk_1` FOREIGN KEY (`PROJECT_ID`) REFERENCES `projects` (`PROJECT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

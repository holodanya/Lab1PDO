-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2025 at 01:37 PM
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
-- Database: `lb_pdo_lessons`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `ID_Groups` int(10) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`ID_Groups`, `title`) VALUES
(1, 'KI-12-1'),
(2, 'KI-12-2'),
(3, 'KI-12-3'),
(4, 'KI-12-4'),
(5, 'KI-12-5'),
(6, 'KI-12-6');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `ID_Lesson` int(10) NOT NULL,
  `week_day` text NOT NULL,
  `lesson_number` int(8) NOT NULL,
  `auditorium` text NOT NULL,
  `disciple` text NOT NULL,
  `type` enum('Lecture','Practical','Laboratory') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`ID_Lesson`, `week_day`, `lesson_number`, `auditorium`, `disciple`, `type`) VALUES
(1, 'Monday', 3, '104i', 'Computer Networks', 'Lecture'),
(2, 'Monday', 4, '106i', 'Creation of Images and Sound', 'Lecture'),
(3, 'Monday', 5, '229', 'Internet Technologies', 'Laboratory'),
(4, 'Monday', 6, '229', 'Internet Technologies', 'Laboratory'),
(5, 'Saturday', 1, '10012', 'MathIGS', 'Practical'),
(6, 'Wednesday', 3, '221i', 'Computer Science', 'Lecture');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_groups`
--

CREATE TABLE `lesson_groups` (
  `FID_Lesson2` int(10) NOT NULL,
  `FID_Groups` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lesson_groups`
--

INSERT INTO `lesson_groups` (`FID_Lesson2`, `FID_Groups`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 5),
(2, 3),
(2, 2),
(3, 3),
(4, 3),
(1, 4),
(4, 1),
(4, 1),
(4, 1),
(4, 1),
(4, 1),
(5, 1),
(1, 6),
(2, 6),
(4, 6),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `lesson_teacher`
--

CREATE TABLE `lesson_teacher` (
  `FID_Teacher` int(10) NOT NULL,
  `FID_Lesson1` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lesson_teacher`
--

INSERT INTO `lesson_teacher` (`FID_Teacher`, `FID_Lesson1`) VALUES
(1, 1),
(2, 2),
(3, 3),
(3, 4),
(1, 4),
(1, 4),
(1, 4),
(1, 4),
(3, 4),
(3, 5),
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `ID_Teacher` int(10) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID_Teacher`, `name`) VALUES
(1, 'Kovalenko A.A.'),
(2, 'Yankovskiy O.A.'),
(3, 'Ivaschenko G.S.'),
(4, 'Semenov V.O.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`ID_Groups`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`ID_Lesson`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`ID_Teacher`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

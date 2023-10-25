-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 05:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `date` date NOT NULL,
  `about` varchar(256) NOT NULL,
  `description` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `about`, `description`) VALUES
(1, 'DevTalks', '2023-10-25', 'An event where developers from around the world talk about software development.', 'DevTalks is a technology conference series that brings together professionals, experts, and enthusiasts from various fields within the tech industry. It provides a platform for networking, knowledge-sharing, and discussions on cutting-edge technologies, software development practices, and industry trends. DevTalks typically features a range of talks, workshops, panels, and hands-on sessions, covering topics such as software engineering, artificial intelligence, cybersecurity, web development, and more.'),
(2, 'ComputerCamp', '2023-11-20', 'An event dedicated to anything computer science dedicated.', 'ComputerCamp is an immersive event that mirrors the format of TED Talks but focuses exclusively on computer science and related fields. It features a series of engaging and informative talks from experts, innovators, and thought leaders in the realm of technology and computing. '),
(3, 'Beginner Code Talks', '2024-01-17', 'A place for beginners to listen to experts while not feeling lost.', 'Have you ever left lost while coding? Lost while reading tutorials? Lost with your school computer science homework? Then this is the place to be! Beginner Code Talks is addressed to people of all ages who have an interest in computer science and software development. Join us to listen to various experts who hold presentations that you really understand, free of meta gibberish and current popular framework terminology that confuses a developer who is just starting.'),
(4, 'Devs Like Coffee', '2023-10-25', 'An event where developers who love coffee.', 'DevTalks is a technology conference series that brings together professionals, experts, and enthusiasts from various fields within the tech industry. It provides a platform for networking, knowledge-sharing, and discussions on cutting-edge technologies, software development practices, and industry trends. DevTalks typically features a range of talks, workshops, panels, and hands-on sessions, covering topics such as software engineering, artificial intelligence, cybersecurity, web development, and more.'),
(5, 'BootCamp', '2033-10-12', 'A type of physical training that consists of many different types of exercise.', 'In this course, we will learn the basic tools that every web developer needs to know. We will start from scratch by learning how to implement modern web development with HTML, JavaScript, and Python code.\r\n\r\nLearning to code HTML, JavaScript and Python is The first step to Coding you need to learn to succeed in web development, it is easy to learn and understand our online HTML, JavaScript, and Python Training course is designed for you with the complete steps to require learn Web Developer course topics.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 07:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin1', 'admin'),
(2, 'admin2', 'admin'),
(3, 'admin3', 'admin'),
(4, 'admin4', 'admin'),
(5, 'admin5', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `category` varchar(100) NOT NULL,
  `time_minutes` varchar(20) NOT NULL,
  `adminname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `time_minutes`, `adminname`) VALUES
(2, 'CPP', '8', 'admin1'),
(5, 'Java', '5', 'admin2'),
(8, 'MachineLearning', '5', 'admin1'),
(9, 'WebDevelopment ', '25', 'admin1'),
(10, 'DSA', '30', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feeb` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feeb`) VALUES
(1, 'Akshat Jain', 'akshat.kodia@gmail.com', 'HI akshat'),
(2, '', '', ''),
(3, 'Akshat Jain', 'akshat.kodia@gmail.com', 'Good'),
(4, 'Anjali', 'a@g.com', 'HI'),
(5, 'Akshat Jain', 'akshat.kodia@gmail.com', 'NICE '),
(6, 'Roahn', 'r@g.com', 'Nice');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `qno` varchar(5) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt1` varchar(100) NOT NULL,
  `opt2` varchar(100) NOT NULL,
  `opt3` varchar(100) NOT NULL,
  `opt4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `adminname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `qno`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `category`, `adminname`) VALUES
(3, '1', 'Which concept do we use for the implementation of late binding?', 'Static Functions', 'Constant Functions', 'Operator Functions', 'Virtual Functions', 'Virtual Functions', 'Cpp', 'admin1'),
(4, '2', '__________ is an ability of grouping certain lines of code that we need to include in our program?', 'macros', 'modularization', 'program control', 'specific task', 'modularization', 'Cpp', 'admin1'),
(5, '1', 'What is ML?', 'Machine L', 'M Learn', 'Machine Learning', 'None', 'Machine Learning', 'MachineLearning', 'admin1'),
(8, '3', ' Which of these keywords do we use for the declaration of the friend function?', 'myfriend', 'class friend', 'friend', 'firend', 'friend', 'Cpp', 'admin1'),
(9, '4', ' What is used for dereferencing?', 'pointer with asterix', 'pointer without asterix', 'value with asterix', 'value without asterix', 'pointer with asterix', 'Cpp', 'admin1'),
(10, '5', 'what does polymorphism stand for?', 'a class  that has four forms', 'a class that has two forms', 'a class that has only single form', 'a class that has many forms', 'a class that has many forms', 'Cpp', 'admin1'),
(11, '1', 'Which of these components are used in a Java program for compilation, debugging, and execution?', 'JDK', 'JVM', 'JRE', 'JIT', 'JDK', 'Java', 'admin2'),
(12, '2', 'Out of these packages, which one contains an abstract keyword?', 'java.util', 'java.lang', 'java.system', 'java.io', 'java.lang', 'Java', 'admin2'),
(13, '3', 'What is Big Decimal.ONE?', 'it is a custom-defined statement.', 'it is a wrong statement.', 'it is a static variable that has a value of 1 on a scale of 0.', 'it is a static variable that has a value of 1 on a scale of 10', 'it is a static variable that has a value of 1 on a scale of 10', 'Java', 'admin2'),
(14, '4', 'When an expression consists of int, double, long, float, then the entire expression will get promoted into a data type that is:', 'float', 'double', 'int', 'longdo', 'double', 'Java', 'admin2'),
(15, '5', ' Which of the following operators can operate on a boolean variable?', '&&', 'ab', '123', '#', '&&', 'Java', 'admin2'),
(18, '1', 'Which among these is not Web Browser?', 'Chrome', 'Opera', 'NetSurf', 'Brave', 'Chrome', 'WebDevelopment ', 'admin1'),
(19, '2', 'World Wide Web was invented by?', 'Ted Nelson', 'Tim Berners-Lee', 'Linus Torvalds', 'Robert E.Kahn', 'Tim Berners-Lee', 'WebDevelopment ', 'admin1'),
(20, '3', 'At which port number, Simple Network Management Protocol (SNMP) operates', '160', '163', '164', '161', '161', 'WebDevelopment ', 'admin1'),
(21, '4', 'What does HTML stand for?', 'Hyper Text Markup Language', 'High Text Markup Language', 'Hyper Tabular Markup Language', 'None ', 'Hyper Text Markup Language', 'WebDevelopment ', 'admin1'),
(22, '2', 'What is AI?', 'opt_images/1ff907f102300f3d662b862d8a6663fctiger.png', 'opt_images/1ff907f102300f3d662b862d8a6663fclion.webp', 'opt_images/1ff907f102300f3d662b862d8a6663fctiger.png', 'opt_images/1ff907f102300f3d662b862d8a6663fczeb.jfif', 'opt_images/1ff907f102300f3d662b862d8a6663fctiger.png', 'MachineLearning', 'admin1'),
(23, '1', 'What is LL?', 'LinkedList', 'Lollipop', 'LinkerLoader', 'None', 'LinkedList', 'DSA', 'admin2'),
(24, '2', 'what is dsa', 'a', 'b', 'c', 'd', 'a', 'DSA', 'admin2'),
(25, '6', 'what is C++?', 'a', 'b', 'c', 'd', 'c', 'Cpp', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

CREATE TABLE `quiz_result` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `exam_type` varchar(100) NOT NULL,
  `total` varchar(10) NOT NULL,
  `correct` varchar(10) NOT NULL,
  `wrong` varchar(10) NOT NULL,
  `exam_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`id`, `username`, `exam_type`, `total`, `correct`, `wrong`, `exam_time`) VALUES
(27, 'admin1', 'Cpp', '5', '4', '1', '2022-07-16'),
(28, 'ajay', 'WebDevelopment', '4', '3', '1', '2022-07-16'),
(29, 'akshat', 'MachineLearning', '2', '1', '1', '2022-07-16'),
(30, 'Akshat', 'Cpp', '5', '5', '0', '2022-07-17'),
(31, 'anjali', 'Java', '5', '5', '0', '2022-07-17'),
(32, 'Suraj', 'Cpp', '5', '1', '4', '2022-07-17'),
(33, 'AkshatJain', 'Cpp', '5', '5', '0', '2022-07-17'),
(34, 'Rohan', 'WebDevelopment', '0', '1', '-1', '2022-07-17'),
(35, 'Anjali', 'MachineLearning', '2', '2', '0', '2022-07-17'),
(36, 'Mickey', 'DSA', '1', '1', '0', '2022-07-17'),
(37, 'Anjali', 'MachineLearning', '2', '2', '0', '2022-07-17'),
(38, 'Anjali', 'Cpp', '5', '2', '3', '2022-07-17'),
(39, 'Anjali', 'MachineLearning', '2', '2', '0', '2022-07-17'),
(40, 'Anjali', 'MachineLearning', '2', '2', '0', '2022-07-17'),
(41, 'Anjali', 'MachineLearning', '2', '1', '1', '2022-07-17'),
(42, 'Anjali', 'Cpp', '5', '3', '2', '2022-07-17'),
(43, 'Anjali', 'Cpp', '5', '3', '2', '2022-07-17'),
(44, 'Anjali', 'Java', '5', '4', '1', '2022-07-17'),
(45, 'Akshay', 'Java', '5', '1', '4', '2022-07-17'),
(46, 'Ajay', 'Cpp', '5', '2', '3', '2022-07-17'),
(47, 'Ajay', 'Cpp', '5', '2', '3', '2022-07-17'),
(48, 'Rohan', 'Cpp', '5', '0', '5', '2022-07-17'),
(49, '19011909', 'a', '0', '0', '0', '2022-07-18'),
(50, 'Priyank', 'Cpp', '5', '0', '5', '2022-07-18'),
(51, 'Rohan', 'Cpp', '6', '5', '1', '2022-07-18'),
(52, 'abc', 'Java', '5', '4', '1', '2022-08-16'),
(53, 'himank', 'CPP', '6', '0', '6', '2022-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `uid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `uid`) VALUES
(14, 'akshat', 'a1'),
(16, '19011909', '121'),
(17, 'anjali', '122'),
(18, 'rohan', '123'),
(19, '19011909', '495'),
(20, '19102149', '496'),
(21, 'king', '497'),
(22, '19011971', '498'),
(23, 'akkiaj89', '241'),
(24, 'ak', '449'),
(25, 'rohan', '750'),
(26, 'ajay', '210'),
(27, 'ajay', '776'),
(28, 'ajay', '777'),
(29, 'ajay', '787'),
(30, 'ajk', '220'),
(31, '', ''),
(32, 'admin1', '12111'),
(33, 'ajay', '11'),
(34, 'akshat', '1111'),
(35, 'Akshat', '906'),
(36, 'anjali', '322'),
(37, 'Shreya', '199'),
(38, 'Shreya', '420'),
(39, 'Anjali', '421'),
(40, 'Raghav', '9900'),
(41, 'Raghav', '9901'),
(42, 'Anjali', '69'),
(43, 'Rahul', '32'),
(44, 'Suraj', '501'),
(45, 'AkshatJain', '534'),
(46, 'Rohan', '542'),
(47, 'Anjali', '247'),
(48, 'Mickey', '789'),
(49, 'Anjali', '898'),
(50, 'Akshay', '1025'),
(51, 'Ajay', '77878'),
(52, 'Rohan', '9090'),
(53, 'Vickyy', '152121'),
(54, 'Vicky', '0909'),
(55, 'vicky', '151'),
(56, '19011909', '152'),
(57, 'vicky', '159'),
(58, 'shj', '01'),
(59, '899', '090'),
(60, 'King', '001'),
(61, 'kingi', '90'),
(62, 'akshatF', '800'),
(63, 'akshat', '801'),
(64, '19011909', '929'),
(65, 'Priyank', '585'),
(66, 'Rohan', '548'),
(67, 'abc', '539'),
(68, 'himank', '944');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

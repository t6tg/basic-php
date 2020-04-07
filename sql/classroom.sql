-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 06, 2020 at 10:16 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";

--
-- Database: `basic-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students`
(
  `id` int
(11) NOT NULL,
  `username` varchar
(100) NOT NULL,
  `password` varchar
(100) NOT NULL,
  `name` varchar
(100) NOT NULL,
  `section` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

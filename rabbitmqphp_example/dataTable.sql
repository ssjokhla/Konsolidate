-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2018 at 03:59 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masterDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataTable`
--

CREATE TABLE `dataTable` (
  `Time Stamp` varchar(20) NOT NULL,
  `Time Played` int(12) NOT NULL,
  `Hand Palm Position x` float NOT NULL,
  `Hand Palm Position y` float NOT NULL,
  `Hand Palm Position Z` float NOT NULL,
  `Palm Norm x` float NOT NULL,
  `Palm Norm y` float NOT NULL,
  `Palm Norm z` float NOT NULL,
  `Wrist Position x` float NOT NULL,
  `Wrist Position y` float NOT NULL,
  `Wrist Position z` float NOT NULL,
  `Thumb TYPE_METACARPAL x` float NOT NULL,
  `Thumb TYPE_METACARPAL y` float NOT NULL,
  `Thumb TYPE_METACARPAL z` float NOT NULL,
  `Thumb TYPE_PROXIMAL x` float NOT NULL,
  `Thumb TYPE_PROXIMAL y` float NOT NULL,
  `Thumb TYPE_PROXIMAL z` float NOT NULL,
  `Thumb TYPE_INTERMEDIATE x` float NOT NULL,
  `Thumb TYPE_INTERMEDIATE y` float NOT NULL,
  `Thumb TYPE_INTERMEDIATE z` float NOT NULL,
  `Thumb TYPE_DISTAL x` float NOT NULL,
  `Thumb TYPE_DISTAL y` float NOT NULL,
  `Thumb TYPE_DISTAL z` float NOT NULL,
  `Thumb Finger Tip x` float NOT NULL,
  `Thumb Finger Tip y` float NOT NULL,
  `Thumb Finger Tip z` float NOT NULL,
  `Index TYPE_METACARPAL x` float NOT NULL,
  `Index TYPE_METACARPAL y` float NOT NULL,
  `Index TYPE_METACARPAL z` float NOT NULL,
  `Index TYPE_PROXIMAL x` float NOT NULL,
  `Index TYPE_PROXIMAL y` float NOT NULL,
  `Index TYPE_PROXIMAL z` float NOT NULL,
  `Index TYPE_INTERMEDIATE x` float NOT NULL,
  `Index TYPE_INTERMEDIATE y` float NOT NULL,
  `Index TYPE_INTERMEDIATE z` float NOT NULL,
  `Index TYPE_DISTAL x` float NOT NULL,
  `Index TYPE_DISTAL y` float NOT NULL,
  `Index TYPE_DISTAL z` float NOT NULL,
  `Index Finger Tip x` float NOT NULL,
  `Index Finger Tip y` float NOT NULL,
  `Index Finger Tip z` float NOT NULL,
  `Middle TYPE_METACARPAL x` float NOT NULL,
  `Middle TYPE_METACARPAL y` float NOT NULL,
  `Middle TYPE_METACARPAL z` float NOT NULL,
  `Middle TYPE_PROXIMAL x` float NOT NULL,
  `Middle TYPE_PROXIMAL y` float NOT NULL,
  `Middle TYPE_PROXIMAL z` float NOT NULL,
  `Middle TYPE_INTERMEDIATE x` float NOT NULL,
  `Middle TYPE_INTERMEDIATE y` float NOT NULL,
  `Middle TYPE_INTERMEDIATE z` float NOT NULL,
  `Middle TYPE_DISTAL x` float NOT NULL,
  `Middle TYPE_DISTAL y` float NOT NULL,
  `Middle TYPE_DISTAL z` float NOT NULL,
  `Middle Finger Tip x` float NOT NULL,
  `Middle Finger Tip y` float NOT NULL,
  `Middle Finger Tip z` float NOT NULL,
  `Ring TYPE_METACARPAL x` float NOT NULL,
  `Ring TYPE_METACARPAL y` float NOT NULL,
  `Ring TYPE_METACARPAL z` float NOT NULL,
  `Ring TYPE_PROXIMAL x` float NOT NULL,
  `Ring TYPE_PROXIMAL y` float NOT NULL,
  `Ring TYPE_PROXIMAL z` float NOT NULL,
  `Ring TYPE_INTERMEDIATE x` float NOT NULL,
  `Ring TYPE_INTERMEDIATE y` float NOT NULL,
  `Ring TYPE_INTERMEDIATE z` float NOT NULL,
  `Ring TYPE_DISTAL x` float NOT NULL,
  `Ring TYPE_DISTAL y` float NOT NULL,
  `Ring TYPE_DISTAL z` float NOT NULL,
  `Ring Finger Tip x` float NOT NULL,
  `Ring Finger Tip y` float NOT NULL,
  `Ring Finger Tip z` float NOT NULL,
  `Pinky TYPE_METACARPAL x` float NOT NULL,
  `Pinky TYPE_METACARPAL y` float NOT NULL,
  `Pinky TYPE_METACARPAL z` float NOT NULL,
  `Pinky TYPE_PROXIMAL x` float NOT NULL,
  `Pinky TYPE_PROXIMAL y` float NOT NULL,
  `Pinky TYPE_PROXIMAL z` float NOT NULL,
  `Pinky TYPE_INTERMEDIATE x` float NOT NULL,
  `Pinky TYPE_INTERMEDIATE y` float NOT NULL,
  `Pinky TYPE_INTERMEDIATE z` float NOT NULL,
  `Pinky TYPE_DISTAL x` float NOT NULL,
  `Pinky TYPE_DISTAL y` float NOT NULL,
  `Pinky TYPE_DISTAL z` float NOT NULL,
  `Pinky Finger Tip x` float NOT NULL,
  `Pinky Finger Tip y` float NOT NULL,
  `Pinky Finger Tip z` float NOT NULL,
  `Hand Opening` float NOT NULL,
  `Car Speed` float NOT NULL,
  `Car Flipped` float NOT NULL,
  `Palm Roll` float NOT NULL,
  `Coins Collected` float NOT NULL,
  `Lifetime Coins` float NOT NULL,
  `Current Level` varchar(50) NOT NULL,
  `Date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

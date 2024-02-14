-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 14, 2024 at 11:27 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Fullname` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `Fullname`, `Email`, `Password`) VALUES
(1, 'Santhosh', 'santhoshsekar2903@gmail.com', '$2y$10$M68rGbO9r56HrjZYqkYp7.PRhQyPdkNEzkPLRah9.a01HdscjH5A2'),
(2, 'Vijayakumar', 'vijay@gmail.com', '$2y$10$EubzyBTS.Q4R13TdQ9qfFOsMyBIB4aNtzrEu9SkRfcUzX0BYVsZxq'),
(3, 'sowmiya', 'skjhgf@gmail.com', '$2y$10$w9bUVpwNpnG29E/zeDv1/O8OdoPAvZGDohJRFyVDgDbJm.NjK.Upe'),
(4, 'VIjayakumar', 'vijay01@gmail.com', '$2y$10$ozWIVNJP1NbUBZluEZbP9.1f23fPj4F7gS6BXPU.ZZB.2iSVqRp8m');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

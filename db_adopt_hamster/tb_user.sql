-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2024 at 08:38 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_adopt_hammy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `tgl_daftar` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `email`, `password`, `tgl_daftar`) VALUES
(1, 'test', 'test@gmail.com', 't', '2024-10-24 10:53:35'),
(2, 'test', 'test@gmail.com', 'a', '2024-10-24 10:53:52'),
(3, 'a', 'alluhaveisspring11@gmail.com', 'a', '2024-10-24 10:55:01'),
(4, 'a', 'alluhaveisspring11@gmail.com', 't', '2024-10-24 10:59:28'),
(5, 'a', 'alluhaveisspring11@gmail.com', 't', '2024-10-24 11:00:04'),
(6, 'a', 'alluhaveisspring11@gmail.com', 'a', '2024-10-24 11:00:15'),
(7, 'a', 'alluhaveisspring11@gmail.com', 'a', '2024-10-24 11:00:38'),
(8, 'a', 'alluhaveisspring11@gmail.com', 'a', '2024-10-24 11:01:14'),
(9, 'a', 'alluhaveisspring11@gmail.com', 'a', '2024-10-24 11:02:51'),
(10, 'a', 'alluhaveisspring11@gmail.com', 'a', '2024-10-24 11:03:48'),
(11, 's', '', '', '2024-10-24 11:05:36'),
(12, 'leonkennedy', 'leonkennedy@gmail.com', 'racooncity', '2024-10-24 11:39:40'),
(13, 'alifaakrn_', 'alifaakrn04@gmail.com', 'alifakirana', '2024-10-24 13:08:44'),
(14, 'ian', 'ian@gmail.com', 'ian', '2024-10-24 13:12:26'),
(15, 'alifa', 'alifaakrn04@gmail.com', 'alifa', '2024-10-31 20:52:20'),
(16, 'mashari', 'mashari@gmail.com', 'mashari', '2024-11-01 10:11:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

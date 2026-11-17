-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2026 at 01:21 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd_2622500022`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kontak_262500022`
--

CREATE TABLE `tbl_kontak_262500022` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `semester` tinyint NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_pesan` varchar(20) NOT NULL,
  `minat` varchar(50) NOT NULL,
  `prodi` varchar(2) NOT NULL,
  `pesan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kontak_262500022`
--

INSERT INTO `tbl_kontak_262500022` (`id`, `nama`, `email`, `semester`, `tanggal`, `jenis_pesan`, `minat`, `prodi`, `pesan`) VALUES
(1, 'yazid', 'asdasdas@gmail.com', 1, '2026-11-17', 'saran', 'html,css', '', 'ASDASIADASDASDADAS'),
(2, 'Yajuj', 'asadsa@gmail.com', 1, '2026-11-17', 'pertanyaan', 'html', 'TI', 'ASDDASDASD'),
(3, 'majuj', 'AJASD@gmail.com', 1, '2026-11-18', 'pertanyaan', 'css', 'SI', 'asdajsudy'),
(4, 'uwak', 'uasd@gmail.com', 1, '2026-11-17', 'saran', 'html', 'TI', 'asdasdd'),
(5, 'majia', 'ashasd@gmail.com', 1, '2026-11-07', 'saran', 'html', 'TI', 'asasdas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kontak_262500022`
--
ALTER TABLE `tbl_kontak_262500022`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kontak_262500022`
--
ALTER TABLE `tbl_kontak_262500022`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

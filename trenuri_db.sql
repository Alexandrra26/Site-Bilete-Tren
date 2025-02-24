-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 11:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trenuri_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `rezervari`
--

CREATE TABLE `rezervari` (
  `id` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `data_plecarii` date NOT NULL,
  `categorie_varsta` varchar(20) NOT NULL,
  `pret` decimal(10,2) NOT NULL,
  `numar_bilete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rezervari`
--

INSERT INTO `rezervari` (`id`, `nume`, `prenume`, `data_plecarii`, `categorie_varsta`, `pret`, `numar_bilete`) VALUES
(1, 'ALex', 'Marian', '2024-07-19', 'Elev', 60.00, 3),
(2, '2erq', 'rwer', '2024-07-05', 'Adult', 90.00, 1),
(3, 'sara', 'vvv', '2024-06-21', 'Pensionar', 120.00, 3),
(4, 'Popescu', 'Mihai', '2024-06-28', 'Elev', 48.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE `utilizatori` (
  `id` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `parola` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`id`, `nume`, `prenume`, `email`, `parola`) VALUES
(1, '2342', '234234', 'cristi@gmail.com', '$2y$10$qNT89d54lnGhUVcqn0H40.vrXPLsbqe9YPrtXbceLWlFerPu0cLHG'),
(2, '32423', '254325', 'edy@gmail.com', '$2y$10$acUBVR2upIpkbm2/DnKLs.55vfjUtgnYhtCvOvP5C0qLul3m2zOUS'),
(3, 'Alex', 'Marian', 'alexmarian@gmail.com', '$2y$10$jpL56WLAGjgcoAU/84VQtuo3Ho0fdtdl5fPJIsc6myyOZejiN9FtW'),
(4, 'sara', 'vvv', 'sara@gmail.com', '$2y$10$YswV4L4jCNhebqlZEYUKheKvrAl1ijel30JlOS5rcMrBFMobl4oj.'),
(5, 'Popescu', 'Mihai', 'popescu@gmail.com', '$2y$10$MwmnmZuJCTQo/3GwagppYO62hyejDCDQASwlRjVwbmtl3dm9UNZqq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rezervari`
--
ALTER TABLE `rezervari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rezervari`
--
ALTER TABLE `rezervari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2024 at 05:15 PM
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
-- Database: `medics`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicament`
--

CREATE TABLE `medicament` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `visibility` bit(1) NOT NULL DEFAULT b'1',
  `quantite` int(11) DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `medicament`
--

INSERT INTO `medicament` (`id`, `name`, `description`, `prix`, `visibility`, `quantite`) VALUES
(1, 'Painrelief', 'Generic pain reliever', 10.5, b'1', 41),
(2, 'CoughNoMore', 'Cough syrup for dry cough', 15.2, b'0', 30),
(3, 'FeverDown', 'Medication for reducing fever', 8.3, b'1', 66),
(4, '111', '1111111', 111, b'1', 99);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `is_admin` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`) VALUES
(1, 'user', 'user', '$2y$10$vxTRGzSWYw95AmvpRQqS7OCqiuFVAejiMtj3jw9NdM3WkdbM0ePxq', NULL),
(2, 'admin', 'admin', '$2y$10$ZfQUVxW5JOroCtz2ICh56O0ftzegr5FAACThaRLygXST9GQ2pRT5W', b'1'),
(5, 'abdeljabar', 'rabajledba@gmail.com', '$2y$10$Vi9jbd9kI3DHAf1VGifOo.xenvPWqMQBqW6mV/nlgHe/g4S0/KiKS', NULL),
(6, 'khalid@fmial.com', 'khalid@fmial.com', '$2y$10$CWMSMWyGfzkYIlMK9hVnEe/1W9/I7OwEaXMwghBmuGkwkGsQb.43u', NULL),
(11, 'asdfasd', 'asdasd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

CREATE TABLE `vente` (
  `id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_medicament` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `type` enum('local','online') NOT NULL,
  `visibility_vente` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vente`
--

INSERT INTO `vente` (`id`, `id_patient`, `id_medicament`, `date`, `type`, `visibility_vente`) VALUES
(1, 1, 1, '2023-12-27', 'local', b'0'),
(2, 1, 2, '2023-12-28', 'online', b'1'),
(3, 2, 1, '2023-12-29', 'local', b'0'),
(4, 5, 1, '2023-12-30', 'local', b'0'),
(6, 5, 1, '2024-01-02', 'local', b'0'),
(9, 1, 3, '2024-01-02', 'online', b'0'),
(10, 2, 1, '2024-01-02', 'online', b'0'),
(11, 2, 1, '2024-01-02', 'online', b'0'),
(12, 2, 3, '2024-01-02', 'online', b'0'),
(13, 1, 3, '2024-01-04', 'online', b'0'),
(14, 1, 1, '2024-01-04', 'online', b'0'),
(15, 1, 1, '2024-01-04', 'online', b'0'),
(16, 1, 1, '2024-01-04', 'online', b'0'),
(17, 1, 3, '2024-01-04', 'online', b'0'),
(18, 1, 3, '2024-01-04', 'online', b'0'),
(19, 1, 1, '2024-01-04', 'online', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vente_id_medicament` (`id_medicament`),
  ADD KEY `fk_vente_id_patient` (`id_patient`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicament`
--
ALTER TABLE `medicament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vente`
--
ALTER TABLE `vente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `fk_vente_id_medicament` FOREIGN KEY (`id_medicament`) REFERENCES `medicament` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vente_id_patient` FOREIGN KEY (`id_patient`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

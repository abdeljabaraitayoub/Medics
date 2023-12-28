-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 28, 2023 at 02:40 PM
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
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `medicament`
--

INSERT INTO `medicament` (`id`, `name`, `description`, `prix`, `visibility`, `quantite`) VALUES
(1, 'Painrelief', 'Generic pain reliever', 10.5, b'1', 50),
(2, 'CoughNoMore', 'Cough syrup for dry cough', 15.2, b'0', 30),
(3, 'FeverDown', 'Medication for reducing fever', 8.3, b'1', 75);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` enum('admin','user','cachier','') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'user', 'user', '$2y$10$vxTRGzSWYw95AmvpRQqS7OCqiuFVAejiMtj3jw9NdM3WkdbM0ePxq', 'user'),
(2, 'admin', 'admin', '$2y$10$ZfQUVxW5JOroCtz2ICh56O0ftzegr5FAACThaRLygXST9GQ2pRT5W', 'admin'),
(3, 'cachier', 'cachier', '$2y$10$gqijucCiiZk/qGLyo69zmOiM4bAwCHMrEScLSXtVOR7LbtJUl3EyC', 'cachier');

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

CREATE TABLE `vente` (
  `id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_medicament` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `type` enum('local','online') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vente`
--

INSERT INTO `vente` (`id`, `id_patient`, `id_medicament`, `date`, `type`) VALUES
(1, 1, 1, '2023-12-27', 'local'),
(2, 1, 2, '2023-12-28', 'online'),
(3, 1, 3, '2023-12-29', 'local');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vente`
--
ALTER TABLE `vente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

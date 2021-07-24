-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 06:51 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cognox`
--

-- --------------------------------------------------------

--
-- Table structure for table `transacciones`
--

CREATE TABLE `transacciones` (
  `id` int(11) NOT NULL,
  `cuenta_origen` text COLLATE utf32_unicode_ci NOT NULL,
  `cuenta_destino` text COLLATE utf32_unicode_ci NOT NULL,
  `monto` text COLLATE utf32_unicode_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `transacciones`
--

INSERT INTO `transacciones` (`id`, `cuenta_origen`, `cuenta_destino`, `monto`, `fecha`) VALUES
(1, '987654321', '12346789', '500000', '2021-07-22'),
(3, '45345345343', '987654321', '100000', '2021-07-21'),
(4, '456789123', '951753456', '50000', '2021-07-22'),
(12, '123', '321', '50000', '2021-07-22'),
(13, '987654321', '456789123', '200', '2021-07-23'),
(15, '456789123', '951753456', '40000', '2021-07-24'),
(16, '456789123', '951753456', '40000', '2021-07-24'),
(17, '987654321', '456789123', '500000', '2021-07-24'),
(18, '987654321', '456789123', '600000', '2021-07-24'),
(19, '456789123', '987654321', '1110000', '2021-07-24'),
(20, '987654321', '456789123', '1110000', '2021-07-24'),
(21, '456789123', '987654321', '1110000', '2021-07-24'),
(22, '987654321', '456789123', '1110000', '2021-07-24'),
(23, '456789123', '987654321', '1000', '2021-07-24'),
(24, '456789123', '987654321', '90000', '2021-07-24'),
(25, '987654321', '456789123', '10000', '2021-07-24'),
(26, '987654321', '456789123', '81000', '2021-07-24'),
(27, '456789123', '987654321', '110000', '2021-07-24'),
(28, '987654321', '456789123', '10000', '2021-07-24'),
(29, '987654321', '951753456', '50000', '2021-07-24'),
(30, '987654321', '13415672', '20000', '2021-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` text COLLATE utf32_unicode_ci NOT NULL,
  `password` text COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, '1045727632', '1234'),
(3, '3506920488', '1234'),
(4, '951401', '1234'),
(5, '137946852', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_cuenta`
--

CREATE TABLE `usuario_cuenta` (
  `id` int(11) NOT NULL,
  `usuario_id` text COLLATE utf32_unicode_ci NOT NULL,
  `cuenta` text COLLATE utf32_unicode_ci NOT NULL,
  `saldo` text COLLATE utf32_unicode_ci NOT NULL,
  `habilitado_transferencias` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `usuario_cuenta`
--

INSERT INTO `usuario_cuenta` (`id`, `usuario_id`, `cuenta`, `saldo`, `habilitado_transferencias`, `activo`) VALUES
(1, '1', '987654321', '30000', 1, 1),
(2, '1', '456789123', '1010000', 1, 1),
(3, '3', '951753456', '220000', 1, 1),
(4, '137946852', '13415672', '520000', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario_cuenta`
--
ALTER TABLE `usuario_cuenta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuario_cuenta`
--
ALTER TABLE `usuario_cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

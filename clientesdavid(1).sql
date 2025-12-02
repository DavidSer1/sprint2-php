-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Temps de generació: 02-12-2025 a les 09:55:14
-- Versió del servidor: 8.0.44-0ubuntu0.24.04.1
-- Versió de PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `clientesdavid`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `clientes`
--

CREATE TABLE `clientes` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `localidad` varchar(30) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(30) NOT NULL,
  `rol` varchar(50) NOT NULL DEFAULT 'cliente',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Bolcament de dades per a la taula `clientes`
--

INSERT INTO `clientes` (`dni`, `nombre`, `direccion`, `localidad`, `provincia`, `telefono`, `email`, `rol`, `password`) VALUES
('12345678R', 'dddddddd', 'dddddd', 'dddddd', 'ugfygfyfgfg', '675984922', 'f@gmail.com', 'cliente', '$2y$10$VYF3CzG/zpsjh8AilORlI.vnch8TflvwdRQpFrP/eDabulBGDQtRe'),
('68038193E', 'david', 'gggggggggg', 'gggggggg', 'ggggggggg', '647939292', 'david@gmail.com', 'administrador', '$2y$10$MB0cGP4zUujcsVzjBwYe6uXsUuHDixxgMXaS87mxx.CXHo0gnNDUm');


--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

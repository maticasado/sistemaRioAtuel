-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2025 a las 16:20:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laboratorio_inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_notebooks`
--

CREATE TABLE `inventario_notebooks` (
  `id` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `fecha_revision` date NOT NULL,
  `encargado` varchar(100) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `posible_solucion` text DEFAULT NULL,
  `trabajo_hecho` text DEFAULT NULL,
  `programa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `procesador` varchar(255) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `almacenamiento` varchar(100) NOT NULL,
  `sistema_operativo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `nombre`, `procesador`, `ram`, `almacenamiento`, `sistema_operativo`) VALUES
(1, 'Conectar Igualdad – 1ra Generación (2010–2012)', 'Intel Atom N450/N455 (1 núcleo, 1.66 GHz)', '1–2 GB DDR2', 'HDD 160–250 GB', 'Windows 7 Starter'),
(2, 'Conectar Igualdad – 2da Generación (2013–2015)', 'Intel Celeron/Pentium (B800, N2805, N2830, N2840)', '2–4 GB DDR3', 'HDD 320–500 GB', 'Windows 8 / Huayra Linux'),
(3, 'Conectar Igualdad – 3ra Generación (2015–2017)', 'Intel Celeron N3050/N3060 o Core i3 4ta gen', '4 GB DDR3L', 'HDD 500 GB', 'Windows 10 / Huayra Linux 3'),
(4, 'Plan Nacional de Inclusión Digital Educativa (2018–2019)', 'Intel Celeron N3060/N3350 o Pentium N4200', '4 GB DDR3/DDR4', 'HDD 500 GB o SSD 128 GB', 'Windows 10'),
(5, 'Plan Federal Juana Manso / Relanzamiento Conectar Igualdad (2021–Actualidad)', 'Intel Celeron N4020/N4120 o AMD A4/A6 serie 9000C', '4 GB DDR4', 'SSD 240 GB', 'Windows 10/11 Pro Education o Huayra 5 Linux');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `procesador` varchar(255) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `almacenamiento` varchar(100) NOT NULL,
  `sistema_operativo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `nombre`, `procesador`, `ram`, `almacenamiento`, `sistema_operativo`) VALUES
(1, 'Conectar Igualdad – 1ra Generación (2010–2012)', 'Intel Atom N450/N455 (1 núcleo, 1.66 GHz)', '1–2 GB RAM DDR2', 'HDD 160–250 GB', 'Windows 7 Starter'),
(2, 'Conectar Igualdad – 2da Generación (2013–2015)', 'Intel Celeron/Pentium (B800, N2805, N2830, N2840)', '2–4 GB RAM DDR3', 'HDD 320–500 GB', 'Windows 8 / Huayra Linux'),
(3, 'Conectar Igualdad – 3ra Generación (2015–2017)', 'Intel Celeron N3050/N3060 o Core i3 4ta gen', '4 GB RAM DDR3L', 'HDD/SSD', 'Windows 10 / Huayra Linux 3'),
(4, 'Plan Nacional de Inclusión Digital Educativa (2018–2019)', 'Intel Celeron N3060/N3350 o Pentium N4200', '4 GB RAM DDR3/DDR4', 'HDD 500 GB o SSD 128 GB', 'Windows 10'),
(5, 'Plan Federal Juana Manso / Relanzamiento Conectar Igualdad (2021–Actualidad)', 'Intel Celeron N4020/N4120 o AMD A4/A6 serie 9000C', '4 GB RAM DDR4', 'SSD 240 GB', 'Windows 10/11 Pro Education o Huayra 5 Linux');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario_notebooks`
--
ALTER TABLE `inventario_notebooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programa_id` (`programa_id`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario_notebooks`
--
ALTER TABLE `inventario_notebooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventario_notebooks`
--
ALTER TABLE `inventario_notebooks`
  ADD CONSTRAINT `inventario_notebooks_ibfk_1` FOREIGN KEY (`programa_id`) REFERENCES `programas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

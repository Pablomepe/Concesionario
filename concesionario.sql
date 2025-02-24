-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-02-2025 a las 11:08:00
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `concesionario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquileres`
--

CREATE TABLE `alquileres` (
  `id_alquiler` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `id_coche` int(10) UNSIGNED DEFAULT NULL,
  `prestado` datetime DEFAULT NULL,
  `devuelto` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `alquileres`
--

INSERT INTO `alquileres` (`id_alquiler`, `id_usuario`, `id_coche`, `prestado`, `devuelto`) VALUES
(8, 18, 30, '2025-02-20 17:30:50', '2025-02-20 18:16:57'),
(9, 18, 22, '2025-02-20 17:43:25', '2025-02-22 11:50:27'),
(10, 18, 21, '2025-02-20 19:04:42', '2025-02-24 12:04:12'),
(11, 18, 21, '2025-02-20 19:09:13', '2025-02-24 12:04:12'),
(12, 18, 21, '2025-02-21 13:10:40', '2025-02-24 12:04:12'),
(13, 17, 22, '2025-02-22 11:49:20', '2025-02-22 11:50:27'),
(14, 18, 21, '2025-02-24 11:57:11', '2025-02-24 12:04:12'),
(15, 18, 22, '2025-02-24 12:04:01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id_coche` int(10) UNSIGNED NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `alquilado` tinyint(1) DEFAULT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `id_dueno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id_coche`, `modelo`, `marca`, `color`, `precio`, `alquilado`, `foto`, `id_dueno`) VALUES
(20, 'AMR 24', 'Aston Martin', 'verde', 100000, 0, './img/coche.jpg', 17),
(21, 'Ka', 'Ford', 'morado', 3000, 0, './img/ford-ka-i-1.jpg', 17),
(22, '3008', 'Peugeot', 'Gris', 21700, 1, './img/peugeot 3008.jpg', 17),
(25, 'R32', 'Nissan', 'Azul', 8000, 0, './img/Nissan-R32-GT-R.jpg', 17),
(27, 'Spring', 'Dacia', 'Gris', 19500, 0, './img/Dacia-Spring.jpg', 17),
(28, 'G63', 'Mercedes Benz', 'Blanco', 449000, 0, './img/mercedes-g-63.jpg', 17),
(30, 'punto', 'fiat', 'negro', 3500, 0, './img/Fiat Punto.jpg', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `saldo` float DEFAULT NULL,
  `tipo` enum('adm','ven','com') NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `password`, `nombre`, `apellidos`, `dni`, `saldo`, `tipo`, `email`) VALUES
(16, '$2y$10$Lazgla5DNzWo0qE7i23NNOezWdFR5TbITSqoZX6oAXMWy7JtYYaQi', 'Pablo', 'Merino Perez', '09072445A', 50000, 'adm', 'pablomepe05@gmail.com'),
(17, '$2y$10$BeUlcNQ9c3OqURmTF4P1tO5vXabZcnswTMMDk6NIn9kRXYOaZr1KG', 'cristian', 'Rojas', '58746885L', 75700, 'ven', 'pablomepe06@gmail.com'),
(18, '$2y$10$NupATv5t6/xc7tC8whYVg.mF3U.1sf.prsB4GqQRXXcMABWkkjAci', 'Mario', 'Cordente Perez', '58745668P', 24300, 'com', 'pablomepe07@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD PRIMARY KEY (`id_alquiler`);

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`id_coche`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  MODIFY `id_alquiler` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `coches`
--
ALTER TABLE `coches`
  MODIFY `id_coche` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

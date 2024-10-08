-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2024 a las 19:12:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clientes_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `apellido` varchar(35) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(11, 'Fernandita', 'Gomez', '753951852'),
(12, 'Lucía', 'Fernández', '654789321'),
(13, 'Carlitos', 'Hernández', '987321654'),
(14, 'Paula', 'Jiménez', '321456987'),
(15, 'Jorge', 'Vargas', '951357654'),
(16, 'Gabriela', 'Muñoz', '654987123'),
(17, 'Ricardo', 'Silva', '852963741'),
(18, 'Patricia', 'Rojas', '951258963'),
(19, 'Daniel', 'Navarro', '789321654'),
(20, 'Laura', 'Soto', '753159852'),
(21, 'Alberto', 'Castro', '456987321'),
(22, 'Mónica', 'Vega', '741963852'),
(23, 'Esteban', 'Mora', '852147963'),
(24, 'Claudia', 'Paredes', '963741852'),
(25, 'Diego', 'León', '753264159'),
(26, 'Carolina', 'Suárez', '159753852'),
(27, 'Víctor', 'Cabrera', '456321789'),
(33, 'Tanya', 'Medina', '624666666'),
(34, 'Oscar', 'Silva', '333444555'),
(36, 'Xavier', 'Peters', '602777777'),
(37, 'Axel', 'Zaldivar', '982912700'),
(38, 'Rodriguito', 'Amezcua', '278941923');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$3HRi3h16rzBcN6lAlxPVjuL2HZTwN2UBLM2QK1kM2XCUtzmJBQT9S');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

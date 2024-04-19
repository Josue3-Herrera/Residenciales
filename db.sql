-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2024 a las 00:36:28
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
-- Base de datos: `privadas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_mascotas`
--

CREATE TABLE `t_mascotas` (
  `id_mascota` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `raza` varchar(50) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_mascotas`
--

INSERT INTO `t_mascotas` (`id_mascota`, `id_usuario`, `nombre`, `tipo`, `raza`, `edad`, `color`, `sexo`, `foto`) VALUES
(1, 2, 'Max', 'Perro', 'Labrador Retriever', 3, 'Negro', 'Macho', 'ruta/foto_max.jpg'),
(2, 1, 'Luna', 'Gato', 'Siamés', 2, 'Blanco y marrón', 'Hembra', 'ruta/foto_luna.jpg'),
(3, 2, 'Rocky', 'Perro', 'Bulldog Francés', 4, 'Atigrado', 'Macho', NULL),
(4, 3, 'Kiara', 'Perro', 'Golden Retriever', 1, 'Dorado', 'Hembra', 'ruta/foto_kiara.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_mascotas`
--
ALTER TABLE `t_mascotas`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_mascotas`
--
ALTER TABLE `t_mascotas`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_mascotas`
--
ALTER TABLE `t_mascotas`
  ADD CONSTRAINT `t_mascotas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`Id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

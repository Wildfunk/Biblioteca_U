-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-02-2020 a las 17:54:11
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--
CREATE DATABASE IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `biblioteca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autors`
--

CREATE TABLE `autors` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autors`
--

INSERT INTO `autors` (`id`, `nombre`, `apellido`, `fecha_nacimiento`, `pais`, `imagen`, `deleted_at`) VALUES
(1, 'Albert', 'Camus', '1913-11-08', 'Francia', 'public/autores/FlG2UJAJbVkPAJFq6soCgCv3M6rP7RpWRaINKo4m.jpeg', NULL),
(2, 'Hermann', 'Hesse', '1877-07-02', 'Alemania', 'public/autores/oMirh1uz2OJsX2VWeApBJPb1YhMMhRQ71ZwMIGWk.jpeg', NULL),
(3, 'Carl', 'Jung', '1875-07-26', 'Suiza', 'public/autores/pQH7Iyig4aNLjFvEnGwMjOeKy1r7fLZ7ft2xCszu.jpeg', NULL),
(4, 'Ayn', 'Rand', '1905-02-02', 'Rusia', 'public/autores/WT7u5XdADGzcVHFWlinGhuoVE0mWyy90Uiga400j.jpeg', NULL),
(5, 'Charles', 'Baudelaire', '1821-04-09', 'Fracia', 'public/autores/n6JTTa2wGvLL3qj2ZioVDXh4EgBkT9lETcVI6qdk.jpeg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor_libro`
--

CREATE TABLE `autor_libro` (
  `autor_id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autor_libro`
--

INSERT INTO `autor_libro` (`autor_id`, `libro_id`, `deleted_at`) VALUES
(1, 3, NULL),
(1, 8, NULL),
(1, 9, NULL),
(1, 10, NULL),
(1, 11, NULL),
(1, 12, NULL),
(2, 7, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorials`
--

CREATE TABLE `editorials` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `editorials`
--

INSERT INTO `editorials` (`id`, `nombre`, `deleted_at`) VALUES
(1, 'zip-zag', NULL),
(2, 'planeta', '2020-01-10 04:36:16'),
(3, 'planeta', '2020-01-10 04:36:14'),
(4, 'minotauro', '2020-01-10 04:36:13'),
(5, 'minotauro', NULL),
(6, 'agua', '2020-01-10 04:38:47'),
(7, 'agua', '2020-01-10 04:48:13'),
(8, 'esencia', NULL),
(9, 'espasa', NULL),
(10, 'aguassss', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `editorial_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `estado`, `fecha_prestamo`, `created_at`, `updated_at`, `deleted_at`, `editorial_id`) VALUES
(3, 'El mito de Sisifo', 'prestado', '2020-01-09', '2020-01-10 05:41:12', '2020-01-10 19:50:28', NULL, 5),
(7, 'Demian', 'disponible', NULL, '2020-01-10 07:07:34', '2020-01-10 07:07:34', NULL, 8),
(8, 'La peste', 'disponible', NULL, '2020-01-10 18:54:57', '2020-01-10 18:55:10', NULL, 5),
(9, 'el extranjero', 'disponible', NULL, '2020-01-10 18:56:02', '2020-01-10 19:13:16', '2020-01-10 19:13:16', 9),
(10, 'PAPELUCHO', 'disponible', NULL, '2020-01-10 19:03:19', '2020-01-10 19:13:13', '2020-01-10 19:13:13', 8),
(11, NULL, 'prestado', NULL, '2020-02-26 23:49:53', '2020-02-26 23:50:00', '2020-02-26 23:50:00', 10),
(12, NULL, 'prestado', NULL, '2020-02-26 23:50:38', '2020-02-26 23:50:41', '2020-02-26 23:50:41', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `rut` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `apellido` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`rut`, `password`, `nombre`, `apellido`) VALUES
('164569980', '$2y$10$zOSFt421J09PtKQe/cx1AOqKaV50w0IeKnYGIMMB.4wMsUV0Tcb..', 'Tulio', 'Triviño'),
('199740024', '$2y$10$HQa3bqlGq9ThKHjFZvILQuVYlmNgBR.wcF7cRn9kqyKuVuJmsi5m2', 'kris', 'sandoval'),
('alumno1', '$2y$10$THJ5HZBJ3EZOSMsqLY27SegAO/m7FsaWTWmpgw.3R3tM7dVVJVtvm', 'Luciano ', 'Bello'),
('alumno2', '$2y$10$Y4drkhIWU6wyWM/lS2aKNu4xf8tgiHwUqQLEi0KTzIaM/RnloqqLS', 'Marselo', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autors`
--
ALTER TABLE `autors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `autor_libro`
--
ALTER TABLE `autor_libro`
  ADD PRIMARY KEY (`autor_id`,`libro_id`),
  ADD KEY `fk_autores_has_libros_libros1_idx` (`libro_id`),
  ADD KEY `fk_autores_has_libros_autores1_idx` (`autor_id`);

--
-- Indices de la tabla `editorials`
--
ALTER TABLE `editorials`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_libros_editoriales_idx` (`editorial_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`rut`),
  ADD UNIQUE KEY `rut_UNIQUE` (`rut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autors`
--
ALTER TABLE `autors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `editorials`
--
ALTER TABLE `editorials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autor_libro`
--
ALTER TABLE `autor_libro`
  ADD CONSTRAINT `fk_autores_has_libros_autores1` FOREIGN KEY (`autor_id`) REFERENCES `autors` (`id`),
  ADD CONSTRAINT `fk_autores_has_libros_libros1` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `fk_libros_editoriales` FOREIGN KEY (`editorial_id`) REFERENCES `editorials` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

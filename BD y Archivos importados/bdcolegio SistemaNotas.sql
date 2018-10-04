-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2018 a las 01:23:03
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcolegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idAlumno` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ingreso` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `asignacion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `promedioFinal` int(4) NOT NULL,
  `estado` varchar(2) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idAlumno`, `nombre`, `apellido`, `ingreso`, `asignacion`, `promedioFinal`, `estado`) VALUES
(6261631, 'Oleg', 'Serrano', '2018', 'ASIGNADO', 48, 'A'),
(8468829, 'Abdul', 'Holman', '2018', 'ASIGNADO', 29, 'R'),
(10207009, 'Priscilla', 'Bennett', '2018', 'ASIGNADO', 0, 'R'),
(19543644, 'Raja', 'Wiggins', '2018', 'ASIGNADO', 0, 'R'),
(22178016, 'Indira', 'Cline', '2018', 'No asignado', 0, ''),
(24423529, 'Jeremy', 'Murray', '2018', 'No asignado', 0, ''),
(27159042, 'Hakeem', 'Knowles', '2018', 'No asignado', 0, ''),
(36491606, 'Iliana', 'Shields', '2018', 'No asignado', 0, ''),
(44294342, 'Joshua', 'Velazquez', '2018', 'No asignado', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL,
  `grado` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idCurso`, `grado`) VALUES
(18, 'Segundo Basico'),
(19, 'Tercero Basico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id_foto` int(250) NOT NULL,
  `id_noticia` int(250) DEFAULT NULL,
  `foto` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id_foto`, `id_noticia`, `foto`) VALUES
(1, 1, 0x2f75706c6f6164732f537333656866416b666b526f376a7059397a4a4c73356376756462584e4a316c655059366b723459306557367375386453512d6e65777370617065725f62772e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `idMateria` int(11) NOT NULL,
  `idCurso` int(11) DEFAULT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `asignacion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idProfesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idMateria`, `idCurso`, `nombre`, `estado`, `asignacion`, `idProfesor`) VALUES
(52, 18, 'Lenguaje y Comunicaciones', 'activo', 'ASIGNADO', 6341234),
(53, 18, 'matematicas', 'activo', 'ASIGNADO', 6341234),
(54, 19, 'ciencias', 'activo', 'ASIGNADO', 6341234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idMensaje` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `asunto` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`idMensaje`, `nombre`, `email`, `asunto`, `descripcion`, `fecha`) VALUES
(1, 'juan', 'j@gmail.com', 'pregunta', 'hola quiero saber cuanto es la matricula', '2018-09-16 15:59:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `idAlumno` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `nota` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `promedio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idAlumno`, `idMateria`, `nota`, `promedio`) VALUES
(6261631, 52, '0', 50),
(6261631, 53, '0', 46),
(8468829, 52, '0', 35),
(8468829, 53, '0', 22),
(10207009, 52, '0', 0),
(10207009, 53, '0', 0),
(19543644, 54, '0', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(250) NOT NULL,
  `titulo` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` mediumtext COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 'Noticia de Prueba', '<p>Noticia de prueba numero 1&nbsp;</p>', '2018-09-26 21:34:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idProfesor` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `nombre`, `apellido`) VALUES
(6341234, 'Manuel', 'Valenzuela'),
(7263526, 'Jose', 'Torres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `digito` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `rol` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `digito`, `password`, `nombre`, `apellido`, `email`, `genero`, `edad`, `rol`, `estado`, `remember_token`, `created_at`, `updated_at`) VALUES
(6261631, '8', '$2y$10$sRHGk4B/QvpCMTzK/PM08.qqcCCZwzWMalcqGbKvEryKT4fjb06g.', 'Oleg', 'Serrano', 'tincidunt.dui@Inatpede.org', 'hombre', 11, 'alumno', 'activo', NULL, '2018-09-24 01:21:17', '2018-09-24 01:21:38'),
(6341234, '2', '$2y$10$KHo2qfmlpf181piGVBdrKOcRYHctDZpaFTAjYmYCfZclN9ZtBpPqq', 'Manuel', 'Valenzuela', 'manuel@gmail.com', 'hombre', 50, 'profesor', 'activo', NULL, '2018-09-24 01:22:45', '2018-09-24 01:23:16'),
(7263526, '6', '$2y$10$GPiOw3XDFpMcRKw5tVScJ.vPoTOFB7ZloI/0mS9pdeRodwTLdY3W.', 'Jose', 'Torres', 'jtores@gmail.com', 'hombre', 38, 'profesor', 'activo', NULL, '2018-09-24 01:22:45', '2018-09-24 01:22:45'),
(8468829, '0', '$2y$10$m.SdJnNMGsnSqTl..IocK.KqvKy7BLGYC2XtTtRrJxaLDSYLuNxia', 'Abdul', 'Holman', 'a.scelerisque.sed@imperdietdictummagna.co.uk', 'mujer', 10, 'alumno', 'activo', NULL, '2018-09-24 01:21:17', '2018-09-24 01:21:17'),
(10207009, '7', '$2y$10$A6zl3T.8j6wtYfHD9IKOIuJ3JLeprfJ051bw5sgxgaQCWQMVs8VC6', 'Priscilla', 'Bennett', 'dignissim@Mauris.ca', 'hombre', 11, 'alumno', 'activo', NULL, '2018-09-24 01:21:17', '2018-09-24 01:21:17'),
(18273626, '5', '$2y$10$Jm7XN0mpmXX34KgqohlmyO1DZHvD8oqWT1lnogFPDRELb7254CvnC', 'Rodrigo', 'Ramirez', 'rodrigo@gmail.com', 'hombre', 50, 'admin', 'activo', 'cVdJgFRwZHQqO2LA1Z2Toj88IRJaTJD9aQwcdC70aDef1UFOH9oXniIotB85', '2017-05-26 03:11:07', '2017-05-26 03:11:07'),
(19543644, '4', '$2y$10$Rnr9azDxLHIvneOIUagnEuOaJOUDZREbMRFKD462t64vLkQYUt2bW', 'Raja', 'Wiggins', 'aliquet.odio@mauriseuelit.edu', 'mujer', 10, 'alumno', 'activo', NULL, '2018-09-24 01:21:17', '2018-09-24 01:21:17'),
(22178016, '7', '$2y$10$qch6o1ieuavG.vkniWGNceKYKIJ6w7o32l9EMjHBhfxpQ16zH24.u', 'Indira', 'Cline', 'imperdiet.ornare@justo.org', 'mujer', 10, 'alumno', 'activo', NULL, '2018-09-24 01:21:17', '2018-09-24 01:21:17'),
(24423529, '8', '$2y$10$p/hU18gy7xQ3cehc7oBESeHnUcOG4o2d7lwWBIV8K/sfXza8935Sy', 'Jeremy', 'Murray', 'pellentesque.tellus.sem@dapibus.org', 'mujer', 11, 'alumno', 'activo', NULL, '2018-09-24 01:21:17', '2018-09-24 01:21:17'),
(27159042, '3', '$2y$10$8MZfgpAiz3JSLr8kmbZfaODuoKkqBpS2gdrmC1EkBCC.ZRGyGlmee', 'Hakeem', 'Knowles', 'vitae.risus.Duis@euerosNam.edu', 'mujer', 11, 'alumno', 'activo', NULL, '2018-09-24 01:21:17', '2018-09-24 01:21:17'),
(36491606, 'K', '$2y$10$fR08xAiGzlISYRQD2.p49O6028qUQQIOmr95F6q8B1nkPTSwt2L9C', 'Iliana', 'Shields', 'posuere.cubilia.Curae@massa.org', 'mujer', 10, 'alumno', 'activo', NULL, '2018-09-24 01:21:17', '2018-09-24 01:21:17'),
(44294342, '7', '$2y$10$8rJeCUl9xJtRY4XpdBVOQuCTVuOvIn4Hk3j77jVUYXjeLsAprd7V6', 'Joshua', 'Velazquez', 'dolor.Quisque.tincidunt@commodo.co.uk', 'mujer', 11, 'alumno', 'activo', NULL, '2018-09-24 01:21:17', '2018-09-24 01:21:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idAlumno`),
  ADD KEY `idAlumno` (`idAlumno`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`),
  ADD UNIQUE KEY `Fk_materia` (`idCurso`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_noticia` (`id_noticia`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idMateria`),
  ADD KEY `idCurso` (`idCurso`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idMensaje`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idAlumno`,`idMateria`),
  ADD KEY `idAlumno` (`idAlumno`,`idMateria`),
  ADD KEY `notas_ibfk_1` (`idMateria`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `id_noticia` (`id_noticia`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idProfesor`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`id_noticia`) REFERENCES `noticias` (`id_noticia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`idCurso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idMateria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`idAlumno`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

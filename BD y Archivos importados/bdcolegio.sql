-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2018 a las 03:19:06
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.1.17

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
  `asignacion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idAlumno`, `nombre`, `apellido`, `ingreso`, `asignacion`) VALUES
(6261631, 'Oleg', 'Serrano', '2006', 'ASIGNADO'),
(8468829, 'Abdul', 'Holman', '2013', 'ASIGNADO'),
(10207009, 'Priscilla', 'Bennett', '2017', 'ASIGNADO'),
(19543644, 'Raja', 'Wiggins', '2007', 'ASIGNADO'),
(22178016, 'Indira', 'Cline', '2013', 'ASIGNADO'),
(24423529, 'Jeremy', 'Murray', '2015', 'ASIGNADO'),
(27159042, 'Hakeem', 'Knowles', '2006', 'No asignado'),
(36491606, 'Iliana', 'Shields', '2006', 'No asignado'),
(44294342, 'Joshua', 'Velazquez', '2016', 'No asignado');

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
(4, 'Primero Basico'),
(5, 'Segundo Basico'),
(10, 'Tercero Basico');

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
(1, 1, 0x2f75706c6f6164732f675265654e566957554746505952433575445a633031507a3042566f556f7a34787575644c586e63687a724c794865324e442d6e702e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `idMateria` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `asignacion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idProfesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idMateria`, `idCurso`, `nombre`, `estado`, `asignacion`, `idProfesor`) VALUES
(13, 4, 'fisica', 'activo', 'ASIGNADO', 6261631),
(14, 4, 'ingles', 'activo', 'ASIGNADO', 6341234),
(15, 4, 'lenguaje', 'activo', 'ASIGNADO', 6341234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `idAlumno` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `nota` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `promedio` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idAlumno`, `idMateria`, `nota`, `promedio`) VALUES
(6261631, 6, '0', '0'),
(6261631, 7, '0', '0'),
(6261631, 8, '0', '0'),
(8468829, 9, '0', '0'),
(10207009, 6, '0', '0'),
(10207009, 7, '0', '0'),
(10207009, 8, '0', '0'),
(19543644, 13, '0', '0'),
(19543644, 14, '0', '0'),
(19543644, 15, '0', '0'),
(22178016, 13, '0', '0'),
(22178016, 14, '0', '0'),
(22178016, 15, '0', '0');

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
(1, 'Noticia 1', '<p>La banca de inversi&oacute;n suspendi&oacute; la cobertura de las acciones de la empresa de veh&iacute;culos el&eacute;ctricos sin dar explicaci&oacute;n alguna.</p>\r\n\r\n<p><img alt=\"Elon Musk contrata al banco Morgan Stanley para sacar a Tesla de la bolsa\" src=\"https://cdni.rt.com/actualidad/public_images/2018.08/article/5b7f5c50e9180f9a7f8b4567.jpg\" /></p>\r\n\r\n<p>Elon Musk contrat&oacute; al banco Morgan Stanley para que lo ayude en su intento de sacar su empresa, Tesla, de la bolsa de valores, informa&nbsp;<a href=\"https://www.bloomberg.com/news/articles/2018-08-23/musk-is-said-to-hire-morgan-stanley-to-help-take-tesla-private\" target=\"_blank\">Bloomberg</a>&nbsp;citando a una persona familiarizada con el asunto.</p>\r\n\r\n<p>Seg&uacute;n especifica el medio, Morgan Stanley,&nbsp;uno de&nbsp;los<strong>&nbsp;20 mayores accionistas de Tesla</strong>&nbsp;&ndash;con una participaci&oacute;n del 0,6 %&ndash;, est&aacute; aconsejando a Musk y no a la compa&ntilde;&iacute;a, a su junta directiva ni a alg&uacute;n comit&eacute; especial&nbsp; formado para evaluar una potencial propuesta para sacar a Tesla de bolsa. Adem&aacute;s, el banco suspendi&oacute; el martes la cobertura de las acciones de la empresa de veh&iacute;culos el&eacute;ctricos,&nbsp;<strong>sin dar explicaci&oacute;n alguna</strong>.</p>\r\n\r\n<p>A principios de agosto, el director ejecutivo de Tesla caus&oacute; repentinas fluctuaciones de los precios de las acciones de la empresa al publicar un&nbsp;<a href=\"https://actualidad.rt.com/actualidad/284257-elon-musk-tesla-cotizar-bolsa\" target=\"_blank\">pol&eacute;mico tuit</a>. All&iacute; Musk afirm&oacute; que estaba considerando que su empresa dejara de cotizar en bolsa. Inicialmente, las acciones de Tesla&nbsp;<strong>subieron un 11 % para llegar a casi 380 d&oacute;lares</strong>&nbsp;tras el incendiario mensaje.</p>\r\n\r\n<p>Luego retrocedieron, perdiendo alrededor del 7 % en dos d&iacute;as, a medida que aumentaban las dudas sobre la viabilidad de la idea de Musk y sobre su declaraci&oacute;n de que ya hab&iacute;a fondos disponibles para ello.</p>', '2018-08-24 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idProfesor` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `asignacion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `nombre`, `apellido`, `asignacion`) VALUES
(6261631, 'Oleg', 'Serrano', 'ASIGNADO'),
(6341234, 'Manuel', 'Valenzuela', 'ASIGNADO'),
(7263526, 'Jose', 'Torres', 'ASIGNADO'),
(8468829, 'Abdul', 'Holman', ''),
(10207009, 'Priscilla', 'Bennett', ''),
(19543644, 'Raja', 'Wiggins', ''),
(22178016, 'Indira', 'Cline', ''),
(24423529, 'Jeremy', 'Murray', ''),
(27159042, 'Hakeem', 'Knowles', ''),
(36491606, 'Iliana', 'Shields', ''),
(44294342, 'Joshua', 'Velazquez', '');

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
(6261631, '8', '$2y$10$9Kk.dTkEv1z2bfzDAmDkw.hsop2Cig2kdHRWWX3u7R1ipzkUkYGny', 'Oleg', 'Serrano', 'tincidunt.dui@Inatpede.org', 'mujer', 27, 'alumno', 'activo', NULL, '2018-08-28 16:15:16', '2018-08-28 16:15:16'),
(6341234, '2', '$2y$10$FkvnRrCe1QewHqWa51kWYutfVpYpOcjlnhX4i9LX6uutp.rYMKFMy', 'Manuel', 'Valenzuela', 'manuel@gmail.com', 'hombre', 48, 'profesor', 'activo', 't5yddapRRZALHH5ptnPDn6EmojUu3Kc2PKBRe7HttoHELjTCY4eNRPX4o2d5', '2018-08-25 03:50:42', '2018-08-25 03:50:42'),
(7263526, '6', '$2y$10$ovxZyhtVVd670T8SO29zdOgk/HgRbySBihuyIem37UeIN2X.7IbZS', 'Jose', 'Torres', 'jtores@gmail.com', 'hombre', 38, 'profesor', 'activo', 'O7RgOZii9GZGd1xqF7JxNuKorM508MzCvNWbxRcFxJpnCuHDKgiPFyW1UGnm', '2018-08-25 03:50:42', '2018-08-25 03:50:42'),
(8468829, '0', '$2y$10$DQT/LAzYfbzKtDytgAs2Q.YzPf7rIhxp14h9O1SRjNNb9YdN7.X7u', 'Abdul', 'Holman', 'a.scelerisque.sed@imperdietdictummagna.co.uk', 'mujer', 21, 'alumno', 'activo', NULL, '2018-08-28 16:15:16', '2018-08-28 16:15:16'),
(10207009, '7', '$2y$10$2bAEpKUcYZ3lB7d/9iCaDOnE6bIqPdzrDCSjNS6BgMpu4iaZ6EoiS', 'Priscilla', 'Bennett', 'dignissim@Mauris.ca', 'hombre', 23, 'alumno', 'activo', NULL, '2018-08-28 16:15:15', '2018-08-28 16:15:15'),
(18273626, '5', '$2y$10$Jm7XN0mpmXX34KgqohlmyO1DZHvD8oqWT1lnogFPDRELb7254CvnC', 'Rodrigo', 'Ramirez', 'rodrigo@gmail.com', 'hombre', 50, 'admin', 'activo', 'fmNY01g3iq4Wbu1gZLeCyXzXxhaj87Q7pvVfTbvbFrlZfPSUu7mAWk2JPKej', '2017-05-26 03:11:07', '2017-05-26 03:11:07'),
(19543644, '4', '$2y$10$UpjNDAjP8Mx2fpq4LnQSC.8Rc6Lp1U.ds5.O68BkUNbq/wJZiQrA.', 'Raja', 'Wiggins', 'aliquet.odio@mauriseuelit.edu', 'mujer', 28, 'alumno', 'activo', NULL, '2018-08-28 16:15:16', '2018-08-28 16:15:16'),
(22178016, '7', '$2y$10$rRkJ7gpufXHxkGW16AiqUegJfNnWy.sitbbdT6bfwBl6l2pUh60bm', 'Indira', 'Cline', 'imperdiet.ornare@justo.org', 'mujer', 26, 'alumno', 'activo', NULL, '2018-08-28 16:15:15', '2018-08-28 16:15:15'),
(24423529, '8', '$2y$10$g1bZoVDO/Z0olJtWZI8rAe6SKOBnBXeGVh0JLBOAG9drhmucmauW6', 'Jeremy', 'Murray', 'pellentesque.tellus.sem@dapibus.org', 'mujer', 29, 'alumno', 'activo', NULL, '2018-08-28 16:15:15', '2018-08-28 16:15:15'),
(27159042, '3', '$2y$10$bM6XXSWcgg6BLSz6POHRqu8lY0LUzh5A2SJnqNr/5HVmeOQwR1Mla', 'Hakeem', 'Knowles', 'vitae.risus.Duis@euerosNam.edu', 'mujer', 24, 'alumno', 'activo', NULL, '2018-08-28 16:15:16', '2018-08-28 16:15:16'),
(36491606, 'K', '$2y$10$urwzxF2h/ID9bq5WAhJskOxhUc4eHlo2OkKkcG3gjJZ8XR0ET.GtK', 'Iliana', 'Shields', 'posuere.cubilia.Curae@massa.org', 'mujer', 24, 'alumno', 'activo', NULL, '2018-08-28 16:15:15', '2018-08-28 16:15:15'),
(44294342, '7', '$2y$10$xeuWVnItI2zRHIlkdKzfWOHyYOtNtvTq5i5zIr/rnKD.USmTV8RZS', 'Joshua', 'Velazquez', 'dolor.Quisque.tincidunt@commodo.co.uk', 'mujer', 26, 'alumno', 'activo', NULL, '2018-08-28 16:15:15', '2018-08-28 16:15:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idAlumno`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idMateria`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idAlumno`,`idMateria`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idProfesor`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

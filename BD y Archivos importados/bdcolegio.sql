-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2018 a las 04:34:31
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
  `estado_curso` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idAlumno`, `nombre`, `apellido`, `ingreso`, `asignacion`, `promedioFinal`, `estado_curso`) VALUES
(6261631, 'Oleg', 'Serrano', '2006', 'ASIGNADO', 0, 'A'),
(8468829, 'Abdul', 'Holman', '2013', 'ASIGNADO', 0, 'AM'),
(10207009, 'Priscilla', 'Bennett', '2017', 'ASIGNADO', 0, 'NA'),
(19543644, 'Raja', 'Wiggins', '2007', 'ASIGNADO', 0, 'NA'),
(22178016, 'Indira', 'Cline', '2013', 'ASIGNADO', 0, 'NA'),
(24423529, 'Jeremy', 'Murray', '2015', 'ASIGNADO', 0, 'NA'),
(27159042, 'Hakeem', 'Knowles', '2006', 'ASIGNADO', 0, 'NA'),
(36491606, 'Iliana', 'Shields', '2006', 'ASIGNADO', 0, 'NA'),
(44294342, 'Joshua', 'Velazquez', '2016', 'ASIGNADO', 0, 'NA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL,
  `grado` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idCurso`, `grado`, `year`) VALUES
(21, 'Primero Basico', 2018);

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
(1, 1, 0x2f75706c6f6164732f537333656866416b666b526f376a7059397a4a4c73356376756462584e4a316c655059366b723459306557367375386453512d6e65777370617065725f62772e6a7067),
(2, 2, 0x2f75706c6f6164732f6a414731743343556d7632585777766c5a34443934713144675a464832574c7468636e7251516155333233354c444d57764d2d6e312e6a7067);

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
(56, 21, 'Lenguaje y Comunicación', 'activo', 'ASIGNADO', 7263526),
(57, 21, 'Matemáticas', 'activo', 'ASIGNADO', 7263526),
(58, 21, 'Historia, Geografía y C. Sociales', 'activo', 'ASIGNADO', 7263526),
(59, 21, 'Ciencias Naturales', 'activo', 'ASIGNADO', 7263526),
(60, 21, 'Artes Visuales', 'activo', 'ASIGNADO', 7263526),
(61, 21, 'Música', 'activo', 'ASIGNADO', 7263526),
(62, 21, 'Educación Física', 'activo', 'ASIGNADO', 7263526),
(63, 21, 'Orientación y Consejo Curso', 'activo', 'ASIGNADO', 7263526),
(64, 21, 'Tecnología', 'activo', 'ASIGNADO', 7263526),
(65, 21, 'Religión', 'activo', 'ASIGNADO', 7263526);

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
  `n1` int(3) NOT NULL,
  `n2` int(200) NOT NULL,
  `n3` int(3) NOT NULL,
  `n4` int(3) NOT NULL,
  `n5` int(3) NOT NULL,
  `n6` int(3) NOT NULL,
  `n7` int(3) NOT NULL,
  `n8` int(3) NOT NULL,
  `n9` int(3) NOT NULL,
  `n10` int(3) NOT NULL,
  `n11` int(3) NOT NULL,
  `n12` int(3) NOT NULL,
  `promedio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idAlumno`, `idMateria`, `n1`, `n2`, `n3`, `n4`, `n5`, `n6`, `n7`, `n8`, `n9`, `n10`, `n11`, `n12`, `promedio`) VALUES
(6261631, 56, 69, 44, 60, 70, 24, 15, 69, 20, 0, 0, 0, 0, 31),
(6261631, 57, 40, 55, 60, 70, 0, 0, 0, 0, 0, 0, 0, 0, 28),
(6261631, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6261631, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6261631, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6261631, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6261631, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6261631, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6261631, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6261631, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8468829, 56, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8468829, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8468829, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8468829, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8468829, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8468829, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8468829, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8468829, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8468829, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8468829, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10207009, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10207009, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10207009, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10207009, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10207009, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10207009, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10207009, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10207009, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10207009, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10207009, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19543644, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19543644, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19543644, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19543644, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19543644, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19543644, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19543644, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19543644, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19543644, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19543644, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22178016, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22178016, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22178016, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22178016, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22178016, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22178016, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22178016, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22178016, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22178016, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22178016, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24423529, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24423529, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24423529, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24423529, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24423529, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24423529, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24423529, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24423529, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24423529, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24423529, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27159042, 56, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(27159042, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27159042, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27159042, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27159042, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27159042, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27159042, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27159042, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27159042, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27159042, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36491606, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36491606, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36491606, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36491606, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36491606, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36491606, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36491606, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36491606, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36491606, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36491606, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44294342, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44294342, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44294342, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44294342, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44294342, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44294342, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44294342, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44294342, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44294342, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44294342, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
(1, 'Noticia de Prueba', '<p>Noticia de prueba numero 1&nbsp;</p>', '2018-09-26 21:34:32'),
(2, 'Pentágono: China es un \"riesgo significativo y creciente\" para la industria de Defensa de EE.UU.', '<p>Un extenso informe elaborado por orden de Donald Trump detect&oacute; alrededor de 300 vulnerabilidades que podr&iacute;an afectar a materiales y componentes esenciales para el Ej&eacute;rcito norteamericano.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1>Pent&aacute;gono: China es un &quot;riesgo significativo y creciente&quot; para la industria de Defensa de EE.UU.</h1>\r\n\r\n<p>Publicado: 6 oct 2018 01:58 GMT</p>\r\n\r\n<p>Un extenso informe elaborado por orden de Donald Trump detect&oacute; alrededor de 300 vulnerabilidades que podr&iacute;an afectar a materiales y componentes esenciales para el Ej&eacute;rcito norteamericano.</p>\r\n\r\n<p>China representa una amenaza creciente para el suministro de materiales cr&iacute;ticos para el Ej&eacute;rcito de EE.UU., sostiente un extenso informe elaborado por el Pent&aacute;gono y publicado este viernes.</p>\r\n\r\n<p>El&nbsp;<a href=\"https://media.defense.gov/2018/Oct/05/2002048904/-1/-1/1/ASSESSING-AND-STRENGTHENING-THE-MANUFACTURING-AND-DEFENSE-INDUSTRIAL-BASE-AND-SUPPLY-CHAIN-RESILIENCY.PDF\" target=\"_blank\">informe</a>, de casi 150 p&aacute;ginas, busca identificar debilidades en las industrias estadounidenses que son vitales para la seguridad nacional. Encargado por una orden ejecutiva del presidente&nbsp;<a href=\"https://actualidad.rt.com/actualidad/167392-sepa-mas-donald-trump\" target=\"_blank\">Donald Trump</a>&nbsp;el a&ntilde;o pasado, el documento detect&oacute; en total alrededor de 300 &quot;vulnerabilidades&quot; que podr&iacute;an afectar a materiales y componentes esenciales para el Ej&eacute;rcito norteamericano.</p>\r\n\r\n<h3>&quot;Un riesgo significativo y creciente&quot;</h3>\r\n\r\n<p>Un &quot;hallazgo clave&quot; subrayado en ese texto es que China representa &quot;un riesgo significativo y creciente&quot; para el suministro de materiales y tecnolog&iacute;as &quot;considerados estrat&eacute;gicos y fundamentales para la seguridad nacional&quot; de EE.UU.</p>\r\n\r\n<p>&quot;El dominio del comercio&quot; de Pek&iacute;n y su disposici&oacute;n &quot;a&nbsp;<strong>utilizar el comercio como un arma</strong>&nbsp;de poder blando&quot; aumenta los riesgos que enfrenta la base industrial de manufactura y defensa de Estados Unidos, al tener que depender de &quot;un competidor estrat&eacute;gico para bienes, servicios y productos cr&iacute;ticos&quot;, detalla el informe.</p>\r\n\r\n<p><a href=\"https://actualidad.rt.com/actualidad/290974-ejercito-eeuu-informe-heritage\" target=\"_blank\"><img alt=\"\" src=\"https://cdni.rt.com/actualidad/public_images/2018.10/thumbnail/5bb6b89808f3d96f108b4567.jpg\" />&quot;Degradaci&oacute;n de la fuerza&quot;: &iquest;Podr&iacute;a EE.UU. luchar contra Rusia y China a la vez?</a></p>\r\n\r\n<p>Una de las preocupaciones destacadas es el dominio del pa&iacute;s asi&aacute;tico en el suministro mundial de minerales de tierras raras, fundamentales para los programas militares de EE.UU. El informe tambi&eacute;n hace hincapi&eacute; en el papel de China en el suministro de ciertos tipos de productos electr&oacute;nicos, as&iacute; como de productos qu&iacute;micos utilizados en las municiones estadounidenses.</p>\r\n\r\n<p>El documento proporciona una serie de recomendaciones para fortalecer la industria estadounidense, como la expansi&oacute;n de la inversi&oacute;n directa en sectores considerados cr&iacute;ticos. Otra de las sugerencias&nbsp;claves es &quot;diversificar la dependencia total de las fuentes de suministro con respecto a pa&iacute;ses pol&iacute;ticamente inestables que pueden<strong>&nbsp;cortarle el acceso a EE.UU.</strong>&quot;.</p>\r\n\r\n<h3>Tensi&oacute;n en aumento</h3>\r\n\r\n<p>El nuevo informe llega en el contexto de una escalada de tensiones entre ambas potencias&nbsp;en&nbsp;diversos &aacute;mbitos.</p>\r\n\r\n<ul>\r\n	<li>En el terreno pol&iacute;tico, el&nbsp;<a href=\"https://actualidad.rt.com/actualidad/289959-trump-pruebas-china-interferir-elecciones-eeuu\" target=\"_blank\">presidente</a>&nbsp;de EE.UU., Donald Trump, y su&nbsp;<a href=\"https://actualidad.rt.com/actualidad/290923-michael-pence-china-querer-superar-eeuu-pacifico\" target=\"_blank\">vicepresidente</a>, Mike Pence, acusaron a Pek&iacute;n de interferir en los asuntos internos y en el proceso electoral estadounidense, afirmaciones que China ha tachado de &quot;<a href=\"https://actualidad.rt.com/actualidad/290961-pence-calumniar-china-eeuu\" target=\"_blank\">calumnias</a>&quot;.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Por otro lado, la semana pasada&nbsp;estuvo marcada por una serie de incidentes en los mares de la China Meridional y Oriental, como&nbsp;<a href=\"https://actualidad.rt.com/actualidad/290008-bombardero-eeuu-mar-oriental-meridional-china\" target=\"_blank\">operaciones</a>&nbsp;de tr&aacute;nsito de bombarderos estadounidenses B-52 o un&nbsp;<a href=\"https://actualidad.rt.com/actualidad/290529-china-eeuu-destructor-spratly\" target=\"_blank\">encuentro</a>&nbsp;poco amistoso entre el destructor norteamericano USS Decatur y un destructor chino de clase Luyang, cerca de las islas Spratly.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Estos incidentes tienen lugar en medio de la batalla comercial entre los dos pa&iacute;ses y de las recientes&nbsp;<a href=\"https://actualidad.rt.com/actualidad/289244-eeuu-impone-nuevas-sanciones-rusia\" target=\"_blank\">sanciones</a>&nbsp;estadounidenses contra el complejo industrial militar chino, as&iacute; como del apoyo militar que Washington presta a Taiw&aacute;n,&nbsp;considerado por Pek&iacute;n como una parte integral de China.</li>\r\n</ul>', '2018-10-05 23:27:33');

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
(6261631, '8', '$2y$10$efClcTVJG0S6SbOvivIshuyygFc5fhe5RIYfheQvEN.atEnKNRKzS', 'Oleg', 'Serrano', 'tincidunt.dui@Inatpede.org', 'mujer', 27, 'alumno', 'activo', NULL, '2018-10-04 17:36:29', '2018-10-04 17:36:29'),
(7263526, '6', '$2y$10$GPiOw3XDFpMcRKw5tVScJ.vPoTOFB7ZloI/0mS9pdeRodwTLdY3W.', 'Jose', 'Torres', 'jtores@gmail.com', 'hombre', 38, 'profesor', 'activo', 'tOmXhlHAzlZlL7KKpbUN0AwiwOsPo0OVoKk2U5edXUZFxjeKWQBGJ56M3m9Y', '2018-09-24 01:22:45', '2018-09-24 01:22:45'),
(8468829, '0', '$2y$10$0rZ59IPVMk1jEFUUHiqUYut6bL6kyxQpEH86iO.T60eebKjxXdQkG', 'Abdul', 'Holman', 'a.scelerisque.sed@imperdietdictummagna.co.uk', 'mujer', 21, 'alumno', 'activo', NULL, '2018-10-04 17:36:29', '2018-10-04 17:36:29'),
(10207009, '7', '$2y$10$odOygpBrWWq2kfcAhVgQ6unPVDQ.k3a0QZfvXtTxwzmBoJRPkWNS2', 'Priscilla', 'Bennett', 'dignissim@Mauris.ca', 'hombre', 23, 'alumno', 'activo', NULL, '2018-10-04 17:36:28', '2018-10-04 17:36:28'),
(18273626, '5', '$2y$10$Jm7XN0mpmXX34KgqohlmyO1DZHvD8oqWT1lnogFPDRELb7254CvnC', 'Rodrigo', 'Ramirez', 'rodrigo@gmail.com', 'hombre', 50, 'admin', 'activo', 'MNJb7iTqR2Q5jGuTfvmUKPhY4wOwa39z0z0HiES5pIUC3Ry0YPwCQmEsZSWw', '2017-05-26 03:11:07', '2017-05-26 03:11:07'),
(19543644, '4', '$2y$10$zS/Oe14t4ucY.QgkXrzREuSXYHrtJHefnZBnwvSQVQhBO6Y7vX502', 'Raja', 'Wiggins', 'aliquet.odio@mauriseuelit.edu', 'mujer', 28, 'alumno', 'activo', NULL, '2018-10-04 17:36:29', '2018-10-04 17:36:29'),
(22178016, '7', '$2y$10$hCOwmYzlBbP4msTS/Rz2LO/dhj23kgZnBRfNxHMGpscdFIy3GR6wK', 'Indira', 'Cline', 'imperdiet.ornare@justo.org', 'mujer', 26, 'alumno', 'activo', NULL, '2018-10-04 17:36:29', '2018-10-04 17:36:29'),
(24423529, '8', '$2y$10$rUbV0W5U1z82XrdTMKwmgODHqEfw.FI0lrL0TuujMFrY24GbQPZv6', 'Jeremy', 'Murray', 'pellentesque.tellus.sem@dapibus.org', 'mujer', 29, 'alumno', 'activo', NULL, '2018-10-04 17:36:28', '2018-10-04 17:36:28'),
(27159042, '3', '$2y$10$2fGhwNtgjGSBbiuMOb3rE.XLbvn7lxZBbVn0INsOkiFLCBbn1Iskm', 'Hakeem', 'Knowles', 'vitae.risus.Duis@euerosNam.edu', 'mujer', 24, 'alumno', 'activo', NULL, '2018-10-04 17:36:29', '2018-10-04 17:36:29'),
(36491606, 'K', '$2y$10$tkMwN7SNM3uyw7MpJOyz2uxoEYOxdEAAnat7fffxdCM2RBz/ab712', 'Iliana', 'Shields', 'posuere.cubilia.Curae@massa.org', 'mujer', 24, 'alumno', 'activo', NULL, '2018-10-04 17:36:29', '2018-10-04 17:36:29'),
(44294342, '7', '$2y$10$1mz9D0mNeN1z2mfIKptNE.1NXcVBQw7nxVdNSDhyQDx7OaqDhq9sS', 'Joshua', 'Velazquez', 'dolor.Quisque.tincidunt@commodo.co.uk', 'mujer', 26, 'alumno', 'activo', NULL, '2018-10-04 17:36:29', '2018-10-04 17:36:29');

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
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

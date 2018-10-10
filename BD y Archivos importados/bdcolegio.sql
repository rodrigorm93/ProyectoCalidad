-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2018 a las 05:02:42
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
(5292891, 'Bevis', 'Nicholson', '2018', 'ASIGNADO', 0, ''),
(5856559, 'Rosalyn', 'Duncan', '2018', 'No Asignado', 0, 'NA'),
(5901893, 'Hu', 'Fischer', '2018', 'ASIGNADO', 0, ''),
(6196953, 'Inez', 'Giles', '2018', 'ASIGNADO', 0, ''),
(6785357, 'Leila', 'Bennett', '2018', 'No Asignado', 0, 'NA'),
(6839078, 'Craig', 'Phelps', '2018', 'No Asignado', 0, 'NA'),
(7038406, 'Alec', 'Hardy', '2018', 'ASIGNADO', 0, ''),
(7418898, 'Kasper', 'Merritt', '2018', 'ASIGNADO', 0, ''),
(7701948, 'Cadman', 'Hyde', '2018', 'No Asignado', 0, 'NA'),
(8690115, 'Phoebe', 'Whitney', '2018', 'No Asignado', 0, 'NA'),
(12190721, 'Donovan', 'Gillespie', '2018', 'ASIGNADO', 0, ''),
(12374914, 'Brendan', 'Burke', '2018', 'ASIGNADO', 0, ''),
(12582730, 'Rachel', 'Zimmerman', '2018', 'No Asignado', 0, 'NA'),
(12620605, 'Blair', 'Mcintyre', '2018', 'ASIGNADO', 0, ''),
(12629557, 'Illiana', 'Marks', '2018', 'No Asignado', 0, 'NA'),
(13739103, 'Melvin', 'Wilson', '2018', 'No Asignado', 0, 'NA'),
(14111736, 'Barry', 'Woodward', '2018', 'No Asignado', 0, 'NA'),
(14455086, 'Emerson', 'Wallace', '2018', 'No Asignado', 0, 'NA'),
(16196882, 'Erin', 'Cote', '2018', 'ASIGNADO', 0, ''),
(16805591, 'Gil', 'Wilkinson', '2018', 'No Asignado', 0, 'NA'),
(17293540, 'Arsenio', 'Ware', '2018', 'ASIGNADO', 0, ''),
(18368082, 'Bradley', 'Owens', '2018', 'No Asignado', 0, 'NA'),
(18864072, 'Tyler', 'Booker', '2018', 'ASIGNADO', 0, ''),
(20557648, 'Damon', 'Frank', '2018', 'ASIGNADO', 0, ''),
(22062621, 'Shelley', 'Mathis', '2018', 'ASIGNADO', 0, ''),
(22557708, 'Beck', 'Mathis', '2018', 'No Asignado', 0, 'NA'),
(22908203, 'August', 'Wilkins', '2018', 'ASIGNADO', 0, ''),
(23169382, 'Knox', 'Williams', '2018', 'ASIGNADO', 0, ''),
(23745379, 'Ursa', 'Roman', '2018', 'No Asignado', 0, 'NA'),
(24755933, 'Coby', 'Vincent', '2018', 'No Asignado', 0, 'NA'),
(25643623, 'Kirby', 'Reeves', '2018', 'No Asignado', 0, 'NA'),
(26736062, 'Gannon', 'Miller', '2018', 'No Asignado', 0, 'NA'),
(26938577, 'Timon', 'Burch', '2018', 'No Asignado', 0, 'NA'),
(27346112, 'Evelyn', 'Kelley', '2018', 'ASIGNADO', 0, ''),
(28307932, 'Myra', 'Lambert', '2018', 'No Asignado', 0, 'NA'),
(28334360, 'Brenna', 'Carney', '2018', 'ASIGNADO', 0, ''),
(28439782, 'Quincy', 'Collier', '2018', 'ASIGNADO', 0, ''),
(29681983, 'Anika', 'Suarez', '2018', 'No Asignado', 0, 'NA'),
(30368189, 'Heidi', 'Delaney', '2018', 'ASIGNADO', 0, ''),
(32286346, 'Isaiah', 'Bender', '2018', 'No Asignado', 0, 'NA'),
(32361832, 'Blair', 'Harding', '2018', 'ASIGNADO', 0, ''),
(32735286, 'Ishmael', 'Chaney', '2018', 'No Asignado', 0, 'NA'),
(33233218, 'Lilah', 'Benson', '2018', 'ASIGNADO', 0, ''),
(34243035, 'Wesley', 'Barry', '2018', 'ASIGNADO', 0, ''),
(34397899, 'Zane', 'Melton', '2018', 'ASIGNADO', 0, ''),
(34434224, 'Aline', 'Peters', '2018', 'No Asignado', 40, 'PA'),
(36181439, 'Stephen', 'Guthrie', '2018', 'No Asignado', 0, 'NA'),
(36974988, 'Kato', 'Wiggins', '2018', 'No Asignado', 0, 'NA'),
(37182544, 'Kuame', 'Harris', '2018', 'No Asignado', 0, 'NA'),
(37927933, 'Willa', 'Britt', '2018', 'No Asignado', 0, 'NA'),
(38338260, 'Honorato', 'Duran', '2018', 'ASIGNADO', 0, ''),
(38856106, 'Dante', 'Stanley', '2018', 'No Asignado', 0, 'NA'),
(38868655, 'Myles', 'Blanchard', '2018', 'No Asignado', 0, 'NA'),
(39923937, 'Martin', 'Velasquez', '2018', 'No Asignado', 0, 'NA'),
(42901136, 'Kirestin', 'Petersen', '2018', 'No Asignado', 0, 'NA'),
(43189374, 'Callum', 'Barlow', '2018', 'No Asignado', 48, 'A'),
(43456833, 'Sebastian', 'Ratliff', '2018', 'No Asignado', 0, 'NA'),
(43463914, 'Alexa', 'Walsh', '2018', 'ASIGNADO', 0, ''),
(43767613, 'Haviva', 'Davidson', '2018', 'ASIGNADO', 0, ''),
(44380807, 'Len', 'Knox', '2018', 'No Asignado', 0, 'NA'),
(44422171, 'Zane', 'Burns', '2018', 'ASIGNADO', 0, ''),
(46628870, 'Cyrus', 'Cline', '2018', 'ASIGNADO', 0, ''),
(47253755, 'Emily', 'Gentry', '2018', 'ASIGNADO', 0, ''),
(48639362, 'Portia', 'Hammond', '2018', 'No Asignado', 0, 'NA'),
(49248242, 'Lyle', 'Whitehead', '2018', 'No Asignado', 40, 'PA'),
(49377896, 'Akeem', 'Woodward', '2018', 'No Asignado', 20, 'NA'),
(50035847, 'Oscar', 'Holder', '2018', 'ASIGNADO', 0, ''),
(50316120, 'Carlos', 'Banks', '2018', 'ASIGNADO', 0, '');

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
(16, 4, 0x2f75706c6f6164732f39373871457874367269545a70684c4335624673746e32413543506c7a694f774238705332767865704e445a6242365631732d6e332e6a7067);

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
  `idProfesor` int(11) NOT NULL,
  `numeroNotas` int(4) NOT NULL,
  `semestre` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idMateria`, `idCurso`, `nombre`, `estado`, `asignacion`, `idProfesor`, `numeroNotas`, `semestre`) VALUES
(56, 21, 'Lenguaje y Comunicación', 'activo', 'ASIGNADO', 7263526, 12, 2),
(57, 21, 'Matemáticas', 'activo', 'ASIGNADO', 7263526, 8, 2),
(58, 21, 'Historia, Geografía y C. Sociales', 'activo', 'ASIGNADO', 7263526, 8, 2),
(59, 21, 'Ciencias Naturales', 'activo', 'ASIGNADO', 7263526, 6, 2),
(60, 21, 'Artes Visuales', 'activo', 'ASIGNADO', 7263526, 8, 0),
(61, 21, 'Música', 'activo', 'ASIGNADO', 7263526, 8, 2),
(62, 21, 'Educación Física', 'activo', 'ASIGNADO', 7263526, 8, 0),
(63, 21, 'Orientación y Consejo Curso', 'activo', 'ASIGNADO', 7263526, 8, 0),
(64, 21, 'Tecnología', 'activo', 'ASIGNADO', 7263526, 8, 0),
(65, 21, 'Religión', 'activo', 'ASIGNADO', 7263526, 8, 0),
(66, 21, 'PRUEBA1', 'activo', 'ASIGNADO', 7263526, 12, 2);

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
  `n1` int(4) NOT NULL,
  `n2` int(4) NOT NULL,
  `n3` int(4) NOT NULL,
  `n4` int(4) NOT NULL,
  `n5` int(4) NOT NULL,
  `n6` int(4) NOT NULL,
  `n7` int(3) NOT NULL,
  `n8` int(4) NOT NULL,
  `n9` int(4) NOT NULL,
  `n10` int(4) NOT NULL,
  `n11` int(4) NOT NULL,
  `n12` int(4) NOT NULL,
  `promedio` int(4) NOT NULL,
  `promedio_s1` int(3) NOT NULL,
  `promedio_s2` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idAlumno`, `idMateria`, `n1`, `n2`, `n3`, `n4`, `n5`, `n6`, `n7`, `n8`, `n9`, `n10`, `n11`, `n12`, `promedio`, `promedio_s1`, `promedio_s2`) VALUES
(5292891, 56, 40, 40, 40, 40, 40, 40, 65, 40, 40, 40, 40, 39, 42, 40, 44),
(5292891, 57, 0, 0, 0, 0, 48, 40, 60, 60, 0, 0, 0, 0, 26, 0, 52),
(5292891, 58, 0, 0, 0, 0, 40, 40, 0, 0, 0, 0, 0, 0, 10, 0, 20),
(5292891, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5292891, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5292891, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5292891, 62, 0, 0, 0, 0, 40, 55, 0, 0, 0, 0, 0, 0, 12, 0, 24),
(5292891, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5292891, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5292891, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5901893, 56, 0, 0, 0, 0, 0, 0, 40, 45, 0, 0, 0, 0, 7, 0, 14),
(5901893, 57, 0, 0, 0, 0, 55, 45, 20, 0, 0, 0, 0, 0, 15, 0, 30),
(5901893, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5901893, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5901893, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5901893, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5901893, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5901893, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5901893, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5901893, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6196953, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6196953, 57, 0, 0, 0, 0, 70, 45, 20, 0, 0, 0, 0, 0, 17, 0, 34),
(6196953, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6196953, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6196953, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6196953, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6196953, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6196953, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6196953, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6196953, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7038406, 56, 0, 0, 0, 0, 0, 0, 44, 55, 0, 0, 0, 0, 8, 0, 16),
(7038406, 57, 0, 0, 0, 0, 55, 55, 60, 40, 0, 0, 0, 0, 26, 0, 52),
(7038406, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7038406, 59, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 0, 0, 7, 0, 13),
(7038406, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7038406, 61, 0, 0, 0, 0, 70, 60, 60, 60, 0, 0, 0, 0, 31, 0, 62),
(7038406, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7038406, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7038406, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7038406, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7418898, 56, 0, 0, 0, 0, 0, 0, 55, 0, 0, 0, 0, 0, 5, 0, 9),
(7418898, 57, 0, 0, 0, 0, 20, 40, 55, 0, 0, 0, 0, 0, 14, 0, 29),
(7418898, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7418898, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7418898, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7418898, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7418898, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7418898, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7418898, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7418898, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12190721, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12190721, 57, 0, 0, 0, 0, 40, 50, 60, 0, 0, 0, 0, 0, 19, 0, 38),
(12190721, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12190721, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12190721, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12190721, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12190721, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12190721, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12190721, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12190721, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12374914, 56, 0, 0, 0, 0, 0, 0, 60, 65, 60, 61, 62, 61, 31, 0, 62),
(12374914, 57, 0, 0, 0, 0, 40, 50, 0, 0, 0, 0, 0, 0, 11, 0, 22),
(12374914, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12374914, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12374914, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12374914, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12374914, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12374914, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12374914, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12374914, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12620605, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12620605, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12620605, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12620605, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12620605, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12620605, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12620605, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12620605, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12620605, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12620605, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16196882, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16196882, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16196882, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16196882, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16196882, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16196882, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16196882, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16196882, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16196882, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16196882, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17293540, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17293540, 57, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 0, 5, 0, 10),
(17293540, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17293540, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17293540, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17293540, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17293540, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17293540, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17293540, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17293540, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18864072, 56, 0, 0, 0, 0, 0, 0, 45, 45, 45, 45, 45, 45, 22, 0, 45),
(18864072, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18864072, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18864072, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18864072, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18864072, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18864072, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18864072, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18864072, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18864072, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20557648, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20557648, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20557648, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20557648, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20557648, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20557648, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20557648, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20557648, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20557648, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20557648, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22062621, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22062621, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22062621, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22062621, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22062621, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22062621, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22062621, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22062621, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22062621, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22062621, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22908203, 56, 0, 0, 0, 0, 0, 0, 48, 0, 0, 0, 0, 0, 4, 0, 8),
(22908203, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22908203, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22908203, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22908203, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22908203, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22908203, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22908203, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22908203, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22908203, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23169382, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23169382, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23169382, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23169382, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23169382, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23169382, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23169382, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23169382, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23169382, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23169382, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27346112, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27346112, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27346112, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27346112, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27346112, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27346112, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27346112, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27346112, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27346112, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27346112, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28334360, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28334360, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28334360, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28334360, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28334360, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28334360, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28334360, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28334360, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28334360, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28334360, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28439782, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28439782, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28439782, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28439782, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28439782, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28439782, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28439782, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28439782, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28439782, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28439782, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30368189, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30368189, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30368189, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30368189, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30368189, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30368189, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30368189, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30368189, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30368189, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30368189, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32361832, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32361832, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32361832, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32361832, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32361832, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32361832, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32361832, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32361832, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32361832, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32361832, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33233218, 56, 0, 0, 0, 0, 0, 0, 45, 60, 30, 60, 40, 55, 24, 0, 48),
(33233218, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33233218, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33233218, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33233218, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33233218, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33233218, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33233218, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33233218, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33233218, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34243035, 56, 40, 40, 40, 40, 40, 40, 45, 65, 20, 40, 50, 60, 43, 40, 47),
(34243035, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34243035, 58, 0, 0, 0, 0, 55, 60, 40, 45, 0, 0, 0, 0, 25, 0, 50),
(34243035, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34243035, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34243035, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34243035, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34243035, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34243035, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34243035, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34397899, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34397899, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34397899, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34397899, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34397899, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34397899, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34397899, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34397899, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34397899, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34397899, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38338260, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38338260, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38338260, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38338260, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38338260, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38338260, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38338260, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38338260, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38338260, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38338260, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43463914, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43463914, 57, 0, 0, 0, 0, 40, 40, 40, 40, 0, 0, 0, 0, 20, 0, 40),
(43463914, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43463914, 59, 0, 0, 0, 55, 60, 40, 0, 0, 0, 0, 0, 0, 26, 0, 52),
(43463914, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43463914, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43463914, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43463914, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43463914, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43463914, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43767613, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43767613, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43767613, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43767613, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43767613, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43767613, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43767613, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43767613, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43767613, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43767613, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44422171, 56, 0, 0, 0, 0, 0, 0, 55, 55, 55, 55, 55, 55, 28, 0, 55),
(44422171, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44422171, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44422171, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44422171, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44422171, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44422171, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44422171, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44422171, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44422171, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46628870, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46628870, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46628870, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46628870, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46628870, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46628870, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46628870, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46628870, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46628870, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46628870, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47253755, 56, 0, 0, 0, 0, 0, 0, 40, 40, 40, 40, 40, 40, 20, 0, 40),
(47253755, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47253755, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47253755, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47253755, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47253755, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47253755, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47253755, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47253755, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47253755, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50035847, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50035847, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50035847, 58, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50035847, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50035847, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50035847, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50035847, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50035847, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50035847, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50035847, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50316120, 56, 45, 60, 40, 40, 0, 0, 45, 65, 40, 55, 55, 60, 42, 31, 53),
(50316120, 57, 30, 40, 40, 55, 0, 0, 0, 0, 0, 0, 0, 0, 0, 41, 0),
(50316120, 58, 0, 0, 0, 0, 40, 40, 48, 50, 0, 0, 0, 0, 22, 0, 44),
(50316120, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50316120, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50316120, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50316120, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50316120, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50316120, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50316120, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
(4, 'Renacentistas en la era del conocimiento [edit]', '<p>Seg&uacute;n Klaus Schwab, presidente y fundador del Foro Econ&oacute;mico Mundial, hay tres razones, expuestas en su libro&nbsp;<a href=\"https://www.weforum.org/pages/the-fourth-industrial-revolution-by-klaus-schwab/\"><em>La&nbsp;</em><em>c</em><em>uarta&nbsp;</em><em>r</em><em>evoluci&oacute;n&nbsp;</em><em>i</em><em>ndustrial</em></a>, por las que las transformaciones actuales no representan una prolongaci&oacute;n de la tercera revoluci&oacute;n industrial, sino la llegada de una distinta: la velocidad, el alcance y el impacto en los sistemas. Estas razones y el entorno VUCA en que llevamos bastantes a&ntilde;os inmersos nos retan a ser renacentistas, con capacidad, por tanto, de integrar varias disciplinas con la cada vez m&aacute;s demandada visi&oacute;n de conjunto.</p>\r\n\r\n<p>Un ejemplo lo tenemos en el &aacute;mbito de la salud: los m&eacute;dicos internistas son los expertos a quienes recurren los m&eacute;dicos de atenci&oacute;n primaria y el resto de especialistas para atender a enfermos complejos, afectados por varias enfermedades o que presentan s&iacute;ntomas en varios &oacute;rganos, aparatos o sistemas del organismo.</p>\r\n\r\n<p>Y en el complejo &aacute;mbito tecnol&oacute;gico actual destaca la ingenier&iacute;a de sistemas que, como metodolog&iacute;a, se caracteriza por su enfoque interdisciplinario y su estilo hol&iacute;stico (general-global-integral), lo que hace que sus profesionales formen tambi&eacute;n parte de este tratamiento renacentista. El origen del t&eacute;rmino ingenier&iacute;a de sistemas se remonta a los Laboratorios Bell (ahora Lucent Technologies) en la d&eacute;cada de 1940 y surge de la necesidad de identificar y manipular las propiedades de un sistema como un todo. En proyectos de ingenier&iacute;a complejos queda patente la ley sist&eacute;mica<strong>: &rdquo;un</strong><strong>&nbsp;sistema representa m&aacute;s que la suma de sus componentes&rdquo;</strong>.</p>\r\n\r\n<p>Al igual que los avances cient&iacute;ficos e industriales del siglo XIX y principios del XX impulsaron la especializaci&oacute;n,&nbsp;<strong>en la actualidad,&nbsp;</strong>con el vertiginoso avance de la tecnolog&iacute;a, los entornos colaborativos y el mundo hiperconectado,&nbsp;<strong>no tenemos capacidad para aprehender todo el saber puesto a nuestra disposici&oacute;n</strong>. Y, aunque podamos pensar que la separaci&oacute;n entre ciencias y humanidades ha existido desde siempre, sin embargo, tuvo lugar a finales del siglo XIX, durante el Romanticismo, precisamente coincidiendo con dicha especializaci&oacute;n. Dejando las discrepancias entre las disciplinas y los m&eacute;todos utilizados, su separaci&oacute;n lo que s&iacute; hace es limitar las posibilidades de ampliar conocimientos, lograr nuevas metas y dificulta que como profesionales seamos m&aacute;s empleables.</p>\r\n\r\n<p>Pero en esta cuarta revoluci&oacute;n la&nbsp;<strong>innovaci&oacute;n</strong>&nbsp;es clave y, si bien hasta no hace mucho los analistas consideraban que &eacute;sta estaba directamente relacionada con las disciplinas&nbsp;<strong>STEM,</strong>&nbsp;podemos contextualizar esta idea&nbsp;<strong>como un&nbsp;<a href=\"https://aunclicdelastic.blogthinkbig.com/ciencias-o-letras/\" target=\"_blank\">pensamiento romanticista.</a></strong></p>\r\n\r\n<p>Leonardo Da Vinci ya dec&iacute;a que &ldquo;el arte es el rey de todas las ciencias a la hora de comunicar conocimiento a todas las generaciones del mundo&rdquo;<em>.&nbsp;</em>Esa letra &ldquo;A&rdquo; (de Arte) que nos hace m&aacute;s renacentistas, formar&iacute;a parte de la ecuaci&oacute;n m&aacute;gica&nbsp;<strong><em>Innovaci&oacute;n = Artes + Ciencias,&nbsp;</em></strong>y esa A completar&iacute;a el acr&oacute;nimo STEM para convertirlo en&nbsp;<strong><a href=\"https://aunclicdelastic.blogthinkbig.com/el-reto-de-la-educacion-digital-pasa-por-combinar-disciplinas-stem-y-humanisticas/\" target=\"_blank\">STEAM</a></strong>.&nbsp;<strong>Los objetivos de STEAM son b&aacute;sicamente integrar el arte y el dise&ntilde;o en la formaci&oacute;n cient&iacute;fica&nbsp;</strong>a imagen del&nbsp;<strong>Renacimiento, cuando las humanidades y las ciencias se conceb&iacute;an como parte de un conocimiento com&uacute;n.</strong>STEAM propugna que humanistas y cient&iacute;ficos abanderen una misma identidad, sus competencias sumen y ambos adquieran competencias digitales para desenvolverse con &eacute;xito en la nueva&nbsp;<strong>sociedad del conocimiento</strong>. Este enfoque representa un valor diferencial en el&nbsp;<strong>espacio de innovaci&oacute;n en el que a partir de ahora deberemos movernos y un avance exponencial para esta industria 4.0 y los nuevos trabajos del futuro</strong>. Lo vemos, por ejemplo, con los&nbsp;<a href=\"https://aunclicdelastic.blogthinkbig.com/big-data-y-los-chicos-de-los-algoritmos-como-objeto-de-deseo/\" target=\"_blank\">cient&iacute;ficos de datos</a>, cuyo perfil debe ser multidisciplinar. No basta con que sean matem&aacute;ticos, tienen que conocer programaci&oacute;n, saber del negocio, tener car&aacute;cter visionario&hellip;</p>\r\n\r\n<p>Por todo ello es muy importante introducir y potenciar desde primaria las ense&ntilde;anzas STEAM en nuestro sistema educativo y seguir siendo&nbsp;<strong><a href=\"https://aunclicdelastic.blogthinkbig.com/aprendices-permanentes-en-el-siglo-xxi/\" target=\"_blank\">aprendices permanentes en el siglo XXI</a></strong><strong>.</strong></p>\r\n\r\n<p>&quot; rows=&quot;7&quot; required&gt;</p>', '2018-10-09 23:52:04');

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
(174582, 'marcelo', 'lagos'),
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
  `genero` int(1) NOT NULL,
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
(174582, '9', '$2y$10$98PuMvnEIbIVvFBue7JvNelbsCgFf55S6EPKwFQYpP77todR3Bzaq', 'marcelo', 'lagos', 'marcelo@gmail.com', 1, 52, 'profesor', 'activo', 'XSw8dhlmjh5S1gNXODRJ9pvgTu7f2tmlP2ApbM94epz3SYfjKxHSOSe1RYQE', '2018-10-09 02:38:14', '2018-10-09 02:38:14'),
(5292891, '5', '$2y$10$rsSbWn/xKjpTtIBsvu8JruMxog1qpy1zWQfGhCTdrmQYUhLfiR722', 'Bevis', 'Nicholson', 'feugiat@idmollis.org', 0, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:22', '2018-10-06 14:36:22'),
(5856559, '8', '$2y$10$8ngm6.2z8auDKYedXggImuyJ/xVJU2YbCWYSVX79owSGCWYU6p7j6', 'Rosalyn', 'Duncan', 'montes@enimgravida.com', 0, 6, 'alumno', 'activo', NULL, '2018-10-07 20:43:28', '2018-10-07 20:43:28'),
(5901893, '0', '$2y$10$RSisFhSbHPo5RjCnh5ZeAef6gaBKq/lB5i7XHYoTYYtBNHIgI5nXC', 'Hu', 'Fischer', 'senectus.et.netus@ridiculusmusProin.ca', 1, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:22', '2018-10-06 14:36:22'),
(6196953, '5', '$2y$10$8IuBnRK0mcgRn.DAjX1.hObxoyBUiRsnNp8Jbu0LuFjsY/Zk1A7JG', 'Inez', 'Giles', 'ac.eleifend@nonquamPellentesque.co.uk', 1, 6, 'alumno', 'activo', NULL, '2018-10-06 14:36:22', '2018-10-06 14:36:22'),
(6785357, '1', '$2y$10$Tfc435.gGCjCzblk0siLiOSRDFVxlKaLoPCYg3mDU7QTdnf1926xS', 'Leila', 'Bennett', 'Quisque@Nunccommodo.com', 1, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:30', '2018-10-07 20:43:30'),
(6839078, '8', '$2y$10$c2..sRm.uFRTSZIVaGbPn.48kofRC/0E6nZyDqP5xShQRA1a9s1ue', 'Craig', 'Phelps', 'fermentum.metus.Aenean@Pellentesquehabitant.co.uk', 1, 6, 'alumno', 'activo', NULL, '2018-10-07 20:43:29', '2018-10-07 20:43:29'),
(7038406, 'K', '$2y$10$7.VU.Pp8fWNNai9np/YbKO9EuaAE8GVFb/RSPJS3bn5tbbMAgajcu', 'Alec', 'Hardy', 'turpis@nibh.net', 0, 6, 'alumno', 'activo', NULL, '2018-10-06 14:36:22', '2018-10-06 14:36:22'),
(7263526, '6', '$2y$10$GPiOw3XDFpMcRKw5tVScJ.vPoTOFB7ZloI/0mS9pdeRodwTLdY3W.', 'Jose', 'Torres', 'jtores@gmail.com', 0, 38, 'profesor', 'activo', 'G1pCupfDzNAAAEsBwyKq0DNnvMBHuANTvlWDW1kC2WlgIWzRsjxj8Ev5OpVD', '2018-09-24 01:22:45', '2018-09-24 01:22:45'),
(7418898, '2', '$2y$10$OhnaCxp4CUjRN.n7cALc3erzafMFOtH/CdmYXJHbssHOu64NQDhtK', 'Kasper', 'Merritt', 'cursus.non@eratvitae.org', 0, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:21', '2018-10-06 14:36:21'),
(7701948, '0', '$2y$10$yiL7lgh3xP.uoXRhdTUjqOSItToEref0.GHNS8Lr3DYpPfqlGVTou', 'Cadman', 'Hyde', 'elementum@milacinia.co.uk', 1, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:29', '2018-10-07 20:43:29'),
(8690115, '3', '$2y$10$8mFBdvxxMJDsCTwBZgdSJuQP/C61z3soNUK1VWN60ReJWsh58eu46', 'Phoebe', 'Whitney', 'posuere@luctusipsumleo.edu', 0, 6, 'alumno', 'activo', NULL, '2018-10-07 20:43:29', '2018-10-07 20:43:29'),
(12190721, '6', '$2y$10$p8Vc8qYSIGg8kF4cY.uYGu5AkxLRtenG5sfta13aIx50dMJ1vLFpO', 'Donovan', 'Gillespie', 'blandit@elit.edu', 0, 6, 'alumno', 'activo', NULL, '2018-10-06 14:36:21', '2018-10-06 14:36:21'),
(12374914, '6', '$2y$10$L2tpmths1USHoldw6mLKN.xew1czy.1OyOalKrX1bswb4nneVaJhy', 'Brendan', 'Burke', 'Nam@tempor.ca', 0, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:22', '2018-10-06 14:36:22'),
(12582730, '6', '$2y$10$TlK0CnHbddik0I2lOS4yde2yzHgwDqCkh99b.paHjmqCj2LClR5kO', 'Rachel', 'Zimmerman', 'pretium.neque.Morbi@in.com', 0, 6, 'alumno', 'activo', NULL, '2018-10-07 20:43:30', '2018-10-07 20:43:30'),
(12620605, '4', '$2y$10$brfS8ZR.zBXHefrMDqMgyOeuItaGQp1KC9VjGEm3Rtg14d3aPpx.G', 'Blair', 'Mcintyre', 'lobortis.ultrices@sitamet.edu', 1, 7, 'alumno', 'activo', NULL, '2018-10-06 14:36:21', '2018-10-06 14:36:21'),
(12629557, 'K', '$2y$10$4p9OdVW8X0Bo78yoZ9/teeRNbnPpdrEN7HpMSBhOJoH0yA9lPYvYG', 'Illiana', 'Marks', 'quis.turpis.vitae@nisiaodio.ca', 1, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:28', '2018-10-07 20:43:28'),
(13739103, '1', '$2y$10$O1Y3KVJtxIHG68J2.BEZ4eYVMEPCMM8OvhrGIYLMgEuBN7gwR4ey6', 'Melvin', 'Wilson', 'congue@netuset.com', 0, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:30', '2018-10-07 20:43:30'),
(14111736, 'K', '$2y$10$XgxTMnGr7An6p8G3KGMbyO/Pyci1sfPK.7HiuB97Z4jpZGjBdc6yW', 'Barry', 'Woodward', 'posuere.enim.nisl@nascetur.org', 1, 6, 'alumno', 'activo', NULL, '2018-10-07 20:43:28', '2018-10-07 20:43:28'),
(14455086, '2', '$2y$10$je/umsU/bGaEjFD8Zrq.iecTxCGTeUk8tGjN8vCdyBZsKCv0Mvahu', 'Emerson', 'Wallace', 'mauris.id@turpis.org', 1, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:30', '2018-10-07 20:43:30'),
(16196882, 'K', '$2y$10$U.ZWVrItQaKCYihMUUd8zu2hbD0f.dUzxh1PFDhVkf1h8a/Z1S0ei', 'Erin', 'Cote', 'dapibus@eleifendegestas.ca', 1, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:22', '2018-10-06 14:36:22'),
(16805591, '9', '$2y$10$el2Cij9SalRJUlGVnQF/nOSg1n.usE01v65Hq5q5RSDXm/S/Nu5BS', 'Gil', 'Wilkinson', 'pharetra@ut.net', 1, 6, 'alumno', 'activo', NULL, '2018-10-07 20:43:28', '2018-10-07 20:43:28'),
(17293540, '0', '$2y$10$39NT9yja1HqDAeJPc13wleHM4a5LMnKK5Lyju9e9/pbuMa/UpTIuO', 'Arsenio', 'Ware', 'arcu.Aliquam.ultrices@mus.co.uk', 1, 6, 'alumno', 'activo', NULL, '2018-10-06 14:36:21', '2018-10-06 14:36:21'),
(18273626, '5', '$2y$10$Jm7XN0mpmXX34KgqohlmyO1DZHvD8oqWT1lnogFPDRELb7254CvnC', 'Rodrigo', 'Ramirez', 'rodrigo@gmail.com', 0, 50, 'admin', 'activo', 'TiWeVCJ5AwpmDiBhaVHzNE7j6v3rg8JmAszVEtT7rPnupnOByLPx2negmjEK', '2017-05-26 03:11:07', '2017-05-26 03:11:07'),
(18368082, 'K', '$2y$10$aYOkfG87tdbmx25Xu3Ly4OmP3fOVqyGV8iCmAuo3.JF64iJV3jDBC', 'Bradley', 'Owens', 'cursus.et@purusin.com', 1, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:28', '2018-10-07 20:43:28'),
(18864072, '9', '$2y$10$kfXRkkefw5cXOjeHJbYxf.Rug.ZjRq.K2wG9E4bbsCKB/1QGlmaim', 'Tyler', 'Booker', 'non.lorem.vitae@eratEtiam.net', 1, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:22', '2018-10-06 14:36:22'),
(20557648, '7', '$2y$10$ekVTmO3o3J.Jsi0ygzffF.K9NjagPpIpz2SCKwdC113veqSvJtw7q', 'Damon', 'Frank', 'sem@Suspendissetristique.ca', 0, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:21', '2018-10-06 14:36:21'),
(22062621, '0', '$2y$10$K0XyByr26mdZN8Fv5QTUbOTpQXUoZBROU3aWs0sLi0HmfKPSULy3C', 'Shelley', 'Mathis', 'sit@tellusloremeu.net', 1, 7, 'alumno', 'activo', NULL, '2018-10-06 14:36:22', '2018-10-06 14:36:22'),
(22557708, '0', '$2y$10$hAe0rCBPMZUdoouv1DXTGuUPKc4QYYRaeS65WDXgTd2fSlETmGL6G', 'Beck', 'Mathis', 'non.magna.Nam@gravidasit.edu', 1, 6, 'alumno', 'activo', NULL, '2018-10-07 20:43:29', '2018-10-07 20:43:29'),
(22908203, '5', '$2y$10$xRHu8AwVHZukhNP06bCR4.QIK6NinodHDklTCFeqWff/Yjj3134J2', 'August', 'Wilkins', 'dolor.dolor@molestiein.ca', 0, 7, 'alumno', 'activo', NULL, '2018-10-06 14:36:21', '2018-10-06 14:36:21'),
(23169382, '3', '$2y$10$mma6LZcPnSFEq8RkrJpDhO.PXhDjMVLWmz7OtKw9cEt9nVKU.UoKC', 'Knox', 'Williams', 'sed.tortor@dolorNullasemper.net', 0, 7, 'alumno', 'activo', NULL, '2018-10-06 14:36:21', '2018-10-06 14:36:21'),
(23745379, '4', '$2y$10$0mTfCJxAZr..wYOlj9xYVORo/CwyBctD3HjNItZMKeo561bO96LRS', 'Ursa', 'Roman', 'metus.Aenean@atvelitCras.org', 1, 6, 'alumno', 'activo', NULL, '2018-10-07 20:43:28', '2018-10-07 20:43:28'),
(24755933, '7', '$2y$10$mZ2KJXCvEU92lyXiT8smIutCuhRmp/cW1tOnLQaHUmowP.b1sTWVG', 'Coby', 'Vincent', 'lorem.vehicula@ligula.net', 1, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:29', '2018-10-07 20:43:29'),
(25643623, 'K', '$2y$10$YOCiCuCLP3JH5PTdNeDZxeMz82B/9yKAOHruB158c6hafEM66YEoq', 'Kirby', 'Reeves', 'fringilla@imperdietnon.edu', 1, 6, 'alumno', 'activo', NULL, '2018-10-07 20:43:29', '2018-10-07 20:43:29'),
(26736062, '6', '$2y$10$DOoaRbwcKNsBeiDSG2T5JOyiozpq3.T9GtmBJySC/wfPwZy9rJahO', 'Gannon', 'Miller', 'metus.In@Sednuncest.org', 0, 6, 'alumno', 'activo', NULL, '2018-10-07 20:43:29', '2018-10-07 20:43:29'),
(26938577, '4', '$2y$10$.NdGr1EpXOqfj1iMndT1cuSDKWn62Dd2FGjwWr/1foq5ipIeP/ftC', 'Timon', 'Burch', 'Nulla.facilisis.Suspendisse@euismodest.ca', 0, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:28', '2018-10-07 20:43:28'),
(27346112, '4', '$2y$10$ifsEn1FFQ/U6anzhMBttvO2IkYtnYWZiCyjLNGGgALTHO9qmZJ56C', 'Evelyn', 'Kelley', 'ornare.facilisis.eget@convallis.ca', 1, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:21', '2018-10-06 14:36:21'),
(28307932, '5', '$2y$10$qDOHdzEhnqGZoBGtqebtv./14jIO2WgVVaROu54vL7Q1dtoclcMEy', 'Myra', 'Lambert', 'ut.pharetra.sed@auctorveliteget.ca', 0, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:29', '2018-10-07 20:43:29'),
(28334360, 'K', '$2y$10$1TL9bqeqjSp6NZlGFjQDNede37SbHpPCeExm3OVx197BBdxO.N/3y', 'Brenna', 'Carney', 'consectetuer.rhoncus@semPellentesque.ca', 0, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:21', '2018-10-06 14:36:21'),
(28439782, '7', '$2y$10$VCF6OMKGda1l1ZucRiUZ0uPlW1T8FhMkWoQS6wvAXcwHn5/8djaFG', 'Quincy', 'Collier', 'tempus@eleifendCras.edu', 0, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:21', '2018-10-06 14:36:21'),
(29681983, '2', '$2y$10$7mZU.pzyGvBcKd/4ukKTU./qgvSdiS5ANywaaHpEkW30O21CEE9ZK', 'Anika', 'Suarez', 'eros.nec@tellussem.com', 1, 6, 'alumno', 'activo', NULL, '2018-10-07 20:43:30', '2018-10-07 20:43:30'),
(30368189, '2', '$2y$10$RymF2W2OIXYUacTQNLa/8u3u0YXgAeG59nJXFOAmiM500mdphmRhK', 'Heidi', 'Delaney', 'urna@Nunc.net', 1, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:21', '2018-10-06 14:36:21'),
(32286346, '2', '$2y$10$Y3zoa2lN9bFOXB7LvaiYtOmFSESp6/IOM7fHeOxHJvFcGDtDyZ0ku', 'Isaiah', 'Bender', 'Ut.semper@vel.ca', 0, 8, 'alumno', 'activo', NULL, '2018-10-07 20:43:30', '2018-10-07 20:43:30'),
(32361832, '1', '$2y$10$xcJo6Bcq1FmeQtfSCKKh2etu5zlGgpWgEANtqM5rQSzRd69ibRoUC', 'Blair', 'Harding', 'orci.Donec.nibh@litoratorquent.co.uk', 0, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:22', '2018-10-06 14:36:22'),
(32735286, '5', '$2y$10$rKbzmx5Nv1Gb3oWPHb7s6.JptKdxcnTDqhqZOD6kMI/7rsL8W5qMO', 'Ishmael', 'Chaney', 'Aliquam@a.net', 0, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:30', '2018-10-07 20:43:30'),
(33233218, 'K', '$2y$10$SCoWPEnjNV9xqdW.VfXu6ugAZSbLW1wlwUu7QiTXYY5O82dLo/Y66', 'Lilah', 'Benson', 'luctus.ipsum@velitegestas.edu', 0, 7, 'alumno', 'activo', NULL, '2018-10-06 14:36:21', '2018-10-06 14:36:21'),
(34243035, 'K', '$2y$10$hfoWcQH3UxVC1aFY.9cUTOgpHNbG6GZc.jfivkh6LM4S6wLeSSANy', 'Wesley', 'Barry', 'Integer@eumetus.org', 0, 7, 'alumno', 'activo', NULL, '2018-10-06 14:36:22', '2018-10-06 14:36:22'),
(34397899, '5', '$2y$10$mxfS4rX4/lRGg1p4X2/gBOj..2DWTGR0W8/vp5BS18U8pCDgYxHhi', 'Zane', 'Melton', 'Nam@sociosquad.com', 1, 6, 'alumno', 'activo', NULL, '2018-10-06 14:36:22', '2018-10-06 14:36:22'),
(34434224, '5', '$2y$10$qRvACO0GjDLZpYfzKx/UqedTHXY8u0pyOCd3gQ1Ka3hifCDzDDFXW', 'Aline', 'Peters', 'suscipit.nonummy@felis.org', 1, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:30', '2018-10-07 20:43:30'),
(36181439, '8', '$2y$10$/1orJufgnfN8EX.IIk7idOwgvyH5iCDYBynjjDN9CgO1b1JnwIHwe', 'Stephen', 'Guthrie', 'adipiscing.ligula@ultrices.org', 0, 8, 'alumno', 'activo', NULL, '2018-10-07 20:43:29', '2018-10-07 20:43:29'),
(36974988, '9', '$2y$10$g.MkDWhCHVuPtcLIOukmD.5tM1mF.ayFd985Lj.zQJN3eEH1V/uw6', 'Kato', 'Wiggins', 'vel@seddictum.ca', 0, 8, 'alumno', 'activo', NULL, '2018-10-07 20:43:28', '2018-10-07 20:43:28'),
(37182544, '4', '$2y$10$dJ8fji4YsJ9OuMbntkdaTeYRYnuS6O5Wzywr8pyutISpskLmd8eW6', 'Kuame', 'Harris', 'enim.Nunc@sed.net', 1, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:29', '2018-10-07 20:43:29'),
(37927933, '3', '$2y$10$9mUu7MW2TnYAICxS5rNOcuDGdhEHMTEvkT7PMIbj19WzX/PZTC2bm', 'Willa', 'Britt', 'tortor.nibh@at.org', 1, 8, 'alumno', 'activo', NULL, '2018-10-07 20:43:29', '2018-10-07 20:43:29'),
(38338260, '2', '$2y$10$LegX6tmfvNtfhrtqHOKmaOkxoNiwaWoi3wpGVlIodrTBiUROYH5dm', 'Honorato', 'Duran', 'Proin@Nulla.edu', 1, 6, 'alumno', 'activo', NULL, '2018-10-06 14:36:20', '2018-10-06 14:36:20'),
(38856106, '8', '$2y$10$kEAwBu0BkRdujivnqYz09ehUDb/zjf/SzeUysKz9ANa1j7Je3f.Uq', 'Dante', 'Stanley', 'quis.accumsan@felis.edu', 0, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:30', '2018-10-07 20:43:30'),
(38868655, '3', '$2y$10$1UcUEYdKkR1i984FjuMVB.EMtwduZU0W/BYmnE3fcOTGkR5i.783K', 'Myles', 'Blanchard', 'eleifend.vitae@ornare.org', 1, 8, 'alumno', 'activo', NULL, '2018-10-07 20:43:30', '2018-10-07 20:43:30'),
(39923937, '0', '$2y$10$E.SFGnz/Pe3qxUeEQShTTOSCXesAl.MhZa6U3FjBm1mxrtj4y51bi', 'Martin', 'Velasquez', 'nunc@ipsum.net', 1, 8, 'alumno', 'activo', NULL, '2018-10-07 20:43:29', '2018-10-07 20:43:29'),
(42901136, '1', '$2y$10$FWbCvmpHknnRKXkP3/zJ2eJPDjDfzU8cCwE6AFmCyLqoA2Wgv5SRu', 'Kirestin', 'Petersen', 'ac@egetvolutpatornare.edu', 0, 8, 'alumno', 'activo', NULL, '2018-10-07 20:43:29', '2018-10-07 20:43:29'),
(43189374, '6', '$2y$10$UIWcByJ0.YYA.l/IS1zHA.0fv4mFvRbxdJhNJlVjhpiLJ9xbVY0va', 'Callum', 'Barlow', 'nulla.vulputate@dapibusgravida.org', 0, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:29', '2018-10-07 20:43:29'),
(43456833, '1', '$2y$10$ftrOHlBOGtYpMHIhaWYNmOqGOATkBI/Y.bvoxZWUNeKkymai.rP16', 'Sebastian', 'Ratliff', 'nec@neceuismodin.ca', 1, 6, 'alumno', 'activo', NULL, '2018-10-07 20:43:28', '2018-10-07 20:43:28'),
(43463914, 'K', '$2y$10$LRcxKiVr.e.A3ZlGKQ1K4ugyrVxlKrnDnIx3OOMQaB15gXi5Zkfqu', 'Alexa', 'Walsh', 'ornare.facilisis@odiosagittissemper.co.uk', 0, 7, 'alumno', 'activo', NULL, '2018-10-06 14:36:22', '2018-10-06 14:36:22'),
(43767613, '5', '$2y$10$nrksUnaiFgIcyp5tAzHKDeVMf7/sp6kAS6PXdsJSiUPjI50Q9CFF6', 'Haviva', 'Davidson', 'a.neque@augueeutempor.edu', 0, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:20', '2018-10-06 14:36:20'),
(44380807, '8', '$2y$10$pUPj2YGtoingiSkxcFsCwebmI0.m8J.N9CNcMBmbVtzvLgJI7rGjC', 'Len', 'Knox', 'Duis.ac@Aliquamadipiscinglobortis.org', 1, 8, 'alumno', 'activo', NULL, '2018-10-07 20:43:28', '2018-10-07 20:43:28'),
(44422171, '2', '$2y$10$VaAXXlFj3q4Pz27MY6/ET.l55XprHTGnVuhl0PEGMM5KCPkxDsClK', 'Zane', 'Burns', 'eu@Integer.edu', 1, 7, 'alumno', 'activo', NULL, '2018-10-06 14:36:22', '2018-10-06 14:36:22'),
(46628870, '5', '$2y$10$nSZ5V3b1ETpbc8Qvz.lb1uFa4x1qwDgDf2FKpxR2BbIr9PEO0TTAy', 'Cyrus', 'Cline', 'velit.Sed.malesuada@diam.ca', 0, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:21', '2018-10-06 14:36:21'),
(47253755, '5', '$2y$10$nyMHyfSUYOm5d7YuMwVX0.tvS5j5uY.tXhCVNanwuwlmfURZItrde', 'Emily', 'Gentry', 'molestie.tortor@luctus.net', 1, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:21', '2018-10-06 14:36:21'),
(48639362, '9', '$2y$10$uwaSMztyqkTS8XsUQewL6uaJhmY0b.MYpKCxwWQiRVySTzfoLRYKC', 'Portia', 'Hammond', 'et.commodo.at@ullamcorper.edu', 1, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:28', '2018-10-07 20:43:28'),
(49248242, '0', '$2y$10$z8bd9NQ8Gf0fAtdmyOtiTubzksezS5PXrCvYZN2ktF9sC.KdsQIwi', 'Lyle', 'Whitehead', 'velit@urna.co.uk', 0, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:30', '2018-10-07 20:43:30'),
(49377896, 'K', '$2y$10$PtZDqtk3JlD80ak4IiR6U.A8.P5GFMcCrsqx52tX6ErfZb83Jq.nO', 'Akeem', 'Woodward', 'et.malesuada.fames@parturient.net', 1, 7, 'alumno', 'activo', NULL, '2018-10-07 20:43:28', '2018-10-07 20:43:28'),
(50035847, '5', '$2y$10$fGp9KVGf2EVe0glEEvXzae.uNC2pZm0OWg2s0UE6Su2ZsWRxU2NX6', 'Oscar', 'Holder', 'est.congue@magnisdis.com', 1, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:22', '2018-10-06 14:36:22'),
(50316120, '6', '$2y$10$n5inMuAJj3Ei0KWOENKGuuHYsGn9G4oteZ3n7zjrB1zD/t/mKsTy.', 'Carlos', 'Banks', 'feugiat.Sed@diamProin.net', 0, 8, 'alumno', 'activo', NULL, '2018-10-06 14:36:22', '2018-10-06 14:36:22');

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
  ADD UNIQUE KEY `FKnoticia` (`id_noticia`) USING BTREE;

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
  MODIFY `id_foto` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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

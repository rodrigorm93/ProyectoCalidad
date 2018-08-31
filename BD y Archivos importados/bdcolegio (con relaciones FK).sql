-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2018 a las 03:15:05
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
(27159042, 'Hakeem', 'Knowles', '2006', 'ASIGNADO'),
(36491606, 'Iliana', 'Shields', '2006', 'ASIGNADO'),
(44294342, 'Joshua', 'Velazquez', '2016', 'No Asignado');

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
(16, 'cuarto');

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
(2, 1, 0x2f75706c6f6164732f4b314b6c44554662436a486b426b67754c3043704549593469634331373433736c6d6f454c4e3553486b6d51514b3362644f2d756e2e6a7067);

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
(16, 4, 'Ciencias', 'activo', 'ASIGNADO', 6341234),
(17, 4, 'Lenguaje', 'activo', 'ASIGNADO', 6341234),
(18, 4, 'Matematicas', 'activo', 'ASIGNADO', 7263526),
(25, 16, 'fisica', 'activo', 'ASIGNADO', 6341234);

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
(6261631, 16, '0', '0'),
(6261631, 17, '0', '0'),
(6261631, 18, '0', '0'),
(8468829, 16, '0', '0'),
(8468829, 17, '0', '0'),
(8468829, 18, '0', '0'),
(10207009, 16, '0', '0'),
(10207009, 17, '0', '0'),
(10207009, 18, '0', '0'),
(19543644, 16, '0', '0'),
(19543644, 17, '0', '0'),
(19543644, 18, '0', '0'),
(22178016, 25, '0', '0'),
(24423529, 25, '0', '0'),
(36491606, 25, '0', '0');

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
(1, 'Noticia de Prueba', '<p><strong>Cosmolog&iacute;a</strong>, del&nbsp;<a href=\"https://es.wikipedia.org/wiki/Griego_antiguo\">griego</a>&nbsp;&kappa;&omicron;&sigma;&mu;&omicron;&lambda;&omicron;&gamma;ί&alpha; (&laquo;cosmologu&iacute;a&raquo;, compuesto por &kappa;ό&sigma;&mu;&omicron;&sigmaf;, /kosmos/, &laquo;<a href=\"https://es.wikipedia.org/wiki/Cosmos\">cosmos</a>, orden&raquo;, y &lambda;&omicron;&gamma;&iota;&alpha;, /logu&iacute;a/, &laquo;tratado, estudio&raquo;) concepci&oacute;n integral, denominada tambi&eacute;n&nbsp;<a href=\"https://es.wikipedia.org/wiki/Filosof%C3%ADa_de_la_naturaleza\">filosof&iacute;a de la naturaleza</a>, es la ciencia que estudia todo lo relacionado con el cosmos o universo.</p>\r\n\r\n<p><a href=\"https://commons.wikimedia.org/wiki/File:Hubble_ultra_deep_field_high_rez_edit1.jpg\"><img alt=\"\" src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Hubble_ultra_deep_field_high_rez_edit1.jpg/250px-Hubble_ultra_deep_field_high_rez_edit1.jpg\" style=\"height:250px; width:250px\" /></a></p>\r\n\r\n<p>El&nbsp;<a href=\"https://es.wikipedia.org/wiki/Hubble_Ultra_Deep_Field\">Hubble Ultra Deep Field</a>. Casi todos los puntos de luz en esta imagen son todos una&nbsp;<a href=\"https://es.wikipedia.org/wiki/Galaxia\">galaxia</a>. Esto es s&oacute;lo una peque&ntilde;a regi&oacute;n de un universo que podr&iacute;a contener millones de galaxias.</p>\r\n\r\n<h2>Contexto</h2>\r\n\r\n<p>La palabra &laquo;cosmolog&iacute;a&raquo; fue utilizada por primera vez en&nbsp;<a href=\"https://es.wikipedia.org/wiki/1731\">1731</a>&nbsp;en la&nbsp;<em>Cosmolog&iacute;a generalis</em>&nbsp;de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Christian_Wolff\">Christian Wolff</a>, el estudio cient&iacute;fico del&nbsp;<a href=\"https://es.wikipedia.org/wiki/Universo\">universo</a>&nbsp;tiene una larga historia que involucra a la&nbsp;<a href=\"https://es.wikipedia.org/wiki/F%C3%ADsica\">f&iacute;sica</a>, la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Astronom%C3%ADa\">astronom&iacute;a</a>, la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Filosof%C3%ADa\">filosof&iacute;a</a>, el&nbsp;<a href=\"https://es.wikipedia.org/wiki/Esoterismo\">esoterismo</a>&nbsp;y la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Religi%C3%B3n\">religi&oacute;n</a>.</p>\r\n\r\n<p>El nacimiento de la cosmolog&iacute;a moderna puede situarse en 1700 con la hip&oacute;tesis de que las&nbsp;<a href=\"https://es.wikipedia.org/wiki/Estrellas\">estrellas</a>&nbsp;de la&nbsp;<a href=\"https://es.wikipedia.org/wiki/V%C3%ADa_L%C3%A1ctea\">V&iacute;a L&aacute;ctea</a>&nbsp;pertenecen a un&nbsp;<a href=\"https://es.wikipedia.org/wiki/Sistema_estelar\">sistema estelar</a>&nbsp;de forma discoidal, del cual el propio&nbsp;<a href=\"https://es.wikipedia.org/wiki/Sol\">Sol</a>&nbsp;forma parte; y que otros cuerpos nebulosos visibles con el telescopio son sistemas estelares similares a la V&iacute;a L&aacute;ctea, pero muy lejanos.</p>\r\n\r\n<h2>Cosmolog&iacute;a f&iacute;sica[<a href=\"https://es.wikipedia.org/w/index.php?title=Cosmolog%C3%ADa&amp;action=edit&amp;section=2\">editar</a>]</h2>\r\n\r\n<p>Art&iacute;culo principal:<em><a href=\"https://es.wikipedia.org/wiki/Cosmolog%C3%ADa_f%C3%ADsica\">&nbsp;Cosmolog&iacute;a f&iacute;sica</a></em></p>\r\n\r\n<p>V&eacute;anse tambi&eacute;n:&nbsp;<em><a href=\"https://es.wikipedia.org/wiki/Astronom%C3%ADa\">Astronom&iacute;a</a></em>&nbsp;y&nbsp;<em><a href=\"https://es.wikipedia.org/wiki/Astrof%C3%ADsica\">Astrof&iacute;sica</a></em>.</p>\r\n\r\n<p>Cosmolog&iacute;a f&iacute;sica se entiende por el estudio del origen, la evoluci&oacute;n y el destino del Universo utilizando los modelos terrenos de la f&iacute;sica. La cosmolog&iacute;a f&iacute;sica se desarroll&oacute; como ciencia durante la primera mitad del&nbsp;<a href=\"https://es.wikipedia.org/wiki/Siglo_XX\">siglo XX</a>&nbsp;como consecuencia de los acontecimientos detallados a continuaci&oacute;n:</p>\r\n\r\n<ul>\r\n	<li>1915-1916.&nbsp;<a href=\"https://es.wikipedia.org/wiki/Albert_Einstein\">Albert Einstein</a>&nbsp;formula la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Teor%C3%ADa_general_de_la_relatividad\">teor&iacute;a general de la relatividad</a>, que ser&aacute; la teor&iacute;a marco de los modelos matem&aacute;ticos del universo. Al mismo tiempo formula el primer modelo matem&aacute;tico del universo conocido como&nbsp;<a href=\"https://es.wikipedia.org/w/index.php?title=Universo_est%C3%A1tico&amp;action=edit&amp;redlink=1\">universo est&aacute;tico</a>&nbsp;donde introduce la famosa&nbsp;<a href=\"https://es.wikipedia.org/wiki/Constante_cosmol%C3%B3gica\">constante cosmol&oacute;gica</a>&nbsp;y la hip&oacute;tesis conocida como&nbsp;<a href=\"https://es.wikipedia.org/wiki/Principio_cosmol%C3%B3gico\">principio cosmol&oacute;gico</a>, que establece que el universo es&nbsp;<a href=\"https://es.wikipedia.org/w/index.php?title=Homogeneidad_(cosmolog%C3%ADa)&amp;action=edit&amp;redlink=1\">homog&eacute;neo</a>&nbsp;e&nbsp;<a href=\"https://es.wikipedia.org/wiki/Is%C3%B3tropo\">is&oacute;tropo</a>&nbsp;a gran escala, lo que significa que tiene la misma apariencia general observado desde cualquier lugar.</li>\r\n	<li>1916-1917. El astr&oacute;nomo&nbsp;<a href=\"https://es.wikipedia.org/wiki/Willem_de_Sitter\">Willem de Sitter</a>&nbsp;formula un modelo est&aacute;tico de universo vac&iacute;o de materia con la constante cosmol&oacute;gica donde los objetos astron&oacute;micos alejados ten&iacute;an que presentar&nbsp;<a href=\"https://es.wikipedia.org/wiki/Corrimientos_al_rojo\">corrimientos al rojo</a>&nbsp;en sus&nbsp;<a href=\"https://es.wikipedia.org/wiki/L%C3%ADneas_espectrales\">l&iacute;neas espectrales</a>.</li>\r\n	<li>1920-1921. Tiene lugar el&nbsp;<a href=\"https://es.wikipedia.org/w/index.php?title=Gran_Debate&amp;action=edit&amp;redlink=1\">Gran Debate</a>&nbsp;entre los astr&oacute;nomos&nbsp;<a href=\"https://es.wikipedia.org/w/index.php?title=Heber_Curtis&amp;action=edit&amp;redlink=1\">Heber Curtis</a>&nbsp;y&nbsp;<a href=\"https://es.wikipedia.org/wiki/Harlow_Shapley\">Harlow Shapley</a>&nbsp;que estableci&oacute; la naturaleza extragal&aacute;ctica de las&nbsp;<a href=\"https://es.wikipedia.org/wiki/Nebulosas_espirales\">nebulosas espirales</a>&nbsp;cuando se pensaba que la&nbsp;<a href=\"https://es.wikipedia.org/wiki/V%C3%ADa_L%C3%A1ctea\">V&iacute;a L&aacute;ctea</a>&nbsp;constitu&iacute;a todo el universo.</li>\r\n	<li>1922-1924. El f&iacute;sico ruso&nbsp;<a href=\"https://es.wikipedia.org/wiki/Alexander_Friedmann\">Alexander Friedmann</a>&nbsp;publica la primera soluci&oacute;n matem&aacute;tica a las ecuaciones de Einstein de la relatividad general, que representan a un universo en expansi&oacute;n. En un art&iacute;culo de 1922 publica la soluci&oacute;n para un universo finito y en 1924 la de un universo infinito.</li>\r\n	<li>1929.&nbsp;<a href=\"https://es.wikipedia.org/wiki/Edwin_Hubble\">Edwin Hubble</a>&nbsp;establece una relaci&oacute;n lineal entre la distancia y el&nbsp;<a href=\"https://es.wikipedia.org/wiki/Corrimiento_al_rojo\">corrimiento al rojo</a>&nbsp;de las&nbsp;<a href=\"https://es.wikipedia.org/wiki/Nebulosas_espirales\">nebulosas espirales</a>&nbsp;que ya hab&iacute;a sido observado por el astr&oacute;nomo&nbsp;<a href=\"https://es.wikipedia.org/wiki/Vesto_Slipher\">Vesto Slipher</a>en 1909. Esta relaci&oacute;n se conocer&aacute; como&nbsp;<a href=\"https://es.wikipedia.org/wiki/Ley_de_Hubble\">Ley de Hubble</a>.</li>\r\n	<li>1930. El sacerdote y astr&oacute;nomo belga&nbsp;<a href=\"https://es.wikipedia.org/wiki/Georges_%C3%89douard_Lema%C3%AEtre\">Georges &Eacute;douard Lema&icirc;tre</a>&nbsp;esboza su&nbsp;<a href=\"https://es.wikipedia.org/w/index.php?title=Hip%C3%B3tesis_del_%C3%A1tomo_primitivo&amp;action=edit&amp;redlink=1\">hip&oacute;tesis del &aacute;tomo primitivo</a>&nbsp;donde suger&iacute;a que el universo hab&iacute;a nacido de un solo&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cuanto\">cuanto</a>&nbsp;de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Energ%C3%ADa\">energ&iacute;a</a>.</li>\r\n	<li>1931.&nbsp;<a href=\"https://es.wikipedia.org/wiki/Milton_Humason\">Milton Humason</a>, colaborador de Hubble, dio la interpretaci&oacute;n de los&nbsp;<a href=\"https://es.wikipedia.org/wiki/Corrimientos_al_rojo\">corrimientos al rojo</a>&nbsp;como&nbsp;<a href=\"https://es.wikipedia.org/wiki/Efecto_Doppler\">efecto Doppler</a>&nbsp;debido a la velocidad de alejamiento de las&nbsp;<a href=\"https://es.wikipedia.org/wiki/Nebulosas_espirales\">nebulosas espirales</a>.</li>\r\n	<li>1933. El astr&oacute;nomo suizo&nbsp;<a href=\"https://es.wikipedia.org/wiki/Fritz_Zwicky\">Fritz Zwicky</a>&nbsp;public&oacute; un estudio de la distribuci&oacute;n de las&nbsp;<a href=\"https://es.wikipedia.org/wiki/Galaxia\">galaxias</a>&nbsp;sugiriendo que estaban permanente ligadas por su mutua atracci&oacute;n gravitacional. Zwicky se&ntilde;al&oacute; sin embargo que no bastaba la cantidad de masa realmente observada en la forma de las galaxias para dar cuenta de la intensidad requerida del&nbsp;<a href=\"https://es.wikipedia.org/wiki/Campo_gravitatorio\">campo gravitatorio</a>. Se introduc&iacute;a as&iacute; el problema de la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Materia_oscura\">materia oscura</a></li>\r\n	<li>1948.&nbsp;<a href=\"https://es.wikipedia.org/wiki/Herman_Bondi\">Herman Bondi</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Thomas_Gold\">Thomas Gold</a>&nbsp;y&nbsp;<a href=\"https://es.wikipedia.org/wiki/Fred_Hoyle\">Fred Hoyle</a>&nbsp;proponen el&nbsp;<a href=\"https://es.wikipedia.org/wiki/Modelo_de_estado_estacionario\">modelo de estado estacionario</a>, donde el universo no solo tiene la misma apariencia a gran escala visto desde cualquier lugar, sino que la tiene vista en cualquier &eacute;poca.</li>\r\n	<li>1948.&nbsp;<a href=\"https://es.wikipedia.org/wiki/George_Gamow\">George Gamow</a>&nbsp;y&nbsp;<a href=\"https://es.wikipedia.org/w/index.php?title=Ralph_A._Alpher&amp;action=edit&amp;redlink=1\">Ralph A. Alpher</a>&nbsp;publican un art&iacute;culo donde estudian las s&iacute;ntesis de los&nbsp;<a href=\"https://es.wikipedia.org/wiki/Elementos_qu%C3%ADmicos\">elementos qu&iacute;micos</a>&nbsp;ligeros en el&nbsp;<a href=\"https://es.wikipedia.org/wiki/Reactor_nuclear\">reactor nuclear</a>&nbsp;que fue el universo primitivo, conocida como&nbsp;<a href=\"https://es.wikipedia.org/wiki/Nucleos%C3%ADntesis_primordial\">nucleos&iacute;ntesis primordial</a>. En el mismo a&ntilde;o, el mismo Alpher y Robert Herman mejoran los c&aacute;lculos y hacen la primera predicci&oacute;n de la existencia de la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Radiaci%C3%B3n_de_fondo_de_microondas\">radiaci&oacute;n de fondo de microondas</a>.</li>\r\n	<li>1964.&nbsp;<a href=\"https://es.wikipedia.org/wiki/Arno_Penzias\">Arno Penzias</a>&nbsp;y&nbsp;<a href=\"https://es.wikipedia.org/wiki/Robert_Woodrow_Wilson\">Robert Woodrow Wilson</a>&nbsp;de los&nbsp;<a href=\"https://es.wikipedia.org/wiki/Laboratorios_Bell\">laboratorios Bell</a>&nbsp;descubren la se&ntilde;al de radio que fue r&aacute;pidamente interpretada como la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Radiaci%C3%B3n_de_fondo_de_microondas\">radiaci&oacute;n de fondo de microondas</a>&nbsp;que supondr&iacute;a una observaci&oacute;n crucial que convertir&iacute;a al modelo del&nbsp;<a href=\"https://es.wikipedia.org/wiki/Gran_Explosi%C3%B3n\">Big Bang</a>&nbsp;(o de la Gran Explosi&oacute;n) en el modelo f&iacute;sico est&aacute;ndar para describir el universo. Durante el resto del siglo&nbsp;XX se produjo la consolidaci&oacute;n de este modelo y se reunieron las evidencias observacionales que establecen los siguientes hechos fuera de cualquier duda razonable:\r\n	<ul>\r\n		<li>El universo est&aacute; en expansi&oacute;n, en el sentido de que la distancia entre cualquier par de galaxias lejanas se est&aacute; incrementando con el tiempo.</li>\r\n		<li>La din&aacute;mica de la expansi&oacute;n est&aacute; con muy buena aproximaci&oacute;n descrita por la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Teor%C3%ADa_general_de_la_relatividad\">teor&iacute;a general de la relatividad</a>&nbsp;de Einstein.</li>\r\n		<li>El universo se expande a partir de un estado inicial de alta&nbsp;<a href=\"https://es.wikipedia.org/wiki/Densidad\">densidad</a>&nbsp;y&nbsp;<a href=\"https://es.wikipedia.org/wiki/Temperatura\">temperatura</a>&nbsp;donde se formaron los&nbsp;<a href=\"https://es.wikipedia.org/wiki/Elementos_qu%C3%ADmicos\">elementos qu&iacute;micos</a>&nbsp;ligeros, estado a veces denominado&nbsp;<a href=\"https://es.wikipedia.org/wiki/Big_Bang\">Big Bang</a>&nbsp;o Gran Explosi&oacute;n.</li>\r\n	</ul>\r\n	</li>\r\n</ul>', '2018-08-30 00:00:00');

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
(6341234, 'Manuel', 'Valenzuela', 'ASIGNADO'),
(7263526, 'Jose', 'Torres', 'ASIGNADO');

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
(6261631, '8', '$2y$10$5s7Q4rNwmjT2GQqUEDDHpu1FYlJxU9OvB3OQ3erGhWKIKPzXrBnte', 'Oleg', 'Serrano', 'tincidunt.dui@Inatpede.org', 'mujer', 27, 'alumno', 'activo', NULL, '2018-08-29 17:19:53', '2018-08-29 17:19:53'),
(6341234, '2', '$2y$10$T87wrHGKB5evuC9dj9IZDOW.3G43snBmSseAw.Edm/H/RIn7/UvrO', 'Manuel', 'Valenzuela', 'manuel@gmail.com', 'hombre', 48, 'profesor', 'activo', 'C9n7oG0484cInjiDAXgssbG7mKPSEB7hOXbXcYx1LRfU3sD9n7JfQuyrZcu3', '2018-08-29 17:19:32', '2018-08-29 17:19:32'),
(7263526, '6', '$2y$10$FBckAoJ0ntD3Jaw.Go5YD.0hfcJ35d88GWq2RBqNUD/ZQ3Y6E6QJG', 'Jose', 'Torres', 'jtores@gmail.com', 'hombre', 38, 'profesor', 'activo', NULL, '2018-08-29 17:19:32', '2018-08-29 17:19:32'),
(8468829, '0', '$2y$10$hfVkvQ2wCdn9oadQUL9an.8Ni5gCs.89xbJCMc/0X7q0/r6j0UBb2', 'Abdul', 'Holman', 'a.scelerisque.sed@imperdietdictummagna.co.uk', 'mujer', 21, 'alumno', 'activo', NULL, '2018-08-29 17:19:53', '2018-08-29 17:19:53'),
(10207009, '7', '$2y$10$G4znUNI6Nm3WrX0GD.uKyeW7vpCa8p14s0Lx4Kv2mu0wCRvw7MAWC', 'Priscilla', 'Bennett', 'dignissim@Mauris.ca', 'hombre', 23, 'alumno', 'activo', NULL, '2018-08-29 17:19:53', '2018-08-29 17:19:53'),
(18273626, '5', '$2y$10$Jm7XN0mpmXX34KgqohlmyO1DZHvD8oqWT1lnogFPDRELb7254CvnC', 'Rodrigo', 'Ramirez', 'rodrigo@gmail.com', 'hombre', 50, 'admin', 'activo', 'Axkx7N1yyVQcP8gOhGZZoPfPzTBoaxXM5GxwYhi6m7fVcVy2saHudyOYC9tE', '2017-05-26 03:11:07', '2017-05-26 03:11:07'),
(19543644, '4', '$2y$10$slbk.xVwtusJ.AmIY0Bk4e8gwjzvpQQi1zXhEuLxEVvlT8LNWi3g2', 'Raja', 'Wiggins', 'aliquet.odio@mauriseuelit.edu', 'mujer', 28, 'alumno', 'activo', NULL, '2018-08-29 17:19:53', '2018-08-29 17:19:53'),
(22178016, '7', '$2y$10$gd/GVpTWvcOV2vbgKfPKAe51j2iAyGzccxjGvhxuaSsmCd1RbuA5O', 'Indira', 'Cline', 'imperdiet.ornare@justo.org', 'mujer', 26, 'alumno', 'activo', NULL, '2018-08-29 17:19:53', '2018-08-29 17:19:53'),
(24423529, '8', '$2y$10$y2Mz/jkR4zyK7GPf4FgJTeNbC5m/A.aWXrMIzcjB9J8dZv17veCPS', 'Jeremy', 'Murray', 'pellentesque.tellus.sem@dapibus.org', 'mujer', 29, 'alumno', 'activo', NULL, '2018-08-29 17:19:53', '2018-08-29 17:19:53'),
(27159042, '3', '$2y$10$ZKN0/VQz0IB.JBA/WFhhuOc9au4xwnn3mrsWYNQzsXpY0wIR363d.', 'Hakeem', 'Knowles', 'vitae.risus.Duis@euerosNam.edu', 'mujer', 24, 'alumno', 'activo', NULL, '2018-08-29 17:19:53', '2018-08-29 17:19:53'),
(36491606, 'K', '$2y$10$eIisoGUW5nb2XzOZdqK/0uyyJHx7/VIs284ooh5RvvwwkOgsRbx2u', 'Iliana', 'Shields', 'posuere.cubilia.Curae@massa.org', 'mujer', 24, 'alumno', 'activo', NULL, '2018-08-29 17:19:53', '2018-08-29 17:19:53'),
(44294342, '7', '$2y$10$XdRG4AS8w0eCwf/8hyiCAOX/ntYYG1IUZdKtuxkPrhfo37zT1o4Bu', 'Joshua', 'Velazquez', 'dolor.Quisque.tincidunt@commodo.co.uk', 'mujer', 26, 'alumno', 'activo', NULL, '2018-08-29 17:19:53', '2018-08-29 17:19:53');

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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

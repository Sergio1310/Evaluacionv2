-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2019 a las 21:25:03
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `s_egresados`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiarstatus` (`valor` INT(10), `nomb` VARCHAR(30))  UPDATE asignaturas SET status=valor WHERE asignaturas.nombre = nomb$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarusuario` (IN `useer` INT(20), `passw` VARCHAR(100), `usertype` INT(10))  INSERT into usuarios(userr,contra,tipouser_Idtipouser) VALUES(useer,passw,usertype)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nueva_matricula` (`useer` INT(20))  BEGIN
DECLARE pass varchar(100) DEFAULT '';
DECLARE tipo_us int(10) DEFAULT 2;
INSERT INTO usuarios(userr, contra, tipouser_Idtipouser) values(useer,pass,tipo_us );

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `val_login` (`useer` INT(20), `passw` VARCHAR(100))  BEGIN
SELECT * FROM usuarios WHERE userr = useer AND  contra = passw;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `asignaturaas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `asignaturaas` (
`nombre` varchar(30)
,`id_asignatura` int(10)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id_asignatura` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id_asignatura`, `nombre`, `status`) VALUES
(1, 'Matematicas', 1),
(2, 'Ingles', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `asignatura` text NOT NULL,
  `calificacion` text,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `id_asignatura`, `id_usuario`, `asignatura`, `calificacion`, `status`) VALUES
(1, 1, 201700059, 'Matematicas', '66.666666666667', 1),
(2, 2, 201700059, 'Ingles', '100', 1),
(17, 1, 201700060, 'Matematicas', '55.555555555556', 1),
(18, 2, 201700060, 'Ingles', NULL, 0),
(19, 1, 201700061, 'Matematicas', NULL, 0),
(20, 2, 201700061, 'Ingles', NULL, 0),
(21, 1, 201700061, 'Matematicas', NULL, 0),
(22, 2, 201700061, 'Ingles', NULL, 0),
(23, 1, 201700061, 'Matematicas', NULL, 0),
(24, 2, 201700061, 'Ingles', NULL, 0),
(25, 1, 201700061, 'Matematicas', NULL, 0),
(26, 2, 201700061, 'Ingles', NULL, 0),
(27, 1, 201700062, 'Matematicas', NULL, 0),
(28, 2, 201700062, 'Ingles', NULL, 0),
(29, 1, 201700063, 'Matematicas', NULL, 0),
(30, 2, 201700063, 'Ingles', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cedula`
--

CREATE TABLE `cedula` (
  `id_cedula` int(20) NOT NULL,
  `Apellido_P` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Apellido_M` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Nombre_S` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Sexo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Curp` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Estado_Civ` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Ocupacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Calle_Num` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Colonia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Avenida` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Codigo_P` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Municipio` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Estado` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Ciudad` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Telefono` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Trabaja` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Trabaja_C` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Nombre_Emp` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Direccion_Emp` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Puesto` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Nombre_Jefe` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Telefono_Emp` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Tiempo_Col` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Sueldo_Men` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `CC_Trabajo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Tamaño_Emp` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Tipo_Emp` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Temas_Reforzar` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `Temas_COD` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `CI_Certificaciones` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `Tema_Incluir` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `id_user` int(20) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `matriculas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `matriculas` (
`userr` int(20)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` int(10) NOT NULL,
  `pregunta` text,
  `imagenPregunta` text,
  `opcion1` text,
  `imagenOpcion1` text,
  `opcion2` text,
  `imagenOpcion2` text,
  `opcion3` text,
  `imagenOpcion3` text,
  `opcion4` text,
  `imagenOpcion4` text,
  `respuesta` text NOT NULL,
  `asignatura_idasignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `pregunta`, `imagenPregunta`, `opcion1`, `imagenOpcion1`, `opcion2`, `imagenOpcion2`, `opcion3`, `imagenOpcion3`, `opcion4`, `imagenOpcion4`, `respuesta`, `asignatura_idasignatura`) VALUES
(67, 'pregunta1', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(83, 'pregunta2', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(84, 'pregunta3', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(87, 'pregunta4', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(88, 'pregunta5', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(89, 'pregunta6', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(90, 'pregunta7', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(96, 'inglespregunta1', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(97, 'inglespregunta2', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(98, 'inglespregunta3', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(99, 'inglespregunta4', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(100, 'inglespregunta5', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(101, 'inglespregunta6', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(102, 'inglespregunta7', NULL, 'ocion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(103, 'inglespregunta8', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(104, 'inglespregunta9', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(109, 'pregunta8', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(110, 'pregunta9', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(111, 'pregunta10', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(112, 'pregunta11', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(113, 'pregunta12', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(114, 'pregunta13', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(115, 'pregunta14', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(116, 'pregunta15', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(117, 'pregunta16', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(118, 'pregunta17', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(119, 'pregunta18', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(120, 'pregunta19', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(121, 'pregunta20', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(122, 'pregunta21', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(123, 'pregunta22', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(124, 'pregunta23', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(125, 'pregunta24', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(126, 'pregunta25', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(127, 'pregunta26', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(128, 'pregunta27', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(129, 'pregunta28', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(130, 'pregunta29', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(131, 'pregunta30', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(132, 'pregunta31', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(133, 'pregunta32', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(134, 'pregunta33', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(135, 'pregunta34', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(136, 'pregunta35', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(137, 'pregunta36', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(138, 'pregunta37', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(139, 'pregunta38', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(140, 'pregunta39', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(141, 'pregunta40', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(142, 'pregunta41', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(143, 'pregunta42', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(144, 'pregunta43', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(145, 'pregunta44', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(146, 'pregunta45', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(147, 'pregunta46', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(148, 'pregunta47', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(149, 'pregunta48', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(150, 'pregunta49', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(151, 'pregunta50', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(152, 'inglespregunta10', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(153, 'inglespregunta11', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(154, 'inglespregunta12', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(155, 'inglespregunta13', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(156, 'inglespregunta14', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(157, 'inglespregunta15', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(158, 'inglespregunta16', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(159, 'inglespregunta17', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(160, 'inglespregunta18', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(161, 'inglespregunta19', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(162, 'inglespregunta20', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(163, 'inglespregunta21', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(164, 'inglespregunta22', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(165, 'inglespregunta23', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(166, 'inglespregunta24', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(167, 'inglespregunta25', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(168, 'inglespregunta26', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(169, 'inglespregunta27', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(170, 'inglespregunta28', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(171, 'inglespregunta29', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(172, 'inglespregunta30', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(173, 'inglespregunta31', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(174, 'inglespregunta32', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(175, 'inglespregunta33', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(176, 'inglespregunta34', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(177, 'inglespregunta35', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(178, 'inglespregunta36', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(179, 'inglespregunta37', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(180, 'inglespregunta38', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(181, 'inglespregunta39', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(182, 'inglespregunta40', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(183, 'inglespregunta41', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(184, 'inglespregunta42', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(185, 'inglespregunta43', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(186, 'inglespregunta44', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(187, 'inglespregunta45', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(188, 'inglespregunta46', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(189, 'inglespregunta47', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(190, 'inglespregunta48', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(191, 'inglespregunta49', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(192, 'inglespregunta50', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_user`
--

CREATE TABLE `tipo_user` (
  `id_tipouser` int(10) NOT NULL,
  `Tipodeuser` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_user`
--

INSERT INTO `tipo_user` (`id_tipouser`, `Tipodeuser`) VALUES
(1, 'Administrador'),
(2, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `userr` int(20) NOT NULL,
  `contra` varchar(100) NOT NULL,
  `tipouser_Idtipouser` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`userr`, `contra`, `tipouser_Idtipouser`) VALUES
(201700058, 'uwu', 1),
(201700059, 'uwu', 2),
(201700060, '123456789', 2),
(201700061, '123456789', 2),
(201700062, '123456789', 2),
(201700063, '123456789', 2);

-- --------------------------------------------------------

--
-- Estructura para la vista `asignaturaas`
--
DROP TABLE IF EXISTS `asignaturaas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `asignaturaas`  AS  select `asignaturas`.`nombre` AS `nombre`,`asignaturas`.`id_asignatura` AS `id_asignatura` from `asignaturas` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `matriculas`
--
DROP TABLE IF EXISTS `matriculas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `matriculas`  AS  select `usuarios`.`userr` AS `userr` from `usuarios` where (`usuarios`.`tipouser_Idtipouser` = 1) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id_asignatura`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_asignatura` (`id_asignatura`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `cedula`
--
ALTER TABLE `cedula`
  ADD PRIMARY KEY (`id_cedula`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `asignatura_idasignatura` (`asignatura_idasignatura`);

--
-- Indices de la tabla `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`id_tipouser`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`userr`),
  ADD KEY `tipouser_Idtipouser` (`tipouser_Idtipouser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id_asignatura` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `cedula`
--
ALTER TABLE `cedula`
  MODIFY `id_cedula` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`userr`),
  ADD CONSTRAINT `calificaciones_ibfk_3` FOREIGN KEY (`id_asignatura`) REFERENCES `asignaturas` (`id_asignatura`);

--
-- Filtros para la tabla `cedula`
--
ALTER TABLE `cedula`
  ADD CONSTRAINT `cedula_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`userr`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`asignatura_idasignatura`) REFERENCES `asignaturas` (`id_asignatura`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipouser_Idtipouser`) REFERENCES `tipo_user` (`id_tipouser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

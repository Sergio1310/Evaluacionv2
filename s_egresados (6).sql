-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2019 a las 21:53:19
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
(30, 2, 201700063, 'Ingles', NULL, 0),
(31, 1, 201700064, 'Matematicas', '66.666666666667', 1),
(32, 2, 201700064, 'Ingles', '77.777777777778', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `id_evaluacion` int(20) NOT NULL,
  `Fecha` date NOT NULL,
  `calificacion` double NOT NULL,
  `asignatura_idasignatura` int(10) NOT NULL,
  `usuarios_user` int(20) NOT NULL
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
(67, 'pregunta1', 'pregunta67.png', 'opcion1', 'opcion1.png', 'opcion2', 'opcion2.png', 'opcion3', 'opcion3.png', 'opcion4', 'opcion4.png', '1', 1),
(81, 'pregunta2', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(82, 'pregunta3', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(83, 'pregunta4', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(84, 'pregunta5', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(87, 'pregunta6', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(88, 'pregunta7', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(89, 'pregunta8', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(90, 'pregunta9', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 1),
(96, 'inglespregunta1', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(97, 'inglespregunta2', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(98, 'inglespregunta3', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(99, 'inglespregunta4', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(100, 'inglespregunta5', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(101, 'inglespregunta6', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(102, 'inglespregunta7', NULL, 'ocion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(103, 'inglespregunta8', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2),
(104, 'inglespregunta9', NULL, 'opcion1', NULL, 'opcion2', NULL, 'opcion3', NULL, 'opcion4', NULL, '1', 2);

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
(201700063, '123456789', 2),
(201700064, '123456789', 2);

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
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD KEY `asignatura_idasignatura` (`asignatura_idasignatura`),
  ADD KEY `usuarios_user` (`usuarios_user`);

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
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`id_asignatura`) REFERENCES `asignaturas` (`id_asignatura`),
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`userr`);

--
-- Filtros para la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD CONSTRAINT `evaluaciones_ibfk_1` FOREIGN KEY (`asignatura_idasignatura`) REFERENCES `asignaturas` (`id_asignatura`),
  ADD CONSTRAINT `evaluaciones_ibfk_2` FOREIGN KEY (`usuarios_user`) REFERENCES `usuarios` (`userr`);

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

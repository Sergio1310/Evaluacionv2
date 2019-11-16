-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2019 a las 00:45:52
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `elimpreg` (`idpreg` INT(10))  BEGIN
DELETE FROM preguntas WHERE id_pregunta =idpreg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarusuario` (IN `useer` INT(20), `passw` VARCHAR(100), `usertype` INT(10))  INSERT into usuarios(userr,contra,tipouser_Idtipouser) VALUES(useer,passw,usertype)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nueva_matricula` (`useer` INT(20))  BEGIN
DECLARE pass varchar(100) DEFAULT '';
DECLARE tipo_us int(10) DEFAULT 2;
INSERT INTO usuarios(userr, contra, tipouser_Idtipouser) values(useer,pass,tipo_us );

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nueva_pregunta` (`pregun` TEXT, `asig_idasig` INT(11), `opci` INT(20), `preg_idpreg` INT(20), `resp` TINYINT(1))  BEGIN
	DECLARE l_pregunta_id INT DEFAULT 0;
	START TRANSACTION;
	-- Insert pregunta data
	INSERT INTO preguntas(pregunta, asignatura_idasignatura) VALUES ( pregunt, asig_idasig);
	
	-- get pregunta id
	SET l_pregunta_id = LAST_INSERT_ID();

	-- insert opciones
	IF l_pregunta_id > 0 THEN
	INSERT INTO opciones(opciones, pregunta_idpregunta, respuesta) VALUES (opci, l_pregunta_id, resp);
	-- commit
	COMMIT;
	ELSE
	ROLLBACK;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nueva_preguntav2` (`pre` TEXT, `op1` TEXT, `op2` TEXT, `op3` TEXT, `op4` TEXT, `resp` TEXT, `asi_idasig` INT(11))  BEGIN

INSERT INTO preguntas(pregunta, opcion1, opcion2, opcion3, opcion4, respuesta,asignatura_idasignatura) values(pre,op1,op2,op3,op4,resp,asi_idasig);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selpreguntas` (`idasig` INT(11))  SELECT pregunta FROM preguntas  where preguntas.asignatura_idasignatura=idasig ORDER BY RAND() LIMIT 30$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selusuarios` ()  BEGIN  
SELECT * FROM usuarios;
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
(2, 'Ingles', 0);

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
  `pregunta` text NOT NULL,
  `opcion1` text NOT NULL,
  `opcion2` text NOT NULL,
  `opcion3` text NOT NULL,
  `opcion4` text NOT NULL,
  `respuesta` text NOT NULL,
  `asignatura_idasignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `pregunta`, `opcion1`, `opcion2`, `opcion3`, `opcion4`, `respuesta`, `asignatura_idasignatura`) VALUES
(65, '3*4', '1', '2', '3', '4', '2', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `preguntasv`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `preguntasv` (
`id_pregunta` int(10)
,`nombre` varchar(30)
,`pregunta` text
,`opcion1` text
,`opcion2` text
,`opcion3` text
,`opcion4` text
,`respuesta` text
);

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
(201700060, '', 2);

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

-- --------------------------------------------------------

--
-- Estructura para la vista `preguntasv`
--
DROP TABLE IF EXISTS `preguntasv`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `preguntasv`  AS  select `p`.`id_pregunta` AS `id_pregunta`,`a`.`nombre` AS `nombre`,`p`.`pregunta` AS `pregunta`,`p`.`opcion1` AS `opcion1`,`p`.`opcion2` AS `opcion2`,`p`.`opcion3` AS `opcion3`,`p`.`opcion4` AS `opcion4`,`p`.`respuesta` AS `respuesta` from (`preguntas` `p` join `asignaturas` `a` on((`p`.`asignatura_idasignatura` = `a`.`id_asignatura`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id_asignatura`);

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
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Restricciones para tablas volcadas
--

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

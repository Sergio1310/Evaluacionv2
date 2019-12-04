-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2019 a las 20:17:07
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
`nombre` text
,`id_asignatura` int(10)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id_asignatura` int(10) NOT NULL,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id_asignatura`, `nombre`, `status`) VALUES
(12, 'Programación', 1);

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
(6, 12, 201700059, 'Programación', NULL, 0);

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

--
-- Volcado de datos para la tabla `cedula`
--

INSERT INTO `cedula` (`id_cedula`, `Apellido_P`, `Apellido_M`, `Nombre_S`, `Sexo`, `Curp`, `Estado_Civ`, `Ocupacion`, `Calle_Num`, `Colonia`, `Avenida`, `Codigo_P`, `Municipio`, `Estado`, `Ciudad`, `Telefono`, `Correo`, `Trabaja`, `Trabaja_C`, `Nombre_Emp`, `Direccion_Emp`, `Puesto`, `Nombre_Jefe`, `Telefono_Emp`, `Tiempo_Col`, `Sueldo_Men`, `CC_Trabajo`, `Tamaño_Emp`, `Tipo_Emp`, `Temas_Reforzar`, `Temas_COD`, `CI_Certificaciones`, `Tema_Incluir`, `id_user`, `status`) VALUES
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 201700059, 0);

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
  `pregunta` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `imagenPregunta` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `opcion1` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `imagenOpcion1` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `opcion2` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `imagenOpcion2` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `opcion3` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `imagenOpcion3` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `opcion4` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `imagenOpcion4` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `respuesta` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `asignatura_idasignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `pregunta`, `imagenPregunta`, `opcion1`, `imagenOpcion1`, `opcion2`, `imagenOpcion2`, `opcion3`, `imagenOpcion3`, `opcion4`, `imagenOpcion4`, `respuesta`, `asignatura_idasignatura`) VALUES
(193, 'kjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjkkjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjkkjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjkkjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjk', 'IDR_THEME_NTP_BACKGROUND (1).png', 'kjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjkkjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjkkjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjkkjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjkkjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjk', 'IDR_THEME_NTP_BACKGROUND (1).png', 'kjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjkkjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjkkjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjk', 'IDR_THEME_NTP_BACKGROUND (1).png', 'kjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjkkjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjk', 'IDR_THEME_NTP_BACKGROUND (1).png', 'kjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjkkjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjkkjhsajskajdbashgdkjabsdjajsdbkajsgdasbldkjasjh uha sjhdashdkj hasijdhkajsfashf jkashkdjhsakjdnakshdkjasdkjabskdjbakjsdbakjsdbjk', 'IDR_THEME_NTP_BACKGROUND (1).png', '2', 12);

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
(201700059, '123456789', 2);

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
  MODIFY `id_asignatura` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cedula`
--
ALTER TABLE `cedula`
  MODIFY `id_cedula` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

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

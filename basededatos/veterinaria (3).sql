-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2022 a las 02:48:58
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atender`
--

CREATE TABLE `atender` (
  `id_atender` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `peso` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `atender`
--

INSERT INTO `atender` (`id_atender`, `id_cita`, `fecha`, `peso`, `total`) VALUES
(11, 28, '2022-12-13', '2.00', '65000.00'),
(12, 29, '2022-12-13', '2.00', '28000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `id_mascota`, `motivo`, `fecha`, `hora`, `estado`) VALUES
(28, 36, 'Rabia', '2022-12-22', '02:30:00', 0),
(29, 37, 'Corte de pelo', '2022-12-14', '10:30:00', 0),
(30, 39, 'baño', '2022-12-15', '04:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id_detalle` int(11) NOT NULL,
  `id_atender` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id_detalle`, `id_atender`, `id_servicio`, `precio`, `descuento`) VALUES
(18, 11, 1, '30000.00', '5000.00'),
(19, 11, 9, '40000.00', '0.00'),
(20, 12, 1, '30000.00', '2000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id_mascota` int(11) NOT NULL,
  `id_propietario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `especie` varchar(50) NOT NULL,
  `raza` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id_mascota`, `id_propietario`, `nombre`, `fecha`, `edad`, `sexo`, `especie`, `raza`, `color`) VALUES
(36, 23, 'Chester', '2022-10-13', 3, 'Macho', 'PERRO', 'Labradores', 'negro'),
(37, 24, 'Kiara', '2021-12-13', 12, 'Hembra', 'PERRO', 'Husky', 'blanco-cafe'),
(38, 25, 'Toby', '2022-07-13', 5, 'Macho', 'PERRO', 'Pug', 'Gris'),
(39, 26, 'Baloo', '2022-09-13', 3, 'Hembra', 'PERRO', 'Pastor alemán', 'Negro-cafe'),
(40, 27, 'Goofy', '2022-06-13', 6, 'Macho', 'PERRO', 'Pug', 'negro'),
(41, 28, 'Canela', '2020-12-13', 24, 'Hembra', 'GATO', 'Angora turco', 'Blanco'),
(42, 29, 'Aquiles', '2021-12-13', 12, 'Macho', 'GATO', 'Bobtail del Mekong', 'Blanco-negro'),
(44, 31, 'moises', '2022-11-30', 23, 'Macho', 'PERRO', 'Pug', 'blanco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `id_medicamento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `fechaV` date NOT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`id_medicamento`, `nombre`, `descripcion`, `precio`, `fechaV`, `estado`) VALUES
(1, 'desparasitol', 'para la lombriz', 10000, '2020-09-23', 1),
(2, 'Ipronidazol', 'Agente antiprotozoico', 7000, '2024-07-17', 1),
(3, 'Azaperona', 'Tranquilizante', 3000, '2022-12-24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `id_propietario` int(11) NOT NULL,
  `num_documento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id_propietario`, `num_documento`, `nombre`, `telefono`, `direccion`, `email`) VALUES
(23, 105698457, 'Jose Vicente Granado', '3814000', 'Calle 10 # 5-51', 'gafeivuloxa-1023@yopmail.com'),
(24, 10459865, 'Luis Alfonso Encinas', '3814000', 'Calle 53 No 10-60/46', 'quoukeuddeuddotta-5224@yopmail.com'),
(25, 10259876, 'Eduardo Jose Infante', '3814000', 'Calle 10 # 5-51', 'truxinoixanne-8232@yopmail.com'),
(26, 10546895, 'Maria Julia Paez', '592-6001', 'Calle 9 # 9 – 62', 'teiwaullippouso-8472@yopmail.com'),
(27, 10325469, 'Gloria Maria Quintero', '885-0663', 'Carrera 21 # 17 -63', 'trettoidauxaxu-8451@yopmail.com'),
(28, 10459867, 'Jose Ramon Vicente', '885-0350', 'Calle 53 # 25A-35', 'paufraffaussassi-7071@yopmail.com'),
(29, 10245638, 'Jesus Maria Costas', '670-0555', 'Carrera 20 B # 29-18. Barrio Pie de la Popa', 'sammeicexacreu-8839@yopmail.com'),
(30, 10235468, 'Anna Maria Barrero', '333-98-98', 'Calle 7 # 19-35', 'vipokeuvonou-5672@yopmail.com'),
(31, 30115425, 'jose barrios', '3156658467', 'calle4', 'cebasa02@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `nombre`, `descripcion`, `precio`, `condicion`) VALUES
(1, 'Baño', 'Bañar mascota con peso 2 a 10 kg', '30000.00', 1),
(4, 'Consulta', 'Consulta general', '50000.00', 1),
(5, 'Peluquería', 'Corte de pelo', '20000.00', 1),
(9, 'Vacunación', 'aplicacion de la vacuna necesaria', '40000.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `num_documento` varchar(20) NOT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `imagen`, `condicion`) VALUES
(1, 'jose', 'DNI', '72154871', 'Calle los alpes 210', '547821', 'admin@gmail.com', 'Administrador', '1003502852', '2bcb4c485475e4c2871748721d7c72c3e8d647b0cfb58e5316df5df25e921ff3', '1670085215.png', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atender`
--
ALTER TABLE `atender`
  ADD PRIMARY KEY (`id_atender`,`id_cita`),
  ADD KEY `atender_ibfk_1` (`id_cita`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`,`id_mascota`),
  ADD KEY `mascota` (`id_mascota`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id_detalle`,`id_atender`,`id_servicio`),
  ADD KEY `detalle_ibfk_1` (`id_atender`),
  ADD KEY `detalle_ibfk_2` (`id_servicio`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id_mascota`,`id_propietario`),
  ADD KEY `id_propietario` (`id_propietario`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`id_propietario`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atender`
--
ALTER TABLE `atender`
  MODIFY `id_atender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `id_propietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atender`
--
ALTER TABLE `atender`
  ADD CONSTRAINT `atender_ibfk_1` FOREIGN KEY (`id_cita`) REFERENCES `cita` (`id_cita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`id_atender`) REFERENCES `atender` (`id_atender`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`id_propietario`) REFERENCES `propietario` (`id_propietario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

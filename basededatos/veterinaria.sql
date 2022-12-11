-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2022 a las 19:50:57
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
(1, 20, '2022-12-10', '4.00', '150000.00'),
(2, 18, '2022-12-10', '3.00', '170000.00'),
(3, 19, '2022-12-10', '22.00', '150000.00'),
(4, 15, '2022-12-10', '2.00', '170000.00'),
(5, 6, '2022-12-10', '3.00', '150000.00');

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
(6, 28, 'motivo', '2020-05-01', '12:20:00', 0),
(15, 28, 'Consulta generar', '2020-01-01', '01:00:00', 0),
(16, 30, 'motivo el que sea', '2020-05-01', '01:00:00', 0),
(18, 29, 'motivo el que sea', '2020-05-03', '17:01:00', 0),
(19, 28, 'Consulta generarfghjk', '2020-05-04', '02:00:00', 0),
(20, 32, 'limpieza', '2022-12-14', '04:06:00', 0);

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
(1, 1, 4, '150000.00', '20000.00'),
(2, 1, 1, '20000.00', '0.00'),
(3, 2, 1, '20000.00', '0.00'),
(4, 2, 4, '150000.00', '0.00'),
(5, 3, 4, '150000.00', '0.00'),
(6, 4, 1, '20000.00', '0.00'),
(7, 4, 4, '150000.00', '0.00'),
(8, 5, 4, '150000.00', '0.00');

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
(28, 6, 'Cesar David Barrios', '2020-05-13', 12, 'Hembra', 'PERRO', 'Rowailer', 'negro'),
(29, 6, 'Cesar David Barrios', '2020-05-13', 12, 'Hembra', 'PERRO', 'Rowailerr', 'negro'),
(30, 4, 'mayu', '2020-05-03', 2, 'Hembra', 'GATO', 'fina', 'negro'),
(31, 3, 'jose', '2020-05-01', 1, 'Macho', 'PERRO', 'Rowailer', 'negro'),
(32, 9, 'akira', '2022-12-21', 23, 'Hembra', 'PERRO', 'husky', 'negro y blanco');

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
(2, 1079502372, 'Cesar Barrio', '3113176868', 'barrio san rafael carrera 19 # -37', 'cebasa02@gmail.com'),
(3, 1012502378, 'Pedro contreras', '3113176868', 'barrio san  jose carrera 9 # -37', 'pedrojose@gmail.com'),
(4, 1069502378, 'maira barrios', '2147483647', 'barrio san rafael carrera 19 # -37', 'maira@gmail.com'),
(5, 1069412374, 'Maria Carmen Barrios', '3124136868', 'Barrio San Rafael', 'carmen@gmail.com'),
(6, 1069783877, 'Junior Barrios Arrieta', '78954263', 'Barrio San Rafael carrera 19 # 3 -43', 'junior@gmail.com'),
(9, 10036245, 'andres calle', '315246987', 'c14#13', 'jose@gmail.com');

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
(1, 'baño', 'bañar mascota con peso 2 a 10 kg', '20000.00', 1),
(4, 'operacion', 'eficaz', '150000.00', 1);

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
(1, 'angel', 'DNI', '72154871', 'Calle los alpes 210', '547821', 'admin@gmail.com', 'Administrador', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '1670085215.png', 1),
(8, 'Jose barrios Salgado', '', '1003512698', 'Cr19 3-37', '3156658978', 'josealfredobarriossalgado@gmail.com', NULL, 'josebarrios', '3fb9bf21fb54b5fc39cb886057d6efed6dc5e0614a13665e96723288328f8280', '1670616458.png', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atender`
--
ALTER TABLE `atender`
  ADD PRIMARY KEY (`id_atender`,`id_cita`),
  ADD KEY `id_cita` (`id_cita`);

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
  ADD KEY `id_atender` (`id_atender`),
  ADD KEY `id_servicio` (`id_servicio`);

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
  MODIFY `id_atender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `id_propietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atender`
--
ALTER TABLE `atender`
  ADD CONSTRAINT `atender_ibfk_1` FOREIGN KEY (`id_cita`) REFERENCES `cita` (`id_cita`);

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`);

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`id_atender`) REFERENCES `atender` (`id_atender`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`);

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`id_propietario`) REFERENCES `propietario` (`id_propietario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

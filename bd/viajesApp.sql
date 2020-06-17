-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2020 a las 21:50:40
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `viajesapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alojamientos`
--

CREATE TABLE `alojamientos` (
  `id_alojamiento` int(11) NOT NULL,
  `id_viaje` int(11) DEFAULT NULL,
  `nombre` varchar(40) NOT NULL,
  `ciudad` varchar(40) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `descripcion` varchar(120) DEFAULT NULL,
  `contacto` varchar(40) DEFAULT NULL,
  `cod_confirmacion` varchar(20) DEFAULT NULL,
  `checkin` varchar(20) DEFAULT NULL,
  `checkout` varchar(20) DEFAULT NULL,
  `cant_noches` int(11) DEFAULT NULL,
  `cant_habitacion` int(11) DEFAULT NULL,
  `cant_pasajeros` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alojamientos`
--

INSERT INTO `alojamientos` (`id_alojamiento`, `id_viaje`, `nombre`, `ciudad`, `fecha_inicio`, `fecha_fin`, `descripcion`, `contacto`, `cod_confirmacion`, `checkin`, `checkout`, `cant_noches`, `cant_habitacion`, `cant_pasajeros`) VALUES
(1, 1, 'Hotel Moreno', 'Mar del Plata', '2020-07-23', NULL, 'Contactar al hotel para confirmar las habitaciones', NULL, '7u5e64w54w64', 'jfhgcf', 'jkghvhjv', 2, 2, 2),
(2, 1, 'Hotelito', 'Mar chiquita', '2020-07-23', NULL, 'hntxhxgfx', 'lll', 'ghtchc', 'ghfxcfxfg', NULL, 4, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `id_viaje` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `destino` varchar(40) DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `finalizado` tinyint(1) NOT NULL DEFAULT '0',
  `descripcion` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`id_viaje`, `titulo`, `destino`, `fecha_inicio`, `fecha_fin`, `finalizado`, `descripcion`) VALUES
(1, 'Viaje amigos', NULL, '2020-07-23', NULL, 1, 'testeando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE `vuelo` (
  `id_viaje` int(11) NOT NULL,
  `id_vuelo` int(11) NOT NULL,
  `salida` varchar(20) NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_salida` time NOT NULL,
  `llegada` varchar(20) NOT NULL,
  `fecha_llegada` date NOT NULL,
  `hora_llegada` time NOT NULL,
  `duracion_vuelo` time DEFAULT NULL,
  `cod_salida` varchar(20) NOT NULL,
  `cod_llegada` varchar(20) NOT NULL,
  `cod_reserva` varchar(20) NOT NULL,
  `huella_carbono` varchar(30) DEFAULT NULL,
  `aerolinea` varchar(35) NOT NULL,
  `cod_vuelo` varchar(20) NOT NULL,
  `tipo_avion` varchar(15) NOT NULL,
  `cant_pasajeros` int(11) DEFAULT NULL,
  `notas` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`id_viaje`, `id_vuelo`, `salida`, `fecha_salida`, `hora_salida`, `llegada`, `fecha_llegada`, `hora_llegada`, `duracion_vuelo`, `cod_salida`, `cod_llegada`, `cod_reserva`, `huella_carbono`, `aerolinea`, `cod_vuelo`, `tipo_avion`, `cant_pasajeros`, `notas`) VALUES
(1, 1, '12', '2020-06-17', '02:00:00', 'wdf', '2020-06-18', '02:12:00', '12:00:00', '2323423', 'efcsdcsd', 'sdfwefwe', NULL, 'sdcsdcsdcac', 'ascacasccsdc', 'sas', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alojamientos`
--
ALTER TABLE `alojamientos`
  ADD PRIMARY KEY (`id_alojamiento`),
  ADD KEY `viaje` (`id_viaje`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id_viaje`);

--
-- Indices de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`id_vuelo`),
  ADD KEY `vuelo_viaje` (`id_viaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alojamientos`
--
ALTER TABLE `alojamientos`
  MODIFY `id_alojamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `id_vuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alojamientos`
--
ALTER TABLE `alojamientos`
  ADD CONSTRAINT `viaje` FOREIGN KEY (`id_viaje`) REFERENCES `viajes` (`id_viaje`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `vuelo_viaje` FOREIGN KEY (`id_viaje`) REFERENCES `viajes` (`id_viaje`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2017 a las 10:46:34
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria`) VALUES
('bmx'),
('carretera'),
('casco'),
('componentes'),
('herramientas'),
('montana'),
('ropa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `mensaje` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `leido` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`codigo`, `nombre`, `telefono`, `mensaje`, `email`, `leido`) VALUES
(1, 'JesÃºs', 666666666, 'Mensaje de prueba', 'jalarrodera@gmail.com', 'si'),
(2, 'Alberto', 888888888, 'Otro mensajito', 'juantorroja@yahoo.es', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `marca` varchar(25) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `categoria` varchar(25) NOT NULL,
  `descuento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `nombre`, `precio`, `stock`, `marca`, `imagen`, `categoria`, `descuento`) VALUES
('casc', 'Casco molon', 11, 121, 'rrrr', 'foto', 'casco', 11),
('test', 'casto test', 10, 10, 'gogo', '', 'casco', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rol` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `email`, `rol`, `password`) VALUES
('werwer', '2131@sd.es', 'cliente', '1234'),
('Alberto Lopez', 'alopez@lopez.es', 'cliente', ''),
('coco', 'cocoloco@coco.es', 'cliente', 'root'),
('Fernando', 'fernando@sas.es', 'cliente', '1234'),
('Jesus Larrodera', 'jalarrodera@gmail.com', 'admin', '81dc9bdb52d04dc20036dbd8313ed055'),
('fdf', 'jesus0987654321234567890@gmail.com', 'rol', 'root'),
('pepepe', 'p@m.es', 'rol', 'root');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `clave_foranea` (`categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `clave_foranea` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

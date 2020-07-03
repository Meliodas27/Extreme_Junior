-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2020 a las 00:38:24
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqpeticiones`
--

CREATE TABLE `pqpeticiones` (
  `PID` int(11) NOT NULL,
  `PTIPO` tinyint(4) NOT NULL,
  `PESTADO` tinyint(4) NOT NULL,
  `PFECHASYS` date NOT NULL,
  `PFECHATRANSLIMIT` date NOT NULL,
  `PASUNTO` mediumtext NOT NULL,
  `USID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pqpeticiones`
--

INSERT INTO `pqpeticiones` (`PID`, `PTIPO`, `PESTADO`, `PFECHASYS`, `PFECHATRANSLIMIT`, `PASUNTO`, `USID`) VALUES
(23, 2, 2, '2020-07-04', '2020-07-07', 'Verificar el funcionamiento', 1),
(24, 1, 3, '2020-07-04', '2020-07-11', 'Prueba#1', 1),
(25, 3, 3, '2020-07-04', '2020-07-06', '                Pesimo servicio', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqusuarios`
--

CREATE TABLE `pqusuarios` (
  `USID` int(11) NOT NULL,
  `USNOMBRE` varchar(45) NOT NULL,
  `USCORREO` varchar(45) NOT NULL,
  `USCONTRASENA` varchar(45) NOT NULL,
  `USROL` tinyint(4) NOT NULL,
  `USESTADO` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pqusuarios`
--

INSERT INTO `pqusuarios` (`USID`, `USNOMBRE`, `USCORREO`, `USCONTRASENA`, `USROL`, `USESTADO`) VALUES
(1, 'Administrador', 'admin@admin.com', '123456', 1, 1),
(2, 'Juan Alvarez', 'j@j.com', '123abc', 2, 1),
(3, 'juanito alimaña', 'f@f.com', '1234569', 2, 1),
(4, 'asd asd', 'f@f', '56', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pqpeticiones`
--
ALTER TABLE `pqpeticiones`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `pd_index` (`USID`);

--
-- Indices de la tabla `pqusuarios`
--
ALTER TABLE `pqusuarios`
  ADD PRIMARY KEY (`USID`),
  ADD UNIQUE KEY `USCORREO` (`USCORREO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pqpeticiones`
--
ALTER TABLE `pqpeticiones`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `pqusuarios`
--
ALTER TABLE `pqusuarios`
  MODIFY `USID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pqpeticiones`
--
ALTER TABLE `pqpeticiones`
  ADD CONSTRAINT `FK_USID` FOREIGN KEY (`USID`) REFERENCES `pqusuarios` (`USID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

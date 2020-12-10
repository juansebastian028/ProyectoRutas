-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2020 a las 17:46:22
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `softwarebuses`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `Perfilid` int(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`Perfilid`, `Nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `RutaId` int(11) NOT NULL,
  `Numero` int(2) DEFAULT NULL,
  `Placa` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`RutaId`, `Numero`, `Placa`) VALUES
(22, 17, 'WHI100'),
(23, 33, 'WHI202'),
(24, 44, 'WHI104'),
(25, 16, 'WHI301'),
(26, 28, 'WHI203'),
(27, 23, 'WHI102'),
(28, 43, 'WHI304');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trayecto`
--

CREATE TABLE `trayecto` (
  `Trayectoid` int(100) NOT NULL,
  `Trayecto` varchar(100) NOT NULL,
  `Tipo` varchar(100) NOT NULL,
  `RutaId` int(11) DEFAULT NULL,
  `Latitud` varchar(255) DEFAULT NULL,
  `Longitud` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trayecto`
--

INSERT INTO `trayecto` (`Trayectoid`, `Trayecto`, `Tipo`, `RutaId`, `Latitud`, `Longitud`) VALUES
(118, 'El poblado', 'Vuelta', 22, '4.802091267928006', '-75.70386971435569'),
(115, 'Valher', 'Ida', 22, '4.822446962331185', '-75.68146790464485'),
(116, 'Santa Mónica', 'Ida', 22, '4.825947627690155', '-75.6797486751217'),
(123, 'Estadio', 'Ida', 24, '4.804536103886534', '-75.75210115211601'),
(119, 'La Romelia', 'Ida', 23, '4.856574420662795', '-75.65553474603358'),
(120, 'Los Molinos', 'Ida', 23, '4.835440244702653', '-75.66366546345161'),
(121, 'UTP', 'Vuelta', 23, '4.7950246912853345', '-75.68857549999969'),
(122, 'Providencia', 'Vuelta', 23, '4.803285736701767', '-75.69768339522615'),
(117, 'Villa Verde', 'Vuelta', 22, '4.793400092475821', '-75.71028547652287'),
(114, 'Frailes', 'Ida', 22, '4.829295193085883', '-75.68707275563106'),
(124, 'Avda. 30 de Agosto', 'Ida', 24, '4.812539235953963', '-75.70834354232679'),
(125, 'El progreso', 'Vuelta', 24, '4.83179540574524', '-75.66842028065925'),
(134, 'Kennedy', 'Vuelta', 25, '4.808762528913633', '-75.67219819032421'),
(133, 'Álamos', 'Ida', 25, '4.7977801059658844', '-75.68990798749576'),
(132, 'La Virginia', 'Ida', 25, '4.8992282864538055', '-75.8819331545062'),
(135, 'Terminal de transportes', 'Ida', 26, '4.801648235269354', '-75.6933219999995'),
(136, 'Belmonte B', 'Vuelta', 26, '4.808899828852276', '-75.76167478266633'),
(137, 'Milán', 'Ida', 27, '4.829407527978304', '-75.67275608986267'),
(138, 'Centro', 'Vuelta', 27, '4.814294145908846', '-75.69458072883673'),
(142, 'Villa Verde', 'Ida', 28, '4.793452743219163', '-75.71034993133566'),
(141, 'Samaria', 'Ida', 28, '4.7967575663761295', '-75.70903282690635'),
(143, 'La Isla', 'Vuelta', 28, '4.797173309335051', '-75.66640461886172');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Usuarioid` int(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Contrasena` varchar(100) NOT NULL,
  `Perfilid` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Usuarioid`, `Nombre`, `Apellido`, `Usuario`, `Contrasena`, `Perfilid`) VALUES
(26, 'Juan Sebastián', 'Vargas', 'juanvargas123', '$2y$10$vjCJlgXu8hDTlaC.TIf2huigzK9eH53.CDTXgLrSDvSdIUO9KqP06', 1),
(28, 'Alejo', 'Morales', 'alejo123', '$2y$10$8Igf.uAXFB50mhCp/Tt7du.klWTP/rwiMiWPxlH0gPdohn9ZRMm0u', 2),
(29, 'Juan Carlos ', 'Maya', 'juanmaya', '$2y$10$QP5jqKiwsjmt7dVvv8.20uHILGp7iuS7VsoKcTF3OqVQ3bN6cgR0W', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`Perfilid`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`RutaId`);

--
-- Indices de la tabla `trayecto`
--
ALTER TABLE `trayecto`
  ADD PRIMARY KEY (`Trayectoid`),
  ADD KEY `Rutaid` (`RutaId`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Usuarioid`),
  ADD KEY `Perfilid` (`Perfilid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `Perfilid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `RutaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `trayecto`
--
ALTER TABLE `trayecto`
  MODIFY `Trayectoid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Usuarioid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

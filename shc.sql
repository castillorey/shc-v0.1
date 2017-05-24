-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2017 a las 23:57:45
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajasdetomas`
--

CREATE TABLE `cajasdetomas` (
  `idcajasdetomas` bigint(20) NOT NULL,
  `idphoton` varchar(500) NOT NULL,
  `ubicacion` varchar(500) NOT NULL,
  `usuarios_idusuario` bigint(50) NOT NULL,
  `estadohorario` enum('encender','apagar') NOT NULL,
  `dispositivo1` varchar(100) NOT NULL,
  `dispositivo2` varchar(100) NOT NULL,
  `estado` tinyint(4) DEFAULT '0',
  `colorBg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cajasdetomas`
--

INSERT INTO `cajasdetomas` (`idcajasdetomas`, `idphoton`, `ubicacion`, `usuarios_idusuario`, `estadohorario`, `dispositivo1`, `dispositivo2`, `estado`, `colorBg`) VALUES
(20, '8675', 'wwef', 1, 'encender', '', 'lampara', 0, '#009688');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos`
--

CREATE TABLE `codigos` (
  `id` bigint(20) NOT NULL,
  `codigo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `codigos`
--

INSERT INTO `codigos` (`id`, `codigo`) VALUES
(1, 'ejD4ER.98'),
(2, 'mn54E3i4rR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `idhorario` bigint(20) NOT NULL,
  `dia` enum('domingo','lunes','martes','miercoles','jueves','viernes','sabado') NOT NULL,
  `hora_encendido` time NOT NULL,
  `hora_apagado` time NOT NULL,
  `cajasdetomas_idcajasdetomas` bigint(20) NOT NULL,
  `usuarios_idusuario` bigint(20) NOT NULL,
  `ubicacionCajadetomas` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` bigint(20) NOT NULL,
  `correo` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `correo`, `password`, `estado`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cajasdetomas`
--
ALTER TABLE `cajasdetomas`
  ADD PRIMARY KEY (`idcajasdetomas`);

--
-- Indices de la tabla `codigos`
--
ALTER TABLE `codigos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`idhorario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cajasdetomas`
--
ALTER TABLE `cajasdetomas`
  MODIFY `idcajasdetomas` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `codigos`
--
ALTER TABLE `codigos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `idhorario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 20-11-2014 a las 16:38:07
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
`codigo` int(11) NOT NULL,
  `titulo` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `autor` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `editorial` varchar(25) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `genero` enum('drama','ciencia ficción','intriga','otros') CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `paginas` int(11) DEFAULT NULL,
  `fechaLanzamiento` date DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`codigo`, `titulo`, `autor`, `editorial`, `genero`, `paginas`, `fechaLanzamiento`, `precio`) VALUES
(1, 'Cabo Trafalgar', 'Arturo Pérez Reverte', 'Anaya', 'otros', NULL, NULL, NULL),
(2, 'El juego de Ender', 'Orson Scott Card', 'AAA', 'ciencia ficción', NULL, NULL, NULL),
(3, 'La historia interminable', 'Michael Ende', 'BBB', 'ciencia ficción', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
 ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

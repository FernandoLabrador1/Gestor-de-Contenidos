-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-01-2023 a las 17:56:29
-- Versión del servidor: 8.0.27
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sma`
--
CREATE DATABASE IF NOT EXISTS `sma` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `sma`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginas`
--

DROP TABLE IF EXISTS `paginas`;
CREATE TABLE IF NOT EXISTS `paginas` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TITULO` varchar(256) NOT NULL,
  `CONTENIDO` varchar(256) NOT NULL,
  `USUARIO` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `paginas`
--

INSERT INTO `paginas` (`ID`, `TITULO`, `CONTENIDO`, `USUARIO`) VALUES
(29, '<h2>Página 3</h2>', 'Soy la <b>página</b> <i> 3</i> del <u>usuario 1</u>', 'usuario1'),
(27, '<h2>Página 2</h2>', 'Soy la <b>página</b> <i> 2</i> del <u>usuario 1</u>', 'usuario1'),
(26, '<h2>Página 1</h2>', 'Soy la <b>página</b> <i> 1</i> del <u>usuario 1</u>', 'usuario1'),
(31, '<h2>Página 2</h2>', 'Soy la <b>página</b> <i> 2</i> del <u>usuario 2</u>', 'usuario2'),
(32, '<h2>Página 3</h2>', 'Soy la <b>página</b> <i> 3</i> del <u>usuario 2</u>', 'usuario2'),
(30, '<h2>Página 1</h2>', 'Soy la <b>página</b> <i> 1</i> del <u>usuario 2</u>', 'usuario2'),
(36, '<h2>Página 1</h2>', 'Soy la <b>página</b> <i> 1</i> del <u>usuario 3</u>', 'usuario3'),
(37, '<h2>Página 2</h2>', 'Soy la <b>página</b> <i> 2</i> del <u>usuario 3</u>', 'usuario3'),
(38, '<h2>Página 3</h2>', 'Soy la <b>página</b> <i> 3</i> del <u>usuario 3</u>', 'usuario3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `USUARIO` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `PASSWORD` varchar(256) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`USUARIO`, `PASSWORD`) VALUES
('usuario1', '$2y$10$hOPUUNfCS2qNUuVd75uCc.dZmR1/zJEk1z2d9o06mfRPnSMCV4ye2'),
('usuario2', '$2y$10$RYuvl3Cd4BbdzPvqgE359u5pTY5yu9o2LUx78L9FpWjBH7AQrmdom'),
('usuario3', '$2y$10$/Ls9aPOHzCv8IuemXoJk9.y6l9SbkQX47UAwo4G1JUIYDHJqrbTCC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

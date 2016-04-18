-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-02-2015 a las 17:42:09
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ventapollo`
--

-- --------------------------------------------------------

--
-- Estructura para la vista `vistaxruta`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistaxruta` AS select `vistaperiodo`.`fecha` AS `fecha`,`vistaperiodo`.`cliente` AS `cliente`,`vistaperiodo`.`cantidad` AS `cantidad`,`vistaperiodo`.`kilos` AS `kilos`,`vistaperiodo`.`importe` AS `importe`,`vistaperiodo`.`precioXkilo` AS `precioXkilo`,`vistaperiodo`.`abono` AS `abono`,`vistaperiodo`.`bonificacion` AS `bonificacion`,`vistaperiodo`.`saldoanterior` AS `saldoanterior`,`vistaperiodo`.`saldoDelDia` AS `saldoDelDia`,`clientes`.`ruta` AS `ruta`,`clientes`.`nombre` AS `nombre` from (`clientes` join `vistaperiodo`) where (`clientes`.`id` = `vistaperiodo`.`cliente`);

--
-- VIEW  `vistaxruta`
-- Datos: Ninguna
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

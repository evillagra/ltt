-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2015 a las 22:29:24
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tenemostodo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_oc`
--

CREATE TABLE IF NOT EXISTS `detalle_oc` (
  `id_oc` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compras`
--

CREATE TABLE IF NOT EXISTS `orden_compras` (
`id_oc` int(11) NOT NULL,
  `fecha_emision` date DEFAULT NULL,
  `total_oc` decimal(10,2) DEFAULT NULL,
  `estado` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
`id_perfil` int(11) NOT NULL,
  `descripcion_perfil` varchar(30) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `descripcion_perfil`) VALUES
(1, 'Admin'),
(2, 'Vendedor'),
(3, 'Reportes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id_producto` int(11) NOT NULL,
  `descripcion` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `unidad` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE IF NOT EXISTS `tipo_producto` (
  `id_tipoproducto` int(11) NOT NULL,
  `descripcion_tipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_usuario` int(11) NOT NULL,
  `login_usuario` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `pass_usuario` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `nombre_usuario` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `apellido_usuario` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `correo_usuario` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `edad_usuario` int(11) DEFAULT NULL,
  `codigo_perfil` int(11) DEFAULT NULL,
  `fechanacimiento_usuario` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `login_usuario`, `pass_usuario`, `nombre_usuario`, `apellido_usuario`, `correo_usuario`, `edad_usuario`, `codigo_perfil`, `fechanacimiento_usuario`) VALUES
(8, 'evc', '81dc9bdb52d04dc20036dbd8313ed055', 'Enrique', 'Villagra', 'e@e.cl', 34, 1, '2014-07-12'),
(15, 'ag', '81dc9bdb52d04dc20036dbd8313ed055', 'Aram', 'GOmez', 'w@w.cl', 44, 2, '2013-02-04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_oc`
--
ALTER TABLE `detalle_oc`
 ADD PRIMARY KEY (`id_oc`,`id_producto`), ADD KEY `fk_reference_4` (`id_producto`);

--
-- Indices de la tabla `orden_compras`
--
ALTER TABLE `orden_compras`
 ADD PRIMARY KEY (`id_oc`), ADD KEY `fk_reference_2` (`id_usuario`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
 ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id_producto`), ADD KEY `fk_reference_5` (`id_tipo`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
 ADD PRIMARY KEY (`id_tipoproducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_usuario`), ADD KEY `fk_reference_1` (`codigo_perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `orden_compras`
--
ALTER TABLE `orden_compras`
MODIFY `id_oc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_oc`
--
ALTER TABLE `detalle_oc`
ADD CONSTRAINT `fk_reference_3` FOREIGN KEY (`id_oc`) REFERENCES `orden_compras` (`id_oc`),
ADD CONSTRAINT `fk_reference_4` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `orden_compras`
--
ALTER TABLE `orden_compras`
ADD CONSTRAINT `fk_reference_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
ADD CONSTRAINT `fk_reference_5` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_producto` (`id_tipoproducto`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `fk_reference_1` FOREIGN KEY (`codigo_perfil`) REFERENCES `perfil` (`id_perfil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

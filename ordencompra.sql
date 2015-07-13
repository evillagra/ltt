/*
SQLyog Enterprise - MySQL GUI v6.06
Host - 5.6.16 : Database - tenemostodo
*********************************************************************
Server version : 5.6.16
*/
/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `tenemostodo`;

USE `tenemostodo`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `detalle_oc` */

DROP TABLE IF EXISTS `detalle_oc`;

CREATE TABLE `detalle_oc` (
  `id_oc` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_oc`,`id_producto`),
  KEY `fk_reference_4` (`id_producto`),
  CONSTRAINT `fk_reference_4` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  CONSTRAINT `fk_reference_3` FOREIGN KEY (`id_oc`) REFERENCES `orden_compras` (`id_oc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detalle_oc` */

/*Table structure for table `orden_compras` */

DROP TABLE IF EXISTS `orden_compras`;

CREATE TABLE `orden_compras` (
  `id_oc` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_emision` date DEFAULT NULL,
  `total_oc` decimal(10,2) DEFAULT NULL,
  `estado` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_oc`),
  KEY `fk_reference_2` (`id_usuario`),
  CONSTRAINT `fk_reference_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `orden_compras` */

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_perfil` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `perfil` */

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `unidad` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_reference_5` (`id_tipo`),
  CONSTRAINT `fk_reference_5` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_producto` (`id_tipoproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `productos` */

/*Table structure for table `tipo_producto` */

DROP TABLE IF EXISTS `tipo_producto`;

CREATE TABLE `tipo_producto` (
  `id_tipoproducto` int(11) NOT NULL,
  `descripcion_tipo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_tipoproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipo_producto` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `login_usuario` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `pass_usuario` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `nombre_usuario` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `apellido_usuario` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `correo_usuario` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `edad_usuario` int(11) DEFAULT NULL,
  `codigo_perfil` int(11) DEFAULT NULL,
  `fechanacimiento_usuario` date DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_reference_1` (`codigo_perfil`),
  CONSTRAINT `fk_reference_1` FOREIGN KEY (`codigo_perfil`) REFERENCES `perfil` (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

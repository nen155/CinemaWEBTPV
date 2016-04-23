-- Adminer 3.2.1 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `Empleado`;
CREATE TABLE `Empleado` (
  `login` varchar(80) NOT NULL,
  `clave` varchar(40) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` varchar(9) NOT NULL,
  PRIMARY KEY  (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Empleado` (`login`, `clave`, `nombre`, `apellidos`, `dni`) VALUES
('admin',	'admin',	'admin',	'admin',	'11111111h'),


DROP TABLE IF EXISTS `Fichar`;
CREATE TABLE `Fichar` (
  `loginFichar` varchar(80) NOT NULL,
  `ficharEntrada` datetime NOT NULL,
  `ficharSalida` datetime NOT NULL,
  PRIMARY KEY  (`loginFichar`,`ficharEntrada`),
  CONSTRAINT `Fichar_ibfk_1` FOREIGN KEY (`loginFichar`) REFERENCES `Empleado` (`login`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Pelicula`;
CREATE TABLE `Pelicula` (
  `idPelicula` int(11) NOT NULL auto_increment,
  `nombrePelicula` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `cartel` varchar(100) character set ucs2 NOT NULL,
  `genero` varchar(100) NOT NULL,
  `director` varchar(50) NOT NULL,
  `interpretes` text NOT NULL,
  `calificacion` varchar(100) NOT NULL,
  `trailler` varchar(200) NOT NULL,
  `duracion` int(11) NOT NULL,
  `tresD` tinyint(4) default NULL,
  `vo` tinyint(4) default NULL,
  `vos` tinyint(4) default NULL,
  `vd` tinyint(4) default NULL,
  `treintaycincomm` tinyint(4) default NULL,
  `digital` tinyint(4) default NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `salaProyeccion` int(11) default NULL,
  PRIMARY KEY  (`idPelicula`),
  KEY `salaProyeccion` (`salaProyeccion`),
  CONSTRAINT `Pelicula_ibfk_1` FOREIGN KEY (`salaProyeccion`) REFERENCES `Sala` (`numeroSala`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Precio`;
CREATE TABLE `Precio` (
  `fechaPrecio` datetime NOT NULL,
  `precioBase` double default NULL,
  `miercoles` float default NULL,
  `gafas` float default NULL,
  `especial` float default NULL,
  `iva` float default NULL,
  `tresD` float NOT NULL,
  `digital` float NOT NULL,
  PRIMARY KEY  (`fechaPrecio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Precio` (`fechaPrecio`, `precioBase`, `miercoles`, `gafas`, `especial`, `iva`, `tresD`, `digital`) VALUES
('0000-00-00 00:00:00',	4,	-1,	0,	-1,	18,	2,	2);

DROP TABLE IF EXISTS `Sala`;
CREATE TABLE `Sala` (
  `numeroSala` int(11) NOT NULL auto_increment,
  `numeroButacas` int(11) NOT NULL,
  `numeroFilas` int(11) NOT NULL,
  `ocupada` tinyint(4) default NULL,
  PRIMARY KEY  (`numeroSala`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `Sala` (`numeroSala`, `numeroButacas`, `numeroFilas`, `ocupada`) VALUES
(1,	24,	14,	1),
(2,	24,	14,	1),
(3,	24,	14,	1),
(4,	24,	14,	1),
(5,	24,	14,	1),
(6,	24,	14,	1),
(7,	24,	14,	1),
(8,	24,	14,	1);

DROP TABLE IF EXISTS `Ticket`;
CREATE TABLE `Ticket` (
  `idTicket` int(11) NOT NULL auto_increment,
  `fechaExpedicion` datetime NOT NULL,
  `tipoExpedicion` enum('taquilla','web') default NULL,
  `tipoCobro` enum('cash','visa','otro') default NULL,
  `fechaSesion` datetime NOT NULL,
  `horaSesion` datetime NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `salaProyeccion` int(11) NOT NULL,
  `fila` int(11) NOT NULL,
  `butaca` int(11) NOT NULL,
  `precioTotal` float NOT NULL,
  `comprobado` tinyint(4) NOT NULL,
  `loginFichar` varchar(80) NOT NULL,
  `compra` int(11) null,
  PRIMARY KEY  (`idTicket`),
  KEY `salaProyeccion` (`salaProyeccion`),
  KEY `idPelicula` (`idPelicula`),
  KEY `loginFichar` (`loginFichar`),
  CONSTRAINT `Ticket_ibfk_1` FOREIGN KEY (`salaProyeccion`) REFERENCES `Sala` (`numeroSala`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Ticket_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `Pelicula` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Ticket_ibfk_3` FOREIGN KEY (`loginFichar`) REFERENCES `Fichar` (`loginFichar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;


-- 2012-06-04 12:41:05

-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.7.19


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema academiacead
--

CREATE DATABASE IF NOT EXISTS academiacead;
USE academiacead;

--
-- Definition of table `tbl_alumnos`
--

DROP TABLE IF EXISTS `tbl_alumnos`;
CREATE TABLE `tbl_alumnos` (
  `Id_Alumno` int(11) NOT NULL AUTO_INCREMENT,
  `PrimerNombre` varchar(15) NOT NULL,
  `SegundoNombre` varchar(15) DEFAULT NULL,
  `PrimerApellido` varchar(15) NOT NULL,
  `SegundoApellido` varchar(15) DEFAULT NULL,
  `FechaNacimiento` date NOT NULL,
  `Cedula` decimal(13,0) NOT NULL,
  `Telefono` decimal(12,0) NOT NULL,
  `FechaIngreso` date NOT NULL,
  `Id_genero` int(11) NOT NULL,
  `Id_estadocivil` int(11) NOT NULL,
  PRIMARY KEY (`Id_Alumno`),
  KEY `fkIdx_gen_alum` (`Id_genero`),
  KEY `fkIdx_estcivil_alum` (`Id_estadocivil`),
  CONSTRAINT `FK_estcivil_alum` FOREIGN KEY (`Id_estadocivil`) REFERENCES `tbl_estadocivil` (`Id_estadocivil`),
  CONSTRAINT `FK_gen_alum` FOREIGN KEY (`Id_genero`) REFERENCES `tbl_genero` (`Id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alumnos`
--

/*!40000 ALTER TABLE `tbl_alumnos` DISABLE KEYS */;
INSERT INTO `tbl_alumnos` (`Id_Alumno`,`PrimerNombre`,`SegundoNombre`,`PrimerApellido`,`SegundoApellido`,`FechaNacimiento`,`Cedula`,`Telefono`,`FechaIngreso`,`Id_genero`,`Id_estadocivil`) VALUES 
 (1,'ANA','MARIA','CRUZ','PAZ','1976-10-10','1008196704567','22789044','2018-10-10',1,1),
 (2,'Juan','PABLO','PINEDA','PONCE','1978-12-31','107197809360','22780041','2018-10-10',2,2),
 (3,'ROSA','RITA','MEDRANO','REINA','2010-04-03','801201008754','22345678','2018-10-17',1,1),
 (4,'LIA','ISA','RIVERA',' ','2007-03-03','807201708653','22345632','2018-10-17',1,1),
 (5,'LUNA','BELLA','CHECK','PAZ','1996-03-03','807199608653','22348902','2018-10-17',1,2);
/*!40000 ALTER TABLE `tbl_alumnos` ENABLE KEYS */;


--
-- Definition of table `tbl_asistencia`
--

DROP TABLE IF EXISTS `tbl_asistencia`;
CREATE TABLE `tbl_asistencia` (
  `Id_asistencia` int(11) NOT NULL AUTO_INCREMENT,
  `Asistencia` decimal(4,0) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `Id_Clase` int(11) NOT NULL,
  `Id_Empleado` int(11) NOT NULL,
  PRIMARY KEY (`Id_asistencia`),
  KEY `fkIdx_Clas_Asis` (`Id_Clase`),
  KEY `fkIdx_Pers_Asis` (`Id_Empleado`),
  CONSTRAINT `FK_Clas_Asis` FOREIGN KEY (`Id_Clase`) REFERENCES `tbl_clases` (`Id_Clase`),
  CONSTRAINT `FK_Pers_Asis` FOREIGN KEY (`Id_Empleado`) REFERENCES `tbl_personal` (`Id_Empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_asistencia`
--

/*!40000 ALTER TABLE `tbl_asistencia` DISABLE KEYS */;
INSERT INTO `tbl_asistencia` (`Id_asistencia`,`Asistencia`,`Fecha`,`Id_Clase`,`Id_Empleado`) VALUES 
 (1,'1','2018-10-17',1,1);
/*!40000 ALTER TABLE `tbl_asistencia` ENABLE KEYS */;


--
-- Definition of table `tbl_bitacora`
--

DROP TABLE IF EXISTS `tbl_bitacora`;
CREATE TABLE `tbl_bitacora` (
  `Id_Bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Accion` varchar(20) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `Id_Objeto` int(11) NOT NULL,
  PRIMARY KEY (`Id_Bitacora`),
  KEY `fkIdx_Usuario_Bit` (`Id_usuario`),
  KEY `fkIdx_Obj_Bit` (`Id_Objeto`),
  CONSTRAINT `FK_Obj_Bit` FOREIGN KEY (`Id_Objeto`) REFERENCES `tbl_objetos` (`Id_Objeto`),
  CONSTRAINT `FK_Usuario_Bit` FOREIGN KEY (`Id_usuario`) REFERENCES `tbl_usuarios` (`Id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bitacora`
--

/*!40000 ALTER TABLE `tbl_bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_bitacora` ENABLE KEYS */;


--
-- Definition of table `tbl_calificaciones`
--

DROP TABLE IF EXISTS `tbl_calificaciones`;
CREATE TABLE `tbl_calificaciones` (
  `Id_Calificaciones` int(11) NOT NULL AUTO_INCREMENT,
  `NotaFinal` decimal(5,0) NOT NULL,
  `Id_Alumno` int(11) NOT NULL,
  `Id_Seccion` int(11) NOT NULL,
  `Cod_Obs` int(11) NOT NULL,
  `Id_Clase` int(11) NOT NULL,
  PRIMARY KEY (`Id_Calificaciones`),
  KEY `fkIdx_Alumno_Cal` (`Id_Alumno`),
  KEY `fkIdx_Seccion_Cal` (`Id_Seccion`),
  KEY `fkIdx_Obs_Cal` (`Cod_Obs`),
  KEY `fkIdx_Clases_Cal` (`Id_Clase`),
  CONSTRAINT `FK_Alumno_Cal` FOREIGN KEY (`Id_Alumno`) REFERENCES `tbl_alumnos` (`Id_Alumno`),
  CONSTRAINT `FK_Clases_Cal` FOREIGN KEY (`Id_Clase`) REFERENCES `tbl_clases` (`Id_Clase`),
  CONSTRAINT `FK_Obs_Cal` FOREIGN KEY (`Cod_Obs`) REFERENCES `tbl_obsnotas` (`Cod_Obs`),
  CONSTRAINT `FK_Seccion_Cal` FOREIGN KEY (`Id_Seccion`) REFERENCES `tbl_secciones` (`Id_Seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_calificaciones`
--

/*!40000 ALTER TABLE `tbl_calificaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_calificaciones` ENABLE KEYS */;


--
-- Definition of table `tbl_orientacion`
--

DROP TABLE IF EXISTS `tbl_orientacion`;
CREATE TABLE `tbl_orientacion` (
  `Id_orientacion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Id_modalidad` int(11) NOT NULL,
 PRIMARY KEY (`Id_orientacion`),
  KEY `fkIdx_Mod_orientacion` (`Id_Modalidad`),
  CONSTRAINT `FK_Mod_orientacion` FOREIGN KEY (`Id_Modalidad`) REFERENCES `tbl_modalidades` (`Id_Modalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orientacion`

--
-- Definition of table `tbl_clases`
--

DROP TABLE IF EXISTS `tbl_clases`;
CREATE TABLE `tbl_clases` (
  `Id_Clase` int(11) NOT NULL AUTO_INCREMENT,
  `DescripClase` varchar(45) NOT NULL,
  `Duracion` time NOT NULL,
  `Id_orientacion` int(11) NOT NULL,
  PRIMARY KEY (`Id_Clase`),
  KEY `fkIdx_oreintacion_Clase` (`Id_orientacion`),
  CONSTRAINT `FK_orientacion_Clase` FOREIGN KEY (`Id_orientacion`) REFERENCES `tbl_orientacion` (`Id_orientacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clases`
--

--
-- Definition of table `tbl_cobromatricula`
--

DROP TABLE IF EXISTS `tbl_cobromatricula`;
CREATE TABLE `tbl_cobromatricula` (
  `Id_cobro` int(11) NOT NULL AUTO_INCREMENT,
  `TotalMatricula` decimal(8,2) NOT NULL,
  PRIMARY KEY (`Id_cobro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cobromatricula`
--

/*!40000 ALTER TABLE `tbl_cobromatricula` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cobromatricula` ENABLE KEYS */;


--
-- Definition of table `tbl_contrespon`
--

DROP TABLE IF EXISTS `tbl_contrespon`;
CREATE TABLE `tbl_contrespon` (
  `Id_ContResp` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) NOT NULL,
  `Apellido` varchar(25) NOT NULL,
  `Telefono` decimal(12,0) NOT NULL,
  `Id_Tipo` int(11) NOT NULL,
  `Id_Alumno` int(11) NOT NULL,
  PRIMARY KEY (`Id_ContResp`),
  KEY `fkIdx_TCont_ContResp` (`Id_Tipo`),
  KEY `fkIdx_Alumno_ContResp` (`Id_Alumno`),
  CONSTRAINT `FK_Alumno_ContResp` FOREIGN KEY (`Id_Alumno`) REFERENCES `tbl_alumnos` (`Id_Alumno`),
  CONSTRAINT `FK_TCont_ContResp` FOREIGN KEY (`Id_Tipo`) REFERENCES `tbl_tipocontacto` (`Id_Tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contrespon`
--

/*!40000 ALTER TABLE `tbl_contrespon` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_contrespon` ENABLE KEYS */;


--
-- Definition of table `tbl_cuentacorriente`
--

DROP TABLE IF EXISTS `tbl_cuentacorriente`;
CREATE TABLE `tbl_cuentacorriente` (
  `Id_Cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `MontoTotal` decimal(8,2) NOT NULL,
  `Mespago` varchar(15) NOT NULL,
  `Id_Alumno` int(11) NOT NULL,
  `Id_cobro` int(11) NOT NULL,
  `Id_precio` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Id_Matricula` int(11) NOT NULL,
  `Id_Descuento` int(11) NOT NULL,
  PRIMARY KEY (`Id_Cuenta`),
  KEY `fkIdx_Alum_CCorriente` (`Id_Alumno`),
  KEY `fkIdx_CMatri_CCorriente` (`Id_cobro`),
  KEY `fkIdx_Precio_CCorriente` (`Id_precio`),
  KEY `fkIdx_EstPago_CCorriente` (`Id_Estado`),
  KEY `fkIdx_Matri_CCorriente` (`Id_Matricula`),
  KEY `fkIdx_Desc_CCorriente` (`Id_Descuento`),
  CONSTRAINT `FK_Alumno_CCorriente` FOREIGN KEY (`Id_Alumno`) REFERENCES `tbl_alumnos` (`Id_Alumno`),
  CONSTRAINT `FK_CMatri_CCorriente` FOREIGN KEY (`Id_cobro`) REFERENCES `tbl_cobromatricula` (`Id_cobro`),
  CONSTRAINT `FK_Desc_CCorriente` FOREIGN KEY (`Id_Descuento`) REFERENCES `tbl_descuento` (`Id_Descuento`),
  CONSTRAINT `FK_EstPago_CCorriente` FOREIGN KEY (`Id_Estado`) REFERENCES `tbl_estadopago` (`Id_Estado`),
  CONSTRAINT `FK_Matri_CCorriente` FOREIGN KEY (`Id_Matricula`) REFERENCES `tbl_matricula` (`Id_Matricula`),
  CONSTRAINT `FK_Precio_CCorriente` FOREIGN KEY (`Id_precio`) REFERENCES `tbl_precio` (`Id_precio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cuentacorriente`
--

/*!40000 ALTER TABLE `tbl_cuentacorriente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cuentacorriente` ENABLE KEYS */;


--
-- Definition of table `tbl_departamentos`
--

DROP TABLE IF EXISTS `tbl_departamentos`;
CREATE TABLE `tbl_departamentos` (
  `Id_Departamentos` int(11) NOT NULL AUTO_INCREMENT,
  `DescripDepart` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Departamentos`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_departamentos`
--

/*!40000 ALTER TABLE `tbl_departamentos` DISABLE KEYS */;
INSERT INTO `tbl_departamentos` (`Id_Departamentos`,`DescripDepart`) VALUES 
 (1,'DOCENCIA'),
 (2,'ADMINISTRACION');
/*!40000 ALTER TABLE `tbl_departamentos` ENABLE KEYS */;


--
-- Definition of table `tbl_descuento`
--

DROP TABLE IF EXISTS `tbl_descuento`;
CREATE TABLE `tbl_descuento` (
  `Id_Descuento` int(11) NOT NULL AUTO_INCREMENT,
  `Descuento` varchar(15) NOT NULL,
  `DescripDesc` varchar(20) NOT NULL,
  `ValorDesc` decimal(8,2) NOT NULL,
  PRIMARY KEY (`Id_Descuento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_descuento`
--

/*!40000 ALTER TABLE `tbl_descuento` DISABLE KEYS */;
INSERT INTO `tbl_descuento` (`Id_Descuento`,`Descuento`,`DescripDesc`,`ValorDesc`) VALUES 
 (1,'MIEMBRO IGLESIA','MIEMBRO DE LA IGLESI','0.15'),
 (2,'GRUPAL','DESC GRUPAL','0.20');
/*!40000 ALTER TABLE `tbl_descuento` ENABLE KEYS */;


--
-- Definition of table `tbl_direcciones`
--

DROP TABLE IF EXISTS `tbl_direcciones`;
CREATE TABLE `tbl_direcciones` (
  `Id_Direcciones` int(11) NOT NULL AUTO_INCREMENT,
  `Direccion` varchar(45) DEFAULT NULL,
  `Id_Alumno` int(11) DEFAULT NULL,
  `Id_Empleado` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Direcciones`),
  KEY `fkIdx_Alumno_Dir` (`Id_Alumno`),
  KEY `fkIdx_Pers_Dir` (`Id_Empleado`),
  CONSTRAINT `FK_Alumno_Dir` FOREIGN KEY (`Id_Alumno`) REFERENCES `tbl_alumnos` (`Id_Alumno`),
  CONSTRAINT `FK_Pers_Dir` FOREIGN KEY (`Id_Empleado`) REFERENCES `tbl_personal` (`Id_Empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_direcciones`
--

/*!40000 ALTER TABLE `tbl_direcciones` DISABLE KEYS */;
INSERT INTO `tbl_direcciones` (`Id_Direcciones`,`Direccion`,`Id_Alumno`,`Id_Empleado`) VALUES 
 (1,'Res.Palmira',5,1),
 (2,'Col.Travesia',1,1);
/*!40000 ALTER TABLE `tbl_direcciones` ENABLE KEYS */;


--
-- Definition of table `tbl_estado`
--

DROP TABLE IF EXISTS `tbl_estado`;
CREATE TABLE `tbl_estado` (
  `Id_Estado` int(11) NOT NULL AUTO_INCREMENT,
  `DescripEstatus` varchar(15) NOT NULL,
  PRIMARY KEY (`Id_Estado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_estado`
--

/*!40000 ALTER TABLE `tbl_estado` DISABLE KEYS */;
INSERT INTO `tbl_estado` (`Id_Estado`,`DescripEstatus`) VALUES 
 (1,'NUEVO'),
 (2,'INACTIVO'),
 (3,'ACTIVO');
/*!40000 ALTER TABLE `tbl_estado` ENABLE KEYS */;


--
-- Definition of table `tbl_estadocivil`
--

DROP TABLE IF EXISTS `tbl_estadocivil`;
CREATE TABLE `tbl_estadocivil` (
  `Id_estadocivil` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(15) NOT NULL,
  PRIMARY KEY (`Id_estadocivil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_estadocivil`
--

/*!40000 ALTER TABLE `tbl_estadocivil` DISABLE KEYS */;
INSERT INTO `tbl_estadocivil` (`Id_estadocivil`,`Descripcion`) VALUES 
 (1,'Soltero'),
 (2,'Casado');
/*!40000 ALTER TABLE `tbl_estadocivil` ENABLE KEYS */;


--
-- Definition of table `tbl_estadopago`
--

DROP TABLE IF EXISTS `tbl_estadopago`;
CREATE TABLE `tbl_estadopago` (
  `Id_Estado` int(11) NOT NULL AUTO_INCREMENT,
  `EstadoPago` varchar(15) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_estadopago`
--

/*!40000 ALTER TABLE `tbl_estadopago` DISABLE KEYS */;
INSERT INTO `tbl_estadopago` (`Id_Estado`,`EstadoPago`,`Descripcion`) VALUES 
 (1,'PAGADO','PAGADO'),
 (2,'MORA','MORA');
/*!40000 ALTER TABLE `tbl_estadopago` ENABLE KEYS */;


--
-- Definition of table `tbl_genero`
--

DROP TABLE IF EXISTS `tbl_genero`;
CREATE TABLE `tbl_genero` (
  `Id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` char(1) NOT NULL,
  PRIMARY KEY (`Id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_genero`
--

/*!40000 ALTER TABLE `tbl_genero` DISABLE KEYS */;
INSERT INTO `tbl_genero` (`Id_genero`,`Descripcion`) VALUES 
 (1,'F'),
 (2,'M');
/*!40000 ALTER TABLE `tbl_genero` ENABLE KEYS */;


--
-- Definition of table `tbl_hist_contrasena`
--

DROP TABLE IF EXISTS `tbl_hist_contrasena`;
CREATE TABLE `tbl_hist_contrasena` (
  `Id_Hist` int(11) NOT NULL AUTO_INCREMENT,
  `Contrasena` longtext NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `FechaModificacion` date DEFAULT NULL,
  `FechaCreacion` date NOT NULL,
  `CreadoPor` varchar(15) NOT NULL,
  `ModificadoPor` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Id_Hist`),
  KEY `fkIdx_Usuario_HistC` (`Id_usuario`),
  CONSTRAINT `FK_Usuario_HistC` FOREIGN KEY (`Id_usuario`) REFERENCES `tbl_usuarios` (`Id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hist_contrasena`
--

/*!40000 ALTER TABLE `tbl_hist_contrasena` DISABLE KEYS */;
INSERT INTO `tbl_hist_contrasena` (`Id_Hist`,`Contrasena`,`Id_usuario`,`FechaModificacion`,`FechaCreacion`,`CreadoPor`,`ModificadoPor`) VALUES 
 (1,'$2y$10$yXHKpcdEmCwO7csb/0MO5.D3pMZTkNrRef0Ni01SOM3oziKojVAu2',1,NULL,'2018-10-24','adminsis',NULL);
/*!40000 ALTER TABLE `tbl_hist_contrasena` ENABLE KEYS */;


--
-- Definition of table `tbl_matricula`
--

DROP TABLE IF EXISTS `tbl_matricula`;
CREATE TABLE `tbl_matricula` (
  `Id_Matricula` int(11) NOT NULL,
  `Id_Alumno` int(11) NOT NULL,
  `Id_Seccion` int(11) NOT NULL,
  `Id_PeriodoAcm` int(11) NOT NULL,
  PRIMARY KEY (`Id_Matricula`),
  KEY `fkIdx_Alumno_Matricula` (`Id_Alumno`),
  KEY `fkIdx_Seccion_Matr` (`Id_Seccion`),
  KEY `fkIdx_Periodo_Matri` (`Id_PeriodoAcm`),
  CONSTRAINT `FK_Alumno_Matricula` FOREIGN KEY (`Id_Alumno`) REFERENCES `tbl_alumnos` (`Id_Alumno`),
  CONSTRAINT `FK_Periodo_Matri` FOREIGN KEY (`Id_PeriodoAcm`) REFERENCES `tbl_periodoacademico` (`Id_PeriodoAcm`),
  CONSTRAINT `FK_Seccion_Matr` FOREIGN KEY (`Id_Seccion`) REFERENCES `tbl_secciones` (`Id_Seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_matricula`
--

/*!40000 ALTER TABLE `tbl_matricula` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_matricula` ENABLE KEYS */;


--
-- Definition of table `tbl_modalidades`
--

DROP TABLE IF EXISTS `tbl_modalidades`;
CREATE TABLE `tbl_modalidades` (
  `Id_Modalidad` int(11) NOT NULL AUTO_INCREMENT,
  `DescripModalidad` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Modalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_modalidades`
--

/*!40000 ALTER TABLE `tbl_modalidades` DISABLE KEYS */;
INSERT INTO `tbl_modalidades` (`Id_Modalidad`,`DescripModalidad`) VALUES 
 (1,'Diplomado'),
 (2,'Tecnico'),
 (3,'Curso Libre');
/*!40000 ALTER TABLE `tbl_modalidades` ENABLE KEYS */;


--
-- Definition of table `tbl_modseccion`
--

DROP TABLE IF EXISTS `tbl_modseccion`;
CREATE TABLE `tbl_modseccion` (
  `Id_Clase` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Seccion` int(11) NOT NULL,
  KEY `fkIdx_Clases_ModSec` (`Id_Clase`),
  KEY `fkIdx_Sec_ModSec` (`Id_Seccion`),
  CONSTRAINT `FK_Clases_ModSec` FOREIGN KEY (`Id_Clase`) REFERENCES `tbl_clases` (`Id_Clase`),
  CONSTRAINT `FK_Sec_ModSec` FOREIGN KEY (`Id_Seccion`) REFERENCES `tbl_secciones` (`Id_Seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_modseccion`
--

/*!40000 ALTER TABLE `tbl_modseccion` DISABLE KEYS */;
INSERT INTO `tbl_modseccion` (`Id_Clase`,`Id_Seccion`) VALUES 
 (1,1);
/*!40000 ALTER TABLE `tbl_modseccion` ENABLE KEYS */;


--
-- Definition of table `tbl_objetos`
--

DROP TABLE IF EXISTS `tbl_objetos`;
CREATE TABLE `tbl_objetos` (
  `Id_Objeto` int(11) NOT NULL AUTO_INCREMENT,
  `Objeto` varchar(100) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `TipoObjeto` varchar(15) NOT NULL,
  `FechaCreacion` date NOT NULL,
  `FechaModificacion` date DEFAULT NULL,
  `CreadoPor` varchar(15) NOT NULL,
  `ModificadoPor` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Id_Objeto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_objetos`
--

/*!40000 ALTER TABLE `tbl_objetos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_objetos` ENABLE KEYS */;


--
-- Definition of table `tbl_obsnotas`
--

DROP TABLE IF EXISTS `tbl_obsnotas`;
CREATE TABLE `tbl_obsnotas` (
  `Cod_Obs` int(11) NOT NULL AUTO_INCREMENT,
  `Observacion` varchar(25) NOT NULL,
  `DescripObs` varchar(20) NOT NULL,
  PRIMARY KEY (`Cod_Obs`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_obsnotas`
--

/*!40000 ALTER TABLE `tbl_obsnotas` DISABLE KEYS */;
INSERT INTO `tbl_obsnotas` (`Cod_Obs`,`Observacion`,`DescripObs`) VALUES 
 (1,'APR','APRBADO'),
 (2,'RPD','REPROBADO');
/*!40000 ALTER TABLE `tbl_obsnotas` ENABLE KEYS */;


--
-- Definition of table `tbl_pagoclases`
--

DROP TABLE IF EXISTS `tbl_pagoclases`;
CREATE TABLE `tbl_pagoclases` (
  `Id_Pago` int(11) NOT NULL AUTO_INCREMENT,
  `Duracion` decimal(10,0) NOT NULL,
  `Valor` decimal(8,2) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  `Id_Clase` int(11) NOT NULL,
  PRIMARY KEY (`Id_Pago`),
  KEY `fkIdx_Clases_PagoC` (`Id_Clase`),
  CONSTRAINT `FK_Clases_PagoC` FOREIGN KEY (`Id_Clase`) REFERENCES `tbl_clases` (`Id_Clase`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pagoclases`
--

/*!40000 ALTER TABLE `tbl_pagoclases` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pagoclases` ENABLE KEYS */;


--
-- Definition of table `tbl_parametros`
--

DROP TABLE IF EXISTS `tbl_parametros`;
CREATE TABLE `tbl_parametros` (
  `Id_Parametro` int(11) NOT NULL AUTO_INCREMENT,
  `Parametro` varchar(50) NOT NULL,
  `Valor` varchar(100) NOT NULL,
  `FechaCreacion` date NOT NULL,
  `FechaModificacion` date DEFAULT NULL,
  `Id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`Id_Parametro`),
  KEY `fkIdx_Usuario_Par` (`Id_usuario`),
  CONSTRAINT `FK_Usuario_Par` FOREIGN KEY (`Id_usuario`) REFERENCES `tbl_usuarios` (`Id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_parametros`
--

/*!40000 ALTER TABLE `tbl_parametros` DISABLE KEYS */;
INSERT INTO `tbl_parametros` (`Id_Parametro`,`Parametro`,`Valor`,`FechaCreacion`,`FechaModificacion`,`Id_usuario`) VALUES 
 (1,'ADMIN_INTENTOS_INVALIDOS','1','2018-11-07',NULL,1),
 (2,'ADMIN_PREGUNTAS','1','2018-11-07',NULL,1);
/*!40000 ALTER TABLE `tbl_parametros` ENABLE KEYS */;


--
-- Definition of table `tbl_periodoacademico`
--

DROP TABLE IF EXISTS `tbl_periodoacademico`;
CREATE TABLE `tbl_periodoacademico` (
  `Id_PeriodoAcm` int(11) NOT NULL AUTO_INCREMENT,
  `DescripPeriodo` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_PeriodoAcm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_periodoacademico`
--

/*!40000 ALTER TABLE `tbl_periodoacademico` DISABLE KEYS */;
INSERT INTO `tbl_periodoacademico` (`Id_PeriodoAcm`,`DescripPeriodo`) VALUES 
 (1,'IPAC2018'),
 (2,'IIPAC2018');
/*!40000 ALTER TABLE `tbl_periodoacademico` ENABLE KEYS */;


--
-- Definition of table `tbl_permisos`
--

DROP TABLE IF EXISTS `tbl_permisos`;
CREATE TABLE `tbl_permisos` (
  `PermisoInsercion` tinytext NOT NULL,
  `PermisoEliminacion` tinytext NOT NULL,
  `PermisoActualizacion` tinytext NOT NULL,
  `PermisoConsultar` tinytext NOT NULL,
  `Id_Rol` int(11) NOT NULL,
  `Id_Objeto` int(11) NOT NULL,
  `CreadoPor` varchar(15) NOT NULL,
  `ModificadoPor` varchar(15) DEFAULT NULL,
  `FechaCreacion` date NOT NULL,
  `FechaModificacion` date DEFAULT NULL,
  KEY `fkIdx_Rol_Permisos` (`Id_Rol`),
  KEY `fkIdx_Obj_Permisos` (`Id_Objeto`),
  CONSTRAINT `FK_Obj_Permisos` FOREIGN KEY (`Id_Objeto`) REFERENCES `tbl_objetos` (`Id_Objeto`),
  CONSTRAINT `FK_Rol_Permisos` FOREIGN KEY (`Id_Rol`) REFERENCES `tbl_roles` (`Id_Rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permisos`
--

/*!40000 ALTER TABLE `tbl_permisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_permisos` ENABLE KEYS */;


--
-- Definition of table `tbl_personal`
--

DROP TABLE IF EXISTS `tbl_personal`;
CREATE TABLE `tbl_personal` (
  `Id_Empleado` int(11) NOT NULL AUTO_INCREMENT,
  `PrimerNombre` varchar(15) NOT NULL,
  `SegundoNombre` varchar(15) DEFAULT NULL,
  `PrimerApellido` varchar(15) NOT NULL,
  `SegundoApellido` varchar(15) DEFAULT NULL,
  `Telefono` decimal(12,0) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Cedula` decimal(13,0) NOT NULL,
  `CreadoPor` varchar(15) NOT NULL,
  `ModificadoPor` varchar(15) DEFAULT NULL,
  `FechaCreacion` date NOT NULL,
  `FechaModificacion` date DEFAULT NULL,
  `Id_Departamentos` int(11) DEFAULT NULL,
  `Id_estadocivil` int(11) NOT NULL,
  `Id_genero` int(11) NOT NULL,
  PRIMARY KEY (`Id_Empleado`),
  KEY `fkIdx_Dept_Pers` (`Id_Departamentos`),
  KEY `fkIdx_estcivil_pers` (`Id_estadocivil`),
  KEY `fkIdx_gen_pers` (`Id_genero`),
  CONSTRAINT `FK_Dept_Pers` FOREIGN KEY (`Id_Departamentos`) REFERENCES `tbl_departamentos` (`Id_Departamentos`),
  CONSTRAINT `FK_estcivil_pers` FOREIGN KEY (`Id_estadocivil`) REFERENCES `tbl_estadocivil` (`Id_estadocivil`),
  CONSTRAINT `FK_gen_pers` FOREIGN KEY (`Id_genero`) REFERENCES `tbl_genero` (`Id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_personal`
--

/*!40000 ALTER TABLE `tbl_personal` DISABLE KEYS */;
INSERT INTO `tbl_personal` (`Id_Empleado`,`PrimerNombre`,`SegundoNombre`,`PrimerApellido`,`SegundoApellido`,`Telefono`,`Email`,`Cedula`,`CreadoPor`,`ModificadoPor`,`FechaCreacion`,`FechaModificacion`,`Id_Departamentos`,`Id_estadocivil`,`Id_genero`) VALUES 
 (1,'MANUEL',NULL,'ARGOS','PEREZ','98703456','MANU.AORS3@HOTMAIL.COM','1517198956702','PRUEBA','PRUEBA','2018-10-10','2018-10-10',1,1,2),
 (2,'Keren',NULL,'Yanes',NULL,'12345678','keren@yahoo.com','801000000000','',NULL,'0000-00-00',NULL,NULL,1,2),
 (3,'JONATHAN','','CARCAMO','','0','','0','',NULL,'0000-00-00',NULL,NULL,1,2),
 (4,'JONATHAN','','CARCAMO','','0','','0','',NULL,'0000-00-00',NULL,NULL,1,2),
 (5,'JONATHAN','','CARCAMO','','0','','0','',NULL,'0000-00-00',NULL,NULL,1,2),
 (6,'AUTO','REGISTRO','PRUEBA','','123456789','kul@gh.hn','801000000000','',NULL,'0000-00-00',NULL,NULL,1,2),
 (7,'FLOR','KARINA','PRUEBA','ZELEDON','34343434','flor@gmail.com','801199089675','PRUEBA','PRUEBA','2018-10-10','2018-10-10',1,1,2),
 (8,'Leonardo','Jose','Ramos','Suazo','98981212','leonardo@yahoo.com','802199012121','Autoregistro','AutoRegistro','2018-11-16','2018-11-16',1,1,1),
 (9,'Anderson','Luis','Souza','Farias','33402121','leonardo@yahoo.com','802199023231','Autoregistro','AutoRegistro','2018-11-16','2018-11-16',1,1,1),
 (10,'Yency','pamela','aguilera','landa','99081212','yency@yahoo.com','801199012121','Autoregistro','AutoRegistro','2018-11-16','2018-11-16',1,1,1),
 (11,'ana','nohelia','martinez','lozano','22355412','ana@yahoo.com','803199511223','Autoregistro','AutoRegistro','2018-11-16','2018-11-16',1,1,1),
 (12,'juan','pablo','montes','rodezno','90871234','juanp@yahoo.es','804199055663','Autoregistro','AutoRegistro','2018-11-16','2018-11-16',1,1,1),
 (13,'ruben','antonio','aguirre','soto','23243434','benru@yahoo.com','802199034344','Autoregistro','AutoRegistro','2018-11-16','2018-11-16',1,1,1),
 (14,'Ringo','Saul','Star','Johnson','99891212','ringo@hotmail.com','801199023344','Autoregistro','AutoRegistro','2018-11-17','2018-11-17',1,1,1),
 (15,'adelaida','joselina','flores','garcia','95678912','adelaida@gmail.com','802199023233','Autoregistro','AutoRegistro','2018-11-18','2018-11-18',1,1,1),
 (16,'carlos','alberto','pavon','plumer','98786745','carlos@gmail.com','805197012345','Autoregistro','AutoRegistro','2018-11-18','2018-11-18',1,1,1),
 (17,'silvia','florinda','villalobos','facusse','22239898','silvia@gmail.com','802197823456','Autoregistro','AutoRegistro','2018-11-18','2018-11-18',1,1,1),
 (18,'mayra','eliza','zuniga','argueta','98784512','mayra@gmail.com','802199023231','Autoregistro','AutoRegistro','2018-11-19','2018-11-19',1,1,1),
 (19,'rocko','wallaby','peña','ucles','34567890','carlos_metalmaniac@hotmail.com','801199056564','Autoregistro','AutoRegistro','2018-11-21','2018-11-21',1,1,1);
/*!40000 ALTER TABLE `tbl_personal` ENABLE KEYS */;


--
-- Definition of table `tbl_planilla`
--

DROP TABLE IF EXISTS `tbl_planilla`;
CREATE TABLE `tbl_planilla` (
  `Id_Planilla` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) NOT NULL,
  `Valor` decimal(8,2) NOT NULL,
  `MesPago` varchar(15) NOT NULL,
  PRIMARY KEY (`Id_Planilla`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_planilla`
--

/*!40000 ALTER TABLE `tbl_planilla` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_planilla` ENABLE KEYS */;


--
-- Definition of table `tbl_planillapago`
--

DROP TABLE IF EXISTS `tbl_planillapago`;
CREATE TABLE `tbl_planillapago` (
  `MesPago` varchar(10) NOT NULL,
  `TotalPagar` decimal(8,2) DEFAULT NULL,
  `FechaGen` date DEFAULT NULL,
  `FechaPago` date DEFAULT NULL,
  `Id_Empleado` int(11) NOT NULL,
  `Id_asistencia` int(11) NOT NULL,
  `Id_Planilla` int(11) NOT NULL,
  `Id_Pago` int(11) NOT NULL,
  KEY `fkIdx_Pers_PPago` (`Id_Empleado`),
  KEY `fkIdx_Asist_PPago` (`Id_asistencia`),
  KEY `fkIdx_Planilla_PPago` (`Id_Planilla`),
  KEY `fkIdx_PClases_PPago` (`Id_Pago`),
  CONSTRAINT `FK_Asist_PPago` FOREIGN KEY (`Id_asistencia`) REFERENCES `tbl_asistencia` (`Id_asistencia`),
  CONSTRAINT `FK_PClases_PPago` FOREIGN KEY (`Id_Pago`) REFERENCES `tbl_pagoclases` (`Id_Pago`),
  CONSTRAINT `FK_Pers_PPago` FOREIGN KEY (`Id_Empleado`) REFERENCES `tbl_personal` (`Id_Empleado`),
  CONSTRAINT `FK_Planilla_PPago` FOREIGN KEY (`Id_Planilla`) REFERENCES `tbl_planilla` (`Id_Planilla`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_planillapago`
--

/*!40000 ALTER TABLE `tbl_planillapago` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_planillapago` ENABLE KEYS */;


--
-- Definition of table `tbl_precio`
--

DROP TABLE IF EXISTS `tbl_precio`;
CREATE TABLE `tbl_precio` (
  `Id_precio` int(11) NOT NULL AUTO_INCREMENT,
  `Precio` decimal(8,2) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_precio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_precio`
--

/*!40000 ALTER TABLE `tbl_precio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_precio` ENABLE KEYS */;


--
-- Definition of table `tbl_preguntas`
--

DROP TABLE IF EXISTS `tbl_preguntas`;
CREATE TABLE `tbl_preguntas` (
  `Id_Pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `Pregunta` varchar(45) NOT NULL,
  `CreadoPor` varchar(15) NOT NULL,
  `ModificadoPor` varchar(15) DEFAULT NULL,
  `FechaCreacion` date NOT NULL,
  `FechaModificacion` date DEFAULT NULL,
  PRIMARY KEY (`Id_Pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_preguntas`
--

/*!40000 ALTER TABLE `tbl_preguntas` DISABLE KEYS */;
INSERT INTO `tbl_preguntas` (`Id_Pregunta`,`Pregunta`,`CreadoPor`,`ModificadoPor`,`FechaCreacion`,`FechaModificacion`) VALUES 
 (1,'Cual era el nombre de tu primera mascota?','1',NULL,'2018-11-07',NULL),
 (2,'Cual es el nombre de la ciudad en que naciste','1',NULL,'2018-11-07',NULL),
 (3,'Cual era tu apodo de niño?','1',NULL,'2018-11-07',NULL),
 (4,'Cual era el nombre de tu primer maestro?','1',NULL,'2018-10-10',NULL),
 (5,'Cual es tu color favorito?','1',NULL,'2018-10-10',NULL);
/*!40000 ALTER TABLE `tbl_preguntas` ENABLE KEYS */;


--
-- Definition of table `tbl_preguntasusuario`
--

DROP TABLE IF EXISTS `tbl_preguntasusuario`;
CREATE TABLE `tbl_preguntasusuario` (
  `Respuesta` varchar(45) NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `Id_Pregunta` int(11) NOT NULL,
  `FechaCreacion` date NOT NULL,
  `FechaModificacion` date DEFAULT NULL,
  `CreadoPor` varchar(15) NOT NULL,
  `ModificadoPor` varchar(15) DEFAULT NULL,
  KEY `fkIdx_Usuario_PUsuario` (`Id_usuario`),
  KEY `fkIdx_Preguntas_PUsuario` (`Id_Pregunta`),
  CONSTRAINT `FK_Preguntas_PUsuario` FOREIGN KEY (`Id_Pregunta`) REFERENCES `tbl_preguntas` (`Id_Pregunta`),
  CONSTRAINT `FK_Usuario_PUsuario` FOREIGN KEY (`Id_usuario`) REFERENCES `tbl_usuarios` (`Id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_preguntasusuario`
--

/*!40000 ALTER TABLE `tbl_preguntasusuario` DISABLE KEYS */;
INSERT INTO `tbl_preguntasusuario` (`Respuesta`,`Id_usuario`,`Id_Pregunta`,`FechaCreacion`,`FechaModificacion`,`CreadoPor`,`ModificadoPor`) VALUES 
 ('Coco',12,1,'2018-11-16','2018-11-16','Autoregistro','Autoregistro'),
 ('Tegucigalpa',12,2,'2018-11-16','2018-11-16','Autoregistro','Autoregistro'),
 ('Rocky',16,1,'2018-11-19','2018-11-19','Autoregistro','Autoregistro'),
 ('Comayagua',16,2,'2018-11-19','2018-11-19','Autoregistro','Autoregistro'),
 ('Rommel',16,4,'2018-11-19','2018-11-19','Autoregistro','Autoregistro'),
 ('Nena',16,3,'2018-11-19','2018-11-19','Autoregistro','Autoregistro'),
 ('Silvita',15,3,'2018-11-19','2018-11-19','Autoregistro','Autoregistro'),
 ('Rosa',15,5,'2018-11-19','2018-11-19','Autoregistro','Autoregistro'),
 ('Siguatepeque',15,2,'2018-11-19','2018-11-19','Autoregistro','Autoregistro'),
 ('vox',17,3,'2018-11-21','2018-11-21','Autoregistro','Autoregistro'),
 ('azul',17,5,'2018-11-21','2018-11-21','Autoregistro','Autoregistro');
/*!40000 ALTER TABLE `tbl_preguntasusuario` ENABLE KEYS */;


--
-- Definition of table `tbl_roles`
--

DROP TABLE IF EXISTS `tbl_roles`;
CREATE TABLE `tbl_roles` (
  `Id_Rol` int(11) NOT NULL AUTO_INCREMENT,
  `Rol` varchar(30) NOT NULL,
  `DescripRol` varchar(20) NOT NULL,
  `CreadoPor` varchar(15) NOT NULL,
  `ModifcadoPor` varchar(15) DEFAULT NULL,
  `FechaCreacion` date NOT NULL,
  `FechaModificacion` date DEFAULT NULL,
  PRIMARY KEY (`Id_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roles`
--

/*!40000 ALTER TABLE `tbl_roles` DISABLE KEYS */;
INSERT INTO `tbl_roles` (`Id_Rol`,`Rol`,`DescripRol`,`CreadoPor`,`ModifcadoPor`,`FechaCreacion`,`FechaModificacion`) VALUES 
 (1,'ADMINISTRADOR','EDITAR','PRUEBA','PRUEBA','2018-10-17','2018-10-17'),
 (2,'DIRECTOR','Director','PRUEBA','PRUEBA','2018-10-10','2018-10-10'),
 (3,'DOCENTE','Docente','PRUEBA','PRUEBA','2018-10-10','2018-10-10'),
 (4,'AUTENTICADO','Usuario registrado.','SELF','SELF','2018-11-16','2018-11-16');
/*!40000 ALTER TABLE `tbl_roles` ENABLE KEYS */;


--
-- Definition of table `tbl_secciones`
--

DROP TABLE IF EXISTS `tbl_secciones`;
CREATE TABLE `tbl_secciones` (
  `Id_Seccion` int(11) NOT NULL AUTO_INCREMENT,
  `DescripSeccion` varchar(45) NOT NULL,
  `HraClase` time DEFAULT NULL,
  `AulaClase` varchar(15) DEFAULT NULL,
  `Id_Clase` int(11) NOT NULL,
  `Id_Empleado` int(11) NOT NULL,
  `Id_PeriodoAcm` int(11) NOT NULL,
  PRIMARY KEY (`Id_Seccion`),
  KEY `fkIdx_clase_Seccion` (`Id_PeriodoAcm`),
  KEY `fkIdx_Pers_Seccion` (`Id_Empleado`),
  KEY `fkIdx_Periodo_Seccion` (`Id_PeriodoAcm`),
  CONSTRAINT `FK_Clase_Seccion` FOREIGN KEY (`Id_Clase`) REFERENCES `tbl_clases` (`Id_Clase`),
  CONSTRAINT `FK_Periodo_Seccion` FOREIGN KEY (`Id_PeriodoAcm`) REFERENCES `tbl_periodoacademico` (`Id_PeriodoAcm`),
  CONSTRAINT `FK_Pers_Seccion` FOREIGN KEY (`Id_Empleado`) REFERENCES `tbl_personal` (`Id_Empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_secciones`
--

/*!40000 ALTER TABLE `tbl_secciones` DISABLE KEYS */;
INSERT INTO `tbl_secciones` (`Id_Seccion`,`DescripSeccion`,`HraClase`,`AulaClase`,`Id_Empleado`,`Id_PeriodoAcm`) VALUES 
 (1,'matutina','00:59:00','206',1,1),
 (2,'NOCTURNO','00:59:00','306',1,1);
/*!40000 ALTER TABLE `tbl_secciones` ENABLE KEYS */;


--
-- Definition of table `tbl_tipocontacto`
--

DROP TABLE IF EXISTS `tbl_tipocontacto`;
CREATE TABLE `tbl_tipocontacto` (
  `Id_Tipo` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(15) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tipocontacto`
--

/*!40000 ALTER TABLE `tbl_tipocontacto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tipocontacto` ENABLE KEYS */;


--
-- Definition of table `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE `tbl_usuarios` (
  `Id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(15) NOT NULL,
  `Contrasena` longtext NOT NULL,
  `FechaUltimaConex` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PreguntasContestadas` bigint(20) NOT NULL,
  `PrimerIngreso` bigint(20) DEFAULT NULL,
  `FechaVencimiento` date NOT NULL,
  `CorreoElectronico` varchar(50) DEFAULT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Id_Rol` int(11) NOT NULL,
  `Id_Empleado` int(11) DEFAULT NULL,
  `FechaCreacion` date NOT NULL,
  `FechaModificacion` date DEFAULT NULL,
  `CreadoPor` varchar(15) NOT NULL,
  `ModificadoPor` varchar(15) DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`Id_usuario`),
  KEY `fkIdx_Rol_Usuario` (`Id_Rol`),
  KEY `fkIdx_Est_Usuario` (`Id_Estado`),
  KEY `fkIdx_Pers_Usuario` (`Id_Empleado`),
  CONSTRAINT `FK_Est_Usuario` FOREIGN KEY (`Id_Estado`) REFERENCES `tbl_estado` (`Id_Estado`),
  CONSTRAINT `FK_Pers_Usuario` FOREIGN KEY (`Id_Empleado`) REFERENCES `tbl_personal` (`Id_Empleado`),
  CONSTRAINT `FK_Rol_Usuario` FOREIGN KEY (`Id_Rol`) REFERENCES `tbl_roles` (`Id_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usuarios`
--

/*!40000 ALTER TABLE `tbl_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_usuarios` (`Id_usuario`,`Usuario`,`Contrasena`,`FechaUltimaConex`,`PreguntasContestadas`,`PrimerIngreso`,`FechaVencimiento`,`CorreoElectronico`,`Id_Estado`,`Id_Rol`,`Id_Empleado`,`FechaCreacion`,`FechaModificacion`,`CreadoPor`,`ModificadoPor`,`code`) VALUES 
 (1,'admin','administrator1','2018-11-09 14:10:10',1,1,'2020-12-31','admin@admin.com',3,1,1,'2018-10-22','2018-10-22','adminsis','adminsis',NULL),
 (2,'prueba','prueba123456','2018-11-07 01:25:57',3,NULL,'2018-11-30','prueba@prueba.com',1,1,3,'2018-11-07',NULL,'1',NULL,NULL),
 (4,'aaa','bbb','2018-11-08 21:21:31',3,NULL,'2018-12-12','aaa@aaa.com',1,1,1,'2018-11-08','2018-11-08','Admin',NULL,NULL),
 (5,'aaa','bbb','2018-11-08 21:24:40',3,NULL,'2018-12-12','aaa@aaa.com',1,3,2,'2018-11-08','2018-11-08','Admin',NULL,NULL),
 (6,'florinda','$2y$10$jStFsll4d2Zqgftn0ZbjXOOvRAiSYwY9oiABB.Nha3bjlTBZZGg0K','2018-11-08 22:16:53',3,NULL,'2018-11-30','flor@venenosa.com',1,3,7,'2018-11-09','2018-11-09','Admin',NULL,NULL),
 (7,'rocko','Adm@1212','2018-11-16 00:00:00',0,NULL,'2018-12-16','leonardo@yahoo.com',1,4,8,'2018-11-16','2018-11-16','Autoregistro',NULL,NULL),
 (8,'pamela23','Adm@1212','2018-11-16 00:00:00',0,NULL,'2018-12-16','yency@yahoo.com',1,4,10,'2018-11-16','2018-11-16','Autoregistro',NULL,NULL),
 (9,'ana34','Adm@1212','2018-11-16 00:00:00',0,NULL,'2018-12-16','ana@yahoo.com',1,4,11,'2018-11-16','2018-11-16','Autoregistro',NULL,NULL),
 (10,'juanp23','Adm@1212','2018-11-16 00:00:00',0,NULL,'2018-12-16','juanp@yahoo.es',1,4,12,'2018-11-16','2018-11-16','Autoregistro',NULL,NULL),
 (11,'girafales','Adm@1212','2018-11-16 00:00:00',0,NULL,'2018-12-16','benru@yahoo.com',1,4,13,'2018-11-16','2018-11-16','Autoregistro',NULL,NULL),
 (12,'zimbo','Adm@1212','2018-11-17 00:00:00',0,NULL,'2018-12-17','ringo@hotmail.com',1,4,14,'2018-11-17','2018-11-17','Autoregistro',NULL,NULL),
 (13,'adelaida12','Adm@1212','2018-11-18 00:00:00',0,NULL,'2018-12-18','adelaida@gmail.com',1,4,15,'2018-11-18','2018-11-18','Autoregistro',NULL,NULL),
 (14,'carlospavon','$2y$10$fRsRQ/E4tEdCjZdgBZbkDuWcjnJFa3vX28Kp8gJLlwZ5hhGSCuYYW','2018-11-18 00:00:00',0,NULL,'2018-12-18','carlos@gmail.com',1,4,16,'2018-11-18','2018-11-18','Autoregistro',NULL,NULL),
 (15,'silvita2','$2y$10$dXIDV2cPlF0.5TlArmxLx.LI4yXNJK0T0f7aETBhmsj7lNykJmo2G','2018-11-19 12:34:09',0,NULL,'2018-12-18','silvia@gmail.com',3,4,17,'2018-11-18','2018-11-18','Autoregistro',NULL,NULL),
 (16,'mayra45','$2y$10$UyFHS9Fenyuy4BwqDvbTuO3ZaqgAtN9z04jCrej4reiyF4yFZMeou','2018-11-19 12:28:10',0,NULL,'2018-12-19','mayra@gmail.com',3,4,18,'2018-11-19','2018-11-19','Autoregistro',NULL,NULL),
 (17,'rocko2','$2y$10$GPWkl2Up3lCtxUXHSMfH6edYhJJFyDdz6btZpvtb6l2WqzQMUpH4m','2018-11-21 14:48:14',0,NULL,'2018-12-21','carlos_metalmaniac@hotmail.com',3,4,19,'2018-11-21','2018-11-21','Autoregistro',NULL,NULL);
/*!40000 ALTER TABLE `tbl_usuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

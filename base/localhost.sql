-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-05-2015 a las 11:21:39
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `recursos_humanos`
--
CREATE DATABASE IF NOT EXISTS `recursos_humanos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `recursos_humanos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ISR`
--

CREATE TABLE IF NOT EXISTS `ISR` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `limite_inf` decimal(10,3) DEFAULT NULL,
  `limite_sup` decimal(10,3) DEFAULT NULL,
  `cuota_fija` decimal(10,3) DEFAULT NULL,
  `exedente` decimal(10,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabla para capturar el ISR' AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `ISR`
--

INSERT INTO `ISR` (`id`, `limite_inf`, `limite_sup`, `cuota_fija`, `exedente`, `created_at`, `updated_at`) VALUES
(1, 0.010, 244.800, 0.000, 1.920, '2014-11-14 03:05:27', NULL),
(2, 244.810, 2077.500, 4.650, 6.400, '2014-11-14 03:05:27', NULL),
(3, 2077.510, 3651.000, 121.950, 10.880, '2014-11-14 03:05:27', NULL),
(4, 3651.010, 4244.100, 293.250, 16.000, '2014-11-14 03:05:27', NULL),
(5, 4244.110, 5081.400, 388.050, 17.920, '2014-11-14 03:05:27', NULL),
(6, 5081.410, 10248.450, 538.200, 21.360, '2014-11-14 03:05:27', NULL),
(7, 10248.460, 16153.050, 1641.750, 23.520, '2014-11-14 03:05:27', NULL),
(8, 16153.060, 30838.800, 3030.600, 30.000, '2014-11-14 03:05:27', NULL),
(9, 30838.810, 41118.450, 7436.250, 32.000, '2014-11-14 03:05:27', NULL),
(10, 41118.460, 123355.200, 10725.750, 34.000, '2014-11-14 03:05:27', NULL),
(11, 123355.210, 9999999.999, 38686.350, 35.000, '2014-11-14 03:05:27', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE IF NOT EXISTS `acciones` (
  `id` smallint(6) NOT NULL,
  `accion` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`id`, `accion`, `created_at`, `updated_at`) VALUES
(11, 'inicia sesión', '2014-11-14 03:05:27', NULL),
(12, 'cierra sesión', '2014-11-14 03:05:27', NULL),
(20, 'Ingresa al listado', '2014-11-14 03:05:27', NULL),
(21, 'ingresa a la pantalla de registro', '2014-11-14 03:05:27', NULL),
(22, 'ingresa a la pantalla de consulta', '2014-11-14 03:05:27', NULL),
(23, 'ingresa a la pantalla de modificación', '2014-11-14 03:05:27', NULL),
(31, 'crea nuevo registro', '2014-11-14 03:05:27', NULL),
(32, 'modifica registro', '2014-11-14 03:05:27', NULL),
(33, 'elimina registro', '2014-11-14 03:05:27', NULL),
(41, '<<SISTEMA>> agrega nuevo registro', '2014-11-14 03:05:27', NULL),
(42, '<<SISTEMA>> modifica registro', '2014-11-14 03:05:27', NULL),
(43, '<<SISTEMA>> elimina registro', '2014-11-14 03:05:27', NULL),
(50, '<<SISTEMA>> Actualiza valores', '2014-11-14 03:05:27', NULL),
(60, 'inicia nomina', '2014-11-14 03:05:27', NULL),
(61, 'termina nomina', '2014-11-14 03:05:27', NULL),
(70, 'imprime reporte', '2014-11-14 03:05:27', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rfc` varchar(13) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `idhorario_emp` int(11) DEFAULT NULL,
  `tipo` tinyint(4) DEFAULT NULL COMMENT '0=a tiempo\n1=retardo\n2=falta\n3=justificado\n',
  `motivo_justificado` tinyint(4) DEFAULT NULL COMMENT '0=receta\n1=permiso\n2=omision entrada\n3=omision salida\n4=comision\n5=incapacidad\n',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_asis_emp_idx` (`idhorario_emp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `bajas_nomina`
--
CREATE TABLE IF NOT EXISTS `bajas_nomina` (
`id` int(11)
,`empleado_id` int(11)
,`quincena` varchar(10)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `base_grabable`
--
CREATE TABLE IF NOT EXISTS `base_grabable` (
`empleado` int(11)
,`qna_actual` varchar(7)
,`total` decimal(32,3)
,`texento` decimal(32,3)
,`base` decimal(33,3)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bono_puntualidad`
--

CREATE TABLE IF NOT EXISTS `bono_puntualidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mes` tinyint(4) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `horario` int(11) DEFAULT NULL,
  `pago_nomina` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `punt_nom_idx` (`pago_nomina`),
  KEY `horario_punt_idx` (`horario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_adscripcion`
--

CREATE TABLE IF NOT EXISTS `cat_adscripcion` (
  `id` varchar(10) NOT NULL,
  `adscripcion` varchar(150) DEFAULT NULL,
  `agrupador` varchar(10) DEFAULT NULL,
  `vigente` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cat_adscripcion`
--

INSERT INTO `cat_adscripcion` (`id`, `adscripcion`, `agrupador`, `vigente`) VALUES
('130-00', 'DIRECCION GENERAL', NULL, 1),
('131-00', 'DEPARTAMENTO JURIDICO', NULL, 1),
('132-00', 'DEPARTAMENTO DE CONTROL DOCUMENTAL', NULL, 1),
('133-00', 'DEPARTAMENTO DE DISEÑO Y DIFUSION EDUCATIVA', NULL, 1),
('134-00', 'UNIDAD DE GENERO', NULL, 1),
('135-00', 'COORDINACION REGIONAL NORTE', NULL, 1),
('136-00', 'COORDINACION REGIONAL CENTRO', NULL, 1),
('137-00', 'COORDINACION REGIONAL SUR', NULL, 1),
('138-00', 'SUBDIRECCION DE PLANEACION, PROGRAMACION Y PRESUPUESTO', '138-00', 1),
('138-01', 'DEPARTAMENTO DE PRESUPUESTACION', '138-00', 1),
('138-02', 'DEPARTAMENTO DE PROGRAMACION', '138-00', 1),
('138-03', 'DEPARTAMENTO DE PLANEACION Y EVALUACION', '138-00', 1),
('139-00', 'SUBDIRECCION DE CONCERTACION Y SEGUIMIENTO OPERATIVO', '139-00', 1),
('139-01', 'DEPARTAMENTO DE SEGUIMIENTO Y VINCULACION', '139-00', 1),
('139-02', 'DEPARTAMENTO DE PLAZAS COMUNITARIAS', '139-00', 1),
('140-00', 'SUBDIRECCION DE SERVICIOS EDUCATIVOS', '140-00', 1),
('140-01', 'DEPARTAMENTO DE EDUCACION INDIGENA', '140-00', 1),
('140-02', 'DEPARTAMENTO DE FORMACION Y DESARROLLO EDUCATIVO', '140-00', 1),
('140-03', 'DEPARTAMENTO DE EDUCACION HISPANOHABLANTE', '140-00', 1),
('141-00', 'SUBDIRECCION DE ACREDITACION Y SISTEMAS DE CONTROL EDUCATIVO', '141-00', 1),
('141-01', 'DEPARTAMENTO DE ACREDITACION', '141-00', 1),
('141-02', 'DEPARTAMENTO DE CERTIFICACION', '141-00', 1),
('141-03', 'DEPARTAMENTO DE CALIDAD Y EVALUACION DEL APRENDIZAJE', '141-00', 1),
('141-04', 'DEPARTAMENTO DE SASA', '141-00', 1),
('142-00', 'SUBDIRECCION ADMINISTRATIVA', '142-00', 1),
('142-01', 'DEPARTAMENTO DE RECURSOS HUMANOS', '142-00', 1),
('142-02', 'DEPARTAMENTO DE RECURSOS FINANCIEROS', '142-00', 1),
('142-03', 'DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS GENERALES', '142-00', 1),
('142-04', 'DEPARTAMENTO DE TECNOLOGIAS DE LA INFORMACION', '142-00', 1),
('143-00', 'SUBDIRECCION DE ATENCION TERRITORIAL', NULL, 1),
('144-00', 'SINDICATO', NULL, 1),
('701-00', 'COORDINACION TANTOYUCA', NULL, 1),
('702-00', 'COORDINACION NARANJOS', NULL, 1),
('703-00', 'COORDINACION CHICONTEPEC', NULL, 1),
('704-00', 'COORDINACION TUXPAN', NULL, 1),
('705-00', 'COORDINACION POZA RICA', NULL, 1),
('706-00', 'COORDINACION PAPANTLA', NULL, 1),
('707-00', 'COORDINACION ESPINAL', NULL, 1),
('708-00', 'COORDINACION MARTINEZ DE LA TORRE', NULL, 1),
('709-00', 'COORDINACION DE PEROTE', NULL, 1),
('710-00', 'COORDINACION XALAPA', NULL, 1),
('711-00', 'COORDINACION COATEPEC', NULL, 1),
('712-00', 'COORDINACION HUATUSCO', NULL, 1),
('713-00', 'COORDINACION ORIZABA', NULL, 1),
('714-00', 'COORDINACION CORDOBA', NULL, 1),
('715-00', 'COORDINACION ZONGOLICA', NULL, 1),
('716-00', 'COORDINACION VERACRUZ', NULL, 1),
('717-00', 'COORDINACION BOCA DEL RIO', NULL, 1),
('718-00', 'COORDINACION TIERA BLANCA', NULL, 1),
('719-00', 'COORDINACION COSAMALOAPAN', NULL, 1),
('720-00', 'COORDINACION SAN ANDRES TUXTLA', NULL, 1),
('721-00', 'COORDINACION ACAYUCAN', NULL, 1),
('722-00', 'COORDINACION MINATITLAN', NULL, 1),
('723-00', 'COORDINACION COATZACOALCOS', NULL, 1),
('724-00', 'COORDINACION HUAYACOCOTLA', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_banco`
--

CREATE TABLE IF NOT EXISTS `cat_banco` (
  `id` varchar(4) NOT NULL,
  `banco` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cat_banco`
--

INSERT INTO `cat_banco` (`id`, `banco`) VALUES
('12', 'BBVA BANCOMER'),
('2', 'BANAMEX'),
('21', 'HSBC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_creditos`
--

CREATE TABLE IF NOT EXISTS `cat_creditos` (
  `id` int(11) NOT NULL,
  `dependencia` varchar(45) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_deducciones`
--

CREATE TABLE IF NOT EXISTS `cat_deducciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave_sat` varchar(5) DEFAULT NULL,
  `clave_lgcg` varchar(5) DEFAULT NULL,
  `concepto` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `cat_deducciones`
--

INSERT INTO `cat_deducciones` (`id`, `clave_sat`, `clave_lgcg`, `concepto`, `created_at`, `updated_at`) VALUES
(1, '002', '1', 'ISR', '2014-11-14 03:05:26', NULL),
(2, '1', '2', '6.125% ISSSTE', '2014-11-14 03:05:26', NULL),
(3, '1', '4', '4.5% SEGURO MEDICO', '2014-11-14 03:05:26', NULL),
(4, '4', '1R', 'FAR-SNTEA', '2014-11-14 03:05:26', NULL),
(5, '019', '58', 'CUOTA SINDICAL', '2014-11-14 03:05:26', NULL),
(6, '4', '1Y', 'POTEN S.V.', '2014-11-14 03:05:26', NULL),
(7, '4', '77', 'SEGURO DE RETIRO', '2014-11-14 03:05:26', NULL),
(8, '4', 'F2', 'FONAC', '2014-11-14 03:05:26', NULL),
(9, '4', '3', 'PRESTAMO A CORTO PLAZO', '2014-11-14 03:05:26', NULL),
(10, '4', '51', 'METLIFE', '2014-11-14 03:05:26', NULL),
(11, '10', '6', 'PRESTAMO HIPOTECARIO', '2014-11-14 03:05:26', NULL),
(12, NULL, 'FA', 'MUTUALISTA', '2014-11-14 03:05:26', NULL),
(13, '4', '65', 'SEGURO DE DAÑOS FOVISSSTE', '2014-11-14 03:05:26', NULL),
(14, '4', '14', 'CONVENIO MAGISTERIO FARMACIAS CLAVE 2015', '2014-11-14 03:05:26', NULL),
(15, '', '14', 'CONVENIO MAGISTERIO ELECTRODOMESTICOS CLAVE 2016', '2014-11-14 03:05:26', NULL),
(16, NULL, '41', 'ISR A CARGO', '2014-11-14 03:05:26', NULL),
(17, '007', '62', 'PENSION ALIMENTICIA', '2014-11-14 03:05:26', NULL),
(18, '004', '99', 'DIVERSOS', '2014-11-14 03:05:26', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_horarios`
--

CREATE TABLE IF NOT EXISTS `cat_horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora_entrada` time DEFAULT NULL,
  `hora_salida_comida` time DEFAULT NULL,
  `hora_entrada_comida` time DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `tolerancia` int(11) DEFAULT NULL COMMENT 'munutos de tolerancia',
  `retardo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `cat_horarios`
--

INSERT INTO `cat_horarios` (`id`, `hora_entrada`, `hora_salida_comida`, `hora_entrada_comida`, `hora_salida`, `tolerancia`, `retardo`, `created_at`, `updated_at`) VALUES
(1, '08:00:00', NULL, NULL, '15:00:00', 15, 30, '2014-11-14 03:05:26', NULL),
(2, '09:00:00', NULL, NULL, '15:00:00', 15, 30, '2014-11-14 03:05:26', NULL),
(3, '09:00:00', '15:00:00', '17:00:00', '20:00:00', 15, 30, '2014-11-14 03:05:26', NULL),
(4, '09:00:00', '15:00:00', '18:00:00', '20:00:00', 15, 30, '2014-11-14 03:05:26', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_percepciones`
--

CREATE TABLE IF NOT EXISTS `cat_percepciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave_sat` varchar(5) DEFAULT NULL,
  `clave_lgcg` varchar(5) DEFAULT NULL,
  `concepto` varchar(250) DEFAULT NULL,
  `extraordinaria` tinyint(4) DEFAULT NULL,
  `dias` tinyint(4) DEFAULT NULL COMMENT 'dias de salario',
  `graba` tinyint(1) DEFAULT NULL COMMENT '0=no graba\n1=graba',
  `exenta` tinyint(1) DEFAULT NULL COMMENT '0=no esta exenta\n1=excenta\n',
  `unidad` tinyint(4) DEFAULT NULL COMMENT '1=requiere el valor para calcular el monto exento\n',
  `qna` tinyint(4) DEFAULT NULL COMMENT 'quincena en la que debe aplicarse\n0=ambas\n1=primera\n2=segunda',
  `aplica` tinyint(1) DEFAULT NULL COMMENT 'aplica para honorarios',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `cat_percepciones`
--

INSERT INTO `cat_percepciones` (`id`, `clave_sat`, `clave_lgcg`, `concepto`, `extraordinaria`, `dias`, `graba`, `exenta`, `unidad`, `qna`, `aplica`, `created_at`, `updated_at`) VALUES
(1, '1', '1102', 'SUELDO', NULL, NULL, 1, NULL, NULL, NULL, 1, '2014-11-14 03:05:26', NULL),
(2, '16', '1102', 'COMPENSACION GARANTIZADA', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(3, '16', '1306', 'QUINQUENIO', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(4, '16', '1349', 'CODECA', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(5, '16', '1311', 'DESPENSA', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(6, '16', '1314', 'PREVISION SOCIAL', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(7, '36', '1104', 'AYUDA DE SERVICIOS', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(8, '16', '1204', 'PROFESIONALIZACION', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(9, '16', '1326', 'GUARDERIA', NULL, NULL, 1, NULL, NULL, 1, NULL, '2014-11-14 03:05:26', NULL),
(10, '16', '1346', 'AEICS', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(11, NULL, '1041', 'DEVOLUCION ISR A CARGO', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2014-11-14 03:05:26', NULL),
(12, NULL, '1041', 'DEVOLUCION ISR A FAVOR', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2014-11-14 03:05:26', NULL),
(13, NULL, '1337', 'PRODUCTIVIDAD', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(14, '16', '1710', 'PRODUCTIVIDAD TRIMESTRAL Y ANUAL TECNICOS DOCENTES', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(15, NULL, '1099', 'DEVOLUCION DESCUENTO INDEBIDO', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2014-11-14 03:05:26', NULL),
(16, NULL, '1300', 'RETROACTIVO DE PRESTACIONES', 1, NULL, 1, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(17, NULL, '66', 'PERMISOS ECONOMICOS NO DISFRUTADOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(18, NULL, 'GE', 'ESTIMULO DIA DEL EMPLEADO INEA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(19, NULL, '65', 'DIAS DE AJUSTE AL CALENDARIO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(20, '2', 'SB', 'SUBSIDIO ISR AGUINALDO', 1, 40, 1, 30, 1, NULL, NULL, '2014-11-14 03:05:26', NULL),
(21, '10', '69', 'PUNTUALIDAD', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(22, '15', '4107', 'BECAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(23, '16', NULL, 'OTROS', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2014-11-14 03:05:26', NULL),
(24, '17', 'SE', 'SUBSIDIO AL EMPLEO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(25, '21', '1601', 'PRIMA VACACIONAL', NULL, 18, 1, 15, 1, NULL, NULL, '2014-11-14 03:05:26', NULL),
(26, '22', '1301', 'COMPENSACION POR ANTIGÜEDAD', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_plaza`
--

CREATE TABLE IF NOT EXISTS `cat_plaza` (
  `clave` varchar(10) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `nivel` varchar(3) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL COMMENT '0=Base\n1=confianza',
  `vigente` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cat_plaza`
--

INSERT INTO `cat_plaza` (`clave`, `descripcion`, `nivel`, `tipo`, `vigente`, `created_at`, `updated_at`) VALUES
('A01803', 'ADMINISTRATIVO ESPECIALIZADO', '2', 'B', NULL, '2014-11-14 03:05:26', NULL),
('A01805', 'AUXILIAR DE ADMINISTRADOR', '2', 'B', NULL, '2014-11-14 03:05:26', NULL),
('A01806', 'ANALISTA ADMINISTRATIVO', '3', 'B', NULL, '2014-11-14 03:05:26', NULL),
('A01807', 'JEFE DE OFICINA', '5', 'B', NULL, '2014-11-14 03:05:26', NULL),
('A03804', 'SECRETARIA "C"', '2', 'B', NULL, '2014-11-14 03:05:26', NULL),
('A4001', 'AUXILIAR ADMINISTRATIVO B', '2', 'H', NULL, '2014-11-14 03:05:26', NULL),
('A4002', 'AUXILIAR ADMINISTRATIVO A', '2', 'H', NULL, '2014-11-14 03:05:26', NULL),
('A4003', 'AUXILIAR', '2', 'H', NULL, '2014-11-14 03:05:26', NULL),
('A4003-2', 'AUXILIAR ACREDITACION O INFORMATICA', '2', 'H', NULL, '2014-11-14 03:05:26', NULL),
('B5003', 'PROMOTORES TECNICOS BILINGUES', '2', 'H', NULL, '2014-11-14 03:05:26', NULL),
('C2001', 'COORDINADOR DE ZONA', '1A', 'H', NULL, '2014-11-14 03:05:26', NULL),
('CF01059', 'JEFE DEPARTAMENTO', 'OA1', 'C', NULL, '2014-11-14 03:05:26', NULL),
('CF04807', 'SECRETARIA EJECUTIVA "B"', '6', 'C', NULL, '2014-11-14 03:05:26', NULL),
('CF14070', 'DIRECTOR GENERAL', 'MB2', 'C', NULL, '2014-11-14 03:05:26', NULL),
('CF33849', 'CUSE.- (JEFE DEPARTAMENTO)', '8', 'C', NULL, '2014-11-14 03:05:26', NULL),
('CF34810', 'ANALISTA ADMINISTRATIVO', '3', 'C', NULL, '2014-11-14 03:05:26', NULL),
('CF36014', 'COORDINADOR', 'OA1', 'C', NULL, '2014-11-14 03:05:26', NULL),
('D4001', 'AUXILIAR DE DEPARTAMENTO A', '2', 'H', NULL, '2014-11-14 03:05:26', NULL),
('D4002', 'AUXILIAR DE DEPARTAMENTO B', '3', 'H', NULL, '2014-11-14 03:05:26', NULL),
('D4003', 'AUXILIAR DE DEPARTAMENTO C', '5', 'H', NULL, '2014-11-14 03:05:26', NULL),
('F3000', 'JEFES DE OFICINA D', '6', 'H', NULL, '2014-11-14 03:05:26', NULL),
('F3001', 'JEFES DE OFICINA C', '6', 'H', NULL, '2014-11-14 03:05:26', NULL),
('F3002', 'JEFES DE OFICINA B', '6', 'H', NULL, '2014-11-14 03:05:26', NULL),
('F3003', 'JEFES DE OFICINA A', '6', 'H', NULL, '2014-11-14 03:05:26', NULL),
('I5002', 'AUXILIAR DE INTENDENCIA', '2', 'H', NULL, '2014-11-14 03:05:26', NULL),
('J2001', 'JEFES DE DEPARTAMENTO A', '8', 'H', NULL, '2014-11-14 03:05:26', NULL),
('J2002', 'JEFES DE DEPARTAMENTO B', '8', 'H', NULL, '2014-11-14 03:05:26', NULL),
('J2003', 'JEFES DE DEPARTAMENTO C', '8', 'H', NULL, '2014-11-14 03:05:26', NULL),
('J2004', 'JEFES DE DEPARTAMENTO D', '8', 'H', NULL, '2014-11-14 03:05:26', NULL),
('J3002', 'JEFE EN COORDINACION DE ZONA', '3', 'H', NULL, '2014-11-14 03:05:26', NULL),
('L4004', 'FIGURA DE APOYO LOGISTICO', '5', 'H', NULL, '2014-11-14 03:05:26', NULL),
('P5003', 'PROMOTORES TECNICOS EDUCATIVOS (EXSEDENOS)', '2', 'H', NULL, '2014-11-14 03:05:26', NULL),
('R3001', 'AUXILIAR COORDINADOR REGIONAL A', '3', 'H', NULL, '2014-11-14 03:05:26', NULL),
('R3002', 'AUXILIAR COORDINADOR REGIONAL B', '5', 'H', NULL, '2014-11-14 03:05:26', NULL),
('S01803', 'OFICIAL DE SERVICIOS Y MANTENIMIENTO', '2', 'B', NULL, '2014-11-14 03:05:26', NULL),
('T03803', 'TECNICO MEDIO', '2', 'B', NULL, '2014-11-14 03:05:26', NULL),
('T03810', 'ESPECIALISTA EN PROYECTOS TECNICOS', '2', 'B', NULL, '2014-11-14 03:05:26', NULL),
('T03820', 'TECNICO DOCENTE', '7', 'B', NULL, '2014-11-14 03:05:26', NULL),
('T03823', 'TECNICO SUPERIOR', '7', 'B', NULL, '2014-11-14 03:05:26', NULL),
('T06803', 'COORDINADOR EN TECNICAS DE COMPUTACION', '4', 'B', NULL, '2014-11-14 03:05:26', NULL),
('T5001', 'CHOFER', '2', 'H', NULL, '2014-11-14 03:05:26', NULL),
('U1001', 'ASESOR', '2A', 'H', NULL, '2014-11-14 03:05:26', NULL),
('U1003', 'JEFES DE UNIDAD', '2A', 'H', NULL, '2014-11-14 03:05:26', NULL),
('Z1001', 'SUBDIRECTOR', '2A', 'H', NULL, '2014-11-14 03:05:26', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_quincena`
--

CREATE TABLE IF NOT EXISTS `cat_quincena` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quincena` varchar(30) DEFAULT NULL,
  `mes` tinyint(4) DEFAULT NULL,
  `bimestre` tinyint(4) DEFAULT NULL,
  `trimestre` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `cat_quincena`
--

INSERT INTO `cat_quincena` (`id`, `quincena`, `mes`, `bimestre`, `trimestre`) VALUES
(1, '1RA. QUINCENA', 1, 1, 1),
(2, '2DA. QUINCENA', 1, 1, 1),
(3, '1RA. QUINCENA', 2, 1, 1),
(4, '2DA. QUINCENA', 2, 1, 1),
(5, '1RA. QUINCENA', 3, 2, 1),
(6, '2DA. QUINCENA', 3, 2, 1),
(7, '1RA. QUINCENA', 4, 2, 2),
(8, '2DA. QUINCENA', 4, 2, 2),
(9, '1RA. QUINCENA', 5, 3, 2),
(10, '2DA. QUINCENA', 5, 3, 2),
(11, '1RA. QUINCENA', 6, 3, 2),
(12, '2DA. QUINCENA', 6, 3, 2),
(13, '1RA. QUINCENA', 7, 4, 3),
(14, '2DA. QUINCENA', 7, 4, 3),
(15, '1RA. QUINCENA', 8, 4, 3),
(16, '2DA. QUINCENA', 8, 4, 3),
(17, '1RA. QUINCENA', 9, 5, 3),
(18, '2DA. QUINCENA', 9, 5, 3),
(19, '1RA. QUINCENA', 10, 5, 4),
(20, '2DA. QUINCENA', 10, 5, 4),
(21, '1RA. QUINCENA', 11, 6, 4),
(22, '2DA. QUINCENA', 11, 6, 4),
(23, '1RA. QUINCENA', 12, 6, 4),
(24, '2DA. QUINCENA', 12, 6, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_general`
--

CREATE TABLE IF NOT EXISTS `configuracion_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave_pagaduria` varchar(20) DEFAULT NULL,
  `apor_smedico` decimal(10,2) DEFAULT NULL,
  `apor_fondo` decimal(10,2) DEFAULT NULL,
  `apor_riesgo` decimal(10,2) DEFAULT NULL,
  `apor_fovissste` decimal(10,2) DEFAULT NULL,
  `trab_smedico` decimal(10,2) DEFAULT NULL,
  `trab_fondo` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE IF NOT EXISTS `contratos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado` int(11) DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cargo_contra_idx` (`empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos`
--

CREATE TABLE IF NOT EXISTS `creditos` (
  `numcredito` int(11) NOT NULL,
  `rfc` varchar(10) DEFAULT NULL,
  `orden_descuento` int(11) DEFAULT NULL COMMENT 'Numero del doc o numero de la orden que ampara el descuento',
  `clave_credito` int(11) DEFAULT NULL,
  `monto` decimal(10,3) DEFAULT NULL,
  `num_pagos` int(11) DEFAULT NULL,
  `record` int(11) DEFAULT NULL,
  `qna_inicio` int(11) DEFAULT NULL,
  `qna_fin` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`numcredito`),
  KEY `fk_creditos_emp_idx` (`rfc`),
  KEY `fk_creditos_cat_idx` (`clave_credito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE IF NOT EXISTS `datos_personales` (
  `rfc` varchar(10) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `municipio` int(11) DEFAULT NULL,
  `tel_casa` varchar(15) DEFAULT NULL,
  `tel_cel` varchar(15) DEFAULT NULL,
  `estado_civil` tinyint(4) DEFAULT NULL,
  `conyuge` varchar(60) DEFAULT NULL,
  `escolaridad` tinyint(4) DEFAULT NULL,
  `licenciatura` varchar(45) DEFAULT NULL,
  `maestria` varchar(45) DEFAULT NULL,
  `doctorado` varchar(45) DEFAULT NULL,
  `curriculum` text,
  `foto` varchar(260) DEFAULT NULL,
  `cp` varchar(6) DEFAULT NULL,
  `observaciones` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rfc`),
  KEY `emp_datos_idx` (`rfc`),
  KEY `id_mun_idx` (`municipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`rfc`, `direccion`, `colonia`, `municipio`, `tel_casa`, `tel_cel`, `estado_civil`, `conyuge`, `escolaridad`, `licenciatura`, `maestria`, `doctorado`, `curriculum`, `foto`, `cp`, `observaciones`, `created_at`, `updated_at`) VALUES
('EAMC871115', 'libertad', '', 38, '', '', 0, '', 3, 'INFORMATICA', '', '', NULL, 'images/fotos/EAMC871115.gif', '', NULL, '2015-05-19 05:36:18', '2015-05-19 06:57:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deducciones`
--

CREATE TABLE IF NOT EXISTS `deducciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado` int(11) DEFAULT NULL,
  `iddeduccion` int(11) DEFAULT NULL,
  `qna_inicio` int(11) DEFAULT NULL,
  `qna_fin` int(11) DEFAULT NULL,
  `extraordinaria` tinyint(1) DEFAULT '0' COMMENT '0=No\n1=Si',
  `monto` decimal(10,3) DEFAULT NULL,
  `dias` tinyint(4) DEFAULT NULL,
  `qna_actual` varchar(7) DEFAULT NULL COMMENT 'Identificador de la quincena en la que estas trabajando\n',
  `observacion` varchar(100) DEFAULT NULL COMMENT 'observaciones extras',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ded_cat_idx` (`iddeduccion`),
  KEY `fk_ded_emp_idx` (`empleado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `deducciones`
--

INSERT INTO `deducciones` (`id`, `empleado`, `iddeduccion`, `qna_inicio`, `qna_fin`, `extraordinaria`, `monto`, `dias`, `qna_actual`, `observacion`, `created_at`, `updated_at`) VALUES
(13, 14, 1, 201510, NULL, 0, 0.000, NULL, NULL, NULL, '2015-05-19 05:36:19', '2015-05-19 05:36:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deducciones_auto`
--

CREATE TABLE IF NOT EXISTS `deducciones_auto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddeduccion` int(11) DEFAULT NULL,
  `valor` decimal(10,3) DEFAULT NULL,
  `unidad` varchar(5) DEFAULT NULL,
  `aplica` varchar(20) DEFAULT NULL,
  `nivel` varchar(45) DEFAULT NULL,
  `proporcional` tinyint(1) DEFAULT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_deducciones_auto_ded_idx` (`iddeduccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `deducciones_auto`
--

INSERT INTO `deducciones_auto` (`id`, `iddeduccion`, `valor`, `unidad`, `aplica`, `nivel`, `proporcional`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 1, 0.000, NULL, '[B,C,H]', NULL, 0, NULL, '2014-11-14 03:05:27', NULL),
(2, 5, 2.000, '%', '[B]', NULL, 1, NULL, '2014-11-14 03:05:27', NULL),
(3, 2, 6.125, '%', '[B,C]', NULL, 1, NULL, '2014-11-14 03:05:27', NULL),
(4, 3, 4.500, '%', '[B,C]', NULL, 1, NULL, '2014-11-14 03:05:27', NULL),
(5, 7, 7.275, NULL, '[B,C]', NULL, 0, NULL, '2014-11-14 03:05:27', NULL),
(6, 4, 5.000, NULL, '[B]', NULL, 0, NULL, '2014-11-14 03:05:27', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desglose_deduccion`
--

CREATE TABLE IF NOT EXISTS `desglose_deduccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idnomina` int(11) DEFAULT NULL,
  `iddeduccion` int(11) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_desglose_deduccion_1_idx` (`idnomina`),
  KEY `fk_desglose_deduccion_2_idx` (`iddeduccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desglose_percepcion`
--

CREATE TABLE IF NOT EXISTS `desglose_percepcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idnomina` int(11) DEFAULT NULL,
  `idpercepcion` int(11) DEFAULT NULL,
  `monto` decimal(10,3) DEFAULT NULL,
  `aplica` tinyint(4) DEFAULT NULL COMMENT '0=solo base\n1=solo honorarios\n2=ambos',
  `graba` tinyint(1) DEFAULT NULL COMMENT '0=no graba ISR\n1= graba ISR',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_desglose_percepcion_1_idx` (`idnomina`),
  KEY `fk_desglose_perc_cat_idx` (`idpercepcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `detalle_empleado`
--
CREATE TABLE IF NOT EXISTS `detalle_empleado` (
`rfc` varchar(10)
,`nombre_completo` varchar(137)
,`estado` tinyint(4)
,`descripcion` varchar(146)
,`adscripcion` varchar(150)
,`id_adscripcion` varchar(10)
,`id_asignacion` int(11)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `rfc` varchar(10) NOT NULL,
  `homoclave` varchar(3) DEFAULT NULL,
  `num_empleado` varchar(10) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `paterno` varchar(45) DEFAULT NULL,
  `materno` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL COMMENT 'B=BASE\nC=CONFIANZA\nH=HONORARIOS',
  `nss` varchar(30) DEFAULT NULL,
  `tipo_pago` tinyint(4) DEFAULT NULL,
  `banco` varchar(4) DEFAULT NULL COMMENT 'id Banco\n',
  `cuenta` varchar(45) DEFAULT NULL,
  `num_fonacot` varchar(30) DEFAULT NULL,
  `tipo_sangre` varchar(5) DEFAULT NULL,
  `num_issste` varchar(30) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '1' COMMENT '0=pendiente de autorizacion\n1=activo\n2=comisionado\n3=baja',
  `fecha_ingreso` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rfc`),
  UNIQUE KEY `rfc_UNIQUE` (`rfc`),
  KEY `emp_banco_idx` (`banco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`rfc`, `homoclave`, `num_empleado`, `curp`, `paterno`, `materno`, `nombre`, `fecha_nacimiento`, `sexo`, `correo`, `tipo`, `nss`, `tipo_pago`, `banco`, `cuenta`, `num_fonacot`, `tipo_sangre`, `num_issste`, `estado`, `fecha_ingreso`, `updated_at`, `fecha_baja`, `created_at`) VALUES
('EAMC871115', '2L2', '30g122', 'EAMC871115HVZNSS13', 'ENCARNACION', 'MENDOZA', 'CESAR', '1987-11-15', 'M', 'cesariux23@gmail.com', 'H', '', 0, '21', '123456789', '', NULL, '', 1, '2015-05-18', NULL, NULL, '2015-05-19 00:36:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_plaza`
--

CREATE TABLE IF NOT EXISTS `empleado_plaza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rfc` varchar(10) DEFAULT NULL,
  `num_empleado` varchar(10) DEFAULT NULL,
  `adscripcion` varchar(10) DEFAULT NULL,
  `clave_plaza` varchar(10) DEFAULT NULL,
  `id_plaza` varchar(6) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL COMMENT 'B = Base\nC = Confianza\nH = Honorarios\n',
  `estado` tinyint(4) DEFAULT NULL COMMENT '0=pendiente de autorizacion\n1=activo\n2=incapacitado\n3=licencia\n4=comisionado',
  `inicio` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `ocupacion` tinyint(4) DEFAULT NULL COMMENT 'si es base se puede especificar:\n0=Definitiva\n1=interinato',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cargo_ads_idx` (`adscripcion`),
  KEY `cargo_catpla_idx` (`clave_plaza`),
  KEY `cargo_emp_idx` (`rfc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `empleado_plaza`
--

INSERT INTO `empleado_plaza` (`id`, `rfc`, `num_empleado`, `adscripcion`, `clave_plaza`, `id_plaza`, `tipo`, `estado`, `inicio`, `fin`, `ocupacion`, `created_at`, `updated_at`) VALUES
(14, 'EAMC871115', '30g122', '139-00', 'F3000', 'H0I001', 'H', NULL, '2015-05-18', NULL, 0, '2015-05-19 05:36:18', '2015-05-19 05:36:18');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `estatus_nomina`
--
CREATE TABLE IF NOT EXISTS `estatus_nomina` (
`id_asignacion` int(11)
,`ocupa` varchar(10)
,`quincena` varchar(10)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `estatus_plaza`
--
CREATE TABLE IF NOT EXISTS `estatus_plaza` (
`id` varchar(6)
,`zona_plaza` varchar(3)
,`ocupa` varchar(10)
,`adscripcion` varchar(10)
,`id_asignacion` int(11)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hijos`
--

CREATE TABLE IF NOT EXISTS `hijos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rfc_empleado` varchar(13) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `nombre` varchar(65) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `escolaridad` tinyint(4) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rfc_hijos_idx` (`rfc_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_empleado`
--

CREATE TABLE IF NOT EXISTS `horario_empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idhorario` int(11) DEFAULT NULL,
  `empleado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hor_cat_idx` (`idhorario`),
  KEY `fk_hor_emp_idx` (`empleado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `horario_empleado`
--

INSERT INTO `horario_empleado` (`id`, `idhorario`, `empleado`, `created_at`, `updated_at`) VALUES
(3, 1, 14, '2015-05-19 05:36:19', '2015-05-19 05:36:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsesion` int(11) NOT NULL,
  `idaccion` smallint(6) NOT NULL,
  `idobjeto` varchar(20) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL COMMENT 'nombre de la tabla a la que afecto\n',
  `tabla` varchar(20) DEFAULT NULL,
  `objeto` text COMMENT 'objeto en json',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_logs_sess_idx` (`idsesion`),
  KEY `fk_logs_act_idx` (`idaccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=188 ;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `idsesion`, `idaccion`, `idobjeto`, `complemento`, `tabla`, `objeto`, `created_at`, `updated_at`) VALUES
(1, 32, 31, 'EAMC871115', NULL, 'Empleado', NULL, '2015-05-19 05:04:45', '2015-05-19 05:04:45'),
(2, 32, 41, 'EAMC871115', NULL, 'Datos personales', NULL, '2015-05-19 05:04:45', '2015-05-19 05:04:45'),
(3, 32, 41, '3', 'RFC: EAMC871115, Plaza: F3001, Adscripcion: 142-04', 'Cargo', NULL, '2015-05-19 05:04:45', '2015-05-19 05:04:45'),
(4, 32, 31, 'EAMC871115', NULL, 'Empleado', NULL, '2015-05-19 05:05:48', '2015-05-19 05:05:48'),
(5, 32, 41, 'EAMC871115', NULL, 'Datos personales', NULL, '2015-05-19 05:05:48', '2015-05-19 05:05:48'),
(6, 32, 41, '4', 'RFC: EAMC871115, Plaza: F3001, Adscripcion: 142-04', 'Cargo', NULL, '2015-05-19 05:05:49', '2015-05-19 05:05:49'),
(7, 32, 31, 'EAMC871115', NULL, 'Empleado', NULL, '2015-05-19 05:07:14', '2015-05-19 05:07:14'),
(8, 32, 41, 'EAMC871115', NULL, 'Datos personales', NULL, '2015-05-19 05:07:14', '2015-05-19 05:07:14'),
(9, 32, 41, '5', 'RFC: EAMC871115, Plaza: F3001, Adscripcion: 142-04', 'Cargo', NULL, '2015-05-19 05:07:14', '2015-05-19 05:07:14'),
(10, 32, 31, 'EAMC871115', NULL, 'Empleado', NULL, '2015-05-19 05:07:56', '2015-05-19 05:07:56'),
(11, 32, 41, 'EAMC871115', NULL, 'Datos personales', NULL, '2015-05-19 05:07:57', '2015-05-19 05:07:57'),
(12, 32, 41, '6', 'RFC: EAMC871115, Plaza: F3001, Adscripcion: 142-04', 'Cargo', NULL, '2015-05-19 05:07:57', '2015-05-19 05:07:57'),
(13, 32, 41, '2', 'tabulador', 'Sueldo', NULL, '2015-05-19 05:07:57', '2015-05-19 05:07:57'),
(14, 32, 31, 'EAMC871115', NULL, 'Empleado', NULL, '2015-05-19 05:09:28', '2015-05-19 05:09:28'),
(15, 32, 41, 'EAMC871115', NULL, 'Datos personales', NULL, '2015-05-19 05:09:28', '2015-05-19 05:09:28'),
(16, 32, 41, '7', 'RFC: EAMC871115, Plaza: F3001, Adscripcion: 142-04', 'Cargo', NULL, '2015-05-19 05:09:28', '2015-05-19 05:09:28'),
(17, 32, 41, '3', 'tabulador', 'Sueldo', NULL, '2015-05-19 05:09:28', '2015-05-19 05:09:28'),
(18, 32, 31, 'EAMC871115', NULL, 'Empleado', NULL, '2015-05-19 05:11:43', '2015-05-19 05:11:43'),
(19, 32, 41, 'EAMC871115', NULL, 'Datos personales', NULL, '2015-05-19 05:11:43', '2015-05-19 05:11:43'),
(20, 32, 41, '8', 'RFC: EAMC871115, Plaza: F3001, Adscripcion: 142-04', 'Cargo', NULL, '2015-05-19 05:11:43', '2015-05-19 05:11:43'),
(21, 32, 41, '4', 'tabulador', 'Sueldo', NULL, '2015-05-19 05:11:44', '2015-05-19 05:11:44'),
(22, 32, 31, 'EAMC871115', NULL, 'Empleado', NULL, '2015-05-19 05:15:35', '2015-05-19 05:15:35'),
(23, 32, 41, 'EAMC871115', NULL, 'Datos personales', NULL, '2015-05-19 05:15:35', '2015-05-19 05:15:35'),
(24, 32, 41, '9', 'RFC: EAMC871115, Plaza: F3001, Adscripcion: 142-04', 'Cargo', NULL, '2015-05-19 05:15:35', '2015-05-19 05:15:35'),
(25, 32, 41, '5', 'tabulador', 'Sueldo', NULL, '2015-05-19 05:15:35', '2015-05-19 05:15:35'),
(26, 32, 41, '18', 'SUELDO, proporcional a 13 dias . Valido solo en la qna. 201510', 'Percepcion', NULL, '2015-05-19 05:15:36', '2015-05-19 05:15:36'),
(27, 32, 41, '19', 'SUELDO, valido desde la qna. 201511', 'Percepcion', NULL, '2015-05-19 05:15:36', '2015-05-19 05:15:36'),
(28, 32, 31, 'EAMC871115', NULL, 'Empleado', NULL, '2015-05-19 05:17:02', '2015-05-19 05:17:02'),
(29, 32, 41, 'EAMC871115', NULL, 'Datos personales', NULL, '2015-05-19 05:17:02', '2015-05-19 05:17:02'),
(30, 32, 41, '10', 'RFC: EAMC871115, Plaza: F3001, Adscripcion: 142-04', 'Cargo', NULL, '2015-05-19 05:17:03', '2015-05-19 05:17:03'),
(31, 32, 41, '6', 'tabulador', 'Sueldo', NULL, '2015-05-19 05:17:03', '2015-05-19 05:17:03'),
(32, 32, 41, '20', 'SUELDO, proporcional a 13 dias . Valido solo en la qna. 201510', 'Percepcion', NULL, '2015-05-19 05:17:03', '2015-05-19 05:17:03'),
(33, 32, 41, '21', 'SUELDO, valido desde la qna. 201511', 'Percepcion', NULL, '2015-05-19 05:17:03', '2015-05-19 05:17:03'),
(34, 32, 31, 'EAMC871115', NULL, 'Empleado', NULL, '2015-05-19 05:20:00', '2015-05-19 05:20:00'),
(35, 32, 41, 'EAMC871115', NULL, 'Datos personales', NULL, '2015-05-19 05:20:00', '2015-05-19 05:20:00'),
(36, 32, 41, '11', 'RFC: EAMC871115, Plaza: F3001, Adscripcion: 142-04', 'Cargo', NULL, '2015-05-19 05:20:00', '2015-05-19 05:20:00'),
(37, 32, 41, '7', 'tabulador', 'Sueldo', NULL, '2015-05-19 05:20:01', '2015-05-19 05:20:01'),
(38, 32, 41, '22', 'SUELDO, proporcional a 13 dias . Valido solo en la qna. 201510', 'Percepcion', NULL, '2015-05-19 05:20:01', '2015-05-19 05:20:01'),
(39, 32, 41, '23', 'SUELDO, valido desde la qna. 201511', 'Percepcion', NULL, '2015-05-19 05:20:01', '2015-05-19 05:20:01'),
(40, 32, 41, '10', 'ISR, valido desde la qna. 201510', 'Deduccion', NULL, '2015-05-19 05:20:02', '2015-05-19 05:20:02'),
(41, 32, 31, 'EAMC871115', NULL, 'Empleado', NULL, '2015-05-19 05:21:39', '2015-05-19 05:21:39'),
(42, 32, 41, 'EAMC871115', NULL, 'Datos personales', NULL, '2015-05-19 05:21:39', '2015-05-19 05:21:39'),
(43, 32, 41, '12', 'RFC: EAMC871115, Plaza: F3001, Adscripcion: 142-04', 'Cargo', NULL, '2015-05-19 05:21:40', '2015-05-19 05:21:40'),
(44, 32, 41, '8', 'tabulador', 'Sueldo', NULL, '2015-05-19 05:21:40', '2015-05-19 05:21:40'),
(45, 32, 41, '24', 'SUELDO, proporcional a 13 dias . Valido solo en la qna. 201510', 'Percepcion', NULL, '2015-05-19 05:21:40', '2015-05-19 05:21:40'),
(46, 32, 41, '25', 'SUELDO, valido desde la qna. 201511', 'Percepcion', NULL, '2015-05-19 05:21:40', '2015-05-19 05:21:40'),
(47, 32, 41, '11', 'ISR, valido desde la qna. 201510', 'Deduccion', NULL, '2015-05-19 05:21:40', '2015-05-19 05:21:40'),
(48, 32, 31, 'EAMC871115', NULL, 'Empleado', NULL, '2015-05-19 05:23:02', '2015-05-19 05:23:02'),
(49, 32, 41, 'EAMC871115', NULL, 'Datos personales', NULL, '2015-05-19 05:23:02', '2015-05-19 05:23:02'),
(50, 32, 41, '13', 'RFC: EAMC871115, Plaza: F3001, Adscripcion: 142-04', 'Cargo', NULL, '2015-05-19 05:23:03', '2015-05-19 05:23:03'),
(51, 32, 41, '9', 'tabulador', 'Sueldo', NULL, '2015-05-19 05:23:03', '2015-05-19 05:23:03'),
(52, 32, 41, '26', 'SUELDO, proporcional a 13 dias . Valido solo en la qna. 201510', 'Percepcion', NULL, '2015-05-19 05:23:03', '2015-05-19 05:23:03'),
(53, 32, 41, '27', 'SUELDO, valido desde la qna. 201511', 'Percepcion', NULL, '2015-05-19 05:23:03', '2015-05-19 05:23:03'),
(54, 32, 41, '12', 'ISR, valido desde la qna. 201510', 'Deduccion', NULL, '2015-05-19 05:23:04', '2015-05-19 05:23:04'),
(55, 32, 41, '2', 'RFC: EAMC871115', 'Horario', NULL, '2015-05-19 05:23:04', '2015-05-19 05:23:04'),
(56, 32, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 05:23:04', '2015-05-19 05:23:04'),
(57, 32, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 05:24:14', '2015-05-19 05:24:14'),
(58, 32, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 05:24:18', '2015-05-19 05:24:18'),
(59, 32, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:24:24', '2015-05-19 05:24:24'),
(60, 32, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 05:25:23', '2015-05-19 05:25:23'),
(61, 32, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 05:25:30', '2015-05-19 05:25:30'),
(62, 32, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 05:25:40', '2015-05-19 05:25:40'),
(63, 33, 11, NULL, NULL, NULL, NULL, '2015-05-19 00:26:58', '2015-05-19 00:26:58'),
(64, 33, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 00:26:58', '2015-05-19 00:26:58'),
(65, 33, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 00:27:08', '2015-05-19 00:27:08'),
(66, 33, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 00:27:12', '2015-05-19 00:27:12'),
(67, 33, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 00:27:18', '2015-05-19 00:27:18'),
(68, 33, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 00:27:23', '2015-05-19 00:27:23'),
(69, 33, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 00:27:25', '2015-05-19 00:27:25'),
(70, 33, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 00:27:35', '2015-05-19 00:27:35'),
(71, 34, 11, NULL, NULL, NULL, NULL, '2015-05-19 05:28:12', '2015-05-19 05:28:12'),
(72, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 05:28:12', '2015-05-19 05:28:12'),
(73, 35, 11, NULL, NULL, NULL, NULL, '2015-05-19 00:28:27', '2015-05-19 00:28:27'),
(74, 35, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 00:28:27', '2015-05-19 00:28:27'),
(75, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:28:33', '2015-05-19 05:28:33'),
(76, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:31:58', '2015-05-19 05:31:58'),
(77, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 05:32:17', '2015-05-19 05:32:17'),
(78, 35, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 00:33:35', '2015-05-19 00:33:35'),
(79, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 05:33:41', '2015-05-19 05:33:41'),
(80, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:33:45', '2015-05-19 05:33:45'),
(81, 34, 31, 'EAMC871115', NULL, 'Empleado', NULL, '2015-05-19 05:35:00', '2015-05-19 05:35:00'),
(82, 34, 41, 'EAMC871115', NULL, 'Datos personales', NULL, '2015-05-19 05:35:00', '2015-05-19 05:35:00'),
(83, 34, 31, 'EAMC871115', NULL, 'Empleado', NULL, '2015-05-19 05:36:18', '2015-05-19 05:36:18'),
(84, 34, 41, 'EAMC871115', NULL, 'Datos personales', NULL, '2015-05-19 05:36:18', '2015-05-19 05:36:18'),
(85, 34, 41, '14', 'RFC: EAMC871115, Plaza: F3000, Adscripcion: 139-00', 'Cargo', NULL, '2015-05-19 05:36:18', '2015-05-19 05:36:18'),
(86, 34, 41, '10', 'tabulador', 'Sueldo', NULL, '2015-05-19 05:36:19', '2015-05-19 05:36:19'),
(87, 34, 41, '28', 'SUELDO, proporcional a 13 dias . Valido solo en la qna. 201510', 'Percepcion', NULL, '2015-05-19 05:36:19', '2015-05-19 05:36:19'),
(88, 34, 41, '29', 'SUELDO, valido desde la qna. 201511', 'Percepcion', NULL, '2015-05-19 05:36:19', '2015-05-19 05:36:19'),
(89, 34, 41, '13', 'ISR, valido desde la qna. 201510', 'Deduccion', NULL, '2015-05-19 05:36:19', '2015-05-19 05:36:19'),
(90, 34, 41, '3', 'RFC: EAMC871115', 'Horario', NULL, '2015-05-19 05:36:19', '2015-05-19 05:36:19'),
(91, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 05:36:20', '2015-05-19 05:36:20'),
(92, 35, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 00:37:37', '2015-05-19 00:37:37'),
(93, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 05:37:44', '2015-05-19 05:37:44'),
(94, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 05:38:09', '2015-05-19 05:38:09'),
(95, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 05:38:15', '2015-05-19 05:38:15'),
(96, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:38:16', '2015-05-19 05:38:16'),
(97, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 05:38:19', '2015-05-19 05:38:19'),
(98, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 05:38:25', '2015-05-19 05:38:25'),
(99, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 05:38:32', '2015-05-19 05:38:32'),
(100, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 05:38:34', '2015-05-19 05:38:34'),
(101, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 05:38:47', '2015-05-19 05:38:47'),
(102, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:38:49', '2015-05-19 05:38:49'),
(103, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:41:19', '2015-05-19 05:41:19'),
(104, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:41:46', '2015-05-19 05:41:46'),
(105, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:41:56', '2015-05-19 05:41:56'),
(106, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:43:27', '2015-05-19 05:43:27'),
(107, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:43:40', '2015-05-19 05:43:40'),
(108, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:44:18', '2015-05-19 05:44:18'),
(109, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:45:15', '2015-05-19 05:45:15'),
(110, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:47:26', '2015-05-19 05:47:26'),
(111, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:47:45', '2015-05-19 05:47:45'),
(112, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 05:53:57', '2015-05-19 05:53:57'),
(113, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 05:54:07', '2015-05-19 05:54:07'),
(114, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 05:55:16', '2015-05-19 05:55:16'),
(115, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 05:55:49', '2015-05-19 05:55:49'),
(116, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 05:55:51', '2015-05-19 05:55:51'),
(117, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 05:57:05', '2015-05-19 05:57:05'),
(118, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 05:57:06', '2015-05-19 05:57:06'),
(119, 35, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 00:57:26', '2015-05-19 00:57:26'),
(120, 35, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 00:57:30', '2015-05-19 00:57:30'),
(121, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:00:27', '2015-05-19 06:00:27'),
(122, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 06:00:35', '2015-05-19 06:00:35'),
(123, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:00:48', '2015-05-19 06:00:48'),
(124, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 06:01:18', '2015-05-19 06:01:18'),
(125, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 06:01:20', '2015-05-19 06:01:20'),
(126, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 06:03:07', '2015-05-19 06:03:07'),
(127, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 06:03:18', '2015-05-19 06:03:18'),
(128, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 06:08:05', '2015-05-19 06:08:05'),
(129, 35, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 01:10:00', '2015-05-19 01:10:00'),
(130, 35, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 01:10:03', '2015-05-19 01:10:03'),
(131, 35, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 01:10:45', '2015-05-19 01:10:45'),
(132, 35, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 01:10:48', '2015-05-19 01:10:48'),
(133, 35, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 01:10:56', '2015-05-19 01:10:56'),
(134, 35, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 01:11:15', '2015-05-19 01:11:15'),
(135, 35, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 01:11:22', '2015-05-19 01:11:22'),
(136, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 06:13:04', '2015-05-19 06:13:04'),
(137, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 06:13:47', '2015-05-19 06:13:47'),
(138, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 06:23:28', '2015-05-19 06:23:28'),
(139, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 06:24:13', '2015-05-19 06:24:13'),
(140, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:24:15', '2015-05-19 06:24:15'),
(141, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:24:41', '2015-05-19 06:24:41'),
(142, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:24:45', '2015-05-19 06:24:45'),
(143, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 06:24:55', '2015-05-19 06:24:55'),
(144, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:26:27', '2015-05-19 06:26:27'),
(145, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:26:30', '2015-05-19 06:26:30'),
(146, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 06:27:10', '2015-05-19 06:27:10'),
(147, 34, 21, NULL, NULL, 'empleado', NULL, '2015-05-19 06:27:11', '2015-05-19 06:27:11'),
(148, 34, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 06:27:50', '2015-05-19 06:27:50'),
(149, 35, 20, NULL, NULL, 'empleado', NULL, '2015-05-19 01:28:02', '2015-05-19 01:28:02'),
(150, 35, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 01:28:04', '2015-05-19 01:28:04'),
(151, 35, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 01:31:00', '2015-05-19 01:31:00'),
(152, 35, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 01:31:11', '2015-05-19 01:31:11'),
(153, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:34:09', '2015-05-19 06:34:09'),
(154, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:34:21', '2015-05-19 06:34:21'),
(155, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:34:42', '2015-05-19 06:34:42'),
(156, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:34:48', '2015-05-19 06:34:48'),
(157, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:34:57', '2015-05-19 06:34:57'),
(158, 35, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 01:35:54', '2015-05-19 01:35:54'),
(159, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:38:28', '2015-05-19 06:38:28'),
(160, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:38:34', '2015-05-19 06:38:34'),
(161, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:39:13', '2015-05-19 06:39:13'),
(162, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:39:16', '2015-05-19 06:39:16'),
(163, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:39:23', '2015-05-19 06:39:23'),
(164, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:39:55', '2015-05-19 06:39:55'),
(165, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:46:42', '2015-05-19 06:46:42'),
(166, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:47:42', '2015-05-19 06:47:42'),
(167, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:50:04', '2015-05-19 06:50:04'),
(168, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:53:42', '2015-05-19 06:53:42'),
(169, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:53:47', '2015-05-19 06:53:47'),
(170, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:53:58', '2015-05-19 06:53:58'),
(171, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:54:05', '2015-05-19 06:54:05'),
(172, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:54:40', '2015-05-19 06:54:40'),
(173, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:54:47', '2015-05-19 06:54:47'),
(174, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:56:05', '2015-05-19 06:56:05'),
(175, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:56:06', '2015-05-19 06:56:06'),
(176, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:56:13', '2015-05-19 06:56:13'),
(177, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:56:16', '2015-05-19 06:56:16'),
(178, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:56:20', '2015-05-19 06:56:20'),
(179, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:56:58', '2015-05-19 06:56:58'),
(180, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:56:59', '2015-05-19 06:56:59'),
(181, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:57:04', '2015-05-19 06:57:04'),
(182, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:57:08', '2015-05-19 06:57:08'),
(183, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:57:13', '2015-05-19 06:57:13'),
(184, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:57:16', '2015-05-19 06:57:16'),
(185, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:57:21', '2015-05-19 06:57:21'),
(186, 34, 23, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:57:24', '2015-05-19 06:57:24'),
(187, 34, 22, 'EAMC871115', NULL, 'empleado', NULL, '2015-05-19 06:57:32', '2015-05-19 06:57:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE IF NOT EXISTS `movimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rfc` varchar(10) DEFAULT NULL,
  `tipo_movimiento` tinyint(4) DEFAULT NULL COMMENT '0=Alta\n1=modificacion tipo\n2=modificacion de adscripcion\n3=modificacion de puesto\n4=licencia\n5=comision\n6=baja',
  `anterior` int(11) DEFAULT NULL COMMENT 'Referencia a la plaza anterior\n',
  `nuevo` int(11) DEFAULT NULL COMMENT 'Referencia la la plaza nueva',
  `fecha_aplica` date DEFAULT NULL,
  `observaciones` text,
  `notificado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `municipio` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=213 ;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `municipio`) VALUES
(1, 'ACAJETE'),
(2, 'ACATLAN'),
(3, 'ACAYUCAN'),
(4, 'ACTOPAN'),
(5, 'ACULA'),
(6, 'ACULTZINGO'),
(7, 'CAMARON DE TEJEDA'),
(8, 'ALPATLAHUAC'),
(9, 'ALTO LUCERO DE GUTIERREZ BARRIOS'),
(10, 'ALTOTONGA'),
(11, 'ALVARADO'),
(12, 'AMATITLAN'),
(13, 'NARANJOS AMATLAN'),
(14, 'AMATLAN DE LOS REYES'),
(15, 'ANGEL R. CABADA'),
(16, 'LA ANTIGUA'),
(17, 'APAZAPAN'),
(18, 'AQUILA'),
(19, 'ASTACINGA'),
(20, 'ATLAHUILCO'),
(21, 'ATOYAC'),
(22, 'ATZACAN'),
(23, 'ATZALAN'),
(24, 'TLALTETELA'),
(25, 'AYAHUALULCO'),
(26, 'BANDERILLA'),
(27, 'BENITO JUAREZ'),
(28, 'BOCA DEL RIO'),
(29, 'CALCAHUALCO'),
(30, 'CAMERINO Z. MENDOZA'),
(31, 'CARRILLO PUERTO'),
(32, 'CATEMACO'),
(33, 'CAZONES DE HERRERA'),
(34, 'CERRO AZUL'),
(35, 'CITLALTEPETL'),
(36, 'COACOATZINTLA'),
(37, 'COAHUITLAN'),
(38, 'COATEPEC'),
(39, 'COATZACOALCOS'),
(40, 'COATZINTLA'),
(41, 'COETZALA'),
(42, 'COLIPA'),
(43, 'COMAPA'),
(44, 'CORDOBA'),
(45, 'COSAMALOAPAN DE CARPIO'),
(46, 'COSAUTLAN DE CARVAJAL'),
(47, 'COSCOMATEPEC'),
(48, 'COSOLEACAQUE'),
(49, 'COTAXTLA'),
(50, 'COXQUIHUI'),
(51, 'COYUTLA'),
(52, 'CUICHAPA'),
(53, 'CUITLAHUAC'),
(54, 'CHACALTIANGUIS'),
(55, 'CHALMA'),
(56, 'CHICONAMEL'),
(57, 'CHICONQUIACO'),
(58, 'CHICONTEPEC'),
(59, 'CHINAMECA'),
(60, 'CHINAMPA DE GOROSTIZA'),
(61, 'LAS CHOAPAS'),
(62, 'CHOCAMAN'),
(63, 'CHONTLA'),
(64, 'CHUMATLAN'),
(65, 'EMILIANO ZAPATA'),
(66, 'ESPINAL'),
(67, 'FILOMENO MATA'),
(68, 'FORTIN'),
(69, 'GUTIERREZ ZAMORA'),
(70, 'HIDALGOTITLAN'),
(71, 'HUATUSCO'),
(72, 'HUAYACOCOTLA'),
(73, 'HUEYAPAN DE OCAMPO'),
(74, 'HUILOAPAN DE CUAUHTEMOC'),
(75, 'IGNACIO DE LA LLAVE'),
(76, 'ILAMATLAN'),
(77, 'ISLA'),
(78, 'IXCATEPEC'),
(79, 'IXHUACAN DE LOS REYES'),
(80, 'IXHUATLAN DEL CAFE'),
(81, 'IXHUATLANCILLO'),
(82, 'IXHUATLAN DEL SURESTE'),
(83, 'IXHUATLAN DE MADERO'),
(84, 'IXMATLAHUACAN'),
(85, 'IXTACZOQUITLAN'),
(86, 'JALACINGO'),
(87, 'XALAPA'),
(88, 'JALCOMULCO'),
(89, 'JALTIPAN'),
(90, 'JAMAPA'),
(91, 'JESUS CARRANZA'),
(92, 'XICO'),
(93, 'JILOTEPEC'),
(94, 'JUAN RODRIGUEZ CLARA'),
(95, 'JUCHIQUE DE FERRER'),
(96, 'LANDERO Y COSS'),
(97, 'LERDO DE TEJADA'),
(98, 'MAGDALENA'),
(99, 'MALTRATA'),
(100, 'MANLIO FABIO ALTAMIRANO'),
(101, 'MARIANO ESCOBEDO'),
(102, 'MARTINEZ DE LA TORRE'),
(103, 'MECATLAN'),
(104, 'MECAYAPAN'),
(105, 'MEDELLIN'),
(106, 'MIAHUATLAN'),
(107, 'LAS MINAS'),
(108, 'MINATITLAN'),
(109, 'MISANTLA'),
(110, 'MIXTLA DE ALTAMIRANO'),
(111, 'MOLOACAN'),
(112, 'NAOLINCO'),
(113, 'NARANJAL'),
(114, 'NAUTLA'),
(115, 'NOGALES'),
(116, 'OLUTA'),
(117, 'OMEALCA'),
(118, 'ORIZABA'),
(119, 'OTATITLAN'),
(120, 'OTEAPAN'),
(121, 'OZULUAMA DE MASCAREÑAS'),
(122, 'PAJAPAN'),
(123, 'PANUCO'),
(124, 'PAPANTLA'),
(125, 'PASO DEL MACHO'),
(126, 'PASO DE OVEJAS'),
(127, 'LA PERLA'),
(128, 'PEROTE'),
(129, 'PLATON SANCHEZ'),
(130, 'PLAYA VICENTE'),
(131, 'POZA RICA DE HIDALGO'),
(132, 'LAS VIGAS DE RAMIREZ'),
(133, 'PUEBLO VIEJO'),
(134, 'PUENTE NACIONAL'),
(135, 'RAFAEL DELGADO'),
(136, 'RAFAEL LUCIO'),
(137, 'LOS REYES'),
(138, 'RIO BLANCO'),
(139, 'SALTABARRANCA'),
(140, 'SAN ANDRES TENEJAPAN'),
(141, 'SAN ANDRES TUXTLA'),
(142, 'SAN JUAN EVANGELISTA'),
(143, 'SANTIAGO TUXTLA'),
(144, 'SAYULA DE ALEMAN'),
(145, 'SOCONUSCO'),
(146, 'SOCHIAPA'),
(147, 'SOLEDAD ATZOMPA'),
(148, 'SOLEDAD DE DOBLADO'),
(149, 'SOTEAPAN'),
(150, 'TAMALIN'),
(151, 'TAMIAHUA'),
(152, 'TAMPICO ALTO'),
(153, 'TANCOCO'),
(154, 'TANTIMA'),
(155, 'TANTOYUCA'),
(156, 'TATATILA'),
(157, 'CASTILLO DE TEAYO'),
(158, 'TECOLUTLA'),
(159, 'TEHUIPANGO'),
(160, 'ALAMO TEMAPACHE'),
(161, 'TEMPOAL'),
(162, 'TENAMPA'),
(163, 'TENOCHTITLAN'),
(164, 'TEOCELO'),
(165, 'TEPATLAXCO'),
(166, 'TEPETLAN'),
(167, 'TEPETZINTLA'),
(168, 'TEQUILA'),
(169, 'JOSE AZUETA'),
(170, 'TEXCATEPEC'),
(171, 'TEXHUACAN'),
(172, 'TEXISTEPEC'),
(173, 'TEZONAPA'),
(174, 'TIERRA BLANCA'),
(175, 'TIHUATLAN'),
(176, 'TLACOJALPAN'),
(177, 'TLACOLULAN'),
(178, 'TLACOTALPAN'),
(179, 'TLACOTEPEC DE MEJIA'),
(180, 'TLACHICHILCO'),
(181, 'TLALIXCOYAN'),
(182, 'TLALNELHUAYOCAN'),
(183, 'TLAPACOYAN'),
(184, 'TLAQUILPA'),
(185, 'TLILAPAN'),
(186, 'TOMATLAN'),
(187, 'TONAYAN'),
(188, 'TOTUTLA'),
(189, 'TUXPAM'),
(190, 'TUXTILLA'),
(191, 'URSULO GALVAN'),
(192, 'VEGA DE ALATORRE'),
(193, 'VERACRUZ'),
(194, 'VILLA ALDAMA'),
(195, 'XOXOCOTLA'),
(196, 'YANGA'),
(197, 'YECUATLA'),
(198, 'ZACUALPAN'),
(199, 'ZARAGOZA'),
(200, 'ZENTLA'),
(201, 'ZONGOLICA'),
(202, 'ZONTECOMATLAN DE LOPEZ Y FUENTES'),
(203, 'ZOZOCOLCO DE HIDALGO'),
(204, 'AGUA DULCE'),
(205, 'EL HIGO'),
(206, 'NANCHITAL DE LAZARO CARDENAS DEL RIO'),
(207, 'TRES VALLES'),
(208, 'CARLOS A. CARRILLO'),
(209, 'TATAHUICAPAN DE JUAREZ'),
(210, 'UXPANAPA'),
(211, 'SAN RAFAEL'),
(212, 'SANTIAGO SOCHIAPAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE IF NOT EXISTS `nomina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rfc` varchar(10) NOT NULL,
  `quincena` varchar(10) DEFAULT NULL,
  `empleado` int(11) DEFAULT NULL,
  `total_percepciones` decimal(10,3) DEFAULT NULL,
  `total_deducciones` decimal(10,3) DEFAULT NULL,
  `neto` decimal(10,3) DEFAULT NULL,
  `tipo_pago` tinyint(4) DEFAULT NULL,
  `banco` varchar(4) DEFAULT NULL,
  `cuenta` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nom_qna_idx` (`quincena`),
  KEY `nom_emp_idx` (`empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `nomina_activa`
--
CREATE TABLE IF NOT EXISTS `nomina_activa` (
`id` int(11)
,`rfc` varchar(10)
,`quincena` varchar(10)
,`empleado` int(11)
,`total_percepciones` decimal(10,3)
,`total_deducciones` decimal(10,3)
,`neto` decimal(10,3)
,`tipo_pago` tinyint(4)
,`banco` varchar(4)
,`cuenta` varchar(45)
,`created_at` timestamp
,`updated_at` timestamp
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(11) NOT NULL,
  `numcredito` int(11) DEFAULT NULL,
  `qna` int(11) DEFAULT NULL,
  `idpago_nomina` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `monto` decimal(10,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pagos_cred_idx` (`numcredito`),
  KEY `fk_pagos_nomina_idx` (`idpago_nomina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `percepciones`
--

CREATE TABLE IF NOT EXISTS `percepciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado` int(11) DEFAULT NULL,
  `idpercepcion` int(11) DEFAULT NULL,
  `qna_inicio` int(11) DEFAULT NULL,
  `qna_fin` int(11) DEFAULT NULL,
  `extraordinaria` tinyint(1) DEFAULT '0' COMMENT '0=No\n1=Si',
  `monto` decimal(10,3) DEFAULT NULL,
  `dias` tinyint(4) DEFAULT '15' COMMENT 'dias que cubre el pago',
  `exento` decimal(10,3) DEFAULT '0.000' COMMENT 'cantidad exenta del isr\n',
  `observacion` varchar(100) DEFAULT NULL COMMENT 'observaciones extras',
  `activa` tinyint(1) DEFAULT '1' COMMENT 'Solo las activas aplican en nomina\n1=si\n0=No',
  `qna_actual` varchar(7) DEFAULT NULL COMMENT 'Identificador de la quincena en la que estas trabajando\n',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `per_cat_idx` (`idpercepcion`),
  KEY `fk_per_emp_idx` (`empleado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `percepciones`
--

INSERT INTO `percepciones` (`id`, `empleado`, `idpercepcion`, `qna_inicio`, `qna_fin`, `extraordinaria`, `monto`, `dias`, `exento`, `observacion`, `activa`, `qna_actual`, `created_at`, `updated_at`) VALUES
(28, 14, 1, 201510, 201510, 0, 5416.719, 13, 0.000, 'proporcional a 13 dias', 1, NULL, '2015-05-19 05:36:19', '2015-05-19 05:36:19'),
(29, 14, 1, 201511, NULL, 0, 6250.060, 15, 0.000, NULL, 1, NULL, '2015-05-19 05:36:19', '2015-05-19 05:36:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `percepciones_auto`
--

CREATE TABLE IF NOT EXISTS `percepciones_auto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpercepcion` int(11) DEFAULT NULL COMMENT 'Percepcion a la que se liga\n',
  `valor` decimal(10,3) DEFAULT NULL COMMENT 'valor a inicializar\n',
  `aplica` varchar(30) DEFAULT NULL COMMENT 'arreglo en php para comprobar si aplica al nivel correspondiente\n',
  `nivel` varchar(45) DEFAULT NULL,
  `proporcional` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `per_auto_idx` (`idpercepcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Valores por defecto para percepciones' AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `percepciones_auto`
--

INSERT INTO `percepciones_auto` (`id`, `idpercepcion`, `valor`, `aplica`, `nivel`, `proporcional`, `created_at`, `updated_at`) VALUES
(1, 3, 0.000, '[B,C]', NULL, NULL, '2014-11-14 03:05:27', NULL),
(2, 4, 550.000, '[B,C]', '[2,3,4,5,6,7,8]', NULL, '2014-11-14 03:05:27', NULL),
(3, 5, 132.500, '[B,C]', NULL, NULL, '2014-11-14 03:05:27', NULL),
(4, 6, 132.500, '[B,C]', '[2,3,4,5,6,7,8]', NULL, '2014-11-14 03:05:27', NULL),
(5, 7, 132.500, '[B,C]', '[2,3,4,5,6,7,8]', NULL, '2014-11-14 03:05:27', NULL),
(6, 8, 0.000, '[B]', '[2,3,4,5,6,7]', NULL, '2014-11-14 03:05:27', NULL),
(7, 5, 138.500, '[B,C]', '[OA1,MB2]', NULL, '2014-11-14 03:05:27', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plazas`
--

CREATE TABLE IF NOT EXISTS `plazas` (
  `id` varchar(6) NOT NULL,
  `zona_plaza` varchar(3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_plaza_UNIQUE` (`id`),
  KEY `identi_plaza_idx` (`zona_plaza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plazas`
--

INSERT INTO `plazas` (`id`, `zona_plaza`, `created_at`, `updated_at`) VALUES
('H0I001', 'H0I', '2015-05-19 05:35:00', '2015-05-19 05:35:00'),
('H0J001', 'H0J', '2015-05-19 05:01:21', '2015-05-19 05:01:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plazas_autorizadas`
--

CREATE TABLE IF NOT EXISTS `plazas_autorizadas` (
  `id` varchar(3) NOT NULL,
  `tipo_empleado` char(1) DEFAULT NULL,
  `clave_plaza` varchar(10) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `zona_eco` tinyint(4) DEFAULT NULL,
  `autorizadas` int(11) DEFAULT NULL,
  `vigente` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_plazas_autorizadas_cat_idx` (`clave_plaza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plazas_autorizadas`
--

INSERT INTO `plazas_autorizadas` (`id`, `tipo_empleado`, `clave_plaza`, `complemento`, `zona_eco`, `autorizadas`, `vigente`, `created_at`, `updated_at`) VALUES
('B23', 'B', 'A01806', NULL, 2, 25, 1, '2014-11-14 03:05:26', NULL),
('B24', 'B', 'T06803', NULL, 2, 1, 1, '2014-11-14 03:05:26', NULL),
('B25', 'B', 'A01807', NULL, 2, 31, 1, '2014-11-14 03:05:26', NULL),
('B2A', 'B', 'A01803', NULL, 2, 1, 1, '2014-11-14 03:05:26', NULL),
('B2B', 'B', 'S01803', NULL, 2, 4, 1, '2014-11-14 03:05:26', NULL),
('B2C', 'B', 'A01805', NULL, 2, 1, 1, '2014-11-14 03:05:26', NULL),
('B2D', 'B', 'T03803', NULL, 2, 24, 1, '2014-11-14 03:05:26', NULL),
('B2E', 'B', 'A03804', NULL, 2, 24, 1, '2014-11-14 03:05:26', NULL),
('B2F', 'B', 'T03810', NULL, 2, 19, 1, '2014-11-14 03:05:26', NULL),
('B2G', 'B', 'T03820', NULL, 2, 114, 1, '2014-11-14 03:05:26', NULL),
('B2H', 'B', 'T03823', NULL, 2, 11, 1, '2014-11-14 03:05:26', NULL),
('B33', 'B', 'A01806', NULL, 3, 6, 1, '2014-11-14 03:05:26', NULL),
('B34', 'B', 'T06803', NULL, 3, 1, 1, '2014-11-14 03:05:26', NULL),
('B35', 'B', 'A01807', NULL, 3, 1, 1, '2014-11-14 03:05:26', NULL),
('B3D', 'B', 'T03803', NULL, 3, 8, 1, '2014-11-14 03:05:26', NULL),
('B3E', 'B', 'A03804', NULL, 3, 6, 1, '2014-11-14 03:05:26', NULL),
('B3F', 'B', 'T03810', NULL, 3, 9, 1, '2014-11-14 03:05:26', NULL),
('B3G', 'B', 'T03820', NULL, 3, 41, 1, '2014-11-14 03:05:26', NULL),
('B3H', 'B', 'T03823', NULL, 3, 3, 1, '2014-11-14 03:05:26', NULL),
('C23', 'C', 'CF34810', NULL, 2, 1, 1, '2014-11-14 03:05:26', NULL),
('C26', 'C', 'CF04807', NULL, 2, 1, 1, '2014-11-14 03:05:26', NULL),
('C28', 'C', 'CF33849', NULL, 2, 8, 1, '2014-11-14 03:05:26', NULL),
('C2A', 'C', 'CF14070', NULL, 2, 1, 1, '2014-11-14 03:05:26', NULL),
('C2B', 'C', 'CF36014', 'REGIONAL', 2, 1, 1, '2014-11-14 03:05:26', NULL),
('C2C', 'C', 'CF01059', '(SUBDIRECTOR)', 2, 6, 1, '2014-11-14 03:05:26', NULL),
('C2D', 'C', 'CF36014', 'DE ZONA (II)', 2, 17, 1, '2014-11-14 03:05:26', NULL),
('C38', 'C', 'CF33849', NULL, 3, 4, 1, '2014-11-14 03:05:26', NULL),
('C3E', 'C', 'CF36014', 'DE ZONA (III)', 3, 6, 1, '2014-11-14 03:05:26', NULL),
('H01', 'H', 'P5003', NULL, 0, 82, 1, '2014-11-14 03:05:26', NULL),
('H02', 'H', 'B5003', NULL, 0, 22, 1, '2014-11-14 03:05:26', NULL),
('H0A', 'H', 'Z1001', NULL, 0, 3, 1, '2014-11-14 03:05:26', NULL),
('H0B', 'H', 'U1001', NULL, 0, 3, 1, '2014-11-14 03:05:26', NULL),
('H0C', 'H', 'U1003', NULL, 0, 2, 1, '2014-11-14 03:05:26', NULL),
('H0D', 'H', 'C2001', NULL, 0, 4, 1, '2014-11-14 03:05:26', NULL),
('H0E', 'H', 'J2004', NULL, 0, 2, 1, '2014-11-14 03:05:26', NULL),
('H0F', 'H', 'J2003', NULL, 0, 2, 1, '2014-11-14 03:05:26', NULL),
('H0G', 'H', 'J2002', NULL, 0, 8, 1, '2014-11-14 03:05:26', NULL),
('H0H', 'H', 'J2001', NULL, 0, 8, 1, '2014-11-14 03:05:26', NULL),
('H0I', 'H', 'F3000', NULL, 0, 1, 1, '2014-11-14 03:05:26', NULL),
('H0J', 'H', 'F3001', NULL, 0, 10, 1, '2014-11-14 03:05:26', NULL),
('H0K', 'H', 'F3002', '(ADMINISTRACION)', 0, 5, 1, '2014-11-14 03:05:26', NULL),
('H0L', 'H', 'F3003', NULL, 0, 5, 1, '2014-11-14 03:05:26', NULL),
('H0M', 'H', 'J3002', NULL, 0, 25, 1, '2014-11-14 03:05:26', NULL),
('H0N', 'H', 'R3002', NULL, 0, 3, 1, '2014-11-14 03:05:26', NULL),
('H0O', 'H', 'R3001', NULL, 0, 9, 1, '2014-11-14 03:05:26', NULL),
('H0P', 'H', 'D4003', NULL, 0, 3, 1, '2014-11-14 03:05:26', NULL),
('H0Q', 'H', 'D4002', NULL, 0, 2, 1, '2014-11-14 03:05:26', NULL),
('H0R', 'H', 'D4001', NULL, 0, 8, 1, '2014-11-14 03:05:26', NULL),
('H0S', 'H', 'A4001', NULL, 0, 4, 1, '2014-11-14 03:05:26', NULL),
('H0T', 'H', 'A4002', NULL, 0, 8, 1, '2014-11-14 03:05:26', NULL),
('H0U', 'H', 'A4003', 'GENERAL', 0, 5, 1, '2014-11-14 03:05:26', NULL),
('H0V', 'H', 'I5002', NULL, 0, 4, 1, '2014-11-14 03:05:26', NULL),
('H0W', 'H', 'T5001', NULL, 0, 1, 1, '2014-11-14 03:05:26', NULL),
('H0X', 'H', 'L4004', NULL, 0, 1, 1, '2014-11-14 03:05:26', NULL),
('H0Y', 'H', 'J3002', '( INFORMATICA O ACREDITACION)', 0, 47, 1, '2014-11-14 03:05:26', NULL),
('H0Z', 'H', 'A4003', '( INFORMATICA O ACREDITACION)', 0, 48, 1, '2014-11-14 03:05:26', NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `plazas_ocupadas`
--
CREATE TABLE IF NOT EXISTS `plazas_ocupadas` (
`id` varchar(6)
,`rfc` varchar(10)
,`adscripcion` varchar(10)
,`zona_plaza` varchar(3)
,`id_asignacion` int(11)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quincena`
--

CREATE TABLE IF NOT EXISTS `quincena` (
  `id` varchar(10) NOT NULL,
  `id_quincena` int(11) DEFAULT NULL COMMENT 'identificador de la quincena',
  `anio` int(11) DEFAULT NULL COMMENT 'año en el que aplica',
  `tipo` tinyint(1) DEFAULT NULL COMMENT '0=ordinaria\n1=estraordinaria',
  `inicio` tinyint(4) DEFAULT NULL COMMENT 'dia de inicio de la quincena\n',
  `fin` tinyint(4) DEFAULT NULL COMMENT 'dia de fin de quincena',
  `estado` tinyint(4) DEFAULT '0' COMMENT '0=iniciada\n1=terminado',
  `observacion` varchar(45) DEFAULT NULL,
  `finalizacion` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_q_idx` (`id_quincena`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `quincena_activa`
--
CREATE TABLE IF NOT EXISTS `quincena_activa` (
`id` varchar(10)
,`id_quincena` int(11)
,`anio` int(11)
,`tipo` tinyint(1)
,`inicio` tinyint(4)
,`fin` tinyint(4)
,`estado` tinyint(4)
,`observacion` varchar(45)
,`finalizacion` timestamp
,`created_at` timestamp
,`updated_at` timestamp
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `recuento_plazas`
--
CREATE TABLE IF NOT EXISTS `recuento_plazas` (
`id` varchar(3)
,`clave` varchar(10)
,`nivel` varchar(3)
,`descripcion` varchar(146)
,`zona_eco` tinyint(4)
,`tipo` char(1)
,`autorizadas` int(11)
,`ocupadas` decimal(23,0)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE IF NOT EXISTS `sesion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sesion_user_idx` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`id`, `idusuario`, `created_at`, `updated_at`) VALUES
(1, 1, '2014-11-14 16:12:38', '2014-11-14 16:12:38'),
(2, 1, '2014-11-18 15:43:36', '2014-11-18 15:43:36'),
(3, 1, '2014-11-19 00:27:23', '2014-11-19 00:27:23'),
(4, 1, '2014-11-20 20:40:03', '2014-11-20 20:40:03'),
(5, 1, '2015-01-07 20:12:31', '2015-01-07 20:12:31'),
(6, 1, '2015-01-07 20:30:06', '2015-01-07 20:30:06'),
(7, 1, '2015-01-21 13:47:15', '2015-01-21 13:47:15'),
(8, 1, '2015-01-23 14:10:02', '2015-01-23 14:10:02'),
(9, 1, '2015-01-23 18:28:19', '2015-01-23 18:28:19'),
(10, 1, '2015-02-19 19:31:31', '2015-02-19 19:31:31'),
(11, 1, '2015-04-29 01:17:31', '2015-04-29 01:17:31'),
(12, 1, '2015-05-08 21:58:42', '2015-05-08 21:58:42'),
(13, 1, '2015-05-08 22:36:46', '2015-05-08 22:36:46'),
(14, 1, '2015-05-09 04:23:38', '2015-05-09 04:23:38'),
(15, 1, '2015-05-09 04:24:13', '2015-05-09 04:24:13'),
(16, 1, '2015-05-09 04:55:08', '2015-05-09 04:55:08'),
(17, 1, '2015-05-12 04:49:01', '2015-05-12 04:49:01'),
(18, 1, '2015-05-12 04:50:30', '2015-05-12 04:50:30'),
(19, 1, '2015-05-13 03:48:31', '2015-05-13 03:48:31'),
(20, 1, '2015-05-13 19:51:17', '2015-05-13 19:51:17'),
(21, 1, '2015-05-14 03:03:24', '2015-05-14 03:03:24'),
(22, 1, '2015-05-14 06:42:11', '2015-05-14 06:42:11'),
(23, 1, '2015-05-14 21:56:57', '2015-05-14 21:56:57'),
(24, 1, '2015-05-14 22:04:11', '2015-05-14 22:04:11'),
(25, 1, '2015-05-15 02:11:14', '2015-05-15 02:11:14'),
(26, 1, '2015-05-15 06:47:31', '2015-05-15 06:47:31'),
(27, 1, '2015-05-15 06:54:36', '2015-05-15 06:54:36'),
(28, 1, '2015-05-16 03:00:31', '2015-05-16 03:00:31'),
(29, 1, '2015-05-16 03:11:18', '2015-05-16 03:11:18'),
(30, 1, '2015-05-16 03:32:24', '2015-05-16 03:32:24'),
(31, 1, '2015-05-16 06:33:52', '2015-05-16 06:33:52'),
(32, 1, '2015-05-19 02:25:08', '2015-05-19 02:25:08'),
(33, 1, '2015-05-19 00:26:58', '2015-05-19 00:26:58'),
(34, 1, '2015-05-19 05:28:12', '2015-05-19 05:28:12'),
(35, 1, '2015-05-19 00:28:26', '2015-05-19 00:28:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sueldo`
--

CREATE TABLE IF NOT EXISTS `sueldo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado` int(11) DEFAULT NULL,
  `id_tabulador` int(11) DEFAULT NULL,
  `sueldo_bruto` decimal(10,3) DEFAULT NULL,
  `sueldo_qna` decimal(10,3) DEFAULT NULL,
  `sueldo_dia` decimal(10,3) DEFAULT NULL,
  `compensacion` decimal(10,3) DEFAULT NULL,
  `compensacion_qna` decimal(10,3) DEFAULT NULL,
  `compensacion_dia` decimal(10,3) DEFAULT NULL,
  `inicio` date DEFAULT NULL COMMENT 'vigencia inicio',
  `fin` date DEFAULT NULL COMMENT 'vigencia fin',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `su_cargo_idx` (`empleado`),
  KEY `su_tabulador_idx` (`id_tabulador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `sueldo`
--

INSERT INTO `sueldo` (`id`, `empleado`, `id_tabulador`, `sueldo_bruto`, `sueldo_qna`, `sueldo_dia`, `compensacion`, `compensacion_qna`, `compensacion_dia`, `inicio`, `fin`, `created_at`, `updated_at`) VALUES
(10, 14, 37, 12500.120, 6250.060, NULL, NULL, NULL, NULL, '2015-05-18', NULL, '2015-05-19 05:36:18', '2015-05-19 05:36:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabulador`
--

CREATE TABLE IF NOT EXISTS `tabulador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zona_plaza` varchar(3) DEFAULT NULL,
  `sueldo_bruto` decimal(10,3) DEFAULT NULL,
  `compensacion` decimal(10,3) DEFAULT NULL,
  `sueldo_max` decimal(10,3) DEFAULT NULL,
  `inicio` date DEFAULT NULL COMMENT 'inicio de vigencia',
  `fin` date DEFAULT NULL COMMENT 'fin de vigencia',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tab_plaza_idx` (`zona_plaza`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Volcado de datos para la tabla `tabulador`
--

INSERT INTO `tabulador` (`id`, `zona_plaza`, `sueldo_bruto`, `compensacion`, `sueldo_max`, `inicio`, `fin`, `created_at`, `updated_at`) VALUES
(1, 'B2A', 5542.530, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(2, 'B2B', 5542.530, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(3, 'B2C', 5542.530, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(4, 'B2D', 5542.530, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(5, 'B2E', 5542.530, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(6, 'B2F', 5542.530, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(7, 'B23', 5690.430, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(8, 'B24', 5838.170, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(9, 'B25', 6000.780, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(10, 'B2G', 6207.730, 1148.150, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(11, 'B2H', 6207.730, 1148.150, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(12, 'C23', 5498.000, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(13, 'C26', 5897.850, 475.200, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(14, 'C28', 6069.100, 1623.250, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(15, 'B3D', 6133.820, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(16, 'B3E', 6133.820, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(17, 'B3F', 6133.820, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(18, 'B33', 6281.520, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(19, 'B34', 6429.320, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(20, 'B35', 6584.620, NULL, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(21, 'B3G', 6710.220, 1379.100, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(22, 'B3H', 6710.210, 1379.100, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(23, 'C38', 6554.750, 1768.400, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(24, 'C2A', 14610.340, 51060.120, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(25, 'C2B', 5346.500, 11699.740, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(26, 'C2C', 4685.700, 12360.540, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(27, 'C2D', 4328.840, 12717.400, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(28, 'C3E', 4649.340, 12396.880, NULL, NULL, NULL, '2014-11-14 03:05:26', NULL),
(29, 'H0A', NULL, NULL, 47600.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(30, 'H0B', NULL, NULL, 36600.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(31, 'H0C', NULL, NULL, 24200.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(32, 'H0D', NULL, NULL, 16500.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(33, 'H0E', NULL, NULL, 24200.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(34, 'H0F', NULL, NULL, 18000.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(35, 'H0G', NULL, NULL, 16500.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(36, 'H0H', NULL, NULL, 12850.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(37, 'H0I', NULL, NULL, 14000.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(38, 'H0J', NULL, NULL, 11750.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(39, 'H0K', NULL, NULL, 9750.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(40, 'H0L', NULL, NULL, 8500.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(41, 'H0M', NULL, NULL, 5552.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(42, 'H0N', NULL, NULL, 9500.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(43, 'H0O', NULL, NULL, 6500.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(44, 'H0P', NULL, NULL, 7500.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(45, 'H0Q', NULL, NULL, 7000.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(46, 'H0R', NULL, NULL, 4500.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(47, 'H0S', NULL, NULL, 5500.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(48, 'H0T', NULL, NULL, 4500.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(49, 'H0U', NULL, NULL, 3202.200, NULL, NULL, '2014-11-14 03:05:26', NULL),
(50, 'H0V', NULL, NULL, 3800.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(51, 'H0W', NULL, NULL, 4500.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(52, 'H0X', NULL, NULL, 8300.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(53, 'H0Y', NULL, NULL, 5552.000, NULL, NULL, '2014-11-14 03:05:26', NULL),
(54, 'H0Z', NULL, NULL, 3202.200, NULL, NULL, '2014-11-14 03:05:26', NULL),
(55, 'H01', NULL, NULL, 3202.200, NULL, NULL, '2014-11-14 03:05:26', NULL),
(56, 'H02', NULL, NULL, 3202.200, NULL, NULL, '2014-11-14 03:05:26', NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `tabulador_plaza`
--
CREATE TABLE IF NOT EXISTS `tabulador_plaza` (
`id` int(11)
,`zona_plaza` varchar(3)
,`clave` varchar(10)
,`descripcion` varchar(146)
,`nivel` varchar(3)
,`zona_eco` tinyint(4)
,`tipo` char(1)
,`autorizadas` int(11)
,`ocupadas` decimal(23,0)
,`sueldo_bruto` decimal(10,3)
,`compensacion` decimal(10,3)
,`sueldo_max` decimal(10,3)
,`inicio` date
,`fin` date
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `total_deducciones`
--
CREATE TABLE IF NOT EXISTS `total_deducciones` (
`empleado` int(11)
,`qna_actual` varchar(7)
,`total` decimal(32,3)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `total_percepciones`
--
CREATE TABLE IF NOT EXISTS `total_percepciones` (
`empleado` int(11)
,`qna_actual` varchar(7)
,`total` decimal(32,3)
,`texento` decimal(32,3)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `total_plazas_ocupadas`
--
CREATE TABLE IF NOT EXISTS `total_plazas_ocupadas` (
`zona_plaza` varchar(3)
,`total` decimal(23,0)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(12) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `rol` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`username`, `password`, `rol`, `remember_token`, `created_at`, `updated_at`, `id`) VALUES
('cesar', '$2y$10$nl.900RwAgT2yGl7ExIjPugBMNxte4BvmIaR89d3zHTT0wYgrfwKa', NULL, '6mTRr34yJIEGqSWLro3BpGCuEHtqTJe7FoRO5H7Bw2K12FfuaXmaaIeZQz6c', NULL, '2015-05-16 06:34:36', 1);

-- --------------------------------------------------------

--
-- Estructura para la vista `bajas_nomina`
--
DROP TABLE IF EXISTS `bajas_nomina`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bajas_nomina` AS select `nomina_activa`.`id` AS `id`,`empleado_plaza`.`id` AS `empleado_id`,`nomina_activa`.`quincena` AS `quincena` from (`empleado_plaza` join `nomina_activa` on((`empleado_plaza`.`id` = `nomina_activa`.`empleado`))) where (`empleado_plaza`.`fin` is not null);

-- --------------------------------------------------------

--
-- Estructura para la vista `base_grabable`
--
DROP TABLE IF EXISTS `base_grabable`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `base_grabable` AS select `total_percepciones`.`empleado` AS `empleado`,`total_percepciones`.`qna_actual` AS `qna_actual`,`total_percepciones`.`total` AS `total`,`total_percepciones`.`texento` AS `texento`,if((`total_percepciones`.`texento` is not null),(`total_percepciones`.`total` - `total_percepciones`.`texento`),`total_percepciones`.`total`) AS `base` from `total_percepciones`;

-- --------------------------------------------------------

--
-- Estructura para la vista `detalle_empleado`
--
DROP TABLE IF EXISTS `detalle_empleado`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detalle_empleado` AS select `empleado`.`rfc` AS `rfc`,concat(`empleado`.`nombre`,' ',`empleado`.`paterno`,' ',`empleado`.`materno`) AS `nombre_completo`,`empleado`.`estado` AS `estado`,`recuento_plazas`.`descripcion` AS `descripcion`,`cat_adscripcion`.`adscripcion` AS `adscripcion`,`cat_adscripcion`.`id` AS `id_adscripcion`,`estatus_plaza`.`id_asignacion` AS `id_asignacion` from (((`empleado` left join `estatus_plaza` on((`estatus_plaza`.`ocupa` = `empleado`.`rfc`))) left join `cat_adscripcion` on((`estatus_plaza`.`adscripcion` = `cat_adscripcion`.`id`))) left join `recuento_plazas` on((`recuento_plazas`.`id` = `estatus_plaza`.`zona_plaza`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `estatus_nomina`
--
DROP TABLE IF EXISTS `estatus_nomina`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estatus_nomina` AS select `estatus_plaza`.`id_asignacion` AS `id_asignacion`,`estatus_plaza`.`ocupa` AS `ocupa`,`nomina_activa`.`quincena` AS `quincena` from (`estatus_plaza` left join `nomina_activa` on((`nomina_activa`.`empleado` = `estatus_plaza`.`id_asignacion`))) where (`estatus_plaza`.`ocupa` is not null);

-- --------------------------------------------------------

--
-- Estructura para la vista `estatus_plaza`
--
DROP TABLE IF EXISTS `estatus_plaza`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estatus_plaza` AS select `plazas`.`id` AS `id`,`plazas`.`zona_plaza` AS `zona_plaza`,`plazas_ocupadas`.`rfc` AS `ocupa`,`plazas_ocupadas`.`adscripcion` AS `adscripcion`,`plazas_ocupadas`.`id_asignacion` AS `id_asignacion` from (`plazas` left join `plazas_ocupadas` on((`plazas_ocupadas`.`id` = `plazas`.`id`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `nomina_activa`
--
DROP TABLE IF EXISTS `nomina_activa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomina_activa` AS select `nomina`.`id` AS `id`,`nomina`.`rfc` AS `rfc`,`nomina`.`quincena` AS `quincena`,`nomina`.`empleado` AS `empleado`,`nomina`.`total_percepciones` AS `total_percepciones`,`nomina`.`total_deducciones` AS `total_deducciones`,`nomina`.`neto` AS `neto`,`nomina`.`tipo_pago` AS `tipo_pago`,`nomina`.`banco` AS `banco`,`nomina`.`cuenta` AS `cuenta`,`nomina`.`created_at` AS `created_at`,`nomina`.`updated_at` AS `updated_at` from (`nomina` join `quincena_activa` on((`nomina`.`quincena` = `quincena_activa`.`id`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `plazas_ocupadas`
--
DROP TABLE IF EXISTS `plazas_ocupadas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `plazas_ocupadas` AS select `plazas`.`id` AS `id`,`empleado_plaza`.`rfc` AS `rfc`,`empleado_plaza`.`adscripcion` AS `adscripcion`,`plazas`.`zona_plaza` AS `zona_plaza`,`empleado_plaza`.`id` AS `id_asignacion` from (`plazas` join `empleado_plaza` on((`empleado_plaza`.`id_plaza` = `plazas`.`id`))) where isnull(`empleado_plaza`.`fin`);

-- --------------------------------------------------------

--
-- Estructura para la vista `quincena_activa`
--
DROP TABLE IF EXISTS `quincena_activa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quincena_activa` AS select `quincena`.`id` AS `id`,`quincena`.`id_quincena` AS `id_quincena`,`quincena`.`anio` AS `anio`,`quincena`.`tipo` AS `tipo`,`quincena`.`inicio` AS `inicio`,`quincena`.`fin` AS `fin`,`quincena`.`estado` AS `estado`,`quincena`.`observacion` AS `observacion`,`quincena`.`finalizacion` AS `finalizacion`,`quincena`.`created_at` AS `created_at`,`quincena`.`updated_at` AS `updated_at` from `quincena` where (`quincena`.`estado` = 0);

-- --------------------------------------------------------

--
-- Estructura para la vista `recuento_plazas`
--
DROP TABLE IF EXISTS `recuento_plazas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `recuento_plazas` AS select `plazas_autorizadas`.`id` AS `id`,`cat_plaza`.`clave` AS `clave`,`cat_plaza`.`nivel` AS `nivel`,if(isnull(`plazas_autorizadas`.`complemento`),`cat_plaza`.`descripcion`,concat(`cat_plaza`.`descripcion`,' ',`plazas_autorizadas`.`complemento`)) AS `descripcion`,`plazas_autorizadas`.`zona_eco` AS `zona_eco`,`cat_plaza`.`tipo` AS `tipo`,`plazas_autorizadas`.`autorizadas` AS `autorizadas`,if(isnull(`total_plazas_ocupadas`.`total`),0,`total_plazas_ocupadas`.`total`) AS `ocupadas` from ((`plazas_autorizadas` join `cat_plaza` on((`cat_plaza`.`clave` = `plazas_autorizadas`.`clave_plaza`))) left join `total_plazas_ocupadas` on((`plazas_autorizadas`.`id` = `total_plazas_ocupadas`.`zona_plaza`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `tabulador_plaza`
--
DROP TABLE IF EXISTS `tabulador_plaza`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabulador_plaza` AS select `tabulador`.`id` AS `id`,`tabulador`.`zona_plaza` AS `zona_plaza`,`recuento_plazas`.`clave` AS `clave`,`recuento_plazas`.`descripcion` AS `descripcion`,`recuento_plazas`.`nivel` AS `nivel`,`recuento_plazas`.`zona_eco` AS `zona_eco`,`recuento_plazas`.`tipo` AS `tipo`,`recuento_plazas`.`autorizadas` AS `autorizadas`,`recuento_plazas`.`ocupadas` AS `ocupadas`,`tabulador`.`sueldo_bruto` AS `sueldo_bruto`,`tabulador`.`compensacion` AS `compensacion`,`tabulador`.`sueldo_max` AS `sueldo_max`,`tabulador`.`inicio` AS `inicio`,`tabulador`.`fin` AS `fin` from (`tabulador` join `recuento_plazas` on((`recuento_plazas`.`id` = `tabulador`.`zona_plaza`))) order by `recuento_plazas`.`zona_eco` desc,`recuento_plazas`.`nivel`,`recuento_plazas`.`clave`,`recuento_plazas`.`tipo`;

-- --------------------------------------------------------

--
-- Estructura para la vista `total_deducciones`
--
DROP TABLE IF EXISTS `total_deducciones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_deducciones` AS select `deducciones`.`empleado` AS `empleado`,`deducciones`.`qna_actual` AS `qna_actual`,sum(`deducciones`.`monto`) AS `total` from `deducciones` where (`deducciones`.`qna_actual` is not null) group by `deducciones`.`empleado`;

-- --------------------------------------------------------

--
-- Estructura para la vista `total_percepciones`
--
DROP TABLE IF EXISTS `total_percepciones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_percepciones` AS select `percepciones`.`empleado` AS `empleado`,`percepciones`.`qna_actual` AS `qna_actual`,sum(`percepciones`.`monto`) AS `total`,sum(`percepciones`.`exento`) AS `texento` from `percepciones` where (`percepciones`.`qna_actual` is not null) group by `percepciones`.`empleado`;

-- --------------------------------------------------------

--
-- Estructura para la vista `total_plazas_ocupadas`
--
DROP TABLE IF EXISTS `total_plazas_ocupadas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_plazas_ocupadas` AS select `plazas_ocupadas`.`zona_plaza` AS `zona_plaza`,sum(1) AS `total` from `plazas_ocupadas` group by `plazas_ocupadas`.`zona_plaza`;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_asis_emp` FOREIGN KEY (`idhorario_emp`) REFERENCES `horario_empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `bono_puntualidad`
--
ALTER TABLE `bono_puntualidad`
  ADD CONSTRAINT `horario_punt` FOREIGN KEY (`horario`) REFERENCES `horario_empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `punt_nom` FOREIGN KEY (`pago_nomina`) REFERENCES `desglose_percepcion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `cargo_contra` FOREIGN KEY (`empleado`) REFERENCES `empleado_plaza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `creditos`
--
ALTER TABLE `creditos`
  ADD CONSTRAINT `fk_creditos_cat` FOREIGN KEY (`clave_credito`) REFERENCES `cat_creditos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_creditos_emp` FOREIGN KEY (`rfc`) REFERENCES `empleado` (`rfc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD CONSTRAINT `emp_datos` FOREIGN KEY (`rfc`) REFERENCES `empleado` (`rfc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_mun` FOREIGN KEY (`municipio`) REFERENCES `municipios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deducciones`
--
ALTER TABLE `deducciones`
  ADD CONSTRAINT `ded_cat` FOREIGN KEY (`iddeduccion`) REFERENCES `cat_deducciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ded_emp` FOREIGN KEY (`empleado`) REFERENCES `empleado_plaza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deducciones_auto`
--
ALTER TABLE `deducciones_auto`
  ADD CONSTRAINT `fk_deducciones_auto_ded` FOREIGN KEY (`iddeduccion`) REFERENCES `cat_deducciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `desglose_deduccion`
--
ALTER TABLE `desglose_deduccion`
  ADD CONSTRAINT `fk_desglose_deduccion_1` FOREIGN KEY (`idnomina`) REFERENCES `nomina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_desglose_deduccion_2` FOREIGN KEY (`iddeduccion`) REFERENCES `cat_deducciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `desglose_percepcion`
--
ALTER TABLE `desglose_percepcion`
  ADD CONSTRAINT `fk_desglose_percepcion_1` FOREIGN KEY (`idnomina`) REFERENCES `nomina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_desglose_perc_cat` FOREIGN KEY (`idpercepcion`) REFERENCES `cat_percepciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `emp_banco` FOREIGN KEY (`banco`) REFERENCES `cat_banco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado_plaza`
--
ALTER TABLE `empleado_plaza`
  ADD CONSTRAINT `cargo_catpla` FOREIGN KEY (`clave_plaza`) REFERENCES `cat_plaza` (`clave`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cargo_emp` FOREIGN KEY (`rfc`) REFERENCES `empleado` (`rfc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cargo_ads` FOREIGN KEY (`adscripcion`) REFERENCES `cat_adscripcion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `hijos`
--
ALTER TABLE `hijos`
  ADD CONSTRAINT `rfc_hijos` FOREIGN KEY (`rfc_empleado`) REFERENCES `empleado` (`rfc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario_empleado`
--
ALTER TABLE `horario_empleado`
  ADD CONSTRAINT `fk_hor_cat` FOREIGN KEY (`idhorario`) REFERENCES `cat_horarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hor_emp` FOREIGN KEY (`empleado`) REFERENCES `empleado_plaza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs_act` FOREIGN KEY (`idaccion`) REFERENCES `acciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_logs_sess` FOREIGN KEY (`idsesion`) REFERENCES `sesion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD CONSTRAINT `nom_emp` FOREIGN KEY (`empleado`) REFERENCES `empleado_plaza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nom_qna` FOREIGN KEY (`quincena`) REFERENCES `quincena` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_pagos_cred` FOREIGN KEY (`numcredito`) REFERENCES `creditos` (`numcredito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pagos_nomina` FOREIGN KEY (`idpago_nomina`) REFERENCES `desglose_deduccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `percepciones`
--
ALTER TABLE `percepciones`
  ADD CONSTRAINT `fk_per_cat` FOREIGN KEY (`idpercepcion`) REFERENCES `cat_percepciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_per_emp` FOREIGN KEY (`empleado`) REFERENCES `empleado_plaza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `percepciones_auto`
--
ALTER TABLE `percepciones_auto`
  ADD CONSTRAINT `per_auto` FOREIGN KEY (`idpercepcion`) REFERENCES `cat_percepciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plazas`
--
ALTER TABLE `plazas`
  ADD CONSTRAINT `identi_plaza` FOREIGN KEY (`zona_plaza`) REFERENCES `plazas_autorizadas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plazas_autorizadas`
--
ALTER TABLE `plazas_autorizadas`
  ADD CONSTRAINT `autorizadas_cat` FOREIGN KEY (`clave_plaza`) REFERENCES `cat_plaza` (`clave`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `quincena`
--
ALTER TABLE `quincena`
  ADD CONSTRAINT `cat_q` FOREIGN KEY (`id_quincena`) REFERENCES `cat_quincena` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `fk_sesion_user` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sueldo`
--
ALTER TABLE `sueldo`
  ADD CONSTRAINT `su_cargo` FOREIGN KEY (`empleado`) REFERENCES `empleado_plaza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `su_tabulador` FOREIGN KEY (`id_tabulador`) REFERENCES `tabulador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tabulador`
--
ALTER TABLE `tabulador`
  ADD CONSTRAINT `tab_plaza` FOREIGN KEY (`zona_plaza`) REFERENCES `plazas_autorizadas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

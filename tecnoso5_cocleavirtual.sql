-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-05-2021 a las 09:05:02
-- Versión del servidor: 5.7.23-23
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tecnoso5_cocleavirtual`
--

DELIMITER $$
--
-- Procedimientos
--
$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ArchivoMultimedia`
--

CREATE TABLE `ArchivoMultimedia` (
  `idArchivoMultimedia` int(11) NOT NULL,
  `ruta` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `formato` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tamanio` int(255) DEFAULT NULL,
  `temas` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` int(1) DEFAULT '0' COMMENT '0->sin transcribir 1-> Aceptado  2->Pendiente   3->Verificado   4->Rechazado',
  `idEst` int(10) NOT NULL,
  `idTrans` int(11) DEFAULT NULL,
  `idEstudiante` int(11) DEFAULT NULL,
  `idTranscriptor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ArchivoTranscrito`
--

CREATE TABLE `ArchivoTranscrito` (
  `idArchivoTranscrito` int(11) NOT NULL,
  `ruta` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` int(2) DEFAULT '2' COMMENT '2->Pendiente 3->Verificado 4->Rechazado	',
  `formato` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tamanio` float DEFAULT NULL,
  `estrellas` int(2) DEFAULT NULL,
  `comentarios` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idEst` int(2) DEFAULT NULL,
  `idTrans` int(2) DEFAULT NULL,
  `idAM` int(11) DEFAULT NULL,
  `idEstudiante` int(11) DEFAULT NULL,
  `idVerificador` int(11) DEFAULT NULL,
  `idTranscriptor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cuenta`
--

CREATE TABLE `Cuenta` (
  `idCuenta` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contrasena` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipoUsuario` int(11) DEFAULT '0' COMMENT '0 -> estudiante 1->Transcriptor 2->Verificador',
  `descripcion` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valDoc` int(1) DEFAULT '0' COMMENT 'Validación de documentos del transcriptor',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estudiante`
--

CREATE TABLE `Estudiante` (
  `idEstudiante` int(11) NOT NULL,
  `nivelEstudio` int(11) DEFAULT NULL,
  `tipoDiscapacidad` int(11) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL,
  `Cuenta_idCuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Transcriptor`
--

CREATE TABLE `Transcriptor` (
  `idTranscriptor` int(11) NOT NULL,
  `nivelLSM` int(11) DEFAULT NULL,
  `temas` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '0->matemáticas  1->español 2->biología  3->historia   4->física',
  `aExp` int(2) DEFAULT NULL COMMENT 'Años de Experiencia',
  `puntuacion` float DEFAULT NULL,
  `certificado` mediumblob,
  `Persona_idPersona` int(11) DEFAULT NULL,
  `Cuenta_idCuenta` int(11) DEFAULT NULL,
  `validado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Verificador`
--

CREATE TABLE `Verificador` (
  `idVerificador` int(11) NOT NULL,
  `nivelLSM` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL,
  `Cuenta_idCuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ArchivoMultimedia`
--
ALTER TABLE `ArchivoMultimedia`
  ADD PRIMARY KEY (`idArchivoMultimedia`),
  ADD KEY `fk_ArchivoMultimedia_Estudiante1` (`idEstudiante`),
  ADD KEY `fk_ArchivoMultimedia_Transcriptor1` (`idTranscriptor`);

--
-- Indices de la tabla `ArchivoTranscrito`
--
ALTER TABLE `ArchivoTranscrito`
  ADD PRIMARY KEY (`idArchivoTranscrito`),
  ADD KEY `fk_ArchivoTranscrito_Estudiante1` (`idEstudiante`),
  ADD KEY `fk_ArchivoTranscrito_Verificador1` (`idVerificador`),
  ADD KEY `fk_ArchivoTranscrito_Transcriptor1` (`idTranscriptor`);

--
-- Indices de la tabla `Cuenta`
--
ALTER TABLE `Cuenta`
  ADD PRIMARY KEY (`idCuenta`);

--
-- Indices de la tabla `Estudiante`
--
ALTER TABLE `Estudiante`
  ADD PRIMARY KEY (`idEstudiante`),
  ADD KEY `fk_Estudiante_Cuenta1` (`Cuenta_idCuenta`);

--
-- Indices de la tabla `Transcriptor`
--
ALTER TABLE `Transcriptor`
  ADD PRIMARY KEY (`idTranscriptor`),
  ADD KEY `fk_Transcriptor_Cuenta1` (`Cuenta_idCuenta`);

--
-- Indices de la tabla `Verificador`
--
ALTER TABLE `Verificador`
  ADD PRIMARY KEY (`idVerificador`),
  ADD KEY `fk_Verificador_Cuenta1` (`Cuenta_idCuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ArchivoMultimedia`
--
ALTER TABLE `ArchivoMultimedia`
  MODIFY `idArchivoMultimedia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ArchivoTranscrito`
--
ALTER TABLE `ArchivoTranscrito`
  MODIFY `idArchivoTranscrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Cuenta`
--
ALTER TABLE `Cuenta`
  MODIFY `idCuenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Estudiante`
--
ALTER TABLE `Estudiante`
  MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Transcriptor`
--
ALTER TABLE `Transcriptor`
  MODIFY `idTranscriptor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Verificador`
--
ALTER TABLE `Verificador`
  MODIFY `idVerificador` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ArchivoMultimedia`
--
ALTER TABLE `ArchivoMultimedia`
  ADD CONSTRAINT `fk_ArchivoMultimedia_Estudiante1` FOREIGN KEY (`idEstudiante`) REFERENCES `Estudiante` (`idEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ArchivoMultimedia_Transcriptor1` FOREIGN KEY (`idTranscriptor`) REFERENCES `Transcriptor` (`idTranscriptor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ArchivoTranscrito`
--
ALTER TABLE `ArchivoTranscrito`
  ADD CONSTRAINT `fk_ArchivoTranscrito_Estudiante1` FOREIGN KEY (`idEstudiante`) REFERENCES `Estudiante` (`idEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ArchivoTranscrito_Transcriptor1` FOREIGN KEY (`idTranscriptor`) REFERENCES `Transcriptor` (`idTranscriptor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ArchivoTranscrito_Verificador1` FOREIGN KEY (`idVerificador`) REFERENCES `Verificador` (`idVerificador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Estudiante`
--
ALTER TABLE `Estudiante`
  ADD CONSTRAINT `fk_Estudiante_Cuenta1` FOREIGN KEY (`Cuenta_idCuenta`) REFERENCES `Cuenta` (`idCuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Transcriptor`
--
ALTER TABLE `Transcriptor`
  ADD CONSTRAINT `fk_Transcriptor_Cuenta1` FOREIGN KEY (`Cuenta_idCuenta`) REFERENCES `Cuenta` (`idCuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Verificador`
--
ALTER TABLE `Verificador`
  ADD CONSTRAINT `fk_Verificador_Cuenta1` FOREIGN KEY (`Cuenta_idCuenta`) REFERENCES `Cuenta` (`idCuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

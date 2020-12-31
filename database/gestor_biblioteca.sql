-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-12-2020 a las 23:26:49
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor_biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(15) NOT NULL,
  `admin_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `admin_password`) VALUES
(123, '202cb962ac59075b964b07152d234b70'),
(555, '202cb962ac59075b964b07152d234b70'),
(29114652, '256412');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpetas`
--

CREATE TABLE `carpetas` (
  `ca_codigo_carpeta` int(15) NOT NULL,
  `ca_nombre_carpeta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ca_numero_folios` int(100) NOT NULL,
  `ca_estado_carpeta` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ca_tipo_carpeta` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `carpetas`
--

INSERT INTO `carpetas` (`ca_codigo_carpeta`, `ca_nombre_carpeta`, `ca_numero_folios`, `ca_estado_carpeta`, `ca_tipo_carpeta`) VALUES
(66666, 'carpeta número 3', 130, 'disponible', 'carpeta de aprendizaje'),
(9999999, 'carpeta número 2', 100, 'disponible', 'otro'),
(123456789, 'carpeta número 1', 133, 'disponible', 'contrato de aprendizaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpetas_modificadas`
--

CREATE TABLE `carpetas_modificadas` (
  `ID` int(10) NOT NULL,
  `cm_codigo_carpeta` int(15) DEFAULT NULL,
  `cm_folios_agregados` int(100) DEFAULT NULL,
  `cm_fecha` datetime DEFAULT NULL,
  `cm_id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpetas_prestadas`
--

CREATE TABLE `carpetas_prestadas` (
  `ID` int(10) NOT NULL,
  `id_usuario` int(15) NOT NULL,
  `codigo_carpeta` int(15) NOT NULL,
  `fecha_final` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion_carpeta`
--

CREATE TABLE `devolucion_carpeta` (
  `ID` int(10) NOT NULL,
  `dc_codigo_carpeta` int(15) NOT NULL,
  `dc_id_usuario` int(15) NOT NULL,
  `dc_fecha_devolucion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_modificaciones`
--

CREATE TABLE `historial_modificaciones` (
  `hm_ID` int(10) NOT NULL,
  `hm_id_usuario` int(15) NOT NULL,
  `hm_codigo_carpeta` int(15) NOT NULL,
  `hm_tipo_modificacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hm_fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_sesion`
--

CREATE TABLE `historial_sesion` (
  `ID` int(10) NOT NULL,
  `hs_usuario_id` int(15) DEFAULT NULL,
  `hs_fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_prestamo`
--

CREATE TABLE `solicitud_prestamo` (
  `ID` int(10) NOT NULL,
  `pc_id_usuario` int(11) DEFAULT NULL,
  `pc_codigo_carpt` int(15) NOT NULL,
  `pc_fecha_inicio` date DEFAULT NULL,
  `pc_fecha_final` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud_prestamo`
--

INSERT INTO `solicitud_prestamo` (`ID`, `pc_id_usuario`, `pc_codigo_carpt`, `pc_fecha_inicio`, `pc_fecha_final`) VALUES
(4, 1107528994, 66666, '2020-12-23', '2020-12-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(15) NOT NULL,
  `usu_nombre_cmplt` varchar(100) DEFAULT NULL,
  `usu_email` char(100) DEFAULT NULL,
  `usu_clave` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_nombre_cmplt`, `usu_email`, `usu_clave`) VALUES
(1107528994, 'Luis alejandro cerón delgado', 'laceron4@misena.edu.co', '202cb962ac59075b964b07152d234b70'),
(2147483647, 'Alexander Gomez', 'l.alejandrocd@hotmail.com', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `carpetas`
--
ALTER TABLE `carpetas`
  ADD PRIMARY KEY (`ca_codigo_carpeta`);

--
-- Indices de la tabla `carpetas_modificadas`
--
ALTER TABLE `carpetas_modificadas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `cm_dni_usuario` (`cm_id_usuario`),
  ADD KEY `cm_codigo_carpeta` (`cm_codigo_carpeta`);

--
-- Indices de la tabla `carpetas_prestadas`
--
ALTER TABLE `carpetas_prestadas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_usuario_2` (`id_usuario`),
  ADD KEY `codigo_carpeta` (`codigo_carpeta`);

--
-- Indices de la tabla `devolucion_carpeta`
--
ALTER TABLE `devolucion_carpeta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `dc_codigo_carpeta` (`dc_codigo_carpeta`),
  ADD KEY `dc_id_usuario` (`dc_id_usuario`);

--
-- Indices de la tabla `historial_modificaciones`
--
ALTER TABLE `historial_modificaciones`
  ADD PRIMARY KEY (`hm_ID`),
  ADD KEY `hm_codigo_carpeta` (`hm_codigo_carpeta`),
  ADD KEY `hm_id_usuario` (`hm_id_usuario`);

--
-- Indices de la tabla `historial_sesion`
--
ALTER TABLE `historial_sesion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `usuario_id` (`hs_usuario_id`);

--
-- Indices de la tabla `solicitud_prestamo`
--
ALTER TABLE `solicitud_prestamo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `pc_id_usuario` (`pc_id_usuario`),
  ADD KEY `pc_codigo_carpt` (`pc_codigo_carpt`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carpetas_modificadas`
--
ALTER TABLE `carpetas_modificadas`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carpetas_prestadas`
--
ALTER TABLE `carpetas_prestadas`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `devolucion_carpeta`
--
ALTER TABLE `devolucion_carpeta`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_modificaciones`
--
ALTER TABLE `historial_modificaciones`
  MODIFY `hm_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_sesion`
--
ALTER TABLE `historial_sesion`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud_prestamo`
--
ALTER TABLE `solicitud_prestamo`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carpetas_modificadas`
--
ALTER TABLE `carpetas_modificadas`
  ADD CONSTRAINT `carpetas_modificadas_ibfk_2` FOREIGN KEY (`cm_id_usuario`) REFERENCES `usuarios` (`usu_id`),
  ADD CONSTRAINT `carpetas_modificadas_ibfk_3` FOREIGN KEY (`cm_codigo_carpeta`) REFERENCES `carpetas` (`ca_codigo_carpeta`);

--
-- Filtros para la tabla `carpetas_prestadas`
--
ALTER TABLE `carpetas_prestadas`
  ADD CONSTRAINT `carpetas_prestadas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`usu_id`),
  ADD CONSTRAINT `carpetas_prestadas_ibfk_2` FOREIGN KEY (`codigo_carpeta`) REFERENCES `carpetas` (`ca_codigo_carpeta`);

--
-- Filtros para la tabla `devolucion_carpeta`
--
ALTER TABLE `devolucion_carpeta`
  ADD CONSTRAINT `devolucion_carpeta_ibfk_1` FOREIGN KEY (`dc_id_usuario`) REFERENCES `usuarios` (`usu_id`),
  ADD CONSTRAINT `devolucion_carpeta_ibfk_2` FOREIGN KEY (`dc_codigo_carpeta`) REFERENCES `carpetas` (`ca_codigo_carpeta`);

--
-- Filtros para la tabla `historial_modificaciones`
--
ALTER TABLE `historial_modificaciones`
  ADD CONSTRAINT `historial_modificaciones_ibfk_1` FOREIGN KEY (`hm_codigo_carpeta`) REFERENCES `carpetas` (`ca_codigo_carpeta`),
  ADD CONSTRAINT `historial_modificaciones_ibfk_2` FOREIGN KEY (`hm_id_usuario`) REFERENCES `usuarios` (`usu_id`);

--
-- Filtros para la tabla `historial_sesion`
--
ALTER TABLE `historial_sesion`
  ADD CONSTRAINT `historial_sesion_ibfk_1` FOREIGN KEY (`hs_usuario_id`) REFERENCES `usuarios` (`usu_id`);

--
-- Filtros para la tabla `solicitud_prestamo`
--
ALTER TABLE `solicitud_prestamo`
  ADD CONSTRAINT `solicitud_prestamo_ibfk_3` FOREIGN KEY (`pc_id_usuario`) REFERENCES `usuarios` (`usu_id`),
  ADD CONSTRAINT `solicitud_prestamo_ibfk_4` FOREIGN KEY (`pc_codigo_carpt`) REFERENCES `carpetas` (`ca_codigo_carpeta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

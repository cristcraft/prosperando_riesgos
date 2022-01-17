-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-01-2022 a las 16:50:54
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `riesgosDB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canal_servicio`
--

CREATE TABLE `canal_servicio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `canal_servicio`
--

INSERT INTO `canal_servicio` (`id`, `nombre`) VALUES
(1, 'INSPECCIÓN SST'),
(2, 'AUTOCONTROL'),
(3, 'INDICADORES'),
(4, 'AUDITORÍA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causa`
--

CREATE TABLE `causa` (
  `id` int(11) NOT NULL,
  `id_nombre_riesgo` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `causa`
--

INSERT INTO `causa` (`id`, `id_nombre_riesgo`, `nombre`) VALUES
(1, 1, 'Se perdio el valor nominal'),
(2, 2, 'Se daño el test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `nombre`) VALUES
(1, 'Ibagué'),
(2, 'Bogotá');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_riesgo_operativo`
--

CREATE TABLE `clase_riesgo_operativo` (
  `id` int(11) NOT NULL,
  `id_nombre_riesgo` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clase_riesgo_operativo`
--

INSERT INTO `clase_riesgo_operativo` (`id`, `id_nombre_riesgo`, `nombre`) VALUES
(1, 1, 'Error de los modelos\r\n'),
(2, 2, 'Error de los test\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `id` int(11) NOT NULL,
  `id_causa` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `control`
--

INSERT INTO `control` (`id`, `id_causa`, `nombre`) VALUES
(1, 2, '01'),
(2, 1, '02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `identificado_por`
--

CREATE TABLE `identificado_por` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `identificado_por`
--

INSERT INTO `identificado_por` (`id`, `nombre`) VALUES
(1, 'CONTABILIDAD'),
(2, 'AUDITORÍA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre_riesgo`
--

CREATE TABLE `nombre_riesgo` (
  `id` int(11) NOT NULL,
  `id_producto_servicio_afectado` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nombre_riesgo`
--

INSERT INTO `nombre_riesgo` (`id`, `id_producto_servicio_afectado`, `nombre`) VALUES
(1, 2, 'Perdida de valor nominal o tasas de retorno de las inversiones en entidades bancarias por fluctuaciones en el mercado de valores '),
(2, 1, 'Test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_afectado`
--

CREATE TABLE `proceso_afectado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proceso_afectado`
--

INSERT INTO `proceso_afectado` (`id`, `nombre`) VALUES
(1, 'RIESGOS\r\n'),
(2, 'VINCULACIÓN DE ASOCIADOS'),
(3, 'GESTIÓN DE COBRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_servicio_afectado`
--

CREATE TABLE `producto_servicio_afectado` (
  `id` int(11) NOT NULL,
  `id_proceso_afectado` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto_servicio_afectado`
--

INSERT INTO `producto_servicio_afectado` (`id`, `id_proceso_afectado`, `nombre`) VALUES
(1, 1, 'CRÉDITO'),
(2, 3, 'AHORRO'),
(3, 1, 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencia`
--

CREATE TABLE `referencia` (
  `id` int(11) NOT NULL,
  `id_nombre_riesgo` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `referencia`
--

INSERT INTO `referencia` (`id`, `id_nombre_riesgo`, `nombre`) VALUES
(1, 1, 'R_443\r\n'),
(2, 2, 'R_001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_principal`
--

CREATE TABLE `tabla_principal` (
  `id` int(11) NOT NULL,
  `canal_servicio` varchar(250) NOT NULL,
  `identificado_por` varchar(250) NOT NULL,
  `proceso_afectado` varchar(250) NOT NULL,
  `producto/servicio_afectado` varchar(250) NOT NULL,
  `descripcion_evento` varchar(250) NOT NULL,
  `nombre_riesgo` varchar(250) NOT NULL,
  `referencia` varchar(250) NOT NULL,
  `causa` varchar(250) NOT NULL,
  `fecha_descubrimiento` date NOT NULL,
  `hora_descubrimiento` time NOT NULL,
  `fecha_inicio_evento` date NOT NULL,
  `hora_inicio_evento` time NOT NULL,
  `fecha_fin_evento` date NOT NULL,
  `hora_fin_evento` time NOT NULL,
  `fecha_contabilizacion` date NOT NULL,
  `hora_contabilizacion` int(11) NOT NULL,
  `cuantia` varchar(250) NOT NULL,
  `cuantia_total_recuperada` varchar(250) NOT NULL,
  `cuantia_recuperada_seguros` varchar(250) NOT NULL,
  `clase_riesgo_operativo` varchar(250) NOT NULL,
  `cuenta_contable_afectada` varchar(250) NOT NULL,
  `ciudad` varchar(250) NOT NULL,
  `control` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canal_servicio`
--
ALTER TABLE `canal_servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `causa`
--
ALTER TABLE `causa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nombre_riesgos` (`id_nombre_riesgo`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clase_riesgo_operativo`
--
ALTER TABLE `clase_riesgo_operativo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nombre_riesgo` (`id_nombre_riesgo`);

--
-- Indices de la tabla `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_causa` (`id_causa`);

--
-- Indices de la tabla `identificado_por`
--
ALTER TABLE `identificado_por`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nombre_riesgo`
--
ALTER TABLE `nombre_riesgo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto/servicio_afectado` (`id_producto_servicio_afectado`);

--
-- Indices de la tabla `proceso_afectado`
--
ALTER TABLE `proceso_afectado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_servicio_afectado`
--
ALTER TABLE `producto_servicio_afectado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proceso_afectado` (`id_proceso_afectado`);

--
-- Indices de la tabla `referencia`
--
ALTER TABLE `referencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nombre_riesgo` (`id_nombre_riesgo`);

--
-- Indices de la tabla `tabla_principal`
--
ALTER TABLE `tabla_principal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canal_servicio`
--
ALTER TABLE `canal_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `causa`
--
ALTER TABLE `causa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clase_riesgo_operativo`
--
ALTER TABLE `clase_riesgo_operativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `control`
--
ALTER TABLE `control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `identificado_por`
--
ALTER TABLE `identificado_por`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `nombre_riesgo`
--
ALTER TABLE `nombre_riesgo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proceso_afectado`
--
ALTER TABLE `proceso_afectado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto_servicio_afectado`
--
ALTER TABLE `producto_servicio_afectado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `referencia`
--
ALTER TABLE `referencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tabla_principal`
--
ALTER TABLE `tabla_principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `causa`
--
ALTER TABLE `causa`
  ADD CONSTRAINT `causa_ibfk_1` FOREIGN KEY (`id_nombre_riesgo`) REFERENCES `nombre_riesgo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clase_riesgo_operativo`
--
ALTER TABLE `clase_riesgo_operativo`
  ADD CONSTRAINT `clase_riesgo_operativo_ibfk_1` FOREIGN KEY (`id_nombre_riesgo`) REFERENCES `nombre_riesgo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `control`
--
ALTER TABLE `control`
  ADD CONSTRAINT `control_ibfk_1` FOREIGN KEY (`id_causa`) REFERENCES `causa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nombre_riesgo`
--
ALTER TABLE `nombre_riesgo`
  ADD CONSTRAINT `nombre_riesgo_ibfk_1` FOREIGN KEY (`id_producto_servicio_afectado`) REFERENCES `producto_servicio_afectado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `referencia`
--
ALTER TABLE `referencia`
  ADD CONSTRAINT `referencia_ibfk_1` FOREIGN KEY (`id_nombre_riesgo`) REFERENCES `nombre_riesgo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

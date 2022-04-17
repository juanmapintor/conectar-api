-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2022 a las 08:41:55
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `conectar_entregas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `alumnoID` int(11) NOT NULL,
  `seccion_curso` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsableID` int(11) NOT NULL,
  `comodanteID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambito`
--

CREATE TABLE `ambito` (
  `ambitoID` int(11) NOT NULL,
  `ambito` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ambito`
--

INSERT INTO `ambito` (`ambitoID`, `ambito`) VALUES
(1, 'Rural'),
(2, 'Rural Aglomerado'),
(3, 'Rural Disperso'),
(4, 'Urbano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comodante`
--

CREATE TABLE `comodante` (
  `comodanteID` int(11) NOT NULL,
  `mail` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `establecimientoID` int(11) NOT NULL,
  `personaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directivo`
--

CREATE TABLE `directivo` (
  `directivoID` int(11) NOT NULL,
  `comodanteID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `dispositivoID` int(11) NOT NULL,
  `nro_serie` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programaID` int(11) NOT NULL,
  `tipoDispositivoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo_estado`
--

CREATE TABLE `dispositivo_estado` (
  `dispositivoEstadoID` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `observacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estadoID` int(11) NOT NULL,
  `dispositivoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `domicilioID` int(11) NOT NULL,
  `provincia` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_postal` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localidad` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barrio` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calle` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cardinalidad` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `entregaID` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comodanteID` int(11) NOT NULL,
  `dispositivoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento`
--

CREATE TABLE `establecimiento` (
  `establecimientoID` int(11) NOT NULL,
  `cue` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricula` int(11) DEFAULT NULL,
  `mail` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horario` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sectorID` int(11) NOT NULL,
  `modalidadID` int(11) NOT NULL,
  `ambitoID` int(11) NOT NULL,
  `nivelID` int(11) NOT NULL,
  `zonaID` int(11) NOT NULL,
  `domicilioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento_oferta`
--

CREATE TABLE `establecimiento_oferta` (
  `establecimientoID` int(11) NOT NULL,
  `ofertaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento_turno`
--

CREATE TABLE `establecimiento_turno` (
  `establecimientoID` int(11) NOT NULL,
  `turnoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `estadoID` int(11) NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad`
--

CREATE TABLE `modalidad` (
  `modalidadID` int(11) NOT NULL,
  `modalidad` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modalidad`
--

INSERT INTO `modalidad` (`modalidadID`, `modalidad`) VALUES
(1, 'Eduación Domiciliaria y Hospitalaria'),
(2, 'Educación Artística'),
(3, 'Educación en Contextos de Encierro'),
(4, 'Educación en Escuelas Albergue y Albergues'),
(5, 'Educación Especial'),
(6, 'Educación Intelcultural Bilingue'),
(7, 'Educación Permanente de Jovenes y Adultos'),
(8, 'Educación Rural y en Areas de Frontera'),
(9, 'Educación Técnico Profesional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `nivelID` int(11) NOT NULL,
  `nivel` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`nivelID`, `nivel`) VALUES
(1, 'Educación Inicial'),
(2, 'Educación Primaria'),
(3, 'Educación Secundaria'),
(4, 'Educación Superior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `ofertaID` int(11) NOT NULL,
  `oferta` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`ofertaID`, `oferta`) VALUES
(1, 'Ciencias Sociales'),
(2, 'Ciencias Naturales'),
(3, 'Economia'),
(4, 'Electrónica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `personaID` int(11) NOT NULL,
  `apellido` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` enum('m','f','x') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `cuil` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `programaID` int(11) NOT NULL,
  `nombre` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolucion_nro` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destino` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamo`
--

CREATE TABLE `reclamo` (
  `reclamoID` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comodanteID` int(11) NOT NULL,
  `dispositivoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `responsableID` int(11) NOT NULL,
  `personaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `sectorID` int(11) NOT NULL,
  `sector` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`sectorID`, `sector`) VALUES
(1, 'Estatal'),
(2, 'Privado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonoestablecimiento`
--

CREATE TABLE `telefonoestablecimiento` (
  `telefonoEstablecimientoID` int(11) NOT NULL,
  `telefono` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('fijo','movil') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fijo',
  `establecimientoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodispositivo`
--

CREATE TABLE `tipodispositivo` (
  `tipoDispositivoID` int(11) NOT NULL,
  `tipo` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `turnoID` int(11) NOT NULL,
  `turno` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`turnoID`, `turno`) VALUES
(1, 'Mañana'),
(2, 'Tarde'),
(3, 'Vespertino'),
(4, 'Jornada Completa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verificacion`
--

CREATE TABLE `verificacion` (
  `verificacionID` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `observacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `apto` int(11) NOT NULL,
  `dispositivoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `zonaID` int(11) NOT NULL,
  `nombre_zona` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_supervisor` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_supervisor` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_supervisor` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_supervisor` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`zonaID`, `nombre_zona`, `apellido_supervisor`, `nombre_supervisor`, `mail_supervisor`, `telefono_supervisor`) VALUES
(1, 'Zona 1', 'Vilanova', 'Sandra', 'svilanova@sanjuan.edu.ar', '2644779098');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`alumnoID`),
  ADD KEY `alumno_ibfk_1` (`comodanteID`),
  ADD KEY `alumno_ibfk_2` (`responsableID`);

--
-- Indices de la tabla `ambito`
--
ALTER TABLE `ambito`
  ADD PRIMARY KEY (`ambitoID`);

--
-- Indices de la tabla `comodante`
--
ALTER TABLE `comodante`
  ADD PRIMARY KEY (`comodanteID`),
  ADD KEY `comodante_ibfk_1` (`personaID`),
  ADD KEY `comodante_ibfk_2` (`establecimientoID`);

--
-- Indices de la tabla `directivo`
--
ALTER TABLE `directivo`
  ADD PRIMARY KEY (`directivoID`),
  ADD KEY `directivo_ibfk_1` (`comodanteID`);

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`dispositivoID`),
  ADD KEY `dispositivo_ibfk_1` (`programaID`),
  ADD KEY `dispositivo_ibfk_2` (`tipoDispositivoID`);

--
-- Indices de la tabla `dispositivo_estado`
--
ALTER TABLE `dispositivo_estado`
  ADD PRIMARY KEY (`dispositivoEstadoID`),
  ADD KEY `dispositivo_estado_ibfk_1` (`dispositivoID`),
  ADD KEY `dispositivo_estado_ibfk_2` (`estadoID`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`domicilioID`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`entregaID`),
  ADD UNIQUE KEY `dispositivoID` (`dispositivoID`),
  ADD KEY `entrega_ibfk_1` (`comodanteID`);

--
-- Indices de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD PRIMARY KEY (`establecimientoID`),
  ADD UNIQUE KEY `cue` (`cue`),
  ADD UNIQUE KEY `domicilioID` (`domicilioID`),
  ADD KEY `establecimiento_ibfk_10` (`modalidadID`),
  ADD KEY `establecimiento_ibfk_6` (`zonaID`),
  ADD KEY `establecimiento_ibfk_7` (`nivelID`),
  ADD KEY `establecimiento_ibfk_8` (`ambitoID`),
  ADD KEY `establecimiento_ibfk_9` (`sectorID`);

--
-- Indices de la tabla `establecimiento_oferta`
--
ALTER TABLE `establecimiento_oferta`
  ADD PRIMARY KEY (`establecimientoID`,`ofertaID`),
  ADD KEY `establecimiento_oferta_ibfk_2` (`ofertaID`);

--
-- Indices de la tabla `establecimiento_turno`
--
ALTER TABLE `establecimiento_turno`
  ADD PRIMARY KEY (`establecimientoID`,`turnoID`),
  ADD KEY `establecimiento_turno_ibfk_2` (`turnoID`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`estadoID`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  ADD PRIMARY KEY (`modalidadID`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`nivelID`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`ofertaID`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`personaID`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`programaID`);

--
-- Indices de la tabla `reclamo`
--
ALTER TABLE `reclamo`
  ADD PRIMARY KEY (`reclamoID`),
  ADD KEY `reclamo_ibfk_1` (`comodanteID`),
  ADD KEY `reclamo_ibfk_2` (`dispositivoID`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`responsableID`),
  ADD UNIQUE KEY `personaID` (`personaID`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`sectorID`);

--
-- Indices de la tabla `telefonoestablecimiento`
--
ALTER TABLE `telefonoestablecimiento`
  ADD PRIMARY KEY (`telefonoEstablecimientoID`),
  ADD KEY `telefonoestablecimiento_ibfk_1` (`establecimientoID`);

--
-- Indices de la tabla `tipodispositivo`
--
ALTER TABLE `tipodispositivo`
  ADD PRIMARY KEY (`tipoDispositivoID`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`turnoID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `verificacion`
--
ALTER TABLE `verificacion`
  ADD PRIMARY KEY (`verificacionID`),
  ADD KEY `verificacion_ibfk_1` (`dispositivoID`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`zonaID`),
  ADD UNIQUE KEY `nombre_zona` (`nombre_zona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambito`
--
ALTER TABLE `ambito`
  MODIFY `ambitoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  MODIFY `dispositivoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `domicilioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `entregaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  MODIFY `establecimientoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `estadoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  MODIFY `modalidadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `nivelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `ofertaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `personaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `programaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reclamo`
--
ALTER TABLE `reclamo`
  MODIFY `reclamoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `sectorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `telefonoestablecimiento`
--
ALTER TABLE `telefonoestablecimiento`
  MODIFY `telefonoEstablecimientoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tipodispositivo`
--
ALTER TABLE `tipodispositivo`
  MODIFY `tipoDispositivoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `turnoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `verificacion`
--
ALTER TABLE `verificacion`
  MODIFY `verificacionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `zonaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`comodanteID`) REFERENCES `comodante` (`comodanteID`),
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`responsableID`) REFERENCES `responsable` (`responsableID`);

--
-- Filtros para la tabla `comodante`
--
ALTER TABLE `comodante`
  ADD CONSTRAINT `comodante_ibfk_1` FOREIGN KEY (`personaID`) REFERENCES `persona` (`personaID`),
  ADD CONSTRAINT `comodante_ibfk_2` FOREIGN KEY (`establecimientoID`) REFERENCES `establecimiento` (`establecimientoID`);

--
-- Filtros para la tabla `directivo`
--
ALTER TABLE `directivo`
  ADD CONSTRAINT `directivo_ibfk_1` FOREIGN KEY (`comodanteID`) REFERENCES `comodante` (`comodanteID`);

--
-- Filtros para la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD CONSTRAINT `dispositivo_ibfk_1` FOREIGN KEY (`programaID`) REFERENCES `programa` (`programaID`),
  ADD CONSTRAINT `dispositivo_ibfk_2` FOREIGN KEY (`tipoDispositivoID`) REFERENCES `tipodispositivo` (`tipoDispositivoID`);

--
-- Filtros para la tabla `dispositivo_estado`
--
ALTER TABLE `dispositivo_estado`
  ADD CONSTRAINT `dispositivo_estado_ibfk_1` FOREIGN KEY (`dispositivoID`) REFERENCES `dispositivo` (`dispositivoID`),
  ADD CONSTRAINT `dispositivo_estado_ibfk_2` FOREIGN KEY (`estadoID`) REFERENCES `estado` (`estadoID`);

--
-- Filtros para la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `entrega_ibfk_1` FOREIGN KEY (`comodanteID`) REFERENCES `comodante` (`comodanteID`),
  ADD CONSTRAINT `entrega_ibfk_2` FOREIGN KEY (`dispositivoID`) REFERENCES `dispositivo` (`dispositivoID`);

--
-- Filtros para la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD CONSTRAINT `establecimiento_ibfk_10` FOREIGN KEY (`modalidadID`) REFERENCES `modalidad` (`modalidadID`),
  ADD CONSTRAINT `establecimiento_ibfk_5` FOREIGN KEY (`domicilioID`) REFERENCES `domicilio` (`domicilioID`),
  ADD CONSTRAINT `establecimiento_ibfk_6` FOREIGN KEY (`zonaID`) REFERENCES `zona` (`zonaID`),
  ADD CONSTRAINT `establecimiento_ibfk_7` FOREIGN KEY (`nivelID`) REFERENCES `nivel` (`nivelID`),
  ADD CONSTRAINT `establecimiento_ibfk_8` FOREIGN KEY (`ambitoID`) REFERENCES `ambito` (`ambitoID`),
  ADD CONSTRAINT `establecimiento_ibfk_9` FOREIGN KEY (`sectorID`) REFERENCES `sector` (`sectorID`);

--
-- Filtros para la tabla `establecimiento_oferta`
--
ALTER TABLE `establecimiento_oferta`
  ADD CONSTRAINT `establecimiento_oferta_ibfk_1` FOREIGN KEY (`establecimientoID`) REFERENCES `establecimiento` (`establecimientoID`),
  ADD CONSTRAINT `establecimiento_oferta_ibfk_2` FOREIGN KEY (`ofertaID`) REFERENCES `oferta` (`ofertaID`);

--
-- Filtros para la tabla `establecimiento_turno`
--
ALTER TABLE `establecimiento_turno`
  ADD CONSTRAINT `establecimiento_turno_ibfk_1` FOREIGN KEY (`establecimientoID`) REFERENCES `establecimiento` (`establecimientoID`),
  ADD CONSTRAINT `establecimiento_turno_ibfk_2` FOREIGN KEY (`turnoID`) REFERENCES `turno` (`turnoID`);

--
-- Filtros para la tabla `reclamo`
--
ALTER TABLE `reclamo`
  ADD CONSTRAINT `reclamo_ibfk_1` FOREIGN KEY (`comodanteID`) REFERENCES `comodante` (`comodanteID`),
  ADD CONSTRAINT `reclamo_ibfk_2` FOREIGN KEY (`dispositivoID`) REFERENCES `dispositivo` (`dispositivoID`);

--
-- Filtros para la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `responsable_ibfk_1` FOREIGN KEY (`personaID`) REFERENCES `persona` (`personaID`);

--
-- Filtros para la tabla `telefonoestablecimiento`
--
ALTER TABLE `telefonoestablecimiento`
  ADD CONSTRAINT `telefonoestablecimiento_ibfk_1` FOREIGN KEY (`establecimientoID`) REFERENCES `establecimiento` (`establecimientoID`);

--
-- Filtros para la tabla `verificacion`
--
ALTER TABLE `verificacion`
  ADD CONSTRAINT `verificacion_ibfk_1` FOREIGN KEY (`dispositivoID`) REFERENCES `dispositivo` (`dispositivoID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

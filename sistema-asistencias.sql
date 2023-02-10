-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-02-2023 a las 03:02:31
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema-asistencias`
--
CREATE DATABASE IF NOT EXISTS `sistema-asistencias` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `sistema-asistencias`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(5) NOT NULL,
  `AdminUsuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `AdminClave` varchar(535) COLLATE utf8_spanish_ci NOT NULL,
  `AdminEmail` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `CuentaCodigo` varchar(70) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `AdminUsuario`, `AdminClave`, `AdminEmail`, `CuentaCodigo`) VALUES
(26, 'Administrador1', '$2y$10$cs638ivN9jTdT845ikvMc.mFLDlpLEIFz6Il1rG3N7R6qObIyOm.i', 'jonke2331@gmail.com', 'AO2569965-3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(5) NOT NULL,
  `AsistenciaCodigo` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `PersonalCodigo` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `AsistenciaFecha` datetime NOT NULL,
  `AsistenciaSalida` datetime NOT NULL,
  `AsistenciaNombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `PersonalCedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `AsistenciaCodigo`, `PersonalCodigo`, `AsistenciaFecha`, `AsistenciaSalida`, `AsistenciaNombre`, `PersonalCedula`) VALUES
(28, 'AS0481971-5', 'P3656548-13', '2023-01-29 11:34:37', '2023-01-29 11:36:32', 'Paola Ros', '17.918.012'),
(29, 'AS0935409-2', 'P8779326-3', '2023-01-30 05:37:47', '2023-01-30 05:38:28', 'María Carmen Orosco', '26.477.537'),
(32, 'AS2821503-3', 'P2457549-6', '2023-01-30 06:28:19', '2023-01-30 09:42:21', 'Nicolás Herrera', '24.929.891'),
(33, 'AS8482275-4', 'P0462540-1', '2023-01-30 06:46:22', '2023-01-30 07:10:44', 'Rafael Rivero', '8.673.929'),
(36, 'AS9468499-5', 'P8813942-7', '2023-02-01 08:51:08', '2023-02-01 08:52:18', 'Valentina Clemente', '24.726.100'),
(37, 'AS8119365-6', 'P4343157-4', '2023-02-01 09:09:39', '2023-02-01 09:10:03', 'David Domínquez', '2.036.673'),
(38, 'AS9124752-7', 'P9480154-11', '2023-02-01 09:34:56', '2023-02-01 09:02:29', 'Daniela Sierra', '26.574.877'),
(39, 'AS3300266-8', 'P8779326-3', '2023-02-01 10:01:33', '2023-02-01 10:01:52', 'María Carmen Orosco', '26.477.537'),
(40, 'AS4722862-9', 'P2457549-6', '2023-02-01 09:05:43', '2023-02-01 09:06:02', 'Nicolás Herrera', '24.929.891'),
(41, 'AS8288522-10', 'P0462540-1', '2023-02-01 09:06:28', '2023-02-01 09:06:34', 'Rafael Rivero', '8.673.929');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrasenas`
--

CREATE TABLE `contrasenas` (
  `id` int(5) NOT NULL,
  `contrasenaEmail` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenaToken` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `CuentaCodigo` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `CuentaTipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contrasenas`
--

INSERT INTO `contrasenas` (`id`, `contrasenaEmail`, `contrasenaToken`, `CuentaCodigo`, `CuentaTipo`) VALUES
(4, 'jonke2331@gmail.com', 'b191f65d5f7ee5aecbffeb9da0e1ace97d30711af8b1b36e560a013d3eeaf7e662a93ce2d97cf89b9ea17dbc344bd0b58aa4', 'AO2569965-3', 'Administrador'),
(5, 'jonke2331@gmail.com', '03db7d943ae22f2940354d5054b96b6c4915f3063016bf584a447001c57d5d8d1c4589c30a947fa0125a598ed24c6dc3f285', 'AO2569965-3', 'Administrador'),
(6, 'jonke2331@gmail.com', '774a3ca4f063cbd948371a27e91a75b1c4c79c49fb3f157e27c3229f126aedaf43058453a2d8d2fcae29e6562e0ad0e291f9', 'AO2569965-3', 'Administrador'),
(7, 'patricia@gmail.com', 'a3fe2769a26b069af76b43e12430f7879e87130370b70b599fc5fe609f3581f98cfd6f0da9131d26199047213631549b6d2a', 'AO2567064-2', 'Usuario'),
(8, 'patricia@gmail.com', '92d290a57a7474311669917a0b4c33c571b4dc940f4b44540db7c75c76aa9c4ccb17b3b6c5fbe2e3c4975bdc75a70440fbd3', 'AO2567064-2', 'Usuario'),
(9, 'jonke2331@gmail.com', '13b8f25fbff6ce942d19bbcd0fe03f51f5a2ebb2d814cea43df3c0f9f4b693a6dc9f17273f52dfd0f12d05ba799370cea90b', 'AO2569965-3', 'Administrador'),
(10, 'admin@gmail.com', 'ec887cba2a5bfd17db7f1d24820938ed954a105cc0be67ddbcbc2cfea4df1e26ad9763a6cb6ba94a01340a44134abff11030', 'AO5659909-3', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id` int(5) NOT NULL,
  `CuentaCodigo` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `CuentaNombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `CuentaApellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `CuentaUsuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `CuentaClave` varchar(535) COLLATE utf8_spanish_ci NOT NULL,
  `CuentaEmail` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `CuentaTipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `CuentaGenero` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `CuentaRespuesta` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `CuentaCodigo`, `CuentaNombre`, `CuentaApellido`, `CuentaUsuario`, `CuentaClave`, `CuentaEmail`, `CuentaTipo`, `CuentaGenero`, `CuentaRespuesta`) VALUES
(53, 'AO2569965-3', 'Jonkellys', 'Maestre', 'Administrador1', '$2y$10$cs638ivN9jTdT845ikvMc.mFLDlpLEIFz6Il1rG3N7R6qObIyOm.i', 'jonke2331@gmail.com', 'Administrador', 'Femenino', 'Azul'),
(66, 'AO5415350-2', 'Luis', 'Velasquez', 'Usuario', '$2y$10$ir9U.jn.1ZHzYUV4YEpM8O/F8ZT/QZtUQ2z9zUbcX7enmDR9Gi3VG', 'luis234@gmail.com', 'Usuario', 'Masculino', 'Rojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(5) NOT NULL,
  `PersonalCodigo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Lunes` tinyint(1) NOT NULL,
  `Martes` tinyint(1) NOT NULL,
  `Miercoles` tinyint(1) NOT NULL,
  `Jueves` tinyint(1) NOT NULL,
  `Viernes` tinyint(1) NOT NULL,
  `Entrada` time NOT NULL,
  `Salida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `PersonalCodigo`, `Lunes`, `Martes`, `Miercoles`, `Jueves`, `Viernes`, `Entrada`, `Salida`) VALUES
(29, 'P0462540-1', 1, 1, 1, 1, 1, '09:19:00', '14:20:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(5) NOT NULL,
  `PersonalNombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `PersonalApellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `PersonalCedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `PersonalCargo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `PersonalFechaNac` date NOT NULL,
  `PersonalLugarNac` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `PersonalGenero` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `PersonalDireccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `PersonalTelefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `PersonalCorreo` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `PersonalCodigo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `PersonalEstado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `PersonalUltimaEntrada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `PersonalNombre`, `PersonalApellido`, `PersonalCedula`, `PersonalCargo`, `PersonalFechaNac`, `PersonalLugarNac`, `PersonalGenero`, `PersonalDireccion`, `PersonalTelefono`, `PersonalCorreo`, `PersonalCodigo`, `PersonalEstado`, `PersonalUltimaEntrada`) VALUES
(53, 'Rafael', 'Rivero', '8.673.929', 'Profesor', '1949-12-07', 'San Miguel', 'Masculino', 'Avinguda Covarrubias, 7, Bajos', '975 618619', 'daniel44@live.com', 'P0462540-1', 'Activo', '2023-02-01 09:06:28'),
(56, 'David', 'Domínquez', '2.036.673', 'Portero', '1934-07-31', 'Os Carranza Medio', 'Masculino', 'Ronda Solís, 388, Bajos', 'No tiene teléfono', 'nsarabia@live.com', 'P4343157-4', 'Activo', '2023-02-01 09:09:39'),
(57, 'Alejandro', 'Montez', '17.337.530', 'Profesor', '1972-08-03', 'San Aparicio', 'Femenino', 'Plaza Colunga, 70, 24º D', '627 96 4852', 'eric.rendon@colunga.org', 'P7145746-5', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(58, 'Nicolás', 'Herrera', '24.929.891', 'Profesor', '1995-11-01', 'As Maldonado', 'Masculino', 'Ruela Aguado, 111, 2º E', 'No tiene teléfono', 'rbenitez@yahoo.com', 'P2457549-6', 'Activo', '2023-02-01 09:05:43'),
(60, 'Ana Isabel', 'Roldán', '20.855.873', 'Directora', '1998-03-15', 'Montaño de Arriba', 'Femenino', 'Carrer Martín, 531, Ático 2º', '994 783057', 'nayara71@zepeda.org', 'P8700754-8', 'Vacaciones', '0000-00-00 00:00:00'),
(61, 'Aaron', 'Mendoza', '26.737.656', 'Profesor', '2002-01-13', 'Deleón de las Torres', 'Masculino', 'Travesía Alemán, 364, 5º', 'No tiene teléfono', 'mariapilar66@yahoo.es', 'P3134175-9', 'Activo', '0000-00-00 00:00:00'),
(62, 'Enrique', 'Lara', '29.201.943', 'Obrero', '2005-05-01', 'El Montez', 'Femenino', 'Carrer María Dolores, 27, 7º F', '978 818 008', 'eesteban@terra.com', 'P8768098-10', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(63, 'Daniela', 'Sierra', '26.574.877', 'Profesora', '2004-01-08', 'La Almonte del Bages', 'Femenino', 'Plaça Biel, 7, 1º 2º', 'No tiene teléfono', 'martin.trevino@guajardo.org', 'P9480154-11', 'Activo', '2023-02-01 09:34:56'),
(64, 'Gael', 'Monroy', '24.064.853', 'Licenciado', '2004-12-08', 'Salas de la Sierra', 'Femenino', 'Avenida Fuentes, 4, 4º A', '957-508795', 'amaya.beatriz@yahoo.es', 'P0244267-12', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(65, 'Paola', 'Ros', '17.918.012', 'Profesora', '1972-04-05', 'Patiño de la Sierra', 'Femenino', 'Plaça Josefa, 634, 1º B', '922 54 6310', 'zaragoza.rosamaria@terra.com', 'P3656548-13', 'Activo', '0000-00-00 00:00:00'),
(66, 'Aurora', 'Trujillo', '15.581.160', 'Profesora', '1981-06-30', 'Villa Altamirano Baja', 'Femenino', 'Plaça Inés, 802, Entre suelo 9º', '910 214010', 'lgarica@yahoo.es', 'P8715804-14', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(67, 'Lucas', 'Urbina', '17.427.496', 'Profesor', '1984-05-27', 'El Sierra del Bages', 'Masculino', 'Carrer Roybal, 399, 34º E', 'No tiene teléfono', 'acuellar@hispavista.com', 'P6787732-15', 'Activo', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id` int(5) NOT NULL,
  `UserName` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `UserEmail` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `UserClave` varchar(535) COLLATE utf8_spanish_ci NOT NULL,
  `CuentaCodigo` varchar(70) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id`, `UserName`, `UserEmail`, `UserClave`, `CuentaCodigo`) VALUES
(34, 'Usuario', 'luis234@gmail.com', '$2y$10$ir9U.jn.1ZHzYUV4YEpM8O/F8ZT/QZtUQ2z9zUbcX7enmDR9Gi3VG', 'AO5415350-2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contrasenas`
--
ALTER TABLE `contrasenas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contrasenaToken` (`contrasenaToken`),
  ADD KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PersonalCodigo` (`PersonalCodigo`),
  ADD KEY `PersonalCodigo_2` (`PersonalCodigo`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PersonalCodigo` (`PersonalCodigo`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `contrasenas`
--
ALTER TABLE `contrasenas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuentas` (`CuentaCodigo`);

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`PersonalCodigo`) REFERENCES `personal` (`PersonalCodigo`);

--
-- Filtros para la tabla `contrasenas`
--
ALTER TABLE `contrasenas`
  ADD CONSTRAINT `contrasenas_ibfk_1` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuentas` (`CuentaCodigo`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`PersonalCodigo`) REFERENCES `personal` (`PersonalCodigo`);

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuentas` (`CuentaCodigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

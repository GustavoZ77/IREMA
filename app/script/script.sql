-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-01-2016 a las 22:43:40
-- Versión del servidor: 10.0.22-MariaDB-0ubuntu0.15.10.1
-- Versión de PHP: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `irema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `applications`
--

INSERT INTO `applications` (`id`, `name`, `customer_id`, `description`, `status`) VALUES
(1, 'Hiq', 1, 'Sistema de Gestión de la Calidad', 1),
(2, 'IREMA', 1, 'Incident Record Manager', 1),
(3, 'Hiq SIP', 6, 'SIstema de Gestión de la Calidad', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `phone`, `address`, `name`, `stand`, `email`, `status`) VALUES
(1, '+529631227438', 'Fracc Campanario', 'Instituto Tecnológico de Ciudad Madero', 'ITCM', 'itcm@itcm.com', 1),
(6, '+529631227438', 'Fracc Campanario', 'Instituto Politécnico Nacional', 'SIP', 'sip@ipn.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidents`
--

CREATE TABLE IF NOT EXISTS `incidents` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `type_incident_id` int(11) DEFAULT NULL,
  `priority_id` int(11) DEFAULT NULL,
  `asigned` int(11) DEFAULT NULL,
  `entered` int(11) DEFAULT NULL,
  `updated` int(11) DEFAULT NULL,
  `date_incident` date NOT NULL,
  `last_update` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `solution` text COLLATE utf8_unicode_ci,
  `status_incident` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `incidents`
--

INSERT INTO `incidents` (`id`, `application_id`, `type_incident_id`, `priority_id`, `asigned`, `entered`, `updated`, `date_incident`, `last_update`, `description`, `solution`, `status_incident`) VALUES
(14, 1, 1, 1, 2, 1, 1, '2015-12-17', '2015-12-17', 'Nueva description de el incidente', 'TEST SOLUTION', 2),
(16, 1, 1, 1, 4, 5, 1, '2015-12-17', '2015-12-17', 'TEST3', 'still without solution', 0),
(17, 3, 1, 1, 4, 5, 5, '2015-12-17', '2015-12-17', 'TEST 4', 'still without solution', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_12_08_015017_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `priorities`
--

CREATE TABLE IF NOT EXISTS `priorities` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `time_priority` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `priorities`
--

INSERT INTO `priorities` (`id`, `description`, `status`, `time_priority`) VALUES
(1, 'Low', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_incidents`
--

CREATE TABLE IF NOT EXISTS `type_incidents` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `type_incidents`
--

INSERT INTO `type_incidents` (`id`, `description`, `status`) VALUES
(1, 'Application Error', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_users`
--

CREATE TABLE IF NOT EXISTS `type_users` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `type_users`
--

INSERT INTO `type_users` (`id`, `description`, `status`) VALUES
(1, 'GUESS', 1),
(2, 'ADMIN', 1),
(3, 'USER', 1),
(4, 'SUPPORT', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer` int(11) NOT NULL,
  `remember_token` text COLLATE utf8_unicode_ci,
  `type_user` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `password`, `name`, `email`, `customer`, `remember_token`, `type_user`, `status`) VALUES
(1, '$2a$10$lgCMst3kxBHitSDO6CRk6OL4zGu9fGgkgcqBUNSJ8N3pFKYTcjq0W', 'guess', 'guess@gmail.com', 1, '0ED5IgDxsi6au7PsyIdIO72xnWPYoagzxo8EA5m7mZTmKksNkjRekWDf2SGC', 2, 1),
(2, '$2y$10$94/B6hqNElVG9cdquVyxFO8e0.ZAEXT4grkyc066InGLhhRn0cr9S', 'Gustavo Adolfo', 'gustavo@hightechcoders.com', 1, 'K74Qnc93ESDHVig6iBolDYHUxbvHXiu9rSYu07n1YKbarDJm2jSRpLP3Ud52', 4, 1),
(3, '$2y$10$Pnnx3XSWa9wAMITD7XgD0exO09R4/At4tjC7yI.1BFCjATyc7R9Bq', 'Yeri Marbi Zepeda de la Cruz', 'marbizepeda@gmail.com', 1, 'ddWzy9LGbQsWKezg38aHaaS7MSlr36nQNmTE9uXe2CyU7EEEYtAR6aAIBiBG', 3, 1),
(4, '$2y$10$hXu9yBgpg6dih0BnhfiwGeIwG5VgDxyM0u.HPTnriJD6JSy5RH.xG', 'Adolfo de la Cruz', 'adolfo@hightechcoders.com', 6, '4jLNK20bmAZ9YAK9TBpQ6UqaBLeT470rasMeX1e2YlOAqWR6sDZ5LobTZu7m', 4, 1),
(5, '$2y$10$UaNm8bSrD2oKuwE0xvGrDe9aW/mVa1E0FlnwQOq4Dm38N57Dnn7M.', 'Loyda Angelines García Ariaga', 'lgarciasarriaga@gmail.com', 6, 'eDldzHrUSklFfaxj6AGHZXAnAEEqOgo98W4XeMot4wWvqnuH9xDa7ASJnCnl', 3, 1),
(45, '$2y$10$NBJbNa2uDYjOTWXH2xcpM.EEJxnPUCfaqIsGQxQz3Hz2JWMr3ATuC', 'Gustavo Adolfo Zepeda De La Cruz', 'kyg7887@gmail.com', 1, '3twiRtgTvUH5jtw8H1QISO0sUvqA4m6McuolBNFu1L94YTAzGrkZFCA94Keq', 4, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F7C966F09395C3F3` (`customer_id`);

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidents`
--
ALTER TABLE `incidents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E65135D03E030ACD` (`application_id`),
  ADD KEY `IDX_E65135D01FD4E14F` (`asigned`),
  ADD KEY `IDX_E65135D0739615B5` (`entered`),
  ADD KEY `IDX_E65135D0C69B96F7` (`updated`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `type_incidents`
--
ALTER TABLE `type_incidents`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `type_users`
--
ALTER TABLE `type_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `incidents`
--
ALTER TABLE `incidents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `type_incidents`
--
ALTER TABLE `type_incidents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `type_users`
--
ALTER TABLE `type_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `FK_F7C966F09395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

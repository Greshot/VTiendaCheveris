-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2016 a las 08:30:28
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `vtiendacheveris_carloshurtado`
--
CREATE DATABASE IF NOT EXISTS `vtiendacheveris_carloshurtado` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vtiendacheveris_carloshurtado`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) unsigned NOT NULL,
  `identificacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `identificacion`, `nombre`, `telefono`, `email`, `direccion`, `created_at`, `updated_at`) VALUES
(1, '1123123124', 'Shally Zuluaga', '310494957454', 'shally12312@yahoo.com', 'Calle 58 A #4545-454', '2016-08-02 11:25:33', '2016-08-02 11:28:01'),
(2, '123123', 'Carlos Hurtado', '310494957454', 'carlos.011194@gmail.com', 'Calle 58 A #4545-454', '2016-08-02 11:28:13', '2016-08-02 11:28:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loans`
--

CREATE TABLE IF NOT EXISTS `loans` (
  `id` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `loans`
--

INSERT INTO `loans` (`id`, `fecha`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '2016-08-02', 1, '2016-08-02 11:26:01', '2016-08-02 11:26:01'),
(2, '2016-08-02', 2, '2016-08-02 11:29:03', '2016-08-02 11:29:03'),
(3, '2016-08-02', 1, '2016-08-02 11:29:26', '2016-08-02 11:29:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loan_movie`
--

CREATE TABLE IF NOT EXISTS `loan_movie` (
  `id` int(10) unsigned NOT NULL,
  `cantidad` int(10) unsigned NOT NULL,
  `loan_id` int(10) unsigned NOT NULL,
  `movie_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `loan_movie`
--

INSERT INTO `loan_movie` (`id`, `cantidad`, `loan_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2016-08-02 11:26:01', '2016-08-02 11:26:01'),
(2, 1, 2, 3, '2016-08-02 11:29:03', '2016-08-02 11:29:03'),
(3, 1, 2, 2, '2016-08-02 11:29:03', '2016-08-02 11:29:03'),
(4, 1, 3, 1, '2016-08-02 11:29:26', '2016-08-02 11:29:26'),
(5, 1, 3, 2, '2016-08-02 11:29:26', '2016-08-02 11:29:26'),
(6, 1, 3, 3, '2016-08-02 11:29:26', '2016-08-02 11:29:26');

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
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_08_01_161335_create_clients_table', 1),
('2016_08_01_161402_create_movies_table', 1),
('2016_08_01_161440_create_loans_table', 1),
('2016_08_01_161751_create_loan_movie_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(10) unsigned NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `titulo`, `descripcion`, `fecha`, `cantidad`, `created_at`, `updated_at`) VALUES
(1, 'Harry potter y la piedra filosofal', 'Primera pelicula de la serie', '2016-08-02', 3, '2016-08-02 11:25:47', '2016-08-02 11:29:25'),
(2, 'Harry potter y cámara secreta', 'Segunda Pelicula de la serie', '2016-08-02', 5, '2016-08-02 11:28:27', '2016-08-02 11:29:25'),
(3, 'Harry potter y el prisionero de azkaban', 'Tercera pelicula de la serie', '2016-08-02', 6, '2016-08-02 11:28:41', '2016-08-02 11:29:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `clients_identificacion_unique` (`identificacion`);

--
-- Indices de la tabla `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`), ADD KEY `loans_client_id_foreign` (`client_id`);

--
-- Indices de la tabla `loan_movie`
--
ALTER TABLE `loan_movie`
  ADD PRIMARY KEY (`id`), ADD KEY `loan_movie_loan_id_foreign` (`loan_id`), ADD KEY `loan_movie_movie_id_foreign` (`movie_id`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `movies_titulo_unique` (`titulo`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `loan_movie`
--
ALTER TABLE `loan_movie`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `loans`
--
ALTER TABLE `loans`
ADD CONSTRAINT `loans_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `loan_movie`
--
ALTER TABLE `loan_movie`
ADD CONSTRAINT `loan_movie_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `loan_movie_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

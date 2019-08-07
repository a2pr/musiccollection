-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-08-2019 a las 06:31:53
-- Versión del servidor: 5.6.37
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `musiccollection`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `1am`
--

CREATE TABLE IF NOT EXISTS `1am` (
  `id` int(11) NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  `album_name` varchar(255) DEFAULT NULL,
  `artist_name` varchar(255) DEFAULT NULL,
  `album_year_release` date DEFAULT NULL,
  `tracks` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `1am`
--

INSERT INTO `1am` (`id`, `album_id`, `album_name`, `artist_name`, `album_year_release`, `tracks`) VALUES
(1, 2, 'Meteora', 'Linkin Park', '2003-01-01', 12),
(2, 17, 'Living Things', 'Linkin Park', '2012-01-01', 12),
(3, 18, 'The Hunting Party', 'Linkin Park', '2012-01-01', 12),
(6, 21, 'This is linkin park', 'Linkin Park', '2012-01-01', 12),
(7, 22, 'Road to Revolution', 'Linkin Park', '2012-01-01', 12),
(9, 24, 'ricky martin live', 'Linkin Park', '2010-01-01', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `year_release` date NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tracks_number` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `year_release`, `create_date`, `tracks_number`) VALUES
(2, 'Meteora', 'Linkin Park', '2003-01-01', '2019-08-06 11:11:47', 12),
(17, 'Living Things', 'Linkin Park', '2012-01-01', '2019-08-06 12:35:59', 12),
(18, 'The Hunting Party', 'Linkin Park', '2012-01-01', '2019-08-06 12:37:24', 12),
(19, 'RECHARGED', 'Linkin Park', '2012-01-01', '2019-08-06 12:40:16', 12),
(20, 'reanimation', 'Linkin Park', '2012-01-01', '2019-08-06 12:41:06', 12),
(21, 'This is linkin park', 'Linkin Park', '2012-01-01', '2019-08-06 12:42:09', 12),
(22, 'Road to Revolution', 'Linkin Park', '2012-01-01', '2019-08-06 12:43:08', 12),
(23, 'We Made it', 'Linkin Park', '0000-00-00', '2019-08-06 12:46:28', 12),
(24, 'ricky martin live', 'Linkin Park', '2010-01-01', '2019-08-06 12:50:22', 12),
(25, 'Black Album', 'Metallica', '1989-01-01', '2019-08-07 01:45:12', 12),
(26, 'This is Metallica', 'Metallica', '2012-01-01', '2019-08-07 01:47:13', 25),
(27, 'Master of Puppets', 'Metallica', '1989-01-01', '2019-08-07 01:48:18', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artists`
--

CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `twitter_handle` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `artists`
--

INSERT INTO `artists` (`id`, `name`, `twitter_handle`, `create_date`) VALUES
(1, 'Linkin Park', '@linkinpark', '2019-08-03 00:50:54'),
(3, 'Metallica', '@Metallica', '2019-08-04 19:17:01'),
(5, 'Shellter', '@shellterband', '2019-08-06 23:57:56'),
(6, 'Raimundos45', '@raimundos', '2019-08-07 01:49:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `collections`
--

CREATE TABLE IF NOT EXISTS `collections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_creater_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `collections`
--

INSERT INTO `collections` (`id`, `name`, `user_creater_id`, `create_date`) VALUES
(11, 'goodMorning', 1, '2019-08-04 01:46:25'),
(12, 'misturadin', 1, '2019-08-04 11:25:16'),
(13, 'tiresome', 1, '2019-08-04 20:16:52'),
(15, 'test', 4, '2019-08-05 17:40:19'),
(17, '1am', 5, '2019-08-07 01:43:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goodMorning`
--

CREATE TABLE IF NOT EXISTS `goodMorning` (
  `id` int(11) NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  `album_name` varchar(255) DEFAULT NULL,
  `artist_name` varchar(255) DEFAULT NULL,
  `album_year_release` date DEFAULT NULL,
  `tracks` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `goodMorning`
--

INSERT INTO `goodMorning` (`id`, `album_id`, `album_name`, `artist_name`, `album_year_release`, `tracks`) VALUES
(1, 23, 'We Made it', 'Linkin Park', '0000-00-00', 12),
(8, 17, 'Living Things', 'Linkin Park', '2012-01-01', 12),
(10, 20, 'reanimation', 'Linkin Park', '2012-01-01', 12),
(13, 21, 'Not Alone', 'Linkin Park', '2012-01-01', 12),
(14, 24, 'ricky martin live', 'Linkin Park', '2010-01-01', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `misturadin`
--

CREATE TABLE IF NOT EXISTS `misturadin` (
  `id` int(11) NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  `album_name` varchar(255) DEFAULT NULL,
  `artist_name` varchar(255) DEFAULT NULL,
  `album_year_release` date DEFAULT NULL,
  `tracks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  `album_name` varchar(255) DEFAULT NULL,
  `artist_name` varchar(255) DEFAULT NULL,
  `album_year_release` date DEFAULT NULL,
  `tracks` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `test`
--

INSERT INTO `test` (`id`, `album_id`, `album_name`, `artist_name`, `album_year_release`, `tracks`) VALUES
(1, 1, 'Minutes to Midnight', 'Linkin Park', '2007-01-01', 12),
(8, 21, 'Not Alone', 'Linkin Park', '2012-01-01', 12),
(9, 22, 'Road to Revolution', 'Linkin Park', '2012-01-01', 12),
(10, 23, 'We Made it', 'Linkin Park', '0000-00-00', 12),
(12, 2, 'Meteora', 'Linkin Park', '2003-01-01', 12),
(13, 16, 'One More Light', 'Linkin Park', '2012-01-01', 12),
(14, 17, 'Living Things', 'Linkin Park', '2012-01-01', 12),
(15, 18, 'The Hunting Party', 'Linkin Park', '2012-01-01', 12),
(16, 19, 'RECHARGED', 'Linkin Park', '2012-01-01', 12),
(17, 20, 'reanimation', 'Linkin Park', '2012-01-01', 12),
(18, 24, 'ricky martin live', 'Linkin Park', '2010-01-01', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiresome`
--

CREATE TABLE IF NOT EXISTS `tiresome` (
  `id` int(11) NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  `album_name` varchar(255) DEFAULT NULL,
  `artist_name` varchar(255) DEFAULT NULL,
  `album_year_release` date DEFAULT NULL,
  `tracks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin'),
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(5, 'username', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `1am`
--
ALTER TABLE `1am`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `goodMorning`
--
ALTER TABLE `goodMorning`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `misturadin`
--
ALTER TABLE `misturadin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiresome`
--
ALTER TABLE `tiresome`
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
-- AUTO_INCREMENT de la tabla `1am`
--
ALTER TABLE `1am`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `goodMorning`
--
ALTER TABLE `goodMorning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `misturadin`
--
ALTER TABLE `misturadin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `tiresome`
--
ALTER TABLE `tiresome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

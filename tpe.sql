-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2024 a las 00:31:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_estreno` date DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_director` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `nombre`, `fecha_estreno`, `genero`, `descripcion`, `imagen`, `id_director`) VALUES
(19, 'Interstellar', '2016-11-06', 'sci-fi', 'Interstellar es una película de ciencia ficción de 2014 dirigida por Christopher Nolan que narra la historia de un grupo de exploradores que viajan al espacio para buscar planetas habitables y salvar a la humanidad de la degradación ambiental', 'images/6713fbb667f9f9.67956188.jpg', 23),
(24, 'El padrino', '1972-09-20', 'Crimen', 'El padrino es una película de 1972 dirigida por Francis Ford Coppola que cuenta la historia de la familia Corleone, una de las familias mafiosas más poderosas de Nueva York en los años 40', 'images/6714203f236768.06073882.jpg', 24),
(25, 'Aftersun', '2022-10-21', 'Drama', 'Aftersun es una película dramática del año 2022 que trata sobre una niña que recuerda unas vacaciones que pasó con su padre en Turquía hace 20 años.', 'images/67153ef5a3c329.78499594.jpg', 25),
(26, 'Pulp Fiction', '1995-02-16', 'Crimen', 'Pulp Fiction es una película estadounidense de 1994, escrita y dirigida por Quentin Tarantino. La película cuenta la historia de dos asesinos a sueldo, Vincent Vega (John Travolta) y Jules Winnfield (Samuel L. Jackson), que trabajan para el gángster Marsellus Wallace (Ving Rhames).', 'images/67154038c7d176.69856419.jpg', 26),
(27, 'Whiplash', '2015-01-22', 'Drama', 'Whiplash es una película dramático-musical estadounidense de 2014 que narra la historia de Andrew Neiman, un joven baterista de jazz que aspira a ser el mejor y entrar en la orquesta de élite de su escuela de música', 'images/671540e98f2a60.20214865.jpg', 27),
(28, 'Django desencadenado', '2013-01-31', 'Drama', 'Django desencadenado es una película estadounidense de 2012 que cuenta la historia de un esclavo liberado que se alía con un cazarrecompensas para vengar sus afrentas y liberar a su esposa:', 'images/671541b08e3402.43164334.jpg', 26),
(29, 'Érase una vez en… Hollywood', '2019-08-22', 'Comedia', 'Érase una vez en... Hollywood es una película estadounidense de 2019, escrita y dirigida por Quentin Tarantino, que cuenta la historia de un actor de televisión y su doble en los años 60, en un Hollywood que está cambiando.', 'images/67154216c8e6b9.20012915.jpg', 26),
(33, 'El Padrino 2', '1974-01-26', 'Crimen', 'Tras la muerte de Don Vito Corleone, su hijo Michael es elegido para liderar los negocios familiares.', 'images/6715a76688ceb5.25378058.jpg', 24),
(41, 'El Padrino 23º1', '1974-01-26', 'Crimen', 'Tras la muerte de Don Vito Corleone, su hijo Michael es elegido para liderar los negocios familiares.', 'images/6715a76688ceb5.25378058.jpg', 24),
(43, '321321312', '1974-01-26', 'Crimen', 'Tras la muerte de Don Vito Corleone, su hijo Michael es elegido para liderar los negocios familiares.', 'images/6715a76688ceb5.25378058.jpg', 24),
(44, '214412', '1974-01-26', 'Crimen', 'Tras la muerte de Don Vito Corleone, su hijo Michael es elegido para liderar los negocios familiares.', 'images/6715a76688ceb5.25378058.jpg', 24),
(45, '12421', '1974-01-26', 'Crimen', 'Tras la muerte de Don Vito Corleone, su hijo Michael es elegido para liderar los negocios familiares.', 'images/6715a76688ceb5.25378058.jpg', 24),
(46, 'fdsafas', '1974-01-26', 'Crimen', 'Tras la muerte de Don Vito Corleone, su hijo Michael es elegido para liderar los negocios familiares.', 'images/6715a76688ceb5.25378058.jpg', 24),
(47, 'vxzcvzxvzx', '1974-01-26', 'Crimen', 'Tras la muerte de Don Vito Corleone, su hijo Michael es elegido para liderar los negocios familiares.', 'images/6715a76688ceb5.25378058.jpg', 24),
(48, 'v', '1974-01-26', 'Crimen', 'Tras la muerte de Don Vito Corleone, su hijo Michael es elegido para liderar los negocios familiares.', 'images/6715a76688ceb5.25378058.jpg', 24),
(49, 'vczxvzx', '1974-01-26', 'Crimen', 'Tras la muerte de Don Vito Corleone, su hijo Michael es elegido para liderar los negocios familiares.', 'images/6715a76688ceb5.25378058.jpg', 24),
(50, 'vzxcvz', '1974-01-26', 'Crimen', 'Tras la muerte de Don Vito Corleone, su hijo Michael es elegido para liderar los negocios familiares.', 'images/6715a76688ceb5.25378058.jpg', 24),
(51, 'Fulano', '2023-01-03', 'sci-fi', 'Fulanito de tal ', 'images/6715a76688ceb5.25378058.jpg', 24);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_director` (`id_director`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_director`) REFERENCES `directores` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

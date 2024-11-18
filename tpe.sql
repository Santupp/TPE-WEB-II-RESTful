-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2024 a las 04:01:16
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
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`id`, `nombre`, `nacimiento`) VALUES
(23, 'Chistopher Nolan ', '1970-07-30'),
(24, 'Francis Ford Coppola', '1939-04-07'),
(25, 'Charlotte Wells', '1987-06-13'),
(26, 'Quentin Tarantino', '1963-03-27'),
(27, 'Damien Chazelle', '1985-01-19'),
(32, 'Steven Spielberg', '1946-12-18'),
(33, 'Martin Scorsese', '1942-11-17'),
(34, 'Alfred Hitchcock', '1899-08-13'),
(35, 'George Lucas', '1944-05-14'),
(36, 'Tim Burton', '1958-08-25'),
(37, 'Woody Allen', '1935-12-01');

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
(35, 'Tiburon', '1975-06-20', 'Terror', '\"Tiburón\" cuenta la historia de un gran tiburón blanco que aterroriza a los habitantes de una pequeña isla de Nueva Inglaterra. Un oficial de policía, un biólogo marino y un pescador local se embarcan en una peligrosa misión para capturarlo.', '', 32),
(36, 'Salvar al soldado Ryan', NULL, '1998-07-24', 'Esta película sigue a un grupo de soldados durante la invasión del Día D en la Segunda Guerra Mundial. La misión de estos soldados es encontrar y traer de vuelta al soldado James Francis Ryan, cuyo hermano ha muerto en combate.', '', 32),
(37, '1976-02-08\r\n', NULL, 'Drama, Crimen', '\"Taxi Driver\" cuenta la historia de Travis Bickle, un veterano de la guerra de Vietnam que se convierte en taxista nocturno en Nueva York. Desilusionado con la sociedad y acosado por la violencia urbana, comienza a planear un acto de justicia por su cuenta, lo que lo lleva por un camino oscuro y perturbador.', '', 33),
(38, '1960-06-16', NULL, 'Terror, Misterio', '\"Psicosis\" es un thriller psicológico que sigue a Marion Crane, quien roba una gran suma de dinero y se refugia en un motel aislado. Allí, se encuentra con el misterioso propietario del motel, Norman Bates, quien tiene una relación complicada con su madre.', '', 34),
(39, 'Vértigo', '1958-05-09', 'Suspenso, Misterio, Drama', '\"Vértigo\" sigue a un detective retirado, Scottie Ferguson, que es contratado para seguir a la esposa de un amigo, Madeleine, quien parece estar poseída por el espíritu de una mujer muerta. A medida que se obsesiona con ella, sufre un ataque de vértigo que lo limita, pero su fascinación por Madeleine crece.', '', 34),
(40, 'Star Wars: Episodio I - La amenaza fantasma', '1999-05-19', 'Ciencia ficción', '\"La amenaza fantasma\" es el primer episodio cronológicamente en la saga de Star Wars. La historia sigue a los Jedi Qui-Gon Jinn y Obi-Wan Kenobi mientras intentan resolver un conflicto interplanetario y descubren a un joven Anakin Skywalker, quien podría ser la clave para restaurar el equilibrio en la Fuerza.', '', 35),
(41, 'Star Wars: Episodio II - El ataque de los clones', '2002-05-16', 'Ciencia ficción', '\"El ataque de los clones\" es el segundo episodio cronológicamente en la saga de Star Wars. La historia sigue a Anakin Skywalker y Obi-Wan Kenobi en una galaxia al borde de la guerra. Mientras Obi-Wan investiga un intento de asesinato, Anakin se convierte en el protector de Padmé Amidala, lo que da lugar a un romance prohibido.', '', 35),
(42, 'El joven manos de tijera', '1990-12-14', 'Fantasía, Drama', '\"El joven manos de tijera\" cuenta la historia de Edward, un hombre creado por un inventor que, antes de morir, le da manos de tijera en lugar de manos humanas. Cuando la familia de Peg lo encuentra, Edward se integra en una comunidad suburbana, pero su naturaleza diferente y su apariencia provocan la incomprensión y el rechazo.', '', 36),
(43, 'Bettlejuice', '1988-03-30', 'Comedia, Terror', '\"Beetlejuice\" es una comedia negra que sigue a una pareja de fantasmas recién muertos que intentan asustar a los nuevos ocupantes de su casa. Con la ayuda de un excéntrico y descontrolado bio-exorcista llamado Beetlejuice, intentan recuperar el control de su hogar.', '', 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `username`) VALUES
(1, 'nico@web2.com', '$2y$10$xQop0wF1YJ/dKhZcWDqHceUM96S04u73zGeJtU80a1GmM.H5H0EHC', ''),
(2, '', '$2y$10$XJjarJMOLhdRCYgycMxaG.uzrX6mqYXv/MgVa6POvHFpjuw4Don2G', 'webadmin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_director` (`id_director`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

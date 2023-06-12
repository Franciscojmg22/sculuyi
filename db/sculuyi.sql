-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2023 a las 08:05:38
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sculuyi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `correo`, `contrasena`) VALUES
(1, 'Francisco de Jesus', 'fdj.martinez@ugto.mx', '$2y$10$WG9AEMIPA3LMO6JITASCyukmrDN1DpCbEEkl2lvDKmVgl3IHqBBe2'),
(2, 'Andrea', 'Gómez Salazar', '$2y$10$WG9AEMIPA3LMO6JITASCyukmrDN1DpCbEEkl2lvDKmVgl3IHqBBe2'),
(3, 'Arturo', 'Hernandez Flores', '$2y$10$WG9AEMIPA3LMO6JITASCyukmrDN1DpCbEEkl2lvDKmVgl3IHqBBe2'),
(5, 'Ulises Castañeda', 'ulises.cas@gmail.com', '$2y$10$WG9AEMIPA3LMO6JITASCyukmrDN1DpCbEEkl2lvDKmVgl3IHqBBe2'),
(6, 'Fernando Morales', 'fer.morales@gmail.com', '$2y$10$WG9AEMIPA3LMO6JITASCyukmrDN1DpCbEEkl2lvDKmVgl3IHqBBe2'),
(7, 'Carlos', 'carlos.k@gmail.com', '$2y$10$WG9AEMIPA3LMO6JITASCyukmrDN1DpCbEEkl2lvDKmVgl3IHqBBe2'),
(8, 'Andres', 'andres@gmail.com', '$2y$10$WG9AEMIPA3LMO6JITASCyukmrDN1DpCbEEkl2lvDKmVgl3IHqBBe2'),
(9, 'Pepe', 'pepe@gmail.com', '$2y$10$WG9AEMIPA3LMO6JITASCyukmrDN1DpCbEEkl2lvDKmVgl3IHqBBe2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nom_curs` varchar(60) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nom_curs`, `descripcion`) VALUES
(1, 'Matemáticas Discretas', ''),
(2, 'Ecuaciones Diferenciales', ''),
(3, 'Cálculo diferencial', ''),
(4, 'Cálculo integral', ''),
(5, 'Cálculo vectorial y multivariable', ''),
(6, 'Sistemas de la información', ''),
(7, 'Visión por computadora', ''),
(8, 'Robótica móvil', ''),
(9, 'Redes', ''),
(10, 'Aplicaciones de internet', ''),
(11, 'Lenguajes de programación modernos', ''),
(12, 'Probabilidad y estadística', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cur_alu`
--

CREATE TABLE `cur_alu` (
  `id` int(11) NOT NULL,
  `id_cur` int(11) NOT NULL,
  `id_alum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cur_alu`
--

INSERT INTO `cur_alu` (`id`, `id_cur`, `id_alum`) VALUES
(1, 4, 1),
(2, 11, 1),
(3, 12, 1),
(4, 8, 1),
(9, 9, 1),
(10, 13, 2),
(11, 1, 9),
(12, 5, 9),
(13, 12, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cur_prof`
--

CREATE TABLE `cur_prof` (
  `id` int(11) NOT NULL,
  `id_cur` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cur_prof`
--

INSERT INTO `cur_prof` (`id`, `id_cur`, `id_prof`) VALUES
(1, 1, 1),
(2, 4, 1),
(3, 9, 1),
(4, 2, 2),
(5, 5, 2),
(6, 3, 3),
(7, 6, 3),
(8, 4, 4),
(9, 7, 4),
(10, 5, 5),
(11, 8, 5),
(12, 9, 5),
(13, 6, 6),
(14, 7, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id`, `nombre`, `correo`, `contrasena`, `descripcion`) VALUES
(1, 'Enrique Daniel', 'er.canedomontoya@gmail.com', '$2y$10$nSBdcKA0vktBlS55.VeYMOArRC9RE082oFLG/iUqy1F1uCk7ljYHO', '¿Qué tal?, soy johnny uun profesor de desarrollo web enfocado a VUE3js\r\n                            tengo 27 años y me entusiasma estar enseñando en esta plataforma'),
(2, 'Edgar Iván', 'ed.zapedaarjona@gmail.com', '$2y$10$nSBdcKA0vktBlS55.VeYMOArRC9RE082oFLG/iUqy1F1uCk7ljYHO', 'Soy un jovén de 20 años al cual le encanta la programación,\r\n                        procuro siempre estar al dia con los nuevos frameworks y\r\n                        si quieres algún consejo sobre frameworks no dudes en contactarte conmigo'),
(3, 'Marco Aurelio', 'ma.ramirezsilva@gmail.com', '$2y$10$nSBdcKA0vktBlS55.VeYMOArRC9RE082oFLG/iUqy1F1uCk7ljYHO', 'Apasionado por la enseñanza y ser parte de la formación de otros'),
(4, 'Irving Willihado', 'iw.reyesbuenfil@gmail.com', '$2y$10$nSBdcKA0vktBlS55.VeYMOArRC9RE082oFLG/iUqy1F1uCk7ljYHO', 'Maestro de tiempo completo que disfruta de la enseñanza ludica y fiel creyente de que todos tienen capacidad de aprender'),
(5, 'Claudia', 'c.solorzanomontes@gmail.com', '$2y$10$nSBdcKA0vktBlS55.VeYMOArRC9RE082oFLG/iUqy1F1uCk7ljYHO', 'Soy un jovén de 20 años al cual le encanta la programación,\r\n                        procuro siempre estar al dia con los nuevos frameworks y\r\n                        si quieres algún consejo sobre frameworks no dudes en contactarte conmigo'),
(6, 'Javier', 'j.perezbuenfil@gmail.com', '$2y$10$nSBdcKA0vktBlS55.VeYMOArRC9RE082oFLG/iUqy1F1uCk7ljYHO', 'Maestro de tiempo completo que disfruta de la enseñanza ludica y fiel creyente de que todos tienen capacidad de aprender'),
(7, 'juan', 'juan@gmail.com', '$2y$10$nSBdcKA0vktBlS55.VeYMOArRC9RE082oFLG/iUqy1F1uCk7ljYHO', 'Maestro de tiempo completo que disfruta de la enseñanza ludica y fiel creyente de que todos tienen capacidad de aprender'),
(8, 'Pedro', 'pedro@gmail.com', '$2y$10$nSBdcKA0vktBlS55.VeYMOArRC9RE082oFLG/iUqy1F1uCk7ljYHO', 'Maestro de tiempo completo que disfruta de la enseñanza ludica y fiel creyente de que todos tienen capacidad de aprender'),
(9, 'Pedro Javier', 'pedro.j@gmail.com', '$2y$10$nSBdcKA0vktBlS55.VeYMOArRC9RE082oFLG/iUqy1F1uCk7ljYHO', 'Maestro de tiempo completo que disfruta de la enseñanza ludica y fiel creyente de que todos tienen capacidad de aprender');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cur_alu`
--
ALTER TABLE `cur_alu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cur_prof`
--
ALTER TABLE `cur_prof`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cur_alu`
--
ALTER TABLE `cur_alu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cur_prof`
--
ALTER TABLE `cur_prof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2020 a las 20:25:49
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `varderindecorner`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `IdComentario` int(6) NOT NULL,
  `CodNoticia` int(6) NOT NULL,
  `CodUsuario` int(6) NOT NULL,
  `Comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `IdEquipo` int(6) NOT NULL,
  `CodLiga` int(6) NOT NULL,
  `Puntos` int(3) NOT NULL,
  `GolesAFavor` int(3) NOT NULL,
  `GolesEnContra` int(3) NOT NULL,
  `Escudo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `IdJugador` int(6) NOT NULL,
  `CodEquipo` int(6) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ligas`
--

CREATE TABLE `ligas` (
  `IdLiga` int(6) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Pais` varchar(20) NOT NULL,
  `NEquipos` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ligas`
--

INSERT INTO `ligas` (`IdLiga`, `Nombre`, `Pais`, `NEquipos`) VALUES
(1, 'Liga Santander', 'España', 20),
(2, 'Liga Smartbank', 'España', 22),
(3, 'Premier League', 'Inglaterra', 20),
(4, 'Bundesliga', 'Alemania', 18),
(5, 'Ligue 1', 'Francia', 20),
(6, 'Serie A', 'Italia', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `IdNoticia` int(11) NOT NULL,
  `CodUsuario` int(6) NOT NULL,
  `CodLiga` int(6) NOT NULL,
  `Texto` text CHARACTER SET utf8 NOT NULL,
  `Titular` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Foto` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `IdPregunta` int(3) NOT NULL,
  `Pregunta` varchar(300) NOT NULL,
  `CodLiga` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`IdPregunta`, `Pregunta`, `CodLiga`) VALUES
(1, '¿Qué club ha jugado todas las ediciones de liga Santander?', '1'),
(2, '¿Quién fue el máximo goleador de la liga Santander en la temporada 18/19 ?', '1'),
(3, '¿Cuál es el estadio con mas aforo de la liga Santander? ', '1'),
(4, '¿Qué equipo ganó la Copa del Rey en la temporada 18/19?', '1'),
(5, '¿Cuál fue el ultimo equipo de la liga Santander que ganó una Europa League?', '1'),
(6, '¿Cuál es el fichaje más caro de la liga Santander en la historia?', '1'),
(7, '¿Cual ha sido la mayor goleada en la historia de la liga Santander?', '1'),
(8, '¿Quién fue el ganador del trofeo Zamora en la temporada 18/19?', '1'),
(9, '¿Cuál es el record de puntos en la liga Santander?', '1'),
(10, '¿Cuál es el estadio activo más antiguo de la liga Santander?', '1'),
(11, '¿Quién es el máximo goleador de la historia de la Bundesliga?', '4'),
(12, '¿En qué equipo de la Bundesliga no jugó el histórico jugador Franz Beckenbauer?', '4'),
(13, '¿Qué jugador ostenta el récord de velocidad punta en la Bundesliga?', '4'),
(14, '¿Qué histórico jugador del Bayern de Múnich posee el récord de ser el único jugador en alcanzar 4 semifinales consecutivas de la Copa Mundial de Fútbol?', '4'),
(15, '¿Quién fue el jugador que ostenta el récord de marcar el gol más rápido de la historia de la Bundesliga?', '4'),
(16, '¿Qué jugador fue traspasado al Bayer 04 Leverkusen en el año 2012-13 procedente del Real Madrid Castilla?', '4'),
(17, '¿Por qué club de la Bundesliga no ha pasado el actual jugador del Real Madrid, Toni Kroos?', '4'),
(18, 'De los siguientes clubes, ¿cuál tiene un solo título de Campeón de la Bundesliga?', '4'),
(19, '¿Quién es el jugador con la mayor cantidad de partidos disputados?', '4'),
(20, '¿Qué jugador de la Bundesliga ganó el premio a Futbolista alemán del año 2001?', '4'),
(21, '¿Quién fue el máximo goleador de la Premier League 17/18?', '3'),
(22, '¿Qué jugador de la Premier League ha sido fichado por una mayor cantidad?', '3'),
(23, '¿Quién es el máximo asistente histórico de la Premier League?', '3'),
(24, '¿En qué temporada el Arsenal ganó la Premier League sin perder ningún partido?', '3'),
(25, 'En la temporada 17/18 el Manchester City batió el récord de goles en una temporada en la Premier League. ¿Con qué cifra?', '3'),
(26, '¿Qué equipo de la Premier League ha ganado más Champions League?', '3'),
(27, '¿Cuál de los siguientes equipos no ha ganado ninguna liga desde que cambió su nombre a Premier League en 1992?', '3'),
(28, '¿A qué equipo de la Premier League se le conoce con el apodo de \"Los Toffees\"?', '3'),
(29, '¿En cuál de los siguientes equipos no ha jugado nunca Kevin De Bruyne?', '3'),
(30, '¿Qué tres jugadores formaron una de las mejores delanteras de la historia del fútbol a finales de los años 70, conocida como la \"United Trinity\"?', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `IdRespuesta` int(3) NOT NULL,
  `CodPregunta` int(3) NOT NULL,
  `Respuesta` varchar(100) NOT NULL,
  `Correcta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`IdRespuesta`, `CodPregunta`, `Respuesta`, `Correcta`) VALUES
(1, 1, 'Atletico de Madrid', 0),
(2, 1, 'Athletic Bilbao', 1),
(3, 1, 'Real Betis', 0),
(4, 2, 'Karim Benzema', 0),
(5, 2, 'Luis Suárez', 0),
(6, 2, 'Leo Messi', 1),
(7, 3, 'Camp Nou', 1),
(8, 3, 'Santiago Bernabéu', 0),
(9, 3, 'Wanda Metropolitano', 0),
(10, 4, 'Real Madrid', 0),
(11, 4, 'Sevilla FC', 0),
(12, 4, 'Valencia CF', 1),
(13, 5, 'Sevilla FC', 0),
(14, 5, 'Atletico de Madrid', 1),
(15, 5, 'Getafe CF', 0),
(16, 6, 'Coutinho', 0),
(17, 6, 'Neymar', 1),
(18, 6, 'Cristiano Ronaldo', 0),
(19, 7, '10-0', 0),
(20, 7, '12-1', 1),
(21, 7, '11-1', 0),
(22, 8, 'Jan Oblak', 1),
(23, 8, 'Thibaut Courtois', 0),
(24, 8, 'Marc Ter Stegen', 0),
(25, 9, '90', 0),
(26, 9, '102', 0),
(27, 9, '100', 1),
(28, 10, 'Santiago Bernabéu', 0),
(29, 10, 'El Madrigal (Estadio de la Cerámica)', 1),
(30, 10, 'San Mamés', 0),
(31, 11, 'Robert Lewandowski', 0),
(32, 11, 'Gerd Müller', 1),
(33, 11, 'Klaus Fischer', 0),
(34, 12, 'Bayern de Munich', 0),
(35, 12, 'Hamburgo SV', 0),
(36, 12, 'Borussia Mönchengladbach', 1),
(37, 13, 'Kingsley Ehizibue', 0),
(38, 13, 'Achraf Hakimi', 1),
(39, 13, 'Kingsley Coman', 0),
(40, 14, 'Miroslav Josef Klose', 1),
(41, 14, 'Lothar Matthäus', 0),
(42, 14, 'Manuel Peter Neuer', 0),
(43, 15, 'Karim Bellarabi', 1),
(44, 15, 'Marc Bartra', 0),
(45, 15, 'Giovane Élber', 0),
(46, 16, 'Antonio Adán', 0),
(47, 16, 'Pablo Sarabia', 0),
(48, 16, 'Daniel Carvajal', 1),
(49, 17, 'Schalke 04', 1),
(50, 17, 'Bayern Munich', 0),
(51, 17, 'Bayer 04 Leverkusen', 0),
(52, 18, '1. FC Nürnberg', 1),
(53, 18, 'FC Kaiserslautern', 0),
(54, 18, 'FC Köln', 0),
(55, 19, 'Oliver Kahn', 0),
(56, 19, 'Karl-Heinz Körbel', 1),
(57, 19, 'Ulrich Stielike', 0),
(58, 20, 'Oliver Neuville', 0),
(59, 20, 'Miroslav Josef Klose', 0),
(60, 20, 'Oliver Kahn', 1),
(61, 21, 'Mohamed Salah', 1),
(62, 21, 'Sergio Agüero', 0),
(63, 21, 'Harry Kane', 0),
(64, 22, 'Harry Maguire', 0),
(65, 22, 'Romelu Lukaku', 0),
(66, 22, 'Paul Pogba', 1),
(67, 23, 'Cesc Fàbregas', 0),
(68, 23, 'Ryan Giggs', 1),
(69, 23, 'Wayne Rooney', 0),
(70, 24, '2004/2005', 0),
(71, 24, '2003/2004', 1),
(72, 24, '2005/2006', 0),
(73, 25, '100 goles', 0),
(74, 25, '103 goles', 0),
(75, 25, '106 goles', 1),
(76, 26, 'Manchester United', 0),
(77, 26, 'Chelsea', 0),
(78, 26, 'Liverpool', 1),
(79, 27, 'Southampton', 1),
(80, 27, 'Leicester City', 0),
(81, 27, 'Blackburn Rovers', 0),
(82, 28, 'Watford', 0),
(83, 28, 'Everton', 1),
(84, 28, 'Crystal Palace', 0),
(85, 29, 'Chelsea', 0),
(86, 29, 'Tottenham', 1),
(87, 29, 'Manchester City', 0),
(88, 30, 'Cristiano Ronaldo, Wayne Rooney y Carlos Tévez', 0),
(89, 30, 'George Best, Bobby Charlton y Denis Law', 1),
(90, 30, 'Mark Hughes, Brian McClair y Éric Cantona', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(10) NOT NULL,
  `Nombre` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Apellido1` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Apellido2` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Sexo` varchar(10) CHARACTER SET utf8 NOT NULL,
  `EquipoFavorito` varchar(50) CHARACTER SET utf8 NOT NULL,
  `NombreUsuario` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Contrasena` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Administrador` tinyint(1) NOT NULL,
  `SomosFamilia` tinyint(1) NOT NULL,
  `Puntos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Nombre`, `Apellido1`, `Apellido2`, `Sexo`, `EquipoFavorito`, `NombreUsuario`, `Contrasena`, `Email`, `Administrador`, `SomosFamilia`, `Puntos`) VALUES
(1, 'Administrador', 'Ad', 'Min', 'hombre', 'Atletico de Madrid', 'admin', '123', 'admin@ucm.es', 1, 0, 205),
(2, 'Gonzalo', 'Figueroa', 'del Val', 'hombre', 'Real Madrid', 'gfigue01', '123', 'gfigue01@ucm.es', 0, 1, 265),
(3, 'Alvaro', 'Cernuda', 'Vega', 'hombre', 'Real Madrid', 'acernuda', '123', 'acernuda@ucm.es', 0, 1, 248),
(4, 'Fernando', 'Gonzalez', 'Zamorano', 'hombre', 'Rayo Vallecano', 'fernag08', '123', 'fernag08@ucm.es', 0, 1, 250),
(5, 'Jorge', 'Borja', 'Garcia', 'hombre', 'Real Madrid', 'jorborja', '123', 'jorborja@ucm.es', 0, 1, 285),
(6, 'Juan Carlos', 'Rosado', 'Zamorano', 'hombre', 'Atletico de Madrid', 'jurosado', '123', 'jurosado@ucm.es', 0, 1, 278),
(7, 'Alae', 'Edine', 'Mouhib', 'hombre', 'Real Madrid', 'amouhib', '123', 'amouhib@ucm.es', 0, 1, 232),
(8, 'Usuario', 'Normal', 'Corriente', 'hombre', 'Getafe', 'usu', '123', 'usu@ucm.es', 0, 0, 201);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`IdComentario`),
  ADD KEY `index` (`CodNoticia`,`CodUsuario`),
  ADD KEY `CodUsuario` (`CodUsuario`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`IdEquipo`),
  ADD KEY `IdLiga` (`CodLiga`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`IdJugador`),
  ADD KEY `IdEquipo` (`CodEquipo`);

--
-- Indices de la tabla `ligas`
--
ALTER TABLE `ligas`
  ADD PRIMARY KEY (`IdLiga`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`IdNoticia`),
  ADD KEY `CodUsuario` (`CodUsuario`),
  ADD KEY `CodLiga` (`CodLiga`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`IdPregunta`),
  ADD KEY `IdLiga` (`CodLiga`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`IdRespuesta`),
  ADD KEY `IdPregunta` (`CodPregunta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `IdComentario` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `IdEquipo` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `IdJugador` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ligas`
--
ALTER TABLE `ligas`
  MODIFY `IdLiga` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `IdNoticia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `IdPregunta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `IdRespuesta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`CodUsuario`) REFERENCES `usuarios` (`IdUsuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`CodNoticia`) REFERENCES `noticias` (`IdNoticia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`CodLiga`) REFERENCES `ligas` (`IdLiga`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`CodEquipo`) REFERENCES `equipos` (`IdEquipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`CodUsuario`) REFERENCES `usuarios` (`IdUsuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `noticias_ibfk_2` FOREIGN KEY (`CodLiga`) REFERENCES `ligas` (`IdLiga`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`CodPregunta`) REFERENCES `preguntas` (`IdPregunta`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2020 a las 13:58:40
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

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`IdNoticia`, `CodUsuario`, `CodLiga`, `Texto`, `Titular`, `Foto`) VALUES
(1, 6, 1, '¿Le venderá el Atlético? ¿Le aguantará un año más? Esta temporada ha estado parado tres meses por una operación de hernia discal cervical. De ahí sus números, sólo comparables a los que tuvo en el Sporting de sus inicios, temporada 2006-07 (un gol): dos en 19 partidos, dos en 1.192 minutos.<br />\r\n<br />\r\nAdemás de en Italia, sigue teniendo mercado en Brasil y en Qatar. Flamengo. Al-Rayyan. Su nombre sobre la mesa del despacho de Andrea Berta, director deportivo rojiblanco, este verano. El 7 de octubre cumple 32 años. Mientras Simeone le elogia y no para de comentar en público que es un futbolista que aporta algo diferente, otros entienden que su ciclo en el Atlético ha terminado.', 'La encrucijada de Diego Costa', 'noticia_diego_costa.jpg'),
(2, 6, 1, 'Leo Messi no para de batir récords y cada temporada que pasa nos asombra con un sinfín de genialidades a la altura de los mejores futbolistas de la historia. A causa del coronavirus, no ha acabado el curso y ya es el máximo goleador y asistente de la Liga Santander con 19 tantos y 12 pases de gol.<br />\r\nPero si tenemos en cuenta a las cinco grandes ligas europeas, encontramos un dato sorprendente: ha marcado más goles desde fuera del área esta temporada que 86 equipos (contabilizando a todos los jugadores del mismo) de los 98 que forman las cinco grandes ligas, según indica el portal WhoScored.<br />\r\nEl argentino ha anotado ocho goles desde fuera del área, por lo que supera a equipos de la talla del Chelsea (7), Manchester United (7), Liverpool (6), Real Madrid (6), Tottenham (5), Juventus (5), PSG (4), Atlético de Madrid (3) o Arsenal (3).', 'Messi,más goles fuera del área que 86 equipos', 'noticia_messi.jpg'),
(3, 2, 5, 'Kylian Mbappé ha vuelto a demostrar que, más allá de ser un gran futbolistas, es una gran persona. El jugador del PSG ha realizado una gran donación (la familia quiere que sea confidencial la cantidad) a la fundación Abe Pierre, dedicada a ayudar a las familias más necesitadas de París.<br />\r\n<br />\r\n\"Preocupado por las consecuencias de la grave crisis de salud que azota a nuestro país, pero también por todas las consecuencias que puede generar en las personas más vulnerables, Kylian Mbappé acaba de hacer una gran donación para apoyar a la Fundación Abe Pierre\", reza el comunicado de la organización.<br />\r\n<br />\r\nEsta donación permitirá a la fundación acceder a las situaciones de mayor emergencia: acceso al agua potable, higiene para las personas en situaciones de precariedad, ayuda alimentaria y refugio para personas sin hogar. En su cuenta de Instagram, el delantero del PSG envió un mensaje conciso y claro: \"Los más pobres no están confinados. No lo olvides\"', 'Mbappé hace una gran donación a familias sin hogar', 'noticia_mbappe.jpg'),
(4, 2, 5, 'Los clubes de Francia están pasando por un momento financiero muy complicado a causa del coronavirus. No tener una fecha de regreso para sus competiciones implica no saber cuántas pérdidas tendrán y las medidas de ayuda del gobierno no les parecen suficientes, los equipos están tratando de buscar soluciones a este problema y todas parecen pasar por un préstamo.<br />\r\n<br />\r\nLos diferentes equipos quieren obtener un préstamo colectivo que se encargaría de gestionar la federación Francesa o la Liga de Fútbol Profesional de Francia. La idea cobra fuerza, y tanto el presidente del Niza como el presidente del Olympique de Marsella o el dueño del PSG estarían de acuerdo en ofrecer como garantía el actual contrato de derechos televisivos. Esto supondría una inyección de dinero de entre 200 y 250 millones de euros.<br />\r\n<br />\r\nMientras la Ligue 1 trabaja en ello, otras propuestas han sido barajadas y una de ellas, encabezada por Nasser Al-Khelaïfi, se basa en pedir un rescate a Qatar.', 'Al-Khelaïfi propone llamar a Qatar para salvar la Ligue 1', 'noticia_ligue1.jpg'),
(5, 3, 4, 'El 28 de julio de 2010 cambió la historia del Schalke 04. Ese día aterrizó en Gelsenkirchen Raúl González Blanco, el mejor fichaje de la historia del club alemán. A coste cero, el Schalke 04 se hizo con los servicios de un jugador con el que jamás habían soñado sus seguidores. \"Los aficionados llamaban a las oficinas para saber si era verdad que lo habíamos fichado, la gente no se lo creía\", recuerdan en el club alemán. En Alemania, el Schalke explotó como nunca su propia marca registrada. El cincuenta por ciento de las camisetas vendidas en la tienda oficial llevaban su nombre, vendiendo tres veces más que jugadores como Huntelaar o Farfán.<br />\r\n', 'Raul Gonzalez, el jugador que puso al Schalke 04 en el mapa', 'raul_schalke.jpg'),
(6, 3, 4, 'La recomendación hecha por el exbundesliguista y excompañero en el Real Madrid, Dani Carvajal, comienza a cosechar éxitos. Achraf Hakimi llegó al BVB con tan solo 19 primaveras, como parte de un préstamo de dos años desde club español al club alemán, y desde su incorporación su crecimiento como jugador y hombre de confianza de los dirigidos por Favre, se ha potenciado al máximo.<br />\r\n', 'Achraf Hakimi el mejor \"rookie\" de la Bundesliga', 'achraf.jpg'),
(7, 5, 3, 'Kevin de Bruyne, futbolista del Manchester City, aseguró que gracias al confinamiento provocado por el brote de coronavirus ha tomado la decisión de prolongar su carrera.<br />\r\n<br />\r\n<br />\r\nEl belga lo confirmó a través de sus redes sociales. \"Le he dicho a mi mujer que voy a jugar un poco más\", explicó el futbolista.<br />\r\n<br />\r\n\"Después de este confinamiento no puedo quedarme más en casa. Le he dicho que voy a jugar dos años más. Es momento de jugar al fútbol, lo echo de menos y es difícil, pero ahora no es lo importante, el fútbol no es lo importante. La gente tiene que estar segura\", añadió.<br />\r\n<br />\r\nDe Bruyne, uno de los mejores jugadores de la Premier, explicó que lleva en casa encerrado dos semanas y que al principio su familia y sus hijos estuvieron un poco enfermos, lo que les preocupó, pero que ahora ya están bien.<br />\r\n<br />\r\n\"Fueron ocho o nueve días, pero ahora estamos mejor afortunadamente, porque nunca sabes lo que va a pasar\", finalizó el belga.<br />\r\n', 'De Bruyne: \"El confinamiento hará que alargue mi carrera\"', 'noticia_deBruyne.jpg'),
(8, 5, 3, 'El Tottenham ha pasado del subcampeonato de la Champions League a ver cómo se tambalea su proyecto deportivo en un año. Fuera de Europa en la Premier y con Harry Kane tentando su salida, la 2019-20 sigue torciéndose tras el fin de Pochettino.<br />\r\n<br />\r\nEl equipo llegó a su mejor momento en las primeras semanas con \"Mou\" pero después volvió a decaer, y se aprecia que la verdadera brecha está atrás. Tanto ahora como antes, han concedido muchas ocasiones y no se ve ni una reacción clara, ni resultados.<br />\r\n<br />\r\n¿Será capaz Mourinho de corregir los problemas y evitar el colapso del proyecto del Tottenham?<br />\r\n', 'El Tottenham de José Mourinho se tambalea', 'noticia_Mou.jpg');

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
(30, '¿Qué tres jugadores formaron una de las mejores delanteras de la historia del fútbol a finales de los años 70, conocida como la \"United Trinity\"?', '3'),
(31, '¿Cual de estos equipos gano el campeonato el mismo año que su centenario?', '6'),
(32, '¿Cuál era el antiguo nombre de la liga italiana?', '6'),
(33, '¿Cuantas plazas de clasificación a la Champions League tiene la Serie A?', '6'),
(34, '¿Qué equipos fueron los involucrados en el escándalo llamado \"Calciopoli\"?', '6'),
(35, '¿Cuál es el equipo mas antiguo de la liga Serie A?', '6'),
(36, '¿Qué día se disputó \"la final\" de la 1º liga italiana contando con que el primer equipo se fundó en 1893?', '6'),
(37, '¿Cuál es el estadio con mayor capacidad de espectadores de la liga italiana?', '6'),
(38, '¿Quién es el mayor goleador en la historia de la liga italiana?', '6'),
(39, '¿Cuál es el equipo que más veces ha ganado el campeonato Serie A?', '6'),
(40, '¿Qué equipo no ha descendido nunca a segunda división de la Serie A?', '6'),
(41, '¿Cuántos equipos participan en la Copa de Francia?', '5'),
(42, '¿Cuándo se instaló, oficialmente, el fútbol profesional en Francia, con el primer campeonato de liga?', '5'),
(43, '¿Cuántos años consecutivos lleva el PSG en la Ligue 1 sin descender?', '5'),
(44, '¿Qué equipo ha ganado más títulos de liga de primera división francesa (10)?', '5'),
(45, '¿Cuántos títulos de Ligue 1 consecutivos ganó el Olympique Lyonnais desde 2002?', '5'),
(46, '¿Quién es el máximo goleador histórico de la Ligue 1 con 299 goles?', '5'),
(47, '¿Cuál es el fichaje más caro de la historia de la Ligue 1?', '5'),
(48, '¿Quién fue el máximo goleador en la Ligue 1 la temporada pasada 2018/19 con 33 goles?', '5'),
(49, '¿Qué gran figura del fútbol que juega o ha jugado en la Ligue 1 ha marcado mayor cantidad de goles de falta directa?', '5'),
(50, '¿Qué jugador de la Ligue 1 ha sido el más joven en debutar con la selección absoluta de Francia?', '5'),
(51, '¿Qué equipo lleva más temporadas consecutivas en la liga Smartbank?', '2'),
(52, '¿Cuál es el único filial español que ha quedado campeón en Segunda división española?', '2'),
(53, '¿Qué delantero, que ha regresado este año a la liga Smartbank fue el último Pichichi no español de la categoría?', '2'),
(54, '¿Cuál de estos futbolistas no jugo nunca en Segunda división española?', '2'),
(55, '¿Quién es el máximo goleador de la historia de la liga Smartbank?', '2'),
(56, '¿Cuál fue el primer equipo que ascendió a Primera a través de los playoffs de ascenso?', '2'),
(57, '¿Qué entrenador actual de la liga Smartbank se quedó a las puertas de jugar una Eurocopa con España debido a una lesión?', '2'),
(58, '¿Cuál de estos porteros marcó un gol en la liga Smartbank?', '2'),
(59, '¿Cuál es el fichaje más caro de la historia de la liga Smartbank?', '2'),
(60, '¿Qué jugador del Rayo Vallecano ha jugado junto a Cristiano Ronaldo en el Manchester United?', '2');

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
(90, 30, 'Mark Hughes, Brian McClair y Éric Cantona', 0),
(91, 31, 'Juventus FC', 0),
(92, 31, 'AC Milan', 0),
(93, 31, 'Lazio', 1),
(94, 32, 'Serie B', 0),
(95, 32, 'Lega Italiana', 0),
(96, 32, 'Lega Calcio', 1),
(97, 33, '3 plazas ', 0),
(98, 33, '2 plazas y media', 1),
(99, 33, '3 plazas y media', 0),
(100, 34, 'Juventus FC, AC Milan, Fiorentina, Lazio, Siena y Reggina', 1),
(101, 34, 'Inter,Juventus FC, Cesena, Hellas verona y Napoli', 0),
(102, 34, 'Fiorentina, AC Milan, Roma, Livorno y Genoa', 0),
(103, 35, 'Napoli', 0),
(104, 35, 'Genoa CFC', 1),
(105, 35, 'Internazionale de Milano', 0),
(106, 36, '29 de junio de 1899', 0),
(107, 36, '8 de mayo de 1898', 1),
(108, 36, '11 de mayo de 1900', 0),
(109, 37, 'Estadio San Polo', 0),
(110, 37, 'Estadio Guiseppe Meazza', 1),
(111, 37, 'Estadio Olimpico de Roma', 0),
(112, 38, 'Cristiano Ronaldo', 0),
(113, 38, 'Silvio Piola', 1),
(114, 38, 'Zinedine Zidane', 0),
(115, 39, 'Juventus FC', 1),
(116, 39, 'Inter', 0),
(117, 39, 'AC Milan', 0),
(118, 40, 'Palermo', 0),
(119, 40, 'Juventus FC', 0),
(120, 40, 'Inter', 1),
(121, 41, '128', 0),
(122, 41, '256', 0),
(123, 41, '8264', 1),
(124, 42, '1932', 1),
(125, 42, '1894', 0),
(126, 42, '1920', 0),
(127, 43, '54', 0),
(128, 43, '46', 1),
(129, 43, '80', 0),
(130, 44, 'Olympique de Marseille', 0),
(131, 44, 'Olympique Lyonnais', 0),
(132, 44, 'AS Saint-Etienne', 1),
(133, 45, '7', 1),
(134, 45, '5', 0),
(135, 45, '4', 0),
(136, 46, 'Delio Onnis (AS Monaco)', 1),
(137, 46, 'Carlos Bianchi (Stade de Reims)', 0),
(138, 46, 'Bernard Lacombe (Olympique de Lyon)', 0),
(139, 47, 'Oliver Giroud', 0),
(140, 47, 'Lensois Maryan Wisnieski', 0),
(141, 47, 'Kylian Mbappé', 1),
(142, 48, 'Nicolas Pépé', 0),
(143, 48, 'Edinson Cavani', 0),
(144, 48, 'Kylian Mbappé', 1),
(145, 49, 'David Beckham', 0),
(146, 49, 'Juninho Pernambucano', 1),
(147, 49, 'Neymar Jr', 0),
(148, 50, 'Kylian Mbappé', 1),
(149, 50, 'Oliver Giroud', 0),
(150, 50, 'Lensois Maryan Wisnieski', 0),
(151, 51, 'Numancia', 1),
(152, 51, 'Rayo Vallecano', 0),
(153, 51, 'Zaragoza', 0),
(154, 52, 'Atético de Madrid B', 0),
(155, 52, 'Real Madrid Castilla', 1),
(156, 52, 'FC Barcelona B', 0),
(157, 53, 'Choco Lozano', 0),
(158, 53, 'Yuri de Souza', 0),
(159, 53, 'Leo Ulloa', 1),
(160, 54, 'Raúl González', 0),
(161, 54, 'Johan Cruyff', 0),
(162, 54, 'Joan Capdevila', 1),
(163, 55, 'Nino', 1),
(164, 55, 'Rubén Castro', 0),
(165, 55, 'Alberto Bueno', 0),
(166, 56, 'UD Almeria', 0),
(167, 56, 'Real Valladolid', 0),
(168, 56, 'Granada CF', 1),
(169, 57, 'Paco Jémez', 0),
(170, 57, 'Victor Sánchez del Amo', 0),
(171, 57, 'Andoni Iraola', 1),
(172, 58, 'Claudio Bravo', 1),
(173, 58, 'Dani Aranzubia', 0),
(174, 58, 'Toni Prats', 0),
(175, 59, 'Arvin Appiah', 0),
(176, 59, 'Ricardo Oliveira', 1),
(177, 59, 'Alen Halilovic', 0),
(178, 60, 'Isi', 0),
(179, 60, 'Advíncula', 0),
(180, 60, 'Bebé', 1);

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
(2, 'Gonzalo', 'Figueroa', 'del Val', 'hombre', 'Real Madrid', 'gfigue01', '123', 'gfigue01@ucm.es', 0, 1, 276),
(3, 'Alvaro', 'Cernuda', 'Vega', 'hombre', 'Real Madrid', 'acernuda', '123', 'acernuda@ucm.es', 0, 1, 259),
(4, 'Fernando', 'Gonzalez', 'Zamorano', 'hombre', 'Rayo Vallecano', 'fernag08', '123', 'fernag08@ucm.es', 0, 1, 251),
(5, 'Jorge', 'Borja', 'Garcia', 'hombre', 'Real Madrid', 'jorborja', '123', 'jorborja@ucm.es', 0, 1, 295),
(6, 'Juan Carlos', 'Rosado', 'Zamorano', 'hombre', 'Atletico de Madrid', 'jurosado', '123', 'jurosado@ucm.es', 0, 1, 288),
(7, 'Alae', 'Edine', 'Mouhib', 'hombre', 'Real Madrid', 'amouhib', '123', 'amouhib@ucm.es', 0, 1, 233),
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
  MODIFY `IdNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `IdPregunta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `IdRespuesta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

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

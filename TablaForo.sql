-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2016 a las 09:07:36
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `foro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

DROP DATABASE IF EXISTS foro;
CREATE DATABASE foro CHARACTER SET utf8;
USE foro;

CREATE TABLE `comentario` (
  `Id` int(11) NOT NULL,
  `Id_Post` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Titulo` varchar(128) NOT NULL,
  `Descripcion` varchar(512) NOT NULL,
  `Likes` int(11) NOT NULL,
  `Dislikes` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`Id`, `Id_Post`, `Id_Usuario`, `Titulo`, `Descripcion`, `Likes`, `Dislikes`) VALUES
(1, 1, 1, 'Normas', 'Bienvenidos al foro, estas son las normas:\n						1.- No insultar\n						2.- No hacer spam\n						3.- Presentate antes que nada\n						4.- Evita crear post duplicados\n						5.- Esto es un foro, no un chat.\n						6.- Si tienes algún problema con algún usuario,\n							contacta con el administrador', 0, 0),
(2, 1, 2, '[RE]:Normas', 'Gracias por las normas. Un saludo.', 0, 0),
(3, 1, 1, '[RE]:Normas', 'Para hablar utiliza otro subforo.', 0, 0),
(4, 1, 3, '[RE]:Normas', '¿Y si una regla rompe otra regla?', 0, 0),
(5, 1, 1, '[RE]:Normas', 'En ese caso, no toques nada.', 0, 0),
(6, 1, 2, 'Creado por salvaaragon el 20 de December de 2016, a las 0:9:20', 'Lo siento', 0, 0),
(7, 1, 2, 'Creado por salvaaragon el 20 de December de 2016, a las 0:9:27', 'Yo no he sido', 0, 0),
(8, 1, 2, 'Creado por salvaaragon el 20 de December de 2016, a las 0:15:32', 'Pues ala, mufasa', 0, 0),
(9, 19, 3, 'Creado por lyqu el 20 de December de 2016, a las 3:48:45', 'Hola', 0, 0),
(14, 8, 2, 'Creado por salvaaragon el 20 de December de 2016, a las 8:48:37', 'Mucho sueño', 0, 0),
(13, 8, 2, 'Creado por salvaaragon el 20 de December de 2016, a las 7:46:59', 'Y con sueño', 0, 0),
(15, 8, 2, 'Creado por salvaaragon el 20 de December de 2016, a las 8:49:20', 'Pero bueno', 0, 0),
(16, 9, 2, 'Creado por salvaaragon el 20 de December de 2016, a las 9:4:51', 'Hddjskdjskdjs dskdjios', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `Id` int(11) NOT NULL,
  `Id_Subforo` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Nombre` varchar(128) NOT NULL,
  `Palabras` varchar(64) NOT NULL,
  `Descripcion` varchar(8192) NOT NULL,
  `fechaCreacion` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`Id`, `Id_Subforo`, `Id_Usuario`, `Nombre`, `Palabras`, `Descripcion`, `fechaCreacion`) VALUES
(1, 1, 1, 'Normas', 'normas,uso,funcionamiento', 'Bienvenidos al foro, estas son las normas: 						1.- No insultar 						2.- No hacer spam 						3.- Presentate antes que nada 						4.- Evita crear post duplicados 						5.- Esto es un foro, no un chat. 						6.- Si tienes algún problema con algún usuario, 							contacta con el administrad', NULL),
(2, 2, 2, 'Me presento', 'bienvenida,saludo,nuevo', 'Hola, soy nuevo :)', NULL),
(3, 7, 2, 'Nintendo Switch', 'switch,consola,nintendo', 'Nueva consola de nintendo', NULL),
(4, 5, 1, 'Xbox Scorpio', 'scorpio,consola,microsoft', 'Nueva consola de microsoft', NULL),
(5, 15, 1, 'The Walking Dead', 'zombies,walkingdead,apocalipsis', 'Hype por la segunda parte de la temporada 7', NULL),
(6, 10, 1, 'Windows 10, el mejor SO', 'windows,SO,informatica', 'Los haters dirán que prefieren linux', NULL),
(7, 1, 1, 'Prueba', 'prueba,prueba,prueba', 'Prueba', NULL),
(8, 3, 3, 'Como codeigniter me ha quitado el sueño', 'Como,codeigniter,me,ha,quitado,el,sueño', 'Aquí estamos, con esta locura de codeigniter.', '2016-12-20'),
(9, 3, 2, 'Prueba', 'Prueba', 'Hola', '2016-12-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`Id`, `Nombre`) VALUES
(1, 'General'),
(2, 'Gaming'),
(3, 'Informática'),
(4, 'Mundo friki'),
(5, 'Series y películas'),
(6, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subforo`
--

CREATE TABLE `subforo` (
  `Id` int(11) NOT NULL,
  `Id_Seccion` int(11) NOT NULL,
  `Nombre` varchar(32) NOT NULL,
  `Descripcion` varchar(512) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subforo`
--

INSERT INTO `subforo` (`Id`, `Id_Seccion`, `Nombre`, `Descripcion`) VALUES
(1, 1, 'Normas', 'Normas para el buen uso de la comunidad'),
(2, 1, 'Presentación', 'Presentate a la comunidad'),
(3, 1, 'General', 'Posts con temática distinta a la del foro'),
(4, 2, 'PC Master Race', 'Mundo del pc'),
(5, 2, 'Microsoft', 'Mundo de Microsoft y sus consolas'),
(6, 2, 'Sony', 'Mundo de Sony y sus consolas'),
(7, 2, 'Nintendo', 'Mundo de Nintendo y sus consolas'),
(8, 3, 'Seguridad', 'Mundo de la seguridad'),
(9, 3, 'Programación', 'Mundo de la programación'),
(10, 3, 'Sistemas Operativos', 'Mundo de los Sistemas Operativos'),
(11, 3, 'Comunicaciones', 'Redes y dispositivos móviles'),
(12, 4, 'Anime', 'Mundo del anime'),
(13, 4, 'Manga', 'Mundo del manga'),
(14, 4, 'Comics', 'Mundo del comic'),
(15, 5, 'Series', 'Series de televisión e Internet'),
(16, 5, 'Películas', 'Películas y cine'),
(17, 6, 'Dudas y ayuda', 'Dudas de los usuarios'),
(18, 6, 'Quejas y sugerencias', 'Sugerencias de los usuarios'),
(19, 6, 'Pruebas', 'Mensajes y posts de prueba'),
(22, 6, 'Mi subforo', 'Aqui estamos liandola basta'),
(20, 3, 'Hola', 'ey');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `Nick` varchar(16) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Nombre` varchar(32) DEFAULT NULL,
  `Apellidos` varchar(128) DEFAULT NULL,
  `Correo` varchar(32) NOT NULL,
  `NumeroReportes` int(11) NOT NULL,
  `EstaBaneado` tinyint(1) NOT NULL,
  `EsAdmin` tinyint(1) NOT NULL,
  `imagen` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Nick`, `Password`, `Nombre`, `Apellidos`, `Correo`, `NumeroReportes`, `EstaBaneado`, `EsAdmin`, `imagen`) VALUES
(1, 'Admin', 'admin', 'Guaranito', 'Rodrigañez', 'shurprimo@gmail.com', 0, 0, 1, 'default.png'),
(2, 'salvaaragon', '123456', 'Salvashhdjsh', 'Aragón Reyes', 'salvaaragon94@gmail.com', 0, 0, 0, 'default.png'),
(3, 'lyqu', 'lyqu', 'Luis David', 'García Bernal', 'lyqu24@gmail.com', 0, 1, 0, 'default.png'),
(4, 'Dovald', 'tumare', 'Fernando', 'García Doval', 'tumare@outlook.com', 0, 0, 0, 'default.png'),
(5, 'juanpalomo', '123456', ' ', ' ', 'invento@gmail.com', 0, 0, 0, 'default.png'),
(6, 'lacaleta', 'caleta', 'CAI', ' ', 'lacaleta@caleta.cai', 0, 0, 0, 'la_caleta.jpg'),
(17, 'tuprima', '123456', ' ', ' ', 'killoquepesadilla@miarma.cai', 0, 1, 0, 'default.png'),
(9, 'pikapollo', 'pikapollo', ' ', ' ', 'pikachupi@gmail.com', 0, 0, 0, 'f51d08be05919290355ac004cdd5c2d6'),
(10, 'mesita', 'mesita', ' ', ' ', 'mesita@mesita.messi', 0, 0, 0, 'miescena.png'),
(11, 'josefina', 'josefina', ' ', ' ', 'josefina@ina.ina', 0, 0, 0, 'default.png'),
(12, 'Capichu', 'capichu', ' ', ' ', 'capichu@pika.chu', 0, 0, 0, 'default.png'),
(13, 'Greenarrow', 'greenarrow', ' ', ' ', 'oliver@queen.es', 0, 0, 0, 'Greenarrow.png'),
(14, 'kaze', 'kazekaze', ' ', ' ', 'kazekaze@kaze.kaze', 0, 0, 0, 'kaze.jpg'),
(15, 'arbol', '123456', ' ', ' ', 'arbol@mio.es', 0, 0, 0, 'arbol.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `subforo`
--
ALTER TABLE `subforo`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nick` (`Nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `subforo`
--
ALTER TABLE `subforo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

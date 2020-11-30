-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2020 a las 04:53:48
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fuse_pong`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `COMPANY_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(50) NOT NULL,
  `COMPANY_NIT` varchar(20) NOT NULL,
  `COMPANY_PHONE` varchar(20) NOT NULL,
  `COMPANY_EMAIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`COMPANY_ID`, `COMPANY_NAME`, `COMPANY_NIT`, `COMPANY_PHONE`, `COMPANY_EMAIL`) VALUES
(1, 'EMPRESA SAS', '902345632-1', '4023456', 'empre.sas@empresa.com'),
(2, 'Compañia LTDA', '902314567-1', '7546783', 'compañia@compañialtda.com'),
(3, 'FusePong', '9010007418-1', '3102189844', 'wilson.montoya@fusepong.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `PROJECT_ID` int(11) NOT NULL,
  `PROJECT_NAME` varchar(50) NOT NULL,
  `PROJECT_DESCRIPTION` varchar(50) NOT NULL,
  `COMPANY_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`PROJECT_ID`, `PROJECT_NAME`, `PROJECT_DESCRIPTION`, `COMPANY_ID`) VALUES
(7, 'PAGINA_WEB', 'DESARROLLO DE UNA PAGINA WEB PARA PUBLICITAR COMID', 3),
(8, 'APLICACION_MOVIL', 'Desarrollo de una aplicación móvil, para la tienda', 3),
(9, 'APLICACIÓN_WEB', 'Desarrollo de una aplicacion web para la gestión d', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `TICKET_ID` int(11) NOT NULL,
  `USER_HISTORY_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `TICKET_STATE` int(1) NOT NULL COMMENT '0-> ATIVO\r\n1-> INACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`TICKET_ID`, `USER_HISTORY_ID`, `USER_ID`, `TICKET_STATE`) VALUES
(1, 1, 2, 0),
(2, 2, 2, 0),
(3, 10, 2, 0),
(4, 11, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `USER_PASSWORD` varchar(50) NOT NULL,
  `COMPANY_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`USER_ID`, `USER_NAME`, `USER_PASSWORD`, `COMPANY_ID`) VALUES
(1, 'cc@cc.com', 'cds', 3),
(2, 'cristian.quiroga@correo.com', 'ccqmthebest', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_history`
--

CREATE TABLE `user_history` (
  `USER_HISTORY_ID` int(11) NOT NULL,
  `USER_HISTORY_DESCRIPTION` varchar(200) NOT NULL,
  `PROJECT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user_history`
--

INSERT INTO `user_history` (`USER_HISTORY_ID`, `USER_HISTORY_DESCRIPTION`, `PROJECT_ID`) VALUES
(1, 'Esta es mi primera historia de usuario', 9),
(2, 'Esta es mi segunda historia de usuario', 9),
(3, 'Esta es mi tercera historia de usuario', 7),
(4, 'Esta es mi cuarta historia de usuario', 8),
(5, 'Esta es mi quinta historia de usuario', 8),
(6, 'Esta es mi sexta historia de usuario', 8),
(7, 'Esta es mi septima historia de usuario', 9),
(8, 'Esta es mi octava historia de usuario', 9),
(9, 'Esta es mi novena historia de usuario', 9),
(10, 'asadadsas', 9),
(11, 'kasdhakshadsjkadsh', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`COMPANY_ID`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`PROJECT_ID`),
  ADD KEY `FK_COMPANY_ID` (`COMPANY_ID`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`TICKET_ID`),
  ADD KEY `FK_USER_HISTORY` (`USER_HISTORY_ID`),
  ADD KEY `FK_USER` (`USER_ID`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `FK_COMPANY_ID_2` (`COMPANY_ID`);

--
-- Indices de la tabla `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`USER_HISTORY_ID`),
  ADD KEY `FK_PROJECT_ID` (`PROJECT_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `COMPANY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `PROJECT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `TICKET_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user_history`
--
ALTER TABLE `user_history`
  MODIFY `USER_HISTORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_COMPANY_ID` FOREIGN KEY (`COMPANY_ID`) REFERENCES `company` (`COMPANY_ID`);

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `FK_USER` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`),
  ADD CONSTRAINT `FK_USER_HISTORY` FOREIGN KEY (`USER_HISTORY_ID`) REFERENCES `user_history` (`USER_HISTORY_ID`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_COMPANY_ID_2` FOREIGN KEY (`COMPANY_ID`) REFERENCES `company` (`COMPANY_ID`);

--
-- Filtros para la tabla `user_history`
--
ALTER TABLE `user_history`
  ADD CONSTRAINT `FK_PROJECT_ID` FOREIGN KEY (`PROJECT_ID`) REFERENCES `project` (`PROJECT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

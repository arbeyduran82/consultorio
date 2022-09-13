-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2022 a las 23:38:22
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `citas2022`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `codCita` int(11) NOT NULL,
  `tipoCita` varchar(100) NOT NULL,
  `fechaCita` date NOT NULL,
  `horaCita` time NOT NULL,
  `Estado` varchar(10) NOT NULL,
  `Observaciones` varchar(100) DEFAULT NULL,
  `codConsultorio` int(11) NOT NULL,
  `codMedico` int(11) NOT NULL,
  `codPaciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorios`
--

CREATE TABLE `consultorios` (
  `numeroC` int(11) NOT NULL,
  `nombreC` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consultorios`
--

INSERT INTO `consultorios` (`numeroC`, `nombreC`) VALUES
(101, 'Psicologia'),
(102, 'Medicina general'),
(103, 'Optometria'),
(104, 'Patologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_Especialidad` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_Especialidad`, `Descripcion`) VALUES
(2, 'Medicina interna'),
(3, 'Patologia'),
(4, 'Psicologia'),
(7, 'Dermatología'),
(9, 'Hematología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `documentoM` int(11) NOT NULL,
  `nombreM` varchar(100) NOT NULL,
  `apellidoM` varchar(100) NOT NULL,
  `emailM` varchar(100) NOT NULL,
  `Especialidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`documentoM`, `nombreM`, `apellidoM`, `emailM`, `Especialidad`) VALUES
(79989560, 'Diosmar', 'Cardenas', 'cardenas@gmail.com', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `documentoP` int(11) NOT NULL,
  `nombreP` varchar(100) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `emailP` varchar(100) DEFAULT NULL,
  `fechaNac` date NOT NULL,
  `generoP` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsu` varchar(100) NOT NULL,
  `apellidoUsu` varchar(100) NOT NULL,
  `emailUsu` varchar(120) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsu`, `apellidoUsu`, `emailUsu`, `pass`, `rol`) VALUES
(1, 'Diosmar', 'Cardenas', 'arbeyduran@gmail.com', '123456789', 'admin'),
(2, 'Carlos', 'Otro', 'otro@gmail.com', '123456789', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`codCita`),
  ADD KEY `codConsultorio` (`codConsultorio`),
  ADD KEY `codMedico` (`codMedico`),
  ADD KEY `codPaciente` (`codPaciente`);

--
-- Indices de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  ADD PRIMARY KEY (`numeroC`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_Especialidad`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`documentoM`),
  ADD KEY `Especialidad` (`Especialidad`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`documentoP`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `codCita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_Especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`codConsultorio`) REFERENCES `consultorios` (`numeroC`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`codMedico`) REFERENCES `medicos` (`documentoM`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`codPaciente`) REFERENCES `pacientes` (`documentoP`);

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`Especialidad`) REFERENCES `especialidades` (`id_Especialidad`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

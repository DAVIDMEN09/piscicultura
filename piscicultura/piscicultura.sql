-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2022 a las 02:24:03
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `piscicultura`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscadorDatos` (IN `codigo` INT)   BEGIN
    SELECT * 
    FROM mantiene
    WHERE mantiene.codManteni = codigo;
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `mejor_cliente` () RETURNS VARCHAR(150) CHARSET utf8mb4  BEGIN
   RETURN (SELECT consumidor.Nombre from consumidor
where consumidor.ID_Consumidor=(select ID_Consumidor from (SELECT 
ID_Consumidor,sum(Total_Compra) as t FROM `compra` GROUP by ID_Consumidor) as listado
where t = (select max(t) from (SELECT ID_Consumidor,sum(Total_Compra) 
as t FROM `compra` GROUP by ID_Consumidor) as listado)));
  END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `usuario` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `contrasena` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`usuario`, `contrasena`) VALUES
('admin', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentación`
--

CREATE TABLE `alimentación` (
  `CodAlimentacion` int(11) NOT NULL,
  `Fecha_alimentacion` date DEFAULT NULL,
  `ID_Estanque` int(11) NOT NULL,
  `ID_Pez` int(11) NOT NULL,
  `ID_Alimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alimentación`
--

INSERT INTO `alimentación` (`CodAlimentacion`, `Fecha_alimentacion`, `ID_Estanque`, `ID_Pez`, `ID_Alimento`) VALUES
(1, NULL, 2, 1, 123),
(2, NULL, 1, 2, 45577),
(3, NULL, 4, 3, 45645),
(4, NULL, 5, 1, 6545),
(5, NULL, 3, 5, 45577);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento`
--

CREATE TABLE `alimento` (
  `ID_Alimento` int(11) NOT NULL,
  `Nombre` varchar(11) NOT NULL,
  `Tipo` varchar(11) NOT NULL,
  `Etapa` int(11) NOT NULL,
  `ID_Proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alimento`
--

INSERT INTO `alimento` (`ID_Alimento`, `Nombre`, `Tipo`, `Etapa`, `ID_Proveedor`) VALUES
(123, 'natufish', 'frutas ', 4, 1225644),
(6545, 'Gusanosyalg', 'natural', 3, 5784521),
(45577, 'Engordepez', 'Completo', 2, 1321546),
(45645, 'concentrado', 'Completo', 4, 1225644),
(55544, 'sectupez', 'Engorde', 2, 7895421);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `ID_Compra` int(20) NOT NULL,
  `Fecha_Compra` date NOT NULL,
  `Precio` decimal(20,0) NOT NULL,
  `Cantidad_kg` decimal(20,0) NOT NULL,
  `Total_Compra` decimal(20,0) NOT NULL,
  `ID_Pez` int(20) NOT NULL,
  `ID_Estanque` int(20) NOT NULL,
  `ID_Consumidor` int(20) NOT NULL,
  `ID_Empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`ID_Compra`, `Fecha_Compra`, `Precio`, `Cantidad_kg`, `Total_Compra`, `ID_Pez`, `ID_Estanque`, `ID_Consumidor`, `ID_Empleado`) VALUES
(6, '2022-12-14', '2000', '10', '20000', 2, 2, 213124, 2),
(7, '2022-12-13', '3000', '7', '21000', 1, 3, 123456789, 2);

--
-- Disparadores `compra`
--
DELIMITER $$
CREATE TRIGGER `historial_compra` BEFORE DELETE ON `compra` FOR EACH ROW BEGIN
        INSERT INTO historialcom(fecha_eliminacion, ID_Compra, Fecha_Compra, Precio, Cantidad_kg, Total_Compra, ID_Pez, ID_Estanque, ID_Consumidor, ID_Empleado)
        VALUES
        ( NOW(), old.ID_Compra, old.Fecha_Compra, old.Precio, old.Cantidad_kg, old.Total_Compra, old.ID_Pez, old.ID_Estanque, old.ID_Consumidor, old.ID_Empleado);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumidor`
--

CREATE TABLE `consumidor` (
  `ID_Consumidor` int(20) NOT NULL,
  `Edad` int(20) NOT NULL,
  `Dirección` varchar(20) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Teléfono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consumidor`
--

INSERT INTO `consumidor` (`ID_Consumidor`, `Edad`, `Dirección`, `Nombre`, `Teléfono`) VALUES
(123, 12, 'call 23 # 4', 'pedro', '232354'),
(213124, 23, 'calle 23 # 23', 'lobos', '1234324'),
(1321546, 33, 'calle 23 # 26', 'felipe ', '42362623'),
(2131244, 23, 'barrio calzada', 'luis andres servante', '123432423'),
(123456789, 28, 'cra 13 n 23', 'Jesus Antenio', '32165498'),
(154789656, 57, 'san miguelo calle 20', 'Rodrigo Perez', '3125487935'),
(198765432, 21, 'transversal', 'Karina Marta', '15546755'),
(1234567987, 26, 'calle 13 san jose', 'Margarita Ramirez', '654987212');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ID_Empleado` int(111) NOT NULL,
  `Area` varchar(111) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Telefono` varchar(111) NOT NULL,
  `Dirección` varchar(111) NOT NULL,
  `Nombre` varchar(111) NOT NULL,
  `Sexo` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ID_Empleado`, `Area`, `Edad`, `Telefono`, `Dirección`, `Nombre`, `Sexo`) VALUES
(2, 'mantenimiento3', 20, '12345678111', 'barrio la esperanz', 'gabriela rivero', 'mujer'),
(3, 'mantenimiento', 34, '3216554999', 'san jacinto', 'Juan Montañez', 'hombre'),
(4, 'alimentos', 28, '32165447748', 'el triunfo', 'juana montana', 'Mujer'),
(21, 'mantenimiento', 12, '123124215', 'calle 23 # 23', 'pedro', 'masculino'),
(2342, 'Ventas1', 33, '45236567', 'barrio calzada nueva', 'Jesus Antenio perez', 'masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estanque`
--

CREATE TABLE `estanque` (
  `ID_Estanque` int(11) NOT NULL,
  `Profundidad` decimal(11,0) NOT NULL,
  `Longitud` decimal(11,0) NOT NULL,
  `Capacidad` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estanque`
--

INSERT INTO `estanque` (`ID_Estanque`, `Profundidad`, `Longitud`, `Capacidad`) VALUES
(1, '15', '25', 7000),
(2, '20', '30', 10000),
(3, '20', '25', 8000),
(4, '5', '15', 5000),
(5, '6', '17', 9000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialcom`
--

CREATE TABLE `historialcom` (
  `fecha_eliminacion` datetime NOT NULL,
  `ID_Compra` int(20) NOT NULL,
  `Fecha_Compra` date NOT NULL,
  `Precio` decimal(20,0) NOT NULL,
  `Cantidad_kg` decimal(20,0) NOT NULL,
  `Total_Compra` decimal(20,0) NOT NULL,
  `ID_Pez` int(11) NOT NULL,
  `ID_Estanque` int(11) NOT NULL,
  `ID_Consumidor` int(11) NOT NULL,
  `ID_Empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `historialcom`
--

INSERT INTO `historialcom` (`fecha_eliminacion`, `ID_Compra`, `Fecha_Compra`, `Precio`, `Cantidad_kg`, `Total_Compra`, `ID_Pez`, `ID_Estanque`, `ID_Consumidor`, `ID_Empleado`) VALUES
('2022-12-19 16:09:13', 8, '2022-12-02', '2000', '4', '8000', 1, 3, 123456789, 3);

--
-- Disparadores `historialcom`
--
DELIMITER $$
CREATE TRIGGER `Recuperar` BEFORE DELETE ON `historialcom` FOR EACH ROW BEGIN
        INSERT INTO compra(ID_Compra, Fecha_Compra, Precio, Cantidad_kg, Total_Compra, ID_Pez, ID_Estanque, ID_Consumidor, ID_Empleado)
        VALUES
        (old.ID_Compra, old.Fecha_Compra, old.Precio, old.Cantidad_kg, old.Total_Compra, old.ID_Pez, old.ID_Estanque, old.ID_Consumidor, old.ID_Empleado);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantiene`
--

CREATE TABLE `mantiene` (
  `codManteni` int(11) NOT NULL,
  `Fecha_Mantenimiento` date DEFAULT NULL,
  `ID_Empleado` int(11) NOT NULL,
  `ID_Estanque` int(11) NOT NULL,
  `ID_Pez` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mantiene`
--

INSERT INTO `mantiene` (`codManteni`, `Fecha_Mantenimiento`, `ID_Empleado`, `ID_Estanque`, `ID_Pez`) VALUES
(12, '2022-12-20', 2, 2, 2),
(13, '2022-12-07', 3, 2, 2),
(14, '2022-12-30', 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pez`
--

CREATE TABLE `pez` (
  `ID_Pez` int(11) NOT NULL,
  `Peso` int(11) NOT NULL,
  `Tipo` varchar(11) NOT NULL,
  `Talla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pez`
--

INSERT INTO `pez` (`ID_Pez`, `Peso`, `Tipo`, `Talla`) VALUES
(1, 28, 'mendoz', 23),
(2, 5, 'cachama', 28),
(3, 2, 'bocachico', 15),
(4, 5, 'salmon', 18),
(5, 10, 'mojarra roj', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `ID_Proveedor` int(111) NOT NULL,
  `Correo` varchar(111) NOT NULL,
  `Nombre` varchar(111) NOT NULL,
  `Dirección` varchar(111) NOT NULL,
  `Teléfono` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`ID_Proveedor`, `Correo`, `Nombre`, `Dirección`, `Teléfono`) VALUES
(1225644, 'provedor12@gmail.com', 'claudio  vega', 'Cll 13 cra ', '1234324'),
(1321546, 'proveedor2@gmail.com', 'Juan carmona', 'Avenida 5ta', '5558885'),
(5784521, 'propez@gmail.com', 'Eliana Gomez', 'Cll 45 th 12', '55842135'),
(7895421, 'alimentos123@gmail.com', 'Hernando Perez', 'crr 34 N 25', '123456453');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `siembra`
--

CREATE TABLE `siembra` (
  `Fecha_Siembra` date NOT NULL,
  `ID_Estanque` int(11) NOT NULL,
  `ID_Pez` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `siembra`
--

INSERT INTO `siembra` (`Fecha_Siembra`, `ID_Estanque`, `ID_Pez`) VALUES
('2022-06-23', 1, 3),
('2022-06-28', 4, 4),
('2022-06-30', 5, 1),
('2022-07-14', 3, 3),
('2022-08-18', 3, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentación`
--
ALTER TABLE `alimentación`
  ADD PRIMARY KEY (`CodAlimentacion`),
  ADD KEY `ID_Estanque` (`ID_Estanque`),
  ADD KEY `ID_Alimento` (`ID_Alimento`),
  ADD KEY `ID_Pez` (`ID_Pez`);

--
-- Indices de la tabla `alimento`
--
ALTER TABLE `alimento`
  ADD PRIMARY KEY (`ID_Alimento`),
  ADD KEY `ID_Proveedor` (`ID_Proveedor`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`ID_Compra`),
  ADD KEY `ID_Pez` (`ID_Pez`),
  ADD KEY `ID_Estanque` (`ID_Estanque`),
  ADD KEY `ID_CompraSemilla` (`ID_Consumidor`);

--
-- Indices de la tabla `consumidor`
--
ALTER TABLE `consumidor`
  ADD PRIMARY KEY (`ID_Consumidor`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ID_Empleado`);

--
-- Indices de la tabla `estanque`
--
ALTER TABLE `estanque`
  ADD PRIMARY KEY (`ID_Estanque`);

--
-- Indices de la tabla `mantiene`
--
ALTER TABLE `mantiene`
  ADD PRIMARY KEY (`codManteni`),
  ADD KEY `ID_Estanque` (`ID_Estanque`),
  ADD KEY `ID_Pez` (`ID_Pez`),
  ADD KEY `ID_Empleado` (`ID_Empleado`);

--
-- Indices de la tabla `pez`
--
ALTER TABLE `pez`
  ADD PRIMARY KEY (`ID_Pez`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`ID_Proveedor`);

--
-- Indices de la tabla `siembra`
--
ALTER TABLE `siembra`
  ADD PRIMARY KEY (`Fecha_Siembra`),
  ADD KEY `ID_Peces` (`ID_Estanque`),
  ADD KEY `ID_Pez` (`ID_Pez`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimentación`
--
ALTER TABLE `alimentación`
  MODIFY `CodAlimentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `ID_Compra` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `mantiene`
--
ALTER TABLE `mantiene`
  MODIFY `codManteni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alimentación`
--
ALTER TABLE `alimentación`
  ADD CONSTRAINT `alimentación_ibfk_1` FOREIGN KEY (`ID_Alimento`) REFERENCES `alimento` (`ID_Alimento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alimentación_ibfk_2` FOREIGN KEY (`ID_Pez`) REFERENCES `pez` (`ID_Pez`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alimentación_ibfk_3` FOREIGN KEY (`ID_Estanque`) REFERENCES `estanque` (`ID_Estanque`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `alimento`
--
ALTER TABLE `alimento`
  ADD CONSTRAINT `alimento_ibfk_1` FOREIGN KEY (`ID_Proveedor`) REFERENCES `proveedor` (`ID_Proveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`ID_Estanque`) REFERENCES `estanque` (`ID_Estanque`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`ID_Pez`) REFERENCES `pez` (`ID_Pez`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantiene`
--
ALTER TABLE `mantiene`
  ADD CONSTRAINT `mantiene_ibfk_1` FOREIGN KEY (`ID_Empleado`) REFERENCES `empleado` (`ID_Empleado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mantiene_ibfk_2` FOREIGN KEY (`ID_Estanque`) REFERENCES `estanque` (`ID_Estanque`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mantiene_ibfk_3` FOREIGN KEY (`ID_Pez`) REFERENCES `pez` (`ID_Pez`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `siembra`
--
ALTER TABLE `siembra`
  ADD CONSTRAINT `siembra_ibfk_1` FOREIGN KEY (`ID_Pez`) REFERENCES `pez` (`ID_Pez`) ON UPDATE CASCADE,
  ADD CONSTRAINT `siembra_ibfk_2` FOREIGN KEY (`ID_Estanque`) REFERENCES `estanque` (`ID_Estanque`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

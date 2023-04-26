-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2023 a las 03:39:15
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_process`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `title2` varchar(50) DEFAULT NULL,
  `title3` varchar(50) DEFAULT NULL,
  `title4` varchar(50) DEFAULT NULL,
  `body` text NOT NULL,
  `url` varchar(150) NOT NULL,
  `class` varchar(45) NOT NULL DEFAULT 'event-important',
  `start` varchar(15) NOT NULL,
  `end` varchar(15) NOT NULL,
  `inicio_normal` varchar(50) NOT NULL,
  `final_normal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda2`
--

CREATE TABLE `agenda2` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `title2` varchar(50) DEFAULT NULL,
  `title3` varchar(50) DEFAULT NULL,
  `title4` varchar(50) DEFAULT NULL,
  `title5` varchar(30) DEFAULT NULL,
  `title6` varchar(30) DEFAULT NULL,
  `title7` varchar(30) DEFAULT NULL,
  `title8` varchar(30) DEFAULT NULL,
  `title9` varchar(30) DEFAULT NULL,
  `title10` varchar(30) DEFAULT NULL,
  `title11` varchar(30) DEFAULT NULL,
  `title12` varchar(30) DEFAULT NULL,
  `title13` varchar(30) DEFAULT NULL,
  `title14` varchar(30) DEFAULT NULL,
  `body` text NOT NULL,
  `url` varchar(150) NOT NULL,
  `class` varchar(45) NOT NULL DEFAULT 'event-important',
  `start` varchar(15) NOT NULL,
  `end` varchar(15) NOT NULL,
  `inicio_normal` varchar(50) NOT NULL,
  `final_normal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observations`
--

CREATE TABLE `observations` (
  `id` int(11) NOT NULL,
  `shift` int(11) NOT NULL,
  `lot_number` int(11) NOT NULL,
  `observation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `observations`
--

INSERT INTO `observations` (`id`, `shift`, `lot_number`, `observation`) VALUES
(1, 1, 123, 'Se considera como continente a una gran extensiÃ³n de tierra que se diferencia de otras menores o sumergidas por conceptos geogrÃ¡ficos, como son los ocÃ©anos; culturales, como la etnografÃ­a; y la historia de cada uno.\r\n\r\nLa divisiÃ³n de la Tierra en continentes es convencional, y suelen reconocerse seis1â€‹ 2â€‹ continentes; por ejemplo, una divisiÃ³n en seis continentes suele ser: Asia, AntÃ¡rtida, Europa, Ãfrica, OceanÃ­a y AmÃ©rica, aunque hay muchas clasificaciones que separan AmÃ©rica en AmÃ©rica del Norte, America Central y AmÃ©rica del Sur\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problems_process`
--

CREATE TABLE `problems_process` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(30) NOT NULL,
  `valor` varchar(20) DEFAULT NULL,
  `problem` text NOT NULL,
  `color` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `problems_process`
--

INSERT INTO `problems_process` (`id`, `usuario`, `fecha`, `hora`, `valor`, `problem`, `color`) VALUES
(1, 1, '2023-04-20', '02:04:45 PM', '', 'dfgfsfdgsdf', 'green'),
(2, 1, '2023-04-20', '02:05:03 PM', '', 'okok', 'green'),
(3, 3, '2023-04-20', '02:29:13 PM', '', 'xzc<fdsfads', 'green'),
(4, 3, '2023-04-20', '02:45:42 PM', '', 'AAAAA BBBB', 'green'),
(5, 3, '2023-04-20', '02:56:00 PM', '', 'qwert', 'green'),
(6, 3, '2023-04-20', '02:59:30 PM', '', 'VISUAL INSPECTION', 'green'),
(7, 3, '2023-04-20', '02:59:43 PM', '', 'DsdfSDFADSA', 'green'),
(8, 3, '2023-04-20', '03:00:47 PM', '', 'qqqwwweeerrr', 'green'),
(9, 3, '2023-04-20', '03:04:04 PM', '', 'wwwwww', 'green'),
(10, 3, '2023-04-20', '03:07:17 PM', '', 'ASDF', 'green'),
(11, 3, '2023-04-20', '03:07:34 PM', '', 'XSSASDsad', 'green'),
(12, 3, '2023-04-20', '03:26:35 PM', '', 'AAAAAA', 'green'),
(13, 3, '2023-04-20', '03:28:44 PM', '', 'aaaaaa', 'green');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `process`
--

CREATE TABLE `process` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `lot_number` int(11) NOT NULL,
  `pick_list` varchar(50) NOT NULL,
  `warehouse` varchar(50) NOT NULL,
  `material_stage` varchar(50) NOT NULL,
  `room_clearence` varchar(30) NOT NULL,
  `balance_weight` varchar(50) NOT NULL,
  `visual_inspection` varchar(50) NOT NULL,
  `set_up_line` varchar(30) NOT NULL,
  `sub_divide` varchar(30) NOT NULL,
  `start_up_gravimetrics` varchar(30) NOT NULL,
  `challenges` varchar(30) NOT NULL,
  `first_blister` varchar(30) NOT NULL,
  `counter` varchar(30) NOT NULL,
  `total_blister_in_shippers` varchar(30) NOT NULL,
  `reserve_release_samples` varchar(30) NOT NULL,
  `target_weight` varchar(30) NOT NULL,
  `qc_sample` varchar(50) DEFAULT NULL,
  `production_yield` varchar(50) DEFAULT NULL,
  `process_yield` varchar(50) DEFAULT NULL,
  `end_date` date NOT NULL,
  `saved` varchar(5) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `process`
--

INSERT INTO `process` (`id`, `start_date`, `lot_number`, `pick_list`, `warehouse`, `material_stage`, `room_clearence`, `balance_weight`, `visual_inspection`, `set_up_line`, `sub_divide`, `start_up_gravimetrics`, `challenges`, `first_blister`, `counter`, `total_blister_in_shippers`, `reserve_release_samples`, `target_weight`, `qc_sample`, `production_yield`, `process_yield`, `end_date`, `saved`) VALUES
(1, '2023-04-20', 123, '13', '2', '3', '4', '5', '6', '7', '8', '9', '11', '12', '', '', '', '', NULL, NULL, NULL, '0000-00-00', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `lot_number` int(11) NOT NULL,
  `container` varchar(30) DEFAULT NULL,
  `end_counter` varchar(30) DEFAULT NULL,
  `blisters_shippers_shift_end` varchar(50) DEFAULT NULL,
  `filler_counter_shift_end` varchar(50) DEFAULT NULL,
  `filler_counter_rejects` varchar(50) DEFAULT NULL,
  `unprinted_blisters_in_pcf` varchar(50) DEFAULT NULL,
  `printed_blisters_in_pcf` varchar(50) DEFAULT NULL,
  `shift_lenght` varchar(50) DEFAULT NULL,
  `gravimetrics_1000U` varchar(50) DEFAULT NULL,
  `frit_change` varchar(50) DEFAULT NULL,
  `cell_1` int(4) NOT NULL,
  `p_cell_1` varchar(250) DEFAULT NULL,
  `cell_2` int(4) NOT NULL,
  `p_cell_2` varchar(250) DEFAULT NULL,
  `cell_3` int(4) NOT NULL,
  `p_cell_3` varchar(250) DEFAULT NULL,
  `cell_4` int(4) NOT NULL,
  `p_cell_4` varchar(250) DEFAULT NULL,
  `cell_5` int(4) NOT NULL,
  `p_cell_5` varchar(250) DEFAULT NULL,
  `cell_6` int(4) NOT NULL,
  `p_cell_6` varchar(250) DEFAULT NULL,
  `cell_7` int(4) NOT NULL,
  `p_cell_7` varchar(250) DEFAULT NULL,
  `klockner` int(4) NOT NULL,
  `p_klockner` varchar(250) DEFAULT NULL,
  `printer` int(4) NOT NULL,
  `p_printer` varchar(250) NOT NULL,
  `leak_test` int(4) NOT NULL,
  `p_leak_test` varchar(250) DEFAULT NULL,
  `unplanned_other` int(4) NOT NULL,
  `p_unplanned_other` varchar(250) NOT NULL,
  `fecha` date DEFAULT NULL,
  `saved` varchar(5) DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `shift`, `lot_number`, `container`, `end_counter`, `blisters_shippers_shift_end`, `filler_counter_shift_end`, `filler_counter_rejects`, `unprinted_blisters_in_pcf`, `printed_blisters_in_pcf`, `shift_lenght`, `gravimetrics_1000U`, `frit_change`, `cell_1`, `p_cell_1`, `cell_2`, `p_cell_2`, `cell_3`, `p_cell_3`, `cell_4`, `p_cell_4`, `cell_5`, `p_cell_5`, `cell_6`, `p_cell_6`, `cell_7`, `p_cell_7`, `klockner`, `p_klockner`, `printer`, `p_printer`, `leak_test`, `p_leak_test`, `unplanned_other`, `p_unplanned_other`, `fecha`, `saved`) VALUES
(1, '1', 123, '', 'mateo', 'Blisters Shippers Shift End	', 'Filler Counter Shift End	', 'Filler Counter Rejects	', 'Unprinted Blisters in PCF	', 'Printed Blisters in PCF	', 'Shift Lenght	', 'Gravimetrics / 1000U	', 'Frit Change	', 10, 'diez dsfad fad fkadsjhf adkjfh adlkjf ah lkfjahdljfh dlkfjhadd fakjdh falkdjfh llakjdshfa', 20, 'veinte', 30, 'treinta', 40, 'cuarenta', 50, 'cincuenta', 60, 'sesenta', 70, 'setenta', 1, 'uno', 2, 'dos', 3, 'tres', 4, 'cuatro', NULL, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `usuario` text DEFAULT NULL,
  `pass` text DEFAULT NULL,
  `levelPerfil` text DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `usuario`, `pass`, `levelPerfil`, `email`) VALUES
(1, 'Edisson', 'edisson', '$2a$07$asxx54ahjppf45sd87a5auBl/E5Tz8zmcWSS7D7RL4w6Qd7NLlv0a', 'supervisor', 'edisson@gmail.com'),
(2, 'Oluas', 'oluas', '$2a$07$asxx54ahjppf45sd87a5auHvFr5gBgd2/eQfaiDGmKb9LSF0KDvpy', 'operator', 'oluas@gmail.com'),
(3, 'Mateo', 'mateo', '$2a$07$asxx54ahjppf45sd87a5auNR./2oVGYsoNSoqr.aBRcy0B6D.5WJ.', 'administrator', 'mateo@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inicio_normal` (`inicio_normal`),
  ADD UNIQUE KEY `final_normal` (`final_normal`);

--
-- Indices de la tabla `agenda2`
--
ALTER TABLE `agenda2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inicio_normal` (`inicio_normal`),
  ADD UNIQUE KEY `final_normal` (`final_normal`);

--
-- Indices de la tabla `observations`
--
ALTER TABLE `observations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `problems_process`
--
ALTER TABLE `problems_process`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lot_number` (`lot_number`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
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
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `agenda2`
--
ALTER TABLE `agenda2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `observations`
--
ALTER TABLE `observations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `problems_process`
--
ALTER TABLE `problems_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `process`
--
ALTER TABLE `process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

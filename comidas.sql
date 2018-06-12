-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2018 a las 13:12:57
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comidas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificacioningrediente`
--

CREATE TABLE `especificacioningrediente` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `especificacioningrediente`
--

INSERT INTO `especificacioningrediente` (`id`, `nombre`) VALUES
(1, 'Calabacines'),
(2, 'Puerros'),
(3, 'Arroz'),
(4, 'Brócoli'),
(5, 'Zanahoria'),
(6, 'Nabo'),
(7, 'Lenteja Negra'),
(8, 'Queso Rayado'),
(9, 'Tomates deshidratados en aceite'),
(10, 'Aceite de oliva virgen extra'),
(11, 'Sal'),
(12, 'Pimienta'),
(36, 'Tomates Maduros'),
(37, 'Raspas de Anchoa'),
(38, 'Filetes de boquerón'),
(39, 'Rebanadas de pan integral'),
(40, 'Dientes de ajo'),
(41, 'Harina de Garbanzo'),
(42, 'Sal Marina'),
(43, 'Albahaca'),
(44, 'Perejil'),
(45, 'Aceite de oliva'),
(59, 'arroz bomba'),
(60, 'Langostino'),
(61, 'Cebolla'),
(62, 'Dientes de Ajo'),
(63, 'Ajos frescos'),
(64, 'Pimiento verde'),
(65, 'Pimiento rojo'),
(66, 'Brandy'),
(67, 'Salsa de tomate'),
(68, 'Caldo de paella'),
(69, 'Aceite de oliva'),
(70, 'Sal'),
(71, 'Perejil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

CREATE TABLE `ingrediente` (
  `id` int(11) UNSIGNED NOT NULL,
  `cantidad` double DEFAULT NULL,
  `unidades` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receta_id` int(11) UNSIGNED DEFAULT NULL,
  `especificacioningrediente_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ingrediente`
--

INSERT INTO `ingrediente` (`id`, `cantidad`, `unidades`, `receta_id`, `especificacioningrediente_id`) VALUES
(1, 2, 'Unidades', 1, 1),
(2, 2, 'Unidades', 1, 2),
(3, 25, 'Gramos', 1, 3),
(4, 150, 'Gramos', 1, 4),
(5, 1, 'Unidades', 1, 5),
(6, 1, 'Unidades', 1, 6),
(7, 70, 'Gramos', 1, 7),
(8, 100, 'Gramos', 1, 8),
(9, 4, 'Unidades', 1, 9),
(10, 1, 'Unidades', 1, 10),
(11, 1, 'Unidades', 1, 11),
(12, 1, 'Unidades', 1, 12),
(36, 0.5, 'Kilos', 2, 36),
(37, 6, 'Unidades', 2, 37),
(38, 4, 'Unidades', 2, 38),
(39, 2, 'Unidades', 2, 39),
(40, 2, 'Unidades', 2, 40),
(41, 1, 'Unidades', 2, 41),
(42, 1, 'Unidades', 2, 42),
(43, 1, 'Unidades', 2, 43),
(44, 1, 'Unidades', 2, 44),
(45, 1, 'Unidades', 2, 45),
(59, 360, 'Gramos', 3, 59),
(60, 600, 'Gramos', 3, 60),
(61, 1, 'Unidades', 3, 61),
(62, 2, 'Unidades', 3, 62),
(63, 12, 'Unidades', 3, 63),
(64, 1, 'Unidades', 3, 64),
(65, 0.5, 'Unidades', 3, 65),
(66, 100, 'Mililitros', 3, 66),
(67, 200, 'Mililitros', 3, 67),
(68, 2, 'Litros', 3, 68),
(69, 1, 'Unidades', 3, 69),
(70, 1, 'Unidades', 3, 70),
(71, 1, 'Unidades', 3, 71);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preparacion` text COLLATE utf8mb4_unicode_ci,
  `numpersonas` int(11) UNSIGNED DEFAULT NULL,
  `categoria` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dificultad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urlimagen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`id`, `nombre`, `preparacion`, `numpersonas`, `categoria`, `dificultad`, `urlimagen`, `usuario_id`) VALUES
(1, 'Calabacín con tejas de tomate y queso', 'Limpia los puerros, pica y ponlos a rehogar a una cazuela con un chorrito de aceite. Pela los calabacines, pica y añádelos a la cazuela. Sazona y rehoga la verdura.Añade el arroz, vierte abundante agua y cuece todo conjuntamente. Salpimienta y tritura. En el momento de servir, calienta la crema.Pon las lentejas en un cazo, cúbrelas con agua, sazona y cuécelas. Escurre y resérvalas.Pela la zanahoria y el nabo y córtalos en daditos. Suelta el brócoli en florecillas. Cocina toda la verdura al vapor. Sazona.Ralla el queso y pica los tomates en daditos. Mezcla los ingredientes en un bol. Cubre una bandeja de horno con papel de hornear y extiende encima la mezcla. Cúbrela con otro papel de hornear y otra placa de horno. Introduce en el horno. Con ayuda de unas tijeras, córtalo en porciones.', 6, 'sopas', 'facil', 'fotos/a@a.com/crema-calabacin-vertical-XxXx80.jpg', 1),
(2, 'Receta de Salmorejo con raspas fritas', 'Haz unos cortes en forma de cruz en la base de los tomates para que se puedan pelar más fácil. Escalda los tomatesen agua hirviendo. Refréscalos en agua fría y quítales la piel. Trocéalos y despepítalos. Introdúcelos en un vaso batidor con una pizca de sal y un trocito de ajo. Bate y ve añadiendo aceite de oliva mientras sigues batiendo hasta obtener el salmorejo.Mezcla la harina de garbanzo con un puñadito de perejil picado, un ajo picadito y una pizca de sal marina. Reboza las raspas en la mezcla y fríelas en aceite de oliva hasta que queden crujientes. Escúrrelas en papel absorbente.Tuesta las rebanadas de pan. Coloca encima los filetes de boquerón, riégalos con un poco de salmorejo y decora con una hojita de albahaca.Vierte una ración de salmorejo en una copa. Decórala con unas raspas fritas y una hojita de albahaca. Acompaña con una tostada de boquerón.', 2, 'sopas', 'facil', 'fotos/a@a.com/salmorejo-raspas-vertical-XxXx80.jpg', 1),
(3, 'Receta de Arroz caldoso con langostinos', 'Pela la cebolleta y el pimiento rojo. Pica la cebolleta, los pimientos (rojo y verde) en daditos y los ajos frescos en cilindros. Pon todo a pochar en una tartera con un chorrito de aceite. Sazona.\r\n\r\nCuando las verduras estén pochadas, agrega el arroz a la verduras y rehógalo un poco. Vierte la salsa de tomate y 1 litro del caldo para paella. Según vaya pasando el tiempo remueve el arroz y vete añadiendo el otro litro de caldo para paella. Cocina el arroz durante 25 minutos.\r\n\r\nPela los langostinos y córtalos por la mitad dejándolos unidos por la cola. Sazona. Pela y pica los ajos en láminas y dóralos en una sartén con aceite a fuego fuerte. Agrega los langostinos y saltéalos brevemente. Vierte el brandy y flambea. Añade el jugo que ha soltado a la tartera del arroz y mezcla bien. Coloca los langostinos sobre el arroz y decora con una ramita de perejil. Sirve.', 4, 'pastas', 'medio', 'fotos/editor@gmail.com/arroz-caldoso-vertical-XxXx80.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) UNSIGNED NOT NULL,
  `apenom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` int(11) UNSIGNED DEFAULT NULL,
  `pass` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urlimagen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) UNSIGNED DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `apenom`, `email`, `telefono`, `pass`, `urlimagen`, `rol`, `status`, `token`) VALUES
(1, 'David Martin', 'a@a.com', 916681024, '25f9e794323b453885f5181f1b624d0b', 'fotos/a@a.com/perfil.png', 'user', 1, '3534fab444a2eea0136d60dd1029f3c6'),
(2, 'Administrador', 'admin@gmail.com', 987654321, '25f9e794323b453885f5181f1b624d0b', 'assets/img/avatar.png', 'admin', 1, '96d599de85ea74678d4ff33b756ab4aa'),
(3, 'Editor', 'editor@gmail.com', 932165487, '25f9e794323b453885f5181f1b624d0b', 'assets/img/avatar.png', 'editor', 1, '05c68b5d9ae8669c22da7ce5f6c411c5'),
(4, 'Pepe Pérez', 'b@b.com', 916680338, '25f9e794323b453885f5181f1b624d0b', 'fotos/b@b.com/perfil.jpg', 'user', 1, 'ae95286cb3fcbbac842ae97ffbc95064');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `id` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puntuacion` int(11) UNSIGNED DEFAULT NULL,
  `receta_id` int(11) UNSIGNED DEFAULT NULL,
  `usuario_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`id`, `titulo`, `descripcion`, `puntuacion`, `receta_id`, `usuario_id`) VALUES
(1, 'no', 'no', 3, 1, 3),
(2, 'no', 'no', 5, 3, 3),
(3, 'Buena receta', 'He hecho la receta y me ha gustado mucho.', 3, 1, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especificacioningrediente`
--
ALTER TABLE `especificacioningrediente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_ingrediente_receta` (`receta_id`),
  ADD KEY `index_foreignkey_ingrediente_especificacioningrediente` (`especificacioningrediente_id`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_receta_usuario` (`usuario_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_valoracion_receta` (`receta_id`),
  ADD KEY `index_foreignkey_valoracion_usuario` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especificacioningrediente`
--
ALTER TABLE `especificacioningrediente`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD CONSTRAINT `c_fk_ingrediente_especificacioningrediente_id` FOREIGN KEY (`especificacioningrediente_id`) REFERENCES `especificacioningrediente` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_ingrediente_receta_id` FOREIGN KEY (`receta_id`) REFERENCES `receta` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `c_fk_receta_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `c_fk_valoracion_receta_id` FOREIGN KEY (`receta_id`) REFERENCES `receta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c_fk_valoracion_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

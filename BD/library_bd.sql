-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2018 a las 00:08:06
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `library_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name_author` varchar(30) COLLATE utf8_bin NOT NULL,
  `first_surname` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `authors`
--

INSERT INTO `authors` (`id`, `name_author`, `first_surname`) VALUES
(1, 'Joanne ', 'Rowling'),
(2, 'George', 'Orwell'),
(3, 'Suzzane', 'Collins'),
(4, 'Stephen', 'Hawking'),
(5, 'Stephen ', 'King'),
(6, 'Miguel', 'Cervantes'),
(7, 'Peter', 'James');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `isbn` varchar(13) COLLATE utf8_bin NOT NULL,
  `name_book` varchar(200) COLLATE utf8_bin NOT NULL,
  `category` varchar(200) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id`, `isbn`, `name_book`, `category`, `description`, `author_id`) VALUES
(1, '978140884564', 'Harry Potter and the Philosoph', 'Science Fiction & Fantasy', '231', 1),
(3, '9781408845653', 'Harry Potter and the Chamber o', 'Science Fiction & Fantasy', '272', 1),
(4, '9780452284234', 'Nineteen Eighty-Four', 'Science Fiction', '368', 2),
(5, '9781407132082', 'The Hunger Games', 'Science Fiction & Fantasy', '448', 3),
(6, '9781473695986', 'Brief Answers to the Big Questions', 'Science', '256', 4),
(7, '9781473676350', 'The Outsider', 'Action & Adventure', '496', 1),
(9, '9780307475411', 'Don Quijote de la Mancha', 'Classics', '1049', 6),
(10, '9782811200251', 'Possession', 'Horror', '250', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `borrow`
--

CREATE TABLE `borrow` (
  `id_copy_fk` int(11) NOT NULL,
  `id_book_copy_fk` int(11) NOT NULL,
  `id_username` int(11) NOT NULL,
  `takenDate` datetime DEFAULT NULL,
  `returnDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `copy`
--

CREATE TABLE `copy` (
  `id` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `copy`
--

INSERT INTO `copy` (`id`, `id_book`, `status`) VALUES
(1, 1, 'writting'),
(3, 3, 'poor condition'),
(4, 3, 'written'),
(5, 3, 'new'),
(6, 4, 'new'),
(9, 1, 'poor condition'),
(10, 4, 'poor condition'),
(11, 4, 'standard'),
(12, 1, 'new'),
(13, 9, 'new'),
(14, 9, 'failed'),
(15, 9, 'writting');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
  `code` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `takenDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`code`, `id_book`, `id_user`, `takenDate`) VALUES
(1, 1, 10, '2018-12-05'),
(2, 1, 10, '2019-07-01'),
(3, 1, 10, '2018-12-07'),
(4, 3, 9, '2018-12-13'),
(5, 4, 10, '2018-12-20'),
(6, 9, 10, '2019-07-01'),
(7, 9, 10, '2019-07-01'),
(8, 9, 10, '2019-07-01'),
(9, 9, 10, '2019-07-23'),
(10, 9, 10, '2019-07-23'),
(11, 9, 10, '2019-07-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `name_user` varchar(30) COLLATE utf8_bin NOT NULL,
  `first_surname` varchar(30) COLLATE utf8_bin NOT NULL,
  `second_surname` varchar(30) COLLATE utf8_bin NOT NULL,
  `dni` varchar(9) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `phone_number` varchar(9) COLLATE utf8_bin NOT NULL,
  `type_of_user` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name_user`, `first_surname`, `second_surname`, `dni`, `email`, `phone_number`, `type_of_user`) VALUES
(8, 'admin', '$2y$10$1.Qn32atWku45yFq6cs0sex8otEJ31IwbUI8xLVAOfK/zpjPAsuxu', 'admin', 'admin', 'admin', '41512839r', 'diangelo@hotmail.es', '648450548', 3),
(9, 'librarian', '$2y$10$ZtS6ebGbOBGkkKd0Z2LaNOHgVRyrZmgtWE8A0RhFUIfS7.465tRZ2', 'librarian', 'librarian', 'librarian', '888888x', 'moleromartinezangel@gmail.com', '648546', 2),
(10, 'client', '$2y$10$b2VFVAsneUNIENIxcuH6XephtyK1quyRLS2MZtU9pacxAa33FV7fG', 'Angel', 'Molero', 'Martinez', '44444444e', 'a@a.com', '5554456', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_isbn` (`isbn`),
  ADD KEY `fk_books_authors` (`author_id`);

--
-- Indices de la tabla `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id_copy_fk`,`id_book_copy_fk`,`id_username`),
  ADD KEY `fk_borrow_user` (`id_username`);

--
-- Indices de la tabla `copy`
--
ALTER TABLE `copy`
  ADD PRIMARY KEY (`id`,`id_book`),
  ADD KEY `fk_copy_books` (`id_book`);

--
-- Indices de la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`code`),
  ADD KEY `fk_reservation_book` (`id_book`),
  ADD KEY `fk_reservation_user` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_username` (`username`),
  ADD UNIQUE KEY `uq_email` (`email`),
  ADD UNIQUE KEY `uq_dni` (`dni`),
  ADD UNIQUE KEY `uq_phone` (`phone_number`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `copy`
--
ALTER TABLE `copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_books_authors` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `fk_borrow_copy` FOREIGN KEY (`id_copy_fk`,`id_book_copy_fk`) REFERENCES `copy` (`id`, `id_book`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_borrow_user` FOREIGN KEY (`id_username`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `copy`
--
ALTER TABLE `copy`
  ADD CONSTRAINT `fk_copy_books` FOREIGN KEY (`id_book`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_book` FOREIGN KEY (`id_book`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reservation_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

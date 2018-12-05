-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2018 a las 11:19:02
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

create database library_bd;


use library_bd;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
     `id` int(11) NOT NULL primary key auto_increment,
     `username` varchar(30) COLLATE utf8_bin NOT NULL,
     `password` varchar(255) COLLATE utf8_bin NOT NULL,
     `name_user` varchar(30) COLLATE utf8_bin NOT NULL,
     `first_surname` varchar(30) COLLATE utf8_bin NOT NULL,
     `second_surname` varchar(30) COLLATE utf8_bin NOT NULL,
     `dni` varchar(9) COLLATE utf8_bin NOT NULL,
     `email` varchar(50) COLLATE utf8_bin NOT NULL,
     `phone_number` varchar(9) COLLATE utf8_bin NOT NULL,
     `type_of_user` tinyint(4) NOT NULL DEFAULT '0',

     CONSTRAINT uq_username  UNIQUE(username),
     CONSTRAINT uq_email     UNIQUE(email),
     CONSTRAINT uq_dni       UNIQUE(dni),
     CONSTRAINT uq_phone     UNIQUE(phone_number)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name_user`, `first_surname`, `second_surname`, `dni`, `email`, `phone_number`, `type_of_user`) VALUES
(8, 'admin', '$2y$10$1.Qn32atWku45yFq6cs0sex8otEJ31IwbUI8xLVAOfK/zpjPAsuxu', 'admin', 'admin', 'admin', '41512839r', 'diangelo@hotmail.es', '648450548', 3),
(9, 'librarian', '$2y$10$ZtS6ebGbOBGkkKd0Z2LaNOHgVRyrZmgtWE8A0RhFUIfS7.465tRZ2', 'librarian', 'librarian', 'librarian', '888888x', 'moleromartinezangel@gmail.com', '64854', 2),
(10, 'client', '$2y$10$b2VFVAsneUNIENIxcuH6XephtyK1quyRLS2MZtU9pacxAa33FV7fG', 'Angel', 'Molero', 'Martinez', '44444444e', 'a@a.com', '555445', 1);
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `authors`
--

CREATE TABLE `authors` (
                         `id` int(11) NOT NULL primary key auto_increment,
                         `name_author` varchar(30) COLLATE utf8_bin NOT NULL,
                         `first_surname` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `authors`
--

INSERT INTO `authors` (`id`, `name_author`, `first_surname`) VALUES
(1, 'Joanne ', 'Rowling'),
(2, 'George', 'Orwell');



-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
       `id` int(11) NOT NULL auto_increment primary key,
       `isbn` varchar(13) COLLATE utf8_bin NOT NULL,
       `name_book` varchar(30) COLLATE utf8_bin NOT NULL,
       `category` varchar(20) COLLATE utf8_bin NOT NULL,
       `description` text COLLATE utf8_bin NOT NULL,
       `author_id` int(11) NOT NULL,
       CONSTRAINT uq_isbn       UNIQUE(isbn),
       CONSTRAINT `fk_books_authors` FOREIGN KEY (`author_id`) REFERENCES `Authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
/* CONSTRAINT `fk_books_category` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id`, `isbn`, `name_book`, `category`, `description`, `author_id`) VALUES
(null, '978140884564', 'Harry Potter and the Philosoph', 'Science Fiction & Fa', '231', 1),
(null, '9781408845653', 'Harry Potter and the Chamber o', 'Science Fiction & Fa', '272', 1),
(null, '9780452284234', 'Nineteen Eighty-Four', 'Science Fiction', '368', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `copy`
--

CREATE TABLE `copy` (
  `id` int(11) NOT NULL auto_increment,
  `id_book` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8_bin NOT NULL,
  primary key (id,id_book),
  CONSTRAINT `fk_copy_books` FOREIGN KEY (`id_book`) REFERENCES `Books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `copy`
--
/*
INSERT INTO `copy` (`id`, `id_book`, `status`) VALUES
(1, 1, 'available'),
(2, 1, 'available'),
(3, 1, 'available');*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
   code int  not null auto_increment primary key,
  `id_book` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `takenDate` date NOT NULL,
   CONSTRAINT `fk_reservation_book` FOREIGN KEY (`id_book`) REFERENCES `Books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT `fk_reservation_user` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `borrow`
--

CREATE TABLE `borrow` (
        `id_copy_fk` int(11) NOT NULL,
        `id_book_copy_fk` int(11) NOT NULL,
        `id_username` int(11) NOT NULL,
        `takenDate` datetime DEFAULT NULL,
        `returnDate` datetime DEFAULT NULL,
        primary key (id_copy_fk,id_book_copy_fk, id_username),
        CONSTRAINT `fk_borrow_user` FOREIGN KEY (`id_username`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        CONSTRAINT `fk_borrow_copy` FOREIGN KEY (`id_copy_fk`, `id_book_copy_fk`) REFERENCES `copy` (`id`, `id_book`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


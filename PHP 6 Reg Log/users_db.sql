-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 14 2024 г., 21:19
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `loginsystem`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users_db`
--

CREATE TABLE `users_db` (
  `id` int(11) NOT NULL,
  `first` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `gen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users_db`
--

INSERT INTO `users_db` (`id`, `first`, `last`, `uid`, `email`, `pass`, `gen`) VALUES
(1, 'Narek', 'Vardanyan', 'narek91', 'narjan8859@mail.ru', '$2y$10$Tn9.bgxrwvoV/UFOqKnL4e64V8fpuCPdn7Sf2bedWAGDfsi1bHRDm', 'male'),
(2, 'Varujik', 'Porikyan', 'xndzor999', 'varuj999@mail.ru', '$2y$10$dyeGaPRypMomjEg2BWmhEOQ.xwE.AQ5iRvq6MVGx9ojHRvEwHCj3K', 'male'),
(3, 'Armencho', 'Azizyan', 'matxash000', 'matxash@mail.ru', '$2y$10$NuC6xvGF4t6k/XHjVh5p8OutyScXeZBT/SM9gkIfn9j8.PKsbIXc2', 'male'),
(4, 'Gohar', 'Papoyan', 'Goharik999', 'gohar@mail.ru', '$2y$10$cg395jW7vbAFJkLvk87pZuODVkvU6vlO/YrTLlSf2G4nlImOr3qtC', 'female'),
(5, 'Sevak', 'Khanagyan', 'Sevik999', 'sevak@mail.ru', '$2y$10$BukLD6rGy9BIM/5zU03Yc.b.zlNmhsv3xDYaI9qqTqlhbVK4s.aB6', 'male'),
(7, 'kovik', 'kovikyan', 'bjoooooo55', 'bjo654654@mail.ru', '$2y$10$kA/imXUy7wrDprodyO.l7eZrensRKYz9SLZ6ELFn5.N9pZSynT782', 'animale');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users_db`
--
ALTER TABLE `users_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users_db`
--
ALTER TABLE `users_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

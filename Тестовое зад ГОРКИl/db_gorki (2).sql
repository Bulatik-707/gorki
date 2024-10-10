-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.2
-- Время создания: Окт 10 2024 г., 18:31
-- Версия сервера: 8.2.0
-- Версия PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_gorki`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brons`
--

CREATE TABLE `brons` (
  `id` int NOT NULL,
  `date_time_szapisi` datetime NOT NULL,
  `date_zaezda` date NOT NULL,
  `statys_broni` enum('Подтверждена','Не подтверждена','') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Не подтверждена',
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `brons`
--

INSERT INTO `brons` (`id`, `date_time_szapisi`, `date_zaezda`, `statys_broni`, `id_user`) VALUES
(11, '2024-10-09 18:23:20', '2024-09-30', 'Подтверждена', 8),
(13, '2024-10-09 19:39:40', '2024-10-09', 'Подтверждена', 10),
(14, '2024-10-09 19:39:46', '2024-10-09', 'Подтверждена', 10),
(17, '2024-10-10 07:50:15', '2024-10-08', 'Подтверждена', 10),
(19, '2024-10-10 08:50:14', '2024-09-26', 'Подтверждена', 11),
(20, '2024-10-10 10:37:26', '2024-10-10', 'Подтверждена', 10),
(21, '2024-10-10 10:41:46', '2024-10-24', 'Не подтверждена', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `cache`
--

CREATE TABLE `cache` (
  `id` int NOT NULL,
  `key` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_10_03_090246_create_users_table', 1),
(2, '2024_10_03_090400_create_brons_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `fio` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `fio`, `email`, `password`, `role`) VALUES
(8, 'Bulat', 'bula@gmail.com', '$2y$12$2D5PGqNezHfRQ6oZ9ahm9u.RW7vcobS4PyNJ.xJKm.OhvU6Tku0zG', 'user'),
(9, 'Admin', 'mail@mail.ru', '$2y$12$eiL7jCF1Q/VuHfvzLFiAUOVNN7GQ2Mk4.T6PjbY9Or.GkzaMWBkQ6', 'admin'),
(10, 'User Petay', 'user@mail.com', '$2y$12$mUb.9nDnYySqkAAhGuhuXOkTC0USFbgakphol/nfG.gCwQytZj1h6', 'user'),
(11, 'qwert', 'qwert@mail.com', '$2y$12$BoVP6PiY.Zow5GHnCarrue0FxczFMWI2SI3ZSNYzOedOoNGSCMREK', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brons`
--
ALTER TABLE `brons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brons`
--
ALTER TABLE `brons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `brons`
--
ALTER TABLE `brons`
  ADD CONSTRAINT `brons_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

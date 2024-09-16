-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 16 2024 г., 12:42
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `opros`
--

-- --------------------------------------------------------

--
-- Структура таблицы `anketa`
--

CREATE TABLE `anketa` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `anketa`
--

INSERT INTO `anketa` (`id`, `name`) VALUES
(1, 'опрос о кисломолочной продукции'),
(2, 'Опрос по Маугли');

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `anketa_id` int NOT NULL,
  `vopros_id` int NOT NULL,
  `otvet_id` int NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `anketa_id`, `vopros_id`, `otvet_id`, `text`) VALUES
(7, 1, 1, 2, 4, ''),
(8, 1, 1, 3, 6, ''),
(9, 1, 1, 5, 13, ''),
(10, 1, 1, 5, 14, ''),
(11, 1, 1, 5, 15, ''),
(12, 1, 1, 6, 18, 'введите текст'),
(13, 1, 2, 1, 2, ''),
(14, 1, 2, 6, 18, 'kjk'),
(15, 1, 1, 2, 4, ''),
(16, 1, 1, 3, 7, ''),
(17, 1, 1, 5, 13, ''),
(18, 1, 1, 5, 14, ''),
(19, 1, 1, 6, 18, 'asdf'),
(20, 1, 1, 2, 5, ''),
(21, 1, 1, 3, 7, ''),
(22, 1, 1, 5, 14, ''),
(23, 1, 1, 5, 15, ''),
(24, 1, 1, 6, 18, 'asdf');

-- --------------------------------------------------------

--
-- Структура таблицы `otvet`
--

CREATE TABLE `otvet` (
  `id` int NOT NULL,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vopros_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `otvet`
--

INSERT INTO `otvet` (`id`, `text`, `vopros_id`) VALUES
(1, 'маугли', 1),
(2, 'багира', 1),
(3, 'тобби', 1),
(4, 'Да', 2),
(5, 'Нет', 2),
(6, 'Один раз в неделю', 3),
(7, 'Два раза в неделю', 3),
(8, 'По необходимости', 3),
(9, 'Затрудняюсь ответить', 3),
(10, 'Один литр', 4),
(11, 'Два литра', 4),
(12, 'Другое колличество', 4),
(13, 'Молоко', 5),
(14, 'Кефир', 5),
(15, 'Сметана', 5),
(16, 'Творог', 5),
(17, 'Прочее', 5),
(18, 'введите текст', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admin` tinyint NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `admin`, `email`, `password`) VALUES
(1, '1', 1, '1@mail.ru', '1'),
(2, '2', 0, '2@mail.ru', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `vopros`
--

CREATE TABLE `vopros` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `vopros`
--

INSERT INTO `vopros` (`id`, `name`, `type`) VALUES
(1, 'кто победил шерхана', '1'),
(2, 'покупаете ли вы молоко и кисломолочную продукцию', '1'),
(3, 'Как часто вы покупаете молоко и кисломолочную продукцию', '1'),
(4, 'какое количество приобретаете за один раз', '1'),
(5, 'Какую товарную марку вы предпочитаете', '2'),
(6, 'Напишите ваше мнение.', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `Vopros_anketa`
--

CREATE TABLE `Vopros_anketa` (
  `anketa_id` int NOT NULL,
  `vopros_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Vopros_anketa`
--

INSERT INTO `Vopros_anketa` (`anketa_id`, `vopros_id`) VALUES
(2, 1),
(1, 2),
(1, 3),
(1, 5),
(1, 6),
(2, 6);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `otvet`
--
ALTER TABLE `otvet`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vopros`
--
ALTER TABLE `vopros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `otvet`
--
ALTER TABLE `otvet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `vopros`
--
ALTER TABLE `vopros`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

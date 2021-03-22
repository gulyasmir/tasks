-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 22 2021 г., 15:49
-- Версия сервера: 5.7.29
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phpmvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pr_task`
--

CREATE TABLE `pr_task` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'Имя пользователя',
  `email` varchar(255) DEFAULT NULL COMMENT 'email пользователя',
  `text` text NOT NULL COMMENT 'текст задачи',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'статус о выполнеии'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pr_task`
--

INSERT INTO `pr_task` (`id`, `name`, `email`, `text`, `status`) VALUES
(1, 'Задача 1', 'rrr@rambler.ru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aut, culpa distinctio earum eius est facere incidunt ipsum, minima molestias totam velit, voluptatem voluptatibus! Amet itaque nostrum quas quo totam?', 0),
(2, 'Задача 2', 'rr22r@rambler.ru', '999Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aut, culpa distinctio earum eius est facere incidunt ipsum, minima molestias totam velit, voluptatem voluptatibus! Amet itaque nostrum quas quo totam?', 0),
(3, 'Задача', 'rrr@rambler.ru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aut, culpa distinctio earum eius est facere incidunt ipsum, minima molestias totam velit, voluptatem voluptatibus! Amet itaque nostrum quas quo totam?', 1),
(19, 'Задача 19', '5y54y5@iiii.ti', 'Задача 19  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aut, culpa distinctio earum eius est facere incidunt ipsum, minima molestias totam velit, voluptatem voluptatibus! Amet itaque nostrum quas quo totam?', 0),
(80, 'Задача 80', 'tasktask@yandex.ru', 'Задача 80 Задача 80 Задача 80 Задача 80 Задача 80 Задача 80 Задача 80 Задача 80 Задача 80 Задача 80 Задача 80 Задача 80', 1),
(81, ';;o;', '5y54y5@iiii.ti', 'ufyulyilil fyfuilyu', 1),
(82, 'y45y5y 35y5yjrtyjryjy', '5y54y5@iiii.ti', '11111111111111', 0),
(83, 'Задача 1', 'rrr@rambler.ru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aut, culpa distinctio earum eius est facere incidunt ipsum, minima molestias totam velit, voluptatem voluptatibus! Amet itaque nostrum quas quo totam?', 0),
(84, 'y45y5y 35y5yjrtyjryjy', '5y54y5@iiii.ti', '66666666666666666', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `pr_user`
--

CREATE TABLE `pr_user` (
  `id` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pr_user`
--

INSERT INTO `pr_user` (`id`, `login`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pr_task`
--
ALTER TABLE `pr_task`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pr_user`
--
ALTER TABLE `pr_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pr_task`
--
ALTER TABLE `pr_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT для таблицы `pr_user`
--
ALTER TABLE `pr_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

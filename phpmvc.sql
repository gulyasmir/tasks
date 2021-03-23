-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 23 2021 г., 13:04
-- Версия сервера: 5.6.39-83.1
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cn07832_task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pr_task`
--

CREATE TABLE IF NOT EXISTS `pr_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT 'Имя пользователя',
  `email` varchar(255) DEFAULT NULL COMMENT 'email пользователя',
  `text` text NOT NULL COMMENT 'текст задачи',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'статус о выполнеии',
  `updated` int(1) DEFAULT '0' COMMENT 'отредактировано администратором',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pr_task`
--

INSERT INTO `pr_task` (`id`, `name`, `email`, `text`, `status`, `updated`) VALUES
(1, 'Вася', 'rrr@rambler.ru', 'С какой скоростью должен лететь снаряд массы 94 кг, чтобы при ударе с судном массы 64 т последнее получило скорость 33 см/с? Удар считать неупругим.', 1, 1),
(2, 'Ира', 'rr22r@rambler.ru', 'На рельсах стоит платформа весом 11 т. \r\nНа платформе закреплено орудие весом 7 т, из которого производится выстрел вдоль рельс, вес снаряда 21 кг, его начальная скорость относительно орудия равна 113 м/с. Определить скорость платформы в первый момент после выстрела, если до выстрела платформа была неподжвижна.', 0, 0),
(3, 'Юра', 'rrr@rambler.ru', 'Два груза массы 8 кг и m2=m1/2 соединены нитью, переброшенной через невесомый блок, и расположены над столом на высоте 1 метр. В начальный момент грузы покоятся, затем их отпускают. Какое количество теплоты выделится при ударе груза о стол? Удар считать абсолютно неупругим, а скорость после удара равной нулю.', 1, 0),
(19, 'Саша', '5y54y5@iiii.ti', 'На наклонной плоскости с углом наклона 13° находится тело, прикрепленное к нити, перекинутой через блок, а к другому концу нити прикреплено второе тело, висящее вертикально. Коэффициент трения между первым телом и плоскостью 0,07. Найти отношение масс второго тела к первому, при котором второе тело начнет подниматься. Трения в блоке нет.', 0, 0),
(80, 'Мистер Х', 'tasktask@yandex.ru', 'Задача 80 Задача 80 Задача 80 Задача 80 Задача 80 Задача 80 Задача 80 Задача 80 Задача 80 Задача 80 Задача 80 Задача 80', 1, 0),
(83, 'Лена', 'rrr@rambler.ru', 'На полу стоит тележка в виде длинной доски, снабженной легкими колесами. На одном конце доски стоит человек. Масса человека 84 кг, масса доски 13 кг. На какое расстояние передвинется тележка, если человек перейдет на другой конец тележки? Длина доски равна 2 м. Массой колес и трением пренебречь.', 0, 0),
(85, 'Дмитрий Евгеньевич ', 'gulyasmir@yand55ex.ru', 'С гладкой наклонной плоскости, составляющей угол 43 градусов с горизонтом, соскальзывает шарик с высоты 35м, в конце наклонной плоскости он упруго ударяется о горизонтальную плоскость. Найти максимальную высоту, на которую поднимется шарик после удара. Трение при скольжении не учитывать, а шарик считать материальной точкой.', 0, 0),
(86, 'Дмитрий Андреевич', 'dimandiman@yandex.ru', '&lt;div class=&quot;mb-3&quot;&gt;\r\n        &lt;label for=&quot;exampleFormControlInput3&quot; class=&quot;form-label&quot;&gt;Текст задачи&lt;/label&gt;\r\n        &lt;textarea name=&quot;text&quot; required class=&quot;form-control&quot; id=&quot;exampleFormControlInput3&quot; placeholder=&quot;Напишите текст задачи&quot;&gt;&lt;/textarea&gt;\r\n        &lt;div class=&quot;invalid-feedback&quot;&gt;\r\n            Пожалуйста, введите текст задачи\r\n        &lt;/div&gt;\r\n    &lt;/div&gt;', 0, 0),
(87, 'Gulnara Smirnova', 'gulyasmir@yandex.ru', 'текст тесть &lt;script&gt; alert(&quot;ppwe&quot;)&lt;/script&gt;rgsd', 0, 0),
(88, 'Gulnara Smirnova', 'gulyasmir@yandex.ru', 'Две одинаковые лодки массами m = 200 кг каждая (вместе с лодочниками и грузами, находящимися в лодках) движутся параллельными курсами навстречу друг другу с одинаковыми скоростями V = 1 м/с. Когда лодки поравнялись, то с первой лодки на вторую и со второй на первую одновременно перебрасывают грузы массами m1 = 20 кг. Определите скорости U1 и U2 лодок после перебрасывания грузов.', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `pr_user`
--

CREATE TABLE IF NOT EXISTS `pr_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pr_user`
--

INSERT INTO `pr_user` (`id`, `login`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

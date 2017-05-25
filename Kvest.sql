-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 28 2016 г., 22:16
-- Версия сервера: 5.5.48
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Kvest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` enum('0','1') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`, `is_admin`) VALUES
(1, 'admin', '3cf108a4e0a498347a5a75a792f23212ygtr7ur56378238', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `id` int(11) NOT NULL,
  `Name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `kvest_map`
--

CREATE TABLE IF NOT EXISTS `kvest_map` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `summary` text NOT NULL,
  `date` int(11) NOT NULL,
  `full` longtext NOT NULL,
  `user_count` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `complexity` varchar(255) NOT NULL,
  `archive` enum('0','1') NOT NULL,
  `name_creator` varchar(255) NOT NULL,
  `verify` enum('0','1','','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `kvest_map`
--

INSERT INTO `kvest_map` (`id`, `title`, `summary`, `date`, `full`, `user_count`, `cost`, `time`, `complexity`, `archive`, `name_creator`, `verify`) VALUES
(34, 'Третий тест', 'ккккккккккккккккккккк', 1469526515, '<p>ееееееееееееееееееееееееее</p>', 4, 43, 43, 'уц', '0', 'admin', '1'),
(36, 'org2', 'cccccc', 1469527992, '<p>vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv</p>', 6, 77, 67, 'uigy', '0', 'roman', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `org_user`
--

CREATE TABLE IF NOT EXISTS `org_user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `org_user`
--

INSERT INTO `org_user` (`id`, `login`, `password`) VALUES
(1, 'hj', 'hj'),
(2, 'qqqqqq', 'wwwwwwwwwwww'),
(3, 'organization', '07b432d25170b469b57095ca269bc202ygtr7ur56378238'),
(4, 'sdkfj', '550de3138dbd63002cd40d25bdb9cd18ygtr7ur56378238'),
(6, 'rot', '4ac5c85a67bb5cbf60ec8548fde8758dygtr7ur56378238'),
(7, 'rrr', '550de3138dbd63002cd40d25bdb9cd18ygtr7ur56378238'),
(9, 'roman', '4ac5c85a67bb5cbf60ec8548fde8758dygtr7ur56378238');

-- --------------------------------------------------------

--
-- Структура таблицы `type_game`
--

CREATE TABLE IF NOT EXISTS `type_game` (
  `id` int(11) NOT NULL,
  `type_game` varchar(255) NOT NULL,
  `description_type_game` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` enum('0','1') NOT NULL,
  `date` bigint(15) NOT NULL,
  `is_admin` enum('0','1') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `second_name`, `email`, `sex`, `date`, `is_admin`) VALUES
(1, 'нег', 'e388f02f750e65ebba95ab9493cda01eygtr7ur56378238', 'Yyuyt', 'Tyf', 'trdr@tut.by', '0', 1468533429, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `user_game`
--

CREATE TABLE IF NOT EXISTS `user_game` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `id_kvest` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_game`
--

INSERT INTO `user_game` (`id`, `login`, `id_kvest`) VALUES
(36, 'нег', 36),
(42, 'нег', 34);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kvest_map`
--
ALTER TABLE `kvest_map`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `org_user`
--
ALTER TABLE `org_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_game`
--
ALTER TABLE `type_game`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_game`
--
ALTER TABLE `user_game`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `kvest_map`
--
ALTER TABLE `kvest_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `org_user`
--
ALTER TABLE `org_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `type_game`
--
ALTER TABLE `type_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `user_game`
--
ALTER TABLE `user_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

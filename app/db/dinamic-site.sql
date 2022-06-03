-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 03 2022 г., 04:37
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dinamic-site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(12) NOT NULL,
  `page` int(10) NOT NULL,
  `username` varchar(110) NOT NULL,
  `comment` text NOT NULL,
  `created_data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `page`, `username`, `comment`, `created_data`) VALUES
(1, 5, 'kozik912', 'ЖК \"Талисман\" на Рокоссовского - новый архитектурный проект Бизнес-класса, расположенный в окружение парков «Сокольники», «Измайловский» и «Лосиный остров». Вокруг ЖК развитая', '2022-06-03 04:52:56'),
(2, 5, 'kozik912', 'ЖК \"Талисман\" на Рокоссовского - новый архитектурный проект Бизнес-класса, расположенный в окружение парков «Сокольники», «Измайловский» и «Лосиный остров». Вокруг ЖК развитая', '2022-06-03 04:54:41'),
(3, 5, 'kozik912', 'ЖК \"Талисман\" на Рокоссовского - новый архитектурный проект Бизнес-класса, расположенный в окружение парков «Сокольники», «Измайловский» и «Лосиный остров». Вокруг ЖК развитая', '2022-06-03 04:55:23'),
(4, 5, 'kozik912', 'ЖК \"Талисман\" на Рокоссовского - новый архитектурный проект Бизнес-класса, расположенный в окружение парков «Сокольники», «Измайловский» и «Лосиный остров». Вокруг ЖК развитая', '2022-06-03 04:56:17'),
(5, 5, 'kozik912', 'ЖК \"Талисман\" на Рокоссовского - новый архитектурный проект Бизнес-класса, расположенный в окружение парков «Сокольники», «Измайловский» и «Лосиный остров». Вокруг ЖК развитая', '2022-06-03 04:56:36'),
(6, 5, 'kozik912', 'ЖК \"Талисман\" на Рокоссовского - новый архитектурный проект Бизнес-класса, расположенный в окружение парков «Сокольники», «Измайловский» и «Лосиный остров». Вокруг ЖК развитая', '2022-06-03 04:57:40'),
(7, 5, 'kozik912', 'ЖК \"Талисман\" на Рокоссовского - новый архитектурный проект Бизнес-класса, расположенный в окружение парков «Сокольники», «Измайловский» и «Лосиный остров». Вокруг ЖК развитая', '2022-06-03 04:58:30'),
(8, 5, 'kozik912', 'ЖК \"Талисман\" на Рокоссовского - новый архитектурный проект Бизнес-класса, расположенный в окружение парков «Сокольники», «Измайловский» и «Лосиный остров». Вокруг ЖК развитая', '2022-06-03 04:59:08');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(12) NOT NULL,
  `id_users` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `id_topic` int(12) DEFAULT NULL,
  `created_data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `id_users`, `title`, `img`, `content`, `status`, `id_topic`, `created_data`) VALUES
(5, 19, '36,3 м², 1-комнатная квартира, Москва', '1654180718_1K.jpg', 'ЖК \"Талисман\" на Рокоссовского - новый архитектурный проект Бизнес-класса, расположенный в окружение парков «Сокольники», «Измайловский» и «Лосиный остров».  Вокруг ЖК развитая инфраструктура сложившегося жилого района. В шаговой доступности станции метро и МЦК «Бульвар Рокоссовского».', 1, 26, '2022-06-02 17:38:38'),
(8, 19, '119,9 м², 3-комнатная квартира', '1654181441_2K.jpg', 'Клубный жилой комплекс бизнес-класса \"Level Barvikha Residence\" расположен', 1, 26, '2022-06-02 17:50:41'),
(9, 19, '130 м² дом, 12,7 сотки участок', '1654181528_1D.jpg', 'Вашему вниманию предлагается уютный, светлый дом общей площадью 130 м2 на ровном, сухом, примыкающем к лесному массиву участку', 1, 23, '2022-06-02 17:52:08'),
(12, 19, '21,4 м², квартира-студия', '1654181741_3K.jpg', 'Продается удобная студия площадью 21.4 кв. метров в 10 минутах пути на автомобиле', 1, 27, '2022-06-02 17:55:41'),
(13, 19, '19 м², гараж', '1654181873_1G.jpg', 'Большой (18,6)кв.м., полностью изолированный гаражный бокс', 1, 24, '2022-06-02 17:57:53'),
(14, 19, '115 м² дом, 5,8 сотки участок', '1654181960_2D.jpg', 'Дом готов к проживанию. Быстрая сделка. Собственник . Торг уместен', 1, 23, '2022-06-02 17:59:20');

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int(12) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(23, 'Дома', 'Дома'),
(24, 'Гаражи', 'Гаражи'),
(26, 'Квартиры', 'Квартиры'),
(27, 'Студии', 'Студии');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created`) VALUES
(19, 1, 'lolblach333', 'lolblach3333@gmail.com', '$2y$10$bKwEcBZhI2GBj9VNDYxvPumzgH59wzNLMX/x2TtqAGzRH8r1yh.TW', '2022-06-01 14:42:22'),
(20, 0, 'lolblach33334', 'lolblach33333@gmail.com', '$2y$10$CYVmkFWEOHEjcEf3q9yFNer3T.xXLaFuCEdrz.FofQIMyCTXVwJtC', '2022-06-03 02:27:37');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_topic` (`id_topic`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

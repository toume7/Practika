-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 03 2021 г., 09:29
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `practiksavichecv`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`login`, `pass`) VALUES
('123', '123'),
('123', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `sursurname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `name`, `surname`, `sursurname`) VALUES
(162, 'Лев', 'Толстой', ''),
(163, 'Лев', 'ыва', ''),
(164, 'Юваль', 'Ной', ' Харари'),
(165, '456', '456', ''),
(166, 'gjgj', 'ghjghj', ''),
(167, '456', '456', '456'),
(168, ' Сашка', 'Милютин', ''),
(169, 'Свят', 'Ануфриев', ''),
(170, 'Димка', 'Савичев', ''),
(171, '', 'Дарвин', ''),
(172, 'Мэри', 'Энн', 'Шеффер'),
(173, 'Энни', 'Бэрроуз', ''),
(174, 'dgfg', 'dfgdfg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `beetween`
--

CREATE TABLE `beetween` (
  `id_autor` int DEFAULT NULL,
  `id_book` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `beetween`
--

INSERT INTO `beetween` (`id_autor`, `id_book`) VALUES
(NULL, NULL),
(NULL, NULL),
(NULL, NULL),
(164, 240),
(167, 243),
(168, 245),
(170, 245),
(169, 245),
(171, 246),
(172, 247),
(173, 247);

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `id` int NOT NULL,
  `name_book` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(255) NOT NULL,
  `date_of_writing` date NOT NULL,
  `description` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `name_book`, `img`, `date_of_writing`, `description`) VALUES
(240, 'Sapiens. Краткая история человечества', '61a706717acb9.jpg', '2016-12-08', 'Сто тысяч лет назад Homo sapiens был одним из как минимум шести видов человека, живших на этой планете, – ничем не примечательным животным, которое играло в экосистеме роль не большую, чем гориллы, светлячки или медузы. Но около семидесяти тысяч лет назад загадочное изменение когнитивных способностей Homo sapiens превратило его в хозяина планеты и кошмар экосистемы. Как человек разумный сумел покорить мир? Что стало с другими видами человека? Когда и почему появились деньги, государства и религия? Как возникали и рушились империи? Почему почти все общества ставили женщин ниже мужчин? Как наука и капитализм стали господствующими вероучениями современной эры? Становились ли люди с течением времени счастливее? Какое будущее нас ожидает?\r\n\r\nЮваль Харари показывает, как ход истории формировал человеческое общество и действительность вокруг него. Его книга прослеживает связь между событиями прошлого и проблемами современности и заставляет читателя пересмотреть все устоявшиеся представления об окружающем мире.'),
(243, 'Война и мир', '61a727c04ce3f.jpg', '4567-03-12', '456'),
(245, 'Обломов', '61a897c4b2aef.jpg', '2021-12-13', 'Жили были не тужили четрверо друзей'),
(246, 'Происхождение видов', '61a89f35f113c.jpg', '4567-03-12', 'Естественные инстинкты утрачиваются при доместикации; замечательный пример этого мы видим на тех'),
(247, 'Клуб любителей книг и пирогов из картофельных очистков', '61a89fa89ec69.jpeg', '6321-05-04', 'В послевоенном Лондоне молодая писательница Джулиет пытается найти сюжет для новой книги, но об ужасах войны писать ей решительно не хочется, прочие темы кажутся либо скучными, либо неуместными. На помощь приходит случай - в виде письма одного свиновода с острова Гернси. Оказывается, даже свинари любят почитать, и неведомый Доуси, к которому в руки попала книга, некогда принадлежавшая Джулиет, просит ее посоветовать хорошую книжную лавку. Дело в том, что на Гернси с книгами сейчас туго, поскольку остров, все годы войны оккупированный немцами, только-только возрождается к жизни. Письмо это переворачивает жизнь Джулиет. История книжного…');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `beetween`
--
ALTER TABLE `beetween`
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `id_book` (`id_book`);

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `beetween`
--
ALTER TABLE `beetween`
  ADD CONSTRAINT `beetween_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beetween_ibfk_3` FOREIGN KEY (`id_autor`) REFERENCES `author` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

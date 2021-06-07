-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 07 2021 г., 21:01
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mybd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `group_id` int(255) NOT NULL,
  `groupNum` int(10) NOT NULL,
  `program_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`group_id`, `groupNum`, `program_id`) VALUES
(67, 1, 38),
(83, 2, 38),
(85, 4, 38),
(86, 5, 38),
(89, 1, 33),
(95, 2, 33),
(106, 3, 33),
(107, 4, 33),
(108, 5, 33),
(115, 6, 33),
(117, 1, 49),
(118, 2, 49),
(119, 3, 49);

-- --------------------------------------------------------

--
-- Структура таблицы `groupstudlink`
--

CREATE TABLE `groupstudlink` (
  `link_id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `group_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `groupstudlink`
--

INSERT INTO `groupstudlink` (`link_id`, `student_id`, `group_id`) VALUES
(46, 22, 89),
(47, 13, 89),
(48, 25, 89);

-- --------------------------------------------------------

--
-- Структура таблицы `programs`
--

CREATE TABLE `programs` (
  `program_id` int(255) NOT NULL,
  `title` varchar(45) CHARACTER SET utf8 NOT NULL,
  `duration` int(11) NOT NULL,
  `CountGroup` int(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `programs`
--

INSERT INTO `programs` (`program_id`, `title`, `duration`, `CountGroup`) VALUES
(33, 'Крутая программа', 144, 6),
(36, 'Старт в ИТ', 40, 0),
(38, 'Программа хорошая', 123, 5),
(39, 'Привет', 40, 0),
(49, 'Newcheck', 11, 3),
(51, 'Аааа', 12, 0),
(52, 'Чек', 23, 0),
(57, 'Прогга2', 2, 0),
(59, 'Xtr', 12, 0),
(60, 'Прога двух', 2, 0),
(61, 'Проверим препода', 12, 0),
(65, 'Мояпрограмма', 12, 0),
(66, 'Ещёодна', 22, 0),
(67, 'aaa', 12, 0),
(68, 'safas', 12, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `student_id` int(255) NOT NULL,
  `Name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `LastName` varchar(32) CHARACTER SET utf8 NOT NULL,
  `Fathers_name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `Address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Snils` varchar(15) CHARACTER SET utf8 NOT NULL,
  `CertificateNum` varchar(20) CHARACTER SET utf8 NOT NULL,
  `BirthDate` date NOT NULL,
  `TelephonNum` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`student_id`, `Name`, `LastName`, `Fathers_name`, `Address`, `Snils`, `CertificateNum`, `BirthDate`, `TelephonNum`) VALUES
(13, 'Иван', 'Иваныч', 'Иванов', 'г. Петрозаводск, пр-т Ленина, 33, 1', '', '3_0550000_00120', '2021-05-06', '1'),
(22, 'Игнатик', 'Терешков', 'Магамедович', 'г. Петрозаводск, ул. Колотушкина, 9А, 2', '574-122-123 00', '1_0000000_00021', '1999-08-05', '+79234510111'),
(24, 'Никита', 'Смирнов', 'Олегович', 'наб Варкауса, 33, 21', '123-456-678 00', '1_0000000_00000', '2222-01-02', '+79214510472'),
(25, 'Илья', 'Ильин', 'Ильич', 'г. Петрозаводск, наб. Варкауса, 33, 77', '123-456-119 00', '1_0000000_00033', '2021-06-01', '+79214510666');

-- --------------------------------------------------------

--
-- Структура таблицы `userproglink`
--

CREATE TABLE `userproglink` (
  `link_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `program_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `userproglink`
--

INSERT INTO `userproglink` (`link_id`, `user_id`, `program_id`) VALUES
(11, 9, 33),
(14, 9, 36),
(16, 9, 38),
(17, 9, 39),
(25, 10, 49),
(27, 10, 51),
(28, 10, 52),
(33, 9, 57),
(37, 9, 59),
(38, 9, 60),
(40, 9, 61),
(60, 13, 60),
(62, 8, 38),
(63, 9, 65),
(64, 9, 66),
(65, 10, 67),
(66, 9, 68);

-- --------------------------------------------------------

--
-- Структура таблицы `userss`
--

CREATE TABLE `userss` (
  `user_id` int(255) NOT NULL,
  `Login` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `Name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `Lastname` varchar(32) CHARACTER SET utf8 NOT NULL,
  `Fathers_name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `Admin` int(11) NOT NULL,
  `EmploymentDate` date NOT NULL,
  `Post` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `userss`
--

INSERT INTO `userss` (`user_id`, `Login`, `Password`, `Name`, `Lastname`, `Fathers_name`, `Admin`, `EmploymentDate`, `Post`) VALUES
(4, 'Admin3', 'cc3822dc6be497e7847e53f35a3eac15', 'Егор', 'Tимонен', 'Николаевич', 1, '2021-04-08', ''),
(5, 'Admin2021', 'cc3822dc6be497e7847e53f35a3eac15', 'Егор', 'Tимонен', 'Николаевич', 1, '2021-04-09', ''),
(6, 'Polsovatel2021', 'a156b09611db7d434169e97753c157f2', 'Вася', 'Васев', 'Васильевич', 0, '2021-04-14', ''),
(7, 'NewPols', '4d34abec3aa72ebb8fa335f967c7fe13', 'Ксюша', 'Медведева', 'Батьковна', 1, '2021-04-15', ''),
(8, 'Klown', '8c8c3e835820185e491d952046095e68', 'Андрей', 'Ктознает', 'Никитич', 0, '2021-04-14', ''),
(9, 'Test', '3d3f8cccfb49375736b395eab9405472', 'Василий', 'Петров', 'Никитич', 0, '2021-04-14', 'Старший преподаватель'),
(10, 'Test1', '3d804abaeaa1dfb948affcb2fec0baad', 'Егор', 'Tимонен', 'Николаевич', 0, '2021-04-14', ''),
(11, 'l;kjhgf', '4a1bd8f06f50cc4ed2ebdc73bd680695', 'fhfh', 'hgfgf', 'bgfbgf', 1, '1990-01-01', ''),
(13, 'ivan', '904e0a66bbcfa20e551a0788c5b69cfe', 'Иван', 'Иваныч', 'Иванов', 1, '2021-05-06', ''),
(14, 'petr', '904e0a66bbcfa20e551a0788c5b69cfe', 'Petr', 'Ptr', 'Petr', 1, '2021-05-14', ''),
(15, 'polz', '14fe4b93268b0b32b187befbe828e939', 'Никита', 'Никитов', 'Никитич', 0, '2021-05-15', ''),
(16, 'dim', '96248b41e4a6c370fc3281bb35689cb3', 'Дмитрий', 'Дмитриев', 'Дмитриевич', 0, '2021-11-11', 'Педагог');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Индексы таблицы `groupstudlink`
--
ALTER TABLE `groupstudlink`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `studetnt_id` (`student_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Индексы таблицы `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Индексы таблицы `userproglink`
--
ALTER TABLE `userproglink`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Индексы таблицы `userss`
--
ALTER TABLE `userss`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT для таблицы `groupstudlink`
--
ALTER TABLE `groupstudlink`
  MODIFY `link_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `userproglink`
--
ALTER TABLE `userproglink`
  MODIFY `link_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `userss`
--
ALTER TABLE `userss`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `groupstudlink`
--
ALTER TABLE `groupstudlink`
  ADD CONSTRAINT `groupstudlink_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `groupstudlink_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `userproglink`
--
ALTER TABLE `userproglink`
  ADD CONSTRAINT `userproglink_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userss` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userproglink_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 31 2021 г., 18:40
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `travelblog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contact_store`
--

CREATE TABLE `contact_store` (
  `contact_id` int NOT NULL COMMENT 'идентификатор контактного лица',
  `contact_name` varchar(256) NOT NULL COMMENT 'имя контактного лица',
  `contact_phone` varchar(9) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'телефон мобильный',
  `contact_phonework` varchar(9) NOT NULL COMMENT 'рабочий телефон',
  `contact_mail` varchar(256) NOT NULL COMMENT 'почтовый ящик для связи'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Содержит информацию публикуемую на странице с контактами';

--
-- Дамп данных таблицы `contact_store`
--

INSERT INTO `contact_store` (`contact_id`, `contact_name`, `contact_phone`, `contact_phonework`, `contact_mail`) VALUES
(1, 'Sofi Fairy Tell', '+9999999', '56-99-00', 'fairytellsblog@gmail.com'),
(2, 'Digital Assintem', '+9999999', '90-90-90', 'Digital@gmail.com'),
(3, 'Major Grom', '+12345678', '56-88-22', 'bublecomics@piter.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `img_store`
--

CREATE TABLE `img_store` (
  `img_id` int NOT NULL,
  `img_slide` varchar(4) DEFAULT NULL COMMENT 'имя карточки где используется изображение',
  `img_name` varchar(100) DEFAULT NULL COMMENT 'имя изображения',
  `img_path` varchar(256) DEFAULT NULL COMMENT 'путь к изображению',
  `img_paragraph` text COMMENT 'текст к изображению'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Содержит список изображений публикуемых на сайте';

--
-- Дамп данных таблицы `img_store`
--

INSERT INTO `img_store` (`img_id`, `img_slide`, `img_name`, `img_path`, `img_paragraph`) VALUES
(1, 'prd1', 'plan', './img/lifehacks/plan.jpg', '<strong>Сняряжение</strong><span><ul><li>Документы</li><li>Деньги</li><li>Еда</li><li> Аптечка </li></ul></span>'),
(2, 'prd1', 'medicinebag', './img/lifehacks/medicinebag.jpg', 'В аптечке должны быть лекарства первой необходимости. Например: обезболивающее, спирт и йод.'),
(3, 'prd1', 'document', './img/lifehacks/document.jpg', 'Среди документов всегда паспорт и билеты.'),
(4, 'prd1', 'food', './img/lifehacks/food.jpeg', 'Для перекуса подойдет вода, сухое печенье.'),
(5, 'prd2', 'map', './img/lifehacks/map.jpg', '<strong>Понадобиться следующий набор:</strong><span><ul><li> Интернет </li><li> Карта </li><li> Атлас автодорог </li><li> Блокнот </li><li> Знающий дорогу</li></ul></span>'),
(6, 'prd2', 'roadmap', './img/lifehacks/roadmap.jpg', 'Всегда бери с собой карту. Это важно.'),
(7, 'prd2', 'friend', './img/lifehacks/friend.jpeg', 'Верный друг это всегда очень важно,<br> особенно если собрался в дальнюю дорогу. <strong>ВАЖНО!</strong><br>Хотя бы один должен знать куда Вы идёте.'),
(8, 'sld', 'slide3', '../img/photo3.jpg', 'Путешествие это всегда приятное дело, если есть компания. <br>Мы команда исследователей,<br>фотографов <br>и просто хороших людей.'),
(9, 'sld', 'slide2', '../img/photo2.jpg', 'Открыты для открытий. '),
(10, 'sld', 'slide1', '../img/photo1.jpg', 'Наше кредо: <br>Видеть необычное в обычном. ');

-- --------------------------------------------------------

--
-- Структура таблицы `pages_store`
--

CREATE TABLE `pages_store` (
  `pages_id` int NOT NULL COMMENT 'номер страницы',
  `pages_name` varchar(256) NOT NULL COMMENT 'название страницы'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `pages_store`
--

INSERT INTO `pages_store` (`pages_id`, `pages_name`) VALUES
(1, 'Главная'),
(2, 'Лайфхаки'),
(3, 'Коротко о нас'),
(4, 'Контакты'),
(5, 'Авторизация'),
(6, 'Регистрация'),
(7, 'Панель администратора'),
(8, 'Работа с контентом'),
(9, 'Редактирование контента');

-- --------------------------------------------------------

--
-- Структура таблицы `upload_store`
--

CREATE TABLE `upload_store` (
  `upload_id` int NOT NULL COMMENT 'Идентификатор загружаемого изображения',
  `upload_imgname` varchar(256) NOT NULL COMMENT 'Название загружаемого изображение',
  `upload_path` varchar(256) NOT NULL COMMENT 'Путь к загружаемому изображению',
  `upload_user` varchar(256) NOT NULL COMMENT 'Пользователь загрузивший изображение'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `upload_store`
--

INSERT INTO `upload_store` (`upload_id`, `upload_imgname`, `upload_path`, `upload_user`) VALUES
(29, '2b86600ed62a45c96059ab580fef06c1.jpg', 'C:/OpenServer/domains/www/uploaded_files/2b86600ed62a45c96059ab580fef06c1.jpg', 'редактор'),
(30, '4f969de211249ac02e94203.jpg', 'C:/OpenServer/domains/www/uploaded_files/4f969de211249ac02e94203b46e43f83.jpg', 'автор'),
(31, '1cb535fd1e0c462b8807ed533d87f887.jpg', 'C:/OpenServer/domains/www/uploaded_files/1cb535fd1e0c462b8807ed533d87f887.jpg', 'поэт'),
(32, '87c03f39fc33fd52aab2a21b7f9db3e5.jpg', 'C:/OpenServer/domains/www/uploaded_files/87c03f39fc33fd52aab2a21b7f9db3e5.jpg', 'поэт'),
(33, '5e7994a7fd8d660f2bddce2e3c96ade0.jpg', 'C:/OpenServer/domains/www/uploaded_files/5e7994a7fd8d660f2bddce2e3c96ade0.jpg', 'редактор');

-- --------------------------------------------------------

--
-- Структура таблицы `user_store`
--

CREATE TABLE `user_store` (
  `user_id` int NOT NULL COMMENT 'идентификатор',
  `user_name` varchar(256) NOT NULL COMMENT 'имя пользователя',
  `user_email` varchar(256) NOT NULL COMMENT 'E-mail пользователя',
  `user_password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'пароль пользователя. д.б. в хеше',
  `user_role` varchar(256) NOT NULL COMMENT 'роль пользователя'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Содержит список пользователей работающих над контентом';

--
-- Дамп данных таблицы `user_store`
--

INSERT INTO `user_store` (`user_id`, `user_name`, `user_email`, `user_password`, `user_role`) VALUES
(3, 'поэт', 'fairytellsblog@gmail.com', '259c436027c3912edc8df67bbe8e3984', 'manager'),
(4, 'редактор', 'redactor@mail.ru', '7ac7d3a1e404c85f725f442e4ec4b363', 'admin'),
(5, 'автор', 'anonim@digital-email.com', '3429a9c53c0dfc25421bdc1b89555b26', 'manager'),
(8, 'Елена', 'dfff@dfdf.com', 'e242f36f4f95f12966da8fa2efd59992', 'ordinary'),
(9, 'абв', 'modedar487lidte.com', '202cb962ac59075b964b07152d234b70', 'ordinary'),
(10, 'бвг', 'modedar487@lidte.com', 'd41d8cd98f00b204e9800998ecf8427e', 'ordinary'),
(13, 'редактор', 'modedar487@lidte.com', '1d0258c2440a8d19e716292b231e3190', 'ordinary'),
(14, 'Елена', 'modedar487@lidte.com', '259c436027c3912edc8df67bbe8e3984', 'ordinary'),
(16, 'Рооооо', 'modedar487@lidte.com', 'faafda66202d234463057972460c04f5', 'ordinary');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contact_store`
--
ALTER TABLE `contact_store`
  ADD PRIMARY KEY (`contact_id`);

--
-- Индексы таблицы `img_store`
--
ALTER TABLE `img_store`
  ADD PRIMARY KEY (`img_id`);

--
-- Индексы таблицы `pages_store`
--
ALTER TABLE `pages_store`
  ADD PRIMARY KEY (`pages_id`);

--
-- Индексы таблицы `upload_store`
--
ALTER TABLE `upload_store`
  ADD PRIMARY KEY (`upload_id`);

--
-- Индексы таблицы `user_store`
--
ALTER TABLE `user_store`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contact_store`
--
ALTER TABLE `contact_store`
  MODIFY `contact_id` int NOT NULL AUTO_INCREMENT COMMENT 'идентификатор контактного лица', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `img_store`
--
ALTER TABLE `img_store`
  MODIFY `img_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `pages_store`
--
ALTER TABLE `pages_store`
  MODIFY `pages_id` int NOT NULL AUTO_INCREMENT COMMENT 'номер страницы', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `upload_store`
--
ALTER TABLE `upload_store`
  MODIFY `upload_id` int NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор загружаемого изображения', AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `user_store`
--
ALTER TABLE `user_store`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT COMMENT 'идентификатор', AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Лют 21 2024 р., 23:37
-- Версія сервера: 5.7.39-log
-- Версія PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `BlogDb_MariiaKandyba`
--
CREATE DATABASE IF NOT EXISTS `BlogDb_MariiaKandyba` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `BlogDb_MariiaKandyba`;

-- --------------------------------------------------------

--
-- Структура таблиці `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `category_id`, `created_at`, `photo`) VALUES
(3, 'Beyond Bits and Bytes: Exploring the Digital Frontier', 'Technology is rapidly evolving, shaping the way we live and work. From smartphones to artificial intelligence, technological innovations continue to revolutionize various industries. With advancements in areas like renewable energy and space exploration, technology plays a crucial role in addressing global challenges and improving our quality of life.', 1, '2024-02-19 16:42:10', 'images/tech.jpg'),
(4, 'Threads of Identity: Weaving Culture Through Style', 'Fashion is more than just clothing; it\'s a form of self-expression and cultural identity. From haute couture runways to street style trends, fashion encompasses a diverse range of styles and influences. Beyond aesthetics, the fashion industry drives economic growth and fosters creativity through design, textiles, and craftsmanship.', 2, '2024-02-19 16:43:07', 'images\\fashion.jpg'),
(5, 'Game On: Uniting Nations Through the Power of Play', 'Sports bring people together, transcending boundaries of culture, age, and geography. Whether it\'s the thrill of competition or the camaraderie of team spirit, sports play a vital role in society. From iconic events like the Olympics to grassroots initiatives promoting health and fitness, sports inspire individuals to push their limits and achieve greatness.', 3, '2024-02-19 16:43:39', 'images\\sports.jpg'),
(6, 'Culinary Chronicles: Tasting the Stories of Our Heritage', 'Food is not just sustenance; it\'s a cultural experience that nourishes both body and soul. From farm to table, the journey of food involves diverse ingredients, culinary techniques, and traditions. Whether exploring global cuisines or savoring homemade favorites, food connects us to our heritage and creates moments of joy and togetherness.', 4, '2024-02-19 16:44:04', 'images\\food.jpg'),
(7, 'Wanderlust Chronicles: Embarking on Journeys of Discovery', 'Travel broadens horizons, offering opportunities for exploration, adventure, and personal growth. From iconic landmarks to off-the-beaten-path destinations, travel opens doors to new experiences and perspectives. Whether embarking on a solo backpacking trip or enjoying a luxury resort getaway, travel enriches our lives and creates lasting memories.', 5, '2024-02-19 16:44:45', 'images/travel.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Technology'),
(2, 'Fashion'),
(3, 'Sports'),
(4, 'Food'),
(5, 'Travel');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2014 at 11:55 AM
-- Server version: 5.5.35
-- PHP Version: 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testtask`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `add_date` int(255) DEFAULT NULL,
  `edit_date` int(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `desc`, `add_date`, `edit_date`, `category_image`) VALUES
(13, 'Спрот', 'Все что связано со спортом', 1393140672, NULL, NULL),
(16, 'Физика', 'Пособия , примеры, эксперементы', 1393140797, NULL, NULL),
(17, 'Программирование', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1393227019, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `category_id` int(20) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `write_date` int(255) NOT NULL,
  `publ_date` int(255) NOT NULL,
  `update_date` int(255) NOT NULL,
  `add_date` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `title`, `author`, `category_id`, `description`, `write_date`, `publ_date`, `update_date`, `add_date`) VALUES
(14, 'Ядерный синтез дл яшкольников 1-3 классов', 'Туля', 16, 'Подробное описание ядерного синтеза в 3-х томах', 957556800, 1140296400, 1393223482, 1393158929),
(15, 'Валерий Харламов. Легенда №17', 'Раззаков', 13, 'Книга о великом хокеисте Велерие Харламове', 958161600, 1386619200, 0, 1393226309),
(16, 'Рожденный бежать', 'Макдкгл', 13, 'Осторожно: книга, которая заставит тебя бежать! Заряжает и мотивирует.\r\nЕсли ты еще не стоишь на тропе бега, эта книга для тебя! В ней открываются тайны племени индейцев тараумара, которые победили в нескольких забегах на сверхдлинные дистанции, и скрылись в каньонах, оставив множество вопросов. Автор рассказывает о звездах бега, о своем пути к бегу на длинные дистанции и о том, как преодолеть страх травм', 1095278400, 1145217600, 0, 1393226401),
(17, 'О ЧЕМ Я ГОВОРЮ, КОГДА ГОВОРЮ О БЕГЕ', 'ХАРУКИ МУРАКАМИ', 13, 'Эта книга несомненно понравится всем поклонниками творчества Харуки Мураками. Он начал писать книги в 30 лет, бегать начал еще позже. И то, и другое у него получается очень хорошо. Эта книга скорее художественного характера и написана в его стандартной, неспешной манере. Очень располагает к анализу и размышлениям.', 957643200, 1140382800, 0, 1393226480),
(18, 'От 800 метров до марафона', 'Джек Дениелс', 13, 'Первые километры позади. Понимание, что это здорово пришло. Вопрос: куда бежат дальше? Ответ есть в книге Джека Дэниелса. Автор рассказывает о том, как подготовиться к марафону. Как пройти все ключевые этапы людям с разными уровнями подготовки в беге. В результате ты сможешь улучшить свои достижения. \r\nПрочитай эту книгу, если ты не знаешь как подступиться к цифрам 800м, 3км, 5км, 10км, 21км 97,5м и 42км 195м. После этой книги ты точно начнешь получать больше удовольствия от пробежек: ведь теперь ты будешь соревноваться с собой (и с другими атлетами).', 1202590800, 1210017600, 0, 1393226552),
(19, 'Новые идеи в физике. Строение вещества', 'Боргман', 16, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', -1668997848, -558932400, 0, 1393226899),
(20, 'HTML5 для новичков', 'Энди Харрис', 17, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1318104000, 1321992000, 0, 1393227175),
(21, 'PHP 5', 'Зольников', 17, 'В книге приведены основные сведения по языку Web-программирования РНР, который позволяет решать задачи любой сложности и формировать динамические разделы сайта: форумы, гостевые книги, каталоги продукции и многое другое. Помимо синтаксиса и возможностей языка рассматривается установка и настройка Web-сервера Apache, на котором, как правило, выполняются РНР-программы.', 1176753600, 1182110400, 0, 1393227402),
(22, 'Профессиональное программирование на PHP', 'Шлосснейгл', 17, ' Книга адресована опытным PHP-программистам и разработчикам Web-приложений, проектирующим крупные Web-системы для решения сложных задач. В книге рассматривается пятая версия РНР и новые объектно-ориентированные возможности языка, однако многие рекомендации вполне применимы и для предыдущей версии PHP, a идеи и стратегии повышения скорости и надежности кода, описанные в книге, позволят усовершенствовать код, написанный практически на любом языке высокого уровня.', 1153080000, 1195333200, 0, 1393227455);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

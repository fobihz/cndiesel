-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Хост: mysql-srv63377.ht-systems.ru
-- Время создания: Янв 04 2016 г., 09:01
-- Версия сервера: 5.5.25-log
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `srv63377_cndisel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '3', NULL, 'N;'),
('Authenticated', '5', NULL, 'N;');

-- --------------------------------------------------------

--
-- Структура таблицы `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, NULL, NULL, 'N;'),
('Admin.Catalog.Default.*', 1, NULL, NULL, 'N;'),
('Admin.Catalog.Default.Additem', 0, NULL, NULL, 'N;'),
('Admin.Catalog.Default.Changenumonpage', 0, NULL, NULL, 'N;'),
('Admin.Catalog.Default.Index', 0, NULL, NULL, 'N;'),
('Admin.Catalog.Default.Setisview', 0, NULL, NULL, 'N;'),
('Admin.Catalog.Default.Translit', 0, NULL, NULL, 'N;'),
('Admin.Catalog.Default.Update', 0, NULL, NULL, 'N;'),
('Admin.Catalog.Default.Viewcatalog', 0, NULL, NULL, 'N;'),
('Admin.Catalog.Install.*', 1, NULL, NULL, 'N;'),
('Admin.Catalog.Install.Addattr', 0, NULL, NULL, 'N;'),
('Admin.Catalog.Install.Addattrgr', 0, NULL, NULL, 'N;'),
('Admin.Catalog.Install.Addcatalog', 0, NULL, NULL, 'N;'),
('Admin.Catalog.Install.Attrpos', 0, NULL, NULL, 'N;'),
('Admin.Catalog.Install.Deleteattr', 0, NULL, NULL, 'N;'),
('Admin.Catalog.Install.Deleteattrgr', 0, NULL, NULL, 'N;'),
('Admin.Catalog.Install.Deletecatalog', 0, NULL, NULL, 'N;'),
('Admin.Catalog.Install.Index', 0, NULL, NULL, 'N;'),
('Admin.Default.*', 1, NULL, NULL, 'N;'),
('Admin.Default.Index', 0, NULL, NULL, 'N;'),
('Admin.Email.Email.*', 1, NULL, NULL, 'N;'),
('Admin.Email.Email.Admin', 0, NULL, NULL, 'N;'),
('Admin.Email.Email.Create', 0, NULL, NULL, 'N;'),
('Admin.Email.Email.Delete', 0, NULL, NULL, 'N;'),
('Admin.Email.Email.Index', 0, NULL, NULL, 'N;'),
('Admin.Email.Email.Setisused', 0, NULL, NULL, 'N;'),
('Admin.Email.Email.Update', 0, NULL, NULL, 'N;'),
('Admin.Email.Email.View', 0, NULL, NULL, 'N;'),
('Admin.Faq.Faq.*', 1, NULL, NULL, 'N;'),
('Admin.Faq.Faq.Admin', 0, NULL, NULL, 'N;'),
('Admin.Faq.Faq.Create', 0, NULL, NULL, 'N;'),
('Admin.Faq.Faq.Delete', 0, NULL, NULL, 'N;'),
('Admin.Faq.Faq.Index', 0, NULL, NULL, 'N;'),
('Admin.Faq.Faq.Isanswer', 0, NULL, NULL, 'N;'),
('Admin.Faq.Faq.Isview', 0, NULL, NULL, 'N;'),
('Admin.Faq.Faq.Update', 0, NULL, NULL, 'N;'),
('Admin.Faq.Faq.View', 0, NULL, NULL, 'N;'),
('Admin.News.News.*', 1, NULL, NULL, 'N;'),
('Admin.News.News.Admin', 0, NULL, NULL, 'N;'),
('Admin.News.News.Create', 0, NULL, NULL, 'N;'),
('Admin.News.News.Delete', 0, NULL, NULL, 'N;'),
('Admin.News.News.Index', 0, NULL, NULL, 'N;'),
('Admin.News.News.Update', 0, NULL, NULL, 'N;'),
('Admin.News.News.View', 0, NULL, NULL, 'N;'),
('Admin.Page.Page.*', 1, NULL, NULL, 'N;'),
('Admin.Page.Page.Admin', 0, NULL, NULL, 'N;'),
('Admin.Page.Page.Create', 0, NULL, NULL, 'N;'),
('Admin.Page.Page.Delete', 0, NULL, NULL, 'N;'),
('Admin.Page.Page.Index', 0, NULL, NULL, 'N;'),
('Admin.Page.Page.Update', 0, NULL, NULL, 'N;'),
('Admin.Page.Page.View', 0, NULL, NULL, 'N;'),
('Admin.Photogallery.Photogallery.*', 1, NULL, NULL, 'N;'),
('Admin.Photogallery.Photogallery.Addphotos', 0, NULL, NULL, 'N;'),
('Admin.Photogallery.Photogallery.Admin', 0, NULL, NULL, 'N;'),
('Admin.Photogallery.Photogallery.Create', 0, NULL, NULL, 'N;'),
('Admin.Photogallery.Photogallery.Delete', 0, NULL, NULL, 'N;'),
('Admin.Photogallery.Photogallery.Deletephoto', 0, NULL, NULL, 'N;'),
('Admin.Photogallery.Photogallery.Index', 0, NULL, NULL, 'N;'),
('Admin.Photogallery.Photogallery.Setisview', 0, NULL, NULL, 'N;'),
('Admin.Photogallery.Photogallery.Setisviewphoto', 0, NULL, NULL, 'N;'),
('Admin.Photogallery.Photogallery.Update', 0, NULL, NULL, 'N;'),
('Admin.Photogallery.Photogallery.Updatephoto', 0, NULL, NULL, 'N;'),
('Admin.Photogallery.Photogallery.View', 0, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('User.Activation.*', 1, NULL, NULL, 'N;'),
('User.Activation.Activation', 0, NULL, NULL, 'N;'),
('User.Admin.*', 1, NULL, NULL, 'N;'),
('User.Admin.Admin', 0, NULL, NULL, 'N;'),
('User.Admin.Create', 0, NULL, NULL, 'N;'),
('User.Admin.Delete', 0, NULL, NULL, 'N;'),
('User.Admin.Update', 0, NULL, NULL, 'N;'),
('User.Admin.View', 0, NULL, NULL, 'N;'),
('User.Default.*', 1, NULL, NULL, 'N;'),
('User.Default.Index', 0, NULL, NULL, 'N;'),
('User.Login.*', 1, NULL, NULL, 'N;'),
('User.Login.Login', 0, NULL, NULL, 'N;'),
('User.Logout.*', 1, NULL, NULL, 'N;'),
('User.Logout.Logout', 0, NULL, NULL, 'N;'),
('User.Profile.*', 1, NULL, NULL, 'N;'),
('User.Profile.Changepassword', 0, NULL, NULL, 'N;'),
('User.Profile.Edit', 0, NULL, NULL, 'N;'),
('User.Profile.Profile', 0, NULL, NULL, 'N;'),
('User.ProfileField.*', 1, NULL, NULL, 'N;'),
('User.ProfileField.Admin', 0, NULL, NULL, 'N;'),
('User.ProfileField.Create', 0, NULL, NULL, 'N;'),
('User.ProfileField.Delete', 0, NULL, NULL, 'N;'),
('User.ProfileField.Update', 0, NULL, NULL, 'N;'),
('User.ProfileField.View', 0, NULL, NULL, 'N;'),
('User.Recovery.*', 1, NULL, NULL, 'N;'),
('User.Recovery.Recovery', 0, NULL, NULL, 'N;'),
('User.Registration.*', 1, NULL, NULL, 'N;'),
('User.Registration.Registration', 0, NULL, NULL, 'N;'),
('User.User.*', 1, NULL, NULL, 'N;'),
('User.User.Index', 0, NULL, NULL, 'N;'),
('User.User.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Структура таблицы `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `AuthItemChild`
--

INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES
('Authenticated', 'Admin.Default.*'),
('Authenticated', 'Admin.Default.Index'),
('Authenticated', 'Admin.Page.Page.*'),
('Authenticated', 'Admin.Page.Page.Index'),
('Authenticated', 'Admin.Page.Page.Update'),
('Authenticated', 'Admin.Page.Page.View'),
('Authenticated', 'Site.*'),
('Guest', 'Site.*'),
('Authenticated', 'User.Login.*'),
('Guest', 'User.Login.*'),
('Authenticated', 'User.Logout.*'),
('Guest', 'User.Logout.*');

-- --------------------------------------------------------

--
-- Структура таблицы `cat_attr`
--

CREATE TABLE IF NOT EXISTS `cat_attr` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned NOT NULL,
  `mytype_id` tinyint(3) unsigned NOT NULL,
  `name` text NOT NULL,
  `pos` int(10) unsigned NOT NULL,
  `fk` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_type_id` (`type_id`),
  KEY `fk_mytype_id` (`mytype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `cat_attr`
--

INSERT INTO `cat_attr` (`id`, `type_id`, `mytype_id`, `name`, `pos`, `fk`) VALUES
(19, 9, 6, 'Текст', 100, 0),
(20, 10, 6, 'Текст', 100, 0),
(21, 11, 6, 'Текст', 100, 0),
(22, 12, 6, 'Текст', 100, 0),
(23, 15, 6, 'Текст', 100, 0),
(24, 16, 7, 'Ссылка в админке', 100, 0),
(25, 16, 7, 'Ссылка на сайте', 200, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `cat_attr_val`
--

CREATE TABLE IF NOT EXISTS `cat_attr_val` (
  `id_elem` int(11) unsigned NOT NULL,
  `id_attr` int(11) unsigned NOT NULL,
  `value` text,
  PRIMARY KEY (`id_elem`,`id_attr`),
  KEY `id_attr` (`id_attr`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `cat_attr_val`
--

INSERT INTO `cat_attr_val` (`id_elem`, `id_attr`, `value`) VALUES
(21, 19, '<p>\r\n	dfgdfg</p>\r\n'),
(21, 24, '/admin/photogallery/'),
(21, 25, '/photogallery/'),
(22, 19, '<p>\r\n	Lorem Ipsum - это текст-&quot;рыба&quot;, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной &quot;рыбой&quot; для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>\r\n<p>\r\n	Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации &quot;Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..&quot; Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам &quot;lorem ipsum&quot; сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).</p>\r\n<br />\r\n<p>\r\n	Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, &quot;consectetur&quot;, и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги &quot;de Finibus Bonorum et Malorum&quot; (&quot;О пределах добра и зла&quot;), написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, происходит от одной из строк в разделе 1.10.32</p>\r\n<p>\r\n	Классический текст Lorem Ipsum, используемый с XVI века, приведён ниже. Также даны разделы 1.10.32 и 1.10.33 &quot;de Finibus Bonorum et Malorum&quot; Цицерона и их английский перевод, сделанный H. Rackham, 1914 год.</p>\r\n<p>\r\n	Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём. Это делает предлагаемый здесь генератор единственным настоящим Lorem Ipsum генератором. Он использует словарь из более чем 200 латинских слов, а также набор моделей предложений. В результате сгенерированный Lorem Ipsum выглядит правдоподобно, не имеет повторяющихся абзацей или &quot;невозможных&quot; слов.</p>\r\n'),
(23, 19, '<p>\r\n	Lorem Ipsum - это текст-&quot;рыба&quot;, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной &quot;рыбой&quot; для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>\r\n<p>\r\n	Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации &quot;Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..&quot; Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам &quot;lorem ipsum&quot; сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).</p>\r\n<br />\r\n<p>\r\n	Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, &quot;consectetur&quot;, и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги &quot;de Finibus Bonorum et Malorum&quot; (&quot;О пределах добра и зла&quot;), написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, происходит от одной из строк в разделе 1.10.32</p>\r\n<p>\r\n	Классический текст Lorem Ipsum, используемый с XVI века, приведён ниже. Также даны разделы 1.10.32 и 1.10.33 &quot;de Finibus Bonorum et Malorum&quot; Цицерона и их английский перевод, сделанный H. Rackham, 1914 год.</p>\r\n<p>\r\n	Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём. Это делает предлагаемый здесь генератор единственным настоящим Lorem Ipsum генератором. Он использует словарь из более чем 200 латинских слов, а также набор моделей предложений. В результате сгенерированный Lorem Ipsum выглядит правдоподобно, не имеет повторяющихся абзацей или &quot;невозможных&quot; слов.</p>\r\n'),
(24, 19, '<p>\r\n	Lorem Ipsum - это текст-&quot;рыба&quot;, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной &quot;рыбой&quot; для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>\r\n<p>\r\n	Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации &quot;Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..&quot; Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам &quot;lorem ipsum&quot; сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).</p>\r\n<br />\r\n<p>\r\n	Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, &quot;consectetur&quot;, и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги &quot;de Finibus Bonorum et Malorum&quot; (&quot;О пределах добра и зла&quot;), написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, происходит от одной из строк в разделе 1.10.32</p>\r\n<p>\r\n	Классический текст Lorem Ipsum, используемый с XVI века, приведён ниже. Также даны разделы 1.10.32 и 1.10.33 &quot;de Finibus Bonorum et Malorum&quot; Цицерона и их английский перевод, сделанный H. Rackham, 1914 год.</p>\r\n<p>\r\n	Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём. Это делает предлагаемый здесь генератор единственным настоящим Lorem Ipsum генератором. Он использует словарь из более чем 200 латинских слов, а также набор моделей предложений. В результате сгенерированный Lorem Ipsum выглядит правдоподобно, не имеет повторяющихся абзацей или &quot;невозможных&quot; слов.</p>\r\n'),
(25, 19, '<p>\r\n	Lorem Ipsum - это текст-&quot;рыба&quot;, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной &quot;рыбой&quot; для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>\r\n<p>\r\n	Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации &quot;Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..&quot; Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам &quot;lorem ipsum&quot; сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).</p>\r\n<br />\r\n<p>\r\n	Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, &quot;consectetur&quot;, и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги &quot;de Finibus Bonorum et Malorum&quot; (&quot;О пределах добра и зла&quot;), написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, происходит от одной из строк в разделе 1.10.32</p>\r\n<p>\r\n	Классический текст Lorem Ipsum, используемый с XVI века, приведён ниже. Также даны разделы 1.10.32 и 1.10.33 &quot;de Finibus Bonorum et Malorum&quot; Цицерона и их английский перевод, сделанный H. Rackham, 1914 год.</p>\r\n<p>\r\n	Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём. Это делает предлагаемый здесь генератор единственным настоящим Lorem Ipsum генератором. Он использует словарь из более чем 200 латинских слов, а также набор моделей предложений. В результате сгенерированный Lorem Ipsum выглядит правдоподобно, не имеет повторяющихся абзацей или &quot;невозможных&quot; слов.</p>\r\n'),
(26, 19, '<p>\r\n	Lorem Ipsum - это текст-&quot;рыба&quot;, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной &quot;рыбой&quot; для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>\r\n<p>\r\n	Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации &quot;Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..&quot; Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам &quot;lorem ipsum&quot; сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).</p>\r\n<br />\r\n<p>\r\n	Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, &quot;consectetur&quot;, и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги &quot;de Finibus Bonorum et Malorum&quot; (&quot;О пределах добра и зла&quot;), написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, происходит от одной из строк в разделе 1.10.32</p>\r\n<p>\r\n	Классический текст Lorem Ipsum, используемый с XVI века, приведён ниже. Также даны разделы 1.10.32 и 1.10.33 &quot;de Finibus Bonorum et Malorum&quot; Цицерона и их английский перевод, сделанный H. Rackham, 1914 год.</p>\r\n<p>\r\n	Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём. Это делает предлагаемый здесь генератор единственным настоящим Lorem Ipsum генератором. Он использует словарь из более чем 200 латинских слов, а также набор моделей предложений. В результате сгенерированный Lorem Ipsum выглядит правдоподобно, не имеет повторяющихся абзацей или &quot;невозможных&quot; слов.</p>\r\n'),
(27, 24, '/admin/faq/'),
(27, 25, '/faq/'),
(29, 21, ''),
(30, 22, ''),
(31, 23, ''),
(35, 24, '/admin/tender/'),
(35, 25, '/tender/'),
(37, 24, '/admin/calendar/'),
(37, 25, '/calendar/');

-- --------------------------------------------------------

--
-- Структура таблицы `cat_mytype`
--

CREATE TABLE IF NOT EXISTS `cat_mytype` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `dbtype` text NOT NULL,
  `mytype` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `cat_mytype`
--

INSERT INTO `cat_mytype` (`id`, `name`, `dbtype`, `mytype`) VALUES
(1, 'Дата', 'date', 'date'),
(2, 'Дата и время', 'datetime', 'datetime'),
(4, 'Изображение', 'text', 'photo'),
(5, 'Краткое описание', 'text', 'shorttext'),
(6, 'Полное описание', 'text', 'fulltext'),
(7, 'Текстовое поле', 'text', 'string'),
(8, 'Цена', 'money', 'price'),
(9, 'Кол-во', 'int(10) unsigned', 'count'),
(10, 'Да/Нет', 'tinyint(1)', 'yes_no'),
(11, 'Внешняя ссылка', 'text', 'fk');

-- --------------------------------------------------------

--
-- Структура таблицы `cat_stre`
--

CREATE TABLE IF NOT EXISTS `cat_stre` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned NOT NULL,
  `root` int(10) unsigned NOT NULL,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `level` tinyint(3) unsigned NOT NULL,
  `name` text NOT NULL,
  `title` text NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `alias` text NOT NULL,
  `view` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_type_id` (`type_id`),
  KEY `root` (`root`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`),
  KEY `level` (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=47 ;

--
-- Дамп данных таблицы `cat_stre`
--

INSERT INTO `cat_stre` (`id`, `type_id`, `root`, `lft`, `rgt`, `level`, `name`, `title`, `keywords`, `description`, `alias`, `view`) VALUES
(19, 9, 19, 1, 16, 1, 'О центре', '', '', '', 'o_centre', 1),
(21, 16, 19, 10, 11, 2, 'Фотогалереи', '', '', '', 'fotogalereya', 1),
(22, 9, 19, 2, 3, 2, 'Информация о центре', '', '', '', 'informaciya-o-centre', 1),
(23, 9, 19, 4, 5, 2, 'Нормативные документы', '', '', '', 'normativnye-dokumenty', 1),
(24, 9, 19, 6, 7, 2, 'Отделы и сотрудники', '', '', '', 'otdely-i-sotrudniki', 1),
(25, 9, 19, 8, 9, 2, 'Контакты', '', '', '', 'kontakty', 1),
(26, 9, 19, 14, 15, 2, 'Наши партнеры', '', '', '', 'nashi-partnery', 1),
(27, 16, 19, 12, 13, 2, 'Оставить отзыв', '', '', '', 'ostavit-otzyv', 1),
(28, 10, 28, 1, 10, 1, 'Отдел реализации путевок', '', '', '', 'otdel-realizacii-putevok', 1),
(29, 11, 29, 1, 8, 1, 'Информационно-издательский отдел', '', '', '', 'informacionno-izdatel-skiy-otdel', 1),
(30, 12, 30, 1, 10, 1, 'Отдел социальной экспертизы', '', '', '', 'otdel-social-noy-ekspertizy', 1),
(31, 15, 31, 1, 10, 1, 'Методический отдел', '', '', '', 'metodicheskiy-otdel', 1),
(32, 10, 28, 2, 3, 2, 'Информация об отделе', '', '', '', 'informaciya-ob-otdele', 1),
(33, 10, 28, 4, 5, 2, 'Летняя оздоровительная кампания', '', '', '', 'letnyaya-ozdorovitel-naya-kampaniya', 1),
(34, 10, 28, 6, 7, 2, 'Лагеря, участвующие в муниципальном конкурсе', '', '', '', 'lagerya-uchastvuyuschie-v-municipal-nom-konkurse', 1),
(35, 16, 28, 8, 9, 2, 'Статус заявки', '', '', '', 'status-zayavki', 1),
(36, 11, 29, 2, 3, 2, 'Информация об отделе', '', '', '', 'informaciya-ob-otdele2', 1),
(37, 16, 29, 4, 5, 2, 'Календарь каникул', '', '', '', 'kalendar-kanikul', 1),
(38, 11, 29, 6, 7, 2, 'Услуги', '', '', '', 'uslugi', 1),
(39, 12, 30, 2, 3, 2, 'Информация об отделе', '', '', '', 'informaciya-ob-otdele3', 1),
(40, 13, 30, 4, 9, 2, 'Проекты', '', '', '', 'proekty', 1),
(41, 12, 30, 5, 6, 3, 'Проект 1', '', '', '', 'proekt-1', 1),
(42, 12, 30, 7, 8, 3, 'Проект 2', '', '', '', 'proekt-2', 1),
(43, 15, 31, 2, 3, 2, 'Информация об отделе', '', '', '', 'informaciya-ob-otdele4', 1),
(44, 14, 31, 4, 9, 2, 'Проекты', '', '', '', 'proekty2', 1),
(45, 15, 31, 5, 6, 3, 'Проект 3', '', '', '', 'proekt-3', 1),
(46, 15, 31, 7, 8, 3, 'Проект 4', '', '', '', 'proekt-4', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `cat_type`
--

CREATE TABLE IF NOT EXISTS `cat_type` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `cat_type`
--

INSERT INTO `cat_type` (`id`, `name`) VALUES
(9, 'О центре: страница'),
(10, 'Отдел реализации путевок: страница'),
(11, 'Информационно-издательский отдел: страница'),
(12, 'Отдел социальной экспертизы: страница'),
(13, 'Отдел социальной экспертизы: раздел'),
(14, 'Методический отдел: раздел'),
(15, 'Методический отдел: страница'),
(16, 'Внешняя ссылка');

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats`
--

CREATE TABLE IF NOT EXISTS `db_stats` (
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `size` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `db_stats`
--

INSERT INTO `db_stats` (`date`, `size`) VALUES
('2014-07-06 13:15:49', 0.79),
('2014-07-08 02:00:50', 0.79),
('2014-07-08 14:56:20', 0.79),
('2014-07-10 02:14:48', 0.79),
('2014-07-20 08:56:28', 0.79),
('2014-07-22 05:19:11', 0.80),
('2014-07-23 04:13:58', 0.80),
('2014-07-30 07:14:01', 0.80),
('2014-08-01 05:34:57', 0.81),
('2014-08-02 03:57:48', 0.81),
('2014-09-25 16:42:28', 0.81),
('2014-11-30 11:24:35', 0.81),
('2015-01-30 15:02:32', 0.81),
('2015-02-17 10:40:06', 0.81),
('2015-02-21 04:34:19', 0.81),
('2015-06-11 03:11:30', 0.81),
('2015-09-16 04:19:59', 0.81),
('2015-09-22 04:45:43', 0.81),
('2015-09-26 17:40:34', 0.81),
('2015-09-30 07:44:22', 0.81),
('2015-11-26 11:03:23', 0.81),
('2015-12-06 03:33:51', 0.81),
('2015-12-11 16:39:09', 0.81),
('2015-12-26 05:10:56', 0.79);

-- --------------------------------------------------------

--
-- Структура таблицы `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `used` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `email`
--

INSERT INTO `email` (`id`, `email`, `used`) VALUES
(1, 'fobihz23@mail.ru', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `is_answered` tinyint(1) NOT NULL,
  `is_viewed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `htitle` text NOT NULL,
  `date` datetime NOT NULL,
  `title` text NOT NULL,
  `shorttext` text NOT NULL,
  `fulltext` text NOT NULL,
  `img` text NOT NULL,
  `view` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `name` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `title`, `keywords`, `description`, `name`, `text`) VALUES
(1, 'Главная', 'Tongqi (Shiyan) Engine Components Manufacturing Co., Ltd. \r\n4 bt cummins,\r\n4bt cummins,\r\n5.9 cummins,\r\nCat,\r\nHitachi,\r\naftermarket cummins parts,\r\nc ummins,\r\ncaterpillar parts,\r\nchina cummins,\r\ncummings engine,\r\ncummins 2014,\r\ncummins 4,\r\ncummins 4 bt,\r\ncummins 4bt,\r\ncummins 5.9,\r\ncummins 6,\r\ncummins 6 bt,\r\ncummins 6bt,\r\ncummins 6ct 8.3,\r\ncummins 8 3,\r\ncummins aftermarket parts,\r\ncummins bt,\r\ncummins bt 4,\r\ncummins china,\r\ncummins cummins,\r\ncummins cummins cummins,\r\ncummins diesel,\r\ncummins diesel generator,\r\ncummins diesels,\r\ncummins dongfeng,\r\ncummins engine parts,\r\ncummins generator,\r\ncummins generators,\r\ncummins genset,\r\ncummins gensets,\r\ncummins isde,\r\ncummins isf,\r\ncummins isf 2 8,\r\ncummins isf3.8,\r\ncummins isle,\r\ncummins isx,\r\ncummins isx parts,\r\ncummins kta,\r\ncummins ktta,\r\ncummins l,\r\ncummins motor,\r\ncummins motors,\r\ncummins n14,\r\ncummins part,\r\ncummins parts,\r\ncummins power,\r\ncummins power generation,\r\ncummins power generator,\r\ncummins power generators,\r\ncummins spare parts,\r\ncummins turbo diesel,\r\ncummins в россии,\r\ncummins двигатели,\r\ncummins двигатель,\r\ncummins запчасти,\r\ncummins россия,\r\ncummins цена,\r\ndetroit diesel,\r\ndiesel generator,\r\ndiesel generator set,\r\ndiesel parts,\r\ndiesel power,\r\ndongfeng cummins,\r\nfleetguard,\r\ngenerator cummins,\r\ngenerators cummins,\r\ngenset cummins,\r\nisf cummins,\r\nisf3.8 cummins,\r\nkta cummins,\r\nmopar parts,\r\nmotor cummins,\r\nmotor cummins 6bt,\r\npower cummins,\r\nдвигатели cummins,\r\nдвигатели камминз,\r\nдвигатель cummins,\r\nдвигатель камминз,\r\nдвигатель камминз цена,\r\nдвигатель камминс,\r\nдизель генераторы cummins,\r\nдизельная электростанция cummins,\r\nдизельный двигатель cummins,\r\nзапасные части cummins,\r\nзапчасти cummins,\r\nзапчасти для cummins,\r\nзапчасти для двигателей cummins,\r\nзапчасти для двигателя cummins,\r\nзапчасти камминз,\r\nзапчасти на cummins,\r\nзапчасти на двигатель cummins,\r\nкаменс,\r\nкаминс,\r\nкамминз,\r\nкамминз россия,\r\nкамминс,\r\nкаталог запчастей cummins,\r\nкомпания камминз,\r\nремонт cummins,\r\nремонт двигателей cummins,\r\nфильтры cummins,\r\nфорсунка cummins,\r\nцена cummins', 'Запчасти, двигатели, Cummins', 'Главная', '<p>\r\n	<span style="display: none;">&nbsp;</span></p>\r\n<div style="text-align: center;">\r\n	<h3 style="color:blue;">\r\n		<span style="color:#000000;"><strong><span style="font-size:18px;">Рады приветствовать Вас на сайте нашей компании</span></strong></span></h3>\r\n</div>\r\n<div style="text-align: center;">\r\n	<strong style="color: rgb(0, 0, 0); font-size: 14px;">Мы находимся в городе Шиянь, провинция Хубэй, Китай и являемся крупнейшим поставщиком заводов CCEC (Chongqing Cummins Engine Company) &nbsp;и завода DCEC (Dongfeng Cummins Engine Company). Мы поставляем технику, двигатели и&nbsp;</strong><strong style="color: rgb(0, 0, 0); font-size: 14px;">запчасти уже</strong><strong style="color: rgb(0, 0, 0); font-size: 14px;">&nbsp;более 10 лет. &nbsp;</strong></div>\r\n<div style="text-align: center;">\r\n	<span style="color:#000000;"><strong><span style="font-size:14px;"><span style="font-family: Arial, Helvetica, sans-serif; line-height: 28px;">МЫ являемся частью большого холдинга куда входят заводы по производтву запчастей и траков. </span></span></strong></span></div>\r\n<div style="text-align: center;">\r\n	<span style="color:#000000;"><strong><span style="font-size:14px;"><span style="font-family: Arial, Helvetica, sans-serif; line-height: 28px;">Наше подразделение занимается поставкой </span></span></strong></span></div>\r\n<div style="text-align: center;">\r\n	<span style="color:#000000;"><strong><span style="font-size:14px;"><span style="font-family: Arial, Helvetica, sans-serif; line-height: 28px;">оригинальных запчатей и&nbsp;</span></span></strong><strong><span style="font-size:14px;"><span style="font-family: Arial, Helvetica, sans-serif; line-height: 28px;">двигателей Cummins&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; line-height: 28px;">как со своего склада так напрямую с завода Cummins</span></span></strong></span></div>\r\n<div style="text-align: center;">\r\n	<span style="color:#000000;"><span style="font-size:14px;"><strong>У нас огромный ассортимент запчастей на двигатели Cummins, &nbsp;а также новые двигатели Cummins в наличии:</strong></span></span></div>\r\n<div style="text-align: center;">\r\n	&nbsp;</div>\r\n<div style="text-align: center;">\r\n	<span style="font-size:16px;"><strong><span style="color:#ff0000;">4 BT series, &nbsp;6 BT Series, 6 CT Series</span></strong></span></div>\r\n<div style="text-align: center;">\r\n	&nbsp;</div>\r\n<div style="text-align: center;">\r\n	<span style="font-size:16px;"><strong><span style="color:#ff0000;">ISDE, ISLE, ISF 2,8; ISF 3,8</span></strong></span></div>\r\n<div style="text-align: center;">\r\n	&nbsp;</div>\r\n<div style="text-align: center;">\r\n	<span style="font-size:16px;"><strong><span style="color:#ff0000;">L Series, EQB Series</span></strong></span></div>\r\n<div style="text-align: center;">\r\n	&nbsp;</div>\r\n<div style="text-align: center;">\r\n	<span style="font-size:16px;"><strong><span style="color:#ff0000;">KTA, KTTA</span></strong></span></div>\r\n<div style="text-align: center;">\r\n	&nbsp;</div>\r\n<div style="text-align: center;">\r\n	<span style="font-size:14px;"><strong><span style="color:#000000;">Подготовка запчастей к отправке не превышает 3-7 дней. Налажена доставка грузов до приграничных городов таких как Суфэньхэ, Хэйхэ, Урумчи, Маньчжурия и др.</span></strong></span></div>\r\n<div style="text-align: center;">\r\n	&nbsp;</div>\r\n<div style="text-align: center;">\r\n	&nbsp;</div>\r\n<div style="text-align: center;">\r\n	<strong><span style="font-size:14px;"><span style="color:#000000;">Наши цены самые конкурентные, просто отправьте запрос - и убедитесь в этом сами.</span></span></strong></div>\r\n<div style="text-align: center;">\r\n	&nbsp;</div>\r\n<div style="text-align: center;">\r\n	<img alt="" src="/userfiles/editor/images/16.jpg" style="width: 600px; height: 414px;" /></div>\r\n'),
(2, 'Новости', 'поставка\r\nдоставка\r\nКитай\r\nКнР\r\nорганизация\r\nоборудование\r\nстанки\r\nпоиск\r\nпоставщик', 'Основное направление деятельности нашей компании - это поставка оригинальных запчатей и двигателей Cummins, мы являемся крупнейшим официальным авторизованным дилером Cummins в Китае.', 'Новости', '<p style="text-align: center;">\r\n	<b style="color: rgb(0, 0, 0); font-family: ''trebuchet ms'', helvetica, sans-serif; font-size: 18px;">В связи с расширинием деятельнсоти предлагаем услуги по поиску поставщиков, организации полного цикла поставки любой продукции &nbsp;от производителя в Китае до Вашего склада в России.&nbsp;</b></p>\r\n<p style="text-align: center;">\r\n	<font color="#000000" face="trebuchet ms, helvetica, sans-serif"><span style="font-size: 18px;"><b>Основное направление деятельности нашей компании - это поставка оригинальных запчатей и двигателей Cummins, мы являемся крупнейшим официальным &nbsp;дилером Cummins в Китае.</b></span></font></p>\r\n<p style="text-align: center;">\r\n	<b style="color: rgb(0, 0, 0); font-family: ''trebuchet ms'', helvetica, sans-serif; font-size: 18px;">У нас достигнуты договоренности с таможенными декларантами и перевозчиками, найти нужного Вам производителя или поставщика,&nbsp;</b><b style="color: rgb(0, 0, 0); font-family: ''trebuchet ms'', helvetica, sans-serif; font-size: 18px;">организовать доставку для нас не составит большого труда.</b></p>\r\n<p style="text-align: center;">\r\n	<span style="color:#ff0000;"><span style="font-size:18px;"><strong>Уверен, с нами вы построите успешный бизнес между Россией и Китаем.</strong></span></span></p>\r\n<p style="text-align: center;">\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<span style="font-size:16px;"><em style="font-family: ''trebuchet ms'', helvetica, sans-serif; color: rgb(0, 0, 0);"><strong>По всем вопросам обращайтесь пожалуйста:</strong></em></span></p>\r\n<div style="color: rgb(68, 68, 68); font-family: Arial, Helvetica, sans-serif; text-align: center;">\r\n	<strong><span style="font-size:16px;"><em style="font-family: ''trebuchet ms'', helvetica, sans-serif; color: rgb(0, 0, 0);">Skype: cumminsparts1</em></span></strong></div>\r\n<div style="text-align: center;">\r\n	<em><span style="font-size:16px;"><font color="#000000" face="trebuchet ms, helvetica, sans-serif"><b>Email: cumminsparts@mail.ru</b></font></span></em></div>\r\n<div style="text-align: center;">\r\n	<em><span style="font-size:14px;"><strong><span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; line-height: 22px;">TEL. +852 8198 2350</span></strong></span></em></div>\r\n<div style="text-align: center;">\r\n	&nbsp;</div>\r\n<div style="color: rgb(68, 68, 68); font-family: Arial, Helvetica, sans-serif; text-align: center;">\r\n	&nbsp;</div>\r\n<p style="text-align: center;">\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	&nbsp;</p>\r\n'),
(3, 'Продукция', '', '', 'Продукция', ''),
(4, 'Запчасти', '', '', 'Запчасти', '<div style="color: rgb(68, 68, 68); font-family: Arial, Helvetica, sans-serif; text-align: center;">\r\n	&nbsp;</div>\r\n<div style="color: rgb(68, 68, 68); font-family: Arial, Helvetica, sans-serif; text-align: center;">\r\n	<span style="font-size: 14px;"><strong><span style="color: rgb(0, 0, 0);">Мы рады Вам предложить оригинальные запчасти Cummins напрямую с завода China Cummins и FOTON. У нас в наличии очень много запчастей на большинство двигателей, который производятся в Китае, такие как:</span></strong></span></div>\r\n<div style="color: rgb(68, 68, 68); font-family: Arial, Helvetica, sans-serif; text-align: center;">\r\n	&nbsp;</div>\r\n<div style="color: rgb(68, 68, 68); font-family: Arial, Helvetica, sans-serif; text-align: center;">\r\n	<span style="font-size: 16px;"><strong>4 BT series, 6 BT Series, 6 CT Series,&nbsp;</strong></span><strong style="font-size: 16px;">ISDE, ISLE, ISF 2,8, ISF 3,8,&nbsp;</strong><strong style="font-size: 16px;">L Series, EQB Series,&nbsp;</strong><strong style="font-size: 16px;">KTA, KTTA.</strong></div>\r\n<div style="color: rgb(68, 68, 68); font-family: Arial, Helvetica, sans-serif; text-align: center;">\r\n	&nbsp;</div>\r\n<div style="font-family: Arial, Helvetica, sans-serif; text-align: center;">\r\n	<font color="#000000"><span style="font-size: 14px;"><b>Ждем от Вас запросов на расценку необходимых Вам запчастей с каталожными номерами.</b></span></font></div>\r\n<div style="font-family: Arial, Helvetica, sans-serif; text-align: center;">\r\n	&nbsp;</div>\r\n<div style="font-family: Arial, Helvetica, sans-serif; text-align: center;">\r\n	<img alt="" src="/userfiles/editor/images/-2fa48988cc63e7da.jpg" style="width: 380px; height: 299px; border-width: 2px; border-style: solid;" /><img alt="" src="/userfiles/editor/images/IMG20140514164806.jpg" style="width: 373px; height: 299px; border-width: 2px; border-style: solid;" /></div>\r\n<div style="font-family: Arial, Helvetica, sans-serif; text-align: center;">\r\n	<font color="#000000"><span style="font-size: 14px;"><b><img alt="" src="/userfiles/editor/images/IMG_0170.jpg" style="width: 377px; height: 278px; border-width: 2px; border-style: solid;" /><img alt="" src="/userfiles/editor/images/IMG_0171.jpg" style="width: 376px; height: 278px; border-width: 2px; border-style: solid;" /></b></span></font></div>\r\n<div style="color: rgb(68, 68, 68); font-family: Arial, Helvetica, sans-serif; text-align: center;">\r\n	<img alt="" src="/userfiles/editor/images/1234567.JPG" style="color: rgb(34, 34, 34); font-family: Arial, Verdana, sans-serif; width: 350px; height: 361px; border-width: 2px; border-style: solid;" /><img alt="" src="/userfiles/editor/images/3631241-1.jpg" style="width: 402px; height: 360px; border-width: 2px; border-style: solid;" /></div>\r\n<div style="color: rgb(68, 68, 68); font-family: Arial, Helvetica, sans-serif; text-align: center;">\r\n	<img alt="" src="/userfiles/editor/images/1.JPG" style="width: 350px; height: 263px; border-width: 2px; border-style: solid;" /></div>\r\n'),
(5, 'Двигатели', '', '', 'Двигатели', '<p style="text-align: center;">\r\n	<span style="color:#000000;"><strong style="text-align: center;"><span style="font-size: 14px;">У нашей компании в наличии очень много двигателей Cummins, как новых так и консервированных. </span></strong></span></p>\r\n<p style="text-align: center;">\r\n	<font color="#000000"><span style="font-size: 14px;"><b>Работаем напрямую с заводоми Cummins China, приглашаем клиентов на приемку и отгрузку двигателей.</b></span></font></p>\r\n<p style="text-align: center;">\r\n	<span style="color:#000000;"><strong style="text-align: center;"><span style="font-size: 14px;">Примеры цен на двигатели:</span></strong></span></p>\r\n<p style="text-align: center;">\r\n	<span style="color:#000000;"><span style="font-size:14px;"><strong><span style="font-family: Arial, Tahoma, Verdana, sans-serif; line-height: 18.200000762939453px;">EQB 5,9 180-20 -5000 USD</span><br style="font-family: Arial, Tahoma, Verdana, sans-serif; font-size: 13px; line-height: 18.200000762939453px;" />\r\n	<span style="font-family: Arial, Tahoma, Verdana, sans-serif; line-height: 18.200000762939453px;">4 ISBE 185 - 7100 USD</span><br style="font-family: Arial, Tahoma, Verdana, sans-serif; font-size: 13px; line-height: 18.200000762939453px;" />\r\n	<span style="font-family: Arial, Tahoma, Verdana, sans-serif; line-height: 18.200000762939453px;">6 ISBE 285 - 9600 USD</span><br style="font-family: Arial, Tahoma, Verdana, sans-serif; font-size: 13px; line-height: 18.200000762939453px;" />\r\n	<span style="font-family: Arial, Tahoma, Verdana, sans-serif; line-height: 18.200000762939453px;">L 360 - 9600 USD</span><br style="font-family: Arial, Tahoma, Verdana, sans-serif; font-size: 13px; line-height: 18.200000762939453px;" />\r\n	<span style="font-family: Arial, Tahoma, Verdana, sans-serif; line-height: 18.200000762939453px;">L 325-20 - 9600 USD</span><br style="font-family: Arial, Tahoma, Verdana, sans-serif; font-size: 13px; line-height: 18.200000762939453px;" />\r\n	<span style="font-family: Arial, Tahoma, Verdana, sans-serif; line-height: 18.200000762939453px;">ISLE 340 - 11800 USD&nbsp;</span><br style="font-family: Arial, Tahoma, Verdana, sans-serif; font-size: 13px; line-height: 18.200000762939453px;" />\r\n	<span style="font-family: Arial, Tahoma, Verdana, sans-serif; line-height: 18.200000762939453px;">ISLE 375 - 12 600 USD</span><br style="font-family: Arial, Tahoma, Verdana, sans-serif; font-size: 13px; line-height: 18.200000762939453px;" />\r\n	<span style="font-family: Arial, Tahoma, Verdana, sans-serif; line-height: 18.200000762939453px;">6BTA5.9-C - 10 250 USD</span><br style="font-family: Arial, Tahoma, Verdana, sans-serif; font-size: 13px; line-height: 18.200000762939453px;" />\r\n	<span style="font-family: Arial, Tahoma, Verdana, sans-serif; line-height: 18.200000762939453px;">KTA 19 - &nbsp; 45 000 USD</span><br style="font-family: Arial, Tahoma, Verdana, sans-serif; font-size: 13px; line-height: 18.200000762939453px;" />\r\n	<span style="font-family: Arial, Tahoma, Verdana, sans-serif; line-height: 18.200000762939453px;">KTTA 19 - 52 000 USD<br />\r\n	KTA 38 P830 - 76 000USD<br />\r\n	KTA 38 P1400 - 119 000 USD</span></strong></span></span></p>\r\n<p style="text-align: center;">\r\n	<span style="color:#000000;"><span style="font-size:14px;"><strong><span style="font-family: Arial, Tahoma, Verdana, sans-serif; line-height: 18.200000762939453px;"><img alt="" src="/userfiles/editor/images/IMG_20131112_111429.jpg" style="width: 250px; height: 333px; border-width: 2px; border-style: solid;" /><img alt="" src="/userfiles/editor/images/-7e4eb702b61926e7.jpg" style="width: 430px; height: 333px; border-width: 2px; border-style: solid;" /></span></strong></span></span></p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/userfiles/editor/images/IMAG1675.jpg" style="width: 372px; height: 233px; border-width: 2px; border-style: solid;" /><img alt="" src="/userfiles/editor/images/image-27-02-14-15-18.jpeg" style="width: 310px; height: 233px; border-width: 2px; border-style: solid;" /></p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/userfiles/editor/images/KTA50 (1).jpg" style="width: 686px; height: 488px; border-width: 2px; border-style: solid;" /></p>\r\n'),
(6, 'Спецтехника', '', '', 'Спецтехника', '<p style="text-align: center;">\r\n	<strong style="text-align: center;"><span style="font-size: 14px;">Приносим свои извинения, в настоящий момент мы работаем над этой страницей.</span></strong></p>\r\n'),
(7, 'Доставка', '', '', 'Доставка', '<div style="text-align: center;">\r\n	&nbsp;</div>\r\n<div style="text-align: center;">\r\n	<span style="color:#000000;"><span style="font-size:16px;"><strong>Мы с радостью готовы предложить Вам доставку до любого города в Китае, также у нас есть партнеры-перевозчики, которые сделают &nbsp;таможенную очистку через город&nbsp;</strong></span></span><strong style="font-size: 16px; color: rgb(0, 0, 0);">Суйфэньхэ или Урумчи &nbsp;с использованием складов перевозчика.</strong></div>\r\n<div style="text-align: center;">\r\n	&nbsp;</div>\r\n<div style="text-align: center;">\r\n	<strong style="font-size: 16px; color: rgb(0, 0, 0); vertical-align: sub;">Максимальная таможенная ставка будет составлять 3,2 $ за кг.&nbsp;</strong></div>\r\n<div style="text-align: center;">\r\n	&nbsp;</div>\r\n<div style="text-align: center;">\r\n	<sub><strong style="color: rgb(0, 0, 0); font-size: 16px;">При больших объемах ставка уменьшается.&nbsp;</strong></sub></div>\r\n<div style="text-align: center;">\r\n	&nbsp;</div>\r\n<div style="text-align: center;">\r\n	<em style="color: rgb(0, 0, 0);"><span style="font-size:14px;"><strong>Сроки доставки грузов:&nbsp;</strong></span></em></div>\r\n<p style="text-align: center;">\r\n	<span style="color:#000000;"><em><strong style="font-size: 14px;">г. Шиянь (наша компания) - г. Суйфэньхэ (склад декларанта) - 7-10 дней</strong></em></span></p>\r\n<p style="text-align: center;">\r\n	<span style="font-size:14px;"><strong><img alt="" src="/userfiles/editor/images/28690-express-delivery-of-goods.jpg" style="width: 800px; height: 496px;" /></strong></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n'),
(8, 'Контакты', '4 bt cummins,\r\n4bt cummins,\r\n5.9 cummins,\r\nCat,\r\nHitachi,\r\naftermarket cummins parts,\r\nc ummins,\r\ncaterpillar parts,\r\nchina cummins,\r\ncummings engine,\r\ncummins 2014,\r\ncummins 4,\r\ncummins 4 bt,\r\ncummins 4bt,\r\ncummins 5.9,\r\ncummins 6,\r\ncummins 6 bt,\r\ncummins 6bt,\r\ncummins 6ct 8.3,\r\ncummins 8 3,\r\ncummins aftermarket parts,\r\ncummins bt,\r\ncummins bt 4,\r\ncummins china,\r\ncummins cummins,\r\ncummins cummins cummins,\r\ncummins diesel,\r\ncummins diesel generator,\r\ncummins diesels,\r\ncummins dongfeng,\r\ncummins engine parts,\r\ncummins generator,\r\ncummins generators,\r\ncummins genset,\r\ncummins gensets,\r\ncummins isde,\r\ncummins isf,\r\ncummins isf 2 8,\r\ncummins isf3.8,\r\ncummins isle,\r\ncummins isx,\r\ncummins isx parts,\r\ncummins kta,\r\ncummins ktta,\r\ncummins l,\r\ncummins motor,\r\ncummins motors,\r\ncummins n14,\r\ncummins part,\r\ncummins parts,\r\ncummins power,\r\ncummins power generation,\r\ncummins power generator,\r\ncummins power generators,\r\ncummins spare parts,\r\ncummins turbo diesel,\r\ncummins в россии,\r\ncummins двигатели,\r\ncummins двигатель,\r\ncummins запчасти,\r\ncummins россия,\r\ncummins цена,\r\ndetroit diesel,\r\ndiesel generator,\r\ndiesel generator set,\r\ndiesel parts,\r\ndiesel power,\r\ndongfeng cummins,\r\nfleetguard,\r\ngenerator cummins,\r\ngenerators cummins,\r\ngenset cummins,\r\nisf cummins,\r\nisf3.8 cummins,\r\nkta cummins,\r\nmopar parts,\r\nmotor cummins,\r\nmotor cummins 6bt,\r\npower cummins,\r\nдвигатели cummins,\r\nдвигатели камминз,\r\nдвигатель cummins,\r\nдвигатель камминз,\r\nдвигатель камминз цена,\r\nдвигатель камминс,\r\nдизель генераторы cummins,\r\nдизельная электростанция cummins,\r\nдизельный двигатель cummins,\r\nзапасные части cummins,\r\nзапчасти cummins,\r\nзапчасти для cummins,\r\nзапчасти для двигателей cummins,\r\nзапчасти для двигателя cummins,\r\nзапчасти камминз,\r\nзапчасти на cummins,\r\nзапчасти на двигатель cummins,\r\nкаменс,\r\nкаминс,\r\nкамминз,\r\nкамминз россия,\r\nкамминс,\r\nкаталог запчастей cummins,\r\nкомпания камминз,\r\nремонт cummins,\r\nремонт двигателей cummins,\r\nфильтры cummins,\r\nфорсунка cummins,\r\nцена cummins', '', 'Котакты', '<p style="text-align: center;">\r\n	<span style="color:#000000;"><strong><span style="font-size:14px;">Ждем Ваших запросов по указанным ниже адресам, с радостью ответим на любые вопросы:</span></strong></span></p>\r\n<p style="text-align: center;">\r\n	<span style="color:#000000;"><em style="font-size: 14px;"><strong>Департамент по работе с клиентами из России и стран СНГ</strong></em></span></p>\r\n<p style="text-align: center;">\r\n	<span style="color:#000000;"><em style="font-size: 18px; color: rgb(0, 0, 0);"><strong>cumminsparts@mail.ru</strong></em></span></p>\r\n<p style="text-align: center;">\r\n	<span style="color:#000000;"><em style="font-size: 18px;"><strong>cummins1@mail.ru</strong></em></span></p>\r\n<p style="text-align: center;">\r\n	<span style="color:#000000;"><span style="font-size:18px;"><em><strong>Skype: cumminsparts1</strong></em></span></span></p>\r\n<p style="text-align: center;">\r\n	<span style="color:#000000;"><span style="font-size:18px;"><span style="font-family: Arial, Helvetica, sans-serif; line-height: 22px;">TEL. +852 8198 2350</span></span></span></p>\r\n<table border="0" cellpadding="0" cellspacing="0" style="font-family: Arial, Helvetica, sans-serif;" width="95%">\r\n	<tbody>\r\n		<tr>\r\n			<td align="left" height="450" style="margin: 0px; line-height: 28px; color: rgb(51, 51, 51);" valign="top">\r\n				<table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n					<tbody>\r\n						<tr>\r\n							<td height="30" style="margin: 0px;" valign="middle">\r\n								<p style="text-align: center;">\r\n									<strong><span style="color:#000000;"><span style="font-size:16px;">&nbsp; &nbsp; &nbsp;</span></span><span style="color:#000000;"><span style="font-size:16px;">Address: No.1 of 5th,the automobile fitting of bailang&nbsp;<br />\r\n									development district, shiyan, hubei, China</span></span></strong></p>\r\n								<p style="text-align: center;">\r\n									<span style="font-size:16px;"><img alt="" src="/userfiles/editor/images/pic.jpg" style="width: 700px; height: 438px;" /></span></p>\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n<hr />\r\n<p>\r\n	&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `phg_photo`
--

CREATE TABLE IF NOT EXISTS `phg_photo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phid` int(10) unsigned NOT NULL,
  `name` text NOT NULL,
  `title` text NOT NULL,
  `pos` double NOT NULL,
  `view` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_phid` (`phid`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `phg_photogallery`
--

CREATE TABLE IF NOT EXISTS `phg_photogallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `text` text NOT NULL,
  `pos` double NOT NULL,
  `view` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `phg_photogallery`
--

INSERT INTO `phg_photogallery` (`id`, `name`, `text`, `pos`, `view`) VALUES
(1, 'Фотогалерея 1', '', 0, 1),
(2, 'Новая фотогаллерея', '', 1, 1),
(3, 'Наши работы', '', -1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`user_id`, `lastname`, `firstname`, `birthday`) VALUES
(3, 'Наседкин', 'Дмитрий', '1989-01-23'),
(5, 'Астахов', 'Сергей', '2014-07-06');

-- --------------------------------------------------------

--
-- Структура таблицы `profiles_fields`
--

CREATE TABLE IF NOT EXISTS `profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `profiles_fields`
--

INSERT INTO `profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(3, 'birthday', 'Birthday', 'DATE', 0, 0, 2, '', '', '', '', '0000-00-00', 'UWjuidate', '{"ui-theme":"redmond"}', 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `Rights`
--

CREATE TABLE IF NOT EXISTS `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `userfiles_stats`
--

CREATE TABLE IF NOT EXISTS `userfiles_stats` (
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `size` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `userfiles_stats`
--

INSERT INTO `userfiles_stats` (`date`, `size`) VALUES
('2014-07-06 13:15:49', 2.02),
('2014-07-08 02:00:50', 1.02),
('2014-07-08 14:56:20', 1.02),
('2014-07-10 02:14:48', 3.04),
('2014-07-20 08:56:28', 3.04),
('2014-07-22 05:19:11', 3.63),
('2014-07-23 04:13:58', 3.63),
('2014-07-30 07:14:01', 3.63),
('2014-08-01 05:34:57', 5.19),
('2014-08-02 03:57:48', 5.19),
('2014-09-25 16:42:28', 5.19),
('2014-11-30 11:24:35', 5.19),
('2015-01-30 15:02:32', 5.19),
('2015-02-17 10:40:06', 5.77),
('2015-02-21 04:34:19', 13.35),
('2015-06-11 03:11:30', 13.35),
('2015-09-16 04:19:59', 13.40),
('2015-09-22 04:45:43', 13.40),
('2015-09-26 17:40:34', 13.40),
('2015-09-30 07:44:22', 13.40),
('2015-11-26 11:03:23', 13.40),
('2015-12-06 03:33:51', 13.40),
('2015-12-11 16:39:09', 31.49),
('2015-12-26 05:10:56', 31.49);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES
(3, 'fobihz', 'f03979d0eb95fad0063b2ecb66469165', 'fobihz23@mail.ru', '5512ac6f92369233cefd02bcfff91766', 1317029626, 1451106655, 1, 1),
(5, 'cummins', '862845d121a2468d3b6b53df34a8fb8a', 'cumminsparts@mail.ru', '3377eb450400348ed3a1703dee6d5db0', 1404651847, 1449851949, 1, 1);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_2` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `AuthItemChild_ibfk_3` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_4` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cat_attr`
--
ALTER TABLE `cat_attr`
  ADD CONSTRAINT `cat_attr_ibfk_4` FOREIGN KEY (`mytype_id`) REFERENCES `cat_mytype` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_attr_ibfk_5` FOREIGN KEY (`type_id`) REFERENCES `cat_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_attr_ibfk_2` FOREIGN KEY (`mytype_id`) REFERENCES `cat_mytype` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_attr_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `cat_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cat_attr_val`
--
ALTER TABLE `cat_attr_val`
  ADD CONSTRAINT `cat_attr_val_ibfk_4` FOREIGN KEY (`id_attr`) REFERENCES `cat_attr` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_attr_val_ibfk_5` FOREIGN KEY (`id_elem`) REFERENCES `cat_stre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_attr_val_ibfk_2` FOREIGN KEY (`id_attr`) REFERENCES `cat_attr` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_attr_val_ibfk_3` FOREIGN KEY (`id_elem`) REFERENCES `cat_stre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cat_stre`
--
ALTER TABLE `cat_stre`
  ADD CONSTRAINT `cat_stre_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `cat_type` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_stre_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `cat_type` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `phg_photo`
--
ALTER TABLE `phg_photo`
  ADD CONSTRAINT `phg_photo_ibfk_2` FOREIGN KEY (`phid`) REFERENCES `phg_photogallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phg_photo_ibfk_1` FOREIGN KEY (`phid`) REFERENCES `phg_photogallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Rights`
--
ALTER TABLE `Rights`
  ADD CONSTRAINT `Rights_ibfk_2` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

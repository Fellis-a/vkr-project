-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2022 at 06:51 AM
-- Server version: 8.0.25
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vkr2`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2021_05_29_042133_create_users_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(4, '2021_05_29_072438_create_password_resets_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('2012alis@mail.ru', '$2y$10$ffA0GCzTpInzFgYhMLOz4uf9sV8GpeO5HrmueUBuDqynU0DDoQb7O', '2021-05-30 04:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(64) NOT NULL,
  `type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `code`, `title`, `type`) VALUES
(1, 'АСУб', 'Информатика и вычислительная техника', '1'),
(2, 'ЭВМб', 'Информатика и вычислительная техника', '1'),
(3, 'ИСТбп', 'Информационные системы и технологии (прикладной бакалавриат)', '1'),
(4, 'ИСМб', 'Информационные системы и технологии в машиностроении', '1'),
(5, 'ИСТб', 'Информационные системы и технологии в администрировании', '1'),
(6, 'ИБб', 'Информационная безопасность', '1'),
(7, 'ИИТм', 'Информатика', '2'),
(8, 'КСм', 'Информатика', '2'),
(9, 'АУДм', 'Информатика', '2'),
(10, 'ИСТм', 'Информатика', '2'),
(11, 'АСУбз', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int NOT NULL,
  `title` varchar(45) NOT NULL,
  `note` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `title`, `note`) VALUES
(1, 'UI', 'пользовательский интерфейс'),
(2, 'UX', 'пользовательский опыт'),
(3, 'Web', '...'),
(4, 'Экспертная система', ''),
(5, 'Распознавание речи', ''),
(6, 'ORM', ''),
(7, 'ГИС', ''),
(8, 'ГГИС', ''),
(9, 'Android', ''),
(10, 'LMS', ''),
(11, 'Анализ поведения пользователя ', ''),
(12, 'SAP', ''),
(13, 'АСУ', ''),
(14, 'Машиное обучение', ''),
(15, 'Комплексные сети ', ''),
(16, '3D-модели', ''),
(17, 'Когнитивные карты', ''),
(18, 'Распознавание образов', ''),
(19, 'ИС', ''),
(20, 'VR/AR', ''),
(21, 'БД', ''),
(22, 'Виртуализация', ''),
(23, 'Асинхронное программирование', ''),
(24, 'REST', ''),
(25, 'CI/CD', ''),
(26, 'Многослойная архитектура', ''),
(27, 'КИС', ''),
(28, 'Нейронные сети', ''),
(29, 'Автматизированное тестирование ПО', ''),
(30, 'Модель логистической регрессии', ''),
(31, 'Адаптивная сеть нечеткого вывода ANFIS', ''),
(32, 'Моделирование кинематического управления', ''),
(33, 'Имитационное моделирование', ''),
(34, 'Логика', ''),
(35, 'БЗ', ''),
(36, 'АС', ''),
(37, 'API', ''),
(38, 'Статистический анализ', ''),
(39, 'IOS', ''),
(40, 'AR', ''),
(41, 'Геометрическое программирование', ''),
(42, 'Методы оптимизации', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id_teach` int NOT NULL,
  `fio` varchar(64) NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `link` varchar(100) NOT NULL,
  `information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id_teach`, `fio`, `email`, `link`, `information`) VALUES
(1, 'Аршинский Вадим Леонидович', 'arshinskyv@mail.ru', 'http://www.istu.edu/ob_irnitu/person/arshinskiy_vadim_leonidovich', 'кандидат технических наук, доцент\n - доцент, Руководитель центра программной инженерии, доцент института информационных технологий и анализа данных, Ученый совет ИАиАД - член Ученого совета\nаудитория: В-107 \nтелефоны: +7 (3952) 40-51-64\ne-mail: arshinskyv@mail.ru, v20@istu.edu, arshinskyv@istu.edu\n'),
(2, 'Серышева Ирина Анатольевна', 'sia_cyber@mail.ru', 'http://www.istu.edu/ob_irnitu/person/serysheva_irina_anatolevna', ' - старший преподаватель, старший преподаватель института информационных технологий и анализа данных\nаудитория: В-107 \nтелефоны: +7 (3952) 40-51-62\ne-mail: sia_cyber@mail.ru, v20@istu.edu\n'),
(6, 'Бахвалов Сергей Владимирович', 'епк', 'http://www.istu.edu/ob_irnitu/person/bakhvalov_sergey_vladimirovich', 'кандидат технических наук, доцент\nНаучный руководитель по направленностям аспирантуры - , член Ученого совета, доцент института информационных технологий и анализа данных\ne-mail: bsv@istu.edu\n'),
(8, 'Бахвалова Зинаида Андреевна', 'zinand@inbox.ru', 'http://www.istu.edu/ob_irnitu/person/bakhvalova_zinaida_andreevna', 'кандидат технических наук, доцент\n - доцент, доцент института информационных технологий и анализа данных\nаудитория: В-107 \nтелефоны: +7 (3952) 40-51-64\ne-mail: zinand@inbox.ru, v20@istu.edu\n'),
(9, 'Бучнев Олег Сергеевич', 'buchnevo81@mail.ru', 'http://www.istu.edu/ob_irnitu/person/buchnev_oleg_sergeevich', 'кандидат технических наук, доцент\n - доцент, доцент института информационных технологий и анализа данных\nаудитория: В-107 \nтелефоны: +7 (3952) 40-51-64\ne-mail: buchnevo81@mail.ru, v20@istu.edu\n'),
(10, 'Григорьев Станислав Валентинович', '', 'http://www.istu.edu/ob_irnitu/person/grigorev_stanislav_valentinovich', 'кандидат химических наук, доцент\nзаместитель директора по международной и научной деятельности, Центр компетенций по анализу и управлению на основе данных - руководитель центра, Центр компетенций по анализу и управлению на основе данных - , Ученый совет ИАиАД - член Ученого совета, Студенческое научно-творческое общество «Кибер»  - научный руководитель\nаудитория: В-210А \nтелефоны: +7 (3952) 40-51-61\ne-mail: svg@istu.edu, svg@ex.istu.edu\n'),
(11, 'Гутгарц Римма Давыдовна', '', 'http://www.istu.edu/ob_irnitu/person/gutgarts_rimma_davydovna', 'доктор экономических наук, профессор\n - профессор, профессор института информационных технологий и анализа данных, Научный руководитель по направленностям аспирантуры - \nаудитория: В-210А \nтелефоны: +7 (3952) 40-51-64\ne-mail: gutgarc@gmail.com, v20@istu.edu\n'),
(12, 'Копайгородский Алексей Николаевич', '', 'http://www.istu.edu/ob_irnitu/person/kopaygorodskiy_aleksey_nikolaevich', 'кандидат технических наук, доцент\n - доцент, Отдел информационных систем - начальник отдела, доцент института информационных технологий и анализа данных\nаудитория: В-300 \nтелефоны: +7 (3953) 40-50-40\ne-mail: digger@istu.edu\n'),
(13, 'Куцый Николай Николаевич', '', 'http://www.istu.edu/ob_irnitu/person/kutsyy_nikolay_nikolaevich', 'доктор технических наук, профессор\n - профессор, Лаборатория сетевых технологий   - , Научный руководитель по направленностям аспирантуры - \nаудитория: В-107 \nтелефоны: +7 (3952) 40-51-64\ne-mail: v20@istu.edu\n'),
(14, 'Лукьянов Никита Дмитриевич', '', 'http://www.istu.edu/ob_irnitu/person/lukyanov_nikita_dmitrievich', 'Лаборатория сетевых технологий   - \n'),
(15, 'Маланова Татьяна Валерьевна', 'malanova_tanya@mail.ru', 'http://www.istu.edu/ob_irnitu/person/malanova_tatyana_valerevna', 'кандидат технических наук, доцент\n - доцент, доцент института информационных технологий и анализа данных\nаудитория: В-107 \nтелефоны: +7 (3952) 40-51-64\ne-mail: malanova_tanya@mail.ru, v20@istu.edu\n'),
(16, 'Массель Людмила Васильевна', 'lvmassel@gmail.com', 'http://www.istu.edu/ob_irnitu/person/massel_lyudmila_vasilevna', 'доктор технических наук, профессор\nНаучный руководитель по направленностям аспирантуры - , профессор института информационных технологий и анализа данных\ne-mail: massel@isem.irk.ru\n'),
(17, 'Осипова Елизавета Алексеевна', 'osipovaelizaveta@yandex.ru', 'http://www.istu.edu/ob_irnitu/person/osipova_elizaveta_alekseevna', 'кандидат технических наук, доцент\n - доцент, доцент института информационных технологий и анализа данных\nаудитория: В-107 \nтелефоны: +7 (3952) 40-51-64\ne-mail: osipovaelizaveta@yandex.ru, v20@istu.edu\n'),
(18, 'Петров Александр Васильевич', '', 'http://www.istu.edu/ob_irnitu/person/petrov_aleksandr_vasilevich', 'доктор технических наук, профессор\n - профессор, член ученого совета, Заслуженный профессор ИРНИТУ, Центр междисциплинарных исследований и проектов - профессор\nтелефоны: +7 (3952) 40-51-62\ne-mail: petrov@istu.edu, v20@istu.edu\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`, `link`) VALUES
(1, 'Vincent Grimes', 'xawa@mailinator.com', '$2y$10$w3rxYwKwag3bkP9tqBMZZ.YICFrhtUwRwi9HYyKEKYZC4u7Ab/O3O', NULL, NULL, NULL, '2021-05-28 20:40:34', '2021-05-28 20:40:34', 'http://www.istu.edu/ob_irnitu/person/arshinskiy_vadim_leonidovich'),
(2, 'Ulla Bryan', 'tyri@mailinator.com', '$2y$10$AVPuhyVwgyn6XH2uLYkoUO5ILyV/.1c4w3ydu5VXzeeMNDN6tYTVm', NULL, NULL, NULL, '2021-05-28 21:14:25', '2021-05-28 21:14:25', 'http://www.istu.edu/ob_irnitu/person/arshinskiy_vadim_leonidovich'),
(4, 'Fedorova Alisa', '2012alis@mail.ru', '$2y$10$seze70P5vBZ1ft7aNnZgIOmV87UV9zGDRD2j64JxGkCO4VKgEW3gy', NULL, NULL, NULL, '2021-05-28 23:26:55', '2021-05-28 23:26:55', 'http://www.istu.edu/ob_irnitu/person/arshinskiy_vadim_leonidovich'),
(5, 'Judith Leach', 'dypevob@mailinator.com', '$2y$10$Cjpo5h851AebMOBI6EReoe79WUf5SJA6JTDVMHBrZhPvztJ2Ywib2', NULL, NULL, NULL, '2021-05-30 04:48:45', '2021-05-30 04:48:45', 'http://www.istu.edu/ob_irnitu/person/arshinskiy_vadim_leonidovich'),
(6, 'Fritz Coffey', 'mobe@mailinator.com', '$2y$10$tEDv7OLc2L2A15EDY2AbA.QQ1ro2ky1SDtXZP2y1cv0DA7sWNph6W', NULL, NULL, NULL, '2021-05-30 06:08:45', '2021-05-30 06:08:45', 'http://www.istu.edu/ob_irnitu/person/arshinskiy_vadim_leonidovich'),
(7, 'Иван', '200@mail.ru', '$2y$10$UQ2ZSpEMeYRpf2M9tzZ3qOvF5.98yCxdjImdaH9Wem1T00R0jwOVu', NULL, NULL, NULL, '2021-09-11 00:38:57', '2021-09-11 00:38:57', NULL),
(8, 'Иван', '2000a@mail.ru', '$2y$10$j/BsSitX5cLR7BHxRhWoneIYj6s1TmilMS8go8PxPhzZexzNiq4nu', NULL, NULL, NULL, '2021-09-11 21:51:54', '2021-09-11 21:51:54', NULL),
(9, 'Александр Иванов', 'admin@mail.ru', '$2y$10$SBn81cRcIW45HJVNa0FIFOU/fVtkGFgobrhYGcZsAoiIGIp3qFOSK', NULL, NULL, NULL, '2021-09-11 22:27:26', '2021-09-11 22:27:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vacant_vkrs`
--

CREATE TABLE `vacant_vkrs` (
  `id_vkr` bigint NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vacant_vkrs`
--

INSERT INTO `vacant_vkrs` (`id_vkr`, `title`, `description`, `user_id`) VALUES
(1, 'Theme', 'Description', 4),
(2, 'Разработка интернет-магазина', 'Это описание темы', 4),
(3, 'Создание экспертной систеемы', 'очень длинннооооооооое описаниееееееееееее', 4);

-- --------------------------------------------------------

--
-- Table structure for table `vkrs`
--

CREATE TABLE `vkrs` (
  `id` int NOT NULL,
  `title` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `year` year NOT NULL,
  `mark` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `essay` text NOT NULL,
  `tech` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `teacher_id` int DEFAULT NULL,
  `specialty_id` int NOT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vkrs`
--

INSERT INTO `vkrs` (`id`, `title`, `year`, `mark`, `essay`, `tech`, `teacher_id`, `specialty_id`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'Экспертная система для оценки пользовательского интерфейса', 2011, 'отлично', 'Дипломный проект посвящен разработке модуля «Журнал буровых скважин» для предприятия ОАО «ВостСиб АГП», с целью ускорения процесса обработки данных, полученных в ходе полевых работ и сокращения трудозатрат при оформлении результатов инженерно-геологических изысканий.', '', 4, 5, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Разработка системы поддержки обращений граждан в ОПФР по Иркутской области', 2020, 'отлично', 'текст эссе', 'Asterisk 1.1, CMU Sphinx, CMU CLMTK, Python', 1, 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Разработка информационной системы диспетчеризации крупногабаритного груза', 2020, 'отлично', 'Maecenas sed erat sit amet purus dapibus lobortis.', 'Java EE, Spring, PostgreSQL,OpenStreetMAP', 3, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Разработка принципов построения базы данных горно-геологического назначения', 2020, 'отлично', 'Nullam nibh tellus, rutrum quis ornare ut, tempus sed risus. ', 'Android, Micromine', 3, 10, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Когнитивное моделирование в системах устойчивости энергетических систем', 2015, 'Удовлетворительно', 'gg', '1С предприятие, CogMap, xml', 1, 1, 4, '0000-00-00 00:00:00', '2022-05-11 00:24:21'),
(17, 'Разработка системы идентификации личности студента для LMS moodle', 2020, 'хорошо', '', 'Moodle, Docker', 2, 10, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Разработка web-сайта международного междисциплинарного научного партнерства', 2020, 'хорошо', '', 'WordPress', 2, 5, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Проектирование и разработка информационной системы мониторинга состояний виртуальных машин на серверах, подключенных к п', 2020, 'отлично', '', 'Golang, Docker, Git, GitLab, Linux', 3, 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Разработка плагина для обмена данными между WooCommerce и 1С для CMS WordPress', 2020, 'отлично', '', 'WordPress, WooCommerce, 1C', 3, 5, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Идентификация ботов в социальной сети \"В-Контакте\"', 2020, 'отлично', '', 'VK API, MatLab', 4, 5, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Автоматизация тестирования продукта Vepp АО \"ИСПсистем\"', 2020, 'отлично', '', 'PyHamcrest, pytest, Se', 4, 5, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Параметрическая оптимизация линейных систем', 2020, 'отлично', '', '', 2, 5, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Разработка Android-приложения для определения происхождения алмаза с помощью тепловизора', 2019, 'хорошо', '', 'Android, Java', 1, 10, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Разработка алгоритма формирования оптимального плана перевозки негабаритного груза', 2019, 'отлично', '', '', 3, 10, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Моделирование эвакуации из здания при пожаре с учетом распространения огня и поведения людей', 2019, 'отлично', '', '', 15, 10, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Оценка способов и средств защиты передаваемой информации для системы электронного документооборота в страховой медицинск', 2019, 'хорошо', '', '', 6, 10, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Формализация требований для подготовки тестовых наборов данных', 2019, 'отлично', '', '', 8, 10, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Формирование индивидуальных предложений пользователям платформы CyberArenaPro с помощью методов искусственного интеллект', 2019, 'отлично', '', '', 14, 10, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'АИС «Мониторинг физической подготовленности студентов ИРНИТУ»', 2019, 'отлично', '', 'Java SE, Java FX, SQLite, Apache Commons Math ', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'АИС \"Мониторинг обслуживания мостовых сооружений\" для МУП \"Служба эксплуатации мостов\" г. Иркутска', 2019, 'отлично', '', '', 8, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'Разработка модуля обмена между CRM системами и 1С', 2019, 'отлично', '', '', 12, 11, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'Построение 3D модели объекта на основании массива изображений', 2020, 'отлично', '', 'Python, Flask,  OpenCV, Numpy, Pandas, Pyntcloud, Android, C#, X', 13, 11, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Разработка информационной системы для администрирования устройств удаленного управления', 2019, 'хорошо', '', '', 14, 11, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Проектирование информационной системы для магазина «Автозапчасти»', 2019, 'удовлетворительно', '', '', 14, 11, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Проектирование и реализация системы для работы с расписанием занятий студентов заочного обучения', 2019, 'отлично', '', '', 12, 11, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Анализ мониторинга майнингового оборудования', 2020, 'отлично', '', 'php, Laravel, JavaScript, MySQL', 11, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'Тестовый вариант', 2018, 'Отлично', 'Текст реферата изменен', 'Технологии', NULL, 3, 4, '2021-09-11 00:16:55', '2021-09-11 01:38:58'),
(76, 'Искусственный интеллект', 2019, 'Хорошо', 'еферат', 'BB', NULL, 4, 9, '2021-09-11 22:28:24', '2021-09-11 22:28:24'),
(77, '55', 2017, 'Хорошо', 'текст', 'технологии', NULL, 2, 4, '2022-02-24 06:28:20', '2022-02-24 06:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `vkr_tags`
--

CREATE TABLE `vkr_tags` (
  `id_vkr_tags` int NOT NULL,
  `id_vkr` int NOT NULL,
  `id_tags` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vkr_tags`
--

INSERT INTO `vkr_tags` (`id_vkr_tags`, `id_vkr`, `id_tags`) VALUES
(1, 6, 4),
(2, 7, 5),
(3, 8, 3),
(4, 8, 6),
(5, 8, 7),
(6, 9, 8),
(7, 9, 9),
(8, 10, 10),
(9, 10, 11),
(10, 12, 12),
(11, 12, 13),
(12, 12, 14),
(13, 13, 15),
(14, 15, 7),
(15, 15, 16),
(16, 15, 3),
(17, 16, 17),
(18, 17, 10),
(19, 17, 18),
(20, 18, 19),
(21, 19, 20),
(22, 19, 3),
(23, 19, 10),
(24, 20, 3),
(25, 21, 3),
(26, 21, 21),
(27, 22, 9),
(28, 23, 22),
(29, 23, 23),
(30, 23, 24),
(31, 23, 25),
(32, 23, 26),
(33, 24, 3),
(34, 24, 27),
(35, 25, 28),
(36, 26, 29),
(37, 27, 30),
(38, 28, 31),
(39, 28, 32),
(40, 31, 9),
(41, 31, 21),
(42, 40, 33),
(43, 41, 34),
(44, 41, 35),
(45, 44, 36),
(46, 44, 21),
(47, 44, 37),
(48, 45, 36),
(49, 45, 38),
(50, 45, 21),
(51, 50, 9),
(52, 50, 16),
(53, 50, 3),
(54, 54, 3),
(55, 54, 21),
(56, 56, 40),
(57, 56, 9),
(58, 56, 39),
(59, 57, 3),
(60, 57, 21),
(61, 58, 3),
(62, 58, 21),
(63, 59, 3),
(64, 59, 21),
(65, 60, 3),
(66, 60, 21),
(67, 60, 37),
(68, 60, 24),
(69, 61, 41),
(70, 61, 42);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id_teach`,`fio`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacant_vkrs`
--
ALTER TABLE `vacant_vkrs`
  ADD PRIMARY KEY (`id_vkr`);

--
-- Indexes for table `vkrs`
--
ALTER TABLE `vkrs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_spec` (`specialty_id`),
  ADD KEY `id_tech` (`teacher_id`),
  ADD KEY `id` (`user_id`) USING BTREE;

--
-- Indexes for table `vkr_tags`
--
ALTER TABLE `vkr_tags`
  ADD PRIMARY KEY (`id_vkr_tags`),
  ADD KEY `vkr_tags_1` (`id_vkr`),
  ADD KEY `vkr_tags_2` (`id_tags`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id_teach` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vacant_vkrs`
--
ALTER TABLE `vacant_vkrs`
  MODIFY `id_vkr` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vkrs`
--
ALTER TABLE `vkrs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `vkr_tags`
--
ALTER TABLE `vkr_tags`
  MODIFY `id_vkr_tags` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

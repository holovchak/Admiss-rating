-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Хост: localhost:3306
-- Час створення: Лип 20 2014 р., 08:14
-- Версія сервера: 5.5.36
-- Версія PHP: 5.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `admiss-rating`
--

-- --------------------------------------------------------

--
-- Структура таблиці `entrant`
--

CREATE TABLE IF NOT EXISTS `entrant` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `e1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e6` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e7` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e8` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e9` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e0` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e11` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e12` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e13` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e14` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e15` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e16` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e17` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e18` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e19` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e20` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e21` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e22` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e23` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e24` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e25` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e26` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e27` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e28` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e29` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e30` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e31` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e32` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e33` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e34` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e35` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e36` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e37` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e38` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e39` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e40` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e41` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e42` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e43` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e44` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

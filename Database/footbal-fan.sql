-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2020 at 11:21 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `footbal_fan`

-- Table structure for table `booking_detail`
--

DROP TABLE IF EXISTS `booking_detail`;
CREATE TABLE IF NOT EXISTS `booking_detail` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `journals`;
CREATE TABLE IF NOT EXISTS `journals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_team` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `card_fans`;
CREATE TABLE IF NOT EXISTS `card_fans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `family` varchar(50) NOT NULL,
  `name_father` varchar(50) NOT NULL,
  `code_meli` varchar(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `soccer`  varchar(255) DEFAULT '0',
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ecommerce`;
CREATE TABLE IF NOT EXISTS `ecommerce` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_cat` varchar(50) COLLATE utf8_persian_ci DEFAULT '0',
  `product_brand` varchar(50) COLLATE utf8_persian_ci DEFAULT '0',
  `product_title` varchar(50) NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_desc` text COLLATE utf8_persian_ci,
  `product_image` varchar(201) NOT NULL,
  `product_keywords` varchar(50) COLLATE utf8_persian_ci DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `forecast`;
CREATE TABLE IF NOT EXISTS `forecast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forecast_guest` varchar(255) COLLATE utf8_persian_ci DEFAULT '-',
  `forecast_host` varchar(255) COLLATE utf8_persian_ci DEFAULT '-',
  `guest_id` varchar(255) COLLATE utf8_persian_ci DEFAULT '-',
  `host_id` varchar(255) COLLATE utf8_persian_ci DEFAULT '-',
  `user_id` varchar(255) COLLATE utf8_persian_ci DEFAULT '-',
  `status` varchar(255) COLLATE utf8_persian_ci DEFAULT '0',
  `match_id` varchar(255) COLLATE utf8_persian_ci DEFAULT '-',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;


DROP TABLE IF EXISTS `leage_play`;
CREATE TABLE IF NOT EXISTS `leage_play` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host_id` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `guest_id` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `played` varchar(255) COLLATE utf8_persian_ci DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;



DROP TABLE IF EXISTS `league`;
CREATE TABLE IF NOT EXISTS `league` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(255) DEFAULT '0' COMMENT 'ای دی جدول team_list',
  `game_loase` varchar(255) DEFAULT '0' COMMENT 'وضعیت بازی ۱ برد ۲ مساوی ۳ باخت',
  `goal_hit` varchar(255) DEFAULT '0',
  `goal_eaten` varchar(255) DEFAULT '0',
  `games_played` varchar(255) DEFAULT '0',
  `score` varchar(255) DEFAULT '0',
  `season` varchar(255) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;



DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci DEFAULT '-' COMMENT 'عنوان',
  `body` text COLLATE utf8_persian_ci COMMENT 'زمینه',
  `image` varchar(255) COLLATE utf8_persian_ci DEFAULT '-' COMMENT 'عکس پست',
  `slug` varchar(255) COLLATE utf8_persian_ci DEFAULT '-' COMMENT 'متن رندوم برای دسترسی راخت',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;



DROP TABLE IF EXISTS `poll_option`;
CREATE TABLE IF NOT EXISTS `poll_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `poll_votes`;
CREATE TABLE IF NOT EXISTS `poll_votes` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `poll_option_id` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `reserve`;
CREATE TABLE IF NOT EXISTS `reserve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `match_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `status` varchar(50) COLLATE utf8_persian_ci DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `seat_detail`;
CREATE TABLE IF NOT EXISTS `seat_detail` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `seat_id` int(11) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `team_list`;
CREATE TABLE IF NOT EXISTS `team_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `production_time` varchar(15) COLLATE utf8_persian_ci DEFAULT '1390/08/08' COMMENT 'تاریخ ساخت باشگاه',
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT '-' COMMENT 'نام باشگاه',
  `icon` varchar(255) COLLATE utf8_persian_ci DEFAULT '-' COMMENT 'عکس باشگاه',
  `body` text COLLATE utf8_persian_ci COMMENT 'توضیحات باشگاه',
  `slug` varchar(255) COLLATE utf8_persian_ci DEFAULT '-' COMMENT 'یک استرینگ برای دسترسی بهتر به دیتاها',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;


DROP TABLE IF EXISTS `team_manager`;
CREATE TABLE IF NOT EXISTS `team_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT '-' COMMENT 'نام فارسی',
  `name_fa` varchar(255) COLLATE utf8_persian_ci DEFAULT '-' COMMENT 'نام انگلیسی',
  `slug` varchar(255) COLLATE utf8_persian_ci DEFAULT '-' COMMENT 'متن رندوم برای دسترسی بهتر',
  `avatar` varchar(255) COLLATE utf8_persian_ci DEFAULT '-' COMMENT 'عکس',
  `bio` varchar(255) COLLATE utf8_persian_ci DEFAULT '-' COMMENT 'بیوگرافی',
  `age` varchar(11) DEFAULT '0' COMMENT 'سن',
  `side` varchar(250) COLLATE utf8_persian_ci DEFAULT '-' COMMENT 'سمت',
  `team_id` int(11) DEFAULT '0' COMMENT 'ای دی جدول team_list',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;



DROP TABLE IF EXISTS `team_players`;
CREATE TABLE IF NOT EXISTS `team_players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci DEFAULT '-' COMMENT 'نام فارسی',
  `title_en` varchar(255) COLLATE utf8_persian_ci DEFAULT '-' COMMENT 'نام اینگلیسی',
  `avatar` varchar(255) COLLATE utf8_persian_ci DEFAULT '-' COMMENT 'عکس بازیکن',
  `goal` int(11) DEFAULT '0' COMMENT 'تعداد گل زده',
  `pass` int(11) DEFAULT '0' COMMENT 'تعداد پاس زده',
  `age` int(11) DEFAULT '0' COMMENT 'سن بازیکن',
  `bio` text COLLATE utf8_persian_ci COMMENT 'بیوگرافی',
  `team_id` int(11) DEFAULT '0' COMMENT 'ای دی جدول team_list',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

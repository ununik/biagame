-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Čtv 28. led 2016, 16:54
-- Verze serveru: 5.5.47-0ubuntu0.14.04.1
-- Verze PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `biagame`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user` int(15) NOT NULL,
  `job` tinyint(1) NOT NULL,
  `timestamp` int(15) NOT NULL,
  `idActivity` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Vypisuji data pro tabulku `activity`
--

INSERT INTO `activity` (`id`, `user`, `job`, `timestamp`, `idActivity`) VALUES
(1, 1, 1, 1453289158, 1),
(2, 1, 1, 1453289160, 1),
(3, 1, 1, 1453289161, 1),
(4, 1, 1, 1453289170, 1),
(5, 1, 1, 1453298595, 1),
(6, 1, 1, 1453298597, 1),
(7, 1, 1, 1453299196, 1),
(8, 1, 1, 1453299197, 1),
(9, 1, 1, 1453299198, 1),
(10, 1, 1, 1453299199, 1),
(11, 1, 1, 1453299199, 1),
(12, 1, 1, 1453299200, 1),
(13, 1, 1, 1453299205, 1),
(14, 1, 1, 1453299208, 1),
(15, 1, 1, 1453299526, 1),
(16, 1, 1, 1453299561, 1),
(17, 1, 1, 1453299562, 1),
(18, 1, 1, 1453299563, 1),
(19, 1, 1, 1453299563, 1),
(20, 1, 1, 1453299564, 1),
(21, 1, 1, 1453299565, 1),
(22, 1, 1, 1453299566, 1),
(23, 1, 1, 1453299567, 1),
(24, 1, 1, 1453299567, 1),
(25, 1, 1, 1453458224, 1),
(26, 1, 1, 1453458225, 1),
(27, 1, 1, 1453458226, 1),
(28, 1, 1, 1453458227, 1),
(29, 1, 1, 1453458228, 1),
(30, 1, 1, 1453458229, 1),
(31, 1, 1, 1453458230, 1),
(32, 1, 1, 1453458231, 1),
(33, 1, 1, 1453715482, 1),
(34, 1, 1, 1453715484, 1),
(35, 1, 1, 1453715485, 1),
(36, 1, 1, 1453715485, 1),
(37, 1, 1, 1453715486, 1),
(38, 1, 1, 1453715487, 1),
(39, 1, 1, 1453715487, 1),
(40, 1, 1, 1453715488, 1),
(41, 1, 1, 1453715489, 1),
(42, 1, 1, 1453715489, 1),
(43, 1, 1, 1453890168, 1),
(44, 1, 1, 1453890169, 1),
(45, 1, 1, 1453890171, 1),
(46, 1, 1, 1453890172, 1),
(47, 1, 1, 1453890173, 1),
(48, 1, 1, 1453890174, 1),
(49, 1, 1, 1453890175, 1),
(50, 1, 1, 1453890176, 1),
(51, 1, 1, 1453890178, 1),
(52, 1, 1, 1453976591, 1),
(53, 1, 1, 1453979619, 1),
(54, 1, 1, 1453979621, 1),
(55, 1, 1, 1453979622, 1),
(56, 1, 1, 1453979623, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `competition`
--

CREATE TABLE IF NOT EXISTS `competition` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `level` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user` int(15) NOT NULL COMMENT 'id from user',
  `place` int(15) NOT NULL COMMENT 'id from competition_places',
  `energy` int(15) NOT NULL,
  `start_price` int(15) NOT NULL,
  `maxPeople` int(10) NOT NULL,
  `type` int(11) NOT NULL COMMENT 'id from competition_category_type',
  `date` int(20) NOT NULL COMMENT 'timestamp of the competition',
  `results` tinyint(1) NOT NULL,
  `results_done` tinyint(1) NOT NULL,
  `muscles` int(15) NOT NULL,
  `endurance` int(15) NOT NULL,
  `stability` int(15) NOT NULL,
  `psyche` int(15) NOT NULL,
  `morale` int(15) NOT NULL,
  `accuracy` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `competition`
--

INSERT INTO `competition` (`id`, `level`, `title`, `description`, `user`, `place`, `energy`, `start_price`, `maxPeople`, `type`, `date`, `results`, `results_done`, `muscles`, `endurance`, `stability`, `psyche`, `morale`, `accuracy`) VALUES
(1, 1, 'Nejaky zavod', 'dsaf sjfkh dsjkfh ksdh fkjshdkfh skdhfkjsdkjh fdsjh sdhkj hfskd ', 0, 0, 15, 15, 1000, 1, 1453987540, 0, 1, 1, 1, 2, 2, 1, 7),
(2, 1, 'CP', 'das uisdasdfgjhadsf jdsafkjasgh dghsakjg adshhjg zxkjcvh zxjchv jzxchvg xzchjgv jhxczg jhzcxg jhxzcgvj hxcjhvgxzcjhkvjxhcjhghjxzcvjhgxzjchgjhxzcvxjchvkjgxcvhjx', 0, 0, 10, 150, 10, 1, 1453984540, 0, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `competition_category_level`
--

CREATE TABLE IF NOT EXISTS `competition_category_level` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `type` int(10) NOT NULL,
  `level` int(10) NOT NULL,
  `energy` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `competition_category_level`
--

INSERT INTO `competition_category_level` (`id`, `title`, `type`, `level`, `energy`) VALUES
(1, 'Regionalni zavod', 1, 1, 25);

-- --------------------------------------------------------

--
-- Struktura tabulky `competition_category_type`
--

CREATE TABLE IF NOT EXISTS `competition_category_type` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `competition_category_type`
--

INSERT INTO `competition_category_type` (`id`, `title`) VALUES
(1, 'Biatlon');

-- --------------------------------------------------------

--
-- Struktura tabulky `competition_registration`
--

CREATE TABLE IF NOT EXISTS `competition_registration` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user` int(15) NOT NULL,
  `competition` int(15) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `prone` int(5) NOT NULL,
  `standing` int(5) NOT NULL,
  `result` int(15) NOT NULL,
  `time` int(20) NOT NULL,
  `prone_points` int(15) NOT NULL,
  `standing_points` int(15) NOT NULL,
  `time_points` int(15) NOT NULL,
  `rand` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `competition_registration`
--

INSERT INTO `competition_registration` (`id`, `user`, `competition`, `timestamp`, `prone`, `standing`, `result`, `time`, `prone_points`, `standing_points`, `time_points`, `rand`) VALUES
(3, 1, 1, 1453985396, 0, 0, 1, 0, 217, 283, 0, 1165);

-- --------------------------------------------------------

--
-- Struktura tabulky `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `iso` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `country`
--

INSERT INTO `country` (`id`, `name`, `iso`) VALUES
(1, '?eská republika', 'CZE');

-- --------------------------------------------------------

--
-- Struktura tabulky `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `energy` int(10) NOT NULL,
  `money` int(10) NOT NULL,
  `time` int(10) NOT NULL,
  `level` int(10) NOT NULL,
  `jobExpierence` int(10) NOT NULL,
  `addExpierence` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `description`, `energy`, `money`, `time`, `level`, `jobExpierence`, `addExpierence`) VALUES
(1, 'TEST1', 'dasdska fjkshfjakshdkjshfjh djkfh jskdh faskj hdkjfhajsk fjhkjf jksdkjf s', 10, 5, 10, 1, 0, 1),
(2, 'TEST2', 'dasdska fjkshfjakshdkjshfjh djkfh jskdh faskj hdkjfhajsk fjhkjf jksdkjf s', 110, 5, 10, 1, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `reality`
--

CREATE TABLE IF NOT EXISTS `reality` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `level` int(10) NOT NULL,
  `price` int(15) NOT NULL,
  `in_reality_store` tinyint(1) NOT NULL,
  `shoootingRange` tinyint(1) NOT NULL,
  `tracks` tinyint(1) NOT NULL,
  `technicalCapacity` tinyint(1) NOT NULL COMMENT 'zazemi',
  `psychika` int(10) NOT NULL,
  `competition` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `reality`
--

INSERT INTO `reality` (`id`, `title`, `description`, `level`, `price`, `in_reality_store`, `shoootingRange`, `tracks`, `technicalCapacity`, `psychika`, `competition`) VALUES
(1, 'Nejaka bouda', 'Krasny maly domecek v podhuri Alp', 1, 1100, 1, 0, 1, 1, 10, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `store_Categories`
--

CREATE TABLE IF NOT EXISTS `store_Categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `store_Categories`
--

INSERT INTO `store_Categories` (`id`, `title`) VALUES
(1, 'Boty'),
(2, 'Lyze');

-- --------------------------------------------------------

--
-- Struktura tabulky `store_Items`
--

CREATE TABLE IF NOT EXISTS `store_Items` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `category` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firma` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(10) NOT NULL,
  `level` int(10) NOT NULL,
  `allowedInStore` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `store_Items`
--

INSERT INTO `store_Items` (`id`, `category`, `name`, `firma`, `description`, `price`, `level`, `allowedInStore`) VALUES
(1, 1, 'BOOTS 2', 'Fisher', 'sda asdfioahoiashd oishd fisodhf ihasidoh sod foiasdo; fhsad;f', 100, 0, 1),
(2, 1, 'BOOTS 52', 'Fisher', 'sda asdfioahoiashd oishd fisodhf ihasidoh sod foiasdo; fhsad;f', 2200, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `level` int(10) NOT NULL DEFAULT '1',
  `jobExpierence` int(10) NOT NULL DEFAULT '0',
  `mail` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `passwordHash` varchar(100) NOT NULL,
  `money` int(50) NOT NULL DEFAULT '2000',
  `created` int(20) NOT NULL,
  `introduction` tinyint(1) NOT NULL DEFAULT '0',
  `gender` varchar(1) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `nationality` int(6) NOT NULL,
  `age` int(3) NOT NULL,
  `energy` int(10) NOT NULL DEFAULT '100',
  `maxenergy` int(10) NOT NULL DEFAULT '100',
  `lastEnergyTimestamp` int(20) NOT NULL,
  `muscles` int(15) NOT NULL DEFAULT '5' COMMENT 'svaly',
  `accuracy` int(15) NOT NULL DEFAULT '5' COMMENT 'presnost',
  `endurance` int(15) NOT NULL DEFAULT '5' COMMENT 'vytrvalost',
  `stability` int(15) NOT NULL DEFAULT '5' COMMENT 'stabilita',
  `competition_experience` int(15) NOT NULL DEFAULT '5' COMMENT 'zavodni zkusenost',
  `psyche` int(15) NOT NULL DEFAULT '5' COMMENT 'psychika',
  `morale` int(15) NOT NULL DEFAULT '5',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `level`, `jobExpierence`, `mail`, `login`, `passwordHash`, `money`, `created`, `introduction`, `gender`, `firstname`, `lastname`, `nationality`, `age`, `energy`, `maxenergy`, `lastEnergyTimestamp`, `muscles`, `accuracy`, `endurance`, `stability`, `competition_experience`, `psyche`, `morale`) VALUES
(1, 1, 42, 'ununik@gmail.com', 'ununik', 'c501186efd715564711a9034c4a8e492', 80, 1453192005, 1, 'm', 'Martin', 'Pribyl', 1, 29, 0, 100, 1453995823, 5, 5, 5, 5, 8, 5, 5);

-- --------------------------------------------------------

--
-- Struktura tabulky `user_items`
--

CREATE TABLE IF NOT EXISTS `user_items` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `item` int(10) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `user` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Vypisuji data pro tabulku `user_items`
--

INSERT INTO `user_items` (`id`, `item`, `timestamp`, `user`) VALUES
(1, 1, 1453307168, 1),
(2, 1, 1453307170, 1),
(3, 1, 1453307180, 1),
(4, 1, 1453307206, 1),
(5, 1, 1453307207, 1),
(6, 1, 1453307207, 1),
(7, 1, 1453307208, 1),
(8, 1, 1453307209, 1),
(9, 1, 1453307209, 1),
(10, 1, 1453307209, 1),
(11, 1, 1453307210, 1),
(12, 1, 1453307210, 1),
(13, 1, 1453307211, 1),
(14, 1, 1453307211, 1),
(15, 1, 1453307211, 1),
(16, 1, 1453307211, 1),
(17, 1, 1453307212, 1),
(18, 1, 1453307212, 1),
(19, 1, 1453307212, 1),
(20, 1, 1453307212, 1),
(21, 1, 1453890081, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

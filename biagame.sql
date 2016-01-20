-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Stř 20. led 2016, 17:27
-- Verze serveru: 5.5.46-0ubuntu0.14.04.2
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

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
(24, 1, 1, 1453299567, 1);

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `level`, `jobExpierence`, `mail`, `login`, `passwordHash`, `money`, `created`, `introduction`, `gender`, `firstname`, `lastname`, `nationality`, `age`, `energy`, `maxenergy`, `lastEnergyTimestamp`) VALUES
(1, 1, 10, 'ununik@gmail.com', 'ununik', 'c501186efd715564711a9034c4a8e492', 20, 1453192005, 1, 'm', 'Martin', 'Pribyl', 1, 29, 4, 100, 1453306767);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

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
(20, 1, 1453307212, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

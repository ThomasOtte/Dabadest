-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 30 mei 2017 om 10:32
-- Serverversie: 5.7.18-0ubuntu0.16.04.1
-- PHP-versie: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ThomasOtte`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `device`
--

CREATE TABLE `device` (
  `id` int(11) NOT NULL,
  `devicetypeid` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `devicename` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `acqdate` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `device`
--

INSERT INTO `device` (`id`, `devicetypeid`, `brand`, `devicename`, `location`, `acqdate`) VALUES
(15, 13, 'Dell', 'IU821928', '304', '12-07-2014'),
(16, 13, 'Acer', 'HK781-98', '104', '15-04-2001'),
(6, 15, 'acer', 'masher', '15b', '12-12-2017'),
(20, 13, 'Dell', 'RF8172-191872', '104', '12-10-2009');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `devicetype`
--

CREATE TABLE `devicetype` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `typename` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `devicetype`
--

INSERT INTO `devicetype` (`id`, `slug`, `typename`) VALUES
(13, 'pc', 'PC'),
(32, 'phone', 'Phone'),
(22, 'tablet', 'Tablet'),
(33, 'display', 'Display');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `malfunction`
--

CREATE TABLE `malfunction` (
  `id` int(11) NOT NULL,
  `deviceid` int(11) NOT NULL,
  `devicebrand` varchar(255) NOT NULL,
  `devicename` varchar(255) NOT NULL,
  `devicelocation` varchar(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `fixed` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `malfunction`
--

INSERT INTO `malfunction` (`id`, `deviceid`, `devicebrand`, `devicename`, `devicelocation`, `date`, `time`, `priority`, `fixed`) VALUES
(7, 15, 'Dell', 'IU821928', '304', '23-05-2017', '12:35', 7, 'NO'),
(8, 20, 'Dell', 'RF8172-191872', '104', '20-05-2016', '23:05', 3, 'YES');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `malfunctionid` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cause` varchar(255) NOT NULL,
  `solution` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `report`
--

INSERT INTO `report` (`id`, `malfunctionid`, `description`, `cause`, `solution`, `date`, `time`) VALUES
(4, 3, 'dfafsa', 'adfaf', 'dfafda', 'fdafadsa', 'dfasfa'),
(6, 5, 'adsfa', 'dasfa', 'fadfa', 'dasfas', 'dasfas');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(120) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `state` smallint(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `first_name`, `last_name`, `created`, `modified`, `state`) VALUES
(6, 'a@b.com', 'f8641a334ef91542ed266ee644b8869d', 'Apple', 'Pizza', '2017-05-04 08:22:34', '2017-05-04 08:22:34', 1),
(5, 'a@a.com', 'f8641a334ef91542ed266ee644b8869d', 'Pizza', 'Apple', '2017-05-02 11:35:13', '2017-05-02 11:35:13', NULL),
(4, 'f@e.com', 'f8641a334ef91542ed266ee644b8869d', 'Pizza', 'Apple', '2017-05-02 11:26:38', '2017-05-02 11:26:38', 2);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `devicetype`
--
ALTER TABLE `devicetype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexen voor tabel `malfunction`
--
ALTER TABLE `malfunction`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT voor een tabel `devicetype`
--
ALTER TABLE `devicetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT voor een tabel `malfunction`
--
ALTER TABLE `malfunction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT voor een tabel `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

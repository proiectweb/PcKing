-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2014. Ápr 24. 23:02
-- Szerver verzió: 5.5.34
-- PHP verzió: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `webshop`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `product` int(4) NOT NULL,
  `quantity` int(4) NOT NULL,
  `starttime` datetime NOT NULL,
  `finish` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `orders`


INSERT INTO `orders` (`id`, `username`, `product`, `quantity`, `starttime`, `finish`) VALUES
('admin5352457e77d6d9.40067966', 'admin', 42, 2, '2014-04-19 12:44:30', '0000-00-00 00:00:00'),
('admin5352457e77d6d9.40067966', 'admin', 18, 1, '2014-04-19 12:44:30', '0000-00-00 00:00:00'),
('admin535245ab2914f1.11046056', 'admin', 42, 2, '2014-04-19 12:45:15', '0000-00-00 00:00:00'),
('admin535245ab2914f1.11046056', 'admin', 18, 1, '2014-04-19 12:45:15', '0000-00-00 00:00:00'),
('admin535245ab2914f1.11046056', 'admin', 56, 3, '2014-04-19 12:45:15', '0000-00-00 00:00:00'),
('admin53524642094de3.54392032', 'admin', 34, 1, '2014-04-19 12:47:46', '0000-00-00 00:00:00'),
('admin53524642094de3.54392032', 'admin', 29, 1, '2014-04-19 12:47:46', '0000-00-00 00:00:00'),
('admin535247871afe69.90640898', 'admin', 16, 1, '2014-04-19 12:53:11', '0000-00-00 00:00:00'),
('admin5352457e77d6d9.40067966', 'admin', 42, 2, '2014-04-19 12:44:30', '0000-00-00 00:00:00'),
('admin5352457e77d6d9.40067966', 'admin', 18, 1, '2014-04-19 12:44:30', '0000-00-00 00:00:00'),
('admin535245ab2914f1.11046056', 'admin', 42, 2, '2014-04-19 12:45:15', '0000-00-00 00:00:00'),
('admin535245ab2914f1.11046056', 'admin', 18, 1, '2014-04-19 12:45:15', '0000-00-00 00:00:00'),
('admin535245ab2914f1.11046056', 'admin', 56, 3, '2014-04-19 12:45:15', '0000-00-00 00:00:00'),
('admin53524642094de3.54392032', 'admin', 34, 1, '2014-04-19 12:47:46', '0000-00-00 00:00:00'),
('admin53524642094de3.54392032', 'admin', 29, 1, '2014-04-19 12:47:46', '0000-00-00 00:00:00'),
('admin535247871afe69.90640898', 'admin', 16, 1, '2014-04-19 12:53:11', '0000-00-00 00:00:00'),
('admin53526b21f3e6f4.47772167', 'admin', 41, 1, '2014-04-19 15:25:05', '0000-00-00 00:00:00'),
('admin5353b8e16abea3.08752772', 'admin', 41, 2, '2014-04-20 15:09:05', '0000-00-00 00:00:00'),
('admin5353bf2d4a8ee4.67191259', 'admin', 67, 1, '2014-04-20 15:35:57', '0000-00-00 00:00:00'),
('admin5353eb743dec01.94946955', 'admin', 7, 2, '2014-04-20 18:44:52', '0000-00-00 00:00:00'),
('das5357a5a63c14d5.07876519', 'das', 1, 1, '2014-04-23 14:36:06', '0000-00-00 00:00:00'),
('Alex53597b58a074a1.57204927', 'Alex', 4, 2, '2014-04-25 00:00:08', '0000-00-00 00:00:00'),
('Alex53597b58a074a1.57204927', 'Alex', 7, 1, '2014-04-25 00:00:08', '0000-00-00 00:00:00'),
('Alex53597b58a074a1.57204927', 'Alex', 45, 1, '2014-04-25 00:00:08', '0000-00-00 00:00:00'),
('Alex53597b58a074a1.57204927', 'Alex', 47, 1, '2014-04-25 00:00:08', '0000-00-00 00:00:00'),
('Alex53597b58a074a1.57204927', 'Alex', 69, 1, '2014-04-25 00:00:08', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

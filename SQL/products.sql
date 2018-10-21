-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2014. Ápr 24. 23:03
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
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(4) NOT NULL,
  `name` varchar(60) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(100) NOT NULL,
  `category` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `category`) VALUES
(1, 'AMD FX-6300 3.5GHz AM3', 1873, 209, 'processor'),
(2, 'AMD FX-8350 4GHz AM3+', 2310, 131, 'processor'),
(3, 'Intel Core i7-4770K 3.5GHz LGA', 2520, 43, 'processor'),
(4, 'AMD A8 X4 5600K 3.6GHz FM2', 1290.45, 52, 'processor'),
(5, 'AMD Athlon II X4 750K 3.4GHz F', 1854, 131, 'processor'),
(6, 'AMD A10 X4 5800K 3.8GHz FM2', 2130, 132, 'processor'),
(7, 'Intel Core i7-3770K 3.5GHz LGA1155', 1630, 10, 'processor'),
(8, 'Intel Xeon 6-Core X5690 3.46GHz LGA1366', 3200, 4, 'processor'),
(9, 'Intel Pentium G2030T 2.6GHz LGA1155', 1540, 46, 'processor'),
(10, 'AMD Opteron 6320 2.8GHz G34', 2140, 32, 'processor'),
(11, 'Kingston 2GB DDR2 800MHz', 460, 217, 'RAM'),
(12, 'Kingston 4GB DDR3 1333MHz', 321.5, 412, 'RAM'),
(13, 'Corsair Vengeance 8GB (2x4GB) DDR3 1600MHz', 439, 125, 'RAM'),
(14, 'Corsair 4GB (2x2GB) DDR2 800MHz', 645, 156, 'RAM'),
(15, 'Kingston HyperX 8GB (2x4GB) DDR3', 750, 67, 'RAM'),
(16, 'Corsair 8GB (2x4GB) DDR3 1600MHz', 567, 45, 'RAM'),
(17, 'Kingston 4GB DDR3 1600MHz', 426.6, 194, 'RAM'),
(18, 'INGMAX 4GB DDR3 1333MHz', 604, 52, 'RAM'),
(19, 'Patriot 2GB DDR2 800MHz', 421, 22, 'RAM'),
(20, 'Geil 16GB (4x4GB) DDR3 1333MHz', 1200, 30, 'RAM'),
(21, 'Geil 4GB DDR3 1333MHz', 950, 25, 'RAM'),
(22, 'Patriot Viper3 16GB (2x8GB) DDR3', 546, 46, 'RAM'),
(23, 'Kingston 16GB (2x8GB) DDR3 2133MHz', 369, 53, 'RAM'),
(24, 'Transcend 8GB DDR3 1333MHz', 276, 64, 'RAM'),
(25, 'Corsair 8GB (2x4GB) DDR3 1600MHz', 256, 76, 'RAM'),
(26, 'Toshiba 1TB 32MB 7200rpm SATA3', 357, 87, 'HDD'),
(27, 'Samsung M3 Portable 1TB HX-M101TCB', 354, 48, 'HDD'),
(28, 'Seagate Expansion 2TB USB 3.0', 125, 45, 'HDD'),
(29, 'Western Digital Elements 2TB USB 2.0', 631, 56, 'HDD'),
(30, 'Toshiba StorE Basics 1TB', 472, 95, 'HDD'),
(31, 'BestMedia PLATINUM MyDrive Colour 500GB', 578, 85, 'HDD'),
(32, 'A-Data DashDrive HD710 1TB USB 3.0', 641, 153, 'HDD'),
(33, 'Toshiba 2TB 64MB 7200rpm SATA3', 423, 41, 'HDD'),
(34, 'Western Digital Caviar Black 1TB 64MB', 352, 60, 'HDD'),
(35, 'Samsung M3 Portable 500GB HX-M500TCB', 241, 65, 'HDD'),
(36, 'Seagate 1TB 32MB 7200rpm SATA3', 541, 68, 'HDD'),
(37, 'Hitachi Touro Mobile MX3 1TB ', 521, 25, 'HDD'),
(38, 'Maxell 1TB 8MB 5400rpm USB', 563, 25, 'HDD'),
(39, 'Western Digital Caviar Red 2TB 64MB', 854, 51, 'HDD'),
(40, 'Seagate 500GB 8MB 5400rpm SATA', 351, 95, 'HDD'),
(41, 'GIGABYTE GF GTX650 OC 2GB 128bit DDR5', 359, 51, 'Videocard'),
(42, 'ASUS Radeon R9 270X DirectCU II TOP 2GB 256bit', 276, 249, 'Videocard'),
(43, 'ASUS Radeon HD6670 1GB 128bit DDR5 PCI-E ', 562, 119, 'Videocard'),
(44, 'GIGABYTE Radeon R9 270X OC 2GB 256bit DDR5', 642, 165, 'Videocard'),
(45, 'Sapphire Radeon HD5450 1GB 64bit DDR3', 435, 162, 'Videocard'),
(46, 'Gigabyte GF GTX760 OC 4GB 256bit DDR5', 635, 215, 'Videocard'),
(47, 'Nvidia GeForce GTX 780 Ti ', 1300, 56, 'Videocard'),
(48, 'ATI Radeon HD 5670', 1150, 13, 'Videocard'),
(49, 'GeForce GTX 760', 1240, 42, 'Videocard'),
(50, ' ATI Radeon HD 5870 Eyefinity 6 Edition Graphics ', 1400, 25, 'Videocard'),
(51, 'Cooler Master Hyper 212 EVO ', 145, 54, 'Cooler'),
(52, 'Arctic Freezer Xtreme Rev. 2', 542, 35, 'Cooler'),
(53, 'Cooler Master Hyper 103', 423, 22, 'Cooler'),
(54, 'Corsair Air Series AF120 LED Quiet Edition Twin Pack', 654, 12, 'Cooler'),
(55, 'LC-Power LC-CC95', 224, 43, 'Cooler'),
(56, 'Zalman CNPS12X', 435, 40, 'Cooler'),
(57, 'Thermaltake FrioOCK CLP0575', 535, 32, 'Cooler'),
(58, 'Arctic Alpine 11 Rev 2', 253, 11, 'Cooler'),
(59, 'Cooler Master GeminII M4 RR-GMM4-16PK-R1', 451, 26, 'Cooler'),
(60, 'Kingston KHX-FAN', 642, 43, 'Cooler'),
(61, 'Cooler Master SickleFlow 120 R4-L2R-20A', 532, 54, 'Cooler'),
(62, 'GIGABYTE GBT CPU Waterblock GH-WPBC1', 215, 21, 'Cooler'),
(63, 'Coolink SWiF2 1201', 315, 43, 'Cooler'),
(64, 'Noctua NH-D14', 765, 16, 'Cooler'),
(65, 'Arctic Accelero Hybrid 7970', 325, 13, 'Cooler'),
(66, 'Creative SB X-Fi Surround 5.1 USB', 685, 24, 'Soundcard'),
(67, 'Genius Sound Maker Value 5.1', 456, 23, 'Soundcard'),
(68, 'ASUS Xonar U3', 644, 35, 'Soundcard'),
(69, 'ASUS Xonar DS 7.1', 642, 33, 'Soundcard'),
(70, 'Creative Sound Blaster PLAY', 985, 34, 'Soundcard'),
(71, 'Creative X-Fi HD', 456, 53, 'Soundcard'),
(72, 'SpeedDragon SD-AS8C-C1-SPMB', 252, 53, 'Soundcard'),
(73, 'Genius Sound Maker Value 5.1 V2', 674, 56, 'Soundcard'),
(74, 'Delock Sound Box 7.1 (61803)', 736, 53, 'Soundcard');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 05:07 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop2`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `product` int(4) NOT NULL,
  `quantity` int(4) NOT NULL,
  `starttime` datetime NOT NULL,
  `finish` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `product`, `quantity`, `starttime`, `finish`) VALUES
('admin5bcb2994aead40.15199308', 'admin', 1, 2, '2018-10-20 16:11:48', '0000-00-00 00:00:00'),
('admin5bcb2994aead40.15199308', 'admin', 26, 2, '2018-10-20 16:11:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(4) NOT NULL,
  `name` varchar(60) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(100) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `category`) VALUES
(1, 'Procesor AMD Ryzen Threadripper 1950X, 3.4GHz,', 1000, 206, 'processor'),
(2, 'Procesor AMD FX X8 8350, 4000MHz', 231, 126, 'processor'),
(3, 'Procesor AMD Athlon II X2 340 Dual Core', 119, 43, 'processor'),
(4, 'AMD A8 X4 5600K 3.6GHz FM2', 500, 52, 'processor'),
(5, 'Procesor AMD FX 8320, 3.5 GHz', 600, 131, 'processor'),
(6, 'Procesor AMD FX X4 4320', 180, 132, 'processor'),
(7, 'Procesor Intel® Core™ i5-8600K ', 400, 10, 'processor'),
(8, 'Intel Xeon 6-Core X5690 3.46GHz LGA1366', 1000, 4, 'processor'),
(9, 'Procesor Intel Core™ i3 Coffee Lake i3-8300', 300, 46, 'processor'),
(10, 'Procesor AMD Ryzen 5 2600', 700, 32, 'processor'),
(11, 'Kingston 8GB DDR4 3200MHz', 100, 217, 'RAM'),
(12, 'Kingston 4GB DDR4 3200MHz', 150, 412, 'RAM'),
(13, 'Corsair Vengeance 8GB (2x4GB) DDR4 3200MHz', 100, 125, 'RAM'),
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
(26, 'Toshiba 1TB 32MB 7200rpm SATA3', 357, 85, 'HDD'),
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
(41, 'ASUS GeForce GTX 1060 STRIX, 6GB GDDR5, 192-bit', 359, 51, 'Videocard'),
(42, 'ASUS GeForce GTX 1050 Ti STRIX GAMING O4G', 276, 249, 'Videocard'),
(43, 'ASUS GeForce GTX 1060 DUAL, 3GB GDDR5, 192-bit', 562, 119, 'Videocard'),
(44, 'GIGABYTE GeForce GTX 1060 WINDFORCE 2, 3GB GDDR5, 192-bit', 642, 165, 'Videocard'),
(45, 'KFA GeForce GTX 1050 Ti EXOC White, 4GB GDDR5, 128-bit', 435, 162, 'Videocard'),
(46, 'ASUS GeForce GTX 1080 Ti Turbo, 11GB GDDR5X, 352-bit', 635, 215, 'Videocard'),
(47, ' ASUS GeForce GTX 1080 STRIX ADVANCED, 8GB GDDR5X, 256-bit', 1300, 56, 'Videocard'),
(48, 'ASUS GeForce GTX 1070 DUAL OC 8GB GDDR5 256-bit', 1150, 13, 'Videocard'),
(49, 'MSI GeForce GTX 1060 GAMING X, 6GB GDDR5, 192-bit', 1240, 42, 'Videocard'),
(50, 'Gigabyte GeForce GTX 1080 WINDFORCE OC, 8GB GDDR5X, 256-bit', 1400, 25, 'Videocard'),
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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `name`, `address`, `phone`) VALUES
(1, 'peter', '8cb2237d0679ca88db6464eac', 'peter@griffin.com', 'Peter', 'Budapest', '1234567'),
(3, 'pista', '8cb2237d0679ca88db6464eac60da96345513964', 'pista@yahoo.com', 'Pista', 'MarosvÃ¡sÃ¡rhely', '124561'),
(4, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'popa@gmail.com', 'admin', 'decebal, nr11', '0747203495');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

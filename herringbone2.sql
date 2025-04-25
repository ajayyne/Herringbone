-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2025 at 10:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herringbone2`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminpanel`
--

CREATE TABLE `adminpanel` (
  `adminID` int(11) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `userPassword` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminpanel`
--

INSERT INTO `adminpanel` (`adminID`, `userName`, `userPassword`) VALUES
(1, 'ADegnerBudd04042025', 'MatchaTea12'),
(2, 'JHunter04042025', 'HboneWebAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brandDescription` varchar(500) DEFAULT NULL,
  `BrandID` int(11) NOT NULL,
  `brandImage` varchar(100) DEFAULT NULL,
  `BrandName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandDescription`, `BrandID`, `brandImage`, `BrandName`) VALUES
('Islander', 1, 'images/brands/islander.png', 'Islander UK specializes in premium Harris Tweed® footwear and accessories, seamlessly combining traditional Scottish craftsmanshi'),
('Skye Candle Co', 2, 'images/brands/skye.png', 'The Isle of Skye Candle Company captures the enchanting spirit of Scotland’s landscapes through its handcrafted candles. Crafte'),
('Heather Gems', 5, 'images/brands/heathergems.png', 'Heather Gems is a unique jewelry brand that transforms the natural beauty of Scottish heather into stunning, handcrafted pieces. E'),
('Essence of Harris', 9, 'images/brands/harris.jpg', 'The Essence of Harris is a distinguished fragrance brand that embodies elegance and sophistication, drawing inspiration from the r'),
('Kath-d-Art', 23, 'images/brands/cowprint5.jpg', 'Kath is a self taught artist based in the beautiful Scottish Borders, working in acrylics on canvas her artwork is full of colour'),
('Hairy Coo', 24, 'images/brands/hairycoo.png', 'Hairy Coo is a quirky Scottish brand known for its playful, handcrafted gifts and homeware. It was started in 2013 by a mother and');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Bags'),
(2, 'Candles'),
(5, 'Cards'),
(6, 'Scarves'),
(7, 'Art Prints'),
(8, 'Home Decor'),
(9, 'Jewellery'),
(10, 'Kids');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `defaultImg` tinyint(1) NOT NULL DEFAULT 0,
  `ImageID` int(11) NOT NULL,
  `ImageURL` varchar(100) NOT NULL,
  `ProdOptionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordereditems`
--

CREATE TABLE `ordereditems` (
  `itemPrice` decimal(5,2) NOT NULL,
  `itemQuantity` int(11) NOT NULL,
  `orderedItemID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `ProdOptionID` int(11) NOT NULL,
  `totalItemPrice` decimal(6,2) GENERATED ALWAYS AS (`itemPrice` * `itemQuantity`) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Address1` varchar(100) NOT NULL,
  `Address2` varchar(100) NOT NULL,
  `County` varchar(50) NOT NULL,
  `customerEmail` varchar(100) NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `orderFulfilled` tinyint(1) NOT NULL DEFAULT 0,
  `orderID` int(11) NOT NULL,
  `orderNumber` int(6) NOT NULL,
  `orderTotal` decimal(6,2) DEFAULT NULL,
  `paymentMade` tinyint(1) DEFAULT 0,
  `postCode` varchar(10) NOT NULL,
  `Town` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `before_insert_orders` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN
    IF NEW.orderNumber IS NULL THEN
        SET NEW.orderNumber = FLOOR(100000 + RAND() * 900000);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Bestseller` tinyint(1) NOT NULL DEFAULT 0,
  `BrandID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `DefaultDisplay` tinyint(1) NOT NULL DEFAULT 0,
  `Description` varchar(500) NOT NULL,
  `Price` decimal(5,2) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_option`
--

CREATE TABLE `product_option` (
  `Colour` varchar(50) NOT NULL,
  `isAvailable` tinyint(1) NOT NULL DEFAULT 0,
  `ProdOptionID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminpanel`
--
ALTER TABLE `adminpanel`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ImageID`);

--
-- Indexes for table `ordereditems`
--
ALTER TABLE `ordereditems`
  ADD PRIMARY KEY (`orderedItemID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `product_option`
--
ALTER TABLE `product_option`
  ADD PRIMARY KEY (`ProdOptionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminpanel`
--
ALTER TABLE `adminpanel`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `ordereditems`
--
ALTER TABLE `ordereditems`
  MODIFY `orderedItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_option`
--
ALTER TABLE `product_option`
  MODIFY `ProdOptionID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

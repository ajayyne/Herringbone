-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2025 at 12:59 PM
-- Server version: 8.0.42
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herringbone`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminpanel`
--

CREATE TABLE `adminpanel` (
  `adminID` int NOT NULL,
  `userName` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `userPassword` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
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
  `brandDescription` varchar(800) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `BrandID` int NOT NULL,
  `brandImage` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `BrandName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandDescription`, `BrandID`, `brandImage`, `BrandName`) VALUES
('Islander UK is a Scottish accessories brand renowned for its high-quality handbags and accessories crafted from authentic Harris Tweed®. Established in 2010 as Snow Paw UK, the company rebranded to Islander UK in 2020 to better reflect its evolving identity and commitment to blending traditional Scottish heritage with contemporary design. At the heart of Islander\'s products is Harris Tweed®, a fabric exclusively handwoven in the Outer Hebrides of Scotland. Protected by its own Act of Parliament, Harris Tweed® is made from pure virgin wool that is dyed, spun, and woven on the islands, ensuring each piece is a testament to skilled craftsmanship and rich tradition.​', 1, 'images/brands/islander.png', 'Islander'),
('The Isle of Skye Candle Company is a family-run business based on the scenic Isle of Skye, Scotland. Specializing in hand-poured candles, they offer a range of products inspired by the island’s breathtaking landscapes, coastal air, and vibrant flora. Using high-quality wax and eco-friendly ingredients, their candles capture the essence of Skye with scents like fresh sea breeze and calming lavender. Committed to sustainability, they use vegan wax and recyclable packaging. Perfect as gifts or for adding a touch of Skye’s magic to your home, their candles create a relaxing, nature-inspired atmosphere.', 2, 'images/brands/skye.png', 'Skye Candle Co'),
('Heather Gems is a unique jewellery brand that transforms the natural beauty of Scottish heather into stunning, handcrafted pieces. The original company was set up in a small factory in East Kilbride and began producing Heathergems in the spring of 1970. Heathergems are now stocked in many shops throughout the UK and across the world. Nowhere else in the world will you find this range of jewellery and gifts being produced.', 5, 'images/brands/heathergems.png', 'Heather Gems'),
('Essence of Harris is a luxury candle and home fragrance brand inspired by the rugged beauty of the Isle of Harris in Scotland’s Outer Hebrides. Founded in 2015, the company creates sustainable, handcrafted products, including soy wax candles, reed diffusers, and bath products, all designed to capture the essence of their island home.\r\n\r\nWith a focus on quality and community, Essence of Harris has grown into an internationally recognized brand, known for its unique, nature-inspired scents like Haar, Mara, and Dusk. The company is committed to sustainability, offering refill stations and eco-friendly packaging.', 9, 'images/brands/harris.jpg', 'Essence of Harris'),
('Kath-D-Art is a creative studio based in the Scottish Borders that specializes in unique, handcrafted artwork and gifts. Known for its vibrant and contemporary designs, the brand brings a fresh approach to traditional art, blending bold colours and playful patterns to create eye-catching pieces.\r\n\r\nKath-D-Art’s collection includes original paintings, prints, and personalized gifts, each designed to add a touch of creativity and individuality to any space. With a focus on quality craftsmanship and innovative design, Kath-D-Art offers one-of-a-kind creations that make perfect gifts or stunning additions to your home.', 23, 'images/brands/cowprint5.jpg', 'Kath-d-Art'),
('Hairy Coo is run by mother and daughter partnership Sheila and Emma.  Sheila began growing the business in 2013, with the focus on handwrapped Hairy Coo accessories and was even awarded the Best Product Award at the Scottish Trade show in her first year trading!\r\n\r\nWhen Emma joined in 2018 they began to grow the product range. First introducing Woolly Ewe and then branching out into homeware and textiles. It was when Emma’s children came along in 2019 they decided to explore the idea of introducing a children’s range and soon Baby Coo was born. \r\n\r\nBoth live in Highland Perthshire where Hairy Coo HQ is located. They have a team of fantastic wrappers based in the highlands who they couldn’t do without! ', 24, 'images/brands/hairycoo.png', 'Hairy Coo'),
('We are proud to offer you the very best quality in hand crafted glassware. Where we can, we use recycled materials: many of our beautiful items use crystal glass reclaimed from the manufacture of high-end wine glasses and our packaging has always been easily recyclable.  Don\'t miss our delightful fused glass animals. What started with just a few cats is now a menagerie which keeps growing. All pieces are entirely hand-made, giving them their particular charm and collectability.', 25, 'images/brands/dj.png', 'D and J Glassware'),
('Alex embarked on her entrepreneurial journey by acquiring a derelict stable in Stanhope. Born in 1974 in Shotley Bridge, County Durham, she has remained deeply connected to her roots, proudly residing in the Northeast. While Newcastle-Upon-Tyne\'s urban expanse lies nearby, the tranquil Derwent countryside offers a serene contrast, allowing her to embrace a lifestyle that feels distinct and fulfilling.', 26, 'images/brands/Screenshot 2025-05-11 220134.png', 'Alex Clark');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int NOT NULL,
  `CategoryName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
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
(10, 'Kids'),
(11, 'Glassware');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `defaultImg` tinyint(1) NOT NULL DEFAULT '0',
  `ImageID` int NOT NULL,
  `ImageURL` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ProdOptionID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`defaultImg`, `ImageID`, `ImageURL`, `ProdOptionID`) VALUES
(1, 211, 'images/products/bags/480008553_626289886614577_4997627005113140658_n.jpg', 10),
(1, 214, 'images/products/art prints/dogprint.jpg', 14),
(1, 217, 'images/products/kids/cutlery1.jpg', 13),
(0, 218, 'images/products/kids/cutlery2.jpg', 13),
(1, 222, 'images/products/bags/coin-purse-green.png', 17),
(0, 223, 'images/products/bags/68121d7378fd3_coinpurse-open.png', 17),
(1, 224, 'images/products/bags/coin-purse-navy.png', 18),
(0, 225, 'images/products/bags/68121d9b5f8f8_coinpurse-open.png', 18),
(1, 235, 'images/products/candles/Screenshot 2025-04-10 194720.png', 22),
(0, 236, 'images/products/candles/Screenshot 2025-04-10 194741.png', 22),
(1, 237, 'images/products/candles/Screenshot 2025-04-10 194815.png', 23),
(0, 238, 'images/products/candles/Screenshot 2025-04-10 194834.png', 23),
(1, 239, 'images/products/art prints/sheepprint.jpg', 24),
(1, 240, 'images/products/bags/479112694_626290029947896_292319803732960672_n.jpg', 15),
(0, 241, 'images/products/bags/68121d137ee54_480008553_626289886614577_4997627005113140658_n.jpg', 15),
(1, 242, 'images/products/bags/68122ad341fe1_backpack-blue.png', 25),
(0, 243, 'images/products/bags/68122ad342ea1_backpack-blue2.png', 25),
(0, 244, 'images/products/bags/backpack-blue3.png', 25),
(1, 245, 'images/products/bags/green1.png', 26),
(0, 246, 'images/products/bags/green2.png', 26),
(1, 248, 'images/products/jewellery/brooch.png', 28),
(0, 249, 'images/products/jewellery/brooch2.png', 28),
(1, 250, 'images/products/jewellery/bangle.png', 29),
(1, 251, 'images/products/jewellery/earrings.png', 30),
(1, 252, 'images/products/jewellery/earrings2.png', 31),
(1, 253, 'images/products/jewellery/earrings3.png', 32),
(1, 254, 'images/products/jewellery/earrings4.png', 33),
(1, 255, 'images/products/jewellery/heartbrooch.png', 34),
(1, 257, 'images/products/jewellery/pendant.png', 36),
(1, 258, 'images/products/jewellery/thistle.png', 37),
(1, 259, 'images/products/glassware/donkey.jpg', 38),
(1, 260, 'images/products/glassware/cowglass.jpg', 39),
(1, 261, 'images/products/bags/minisatchel.png', 40),
(0, 262, 'images/products/bags/minisatchelblue.png', 40),
(0, 263, 'images/products/bags/minisatchelblue2.png', 40),
(0, 264, 'images/products/bags/minisatchelblue3.png', 40),
(1, 265, 'images/products/bags/minisatchelblack.png', 41),
(0, 266, 'images/products/bags/satchel-black.png', 41),
(1, 267, 'images/products/candles/harris_seilebost.jpg', 42),
(1, 268, 'images/products/candles/harris_losgaintir.jpg', 43),
(1, 269, 'images/products/candles/harris_horgabost.jpg', 44),
(1, 270, 'images/products/candles/adru.png', 45),
(0, 271, 'images/products/candles/adru2.png', 45),
(1, 272, 'images/products/candles/Huisnis.png', 46),
(0, 273, 'images/products/candles/Huisnis2.png', 46),
(1, 274, 'images/products/candles/mara.png', 47),
(0, 275, 'images/products/candles/mara2.png', 47),
(1, 276, 'images/products/candles/peony.png', 48),
(0, 277, 'images/products/candles/peony2.png', 48),
(0, 279, 'images/products/candles/logastir1.png', 49),
(1, 280, 'images/products/candles/logastir2.png', 49),
(1, 281, 'images/products/candles/mist.png', 50),
(0, 282, 'images/products/candles/mist2.png', 50),
(1, 283, 'images/products/scarves/scarf2.jpg', 51),
(0, 284, 'images/products/scarves/scarf4.jpg', 51),
(1, 285, 'images/products/scarves/scarf1.jpg', 52),
(0, 286, 'images/products/scarves/scarf3.jpg', 52),
(1, 287, 'images/products/scarves/scarf5.jpg', 53),
(0, 288, 'images/products/scarves/scarf6.jpg', 53),
(1, 289, 'images/products/scarves/scarf7.jpg', 54),
(0, 290, 'images/products/scarves/scarf8.jpg', 54),
(1, 291, 'images/products/bags/bonjour.png', 55),
(1, 292, 'images/products/bags/view-women-s-purse-tiles-with-mediterranean-aesthetics_23-2150916723.jpg', 56),
(1, 293, 'images/products/bags/Screenshot 2025-05-11 213538.png', 57),
(0, 294, 'images/products/bags/Screenshot 2025-05-11 213603.png', 57),
(1, 295, 'images/products/bags/beach.png', 58),
(0, 296, 'images/products/bags/beach2.png', 58),
(0, 297, 'images/products/bags/beachh.png', 58),
(1, 298, 'images/products/bags/brown.png', 59),
(0, 299, 'images/products/bags/brown2.png', 59),
(1, 300, 'images/products/bags/purple.png', 60),
(0, 301, 'images/products/bags/purple2.png', 60),
(1, 302, 'images/products/cards/baaaa.png', 61),
(1, 303, 'images/products/art prints/didye.png', 62),
(1, 304, 'images/products/cards/neigh.png', 63),
(1, 305, 'images/products/cards/heartcow.png', 64),
(1, 306, 'images/products/cards/Screenshot 2025-05-11 215932.png', 65),
(1, 307, 'images/products/cards/Screenshot 2025-05-11 220057.png', 66),
(1, 308, 'images/products/cards/Screenshot 2025-05-11 220112.png', 67),
(1, 309, 'images/products/bags/Screenshot 2025-05-11 220554.png', 68),
(1, 310, 'images/products/scarves/Screenshot 2025-05-11 220821.png', 69),
(1, 311, 'images/products/candles/duskreed.png', 70),
(0, 313, 'images/products/candles/Screenshot 2025-05-12 195.png', 71),
(1, 314, 'images/products/candles/Screenshot 2025-05-12 195133.png', 71),
(1, 315, 'images/products/home decor/Screenshot 2025-05-12 195410.png', 72),
(0, 316, 'images/products/home decor/Screenshot 2025-05-12 195431.png', 72),
(1, 317, 'images/products/candles/wax3.png', 73),
(1, 318, 'images/products/candles/wax1.png', 74),
(1, 319, 'images/products/candles/wax2.png', 75),
(1, 320, 'images/products/candles/reed1.png', 76),
(0, 321, 'images/products/candles/reed2.png', 76),
(1, 322, 'images/products/cards/Screenshot 2025-05-12 200705.png', 77),
(0, 323, 'images/products/cards/Screenshot 2025-05-12 200715.png', 77),
(1, 324, 'images/products/cards/Screenshot 2025-05-12 200642.png', 78),
(0, 325, 'images/products/cards/Screenshot 2025-05-12 200650.png', 78),
(1, 326, 'images/products/cards/Screenshot 2025-05-12 200611.png', 79),
(0, 327, 'images/products/cards/Screenshot 2025-05-12 200622.png', 79),
(1, 328, 'images/products/cards/Screenshot 2025-05-12 200949.png', 80),
(0, 329, 'images/products/cards/Screenshot 2025-05-12 200958.png', 80),
(1, 330, 'images/products/cards/Screenshot 2025-05-12 201105.png', 81),
(1, 331, 'images/products/cards/Screenshot 2025-05-12 201243.png', 82),
(1, 332, 'images/products/cards/Screenshot 2025-05-12 201356.png', 83),
(0, 333, 'images/products/cards/Screenshot 2025-05-12 201406.png', 83),
(0, 334, 'images/products/cards/Screenshot 2025-05-12 201417.png', 83),
(1, 335, 'images/products/cards/Screenshot 2025-05-12 201555.png', 84),
(0, 336, 'images/products/cards/Screenshot 2025-05-12 201602.png', 84),
(1, 337, 'images/products/cards/Screenshot 2025-05-12 201715.png', 85),
(0, 338, 'images/products/cards/Screenshot 2025-05-12 201724.png', 85),
(1, 339, 'images/products/cards/Screenshot 2025-05-12 201825.png', 86),
(1, 340, 'images/products/cards/Screenshot 2025-05-12 201839.png', 87),
(1, 341, 'images/products/cards/Screenshot 2025-05-12 201910.png', 88),
(1, 342, 'images/products/cards/Screenshot 2025-05-12 202114.png', 89),
(1, 343, 'images/products/cards/Screenshot 2025-05-12 202103.png', 90),
(1, 344, 'images/products/cards/Screenshot 2025-05-12 202126.png', 91),
(1, 345, 'images/products/cards/Screenshot 2025-05-12 202303.png', 92),
(1, 346, 'images/products/cards/Screenshot 2025-05-12 202348.png', 93),
(1, 347, 'images/products/cards/Screenshot 2025-05-12 202433.png', 94),
(1, 348, 'images/products/cards/Screenshot 2025-05-12 202521.png', 95),
(1, 349, 'images/products/cards/Screenshot 2025-05-12 202559.png', 96),
(1, 350, 'images/products/cards/Screenshot 2025-05-12 202641.png', 97),
(1, 351, 'images/products/cards/Screenshot 2025-05-12 202745.png', 98),
(1, 352, 'images/products/cards/Screenshot 2025-05-12 202734.png', 99),
(1, 353, 'images/products/cards/Screenshot 2025-05-12 202721.png', 100),
(1, 355, 'images/products/kids/Screenshot 2025-05-12 203341.png', 102),
(0, 356, 'images/products/kids/Screenshot 2025-05-12 203354.png', 102),
(1, 357, 'images/products/kids/Screenshot 2025-05-12 203705.png', 103),
(0, 358, 'images/products/kids/Screenshot 2025-05-12 203714.png', 103),
(0, 359, 'images/products/kids/Screenshot 2025-05-12 203722.png', 103),
(1, 360, 'images/products/kids/Screenshot 2025-05-12 204005.png', 104),
(0, 361, 'images/products/kids/Screenshot 2025-05-12 204013.png', 104),
(1, 362, 'images/products/candles/Screenshot 2025-05-14 095815.png', 105),
(0, 363, 'images/products/candles/Screenshot 2025-05-14 095824.png', 105),
(0, 364, 'images/products/candles/Screenshot 2025-05-14 095831.png', 105),
(0, 365, 'images/products/candles/Screenshot 2025-05-14 095840.png', 105),
(1, 366, 'images/products/candles/Screenshot 2025-05-14 095946.png', 106),
(0, 367, 'images/products/candles/Screenshot 2025-05-14 095954.png', 106),
(0, 368, 'images/products/candles/Screenshot 2025-05-14 100002.png', 106),
(0, 369, 'images/products/candles/Screenshot 2025-05-14 100014.png', 106),
(1, 370, 'images/products/candles/Screenshot 2025-05-14 100026.png', 107),
(0, 371, 'images/products/candles/Screenshot 2025-05-14 100038.png', 107),
(0, 372, 'images/products/candles/Screenshot 2025-05-14 100048.png', 107),
(0, 373, 'images/products/candles/Screenshot 2025-05-14 100056.png', 107),
(1, 374, 'images/products/candles/Screenshot 2025-05-14 095858.png', 108),
(0, 375, 'images/products/candles/Screenshot 2025-05-14 095913.png', 108),
(0, 376, 'images/products/candles/Screenshot 2025-05-14 095925.png', 108),
(1, 377, 'images/products/candles/Screenshot 2025-05-14 100134.png', 109),
(0, 378, 'images/products/candles/Screenshot 2025-05-14 100142.png', 109),
(1, 379, 'images/products/candles/Screenshot 2025-05-14 100114.png', 110),
(0, 380, 'images/products/candles/Screenshot 2025-05-14 100123.png', 110),
(1, 381, 'images/products/candles/Screenshot 2025-05-14 100154.png', 111),
(0, 382, 'images/products/candles/Screenshot 2025-05-14 100202.png', 111),
(1, 383, 'images/products/candles/Screenshot 2025-05-14 100214.png', 112),
(0, 384, 'images/products/candles/Screenshot 2025-05-14 100223.png', 112),
(1, 385, 'images/products/bags/Screenshot 2025-05-14 094936.png', 113),
(0, 386, 'images/products/bags/Screenshot 2025-05-14 095037.png', 113),
(1, 387, 'images/products/bags/Screenshot 2025-05-14 094625.png', 114),
(0, 388, 'images/products/bags/Screenshot 2025-05-14 094721.png', 114),
(1, 389, 'images/products/bags/Screenshot 2025-05-14 094909.png', 115),
(0, 390, 'images/products/bags/Screenshot 2025-05-14 094926.png', 115),
(1, 391, 'images/products/cards/Screenshot 2025-05-14 095341.png', 116),
(1, 392, 'images/products/cards/Screenshot 2025-05-14 095350.png', 117),
(1, 393, 'images/products/cards/Screenshot 2025-05-14 095359.png', 118),
(1, 394, 'images/products/cards/Screenshot 2025-05-14 095409.png', 119),
(1, 395, 'images/products/cards/Screenshot 2025-05-14 095424.png', 120),
(1, 396, 'images/products/cards/Screenshot 2025-05-14 095438.png', 121),
(1, 397, 'images/products/cards/Screenshot 2025-05-14 095447.png', 122),
(1, 398, 'images/products/cards/Screenshot 2025-05-14 095459.png', 123),
(1, 399, 'images/products/home decor/Screenshot 2025-05-14 093220.png', 124),
(1, 400, 'images/products/home decor/Screenshot 2025-05-14 093233.png', 125),
(0, 401, 'images/products/home decor/Screenshot 2025-05-14 093242.png', 125),
(0, 402, 'images/products/home decor/Screenshot 2025-05-14 093251.png', 125),
(1, 403, 'images/products/home decor/Screenshot 2025-05-14 094445.png', 126),
(1, 404, 'images/products/home decor/Screenshot 2025-05-14 095114.png', 127),
(0, 405, 'images/products/home decor/Screenshot 2025-05-14 095126 (1).png', 127),
(0, 406, 'images/products/home decor/Screenshot 2025-05-14 095145 (1).png', 127),
(1, 407, 'images/products/candles/Screenshot 2025-05-14 104433.png', 128),
(0, 408, 'images/products/candles/Screenshot 2025-05-14 104444.png', 128),
(1, 409, 'images/products/candles/Screenshot 2025-05-14 104455.png', 129),
(0, 410, 'images/products/candles/Screenshot 2025-05-14 104503.png', 129),
(1, 411, 'images/products/candles/Screenshot 2025-05-14 104516.png', 130),
(0, 412, 'images/products/candles/Screenshot 2025-05-14 104530.png', 130),
(1, 413, 'images/products/home decor/Screenshot 2025-05-14 104954.png', 131),
(0, 414, 'images/products/home decor/Screenshot 2025-05-14 105006.png', 131),
(1, 415, 'images/products/glassware/sheepglass.jpg', 132),
(1, 416, 'images/products/home decor/Screenshot 2025-05-14 105909.png', 133),
(1, 417, 'images/products/home decor/Screenshot 2025-05-14 105900.png', 134),
(1, 418, 'images/products/home decor/Screenshot 2025-05-14 105851.png', 135),
(1, 419, 'images/products/art prints/Screenshot 2025-05-14 110825.png', 136),
(1, 420, 'images/products/art prints/Screenshot 2025-05-14 110838.png', 137),
(1, 421, 'images/products/art prints/Screenshot 2025-05-14 110853.png', 138),
(1, 422, 'images/products/art prints/Screenshot 2025-05-14 110902.png', 139),
(1, 423, 'images/products/scarves/Screenshot 2025-05-14 110915.png', 140),
(0, 424, 'images/products/scarves/Screenshot 2025-05-14 110924.png', 140),
(1, 425, 'images/products/scarves/Screenshot 2025-05-14 110939.png', 141),
(0, 426, 'images/products/scarves/Screenshot 2025-05-14 110947.png', 141),
(1, 427, 'images/products/bags/Screenshot 2025-05-14 110957.png', 142),
(1, 428, 'images/products/home decor/Screenshot 2025-05-14 111008.png', 143),
(0, 429, 'images/products/home decor/Screenshot 2025-05-14 111016.png', 143),
(1, 430, 'images/products/home decor/Screenshot 2025-05-14 111056.png', 144),
(0, 431, 'images/products/home decor/Screenshot 2025-05-14 111105.png', 144),
(1, 432, 'images/products/home decor/Screenshot 2025-05-14 111028.png', 145),
(0, 433, 'images/products/home decor/Screenshot 2025-05-14 111038.png', 145),
(1, 434, 'images/products/home decor/Screenshot 2025-05-14 111115.png', 146),
(1, 435, 'images/products/home decor/Screenshot 2025-05-14 111122.png', 147),
(1, 436, 'images/products/home decor/Screenshot 2025-05-14 111131.png', 148),
(1, 437, 'images/products/home decor/Screenshot 2025-05-14 111149.png', 149),
(1, 438, 'images/products/home decor/Screenshot 2025-05-14 111141.png', 150),
(1, 439, 'images/products/home decor/Screenshot 2025-05-14 111159.png', 151),
(1, 440, 'images/products/home decor/Screenshot 2025-05-14 111208.png', 152),
(1, 441, 'images/products/home decor/Screenshot 2025-05-14 114028.png', 153),
(0, 442, 'images/products/home decor/Screenshot 2025-05-14 114041.png', 153),
(0, 443, 'images/products/home decor/Screenshot 2025-05-14 114051.png', 153),
(1, 444, 'images/products/home decor/Screenshot 2025-05-14 114153.png', 154),
(0, 445, 'images/products/home decor/Screenshot 2025-05-14 114204.png', 154),
(0, 446, 'images/products/home decor/Screenshot 2025-05-14 114214.png', 154),
(1, 447, 'images/products/cards/Screenshot 2025-05-14 111311.png', 155),
(0, 448, 'images/products/cards/Screenshot 2025-05-14 111357.png', 155),
(1, 449, 'images/products/cards/Screenshot 2025-05-14 111325.png', 156),
(0, 450, 'images/products/cards/Screenshot 2025-05-14 111333.png', 156),
(1, 451, 'images/products/cards/Screenshot 2025-05-14 111409.png', 157),
(0, 452, 'images/products/cards/Screenshot 2025-05-14 111416.png', 157),
(1, 453, 'images/products/cards/Screenshot 2025-05-14 111428.png', 158),
(0, 454, 'images/products/cards/Screenshot 2025-05-14 111437.png', 158),
(1, 455, 'images/products/cards/Screenshot 2025-05-14 111448.png', 159),
(1, 456, 'images/products/cards/Screenshot 2025-05-14 111458.png', 160),
(1, 457, 'images/products/home decor/Screenshot 2025-05-14 111611.png', 161),
(1, 458, 'images/products/home decor/Screenshot 2025-05-14 111620.png', 162),
(1, 459, 'images/products/home decor/Screenshot 2025-05-14 111633.png', 163),
(1, 460, 'images/products/home decor/Screenshot 2025-05-14 111645.png', 164);

-- --------------------------------------------------------

--
-- Table structure for table `ordereditems`
--

CREATE TABLE `ordereditems` (
  `itemPrice` decimal(5,2) NOT NULL,
  `itemQuantity` int NOT NULL,
  `orderedItemID` int NOT NULL,
  `orderID` int NOT NULL,
  `ProdOptionID` int NOT NULL,
  `totalItemPrice` decimal(6,2) GENERATED ALWAYS AS ((`itemPrice` * `itemQuantity`)) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordereditems`
--

INSERT INTO `ordereditems` (`itemPrice`, `itemQuantity`, `orderedItemID`, `orderID`, `ProdOptionID`) VALUES
(12.00, 1, 9, 14, 13),
(12.00, 1, 10, 15, 14),
(12.00, 1, 11, 16, 24),
(65.00, 1, 12, 17, 40),
(65.00, 1, 13, 18, 60),
(14.50, 1, 14, 19, 68),
(65.00, 1, 15, 20, 40),
(65.00, 1, 16, 20, 41),
(20.00, 1, 17, 20, 22);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Address1` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Address2` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `County` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `customerEmail` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `customerName` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `orderFulfilled` tinyint(1) NOT NULL DEFAULT '0',
  `orderID` int NOT NULL,
  `orderNumber` int NOT NULL,
  `orderTotal` decimal(6,2) DEFAULT NULL,
  `paymentMade` tinyint(1) DEFAULT NULL,
  `postCode` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Town` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Address1`, `Address2`, `County`, `customerEmail`, `customerName`, `orderFulfilled`, `orderID`, `orderNumber`, `orderTotal`, `paymentMade`, `postCode`, `Town`) VALUES
('9 venlaw quarry road', '', 'Scottish Borders', 'amberdegner@gmail.com', 'Amber', 1, 14, 106032, 14.99, 1, 'EH45 8RJ', 'Peebles'),
('3fhfhghg', 'jghgn', 'Scottish Borders', 'amber@yahoo.com', 'Amber', 1, 15, 288340, 14.99, 0, 'EH56 858', 'Peebles'),
('9 venlaw quarry road', '', 'Scottish Borders', 'hello@peebles.co.uk', 'Claire Smith', 0, 16, 720023, 14.99, 1, 'EH45 8RJ', 'Peebles'),
('9 venlaw quarry road', '', 'Scottish Borders', 'hello@peebles.co.uk', 'Claire Smith', 0, 17, 472267, 262.99, 1, 'EH45 8RJ', 'Peebles'),
('9 venlaw quarry road', '', 'Scottish Borders', 'hello@peebles.co.uk', 'Amber Degner', 0, 18, 393567, 132.99, 1, 'EH45 8RJ', 'Peebles'),
('9 venlaw quarry road', '', 'Scottish Borders', 'hello@peebles.co.uk', 'Amber Degner', 0, 19, 613698, 17.49, 1, 'EH45 8RJ', 'Peebles'),
('9 venlaw quarry road', '', 'Scottish Borders', 'hello@peebles.co.uk', 'Amber Degner', 0, 20, 604439, 432.99, 0, 'EH45 8RJ', 'Peebles');

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
DELIMITER $$
CREATE TRIGGER `before_order_insert` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN
  SET NEW.orderNumber = LPAD(FLOOR(100000 + (RAND() * 900000)), 6, '0');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Bestseller` tinyint(1) NOT NULL DEFAULT '0',
  `BrandID` int NOT NULL,
  `CategoryID` int NOT NULL,
  `DefaultDisplay` tinyint(1) NOT NULL DEFAULT '0',
  `Description` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `Price` decimal(5,2) NOT NULL,
  `ProductID` int NOT NULL,
  `ProductName` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Bestseller`, `BrandID`, `CategoryID`, `DefaultDisplay`, `Description`, `Price`, `ProductID`, `ProductName`) VALUES
(0, 24, 10, 1, 'Our unique Highland Cow bamboo kids\' plate is perfect for mealtimes. With a gender-neutral design, four sections, and a suction base, it’s ideal for both boys and girls.\r\n\r\nEasy to care for—just hand wash and apply coconut oil once a month for added longevity.\r\n\r\nPresented in a beautiful open-lid gift box, it’s a great gift, especially when paired with our matching spoons. A perfect keepsake for Scotland or Highland cattle fans.', 12.50, 11, 'Bamboo Dining Set'),
(0, 23, 7, 1, 'Bring charm and character to your space with this beautifully detailed art print of a spaniel. Capturing the breed’s gentle eyes and playful spirit, this piece celebrates the loyal and affectionate nature of one of Britain’s most beloved dogs. Perfect for dog lovers and art enthusiasts alike, it adds warmth and personality to any room.', 15.00, 12, 'Spaniel Print'),
(0, 24, 10, 1, 'This ultra-soft bamboo towel features a Baby Coo design with adorable horns on the hood. Generously sized and made from absorbent bamboo terry, it’s gentle on your baby’s skin and perfect for bath time or naps.\r\n\r\nWith its gender-neutral Highland Coo theme, it makes an ideal baby shower gift. Presented in a beautiful gift box, it’s a thoughtful keepsake for both boys and girls.', 21.00, 13, 'Bamboo Towel'),
(1, 9, 2, 1, 'A luscious fusion of wild rhubarb, crisp sweet apples, soft peony, and radiant neroli, grounded by a seductive base of patchouli and musk.\r\n\r\nInspiration: As the sun dips below the horizon, the world is bathed in the golden glow of dusk. Inspired by serene summer evenings where time slows and everything is touched by warmth and wonder. Pause, breathe, and savour the essence of Dusk.', 20.00, 18, 'Dusk Candle'),
(1, 9, 2, 1, 'An earthy fusion of fig leaf and cedarwood, layered with vetiver, tonka bean, and leather, all resting on a warm, rich base of amber.\r\n\r\nInspiration: Along the island’s dramatic coastline, the gentle arrival of the haar brings a quiet calm. As the sea mist rolls inland, it softens the rugged landscape in a tranquil embrace—offering serenity, even on the greyest days.', 20.00, 19, 'Haar Candle'),
(1, 23, 7, 1, 'Add a touch of countryside charm and humour to your home with this delightful art print of a sheep in bright red welly boots. Full of personality and playful detail, this quirky piece is perfect for bringing a smile to any wall—ideal for farmhouse kitchens, cosy nooks, or anyone who loves a bit of rural whimsy.', 12.00, 20, 'Sheep Print'),
(1, 5, 9, 1, 'This quirky Scottie Dog Heathergem brooch is handcrafted from Scottish heather, making it a unique and personal gift. Our sustainable process encourages new growth in heather fields, ensuring no two pieces are the same. A beautiful reminder of Scotland’s landscape, it comes in a gift box with a story card.\r\n\r\nHandcrafted in Scotland\r\nDimensions: 35mm x 25mm', 25.50, 22, 'Scottie Dog Brooch'),
(0, 5, 9, 1, 'Celebrate Scotland’s rich culture and landscape with this handcrafted silver bangle, featuring a Celtic knot and a unique gem made from sustainably harvested heather. Each piece is one of a kind, with dyed and compressed heather stems shaped by hand. Presented in a gift box with a story card.\r\n\r\nHandmade in Scotland.\r\nSize: 202mm circumference', 81.00, 23, 'Celtic Bangle'),
(0, 5, 9, 1, 'These handmade silver earrings feature a striking heather gem, offering a unique and beautiful reminder of Scotland’s landscape. Crafted from hand-harvested heather, each pair is one-of-a-kind and supports sustainable growth in Scotland’s fields.\r\n\r\nPresented in a gift box with a story card, they make a personal and meaningful gift.\r\n\r\nHandcrafted in Scotland\r\nDimensions: 34mm x 25mm', 53.99, 24, 'Teardrop Earrings'),
(0, 5, 9, 1, 'Heathergems are a truly unique Scottish treasure, crafted from hand-harvested heather to reflect the beauty of our natural landscape. Each piece is one of a kind, making it a thoughtful and personal gift.\r\n\r\nPresented in a gift box with a story card.\r\n\r\nHandmade in Scotland\r\nDimensions: 25mm x 22mm', 50.95, 25, 'Rounded Triangle Earrings'),
(0, 5, 9, 1, 'These handmade silver earrings feature the iconic Celtic triple knot (Triquetra), celebrating Scotland’s rich heritage. The unique Heathergem, crafted from hand-harvested heather, reflects the beauty of Scotland’s landscape and is sustainably sourced to encourage new growth.\r\n\r\nEach pair is one-of-a-kind, making these earrings a special and meaningful gift. Presented in a gift box with a story card.\r\n\r\nHandcrafted in Scotland\r\nDimensions: 17 x 15 mm', 52.95, 26, 'Celtic Triangle Earrings'),
(0, 5, 9, 1, 'Elegant and versatile, these handmade silver earrings add a touch of sparkle to any look.\r\n\r\nInspired by the Celtic knot and crafted with hand-harvested heather, each pair features unique natural colours—no two are the same.\r\n\r\nA meaningful Scottish gift, presented in a gift box with story card.\r\n\r\nHandcrafted in Scotland\r\nDimensions: 33 x 9 mm', 50.00, 27, 'Celtic Silver Earrings'),
(0, 5, 9, 1, 'This Scottish heart-shaped Luckenbooth brooch, crafted from 925 sterling silver, is a traditional love token often given as a wedding gift. Inspired by Edinburgh’s historic Luckenbooths, where jewellery makers once worked, it features a unique Heathergem, made from hand-harvested Scottish heather.\r\n\r\nEach piece is one-of-a-kind, making it a personal and meaningful gift. Presented in a gift box with a story card.\r\n\r\nHandcrafted in Scotland\r\nDimensions: 37 x 27 mm', 35.00, 28, 'Luckenbooth Heart Brooch'),
(0, 5, 9, 1, 'This elegant pendant features a half-moon Heathergem on an 18\" sterling silver chain—evoking the hills, sea, sun, and moon of the Scottish landscape.\r\n\r\nEach Heathergem is crafted from hand-harvested heather, making every piece unique. A beautiful reminder of Scotland’s natural beauty.\r\n\r\nPresented in a gift box with a story card.\r\n\r\nHandcrafted in Scotland\r\nPendant size: 35mm x 18mm\r\nChain: 18\" sterling silver', 45.95, 30, 'Half Circle Pendant'),
(0, 5, 9, 1, 'Celebrate Scotland’s national flower with this pewter thistle brooch, featuring a unique round Heathergem embellishment. Each Heathergem is one-of-a-kind, making this a personal and meaningful gift.\r\n\r\nPresented in a gift box with a story card.\r\n\r\nHandcrafted in Scotland\r\nDimensions: 37 x 30 mm', 45.95, 31, 'Thistle Brooch'),
(0, 25, 11, 1, 'Meet Dillon the Donkey, a charming glassware ornament handcrafted by D & J Glassware. Carefully sculpted from high-quality glass, Dillon’s playful expression and detailed features make him a delightful addition to any collection.\r\n\r\nA perfect gift for donkey lovers or anyone who appreciates fine craftsmanship, this unique ornament adds warmth and character to any space. Presented in an elegant gift box, Dillon is sure to make a memorable gift.', 21.00, 32, 'Dillon The Donkey - Glass Ornament'),
(0, 25, 11, 1, 'This stunning Highland Cow glassware ornament, handcrafted by D & J Glassware, beautifully captures the spirit of the Scottish Highlands. Meticulously crafted from high-quality glass, its intricate details highlight the cow’s distinctive horns and textured coat.\r\n\r\nA perfect gift for animal lovers or collectors, this unique ornament adds a touch of Scottish charm to any home. Presented in a luxurious gift box, it’s ready to impress.', 35.00, 33, 'Highland Cow - Glass ornament'),
(1, 1, 1, 1, 'Meet The Mini Satchel— loved for its compact design and timeless style. Crafted from microfibre leather and Harris Tweed®, it features a metal twist lock and adjustable strap for everyday elegance and practicality.', 65.00, 34, 'Mini Satchel'),
(1, 9, 2, 1, 'A sensual fragrance blending sweet plum, pomegranate, rose, and patchouli, resting on a rich base of cedarwood and musk.  Seilebost Beach, nestled on the island’s west coast, offers stunning views of Losgaintir and the Isle of Taransay. As you cross the grassy Hebridean dunes, a hidden stretch of white sand and clear blue water reveals itself—welcome to the quiet beauty of Seilebost.', 20.00, 35, 'Seilebost'),
(1, 9, 2, 1, 'Losgaintir Reed Diffuser. Carefully crafted for a sense of calm, our Losgaintir collection blends soothing bergamot, white tea, coconut, and almond, rounded off with soft notes of vanilla and amber.  Inspired by the award-winning Losgaintir Beach—where golden sands meet clear blue waters beneath Beinn Losgaintir—this range captures the essence of a truly unique Scottish escape.', 26.50, 36, 'Losgaintir Reed Diffuser'),
(1, 9, 2, 1, 'Horgabost combines zesty lemongrass, sharp Sicilian lemon, and warm ginger root for a vibrant, comforting scent that brightens even the chilliest days.  Inspired by one of the island’s most charming beaches, Horgabost comes alive in summer—its blooming machair and scenic campsite make it a truly special place.', 20.00, 37, 'Horgabost'),
(1, 9, 2, 1, 'Adru is a deep, masculine fragrance inspired by the rugged beauty and rich history of the Isle of Harris—named after the island’s ancient title given by Ptolemy. Fresh green leaves and bergamot open the scent, giving way to warming notes of musk, spiced peppercorns, and heartwood sandal, evoking the island’s wild glens, moorlands, and northern hills.', 20.00, 38, 'Adru'),
(1, 9, 2, 1, 'A vibrant blend of Brazilian orange, pink pomelo, and grapefruit, with juicy watermelon, tart rhubarb, and a touch of warming patchouli.  Inspired by Huisinis Beach on the rugged northern coast of the Isle of Harris, where the Essence of Harris story began—a truly special place.', 20.00, 39, 'Huisinis Candle'),
(1, 9, 2, 1, 'A revitalizing blend of samphire and sea minerals, complemented by soothing eucalyptus and fresh juniper, designed to cleanse the mind, body, and spirit.  Inspiration: From the untouched coastline to the deep blue waters, we are shaped by the mara—the sea. Derived from the Scottish Gaelic word for ‘sea,’ it’s our endless source of inspiration. Escape the everyday and immerse yourself in the calming essence of Mara.', 20.00, 40, 'Mara Candle'),
(1, 9, 2, 1, 'Peony Whisper is inspired by the delicate machair flowers that grace the western coasts of Scotland. These soft blooms embody the natural beauty and serenity of the isles. As they dance in the gentle sea breeze, this fragrance surrounds you with a sense of calm, allowing you to carry the magic of Harris with you, wherever you are.', 34.00, 41, 'Peony Whisper Candle'),
(1, 9, 2, 1, 'Losgaintir Candle. Carefully crafted for a sense of calm, our Losgaintir collection blends soothing bergamot, white tea, coconut, and almond, rounded off with soft notes of vanilla and amber. Inspired by the award-winning Losgaintir Beach—where golden sands meet clear blue waters beneath Beinn Losgaintir—this range captures the essence of a truly unique Scottish escape.', 20.00, 42, 'Losgaintir Candle'),
(1, 9, 2, 1, 'A sensual fragrance blending sweet plum, pomegranate, rose, and patchouli, resting on a rich base of cedarwood and musk. Seilebost Beach, nestled on the island’s west coast, offers stunning views of Losgaintir and the Isle of Taransay. As you cross the grassy Hebridean dunes, a hidden stretch of white sand and clear blue water reveals itself—welcome to the quiet beauty of Seilebost.', 17.00, 43, 'Seilebost Room Mist'),
(0, 1, 6, 1, 'Wrap yourself in warmth and elegance with this beautifully crafted pink cable-knit snood. Designed to add a touch of charm to any outfit, this accessory is perfect for chilly days when you want to stay cozy without compromising on style. The intricate cable pattern adds texture and depth, making this snood a standout piece in your wardrobe. ', 24.99, 44, 'Cable Knit Snood'),
(0, 1, 6, 1, 'Elevate any outfit with this classic houndstooth scarf. Its iconic pattern adds sophistication, while the soft, high-quality fabric ensures warmth and comfort. A versatile accessory that\'s perfect for both casual and formal occasions. An ideal gift for those who appreciate timeless style.', 21.00, 45, 'Houndstooth Scarf'),
(0, 1, 6, 1, 'Embrace heritage with this traditional red and black tartan scarf. Its iconic pattern adds a touch of Scottish charm to any outfit, making it a versatile accessory for both casual and formal occasions. Crafted from soft, high-quality materials, it offers warmth and comfort during cooler days. Whether draped over your shoulders or wrapped around your neck, this scarf is a stylish addition to your wardrobe. An ideal gift for those who appreciate timeless style.', 19.50, 46, 'Traditional Tartan Scarf'),
(1, 1, 1, 1, 'Say \"Bonjour\" to eco-friendly elegance with this stylish tote bag. Crafted from recycled materials, it combines sustainability with a minimalist design. Perfect for everyday errands or as a thoughtful gift, this bag adds a touch of Parisian charm to any outfit.', 16.00, 47, 'Bonjour Tote'),
(0, 1, 1, 1, 'Elevate your ensemble with this small black leather clutch. Its sleek design and premium craftsmanship make it a versatile accessory for both day and evening occasions. Compact yet spacious enough to hold your essentials, this clutch adds a touch of sophistication to any outfit. An ideal gift for those who appreciate understated luxury.', 22.50, 48, 'Simple Clutch'),
(0, 1, 1, 1, 'Embrace understated sophistication with this minimalist black handbag. Crafted from high-quality materials, it offers a sleek silhouette that complements any outfit. Its versatile design makes it suitable for both casual outings and formal events. An ideal gift for those who appreciate timeless style and functionality.', 28.00, 49, 'Black Classic Handbag'),
(1, 1, 1, 1, 'Embrace the sun with this handcrafted woven beach tote. Made from natural materials, it offers a spacious interior to carry all your beach essentials, from towels to sunscreen. The sturdy handles ensure comfortable carrying, whether you\'re strolling along the shoreline or exploring local markets.', 21.50, 50, 'Beach Bag'),
(0, 23, 5, 1, 'These blank greetings cards are produced from Kaths\' original artwork, printed here in the UK on white gloss card sourced from sustainable forests. Each card measures 6\"x 4\" and is blank inside, making them perfect for any occasion.', 3.00, 51, 'No Baaaad Card'),
(0, 23, 5, 1, 'These blank greetings cards are produced from Kaths\' original artwork, printed here in the UK on white gloss card sourced from sustainable forests. Each card measures 6\"x 4\" and is blank inside, making them perfect for any occasion.', 3.00, 52, 'Did Ye Aye? Card'),
(0, 23, 5, 1, 'These blank greetings cards are produced from Kaths\' original artwork, printed here in the UK on white gloss card sourced from sustainable forests. Each card measures 6\"x 4\" and is blank inside, making them perfect for any occasion.', 3.00, 53, 'Neigh Bother Card'),
(1, 23, 5, 1, 'These blank greetings cards are produced from Kaths\' original artwork, printed here in the UK on white gloss card sourced from sustainable forests. Each card measures 6\"x 4\" and is blank inside, making them perfect for any occasion.', 3.00, 54, 'Cheeky Cow Card'),
(0, 23, 5, 1, 'These blank greetings cards are produced from Kaths\' original artwork, printed here in the UK on white gloss card sourced from sustainable forests. Each card measures 6\"x 4\" and is blank inside, making them perfect for any occasion.', 3.00, 55, 'Highland Coo Golf Card'),
(1, 26, 5, 1, 'This card is blank inside for your own message and is supplied with a pebble grey coloured envelope. Product Details:   Blank inside for your own message, Size: 100mm x 75mm (4\" x 3\"), Designed and Printed in the UK on FSC certified card, Part of the Little Doodles card range. ', 1.50, 56, 'Toadstool Card'),
(0, 26, 5, 1, 'This card is blank inside for your own message and is supplied with a pebble grey coloured envelope. Product Details: Blank inside for your own message,  Size: 100mm x 75mm (4\" x 3\"), Designed and Printed in the UK on FSC certified card, Part of the Little Doodles card range. ', 1.50, 57, 'Herbert Hedgehog Card'),
(1, 26, 1, 1, 'Elevate your beauty routine with this chic and practical makeup bag, designed to keep your essentials organized in style. Crafted from high-quality PU leather, it offers a smooth, glossy finish that exudes sophistication while being easy to maintain.', 14.50, 58, 'Rabbit and Daisies Makeup Bag'),
(0, 26, 6, 1, 'Puffin Print scarf to accessorise any outfit. This scarf measures 70cm by 180cm and is made from 100% polyester. ', 23.50, 59, 'Puffin Scarf'),
(1, 9, 2, 1, 'This fragrance is a lively and inviting blend that opens with the crispness of sweet apples and the tartness of wild rhubarb. The heart reveals delicate peony and bright neroli, adding a floral and citrusy touch. The scent settles into a warm and sensual base of patchouli and musk, creating a harmonious and captivating aroma. Fragrance notes: Top: Apple, Wild Rhubarb  Heart: Peony, Neroli  Base: Patchouli, Musk', 30.00, 60, 'Dusk Reed Diffuser'),
(1, 9, 8, 1, 'This wax burner fragrance offers a delightful and invigorating blend that transports you to a sunlit orchard in full bloom. It begins with the crisp sweetness of ripe apples and the tangy zest of wild rhubarb, awakening the senses with their refreshing aroma. The heart reveals a bouquet of delicate peony and bright neroli, adding a touch of floral elegance and citrus brightness. The scent settles into a warm and earthy base of patchouli and musk, creating a harmonious and captivating atmosphere.', 18.00, 61, 'Wax Melt Burner'),
(0, 9, 8, 1, 'The Malmö Home Handmade Match Pot is a beautifully crafted accessory that keeps your matches neatly stored and ready for use. Each pot is individually handmade, featuring a match striker on the bottom and a unique marbled design in a range of tones—from soft neutrals to bold, vibrant hues—reflecting the natural beauty of our island home.', 14.50, 62, 'Malmo Match Pot'),
(0, 9, 2, 1, 'The Losgaintir collection offers a tranquil sensory experience inspired by the serene beauty of Losgaintir beach on the Isle of Harris. This fragrance harmoniously blends uplifting top notes of bergamot and white tea with a comforting heart of coconut and almond, all resting on a warm base of vanilla and amber. Designed to evoke pure relaxation, it\'s a perfect addition to any space seeking a touch of calm and elegance.', 9.00, 63, 'Losgaintir Wax Bar'),
(0, 9, 2, 1, 'Inspired by the serene beauty of Huisinis Beach on the Isle of Harris, this fragrance captures the essence of this remote coastal haven. The scent opens with refreshing notes of pomelo and orange, leading into a heart of grapefruit and watermelon, and settling into a grounding base of patchouli and rhubarb. Much like the tranquil sands of Huisinis, this fragrance evokes a sense of calm and connection to nature.', 9.00, 64, 'Huisinis Wax Bar'),
(0, 9, 2, 1, 'Inspired by the vibrant charm of Horgabost Beach on the Isle of Harris, this fragrance collection captures the essence of a sunlit Hebridean retreat. It opens with the zesty brightness of Sicilian lemon and eucalyptus, leading into a heart of lemongrass and ginger root, and settles into a warm base of nutmeg and patchouli. This aromatic blend brings a refreshing and comforting atmosphere to your home, evoking the lively spirit of one of the island’s most beloved beaches.', 9.00, 65, 'Horgabost Wax Bar'),
(0, 9, 2, 1, 'Inspired by the vibrant charm of Horgabost Beach on the Isle of Harris, this fragrance collection captures the essence of a sunlit Hebridean retreat. It opens with the zesty brightness of Sicilian lemon and eucalyptus, leading into a heart of lemongrass and ginger root, and settles into a warm base of nutmeg and patchouli. This aromatic blend brings a refreshing and comforting atmosphere to your home, evoking the lively spirit of one of the island’s most beloved beaches.', 26.50, 66, 'Horgabost Reed Diffuser'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 1.50, 67, 'Hollyhocks Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 1.50, 68, 'Seal Pup Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 1.50, 69, 'Bramble Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 1.50, 70, 'Frisky Cat Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 71, 'Fathers Day Boots Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 72, 'Fathers Day Record Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 73, 'Birthday Jump Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 74, 'Birthday Sheep and Cow Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 75, 'Marigold Cats Birthday Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 76, 'Wedding Cake Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 77, 'Wedding Church Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 78, 'White Wedding Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 79, 'Get Well Soon Bee Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 80, 'Get Well Soon Farmyard Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 81, 'Get Well Soon Flowers Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 82, 'Bee Graduation Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 83, 'Owl Congratulations Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 84, 'High Five Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 85, 'Patio Retirement Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 86, 'Birds Retirement Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 87, 'Living The Dream Retirement Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 88, 'Thank You Poppy Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 89, 'Puffin Thank You Card'),
(0, 26, 5, 1, 'This card is blank inside for your personal message and comes with a pebble grey envelope. Measuring 100mm x 75mm (4\" x 3\"), it\'s printed in the UK on FSC-certified card, ensuring sustainable sourcing. Part of the Little Doodles card range, it offers a charming and eco-friendly option for any occasion.', 3.25, 90, 'Butterfly Thank You Card'),
(0, 24, 10, 1, 'A charming highland coo pull along toy for little ones aged 6 months +.  A delightful companion for little ones embarking on their early adventures.', 15.99, 92, 'Baby Coo Pull Along Toy'),
(1, 24, 10, 1, 'This charming Highland cow teething set combines a natural wooden teething ring with colourful, food-grade silicone beads and a versatile muslin comforter. The comforter, made from 70% bamboo and 30% cotton, features buttons that allow it to double as a dribble bib. BPA-free and presented in a high-quality gift box, it\'s a delightful and practical gift for new parents.', 15.99, 93, 'Highland Coo Teething Set'),
(1, 24, 10, 1, 'Our adorable 25cm rainbow plush toy is a delightful addition to any nursery. Its vibrant colours and fluffy texture are sure to captivate young hearts. Please note, while the toy meets all safety standards, we recommend it for children over 12 months due to the potential for fibre shedding. For optimal safety, always supervise playtime and ensure the toy is in good condition.', 23.99, 94, 'Highland Coo Soft Plush'),
(0, 2, 2, 1, 'This fragrance evokes a Scottish spring, blending the sweet, violet-blue aroma of bluebells with rich galbanum and jasmine. Inspired by the wild bluebells of the Highlands, it\'s a unique, uplifting scent that brings the essence of blooming woodlands into your home.', 24.00, 95, 'Scottish Bluebell Candle'),
(0, 2, 2, 1, 'The Heather & Wild Berries fragrance blends Scottish heather with sweet oils, featuring blueberries, blackberries, and raspberries for a warm, fruity aroma. Inspired by Highland summers, it evokes walking along trails lined with berry bushes, overlooking purple heather fields. This sweet and full scent has been a best-seller since its launch, capturing the essence of a Highland summer.', 24.00, 96, 'Heather and Wild Berries Candle'),
(0, 2, 2, 1, 'The Scots Pine candle brings the forest into your home with a fresh, woody blend of Scots pine, bog myrtle, and rosemary. Top notes of peppermint, orange, and patchouli invigorate and refresh, while the comforting base creates a cozy atmosphere. Part of a collaboration with the Woodland Trust, a portion of proceeds supports the restoration of Loch Arkaig forest, one of the UK\'s last remaining fragments of native Caledonian pinewood .', 24.00, 97, 'Scots Pine Candle'),
(1, 2, 2, 1, 'The Island Whisky candle captures the essence of Scotland\'s finest drams. It combines the sweetness of aged oak casks with a subtle hint of peated barley, evoking the warmth of a cozy lounge. Base notes of oak, musk, and vanilla blend with mid notes of spicy cinnamon and a light, fruity finish. This unique blend offers a comforting and invigorating experience, reminiscent of that first sip of whisky—slàinte math!', 24.00, 98, 'Island Whiskey Candle'),
(0, 2, 2, 1, 'This fragrance evokes a Scottish spring, blending the sweet, violet-blue aroma of bluebells with rich galbanum and jasmine. Inspired by the wild bluebells of the Highlands, it\'s a unique, uplifting scent that brings the essence of blooming woodlands into your home.', 28.00, 99, 'Scottish Bluebell Reed Diffuser'),
(0, 2, 2, 1, 'The Heather & Wild Berries fragrance blends Scottish heather with sweet oils, featuring blueberries, blackberries, and raspberries for a warm, fruity aroma. Inspired by Highland summers, it evokes walking along trails lined with berry bushes, overlooking purple heather fields. This sweet and full scent has been a best-seller since its launch, capturing the essence of a Highland summer.', 28.00, 100, 'Heather and Wild Berries Reed Diffuser'),
(0, 2, 2, 1, 'The Scots Pine candle brings the forest into your home with a fresh, woody blend of Scots pine, bog myrtle, and rosemary. Top notes of peppermint, orange, and patchouli invigorate and refresh, while the comforting base creates a cozy atmosphere. Part of a collaboration with the Woodland Trust, a portion of proceeds supports the restoration of Loch Arkaig forest, one of the UK\'s last remaining fragments of native Caledonian pinewood .', 28.00, 101, 'Scots Pine Reed Diffuser'),
(0, 2, 2, 1, 'The Island Whisky candle captures the essence of Scotland\'s finest drams. It combines the sweetness of aged oak casks with a subtle hint of peated barley, evoking the warmth of a cozy lounge. Base notes of oak, musk, and vanilla blend with mid notes of spicy cinnamon and a light, fruity finish. This unique blend offers a comforting and invigorating experience, reminiscent of that first sip of whisky—slàinte math!', 28.00, 102, 'Island Whiskey Reed Diffuser'),
(1, 2, 1, 1, 'This Edinburgh tote bag features a captivating cityscape design, showcasing iconic landmarks like Edinburgh Castle, Arthur’s Seat, and the Forth Bridge. Crafted from 100% natural cotton, it offers durability and eco-friendliness. With a generous capacity and comfortable shoulder straps, it\'s perfect for daily use or as a thoughtful souvenir. Whether you\'re exploring the city or gifting a piece of Edinburgh, this tote combines practicality with artistic charm.', 15.00, 103, 'Edinburgh Tote'),
(0, 2, 1, 1, 'This Isle of Skye tote bag showcases the island\'s rugged beauty, featuring iconic landmarks like the Old Man of Storr and Neist Point. Crafted from durable 10oz Panama cotton, it offers both style and practicality. With dimensions of 41cm x 41cm and long black cotton handles, it\'s perfect for daily use or as a thoughtful souvenir. Designed on the Isle of Skye and printed in Lancashire, this tote brings a touch of Skye\'s charm wherever you go. ', 15.00, 104, 'Isle Of Skye Tote'),
(0, 2, 1, 1, 'This Glasgow cityscape tote bag showcases the city\'s iconic skyline, featuring landmarks like the Duke of Wellington statue, the SEC Armadillo, and the Finnieston Crane. Crafted from durable, eco-friendly cotton, it offers both style and practicality. With ample space and sturdy handles, it\'s perfect for daily use or as a thoughtful souvenir. Carry a piece of Glasgow wherever you go with this unique accessory.', 15.00, 105, 'Glasgow Tote'),
(0, 2, 5, 1, 'Our Skye-inspired greeting cards, designed by our in-house graphic artist, celebrate the island\'s unique charm with whimsical illustrations, lighthearted humor, and occasional Gaelic puns. Ideal for birthdays, thank-yous, or spreading cheer, each A6 card is blank inside and comes with a 100% recycled brown Kraft envelope. Printed on sustainable materials, they offer a delightful way to connect with friends and family while embracing eco-friendly practices.', 2.95, 106, 'Wave Card'),
(0, 2, 5, 1, 'Our Skye-inspired greeting cards, designed by our in-house graphic artist, celebrate the island\'s unique charm with whimsical illustrations, lighthearted humor, and occasional Gaelic puns. Ideal for birthdays, thank-yous, or spreading cheer, each A6 card is blank inside and comes with a 100% recycled brown Kraft envelope. Printed on sustainable materials, they offer a delightful way to connect with friends and family while embracing eco-friendly practices.', 2.95, 107, 'Hebrides Card'),
(0, 2, 5, 1, 'Our Skye-inspired greeting cards, designed by our in-house graphic artist, celebrate the island\'s unique charm with whimsical illustrations, lighthearted humor, and occasional Gaelic puns. Ideal for birthdays, thank-yous, or spreading cheer, each A6 card is blank inside and comes with a 100% recycled brown Kraft envelope. Printed on sustainable materials, they offer a delightful way to connect with friends and family while embracing eco-friendly practices.', 2.95, 108, 'Skye Card'),
(0, 2, 5, 1, 'Our Skye-inspired greeting cards, designed by our in-house graphic artist, celebrate the island\'s unique charm with whimsical illustrations, lighthearted humor, and occasional Gaelic puns. Ideal for birthdays, thank-yous, or spreading cheer, each A6 card is blank inside and comes with a 100% recycled brown Kraft envelope. Printed on sustainable materials, they offer a delightful way to connect with friends and family while embracing eco-friendly practices.', 2.95, 109, 'Candles Card'),
(0, 2, 5, 1, 'Our Skye-inspired greeting cards, designed by our in-house graphic artist, celebrate the island\'s unique charm with whimsical illustrations, lighthearted humor, and occasional Gaelic puns. Ideal for birthdays, thank-yous, or spreading cheer, each A6 card is blank inside and comes with a 100% recycled brown Kraft envelope. Printed on sustainable materials, they offer a delightful way to connect with friends and family while embracing eco-friendly practices.', 2.95, 110, 'Lobster Card'),
(0, 2, 5, 1, 'Our Skye-inspired greeting cards, designed by our in-house graphic artist, celebrate the island\'s unique charm with whimsical illustrations, lighthearted humor, and occasional Gaelic puns. Ideal for birthdays, thank-yous, or spreading cheer, each A6 card is blank inside and comes with a 100% recycled brown Kraft envelope. Printed on sustainable materials, they offer a delightful way to connect with friends and family while embracing eco-friendly practices.', 2.95, 111, 'Lighthouse Card'),
(0, 2, 5, 1, 'Our Skye-inspired greeting cards, designed by our in-house graphic artist, celebrate the island\'s unique charm with whimsical illustrations, lighthearted humor, and occasional Gaelic puns. Ideal for birthdays, thank-yous, or spreading cheer, each A6 card is blank inside and comes with a 100% recycled brown Kraft envelope. Printed on sustainable materials, they offer a delightful way to connect with friends and family while embracing eco-friendly practices.', 2.95, 112, 'Herd Birthday Card'),
(0, 2, 5, 1, 'Our Skye-inspired greeting cards, designed by our in-house graphic artist, celebrate the island\'s unique charm with whimsical illustrations, lighthearted humor, and occasional Gaelic puns. Ideal for birthdays, thank-yous, or spreading cheer, each A6 card is blank inside and comes with a 100% recycled brown Kraft envelope. Printed on sustainable materials, they offer a delightful way to connect with friends and family while embracing eco-friendly practices.', 2.95, 113, 'Loch Card'),
(0, 2, 8, 1, 'Atlantic Blankets, based on Cornwall\'s north coast, crafts premium wool blankets inspired by the ocean\'s beauty and calming presence. Their 130 x 150 cm wool blankets, made in Britain from 100% pure new wool, offer warmth, breathability, and timeless style. Designed with coastal hues and classic fringes, these blankets are perfect for both indoor relaxation and outdoor adventures. Embracing sustainability, Atlantic Blankets combines comfort with eco-conscious design.', 69.00, 114, 'Wool Throw'),
(0, 2, 8, 1, 'Add a touch of rustic charm to your kitchen with this black tea towel featuring a delightful lamb or sheep print. Crafted from 100% cotton, it offers both durability and absorbency for everyday use. The monochrome design adds a modern flair, making it a versatile addition to any décor. Perfect for drying dishes or as a thoughtful gift for animal lovers, this tea towel combines functionality with countryside elegance.', 14.00, 115, 'Variorum Tea Towel'),
(0, 2, 8, 1, 'This Votive Candle Holder, originally designed to hold a Glencairn whisky glass, has been repurposed as a stylish candle holder, perfectly fitting a Skye Candles Votive. Each piece is unique, reflecting the character of the original whiskey barrel, with no two items being the same. The company\'s commitment to sustainability and craftsmanship ensures that every product is both functional and beautiful.', 12.00, 116, 'Votive Candle Holder'),
(1, 2, 2, 1, 'Immerse yourself in the raw, untamed beauty of the Scottish islands with the refreshing, invigorating scent of Hebridean Breeze. Earthy notes of nettle and sea kelp combine effortlessly with the delicate aromas of marram grass and sand verbena, evoking the sensation of being on the untouched, windswept shores of the Hebrides, where nature reigns free and endless horizons stretch before you.', 16.00, 117, 'Hebridean Breeze Travel Container'),
(0, 2, 2, 1, 'Machair, a Gaelic word for the lush grassy areas of the Hebrides, is the inspiration behind our fragrance. These fertile coastal lands are home to vibrant wildflowers, and their floral notes—blended with subtle hints of kelp—bring the spirit of the Scottish shorelines to life. Harebell, gentian, orchid, and bluebell come together in perfect harmony to create a fresh, botanical scent that captures the essence of this stunning landscape.', 16.00, 118, 'Machair Flowers Travel Container'),
(0, 2, 2, 1, 'Bring the essence of a Highland spring indoors with our sweet gorse fragrance. This blend combines warm balsamic floral and green herbaceous notes, grounded by the earthy richness of Scots pine, cedarwood, and amber. Known for its vibrant yellow blooms and coconut-like scent, gorse is said to keep kissing in fashion all year round. In spring, its lively fragrance brightens the countryside—an instant mood booster. Enjoy the fresh, uplifting scent of gorse in your home.', 16.00, 119, 'Highland Gorse Travel Container'),
(0, 2, 8, 1, 'Wick trimmers are the ideal tool for maintaining your candles in top condition while keeping your hands soot-free. By trimming the wick to about 1/4 inch after each burn, you’ll reduce smoke, extend the candle’s burn time, and improve fragrance diffusion. The perfect accessory for your Skye Candles.', 8.00, 120, 'Wick Trimmer'),
(0, 25, 11, 1, 'This charming sheep glassware ornament adds a whimsical touch to any space. Expertly crafted from high-quality glass, it features intricate details, from the textured wool to the gentle expression on its face. The perfect gift for animal lovers or a unique addition to your decor, this ornament brings a sense of warmth and character. Whether displayed on a shelf, mantel, or as part of a collection, it’s sure to brighten up any room with its playful, yet elegant design.', 21.00, 121, 'Wooly Ewe Glass Ornament'),
(0, 26, 8, 1, 'This Collie dog coaster features a charming watercolor illustration of the elegant Collie breed. The soft, fluid brushstrokes capture the Collie\'s flowing coat and gentle expression, bringing warmth and artistry to any space. Made from durable, heat-resistant material, it protects surfaces while adding a unique, artistic touch to your home decor. The non-slip backing ensures stability, making it both functional and beautiful.', 3.35, 122, 'Jerry Dog Coaster'),
(0, 26, 8, 1, 'This enchanting coaster features a delicate watercolor painting of a hare nestled amidst vibrant poppy flowers. The soft, flowing brushstrokes capture the hare\'s graceful pose and the vivid colors of the blossoms, evoking a sense of tranquility and natural beauty. Made from durable, heat-resistant material, it protects your surfaces while adding a touch of artistic charm to your space. With a non-slip backing, it’s both functional and beautifully crafted.', 3.35, 123, 'Hare and Poppies Coaster'),
(0, 26, 8, 1, 'This elegant coaster showcases a watercolor illustration of a mallard duck in all its colorful glory. The soft, blended strokes highlight the duck’s vibrant plumage and graceful movement, bringing a serene touch of nature to your space. Made from durable, heat-resistant material, it not only protects your surfaces but also adds a splash of artistic charm. With a non-slip backing for stability, this coaster is the perfect gift.', 3.35, 124, 'Mallard Duck Coaster'),
(0, 26, 7, 1, 'This charming 300mm x 400mm watercolor giraffe print is beautifully reproduced on high-quality textured board, capturing the soft brushstrokes and gentle expression of the original artwork. Presented with a sturdy backing board, it’s ready to frame in any standard-sized frame. Protected in a clear bag for safekeeping, it makes a delightful gift or a whimsical touch for any home.', 9.95, 125, 'Giraffe and Branch Art Print'),
(0, 26, 7, 1, 'This charming 300mm x 400mm watercolor bunny print is beautifully reproduced on high-quality textured board, capturing the soft brushstrokes and gentle expression of the original artwork. Presented with a sturdy backing board, it’s ready to frame in any standard-sized frame. Protected in a clear bag for safekeeping, it makes a delightful gift or a whimsical touch for any home.', 9.95, 126, 'Bunny and Dandelion'),
(0, 26, 7, 1, 'This charming 300mm x 400mm watercolor bee print is beautifully reproduced on high-quality textured board, capturing the soft brushstrokes and gentle expression of the original artwork. Presented with a sturdy backing board, it’s ready to frame in any standard-sized frame. Protected in a clear bag for safekeeping, it makes a delightful gift or a whimsical touch for any home.', 9.95, 127, 'Bees and Poppies Art Print'),
(0, 26, 7, 1, 'This charming 300mm x 400mm watercolor Hamster is beautifully reproduced on high-quality textured board, capturing the soft brushstrokes and gentle expression of the original artwork. Presented with a sturdy backing board, it’s ready to frame in any standard-sized frame. Protected in a clear bag for safekeeping, it makes a delightful gift or a whimsical touch for any home.', 9.95, 128, 'Floral Hamster Art Print'),
(0, 26, 6, 1, 'Add a stylish touch to any outfit with this fashionable animal print scarf. Made from soft polyester, it measures 70cm x 180cm—perfect for versatile styling. Lightweight and eye-catching, it’s ideal for all seasons. Presented in an elegant organza bag, it also makes a lovely gift.', 23.50, 129, 'Butterflies and Buddleia Scarf'),
(0, 26, 6, 1, 'Add a stylish touch to any outfit with this fashionable animal print scarf. Made from soft polyester, it measures 70cm x 180cm—perfect for versatile styling. Lightweight and eye-catching, it’s ideal for all seasons. Presented in an elegant organza bag, it also makes a lovely gift.', 23.50, 130, 'Dragonflies Scarf'),
(0, 26, 1, 1, 'Keep your essentials organized in this delightful makeup bag, perfect for cosmetics or accessories. Made from soft, wipe-clean PU leather, it’s both stylish and practical. Measuring 21cm x 7cm, it’s compact enough for your handbag yet spacious enough for daily must-haves.', 14.50, 131, 'Wren and Cow Parsley Makeup Bag'),
(0, 26, 8, 1, 'This charming small storage tin features an original illustration on a sliding lid with a coordinating coloured base. Ideal for keeping little bits and bobs neatly stored, from pins to keepsakes. Measuring 60mm x 40mm x 15mm, it’s compact and practical. Wipe clean with a damp cloth.', 2.95, 132, 'Bees and Roses Sliding Tin'),
(0, 26, 8, 1, 'This charming small storage tin features an original illustration on a sliding lid with a coordinating coloured base. Ideal for keeping little bits and bobs neatly stored, from pins to keepsakes. Measuring 60mm x 40mm x 15mm, it’s compact and practical. Wipe clean with a damp cloth.', 2.95, 133, 'Horse and Cow Parsley Sliding Tin'),
(0, 26, 8, 1, 'This charming small storage tin features an original illustration on a sliding lid with a coordinating coloured base. Ideal for keeping little bits and bobs neatly stored, from pins to keepsakes. Measuring 60mm x 40mm x 15mm, it’s compact and practical. Wipe clean with a damp cloth.', 2.95, 134, 'Misty Sliding Tin'),
(0, 26, 8, 1, 'This Alex Clark magnetic bookmark features a delightful design and is perfect for keeping your place in books without damaging pages. Compact and easy to use, it measures 8cm x 2.5cm and comes in a packaged size of 11.5cm x 5cm. A lovely gift for readers of all ages.', 2.95, 135, 'Lavender Magnetic Bookmark'),
(0, 26, 8, 1, 'This Alex Clark magnetic bookmark features a delightful design and is perfect for keeping your place in books without damaging pages. Compact and easy to use, it measures 8cm x 2.5cm and comes in a packaged size of 11.5cm x 5cm. A lovely gift for readers of all ages.', 2.95, 136, 'Big Bear Hugs Magnetic Bookmark'),
(1, 26, 8, 1, 'These lovely hanging hearts are hand-painted and come with string attached, ready to display in your home. Each one is unique, with slight variations in design adding to their charm. Measuring approximately 8cm x 9cm, they are designed and made in Torquay, UK—a beautiful handcrafted touch for any space.', 7.95, 137, 'Dachshund Ceramic Heart Decoration'),
(0, 26, 8, 1, 'These lovely hanging hearts are hand-painted and come with string attached, ready to display in your home. Each one is unique, with slight variations in design adding to their charm. Measuring approximately 8cm x 9cm, they are designed and made in Torquay, UK—a beautiful handcrafted touch for any space.', 7.95, 138, 'Spaniel Ceramic Heart Decoration'),
(0, 26, 8, 1, 'These lovely hanging hearts are hand-painted and come with string attached, ready to display in your home. Each one is unique, with slight variations in design adding to their charm. Measuring approximately 8cm x 9cm, they are designed and made in Torquay, UK—a beautiful handcrafted touch for any space.', 7.95, 139, 'Labrador Ceramic Heart Decoration'),
(0, 26, 8, 1, 'Keep your kitchen tidy with this charming ceramic tea bag tidy, shaped like a little teapot and decorated with original artwork. Made from New Bone China, it’s both microwave and dishwasher safe. Measuring 11cm x 8cm and presented in a lovely gift box, it makes a sweet and practical gift.', 7.95, 140, 'Bees Tea Bag Tidy');
INSERT INTO `products` (`Bestseller`, `BrandID`, `CategoryID`, `DefaultDisplay`, `Description`, `Price`, `ProductID`, `ProductName`) VALUES
(0, 26, 8, 1, 'Keep your kitchen tidy with this charming ceramic tea bag tidy, shaped like a little teapot and decorated with original artwork. Made from New Bone China, it’s both microwave and dishwasher safe. Measuring 11cm x 8cm and presented in a lovely gift box, it makes a sweet and practical gift.', 7.95, 141, 'Daisyfield Farm Tea Bag Tidy'),
(0, 26, 8, 1, 'This charming Alex Clark mug is perfect for coffee, tea, and other hot drinks. Made from New Bone China with no animal products, it features delightful illustrations around the rim and handle, with a repeat design on the back. With a 400ml capacity and measuring 90mm x 88mm, it’s both dishwasher and microwave safe. ', 10.50, 142, 'Grape Hyacinths Mug'),
(0, 26, 8, 1, 'This charming Alex Clark mug is perfect for coffee, tea, and other hot drinks. Made from New Bone China with no animal products, it features delightful illustrations around the rim and handle, with a repeat design on the back. With a 400ml capacity and measuring 90mm x 88mm, it’s both dishwasher and microwave safe. ', 10.50, 143, 'Butterflies and Buddleia Mug'),
(0, 26, 5, 1, 'This lovely keepsake tin contains 16 notecards with envelopes, featuring 4 charming designs (4 of each). Perfect for any occasion, each card is blank inside for your own message. Card size: 120mm x 120mm. Tin size: 145mm x 145mm x 40mm. A thoughtful gift or handy set to keep on hand.', 12.95, 144, 'Bunnies Notecard Tin'),
(0, 26, 5, 1, 'This lovely keepsake tin contains 16 notecards with envelopes, featuring 4 charming designs (4 of each). Perfect for any occasion, each card is blank inside for your own message. Card size: 120mm x 120mm. Tin size: 145mm x 145mm x 40mm. A thoughtful gift or handy set to keep on hand.', 12.95, 145, 'Floral Thoughts Notecard Tin'),
(0, 26, 5, 1, 'This stylish box contains 8 notecards, 4 of each of two beautiful designs by Alex. Each card is blank inside for your personal message. The set includes 8 notecards and 8 envelopes. Card size: 120mm x 170mm. Box size: 130mm x 183mm x 15mm. A lovely gift or practical addition to your stationery collection.', 10.50, 146, 'Bees and Garden Flowers Boxed Notecards'),
(0, 26, 5, 1, 'This stylish box contains 8 notecards, 4 of each of two beautiful designs by Alex. Each card is blank inside for your personal message. The set includes 8 notecards and 8 envelopes. Card size: 120mm x 170mm. Box size: 130mm x 183mm x 15mm. A lovely gift or practical addition to your stationery collection.', 10.50, 147, 'Owls Boxed Notecards'),
(0, 26, 5, 1, 'This stylish box contains 8 notecards, 4 of each of two beautiful designs by Alex. Each card is blank inside for your personal message. The set includes 8 notecards and 8 envelopes. Card size: 120mm x 170mm. Box size: 130mm x 183mm x 15mm. A lovely gift or practical addition to your stationery collection.', 5.50, 148, 'Thank You Sprout Notelets'),
(0, 26, 5, 1, 'This stylish box contains 8 notecards, 4 of each of two beautiful designs by Alex. Each card is blank inside for your personal message. The set includes 8 notecards and 8 envelopes. Card size: 120mm x 170mm. Box size: 130mm x 183mm x 15mm. A lovely gift or practical addition to your stationery collection.', 5.50, 149, 'Thank You Sprout Notelets'),
(0, 26, 8, 1, 'The double oven glove is made from 100% cotton with a polyester infill for added durability. Measuring 17cm x 90cm (6.6\" x 35.4\"), it’s machine washable for easy care. Designed in the UK and made in India, it’s a practical and chic addition to your kitchen collection.', 16.50, 150, 'Sheep Double Oven Glove'),
(0, 26, 8, 1, 'The double oven glove is made from 100% cotton with a polyester infill for added durability. Measuring 17cm x 90cm (6.6\" x 35.4\"), it’s machine washable for easy care. Designed in the UK and made in India, it’s a practical and chic addition to your kitchen collection.', 16.50, 151, 'Cats In The Kitchen Double Oven Glove'),
(0, 26, 8, 1, 'This practical apron is made from 100% cotton, offering comfort and durability. With a generous size of 70cm x 90cm (27.5\" x 35.5\"), it’s perfect for all your cooking and baking needs. Machine washable for easy care, it’s designed in the UK and made in India. A must-have for your kitchen wardrobe!', 19.95, 152, 'Bee and Foxglove Apron'),
(0, 26, 8, 1, 'This practical apron is made from 100% cotton, offering comfort and durability. With a generous size of 70cm x 90cm (27.5\" x 35.5\"), it’s perfect for all your cooking and baking needs. Machine washable for easy care, it’s designed in the UK and made in India. A must-have for your kitchen wardrobe!', 19.95, 153, 'Sheep Apron');

-- --------------------------------------------------------

--
-- Table structure for table `product_option`
--

CREATE TABLE `product_option` (
  `Colour` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `isAvailable` tinyint(1) NOT NULL DEFAULT '0',
  `ProdOptionID` int NOT NULL,
  `ProductID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_option`
--

INSERT INTO `product_option` (`Colour`, `isAvailable`, `ProdOptionID`, `ProductID`) VALUES
('', 1, 13, 11),
('', 1, 14, 12),
('Beige', 1, 15, 13),
('Green', 1, 17, 14),
('Navy', 1, 18, 14),
('Brown', 1, 19, 15),
('Brown', 1, 20, 16),
('', 1, 22, 18),
('', 1, 23, 19),
('', 1, 24, 20),
('', 1, 27, 21),
('Teal', 1, 28, 22),
('', 1, 29, 23),
('Green', 1, 30, 24),
('Teal', 1, 31, 25),
('', 1, 32, 26),
('', 1, 33, 27),
('', 1, 34, 28),
('', 1, 35, 29),
('Green', 1, 36, 30),
('', 1, 37, 31),
('', 1, 38, 32),
('', 1, 39, 33),
('Blue', 1, 40, 34),
('Black', 1, 41, 34),
('', 1, 42, 35),
('', 1, 43, 36),
('', 1, 44, 37),
('', 1, 45, 38),
('', 1, 46, 39),
('', 1, 47, 40),
('', 1, 48, 41),
('', 1, 49, 42),
('', 1, 50, 43),
('Pink', 1, 51, 44),
('Brown', 1, 52, 44),
('Black', 1, 53, 45),
('', 1, 54, 46),
('', 1, 55, 47),
('Black', 1, 56, 48),
('Black', 1, 57, 49),
('', 1, 58, 50),
('Brown', 1, 59, 34),
('Lavender', 1, 60, 34),
('', 1, 61, 51),
('', 1, 62, 52),
('', 1, 63, 53),
('', 1, 64, 54),
('', 1, 65, 55),
('', 1, 66, 56),
('', 1, 67, 57),
('', 1, 68, 58),
('', 1, 69, 59),
('', 1, 70, 60),
('', 1, 71, 61),
('White', 1, 72, 62),
('', 1, 73, 63),
('', 1, 74, 64),
('', 1, 75, 65),
('', 1, 76, 66),
('', 1, 77, 67),
('', 1, 78, 68),
('', 1, 79, 69),
('', 1, 80, 70),
('', 1, 81, 71),
('', 1, 82, 72),
('', 1, 83, 73),
('', 1, 84, 74),
('', 1, 85, 75),
('', 1, 86, 76),
('', 1, 87, 77),
('', 1, 88, 78),
('', 1, 89, 79),
('', 1, 90, 80),
('', 1, 91, 81),
('', 1, 92, 82),
('', 1, 93, 83),
('', 1, 94, 84),
('', 1, 95, 85),
('', 1, 96, 86),
('', 1, 97, 87),
('', 1, 98, 88),
('', 1, 99, 89),
('', 1, 100, 90),
('', 1, 101, 91),
('', 1, 102, 92),
('', 1, 103, 93),
('', 1, 104, 94),
('', 1, 105, 95),
('', 1, 106, 96),
('', 1, 107, 97),
('', 1, 108, 98),
('', 1, 109, 99),
('', 1, 110, 100),
('', 1, 111, 101),
('', 1, 112, 102),
('', 1, 113, 103),
('', 1, 114, 104),
('', 1, 115, 105),
('', 1, 116, 106),
('', 1, 117, 107),
('', 1, 118, 108),
('', 1, 119, 109),
('', 1, 120, 110),
('', 1, 121, 111),
('', 1, 122, 112),
('', 1, 123, 113),
('Navy', 1, 124, 114),
('Light Pink', 1, 125, 114),
('', 1, 126, 115),
('', 1, 127, 116),
('', 1, 128, 117),
('', 1, 129, 118),
('', 1, 130, 119),
('', 1, 131, 120),
('', 1, 132, 121),
('', 1, 133, 122),
('', 1, 134, 123),
('', 1, 135, 124),
('', 1, 136, 125),
('', 1, 137, 126),
('', 1, 138, 127),
('', 1, 139, 128),
('', 1, 140, 129),
('', 1, 141, 130),
('', 1, 142, 131),
('', 1, 143, 132),
('', 1, 144, 133),
('', 1, 145, 134),
('', 1, 146, 135),
('', 1, 147, 136),
('', 1, 148, 137),
('', 1, 149, 138),
('', 1, 150, 139),
('', 1, 151, 140),
('', 1, 152, 141),
('', 1, 153, 142),
('', 1, 154, 143),
('', 1, 155, 144),
('', 1, 156, 145),
('', 1, 157, 146),
('', 1, 158, 147),
('', 1, 159, 148),
('', 1, 160, 149),
('', 1, 161, 150),
('', 1, 162, 151),
('', 1, 163, 152),
('', 1, 164, 153);

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
  MODIFY `adminID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `BrandID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `ImageID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;

--
-- AUTO_INCREMENT for table `ordereditems`
--
ALTER TABLE `ordereditems`
  MODIFY `orderedItemID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `product_option`
--
ALTER TABLE `product_option`
  MODIFY `ProdOptionID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

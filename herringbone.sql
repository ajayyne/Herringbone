-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2025 at 04:24 PM
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
  `brandDescription` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `BrandID` int NOT NULL,
  `brandImage` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `BrandName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandDescription`, `BrandID`, `brandImage`, `BrandName`) VALUES
('Islander UK is a Scottish accessories brand renowned for its high-quality handbags and accessories crafted from authentic Harris Tweed®. Established in 2010 as Snow Paw UK, the company rebranded to Islander UK in 2020 to better reflect its evolving identity and commitment to blending traditional Scottish heritage with contemporary design. At the heart of Islander\'s products is Harris Tweed®, a fabric exclusively handwoven in the Outer Hebrides of Scotland. Protected by its own Act of Parliament, Harris Tweed® is made from pure virgin wool that is dyed, spun, and woven on the islands, ensuring each piece is a testament to skilled craftsmanship and rich tradition.​', 1, 'images/brands/islander.png', 'Islander'),
('The Isle of Skye Candle Company captures the enchanting spirit of Scotland’s landscapes through its handcrafted candles. Crafte', 2, 'images/brands/skye.png', 'Skye Candle Co'),
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
(1, 256, 'images/products/home decor/pen.png', 35),
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
(1, 310, 'images/products/scarves/Screenshot 2025-05-11 220821.png', 69);

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
(65.00, 1, 12, 17, 40);

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
('9 venlaw quarry road', '', 'Scottish Borders', 'hello@peebles.co.uk', 'Claire Smith', 0, 17, 472267, 262.99, 1, 'EH45 8RJ', 'Peebles');

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
(0, 5, 8, 0, 'A perfect gift for pen lovers and enthusiasts of craftsmanship, this stylish pen features a smooth bolt-action mechanism that locks the refill securely in place.\r\n\r\nThoughtful details like the rifle-style clip and rose gold bullet tip add a unique, authentic charm.\r\n\r\nBeautifully weighted and finished with an intricate criss-cross design, it carries a touch of Scottish character—making it as special to give as it is to receive.', 65.95, 29, 'Scottish Riffle Pen'),
(0, 5, 9, 1, 'This elegant pendant features a half-moon Heathergem on an 18\" sterling silver chain—evoking the hills, sea, sun, and moon of the Scottish landscape.\r\n\r\nEach Heathergem is crafted from hand-harvested heather, making every piece unique. A beautiful reminder of Scotland’s natural beauty.\r\n\r\nPresented in a gift box with a story card.\r\n\r\nHandcrafted in Scotland\r\nPendant size: 35mm x 18mm\r\nChain: 18\" sterling silver', 45.95, 30, 'Half Circle Pendant'),
(0, 5, 9, 1, 'Celebrate Scotland’s national flower with this pewter thistle brooch, featuring a unique round Heathergem embellishment. Each Heathergem is one-of-a-kind, making this a personal and meaningful gift.\r\n\r\nPresented in a gift box with a story card.\r\n\r\nHandcrafted in Scotland\r\nDimensions: 37 x 30 mm', 45.95, 31, 'Thistle Brooch'),
(0, 25, 11, 1, 'Meet Dillon the Donkey, a charming glassware ornament handcrafted by D & J Glassware. Carefully sculpted from high-quality glass, Dillon’s playful expression and detailed features make him a delightful addition to any collection.\r\n\r\nA perfect gift for donkey lovers or anyone who appreciates fine craftsmanship, this unique ornament adds warmth and character to any space. Presented in an elegant gift box, Dillon is sure to make a memorable gift.', 21.00, 32, 'Dillon The Donkey - Glass Ornament'),
(0, 25, 11, 1, 'This stunning Highland Cow glassware ornament, handcrafted by D & J Glassware, beautifully captures the spirit of the Scottish Highlands. Meticulously crafted from high-quality glass, its intricate details highlight the cow’s distinctive horns and textured coat.\r\n\r\nA perfect gift for animal lovers or collectors, this unique ornament adds a touch of Scottish charm to any home. Presented in a luxurious gift box, it’s ready to impress.', 35.00, 33, 'Highland Cow - Glass ornament'),
(1, 1, 1, 1, 'Meet The Mini Satchel— loved for its compact design and timeless style. Crafted from microfibre leather and Harris Tweed®, it features a metal twist lock and adjustable strap for everyday elegance and practicality.', 65.00, 34, 'Mini Satchel'),
(1, 9, 2, 1, 'A sensual fragrance blending sweet plum, pomegranate, rose, and patchouli, resting on a rich base of cedarwood and musk.  Seilebost Beach, nestled on the island’s west coast, offers stunning views of Losgaintir and the Isle of Taransay. As you cross the grassy Hebridean dunes, a hidden stretch of white sand and clear blue water reveals itself—welcome to the quiet beauty of Seilebost.', 20.00, 35, 'Seilebost'),
(1, 9, 2, 1, 'Losgaintir Reed Diffuser. Carefully crafted for a sense of calm, our Losgaintir collection blends soothing bergamot, white tea, coconut, and almond, rounded off with soft notes of vanilla and amber.  Inspired by the award-winning Losgaintir Beach—where golden sands meet clear blue waters beneath Beinn Losgaintir—this range captures the essence of a truly unique Scottish escape.', 26.50, 36, 'Losgaintir Reed Diffuser'),
(1, 9, 2, 1, 'Horgabost combines zesty lemongrass, sharp Sicilian lemon, and warm ginger root for a vibrant, comforting scent that brightens even the chilliest days.  Inspired by one of the island’s most charming beaches, Horgabost comes alive in summer—its blooming machair and scenic campsite make it a truly special place.', 20.00, 37, 'Horgabost'),
(1, 9, 2, 1, 'Adru is a deep, masculine fragrance inspired by the rugged beauty and rich history of the Isle of Harris—named after the island’s ancient title given by Ptolemy. Fresh green leaves and bergamot open the scent, giving way to warming notes of musk, spiced peppercorns, and heartwood sandal, evoking the island’s wild glens, moorlands, and northern hills.', 20.00, 38, 'Adru'),
(1, 9, 2, 1, 'A vibrant blend of Brazilian orange, pink pomelo, and grapefruit, with juicy watermelon, tart rhubarb, and a touch of warming patchouli.  Inspired by Huisinis Beach on the rugged northern coast of the Isle of Harris, where the Essence of Harris story began—a truly special place.', 20.00, 39, 'Huisnis'),
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
(0, 26, 6, 1, 'Puffin Print scarf to accessorise any outfit. This scarf measures 70cm by 180cm and is made from 100% polyester. ', 23.50, 59, 'Puffin Scarf');

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
('', 1, 69, 59);

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
  MODIFY `ImageID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `ordereditems`
--
ALTER TABLE `ordereditems`
  MODIFY `orderedItemID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `product_option`
--
ALTER TABLE `product_option`
  MODIFY `ProdOptionID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2021 at 11:11 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocerysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(255) NOT NULL,
  `Category_Name` varchar(123) NOT NULL,
  `Discription` varchar(500) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`, `Discription`, `Picture`) VALUES
(2, 'Fruits', 'Fruits and vegetables contain important vitamins, minerals and plant chemicals. They also contain fibre.', 'grape.png'),
(4, 'Fresh Seafood', 'We emphasise on the quality of our fresh seafood.', 'ikan_kembung.jpeg'),
(6, 'Vegetables', 'Fresh imported vegetables', 'vegetables.jpg'),
(12, 'Ice cream', 'Variety of ice-cream flavor, will definitely catch your heart.', 'icecream.PNG'),
(16, 'Drinks', 'Variety easy to grab drink flavor, include coffee, bicarbonate, yogurt, milk and many more!', 'drinks.png'),
(21, 'Noodles', 'Instant noodles, or instant ramen, are noodles sold in a precooked and dried block with flavoring powder and/or seasoning oil.', 'maggie.png'),
(24, 'Bakery', 'Bakery and baked goods categories like bars, breads (bagels, buns, rolls, biscuits and loaf breads), cookies, desserts (cakes, cheesecakes and pies), muffins, pizza, snack cakes, sweet goods (doughnuts, Danish, sweet rolls, cinnamon rolls and coffee cake) and tortillas.', 'fujibun.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(29) NOT NULL,
  `Phone` varchar(29) NOT NULL,
  `Subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `Name`, `Email`, `Phone`, `Subject`) VALUES
(9, 'Alya Nasuha', 'alyanasuha1@gmail.com', '0129800906', 'Great'),
(10, 'Alya Nasuha', 'alyanasuha1@gmail.com', '0129800906', ' Bye!!!');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cust_Id` int(15) NOT NULL,
  `FullName` varchar(25) NOT NULL DEFAULT '',
  `UserName` varchar(255) NOT NULL DEFAULT '',
  `Phone` varchar(25) NOT NULL DEFAULT '',
  `Email` varchar(55) NOT NULL DEFAULT '',
  `Password` varchar(20) NOT NULL DEFAULT '',
  `Re_Password` varchar(20) NOT NULL DEFAULT '',
  `Country` varchar(25) NOT NULL DEFAULT '',
  `City` varchar(25) NOT NULL DEFAULT '',
  `Adress` varchar(55) NOT NULL DEFAULT '',
  `PostalCode` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cust_Id`, `FullName`, `UserName`, `Phone`, `Email`, `Password`, `Re_Password`, `Country`, `City`, `Adress`, `PostalCode`) VALUES
(1, 'Alya Nasuha', 'alyanasuha', '+60129800906', 'alyanasuha1@gmail.com', 'alya123', 'alya123', 'Malaysia', 'Selangor', 'LOT 6601-A3, JALAN SERI JAYA KAMPUNG BUKIT KAPAR', '42200'),
(2, 'Syafiq Salim', 'syafiqsalim', '+60102336541', 'syafiqsalim@gmail.com', 'syafiq123', 'syafiq123', 'Malaysia', 'Selangor', 'Klang,Selangor', '42200'),
(3, 'Zainiyah Zahari', 'zainiyahzahari', '+60133658173', 'zainiyahzahari@gmail.com', 'zainiyah123', 'zainiyah123', 'Malaysia', 'Selangor', 'LOT 6601-A3, JALAN SERI JAYA KAMPUNG BUKIT KAPAR', '42200'),
(4, 'Halim', 'halimmm', '+6012552522', 'halim@gmail.com', 'halim123', 'halim123', 'Australia', '', 'Australia', '52230'),
(5, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_ID` int(95) NOT NULL,
  `Employee_Name` varchar(25) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `Employee_Name`, `Username`, `Password`, `Picture`) VALUES
(1, 'Alya Nasuha', 'alyanasuhax', 'admin123', 'alya.JPG'),
(4, 'Amer Abdulsalam', 'amerabdulsalam', 'Amer123', 'maggie_kari_big.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_num` bigint(20) NOT NULL,
  `card_cvc` int(5) NOT NULL,
  `card_exp_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'usd',
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(255) NOT NULL,
  `productName` varchar(77) NOT NULL,
  `Category_ID` int(255) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Warehouse_ID` int(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `productName`, `Category_ID`, `Model`, `Type`, `Warehouse_ID`, `Description`, `Price`, `Picture`) VALUES
(11, 'Fuji Bakery Potato Bun', 24, 'Fuji Bakery', 'Bun', 2, 'Bread With Potato F', '3.40', '1623334800_fujibun.jpg'),
(12, 'Grape', 2, 'Fruit', 'Local Fruit', 1, 'Imported from New Zealand', '9.0', '1623334320_grape.png'),
(13, 'Ikan Kembung (0.5kg)', 4, 'The Seafood Market', 'Fresh Fish', 3, 'Direct from Ocean', '12.50', '1623395520_ikan_kembung.jpeg'),
(14, 'Dutch Lady Low Fat', 16, 'Dutch Lady', 'Milk', 5, 'Low fat fresh milk', '2.20', '1622087820_dutchlady_lowfat.png'),
(15, 'Nescafe Original', 16, 'Nestle', 'Coffee', 5, 'Cold brew coffee', '2.30', '1622087640_nes_original.png'),
(16, 'Nescafe Latte', 16, 'Nestle', 'Coffee', 5, 'Cold brew coffee', '2.30', '1622087640_nes_latte.png'),
(17, 'Big Red Onion ', 6, 'Fresh', 'Vegetable', 4, 'Fresh picked vegeta', '4.50', '1622087700_bawang_besar.png'),
(18, 'Bawang Merah Kecil', 6, 'Fresh', 'Vegetable', 4, 'Fresh picked vegeta', '4.00', '1622089860_bawang_merah.png'),
(19, 'Maggie Kari 5pack', 21, 'Nestle', 'Instant Noodle', 5, 'Instant Maggie Kari', '3.90', '1622087760_maggie_kari_big.png'),
(20, 'Nestle Milo Icecream', 12, 'Nestle', 'Ice cream', 5, 'Original Milo flavor Icecream', '9.80', '1622089860_nestle_icecream_milo.png'),
(21, 'Nestle KitKat Icecream', 12, 'Nestle', 'Ice cream', 5, 'Original KitKat flavor Icecream', '9.50', '1622090040_nestle_icecream_kitkat.png'),
(22, 'Bawang putih 1kg', 6, 'Fresh', 'Vegetable', 4, 'Imported bawang putih', '12.00', '1623394020_bawang putihh.png'),
(23, 'Roti Gardenia Classic', 24, 'Gardenia', 'Bread', 7, 'Fresh made', '2.50', '1623394680_roti gardinia.jpeg'),
(24, 'Sotong Putih (0.5kg)', 4, 'The Seafood Market', 'Sotong', 3, 'Fresh seafood', '17.50', '1623395460_sotong.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `Warehouse_ID` int(255) NOT NULL,
  `Country` varchar(25) NOT NULL,
  `City` varchar(25) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `PostalCode` varchar(55) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Warehouse` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`Warehouse_ID`, `Country`, `City`, `Address`, `PostalCode`, `Email`, `Warehouse`) VALUES
(1, 'MY', 'Selangor', '6, Jalan TSB 4, Taman Industri Sungai Buloh, Petaling Jaya', '47000', 'fruitshq@gmail.com', 'Yong Seng Sdn Bhd'),
(2, 'MY', 'Selangor', 'No. 41 & 43, Jalan Tiaj 2/1, Taman Industri Alam Jaya, Bandar Puncak Alam', '42300', 'fujibakery@gmail.com', 'Fuji Bakery Supplies (M) Sdn. Bhd.'),
(3, 'MY', 'Selangor', '73-G, Jalan Setia Utama AT U13/AT, Setia Alam', '40170', 'theseafoodmarket@gmail.com', 'The Seafood Market'),
(4, 'MY', 'Selangor', 'B-1-13, 162 Residency KM12, Jalan Ipoh Rawang, Batu Caves, Selangor', '68100', 'freshselecthq@gmail.com', 'Fresh Select Sdn Bhd (Vegetable)'),
(5, 'MY', 'Selangor', 'Menara Surian, No. 22-1, 22nd Floor, No. 1, Jalan PJU 7/3, Mutiara Damansara, Petaling Jaya', '47810', 'nestlehq@gmail.com', 'Nestle Products Sdn. Bhd.'),
(6, 'MY', 'Johor', '21, Jalan Kempas Utama 3/6, Taman Kempas Utama, Johor Bahru', '81200', 'k2koh@grandmeltique.com', 'Grand Meltique Food Trading Sdn Bhd'),
(7, 'MY', 'Selangor', 'Lot 3, Jalan Pelabur 23/1, Shah Alam', '40300', 'customer_service@gardenia.com.my', 'Gardenia Bakeries KL Sdn Bhd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cust_Id`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Category_ID` (`Category_ID`),
  ADD KEY `Warehouse_ID` (`Warehouse_ID`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`Warehouse_ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PostalCode` (`PostalCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cust_Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_ID` int(95) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `Warehouse_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

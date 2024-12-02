-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 05:34 PM
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
-- Database: `finalprject`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `buyid` int(11) NOT NULL,
  `userbuyerid` int(11) NOT NULL,
  `userrecieverid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `buyername` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `numberofitem` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `readn` enum('yes','no') NOT NULL DEFAULT 'no',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catogories`
--

CREATE TABLE `catogories` (
  `catogeries_id` int(11) NOT NULL,
  `name_of_catogories` varchar(200) NOT NULL,
  `hashtags` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catogories`
--

INSERT INTO `catogories` (`catogeries_id`, `name_of_catogories`, `hashtags`) VALUES
(1, 'sports', 'shoes'),
(2, 'clothes', 'jeens short clothes');

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

CREATE TABLE `hashtags` (
  `hashtags_id` int(11) NOT NULL,
  `sports` varchar(600) NOT NULL,
  `clothes` varchar(600) NOT NULL,
  `shoes` varchar(600) NOT NULL,
  `phones` varchar(600) NOT NULL,
  `computers` varchar(600) NOT NULL,
  `medecins` varchar(600) NOT NULL,
  `cars` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mycart`
--

CREATE TABLE `mycart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `title` enum('sports','clothes','shoes','phones','computers','medicine','cars','something else') DEFAULT NULL,
  `productphoto` varchar(255) DEFAULT NULL,
  `describeofproduct` text DEFAULT NULL,
  `priceofproduct` decimal(10,2) DEFAULT NULL,
  `number_of_item` int(255) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `userid`, `title`, `productphoto`, `describeofproduct`, `priceofproduct`, `number_of_item`, `createdate`) VALUES
(51, 141, 'phones', 'images/ipad.jpg', 'اونر باد X9 11.5 بوصة رمادي فضائي RAM 4GB 128GB واي فاي TFT LCD IPS 7250 mAh مع غطاء قلاب - اصدار الشرق الاوسط، اونر وسادة، ذاكرة رام 4 جيجا', 11423.00, 7, '2024-06-28 20:45:17'),
(52, 142, 'computers', 'images/tplink.jpg', 'تي بي لينك TL-WA850RE موسع نطاق واي فاي، ابيض، 300 ميجابات في الثانية', 685.00, 3, '2024-06-28 20:48:45'),
(53, 144, 'phones', 'images/sd.jpg', '\r\nكينجستون 128 جيجا مايكرو اس دي اكس سي كانفاس سيليكت بلس 100R A1 C10 بطاقة + ايه دي بي SDCS2 / 128 جيجا، اسود', 390.00, 20, '2024-06-28 20:51:35'),
(54, 141, 'phones', 'images/usb.jpg', '\r\nكابل للموبايل LS441 للشحن السريع 2.4 امبير، كابل USB من النوع سي من لدنيو- 1 متر، لون رمادي، لهاتف ذكي\r\nالنمط:نوع سي', 20.00, 10, '2024-06-28 20:53:10'),
(55, 142, 'clothes', 'images/bag.jpg', 'شنطة ظهر انيرجي للكمبيوتر بسعة كبيرة 34.2 سم، شنطة عمل من قماش اوكسفورد، شنطة سفر ترفيهية للأماكن الخارجية مع منفذ USB', 100.00, 6, '2024-06-28 20:54:39'),
(56, 142, 'shoes', 'images/shoes.jpg', 'حذاء جري رياضي برباط للجنسين من دي جي شوز، 3001، مناسب للجنسين والبنات والاولاد والنساء والرجال', 100.00, 20, '2024-06-28 20:56:37'),
(57, 144, 'clothes', 'images/bag2.jpg', '\r\nشنطة لاب توب والكنت جايد من اركتك هانتر، مزودة بمنفذ USB خارجي وجيب للبطاقات، مضادة للسرقة ومقاومة للماء للنساء والرجال، لون ازرق، مقاس L، شنط لاب توب, أزرق', 100.00, 10, '2024-06-28 20:57:33'),
(58, 141, 'medicine', 'images/medecine.jpg', '\r\nمنظم حبوب محمول صغير لـ 7 ايام على مدار الاسبوع خلال السفر، مناسب للجيب ومقسم من الداخل الى 6 اقسام للادوية المختلفة\r\n', 20.00, 10, '2024-06-28 20:58:52'),
(59, 142, 'medicine', 'images/medecine2.jpg', '\r\nعلبة تخزين حبوب الادوية من بروستاف ان، لتخزين الادوية مقسمة على مدار 7 ايام وكل وحدة مقسمة لاربع اجزاء لتخزين الادوية والاقراص', 10.00, 7, '2024-06-28 20:59:53'),
(60, 144, 'cars', 'images/cars.jpg', '\r\nمقياس درجة حرارة المياه الرقمي المستدير باضاءة LED بتيار مستمر 9-36 فولت مع ضوء ازرق ومستشعر درجة حرارة الماء للسيارات والدراجات النارية ومركبات ايه تي في', 50.00, 10, '2024-06-28 21:01:33'),
(61, 141, 'cars', 'images/cars2.jpg', '\r\nمجموعة بلوتوث mp3 للسيارة بدون استخدام اليدين، جهاز ارسال اف ام ومشغل موسيقى ام بي 3 5 فولت 4.1 امبير، شاحن سيارة USB مزدوج يدعم بطاقة Micro SD 1 جيجا - 32 جيجا\r\n', 20.00, 30, '2024-06-28 21:02:38'),
(62, 142, 'phones', 'images/phone.jpg', '\r\nموبايل ابل ايفون XS بخاصية فيس تايم - 64 جيجابايت، 4G LTE، فضي، ذاكرة رام 4 جيجابايت، شريحة واحدة وشريحة مدمجة\r\nالنمط:فضي', 1000.00, 8, '2024-06-28 21:04:24'),
(63, 144, 'phones', 'images/phone2.jpg', '\r\nابل ايفون 11 مع فيس تايم - 128 جيجا ، 4 جيجا رام ، الجيل الرابع ال تي اي ، ابيض ، شريحة واحدة وشريحة الكترونية\r\nالحجم :6.1 inches\r\nاللون:white', 800.00, 10, '2024-06-28 21:05:40'),
(64, 142, 'computers', 'images/computer.jpg', '\r\nكيبورد عالمية قابلة للطي من مايكروسوفت، كيبورد للاي باد والايفون واجهزة الاندرويد وتابلت ويندوز: كيبورد نوع كويرتي دولي، بلوتوث , ابيض', 300.00, 10, '2024-06-28 21:08:59'),
(65, 144, 'clothes', 'images/clothes.jpg', 'تيشيرت ساده 3 قطع حمالات عريضه ايزو 9001 للنساء من رويال متعدد الالوان', 12.00, 20, '2024-06-28 21:11:04'),
(66, 141, 'cars', 'images/car1.jpg', '2019 Hyundai Elantra', 5000.00, 5, '2024-06-28 21:17:10'),
(67, 142, 'cars', 'images/car3.jpg', '2022 Chevrolet Corvette', 75000.00, 3, '2024-06-28 21:19:57'),
(68, 144, 'cars', 'images/car4.jpg', '2024 Chevrolet Corvette', 74000.00, 2, '2024-06-28 21:21:20'),
(69, 141, 'cars', 'images/car5.jpg', '\r\n2023 Ford F-150 Lightning', 75000.00, 6, '2024-06-28 21:22:09'),
(70, 142, 'medicine', 'images/medecine9.png', 'للبالغين: 500 - 1000 ملليغرام للجرعة الواحدة عند الحاجة؛ أي قرص إلى قرصين 500 ملغ، على ألّا تتجاوز الجرعة القصوى 4000 ملليغرام (4 غرامات = 8 أقراص 500 ملغ) لليوم الواحد.', 10.00, 10, '2024-06-28 21:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(100) NOT NULL,
  `photo_of_user` varchar(250) NOT NULL,
  `phone_number` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `dateofbirth` date NOT NULL,
  `dateoflogin` date NOT NULL DEFAULT current_timestamp(),
  `gender` enum('Male','Female') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `active` enum('false','true') NOT NULL DEFAULT 'true',
  `last_activity` datetime NOT NULL DEFAULT current_timestamp(),
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `photo_of_user`, `phone_number`, `username`, `dateofbirth`, `dateoflogin`, `gender`, `email`, `password`, `active`, `last_activity`, `role`) VALUES
(141, 'images/hussein.jpg', 81089359, 'hussein ali', '0000-00-00', '2024-03-31', 'Male', 'husseinzreik010@gmail.com', '1234', 'true', '2024-06-30 14:46:55', 'user'),
(142, 'images/plus.png', 123, 'husseinz', '0000-00-00', '2024-03-31', 'Male', 'zreik1@gmai.com', '1234', 'true', '2024-06-29 00:32:32', 'user'),
(144, 'images/default-avatar.png', 81089359, 'husseiin', '0000-00-00', '2024-04-04', 'Male', 'oos@gmail.com', '1234', 'true', '2024-06-29 00:31:32', 'user'),
(145, 'images/profile.png', 81089359, 'hassan', '0000-00-00', '2024-04-06', 'Male', 'hassan@gmail.com', '1234', 'true', '2024-06-30 14:47:35', 'user'),
(146, 'images/', 32323232, 'hussein', '0000-00-00', '2024-04-06', 'Male', 'hussein@gmail.com', '1234', 'true', '2024-06-19 10:03:24', 'user'),
(147, 'images/bg.jpg', 11212, 'hassan', '0000-00-00', '2024-05-26', 'Male', 'q@gmail.com', '123', 'true', '2024-06-19 22:40:03', 'user'),
(148, 'images/', 81089359, 'admin', '2004-03-18', '2024-06-28', 'Male', 'admin@gmail.com', 'admin', 'true', '2024-06-30 15:22:10', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`buyid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `catogories`
--
ALTER TABLE `catogories`
  ADD PRIMARY KEY (`catogeries_id`);

--
-- Indexes for table `hashtags`
--
ALTER TABLE `hashtags`
  ADD PRIMARY KEY (`hashtags_id`);

--
-- Indexes for table `mycart`
--
ALTER TABLE `mycart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `buyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `mycart`
--
ALTER TABLE `mycart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `productid` FOREIGN KEY (`productid`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `mycart`
--
ALTER TABLE `mycart`
  ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`userid`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

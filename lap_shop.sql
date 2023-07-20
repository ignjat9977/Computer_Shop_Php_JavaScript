-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 11:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lap_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(2) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `brand_picture_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `name`, `brand_picture_id`) VALUES
(1, 'Apple', 2),
(2, 'Acer', 1),
(3, 'Asus', 3),
(4, 'Lenovo', 6),
(5, 'Dell', 4),
(6, 'HP', 5);

-- --------------------------------------------------------

--
-- Table structure for table `brand_picture`
--

CREATE TABLE `brand_picture` (
  `brand_picture_id` int(12) NOT NULL,
  `src` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand_picture`
--

INSERT INTO `brand_picture` (`brand_picture_id`, `src`, `alt`) VALUES
(1, 'assets/img/acer-logo.png', 'Acer Logo'),
(2, 'assets/img/apple-logo.jpg', 'Apple Logo'),
(3, 'assets/img/asus-logo.jpg', 'Asus Logo'),
(4, 'assets/img/dell-logo.jpg', 'Dell Logo'),
(5, 'assets/img/hp-logo.png', 'HP Logo'),
(6, 'assets/img/lenovo-logo.png', 'Lenovo Logo');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `card_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_id`, `name`) VALUES
(1, 'Master Card'),
(2, 'Visa'),
(3, 'American Express');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `date`) VALUES
(5, 2, '2022-05-13 16:11:07'),
(6, 2, '2022-05-13 16:13:49'),
(7, 2, '2022-05-13 17:12:11'),
(8, 2, '2022-05-13 17:17:07'),
(9, 2, '2022-05-13 18:17:12'),
(10, 1, '2022-05-14 12:06:28'),
(11, 3, '2022-05-20 15:56:14'),
(12, 4, '2022-05-20 15:57:48'),
(13, 4, '2022-05-20 15:59:55'),
(14, 5, '2022-05-20 16:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(3) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `name`) VALUES
(1, 'Blue'),
(2, 'Grey'),
(3, 'Silver'),
(4, 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(10) NOT NULL,
  `message` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `message`, `date`, `product_id`, `user_id`) VALUES
(1, 'Very Good !', '2022-05-21 17:24:35', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE `contact_message` (
  `message_id` int(11) NOT NULL,
  `f_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message_text` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`message_id`, `f_name`, `l_name`, `email`, `message_text`) VALUES
(1, 'Ignjat', 'Koicki', 'ignjat@gmail.com', 'asfsafsafsafsaafs'),
(2, 'Ignjat', 'Koicki', 'ignjat@gmail.com', 'asffsafsafsafsasfsafsas'),
(3, 'Ignjat', 'Koicki', 'ignjat@gmail.com', 'asfsfsafsafsafsaafsafsafs'),
(4, 'Ignjat', 'Koicki', 'ignjat@gmail.com', 'asfsaafsfsaafsfsafsafsa');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `value` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discount_id`, `value`) VALUES
(1, 10),
(2, 20),
(3, 30),
(4, 40),
(5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ik_order`
--

CREATE TABLE `ik_order` (
  `order_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ik_order`
--

INSERT INTO `ik_order` (`order_id`, `quantity`, `product_id`, `order_user_id`) VALUES
(1, 5, 2, 1),
(2, 1, 8, 1),
(3, 1, 11, 2),
(4, 1, 2, 2),
(5, 1, 5, 2),
(6, 1, 13, 2),
(7, 1, 5, 3),
(8, 1, 6, 3),
(9, 1, 5, 4),
(10, 1, 6, 4),
(11, 1, 10, 5),
(12, 1, 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ik_sort`
--

CREATE TABLE `ik_sort` (
  `sort_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ik_sort`
--

INSERT INTO `ik_sort` (`sort_id`, `name`) VALUES
(1, 'By Price Ascednding'),
(2, 'By Price Descending'),
(3, 'Latest'),
(4, 'A-Z'),
(5, 'Z-A');

-- --------------------------------------------------------

--
-- Table structure for table `nav`
--

CREATE TABLE `nav` (
  `nav_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nav`
--

INSERT INTO `nav` (`nav_id`, `name`, `path`) VALUES
(1, 'Home', 'index.php'),
(2, 'Shop', 'index.php?page=shop'),
(3, 'Contact', 'index.php?page=contact'),
(4, 'Author', 'index.php?page=author');

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

CREATE TABLE `order_user` (
  `order_user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_user`
--

INSERT INTO `order_user` (`order_user_id`, `date`, `user_id`, `payment_id`) VALUES
(1, '2022-05-13 18:22:07', 2, 3),
(2, '2022-05-20 15:56:32', 3, 4),
(3, '2022-05-20 15:58:02', 4, 5),
(4, '2022-05-20 16:00:11', 4, 6),
(5, '2022-05-20 16:01:20', 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `card_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `amount`, `date`, `card_id`) VALUES
(3, '4100.00', '2022-05-13 18:22:07', 1),
(4, '4440.54', '2022-05-20 15:56:32', 1),
(5, '2900.00', '2022-05-20 15:58:02', 1),
(6, '2900.00', '2022-05-20 16:00:11', 1),
(7, '1780.54', '2022-05-20 16:01:20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `picture_id` int(11) NOT NULL,
  `href` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `picture_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`picture_id`, `href`, `alt`, `product_id`, `picture_type_id`) VALUES
(1, 'assets/img/acer-extensa-1-small.jpg', 'Acer Extensa Small', 1, 1),
(2, 'assets/img/acer-extensa-1-thumb.jpg', 'Acer Extensa Thumbnail', 1, 2),
(3, 'assets/img/acer-2-small.jpg', 'Acer Small', 2, 1),
(4, 'assets/img/acer-2-thumb.jpg', 'Acer Thumb', 2, 2),
(5, 'assets/img/acer-predator-3-small.jpg', 'Acer Predator Small', 3, 1),
(6, 'assets/img/acer-predator-3-thumb.jpg', 'Acer Predator Thumb', 3, 2),
(7, 'assets/img/acer-aspire-4-small.jpg', 'Acer Aspire Small', 4, 1),
(8, 'assets/img/acer-aspire-4-thumb.jpg', 'Acer Aspire Thumb', 4, 2),
(9, 'assets/img/apple-grey-1-thumb.jpg', 'Aplle Mac Book Pro Thumb', 5, 2),
(10, 'assets/img/apple-silver-1-small.jpg', 'Mac Book Pro Small', 5, 1),
(11, 'assets/img/apple-silver-2-small.jpg', 'Mac Book Air Small', 6, 1),
(12, 'assets/img/apple-silver-2-thumb.jpg', 'Mac Book Air Thumb', 6, 2),
(13, 'assets/img/asus-blue-1-small.jpg', 'Asus Blue Laptop', 8, 1),
(14, 'assets/img/asus-blue-1-thumb.jpg', 'Asus Blue Thumb', 8, 2),
(15, 'assets/img/assus-black-1-thumb.jpg', 'Asus Black Thumb', 7, 2),
(16, 'assets/img/asus-black-1-small.jpg', 'Asus Black Regular', 7, 1),
(17, 'assets/img/lenovoideapad-small.jpg', 'Lenovo Idea Pad Small', 11, 1),
(18, 'assets/img/lenovoideapad-thumb.jpg', 'Lenovo Idea Pad Thumbnail', 11, 2),
(19, 'assets/img/lenovothinkbook-small.jpg', 'Lenovo Think Book Small', 10, 1),
(20, 'assets/img/lenovothinkbook-thumb.jpg', 'Lenovo Think Book Thumb', 10, 2),
(21, 'assets/img/lenovothinkipad-small-real.jpg', 'Lenovo ThinkiPad Small', 9, 1),
(22, 'assets/img/lenovothinkipad-small.png', 'Lenovo ThinkiPad Thumb', 9, 2),
(23, 'assets/img/dell-1-small.jpg', 'Dell 1 Small', 12, 1),
(24, 'assets/img/dell-1-thumb.jpg', 'Dell 1 Thumbnail', 12, 2),
(25, 'assets/img/dell-g-15-small.jpg', 'Dell G15 Small', 14, 1),
(26, 'assets/img/dell-g-15-thumb.jpg', 'Dell G15 Thumbnail', 14, 2),
(27, 'assets/img/dell-vostro-small.jpg', 'Dell Vostro Small', 13, 1),
(28, 'assets/img/dell-vostro-thumb.jpg', 'Dell Vostro Thumb', 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `picture_type`
--

CREATE TABLE `picture_type` (
  `picture_type_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `picture_type`
--

INSERT INTO `picture_type` (`picture_type_id`, `name`) VALUES
(1, 'regular'),
(2, 'thumbnale');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `price_id` int(3) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `discount_id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`price_id`, `price`, `date`, `discount_id`, `product_id`) VALUES
(1, '440.00', '2022-04-20 14:25:46', 1, 1),
(2, '560.00', '2022-04-20 14:25:46', 2, 2),
(3, '2700.00', '2022-04-20 14:25:46', 4, 3),
(4, '950.00', '2022-04-20 14:25:46', 3, 4),
(5, '1600.00', '2022-04-20 16:53:05', 2, 5),
(6, '1300.00', '2022-04-20 16:53:05', 1, 6),
(7, '770.00', '2022-04-20 17:05:49', 3, 7),
(8, '1300.00', '2022-04-20 17:05:49', 5, 8),
(9, '880.54', '2022-05-04 16:16:12', 1, 11),
(10, '900.00', '2022-05-04 16:16:12', 2, 10),
(11, '1400.00', '2022-05-04 16:16:12', 3, 9),
(12, '2100.00', '2022-05-04 16:31:45', 4, 14),
(13, '700.00', '2022-05-04 16:31:45', 5, 12),
(14, '1400.00', '2022-05-04 16:31:45', 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `brand_id` int(3) NOT NULL,
  `color_id` int(3) NOT NULL,
  `resolution_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `date`, `brand_id`, `color_id`, `resolution_id`) VALUES
(1, 'ACER EXTENSA EX215-32 NX.EGNEX.002', 'This basic laptop model has all the performance you need, for work at home and at work. Intel processor enables all your applications to run smoothly.', '2022-04-19 21:12:29', 2, 4, 1),
(2, 'ACER A514-54-3064 NX.A29EX.004', 'Behind the choice of more available colors of this modern laptop is the offer of powerful processors and graphics, which will help you make the most of the screen with a large screen-to-case ratio. By default, a laptop of this caliber has fast Wi-Fi and plenty of storage and memory space.', '2022-04-19 21:12:29', 2, 1, 2),
(3, 'ACER PREDATOR TRITON 500SE PT516-51S-79T4', 'This thin Triton of spartan design is with you at all times. Equipped with the latest 11th generation Intel® Core processors and a GeForce RTX ™30 series graphics card, this slim PC is designed to dominate gaming, enhance your creativity, and challenge the enviable looks of both friends and family.', '2022-04-19 21:12:29', 2, 3, 3),
(4, 'ACER ASPIRE A314-22-R5ZE', 'Whether you are at home, at school or at work, the latest Intel or AMD processors1 provide all the performance you need to organize your work, but also reliable and smooth application operation.', '2022-04-19 21:12:29', 2, 3, 4),
(5, 'APPLE MBP 13 MYDA2ZE/A', 'Something About Apple Mac Book Pro', '2022-04-20 16:52:07', 1, 2, 4),
(6, 'APPLE MBA 13.3 MGN93ZE/A', 'Something About Mac Book Air', '2022-04-20 16:52:07', 1, 3, 4),
(7, 'ASUS EXPERTBOOK P2451FA-EK0111R', 'Something About Asus Expert Book', '2022-04-20 17:04:56', 3, 4, 1),
(8, 'ASUS ZENBOOK UN5401QA-OLED-KN721X', 'Something about Asus Zenbook', '2022-04-20 17:04:56', 3, 1, 2),
(9, 'LENOVO THINKPAD L15 G1 20U3004GCX', 'Something about Lenovo Thinki Pad.', '2022-05-04 16:14:24', 4, 4, 1),
(10, 'LENOVO THINKBOOK 14 G2 20VD0097YA', 'Something about Lenovo Think Book.', '2022-05-04 16:14:24', 4, 3, 2),
(11, 'LENOVO IDEAPAD 3 14IIL05 81WD00R2PB', 'Something about Lenovo Idea Pad.', '2022-05-04 16:14:24', 4, 1, 3),
(12, 'DELL INSPIRON 3502 N5030 8GB 256GB SSD W10HOME', 'Something About Dell Inspirion.', '2022-05-04 16:30:00', 5, 4, 4),
(13, 'DELL VOSTRO 5402 14\" I5-1135G7 8GB 256GB SSD IRIS ', 'Something About Dell Vostro.', '2022-05-04 16:30:00', 5, 3, 1),
(14, 'DELL G15 5511 120HZ I7-11800H 16GB 512GB SSD RTX30', 'Something About Dell G15', '2022-05-04 16:30:00', 5, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_cart`
--

CREATE TABLE `product_cart` (
  `product_cart_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_cart`
--

INSERT INTO `product_cart` (`product_cart_id`, `quantity`, `product_id`, `cart_id`) VALUES
(3, 1, 2, 6),
(4, 4, 14, 6),
(5, 1, 2, 7),
(6, 4, 14, 7),
(7, 5, 2, 8),
(8, 5, 2, 9),
(9, 1, 8, 9),
(10, 1, 8, 10),
(11, 1, 12, 10),
(12, 1, 11, 11),
(13, 1, 2, 11),
(14, 1, 5, 11),
(15, 1, 13, 11),
(16, 1, 5, 12),
(17, 1, 6, 12),
(18, 1, 5, 13),
(19, 1, 6, 13),
(20, 1, 10, 14),
(21, 1, 11, 14);

-- --------------------------------------------------------

--
-- Table structure for table `resolution`
--

CREATE TABLE `resolution` (
  `resolution_id` int(2) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `resolution`
--

INSERT INTO `resolution` (`resolution_id`, `name`) VALUES
(1, '1366 x 768'),
(2, '1920 x 1080'),
(3, '1920 x 1200'),
(4, '2560 x 1440');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `lock_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `date`, `address`, `role_id`, `lock_user`) VALUES
(1, 'John', 'James', 'admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2022-05-02 20:36:33', 'Street 18', 1, 0),
(2, 'Mike', 'Tyson', 'user', 'tyson@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2022-05-02 20:36:33', 'Street 19', 2, 0),
(3, 'Michael', 'Rok', 'rok', 'rok@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2022-05-20 15:54:42', 'Some Street 12', 2, 0),
(4, 'Jovan', 'Jovanovic', 'jovan', 'jovan@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2022-05-20 15:55:22', 'Neka Ulica 12', 2, 0),
(5, 'Marko', 'Markovic', 'marko', 'marko@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2022-05-20 15:59:39', 'Kneza Milosa 19', 2, 0),
(8, 'Ignjat', 'Koicki', 'ignjat', 'ignjatije97@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2022-05-25 18:25:29', 'Nede Spasojevic 12', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `brand_picture_id` (`brand_picture_id`);

--
-- Indexes for table `brand_picture`
--
ALTER TABLE `brand_picture`
  ADD PRIMARY KEY (`brand_picture_id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `ik_order`
--
ALTER TABLE `ik_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_user_id` (`order_user_id`);

--
-- Indexes for table `ik_sort`
--
ALTER TABLE `ik_sort`
  ADD PRIMARY KEY (`sort_id`);

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`nav_id`);

--
-- Indexes for table `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`order_user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `card_id` (`card_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`picture_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `picture_type_id` (`picture_type_id`);

--
-- Indexes for table `picture_type`
--
ALTER TABLE `picture_type`
  ADD PRIMARY KEY (`picture_type_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`price_id`),
  ADD KEY `discount_id` (`discount_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `resolution_id` (`resolution_id`);

--
-- Indexes for table `product_cart`
--
ALTER TABLE `product_cart`
  ADD PRIMARY KEY (`product_cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `resolution`
--
ALTER TABLE `resolution`
  ADD PRIMARY KEY (`resolution_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brand_picture`
--
ALTER TABLE `brand_picture`
  MODIFY `brand_picture_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ik_order`
--
ALTER TABLE `ik_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ik_sort`
--
ALTER TABLE `ik_sort`
  MODIFY `sort_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nav`
--
ALTER TABLE `nav`
  MODIFY `nav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_user`
--
ALTER TABLE `order_user`
  MODIFY `order_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `picture_type`
--
ALTER TABLE `picture_type`
  MODIFY `picture_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `price_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_cart`
--
ALTER TABLE `product_cart`
  MODIFY `product_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `resolution`
--
ALTER TABLE `resolution`
  MODIFY `resolution_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_ibfk_1` FOREIGN KEY (`brand_picture_id`) REFERENCES `brand_picture` (`brand_picture_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `ik_order`
--
ALTER TABLE `ik_order`
  ADD CONSTRAINT `ik_order_ibfk_1` FOREIGN KEY (`order_user_id`) REFERENCES `order_user` (`order_user_id`),
  ADD CONSTRAINT `ik_order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `order_user`
--
ALTER TABLE `order_user`
  ADD CONSTRAINT `order_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `order_user_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`card_id`) REFERENCES `card` (`card_id`);

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `picture_ibfk_2` FOREIGN KEY (`picture_type_id`) REFERENCES `picture_type` (`picture_type_id`);

--
-- Constraints for table `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`discount_id`),
  ADD CONSTRAINT `price_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`resolution_id`) REFERENCES `resolution` (`resolution_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`);

--
-- Constraints for table `product_cart`
--
ALTER TABLE `product_cart`
  ADD CONSTRAINT `product_cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `product_cart_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

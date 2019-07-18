-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2019 at 09:53 AM
-- Server version: 10.1.40-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safayata_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandid` int(11) NOT NULL,
  `brandname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandDesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandid`, `brandname`, `brandDesc`, `creationDate`, `image`, `updationDate`) VALUES
(12, 'Smith&amp;wesson', '<p>Arm Band</p>', '2019-07-16 08:14:06', 'aebab85f61.jpg', '0000-00-00 00:00:00'),
(13, 'Ruger', '<p>Arm Band</p>', '2019-07-16 08:14:25', '2bd19f44a3.png', '0000-00-00 00:00:00'),
(14, 'Remington', '<p>Arm Band</p>', '2019-07-16 08:15:32', '642823528a.png', '0000-00-00 00:00:00'),
(15, 'Heckler&amp;koch', '<p>Arm Band</p>', '2019-07-16 08:16:24', '7a4a38fe86.jpg', '0000-00-00 00:00:00'),
(16, 'Savage Arms', '<p>Arm Brand ltd.</p>', '2019-07-16 08:33:11', 'f8016582cb.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `sid` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(11) NOT NULL,
  `catname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`, `catDescription`, `creationDate`, `image`, `updationDate`) VALUES
(13, 'Explosive', '<p>explosives grenades</p>', '2019-07-16 08:12:29', '5d911ca119.png', '0000-00-00 00:00:00'),
(14, 'Guns', '<p>Guns</p>', '2019-07-16 08:13:12', 'a3d29aa31b.png', '0000-00-00 00:00:00'),
(15, 'Knife', '<p>Knife</p>', '2019-07-16 08:13:35', 'e8a94532b3.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE `compare` (
  `compareid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compare`
--

INSERT INTO `compare` (`compareid`, `productid`, `name`, `image`, `price`, `brand`, `description`, `uid`) VALUES
(24, 47, 'Draganov', 'a70583d2b5.jpg', 2000, '12', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 94),
(25, 43, 'M4-16', 'bfb6a5fd7e.jpg', 3000, '16', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 94);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `image`) VALUES
(1, 'admin', 'yx0xyy0yx0yy0yx0yy4yx0yy2xyy2xyy3yx1xyy2xyy3yx1xyy3xyy2xyy1yy0yx2yy2xyy1xyy3xyyyx4xyy1xyy3yx2xyyxyy0yy4yy3yy0', 'b85bdfdac0.png');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` int(11) NOT NULL DEFAULT '0',
  `email` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `name`, `subject`, `message`, `date`, `seen`, `email`) VALUES
(1, 'safayat', 'Thanks', 'Thank you', '2019-07-18 06:56:32', 0, 'safayatmahmud.99@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `process` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `trans_id` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `uid`, `pid`, `quantity`, `process`, `trans_id`, `date`) VALUES
(85, 94, 43, 1, 'pending', 'txn_1ExTRLF8vC1qZ0XXQK2dxIQU', '2019-07-18 06:50:07'),
(86, 94, 44, 1, 'Deliverd', 'txn_1ExTTkF8vC1qZ0XXUtpm5X8s', '2019-07-18 06:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `card_number` bigint(20) NOT NULL,
  `card_exp_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `cvc` int(11) NOT NULL,
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `email`, `card_number`, `card_exp_month`, `card_exp_year`, `cvc`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `created`, `modified`) VALUES
(45, 'safayat', 'safayat@gmail.com', 4242424242424242, '11', '2020', 123, '3300', 'usd', 'txn_1ExTRLF8vC1qZ0XXQK2dxIQU', 'succeeded', '2019-07-18 06:50:07', '2019-07-18 06:50:07'),
(46, 'safayat', 'safayatmahmud.99@gmail.com', 4242424242424242, '11', '2020', 123, '3080', 'usd', 'txn_1ExTTkF8vC1qZ0XXUtpm5X8s', 'succeeded', '2019-07-18 06:52:36', '2019-07-18 06:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `priceBeforeDiscount` int(11) NOT NULL,
  `availability` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shippingCharge` int(11) NOT NULL,
  `productDetails` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `subcategory`, `brand`, `price`, `priceBeforeDiscount`, `availability`, `shippingCharge`, `productDetails`, `image1`, `image2`, `image3`, `creationDate`, `updationDate`, `type`) VALUES
(31, 'Smoke Grenade', 13, 35, 15, 120, 120, 'In Stock', 20, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '0f3afd2178.png', 'f3afd21780.png', '3afd217801.png', '2019-07-16 08:23:14', '', 1),
(32, 'Flash Bangs', 13, 34, 14, 400, 120, 'In Stock', 16, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '70adf030c6.png', '0adf030c61.png', 'adf030c61e.png', '2019-07-16 08:29:51', '', 1),
(33, 'Grenade', 13, 33, 12, 400, 120, 'In Stock', 20, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '9c84e6fd19.jpeg', 'c84e6fd19f.jpeg', '84e6fd19f9.jpeg', '2019-07-16 08:32:36', '', 1),
(34, 'Sniper', 14, 30, 14, 1200, 0, 'In Stock', 100, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'cc70c128f0.jpeg', 'c70c128f01.jpeg', '70c128f01f.jpeg', '2019-07-16 08:34:24', '', 2),
(35, 'UMP-9', 14, 37, 14, 1200, 0, 'In Stock', 100, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'a1f3052fc4.png', '1f3052fc4f.png', 'f3052fc4fe.png', '2019-07-16 08:40:39', '', 2),
(36, 'Talon Knife Fade', 15, 27, 14, 100, 0, 'In Stock', 10, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'f4fcb960e8.png', '4fcb960e8b.png', 'fcb960e8bf.png', '2019-07-16 08:58:59', '', 1),
(37, 'switch gear', 15, 26, 13, 80, 90, 'In Stock', 5, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'dfede3e94c.jpg', 'fede3e94c9.jpg', 'ede3e94c9e.jpg', '2019-07-16 09:03:06', '', 2),
(38, 'Hand GUn', 14, 32, 16, 800, 800, 'In Stock', 46, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '8ddcca01cd.jpg', 'ddcca01cd0.jpg', 'dcca01cd00.jpg', '2019-07-16 09:06:12', '', 1),
(39, 'Shot Gun', 14, 31, 16, 1600, 1700, 'In Stock', 46, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '9599f9c182.jpg', '599f9c1824.jpg', '99f9c18242.jpg', '2019-07-16 09:19:12', '2019-07-16 02:21:50', 2),
(40, 'Grenade Launcher', 14, 36, 16, 2800, 3000, 'In Stock', 100, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '04fea9415f.png', '4fea9415fe.png', 'fea9415fed.png', '2019-07-16 09:21:25', '', 1),
(41, 'LMG', 14, 29, 13, 2500, 2300, 'In Stock', 100, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'c578fcf362.jpg', '578fcf362f.jpg', '78fcf362f4.jpg', '2019-07-16 09:23:57', '', 2),
(42, 'RPG', 14, 36, 14, 1800, 1802, 'In Stock', 30, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '6ad3fb9f31.jpg', 'ad3fb9f31b.jpg', 'd3fb9f31b9.jpg', '2019-07-17 16:22:50', '', 2),
(43, 'M4-16', 14, 28, 16, 3000, 3000, 'In Stock', 100, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'bfb6a5fd7e.jpg', 'fb6a5fd7ed.jpg', 'b6a5fd7ed9.jpg', '2019-07-17 16:27:09', '', 1),
(44, 'MR672A1', 14, 28, 12, 2800, 3000, 'In Stock', 100, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '827197fb7c.jpg', '27197fb7c1.jpg', '7197fb7c1c.jpg', '2019-07-17 16:35:36', '', 1),
(45, 'MP7A1', 14, 37, 13, 1800, 2000, 'In Stock', 100, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '665cde045a.jpg', '65cde045a8.jpg', '5cde045a8f.jpg', '2019-07-17 16:39:56', '', 2),
(46, 'LMG', 14, 29, 16, 3800, 4000, 'In Stock', 100, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '390a9dd8e9.jpg', '90a9dd8e90.jpg', '0a9dd8e90e.jpg', '2019-07-17 16:54:21', '', 2),
(47, 'Draganov', 14, 30, 12, 2000, 2000, 'In Stock', 100, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'a70583d2b5.jpg', '70583d2b5a.jpg', '0583d2b5a4.jpg', '2019-07-17 16:55:47', '', 2),
(48, 'RPG', 14, 36, 12, 2000, 2000, 'In Stock', 100, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '8a52c6afaf.jpg', 'a52c6afaf9.jpg', '52c6afaf9d.jpg', '2019-07-17 16:57:20', '', 2),
(49, 'Hand GUn', 14, 32, 13, 600, 600, 'In Stock', 100, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '4bcbf56492.png', 'bcbf564929.png', 'cbf5649294.png', '2019-07-17 16:58:26', '', 2),
(50, 'switch gear', 15, 26, 14, 1000, 1000, 'In Stock', 50, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'd5fe2cbf57.jpg', '5fe2cbf572.jpg', 'fe2cbf5722.jpg', '2019-07-17 17:02:04', '', 2),
(51, 'Shot Gun', 14, 31, 15, 1000, 1000, 'In Stock', 50, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'ee56fd7b0e.jpg', 'e56fd7b0e4.jpg', '56fd7b0e43.jpg', '2019-07-17 17:03:15', '', 2),
(52, 'Low poly Grenade', 13, 33, 16, 300, 300, 'In Stock', 50, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '922fd75891.jpg', '22fd758910.jpg', '2fd7589104.jpg', '2019-07-17 17:04:48', '', 2),
(53, 'SMG', 14, 37, 14, 1295, 1300, 'In Stock', 50, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'bda7fb4013.jpeg', 'da7fb4013a.jpeg', 'a7fb4013a9.jpeg', '2019-07-17 17:07:27', '', 2),
(54, 'Machine Gun', 14, 29, 15, 2500, 2500, 'In Stock', 150, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'd4a5566494.jpg', '4a55664941.jpg', 'a556649413.jpg', '2019-07-17 17:09:37', '', 2),
(55, 'AWP', 14, 30, 16, 3500, 2500, 'In Stock', 150, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'c4af3f8468.jpg', '4af3f84684.jpg', 'af3f846848.jpg', '2019-07-17 17:11:24', '', 2),
(56, 'Assault Rifle', 14, 28, 16, 1990, 2500, 'In Stock', 150, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'd22f7a7a75.jpg', '22f7a7a755.jpg', '2f7a7a755f.jpg', '2019-07-17 17:12:34', '', 2),
(57, 'Machine Gun', 14, 29, 16, 1990, 2500, 'In Stock', 150, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'b0c109ddac.jpg', '0c109ddac3.jpg', 'c109ddac34.jpg', '2019-07-17 17:14:31', '', 2),
(58, 'Shot Gun', 14, 31, 16, 3200, 2500, 'In Stock', 150, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'd2283ab82a.jpg', '2283ab82a6.jpg', '283ab82a6d.jpg', '2019-07-17 17:15:13', '', 2),
(59, 'Akr', 14, 28, 16, 2300, 2500, 'In Stock', 150, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'a0f42a2ea1.jpeg', '0f42a2ea10.jpeg', 'f42a2ea10a.jpeg', '2019-07-17 17:16:27', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE `subcat` (
  `subid` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `subcat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` (`subid`, `cat`, `subcat`, `createDate`, `updateDate`) VALUES
(26, 15, 'Switch Gear', '2019-07-16 08:16:40', ''),
(27, 15, 'Classic', '2019-07-16 08:16:49', ''),
(28, 14, 'Assault Rifle', '2019-07-16 08:17:02', ''),
(29, 14, 'Matchine Guns', '2019-07-16 08:17:13', ''),
(30, 14, 'Sniper', '2019-07-16 08:17:28', ''),
(31, 14, 'Shot Gun', '2019-07-16 08:17:36', ''),
(32, 14, 'Hand Gun', '2019-07-16 08:17:44', ''),
(33, 13, 'Grenade', '2019-07-16 08:17:57', ''),
(34, 13, 'Flashbang', '2019-07-16 08:18:08', ''),
(35, 13, 'Smoke Bomb', '2019-07-16 08:18:17', ''),
(36, 14, 'Explosive', '2019-07-16 08:21:10', ''),
(37, 14, 'SMG', '2019-07-16 08:39:58', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `verify` int(11) NOT NULL DEFAULT '0',
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `phone`, `email`, `password`, `country`, `city`, `address`, `zip`, `verify`, `regDate`) VALUES
(94, 'safayat', 19212121, 'safayatmahmud.99@gmail.com', 'yy3yy0yy1xyyxyy4yy0xyy1yx4xyy0yy3yy1yx1yx4yy1yy1yx3yy3yx3xyy0xyy3yx3yx2yy1yx0yx1yx4yx4xyy3yy2xyy3yy4yx2', 'United States', 'dhaka', 'dhaka', 1234, 1, '2019-07-15 09:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

CREATE TABLE `wish` (
  `wishid` int(11) NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wish`
--

INSERT INTO `wish` (`wishid`, `name`, `image`, `brand`, `price`, `productid`, `uid`, `description`) VALUES
(14, 'M4-16', 'bfb6a5fd7e.jpg', '16', 3000, 43, 94, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `compare`
--
ALTER TABLE `compare`
  ADD PRIMARY KEY (`compareid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcat`
--
ALTER TABLE `subcat`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`wishid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `compare`
--
ALTER TABLE `compare`
  MODIFY `compareid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `subcat`
--
ALTER TABLE `subcat`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `wish`
--
ALTER TABLE `wish`
  MODIFY `wishid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

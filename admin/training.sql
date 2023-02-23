-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 09:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `privliges` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `phone`, `address`, `gender`, `privliges`) VALUES
(1, 'Sarah', '202cb962ac59075b964b07152d234b70', 'sarah@gmail.com', '01034268472', 'Mansoura', 1, 0),
(2, 'Yara', '250cf8b51c773f3f8dc8b4be867a9a02', 'yara@gmail.com', '01082375921', 'Minyat ElNasr', 1, 1),
(3, 'Adham', '68053af2923e00204c3ca7c6a3150cf7', 'adham@gmail.com', '01043217643', 'Mansoura', 0, 1),
(8, 'Mohamed', '202cb962ac59075b964b07152d234b70', 'mohamed@gmail.com', '01095375924', 'Minyat Elnasr', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `name`, `image`, `price`, `quantity`) VALUES
(1, 'Stand Collar Dip Hem Check Blouse', '858f33c77faeeea86bddb9857e4ab885.jpg,177050b7b91253942a58c7f7b17f090a.webp', 7, 1),
(2, 'Floral And Slogan Graphic Tee', '23e71fab7c1329467089ed15e01a44a0.webp,bd111ed1f85bc21f59c6834d0c703ce1.webp,8cf0eccd79e70f7c080aef896a66dd11.webp,ea55620ea80b4550eed3744e04dd968a.webp', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Clothes'),
(2, 'Perfumes'),
(3, 'Watches'),
(4, 'Shoes'),
(5, 'Electronics'),
(6, 'Bookes'),
(7, 'Mobiles'),
(8, 'Laptops'),
(9, 'Computers'),
(10, 'Toys');

-- --------------------------------------------------------

--
-- Table structure for table `categories_from_category`
--

CREATE TABLE `categories_from_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories_from_category`
--

INSERT INTO `categories_from_category` (`id`, `name`, `cat_id`) VALUES
(9, 'Women T-Shirts', 1),
(10, 'Men T-Shirts', 1),
(11, 'Dell Laptops', 8),
(12, 'HP Laptops', 8),
(13, 'MacBook Laptops', 8),
(14, 'Dell Computers', 9),
(15, 'HP Computers', 9),
(16, 'iPhone', 7),
(17, 'Samsong', 7),
(18, 'OPPO', 7),
(19, 'HUAWEI', 7),
(20, 'Dresses', 1),
(21, 'Programming Books', 6),
(22, 'Learning Books', 6),
(23, 'Novels', 6),
(24, 'Boys Toys', 10),
(25, 'Girls Toys', 10),
(26, 'Women Shoes', 4),
(27, 'Men Shoes', 4),
(28, 'Smart Watches', 3),
(29, 'Analogue Wathes', 3),
(30, 'Digital Watches', 3),
(31, 'Headphones', 5),
(32, 'Earbuds', 5),
(33, 'Women Perfumes', 2),
(34, 'Men Perfumes', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `sale` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp(),
  `trending` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sale`, `image`, `cat_id`, `description`, `added_at`, `trending`) VALUES
(1, 'Stand Collar Dip Hem Check Blouse', '7', '50', '858f33c77faeeea86bddb9857e4ab885.jpg,177050b7b91253942a58c7f7b17f090a.webp', 9, 'Color: Green <br>\r\nStyle: Casual <br>\r\nPattern Type: Plaid<br>\r\nType: Top<br>\r\nNeckline: Stand Collar, V neck<br>\r\nSleeve Length: Short Sleeve<br>\r\nLength: Regular<br>\r\nFit Type: Regular Fit<br>\r\nFabric: Non-Stretch<br>\r\nComposition: Polyester<br>\r\nCare Instructions: Machine wash or professional dry clean<br>\r\nSKU: RBLO170317137<br>', '2023-02-12 13:48:53', 1),
(2, 'Floral And Slogan Graphic Tee', '10', '25', '23e71fab7c1329467089ed15e01a44a0.webp,bd111ed1f85bc21f59c6834d0c703ce1.webp,8cf0eccd79e70f7c080aef896a66dd11.webp,ea55620ea80b4550eed3744e04dd968a.webp', 9, 'Color:	Dark Green<br>\r\nStyle:	Casual<br>\r\nPattern Type:	Floral, Slogan<br>\r\nNeckline:	Round Neck<br>\r\nSleeve Length:	Short Sleeve<br>\r\nSleeve Type:	Regular Sleeve<br>\r\nLength:	Regular<br>\r\nFit Type:	Regular Fit<br>\r\nFabric:	Slight Stretch<br>\r\nMaterial:	Fabric<br>\r\nComposition:	70% Polyester, 30% Viscose<br>\r\nCare Instructions:	Machine wash or professional dry clean<br>\r\nSheer:	No<br>', '2023-02-12 14:01:11', 0),
(4, 'Men Solid Round Neck Tee', '8', '50', 'f5973b5beb2af0dacfb0e45f3423d14e.webp,f22d027bf5b39b213c1fcfae1b498d2d.webp,ca587576c5b7bc9bb32497d730cc7839.webp', 10, 'Color:	White<br>\r\nStyle:	Casual<br>\r\nPattern Type:	 Plain<br>\r\nNeckline:  Round Neck<br>\r\nSleeve Length:	Short Sleeve<br>\r\nSleeve Type:	Regular Sleeve<br>\r\nLength:	Regular<br>\r\nFit Type:	Regular Fit<br>\r\nFabric:	Slight Stretch<br>\r\nMaterial:	Fabric<br>\r\nComposition:	95% Polyester, 5% Elastane<br>\r\nCare Instructions:	Machine wash or professional dry clean<br>\r\nSheer:	No<br>', '2023-02-16 18:19:38', 0),
(5, 'Men Tropical and Letter Graphic Tee', '13', '40', '91236bae1b5c31af5408ce49c04d2a52.webp,1dd870e79dee68ea4d328970c1946c31.webp,fb00e4d3608ffbccbaec93c2279f122d.webp,2b4a814d370e43be96e8d5ff2ce13ba1.webp', 10, 'Color:	Khaki<br>\r\nStyle:	Casual<br>\r\nPattern Type:	Letter, Tropical<br>\r\nNeckline:	Round Neck<br>\r\nSleeve Length:	Half Sleeve<br>\r\nSleeve Type:	Drop Shoulder<br>\r\nLength:	Regular<br>\r\nFit Type:	Oversized<br>\r\nFabric:	Slight Stretch<br>\r\nMaterial:	Fabric<br>\r\nComposition:	100% Cotton<br>\r\nCare Instructions:	Machine wash or professional dry clean<br>\r\nSheer:	No<br>', '2023-02-16 19:40:35', 1),
(6, 'Floral Print Self Tie Pleated Hem Dress', '20', '15', '28c823f8a6963644a1345305bc408263.webp,7a8c2d629561485b3c79de895f623041.webp,8a98f4618ab363a136efe3047f804001.webp,fe91e8053650ef64a93e57d15727be8c.webp', 20, 'Color:	Apricot<br>\r\nStyle:	Modest, Boho<br>\r\nPattern Type:	Floral, All Over Print<br>\r\nDetails:	Belted, Pleated<br>\r\nType:	A Line<br>\r\nNeckline:	Round Neck<br>\r\nSleeve Length:	Long Sleeve<br>\r\nSleeve Type:	Flounce Sleeve<br>\r\nWaist Line:	High Waist<br>\r\nHem Shaped:	Pleated<br>\r\nLength:	Long<br>\r\nFit Type:	Regular Fit<br>\r\nFabric:	Non-Stretch<br>\r\nMaterial:	Fabric<br>\r\nComposition:	100% Polyester<br>\r\nCare Instructions:	Machine wash or professional dry clean<br>\r\nBelt:	Yes<br>\r\nSheer:	No\r\nArabian Clothing:	Yes', '2023-02-16 20:01:26', 0),
(8, 'Modely Raglan Lantern Sleeve Flounce Hem Swiss Dot Dress', '30', '20', '776a11b9a389aa6012873421d3079b9d.webp,bbc246720e427434ecafe2bfa49e4eb2.webp,6d4a064b40312b3e29f155dc07cc7b83.webp,d946d21637d5baddd3b4e394c7ce3d78.webp', 20, 'Color:	Black<br>\r\nStyle:	Modest, Elegant<br>\r\nPattern Type:	Plain<br>\r\nDetails:	Ruffle Hem, Belted, Button<br>\r\nType:	A Line<br>\r\nNeckline:	Round Neck<br>\r\nSleeve Length:	Long Sleeve<br>\r\nSleeve Type:	Bishop Sleeve<br>\r\nWaist Line:	High Waist<br>\r\nHem Shaped:	Flounce<br>\r\nLength:	Long<br>\r\nFit Type:	Regular Fit<br>\r\nFabric:	Non-Stretch<br>\r\nMaterial:	Chiffon<br>\r\nComposition:	100% Polyester<br>\r\nCare Instructions:	Machine wash or professional dry clean<br>\r\nBody:	Lined<br>\r\nBelt:	Yes<br>\r\nSheer:	No<br>\r\nLining:	100% Polyester<br>\r\nArabian Clothing:	Yes<br>', '2023-02-16 20:04:37', 0),
(9, 'Minimalist Back Zipper Booties', '21', '20', '8e9775e035aae34e81f67fd7488adc14.webp,12fe041cb5e7d45ecffd0cd0d33b3be5.webp,16f444fb4356fc7cf950099b633c085f.webp,7bc95cde9b7b5235f0fab7c89ba1f052.webp', 26, 'Closure Type:	Back Zipper\r\nType:	Booties\r\nColor:	Beige\r\nPattern Type:	Plain\r\nHeel Height:	Low Heel (3.5cm/1.4inch)\r\nToe:	Point Toe\r\nHeels:	Chunky\r\nBoots Height Type:	Ankle Boots\r\nStyle:	Fashionable\r\nUpper Material:	PU Leather\r\nLining Material:	Mesh\r\nInsole Material:	Polyester\r\nOutsole Material:	Rubber', '2023-02-18 21:24:26', 1),
(10, 'Two Tone Lace-up Front Skate Shoes', '23', '25', '41e64223cf3599108ca57facb9a4093f.webp,9fe4641d9481d322d76e6fa6b49db0dc.webp,a03f525b23e68ac704532c0f811455dd.webp,40e68d7197ac82a0be353fe72563fcda.webp', 26, 'Color:	Multicolor\r\nType:	Skate Shoes\r\nStyle:	Sporty\r\nToe:	Round Toe\r\nPattern Type:	Colorblock\r\nStrap Type:	Lace Up\r\nUpper Height:	Low-top\r\nUpper Material:	PU Leather\r\nLining Material:	PU Leather', '2023-02-18 21:26:45', 0),
(11, 'Men Lace-up Front Sneakers Black Skate Shoes', '22', '20', '8dfce5cec062f946897259aba44db381.webp,11c378388d778b6f6f8b0ad1c0dfa90b.webp,df7cc438f83496398af1e5ce9a18f2ba.webp,862ff6f200bf739d9845c40fa41d9a6c.webp', 27, 'Color:	Black\r\nStrap Type:	Lace Up\r\nPattern Type:	Plain\r\nToe:	Round Toe\r\nType:	Skate Shoes\r\nUpper Material:	PU Leather\r\nLining Material:	Mesh\r\nInsole Material:	Polyester\r\nOutsole Material:	PVC', '2023-02-19 13:01:53', 0),
(12, 'Men Lace-up Front Dress Shoes', '19', '32', 'c13a90cc20497069ab2d22e70f1c61c2.webp,8884d135175f5ed6f0cdcca77579bf30.webp,a544a198fdca0a3ccab6f20db62bcad6.webp', 27, 'Color:	Navy Blue\r\nToe:	Round Toe\r\nStrap Type:	Lace Up\r\nUpper Material:	PU Leather\r\nLining Material:	Canvas\r\nInsole Material:	Canvas\r\nOutsole Material:	Rubber', '2023-02-21 02:07:23', 1),
(13, 'DELL Vostro 3515 Laptop', '17500', '100', 'a2b0393814f63ab485baf2a0b03a0ada.jpg,dbbf10293ee564d434fe3901c266621f.jpg,94959fa8c13e8e2deca8db0b3de7d676.jpg,e9edd38cb4d11d3dd7170dc2278feacd.jpg', 11, '\r\nBrand	Dell\r\nSeries	Vostro 3515\r\nScreen size	15.6\r\nColour	Black\r\nHard disk size	512 GB\r\nCPU model	Ryzen 5 3450U\r\nInstalled RAM memory size	8 GB\r\nOperating System	UBUNTU\r\nSpecial features	FHD\r\nGraphics card description	Integrated', '2023-02-21 02:11:04', 0),
(14, 'Dell Inspiron 5406 2-in-1', '14300', '150', 'b0d73a50cf32a87ebf36d1cc3445323c.jpg,58c295cbcfe539cc4cc5ebe579da63fb.jpg,afa9827bb08fd3604e5680d325986af8.jpg,47383894f435510b97fd34cd5b6ca578.jpg', 11, '\r\nBrand	Dell\r\nSeries	5406i3-8G256W10H\r\nScreen size	14 Inches\r\nColour	Silver\r\nHard disk size	256 GB\r\nCPU model	Intel Core i3\r\nInstalled RAM memory size	8 GB\r\nOperating System	Windows 10 Home\r\nGraphics card description	Integrated\r\nCPU speed	4100 MHz', '2023-02-21 02:12:35', 0),
(15, 'HP Victus 15-fa0031dx Gaming Laptop', '23000', '70', 'ef4681a1aafd95e043875aef68345d64.jpg,b2eb9eb150b347cf926f09e6d2877ad3.jpg,740f65d4ea9d201e36a12d2c06593cea.jpg,2eb3249884d33e0f4be608a5815a388c.jpg', 12, 'Capacity: 8GB RAM | 512GB SSD\r\n8GB RAM | 512GB SSD\r\n\r\n \r\n\r\n32GB RAM | 1TB SSD\r\n\r\nBrand	HP\r\nSeries	Victus 15-fa0031dx\r\nScreen size	15 Inches\r\nColour	Silver\r\nHard disk size	512 GB\r\nCPU model	Intel Core i5\r\nInstalled RAM memory size	8 GB\r\nOperating System	Windows 11\r\nSpecial features	Backlit Keyboard\r\nGraphics card description	Dedicated', '2023-02-21 02:15:15', 0),
(16, 'HP 255 G8 Laptop', '8900', '60', '1a3839b3804d6045bbb31691efc7c024.jpg,b5117ba5f8887b96d8c5cb29f737f7cc.jpg,160eeb9136491d71d62cd9d918e9370c.jpg,afdbfee545a3f3e5cc6d5ce6e92f9115.jpg', 12, 'Brand	HP\r\nSeries	255G8A3150U8G1T\r\nScreen size	15.6 Inches\r\nColour	Silver\r\nHard disk size	1 TB\r\nCPU model	Athlon\r\nInstalled RAM memory size	8 GB\r\nOperating System	DOS\r\nSpecial features	Numeric Keypad\r\nGraphics card description	Integrated', '2023-02-21 02:18:21', 0),
(17, '2022 Apple MacBook Air laptop', '46000', '200', '2d13d47a2c8430d6afee3ec7f5b8e6e2.jpg,96c2c3532645e2da5e69a37c6eabd790.jpg', 13, '\r\nBrand	Apple\r\nScreen size	13.6 Inches\r\nHard disk size	256 GB\r\nInstalled RAM memory size	8 GB\r\nCPU speed	3.49 GHz\r\nItem weight	1.2 Kilograms\r\nTotal USB ports	2\r\nProcessor count	8\r\nBattery cell composition	Lithium Polymer\r\nHuman interface input	Keyboard', '2023-02-21 02:20:43', 0),
(18, 'Apple Macbook Air 2020 Model', '35000', '70', '86fce957081da2ee98b5f1bbc7403258.jpg,27fead3bb986911c4080b18ed1bc742f.jpg,937b70212d3d6127ec812cc9ad0ad933.jpg', 13, 'Brand	Apple\r\nSeries	3.5 mm\r\nScreen size	13 Inches\r\nColour	Gold\r\nHard disk size	256 GB\r\nInstalled RAM memory size	8 GB\r\nOperating System	Mac OS\r\nCPU speed	3.2 GHz\r\nConnectivity technology	USB\r\nProcessor count	8', '2023-02-21 02:22:58', 0),
(19, 'Dell OptiPlex 5040 Desktop', '4700', '100', 'e51f0256d37458c4089116770cf88104.jpg,7fce8157ccfb0b605acf04f83293dc50.jpg,ef80169c67511fa95d4d95971ea55d31.jpg', 14, '\r\nSpecific uses for product	Horizontal/Vertical\r\nBrand	Dell\r\nOperating System	Windows 10\r\nMemory storage capacity	8 GB\r\nInstalled RAM memory size	8 GB\r\nSeries	Optiplex 5040 SFF\r\nIncluded components	AC\r\nCPU model	Core i5 6500\r\nColour	Black\r\nCPU manufacturer	Intel', '2023-02-21 02:25:47', 0),
(20, 'Dell OptiPlex 3080', '7000', '140', '12ad676e837dbd8f5db02e7709316160.jpg,bf101d363d3863162d38b37b76e5152a.jpg,d986cd199d1fa5f5cf61d6a0051a6fde.jpg', 14, '\r\nBrand	Dell\r\nOperating System	Windows 10 Pro\r\nMemory storage capacity	8 GB\r\nInstalled RAM memory size	8 GB\r\nSeries	Optiplex\r\nCPU model	Core i5\r\nColour	Black\r\nCPU manufacturer	Intel\r\nTotal USB ports	8\r\nCPU speed	3.1 GHz', '2023-02-21 02:27:14', 0),
(21, 'HP EliteDesk 705 G2', '4000', '130', 'f2c11842a76a58b8a09d26d6174bb067.jpg,af985dbc1c84cb5482bb130e8ad97856.jpg,8a71079b0ac619ef810682d340e8699b.jpg,460fec2f217f75cb79132bd4d1f5f7d1.jpg', 15, '\r\nBrand	HP\r\nOperating System	Windows 10 Pro\r\nInstalled RAM memory size	8 GB\r\nSeries	Black\r\nCPU model	A8-8650\r\nColour	Black\r\nCPU manufacturer	AMD\r\nCPU speed	3.2 GHz', '2023-02-21 02:29:25', 0),
(22, 'Apple iPhone 14 Pro Max', '1700', '300', '2513ab108a25e240d889c56bf434c438.jpg,25b7485f3ea29f1534a491c3ba7b46c8.jpg,9e10ca552e436f43050bfbe0c21171d4.jpg', 16, '\r\nBrand	Apple\r\nModel name	Iphone 14\r\nWireless carrier	Unlocked for All Carriers\r\nMemory storage capacity	256 GB\r\nConnectivity technology	Bluetooth, Wi-Fi, USB, NFC\r\nColour	Purple\r\nScreen size	6.7 Inches\r\nWireless network technology	Wi-Fi\r\nSIM card slot count	Dual SIM\r\nForm factor	Slate', '2023-02-21 02:33:07', 0),
(23, 'Samsung Galaxy S22 Ultra 5G', '1100', '100', 'd110c4602ea3951b96ee911f35302d82.jpg,0c3006b007cd110d15df7261ab3ea771.jpg,321714bd4c2e8e888eb49df7d957ae63.jpg,0a4725996aea557e03373fd95cf8a00d.jpg', 17, 'Brand	SAMSUNG\r\nModel name	Galaxy S22 Ultra\r\nWireless carrier	Unlocked for All Carriers\r\nOS	Android\r\nCellular technology	5G\r\nMemory storage capacity	256 GB\r\nConnectivity technologies	Bluetooth, Wi-Fi, USB\r\nColour	Burgundy\r\nScreen size	6.8 Inches\r\nWireless network technology	GSM, LTE', '2023-02-21 02:35:27', 0),
(24, 'Oppo A16', '200', '200', 'ccfac2d51fa7db5850655591de41f769.jpg,6c2b551b2ba9f56bdb08b56d62421ee6.jpg', 18, '\r\nBrand	OPPO\r\nModel name	5000 mAh\r\nOS	Android 11.0\r\nMemory storage capacity	64 GB\r\nConnectivity technologies	Bluetooth, Wi-Fi, USB\r\nColour	Crystal black\r\nScreen size	6.52 Inches\r\nWireless network technology	LTE\r\nInstalled RAM memory size	64 GB\r\nSIM card slot count	Dual SIM', '2023-02-21 02:38:54', 0),
(25, 'HUAWEI nova Y70 Smartphone', '220', '250', '1be6e6fd4caaa971e542587c70069992.jpg,cca3eb9eba661db699ae422109e7fb26.jpg,256e9ce285441ea5e38619e02afd438e.jpg,66e63f699f8c481ae50e7700be1ec1d6.jpg', 19, 'Brand	HUAWEI\r\nModel name	Nova Y70\r\nWireless carrier	Unlocked for All Carriers\r\nOS	Android 12.0\r\nCellular technology	4G\r\nMemory storage capacity	128 GB\r\nConnectivity technologies	Bluetooth\r\nColour	Crystal Blue\r\nScreen size	6.75 Inches\r\nWireless network technology	Wi-Fi', '2023-02-21 02:40:19', 0),
(26, 'Clean Code in PHP', '35', '100', '8bf11776530301756832fdadfdb01bfc.png', 21, 'PHP is a beginner riendly language, but also one that is rife with complaints of bad code.yet no clean code books are specific to PHP. Enter Clean Code in PHP. This book is a one-stop guide to learning the theory and best practices of clean code specific to real-world PHP app development environments.\r\n\r\nThis PHP book is cleanly split to help you navigate through coding practices and theories to understand and adopt the nuances of the clean code paradigm. In addition to covering best practices, tooling for code quality, and PHP design patterns, this book also presents tips and techniques for working on large-scale PHP apps with a team and writing effective documentation for your PHP projects.\r\n\r\nBy the end of this book, you will be able to write human-friendly PHP code, which will fuel your PHP career growth and set you apart from the competition.', '2023-02-21 02:44:33', 0),
(27, 'Learn Enough JavaScript to Be Dangerous', '40', '30', 'a6c3f8c3f8c39d8410c2feff0fc7506d.png', 21, 'JavaScript plays a key role in modern software development, not only because it is the only language that runs inside virtually all web browsers, but also because it has become widely used for back-end and general-purpose development as well. Although JavaScript is a big language, you do not need to learn everything about it to get started, just how to use it efficiently to solve real problems. In Learn Enough JavaScript to Be Dangerous, renowned instructor Michael Hartl teaches the specific concepts, skills, and approaches you need to be professionally productive.\r\n\r\nEven if you have never programmed before, Hartl helps you quickly build technical sophistication and master the lore you need to succeed. Treating JavaScript as a general-purpose language right from the start, Hartl offers examples for creating dynamic effects in browsers and for writing scripts and modules using Node.js. Focused exercises help you internalize what matters, without wasting time on details pros do not care about. Soon, it will be like you were born knowing this stuff-and you will be suddenly, seriously dangerous.', '2023-02-21 02:47:15', 0),
(28, 'A Brief History Of Time: From Big Bang To Black Holes', '10', '20', '94152aaa42d867462ac6ac5a70d1c54e.jpg', 22, 'It begins by reviewing the great theories of the cosmos from Newton to Einstein, before delving into the secrets which still lie at the heart of space and time, from the Big Bang to black holes, via spiral galaxies and strong theory. To this day A Brief History of Time remains a staple of the scientific canon, and its succinct and clear language continues to introduce millions to the universe and its wonders.', '2023-02-21 02:51:20', 0),
(29, 'Calculus: Early Transcendental Functions, International Metric Edition', '100', '20', 'c90beb1dc67b77dfc4bbbf742fa654f6.jpg', 22, 'For the 7th Edition of CALCULUS: EARLY TRANSCENDENTAL FUNCTIONS, INTERNATIONAL METRIC EDITION, the companion website LarsonCalculus.com offers free access to multiple tools and resources to supplement your learning. Stepped-out solution videos with instruction are available at CalcView.com for selected exercises throughout the text. The website CalcChat.com presents free solutions to odd-numbered exercises in the text. The site currently has over 1 million hits per month, so the authors analyzed these hits to see which exercise solutions you were accessing most often. They revised and refined the exercise sets based on this analysis.', '2023-02-21 02:53:30', 0),
(30, 'Harry Potter Box Set: The Complete Collection (Children’s Paperback', '100', '200', '33e48afd0bcc69a3a782156b1f2a0a3b.jpg', 23, 'One of the greatest literary adventures of modern times - Sunday Telegraph Teachers say a chapter can silence the most rowdy of classes - Guardian That rare thing, a series of stories adored by parents and children alike - Daily Telegraph _______________ Celebrate 25 years of Harry Potter’s spellbinding adventures with this magical boxed set of J.K. Rowling’s classic series Escape to Hogwarts with the unmissable series that has sparked a lifelong reading journey for children and families all over the world! Harry Potter has never even heard of Hogwarts when letters start dropping on the doormat at number four, Privet Drive. Addressed in green ink on yellowish parchment with a purple seal, they are swiftly confiscated by his grisly aunt and uncle. Then, on Harry’s eleventh birthday, a great beetle-eyed giant of a man called Rubeus Hagrid bursts in with some astonishing news – Harry Potter is a wizard, and he has a place at Hogwarts School of Witchcraft and Wizardry. The magic starts here … These irresistible editions, presented in a gorgeous slipcase featuring Hogwarts, are the essential Harry Potter. A must have for every child at the start of the most magical reading adventure. These books are to be treasured and read time and time again, as readers lose themselves in the greatest children’s story of all time.', '2023-02-21 02:55:28', 0),
(31, 'The Chemist: The compulsive, action-packed new thriller from the author of Twilight', '10', '10', '4603460d38b33ec97302ed76c5dc4e5a.jpg', 23, 'In this gripping page-turner, an ex-agent on the run from her former employers must take one more case to clear her name and save her life. The brand-new thriller from international number one bestseller Stephenie Meyer.\r\n\r\nShe used to work for the U.S. government, but very few people ever knew that. An expert in her field, she was one of the darkest secrets of an agency so clandestine it does not even have a name. And when they decided she was a liability, they came for her without warning.\r\n\r\nNow she rarely stays in the same place or uses the same name for long. They have killed the only other person she trusted, but something she knows still poses a threat. They want her dead, and soon.\r\n\r\nWhen her former handler offers her a way out, she realises it is her only chance to erase the giant target on her back. But it means taking one last job for her ex-employers. To her horror, the information she acquires makes her situation even more dangerous.\r\n\r\nResolving to meet the threat head-on, she prepares for the toughest fight of her life but finds herself falling for a man who can only complicate her likelihood of survival. As she sees her choices being rapidly whittled down, she must apply her unique talents in ways she never dreamed of.\r\n\r\nIn this tautly plotted novel, Stephenie Meyer creates a fierce and fascinating new heroine with a very specialised skill set. And she shows once again why she is one of the world bestselling authors.', '2023-02-21 02:59:45', 0),
(32, 'JOYIN 12 Pcs Pre-Filled Easter Eggs with Cars for Boys', '20', '100', '1edde04e50a4ec1a99d4a285bcc524c9.jpg,e7ebda95fe9c589a4d723976054d7fe3.jpg,81ebecdae18244a89e87b9bb07804a10.jpg', 24, 'Our Pre Filled Easter Eggs Set includes 12 cars. 3\' Eggs filled with Pull Back Cars for Boys. Better and Healthier than filling baskets with candy. Our Mini Cars for Easter Eggs Set brings the perfect Easter spirit to your home! Each toy car has a different design. It is a great gift for kids and boys. Easter eggs with cars inside for Easter Egg Hunt Event, Easter Goodie Pack Fillers, Easter Basket Stuffers, Classroom Rewards, Holiday Gifts, Grab Packs, and Home or School Prize Box, School Rewards, Class Prizes, Ideal Gift for Kids. and more!...More\r\nColor:	Multicolor', '2023-02-21 03:10:01', 0),
(33, 'JOYIN 17Pcs Girls Beauty Salon Set for Toddler Kids', '17', '100', '27dcb622f1a07f1c34c0c3815f619083.jpg,cba00e065dd9c7447045d748656a235e.jpg,7ad7f07a976ae25284456ebf7cfba958.jpg', 25, 'Princess Beauty Hair Dresser Salon Kit includes hairdryer with 2 switches, 1 mirror, 2 different styles of curling wands, 2 curlers, 2 combs, 2 hair ties, 4 hair clips, and a jewelry box. This fancy beauty stylist set includes all the tools and accessories little girls need to play princess beauty parlor at home or school. The hairdryer blows air and requires two 1.5VLR6 (not included). The interactive sound pink beauty mirror includes 3 AG13 batteries. Perfect for birthdays, holidays gifts, girls sleepover, classroom activities, and other special occasions!...More\r\nColor:	Multicolor\r\nSuitable Age:	3-6years, 6-12years, over 12years', '2023-02-21 03:12:26', 0),
(34, 'Heart Rate Monitoring Square Smart Watch', '15', '100', 'a20c4ebdecf6fd1837380989e924307f.webp,dc005f1e322f64c859eca6bb2379bdd9.webp,ffff22e09e2ad4066b4cdea39b5e1cb8.webp', 28, 'The seller of this product is not affiliated with, sponsored, licensed or endorsed by any Bluetooth branded entity or service.\r\nStrap Color:	Gold\r\nStyle:	Casual\r\nLanguage:	English, French, Spanish, Portuguese, Russian language, Arabic, German\r\nFeatures:	Other, Date, Alarm, Alarm Clock, Heart Rate Monitor, Sleep Tracking, Calorie Counter, Pedometer, Reminders, Phone, Weather\r\nSupport System:	iOS, Android\r\nIdeal for:	Men\r\nBatteries Included:	Yes\r\nWatch Shape:	Square\r\nWater Resistance:	No Waterproof\r\nCase Material:	Zinc Alloy\r\nStrap Material:	Stainless Steel\r\nScreen Resolution:	240*240\r\nScreen Type:	LCD\r\nPower Supply:	Rechargeable', '2023-02-21 03:14:43', 0),
(35, 'Heart Rate Monitoring Round Smart Watch', '65', '132', '05d00fc7ca750d3cff41bad6054deb95.webp,24295d9f6b55b49c980f31ea62cb6d23.webp,ca650d3f9fc36380653788f6076f7f2b.webp', 28, 'The seller of this product is not affiliated with, sponsored, licensed or endorsed by any Bluetooth branded entity or service.\r\nStrap Color:	Pink\r\nDetails:	Luminous\r\nStyle:	Sporty\r\nLanguage:	English, French, Spanish, Portuguese, Russian language, Arabic, German\r\nFeatures:	Other, Date, Chronograph, Calendars, Alarm, World Time, Multi Time Zone, 24 Hour, Temperature, Alarm Clock, Compasses, Bluetooth, Heart Rate Monitor, Sleep Tracking, Calorie Counter, Pedometer, Reminders, Phone, Stopwatch, Weather, Distance Tracking, GPS\r\nSupport System:	iOS, Android\r\nIdeal for:	Men, Women\r\nBatteries Included:	Yes\r\nWatch Shape:	Round\r\nWater Resistance:	No Waterproof\r\nCase Material:	Zinc Alloy\r\nStrap Material:	Silicone\r\nScreen Resolution:	360*360\r\nScreen Type:	TFT\r\nPower Supply:	Rechargeable', '2023-02-21 03:16:33', 1),
(36, 'OLEVS Classic Wrist Watches,Men Business Watches Dress Watch', '40', '300', '5a817da05d536cb79b2da7a725fe576e.jpg,9b0b3f1dfcf2c72e2f4deeea6e65eb7e.jpg,b03165b608d70ede45743c57e01fa932.jpg,233488340ee878d315e798d798c6cc94.jpg', 29, 'Imported\r\n✨ Mirror Diameter 1.6Inches(41MM),Case Thickness 0.43 Inches(11MM), Band Length:7.0Inches (180MM)-The length of the watch can be adjusted,Weight 132G(4.6ounces),Water Resistant To 30m (330 Ft)\r\n✨ Unique sports chronograph offers three multi-function sub-dials that can be used for chronograph minutes, 24-hour hands, and flywheel sports seconds for a versatile use.\r\n✨ When you need your watch to luminous ,Please Illuminate the Watch Under the Strong Light for 30 Seconds to Activate the Luminous Function.Giving you a new visual experience at night.\r\n✨Watch Use Adopts a Japanese Quartz Movement With Stable Quality.Uses High Quality Antireflective Durable Coatings Dial Window to Prevent Scratches and Breaks\r\n✨The watch has a warranty service,if the watches have any quality problems,Please don’t worry, email us at any time to contact the seller, we will solve any problems for you❤', '2023-02-21 03:21:25', 0),
(37, 'Casio Women Vintage LA670WGA-1DF Daily Alarm Digital Gold-tone Watch', '40', '200', '807de608cd15d3efce66d97ac905c531.jpg,4a31fc0474174a3cdb8afe8e0519bf5e.jpg,e2f17a4b14d19f4dea39eacc490b4825.jpg,baa9b2fea719ca381b09fa103271dcb0.jpg', 30, 'Available at a lower price from other sellers that may not offer free Prime shipping.\r\nImported\r\nGold-tone watch featuring cushion-shape black dial with digital display\r\nFeatures alarm, timer, and perpetual calendar functions Stopwatch\r\n25 mm stainless steel case with mineral dial window and quartz movement\r\nStainless steel band with fold-over clasp. Measuring unit is 1/10th of a second\r\nWater resistant', '2023-02-21 03:25:13', 0),
(38, 'Beats Studio3 Wireless Over Ear Headphones, Blue, MQCY2', '300', '100', '7e1b81de0ab367394f58a39b50a2e7a9.jpg,94960351e44bcad6389c109dcd696bb9.jpg,1cfef5903116fee8df4763f29256d60b.jpg,b48390f5b5ea28a235cd3633798dc15b.jpg', 31, '\r\nBrand	Beats\r\nColour	Blue\r\nForm factor	Over Ear\r\nConnectivity technology	Wireless\r\nAge range (description)	Adult\r\nMaterial	Plastic\r\nNoise control	Active Noise Cancellation\r\nCompatible devices	All\r\nTheme	Video Game\r\nControl type	Noise Control', '2023-02-21 03:27:02', 0),
(39, 'Beats Studio3 Wireless Over Ear Headphones, White, MQ572', '300', '200', '9432c49d99e490e0fbfe0e6e78f8944c.jpg', 31, '\r\nBrand	Beats\r\nColour	White\r\nForm factor	Over Ear\r\nConnectivity technology	Wireless\r\nAge range (description)	Adult\r\nMaterial	Plastic\r\nCompatible devices	All\r\nTheme	Video Game', '2023-02-21 03:27:55', 0),
(40, 'Apple AirPods Pro MWP22AM/A', '30', '100', '4e058fb92b1989c907b6eb37f9781698.jpg,2e828831e47235a502e7c234b71e83cd.jpg,f4454dccb48042d9cec0f52a9a0357d1.jpg,1deaba9e25fedbf7231cbd1002e1f30c.jpg', 32, 'Apple AirPods Pro MWP22AM/A Speaker with Charging Case - White with Any Mobile Bluetooth High Quality and Pure Sound\r\n\r\nBrand	Generic\r\nColour	White\r\nForm factor	In Ear\r\nConnectivity technology	Wireless\r\nWireless communication technologies	Bluetooth\r\nAge range (description)	Adults\r\nMaterial	Mixed Materials\r\nRecommended uses for product	Cycling, Calling, Skateboarding, Exercising\r\nControl type	Siri\r\nItem weight	0.16 Kilograms', '2023-02-21 03:30:08', 0),
(41, 'Touch Control Mini Sport Earbuds', '40', '100', 'b8c2624343abea5ab5b9d2a9188dbb84.jpg,89aff4ccb5c16ff273c783685dda51b3.jpg,a221d49cc4c1b88cc13019e81efe5c8d.jpg,9b6e64e0785e1f8635d54794ef5f08d1.jpg', 32, 'Touch Control Mini Sport Earbuds Wireless 5.0 Waterproof Headphones Tws F9 Hands Free Earphones, Usb Charging Case, Noise Cancelling, In Ear With Mic\r\n\r\nBrand	LADOSCLOSET\r\nModel name	SCUBA SOUND SKULL\r\nColour	Black\r\nForm factor	In Ear\r\nConnectivity technology	Wireless\r\nWireless communication technologies	Bluetooth\r\nSpecial features	Sports-and-exercise, USB connectivity, Noise-Canceling, Microphone Included, Android\r\nIncluded components	Not null\r\nAge range (description)	Adult\r\nMaterial	Leather', '2023-02-21 03:32:26', 1),
(42, 'GUESS SEDUCTIVE (W) EDT 75ML', '20', '210', '149b2beac9b97944b7ad92a7fd653eaf.jpg,1d81102347dbae09efd351028fefbae8.jpg,f0a96f116e4cd2cef2223877af382c25.jpg,49b4afc68cfce15d7b40e738ce245c4d.jpg', 33, '\r\nBrand	GUESS\r\nItem form	Aerosol\r\nItem volume	2.5 Fluid Ounces\r\nScent	CLASSIC\r\nAge range (description)	Adult\r\nMaterial features	Natural\r\nItem weight	0.13 Kilograms\r\nNumber of Items	1\r\nUnit count	75 millilitre', '2023-02-21 03:34:00', 0),
(43, 'Quatre by Boucheron for Women - Eau de Parfum, 100ml', '30', '100', '7100d359680ad0267b6408eb36dc9ff6.jpg,5e2a2cdfd9147d715d3af4a1b2a35846.jpg,2d05da30a6b1feeaac39867b9e5ad3a0.jpg', 33, 'Brand	Boucheron\r\nItem form	Liquid\r\nItem volume	3.3 Fluid Ounces\r\nScent	Fruity\r\nAge range (description)	Adult\r\nItem weight	0.1 Kilograms\r\nNumber of Items	1\r\nUnit count	100 millilitre', '2023-02-21 03:35:20', 1),
(44, 'Jaish By Rasasi, Perfume for Men and Women - Eau de Parfum, 50 ml', '20', '230', '89d0754e757ccb7dbf76206041834c91.jpg,99c2c5748281e4ddfc9086b86e710ccc.jpg', 34, '\r\nBrand	Al Rasasi\r\nItem form	Liquid\r\nItem volume	50 Milliliters\r\nScent	Citrus, Fresh, Musk , Spicy, Wood \r\nAge range (description)	Adult\r\nItem weight	218 Grams\r\nUnit count	50 mililitre', '2023-02-21 03:36:25', 0),
(45, 'JPD Parfum Jean Paul Dupont Connect Uomo Exotic Eau de Toilette Perfume for Men', '15', '300', 'b3e600da6afebf97a4d9d160d05b7b62.jpg,f64cce245747be6d1407d76c9f050c0f.jpg,d6882a1841bf84e697346db1625a8bf7.jpg', 34, 'Brand	JPD PARFUM JEAN PAUL DUPONT\r\nItem form	Aerosol\r\nItem volume	3.38 Fluid Ounces\r\nScent	Fresh, Lavender, Lemon, Apple , Cedar \r\nSpecial features	Fresh\r\nAge range (description)	Adult\r\nMaterial features	Cruelty Free\r\nNumber of Items	1\r\nUnit count	100.00 millilitre', '2023-02-21 03:40:03', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_from_category`
--
ALTER TABLE `categories_from_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_from_category_ibfk_1` (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `categories_from_category`
--
ALTER TABLE `categories_from_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories_from_category`
--
ALTER TABLE `categories_from_category`
  ADD CONSTRAINT `categories_from_category_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories_from_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2025 at 09:34 AM
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
-- Database: `db_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `name`, `barcode`, `price`, `stok`) VALUES
(38, 'PRD001', 'Indomie Goreng 90g', '8996001440012', 3500, 30),
(39, 'PRD002', 'Sari Roti Tawar Kupas 400g', '8996001351004', 14500, 60),
(40, 'PRD003', 'Chitato Sapi Panggang 68g', '8996001603011', 12500, 100),
(41, 'PRD004', 'Oreo Vanilla 133g', '8996001311122', 11500, 80),
(42, 'PRD005', 'Tango Wafer Chocolate 130g', '8996001353039', 9500, 90),
(43, 'PRD006', 'SilverQueen Milk Chocolate 58g', '8996001600010', 12500, 75),
(44, 'PRD007', 'Good Day Cappuccino 250ml', '8996001352001', 8500, 90),
(45, 'PRD008', 'Kapal Api Special Mix 20g', '8991002112345', 1500, 300),
(46, 'PRD009', 'Roma Marie Duo 216g', '8996001324022', 10500, 60),
(47, 'PRD010', 'Qtela Singkong Original 55g', '8991002101234', 8500, 85),
(48, 'PRD011', 'Aqua 600ml', '8997001234567', 4500, 200),
(49, 'PRD012', 'Teh Pucuk Harum 350ml', '8992987001234', 5000, 180),
(50, 'PRD013', 'Mizone Lychee Lemon 500ml', '8997001236005', 7500, 140),
(51, 'PRD014', 'Pocari Sweat 500ml', '8997035561234', 8500, 170),
(52, 'PRD015', 'Coca Cola 390ml', '8992760222223', 7000, 120),
(53, 'PRD016', 'Fanta Strawberry 390ml', '8992760222230', 7000, 90),
(54, 'PRD017', 'Sprite 390ml', '8992760222247', 7000, 100),
(55, 'PRD018', 'You C1000 Lemon 140ml', '8996001600409', 9500, 50),
(68, 'GNT082', 'Genusian Wather', '80768819234890', 2500, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `supplier_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_id`, `name`, `phone`, `address`) VALUES
(3, 'SUP001', 'PT Indofood Sukses Makmur Tbk', '021-57958822', 'Jakarta Barat'),
(4, 'SUP002', 'PT Unilever Indonesia Tbk', '021-80820000', 'Cikarang, Bekasi'),
(5, 'SUP003', 'PT Mayora Indah Tbk', '021-80637700', 'Tangerang'),
(6, 'SUP004', 'PT Tirta Investama (Danone Aqua)', '021-29963100', 'Jakarta Selatan'),
(7, 'SUP005', 'PT Ultra Jaya Milk Industry', '022-6072663', 'Bandung'),
(8, 'SUP006', 'PT Wings Surya', '031-5310055', 'Surabaya'),
(9, 'SUP007', 'PT GarudaFood Putra Putri Jaya Tbk', '021-29703000', 'Jakarta Timur'),
(10, 'SUP008', 'PT Kapal Api Global', '031-2981888', 'Sidoarjo'),
(11, 'SUP009', 'PT Sinar Sosro', '021-4600888', 'Bekasi'),
(12, 'SUP010', 'PT ABC President Indonesia', '021-89907077', 'Karawang'),
(13, 'SUP011', 'PT Kalbe Farma Tbk', '021-29379999', 'Jakarta Pusat'),
(14, 'SUP012', 'PT Siantar Top Tbk', '031-5327766', 'Surabaya'),
(15, 'SUP013', 'PT Nutrifood Indonesia', '021-4608899', 'Jakarta Utara'),
(16, 'SUP014', 'PT Nippon Indosari Corpindo Tbk (Sari Roti)', '021-82615050', 'Cikarang'),
(17, 'SUP015', 'PT Pocari Sweat Indonesia (Amerta Indah Otsuka)', '021-29601800', 'Depok'),
(18, 'SUP006', 'PT Indofood CBP Sukses Makmur', '021-57958822', 'Jakarta Barat'),
(19, 'SUP007', 'PT Wings Surya', '031-5321234', 'Surabaya'),
(20, 'SUP008', 'PT Mayora Indah Tbk', '021-80637700', 'Tangerang'),
(23, 'SUT056', 'PT Genusian Wather', '083-835778119', 'Sukabumi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(27, 'faqih', 'faqihabkhari999@gmail.com', '$2y$10$4Tgo2wthmlDAahiqZFa.Su4KNih4ARaUiGg9Lr.AdAx8aWK7paj.a'),
(29, 'gisna', 'gisna@gmail.com', '$2y$10$oXMx1.i2791H7SruuLPHaOQcPIVr/bAGUPii8ZKVANn0ftuUwUidO'),
(30, 'falentino', 'falentino@gmail.com', '$2y$10$qzTO519mTMwu4YeNUiWj.eGsuyOdXz6AOS.jmfyj4FwqCvpyGK.ei'),
(31, 'pak falen', 'falentino@gmail.com', '$2y$10$UbcjBlkLadBClThVhTOA8eHXfhV3sYt30z8jTBXqCyHZ1h5pKOwc6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

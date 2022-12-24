-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2022 at 01:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `Admin_username` varchar(50) NOT NULL,
  `Admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Admin_username`, `Admin_password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(11) NOT NULL,
  `Category_name` varchar(50) NOT NULL,
  `Category_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_name`, `Category_status`) VALUES
(8, 'Foods', 'active'),
(10, 'Drinks', 'active'),
(11, 'Body Products', 'active'),
(12, 'Cloths', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_ID` int(11) NOT NULL,
  `Employee_email` varchar(100) NOT NULL,
  `Employee_password` varchar(50) NOT NULL,
  `Employee_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `Employee_email`, `Employee_password`, `Employee_name`) VALUES
(6, 'sita@gmail.com', 'sita', 'Sita'),
(9, 'raj@gmail.com', 'raj', 'Raj'),
(11, 'Samir@gmail.com', 'samir', 'Samir'),
(12, 'Roshan@gmail.com', 'roshan', 'Roshan');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Product_Quantity` int(11) NOT NULL,
  `Product_Price` int(11) NOT NULL,
  `Product_Dom` varchar(200) NOT NULL,
  `Product_Doe` varchar(200) NOT NULL,
  `Product_add_date` date NOT NULL DEFAULT current_timestamp(),
  `Product_Photo` varchar(255) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Product_Mname` varchar(200) NOT NULL,
  `Product_Weight` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Category_ID`, `Product_Quantity`, `Product_Price`, `Product_Dom`, `Product_Doe`, `Product_add_date`, `Product_Photo`, `Supplier_ID`, `Product_Mname`, `Product_Weight`) VALUES
(8, 'Coffee', 8, 10, 150, '20th January 2022', '20th January 2023', '2022-12-24', '../assets/images/uploads/coffee.jpg', 4, 'Nestle', 100),
(9, 'Waiwai', 8, 30, 20, 'June,2022', 'June,2023', '2022-12-24', '../assets/images/uploads/waiwai.jpg', 4, 'CG', 80),
(10, 'Hand Lotion', 11, 33, 200, '20th July,2021', '20th July,2024', '2022-12-24', '../assets/images/uploads/handlotion.jpg', 7, 'Vaseline', 100),
(11, 'Choco-fun', 8, 38, 5, '30th August,2022', '20th August,2023', '2022-12-24', '../assets/images/uploads/chocofun.jpg', 4, 'Sujal', 10),
(12, 'Coca-Cola', 10, 12, 160, '24th December 2022', '24th February 2023', '2022-12-24', '../assets/images/uploads/coke.jpg', 7, 'Coca-Cola', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_ID` int(11) NOT NULL,
  `Supplier_Name` varchar(255) NOT NULL,
  `Supplier_Address` varchar(255) NOT NULL,
  `Supplier_Email` varchar(100) NOT NULL,
  `Supplier_Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_ID`, `Supplier_Name`, `Supplier_Address`, `Supplier_Email`, `Supplier_Status`) VALUES
(4, 'Ramey', 'Butwal', 'Ramey@gmail.com', 'active'),
(5, 'Syam', 'Chitwan', 'Syam@gmail.com', 'inactive'),
(7, 'Ritu', 'Chitwan', 'Ritu@gmail.com', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID`),
  ADD UNIQUE KEY `Email` (`Employee_email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Category FK` (`Category_ID`),
  ADD KEY `Supplier FK` (`Supplier_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Supplier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Category FK` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`Category_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Supplier FK` FOREIGN KEY (`Supplier_ID`) REFERENCES `supplier` (`Supplier_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

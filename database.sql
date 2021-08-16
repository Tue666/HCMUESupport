-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 04:23 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `PassWord` varchar(255) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `CreatedDay` date NOT NULL,
  `Type` int(10) NOT NULL DEFAULT 0,
  `Status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `UserName`, `PassWord`, `Name`, `Email`, `Address`, `Phone`, `CreatedDay`, `Type`, `Status`) VALUES
(1, 'admin', '$2y$10$7jPz8mY5oI.Et//5h5QXsuurgBheXd4gBmwsVnRc5IVwhdmS048nS', 'admin', 'admin123@gmail.com', 'Việt Nam', '0696969696', '2021-07-25', 1, 1),
(2, 'admin1', '$2y$10$0rjIsQD5PyKz6gDtKi9NqONdFb4UiXz1j.ylUWv4Ku8asIfMT024u', 'admin1', 'admin1123@gmail.com', 'Việt Nam', '0123456789', '2021-07-25', 1, 1),
(9, '45.01.104.269', '$2y$10$1VnNatSZeyrXX8GgMkpLheVu2nvAmDJT6qfg/Nxxtcr4G.cOWQvtG', 'Tuệ', 'lechinhtue292001@gmail.com', 'vn', '0696969696', '2021-08-15', 0, 1),
(10, '45.01.104.000', '$2y$10$vCceAaey.MEczg9Vl2doZOVjSM.K6eRusm8rdG2XintR8SyDupCye', 'Tuệ', 'lechinhtue292001@gmail.com', 'vn', '0696969696', '2021-08-15', 0, 1),
(11, '45.01.104.111', '$2y$10$4c1bd4TWG4D2MBC518by9ewy6RbMzdyKuxmK16RV1iBrIYUlra.Hm', 'Tuệ', 'lechinhtue292001@gmail.com', 'q8 TPHCM', '0696969696', '2021-08-15', 0, 1),
(12, '45.01.104.222', '$2y$10$BiBYgMl92wVQxh6waoGV2epiriat/l5DitYxsDG.8Bch3hu/LNwuK', 'Tuệ', 'lechinhtue292001@gmail.com', 'q8 TPHCM', '0696969696', '2021-08-15', 0, 1),
(13, '45.01.104.333', '$2y$10$w/LhcBT22GVCA8Jlhd5PMuJ1bKmzPl.isMpPl6fIK03Ek8vdH02Q.', 'Tuệ', 'lechinhtue292001@gmail.com', 'q8 TPHCM', '0696969696', '2021-08-15', 0, 1),
(14, '45.01.104.444', '$2y$10$5amz/5c/XKm1w2Qx94M4Dua80HkYJdMxfTKQnCWRMquMeZmN6i3/q', 'Tuệ', 'lechinhtue292001@gmail.com', 'q8 TPHCM', '0696969696', '2021-08-15', 0, 1),
(15, 'tue', '$2y$10$AF0OroP8/o3tVhi.41vdMu3ii84h8u4kyIp90Ox9zBRioLbdJJDfS', 'tue', 'lechinhtue292001@gmail.com', 'vn', '0696969696', '2021-08-16', 0, 1),
(16, 'test', '$2y$10$i.kao8tjPft3wQXDPL4mcOKZYjOIX2Zt9ADmaa/DDlOG8nL4sYQju', 'test', 'test@gmail.com', 'vn', '0123', '2021-08-16', 0, 1),
(17, 'tue2', '$2y$10$GgRGgIJeiNBR5a7zJv6kgeOK2K.sTTPYPABDdmZ4frDDzpYEMmGL6', 'tuệ', 'lechinhtue292001@gmail.com', 'vn', '0696969696', '2021-08-16', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderID`, `ProductID`) VALUES
(3, 1),
(3, 2),
(7, 1),
(8, 2),
(8, 8),
(9, 1),
(9, 3),
(10, 1),
(11, 1),
(11, 12),
(12, 1),
(13, 1),
(13, 3),
(13, 8),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(15, 3),
(16, 3),
(16, 11),
(16, 12),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(18, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(250) NOT NULL,
  `CustomerEmail` varchar(250) NOT NULL,
  `CustomerAddress` varchar(250) NOT NULL,
  `CustomerPhone` varchar(50) NOT NULL,
  `MSSV` varchar(50) NOT NULL,
  `Object` varchar(255) DEFAULT NULL,
  `Health` varchar(255) NOT NULL,
  `Khoa` varchar(50) NOT NULL,
  `Place` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Note` varchar(300) NOT NULL,
  `CreatedDay` date NOT NULL,
  `ReceivedDay` varchar(50) DEFAULT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `CustomerID`, `CustomerName`, `CustomerEmail`, `CustomerAddress`, `CustomerPhone`, `MSSV`, `Object`, `Health`, `Khoa`, `Place`, `Address`, `Note`, `CreatedDay`, `ReceivedDay`, `Status`) VALUES
(3, 3, 'Tuệ', 'dapamu333@gmail.com', 'vn', '6969696969', '45.01.104.269', NULL, '', 'CNTT', 'Nhận theo địa chỉ', 'Lê Văn Sỹ', 'Ghi chú', '2021-07-27', NULL, 1),
(7, 1, 'Tuệ', 'admin123@gmail.com', 'Việt Nam', '0696969696', 'admin', NULL, '', 'CNTT', 'Nhận tại trường', '', '', '2021-07-25', NULL, 1),
(8, 1, 'admin', 'admin123@gmail.com', 'Việt Nam', '0696969696', 'admin', NULL, '', 'CNTT', 'Nhận tại trường', '', '', '2021-07-28', NULL, 1),
(9, 7, 'Tuệ', 'lechinhtue292001@gmail.com', 'vn', '0696969696', '45.01.104.269', NULL, '', 'CNTT', 'Nhận tại trường', '', '', '2021-08-15', NULL, 0),
(10, 1, 'admin', 'admin123@gmail.com', 'Việt Nam', '0696969696', 'admin', 'Cựu giáo chức', '', 'Khoa Toán - Tin học', 'Nhận tại trường (cơ sở 280 An Dương Vương)', '', '', '2021-08-15', NULL, 0),
(11, 9, 'Tuệ', 'lechinhtue292001@gmail.com', 'vn', '0696969696', '45.01.104.269', 'Sinh viên', '', 'Khoa Công nghệ thông tin', 'Nhận tại điểm tiếp nhận (người nhận tự đến lấy)', 'Khu vực Quận Bình Tân (Dành cho khu vực Quận 6, Tân Phú, Bình Tân, huyện Bình Chánh)', 'quận Tân Phú nha <3', '2021-08-15', NULL, 1),
(12, 10, 'Tuệ', 'lechinhtue292001@gmail.com', 'vn', '0696969696', '45.01.104.000', 'Cựu giáo chức', '', 'Khoa Toán - Tin học', 'Chuyển đến nhà qua ứng dụng grap, now, ... (người nhận trả phí vận chuyển)', 'vn', '', '2021-08-15', NULL, 0),
(13, 11, 'Tuệ', 'lechinhtue292001@gmail.com', 'q8 TPHCM', '0696969696', '45.01.104.111', 'Sinh viên', '', 'Khoa Công nghệ thông tin', 'Nhận tại điểm tiếp nhận (người nhận tự đến lấy)', 'Khu vực Quận Bình Tân (Dành cho khu vực Quận 6, Tân Phú, Bình Tân, huyện Bình Chánh)', '', '2021-08-15', NULL, 0),
(14, 12, 'Tuệ', 'lechinhtue292001@gmail.com', 'q8 TPHCM', '0696969696', '45.01.104.222', 'Cựu giáo chức', '', 'Khoa Toán - Tin học', 'Nhận tại điểm tiếp nhận (người nhận tự đến lấy)', 'Cơ sở 222 Lê Văn Sỹ (Dành cho khu vực Quận 1, 3, 10, Phú Nhuận, Bình Thạnh, Tân Bình)', '', '2021-08-15', NULL, 0),
(15, 13, 'Tuệ', 'lechinhtue292001@gmail.com', 'q8 TPHCM', '0696969696', '45.01.104.333', 'Cựu giáo chức', '', 'Khoa Công nghệ thông tin', 'Nhận tại điểm tiếp nhận (người nhận tự đến lấy)', 'Khu vực Quận 4 (Dành cho khu vực Quận 1, 4, 7, huyện Nhà Bè)', '', '2021-08-15', NULL, 1),
(16, 14, 'Tuệ', 'lechinhtue292001@gmail.com', 'q8 TPHCM', '0696969696', '45.01.104.444', 'Sinh viên', '', 'Khoa Giáo dục Tiểu học', 'Nhận tại điểm tiếp nhận (người nhận tự đến lấy)', 'Khu vực Quận 12 (Dành cho khu vực Quận 12, Tân Bình, Gò Vấp, huyện Hóc Môn)', '', '2021-08-15', NULL, 0),
(17, 15, 'tue', 'lechinhtue292001@gmail.com', 'vn', '0696969696', 'tue', 'Sinh viên', '', 'Khoa Công nghệ thông tin', 'Nhận tại điểm tiếp nhận (người nhận tự đến lấy)', 'Khu vực Quận 6 (Dành cho khu vực Quận 6, 8, huyện Bình Chánh)', 'love <3', '2021-08-12', NULL, 0),
(18, 15, 'tue', 'lechinhtue292001@gmail.com', 'vn', '0696969696', 'tue', 'Sinh viên', 'Không tiếp xúc với đối tượng nghi nhiễm', 'Khoa Công nghệ thông tin', 'Nhận tại các điểm tiếp nhận (Người nhận tự đến lấy tại điểm tiếp nhận đã đăng ký)', 'Cơ sở 222 Lê Văn Sĩ, Phường 14, Quận 3, Thành phố Hồ Chí Minh (Đối với khu vực Quận 1, Quận 3)', '', '2021-08-16', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE `productcategories` (
  `ID` int(11) NOT NULL,
  `CateName` varchar(255) NOT NULL,
  `DisplayOrder` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productcategories`
--

INSERT INTO `productcategories` (`ID`, `CateName`, `DisplayOrder`, `Status`) VALUES
(1, 'Thức ăn', 1, 1),
(2, 'Nước uống', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `IDCate` int(11) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `Store` int(11) NOT NULL,
  `CreatedDay` date NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `ProductName`, `IDCate`, `Image`, `Description`, `Quantity`, `Store`, `CreatedDay`, `Status`) VALUES
(1, 'Trứng', 1, 'egg.jpg', 'Combo 1 slot 2 vỉ', 8, 20, '2021-07-25', 1),
(2, 'Rau muống', 1, 'image_not_found.png', NULL, 12, 20, '2021-07-25', 1),
(3, 'Nước lọc', 2, 'image_not_found.png', NULL, 16, 30, '2021-07-25', 1),
(4, 'Sữa', 2, 'image_not_found.png', NULL, 0, 1, '2021-07-25', 1),
(8, 'Bánh', 1, 'image_not_found.png', NULL, 15, 20, '2021-07-27', 1),
(9, 'Bánh gạo', 1, 'image_not_found.png', NULL, 9, 10, '2021-07-27', 1),
(11, 'Bánh chiên', 1, 'image_not_found.png', '', 9, 10, '2021-08-14', 1),
(12, 'Datos', 1, 'Datos.png', 'Datos description', 67, 69, '2021-08-14', 1),
(13, 'Cá', 1, 'image_not_found.png', 'Cá', 1, 1, '2021-08-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  `StoreDay` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderID`,`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

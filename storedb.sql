-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 04:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_clients`
--

CREATE TABLE `app_clients` (
  `ClientId` int(10) UNSIGNED NOT NULL,
  `Name` varchar(10) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_clients`
--

INSERT INTO `app_clients` (`ClientId`, `Name`, `PhoneNumber`, `Email`, `Address`) VALUES
(3, 'Amr', '01019144915', 'amrmohsen72@gmail.com', '16 district /El sheikh zayed /Giza');

-- --------------------------------------------------------

--
-- Table structure for table `app_expense_categories`
--

CREATE TABLE `app_expense_categories` (
  `ExpenseId` tinyint(3) UNSIGNED NOT NULL,
  `ExpenseTitle` varchar(30) NOT NULL,
  `FixedPayment` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_expense_daily_list`
--

CREATE TABLE `app_expense_daily_list` (
  `DExpenseId` int(10) UNSIGNED NOT NULL,
  `ExpenseId` tinyint(3) UNSIGNED NOT NULL,
  `Payment` decimal(7,2) NOT NULL,
  `Created` datetime NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_notifications`
--

CREATE TABLE `app_notifications` (
  `NotificationId` int(10) UNSIGNED NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Type` tinyint(2) NOT NULL,
  `Created` datetime NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL,
  `seen` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_products_categories`
--

CREATE TABLE `app_products_categories` (
  `CategoryId` int(10) UNSIGNED NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Image` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_products_list`
--

CREATE TABLE `app_products_list` (
  `ProductId` int(10) UNSIGNED NOT NULL,
  `CategoryId` int(10) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Image` varchar(40) DEFAULT NULL,
  `Quantity` smallint(5) UNSIGNED NOT NULL,
  `BuyPrice` decimal(6,2) NOT NULL,
  `SellPrice` decimal(6,2) NOT NULL,
  `Unit` tinyint(10) UNSIGNED NOT NULL,
  `BarCode` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_purchases_invoices`
--

CREATE TABLE `app_purchases_invoices` (
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  `SupplierId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(1) NOT NULL,
  `PaymentStatus` tinyint(1) NOT NULL,
  `Created` datetime NOT NULL,
  `Discount` decimal(8,2) DEFAULT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_purchases_invoices_details`
--

CREATE TABLE `app_purchases_invoices_details` (
  `Id` int(10) UNSIGNED NOT NULL,
  `ProductId` int(10) UNSIGNED NOT NULL,
  `Quantity` smallint(6) NOT NULL,
  `ProductPrice` decimal(7,2) NOT NULL,
  `InvoiceId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_purchases_invoices_receipts`
--

CREATE TABLE `app_purchases_invoices_receipts` (
  `ReceiptId` int(10) UNSIGNED NOT NULL,
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(1) NOT NULL,
  `PaymentAmount` decimal(8,2) NOT NULL,
  `PaymentLiteral` varchar(60) NOT NULL,
  `BankName` varchar(30) DEFAULT NULL,
  `BankAccountNumber` varchar(30) DEFAULT NULL,
  `CheckNumber` varchar(15) DEFAULT NULL,
  `TransferdTo` varchar(30) DEFAULT NULL,
  `Created` datetime NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_sales_invoices`
--

CREATE TABLE `app_sales_invoices` (
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  `ClientId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(1) NOT NULL,
  `PaymentStatus` tinyint(1) NOT NULL,
  `Created` datetime NOT NULL,
  `Discount` decimal(8,2) DEFAULT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_sales_invoices_details`
--

CREATE TABLE `app_sales_invoices_details` (
  `Id` int(10) UNSIGNED NOT NULL,
  `ProductId` int(10) UNSIGNED NOT NULL,
  `Quantity` smallint(6) NOT NULL,
  `ProductPrice` decimal(7,2) NOT NULL,
  `InvoiceId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_sales_invoices_receipts`
--

CREATE TABLE `app_sales_invoices_receipts` (
  `ReceiptId` int(10) UNSIGNED NOT NULL,
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(1) NOT NULL,
  `PaymentAmount` decimal(8,2) NOT NULL,
  `PaymentLiteral` varchar(60) NOT NULL,
  `BankName` varchar(30) DEFAULT NULL,
  `BankAccountNumber` varchar(30) DEFAULT NULL,
  `CheckNumber` varchar(15) DEFAULT NULL,
  `TransferdTo` varchar(30) DEFAULT NULL,
  `Created` datetime NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_suppliers`
--

CREATE TABLE `app_suppliers` (
  `SupplierId` int(10) UNSIGNED NOT NULL,
  `Name` varchar(10) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_suppliers`
--

INSERT INTO `app_suppliers` (`SupplierId`, `Name`, `PhoneNumber`, `Email`, `Address`) VALUES
(4, 'Amrs', '01019144915', 'amrmohsen72@gmail.com', '16 district /El sheikh zayed /Giza');

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

CREATE TABLE `app_users` (
  `UserId` int(10) UNSIGNED NOT NULL,
  `UserName` varchar(12) NOT NULL,
  `Password` char(60) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `SubsciriptionDate` datetime NOT NULL,
  `LastLogin` datetime NOT NULL,
  `GroupId` tinyint(1) UNSIGNED NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`UserId`, `UserName`, `Password`, `Email`, `PhoneNumber`, `SubsciriptionDate`, `LastLogin`, `GroupId`, `Status`) VALUES
(20, 'amr mohsen', '$2a$07$yeNCSNwRpYopOhv0TrrReOQf6HNMqS3a41jVmT/EhmqWsqls8yEB.', 'ah2med2@g.com', '01019144915', '0000-00-00 00:00:00', '2020-12-27 15:34:01', 6, 1),
(21, 'khaledtamer', '$2a$07$yeNCSNwRpYopOhv0TrrReOCycf/bQRYwqQUen6DXJCt8b1yNTYs8.', 'khaledt@g.com', '01019144915', '0000-00-00 00:00:00', '2020-12-28 22:04:24', 5, 1),
(22, 'karem123', '$2a$07$yeNCSNwRpYopOhv0TrrReOCycf/bQRYwqQUen6DXJCt8b1yNTYs8.', 'koko@gmail.com', '01019144915', '0000-00-00 00:00:00', '2020-12-27 15:32:05', 5, 1),
(23, 'sabah123', '$2a$07$yeNCSNwRpYopOhv0TrrReOCycf/bQRYwqQUen6DXJCt8b1yNTYs8.', 's@g.com', '01019144915', '0000-00-00 00:00:00', '2020-12-27 15:31:33', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_users_groups`
--

CREATE TABLE `app_users_groups` (
  `GroupId` tinyint(1) UNSIGNED NOT NULL,
  `GroupName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users_groups`
--

INSERT INTO `app_users_groups` (`GroupId`, `GroupName`) VALUES
(5, 'Admin'),
(6, 'moderator');

-- --------------------------------------------------------

--
-- Table structure for table `app_users_groups_privileges`
--

CREATE TABLE `app_users_groups_privileges` (
  `Id` tinyint(3) UNSIGNED NOT NULL,
  `GroupId` tinyint(1) UNSIGNED NOT NULL,
  `PrivilegeId` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users_groups_privileges`
--

INSERT INTO `app_users_groups_privileges` (`Id`, `GroupId`, `PrivilegeId`) VALUES
(1, 5, 14),
(2, 5, 15),
(3, 5, 17),
(4, 5, 18),
(5, 5, 19),
(6, 5, 22),
(7, 5, 24),
(8, 5, 25),
(9, 5, 26),
(10, 5, 27),
(11, 5, 28),
(12, 5, 29),
(13, 5, 30),
(14, 5, 31),
(15, 5, 32),
(16, 5, 33),
(17, 5, 34),
(18, 5, 35),
(19, 5, 36),
(20, 5, 37),
(21, 5, 38),
(22, 6, 27),
(23, 6, 36),
(24, 6, 38),
(25, 5, 39),
(26, 5, 40),
(27, 5, 41),
(28, 5, 42),
(29, 5, 43),
(30, 5, 44),
(31, 5, 45),
(32, 5, 46),
(33, 5, 47);

-- --------------------------------------------------------

--
-- Table structure for table `app_users_privileges`
--

CREATE TABLE `app_users_privileges` (
  `PrivilegeId` tinyint(3) UNSIGNED NOT NULL,
  `Privilege` varchar(30) NOT NULL,
  `PrivilegeTitle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users_privileges`
--

INSERT INTO `app_users_privileges` (`PrivilegeId`, `Privilege`, `PrivilegeTitle`) VALUES
(14, '/suppliers/create', 'انشاء مورد جديد '),
(15, '/suppliers/edit', 'تعديل بيانات مورد'),
(17, '/suppliers/delete', 'حذف مورد'),
(18, '/clients/create', 'انشاء عميل جديد '),
(19, '/clients/edit', 'تعديل بيانات عميل'),
(22, '/clients/delete', 'حذف عميل'),
(24, '/purchases/view', 'عرض  مشتريات'),
(25, '/purchasesInvoices/create', 'عمل فاتورة مشتريات جديدة'),
(26, '/purchasesInvoices/edit', 'تعديل فاتورة مشتريات'),
(27, '/users/default', 'استعراض المستخدمين'),
(28, '/users/create', 'اضافة مستخدم جديد'),
(29, '/users/delete', 'حذف مستخدم'),
(30, '/usergroups/default', 'استعراض مجموعات المستخدمين'),
(31, '/usergroups/create', 'اضافة مجموة مستخدمين جديدة'),
(32, '/usergroups/edit', ' تعديل مجموعة مستخدمين '),
(33, '/usergroups/delete', 'حذف مجموعة مستخدمين'),
(34, '/privileges/default', 'استعراض الصلاحيات'),
(35, '/privileges/create', 'اضافة صلاحية جديدة'),
(36, '/privileges/edit', 'تعديل الصلاحيات'),
(37, '/privileges/delete', ' حذف الصلاحيات'),
(38, '/users/edit', 'تعديل مسخدم'),
(39, '/suppliers/default', 'استعراض الموردين'),
(40, '/clients/default', 'استعراض العملاء'),
(41, '/productcategories/create', 'اضافة قسم منتجات'),
(42, '/productcategories/edit', 'تعديل قسم منتجات'),
(43, '/productcategories/delete', 'حذف قسم منتجات'),
(44, '/productlist/default', 'استعراض المنتجات'),
(45, '/productlist/create', 'اضافة منتج '),
(46, '/productlist/add', 'تعديل منتج'),
(47, '/productlist/delete', 'حذف منتج');

-- --------------------------------------------------------

--
-- Table structure for table `app_users_profile`
--

CREATE TABLE `app_users_profile` (
  `UserId` int(10) UNSIGNED NOT NULL,
  `FirstName` varchar(10) NOT NULL,
  `LastName` varchar(10) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users_profile`
--

INSERT INTO `app_users_profile` (`UserId`, `FirstName`, `LastName`, `Address`, `DOB`, `Image`) VALUES
(20, 'Amr', 'Mohsen', NULL, NULL, NULL),
(21, 'khaled', 'el taweel', NULL, NULL, NULL),
(22, 'kareem', 'mohsen', NULL, NULL, NULL),
(23, 'sabah', 'mohsen', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_clients`
--
ALTER TABLE `app_clients`
  ADD PRIMARY KEY (`ClientId`);

--
-- Indexes for table `app_expense_categories`
--
ALTER TABLE `app_expense_categories`
  ADD PRIMARY KEY (`ExpenseId`);

--
-- Indexes for table `app_expense_daily_list`
--
ALTER TABLE `app_expense_daily_list`
  ADD PRIMARY KEY (`DExpenseId`),
  ADD KEY `ExpenseId` (`ExpenseId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `app_notifications`
--
ALTER TABLE `app_notifications`
  ADD PRIMARY KEY (`NotificationId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `app_products_categories`
--
ALTER TABLE `app_products_categories`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `app_products_list`
--
ALTER TABLE `app_products_list`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `app_purchases_invoices`
--
ALTER TABLE `app_purchases_invoices`
  ADD PRIMARY KEY (`InvoiceId`),
  ADD KEY `SupplierId` (`SupplierId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `app_purchases_invoices_details`
--
ALTER TABLE `app_purchases_invoices_details`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ProductId` (`ProductId`),
  ADD KEY `InvoiceId` (`InvoiceId`);

--
-- Indexes for table `app_purchases_invoices_receipts`
--
ALTER TABLE `app_purchases_invoices_receipts`
  ADD PRIMARY KEY (`ReceiptId`),
  ADD KEY `InvoiceId` (`InvoiceId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `app_sales_invoices`
--
ALTER TABLE `app_sales_invoices`
  ADD PRIMARY KEY (`InvoiceId`),
  ADD KEY `ClientId` (`ClientId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `app_sales_invoices_details`
--
ALTER TABLE `app_sales_invoices_details`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ProductId` (`ProductId`),
  ADD KEY `InvoiceId` (`InvoiceId`);

--
-- Indexes for table `app_sales_invoices_receipts`
--
ALTER TABLE `app_sales_invoices_receipts`
  ADD PRIMARY KEY (`ReceiptId`),
  ADD KEY `InvoiceId` (`InvoiceId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `app_suppliers`
--
ALTER TABLE `app_suppliers`
  ADD PRIMARY KEY (`SupplierId`);

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `UserName` (`UserName`,`Email`),
  ADD KEY `GroupId` (`GroupId`);

--
-- Indexes for table `app_users_groups`
--
ALTER TABLE `app_users_groups`
  ADD PRIMARY KEY (`GroupId`);

--
-- Indexes for table `app_users_groups_privileges`
--
ALTER TABLE `app_users_groups_privileges`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `GroupId` (`GroupId`),
  ADD KEY `PrivilegeId` (`PrivilegeId`);

--
-- Indexes for table `app_users_privileges`
--
ALTER TABLE `app_users_privileges`
  ADD PRIMARY KEY (`PrivilegeId`);

--
-- Indexes for table `app_users_profile`
--
ALTER TABLE `app_users_profile`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_clients`
--
ALTER TABLE `app_clients`
  MODIFY `ClientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `app_expense_categories`
--
ALTER TABLE `app_expense_categories`
  MODIFY `ExpenseId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_expense_daily_list`
--
ALTER TABLE `app_expense_daily_list`
  MODIFY `DExpenseId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_notifications`
--
ALTER TABLE `app_notifications`
  MODIFY `NotificationId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_products_categories`
--
ALTER TABLE `app_products_categories`
  MODIFY `CategoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `app_products_list`
--
ALTER TABLE `app_products_list`
  MODIFY `ProductId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_purchases_invoices`
--
ALTER TABLE `app_purchases_invoices`
  MODIFY `InvoiceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_purchases_invoices_details`
--
ALTER TABLE `app_purchases_invoices_details`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_purchases_invoices_receipts`
--
ALTER TABLE `app_purchases_invoices_receipts`
  MODIFY `ReceiptId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sales_invoices`
--
ALTER TABLE `app_sales_invoices`
  MODIFY `InvoiceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sales_invoices_details`
--
ALTER TABLE `app_sales_invoices_details`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sales_invoices_receipts`
--
ALTER TABLE `app_sales_invoices_receipts`
  MODIFY `ReceiptId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_suppliers`
--
ALTER TABLE `app_suppliers`
  MODIFY `SupplierId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `UserId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `app_users_groups`
--
ALTER TABLE `app_users_groups`
  MODIFY `GroupId` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `app_users_groups_privileges`
--
ALTER TABLE `app_users_groups_privileges`
  MODIFY `Id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `app_users_privileges`
--
ALTER TABLE `app_users_privileges`
  MODIFY `PrivilegeId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `app_users_profile`
--
ALTER TABLE `app_users_profile`
  MODIFY `UserId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_expense_daily_list`
--
ALTER TABLE `app_expense_daily_list`
  ADD CONSTRAINT `app_expense_daily_list_ibfk_1` FOREIGN KEY (`ExpenseId`) REFERENCES `app_expense_categories` (`ExpenseId`),
  ADD CONSTRAINT `app_expense_daily_list_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_notifications`
--
ALTER TABLE `app_notifications`
  ADD CONSTRAINT `app_notifications_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_products_list`
--
ALTER TABLE `app_products_list`
  ADD CONSTRAINT `app_products_list_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `app_products_categories` (`CategoryId`);

--
-- Constraints for table `app_purchases_invoices`
--
ALTER TABLE `app_purchases_invoices`
  ADD CONSTRAINT `app_purchases_invoices_ibfk_1` FOREIGN KEY (`SupplierId`) REFERENCES `app_suppliers` (`SupplierId`),
  ADD CONSTRAINT `app_purchases_invoices_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_purchases_invoices_details`
--
ALTER TABLE `app_purchases_invoices_details`
  ADD CONSTRAINT `app_purchases_invoices_details_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `app_products_list` (`ProductId`),
  ADD CONSTRAINT `app_purchases_invoices_details_ibfk_2` FOREIGN KEY (`InvoiceId`) REFERENCES `app_purchases_invoices` (`InvoiceId`);

--
-- Constraints for table `app_purchases_invoices_receipts`
--
ALTER TABLE `app_purchases_invoices_receipts`
  ADD CONSTRAINT `app_purchases_invoices_receipts_ibfk_1` FOREIGN KEY (`InvoiceId`) REFERENCES `app_purchases_invoices` (`InvoiceId`),
  ADD CONSTRAINT `app_purchases_invoices_receipts_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_sales_invoices`
--
ALTER TABLE `app_sales_invoices`
  ADD CONSTRAINT `app_sales_invoices_ibfk_1` FOREIGN KEY (`ClientId`) REFERENCES `app_clients` (`ClientId`),
  ADD CONSTRAINT `app_sales_invoices_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_sales_invoices_details`
--
ALTER TABLE `app_sales_invoices_details`
  ADD CONSTRAINT `app_sales_invoices_details_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `app_products_list` (`ProductId`),
  ADD CONSTRAINT `app_sales_invoices_details_ibfk_2` FOREIGN KEY (`InvoiceId`) REFERENCES `app_sales_invoices` (`InvoiceId`);

--
-- Constraints for table `app_sales_invoices_receipts`
--
ALTER TABLE `app_sales_invoices_receipts`
  ADD CONSTRAINT `app_sales_invoices_receipts_ibfk_1` FOREIGN KEY (`InvoiceId`) REFERENCES `app_sales_invoices` (`InvoiceId`),
  ADD CONSTRAINT `app_sales_invoices_receipts_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_users`
--
ALTER TABLE `app_users`
  ADD CONSTRAINT `app_users_ibfk_1` FOREIGN KEY (`GroupId`) REFERENCES `app_users_groups` (`GroupId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `app_users_groups_privileges`
--
ALTER TABLE `app_users_groups_privileges`
  ADD CONSTRAINT `app_users_groups_privileges_ibfk_1` FOREIGN KEY (`GroupId`) REFERENCES `app_users_groups` (`GroupId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `app_users_groups_privileges_ibfk_2` FOREIGN KEY (`PrivilegeId`) REFERENCES `app_users_privileges` (`PrivilegeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `app_users_profile`
--
ALTER TABLE `app_users_profile`
  ADD CONSTRAINT `app_users_profile_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

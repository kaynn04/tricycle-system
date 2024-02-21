-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 01:53 PM
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
-- Database: `tricycle_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_information_tbl`
--

CREATE TABLE `customer_information_tbl` (
  `customerId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) DEFAULT NULL,
  `sex` enum('male','female') NOT NULL,
  `birthDate` date NOT NULL,
  `blockNo` varchar(20) NOT NULL,
  `lotNo` varchar(20) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_information_tbl`
--

CREATE TABLE `driver_information_tbl` (
  `driverId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) DEFAULT NULL,
  `sex` enum('male','female') NOT NULL,
  `birthDate` date NOT NULL,
  `blockNo` varchar(20) NOT NULL,
  `lotNo` varchar(20) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `licenseNo` varchar(50) NOT NULL,
  `licenseExpirationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fare_tbl`
--

CREATE TABLE `fare_tbl` (
  `FareID` int(11) NOT NULL,
  `Origin` varchar(50) NOT NULL,
  `Destination` varchar(50) NOT NULL,
  `Distance_km` int(11) DEFAULT NULL,
  `Fare` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fare_tbl`
--

INSERT INTO `fare_tbl` (`FareID`, `Origin`, `Destination`, `Distance_km`, `Fare`) VALUES
(1, 'Robinson', 'Bukluran', 6, 40),
(2, 'Robinson', 'Pamahay', 4, 30),
(3, 'Robinson', 'Palmera', 5, 35);

-- --------------------------------------------------------

--
-- Table structure for table `operator_information_tbl`
--

CREATE TABLE `operator_information_tbl` (
  `operatorId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) DEFAULT NULL,
  `sex` enum('male','female') NOT NULL,
  `birthDate` date NOT NULL,
  `contactNo` varchar(15) NOT NULL,
  `blockNo` varchar(20) NOT NULL,
  `lotNo` varchar(20) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `licenseNo` varchar(50) NOT NULL,
  `licenseExpiration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_offer_tbl`
--

CREATE TABLE `services_offer_tbl` (
  `ServiceID` int(11) NOT NULL,
  `ServiceType` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_offer_tbl`
--

INSERT INTO `services_offer_tbl` (`ServiceID`, `ServiceType`) VALUES
(1, 'School Service'),
(2, 'Regular Transport'),
(3, 'Package Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tbl`
--

CREATE TABLE `transaction_tbl` (
  `TransactionID` int(11) NOT NULL,
  `DriverID` int(11) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `ServiceID` int(11) DEFAULT NULL,
  `FareID` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tricycle_info_tbl`
--

CREATE TABLE `tricycle_info_tbl` (
  `TricycleID` int(11) NOT NULL,
  `Owner` varchar(255) NOT NULL,
  `BodyNo` int(11) DEFAULT NULL,
  `PlateNo` varchar(20) NOT NULL,
  `BodyColor` varchar(50) NOT NULL,
  `Area` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `OfficialReceipt` varchar(255) NOT NULL,
  `CertificateOfRegistration` varchar(50) NOT NULL,
  `TypeOfMotorcycle_CC` varchar(50) NOT NULL,
  `MotorBrand` varchar(255) NOT NULL,
  `MotorModel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tricycle_info_tbl`
--

INSERT INTO `tricycle_info_tbl` (`TricycleID`, `Owner`, `BodyNo`, `PlateNo`, `BodyColor`, `Area`, `Email`, `OfficialReceipt`, `CertificateOfRegistration`, `TypeOfMotorcycle_CC`, `MotorBrand`, `MotorModel`) VALUES
(1, 'Oclares', 111, '1231321', 'blue', 'bukluran', 'oclares@gmail.com', 'asdasdsa', 'asdsadsa', '100cc', 'suzuki', 'hotdog');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_information_tbl`
--
ALTER TABLE `customer_information_tbl`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `driver_information_tbl`
--
ALTER TABLE `driver_information_tbl`
  ADD PRIMARY KEY (`driverId`);

--
-- Indexes for table `fare_tbl`
--
ALTER TABLE `fare_tbl`
  ADD PRIMARY KEY (`FareID`);

--
-- Indexes for table `operator_information_tbl`
--
ALTER TABLE `operator_information_tbl`
  ADD PRIMARY KEY (`operatorId`);

--
-- Indexes for table `services_offer_tbl`
--
ALTER TABLE `services_offer_tbl`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `DriverID` (`DriverID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `ServiceID` (`ServiceID`);

--
-- Indexes for table `tricycle_info_tbl`
--
ALTER TABLE `tricycle_info_tbl`
  ADD PRIMARY KEY (`TricycleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_information_tbl`
--
ALTER TABLE `customer_information_tbl`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_information_tbl`
--
ALTER TABLE `driver_information_tbl`
  MODIFY `driverId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fare_tbl`
--
ALTER TABLE `fare_tbl`
  MODIFY `FareID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `operator_information_tbl`
--
ALTER TABLE `operator_information_tbl`
  MODIFY `operatorId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services_offer_tbl`
--
ALTER TABLE `services_offer_tbl`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tricycle_info_tbl`
--
ALTER TABLE `tricycle_info_tbl`
  MODIFY `TricycleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  ADD CONSTRAINT `transaction_tbl_ibfk_1` FOREIGN KEY (`DriverID`) REFERENCES `driver_info_tbl` (`DriverID`),
  ADD CONSTRAINT `transaction_tbl_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer_info_tbl` (`CustomerID`),
  ADD CONSTRAINT `transaction_tbl_ibfk_3` FOREIGN KEY (`ServiceID`) REFERENCES `services_offer_tbl` (`ServiceID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2017 at 10:23 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Cancel` ()  NO SQL
DELETE FROM records ORDER BY bookingid DESC LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertData` (`username` VARCHAR(20), `age` INT(11), `email` VARCHAR(20), `contactnum` INT(11), `password` VARCHAR(20))  BEGIN
INSERT INTO custlogin(username,age,email,contactnum,password)VALUES(username,age,email,contactnum,password);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `no_of_Users` ()  NO SQL
BEGIN
SELECT * FROM records ORDER BY bookingid DESC LIMIT 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `airportid` int(11) NOT NULL,
  `pick` varchar(20) NOT NULL,
  `dest` varchar(20) NOT NULL,
  `depdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`airportid`, `pick`, `dest`, `depdate`) VALUES
(1, 'Bengaluru', 'Chennai', '2017-11-30'),
(2, 'Bengaluru', 'Kolkata', '2017-11-09'),
(3, 'Bengaluru', 'Chennai', '2017-11-16'),
(4, 'Bengaluru', 'Chennai', '2017-11-29'),
(5, 'Bengaluru', 'Chennai', '2017-11-30'),
(6, 'Bengaluru', 'Chennai', '2017-11-30'),
(7, 'Bengaluru', 'Chennai', '2017-11-29'),
(8, 'Bengaluru', 'New Delhi', '2017-11-08'),
(9, 'Kolkata', 'Chennai', '2017-11-28'),
(10, 'Bengaluru', 'Mysore', '2017-11-29'),
(11, 'Bengaluru', 'Mysore', '2017-11-28'),
(12, 'Bengaluru', 'Mysore', '2017-11-29'),
(13, 'Bengaluru', 'Mysore', '2017-11-29'),
(14, 'Bengaluru', 'Mysore', '2017-11-29'),
(15, 'Bengaluru', 'New Delhi', '2017-11-09'),
(16, 'Bengaluru', 'Kolkata', '2017-11-14'),
(17, 'Bengaluru', 'New Delhi', '2017-11-30'),
(18, 'Bengaluru', 'Mumbai', '2017-11-16'),
(19, 'Mumbai', 'Kolkata', '2017-11-29'),
(20, 'Bengaluru', 'Chennai', '2017-11-28'),
(21, 'Bengaluru', 'Chennai', '2017-11-30'),
(22, 'Bengaluru', 'Chennai', '2017-11-30'),
(23, 'Mumbai', 'New Delhi', '2017-11-30'),
(24, 'Bengaluru', 'Hassan', '2017-11-30'),
(25, 'Kolkata', 'Chennai', '2017-11-30'),
(26, 'Mumbai', 'Chennai', '2017-12-03'),
(27, 'Bengaluru', 'Kolkata', '2017-11-30'),
(28, 'Chennai', 'Bengaluru', '2017-11-29'),
(29, 'New Delhi', 'Mumbai', '2017-11-30'),
(30, 'Bengaluru', 'Kolkata', '2017-11-29'),
(31, 'Mumbai', 'Chennai', '2017-11-29'),
(32, 'Chennai', 'New Delhi', '2017-11-30'),
(33, 'Bengaluru', 'New Delhi', '2017-11-30'),
(34, 'Bengaluru', 'Kolkata', '2017-11-30'),
(35, 'Chennai', 'Kolkata', '2017-11-29'),
(36, 'New Delhi', 'Kolkata', '2017-11-30'),
(37, 'Bengaluru', 'Mumbai', '2017-11-30'),
(38, 'Mumbai', 'Chennai', '2017-11-30'),
(39, 'Kolkata', 'New Delhi', '2017-11-30'),
(40, 'Chennai', 'New Delhi', '2017-11-30'),
(41, 'Chennai', 'Kolkata', '2017-11-29'),
(42, 'Chennai', 'Mysore', '2017-11-29'),
(43, 'New Delhi', 'Chennai', '2017-11-30'),
(44, 'Chennai', 'Bengaluru', '2017-11-28'),
(45, 'Chennai', 'Kolkata', '2017-11-30'),
(46, 'Mumbai', 'Kolkata', '2017-11-29'),
(47, 'Bengaluru', 'Chennai', '2017-11-30'),
(48, 'Chennai', 'New Delhi', '2017-11-30'),
(49, 'Kolkata', 'New Delhi', '2017-11-30'),
(50, 'Mumbai', 'Bengaluru', '2017-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `custlogin`
--

CREATE TABLE `custlogin` (
  `username` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `contactnum` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `LastUpdateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custlogin`
--

INSERT INTO `custlogin` (`username`, `age`, `email`, `contactnum`, `password`, `LastUpdateDate`) VALUES
('ANDY', 35, 'andy@gmail.com', 87984566, 'andy', '2017-11-28 16:14:53'),
('ASHWIN', 23, 'ashwin.k.sri@gmail.c', 76465, 'ash', '2017-11-29 15:48:59'),
('JOEL', 43, 'joel@gmail.com', 87945152, 'joel', '2017-11-28 16:14:05'),
('LEWIS', 32, 'lewis@gmail.com', 2147483647, 'lewis', '2017-11-28 15:26:35'),
('TOM', 25, 'tom@gmail.com', 796131321, 'tom', '2017-11-28 04:30:47'),
('TONY', 24, 'tony@gmail.com', 987524231, 'tony', '2017-11-29 17:38:13'),
('VEE', 30, 'vee@gmail.com', 2147483647, 'vee', '2017-11-27 06:44:12');

--
-- Triggers `custlogin`
--
DELIMITER $$
CREATE TRIGGER `CAPITAL` BEFORE INSERT ON `custlogin` FOR EACH ROW SET NEW.username=UPPER(NEW.username)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Last_Password` BEFORE UPDATE ON `custlogin` FOR EACH ROW BEGIN
SET NEW.LastUpdateDate = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `name`, `position`, `password`) VALUES
(100, 'admin', 'manager', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `planes`
--

CREATE TABLE `planes` (
  `pid` int(11) NOT NULL,
  `seats` int(11) UNSIGNED NOT NULL,
  `planename` varchar(20) NOT NULL,
  `pickup` varchar(20) NOT NULL,
  `dest` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `fare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planes`
--

INSERT INTO `planes` (`pid`, `seats`, `planename`, `pickup`, `dest`, `class`, `fare`) VALUES
(101, 148, 'SpiceJet', 'Bengaluru', 'Kolkata', 'Economy', 4590),
(102, 149, 'Indigo', 'Bengaluru', 'New Delhi', 'Economy', 5320),
(103, 149, 'Air Asia', 'Bengaluru', 'Chennai', 'Economy', 3890),
(104, 150, 'Air India', 'Bengaluru', 'Mumbai', 'Economy', 3850),
(111, 150, 'Indian Airways', 'Bengaluru', 'Kolkata', 'Business', 10500),
(112, 149, 'Air Asia', 'Bengaluru', 'New Delhi', 'Business', 12300),
(113, 148, 'SpiceJet', 'Bengaluru', 'Chennai', 'Business', 7560),
(114, 150, 'SpiceJet', 'Bengaluru', 'Mumbai', 'Business', 9310),
(121, 149, 'Jet Airways', 'Bengaluru', 'Kolkata', 'First Class', 2530),
(122, 150, 'Deccan', 'Bengaluru', 'New Delhi', 'First Class', 3100),
(123, 145, 'Kingfisher', 'Bengaluru', 'Chennai', 'First Class', 2300),
(124, 149, 'Indigo', 'Bengaluru', 'Mumbai', 'First Class', 2700),
(201, 147, 'SpiceJet', 'Chennai', 'Bengaluru', 'Economy', 4100),
(202, 150, 'Air Asia', 'Chennai', 'Mumbai', 'Economy', 6500),
(203, 149, 'Vistara', 'Chennai', 'New Delhi', 'Economy', 5580),
(204, 150, 'Indigo', 'Chennai', 'Kolkata', 'Economy', 4890),
(211, 150, 'Indigo', 'Chennai', 'Bengaluru', 'Business', 9520),
(212, 150, 'Jet Airways', 'Chennai', 'Mumbai', 'Business', 9780),
(213, 150, 'Indian Airways', 'Chennai', 'New Delhi', 'Business', 10370),
(214, 150, 'Indigo', 'Chennai', 'Kolkata', 'Business', 10420),
(221, 149, 'Vistara', 'Chennai', 'Bengaluru', 'First Class', 2710),
(222, 150, 'Indigo', 'Chennai', 'Mumbai', 'First Class', 3100),
(223, 149, 'Aircosta', 'Chennai', 'New Delhi', 'First Class', 3730),
(224, 147, 'Jet Airways', 'Chennai', 'Kolkata', 'First Class', 2950),
(301, 150, 'Air Asia', 'Kolkata', 'Bengaluru', 'Economy', 4350),
(302, 149, 'SpiceJet', 'Kolkata', 'Chennai', 'Economy', 6100),
(303, 150, 'Vistara', 'Kolkata', 'New Delhi', 'Economy', 7500),
(304, 149, 'Indigo', 'Kolkata', 'Mumbai', 'Economy', 6350),
(311, 150, 'Indian Airways', 'Kolkata', 'Bengaluru', 'Business', 12430),
(312, 149, 'Vistara', 'Kolkata', 'Chennai', 'Business', 10350),
(313, 149, 'Kingfisher', 'Kolkata', 'New Delhi', 'Business', 10570),
(314, 150, 'SpiceJet', 'Kolkata', 'Mumbai', 'Business', 10680),
(321, 150, 'Indigo', 'Kolkata', 'Bengaluru', 'First Class', 2350),
(322, 150, 'Deccan', 'Kolkata', 'Chennai', 'First Class', 3120),
(323, 149, 'Deccan', 'Kolkata', 'New Delhi', 'First Class', 3180),
(324, 150, 'Kingfisher', 'Kolkata', 'Mumbai', 'First Class', 3680),
(401, 149, 'Air India', 'Mumbai', 'Bengaluru', 'Economy', 5280),
(402, 148, 'Air Asia', 'Mumbai', 'Chennai', 'Economy', 5380),
(403, 146, 'Indigo', 'Mumbai', 'Kolkata', 'Economy', 6580),
(404, 150, 'Vistara', 'Mumbai', 'New Delhi', 'Economy', 4530),
(411, 150, 'SpiceJet', 'Mumbai', 'Bengaluru', 'Business', 1650),
(412, 150, 'Indigo', 'Mumbai', 'Chennai', 'Business', 11350),
(413, 150, 'Air India', 'Mumbai', 'Kolkata', 'Business', 1350),
(414, 149, 'Indian Airways', 'Mumbai', 'New Delhi', 'Business', 12500),
(421, 149, 'Kingfisher', 'Mumbai', 'Bengaluru', 'First Class', 3750),
(422, 150, 'Air Asia', 'Mumbai', 'Chennai', 'First Class', 3430),
(423, 149, 'Deccan', 'Mumbai', 'Kolkata', 'First Class', 3300),
(424, 150, 'Deccan', 'Mumbai', 'New Delhi', 'First Class', 3860),
(501, 150, 'GoAir', 'New Delhi', 'Bengaluru', 'Economy', 5970),
(502, 148, 'Jet Airways', 'New Delhi', 'Chennai', 'Economy', 6720),
(503, 149, 'Aircosta', 'New Delhi', 'Kolkata', 'Economy', 6890),
(504, 150, 'Kingfisher', 'New Delhi', 'Mumbai', 'Economy', 7560),
(511, 150, 'Kingfisher', 'New Delhi', 'Bengaluru', 'Business', 10780),
(512, 150, 'Kingfisher', 'New Delhi', 'Chennai', 'Business', 11620),
(513, 149, 'Kingfisher', 'New Delhi', 'Kolkata', 'Business', 10650),
(514, 150, 'Air India', 'New Delhi', 'Mumbai', 'Business', 12650),
(521, 150, 'SpiceJet', 'New Delhi', 'Bengaluru', 'First Class', 3460),
(522, 150, 'Vistara', 'New Delhi', 'Chennai', 'First Class', 3450),
(523, 150, 'Air Asia', 'New Delhi', 'Kolkata', 'first class', 3610),
(524, 149, 'Indigo', 'New Delhi', 'Mumbai', 'First Class', 3500),
(601, 2, 'Jet Airways', 'Bengaluru', 'Mysore', 'Economy', 8630);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `bookingid` int(20) NOT NULL,
  `deptime` date NOT NULL,
  `fare` int(11) NOT NULL,
  `classname` varchar(20) NOT NULL,
  `pid` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `pickup` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`bookingid`, `deptime`, `fare`, `classname`, `pid`, `seats`, `pickup`, `destination`, `username`) VALUES
(176, '2017-11-30', 12500, 'Business', 414, 150, 'Mumbai', 'New Delhi', 'VEE'),
(177, '2017-11-30', 10350, 'Business', 312, 150, 'Kolkata', 'Chennai', 'VEE'),
(178, '2017-12-03', 5380, 'Economy', 402, 150, 'Mumbai', 'Chennai', 'TOM'),
(179, '2017-11-30', 4590, 'Economy', 101, 149, 'Bengaluru', 'Kolkata', 'TOM'),
(180, '2017-11-29', 4100, 'Economy', 201, 148, 'Chennai', 'Bengaluru', 'VEE'),
(182, '2017-11-30', 12300, 'Business', 112, 150, 'Bengaluru', 'New Delhi', 'TOM'),
(183, '2017-11-30', 2530, 'First Class', 121, 150, 'Bengaluru', 'Kolkata', 'TOM'),
(184, '2017-11-29', 2950, 'First Class', 224, 150, 'Chennai', 'Kolkata', 'TOM'),
(185, '2017-11-30', 10650, 'Business', 513, 150, 'New Delhi', 'Kolkata', 'LEWIS'),
(186, '2017-11-30', 2700, 'First Class', 124, 150, 'Bengaluru', 'Mumbai', 'VEE'),
(187, '2017-11-30', 5380, 'Economy', 402, 149, 'Mumbai', 'Chennai', 'TOM'),
(188, '2017-11-30', 10570, 'Business', 313, 150, 'Kolkata', 'New Delhi', 'LEWIS'),
(189, '2017-11-30', 5580, 'Economy', 203, 150, 'Chennai', 'New Delhi', 'VEE'),
(190, '2017-11-29', 2950, 'First Class', 224, 149, 'Chennai', 'Kolkata', 'TOM'),
(191, '2017-11-30', 6720, 'Economy', 502, 149, 'New Delhi', 'Chennai', 'TOM'),
(193, '2017-11-30', 2950, 'First Class', 224, 148, 'Chennai', 'Kolkata', 'ANDY'),
(194, '2017-11-29', 3300, 'First Class', 423, 150, 'Mumbai', 'Kolkata', 'VEE'),
(195, '2017-11-30', 7560, 'Business', 113, 149, 'Bengaluru', 'Chennai', 'VEE'),
(196, '2017-11-30', 3180, 'First Class', 323, 150, 'Kolkata', 'New Delhi', 'ASHWIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`airportid`);

--
-- Indexes for table `custlogin`
--
ALTER TABLE `custlogin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `airportid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `bookingid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `planes` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `records_ibfk_2` FOREIGN KEY (`username`) REFERENCES `custlogin` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

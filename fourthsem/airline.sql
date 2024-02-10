-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 04:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `airplane`
--

CREATE TABLE `airplane` (
  `aid` int(5) NOT NULL,
  `pname` varchar(40) NOT NULL,
  `pnumber` int(5) NOT NULL,
  `eseats` int(5) NOT NULL,
  `bseats` int(5) NOT NULL,
  `tdate` date NOT NULL,
  `rdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airplane`
--

INSERT INTO `airplane` (`aid`, `pname`, `pnumber`, `eseats`, `bseats`, `tdate`, `rdate`) VALUES
(1, 'Buddha', 1, 100, 10, '2022-11-21', '0000-00-00'),
(2, 'Sagarmatha', 2, 100, 10, '2022-11-21', '0000-00-00'),
(3, 'Araniko', 3, 200, 400, '2022-11-21', '2022-11-22'),
(4, 'Annapurna', 4, 300, 20, '2022-11-21', '2022-11-22'),
(1, 'Buddha', 5, 50, 10, '2022-11-10', '0000-00-00'),
(4, 'Buddha', 4, 50, 10, '2022-11-17', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `flightype` varchar(40) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `rdate` date NOT NULL,
  `fnumber` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `classtype` varchar(40) NOT NULL,
  `paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ID`, `flightype`, `time`, `date`, `rdate`, `fnumber`, `username`, `classtype`, `paid`) VALUES
(1, 'One Way', '02:04:05', '2022-11-21', '0000-00-00', 1, 'ram', 'Business', 1),
(2, 'Round Trip', '02:04:25', '2022-11-21', '2022-11-22', 4, 'shyam', 'Business', 0),
(3, 'One Way', '07:13:58', '2022-11-21', '0000-00-00', 1, 'anushka', 'Economy', 1),
(4, 'One Way', '07:14:23', '2022-11-21', '0000-00-00', 1, 'anushka', 'Economy', 1),
(9, 'One Way', '07:50:23', '2022-11-21', '0000-00-00', 1, 'anushka', 'Economy', 1),
(10, 'One Way', '09:08:26', '2022-11-21', '0000-00-00', 1, 'anushka123', 'Economy', 1),
(11, 'One Way', '10:44:15', '2022-11-21', '0000-00-00', 1, 'anushka123', 'Economy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `fnumber` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `classname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`fnumber`, `capacity`, `price`, `classname`) VALUES
(1, 100, 10000, 'Economy'),
(1, 10, 10000, 'Business'),
(2, 100, 10000, 'Economy'),
(2, 10, 10000, 'Business'),
(3, 200, 2000, 'Economy'),
(3, 400, 4000, 'Business'),
(4, 300, 4000, 'Economy'),
(4, 20, 5000, 'Business'),
(5, 50, 5000, 'Economy'),
(5, 10, 10000, 'Business'),
(4, 50, 5000, 'Economy'),
(4, 10, 10000, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `onewayflights`
--

CREATE TABLE `onewayflights` (
  `fnumber` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `todate` date NOT NULL,
  `dairport` varchar(40) NOT NULL,
  `dtime` time NOT NULL,
  `aairport` varchar(40) NOT NULL,
  `atime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onewayflights`
--

INSERT INTO `onewayflights` (`fnumber`, `aid`, `todate`, `dairport`, `dtime`, `aairport`, `atime`) VALUES
(1, 1, '2022-11-21', 'Kathmandu', '19:00:00', 'Bhairahwa', '19:00:00'),
(2, 2, '2022-11-21', 'Pokhara', '19:00:00', 'Dhangadhi', '19:00:00'),
(5, 1, '2022-11-10', 'Bhairahwa', '18:55:00', 'Kathmandu', '19:55:00'),
(4, 4, '2022-11-17', 'Bhairahwa', '19:06:00', 'Kathmandu', '20:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `passanger`
--

CREATE TABLE `passanger` (
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `confpass` varchar(40) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(11) NOT NULL,
  `passport` int(11) NOT NULL,
  `homenum` int(11) NOT NULL,
  `street` int(11) NOT NULL,
  `city` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passanger`
--

INSERT INTO `passanger` (`fname`, `lname`, `username`, `password`, `confpass`, `sex`, `age`, `email`, `phone`, `passport`, `homenum`, `street`, `city`) VALUES
('samikshya', 'poudel', 'sam', '1234567890', '1234567890', 'male', 20, 'sam1@gmail.com', 911201022, 123123, 2002, 0, 'satdbato');

-- --------------------------------------------------------

--
-- Table structure for table `roundflights`
--

CREATE TABLE `roundflights` (
  `fnumber` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `gdate` date NOT NULL,
  `rdate` date NOT NULL,
  `airport1` varchar(40) NOT NULL,
  `dtime` time NOT NULL,
  `airport2` varchar(40) NOT NULL,
  `atime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roundflights`
--

INSERT INTO `roundflights` (`fnumber`, `aid`, `gdate`, `rdate`, `airport1`, `dtime`, `airport2`, `atime`) VALUES
(3, 3, '2022-11-21', '2022-11-21', 'Kathmandu', '19:01:00', 'Bhairahwa', '19:01:00'),
(4, 4, '2022-11-21', '2022-11-22', 'Pokhara', '19:02:00', 'Dhangadhi', '19:03:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

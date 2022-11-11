-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2020 at 04:18 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(30) NOT NULL default '',
  `Password` varchar(20) default NULL,
  PRIMARY KEY  (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Password`) VALUES
('admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `User_Id` varchar(30) NOT NULL,
  `Passport_Id` varchar(8) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Sex` varchar(5) NOT NULL,
  `Age` int(3) NOT NULL,
  `Flight_No` varchar(10) NOT NULL,
  `From_Loc` varchar(10) NOT NULL,
  `To_Loc` varchar(10) NOT NULL,
  `Time` varchar(10) NOT NULL,
  `Date` varchar(11) NOT NULL,
  `B_time` varchar(50) default NULL,
  `Gate` varchar(50) default NULL,
  `Seat_No` int(10) NOT NULL auto_increment,
  `Rate` varchar(10) NOT NULL,
  `Paid` int(1) NOT NULL,
  PRIMARY KEY  (`Seat_No`),
  KEY `Passport_Id` (`Passport_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`User_Id`, `Passport_Id`, `Name`, `Sex`, `Age`, `Flight_No`, `From_Loc`, `To_Loc`, `Time`, `Date`, `B_time`, `Gate`, `Seat_No`, `Rate`, `Paid`) VALUES
('rahul.gandhi@gmail.com', 'R0803199', 'Rahul Gandhi', 'male', 21, 'AI986', 'Surat', 'Mumbai', '15:21', '2020-05-27', '15:00', 'D', 10, '4900', 1),
('yashesh.pandya@gmail.com', 'Y1604199', 'Yashesh Pandya', 'male', 22, 'ID849', 'Surat', 'Delhi', '10:25', '2020-05-27', '10:00', 'Y', 11, '4000', 1),
('yashesh.pandya@gmail.com', 'A1204199', 'Abhishek Jariwala', 'male', 21, 'ID849', 'Surat', 'Delhi', '10:25', '2020-05-27', '10:00', 'Y', 12, '4000', 1),
('kartik.fruitwala@gmail.com', 'K2004199', 'Kartik Fruitwala', 'male', 21, 'AI657', 'Mumbai', 'Delhi', '11:55', '2020-05-27', '11:25', 'F', 13, '6500', 1),
('naitik.vajani@gmail.com', 'N2308199', 'Naitik Vajani', 'male', 22, 'ID856', 'Surat', 'Ahmedabad', '6:55', '2020-05-27', '6:25', 'Y', 14, '6000', 1),
('naitik.vajani@gmail.com', 'P0212202', 'Pravin Rathod', 'male', 21, 'ID856', 'Surat', 'Ahmedabad', '6:55', '2020-05-27', '6:25', 'Y', 15, '6000', 1),
('utsav.haveliwala@gmail.com', 'U1508199', 'Utsav Haveliwala', 'male', 22, 'ID856', 'Surat', 'Ahmedabad', '6:55', '2020-05-27', '6:25', 'Y', 16, '6000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `City` varchar(20) NOT NULL,
  PRIMARY KEY  (`City`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`City`) VALUES
('Ahmedabad'),
('Amritsar'),
('Bangalore'),
('Baroda'),
('Chennai'),
('Coimbatore'),
('Delhi'),
('Goa'),
('Guwahati'),
('Hyderabad'),
('Jaipur'),
('Kochi'),
('Kolkata'),
('Lucknow'),
('Mangalore'),
('Mumbai'),
('Nagpur'),
('Pune'),
('Ranchi'),
('Srinagar'),
('Surat'),
('Thiruvanathapuram'),
('Tiruchirapalli'),
('Vadodara'),
('Varanasi');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `Flight_Name` varchar(30) NOT NULL,
  `Flight_No` varchar(20) NOT NULL default '',
  `Company_Name` varchar(20) default NULL,
  `From_Loc` varchar(20) default NULL,
  `To_Loc` varchar(20) default NULL,
  `Time` varchar(10) default NULL,
  `Date` date default NULL,
  `B_time` varchar(50) NOT NULL,
  `Gate` varchar(50) NOT NULL,
  `Class` varchar(20) default NULL,
  `Rate` varchar(10) default NULL,
  PRIMARY KEY  (`Flight_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`Flight_Name`, `Flight_No`, `Company_Name`, `From_Loc`, `To_Loc`, `Time`, `Date`, `B_time`, `Gate`, `Class`, `Rate`) VALUES
('Kingfisher A301', 'A301', 'KINGFISHER', 'Surat', 'Pune', '15:00', '2020-08-15', '14:30', 'B', 'Economy class', '3500'),
('Air India', 'AI356', 'AIR INDIA', 'Mumbai', 'Hyderabad', '9:55', '2020-05-27', '9:25', 'A', 'Economy class', '6000'),
('Air India', 'AI650', 'AIR INDIA', 'Ahmedabad', 'Hyderabad', '11:00', '2020-05-27', '10:30', 'A', 'Economy class', '7000'),
('Air India', 'AI651', 'AIR INDIA', 'Ahmedabad', 'Hyderabad', '16:00', '2020-05-26', '15:30', 'V', 'Economy class', '7500'),
('Air India', 'AI657', 'AIR INDIA', 'Mumbai', 'Delhi', '11:55', '2020-05-27', '11:25', 'F', 'Economy class', '6500'),
('Air India', 'AI981', 'AIR INDIA', 'Surat', 'Delhi', '6:55', '2020-05-27', '6:25', 'A', 'Economy class', '6500'),
('Air India', 'AI982', 'AIR INDIA', 'Surat', 'Delhi', '21:55', '2020-05-29', '21:25', 'H', 'Economy class', '6000'),
('Air India', 'AI985', 'AIR INDIA', 'Surat', 'Mumbai', '8:00', '2020-05-12', '7:55', 'J', 'Economy class', '6000'),
('Air India', 'AI986', 'AIR INDIA', 'Surat', 'Mumbai', '15:21', '2020-05-27', '15:00', 'D', 'Economy class', '4900'),
('Air Asia', 'AS653', 'AIR ASIA', 'Surat', 'Mumbai', '14:20', '2020-05-27', '14:00', 'F', 'Economy class', '4900'),
('Thai Airways', 'AS655', 'THAI AIRWAYS', 'Surat', 'Mumbai', '21:35', '2020-05-27', '21:00', 'Y', 'Economy Class', '6500'),
('Indigo', 'ID3555', 'INDIGO', 'Mumbai', 'Delhi', '17:55', '2020-05-27', '17:25', 'G', 'Business class', '16000'),
('Indigo', 'ID650', 'INDIGO', 'Mumbai', 'Hyderabad', '11:00', '2020-05-26', '10:30', 'B', 'Economy class', '6000'),
('Indigo', 'ID651', 'INDIGO', 'Mumbai', 'Hyderabad', '13:15', '2020-05-27', '12:45', 'E', 'Economy class', '6100'),
('Indigo', 'ID743', 'INDIGO', 'Ahmedabad', 'Goa', '11:40', '2020-10-26', '11:10', 'F', 'Economy class', '4000'),
('Indigo', 'ID744', 'INDIGO', 'Ahmedabad', 'Goa', '17:20', '2020-05-26', '17:00', 'A', 'Economy class', '4599'),
('Indigo', 'ID749', 'INDIGO', 'Goa', 'Ahmedabad', '09:55', '2020-05-27', '9:25', 'A', 'Economy class', '5000'),
('Indigo', 'ID750', 'INDIGO', 'Goa', 'Ahmedabad', '15:15', '2020-10-27', '14:55', 'G', 'Economy class', '5200'),
('Indigo', 'ID832', 'INDIGO', 'Ahmedabad', 'Delhi', '04:55', '2020-05-26', '4:25', 'A', 'Economy class', '7000'),
('Indigo', 'ID833', 'INDIGO', 'Delhi', 'Ahmedabad', '11:20', '2020-05-27', '10:55', 'I', 'Economy class', '6999'),
('Indigo', 'ID844', 'INDIGO', 'Ahmedabad', 'Hyderabad', '16:35', '2020-05-27', '16:05', 'T', 'Economy class', '5500'),
('Indigo', 'ID845', 'INDIGO', 'Hyderabad', 'Ahmedabad', '12:55', '2020-05-27', '12:25', 'T', 'Economy class', '5399'),
('Indigo', 'ID847', 'INDIGO', 'Surat', 'Mumbai', '06:58', '2020-05-27', '6:38', 'U', 'Economy class', '6000'),
('Indigo', 'ID848', 'INDIGO', 'Surat', 'Mumbai', '18:55', '2020-05-27', '18:25', 'T', 'Economy class', '6550'),
('Indigo', 'ID849', 'INDIGO', 'Surat', 'Delhi', '10:25', '2020-05-27', '10:00', 'Y', 'Economy class', '4000'),
('Indigo', 'ID850', 'INDIGO', 'Delhi', 'Surat', '13:40', '2020-06-27', '13:10', 'T', 'Economy class', '4200'),
('Indigo', 'ID856', 'INDIGO', 'Surat', 'Ahmedabad', '6:55', '2020-05-27', '6:25', 'Y', 'Economy class', '6000'),
('Indigo', 'ID857', 'INDIGO', 'Ahmedabad', 'Surat', '9:00', '2020-05-28', '8:30', 'T', 'Economy class', '6500'),
('Indigo', 'ID866', 'INDIGO', 'Ahmedabad', 'Mumbai', '11:20', '2020-05-26', '11:00', 'A', 'Economy class', '6500'),
('Indigo', 'ID867', 'INDIGI', 'Mumbai', 'Ahmedabad', '18:20', '2020-05-27', '18:00', 'G', 'Economy class', '6300'),
('Spice Jet', 'SG415', 'SPICE JET', 'Surat', 'Bangalore', '7:15', '2019-10-24', '', '', 'Economy class', '7000'),
('Spice Jet', 'SG416', 'SPICE JET', 'Surat', 'Bangalore', '13:15', '2019-10-25', '', '', 'Economy class', '6500'),
('Spice Jet', 'SG455', 'SPICE JET', 'Surat', 'Goa', '07:45', '2019-10-26', '', '', 'Economy class', '3500'),
('Spice Jet', 'SG456', 'SPICE JET', 'Surat', 'Goa', '7:50', '2019-10-27', '', '', 'Economy class', '3100'),
('Spice Jet', 'SG467', 'SPICE JET', 'Surat', 'Hyderabad', '14:10', '2019-10-25', '', '', 'Economy class', '6000'),
('Spice Jet', 'SG468', 'SPICE JET', 'Surat', 'Hyderabad', '16:40', '2019-10-26', '', '', 'Economy class', '5699'),
('Spice Jet', 'SG471', 'SPICE JET', 'Surat', 'Delhi', '4:45', '2019-10-27', '', '', 'Economy class', '5699'),
('Spice Jet', 'SG472', 'SPICE JET', 'Surat', 'Delhi', '9:05', '2019-10-27', '', '', 'Economy class', '5900'),
('Spice Jet', 'SG473', 'SPICE JET', 'Surat', 'Chennai', '19:00', '2019-10-27', '', '', 'Economy class', '6300'),
('Spice Jet', 'SG474', 'SPICE JET', 'Surat', 'Chennai', '06:55', '2019-10-28', '', '', 'Economy class', '6500'),
('Spice Jet', 'SG611', 'SPICE JET', 'Surat', 'Chennai', '6:15', '2019-10-29', '', '', 'Economy class', '8000'),
('Spice Jet', 'SG612', 'SPICE JET', 'Surat', 'Chennai', '14:45', '2019-10-29', '', '', 'Economy class', '9199'),
('Spice Jet', 'SG613', 'SPICE JET', 'Surat', 'Chennai', '23:35', '2019-10-29', '', '', 'Economy class', '9599'),
('Spice Jet', 'SG6371', 'SPICE JET', 'Surat', 'Amritsar', '7:45', '2019-10-24', '', '', 'Economy class', '6000'),
('Spice Jet', 'SG6372', 'SPICE JET', 'Surat', 'Amritsar', '16:20', '2019-10-24', '', '', 'Economy class', '5800'),
('Spice Jet', 'SG649', 'SPICE JET', 'Surat', 'Mumbai', '06:55', '2019-10-26', '', '', 'Economy class', '5500'),
('Spice Jet', 'SG650', 'SPICE JET', 'Surat', 'Mumbai', '13:20', '2019-10-26', '', '', 'Economy class', '5999'),
('Spice Jet', 'SG651', 'SPICE JET', 'Surat', 'Mumbai', '18:55', '2019-10-26', '', '', 'Economy class', '6200'),
('Spice Jet', 'SG652', 'SPICE JET', 'Surat', 'Mumbai', '22:45', '2019-10-26', '', '', 'Business class', '12000'),
('Spice Jet', 'SG659', 'SPICE JET', 'Delhi', 'Mumbai', '10:55', '2019-10-27', '', '', 'Business class', '13000'),
('Spice Jet', 'SG9965', 'SPICE JET', 'Mumbai', 'Delhi', '12:00', '2019-10-27', '', '', 'Business class', '14999');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `email_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`email_id`, `name`, `image`) VALUES
('utsav.haveliwala@gmail.com', 'Utsav Haveliwala', 'Utsav Haveliwala.jpeg'),
('naitik.vajani@gmail.com', 'Naitik Vajani', 'Naitik Vajani.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `passport`
--

CREATE TABLE `passport` (
  `Passport_Id` varchar(8) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Age` int(3) NOT NULL,
  `Sex` varchar(5) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Nationality` varchar(50) NOT NULL,
  PRIMARY KEY  (`Passport_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passport`
--

INSERT INTO `passport` (`Passport_Id`, `Name`, `Age`, `Sex`, `Address`, `Nationality`) VALUES
('A1204199', 'Abhishek Jariwala', 21, 'Male', 'Bhagal, Surat', 'Indian'),
('J2801199', 'Jay Patel', 22, 'Male', 'Amroli, Surat', 'Indian'),
('K2004199', 'Kartik Fruitwala', 21, 'Male', 'Bhagal, Surat', 'Indian'),
('N2308199', 'Naitik Vajani', 22, 'Male', 'Surat', 'Indian'),
('P0212202', 'Pravin Rathod', 21, 'Male', 'Parvat Patia, Surat', 'Indian'),
('R0803199', 'Rahul Gandhi', 21, 'Male', '21/438, GH Board', 'Indian'),
('U1508199', 'Utsav Haveliwala', 22, 'Male', 'Shantinagar Soc, Adajan, Surat', 'Indian'),
('U2609199', 'Unnati Shah', 35, 'Femal', 'Adajan, Surat', 'Indian'),
('V1912198', 'Vishruti Desai', 35, 'Femal', 'Adajan, Surat', 'Indian'),
('Y1604199', 'Yashesh Pandya', 22, 'Male', 'Kasturba Soc, Adajan, Surat', 'Indian');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `Email` varchar(30) NOT NULL default '',
  `Password` varchar(20) default NULL,
  `ContactNo` varchar(10) default NULL,
  `Address` varchar(30) default NULL,
  PRIMARY KEY  (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`Email`, `Password`, `ContactNo`, `Address`) VALUES
('abhishek.jariwala@gmail.com', 'Abhishek@1234', '8755425365', 'G3, Nagardas ni sheri, Surat.'),
('carryminati@gmail.com', 'Carry@69', '6969886969', 'A-101, Opp. SBi, Kanpur.'),
('dynamo.gaming@gmail.com', 'Pattseheadshot', '7874000000', 'Lokhandwala Complex, Mumbai'),
('gaurav.taneja@gmail.com', 'Fayingbeast@1234', '9909022333', '36, Ambaji Soc.2, Kanpur.'),
('jethalal.gada@gmail.com', 'Jetho@1234', '8855566633', 'Flat 202, Gokuldham Soc, Flim '),
('kartik.fruitwala@gmail.com', 'Kartik@1234', '9200357866', 'C-202, Vasupujya Complex, Amba'),
('naitik.vajani@gmail.com', 'Naitik@1234', '4561234566', '28/kung vihar'),
('pravin.rathod@gmail.com', 'Pravin@1234', '7874536200', 'F-69, Parvat Patiya, Surat.'),
('rahulrgandhi@gmail.com', 'Rahul@1234', '9856333322', 'A-301, Sai Tenaments, Surat.'),
('rajivrgandhi@gmail.com', 'Rajiv@1234', '7874526969', 'A-69, Near Sai Tenament, Surat'),
('rawknee@gmail.com', 'Rawknee@1234', '8775522333', '55/B, Kalyan, Mumbai.'),
('soniya.gandhi@gmail.com', 'Soniya@1234', '9856222214', '300, Opp. Sai Tenament, Surat.'),
('utsav.haveliwala@gmail.com', 'Utsav@1234', '9903216333', 'Shantinagar Soc.-2, Adajan, Su'),
('yashesh.pandya@gmail.com', 'Yashesh@1234', '7575046336', 'Kasturba Soc., Tadwadi, Surat.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`Passport_Id`) REFERENCES `passport` (`Passport_Id`);

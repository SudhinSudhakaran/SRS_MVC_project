-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 07:47 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stude_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `faddress` varchar(100) NOT NULL,
  `fdept` varchar(20) NOT NULL,
  `femail` varchar(50) NOT NULL,
  `fmobile` bigint(20) NOT NULL,
  `fdob` date NOT NULL,
  `fgender` varchar(10) NOT NULL,
  `fpassword` varchar(50) NOT NULL,
  `fstatus` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`, `faddress`, `fdept`, `femail`, `fmobile`, `fdob`, `fgender`, `fpassword`, `fstatus`) VALUES
(1, 'Susu', 'Idukki', 'Computer Science', 'susu@gmail.com', 9876543210, '2020-01-08', 'male', 'susu', 'approved'),
(2, 'Sudhin Sudhakaran', 'kattappana', 'Computer Science', 'sudhinsudhakaran@gmail.com', 9605399543, '1996-12-11', 'male', 'sudhin', 'approved'),
(3, 'gana', 'kannur', 'History', 'gana@gmail.com', 987456859, '2020-01-08', 'female', 'gana', 'approved'),
(4, 'Albin ', 'kattappana', 'commerce', 'albin@gmail.com', 9999999988, '2017-11-08', 'male', 'albin', 'approved'),
(5, '123456', '', '', '', 0, '0000-00-00', '', '', 'pending'),
(6, '123456', '', '', '', 0, '0000-00-00', '', '', 'pending'),
(7, '123456', '', '', '', 0, '0000-00-00', '', '', 'pending'),
(8, '123456', '', '', '', 0, '0000-00-00', '', '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `nid` int(11) NOT NULL,
  `author` varchar(30) NOT NULL,
  `dept_name` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`nid`, `author`, `dept_name`, `title`, `sdate`, `edate`, `description`) VALUES
(1, 'Faculty', 'Computer Science', 'Checkijfpf', '2020-01-31', '2020-02-12', 'This is for check the connection.....sdf'),
(2, 'Head of the Institution', 'faculty', 'Check2', '2020-01-15', '2020-01-18', 'check2'),
(3, 'Head of the Institution', 'facultys', 'Anual day', '2020-01-08', '2020-01-13', 'iholislz');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sid` int(11) NOT NULL,
  `dept_name` varchar(20) NOT NULL,
  `dept_sem` varchar(20) NOT NULL,
  `sub1` varchar(20) NOT NULL,
  `sub2` varchar(2) NOT NULL,
  `sub3` varchar(20) NOT NULL,
  `sub4` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sid`, `dept_name`, `dept_sem`, `sub1`, `sub2`, `sub3`, `sub4`) VALUES
(1, 'Computer Science', '1', 'Java', 'C ', 'C++', 'Soft Skill'),
(2, 'Commerce', '1', 'accounting', 'St', 'Buissness Management', 'Tourism'),
(3, 'Computer Science', '2', 'js', 'da', 'hiofh', 'ksdnhlw');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `sreg_no` varchar(10) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `saddress` varchar(100) NOT NULL,
  `smail` varchar(50) NOT NULL,
  `smobile` bigint(20) NOT NULL,
  `sdob` date NOT NULL,
  `sgender` varchar(10) NOT NULL,
  `sdept` varchar(20) NOT NULL,
  `spassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sreg_no`, `sname`, `saddress`, `smail`, `smobile`, `sdob`, `sgender`, `sdept`, `spassword`) VALUES
(1, '1001', 'Jebin', 'Pathanamthitta', 'jebin@gmail.com', 556622332323, '2019-12-31', 'male', 'Computer Science', 'jebin'),
(5, '1002', 'albin', 'idukki', 'albin@gmail.com', 9876543210, '2019-12-30', 'male', 'Computer Science', 'albin');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `tid` int(11) NOT NULL,
  `dept_name` varchar(30) NOT NULL,
  `semester_no` varchar(30) NOT NULL,
  `day` varchar(20) NOT NULL,
  `hour1` varchar(20) NOT NULL,
  `hour2` varchar(20) NOT NULL,
  `hour3` varchar(20) NOT NULL,
  `hour4` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`tid`, `dept_name`, `semester_no`, `day`, `hour1`, `hour2`, `hour3`, `hour4`) VALUES
(1, 'Computer Science', 'Semester 1', 'Mon day', 'Java', 'C', 'C++', 'Soft skill'),
(2, 'Computer Science', 'Semester 1', 'Tues day', 'C', 'C++', 'Java', 'Soft skill');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

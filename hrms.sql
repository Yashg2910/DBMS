-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 03:06 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin@admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(20) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `dept_manager` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `dept_manager`) VALUES
(1, 'Technical', 1),
(3, 'Finance', 2),
(4, 'Marketing', 3);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(255) NOT NULL,
  `e_fname` varchar(50) NOT NULL,
  `e_lname` varchar(50) NOT NULL,
  `e_bdate` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dept_id` int(20) NOT NULL,
  `Doj` date NOT NULL,
  `present_address` varchar(100) NOT NULL,
  `permanent_address` varchar(100) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `reporting_manager` int(255) NOT NULL,
  `location` varchar(50) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `ctc` varchar(20) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `e_fname`, `e_lname`, `e_bdate`, `username`, `password`, `dept_id`, `Doj`, `present_address`, `permanent_address`, `gender`, `blood_group`, `marital_status`, `mobile`, `designation`, `reporting_manager`, `location`, `account_number`, `ctc`, `image_url`, `email`) VALUES
(1, 'Yash', 'Sharma', '1998-10-29', 'Ayush@employee', 'Ayush_1', 1, '0000-00-00', '109, Silver Springs, Pune', '23, Anand nagar, Indore', '', 'B+', 'Unmarried', '8109702763', 'Software Engineer', 1, '', '', '', '', 'Ayushgupta@gmail.com'),
(2, 'Yash', 'Gupta', '1997-09-05', 'Yash@employee', 'Yash_2', 3, '0000-00-00', '403, Cauvery Nilaya Apartments, Vinayaka Nagar, Bangalore', '23, Anand Nagar , Indore', 'M', 'o+', 'Unmarried', '8109702763', 'Technical Head', 2, 'Bangalore', '111222333444', '1000000', '', 'yash@gmail.com'),
(4, 'Kshitiz', 'Pandey', '1998-10-29', 'kshitiz@employee', 'kshitiz_employee', 1, '2018-06-10', '', '', '', '', '', '', '', 1, '', '', '', '', ''),
(14, 'Abhi', 'Singh', '1998-04-02', 'abhi@employee', 'abhi_employee', 1, '2018-07-07', '', '', '', '', '', '', '', 1, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_offers`
--

CREATE TABLE `jobs_offers` (
  `job_id` int(2) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `dept_id` int(255) NOT NULL,
  `job_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs_offers`
--

INSERT INTO `jobs_offers` (`job_id`, `job_title`, `dept_id`, `job_description`) VALUES
(1, 'Software Engineer', 1, 'Job Description:\r\nCTC- 10 LPA\r\nSkills required: Java, C++, Python Frameworks.\r\n'),
(4, 'Marketing Intern', 4, 'Marketing Intern.\r\nCTC- 8000/month\r\n'),
(7, 'Finance Intern', 3, ' aksdbkab'),
(13, 'Finance Employee', 3, 'Finance Intern. Staring salary 10000/month'),
(15, 'Finance Employee', 3, 'Finance Intern. Staring salary 10000/month'),
(16, 'xyz', 4, 'kadbj ');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `application_id` int(10) NOT NULL,
  `job_id` int(3) NOT NULL,
  `applicant_fname` varchar(20) NOT NULL,
  `applicant_lname` varchar(20) NOT NULL,
  `applicant_email` varchar(50) NOT NULL,
  `application_date` date NOT NULL,
  `application_status` varchar(20) NOT NULL DEFAULT 'NIL',
  `resume` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`application_id`, `job_id`, `applicant_fname`, `applicant_lname`, `applicant_email`, `application_date`, `application_status`, `resume`) VALUES
(19, 1, 'Keshav', 'Rathi', 'yashg2910@outlook.com', '2018-11-26', 'Accepted', 'documents/keshav_resume.pdf'),
(20, 1, 'Poo', 'Ked', 'pujakedia111@gmail.com', '2018-11-26', 'Accepted', 'documents/puja_resume.pdf'),
(21, 13, 'Vishal', 'B', 'yashg2910@outlook.com', '2018-11-26', 'Accepted', 'documents/resumt_vishal.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `l_id` int(255) NOT NULL,
  `e_id` int(255) NOT NULL,
  `m_id` int(255) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'NIL'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`l_id`, `e_id`, `m_id`, `reason`, `start_date`, `end_date`, `status`) VALUES
(1, 4, 1, 'nnlnljvjgh', '2018-11-17', '2018-11-22', 'Accepted'),
(2, 4, 1, 'I am ill', '0000-00-00', '0000-00-00', 'Rejected'),
(3, 1, 1, 'Sick Leave- Grand Mom', '2018-11-17', '2018-11-20', 'Accepted'),
(5, 1, 1, 'Sick leave', '2018-11-22', '2018-11-24', 'Rejected'),
(6, 1, 1, 'Holiday', '2018-11-17', '2018-11-24', 'Accepted'),
(7, 1, 1, 'badkbkbc', '2018-11-17', '2018-11-20', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `m_id` int(255) NOT NULL,
  `m_username` varchar(20) NOT NULL,
  `m_password` varchar(20) NOT NULL,
  `m_fname` varchar(20) NOT NULL,
  `m_lname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`m_id`, `m_username`, `m_password`, `m_fname`, `m_lname`) VALUES
(1, 'ayush@manager', 'ayush_manager', 'Ayush', 'Sharma'),
(2, 'yash@manager', 'yash_manager', 'Yash', 'Gupta'),
(3, 'hrishi@manager', 'hrishi_manager', 'Hrishi', 'Verma');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `dept_manager` (`dept_manager`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `employee_ibfk_2` (`reporting_manager`);

--
-- Indexes for table `jobs_offers`
--
ALTER TABLE `jobs_offers`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `e_id` (`e_id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobs_offers`
--
ALTER TABLE `jobs_offers`
  MODIFY `job_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `application_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `l_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`dept_manager`) REFERENCES `manager` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`reporting_manager`) REFERENCES `manager` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs_offers`
--
ALTER TABLE `jobs_offers`
  ADD CONSTRAINT `jobs_offers_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs_offers` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `employee` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leaves_ibfk_2` FOREIGN KEY (`m_id`) REFERENCES `manager` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

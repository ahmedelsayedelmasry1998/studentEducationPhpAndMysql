-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 06:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studenteducation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `fName` varchar(200) DEFAULT NULL,
  `lName` varchar(200) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tutionId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `fName`, `lName`, `address`, `email`, `phone`, `password`, `tutionId`) VALUES
(1, 'Ahmed', 'Elmasry', 'Alex', 'www.ahmed@gmail.com', '01064907346', '12345', 1),
(2, 'Mohamed', 'Elmasry', 'Cairo', 'www.mohamed@gmail.com', '01064907346', '54321', 2),
(5, 'Mohamed', 'Elmasry', 'Cairo', 'www.ahmed@gmail.com', '01064907346', '12345', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendence`
--

CREATE TABLE `tbl_attendence` (
  `attendenceId` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `attendence` int(1) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `tutionId` int(11) DEFAULT NULL,
  `studentId` int(11) DEFAULT NULL,
  `attendenceActive` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_attendence`
--

INSERT INTO `tbl_attendence` (`attendenceId`, `date`, `attendence`, `type`, `tutionId`, `studentId`, `attendenceActive`) VALUES
(1, '2024-09-06', 0, 'student', 1, 23, 1),
(2, '2024-09-25', 1, 'staff', 1, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branchId` int(11) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `tutionId` int(11) DEFAULT NULL,
  `branchActive` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branchId`, `address`, `state`, `city`, `phone`, `tutionId`, `branchActive`) VALUES
(1, 'Cairo,eg', 'Gujarat', 'Cairo,eg', '01025425852', 1, 1),
(3, 'Cairo', 'Rajasthan', 'Cairo', '01025478524', 1, 1),
(4, 'Cairo', 'Rajasthan', 'Cairo', '01025478544', 1, 1),
(5, 'Cairo', 'Maharashtra', 'Cairo', '010254888524', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `courseId` int(11) NOT NULL,
  `shortName` varchar(200) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`courseId`, `shortName`, `name`) VALUES
(1, 'jkg', 'Jr. Kg.'),
(2, 'skg', 'Sr. Kg.'),
(3, '1', 'STD 1'),
(4, '2', 'STD 2'),
(5, '3', 'STD 3'),
(6, '4', 'STD 4'),
(7, '5', 'STD 5'),
(8, '6', 'STD 6'),
(9, '7', 'STD 7'),
(10, '8', 'STD 8'),
(11, '9', 'STD 9'),
(12, '10', 'STD 10'),
(13, '11 com', 'STD 11(COMM)'),
(14, '12 com', 'STD 12(COMM)'),
(15, '11 sci', 'STD 11(SCI)'),
(16, '12 sci', 'STD 12(SCI)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenses`
--

CREATE TABLE `tbl_expenses` (
  `expensesId` int(11) NOT NULL,
  `expenses` varchar(250) DEFAULT NULL,
  `amt` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `remark` varchar(250) DEFAULT NULL,
  `branchId` int(11) DEFAULT NULL,
  `tutionId` int(11) DEFAULT NULL,
  `expensesActive` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_expenses`
--

INSERT INTO `tbl_expenses` (`expensesId`, `expenses`, `amt`, `date`, `remark`, `branchId`, `tutionId`, `expensesActive`) VALUES
(2, 'Wages', 21000, NULL, '1000', 1, 1, 1),
(3, 'Wages updated', 50000, NULL, '5000', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fees`
--

CREATE TABLE `tbl_fees` (
  `feesId` int(11) NOT NULL,
  `amt` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `tutionId` int(11) DEFAULT NULL,
  `studentId` int(11) DEFAULT NULL,
  `branchId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_fees`
--

INSERT INTO `tbl_fees` (`feesId`, `amt`, `date`, `tutionId`, `studentId`, `branchId`) VALUES
(1, 542, '2024-09-06', 1, 22, 1),
(2, 544, '2024-09-06', 1, 24, 3),
(3, 547, '2024-09-06', 1, 24, 3),
(4, 877, '2024-09-05', 1, 24, 4),
(5, 854, '2024-09-05', 1, 22, 3),
(6, 8754, '2024-09-12', 1, 24, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marks`
--

CREATE TABLE `tbl_marks` (
  `marksId` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `eng1` int(3) DEFAULT NULL,
  `gramer` int(3) DEFAULT NULL,
  `maths` int(3) DEFAULT NULL,
  `sci` int(3) DEFAULT NULL,
  `ss` int(3) DEFAULT NULL,
  `env` int(3) DEFAULT NULL,
  `gk` int(3) DEFAULT NULL,
  `hindi` int(3) DEFAULT NULL,
  `sanskrit` int(3) DEFAULT NULL,
  `computer` int(3) DEFAULT NULL,
  `eco` int(3) DEFAULT NULL,
  `oc` int(3) DEFAULT NULL,
  `ac` int(3) DEFAULT NULL,
  `guj` int(3) DEFAULT NULL,
  `bio` int(3) DEFAULT NULL,
  `studentId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_marks`
--

INSERT INTO `tbl_marks` (`marksId`, `date`, `eng1`, `gramer`, `maths`, `sci`, `ss`, `env`, `gk`, `hindi`, `sanskrit`, `computer`, `eco`, `oc`, `ac`, `guj`, `bio`, `studentId`) VALUES
(1, '2024-09-17', 52, 55, 99, 45, 85, 75, 95, 88, NULL, 77, NULL, NULL, NULL, 85, NULL, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notice`
--

CREATE TABLE `tbl_notice` (
  `noticeId` int(11) NOT NULL,
  `noticeHead` varchar(250) DEFAULT NULL,
  `noticeBody` varchar(250) DEFAULT NULL,
  `recipient` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `tutionId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_notice`
--

INSERT INTO `tbl_notice` (`noticeId`, `noticeHead`, `noticeBody`, `recipient`, `date`, `time`, `tutionId`) VALUES
(2, 'Notice 1', 'This Is Notice One', 'on', '0000-00-00', '00:00:06', 1),
(3, 'Notice 2', 'This iS nOTICE tWO', 'all', '2024-09-30', '06:29:47', 1),
(4, 'Notice 3', 'This iS nOTICE tHREE', 'studient', '2024-09-30', '06:30:25', 1),
(5, 'Notice 4', 'This iS nOTICE fOUR', 'staff', '2024-09-30', '06:30:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary`
--

CREATE TABLE `tbl_salary` (
  `salaryId` int(11) NOT NULL,
  `amt` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `tutionId` int(11) DEFAULT NULL,
  `staffId` int(11) DEFAULT NULL,
  `branchId` int(11) DEFAULT NULL,
  `total` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_salary`
--

INSERT INTO `tbl_salary` (`salaryId`, `amt`, `date`, `tutionId`, `staffId`, `branchId`, `total`) VALUES
(1, 1234, '2020-09-01', 1, 2, 3, 9876),
(2, 542, '2023-09-01', 1, 2, 3, 1254),
(3, 8754, '2024-09-06', 1, 2, 3, 124);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staffId` int(11) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `middleName` varchar(250) DEFAULT NULL,
  `sex` varchar(250) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `qualifaction` varchar(200) DEFAULT NULL,
  `totalSalary` int(11) DEFAULT NULL,
  `paidSalary` int(11) DEFAULT NULL,
  `exp` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `tutionId` int(11) DEFAULT NULL,
  `branchId` int(11) DEFAULT NULL,
  `staffActive` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staffId`, `photo`, `name`, `middleName`, `sex`, `phone`, `email`, `password`, `qualifaction`, `totalSalary`, `paidSalary`, `exp`, `address`, `state`, `city`, `type`, `tutionId`, `branchId`, `staffActive`) VALUES
(2, '../upload_files/teacher.jpg', 'Noha elsayed', 'Zalaka', 'female', '01245555588', 'bhabishyaghimire88@gmail.com', '12345', 'Good', 5000, 500, '11-11-2020', 'Cairo', 'Maried', 'Cairo', 'Manager', 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `studentId` int(11) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `fatherName` varchar(250) DEFAULT NULL,
  `matherName` varchar(250) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `std` varchar(150) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `totalFees` int(11) DEFAULT NULL,
  `paidFees` int(11) DEFAULT NULL,
  `tutionId` int(11) DEFAULT NULL,
  `branchId` int(11) DEFAULT NULL,
  `studentActive` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`studentId`, `photo`, `name`, `fatherName`, `matherName`, `sex`, `dob`, `phone`, `email`, `password`, `std`, `address`, `state`, `city`, `totalFees`, `paidFees`, `tutionId`, `branchId`, `studentActive`) VALUES
(16, '../upload_files/admin_avatar_png.png', 'Ahmed Elmasry', 'Elmasry', 'Kadiygaa', 'male', NULL, '01245555599', 'www.ahmed@gmail.com', '12345', '123', 'Cairo', 'Maried', 'Cairo,eg', 54321, 1234, 1, 4, 0),
(17, '../upload_files/bussinessman.jpg', 'Mohamed Elmasry', 'Elmasry', 'Kadiygaa', 'male', NULL, '01064907346', 'www.ahmed@gmail.com', '54321', '123', 'Cairo', ' Not Maried', 'alex', 75842, 456, 1, 5, 0),
(18, '../upload_files/stud_login.png', 'Ahmed Elmasry', 'Elmasry', 'Kadiygaa', 'male', NULL, '01064907353', 'www.ahmed@gmail.com', '12345', '123', 'Alex', 'Maried', 'Cairo', 54321, 1234, 1, 5, 0),
(19, '../upload_files/abc.jpg', 'Ahmed Elmasry', 'Elmasry', 'Kadiygaa', 'male', NULL, '01064907353', 'www.ahmed@gmail.com', '12345', '123', 'Cairo', 'Maried', 'Cairo,eg', 54321, 123, 1, 3, 0),
(20, '../upload_files/admin_avatar_png.png', 'Ahmed Elmasry', 'Elmasry', 'Kadiygaa', 'male', NULL, '01064907353', 'www.ahmed@gmail.com', '12345', '123', 'Alex', 'Maried', 'Cairo,eg', 54321, 123, 1, 4, 0),
(21, '../upload_files/VisualsStock_AK59052.jpg', 'Ahmed Elmasry', 'Elmasry', 'Kadiygaa', 'male', NULL, '01245555555', 'www.ahmed@gmail.com', '123456789', '123', 'Cairo', 'Maried', 'Cairo', 54321, 123, 1, 4, 0),
(22, '../upload_files/desk.jpg', 'Ahmed Elmasry', 'Elmasry', 'Kadiygaa', 'male', NULL, '01245555566', 'www.ahmed@gmail.com', '123456', '123', 'Alex', 'Maried', 'Cairo', 54321, 1234, 1, 1, 0),
(23, '../upload_files/admin_avatar_png.png', 'Ahmed Elmasry', 'Elmasry', 'Kadiygaa', 'male', NULL, '01064907353', 'www.ahmed@gmail.com', '12345', '123', 'Cairo', ' Not Maried', 'Cairo', 54321, 1234, 1, 4, 1),
(24, '../upload_files/working_on_this2.jpg', 'Mohamed Elmasry', 'Elmasry', 'Kadiygaa', 'male', NULL, '01245555599', 'www.ahmed@gmail.com', '54321', '123', 'Alex', 'Maried', 'alex', 789654, 12345, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tution`
--

CREATE TABLE `tbl_tution` (
  `tutionId` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `tageLine` varchar(200) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `courses` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tution`
--

INSERT INTO `tbl_tution` (`tutionId`, `name`, `tageLine`, `address`, `state`, `city`, `logo`, `email`, `phone`, `url`, `courses`) VALUES
(1, 'class Ahmed', 'class Ahmed', 'Cairo', 'Maried', NULL, NULL, 'www.ahmed@gmail.com', '01064907346', 'http://www.company.com:81/a/b/c.html?user=Alice&year=2008#p2', 'std10'),
(2, 'class 1', 'class 1', 'Cairo', ' Not Maried', NULL, NULL, NULL, '01064907346', 'http://www.company.com:81/a/b/c.html?user=Alice&year=2008#p2', 'std6'),
(5, 'class 1', 'class 1', 'Cairo', 'Maried', NULL, NULL, NULL, '01064907346', 'http://www.company.com:81/a/b/c.html?user=Alice&year=2008#p2', 'std9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`),
  ADD KEY `admin_tution` (`tutionId`);

--
-- Indexes for table `tbl_attendence`
--
ALTER TABLE `tbl_attendence`
  ADD PRIMARY KEY (`attendenceId`),
  ADD KEY `attendense_tution` (`tutionId`),
  ADD KEY `attendense_student` (`studentId`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branchId`),
  ADD KEY `branch_tution` (`tutionId`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`expensesId`),
  ADD KEY `expenses_branch` (`branchId`),
  ADD KEY `expenses_tution` (`tutionId`);

--
-- Indexes for table `tbl_fees`
--
ALTER TABLE `tbl_fees`
  ADD PRIMARY KEY (`feesId`),
  ADD KEY `fees_tution` (`tutionId`),
  ADD KEY `fees_student` (`studentId`),
  ADD KEY `fees_branch` (`branchId`);

--
-- Indexes for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  ADD PRIMARY KEY (`marksId`),
  ADD KEY `marks_student` (`studentId`);

--
-- Indexes for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  ADD PRIMARY KEY (`noticeId`),
  ADD KEY `notice_tution` (`tutionId`);

--
-- Indexes for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  ADD PRIMARY KEY (`salaryId`),
  ADD KEY `salary_tution` (`tutionId`),
  ADD KEY `salary_staff` (`staffId`),
  ADD KEY `salary_branch` (`branchId`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staffId`),
  ADD KEY `staff_tution` (`tutionId`),
  ADD KEY `staff_branch` (`branchId`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`studentId`),
  ADD KEY `student_tution` (`tutionId`),
  ADD KEY `student_branch` (`branchId`);

--
-- Indexes for table `tbl_tution`
--
ALTER TABLE `tbl_tution`
  ADD PRIMARY KEY (`tutionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_attendence`
--
ALTER TABLE `tbl_attendence`
  MODIFY `attendenceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `expensesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_fees`
--
ALTER TABLE `tbl_fees`
  MODIFY `feesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  MODIFY `marksId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  MODIFY `noticeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  MODIFY `salaryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_tution`
--
ALTER TABLE `tbl_tution`
  MODIFY `tutionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `admin_tution` FOREIGN KEY (`tutionId`) REFERENCES `tbl_tution` (`tutionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_attendence`
--
ALTER TABLE `tbl_attendence`
  ADD CONSTRAINT `attendense_student` FOREIGN KEY (`studentId`) REFERENCES `tbl_student` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendense_tution` FOREIGN KEY (`tutionId`) REFERENCES `tbl_tution` (`tutionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD CONSTRAINT `branch_tution` FOREIGN KEY (`tutionId`) REFERENCES `tbl_tution` (`tutionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD CONSTRAINT `expenses_branch` FOREIGN KEY (`branchId`) REFERENCES `tbl_branch` (`branchId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expenses_tution` FOREIGN KEY (`tutionId`) REFERENCES `tbl_tution` (`tutionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_fees`
--
ALTER TABLE `tbl_fees`
  ADD CONSTRAINT `fees_branch` FOREIGN KEY (`branchId`) REFERENCES `tbl_branch` (`branchId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fees_student` FOREIGN KEY (`studentId`) REFERENCES `tbl_student` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fees_tution` FOREIGN KEY (`tutionId`) REFERENCES `tbl_tution` (`tutionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  ADD CONSTRAINT `marks_student` FOREIGN KEY (`studentId`) REFERENCES `tbl_student` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  ADD CONSTRAINT `notice_tution` FOREIGN KEY (`tutionId`) REFERENCES `tbl_tution` (`tutionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  ADD CONSTRAINT `salary_branch` FOREIGN KEY (`branchId`) REFERENCES `tbl_branch` (`branchId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salary_staff` FOREIGN KEY (`staffId`) REFERENCES `tbl_staff` (`staffId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salary_tution` FOREIGN KEY (`tutionId`) REFERENCES `tbl_tution` (`tutionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD CONSTRAINT `staff_branch` FOREIGN KEY (`branchId`) REFERENCES `tbl_branch` (`branchId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_tution` FOREIGN KEY (`tutionId`) REFERENCES `tbl_tution` (`tutionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `student_branch` FOREIGN KEY (`branchId`) REFERENCES `tbl_branch` (`branchId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_tution` FOREIGN KEY (`tutionId`) REFERENCES `tbl_tution` (`tutionId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

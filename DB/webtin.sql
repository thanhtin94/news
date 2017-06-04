-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2017 at 01:07 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webtin`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE IF NOT EXISTS `binhluan` (
  `Mabinhluan` int(11) NOT NULL AUTO_INCREMENT,
  `Mauser` int(11) DEFAULT NULL,
  `Matin` int(11) DEFAULT NULL,
  `Hoten` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Noidung` text,
  `Ngaybinhluan` date DEFAULT NULL,
  `Trangthai` int(11) DEFAULT NULL,
  PRIMARY KEY (`Mabinhluan`),
  KEY `Mauser` (`Mauser`,`Matin`),
  KEY `Matin` (`Matin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`Mabinhluan`, `Mauser`, `Matin`, `Hoten`, `Email`, `Noidung`, `Ngaybinhluan`, `Trangthai`) VALUES
(1, 1, 22, 'adasda', 'ádsadadasd', 'adasdasdasd', '2017-05-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE IF NOT EXISTS `chucvu` (
  `Machucvu` int(11) NOT NULL DEFAULT '0',
  `Tenchucvu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Machucvu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`Machucvu`, `Tenchucvu`) VALUES
(0, 'User'),
(1, 'Tổng Biên'),
(2, 'Quản Trị Bình Luận'),
(3, 'Tác Giả');

-- --------------------------------------------------------

--
-- Table structure for table `loaitin`
--

CREATE TABLE IF NOT EXISTS `loaitin` (
  `Maloaitin` int(11) NOT NULL DEFAULT '0',
  `Manhomtin` int(11) DEFAULT NULL,
  `Tenloaitin` varchar(255) DEFAULT NULL,
  `Trangthai` int(11) DEFAULT NULL,
  PRIMARY KEY (`Maloaitin`),
  KEY `Manhomtin` (`Manhomtin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaitin`
--

INSERT INTO `loaitin` (`Maloaitin`, `Manhomtin`, `Tenloaitin`, `Trangthai`) VALUES
(1, 1, 'Đời Sống', 0),
(2, 1, 'Đô Thị', NULL),
(3, 1, 'Giao Thông', NULL),
(4, 2, 'Phân Tích', NULL),
(5, 2, 'Người Việt 4 Phương', NULL),
(6, 3, 'Tài Chính', NULL),
(7, 3, 'Chứng Khoáng', NULL),
(8, 3, 'Bất Động Sản', NULL),
(9, 3, 'Doanh Nhân', NULL),
(10, 4, 'Pháp Đình', NULL),
(11, 4, 'Vụ Án', NULL),
(12, 5, 'Thể Thao Việt Nam', NULL),
(13, 5, 'Thể Thao Thế Giới', NULL),
(14, 6, 'Tin Công Nghệ', NULL),
(15, 6, 'Mobile - Tablet', NULL),
(16, 6, 'Ứng Dụng Di Động', NULL),
(17, 7, 'Âm Nhạc', NULL),
(18, 7, 'Phim Ảnh', NULL),
(19, 8, 'Mặc Đẹp', NULL),
(20, 8, 'Làm Đẹp', NULL),
(22, 9, 'Du Học', NULL),
(23, 10, 'Gương Mặt Trẻ', NULL),
(24, 10, 'Công Đồng Mạng', NULL),
(25, 11, 'Khỏe Đẹp', NULL),
(26, 11, 'Dinh Dưỡng', NULL),
(27, 11, 'Mẹ Và Bé', NULL),
(28, 11, 'Bệnh Thường Gặp', NULL),
(29, 12, 'Địa Điểm Du Lịch', 0),
(30, 12, 'Kinh Nghiệm Du Lịch', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nhomtin`
--

CREATE TABLE IF NOT EXISTS `nhomtin` (
  `Manhomtin` int(11) NOT NULL DEFAULT '0',
  `Tennhomtin` varchar(255) DEFAULT NULL,
  `Trangthai` int(11) DEFAULT NULL,
  PRIMARY KEY (`Manhomtin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhomtin`
--

INSERT INTO `nhomtin` (`Manhomtin`, `Tennhomtin`, `Trangthai`) VALUES
(1, 'Thời Sự ', 0),
(2, 'Thế Giới', 0),
(3, 'Kinh Doanh', 0),
(4, 'Pháp Luật', 0),
(5, 'Thể Thao', 0),
(6, 'Công Nghệ', 0),
(7, 'Giải Trí', 0),
(8, 'Thời Trang', 0),
(9, 'Giáo Dục', 0),
(10, 'Sống Trẻ', 0),
(11, 'Sức Khỏe', 0),
(12, 'Du Lịch', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tin`
--

CREATE TABLE IF NOT EXISTS `tin` (
  `Matin` int(11) NOT NULL AUTO_INCREMENT,
  `Maloaitin` int(11) DEFAULT NULL,
  `Tieude` varchar(255) DEFAULT NULL,
  `Tomtat` text,
  `Noidung` text,
  `Ngay` date NOT NULL,
  `Solanxem` int(11) NOT NULL,
  `Tacgia` varchar(255) DEFAULT NULL,
  `Trangthai` int(11) DEFAULT NULL,
  PRIMARY KEY (`Matin`),
  KEY `Maloaitin` (`Maloaitin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tin`
--

INSERT INTO `tin` (`Matin`, `Maloaitin`, `Tieude`, `Tomtat`, `Noidung`, `Ngay`, `Solanxem`, `Tacgia`, `Trangthai`) VALUES
(1, 10, '123321123123321', '12323asdasdsad', 'asfasdsacgsdvfplcjrqpwomjpoemopfewvmcismfjp,wo;eimfkpwoc', '0000-00-00', 0, 'Thạnh', 1),
(22, 30, 'abcde', 'qwertyuiopasdfghjklzxcvbnm', 'qazwsxedcrfvtgbyhnujmikolpplokmijnuhbygvtfcrdxeszwaq', '0000-00-00', 0, 'Tín', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Mauser` int(11) NOT NULL AUTO_INCREMENT,
  `Machucvu` int(11) DEFAULT NULL,
  `Tentaikhoan` varchar(255) DEFAULT NULL,
  `Matkhau` varchar(255) DEFAULT NULL,
  `Hoten` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Ngaysinh` date DEFAULT NULL,
  `Gioitinh` int(11) DEFAULT NULL,
  `Ttlamviec` int(11) DEFAULT NULL,
  `Trangthai` int(11) DEFAULT NULL,
  PRIMARY KEY (`Mauser`),
  KEY `Machucvu` (`Machucvu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Mauser`, `Machucvu`, `Tentaikhoan`, `Matkhau`, `Hoten`, `Email`, `Ngaysinh`, `Gioitinh`, `Ttlamviec`, `Trangthai`) VALUES
(1, 1, 'admin', '4297f44b13955235245b2497399d7a93', 'Thạnh', 'admin@gmail.com', '2017-05-08', 2, 1, 1),
(2, 2, 'admin2', '4297f44b13955235245b2497399d7a93', 'Tín', 'admin2@gmail.com', '2017-05-03', 1, 0, 0),
(3, 2, 'admin3', '4297f44b13955235245b2497399d7a93', 'Tính', 'admin3@gmail.com', '2017-05-03', 2, 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `tin_binhluan` FOREIGN KEY (`Matin`) REFERENCES `tin` (`Matin`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_binhluan` FOREIGN KEY (`Mauser`) REFERENCES `user` (`Mauser`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `loaitin`
--
ALTER TABLE `loaitin`
  ADD CONSTRAINT `nhomtin_loaitin` FOREIGN KEY (`Manhomtin`) REFERENCES `nhomtin` (`Manhomtin`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tin`
--
ALTER TABLE `tin`
  ADD CONSTRAINT `loaitin_tin` FOREIGN KEY (`Maloaitin`) REFERENCES `loaitin` (`Maloaitin`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `chucvu_user` FOREIGN KEY (`Machucvu`) REFERENCES `chucvu` (`Machucvu`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 01:12 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simple_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `postID` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL,
  `komentar` varchar(500) NOT NULL,
  KEY `postID` (`postID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`postID`, `nama`, `email`, `tanggal`, `komentar`) VALUES
(1, 'Dumadi', 'dumadi@gmail.com', '2014-10-14 03:50:08', 'Pusing juga yak'),
(1, 'Hendro', 'wawaw@ciwawa.com', '2014-10-14 03:50:41', 'Masa sih, wadul ah'),
(1, 'Dumadi', 'dumadi@gmail.com', '2014-10-14 03:51:43', 'Iya dro, maneh teu percaya?'),
(1, 'Hendro', 'hendro@gmail.com', '2014-10-14 07:38:57', 'AHAHAHAHA'),
(1, 'Dumadi', 'fah.midum.adi@gmail.com', '2014-10-14 05:44:34', 'Tes'),
(1, 'Fahmi', 'fah.midum.adi@gmail.com', '2014-10-14 07:45:32', 'Harusnya bisas'),
(1, 'ADuh', 'edan@gmail.com', '2014-10-14 07:49:38', 'dmnfdfd'),
(1, 'a', 'a@d.com', '2014-10-14 07:50:07', 'mnmnasf'),
(1, 'B', 'a@gmail.com', '2014-10-14 12:51:12', 'dbnmapqkefnefe');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `konten` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `judul`, `tanggal`, `konten`) VALUES
(1, 'Menori Mencari Sebuah Benda yang Sangat Sakti Sekali Bung HAHAHAHAHAH', '2014-10-14', 'dfdfdf\r\nSAMpeu\r\nLorem ipsum ahahaha asldmandlasdnasd asdasdasd,asdnasdand asdasmdnasmd asdamsdnmansdmansdmand'),
(3, 'ALAMAK!!!', '2014-10-12', 'afafa\r\nasdaf\r\nafa');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2014 at 02:01 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `budayakita`
--

-- --------------------------------------------------------

--
-- Table structure for table `budaya`
--

CREATE TABLE IF NOT EXISTS `budaya` (
  `id_budaya` int(11) NOT NULL AUTO_INCREMENT,
  `nama_budaya` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `lat_bud` float NOT NULL,
  `long_bud` float NOT NULL,
  `preview` text NOT NULL,
  `nama_file_video` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  PRIMARY KEY (`id_budaya`),
  KEY `id_provinsi` (`id_provinsi`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `budaya`
--

INSERT INTO `budaya` (`id_budaya`, `nama_budaya`, `alamat`, `lat_bud`, `long_bud`, `preview`, `nama_file_video`, `id_kategori`, `id_provinsi`) VALUES
(1, 'Taman Mini Indonesia Indah, Kota Jakarta Timur, DKI Jakarta, Indonesia', 'Jalan Raya Taman Mini Jakarta Timur, DKI Jakarta, Indonesia', -6.30245, 106.895, 'Taman Mini Indonesia Indah (TMII) merupakan suatu kawasan taman wisata bertema budaya Indonesia di Jakarta Timur.\r\nTaman ini merupakan rangkuman kebudayaan bangsa Indonesia, yang mencakup berbagai aspek kehidupan sehari-hari masyarakat 33 provinsi Indonesia (pada tahun 1975) yang ditampilkan dalam anjungan daerah berarsitektur  tradisional, serta menampilkan aneka busana, tarian dan tradisi daerah.\r\nDisamping itu, di tengah-tengah TMII terdapat sebuah danau yang menggambarkan miniatur kepulauan Indonesia di tengahnya, kereta gantung, berbagai museum, dan Teater IMAX Keong Mas dan Teater Tanah Airku), berbagai sarana rekreasi ini menjadikan TMIII sebagai salah satu kawasan wisata terkemuka di ibu kota.\r\n\r\nSumber : http://www.tamanmini.com/tentang-tmii.php', '', 1, 11),
(2, 'Saung Angklung Udjo, Bandung, Jawa Barat, Indonesia', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', -6.89797, 107.655, 'Saung Angklung Udjo (SAU) merupakan suatu tempat pertunjukan, pusat kerajinan tangan dari bambu, dan workshop instrumen musik dari bambu. Selain itu, SAU mempunyai tujuan sebagai laboratorium kependidikan dan pusat belajar untuk memelihara kebudayaan Sunda dan khususnya angklung.\r\nDidirikan pada tahun 1966 oleh Udjo Ngalagena dan istrinya Uum Sumiati, dengan maksud untuk melestarikan dan memelihara seni dan kebudayaan tradisional Sunda. Berlokasi di Jalan Padasuka 118, Bandung Timur Jawa Barat Indonesia.\r\nDengan suasana tempat yang segar udaranya dan dikelilingi oleh pohon-pohon bambu, dari kerajinan bambu dan interior bambu sampai alat musik bambu.\r\nSaung Angklung Udjo tidak terbatas pada hanya menjual seni pertunjukan saja, berbagai produk alat musik bambu tradisional (angklung, arumba, calung dan lainnya) dibuat dan dijual kepada para pembeli.\r\n\r\nSumber : http://id.wikipedia.org/wiki/Saung_Angklung_Udjo', '', 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `chekin`
--

CREATE TABLE IF NOT EXISTS `chekin` (
  `id_checkIn` int(11) NOT NULL AUTO_INCREMENT,
  `id_tab_user` int(11) NOT NULL,
  `id_budaya` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_checkIn`),
  KEY `id_tab_user` (`id_tab_user`),
  KEY `id_budaya` (`id_budaya`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `chekin`
--

INSERT INTO `chekin` (`id_checkIn`, `id_tab_user`, `id_budaya`, `tanggal`) VALUES
(1, 25, 2, '2014-09-11'),
(2, 26, 2, '2014-09-11'),
(3, 26, 2, '2014-09-11'),
(4, 26, 2, '2014-09-11'),
(5, 26, 2, '2014-09-11'),
(6, 26, 2, '2014-09-11'),
(7, 26, 2, '2014-09-11'),
(8, 26, 2, '2014-09-11'),
(9, 26, 2, '2014-09-11'),
(10, 26, 2, '2014-09-11'),
(11, 26, 2, '2014-09-11'),
(12, 26, 2, '2014-09-11'),
(13, 26, 2, '2014-09-11'),
(14, 26, 2, '2014-09-11'),
(15, 26, 2, '2014-09-11'),
(16, 26, 2, '2014-09-11'),
(17, 26, 2, '2014-09-11'),
(18, 26, 2, '2014-09-11'),
(19, 26, 2, '2014-09-11'),
(20, 26, 2, '2014-09-11'),
(21, 26, 2, '2014-09-11'),
(22, 26, 2, '2014-09-11'),
(23, 26, 2, '2014-09-11'),
(24, 26, 2, '2014-09-11'),
(25, 26, 2, '2014-09-11'),
(26, 26, 2, '2014-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `chekin_ev`
--

CREATE TABLE IF NOT EXISTS `chekin_ev` (
  `id_checkIn_ev` int(11) NOT NULL AUTO_INCREMENT,
  `id_tab_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_checkIn_ev`),
  KEY `id_tab_user` (`id_tab_user`),
  KEY `id_event` (`id_event`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `chekin_ev`
--

INSERT INTO `chekin_ev` (`id_checkIn_ev`, `id_tab_user`, `id_event`, `tanggal`) VALUES
(1, 25, 1, '2014-09-11'),
(2, 26, 1, '2014-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `chekin_per`
--

CREATE TABLE IF NOT EXISTS `chekin_per` (
  `id_checkIn_per` int(11) NOT NULL AUTO_INCREMENT,
  `id_tab_user` int(11) NOT NULL,
  `id_permainan` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  PRIMARY KEY (`id_checkIn_per`),
  KEY `id_tab_user` (`id_tab_user`),
  KEY `id_permainan` (`id_permainan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment_bud`
--

CREATE TABLE IF NOT EXISTS `comment_bud` (
  `id_comm_bud` int(11) NOT NULL AUTO_INCREMENT,
  `id_budaya` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_tab_user` int(11) NOT NULL,
  PRIMARY KEY (`id_comm_bud`),
  KEY `id_tab_user` (`id_tab_user`),
  KEY `id_budaya` (`id_budaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment_ev`
--

CREATE TABLE IF NOT EXISTS `comment_ev` (
  `id_comm_ev` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_tab_user` int(11) NOT NULL,
  PRIMARY KEY (`id_comm_ev`),
  KEY `id_event` (`id_event`),
  KEY `id_tab_user` (`id_tab_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comment_ev`
--

INSERT INTO `comment_ev` (`id_comm_ev`, `id_event`, `isi`, `tanggal`, `id_tab_user`) VALUES
(1, 1, 'halo', '2014-09-11', 25);

-- --------------------------------------------------------

--
-- Table structure for table `comment_per`
--

CREATE TABLE IF NOT EXISTS `comment_per` (
  `id_comm_per` int(11) NOT NULL AUTO_INCREMENT,
  `id_permainan` int(11) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `id_tab_user` int(11) NOT NULL,
  PRIMARY KEY (`id_comm_per`),
  KEY `id_tab_user` (`id_tab_user`),
  KEY `id_permainan` (`id_permainan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `nama_event` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `lat_ev` float NOT NULL,
  `long_ev` float NOT NULL,
  `id_budaya` int(11) NOT NULL,
  `id_kat_event` int(11) NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `id_budaya` (`id_budaya`),
  KEY `id_kat_event` (`id_kat_event`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `alamat`, `tanggal`, `lat_ev`, `long_ev`, `id_budaya`, `id_kat_event`) VALUES
(1, 'A Little Fairy Tale', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', '2014-08-05', -6.89797, 107.655, 2, 1),
(2, 'Angklung Music Performance', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', '2014-09-12', -6.89797, 107.655, 2, 2),
(3, 'Angklung Night A Tribute To The Beatles', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', '2013-09-07', -6.89797, 107.655, 2, 2),
(4, 'Memperingati 2 Tahun Angklung Sebagai Warisan Budaya Dunia oleh UNESCO', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', '2012-11-12', -6.89797, 107.655, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(11) NOT NULL AUTO_INCREMENT,
  `nama_file_gallery` varchar(100) NOT NULL,
  `nama_gallery` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `id_budaya` int(11) NOT NULL,
  PRIMARY KEY (`id_gallery`),
  KEY `id_budaya` (`id_budaya`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `nama_file_gallery`, `nama_gallery`, `tanggal`, `id_budaya`) VALUES
(1, 'IMG_1515', 'Pembukaan Direktur Saung Udjo', '2014-09-05', 2),
(2, 'IMG_1520', 'Pembukaan dari ''t Magisch Theatertje', '2014-09-05', 2),
(3, 'IMG_1529', 'Witch sedang berbicara pada Gago', '2014-09-05', 2),
(4, 'IMG_1533', 'Pemberian apresiasi dari Saung Udjo', '2014-09-05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `nama_file_icon` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `nama_file_icon`) VALUES
(1, 'Bangunan', 'map-marker-building(32xx)'),
(2, 'Bangunan', 'map-marker-busana(32xx)');

-- --------------------------------------------------------

--
-- Table structure for table `kat_event`
--

CREATE TABLE IF NOT EXISTS `kat_event` (
  `id_kat_event` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kat` varchar(50) NOT NULL,
  `nama_file_icon` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kat_event`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kat_event`
--

INSERT INTO `kat_event` (`id_kat_event`, `nama_kat`, `nama_file_icon`) VALUES
(1, 'Teater', ''),
(2, 'Musik', ''),
(3, 'Tari', ''),
(4, 'Kuliner', ''),
(5, 'Busana', ''),
(6, 'Film', '');

-- --------------------------------------------------------

--
-- Table structure for table `lencana`
--

CREATE TABLE IF NOT EXISTS `lencana` (
  `id_lencana` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lencana` varchar(50) NOT NULL,
  `nama_file_icon` varchar(100) NOT NULL,
  PRIMARY KEY (`id_lencana`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lencana`
--

INSERT INTO `lencana` (`id_lencana`, `nama_lencana`, `nama_file_icon`) VALUES
(1, 'FTF', 'badge-first_check-in'),
(2, 'New Comer', 'badge-newcomer');

-- --------------------------------------------------------

--
-- Table structure for table `permainan`
--

CREATE TABLE IF NOT EXISTS `permainan` (
  `id_permainan` int(11) NOT NULL AUTO_INCREMENT,
  `lat_per` float NOT NULL,
  `long_per` float NOT NULL,
  `nama_per` varchar(100) NOT NULL,
  `nama_file_icon` varchar(100) NOT NULL,
  `favorite` int(11) NOT NULL,
  `clue` varchar(255) NOT NULL,
  `difficult` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_tab_user` int(11) NOT NULL,
  PRIMARY KEY (`id_permainan`),
  KEY `id_tab_user` (`id_tab_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `permainan`
--

INSERT INTO `permainan` (`id_permainan`, `lat_per`, `long_per`, `nama_per`, `nama_file_icon`, `favorite`, `clue`, `difficult`, `tanggal`, `id_tab_user`) VALUES
(1, -6.93431, 107.605, 'Youll impress', 'map-marker2-permainan(32xx)', 0, 'Wilayah ini mempunyai monumen seperti monas\ntempatnya biasanya kalau pagi buat lari pagi', 2, '2014-09-11', 25),
(2, -6.66461, 107.227, 'hahaha', 'map-marker2-permainan(32xx)', 0, 'd', 3, '2014-09-11', 25),
(8, -1.527, 118.215, 'dsds', 'map-marker2-permainan(32xx)', 0, 'dsds', 1, '2014-09-11', 25),
(9, -1.527, 118.215, 'asd', 'map-marker2-permainan(32xx)', 0, 'sad', 1, '2014-09-11', 25);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(30) NOT NULL,
  `nama_ibukota` varchar(30) NOT NULL,
  `lat` float NOT NULL,
  `long` float NOT NULL,
  KEY `id_provinsi` (`id_provinsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`, `nama_ibukota`, `lat`, `long`) VALUES
(1, 'Aceh', 'Banda Aceh', 5.55, 95.3167),
(2, 'Sumatera Utara', 'Medan', 3.59154, 98.6693),
(3, 'Sumatera Barat', 'Padang', -0.95, 100.353),
(4, 'Riau', 'Pekanbaru', -0.5335, 101.447),
(5, 'Jambi', 'Jambi', -1.59, 103.61),
(6, 'Sumatera Selatan', 'Palembang', -2.99093, 104.757),
(7, 'Bengkulu', 'Bengkulu', -3.79207, 102.262),
(8, 'Lampung', 'Bandar Lampung', -4.55858, 105.407),
(9, 'Kepulauan Bangka Belitung', 'Pangkal Pinang', -5.44789, 105.265),
(10, 'Kepulauan Riau', 'Tanjungpinang', 0.91792, 104.446),
(11, 'DKI Jakarta', 'Jakarta', -6.20876, 106.846),
(12, 'Jawa Barat', 'Bandung', -6.91486, 107.608),
(13, 'Jawa Tengah', 'Semarang', -6.96667, 110.417),
(14, 'D I Yogyakarta', 'Yogyakarta', -7.79707, 110.371),
(15, 'Jawa Timur', 'Surabaya', -7.26424, 112.746),
(16, 'Banten', 'Serang', -6.12, 106.15),
(17, 'Bali', 'Denpasar', -8.65, 115.217),
(18, 'Nusa Tenggara Barat', 'Mataram', -8.58195, 116.117),
(19, 'Nusa Tenggara Timur', 'Kupang', -10.1788, 123.598);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_depan` varchar(10) NOT NULL,
  `nama_belakang` varchar(10) NOT NULL,
  `id_tab_user` int(11) NOT NULL AUTO_INCREMENT,
  `login_time` int(11) NOT NULL,
  `nama_file_profile` varchar(255) NOT NULL,
  `checkin_time` int(11) NOT NULL,
  PRIMARY KEY (`id_tab_user`),
  KEY `id_tab_user` (`id_tab_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`password`, `email`, `nama_depan`, `nama_belakang`, `id_tab_user`, `login_time`, `nama_file_profile`, `checkin_time`) VALUES
('d1143b3cd3a2c73f06cc9a9a8cd86a16', 'rifqithomgame@gmail.com', 'rifqi', 'thomi', 25, 3, 'default', 0),
('1c49a27bad9be4f7b3b93e568f2cfe8a', 'rifqithomigame@gmail.com', 'rifq', 'tom', 26, 1, 'default', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_have_lencana`
--

CREATE TABLE IF NOT EXISTS `user_have_lencana` (
  `id_tab_user` int(11) NOT NULL,
  `id_lencana` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_tab_user`,`id_lencana`),
  KEY `id_tab_user` (`id_tab_user`),
  KEY `id_lencana` (`id_lencana`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_have_lencana`
--

INSERT INTO `user_have_lencana` (`id_tab_user`, `id_lencana`, `tanggal`) VALUES
(25, 2, '2014-09-09'),
(26, 2, '2014-09-11');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `budaya`
--
ALTER TABLE `budaya`
  ADD CONSTRAINT `fk_kat1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prov1` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chekin`
--
ALTER TABLE `chekin`
  ADD CONSTRAINT `fk_bud4` FOREIGN KEY (`id_budaya`) REFERENCES `budaya` (`id_budaya`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_us4` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chekin_ev`
--
ALTER TABLE `chekin_ev`
  ADD CONSTRAINT `fk_ce` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cu` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chekin_per`
--
ALTER TABLE `chekin_per`
  ADD CONSTRAINT `fk_cp` FOREIGN KEY (`id_permainan`) REFERENCES `permainan` (`id_permainan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cup` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_bud`
--
ALTER TABLE `comment_bud`
  ADD CONSTRAINT `fk_bud5` FOREIGN KEY (`id_budaya`) REFERENCES `budaya` (`id_budaya`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_us3` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_ev`
--
ALTER TABLE `comment_ev`
  ADD CONSTRAINT `fk_ev` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_us5` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_per`
--
ALTER TABLE `comment_per`
  ADD CONSTRAINT `fk_per` FOREIGN KEY (`id_permainan`) REFERENCES `permainan` (`id_permainan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_us2` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_bud2` FOREIGN KEY (`id_budaya`) REFERENCES `budaya` (`id_budaya`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kat_event` FOREIGN KEY (`id_kat_event`) REFERENCES `kat_event` (`id_kat_event`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_bud1` FOREIGN KEY (`id_budaya`) REFERENCES `budaya` (`id_budaya`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permainan`
--
ALTER TABLE `permainan`
  ADD CONSTRAINT `fk_us1` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_have_lencana`
--
ALTER TABLE `user_have_lencana`
  ADD CONSTRAINT `fk_len` FOREIGN KEY (`id_lencana`) REFERENCES `lencana` (`id_lencana`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

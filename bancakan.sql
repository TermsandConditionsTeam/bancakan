-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 07. Oktober 2014 jam 19:35
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bancakan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `budaya`
--

CREATE TABLE IF NOT EXISTS `budaya` (
  `id_budaya` int(11) NOT NULL AUTO_INCREMENT,
  `nama_budaya` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  PRIMARY KEY (`id_budaya`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `budaya`
--

INSERT INTO `budaya` (`id_budaya`, `nama_budaya`, `id_kategori`) VALUES
(1, 'Angklung', 3),
(2, 'Museum', 2),
(3, 'Bandung Cullinary Nights', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `budaya_in_loc`
--

CREATE TABLE IF NOT EXISTS `budaya_in_loc` (
  `id_in` int(11) NOT NULL AUTO_INCREMENT,
  `id_budaya` int(11) NOT NULL,
  `id_tempat_budaya` int(11) NOT NULL,
  PRIMARY KEY (`id_in`),
  KEY `id_budaya` (`id_budaya`),
  KEY `id_tempat_budaya` (`id_tempat_budaya`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `budaya_in_loc`
--

INSERT INTO `budaya_in_loc` (`id_in`, `id_budaya`, `id_tempat_budaya`) VALUES
(1, 1, 1),
(2, 2, 4),
(3, 3, 5),
(4, 3, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `chekin`
--

CREATE TABLE IF NOT EXISTS `chekin` (
  `id_checkIn` int(11) NOT NULL AUTO_INCREMENT,
  `id_tab_user` int(11) NOT NULL,
  `id_budaya` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_checkIn`),
  KEY `id_tab_user` (`id_tab_user`),
  KEY `id_budaya` (`id_budaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chekin_ev`
--

CREATE TABLE IF NOT EXISTS `chekin_ev` (
  `id_checkIn_ev` int(11) NOT NULL AUTO_INCREMENT,
  `id_tab_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_checkIn_ev`),
  KEY `id_tab_user` (`id_tab_user`),
  KEY `id_event` (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chekin_per`
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
-- Struktur dari tabel `comment_bud`
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
-- Struktur dari tabel `comment_ev`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `comment_ev`
--

INSERT INTO `comment_ev` (`id_comm_ev`, `id_event`, `isi`, `tanggal`, `id_tab_user`) VALUES
(1, 2, 'keren banget musiknya', '2014-10-07', 3),
(2, 2, 'wow', '2014-10-07', 3),
(3, 1, 'cerita bagus', '2014-10-07', 3),
(4, 1, 'cocok buat anak anak', '2014-10-07', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment_per`
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
-- Struktur dari tabel `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `nama_event` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `id_in` int(11) NOT NULL,
  `nama_file_poster` varchar(255) NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `id_in` (`id_in`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `alamat`, `tanggal`, `id_in`, `nama_file_poster`) VALUES
(1, 'A Little Fairy Tale', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', '2014-08-05', 1, 'default_ev.jpg'),
(2, 'Angklung Music Performance', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', '2014-09-12', 1, 'default_ev.jpg'),
(3, 'Angklung Night A Tribute To The Beatles', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', '2013-09-07', 1, 'default_ev.jpg'),
(4, 'Memperingati 2 Tahun Angklung Sebagai Warisan Budaya Dunia oleh UNESCO', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', '2012-11-12', 1, 'default_ev.jpg'),
(5, 'Bamboo Afternoon Performance', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', '0000-00-00', 1, 'default_ev.jpg'),
(7, 'Braga Culinary Night', 'Jalan Braga, Bandung, Jawa Barat, Indonesia', '2014-09-27', 3, 'default_ev.jpg'),
(8, 'Dago Culinary Night', 'Jl. Dipatiukur, Bandung, Jawa Barat', '2014-09-27', 4, 'default_ev.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
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
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `nama_file_gallery`, `nama_gallery`, `tanggal`, `id_budaya`) VALUES
(1, 'IMG_1515', 'Pembukaan Direktur Saung Udjo', '2014-09-05', 1),
(2, 'IMG_1520', 'Pembukaan dari ''t Magisch Theatertje', '2014-09-05', 1),
(3, 'IMG_1529', 'Witch sedang berbicara pada Gago', '2014-09-05', 1),
(4, 'IMG_1533', 'Pemberian apresiasi dari Saung Udjo', '2014-09-05', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `nama_file_icon` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `nama_file_icon`) VALUES
(1, 'Busana', 'map-marker-busana(32xx).png'),
(2, 'Bangunan', 'map-marker-building(32xx).png'),
(3, 'Musik', 'map-marker-musik(32xx).png'),
(4, 'Kuliner', 'map-marker-makanan(32xx).png'),
(5, 'Teater', ''),
(6, 'Tari', ''),
(7, 'Film', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lencana`
--

CREATE TABLE IF NOT EXISTS `lencana` (
  `id_lencana` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lencana` varchar(50) NOT NULL,
  `nama_file_icon` varchar(100) NOT NULL,
  `hint` varchar(255) NOT NULL,
  PRIMARY KEY (`id_lencana`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `lencana`
--

INSERT INTO `lencana` (`id_lencana`, `nama_lencana`, `nama_file_icon`, `hint`) VALUES
(1, 'FTF', 'badge-first_check-in', 'Lakukan check in pertama kali'),
(2, 'New Comer', 'badge-newcomer', 'gabung member pertama kali'),
(3, 'First Event', 'badge-event1', 'Lakukan check in event pertama kali'),
(4, 'First Kuliner', 'badge-kuliner', 'Lakukan check in event kuliner pertama kali'),
(5, 'First Main', 'badge-main', 'Lakukan ikut permainan pertama kali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permainan`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_budaya`
--

CREATE TABLE IF NOT EXISTS `tempat_budaya` (
  `id_tempat_budaya` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tempat` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `lat_bud` float NOT NULL,
  `long_bud` float NOT NULL,
  `preview` text NOT NULL,
  `nama_file_video` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tempat_budaya`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tempat_budaya`
--

INSERT INTO `tempat_budaya` (`id_tempat_budaya`, `nama_tempat`, `alamat`, `lat_bud`, `long_bud`, `preview`, `nama_file_video`) VALUES
(1, 'Saung Angklung Udjo, Bandung, Jawa Barat, Indonesia', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', -6.89637, 107.655, 'Saung Angklung Udjo (SAU) merupakan suatu tempat pertunjukan, pusat kerajinan tangan dari bambu, dan workshop instrumen musik dari bambu. Selain itu, SAU mempunyai tujuan sebagai laboratorium kependidikan dan pusat belajar untuk memelihara kebudayaan Sunda dan khususnya angklung.\r\nDidirikan pada tahun 1966 oleh Udjo Ngalagena dan istrinya Uum Sumiati, dengan maksud untuk melestarikan dan memelihara seni dan kebudayaan tradisional Sunda. Berlokasi di Jalan Padasuka 118, Bandung Timur Jawa Barat Indonesia.\r\nDengan suasana tempat yang segar udaranya dan dikelilingi oleh pohon-pohon bambu, dari kerajinan bambu dan interior bambu sampai alat musik bambu.\r\nSaung Angklung Udjo tidak terbatas pada hanya menjual seni pertunjukan saja, berbagai produk alat musik bambu tradisional (angklung, arumba, calung dan lainnya) dibuat dan dijual kepada para pembeli.\r\n\r\nSumber : http://id.wikipedia.org/wiki/Saung_Angklung_Udjo', ''),
(3, 'Selasar Sunaryo Art Space', 'Bukit Pakar Timur No.100, Bandung, Jawa Barat 40198, Indonesia', -6.85853, 107.637, 'Selasar Sunaryo Art Space (SSAS) adalah sebuah ruang dan organisasi nirlaba yang bertujuan mendukung pengembangan praktik dan pengkajian seni dan kebudayaan visual di Indonesia. Dididirikan pada tahun 1998 oleh Sunaryo, SSAS aktif menyelenggarakan kegiatan-kegiatan yang berorientasi pada edukasi publik. Dengan arahan dan dukungan dari Yayasan Selasar Sunaryo, fokus utama SSAS adalah pada penyelenggaraan program-program seni rupa kontemporer, melalui pameran, diskusi, residensi dan lokakarya.\r\n\r\nSebagai pusat kebudayaan, SSAS menyelenggarakan kegiatan-kegiatan yang berhubungan dengan disiplin-disiplin seni lain seperti desain, kriya, seni pertunjukan, sastra, arsitektur, dan lain sebagainya. Selain memajang koleksi permanen, SSAS juga menyelenggarakan pameran-pameran tunggal atau bersama yang menampilkan karya-karya para seniman muda dan senior, dari Indonesia maupun mancanegara.\r\n\r\nSemua jenis kegiatan di SSAS—mencakup program anak-anak, konser musik, pementasan tetaer, pemutaran film, pembacaan karya sastra, ceramah dan berbagai aktivitas lainnya—dirancang berdasarkan arahan dari Dewan Pertimbangan Kuratorial yang terdiri dari para akademisi, kritikus dan praktisi seni. SSAS juga berkiprah dalam jejaring seni rupa kontemporer internasional melalui kerjasama dengan berbagai insitusi di luar negeri.\r\n\r\nhttp://www.selasarsunaryo.com/information/general-information.html', ''),
(4, 'Museum Negeri Sri Baduga', 'Jl. BKR No. 185 Bandung, Jawa Barat 40243', -6.93777, 107.603, 'Museum Sri Baduga merupakan sebuah museum yang terletak di kota Bandung, provinsi Jawa Barat, Indonesia. Museum ini dikelola oleh pemerintah provinsi Jawa Barat, yang mulai didirikan pada tahun 1974 dengan memanfaatkan bangunan lama bekas Kawedanan Tegallega, yang kemudian diresmikan pada tanggal 5 Juni 1980 oleh Menteri Pendidikan dan Kebudayaan waktu itu, Daoed Joesoef.\r\nMuseum ini menjadi pusat dokumentasi, informasi dan media pembelajaran serta objek wisata budaya unggulan Jawa Barat.\r\n\r\nhttp://www.sribadugamuseum.com/a-profil.php', ''),
(5, 'Braga', 'Jalan Braga, Bandung, Jawa Barat, Indonesia', -6.9179, 107.609, 'Jalan Braga adalah nama sebuah jalan utama di kota Bandung, Indonesia. Nama jalan ini cukup dikenal sejak masa pemerintahan Hindia-Belanda. Sampai saat ini nama jalan tersebut tetap dipertahankan sebagai salah satu maskot dan obyek wisata kota Bandung yang dahulu dikenal sebagai Parijs van Java.\r\nDi sisi kanan kiri Jalan Braga terdapat kompleks pertokoan yang memiliki arsitektur dan tata kota yang tetap mempertahankan ciri arsitektur lama pada masa Hindia Belanda. Tata letak pertokoan tersebut mengikuti model yang ada di Eropa sesuai dengan perkembangan kota Bandung pada masa itu (1920-1940-an) sebagai kota mode yang cukup termasyhur seperti halnya kota Paris pada saat itu.\r\n\r\nhttp://id.wikipedia.org/wiki/Jalan_Braga', ''),
(6, 'Dago-Dipatiukur', 'Jl. Dipatiukur, Bandung, Jawa Barat', -6.89767, 107.614, 'Dago - Dipatiukur', ''),
(7, 'Museum Konferensi Asia Afrika (Gedung Merdeka), Bandung, Jawa Barat', 'Jl. Asia-Afrika No. 65, Bandung, Jawa Barat, Indonesia', -6.92112, 107.609, 'Museum Konferensi Asia Afrika merupakan salah satu museum yang berada di kota Bandung. Terletak di Jl.Asia Afrika No.65. Museum ini merupakan memorabilia Konferensi Asia Afrika. Museum ini memiliki hubungan yang sangat erat dengan Gedung Merdeka. Secara keseluruhan Gedung Merdeka memiliki dua bangunan utama, yang pertama disebut Gedung Merdeka sebagai tempat sidang utama, sedangkan yang berada di samping Gedung Merdeka adalah Museum Konferensi Asia Afrika sebagai tempat memorabilia Konferensi Asia Afrika. Latar belakang dibangunnya museum ini adalah adanya keinginan dari para pemimpin bangsa-bangsa di Asia dan Afrika untuk mengetahui tentang Gedung Merdeka dan sekitarnya tempat Konferensi Asia Afrika berlangsung. Hal ini membuat Menteri Luar Negeri Republik Indonesia, Prof. Dr. Mochtar Kusumaatmadja, S.H., LL.M memiliki ide untuk membangun sebuah museum. Ide tersebut disampaikannya pada forum rapat Panitia Peringatan 25 tahun Konferensi Asia Afrika (1980) yang dihadiri oleh Direktur Jenderal Kebudayaan Prof. Dr. Haryati Soebadio sebagai wakil dari Departemen Pendidikan dan Kebudayaan. Kemudian museum ini diresmikan pada tanggal 24 April 1980 bertepatan dengan peringatan 25 tahun Konferensi Asia Afrika.\r\n\r\nhttp://id.wikipedia.org/wiki/Museum_Konferensi_Asia_Afrika', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_depan` varchar(10) NOT NULL,
  `nama_belakang` varchar(10) NOT NULL,
  `tanggal_gabung` date NOT NULL,
  `id_tab_user` int(11) NOT NULL AUTO_INCREMENT,
  `login_time` int(11) NOT NULL,
  `nama_file_profile` varchar(255) NOT NULL,
  `checkin_time` int(11) NOT NULL,
  `kode_aktifasi` varchar(255) NOT NULL,
  `s_verifikasi` int(1) NOT NULL,
  PRIMARY KEY (`id_tab_user`),
  KEY `id_tab_user` (`id_tab_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`password`, `email`, `nama_depan`, `nama_belakang`, `tanggal_gabung`, `id_tab_user`, `login_time`, `nama_file_profile`, `checkin_time`, `kode_aktifasi`, `s_verifikasi`) VALUES
('202cb962ac59075b964b07152d234b70', 'rifqithomigame@gmail.com', 'rifqi', 'thomi', '2014-10-06', 3, 37, '3.jpg', 0, '25dac34c152d67a7b7fa549828b2e732fe8af08cc012b7e00b03369c12a8e8de', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_have_lencana`
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
-- Dumping data untuk tabel `user_have_lencana`
--

INSERT INTO `user_have_lencana` (`id_tab_user`, `id_lencana`, `tanggal`) VALUES
(3, 2, '2014-10-06');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `budaya`
--
ALTER TABLE `budaya`
  ADD CONSTRAINT `fk_kat` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `budaya_in_loc`
--
ALTER TABLE `budaya_in_loc`
  ADD CONSTRAINT `fk_budaya` FOREIGN KEY (`id_budaya`) REFERENCES `budaya` (`id_budaya`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tempat` FOREIGN KEY (`id_tempat_budaya`) REFERENCES `tempat_budaya` (`id_tempat_budaya`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `chekin`
--
ALTER TABLE `chekin`
  ADD CONSTRAINT `fk_bud4` FOREIGN KEY (`id_budaya`) REFERENCES `tempat_budaya` (`id_tempat_budaya`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_us4` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `chekin_ev`
--
ALTER TABLE `chekin_ev`
  ADD CONSTRAINT `fk_ce` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cu` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `chekin_per`
--
ALTER TABLE `chekin_per`
  ADD CONSTRAINT `fk_cp` FOREIGN KEY (`id_permainan`) REFERENCES `permainan` (`id_permainan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cup` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `comment_bud`
--
ALTER TABLE `comment_bud`
  ADD CONSTRAINT `fk_bud5` FOREIGN KEY (`id_budaya`) REFERENCES `tempat_budaya` (`id_tempat_budaya`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_us3` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `comment_ev`
--
ALTER TABLE `comment_ev`
  ADD CONSTRAINT `fk_ev` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_us5` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `comment_per`
--
ALTER TABLE `comment_per`
  ADD CONSTRAINT `fk_per` FOREIGN KEY (`id_permainan`) REFERENCES `permainan` (`id_permainan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_us2` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_bud1` FOREIGN KEY (`id_budaya`) REFERENCES `tempat_budaya` (`id_tempat_budaya`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permainan`
--
ALTER TABLE `permainan`
  ADD CONSTRAINT `fk_us1` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_have_lencana`
--
ALTER TABLE `user_have_lencana`
  ADD CONSTRAINT `fk_len` FOREIGN KEY (`id_lencana`) REFERENCES `lencana` (`id_lencana`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_tab_user`) REFERENCES `user` (`id_tab_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

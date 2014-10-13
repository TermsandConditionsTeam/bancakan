
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 13 Okt 2014 pada 16.34
-- Versi Server: 5.1.69
-- Versi PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `u719346360_banca`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `budaya`
--

INSERT INTO `budaya` (`id_budaya`, `nama_budaya`, `id_kategori`) VALUES
(1, 'Angklung', 3),
(2, 'Museum', 2),
(3, 'Bandung Cullinary Nights', 4),
(4, 'Tahu Gejrot', 4),
(5, 'Convention Center', 2),
(6, 'Taman Kota', 9),
(7, 'Sepatu', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data untuk tabel `budaya_in_loc`
--

INSERT INTO `budaya_in_loc` (`id_in`, `id_budaya`, `id_tempat_budaya`) VALUES
(1, 1, 1),
(2, 2, 4),
(3, 3, 5),
(4, 3, 6),
(5, 2, 8),
(6, 2, 9),
(7, 2, 7),
(8, 2, 10),
(12, 1, 12),
(13, 6, 25),
(14, 6, 14),
(15, 6, 15),
(16, 6, 16),
(17, 6, 17),
(18, 6, 18),
(19, 6, 19),
(20, 6, 20),
(21, 6, 21),
(22, 6, 22),
(23, 6, 23),
(24, 6, 24),
(25, 5, 11),
(26, 5, 26),
(27, 7, 11),
(29, 1, 27);

-- --------------------------------------------------------

--
-- Struktur dari tabel `chekin`
--

CREATE TABLE IF NOT EXISTS `chekin` (
  `id_checkIn` int(11) NOT NULL AUTO_INCREMENT,
  `id_tab_user` int(11) NOT NULL,
  `id_tempat_budaya` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_checkIn`),
  KEY `id_tab_user` (`id_tab_user`),
  KEY `id_budaya` (`id_tempat_budaya`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `chekin_ev`
--

INSERT INTO `chekin_ev` (`id_checkIn_ev`, `id_tab_user`, `id_event`, `tanggal`) VALUES
(12, 8, 11, '2014-10-13'),
(11, 6, 11, '2014-10-13'),
(9, 6, 17, '2014-10-12');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment_bud`
--

CREATE TABLE IF NOT EXISTS `comment_bud` (
  `id_comm_bud` int(11) NOT NULL AUTO_INCREMENT,
  `id_tempat_budaya` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_tab_user` int(11) NOT NULL,
  PRIMARY KEY (`id_comm_bud`),
  KEY `id_tab_user` (`id_tab_user`),
  KEY `id_budaya` (`id_tempat_budaya`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment_ev`
--

CREATE TABLE IF NOT EXISTS `comment_ev` (
  `id_comm_ev` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_tab_user` int(11) NOT NULL,
  PRIMARY KEY (`id_comm_ev`),
  KEY `id_event` (`id_event`),
  KEY `id_tab_user` (`id_tab_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `comment_ev`
--

INSERT INTO `comment_ev` (`id_comm_ev`, `id_event`, `isi`, `tanggal`, `id_tab_user`) VALUES
(8, 14, 'Komeeen', '2014-10-13 10:53:15', 8),
(7, 11, 'Maneh mah tom malah gedung f ', '2014-10-12 16:27:58', 6),
(9, 14, 'Lagiiiii\r\nAjahshsjjdhrhahgsg\r\nJsvsvgsuee\r\nHavsyeuebehdhahgfehwhahahsvsvsyehwve', '2014-10-13 10:53:35', 8),
(10, 14, 'Hffd', '2014-10-13 10:54:26', 8),
(11, 14, 'Hffyvh', '2014-10-13 10:54:41', 8),
(12, 14, 'Tomtom ganteng', '2014-10-13 10:56:26', 6),
(13, 14, 'Fitri fitri', '2014-10-13 10:56:51', 6),
(14, 14, 'Test lagi deh', '2014-10-13 11:02:30', 8),
(15, 14, 'Lagii', '2014-10-13 11:02:42', 8),
(16, 14, 'Aku ikutan komen', '2014-10-13 11:05:20', 9),
(17, 14, 'Aku ikutan komen', '2014-10-13 11:06:12', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment_per`
--

CREATE TABLE IF NOT EXISTS `comment_per` (
  `id_comm_per` int(11) NOT NULL AUTO_INCREMENT,
  `id_permainan` int(11) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_tab_user` int(11) NOT NULL,
  PRIMARY KEY (`id_comm_per`),
  KEY `id_tab_user` (`id_tab_user`),
  KEY `id_permainan` (`id_permainan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `nama_event` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tanggal_open` datetime NOT NULL,
  `tanggal_close` datetime NOT NULL,
  `id_in` int(11) NOT NULL,
  `nama_file_poster` varchar(255) NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `id_in` (`id_in`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `alamat`, `tanggal_open`, `tanggal_close`, `id_in`, `nama_file_poster`) VALUES
(1, 'A Little Fairy Tale', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', '2014-08-05 00:00:00', '0000-00-00 00:00:00', 1, 'default_ev.jpg'),
(2, 'Angklung Music Performance', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', '2014-09-12 00:00:00', '0000-00-00 00:00:00', 1, 'default_ev.jpg'),
(3, 'Angklung Night A Tribute To The Beatles', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', '2013-09-07 00:00:00', '0000-00-00 00:00:00', 1, 'default_ev.jpg'),
(4, 'Memperingati 2 Tahun Angklung Sebagai Warisan Budaya Dunia oleh UNESCO', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', '2012-11-12 00:00:00', '0000-00-00 00:00:00', 1, 'default_ev.jpg'),
(5, 'Bamboo Afternoon Performance', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'default_ev.jpg'),
(7, 'Braga Culinary Night', 'Jalan Braga, Bandung, Jawa Barat, Indonesia', '2014-09-27 00:00:00', '0000-00-00 00:00:00', 3, 'BragaCN.png'),
(8, 'Dago Culinary Night', 'Jl. Dipatiukur, Bandung, Jawa Barat', '2014-09-27 00:00:00', '0000-00-00 00:00:00', 4, 'DagoCulinaryNight.jpg'),
(9, 'Nonton Bareng Mitra Kukar vs Persib', 'Taman Film Bandung', '2014-10-10 18:30:00', '2014-10-10 21:30:00', 15, 'TamanFilm.jpg'),
(10, 'Test', '-----', '2014-10-12 00:00:00', '2014-10-13 00:00:00', 13, ''),
(11, 'Gd. F', '--------------', '2014-10-12 00:00:00', '2014-10-12 19:00:00', 12, ''),
(12, 'Karnival Adhikarya Nusantara', 'Graha Manggala Siliwangi', '2014-10-08 08:00:00', '2014-10-12 22:00:00', 25, 'Adhikarya.jpg'),
(13, 'Pesta Sains Interaktif 2014 “Amarah Bumi”', 'Museum Geologi Jalan Diponegoro no. 57 Bandung', '2014-10-04 08:00:00', '2014-10-17 23:00:00', 8, 'PestaSains.jpg'),
(14, 'Bandung Japan Festival 2014', 'Sabuga Bandung', '2014-10-26 06:00:00', '2014-10-26 23:00:00', 25, 'BandungJapanFest14.jpg'),
(15, 'Bandung Tren Kulit & Sepatu 2014', 'Graha Manggala Siliwangi', '2014-10-15 07:00:00', '2014-10-17 23:00:00', 27, 'BandungTrenKulit&Sepatu2014.jpg'),
(16, 'Agronomy Fair 2014', 'Taman Kandaga Puspa', '2014-10-10 07:00:00', '2014-10-19 21:00:00', 17, 'Agro.jpg'),
(17, 'Coba Angklung', '-------', '2014-10-12 00:00:00', '2014-10-15 00:00:00', 29, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(11) NOT NULL AUTO_INCREMENT,
  `nama_file_gallery` varchar(100) NOT NULL,
  `nama_gallery` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `id_tempat_budaya` int(11) NOT NULL,
  PRIMARY KEY (`id_gallery`),
  KEY `id_budaya` (`id_tempat_budaya`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `nama_file_gallery`, `nama_gallery`, `tanggal`, `id_tempat_budaya`) VALUES
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(7, 'Film', ''),
(8, 'Rupa', ''),
(9, 'Taman', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `lencana`
--

INSERT INTO `lencana` (`id_lencana`, `nama_lencana`, `nama_file_icon`, `hint`) VALUES
(1, 'FTF', 'badge-first_check-in.png', 'Lakukan check in pertama kali'),
(2, 'New Comer', 'badge-newcomer.png', 'gabung member pertama kali'),
(3, 'First Event', 'badge-event1.png', 'Lakukan check in event pertama kali'),
(4, 'First Kuliner', 'badge-kuliner.png', 'Lakukan check in event kuliner pertama kali'),
(5, 'First Main', 'badge-main.png', 'Lakukan ikut permainan pertama kali');

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
  `clue` varchar(21844) NOT NULL,
  `difficult` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_tab_user` int(11) NOT NULL,
  PRIMARY KEY (`id_permainan`),
  KEY `id_tab_user` (`id_tab_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `permainan`
--

INSERT INTO `permainan` (`id_permainan`, `lat_per`, `long_per`, `nama_per`, `nama_file_icon`, `favorite`, `clue`, `difficult`, `tanggal`, `id_tab_user`) VALUES
(15, -6.97677, 107.631, 'rumah ke dua', 'map-marker2-permainan(32xx).png', 0, 'tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.tempat ini berisi orang orang hebat.v', 3, '2014-10-13', 6);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `tempat_budaya`
--

INSERT INTO `tempat_budaya` (`id_tempat_budaya`, `nama_tempat`, `alamat`, `lat_bud`, `long_bud`, `preview`, `nama_file_video`) VALUES
(1, 'Saung Angklung Udjo, Bandung, Jawa Barat, Indonesia', 'Jalan Padasuka no. 118, Bandung, Jawa Barat 40192, Indonesia', -6.89637, 107.655, 'Saung Angklung Udjo (SAU) merupakan suatu tempat pertunjukan, pusat kerajinan tangan dari bambu, dan workshop instrumen musik dari bambu. Selain itu, SAU mempunyai tujuan sebagai laboratorium kependidikan dan pusat belajar untuk memelihara kebudayaan Sunda dan khususnya angklung.\r\nDidirikan pada tahun 1966 oleh Udjo Ngalagena dan istrinya Uum Sumiati, dengan maksud untuk melestarikan dan memelihara seni dan kebudayaan tradisional Sunda. Berlokasi di Jalan Padasuka 118, Bandung Timur Jawa Barat Indonesia.\r\nDengan suasana tempat yang segar udaranya dan dikelilingi oleh pohon-pohon bambu, dari kerajinan bambu dan interior bambu sampai alat musik bambu.\r\nSaung Angklung Udjo tidak terbatas pada hanya menjual seni pertunjukan saja, berbagai produk alat musik bambu tradisional (angklung, arumba, calung dan lainnya) dibuat dan dijual kepada para pembeli.\r\n\r\nSumber : http://id.wikipedia.org/wiki/Saung_Angklung_Udjo', ''),
(3, 'Selasar Sunaryo Art Space', 'Bukit Pakar Timur No.100, Bandung, Jawa Barat 40198, Indonesia', -6.85853, 107.637, 'Selasar Sunaryo Art Space (SSAS) adalah sebuah ruang dan organisasi nirlaba yang bertujuan mendukung pengembangan praktik dan pengkajian seni dan kebudayaan visual di Indonesia. Dididirikan pada tahun 1998 oleh Sunaryo, SSAS aktif menyelenggarakan kegiatan-kegiatan yang berorientasi pada edukasi publik. Dengan arahan dan dukungan dari Yayasan Selasar Sunaryo, fokus utama SSAS adalah pada penyelenggaraan program-program seni rupa kontemporer, melalui pameran, diskusi, residensi dan lokakarya.\r\n\r\nSebagai pusat kebudayaan, SSAS menyelenggarakan kegiatan-kegiatan yang berhubungan dengan disiplin-disiplin seni lain seperti desain, kriya, seni pertunjukan, sastra, arsitektur, dan lain sebagainya. Selain memajang koleksi permanen, SSAS juga menyelenggarakan pameran-pameran tunggal atau bersama yang menampilkan karya-karya para seniman muda dan senior, dari Indonesia maupun mancanegara.\r\n\r\nSemua jenis kegiatan di SSAS—mencakup program anak-anak, konser musik, pementasan tetaer, pemutaran film, pembacaan karya sastra, ceramah dan berbagai aktivitas lainnya—dirancang berdasarkan arahan dari Dewan Pertimbangan Kuratorial yang terdiri dari para akademisi, kritikus dan praktisi seni. SSAS juga berkiprah dalam jejaring seni rupa kontemporer internasional melalui kerjasama dengan berbagai insitusi di luar negeri.\r\n\r\nhttp://www.selasarsunaryo.com/information/general-information.html', ''),
(4, 'Museum Negeri Sri Baduga', 'Jl. BKR No. 185 Bandung, Jawa Barat 40243', -6.93777, 107.603, 'Museum Sri Baduga merupakan sebuah museum yang terletak di kota Bandung, provinsi Jawa Barat, Indonesia. Museum ini dikelola oleh pemerintah provinsi Jawa Barat, yang mulai didirikan pada tahun 1974 dengan memanfaatkan bangunan lama bekas Kawedanan Tegallega, yang kemudian diresmikan pada tanggal 5 Juni 1980 oleh Menteri Pendidikan dan Kebudayaan waktu itu, Daoed Joesoef.\r\nMuseum ini menjadi pusat dokumentasi, informasi dan media pembelajaran serta objek wisata budaya unggulan Jawa Barat.\r\n\r\nhttp://www.sribadugamuseum.com/a-profil.php', ''),
(5, 'Braga', 'Jalan Braga, Bandung, Jawa Barat, Indonesia', -6.9179, 107.609, 'Jalan Braga adalah nama sebuah jalan utama di kota Bandung, Indonesia. Nama jalan ini cukup dikenal sejak masa pemerintahan Hindia-Belanda. Sampai saat ini nama jalan tersebut tetap dipertahankan sebagai salah satu maskot dan obyek wisata kota Bandung yang dahulu dikenal sebagai Parijs van Java.\r\nDi sisi kanan kiri Jalan Braga terdapat kompleks pertokoan yang memiliki arsitektur dan tata kota yang tetap mempertahankan ciri arsitektur lama pada masa Hindia Belanda. Tata letak pertokoan tersebut mengikuti model yang ada di Eropa sesuai dengan perkembangan kota Bandung pada masa itu (1920-1940-an) sebagai kota mode yang cukup termasyhur seperti halnya kota Paris pada saat itu.\r\n\r\nhttp://id.wikipedia.org/wiki/Jalan_Braga', ''),
(6, 'Dago-Dipatiukur', 'Jl. Dipatiukur, Bandung, Jawa Barat', -6.89767, 107.614, 'Dago - Dipatiukur', ''),
(7, 'Museum Konferensi Asia Afrika (Gedung Merdeka), Bandung, Jawa Barat', 'Jl. Asia-Afrika No. 65, Bandung, Jawa Barat, Indonesia', -6.92112, 107.609, 'Museum Konferensi Asia Afrika merupakan salah satu museum yang berada di kota Bandung. Terletak di Jl.Asia Afrika No.65. Museum ini merupakan memorabilia Konferensi Asia Afrika. Museum ini memiliki hubungan yang sangat erat dengan Gedung Merdeka. Secara keseluruhan Gedung Merdeka memiliki dua bangunan utama, yang pertama disebut Gedung Merdeka sebagai tempat sidang utama, sedangkan yang berada di samping Gedung Merdeka adalah Museum Konferensi Asia Afrika sebagai tempat memorabilia Konferensi Asia Afrika. Latar belakang dibangunnya museum ini adalah adanya keinginan dari para pemimpin bangsa-bangsa di Asia dan Afrika untuk mengetahui tentang Gedung Merdeka dan sekitarnya tempat Konferensi Asia Afrika berlangsung. Hal ini membuat Menteri Luar Negeri Republik Indonesia, Prof. Dr. Mochtar Kusumaatmadja, S.H., LL.M memiliki ide untuk membangun sebuah museum. Ide tersebut disampaikannya pada forum rapat Panitia Peringatan 25 tahun Konferensi Asia Afrika (1980) yang dihadiri oleh Direktur Jenderal Kebudayaan Prof. Dr. Haryati Soebadio sebagai wakil dari Departemen Pendidikan dan Kebudayaan. Kemudian museum ini diresmikan pada tanggal 24 April 1980 bertepatan dengan peringatan 25 tahun Konferensi Asia Afrika.\r\n\r\nhttp://id.wikipedia.org/wiki/Museum_Konferensi_Asia_Afrika', ''),
(8, 'Museum Geologi Bandung', 'Jalan Diponegoro No.57, Bandung, Jawa Barat 40122', -6.90071, 107.621, 'Museum Geologi Bandung menampilkan berbagai koleksi material geologi seperti batu-batuan, mineral, dan fosil dari seluruh wilayah Indonesia. Koleksi material geologi di museum ini telah dikumpulkan sejak tahun 1850. Selain koleksi material geologi, museum ini juga memamerkan bilik-bilik informasi mengenai teori terbentuknya bumi, kondisi geologi di berbagai wilayah Indonesia, dan sejarah manusia berdasarkan teori Darwin. Museum Geologi Bandung telah berdiri sejak tahun 1928, namun sempat mengalami renovasi dan dibuka kembali pada 23 Agustus 2000.', ''),
(9, 'Museum Mandala Wangsit Siliwangi', 'Jalan Lembong No.38 Braga Sumurbandung, Bandung, Jawa Barat 40181', -6.91766, 107.611, 'Museum Mandala Wangsit Siliwangi atau Museum Wangsit Mandala Siliwangi di Bandung memamerkan berbagai senjata dan peralatan yang dipergunakan sejak zaman kerajaan hingga masa penjajahan. Beberapa koleksi senjata di Museum Mandala Wangsit Siliwangi adalah tombak, panah, keris, pistol, senjata laras panjang, bom molotov, hingga meriam dan panser.', ''),
(10, 'Museum Pos Indonesia', 'Jalan Cilaki No. 47, Bandung, Jawa Barat 40115', -6.90214, 107.62, 'Sesuai dengan namanya, Museum Pos Indonesia yang berada di kota Bandung menggambarkan sejarah perkembangan pos di Indonesia. Museum ini memamerkan perangko, foto-foto dokumentasi dan peralatan pos Indonesia dari masa ke masa. Museum Pos Indonesia juga telah dilengkapi dengan teknologi audio guide yang menerangkan benda-benda koleksi museum dalam bahasa Indonesia dan Inggris.', ''),
(11, 'Graha Manggala Siliwangi', 'Jl. Aceh No. 66, Bandung, Jawa Barat 40113', -6.90934, 107.62, 'Graha Manggala Siliwangi adalah salah satu gedung yang sering digunakan untuk acara pameran, festival, dan event-event pertunjukan lainnya. Gedung ini beralamat di jalan Aceh 66 Bandung, berdampingan dengan stadion sepakbola Siliwangi, home basenya klub Persib Bandung.', ''),
(12, 'Telkom University', 'Jalan Telekomunikasi', -6.9766, 107.631, '----------------------', ''),
(13, 'Sukapura', 'Sukapura', -6.97086, 107.634, '', ''),
(14, 'Taman Pasupati Bandung (Taman Jomblo)', 'Perempatan Jalan Taman Sari - Jalan Cikapayang (Jalan Taman Sari), Bandung, Jawa Barat 40116', -6.89811, 107.609, 'Taman Pasupati, atau lebih dikenal dengan sebutan Taman JombloTaman Pasupati, atau lebih dikenal dengan sebutan Taman Jomblo, adalah sebuah taman yang terletak di bawah Jembatan Pasupati, Bandung, Jawa Barat. Taman ini diresmikan oleh Walikota Bandung, Ridwan Kamil, pada tanggal 4 Januari 2014.\r\n\r\nIstilah "Taman Jomblo" dibuat sendiri oleh Ridwan Kamil karena keberadaan tempat duduk di taman tersebut yang berbentuk kubus berukuran kecil warna-warni dan hanya muat untuk satu orang. Kubus tersebut juga bisa digunakan sebagai tempat memajang karya seni sesuai dengan tema taman tersebut yang untuk kalangan anak muda. Meski demikian, di sisi lain dari taman tersebut ada bangku panjang yang melengkung dan bisa ditempati oleh banyak orang. Di bagian belakang Taman Jomblo juga terdapat arena papan luncur (skate board) yang kini menjadi lokasi favorit untuk para pemain skate board di Bandung. Arena papan luncur ini memiliki kelengkapan dengan skala internasional.', ''),
(15, 'Taman Film Bandung', 'Bawah Jalan Layang Pasupati, Bandung Wetan, Bandung, Jawa Barat 40116', -6.89843, 107.608, 'Taman Film ini dibuat seperti bioskop outdoor dengan penataan mirip persawahan berwarna serba hijau. Para pengunjung tak perlu khawatir diganggu nyamuk atau binatang lainnya saat sedang menonton film, karena alas duduk mereka berupa rumput sintetis yang bersih dan nyaman. Layar megatron dengan kualitas gambar dan suara standar bioskop terpampang megah di taman tersebut.\r\nTaman Film tercarat sebagai Taman ke-7 yang telah diresmikan pada 14 September 2014, pengerjaannya sesuai target dalam rangka menyambut ulang tahun Kota Bandung yang jatuh pada 25 September 2014. Tidak seperti taman-tamn yang lain, untuk bisa masuk pengunjung harus memperlihatkan foto kalau sudah "Gerakan Pungut Sampah (GPS)". Bagi warga Bandung yang tidak melakukan Gerakan Pungut Sampah, tidak boleh masuk ke taman tersebut dan menikmati sajian film gratis.', ''),
(16, 'Taman Lansia Bandung', 'Jalan Cisangkuy (Jalan Cilaki), Bandung, Jawa Barat', -6.90167, 107.62, 'Taman Lansia adalah sebuah taman kota yang terletak di sebelah kanan Gedung Sate Bandung. Taman Lansia merupakan singkatan dari Taman Lanjut Usia, sebuah sarana refreshing dan istirahat bagi warga kota Bandung maupun warga luar Bandung yang sedang berkunjung ke Bandung. Meski namanya Taman Lansia, taman ini banyak dikunjungi oleh Penduduk Bandung yang bukan lanjut usia, termasuk anak muda Bandung. Mereka berkumpul di sini baik untuk sekedar berjalan-jalan, rekreasi dan makan bersama keluarga hingga sekedar menikmati lingkungan yang asri.\r\n\r\nPada saat Hari Sabtu, Minggu dan hari libur lainnya, Taman Lansia ini ramai dikunjungi oleh mereka yang berolah raga pagi sambil menikmati sejuknya udara Bandung. ', ''),
(17, 'Taman Pustaka Bunga Bandung', 'Jl. Cilaki (Samping SMAN 20 Bandung), Bandung, Jawa Barat 40114', -6.90306, 107.622, 'Taman Cilaki yang lokasinya dekat Gedung Sate disulap menjadi Taman Pustaka Bunga Cilaki dan diresmikan Wali Kota Bandung Ridwan Kamil, Senin (30/12). Taman berisi 100 ribu spesies bunga termasuk bunga langka di antaranya anggrek Kalimantan, Poinsettia, Kalanchoe, Amaryllis, Bogenville, Rhododenron, dan anggrek berbagai jenis.\r\nDi area taman, dilengkapi juga fasilitas kursi beristirahat. Tidak hanya itu, Pemkot Bandung dibantu pihak ketiga memberikan fasilitas wifi gratis kepada pengunjung.\r\nTaman ini menjadi perpustakaan bunga bagi warga dan  sangat berharap semakin banyak warga memanfaatkan taman untuk aktivitas sehari-hari.', ''),
(18, 'Taman Musik Citarum', 'Jalan Belitung, Bandung, Jawa Barat', -6.91213, 107.616, 'Taman yang berlokasi di Jalan Belitung ini diperuntukkan bagi mereka gemar musik, terutama anak band. Tempat itu jadi bisa jadi tempat bagi band-band yang ingin manggung. Tidak hanya manggung, taman ini bisa jadi tempat nongkrong yang asyik bagi siapa pun. Rimbunnya pepohonan dan taman yang ditata apik akan membuat pengunjung betah berlama-lama nongkrong di sana.\r\n', ''),
(19, 'Taman Fotografi Bandung', 'Jl. Taman Cempaka (Jl. RE Martadinata (Riau)), Bandung, Jawa Barat', -6.91354, 107.627, 'Taman Foto Bandung adalah sebuah ruang publik yg diinisiasi & diaktivasi oleh seluruh jejaring fotografi & warga Kota Bandung. Taman Cempaka menjadi sebuah taman dengan tema fotografi yang diharapkan dapat selalu hidup dan menjadi inspirasi bagi warga Kota Bandung.', ''),
(20, 'Taman Cibeunying Bandung', 'Jl. Taman Cibeunying, Bandung, Jawa Barat', -6.90451, 107.624, 'Taman Cibeunying ini merupakan taman aktif yang bisa digunakan warga untuk berbagai kegiatan. Taman ini dilengkapi tempat duduk dengan gazebonya, tempat sampah dan beragam bunga indah. Taman ini merupakan salah satu paru-paru kota Bandung. Taman ini sudah ada sejak zaman Belanda dan dinamakan Tjibeunjing Plantsien. Taman ini berada di jalur Jalan Cibeunying Utara dan Selatan. Taman ini banyak mengalami perubahan sejak pembuatannya dari zaman pemerintahan Belanda.', ''),
(21, 'Bumi Panda WWF Bandung', 'Jl. Geusan Ulun No.3, Bandung, Jawa Barat', -6.90452, 107.612, 'Sebuah rumah informasi lingkungan hidup yang dikelola oleh WWF-Indonesia, diresmikan hari ini (24/1) di Bandung.  “Bumi Panda“ berfungsi sebagai sarana untuk berinteraksi dengan supporter WWF-Indonesia dan masyarakat luas yang ingin mengenal lebih dekat dan mendukung kegiatan-kegiatan WWF-Indonesia.\r\n', ''),
(22, 'Taman Lalu Lintas Bandung', 'Jl. Belitung No. 1, Bandung, Jawa Barat 40113', -6.91133, 107.613, 'Taman lalu lintas Bandung terletak diantara jalan Sumatera dan Belitung. Taman ini merupakan sebuah taman bermain bagi anak – anak. Taman yang dulunya berupa rawa-rawa itu mulai diresmikan menjadi sarana pendidikan informal untuk menanamkan etika berlalu lintas bagi anak-anak sejak tanggal 1 Maret 1958.\r\n\r\nTaman Lalu lintas dikenal juga dengan nama Taman Ade Irma Suryani. Pemberian nama ini dimaksudkan untuk mengenang putri salah satu pahlawan revolusi, Jenderal A.H Nasution.\r\n\r\nSetiap akhir pekan, Taman lalu lintas selalu padat dikunjungi wisatawan, terutama mereka yang berasal dari Kota Bandung sendiri. Taman lalu lintas selalu menjadi salah satu tujuan wisata yang menarik karena merupakan tempat bermain dan belajar yang aman bagi anak-anak.', ''),
(23, 'Taman Balai Kota Bandung', 'Komplek Kantor Walikota Bandung (Jl. Merdeka), Bandung, Jawa Barat', -6.91243, 107.61, 'Taman Balai Kota merupakan taman yang terdapat di area pusat pemerintahan Balai Kota Bandung. Pintu masuk utamanya terletak di jalan Wastukencana. Rerimbunan pepohonan dilengkapi dengan tempat duduk dari bebatuan akan memberi keleluasaan pada anda untuk bercanda bersama keluarga.\r\nDi tengah-tengah taman ini ada sebuah konstruksi besi dan kawat ram berbentuk prisma berukuran 2,5 meter persegi dan tinggi sekira 2 meter. Di atas bangunan tersebut, mejeng huruf berwarna merah yang dirangkai menjadi kata ''LOVE''. Ini merupakan ''Gembok Cinta'' yang mengadopsi bangunan-bangunan yang memiliki konsep serupa yang sudah ada di beberapa negara seperti di Pont de l''Archeveche, Paris, Perancis; Huangshan, China; Namsan Tower, Korea Selatan; Jembatan Luzhkov, Moskow, Russia; dan Cologne, Jerman. ', ''),
(24, 'Taman Pramuka Bandung', 'Jl. Taman Pramuka (Jl. LL. RE Martadinata (Riau)), Bandung, Jawa Barat', -6.91016, 107.627, 'Taman Pramuka Bandung terletak di jalan RE. Martadinata atau lebih dikenal dengan jalan Riau. Taman Pramuka dengan Tugu Kitri (tunas kelapa) ini dahulu adalah bekas pompa bensin yang kemudian lahan tersebut di rubah menjadi lahan terbuka hijau sebagai taman untuk masyarakat kota bandung.\r\nTaman Pramuka di resmikan pada tanggal 16 juni 2008. Taman Pramuka ini dilengkapi dengan air mancur dengan tanaman bunga bakung warna merah hati. namun sekarang air mancur itu sudah tidak ceria lagi, karena tidak dipasang lagi, dan bunga bakungnya juga tidak sedang berbunga.', ''),
(25, 'Taman Hutan Raya Ir. H. Djuanda Bandung', 'Jalan Ir. H. Djuanda No. 99 (Dago Pakar), Bandung, Jawa Barat 40124', -6.8576, 107.63, 'Taman Hutan Raya Ir. H. Djuanda merupakan kawasan konservasi yang terpadu antara alam sekunder dengan hutan tanaman yang terletak di Kota Bandung, Indonesia. Luasnya mencapai 590 hektare membentang dari kawasan Dago Pakar sampai Maribaya.\r\n\r\nLetak Taman Hutan Raya Ir. H. Djuanda berada di Kampung Pakar, Desa Ciburial, Kecamatan Cimenyan, pada ketinggian antara 770 mdpl sampai 1330 mdpl. Di atas tanahnya yang subur terdapat sekitar 2500 jenis tanaman yang terdiri dari 40 familia dan 112 species. Pada tahun 1965 luas taman hutan raya baru sekitar 10 ha saja, namun saat ini sudah mencapai 590 ha membentang dari kawasan Pakar sampai Maribaya. Saat ini pengelolaannya dilakukan oleh Dinas Kehutanan Pemda Provinsi Jawa Barat (sebelumnya berada di bawah naungan Perum Perhutani).', ''),
(26, 'Sasana Budaya Ganesha (Sabuga) Bandung', 'Jl. Taman Sari No. 73 Bandung, Jawa Barat 40132', -6.88625, 107.608, 'Sasana Budaya Ganesha merupakan sebuah pusat konvensi yang terletak di Bandung, Indonesia. Gedung dengan luas 22.000 m² ini dibangun tahun 1997. Berlokasi di Jalan Tamansari, Bandung. Pertama kali gedung ini digunakan untuk kegiatan wisuda dan akademik Institut Teknologi Bandung (ITB). Sabuga dirancang untuk acara multiguna seperti pertunjukan seni, konser musik, konferensi dan pameran. Sabuga memiliki total 6 ruang pertemuan lengkap, peralatan pendukung termasuk multimedia. Auditorium utama dapat menampung sebanyak 2.500 orang.', ''),
(27, 'kosana', 'suka', -6.97062, 107.634, '-------------', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`password`, `email`, `nama_depan`, `nama_belakang`, `tanggal_gabung`, `id_tab_user`, `login_time`, `nama_file_profile`, `checkin_time`, `kode_aktifasi`, `s_verifikasi`) VALUES
('9aa6e5f2256c17d2d430b100032b997c', 'hazmi.caizen@gmail.com', 'Hazmi', 'Hafiz', '2014-10-12', 7, 1, 'default.png', 0, 'af4c533e7bc66362f4df01795dc71749fe8af08cc012b7e00b03369c12a8e8de', 0),
('e10adc3949ba59abbe56e057f20f883e', 'rifqithomi@gmail.com', 'rifqi', 'thomi', '2014-10-12', 6, 26, '6.jpg', 2, 'e642105d25daec1a836507b861ef2e2afe8af08cc012b7e00b03369c12a8e8de', 1),
('81dc9bdb52d04dc20036dbd8313ed055', 'arqy_yoann@yahoo.co.id', 'a', 'b', '2014-10-13', 8, 3, 'default.png', 1, '73e9be4a3f2a22398f721beed36b0948fe8af08cc012b7e00b03369c12a8e8de', 1),
('534a0b7aa872ad1340d0071cbfa38697', 'aneghs@gmail.com', 'fitri', 'aha', '2014-10-13', 9, 2, 'default.png', 0, '5d4729a8cddb01970bcf351670cce327fe8af08cc012b7e00b03369c12a8e8de', 1);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_have_lencana`
--

INSERT INTO `user_have_lencana` (`id_tab_user`, `id_lencana`, `tanggal`) VALUES
(8, 2, '2014-10-13'),
(7, 2, '2014-10-12'),
(6, 3, '2014-10-12'),
(6, 2, '2014-10-12'),
(9, 2, '2014-10-13'),
(8, 3, '2014-10-13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

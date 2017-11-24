-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2014 at 12:41 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `buku_kode` int(225) NOT NULL AUTO_INCREMENT,
  `kategori_kode` char(10) NOT NULL,
  `penerbit_kode` char(10) NOT NULL,
  `buku_judul` varchar(50) NOT NULL,
  `buku_jumhal` int(11) NOT NULL,
  `buku_diskripsi` varchar(250) NOT NULL,
  `buku_pengarang` varchar(300) NOT NULL,
  `buku_tahun_terbit` int(11) NOT NULL,
  `buku_gambar` varchar(2000) NOT NULL,
  PRIMARY KEY (`buku_kode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=947 ;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_kode`, `kategori_kode`, `penerbit_kode`, `buku_judul`, `buku_jumhal`, `buku_diskripsi`, `buku_pengarang`, `buku_tahun_terbit`, `buku_gambar`) VALUES
(942, '4', '106', 'Manusia Setengah Salmon', 234, 'Bagus', 'Raditya Dika', 2011, 'upload/manusia-setengah-salmon-buku-terbaru-raditya.jpg'),
(923, '4', '106', 'Berjuta Warna Pelangi', 528, 'Berkisah Tentang warna pelangi yang banyak', 'Iris Ixora', 2011, 'upload/Berjuta Warna Pelangi.jpg'),
(924, '2', '109', 'Mengenang Jepang', 164, '', 'Ajib Rosidi', 2000, 'upload/mengenangjepang_29530.jpg'),
(925, '2', '109', 'Orang Jawa Dan Masyarakat Cina (1755-1825) ', 124, '', 'Dr. Peter Carey', 2000, 'upload/orangjawadanmasyarakatcina1755-1825_29532.jpg'),
(926, '2', '110', 'Tanpa Rakyat Pemimpin Tak Berarti Apa-apa ', 384, '', 'Panda Nababan', 2000, 'upload/tanparakyatpemimpintakberartiapa-apa_29605.jpg'),
(928, '4', '109', 'Kasihnya DIA', 528, '', 'Juriah Ishak', 2012, 'upload/Kasihnya DIA.gif'),
(929, '4', '110', 'Damai Kasihku', 480, '', 'Iris Ixora', 2007, 'upload/Damai Kasihku.jpg'),
(930, '4', '106', 'Mr. London Ms. Langkawi', 512, '', 'Herna Diana', 2013, 'upload/Mr. London Ms. Langkawi.jpg'),
(931, '4', '111', 'Cinta Tiga Suku', 512, 'Buku yang bercerita tentang seseorang yang mencintai orang lain tetapi berbeda suku. cinta segitiga.', 'Herna Diana', 2010, 'upload/Cinta Tiga Suku.gif'),
(932, '4', '108', 'Oh, Mama Tiriku!', 512, '', 'Herna Diana', 2012, 'upload/Oh, Mama Tiriku!.gif'),
(933, '4', '107', 'Sana Menanti Sini Merindu', 688, '', 'Juriah Ishak', 2013, 'upload/Sana Menanti Sini Merindu.jpg'),
(944, '5', '116', 'Bunga Tabur Terakhir', 567, 'Menceritakan trntang kehidupan sebuah keluarga yang harmonis ', 'Kholik', 2009, 'upload/bunga-tabur-terakhir.jpg'),
(945, '1', '121', 'Aku Bangga Menjadi Guru', 456, 'Buku yang bercerita tentang kehidupan seorang guru yang sangat di banggakannya dan membuat dia merasa menjadi orang yang hebat saat menjabat menjadi guru.', 'Titin Supriatin', 2001, 'upload/administrator_woman2.png'),
(938, '7', '114', 'Minuman Untuk Pengobatan Dan Kesehatan', 198, 'Buku cara membuat makanan dan minuman spesial.', 'G.M. Hembing Wijayakusuma', 1990, 'upload/minumanuntukpengobatandankesehatan_29309.jpg'),
(939, '7', '111', 'Higiene Dan Penyakit Ternak', 455, '', 'Helmut Fischer dkk', 1998, 'upload/higienedanpenyakitternak_29311.jpg'),
(946, '4', '107', 'Cinta Dua Langit Senja', 678, 'Novel Remaja', 'Dewi', 2014, 'upload/cinta-dua-langit-senja.jpg'),
(941, '6', '116', 'Tas Dari Rafia (25 tas pesta,casual, dan trendi)', 125, 'Buku yang berii tentang tatacara membuat seni dari tali Rafia.', 'Yohana	', 2005, 'upload/tasdarirafia25taspestacasualdantrendi_25934.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE IF NOT EXISTS `detail_pinjam` (
  `peminjaman_kode` int(10) NOT NULL,
  `buku_kode` int(10) NOT NULL,
  `detail_tgl_kembali` date NOT NULL,
  `detail_denda` double NOT NULL,
  `detail_status_kembali` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`peminjaman_kode`, `buku_kode`, `detail_tgl_kembali`, `detail_denda`, `detail_status_kembali`) VALUES
(921, 928, '2014-02-12', 8000, 2),
(922, 925, '0000-00-00', 0, 1),
(923, 923, '2014-02-27', 12000, 2),
(924, 945, '2014-02-16', 1000, 2),
(925, 942, '2014-02-27', 12000, 2),
(925, 942, '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kartu_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `kartu_pendaftaran` (
  `kartu_barkode` int(10) NOT NULL AUTO_INCREMENT,
  `petugas_kode` int(10) NOT NULL,
  `peminjam_kode` int(10) NOT NULL,
  `kartu_tgl_pembuatan` date NOT NULL,
  `kartu_tgl_akhir` date NOT NULL,
  `kartu_status_aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`kartu_barkode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=809 ;

--
-- Dumping data for table `kartu_pendaftaran`
--

INSERT INTO `kartu_pendaftaran` (`kartu_barkode`, `petugas_kode`, `peminjam_kode`, `kartu_tgl_pembuatan`, `kartu_tgl_akhir`, `kartu_status_aktif`) VALUES
(801, 101, 201, '2014-02-12', '2014-03-12', 1),
(802, 101, 202, '2014-02-10', '2014-03-10', 1),
(803, 101, 203, '2014-02-11', '2014-03-11', 1),
(804, 101, 204, '2014-02-12', '2014-03-14', 1),
(805, 101, 205, '2014-02-12', '2014-03-14', 1),
(806, 101, 206, '2014-02-12', '2014-03-14', 1),
(807, 101, 207, '2014-02-12', '2014-03-14', 1),
(808, 101, 208, '2014-02-12', '2014-03-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_kode` int(10) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(20) NOT NULL,
  PRIMARY KEY (`kategori_kode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_kode`, `kategori_nama`) VALUES
(2, 'Sejarah'),
(4, 'Novel'),
(7, 'Kesehatan'),
(8, 'Agama'),
(6, 'Seni'),
(5, 'Ilmu Sosial'),
(3, 'Budaya'),
(1, 'Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE IF NOT EXISTS `peminjam` (
  `peminjam_kode` int(10) NOT NULL AUTO_INCREMENT,
  `peminjam_nama` varchar(30) NOT NULL,
  `peminjam_alamat` varchar(50) NOT NULL,
  `peminjam_telp` varchar(20) NOT NULL,
  `peminjam_foto` varchar(2000) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`peminjam_kode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`peminjam_kode`, `peminjam_nama`, `peminjam_alamat`, `peminjam_telp`, `peminjam_foto`, `username`, `password`) VALUES
(201, 'Achmad Faizun', 'Temanggung', '01919283783', 'upload/user.png', 'izun', '123'),
(202, 'udin', 'Temanggung', '021987654', 'upload/user5.png', 'udin', 'udin'),
(203, 'Khollik', 'Semarang', '02185756374', 'upload/user4.png', 'kholik', '123'),
(204, 'Achmad', 'Temanggung', '0123123123', 'upload/user_shades.png', 'achmad', 'qwerty'),
(205, 'Jenita Janet', 'Jakarta', '021847564343', 'upload/administrator_woman3.png', 'jenita', '123'),
(206, 'Dewi', 'Temanggung', '09876545423', 'upload/administrator_woman2.png', 'dewi', '123'),
(207, 'Dynar Rizky Nugraheni', 'Rejosari Kowangan Tmg', '0785473635', 'upload/user_woman_glasses.png', 'dyn', 'dyn'),
(208, 'Bp. Timbul', 'Temanggung', '098846443', 'upload/administrator.png', 'bapak', '123');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `peminjaman_kode` int(225) NOT NULL AUTO_INCREMENT,
  `petugas_kode` char(10) NOT NULL,
  `peminjam_kode` char(10) NOT NULL,
  `peminjaman_tgl` date NOT NULL,
  `peminjaman_tgl_hrs_kembali` date NOT NULL,
  PRIMARY KEY (`peminjaman_kode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=929 ;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_kode`, `petugas_kode`, `peminjam_kode`, `peminjaman_tgl`, `peminjaman_tgl_hrs_kembali`) VALUES
(925, '101', '208', '2014-02-12', '2014-02-15'),
(924, '101', '207', '2014-02-12', '2014-02-15'),
(923, '101', '207', '2014-02-12', '2014-02-15'),
(922, '101', '205', '2014-02-12', '2014-02-15'),
(921, '101', '205', '2014-02-01', '2014-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE IF NOT EXISTS `penerbit` (
  `penerbit_kode` int(100) NOT NULL AUTO_INCREMENT,
  `penerbit_nama` varchar(20) NOT NULL,
  `penerbit_alamat` varchar(50) NOT NULL,
  `penerbit_telp` varchar(20) NOT NULL,
  PRIMARY KEY (`penerbit_kode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`penerbit_kode`, `penerbit_nama`, `penerbit_alamat`, `penerbit_telp`) VALUES
(111, 'Yayasan Obor Indones', 'Jakarta', '08723635734'),
(110, 'Pustaka Sinar Harapa', 'Jakarta', '02175645847'),
(106, 'Gramedia', 'Jakarta', '0238465432198'),
(107, 'Ar-Ruzz Media', 'Yogyakarta', '0389453454'),
(108, 'Rumah Belajar Yabink', 'Yogyakarta', '021985745'),
(109, 'Pustaka Jaya', 'Jakarta', '09373463476'),
(112, 'Teras', 'Yogyakarta', '085645321876'),
(113, 'Pustaka Albana', 'Yogyakarta', '02195876464'),
(114, 'Pustaka Kartini', 'Jakarta', '087645312299'),
(115, 'Akademia', 'Semarang', '028457585'),
(116, 'Tiara Aksa', 'Semarang', '02195874653'),
(121, 'Lentera Ilmu', 'Jakarta', '021985764534');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `petugas_kode` int(100) NOT NULL,
  `petugas_nama` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `petugas_foto` varchar(200) NOT NULL,
  PRIMARY KEY (`petugas_kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`petugas_kode`, `petugas_nama`, `username`, `password`, `petugas_foto`) VALUES
(101, 'Achmad Faizun', 'admin', '12345', 'upload/anonymouos.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

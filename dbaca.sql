-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 02:35 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbaca`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_user` int(11) NOT NULL,
  `jenis_user` int(1) NOT NULL,
  `jenis_no` varchar(3) NOT NULL,
  `no` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `jenis_anggota` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_user`, `jenis_user`, `jenis_no`, `no`, `nama`, `jenis_kelamin`, `jenis_anggota`, `email`, `pass`) VALUES
(1, 1, 'XXX', '000000000', 'Perpustakaan DBaca', 'X', 'XXX', 'perpustakaan.dbaca@gmail.com', 'iniadmin'),
(7, 2, 'KTP', '12431234561234', 'Ilma Sakinah', 'P', 'Mahasiswa', 'ilmasakinahp@gmail.com', '416ce98aea5212bd46a9093aed683f7bb8c68afd'),
(8, 1, 'KTP', '0000000000', 'Admin Dbaca', 'L', 'Umum', 'admindbaca@gmail.com', 'f65e069fc6fea83130c0b6e95299324307cfd911'),
(9, 2, 'KTM', '191401036', 'Farika Aini Nasution', 'P', 'Mahasiswa', 'farikaaininst@gmail.com', 'f31a40aacac01aeb84c1baec9cec8aeea4daa1d6'),
(10, 2, 'KTM', '191401018', 'Faradilla Haifa', 'P', 'Mahasiswa', 'faradillahf25@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `foto_buku` varchar(250) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `jenis_buku` varchar(20) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tebal_halaman` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `foto_buku`, `penulis`, `jenis_buku`, `tahun_terbit`, `penerbit`, `tebal_halaman`) VALUES
(1, 'Buku Pintar Komputer', 'Buku Pintar Komputer.jpg', 'Hasyim M., ST', 'Komputer', 2008, 'Karya Pustaka', 232),
(2, 'Terminologi Hukum', 'Terminologi Hukum.jpeg', 'I.P.M Ranuhandoko B.A.', 'Hukum', 2013, 'Sinar Grafika', 558),
(3, 'Dasar Filosofi Hukum Agraria Indonesia', 'Dasar Filosofi Hukum Agraria Indonesia.jpeg', 'Zaidar, S.H., M.Hum.', 'Hukum', 2016, 'Pustaka Bangsa Press', 248),
(4, 'Pengantar Hukum Indonesia', 'Pengantar Hukum Indonesia.jpeg', 'R. Abdoel Djamali, S.H., M.Hum.', 'Hukum', 2019, 'Rajawali Pers', 340),
(5, 'English Learning', 'English Learning - Speaking, Writing, Reading, Listening.jpeg', 'Drs. Parlindungan Purba, M.Hum., et al.', 'Lainnya', 2019, 'Rajawali Pers', 159),
(6, 'Ekonomi Moneter', 'Ekonomi Moneter.jpeg', 'Drs. M. Manullang', 'Lainnya', 2019, 'Ghalia Indonesia', 190),
(7, 'Pengantar Ilmu Antropologi', 'Pengantar Ilmu Antropologi.jpeg', 'Prof. Dr. Koentjaraningrat', 'Lainnya', 2015, 'Rineka Cipta', 338),
(8, 'Pengantar Sistem Operasi Komputer', 'Pengantar Sistem Operasi Komputer.jpg', 'Satrio Yudho, S.Kom, M.T.I', 'Komputer', 2013, 'Graha Ilmu', 80),
(9, 'Pengantar Jaringan Komputer Bagi Pemula', 'Pengantar Jaringan Komputer Bagi Pemula.jpg', 'Eko Priyo Utomo, S.T', 'Komputer', 2006, 'Yrama Widya', 152),
(10, 'Koala Kumal', 'Koala Kumal.jpg', 'Raditya Dika', 'Novel', 2015, 'Gagas Media', 250),
(11, 'Laskar Pelangi', 'Laskar Pelangi.jpg', 'Andrea Hirata', 'Novel', 2005, 'Bintang Pustaka', 529),
(12, 'Tentang Kamu', 'Tentang Kamu.jpg', 'Tere Liye', 'Novel', 2016, 'Republika Penerbit', 524),
(13, 'Sangkuriang', 'Sangkuriang.jpg', 'Yuliadi Soekardi', 'Cerita Rakyat', 2002, 'Pustaka Setia', 104),
(14, 'Kumpulan Dongeng Cerita Rakyat Nusantara', 'Kumpulan Dongeng Cerita Rakyat Nusantara.jpg', 'Kak Rara Z', 'Komputer', 2016, 'Bintang Ilmu', 108),
(15, 'Cerita Rakyat Banten dan Jakarta', 'Cerita Rakyat Banten dan Jakarta.jpg', 'Tuti A. Windri & Wahyu Untara', 'Komputer', 2010, 'Sinar Cemerlang Abadi', 68),
(16, 'Doraemon dan Tiga Prajurit Impian', 'Doraemon dan Tiga Prajurit Impian.jpg', 'Fujiko F. Fujio', 'Komputer', 1994, 'Elex Media Komputindo', 187),
(17, 'Fight!! IPPO Vol. 99', 'Fight!! IPPO Vol. 99.jpg', 'Morikawa, Joji', 'Komik', 2014, 'Elex Media Komputindo', 100),
(18, 'Si Juki yang Ingin Lulus UN', 'Si Juki yang Ingin Lulus UN.jpg', 'Faza Meong', 'Komputer', 2012, 'Bukune', 152),
(20, 'La Tahzan', 'latahzan.jpg', 'Dr. Aidh Al-Qarni', 'Novel', 2003, 'Qisthi Press', 597);

--
-- Triggers `buku`
--
DELIMITER $$
CREATE TRIGGER `insert_log` AFTER INSERT ON `buku` FOR EACH ROW BEGIN 
INSERT INTO log VALUES(CONCAT('Penambahan Buku Dbaca = ', NEW.id_buku), NOW(), USER());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_log` AFTER UPDATE ON `buku` FOR EACH ROW BEGIN 
INSERT INTO log VALUES(CONCAT('Pengubahan Buku Dbaca = ', NEW.id_buku), NOW(), USER());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `description` text NOT NULL,
  `date_time` datetime NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`description`, `date_time`, `user`) VALUES
('Penambahan Buku Dbaca = 20', '2021-12-13 22:04:13', 'root@localhost'),
('Pengubahan Buku Dbaca = 14', '2021-12-13 22:20:55', 'root@localhost'),
('Pengubahan Buku Dbaca = 15', '2021-12-13 22:28:32', 'root@localhost'),
('Pengubahan Buku Dbaca = 16', '2021-12-13 22:29:25', 'root@localhost'),
('Pengubahan Buku Dbaca = 18', '2021-12-13 23:36:38', 'root@localhost');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);
ALTER TABLE `buku` ADD FULLTEXT KEY `judul` (`judul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

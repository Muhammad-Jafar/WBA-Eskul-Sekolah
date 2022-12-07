-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 03:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myekskul2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `id_level` int(2) NOT NULL DEFAULT 1,
  `nama` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_level`, `nama`, `username`, `password`) VALUES
(1, 1, 'Admin Ganteng', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(3) NOT NULL,
  `id_admin` int(2) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `gambar` text DEFAULT NULL,
  `keterangan` text NOT NULL,
  `tanggal_pos` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_admin`, `judul`, `gambar`, `keterangan`, `tanggal_pos`) VALUES
(1, 1, 'Rupa-rupa Cerita Perpisahan Anies dari Gubernur Jakarta', 'adasdasd.jpg', '<p>Ini juga ga jelas apa isinya.</p>\r\n', '2022-10-16 23:46:43'),
(2, 1, 'Anies Maju jadi Capres 2024 diusung nasdem', 'adad.png', '<p>sadsadasdasdsadasdasdsadsaddadadsdad</p>\r\n', '2022-10-17 00:06:54'),
(3, 1, 'Tambahan tanpa perubahan', 'stok.png', '<p>Tanpa tau apa yang akan terjadi</p>\r\n', '2022-11-26 00:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_eskul`
--

CREATE TABLE `jenis_eskul` (
  `id_ekskul` int(2) NOT NULL,
  `nama_ekskul` varchar(30) NOT NULL,
  `jadwal` text NOT NULL,
  `tempat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_eskul`
--

INSERT INTO `jenis_eskul` (`id_ekskul`, `nama_ekskul`, `jadwal`, `tempat`) VALUES
(1, 'Pramuka', 'Setiap hari minggu sore', 'Lapangan sekolah'),
(2, 'Rohis', 'Setiap hari sabtu sore', 'Aula sekolah'),
(3, 'Seni Musik Tradisional', 'Sabtu dan Minggu', 'Auditorium Sekolah dan halte bus, di hutan bambu, di  dekat taman kota sambil nongkrong di area wifi gratis'),
(4, 'Seni Tari', 'Minggu', 'Aula Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `user_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `user_level`) VALUES
(1, 'Admin'),
(2, 'Pembina'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(3) NOT NULL,
  `id_pendaftaran` int(3) NOT NULL,
  `semester` enum('1','2','3','4','5','6') NOT NULL DEFAULT '1',
  `total_presensi` int(3) NOT NULL DEFAULT 0,
  `total_nilai_ujian` int(3) NOT NULL DEFAULT 0,
  `nilai_presensi` int(5) NOT NULL DEFAULT 0,
  `nilai_ujian` int(3) NOT NULL DEFAULT 0,
  `total` int(5) NOT NULL DEFAULT 0,
  `predikat` enum('E','D','C','B','A') NOT NULL DEFAULT 'E'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_pendaftaran`, `semester`, `total_presensi`, `total_nilai_ujian`, `nilai_presensi`, `nilai_ujian`, `total`, `predikat`) VALUES
(1, 1, '1', 4, 0, 0, 0, 0, 'E'),
(2, 2, '1', 2, 0, 0, 0, 0, 'E'),
(3, 3, '1', 1, 0, 0, 0, 0, 'E'),
(4, 13, '1', 2, 0, 0, 0, 0, 'E'),
(7, 16, '1', 3, 0, 0, 0, 0, 'E'),
(8, 16, '1', 2, 0, 0, 0, 0, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `pembina`
--

CREATE TABLE `pembina` (
  `id_pembina` int(2) NOT NULL,
  `id_level` int(2) NOT NULL DEFAULT 2,
  `id_ekskul` int(2) NOT NULL,
  `nama_pembina` varchar(30) NOT NULL,
  `nip` int(15) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `no_hp` int(13) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembina`
--

INSERT INTO `pembina` (`id_pembina`, `id_level`, `id_ekskul`, `nama_pembina`, `nip`, `jenis_kelamin`, `no_hp`, `username`, `password`) VALUES
(1, 2, 1, 'Joko Anwar', 4343434, 'Laki-laki', 111111111, 'joko123', '278ea841c0d133059032b8a75320c3e0'),
(4, 2, 3, 'Jaya Negara Band', 32324324, 'Laki-laki', 1231313323, 'abdi', '9e8a6110afe75f3a2458b0d99a62626f'),
(7, 2, 2, 'Revista Risky', 2312312, 'Perempuan', 321441, 'vista', 'c84336e42e11e11a24e0f9cd7aa70c02'),
(8, 2, 4, 'Pembina Seni Tari', 6235242, 'Laki-laki', 413131, 'pembinatari', '377a610343a9812be993e0e755b2e00f');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(3) NOT NULL,
  `id_siswa` int(3) NOT NULL,
  `id_ekskul` int(3) NOT NULL,
  `status_pendaftaran` enum('BELUM SELEKSI','LULUS','TIDAK LULUS') NOT NULL DEFAULT 'BELUM SELEKSI',
  `tanggal_pendaftaran` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_siswa`, `id_ekskul`, `status_pendaftaran`, `tanggal_pendaftaran`) VALUES
(1, 1, 1, 'LULUS', '2022-09-23 21:10:12'),
(2, 1, 2, 'LULUS', '2022-11-25 22:33:42'),
(3, 1, 3, 'LULUS', '2022-11-25 23:04:41'),
(8, 3, 4, 'LULUS', '2022-11-28 20:47:50'),
(11, 5, 3, 'TIDAK LULUS', '2022-11-28 22:30:41'),
(13, 3, 3, 'LULUS', '2022-11-30 21:45:09'),
(14, 13, 2, 'LULUS', '2022-12-06 13:31:18'),
(15, 3, 2, 'LULUS', '2022-12-06 13:50:54'),
(16, 13, 4, 'LULUS', '2022-12-07 22:10:11');

--
-- Triggers `pendaftaran`
--
DELIMITER $$
CREATE TRIGGER `tambah_presensi` AFTER INSERT ON `pendaftaran` FOR EACH ROW BEGIN
	INSERT INTO presensi(id_pendaftaran, tgl_presensi) VALUES(new.id_pendaftaran, now());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(4) NOT NULL,
  `id_pendaftaran` int(3) NOT NULL,
  `tgl_presensi` date NOT NULL DEFAULT current_timestamp(),
  `presensi_point` int(2) NOT NULL DEFAULT 0,
  `status_presensi` enum('Belum Hadir','Hadir','Tidak Hadir') NOT NULL DEFAULT 'Belum Hadir',
  `ket_presensi` enum('Izin','Sakit','Lain-lain') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_pendaftaran`, `tgl_presensi`, `presensi_point`, `status_presensi`, `ket_presensi`) VALUES
(1, 1, '2022-11-29', 1, 'Hadir', NULL),
(2, 2, '2022-11-29', 1, 'Hadir', NULL),
(3, 3, '2022-11-29', 1, 'Hadir', NULL),
(4, 1, '2022-11-29', 1, 'Tidak Hadir', 'Sakit'),
(5, 1, '2022-11-29', 1, 'Hadir', NULL),
(7, 13, '2022-11-30', 1, 'Hadir', NULL),
(8, 1, '2022-12-03', 0, 'Belum Hadir', ''),
(9, 8, '2022-12-05', 1, 'Hadir', NULL),
(10, 8, '2022-12-05', 0, 'Tidak Hadir', 'Sakit'),
(11, 8, '2022-12-05', 0, 'Belum Hadir', NULL),
(12, 14, '2022-12-06', 1, 'Hadir', NULL),
(13, 13, '2022-12-06', 1, 'Hadir', NULL),
(14, 2, '2022-12-06', 1, 'Hadir', NULL),
(15, 15, '2022-12-06', 1, 'Hadir', NULL),
(16, 14, '2022-12-13', 0, 'Belum Hadir', NULL),
(17, 2, '2022-12-13', 0, 'Belum Hadir', NULL),
(18, 15, '2022-12-13', 0, 'Belum Hadir', NULL),
(26, 3, '2022-12-07', 0, 'Belum Hadir', NULL),
(28, 16, '2022-12-07', 1, 'Hadir', NULL),
(29, 16, '2022-12-14', 0, 'Belum Hadir', NULL);

--
-- Triggers `presensi`
--
DELIMITER $$
CREATE TRIGGER `tambah_data_nilai` AFTER INSERT ON `presensi` FOR EACH ROW BEGIN
	INSERT INTO nilai(id_pendaftaran, total_presensi)
    VALUES(NEW.id_pendaftaran, 1);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_data_nilai` AFTER UPDATE ON `presensi` FOR EACH ROW BEGIN
	UPDATE nilai SET total_presensi = total_presensi + 1
    WHERE id_pendaftaran = NEW.id_pendaftaran;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_level` int(2) NOT NULL DEFAULT 3,
  `id_siswa` int(3) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `kelas` enum('X','XI','XII') NOT NULL,
  `ttl` text NOT NULL,
  `no_hp` int(13) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_level`, `id_siswa`, `nama_siswa`, `nis`, `jenis_kelamin`, `kelas`, `ttl`, `no_hp`, `username`, `password`) VALUES
(3, 1, 'Aceu', '123133', 'Laki-laki', 'X', 'Waole, 7 September 1999', 3244424, 'aceu123', '83f1b0e8d0912345de3c61497e25750c'),
(3, 3, 'IIzttimmy', '46553', 'Perempuan', 'XI', 'Sabo, 27 Agustus 1999', 2147483647, 'timy123', '58b66b1d7b8087b8e484ae1dc8044264'),
(3, 5, 'Aman mineral', '24223412', 'Laki-laki', 'XI', 'Sabo, 27 Agustus 1999', 3634533, 'amanminera', 'bd00eb0f2a3ce174d021c6c7a6163eba'),
(3, 6, 'Mineral aman', '3246452', 'Laki-laki', 'XII', 'Batauga, 7 Januari2004', 2342342, 'mineralama', '7671a6a3ffe5ded5911e86e2e5968d93'),
(3, 8, 'ImperialHal', '3352342', 'Laki-laki', 'XI', 'Sabo, 27 Agustus 1995', 231321634, 'hal', 'c74037e3e81ab0461d81f07c43ed3967'),
(3, 11, 'Hari Minggu', '23242424', 'Laki-laki', 'XI', 'Baruga, 7 Januari 2002', 432423242, 'minggu', '7336fab39ae864ca66c1f549431f13d9'),
(3, 12, 'Abu Rizal Bakrie', '24223412', 'Laki-laki', 'XII', 'Waole, 7 Januari 1988', 1234567890, 'arb', '1a53aa0e9d91d9ae3ceb902097b36571'),
(3, 13, 'Asasin', '1233455', 'Laki-laki', 'XII', 'Sabo, 27 Agustus 1994', 3131231, 'asasin', 'c4eabdc642206591769d2fa863e9cb39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `jenis_eskul`
--
ALTER TABLE `jenis_eskul`
  ADD PRIMARY KEY (`id_ekskul`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pembina`
--
ALTER TABLE `pembina`
  ADD PRIMARY KEY (`id_pembina`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis_eskul`
--
ALTER TABLE `jenis_eskul`
  MODIFY `id_ekskul` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembina`
--
ALTER TABLE `pembina`
  MODIFY `id_pembina` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

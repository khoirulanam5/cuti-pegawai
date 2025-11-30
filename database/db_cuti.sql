-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2024 at 07:15 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_devisi`
--

CREATE TABLE `tb_devisi` (
  `id_devisi` int(11) NOT NULL,
  `nm_devisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_devisi`
--

INSERT INTO `tb_devisi` (`id_devisi`, `nm_devisi`) VALUES
(2, 'Kesehatan Masyarakat'),
(1, 'Pelayanan dan SDK'),
(14, 'Pencegahan dan Pengendalian Penyakit'),
(3, 'PEPK'),
(13, 'Umum dan Kepegawaian');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_cuti`
--

CREATE TABLE `tb_jenis_cuti` (
  `id_jenis_cuti` int(11) NOT NULL,
  `nm_jenis_cuti` varchar(50) NOT NULL,
  `durasi_cuti_max` int(11) NOT NULL,
  `ket_jenis_cuti` text NOT NULL,
  `status_jenis_cuti` enum('Normatif','Non Normatif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_cuti`
--

INSERT INTO `tb_jenis_cuti` (`id_jenis_cuti`, `nm_jenis_cuti`, `durasi_cuti_max`, `ket_jenis_cuti`, `status_jenis_cuti`) VALUES
(1, 'Istri Melahirkan', 2, 'Untuk karyawan yang istrinya mau melahirkan', 'Normatif'),
(2, 'Menikahkan anak', 2, 'Untuk karyawan yang akan menikahkan anaknya', 'Normatif'),
(3, 'Menikah', 3, 'Untuk karyawan yang akan menikah', 'Normatif'),
(4, 'Kepentingan Pribadi', 2, 'Untuk urusan pribadi dan akan mengurangi jatah cuti tahunan', 'Normatif'),
(7, 'Sakit', 2, 'diharuskan membawa surat keterangan dari dokter', 'Normatif'),
(8, 'Anggota keluarga meninggal', 2, 'diberikan untuk karyawan yang anggota keluarganya meninggal', 'Normatif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_devisi` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `nm_karyawan` varchar(50) NOT NULL,
  `NIS` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `no_karyawan` varchar(15) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita','','') NOT NULL,
  `foto_karyawan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `id_user`, `id_devisi`, `jabatan`, `nm_karyawan`, `NIS`, `alamat`, `no_karyawan`, `jenis_kelamin`, `foto_karyawan`) VALUES
(10, 12, 13, 'Staff', 'Khoirul Anam', '2301', 'Jepara', '082323647641', 'Pria', '20231215144232__a.jpeg'),
(39, 19, 1, 'staff', 'ibu diana', '2024', 'kudus', '087789654367', 'Wanita', '20240107224749__WhatsApp Image 2023-06-03 at 15.07.44.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan_cuti`
--

CREATE TABLE `tb_pengajuan_cuti` (
  `id_pengajuan_cuti` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_jenis_cuti` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_validasi` date NOT NULL,
  `tgl_cuti_awal` date NOT NULL,
  `tgl_cuti_akhir` date NOT NULL,
  `lama_cuti` int(11) NOT NULL,
  `keperluan_cuti` text NOT NULL,
  `validasi_admin` varchar(50) NOT NULL,
  `validasi_pemimpin` varchar(50) NOT NULL,
  `status_pengajuan` enum('Pengajuan','Proses','Diterima','Ditolak') NOT NULL,
  `ket_status` text NOT NULL,
  `foto_bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengajuan_cuti`
--

INSERT INTO `tb_pengajuan_cuti` (`id_pengajuan_cuti`, `id_karyawan`, `id_jenis_cuti`, `tgl_pengajuan`, `tgl_validasi`, `tgl_cuti_awal`, `tgl_cuti_akhir`, `lama_cuti`, `keperluan_cuti`, `validasi_admin`, `validasi_pemimpin`, `status_pengajuan`, `ket_status`, `foto_bukti`) VALUES
(219, 39, 4, '2024-01-08', '2024-01-08', '2024-01-09', '2024-01-10', 2, '', 'acc', 'acc', 'Diterima', '', '../../assets/foto_bukti/me.jpg'),
(224, 39, 3, '2024-01-08', '0000-00-00', '2024-01-16', '2024-01-18', 3, '', '', '', 'Pengajuan', '', '../../assets/foto_bukti/WhatsApp Image 2023-11-28 at 02.14.20(1).jpeg'),
(225, 10, 4, '2024-09-04', '0000-00-00', '2024-09-05', '2024-09-06', 2, '', '', '', 'Pengajuan', '', '../../assets/foto_bukti/perpus.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nm_pengguna` varchar(50) NOT NULL,
  `level` enum('karyawan','pemimpin','admin','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nm_pengguna`, `level`) VALUES
(1, 'pemimpin', 'pemimpin', 'Andini Aridewi', 'pemimpin'),
(2, 'admin', 'admin', 'Dyah Anggraeni', 'admin'),
(12, 'anam', '123', 'Khoirul Anam', 'karyawan'),
(19, 'diana', '123', 'ibu diana', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_devisi`
--
ALTER TABLE `tb_devisi`
  ADD PRIMARY KEY (`id_devisi`),
  ADD UNIQUE KEY `nm_devisi_3` (`nm_devisi`),
  ADD KEY `nm_devisi` (`nm_devisi`),
  ADD KEY `nm_devisi_2` (`nm_devisi`);

--
-- Indexes for table `tb_jenis_cuti`
--
ALTER TABLE `tb_jenis_cuti`
  ADD PRIMARY KEY (`id_jenis_cuti`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `no_karyawan` (`no_karyawan`),
  ADD UNIQUE KEY `NIS` (`NIS`);

--
-- Indexes for table `tb_pengajuan_cuti`
--
ALTER TABLE `tb_pengajuan_cuti`
  ADD PRIMARY KEY (`id_pengajuan_cuti`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_devisi`
--
ALTER TABLE `tb_devisi`
  MODIFY `id_devisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_jenis_cuti`
--
ALTER TABLE `tb_jenis_cuti`
  MODIFY `id_jenis_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_pengajuan_cuti`
--
ALTER TABLE `tb_pengajuan_cuti`
  MODIFY `id_pengajuan_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

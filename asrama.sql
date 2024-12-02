-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 05:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asrama`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(12) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `password_admin` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `jenis_kelamin`, `password_admin`) VALUES
(1, 'admin1', 'L', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `isi_berita` varchar(5000) NOT NULL,
  `tanggal_berita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen_pengajar`
--

CREATE TABLE `dosen_pengajar` (
  `NIP` varchar(50) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakulikuler`
--

CREATE TABLE `ekstrakulikuler` (
  `id_ekstrakulikuler` varchar(10) NOT NULL,
  `nama_ekstrakulikuler` varchar(100) NOT NULL,
  `jadwal_ekstrakulikuler` date DEFAULT NULL,
  `dosen_NIP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakulikuler_fasilitas`
--

CREATE TABLE `ekstrakulikuler_fasilitas` (
  `id_ekstrakulikuler` varchar(10) NOT NULL,
  `id_fasilitas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` varchar(10) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `jumlah_fasilitas` int(11) NOT NULL,
  `id_gedung` int(11) NOT NULL,
  `aturan_penggunaan` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `jumlah_fasilitas`, `id_gedung`, `aturan_penggunaan`) VALUES
('1', 'sound', 12, 1, 'dikembalikan'),
('2', 'meja', 2, 1, 'dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` int(10) NOT NULL,
  `nama_gedung` varchar(50) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `jumlah_lantai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `nama_gedung`, `jumlah_kamar`, `jumlah_lantai`) VALUES
(1, 'gedung A', 50, 4),
(2, 'gedung B', 50, 4),
(3, 'gedung C', 50, 4),
(4, 'gedung D', 50, 4),
(5, 'gedung E', 50, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `no_kamar` varchar(10) NOT NULL,
  `lantai` int(11) NOT NULL,
  `status_kamar` enum('Tersedia','Penuh','Kosong') NOT NULL,
  `id_gedung` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`no_kamar`, `lantai`, `status_kamar`, `id_gedung`) VALUES
('001', 1, 'Tersedia', 1),
('002', 1, 'Tersedia', 1),
('003', 1, 'Tersedia', 1),
('004', 1, 'Tersedia', 1),
('005', 1, 'Tersedia', 1),
('006', 1, 'Tersedia', 1),
('007', 1, 'Tersedia', 1),
('008', 1, 'Tersedia', 1),
('009', 1, 'Tersedia', 1),
('010', 1, 'Tersedia', 1),
('011', 2, 'Tersedia', 1),
('012', 2, 'Tersedia', 1),
('013', 2, 'Tersedia', 1),
('014', 2, 'Tersedia', 1),
('015', 2, 'Tersedia', 1),
('016', 2, 'Tersedia', 1),
('017', 2, 'Tersedia', 1),
('018', 2, 'Tersedia', 1),
('019', 2, 'Tersedia', 1),
('020', 2, 'Tersedia', 1),
('021', 3, 'Tersedia', 1),
('022', 3, 'Tersedia', 1),
('023', 3, 'Tersedia', 1),
('024', 3, 'Tersedia', 1),
('025', 3, 'Tersedia', 1),
('026', 3, 'Tersedia', 1),
('027', 3, 'Tersedia', 1),
('028', 3, 'Tersedia', 1),
('029', 3, 'Tersedia', 1),
('030', 3, 'Tersedia', 1),
('031', 4, 'Tersedia', 1),
('032', 4, 'Tersedia', 1),
('033', 4, 'Tersedia', 1),
('034', 4, 'Tersedia', 1),
('035', 4, 'Tersedia', 1),
('036', 4, 'Tersedia', 1),
('037', 4, 'Tersedia', 1),
('038', 4, 'Tersedia', 1),
('039', 4, 'Tersedia', 1),
('040', 4, 'Tersedia', 1),
('041', 5, 'Tersedia', 1),
('042', 5, 'Tersedia', 1),
('043', 5, 'Tersedia', 1),
('044', 5, 'Tersedia', 1),
('045', 5, 'Tersedia', 1),
('046', 5, 'Tersedia', 1),
('047', 5, 'Tersedia', 1),
('048', 5, 'Tersedia', 1),
('049', 5, 'Tersedia', 1),
('050', 5, 'Tersedia', 1),
('051', 1, 'Tersedia', 2),
('052', 1, 'Tersedia', 2),
('053', 1, 'Tersedia', 2),
('054', 1, 'Tersedia', 2),
('055', 1, 'Tersedia', 2),
('056', 1, 'Tersedia', 2),
('057', 1, 'Tersedia', 2),
('058', 1, 'Tersedia', 2),
('059', 1, 'Tersedia', 2),
('060', 1, 'Tersedia', 2),
('061', 2, 'Tersedia', 2),
('062', 2, 'Tersedia', 2),
('063', 2, 'Tersedia', 2),
('064', 2, 'Tersedia', 2),
('065', 2, 'Tersedia', 2),
('066', 2, 'Tersedia', 2),
('067', 2, 'Tersedia', 2),
('068', 2, 'Tersedia', 2),
('069', 2, 'Tersedia', 2),
('070', 2, 'Tersedia', 2),
('071', 3, 'Tersedia', 2),
('072', 3, 'Tersedia', 2),
('073', 3, 'Tersedia', 2),
('074', 3, 'Tersedia', 2),
('075', 3, 'Tersedia', 2),
('076', 3, 'Tersedia', 2),
('077', 3, 'Tersedia', 2),
('078', 3, 'Tersedia', 2),
('079', 3, 'Tersedia', 2),
('080', 3, 'Tersedia', 2),
('081', 4, 'Tersedia', 2),
('082', 4, 'Tersedia', 2),
('083', 4, 'Tersedia', 2),
('084', 4, 'Tersedia', 2),
('085', 4, 'Tersedia', 2),
('086', 4, 'Tersedia', 2),
('087', 4, 'Tersedia', 2),
('088', 4, 'Tersedia', 2),
('089', 4, 'Tersedia', 2),
('090', 4, 'Tersedia', 2),
('091', 5, 'Tersedia', 2),
('092', 5, 'Tersedia', 2),
('093', 5, 'Tersedia', 2),
('094', 5, 'Tersedia', 2),
('095', 5, 'Tersedia', 2),
('096', 5, 'Tersedia', 2),
('097', 5, 'Tersedia', 2),
('098', 5, 'Tersedia', 2),
('099', 5, 'Tersedia', 2),
('100', 5, 'Tersedia', 2),
('101', 1, 'Tersedia', 3),
('102', 1, 'Tersedia', 3),
('103', 1, 'Tersedia', 3),
('104', 1, 'Tersedia', 3),
('105', 1, 'Tersedia', 3),
('106', 1, 'Tersedia', 3),
('107', 1, 'Tersedia', 3),
('108', 1, 'Tersedia', 3),
('109', 1, 'Tersedia', 3),
('110', 1, 'Tersedia', 3),
('111', 2, 'Tersedia', 3),
('112', 2, 'Tersedia', 3),
('113', 2, 'Tersedia', 3),
('114', 2, 'Tersedia', 3),
('115', 2, 'Tersedia', 3),
('116', 2, 'Tersedia', 3),
('117', 2, 'Tersedia', 3),
('118', 2, 'Tersedia', 3),
('119', 2, 'Tersedia', 3),
('120', 2, 'Tersedia', 3),
('121', 3, 'Tersedia', 3),
('122', 3, 'Tersedia', 3),
('123', 3, 'Tersedia', 3),
('124', 3, 'Tersedia', 3),
('125', 3, 'Tersedia', 3),
('126', 3, 'Tersedia', 3),
('127', 3, 'Tersedia', 3),
('128', 3, 'Tersedia', 3),
('129', 3, 'Tersedia', 3),
('130', 3, 'Tersedia', 3),
('131', 4, 'Tersedia', 3),
('132', 4, 'Tersedia', 3),
('133', 4, 'Tersedia', 3),
('134', 4, 'Tersedia', 3),
('135', 4, 'Tersedia', 3),
('136', 4, 'Tersedia', 3),
('137', 4, 'Tersedia', 3),
('138', 4, 'Tersedia', 3),
('139', 4, 'Tersedia', 3),
('140', 4, 'Tersedia', 3),
('141', 5, 'Tersedia', 3),
('142', 5, 'Tersedia', 3),
('143', 5, 'Tersedia', 3),
('144', 5, 'Tersedia', 3),
('145', 5, 'Tersedia', 3),
('146', 5, 'Tersedia', 3),
('147', 5, 'Tersedia', 3),
('148', 5, 'Tersedia', 3),
('149', 5, 'Tersedia', 3),
('150', 5, 'Tersedia', 3),
('151', 1, 'Tersedia', 4),
('152', 1, 'Tersedia', 4),
('153', 1, 'Tersedia', 4),
('154', 1, 'Tersedia', 4),
('155', 1, 'Tersedia', 4),
('156', 1, 'Tersedia', 4),
('157', 1, 'Tersedia', 4),
('158', 1, 'Tersedia', 4),
('159', 1, 'Tersedia', 4),
('160', 1, 'Tersedia', 4),
('161', 2, 'Tersedia', 4),
('162', 2, 'Tersedia', 4),
('163', 2, 'Tersedia', 4),
('164', 2, 'Tersedia', 4),
('165', 2, 'Tersedia', 4),
('166', 2, 'Tersedia', 4),
('167', 2, 'Tersedia', 4),
('168', 2, 'Tersedia', 4),
('169', 2, 'Tersedia', 4),
('170', 2, 'Tersedia', 4),
('171', 3, 'Tersedia', 4),
('172', 3, 'Tersedia', 4),
('173', 3, 'Tersedia', 4),
('174', 3, 'Tersedia', 4),
('175', 3, 'Tersedia', 4),
('176', 3, 'Tersedia', 4),
('177', 3, 'Tersedia', 4),
('178', 3, 'Tersedia', 4),
('179', 3, 'Tersedia', 4),
('180', 3, 'Tersedia', 4),
('181', 4, 'Tersedia', 4),
('182', 4, 'Tersedia', 4),
('183', 4, 'Tersedia', 4),
('184', 4, 'Tersedia', 4),
('185', 4, 'Tersedia', 4),
('186', 4, 'Tersedia', 4),
('187', 4, 'Tersedia', 4),
('188', 4, 'Tersedia', 4),
('189', 4, 'Tersedia', 4),
('190', 4, 'Tersedia', 4),
('191', 5, 'Tersedia', 4),
('192', 5, 'Tersedia', 4),
('193', 5, 'Tersedia', 4),
('194', 5, 'Tersedia', 4),
('195', 5, 'Tersedia', 4),
('196', 5, 'Tersedia', 4),
('197', 5, 'Tersedia', 4),
('198', 5, 'Tersedia', 4),
('199', 5, 'Tersedia', 4),
('200', 5, 'Tersedia', 4),
('201', 1, 'Tersedia', 5),
('202', 1, 'Tersedia', 5),
('203', 1, 'Tersedia', 5),
('204', 1, 'Tersedia', 5),
('205', 1, 'Tersedia', 5),
('206', 1, 'Tersedia', 5),
('207', 1, 'Tersedia', 5),
('208', 1, 'Tersedia', 5),
('209', 1, 'Tersedia', 5),
('210', 1, 'Tersedia', 5),
('211', 2, 'Tersedia', 5),
('212', 2, 'Tersedia', 5),
('213', 2, 'Tersedia', 5),
('214', 2, 'Tersedia', 5),
('215', 2, 'Tersedia', 5),
('216', 2, 'Tersedia', 5),
('217', 2, 'Tersedia', 5),
('218', 2, 'Tersedia', 5),
('219', 2, 'Tersedia', 5),
('220', 2, 'Tersedia', 5),
('221', 3, 'Tersedia', 5),
('222', 3, 'Tersedia', 5),
('223', 3, 'Tersedia', 5),
('224', 3, 'Tersedia', 5),
('225', 3, 'Tersedia', 5),
('226', 3, 'Tersedia', 5),
('227', 3, 'Tersedia', 5),
('228', 3, 'Tersedia', 5),
('229', 3, 'Tersedia', 5),
('230', 3, 'Tersedia', 5),
('231', 4, 'Tersedia', 5),
('232', 4, 'Tersedia', 5),
('233', 4, 'Tersedia', 5),
('234', 4, 'Tersedia', 5),
('235', 4, 'Tersedia', 5),
('236', 4, 'Tersedia', 5),
('237', 4, 'Tersedia', 5),
('238', 4, 'Tersedia', 5),
('239', 4, 'Tersedia', 5),
('240', 4, 'Tersedia', 5),
('241', 5, 'Tersedia', 5),
('242', 5, 'Tersedia', 5),
('243', 5, 'Tersedia', 5),
('244', 5, 'Tersedia', 5),
('245', 5, 'Tersedia', 5),
('246', 5, 'Tersedia', 5),
('247', 5, 'Tersedia', 5),
('248', 5, 'Tersedia', 5),
('249', 5, 'Tersedia', 5),
('250', 5, 'Tersedia', 5);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `isi_komentar` varchar(1000) NOT NULL,
  `id_berita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_warga`
--

CREATE TABLE `komentar_warga` (
  `nim_warga` varchar(50) NOT NULL,
  `id_komentar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(15) NOT NULL,
  `nim_warga` varchar(50) DEFAULT NULL,
  `nominal` int(12) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nim_warga`, `nominal`, `tanggal_pembayaran`, `metode_pembayaran`) VALUES
('1', '230411100040', 100000, '2024-11-24', 'bank'),
('2', '23000000012', 10000000, '2024-11-24', 'Transfer Bank'),
('3', '230411100041', 10000000, '2024-11-24', 'E-Wallet');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `nim_pengurus` varchar(50) NOT NULL,
  `password_pengurus` varchar(250) NOT NULL,
  `nama_pengurus` varchar(100) NOT NULL,
  `jurusan_pengurus` varchar(50) DEFAULT NULL,
  `nomor_handphone_pengurus` varchar(13) NOT NULL,
  `jenis_kelamin_pengurus` enum('L','P') NOT NULL,
  `alamat_pengurus` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`nim_pengurus`, `password_pengurus`, `nama_pengurus`, `jurusan_pengurus`, `nomor_handphone_pengurus`, `jenis_kelamin_pengurus`, `alamat_pengurus`) VALUES
('230000000', '202cb962ac59075b964b07152d234b70', 'pengurus 1', 'opsional', '1', 'L', 'surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `warga_asrama`
--

CREATE TABLE `warga_asrama` (
  `nim_warga` varchar(50) NOT NULL,
  `nama_warga` varchar(100) NOT NULL,
  `jurusan_warga` varchar(50) NOT NULL,
  `alamat_warga` text DEFAULT NULL,
  `password_warga` varchar(100) NOT NULL,
  `jenis_kelamin_warga` enum('Laki-laki','Perempuan') NOT NULL,
  `nomor_handphone_warga` varchar(13) NOT NULL,
  `no_kamar` varchar(10) DEFAULT NULL,
  `nim_pengurus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warga_asrama`
--

INSERT INTO `warga_asrama` (`nim_warga`, `nama_warga`, `jurusan_warga`, `alamat_warga`, `password_warga`, `jenis_kelamin_warga`, `nomor_handphone_warga`, `no_kamar`, `nim_pengurus`) VALUES
('23000000012', 'fathan', 'S1 Teknik Informatika', 'lumajang', '202cb962ac59075b964b07152d234b70', 'Laki-laki', '0832193076651', '101', '230000000'),
('230411100040', 'M. ALDI RAHMANDIKA', 'S1 Teknik Informatika', 'Blitar', '202cb962ac59075b964b07152d234b70', 'Laki-laki', '0881036126291', '101', '230000000'),
('230411100041', 'rohman', 'S1 Sastra Inggris', 'surabaya', '202cb962ac59075b964b07152d234b70', 'Laki-laki', '0881036126290', '101', '230000000'),
('230411100042', 'RAFI ARIFUDIN', 'S1 Psikologi', 'blitar', '202cb962ac59075b964b07152d234b70', 'Laki-laki', '0881036126290', '101', '230000000');

--
-- Triggers `warga_asrama`
--
DELIMITER $$
CREATE TRIGGER `update_status_kamar_insert` AFTER INSERT ON `warga_asrama` FOR EACH ROW BEGIN
    DECLARE jumlah INT;
    
    -- Hitung jumlah penghuni kamar
    SELECT COUNT(*) INTO jumlah FROM warga_asrama WHERE no_kamar = NEW.no_kamar;
    
    -- Update status kamar jika jumlah mencapai 6
    IF jumlah >= 6 THEN
        UPDATE kamar SET status_kamar = 'Penuh' WHERE no_kamar = NEW.no_kamar;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_status_kamar_update` AFTER UPDATE ON `warga_asrama` FOR EACH ROW BEGIN
    DECLARE jumlah INT;
    
    -- Jika kamar berubah (perhatikan perbedaan dengan trigger insert)
    IF NEW.no_kamar != OLD.no_kamar THEN
        -- Hitung jumlah penghuni di kamar baru
        SELECT COUNT(*) INTO jumlah FROM warga_asrama WHERE no_kamar = NEW.no_kamar;
        
        -- Update status kamar jika jumlah penghuni mencapai 6
        IF jumlah >= 6 THEN
            UPDATE kamar SET status_kamar = 'Penuh' WHERE no_kamar = NEW.no_kamar;
        END IF;
    END IF;
    
    -- Jika penghuni keluar dan kamar menjadi kosong, update menjadi tersedia
    IF OLD.no_kamar != NEW.no_kamar THEN
        SELECT COUNT(*) INTO jumlah FROM warga_asrama WHERE no_kamar = OLD.no_kamar;
        IF jumlah = 0 THEN
            UPDATE kamar SET status_kamar = 'Tersisa' WHERE no_kamar = OLD.no_kamar;
        END IF;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `warga_ekstrakulikuler`
--

CREATE TABLE `warga_ekstrakulikuler` (
  `nim_warga` varchar(50) NOT NULL,
  `id_ekstrakulikuler` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `dosen_pengajar`
--
ALTER TABLE `dosen_pengajar`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD PRIMARY KEY (`id_ekstrakulikuler`),
  ADD KEY `dosen_NIP` (`dosen_NIP`);

--
-- Indexes for table `ekstrakulikuler_fasilitas`
--
ALTER TABLE `ekstrakulikuler_fasilitas`
  ADD PRIMARY KEY (`id_ekstrakulikuler`,`id_fasilitas`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`no_kamar`),
  ADD KEY `id_gedung` (`id_gedung`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_berita` (`id_berita`);

--
-- Indexes for table `komentar_warga`
--
ALTER TABLE `komentar_warga`
  ADD PRIMARY KEY (`nim_warga`,`id_komentar`),
  ADD KEY `id_komentar` (`id_komentar`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `nim_warga` (`nim_warga`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`nim_pengurus`);

--
-- Indexes for table `warga_asrama`
--
ALTER TABLE `warga_asrama`
  ADD PRIMARY KEY (`nim_warga`),
  ADD KEY `no_kamar` (`no_kamar`),
  ADD KEY `nim_pengurus` (`nim_pengurus`);

--
-- Indexes for table `warga_ekstrakulikuler`
--
ALTER TABLE `warga_ekstrakulikuler`
  ADD PRIMARY KEY (`nim_warga`,`id_ekstrakulikuler`),
  ADD KEY `id_ekstrakulikuler` (`id_ekstrakulikuler`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id_gedung` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD CONSTRAINT `ekstrakulikuler_ibfk_1` FOREIGN KEY (`dosen_NIP`) REFERENCES `dosen_pengajar` (`NIP`);

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_gedung`) REFERENCES `gedung` (`id_gedung`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`);

--
-- Constraints for table `komentar_warga`
--
ALTER TABLE `komentar_warga`
  ADD CONSTRAINT `komentar_warga_ibfk_1` FOREIGN KEY (`nim_warga`) REFERENCES `warga_asrama` (`nim_warga`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_warga_ibfk_2` FOREIGN KEY (`id_komentar`) REFERENCES `komentar` (`id_komentar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`nim_warga`) REFERENCES `warga_asrama` (`nim_warga`);

--
-- Constraints for table `warga_asrama`
--
ALTER TABLE `warga_asrama`
  ADD CONSTRAINT `warga_asrama_ibfk_1` FOREIGN KEY (`no_kamar`) REFERENCES `kamar` (`no_kamar`),
  ADD CONSTRAINT `warga_asrama_ibfk_2` FOREIGN KEY (`nim_pengurus`) REFERENCES `pengurus` (`nim_pengurus`);

--
-- Constraints for table `warga_ekstrakulikuler`
--
ALTER TABLE `warga_ekstrakulikuler`
  ADD CONSTRAINT `warga_ekstrakulikuler_ibfk_1` FOREIGN KEY (`nim_warga`) REFERENCES `warga_asrama` (`nim_warga`),
  ADD CONSTRAINT `warga_ekstrakulikuler_ibfk_2` FOREIGN KEY (`id_ekstrakulikuler`) REFERENCES `ekstrakulikuler` (`id_ekstrakulikuler`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

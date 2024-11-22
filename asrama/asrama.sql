-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 10:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS asrama;
CREATE DATABASE asrama;
USE asrama;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

-- Table structure for table `admin`
CREATE TABLE `admin` (
  `id_admin` INT(12) NOT NULL AUTO_INCREMENT,
  `nama_admin` VARCHAR(100) NOT NULL,
  `jenis_kelamin` ENUM('L', 'P') NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `berita`
CREATE TABLE `berita` (
  `id_berita` INT(11) NOT NULL AUTO_INCREMENT,
  `judul_berita` VARCHAR(255) NOT NULL,
  `isi_berita` TEXT NOT NULL,
  `tanggal_berita` DATE NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `dosen_pengajar`
CREATE TABLE `dosen_pengajar` (
  `NIP` BIGINT NOT NULL,
  `nama_dosen` VARCHAR(200) NOT NULL,
  `alamat` TEXT DEFAULT NULL,
  `jenis_kelamin` ENUM('Laki-laki', 'Perempuan') NOT NULL,
  PRIMARY KEY (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `ekstrakulikuler`
CREATE TABLE `ekstrakulikuler` (
  `id_ekstrakulikuler` CHAR(10) NOT NULL,
  `nama_ekstrakulikuler` VARCHAR(150) NOT NULL,
  `jadwal_ekstrakulikuler` DATETIME DEFAULT NULL,
  `dosen_NIP` BIGINT NOT NULL,
  PRIMARY KEY (`id_ekstrakulikuler`),
  KEY `dosen_NIP` (`dosen_NIP`),
  CONSTRAINT `fk_ekstra_dosen` FOREIGN KEY (`dosen_NIP`) REFERENCES `dosen_pengajar` (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `kamar`
CREATE TABLE `kamar` (
  `no_kamar` CHAR(10) NOT NULL,
  `lantai` TINYINT NOT NULL,
  `status_kamar` ENUM('Tersedia', 'Penuh', 'Kosong') NOT NULL,
  `id_gedung` INT(10) NOT NULL,
  PRIMARY KEY (`no_kamar`),
  KEY `id_gedung` (`id_gedung`),
  CONSTRAINT `fk_kamar_gedung` FOREIGN KEY (`id_gedung`) REFERENCES `gedung` (`id_gedung`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `gedung`
CREATE TABLE `gedung` (
  `id_gedung` INT(10) NOT NULL AUTO_INCREMENT,
  `nama_gedung` VARCHAR(100) NOT NULL,
  `jumlah_kamar` SMALLINT NOT NULL,
  `jumlah_lantai` TINYINT NOT NULL,
  PRIMARY KEY (`id_gedung`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Insert sample data for `gedung`
INSERT INTO `gedung` (`id_gedung`, `nama_gedung`, `jumlah_kamar`, `jumlah_lantai`) VALUES
(1, 'Gedung A', 20, 3);

-- --------------------------------------------------------

-- Triggers for updating `kamar` status
DELIMITER $$
CREATE TRIGGER `update_status_kamar_insert` AFTER INSERT ON `warga_asrama`
FOR EACH ROW
BEGIN
  DECLARE jumlah INT;

  SELECT COUNT(*) INTO jumlah FROM warga_asrama WHERE no_kamar = NEW.no_kamar;

  IF jumlah >= 6 THEN
    UPDATE kamar SET status_kamar = 'Penuh' WHERE no_kamar = NEW.no_kamar;
  END IF;
END;
$$
DELIMITER ;

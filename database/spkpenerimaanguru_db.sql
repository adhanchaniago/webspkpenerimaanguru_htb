-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2020 at 04:58 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spkpenerimaanguru_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE IF NOT EXISTS `t_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id`, `userid`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_calonguru`
--

CREATE TABLE IF NOT EXISTS `t_calonguru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_calonguru` char(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` int(11) NOT NULL,
  `jenkel` varchar(16) NOT NULL,
  `masa_kerja_tahun` int(11) NOT NULL,
  `masa_kerja_bulan` int(11) NOT NULL,
  PRIMARY KEY (`no_calonguru`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `t_calonguru`
--

INSERT INTO `t_calonguru` (`id`, `no_calonguru`, `nama_lengkap`, `alamat`, `no_telp`, `jenkel`, `masa_kerja_tahun`, `masa_kerja_bulan`) VALUES
(6, '01092019', 'Sarjana Muda Belom Kelar, S. Kom, M. Kom', 'Jl. Kita Masih Panjang', 1234, 'Laki-Laki', 90, 90),
(4, '010996', 'Sarjana Muda, S. Kom', 'Jl. Kita Masih Panjang', 2147483647, 'Laki-Laki', 23, 23),
(1, '1122344', 'Khoirul Anwar', 'Jl. Kita Belom Berakhir', 1234, 'Laki-Laki', 100, 6),
(7, '87578', 'ghgj', 'jkgjkgj', 23232, 'Laki-Laki', 23, 23);

-- --------------------------------------------------------

--
-- Table structure for table `t_data_kelulusan`
--

CREATE TABLE IF NOT EXISTS `t_data_kelulusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periode` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `no_calonguru` char(16) NOT NULL,
  `nilai` float NOT NULL,
  `status` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=186 ;

--
-- Dumping data for table `t_data_kelulusan`
--

INSERT INTO `t_data_kelulusan` (`id`, `periode`, `tahun`, `no_calonguru`, `nilai`, `status`) VALUES
(183, 1, 2019, '01092019', 100, 'lulus'),
(184, 1, 2019, '010996', 66.6, 'lulus'),
(185, 1, 2019, '87578', 40, 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `t_komponen_penilaian`
--

CREATE TABLE IF NOT EXISTS `t_komponen_penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(11) NOT NULL,
  `aspek_penilaian` varchar(1000) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `bobot` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `t_komponen_penilaian`
--

INSERT INTO `t_komponen_penilaian` (`id`, `kode`, `aspek_penilaian`, `deskripsi`, `bobot`) VALUES
(1, 'C1', 'TES AKADEMIK', 'BENEFIT', 25),
(2, 'C2', 'TES PRAKTEK MENGAJAR', 'BENEFIT', 15),
(3, 'C3', 'PENGALAMAN MENGAJAR', 'BENEFIT', 30),
(4, 'C4', 'NILAI IPK', 'BENEFIT', 10),
(5, 'C5', 'Wawancara', 'BENEFIT', 20);

-- --------------------------------------------------------

--
-- Table structure for table `t_nilai_calonguru`
--

CREATE TABLE IF NOT EXISTS `t_nilai_calonguru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periode` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `no_calonguru` char(16) NOT NULL,
  `id_aspek` int(11) NOT NULL,
  `keterangannilai` varchar(50) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `t_nilai_calonguru`
--

INSERT INTO `t_nilai_calonguru` (`id`, `periode`, `tahun`, `no_calonguru`, `id_aspek`, `keterangannilai`, `nilai`) VALUES
(41, 1, 2019, '01092019', 1, '=>85', 4),
(42, 1, 2019, '01092019', 2, '=>85', 4),
(43, 1, 2019, '01092019', 3, '=> 1 Tahun', 4),
(44, 1, 2019, '01092019', 4, '3.60 - 4.00 ', 4),
(45, 1, 2019, '01092019', 5, '65-74', 3),
(46, 1, 2019, '010996', 1, '75-84', 3),
(47, 1, 2019, '010996', 2, '75-84', 3),
(48, 1, 2019, '010996', 3, '6 - 11 Bulan', 3),
(49, 1, 2019, '010996', 4, '3.20 - 3.59 ', 3),
(50, 1, 2019, '010996', 5, '<= 64', 1),
(55, 1, 2019, '87578', 1, '=>85', 4),
(56, 1, 2019, '87578', 2, '=>85', 4);

-- --------------------------------------------------------

--
-- Table structure for table `t_nilai_minimum_kelulusan`
--

CREATE TABLE IF NOT EXISTS `t_nilai_minimum_kelulusan` (
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_nilai_minimum_kelulusan`
--

INSERT INTO `t_nilai_minimum_kelulusan` (`nilai`) VALUES
(50);

-- --------------------------------------------------------

--
-- Table structure for table `t_periode`
--

CREATE TABLE IF NOT EXISTS `t_periode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periode` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `status` varchar(9) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_periode`
--

INSERT INTO `t_periode` (`id`, `periode`, `tahun`, `status`) VALUES
(1, 1, 2019, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `t_subkriteria`
--

CREATE TABLE IF NOT EXISTS `t_subkriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aspek_penilaian` varchar(50) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `nilai` varchar(20) NOT NULL,
  `keterangannilai` varchar(50) NOT NULL,
  `bobot` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `t_subkriteria`
--

INSERT INTO `t_subkriteria` (`id`, `aspek_penilaian`, `kode`, `nilai`, `keterangannilai`, `bobot`) VALUES
(1, 'TES AKADEMIK', 'C1', '=>85', 'Sangat Baik', 4),
(2, 'TES AKADEMIK', 'C1', '75-84', 'Baik', 3),
(3, 'TES AKADEMIK', 'C1', '65-74', 'Cukup', 2),
(4, 'TES AKADEMIK', 'C1', '<=64', 'Buruk', 1),
(5, 'TES PRAKTEK MENGAJAR', 'C2', '=85', 'Sangat Baik', 4),
(6, 'TES PRAKTEK MENGAJAR', 'C2', '75-84', 'Baik', 3),
(7, 'TES PRAKTEK MENGAJAR', 'C2', '65-74', 'Cukup', 2),
(8, 'TES PRAKTEK MENGAJAR', 'C2', '<=64', 'Buruk', 1),
(9, 'PENGALAMAN MENGAJAR', 'C3', '=> 1 Tahun', 'Sangat Baik', 4),
(10, 'PENGALAMAN MENGAJAR', 'C3', '6 - 11 Bulan', 'Baik', 3),
(11, 'PENGALAMAN MENGAJAR', 'C3', '4 - 7 Bulan', 'Cukup', 2),
(12, 'PENGALAMAN MENGAJAR', 'C3', '0 - 3 Bulan', 'Buruk', 1),
(13, 'NILAI IPK', 'C4', '3.60 - 4.00 ', 'Sangat Baik', 4),
(14, 'NILAI IPK', 'C4', '3.20 - 3.59 ', 'Baik', 3),
(15, 'NILAI IPK', 'C4', '2.80 - 3.19', 'Cukup', 2),
(16, 'NILAI IPK', 'C4', '<= 2.80', 'Buruk', 1),
(17, 'Wawancara', 'C5', '=> 85', 'Sangat Baik', 4),
(18, 'Wawancara', 'C5', '75 - 84', 'Baik', 3),
(19, 'Wawancara', 'C5', '65 - 74', 'Cukup', 2),
(20, 'Wawancara', 'C5', '<= 64', 'Buruk', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

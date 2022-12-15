-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2022 at 07:49 PM
-- Server version: 8.0.23
-- PHP Version: 7.3.24-(to be removed in future macOS)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_ternak`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot_ternak`
--

CREATE TABLE `bobot_ternak` (
  `id_bobot` int NOT NULL,
  `tanggal_timbang` date NOT NULL,
  `id_ternak` int NOT NULL,
  `umur_timbang` int DEFAULT NULL,
  `bobot` int NOT NULL,
  `hamil` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `data_peternak`
--

CREATE TABLE `data_peternak` (
  `id` int NOT NULL,
  `inisial_peternakan` varchar(100) NOT NULL,
  `nama_peternakan` varchar(100) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telpon` varchar(100) NOT NULL,
  `asosiasi` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `logo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_peternak`
--

INSERT INTO `data_peternak` (`id`, `inisial_peternakan`, `nama_peternakan`, `pemilik`, `email`, `no_telpon`, `asosiasi`, `logo`) VALUES
(1, 'AF', 'Arjuna Farm', 'Drs. Suhairi, M.Pd.', 'arjunafarm@gmail.com', '085362452311', 'HPDKI', 'arjuna_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `diet_ternak`
--

CREATE TABLE `diet_ternak` (
  `hari` varchar(40) NOT NULL,
  `waktu_pemberian` time NOT NULL,
  `kandang` int NOT NULL,
  `pakan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_diet` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diet_ternak`
--

INSERT INTO `diet_ternak` (`hari`, `waktu_pemberian`, `kandang`, `pakan`, `id_diet`) VALUES
('Setiap Hari', '07:00:00', 1, 'Konsentrat dan Silase', 7),
('Setiap Hari', '16:00:00', 1, 'Konsentrat dan Silase', 9),
('Setiap Hari', '07:00:00', 7, 'Konsentrat dan Silase', 11),
('Setiap Hari', '16:00:00', 7, 'Konsentrat dan Silase', 12),
('Setiap Hari', '07:00:00', 13, 'Ampas Tempe dan Rumput', 13),
('Setiap Hari', '16:00:00', 13, 'Ampas Tempe dan Rumput', 14),
('Setiap Hari', '07:00:00', 15, 'Rumput', 15),
('Setiap Hari', '16:00:00', 15, 'Rumput', 16),
('Setiap Hari', '07:00:00', 17, 'Ampas Tempe dan Rumput', 17),
('Setiap Hari', '16:00:00', 17, 'Ampas Tempe dan Rumput', 18),
('Setiap Hari', '07:00:00', 34, 'Ampas Tempe dan Rumput', 19),
('Setiap Hari', '16:00:00', 29, 'Ampas Tempe dan Rumput', 20);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'member', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_ternak`
--

CREATE TABLE `jurnal_ternak` (
  `id_jurnal` int NOT NULL,
  `tanggal` date NOT NULL,
  `id_ternak` int NOT NULL,
  `catatan_jurnal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `catatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `alamat`, `nomor_telepon`, `email`, `catatan`) VALUES
(1, 'Oya Farm', 'Desa  Lau Buaten Pancur Batu', '+62821-6188-2824', '', 'supplier kambing perah'),
(2, 'IDF Karo (drh. Bobbi Chrisenta)', 'Desa Mulawari Kecamatan Tiga Panah Kab. Karo', '+62877-0066-8688', '', 'Peternakan kambing perah, domba dorper, dan dokter hewan');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `id_keuangan` int NOT NULL,
  `tanggal` date NOT NULL,
  `id_ternak` int NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `pengeluaran` int NOT NULL,
  `pendapatan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_kandang`
--

CREATE TABLE `master_kandang` (
  `id_kandang` int NOT NULL,
  `nama_kandang` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `blok` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_kandang`
--

INSERT INTO `master_kandang` (`id_kandang`, `nama_kandang`, `blok`, `keterangan`) VALUES
(1, 'Kandang 1', '1', 'Kandang Domba Aqiqah '),
(2, 'Kandang 1', '2', 'Kandang Domba Aqiqah '),
(3, 'Kandang 1', '3', 'Kandang Domba Aqiqah '),
(4, 'Kandang 1', '4', 'Kandang Domba Aqiqah '),
(5, 'Kandang 1', '5', 'Kandang Domba Aqiqah '),
(6, 'Kandang 1', '6', 'Kandang Domba Aqiqah '),
(7, 'Kandang 2', '1', 'Kandang Domba Aqiqah '),
(8, 'Kandang 2', '2', 'Kandang Domba Aqiqah '),
(9, 'Kandang 2', '3', 'Kandang Domba Aqiqah '),
(10, 'Kandang 2', '4', 'Kandang Domba Aqiqah '),
(11, 'Kandang 2', '5', 'Kandang Domba Aqiqah '),
(12, 'Kandang 2', '6', 'Kandang Domba Aqiqah '),
(13, 'Kandang 3', '1', 'Kandang Kambing Perah'),
(14, 'Kandang 3', '2', 'Kandang Kambing Perah'),
(15, 'Kandang 4', '1', 'Kandang Domba Breeding'),
(16, 'Kandang 4', '2', 'Kandang Domba Breeding'),
(17, 'Kandang 5', '1', 'Kandang Kambing Perah'),
(18, 'Kandang 5', '2', 'Kandang Kambing Perah'),
(19, 'Kandang 5', '3', 'Kandang Kambing Perah'),
(20, 'Kandang 5', '4', 'Kandang Kambing Perah'),
(21, 'Kandang 5', '5', 'Kandang Kambing Perah'),
(22, 'Kandang 5', '6', 'Kandang Kambing Perah'),
(23, 'Kandang 5', '7', 'Kandang Kambing Perah'),
(24, 'Kandang 5', '8', 'Kandang Kambing Perah'),
(25, 'Kandang 5', '9', 'Kandang Kambing Perah'),
(26, 'Kandang 5', '10', 'Kandang Kambing Perah'),
(27, 'Kandang 5', '11', 'Kandang Kambing Perah'),
(28, 'Kandang 5', '12', 'Kandang Kambing Perah'),
(29, 'Kandang 6', '1', 'Kandang Kambing Perah'),
(30, 'Kandang 6', '2', 'Kandang Kambing Perah'),
(31, 'Kandang 6', '3', 'Kandang Kambing Perah'),
(32, 'Kandang 6', '4', 'Kandang Kambing Perah'),
(33, 'Kandang 6', '5', 'Kandang Kambing Perah'),
(34, 'Kandang 6', '6', 'Kandang Kambing Perah'),
(35, 'Kandang 7', '1', 'Kandang Pejantan Perah'),
(36, 'Kandang Anakan', '1', 'Kandang anakan Kambing');

-- --------------------------------------------------------

--
-- Table structure for table `master_produk`
--

CREATE TABLE `master_produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_produk`
--

INSERT INTO `master_produk` (`id_produk`, `nama_produk`) VALUES
(1, 'Susu Kambing'),
(2, 'Daging');

-- --------------------------------------------------------

--
-- Table structure for table `master_treatment`
--

CREATE TABLE `master_treatment` (
  `id_treatment` int NOT NULL,
  `nama_treatment` varchar(40) NOT NULL,
  `keterangan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_treatment`
--

INSERT INTO `master_treatment` (`id_treatment`, `nama_treatment`, `keterangan`) VALUES
(0, 'Cukur Bulu', 'Pencukuran bulu ternak'),
(1, 'Obat Cacing', 'Pemberian obat cacing rutin saja');

-- --------------------------------------------------------

--
-- Table structure for table `matings`
--

CREATE TABLE `matings` (
  `id_matings` int NOT NULL,
  `id_ternak_jantan` int NOT NULL,
  `id_ternak_betina` int NOT NULL,
  `tanggal_kawin` date NOT NULL,
  `pisah_jantan` date NOT NULL,
  `cek_kehamilan` date NOT NULL,
  `pisah_kandang` date NOT NULL,
  `lahiran` date NOT NULL,
  `sapih` date NOT NULL,
  `kawin_kembali` date NOT NULL,
  `detail` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int NOT NULL,
  `tanggal` date NOT NULL,
  `id_ternak` int NOT NULL,
  `harga` double NOT NULL,
  `penjual` int NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_siklus_birahi`
--

CREATE TABLE `pengaturan_siklus_birahi` (
  `id` int NOT NULL,
  `proestrus` int NOT NULL,
  `keterangan_ proestrus` varchar(255) NOT NULL,
  `estrus` int NOT NULL,
  `keterangan_estrus` varchar(255) NOT NULL,
  `diestrus` int NOT NULL,
  `keterangan_diestrus` varchar(255) NOT NULL,
  `anestrus` int NOT NULL,
  `keterangan_anestrus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengaturan_siklus_birahi`
--

INSERT INTO `pengaturan_siklus_birahi` (`id`, `proestrus`, `keterangan_ proestrus`, `estrus`, `keterangan_estrus`, `diestrus`, `keterangan_diestrus`, `anestrus`, `keterangan_anestrus`) VALUES
(1, 1, 'The first stage of the heat cycle, You will notice chanes in yout animal but it is not ready to mate. Research your animal breed for symptoms and behaviour and the length of this cycle', 2, 'The second stage of the heat cycle. Your animal is fertile and ready to mate. Research your animal breed for symptoms and behaviour and the length of this cycle.', 1, 'The third stage of the heat cycle. Your animal is returning to normal and no longer receptive to mate. Research your animal breed for symptoms and behaviour and the length of this cycle.', 17, 'The time between the end of diestrus and the start of  Proestrus. Research your animal breed for symptoms and behaviour and the length of this cycle.');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_siklus_perkawinan`
--

CREATE TABLE `pengaturan_siklus_perkawinan` (
  `id` int NOT NULL,
  `inkubasi` int NOT NULL,
  `keterangan_ inkubasi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pisah_jantan` int NOT NULL,
  `keterangan_pisah_jantan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cek_kehamilan` int NOT NULL,
  `keterangan_ cek_kehamilan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pisah_kandang` int NOT NULL,
  `keterangan_pisah_kandang` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kawin_kembali` int NOT NULL,
  `keterangan_kawin_kembali` varchar(255) NOT NULL,
  `sapih_anak` int NOT NULL,
  `keterangan_sapih_anak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengaturan_siklus_perkawinan`
--

INSERT INTO `pengaturan_siklus_perkawinan` (`id`, `inkubasi`, `keterangan_ inkubasi`, `pisah_jantan`, `keterangan_pisah_jantan`, `cek_kehamilan`, `keterangan_ cek_kehamilan`, `pisah_kandang`, `keterangan_pisah_kandang`, `kawin_kembali`, `keterangan_kawin_kembali`, `sapih_anak`, `keterangan_sapih_anak`) VALUES
(1, 150, '', 50, '', 45, '', 130, '', 60, '', 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int NOT NULL,
  `tanggal` date NOT NULL,
  `id_ternak` int NOT NULL,
  `harga` int NOT NULL,
  `pembeli` int NOT NULL,
  `deposit` int NOT NULL,
  `utang` int NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int NOT NULL,
  `id_ternak` int NOT NULL,
  `produk` int NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(15) NOT NULL,
  `catatan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `siklus_birahi`
--

CREATE TABLE `siklus_birahi` (
  `id_siklus_birahi` int NOT NULL,
  `id_ternak_betina` int NOT NULL,
  `proestrus` date NOT NULL,
  `estrus` date NOT NULL,
  `diestrus` date NOT NULL,
  `anestrus` date NOT NULL,
  `siklus_selanjutnya` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ternak`
--

CREATE TABLE `ternak` (
  `id_ternak` int NOT NULL,
  `nomor_tag` varchar(20) NOT NULL,
  `inisial` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(7) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `estimasi` int DEFAULT '0',
  `ras` varchar(20) NOT NULL,
  `id_kandang` int DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `id_peternak` int NOT NULL,
  `foto_ternak` varchar(100) NOT NULL,
  `bapak_ternak` int DEFAULT NULL,
  `ibu_ternak` int DEFAULT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ternak`
--

INSERT INTO `ternak` (`id_ternak`, `nomor_tag`, `inisial`, `jenis_kelamin`, `tanggal_lahir`, `estimasi`, `ras`, `id_kandang`, `status`, `id_peternak`, `foto_ternak`, `bapak_ternak`, `ibu_ternak`, `keterangan`) VALUES
(99, 'IDF100', 'IDF100', 'Jantan', '2018-11-10', 1, 'Anglonubian', 35, '', 1, '', NULL, NULL, 'Pejantan dokter bobbi'),
(100, '900202190300199', 'AF100', 'Jantan', '2019-10-30', 1, 'Sapera', 35, 'pemilik', 1, '', NULL, NULL, 'pejanan wonosobo'),
(101, '900202190300102', 'AF200', 'Betina', '2018-11-10', 1, 'Sapera', 17, 'pemilik', 1, '', NULL, NULL, 'nikita'),
(102, '900202190300112', 'AF201', 'Betina', '2019-10-02', 1, 'Sapera', 18, 'pemilik', 1, '', NULL, NULL, 'dari bogor dr. bobbi'),
(103, '900202190300113', 'AF202', 'Betina', '2020-12-06', 0, 'Sapera', 19, 'pemilik', 1, '', NULL, NULL, 'anakan jawa randu dari abdullah'),
(104, '900202190300183', 'AF203', 'Betina', '2019-02-13', 1, 'Jawa Randu', 20, 'pemilik', 1, '', NULL, NULL, 'jawa randu bg tamal'),
(105, '900202190300148', 'AF204', 'Betina', '2019-11-20', 1, 'Sapera', 21, 'pemilik', 1, '', NULL, NULL, 'sapera bg tamal anak nikita'),
(106, '900202190300181', 'AF205', 'Betina', '2020-07-15', 1, 'Sapera', 22, 'pemilik', 1, '', NULL, NULL, 'sapera fendi'),
(107, '900202190300164', 'AF206', 'Betina', '2020-08-15', 1, 'Jawa Randu', 23, 'pemilik', 1, '', NULL, NULL, 'jawa randu dari wan'),
(108, '900202190300161', 'AF207', 'Betina', '2020-06-15', 1, 'Sapera', 24, 'pemilik', 1, '', NULL, NULL, 'sapera fendi'),
(109, '900202190300115', 'AF208', 'Betina', '2018-02-18', 1, 'Sapera', 25, 'pemilik', 1, '', NULL, NULL, 'sapera mas imam hitam'),
(110, '900202190300111', 'AF209', 'Betina', '2019-01-19', 1, 'Sapera', 26, 'pemilik', 1, '', NULL, NULL, 'sapera wonosobo'),
(111, '900202190300157', 'AF210', 'Betina', '2020-07-12', 1, 'Sapera', 29, 'pemilik', 1, '', NULL, NULL, 'boerawa bg tamal'),
(112, '900202190300168', 'AF211', 'Betina', '2020-06-30', 1, 'Sapera', 30, 'pemilik', 1, '', NULL, NULL, 'sapera fendi'),
(113, '900202190300191', 'AF212', 'Betina', '2018-12-20', 1, 'Jawa Randu', 31, 'pemilik', 1, '', NULL, NULL, 'jawa randu coklat bg tamal'),
(114, '900202190300142', 'AF213', 'Betina', '2021-02-23', 1, 'Sapera', 32, 'pemilik', 1, '', NULL, NULL, 'sapera dari dr bobbi, akar rumput'),
(115, '900202190300141', 'AF214', 'Betina', '2020-06-30', 1, 'Sapera', 13, 'pemilik', 1, '', NULL, NULL, 'sapera fendi'),
(116, '900202190300124', 'AF215', 'Betina', '2020-06-30', 1, 'Sapera', 13, 'pemilik', 1, '', NULL, NULL, 'sapera fendi'),
(117, '900202190300193', 'AF216', 'Betina', '2020-02-20', 1, 'Sapera', 13, 'pemilik', 1, '', NULL, NULL, 'dari abdullah'),
(118, '900202190300109', 'AF217', 'Betina', '2020-06-30', 1, 'Sapera', 13, 'pemilik', 1, '', NULL, NULL, 'sapera fendi'),
(119, '900202190300123', 'AF218', 'Betina', '2020-11-19', 0, 'Sapera', 13, 'pemilik', 1, '', NULL, NULL, 'cucu nikita'),
(120, '900202190300117', 'AF219', 'Betina', '2020-12-25', 0, 'Sapera', 13, 'pemilik', 1, '', NULL, NULL, 'anak sapera hitam'),
(121, '900202190300156', 'AF220', 'Betina', '2020-12-25', 0, 'Sapera', 13, 'pemilik', 1, '', NULL, NULL, 'anak sapera hitam'),
(122, '900202190300108', 'AF221', 'Betina', '2017-11-18', 1, 'Sapera', 13, 'pemilik', 1, '', NULL, NULL, 'sapera mas imam'),
(123, '900202190300133', 'AF222', 'Betina', '2021-02-23', 1, 'Anglopera', 13, 'pemilik', 1, '', NULL, NULL, 'anglopera abah husen 212'),
(124, '900202190300114', 'AF223', 'Betina', '2021-06-18', 1, 'Sapera', 13, 'pemilik', 1, '', 100, 113, 'sapera anakan jawa randu coklat'),
(125, '900202190300180', 'AF224', 'Jantan', '2022-02-05', 1, 'Sapera', 36, 'pemilik', 1, '', 100, 111, 'sapera anak boerawa'),
(126, '900202190300146', 'AF225', 'Betina', '2021-12-25', 0, 'Sapera', 36, 'pemilik', 1, '', 100, NULL, 'anakan sapera fendi'),
(127, '900202190300137', 'AF226', 'Betina', '2022-02-05', 0, 'Sapera', 36, 'pemilik', 1, '', 100, 104, 'anakan Jawa randu bg tamal '),
(128, '900202190300190', 'AF227', 'Betina', '2022-03-24', 0, 'Anglopera', 36, 'pemilik', 1, '', 99, 102, 'anakan oamaru'),
(129, '900202190300175', 'AF228', 'Jantan', '2022-03-24', 0, 'Anglopera', 36, 'pemilik', 1, '', 99, 102, 'anakan oamaru'),
(130, '900202190300200', 'AF229', 'Jantan', '2022-03-24', 0, 'Anglopera', 36, 'pemilik', 1, '', 99, 102, 'anakan oamaru'),
(131, '900202190300182', 'AF230', 'Betina', '2022-01-28', 1, 'Sapera', 36, 'pemilik', 1, '', 100, 113, 'anakan jawa rrandu coklat'),
(132, '900202190300189', 'AF231', 'Jantan', '2019-06-29', 1, 'Merino', 16, 'pemilik', 1, '', NULL, NULL, 'pejantan merino'),
(133, '2900620E23', 'AF300', 'Betina', '2020-02-10', 1, 'Hairsheep', 15, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(134, '2A002F392B', 'AF301', 'Betina', '2020-02-11', 1, 'Hairsheep', 15, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(135, '2A002F3F41', 'AF302', 'Betina', '2020-02-12', 1, 'Suffolk', 16, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(136, '290062D99D', 'AF303', 'Betina', '2020-02-13', 1, 'Suffolk', 16, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(137, '2A00329B6B', 'AF304', 'Betina', '2020-02-14', 1, 'Suffolk', 16, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(138, '290062C433', 'AF305', 'Betina', '2020-02-15', 1, 'Suffolk', 15, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(139, '2900625473', 'AF306', 'Betina', '2020-02-16', 1, 'Suffolk', 16, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(140, '2900625E51', 'AF307', 'Betina', '2020-07-01', 1, 'Merino', 15, 'pemilik', 1, '', 132, NULL, 'anakan merino awal'),
(141, '2900628139', 'AF308', 'Jantan', '2020-11-20', 1, 'Dorper', 15, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(142, '29006296FD', 'AF309', 'Betina', '2020-12-10', 1, 'Dorper', 15, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(143, '2A00327D50', 'AF310', 'Betina', '2020-02-16', 1, 'Suffolk', 15, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(144, '2A002F70EF', 'AF311', 'Betina', '2022-01-06', 1, 'Cross Merino', 16, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(145, '2A0031CEC5', 'AF312', 'Betina', '2022-01-13', 1, 'Cross Merino', 16, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(146, '2A00326F9F', 'AF313', 'Jantan', '2022-01-15', 1, 'Cross Merino', 15, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(147, '29006305BB', 'AF314', 'Betina', '2022-01-22', 1, 'Cross Dorper', 15, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(148, '29006230F7', 'AF315', 'Jantan', '2022-01-24', 1, 'Cross Dorper', 15, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(149, '290062D4D1', 'AF316', 'Betina', '2022-01-31', 1, 'Cross Dorper', 16, 'pemilik', 1, '', NULL, NULL, 'domba breeding'),
(150, '290062A501', 'AF317', 'Betina', '2022-01-05', 1, 'Cross', 1, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(151, '290061F354', 'AF318', 'Betina', '2022-01-08', 1, 'Cross', 1, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(152, '29006207BC', 'AF319', 'Betina', '2022-01-13', 1, 'Cross', 1, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(153, '2900625434', 'AF320', 'Betina', '2022-01-16', 1, 'Cross', 1, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(154, '290061ED7A', 'AF321', 'Betina', '2022-01-21', 1, 'Cross', 1, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(155, '2A0032CB2C', 'AF322', 'Betina', '2022-01-24', 1, 'Cross', 2, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(156, '29006237DC', 'AF323', 'Betina', '2022-01-29', 1, 'Cross', 2, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(157, '2A0032BC92', 'AF324', 'Betina', '2022-02-01', 1, 'Cross', 2, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(158, '290061E717', 'AF325', 'Betina', '2022-02-06', 1, 'Cross', 2, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(159, '2900628026', 'AF326', 'Betina', '2022-02-09', 1, 'Cross', 2, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(160, '2A0032BB7E', 'AF327', 'Betina', '2022-02-14', 1, 'Cross', 3, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(161, '2B00118785', 'AF328', 'Betina', '2022-02-17', 1, 'Cross', 3, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(162, '290061F97F', 'AF329', 'Betina', '2022-02-22', 1, 'Cross', 3, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(163, '290062D191', 'AF330', 'Betina', '2022-02-25', 1, 'Cross', 3, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(164, '2A0031E678', 'AF331', 'Betina', '2022-02-28', 1, 'Cross', 3, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(165, '2A002FAFBD', 'AF332', 'Jantan', '2022-03-05', 1, 'Cross', 4, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(166, '2900630F72', 'AF333', 'Jantan', '2022-01-24', 1, 'Cross', 4, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(167, '2A002F94C7', 'AF334', 'Jantan', '2022-01-27', 1, 'Cross', 4, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(168, '290062EC8F', 'AF335', 'Jantan', '2022-01-29', 1, 'Cross', 4, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(169, '2A002FA71A', 'AF336', 'Jantan', '2022-02-02', 1, 'Cross', 4, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(170, '290062A806', 'AF337', 'Jantan', '2022-02-05', 1, 'Cross', 5, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(171, '290062CFC7', 'AF338', 'Jantan', '2022-02-07', 1, 'Cross', 5, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(172, '2900631DC5', 'AF339', 'Jantan', '2022-02-11', 1, 'Cross', 5, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(173, '290062847E', 'AF340', 'Jantan', '2022-02-14', 1, 'Cross', 5, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(174, '2900625D31', 'AF341', 'Jantan', '2022-02-16', 1, 'Cross', 5, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(175, '2A002FAB39', 'AF342', 'Jantan', '2022-02-20', 1, 'Cross', 6, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(176, '2900620E22', 'AF343', 'Jantan', '2022-02-23', 1, 'Cross', 6, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(177, '290062270C', 'AF344', 'Jantan', '2022-02-25', 1, 'Cross', 6, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(178, '2A0031E185', 'AF345', 'Jantan', '2022-03-01', 1, 'Cross', 6, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah'),
(179, '29006252DC', 'AF346', 'Jantan', '2022-02-09', 1, 'Cross', 6, 'pemilik', 1, '', NULL, NULL, 'Domba Aqiqah');

-- --------------------------------------------------------

--
-- Table structure for table `ternak_galeri`
--

CREATE TABLE `ternak_galeri` (
  `id` int NOT NULL,
  `id_ternak` int NOT NULL,
  `foto` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `treatment_ternak`
--

CREATE TABLE `treatment_ternak` (
  `id_treatment_ternak` int NOT NULL,
  `id_ternak` int NOT NULL,
  `tanggal` date NOT NULL,
  `id_treatment` int NOT NULL,
  `umur_treatment` varchar(100) NOT NULL,
  `status_treatment` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `treatment_ternak`
--

INSERT INTO `treatment_ternak` (`id_treatment_ternak`, `id_ternak`, `tanggal`, `id_treatment`, `umur_treatment`, `status_treatment`) VALUES
(3, 100, '2022-09-14', 1, '2 tahun 10 bulan', 'Selesai'),
(4, 100, '2022-12-14', 1, '3 tahun 1 bulan', 'Belum'),
(5, 100, '2023-03-14', 1, '3 tahun 4 bulan', 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int UNSIGNED NOT NULL,
  `last_login` int UNSIGNED DEFAULT NULL,
  `active` tinyint UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'Administrator', '$2y$12$tGY.AtcyXrh7WmccdbT1rOuKEcTsKH6sIUmDr0ore1yN4LnKTTtuu', 'admin@eternak.id', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1663083004, 1, 'Administrator', NULL, 'ADMIN', '0'),
(11, '::1', 'arjunafarm', '$2y$10$QeBlWsLTv46ke7tfDEczpuu5oJ0hL84kv97LMj84QNFpxvjiDYO2.', 'arjunafarm@eternak.id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1650041591, 1662716029, 1, 'Arjuna', 'Farm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `group_id` mediumint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 1, 1),
(13, 11, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot_ternak`
--
ALTER TABLE `bobot_ternak`
  ADD PRIMARY KEY (`id_bobot`),
  ADD KEY `fk_bobot_ternak` (`id_ternak`);

--
-- Indexes for table `data_peternak`
--
ALTER TABLE `data_peternak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diet_ternak`
--
ALTER TABLE `diet_ternak`
  ADD PRIMARY KEY (`id_diet`),
  ADD KEY `fk_diet_kandang` (`kandang`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal_ternak`
--
ALTER TABLE `jurnal_ternak`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `fk_jurnal_ternak` (`id_ternak`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`id_keuangan`),
  ADD KEY `fk_keuangan_ternak` (`id_ternak`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_kandang`
--
ALTER TABLE `master_kandang`
  ADD PRIMARY KEY (`id_kandang`);

--
-- Indexes for table `master_produk`
--
ALTER TABLE `master_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `master_treatment`
--
ALTER TABLE `master_treatment`
  ADD PRIMARY KEY (`id_treatment`);

--
-- Indexes for table `matings`
--
ALTER TABLE `matings`
  ADD PRIMARY KEY (`id_matings`),
  ADD KEY `fk_jantan` (`id_ternak_jantan`),
  ADD KEY `fk_betina` (`id_ternak_betina`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `fk_beli_ternak` (`id_ternak`),
  ADD KEY `fk_penjual_kontak` (`penjual`);

--
-- Indexes for table `pengaturan_siklus_birahi`
--
ALTER TABLE `pengaturan_siklus_birahi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan_siklus_perkawinan`
--
ALTER TABLE `pengaturan_siklus_perkawinan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `fk_pembeli_ternak` (`pembeli`),
  ADD KEY `fk_penjualan_ternak` (`id_ternak`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`),
  ADD KEY `fk_produksi_ternak` (`id_ternak`),
  ADD KEY `fk_produk_produksi` (`produk`);

--
-- Indexes for table `siklus_birahi`
--
ALTER TABLE `siklus_birahi`
  ADD PRIMARY KEY (`id_siklus_birahi`),
  ADD KEY `fk_siklus_ternak` (`id_ternak_betina`);

--
-- Indexes for table `ternak`
--
ALTER TABLE `ternak`
  ADD PRIMARY KEY (`id_ternak`),
  ADD KEY `fk_kandang_ternak` (`id_kandang`),
  ADD KEY `fk_peternak_kontak` (`id_peternak`);

--
-- Indexes for table `ternak_galeri`
--
ALTER TABLE `ternak_galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foto_ternak` (`id_ternak`);

--
-- Indexes for table `treatment_ternak`
--
ALTER TABLE `treatment_ternak`
  ADD PRIMARY KEY (`id_treatment_ternak`),
  ADD KEY `fk_master_treatment` (`id_treatment`),
  ADD KEY `fk_treatment_ternak` (`id_ternak`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  ADD UNIQUE KEY `uc_email` (`email`) USING BTREE;

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot_ternak`
--
ALTER TABLE `bobot_ternak`
  MODIFY `id_bobot` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_peternak`
--
ALTER TABLE `data_peternak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diet_ternak`
--
ALTER TABLE `diet_ternak`
  MODIFY `id_diet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurnal_ternak`
--
ALTER TABLE `jurnal_ternak`
  MODIFY `id_jurnal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `master_kandang`
--
ALTER TABLE `master_kandang`
  MODIFY `id_kandang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `master_produk`
--
ALTER TABLE `master_produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matings`
--
ALTER TABLE `matings`
  MODIFY `id_matings` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengaturan_siklus_perkawinan`
--
ALTER TABLE `pengaturan_siklus_perkawinan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siklus_birahi`
--
ALTER TABLE `siklus_birahi`
  MODIFY `id_siklus_birahi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ternak`
--
ALTER TABLE `ternak`
  MODIFY `id_ternak` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `ternak_galeri`
--
ALTER TABLE `ternak_galeri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatment_ternak`
--
ALTER TABLE `treatment_ternak`
  MODIFY `id_treatment_ternak` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobot_ternak`
--
ALTER TABLE `bobot_ternak`
  ADD CONSTRAINT `fk_bobot_ternak` FOREIGN KEY (`id_ternak`) REFERENCES `ternak` (`id_ternak`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `diet_ternak`
--
ALTER TABLE `diet_ternak`
  ADD CONSTRAINT `fk_diet_kandang` FOREIGN KEY (`kandang`) REFERENCES `master_kandang` (`id_kandang`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `jurnal_ternak`
--
ALTER TABLE `jurnal_ternak`
  ADD CONSTRAINT `fk_jurnal_ternak` FOREIGN KEY (`id_ternak`) REFERENCES `ternak` (`id_ternak`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD CONSTRAINT `fk_keuangan_ternak` FOREIGN KEY (`id_ternak`) REFERENCES `ternak` (`id_ternak`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `matings`
--
ALTER TABLE `matings`
  ADD CONSTRAINT `fk_betina` FOREIGN KEY (`id_ternak_betina`) REFERENCES `ternak` (`id_ternak`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_jantan` FOREIGN KEY (`id_ternak_jantan`) REFERENCES `ternak` (`id_ternak`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_beli_ternak` FOREIGN KEY (`id_ternak`) REFERENCES `ternak` (`id_ternak`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_penjual_kontak` FOREIGN KEY (`penjual`) REFERENCES `kontak` (`id_kontak`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_pembeli_ternak` FOREIGN KEY (`pembeli`) REFERENCES `kontak` (`id_kontak`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_penjualan_ternak` FOREIGN KEY (`id_ternak`) REFERENCES `ternak` (`id_ternak`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `fk_produk_produksi` FOREIGN KEY (`produk`) REFERENCES `master_produk` (`id_produk`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_produksi_ternak` FOREIGN KEY (`id_ternak`) REFERENCES `ternak` (`id_ternak`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `siklus_birahi`
--
ALTER TABLE `siklus_birahi`
  ADD CONSTRAINT `fk_siklus_ternak` FOREIGN KEY (`id_ternak_betina`) REFERENCES `ternak` (`id_ternak`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `ternak`
--
ALTER TABLE `ternak`
  ADD CONSTRAINT `fk_kandang_ternak` FOREIGN KEY (`id_kandang`) REFERENCES `master_kandang` (`id_kandang`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_peternak_kontak` FOREIGN KEY (`id_peternak`) REFERENCES `data_peternak` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `ternak_galeri`
--
ALTER TABLE `ternak_galeri`
  ADD CONSTRAINT `fk_foto_ternak` FOREIGN KEY (`id_ternak`) REFERENCES `ternak` (`id_ternak`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `treatment_ternak`
--
ALTER TABLE `treatment_ternak`
  ADD CONSTRAINT `fk_master_treatment` FOREIGN KEY (`id_treatment`) REFERENCES `master_treatment` (`id_treatment`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_treatment_ternak` FOREIGN KEY (`id_ternak`) REFERENCES `ternak` (`id_ternak`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

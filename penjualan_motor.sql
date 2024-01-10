-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.6.21 - MySQL Community Server (GPL)
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk penjualan_motor
CREATE DATABASE IF NOT EXISTS `penjualan_motor` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `penjualan_motor`;

-- membuang struktur untuk table penjualan_motor.motor
CREATE TABLE IF NOT EXISTS `motor` (
  `kode_motor` char(10) NOT NULL,
  `jenis_motor` varchar(15) NOT NULL,
  `merk_motor` varchar(15) NOT NULL,
  `nama_motor` varchar(50) NOT NULL,
  `tahun_motor` int(4) NOT NULL,
  `warna_motor` varchar(30) NOT NULL,
  `kondisi_motor` enum('BARU','BEKAS') NOT NULL,
  `harga_motor` double NOT NULL,
  `gambar_motor` varchar(100) NOT NULL,
  `status_motor` varchar(2) NOT NULL,
  PRIMARY KEY (`kode_motor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel penjualan_motor.motor: ~2 rows (lebih kurang)
DELETE FROM `motor`;
/*!40000 ALTER TABLE `motor` DISABLE KEYS */;
INSERT INTO `motor` (`kode_motor`, `jenis_motor`, `merk_motor`, `nama_motor`, `tahun_motor`, `warna_motor`, `kondisi_motor`, `harga_motor`, `gambar_motor`, `status_motor`) VALUES
	('MK0002', 'Matic', 'Yamaha', 'Xeon RC 125', 2011, 'Merah', 'BEKAS', 4450000, 'gambar_motor1544938581.jpg', '1'),
	('MK0003', 'Bebek', 'Honda', 'Supra X 125 FI', 2014, 'Hitam', 'BARU', 18000000, 'gambar_motor1544942847.jpg', '1');
/*!40000 ALTER TABLE `motor` ENABLE KEYS */;

-- membuang struktur untuk table penjualan_motor.pembeli
CREATE TABLE IF NOT EXISTS `pembeli` (
  `id_ktp` varchar(16) NOT NULL,
  `nama_pembeli` varchar(25) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat_pembeli` varchar(100) NOT NULL,
  `telp_pembeli` varchar(15) NOT NULL,
  `hp_pembeli` varchar(15) NOT NULL,
  PRIMARY KEY (`id_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel penjualan_motor.pembeli: ~2 rows (lebih kurang)
DELETE FROM `pembeli`;
/*!40000 ALTER TABLE `pembeli` DISABLE KEYS */;
INSERT INTO `pembeli` (`id_ktp`, `nama_pembeli`, `jenis_kelamin`, `alamat_pembeli`, `telp_pembeli`, `hp_pembeli`) VALUES
	('3303150209950001', 'Faizal Dwi', 'L', 'Sokawera', '', '082242991402'),
	('3303172611950001', 'Feby', 'L', 'Kramat Raya', '-', '087337447557');
/*!40000 ALTER TABLE `pembeli` ENABLE KEYS */;

-- membuang struktur untuk table penjualan_motor.trx_cash
CREATE TABLE IF NOT EXISTS `trx_cash` (
  `kode_trx` char(10) NOT NULL,
  `id_ktp` varchar(16) NOT NULL,
  `kode_motor` char(10) NOT NULL,
  `tgl_trx` date NOT NULL,
  `cash_harga` double NOT NULL,
  PRIMARY KEY (`kode_trx`),
  KEY `id_ktp` (`id_ktp`),
  KEY `kode_motor` (`kode_motor`),
  CONSTRAINT `id_ktp_fk` FOREIGN KEY (`id_ktp`) REFERENCES `pembeli` (`id_ktp`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kode_motor_fk` FOREIGN KEY (`kode_motor`) REFERENCES `motor` (`kode_motor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel penjualan_motor.trx_cash: ~2 rows (lebih kurang)
DELETE FROM `trx_cash`;
/*!40000 ALTER TABLE `trx_cash` DISABLE KEYS */;
INSERT INTO `trx_cash` (`kode_trx`, `id_ktp`, `kode_motor`, `tgl_trx`, `cash_harga`) VALUES
	('CC0001', '3303150209950001', 'MK0002', '2018-12-17', 5000000),
	('CC0002', '3303172611950001', 'MK0003', '2018-12-17', 18000000);
/*!40000 ALTER TABLE `trx_cash` ENABLE KEYS */;

-- membuang struktur untuk table penjualan_motor.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel penjualan_motor.user: ~3 rows (lebih kurang)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`) VALUES
	(1, 'Faizal Dwi', 'ichal', '827ccb0eea8a706c4c34a16891f84e7b'),
	(2, 'Feby Nuri', 'feby', '5f39601acf39067fc179ba7272e0abac'),
	(3, 'Erlangga', 'angga', '8479c86c7afcb56631104f5ce5d6de62');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

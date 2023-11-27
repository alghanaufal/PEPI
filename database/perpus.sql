/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : perpus

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2022-06-16 15:09:23
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `anggota`
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota` (
  `id_anggota` varchar(255) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of anggota
-- ----------------------------
INSERT INTO `anggota` VALUES ('AG001', 'Alghaniyu Naufal', 'Laki-laki', 'Bandung', '+6285156454359');
INSERT INTO `anggota` VALUES ('AG002', 'user', 'Laki-laki', 'Bandung', '081xxxxxxxx');
INSERT INTO `anggota` VALUES ('AG003', 'Anggota 3', 'Laki-laki', 'Bekasi', '08xxxxxxxxxxxxx');

-- ----------------------------
-- Table structure for `buku`
-- ----------------------------
DROP TABLE IF EXISTS `buku`;
CREATE TABLE `buku` (
  `id_buku` varchar(255) NOT NULL,
  `id_pengarang` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of buku
-- ----------------------------
INSERT INTO `buku` VALUES ('BK001', '1', '4', 'nopal', '2003', '27');
INSERT INTO `buku` VALUES ('BK002', '4', '5', 'nopal', '2009', '44');
INSERT INTO `buku` VALUES ('BK003', '4', '5', 'lala', '2002', '0');
INSERT INTO `buku` VALUES ('BK004', '4', '5', 'nopal', '2002', '34');

-- ----------------------------
-- Table structure for `login`
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('1', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator');
INSERT INTO `login` VALUES ('2', 'petugas', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas');

-- ----------------------------
-- Table structure for `peminjaman`
-- ----------------------------
DROP TABLE IF EXISTS `peminjaman`;
CREATE TABLE `peminjaman` (
  `id_pm` varchar(255) NOT NULL,
  `id_anggota` varchar(255) NOT NULL,
  `id_buku` varchar(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of peminjaman
-- ----------------------------
INSERT INTO `peminjaman` VALUES ('PM002', 'AG001', 'BK001', '2022-06-16', '2022-06-30');
INSERT INTO `peminjaman` VALUES ('PM003', 'AG002', 'BK001', '2022-06-16', '2022-07-05');
INSERT INTO `peminjaman` VALUES ('PM004', 'AG002', 'BK001', '2022-06-16', '2022-06-23');

-- ----------------------------
-- Table structure for `penerbit`
-- ----------------------------
DROP TABLE IF EXISTS `penerbit`;
CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penerbit` varchar(255) NOT NULL,
  PRIMARY KEY (`id_penerbit`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of penerbit
-- ----------------------------
INSERT INTO `penerbit` VALUES ('4', 'nopal');
INSERT INTO `penerbit` VALUES ('5', 'lulu');

-- ----------------------------
-- Table structure for `pengarang`
-- ----------------------------
DROP TABLE IF EXISTS `pengarang`;
CREATE TABLE `pengarang` (
  `id_pengarang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengarang` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pengarang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of pengarang
-- ----------------------------
INSERT INTO `pengarang` VALUES ('1', 'user');
INSERT INTO `pengarang` VALUES ('4', 'sasa');

-- ----------------------------
-- Table structure for `pengembalian`
-- ----------------------------
DROP TABLE IF EXISTS `pengembalian`;
CREATE TABLE `pengembalian` (
  `id_pengenbalian` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` varchar(255) NOT NULL,
  `id_buku` varchar(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_kembalikan` date NOT NULL,
  PRIMARY KEY (`id_pengenbalian`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of pengembalian
-- ----------------------------
INSERT INTO `pengembalian` VALUES ('1', 'AG001', 'BK001', '2022-06-16', '2022-06-23', '2022-06-16');
INSERT INTO `pengembalian` VALUES ('2', 'AG001', 'BK001', '2022-06-16', '2022-06-23', '2022-06-16');
INSERT INTO `pengembalian` VALUES ('3', 'AG001', 'BK001', '2022-06-25', '2022-06-23', '2022-06-16');
INSERT INTO `pengembalian` VALUES ('4', 'AG001', 'BK001', '2022-06-16', '2022-06-23', '2022-06-16');
INSERT INTO `pengembalian` VALUES ('5', 'AG001', 'BK002', '2022-06-16', '2022-06-23', '2022-06-16');
INSERT INTO `pengembalian` VALUES ('6', 'AG001', 'BK001', '2022-06-16', '2022-06-23', '2022-06-16');
DELIMITER ;;
CREATE TRIGGER `jml_after_pinjam` AFTER INSERT ON `peminjaman` FOR EACH ROW UPDATE buku SET buku.jumlah = buku.jumlah - 1 WHERE buku.id_buku = new.id_buku
;;
DELIMITER ;

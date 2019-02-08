/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50611
 Source Host           : 127.0.0.1:3306
 Source Schema         : db_inventori

 Target Server Type    : MySQL
 Target Server Version : 50611
 File Encoding         : 65001

 Date: 08/02/2019 12:03:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tabel_admin
-- ----------------------------
DROP TABLE IF EXISTS `tabel_admin`;
CREATE TABLE `tabel_admin`  (
  `id_user` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_hp` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tabel_admin
-- ----------------------------
INSERT INTO `tabel_admin` VALUES ('PGW18001', 'I Ketut Karya', 'karya', 'karya', 'karya_09@gmail.com', '081236689246', 'top-level', 'aktif');
INSERT INTO `tabel_admin` VALUES ('PGW18002', 'Ratih Widya Santi', 'Ratih', '12345', 'ratihwid@gmail.com', '085737589555', 'admin', 'aktif');
INSERT INTO `tabel_admin` VALUES ('PGW18003', 'Restu', 'Restu', 'vNcF5G4k', 'restu_widanta@yahoo.com', '081123456789', 'operator', 'aktif');
INSERT INTO `tabel_admin` VALUES ('PGW18004', 'Budi', 'Budi', 'vNcF5G4k', 'budi@gmail.com', '081888777666555', 'inventaris', 'aktif');
INSERT INTO `tabel_admin` VALUES ('PGW18005', 'Sri Arthari', 'Arthari', 'vNcF5G4kwdw', 'restuwidanta456@gmail.com', '081456789321', 'admin', 'aktif');
INSERT INTO `tabel_admin` VALUES ('PGW18006', 'Eka Krisna', 'Ekakrisn', 'm2mriiKW', 'ekakris@gmail.com', '081236687989', 'operator', 'aktif');

-- ----------------------------
-- Table structure for tabel_inventori_komponen
-- ----------------------------
DROP TABLE IF EXISTS `tabel_inventori_komponen`;
CREATE TABLE `tabel_inventori_komponen`  (
  `kd_komponen` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_lab` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_komponen` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kondisi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`kd_komponen`) USING BTREE,
  INDEX `kd_lab`(`kd_lab`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `tabel_inventori_komponen_ibfk_1` FOREIGN KEY (`kd_lab`) REFERENCES `tabel_laboratorium` (`kd_lab`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tabel_inventori_komponen_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tabel_admin` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tabel_inventori_komponen
-- ----------------------------
INSERT INTO `tabel_inventori_komponen` VALUES ('LABKOM001/KMPN001', 'LABKOM001', 'PGW18002', 'Headset', '2018', 'baik', 'Headset Komputer', 'Dapat dipakai');
INSERT INTO `tabel_inventori_komponen` VALUES ('LABKOM001/KMPN002', 'LABKOM001', 'PGW18002', 'Keyboard', '2019', 'baik', '-', 'Dapat dipakai');
INSERT INTO `tabel_inventori_komponen` VALUES ('LABKOM001/KMPN003', 'LABKOM001', 'PGW18002', 'USB HUB', '2018', 'baik', '-', 'Dapat dipakai');
INSERT INTO `tabel_inventori_komponen` VALUES ('LABKOM001/KMPN004', 'LABKOM001', 'PGW18002', 'Mouse', '2018', 'baik', '-', 'Dapat dipakai');
INSERT INTO `tabel_inventori_komponen` VALUES ('LABKOM001/KMPN005', 'LABKOM001', 'PGW18002', 'Memory (RAM)', '2008', 'baik', '-', 'Dapat dipakai');
INSERT INTO `tabel_inventori_komponen` VALUES ('LABKOM001/KMPN006', 'LABKOM001', 'PGW18002', 'HDD', '2007', 'baik', 'sd', 'Dapat dipakai');
INSERT INTO `tabel_inventori_komponen` VALUES ('LABKOM001/KMPN007', 'LABKOM001', 'PGW18002', 'Processor', '2000', 'baik', 'ds', 'Dapat dipakai');
INSERT INTO `tabel_inventori_komponen` VALUES ('LABKOM001/KMPN008', 'LABKOM001', 'PGW18002', 'UPS', 'sd', 'baik', 'ds', 'Dapat dipakai');
INSERT INTO `tabel_inventori_komponen` VALUES ('LABKOM001/KMPN009', 'LABKOM001', 'PGW18002', 'Monitor', '2000', 'baik', 'd', 'Dapat dipakai');

-- ----------------------------
-- Table structure for tabel_inventori_komputer
-- ----------------------------
DROP TABLE IF EXISTS `tabel_inventori_komputer`;
CREATE TABLE `tabel_inventori_komputer`  (
  `kd_komputer` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_lab` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_komputer` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `os_komputer` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `monitor` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keyboard` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mouse` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `memory` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hdd` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `processor` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ups` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `komponen_lain` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan_komputer` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`kd_komputer`) USING BTREE,
  INDEX `kd_lab`(`kd_lab`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `tabel_inventori_komputer_ibfk_1` FOREIGN KEY (`kd_lab`) REFERENCES `tabel_laboratorium` (`kd_lab`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tabel_inventori_komputer_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tabel_admin` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tabel_inventori_komputer
-- ----------------------------
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB001', 'LABKOM001', 'PGW18002', 'PC1', '2017', 'Windows 10 ', '', '', '', '', '', '', '', '', 'Lengkap', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB002', 'LABKOM001', 'PGW18003', 'PC 2', '2018', 'Windows 10', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '-', 'Lengkap', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB003', 'LABKOM002', 'PGW18002', 'PC 1', '2018', 'windows 10', 'buruk', 'buruk', 'buruk', 'baik', 'buruk', 'buruk', 'baik', 'LAN Card', 'tes', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB004', 'LABKOM001', 'PGW18005', 'PC 3', '2018', 'Windows 10', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '-', 'Lengkap', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB005', 'LABKOM001', 'PGW18002', 'PC 4', '2018', 'Windows 10', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '-', 'Lengkap', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB006', 'LABKOM002', 'PGW18002', 'PC 2', '2018', 'Win 10', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '-', 'Lengkap', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB007', 'LABKOM001', 'PGW18002', 'PC 5', '2018', 'Windows 10', 'buruk', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '-', 'Lengkap', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB008', 'LABKOM001', 'PGW18002', 'PC 6', '2018', 'Windows 10', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '-', 'Lengkap', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('LABKOM001/DKOM001', 'LABKOM001', 'PGW18003', 'sds', '2323', 'da', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'ad', 'sad', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('LABKOM001/DKOM002', 'LABKOM001', 'PGW18003', 'asd', '232', 'asd', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'asd', 'sad', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('LABKOM001/DKOM003', 'LABKOM001', 'PGW18002', 'sds', 'sd', 'sdsd', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '', 'sdsad', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('LABKOM001/DKOM004', 'LABKOM001', 'PGW18002', 'dexter', '232', 'asasf', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '', 'adas', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('LABKOM001/DKOM005', 'LABKOM001', 'PGW18002', 'Data Baru 2019', '2019', 'Linux', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '', 'Test', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('LABKOM001/DKOM006', 'LABKOM001', 'PGW18002', 'da', 'df', 'df', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '', 'dzf', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('LABKOM001/DKOM007', 'LABKOM001', 'PGW18002', 'dfds', '4335', 'rtr', '', '', '', '', '', '', '', '', 'dsfdf', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('LABKOM001001', 'LABKOM001', 'PGW18002', 'sds', '123', 'sdas', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'da', 'asd', 'Dapat Dipakai');

-- ----------------------------
-- Table structure for tabel_inventori_non_komputer
-- ----------------------------
DROP TABLE IF EXISTS `tabel_inventori_non_komputer`;
CREATE TABLE `tabel_inventori_non_komputer`  (
  `kd_inventori` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_lab` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_inventori` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kondisi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`kd_inventori`) USING BTREE,
  INDEX `kd_lab`(`kd_lab`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `tabel_inventori_non_komputer_ibfk_1` FOREIGN KEY (`kd_lab`) REFERENCES `tabel_laboratorium` (`kd_lab`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tabel_inventori_non_komputer_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tabel_admin` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tabel_inventori_non_komputer
-- ----------------------------
INSERT INTO `tabel_inventori_non_komputer` VALUES ('LABKOM001/NKOM001', 'LABKOM001', 'PGW18002', 'dad', 'q434', 'baik', 'zddf', 'Dapat dipakai');
INSERT INTO `tabel_inventori_non_komputer` VALUES ('LABKOM001001', 'LABKOM001', 'PGW18003', 'sadasd', '434', 'baik', 'ffg', 'Dapat dipakai');
INSERT INTO `tabel_inventori_non_komputer` VALUES ('NONKOM001', 'LABKOM001', 'PGW18002', 'Switch', '2017', 'baik', '1', 'Dapat dipakai');
INSERT INTO `tabel_inventori_non_komputer` VALUES ('NONKOM002', 'LABKOM002', 'PGW18001', 'Switch', '2018', 'Baik', '', 'Dapat dipakai');
INSERT INTO `tabel_inventori_non_komputer` VALUES ('NONKOM003', 'LABKOM001', 'PGW18002', 'Proyektor', '2018', 'baik', '1', 'Dapat dipakai');
INSERT INTO `tabel_inventori_non_komputer` VALUES ('NONKOM004', 'LABKOM002', 'PGW18002', 'Proyektor', '2018', 'baik', '1', 'Dapat dipakai');

-- ----------------------------
-- Table structure for tabel_inventory_rusak_total
-- ----------------------------
DROP TABLE IF EXISTS `tabel_inventory_rusak_total`;
CREATE TABLE `tabel_inventory_rusak_total`  (
  `kd_rusak_total` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_inventory` enum('KOM','NONKOM') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'KOM',
  `kd_inventori` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kd_komputer` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kd_lab` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_lapor` date NOT NULL,
  `tanggal_ganti` date NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `penyebab` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status_inventoy` enum('diganti','belum diganti') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'belum diganti',
  PRIMARY KEY (`kd_rusak_total`) USING BTREE,
  INDEX `kd_inventori`(`kd_inventori`) USING BTREE,
  INDEX `kd_komputer`(`kd_komputer`) USING BTREE,
  INDEX `kd_lab`(`kd_lab`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `tabel_inventory_rusak_total_ibfk_1` FOREIGN KEY (`kd_lab`) REFERENCES `tabel_laboratorium` (`kd_lab`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tabel_inventory_rusak_total_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tabel_admin` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tabel_inventory_rusak_total
-- ----------------------------
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK01', 'KOM', NULL, 'KOMLAB001', 'LABKOM001', 'PGW18003', '2018-11-25', '2018-11-30', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK03', 'KOM', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2018-12-19', '2018-12-19', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK04', 'NONKOM', 'NONKOM001', '', 'LABKOM001', 'PGW18002', '2018-12-19', '2018-12-31', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK05', 'KOM', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2018-11-23', '2018-11-30', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK06', 'KOM', '', 'KOMLAB004', 'LABKOM001', 'PGW18002', '2018-12-20', '2018-12-22', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK07', 'NONKOM', 'NONKOM004', '', 'LABKOM002', 'PGW18002', '2018-12-20', '2018-12-22', 'Belum Terlapor', NULL, 'belum diganti');
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK08', 'NONKOM', 'LABKOM001001', NULL, 'LABKOM001', 'PGW18003', '2018-12-10', '2018-12-10', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK09', 'KOM', '', 'KOMLAB003', 'LABKOM002', 'PGW18003', '2018-12-31', '2018-12-31', 'Belum Terlapor', NULL, 'belum diganti');
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK10', 'KOM', '', 'KOMLAB001', 'LABKOM001', 'PGW18003', '2019-01-01', '2019-01-02', 'Belum Terlapor', NULL, 'belum diganti');
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK11', 'KOM', '', 'KOMLAB001', 'LABKOM001', 'PGW18003', '2019-01-01', '2019-01-01', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK12', 'NONKOM', 'LABKOM001/NKOM001', '', 'LABKOM001', 'PGW18002', '2019-01-07', '2019-01-07', 'Terlapor', 'tf', 'diganti');
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK13', 'KOM', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2019-02-04', '2019-02-04', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK14', 'KOM', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2019-01-28', '2019-02-11', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK15', 'KOM', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2019-01-28', '2019-02-11', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK16', 'KOM', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2019-02-06', '0000-00-00', 'Terlapor', 'asdsads', 'belum diganti');
INSERT INTO `tabel_inventory_rusak_total` VALUES ('RSK17', 'KOM', '', '', 'LABKOM001', 'PGW18002', '2019-02-07', '0000-00-00', 'Belum Terlapor', 'sds', 'belum diganti');

-- ----------------------------
-- Table structure for tabel_laboratorium
-- ----------------------------
DROP TABLE IF EXISTS `tabel_laboratorium`;
CREATE TABLE `tabel_laboratorium`  (
  `kd_lab` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_lab` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`kd_lab`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `tabel_laboratorium_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_admin` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tabel_laboratorium
-- ----------------------------
INSERT INTO `tabel_laboratorium` VALUES ('LABKOM001', 'PGW18002', 'Lab Komputer 1', 'digunakan');
INSERT INTO `tabel_laboratorium` VALUES ('LABKOM002', 'PGW18002', 'Lab Komputer 2', 'digunakan');
INSERT INTO `tabel_laboratorium` VALUES ('LABKOM003', 'PGW18005', 'Lab Komputer 3', 'digunakan');

-- ----------------------------
-- Table structure for tabel_maintenance
-- ----------------------------
DROP TABLE IF EXISTS `tabel_maintenance`;
CREATE TABLE `tabel_maintenance`  (
  `kd_maintenance` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_inventori` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_komputer` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_lab` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_lapor` date NOT NULL,
  `jadwal_maintenance` date NOT NULL,
  `maintenance_selanjutnya` date NOT NULL,
  `keterangan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `monitor` int(1) NULL DEFAULT NULL,
  `keyboard` int(1) NULL DEFAULT NULL,
  `mouse` int(1) NULL DEFAULT NULL,
  `memory` int(1) NULL DEFAULT NULL,
  `hdd` int(1) NULL DEFAULT NULL,
  `processor` int(1) NULL DEFAULT NULL,
  `ups` int(1) NULL DEFAULT NULL,
  `penyebab` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`kd_maintenance`) USING BTREE,
  INDEX `kd_inventori`(`kd_inventori`) USING BTREE,
  INDEX `kd_komputer`(`kd_komputer`) USING BTREE,
  INDEX `kd_lab`(`kd_lab`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `tabel_maintenance_ibfk_3` FOREIGN KEY (`kd_lab`) REFERENCES `tabel_laboratorium` (`kd_lab`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tabel_maintenance_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tabel_admin` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tabel_maintenance
-- ----------------------------
INSERT INTO `tabel_maintenance` VALUES ('M01', 'NONKOM001', 'KOMLAB001', 'LABKOM001', 'PGW18003', '2019-02-08', '2018-11-30', '2018-12-14', 'Perbaikan Monitor', 'Dikerjakan', 1, 0, 0, 0, 0, 0, 0, NULL);
INSERT INTO `tabel_maintenance` VALUES ('M03', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2019-02-08', '2018-12-19', '2019-01-02', 'Perbaikan Monitor', 'Dikerjakan', 0, 0, 1, 0, 0, 0, 0, NULL);
INSERT INTO `tabel_maintenance` VALUES ('M04', 'NONKOM001', '', 'LABKOM001', 'PGW18002', '2019-02-08', '2018-12-31', '2019-01-14', 'Perbaikan Switch', 'Dikerjakan', 0, 0, 0, 1, 0, 0, 0, NULL);
INSERT INTO `tabel_maintenance` VALUES ('M05', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2019-02-08', '2018-11-30', '2018-12-14', 'keyboard rusak', 'Dikerjakan', 0, 0, 1, 0, 0, 0, 0, NULL);
INSERT INTO `tabel_maintenance` VALUES ('M06', '', 'KOMLAB004', 'LABKOM001', 'PGW18002', '2019-02-08', '2018-12-22', '2019-01-05', 'Monitor rusak', 'Dikerjakan', 0, 1, 0, 0, 0, 0, 0, NULL);
INSERT INTO `tabel_maintenance` VALUES ('M07', 'NONKOM004', '', 'LABKOM002', 'PGW18002', '2019-02-08', '2018-12-22', '2019-01-05', 'Proyektor rusak', 'Belum Dikerjakan', 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `tabel_maintenance` VALUES ('M08', 'LABKOM001001', 'KOMLAB001', 'LABKOM001', 'PGW18003', '2019-02-08', '2018-12-10', '2018-12-24', 'dasd', 'Dikerjakan', 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `tabel_maintenance` VALUES ('M09', '', 'KOMLAB003', 'LABKOM002', 'PGW18003', '2019-02-08', '2018-12-31', '2019-01-14', 'asad', 'Belum Dikerjakan', 0, 0, 0, 0, 0, 0, 1, NULL);
INSERT INTO `tabel_maintenance` VALUES ('M10', '', 'KOMLAB001', 'LABKOM001', 'PGW18003', '2019-02-08', '2019-01-02', '2019-01-16', 'rer', 'Belum Dikerjakan', 0, 0, 0, 0, 0, 0, 1, NULL);
INSERT INTO `tabel_maintenance` VALUES ('M11', '', 'KOMLAB001', 'LABKOM001', 'PGW18003', '2019-02-08', '2019-01-01', '2019-01-15', 'sds', 'Dikerjakan', 1, 1, 0, 0, 0, 0, 0, NULL);
INSERT INTO `tabel_maintenance` VALUES ('M12', 'LABKOM001/NKOM001', '', 'LABKOM001', 'PGW18002', '2019-02-08', '2019-01-07', '2019-01-21', 'sdsd', 'Belum Dikerjakan', 0, 0, 0, 0, 0, 0, 0, NULL);
INSERT INTO `tabel_maintenance` VALUES ('M13', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2019-02-08', '2019-02-04', '2019-02-18', 'asda', 'Dikerjakan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');
INSERT INTO `tabel_maintenance` VALUES ('M14', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2019-02-08', '2019-02-11', '2019-02-25', 'fgf', 'Dikerjakan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'xgsfg');
INSERT INTO `tabel_maintenance` VALUES ('M15', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2019-02-08', '2019-02-11', '2019-02-25', 'fgf', 'Dikerjakan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'xgsfg');
INSERT INTO `tabel_maintenance` VALUES ('M16', 'LABKOM001/NKOM001', '', 'LABKOM001', 'PGW18002', '2019-02-08', '2019-02-05', '2019-02-19', 'sds', 'Belum Dikerjakan', 0, 0, 0, 0, 0, 0, 0, 'sds');

-- ----------------------------
-- Table structure for table_komponen_komputer
-- ----------------------------
DROP TABLE IF EXISTS `table_komponen_komputer`;
CREATE TABLE `table_komponen_komputer`  (
  `kd_komponen` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_komputer` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kd_komponen`, `kd_komputer`) USING BTREE,
  INDEX `kd_komputer`(`kd_komputer`) USING BTREE,
  CONSTRAINT `table_komponen_komputer_ibfk_1` FOREIGN KEY (`kd_komponen`) REFERENCES `tabel_inventori_komponen` (`kd_komponen`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `table_komponen_komputer_ibfk_2` FOREIGN KEY (`kd_komputer`) REFERENCES `tabel_inventori_komputer` (`kd_komputer`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_komponen_komputer
-- ----------------------------
INSERT INTO `table_komponen_komputer` VALUES ('LABKOM001/KMPN001', 'KOMLAB001', 'baik');
INSERT INTO `table_komponen_komputer` VALUES ('LABKOM001/KMPN004', 'KOMLAB001', 'baik');

-- ----------------------------
-- Table structure for table_komponen_maintenance
-- ----------------------------
DROP TABLE IF EXISTS `table_komponen_maintenance`;
CREATE TABLE `table_komponen_maintenance`  (
  `kd_maintenance` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_komponen` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kd_komponen`, `kd_maintenance`) USING BTREE,
  INDEX `kd_maintenance`(`kd_maintenance`) USING BTREE,
  CONSTRAINT `table_komponen_maintenance_ibfk_1` FOREIGN KEY (`kd_komponen`) REFERENCES `tabel_inventori_komponen` (`kd_komponen`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `table_komponen_maintenance_ibfk_2` FOREIGN KEY (`kd_maintenance`) REFERENCES `tabel_maintenance` (`kd_maintenance`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of table_komponen_maintenance
-- ----------------------------
INSERT INTO `table_komponen_maintenance` VALUES ('M15', 'LABKOM001/KMPN001', 'rusak', 'Headset mati');
INSERT INTO `table_komponen_maintenance` VALUES ('M15', 'LABKOM001/KMPN004', 'rusak', 'Batrai Mouse Mati');

SET FOREIGN_KEY_CHECKS = 1;

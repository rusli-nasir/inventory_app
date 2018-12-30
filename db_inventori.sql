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

 Date: 30/12/2018 18:45:24
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
INSERT INTO `tabel_admin` VALUES ('PGW18002', 'Ratih Widya Santi', 'Ratih', 'vNcF5G4k', 'ratihwid@gmail.com', '085737589555', 'admin', 'aktif');
INSERT INTO `tabel_admin` VALUES ('PGW18003', 'Restu', 'Restu', 'vNcF5G4k', 'restu_widanta@yahoo.com', '081123456789', 'operator', 'aktif');
INSERT INTO `tabel_admin` VALUES ('PGW18004', 'Budi', 'Budi', 'vNcF5G4k', 'budi@gmail.com', '081888777666555', 'inventaris', 'aktif');
INSERT INTO `tabel_admin` VALUES ('PGW18005', 'Sri Arthari', 'Arthari', 'vNcF5G4kwdw', 'restuwidanta456@gmail.com', '081456789321', 'admin', 'aktif');
INSERT INTO `tabel_admin` VALUES ('PGW18006', 'Eka Krisna', 'Ekakrisn', 'm2mriiKW', 'ekakris@gmail.com', '081236687989', 'operator', 'aktif');

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
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB001', 'LABKOM001', 'PGW18002', 'PC1', '2017', 'Windows 10 ', 'baik', 'baik', 'baik', 'buruk', 'baik', 'baik', 'baik', '-', 'Lengkap', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB002', 'LABKOM001', 'PGW18003', 'PC 2', '2018', 'Windows 10', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '-', 'Lengkap', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB003', 'LABKOM002', 'PGW18002', 'PC 1', '2018', 'windows 10', 'buruk', 'buruk', 'buruk', 'baik', 'buruk', 'buruk', 'baik', 'LAN Card', 'tes', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB004', 'LABKOM001', 'PGW18005', 'PC 3', '2018', 'Windows 10', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '-', 'Lengkap', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB005', 'LABKOM001', 'PGW18002', 'PC 4', '2018', 'Windows 10', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '-', 'Lengkap', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB006', 'LABKOM002', 'PGW18002', 'PC 2', '2018', 'Win 10', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '-', 'Lengkap', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB007', 'LABKOM001', 'PGW18002', 'PC 5', '2018', 'Windows 10', 'buruk', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '-', 'Lengkap', 'Dapat Dipakai');
INSERT INTO `tabel_inventori_komputer` VALUES ('KOMLAB008', 'LABKOM001', 'PGW18002', 'PC 6', '2018', 'Windows 10', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', 'baik', '-', 'Lengkap', 'Dapat Dipakai');
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
INSERT INTO `tabel_inventori_non_komputer` VALUES ('LABKOM001001', 'LABKOM001', 'PGW18003', 'sadasd', '434', 'baik', 'ffg', 'Dapat dipakai');
INSERT INTO `tabel_inventori_non_komputer` VALUES ('NONKOM001', 'LABKOM001', 'PGW18002', 'Switch', '2017', 'baik', '1', 'Dapat dipakai');
INSERT INTO `tabel_inventori_non_komputer` VALUES ('NONKOM002', 'LABKOM002', 'PGW18001', 'Switch', '2018', 'Baik', '', 'Dapat dipakai');
INSERT INTO `tabel_inventori_non_komputer` VALUES ('NONKOM003', 'LABKOM001', 'PGW18002', 'Proyektor', '2018', 'baik', '1', 'Dapat dipakai');
INSERT INTO `tabel_inventori_non_komputer` VALUES ('NONKOM004', 'LABKOM002', 'PGW18002', 'Proyektor', '2018', 'baik', '1', 'Dapat dipakai');

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
INSERT INTO `tabel_maintenance` VALUES ('M01', 'NONKOM001', 'KOMLAB001', 'LABKOM001', 'PGW18003', '2018-11-25', '2018-11-30', '2018-12-14', 'Perbaikan Monitor', 'Dikerjakan');
INSERT INTO `tabel_maintenance` VALUES ('M03', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2018-12-19', '2018-12-19', '2019-01-02', 'Perbaikan Monitor', 'Dikerjakan');
INSERT INTO `tabel_maintenance` VALUES ('M04', 'NONKOM001', '', 'LABKOM001', 'PGW18002', '2018-12-19', '2018-12-31', '2019-01-14', 'Perbaikan Switch', 'Dikerjakan');
INSERT INTO `tabel_maintenance` VALUES ('M05', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2018-11-23', '2018-11-30', '2018-12-14', 'keyboard rusak', 'Dikerjakan');
INSERT INTO `tabel_maintenance` VALUES ('M06', '', 'KOMLAB004', 'LABKOM001', 'PGW18002', '2018-12-20', '2018-12-22', '2019-01-05', 'Monitor rusak', 'Dikerjakan');
INSERT INTO `tabel_maintenance` VALUES ('M07', 'NONKOM004', '', 'LABKOM002', 'PGW18002', '2018-12-20', '2018-12-22', '2019-01-05', 'Proyektor rusak', 'Belum Dikerjakan');
INSERT INTO `tabel_maintenance` VALUES ('M08', 'LABKOM001001', 'KOMLAB001', 'LABKOM001', 'PGW18003', '2018-12-10', '2018-12-10', '2018-12-24', 'dasd', 'Dikerjakan');

SET FOREIGN_KEY_CHECKS = 1;

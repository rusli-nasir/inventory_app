SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `tabel_maintenance` ADD COLUMN `penyebab` text NULL AFTER `ups`;

CREATE TABLE IF NOT EXISTS `table_komponen_komputer` (
  `kd_komponen` varchar(20) NOT NULL,
  `kd_komputer` varchar(20) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_komponen`,`kd_komputer`),
  KEY `kd_komputer` (`kd_komputer`),
  CONSTRAINT `table_komponen_komputer_ibfk_1` FOREIGN KEY (`kd_komponen`) REFERENCES `tabel_inventori_komponen` (`kd_komponen`) ON UPDATE CASCADE,
  CONSTRAINT `table_komponen_komputer_ibfk_2` FOREIGN KEY (`kd_komputer`) REFERENCES `tabel_inventori_komputer` (`kd_komputer`) ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `table_komponen_maintenance` (
  `kd_maintenance` varchar(20) NOT NULL,
  `kd_komponen` varchar(20) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kd_komponen`,`kd_maintenance`) USING BTREE,
  KEY `kd_maintenance` (`kd_maintenance`),
  CONSTRAINT `table_komponen_maintenance_ibfk_2` FOREIGN KEY (`kd_maintenance`) REFERENCES `tabel_maintenance` (`kd_maintenance`) ON UPDATE CASCADE,
  CONSTRAINT `table_komponen_maintenance_ibfk_1` FOREIGN KEY (`kd_komponen`) REFERENCES `tabel_inventori_komponen` (`kd_komponen`) ON UPDATE CASCADE
) ENGINE=InnoDB;

SET FOREIGN_KEY_CHECKS = 1;
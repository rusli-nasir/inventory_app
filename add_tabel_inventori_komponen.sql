CREATE TABLE `tabel_inventori_komponen` (
  `kd_komponen` varchar(20) NOT NULL,
  `kd_lab` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `nama_komponen` varchar(50) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_komponen`) USING BTREE,
  KEY `kd_lab` (`kd_lab`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tabel_inventori_komponen_ibfk_1` FOREIGN KEY (`kd_lab`) REFERENCES `tabel_laboratorium` (`kd_lab`),
  CONSTRAINT `tabel_inventori_komponen_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tabel_admin` (`id_user`)
) ENGINE=InnoDB;
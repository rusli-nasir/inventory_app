SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE `tabel_inventory_rusak_total` (
  `kd_rusak_total` varchar(10) NOT NULL,
  `jenis_inventory` enum('KOM','NONKOM') NOT NULL DEFAULT 'KOM',
  `kd_inventori` varchar(20) DEFAULT NULL,
  `kd_komputer` varchar(20) DEFAULT NULL,
  `kd_lab` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `tanggal_lapor` date NOT NULL,
  `tanggal_ganti` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `penyebab` text,
  `status_inventoy` enum('diganti','belum diganti') DEFAULT 'belum diganti',
  PRIMARY KEY (`kd_rusak_total`) USING BTREE,
  KEY `kd_inventori` (`kd_inventori`),
  KEY `kd_komputer` (`kd_komputer`),
  KEY `kd_lab` (`kd_lab`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tabel_inventory_rusak_total_ibfk_1` FOREIGN KEY (`kd_lab`) REFERENCES `tabel_laboratorium` (`kd_lab`),
  CONSTRAINT `tabel_inventory_rusak_total_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tabel_admin` (`id_user`)
) ENGINE=InnoDB;

INSERT INTO `tabel_inventory_rusak_total`(`kd_rusak_total`, `jenis_inventory`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, `tanggal_lapor`, `tanggal_ganti`, `status`, `penyebab`, `status_inventoy`) VALUES ('RSK01', 'KOM', NULL, 'KOMLAB001', 'LABKOM001', 'PGW18003', '2018-11-25', '2018-11-30', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total`(`kd_rusak_total`, `jenis_inventory`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, `tanggal_lapor`, `tanggal_ganti`, `status`, `penyebab`, `status_inventoy`) VALUES ('RSK03', 'KOM', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2018-12-19', '2018-12-19', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total`(`kd_rusak_total`, `jenis_inventory`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, `tanggal_lapor`, `tanggal_ganti`, `status`, `penyebab`, `status_inventoy`) VALUES ('RSK04', 'NONKOM', 'NONKOM001', '', 'LABKOM001', 'PGW18002', '2018-12-19', '2018-12-31', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total`(`kd_rusak_total`, `jenis_inventory`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, `tanggal_lapor`, `tanggal_ganti`, `status`, `penyebab`, `status_inventoy`) VALUES ('RSK05', 'KOM', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2018-11-23', '2018-11-30', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total`(`kd_rusak_total`, `jenis_inventory`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, `tanggal_lapor`, `tanggal_ganti`, `status`, `penyebab`, `status_inventoy`) VALUES ('RSK06', 'KOM', '', 'KOMLAB004', 'LABKOM001', 'PGW18002', '2018-12-20', '2018-12-22', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total`(`kd_rusak_total`, `jenis_inventory`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, `tanggal_lapor`, `tanggal_ganti`, `status`, `penyebab`, `status_inventoy`) VALUES ('RSK07', 'NONKOM', 'NONKOM004', '', 'LABKOM002', 'PGW18002', '2018-12-20', '2018-12-22', 'Belum Terlapor', NULL, 'belum diganti');
INSERT INTO `tabel_inventory_rusak_total`(`kd_rusak_total`, `jenis_inventory`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, `tanggal_lapor`, `tanggal_ganti`, `status`, `penyebab`, `status_inventoy`) VALUES ('RSK08', 'NONKOM', 'LABKOM001001', NULL, 'LABKOM001', 'PGW18003', '2018-12-10', '2018-12-10', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total`(`kd_rusak_total`, `jenis_inventory`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, `tanggal_lapor`, `tanggal_ganti`, `status`, `penyebab`, `status_inventoy`) VALUES ('RSK09', 'KOM', '', 'KOMLAB003', 'LABKOM002', 'PGW18003', '2018-12-31', '2018-12-31', 'Belum Terlapor', NULL, 'belum diganti');
INSERT INTO `tabel_inventory_rusak_total`(`kd_rusak_total`, `jenis_inventory`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, `tanggal_lapor`, `tanggal_ganti`, `status`, `penyebab`, `status_inventoy`) VALUES ('RSK10', 'KOM', '', 'KOMLAB001', 'LABKOM001', 'PGW18003', '2019-01-01', '2019-01-02', 'Belum Terlapor', NULL, 'belum diganti');
INSERT INTO `tabel_inventory_rusak_total`(`kd_rusak_total`, `jenis_inventory`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, `tanggal_lapor`, `tanggal_ganti`, `status`, `penyebab`, `status_inventoy`) VALUES ('RSK11', 'KOM', '', 'KOMLAB001', 'LABKOM001', 'PGW18003', '2019-01-01', '2019-01-01', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total`(`kd_rusak_total`, `jenis_inventory`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, `tanggal_lapor`, `tanggal_ganti`, `status`, `penyebab`, `status_inventoy`) VALUES ('RSK12', 'NONKOM', 'LABKOM001/NKOM001', '', 'LABKOM001', 'PGW18002', '2019-01-07', '2019-01-07', 'Belum Terlapor', NULL, 'belum diganti');
INSERT INTO `tabel_inventory_rusak_total`(`kd_rusak_total`, `jenis_inventory`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, `tanggal_lapor`, `tanggal_ganti`, `status`, `penyebab`, `status_inventoy`) VALUES ('RSK13', 'KOM', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2019-02-04', '2019-02-04', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total`(`kd_rusak_total`, `jenis_inventory`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, `tanggal_lapor`, `tanggal_ganti`, `status`, `penyebab`, `status_inventoy`) VALUES ('RSK14', 'KOM', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2019-01-28', '2019-02-11', 'Terlapor', 'Banjir', 'diganti');
INSERT INTO `tabel_inventory_rusak_total`(`kd_rusak_total`, `jenis_inventory`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, `tanggal_lapor`, `tanggal_ganti`, `status`, `penyebab`, `status_inventoy`) VALUES ('RSK15', 'KOM', '', 'KOMLAB001', 'LABKOM001', 'PGW18002', '2019-01-28', '2019-02-11', 'Terlapor', 'Banjir', 'diganti');


SET FOREIGN_KEY_CHECKS = 1;
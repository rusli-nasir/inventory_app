<?php

include "../../config/koneksi.php";
$kd_inventori = $_POST['kd_inventori'];
$kd_lab	= $_POST['kd_lab'];
$id_user = $_POST['id_user'];
$nama_inventori = $_POST['nama_inventori'];
$tahun = $_POST['tahun'];
$kondisi = $_POST['kondisi'];
$keterangan = $_POST['keterangan'];
$status = $_POST['status'];

$query = "UPDATE tabel_inventori_non_komputer SET kd_lab='$kd_lab', 
								 id_user='$id_user',
								 nama_inventori='$nama_inventori',
								 tahun='$tahun',
								 kondisi='$kondisi',
								 keterangan='$keterangan',
								 status = '$status'
								 WHERE kd_inventori = '$kd_inventori'";

$hasil = mysqli_query($db,$query);

if ($hasil == true) {
  echo "<script>window.alert('Update Data Berhasil'); window.location.href='index.php'</script>";
} else {
  echo "<script>window.alert('Update Data Gagal'); window.location.href='ubah-non-komputer.php'</script>";
}
?>
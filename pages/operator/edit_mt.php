<?php

include "../../config/koneksi.php";
$kd_maintenance = $_POST['kd_maintenance'];
$kd_inventori = $_POST['kd_inventori'];
$kd_komputer = $_POST['kd_komputer'];
$kd_lab	= $_POST['kode_lab'];
$id_user = $_POST['id_user'];
$tanggal_lapor = $_POST['tanggal_lapor'];
$jadwal_maintenance = $_POST['jadwal_maintenance'];
$maintenance_selanjutnya = date('Y-m-d', strtotime('+14 days', strtotime($jadwal_maintenance)));
$keterangan = $_POST['keterangan'];
$status = $_POST['status'];


$query = "UPDATE tabel_maintenance SET kd_inventori = '$kd_inventori',
								 kd_komputer = '$kd_komputer',
								 kd_lab = '$kd_lab',
								 id_user = '$id_user',
								 tanggal_lapor='$tanggal_lapor', 
								 jadwal_maintenance = '$jadwal_maintenance',
								 maintenance_selanjutnya = '$maintenance_selanjutnya',
								 keterangan = '$keterangan',
								 status = '$status'
								 WHERE kd_maintenance = '$kd_maintenance'";

$hasil = mysqli_query($db,$query);

if ($hasil == true) {
  echo "<script>window.alert('Update Data Berhasil'); window.location.href='index.php'</script>";
} else {
  echo "<script>window.alert('Update Data Gagal'); window.location.href='ubah-maintenance.php'</script>";
}
?>
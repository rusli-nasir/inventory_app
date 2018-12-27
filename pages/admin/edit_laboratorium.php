<?php

include "../../config/koneksi.php";
$kd_lab = $_POST['kd_lab'];
$id_user = $_POST['id_user'];
$nama_lab = $_POST['nama_lab'];
$status = $_POST['status'];


$query = "UPDATE tabel_laboratorium SET id_user='$id_user', 
								 nama_lab = '$nama_lab',
								 status = '$status'
								 WHERE kd_lab = '$kd_lab'";

$hasil = mysqli_query($db,$query);

if ($hasil == true) {
  echo "<script>window.alert('Update Data Berhasil'); window.location.href='index.php'</script>";
} else {
  echo "<script>window.alert('Update Data Gagal'); window.location.href='ubah-laboratorium.php'</script>";
}
?>
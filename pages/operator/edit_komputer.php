<?php

include "../../config/koneksi.php";
$kd_komputer = $_POST['kd_komputer'];
$kd_lab = $_POST['kd_lab'];
$id_user = $_POST['id_user'];
$nama_komputer = $_POST['nama_komputer'];
$tahun = $_POST['tahun'];
$os_komputer = $_POST['os_komputer'];
$monitor = $_POST['monitor'];
$keyboard = $_POST['keyboard'];
$mouse = $_POST['mouse'];
$memory = $_POST['memory'];
$hdd = $_POST['hdd'];
$processor = $_POST['processor'];
$ups = $_POST['ups'];
$komponen_lain= $_POST['komponen_lain'];
$keterangan_komputer = $_POST['keterangan_komputer'];
$status = $_POST['status'];

$query = "UPDATE tabel_inventori_komputer SET kd_lab='$kd_lab', 
								 id_user = '$id_user',
								 nama_komputer = '$nama_komputer',
								 tahun= '$tahun',
								 os_komputer = '$os_komputer',
								 monitor = '$monitor',
								 keyboard = '$keyboard',
								 mouse = '$mouse',
								 memory = '$memory',
								 hdd = '$hdd',
								 processor = '$processor',
								 ups = '$ups',
								 komponen_lain = '$komponen_lain',
								 keterangan_komputer = '$keterangan_komputer',
								 status = '$status'
								 WHERE kd_komputer = '$kd_komputer'";

$hasil = mysqli_query($db,$query);

if ($hasil == true) {
  echo "<script>window.alert('Update Data Berhasil'); window.location.href='index.php'</script>";
} else {
  echo "<script>window.alert('Update Data Gagal'); window.location.href='ubah-komputer.php'</script>";
}
?>
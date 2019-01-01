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

$perangkat = $_POST['perangkat'];

$monitor = in_array('monitor',$perangkat)?1:0;
$keyboard = in_array('keyboard',$perangkat)?1:0;
$mouse = in_array('mouse',$perangkat)?1:0;
$memory = in_array('memory',$perangkat)?1:0;
$hdd = in_array('hdd',$perangkat)?1:0;
$processor = in_array('processor',$perangkat)?1:0;
$ups = in_array('ups',$perangkat)?1:0;


$query = "UPDATE tabel_maintenance SET 
                                 kd_inventori = '$kd_inventori',
								 kd_komputer = '$kd_komputer',
								 kd_lab = '$kd_lab',
								 id_user = '$id_user',
								 tanggal_lapor='$tanggal_lapor', 
								 jadwal_maintenance = '$jadwal_maintenance',
								 maintenance_selanjutnya = '$maintenance_selanjutnya',
								 keterangan = '$keterangan',
								 status = '$status',
								 monitor = $monitor,
								 keyboard = $keyboard,
                                 mouse = $mouse,
                                 memory = $memory,
                                 hdd = $hdd,
                                 processor = $processor,
                                 ups = $ups
								 WHERE kd_maintenance = '$kd_maintenance'";

$hasil = mysqli_query($db,$query);

if ($hasil == true) {
  echo "<script>window.alert('Update Data Berhasil'); window.location.href='index.php'</script>";
} else {
  echo "<script>window.alert('Update Data Gagal'); window.location.href='ubah-maintenance.php'</script>";
}
?>
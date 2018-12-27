<?php
include('../../config/koneksi.php');

$kd_maintenance = $_POST['kode_mt'];
$kd_inventori = $_POST['kd_inventori'];
$kd_komputer = $_POST['kd_komputer'];
$kd_lab = $_POST['kode_lab'];
$id_user	= $_POST['id_user'];
$tanggal_lapor	= $_POST['tanggal_lapor'];
$jadwal_maintenance	= $_POST['jadwal_maintenance'];
$maintenance_selanjutnya= date('Y-m-d', strtotime('+14 days', strtotime($jadwal_maintenance)));
$keterangan= $_POST['keterangan'];
$status = $_POST['status'];


$query = "INSERT INTO tabel_maintenance VALUES ('$kd_maintenance','$kd_inventori','$kd_komputer','$kd_lab','$id_user','$tanggal_lapor','$jadwal_maintenance','$maintenance_selanjutnya','$keterangan','$status');";

$hasil = mysqli_query($db, $query);
if($hasil){ 
    echo "<script>window.alert('Maintenance Berhasil'); window.location.href='index.php'</script>"; 
  }else{
   echo "<script>window.alert('Maintenance Gagal'); window.location.href='tambah-mt.php'</script>";
  }

?>



<?php
include('../../config/koneksi.php');

$kd_komputer = $_POST['kd_komputer'];
$kd_lab = $_POST['kd_lab'];
$id_user	= $_POST['id_user'];
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
$komponen_lain = $_POST['komponen_lain'];
$keterangan= $_POST['keterangan_komputer'];
$status = $_POST['status'];

$query = "INSERT INTO tabel_inventori_komputer VALUES ('$kd_komputer','$kd_lab','$id_user','$nama_komputer','$tahun','$os_komputer','$monitor','$keyboard','$mouse','$memory','$hdd','$processor','$ups','$komponen_lain','$keterangan','$status');";

$hasil = mysqli_query($db, $query);
if($hasil){ 
    echo "<script>window.alert('Tambah Inventori Berhasil'); window.location.href='data-komputer.php?kd_lab={$kd_lab}'</script>";
  }else{
   echo "<script>window.alert('Tambah Inventori Gagal'); window.location.href='insert_komputer.php'</script>";
  }

?>



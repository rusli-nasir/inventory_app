<?php
include('../../config/koneksi.php');

$kd_inventori = $_POST['kd_inventori'];
$kd_lab = $_POST['kd_lab'];
$id_user	= $_POST['id_user'];
$nama_inventori = $_POST['nama_inventori'];
$tahun = $_POST['tahun'];
$kondisi = $_POST['kondisi'];
$keterangan= $_POST['keterangan'];
$status = $_POST['status'];

$query = "INSERT INTO tabel_inventori_non_komputer VALUES ('$kd_inventori','$kd_lab','$id_user','$nama_inventori','$tahun','$kondisi','$keterangan','$status');";

$hasil = mysqli_query($db, $query);
if($hasil){
    echo "<script>window.alert('Tambah Inventori Berhasil'); window.location.href='data-non-komputer.php?kd_lab={$kd_lab}'</script>";
  }else{
   echo "<script>window.alert('Tambah Inventori Gagal'); window.location.href='tambah-non-komputer.php'</script>";
  }

?>



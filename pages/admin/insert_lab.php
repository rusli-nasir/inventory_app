<?php
include('../../config/koneksi.php');

$id = ($_POST['kd_lab']);
$id_user = ($_POST['id_user']);
$nama_lab	= ($_POST['nama_lab']);
$status = ($_POST['status']);

$query = "INSERT INTO tabel_laboratorium VALUES ('$id','$id_user','$nama_lab','$status');";

$hasil = mysqli_query($db, $query);
if($hasil){ 
   echo "<script>window.alert('Tambah Laboratorium Berhasil'); window.location.href='index.php'</script>"; 
  }else{
    echo "<script>window.alert('Tambah Laboratorium Gagal'); window.location.href='index.php'</script>"; 
  }

?>



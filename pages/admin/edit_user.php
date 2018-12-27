<?php

include "../../config/koneksi.php";
$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$level = $_POST['level'];
$status = $_POST['status'];



$query = "UPDATE tabel_admin SET nama='$nama', 
								 username = '$username',
								 password = '$password',
								 email = '$email',
								 no_hp = '$no_hp',
								 level = '$level',
								 status = '$status'
								 WHERE id_user = '$id_user'";

$hasil = mysqli_query($db,$query);

if ($hasil == true) {
  echo "<script>window.alert('Update Data Berhasil'); window.location.href='index.php'</script>";
} else {
  echo "<script>window.alert('Update Data Gagal'); window.location.href='ubah-user.php'</script>";
}
?>
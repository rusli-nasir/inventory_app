<?php
include('../../config/koneksi.php');

$id = $_POST['id'];
$nama = $_POST['nama'];
$username	= $_POST['username'];
$password	= $_POST['password'];
$email = $_POST['email'];
$no_hp = $_POST['no_telp'];
$level = $_POST['level'];
$status = $_POST['status'];



$cek = mysqli_num_rows(mysqli_query($db,"SELECT * FROM tabel_admin WHERE username='$username' or email='$email'"));
    if ($cek > 0){
    echo "<script>window.alert('username atau email yang anda masukan sudah ada')
    window.location='tambah-user.php'</script>";
    }else {
    mysqli_query($db,"INSERT INTO tabel_admin VALUES ('$id','$nama','$username','$password','$email','$no_hp','$level','$status')");
 
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='index.php'</script>";
    
    }
?>



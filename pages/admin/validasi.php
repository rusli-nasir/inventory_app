<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['username'])){
   header('../login');
}

//cek level user
if($_SESSION['level']!="admin")
{
     echo "<script>window.alert('Anda tidak bisa mengakses sistem ini'); window.location.href='../login'</script>";
}
?>
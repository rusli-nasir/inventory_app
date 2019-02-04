<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "db_inventori";
$db = mysqli_connect($host, $user, $pass, $database) or die("gagal koneksi ke database");
$mysqli = new mysqli($host, $user, $pass, $database);

if($mysqli->connect_error){
    print_r("gagal koneksi ke database");
    exit();
}

?>
<?php
include('../../config/koneksi.php');

$kd_maintenance = $_POST['kode_mt'];
$kd_inventori = $_POST['kd_inventori'];
$kd_lab = $_POST['kode_lab'];
$id_user	= $_POST['id_user'];
$tanggal_lapor	= $_POST['tanggal_lapor'];
$jadwal_maintenance	= $_POST['jadwal_maintenance'];
$maintenance_selanjutnya= date('Y-m-d', strtotime('+14 days', strtotime($jadwal_maintenance)));
$keterangan= $_POST['keterangan'];
$status = $_POST['status'];
$perangkat = array();

$monitor = in_array('monitor',$perangkat)?1:0;
$keyboard = in_array('keyboard',$perangkat)?1:0;
$mouse = in_array('mouse',$perangkat)?1:0;
$memory = in_array('memory',$perangkat)?1:0;
$hdd = in_array('hdd',$perangkat)?1:0;
$processor = in_array('processor',$perangkat)?1:0;
$ups = in_array('ups',$perangkat)?1:0;


$query = "INSERT INTO tabel_maintenance VALUES ('$kd_maintenance','$kd_inventori','','$kd_lab','$id_user','$tanggal_lapor','$jadwal_maintenance','$maintenance_selanjutnya','$keterangan','$status',
{$monitor},{$keyboard},{$mouse},{$memory},{$hdd},{$processor},{$ups});";

$hasil = mysqli_query($db, $query);
if($hasil){
    echo "<script>window.alert('Maintenance Berhasil'); window.location.href='data-mt-nonkomputer.php'</script>";
}else{
    echo "<script>window.alert('Maintenance Gagal'); window.location.href='tambah-mt-nonkomputer.php'</script>";
}

?>



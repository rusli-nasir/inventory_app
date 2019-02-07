<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 2/7/2019
 * Time: 9:18 AM
 */

include "../../config/koneksi.php";
$kd_rusak_total = $_POST['kd_rusak_total'];
$kd_inventori = $_POST['kd_inventori'];
$kd_komputer = $_POST['kd_komputer'];
$kd_lab	= $_POST['kode_lab'];
$id_user = $_POST['id_user'];
$tanggal_lapor = $_POST['tanggal_lapor'];
$tanggal_ganti = $_POST['tanggal_ganti'];
$jenis_inventory = $_POST['jenis_inventory'];
$maintenance_selanjutnya = date('Y-m-d', strtotime('+14 days', strtotime($jadwal_maintenance)));
$keterangan = $_POST['keterangan'];
$status = $_POST['status'];
$status_inventoy = $_POST['status_inventoy'];
$penyebab = $_POST['penyebab'];

//$perangkat = $_POST['perangkat'];
//
//$monitor = in_array('monitor',$perangkat)?1:0;
//$keyboard = in_array('keyboard',$perangkat)?1:0;
//$mouse = in_array('mouse',$perangkat)?1:0;
//$memory = in_array('memory',$perangkat)?1:0;
//$hdd = in_array('hdd',$perangkat)?1:0;
//$processor = in_array('processor',$perangkat)?1:0;
//$ups = in_array('ups',$perangkat)?1:0;


$query = "UPDATE tabel_inventory_rusak_total SET 
                                 kd_inventori = '$kd_inventori',
								 kd_komputer = '$kd_komputer',
								 kd_lab = '$kd_lab',
								 id_user = '$id_user',
								 tanggal_lapor='$tanggal_lapor', 
								 tanggal_ganti='$tanggal_ganti',
								 jenis_inventory='$jenis_inventory',
								 `status` = '$status',
								 status_inventoy = '$status_inventoy',
								 penyebab = '$penyebab'								  
								 WHERE kd_rusak_total = '$kd_rusak_total'";

$hasil = mysqli_query($db,$query);

if ($hasil == true) {
    echo "<script>window.alert('Update Data Berhasil'); window.location.href='data-inv-rusaktotal.php'</script>";
} else {
    echo "<script>window.alert('Update Data Gagal'); window.location.href='ubah-inv_rusak_total.php?kd_rusak_total='.$kd_rusak_total</script>";
}
?>
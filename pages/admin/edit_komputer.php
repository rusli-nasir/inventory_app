<?php

include "../../config/koneksi.php";
include('../../functions/query.php');

$kd_komputer = $_POST['kd_komputer'];
$kd_lab = $_POST['kd_lab'];
$id_user = $_POST['id_user'];
$nama_komputer = $_POST['nama_komputer'];
$tahun = $_POST['tahun'];
$os_komputer = $_POST['os_komputer'];
$monitor = null;//$_POST['monitor'];
$keyboard = null;//$_POST['keyboard'];
$mouse = null;//$_POST['mouse'];
$memory = null;//$_POST['memory'];
$hdd = null;//$_POST['hdd'];
$processor = null;//$_POST['processor'];
$ups = null;//$_POST['ups'];
$komponen_lain = null;//$_POST['komponen_lain'];
$keterangan_komputer = $_POST['keterangan_komputer'];
$status = $_POST['status'];
$daftarKomponen = $_POST['daftarKomponen'];

$cKdKOmp = $daftarKomponen['kd_komponen'];
$cKdKOmpStatus = $daftarKomponen['status'];
$items = array();

for ($i = 0, $iMax = count($cKdKOmp); $i < $iMax; $i++)
{
    if($cKdKOmpStatus[$i]){
        $items[] = array(
            "kd_komputer" => $kd_komputer,
            "kd_komponen" => $cKdKOmp[$i],
            "status" => $cKdKOmpStatus[$i],
        );
    }
}


$query = "UPDATE tabel_inventori_komputer SET kd_lab='$kd_lab', 
								 id_user = '$id_user',
								 nama_komputer = '$nama_komputer',
								 tahun= '$tahun',
								 os_komputer = '$os_komputer',
								 monitor = '$monitor',
								 keyboard = '$keyboard',
								 mouse = '$mouse',
								 memory = '$memory',
								 hdd = '$hdd',
								 processor = '$processor',
								 ups = '$ups',
                                  komponen_lain = '$komponen_lain',
								 keterangan_komputer = '$keterangan_komputer',
								 status = '$status'
								 WHERE kd_komputer = '$kd_komputer'";

$hasil = mysqli_query($db,$query);

if ($hasil == true) {
    if($items){
        update_komponen_komputer($items);
    }
  echo "<script>window.alert('Update Data Berhasil'); window.location.href='index.php'</script>";
} else {
  echo "<script>window.alert('Update Data Gagal'); window.location.href='ubah-komputer.php'</script>";
}
?>
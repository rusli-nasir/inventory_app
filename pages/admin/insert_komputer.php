<?php
include('../../config/koneksi.php');
include('../../functions/query.php');

$kd_komputer = $_POST['kd_komputer'];
$kd_lab = $_POST['kd_lab'];
$id_user	= $_POST['id_user'];
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
$keterangan= $_POST['keterangan_komputer'];
$status = $_POST['status'];
$daftarKomponen = $_POST['daftarKomponen'];

echo '<pre>';
//print_r($daftarKomponen);
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
//print_r($items);

echo '</pre>';
//die();

$query = "INSERT INTO tabel_inventori_komputer VALUES ('$kd_komputer','$kd_lab','$id_user','$nama_komputer','$tahun','$os_komputer','$monitor','$keyboard','$mouse','$memory','$hdd','$processor','$ups','$komponen_lain','$keterangan','$status');";

$hasil = mysqli_query($db, $query);
if($hasil){
    if($items){
        update_komponen_komputer($items);
    }
    echo "<script>window.alert('Tambah Inventori Berhasil'); window.location.href='data-komputer.php?kd_lab={$kd_lab}'</script>";
  }else{
   echo "<script>window.alert('Tambah Inventori Gagal'); window.location.href='insert_komputer.php'</script>";
  }

?>



<?php
include('../../config/koneksi.php');
include('../../functions/query.php');

$kd_maintenance = $_POST['kode_mt'];
$kd_inventori = '';//$_POST['kd_inventori'];
$kd_komputer = $_POST['kd_komputer'];
$kd_lab = $_POST['kode_lab'];
$id_user	= $_POST['id_user'];
$tanggal_lapor	= $_POST['tanggal_lapor'];
$jadwal_maintenance	= $_POST['jadwal_maintenance'];
$maintenance_selanjutnya= date('Y-m-d', strtotime('+14 days', strtotime($jadwal_maintenance)));
$keterangan= $_POST['keterangan'];
$status = $_POST['status'];
$penyebab = $_POST['penyebab'];
$perangkat = $_POST['perangkat']?:[];

$monitor = in_array('monitor',$perangkat)?1:0;
$keyboard = in_array('keyboard',$perangkat)?1:0;
$mouse = in_array('mouse',$perangkat)?1:0;
$memory = in_array('memory',$perangkat)?1:0;
$hdd = in_array('hdd',$perangkat)?1:0;
$processor = in_array('processor',$perangkat)?1:0;
$ups = in_array('ups',$perangkat)?1:0;

$daftarKomponen = $_POST['daftarKomponen'];

$cKdKOmp = $daftarKomponen['kd_komponen'];
$cKdKOmpStatus = $daftarKomponen['status'];
$cKdKOmpKet = $daftarKomponen['keterangan'];
$cKdKOmpCek = $daftarKomponen['cek'];
$items = array();
$items2 = array();
for ($i = 0, $iMax = count($cKdKOmp); $i < $iMax; $i++)
{
    if($cKdKOmpStatus[$i]){
        $items[] = array(
            "kd_maintenance" => $kd_maintenance,
            "kd_komponen" => $cKdKOmp[$i],
            "status" => $cKdKOmpStatus[$i],
            "keterangan" => $cKdKOmpKet[$i],
        );
        $items2[] = array(
            "kd_komputer" => $kd_komputer,
            "kd_komponen" => $cKdKOmp[$i],
            "status" => $cKdKOmpStatus[$i],
        );
    }
}

$query = "INSERT INTO tabel_maintenance
(`kd_maintenance`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, `tanggal_lapor`, 
`jadwal_maintenance`, `maintenance_selanjutnya`, `keterangan`, `status`, `penyebab`) 
VALUES ('$kd_maintenance','$kd_inventori','$kd_komputer','$kd_lab',
'$id_user','$tanggal_lapor','$jadwal_maintenance','$maintenance_selanjutnya','$keterangan','$status','{$penyebab}');";

//$hasil = mysqli_query($db, $query);
$hasil = $mysqli->query($query);
if($hasil){
    if($items){
        update_komponen_maintenance_komputer($items);
    }
    if($items2){
        update_komponen_komputer($items2);
    }
    echo "<script>window.alert('Maintenance Berhasil'); window.location.href='data-mt.php'</script>";
  }else{
    print_r($mysqli->error);
    die();
   echo "<script>window.alert('Maintenance Gagal'); window.location.href='tambah-mt.php'</script>";
  }

?>



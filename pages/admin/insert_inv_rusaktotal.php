<?php
include('../../config/koneksi.php');
include('../../functions/query.php');

$kd_rusak_total = $_POST['kd_rusak_total'];
$kd_inventori = isset($_POST['kd_inventori'])?$_POST['kd_inventori']:null;
$kd_komputer = isset($_POST['kd_komputer'])?$_POST['kd_komputer']:null;
$kd_lab = $_POST['kode_lab'];
$jenis_inventory = $_POST['jenis_inventory'];
$id_user	= $_POST['id_user'];
$tanggal_lapor	= $_POST['tanggal_lapor'];
$tanggal_ganti	= '';//$_POST['tanggal_ganti'];
//$keterangan= $_POST['keterangan'];
$status = $_POST['status'];
$penyebab = $_POST['penyebab'];
$status_inventoy = $_POST['status_inventoy'];
$perangkat = isset($_POST['perangkat'])?$_POST['perangkat']:[];

$monitor = in_array('monitor',$perangkat)?1:0;
$keyboard = in_array('keyboard',$perangkat)?1:0;
$mouse = in_array('mouse',$perangkat)?1:0;
$memory = in_array('memory',$perangkat)?1:0;
$hdd = in_array('hdd',$perangkat)?1:0;
$processor = in_array('processor',$perangkat)?1:0;
$ups = in_array('ups',$perangkat)?1:0;

$daftarKomponen = isset($_POST['daftarKomponen'])?$_POST['daftarKomponen']:[];

if($daftarKomponen){
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
                "kd_rusak_total" => $kd_rusak_total,
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
}


$query = "INSERT INTO `tabel_inventory_rusak_total`
(`kd_rusak_total`, `jenis_inventory`, `kd_inventori`, `kd_komputer`, `kd_lab`, `id_user`, 
`tanggal_lapor`, `tanggal_ganti`, `status`, `penyebab`, `status_inventoy`) 
VALUES ('{$kd_rusak_total}', '{$jenis_inventory}', '{$kd_inventori}', '{$kd_komputer}', '{$kd_lab}', '{$id_user}', 
'{$tanggal_lapor}', '{$tanggal_ganti}', '{$status}', '{$penyebab}', '{$status_inventoy}');";

//$hasil = mysqli_query($db, $query);
$hasil = $mysqli->query($query);
if($hasil){
//    if($items){
//        update_komponen_maintenance_komputer($items);
//    }
//    if($items2){
//        update_komponen_komputer($items2);
//    }
    echo "<script>window.alert('Maintenance Berhasil'); window.location.href='data-mt.php'</script>";
  }else{
    print_r($mysqli->error);
    die();
   echo "<script>window.alert('Maintenance Gagal'); window.location.href='tambah-mt.php'</script>";
  }

?>



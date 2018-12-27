<?php
$error=''; 
include "../../config/koneksi.php";
$query ="SELECT * from tabel_maintenance";
$hasil = mysqli_query($db, $query);
$data_lab = array();
while ($row = mysqli_fetch_assoc($hasil)) {
$data_lab[] = $row;
}
?>

<?php foreach ($data_lab as $data) :  ?>

<?php
$masaaktif = "$data[jadwal_maintenance]"; 
$status = $data['status'];
?>
<?php endforeach ?>

<?php  
$sekarang = date("d-m-Y"); 
$masaberlaku = strtotime($masaaktif) - strtotime($sekarang); 
$tenggang = $masaberlaku/(24*60*60);
?> 

<?php  
if($tenggang<=8 && $status=='Belum Dikerjakan') 
{ 
echo
'<script>
	 if (confirm("Silahkan cek periode tanggal maintenance inventori")) {
       window.location.href="data-mt.php";
    } else {
        window.location.href="index.php";
    }
</script>';
} 
?>
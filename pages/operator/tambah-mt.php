<?php
include "../../config/koneksi.php";
include "validasi.php";
$id = $_SESSION['id_user'];
// mencari kode user dengan nilai paling besar
$query = "SELECT max(kd_maintenance) as maxKode FROM tabel_maintenance";
$hasil = mysqli_query($db,$query);
$data = mysqli_fetch_array($hasil);
$kom = $data['maxKode'];
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kom, 1, 3);
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "M";
$kdKom = $char . sprintf("%02s", $noUrut);
$cetakKode = $kdKom  ;
?>
<!DOCTYPE html>
<html lang="en">

<?php
    include "../partial/head.html";
?>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php
        include "header-mobile.html";
        ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php
        include "sidebar.php";
        ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php
        include "header-desktop.html";
        ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Tambah Data Maintenance</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_maintenance.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Kode Maintenance</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="kode_mt" class="form-control" value="<?php echo $cetakKode; ?>" readonly="readonly">
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Tanggal lapor</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input id="tgl_mulai" type="text" class="form-control datepicker" name="tanggal_lapor" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Kode Laboratorium</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                     <?php
                                                    include('../../config/koneksi.php');
                                                    $query = "SELECT * FROM tabel_laboratorium";
                                                    $hasil = mysqli_query($db, $query);
                                                    $data_mt = array();
                                                    while ($row = mysqli_fetch_assoc($hasil)) {
                                                    $data_mt[] = $row;
                                                     }
                                                    ?>
                                                   <select name="kode_lab" id="kode_lab" class="form-control-sm form-control">
                                                      <option value="0">Please select</option>
                                                      <?php foreach ($data_mt as $data) : ?>
                                                      <option value="<?php echo $data['kd_lab'] ?>">
                                                      <?php echo $data['kd_lab'] ?> | <?php echo $data['nama_lab'] ?> </option>
                                                      <?php endforeach ?>
                                                    </select>
                                                    
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Jadwal Maintenance</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input id="tgl_akhir" type="text" class="form-control datepicker" name="jadwal_maintenance" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">ID User</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                   <input type="text" name="id_user" class="form-control" readonly="readonly" value="<?php echo $id ?>">
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Keterangan</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="keterangan" class="form-control" required>

                                                </div>
                                            </div>

                                             <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Kode Komputer</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                   <select name="kd_komputer" id="kd_komputer" class="form-control-sm form-control"></select>
                                                </div>
                                                 <div class="col col-md-2">
                                                     <label for="text-input" class=" form-control-label">Status</label>
                                                 </div>
                                                 <div class="col-12 col-md-4">
                                                     <select name="status" class="form-control-sm form-control" required>
                                                         <option value="Dikerjakan">Dikerjakan</option>
                                                         <option value="Belum Dikerjakan">Belum Dikerjakan</option>
                                                     </select>
                                                 </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Perangkat Rusak</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <?php
                                                    $perangkat = array (
                                                        'monitor' => 'Monitor',
                                                        'keyboard' => 'Keyboard',
                                                        'mouse' => 'Mouse',
                                                        'memory' => 'Memory',
                                                        'hdd' => 'HDD',
                                                        'processor' => 'Processor',
                                                        'ups' => 'UPS',
                                                    );
                                                    foreach ($perangkat as $key => $val){
                                                        ?>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="perangkat" name="perangkat[]" value="<?= $key?>">
                                                            <label class="form-check-label" for="inlineCheckbox1"><?= $val?></label>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="button-submit">
                                                <input type="submit" class="btn btn-primary btn-sm" value="SIMPAN"></input>
                                                <input type="reset" class="btn btn-danger btn-sm" value="BATAL"></input>
                                            </div>
                                            </div>
                                        </form>
                                    </div>  
                                </div>
                            </div>
                            
                        </div>
                        <?php
                        include "footer.html";
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

     <?php
 include"../partial/script.html";
 ?>

</body>

</html>
<!-- end document-->

<script type="text/javascript">
   $(function(){
     $(".datepicker").datepicker({
        format: 'yyyy-m-d',
        autoclose: true,
        todayHighlight: true,
    });
    $("#tgl_mulai").on('changeDate', function(selected) {
        var startDate = new Date(selected.date.valueOf());
        $("#tgl_akhir").datepicker('setStartDate', startDate);
        if($("#tgl_mulai").val() > $("#tgl_akhir").val()){
          $("#tgl_akhir").val($("#tgl_mulai").val());
        }
    });

       $("#kode_lab").on('change',function(){

           // variabel dari nilai combo box provinsi
           var kd_lab = $("#kode_lab").val();

           // tampilkan image load
           $("#imgLoad").show("");

           // mengirim dan mengambil data
           $.ajax({
               type: "POST",
               dataType: "html",
               url: "cari_komputer.php",
               data: "kd_lab="+kd_lab,
               success: function(msg){

                   // jika tidak ada data
                   if(msg == ''){
                       alert('Tidak ada Inventori');
                   }

                   // jika dapat mengambil data,, tampilkan di combo box kota
                   else{
                       $("#kd_komputer").html(msg);
                   }

                   // hilangkan image load
                   $("#imgLoad").hide();
               }
           });
       });
  });
</script>






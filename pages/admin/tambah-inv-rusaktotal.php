<?php
include "../../config/koneksi.php";
include "validasi.php";
$id = $_SESSION['id_user'];
// mencari kode user dengan nilai paling besar
$query = "SELECT max(kd_rusak_total) as maxKode FROM tabel_inventory_rusak_total";
$hasil = mysqli_query($db,$query);
$data = mysqli_fetch_array($hasil);
$kom = $data['maxKode'];
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kom, 3, 3);
//print_r($noUrut);
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "RSK";
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
                                        <strong>Tambah Data Inventory Rusak Total</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_inv_rusaktotal.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <input id="id_user" type="hidden"  name="id_user" value="<?= $id?>">
                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Kode Rusak Total</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="kd_rusak_total" class="form-control" value="<?php echo $cetakKode; ?>" readonly="readonly">
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
                                                    <label for="text-input" class=" form-control-label">Tanggal Ganti</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input id="tgl_akhir" type="text" class="form-control datepicker" name="tanggal_ganti" disabled>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Jenis Inventori</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <select name="jenis_inventory" id="jenis_inventory" class="form-control-sm form-control" required>
                                                        <option value="">Please select</option>
                                                        <option value="KOM">Komputer</option>
                                                        <option value="NONKOM">Non Komputer</option>
                                                    </select>
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <select name="status" class="form-control-sm form-control" required>
                                                        <option value="Belum Terlapor">Belum Terlapor</option>
                                                        <option value="Terlapor">Terlapor</option>
                                                    </select>
                                                </div>
                                                <div id="data_kom" style="display: none; width: 100%">
                                                    <div class="col col-md-2">
                                                        <label for="text-input" class=" form-control-label">Inventori Komputer</label>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <select name="kd_komputer" id="kd_komputer" class="form-control-sm form-control"></select>
                                                    </div>
                                                </div>
                                                <div id="data_nonkom" style="display: none; width: 100%">
                                                    <div class="col col-md-2">
                                                        <label for="text-input" class=" form-control-label">Inventori Non Komputer</label>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <select name="kd_inventori" id="kd_inventori" class="form-control-sm form-control"></select>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="row form-group">
                                                 <div class="col col-md-2">
                                                     <label for="text-input" class=" form-control-label">Status Inventori</label>
                                                 </div>
                                                 <div class="col-12 col-md-4">
                                                     <select name="status_inventoy" id="status_inventoy" class="form-control-sm form-control">
                                                         <option value="belum diganti">Belum diganti</option>
                                                         <option value="diganti">Diganti</option>
                                                     </select>
                                                 </div>
                                                 <div class="col col-md-2">
                                                     <label for="text-input" class=" form-control-label">Penyebab</label>
                                                 </div>
                                                 <div class="col-12 col-md-4">
                                                     <input type="text" name="penyebab" class="form-control" required>
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
        // var startDate = new Date(selected.date.valueOf());
        // $("#tgl_akhir").datepicker('setStartDate', startDate);
        // if($("#tgl_mulai").val() > $("#tgl_akhir").val()){
        //   $("#tgl_akhir").val($("#tgl_mulai").val());
        // }
    });

    $('#jenis_inventory').on('change',function () {
        var value = $(this).val();
        $("#kode_lab").trigger('change');
        switch (value) {
            case 'KOM':
                $('#data_kom').show();
                $('#data_nonkom').hide();
                break;
            case 'NONKOM':
                $('#data_nonkom').show();
                $('#data_kom').hide();
                break;
            default:
                $('#data_nonkom').hide();
                $('#data_kom').hide();
                break;
        }
    });

       $("#kode_lab").on('change',function(){
           var jenis_inventory = $('#jenis_inventory').val();
           if(!jenis_inventory){
               alert('Jenis Inventori belum ditentukan');
               $("#kd_inventori").html('');
               $("#kd_komputer").html('');
               $("#kode_lab").val(0);
               return false;
           }
           // variabel dari nilai combo box provinsi
           var kd_lab = $("#kode_lab").val();

           // tampilkan image load
           $("#imgLoad").show("");

           // mengirim dan mengambil data
           $.ajax({
               type: "POST",
               dataType: "html",
               url: "cari_inventori.php",
               data: {
                   kd_lab:kd_lab,
                   jenis_inventory:jenis_inventory
               } ,
               success: function(msg){

                   // jika tidak ada data
                   if(msg == ''){
                       $("#kd_inventori").html('');
                       $("#kd_komputer").html('');
                       alert('Tidak ada Inventori');
                   }

                   // jika dapat mengambil data,, tampilkan di combo box kota
                   else{
                       switch (jenis_inventory) {
                           case 'KOM':
                               $("#kd_komputer").html(msg);
                               $("#kd_komputer").trigger('change');
                               break;
                           case 'NONKOM':
                               $("#kd_inventori").html(msg);
                               break;

                       }
                   }

                   // hilangkan image load
                   $("#imgLoad").hide();
               }
           });
       });

       // $("#perangkat_rusak").change('.cek_komponen',function() {
       //     var parent_tr = $(this).parents('tr');
       //     var self = this;
       //     $(parent_tr).find('.prop-komponen').each(function () {
       //         console.log('asasa');
       //         if ($(this).prop('disabled')) {
       //             $(this).prop('disabled',self.checked);
       //         }
       //     });
       // });

       // $("#kd_komputer").on('change',function(){
       //
       //     // variabel dari nilai combo box provinsi
       //     var kd_komputer = $("#kd_komputer").val();
       //
       //     // tampilkan image load
       //     $("#imgLoad").show("");
       //
       //     // mengirim dan mengambil data
       //     $.ajax({
       //         type: "POST",
       //         dataType: "html",
       //         url: "cari_komponen.php",
       //         data: "kd_komputer="+kd_komputer,
       //         success: function(msg){
       //
       //             // jika tidak ada data
       //             if(msg == ''){
       //                 alert('Tidak ada Inventori');
       //             }
       //
       //             // jika dapat mengambil data,, tampilkan di combo box kota
       //             else{
       //                 $("#perangkat_rusak").find('tbody').html(msg);
       //             }
       //
       //             // hilangkan image load
       //             $("#imgLoad").hide();
       //         }
       //     });
       // });
  });
</script>






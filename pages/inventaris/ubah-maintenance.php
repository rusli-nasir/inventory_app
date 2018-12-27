<?php
include "validasi.php";
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
                                        <strong>Ubah Data Maintenance</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="edit_mt.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <?php
                                            include('../../config/koneksi.php');
                                            $kd_maintenance = $_GET['kd_maintenance'];
                                            $query = "SELECT * FROM tabel_maintenance WHERE kd_maintenance = '$kd_maintenance'";
                                            $hasil = mysqli_query($db, $query);
                                            $data_mt = array();
                                            while ($row = mysqli_fetch_assoc($hasil)) {
                                            $data_mt[] = $row;
                                            }?>

                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Kode Maintenance</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="kd_maintenance" class="form-control" value="<?php echo $data_mt[0]['kd_maintenance'] ?>" readonly="readonly">
                                                    
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Tanggal lapor</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input id="tgl_mulai" type="text" class="form-control datepicker" name="tanggal_lapor"  value="<?php echo $data_mt[0]['tanggal_lapor'] ?>">
                                                    
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
                                                    $data_lab = array();
                                                    while ($row = mysqli_fetch_assoc($hasil)) {
                                                    $data_lab[] = $row;
                                                     }
                                                    ?>
                                                   <select name="kode_lab" class="form-control-sm form-control">
                                                      <option value="<?php echo $data_mt[0]['kd_lab'] ?>" selected><?php echo $data_mt[0]['kd_lab'] ?></option>
                                                      <option>----------------------</option>
                                                      <?php foreach ($data_lab as $data) : ?>
                                                      <option value="<?php echo $data['kd_lab'] ?>">
                                                      <?php echo $data['kd_lab'] ?> | <?php echo $data['nama_lab'] ?> </option>
                                                      <?php endforeach ?>
                                                    </select>
                                                    
                                                </div>
                                               <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Jadwal Maintenance</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input id="tgl_mulai" type="text" class="form-control datepicker" name="jadwal_maintenance"  value="<?php echo $data_mt[0]['jadwal_maintenance'] ?>">
                                                    
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">ID User</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                   <?php
                                                    include('../../config/koneksi.php');
                                                    $query = "SELECT * FROM tabel_admin";
                                                    $hasil = mysqli_query($db, $query);
                                                    $data_user = array();
                                                    while ($row = mysqli_fetch_assoc($hasil)) {
                                                    $data_user[] = $row;
                                                     }
                                                    ?>
                                                   <select name="id_user" class="form-control-sm form-control">
                                                      <option value="<?php echo $data_mt[0]['id_user'] ?>" selected><?php echo $data_mt[0]['id_user'] ?></option>
                                                      <option>----------------------</option>
                                                      <?php foreach ($data_user as $data) : ?>
                                                      <option value="<?php echo $data['id_user'] ?>">
                                                      <?php echo $data['id_user'] ?> | <?php echo $data['username'] ?> </option>
                                                      <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Keterangan</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="keterangan" class="form-control" value="<?php echo $data_mt[0]['keterangan'] ?>">
                                                    
                                                </div> 
                                            </div>

                                             <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Kode Komputer</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                   <?php
                                                    include('../../config/koneksi.php');
                                                    $query = "SELECT * FROM tabel_inventori_komputer";
                                                    $hasil = mysqli_query($db, $query);
                                                    $data_kom = array();
                                                    while ($row = mysqli_fetch_assoc($hasil)) {
                                                    $data_kom[] = $row;
                                                     }
                                                    ?>
                                                   <select name="kd_komputer" class="form-control-sm form-control">
                                                      <option value="<?php echo $data_mt[0]['kd_komputer'] ?>" selected><?php echo $data_mt[0]['kd_komputer'] ?></option>
                                                      <option>----------------------</option>
                                                      <?php foreach ($data_kom as $data) : ?>
                                                      <option value="<?php echo $data['kd_komputer'] ?>">
                                                      <?php echo $data['kd_komputer'] ?> | <?php echo $data['nama_komputer'] ?> </option>
                                                      <?php endforeach ?>
                                                    </select>
                                                </div>

                                                 <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                   <select name="status" class="form-control-sm form-control">
                                                  <option value="<?php echo $data_mt[0]['status'] ?>"><?php echo $data_mt[0]['status'] ?></option>
                                                   <option>----------------------</option>
                                                   <option value="Dikerjakan">Dikerjakan</option>
                                                   <option value="Belum Dikerjakan">Belum Dikerjakan</option>
                                                   </select>
                                                </div>
                                                
                                            </div>

                                             <div class="row form-group">
                                                <div class="col col-md-2">
                                                    &nbsp
                                                </div>
                                                <div class="col-12 col-md-4">
                                                   &nbsp
                                                    
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
  });
</script>

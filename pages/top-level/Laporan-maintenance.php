<?php
    include "../../config/koneksi.php";
    include "validasi.php";
    $kd_lab = $_GET['kd_lab'];

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
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-header">
                                       <?php
                                        $query = "SELECT * from tabel_laboratorium where kd_lab ='$kd_lab'";
                                        $hasil = mysqli_query($db, $query);
                                        $data_lab = array();
                                        while ($row = mysqli_fetch_assoc($hasil)) {
                                        $data_lab[] = $row;
                                        }
                                        ?>
                                         <?php foreach ($data_lab as $data) :  ?>
                                        <strong>Data Non Komputer <?php echo $data['nama_lab']; ?></strong>
                                        <?php  endforeach ?>
                                    </div>

                                    <div class="card-body card-block">
                                        <div class="filters m-b-45" align="right">

                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Minimum date</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input name="min" id="min" type="text" class="form-control form-control-sm">   
                                                </div>

                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Maximum date</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input name="max" id="max" type="text" class="form-control form-control-sm">
                                            </div>
                                                                                
                                            
                                        </div>
                                    </div>
                                      <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="10">No</th>
                                                <th>ID Maintenance</th>
                                                <th>Kode Lab</th>
                                                <th>Tanggal Lapor</th>
                                                <th>Jadwal MT</th>
                                                <th>Keterangan</th>
                                                <th>MT Selanjutnya</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                         <?php
                                            $no=0;
                                            include "../../config/koneksi.php";
                                            $kd_lab = $data['kd_lab'];
                                            $query = "SELECT * FROM tabel_maintenance where kd_lab = '$kd_lab'";
                                            $hasil = mysqli_query($db, $query);
                                            $data_mt = array();
                                            while ($row = mysqli_fetch_assoc($hasil)) {
                                            $data_mt[] = $row;
                                            }
                                             ?>
                                        <tbody>
                                            <?php foreach ($data_mt as $data) :  ?>
                                            <tr>
                                                <td><?php $no++; echo "$no" ?></td>
                                                <td><?php echo $data['kd_maintenance']; ?></td>
                                                <td><?php echo $data['kd_lab']; ?></td>
                                                <td><?php echo $data['tanggal_lapor']; ?></td>
                                                <td><?php echo $data['jadwal_maintenance']; ?></td>
                                                <td><?php echo $data['keterangan']; ?></td>
                                                <td><?php echo $data['maintenance_selanjutnya']; ?></td>
                                                <td><?php echo $data['status']; ?></td>   
                                           </tr>
                                       <?php endforeach ?>
                                        </tbody>
                                    </table> 

                                   <a href="cetak-laporan-maintenance.php?kd_lab=<?php echo $data['kd_lab'] ?>" class="btn btn-primary" type="button" style="margin-top: 20px;"><i class="fa fa-print"></i>&nbsp Cetak Pdf</a>
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
    </div>

    <!-- Jquery JS-->
     <!-- Jquery JS-->
 <?php
 include"../partial/script.html";
 ?>
  <script>
    $(document).ready(function(){
        $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#min').datepicker("getDate");
            var max = $('#max').datepicker("getDate");
            var startDate = new Date(data[4]);
            if (min == null && max == null) { return true; }
            if (min == null && startDate <= max) { return true;}
            if(max == null && startDate >= min) {return true;}
            if (startDate <= max && startDate >= min) { return true; }
            return false;
        }
        );

       
            $("#min").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
            $("#max").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
            var table = $('#example').DataTable();

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });
    </script>

  


</body>

</html>
<!-- end document-->

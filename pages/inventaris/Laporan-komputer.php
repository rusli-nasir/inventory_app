<?php
    include "../../config/koneksi.php";
    include "../../functions/query.php";
    include "validasi.php";
    $kd_lab = $_GET['kd_lab'];
    $periode = isset($_GET['periode'])?$_GET['periode']:date('Y-m');

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
                                        <strong>Data Komputer <?php echo $data['nama_lab']; ?></strong>
                                        <?php  endforeach ?>
                                    </div>
                                    <br>
                                    <div class="col-lg-4 offset-lg-8">
                                        <form action="" method="get">
                                            <div class="form-group">
                                                <div class="input-group mb-2">
                                                    <select name="periode" id="periode" class="form-control" onchange="this.form.submit()">
                                                        <?php
                                                        $date = explode('-', date('Y-m'));
                                                        $year = $date[0];
                                                        $month = $date[1];
                                                        $startMont = $date[1] - 5;
                                                        for ($i = $startMont; $i < $month; ++$i) {
                                                            $time = strtotime(sprintf('+%d months', $i));
                                                            $value = date('Y-m', $time);
                                                            $label = date('F Y', $time);
                                                            $selected = $periode == $value? 'selected':null;
                                                            printf('<option value="%s" '.$selected.'>%s</option>', $value, $label);
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                                    </div>
                                                    <input type="hidden" name="kd_lab" value="<?= $kd_lab?>">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                     <div class="col-lg-12">
                                        <div class="au-card m-b-30">
                                            <div class="au-card-inner">
                                             <h3 class="title-2 m-b-30">Bar chart</h3>
                                                <canvas id="barChart"></canvas>
                                             </div>
                                         </div>
                                     </div>

                                    <div class="card-body card-block">
                                      
                                       <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                               
                                                <th>Inventaris</th>
                                                <th>Baik</th>
                                                <th>Rusak</th>
                                            </tr>
                                           
                                        </thead>
                                        
                                        <tbody>
                                        <tr><td>Monitor</td><td><?= get_maintenance_komp_periode_count($kd_lab,$periode,'monitor',0); ?></td><td><?= get_maintenance_komp_periode_count($kd_lab,$periode,'monitor',1); ?></td></tr>
                                        <tr><td>Keyboard</td><td><?= get_maintenance_komp_periode_count($kd_lab,$periode,'keyboard',0); ?></td><td><?= get_maintenance_komp_periode_count($kd_lab,$periode,'keyboard',1); ?></td></tr>
                                        <tr><td>Mouse</td><td><?= get_maintenance_komp_periode_count($kd_lab,$periode,'mouse',0); ?></td><td><?= get_maintenance_komp_periode_count($kd_lab,$periode,'mouse',1); ?></td></tr>
                                        <tr><td>Memory</td><td><?= get_maintenance_komp_periode_count($kd_lab,$periode,'memory',0); ?></td><td><?= get_maintenance_komp_periode_count($kd_lab,$periode,'memory',1); ?></td></tr>
                                        <tr><td>HDD</td><td><?= get_maintenance_komp_periode_count($kd_lab,$periode,'hdd',0); ?></td><td><?= get_maintenance_komp_periode_count($kd_lab,$periode,'hdd',1); ?></td></tr>
                                        <tr><td>Processor</td><td><?= get_maintenance_komp_periode_count($kd_lab,$periode,'processor',0); ?></td><td><?= get_maintenance_komp_periode_count($kd_lab,$periode,'processor',1); ?></td></tr>
                                        <tr><td>UPS</td><td><?= get_maintenance_komp_periode_count($kd_lab,$periode,'ups',0); ?></td><td><?= get_maintenance_komp_periode_count($kd_lab,$periode,'ups',1); ?></td></tr>
                                        </tbody>
                                    </table> 
                                    <a href="cetak-laporan-komputer.php?kd_lab=<?php echo $kd_lab ?>" class="btn btn-primary" type="button" style="margin-top: 20px;"><i class="fa fa-print"></i>&nbsp Cetak Pdf</a> 
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
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>

    <script>
           var ctx = document.getElementById("barChart");
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'bar',
        defaultFontFamily: 'Poppins',
        data: {
          labels: ["Monitor", "Keyboard", "Mouse", "Memory", "HDD", "Processor", "UPS"],
          datasets: [
            {
              label: "Rusak",
              data: 
              [
              <?= get_maintenance_komp_periode_count($kd_lab,$periode,'monitor',1); ?>,
              <?= get_maintenance_komp_periode_count($kd_lab,$periode,'keyboard',1); ?>,
              <?= get_maintenance_komp_periode_count($kd_lab,$periode,'mouse',1); ?>,
              <?= get_maintenance_komp_periode_count($kd_lab,$periode,'memory',1); ?>,
              <?= get_maintenance_komp_periode_count($kd_lab,$periode,'hdd',1); ?>,
              <?= get_maintenance_komp_periode_count($kd_lab,$periode,'processor',1); ?>,
              <?= get_maintenance_komp_periode_count($kd_lab,$periode,'ups',1); ?>
              ],
              borderColor: "rgba(0, 123, 255, 0.9)",
              borderWidth: "0",
              backgroundColor: "rgba(0, 123, 255, 0.5)",
              fontFamily: "Poppins"
            },
            {
              label: "Baik",
              data: 
              [
                  <?= get_maintenance_komp_periode_count($kd_lab,$periode,'monitor',0); ?>,
                  <?= get_maintenance_komp_periode_count($kd_lab,$periode,'keyboard',0); ?>,
                  <?= get_maintenance_komp_periode_count($kd_lab,$periode,'mouse',0); ?>,
                  <?= get_maintenance_komp_periode_count($kd_lab,$periode,'memory',0); ?>,
                  <?= get_maintenance_komp_periode_count($kd_lab,$periode,'hdd',0); ?>,
                  <?= get_maintenance_komp_periode_count($kd_lab,$periode,'processor',0); ?>,
                  <?= get_maintenance_komp_periode_count($kd_lab,$periode,'ups',0); ?>
              ],

              borderColor: "rgba(0,0,0,0.09)",
              borderWidth: "0",
              backgroundColor: "rgba(0,0,0,0.07)",
              fontFamily: "Poppins"
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scales: {
            xAxes: [{
              ticks: {
                fontFamily: "Poppins"

              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontFamily: "Poppins"
              }
            }]
          }
        }
      });
    }
    </script>


</body>

</html>
<!-- end document-->

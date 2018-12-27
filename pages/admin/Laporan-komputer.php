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
                                        <strong>Data Komputer <?php echo $data['nama_lab']; ?></strong>
                                        <?php  endforeach ?>
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
                                            <tr>
                                                <td>Monitor</td>
                                                <?php
                                                $lab = $data['kd_lab']; 
                                                $query = "SELECT monitor,
                                                        SUM(IF(monitor='baik',1, 0)) as baik,
                                                        SUM(IF(monitor='buruk',1, 0)) as buruk
                                                        from tabel_inventori_komputer where kd_lab='$lab' ";
                                                $hasil = mysqli_query($db, $query);
                                                $data = array();
                                                while ($row = mysqli_fetch_assoc($hasil)) {
                                                $data[] = $row;
                                                }
                                                ?>
                                                <?php foreach ($data as $total) :  ?>
                                                <td><center><?php echo $total['baik']; ?></center></td>
                                                <td><center><?php echo $total['buruk']; ?></center></td>
                                                <?php endforeach ?>
                                            </tr>

                                            <tr>
                                                <td>Keyboard</td>
                                                <?php
                                                $query = "SELECT keyboard,
                                                        SUM(IF(keyboard='baik',1, 0)) as baik,
                                                        SUM(IF(keyboard='buruk',1, 0)) as buruk
                                                        from tabel_inventori_komputer where kd_lab='$lab' ";
                                                $hasil = mysqli_query($db, $query);
                                                $data = array();
                                                while ($row = mysqli_fetch_assoc($hasil)) {
                                                $data[] = $row;
                                                }
                                               
                                                ?>
                                                <?php foreach ($data as $total) :  ?>
                                                <td><center><?php echo $total['baik']; ?></center></td>
                                                <td><center><?php echo $total['buruk']; ?></center></td>
                                                <?php endforeach ?>
                                            </tr>

                                            <tr>
                                                <td>Mouse</td>
                                               <?php
                                                $query = "SELECT mouse,
                                                        SUM(IF(mouse='baik',1, 0)) as baik,
                                                        SUM(IF(mouse='buruk',1, 0)) as buruk
                                                        from tabel_inventori_komputer where kd_lab='$lab' ";
                                                $hasil = mysqli_query($db, $query);
                                                $data = array();
                                                while ($row = mysqli_fetch_assoc($hasil)) {
                                                $data[] = $row;
                                                }
                                               
                                                ?>
                                                <?php foreach ($data as $total) :  ?>
                                                <td><center><?php echo $total['baik']; ?></center></td>
                                                <td><center><?php echo $total['buruk']; ?></center></td>
                                                <?php endforeach ?>
                                            </tr>

                                            <tr>
                                                <td>Memory</td>
                                                <?php
                                                $query = "SELECT memory,
                                                        SUM(IF(memory='baik',1, 0)) as baik,
                                                        SUM(IF(memory='buruk',1, 0)) as buruk
                                                        from tabel_inventori_komputer where kd_lab='$lab' ";
                                                $hasil = mysqli_query($db, $query);
                                                $data = array();
                                                while ($row = mysqli_fetch_assoc($hasil)) {
                                                $data[] = $row;
                                                }
                                               
                                                ?>
                                                <?php foreach ($data as $total) :  ?>
                                                <td><center><?php echo $total['baik']; ?></center></td>
                                                <td><center><?php echo $total['buruk']; ?></center></td>
                                                <?php endforeach ?>
                                            </tr>

                                            <tr>
                                                <td>HDD</td>
                                               <?php
                                                $query = "SELECT hdd,
                                                        SUM(IF(hdd='baik',1, 0)) as baik,
                                                        SUM(IF(hdd='buruk',1, 0)) as buruk
                                                        from tabel_inventori_komputer where kd_lab='$lab' ";
                                                $hasil = mysqli_query($db, $query);
                                                $data = array();
                                                while ($row = mysqli_fetch_assoc($hasil)) {
                                                $data[] = $row;
                                                }
                                               
                                                ?>
                                                <?php foreach ($data as $total) :  ?>
                                                <td><center><?php echo $total['baik']; ?></center></td>
                                                <td><center><?php echo $total['buruk']; ?></center></td>
                                                <?php endforeach ?>
                                            </tr>

                                             <tr>
                                                <td>Processor</td>
                                               <?php
                                                $query = "SELECT processor,
                                                        SUM(IF(processor='baik',1, 0)) as baik,
                                                        SUM(IF(processor='buruk',1, 0)) as buruk
                                                        from tabel_inventori_komputer where kd_lab='$lab' ";
                                                $hasil = mysqli_query($db, $query);
                                                $data = array();
                                                while ($row = mysqli_fetch_assoc($hasil)) {
                                                $data[] = $row;
                                                }
                                               
                                                ?>
                                                <?php foreach ($data as $total) :  ?>
                                                <td><center><?php echo $total['baik']; ?></center></td>
                                                <td><center><?php echo $total['buruk']; ?></center></td>
                                                <?php endforeach ?>
                                            </tr>

                                             <tr>
                                                <td>UPS</td>
                                                <?php
                                                $query = "SELECT ups,
                                                        SUM(IF(ups='baik',1, 0)) as baik,
                                                        SUM(IF(ups='buruk',1, 0)) as buruk
                                                        from tabel_inventori_komputer where kd_lab='$lab' ";
                                                $hasil = mysqli_query($db, $query);
                                                $data = array();
                                                while ($row = mysqli_fetch_assoc($hasil)) {
                                                $data[] = $row;
                                                }
                                               
                                                ?>
                                                <?php foreach ($data as $total) :  ?>
                                                <td><center><?php echo $total['baik']; ?></center></td>
                                                <td><center><?php echo $total['buruk']; ?></center></td>
                                                <?php endforeach ?>
                                            </tr>
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
              <?php
              $jumlah_monitor = mysqli_query($db,"select*from tabel_inventori_komputer where monitor='buruk' and kd_lab='$kd_lab' ");
              echo mysqli_num_rows($jumlah_monitor);
              ?>, 
              <?php
              $jumlah_keyboard = mysqli_query($db,"select *  from tabel_inventori_komputer where keyboard='buruk' and kd_lab='$kd_lab' ");
              echo mysqli_num_rows($jumlah_keyboard);
              ?>, 
              <?php
              $jumlah_mouse = mysqli_query($db,"select * from tabel_inventori_komputer where mouse='buruk' and kd_lab='$kd_lab' ");
              echo mysqli_num_rows($jumlah_mouse);
              ?>, 
              <?php
              $jumlah_memory = mysqli_query($db,"select * from tabel_inventori_komputer where memory='buruk' and kd_lab='$kd_lab' ");
              echo mysqli_num_rows($jumlah_memory);
              ?>, 
              <?php
              $jumlah_hdd = mysqli_query($db,"select * from tabel_inventori_komputer where hdd='buruk' and kd_lab='$kd_lab' ");
              echo mysqli_num_rows($jumlah_hdd);
              ?>,
              <?php
              $jumlah_processor = mysqli_query($db,"select * from tabel_inventori_komputer where processor='buruk' and kd_lab='$kd_lab' ");
              echo mysqli_num_rows($jumlah_processor);
              ?>, 
              <?php
              $jumlah_ups = mysqli_query($db,"select * from tabel_inventori_komputer where ups='buruk' and kd_lab='$kd_lab' ");
              echo mysqli_num_rows($jumlah_ups);
              ?>
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
              <?php
              $jumlah_monitor = mysqli_query($db,"select * from tabel_inventori_komputer where monitor='baik' and kd_lab='$kd_lab'");
              echo mysqli_num_rows($jumlah_monitor);
              ?>, 
              <?php
              $jumlah_keyboard = mysqli_query($db,"select * from tabel_inventori_komputer where keyboard='baik' and kd_lab='$kd_lab' ");
              echo mysqli_num_rows($jumlah_keyboard);
              ?>, 
              <?php
              $jumlah_mouse = mysqli_query($db,"select * from tabel_inventori_komputer where mouse='baik' and kd_lab='$kd_lab' ");
              echo mysqli_num_rows($jumlah_mouse);
              ?>, 
              <?php
              $jumlah_memory = mysqli_query($db,"select * from tabel_inventori_komputer where memory='baik' and kd_lab='$kd_lab' ");
              echo mysqli_num_rows($jumlah_memory);
              ?>, 
              <?php
              $jumlah_hdd = mysqli_query($db,"select * from tabel_inventori_komputer where hdd='baik' and kd_lab='$kd_lab' ");
              echo mysqli_num_rows($jumlah_hdd);
              ?>,
              <?php
              $jumlah_processor = mysqli_query($db,"select * from tabel_inventori_komputer where processor='baik' and kd_lab='$kd_lab' ");
              echo mysqli_num_rows($jumlah_processor);
              ?>, 
              <?php
              $jumlah_ups = mysqli_query($db,"select * from tabel_inventori_komputer where ups='baik' and kd_lab='$kd_lab' ");
              echo mysqli_num_rows($jumlah_ups);
              ?>
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

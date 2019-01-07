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

                                     <div class="col-lg-12">
                                        <div class="au-card m-b-30">
                                            <div class="au-card-inner">
                                             <h3 class="title-2 m-b-30">Bar chart</h3>
                                                <canvas id="barChart"></canvas>
                                             </div>
                                         </div>
                                     </div>

                                    <div class="card-body card-block"><table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Inventaris</th>
                                                <th>Baik</th>
                                                <th>Rusak</th>
                                            </tr>
                                        </thead>
                                         <?php
                                            $kd_lab = $data['kd_lab'];
                                            $query = "SELECT nama_inventori,
                                                        SUM(IF(kondisi='baik',1, 0)) as baik,
                                                        SUM(IF(kondisi='rusak',1, 0)) as rusak
                                                        from tabel_inventori_non_komputer where kd_lab='$kd_lab' group by nama_inventori";
                                            $hasil = mysqli_query($db, $query);
                                            $data = array();
                                            while ($row = mysqli_fetch_assoc($hasil)) {
                                            $data[] = $row;
                                            }
                                             ?>
                                            
                                        <tbody>
                                            <?php foreach ($data as $total) :  ?>
                                            <tr>
                                                <td><?php echo $total['nama_inventori'];?></td>
                                                <td><?php echo $total['baik']; ?></td>
                                                <td><?php echo $total['rusak']; ?></td>
                                            </tr>
                                        </tbody>
                                    <?php endforeach ?>
                                    </table> 
                                    <a href="cetak-laporan-non-komputer.php?kd_lab=<?php echo $kd_lab ?>" class="btn btn-primary" type="button" style="margin-top: 20px;"><i class="fa fa-print"></i>&nbsp Cetak Pdf</a> 
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

    <?php
      $query = "SELECT * from tabel_inventori_non_komputer where kd_lab='$kd_lab' group by nama_inventori";
      $hasil = mysqli_query($db, $query);        
      $rusak = mysqli_query($db,"select*from tabel_inventori_non_komputer where kondisi='rusak' and kd_lab='$kd_lab'");
      $baik = mysqli_query($db,"select*from tabel_inventori_non_komputer where kondisi='baik' and kd_lab='$kd_lab'");                        
    ?>

    <script>
           var ctx = document.getElementById("barChart");
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'bar',
        defaultFontFamily: 'Poppins',
        data: {
          labels: [<?php while ($nama=mysqli_fetch_array($hasil)){echo'"'.$nama['nama_inventori'].'",';}?>],
          datasets: [
            {
              label: "Rusak",
              data: 
              [<?php
                      mysqli_data_seek($hasil,0);
                      if($hasil){
                          while ($item = mysqli_fetch_assoc($hasil)){
                              $datarusak = mysqli_query($db,"select count(*) as jumlah from tabel_inventori_non_komputer where kondisi='rusak' and kd_lab='$kd_lab' and kd_inventori='{$item['kd_inventori']}'");
                              $data = mysqli_fetch_object($datarusak);
                              echo $data->jumlah . ',';
                          }
                      }
//                  echo mysqli_num_rows($rusak)
              ?>],
              borderColor: "rgba(0, 123, 255, 0.9)",
              borderWidth: "0",
              backgroundColor: "rgba(0, 123, 255, 0.5)",
              fontFamily: "Poppins"
            },
            {
              label: "Baik",
              data: 
              [<?php
                  mysqli_data_seek($hasil,0);
                  if($hasil){
                      while ($item = mysqli_fetch_assoc($hasil)){
                          $datarusak = mysqli_query($db,"select count(*) as jumlah from tabel_inventori_non_komputer where kondisi='baik' and kd_lab='$kd_lab' and kd_inventori='{$item['kd_inventori']}'");
                          $data = mysqli_fetch_object($datarusak);
                          echo $data->jumlah . ',';
                      }
                  }
//                  echo mysqli_num_rows($baik)
//
              ?>],

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

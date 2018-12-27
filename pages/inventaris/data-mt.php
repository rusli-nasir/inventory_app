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
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">

                                    <div class="card-header">
                                        <strong>Daftar Maintenance </strong>
                                    </div>

                                    <div class="card-body card-block">
                                    <div class="table-responsive m-b-40">
                                     <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="10">No</th>
                                                <th>ID Maintenance</th>
                                                <th>Nama Lab</th>
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
                                            $query = "
                                            SELECT * FROM tabel_maintenance  ";
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
                                                <?php 
                                                $kd_lab = $data['kd_lab'];
                                                $query=mysqli_query($db,"SELECT * from tabel_laboratorium where kd_lab= '$kd_lab'");
                                                $row = mysqli_fetch_assoc($query);
                                                ?>
                                                <td><?php echo $row['nama_lab']; ?></td>
                                                <td><?php echo $data['tanggal_lapor']; ?></td>
                                                <td><?php echo $data['jadwal_maintenance']; ?></td>
                                                <td><?php echo $data['keterangan']; ?></td>
                                                <td><?php echo $data['maintenance_selanjutnya']; ?></td>
                                                <td><?php echo $data['status']; ?></td>  
                                           </tr>
                                       <?php endforeach ?>
                                        </tbody>
                                    </table>  
                                </div>
                               
                            </div>
                        </div>

                         <div class="row"> &nbsp</div>
                        
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">

                                       <div class="card-header">
                                        <strong>Daftar Maintenance yang Belum dikerjakan</strong>
                                    </div>

                                    <div class="card-body card-block">
                                        <div class="table-responsive m-b-40">
                                     <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="10">No</th>
                                                <th>ID Maintenance</th>
                                                <th>Nama Lab</th>
                                                <th>Tanggal Lapor</th>
                                                <th>Jadwal MT</th>
                                                <th>Keterangan</th>
                                                <th>MT Selanjutnya</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                         <?php
                                            $no=0;
                                            include "../../config/koneksi.php";
                                            $query = "
                                            SELECT * FROM tabel_maintenance where status='Belum Dikerjakan'";
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
                                                <?php 
                                                $kd_lab = $data['kd_lab'];
                                                $query=mysqli_query($db,"SELECT * from tabel_laboratorium where kd_lab= '$kd_lab'");
                                                $row = mysqli_fetch_assoc($query);
                                                ?>
                                                <td><?php echo $row['nama_lab']; ?></td>
                                                <td><?php echo $data['tanggal_lapor']; ?></td>
                                                <td><?php echo $data['jadwal_maintenance']; ?></td>
                                                <td><?php echo $data['keterangan']; ?></td>
                                                <td><?php echo $data['maintenance_selanjutnya']; ?></td>
                                                <td><?php echo $data['status']; ?></td>
                                                <td>
                                                <center>
                                                <a href="ubah-maintenance.php?kd_maintenance=<?php echo $data['kd_maintenance'] ?>" class="btn btn-primary waves-effect" >
                                                <i class="fa fa-edit"></i>
                                                </a>
                                                </center>
                                                </td>   
                                           </tr>
                                       <?php endforeach ?>
                                        </tbody>
                                    </table>  
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
    </div>

<?php
 include"../partial/script.html";
 ?>


</body>

</html>
<!-- end document-->

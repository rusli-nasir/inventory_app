<?php
    include "../../config/koneksi.php";
    include "../../functions/query.php";
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
//                                        $query = "SELECT * from tabel_laboratorium where kd_lab ='$kd_lab'";
//                                        $hasil = mysqli_query($db, $query);
                                        $hasil = daftar_lab($kd_lab);
                                        $data_lab = array();
                                        while ($row = mysqli_fetch_assoc($hasil)) {
                                        $data_lab[] = $row;
                                        }
                                        ?>
                                         <?php foreach ($data_lab as $data) :  ?>
                                        <strong>Daftar Komponen Komputer Baru <?php echo $data['nama_lab']; ?></strong>
                                    <?php  endforeach ?>
                                    </div>


                                    <div class="card-body card-block">
                                        <div class="table-responsive m-b-40">
                                     <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="10">No</th>
                                                <th>Kode Komponen</th>
                                                <th>Kode Laboratorium</th>
                                                <th>ID User</th>
                                                <th>Nama Komponen</th>
                                                <th>Tahun</th>
                                                <th>Kondisi </th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                         <?php
                                            $no=0;
//                                            $query = "SELECT * FROM tabel_inventori_non_komputer where kd_lab ='$kd_lab'";
//                                            $hasil = mysqli_query($db, $query);
                                            $hasil = daftar_inv_komponen_komputer($kd_lab);
                                            $data_inv = array();
                                            while ($row = mysqli_fetch_assoc($hasil)) {
                                            $data_inv[] = $row;
                                            }
                                             ?>
                                        <tbody>
                                            <?php foreach ($data_inv as $data) :  ?>
                                            <tr>
                                                <td><?php $no++; echo "$no" ?></td>
                                                <td><?php echo $data['kd_komponen']; ?></td>
                                                <td><?php echo $data['kd_lab']; ?></td>
                                                <td><?php echo $data['id_user']; ?></td>
                                                <td><?php echo $data['nama_komponen']; ?></td>
                                                <td><?php echo $data['tahun']; ?></td>
                                                <td><?php echo $data['kondisi']; ?></td>
                                                <td><?php echo $data['keterangan']; ?></td>
                                                <td><?php echo $data['status']; ?></td>
                                                <td>
                                                <center>
                                                <a href="ubah-komponen-komputer.php?kd_komponen=<?php echo $data['kd_komponen'] ?>" class="btn btn-primary waves-effect" >
                                                <i class="fa fa-edit"></i>
                                                </a>
                                                </center>
                                                </td>   
                                           </tr>
                                       <?php endforeach ?>
                                        </tbody>
                                    </table>  
                                </div>
                                <a href="cetak-komponen-komputer.php?kd_lab=<?php echo $data['kd_lab'] ?>" class="btn btn-primary" type="button" style="margin-top: 20px;"><i class="fa fa-print"></i>&nbsp Cetak Pdf</a>
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

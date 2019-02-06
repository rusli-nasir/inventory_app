<?php
include_once "../../config/koneksi.php";
include_once "../../functions/query.php";
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
                                    <strong>Daftar Inventory Rusak Total Sudah Diganti</strong>
                                </div>

                                <div class="card-body card-block">
                                    <div class="table-responsive m-b-40">
                                        <table id="example" class="table table-striped table-bordered table-sm">
                                            <thead>
                                            <tr>
                                                <th width="10">No</th>
                                                <th>Kode Rusak Total</th>
                                                <th>Nama Lab</th>
                                                <th>Jenis Inventory</th>
                                                <th>Nama Inventory</th>
                                                <th>Penyebab</th>
                                                <th>Tanggal Lapor</th>
                                                <th>Status</th>
                                                <th>Tanggal Ganti</th>
                                                <th>Status Inventory</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            $no=0;
                                            $hasil = daftar_inv_rusak_total(null,'diganti');
                                            $data_mt = array();
                                            while ($row = mysqli_fetch_assoc($hasil)) {
                                                $data_mt[] = $row;
                                            }
                                            //                                            echo '<pre>';
                                            //                                            print_r($data_mt);
                                            //                                            echo '</pre>';
                                            ?>
                                            <tbody>
                                            <?php foreach ($data_mt as $data) :  ?>
                                                <tr>
                                                    <td><?php $no++; echo "$no" ?></td>
                                                    <td><?php echo $data['kd_rusak_total']; ?></td>
                                                    <td><?php echo $data['nama_lab']; ?></td>
                                                    <td><?php echo $data['nama_inventory']; ?></td>
                                                    <td><?php echo $data['jenis_inventory']; ?></td>
                                                    <td><?php echo $data['penyebab']; ?></td>
                                                    <td><?php echo $data['tanggal_lapor']; ?></td>
                                                    <td><?php echo $data['status']; ?></td>
                                                    <td><?php echo $data['tanggal_ganti']; ?></td>
                                                    <td><?php echo $data['status_inventoy']; ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="card">

                                        <div class="card-header">
                                            <strong>Daftar Inventory Rusak Total Belum Diganti</strong>
                                        </div>

                                        <div class="card-body card-block">
                                            <div class="table-responsive m-b-40">
                                                <table id="example" class="table table-striped table-bordered table-sm">
                                                    <thead>
                                                    <tr>
                                                        <th width="10">No</th>
                                                        <th>Kode Rusak Total</th>
                                                        <th>Nama Lab</th>
                                                        <th>Jenis Inventory</th>
                                                        <th>Nama Inventory</th>
                                                        <th>Penyebab</th>
                                                        <th>Tanggal Lapor</th>
                                                        <th>Status</th>
                                                        <th>Tanggal Ganti</th>
                                                        <th>Status Inventory</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    </thead>
                                                    <?php
                                                    $no=0;
                                                    $hasil = daftar_inv_rusak_total(null,'belum diganti');
                                                    $data_mt = array();
                                                    while ($row = mysqli_fetch_assoc($hasil)) {
                                                        $data_mt[] = $row;
                                                    }
                                                    //                                            echo '<pre>';
                                                    //                                            print_r($data_mt);
                                                    //                                            echo '</pre>';
                                                    ?>
                                                    <tbody>
                                                    <?php foreach ($data_mt as $data) :  ?>
                                                        <tr>
                                                            <td><?php $no++; echo "$no" ?></td>
                                                            <td><?php echo $data['kd_rusak_total']; ?></td>
                                                            <td><?php echo $data['nama_lab']; ?></td>
                                                            <td><?php echo $data['nama_inventory']; ?></td>
                                                            <td><?php echo $data['jenis_inventory']; ?></td>
                                                            <td><?php echo $data['penyebab']; ?></td>
                                                            <td><?php echo $data['tanggal_lapor']; ?></td>
                                                            <td><?php echo $data['status']; ?></td>
                                                            <td><?php echo $data['tanggal_ganti']; ?></td>
                                                            <td><?php echo $data['status_inventoy']; ?></td>
                                                            <td>
                                                                <center>
                                                                    <div class="btn-group btn-group-sm">
                                                                        <a href="ubah-inv_rusak_total.php?kd_rusak_total=<?php echo $data['kd_rusak_total'] ?>" class="btn btn-sm " >
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                        <a href="cetak-inv_rusak_total.php?kd_rusak_total=<?php echo $data['kd_rusak_total'] ?>" target="_blank" class="btn btn-sm" >
                                                                            <i class="fa fa-print"></i>
                                                                        </a>
                                                                    </div>

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

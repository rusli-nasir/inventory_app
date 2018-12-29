<?php
include "../../config/koneksi.php";
include "../../functions/query.php";
include "validasi.php";
$id = $_SESSION['id_user'];
// mencari kode user dengan nilai paling besar
//$query = "SELECT max(kd_inventori) as maxKode FROM tabel_inventori_non_komputer";
//$hasil = mysqli_query($db,$query);
//$data = mysqli_fetch_array($hasil);
//$kom = $data['maxKode'];
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// setelah substring bilangan diambil lantas dicasting menjadi integer
//$noUrut = (int) substr($kom, 6, 9);
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
//$noUrut++;
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
//$char = "NONKOM";
//$kdKom = $char . sprintf("%03s", $noUrut);

$cetakKode = auto_number($kd_lab,'tabel_inventori_non_komputer','kd_inventori',3) ;
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
                                    <strong>Tambah Data Non Komputer</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="insert_non_komputer.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="kd_inventori" class=" form-control-label">Kode Inventori</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="kd_inventori" class="form-control" value="<?php echo $cetakKode; ?>" readonly="readonly">

                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Kode Laboratorium</label>
                                            </div>

                                            <?php
                                            include('../../config/koneksi.php');
                                            $query = "SELECT * FROM tabel_laboratorium";
                                            $hasil = mysqli_query($db, $query);
                                            $data_lab = array();
                                            while ($row = mysqli_fetch_assoc($hasil)) {
                                                $data_lab[] = $row;
                                            }
                                            ?>
                                            <div class="col-12 col-md-9">
                                                <select name="kd_lab" class="form-control-sm form-control" disabled>
                                                    <option value="0">Please select</option>
                                                    <?php foreach ($data_lab as $data) : ?>
                                                        <option value="<?php echo $data['kd_lab'] ?>" <?= ($kd_lab == $data['kd_lab'])?'selected':null ?> >
                                                            <?php echo $data['kd_lab'] ?> | <?php echo $data['nama_lab'] ?> </option>
                                                    <?php endforeach ?>
                                                </select>
                                                <?php
                                                if($kd_lab == $data['kd_lab']){
                                                    ?>
                                                    <input type="hidden" name="kd_lab" value="<?= $kd_lab?>">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">ID User</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="id_user" class="form-control" readonly="readonly" value="<?php echo $id ?>">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Nama Inventori</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="nama_inventori" class="form-control">

                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Tahun</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="tahun" class="form-control">

                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="password-input" class=" form-control-label">Kondisi</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="kondisi" class="form-control-sm form-control">
                                                    <option value="baik">Baik</option>
                                                    <option value="rusak">Rusak</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Keterangan</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="keterangan" class="form-control">

                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="password-input" class=" form-control-label">Status</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="status" class="form-control-sm form-control">
                                                    <option value="Dapat dipakai">Dapat dipakai</option>
                                                    <option value="Tidak dapat dipakai">Tidak dapat dipakai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="button-submit">
                                            <input type="submit" class="btn btn-primary btn-sm" value="SIMPAN" />
                                            <input type="reset" class="btn btn-danger btn-sm" value="BATAL" />
                                        </div>
                                    </form>
                                </div>
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

<?php
include"../partial/script.html";
?>

</body>

</html>
<!-- end document-->

<?php
 include "validasi.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php include "../partial/head.html"?>

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
                                        <form action="edit_non_komputer.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <?php
                                            include('../../config/koneksi.php');
                                            $kd_inventori = $_GET['kd_inventori'];
                                            $query = "SELECT * FROM tabel_inventori_non_komputer WHERE kd_inventori = '$kd_inventori'";
                                            $hasil = mysqli_query($db, $query);
                                            $data_kom = array();
                                            while ($row = mysqli_fetch_assoc($hasil)) {
                                            $data_kom[] = $row;
                                            }?>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Kode Inventori</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="kd_inventori" class="form-control"  value="<?php echo $data_kom[0]['kd_inventori'] ?>">
                                                    
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
                                                    <select name="kd_lab" class="form-control-sm form-control">
                                                       <option value="<?php echo $data_kom[0]['kd_lab'] ?>" selected><?php echo $data_kom[0]['kd_lab'] ?></option>
                                                      <option>----------------------</option>
                                                      <?php foreach ($data_lab as $data) : ?>
                                                      <option value="<?php echo $data['kd_lab'] ?>">
                                                      <?php echo $data['kd_lab'] ?> | <?php echo $data['nama_lab'] ?> </option>
                                                      <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">ID User</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <input type="text" name="id_user" class="form-control" value="<?php echo $data_kom[0]['id_user'] ?>" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Nama Inventori</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="nama_inventori" class="form-control"  value="<?php echo $data_kom[0]['nama_inventori'] ?>">
                                                   
                                                </div>
                                            </div>

                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Tahun</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="tahun" class="form-control"  value="<?php echo $data_kom[0]['tahun'] ?>">
                                                   
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Kondisi</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <select name="kondisi" class="form-control-sm form-control">
                                                   <option value="<?php echo $data_kom[0]['kondisi'] ?>"><?php echo $data_kom[0]['kondisi'] ?></option>
                                                   <option>----------------------</option>
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
                                                    <input type="text" name="keterangan" class="form-control"  value="<?php echo $data_kom[0]['keterangan'] ?>">
                                                   
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <select name="status" class="form-control-sm form-control">
                                                    <option value="<?php echo $data_kom[0]['status'] ?>"><?php echo $data_kom[0]['status'] ?></option>
                                                    <option>----------------------</option>
                                                   <option value="Dapat dipakai">Dapat dipakai</option>
                                                   <option value="Tidak dapat dipakai">Tidak dapat dipakai</option>
                                                   </select>
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

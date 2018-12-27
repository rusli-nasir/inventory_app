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
                                        <strong>Ubah Data Laboratorium</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="edit_laboratorium.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <?php
                                            include('../../config/koneksi.php');
                                            $kd_lab = $_GET['kd_lab'];
                                            $query = "SELECT * FROM tabel_laboratorium WHERE kd_lab = '$kd_lab'";
                                            $hasil = mysqli_query($db, $query);
                                            $data_lab = array();
                                            while ($row = mysqli_fetch_assoc($hasil)) {
                                            $data_lab[] = $row;
                                            }?>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Kode Laboratorium</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="kd_lab" class="form-control" value="<?php echo $data_lab[0]['kd_lab'] ?>" readonly="readonly">
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">ID User</label>
                                                </div>

                                                    <?php
                                                    include('../../config/koneksi.php');
                                                    $query = "SELECT * FROM tabel_admin";
                                                    $hasil = mysqli_query($db, $query);
                                                    $data_user = array();
                                                    while ($row = mysqli_fetch_assoc($hasil)) {
                                                    $data_user[] = $row;
                                                     }
                                                    ?>
                                                <div class="col-12 col-md-9">
                                                    <select name="id_user" class="form-control-sm form-control">
                                                     <option value="<?php echo $data_lab[0]['id_user'] ?>" selected><?php echo $data_lab[0]['id_user'] ?></option>
                                                     <option>----------------------</option>
                                                      <?php foreach ($data_user as $data) : ?>
                                                      <option value="<?php echo $data['id_user'] ?>">
                                                      <?php echo $data['id_user'] ?> | <?php echo $data['username'] ?> </option>
                                                      <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Nama Laboratorium</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <input type="text" name="nama_lab" class="form-control" value="<?php echo $data_lab[0]['nama_lab'] ?>">
                                                   
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <select class="form-control-sm form-control" name="status">
                                                   <option value="<?php echo $data_lab[0]['status'] ?>"><?php echo $data_lab[0]['status'] ?></option>
                                                   <option>----------------------</option>
                                                   <option value="Digunakan">Digunakan</option>
                                                   <option value="Tidak Digunakan">Tidak Digunakan</option>
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="button-submit">
                                                <input type="submit" class="btn btn-primary btn-sm" value="SIMPAN"></input>
                                                <button type="reset" class="btn btn-danger btn-sm" onclick="window.location.href='data-lab.php'">Batal</button>
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

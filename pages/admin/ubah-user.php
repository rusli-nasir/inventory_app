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
                                        <strong>Tambah Data User</strong>
                                    </div>
                                    <?php
                                    include('../../config/koneksi.php');
                                    $id_user = $_GET['id_user'];
                                    $query = "SELECT * FROM tabel_admin WHERE id_user = '$id_user'";
                                    $hasil = mysqli_query($db, $query);
                                    $data_user = array();
                                    while ($row = mysqli_fetch_assoc($hasil)) {
                                    $data_user[] = $row;
                                    }?>
                                    <div class="card-body card-block">
                                        <form action="edit_user.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">ID User</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input  class="form-control" name="id_user" 
                                                    required type="text" value="<?php echo $data_user[0]['id_user'] ?>" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nama</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input  class="form-control" name="nama" 
                                                    required type="text" value="<?php echo $data_user[0]['nama'] ?>">
                                                </div>
                                            </div>
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Username</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input  class="form-control" name="username" 
                                                    required type="text" value="<?php echo $data_user[0]['username'] ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input  class="form-control" name="password" 
                                                    required type="text" value="<?php echo $data_user[0]['password'] ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input  class="form-control" name="email" 
                                                    required type="email" value="<?php echo $data_user[0]['email'] ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">No. Telp</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input  class="form-control" name="no_hp" 
                                                    required type="text" value="<?php echo $data_user[0]['no_hp'] ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectSm" class=" form-control-label">Level</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="level" class="form-control-sm form-control">
                                                        <option value="<?php echo $data_user[0]['level'] ?>"><?php echo $data_user[0]['level'] ?></option>
                                                        <option>----------------------</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="operator">Operator</option>
                                                        <option value="inventaris">Inventaris</option>
                                                        <option value="Top level">Top Level</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectSm" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="status" class="form-control-sm form-control">
                                                        <option value="<?php echo $data_user[0]['status'] ?>"><?php echo $data_user[0]['status'] ?></option>
                                                        <option>----------------------</option>
                                                        <option value="aktif">Aktif</option>
                                                        <option value="tidak aktif">Tidak Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="button-submit">
                                                <input type="submit" class="btn btn-primary btn-sm" value="SIMPAN"></input>
                                                <button type="reset" class="btn btn-danger btn-sm" onclick="window.location.href='data-user.php'">Batal</button>
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

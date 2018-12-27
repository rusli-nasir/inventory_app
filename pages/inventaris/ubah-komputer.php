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
                                        <strong>Ubah Data Inventori</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="edit_komputer.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <?php
                                            include('../../config/koneksi.php');
                                            $kd_komputer = $_GET['kd_komputer'];
                                            $query = "SELECT * FROM tabel_inventori_komputer WHERE kd_komputer = '$kd_komputer'";
                                            $hasil = mysqli_query($db, $query);
                                            $data_kom = array();
                                            while ($row = mysqli_fetch_assoc($hasil)) {
                                            $data_kom[] = $row;
                                            }?>
                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Kode Komputer</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="kd_komputer" class="form-control" value="<?php echo $data_kom[0]['kd_komputer'] ?>" readonly="readonly">
                                                    
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Keyboard</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <select name="keyboard" class="form-control-sm form-control">
                                                        <option value="<?php echo $data_kom[0]['keyboard'] ?>"><?php echo $data_kom[0]['keyboard'] ?></option>
                                                        <option>----------------------</option>
                                                        <option value="baik">Baik</option>
                                                        <option value="buruk">Buruk</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Kode Laboratorium</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                     <?php
                                                    include('../../config/koneksi.php');
                                                    $query = "SELECT * FROM tabel_laboratorium";
                                                    $hasil = mysqli_query($db, $query);
                                                    $data_lab = array();
                                                    while ($row = mysqli_fetch_assoc($hasil)) {
                                                    $data_lab[] = $row;
                                                     }
                                                    ?>
                                                   <select name="kd_lab" class="form-control-sm form-control">
                                                       <option value="<?php echo $data_kom[0]['kd_lab'] ?>" selected><?php echo $data_kom[0]['kd_lab'] ?></option>
                                                      <option>----------------------</option>
                                                      <?php foreach ($data_lab as $data) : ?>
                                                      <option value="<?php echo $data['kd_lab'] ?>">
                                                      <?php echo $data['kd_lab'] ?> | <?php echo $data['nama_lab'] ?> </option>
                                                      <?php endforeach ?>
                                                    </select>
                                                    
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Mouse</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <select name="mouse" class="form-control-sm form-control">
                                                        <option value="<?php echo $data_kom[0]['mouse'] ?>"><?php echo $data_kom[0]['mouse'] ?></option>
                                                        <option>----------------------</option>
                                                        <option value="baik">Baik</option>
                                                        <option value="buruk">Buruk</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">ID User</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                     <?php
                                                    include('../../config/koneksi.php');
                                                    $query = "SELECT * FROM tabel_admin";
                                                    $hasil = mysqli_query($db, $query);
                                                    $data_user = array();
                                                    while ($row = mysqli_fetch_assoc($hasil)) {
                                                    $data_user[] = $row;
                                                     }
                                                    ?>
                                                   <select name="id_user" class="form-control-sm form-control">
                                                      <option value="<?php echo $data_kom[0]['id_user'] ?>" selected><?php echo $data_kom[0]['id_user'] ?></option>
                                                      <option>----------------------</option>
                                                      <?php foreach ($data_user as $data) : ?>
                                                      <option value="<?php echo $data['id_user'] ?>">
                                                      <?php echo $data['id_user'] ?> | <?php echo $data['nama'] ?> </option>
                                                      <?php endforeach ?>
                                                    </select>
                                                    
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Memory</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                   <select name="memory" class="form-control-sm form-control">
                                                        <option value="<?php echo $data_kom[0]['memory'] ?>"><?php echo $data_kom[0]['memory'] ?></option>
                                                        <option>----------------------</option>
                                                        <option value="baik">Baik</option>
                                                        <option value="buruk">Buruk</option>
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Nama Komputer</label>
                                                </div>
                                               <div class="col-12 col-md-4">
                                                   <input type="text" name="nama_komputer" class="form-control" value="<?php echo $data_kom[0]['nama_komputer'] ?>">
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">HDD</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                   <select name="hdd" class="form-control-sm form-control">
                                                        <option value="<?php echo $data_kom[0]['hdd'] ?>"><?php echo $data_kom[0]['hdd'] ?></option>
                                                        <option>----------------------</option>
                                                        <option value="baik">Baik</option>
                                                        <option value="buruk">Buruk</option>
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Tahun</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="tahun" class="form-control" value="<?php echo $data_kom[0]['tahun'] ?>">
                                                    
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Processor</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <select name="processor" class="form-control-sm form-control">
                                                        <option value="<?php echo $data_kom[0]['processor'] ?>"><?php echo $data_kom[0]['processor'] ?></option>
                                                        <option>----------------------</option>
                                                        <option value="baik">Baik</option>
                                                        <option value="buruk">Buruk</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>

                                             <div class="row form-group">

                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">UPS</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <select name="ups" class="form-control-sm form-control">
                                                        <option value="<?php echo $data_kom[0]['ups'] ?>"><?php echo $data_kom[0]['ups'] ?></option>
                                                        <option>----------------------</option>
                                                        <option value="baik">Baik</option>
                                                        <option value="buruk">Buruk</option>
                                                    </select>
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Komponen Lainnya</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="komponen_lain" class="form-control" value="<?php echo $data_kom[0]['komponen_lain'] ?>">
                                                    
                                                </div>
                                            </div>

                                            
                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">OS Komputer</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="os_komputer" class="form-control" value="<?php echo $data_kom[0]['os_komputer'] ?>">
                                                    
                                                </div>
                                                 <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Keterangan Komputer</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="keterangan_komputer" class="form-control" value="<?php echo $data_kom[0]['keterangan_komputer'] ?>">
                                                    
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Monitor</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <select name="monitor" class="form-control-sm form-control">
                                                        <option value="<?php echo $data_kom[0]['monitor'] ?>"><?php echo $data_kom[0]['monitor'] ?></option>
                                                        <option>----------------------</option>
                                                        <option value="baik">Baik</option>
                                                        <option value="buruk">Buruk</option>
                                                    </select>
                                                    
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <select name="status" class="form-control-sm form-control">
                                                        <option value="<?php echo $data_kom[0]['status'] ?>"><?php echo $data_kom[0]['status'] ?></option>
                                                        <option>----------------------</option>
                                                        <option value="Dapat Dipakai">Dapat Dipakai</option>
                                                        <option value="Tidak Dapat Dipakai">Tidak Dapat Dipakai</option>
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

<?php
include "../../config/koneksi.php";
include "validasi.php";
// mencari kode user dengan nilai paling besar
$query = "SELECT max(kd_lab) as maxKode FROM tabel_laboratorium";
$hasil = mysqli_query($db,$query);
$data = mysqli_fetch_array($hasil);
$lab = $data['maxKode'];
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($lab, 6, 9);
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "LABKOM";
$kdLab = $char . sprintf("%03s", $noUrut);
$cetakKode = $kdLab  ;
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
                                        <strong>Tambah Data Laboratorium</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_lab.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Kode Laboratorium</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="kd_lab" class="form-control" value="<?php echo $cetakKode; ?>" readonly="readonly">
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">ID User</label>
                                                </div>

                                                    <?php
                                                    $query = "SELECT * FROM tabel_admin";
                                                    $hasil = mysqli_query($db, $query);
                                                    $data_user = array();
                                                    while ($row = mysqli_fetch_assoc($hasil)) {
                                                    $data_user[] = $row;
                                                     }
                                                    ?>
                                                <div class="col-12 col-md-9">
                                                    <select name="id_user" class="form-control-sm form-control">
                                                      <option value="0">Please select</option>
                                                      <?php foreach ($data_user as $data) : ?>
                                                      <option value="<?php echo $data['id_user'] ?>">
                                                      <?php echo $data['id_user'] ?> | <?php echo $data['username'] ?> (<?php echo $data['level'] ?>)</option>
                                                      <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Nama Laboratorium</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="nama_lab" class="form-control" required>
                                                   
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <select name="status" class="form-control-sm form-control" required>
                                                   <option value="digunakan">Digunakan</option>
                                                   <option value="tidak digunakan">Tidak digunakan</option>
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

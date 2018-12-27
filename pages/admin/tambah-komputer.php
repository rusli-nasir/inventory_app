<?php
include "../../config/koneksi.php";
include "validasi.php";
$id = $_SESSION['id_user'];
// mencari kode user dengan nilai paling besar
$query = "SELECT max(kd_komputer) as maxKode FROM tabel_inventori_komputer";
$hasil = mysqli_query($db,$query);
$data = mysqli_fetch_array($hasil);
$kom = $data['maxKode'];
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kom, 6, 9);
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "KOMLAB";
$kdKom = $char . sprintf("%03s", $noUrut);
$cetakKode = $kdKom  ;
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
                                        <strong>Tambah Data Inventori</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_komputer.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Kode Komputer</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="kd_komputer" class="form-control" value="<?php echo $cetakKode; ?>" readonly="readonly">
                                                    
                                                </div>
                                                 <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Mouse</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <select name="mouse" class="form-control-sm form-control" required>
                                                        <option value="">Please select</option>
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
                                                   <select name="kd_lab" class="form-control-sm form-control" required>
                                                      <option value="0">Please select</option>
                                                      <?php foreach ($data_lab as $data) : ?>
                                                      <option value="<?php echo $data['kd_lab'] ?>">
                                                      <?php echo $data['kd_lab'] ?> | <?php echo $data['nama_lab'] ?> </option>
                                                      <?php endforeach ?>
                                                    </select>
                                                    
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Memory</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <select name="memory" class="form-control-sm form-control" required>
                                                        <option value="">Please select</option>
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
                                                    <input type="text" name="id_user" class="form-control" readonly="readonly" value="<?php echo $id ?>">
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">HDD</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                   <select name="hdd" class="form-control-sm form-control" required>
                                                        <option value="">Please select</option>
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
                                                   <input type="text" name="nama_komputer" class="form-control" required>
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Processor</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                   <select name="processor" class="form-control-sm form-control" required>
                                                        <option value="">Please select</option>
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
                                                    <input type="text" name="tahun" class="form-control" required>
                                                    
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">UPS</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <select name="ups" class="form-control-sm form-control" required>
                                                        <option value="">Please select</option>
                                                        <option value="baik">Baik</option>
                                                        <option value="buruk">Buruk</option>
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="row form-group">
                                                 <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">OS Komputer</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="os_komputer" class="form-control" required>
                                                    
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Komponen Lainnya</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="komponen_lain" class="form-control" required>
                                                    
                                                </div>
                                            </div>

                                            
                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Monitor</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                   <select name="monitor" class="form-control-sm form-control" required>
                                                        <option value="">Please select</option>
                                                        <option value="baik">Baik</option>
                                                        <option value="buruk">Buruk</option>
                                                    </select>
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Keterangan Komputer</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="keterangan_komputer" class="form-control" required>
                                                    
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Keyboard</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <select name="keyboard" class="form-control-sm form-control" required>
                                                        <option value="">Please select</option>
                                                        <option value="baik">Baik</option>
                                                        <option value="buruk">Buruk</option>
                                                    </select>
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="text-input" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <select name="status" class="form-control-sm form-control" required>
                                                        <option value="0">Please select</option>
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

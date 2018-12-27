<?php
include "../../config/koneksi.php";
include "validasi.php";
// mencari kode user dengan nilai paling besar
$query = "SELECT max(id_user) as maxKode FROM tabel_admin";
$hasil = mysqli_query($db,$query);
$data = mysqli_fetch_array($hasil);
$id = $data['maxKode'];
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($id, 3, 6);
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "PGW";
$idUser = $char . sprintf("%03s", $noUrut);
$cetakKode = $idUser  ;


function acakangkahuruf($panjang)
{
    $karakter  = '123456789';
    $karakter .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
    }
    return $string;
}
$password = acakangkahuruf(8);

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
                                    <div class="card-body card-block">
                                        <form action="insert_user.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">ID User</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="id" class="form-control" value="<?php echo $cetakKode; ?>" readonly="readonly">
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Nama</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text"  name="nama" class="form-control" required>
                                                   
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Username</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="username" class="form-control" required>
                                                   
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="password"  class="form-control" required value="<?php echo $password ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" name="email"  class="form-control" required>
                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">No.Telp</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="no_telp"  class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectSm" class=" form-control-label">Level</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="level" class="form-control-sm form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="operator">Operator</option>
                                                        <option value="inventaris">Inventaris</option>
                                                        <option value="top-level">Top Level</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectSm" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="status" id="SelectLm" class="form-control-sm form-control" required>
                                                        <option value="">Please select</option>
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

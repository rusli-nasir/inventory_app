<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 2/2/2019
 * Time: 2:59 AM
 */
include("../../config/koneksi.php");
session_start();
if($_SESSION){
    if($_SESSION['level']=="admin")
    {
        header("Location: ../admin/index.php");
    }
    if($_SESSION['level']=="operator")
    {
        header("Location: ../operator/index.php");
    }
    if($_SESSION['level']=="inventaris")
    {
        header("Location: ../inventaris/index.php");
    }
    if($_SESSION['level']=="top_level")
    {
        header("Location: ../top_level/index.php");
    }
}
$error = '';
if(isset($_POST['submit'])){
    $username = isset($_POST['username'])?$_POST['username']:null;
    $password = isset($_POST['password'])?$_POST['password']:null;
    $confirm_password = isset($_POST['confirm_password'])?$_POST['confirm_password']:null;

    if($password && $confirm_password && ($password === $confirm_password)){
        if(!mysqli_query($db, "UPDATE tabel_admin SET password = '{$password}' WHERE username='{$username}' AND status = 'aktif'")){
            $error = '<div class="alert alert-danger"><center>Perbaharui password gagal. User tidak tersedia atau dalam posisi tidak aktif</center></div>';
        }else{
            header('Location: ../login');
        }
    }else{
        $error = '<div class="alert alert-danger"><center>Pasword yang di inputkan tidak sama</center></div>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>Ubah Password</title>

    <!-- Fontfaces CSS-->
    <link href="../../assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstassets/rap CSS-->
    <link href="../../assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <h3>Ubah Password</h3>
                        </a>
                    </div>
                    <div class="login-form">
                        <form action="" method="post">
                            <?php echo $error;?>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                    <input type="password" id="password" name="password" placeholder="Password Baru" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password" class="form-control">
                                </div>
                            </div>
                            <input class="au-btn au-btn--block au-btn--green m-b-20"  name="submit" value="Ubah Password" type="submit"/>
                            <a class="btn btn-warning btn-block" href="index.php">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>

</html>
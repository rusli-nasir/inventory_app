<?php
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
include('proses_login.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>Login</title>

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
                                <h3>Sistem Informasi Inventori Laboratorium Komputer SMP Negeri 5 Mengwi</h3>
                                <br>
                                <img src="../../assets/images/s200_smpn_5.png" width="150" height="150">
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
                                                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                                </div>
                                            </div>
                              
                                <input class="au-btn au-btn--block au-btn--green m-b-20"  name="submit" value="LOGIN" type="submit"></input>
                                  
                            </form>
                            <p class="text-right"><a href="lost-password.php">Lupa password anda?</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
<!-- end document-->
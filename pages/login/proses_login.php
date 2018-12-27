<?php

$error=''; 

include("../../config/koneksi.php");
if(isset($_POST['submit']))
{               
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    
                    
    //$query = mysqli_query($db, "SELECT * FROM tabel_admin WHERE username='$username' AND password='$password'");
    $query = mysqli_query($db, "SELECT * FROM tabel_admin WHERE username='$username'");
    if(mysqli_num_rows($query) == 0)
    {
        $error = '<div class="alert alert-danger"><center>Login gagal.</center></div>';
    }
    else
    {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['id_user']=$row['id_user'];
        $_SESSION['username']=$row['username'];
        $_SESSION['level'] = $row['level'];

        if($row['status'] == "aktif")
        {
            if($row['level'] == "admin"){
            header("Location: ../admin/index.php");
            }
            else if($row['level'] =="operator"){
            header("Location: ../operator/index.php");
            }
            else if($row['level'] == "inventaris"){
            header("Location: ../inventaris/index.php");
            }
            else if($row['level'] == "top-level"){
            header("Location: ../top-level/index.php");
            }
            else{
            $error = '<div class="alert alert-danger"><center>Login gagal.</center></div>';
            }
        }
        else{
            $error = '<div class="alert alert-danger"><center>Akun sudah tidak aktif</center></div>';
        }

    }
}           
?>
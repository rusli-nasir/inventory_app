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
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Daftar User</strong>
                                    </div>
                                    
                                <div class="card-body card-block">
                                    <div class="table-responsive m-b-40">
                                     	<table id="example" class="table table-striped table-bordered">
                                       		<thead>
                                                	<tr>
                                                <th width="10">No</th>
                                                <th>ID User</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>No.Telp</th>
                                                <th>Level</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            		</tr>
                                       		</thead>
                                        		<?php
                                           		$no=0;
                                            	include "../../config/koneksi.php";
                                            	$query = "SELECT * FROM tabel_admin ";
                                            	$hasil = mysqli_query($db, $query);
                                            	$data_user = array();
                                            	while ($row = mysqli_fetch_assoc($hasil)) {
                                            	$data_user[] = $row;
                                            	}
                                             	?>
                                        		<tbody>
                                            <?php foreach ($data_user as $data) :  ?>
                                            <tr>
                                                <td><?php $no++; echo "$no" ?></td>
                                                <td><?php echo $data['id_user']; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['username']; ?></td>
                                                <td><?php echo $data['no_hp']; ?></td>
                                                <td><?php echo $data['level']; ?></td>
                                                <td><?php echo $data['status']; ?></td>
                                                <td>
                                                <center>
                                                <a href="ubah-user.php?id_user=<?php echo $data['id_user'] ?>" class="btn btn-primary waves-effect" >
                                                <i class="fa fa-edit"></i>
                                                </a>
                                                </center>
                                                </td>   
                                           </tr>
                                       			<?php endforeach ?>
                                        		</tbody>
                                   		</table>  
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
    </div>

<?php
 include"../partial/script.html";
 ?>

</body>

</html>
<!-- end document-->

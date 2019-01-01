<?php
    include "../../config/koneksi.php";
   
    $query="select * from tabel_inventori_komputer where kd_lab='".$_POST["kd_lab"]."'";
    $q=mysqli_query($db,$query);
    while($data=mysqli_fetch_array($q)){
   
    ?>
        <option value="<?php echo $data["kd_komputer"] ?>"><?php echo $data["nama_komputer"] ?></option><br>
   
    <?php
    }
    ?>
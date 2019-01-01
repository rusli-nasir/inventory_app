<?php
    include "../../config/koneksi.php";
   
    $query="select * from tabel_inventori_non_komputer where kd_lab='".$_POST["kd_lab"]."'";
    $q=mysqli_query($db,$query);
    while($data=mysqli_fetch_array($q)){
   
    ?>
        <option value="<?php echo $data["kd_inventori"] ?>"><?php echo $data["nama_inventori"] ?></option><br>
   
    <?php
    }
    ?>
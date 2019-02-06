<?php
    include "../../config/koneksi.php";
    echo "<option value=\"\">Please select</option>";
    switch ($_POST["jenis_inventory"]){
        case 'KOM':

            $query="select * from tabel_inventori_komputer where kd_lab='".$_POST["kd_lab"]."'";
            $q=mysqli_query($db,$query);
            while($data=mysqli_fetch_array($q)){

                ?>
                <option value="<?php echo $data["kd_komputer"] ?>"><?php echo $data["nama_komputer"] ?></option>

                <?php
            }
            break;
        case 'NONKOM':
            $query="select * from tabel_inventori_non_komputer where kd_lab='".$_POST["kd_lab"]."'";
            $q=mysqli_query($db,$query);
            while($data=mysqli_fetch_array($q)){

                ?>
                <option value="<?php echo $data["kd_inventori"] ?>"><?php echo $data["nama_inventori"] ?></option>

                <?php
            }
            break;

    }
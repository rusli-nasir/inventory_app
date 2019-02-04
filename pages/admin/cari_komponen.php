<?php
    include "../../config/koneksi.php";
    include "../../functions/query.php";
    $kd_maintenance = isset($_POST['kd_maintenance'])? $_POST['kd_maintenance']:null;
    $daftarPerangkat = get_componen_computer_kondisi($_POST["kd_komputer"],$kd_maintenance);

    if($daftarPerangkat){
        while ($row = $daftarPerangkat->fetch_assoc()){
            ?>
            <tr>
                <td><input type="checkbox" class="cek_komponen" name="daftarKomponen[cek][]" value="1"></td>
                <td><?= $row['nama_komponen']?></td>
                <td>
                    <select name="daftarKomponen[status][]" class="form-control-sm form-control prop-komponen">
                        <option value="">Please select</option>
                        <option <?= $row['status'] === 'baik'? 'selected':null?> value="baik">Baik</option>
                        <option <?= $row['status'] === 'buruk'? 'selected':null?> value="buruk">Buruk</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="daftarKomponen[keterangan][]" class="form-control prop-komponen" value="<?= $row['keterangan']?>">
                    <input type="hidden" name="daftarKomponen[kd_komponen][]" class="form-control prop-komponen" value="<?= $row['kd_komponen']?>">
                </td>
            </tr>
            <?php
        }
    }
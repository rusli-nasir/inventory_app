<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 12/28/2018
 * Time: 6:29 AM
 */

//if(file_exists('../config/koneksi.php')){
//    require_once '../config/koneksi.php';
//}

/**
 * Tanggal Indonesia
 * function tanggal_indo($tanggal)
 *
 **/
if (!function_exists('tanggal_indo')) {
    function tanggal_indo($tanggal)
    {
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
}

/**
 * query
 * function query($qry)
 *
 **/
if (!function_exists('query')) {
    function query($qry)
    {
        /** @var mysqli $db */
        global $db;
        return mysqli_query($db,$qry);
    }
}

/**
 * Daftar Laboratorium
 * function daftar_lab($kode_lab)
 *
 **/
if (!function_exists('daftar_lab')) {
    function daftar_lab($kode_lab = null)
    {
        $query = 'SELECT * from tabel_laboratorium 
          LEFT JOIN tabel_admin ON tabel_laboratorium.id_user = tabel_admin.id_user';

        if($kode_lab){
            $query = "SELECT * from tabel_laboratorium 
          LEFT JOIN tabel_admin ON tabel_laboratorium.id_user = tabel_admin.id_user 
          where kd_lab ='{$kode_lab}'";
        }

        return query($query);
    }
}

/**
 * Daftar Invntory Komputer
 * function daftar_inv_komputer($kode_lab)
 *
 **/
if (!function_exists('daftar_inv_komputer')) {
    function daftar_inv_komputer($kode_lab)
    {
        $query = "SELECT * FROM tabel_inventori_komputer where kd_lab ='{$kode_lab}'";
        return query($query);
    }
}

/**
 * Daftar Inventory Non Komputer
 * function daftar_inv_non_komputer($kode_lab)
 *
 **/
if (!function_exists('daftar_inv_non_komputer')) {
    function daftar_inv_non_komputer($kode_lab)
    {
        $query = "SELECT * FROM tabel_inventori_non_komputer where kd_lab ='{$kode_lab}'";
        return query($query);
    }
}

/**
 * Daftar Komponen Komputer
 * function daftar_inv_komponen_komputer($kode_lab)
 *
 **/
if (!function_exists('daftar_inv_komponen_komputer')) {
    function daftar_inv_komponen_komputer($kode_lab)
    {
        $query = "SELECT * FROM tabel_inventori_komponen where kd_lab ='{$kode_lab}'";
        return query($query);
    }
}

/**
 * Daftar Inventory Rusak Total
 * function daftar_inv_rusak_total($kode_lab = null)
 *
 **/
if (!function_exists('daftar_inv_rusak_total')) {
    function daftar_inv_rusak_total($kode_lab = null,$status_inventoy = null)
    {
        $query = "SELECT A.kd_rusak_total, A.jenis_inventory, A.kd_inventori, A.kd_komputer, A.kd_lab, A.id_user,
            A.tanggal_lapor, A.tanggal_ganti, A.`status`, A.penyebab, A.status_inventoy,
            CASE A.jenis_inventory
                WHEN 'KOM' THEN B.nama_komputer
                WHEN 'NONKOM' THEN C.nama_inventori
                ELSE NULL 
            END AS nama_inventory,
            L.nama_lab
            FROM
            tabel_inventory_rusak_total AS A
            LEFT JOIN tabel_inventori_komputer AS B ON A.kd_komputer = B.kd_komputer
            LEFT JOIN tabel_inventori_non_komputer AS C ON A.kd_inventori = C.kd_inventori
            LEFT JOIN tabel_laboratorium AS L ON A.kd_lab = L.kd_lab 
            WHERE 1";
        if($status_inventoy){
            $query .= " AND A.status_inventoy = '{$status_inventoy}'";
        }
        if($kode_lab){
            $query .= " AND A.kd_lab = '{$kode_lab}'";
        }

        return query($query);
    }
}

/**
 * Get Komponen Komputer
 * function get_componen_computer($id_komputer)
 *
 **/
if (!function_exists('get_componen_computer')) {
    function get_componen_computer($kd_komputer = null)
    {
        if($kd_komputer){
            $query = "SELECT A.kd_komponen, A.nama_komponen, B.kd_komputer, B.`status`
            FROM tabel_inventori_komponen AS A
            LEFT OUTER JOIN (SELECT * FROM table_komponen_komputer WHERE kd_komputer = '{$kd_komputer}') AS B 
            ON B.kd_komponen = A.kd_komponen
            ";
        }else{
            $query = "SELECT A.kd_komponen, A.nama_komponen FROM tabel_inventori_komponen AS A";
        }

        return query($query);
    }
}

/**
 * Get Komponen Komputer Kondisi
 * function get_componen_computer_kondisi($id_komputer)
 *
 **/
if (!function_exists('get_componen_computer_kondisi')) {
    function get_componen_computer_kondisi($kd_komputer, $kd_maintenance = null, $kondisi = 'baik')
    {
        if($kd_maintenance){
            $query = "SELECT A.kd_komponen, A.nama_komponen, C.kd_komputer, B.`status`,B.keterangan 
            FROM table_komponen_maintenance AS B
            INNER JOIN tabel_maintenance AS C ON B.kd_maintenance = C.kd_maintenance
            INNER JOIN tabel_inventori_komponen AS A ON B.kd_komponen = A.kd_komponen
            WHERE C.kd_komputer = '{$kd_komputer}' AND B.`status` = '{$kondisi}'
            ";
        }else{
            $query = "SELECT A.kd_komponen, A.nama_komponen, B.kd_komputer, B.`status`, '-' as keterangan
            FROM table_komponen_komputer AS B
            INNER JOIN tabel_inventori_komponen AS A ON B.kd_komponen = A.kd_komponen
            WHERE B.kd_komputer = '{$kd_komputer}' AND B.`status` = '{$kondisi}'
            ";
        }


        return query($query);
    }
}



/**
 * Auto Number
 * function auto_number($prefix,$table,$key,$digit = 3)
 *
 **/
if (!function_exists('auto_number')) {
    /**
     * @param string $prefix
     * @param string $table
     * @param string $key
     * @param int $digit
     * @return string
     */
    function auto_number($prefix, $table, $key, $digit = 3)
    {
        $query = "SELECT max({$key}) as maxKode FROM {$table} WHERE {$key} LIKE '%{$prefix}%'";
        $result = query($query);
        $noUrut = 1;
        if($result){
            $data = mysqli_fetch_array($result);
            $kom = $data['maxKode'];
            $noUrut = (int) substr($kom, strlen($prefix), $digit);
            $noUrut++;
        }
        return $prefix . sprintf("%0{$digit}s", $noUrut);
    }
}

/**
 * Get MaintenanceKomputerPeriode
 * function get_maintenance_komp_periode($periode,$perangkat)
 *
 **/
if (!function_exists('get_maintenance_komp_periode_count')) {
    function get_maintenance_komp_periode_count($lab, $periode,$perangkat,$rusak = 1){
        $query = "SELECT COUNT(*) as counter FROM tabel_maintenance WHERE DATE_FORMAT(tanggal_lapor,'%Y-%m') = '{$periode}' AND {$perangkat} = {$rusak} AND kd_lab = '{$lab}'";
        $result = query($query);
        if($result){
            $data = mysqli_fetch_array($result);
            return $data['counter'];
        }
        return 0;
    }
}

/**
 * Update Komponen
 * function update_komponen_komputer($data)
 * 
 **/
if (!function_exists('update_komponen_komputer')) {
    /**
     * @param array $data
     */
    function update_komponen_komputer($data){

        /** @var mysqli $mysqli */
        global $mysqli;
        if($data){
            $mysqli->begin_transaction();

            $stmt = $mysqli->prepare("INSERT INTO table_komponen_komputer (kd_komponen,kd_komputer,`status`)
            VALUES (?,?,?) ON DUPLICATE KEY UPDATE `status` = VALUES(`status`)
        ");

            $stmt->bind_param('sss',$kd_komponen,$kd_komputer,$status);
            foreach ( $data as $item) {
                extract($item,EXTR_OVERWRITE);

                try{
                    if(!$stmt->execute())
                    {
                        print_r($mysqli->error);
                        // rollback if prep stat execution fails
                        $mysqli->rollback();
                        // exit or throw an exception
                        exit();
                    }
                }catch (mysqli_sql_exception $exception){
                    echo '<pre>';
                    print_r($exception->getMessage());
                    echo '<br>';
                    print_r($exception->getTrace());
                    echo '</pre>';
                    $mysqli->rollback();
                    exit();
                }
            }
            $stmt->close();
            $mysqli->commit();
        }

    }
}

/**
 * Update maintenance komputer komponen
 * function update_komponen_maintenance_komputer($data)
 *
 **/
if (!function_exists('update_komponen_maintenance_komputer')) {
    function update_komponen_maintenance_komputer($data){
        /** @var mysqli $mysqli */
        global $mysqli;
        if($data){
            $mysqli->begin_transaction();

            $stmt = $mysqli->prepare("INSERT INTO table_komponen_maintenance (kd_komponen,kd_maintenance,`status`,keterangan)
            VALUES (?,?,?,?) ON DUPLICATE KEY 
            UPDATE 
            `status` = VALUES(`status`),
            `keterangan` = VALUES(`keterangan`)
        ");

            $stmt->bind_param('ssss',$kd_komponen,$kd_maintenance,$status, $keterangan);
            foreach ( $data as $item) {
                extract($item,EXTR_OVERWRITE);

                try{
                    if(!$stmt->execute())
                    {
                        print_r($mysqli->error);
                        // rollback if prep stat execution fails
                        $mysqli->rollback();
                        // exit or throw an exception
                        exit();
                    }
                }catch (mysqli_sql_exception $exception){
                    echo '<pre>';
                    print_r($exception->getMessage());
                    echo '<br>';
                    print_r($exception->getTrace());
                    echo '</pre>';
                    $mysqli->rollback();
                    exit();
                }
            }
            $stmt->close();
            $mysqli->commit();
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 12/28/2018
 * Time: 6:29 AM
 */

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
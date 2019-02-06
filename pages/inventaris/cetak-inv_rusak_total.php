<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 2/6/2019
 * Time: 12:51 AM
 */
include_once '../../config/koneksi.php';
include_once '../../functions/query.php';

$kd_rusak_total = $_GET['kd_rusak_total'];
if($kd_rusak_total){
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
            WHERE A.kd_rusak_total = '$kd_rusak_total'";
    $getQuery = $mysqli->query($query);
    if($getQuery){
        $data = $getQuery->fetch_assoc();
    }else{
        die();
    }
}else{
    die();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Inventori Laboratoriun Rusak Total</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }
            .table-header{
                padding-left: 20px;
                padding-right: 20px;
            }
            .content{
                padding-left: 40px;
                padding-right: 40px;
            }
        }

        .table-header{
            padding: 10px 20px 0 20px;
        }
        .h1-header{
            font-size: 14pt;
            text-align: center;
        }
        hr.thick {
            border: 1px solid black;
            margin: 10px 30px 30px 30px;
        }

        .perangkat {
            border-collapse: collapse;
            /*margin-top: 1em;*/
            margin: 0 auto;
        }
        .perangkat, .perangkat th, .perangkat td {
            border: 1px solid grey;
        }

        .perangkat th, .perangkat td {
            padding: 0.5em;
        }
        .perangkat th {
            background: hsl(0, 0%, 92%);
        }
        .sign{
            width: 40%;
            float: right;
            text-align: center;
        }
    </style>
</head>
<body>
<table width="100%" class="table-header">
    <tr>
        <td width="25" align="center"><img src='../../assets/images/LOGO_KAB_BADUNG.png' width="100%"></td>
        <td width="50" align="center">
            <h1 class="h1-header">PEMERINTAH KABUPATEN BADUNG<BR>DINAS PENDIDIKAN KEPEMUDAAN DAN OLAH RAGA<BR>SMP NEGERI 5 MENGWI</h1>
            <p>
                Alamat: Jalan Kantor Lurah Sading, Mengwi-Badung<br>
                Telp: (0361) 9007377, E-mail: smpn5.mengwi@gmail.com<br>
            </p>
        </td>
        <td width="25" align="center"><img src='../../assets/images/s200_smpn_5.png' width="100%"></td>
    </tr>
</table>
<hr class="thick">
<div class="content">
    <h1 class="h1-header">
        LAPORAN INVENTORI LABORATORIUM RUSAK TOTAL<BR>
        SMP NEGERI 5 MENGWI<BR>
    </h1>
    <br>
    <table style="width: 600px">
        <tr>
            <td width="80px">Hal</td>
            <td>: Pengaduan Inventori Rusak Total</td>
        </tr>
        <tr>
            <td width="100px">Lamp</td>
            <td>: -</td>
        </tr>
    </table>
    <br>
    <p>Dengan hormat,&nbsp;</p>
    <p>Dengan ini, menerangkan bahwa pada tanggal (<?= tanggal_indo($data['tanggal_lapor'])?>) telah terjadi kerusakan total pada inventori <?= $data['nama_lab']?> yaitu <?= $data['nama_inventory']?>. Adapun rincian kerusakan inventori ialah sebagai berikut:</p>
    <table class="perangkat">
        <thead>
        <tr>
            <th>Kode Kerusakan</th>
            <th>Kode Lab</th>
            <th>Nama Inventori</th>
            <th>Penyebab</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $data['kd_rusak_total']?></td>
                <td><?= $data['kd_lab']?></td>
                <td><?= $data['nama_inventory']?></td>
                <td><?= $data['penyebab']?></td>
            </tr>
        </tbody>
    </table>
    <p>Akibat hal tersebut, inventori yang rusak perlu diganti. Terimakasih</p>

    <div class="sign">
        <p>Sading, <?= tanggal_indo($data['tanggal_lapor'])?></p>
        <p>Kepala Sekolah SMP Negeri 5 Mengwi</p>
        <br>
        <br>
        <br>
        <br>
        <p style="text-decoration: underline">Drs. I Ketut Karya</p>
        <p>NIP: 195912311985031299</p>
    </div>
</div>
<script>
    print();
    window.close();
</script>
</body>
</html>

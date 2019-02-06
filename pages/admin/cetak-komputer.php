<?php
require_once("../../assets/fpdf/fpdf.php");
require_once("../../config/koneksi.php");
require_once("../../functions/query.php");

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('../../assets/images/LOGO KAB BADUNG.png',10,10,30);
         $this->Image('../../assets/images/s200_smpn_5.png',305,10,30);

        // Arial bold 15
        $this->SetFont('Times','B',15);
        // Move to the right
        // $this->Cell(60);
        // Title
        $this->Cell(0,8,'PEMERINTAH KABUPATEN BADUNG',0,1,'C');
        $this->Cell(0,8,'DINAS PENDIDIKAN KEPEMUDAAAN DAN OLAH RAGA SMP NEGERI 5 MENGWI',0,1,'C');
        $this->Cell(0,8,'SMP NEGERI 5 MENGWI',0,1,'C');

        $this->SetFont('Times','I',15);
        $this->Cell(0,8,'Alamat : Jalan Kantor Lurah sading , Mengwi-Badung',0,1,'C');
        $this->Cell(0,8,'Telp : (0361) 9007377 , Email : smpn5.mengwi@gmail.com',0,1,'C');
       
        // Line break
        $this->Ln(5);

        $this->SetFont('Times','B',12);
        for ($i=0; $i < 10; $i++) {
            $this->Cell(0,0,'',1,1,'C');
        }
        
        $this->Ln(5);
        $this->Cell(0,8,'LAPORAN INVENTORI KOMPUTER ',0,1,'C');          
        $this->Cell(0,8,'SMP NEGERI 5 MENGWI',0,1,'C');
        $this->Ln(5);


        $this->SetFont('Times','B',8);

        // header tabel
        $this->cell(8,8,'NO.',1,0,'C');
        $this->cell(20,8,'Komputer',1,0,'C');
        $this->cell(15,8,'Tahun',1,0,'C');
        $this->cell(30,8,'OS Komputer',1,0,'C');
        $daftarKOmponen = get_componen_computer();
        foreach ($daftarKOmponen as $item){
            $this->cell(23,8,$item['nama_komponen']?:'-',1,0,'C');
        }
//        $this->cell(20,8,'Monitor',1,0,'C');
//        $this->cell(20,8,'Keyboard',1,0,'C');
//        $this->cell(20,8,'Mouse',1,0,'C');
//        $this->cell(20,8,'Memory',1,0,'C');
//        $this->cell(20,8,'HDD',1,0,'C');
//        $this->cell(20,8,'Processor',1,0,'C');
//        $this->cell(20,8,'UPS',1,0,'C');
//        $this->cell(30,8,'Komponen Lain',1,0,'C');
        $this->cell(25,8,'Keterangan',1,0,'C');
        $this->cell(25,8,'Status',1,1,'C');


    }

}

// ambil dari database
$kd_lab = $_GET['kd_lab'];
$query = "SELECT * from tabel_inventori_komputer where kd_lab='$kd_lab'";
$hasil = mysqli_query($db, $query);
$data_mt = array();
while ($row = mysqli_fetch_assoc($hasil)) {
  $data_mt[] = $row;
}


$pdf = new PDF('L', 'mm', [297, 350]);
$pdf->AliasNbPages();
$pdf->AddPage();

// set font
$pdf->SetFont('Times','',7);

// set penomoran
$nomor = 1;

foreach ($data_mt as $data) {
    $pdf->cell(8, 7, $nomor++ . '.', 1, 0, 'C');
    $pdf->cell(20, 7, strtoupper($data['nama_komputer']), 1, 0, 'C');
    $pdf->cell(15, 7, strtoupper($data['tahun']), 1, 0, 'C');
    $pdf->cell(30, 7, strtoupper($data['os_komputer']), 1, 0, 'C');
    $daftarKOmponen = get_componen_computer($data['kd_komputer']);
    foreach ($daftarKOmponen as $item){
        $pdf->cell(23, 7, $item['status']?:'tidak tersedia', 1, 0, 'C');
    }
//    $pdf->cell(20, 7, strtoupper($data['monitor']), 1, 0, 'C');
//    $pdf->cell(20, 7, strtoupper($data['keyboard']), 1, 0, 'C');
//    $pdf->cell(20, 7, strtoupper($data['mouse']), 1, 0, 'C');
//    $pdf->cell(20, 7, strtoupper($data['memory']), 1, 0, 'C');
//    $pdf->cell(20, 7, strtoupper($data['hdd']), 1, 0, 'C');
//    $pdf->cell(20, 7, strtoupper($data['processor']), 1, 0, 'C');
//    $pdf->cell(20, 7, strtoupper($data['ups']), 1, 0, 'C');
//    $pdf->cell(30, 7, strtoupper($data['komponen_lain']), 1, 0, 'C');
    $pdf->cell(25, 7, strtoupper($data['keterangan_komputer']), 1, 0, 'L');
    $pdf->cell(25, 7, strtoupper($data['status']), 1, 1, 'C');
   
}

    $pdf->Ln(10);

$pdf->Output('Cetak Laporan Maintenance','I');
?>

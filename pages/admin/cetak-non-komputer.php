<?php
require_once("../../assets/fpdf/fpdf.php");
require_once("../../config/koneksi.php");

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('../../assets/images/LOGO KAB BADUNG.png',10,8,30);
         $this->Image('../../assets/images/s200_smpn_5.png',170,8,30);

        // Arial bold 15
        $this->SetFont('Times','B',12);
        // Move to the right
        // $this->Cell(60);
        // Title
        $this->Cell(188,8,'PEMERINTAH KABUPATEN BADUNG',0,1,'C');
        $this->Cell(188,8,'DINAS PENDIDIKAN KEPEMUDAAAN DAN OLAH RAGA ',0,1,'C');
        $this->Cell(188,8,'SMP NEGERI 5 MENGWI',0,1,'C');

        $this->SetFont('Times','I',12);
        $this->Cell(0,8,'Alamat : Jalan Kantor Lurah sading , Mengwi-Badung',0,1,'C');
        $this->Cell(0,8,'Telp : (0361) 9007377 , Email : smpn5.mengwi@gmail.com',0,1,'C');
       
        // Line break
        $this->Ln(5);

        $this->SetFont('Times','B',10);
        for ($i=0; $i < 10; $i++) {
            $this->Cell(190,0,'',1,1,'C');
        }

        $this->Ln(5);
        $this->Cell(188,8,'LAPORAN NON INVENTORI KOMPUTER LABORATORIUM',0,1,'C');
        $this->Cell(188,8,'SMP NEGERI 5 MENGWI',0,1,'C');
        $this->Ln(5);


       $this->SetFont('Times','B',9.5);

        // header tabel
       
        $this->cell(8,8,'No',1,0,'C');
        $this->cell(25,8,'Laboratorium',1,0,'C');
        $this->cell(20,8,'User',1,0,'C');
        $this->cell(35,8,'Nama Inventori',1,0,'C');
        $this->cell(20,8,'Tahun',1,0,'C');
        $this->cell(20,8,'Kondisi',1,0,'C');
        $this->cell(20,8,'Keterangan',1,0,'C');
        $this->cell(43,8,'Status',1,1,'C');



    }

}
// ambil dari database
$kd_lab = $_GET['kd_lab'];
$query = "SELECT * from tabel_inventori_non_komputer where kd_lab='$kd_lab'";
$hasil = mysqli_query($db, $query);
$data_mt = array();
while ($row = mysqli_fetch_assoc($hasil)) {
  $data_mt[] = $row;
}


$pdf = new PDF('P', 'mm', [210, 297]);
$pdf->AliasNbPages();
$pdf->AddPage();

// set font
$pdf->SetFont('Times','',9);

// set penomoran
$nomor = 1;

foreach ($data_mt as $data) {
    $pdf->cell(8, 7, $nomor++ . '.', 1, 0, 'C');
    $pdf->cell(25, 7, strtoupper($data['kd_lab']), 1, 0, 'C');
    $pdf->cell(20, 7, strtoupper($data['id_user']), 1, 0, 'C');
    $pdf->cell(35, 7, strtoupper($data['nama_inventori']), 1, 0, 'C');
    $pdf->cell(20, 7, strtoupper($data['tahun']), 1, 0, 'C');
    $pdf->cell(20, 7, strtoupper($data['kondisi']), 1, 0, 'C');
    $pdf->cell(20, 7, strtoupper($data['keterangan']), 1, 0, 'C');
    $pdf->cell(43, 7, strtoupper($data['status']), 1, 1, 'L');   
}

    $pdf->Ln(10);

$pdf->Output('Cetak Laporan Maintenance','I');
?>
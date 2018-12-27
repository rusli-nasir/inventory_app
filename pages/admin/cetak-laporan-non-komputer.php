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
        $this->Cell(188,8,'Alamat : Jalan Kantor Lurah sading , Mengwi-Badung',0,1,'C');
        $this->Cell(188,8,'Telp : (0361) 9007377 , Email : smpn5.mengwi@gmail.com',0,1,'C');
       
        // Line break
        $this->Ln(5);

        $this->SetFont('Times','B',10);
        for ($i=0; $i < 10; $i++) {
            $this->Cell(190,0,'',1,1,'C');
        }

        $this->Ln(5);
        $this->Cell(188,8,'LAPORAN NON INVENTORI KOMPUTER LABORATORIUM KOMPUTER ',0,1,'C');
        $this->Cell(188,8,'SMP NEGERI 5 MENGWI',0,1,'C');
        $this->Ln(5);


       $this->SetFont('Times','B',9.5);

        // header tabel
       
        $this->cell(90,8,'Inventaris',1,0,'C');
        $this->cell(50,8,'Baik',1,0,'C');
        $this->cell(50,8,'Rusak',1,1,'C');


    }

    // Page footer
    function Footer()
    {
        $this->SetY(-60);
        $this->SetX(150);
        $this->Cell(15,8,'Sading,',0,0,'L');
        $this->Cell(10,8,date('d-m-Y'),0,1,'L');   
        $this->Cell(315,8,'Kepala Sekolah SMP 5 Negeri Mengwi',0,1,'C');
        $this->Ln(20);
        $this->SetFont('Arial','U',8);
        $this->Cell(315,2,'Drs. I Ketut Karya ',0,1,'C');
        $this->SetFont('Arial','B',8);
        $this->Cell(315,8,'NIP : 195912311985031299',0,1,'C');
        $this->SetY(-11);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
$kd_lab = $_GET['kd_lab']; 
$query = "SELECT nama_inventori,
SUM(IF(kondisi='baik',1, 0)) as baik,
SUM(IF(kondisi='rusak',1, 0)) as rusak
from tabel_inventori_non_komputer where kd_lab= '$kd_lab'";
$hasil = mysqli_query($db, $query);
$data = array();
while ($row = mysqli_fetch_assoc($hasil)) {
$data[] = $row;
}


$pdf = new PDF('P', 'mm', [210, 297]);
$pdf->AliasNbPages();
$pdf->AddPage();

// set font
$pdf->SetFont('Times','',9);

// set penomoran
$nomor = 1;

foreach ($data as $total) {
    $pdf->cell(90, 7, $total['nama_inventori'], 1, 0, 'C');
    $pdf->cell(50, 7, $total['baik'], 1, 0, 'C');
    $pdf->cell(50, 7, $total['rusak'], 1, 1, 'C');
}
    $pdf->Ln(5);

$pdf->Output('Cetak Inventaris Non Komputer','I');
?>

<?php
require_once("../../assets/fpdf/fpdf.php");
require_once("../../config/koneksi.php");
$kd_lab = $_GET['kd_lab']; 

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
        $this->Cell(188,8,'LAPORAN MAINTENANCE LABORATORIUM KOMPUTER',0,1,'C');
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


$pdf = new PDF('P', 'mm', [210, 297]);
$pdf->AliasNbPages();
$pdf->AddPage();

// set font
$pdf->SetFont('Times','',12);

// set penomoran
$nomor = 1;
    
    $pdf->cell(90,7,'Monitor',1,0,'L');
    $jumlah_monitor = mysqli_query($db,"select * from tabel_inventori_komputer where monitor='baik' and kd_lab='$kd_lab'");
    $jumlah = mysqli_num_rows($jumlah_monitor);
    $pdf->cell(50,7,$jumlah,1,0,'C');

    $jumlah_monitor = mysqli_query($db,"select * from tabel_inventori_komputer where monitor='buruk' and kd_lab='$kd_lab'");
    $jumlah = mysqli_num_rows($jumlah_monitor);
    $pdf->cell(50, 7, $jumlah, 1, 1, 'C');

    $pdf->cell(90,7,'Keyboard',1,0,'L');
    $jumlah_monitor = mysqli_query($db,"select * from tabel_inventori_komputer where keyboard='baik' and kd_lab='$kd_lab'");
    $jumlah = mysqli_num_rows($jumlah_monitor);
    $pdf->cell(50,7,$jumlah,1,0,'C');

    $jumlah_monitor = mysqli_query($db,"select * from tabel_inventori_komputer where keyboard='buruk' and kd_lab='$kd_lab'");
    $jumlah = mysqli_num_rows($jumlah_monitor);
    $pdf->cell(50, 7, $jumlah, 1, 1, 'C');

    $pdf->cell(90,7,'Mouse',1,0,'L');
    $jumlah_monitor = mysqli_query($db,"select * from tabel_inventori_komputer where mouse='baik' and kd_lab='$kd_lab'");
    $jumlah = mysqli_num_rows($jumlah_monitor);
    $pdf->cell(50,7,$jumlah,1,0,'C');

    $jumlah_monitor = mysqli_query($db,"select * from tabel_inventori_komputer where mouse='buruk' and kd_lab='$kd_lab'");
    $jumlah = mysqli_num_rows($jumlah_monitor);
    $pdf->cell(50, 7, $jumlah, 1, 1, 'C');

    $pdf->cell(90,7,'Memory',1,0,'L');
    $jumlah_monitor = mysqli_query($db,"select * from tabel_inventori_komputer where memory='baik' and kd_lab='$kd_lab'");
    $jumlah = mysqli_num_rows($jumlah_monitor);
    $pdf->cell(50,7,$jumlah,1,0,'C');

    $jumlah_monitor = mysqli_query($db,"select * from tabel_inventori_komputer where memory='buruk' and kd_lab='$kd_lab'");
    $jumlah = mysqli_num_rows($jumlah_monitor);
    $pdf->cell(50, 7, $jumlah, 1, 1, 'C');

    $pdf->cell(90,7,'HDD',1,0,'L');
    $jumlah_monitor = mysqli_query($db,"select * from tabel_inventori_komputer where hdd='baik' and kd_lab='$kd_lab'");
    $jumlah = mysqli_num_rows($jumlah_monitor);
    $pdf->cell(50,7,$jumlah,1,0,'C');

    $jumlah_monitor = mysqli_query($db,"select * from tabel_inventori_komputer where hdd='buruk' and kd_lab='$kd_lab'");
    $jumlah = mysqli_num_rows($jumlah_monitor);
    $pdf->cell(50, 7, $jumlah, 1, 1, 'C');

    $pdf->cell(90,7,'Processor',1,0,'L');
    $jumlah_monitor = mysqli_query($db,"select * from tabel_inventori_komputer where processor='baik' and kd_lab='$kd_lab'");
    $jumlah = mysqli_num_rows($jumlah_monitor);
    $pdf->cell(50,7,$jumlah,1,0,'C');

    $jumlah_monitor = mysqli_query($db,"select * from tabel_inventori_komputer where processor='buruk' and kd_lab='$kd_lab'");
    $jumlah = mysqli_num_rows($jumlah_monitor);
    $pdf->cell(50, 7, $jumlah, 1, 1, 'C');

    $pdf->cell(90,7,'UPS',1,0,'L');
    $jumlah_monitor = mysqli_query($db,"select * from tabel_inventori_komputer where ups='baik' and kd_lab='$kd_lab'");
    $jumlah = mysqli_num_rows($jumlah_monitor);
    $pdf->cell(50,7,$jumlah,1,0,'C');

    $jumlah_monitor = mysqli_query($db,"select * from tabel_inventori_komputer where ups='buruk' and kd_lab='$kd_lab'");
    $jumlah = mysqli_num_rows($jumlah_monitor);
    $pdf->cell(50, 7, $jumlah, 1, 1, 'C');

   
    $pdf->Ln(5);

$pdf->Output('Cetak Inventaris Komputer','I');
?>

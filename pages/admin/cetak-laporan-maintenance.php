<?php
require_once("../../assets/fpdf/fpdf.php");
require_once("../../config/koneksi.php");

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('../../assets/images/LOGO KAB BADUNG.png',10,10,30);
         $this->Image('../../assets/images/s200_smpn_5.png',287,10,30);

        // Arial bold 15
        $this->SetFont('Times','B',15);
        // Move to the right
        // $this->Cell(60);
        // Title
        $this->Cell(308,8,'PEMERINTAH KABUPATEN BADUNG',0,1,'C');
        $this->Cell(308,8,'DINAS PENDIDIKAN KEPEMUDAAAN DAN OLAH RAGA SMP NEGERI 5 MENGWI',0,1,'C');
        $this->Cell(308,8,'SMP NEGERI 5 MENGWI',0,1,'C');

        $this->SetFont('Times','I',15);
        $this->Cell(308,8,'Alamat : Jalan Kantor Lurah sading , Mengwi-Badung',0,1,'C');
        $this->Cell(308,8,'Telp : (0361) 9007377 , Email : smpn5.mengwi@gmail.com',0,1,'C');
       
        // Line break
        $this->Ln(5);

        $this->SetFont('Times','B',12);
        for ($i=0; $i < 10; $i++) {
            $this->Cell(308,0,'',1,1,'C');
        }
        
        $this->Ln(5);
        $this->Cell(310,8,'LAPORAN MAINTENANCE LABORATORIUM KOMPUTER ',0,1,'C');          
        $this->Cell(310,8,'SMP NEGERI 5 MENGWI',0,1,'C');
        $this->Ln(5);


        $this->SetFont('Times','B',9.5);

        // header tabel
        $this->cell(8,8,'NO.',1,0,'C');
        $this->cell(30,8,'Kode Maintenance',1,0,'C');
        $this->cell(30,8,'Kode Inventori',1,0,'C');
        $this->cell(30,8,'Kode Komputer',1,0,'C');
        $this->cell(30,8,'Kode Laboratorium',1,0,'C');
        $this->cell(30,8,'Tanggal Lapor',1,0,'C');
        $this->cell(35,8,'Jadwal Maintenance',1,0,'C');
        $this->cell(45,8,'Maintenance Selanjutnya',1,0,'C');
        $this->cell(30,8,'Keterangan',1,0,'C');
        $this->cell(40,8,'Status',1,1,'C');


    }

    // Page footer
    function Footer()
    {

        
        $this->SetY(-60);
        $this->SetX(270);
        $this->Cell(10,8,'Sading,',0,0,'L');
        $this->Cell(10,8,date('d-m-Y'),0,1,'L');   
        $this->Cell(550,8,'Kepala Sekolah SMP 5 Negeri Mengwi',0,1,'C');
        $this->Ln(20);
        $this->SetFont('Arial','U',8);
        $this->Cell(550,2,'Drs. I Ketut Karya ',0,1,'C');
        $this->SetFont('Arial','B',8);
        $this->Cell(550,8,'NIP : 195912311985031299',0,1,'C');
        $this->SetY(-11);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// ambil dari database
$kd_lab = $_GET['kd_lab'];
$query = "SELECT * from tabel_maintenance where kd_lab='$kd_lab'";
$hasil = mysqli_query($db, $query);
$data_mt = array();
while ($row = mysqli_fetch_assoc($hasil)) {
  $data_mt[] = $row;
}


$pdf = new PDF('L', 'mm', [210, 330]);
$pdf->AliasNbPages();
$pdf->AddPage();

// set font
$pdf->SetFont('Times','',9);

// set penomoran
$nomor = 1;

foreach ($data_mt as $data) {
    $pdf->cell(8, 7, $nomor++ . '.', 1, 0, 'C');
    $pdf->cell(30, 7, strtoupper($data['kd_maintenance']), 1, 0, 'C');
    $pdf->cell(30, 7, strtoupper($data['kd_inventori']), 1, 0, 'C');
    $pdf->cell(30, 7, strtoupper($data['kd_komputer']), 1, 0, 'C');
    $pdf->cell(30, 7, strtoupper($data['kd_lab']), 1, 0, 'C');
    $pdf->cell(30, 7, strtoupper($data['tanggal_lapor']), 1, 0, 'C');
    $pdf->cell(35, 7, strtoupper($data['jadwal_maintenance']), 1, 0, 'C');
    $pdf->cell(45, 7, strtoupper($data['maintenance_selanjutnya']), 1, 0, 'C');
    $pdf->cell(30, 7, strtoupper($data['keterangan']), 1, 0, 'C');
    $pdf->cell(40, 7, strtoupper($data['status']), 1, 1, 'C');
   
}

    $pdf->Ln(10);

$pdf->Output('Cetak Laporan Maintenance','I');
?>

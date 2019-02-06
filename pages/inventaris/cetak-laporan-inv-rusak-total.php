<?php
$kd_lab = $_GET['kd_lab'];
$periode = isset($_GET['periode'])?$_GET['periode']:date('Y-m');
$periodeLabel = date('F Y',strtotime($periode . '-01'));
require_once("../../assets/fpdf/fpdf.php");
require_once("../../config/koneksi.php");
include "../../functions/query.php";

class PDF extends FPDF
{
    public $periode;
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
    }

    // Page footer
    function Footer()
    {

        
        $this->SetY(-60);
        $this->SetX(270);
        $this->Cell(10,8,'Sading,',0,0,'L');
        $this->Cell(10,8,tanggal_indo(date('d-m-Y')),0,1,'L');
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
$query = "SELECT * FROM tabel_inventory_rusak_total where kd_lab = '$kd_lab' AND DATE_FORMAT(tanggal_lapor,'%Y-%m') = '{$periode}'";
$hasil = mysqli_query($db, $query);
$data_mt = array();
while ($row = mysqli_fetch_assoc($hasil)) {
  $data_mt[] = $row;
}


$pdf = new PDF('L', 'mm', [210, 330]);
$pdf->periode = $periodeLabel;
$pdf->AliasNbPages();
$pdf->AddPage();

$query = "SELECT * from tabel_laboratorium where kd_lab='$kd_lab'";
$hasil = mysqli_query($db,$query);
$row   = mysqli_fetch_assoc($hasil);


$pdf->Ln(5);
$pdf->Cell(310,8,'LAPORAN INVENTORI RUSAK TOTAL '.$row['nama_lab'],0,1,'C');
$pdf->Cell(310,8,'SMP NEGERI 5 MENGWI',0,1,'C');
$pdf->Cell(310,8,'PERIODE ' . $periodeLabel,0,1,'C');
$pdf->Ln(5);

 $pdf->SetFont('Times','B',9.5);

        // header tabel
        $pdf->cell(8,8,'NO.',1,0,'C');
        $pdf->cell(30,8,'Kode Rusak Total',1,0,'C');
        $pdf->cell(30,8,'Nama Laboratorium',1,0,'C');
        $pdf->cell(30,8,'Nama Inventori',1,0,'C');
        $pdf->cell(30,8,'Tanggal Lapor',1,0,'C');
        $pdf->cell(45,8,'Status',1,0,'C');
        $pdf->cell(40,8,'Tanggal Ganti',1,0,'C');
        $pdf->cell(40,8,'Penyebab',1,0,'C');
        $pdf->cell(30,8,'Status Inventori',1,1,'C');

// set font
$pdf->SetFont('Times','',7);

// set penomoran
$nomor = 1;


foreach ($data_mt as $data) {
    $kd_inventori= $data['kd_inventori'];
    $query_inventori = "SELECT * from tabel_inventori_non_komputer where kd_inventori = '$kd_inventori'";
    $hasil2 = mysqli_query($db,$query_inventori);
    $row   = mysqli_fetch_assoc($hasil2);
    $kd_komputer= $data['kd_komputer'];
    $query_komputer = "SELECT * from tabel_inventori_komputer where kd_komputer = '$kd_komputer'";
    $hasil3 = mysqli_query($db,$query_komputer);
    $row2   = mysqli_fetch_assoc($hasil3);
    $kd_lab= $data['kd_lab'];
    $query_lab = "SELECT * from tabel_laboratorium where kd_lab = '$kd_lab'";
    $hasil_lab = mysqli_query($db,$query_lab);
    $rowlab   = mysqli_fetch_assoc($hasil_lab);

    $pdf->cell(8, 7, $nomor++ . '.', 1, 0, 'C');
    $pdf->cell(30, 7, strtoupper($data['kd_rusak_total']), 1, 0, 'C');
    $pdf->cell(30, 7, strtoupper($rowlab['nama_lab']), 1, 0, 'C');
    $pdf->cell(30, 7, strtoupper($data['kd_inventori']?:$data['kd_komputer']), 1, 0, 'C');
    $pdf->cell(30, 7, strtoupper($data['tanggal_lapor']), 1, 0, 'C');
    $pdf->cell(45, 7, strtoupper($data['status']), 1, 0, 'C');
    $pdf->cell(40, 7, strtoupper($data['tanggal_ganti']), 1, 0, 'C');
    $pdf->cell(40, 7, strtoupper($data['penyebab']), 1, 0, 'L');
    $pdf->cell(30, 7, strtoupper($data['status_inventoy']), 1, 1, 'C');

}

    $pdf->Ln(10);

$pdf->Output('Cetak Laporan Maintenance','I');
?>

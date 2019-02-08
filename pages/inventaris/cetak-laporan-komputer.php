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
    public $kd_lab;
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
        $periodLabel = date('F Y',strtotime($this->periode . '-01'));
        $this->Ln(5);
        $this->Cell(188,8,'LAPORAN MAINTENANCE LABORATORIUM KOMPUTER',0,1,'C');
        $this->Cell(188,8,'SMP NEGERI 5 MENGWI',0,1,'C');
        $this->Cell(188,8,'PERIODE ' . $periodLabel,0,1,'C');
        $this->Ln(5);


       $this->SetFont('Times','I',9.5);

        // header tabel
        $this->cell(188,8,'Jumlah inventori komputer: ' . getInventoryComuterCount(),0,1,'L');
        $komponenMaintenance = getMaintenanceKomponen($this->kd_lab,null,$this->periode);
        $countRusak = $komponenMaintenance? mysqli_num_rows($komponenMaintenance):0;
        $this->cell(188,8,'Jumlah inventori komputer rusak: ' . $countRusak,0,1,'L');
        $this->cell(188,8,'Detail inventori komputer',0,1,'L');

        $this->SetFont('Times','B',9.5);
        $this->cell(90,8,'Inventaris',1,0,'C');
        $this->cell(50,8,'Rusak',1,0,'C');
        $this->cell(50,8,'Penyebab',1,1,'C');

        mysqli_free_result($komponenMaintenance);
    }

    // Page footer
    function Footer()
    {
        $this->SetY(-60);
        $this->SetX(150);
        $this->Cell(15,8,'Sading,',0,0,'L');
        $this->Cell(10,8,tanggal_indo(date('d-m-Y')),0,1,'L');
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
$pdf->periode = $periode;
$pdf->kd_lab = $kd_lab;
$pdf->AliasNbPages();
$pdf->AddPage();

// set font
$pdf->SetFont('Times','',12);

// set penomoran
$nomor = 1;

    $inv = getKomponen();

    while ($rowInv = mysqli_fetch_assoc($inv)){

        $komponenMaintenance = getMaintenanceKomponen($kd_lab,$rowInv['kd_komponen'],$periode);
        $pdf->cell(190,7,$rowInv['nama_komponen'],1,1,'L');
//        $pdf->cell(50,7,1,1,0,'C');
//        $pdf->cell(50, 7, 1, 1, 1, 'C');
        if($komponenMaintenance){
            while ($rowMantain = mysqli_fetch_assoc($komponenMaintenance)){
                $pdf->cell(90,7,tanggal_indo($rowMantain['tanggal_lapor']),1,0,'L');
                $pdf->cell(50,7,$rowMantain['nama_komputer'],1,0,'C');
                $pdf->cell(50, 7, $rowMantain['keterangan'], 1, 1, 'C');
            }
        }else{
            $pdf->cell(90,7,'-',1,0,'L');
            $pdf->cell(50,7,'-',1,0,'C');
            $pdf->cell(50, 7, '-', 1, 1, 'C');
        }
    }

//    $pdf->cell(90,7,'Monitor',1,0,'L');
//    $jumlah = get_maintenance_komp_periode_count($kd_lab,$periode,'monitor',0);
//    $pdf->cell(50,7,$jumlah,1,0,'C');
//    $jumlah = get_maintenance_komp_periode_count($kd_lab,$periode,'monitor',1);
//    $pdf->cell(50, 7, $jumlah, 1, 1, 'C');
//
//    $pdf->cell(90,7,'Keyboard',1,0,'L');
//    $jumlah = get_maintenance_komp_periode_count($kd_lab,$periode,'keyboard',0);
//    $pdf->cell(50,7,$jumlah,1,0,'C');
//    $jumlah = get_maintenance_komp_periode_count($kd_lab,$periode,'keyboard',1);
//    $pdf->cell(50, 7, $jumlah, 1, 1, 'C');
//
//    $pdf->cell(90,7,'Mouse',1,0,'L');
//    $jumlah = get_maintenance_komp_periode_count($kd_lab,$periode,'mouse',0);
//    $pdf->cell(50,7,$jumlah,1,0,'C');
//
//    $jumlah = get_maintenance_komp_periode_count($kd_lab,$periode,'mouse',1);
//    $pdf->cell(50, 7, $jumlah, 1, 1, 'C');
//
//    $pdf->cell(90,7,'Memory',1,0,'L');
//    $jumlah = get_maintenance_komp_periode_count($kd_lab,$periode,'memory',0);
//    $pdf->cell(50,7,$jumlah,1,0,'C');
//
//    $jumlah = get_maintenance_komp_periode_count($kd_lab,$periode,'memory',1);
//    $pdf->cell(50, 7, $jumlah, 1, 1, 'C');
//
//    $pdf->cell(90,7,'HDD',1,0,'L');
//    $jumlah = get_maintenance_komp_periode_count($kd_lab,$periode,'hdd',0);
//    $pdf->cell(50,7,$jumlah,1,0,'C');
//
//    $jumlah = get_maintenance_komp_periode_count($kd_lab,$periode,'hdd',1);
//    $pdf->cell(50, 7, $jumlah, 1, 1, 'C');
//
//    $pdf->cell(90,7,'Processor',1,0,'L');
//    $jumlah = get_maintenance_komp_periode_count($kd_lab,$periode,'processor',0);
//    $pdf->cell(50,7,$jumlah,1,0,'C');
//
//    $jumlah = get_maintenance_komp_periode_count($kd_lab,$periode,'processor',1);
//    $pdf->cell(50, 7, $jumlah, 1, 1, 'C');
//
//    $pdf->cell(90,7,'UPS',1,0,'L');
//    $jumlah = get_maintenance_komp_periode_count($kd_lab,$periode,'ups',0);
//    $pdf->cell(50,7,$jumlah,1,0,'C');
//
//    $jumlah = get_maintenance_komp_periode_count($kd_lab,$periode,'ups',1);
//    $pdf->cell(50, 7, $jumlah, 1, 1, 'C');

    $pdf->Ln(5);

$pdf->Output('Cetak Inventaris Komputer','I');
?>

<?php
require('fpdf.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // logo
        $this->Image('../../millenium.jpg', 10, 5, -300);
        // Title
        $this->Cell(276, 5,'LAPORAN PEMBAYARAN SISWA PADA PRIVATE LES MILLENIUM', 0, 0,'C');
        // Line break
        $this->Ln(10);
        $this->SetFont('Times', '', '12');
        $this->Cell(276, 5,'Jl. Gereja No.54, Sei Agul, Kec. Medan Bar., Kota Medan, Sumatera Utara 20114', 0, 0,'C');
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function headerTable() {
        $this->SetFont('Arial','B',12);
        $this->cell(10,10,'No',1 ,0, 'C');
        $this->cell(70,10,'Nama',1 ,0, 'C');
        $this->cell(40,10,'Tanggal Bayar',1 ,0, 'C');
        $this->cell(48,10,'Nominal Pembayaran',1 ,0, 'C');
        $this->cell(46,10,'Status Pembayaran',1 ,0, 'C');
        $this->ln();
    }

    function viewTable() {
        include_once '../config.php';
        $this->SetFont('Arial','',12);
        // $start = $_REQUEST['start'];
        $id_bayar = $_REQUEST['id'];
        $sql = $db -> query("SELECT * FROM siswa INNER JOIN bayar ON siswa.id_siswa = bayar.id_siswa WHERE bayar.id_bayar='$id_bayar' ");
        $no=1;
        while ($ambil = $sql -> fetch(PDO::FETCH_ASSOC)) {
            $angka1 = "Rp " . number_format($ambil['nominal'] ,2,',','.');
            $this->cell(10,10,$no++,1 ,0, 'C');
            $this->cell(70,10, $ambil['nama_lengkap'] ,1 ,0, 'C');
            $this->cell(40,10, $ambil['tgl_bayar'] ,1 ,0, 'C');
            $this->cell(48,10, $angka1 ,1 ,0, 'C');
            $this->cell(46,10, $ambil['status_bayar'] ,1 ,0, 'C');
            $this->ln();
        }
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->SetFont('Times','',12);
$pdf->headerTable();
$pdf->viewTable();

$pdf->ln(40);
$pdf->cell(130, 5, '( Pimpinan )', 0,0);
$pdf->cell(59, 5, '', 0,1);

$fileName = 'Kwitansi Pembayaran.pdf';
$pdf->Output('D', $fileName);
?>
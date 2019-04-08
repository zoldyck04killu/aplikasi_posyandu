<?php
require_once '../../config/autoload.php';
require_once '../../config/config.php';
require_once '../../config/connection.php';
include('../../models/admin.php');

$obj = new Connection($host, $user, $pass, $db);
$objAdmin = new Admin($obj);

ob_start();
define('K_PATH_IMAGES', '../../assets/image/');

// create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, True, 'UTF-8', false);

// document information
// $pdf->SetCreator('Kwitansi Penjualan');
// $pdf->SetTitle('Kwitansi Penjualan');
// $pdf->SetSubject('Kwitansi Penjualan');

// header & footer data
$pdf->SetHeaderData('posyandu.jpg', 20, 'Posyandu Dahlia Binaan Puskesmas Lepasan',
            "Alamat : Jl. tidak tau \nTelp. (0511) 4315530 - 4315531", array(48,89,112), array(48,89,112));

// $pdf->SetHeaderData('logo.png', 30, 'BIDAN PRAKTEK MANDIRI (BPM)', PDF_HEADER_STRING);
$pdf->SetFooterData( array(0, 0, 0), array(0, 0, 0));
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margin
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP + 20, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set page break
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set scaling image
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// font subsetting
$pdf->setFontSubsetting(true);

$pdf->SetFont('helvetica', '', 14, '', true);

$pdf->AddPage();

$pdf->Ln(0);
$pdf->SetX(210);
$pdf->Cell(60,0, 'Tempat Posyandu, '.date("d-m-Y"), 0, 1, 'L', 0, '', 0); // untuk tanggal

// $pdf->writeHTMLCell(0, 0, '', '', '<H2>NOTA PEMBELIAN</H2>' , 0, 2, 0, true, 'C', true);

$html=<<<EOD
    <center> <h1> Laporan Data Pertumbuhan </h1> </center>
    <table border="1">
      <tr align="center" style="font-weight: bold;">
          <th width="50">No</th>
          <th>No Pemeriksaan</th>
          <th>Tanggal</th>
          <th>Nip Petugas</th>
          <th>Nama Petugas</th>
          <th>Kode Jadwal</th>
          <th>Jadwal Imunisasi</th>
          <th>Kode Vaksin</th>
          <th>Jenis Vaksin</th>
          <th>Nama Vaksin</th>
          <th>Dosis</th>
          <th>Keterangan Vaksin</th>
          <th>Kode Bayi</th>
          <th>Nama Bayi</th>
          <th>Jenis Kelamin</th>
          <th>Tanggal Lahir</th>
          <th>Umur Bayi</th>
          <th>Keterangan</th>
          <th>Keluhan</th>
          <th>Berat Badan</th>
          <th>Lingkar Kepala</th>
          <th>Lebar Badan</th>
          <th>Keterangan Gizi</th>

      </tr>
    </table>
EOD;

$html2=<<<EOD
  <table border="1" cellpadding="4">
      <tr>
        <td width="50">
EOD;
$html5=<<<EOD
        </td>
      </tr>
    </table>
EOD;
$pdf->SetX(10);
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'C', true);

$no = 1;
      $sql = $objAdmin->showPertumbuhan();
      while ($data = $sql->fetch_object()) {
      $pdf->SetX(10);
      $pdf->writeHTMLCell(0, 0, '', '', $html2.''.
            $no.'</td>
            <td>'.$data->No_pemeriksaan.'</td>
            <td width="100">'.$data->Tanggal.'</td>
            <td width="100">'.$data->Nip_petugas.'</td>
            <td>'.$data->Nama_petugas.'</td>
            <td>'.$data->Kode_jadwal.'</td>
            <td>'.$data->Jadwal_imunisasi.'</td>
            <td>'.$data->Kode_vaksin.'</td>
            <td>'.$data->Jenis_vaksin.'</td>
            <td>'.$data->Nama_vaksin.'</td>
            <td>'.$data->Dosis.'</td>
            <td>'.$data->Keterangan_vaksin.'</td>
            <td>'.$data->Kode_bayi.'</td>
            <td>'.$data->Nama_bayi.'</td>
            <td>'.$data->Jenis_kelamin.'</td>
            <td>'.$data->Tgl_lahir.'</td>
            <td>'.$data->Umur_bayi.'</td>
            <td>'.$data->Keterangan.'</td>
            <td>'.$data->Keluhan.'</td>
            <td>'.$data->Berat_badan.'</td>
            <td>'.$data->Lingkar_kepala.'</td>
            <td>'.$data->Lebar_badan.'</td>
            <td>'.$data->Keterangan_gizi.'
            '.$html5 , 0, 1, 0, true, '', true);
    $no++;
  }


  $pdf->Ln(10);
$pdf->SetX(230);
$pdf->Cell(60,0, ' Mengetahui', 0, 1, 'L', 0, '', 0);
$pdf->SetX(210);
$pdf->Cell(60,0, ' Kepla Puskesmas Lepasan', 0, 1, 'L', 0, '', 0);
$pdf->Ln(20);
$pdf->SetX(228);
$pdf->Cell(60,0, ' Nama Kepala', 0, 1, 'L', 0, '', 0);
$pdf->SetX(231);
$pdf->Cell(60,0, ' Nip Kepala', 0, 1, 'L', 0, '', 0);

ob_end_clean();
$pdf->Output('petugas.pdf', 'I');

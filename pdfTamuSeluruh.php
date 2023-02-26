<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'koneksi.php';
$pdf = $koneksi->query("SELECT * FROM tamu LEFT JOIN kategori ON tamu.id_kategori=kategori.id_kategori");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tamu Undangan</title>
    <link rel="stylesheet" href="assets/css/pdf.css">
</head>
<body>
    <h2 class="judul" align="center">Daftar Tamu Undangan
    </h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr class="thead">
            <th>No</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Alamat</th>
            <th>No. Meja</th>
            <th>Jam Kehadiran</th>
            <th>Total Tamu</th>
            <th>Souvenir</th>
            <th>Status</th>
        </tr>';

$i = 1;
foreach ($pdf as $row) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td>' . $row["nama_tamu"] . '</td>
                <td>' . $row["nama_kategori"] . '</td>
                <td>' . $row["alamat_tamu"] . '</td>
                <td>' . $row["no_meja"] . '</td>
                <td>' . $row["jam_hadir"] . '</td>
                <td>' . $row["total_tamu"] . '</td>
                <td>' . $row["souvenir"] . '</td>
                <td>' . $row["status"] . '</td>
            </tr>';
}

$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();

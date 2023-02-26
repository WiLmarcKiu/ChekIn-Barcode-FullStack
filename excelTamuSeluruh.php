<?php

require 'koneksi.php';

//? CONVERT EXCEL
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Daftar Tamu Keseluruhan.xls");

?>

<h2>
    <center>Daftar Tamu Keseluruhan</center>
</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Alamat</th>
        <th>No. Meja</th>
        <th>Jam Kehadiran</th>
        <th>Total Tamu</th>
        <th>Souvenir</th>
        <th>Status</th>
    </tr>
    <?php $nomor = 1; ?>
    <?php $ambil = $koneksi->query("SELECT * FROM tamu LEFT JOIN kategori ON tamu.id_kategori=kategori.id_kategori"); ?>
    <?php while ($data = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?= $nomor; ?></td>
            <td><?= $data['nama_tamu']; ?></td>
            <td><?= $data['nama_kategori']; ?></td>
            <td><?= $data['alamat_tamu']; ?></td>
            <td><?= $data['no_meja']; ?></td>
            <td><?= $data['jam_hadir']; ?></td>
            <td><?= $data['total_tamu']; ?></td>
            <td><?= $data['souvenir']; ?></td>
            <td><?= $data['status']; ?></td>
        </tr>

        <?php $nomor++; ?>
    <?php } ?>
</table>
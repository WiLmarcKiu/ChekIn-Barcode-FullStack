<h2>Hapus tamu keseluruhan</h2>

<?php include 'koneksi.php'; ?>
<?php
$ambil = $koneksi->query("SELECT * FROM tamu WHERE id_tamu = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$qr = $_GET['id'];
if (file_exists("imgBarcode/$qr.png")) {
    unlink("imgBarcode/$qr.png");
}

$koneksi->query("DELETE FROM tamu WHERE id_tamu = '$_GET[id]'");
echo "<script>alert('Data Telah Dihapus');</script>";
echo "<script>location='tamuSeluruh.php';</script>";
?>
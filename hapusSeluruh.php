<h2>Hapus Seluruh</h2>

<?php include 'koneksi.php'; ?>
<?php
$ambil = $koneksi->query("SELECT * FROM tamu");
$pecah = $ambil->fetch_assoc();

// Pilih semua file di dalam folder
$folder = "imgBarcode";
$files = glob($folder . "/*");

foreach ($files as $file) {
    if (is_file($file)) {
        unlink($file);
    }
}

$koneksi->query("DELETE FROM tamu");
$koneksi->query("DELETE FROM tamu_hadir");
echo "<script>alert('Data Telah Dihapus');</script>";
echo "<script>location='tamuSeluruh.php';</script>";
?>
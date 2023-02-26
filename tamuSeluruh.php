<?php
include 'koneksi.php';
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda belum Sign In');</script>";
    echo "<script>location='login.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>IC-Entertainment</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="foto/logo.png" />
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <style>
        .dropdown-menu[data-bs-popper] {
            left: unset !important;
            right: 0 !important;
        }

        .chartjs-render-monitor {
            display: block !important;
            width: 100% !important;
            height: 230px !important;
        }

        nav .breadcrumb .breadcrumb-item a {
            text-decoration: none !important;
            color: #000;
        }

        nav .breadcrumb .breadcrumb-item a:hover {
            color: #B66DFF;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include 'navTop.php'; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include 'navSide.php'; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-home"></i>
                            </span> Tamu Keseluruhan
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tamu Keseluruhan</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daftar Tamu Keseluruhan</h4>
                            <hr>
                            <div class="d-grid gap-2">
                                <a href="tambahTamuSeluruh.php" class="btn btn-gradient-primary"><i class="mdi mdi-plus"></i> Tambah Tamu</a>

                                <a href="pdfTamuSeluruh.php" class="btn btn-gradient-danger" target="_blank"><i class="mdi mdi-download"></i> Download Pdf</a>

                                <a href="excelTamuSeluruh.php" class="btn btn-gradient-success"><i class="mdi mdi-download"></i> Download Excel</a>

                                <!-- <a href="" class="btn btn-gradient-light"><i class="mdi mdi-download"></i> Download QR Seluruh</a> -->

                                <a href="hapusSeluruh.php" class="btn btn-gradient-dark mb-3" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="mdi mdi-close"></i> Hapus Seluruh</a>
                            </div>
                            <div class="table-responsive">
                                <table id="example1" class="table table-hover">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>Kode QR</th>
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>Alamat</th>
                                            <th>No. Meja</th>
                                            <th>Jam Kehadiran</th>
                                            <th>Total Tamu</th>
                                            <th>Souvenir</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php require 'phpqrcode/qrlib.php'; ?>
                                        <?php $nomor = 1; ?>
                                        <?php $ambil = $koneksi->query("SELECT * FROM tamu LEFT JOIN kategori ON tamu.id_kategori=kategori.id_kategori ORDER BY id_tamu DESC"); ?>
                                        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $nomor; ?></td>
                                                <td>
                                                    <a href="detailQR.php?id=<?php echo $pecah['id_tamu']; ?>" class="btn btn-sm btn-gradient-light" title="Detail QR"><i class="mdi mdi-qrcode-scan"></i></a>
                                                    <a href="ubahTamuSeluruh.php?id=<?php echo $pecah['id_tamu']; ?>" class="btn btn-sm btn-gradient-primary" title="Ubah"><i class="mdi mdi-eyedropper"></i></a>
                                                    <a href="hapusTamuSeluruh.php?id=<?php echo $pecah['id_tamu']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-gradient-success" title="Hapus"><i class="mdi mdi-delete"></i></a>
                                                </td>
                                                <td>
                                                    <?php
                                                    $kode = $pecah['id_tamu'];
                                                    $nama = $pecah['nama_tamu'];
                                                    $qrvalue = "http://localhost/InvQRCODE/dataTamu.php?id=" . $pecah['id_tamu'];

                                                    QRcode::png($qrvalue, "imgBarcode/" . $nama . ".png", "QR_ECLEVEL_H", 8, 2);

                                                    echo "<img src='imgBarcode/" . $nama . ".png' style='width: 70px; height: 70px; border-radius: 0px !important' ";
                                                    ?>
                                                </td>
                                                <td><?php echo $pecah['nama_tamu']; ?></td>
                                                <td><?php echo $pecah['nama_kategori']; ?></td>
                                                <td><?php echo $pecah['alamat_tamu']; ?></td>
                                                <td><?php echo $pecah['no_meja']; ?></td>
                                                <td><?php echo $pecah['jam_hadir']; ?></td>
                                                <td><?php echo $pecah['total_tamu']; ?></td>
                                                <td><?php echo $pecah['souvenir']; ?></td>
                                                <td><?php echo $pecah['status']; ?></td>
                                            </tr>
                                            <?php $nomor++; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include 'footer.php'; ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
    <!-- DataTables  & Plugins -->
    <?php include 'jsDataTable.php'; ?>
</body>

</html>
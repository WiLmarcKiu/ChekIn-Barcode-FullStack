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
                            </span> Data Tamu
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tamu</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Tamu</h4>
                            <hr>
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <?php
                                    date_default_timezone_set('Asia/Singapore');
                                    $id_tamu = $_GET['id'];
                                    $tgl = date("Y-m-d");
                                    $waktu = date("H:i:s");
                                    $data = mysqli_query($koneksi, "SELECT * FROM tamu LEFT JOIN kategori ON tamu.id_kategori=kategori.id_kategori WHERE id_tamu = '$id_tamu'");
                                    $result = mysqli_fetch_assoc($data);
                                    $status = $result['status'];
                                    ?>
                                    <?php if ($status == 'Hadir') {
                                        echo "<script>alert('Tamu Sudah Check In');</script>";
                                        echo "<script>location='index.php';</script>";
                                    } ?>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="nama_tamu">Nama :</label>
                                            <input type="text" class="form-control" name="nama_tamu" value="<?= $result['nama_tamu']; ?>" disabled required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_tamu">Alamat :</label>
                                            <input type="text" class="form-control" name="alamat_tamu" value="<?= $result['alamat_tamu']; ?>" disabled required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_kategori">Kategori :</label>
                                            <input type="text" class="form-control" name="nama_kategori" value="<?= $result['nama_kategori']; ?>" disabled required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_meja">No. Meja :</label>
                                            <input type="text" class="form-control" name="no_meja" value="<?= $result['no_meja']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jam_hadir">Jam Kehadiran :</label>
                                            <input type="text" class="form-control" name="jam_hadir" value="<?= $waktu; ?> - <?= date("d F Y", strtotime($tgl)); ?>" disabled required>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_tamu">Total Tamu :</label>
                                            <input type="number" placeholder="Masukan total tamu yang hadir (harus angka)" class="form-control" name="total_tamu" required min="1">
                                        </div>
                                        <div class="form-group">
                                            <label for="total_tamu">Souvenir :</label>
                                            <select class="form-control form-control-lg" name="souvenir" required>
                                                <option value="">Pilih Keterangan Souvenir</option>
                                                <option value="Sudah Terima">Sudah Terima</option>
                                                <option value="Belum Terima">Belum Terima</option>
                                            </select>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button type="submit" name="ubah" class="btn btn-gradient-primary">Update Data Tamu</button>
                                            <a href="scanCam.php" class="btn btn-gradient-success" style="text-decoration: none; color: #FFF;">
                                                Pindai Tamu Lain
                                            </a>
                                            <a href="index.php" class="btn btn-gradient-danger" style="text-decoration: none; color: #FFF;">
                                                Batalkan Kehadiran
                                            </a>
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['ubah'])) {
                                        date_default_timezone_set('Asia/Singapore');
                                        $id_tamu = $_GET['id'];
                                        $tgl = date("Y-m-d");
                                        $tanggal = date("d F Y", strtotime($tgl));
                                        $waktu = date("H:i:s");
                                        $status = 'Hadir';
                                        $nama_tamu = $result['nama_tamu'];
                                        $id_kategori = $result['id_kategori'];
                                        $sql = "UPDATE tamu SET no_meja = '$_POST[no_meja]', jam_hadir = '$waktu - $tanggal', total_tamu = '$_POST[total_tamu]', souvenir = '$_POST[souvenir]', status = '$status' WHERE id_tamu = '$id_tamu'";


                                        $koneksi->query("INSERT INTO tamu_hadir (id_tamu,id_kategori,nama_tamu_hadir) VALUES ('$id_tamu','$id_kategori','$nama_tamu')");

                                        $koneksi->query($sql);
                                        if ($koneksi) {
                                            echo "<script>alert('Data Berhasil Diubah');</script>";
                                            echo "<script>location='index.php';</script>";
                                        } else {
                                            echo "<script>alert('Data Gagal Diubah');</script>";
                                            echo "<script>location='dataTamu.php';</script>";
                                        }
                                    }
                                    ?>
                                </div>
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
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    <?php require 'jsDataTable.php'; ?>
</body>

</html>
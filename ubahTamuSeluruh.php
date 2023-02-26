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
                            </span> Ubah Tamu Keseluruhan
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ubah Tamu Keseluruhan</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ubah Tamu Keseluruhan</h4>
                            <hr>
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <?php
                                    $ambil = $koneksi->query("SELECT * FROM tamu WHERE id_tamu = '$_GET[id]'");
                                    $pecah = $ambil->fetch_assoc();
                                    ?>

                                    <?php
                                    $datakategori = array();
                                    $ambil = $koneksi->query("SELECT * FROM kategori");
                                    while ($tiap = $ambil->fetch_assoc()) {
                                        $datakategori[] = $tiap;
                                    }
                                    ?>

                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="id_kategori">Kategori :</label>
                                            <select class="form-control form-control-lg" name="id_kategori">
                                                <option value="">Pilih Kategori</option>

                                                <?php foreach ($datakategori as $key => $value) : ?>
                                                    <option value="<?php echo $value["id_kategori"]; ?>" <?php if ($pecah["id_kategori"] == $value["id_kategori"]) {
                                                                                                                echo "selected";
                                                                                                            } ?>>
                                                        <?php echo $value["nama_kategori"]; ?>
                                                    </option>
                                                <?php endforeach ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_tamu">Nama :</label>
                                            <input type="text" class="form-control" placeholder="Masukan Nama Tamu" name="nama_tamu" value="<?php echo $pecah['nama_tamu']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_tamu">Alamat :</label>
                                            <input type="text" class="form-control" placeholder="Masukan Alamat Tamu" name="alamat_tamu" value="<?php echo $pecah['alamat_tamu']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_meja">No. Meja :</label>
                                            <input type="text" class="form-control" placeholder="Masukan No. Meja Tamu" name="no_meja" value="<?php echo $pecah['no_meja']; ?>" required>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button type="submit" name="ubah" class="btn btn-gradient-primary">Ubah Data Tamu</button>
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['ubah'])) {
                                        $koneksi->query("UPDATE tamu SET id_kategori = '$_POST[id_kategori]',nama_tamu = '$_POST[nama_tamu]',alamat_tamu = '$_POST[alamat_tamu]',no_meja = '$_POST[no_meja]' WHERE id_tamu = '$_GET[id]'");

                                        $koneksi->query($sql);
                                        if ($koneksi) {

                                            echo "<script>alert('Data Berhasil Diubah');</script>";
                                            echo "<script>location='tamuSeluruh.php';</script>";
                                        } else {
                                            echo "<script>alert('Data Gagal Diubah');</script>";
                                            echo "<script>history.back();</script>";
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
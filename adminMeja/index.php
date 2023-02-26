<?php
include '../koneksi.php';
if (!isset($_SESSION['adminMeja'])) {
    echo "<script>alert('Anda belum Sign In');</script>";
    echo "<script>location='../login.php';</script>";
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
    <!-- ../plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="foto/logo.png" />
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
                            </span> Tamu Hadir
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tamu Hadir</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4 class="card-title">Daftar Tamu Hadir</h4>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <?php $ambil = $koneksi->query("SELECT SUM(total_tamu) AS total FROM tamu WHERE status = 'Hadir'"); ?>
                                    <?php $pecah = $ambil->fetch_array() ?>

                                    <h5><i class="mdi mdi-account-multiple"></i> <span>Total Tamu yang datang :</span> <span><?php print_r($pecah['total']) ?> Orang</span></h5>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive" onload="table();">

                                <script>
                                    function table() {
                                        const xhttp = new XMLHttpRequest();
                                        xhttp.onload = function() {
                                            document.getElementById("table").innerHTML = this.responseText;
                                        }
                                        xhttp.open("GET", "tamuRealTime.php");
                                        xhttp.send();
                                    }

                                    setInterval(function() {
                                        table();
                                    }, 1);
                                </script>

                                <div id="table">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include '../footer.php'; ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ../plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
    <!-- DataTables  & ../Plugins -->
    <?php include '../jsDataTable.php'; ?>
</body>

</html>
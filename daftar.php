<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>IC-Entertainment | DAFTAR</title>
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
</head>
<style>
    ::placeholder {
        color: #3E4B5B !important;
    }

    .auth .auth-form-light select {
        color: #3E4B5B;
    }
</style>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth" style="background-image: url(assets/images/dashboard/login3.jfif); background-size: cover; width: 100%; height: 100vh;">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5" style="background: #ffffffb8; box-shadow: 0 1rem 9rem rgb(249 169 23 / 32%) !important;">
                            <div class="brand-logo text-center">
                                <!-- <img src="assets/images/logo.svg"> -->
                                <h2>Daftar</h2>
                            </div>
                            <!-- <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6> -->
                            <form method="POST" class="pt-3">
                                <div class="form-group">
                                    <input type="username" class="form-control form-control-lg" id="exampleInputusername1" placeholder="Username" required="" autocomplete="off" name="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required="" autocomplete="off" name="password">
                                </div>
                                <div class="form-group">
                                    <select class="form-control form-control-lg" name="petugas" required>
                                        <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pilih Petugas</option>
                                        <option value="Petugas Barcode">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Petugas Barcode</option>
                                        <option value="Petugas Meja">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Petugas Meja</option>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" style="display: block; width: 100%;" name="daftar">DAFTAR AKUN</button>
                                </div>
                                <div class="text-center mt-4" style="font-size: 14px; color: #3E4B5B;"><a href="login.php" class="text-primary" style="text-decoration: none;"><i class="mdi mdi-arrow-left" style="font-size: 14px;"></i> Kembali</a>
                                </div>
                            </form>


                            <?php
                            // jika ada tombol daftar (tombol daftar ditekan)
                            if (isset($_POST["daftar"])) {
                                $koneksi->query("INSERT INTO admin (username,password,petugas) VALUES ('$_POST[username]','$_POST[password]','$_POST[petugas]')");

                                echo "<script>alert('Akun Berhasil Didaftar');</script>";
                                echo "<script>location='login.php';</script>";
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
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
</body>

</html>
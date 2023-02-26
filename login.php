<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>IC-Entertainment | LOGIN</title>
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
                                <h2>Login</h2>
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
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted" style="color: #3E4B5B !important;">
                                            <input type="checkbox" class="form-check-input" required> Saya Adalah Admin
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" style="display: block; width: 100%;" name="login">LOGIN AKUN</button>
                                </div>
                                <div class="text-center mt-4" style="font-size: 14px; color: #3E4B5B;"> Belum punya akun? <a href="daftar.php" class="text-primary">Daftar</a>
                                </div>
                            </form>


                            <?php
                            // jika ada tombol login (tombol login ditekan)
                            if (isset($_POST["login"])) {
                                $username = $_POST["username"];
                                $password = $_POST["password"];

                                // lakukan query cek akun di tabel admin pada database
                                $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' AND password = '$password' AND petugas = 'Petugas Barcode'");

                                // hitung akun yang terresult
                                $akunyangcocok = $result->num_rows;

                                // jika 1 akun yang cocok maka diloginkan
                                if ($akunyangcocok == 1) {
                                    //anda sukses login
                                    // mendapatkan akun dalam bentuk array
                                    $akun = mysqli_fetch_assoc($result);

                                    // simpan di session admin
                                    $_SESSION["admin"] = $akun;
                                    echo "<script>alert('Selamat Datang $akun[username]');</script>";
                                    echo "<script>location='index.php';</script>";
                                } else {
                                    // lakukan query cek akun di tabel admin pada database
                                    $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' AND password = '$password' AND petugas = 'Petugas Meja'");

                                    // hitung akun yang terresult
                                    $akunyangcocok = $result->num_rows;

                                    // jika 1 akun yang cocok maka diloginkan
                                    if ($akunyangcocok == 1) {
                                        //anda sukses login
                                        // mendapatkan akun dalam bentuk array
                                        $akun = mysqli_fetch_assoc($result);

                                        // simpan di session adminMeja
                                        $_SESSION["adminMeja"] = $akun;
                                        echo "<script>alert('Selamat Datang $akun[username]');</script>";
                                        echo "<script>location='adminMeja/index.php';</script>";
                                    } else {
                                        // anda gagal login
                                        echo "<script>alert('Anda Gagal Login Mohon Periksa Kembali Akun Anda');</script>";
                                        echo "<script>location='login.php';</script>";
                                    }
                                }
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
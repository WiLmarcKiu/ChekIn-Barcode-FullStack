<style>
    #preview {
        width: 100%;
        height: 80vh;
        overflow-x: hidden;
        overflow-y: hidden;
    }
</style>

<body style="background: #81D8D1; background-repeat: no-repeat; background-size: cover;">
    <center>
        <div class="cover" style="max-width: 660px;">
            <video id="preview"></video>
        </div>
    </center>
    <script src="assets/js/jquery.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        var scanner = new Instascan.Scanner({
            video: document.getElementById('preview'),
            scanPeriod: 5,
            mirror: false
        });
        scanner.addListener('scan', function(content) {
            // alert('Berhasil Scan');
            window.location.href = content;
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
                $('[name="options"]').on('change', function() {
                    if ($(this).val() == 1) {
                        if (cameras[0] != "") {
                            scanner.start(cameras[0]);
                        } else {
                            alert('No Front camera found!');
                        }
                    } else if ($(this).val() == 2) {
                        if (cameras[1] != "") {
                            scanner.start(cameras[1]);
                        } else {
                            alert('No Back camera found!');
                        }
                    }
                });
            } else {
                console.error('No cameras found.');
                alert('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
            alert(e);
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <center>
        <div class="form-group">
            <label class="btn btn-secondary mb-2">
                <input type="radio" name="options" value="1" autocomplete="off" checked> Kamera Depan
            </label>
            <label class="btn btn-secondary mb-2">
                <input type="radio" name="options" value="2" autocomplete="off"> Kamera Belakang
            </label>
            <a href="index.php" class="btn btn-danger mb-2"><i class="mdi mdi-close"></i> Batal Memindai</a>
        </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
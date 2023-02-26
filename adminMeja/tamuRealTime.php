<?php require '../koneksi.php'; ?>
<table id="example1" class="table table-hover noborder">

    <?php $nomor = 1; ?>
    <?php $ambil = $koneksi->query("SELECT * FROM tamu_hadir LEFT JOIN kategori ON tamu_hadir.id_kategori=kategori.id_kategori LEFT JOIN tamu ON tamu_hadir.id_tamu=tamu.id_tamu ORDER BY id_tamu_hadir DESC"); ?>
    <?php while ($pecah = $ambil->fetch_assoc()) { ?>

        <?php $kategori = $pecah['nama_kategori']; ?>
        <?php if ($kategori == 'Tamu VIP') : ?>

            <div class="alert  text-dark" style="background-color: #E1ABFF;">
                <h4 style="font-size: 20px; margin-bottom: 2px;"><?php echo $nomor; ?>. <?= $pecah['nama_tamu']; ?> <i class="mdi mdi-crown" style="font-size: 24px;"></i></h4>
                <p><em><?= $pecah['nama_kategori']; ?></em></p>
                <p style="margin-bottom: 5px;">
                    <i class="mdi mdi-map-marker"></i> <?= $pecah['alamat_tamu']; ?> <br>
                    <i class="mdi mdi-flag-variant"></i> Meja <?= $pecah['no_meja']; ?> <br>
                    <i class="mdi mdi-clock"></i> <?= $pecah['jam_hadir']; ?>
                </p>
            </div>

        <?php else : ?>

            <div class="alert alert-secondary text-dark">
                <h4 style="font-size: 20px; margin-bottom: 2px;"><?php echo $nomor; ?>. <?= $pecah['nama_tamu']; ?></h4>
                <p><em><?= $pecah['nama_kategori']; ?></em></p>
                <p style="margin-bottom: 5px;">
                    <i class="mdi mdi-map-marker"></i> <?= $pecah['alamat_tamu']; ?> <br>
                    <i class="mdi mdi-flag-variant"></i> Meja <?= $pecah['no_meja']; ?> <br>
                    <i class="mdi mdi-clock"></i> <?= $pecah['jam_hadir']; ?>
                </p>
            </div>

        <?php endif ?>

        <?php $nomor++; ?>
    <?php } ?>

</table>
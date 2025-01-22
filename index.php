<?php session_start(); ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Buku Tamu</title>

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">


    <!-- Link Bootstrap CSS -->
    <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- link sweetalert -->
    <link rel="stylesheet" href="./assets/vendor/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="./assets/vendor/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

    <!-- my css -->
    <link rel="stylesheet" href="./assets/css/bukutamu.css">

</head>

<body>
    <!-- Tombol Kembali ke Beranda -->
    <a href="https://siaplayani.sumutprov.go.id/" class="btn-back mb-3">Kembali ke Beranda</a>

    <div class="container container-form mt-3">
        <h3>Sistem Informasi Buku Tamu</h3>
        <p>Ini adalah buku tamu pada DPMPTSP SUMUT</p>

        <form action="proses_simpan.php" method="POST">
            <!-- Identitas -->
            <div class="mb-3">
                <label for="nik" class="form-label">No Identitas Diri</label>
                <input type="text" class="form-control" id="nik" name="nik_tamu" placeholder="Masukkan ktp/sim/paspor anda"
                    aria-labelledby="Masukkan nik Anda" maxlength="16" required>
            </div>

            <!-- Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama_tamu" placeholder="Masukkan nama anda" aria-labelledby="Masukkan nama Anda" required>
            </div>

            <!-- Nomor Telepon -->
            <div class="mb-3">
                <label for="nohp" class="form-label">No Hp</label>
                <input type="tel" class="form-control" id="nohp" name="no_hp" placeholder="Masukkan no hp anda" required>
            </div>

            <!-- Pekerjaan -->
            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan Anda</label>
                <select class="form-select" id="pekerjaan" name="pekerjaan" required>
                    <option selected disabled>--- Pilih Pekerjaan Anda ---</option>
                    <option value="ASN">ASN</option>
                    <option value="Swasta">Non ASN</option>
                    <option value="Pelaku Usaha">Pelaku Usaha</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <!-- Pekerjaan Untuk Pelaku Usaha -->
            <div class="mb-3">
                <label for="pelaku_usaha_input" class="form-label">Nama Usaha Anda</label>
                <input type="tel" class="form-control" id="pelaku_usaha_input" name="pelaku_usaha" placeholder="Masukkan Nama Usaha Anda" required>
            </div>

            <!-- Jabatan Untuk Pelaku Usaha -->
            <div class="mb-3">
                <label for="jabatan_pelaku_usaha" class="form-label">Jabatan Anda</label>
                <input type="tel" class="form-control" id="jabatan_pelaku_usaha" name="pelaku_usaha" placeholder="Masukkan Jabatan Anda" required>
            </div>


            <!-- Detail Pekerjaan (Select) -->
            <div class="mb-3" id="detailPekerjaan" style="display: none;">
                <label for="detailPekerjaanSelect" class="form-label">Detail Pekerjaan</label>
                <select class="form-select" id="detailPekerjaanSelect" name="detailPekerjaan">
                    <option selected disabled value="">--- Pilih Detail Pekerjaan Anda ---</option>
                    <option value="Kementerian">Kementerian/ Lembaga Pemerintah Non Kementerian</option>
                    <option value="OPD Prov Sumut">OPD Provinsi SUMUT</option>
                    <option value="OPD Provinsi Lain">OPD Provinsi Lain</option>
                    <option value="OPD Kabupaten/Kota">OPD Kabupaten/Kota</option>
                </select>
            </div>

            <!-- Detail Pekerjaan (Input) -->
            <div class="mb-3" id="detailPekerjaanSpesifik" style="display: none;">
                <label for="detailPekerjaanInput" class="form-label">Detail Pekerjaan</label>
                <input type="text" class="form-control" id="detailPekerjaanInput" name="detailPekerjaanSpesifik" placeholder="Masukkan detail pekerjaan anda...">
            </div>

            <!-- Keperluan -->
            <div class="mb-3">
                <label for="keperluan" class="form-label">Keperluan Anda</label>
                <select class="form-select" id="keperluan" name="keperluan" required>
                    <option selected disabled value="">--- Pilih Keperluan Anda ---</option>
                    <option value="Kunjungan Dinas">Kunjungan Dinas</option>
                    <option value="Kunjungan non Dinas">Kunjungan Non Dinas</option>
                    <option value="Konsultasi">Konsultasi</option>
                    <option value="Permohonan informasi PPID">Permohonan Informasi PPID</option>
                    <option value="Permohonan informasi PB">Permohonan Informasi PB/PB UMKU</option>
                    <option value="Pengurusan PB UMKU">Pengurusan PB/PB UMKU</option>
                    <option value="Pengaduan masyarakat">Pengaduan Masyarakat</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <!-- Keperluan lebih lanjut -->
            <div class="mb-3" id="keperluanInput" style="display: none;">
                <label for="keperluanDetail" class="form-label">Detail Keperluan</label>
                <input type="text" class="form-control" id="keperluanDetail" name="keperluanInput" placeholder="Masukkan detail keperluan anda...">
            </div>

            <button type="submit" class="btn-submit">Kirim</button>
        </form>
    </div>

    <script>
        <?php if (isset($_SESSION['success_message'])): ?>
            Swal.fire({
                title: 'Berhasil!',
                text: '<?php echo $_SESSION['success_message']; ?>',
                icon: 'success',
                confirmButtonText: 'OK'
            });
            <?php unset($_SESSION['success_message']); ?>
        <?php elseif (isset($_SESSION['error_message'])): ?>
            Swal.fire({
                title: 'Gagal!',
                text: '<?php echo $_SESSION['error_message']; ?>',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>
    </script>

    <!-- Link Bootstrap JS -->
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Script JS -->
    <script src="assets/js/script.js" defer></script>
</body>

</html>
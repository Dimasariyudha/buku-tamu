<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Buku Tamu</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/bukutamu.css">

</head>

<body>
    <!-- Tombol Kembali ke Beranda -->
    <a href="https://siaplayani.sumutprov.go.id/" class="btn-back mb-3">Kembali ke Beranda</a>

    <div class="container container-form mt-3">
        <h3>Sistem Informasi Buku Tamu</h3>
        <p>Ini adalah buku tamu pada DPMPTSP SUMUT</p>

        <form action="./proses_simpan.php" method="POST">
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
                    <option value="PNS">PNS</option>
                    <option value="Swasta">Non PNS</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
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

    <!-- Script JS -->
    <script src="assets/js/script.js"></script>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
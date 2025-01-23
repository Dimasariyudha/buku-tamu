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
<<<<<<< Updated upstream
    <!-- Tombol Kembali ke Beranda -->
    <a href="#" class="btn-back mb-3">Kembali ke Beranda</a>
=======
>>>>>>> Stashed changes

    <!-- Navigation -->
    <div class="d-flex justify-content-start ms-3 mt-3">
        <div class="btn btn-danger">Beranda - DPMPTSP</div>
    </div>

<<<<<<< Updated upstream
        <form action="./proses_simpan.php" method="POST">
            <!-- Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama_tamu" placeholder="Masukkan nama anda" aria-labelledby="Masukkan nama Anda" required>
            </div>
=======


    <!-- Container -->
    <div class="container container-form my-3 p-4">
        <h4 class="text-center judul mb-3">Sistem Informasi Buku Tamu</h4>
        <p class="text-center sub-judul text-muted mb-2">Ini adalah buku tamu pada DPMPTSP SUMUT</p>


        <!-- Steps Idicator-->
        <div class="container px-5 pt-4">
            <!-- Step Indicator -->
            <div class="step-indicator mb-4">
                <div class="step active">
                    1
                    <span class="step-label">Data Diri</span>
                </div>
                <div class="line"></div>
                <div class="step">
                    2
                    <span class="step-label">Pekerjaan</span>
                </div>
                <div class="line"></div>
                <div class="step">
                    3
                    <span class="step-label">Keperluan</span>
                </div>
            </div>
        </div>


        <!-- Form Section -->
        <form class="pt-4 px-2" method="POST" action="proses_simpan.php">
            <!-- Step 1 -->
            <div class="form-step" id="step1">
                <div class="mb-3">
                    <label for="nomor_identitas_diri" class="form-label">Nomor Identitas Diri</label>
                    <input type="text" class="form-control" id="nomor_identitas_diri" name="nomor_identitas_diri" placeholder="Masukkan NIK/Paspor/SIM anda">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="nama_tamu" placeholder="Masukkan nama anda">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor HP/Telepon</label>
                    <input type="text" class="form-control" id="phone" name="nomor_hp" placeholder="Masukkan nomor telepon anda">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="Pria">
                            <label class="form-check-label" for="male">Pria</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="Wanita">
                            <label class="form-check-label" for="female">Wanita</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="form-step d-none" id="step2">
                <!-- Pekerjaan -->
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan Anda</label>
                    <select class="form-select" id="pekerjaan" name="pekerjaan">
                        <option selected disabled>--- Pilih Pekerjaan Anda ---</option>
                        <option value="ASN">ASN</option>
                        <option value="Non ASN">Non ASN</option>
                        <option value="Pelaku Usaha">Pelaku Usaha</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <!-- end pekerjaan -->
>>>>>>> Stashed changes

                <!-- ASN SECTION -->
                <!-- Detail Pekerjaan ASN (Select) -->
                <div class="mb-3" id="detailPekerjaan" style="display: none;">
                    <label for="detailPekerjaanSelectASN" class="form-label">Detail Pekerjaan</label>
                    <select class="form-select" id="detailPekerjaanSelectASN" name="detailPekerjaan">
                        <option selected disabled value="">--- Pilih Detail Pekerjaan Anda ---</option>
                        <option value="Kementerian">Kementerian/ Lembaga Pemerintah Non Kementerian</option>
                        <option value="OPD Prov Sumut">OPD Provinsi SUMUT</option>
                        <option value="OPD Provinsi Lain">OPD Provinsi Lain</option>
                        <option value="OPD Kabupaten/Kota">OPD Kabupaten/Kota</option>
                    </select>
                </div>

<<<<<<< Updated upstream
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
=======
                <!-- Detail Pekerjaan ASN bedasarkan OPD Provinsi Lain -->
                <div class="mb-3" id="detailOPD_provinsi_lain" style="display: none;">
                    <label for="detailOPD_provinsi_lain_label" class="form-label">Sebutkan OPD Provinsi Anda</label>
                    <input type="text" class="form-control" id="detailOPD_provinsi_lain_label" name="detailOPD_provinsi_lain" placeholder="Sebutkan asal OPD Provinsi anda">
                </div>

                <!-- Detail Pekerjaan ASN bedasarkan OPD Kabupaten/Kota Lain -->
                <div class="mb-3" id="detailOPD_kabupaten_kota" style="display: none;">
                    <label for="detailOPD_kabupaten_kota" class="form-label">Sebutkan OPD Kabupaten/Kota Anda</label>
                    <input type="text" class="form-control" id="detailOPD_kabupaten_kota" name="detailOPD_kabupaten_kota" placeholder="Sebutkan asal OPD Kabupaten/Kota anda">
                </div>
                <!-- End ASN SECTION -->


                <!-- Pelaku Usaha -->
                <!-- Usaha Untuk Pelaku Usaha -->
                <div class="mb-3" id="namaUsahaPelakuUsaha" style="display: none;">
                    <label for="pelaku_usaha_input" class="form-label">Nama Usaha Anda</label>
                    <input type="tel" class="form-control" id="pelaku_usaha_input" name="pelaku_usaha" placeholder="Masukkan Nama Usaha Anda">
                </div>

                <!-- Jabatan Untuk Pelaku Usaha -->
                <div class="mb-3" id="jabatanPelakuUsaha" style="display: none;">
                    <label for="jabatan_pelaku_usaha" class="form-label">Jabatan Anda</label>
                    <input type="tel" class="form-control" id="jabatan_pelaku_usaha" name="jabatan_pelaku_usaha" placeholder="Masukkan Jabatan Anda">
                </div>
                <!-- END Pelaku Usaha -->

                <!-- Detail Pekerjaan Lainnya (Input) -->
                <div class="mb-3" id="detailPekerjaanSpesifik" style="display: none;">
                    <label for="detailPekerjaanInput" class="form-label">Detail Pekerjaan</label>
                    <input type="text" class="form-control" id="detailPekerjaanInput" name="detailPekerjaanSpesifik" placeholder="Masukkan detail pekerjaan anda...">
                </div>
                <!-- end detail pekerjaan lainnya -->
            </div>


            <!-- Step 3 -->
            <div class="form-step d-none" id="step3">
                <!-- Keperluan -->
                <div class="mb-3">
                    <label for="keperluan" class="form-label">Keperluan Anda</label>
                    <select class="form-select" id="keperluan" name="keperluan">
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
>>>>>>> Stashed changes
            </div>

            <!-- button navigate -->
            <div class="d-flex justify-content-between mt-4">
                <button type="button" id="prevButton" class="btn btn-secondary" disabled>Previous</button>
                <button type="button" id="nextButton" class="btn btn-primary">Next</button>
                <button type="submit" id="submitButton" class="btn btn-success d-none">Submit</button>
            </div>
<<<<<<< Updated upstream

            <!-- Keperluan -->
            <div class="mb-3">
                <label for="keperluan" class="form-label">Keperluan Anda</label>
                <select class="form-select" id="keperluan" name="keperluan" required>
                    <option selected disabled value="">--- Pilih Keperluan Anda ---</option>
                    <option value="Kunjungan-dinas">Kunjungan Dinas</option>
                    <option value="Kunjungan-non-dinas">Kunjungan Non Dinas</option>
                    <option value="Konsultasi">Konsultasi</option>
                    <option value="Permohonan-informasi-PPID">Permohonan Informasi PPID</option>
                    <option value="Permohonan-informasi-PB">Permohonan Informasi PB/PB UMKU</option>
                    <option value="Pengurusan-PB-UMKU">Pengurusan PB/PB UMKU</option>
                    <option value="Pengaduan_masyarakat">Pengaduan Masyarakat</option>
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
=======
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
>>>>>>> Stashed changes

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
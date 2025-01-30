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

    <!-- Navigation -->
    <div class="d-flex justify-content-start ms-3 mt-3">
        <div class="btn btn-danger">Beranda - DPMPTSP</div>
    </div>



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
                    <input type="text" class="form-control" id="nomor_identitas_diri" name="nomor_identitas_diri" placeholder="Masukkan No. KTP/Paspor/SIM Anda" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="nama_tamu" placeholder="Masukkan nama anda" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor HP/Telepon</label>
                    <input type="text" class="form-control" id="phone" name="nomor_hp" placeholder="Masukkan nomor telepon anda" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="Pria" required>
                            <label class="form-check-label" for="male">Pria</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="Wanita" required>
                            <label class="form-check-label" for="female">Wanita</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2 - Pekerjaan-->
            <div class="form-step d-none" id="step2">
                <!-- Pekerjaan -->
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan Anda</label>
                    <select class="form-select" id="pekerjaan" name="pekerjaan" required>
                        <option selected disabled>--- Pilih Pekerjaan Anda ---</option>
                        <option value="ASN">ASN</option>
                        <option value="Non ASN">Non ASN</option>
                        <option value="Pelaku Usaha">Pelaku Usaha</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <!-- end pekerjaan -->

                <!-- Container untuk input detail Pekerjaan -->
                <div class="mb-3 form-group" id="pekerjaanInput"></div>
                <!-- end Container untuk input detail pekerjaan -->
            </div>


            <!-- Step 3 - Reason -->
            <div class="form-step d-none" id="step3">
                <!-- Keperluan Select -->
                <div class="mb-3">
                    <label for="keperluan" class="form-label">Pilih Keperluan Anda</label>
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

                <!-- Detail Keperluan -->
                <div class="form-group mb-3" id="detailKeperluan"></div>
            </div>

            <!-- button navigate -->
            <div class="d-flex justify-content-between mt-4">
                <button type="button" id="prevButton" class="btn btn-secondary" disabled>Previous</button>
                <button type="button" id="nextButton" class="btn btn-primary">Next</button>
                <button type="submit" id="submitButton" class="btn btn-success d-none">Submit</button>
            </div>
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
    <script src="assets/js/multistep-form.js"></script>
</body>

</html>
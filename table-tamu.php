<?php
// Hubungkan ke database
include 'connection.php'; // Gunakan file koneksi yang sudah ada

// Ambil data dari tabel `tamu` dan `kunjungan` menggunakan JOIN
$query = "SELECT tamu.id_tamu, tamu.nama_tamu, tamu.jenis_tamu AS instansi, tamu.keperluan, kunjungan.tanggal_kunjungan 
          FROM tamu
          JOIN kunjungan ON tamu.id_tamu = kunjungan.id_tamu";
$result = $koneksi->query($query);

if (!$result) {
    die("Query gagal: " . $koneksi->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Siap Layani</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./assets/vendor/admin-lte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./assets/vendor/admin-lte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary">
            <a href="index3.html" class="brand-link">
                <img src="./assets/img/logo-sumut.png" alt="Logo" class="brand-image">
                <span class="brand-text font-weight-light">Siap Layani</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="./assets/vendor/admin-lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <p class="d-block text-white">Selamat Datang</p>
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Tulis Surat</p>
                            </a>
                        </li>
                        <li class="nav-header">LAPORAN</li>
                        <li class="nav-item">
                            <a href="./table-tamu.php" class="nav-link">
                                <i class="nav-icon fas fa-user-circle"></i>
                                <p>Daftar Tamu</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Selamat Datang</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">DataTable with default features</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2 mb-2">
                                            <a href="#" class="btn bg-navy color-palette"><i class="fas fa-print"> Cetak</i></a>
                                        </div>
                                    </div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Nama Tamu</th>
                                                <th>Instansi</th>
                                                <th>Keperluan</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $no++ . "</td>";
                                                echo "<td>" . htmlspecialchars($row['nama_tamu']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['instansi']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['keperluan']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['tanggal_kunjungan']) . "</td>";
                                                echo "<td>
                                                        <a href='lihat-data.php?id=" . $row['id_tamu'] . "' class='btn btn-info mb-1'>
                                                            <i class='fas fa-eye'></i> Lihat Data
                                                        </a>
                                                        <a href='print-data.php?id=" . $row['id_tamu'] . "' target='_blank' class='btn btn-warning mb-1'>
                                                            <i class='fas fa-print'></i> Print
                                                        </a>
                                                        <a href='edit-data.php?id=" . $row['id_tamu'] . "' class='btn btn-success'>
                                                            <i class='fas fa-edit'></i> Edit Data User
                                                        </a>
                                                      </td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <strong>Copyright &copy; 2025 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>

    <script src="./assets/vendor/admin-lte/plugins/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/vendor/admin-lte/dist/js/adminlte.js"></script>
</body>

</html>

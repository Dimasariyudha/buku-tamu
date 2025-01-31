<?php

// Koneksi ke database
include './connection.php';

// session_start();

// if (!isset($_SESSION['jabatan'])) {
//     header('Location: login_admin.php');
//     exit;
// }

// Mengambil total tamu
$resultTotal = $koneksi->query("SELECT COUNT(*) AS total_tamu FROM tamu");
$totalTamu = $resultTotal->fetch_assoc()['total_tamu'];

// Mengambil data kunjungan harian
$resultHarian = $koneksi->query(
    "SELECT tanggal_kunjungan, COUNT(*) AS jumlah_kunjungan " .
        "FROM kunjungan " .
        "GROUP BY tanggal_kunjungan " .
        "ORDER BY tanggal_kunjungan"
);

$tanggal = [];
$jumlahKunjungan = [];
while ($row = $resultHarian->fetch_assoc()) {
    $tanggal[] = $row['tanggal_kunjungan'];
    $jumlahKunjungan[] = $row['jumlah_kunjungan'];
}

// $koneksi->close();

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="./assets/vendor/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="./assets/vendor/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="./assets/vendor/admin-lte/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./assets/vendor/admin-lte/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./assets/vendor/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="./assets/vendor/admin-lte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="./assets/vendor/admin-lte/plugins/summernote/summernote-bs4.min.css">
    <!-- JS chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include_once './assets/komponen/navbar.php'; ?>
        <!-- Navbar -->

        <!-- Main Sidebar Container -->
        <?php include_once './assets/komponen/sidebar.php'; ?>
        <!-- End Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Selamat Datang</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- row -->
                    <div class="row">
                        <!-- col-daftar order -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>

                                    <p>Layanan Pengaduan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-document"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <!-- col tamu yg terdaftar -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= $totalTamu; ?></h3>

                                    <p>Total Tamu</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="./table-tamu.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <!-- col penyebaran keperluan -->
                        <div class="col-lg-4 col-6">
                            <!-- DONUT CHART -->
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Donut Chart</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- col penyebaran keperluan -->
                    </div>
                    <!-- /.row -->

                    <!-- row-2 -->
                    <div class="row">
                        <!-- col statistik tamu -->
                        <div class="col-lg-4 col-4 mb-4">
                            <!-- small box -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h4><b>Statistik Pengunjung</b></h4>
                                </div>

                                <!-- Perhitungan tanggal -->
                                <?php
                                // Query untuk menghitung jumlah kunjungan per periode
                                $sql_harian = "SELECT COUNT(*) AS jumlah_harian FROM kunjungan WHERE tanggal_kunjungan = NOW()";
                                $sql_mingguan = "SELECT COUNT(*) AS jumlah_mingguan FROM kunjungan WHERE YEARWEEK(tanggal_kunjungan, 1) = YEARWEEK(CURDATE(), 1)";
                                $sql_bulanan = "SELECT COUNT(*) AS jumlah_bulanan FROM kunjungan WHERE MONTH(tanggal_kunjungan) = MONTH(CURDATE()) AND YEAR(tanggal_kunjungan) = YEAR(CURDATE())";
                                $sql_tahunan = "SELECT COUNT(*) AS jumlah_tahunan FROM kunjungan WHERE YEAR(tanggal_kunjungan) = YEAR(CURDATE())";

                                $sql_chart = "SELECT MONTH(tanggal_kunjungan) AS bulan, COUNT(*) AS jumlah 
                                    FROM kunjungan 
                                    WHERE YEAR(tanggal_kunjungan) = YEAR(CURDATE())
                                    GROUP BY MONTH(tanggal_kunjungan)";

                                // Eksekusi query dan ambil data
                                $jumlah_harian = $koneksi->query($sql_harian)->fetch_assoc()['jumlah_harian'] ?? 0;
                                $jumlah_mingguan = $koneksi->query($sql_mingguan)->fetch_assoc()['jumlah_mingguan'] ?? 0;
                                $jumlah_bulanan = $koneksi->query($sql_bulanan)->fetch_assoc()['jumlah_bulanan'] ?? 0;
                                $jumlah_tahunan = $koneksi->query($sql_tahunan)->fetch_assoc()['jumlah_tahunan'] ?? 0;

                                $result_chart = $koneksi->query($sql_chart);

                                $data_bulan = [];
                                $data_jumlah = [];
                                while ($row = $result_chart->fetch_assoc()) {
                                    $data_bulan[] = $row['bulan'];
                                    $data_jumlah[] = $row['jumlah'];
                                }
                                ?>

                                <table class="table table-border">
                                    <tr>
                                        <th>Periode</th>
                                        <th>Jumlah Kunjungan</th>
                                    </tr>
                                    <tr>
                                        <td>Hari Ini</td>
                                        <td><?= $jumlah_harian; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Minggu Ini</td>
                                        <td><?= $jumlah_mingguan; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bulan Ini</td>
                                        <td><?= $jumlah_bulanan; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tahun Ini</td>
                                        <td><?= $jumlah_tahunan; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- ./col -->

                        <!-- col grafik statistik chart line tahunan -->
                        <div class="col-lg-8 col-8 mb-4">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Line Chart</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col grafik -->
                    </div>
                    <!-- end row-2 -->


                    <!-- Main Row -->
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <span id="tahun"></span> <a href="https://adminlte.io">Siap Layani Lite</a>.</strong>
            All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- custom js -->
    <script>
        const currentDate = new Date();
        const year = currentDate.getFullYear();
        document.getElementById("tahun").innerHTML = year;


        // Data dari PHP
        const labels = [
            "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
        ];

        const dataBulan = <?= json_encode($data_bulan); ?>;
        const dataJumlah = <?= json_encode($data_jumlah); ?>;

        // Menyesuaikan data jumlah kunjungan sesuai bulan
        const jumlahKunjungan = new Array(12).fill(0);
        dataBulan.forEach((bulan, index) => {
            jumlahKunjungan[bulan - 1] = dataJumlah[index];
        });

        // Konfigurasi Chart.js
        const ctx = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: jumlahKunjungan,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    tension: 0.4,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- jQuery -->
    <script src="./assets/vendor/admin-lte/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="./assets/vendor/admin-lte/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="./assets/vendor/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="./assets/vendor/admin-lte/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="./assets/vendor/admin-lte/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="./assets/vendor/admin-lte/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="./assets/vendor/admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="./assets/vendor/admin-lte/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="./assets/vendor/admin-lte/plugins/moment/moment.min.js"></script>
    <script src="./assets/vendor/admin-lte/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="./assets/vendor/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="./assets/vendor/admin-lte/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="./assets/vendor/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./assets/vendor/admin-lte/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="./assets/vendor/admin-lte/dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="./assets/vendor/admin-lte/dist/js/pages/dashboard.js"></script>
</body>

</html>
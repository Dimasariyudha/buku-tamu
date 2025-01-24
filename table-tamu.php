<?php
// Hubungkan ke database
include 'connection.php';

session_start();

if (!isset($_SESSION['jabatan'])) {
    header('Location: login_admin.php');
    exit;
} else {
    // header('Location: table-tamu.php');
}


// Ambil parameter GET untuk filter
$periode = $_GET['periode'] ?? 'all';
$bulan = $_GET['bulan'] ?? 'all';
$tahun = $_GET['tahun'] ?? 'all';

// Bangun query dengan kondisi dinamis
$query = "
    SELECT tamu.id_tamu, tamu.nik, tamu.nama_tamu, tamu.no_hp, tamu.jenis_tamu AS instansi, tamu.keperluan, kunjungan.tanggal_kunjungan 
    FROM tamu
    JOIN kunjungan ON tamu.id_tamu = kunjungan.id_tamu
";

$conditions = [];
if ($periode == 'harian') {
    $conditions[] = "DATE(kunjungan.tanggal_kunjungan) = CURDATE()";
} elseif ($periode == 'mingguan') {
    $conditions[] = "YEARWEEK(kunjungan.tanggal_kunjungan, 1) = YEARWEEK(CURDATE(), 1)";
} elseif ($periode == 'bulanan') {
    if ($bulan != 'all') {
        $conditions[] = "MONTH(kunjungan.tanggal_kunjungan) = $bulan";
    }
    if ($tahun != 'all') {
        $conditions[] = "YEAR(kunjungan.tanggal_kunjungan) = $tahun";
    }
} elseif ($periode == 'tahunan') {
    if ($tahun != 'all') {
        $conditions[] = "YEAR(kunjungan.tanggal_kunjungan) = $tahun";
    }
}

if (!empty($conditions)) {
    $query .= " WHERE " . implode(" AND ", $conditions);
}

// Eksekusi query
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
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-envelope"></i>
                        <span class="badge badge-success navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="./assets/vendor/admin-lte/dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="./assets/vendor/admin-lte/dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="./assets/vendor/admin-lte/dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <?php
                // Hitung jumlah notifikasi baru
                $queryNotifikasi = "SELECT COUNT(*) AS jumlah_notifikasi FROM tamu WHERE status_notifikasi = 1";
                $resultNotifikasi = $koneksi->query($queryNotifikasi);
                $rowNotifikasi = $resultNotifikasi->fetch_assoc();
                $jumlahNotifikasi = $rowNotifikasi['jumlah_notifikasi'];
                ?>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge"><?= $jumlahNotifikasi; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header"><?= $jumlahNotifikasi; ?> Notifikasi</span>
                        <div class="dropdown-divider"></div>

                        <?php
                        // Ambil data notifikasi terbaru
                        $queryDetailNotifikasi = "SELECT nama_tamu, keperluan, tanggal_kunjungan 
                                  FROM tamu 
                                  JOIN kunjungan ON tamu.id_tamu = kunjungan.id_tamu 
                                  WHERE tamu.status_notifikasi = 1 
                                  ORDER BY kunjungan.tanggal_kunjungan DESC 
                                  LIMIT 5";
                        $resultDetail = $koneksi->query($queryDetailNotifikasi);
                        while ($row = $resultDetail->fetch_assoc()) {
                            echo '<a href="#" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> ' . htmlspecialchars($row['nama_tamu']) . '
                    <span class="float-right text-muted text-sm">' . htmlspecialchars($row['tanggal_kunjungan']) . '</span>
                  </a>
                  <div class="dropdown-divider"></div>';
                        }
                        ?>

                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>

                <!-- Profile Dropdown Menu -->
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="./assets/vendor/admin-lte/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2"
                            alt="User Image">
                        <span class="d-none d-md-inline"><?= ucwords($_SESSION['nama']); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="./assets/vendor/admin-lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

                            <p>
                                <?= ucwords($_SESSION['nama']); ?> - <?= $_SESSION['jabatan']; ?>
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                            <a href="./logout.php" class="btn btn-default btn-flat float-right">Sign out</a>
                        </li>
                    </ul>
                </li>
                <!-- /. end Profile Dropdown Menu -->

                <!-- fullscreen-menu -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <!-- /.fullscreen-menu -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="./assets/img/logo-sumut.png" alt="Logo" class="brand-image"
                    style="">
                <span class="brand-text font-weight-light">Siap Layani</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="./assets/vendor/admin-lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <p class="d-block text-white">Selamat Datang</p>
                        <a href="#" class="d-block"><?= ucwords($_SESSION['nama']); ?></a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="./dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">General</li>

                        <?php

                        if (isset($_SESSION['jabatan'])) {
                            if ($_SESSION['jabatan'] == 'Fo' or $_SESSION['jabatan'] == 'FO') {
                        ?>

                                <!-- LINK Layanan -->
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-luggage-cart"></i>
                                        <p>
                                            Layanan
                                        </p>
                                    </a>
                                </li>
                                <!-- END LINK Layanan -->

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>
                                            Tulis Surat
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-header">LAPORAN</li>
                                <li class="nav-item">
                                    <a href="./table-tamu.php" class="nav-link active">
                                        <i class="nav-icon fas fa-user-circle"></i>
                                        <p>Daftar Tamu</p>
                                    </a>
                                </li>

                            <?php } elseif ($_SESSION['jabatan'] == 'Kepala Dinas' || $_SESSION['jabatan'] == 'Sekretaris' || $_SESSION['jabatan'] == 'Kepala Bidang') { ?>

                                <!-- LINK Surat Menyurat -->
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-envelope"></i>
                                        <p>
                                            Surat Menyurat
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Surat Masuk</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-trash-alt nav-icon"></i>
                                                <p>Tong Sampah Surat</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- END LINK Surat Menyurat -->

                                <li class="nav-header">LAPORAN</li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-copy"></i>
                                        <p>Laporan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./table-tamu.php" class="nav-link active">
                                        <i class="nav-icon fas fa-user-circle"></i>
                                        <p>Daftar Tamu</p>
                                    </a>
                                </li>

                            <?php } else { ?>
                                <!-- LINK Surat Menyurat -->
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-envelope"></i>
                                        <p>
                                            Surat Menyurat
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Surat Masuk</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-trash-alt nav-icon"></i>
                                                <p>Tong Sampah Surat</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- END LINK Surat Menyurat -->

                                <li class="nav-header">LAPORAN</li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-copy"></i>
                                        <p>Laporan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./table-tamu.php" class="nav-link active">
                                        <i class="nav-icon fas fa-user-circle"></i>
                                        <p>Daftar Tamu</p>
                                    </a>
                                </li>
                        <?php }
                        } ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
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
                                    <h3 class="card-title">Data Tamu</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Form Filter -->
                                    <form method="GET" action="table-tamu.php">
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <label for="periode">Periode:</label>
                                                <select name="periode" id="periode" class="form-control">
                                                    <option value="all" <?php echo ($periode == 'all') ? 'selected' : ''; ?>>Semua</option>
                                                    <option value="harian" <?php echo ($periode == 'harian') ? 'selected' : ''; ?>>Harian</option>
                                                    <option value="mingguan" <?php echo ($periode == 'mingguan') ? 'selected' : ''; ?>>Mingguan</option>
                                                    <option value="bulanan" <?php echo ($periode == 'bulanan') ? 'selected' : ''; ?>>Bulanan</option>
                                                    <option value="tahunan" <?php echo ($periode == 'tahunan') ? 'selected' : ''; ?>>Tahunan</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="bulan">Bulan:</label>
                                                <select name="bulan" id="bulan" class="form-control">
                                                    <option value="all" <?php echo ($bulan == 'all') ? 'selected' : ''; ?>>Semua</option>
                                                    <?php for ($i = 1; $i <= 12; $i++): ?>
                                                        <option value="<?php echo $i; ?>" <?php echo ($bulan == $i) ? 'selected' : ''; ?>>
                                                            <?php echo date("F", mktime(0, 0, 0, $i, 1)); ?>
                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="tahun">Tahun:</label>
                                                <select name="tahun" id="tahun" class="form-control">
                                                    <option value="all" <?php echo ($tahun == 'all') ? 'selected' : ''; ?>>Semua</option>
                                                    <?php for ($y = date('Y'); $y >= 2000; $y--): ?>
                                                        <option value="<?php echo $y; ?>" <?php echo ($tahun == $y) ? 'selected' : ''; ?>>
                                                            <?php echo $y; ?>
                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3 d-flex align-items-end">
                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Tombol Print dan Export -->
                                    <div class="row mb-3">
                                        <div class="col-1.5">
                                            <a href="print_pdf.php?periode=<?php echo $periode; ?>&bulan=<?php echo $bulan; ?>&tahun=<?php echo $tahun; ?>" class="btn bg-navy color-palette">
                                                <i class="fas fa-file-pdf"></i> Print ke PDF
                                            </a>
                                        </div>
                                        <div class="col-2">
                                            <a href="export_excel.php?periode=<?php echo $periode; ?>&bulan=<?php echo $bulan; ?>&tahun=<?php echo $tahun; ?>" class="btn bg-success color-palette">
                                                <i class="fas fa-file-excel"></i> Export ke Excel
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Tabel Data Tamu -->
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>Nama Tamu</th>
                                                <th>Nomor HP</th>
                                                <th>Instansi</th>
                                                <th>Keperluan</th>
                                                <th>Tanggal & Jam</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Ambil data dari database
                                            $no = 1;
                                            while ($row = $result->fetch_assoc()) {
                                                $idTamu = $row['id_tamu']; // Ambil id_tamu untuk setiap baris data
                                                echo "<tr>";
                                                echo "<td>" . $no++ . "</td>";
                                                echo "<td>" . htmlspecialchars($row['nik']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['nama_tamu']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['no_hp']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['instansi']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['keperluan']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['tanggal_kunjungan']) . "</td>";
                                                echo "<td>
        <a href='lihat-data.php?id_tamu=$idTamu' class='btn btn-info btn-sm'><i class='fas fa-eye'></i> Detail</a>
        <a href='edit-data.php?id_tamu=$idTamu' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i> Edit</a>
        <a href='print-data.php?id_tamu=$idTamu' class='btn bg-navy btn-sm'><i class='fas fa-print'></i> Print</a>
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
    </div>

    <script src="./assets/vendor/admin-lte/plugins/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/vendor/admin-lte/dist/js/adminlte.js"></script>
</body>

</html>
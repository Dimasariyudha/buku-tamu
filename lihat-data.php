<?php
// Hubungkan ke database
include 'connection.php';


session_start();

if (!isset($_SESSION['jabatan'])) {
    header('Location: login_admin.php');
    exit;
}


// Ambil ID tamu dari parameter URL
$id_tamu = $_GET['id_tamu'] ?? null;

if (!$id_tamu) {
    echo "<script>
            alert('ID tamu tidak ditemukan.');
            window.location.href = 'table-tamu.php';
          </script>";
    exit;
}

// Query untuk mengambil data tamu berdasarkan ID
$query = "SELECT tamu.nama_tamu, tamu.no_hp, tamu.keperluan, tamu.jenis_tamu, kunjungan.tanggal_kunjungan 
          FROM tamu
          JOIN kunjungan ON tamu.id_tamu = kunjungan.id_tamu
          WHERE tamu.id_tamu = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $id_tamu);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "<script>
            alert('Data tamu tidak ditemukan.');
            window.location.href = 'table-tamu.php';
          </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Tamu</title>
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
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
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
        <!-- /.sidebar -->

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Detail Data Tamu</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="table-tamu.php">Daftar Tamu</a></li>
                                <li class="breadcrumb-item active">Detail Tamu</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title text-white">Informasi Detail</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nama Tamu</th>
                                    <td><?php echo htmlspecialchars($data['nama_tamu']); ?></td>
                                </tr>
                                <tr>
                                    <th>No HP</th>
                                    <td><?php echo htmlspecialchars($data['no_hp']); ?></td>
                                </tr>
                                <tr>
                                    <th>Keperluan</th>
                                    <td><?php echo htmlspecialchars($data['keperluan']); ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Tamu</th>
                                    <td><?php echo htmlspecialchars($data['jenis_tamu']); ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Kunjungan</th>
                                    <td><?php echo htmlspecialchars(date("d-m-Y H:i:s", strtotime($data['tanggal_kunjungan']))); ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="table-tamu.php" class="btn btn-secondary"><i class="nav-icon fas fa-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Siap Layani
            </div>
            <strong>Copyright &copy; 2025 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- AdminLTE Scripts -->
    <script src="./assets/vendor/admin-lte/plugins/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/vendor/admin-lte/dist/js/adminlte.min.js"></script>
</body>

</html>
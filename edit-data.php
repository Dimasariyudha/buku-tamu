<?php
// Hubungkan ke database
include 'connection.php';

// Ambil ID tamu dari parameter URL
$id_tamu = $_GET['id'] ?? null;

if (!$id_tamu) {
    echo "<script>
            alert('ID tamu tidak ditemukan.');
            window.location.href = 'table-tamu.php';
          </script>";
    exit;
}

// Ambil data tamu untuk diisi ke form
$query = "SELECT * FROM tamu WHERE id_tamu = ?";
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

// Jika form disubmit, update data tamu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_tamu = $_POST['nama_tamu'];
    $no_hp = $_POST['no_hp'];
    $keperluan = $_POST['keperluan'];
    $jenis_tamu = $_POST['jenis_tamu'];

    $queryUpdate = "UPDATE tamu SET nama_tamu = ?, no_hp = ?, keperluan = ?, jenis_tamu = ? WHERE id_tamu = ?";
    $stmtUpdate = $koneksi->prepare($queryUpdate);
    $stmtUpdate->bind_param("ssssi", $nama_tamu, $no_hp, $keperluan, $jenis_tamu, $id_tamu);

    if ($stmtUpdate->execute()) {
        echo "<script>
                alert('Data berhasil diperbarui.');
                window.location.href = 'table-tamu.php';
              </script>";
    } else {
        echo "<script>alert('Gagal memperbarui data.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Tamu</title>
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
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="table-tamu.php" class="nav-link">Kembali ke Daftar Tamu</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary">
            <a href="index3.html" class="brand-link">
                <img src="./assets/img/logo-sumut.png" alt="Logo" class="brand-image img-circle">
                <span class="brand-text font-weight-light">Siap Layani</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column">
                        <li class="nav-item">
                            <a href="./table-tamu.php" class="nav-link active">
                                <i class="nav-icon fas fa-user-circle"></i>
                                <p>Daftar Tamu</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- /.sidebar -->

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Edit Data Tamu</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="table-tamu.php">Daftar Tamu</a></li>
                                <li class="breadcrumb-item active">Edit Data</li>
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
                        <div class="card-header bg-warning">
                            <h3 class="card-title">Form Edit Data Tamu</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label>Nama Tamu:</label>
                                    <input type="text" name="nama_tamu" class="form-control" value="<?php echo htmlspecialchars($data['nama_tamu']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>No HP:</label>
                                    <input type="text" name="no_hp" class="form-control" value="<?php echo htmlspecialchars($data['no_hp']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Keperluan:</label>
                                    <input type="text" name="keperluan" class="form-control" value="<?php echo htmlspecialchars($data['keperluan']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Tamu:</label>
                                    <input type="text" name="jenis_tamu" class="form-control" value="<?php echo htmlspecialchars($data['jenis_tamu']); ?>" required>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="table-tamu.php" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
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

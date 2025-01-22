<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    <link rel="stylesheet" href="./assets/css/login_admin.css">

    <!-- link sweetalert -->
    <link rel="stylesheet" href="./assets/vendor/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="./assets/vendor/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="left-section">
            <img src="assets/img/logopmptsp.png" alt="Logo">
            <h2>Sistem Informasi Buku Tamu</h2>
            <p>Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</p>
            <p>Sumatera Utara</p>
        </div>
        <div class="right-section">
            <h3>Silakan Login Disini!</h3>
            <form method="post" action="./proses_login.php">
                <div class="form-group">
                    <input type="text" placeholder="Enter Username..." name="username" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group remember-me">
                    <input type="checkbox" id="rememberMe" name="remember">
                    <label for="rememberMe">Remember Me</label>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>
        </div>
    </div>

    <!-- SweetAlert Validation -->
    <?php
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: '$error'
            });
        </script>
        ";
    }
    ?>
</body>

</html>
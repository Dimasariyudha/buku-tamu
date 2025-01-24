<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Hash password menggunakan MD5
    $password_hashed = md5($password);

    // Query untuk cek username dan password
    $stmt = $koneksi->prepare("SELECT * FROM user WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if ($password_hashed === $user['password']) {
            // Simpan data ke session
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['jabatan'] = $user['jabatan'];

            // Redirect berdasarkan jabatan
            switch ($user['jabatan']) {
                case 'Fo':
                    header("Location: dashboard.php");
                    break;
                case 'Kepala Dinas':
                    header("Location: dashboard.php");
                    break;
                case 'Sekretaris':
                    header("Location: dashboard.php");
                    break;
                case 'Kepala Bidang':
                    header("Location: dashboard.php");
                    break;
                case 'Staf':
                    header("Location: dashboard.php");
                    break;
                default:
                    header("Location: login.php?error=Unknown Role");
                    break;
            }
            exit;
        } else {
            header("Location: login_admin.php?error=Password yang Anda masukkan salah.");
            exit;
        }
    } else {
        header("Location: login_admin.php?error=Username tidak ditemukan.");
        exit;
    }
} else {
    header("Location: login_admin.php");
    exit;
}

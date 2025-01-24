<?php
// Konfigurasi database
$host     = "localhost"; // Nama host, biasanya "localhost"
$username = "root";      // Nama pengguna database
$password = "";          // Kata sandi database
$dbname   = "buku_tamu"; // Nama database Anda

// Membuat koneksi ke database
$koneksi = new mysqli($host, $username, $password, $dbname);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Jika koneksi berhasil
// echo "Koneksi berhasil!";

// (Opsional) Tutup komentar di bawah untuk menyembunyikan pesan koneksi berhasil
// echo "";

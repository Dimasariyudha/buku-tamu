<?php
include './connection.php';
$queryMarkRead = "UPDATE tamu SET status_notifikasi = 0 WHERE status_notifikasi = 1";
$koneksi->query($queryMarkRead);
echo "Notifikasi ditandai sebagai dibaca.";

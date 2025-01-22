<?php
// Hubungkan ke database
include 'connection.php';

// Ambil filter per hari, bulan, dan tahun dari parameter GET
$hari = $_GET['hari'] ?? 'all';
$bulan = $_GET['bulan'] ?? 'all';
$tahun = $_GET['tahun'] ?? 'all';

// Bangun query untuk data berdasarkan filter
$query = "
    SELECT tamu.nik, tamu.nama_tamu, tamu.no_hp, tamu.jenis_tamu AS instansi, tamu.keperluan, kunjungan.tanggal_kunjungan 
    FROM tamu
    JOIN kunjungan ON tamu.id_tamu = kunjungan.id_tamu
";

// Menambahkan kondisi berdasarkan filter
if ($hari != 'all' || $bulan != 'all' || $tahun != 'all') {
    $conditions = [];
    if ($hari != 'all') {
        $conditions[] = "DAY(kunjungan.tanggal_kunjungan) = ?";
    }
    if ($bulan != 'all') {
        $conditions[] = "MONTH(kunjungan.tanggal_kunjungan) = ?";
    }
    if ($tahun != 'all') {
        $conditions[] = "YEAR(kunjungan.tanggal_kunjungan) = ?";
    }
    $query .= " WHERE " . implode(" AND ", $conditions);
}

// Persiapkan query
$stmt = $koneksi->prepare($query);

// Bind parameter berdasarkan kondisi
if ($hari != 'all' && $bulan != 'all' && $tahun != 'all') {
    $stmt->bind_param("iii", $hari, $bulan, $tahun);
} elseif ($hari != 'all' && $bulan != 'all') {
    $stmt->bind_param("ii", $hari, $bulan);
} elseif ($bulan != 'all' && $tahun != 'all') {
    $stmt->bind_param("ii", $bulan, $tahun);
} elseif ($hari != 'all') {
    $stmt->bind_param("i", $hari);
} elseif ($bulan != 'all') {
    $stmt->bind_param("i", $bulan);
} elseif ($tahun != 'all') {
    $stmt->bind_param("i", $tahun);
}

$stmt->execute();
$result = $stmt->get_result();

// Header untuk file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data_tamu_" . date('Y-m-d') . ".xls");

// Output tabel dalam format HTML untuk Excel
echo "<table border='1'>";
echo "<tr>
        <th>No</th>
        <th>NIK</th>
        <th>Nama Tamu</th>
        <th>Nomor HP</th>
        <th>Instansi</th>
        <th>Keperluan</th>
        <th>Tanggal Kunjungan</th>
      </tr>";

// Isi data ke dalam tabel
$no = 1;
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$no}</td>
            <td>{$row['nik']}</td>
            <td>{$row['nama_tamu']}</td>
            <td>{$row['no_hp']}</td>
            <td>{$row['instansi']}</td>
            <td>{$row['keperluan']}</td>
            <td>{$row['tanggal_kunjungan']}</td>
          </tr>";
    $no++;
}
echo "</table>";

<?php
require_once('./assets/TCPDF/tcpdf.php');
include 'connection.php';

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
$query = "SELECT tamu.nik, tamu.nama_tamu, tamu.no_hp, tamu.keperluan, tamu.jenis_tamu, kunjungan.tanggal_kunjungan 
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

// Buat instance TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Nonaktifkan header dan footer bawaan TCPDF
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Set informasi dokumen
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('DPMPTSP SUMUT');
$pdf->SetTitle('Surat Kunjungan Tamu');
$pdf->SetSubject('Surat Kunjungan Tamu');

// Set margin dan auto page break
$pdf->SetMargins(20, 30, 20);
$pdf->SetAutoPageBreak(TRUE, 25);

// Tambahkan halaman baru
$pdf->AddPage();

// Tambahkan logo
$logo = './assets/img/logo-sumut.png'; // Pastikan file logo ada di direktori ini
$pdf->Image($logo, 20, 10, 25, 30, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

// Tambahkan kop surat
$pdf->SetFont('times', '', 14);
$pdf->SetXY(55, 12);
$pdf->MultiCell(130, 7, 'PEMERINTAH PROVINSI SUMATERA UTARA', 0, 'C', 0, 1);

$pdf->SetFont('times', 'B', 13);
$pdf->SetXY(55, 17);
$pdf->MultiCell(130, 7, 'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU', 0, 'C', 0, 1);

$pdf->SetFont('times', '', 11);
$pdf->SetXY(55, 28);
$pdf->MultiCell(130, 5, 'Jalan K.H. Wahid Hasyim Nomor 8A, Medan, Kode Pos 20154', 0, 'C', 0, 1);
$pdf->SetXY(55, 33);
$pdf->MultiCell(130, 5, 'Telepon (061) 4514616, Faksimile (061) 4572952', 0, 'C', 0, 1);
$pdf->SetXY(55, 38);
$pdf->MultiCell(130, 5, 'Pos-el: dpmpptsp@sumutprov.go.id | Laman: dpmptsp.sumutprov.go.id', 0, 'C', 0, 1);

// Garis pemisah atas dan bawah kop
$pdf->SetLineWidth(1);
$pdf->Line(20, 47, 190, 47); // Garis bawah (lebih tebal)

// Tambahkan nomor surat
$pdf->SetFont('times', '', 12);
$pdf->SetXY(20, 55);
$nomorSurat = <<<EOD
<table>
<tr>
<td width="20%">Nomor</td>
<td>: ...............</td>
</tr>
<tr>
<td>Sifat</td>
<td>: Biasa</td>
</tr>
<tr>
<td>Lampiran</td>
<td>: -</td>
</tr>
<tr>
<td>Perihal</td>
<td>: Kunjungan Tamu</td>
</tr>
</table>
EOD;
$pdf->writeHTML($nomorSurat, true, false, false, false, 'L');

// Tambahkan isi surat
$nik = htmlspecialchars($data['nik']);
$namaTamu = htmlspecialchars($data['nama_tamu']);
$noHp = htmlspecialchars($data['no_hp']);
$keperluan = htmlspecialchars($data['keperluan']);
$tanggal = htmlspecialchars($data['tanggal_kunjungan']);

$isiSurat = <<<EOD
Kepada Yth.<br>
Bagian Administrasi<br>
Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu<br>
di - Tempat<br><br>

Dengan ini disampaikan bahwa pada tanggal <b>$tanggal</b>, telah menerima kunjungan dari:<br><br>

<table border="1" cellpadding="5">
<tr>
<td width="30%"><b>NIK</b></td>
<td>$nik</td>
</tr>
<tr>
<td><b>Nama</b></td>
<td>$namaTamu</td>
</tr>
<tr>
<td><b>No HP</b></td>
<td>$noHp</td>
</tr>
<tr>
<td><b>Keperluan</b></td>
<td>$keperluan</td>
</tr>
<tr>
<td><b>Jenis Tamu</b></td>
<td>{$data['jenis_tamu']}</td>
</tr>
</table>
<br>
<br>
Demikian surat ini dibuat sebagai tanda bukti kunjungan.<br><br>
EOD;
$pdf->SetXY(20, 90);
$pdf->writeHTML($isiSurat, true, false, false, false, 'L');

$ttd = <<<EOD
<br><br><br><br>Medan, ...............<br>
KEPALA DINAS PENANAMAN MODAL DAN <br>
PELAYANAN TERPADU SATU PINTU<br><br><br><br>
<u>Dr. H. Faisal Arif Nasution, S.Sos., M.Si</u><br>
Pembina Utama Madya<br>
NIP. 197402021993031007
EOD;

// Atur posisi semua elemen tanda tangan ke kanan
$pdf->SetFont('times', '', 12); // Pastikan font sesuai
$pdf->writeHTMLCell(0, 0, 99, 175, $ttd, 0, 1, 0, true, 'L', true); // Gunakan writeHTMLCell untuk kontrol penuh

// Output PDF
$pdf->Output("Surat_Kunjungan_$namaTamu.pdf", 'I');

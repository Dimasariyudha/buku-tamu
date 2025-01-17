const pekerjaanSelect = document.getElementById('pekerjaan');
const detailPekerjaan = document.getElementById('detailPekerjaan');
const detailPekerjaanSpesifik = document.getElementById('detailPekerjaanSpesifik');

const keperluanSelect = document.getElementById('keperluan');
const keperluanInput = document.getElementById('keperluanInput');

// ketika pekerjaan di pilih
pekerjaanSelect.addEventListener('change', () => {
    // ambil nilainya kemudian simpan kedalam variable selectedValue
    const selectedValue = pekerjaanSelect.value;

    if (selectedValue === 'PNS') {
        // jika nilainya berupa pns
        detailPekerjaan.style.display = 'block';
        detailPekerjaanSpesifik.style.display = 'none';
        // detailPekerjaanSpesifik.querySelector('input').value = ''; // Kosongkan input spesifik jika sebelumnya diisi

    } else if (selectedValue === 'Lainnya') {
        // jika nilainnya Lainnya, sembunyikan select detail pekerjaan, tampilkan input spesifik
        detailPekerjaan.style.display = 'none';
        detailPekerjaan.querySelector('select').value = ''; // Reset select detail pekerjaan jika sebelumnya diisi

        detailPekerjaanSpesifik.style.display = 'block';
        
    } else {
        // Jika Non PNS atau Mahasiswa dipilih, sembunyikan kedua elemen
        detailPekerjaan.style.display = 'none';
        // detailPekerjaan.querySelector('select').value = ''; // Reset select detail pekerjaan

        detailPekerjaanSpesifik.style.display = 'none';
        // detailPekerjaanSpesifik.querySelector('input').value = ''; // Kosongkan input spesifik
    }
});


// Event listener untuk pilihan keperluan
keperluanSelect.addEventListener('change', function() {
    const selectedValue = keperluanSelect.value; // Nilai yang dipilih
    const keperluanInput = document.getElementById('keperluanInput'); // Elemen detail keperluan

    // Tampilkan input untuk detail keperluan jika pilihan adalah 'Lainnya'
    if (selectedValue === 'Lainnya') {
        // Jika Lainnya dipilih, tampilkan input detail keperluan
        keperluanInput.style.display = 'block';
    } else {
        keperluanInput.querySelector('input').value = ''; // Kosongkan input jika sebelumnya diisi
        keperluanInput.style.display = 'none';
    }
});
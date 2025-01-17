const pekerjaanSelect = document.getElementById('pekerjaan');
const keperluanSelect = document.getElementById('keperluan');

// Fungsi untuk membuat elemen dinamis
function createDynamicElement(target, htmlContent) {
    const newElement = document.createElement('div');
    newElement.classList.add('mb-3');
    newElement.innerHTML = htmlContent;
    target.insertAdjacentElement('afterend', newElement); // Masukkan elemen setelah elemen target
    return newElement;
}

// Fungsi untuk menghapus elemen dinamis jika ada
function removeDynamicElement(element) {
    if (element && element.parentNode) {
        element.parentNode.removeChild(element);
    }
}

// Variabel untuk menyimpan elemen dinamis
let pekerjaanDetailElement = null;
let keperluanDetailElement = null;

// Event listener untuk pekerjaan
pekerjaanSelect.addEventListener('change', () => {
    const selectedValue = pekerjaanSelect.value;

    // Hapus elemen sebelumnya jika ada
    removeDynamicElement(pekerjaanDetailElement);

    if (selectedValue === 'PNS') {
        pekerjaanDetailElement = createDynamicElement(
            pekerjaanSelect,
            `
            <label for="detailPekerjaan" class="form-label">Pilih Detail Pekerjaan Anda</label>
            <select class="form-select" id="detailPekerjaan" name="detail_pekerjaan" required>
                <option value="Kementerian">Kementerian/ Lembaga Pemerintah Non Kementerian</option>
                <option value="OPD Prov Sumut">OPD Prov Sumut</option>
                <option value="OPD Provinsi Lain">OPD Provinsi Lain</option>
            </select>
            `
        );
    } else if (selectedValue === 'Lainnya') {
        pekerjaanDetailElement = createDynamicElement(
            pekerjaanSelect,
            `
            <label for="detailKerjaanLainnya" class="form-label">Masukkan detail pekerjaan Anda</label>
            <input type="text" class="form-control" id="detailKerjaanLainnya" name="detail_pekerjaan_lainnya" placeholder="Masukkan detail pekerjaan Anda...">
            `
        );
    }
});

// Event listener untuk keperluan
keperluanSelect.addEventListener('change', () => {
    const selectedValue = keperluanSelect.value;

    // Hapus elemen sebelumnya jika ada
    removeDynamicElement(keperluanDetailElement);

    if (selectedValue === 'Lainnya') {
        keperluanDetailElement = createDynamicElement(
            keperluanSelect,
            `
            <label for="detailKeperluan" class="form-label">Masukkan detail keperluan Anda</label>
            <input type="text" class="form-control" id="detailKeperluan" name="detail_keperluan" placeholder="Masukkan detail keperluan Anda...">
            `
        );
    }
});

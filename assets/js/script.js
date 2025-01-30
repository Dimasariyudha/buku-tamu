

// pekerjaan select
const pekerjaanSelect = document.getElementById('pekerjaan'); //semua pekerjaan yg ada di form select

// Container untuk menampung pekerjaan yg spesifik dan di inputkan oleh user
const pekerjaanContainer = document.getElementById('pekerjaanInput');


// ketika pekerjaan di pilih
pekerjaanSelect.addEventListener('change', () => {
    // ambil nilainya kemudian simpan kedalam variable selectedValue
    const selectedValue = pekerjaanSelect.value;
    
    // Periksa apakah elemen input sudah ada
    // const existingInputPekerjaanLainnya = pekerjaanContainer.querySelector('input');
    // const existingLabelPekerjaanLainnya = pekerjaanContainer.querySelector('label');

    pekerjaanContainer.innerHTML = "";

    // CEK isi nilai dari pekejeraan yg di pilih
    if (selectedValue === 'ASN') {
        // Buat List Dropdown untuk detail pekerjaan ASN jika di pilih
        const detailASNLabel = document.createElement('label');
        detailASNLabel.textContent = 'Detail Pekerjaan ASN';
        detailASNLabel.className = 'form-label';
        detailASNLabel.setAttribute('for', 'detailASN');

        // form select create
        const detailASNSelect = document.createElement('select');
        detailASNSelect.id = 'detailASN';
        detailASNSelect.name = 'detailASN';
        detailASNSelect.className = 'form-select mb-3';
        detailASNSelect.required = true;
        detailASNSelect.innerHTML = `
            <option value="">Pilih Detail ASN</option>
            <option value="Kementerian/Lembaga Pemerintah Non Kementrian">Kementerian/Lembaga Pemerintah non Kementerian</option>
            <option value="OPD Provinsi Sumut">OPD Provinsi Sumut</option>
            <option value="OPD Provinsi Lain">OPD Provinsi Lain</option>
            <option value="OPD Kabupten/Kota">OPD Kabupaten/Kota</option>
        `;
        
        // Tambahkan ke container
        pekerjaanContainer.appendChild(detailASNLabel);
        pekerjaanContainer.appendChild(detailASNSelect);


         // Event listener untuk opsi detail ASN
        detailASNSelect.addEventListener('change', () => {
            const selectedDetail = detailASNSelect.value;

            // Hapus form tambahan jika ada
            const existingDetailForm = document.getElementById('additionalDetail');
            if (existingDetailForm) existingDetailForm.remove();

            // Jika "OPD Provinsi Lain" atau "OPD Kabupaten/Kota" dipilih, tambahkan input
            if (selectedDetail === 'OPD Provinsi Lain' || selectedDetail === 'OPD Kabupten/Kota') {
                // Buat input tambahan untuk detail tertentu
                const additionalDetailLabel = document.createElement('label');
                additionalDetailLabel.textContent = selectedDetail === 'OPD Provinsi Lain' 
                ? 'Masukkan Nama OPD Provinsi Lain' 
                    : 'Masukkan Nama OPD Kabupaten/Kota';
                additionalDetailLabel.className = 'form-label';
                additionalDetailLabel.setAttribute('for', 'additionalDetail');

                const additionalDetailInput = document.createElement('input');
                additionalDetailInput.id = 'additionalDetail';
                additionalDetailInput.type = 'text';
                additionalDetailInput.name = 'additionalDetail';
                additionalDetailInput.required = true;
                additionalDetailInput.classList.add('form-control', 'mb-3')

                // Tambahkan ke container
                pekerjaanContainer.appendChild(additionalDetailLabel);
                pekerjaanContainer.appendChild(additionalDetailInput);
            }
        });

        
    } else if (selectedValue === 'Pelaku Usaha') {
        // Jika pekerjaan "Pelaku Usaha" dipilih tampilkan nama usaha dan jabatan pelaku usaha
        const fields = [
            { label: "Jenis Usaha", id: "jenisUsaha", placeholder: "Masukkan jenis usaha..." },
            { label: "Nama Usaha", id: "namaUsaha", placeholder: "Masukkan nama usaha..." },
            { label: "Jabatan", id: "jabatanUsaha", placeholder: "Masukkan jabatan..." }
        ];

        // looping untuk membuat element label dan form input
        fields.forEach(field => {
            const label = document.createElement('label');
            label.for = field.id;
            label.innerText = field.label;
            label.classList.add('form-label');

            const input = document.createElement('input');
            input.type = 'text';
            input.name = field.id;
            input.id = field.id;
            input.placeholder = field.placeholder;
            input.required = true;
            input.classList.add('form-control', 'mb-3');

            pekerjaanContainer.appendChild(label);
            pekerjaanContainer.appendChild(input);
        });

    }else if (selectedValue === 'Lainnya') {
        // Jika user memilih pekerjaannya 'Lainnya' maka akan muncul form input pekerjaan lainnya yg dapat di isi oleh user
        
        // element label
            const label = document.createElement('label');
            label.for = 'detailPekerjaanLainnya';
            label.innerText = 'Detail Pekerjaan';
            label.classList.add('form-label'); // Styling tambahan untuk margin atas
            
            // elemet input
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'detailPekerjaanLainnya';
            input.id = 'detailPekerjaanLainnya';
            input.placeholder = 'Masukkan detail pekerjaan anda...';
            input.required = true;
            input.classList.add('form-control')
            // Tambahkan label dan input ke dalam container
            pekerjaanContainer.appendChild(label);
            pekerjaanContainer.appendChild(input);

        
    } else {
        // Jika tidak ada yang dipilih

    }
});


const keperluanSelect = document.getElementById('keperluan'); // ambil id Keperluan select dan simpan pada variable keperluan select
const detailKeperluan = document.getElementById('detailKeperluan'); // Container untuk input detail keperluan

// Event listener untuk pilihan keperluan
keperluanSelect.addEventListener('change', function() {
    const selectedKeperluanValue = keperluanSelect.value; // Nilai yang dipilih

    // buat variable existingInput untuk menyimpan apakah element input & label sudah ada
    const existingInput = detailKeperluan.querySelector('input');
    const existingLabel = detailKeperluan.querySelector('label');
    
    if (selectedKeperluanValue === 'Lainnya') {
        // Jika 'Lainnya' dipilih dan form input belum ada, buat elemen input dan label
        if (!existingInput && !existingLabel) {
            // elemen label form
            const label = document.createElement('label');
            label.for = 'detailKeperluan';
            label.innerText = 'Detail Keperluan';
            label.classList.add('form-label');

            // element input form
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'detailKeperluan';
            input.placeholder = 'Masukkan detail keperluan....';
            input.required = true;
            input.classList.add('form-control');

            //Tambahkan input dan label kedalam container detail keperluan
            detailKeperluan.appendChild(label);
            detailKeperluan.appendChild(input); 

        }
    } else {
        // Jika pilihan berubah dan tidak milih option Lainnya, hapus element label dan input keperluan detail
        if (existingInput && existingLabel) {
            detailKeperluan.removeChild(existingLabel);
            detailKeperluan.removeChild(existingInput);
        }
    }
});

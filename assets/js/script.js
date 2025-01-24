
const steps = document.querySelectorAll('.form-step');
    const stepIndicators = document.querySelectorAll('.step-indicator .step');
    const lines = document.querySelectorAll('.step-indicator .line');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    const submitButton = document.getElementById('submitButton');
    let currentStep = 0;

    function updateStep() {
        steps.forEach((step, index) => {
            step.classList.toggle('d-none', index !== currentStep);
            stepIndicators[index].classList.toggle('active', index <= currentStep);
            if (index < lines.length) {
                lines[index].classList.toggle('active', index < currentStep);
            }
        });

        prevButton.disabled = currentStep === 0;
        nextButton.classList.toggle('d-none', currentStep === steps.length - 1);
        submitButton.classList.toggle('d-none', currentStep !== steps.length - 1);
    }

    prevButton.addEventListener('click', () => {
        if (currentStep > 0) {
            currentStep--;
            updateStep();
        }
    });

    nextButton.addEventListener('click', () => {
        if (currentStep < steps.length - 1) {
            currentStep++;
            updateStep();
        }
    });

    updateStep();
    

// pekerjaan select
const pekerjaanSelect = document.getElementById('pekerjaan'); //semua pekerjaan yg ada di form select

const detailPekerjaanASN = document.getElementById('detailPekerjaan'); // detail pekerjaan container untuk asn/pns

const detailPekerjaanSelectASN = document.getElementById('detailPekerjaanSelectASN'); // Mengambil nilai yg ada pada form select detail pekerjaan ASN

// detail ASN dari opd provinsi 
const detailOPD_provinsi_lain = document.getElementById('detailOPD_provinsi_lain');

// detail ASN dari opd kabupaten kota
const detailOPD_kabupaten_kota = document.getElementById('detailOPD_kabupaten_kota');

const detailPekerjaanLainnyaSpesifik = document.getElementById('detailPekerjaanSpesifik'); //form input detail pekerjaan spesifik yg memilih lainnya

// pelaku usaha
const namaUsaha = document.getElementById('namaUsahaPelakuUsaha'); // form input untuk jenis usahanya
const jabatanPelakuUsaha = document.getElementById('jabatanPelakuUsaha'); // form input jabatan usaha

// keperluan
const keperluanSelect = document.getElementById('keperluan');
const keperluanInput = document.getElementById('keperluanInput');


// ketika pekerjaan di pilih
pekerjaanSelect.addEventListener('change', () => {
    // ambil nilainya kemudian simpan kedalam variable selectedValue
    const selectedValue = pekerjaanSelect.value;
    
    // CEK isi nilai dari pekejeraan yg di pilih
    if (selectedValue === 'ASN') {
        // jika nilainya berupa ASN
        detailPekerjaanASN.style.display = 'block'; // tampilkan detail pekerjaan select untuk ASN
        detailPekerjaanLainnyaSpesifik.style.display = 'none'; //hilangkan form input pekerjaan untuk lainnya
        // detailPekerjaanLainnyaSpesifik.querySelector('input').value = ''; // Kosongkan input spesifik jika sebelumnya diisi


        // ketika detail pekerjaan ASN di pilih
        detailPekerjaanSelectASN.addEventListener('change', () => {
            const selectedDetailASN = detailPekerjaanSelectASN.value;
            
            // lakukan pengecekan bedasarkan pilihan detail anda Sebagai ASN
            if (selectedDetailASN === 'OPD Provinsi Lain') {
                detailOPD_provinsi_lain.style.display = 'block';
                detailOPD_kabupaten_kota.style.display = 'none';
                
            } else if (selectedDetailASN === 'OPD Kabupaten/Kota') {
                detailOPD_kabupaten_kota.style.display = 'block';
                detailOPD_provinsi_lain.style.display = 'none';
            }
        });

        //hilangkan nama usasha dan jabatan dari pelaku usaha
        namaUsaha.style.display = 'none'; 
        jabatanPelakuUsaha.style.display = 'none';
        
    } else if (selectedValue === 'Pelaku Usaha') {
        // tampilkan nama usaha dan jabatan pelaku usaha
        namaUsaha.style.display = 'block';
        jabatanPelakuUsaha.style.display = 'block';

        // hilangkan form select pekerjaan ASN dan hilangkan form input pekerjaan 'lainnya' 
        detailPekerjaanASN.style.display = 'none';
        detailPekerjaanLainnyaSpesifik.style.display = 'none';
    }
    
    else if (selectedValue === 'Lainnya') {
        // jika nilainnya Lainnya (pekerjaan), sembunyikan select detail pekerjaan untuk asn, tampilkan form input spesifik
        detailPekerjaanASN.style.display = 'none';
        detailPekerjaanASN.querySelector('select').value = ''; // Reset select detail pekerjaan jika sebelumnya diisi

        detailPekerjaanLainnyaSpesifik.style.display = 'block'; //tampilkan form input detail pekerjaan spesifik lainnya
        
        //hilangkan nama usasha dan jabatan dari pelaku usaha
        namaUsaha.style.display = 'none'; 
        jabatanPelakuUsaha.style.display = 'none';
    } else {
        // Jika Non PNS atau pelaku usaha dipilih, sembunyikan kedua elemen
        detailPekerjaanASN.style.display = 'none';
        // detailPekerjaan.querySelector('select').value = ''; // Reset select detail pekerjaan

        detailPekerjaanLainnyaSpesifik.style.display = 'none';
        
        //hilangkan nama usasha dan jabatan dari pelaku usaha
        namaUsaha.style.display = 'none'; 
        jabatanPelakuUsaha.style.display = 'none';
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

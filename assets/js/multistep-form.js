// const steps = document.querySelectorAll('.form-step');
//     const stepIndicators = document.querySelectorAll('.step-indicator .step');
//     const lines = document.querySelectorAll('.step-indicator .line');
//     const prevButton = document.getElementById('prevButton');
//     const nextButton = document.getElementById('nextButton');
//     const submitButton = document.getElementById('submitButton');
//     let currentStep = 0;

//     function updateStep() {
//         steps.forEach((step, index) => {
//             step.classList.toggle('d-none', index !== currentStep);
//             stepIndicators[index].classList.toggle('active', index <= currentStep);
//             if (index < lines.length) {
//                 lines[index].classList.toggle('active', index < currentStep);
//             }
//         });

//         prevButton.disabled = currentStep === 0;
//         nextButton.classList.toggle('d-none', currentStep === steps.length - 1);
//         submitButton.classList.toggle('d-none', currentStep !== steps.length - 1);
//     }

//     prevButton.addEventListener('click', () => {
//         if (currentStep > 0) {
//             currentStep--;
//             updateStep();
//         }
//     });

//     nextButton.addEventListener('click', () => {
//         if (currentStep < steps.length - 1) {
//             currentStep++;
//             updateStep();
//         }
//     });

//     updateStep();

const steps = document.querySelectorAll('.form-step');
const stepIndicators = document.querySelectorAll('.step-indicator .step');
const lines = document.querySelectorAll('.step-indicator .line');
const prevButton = document.getElementById('prevButton');
const nextButton = document.getElementById('nextButton');
const submitButton = document.getElementById('submitButton');
let currentStep = 0;

// Fungsi untuk memperbarui tampilan step
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

function validateCurrentStep() {
    const inputs = steps[currentStep].querySelectorAll('input, select, textarea');
    let isValid = true;

    inputs.forEach((input) => {
        const errorMessage = input.nextElementSibling;
        if (!input.checkValidity()) {
            isValid = false;

            // Tampilkan pesan kesalahan
            if (errorMessage && errorMessage.classList.contains('error-message')) {
                errorMessage.textContent = input.validationMessage;
            } else {
                const errorSpan = document.createElement('span');
                errorSpan.classList.add('error-message', 'text-danger' , 'mb-2');
                errorSpan.textContent = input.validationMessage;
                input.parentNode.appendChild(errorSpan);
            }
        } else {
            // Hapus pesan kesalahan jika input valid
            if (errorMessage && errorMessage.classList.contains('error-message')) {
                errorMessage.textContent = '';
            }
        }
    });

    return isValid;
}

// Event listener untuk tombol Previous
prevButton.addEventListener('click', () => {
    if (currentStep > 0) {
        currentStep--;
        updateStep();
    }
});

// Event listener untuk tombol Next
nextButton.addEventListener('click', () => {
    if (validateCurrentStep()) {
        if (currentStep < steps.length - 1) {
            currentStep++;
            updateStep();
        }
    }
});

// Event listener untuk tombol Submit
submitButton.addEventListener('click', (e) => {
    if (!validateCurrentStep()) {
        e.preventDefault(); // Mencegah pengiriman form jika validasi gagal
    }
});

// Inisialisasi step pertama
updateStep();

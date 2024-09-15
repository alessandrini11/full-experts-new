const steps = document.querySelectorAll('.step');
        const stepContents = document.querySelectorAll('.step-content');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const progressBarInner = document.querySelector('.progress-bar-inner');
        const uploadContainer = document.getElementById('uploadContainer');
        let currentStep = 0;
    
        function showStep(stepIndex) {
            steps.forEach((step, index) => {
                step.classList.remove('active', 'completed');
                if (index < stepIndex) {
                    step.classList.add('completed');
                } else if (index === stepIndex) {
                    step.classList.add('active');
                }
            });
    
            stepContents.forEach((content, index) => {
                content.classList.remove('active');
                if (index === stepIndex) {
                    content.classList.add('active');
                }
            });
    
            progressBarInner.style.width = ((stepIndex + 1) / steps.length) * 100 + '%';
    
            prevBtn.disabled = stepIndex === 0;
            nextBtn.textContent = stepIndex === steps.length - 1 ? 'Submit' : 'Next';
        }
    
        function validateForm() {
            let isValid = true;
    
            if (currentStep === 0) {
                const location = document.getElementById('location').value.trim();
                if (!location) {
                    const locationError = document.getElementById('location-error');
                    locationError.style.display = 'block';
                    locationError.style.animation = 'shake 0.3s ease';
                    setTimeout(() => locationError.style.animation = '', 300);
                    isValid = false;
                } else {
                    document.getElementById('location-error').style.display = 'none';
                }
            } else if (currentStep === 1) {
                const roles = document.getElementById('roles').value.trim();
                if (!roles) {
                    const rolesError = document.getElementById('roles-error');
                    rolesError.style.display = 'block';
                    rolesError.style.animation = 'shake 0.3s ease';
                    setTimeout(() => rolesError.style.animation = '', 300);
                    isValid = false;
                } else {
                    document.getElementById('roles-error').style.display = 'none';
                }
            } else if (currentStep === 2) {
                const name = document.getElementById('name').value.trim();
                const email = document.getElementById('email').value.trim();
                const phone = document.getElementById('phone').value.trim();
                const address = document.getElementById('address').value.trim();
                if (!name) {
                    const nameError = document.getElementById('name-error');
                    nameError.style.display = 'block';
                    nameError.style.animation = 'shake 0.3s ease';
                    setTimeout(() => nameError.style.animation = '', 300);
                    isValid = false;
                } else {
                    document.getElementById('name-error').style.display = 'none';
                }
                if (!email) {
                    const emailError = document.getElementById('email-error');
                    emailError.style.display = 'block';
                    emailError.style.animation = 'shake 0.3s ease';
                    setTimeout(() => emailError.style.animation = '', 300);
                    isValid = false;
                } else {
                    document.getElementById('email-error').style.display = 'none';
                }
                if (!phone || !/^\d{10,15}$/.test(phone)) {
                    const phoneError = document.getElementById('phone-error');
                    phoneError.style.display = 'block';
                    phoneError.style.animation = 'shake 0.3s ease';
                    setTimeout(() => phoneError.style.animation = '', 300);
                    isValid = false;
                } else {
                    document.getElementById('phone-error').style.display = 'none';
                }
                if (!address) {
                    const addressError = document.getElementById('address-error');
                    addressError.style.display = 'block';
                    addressError.style.animation = 'shake 0.3s ease';
                    setTimeout(() => addressError.style.animation = '', 300);
                    isValid = false;
                } else {
                    document.getElementById('address-error').style.display = 'none';
                }
    
                const validFileTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                const fileError = document.getElementById('file-error');
                if (!uploadedFile || !validFileTypes.includes(uploadedFile.type)) {
                    fileError.style.display = 'block';
                    fileError.style.animation = 'shake 0.3s ease';
                    setTimeout(() => fileError.style.animation = '', 300);
                    isValid = false;
                } else {
                    fileError.style.display = 'none';
                }
            }
    
            return isValid;
        }
    
        nextBtn.addEventListener('click', () => {
            if (validateForm()) {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                } else {
                    alert('Form submitted successfully!');
                }
            }
        });
    
        prevBtn.addEventListener('click', () => {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });
    
        let uploadedFile;
        uploadContainer.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadContainer.style.backgroundColor = 'rgba(255, 255, 255, 0.2)';
        });
    
        uploadContainer.addEventListener('dragleave', () => {
            uploadContainer.style.backgroundColor = 'transparent';
        });
    
        uploadContainer.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadedFile = e.dataTransfer.files[0];
            uploadContainer.style.backgroundColor = 'transparent';
            validateForm();
        });
    
        uploadContainer.addEventListener('click', () => {
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = '.pdf,.doc,.docx';
            fileInput.addEventListener('change', () => {
                uploadedFile = fileInput.files[0];
                validateForm();
            });
            fileInput.click();
        });
    
        showStep(currentStep);
    
        // Ajout de l'événement clic pour remplir les champs de texte avec les suggestions
        document.querySelectorAll('.suggestion-button').forEach(button => {
            button.addEventListener('click', () => {
                const input = button.closest('.step-content').querySelector('input[type="text"]');
                input.value = button.textContent;
            });
        });
document.getElementById('openFormBtn').addEventListener('click', function() {
    document.getElementById('popupForm').classList.add('active');
});

document.getElementById('popupForm').addEventListener('click', function(event) {
    if (event.target === this) {
        this.classList.remove('active');
    }
});


function nextStep(step) {
    document.querySelector('.step-content.active').classList.remove('active');
    document.querySelector('.step.active').classList.remove('active');
    
    document.getElementById('step' + step).classList.add('active');
    document.querySelectorAll('.step')[step - 1].classList.add('active');
}

function prevStep(step) {
    nextStep(step);
}

document.getElementById('expertiseForm').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Formulaire soumis !');
    // Ici, vous pouvez ajouter du code pour traiter les données du formulaire
});

// Récupérer les éléments
const openFormBtn = document.getElementById('openFormBtn');
const popup = document.getElementById('myPopup');
const closeBtn = document.querySelector('.close-btn');

// Ouvrir le popup lorsque l'utilisateur clique sur le bouton
openFormBtn.addEventListener('click', function(event) {
    event.preventDefault(); // Empêche le lien de rediriger
    popup.style.display = 'block';
});

// Fermer le popup lorsque l'utilisateur clique sur le bouton de fermeture
closeBtn.addEventListener('click', function() {
    popup.style.display = 'none';
});

// Fermer le popup lorsque l'utilisateur clique en dehors de celui-ci
window.addEventListener('click', function(event) {
    if (event.target == popup) {
        popup.style.display = 'none';
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
});









// Récupérer les éléments
const openFormBtn = document.getElementById('openFormBtn');
const popup = document.getElementById('popupConatain');
const closeBtn = document.querySelector('.close-btn');
const form = document.getElementById('expertiseForm');
const confirmationPopup = document.getElementById('confirmationPopup');
const closeConfirmationBtn = document.getElementById('closeConfirmation');

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

// Gestion du formulaire et affichage du popup de confirmation
form.addEventListener('submit', function(event) {
    event.preventDefault();

    // Fermer le premier popup
    popup.style.display = 'none';

    // Afficher le popup de confirmation
    confirmationPopup.style.display = 'block';
});

// Fermer le popup de confirmation
closeConfirmationBtn.addEventListener('click', function() {
    confirmationPopup.style.display = 'none';
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
    // Ici, vous pouvez ajouter du code pour traiter les données du formulaire
});









//=================================== etre contacter ==========================//

document.getElementById("openPopupBtn2").addEventListener("click", function() {
    document.getElementById("popupForm").style.display = "flex";
});

document.getElementById("popupForm").addEventListener("click", function(event) {
    if (event.target === this) {
        this.style.display = "none";
    }
});


document.addEventListener("DOMContentLoaded", function () {
    const formSteps = document.querySelectorAll(".form-step");
    const nextButtons = document.querySelectorAll(".btn-next");
    const previousButtons = document.querySelectorAll(".btn-previous");
    // const progressBar = document.getElementById('progress-bar');
    const stepCircles = document.querySelectorAll('.step-circle');
    let currentStep = 0;

     // Afficher la première étape du formulaire
     formSteps[currentStep].classList.add('actives');
     updateStepIndicator();

    nextButtons.forEach(button => {
        button.addEventListener("click", () => {
            formSteps[currentStep].classList.remove("form-step-actives");
            currentStep++;
            formSteps[currentStep].classList.add("form-step-actives");
            //updateProgressBar();
            updateStepIndicator();
        });
    });

    previousButtons.forEach(button => {
        button.addEventListener("click", () => {
            formSteps[currentStep].classList.remove("form-step-actives");
            currentStep--;
            formSteps[currentStep].classList.add("form-step-actives");
           // updateProgressBar();
            updateStepIndicator();
        });
    });

    // function updateProgressBar() {
    //     const progress = (currentStep / (formSteps.length - 1)) * 100;
    //     progressBar.style.width = `${progress}%`;
    // }

    function updateStepIndicator() {
        stepCircles.forEach((circle, index) => {
            if (index < currentStep) {
                circle.classList.add('completed');
            } else {
                circle.classList.remove('completed');
            }

            if (index === currentStep) {
                circle.classList.add('actives');
            } else {
                circle.classList.remove('actives');
            }
        });
    }

    const form = document.getElementById("multiStepForm");
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        alert("Form submitted!");
    });
});



//=======================Menu BURGER =============================//
document.querySelector('.hamburger').addEventListener('click', function() {
    this.classList.toggle('active');
    document.querySelector('.hamburger-menu').classList.add('active');
});


document.querySelector('.close-hamburger').addEventListener('click', function() {
    this.classList.toggle('active');
    document.querySelector('.hamburger-menu').classList.remove('active');
});





//============================ Animation Scroll =================================//

document.addEventListener('DOMContentLoaded', function () {
    const elements = document.querySelectorAll('.animate-on-scroll');

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, {
      threshold: 0.1
    });

    elements.forEach(element => {
      observer.observe(element);
    });
  });



  function toggleDropdown() {
    const dropdown = document.getElementById("myDropdown");
    dropdown.classList.toggle("activ");
}
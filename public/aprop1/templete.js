//=======================Menu BURGER =============================//
document.querySelector('.hamburger').addEventListener('click', function() {
    this.classList.toggle('active');
    document.querySelector('.hamburger-menu').classList.add('active');
});


document.querySelector('.close-hamburger').addEventListener('click', function() {
    this.classList.toggle('active');
    document.querySelector('.hamburger-menu').classList.remove('active');
});


function toggleDropdown() {
    const dropdown = document.getElementById("myDropdown");
    dropdown.classList.toggle("activ");
}



//=================================== etre contacter ==========================//

document.getElementById("openPopupBtn2").addEventListener("click", function() {
    document.getElementById("popupForm").style.display = "flex";
});

document.getElementById('openPopupBtn1').addEventListener('click', function() {
    document.getElementById('popupForm').style.display = 'flex';
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


  /*=============================== Mentions legales/CGV/COOKIES=================================== */
function openPopup(popupId) {
    document.getElementById(popupId).style.display = 'flex';
}

// Fonction pour fermer un popup spécifique
function closePopup(popupId) {
    document.getElementById(popupId).style.display = 'none';
}

// Ajouter des écouteurs d'événements pour ouvrir les popups
document.getElementById('legales').addEventListener('click',()=>openPopup('popup1'))
document.getElementById('cookies').addEventListener('click',()=>openPopup('popup2'))
document.getElementById('cgv').addEventListener('click',()=>openPopup('popup3'))

document.getElementById("popup1").addEventListener("click", function(event) {
    if (event.target === this) {
        this.style.display = "none";
    }
});

document.getElementById("popup2").addEventListener("click", function(event) {
    if (event.target === this) {
        this.style.display = "none";
    }
});

document.getElementById("popup3").addEventListener("click", function(event) {
    if (event.target === this) {
        this.style.display = "none";
    }
});
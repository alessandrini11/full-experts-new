//================= FORMS SERVICES ====================//
//================= FORMS SERVICES ====================//

document.addEventListener('DOMContentLoaded', () => {
    const moreButtons = document.querySelectorAll('.boxxx');
    const closeButtons = document.querySelectorAll('.close-form');

    // Afficher le formulaire correspondant au clic sur "More"
    moreButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Cacher tous les formulaires
            document.querySelectorAll('.modal-form').forEach(form => {
                form.style.display = 'none';
            });

            // Montrer le formulaire ciblé
            const targetId = button.getAttribute('data-target');
            document.querySelector(targetId).style.display = 'block';
        });
    });

    // Fermer le formulaire lorsqu'on clique sur "Fermer"
    closeButtons.forEach(button => {
        button.addEventListener('click', () => {
            button.closest('.modal-form').style.display = 'none';
        });
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



//============================ SERVICES ANIMATION =================================//

document.addEventListener("DOMContentLoaded", function() {
    const readMoreButtons = document.querySelectorAll('.read-more-btn');

    readMoreButtons.forEach(button => {
        button.addEventListener('click', function() {
            const description = this.previousElementSibling;
            
            if (description.classList.contains('show-full')) {
                description.classList.remove('show-full');
                this.textContent = 'Lire la suite';
            } else {
                description.classList.add('show-full');
                this.textContent = 'Lire moins';
            }
        });
    });

    // Observer for triggering animations on scroll
    const serviceCards = document.querySelectorAll('.service-card');

    const observerOptions = {
        threshold: 0.4  // Trigger when at least 10% of the card is visible
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible'); // Apply the animation class when the card is visible
                observer.unobserve(entry.target); // Stop observing once the animation has been triggered
            }
        });
    }, observerOptions);

    serviceCards.forEach(card => {
        observer.observe(card); // Start observing each service card
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
document.getElementById('legales').addEventListener('click',()=>{openPopup('popup1')})
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
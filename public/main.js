// Récupérer les éléments
const openFormBtn = document.getElementById('openFormBtn');
const popup = document.getElementById('popupConatain');
const closeBtn = document.querySelector('.close-btn');
const form = document.getElementById('expertise-Form');
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

// // Gestion du formulaire et affichage du popup de confirmation
// //form.addEventListener('submit', function(event) {
//     event.preventDefault();

//     // Fermer le premier popup
//     popup.style.display = 'none';

//     // Afficher le popup de confirmation
//     confirmationPopup.style.display = 'block';
// });

// // Fermer le popup de confirmation
// closeConfirmationBtn.addEventListener('click', function() {
//     confirmationPopup.style.display = 'none';
// });

















//=================================== Integrer contacter ==========================//

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




// text animation =============================================
document.addEventListener("DOMContentLoaded", function() {
    const textElement = document.getElementById("typewriter-text");

    // Create the IntersectionObserver
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Start typing animation when element is in view
                textElement.classList.add("animate-typing");
                observer.unobserve(textElement); // Stop observing after animation starts

                // Ajouter un écouteur pour la fin de l'animation
                textElement.addEventListener('animationend', () => {
                    textElement.classList.add("hide-cursor"); // Masquer le curseur
                });
            }
        });
    }, {
        threshold: 0.5 // Trigger when 50% of the element is visible
    });

    // Observe the text element
    observer.observe(textElement);
});



// animation one ===========================================================
document.addEventListener('DOMContentLoaded', () => {
    // Function to handle scrolling and add animation classes
    const handleScroll = (selector, animationClass) => {
        let elements = document.querySelectorAll(selector);

        elements.forEach((element) => {
            let top = window.scrollY;
            let offset = element.offsetTop - window.innerHeight + 150;
            let height = element.offsetHeight;

            if (top >= offset && top < offset + height) {
                element.classList.add(animationClass);
            } else {
                element.classList.remove(animationClass);
            }
        });
    };

    // Listen to the scroll event
    window.addEventListener('scroll', () => {
        handleScroll('.value', 'show-animate-3'); // Animate the .values section
        handleScroll('.service-item', 'show-animate'); // Animate the .service-item section
    });

    // Trigger the animations on page load in case any sections are already visible
    handleScroll('.value', 'show-animate-3');
    handleScroll('.service-item', 'show-animate');
})






/*====================================== Video ================================*/

// 1. Initialisation des éléments
let listVideo = document.querySelectorAll('.video-list .vid');
let mainVideo = document.querySelector('.main-video video');
let mainImage = document.createElement('img'); // Créer un élément img pour les images
let progressBarContainer = document.querySelector('.progress-bar-container');
let progressBar = document.querySelector('.progress-bar');
let currentIndex = 0; // Index actuel dans la liste
let imageTimeout; // Stocker le timeout pour l'image
let progressBarInterval; // Stocker l'intervalle de progression de la barre

// Ajouter l'image dans la section main-video
mainImage.style.display = 'none'; // Cachée par défaut
document.querySelector('.main-video').appendChild(mainImage);

// 2. Fonction pour jouer ou afficher l'élément courant (vidéo ou image)
function playElementAt(index) {
    let currentElement = listVideo[index].children[0]; // Récupérer l'image ou la vidéo

    stopCurrentElement(); // Arrêter la vidéo ou l'image en cours avant de passer à un nouvel élément

    if (currentElement.tagName.toLowerCase() === 'video') {
        // Si c'est une vidéo
        playVideo(currentElement);
    } else if (currentElement.tagName.toLowerCase() === 'img') {
        // Si c'est une image
        playImage(currentElement);
    }

    // Mettre à jour le titre
    let text = listVideo[index].children[1].innerHTML;


    // Mettre à jour la classe active
    listVideo.forEach(vid => vid.classList.remove('activess'));
    listVideo[index].classList.add('activess');
}

// 2.1 Fonction pour jouer une vidéo
function playVideo(videoElement) {
    mainImage.style.display = 'none'; // Cacher l'image
    mainVideo.style.display = 'block'; // Afficher la vidéo
    progressBarContainer.style.display = 'none'; // Cacher la barre de progression pour les vidéos

    let src = videoElement.getAttribute('src');
    mainVideo.src = src;
    mainVideo.play();

    mainVideo.onended = () => {
        // Passer à l'élément suivant lorsque la vidéo se termine
        currentIndex = (currentIndex + 1) % listVideo.length;
        playElementAt(currentIndex);
    };
}

// 2.2 Fonction pour afficher une image avec la barre de progression
function playImage(imageElement) {
    mainVideo.style.display = 'none'; // Cacher la vidéo
    mainImage.style.display = 'block'; // Afficher l'image
    progressBarContainer.style.display = 'block'; // Afficher la barre de progression pour les images

    let src = imageElement.getAttribute('src');
    mainImage.src = src;

    let duration = 5000; // 5 secondes pour afficher l'image
    let startTime = Date.now();
    progressBar.style.width = '0%'; // Réinitialiser la barre

    // Simuler la progression de la barre
    progressBarInterval = setInterval(() => {
        let elapsedTime = Date.now() - startTime;
        let progressPercentage = (elapsedTime / duration) * 100;
        if (progressPercentage >= 100) {
            progressPercentage = 100;
            clearInterval(progressBarInterval);
        }
        progressBar.style.width = progressPercentage + '%';
    }, 100); // Mettre à jour toutes les 100 ms

    // Passer à l'élément suivant après 5 secondes
    imageTimeout = setTimeout(() => {
        currentIndex = (currentIndex + 1) % listVideo.length;
        playElementAt(currentIndex);
    }, duration);
}

// 2.3 Fonction pour arrêter la lecture de l'élément en cours (vidéo ou image)
function stopCurrentElement() {
    // Arrêter la vidéo en cours si c'est une vidéo
    if (mainVideo.style.display === 'block') {
        mainVideo.pause(); // Arrêter la vidéo
        mainVideo.currentTime = 0; // Remettre à zéro
    }

    // Annuler le timeout et l'intervalle de la barre de progression si c'est une image
    clearTimeout(imageTimeout);
    clearInterval(progressBarInterval);
    progressBar.style.width = '0%'; // Réinitialiser la barre de progression
}


// 4. Fonction pour jouer toutes les vidéos/images en boucle
function playAllVideos() {
    currentIndex = 0; // Commencer par la première vidéo ou image
    playElementAt(currentIndex); // Démarrer la lecture en boucle
}




// 7. Démarrer la lecture avec le premier élément au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
    playElementAt(currentIndex); // Démarrer automatiquement la première vidéo/image
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




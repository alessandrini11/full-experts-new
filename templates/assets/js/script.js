'use strict';



/**
 * add Event on elements
 */

const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}



/**
 * navbar toggle
 */

const navbar = document.querySelector("[data-navbar]");
const navTogglers = document.querySelectorAll("[data-nav-toggler]");
const navbarLinks = document.querySelectorAll("[data-nav-link]");
const overlay = document.querySelector("[data-overlay]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  overlay.classList.toggle("active");
}

addEventOnElem(navTogglers, "click", toggleNavbar);

const closeNavbar = function () {
  navbar.classList.remove("active");
  overlay.classList.remove("active");
}

addEventOnElem(navbarLinks, "click", closeNavbar);



/**
 * header & back top btn show when scroll down to 100px
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

const headerActive = function () {
  if (window.scrollY > 80) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
}

addEventOnElem(window, "scroll", headerActive);



//ANIMATION 
window.addEventListener('load', function(){
            // Ajoute un délai de 2 secondes
            setTimeout(function() {
                const loaderWrapper = document.getElementById('loader-wrapper');

                // Animation de disparition du loader
                loaderWrapper.style.transition = 'opacity 1.5s ease, visibility 1.5s ease';
                loaderWrapper.style.opacity = '0';
                loaderWrapper.style.visibility = 'hidden';

                // Réactivation du scroll après l'animation
                setTimeout(function() {
                    document.body.style.overflow = 'auto';
                    document.body.classList.add('loaded');
                },15);
            }, 50); // 5 secondes
        });


        /*===================== CAROUSSEL ========================*/
        var nextBtn = document.querySelector('.next'),
        prevBtn = document.querySelector('.prev'),
        carousel = document.querySelector('.carousel'),
        list = document.querySelector('.list'), 
        item = document.querySelectorAll('.item'),
        runningTime = document.querySelector('.carousel .timeRunning') 
    
    let timeRunning = 3000 
    let timeAutoNext = 7000
    
    nextBtn.onclick = function(){
        showSlider('next')
    }
    
    prevBtn.onclick = function(){
        showSlider('prev')
    }
    
    let runTimeOut 
    
    let runNextAuto = setTimeout(() => {
        nextBtn.click()
    }, timeAutoNext)
    
    
    function resetTimeAnimation() {
        runningTime.style.animation = 'none'
        runningTime.offsetHeight /* trigger reflow */
        runningTime.style.animation = null 
        runningTime.style.animation = 'runningTime 7s linear 1 forwards'
    }
    
    
    function showSlider(type) {
        let sliderItemsDom = list.querySelectorAll('.carousel .list .item')
        if(type === 'next'){
            list.appendChild(sliderItemsDom[0])
            carousel.classList.add('next')
        } else{
            list.prepend(sliderItemsDom[sliderItemsDom.length - 1])
            carousel.classList.add('prev')
        }
    
        clearTimeout(runTimeOut)
    
        runTimeOut = setTimeout( () => {
            carousel.classList.remove('next')
            carousel.classList.remove('prev')
        }, timeRunning)
    
    
        clearTimeout(runNextAuto)
        runNextAuto = setTimeout(() => {
            nextBtn.click()
        }, timeAutoNext)
    
        resetTimeAnimation() // Reset the running time animation
    }
    
    // Start the initial animation 
    resetTimeAnimation()

//texte animation


document.addEventListener("DOMContentLoaded", function() {
    const texts = ["Construire", "Innover", "Produit", "Branding", "Experience"];
    const typedTextElement = document.querySelector(".typed-text");
    const typingSpeed = 100;  // Vitesse d'écriture en ms
    const erasingSpeed = 50;  // Vitesse d'effacement en ms
    const newTextDelay = 2000; // Délai entre les textes
    let textIndex = 0;
    let charIndex = 0;

    function type() {
        if (charIndex < texts[textIndex].length) {
            typedTextElement.textContent += texts[textIndex].charAt(charIndex);
            charIndex++;
            setTimeout(type, typingSpeed);
        } else {
            setTimeout(erase, newTextDelay);
        }
    }

    function erase() {
        if (charIndex > 0) {
            typedTextElement.textContent = texts[textIndex].substring(0, charIndex - 1);
            charIndex--;
            setTimeout(erase, erasingSpeed);
        } else {
            textIndex++;
            if (textIndex >= texts.length) textIndex = 0;
            setTimeout(type, typingSpeed);
        }
    }

    // Démarrer l'animation
    setTimeout(type, newTextDelay + 250);
});

// scroll

/*document.addEventListener('DOMContentLoaded', () => {
  const sections = document.querySelectorAll('.section');

  const handleScroll = () => {
    const windowHeight = window.innerHeight;
    
    sections.forEach(section => {
      const sectionTop = section.getBoundingClientRect().top;
      const isVisible = sectionTop < windowHeight;

      if (isVisible) {
        section.classList.add('cloud-in');
      } else {
        section.classList.remove('cloud-in');
      }
    });
  };

  // Exécuter la fonction de défilement lors du chargement initial
  handleScroll();

  // Écouter l'événement de défilement
  window.addEventListener('scroll', handleScroll);
});*/

/*document.addEventListener('DOMContentLoaded', function() {
  const sections = document.querySelectorAll('.section');

  function checkVisibility() {
    const windowHeight = window.innerHeight;

    sections.forEach(section => {
      const { top, bottom } = section.getBoundingClientRect();

      if (top < windowHeight && bottom >= 0) {
        section.classList.add('visible');
      } else {
        section.classList.remove('visible');
      }
    });
  }

  // Initial check
  checkVisibility();

  // Add scroll event listener
  window.addEventListener('scroll', checkVisibility);
});*/

document.addEventListener('DOMContentLoaded', function() {
  const elements = document.querySelectorAll('.animate-on-scroll');

  function checkVisibility() {
    const windowHeight = window.innerHeight;

    elements.forEach(element => {
      const { top, bottom } = element.getBoundingClientRect();

      if (top < windowHeight && bottom >= 0) {
        element.classList.add('visible');
      } else {
        element.classList.remove('visible');
      }
    });
  }

  // Initial check
  checkVisibility();

  // Add scroll event listener
  window.addEventListener('scroll', checkVisibility);
});




//POPUP
// Fonction pour ouvrir le popup
const buttons = document.querySelectorAll(".popup-btn");

        

        // Fonction pour ouvrir le popup
        function openPopup() {
            document.getElementById("popup").style.display = "block";
            document.getElementById("popup-overlay").style.display = "block";
        }

        // Ajoute l'écouteur d'événements à tous les boutons
        buttons.forEach(btn => {
            btn.addEventListener("click", openPopup);
        });

        // Fonction pour fermer le popup
        function closePopup() {
            document.getElementById("popup").style.display = "none";
            document.getElementById("popup-overlay").style.display = "none";
        }


/*document.addEventListener("DOMContentLoaded", function() {
    const texts = ["Construire jfvigzegeoi^geogi", "Innovergzieuguegizeugiezugo", "Produit", "Branding", "Experience"];
    const typedTextElement = document.querySelector(".typed-text");
    const cursorElement = document.querySelector(".cursor");
    const typingSpeed = 60;  // Vitesse d'écriture en ms
    const erasingSpeed = 20;  // Vitesse d'effacement en ms
    const newTextDelay = 200; // Délai entre les textes
    let textIndex = 0;
    let charIndex = 0;

    function type() {
        if (charIndex < texts[textIndex].length) {
            typedTextElement.textContent += texts[textIndex].charAt(charIndex);
            charIndex++;
            setTimeout(type, typingSpeed);
        } else {
            setTimeout(erase, newTextDelay);
        }
    }

    function erase() {
        if (charIndex > 0) {
            typedTextElement.textContent = texts[textIndex].substring(0, charIndex - 1);
            charIndex--;
            setTimeout(erase, erasingSpeed);
        } else {
            textIndex++;
            if (textIndex >= texts.length) textIndex = 0;
            setTimeout(type, typingSpeed);
        }
    }

    // Démarrer l'animation
    setTimeout(type, newTextDelay + 250);
});*/

/*document.addEventListener("DOMContentLoaded", function() {
    const texts = ["Construire", "Innover", "Produit", "Branding", "Experience"];
    const typedTextElement = document.querySelector(".typed-text");
    const cursorElement = document.querySelector(".cursor");
    const typingSpeed = 100;  // Vitesse d'écriture en ms
    const erasingSpeed = 50;  // Vitesse d'effacement en ms
    const newTextDelay = 2000; // Délai entre les textes
    let textIndex = 0;
    let charIndex = 0;

    function type() {
        if (charIndex < texts[textIndex].length) {
            typedTextElement.textContent += texts[textIndex].charAt(charIndex);
            charIndex++;
            setTimeout(type, typingSpeed);
        } else {
            cursorElement.style.display = "inline-block"; // Assure que le curseur est visible
            setTimeout(erase, newTextDelay);
        }
    }

    function erase() {
        if (charIndex > 0) {
            typedTextElement.textContent = texts[textIndex].substring(0, charIndex - 1);
            charIndex--;
            setTimeout(erase, erasingSpeed);
        } else {
            cursorElement.style.display = "inline-block"; // Affiche le curseur
            textIndex++;
            if (textIndex >= texts.length) textIndex = 0;
            setTimeout(type, typingSpeed);
        }
    }

    // Démarrer l'animation
    setTimeout(() => {
        cursorElement.style.display = "inline-block"; // Affiche le curseur
        type();
    }, newTextDelay + 250);
});*/

/*document.addEventListener("DOMContentLoaded", function() {
    const texts = ["Construire", "Innover", "Produit", "Branding", "Experience"];
    const typedTextElement = document.querySelector(".typed-text");
    const cursorElement = document.querySelector(".cursor");
    const typingSpeed = 60;  // Vitesse d'écriture en ms
    const erasingSpeed = 10;  // Vitesse d'effacement en ms
    const newTextDelay = 500; // Délai entre les textes
    let textIndex = 0;
    let charIndex = 0;

    function type() {
        if (charIndex < texts[textIndex].length) {
            typedTextElement.textContent += texts[textIndex].charAt(charIndex);
            charIndex++;
            // Met à jour la position du curseur
            cursorElement.style.left = `${typedTextElement.offsetWidth}px`;
            setTimeout(type, typingSpeed);
        } else {
            setTimeout(erase, newTextDelay);
        }
    }

    function erase() {
        if (charIndex > 0) {
            typedTextElement.textContent = texts[textIndex].substring(0, charIndex - 1);
            charIndex--;
            // Met à jour la position du curseur
            cursorElement.style.left = `${typedTextElement.offsetWidth}px`;
            setTimeout(erase, erasingSpeed);
        } else {
            textIndex++;
            if (textIndex >= texts.length) textIndex = 0;
            setTimeout(type, typingSpeed);
        }
    }

    // Démarrer l'animation
    setTimeout(type, newTextDelay + 250);
});*/


 

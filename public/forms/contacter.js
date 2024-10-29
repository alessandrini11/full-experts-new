//=================================== etre contacter ==========================//

document.getElementById("openPopupBtn2").addEventListener("click", function() {
    alert("Bouton cliqué");
    document.getElementById("popupForm").style.display = "flex";
});

document.getElementById("popupForm").addEventListener("click", function(event) {
    if (event.target === this) {
        this.style.display = "none";
    }
});
var cardBadges = document.querySelectorAll(".card_badge");
var allBadgeAcount = document.querySelector("#allBadgesAcount");
var currentBadges = document.querySelector("#current_badges");
var badgesProgress = document.querySelectorAll(".badge_progress");
var progressBar = document.querySelector("#progress_bar");
var currentProgress = document.querySelector("#current_progress");
var currentPourcent = document.querySelector("#current_pourcent");

// faire le compte de badge
allBadgeAcount.textContent = cardBadges.length;
currentBadges.textContent = badgesProgress.length;


// faire le poucentage
var pourcent = (100 * currentBadges.textContent) / allBadgeAcount.textContent;

// faire la longeur de la barre avec le pourcentage obtenu
progressBar.style.width = pourcent + "%";

// afficher le pourcentage

currentPourcent.textContent = pourcent.toFixed(2) + "%";

currentProgress.addEventListener("click", ()=> {
    currentProgress.classList.toggle("opacity_0");
    currentPourcent.classList.toggle("none");
})
currentPourcent.addEventListener("click", ()=> {
    currentProgress.classList.toggle("opacity_0");
    currentPourcent.classList.toggle("none");
})

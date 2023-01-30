/************************************************************************/
/*                      PROGRESS BAR                                   */
/**********************************************************************/

var countPokUser = document.querySelector("#countPokUser").textContent;
var countPdex = document.querySelector("#countPdex").textContent;
var progressBar = document.querySelector("#progress_bar");
var currentProgress = document.querySelector("#current_progress");
var currentPourcent = document.querySelector("#current_pourcent");

// faire le poucentage
var pourcent = (100 * countPokUser) / countPdex;

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

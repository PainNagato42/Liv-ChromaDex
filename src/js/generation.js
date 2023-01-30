var choixGenerations = document.querySelectorAll(".choix_generation");
var boxPokemonGenerations = document.querySelectorAll(".box_pokemon_generation");

// variable bar de progression
var nbGenerationsActuelle = 9

// affiche generation (animation)
index = 0;

choixGenerations.forEach(choixGeneration => {
    choixGeneration.addEventListener("click", (e) => {
        e.target.classList.add("active");

        for (let i = 0; i < choixGenerations.length; i++) {
            if (choixGenerations[i] !== e.target) {
                choixGenerations[i].classList.remove("active");
            }
            index = choixGeneration.getAttribute("data-G");
        }

        for (let j = 0; j < boxPokemonGenerations.length; j++) {

            if (boxPokemonGenerations[j].getAttribute("data-boxG") == index) {
                boxPokemonGenerations[j].classList.remove("none");
            } else {
                boxPokemonGenerations[j].classList.add("none");
            }

        }
    })
})

// faire le poucentage
for (let i = 1; i <= nbGenerationsActuelle; i++) {
    var pourcent = (100 * window['countPokUserG' + i].textContent) / window['countPdexG' + i].textContent;

    // faire la longeur de la barre avec le pourcentage obtenu
    window['progress_barG' + i].style.width = pourcent + "%";

    // afficher le pourcentage
    window['current_pourcentG' + i].textContent = pourcent.toFixed(2) + "%";

    window['current_progressG' + i].addEventListener("click", () => {
        window['current_progressG' + i].classList.toggle("opacity_0");
        window['current_pourcentG' + i].classList.toggle("none");
    })
    window['current_pourcentG' + i].addEventListener("click", () => {
        window['current_progressG' + i].classList.toggle("opacity_0");
        window['current_pourcentG' + i].classList.toggle("none");
    })
}









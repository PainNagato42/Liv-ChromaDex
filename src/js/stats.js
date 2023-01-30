/* BARRE CHROMA */

let pourcentChromaTrue = document.querySelector("#pourcent_chroma_true").textContent
let pourcentChromaFalse = document.querySelector("#pourcent_chroma_false").textContent
let progressBarChromaTrue = document.querySelector("#progress_bar_chroma_true");
let progressBarChromaFalse = document.querySelector("#progress_bar_chroma_false");

// barre pour charme chroma
progressBarChromaTrue.style.width = pourcentChromaTrue.substring(0, pourcentChromaTrue.length - 1) + "%";
progressBarChromaFalse.style.width = pourcentChromaFalse.substring(0, pourcentChromaFalse.length - 1) + "%";


/* BARRE SEXE */

let pourcentMale = document.querySelector("#pourcent_male").textContent
let pourcentFemale = document.querySelector("#pourcent_female").textContent
let progressBarMale = document.querySelector("#progress_bar_male");
let progressBarFemale = document.querySelector("#progress_bar_female");

// barre pour sexe
progressBarMale.style.width = pourcentMale.substring(0, pourcentMale.length - 1) + "%";
progressBarFemale.style.width = pourcentFemale.substring(0, pourcentFemale.length - 1) + "%";


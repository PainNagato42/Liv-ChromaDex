/****************************************************/
/*              AUTOCOMPLETION                      */
/****************************************************/

document.querySelector("#namePok").addEventListener("input", () => {

    if (document.querySelector("#namePok").value.length >= 3) {
        // faire la requete ajax
        $.ajax("http://localhost/ChromaDex/ajax_namePok/", {
            method: "post",
            data: { pokemon: document.querySelector("#namePok").value },
            success: retourNamePokemon
        });
    } else {
        document.querySelector("#pok").textContent = "";
    }
})

function retourNamePokemon(data) {
    // Rôle : mettre à jour le DOM à partir de ce qui est envoyé par le serveur
    // Retour : néant
    // Paramètres :  data (données envoyée par PHP)

    document.querySelector("#pok").innerHTML = data;
}

document.querySelector("#pok").addEventListener("click", (e) => {
    var p = e.target.textContent
    document.querySelector("#namePok").value = p;
    document.querySelector("#pok").textContent = "";

})

document.querySelector("body").addEventListener("click", () => {
    document.querySelector("#pok").textContent = "";
})


/****************************************************/
/*                   CHECKBOX                       */
/****************************************************/

document.querySelector(".nb_rencontre").addEventListener("input", () => {

        // faire la requete ajax
        $.ajax("http://localhost/ChromaDex/ajax_checkBox/", {
            method: "post",
            data: { rencontre: document.querySelector(".nb_rencontre").value },
            success: retourCheckNb
        });
})

function retourCheckNb (data) {
    document.querySelector(".check_nb").innerHTML = data;
}

document.querySelector(".date").addEventListener("input", () => {

        // faire la requete ajax
        $.ajax("http://localhost/ChromaDex/ajax_checkBox/", {
            method: "post",
            data: { date: document.querySelector(".date").value },
            success: retourCheckDate
        });
})

function retourCheckDate (data) {
    document.querySelector(".check_date").innerHTML = data;
}

/****************************************************/
/*                   RECHERCHE AJAX                 */
/****************************************************/

document.querySelector(".search").addEventListener("input", () => {

    // faire la requete ajax
    $.ajax("http://localhost/ChromaDex/ajax_recherche/", {
        method: "post",
        data: { recherche: document.querySelector(".search").value },
        success: retourRecherche
    });
})

function retourRecherche (data) {
    document.querySelector(".search_div").innerHTML = data;
    redimImg();
    }


/*************************************************************************/

/* redimentionner img */

function redimImg() {
    var imgPoks = document.querySelectorAll(".img_pokemon");

    imgPoks.forEach(imgPok => {
        if (imgPok.clientHeight < 109) {
            imgPok.style.width = 70 + "%";
        } else {
            imgPok.style.width = 50 + "%";
        }
    });

}
redimImg();




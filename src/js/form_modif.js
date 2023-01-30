var popup = document.querySelector(".popup");
var mask = document.querySelector(".mask");
var btnSuppr = document.querySelector(".btn_suppr");
var btnRefus = document.querySelector("#btn_refus_suppr");

btnSuppr.addEventListener("click", ()=> {
    popup.classList.add("block");
    mask.classList.add("block");
})
btnRefus.addEventListener("click", ()=> {
    popup.classList.remove("block");
    mask.classList.remove("block");
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

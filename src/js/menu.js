let menu = document.querySelector(".menu");
let header = document.querySelector("header");

menu.addEventListener("click", ()=> {
    header.classList.toggle("header-slide");
    menu.classList.toggle("menu-slide");
})
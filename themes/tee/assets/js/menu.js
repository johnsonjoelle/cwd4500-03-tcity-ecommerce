const menuIcon = document.querySelector("#icon-menu-container");
const menu = document.querySelector(".menu-main-menu-container");

window.addEventListener('DOMContentLoaded', () =>{
    menuIcon.addEventListener("click", function () {
        menu.classList.toggle("tee-show");
    });
});
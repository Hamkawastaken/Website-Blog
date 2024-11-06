const menuAccordion = document.getElementById("menu-accordion");
const hamburgerMenu = document.getElementById("hamburger-menu");

hamburgerMenu.addEventListener("click", () => {
    menuAccordion.classList.toggle("hidden");
})
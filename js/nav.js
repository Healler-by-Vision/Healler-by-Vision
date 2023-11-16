document.addEventListener("DOMContentLoaded", function () {
    const navToggle = document.querySelector(".nav-toggle");
    const navList = document.querySelector(".nav ul");
    const dropdowns = document.querySelectorAll(".dropdown");

    navToggle.addEventListener("click", function () {
    
        navList.classList.toggle("show");
    });


    dropdowns.forEach(function (dropdown) {
        const dropdownContent = dropdown.querySelector(".dropdown-content");

        dropdown.addEventListener("click", function () {
            dropdownContent.classList.toggle("show-submenu");
        });
    });
});

function toggleMobileMenu() {
    var mobileMenu = document.getElementById("mobileMenu");
    mobileMenu.classList.toggle("show");
}
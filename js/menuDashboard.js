document.addEventListener("DOMContentLoaded", function () {
    const submenus = document.querySelectorAll(".submenu-toggle");
    submenus.forEach(toggle => {
        toggle.addEventListener("click", function () {
            const submenu = this.nextElementSibling;
            submenu.classList.toggle("open");
            this.querySelector(".flecha").classList.toggle("rotado");
        });
    });
});


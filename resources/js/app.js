import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js'; 
import Alpine from 'alpinejs';
import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init();

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    // Aquí va el código JavaScript que quieres ejecutar cuando la página esté cargada
    const menuToggle = document.getElementById("menu-toggle");
const mobileMenu = document.getElementById("mobile-menu");

menuToggle.addEventListener("click", () => {
    mobileMenu.classList.toggle("hidden");
});
});


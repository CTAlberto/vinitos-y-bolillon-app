import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js'; 
import Alpine from 'alpinejs';
import AOS from 'aos';
import 'aos/dist/aos.css';
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

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

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    if (calendarEl) {
        const calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, interactionPlugin],
            initialView: 'dayGridMonth', // Vista predeterminada (puedes cambiarla a 'dayGridWeek', 'listWeek', etc.)
            events: '/api/calendar-events',
            headerToolbar: { 
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek,listWeek', 
            },
            buttonText: { 
                today: 'Hoy',
                month: 'Mes',
                week: 'Semana',
                day: 'Día',
            },
            eventColor: '#7b1228', 
            eventTextColor: 'white', 
            eventBorderColor: '#7b1228', 
            dayMaxEventRows: 3, 
            contentHeight: 'auto', 
        });
        calendar.render();
    }
});
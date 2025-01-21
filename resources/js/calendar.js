import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    if (calendarEl) {
        const calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, interactionPlugin],
            initialView: 'dayGridMonth',
            events: '/api/events', // Endpoint para obtener eventos
            selectable: true,
            editable: false, // Cambia a `true` si quieres arrastrar eventos
            eventClick: function (info) {
                alert(`Evento: ${info.event.title}`);
            },
        });

        calendar.render();
    }
});

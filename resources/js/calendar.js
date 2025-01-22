import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import timeGridPlugin from '@fullcalendar/timegrid';
import Swal from 'sweetalert2';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    if (calendarEl) {
        const calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, interactionPlugin, timeGridPlugin],
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay',
            },
            events: function (info, successCallback, failureCallback) {
                fetch('/api/events')
                    .then(response => response.json())
                    .then(events => {
                        const filteredEvents = events.flatMap(event => {
                            const start = new Date(event.start);
                            const end = new Date(event.end);
                            return [
                                {
                                    ...event,
                                    start: start,
                                    end: start,
                                    color: 'green',
                                    title: `${event.title} - Inicio`,
                                },
                                {
                                    ...event,
                                    start: end,
                                    end: end,
                                    color: 'red',
                                    title: `${event.title} - Fin`,
                                },
                            ];
                        });
                        successCallback(filteredEvents);
                    })
                    .catch(failureCallback);
            },
            eventClick: function (info) {
                Swal.fire({
                    title: info.event.title,
                    text: `Fecha: ${info.event.start.toLocaleString()}`,
                    icon: 'info',
                    confirmButtonText: 'Cerrar',
                });
            },
            eventContent: function (eventInfo) {
                return {
                    html: `
                        <div style="color: white; background-color: ${eventInfo.event.backgroundColor}; padding: 4px; border-radius: 3px;">
                            ${eventInfo.event.title}
                        </div>
                    `,
                };
            },
            visibleRange: function(currentDate) {
                // Mostrar solo los días del mes actual en dayGridMonth
                const startDate = new Date(currentDate);
                startDate.setDate(1); // Primer día del mes
                const endDate = new Date(currentDate);
                endDate.setMonth(endDate.getMonth() + 1);
                endDate.setDate(0); // Último día del mes
                return {
                    start: startDate.toISOString().split('T')[0],
                    end: endDate.toISOString().split('T')[0],
                };
            },
            height: 'auto',
            aspectRatio: 1.35, // Ajuste para mejorar el espaciado en las vistas semanal y diaria
            slotMinTime: '08:00:00', // Comienza la vista de día y semana a las 8:00 AM
            slotMaxTime: '20:00:00', // Termina a las 8:00 PM
            expandRows: true, // Hace que los días siempre tengan la misma altura
            dayMaxEventRows: true, // Limita las filas de eventos visibles en dayGridMonth
            eventDisplay: 'block',
        });

        calendar.render();
    }
});

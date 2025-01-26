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
                                    color: '#8B0000', // Rojo oscuro (vino tinto)
                                    title: `${event.title} - Inicio`,
                                },
                                {
                                    ...event,
                                    start: end,
                                    end: end,
                                    color: '#FFBF00', // Ámbar (vino de Jerez)
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
                    confirmButtonColor: '#D4A017', // Dorado cálido
                    customClass: {
                        popup: 'rounded-lg shadow-xl', // Estilos de Tailwind para SweetAlert2
                        confirmButton: 'bg-[#D4A017] hover:bg-[#8B0000] text-white font-bold py-2 px-4 rounded',
                    },
                });
            },
            eventContent: function (eventInfo) {
                return {
                    html: `
                        <div class="text-white p-1 rounded-md shadow-sm text-xs transition-transform transform hover:scale-105" style="background-color: ${eventInfo.event.backgroundColor}">
                            ${eventInfo.event.title}
                        </div>
                    `,
                };
            },
            visibleRange: function (currentDate) {
                const startDate = new Date(currentDate);
                startDate.setDate(1);
                const endDate = new Date(currentDate);
                endDate.setMonth(endDate.getMonth() + 1);
                endDate.setDate(0);
                return {
                    start: startDate.toISOString().split('T')[0],
                    end: endDate.toISOString().split('T')[0],
                };
            },
            height: 'auto', // Altura automática para evitar el scroll
            aspectRatio: 1.1, // Relación de aspecto más compacta
            slotMinTime: '08:00:00',
            slotMaxTime: '20:00:00',
            expandRows: true,
            dayMaxEventRows: 2, // Mostrar hasta 2 filas de eventos por día
            eventDisplay: 'block',
            // Personalización de estilos con Tailwind
            themeSystem: 'standard',
            buttonText: {
                today: 'Hoy',
                month: 'Mes',
                week: 'Semana',
                day: 'Día',
            },
            eventBackgroundColor: '#8B0000', // Color de fondo por defecto para eventos
            eventBorderColor: '#D4A017', // Color del borde de los eventos
            eventTextColor: '#FFFFFF', // Color del texto de los eventos
            
            dayCellContent: function (info) {
                return {
                    html: `
                        <div class="text-center p-1 rounded-full hover:bg-[#D4A017] hover:text-white transition-colors text-xs cursor-pointer">
                            ${info.dayNumberText}
                        </div>
                    `,
                };
            },
            dayHeaderContent: function (info) {
                return {
                    html: `
                        <div class="text-center font-bold text-[#8B0000] text-xs uppercase">
                            ${info.text}
                        </div>
                    `,
                };
            },
            buttonIcons: {
                prev: 'chevron-left',
                next: 'chevron-right',
                today: 'calendar',
            },
            buttonText: {
                today: 'Hoy',
                month: 'Mes',
                week: 'Semana',
                day: 'Día',
            },
            eventMouseEnter: function (info) {
                info.el.classList.add('scale-105', 'shadow-lg'); // Escala y sombra al hacer hover
            },
            eventMouseLeave: function (info) {
                info.el.classList.remove('scale-105', 'shadow-lg'); // Restablece al salir
            },
        });

        calendar.render();
    }
});
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import timeGridPlugin from '@fullcalendar/timegrid';
import Swal from 'sweetalert2';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    if (calendarEl) {
        // Obtener la categoría del data attribute
        const category = calendarEl.dataset.category;
        
        const calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, interactionPlugin, timeGridPlugin],
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay',
            },
            events: function (info, successCallback, failureCallback) {
                let url = '/api/events';
                if(category) {
                    url += `?category=${category}`;
                }
                
                fetch(url)
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
                                    color: event.id_category === 1 ? '#8B0000' : '#1E90FF', // Rojo para catas (1), Azul para cursos (3)
                                    title: `${event.title} - Inicio`,
                                },
                                {
                                    ...event,
                                    start: end,
                                    end: end,
                                    color: event.id_category === 1 ? '#FFBF00' : '#00CED1', // Ámbar para catas (1), Turquesa para cursos (3)
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
                    html: `
                        <div class="text-left">
                            <p class="mb-2"><strong>Fecha:</strong> ${info.event.start.toLocaleString()}</p>
                            <p class="mb-2"><strong>Tipo:</strong> ${info.event.extendedProps.id_category === 1 ? 'Cata' : 'Curso'}</p>
                        </div>
                    `,
                    icon: 'info',
                    confirmButtonText: 'Cerrar',
                    confirmButtonColor: '#D4A017',
                    customClass: {
                        popup: 'rounded-lg shadow-xl',
                        confirmButton: 'bg-[#D4A017] hover:bg-[#8B0000] text-white font-bold py-2 px-4 rounded',
                    },
                });
            },
            eventContent: function (eventInfo) {
                return {
                    html: `
                        <div class="text-white p-1 rounded-md shadow-sm text-xs transition-transform transform hover:scale-105" 
                             style="background-color: ${eventInfo.event.backgroundColor};
                                    border: 1px solid ${eventInfo.event.borderColor};">
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
            height: 'auto',
            aspectRatio: 1.1,
            slotMinTime: '08:00:00',
            slotMaxTime: '20:00:00',
            expandRows: true,
            dayMaxEventRows: 2,
            eventDisplay: 'block',
            themeSystem: 'standard',
            buttonText: {
                today: 'Hoy',
                month: 'Mes',
                week: 'Semana',
                day: 'Día',
            },
            eventBorderColor: '#D4A017',
            eventTextColor: '#FFFFFF',
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
            eventMouseEnter: function (info) {
                info.el.classList.add('scale-105', 'shadow-lg');
            },
            eventMouseLeave: function (info) {
                info.el.classList.remove('scale-105', 'shadow-lg');
            },
        });

        calendar.render();
    }
});
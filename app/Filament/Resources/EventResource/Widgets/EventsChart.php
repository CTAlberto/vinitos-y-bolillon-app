<?php

namespace App\Filament\Resources\EventResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Contact;

class EventsChart extends ChartWidget
{
    protected static ?string $heading = 'Solicitudes a eventos';


    protected function getData(): array
    {
        $contacts = Contact::join('events', 'contacts.event_id', '=', 'events.id')
    ->selectRaw('MONTH(events.ini_date) as month, COUNT(*) as total')
    ->groupBy('month')
    ->orderBy('month')
    ->pluck('total', 'month')
    ->toArray();


        $data = array_fill(1, 12, 0);
        foreach ($contacts as $month => $total) {
            $data[$month] = $total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Asistencia a eventos',
                    'data' => array_values($data),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                ],
            ],
            'labels' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

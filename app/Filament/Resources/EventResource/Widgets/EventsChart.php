<?php

namespace App\Filament\Resources\EventResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Contact;

class EventsChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $contacts = Contact::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Generar array con 12 meses, asignando 0 si no hay datos en algún mes
        $data = array_fill(1, 12, 0); // Llena un array de 12 posiciones con 0
        foreach ($contacts as $month => $total) {
            $data[$month] = $total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Asistencia a eventos',
                    'data' => array_values($data), // Convertir a un array de valores
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

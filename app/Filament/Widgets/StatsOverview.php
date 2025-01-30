<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Statistic;
class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $views = Statistic::all()->count();
        $pending = Contact::where('validation', 'pending')->count();
        return [
            Stat::make('Visitas Totales', $views)
            ->description('Total de visitas a la página')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),

            Stat::make('Contactos pendientes de revisión', $pending),
            Stat::make('Average time on page', '3:12'),
        ];
    }
}

<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Statistic;
class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $views = Statistic::all()->count();
        return [
            Stat::make('Visitas Totales', $views),
            Stat::make('Bounce rate', '21%'),
            Stat::make('Average time on page', '3:12'),
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    public function run()
    {
        Statistic::create([
            'page' => 'Inicio',
            'visits' => 150,
        ]);

        Statistic::create([
            'page' => 'Cursos',
            'visits' => 120,
        ]);
    }
}


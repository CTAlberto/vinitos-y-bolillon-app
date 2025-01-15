<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Statistic;

class StatisticSeeder extends Seeder
{
    public function run()
    {
        Statistic::create([
            'id_event' => 1,
            'attendance' => 10,
            'applicants' => 15,
        ]);
    }
}

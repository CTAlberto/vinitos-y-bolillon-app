<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id_category' => 1,
            'title_event' => 'Cata de Vinos Españoles',
            'subtitle' => 'Explorando lo mejor de España',
            'description' => 'Un evento para amantes del vino.',
            'content' => 'Degustación de vinos premium.',
            'requirements' => 'Ser mayor de edad.',
            'ini_date' => '2025-02-01',
            'end_date' => '2025-02-01',
            'price' => 50.00,
            'location' => 'Madrid',
            'capacity' => 20,
            'language' => 'español',
        ]);
    }
}

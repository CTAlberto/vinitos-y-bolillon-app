<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    public function run()
    {
        Image::create([
            'name' => 'evento1.jpg',
            'fk_id' => 1,
            'is_active' => true,
        ]);
    }
}

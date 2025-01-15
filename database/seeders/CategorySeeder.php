<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Catas de Vino']);
        Category::create(['name' => 'Formación']);
        Category::create(['name' => 'Eventos Corporativos']);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        Course::create([
            'title' => 'Curso de Cata de Vinos',
            'description' => 'Aprende a identificar los aromas y sabores del vino.',
            'price' => 120.50,
            'start_date' => '2025-01-20',
            'duration' => 7,
            'image' => 'cursos/vinos.jpg',
        ]);

        Course::create([
            'title' => 'Curso de Cocina Mediterránea',
            'description' => 'Descubre los secretos de la cocina saludable y deliciosa.',
            'price' => 200.00,
            'start_date' => '2025-02-10',
            'duration' => 10,
            'image' => 'cursos/mediterranea.jpg',
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instructor;

class InstructorSeeder extends Seeder
{
    public function run()
    {
        Instructor::create([
            'name' => 'María',
            'surname' => 'López',
            'bio' => 'Sommelier experta en vinos españoles.',
            'language' => 'español',
        ]);
    }
}

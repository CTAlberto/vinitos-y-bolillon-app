<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InstructorCourse;

class InstructorCourseSeeder extends Seeder
{
    public function run()
    {
        InstructorCourse::create([
            'id_instructor' => 1,
            'id_event' => 1,
        ]);
    }
}

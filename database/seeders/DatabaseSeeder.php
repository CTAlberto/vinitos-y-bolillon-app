<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            EventSeeder::class,
            InstructorSeeder::class,
            InstructorCourseSeeder::class,
            ContactSeeder::class,
            ImageSeeder::class,
            StatisticSeeder::class,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\StudentClass::factory(10)->create();
         \App\Models\lection::factory(100)->create();
         \App\Models\Studyplan::factory(30)->create();
        \App\Models\Student::factory(200)->create();
    }
}

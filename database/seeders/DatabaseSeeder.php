<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Department;
use App\Models\Instructor;
use App\Models\Student;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Department::factory(10)->create();
        Instructor::factory(10)->create();
        Course::factory(10)->create();
        Student::factory(10)->create();
    }
}

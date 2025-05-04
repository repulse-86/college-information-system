<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'department_id' => \App\Models\Department::inRandomOrder()->first()->departmentID,
        ];
    }

    public function withCourses(int $count = 1)
   {
       return $this->afterCreating(function (Student $student) use ($count) {
           $courses = \App\Models\Course::inRandomOrder()->take($count)->pluck('courseID');
           $student->courses()->attach($courses);
       });
   }
}

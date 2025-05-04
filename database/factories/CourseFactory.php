<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department_id' => Department::inRandomOrder()->first()->departmentID,
            'instructor_id' => Instructor::inRandomOrder()->first()->instructorID,
            'title' => $this->faker->unique()->word,
            'credit' => $this->faker->numberBetween(1, 4),
        ];
    }
}

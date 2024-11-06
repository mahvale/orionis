<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3), // Exemple de titre
            'description' => $this->faker->paragraph(), // Exemple de description
            'classroom_id' => rand(1, 7), // Assure-toi que ClassroomFactory existe
        ];
    }
}

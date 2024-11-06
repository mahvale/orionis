<?php
namespace Database\Factories;

use App\Models\Forum;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForumFactory extends Factory
{
    protected $model = Forum::class;

    public function definition()
    {
        return [
            'course_id' => \App\Models\Course::factory(), // Assure-toi que CourseFactory existe
        ];
    }
}

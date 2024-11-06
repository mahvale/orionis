<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Forum;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $courses = \App\Models\Course::all();
    foreach ($courses as $course) {
        Forum::factory()->count(3)->create(['course_id' => $course->id]);
    }
}
}
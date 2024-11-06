<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for ($i = 1; $i <= 10; $i++) {
            DB::table('courses')->insert([
                'title' => 'Course ' . $i,
                'description' => 'Description for course ' . $i,
                'classroom_id' => rand(1, 8), // Choisit un ID aléatoire entre 1 et 7
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

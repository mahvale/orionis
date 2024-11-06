<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Professor;
use App\Models\Course;

class ProfessorsTableSeeder extends Seeder
{
    public function run()
    {
        // Remplir la table professors
        for ($i = 1; $i <= 25; $i++) {
            $professor = Professor::create([
                'user_id' => $i, // Assurez-vous que les utilisateurs existent dans la table users
                'is_permanent' => rand(0, 1), // Attribuer aléatoirement true ou false
            ]);

            // Lier le professeur à des cours existants
            // Récupérer tous les cours
            $courses = Course::all();

            // Si des cours existent, lier le professeur à un nombre aléatoire de cours
            if ($courses->count() > 0) {
                $randomCourses = $courses->random(rand(1, min(3, $courses->count()))); // Lier 1 à 3 cours
                $professor->courses()->attach($randomCourses);
            }
        }
    }
}

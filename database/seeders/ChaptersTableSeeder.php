<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // Récupérer tous les cours disponibles
        $courses = DB::table('courses')->pluck('id');

        // Vérifier qu'il y a des cours
        if ($courses->isEmpty()) {
            return; // Ne rien faire si aucune donnée n'est présente
        }

        // Créer des évaluations
        foreach (range(1, 50) as $index) { // Créer 50 évaluations 
            DB::table('chapters')->insert([
                'title' => 'Chapitre ' . $index, // Titre du chapitre
                'created_at' => now(),
                'updated_at' => now(),
                'course_id' => $courses->random(), // Cours aléatoire
            ]);
        }
    }
}
 
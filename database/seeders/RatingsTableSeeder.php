<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        // Récupérer tous les utilisateurs et chapitres
        $users = DB::table('users')->pluck('id');
        $chapters = DB::table('chapters')->pluck('id');

        // Vérifier qu'il y a des utilisateurs et des chapitres
        if ($users->isEmpty() || $chapters->isEmpty()) {
            return; // Ne rien faire si aucune donnée n'est présente
        }

        // Créer des évaluations
        foreach (range(1, 50) as $index) { // Créer 50 évaluations 
            DB::table('ratings')->insert([
                'rating' => rand(1, 5), // Note entre 1 et 5
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => $users->random(), // Utilisateur aléatoire
                'chapter_id' => $chapters->random(), // Chapitre aléatoire
            ]);
        }
    }
}

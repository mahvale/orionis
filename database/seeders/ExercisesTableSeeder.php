<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Exercise; // Assurez-vous que le modèle Exercise existe
use Illuminate\Support\Facades\DB;

class ExercisesTableSeeder extends Seeder
{
    public function run()
    {
         // Désactiver les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Vider la table exercises
        DB::table('exercises')->truncate();

        // Réactiver les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insertion des épreuves

        // Création de plusieurs épreuves pour différents chapitres/parties
        Exercise::create([
            'title' => 'Exercice 1 - Chapitre 1',
            'file' => 'exercises/exercise1.pdf',
            'chapter_id' => 1,
            'part_id' => 1
        ]);

        Exercise::create([
            'title' => 'Exercice 2 - Chapitre 2',
            'file' => 'exercises/exercise2.pdf',
            'chapter_id' => 2,
            'part_id' => 1
        ]);

        // Ajoutez d'autres exercices comme nécessaire
    }
}
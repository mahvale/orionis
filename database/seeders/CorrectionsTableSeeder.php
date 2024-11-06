<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Correction; // Assurez-vous que le modèle Correction existe
use Illuminate\Support\Facades\DB;

class CorrectionsTableSeeder extends Seeder
{
    public function run()
    {
        // Désactiver les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Vider la table exercises
        DB::table('corrections')->truncate();

        // Réactiver les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insertion des épreuves

        // Création de plusieurs corrections pour différents exercices
        Correction::create([
            'title' => 'Correction Exercice 1',
            'type' => 'pdf',
            'file' => 'corrections/correction1.pdf',
            'exercise_id' => 1, // Lien avec l'exercice 1
        ]);

        Correction::create([
            'title' => 'Correction Exercice 2',
            'type' => 'pdf',
            'file' => 'corrections/correction2.pdf',
            'exercise_id' => 2, // Lien avec l'exercice 2
        ]);

        // Ajoutez d'autres corrections si nécessaire
    }
}

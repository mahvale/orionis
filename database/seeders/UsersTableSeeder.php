<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Générer des utilisateurs et des paiements
        for ($i = 1; $i <= 50; $i++) {
            // Insérer un utilisateur
            $userId = DB::table('users')->insertGetId([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // Mot de passe par défaut
                'classroom_id' => rand(1, 8), // Associer un utilisateur à une classe aléatoire
                'payment_status' => $faker->randomElement(['payé', 'non payé']),
                'payment_expiry' => $faker->dateTimeBetween('now', '+1 year'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insérer un paiement pour l'utilisateur
            DB::table('payments')->insert([
                'user_id' => $userId,
                'amount' => $faker->randomFloat(2, 50, 500), // Montant entre 50 et 500
                'status' => $faker->randomElement(['pending', 'confirmed']),
                'duration' => $faker->randomElement(['1 day', '1 week', '1 month', '1 year']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

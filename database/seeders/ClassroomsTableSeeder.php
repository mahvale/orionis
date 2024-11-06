<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classrooms')->insert([
            ['id' => 1, 'name' => '3', 'description' => 'troisième'],
            ['id' => 2, 'name' => 'PC', 'description' => 'première C'],
            ['id' => 3, 'name' => 'PD', 'description' => 'première D'],
            ['id' => 4, 'name' => 'PA', 'description' => 'première A'],
            ['id' => 5, 'name' => 'TA', 'description' => 'terminal A'],
            ['id' => 6, 'name' => 'TD', 'description' => 'terminal D'],
            ['id' => 7, 'name' => 'TC', 'description' => 'terminal C'],
            ['id' => 8, 'name' => 'PREPAS', 'description' => 'PREPAS-CONCOURS'],
            // Ajoutez autant de classes que nécessaire
        ]);
    }
}

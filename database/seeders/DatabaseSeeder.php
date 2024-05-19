<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PacienteSeeder::class,
            PacTelefonesSeeder::class,
            ConsultaSeeder::class,
            EspecialidadeSeeder::class,
            MedicoSeeder::class,
            ProcedimentoSeeder::class,
            ProcedimentoSeeder::class
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('paciente')->insert([
            'pac_nome' => fake()->name(),
            'pac_dataNascimento' => now()->subYears(rand(18, 65))->format('Y-m-d'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

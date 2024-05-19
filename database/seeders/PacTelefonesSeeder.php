<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PacTelefonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pacientes = DB::table('paciente')->get();

        foreach ($pacientes as $paciente) {
            DB::table('pac_telefones')->insert([
                [
                    'pac_codigo' => $paciente->pac_codigo,
                    'telefone' => '(' . rand(10, 99) . ') ' . rand(8000, 9999) . '-' . rand(0000, 9999), // Telefone aleatório
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'pac_codigo' => $paciente->pac_codigo,
                    'telefone' => '(' . rand(10, 99) . ') ' . rand(8000, 9999) . '-' . rand(0000, 9999), // Outro telefone
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}

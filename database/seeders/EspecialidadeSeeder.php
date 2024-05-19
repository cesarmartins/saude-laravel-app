<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('especialidade')->insert([
            [
                'espec_nome' => 'Administração em Saúde',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'espec_nome' => 'Alergia e Imunologia Pediátrica',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'espec_nome' => 'Angiorradiologia e Cirurgia Endovascular',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'espec_nome' => 'Cardiologia Pediátrica',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'espec_nome' => 'Cirurgia Bariátrica',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'espec_nome' => 'Cirurgia Crânio-Maxilo-Facial',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'espec_nome' => 'Cirurgia do Trauma',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

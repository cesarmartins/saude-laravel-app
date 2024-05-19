<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcedimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('procedimento')->insert([
            'proc_nome' => $this->getProcedimento(rand(0,2)),
            'proc_valor' => fake()->randomFloat(2, 100, 1000),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function getProcedimento($idProcedimento){
        $procedimento = [
            "CONSULTA MEDICA",
            "EXAMES",
            "ELETROCARDIOGRAMA"
        ];
        return $procedimento[$idProcedimento];
    }
}

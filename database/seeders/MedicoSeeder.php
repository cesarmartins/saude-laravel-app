<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medico')->insert([
            'med_nome' => fake()->name(),
            'med_CRM' => rand(000001,600000) . '/' . $this->getEstados(rand(0,26)),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function getEstados($idEstado)
    {
        $estados = array("AC","AL","AP","AM","BA","CE","ES","GO","MA","MT","MS","MG","PA","PB","PR","PE","PI","RJ","RN","RS","RO","RR","SC","SP","SE","TO");
        return $estados[$idEstado];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('consulta')->insert([
            'particular' => rand(0,1),
            'data' => now()->subDay()->format('Y-m-d'),
            'hora' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

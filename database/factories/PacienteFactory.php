<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    public function definition()
    {
        return [
            'pac_nome' => $this->faker->name,
            'pac_dataNascimento' => $this->faker->date
        ];
    }
}

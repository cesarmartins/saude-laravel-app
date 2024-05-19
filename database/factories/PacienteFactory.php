<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{

    protected $model = Paciente::class;

    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        return [
            'pac_nome' => $this->faker->name,
            'pac_dataNascimento' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

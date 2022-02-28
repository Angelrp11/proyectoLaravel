<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserva>
 */
class ReservaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {
        $pista = ['Pista 1', 'Pista 2', 'Pista 3', 'Pista 4'];
        $hora = ['08:00:00', '09:30:00', '11:00:00', '12:30:00', '14:00:00', '15:30:00', '17:00:00', '18:30:00', '20:00:00', '22:30:00'];
        return [
            'dia' => $this->faker->dateTime(),
            'hora' => $hora[rand(0, 9)],
            'correo_usu' => User::inRandomOrder()->first()->email,
            'pista' => $pista[rand(0, 3)],
        ];
    }
}

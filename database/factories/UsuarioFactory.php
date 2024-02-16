<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UsuarioFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           "nombre"   => $this->faker->firstName,           
           "apellido" => $this->faker->lastName,
           "email"    => $this->faker->email,
           "password" => Hash::make("12345678"),
           "foto"     => $this->faker->imageUrl(200,200),
         ];
    }
}

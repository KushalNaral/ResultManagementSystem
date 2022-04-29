<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students>
 */
class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition()
    {

        $token = Str::random(40 );
        return [

            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => bcrypt('password'),
            'password_confirmation' => bcrypt('password'),
            'address' => $this->faker->word(2),
            'phone_number' => $this->faker->phoneNumber(),
            'api_token' =>  $token,
            'remember_token' => $token,
        ];
    }
}

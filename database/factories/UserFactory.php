<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
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

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

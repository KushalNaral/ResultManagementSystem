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
        $class = Str::random(2) . random_int(0, 99);
        return [

            'name' => $this->faker->name,
            'address' => $this->faker->word,
            'class' => $class,
            'email' => $this->faker->email,
            'password' => bcrypt('password'),
            'password_confirmation' => bcrypt('password'),
            'roll_no' => $this->faker->unique()->numberBetween(0 , 99),
            'section' => $class,
            'parents_name' =>$this->faker->name,
            'parents_phone' => $this->faker->unique()->phoneNumber,
            'parents_email' => $this->faker->unique()->email,
            'exam_status' => 'N/A',


        ];
    }
}

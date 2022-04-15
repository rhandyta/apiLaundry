<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            "name" => $name,
            "email" => $this->faker->email(),
            "slug" => $name,
            "no_telp" => $this->faker->phoneNumber(),
            "address" => $this->faker->address()
        ];
    }
}

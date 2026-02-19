<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'given_name' =>$this->faker->firstName(),
            'family_name'  => $this->faker->lastName(),
            'nick_name' => $this->faker->userName(),
            'title' => $this->faker->title(),
        ];
    }
}

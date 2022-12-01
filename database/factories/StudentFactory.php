<?php

namespace Database\Factories;

use App\Models\Institution;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "institution_id"    => Institution::random()->pluck("id"),
            "gender"            => $this->faker->randomElement(["Boy", "Girl"])
        ];
    }
}

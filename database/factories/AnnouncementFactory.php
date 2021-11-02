<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'lib' => $this->faker->name(),
            'description' => $this->faker->paragraph(5, true),

        ];
    }
}

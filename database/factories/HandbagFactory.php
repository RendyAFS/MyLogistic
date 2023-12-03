<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Handbag>
 */
class HandbagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nama_handbag = $this->faker->randomFloat(2, 1, 2);;

        return [
            'nama_handbag' => $nama_handbag,
            'qr_handbag' => $nama_handbag,
        ];
    }
}

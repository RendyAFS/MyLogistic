<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecture>
 */
class LectureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nama_dosen = $this->faker->name();

        return [
            'nama_dosen' => $nama_dosen,
            'qr_dosen' => $nama_dosen, // Menggunakan nilai dari nama_dosen untuk qr_dosen
        ];
    }
}

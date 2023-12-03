<?php

namespace Database\Seeders;

use App\Models\Handbag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HandbagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Handbag::factory()->count(150)->create();
    }
}

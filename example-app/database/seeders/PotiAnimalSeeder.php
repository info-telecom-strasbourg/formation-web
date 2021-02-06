<?php

namespace Database\Seeders;

use App\Models\PotiAnimal;
use Illuminate\Database\Seeder;

class PotiAnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PotiAnimal::factory()->count(50)->create();
    }
}

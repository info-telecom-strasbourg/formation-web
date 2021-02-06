<?php

namespace Database\Seeders;

use App\Models\PotiAnimauxType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PotiAnimauxTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PotiAnimauxType::factory()->count(50)->create();
    }
}

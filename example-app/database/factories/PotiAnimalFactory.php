<?php

namespace Database\Factories;

use App\Models\PotiAnimal;
use App\Models\PotiAnimauxType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PotiAnimalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PotiAnimal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'types_id' => PotiAnimauxType::factory()
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\PotiAnimauxType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PotiAnimauxTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PotiAnimauxType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Inventories;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventories>
 */
class InventoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Inventories::class;

    public function definition(): array
    {
        $faker = Faker\Factory::create();
        return [
            'code' => $this->faker->code,
            'name' => $this->faker->name,
            'price' => $this->faker->price,
            'stock' => $this->faker->stock,
        ];
    }
}

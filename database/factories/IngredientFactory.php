<?php

namespace Database\Factories;
use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'recipe_id' => $this->faker->numberBetween(1, 30),
            'name' => $this->faker->word(),
            'quantity' => $this->faker->word(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'image_path' => $this->faker->image(),
            'per_servings' => $this->faker->numberBetween(1, 10),
            'directions' => $this->faker->realtext(),

            // 後で書き換える
            // DB::table('recipes')->insert(['id' => 1, 'name' => 'カレーライス', 'image' => '/public/images/curry.jpeg', 'per_servings' => '5', 'directions' => '煮込む' ])
        ];
    }
}

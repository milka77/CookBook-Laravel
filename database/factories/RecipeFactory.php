<?php

namespace Database\Factories;

use App\Models\Difficulty;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Recipe::class;


    public function definition()
    {
        return [
            'name' => $this->faker->realText(20, 2),
            'info' => $this->faker->sentence(5, 12),
            'prep_time' => $this->faker->numberBetween(1, 60),
            'cooking_time' => $this->faker->numberBetween(1, 60),
            'servings' => $this->faker->numberBetween(1, 20),
            'user_id' => User::factory(),
            'category_id' => $this->faker->numberBetween(1, 7),
            'difficulty_id' => $this->faker->numberBetween(1, 5),
            'ingredients' => $this->faker->realText(200, 2),
            'prep_instructions' => $this->faker->realText(200, 2),
            'cook_instructions' => $this->faker->realText(200, 2),
            'tools' => $this->faker->realText(10, 2),
            'file_path' => $this->faker->imageUrl('600', '400'),
        ];
    }
}

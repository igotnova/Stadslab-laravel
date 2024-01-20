<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => $this->faker->numberBetween(1,3),
            'title' => $this->faker->word(),
            'slug' => $this->faker->unique()->word(),
            'excerpt' => '<p>' .  $this->faker->paragraph(6) .'</p>',
            'body' => '<p>' . $this->faker->paragraph(20).'</p>'
        ];
    }
}

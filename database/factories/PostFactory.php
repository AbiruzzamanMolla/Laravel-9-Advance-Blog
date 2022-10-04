<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $id = rand(30, 600);
        $title = $this->faker->sentence($nbWords = 5, $variableNbWords = true);
        $image = 'https://loremflickr.com/320/240?random='.$id;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'user_id' => User::inRandomOrder()->value('id'),
            'category_id' => Category::inRandomOrder()->value('id'),
            'body' => $this->faker->paragraph(200),
            'description' => $this->faker->sentence(10),
            'status' => $this->faker->randomElement([true, false]),
            'cover' => $image,
        ];
    }
}

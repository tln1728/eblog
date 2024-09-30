<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // id
        // id_user
        // title
        // content
        // summary
        // thumbnail
        // views
        return [
            'user_id'   => User::factory(),
            'title'     => fake() -> sentence(), 
            'content'   => fake() -> text(2000),
            'summary'   => fake() -> paragraph(),
            'thumbnail' => fake() -> imageUrl(),
            'views'     => fake() -> numberBetween(0, 100000),
        ];
    }
}

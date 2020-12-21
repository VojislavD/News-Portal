<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => $this->faker->numberBetween(1,50),
            'name' => $this->faker->userName,
            'body' => $this->faker->paragraph(3),
            'likes' => $this->faker->numberBetween(1,100),
            'dislikes' => $this->faker->numberBetween(1,100),
            'status' => $this->faker->numberBetween(0,2),
            'created_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
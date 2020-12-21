<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(2,5),
            'category_id' => $this->faker->numberBetween(2,7),
            'subcategory_id' => $this->faker->numberBetween(1,36),
            'headline' => $this->faker->text(80),
            'subheadline' => $this->faker->text(240),
            'body' => $this->faker->realText(2000),
            'image' => 'https://picsum.photos/id/'.$this->faker->numberBetween(1,500).'/640/480',
            'views' => $this->faker->numberBetween(1,100),
        ];
    }
}

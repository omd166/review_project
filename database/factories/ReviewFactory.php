<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    return [
        'user_id' => $this->faker->numberBetween(3, 1),
        'product_id' => $this->faker->numberBetween(1, 10),
        'vote' => $this->faker->numberBetween(10, 1),
        'reviewer_name' => $this->faker->firstName(),
        'comment' => $this->faker->paragraph(),
        'is_approved' => $this->faker->boolean(),


    ];
}


}


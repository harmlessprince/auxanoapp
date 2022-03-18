<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $u =  Arr::random(range(1, 10));
        return [
            'user_id' => $u,
            'body' => $this->faker->sentence(random_int(6, 15)),
        ];
    }
}

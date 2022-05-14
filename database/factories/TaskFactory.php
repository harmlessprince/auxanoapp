<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $u =  Arr::random(range(1, 10));
        $uc =  Arr::random(range(1, 10));
        return [
            'assigned_to' => $u,
            'created_by' => $uc,
            'title' => $this->faker->realText(20),
            'description' => $this->faker->realText(400),
            'done' => random_int(0, 1),
            'due_at' => Carbon::today()->addDays(random_int(2, 5))
        ];
    }
}

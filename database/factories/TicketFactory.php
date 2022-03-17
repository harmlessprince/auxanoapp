<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $s =  Arr::random(range(1, 4));
        // dd($s)
        $p =  Arr::random(range(1, 4));
        $u =  Arr::random(range(1, 10));
        $a =  Arr::random(range(1, 10));
        $c =  Arr::random(range(1, 10));
        return [
            'subject' => $this->faker->sentence(),
            'fault_reported' => $this->faker->sentence(10),
            'fault_observed' => $this->faker->sentence(10),
            'status_id' => $s,
            'category_id' => $p,
            'priority_id' => $p,
            'user_id' => $u,
            'agent_id' => $a,
            'customer_id' => $c,
            'completed_at' => Arr::random([null, $this->faker->date('Y-m-d H:m:i')])
        ];
    }
}

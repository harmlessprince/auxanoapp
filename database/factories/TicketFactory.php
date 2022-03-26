<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use SebastianBergmann\Type\NullType;

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
            'subject' => $this->faker->realText(50),
            'fault_reported' => $this->faker->realText(250),
            'fault_observed' => $this->faker->realText(250),
            'status_id' => $s,
            'category_id' => $p,
            'priority_id' => $p,
            'user_id' => $u,
            'agent_id' => $a,
            'customer_id' => $c,
            'completed_at' => Arr::random([null, Carbon::today()->addDays(rand(20, 50))]),
            'due_at' => Carbon::today()->addDays(rand(0, 20)),
        ];
    }
}

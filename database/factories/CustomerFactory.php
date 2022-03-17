<?php

namespace Database\Factories;

use App\Enums\CustomerType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $type = Arr::random(["regular", "company"]);
        $name = $type == CustomerType::COMPANY ? $this->faker->company() : $this->faker->name();
        $email = $type == CustomerType::COMPANY ? $this->faker->companyEmail() : $this->faker->safeEmail();
        return [
            'name' => $name,
            'email' => $email,
            'phone_number' => $this->faker->phoneNumber(),
            'type' => $type,
            'address' => $this->faker->address,
        ];
    }
}

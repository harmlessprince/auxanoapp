<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_id' => random_int(1, Brand::count()),
            'model' => Arr::random(["acer-aspire-5", "lenovo-ideapad", "acer-chromebook", "asus", "hp-touchscreen"]),
            'serial_number' => $this->faker->swiftBicNumber,
            'charger' => $this->faker->boolean(),
            'drive_size' => Arr::random(['128GB', '256GB', '500GB', '750GB', '1TB']),
            'ram_size' => Arr::random(['2GB', '6GB', '4GB', '8GB', '12GB', '16GB'])
        ];
    }
}

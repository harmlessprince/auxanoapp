<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ['Asus', 'Dell', 'HP', 'MSI', 'Lenovo', 'Acer', 'Razer', 'Samsung', 'Alienware', 'Apple', 'Microsoft'];
        sort($brands);
        foreach ($brands as $k => $value) {
            Brand::updateOrCreate([
                'name' => $value,
            ]);
        }
    }
}

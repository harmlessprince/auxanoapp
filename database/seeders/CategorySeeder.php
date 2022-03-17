<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipments = [
            'Printer',
            'Laptop',
            'Desktop',
            'Monitor',
            'Others',
        ];

        foreach ($equipments as $k => $equipment) {
            Category::updateOrCreate([
                'name' => $equipment,
                'status' => true,
            ]);
        }
    }
}

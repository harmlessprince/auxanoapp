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
            [
                'name' => 'Printer',
                'color' => '#d50000' //blue
            ],
            [
                'name' => 'Laptop',
                'color' => '#c51162' //yellow
            ],
            [
                'name' => 'Desktop',
                'color' => '#aa00ff' //green
            ],
            [
                'name' => 'Monitor',
                'color' => '#1a237e' //red
            ]
        ];

        foreach ($equipments as $k => $equipment) {
            Category::updateOrCreate([
                'name' => $equipment['name'],
                'status' => true,
                'color' => $equipment['color']
            ]);
        }
    }
}

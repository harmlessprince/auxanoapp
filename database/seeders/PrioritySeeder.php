<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priorities = [
            [
                'name' => 'low',
                'color' => '#22c55e' //green
                // bg-[#1da1f2]
            ],
            [
                'name' => 'high',
                'color' => '#f97316' //orange
            ],
            [
                'name' => 'medium',
                'color' => '#eab308' //yellow
            ],
            [
                'name' => 'critical',
                'color' => '#ef4444' //red
            ]
        ];

        foreach ($priorities as $k => $value) {
            Priority::updateOrCreate([
                'name' => $value['name'],
                'status' => true,
                'color' => $value['color']
            ]);
        }
    }
}

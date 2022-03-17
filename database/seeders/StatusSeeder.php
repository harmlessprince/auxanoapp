<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'To do',
                'color' => '#3b82f6' //blue
            ],
            [
                'name' => 'In Progress',
                'color' => '#eab308' //yellow
            ],
            [
                'name' => 'Done',
                'color' => '#22c55e' //green
            ],
            [
                'name' => 'Canceled',
                'color' => '#ef4444' //red
            ]
        ];

        foreach ($statuses as $k => $value) {
            Status::updateOrCreate([
                'name' => $value['name'],
                'status' => true,
                'color' => $value['color']
            ]);
        }
    }
}

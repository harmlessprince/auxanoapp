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
                'name' => 'Unassigned',
                'color' => '#3b82f6' //blue
            ],
            [
                'name' => 'Assigned',
                'color' => '#ffd600' //ffd600 yellow
            ],
            [
                'name' => 'In Progress',
                'color' => '#304ffe' //yellow
            ],
            [
                'name' => 'Awaiting feedback',
                'color' => '#827717' //lime
            ],
            [
                'name' => 'Completed',
                'color' => '#827717' //green
            ],
            [
                'name' => 'Canceled',
                'color' => '#212121' //red
            ],
            [
                'name' => 'Abandoned',
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

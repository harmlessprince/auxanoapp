<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Comment;
use App\Models\Item;
use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands =  Brand::all();
        Ticket::factory(50)->create()->each(function ($ticket) use ($brands){
            $ticket->audits()->create([
                'operation' => 'create',
                'action' => 'Created by ' . $ticket->user->full_name,
                'user_id' => $ticket->user_id,
            ]);
            $comments = Comment::factory(random_int(1,5))->make();
            $item = Item::factory()->make();
            $ticket->comments()->saveMany($comments);
            $ticket->item()->save($item);
        });
    }
}

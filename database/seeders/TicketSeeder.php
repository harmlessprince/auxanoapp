<?php

namespace Database\Seeders;

use App\Models\Comment;
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
        Ticket::factory(20)->create()->each(function ($ticket) {
            $ticket->audits()->create([
                'operation' => 'create',
                'action' => 'Created by ' . $ticket->user->full_name,
                'user_id' => $ticket->user_id,
            ]);
            $comments = Comment::factory(random_int(1,5))->make();
            $ticket->comments()->saveMany($comments);
        });
    }
}

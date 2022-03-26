<?php

namespace App\Observers;

use App\Models\Ticket;

class TicketObserver
{

    /**
     * Handle the Ticket "created" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function created(Ticket $ticket)
    {
    }

    /**
     * Handle the ticket "saving" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function updating(Ticket $ticket)
    {
        $ticket->updated_by = auth()->id();
    }

    /**
     * Handle the ticket "saving" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function saving(Ticket $ticket)
    {
        $ticket->ticket_number = 'TCK-' . strtoupper(uniqid());
    }

    /**
     * Handle the Ticket "updated" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function updated(Ticket $ticket)
    {
        //
    }

    /**
     * Handle the Ticket "deleted" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function deleted(Ticket $ticket)
    {
        //
    }

    /**
     * Handle the Ticket "restored" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function restored(Ticket $ticket)
    {
        //
    }

    /**
     * Handle the Ticket "force deleted" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function forceDeleted(Ticket $ticket)
    {
        //
    }
}

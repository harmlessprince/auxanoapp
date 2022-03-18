<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketPriorityChangeController extends Controller
{
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate($request->only('priority'), [
            'priority' => ['required', 'integer', 'exists:priorities,id']
        ]);
        $ticket->priority = $request->priority;
        $ticket->save();
        return  redirect(route('tickets.index'))->with(['success' => 'Ticket priority has been successfully updated']);
    }
}

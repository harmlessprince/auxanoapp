<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketStatusChangeController extends Controller
{
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate($request->only('status'), [
            'status' => ['required', 'integer', 'exists:ticket_statuses,id']
        ]);
        $ticket->status = $request->status;
        $ticket->save();
        return  redirect(route('tickets.index'))->with(['success' => 'Ticket status has been successfully updated']);
    }
}

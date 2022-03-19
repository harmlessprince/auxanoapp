<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketPriorityChangeController extends Controller
{
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'priority' => ['required', 'integer', 'exists:priorities,id']
        ]);
        $ticket->priority_id = $request->priority;
        $ticket->save();
        $ticket = $ticket->fresh();
        $ticket->audits()->create([
            'operation' => 'update',
            'action' => 'Changed priority to' . $ticket->priority->name,
            'user_id' => auth()->id(),
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Ticket priority has been successfully updated',
        ]);
        // return  redirect(route('tickets.index'))->with(['success' => 'Ticket priority has been successfully updated']);
    }
}

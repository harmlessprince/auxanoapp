<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketAssignController extends Controller
{
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'agent' => ['required', 'integer', 'exists:users,id']
        ]);
        $ticket->agent_id = $request->agent;
        $old = collect($ticket->getOriginal());
        $ticket->save();
        $new = collect($ticket->getChanges());
        $ticket->audits()->create([
            'operation' => 'reassigned ticket',
            'action' => 'Reassigned to ' . $ticket->agent->full_name,
            'user_id' => auth()->id(),
            'old' => $old,
            'new' => $new,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Ticket has been successfully reassigned',
        ]);
    }
}

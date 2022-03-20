<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketStatusChangeController extends Controller
{
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status' => ['required', 'integer', 'exists:ticket_statuses,id']
        ]);
        // dd(auth()->id());
        $ticket->status_id = $request->status;
        $old = collect($ticket->getOriginal());
        $ticket->save();
        $new = collect($ticket->getChanges());
        $ticket->audits()->create([
            'operation' => 'updated status',
            'action' => 'Changed status to ' . $ticket->status->name,
            'user_id' => auth()->id(),
            'old' => $old,
            'new' => $new,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Ticket status has been successfully updated',
        ]);
    }
}

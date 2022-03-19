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
        $ticket->save();
        $ticket->audits()->create([
            'operation' => 'update',
            'action' => 'Changed status to ' . $ticket->status->name,
            'user_id' => auth()->id(),
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Ticket status has been successfully updated',
        ]);
    }
}
